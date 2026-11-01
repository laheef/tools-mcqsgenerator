<?php
/**
 * Db — one PDO connection to MySQL, prepared statements only.
 *
 * Everything the CMS does goes through this class: there is no string
 * concatenation of user input into SQL anywhere in the project, and every query
 * is a prepared statement with bound parameters or a whitelisted identifier.
 *
 * The site is designed to run *with or without* the database. If credentials are
 * missing (fresh checkout) or the server is unreachable, `available()` returns
 * false and the public site falls back to the harvested file data, exactly as it
 * behaved before the admin panel existed. That keeps a half-configured deploy
 * serving pages instead of a fatal error.
 */

declare(strict_types=1);

namespace Omni;

use PDO;
use PDOException;

final class Db
{
    private static ?PDO $pdo = null;
    private static bool $tried = false;
    private static ?string $error = null;

    /** The live connection, or null when the database is not usable. */
    public static function pdo(): ?PDO
    {
        if (self::$tried) {
            return self::$pdo;
        }
        self::$tried = true;

        if (!omni_db_configured()) {
            self::$error = 'No database credentials found (config.db.php or OMNI_DB_* environment variables).';
            return null;
        }
        if (!in_array('mysql', PDO::getAvailableDrivers(), true)) {
            self::$error = 'The pdo_mysql PHP extension is not enabled on this server.';
            return null;
        }

        $c = omni_db_config();
        $dsn = sprintf('mysql:host=%s;port=%d;dbname=%s;charset=%s', $c['host'], $c['port'], $c['name'], $c['charset']);
        try {
            self::$pdo = new PDO($dsn, $c['user'], $c['pass'], [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,   // real server-side prepares
                PDO::ATTR_STRINGIFY_FETCHES  => false,
            ]);
        } catch (PDOException $e) {
            // never leak credentials in the message
            self::$error = 'Database connection failed: ' . $e->getMessage();
            self::$pdo = null;
        }
        return self::$pdo;
    }

    public static function available(): bool
    {
        return self::pdo() instanceof PDO;
    }

    /** Why the database is not usable (shown in the installer, never to visitors). */
    public static function error(): ?string
    {
        self::pdo();
        return self::$error;
    }

    /** @return array<int,array<string,mixed>> */
    public static function all(string $sql, array $params = []): array
    {
        $stmt = self::run($sql, $params);
        return $stmt === null ? [] : $stmt->fetchAll();
    }

    /** @return array<string,mixed>|null */
    public static function one(string $sql, array $params = []): ?array
    {
        $stmt = self::run($sql, $params);
        if ($stmt === null) {
            return null;
        }
        $row = $stmt->fetch();
        return $row === false ? null : $row;
    }

    /** A single scalar from the first column of the first row. */
    public static function value(string $sql, array $params = [], mixed $default = null): mixed
    {
        $stmt = self::run($sql, $params);
        if ($stmt === null) {
            return $default;
        }
        $v = $stmt->fetchColumn();
        return $v === false ? $default : $v;
    }

    public static function exec(string $sql, array $params = []): int
    {
        $stmt = self::run($sql, $params);
        return $stmt === null ? 0 : $stmt->rowCount();
    }

    public static function insert(string $table, array $row): int
    {
        $cols = array_keys($row);
        $sql  = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            self::ident($table),
            implode(', ', array_map([self::class, 'ident'], $cols)),
            implode(', ', array_map(static fn ($c) => ':' . $c, $cols))
        );
        $params = [];
        foreach ($row as $k => $v) {
            $params[':' . $k] = $v;
        }
        self::run($sql, $params);
        return (int) self::pdo()->lastInsertId();
    }

    public static function update(string $table, array $row, string $where, array $whereParams = []): int
    {
        $sets = [];
        $params = [];
        foreach ($row as $k => $v) {
            $sets[] = self::ident($k) . ' = :s_' . $k;
            $params[':s_' . $k] = $v;
        }
        $sql = sprintf('UPDATE %s SET %s WHERE %s', self::ident($table), implode(', ', $sets), $where);
        $stmt = self::run($sql, $params + $whereParams);
        return $stmt === null ? 0 : $stmt->rowCount();
    }

    public static function delete(string $table, string $where, array $params = []): int
    {
        $stmt = self::run(sprintf('DELETE FROM %s WHERE %s', self::ident($table), $where), $params);
        return $stmt === null ? 0 : $stmt->rowCount();
    }

    public static function begin(): void
    {
        self::pdo()?->beginTransaction();
    }

    public static function commit(): void
    {
        self::pdo()?->commit();
    }

    public static function rollback(): void
    {
        $pdo = self::pdo();
        if ($pdo !== null && $pdo->inTransaction()) {
            $pdo->rollBack();
        }
    }

    /**
     * Quote an identifier (table/column name).
     *
     * Identifiers cannot be bound as parameters, so they are validated instead:
     * only letters, digits and underscores survive. Any table or column name in
     * this project is a literal in the code, never user input, but the
     * whitelist makes that impossible to get wrong later.
     */
    public static function ident(string $name): string
    {
        $clean = preg_replace('~[^A-Za-z0-9_]~', '', $name) ?? '';
        if ($clean === '' || $clean !== $name) {
            throw new \InvalidArgumentException('Illegal SQL identifier: ' . $name);
        }
        return '`' . $clean . '`';
    }

    private static function run(string $sql, array $params = []): ?\PDOStatement
    {
        $pdo = self::pdo();
        if ($pdo === null) {
            return null;
        }
        try {
            $stmt = $pdo->prepare($sql);
            foreach ($params as $key => $value) {
                $name = is_int($key) ? $key + 1 : (str_starts_with((string) $key, ':') ? $key : ':' . $key);
                $type = match (true) {
                    is_int($value)  => PDO::PARAM_INT,
                    is_bool($value) => PDO::PARAM_BOOL,
                    is_null($value) => PDO::PARAM_NULL,
                    default         => PDO::PARAM_STR,
                };
                $stmt->bindValue($name, $value, $type);
            }
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            // A failed query must never kill a public page: log it privately and
            // let the caller's fallback path take over.
            error_log('[omni-db] ' . $e->getMessage() . ' :: ' . preg_replace('~\s+~', ' ', $sql));
            self::$error = $e->getMessage();
            return null;
        }
    }

    /** Table prefix-free existence check used by the installer. */
    public static function hasTable(string $table): bool
    {
        $row = self::one('SELECT COUNT(*) AS c FROM information_schema.tables WHERE table_schema = DATABASE() AND table_name = ?', [$table]);
        return (int) ($row['c'] ?? 0) > 0;
    }

    /**
     * Is this column present?
     *
     * Code that runs before a pending migration is applied must ask first:
     * a column added by migration 003 does not exist on a fresh install that has
     * not been upgraded yet, and an UPDATE naming it would fail.
     */
    public static function hasColumn(string $table, string $column): bool
    {
        static $cache = [];
        $key = $table . '.' . $column;
        if (array_key_exists($key, $cache)) {
            return $cache[$key];
        }
        $row = self::one(
            'SELECT COUNT(*) AS c FROM information_schema.columns
              WHERE table_schema = DATABASE() AND table_name = ? AND column_name = ?',
            [$table, $column]
        );
        return $cache[$key] = (int) ($row['c'] ?? 0) > 0;
    }
}

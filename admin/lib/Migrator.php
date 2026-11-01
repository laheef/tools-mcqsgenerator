<?php
/**
 * Migrator — applies admin/migrations/*.sql in filename order, once each.
 *
 * The SQL files are plain MySQL with no stored routines, so they can be split on
 * statement terminators safely. Every applied file is recorded in
 * `schema_migrations`; re-running is a no-op. The same files can also be pasted
 * into phpMyAdmin by hand, which is the fallback on hosts that block web
 * installers.
 */

declare(strict_types=1);


namespace Onim\Admin;

// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Onim\Db;

final class Migrator
{
    public static function dir(): string
    {
        return dirname(__DIR__) . '/migrations';
    }

    /** @return array<int,string> filenames in apply order */
    public static function pending(): array
    {
        $done = self::applied();
        $out = [];
        foreach (glob(self::dir() . '/*.sql') ?: [] as $file) {
            $name = basename($file);
            if (!in_array($name, $done, true)) {
                $out[] = $name;
            }
        }
        sort($out);
        return $out;
    }

    /** @return array<int,string> */
    public static function applied(): array
    {
        if (!Db::available() || !Db::hasTable('schema_migrations')) {
            return [];
        }
        return array_map(
            static fn (array $r): string => (string) $r['filename'],
            Db::all('SELECT filename FROM schema_migrations ORDER BY filename')
        );
    }

    /**
     * Apply every pending migration.
     *
     * @return array{applied:array<int,string>,errors:array<int,string>}
     */
    public static function run(): array
    {
        $applied = [];
        $errors = [];
        $pdo = Db::pdo();
        if ($pdo === null) {
            return ['applied' => [], 'errors' => [Db::error() ?? 'No database connection.']];
        }

        foreach (self::pending() as $name) {
            $path = self::dir() . '/' . $name;
            $sql  = (string) file_get_contents($path);
            $fail = null;

            foreach (self::split($sql) as $statement) {
                try {
                    $pdo->exec($statement);
                } catch (\PDOException $e) {
                    /*
                     * A migration can be half-applied already — the same .sql is
                     * pasted into phpMyAdmin on hosts without a web installer, and
                     * a restore can bring the schema without the bookkeeping row.
                     * "column exists" / "table exists" means the statement's work is
                     * in place, so keep going and still record the migration;
                     * anything else is a real failure.
                     */
                    if (!self::alreadyDone($e->getMessage())) {
                        $fail = $name . ': ' . $e->getMessage();
                        break;
                    }
                }
            }

            if ($fail !== null) {
                $errors[] = $fail;
                continue;
            }

            Db::insert('schema_migrations', [
                'filename' => $name,
                'checksum' => hash('sha256', $sql),
            ]);
            $applied[] = $name;
        }

        return ['applied' => $applied, 'errors' => $errors];
    }

    /** Is this PDO error just "that part of the schema is already there"? */
    private static function alreadyDone(string $message): bool
    {
        foreach (['Duplicate column', 'Duplicate key name', 'already exists',
                  'check that column/key exists', 'Duplicate foreign key'] as $needle) {
            if (stripos($message, $needle) !== false) {
                return true;
            }
        }
        return false;
    }

    /** @return array<int,string> individual statements */
    private static function split(string $sql): array
    {
        $lines = preg_split('/\r\n|\r|\n/', $sql) ?: [];
        $buffer = [];
        $statements = [];
        foreach ($lines as $line) {
            $trim = ltrim($line);
            if ($trim === '' || str_starts_with($trim, '--') || str_starts_with($trim, '#')) {
                continue;
            }
            $buffer[] = $line;
            if (str_ends_with(rtrim($line), ';')) {
                $statement = trim(implode("\n", $buffer));
                if ($statement !== '' && $statement !== ';') {
                    $statements[] = rtrim($statement, ';');
                }
                $buffer = [];
            }
        }
        $tail = trim(implode("\n", $buffer));
        if ($tail !== '') {
            $statements[] = rtrim($tail, ';');
        }
        return $statements;
    }
}

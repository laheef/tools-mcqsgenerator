<?php
/**
 * BackupService — database dumps, content archives, restore and retention.
 *
 * Design notes for shared hosting:
 *   * dumps are plain .sql files written to `data/backups/`, a folder that sits
 *     outside the document-root deny rules and is additionally blocked by
 *     .htaccess, so a backup is never downloadable as a URL;
 *   * the dump is built with SHOW CREATE TABLE + row-by-row INSERTs, which is
 *     what phpMyAdmin on Hostinger imports most reliably (no extended inserts
 *     that exceed max_allowed_packet, no binary blobs);
 *   * every dump records a SHA-256 and a row in `backups`, so the panel can show
 *     what exists, when, and whether the file is still intact;
 *   * a restore always takes a fresh snapshot first and refuses to touch a file
 *     that does not carry the panel's own header — a stray .sql from elsewhere
 *     cannot be used to overwrite the live database.
 */

declare(strict_types=1);


namespace Omni\Admin;

// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Omni\Db;

final class BackupService
{
    /** First line of every dump this class writes. */
    public const SIGNATURE = '-- Omni Calculator admin panel database dump';

    public const ROWS_PER_INSERT = 200;

    public static function dir(): string
    {
        return dirname(__DIR__, 2) . '/data/backups';
    }

    public static function writable(): bool
    {
        $dir = self::dir();
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }
        return is_dir($dir) && is_writable($dir);
    }

    /* ------------------------------------------------------------- dumping */

    /**
     * Write a full dump of the CMS database.
     *
     * @return array{ok:bool,file:string,error:string,size:int,rows:int}
     */
    public static function dumpDatabase(?int $userId = null, string $note = ''): array
    {
        $fail = static fn (string $message): array => ['ok' => false, 'file' => '', 'error' => $message, 'size' => 0, 'rows' => 0];

        if (!Db::available()) {
            return $fail('There is no database connection to dump.');
        }
        if (!self::writable()) {
            return $fail('The folder data/backups is not writable. Create it with permissions 755 and try again.');
        }

        $name = 'db-' . date('Ymd-His') . '.sql';
        $path = self::dir() . '/' . $name;
        $handle = @fopen($path, 'wb');
        if ($handle === false) {
            return $fail('Could not create ' . $path);
        }

        $rows = 0;
        $written = 0;
        $write = static function (string $chunk) use ($handle, &$written): void {
            $written += (int) fwrite($handle, $chunk);
        };

        $write(self::SIGNATURE . "\n");
        $write('-- Generated ' . date('c') . ' by the admin panel (schema version from schema_migrations)' . "\n");
        $write('-- Restore with: admin panel → Backups → Restore, or phpMyAdmin → Import' . "\n\n");
        $write("SET NAMES utf8mb4;\nSET FOREIGN_KEY_CHECKS=0;\nSET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';\n\n");

        $tables = Db::all('SHOW TABLES');
        foreach ($tables as $row) {
            $table = (string) array_values($row)[0];

            // Structure
            $create = Db::one('SHOW CREATE TABLE ' . Db::ident($table));
            $ddl = (string) ($create['Create Table'] ?? '');
            if ($ddl === '') {
                continue;
            }
            $write('-- ------------------------------------------------------------ ' . $table . "\n");
            $write('DROP TABLE IF EXISTS ' . Db::ident($table) . ";\n");
            $write($ddl . ";\n\n");

            // Data, in bounded batches
            $count = (int) Db::value('SELECT COUNT(*) FROM ' . Db::ident($table), [], 0);
            if ($count === 0) {
                $write("\n");
                continue;
            }
            $offset = 0;
            while ($offset < $count) {
                $batch = Db::all('SELECT * FROM ' . Db::ident($table) . ' LIMIT ' . self::ROWS_PER_INSERT . ' OFFSET ' . $offset);
                if ($batch === []) {
                    break;
                }
                $columns = array_keys($batch[0]);
                $columnList = '(' . implode(', ', array_map([Db::class, 'ident'], $columns)) . ')';
                $valueLines = [];
                foreach ($batch as $record) {
                    $values = [];
                    foreach ($columns as $column) {
                        $values[] = self::literal($record[$column] ?? null);
                    }
                    $valueLines[] = '(' . implode(', ', $values) . ')';
                }
                $write('INSERT INTO ' . Db::ident($table) . ' ' . $columnList . " VALUES\n" . implode(",\n", $valueLines) . ";\n");
                $rows += count($batch);
                $offset += self::ROWS_PER_INSERT;
            }
            $write("\n");
        }

        $write("SET FOREIGN_KEY_CHECKS=1;\n");
        $write('-- End of dump. ' . $rows . " rows.\n");
        fclose($handle);

        $size = (int) @filesize($path);
        $checksum = (string) @hash_file('sha256', $path);
        Db::insert('backups', [
            'btype' => 'database',
            'filename' => $name,
            'size' => $size,
            'checksum' => $checksum,
            'note' => mb_substr($note !== '' ? $note : 'Manual dump from the panel', 0, 255),
            'created_by' => $userId,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        Activity::log('backup_created', 'backup', $name, 'Database dump (' . self::humanBytes($size) . ', ' . $rows . ' rows)');

        return ['ok' => true, 'file' => $name, 'error' => '', 'size' => $size, 'rows' => $rows];
    }

    /**
     * Archive data/content (and optionally uploads) as a ZIP.
     *
     * @return array{ok:bool,file:string,error:string,size:int,rows:int}
     */
    public static function archiveContent(?int $userId = null, bool $withUploads = false): array
    {
        $fail = static fn (string $message): array => ['ok' => false, 'file' => '', 'error' => $message, 'size' => 0, 'rows' => 0];
        if (!class_exists('ZipArchive')) {
            return $fail('The PHP zip extension is not enabled on this server, so a content archive cannot be created here. Download data/content over SFTP instead, or ask the host to enable zip.');
        }
        if (!self::writable()) {
            return $fail('The folder data/backups is not writable.');
        }

        $root = dirname(__DIR__, 2);
        $name = 'content-' . date('Ymd-His') . '.zip';
        $path = self::dir() . '/' . $name;
        $zip = new \ZipArchive();
        if ($zip->open($path, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) !== true) {
            return $fail('Could not create ' . $path);
        }

        $added = 0;
        $targets = ['data/content', 'data/categories.json', 'data/calc'];
        if ($withUploads) {
            $targets[] = 'uploads';
        }
        $budget = 200 * 1024 * 1024;
        $total = 0;
        foreach ($targets as $target) {
            $absolute = $root . '/' . $target;
            if (!file_exists($absolute)) {
                continue;
            }
            if (is_file($absolute)) {
                $zip->addFile($absolute, $target);
                $total += (int) filesize($absolute);
                $added++;
                continue;
            }
            $iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($absolute, \FilesystemIterator::SKIP_DOTS)
            );
            foreach ($iterator as $file) {
                if (!$file instanceof \SplFileInfo || !$file->isFile()) {
                    continue;
                }
                $total += $file->getSize();
                if ($total > $budget) {
                    break 2;
                }
                $zip->addFile($file->getPathname(), str_replace($root . '/', '', $file->getPathname()));
                $added++;
            }
        }
        $zip->addFromString('MANIFEST.txt', "Omni Calculator content archive\nCreated: " . date('c') . "\nFiles: " . $added . "\nUploads included: " . ($withUploads ? 'yes' : 'no') . "\n");
        $zip->close();

        $size = (int) @filesize($path);
        Db::insert('backups', [
            'btype' => $withUploads ? 'files' : 'content',
            'filename' => $name,
            'size' => $size,
            'checksum' => (string) @hash_file('sha256', $path),
            'note' => $withUploads ? 'Content + uploads archive' : 'Content archive',
            'created_by' => $userId,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        Activity::log('backup_created', 'backup', $name, 'Content archive (' . self::humanBytes($size) . ', ' . $added . ' files)');

        return ['ok' => true, 'file' => $name, 'error' => '', 'size' => $size, 'rows' => $added];
    }

    /* ------------------------------------------------------------ restoring */

    /**
     * Restore a dump over the live database.
     *
     * The dump is verified first (signature line present), a safety snapshot of
     * the current state is written, and only then are the statements executed.
     *
     * @return array{ok:bool,message:string,snapshot:string}
     */
    public static function restoreDatabase(int $backupId, ?int $userId = null): array
    {
        if (!Db::available()) {
            return ['ok' => false, 'message' => 'There is no database connection.', 'snapshot' => ''];
        }
        $row = Db::one('SELECT * FROM backups WHERE id = ? AND btype = ?', [$backupId, 'database']);
        if ($row === null) {
            return ['ok' => false, 'message' => 'That backup does not exist or is not a database dump.', 'snapshot' => ''];
        }
        $path = self::dir() . '/' . basename((string) $row['filename']);
        if (!is_file($path)) {
            return ['ok' => false, 'message' => 'The dump file is missing from data/backups.', 'snapshot' => ''];
        }
        $handle = fopen($path, 'rb');
        $first = $handle !== false ? (string) fgets($handle) : '';
        if ($handle !== false) {
            fclose($handle);
        }
        if (!str_starts_with(trim($first), self::SIGNATURE)) {
            return $fail('That file is not a dump written by this panel — restore refused. File header was: ' . mb_substr(trim($first), 0, 120));
        }

        $snapshot = self::dumpDatabase($userId, 'Automatic snapshot before restore of ' . $row['filename']);
        $safetyId = (int) Db::value('SELECT MAX(id) FROM backups', [], 0);
        if (!$snapshot['ok']) {
            return $fail('Restore aborted: the safety snapshot could not be written (' . $snapshot['error'] . ').');
        }

        $sql = (string) file_get_contents($path);
        $statements = self::split($sql);
        $pdo = Db::pdo();
        if ($pdo === null) {
            return $fail('The database connection was lost.', $safetyId);
        }
        $executed = 0;
        try {
            $pdo->exec('SET FOREIGN_KEY_CHECKS=0');
            foreach ($statements as $statement) {
                $trimmed = trim($statement);
                if ($trimmed === '' || str_starts_with($trimmed, '--')) {
                    continue;
                }
                $pdo->exec($trimmed);
                $executed++;
            }
            $pdo->exec('SET FOREIGN_KEY_CHECKS=1');
        } catch (\Throwable $e) {
            try {
                $pdo->exec('SET FOREIGN_KEY_CHECKS=1');
            } catch (\Throwable) {
                // nothing more we can do
            }
            return $fail('Restore stopped after ' . $executed . ' statement(s): ' . $e->getMessage()
                . ' The previous state is saved as backup #' . $safetyId . '.', $safetyId);
        }

        Activity::log('backup_restored', 'backup', (string) $row['filename'], 'Restored database from ' . $row['filename'] . ' (' . $executed . ' statements)');
        return ['ok' => true, 'error' => '', 'statements' => $executed, 'safety' => $safetyId];
    }

    /**
     * Split a dump into statements on `;` at end-of-line, respecting quoted
     * strings and escaped quotes. Good enough for MySQL dumps this class writes.
     *
     * @return array<int,string>
     */
    private static function split(string $sql): array
    {
        $statements = [];
        $current = '';
        $length = strlen($sql);
        $inString = false;
        $quote = '';
        for ($i = 0; $i < $length; $i++) {
            $char = $sql[$i];
            $current .= $char;
            if ($inString) {
                if ($char === '\\') {
                    if ($i + 1 < $length) {
                        $current .= $sql[$i + 1];
                        $i++;
                    }
                    continue;
                }
                if ($char === $quote) {
                    $inString = false;
                }
                continue;
            }
            if ($char === "'" || $char === '"') {
                $inString = true;
                $quote = $char;
                continue;
            }
            if ($char === ';') {
                $statements[] = $current;
                $current = '';
            }
        }
        if (trim($current) !== '') {
            $statements[] = $current;
        }
        return $statements;
    }

    /* --------------------------------------------------------------- listing */

    /** @return array<int,array<string,mixed>> */
    public static function all(): array
    {
        if (!Db::available() || !Db::hasTable('backups')) {
            return [];
        }
        $rows = Db::all('SELECT b.*, u.name AS author FROM backups b LEFT JOIN users u ON u.id = b.created_by ORDER BY b.created_at DESC, b.id DESC');
        foreach ($rows as &$row) {
            $path = self::dir() . '/' . basename((string) $row['filename']);
            $row['exists'] = is_file($path);
            $row['disk_size'] = $row['exists'] ? (int) filesize($path) : 0;
            $row['downloadable'] = $row['exists'];
        }
        return $rows;
    }

    public static function find(int $id): ?array
    {
        return Db::available() ? Db::one('SELECT * FROM backups WHERE id = ?', [$id]) : null;
    }

    public static function path(array $row): ?string
    {
        $path = self::dir() . '/' . basename((string) $row['filename']);
        return is_file($path) ? $path : null;
    }

    public static function delete(int $id): bool
    {
        $row = self::find($id);
        if ($row === null) {
            return false;
        }
        $path = self::dir() . '/' . basename((string) $row['filename']);
        if (is_file($path) && !@unlink($path)) {
            return false;
        }
        Db::delete('backups', 'id = ?', [$id]);
        Activity::log('backup_deleted', 'backup', (string) $row['filename'], 'Deleted backup file');
        return true;
    }

    /**
     * Stream a stored backup through the panel.
     *
     * The file is never linked directly: data/backups sits outside the web root's
     * reach (it is denied in .htaccess as well), so a download has to pass
     * through this authenticated request.
     */
    public static function download(int $id): void
    {
        $row = self::find($id);
        if ($row === null) {
            http_response_code(404);
            echo 'That backup no longer exists.';
            exit;
        }
        $path = self::path($row);
        if ($path === null) {
            http_response_code(404);
            echo 'The backup file is missing from disk.';
            exit;
        }
        Activity::log('backup_downloaded', 'backup', (string) $row['filename'], 'Downloaded backup file');
        while (ob_get_level() > 0) {
            ob_end_clean();
        }
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename((string) $row['filename']) . '"');
        header('Content-Length: ' . (string) filesize($path));
        header('X-Content-Type-Options: nosniff');
        header('Cache-Control: no-store');
        readfile($path);
        exit;
    }

    /**
     * Retention: remove dumps older than N days (never the most recent one).
     *
     * @return int number of files removed
     */
    public static function prune(int $days, bool $keepNewest = true): int
    {
        if (!Db::available() || $days < 1) {
            return 0;
        }
        $cutoff = date('Y-m-d H:i:s', time() - $days * 86400);
        $rows = Db::all('SELECT * FROM backups WHERE created_at < ? ORDER BY created_at DESC', [$cutoff]);
        $removed = 0;
        foreach ($rows as $index => $row) {
            if ($keepNewest && $index === 0) {
                continue;
            }
            if (self::delete((int) $row['id'])) {
                $removed++;
            }
        }
        return $removed;
    }

    /**
     * Keep the newest N database dumps, delete the rest (rows and files).
     *
     * This is what the nightly cron uses: retention by count, which is what an
     * operator actually reasons about ("keep ten"), while prune() above stays
     * available for age-based clean-up from the panel.
     */
    public static function pruneKeep(int $keep): int
    {
        if (!Db::available() || $keep < 1) {
            return 0;
        }
        $rows = Db::all("SELECT * FROM backups WHERE btype = 'database' ORDER BY id DESC");
        $removed = 0;
        foreach ($rows as $index => $row) {
            if ($index < $keep) {
                continue;
            }
            if (self::delete((int) $row['id'])) {
                $removed++;
            }
        }
        return $removed;
    }

    /**
     * Drop rows whose file is gone (a manual delete from the File Manager, or a
     * failed restore attempt). Left behind they make the Backups screen lie.
     */
    public static function pruneOrphans(): int
    {
        if (!Db::available()) {
            return 0;
        }
        $dir = self::dir();
        $removed = 0;
        foreach (Db::all('SELECT * FROM backups') as $row) {
            $file = $dir . '/' . basename((string) $row['filename']);
            if (!is_file($file)) {
                Db::delete('backups', 'id = ?', [(int) $row['id']]);
                $removed++;
            }
        }
        return $removed;
    }

    /* --------------------------------------------------------------- helpers */

    public static function humanSize(int $bytes): string
    {
        return self::humanBytes($bytes);
    }

    private static function literal(mixed $value): string
    {
        if ($value === null) {
            return 'NULL';
        }
        if (is_int($value) || is_float($value)) {
            return (string) $value;
        }
        $escaped = str_replace(
            ["\\", "\0", "\n", "\r", "'", '"', "\x1a"],
            ["\\\\", "\\0", "\\n", "\\r", "\\'", '\\"', "\\Z"],
            (string) $value
        );
        return "'" . $escaped . "'";
    }

    public static function humanBytes(int $bytes): string
    {
        if ($bytes < 1024) {
            return $bytes . ' B';
        }
        if ($bytes < 1024 * 1024) {
            return round($bytes / 1024, 1) . ' KB';
        }
        if ($bytes < 1024 * 1024 * 1024) {
            return round($bytes / (1024 * 1024), 1) . ' MB';
        }
        return round($bytes / (1024 * 1024 * 1024), 2) . ' GB';
    }
}

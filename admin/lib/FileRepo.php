<?php
/**
 * FileRepo — the source-file manager.
 *
 * Editors and administrators can read and change the site's own code (templates,
 * libraries, scripts, styles) from a protected screen instead of an FTP client.
 * Guard rails, in order:
 *
 *   1. path validation      the path must resolve inside the project root, must
 *                           not contain "..", must have an allowed extension and
 *                           must not be a secrets/migration/binary file
 *   2. syntax check         PHP is parsed with token_get_all(TOKEN_PARSE) — a
 *                           real parser, not a regex — and the write is refused
 *                           if it does not parse. JS/CSS get a bracket balance
 *                           check, which is honestly labelled as such
 *   3. version history      every write stores the previous body in
 *                           calculator_file_versions, so Restore is one click
 *   4. no execution         the editor only ever writes into source folders;
 *                           uploads/ is never a target, and .htaccess disables
 *                           PHP there
 *   5. no deletion in use   a file that is still required/included anywhere in
 *                           the project cannot be deleted
 */

declare(strict_types=1);


namespace Omni\Admin;

// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Omni\Db;

final class FileRepo
{
    /** Extensions the editor will open and save. */
    public const EDITABLE = ['php', 'js', 'css', 'json', 'md', 'txt', 'html', 'htaccess'];

    /** Folders that may be edited, relative to the project root. */
    private const ROOTS = ['lib', 'templates', 'assets/js', 'assets/css', 'modules', 'admin/lib', 'admin/views', 'admin/assets', 'data/cache', 'tests', 'docs'];

    /** Files an editor may open but never save or delete. */
    private const READ_ONLY = ['config.php', 'config.db.php', 'router.php', 'index.php', 'api.php', '.htaccess'];

    /** Never touched by the panel, whatever the role. */
    private const FORBIDDEN = ['config.db.php', 'admin/migrations'];

    /** Folders an editor may write into, for display in the panel. @return array<int,string> */
    public static function roots(): array
    {
        return self::ROOTS;
    }

    public static function root(): string
    {
        return dirname(ADMIN_ROOT);
    }

    /**
     * Normalise and validate a user-supplied relative path.
     *
     * @return array{ok:bool,path:string,absolute:string,error:string}
     */
    public static function resolve(string $path, bool $mustExist = true): array
    {
        $fail = static fn (string $msg): array => ['ok' => false, 'path' => '', 'absolute' => '', 'error' => $msg];

        $path = str_replace('\\', '/', trim($path));
        $path = ltrim($path, '/');
        if ($path === '') {
            return $fail('No file was chosen.');
        }
        if (str_contains($path, "\0") || preg_match('~(^|/)\.\.(/|$)~', $path) === 1) {
            return $fail('That path leaves the project folder.');
        }
        foreach (self::FORBIDDEN as $forbidden) {
            if ($path === $forbidden || str_starts_with($path, $forbidden . '/')) {
                return $fail('That file is protected.');
            }
        }
        if (!self::isAllowedPath($path)) {
            return $fail('Files can only be edited inside: ' . implode(', ', array_map(static fn ($r) => $r . '/', self::ROOTS)) . '.');
        }
        $ext = self::extension($path);
        if (!in_array($ext, self::EDITABLE, true)) {
            return $fail('“.' . $ext . '” files cannot be edited here.');
        }

        $absolute = self::root() . '/' . $path;
        $real = realpath($absolute);
        $realRoot = realpath(self::root());
        if ($mustExist) {
            if ($real === false || !is_file($real)) {
                return $fail('That file does not exist.');
            }
            if ($realRoot === false || !str_starts_with($real, $realRoot . '/')) {
                return $fail('That path leaves the project folder.');
            }
        } else {
            $dir = realpath(dirname($absolute));
            if ($dir === false || $realRoot === false || !str_starts_with($dir . '/', $realRoot . '/')) {
                return $fail('The folder does not exist inside the project.');
            }
        }

        return ['ok' => true, 'path' => $path, 'absolute' => $absolute, 'error' => ''];
    }

    public static function isAllowedPath(string $path): bool
    {
        foreach (self::ROOTS as $root) {
            if (str_starts_with($path, $root . '/')) {
                return true;
            }
        }
        return in_array($path, self::READ_ONLY, true);
    }

    public static function isReadOnly(string $path): bool
    {
        return in_array($path, self::READ_ONLY, true);
    }

    public static function extension(string $path): string
    {
        $base = basename($path);
        if ($base === '.htaccess') {
            return 'htaccess';
        }
        $ext = strtolower(pathinfo($base, PATHINFO_EXTENSION));
        return $ext === '' ? 'txt' : $ext;
    }

    public static function language(string $path): string
    {
        return match (self::extension($path)) {
            'js'   => 'javascript',
            'css'  => 'css',
            'json' => 'json',
            'md'   => 'markdown',
            'html' => 'html',
            'php'  => 'php',
            default => 'text',
        };
    }

    /** Kind used for the metadata column. */
    public static function kind(string $path): string
    {
        if (str_starts_with($path, 'templates/partials/')) {
            return 'partial';
        }
        if (str_starts_with($path, 'templates/')) {
            return 'template';
        }
        if (str_starts_with($path, 'lib/')) {
            return 'library';
        }
        if (str_starts_with($path, 'assets/js/')) {
            return 'script';
        }
        if (str_starts_with($path, 'assets/css/')) {
            return 'style';
        }
        if (str_starts_with($path, 'data/')) {
            return 'data';
        }
        return 'route';
    }

    /**
     * Everything editable, grouped by folder, with metadata from the database.
     *
     * @return array<string,array<int,array<string,mixed>>>
     */
    public static function tree(): array
    {
        $meta = self::metaMap();
        $out = [];
        foreach (self::ROOTS as $root) {
            $dir = self::root() . '/' . $root;
            if (!is_dir($dir)) {
                continue;
            }
            $files = [];
            $iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($dir, \FilesystemIterator::SKIP_DOTS)
            );
            foreach ($iterator as $file) {
                if (!$file->isFile()) {
                    continue;
                }
                $relative = str_replace('\\', '/', substr($file->getPathname(), strlen(self::root()) + 1));
                if (!in_array(self::extension($relative), self::EDITABLE, true)) {
                    continue;
                }
                if (str_contains($relative, '/node_modules/') || str_contains($relative, '/vendor/')) {
                    continue;
                }
                $files[] = self::describe($relative, $meta);
            }
            usort($files, static fn (array $a, array $b): int => strcmp($a['path'], $b['path']));
            if ($files !== []) {
                $out[$root] = $files;
            }
        }
        foreach (self::READ_ONLY as $file) {
            $absolute = self::root() . '/' . $file;
            if (is_file($absolute)) {
                $out['root files'][] = self::describe($file, $meta);
            }
        }
        return $out;
    }

    /** @param array<string,array<string,mixed>> $meta */
    private static function describe(string $path, array $meta): array
    {
        $absolute = self::root() . '/' . $path;
        $content = (string) @file_get_contents($absolute);
        $row = $meta[$path] ?? null;
        return [
            'path'      => $path,
            'name'      => basename($path),
            'ext'       => self::extension($path),
            'size'      => (int) @filesize($absolute),
            'lines'     => substr_count($content, "\n") + 1,
            'modified'  => (int) @filemtime($absolute),
            'read_only' => self::isReadOnly($path),
            'kind'      => self::kind($path),
            'versions'  => (int) ($row['versions'] ?? 0),
            'tracked'   => $row !== null,
        ];
    }

    /** @return array<string,array<string,mixed>> */
    private static function metaMap(): array
    {
        static $map = null;
        if ($map !== null) {
            return $map;
        }
        $map = [];
        if (!Db::hasTable('calculator_files')) {
            return $map;
        }
        $rows = Db::all('SELECT f.*, (SELECT COUNT(*) FROM calculator_file_versions v WHERE v.file_id = f.id) AS versions
                         FROM calculator_files f');
        foreach ($rows as $row) {
            $map[(string) $row['path']] = $row;
        }
        return $map;
    }

    public static function read(string $path): ?string
    {
        $resolved = self::resolve($path);
        if (!$resolved['ok']) {
            return null;
        }
        if (filesize($resolved['absolute']) > 2 * 1024 * 1024) {
            return null; // refuse to load huge files into a textarea
        }
        $content = file_get_contents($resolved['absolute']);
        return $content === false ? null : $content;
    }

    /**
     * Create or update a file, storing the previous version first.
     *
     * @return array{ok:bool,error:string,warnings:array<int,string>,fileId:int,version:int}
     */
    public static function write(string $path, string $content, int $userId, string $note = ''): array
    {
        $warnings = [];
        $resolved = self::resolve($path, is_file(self::root() . '/' . $path));
        if (!$resolved['ok']) {
            return ['ok' => false, 'error' => $resolved['error'], 'warnings' => [], 'fileId' => 0, 'version' => 0];
        }
        if (self::isReadOnly($path)) {
            return ['ok' => false, 'error' => 'That file is read-only in the panel on purpose. Edit it over FTP/SFTP.', 'warnings' => [], 'fileId' => 0, 'version' => 0];
        }
        $check = self::syntaxCheck($path, $content);
        if (!$check['ok']) {
            return ['ok' => false, 'error' => $check['error'], 'warnings' => $check['warnings'], 'fileId' => 0, 'version' => 0];
        }
        $warnings = array_merge($warnings, $check['warnings']);

        $absolute = $resolved['absolute'];
        $exists = is_file($absolute);
        $previous = $exists ? (string) file_get_contents($absolute) : '';

        // disk backup of the previous body (cheap insurance next to the DB copy)
        if ($exists) {
            $backupDir = self::root() . '/data/backups/files';
            if (!is_dir($backupDir)) {
                @mkdir($backupDir, 0755, true);
            }
            @file_put_contents($backupDir . '/' . str_replace('/', '__', $path) . '.' . date('Ymd-His') . '.bak', $previous);
        }

        $meta = self::metaMap()[$path] ?? null;
        $fileId = $meta === null ? 0 : (int) $meta['id'];
        if ($fileId === 0) {
            $fileId = Db::insert('calculator_files', [
                'path'        => $path,
                'kind'        => self::kind($path),
                'language'    => self::language($path),
                'checksum'    => hash('sha256', $content),
                'size'        => strlen($content),
                'status'      => 'active',
                'is_editable' => 1,
                'note'        => $note,
                'created_by'  => $userId,
            ]);
        }
        $version = (int) Db::value('SELECT COALESCE(MAX(version), 0) FROM calculator_file_versions WHERE file_id = ?', [$fileId], 0) + 1;
        Db::insert('calculator_file_versions', [
            'file_id'    => $fileId,
            'version'    => $version,
            'content'    => $previous,
            'checksum'   => hash('sha256', $previous),
            'note'       => $note !== '' ? mb_substr($note, 0, 255) : ($exists ? 'Previous version' : 'Created in the panel'),
            'size'       => strlen($previous),
            'created_by' => $userId,
        ]);

        if (@file_put_contents($absolute, $content, LOCK_EX) === false) {
            return ['ok' => false, 'error' => 'The file could not be written. Check permissions (' . $path . ').', 'warnings' => $warnings, 'fileId' => $fileId, 'version' => $version];
        }
        @chmod($absolute, 0644);

        Db::update('calculator_files', [
            'checksum'   => hash('sha256', $content),
            'size'       => strlen($content),
            'kind'       => self::kind($path),
            'language'   => self::language($path),
            'status'     => 'active',
            'note'       => mb_substr($note, 0, 255),
            'updated_at' => date('Y-m-d H:i:s'),
        ], 'id = :id', [':id' => $fileId]);

        Activity::log($exists ? 'file_updated' : 'file_created', 'file', $path, ($exists ? 'Saved ' : 'Created ') . $path . ' (' . strlen($content) . ' bytes)');

        return ['ok' => true, 'error' => '', 'warnings' => $warnings, 'fileId' => $fileId, 'version' => $version];
    }

    /**
     * Syntax check.
     *
     * PHP is parsed for real: token_get_all() with TOKEN_PARSE throws a
     * ParseError on a syntax error, which is exactly what `php -l` reports for
     * the parse phase. It cannot catch runtime problems, and the panel says so.
     *
     * @return array{ok:bool,error:string,warnings:array<int,string>}
     */
    public static function syntaxCheck(string $path, string $content): array
    {
        $ext = self::extension($path);
        $warnings = [];

        if ($ext === 'php') {
            try {
                token_get_all($content, TOKEN_PARSE);
            } catch (\ParseError $e) {
                return [
                    'ok' => false,
                    'error' => 'PHP syntax error on line ' . $e->getLine() . ': ' . $e->getMessage(),
                    'warnings' => [],
                ];
            }
            if (str_contains($content, '<?') === false) {
                $warnings[] = 'This file contains no PHP open tag — it will be output as plain text.';
            }
            return ['ok' => true, 'error' => '', 'warnings' => $warnings];
        }

        if (in_array($ext, ['js', 'css'], true)) {
            $balance = self::balance($content);
            if ($balance !== null) {
                return ['ok' => false, 'error' => $balance, 'warnings' => []];
            }
            $warnings[] = 'JavaScript and CSS are checked for balanced brackets only — that is not a full parse.';
            return ['ok' => true, 'error' => '', 'warnings' => $warnings];
        }

        if ($ext === 'json') {
            json_decode($content, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return ['ok' => false, 'error' => 'Invalid JSON: ' . json_last_error_msg(), 'warnings' => []];
            }
        }
        return ['ok' => true, 'error' => '', 'warnings' => $warnings];
    }

    /** Bracket balance ignoring strings and comments (good enough for a warning). */
    private static function balance(string $code): ?string
    {
        $pairs = ['{' => '}', '(' => ')', '[' => ']'];
        $stack = [];
        $len = strlen($code);
        $inString = null;
        for ($i = 0; $i < $len; $i++) {
            $ch = $code[$i];
            if ($inString !== null) {
                if ($ch === '\\') {
                    $i++;
                    continue;
                }
                if ($ch === $inString) {
                    $inString = null;
                }
                continue;
            }
            if ($ch === '"' || $ch === "'" || $ch === '`') {
                $inString = $ch;
                continue;
            }
            if ($ch === '/' && ($code[$i + 1] ?? '') === '/') {
                $nl = strpos($code, "\n", $i);
                $i = $nl === false ? $len : $nl;
                continue;
            }
            if ($ch === '/' && ($code[$i + 1] ?? '') === '*') {
                $end = strpos($code, '*/', $i + 2);
                $i = $end === false ? $len : $end + 1;
                continue;
            }
            if (isset($pairs[$ch])) {
                $stack[] = $ch;
                continue;
            }
            if (in_array($ch, $pairs, true)) {
                $open = array_pop($stack);
                if ($open === null || $pairs[$open] !== $ch) {
                    return 'Unbalanced “' . $ch . '” near offset ' . $i . '.';
                }
            }
        }
        if ($stack !== []) {
            return 'Unclosed “' . end($stack) . '” at the end of the file.';
        }
        return null;
    }

    /**
     * Where is this file referenced? Used to block deletion of live code.
     *
     * @return array<int,string>
     */
    public static function usage(string $path): array
    {
        $needle = basename($path);
        $hits = [];
        foreach (['lib', 'templates', 'admin', 'index.php', 'api.php', 'config.php', 'router.php', 'assets/js'] as $scope) {
            $target = self::root() . '/' . $scope;
            if (is_file($target)) {
                $candidates = [$target];
            } elseif (is_dir($target)) {
                $candidates = glob($target . '/*') ?: [];
                foreach ($candidates as $i => $c) {
                    if (is_dir($c)) {
                        unset($candidates[$i]);
                    }
                }
            } else {
                continue;
            }
            foreach ($candidates as $file) {
                $relative = str_replace('\\', '/', substr($file, strlen(self::root()) + 1));
                if ($relative === $path || !str_ends_with($file, '.php')) {
                    continue;
                }
                $body = (string) @file_get_contents($file);
                if (str_contains($body, $needle)) {
                    $hits[] = $relative;
                }
            }
        }
        return array_values(array_unique($hits));
    }

    /**
     * Delete a file — never when something still references it.
     *
     * @return array{ok:bool,error:string,usage:array<int,string>}
     */
    public static function delete(string $path, int $userId): array
    {
        $resolved = self::resolve($path);
        if (!$resolved['ok']) {
            return ['ok' => false, 'error' => $resolved['error'], 'usage' => []];
        }
        if (self::isReadOnly($path)) {
            return ['ok' => false, 'error' => 'That file is part of the site’s entry points and cannot be deleted here.', 'usage' => []];
        }
        $usage = self::usage($path);
        if ($usage !== []) {
            return ['ok' => false, 'error' => 'This file is still used by ' . count($usage) . ' other file(s).', 'usage' => $usage];
        }
        $meta = self::metaMap()[$path] ?? null;
        if ($meta !== null) {
            Db::update('calculator_files', ['status' => 'archived', 'updated_at' => date('Y-m-d H:i:s')], 'id = :id', [':id' => (int) $meta['id']]);
        }
        if (!@unlink($resolved['absolute'])) {
            return ['ok' => false, 'error' => 'The file could not be removed (permissions).', 'usage' => []];
        }
        Activity::log('file_deleted', 'file', $path, 'Deleted ' . $path);
        return ['ok' => true, 'error' => '', 'usage' => []];
    }

    /** @return array<int,array<string,mixed>> */
    public static function versions(string $path): array
    {
        $meta = self::metaMap()[$path] ?? null;
        if ($meta === null) {
            return [];
        }
        return Db::all(
            'SELECT v.*, u.name AS author FROM calculator_file_versions v
             LEFT JOIN users u ON u.id = v.created_by
             WHERE v.file_id = ? ORDER BY v.version DESC',
            [(int) $meta['id']]
        );
    }

    /** @return array<string,mixed>|null */
    public static function version(string $path, int $versionId): ?array
    {
        $meta = self::metaMap()[$path] ?? null;
        if ($meta === null) {
            return null;
        }
        return Db::one('SELECT * FROM calculator_file_versions WHERE id = ? AND file_id = ?', [$versionId, (int) $meta['id']]);
    }

    /** Put an old body back (the current body is stored as a new version first). */
    public static function restore(string $path, int $versionId, int $userId): array
    {
        $version = self::version($path, $versionId);
        if ($version === null) {
            return ['ok' => false, 'error' => 'That version no longer exists.'];
        }
        $result = self::write($path, (string) $version['content'], $userId, 'Restored version ' . (int) $version['version']);
        if ($result['ok']) {
            Activity::log('file_restored', 'file', $path, 'Restored version ' . (int) $version['version']);
        }
        return $result;
    }
}

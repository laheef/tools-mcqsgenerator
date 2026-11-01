<?php
/**
 * MediaRepo — uploads, listing and safe deletion for the media library.
 *
 * Files land in /uploads/media/YYYY/MM/ with a randomised name so an upload can
 * never overwrite or shadow an existing file, and so a guessable URL cannot be
 * used to enumerate the library. The original filename is kept in the database
 * for display only.
 *
 * Uploaded files are never executed: uploads/ ships with an .htaccess that turns
 * off PHP for the whole tree, and the router refuses to hand anything there to
 * the PHP interpreter.
 */

declare(strict_types=1);


namespace Omni\Admin;

// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Omni\Db;

final class MediaRepo
{
    public const MAX_BYTES = 8 * 1024 * 1024; // 8 MB per file

    /** Allowed extensions mapped to the mime types we accept for them. */
    private const ALLOWED = [
        'jpg'  => ['image/jpeg'],
        'jpeg' => ['image/jpeg'],
        'png'  => ['image/png'],
        'gif'  => ['image/gif'],
        'webp' => ['image/webp'],
        'avif' => ['image/avif'],
        'svg'  => ['image/svg+xml'],
        'pdf'  => ['application/pdf'],
        'txt'  => ['text/plain'],
        'csv'  => ['text/plain', 'text/csv', 'application/csv'],
        'zip'  => ['application/zip', 'application/x-zip-compressed'],
        'mp4'  => ['video/mp4'],
    ];

    public static function dir(string $sub = ''): string
    {
        $base = ADMIN_UPLOADS . '/media';
        return $sub === '' ? $base : rtrim($base . '/' . trim($sub, '/'), '/');
    }

    public static function ensureDir(): bool
    {
        $dir = self::dir(date('Y/m'));
        if (!is_dir($dir) && !@mkdir($dir, 0755, true) && !is_dir($dir)) {
            return false;
        }
        return is_writable($dir);
    }

    /** Public URL for a stored relative path ("uploads/media/2026/10/x.jpg"). */
    public static function url(string $path): string
    {
        // Stored paths are relative to the install root ("uploads/media/x.png");
        // under /tool they must be served from /tool/uploads/..., not /uploads/...
        return upload_url($path);
    }

    /** Absolute path for a stored relative path, refusing anything outside uploads/. */
    public static function absolute(string $path): ?string
    {
        $clean = ltrim(str_replace('\\', '/', $path), '/');
        if ($clean === '' || str_contains($clean, '..') || !str_starts_with($clean, 'uploads/')) {
            return null;
        }
        return dirname(ADMIN_UPLOADS) . '/' . $clean;
    }

    /**
     * Store one uploaded file.
     *
     * @param array{name:string,type:string,tmp_name:string,error:int,size:int} $file
     * @return array{ok:bool,error:string,id:int,path:string,url:string}
     */
    public static function upload(array $file, int $userId): array
    {
        $fail = static fn (string $msg): array => ['ok' => false, 'error' => $msg, 'id' => 0, 'path' => '', 'url' => ''];

        if (($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
            return $fail('No file was received.');
        }
        if (($file['error'] ?? 0) !== UPLOAD_ERR_OK) {
            return $fail(match ((int) $file['error']) {
                UPLOAD_ERR_INI_SIZE, UPLOAD_ERR_FORM_SIZE => 'The file is larger than this server allows (' . ini_get('upload_max_filesize') . ').',
                UPLOAD_ERR_PARTIAL   => 'The upload was interrupted. Try again.',
                UPLOAD_ERR_NO_TMP_DIR => 'The server has no temporary folder for uploads.',
                UPLOAD_ERR_CANT_WRITE => 'The server could not write the file to disk.',
                default => 'The upload failed (error ' . (int) $file['error'] . ').',
            });
        }
        if (!is_uploaded_file((string) $file['tmp_name'])) {
            return $fail('That file did not arrive through an upload.');
        }
        $size = (int) ($file['size'] ?? 0);
        if ($size <= 0) {
            return $fail('The file is empty.');
        }
        if ($size > self::MAX_BYTES) {
            return $fail('Files over ' . self::humanSize(self::MAX_BYTES) . ' are not allowed.');
        }

        $original = (string) ($file['name'] ?? 'file');
        $ext = strtolower(pathinfo($original, PATHINFO_EXTENSION));
        if (!isset(self::ALLOWED[$ext])) {
            return $fail('That file type is not allowed. Allowed: ' . implode(', ', array_keys(self::ALLOWED)) . '.');
        }

        // Real content type from the bytes, not from the browser.
        $mime = 'application/octet-stream';
        if (function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            if ($finfo !== false) {
                $mime = (string) finfo_file($finfo, (string) $file['tmp_name']);
                finfo_close($finfo);
            }
        }
        if (!in_array($mime, self::ALLOWED[$ext], true)) {
            // SVG and CSV lie often enough that a mismatch is usually an attack
            return $fail('The file content (' . $mime . ') does not match its extension (.' . $ext . ').');
        }
        if ($ext === 'svg') {
            $svg = (string) file_get_contents((string) $file['tmp_name'], false, null, 0, 8192);
            if (preg_match('~<script|onload=|onerror=|javascript:|<!ENTITY~i', $svg) === 1) {
                return $fail('That SVG contains script or event handlers and was rejected.');
            }
        }

        if (!self::ensureDir()) {
            return $fail('The uploads/media folder is not writable. Create it with permissions 755.');
        }

        $relativeDir = 'uploads/media/' . date('Y/m');
        $stored = date('Ymd-His') . '-' . bin2hex(random_bytes(6)) . '.' . $ext;
        $target = self::dir(date('Y/m')) . '/' . $stored;
        if (!@move_uploaded_file((string) $file['tmp_name'], $target)) {
            return $fail('The file could not be saved. Check the folder permissions.');
        }
        @chmod($target, 0644);

        [$width, $height] = self::dimensions($target, $ext);
        $relative = $relativeDir . '/' . $stored;

        $id = Db::insert('media', [
            'filename'    => mb_substr($original, 0, 255),
            'stored_name' => $stored,
            'path'        => $relative,
            'mime'        => $mime,
            'size'        => $size,
            'width'       => $width,
            'height'      => $height,
            'alt'         => '',
            'caption'     => '',
            'uploaded_by' => $userId,
        ]);
        Activity::log('media_upload', 'media', (string) $id, 'Uploaded ' . $original . ' (' . self::humanSize($size) . ')');

        return ['ok' => true, 'error' => '', 'id' => $id, 'path' => $relative, 'url' => self::url($relative)];
    }

    /** @return array{0:int,1:int} */
    private static function dimensions(string $path, string $ext): array
    {
        if (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif'], true)) {
            return [0, 0];
        }
        $info = @getimagesize($path);
        if (!is_array($info)) {
            return [0, 0];
        }
        return [(int) $info[0], (int) $info[1]];
    }

    /** @return array<int,array<string,mixed>> */
    public static function query(string $q = '', string $type = '', int $limit = 60, int $offset = 0): array
    {
        $sql = 'SELECT * FROM media WHERE 1 = 1';
        $params = [];
        if ($q !== '') {
            $sql .= ' AND (filename LIKE ? OR alt LIKE ? OR caption LIKE ?)';
            $like = '%' . $q . '%';
            $params = [$like, $like, $like];
        }
        if ($type !== '') {
            if ($type === 'image') {
                $sql .= " AND mime LIKE 'image/%'";
            } else {
                $sql .= " AND mime NOT LIKE 'image/%'";
            }
        }
        $sql .= ' ORDER BY id DESC LIMIT ' . max(1, min(200, $limit)) . ' OFFSET ' . max(0, $offset);
        return Db::all($sql, $params);
    }

    public static function count(string $q = '', string $type = ''): int
    {
        $sql = 'SELECT COUNT(*) FROM media WHERE 1 = 1';
        $params = [];
        if ($q !== '') {
            $sql .= ' AND (filename LIKE ? OR alt LIKE ? OR caption LIKE ?)';
            $like = '%' . $q . '%';
            $params = [$like, $like, $like];
        }
        if ($type !== '') {
            $sql .= $type === 'image' ? " AND mime LIKE 'image/%'" : " AND mime NOT LIKE 'image/%'";
        }
        return (int) Db::value($sql, $params, 0);
    }

    /** @return array{count:int,bytes:int,human_size:string}
     */
    public static function stats(): array
    {
        $count = (int) Db::value('SELECT COUNT(*) FROM media', [], 0);
        $bytes = (int) Db::value('SELECT COALESCE(SUM(size), 0) FROM media', [], 0);
        return ['count' => $count, 'bytes' => $bytes, 'human_size' => self::humanSize($bytes)];
    }

    /**
     * Where is this media file referenced?
     *
     * @return array<int,array{type:string,label:string,url:string}>
     */
    public static function usage(int $id): array
    {
        $row = Db::one('SELECT * FROM media WHERE id = ?', [$id]);
        if ($row === null) {
            return [];
        }
        $needle = (string) $row['path'];
        $short = '/' . $needle;
        $hits = [];

        $checks = [
            ['calculators', 'thumbnail', 'Calculator image', static fn (array $r): string => admin_url('calculator-edit', ['path' => (string) $r['source_path']])],
            ['posts', 'cover_image', 'Post cover', static fn (array $r): string => admin_url('blog-edit', ['id' => (int) $r['id']])],
            ['posts', 'og_image', 'Post social image', static fn (array $r): string => admin_url('blog-edit', ['id' => (int) $r['id']])],
            ['settings', 'svalue', 'Setting', static fn (array $r): string => admin_url('appearance')],
        ];
        foreach ($checks as [$table, $column, $label, $urlBuilder]) {
            if (!Db::hasTable($table)) {
                continue;
            }
            $rows = Db::all("SELECT * FROM {$table} WHERE {$column} LIKE ?", ['%' . $needle . '%']);
            foreach ($rows as $found) {
                $hits[] = [
                    'type'  => $label,
                    'label' => (string) ($found['name'] ?? $found['title'] ?? $found['skey'] ?? $needle),
                    'url'   => $urlBuilder($found),
                ];
            }
        }
        // page and post bodies
        foreach ([['pages', 'Pages'], ['posts', 'Posts']] as [$table, $label]) {
            $rows = Db::all("SELECT id, title FROM {$table} WHERE content LIKE ?", ['%' . $needle . '%']);
            foreach ($rows as $found) {
                $hits[] = [
                    'type'  => $label . ' content',
                    'label' => (string) $found['title'],
                    'url'   => $table === 'pages' ? admin_url('pages', ['edit' => (int) $found['id']]) : admin_url('blog-edit', ['id' => (int) $found['id']]),
                ];
            }
        }
        unset($short);
        return $hits;
    }

    /**
     * Delete a file — but only when nothing points at it.
     *
     * @return array{ok:bool,error:string,usage:array<int,array<string,mixed>>}
     */
    public static function delete(int $id, bool $force = false): array
    {
        $row = Db::one('SELECT * FROM media WHERE id = ?', [$id]);
        if ($row === null) {
            return ['ok' => false, 'error' => 'That file is already gone.', 'usage' => []];
        }
        $usage = self::usage($id);
        if ($usage !== [] && !$force) {
            return ['ok' => false, 'error' => 'This file is still used in ' . count($usage) . ' place(s).', 'usage' => $usage];
        }
        $absolute = self::absolute((string) $row['path']);
        if ($absolute !== null && is_file($absolute)) {
            @unlink($absolute);
        }
        Db::delete('media', 'id = ?', [$id]);
        Activity::log('media_delete', 'media', (string) $id, 'Deleted ' . $row['filename']);
        return ['ok' => true, 'error' => '', 'usage' => $usage];
    }

    public static function humanSize(int $bytes): string
    {
        if ($bytes < 1024) {
            return $bytes . ' B';
        }
        if ($bytes < 1024 * 1024) {
            return round($bytes / 1024, 1) . ' KB';
        }
        if ($bytes < 1024 * 1024 * 1024) {
            return round($bytes / 1024 / 1024, 1) . ' MB';
        }
        return round($bytes / 1024 / 1024 / 1024, 2) . ' GB';
    }
}

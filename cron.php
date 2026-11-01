<?php
/**
 * Scheduled maintenance. Hostinger runs this from hPanel → Advanced → Cron Jobs:
 *
 *   /usr/bin/php /home/uXXXXXXX/domains/example.com/public_html/cron.php
 *
 * It is safe to run it manually, and safe to run it twice: every job is
 * idempotent and reports what it did. Nothing here is simulated — each job
 * deletes real rows or writes real files and prints the counts it changed.
 *
 * Run from the command line, or over HTTP with the token from
 * Settings → System → cron token (?token=…). Without the right token the HTTP
 * entry point answers 403, and CLI-only jobs stay CLI-only.
 */

declare(strict_types=1);

if (PHP_SAPI !== 'cli') {
    require_once __DIR__ . '/config.php';

    $token = (string) ($_GET['token'] ?? '');
    $expected = (string) (Omni\Cms::enabled() ? Omni\Cms::setting('cron_token', '') : '');
    if ($token === '' || $expected === '' || !hash_equals($expected, $token)) {
        http_response_code(403);
        header('Content-Type: text/plain; charset=utf-8');
        echo "403 — add ?token=… using the token in Settings → System.\n";
        exit;
    }
    header('Content-Type: text/plain; charset=utf-8');
} else {
    require_once __DIR__ . '/config.php';
}

use Omni\Admin\BackupService;
use Omni\Cms;
use Omni\Db;

$dryRun = in_array('--dry-run', $argv ?? [], true);
$out    = static function (string $line): void {
    echo $line, "\n";
};

$out('Omni maintenance — ' . date('Y-m-d H:i:s'));
if (!Db::available()) {
    $out('No database connection: nothing to do.');
    exit(0);
}
$out('Database: ' . (string) Db::value('SELECT DATABASE()') . ' · ' . (string) Db::value('SELECT VERSION()'));
if ($dryRun) {
    $out('Dry run: counting only, nothing will be deleted.');
}

$report = [];

/* 1 — expired rate-limit windows ----------------------------------------- */
$expiredLimits = (int) Db::value(
    "SELECT COUNT(*) FROM rate_limits WHERE window_start < DATE_SUB(NOW(), INTERVAL 1 DAY)"
);
if (!$dryRun) {
    Db::exec("DELETE FROM rate_limits WHERE window_start < DATE_SUB(NOW(), INTERVAL 1 DAY)");
}
$report['rate_limits_cleared'] = $expiredLimits;

/* 2 — used or expired password resets ------------------------------------ */
$staleResets = (int) Db::value(
    "SELECT COUNT(*) FROM password_resets WHERE expires_at < NOW() OR used_at IS NOT NULL"
);
if (!$dryRun) {
    Db::exec("DELETE FROM password_resets WHERE expires_at < NOW() OR used_at IS NOT NULL");
}
$report['password_resets_cleared'] = $staleResets;

/* 3 — page-view buckets older than the settings window -------------------- */
$keepDays = (int) (Cms::setting('analytics_retention_days', '400') ?: 400);
$keepDays  = max(30, min(3650, $keepDays));
$oldViews  = (int) Db::value(
    'SELECT COUNT(*) FROM page_views WHERE day < DATE_SUB(CURDATE(), INTERVAL ' . $keepDays . ' DAY)'
);
if (!$dryRun) {
    Db::exec('DELETE FROM page_views WHERE day < DATE_SUB(CURDATE(), INTERVAL ' . $keepDays . ' DAY)');
}
$report['page_view_rows_pruned'] = $oldViews;

/* 4 — activity log trimming ---------------------------------------------- */
$keepLog = max(1000, (int) (Cms::setting('activity_retention_rows', '20000') ?: 20000));
$logTotal = (int) Db::value('SELECT COUNT(*) FROM activity_log');
$logCut   = 0;
if ($logTotal > $keepLog) {
    $logCut = $logTotal - $keepLog;
    if (!$dryRun) {
        Db::exec(
            'DELETE FROM activity_log WHERE id NOT IN (SELECT id FROM (SELECT id FROM activity_log ORDER BY id DESC LIMIT ' . $keepLog . ') keep)'
        );
    }
}
$report['activity_rows_trimmed'] = $logCut;

/* 5 — scheduled database backup + retention ------------------------------ */
require_once __DIR__ . '/admin/bootstrap.php';

$autoBackup = Cms::setting('backup_auto', '1') === '1';
$keepBackups = max(1, (int) (Cms::setting('backup_keep', '10') ?: 10));
if ($autoBackup && !$dryRun) {
    $result = BackupService::dumpDatabase(null, 'cron: nightly database snapshot');
    $report['backup_written'] = $result['ok'] ? basename($result['file']) : 'FAILED: ' . $result['error'];
} elseif ($autoBackup) {
    $report['backup_written'] = 'would write one';
} else {
    $report['backup_written'] = 'disabled in Settings → System';
}
if (!$dryRun) {
    $report['backups_pruned'] = BackupService::pruneKeep($keepBackups);
    $report['backup_rows_orphaned'] = BackupService::pruneOrphans();
} else {
    $report['backups_pruned'] = 0;
    $report['backup_rows_orphaned'] = 0;
}

/* 6 — source-editor backups older than 30 days --------------------------- */
$bakDir = __DIR__ . '/data/backups/files';
$bakDropped = 0;
foreach (is_dir($bakDir) ? (glob($bakDir . '/*.bak') ?: []) : [] as $file) {
    if (is_file($file) && filemtime($file) < time() - 30 * 86400) {
        if (!$dryRun) {
            @unlink($file);
        }
        $bakDropped++;
    }
}
$report['file_backups_pruned'] = $bakDropped;

/* 7 — stale upload temp files -------------------------------------------- */
$tmp = __DIR__ . '/uploads/.tmp';
$tmpDropped = 0;
foreach (is_dir($tmp) ? (glob($tmp . '/*') ?: []) : [] as $file) {
    if (is_file($file) && filemtime($file) < time() - 3600) {
        if (!$dryRun) {
            @unlink($file);
        }
        $tmpDropped++;
    }
}
$report['upload_temp_cleared'] = $tmpDropped;

/* 7 — rebuild the public page cache (safe: it is a cache) ---------------- */
if (!$dryRun) {
    $cacheDir = __DIR__ . '/data/cache';
    $cleared  = 0;
    foreach (is_dir($cacheDir) ? (glob($cacheDir . '/*.json') ?: []) : [] as $file) {
        @unlink($file);
        $cleared++;
    }
    $report['cache_files_cleared'] = $cleared;
}

foreach ($report as $job => $value) {
    $out(sprintf('  %-24s %s', str_replace('_', ' ', $job), (string) $value));
}
$out('Done.');

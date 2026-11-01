<?php
/**
 * Dashboard — every number here comes from MySQL or from the catalogue files on
 * this request. Nothing is a placeholder: if there is no traffic yet, the
 * traffic panels say so instead of showing invented figures.
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Activity;
use Onim\Admin\Auth;
use Onim\Admin\CalcRepo;
use Onim\Admin\Flash;
use Onim\Admin\MediaRepo;
use Onim\Admin\Csrf;
use Onim\Admin\Migrator;
use Onim\Cms;
use Onim\Data;
use Onim\Db;

/*
 * An upgraded install can be running one release of the files against a
 * database created by an earlier one — exactly the situation on shared hosting,
 * where nobody can run a migration by hand. The dashboard offers the pending
 * migration as one button instead of failing on a missing column.
 */
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST' && post('do') === 'upgrade') {
    Csrf::requirePost();
    Csrf::assert();
    if (!Auth::isAdmin()) {
        Flash::error('Only an administrator can upgrade the database schema.');
    } else {
        $upgrade = Migrator::run();
        if ($upgrade['errors'] !== []) {
            foreach ($upgrade['errors'] as $error) {
                Flash::error($error);
            }
        } elseif ($upgrade['applied'] === []) {
            Flash::info('There was nothing to apply — the database is already current.');
        } else {
            Activity::log('schema_upgraded', 'system', '', 'Applied ' . implode(', ', $upgrade['applied']));
            Flash::success('Database updated: ' . implode(', ', $upgrade['applied']) . '.');
        }
    }
    redirect_to(admin_url('dashboard'));
}

$pendingMigrations = Migrator::pending();

$calc = CalcRepo::stats();

$count = static function (string $sql, array $params = []) : int {
    return (int) Db::value($sql, $params, 0);
};

$posts = [
    'published' => $count("SELECT COUNT(*) FROM posts WHERE status = 'published' AND published_at <= NOW()"),
    'draft'     => $count("SELECT COUNT(*) FROM posts WHERE status = 'draft'"),
    'scheduled' => $count("SELECT COUNT(*) FROM posts WHERE status IN ('scheduled','published') AND published_at > NOW()"),
];
$pagesCount = $count("SELECT COUNT(*) FROM pages WHERE status = 'published'");
$messageCounts = [
    'unread'   => $count("SELECT COUNT(*) FROM messages WHERE status = 'unread'"),
    'total'    => $count('SELECT COUNT(*) FROM messages'),
    'resolved' => $count("SELECT COUNT(*) FROM messages WHERE status = 'resolved'"),
    'failed'   => $count("SELECT COUNT(*) FROM messages WHERE mail_status = 'failed'"),
];
$media = MediaRepo::stats();
$usersCount = [
    'active' => $count("SELECT COUNT(*) FROM users WHERE status = 'active'"),
    'total'  => $count('SELECT COUNT(*) FROM users'),
];

$viewsToday = $count('SELECT COALESCE(SUM(hits), 0) FROM page_views WHERE day = CURDATE()');
$viewsWeek  = $count('SELECT COALESCE(SUM(hits), 0) FROM page_views WHERE day >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)');
/* Zero-fill the 14-day window so the chart always has one bar per day. */
$rawSeries = Db::all('SELECT day, SUM(hits) AS hits FROM page_views
                      WHERE day >= DATE_SUB(CURDATE(), INTERVAL 13 DAY)
                      GROUP BY day ORDER BY day');
$byDay = [];
foreach ($rawSeries as $point) {
    $byDay[(string) $point['day']] = (int) $point['hits'];
}
$viewsSeries = [];
for ($i = 13; $i >= 0; $i--) {
    $day = date('Y-m-d', strtotime("-{$i} days"));
    $viewsSeries[] = ['day' => $day, 'hits' => $byDay[$day] ?? 0];
}
$topPages = Db::all('SELECT path, SUM(hits) AS hits FROM page_views
                     WHERE day >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)
                     GROUP BY path ORDER BY hits DESC LIMIT 8');

$recentMessages = Db::all('SELECT id, name, email, subject, status, created_at FROM messages ORDER BY id DESC LIMIT 6');
$recentActivity = Activity::recent(12);
$recentPosts = Db::all('SELECT id, title, status, published_at, updated_at FROM posts ORDER BY updated_at DESC LIMIT 5');
$recentCalcs = Db::all('SELECT source_path, name, status, updated_at FROM calculators ORDER BY updated_at DESC LIMIT 6');

$dbSize = (int) Db::value(
    'SELECT COALESCE(SUM(data_length + index_length), 0) FROM information_schema.tables WHERE table_schema = DATABASE()',
    [],
    0
);
$system = [
    'php'        => PHP_VERSION,
    'mysql'      => (string) Db::value('SELECT VERSION()', [], 'unknown'),
    'db_size'    => $dbSize,
    'db_name'    => (string) (onim_db_config()['name'] ?? ''),
    'server'     => (string) ($_SERVER['SERVER_SOFTWARE'] ?? 'unknown'),
    'limits'     => ini_get('memory_limit'),
    'uploads'    => ini_get('upload_max_filesize'),
    'timezone'   => date_default_timezone_get(),
];

// A one-off verification the panel can actually prove: are all article files present?
$missing = $calc['missing'];

$pageTitle = 'Dashboard';
$title = $pageTitle;
$wide = true;
$topbarActions = [
    ['label' => 'View site', 'url' => site_link('/'), 'icon' => 'external'],
    ['label' => 'New post', 'url' => admin_url('blog-edit'), 'icon' => 'plus', 'class' => 'btn-primary'],
];

render('dashboard', compact(
    'calc', 'posts', 'pagesCount', 'messageCounts', 'media', 'usersCount',
    'viewsToday', 'viewsWeek', 'viewsSeries', 'topPages', 'recentMessages',
    'recentActivity', 'recentPosts', 'recentCalcs', 'system', 'missing', 'pendingMigrations',
    'pageTitle', 'title', 'wide', 'topbarActions'
));

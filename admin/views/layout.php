<?php
/**
 * Panel layout: sidebar + topbar + content well.
 *
 * @var string $content
 * @var array|null $currentUser
 * @var array $flashes
 * @var string $page
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Auth;
use Onim\Admin\Csrf;
use Onim\Cms;
use Onim\Db;

require_once __DIR__ . '/partials/icons.php';

$title = $title ?? 'Dashboard';
$pageTitle = $pageTitle ?? $title;
$breadcrumbs = $breadcrumbs ?? [];
$wide = $wide ?? false;
$bodyClass = $bodyClass ?? '';
$theme = Cms::setting('admin_theme', 'light') ?? 'light';
$user = $currentUser;
$role = (string) ($user['role'] ?? '');

$unread = 0;
if ($user !== null && in_array($role, ['administrator', 'editor'], true) && Db::hasTable('messages')) {
    $unread = (int) Db::value("SELECT COUNT(*) FROM messages WHERE status = 'unread'", [], 0);
}

/** @var array<int,array{label:string,items:array<int,array{page:string,label:string,icon:string,badge?:int}>}> $navGroups */
$navGroups = [
    [
        'label' => 'Overview',
        'items' => [
            ['page' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'dashboard'],
        ],
    ],
    [
        'label' => 'Content',
        'items' => [
            ['page' => 'calculators', 'label' => 'Calculators', 'icon' => 'calculator'],
            ['page' => 'custom-calculators', 'label' => 'Custom calculators', 'icon' => 'star'],
            ['page' => 'categories', 'label' => 'Categories', 'icon' => 'grid'],
            ['page' => 'files', 'label' => 'Source files', 'icon' => 'code'],
            ['page' => 'modules', 'label' => 'Modules', 'icon' => 'layout'],
            ['page' => 'pages', 'label' => 'Pages', 'icon' => 'page'],
            ['page' => 'blog', 'label' => 'Blog', 'icon' => 'blog'],
            ['page' => 'blog-categories', 'label' => 'Blog categories', 'icon' => 'tag'],
            ['page' => 'media', 'label' => 'Media', 'icon' => 'image'],
        ],
    ],
    [
        'label' => 'Site',
        'items' => [
            ['page' => 'homepage', 'label' => 'Homepage', 'icon' => 'home'],
            ['page' => 'navigation', 'label' => 'Header & menu', 'icon' => 'menu'],
            ['page' => 'footer', 'label' => 'Footer', 'icon' => 'layout'],
            ['page' => 'appearance', 'label' => 'Appearance', 'icon' => 'palette'],
            ['page' => 'ads', 'label' => 'Advertising', 'icon' => 'chart'],
            ['page' => 'seo', 'label' => 'SEO', 'icon' => 'search'],
            ['page' => 'forms', 'label' => 'Contact form', 'icon' => 'mail'],
        ],
    ],
    [
        'label' => 'People',
        'items' => [
            ['page' => 'inbox', 'label' => 'Inbox', 'icon' => 'inbox', 'badge' => $unread],
            ['page' => 'users', 'label' => 'Users', 'icon' => 'users'],
            ['page' => 'activity', 'label' => 'Activity log', 'icon' => 'activity'],
        ],
    ],
    [
        'label' => 'System',
        'items' => [
            ['page' => 'settings', 'label' => 'Settings', 'icon' => 'settings'],
            ['page' => 'backups', 'label' => 'Backups', 'icon' => 'database'],
        ],
    ],
];
?>
<!DOCTYPE html>
<html lang="en" data-theme="<?= e($theme) ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title><?= e($pageTitle) ?> · <?= e(Cms::siteName()) ?> admin</title>
<link rel="stylesheet" href="<?= e(admin_asset('admin.css')) ?>">
<link rel="icon" href="<?= e(Cms::faviconUrl()) ?>">
</head>
<body class="<?= e($bodyClass) ?>" data-admin-base="<?= e(admin_base()) ?>">
<a class="skip-link" href="#main-content">Skip to content</a>

<div class="admin">
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <a href="<?= e(admin_url('dashboard')) ?>">
                <span class="mark" aria-hidden="true">O</span>
                <span class="site"><?= e(Cms::siteName()) ?><span>Admin</span></span>
            </a>
        </div>

        <nav class="nav" aria-label="Admin sections">
            <?php
            // An editor page highlights the list it belongs to.
            $activePage = [
                'calculator-edit'        => 'calculators',
                'custom-calculator-edit' => 'custom-calculators',
                'blog-edit'              => 'blog',
                'file-edit'              => 'files',
            ][$page] ?? $page;
            ?>
            <?php foreach ($navGroups as $group): ?>
                <?php
                $visible = array_values(array_filter($group['items'], static fn (array $item): bool => Auth::can($item['page'])));
                if ($visible === []) {
                    continue;
                }
                ?>
                <div class="nav-group">
                    <h2><?= e($group['label']) ?></h2>
                    <?php foreach ($visible as $item): ?>
                        <a href="<?= e(admin_url($item['page'])) ?>"
                           class="<?= $activePage === $item['page'] ? 'is-active' : '' ?>"
                           <?= $activePage === $item['page'] ? 'aria-current="page"' : '' ?>>
                            <?= admin_icon($item['icon']) ?>
                            <span><?= e($item['label']) ?></span>
                            <?php if (!empty($item['badge'])): ?>
                                <span class="count <?= $item['page'] === 'inbox' ? 'alert' : '' ?>"><?= (int) $item['badge'] ?></span>
                            <?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </nav>

        <div class="sidebar-foot">
            <a href="<?= e(site_link('/')) ?>" target="_blank" rel="noopener">View site <?= admin_icon('external', 13) ?></a>
            <div style="margin-top:6px">Panel v<?= e(ADMIN_VERSION) ?></div>
        </div>
    </aside>

    <div class="main">
        <header class="topbar">
            <button class="menu-toggle" type="button" data-nav-toggle aria-expanded="false" aria-controls="sidebar" aria-label="Toggle navigation">
                <?= admin_icon('menu', 20) ?>
            </button>
            <div>
                <?php if ($breadcrumbs !== []): ?>
                    <p class="crumb">
                        <?php foreach ($breadcrumbs as $i => $crumb): ?>
                            <?php if ($i > 0): ?> <span aria-hidden="true">/</span> <?php endif; ?>
                            <?php if (!empty($crumb['url'])): ?>
                                <a href="<?= e($crumb['url']) ?>"><?= e($crumb['label']) ?></a>
                            <?php else: ?>
                                <?= e($crumb['label']) ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </p>
                <?php endif; ?>
                <h1><?= e($pageTitle) ?></h1>
            </div>

            <div class="topbar-actions">
                <?php foreach (($topbarActions ?? []) as $action): ?>
                    <a class="btn btn-sm <?= e($action['class'] ?? '') ?>" href="<?= e($action['url']) ?>"
                       <?= !empty($action['confirm']) ? 'data-confirm="' . e($action['confirm']) . '"' : '' ?>>
                        <?= !empty($action['icon']) ? admin_icon($action['icon'], 15) : '' ?><?= e($action['label']) ?>
                    </a>
                <?php endforeach; ?>

                <div class="row tight">
                    <span class="avatar" aria-hidden="true"><?= e(mb_strtoupper(mb_substr((string) ($user['name'] ?? '?'), 0, 1))) ?></span>
                    <div class="small">
                        <div style="font-weight:600"><?= e((string) ($user['name'] ?? 'Unknown')) ?></div>
                        <div class="muted"><?= e(ucfirst($role)) ?></div>
                    </div>
                </div>
                <a class="btn btn-sm btn-ghost" href="<?= e(admin_url('account')) ?>" title="Your account"><?= admin_icon('user', 16) ?></a>
                <form method="post" action="<?= e(admin_url('logout')) ?>" style="display:inline">
                    <?= Csrf::field() ?>
                    <button class="btn btn-sm btn-ghost" type="submit" title="Sign out"><?= admin_icon('logout', 16) ?></button>
                </form>
            </div>
        </header>

        <main class="content <?= $wide ? 'is-wide' : '' ?>" id="main-content">
            <?= $content ?>
        </main>
    </div>
</div>

<div class="toasts" role="status" aria-live="polite">
    <?php foreach (($flashes ?? []) as $flash): ?>
        <div class="toast <?= e($flash['type']) ?>">
            <div style="flex:1"><?= e($flash['message']) ?></div>
            <button type="button" aria-label="Dismiss">×</button>
        </div>
    <?php endforeach; ?>
</div>

<div class="modal" id="media-picker" role="dialog" aria-modal="true" aria-label="Choose an image">
    <div class="modal-backdrop" data-media-close></div>
    <div class="modal-panel">
        <div class="modal-head">
            <h2>Media library</h2>
            <button class="btn btn-sm btn-ghost spacer" type="button" data-media-close aria-label="Close"><?= admin_icon('x', 16) ?></button>
        </div>
        <div class="modal-body">
            <div class="field">
                <label for="media-picker-search" class="sr-only">Search media</label>
                <input id="media-picker-search" type="search" placeholder="Search by filename…" autocomplete="off">
            </div>
            <div id="media-picker-grid" class="media-grid"></div>
        </div>
        <div class="modal-foot">
            <a class="btn" href="<?= e(admin_url('media')) ?>">Open media library</a>
            <button class="btn btn-primary" type="button" data-media-close>Close</button>
        </div>
    </div>
</div>

<script src="<?= e(admin_asset('admin.js')) ?>" defer></script>
</body>
</html>

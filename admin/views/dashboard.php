<?php
/**
 * @var array $calc
 * @var array $posts
 * @var int $pagesCount
 * @var array $messageCounts
 * @var array $media
 * @var array $usersCount
 * @var int $viewsToday
 * @var int $viewsWeek
 * @var array $viewsSeries
 * @var array $topPages
 * @var array $recentMessages
 * @var array $recentActivity
 * @var array $recentPosts
 * @var array $recentCalcs
 * @var array $system
 * @var int $missing
 * @var array $pendingMigrations  migration files this database has not seen
 * @var array|null $currentUser
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Omni\Admin\Auth;
use Omni\Admin\Csrf;
use Omni\Cms;

$max = 1;
foreach ($viewsSeries as $point) {
    $max = max($max, (int) $point['hits']);
}
$greeting = (int) date('G') < 12 ? 'Good morning' : ((int) date('G') < 18 ? 'Good afternoon' : 'Good evening');
?>
<div class="stack" style="gap:18px">

    <?php if (($pendingMigrations ?? []) !== []): ?>
        <div class="card" style="border-color:var(--warn,#d97706)">
            <div class="card-head">
                <h2><?= admin_icon('settings', 16) ?> Database update available</h2>
                <span class="spacer"></span>
                <span class="badge badge-warn"><?= count($pendingMigrations) ?> pending</span>
            </div>
            <div class="card-body">
                <p style="margin:0 0 10px" class="small">
                    This database has not seen
                    <code><?= e(implode(', ', array_map('strval', $pendingMigrations))) ?></code>.
                    The files are newer than the schema — usually the case after updating the site on
                    shared hosting. Nothing is lost by applying it: each file runs once and is recorded in
                    <code>schema_migrations</code>.
                </p>
                <form method="post" action="<?= e(admin_url('dashboard')) ?>">
                    <?= Csrf::field() ?>
                    <input type="hidden" name="do" value="upgrade">
                    <button class="btn btn-primary" type="submit">
                        <?= admin_icon('check', 14) ?> Apply <?= count($pendingMigrations) === 1 ? 'the update' : 'the updates' ?>
                    </button>
                </form>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div>
            <h2 style="margin:0 0 2px;font-size:20px"><?= e($greeting) ?>, <?= e((string) ($currentUser['name'] ?? '')) ?></h2>
            <p class="muted small" style="margin:0">
                <?= number_format($calc['published']) ?> calculators live ·
                <?= number_format($calc['total']) ?> in the catalogue ·
                <?= (int) $messageCounts['unread'] ?> unread message<?= $messageCounts['unread'] === 1 ? '' : 's' ?>
            </p>
        </div>
        <div class="spacer"></div>
        <a class="btn" href="<?= e(admin_url('calculators')) ?>"><?= admin_icon('calculator', 16) ?> Manage calculators</a>
        <a class="btn btn-primary" href="<?= e(admin_url('blog-edit')) ?>"><?= admin_icon('plus', 16) ?> New post</a>
    </div>

    <?php if ($missing > 0): ?>
        <div class="notice warn">
            <div>
                <strong><?= number_format($missing) ?> calculator<?= $missing === 1 ? '' : 's' ?> missing an article file</strong>
                The definition is in the catalogue but the generated prose file is absent, so the page will render without its
                article. <a href="<?= e(admin_url('calculators', ['flag' => 'missing'])) ?>">Review the list</a>.
            </div>
        </div>
    <?php endif; ?>

    <?php if ($messageCounts['failed'] > 0): ?>
        <div class="notice err">
            <div>
                <strong><?= (int) $messageCounts['failed'] ?> message<?= $messageCounts['failed'] === 1 ? '' : 's' ?> could not be emailed</strong>
                The messages are stored and readable in the inbox, but delivery failed — check <a href="<?= e(admin_url('settings', ['tab' => 'email'])) ?>">Settings → Email</a>.
                <a href="<?= e(admin_url('inbox', ['status' => 'failed'])) ?>">See them</a>.
            </div>
        </div>
    <?php endif; ?>

    <div class="grid grid-4">
        <div class="stat is-brand">
            <div class="label">Calculators live</div>
            <div class="value"><?= number_format($calc['published']) ?></div>
            <div class="hint"><?= number_format($calc['drafts']) ?> draft/archived · <?= number_format($calc['featured']) ?> featured</div>
        </div>
        <div class="stat">
            <div class="label">Page views</div>
            <div class="value"><?= number_format($viewsToday) ?></div>
            <div class="hint">today · <?= number_format($viewsWeek) ?> in the last 7 days</div>
        </div>
        <div class="stat">
            <div class="label">Inbox</div>
            <div class="value"><?= number_format($messageCounts['unread']) ?></div>
            <div class="hint">unread of <?= number_format($messageCounts['total']) ?> total</div>
        </div>
        <div class="stat">
            <div class="label">Media library</div>
            <div class="value"><?= number_format($media['count']) ?></div>
            <div class="hint"><?= e($media['human_size']) ?> on disk</div>
        </div>
    </div>

    <div class="grid grid-sidebar">
        <div class="stack" style="gap:18px">

            <div class="card">
                <div class="card-head">
                    <h2>Traffic — last 14 days</h2>
                    <span class="spacer"></span>
                    <span class="badge badge-muted" title="Counted by this site, one row per page per day">own counter</span>
                </div>
                <div class="card-body">
                    <?php if (array_sum(array_column($viewsSeries, 'hits')) === 0): ?>
                        <div class="empty" style="padding:26px 0">
                            <h3>No views recorded yet</h3>
                            <p class="small">The counter starts on the first visit after installation. Nothing is estimated.</p>
                        </div>
                    <?php else: ?>
                        <div style="display:flex;align-items:stretch;gap:6px;height:170px" role="img"
                             aria-label="Daily page views for the last 14 days, highest day <?= number_format($max) ?> views">
                            <?php foreach ($viewsSeries as $point):
                                $hits = (int) $point['hits'];
                                $h = $hits > 0 ? max(4, (int) round(($hits / $max) * 100)) : 0; ?>
                                <div style="flex:1;display:flex;flex-direction:column;justify-content:flex-end;height:100%"
                                     title="<?= e(date('D j M', strtotime((string) $point['day']))) ?>: <?= number_format($hits) ?> views">
                                    <?php if ($hits > 0): ?>
                                        <div class="small" style="text-align:center;font-size:10px;font-weight:600;margin-bottom:4px"><?= number_format($hits) ?></div>
                                    <?php endif; ?>
                                    <div style="height:<?= $h ?>%;min-height:<?= $hits > 0 ? 4 : 1 ?>px;<?= $hits > 0 ? 'background:linear-gradient(180deg,var(--brand),#7aa9f0)' : 'background:#e5e9f2' ?>;border-radius:4px 4px 2px 2px"></div>
                                    <div class="small muted" style="text-align:center;font-size:10px;margin-top:5px;<?= date('Y-m-d', strtotime((string) $point['day'])) === date('Y-m-d') ? 'font-weight:700;color:var(--ink)' : '' ?>"><?= e(date('j', strtotime((string) $point['day']))) ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card">
                <div class="card-head">
                    <h2>Most viewed pages</h2>
                    <span class="spacer"></span>
                    <span class="muted small">last 30 days</span>
                </div>
                <div class="card-body is-flush">
                    <?php if ($topPages === []): ?>
                        <div class="empty">
                            <h3>Nothing yet</h3>
                            <p class="small">Page counts appear here once visitors arrive.</p>
                        </div>
                    <?php else: ?>
                        <div class="table-wrap">
                            <table class="data">
                                <thead><tr><th>Path</th><th class="num">Views</th><th></th></tr></thead>
                                <tbody>
                                <?php foreach ($topPages as $row): ?>
                                    <tr>
                                        <td class="mono small"><?= e((string) $row['path']) ?></td>
                                        <td class="num"><?= number_format((int) $row['hits']) ?></td>
                                        <td class="actions">
                                            <a class="btn btn-sm btn-ghost" href="<?= e(site_link((string) $row['path'])) ?>" target="_blank" rel="noopener" title="Open page"><?= admin_icon('external', 15) ?></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card">
                <div class="card-head">
                    <h2>Recently edited calculators</h2>
                    <span class="spacer"></span>
                    <a class="btn btn-sm" href="<?= e(admin_url('calculators', ['flag' => 'edited', 'sort' => 'updated'])) ?>">All edits</a>
                </div>
                <div class="card-body is-flush">
                    <?php if ($recentCalcs === []): ?>
                        <div class="empty">
                            <h3>Nothing edited yet</h3>
                            <p class="small">Open a calculator and save a change — it will show up here.</p>
                        </div>
                    <?php else: ?>
                        <div class="table-wrap">
                            <table class="data">
                                <tbody>
                                <?php foreach ($recentCalcs as $row): ?>
                                    <tr>
                                        <td class="primary">
                                            <a href="<?= e(admin_url('calculator-edit', ['path' => (string) $row['source_path']])) ?>"><?= e((string) $row['name']) ?></a>
                                            <span class="sub mono"><?= e((string) $row['source_path']) ?></span>
                                        </td>
                                        <td><span class="badge <?= $row['status'] === 'published' ? 'badge-ok' : 'badge-warn' ?>"><?= e((string) $row['status']) ?></span></td>
                                        <td class="small muted nowrap"><?= e(date('j M Y H:i', strtotime((string) $row['updated_at']))) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card">
                <div class="card-head">
                    <h2>Activity log</h2>
                    <span class="spacer"></span>
                    <?php if (Auth::can('activity')): ?>
                        <a class="btn btn-sm" href="<?= e(admin_url('activity')) ?>">Full log</a>
                    <?php endif; ?>
                </div>
                <div class="card-body is-flush">
                    <?php if ($recentActivity === []): ?>
                        <div class="empty"><h3>No activity yet</h3><p class="small">Every sign-in and save is recorded here.</p></div>
                    <?php else: ?>
                        <div class="table-wrap">
                            <table class="data">
                                <tbody>
                                <?php foreach ($recentActivity as $row): ?>
                                    <tr>
                                        <td style="width:1%"><span class="avatar" aria-hidden="true"><?= e(mb_strtoupper(mb_substr((string) $row['user_name'], 0, 1))) ?></span></td>
                                        <td>
                                            <strong><?= e((string) $row['user_name']) ?></strong>
                                            <span class="muted"><?= e(str_replace('_', ' ', (string) $row['action'])) ?></span>
                                            <span class="sub"><?= e((string) $row['summary']) ?></span>
                                        </td>
                                        <td class="small muted nowrap"><?= e(date('j M, H:i', strtotime((string) $row['created_at']))) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="stack" style="gap:18px">
            <div class="card">
                <div class="card-head"><h2>Quick actions</h2></div>
                <div class="card-body stack" style="gap:8px">
                    <?php
                    $quick = [
                        ['calculators', 'Browse the catalogue', 'calculator'],
                        ['calculator-edit', 'Edit a calculator', 'edit'],
                        ['homepage', 'Homepage sections', 'home'],
                        ['navigation', 'Header & menu', 'menu'],
                        ['pages', 'Pages', 'page'],
                        ['media', 'Upload media', 'upload'],
                        ['seo', 'SEO & redirects', 'search'],
                        ['backups', 'Back up the database', 'database'],
                    ];
                    foreach ($quick as [$p, $label, $icon]):
                        if (!Auth::can($p)) { continue; } ?>
                        <a class="btn" style="justify-content:flex-start" href="<?= e(admin_url($p)) ?>">
                            <?= admin_icon($icon, 16) ?> <?= e($label) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="card">
                <div class="card-head"><h2>Content counts</h2></div>
                <div class="card-body">
                    <dl class="kv">
                        <dt>Pages</dt><dd><?= number_format($pagesCount) ?> published</dd>
                        <dt>Blog posts</dt><dd><?= number_format($posts['published']) ?> published · <?= number_format($posts['draft']) ?> draft</dd>
                        <dt>Scheduled</dt><dd><?= number_format($posts['scheduled']) ?></dd>
                        <dt>Categories</dt><dd><?= number_format($calc['categories']) ?></dd>
                        <dt>Users</dt><dd><?= number_format($usersCount['active']) ?> active of <?= number_format($usersCount['total']) ?></dd>
                        <dt>Messages</dt><dd><?= number_format($messageCounts['resolved']) ?> resolved</dd>
                    </dl>
                </div>
            </div>

            <div class="card">
                <div class="card-head"><h2>Latest posts</h2></div>
                <div class="card-body">
                    <?php if ($recentPosts === []): ?>
                        <p class="muted small">No posts yet. <a href="<?= e(admin_url('blog-edit')) ?>">Write the first one</a>.</p>
                    <?php else: ?>
                        <ul style="margin:0;padding-left:16px" class="small">
                            <?php foreach ($recentPosts as $post): ?>
                                <li style="margin-bottom:6px">
                                    <a href="<?= e(admin_url('blog-edit', ['id' => (int) $post['id']])) ?>"><?= e(str_limit((string) $post['title'], 46)) ?></a>
                                    <span class="badge badge-muted"><?= e((string) $post['status']) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card">
                <div class="card-head"><h2>Server</h2></div>
                <div class="card-body">
                    <dl class="kv">
                        <dt>PHP</dt><dd class="mono small"><?= e($system['php']) ?></dd>
                        <dt>MySQL</dt><dd class="mono small"><?= e($system['mysql']) ?></dd>
                        <dt>Database</dt><dd class="mono small"><?= e($system['db_name']) ?></dd>
                        <dt>DB size</dt><dd><?= e(number_format($system['db_size'] / 1024 / 1024, 2)) ?> MB</dd>
                        <dt>Memory limit</dt><dd class="mono small"><?= e((string) $system['limits']) ?></dd>
                        <dt>Upload limit</dt><dd class="mono small"><?= e((string) $system['uploads']) ?></dd>
                        <dt>Timezone</dt><dd class="mono small"><?= e($system['timezone']) ?></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>

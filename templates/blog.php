<?php
/**
 * Blog index: published posts, newest first, with tag filter and pagination.
 *
 * Only posts whose status is `published` *and* whose publish date has passed are
 * listed — a scheduled post stays invisible until its moment, which is the
 * behaviour the panel advertises.
 *
 * @var \Onim\Seo $seo
 * @var array $posts
 * @var array $tags
 * @var int   $page
 * @var int   $pages
 * @var string $activeTag
 */

declare(strict_types=1);

use Onim\View;

$posts = $posts ?? [];
$tags = $tags ?? [];
$page = (int) ($page ?? 1);
$pages = (int) ($pages ?? 1);
$activeTag = (string) ($activeTag ?? '');
$base = $activeTag !== '' ? '/tag/' . $activeTag : '/blog';

$pageUrl = static function (int $n) use ($base): string {
    return $n <= 1 ? $base : $base . '?page=' . $n;
};
?>
<div class="shell page-shell">
    <?= View::breadcrumbs([
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Blog', 'url' => '/blog'],
    ]) ?>

    <header class="page-head">
        <h1 class="page-title"><?= $activeTag !== '' ? 'Posts tagged “' . View::escape($activeTag) . '”' : 'The calculator blog' ?></h1>
        <p class="page-lede">
            How the numbers behind everyday decisions actually work — worked examples,
            short explanations, and links to the calculators that do the arithmetic for you.
        </p>
    </header>

    <?php if ($tags !== []): ?>
        <nav class="chip-row" aria-label="Filter posts by tag">
            <a class="chip<?= $activeTag === '' ? ' is-active' : '' ?>" href="<?= View::escape(View::url('/blog')) ?>">All posts</a>
            <?php foreach ($tags as $tag): ?>
                <a class="chip<?= $activeTag === (string) $tag['slug'] ? ' is-active' : '' ?>"
                   href="<?= View::escape(View::url('/tag/' . $tag['slug'])) ?>">
                    <?= View::escape((string) $tag['name']) ?>
                    <span class="chip-count"><?= (int) $tag['post_count'] ?></span>
                </a>
            <?php endforeach; ?>
        </nav>
    <?php endif; ?>

    <?php if ($posts === []): ?>
        <p class="empty-state">
            <?= $activeTag !== '' ? 'No published posts carry that tag yet.' : 'No posts have been published yet.' ?>
            <?php if ($activeTag !== ''): ?>
                <a href="<?= View::escape(View::url('/blog')) ?>">See every post</a>.
            <?php endif; ?>
        </p>
    <?php else: ?>
        <ul class="post-list">
            <?php foreach ($posts as $post): ?>
                <li class="post-card">
                    <?php if ((string) ($post['cover_image'] ?? '') !== ''): ?>
                        <a class="post-card-media" href="<?= View::escape(View::url('/blog/' . $post['slug'])) ?>" tabindex="-1" aria-hidden="true">
                            <img src="<?= View::escape(View::url((string) $post['cover_image'])) ?>"
                                 alt="<?= View::escape((string) ($post['cover_alt'] ?? '')) ?>"
                                 width="640" height="360" loading="lazy" decoding="async">
                        </a>
                    <?php endif; ?>
                    <div class="post-card-body">
                        <p class="post-card-meta">
                            <time datetime="<?= View::escape(date('Y-m-d', (int) strtotime((string) $post['published_at']))) ?>">
                                <?= View::escape(date('j F Y', (int) strtotime((string) $post['published_at']))) ?>
                            </time>
                            <?php if ((string) ($post['author_name'] ?? '') !== ''): ?>
                                · <?= View::escape((string) $post['author_name']) ?>
                            <?php endif; ?>
                        </p>
                        <h2 class="post-card-title">
                            <a href="<?= View::escape(View::url('/blog/' . $post['slug'])) ?>"><?= View::escape((string) $post['title']) ?></a>
                        </h2>
                        <?php if ((string) ($post['excerpt'] ?? '') !== ''): ?>
                            <p class="post-card-excerpt"><?= View::escape((string) $post['excerpt']) ?></p>
                        <?php endif; ?>
                        <a class="post-card-link" href="<?= View::escape(View::url('/blog/' . $post['slug'])) ?>">
                            Read the post <?= View::icon('arrow-right', 16) ?>
                        </a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

        <?php if ($pages > 1): ?>
            <nav class="pagination" aria-label="Blog pages">
                <?php if ($page > 1): ?>
                    <a class="btn btn-soft" href="<?= View::escape(View::url($pageUrl($page - 1))) ?>" rel="prev">Newer posts</a>
                <?php endif; ?>
                <span class="pagination-info">Page <?= $page ?> of <?= $pages ?></span>
                <?php if ($page < $pages): ?>
                    <a class="btn btn-soft" href="<?= View::escape(View::url($pageUrl($page + 1))) ?>" rel="next">Older posts</a>
                <?php endif; ?>
            </nav>
        <?php endif; ?>
    <?php endif; ?>
</div>

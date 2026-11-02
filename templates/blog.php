<?php
/**
 * Blog index — published posts, newest first, filtered by category.
 *
 * Only posts whose status is `published` *and* whose publish date has passed are
 * listed: a scheduled post stays invisible until its moment, which is the
 * behaviour the panel advertises.
 *
 * The newest post on the first page is set as a lead card — headline, excerpt
 * and the reading details — and the rest fall into a two-column feed. Without a
 * cover image a card leads with its category and its title, which is what a
 * reader scans for; the layout is built to look finished either way.
 *
 * @var \Onim\Seo $seo
 * @var array  $posts
 * @var array  $postCategories  categories with published counts
 * @var int    $page
 * @var int    $pages
 * @var string $activeCategory
 * @var string $categoryHeading
 * @var string $categoryLede
 */

declare(strict_types=1);

use Onim\Cms;
use Onim\View;

$posts = $posts ?? [];
$postCategories = $postCategories ?? [];
$page = (int) ($page ?? 1);
$pages = (int) ($pages ?? 1);
$activeCategory = (string) ($activeCategory ?? '');
$categoryHeading = (string) ($categoryHeading ?? '');
$categoryLede = (string) ($categoryLede ?? '');

$isCategory = $activeCategory !== '';
$base = $isCategory ? '/category/' . $activeCategory : '/blog';
$pageUrl = static function (int $n) use ($base): string {
    return $n <= 1 ? $base : $base . '?page=' . $n;
};

$totalPosts = 0;
foreach ($postCategories as $c) {
    $totalPosts += (int) ($c['post_count'] ?? 0);
}
// The newest date on the page is worth showing; a made-up reading-time range is not.
$latestDate = '';
foreach ($posts as $p) {
    $stamp = (string) ($p['published_at'] ?? '');
    if ($stamp !== '' && ($latestDate === '' || strtotime($stamp) > strtotime($latestDate))) {
        $latestDate = $stamp;
    }
}
// Only the unfiltered first page leads with a hero card; a filtered list is a
// list, and repeating the hero on every page of it just delays the posts.
$featureFirst = !$isCategory && $page === 1 && $posts !== [];

$filed = static function (array $post): array {
    return [
        'name' => trim((string) ($post['category_name'] ?? '')),
        'slug' => trim((string) ($post['category_slug'] ?? '')),
    ];
};
?>
<div class="shell page-shell blog-shell">
    <?= View::breadcrumbs(array_values(array_filter([
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Blog', 'url' => '/blog'],
        $isCategory ? ['name' => $categoryHeading, 'url' => '/category/' . $activeCategory] : null,
    ]))) ?>

    <header class="blog-hero">
        <div class="blog-hero-text">
            <p class="eyebrow">The blog</p>
            <h1 class="blog-title"><?= $isCategory ? View::escape($categoryHeading) : 'Numbers, explained properly' ?></h1>
            <p class="blog-lede">
                <?php if ($isCategory): ?>
                    <?= $categoryLede !== '' ? View::escape($categoryLede) : 'Every post filed under ' . View::escape($categoryHeading) . '.' ?>
                <?php else: ?>
                    How the numbers behind everyday decisions actually work — worked examples, the formula
                    behind each calculator, and the mistakes that survive to the final answer.
                <?php endif; ?>
            </p>
        </div>
        <?php if (!$isCategory && $postCategories !== []): ?>
            <dl class="blog-stats">
                <div><dt>Posts</dt><dd><?= $totalPosts ?></dd></div>
                <div><dt>Categories</dt><dd><?= count($postCategories) ?></dd></div>
                <div><dt>Latest</dt><dd><?= $latestDate !== '' ? View::escape(date('j M', (int) strtotime($latestDate))) : '—' ?></dd></div>
            </dl>
        <?php endif; ?>
    </header>

    <?php if ($postCategories !== []): ?>
        <nav class="cat-row" aria-label="Filter posts by category">
            <a class="cat-chip<?= $isCategory ? '' : ' is-active' ?>" href="<?= View::escape(View::url('/blog')) ?>">
                All posts <span class="cat-chip-count"><?= $totalPosts ?></span>
            </a>
            <?php foreach ($postCategories as $cat): ?>
                <a class="cat-chip<?= $activeCategory === (string) $cat['slug'] ? ' is-active' : '' ?>"
                   href="<?= View::escape(View::url('/category/' . $cat['slug'])) ?>">
                    <?= View::escape((string) $cat['name']) ?>
                    <span class="cat-chip-count"><?= (int) $cat['post_count'] ?></span>
                </a>
            <?php endforeach; ?>
        </nav>
    <?php endif; ?>

    <?php if ($posts === []): ?>
        <div class="blog-empty">
            <p class="blog-empty-title">Nothing here yet</p>
            <p class="blog-empty-text">
                <?= $isCategory
                    ? 'No published posts are filed under ' . View::escape($categoryHeading) . ' yet.'
                    : 'No posts have been published yet.' ?>
            </p>
            <?php if ($isCategory): ?>
                <a class="btn btn-soft" href="<?= View::escape(View::url('/blog')) ?>">See every post</a>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="post-feed<?= $featureFirst ? ' has-lead' : '' ?>">
            <?php foreach ($posts as $index => $post):
                $cat = $filed($post);
                $url = View::url('/blog/' . $post['slug']);
                $minutes = Cms::readingMinutes((string) ($post['content'] ?? ''));
                $isLead = $featureFirst && $index === 0;
                ?>
                <article class="post-card<?= $isLead ? ' post-card--lead' : '' ?>">
                    <?php if ((string) ($post['cover_image'] ?? '') !== ''): ?>
                        <a class="post-card-media" href="<?= View::escape($url) ?>" tabindex="-1" aria-hidden="true">
                            <img src="<?= View::escape(View::url((string) $post['cover_image'])) ?>"
                                 alt="<?= View::escape((string) ($post['cover_alt'] ?? '')) ?>"
                                 width="640" height="360" loading="<?= $isLead ? 'eager' : 'lazy' ?>" decoding="async">
                        </a>
                    <?php endif; ?>
                    <div class="post-card-body">
                        <div class="post-card-kicker">
                            <?php if ($cat['slug'] !== ''): ?>
                                <a class="post-cat" href="<?= View::escape(View::url('/category/' . $cat['slug'])) ?>">
                                    <?= View::escape($cat['name']) ?>
                                </a>
                            <?php else: ?>
                                <span class="post-cat is-plain">Article</span>
                            <?php endif; ?>
                            <span class="post-card-time"><?= $minutes ?> min read</span>
                        </div>
                        <h2 class="post-card-title">
                            <a href="<?= View::escape($url) ?>"><?= View::escape((string) $post['title']) ?></a>
                        </h2>
                        <?php if ((string) ($post['excerpt'] ?? '') !== ''): ?>
                            <p class="post-card-excerpt"><?= View::escape((string) $post['excerpt']) ?></p>
                        <?php endif; ?>
                        <div class="post-card-foot">
                            <p class="post-card-meta">
                                <time datetime="<?= View::escape(date('Y-m-d', (int) strtotime((string) $post['published_at']))) ?>">
                                    <?= View::escape(date('j F Y', (int) strtotime((string) $post['published_at']))) ?>
                                </time>
                                <?php if ((string) ($post['author_name'] ?? '') !== ''): ?>
                                    <span aria-hidden="true">·</span>
                                    <?= View::escape((string) $post['author_name']) ?>
                                <?php endif; ?>
                            </p>
                            <a class="post-card-link" href="<?= View::escape($url) ?>">
                                Read <span aria-hidden="true"><?= View::icon('arrow-right', 15) ?></span>
                                <span class="sr-only"><?= View::escape((string) $post['title']) ?></span>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <?= \Onim\Ads::slot('blog_list') ?>

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

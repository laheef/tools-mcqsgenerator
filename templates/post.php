<?php
/**
 * One blog post.
 *
 * Three columns, left to right:
 *
 *   contents    the post's own h2 headings, sticky, plus its reading time
 *   the post    cover, headline, body, category, author
 *   sidebar     latest calculators, popular calculators, category counts
 *
 * The middle column is the reading column and keeps a ~70-character measure at
 * every width; the two side columns fold away below 1100px, where the contents
 * become a boxed list above the body.
 *
 * @var \Onim\Seo $seo
 * @var array $post
 * @var array|null $postCategory
 * @var array $categories
 */

declare(strict_types=1);

use Onim\View;

$post = $post ?? [];
$postCategory = $postCategory ?? null;
$categories = $categories ?? [];
$published = (string) ($post['published_at'] ?? '');
$updated = (string) ($post['updated_at'] ?? '');
$bodyHtml = View::rewriteRootUrls((string) ($post['content'] ?? ''));

/*
 * Table of contents, built from the headings that are actually in the body.
 *
 * A TOC that lists sections the post does not have is worse than no TOC, so the
 * list is derived here rather than typed into the panel. Every h2 gets an id if
 * it has none — the reader can link to it, and the anchor survives edits.
 */
$toc = [];
$bodyHtml = (string) preg_replace_callback(
    '~<h2([^>]*)>(.*?)</h2>~is',
    static function (array $m) use (&$toc): string {
        $attrs = $m[1];
        $text  = trim((string) preg_replace('~<[^>]+>~', '', $m[2]));
        if ($text === '') {
            return $m[0];
        }
        if (preg_match('~id="([^"]+)"~', $attrs, $id) === 1) {
            $slug = $id[1];
        } else {
            $slug = trim((string) preg_replace('~[^a-z0-9]+~', '-', mb_strtolower($text)), '-');
            if ($slug === '') {
                $slug = 'section-' . (count($toc) + 1);
            }
            $attrs .= ' id="' . View::escape($slug) . '"';
        }
        /* Headings that are already numbered ("1. Name the quantity") keep the
           number on the page but lose it in the contents: a list that reads
           "1. 1. Name the quantity" is a list nobody trusts. */
        $label = trim((string) preg_replace('~^\s*(\d+[.)]|[ivx]+\.)\s+~i', '', $text));
        $toc[] = ['slug' => $slug, 'text' => $label === '' ? $text : $label];
        return '<h2' . $attrs . '>' . $m[2] . '</h2>';
    },
    $bodyHtml
);
$readMinutes = max(1, (int) round(str_word_count(strip_tags($bodyHtml)) / 220));
?>
<div class="shell page-shell post-shell">
    <?php if (($_GET['preview'] ?? '') !== ''): ?>
        <p class="preview-banner" role="status">
            <strong>Preview.</strong> This post is not public yet — the signed link shows it to you only,
            and it is excluded from search engines.
        </p>
    <?php endif; ?>
    <?= View::breadcrumbs([
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Blog', 'url' => '/blog'],
        ['name' => View::excerpt((string) $post['title'], 42), 'url' => '/blog/' . $post['slug']],
    ]) ?>

    <?php /* Article on the left, everything else on the right — the same shape
             as a calculator page, for the same reason: the reading column is the
             page, and the rail can follow the reader down. The contents used to
             be a third column on the left, costing the article 240px and leaving
             the sidebar a strip; as a sticky card at the top of the rail it does
             the same job in space that already existed. */ ?>
    <div class="post-frame">
        <div class="post-main">
        <header class="page-head">
            <h1 class="page-title"><?= View::escape((string) $post['title']) ?></h1>
            <?php if ((string) ($post['excerpt'] ?? '') !== ''): ?>
                <p class="page-lede"><?= View::escape((string) $post['excerpt']) ?></p>
            <?php endif; ?>
            <p class="page-meta">
                <?php if ($published !== ''): ?>
                    <time datetime="<?= View::escape(date('Y-m-d', (int) strtotime($published))) ?>">
                        <?= View::escape(date('j F Y', (int) strtotime($published))) ?>
                    </time>
                <?php endif; ?>
                <?php if ((string) ($post['author_name'] ?? '') !== ''): ?>
                    · by <span class="post-author"><?= View::escape((string) $post['author_name']) ?></span>
                <?php endif; ?>
                <?php if ($updated !== '' && substr($updated, 0, 10) !== substr($published, 0, 10)): ?>
                    · updated <time datetime="<?= View::escape(date('Y-m-d', (int) strtotime($updated))) ?>"><?= View::escape(date('j F Y', (int) strtotime($updated))) ?></time>
                <?php endif; ?>
            </p>
        </header>

        <?php /* Under the headline: above the <h1> it pushed the title down the
                 page — the one position a reader is most likely to bounce from. */ ?>
        <?= \Onim\Ads::slot('blog_top', 'ad-slot--page-top') ?>

        <?php if ((string) ($post['cover_image'] ?? '') !== ''): ?>
            <figure class="post-cover">
                <img src="<?= View::escape(View::url((string) $post['cover_image'])) ?>"
                     alt="<?= View::escape((string) ($post['cover_alt'] ?? '')) ?>"
                     width="1200" height="630" decoding="async" fetchpriority="high">
                <?php if ((string) ($post['cover_alt'] ?? '') !== ''): ?>
                    <figcaption><?= View::escape((string) $post['cover_alt']) ?></figcaption>
                <?php endif; ?>
            </figure>
        <?php endif; ?>

            <div class="article-body post-body">
                <?= \Onim\Ads::inject($bodyHtml, 'blog_inline', 2) ?>
            </div>

            <footer class="post-footer">
                <?php if ($postCategory !== null): ?>
                    <p class="post-filed">
                        Filed under
                        <a class="post-cat" href="<?= View::escape(View::url('/category/' . $postCategory['slug'])) ?>">
                            <?= View::escape((string) $postCategory['name']) ?>
                        </a>
                    </p>
                <?php endif; ?>

                <?php if ((string) ($post['author_bio'] ?? '') !== ''): ?>
                    <div class="credit-person post-author-box">
                        <div>
                            <p class="credit-name"><?= View::escape((string) $post['author_name']) ?></p>
                            <p class="page-meta"><?= View::escape((string) $post['author_bio']) ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </footer>
        </div>

        <aside class="post-rail" aria-label="On this page and more from Onim">
            <?= \Onim\Ads::slot('blog_side_top') ?>

            <div class="post-rail-contents">
                <?php if ($toc !== []): ?>
                    <nav class="toc toc--side" aria-labelledby="toc-heading">
                        <h2 id="toc-heading" class="toc-title">On this page</h2>
                        <ol class="toc-list">
                            <?php foreach ($toc as $entry): ?>
                                <li><a href="#<?= View::escape($entry['slug']) ?>"><?= View::escape($entry['text']) ?></a></li>
                            <?php endforeach; ?>
                        </ol>
                    </nav>
                <?php endif; ?>
                <p class="post-readtime"><?= (int) $readMinutes ?> min read</p>
            </div>

            <?= View::render('partials/post-aside', ['categories' => $categories]) ?>

            <?= \Onim\Ads::slot('blog_side_bottom') ?>
        </aside>
    </div>
</div>



<?php
/**
 * One blog post.
 *
 * @var \Omni\Seo $seo
 * @var array $post
 * @var array $tags
 * @var array $related
 */

declare(strict_types=1);

use Omni\View;

$post = $post ?? [];
$tags = $tags ?? [];
$related = $related ?? [];
$published = (string) ($post['published_at'] ?? '');
$updated = (string) ($post['updated_at'] ?? '');
?>
<article class="shell page-shell page-shell--wide">
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

    <div class="article-body">
        <?= View::rewriteRootUrls((string) ($post['content'] ?? '')) ?>
    </div>

    <?php if ($tags !== []): ?>
        <footer class="post-footer">
            <div class="chip-row" aria-label="Tags">
                <?php foreach ($tags as $tag): ?>
                    <a class="chip" href="<?= View::escape(View::url('/tag/' . $tag['slug'])) ?>">
                        <?= View::escape((string) $tag['name']) ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <?php if ((string) ($post['author_bio'] ?? '') !== ''): ?>
                <div class="credit-person post-author-box">
                    <div>
                        <p class="credit-name"><?= View::escape((string) $post['author_name']) ?></p>
                        <p class="page-meta"><?= View::escape((string) $post['author_bio']) ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </footer>
    <?php endif; ?>

    <?php if ($related !== []): ?>
        <section class="related" aria-labelledby="more-posts">
            <h2 class="section-title" id="more-posts">More from the blog</h2>
            <div class="related-list">
                <?php foreach ($related as $other): ?>
                    <a class="related-name" href="<?= View::escape(View::url('/blog/' . $other['slug'])) ?>">
                        <?= View::escape((string) $other['title']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
</article>

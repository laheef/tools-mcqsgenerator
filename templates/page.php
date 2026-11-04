<?php
/**
 * A static page created in the admin panel (About, Privacy, Terms, Contact…).
 *
 * The body is sanitised HTML written in the panel editor. `contact` pages get
 * the contact form appended, so the Contact page can be a normal page with a
 * real working form underneath it.
 *
 * @var \Onim\Seo $seo
 * @var array $page
 * @var array $categories
 */

declare(strict_types=1);

use Onim\Data;
use Onim\View;

$page = $page ?? [];
$template = (string) ($page['template'] ?? 'default');
$updated = (string) ($page['updated_at'] ?? '');

/*
 * An on-page contents list, built from the page's own <h2>s.
 *
 * Long pages (About, Privacy, Terms) are read by scanning headings first, and
 * the right rail would otherwise be empty at desktop width. Headings written in
 * the panel rarely carry an id, so one is added here — the same anchor is used
 * by the contents list and by the link, and a repeated heading gets a suffix
 * rather than a duplicate id.
 */
$body = (string) ($page['content'] ?? '');
$contents = [];
$seen = [];
$body = (string) preg_replace_callback(
    '~<h2\b([^>]*)>(.*?)</h2>~is',
    static function (array $m) use (&$contents, &$seen): string {
        $attrs = $m[1];
        $label = trim((string) preg_replace('~\s+~u', ' ', html_entity_decode(strip_tags($m[2]), ENT_QUOTES | ENT_HTML5, 'UTF-8')));
        if ($label === '') {
            return $m[0];
        }
        if (preg_match('~\bid=["\']([^"\']+)["\']~i', $attrs, $id) === 1) {
            $contents[] = ['id' => $id[1], 'label' => $label];
            return $m[0];
        }
        $slug = trim((string) preg_replace('~[^a-z0-9]+~', '-', strtolower(preg_replace('~[^\p{L}\p{N}]+~u', '-', $label) ?? '')), '-');
        $slug = $slug !== '' ? $slug : 'section';
        $base = $slug;
        for ($i = 2; isset($seen[$slug]); $i++) {
            $slug = $base . '-' . $i;
        }
        $seen[$slug] = true;
        $contents[] = ['id' => $slug, 'label' => $label];
        return '<h2' . $attrs . ' id="' . View::escape($slug) . '">' . $m[2] . '</h2>';
    },
    $body
);
// Two headings is a paragraph, three is a document worth a contents list.
$contents = count($contents) >= 3 ? $contents : [];
?>
<div class="shell page-shell<?= $template === 'wide' ? ' page-shell--wide' : '' ?>">
    <?= View::breadcrumbs([
        ['name' => 'Home', 'url' => '/'],
        ['name' => (string) $page['title'], 'url' => '/' . $page['slug']],
    ]) ?>

    <header class="page-head">
        <h1 class="page-title"><?= View::escape((string) $page['title']) ?></h1>
        <?php if (($page['excerpt'] ?? '') !== ''): ?>
            <p class="page-lede"><?= View::escape((string) $page['excerpt']) ?></p>
        <?php endif; ?>
        <?php if ($updated !== ''): ?>
            <p class="page-meta">Last updated
                <time datetime="<?= View::escape(date('Y-m-d', (int) strtotime($updated))) ?>">
                    <?= View::escape(date('j F Y', (int) strtotime($updated))) ?>
                </time>
            </p>
        <?php endif; ?>
    </header>

    <div class="page-body<?= $contents !== [] ? ' page-body--toc' : '' ?>">
        <div class="article-body">
            <?= View::rewriteRootUrls($body) ?>
        </div>
        <?php if ($contents !== []): ?>
            <nav class="page-toc" aria-labelledby="page-toc-title">
                <h2 class="page-toc-title" id="page-toc-title">On this page</h2>
                <ol class="page-toc-list">
                    <?php foreach ($contents as $item): ?>
                        <li><a href="#<?= View::escape($item['id']) ?>"><?= View::escape($item['label']) ?></a></li>
                    <?php endforeach; ?>
                </ol>
            </nav>
        <?php endif; ?>
    </div>

    <?php if ($template === 'contact'): ?>
        <?= View::render('partials/contact-form', [
            'fields' => \Onim\Cms::contactFields(),
            'contactError' => $contactError ?? '',
            'contactOld' => $contactOld ?? [],
        ]) ?>
    <?php endif; ?>

    <?php if ($template === 'faq'): ?>
        <?php $faq = \Onim\Cms::decode((string) ($page['faq'] ?? '')); ?>
        <?php if ($faq !== []): ?>
            <section class="faq" aria-labelledby="page-faq">
                <h2 class="section-title" id="page-faq">Frequently asked questions</h2>
                <?php foreach ($faq as $i => $pair): ?>
                    <details class="faq-item"<?= $i === 0 ? ' open' : '' ?>>
                        <summary class="faq-question">
                            <span class="faq-marker" aria-hidden="true"><?= $i + 1 ?></span>
                            <?= View::escape((string) ($pair['q'] ?? '')) ?>
                        </summary>
                        <div class="faq-answer"><?= (string) ($pair['a'] ?? '') ?></div>
                    </details>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>
    <?php endif; ?>

    <?php $popular = array_slice(Data::featured(6), 0, 6); ?>
    <?php if ($popular !== []): ?>
        <section class="related" aria-labelledby="page-popular">
            <h2 class="section-title" id="page-popular">Popular calculators</h2>
            <div class="related-list">
                <?php foreach ($popular as $row): ?>
                    <a class="related-name" href="<?= View::escape(View::url((string) $row['path'])) ?>">
                        <?= View::escape((string) $row['name']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
</div>

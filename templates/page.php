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

    <div class="article-body">
        <?= View::rewriteRootUrls((string) ($page['content'] ?? '')) ?>
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

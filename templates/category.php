<?php
/**
 * Category index: A–Z of every calculator in the category.
 *
 * @var \Omni\Seo $seo
 * @var array $category
 * @var array $rows
 */

declare(strict_types=1);

use Omni\Data;
use Omni\Icons;
use Omni\View;

/*
 * The A-Z is grouped for the jump nav, but a group holding one calculator should
 * not take a whole screen-width row with its own heading — that is how the index
 * ended up as a stack of near-empty bands. Digits share a single "#" group.
 */
$groups = [];
foreach ($rows as $row) {
    $first = mb_substr((string) $row['name'], 0, 1);
    $letter = preg_match('/[A-Za-z]/', $first) === 1 ? mb_strtoupper($first) : '#';
    $groups[$letter][] = $row;
}
uksort($groups, static function (string $a, string $b): int {
    if ($a === '#') { return -1; }
    if ($b === '#') { return 1; }
    return strcmp($a, $b);
});
foreach ($groups as $k => $v) {
    usort($groups[$k], static fn ($x, $y) => strcasecmp((string) $x['name'], (string) $y['name']));
}
?>
<div class="shell page-shell">
    <?= View::breadcrumbs([
        ['name' => 'Home', 'url' => '/'],
        ['name' => $category['name'], 'url' => '/' . $category['slug']],
    ]) ?>

    <header class="page-head">
        <div class="page-head-icon"><?= View::icon($category['icon'], 40) ?></div>
        <div>
            <h1 class="page-title"><?= View::escape($category['title']) ?></h1>
            <p class="page-lede"><?= View::escape($category['description']) ?></p>
            <p class="page-meta"><span data-live-count="<?= View::escape((string) $category['slug']) ?>"><?= View::escape((string) count($rows)) ?></span> calculator<?= count($rows) === 1 ? '' : 's' ?> available</p>
        </div>
    </header>

    <nav class="alpha-nav" aria-label="Jump to letter">
        <?php foreach (array_keys($groups) as $letter): ?>
            <a href="#letter-<?= View::escape($letter === '#' ? 'num' : $letter) ?>"><?= View::escape($letter) ?></a>
        <?php endforeach; ?>
    </nav>

    <div class="calc-index">
        <?php foreach ($groups as $letter => $items): ?>
            <?php $anchor = $letter === '#' ? 'num' : $letter; ?>
            <section class="index-letter" id="letter-<?= View::escape($anchor) ?>" aria-labelledby="letter-<?= View::escape($anchor) ?>-h">
                <h2 id="letter-<?= View::escape($anchor) ?>-h" class="index-letter-head"><?= View::escape($letter) ?></h2>
                <ul class="index-list">
                    <?php foreach ($items as $row): ?>
                        <li>
                            <a class="index-link" href="<?= View::escape(View::url($row['path'])) ?>">
                                <?= Icons::forCalculator($row, 18, 'calc-glyph calc-glyph-sm') ?>
                                <span class="index-name"><?= View::escape($row['name']) ?></span>
                                <span class="index-desc"><?= View::escape(View::excerpt((string) $row['description'], 110)) ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endforeach; ?>
    </div>

    <aside class="cross-links">
        <h2 class="section-title">Other categories</h2>
        <div class="chip-row">
            <?php foreach (Data::categories() as $cat): ?>
                <?php if ($cat['slug'] === $category['slug'] || $cat['slug'] === 'discover') { continue; } ?>
                <a class="chip" href="<?= View::escape(View::url('/' . $cat['slug'])) ?>"><?= View::escape($cat['name']) ?></a>
            <?php endforeach; ?>
        </div>
    </aside>
</div>

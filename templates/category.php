<?php
/**
 * Category index: A–Z of every calculator in the category.
 *
 * @var \Onim\Seo $seo
 * @var array $category
 * @var array $rows    the calculators on screen, already narrowed by ?q
 * @var int   $total   how many the category holds before the search
 * @var string $q      the search the server applied
 * @var string $path   the category's own path
 */

declare(strict_types=1);

use Onim\Data;
use Onim\Format;
use Onim\Icons;
use Onim\View;

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

    <?php /* The search the category was missing: every calculator in this
             category, findable without knowing the alphabet. */ ?>
    <?php if (($total ?? count($rows)) > 0): ?>
    <?= View::render('partials/list-search', [
        'action' => $path ?? ('/' . $category['slug']),
        'q' => $q ?? '',
        'total' => $total ?? count($rows),
        'shown' => count($rows),
        'noun' => 'calculators',
        'scope' => 'this category',
    ]) ?>
    <?php endif; ?>

    <?php /* Under the heading, above the grid: the slot a category page can
             carry without pushing the first calculator below the fold. */ ?>
    <?= \Onim\Ads::slot('category_top', 'ad-slot--page-top') ?>

    <?php if ($rows === []): ?>
        <div class="card empty-state list-search-empty">
            <?php if (($q ?? '') !== ''): ?>
                <h2 class="section-title section-title--sm">Nothing matched “<?= View::escape($q) ?>”</h2>
                <p class="page-lede" style="margin-top:8px">
                    <?= View::escape(Format::count((int) ($total ?? 0))) ?> calculators in
                    <?= View::escape((string) $category['name']) ?>, and none of them mention that.
                    Try a shorter word, or see every category.
                </p>
                <p style="margin-top:16px">
                    <a class="btn btn-soft" href="<?= View::escape(View::url('/' . $category['slug'])) ?>">Clear the search</a>
                    <a class="btn btn-soft" href="<?= View::escape(View::url('/all-calculators')) ?>">All calculators</a>
                </p>
            <?php else: ?>
                <h2 class="section-title section-title--sm">Nothing here yet</h2>
                <p class="page-lede" style="margin-top:8px">
                    <?= View::escape((string) $category['name']) ?> is waiting for its first calculator.
                </p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if ($rows !== []): ?>
    <nav class="alpha-nav" aria-label="Jump to letter">
        <?php foreach (array_keys($groups) as $letter): ?>
            <a href="#letter-<?= View::escape($letter === '#' ? 'num' : $letter) ?>"><?= View::escape($letter) ?></a>
        <?php endforeach; ?>
    </nav>

    <div class="calc-index">
        <?php foreach ($groups as $letter => $items): ?>
            <?php $anchor = $letter === '#' ? 'num' : $letter; ?>
            <section class="index-letter" id="letter-<?= View::escape($anchor) ?>" data-search-group aria-labelledby="letter-<?= View::escape($anchor) ?>-h">
                <h2 id="letter-<?= View::escape($anchor) ?>-h" class="index-letter-head"><?= View::escape($letter) ?></h2>
                <ul class="index-list">
                    <?php foreach ($items as $row): ?>
                        <li class="index-item" data-search-item>
                            <a class="index-link" href="<?= View::escape(View::url($row['path'])) ?>">
                                <?= Icons::forCalculator($row, 18, 'calc-glyph calc-glyph-sm') ?>
                                <span class="index-name"><?= View::escape($row['name']) ?></span>
                                <span class="index-desc"><?= View::escape(View::excerpt((string) $row['description'], 110)) ?></span>
                                <span class="index-go" aria-hidden="true"><?= View::icon('arrow-right', 15) ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

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

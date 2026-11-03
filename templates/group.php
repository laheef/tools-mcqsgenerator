<?php
/**
 * A tool group — or one of its subgroups.
 *
 * /audio is a group; /img-converters is a subgroup and renders through this same
 * file with its parent in the breadcrumb. The page is deliberately shaped like
 * the category index a reader already knows: a head with an icon and a count,
 * then the tools as cards. When a group has nothing in it yet the page says so
 * in one sentence instead of pretending to be an index of zero things.
 *
 * @var \Onim\Seo $seo
 * @var array $section  the group or subgroup row
 * @var array|null $parent  the group this section sits in (null for a group)
 * @var array $rows     tools filed directly here
 * @var array $subs     subgroups (empty for a subgroup)
 * @var array $groups   every group, for the "other categories" row
 */

declare(strict_types=1);

use Onim\Data;
use Onim\Format;
use Onim\Groups;
use Onim\View;

$isSub = (string) ($section['parent'] ?? '') !== '';
$icon = (string) ($section['icon'] ?? 'grid');
$title = (string) ($section['title'] ?? $section['name']);
$lede = (string) ($section['description'] ?? '');

/* What sits under this section: a group shows its own tools plus every
   subgroup's; a subgroup shows only what is filed in it. */
$allTools = $isSub ? $rows : Groups::toolsOfGroup((string) $section['slug']);
$shown = $isSub ? $rows : $rows;
$count = $isSub ? count($rows) : Groups::countGroup((string) $section['slug']);

$card = static function (array $row) use ($icon, $section): string {
    $desc = View::excerpt((string) ($row['description'] ?? ''), 120);
    $href = View::url((string) $row['path']);
    $sectionName = (string) $section['name'];
    /* A tool filed in a subgroup says which one, so a card lifted out of the
       group page still tells you what kind of tool it is. */
    $label = '';
    if (isset($row['cat']) && (string) $row['cat'] !== (string) $section['slug']) {
        $label = Groups::label((string) $row['cat']);
    }
    ob_start(); ?>
    <a class="popular-card tool-card" href="<?= View::escape($href) ?>">
        <span class="popular-head">
            <span class="category-icon"><?= View::icon($icon, 22) ?></span>
            <span class="popular-cat"><?= View::escape($label !== '' ? $label : $sectionName) ?></span>
        </span>
        <h3 class="popular-title"><?= View::escape((string) $row['name']) ?></h3>
        <p class="popular-desc"><?= View::escape($desc) ?></p>
    </a>
    <?php return (string) ob_get_clean();
};
?>
<div class="shell page-shell">
    <?= View::breadcrumbs(array_values(array_filter([
        ['name' => 'Home', 'url' => '/'],
        $parent !== null ? ['name' => (string) $parent['name'], 'url' => '/' . $parent['slug']] : null,
        ['name' => (string) $section['name'], 'url' => '/' . $section['slug']],
    ]))) ?>

    <header class="page-head page-head--actions">
        <div class="page-head-icon" style="--icon-hue: <?= (int) Groups::hue((string) $section['slug']) ?>"><?= View::icon($icon, 40) ?></div>
        <div class="page-head-copy">
            <h1 class="page-title"><?= View::escape($title) ?></h1>
            <?php if ($lede !== ''): ?><p class="page-lede"><?= View::escape($lede) ?></p><?php endif; ?>
            <p class="page-meta"><?= View::escape(Format::count($count)) ?> tool<?= $count === 1 ? '' : 's' ?><?= $isSub ? ' in this subcategory' : ' in this group' ?></p>
        </div>
        <?php if ($count > 0): ?>
            <?php /* The same button the home band wears, so a visitor who arrived
                      from the band can go back to the list they came from. */ ?>
            <p class="page-head-action">
                <a class="btn btn-primary" href="<?= View::escape(View::url('/all-tools/' . (string) $section['slug'])) ?>">
                    Browse all <?= View::escape(Format::count($count)) ?> <?= $count === 1 ? 'tool' : 'tools' ?>
                </a>
            </p>
        <?php endif; ?>
    </header>

    <?= \Onim\Ads::slot('category_top', 'ad-slot--page-top') ?>

    <?php if (!$isSub && $subs !== []): ?>
        <div class="chip-row" style="margin-bottom:22px">
            <?php foreach ($subs as $sub): ?>
                <a class="chip" href="<?= View::escape(View::url('/' . $sub['slug'])) ?>">
                    <?= View::escape((string) $sub['name']) ?>
                    <span class="muted"><?= View::escape(Format::count(Groups::count((string) $sub['slug']))) ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ($shown !== []): ?>
        <div class="popular-grid">
            <?php foreach ($shown as $row) { echo $card($row); } ?>
        </div>

        <?php if (!$isSub && count($allTools) > count($shown)): ?>
            <section class="tool-subsection">
                <?php foreach ($subs as $sub): ?>
                    <?php $subRows = Groups::tools((string) $sub['slug']); ?>
                    <?php if ($subRows === []) { continue; } ?>
                    <h2 class="section-title section-title--sm">
                        <a href="<?= View::escape(View::url('/' . $sub['slug'])) ?>"><?= View::escape((string) $sub['name']) ?></a>
                    </h2>
                    <div class="popular-grid">
                        <?php foreach ($subRows as $row) { echo $card($row); } ?>
                    </div>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>
    <?php else: ?>
        <div class="card empty-state">
            <h2 class="section-title section-title--sm">Nothing here yet</h2>
            <p class="page-lede" style="margin-top:8px">
                <?= View::escape((string) $section['name']) ?> is set up and waiting for its first tool.
                Every tool on this site is one self-contained file — once one is uploaded it appears here,
                on the home page and in the secondary header.
            </p>
            <p style="margin-top:16px">
                <a class="btn btn-primary" href="<?= View::escape(View::url('/' . Groups::CALCULATORS)) ?>">
                    Browse the calculators
                </a>
            </p>
        </div>
    <?php endif; ?>

    <aside class="cross-links">
        <h2 class="section-title">Other categories</h2>
        <div class="chip-row">
            <?php foreach ($groups as $g): ?>
                <?php if ((string) $g['slug'] === (string) $section['slug']) { continue; } ?>
                <a class="chip" href="<?= View::escape(View::url('/' . $g['slug'])) ?>">
                    <?= View::escape((string) $g['name']) ?>
                    <span class="muted"><?= View::escape(Format::count(Groups::countGroup((string) $g['slug']))) ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </aside>
</div>

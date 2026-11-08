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
 * @var int   $total    how many this section holds before a search
 * @var string $q       the search the server applied
 * @var string $path    the section's own path
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
$count = (int) ($total ?? ($isSub ? count($rows) : Groups::countGroup((string) $section['slug'])));

/* The search narrows what the page actually shows — for a group that includes
   the tools filed under its subgroups, which is what the page lists. */
$q = trim((string) ($q ?? ''));
$matches = static function (array $list) use ($q): array {
    if ($q === '') {
        return $list;
    }
    return array_values(array_filter($list, static function (array $row) use ($q): bool {
        $hay = (string) ($row['name'] ?? '') . ' ' . (string) ($row['description'] ?? '');
        return mb_stripos($hay, $q) !== false;
    }));
};
$rows = $matches($rows);
$shown = $rows;
$found = $isSub ? count($rows) : count($matches(Groups::toolsOfGroup((string) $section['slug'])));

/*
 * The card is the catalogue's card.
 *
 * This page used to draw its own: an icon and an uppercased section name above
 * a title, in a taller box that only ever held one column at a time. A reader who
 * had come from /all-tools met a different shape for the same object, and a group
 * of six tools turned into six full-width slabs. The row below is the same
 * .browse-item the catalogue renders — same 20px glyph, same name/description
 * stack, same section tag on the right — so a tool looks like itself wherever it
 * is listed, and the group's tools sit two to a line like the catalogue's.
 *
 * `data-search-item` sits on the <li>, not on the link: the live filter hides the
 * element it is put on, and hiding the anchor alone would leave the cell behind.
 */
$card = static function (array $row) use ($section): string {
    $desc = View::excerpt((string) ($row['description'] ?? ''), 150);
    $href = View::url((string) $row['path']);
    /* A tool filed in a subgroup says which one, so a card lifted out of the
       group page still tells you what kind of tool it is. */
    $label = (string) ($section['name'] ?? '');
    if (isset($row['cat']) && (string) $row['cat'] !== (string) $section['slug']) {
        $label = Groups::label((string) $row['cat']);
    }
    $rowSection = (string) ($row['group'] ?? Groups::groupOf((string) ($row['cat'] ?? '')));
    $rowHue = $rowSection !== '' ? Groups::hue($rowSection) : null;
    ob_start(); ?>
    <li class="browse-item" data-search-item>
        <a class="browse-link" href="<?= View::escape($href) ?>">
            <?= View::toolIcon($row, '', 20, 'calc-glyph', $rowHue) ?>
            <span class="browse-text">
                <span class="browse-name"><?= View::escape((string) $row['name']) ?></span>
                <span class="browse-desc"><?= View::escape($desc) ?></span>
            </span>
            <span class="browse-cat-tag"><?= View::escape($label) ?></span>
        </a>
    </li>
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
                    Browse all <?= View::escape(Format::count($count)) ?> <?= View::escape(Groups::toolNoun((string) $section['slug'], $count)) ?>
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

    <?php /* Every tool in this section is on the page, so the search can be
             answered here — no round trip, and the count updates as you type.
             The form still carries ?q= for the script-off case. */ ?>
    <?php if ($allTools !== []): ?>
        <?= View::render('partials/list-search', [
            'action' => $path ?? ('/' . $section['slug']),
            'q' => $q ?? '',
            'total' => $count,
            'shown' => $found,
            'noun' => 'tools',
            'scope' => (string) $section['name'],
        ]) ?>
    <?php endif; ?>

    <?php if ($shown !== []): ?>
        <ul class="browse-list">
            <?php foreach ($shown as $row) { echo $card($row); } ?>
        </ul>
    <?php endif; ?>

    <?php
    /* A group's tools mostly live in its subgroups, which is why the group page
       draws them in labelled sections. A search keeps only the subgroups that
       still hold a match. */
    $subBlocks = [];
    if (!$isSub && $subs !== [] && count($allTools) > count($rows)) {
        foreach ($subs as $sub) {
            $subRows = $matches(Groups::tools((string) $sub['slug']));
            if ($subRows !== []) {
                $subBlocks[] = [$sub, $subRows];
            }
        }
    }
    ?>
    <?php if ($subBlocks !== []): ?>
        <section class="tool-subsection">
            <?php foreach ($subBlocks as [$sub, $subRows]): ?>
                <div class="tool-subsection-block" data-search-group>
                    <h2 class="section-title section-title--sm">
                        <a href="<?= View::escape(View::url('/' . $sub['slug'])) ?>"><?= View::escape((string) $sub['name']) ?></a>
                    </h2>
                    <ul class="browse-list">
                        <?php foreach ($subRows as $row) { echo $card($row); } ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>

    <?php if ($count === 0): ?>
        <div class="card empty-state">
            <h2 class="section-title section-title--sm">Nothing here yet</h2>
            <p class="page-lede" style="margin-top:8px">
                <?= View::escape((string) $section['name']) ?> is set up and waiting for its first tool.
                Every tool on this site is one self-contained file — once one is uploaded it appears here,
                on the home page and in the secondary header.
            </p>
            <?php /* An empty sub-category is a door into a room that is still
                     being furnished; the useful way out is the section it
                     belongs to, not the whole calculator catalogue. */ ?>
            <p style="margin-top:16px">
                <?php if ($parent !== null): ?>
                    <a class="btn btn-primary" href="<?= View::escape(View::url('/' . $parent['slug'])) ?>">
                        See everything in <?= View::escape((string) $parent['name']) ?>
                    </a>
                <?php else: ?>
                    <a class="btn btn-primary" href="<?= View::escape(View::url('/' . Groups::CALCULATORS)) ?>">
                        Browse the calculators
                    </a>
                <?php endif; ?>
            </p>
        </div>
    <?php elseif ($found === 0): ?>
        <div class="card empty-state list-search-empty">
            <h2 class="section-title section-title--sm">Nothing matched “<?= View::escape($q) ?>”</h2>
            <p class="page-lede" style="margin-top:8px">
                No tool in <?= View::escape((string) $section['name']) ?> mentions that.
                Try a shorter word, or browse the whole section.
            </p>
            <p style="margin-top:16px">
                <a class="btn btn-soft" href="<?= View::escape(View::url('/' . $section['slug'])) ?>">Clear the search</a>
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

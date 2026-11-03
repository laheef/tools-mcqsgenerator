<?php
/**
 * All tools — every file tool on the site, or one section's.
 *
 * The twin of /all-calculators, and deliberately built from the same parts: the
 * same search field, the same category chips, the same list rows, the same
 * "nothing matched" state. A visitor who has used one of the two catalogues
 * already knows how this one works.
 *
 * Everything here is server-rendered. Search and sort are a GET form and two
 * links, so the page works in a crawler, from a pasted URL, and with the script
 * off; no JavaScript is loaded for it.
 *
 * @var \Onim\Seo $seo
 * @var array|null $section   the group being listed, or null for all of them
 * @var array $sections       every tool section: slug, name, icon, count
 * @var array $rows           the tools on screen, already filtered and sorted
 * @var int   $total          how many the section holds before filtering
 * @var string $q
 * @var string $sort
 * @var string $path
 */

declare(strict_types=1);

use Onim\Format;
use Onim\Groups;
use Onim\View;

$sectionSlug = $section !== null ? (string) $section['slug'] : '';
$shown = count($rows);
$filtersActive = $q !== '' || $sectionSlug !== '';
$heading = $section !== null ? 'All ' . (string) $section['name'] : 'All tools';
$allCount = 0;
foreach ($sections as $sec) {
    $allCount += (int) $sec['count'];
}
?>
<div class="shell page-shell browse-shell">
    <?= View::breadcrumbs(array_values(array_filter([
        ['name' => 'Home', 'url' => '/'],
        $section !== null ? ['name' => (string) $section['name'], 'url' => '/' . $sectionSlug] : null,
        ['name' => $heading, 'url' => $path],
    ]))) ?>

    <header class="page-head">
        <div class="page-head-icon"<?= $section !== null ? ' style="--icon-hue: ' . Groups::hue($sectionSlug) . '"' : '' ?>>
            <?= View::icon($section !== null ? (string) $section['icon'] : 'grid', 40) ?>
        </div>
        <div>
            <h1 class="page-title"><?= View::escape($heading) ?></h1>
            <p class="page-lede">
                <?php if ($section !== null): ?>
                    Every tool in <?= View::escape((string) $section['name']) ?>, in one list — the same
                    pages the bands on the home page link to, with nothing hidden behind
                    a category. Search it, or sort it the way you read.
                <?php else: ?>
                    Every file tool the site ships, section by section, in one list. Each one
                    runs in your browser, says what it did, and never uploads the file it is
                    working on. Search it, or pick a section.
                <?php endif; ?>
            </p>
            <p class="browse-status">
                <span class="browse-status-count"><?= View::escape(Format::count($shown)) ?></span>
                <?= $shown === 1 ? 'tool' : 'tools' ?>
                <?php if ($q !== ''): ?>
                    matching “<?= View::escape($q) ?>”<?= $total !== $shown ? ' of ' . View::escape(Format::count($total)) : '' ?>
                <?php elseif ($section !== null): ?>
                    in <?= View::escape((string) $section['name']) ?>
                <?php else: ?>
                    across <?= View::escape(Format::count(count($sections))) ?> sections
                <?php endif; ?>
            </p>
        </div>
    </header>

    <form class="browse-search" role="search" action="<?= View::escape(View::url($path)) ?>" method="get" autocomplete="off">
        <label class="sr-only" for="tools-q">Search these tools</label>
        <div class="browse-search-field">
            <?= View::icon('search', 20) ?>
            <input id="tools-q" type="search" name="q" value="<?= View::escape($q) ?>"
                   placeholder="Search <?= View::escape(Format::count($total)) ?> <?= View::escape($section !== null ? Groups::toolNoun($sectionSlug, $total) : ($total === 1 ? 'tool' : 'tools')) ?> by name…"
                   autocomplete="off">
        </div>
        <label class="sr-only" for="tools-sort">Sort by</label>
        <select id="tools-sort" name="sort" class="browse-sort">
            <option value="az"<?= $sort === 'az' ? ' selected' : '' ?>>Name, A to Z</option>
            <option value="za"<?= $sort === 'za' ? ' selected' : '' ?>>Name, Z to A</option>
        </select>
        <button type="submit" class="btn btn-primary browse-submit">Search</button>
    </form>

    <nav class="browse-cats" aria-label="Filter by section">
        <a class="browse-cat<?= $section === null ? ' is-active' : '' ?>"
           href="<?= View::escape(View::url('/all-tools')) ?>"
           <?= $section === null ? 'aria-current="page"' : '' ?>>
            All <span class="browse-cat-count"><?= View::escape(Format::count($allCount)) ?></span>
        </a>
        <?php foreach ($sections as $sec): ?>
            <?php $isHere = $sectionSlug === (string) $sec['slug']; ?>
            <a class="browse-cat<?= $isHere ? ' is-active' : '' ?>"
               href="<?= View::escape(View::url('/all-tools/' . (string) $sec['slug'])) ?>"
               style="--icon-hue: <?= (int) Groups::hue((string) $sec['slug']) ?>"
               <?= $isHere ? 'aria-current="page"' : '' ?>>
                <?= View::escape((string) $sec['name']) ?>
                <span class="browse-cat-count"><?= View::escape(Format::count((int) $sec['count'])) ?></span>
            </a>
        <?php endforeach; ?>
    </nav>

    <?php if ($rows === []): ?>
        <div class="empty-state">
            <p>Nothing matched <?= $filtersActive ? 'that search' : 'this section' ?>.</p>
            <p>Try a shorter word, or start from a section:</p>
            <div class="chip-row">
                <?php foreach (array_slice($sections, 0, 6) as $sec): ?>
                    <a class="chip" href="<?= View::escape(View::url('/all-tools/' . (string) $sec['slug'])) ?>"><?= View::escape((string) $sec['name']) ?></a>
                <?php endforeach; ?>
                <a class="chip" href="<?= View::escape(View::url('/all-tools')) ?>">All tools</a>
            </div>
        </div>
    <?php else: ?>
        <ul class="browse-list">
            <?php foreach ($rows as $row): ?>
                <?php
                $rowSection = (string) ($row['group'] ?? Groups::groupOf((string) ($row['cat'] ?? '')));
                $rowHue = $rowSection !== '' ? Groups::hue($rowSection) : null;
                ?>
                <li class="browse-item">
                    <a class="browse-link" href="<?= View::escape(View::url((string) $row['path'])) ?>">
                        <?= View::toolIcon($row, '', 20, 'calc-glyph', $rowHue) ?>
                        <span class="browse-text">
                            <span class="browse-name"><?= View::escape((string) $row['name']) ?></span>
                            <span class="browse-desc"><?= View::escape(View::excerpt((string) ($row['description'] ?? ''), 150)) ?></span>
                        </span>
                        <span class="browse-cat-tag"><?= View::escape(Groups::label((string) ($row['cat'] ?? ''))) ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <p class="directory-foot" style="margin-top:26px">
        Looking for percentages, units or a mortgage instead?
        <a href="<?= View::escape(View::url('/all-calculators')) ?>">The calculator catalogue</a>
        holds every formula on the site.
    </p>
</div>

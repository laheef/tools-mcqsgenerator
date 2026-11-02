<?php
/**
 * All calculators — the whole catalogue on one page.
 *
 * Three filters that combine (search, category, letter), a sort, and pagination.
 * Every control is a plain link or a GET form, so the page works with JavaScript
 * off, in a crawler, and from a pasted URL. `assets/js/browse.js` upgrades it to
 * filter-as-you-type, but the server-rendered list is the source of truth.
 *
 * @var \Onim\Seo $seo
 * @var array $state      q, cat, letter, sort, page, pages, total, per, rows
 * @var array $params     the validated request parameters
 * @var array $letterCounts
 * @var array $categories
 */

declare(strict_types=1);

use Onim\Browse;
use Onim\Data;
use Onim\Format;
use Onim\Icons;
use Onim\View;

$filtersActive = $state['q'] !== '' || $state['cat'] !== '' || $state['letter'] !== '';
$from = $state['total'] === 0 ? 0 : ($state['page'] - 1) * $state['per'] + 1;
$to = min($state['total'], $state['page'] * $state['per']);
$catName = $state['cat'] !== '' ? (Data::category($state['cat'])['name'] ?? '') : '';
?>
<div class="shell page-shell browse-shell">
    <?= View::breadcrumbs([
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'All calculators', 'url' => '/all-calculators'],
    ]) ?>

    <header class="page-head">
        <div class="page-head-icon"><?= View::icon('grid', 40) ?></div>
        <div>
            <h1 class="page-title">All calculators</h1>
            <p class="page-lede">
                Every calculator on the site in one list, with the formula, the units and a
                worked example on each page. Search it, filter by category, or jump to a letter.
            </p>
            <?= View::render('partials/browse-status', ['state' => $state, 'catName' => $catName]) ?>
        </div>
    </header>

    <?= \Onim\Ads::slot('category_top', 'ad-slot--page-top') ?>

    <form class="browse-search" role="search" action="<?= View::escape(View::url('/all-calculators')) ?>" method="get"
          data-browse-form autocomplete="off">
        <label class="sr-only" for="browse-q">Search the catalogue</label>
        <div class="browse-search-field">
            <?= View::icon('search', 20) ?>
            <input id="browse-q" type="search" name="q" value="<?= View::escape($state['q']) ?>"
                   placeholder="Search <?= View::escape(Format::count((int) $state['catalogue'])) ?> calculators by name or topic…"
                   data-browse-input autocomplete="off">
            <?php if ($state['cat'] !== ''): ?>
                <input type="hidden" name="cat" value="<?= View::escape($state['cat']) ?>">
            <?php endif; ?>
            <?php if ($state['letter'] !== ''): ?>
                <input type="hidden" name="letter" value="<?= View::escape($state['letter']) ?>">
            <?php endif; ?>
        </div>
        <label class="sr-only" for="browse-sort">Sort by</label>
        <select id="browse-sort" name="sort" class="browse-sort" data-browse-sort>
            <option value="az"<?= $state['sort'] === 'az' ? ' selected' : '' ?>>Name, A to Z</option>
            <option value="za"<?= $state['sort'] === 'za' ? ' selected' : '' ?>>Name, Z to A</option>
            <option value="relevant"<?= $state['sort'] === 'relevant' ? ' selected' : '' ?>>Best match</option>
        </select>
        <button type="submit" class="btn btn-primary browse-submit">Search</button>
    </form>

    <nav class="browse-cats" aria-label="Filter by category">
        <a class="browse-cat<?= $state['cat'] === '' ? ' is-active' : '' ?>"
           href="<?= View::escape(Browse::url($params, ['cat' => '', 'page' => 1])) ?>"
           <?= $state['cat'] === '' ? 'aria-current="page"' : '' ?>>
            All <span class="browse-cat-count"><?= View::escape(Format::count((int) $state['catalogue'])) ?></span>
        </a>
        <?php foreach ($categories as $cat): ?>
            <?php $n = (int) ($cat['count'] ?? 0); ?>
            <a class="browse-cat<?= $state['cat'] === $cat['slug'] ? ' is-active' : '' ?>"
               href="<?= View::escape(Browse::url($params, ['cat' => (string) $cat['slug'], 'page' => 1])) ?>"
               <?= $state['cat'] === $cat['slug'] ? 'aria-current="page"' : '' ?>>
                <?= View::escape($cat['name']) ?> <span class="browse-cat-count"><?= View::escape(Format::count($n)) ?></span>
            </a>
        <?php endforeach; ?>
    </nav>

    <?php if ($letterCounts !== []): ?>
        <nav class="alpha-nav browse-alpha" aria-label="Filter by first letter">
            <a class="<?= $state['letter'] === '' ? 'is-active' : '' ?>"
               href="<?= View::escape(Browse::url($params, ['letter' => '', 'page' => 1])) ?>"
               <?= $state['letter'] === '' ? 'aria-current="page"' : '' ?>>All</a>
            <?php foreach ($letterCounts as $letter => $n): ?>
                <a class="<?= $state['letter'] === (string) $letter ? 'is-active' : '' ?>"
                   href="<?= View::escape(Browse::url($params, ['letter' => (string) $letter, 'page' => 1])) ?>"
                   title="<?= View::escape((string) $n) ?> calculator<?= $n === 1 ? '' : 's' ?>"
                   <?= $state['letter'] === (string) $letter ? 'aria-current="page"' : '' ?>><?= View::escape((string) $letter) ?></a>
            <?php endforeach; ?>
        </nav>
    <?php endif; ?>

    <div id="browse-results" aria-live="polite" aria-busy="false">
        <?= View::render('partials/browse-results', [
            'state' => $state,
            'params' => $params,
            'categories' => $categories,
            'filtersActive' => $filtersActive,
            'catName' => $catName,
        ]) ?>
    </div>

    <aside class="cross-links">
        <h2 class="section-title">Other ways in</h2>
        <div class="chip-row">
            <?php foreach ($categories as $cat): ?>
                <?php if ($cat['slug'] === $state['cat']) { continue; } ?>
                <a class="chip" href="<?= View::escape(View::url('/' . $cat['slug'])) ?>"><?= View::escape($cat['name']) ?> A–Z</a>
            <?php endforeach; ?>
            <a class="chip" href="<?= View::escape(View::url('/search')) ?>">Search</a>
        </div>
    </aside>
</div>

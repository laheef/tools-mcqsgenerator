<?php
/**
 * Home page, assembled from the sections the admin panel says to show.
 *
 * Each section row has a type and a small JSON config; this file knows how to
 * draw each type and nothing else. Reordering, disabling, retitling or adding a
 * section happens in the panel and takes effect on the next request — there is no
 * hard-coded layout left to fight with.
 *
 * The fallback list from Cms::homepageSections() (hero, category grid, popular)
 * keeps the page identical when the database is not installed.
 *
 * @var \Onim\Seo $seo
 * @var array $categories
 * @var array $featured
 * @var int   $total
 */

declare(strict_types=1);

use Onim\Cms;
use Onim\Data;
use Onim\Format;
use Onim\Icons;
use Onim\View;

$total = $total ?? Data::total();
$sections = Cms::homepageSections();

/** Draw one calculator card (used by the popular and latest sections). */
$card = static function (array $row): string {
    $catName = Data::category((string) $row['cat'])['name'] ?? '';
    ob_start(); ?>
    <a class="popular-card" href="<?= View::escape(View::url($row['path'])) ?>">
        <span class="popular-head">
            <?= Icons::forCalculator($row, 22, 'calc-glyph') ?>
            <span class="popular-cat"><?= View::escape($catName) ?></span>
        </span>
        <h3 class="popular-title"><?= View::escape($row['name']) ?></h3>
        <p class="popular-desc"><?= View::escape(View::excerpt((string) $row['description'], 120)) ?></p>
    </a>
    <?php return (string) ob_get_clean();
};

$headingEmitted = false;
foreach ($sections as $section) {
    $type = (string) ($section['stype'] ?? '');
    $title = trim((string) ($section['title'] ?? ''));
    $subtitle = trim((string) ($section['subtitle'] ?? ''));
    $config = is_array($section['config'] ?? null) ? $section['config'] : [];
    $anchor = 'section-' . preg_replace('~[^a-z0-9-]~', '', (string) ($section['skey'] ?? $type));

    if ($type === 'hero'):
        $eyebrow = trim((string) ($config['eyebrow'] ?? '')) ?: 'Your life in';
        $headline = trim((string) ($config['title'] ?? '')) ?: '{count} free calculators';
        $note = trim((string) ($config['note'] ?? ''));
        $ctaLabel = trim((string) ($config['cta_label'] ?? ''));
        $ctaUrl = trim((string) ($config['cta_url'] ?? ''));
        // The count placeholder becomes a refreshable span, formatted the same way
        // as every other counter on the page ("3 985", not "3985").
        $countSpan = '<span data-live-count="total">' . View::escape(Format::count((int) $total)) . '</span>';
        $headline = View::escape($headline);   // then put the span back below
        $headline = str_replace(View::escape((string) $total), $countSpan, $headline);
        $headline = str_replace(['{count}', View::escape('{count}')], $countSpan, $headline);
        ?>
        <section class="hero" id="<?= View::escape($anchor) ?>">
            <div class="shell hero-inner">
                <div class="hero-copy">
                    <?php if ($eyebrow !== ''): ?><p class="hero-eyebrow"><?= View::escape($eyebrow) ?></p><?php endif; ?>
                    <h1 class="hero-title"><span class="hero-count"><?= $headline /* built above from escaped parts + config text */ ?></span></h1>
                    <?php $headingEmitted = true; ?>
                    <?php if ($note !== ''): ?><p class="page-lede"><?= View::escape($note) ?></p><?php endif; ?>
                    <?php if ($ctaLabel !== '' && $ctaUrl !== ''): ?>
                        <p style="margin-top:14px"><a class="btn btn-primary" href="<?= View::escape(View::url($ctaUrl)) ?>"><?= View::escape($ctaLabel) ?></a></p>
                    <?php endif; ?>
                </div>

                <form class="hero-search" role="search" action="<?= View::escape(View::url('/search')) ?>" method="get" autocomplete="off">
                    <label class="sr-only" for="hero-search">Search calculator</label>
                    <input id="hero-search" type="search" name="q" placeholder="Search calculator…" data-search-input
                           aria-autocomplete="list" aria-controls="search-suggestions-hero">
                    <button type="submit" class="hero-search-submit" aria-label="Search">
                        <?= View::icon('search', 26) ?>
                    </button>
                    <div class="search-suggestions" id="search-suggestions-hero" role="listbox" hidden></div>
                </form>
            </div>
        </section>
    <?php elseif ($type === 'search'): ?>
        <section class="sheet" id="<?= View::escape($anchor) ?>">
            <div class="shell">
                <?php if ($title !== ''): ?><h2 class="section-title"><?= View::escape($title) ?></h2><?php endif; ?>
                <form class="hero-search" role="search" action="<?= View::escape(View::url('/search')) ?>" method="get" autocomplete="off">
                    <label class="sr-only" for="section-search">Search calculator</label>
                    <input id="section-search" type="search" name="q"
                           placeholder="<?= View::escape((string) ($config['placeholder'] ?? 'Search calculator…')) ?>"
                           data-search-input aria-autocomplete="list" aria-controls="search-suggestions-section">
                    <button type="submit" class="hero-search-submit" aria-label="Search"><?= View::icon('search', 24) ?></button>
                    <div class="search-suggestions" id="search-suggestions-section" role="listbox" hidden></div>
                </form>
            </div>
        </section>
    <?php elseif ($type === 'category_grid'): ?>
        <section class="sheet" id="all-calculators">
            <div class="shell">
                <h2 id="categories-heading" class="sr-only"><?= View::escape(trim((string) ($config['heading'] ?? '')) ?: 'Browse calculators by category') ?></h2>
                <div class="category-grid">
                    <?php foreach ($categories as $cat):
                        $count = Data::countByCategory($cat['slug']);
                        $isDiscover = $cat['slug'] === 'discover';
                        ?>
                        <a class="category-tile<?= $isDiscover ? ' category-tile--wide' : '' ?>"
                           href="<?= View::escape(View::url('/' . $cat['slug'])) ?>">
                            <span class="category-icon"><?= View::icon($cat['icon'], 34) ?></span>
                            <span class="category-name"><?= View::escape($cat['name']) ?></span>
                            <span class="category-count">
                                <?php if ($isDiscover): ?>
                                    <?= View::escape((string) $cat['description']) ?>
                                <?php else: ?>
                                    <span data-live-count="<?= View::escape((string) $cat['slug']) ?>"><?= View::escape((string) $count) ?></span> calculator<?= $count === 1 ? '' : 's' ?>
                                <?php endif; ?>
                            </span>
                        </a>
                    <?php endforeach; ?>

                    <aside class="builder-promo">
                        <div class="builder-promo-art" aria-hidden="true"><?= View::icon('math', 40) ?></div>
                        <div class="builder-promo-copy">
                            <p>Looking for something specific? Every calculator here solves in
                                any direction — fill the boxes you know.</p>
                            <a class="btn btn-primary" href="<?= View::escape(View::url('/calculators')) ?>">Browse all <?= View::escape(Format::count((int) $total)) ?> calculators</a>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    <?php elseif ($type === 'calc_directory'):
        /*
         * The whole catalogue, grouped by category, on the home page: every
         * category the site has, the count it holds, and the first few
         * calculators in it as real links — so a visitor can reach a calculator
         * from the home page without knowing which category it lives in.
         */
        $perCat = max(3, min(12, (int) ($config['per_category'] ?? 6)));
        $cats = Data::categories();
        ?>
        <section class="directory" id="<?= View::escape($anchor) ?>" aria-labelledby="<?= View::escape($anchor) ?>-heading">
            <div class="shell">
                <div class="directory-head">
                    <div>
                        <h2 id="<?= View::escape($anchor) ?>-heading" class="section-title"><?= View::escape($title ?: 'All calculators, by category') ?></h2>
                        <?php if ($subtitle !== ''): ?><p class="section-lede"><?= View::escape($subtitle) ?></p><?php endif; ?>
                    </div>
                    <div class="directory-actions">
                        <a class="btn btn-primary" href="<?= View::escape(View::url('/calculators')) ?>">
                            Browse all <?= View::escape(Format::count((int) $total)) ?> calculators
                        </a>
                    </div>
                </div>

                <div class="directory-grid">
                    <?php foreach ($cats as $cat):
                        $rows = Data::byCategory((string) $cat['slug']);
                        usort($rows, static fn (array $a, array $b): int => strcasecmp((string) $a['name'], (string) $b['name']));
                        $count = count($rows);
                        $shown = array_slice($rows, 0, $perCat);
                        ?>
                        <section class="directory-cat" aria-labelledby="<?= View::escape($anchor . '-' . $cat['slug']) ?>">
                            <div class="directory-cat-head">
                                <h3 class="directory-cat-name" id="<?= View::escape($anchor . '-' . $cat['slug']) ?>">
                                    <a href="<?= View::escape(View::url('/' . $cat['slug'])) ?>"><?= View::escape($cat['name']) ?></a>
                                </h3>
                                <span class="directory-cat-count"><span data-live-count="<?= View::escape((string) $cat['slug']) ?>"><?= View::escape(Format::count($count)) ?></span></span>
                            </div>
                            <ul class="directory-links">
                                <?php foreach ($shown as $row): ?>
                                    <li>
                                        <a href="<?= View::escape(View::url((string) $row['path'])) ?>">
                                            <?= Icons::forCalculator($row, 15, 'calc-glyph') ?>
                                            <span class="dir-name"><?= View::escape((string) $row['name']) ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <a class="directory-more" href="<?= View::escape(View::url('/calculators?cat=' . $cat['slug'])) ?>">
                                All <?= View::escape(Format::count($count)) ?> in <?= View::escape($cat['name']) ?> →
                            </a>
                        </section>
                    <?php endforeach; ?>
                </div>

                <p class="directory-foot" style="margin-top:22px">
                    <a href="<?= View::escape(View::url('/calculators')) ?>">Open the full catalogue</a> —
                    search it, filter it by category or letter, and sort it.
                </p>
            </div>
        </section>
    <?php elseif ($type === 'howto' || $type === 'method'):
        /*
         * A page of numbers with no explanation of where they come from reads as
         * a calculator farm. This band says, in four short panels, what every
         * calculator on the site actually does: solve in any direction, show the
         * formula with your own values in it, state its units, and leave a
         * citable page behind. It is a CMS section, so an owner who disagrees
         * with a word of it can edit or delete it in the panel.
         */
        $panels = [
            ['Solve in any direction',
             'Every calculator is a set of equations rather than a fixed form. Type the values you know and the empty one is solved for — the same tool answers "what is my BMI" and "what weight gives me a BMI of 22".',
             'equals'],
            ['The formula, with your numbers in it',
             'Under each section the page prints the equation it just used, with your own values substituted. Nothing is a black box and no result is invented.',
             'check'],
            ['Units stated, and swappable',
             'Metric and imperial, percent and decimal, currencies and prefix scales. Change the unit chip and the value is converted rather than retyped.',
             'link'],
            ['Free, no sign-up, no paywall',
             'The whole catalogue is open, including the working. Pages can be cited with an access date, and every result can be copied in one press.',
             'bookmark'],
        ]; ?>
        <section class="sheet home-howto" id="<?= View::escape($anchor) ?>">
            <div class="shell">
                <?php if ($title !== ''): ?><h2 class="section-title"><?= View::escape($title) ?></h2><?php endif; ?>
                <?php if ($subtitle !== ''): ?><p class="section-lede"><?= View::escape($subtitle) ?></p><?php endif; ?>
                <ul class="howto-grid">
                    <?php foreach ($panels as $panel): ?>
                        <li class="howto-card">
                            <span class="howto-icon" aria-hidden="true"><?= View::icon($panel[2], 20) ?></span>
                            <h3 class="howto-title"><?= View::escape($panel[0]) ?></h3>
                            <p class="howto-text"><?= View::escape($panel[1]) ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <p class="howto-foot">
                    <a class="btn btn-soft" href="<?= View::escape(View::url('/calculators')) ?>">Browse the whole catalogue</a>
                    <span class="howto-foot-note"><?= View::escape(Format::count((int) $total)) ?> calculators, <?= View::escape((string) count($categories)) ?> categories, no account needed.</span>
                </p>
            </div>
        </section>

    <?php elseif ($type === 'popular' || $type === 'latest'):
        $limit = max(1, min(48, (int) ($config['limit'] ?? 12)));
        if ($type === 'popular') {
            $rows = array_slice(Data::featured($limit), 0, $limit);
            // "Popular" means the most-visited right now when the counter has data.
            $top = Cms::topPaths($limit);
            if ($top !== []) {
                $ranked = [];
                foreach ($top as $path => $hits) {
                    $row = Data::row($path);
                    if ($row !== null && ($row['status'] ?? 'published') === 'published') {
                        $ranked[] = $row;
                    }
                }
                if (count($ranked) >= 3) {
                    $rows = array_slice($ranked, 0, $limit);
                }
            }
        } else {
            $rows = array_slice(Data::all(), -$limit);
        }
        ?>
        <section class="popular" id="<?= View::escape($anchor) ?>" aria-labelledby="<?= View::escape($anchor) ?>-heading">
            <div class="shell">
                <?php if ($title !== '' || $subtitle !== ''): ?>
                    <h2 id="<?= View::escape($anchor) ?>-heading" class="section-title"><?= View::escape($title ?: 'More calculators') ?></h2>
                    <?php if ($subtitle !== ''): ?><p class="section-lede"><?= View::escape($subtitle) ?></p><?php endif; ?>
                <?php endif; ?>
                <div class="popular-grid">
                    <?php foreach ($rows as $row) { echo $card($row); } ?>
                </div>
            </div>
        </section>
    <?php elseif ($type === 'blog'):
        $limit = max(1, min(12, (int) ($config['limit'] ?? 3)));
        $posts = Cms::posts($limit);
        if ($posts !== []): ?>
            <section class="popular" id="<?= View::escape($anchor) ?>" aria-labelledby="<?= View::escape($anchor) ?>-heading">
                <div class="shell">
                    <h2 id="<?= View::escape($anchor) ?>-heading" class="section-title"><?= View::escape($title ?: 'From the blog') ?></h2>
                    <?php if ($subtitle !== ''): ?><p class="section-lede"><?= View::escape($subtitle) ?></p><?php endif; ?>
                    <div class="popular-grid">
                        <?php foreach ($posts as $post): ?>
                            <a class="popular-card" href="<?= View::escape(View::url('/blog/' . $post['slug'])) ?>">
                                <span class="popular-head">
                                    <span class="popular-cat"><?= View::escape(date('j M Y', (int) strtotime((string) $post['published_at']))) ?></span>
                                </span>
                                <h3 class="popular-title"><?= View::escape((string) $post['title']) ?></h3>
                                <p class="popular-desc"><?= View::escape(View::excerpt((string) ($post['excerpt'] ?? ''), 120)) ?></p>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <p style="margin-top:18px"><a class="btn btn-soft" href="<?= View::escape(View::url('/blog')) ?>">All posts</a></p>
                </div>
            </section>
        <?php endif;
    elseif ($type === 'rich_text'):
        if (trim(strip_tags((string) ($config['html'] ?? ''))) !== '' || $title !== ''): ?>
            <section class="sheet" id="<?= View::escape($anchor) ?>">
                <div class="shell">
                    <?php if ($title !== ''): ?><h2 class="section-title"><?= View::escape($title) ?></h2><?php endif; ?>
                    <?php if ($subtitle !== ''): ?><p class="section-lede"><?= View::escape($subtitle) ?></p><?php endif; ?>
                    <div class="article-body"><?= (string) ($config['html'] ?? '') ?></div>
                </div>
            </section>
        <?php endif;
    elseif ($type === 'cta'): ?>
        <section class="sheet" id="<?= View::escape($anchor) ?>">
            <div class="shell">
                <div class="builder-promo" style="max-width:760px;margin-inline:auto">
                    <div class="builder-promo-copy">
                        <?php if ($title !== ''): ?><h2 class="section-title" style="margin-top:0"><?= View::escape($title) ?></h2><?php endif; ?>
                        <?php if ($subtitle !== ''): ?><p><?= View::escape($subtitle) ?></p><?php endif; ?>
                        <?php if (trim((string) ($config['html'] ?? '')) !== ''): ?><div><?= (string) $config['html'] ?></div><?php endif; ?>
                        <?php if (trim((string) ($config['cta_label'] ?? '')) !== '' && trim((string) ($config['cta_url'] ?? '')) !== ''): ?>
                            <a class="btn btn-primary" href="<?= View::escape(View::url((string) $config['cta_url'])) ?>"><?= View::escape((string) $config['cta_label']) ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php elseif ($type === 'stats'):
        // Real numbers only: counted from the catalogue and the database.
        $catCount = count($categories);
        $postCount = Cms::blogCount()['total']; ?>
        <section class="sheet" id="<?= View::escape($anchor) ?>">
            <div class="shell">
                <?php if ($title !== ''): ?><h2 class="section-title"><?= View::escape($title) ?></h2><?php endif; ?>
                <div class="how-steps">
                    <div class="how-step"><span class="how-num"><?= (int) $total ?></span><h3>calculators</h3><p>every one solvable in any direction</p></div>
                    <div class="how-step"><span class="how-num"><?= (int) $catCount ?></span><h3>categories</h3><p>from algebra to zoology</p></div>
                    <div class="how-step"><span class="how-num"><?= (int) $postCount ?></span><h3>blog posts</h3><p>worked examples and explanations</p></div>
                </div>
            </div>
        </section>
    <?php endif;
} ?>

<?php /* Between the sections and the footer: the homepage's own slot. It sits at
         the end of the page rather than between two configured sections, so it
         appears whatever the owner has switched on. */ ?>
<div class="shell home-ad"><?= \Onim\Ads::slot('home_mid') ?></div>

<?php
/*
 * Every page needs exactly one h1. The hero supplies it, but a site owner is
 * free to switch the hero off — so if nothing above produced a heading, emit
 * one that is available to search engines and screen readers but does not add
 * visual noise to the layout the owner designed.
 */
if (!$headingEmitted): ?>
    <div class="shell">
        <h1 class="sr-only"><?= View::escape($siteName ?? SITE_NAME) ?> — <?= View::escape((string) ($total ?? '')) ?> free calculators with the formula shown</h1>
    </div>
<?php endif; ?>

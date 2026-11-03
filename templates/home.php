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
use Onim\Figures;
use Onim\Format;
use Onim\Groups;
use Onim\Icons;
use Onim\View;

$total = $total ?? Data::total();
/* Set when this page is the Calculators group (/calculator) rather than the
   site's front page: the same sections, minus the bands for the other groups. */
$group = $group ?? null;
$sections = Cms::homepageSections();

/*
 * Calculators first, then everything else.
 *
 * The two category bands are the page's table of contents, and the calculators
 * are the site's centre of gravity — four thousand pages against a section that
 * has not been filled yet. A site whose stored order still puts the sections
 * first (the order an older release seeded) gets them swapped here, so the rule
 * holds the moment the file is deployed instead of the moment an owner presses
 * Upgrade. Any section between the two keeps its place: only the two bands move.
 */
if ($group === null) {
    $dirAt = null;
    $toolsAt = null;
    foreach ($sections as $i => $row) {
        if ((string) ($row['stype'] ?? '') === 'calc_directory' && $dirAt === null) {
            $dirAt = $i;
        }
        if ((string) ($row['stype'] ?? '') === 'tool_groups' && $toolsAt === null) {
            $toolsAt = $i;
        }
    }
    if ($dirAt !== null && $toolsAt !== null && $toolsAt < $dirAt) {
        $dirRow = $sections[$dirAt];
        array_splice($sections, $dirAt, 1);
        array_splice($sections, $toolsAt, 0, [$dirRow]);
    }
}

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

    /*
     * Seeded copy is not a decision.
     *
     * Round 55 rewrote the home page for a site that also holds file tools, but
     * the headings live in the database: an installed site still holds the strings
     * the installer seeded, so a deploy alone would leave "All calculators, by
     * category" over a page that is no longer about calculators. Rather than wait
     * for an owner to press Upgrade — or, worse, overwrite what they typed — the
     * exact seeded strings are read as "not customised" and replaced with the
     * current wording here. Anything an editor actually wrote is kept verbatim.
     *
     * The same rule the hero section already used for its eyebrow.
     */
    $seedCopy = [
        'directory'   => ['All calculators, by category', 'Calculators, by category'],
        'tools'       => ['Tools, by section', 'Tools, by category'],
        'popular'     => ['Most popular calculators', 'Most opened tools'],
        'how'         => ['How these calculators work', 'How these tools work'],
        'howitworks'  => ['What every calculator on this site actually does', 'What every tool here actually does'],
    ];
    $skeyRow = (string) ($section['skey'] ?? $type);
    if (isset($seedCopy[$skeyRow]) && $title === $seedCopy[$skeyRow][0]) {
        $title = $seedCopy[$skeyRow][1];
    }
    if ($title === 'Most popular') {
        $title = 'Most opened tools';
    }
    /* Two subtitles were seeded with the page's old subject in them. */
    $seedSubtitles = [
        'Every category on the site, with a few of its calculators — or open the full catalogue and filter it.'
            => 'Every calculator topic on the site, with a few of its tools — or open the full catalogue and filter it.',
        'The ones people open most often'
            => 'The pages people open most often — calculators and file tools together',
        'Not a form with a number at the end — an equation you can turn around, with the working shown.'
            => 'Calculators turn an equation around. File tools run on your machine. Both show their working.',
    ];
    if (isset($seedSubtitles[$subtitle])) {
        $subtitle = $seedSubtitles[$subtitle];
    }

    if ($type === 'hero'):
        $eyebrow = trim((string) ($config['eyebrow'] ?? ''));
        $headline = trim((string) ($config['title'] ?? ''));
        $note = trim((string) ($config['note'] ?? ''));
        /* An installed database still holds the seeded wording — "Your life in"
           over "{count} free calculators" — so changing the default here would
           have changed nothing on the live site. Those two strings are the seed,
           not a decision, so they are treated as "not customised"; anything an
           editor typed is kept exactly as typed. */
        if ($eyebrow === '' || $eyebrow === 'Your life in' || $eyebrow === 'Onim — tools that show their working') {
            $eyebrow = 'Onim — every tool shows its working';
        }
        if ($headline === '' || $headline === '{count} free calculators' || $headline === '{count} calculators' || $headline === 'Your life, in {rotate}') {
            /* The front page is the whole site now, so the headline names what a
               visitor can bring to it rather than what it can count: a
               percentage, a photo, a PDF. */
            $headline = 'Tools for {rotate}';
        }
        if ($note === '' || str_starts_with($note, '{count} tools, free, no sign-up')) {
            $note = '{count} tools across {sections} sections — calculators print the formula they used, and the file tools never upload your file anywhere. Free, no sign-up.';
        }
        $ctaLabel = trim((string) ($config['cta_label'] ?? ''));
        $ctaUrl = trim((string) ($config['cta_url'] ?? ''));
        /* The rotating word. It is a little loop, not a claim: the categories
           below cover far more than these eight words, and a reader who watches
           it for ten seconds has seen the range of the site without reading a
           paragraph about it. Overridable from the homepage builder. */
        $wordsRaw = trim((string) ($config['words'] ?? ''));
        $words = $wordsRaw !== ''
            ? array_values(array_filter(array_map('trim', preg_split('~[,|]~', $wordsRaw) ?: [])))
            : ['percentages', 'photos', 'PDFs', 'audio files', 'units', 'mortgages', 'colours', 'spreadsheets'];
        // The count placeholder becomes a refreshable span, formatted the same way
        // as every other counter on the page ("3 985", not "3985").
        $countSpan = '<span data-live-count="total">' . View::escape(Format::count((int) $total)) . '</span>';
        $rotator = '<span class="hero-rotate" data-hero-rotate>';
        foreach ($words as $i => $word) {
            $rotator .= '<span class="hero-rotate-word' . ($i === 0 ? ' is-on' : '') . '" aria-hidden="true">'
                . View::escape($word) . '</span>';
        }
        $rotator .= '<span class="sr-only">' . View::escape(implode(', ', $words)) . '</span></span>';
        /* {count} works in the eyebrow and the note too — a reference into a
           temporary array would have written to the copy, not the variable. */
        $sectionCount = max(0, count(Groups::all()) - 1);
        $eyebrow = str_replace(['{count}', View::escape('{count}')], $countSpan, View::escape($eyebrow));
        $note = str_replace(['{count}', View::escape('{count}')], $countSpan, View::escape($note));
        $note = str_replace(['{sections}', View::escape('{sections}')], View::escape((string) $sectionCount), $note);
        $headline = View::escape($headline);
        $headline = str_replace(View::escape((string) $total), $countSpan, $headline);
        $headline = str_replace(['{count}', View::escape('{count}')], $countSpan, $headline);
        $headline = str_replace(['{rotate}', View::escape('{rotate}')], $rotator, $headline);
        ?>
        <section class="hero" id="<?= View::escape($anchor) ?>">
            <div class="hero-wash" aria-hidden="true"><span></span><span></span><span></span></div>
            <div class="shell hero-inner">
                <div class="hero-copy">
                    <?php if ($eyebrow !== ''): ?>
                        <p class="hero-eyebrow"><span class="hero-pulse" aria-hidden="true"></span><?= $eyebrow ?></p>
                    <?php endif; ?>
                    <h1 class="hero-title"><span class="hero-count"><?= $headline /* built above from escaped parts + config text */ ?></span></h1>
                    <?php $headingEmitted = true; ?>
                    <?php if ($note !== ''): ?><p class="hero-note"><?= $note ?></p><?php endif; ?>

                    <?php /* The search sits in the copy column, under the words it is
                             the answer to, at exactly the width of the headline
                             block. It used to hang off the right-hand column under
                             the drawing, which on a 1440 screen left it floating
                             half a page away from its own label. */ ?>
                    <form class="hero-search" role="search" action="<?= View::escape(View::url('/search')) ?>" method="get" autocomplete="off">
                        <label class="sr-only" for="hero-search">Search tools</label>
                        <input id="hero-search" type="search" name="q" placeholder="Search <?= View::escape(Format::count((int) $total)) ?> tools…" data-search-input
                               aria-autocomplete="list" aria-controls="search-suggestions-hero">
                        <button type="submit" class="hero-search-submit" aria-label="Search">
                            <?= View::icon('search', 22) ?>
                        </button>
                        <div class="search-suggestions" id="search-suggestions-hero" role="listbox" hidden></div>
                    </form>

                    <?php if ($ctaLabel !== '' && $ctaUrl !== ''): ?>
                        <p class="hero-actions">
                            <a class="btn btn-primary" href="<?= View::escape(View::url($ctaUrl)) ?>"><?= View::escape($ctaLabel) ?></a>
                        </p>
                    <?php else: ?>
                        <p class="hero-quick">
                            <span>Popular:</span>
                            <a href="<?= View::escape(View::url('/all-calculators')) ?>">percentages</a>
                            <a href="<?= View::escape(View::url('/finance')) ?>">mortgages</a>
                            <a href="<?= View::escape(View::url('/math')) ?>">units</a>
                            <a href="<?= View::escape(View::url('/converters')) ?>">converters</a>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="hero-side">
                    <?php /* A worked example, drawn: the promise in the lede, shown
                             once before a word of it is read. Decorative — the
                             numbers are illustrative and the copy says the same
                             thing in words. */ ?>
                    <div class="hero-figure hero-figure--wide" aria-hidden="true"><?= Figures::svg('tool-file', 'hero-figure-art') ?></div>
                </div>
            </div>
        </section>
    <?php elseif ($type === 'search'): ?>
        <section class="sheet" id="<?= View::escape($anchor) ?>">
            <div class="shell">
                <?php if ($title !== ''): ?><h2 class="section-title"><?= View::escape($title) ?></h2><?php endif; ?>
                <form class="hero-search" role="search" action="<?= View::escape(View::url('/search')) ?>" method="get" autocomplete="off">
                    <label class="sr-only" for="section-search">Search calculator</label>
                    <input id="section-search" type="search" name="q"
                           placeholder="<?= View::escape((string) ($config['placeholder'] ?? 'Search tools…')) ?>"
                           data-search-input aria-autocomplete="list" aria-controls="search-suggestions-section">
                    <button type="submit" class="hero-search-submit" aria-label="Search"><?= View::icon('search', 24) ?></button>
                    <div class="search-suggestions" id="search-suggestions-section" role="listbox" hidden></div>
                </form>
            </div>
        </section>
    <?php elseif ($type === 'category_grid'):
        /*
         * The first grid on the page, and the one that changed meaning in round
         * 54: the front page used to open on fourteen calculator topics, which
         * said the site was a calculator site. It opens on the sixteen sections
         * now — Calculators first, then the file tools — and each tile says how
         * much is behind it.
         *
         * /calculators (the Calculators group's own page) keeps the topic grid
         * it always had: a visitor who asked for calculators came for topics.
         */
        $showGroups = $group === null;
        /* The band as the installer seeded it — sixteen tiles saying what the two
           category grids below already say — is skipped on the front page rather
           than waited for a migration to switch off. An owner who edits the row
           (a heading of their own, some config) gets it back exactly as they set
           it, and /calculators still renders it as the topic grid. */
        $seededTiles = $skeyRow === 'categories'
            && $title === ''
            && ($config === [] || (string) ($config['heading'] ?? '') === 'Browse calculators by category');
        if ($showGroups && $seededTiles) {
            continue;
        }
        ?>
        <section class="sheet" id="all-calculators">
            <div class="shell">
                <h2 id="categories-heading" class="sr-only"><?= View::escape($showGroups
                    ? 'Browse tools by category'
                    : (trim((string) ($config['heading'] ?? '')) ?: 'Browse calculators by category')) ?></h2>
                <div class="category-grid">
                    <?php if ($showGroups): ?>
                        <?php foreach (Groups::all() as $g):
                            $gSlug = (string) $g['slug'];
                            $gCount = Groups::countGroup($gSlug);
                            $isCalc = $gSlug === Groups::CALCULATORS;
                            ?>
                            <a class="category-tile" href="<?= View::escape(View::url('/' . $gSlug)) ?>">
                                <span class="category-icon"><?= View::icon((string) $g['icon'], 30) ?></span>
                                <span class="category-name"><?= View::escape((string) $g['name']) ?></span>
                                <span class="category-count">
                                    <?php if ($isCalc): ?>
                                        <span data-live-count="total"><?= View::escape(Format::count((int) $total)) ?></span> calculators
                                    <?php elseif ($gCount > 0): ?>
                                        <?= View::escape(Format::count($gCount)) ?> tool<?= $gCount === 1 ? '' : 's' ?>
                                    <?php else: ?>
                                        Coming soon
                                    <?php endif; ?>
                                </span>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <?php foreach ($categories as $cat):
                            $count = Data::countByCategory($cat['slug']);
                            $isDiscover = $cat['slug'] === 'discover';
                            ?>
                            <a class="category-tile<?= $isDiscover ? ' category-tile--wide' : '' ?>"
                               href="<?= View::escape(View::url('/' . $cat['slug'])) ?>">
                                <span class="category-icon"><?= View::icon($cat['icon'], 30) ?></span>
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
                    <?php endif; ?>

                    <aside class="builder-promo">
                        <div class="builder-promo-art" aria-hidden="true"><?= Figures::svg('catalogue', 'figure-art') ?></div>
                        <div class="builder-promo-copy">
                            <p><?= $showGroups
                                ? 'Calculators solve in any direction — fill the boxes you know. The file tools run in your browser and never upload anything.'
                                : 'Looking for something specific? Every calculator here solves in any direction — fill the boxes you know.' ?></p>
                            <?php if ($showGroups): ?>
                                <a class="btn btn-primary" href="<?= View::escape(View::url('/all-calculators')) ?>">Browse all <?= View::escape(Format::count((int) $total)) ?> calculators</a>
                            <?php else: ?>
                                <a class="btn btn-primary" href="<?= View::escape(View::url('/all-calculators')) ?>">Browse all <?= View::escape(Format::count((int) $total)) ?> calculators</a>
                            <?php endif; ?>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    <?php elseif ($type === 'tool_groups'):
        /*
         * One band per section, drawn exactly like the calculator band above it:
         * "Audio Tools, by category" with a card per subsection, the number of
         * tools on each, a few of them as real links and an "All N in …" foot.
         *
         * That is what the page had for the calculators and what the reference
         * tools site has for every section — the same grid, repeated, so a
         * visitor learns the shape once. The card a section with no tools gets is
         * greyed and says so, rather than disappearing.
         *
         * On /calculators the same sections are rendered with $group set, and
         * these bands stand down — that page is the calculator catalogue.
         */
        if ($group === null):
            $perGroup = max(3, min(12, (int) ($config['per_group'] ?? 6)));
            $sections = [];
            foreach (Groups::all() as $g) {
                $gSlug = (string) $g['slug'];
                if ($gSlug === Groups::CALCULATORS) {
                    continue;
                }
                $cards = [];
                $totalInSection = 0;
                /* A section's own tools come first, in a card titled after the
                   section, then one card per subsection — the same order the
                   group page lists them in. */
                $direct = Groups::tools($gSlug);
                if ($direct !== []) {
                    usort($direct, static fn (array $a, array $b): int => strcasecmp((string) $a['name'], (string) $b['name']));
                    $cards[] = [
                        'name' => (string) $g['name'],
                        'url' => '/' . $gSlug,
                        'rows' => $direct,
                        'count' => count($direct),
                        'icon' => (string) $g['icon'],
                    ];
                    $totalInSection += count($direct);
                }
                foreach (Groups::subs($gSlug) as $sub) {
                    $rows = Groups::tools((string) $sub['slug']);
                    usort($rows, static fn (array $a, array $b): int => strcasecmp((string) $a['name'], (string) $b['name']));
                    if ($rows !== []) {
                        $totalInSection += count($rows);
                    }
                    $cards[] = [
                        'name' => (string) $sub['name'],
                        'url' => '/' . (string) $sub['slug'],
                        'rows' => $rows,
                        'count' => count($rows),
                        'icon' => (string) $sub['icon'],
                    ];
                }
                if ($cards === []) {
                    $cards[] = [
                        'name' => (string) $g['name'],
                        'url' => '/' . $gSlug,
                        'rows' => [],
                        'count' => 0,
                        'icon' => (string) $g['icon'],
                    ];
                }
                $sections[] = ['group' => $g, 'cards' => $cards, 'total' => $totalInSection];
            }
            ?>
            <?php foreach ($sections as $index => $block):
                $g = $block['group'];
                $gSlug = (string) $g['slug'];
                $totalInSection = (int) $block['total'];
                $anchorId = $anchor . '-' . $gSlug;
                ?>
                <section class="directory<?= $index === 0 ? ' directory--first' : '' ?><?= $index % 2 === 1 ? ' directory--alt' : '' ?>" id="<?= View::escape($anchorId) ?>"
                         aria-labelledby="<?= View::escape($anchorId) ?>-heading">
                    <div class="shell">
                        <div class="directory-head">
                            <div class="directory-title">
                                <span class="directory-icon"><?= View::icon((string) $g['icon'], 26) ?></span>
                                <div>
                                    <h2 id="<?= View::escape($anchorId) ?>-heading" class="section-title"><?= View::escape((string) $g['name']) ?>, by category</h2>
                                    <p class="section-lede">
                                        <?= View::escape((string) ($g['description'] !== '' ? $g['description'] : 'Every tool in this section, filed under the sub-category it belongs to.')) ?>
                                    </p>
                                </div>
                            </div>
                            <div class="directory-actions">
                                <span class="directory-total">
                                    <?= $totalInSection > 0
                                        ? View::escape(Format::count($totalInSection)) . ' tool' . ($totalInSection === 1 ? '' : 's')
                                        : 'Opening soon' ?>
                                </span>
                                <a class="btn btn-soft" href="<?= View::escape(View::url('/' . $gSlug)) ?>">
                                    Open <?= View::escape((string) $g['name']) ?>
                                </a>
                            </div>
                        </div>

                        <div class="directory-grid">
                            <?php foreach ($block['cards'] as $tile): ?>
                                <section class="directory-cat<?= $tile['count'] === 0 ? ' directory-cat--empty' : '' ?>">
                                    <div class="directory-cat-head">
                                        <h3 class="directory-cat-name">
                                            <a href="<?= View::escape(View::url($tile['url'])) ?>"><?= View::escape($tile['name']) ?></a>
                                        </h3>
                                        <span class="directory-cat-count"><?= View::escape(Format::count((int) $tile['count'])) ?></span>
                                    </div>
                                    <?php if ($tile['count'] === 0): ?>
                                        <p class="directory-empty">No tools yet — this opens with its first upload.</p>
                                    <?php else: ?>
                                        <ul class="directory-links">
                                            <?php foreach (array_slice($tile['rows'], 0, $perGroup) as $row): ?>
                                                <li>
                                                    <a href="<?= View::escape(View::url((string) $row['path'])) ?>">
                                                        <?= View::toolIcon($row, (string) $tile['icon'], 13, 'calc-glyph') ?>
                                                        <span class="dir-name"><?= View::escape((string) $row['name']) ?></span>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                    <a class="directory-more" href="<?= View::escape(View::url($tile['url'])) ?>">
                                        <?php if ($tile['count'] === 0): ?>
                                            Open <?= View::escape($tile['name']) ?> →
                                        <?php else: ?>
                                            All <?= View::escape(Format::count((int) $tile['count'])) ?> in <?= View::escape($tile['name']) ?> →
                                        <?php endif; ?>
                                    </a>
                                </section>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endforeach; ?>
        <?php endif; ?>

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
                        <h2 id="<?= View::escape($anchor) ?>-heading" class="section-title"><?= View::escape($title ?: 'Calculators, by category') ?></h2>
                        <p class="section-lede">
                            <?= $subtitle !== ''
                                ? View::escape($subtitle)
                                : 'Every calculator topic on the site, with a few of its tools — or open the full catalogue and filter it.' ?>
                        </p>
                    </div>
                    <div class="directory-actions">
                        <a class="btn btn-primary" href="<?= View::escape(View::url('/all-calculators')) ?>">
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
                                            <?= Icons::forCalculator($row, 13, 'calc-glyph') ?>
                                            <span class="dir-name"><?= View::escape((string) $row['name']) ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <a class="directory-more" href="<?= View::escape(View::url('/all-calculators?cat=' . $cat['slug'])) ?>">
                                All <?= View::escape(Format::count($count)) ?> in <?= View::escape($cat['name']) ?> →
                            </a>
                        </section>
                    <?php endforeach; ?>
                </div>

                <p class="directory-foot" style="margin-top:22px">
                    <a href="<?= View::escape(View::url('/all-calculators')) ?>">Open the full catalogue</a> —
                    search it, filter it by category or letter, and sort it.
                    <?php if ($group === null): ?>
                        The file tools are listed under
                        <a href="#<?= View::escape('section-tools') ?>">Tools, by category</a>.
                    <?php endif; ?>
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
        /*
         * Each panel carries a drawing as well as an icon. The four claims here
         * are the site's whole argument, and a page that makes them in nothing
         * but paragraphs asks the reader to take them on trust — which is the
         * one thing a site about showing its working should not do. The figures
         * are inline SVG (lib/Figures.php): no request, no layout shift, and
         * they follow the brand colour set in the panel.
         */
        $panels = [
            ['Calculators solve in any direction',
             'Every calculator is a set of equations rather than a fixed form. Type the values you know and the empty one is solved for — the same tool answers “what is my BMI” and “what weight gives me a BMI of 22”.',
             'equals', 'solve-both-ways'],
            ['File tools run in your browser',
             'The audio, image and PDF tools work on the file you picked, on your machine. Nothing is uploaded to a server, nothing is stored, and the page never learns the contents of your file.',
             'lock', 'free-open'],
            ['The formula, with your numbers in it',
             'Under each calculator the page prints the equation it just used, with your own values substituted. A converter shows its factor; a checker shows what it checked. Nothing is a black box.',
             'check', 'formula'],
            ['Free, no sign-up, no paywall',
             'The whole catalogue is open, including the working. Pages can be cited with an access date, every result can be copied in one press, and no tool asks for an account.',
             'bookmark', 'unit-swap'],
        ]; ?>
        <section class="sheet home-howto" id="<?= View::escape($anchor) ?>">
            <div class="shell">
                <?php if ($title !== ''): ?><h2 class="section-title"><?= View::escape($title) ?></h2><?php endif; ?>
                <?php if ($subtitle !== ''): ?><p class="section-lede"><?= View::escape($subtitle) ?></p><?php endif; ?>
                <ul class="howto-grid">
                    <?php foreach ($panels as $panel): ?>
                        <li class="howto-card">
                            <span class="howto-figure"><?= Figures::svg($panel[3], 'figure-art figure-art--card') ?></span>
                            <span class="howto-icon" aria-hidden="true"><?= View::icon($panel[2], 20) ?></span>
                            <h3 class="howto-title"><?= View::escape($panel[0]) ?></h3>
                            <p class="howto-text"><?= View::escape($panel[1]) ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <p class="howto-foot">
                    <a class="btn btn-soft" href="<?= View::escape(View::url('/all-calculators')) ?>">Browse the whole catalogue</a>
                    <span class="howto-foot-note">
                        <?= View::escape(Format::count((int) $total)) ?> calculators,
                        <?= View::escape(Format::count(count(Groups::all()) - 1)) ?> tool sections,
                        <?= View::escape((string) count($categories)) ?> calculator topics — no account needed.
                    </span>
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
        if (trim(strip_tags((string) ($config['html'] ?? ''))) !== '' || $title !== ''):
            $html = (string) ($config['html'] ?? '');
            /* The three steps the installer seeded were written for a calculator
               site ("Fill the values you know", "Read the units you work in",
               "Check the formula"). They are still in an installed database, so
               they are swapped here for the tool-site steps — matched on the
               seeded markup, so an owner's own list is never touched. The second
               step is the one that had to change: it is where a file tool differs
               from a calculator. */
            if (str_contains($html, '<h3>Read the units you work in</h3>')
                && str_contains($html, '<span class="how-num">3</span><h3>Check the formula</h3>')) {
                $html = '<ol class="how-steps">'
                    . '<li class="how-step"><span class="how-num">1</span><h3>Fill the values you know</h3>'
                    . '<p>Every calculator is a set of equations rather than a fixed form. Type into any field — the empty ones are solved for you.</p></li>'
                    . '<li class="how-step"><span class="how-num">2</span><h3>Or bring a file</h3>'
                    . '<p>The audio, image and PDF tools work on the file in your browser. Nothing is uploaded, nothing is stored, and no account is made.</p></li>'
                    . '<li class="how-step"><span class="how-num">3</span><h3>Check the working</h3>'
                    . '<p>The calculator prints the equation it used with your own numbers in it, and a converter shows its factor. Nothing here is a black box.</p></li>'
                    . '</ol>';
            }
            /*
             * A rich-text band is whatever the owner typed. When what they typed
             * is a numbered walk-through (an <ol> of steps), the band gets the
             * same treatment as the how-to band below it: a drawing per step,
             * lifted out of the markup by its number. An owner who writes
             * something else gets exactly the article body they always got.
             */
            $stepFigures = ['fill-values', 'units', 'formula', 'results', 'catalogue'];
            $stepCount = preg_match_all('~<li[^>]*class="[^"]*how-step~i', $html) ?: 0;
            if ($stepCount === 0) {
                $stepCount = preg_match_all('~<li~i', $html) ?: 0;
            }
            $isWalkthrough = $stepCount >= 2 && $stepCount <= 5 && str_contains($html, '<ol');
            if ($isWalkthrough) {
                $n = -1;
                $html = (string) preg_replace_callback(
                    '~<li([^>]*)>~i',
                    static function (array $m) use (&$n, $stepFigures): string {
                        $n++;
                        $fig = $stepFigures[$n % count($stepFigures)];
                        return '<li' . $m[1] . '><span class="how-figure">' . Figures::svg($fig, 'figure-art figure-art--step') . '</span>';
                    },
                    $html,
                    $stepCount
                );
            }
            ?>
            <section class="sheet<?= $isWalkthrough ? ' sheet--how' : '' ?>" id="<?= View::escape($anchor) ?>">
                <div class="shell">
                    <?php if ($title !== ''): ?><h2 class="section-title"><?= View::escape($title) ?></h2><?php endif; ?>
                    <?php if ($subtitle !== ''): ?><p class="section-lede"><?= View::escape($subtitle) ?></p><?php endif; ?>
                    <div class="article-body"><?= $html ?></div>
                </div>
            </section>
        <?php endif;
    elseif ($type === 'cta'): ?>
        <section class="sheet" id="<?= View::escape($anchor) ?>">
            <div class="shell">
                <div class="builder-promo" style="max-width:820px;margin-inline:auto">
                    <div class="builder-promo-art" aria-hidden="true"><?= Figures::svg('results', 'figure-art') ?></div>
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

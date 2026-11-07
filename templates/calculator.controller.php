<?php
/**
 * Calculator page controller.
 *
 * Reads optional query params (so any state is deep-linkable and testable),
 * runs the solver server-side, then renders. The browser re-solves on every
 * keystroke with the js mirror in assets/js/calc.js.
 */

declare(strict_types=1);

use Onim\Data;
use Onim\Engagement;
use Onim\InternalLinks;
use Onim\Format;
use Onim\Seo;
use Onim\Solver;
use Onim\View;
use Onim\Widget;

/** @var array $calc */

/** ISO date / time query value -> epoch milliseconds (UTC). */
function onim_parse_date(string $value, string $type): ?float
{
    $value = trim($value);
    if ($value === '') {
        return null;
    }
    if ($type === 'time') {
        if (!preg_match('/^(\d{1,2}):(\d{2})/', $value, $m)) {
            return null;
        }
        return (float) (((int) $m[1] * 60 + (int) $m[2]) * 60000);
    }
    $ts = strtotime(strlen($value) <= 10 ? $value . ' 00:00:00 UTC' : $value . ' UTC');
    return $ts === false ? null : (float) ($ts * 1000);
}

$units = Data::units();
$row   = Data::findRow($calc['cat'], $calc['slug']);
// A preview (signed link from the panel) shows an unpublished calculator; the
// row lookup above deliberately hides it, so rebuild what the page needs.
if ($row === null) {
    $row = Data::row((string) $calc['path']);
}
$isPreview = $isPreview ?? false;

/* ------------------------------------------------- gather query state */
$inputs    = [];
$unitChoice = [];
$selectChoice = [];

foreach ($calc['groups'] as $group) {
    foreach ($group['matrices'] as $matrix) {
        foreach ($matrix['columns'] as $column) {
            foreach ($column as $field) {
                if (($field['type'] ?? '') !== 'variable' || empty($field['var'])) {
                    continue;
                }
                $name = $field['var'];
                $varDef = $calc['variables'][$name] ?? [];

                // unit selection
                $unitKey = $field['unitSwitcher'] ?? null;
                if ($unitKey !== null && $units->supported($unitKey)) {
                    $allowed = array_keys($units->options($unitKey));
                    $declared = (string) ($varDef['defaultUnit'] ?? '');
                    if ($declared !== '' && !in_array($declared, $allowed, true)) {
                        // The field opens in a compound unit ("deg min sec").
                        // There is no factor that turns that into one number, so
                        // the box stays a plain number in the field's own scale
                        // instead of silently being divided by a wrong one.
                        $unitKey = null;
                    }
                } else {
                    $unitKey = null;
                }
                if ($unitKey !== null && $units->supported($unitKey)) {
                    $allowed = array_keys($units->options($unitKey));
                    $wanted  = isset($_GET[$name . '_unit']) ? (string) $_GET[$name . '_unit'] : '';
                    $start = (string) ($varDef['defaultUnit'] ?? '');
                    if (!in_array($start, $allowed, true)) {
                        $start = (string) $units->defaultUnit($unitKey);
                    }
                    $unitChoice[$name] = in_array($wanted, $allowed, true) ? $wanted : $start;
                }

                // value-select rows
                if (!empty($field['options'])) {
                    $wanted = isset($_GET[$name]) ? (string) $_GET[$name] : null;
                    $uids = array_column($field['options'], 'uid');
                    if ($wanted !== null && !in_array($wanted, $uids, true)) {
                        $wanted = null;
                    }
                    $selectChoice[$name] = $wanted;
                    $value = Solver::selectValue($calc, $name, $varDef, $wanted);
                    if ($value !== null) {
                        $inputs[$name] = $value;
                    }
                    continue;
                }

                if (isset($_GET[$name])) {
                    $varType = (string) ($varDef['type'] ?? '');
                    if (in_array($varType, ['date', 'datetime', 'time'], true)) {
                        // dates arrive as ISO strings in a shared link
                        $ms = onim_parse_date((string) $_GET[$name], $varType);
                        if ($ms !== null) {
                            $inputs[$name] = $ms;
                        }
                        continue;
                    }
                    $parsed = Format::parse($_GET[$name]);
                    if ($parsed !== null) {
                        $inputs[$name] = $unitKey !== null
                            ? $units->toBase($parsed, $unitKey, $unitChoice[$name])
                            : $parsed;
                    }
                }
            }
        }
    }
}

/* -------------------------------------------------------------- solve */
$solver = Solver::solve($calc, $inputs, $units);
$widget = new Widget($calc, $units, $solver, $unitChoice);
$groups = $widget->groups();

/* ------------------------------------------------------- article + TOC */
/*
 * The reference page does not ship headings inside the article HTML: each
 * `regular` part carries a `title`, and the renderer emits
 *   <h2 data-testid="articleSectionHeader-N">Title</h2> + the part body
 * with the TOC slug as the anchor. We reproduce that structure exactly so
 * every table-of-contents link resolves.
 */
$toc = $calc['toc'] ?? [];

$slugify = static function (string $text): string {
    $text = strtolower(trim(strip_tags($text)));
    $text = preg_replace('/[^a-z0-9]+/', '-', str_replace(['\u{2019}', "'"], '', $text)) ?? '';
    return trim($text, '-');
};

// map slug => whether it has been consumed
$tocSlugs = array_column($toc, 'slug');
$usedSlugs = [];
$slugForTitle = static function (string $title) use ($toc, $tocSlugs, &$usedSlugs, $slugify): string {
    $candidate = $slugify($title);
    foreach ($toc as $entry) {
        if (in_array($entry['slug'], $usedSlugs, true)) {
            continue;
        }
        if ($entry['slug'] === $candidate) {
            $usedSlugs[] = $entry['slug'];
            return $entry['slug'];
        }
    }
    // fall back to the next unconsumed TOC entry in document order
    foreach ($tocSlugs as $slug) {
        if (!in_array($slug, $usedSlugs, true)) {
            $usedSlugs[] = $slug;
            return $slug;
        }
    }
    return '';
};

InternalLinks::beginPage(InternalLinks::MAX_PER_PAGE);

$articleBlocks = [];
$faqSeen = false;
foreach ($calc['article'] as $part) {
    $type = $part['type'] ?? 'regular';
    $title = trim((string) ($part['title'] ?? ''));
    // contextual links to neighbouring calculators; the budget is per page
    $html = View::rewriteArticleHtml((string) ($part['html'] ?? ''), (string) $calc['path']);

    if ($type === 'faq') {
        $faqSeen = true; // answers are rendered from $calc['faq'] below
        continue;
    }
    if ($title === '') {
        $articleBlocks[] = ['kind' => 'lead', 'id' => '', 'title' => '', 'html' => $html];
        continue;
    }
    $articleBlocks[] = [
        'kind' => 'section',
        'id' => $slugForTitle($title),
        'title' => $title,
        'html' => $html,
    ];
}

// The FAQ accordion keeps the "faq" anchor from the TOC.
$faqAnchor = '';
foreach ($toc as $entry) {
    if ($entry['slug'] === 'faq') {
        $faqAnchor = 'faq';
    }
}

/*
 * Not every article happens to mention another calculator by name, and a page
 * with no contextual link in its body is a page a search engine has to leave to
 * find its neighbours on its own. When the linker added nothing, append one
 * sentence that links the two closest calculators — the same ones the card grid
 * shows, but as prose, in the reader's path.
 */
if (InternalLinks::pageLinksAdded() < 2) {
    // Two is the floor: a page whose article happens to name only one other
    // calculator still gets a second, related one, because one contextual link
    // in a 1,300-word article is thin evidence of what the page is about.
    $already = InternalLinks::pageTargets();
    $pool = array_values(array_filter(
        Data::related($row['file'] ?? '', (string) $calc['cat'], 6),
        static fn ($p) => !in_array((string) $p['path'], $already, true)
    ));
    $need  = max(1, 2 - InternalLinks::pageLinksAdded());
    $picks = array_slice($pool, 0, $need);
    if ($picks !== []) {
        // A name written for a heading ends in "Calculator"; inside a sentence
        // that word is noise ("see the Cubic inches of a cylinder Calculator"),
        // so it is dropped here and a leading capital is lowered unless it is
        // an acronym.
        $sentenceName = static function (string $name): string {
            $name = trim((string) (preg_replace('~\s+calculators?$~i', '', trim($name)) ?? $name));
            if ($name === '') {
                return '';
            }
            $first = mb_substr($name, 0, 1);
            $rest  = mb_substr($name, 1);
            $head  = explode(' ', $name)[0];
            if ($first !== mb_strtolower($first) && $head === mb_strtoupper($head)) {
                return $name;              // "BMI", "USA" — keep the capitals
            }
            return mb_strtolower($first) . $rest;
        };
        $links = array_map(
            static fn ($p) => '<a class="inline-link" href="' . View::escape(View::url((string) $p['path'])) . '">'
                . View::escape($sentenceName((string) $p['name'])) . '</a>',
            $picks
        );
        $sentence = $links[0] . (count($links) > 1 ? ' and ' . $links[1] . ' cover' : ' covers')
            . ' the neighbouring steps if this answer is only part of what you need.';
        $articleBlocks[] = ['kind' => 'lead', 'id' => '', 'title' => '', 'html' => '<p>' . $sentence . '</p>'];
    }
}

/*
 * Build the visible table of contents from what is actually rendered, in the
 * source order. The reference TOC occasionally lists an entry whose section is
 * absent from the payload; emitting those would create dead anchors.
 */
$tocOut = [];
foreach ($articleBlocks as $block) {
    if ($block['kind'] === 'section' && $block['id'] !== '') {
        $tocOut[] = ['slug' => $block['id'], 'text' => $block['title']];
    }
}
if ($faqAnchor !== '' && !empty($calc['faq'])) {
    $tocOut[] = ['slug' => $faqAnchor, 'text' => 'FAQ'];
}

/* ------------------------------------------------------- likes and reviews */
$likeCount       = Engagement::likeCount((string) $calc['path']);
$likedByVisitor  = in_array((string) $calc['path'], Engagement::visitorLikes(), true);
$calcRating      = Engagement::rating((string) $calc['path']);
// one face per page: no two people in the byline share a portrait
$allPeople = array_merge(
    array_column($calc['authors'] ?? [], 'name'),
    array_column($calc['reviewers'] ?? [], 'name')
);
$avatars = Engagement::avatarsFor($allPeople, (string) $calc['path']);
$reviews         = Engagement::reviews((string) $calc['path']);


/* --------------------------------------------------------------- SEO */
$title = Seo::tuneTitle($calc['seoTitle'] ?: ($calc['name'] . ' Calculator'), (string) $calc['cat']);
$seo = (new Seo($title, (string) $calc['description']))->setShareCard((string) $calc['cat']);
$seo->canonical = SITE_URL . $calc['path'];
$seo->type = 'article';
if ($isPreview) {
    $seo->noindex = true;
}
$seo->publishedAt = $calc['createdAt'] ? date('c', (int) strtotime($calc['createdAt'])) : '';
$seo->updatedAt = $calc['updatedAt'] ? date('c', (int) strtotime($calc['updatedAt'])) : '';
$seo->breadcrumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => $calc['category']['name'], 'url' => '/' . $calc['cat']],
    ['name' => $calc['name'], 'url' => $calc['path']],
];
$seo->schema[] = $seo->appSchema($calc, SITE_URL . $calc['path'], $calcRating, $reviews);
if (!empty($calc['faq'])) {
    $seo->schema[] = $seo->faqSchema($calc['faq']);
}

/* -------------------------------------------------------- related + categories */
/*
 * Three different jobs, three different blocks:
 *   relatedCards  — same category, scored by shared name words, each with a
 *                   one-line reason ("Both cover interest")
 *   categoryPeers — a wider chip list from the same category, so every page
 *                   links deeper into the section it belongs to
 *   crossCategory — the sibling categories, so a reader can leave the silo
 */
/*
 * Related calculators. An editor can pin a list in the panel (calculator editor →
 * Related); those come first and in their own order. Anything missing is filled
 * from the automatic scorer, so the grid is never half empty.
 */
$relatedCards = [];
$pinned = is_array($calc['related'] ?? null) ? $calc['related'] : [];
foreach ($pinned as $pin) {
    $pinPath = (string) ($pin['path'] ?? '');
    $pinRow = $pinPath !== '' ? Data::row($pinPath) : null;
    if ($pinRow === null || ($pinRow['status'] ?? 'published') !== 'published') {
        continue;
    }
    $relatedCards[] = [
        'row' => $pinRow,
        'reason' => 'Picked by the editor',
        'shared' => [],
    ];
}
foreach (Data::relatedCards((string) $calc['path'], (string) $calc['cat'], 6) as $auto) {
    if (count($relatedCards) >= 6) {
        break;
    }
    $dupe = false;
    foreach ($relatedCards as $existing) {
        if ((string) $existing['row']['path'] === (string) $auto['row']['path']) {
            $dupe = true;
            break;
        }
    }
    if (!$dupe) {
        $relatedCards[] = $auto;
    }
}

$categoryPeers = [];
$takenPeers = array_merge([(string) $calc['path']], array_map(
    static fn ($c) => (string) $c['row']['path'],
    $relatedCards
));
foreach (Data::byCategory((string) $calc['cat']) as $peer) {
    if (in_array((string) $peer['path'], $takenPeers, true)) {
        continue;
    }
    $categoryPeers[] = $peer;
    if (count($categoryPeers) >= 14) {
        break;
    }
}

/*
 * The shelf under the reviews.
 *
 * Four file tools, the same four for every page in the category, never one this
 * page already links to. It is the last block on the page and the only one that
 * is not a calculator: a reader who came for one answer may well want a tool
 * that does something the calculators cannot.
 */
$otherTools = \Onim\OtherTools::pick($calc, array_merge(
    array_map(static fn ($c) => (string) $c['row']['path'], $relatedCards),
    array_map(static fn ($c) => (string) $c['path'], $categoryPeers)
));

$crossCategory = [];
foreach (Data::categories() as $cat) {
    if ($cat['slug'] === $calc['cat']) {
        continue;
    }
    $crossCategory[] = $cat;
}
usort($crossCategory, static fn ($a, $b) => ((int) $b['count']) <=> ((int) $a['count']));
$crossCategory = array_slice($crossCategory, 0, 6);

echo View::page('calculator', [
    /* A tool-backed page owns its own script; calc.js would only find an
       empty form and no payload. */
    'withCalculatorJs' => empty($calc['tool']['shortcode']),
    /* Body class: the layout uses it to stand the sitewide leaderboard down,
       so a calculator page does not stack two of them. */
    'bodyClass' => 'is-calculator',
    'seo' => $seo,
    'calc' => $calc,
    'row' => $row,
    'isPreview' => $isPreview,
    'groups' => $groups,
    'solver' => $solver,
    'widget' => $widget,
    'articleBlocks' => $articleBlocks,
    'faqAnchor' => $faqAnchor,
    'toc' => $tocOut,
    'unitChoice' => $unitChoice,
    'selectChoice' => $selectChoice,
    'support' => Data::support((string) $calc['path']),
    'related' => Data::related($row['file'] ?? '', $calc['cat'], 6),
    'relatedCards' => $relatedCards,
    'categoryPeers' => $categoryPeers,
    'crossCategory' => $crossCategory,
    'otherTools'   => $otherTools,
    /* engagement: real counters, real reviews */
    'likeCount' => $likeCount,
    'likedByVisitor' => $likedByVisitor,
    'calcRating' => $calcRating,
    'avatars' => $avatars,
    'reviews' => $reviews,
    'categories' => Data::categories(),
    'navCategories' => Data::categories(),
]);

<?php
/**
 * Calculator page: sticky widget column on the right, long-form reference
 * article on the left. Both are server-rendered; assets/js/calc.js takes over
 * the widget once loaded.
 *
 * @var \Onim\Seo $seo
 * @var array $calc
 * @var array $groups   prepared widget view model
 * @var \Onim\Solver $solver
 * @var \Onim\Widget $widget
 * @var string $articleHtml
 * @var array $toc
 * @var array $related
 */

declare(strict_types=1);

use Onim\Data;
use Onim\Engagement;
use Onim\Format;
use Onim\Icons;
use Onim\Modules;
use Onim\View;

if (!function_exists('initials')) {
    function initials(string $name): string
    {
        $parts = preg_split('/\s+/', trim($name)) ?: [];
        $out = '';
        foreach (array_slice($parts, 0, 2) as $p) {
            $out .= mb_strtoupper(mb_substr($p, 0, 1));
        }
        return $out !== '' ? $out : '?';
    }
}

$category = Data::category($calc['cat']);
$catName  = $category['name'] ?? $calc['category']['name'];

/*
 * A page whose widget is a tool file rather than a formula.
 *
 * Same page, same article, same related grid — but the box in the tool column
 * is printed by the shortcode in lib/Toolkit.php instead of by the form
 * builder. Everything the form would draw (fields, results panel, Calculate
 * button, the calc.js payload) is skipped, because the tool owns its own UI.
 */
$toolMode = !empty($calc['tool']['shortcode']);

/* client payload: everything calc.js needs to re-solve locally */
$fieldsMeta = [];
$unitExprs  = [];
$units      = Data::units();
foreach ($calc['groups'] as $g) {
    foreach ($g['matrices'] as $m) {
        foreach ($m['columns'] as $col) {
            foreach ($col as $f) {
                if (($f['type'] ?? '') !== 'variable' || empty($f['var'])) {
                    continue;
                }
                $key = !empty($f['unitSwitcher']) && $units->supported($f['unitSwitcher']) ? $f['unitSwitcher'] : null;
                $fieldsMeta[$f['var']] = ['unitKey' => $key];
                if ($key !== null) {
                    foreach ($units->options($key) as $slug => $u) {
                        $unitExprs[$key][$slug] = $u['expr'];
                    }
                }
            }
        }
    }
}
/*
 * The results panel.
 *
 * A solved value is not an input. It used to be drawn as one — the same box as
 * the fields you type into, in the same column — which meant every answer
 * appeared twice (once in the form, once in the panel) and the copy in the form
 * changed under you as you typed. Now each value is rendered exactly once:
 *
 *   * a field the solver filled in is a *result*: it is drawn inside the results
 *     panel, under the Calculate button, with its unit and its own copy button;
 *   * a field you supply is an *input*: it stays in the form.
 *
 * The panel is the only place results appear, so there is one number to read and
 * one number to copy. The result rows keep a live input, which is how solving
 * backwards still works — type a BMI in the panel and the weight becomes the
 * result instead.
 *
 * Rendered server-side with the numbers in it, so a crawler and a no-JS visitor
 * see them; `calc.js` hides the panel until Calculate is pressed, re-partitions
 * the fields after every solve, and never updates a visible result live.
 */
$computedFields = [];
/*
 * Does this calculator still have something to type into once its declared
 * outputs move to the results panel? A handful of converters are nothing but
 * equation subjects; emptying their form would leave a widget with no input
 * and a hidden panel, so for those the outputs stay in the form.
 */
$outputsStayInForm = true;
$typeableInputs = 0;
foreach ($groups as $g) {
    foreach ($g['matrices'] as $m) {
        foreach ($m['columns'] as $col) {
            foreach ($col as $f) {
                /* Date pickers and drop-downs are inputs too: a page of date
                   pickers counted zero typeable inputs, so every result was
                   pushed back into the form and the panel stayed empty. */
                if (!in_array($f['kind'] ?? '', ['number', 'date', 'datetime', 'time', 'select',
                                                'radio', 'checkbox', 'choice', 'textbox'], true)) {
                    continue;
                }
                if (empty($f['computed']) && empty($f['declaredOutput'])) {
                    $typeableInputs++;
                }
            }
        }
    }
}
/*
 * One box is not a calculator. A page whose harvest marked everything except a
 * single variable as output-only cannot answer anything: /math/torus-volume
 * showed one "inner radius" box and four results that no single number can
 * determine, and pressing Calculate could only say so. Keeping the other boxes
 * in the form lets the visitor supply the pair the formula actually needs (the
 * reference page works the same way — any two of its five values settle the
 * rest), so the rule here is "fewer than two inputs" rather than "no inputs".
 */
$hasScriptHook = strpos((string) ($calc['js'] ?? ''), 'onResult') !== false;
$outputsStayInForm = $typeableInputs === 0 || ($typeableInputs === 1 && !$hasScriptHook);

$inputFieldCount = 0;
$seenFields = [];
foreach ($groups as $g) {
    foreach ($g['matrices'] as $m) {
        foreach ($m['columns'] as $col) {
            foreach ($col as $f) {
                $name = (string) ($f['name'] ?? '');
                if ($name === '') {
                    continue;
                }
                /*
                 * Every control counts, not just number boxes. Counting numbers
                 * alone gave a page of date pickers — and a page of drop-downs —
                 * an input count of zero, so the results panel was never
                 * rendered: Calculate announced "Results updated" above nothing.
                 */
                if (in_array($f['kind'] ?? '', ['number', 'date', 'datetime', 'time', 'select',
                                                'radio', 'checkbox', 'choice', 'textbox'], true)) {
                    $inputFieldCount++;
                }
                /* Results from the first paint: solved values, and the
                   variables the equations name as their subject. Both belong in
                   the results panel; only real inputs belong in the form —
                   unless that would leave nothing to type into at all (a
                   converter whose every variable is an equation subject), in
                   which case they stay where they are. */
                /*
                 * A field the definition marks `oo` (output only) is a result
                 * with a box: a repair says so when a value the page works out
                 * has no other home. It belongs in the panel from the first
                 * paint, never in the form — an empty labelled box above the
                 * Calculate button that no one is meant to type into.
                 */
                /* A date the page works out (a due date, a hatch date) is a
                   result like any other: it belongs in the panel, not in the
                   form as a picker the visitor is invited to fill. */
                $isResultField = in_array($f['kind'] ?? '', ['number', 'date', 'datetime', 'time'], true)
                    && (!empty($f['computed'])
                        || !empty($f['outputOnly'])
                        || (!empty($f['declaredOutput']) && !$outputsStayInForm));
                if ($isResultField && !isset($seenFields[$name])) {
                    $seenFields[$name] = true;
                    $computedFields[] = $f;
                }
            }
        }
    }
}
$hasResultSpace = $inputFieldCount > 0;

/*
 * Some harvested definitions carry no usable fields at all — their groups hold
 * items of a kind the builder cannot turn into a control, so the page would
 * render an empty form, a Calculate button that can never do anything and an
 * empty results panel. Count what actually renders and, when the answer is
 * nothing, say so instead of shipping a dead button.
 */
$renderedFieldCount = 0;
foreach ($groups as $g) {
    foreach ($g['matrices'] as $m) {
        foreach ($m['columns'] as $col) {
            foreach ($col as $f) {
                /* Only fields that put a control on the page count. A harvested
                   definition can carry empty `text` items that render as
                   nothing, and those must not make a dead form look alive. */
                $kind = (string) ($f['kind'] ?? '');
                $controls = ['number', 'date', 'datetime', 'time',
                             'select', 'radio', 'checkbox', 'choice'];
                if (in_array($kind, $controls, true) && (string) ($f['name'] ?? '') !== '') {
                    $renderedFieldCount++;
                }
            }
        }
    }
}
$noControls = $renderedFieldCount === 0;
/*
 * Can this calculator answer at all?
 *
 * A handful of harvested definitions carry no equations — their working lived in
 * a page script that was never captured (36 of them say `needsJs` and arrived
 * with an empty script; another 48 have nothing of either kind). Those pages can
 * hold fields but never produce an answer, so they are not given a Calculate
 * button: pressing it would report "not enough values" whatever the visitor
 * typed. They get a straight note instead, pointing at the worked method in the
 * article.
 */
$residentScript = (string) ($calc['js'] ?? '');
$residentScript = trim(str_replace(
    ['"use strict";', "'use strict';", '//# sourceURL=customJs.js'],
    '',
    $residentScript
));
/*
 * A script can only put an answer on the page through a result hook
 * (omni.onResult). A script that merely defines helpers — a dosage table
 * lookup, a rounding routine — is not wired to anything: no equation calls it
 * and nothing calls the page back, so the box would stay blank however the
 * visitor filled the form. Those pages are treated as having nothing to
 * calculate, the same as a page with no script at all.
 */
/*
 * ...or a page whose answer is a sentence.
 *
 * A quarter of the calculators answer in words rather than in a number: a bed
 * size, a dress size, a "your BMI is normal". Their working is a list of
 * text fragments, each shown when its own condition holds, and the client
 * re-evaluates those fragments after every press — so a page with a conditional
 * sentence in it can answer perfectly well without a single equation.
 */
$conditionalText = false;
foreach ($widget->texts as $line) {
    foreach ($line as $chunk) {
        foreach ($chunk as $variant) {
            $condition = trim((string) ($variant['condition'] ?? ''));
            if ($condition !== '' && $condition !== 'false'
                && trim((string) ($variant['html'] ?? '')) !== '') {
                $conditionalText = true;
                break 3;
            }
        }
    }
}
$solvable = ($calc['equations'] ?? []) !== []
    || str_contains($residentScript, 'onResult(')
    || $conditionalText;
/* every numeric field is a result candidate: which ones are results depends on
   what the visitor supplies, so the panel exists as soon as there is one */
$resultRows = $computedFields;

$clientPayload = [
    'vars' => $calc['variables'],
    'texts' => $widget->texts,
    'eq' => array_map(static fn ($e) => $e['variants'], $calc['equations']),
    'fields' => $fieldsMeta,
    'units' => $unitExprs,
    'datasets' => $calc['datasets'],
    'showIf' => $calc['showIf'] ?? [],
    'js' => $calc['js'] ?? null,
    'precision' => null,
];
?>
<div class="calc-shell">
    <?= View::breadcrumbs([
        ['name' => 'Home', 'url' => '/'],
        ['name' => $catName, 'url' => '/' . $calc['cat']],
        ['name' => $calc['name'], 'url' => $calc['path']],
    ]) ?>

    <?php if (!empty($isPreview)): ?>
        <p class="preview-banner" role="status">
            <strong>Preview.</strong> This calculator is not published — only people with this signed
            link can see it, and search engines are told to ignore it.
        </p>
    <?php endif; ?>

    <?php /* The page is one grid: the write-up on the left, the tool on the
             right. Two empty 160px rails used to bracket this page and turned
             the middle into a 640px corridor; the space they held is now the
             tool column, which carries a real slot at its foot.

             The article comes first in the markup because that is the order a
             phone reads it in — but on a desktop the tool is what a visitor
             came for, so the grid puts it in the right-hand column and the CSS
             pins that column to the bottom of the viewport as you scroll. */ ?>
    <?= \Onim\Ads::slot('calc_top', 'ad-slot--page-top') ?>

    <?php /* The page's one heading, ahead of everything it describes. The card
             repeats the same words as plain text so the tool still carries its
             own name, but the outline of the document starts here rather than
             after twenty section headings. */ ?>
    <h1 class="sr-only"><?= View::escape($calc['title'] ?: $calc['name']) ?></h1>

    <?php
    /* The right-hand rail exists only when it has something to show. An empty
       third column is 200px of white on every calculator page, and the article
       needs that width more than the layout needs the symmetry — so the column
       appears with a filled rail slot and folds away without one. */
    $railAd = \Onim\Ads::slot('calc_rail');
    $hasRail = trim($railAd) !== '';
    ?>
    <div class="calc-layout<?= $hasRail ? ' calc-layout--rail' : '' ?>">
        <article class="calc-article">
            <header class="article-head">
                <?php if ($calc['updatedAt']): ?>
                    <p class="article-updated">Last updated: <time datetime="<?= View::escape(Format::isoDate($calc['updatedAt'])) ?>"><?= View::escape(Format::date($calc['updatedAt'])) ?></time></p>
                <?php endif; ?>


                <?php if (!empty($calc['authors']) || !empty($calc['reviewers'])): ?>
                    <div class="credits-row">
                        <?php if (!empty($calc['authors'])): ?>
                            <div class="credits-group">
                                <span class="credits-label">Creators</span>
                                <div class="credit-people">
                                    <?php foreach ($calc['authors'] as $person): ?>
                                        <span class="credit-person">
                                            <img class="credit-avatar" src="<?= View::escape($avatars[$person['name']] ?? Engagement::avatarFor((string) $person['name'])) ?>"
                                                 alt="" width="34" height="34" loading="lazy" decoding="async">
                                            <span class="credit-name"><?= View::escape($person['name']) ?></span>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($calc['reviewers'])): ?>
                            <div class="credits-group">
                                <span class="credits-label">Reviewers</span>
                                <div class="credit-people">
                                    <?php foreach ($calc['reviewers'] as $i => $person): ?>
                                        <span class="credit-person credit-person--reviewer">
                                            <img class="credit-avatar credit-avatar--sm" src="<?= View::escape($avatars[$person['name']] ?? Engagement::avatarFor((string) $person['name'])) ?>"
                                                 alt="" width="28" height="28" loading="lazy" decoding="async">
                                            <span class="credit-name"><?= View::escape($person['name']) ?></span>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="article-stats">
                    <button type="button" class="like-btn<?= $likedByVisitor ? ' is-liked' : '' ?>"
                            data-like="<?= View::escape($calc['path']) ?>"
                            aria-pressed="<?= $likedByVisitor ? 'true' : 'false' ?>">
                        <span class="like-btn-icon" aria-hidden="true"><?= View::icon('thumb', 18) ?></span>
                        <span class="like-btn-count" data-like-count><?= View::escape(Format::count($likeCount)) ?></span>
                        <span class="like-btn-label" data-like-label><?= $likeCount === 1 ? 'person finds this helpful' : 'people find this helpful' ?></span>
                    </button>
                    <button type="button" class="rating-btn" data-jump="reviews" aria-label="Read reviews">
                        <span class="rating-stars" aria-hidden="true"><?= str_repeat('★', (int) round($calcRating[0])) . str_repeat('☆', 5 - (int) round($calcRating[0])) ?></span>
                        <span><strong data-rating-avg><?= $calcRating[1] > 0 ? View::escape(number_format($calcRating[0], 1)) : 'No rating yet' ?></strong>
                        <?php if ($calcRating[1] > 0): ?><span data-rating-count>(<?= (int) $calcRating[1] ?>)</span><?php endif; ?></span>
                    </button>
                </div>

                <div class="article-actions">
                    <button type="button" class="btn btn-soft" data-share="copy">
                        <?= View::icon('link', 18) ?><span>Copy link</span>
                    </button>
                    <button type="button" class="btn btn-soft" data-print>
                        <?= View::icon('embed', 18) ?><span>Print</span>
                    </button>
                    <button type="button" class="btn btn-soft btn-preferred" data-preferred
                            data-calc="<?= View::escape($calc['title'] ?: $calc['name']) ?>"
                            data-url="<?= View::escape(SITE_URL . $calc['path']) ?>"
                            aria-pressed="false">
                        <?= View::icon('google', 18) ?><span data-preferred-label>Add as preferred on Google</span>
                    </button>
                </div>
            </header>

            <?php if ($toc !== []): ?>
                <nav class="toc" aria-labelledby="toc-heading">
                    <?php /* A heading here would be an h2 above the h1 — the page's
                               outline would start in the middle of the article. The
                               label stays for screen readers, as plain text. */ ?>
                    <p id="toc-heading" class="toc-title">Table of contents</p>
                    <ol class="toc-list">
                        <?php foreach ($toc as $entry): ?>
                            <li><a href="#<?= View::escape($entry['slug']) ?>"><?= View::escape($entry['text']) ?></a></li>
                        <?php endforeach; ?>
                    </ol>
                </nav>
            <?php endif; ?>

            <?php foreach (Modules::partials((string) $calc['path'], 'article_head') as $module): ?>
                <?php require $module['file']; ?>
            <?php endforeach; ?>

            <div class="article-body">
                <?php
                /* The in-article slot is inserted into the rendered body rather
                   than between two block elements: the body arrives as a run of
                   sections and the only honest position is "after the second
                   section", which is a fact about the rendered headings. */
                $articleHtml = '';
                foreach ($articleBlocks as $block) {
                    if ($block['kind'] === 'section') {
                        $articleHtml .= '<h2' . ($block['id'] !== '' ? ' id="' . View::escape($block['id']) . '"' : '') . '>'
                            . View::escape($block['title']) . '</h2>';
                    }
                    $articleHtml .= View::rewriteRootUrls($block['html']);
                }
                echo \Onim\Ads::inject($articleHtml, 'calc_inline', 2);
                ?>
            </div>

            <?php foreach (Modules::partials((string) $calc['path'], 'article_foot') as $module): ?>
                <?php require $module['file']; ?>
            <?php endforeach; ?>

            <?php if (!empty($calc['faq'])): ?>
                <section class="faq"<?= $faqAnchor !== '' ? ' id="' . View::escape($faqAnchor) . '"' : '' ?> aria-labelledby="faq-heading">
                    <h2 id="faq-heading" class="<?= $faqAnchor !== '' ? 'anchor-target' : '' ?>">Frequently asked questions</h2>
                    <?php foreach ($calc['faq'] as $i => $item): ?>
                        <details class="faq-item"<?= $i === 0 ? ' open' : '' ?>>
                            <summary class="faq-question">
                                <span><?= View::escape($item['q']) ?></span>
                                <span class="faq-marker" aria-hidden="true"><?= View::icon('chevron', 18) ?></span>
                            </summary>
                            <div class="faq-answer"><?= View::rewriteArticleHtml($item['a']) ?></div>
                        </details>
                    <?php endforeach; ?>
                </section>
            <?php endif; ?>

            <?php if (!empty($relatedCards)): ?>
                <section class="related" aria-labelledby="related-heading">
                    <h2 id="related-heading">Related calculators</h2>
                    <p class="section-lede">Pages that solve the neighbouring step of the same problem, picked by what they have in common with this one.</p>
                    <ul class="card-grid">
                        <?php foreach ($relatedCards as $card): ?>
                            <?php $row = $card['row']; ?>
                            <li class="card-grid-item">
                                <a class="calc-card" href="<?= View::escape(View::url($row['path'])) ?>">
                                    <span class="calc-card-icon" aria-hidden="true"><?= Icons::forCalculator(['path' => $row['path'], 'name' => $row['name'], 'cat' => $row['cat'] ?? $calc['cat']], 26, 'calc-glyph') ?></span>
                                    <span class="calc-card-body">
                                        <span class="calc-card-name"><?= View::escape($row['name']) ?></span>
                                        <span class="calc-card-desc"><?= View::escape(View::excerpt((string) $row['description'], 88)) ?></span>
                                        <span class="calc-card-reason"><?= View::escape($card['reason']) ?></span>
                                    </span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            <?php endif; ?>

            <?php if (!empty($categoryPeers)): ?>
                <section class="related related--category" aria-labelledby="category-peers-heading">
                    <h2 id="category-peers-heading">More <?= View::escape($catName) ?> calculators</h2>
                    <p class="section-lede">
                        Browse the full <a href="<?= View::escape(View::url('/' . $calc['cat'])) ?>"><?= View::escape($catName) ?></a>
                        collection — <span data-live-count="<?= View::escape((string) $calc['cat']) ?>"><?= View::escape(Format::count(Data::countByCategory($calc['cat']))) ?></span> calculators in this category.
                    </p>
                    <ul class="chip-list">
                        <?php foreach ($categoryPeers as $row): ?>
                            <li>
                                <a class="chip" href="<?= View::escape(View::url($row['path'])) ?>"><?= View::escape($row['name']) ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            <?php endif; ?>

            <?php if (!empty($crossCategory)): ?>
                <section class="related related--cats" aria-labelledby="cross-cat-heading">
                    <h2 id="cross-cat-heading">Explore other categories</h2>
                    <ul class="cat-tile-grid">
                        <?php foreach ($crossCategory as $cat): ?>
                            <li>
                                <a class="cat-tile" href="<?= View::escape(View::url('/' . $cat['slug'])) ?>">
                                    <span class="cat-tile-name"><?= View::escape($cat['name']) ?></span>
                                    <span class="cat-tile-count"><?= View::escape(Format::count((int) $cat['count'])) ?> calculators</span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            <?php endif; ?>

            <?= \Onim\Ads::slot('calc_reviews_top', 'ad-slot--in-article') ?>

            <section class="reviews" id="reviews" aria-labelledby="reviews-heading">
                <h2 id="reviews-heading">Reader reviews</h2>
                <p class="section-lede">
                    <strong data-rating-avg-inline><?= $calcRating[1] > 0 ? View::escape(number_format($calcRating[0], 1)) . ' out of 5' : 'Not rated yet' ?></strong>
                    from <span data-rating-total><?= (int) $calcRating[1] ?></span> <?= $calcRating[1] === 1 ? 'review' : 'reviews' ?>.
                    Reviews are published as written — they are not edited and not filtered by rating.
                </p>

                <ul class="review-list" data-review-list>
                    <?php foreach ($reviews as $r): ?>
                        <li class="review" data-review-id="<?= View::escape($r['id']) ?>">
                            <div class="review-head">
                                <span class="review-avatar" aria-hidden="true"><?= View::escape(Engagement::initials((string) $r['name'])) ?></span>
                                <span class="review-meta">
                                    <span class="review-name"><?= View::escape($r['name']) ?></span>
                                    <span class="review-sub">
                                        <span class="review-stars" aria-label="<?= (int) $r['rating'] ?> out of 5"><?= str_repeat('★', (int) $r['rating']) . str_repeat('☆', 5 - (int) $r['rating']) ?></span>
                                        <time datetime="<?= date('c', (int) $r['ts']) ?>"><?= View::escape(Format::ago((int) $r['ts'])) ?></time>
                                    </span>
                                </span>
                            </div>
                            <?php if (!empty($r['title'])): ?>
                                <h3 class="review-title"><?= View::escape($r['title']) ?></h3>
                            <?php endif; ?>
                            <p class="review-body"><?= nl2br(View::escape($r['body'])) ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <p class="review-empty" data-review-empty<?= $reviews !== [] ? ' hidden' : '' ?>>
                    No reviews yet. If this calculator helped, say why — that is what the next reader reads first.
                </p>

                <form class="review-form" data-review-form method="post" action="<?= View::escape(View::url('/api/review')) ?>" novalidate>
                    <h3 class="review-form-title">Write a review</h3>
                    <input type="hidden" name="path" value="<?= View::escape($calc['path']) ?>">

                    <div class="review-form-row">
                        <label class="field-label" for="review-name">Your name</label>
                        <input class="field-input" id="review-name" name="name" type="text" maxlength="<?= Engagement::MAX_NAME ?>"
                               autocomplete="name" required placeholder="e.g. Anna K.">
                    </div>

                    <div class="review-form-row">
                        <span class="field-label" id="rating-label">Your rating</span>
                        <div class="star-input" role="radiogroup" aria-labelledby="rating-label" data-star-input>
                            <?php for ($star = 5; $star >= 1; $star--): ?>
                                <input type="radio" id="star-<?= $star ?>" name="rating" value="<?= $star ?>" <?= $star === 5 ? 'checked' : '' ?>>
                                <label for="star-<?= $star ?>" title="<?= $star ?> star<?= $star === 1 ? '' : 's' ?>">★</label>
                            <?php endfor; ?>
                        </div>
                    </div>

                    <div class="review-form-row">
                        <label class="field-label" for="review-title">Headline <span class="field-optional">(optional)</span></label>
                        <input class="field-input" id="review-title" name="title" type="text" maxlength="<?= Engagement::MAX_TITLE ?>"
                               placeholder="e.g. Saved me an afternoon">
                    </div>

                    <div class="review-form-row">
                        <label class="field-label" for="review-body">Your review</label>
                        <textarea class="field-input field-textarea" id="review-body" name="body" rows="5"
                                  maxlength="<?= Engagement::MAX_BODY ?>" required
                                  placeholder="What did you use it for, and did the answer make sense?"></textarea>
                        <span class="field-hint">At least <?= Engagement::MIN_BODY ?> characters. Links are not allowed.</span>
                    </div>

                    <div class="review-form-actions">
                        <button type="submit" class="btn btn-primary">Publish review</button>
                        <p class="review-form-status" data-review-status role="status" aria-live="polite"></p>
                    </div>
                </form>
            </section>

            <?= \Onim\Ads::slot('calc_reviews_bottom', 'ad-slot--in-article') ?>

            <?php if (!empty($otherTools)): ?>
                <section class="related related--tools" aria-labelledby="other-tools-heading">
                    <h2 id="other-tools-heading">Other tools you can try</h2>
                    <p class="section-lede">
                        These run in the browser on your own files and show their settings, the way every
                        calculator here shows its working. Nothing you open in them is uploaded.
                        <a href="<?= View::escape(View::url('/all-tools')) ?>">Browse all tools</a>.
                    </p>
                    <ul class="card-grid card-grid--tools">
                        <?php foreach ($otherTools as $tool): ?>
                            <li class="card-grid-item">
                                <a class="calc-card calc-card--tool" href="<?= View::escape(View::url($tool['path'])) ?>">
                                    <span class="calc-card-icon" aria-hidden="true"><?= $tool['svg'] ?></span>
                                    <span class="calc-card-body">
                                        <span class="calc-card-name"><?= View::escape($tool['name']) ?></span>
                                        <span class="calc-card-desc"><?= View::escape(View::excerpt((string) $tool['description'], 96)) ?></span>
                                        <span class="calc-card-reason"><?= View::escape($tool['groupName']) ?></span>
                                    </span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            <?php endif; ?>

            <section class="cite" aria-labelledby="cite-heading">
                <h2 id="cite-heading">Cite this calculator</h2>
                <p>If you use this calculator in academic work, cite the page and the date you accessed it:</p>
                <pre class="cite-box" id="cite-text"><?= View::escape(($calc['title'] ?: $calc['name']) . '. ' . SITE_NAME . '. Retrieved ' . date('F j, Y') . ', from ' . SITE_URL . $calc['path']) ?></pre>
            </section>
        </article>

        <?php /* The tool column. Second in the markup, first in the right-hand
                 column on a desktop; on a phone the CSS lifts it above the
                 write-up, because someone who lands on a calculator came for
                 the calculator. */ ?>
        <div class="calc-widget-column">
            <?php /* The name sits above the tool, not across the other column.
                     It is the page's answer ("12 Volt Wire Size Calculator") and
                     the form under it is the thing that does the answering — put
                     them together and the eye has one place to start. */ ?>
            <header class="calc-page-head">
                <div class="article-head-row">
                    <?= Icons::forCalculator(['path' => $calc['path'], 'name' => $calc['name'], 'cat' => $calc['cat'], 'icon' => $calc['icon'] ?? ''], 34, 'calc-glyph calc-glyph-lg') ?>
                    <?php /* Not a heading: the page's h1 sits at the top of the
                               main column, so the same words here would be a
                               second one. */ ?>
                    <p class="article-title"><?= View::escape($calc['title'] ?: $calc['name']) ?></p>
                </div>
            </header>

            <div class="calc-widget" data-calculator="<?= View::escape($calc['file']) ?>">
                <?php if ($toolMode): ?>
                    <?php /* The tool's own markup, its own styles and its own script,
                             scoped to the uid the toolkit hands it. A tool that
                             throws is caught there and leaves a short note in this
                             box — it cannot take the page down with it. */ ?>
                    <div class="calc-tool-frame" data-tool="<?= View::escape((string) $calc['tool']['shortcode']) ?>">
                        <?= \Onim\Toolkit::render((string) $calc['tool']['shortcode'], ['calc' => $calc]) ?>
                    </div>
                <?php endif; ?>

                <?php if ($groups === [] && !$toolMode): ?>
                    <p class="calc-empty">This calculator has no interactive fields.</p>
                <?php endif; ?>

                <?php /* Script-driven pages now run their ported page script in the browser,
                    so no "not calculated here" notice is needed. If a script throws at
                    runtime the client engine shows a short fallback note instead. */ ?>

                <?php /* Module slot: extra UI above the form. Partials are ordinary PHP
                    included right here, so they see $calc, $groups, $solver and the
                    rest of this template's scope. See lib/Modules.php. */ ?>
                <?php foreach (Modules::partials((string) $calc['path'], 'widget_top') as $module): ?>
                    <?php require $module['file']; ?>
                <?php endforeach; ?>

                <?php /* The results are computed on load but held back behind this
                    notice until the visitor presses Calculate. Without JavaScript the
                    attribute is never set, nothing is hidden and the page behaves
                    exactly as before. */ ?>
                <?php if ($noControls && !$toolMode): ?>
                    <div class="calc-empty-widget" role="note">
                        <p class="calc-empty-title">This calculator is written up, not wired up.</p>
                        <p>
                            The method, the formula and a worked example are below in full — the
                            interactive form for this one has not been built yet, so there is
                            nothing here to type into.
                        </p>
                    </div>
                <?php elseif (!$solvable && !$toolMode): ?>
                    <div class="calc-empty-widget" role="note">
                        <p class="calc-empty-title">Nothing to calculate here.</p>
                        <p>
                            The answer for this one is set out in the article below — the values,
                            the table they sit in and the method behind them. No formula was
                            captured for this page, so there is no form to fill in and nothing to
                            press.
                        </p>
                    </div>
                <?php endif; ?>

                <?php if ($solvable && !$noControls): ?>
                <p class="calc-pending" data-calc-pending>
                    <span class="calc-pending-icon" aria-hidden="true"><?= View::icon('chevron', 18) ?></span>
                    <span data-calc-pending-text>Fill in the values, then press <strong>Calculate</strong> — your results appear below.</span>
                </p>
                <?php endif; ?>

                <?php /* A page with no formula gets the note and the article, not a
                    wall of boxes nobody can fill: those fields are the blank,
                    meaningless placeholders the brief asks to be rid of. */ ?>
                <?php $renderedTextIndexes = []; ?>
                <?php foreach (($noControls || !$solvable) ? [] : $groups as $i => $group): ?>
                    <?php
                    $hasInput = false;
                    $hasContent = false;
                    foreach ($group['matrices'] as $mm) {
                        foreach ($mm['columns'] as $cc) {
                            foreach ($cc as $ff) {
                                $kind = $ff['kind'] ?? '';
                                if ($kind === 'text' && trim((string) ($ff['html'] ?? '')) === '') {
                                    continue;      // an empty sentence is not content
                                }
                                /*
                                 * A sentence is content. Treating it as invisible
                                 * dropped every group that held nothing else — a
                                 * page whose answer is one line of prose had its
                                 * only line removed at load, and the answer then
                                 * had no node to appear in.
                                 */
                                $hasContent = true;
                                /*
                                 * Anything the visitor can change counts as an input here. This
                                 * list used to be just numbers and selects, so a form made
                                 * entirely of date pickers — or of a row of radios — was
                                 * classed as "empty" and hidden behind the results gate: the
                                 * page showed a Calculate button and nothing to press it for.
                                 */
                                if (in_array($kind, ['number', 'select', 'date', 'datetime', 'time',
                                                     'radio', 'checkbox', 'choice', 'textbox'], true)) {
                                    $hasInput = true;
                                }
                            }
                        }
                    }
                    /* A group with nothing in it is a stray rule and a blank gap
                       between the form and the button; it is not rendered. */
                    if (!$hasContent) {
                        continue;
                    }
                    /* Every sentence this group prints, so the answers container
                       below knows which lines have a node already. */
                    foreach ($group['matrices'] as $mm) {
                        foreach ($mm['columns'] as $cc) {
                            foreach ($cc as $ff) {
                                if (($ff['kind'] ?? '') === 'text' && isset($ff['index'])) {
                                    $renderedTextIndexes[(int) $ff['index']] = true;
                                }
                            }
                        }
                    }
                    ?>
                    <?php /* Between the second and third section: the reader has
                        filled something in, the answer is not yet on screen, and
                        the ad sits where the eye already is — inside the tool, not
                        in a rail nobody looks at. */ ?>
                    <?php if ($i === 2): ?>
                        <?= \Onim\Ads::slot('calc_mid', 'ad-slot--in-widget') ?>
                    <?php endif; ?>
                    <section class="calc-group<?= $hasInput ? '' : ' is-empty' ?>" data-group>
                        <?php /* An untitled group gets no header. It used to render a
                            bare chevron over nothing, which reads as a blank label
                            sitting above the fields — one of the rows the brief calls
                            out. The fields below speak for themselves. */ ?>
                        <?php if ($group['title'] !== ''): ?>
                        <h2 class="calc-group-head">
                            <button type="button" class="calc-group-toggle" aria-expanded="true"
                                    aria-controls="calc-group-<?= (int) $i ?>" data-group-toggle
                                    <?= $group['title'] === '' ? 'aria-label="Calculator inputs"' : '' ?>
                                    <?= $hasInput ? '' : 'data-static' ?>>
                                <span class="calc-chevron" aria-hidden="true"><?= View::icon('chevron', 20) ?></span>
                                <?php if ($group['title'] !== ''): ?>
                                    <span class="calc-group-title"><?= View::escape($group['title']) ?></span>
                                <?php endif; ?>
                            </button>
                        </h2>
                        <?php endif; ?>

                        <div class="calc-group-body" id="calc-group-<?= (int) $i ?>">
                            <?php if (!empty($group['description'])): ?>
                                <p class="calc-group-desc"><?= View::escape($group['description']) ?></p>
                            <?php endif; ?>

                            <?php foreach ($group['matrices'] as $matrix):
                                /*
                                 * A harvested matrix declares its columns, but the columns
                                 * are not what the page shows: a computed field is moved
                                 * out of the form and into the results panel, so a group
                                 * whose second column held only results rendered as a
                                 * column of inputs beside half a card of white (agarose
                                 * gel: 400px of fields, 400px of nothing).
                                 *
                                 * Each column is buffered and an empty one is dropped;
                                 * what is left decides the grid. Two columns stay two,
                                 * one column flows into as many 200px tracks as fit.
                                 *
                                 * (The wrapper div was also opened and never closed,
                                 * which the browser silently repaired by nesting every
                                 * later matrix inside the first.)
                                 */
                                $colHtml = [];
                                foreach ($matrix['columns'] as $column) {
                                    ob_start();
                                    ?>
                                        <div class="calc-col">
                                            <?php foreach ($column as $field): ?>
                                                <?php if (($field['kind'] ?? '') === 'number'): ?>
                                                    <?php
                                                    /*
                                                     * A numeric field can be an input or a
                                                     * result, and which one changes as the
                                                     * visitor types. The placeholder below is
                                                     * where it lives while it is an input;
                                                     * while it is a result the same node is
                                                     * moved into the results panel, and this
                                                     * stays empty. One node either way, so no
                                                     * value is ever on the page twice.
                                                     */
                                                    ?>
                                                    <div class="calc-field-home" data-home="<?= View::escape((string) $field['name']) ?>">
                                                        <?php
                                                        /*
                                                         * An unlabelled box that the page works out is a
                                                         * result with no name, so it is not printed in the
                                                         * form — an empty box with no label above the
                                                         * Calculate button is the meaningless row the brief
                                                         * asks to be rid of. It still reaches the results
                                                         * panel; the panel is where a nameless value can sit
                                                         * without looking like something to fill in.
                                                         */
                                                        $namelessResult = trim((string) ($field['label'] ?? '')) === ''
                                                            && !empty($field['declaredOutput'])
                                                            && $typeableInputs > 0;
                                                        ?>
                                                        <?php if (!$namelessResult && empty($field['computed'])
                                                            && empty($field['outputOnly'])
                                                            && (empty($field['declaredOutput']) || $outputsStayInForm)): ?>
                                                            <?php
                                                            /* In the fallback case the field really is an
                                                               input, so it must not be marked as a result
                                                               — calc.js would move it back out again. */
                                                            $formField = $field;
                                                            if ($outputsStayInForm) {
                                                                $formField['declaredOutput'] = false;
                                                            }
                                                            ?>
                                                            <?= View::render('partials/calc-field', ['field' => $formField]) ?>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php else: ?>
                                                    <?= View::render('partials/calc-field', ['field' => $field]) ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php
                                    $buffer = (string) ob_get_clean();
                                    if (preg_match('~class="(?:calc-field|calc-note|calc-formula|calc-figure)(?=[ "])~', $buffer) === 1) {
                                        $colHtml[] = $buffer;
                                    }
                                }
                                $cols = count($colHtml);
                                if ($cols === 0) {
                                    continue;
                                }
                                ?>
                                <div class="calc-matrix<?= $cols === 1 ? ' calc-matrix--flow' : '' ?>" style="--cols:<?= (int) $cols ?>">
                                    <?= implode('', $colHtml) ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>

                <?php /* A sentence that answers the question can live in a group
                         of its own, with no field beside it. If that group is
                         dropped — "nothing to show", which is right when every
                         fragment's condition is false at load and the line is
                         empty — the answer would have nowhere to appear:
                         Calculate would say "Results updated" over an empty
                         panel. Keep an anchor for every text line the page did
                         not print, and let the client fill it. */ ?>
                <?php if (!$noControls && $solvable): ?>
                    <div class="calc-answers" data-calc-answers>
                        <?php foreach ($widget->texts as $i => $line): ?>
                            <?php if (isset($renderedTextIndexes[$i])) { continue; } ?>
                            <div class="calc-formula" data-formula-index="<?= (int) $i ?>"></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ($groups !== [] && !$noControls && $solvable): ?>
                    <div class="calc-actions" data-calc-actions>
                        <button type="button" class="calc-go" data-calc-go>
                            <span class="calc-go-label" data-calc-go-label>Calculate</span>
                        </button>
                        <p class="calc-hint" data-calc-hint>
                            <span class="calc-hint-icon" aria-hidden="true">ⓘ</span>
                            <span data-calc-hint-text>Enter your values, then press Calculate to see the results.</span>
                        </p>
                        <p class="calc-announce" role="status" aria-live="polite" data-calc-status></p>
                    </div>
                <?php endif; ?>

                <?php if ($hasResultSpace && !$noControls && $solvable): ?>
                    <section class="calc-results<?= $resultRows === [] ? ' is-empty' : '' ?>" data-calc-results aria-labelledby="calc-results-title">
                        <header class="calc-results-head">
                            <h2 class="calc-results-title" id="calc-results-title">
                                <span class="calc-results-icon" aria-hidden="true"><?= View::icon('equals', 18) ?></span>
                                Results
                            </h2>
                            <button type="button" class="calc-copy-all" data-copy-all>
                                <?= View::icon('copy', 15) ?><span data-copy-all-label>Copy all</span>
                            </button>
                        </header>

                        <?php /* One row per solved value. Each row carries the field
                                 itself, so the value stays editable (solve backwards by
                                 typing a result) and the whole row is one target: the
                                 number, its unit chip, and a copy button. */ ?>
                        <ul class="calc-results-list" data-results-list>
                            <?php foreach ($resultRows as $r): ?>
                                <li class="calc-result" data-result-row="<?= View::escape((string) $r['name']) ?>">
                                    <div class="calc-result-field" data-result-slot="<?= View::escape((string) $r['name']) ?>">
                                        <?= View::render('partials/calc-field', ['field' => $r, 'inResult' => true]) ?>
                                    </div>
                                    <button type="button" class="calc-copy" data-copy="<?= View::escape((string) $r['name']) ?>"
                                            aria-label="Copy <?= View::escape((string) ($r['label'] !== '' ? $r['label'] : $r['name'])) ?>"
                                            title="Copy <?= View::escape((string) ($r['label'] !== '' ? $r['label'] : $r['name'])) ?>">
                                        <?= View::icon('copy', 16) ?>
                                        <span class="calc-copy-note" aria-hidden="true">Copy</span>
                                    </button>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <p class="calc-results-pending" data-results-empty>Press <strong>Calculate</strong> and the results appear here.</p>
                        <p class="sr-only" role="status" aria-live="polite" data-copy-status></p>
                    </section>
                <?php endif; ?>

                <?php if ((!$noControls && $solvable) || $toolMode): ?>
                    <?php
                    /* Share, directly under the Calculate button and the results.
                       Two things to share, because they are different documents:
                       the calculator (a URL, which is what "share this tool"
                       means) and the result (the numbers on screen right now,
                       which is what "look what I got" means). The second is
                       built in the browser from what was actually calculated —
                       see app.js — so it can never share a number the page did
                       not print. */
                    $shareUrl = SITE_URL . $calc['path'];
                    $shareText = trim((string) ($calc['title'] ?: $calc['name'])) . ' — ' . SITE_NAME;
                    $nets = [
                        'whatsapp' => ['WhatsApp', 'https://wa.me/?text={text}%0A{url}', 'whatsapp'],
                        'facebook' => ['Facebook', 'https://www.facebook.com/sharer/sharer.php?u={url}', 'facebook'],
                        'x'        => ['X', 'https://twitter.com/intent/tweet?text={text}&url={url}', 'x'],
                        'linkedin' => ['LinkedIn', 'https://www.linkedin.com/sharing/share-offsite/?url={url}', 'linkedin'],
                        'reddit'   => ['Reddit', 'https://www.reddit.com/submit?url={url}&title={text}', 'reddit'],
                        'email'    => ['Email', 'mailto:?subject={text}&body={url}', 'mail'],
                    ];
                    ?>
                    <section class="calc-share" data-calc-share
                             data-share-url="<?= View::escape($shareUrl) ?>"
                             data-share-text="<?= View::escape($shareText) ?>"
                             aria-labelledby="calc-share-title">
                        <h2 class="sr-only" id="calc-share-title">Share this calculator</h2>
                        <div class="calc-share-row">
                            <?php /* A tool page has no result to share: the answer
                                     lives in the tool's own markup, not in a results
                                     panel, so offering "Result" would be a promise
                                     the page cannot keep. */ ?>
                            <?php if (!$toolMode): ?>
                            <div class="calc-share-scope" role="group" aria-label="What to share">
                                <label class="calc-share-radio">
                                    <input type="radio" name="share-scope" value="calc" checked>
                                    <span>Calculator</span>
                                </label>
                                <label class="calc-share-radio">
                                    <input type="radio" name="share-scope" value="result">
                                    <span>Result</span>
                                </label>
                            </div>
                            <?php endif; ?>
                            <ul class="calc-share-networks">
                                <?php foreach ($nets as $key => [$label, $tpl, $icon]): ?>
                                    <li>
                                        <a class="share-net share-net--<?= $key ?>" data-share-net="<?= $key ?>"
                                           data-href-template="<?= View::escape($tpl) ?>"
                                           href="<?= View::escape(str_replace(['{text}', '{url}'], [rawurlencode($shareText), rawurlencode($shareUrl)], $tpl)) ?>"
                                           target="_blank" rel="noopener nofollow" title="Share on <?= View::escape($label) ?>"
                                           aria-label="Share on <?= View::escape($label) ?>">
                                            <?= View::icon($icon, 17) ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                                <?php if (!$toolMode): ?>
                                <li>
                                    <button type="button" class="share-net share-net--copy" data-share-copy
                                            title="Copy the link" aria-label="Copy the link">
                                        <?= View::icon('link', 17) ?><span class="sr-only" data-share-copy-label>Copy</span>
                                    </button>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <p class="calc-share-text" data-share-preview hidden></p>
                        <p class="sr-only" role="status" aria-live="polite" data-share-status></p>
                    </section>
                <?php endif; ?>

                <?php foreach (Modules::partials((string) $calc['path'], 'widget_bottom') as $module): ?>
                    <?php require $module['file']; ?>
                <?php endforeach; ?>
            </div>

            <?php /* The client solver is only for formula pages. A tool page emits
                     no payload, so calc.js exits at its first line instead of
                     trying to build a form that is not there. */ ?>
            <?php if (!$toolMode): ?>
            <script type="application/json" id="calc-definition"><?= json_encode($clientPayload, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?></script>
            <?php endif; ?>

            <?php /* Under the result: where a visitor stops reading the tool and
                     starts reading the write-up. Inside the column on purpose —
                     as a sibling of the columns it would be the first grid item
                     (order 0 beats the columns' 1 and 2) and the whole page
                     would start one row lower. */ ?>
            <?= \Onim\Ads::slot('calc_below') ?>

            <?php /* The foot of the sticky column, reachable when the tool is
                     shorter than the viewport — the case this column exists for. */ ?>
            <div class="calc-tool-extra">
                <?= \Onim\Ads::slot('calc_side') ?>
            </div>
        </div>

        <?php if ($hasRail): ?>
            <?php /* The third column: the skyscraper rail. Empty on most sites
                     until an owner pastes a 160x600 into it, which is why the
                     whole column is conditional rather than reserved. */ ?>
            <aside class="calc-rail" aria-label="Advertisement">
                <?= $railAd ?>
            </aside>
        <?php endif; ?>
    </div>

    <?php foreach (Modules::partials((string) $calc['path'], 'page_foot') as $module): ?>
        <?php require $module['file']; ?>
    <?php endforeach; ?>
</div>

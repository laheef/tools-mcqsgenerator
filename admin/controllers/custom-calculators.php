<?php
/**
 * Custom calculators — tools that are not in the harvested catalogue.
 *
 * Everything else in the catalogue comes from data/calc/*.ndjson, which the
 * panel only ever overrides. This screen is for the other case: a calculator
 * for a niche the harvest never covered (a social platform, a game, a future
 * category) built entirely in the panel — fields, formulas and article.
 *
 * A saved calculator is compiled into the same definition shape the harvester
 * produces, so the public router, form builder, solver, search, sitemap and
 * related links pick it up with no further work.
 */

declare(strict_types=1);

/** Which tab of the tools area this screen is — only the tool library has tabs. */
$toolsTab = ($page ?? '') === 'calculator-builder' ? '' : 'tools';
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Activity;
use Onim\Admin\Auth;
use Onim\Admin\Csrf;
use Onim\Admin\Flash;
use Onim\CustomCalc;

if (!CustomCalc::enabled()) {
    Flash::error('Custom calculators need the database. Configure MySQL in config.db.php and run the installer.');
    redirect_to(admin_url('dashboard'));
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $action = post('do', 'delete') ?? 'delete';
    $id     = post_int('id');

    if ($action === 'delete') {
        $row = CustomCalc::find($id);
        if ($row === null) {
            Flash::error('That calculator no longer exists.');
        } else {
            CustomCalc::delete($id);
            Activity::log('custom_calculator_deleted', 'calculator', (string) $id, 'Deleted custom calculator ' . $row['slug']);
            Flash::success('“' . $row['name'] . '” was deleted, along with its version history.');
        }
        redirect_to(admin_url($kind === 'tool' ? 'custom-calculators' : 'calculator-builder'));
    }

    if ($action === 'duplicate') {
        $row = CustomCalc::find($id);
        if ($row === null) {
            Flash::error('That calculator no longer exists.');
            redirect_to(admin_url($kind === 'tool' ? 'custom-calculators' : 'calculator-builder'));
        }
        $model = CustomCalc::editorModel($row);
        unset($model['id']);
        $model['name'] = $row['name'] . ' (copy)';
        $model['slug'] = CustomCalc::slugify($row['slug'] . '-copy');
        $model['status'] = 'draft';
        $result = CustomCalc::save(null, $model, Auth::id());
        if ($result['ok']) {
            Activity::log('custom_calculator_duplicated', 'calculator', (string) $result['id'], 'Duplicated ' . $row['slug']);
            Flash::success('Copied as a draft. Change the slug and the formulas.');
            redirect_to(admin_url('custom-calculator-edit', ['id' => $result['id']]));
        }
        foreach ($result['errors'] as $error) {
            Flash::error($error);
        }
        redirect_to(admin_url($kind === 'tool' ? 'custom-calculators' : 'calculator-builder'));
    }

    redirect_to(admin_url($kind === 'tool' ? 'custom-calculators' : 'calculator-builder'));
}

/*
 * One page list, two catalogues.
 *
 * `?p=custom-calculators` is the tool library: pages whose widget is a .php
 * file. `?p=calculator-builder` is the other kind — fields and a formula, no
 * file. They were one table with a kind badge until the owner pointed out that
 * a screen called "Tools" was opening on a list of hand-built calculators.
 *
 * The keep filter is applied before the counters so every number on the screen
 * describes what is below it.
 */
$kind = ($page ?? '') === 'calculator-builder' ? 'builder' : 'tool';
$allRows = array_values(array_filter(
    CustomCalc::rows(),
    static fn (array $row): bool => (string) ($row['kind'] ?? 'builder') === $kind
));

$stats = ['total' => count($allRows), 'published' => 0, 'draft' => 0, 'archived' => 0, 'review' => 0];
foreach ($allRows as $row) {
    $stats[$row['status']] = ($stats[$row['status']] ?? 0) + 1;
    if (CustomCalc::needsReview($row)) {
        $stats['review']++;
    }
}

/*
 * "Needs review" is the queue of pages whose article was written by the importer
 * and has not been read by a person. Everything else is either hand-written or
 * has already been through the editor.
 */
$filter = request('prose', '') === 'review' ? 'review' : 'all';
$rows   = $filter === 'review'
    ? array_values(array_filter($allRows, static fn (array $row): bool => CustomCalc::needsReview($row)))
    : $allRows;

$categoryNames = [];
foreach (\Onim\Data::categories() as $cat) {
    $categoryNames[(string) $cat['slug']] = (string) $cat['name'];
}

usort($rows, static fn (array $a, array $b): int => strcasecmp((string) $a['name'], (string) $b['name']));

$pageTitle = $kind === 'tool' ? 'Tools' : 'Calculator builder';
$subtitle = $kind === 'tool'
    ? 'Tool pages: a .php file does the maths, the article around it is written here.'
    : 'Calculators built in the panel — fields, a formula and an article, no file.';
$title = $pageTitle;
$topbarActions = [
    /* Nothing here on purpose. The three ways in are cards at the top of the
       page, each with a verb; repeating them as two buttons in the title bar
       was the fourth and fifth place to click for the same two jobs. */
];

render('custom-calculators', compact('rows', 'allRows', 'stats', 'categoryNames', 'filter', 'pageTitle', 'title', 'topbarActions', 'toolsTab', 'kind'));

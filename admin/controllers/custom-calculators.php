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
        redirect_to(admin_url('custom-calculators'));
    }

    if ($action === 'duplicate') {
        $row = CustomCalc::find($id);
        if ($row === null) {
            Flash::error('That calculator no longer exists.');
            redirect_to(admin_url('custom-calculators'));
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
        redirect_to(admin_url('custom-calculators'));
    }

    redirect_to(admin_url('custom-calculators'));
}

$allRows = array_values(CustomCalc::rows());

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

$pageTitle = 'Custom calculators';
$title = $pageTitle;
$topbarActions = [
    /* Both ways in, side by side: a page written in the editor, or a tool file
       uploaded from the panel. The second was only reachable from a screen
       called "Tool plugins", which is not where anyone looks for "add a tool". */
    ['label' => 'Upload a tool file', 'url' => admin_url('tool-plugins'), 'icon' => 'upload'],
    ['label' => 'New calculator', 'url' => admin_url('custom-calculator-edit', ['id' => 'new']), 'icon' => 'plus', 'class' => 'btn-primary'],
];

render('custom-calculators', compact('rows', 'allRows', 'stats', 'categoryNames', 'filter', 'pageTitle', 'title', 'topbarActions'));

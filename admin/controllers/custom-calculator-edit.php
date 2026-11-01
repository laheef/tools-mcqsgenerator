<?php
/**
 * Custom calculator editor — fields, formulas, article and SEO for a tool that
 * is not in the harvested catalogue.
 *
 * The screen is deliberately built around three questions an editor actually
 * asks:
 *   1. What does the visitor type in?      → Fields
 *   2. How is the answer worked out?       → Formulas (one row per direction)
 *   3. What does the page say about it?    → Article + SEO
 *
 * Nothing is stored until CustomCalc::save() has compiled the fields and
 * equations and run every direction through the real solver, so a published
 * custom calculator cannot be one that crashes the page or returns nothing.
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Omni\Admin\Activity;
use Omni\Admin\Auth;
use Omni\Admin\CalcRepo;
use Omni\Admin\Csrf;
use Omni\Admin\Flash;
use Omni\Cms;
use Omni\CustomArticle;
use Omni\CustomCalc;
use Omni\Data;

if (!CustomCalc::enabled()) {
    Flash::error('Custom calculators need the database. Configure MySQL in config.db.php and run the installer.');
    redirect_to(admin_url('dashboard'));
}

$id = request_int('id', 0);
$row = $id > 0 ? CustomCalc::find($id) : null;
if ($id > 0 && $row === null) {
    http_response_code(404);
    render_plain('error', ['code' => 404, 'message' => 'That custom calculator no longer exists.']);
    exit;
}

/** Read the editor form back into the model CustomCalc works with. */
$modelFromRequest = static function () use ($row): array {
    $fields = [];
    foreach (post_deep('fields') as $raw) {
        if (is_array($raw)) {
            $fields[] = $raw;
        }
    }
    $directions = [];
    foreach (post_deep('directions') as $raw) {
        if (is_array($raw)) {
            $directions[] = $raw;
        }
    }
    return [
        'name'             => post('name', '') ?? '',
        'slug'             => post('slug', '') ?? '',
        'category_slug'    => post('category_slug', '') ?? '',
        'h1'               => post('h1', '') ?? '',
        'meta_title'       => post('meta_title', '') ?? '',
        'meta_description' => post('meta_description', '') ?? '',
        'summary'          => post('summary', '') ?? '',
        'icon'             => post('icon', '') ?? '',
        'status'           => post('status', 'draft') ?? 'draft',
        'is_featured'      => post_bool('is_featured') ? 1 : 0,
        'sort_order'       => post_int('sort_order', 0),
        'noindex'          => post_bool('noindex') ? 1 : 0,
        'sections'         => array_values(post_deep('sections')),
        'faq'              => array_values(post_deep('faq')),
        'fields'           => $fields,
        'directions'       => $directions,
        'js'               => post('js', '') ?? '',
    ];
};

$errors = [];
$test = null;
$draftReport = null;
$tab = (string) (request('tab') ?? 'basics');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $action = post('do', 'save') ?? 'save';

    if ($action === 'restore') {
        $versionId = post_int('version_id');
        $restored  = CustomCalc::restore($versionId, Auth::id());
        if ($restored === null) {
            Flash::error('That version could not be restored.');
            redirect_to(admin_url('custom-calculator-edit', ['id' => $id]));
        }
        Activity::log('custom_calculator_restored', 'calculator', (string) $restored, 'Restored a previous version');
        Flash::success('Restored. The version you replaced was saved first, so you can go back.');
        redirect_to(admin_url('custom-calculator-edit', ['id' => $restored]));
    }

    $model = $modelFromRequest();
    $tab   = (string) (post('tab', 'basics') ?? 'basics');

    if ($action === 'draft' && ($model['fields'] ?? []) === [] && ($model['directions'] ?? []) === []) {
        /* there is nothing to describe yet: drafting here would invent a page */
        Flash::error('Add the fields and at least one formula first — the draft is written from them, so there is nothing to say yet.');
        $tab = 'basics';
    } elseif ($action === 'draft') {
        /*
         * Write a first draft from the definition and put it in the *form*, not
         * in the database. The editor reviews it, rewrites what is wrong and
         * presses Save — generated text is a starting point, never a publication.
         */
        $draft = CustomArticle::draft($model);
        $replace = post_bool('replace_text');
        $model = CustomArticle::merge($model, $draft, $replace);
        $values = $model;
        $tab = 'article';
        $draftReport = [
            'words'  => $draft['words'],
            'notes'  => $draft['notes'],
            'mode'   => $replace ? 'replace' : 'fill',
        ];
        Flash::info('A draft of ' . number_format($draft['words']) . ' words is in the form below — nothing is saved until you press Save changes.');
    } elseif ($action === 'test') {
        $test   = CustomCalc::testModel($model);
        $errors = [];
        $values = $model;
    } else {
        $oldPath = $row === null ? '' : '/' . $row['category_slug'] . '/' . $row['slug'];
        $result  = CustomCalc::save($row === null ? null : (int) $row['id'], $model, Auth::id());

        if ($result['ok']) {
            $saved = CustomCalc::find($result['id']) ?? [];
            $newPath = '/' . (string) ($saved['category_slug'] ?? '') . '/' . (string) ($saved['slug'] ?? '');
            $note = '';
            if ($oldPath !== '' && $oldPath !== $newPath) {
                CalcRepo::upsertRedirect($oldPath, $newPath, 301, 'Custom calculator address changed');
                $note = ' The old address ' . $oldPath . ' now redirects here.';
            }
            Activity::log(
                $row === null ? 'custom_calculator_created' : 'custom_calculator_updated',
                'calculator',
                (string) $result['id'],
                'Saved custom calculator ' . (string) ($saved['slug'] ?? '') . ' (' . (string) ($saved['status'] ?? '') . ')'
            );
            Flash::success('Saved “' . (string) ($saved['name'] ?? '') . '”.' . $note);
            redirect_to(admin_url('custom-calculator-edit', ['id' => $result['id'], 'tab' => $tab]));
        }
        $errors = $result['errors'];
        $values = $model;
        Flash::error($result['message']);
    }
} else {
    $values = CustomCalc::editorModel($row);
}

if (!isset($values)) {
    $values = CustomCalc::editorModel($row);
}

/* category picker: catalogue categories plus anything the panel created */
$categoryOptions = [];
foreach (Data::categories() as $cat) {
    $categoryOptions[(string) $cat['slug']] = (string) $cat['name'];
}
$currentCat = (string) ($values['category_slug'] ?? '');
if ($currentCat !== '' && !isset($categoryOptions[$currentCat])) {
    $categoryOptions[$currentCat] = ucfirst(str_replace('-', ' ', $currentCat));
}

$publicPath = '/' . (string) ($values['category_slug'] ?: 'other') . '/' . (string) ($values['slug'] ?: 'slug');
$previewUrl = null;
$publicUrl  = null;
if ((int) ($row['id'] ?? 0) > 0 && (string) $values['slug'] !== '') {
    $path = '/' . (string) $values['category_slug'] . '/' . $values['slug'];
    $previewUrl = site_link(Cms::previewUrl($path));
    $publicUrl  = (string) $values['status'] === 'published' ? $path : null;
}

$unitGroups = CustomCalc::unitGroups();
$versions   = $row === null ? [] : CustomCalc::versions((int) $row['id']);

$pageTitle = $row === null ? 'New custom calculator' : (string) $row['name'];
$title = $row === null ? 'New custom calculator' : 'Edit custom calculator';
$breadcrumbs = [
    ['label' => 'Custom calculators', 'url' => admin_url('custom-calculators')],
    ['label' => $row === null ? 'New' : (string) $row['name']],
];
$topbarActions = [];
if ($previewUrl !== null) {
    $topbarActions[] = ['label' => 'Preview', 'url' => $previewUrl, 'icon' => 'eye'];
}
if ($publicUrl !== null) {
    $topbarActions[] = ['label' => 'View live', 'url' => $publicUrl, 'icon' => 'external'];
}

render('custom-calculator-edit', compact(
    'row', 'values', 'errors', 'test', 'tab', 'categoryOptions', 'unitGroups', 'draftReport',
    'versions', 'previewUrl', 'publicUrl', 'publicPath',
    'pageTitle', 'title', 'breadcrumbs', 'topbarActions'
));

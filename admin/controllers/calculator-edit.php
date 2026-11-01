<?php
/**
 * Calculator editor: article text, FAQs, related links, SEO, status and media.
 *
 * The form posts the whole record; CalcRepo::save() validates it and writes one
 * override row. Formulas are not editable here on purpose — they live in the
 * source shards and are managed from the source-file screen.
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Activity;
use Onim\Admin\Auth;
use Onim\Admin\CalcRepo;
use Onim\Admin\Csrf;
use Onim\Admin\Flash;
use Onim\Cms;
use Onim\Data;

$path = (string) (request('path') ?? '');
$row = $path === '' ? null : CalcRepo::find($path);
if ($row === null) {
    http_response_code(404);
    render_plain('error', ['code' => 404, 'message' => 'That calculator is not in the catalogue.']);
    exit;
}

$errors = [];

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $action = post('do', 'save') ?? 'save';

    if ($action === 'reset') {
        if (CalcRepo::resetOverride($path)) {
            Flash::success('Reverted “' . $row['name'] . '” to the harvested text. Nothing was deleted from the catalogue.');
        } else {
            Flash::error('There was nothing to revert.');
        }
        redirect_to(admin_url('calculators'));
    }

    $input = [
        'slug'             => post('slug', '') ?? '',
        'category_slug'    => post('category_slug', '') ?? '',
        'name'             => post('name', '') ?? '',
        'h1'               => post('h1', '') ?? '',
        'meta_title'       => post('meta_title', '') ?? '',
        'meta_description' => post('meta_description', '') ?? '',
        'summary'          => post('summary', '') ?? '',
        'sections'         => array_values(post_deep('sections')),
        'faq'              => array_values(post_deep('faq')),
        /* Which parts of the record this submission actually carried. The edit
           form always posts a hidden marker per repeater, so "the editor emptied
           it" can be told apart from "the form never rendered it". A POST that
           omits a part (a scripted save, a partial submission) must leave what is
           on the page alone rather than delete it. */
        'sections_submitted'  => (isset($_POST['sections_submitted']) && $_POST['sections_submitted'] === '1')
            || (isset($_POST['sections']) && is_array($_POST['sections'])),
        'faq_submitted'       => (isset($_POST['faq_submitted']) && $_POST['faq_submitted'] === '1')
            || (isset($_POST['faq']) && is_array($_POST['faq'])),
        'related_submitted'   => (isset($_POST['related_submitted']) && $_POST['related_submitted'] === '1')
            || (isset($_POST['related']) && is_array($_POST['related'])),
        'icon_submitted'      => isset($_POST['icon']),
        'thumbnail_submitted' => isset($_POST['thumbnail']),
        'related'          => post_array('related'),
        'icon'             => post('icon', '') ?? '',
        'thumbnail'        => post('thumbnail', '') ?? '',
        'status'           => post('status', 'published') ?? 'published',
        'is_featured'      => post_bool('is_featured'),
        'sort_order'       => post_int('sort_order', 0),
        'canonical_url'    => post('canonical_url', '') ?? '',
        'noindex'          => post_bool('noindex'),
    ];

    $result = CalcRepo::save($path, $input, Auth::id());
    if ($result['ok']) {
        Flash::success($result['message']);
        redirect_to(admin_url('calculator-edit', ['path' => $path, 'tab' => post('tab', 'content')]));
    }
    $errors = $result['errors'];
    Flash::error($result['message']);
    $values = $input;
    $values['source_path'] = $path;
    $values['is_override'] = true;
} else {
    $values = CalcRepo::formValues($path);
}

$categories = Data::categories();
$publicUrl = $values['category_slug'] . '/' . $values['slug'];
$words = (int) ($values['words'] ?? 0);

/* Related: resolve the current selection so the editor can show names. */
$relatedRows = [];
foreach (($values['related'] ?? []) as $relatedPath) {
    $found = CalcRepo::find((string) $relatedPath);
    if ($found !== null) {
        $relatedRows[] = $found;
    }
}

$pageTitle = $row['name'];
$title = 'Edit calculator';
$breadcrumbs = [
    ['label' => 'Calculators', 'url' => admin_url('calculators')],
    ['label' => $row['name']],
];
$topbarActions = [
    ['label' => 'View page', 'url' => site_link($publicUrl), 'icon' => 'external'],
];

render('calculator-edit', compact(
    'row', 'values', 'errors', 'categories', 'publicUrl', 'words', 'relatedRows',
    'pageTitle', 'title', 'breadcrumbs', 'topbarActions'
));

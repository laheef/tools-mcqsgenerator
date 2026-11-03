<?php
/**
 * New tool — one screen, one pass.
 *
 * This is the flow the owner asked for, in their words: click New tool, upload
 * the .php file, pick the section it is filed under, write the article and the
 * SEO, press save. The page exists afterwards.
 *
 * It replaces a three-stop journey — upload on Tool files, click "Create the
 * page" on the row, then edit the draft in a tabbed editor built for formula
 * calculators — where every stop spoke a different vocabulary and the article
 * was a list of sections rather than one box.
 *
 * What happens on save:
 *
 *   1. the file is uploaded (or an already-uploaded one is chosen);
 *   2. the page is created through CustomCalc::save(), so it is compiled,
 *      routed and counted exactly like every other page;
 *   3. the single article box is split on its <h2>s into the section list the
 *      template renders, so the table of contents still works;
 *   4. the libraries the file declares are attached to the page.
 */

declare(strict_types=1);

$toolsTab = 'tools';
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
use Onim\Data;
use Onim\Groups;
use Onim\Toolkit;
use Onim\ToolLibraries;

if (!CustomCalc::enabled()) {
    Flash::error('Custom calculators need the database. Configure MySQL in config.db.php and run the installer.');
    redirect_to(admin_url('dashboard'));
}

/** Every section a tool page can be filed under: groups, their children, calculator categories. */
$sectionOptions = [];
foreach (Groups::rows() as $group) {
    if ((string) ($group['parent'] ?? '') === '') {
        $sectionOptions[(string) $group['slug']] = (string) $group['name'];
        foreach (Groups::subs((string) $group['slug']) as $sub) {
            $sectionOptions[(string) $sub['slug']] = (string) $group['name'] . ' › ' . (string) $sub['name'];
        }
    }
}
$categoryOptions = [];
foreach (Data::categories() as $cat) {
    $categoryOptions[(string) $cat['slug']] = (string) $cat['name'];
    if (!isset($sectionOptions[(string) $cat['slug']])) {
        $sectionOptions[(string) $cat['slug']] = (string) $cat['name'];
    }
}

/* ------------------------------------------------------------------ post */

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();

    /* ---------------------------------------------------------- the file */
    $shortcode = trim((string) (post('shortcode', '') ?? ''));
    $error     = '';
    $upload    = $_FILES['file'] ?? [];
    $uploaded  = false;

    if (is_array($upload) && (int) ($upload['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE) {
        $folder = trim((string) (post('folder', '') ?? ''));
        if ($folder === '') {
            $folder = (string) (post('category', '') ?? 'math');
        }
        $stored = Toolkit::install($upload, $folder, false, $error);
        if ($stored === null) {
            Flash::error($error !== '' ? $error : 'The upload failed.');
            redirect_to(admin_url('tool-new'));
        }
        foreach (Toolkit::scan(true) as $candidate) {
            if ($candidate['file'] === $stored) {
                $shortcode = (string) $candidate['shortcode'];
                break;
            }
        }
        $uploaded = true;
        Activity::log('tool_uploaded', 'tool', $stored, 'Uploaded tool file ' . $stored);
    }

    if ($shortcode === '') {
        Flash::error('Choose the .php file for this tool — upload one or pick one you have already added.');
        redirect_to(admin_url('tool-new'));
    }

    $tool = Toolkit::find($shortcode);
    if ($tool === null || !$tool['valid']) {
        Flash::error('That file cannot be used: ' . ($tool['error'] ?? 'it is not in the plugins folder.'));
        redirect_to(admin_url('tool-new'));
    }

    /* ---------------------------------------------------------- the page */
    $name     = trim((string) (post('name', '') ?? ''));
    $slugIn   = trim((string) (post('slug', '') ?? ''));
    $section  = trim((string) (post('section', '') ?? ''));
    $section  = isset($sectionOptions[$section]) || isset($categoryOptions[$section]) ? $section : (string) $tool['category'];

    $model = CustomCalc::editorModel(null);
    $model['kind']           = 'tool';
    $model['tool_shortcode'] = (string) $tool['shortcode'];
    $model['name']           = $name !== '' ? $name : (string) $tool['name'];
    $model['slug']           = $slugIn !== '' ? $slugIn : CustomCalc::slugify($model['name']);
    $model['category_slug']  = $section;
    $model['h1']             = trim((string) (post('h1', '') ?? '')) ?: $model['name'];
    $model['summary']        = trim((string) (post('summary', '') ?? ''));
    $model['meta_title']     = trim((string) (post('meta_title', '') ?? ''));
    $model['meta_description'] = trim((string) (post('meta_description', '') ?? ''));
    $model['noindex']        = post_bool('noindex') ? 1 : 0;
    $model['status']         = (string) (post('status', 'draft') ?? 'draft');
    $model['sections']       = CustomCalc::articleToSections((string) (post('article', '') ?? ''));
    $model['faq']            = [];
    foreach (post_deep('faq') as $pair) {
        if (is_array($pair) && trim((string) ($pair['q'] ?? '')) !== '') {
            $model['faq'][] = ['q' => (string) $pair['q'], 'a' => (string) ($pair['a'] ?? '')];
        }
    }
    /* `libraries[slug]` posts an array; post() only returns strings. */
    $model['libraries'] = implode(',', array_map('strval', array_keys((array) ($_POST['libraries'] ?? []))));

    $result = CustomCalc::save(null, $model, (int) Auth::id());
    if (!$result['ok']) {
        foreach ($result['errors'] as $problem) {
            Flash::error($problem);
        }
        /* Keep what was typed: the form below is repainted from the session. */
        $_SESSION['tool_new_draft'] = [
            'name' => $model['name'], 'slug' => $model['slug'], 'section' => $section,
            'article' => (string) (post('article', '') ?? ''), 'summary' => $model['summary'],
            'meta_title' => $model['meta_title'], 'meta_description' => $model['meta_description'],
            'shortcode' => (string) $tool['shortcode'],
        ];
        redirect_to(admin_url('tool-new'));
    }

    $id = (int) $result['id'];
    /* What the file declares, attached now that the page exists. */
    $found = ToolLibraries::discoverForPage($id, $tool);

    Activity::log('tool_page_created', 'calculator', (string) $id, 'Created a tool page for [' . $shortcode . ']');
    $message = '“' . $model['name'] . '” saved';
    $message .= $model['status'] === 'published' ? ' and published.' : ' as a draft.';
    if ($uploaded) {
        $message .= ' The file is in plugins/' . (string) $tool['file'] . '.';
    }
    if ($found !== []) {
        $message .= ' ' . count($found) . ' librar' . (count($found) === 1 ? 'y' : 'ies') . ' attached from the file.';
    }
    Flash::success($message);
    redirect_to(admin_url('custom-calculators', ['q' => $model['slug']]));
}

/* ------------------------------------------------------------------ view */

$draft = $_SESSION['tool_new_draft'] ?? [];
unset($_SESSION['tool_new_draft']);

$files = [];
foreach (Toolkit::scan(true) as $tool) {
    if ($tool['valid']) {
        $files[] = $tool;
    }
}
usort($files, static fn (array $a, array $b): int => strcasecmp((string) $a['name'], (string) $b['name']));

$libraries = ToolLibraries::rows(true);
$folders   = Toolkit::categoryNames();

$pickedFile = (string) (request('file', '') ?? '');
$preset = null;
foreach ($files as $file) {
    if ($file['shortcode'] === $pickedFile || $file['file'] === $pickedFile) {
        $preset = $file;
        break;
    }
}

$form = [
    'name'             => (string) ($draft['name'] ?? ($preset['name'] ?? '')),
    'slug'             => (string) ($draft['slug'] ?? ($preset !== null ? CustomCalc::slugify((string) $preset['name']) : '')),
    'section'          => (string) ($draft['section'] ?? ($preset['category'] ?? '')),
    'article'          => (string) ($draft['article'] ?? ''),
    'summary'          => (string) ($draft['summary'] ?? ($preset['description'] ?? '')),
    'meta_title'       => (string) ($draft['meta_title'] ?? ''),
    'meta_description' => (string) ($draft['meta_description'] ?? ''),
    'shortcode'        => (string) ($draft['shortcode'] ?? ($preset['shortcode'] ?? '')),
];
$declared = $preset !== null ? ToolLibraries::forTool($preset) : [];

$pageTitle = 'New tool';
$title = $pageTitle;
$breadcrumbs = [
    ['label' => 'Tools', 'url' => admin_url('custom-calculators')],
    ['label' => 'New tool'],
];

render('tool-new', compact(
    'files', 'folders', 'libraries', 'form', 'preset', 'declared',
    'sectionOptions', 'categoryOptions', 'pageTitle', 'title', 'breadcrumbs', 'toolsTab'
));

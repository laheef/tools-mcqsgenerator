<?php
/**
 * Bulk import — create many custom calculators from one JSON or CSV document.
 *
 * The panel's single-calculator editor is the right tool for one tool; this is
 * the right tool for a niche. Paste a document (or upload it), see exactly what
 * would happen to every row — created, updated, skipped, refused, and what each
 * one calculates — and only then write.
 *
 * Nothing here bypasses the single-record path: every row goes through
 * CustomCalc::save(), which compiles the fields and equations and refuses a
 * definition the engine cannot run. The dry run is the same validation with the
 * write at the end removed, so the preview cannot promise something the import
 * will not do.
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Omni\Admin\Activity;
use Omni\Admin\Auth;
use Omni\Admin\Csrf;
use Omni\Admin\Flash;
use Omni\CustomCalc;
use Omni\CustomImport;
use Omni\Data;

if (!CustomCalc::enabled()) {
    Flash::error('Custom calculators need the database. Configure MySQL in config.db.php and run the installer.');
    redirect_to(admin_url('dashboard'));
}

$text   = '';
$mode   = 'skip';
$draftArticles = true;      // drafting on arrival is the default: no thin pages
$report = null;          // preview result
$result = null;          // import result
$parseErrors = [];

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $action = post('do', 'preview') ?? 'preview';
    $mode   = post('mode', 'skip') === 'update' ? 'update' : 'skip';
    /* the checkbox posts 1 when ticked; when it is missing the user turned it off */
    $draftArticles = post_bool('draft_articles');
    $text   = (string) ($_POST['document'] ?? '');

    /* an uploaded file replaces whatever is in the box */
    $file = $_FILES['document_file'] ?? null;
    if (is_array($file) && (int) ($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE) {
        if ((int) $file['error'] !== UPLOAD_ERR_OK) {
            $parseErrors[] = 'The upload failed (error code ' . (int) $file['error'] . '). Paste the document instead.';
        } elseif ((int) $file['size'] > CustomImport::MAX_BYTES) {
            $parseErrors[] = 'That file is larger than 2 MB. Split it into a few imports.';
        } elseif (!is_uploaded_file((string) $file['tmp_name'])) {
            $parseErrors[] = 'The upload could not be read.';
        } else {
            $ext = strtolower(pathinfo((string) ($file['name'] ?? ''), PATHINFO_EXTENSION));
            if (!in_array($ext, ['json', 'csv', 'txt'], true)) {
                $parseErrors[] = 'Upload a .json, .csv or .txt file.';
            } else {
                $text = (string) file_get_contents((string) $file['tmp_name']);
            }
        }
    }

    if ($parseErrors === []) {
        $parsed = CustomImport::parse($text);
        $parseErrors = $parsed['errors'];

        if ($parsed['ok']) {
            if ($action === 'import') {
                $result = CustomImport::run($parsed['rows'], $mode, Auth::id(), $draftArticles);
                $drafted = count($result['drafted']);
                $done = count($result['created']);
                $updated = count($result['updated']);
                $failed = count($result['failed']);
                $skipped = count($result['skipped']);
                Activity::log(
                    'custom_calculators_imported',
                    'calculator',
                    '',
                    'Bulk import: ' . $done . ' created, ' . $updated . ' updated, '
                        . $skipped . ' skipped, ' . $failed . ' refused'
                );
                if ($failed === 0 && $done + $updated > 0) {
                    Flash::success('Imported: ' . $done . ' created, ' . $updated . ' updated'
                        . ($skipped > 0 ? ', ' . $skipped . ' left alone' : '')
                        . ($drafted > 0 ? ', ' . $drafted . ' written an article draft' : '') . '.');
                } elseif ($done + $updated > 0) {
                    Flash::warning('Imported ' . ($done + $updated) . ', refused ' . $failed
                        . '. The refused rows are listed below — fix them and import again.');
                } else {
                    Flash::error('Nothing was imported. '
                        . ($failed > 0 ? $failed . ' row(s) were refused — see below.' : 'No rows changed.'));
                }
                /* the preview keeps the created rows visible after the redirect */
                $report = CustomImport::preview($parsed['rows'], $mode);
            } else {
                $report = CustomImport::preview($parsed['rows'], $mode);
            }
        }
    }
}

$categories = [];
foreach (Data::categories() as $cat) {
    $categories[(string) $cat['slug']] = (string) $cat['name'];
}

$pageTitle = 'Import custom calculators';
$title = 'Bulk import';
$breadcrumbs = [
    ['label' => 'Custom calculators', 'url' => admin_url('custom-calculators')],
    ['label' => 'Bulk import'],
];
$topbarActions = [
    ['label' => 'Custom calculators', 'url' => admin_url('custom-calculators'), 'icon' => 'calculator'],
];
$example = CustomImport::example();
$maxRows = CustomImport::MAX_ROWS;

render('custom-import', compact(
    'text', 'mode', 'report', 'result', 'parseErrors', 'categories', 'example', 'maxRows',
    'pageTitle', 'title', 'breadcrumbs', 'topbarActions'
));

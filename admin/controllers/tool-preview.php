<?php
/**
 * Preview a tool file — what the widget actually does, before it is published.
 *
 * The panel could list a tool file, check that it parses, and even open the page
 * it is bound to — but a file that was uploaded and never bound could only be
 * read as source. This screen runs the shortcode and shows the widget, with the
 * header the file declares beside it, so "is this the tool I meant?" is answered
 * before a page exists.
 *
 * It is admin-only and reads the file through Toolkit, which already refuses
 * any path outside plugins/.
 */

declare(strict_types=1);

$toolsTab = 'files';
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Onim\Toolkit;
use Onim\ToolLibraries;

$file = (string) (request('file', '') ?? '');
$tool = null;
foreach (Toolkit::scan(true) as $candidate) {
    if ($candidate['file'] === $file || $candidate['shortcode'] === $file) {
        $tool = $candidate;
        break;
    }
}

if ($tool === null) {
    http_response_code(404);
    render_plain('error', ['code' => 404, 'message' => 'That tool file is not in plugins/.']);
    exit;
}

$html    = '';
$error   = '';
$seconds = 0.0;
if ($tool['valid']) {
    $start = microtime(true);
    try {
        $html = Toolkit::render('[' . $tool['shortcode'] . ']');
        if (trim($html) === '') {
            $error = 'The file registered [' . $tool['shortcode'] . '] but printed nothing.';
        }
    } catch (\Throwable $e) {
        $error = $e->getMessage();
    }
    $seconds = round((microtime(true) - $start) * 1000, 1);
} else {
    $error = (string) $tool['error'];
}

$declared = ToolLibraries::forTool($tool);

$pageTitle = 'Tool preview · ' . (string) $tool['name'];
$title = $pageTitle;
$breadcrumbs = [
    ['label' => 'Tools', 'url' => admin_url('custom-calculators')],
    ['label' => 'Tool files', 'url' => admin_url('tool-plugins')],
    ['label' => 'Preview'],
];

render('tool-preview', compact('tool', 'html', 'error', 'seconds', 'declared', 'pageTitle', 'title', 'breadcrumbs'));

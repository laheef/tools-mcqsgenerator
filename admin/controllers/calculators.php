<?php
/**
 * Calculator list: search, filter, sort, paginate, bulk publish/unpublish/
 * feature/revert. Every action is a POST with a CSRF token; the row links go to
 * the editor and to the public page.
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
use Omni\Admin\Pagination;
use Omni\Cms;
use Omni\Data;

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $action = post('bulk_action', '') ?? '';
    $paths  = post_array('ids');
    $single = post('path', '') ?? '';
    if ($paths === [] && $single !== '') {
        $paths = [$single];
    }
    if ($paths === [] || $action === '') {
        Flash::error('Nothing was selected.');
        redirect_to(admin_url('calculators'));
    }

    $done = 0;
    foreach ($paths as $path) {
        $path = (string) $path;
        $ok = match ($action) {
            'publish'   => CalcRepo::setStatus($path, 'published', Auth::id()),
            'draft'     => CalcRepo::setStatus($path, 'draft', Auth::id()),
            'archived'  => CalcRepo::setStatus($path, 'archived', Auth::id()),
            'feature'   => CalcRepo::setFeatured($path, true, Auth::id()),
            'unfeature' => CalcRepo::setFeatured($path, false, Auth::id()),
            'revert'    => CalcRepo::resetOverride($path),
            default     => false,
        };
        $done += $ok ? 1 : 0;
    }

    $labels = [
        'publish' => 'published', 'draft' => 'moved to draft', 'archived' => 'archived',
        'feature' => 'featured', 'unfeature' => 'removed from featured',
        'revert' => 'reverted to the harvested text',
    ];
    if ($done === 0) {
        Flash::error('Nothing changed — those calculators may already be in that state.');
    } else {
        Flash::success($done . ' calculator' . ($done === 1 ? '' : 's') . ' ' . ($labels[$action] ?? 'updated') . '.');
        Activity::log('calculators_bulk', 'calculator', implode(',', array_slice($paths, 0, 5)), $done . ' × ' . $action);
    }
    $query = array_filter([
        'q' => post('q_back', ''),
        'cat' => post('cat_back', ''),
        'status' => post('status_back', ''),
        'flag' => post('flag_back', ''),
        'sort' => post('sort_back', ''),
        'pg' => post('pg_back', ''),
    ], static fn ($v) => $v !== '' && $v !== null);
    redirect_to(admin_url('calculators', $query));
}

$filters = [
    'q'      => (string) (request('q') ?? ''),
    'cat'    => (string) (request('cat') ?? ''),
    'status' => (string) (request('status') ?? ''),
    'flag'   => (string) (request('flag') ?? ''),
    'sort'   => (string) (request('sort') ?? 'name'),
];
$result = CalcRepo::query($filters);
$pagination = new Pagination($result['total'], 25, request_int('pg', 1));
$rows = array_slice($result['rows'], $pagination->offset(), $pagination->perPage);
$stats = CalcRepo::stats();
$categories = Data::categories();

$pageTitle = 'Calculators';
$title = $pageTitle;
$wide = true;
$topbarActions = [
    ['label' => 'Public index', 'url' => site_link('/search'), 'icon' => 'external'],
];

render('calculators', compact('rows', 'pagination', 'filters', 'stats', 'categories', 'result', 'pageTitle', 'title', 'wide', 'topbarActions'));

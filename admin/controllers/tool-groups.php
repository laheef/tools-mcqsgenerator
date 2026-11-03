<?php
/**
 * Tool groups — the sections above the categories.
 *
 * The public site has sixteen of them: Calculators, Audio Tools, Video Tools,
 * Image Tools, PDF Tools and the rest, each one a page and an entry in the
 * secondary header. This screen edits them without touching code:
 *
 *   rename     the words in the header, on the group page and in the breadcrumb
 *   re-order   the position in the header bar
 *   hide       take a group out of the navigation without deleting it
 *   add        a new group, or a subgroup under an existing one
 *
 * The list the site ships with is a file (data/groups.json); this screen writes
 * overrides into `tool_groups`. A group that has never been edited has no row
 * here at all, which is why deleting an override puts the shipped wording back
 * rather than breaking the page.
 */

declare(strict_types=1);

/** Which tab of the tools area this screen is. */
$toolsTab = 'sections';
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Onim\Admin\Activity;
use Onim\Admin\Csrf;
use Onim\Admin\Flash;
use Onim\Cms;
use Onim\Db;
use Onim\Groups;

if (!Db::hasTable('tool_groups')) {
    $pageTitle = 'Tools · Sections & sub-categories';
    $title = $pageTitle;
    $breadcrumbs = [['label' => 'Tools', 'url' => admin_url('custom-calculators')], ['label' => 'Sections']];
    $topbarActions = [];
    render('tool-groups', [
        'groups' => [], 'subs' => [], 'counts' => [], 'missingMigration' => true,
        'pageTitle' => $pageTitle, 'title' => $title, 'breadcrumbs' => $breadcrumbs,
        'topbarActions' => [], 'groupOptions' => [], 'newMode' => '', 'parentPreset' => '', 'toolsTab' => 'sections',
    ]);
    return;
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $action = post('do', 'save') ?? 'save';

    if ($action === 'reset') {
        /* Back to the shipped wording: the override row goes, the file wins. */
        $slug = (string) (post('slug', '') ?? '');
        Db::exec('DELETE FROM tool_groups WHERE slug = ?', [$slug]);
        Groups::flush();
        Cms::flush();
        Activity::log('group_reset', 'group', $slug, 'Reset tool group ' . $slug);
        Flash::success('“' . $slug . '” is back to the wording the site ships with.');
        redirect_to(admin_url('tool-groups'));
    }

    if ($action === 'delete') {
        /* Only a section the panel created, and only when nothing is filed
           under it. A shipped section is never deleted — hiding it is the
           reversible move, and the row for it is a wording override. */
        $slug = (string) (post('slug', '') ?? '');
        if ($slug === '') {
            Flash::error('Which section?');
            redirect_to(admin_url('tool-groups'));
        }
        if (\Onim\Groups::isShipped($slug)) {
            Flash::error('“' . $slug . '” ships with the site and cannot be deleted. Hide it instead — that takes it out of the header and keeps its tools online.');
            redirect_to(admin_url('tool-groups'));
        }
        $tools = \Onim\Groups::count($slug);
        $children = (int) (Db::one('SELECT COUNT(*) AS n FROM tool_groups WHERE parent = ?', [$slug])['n'] ?? 0);
        if ($tools > 0 || $children > 0) {
            $why = $tools > 0
                ? $tools . ' tool' . ($tools === 1 ? ' is' : 's are') . ' filed under it'
                : $children . ' sub-categor' . ($children === 1 ? 'y is' : 'ies are') . ' inside it';
            Flash::error('“' . $slug . '” was not deleted: ' . $why . '. Move or delete ' . ($tools > 0 ? 'them' : 'those') . ' first.');
            redirect_to(admin_url('tool-groups'));
        }
        Db::exec('DELETE FROM tool_groups WHERE slug = ?', [$slug]);
        Groups::flush();
        Cms::flush();
        Activity::log('group_deleted', 'group', $slug, 'Deleted tool group ' . $slug);
        Flash::success('“' . $slug . '” is gone from the header.');
        redirect_to(admin_url('tool-groups'));
    }

    $input = [
        'slug'        => Cms::slugify(post('slug', '') ?? ''),
        'parent'      => Cms::slugify(post('parent', '') ?? ''),
        'name'        => trim((string) (post('name', '') ?? '')),
        'short'       => trim((string) (post('short', '') ?? '')),
        'title'       => trim((string) (post('title', '') ?? '')),
        'description' => trim((string) (post('description', '') ?? '')),
        'icon'        => trim((string) (post('icon', '') ?? 'grid')),
        'sort_order'  => post_int('sort_order', 0),
        'status'      => post('status', 'published') === 'hidden' ? 'hidden' : 'published',
        'updated_at'  => date('Y-m-d H:i:s'),
    ];

    $errors = [];
    if ($input['slug'] === '') {
        $errors[] = 'The address (slug) is required — it is the group’s URL.';
    }
    if ($input['name'] === '') {
        $errors[] = 'The name is required.';
    }
    if ($input['parent'] !== '' && !Groups::isGroup($input['parent'])) {
        $errors[] = 'The parent group “' . $input['parent'] . '” does not exist.';
    }
    if (in_array($input['slug'], ['admin', 'api', 'assets', 'search', 'blog', 'uploads', 'contact', 'sitemap.xml', 'robots.txt'], true)) {
        $errors[] = 'That address is used by the site itself.';
    }
    /* A section slug becomes the URL parent of every tool filed under it, so it
       must not collide with a calculator category either. */
    if ($groups = Groups::find($input['slug'])) {
        $rowParent = (string) ($groups['parent'] ?? '');
        $existing = Db::one('SELECT id FROM tool_groups WHERE slug = ?', [$input['slug']]);
        if ($rowParent !== '' && $rowParent !== $input['parent'] && $existing !== null) {
            $errors[] = 'A section cannot move between groups: tools are filed at /' . $input['slug'] . '/…';
        }
    }

    if ($errors !== []) {
        foreach ($errors as $error) {
            Flash::error($error);
        }
        redirect_to(admin_url('tool-groups'));
    }

    $existing = Db::one('SELECT id FROM tool_groups WHERE slug = ?', [$input['slug']]);
    if ($existing !== null) {
        Db::update('tool_groups', $input, 'slug = :slug', [':slug' => $input['slug']]);
        Activity::log('group_updated', 'group', $input['slug'], 'Saved tool group ' . $input['slug']);
        Flash::success('“' . $input['name'] . '” saved.');
    } else {
        $input['created_at'] = date('Y-m-d H:i:s');
        Db::insert('tool_groups', $input);
        Activity::log('group_created', 'group', $input['slug'], 'Created tool group ' . $input['slug']);
        Flash::success('“' . $input['name'] . '” created. It is in the header from now on.');
    }

    Groups::flush();
    Cms::flush();
    redirect_to(admin_url('tool-groups'));
}

$groups = Groups::all();
$subs = [];
foreach ($groups as $group) {
    $subs[(string) $group['slug']] = Groups::subs((string) $group['slug']);
}
$counts = [];
foreach (Groups::rows() as $row) {
    $slug = (string) $row['slug'];
    $counts[$slug] = (string) $row['parent'] === ''
        ? Groups::countGroup($slug)
        : Groups::count($slug);
}
$groupOptions = [];
foreach ($groups as $group) {
    $groupOptions[(string) $group['slug']] = (string) $group['name'];
}

$edit = (string) (request('edit', '') ?? '');
/* ?new=section or ?new=sub: the screen opens on the form for that kind of
   thing, with the mode chosen. Without it the right-hand card shows the choice
   instead of a form that could go either way. */
$newMode = (string) (request('new', '') ?? '');
$newMode = in_array($newMode, ['section', 'sub'], true) ? $newMode : '';
/* "Add a subgroup" on a row arrives as ?edit=new&parent=audio: the form opens
   empty with that group already chosen as the parent. */
$parentPreset = (string) (request('parent', '') ?? '');
if ($parentPreset !== '' && !isset($groupOptions[$parentPreset])) {
    $parentPreset = '';
}
$pageTitle = 'Tools · Sections & sub-categories';
$title = $pageTitle;
$breadcrumbs = [['label' => 'Tools', 'url' => admin_url('custom-calculators')], ['label' => 'Sections']];
$topbarActions = [];

render('tool-groups', compact(
    'groups', 'subs', 'counts', 'groupOptions', 'edit', 'parentPreset', 'newMode', 'toolsTab',
    'pageTitle', 'title', 'breadcrumbs', 'topbarActions'
));

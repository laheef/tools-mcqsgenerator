<?php
/**
 * Modules — extra UI and logic for individual calculator pages.
 *
 * A module is a folder under `modules/` with a `module.json` and one or more PHP
 * partials, rendered into a named slot of the calculator page. This screen lists
 * what is installed, checks each manifest, shows how many pages a module affects,
 * and switches it off or on. It deliberately does not upload code: a module is a
 * deploy-time artefact, and the panel's job is to control it, not to introduce it.
 *
 * The partials themselves are editable from Source files (the `modules/` folder is
 * an editable root), with the same syntax check and version history as any other
 * file.
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Activity;
use Onim\Admin\Csrf;
use Onim\Admin\Flash;
use Onim\Modules;

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $action = post('do', 'toggle') ?? 'toggle';
    $slug   = (string) (post('slug', '') ?? '');

    if ($action === 'toggle') {
        $module = Modules::all()[$slug] ?? null;
        if ($module === null) {
            Flash::error('There is no module called “' . $slug . '”.');
            redirect_to(admin_url('modules'));
        }
        /*
         * Two lists, because a manifest can ship a module disabled. Switching a
         * module on has to be recorded as an explicit "on", otherwise the next
         * page load falls straight back to the manifest default and the button
         * appears to do nothing.
         */
        $wasEnabled = Modules::isEnabled($slug, $module);
        $off = Modules::switchedOff();
        $on  = Modules::forcedOn();
        if ($wasEnabled) {
            $off[] = $slug;
            $on = array_values(array_diff($on, [$slug]));
        } else {
            $off = array_values(array_diff($off, [$slug]));
            $on[] = $slug;
        }
        Modules::setSwitchedOff($off);
        Modules::setForcedOn($on);
        Activity::log(
            $wasEnabled ? 'module_disabled' : 'module_enabled',
            'module',
            $slug,
            ($wasEnabled ? 'Switched off' : 'Switched on') . ' the ' . $slug . ' module'
        );
        Flash::success('“' . $module['name'] . '” is now ' . ($wasEnabled ? 'off' : 'on') . '.');
        redirect_to(admin_url('modules'));
    }

    redirect_to(admin_url('modules'));
}

$rows = [];
foreach (Modules::all() as $slug => $module) {
    $module['slug'] = (string) $slug;
    $module['is_enabled'] = $module['errors'] === [] && Modules::isEnabled((string) $slug, $module);
    $module['pages'] = $module['errors'] === [] ? Modules::pageCount($module) : 0;
    $module['errors'] = $module['errors'];
    $module['partials'] = array_values($module['slots']);
    $module['relative'] = [];
    foreach ($module['partials'] as $file) {
        $module['relative'][] = 'modules/' . $slug . '/' . ltrim(str_replace($module['dir'], '', $file), '/');
    }
    $rows[] = $module;
}

$slots = Modules::SLOTS;
$pageTitle = 'Modules';
$title = $pageTitle;
$topbarActions = [];

render('modules', compact('rows', 'slots', 'pageTitle', 'title', 'topbarActions'));

<?php
/**
 * Homepage sections — enable, disable, edit, reorder.
 *
 * A section is a row with a type and a small JSON config. The public homepage
 * renders whatever is enabled, in sort order, so the layout can be rearranged
 * without touching templates.
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
use Omni\Cms;
use Omni\Db;

/** Config fields each section type understands. */
const HOME_TYPES = [
    'hero'          => ['label' => 'Hero', 'fields' => ['eyebrow' => 'Small line above the title', 'title' => 'Headline ({count} is replaced by the calculator total)', 'note' => 'Line under the headline', 'cta_label' => 'Button label', 'cta_url' => 'Button URL']],
    'category_grid' => ['label' => 'Category grid', 'fields' => ['heading' => 'Hidden heading (accessibility)']],
    'popular'       => ['label' => 'Popular calculators', 'fields' => ['limit' => 'How many calculators', 'featured_only' => 'Only featured calculators (1/0)']],
    'latest'        => ['label' => 'Latest calculators', 'fields' => ['limit' => 'How many calculators']],
    'blog'          => ['label' => 'Latest posts', 'fields' => ['limit' => 'How many posts']],
    'search'        => ['label' => 'Search box', 'fields' => ['placeholder' => 'Placeholder text']],
    'rich_text'     => ['label' => 'Rich text', 'fields' => ['html' => 'HTML content']],
    'cta'           => ['label' => 'Call to action', 'fields' => ['html' => 'Text', 'cta_label' => 'Button label', 'cta_url' => 'Button URL']],
    'stats'         => ['label' => 'Statistics strip', 'fields' => ['limit' => 'Unused']],
    'calc_directory' => ['label' => 'All calculators by category', 'fields' => ['per_category' => 'Calculators shown per category (3-12)']],
    'howto'          => ['label' => 'How it works (four panels)', 'fields' => []],
];

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $do = post('do', 'save') ?? 'save';

    if ($do === 'add') {
        $type = post('type', 'rich_text') ?? 'rich_text';
        if (!isset(HOME_TYPES[$type])) {
            Flash::error('Unknown section type.');
            redirect_to(admin_url('homepage'));
        }
        $max = (int) Db::value('SELECT COALESCE(MAX(sort_order), 0) FROM homepage_sections', [], 0);
        $key = $type . '-' . substr(bin2hex(random_bytes(4)), 0, 6);
        Db::insert('homepage_sections', [
            'skey'       => $key,
            'stype'      => $type,
            'title'      => HOME_TYPES[$type]['label'],
            'subtitle'   => '',
            'config'     => json_encode([], JSON_UNESCAPED_SLASHES),
            'sort_order' => $max + 10,
            'enabled'    => 1,
        ]);
        Activity::log('homepage_section_added', 'homepage', $key, 'Added a ' . $type . ' section');
        Flash::success('Section added. Edit it, then move it where you want it.');
        redirect_to(admin_url('homepage'));
    }

    if ($do === 'delete') {
        $id = post_int('id');
        Db::delete('homepage_sections', 'id = ?', [$id]);
        Activity::log('homepage_section_deleted', 'homepage', (string) $id, 'Deleted a homepage section');
        Flash::success('Section removed from the homepage.');
        redirect_to(admin_url('homepage'));
    }

    if ($do === 'move') {
        $id = post_int('id');
        $dir = post('dir', 'up') ?? 'up';
        $rows = Db::all('SELECT id, sort_order FROM homepage_sections ORDER BY sort_order, id');
        $index = null;
        foreach ($rows as $i => $row) {
            if ((int) $row['id'] === $id) {
                $index = $i;
            }
        }
        if ($index !== null) {
            $swap = $dir === 'up' ? $index - 1 : $index + 1;
            if (isset($rows[$swap])) {
                // renumber everything so ordering stays stable
                $order = array_column($rows, 'id');
                [$order[$index], $order[$swap]] = [$order[$swap], $order[$index]];
                foreach ($order as $position => $rowId) {
                    Db::exec('UPDATE homepage_sections SET sort_order = ? WHERE id = ?', [($position + 1) * 10, $rowId]);
                }
                Activity::log('homepage_section_moved', 'homepage', (string) $id, 'Moved a section ' . $dir);
            }
        }
        redirect_to(admin_url('homepage'));
    }

    if ($do === 'toggle') {
        $id = post_int('id');
        Db::exec('UPDATE homepage_sections SET enabled = 1 - enabled WHERE id = ?', [$id]);
        Cms::flush();
        Flash::success('Section visibility changed.');
        redirect_to(admin_url('homepage'));
    }

    if ($do === 'save') {
        $sections = post_deep('sections');
        $saved = 0;
        foreach ($sections as $id => $data) {
            $id = (int) $id;
            if ($id <= 0) {
                continue;
            }
            $row = Db::one('SELECT * FROM homepage_sections WHERE id = ?', [$id]);
            if ($row === null) {
                continue;
            }
            $config = [];
            foreach (HOME_TYPES[(string) $row['stype']]['fields'] ?? [] as $key => $_) {
                $value = trim((string) ($data['config'][$key] ?? ''));
                if ($value !== '') {
                    $config[$key] = $value;
                }
            }
            Db::update('homepage_sections', [
                'title'      => trim((string) ($data['title'] ?? '')),
                'subtitle'   => trim((string) ($data['subtitle'] ?? '')),
                'config'     => json_encode($config, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
                'enabled'    => !empty($data['enabled']) ? 1 : 0,
                'updated_at' => date('Y-m-d H:i:s'),
            ], 'id = :id', [':id' => $id]);
            $saved++;
        }
        Cms::flush();
        Activity::log('homepage_saved', 'homepage', '', 'Saved ' . $saved . ' homepage section(s)');
        Flash::success('Homepage saved. ' . $saved . ' section' . ($saved === 1 ? '' : 's') . ' updated.');
        redirect_to(admin_url('homepage'));
    }
}

$sections = Db::all('SELECT * FROM homepage_sections ORDER BY sort_order, id');
foreach ($sections as &$section) {
    $section['config'] = Cms::decode((string) ($section['config'] ?? ''), []);
}
unset($section);

$pageTitle = 'Homepage';
$title = $pageTitle;
$wide = true;
$topbarActions = [['label' => 'View homepage', 'url' => site_link('/'), 'icon' => 'external']];

render('homepage', compact('sections', 'pageTitle', 'title', 'wide', 'topbarActions'));

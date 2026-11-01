<?php
/**
 * Header & footer builder.
 *
 * One controller for two screens (`navigation` and `footer`) because they share
 * the same table: menu_items with a location. Header items support one level of
 * dropdown (parent_id); footer columns are separate rows with their own links.
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
use Onim\Cms;
use Onim\Db;

$isFooter = ($GLOBALS['page'] ?? '') === 'footer';
$section = $isFooter ? 'footer' : 'header';
/* Where a POST returns to: the page that owns this form, never the menu location. */
$screen = $isFooter ? 'footer' : 'navigation';

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $do = post('do', 'save') ?? 'save';

    $cleanUrl = static function (string $url): string {
        $url = trim($url);
        if ($url === '') {
            return '/';
        }
        if (preg_match('~^(https?:|mailto:|tel:|/)~i', $url) === 1) {
            return mb_substr($url, 0, 255);
        }
        return mb_substr('/' . ltrim($url, '/'), 0, 255);
    };

    if ($do === 'add') {
        $location = post('location', 'header') ?? 'header';
        if (!in_array($location, ['header', 'header_actions', 'footer_column', 'legal', 'mobile'], true)) {
            $location = 'header';
        }
        $columnId = post_int('footer_column_id');
        $max = (int) Db::value('SELECT COALESCE(MAX(sort_order), 0) FROM menu_items WHERE location = ?', [$location], 0);
        Db::insert('menu_items', [
            'location'         => $location,
            'footer_column_id' => $columnId > 0 ? $columnId : null,
            'label'            => post('label', 'New link') ?: 'New link',
            'url'              => $cleanUrl((string) (post('url', '/') ?? '/')),
            'sort_order'       => $max + 10,
            'enabled'          => 1,
        ]);
        Activity::log('menu_item_added', 'menu', $location, 'Added a ' . $location . ' link');
        Flash::success('Link added.');
        redirect_to(admin_url($screen));
    }

    if ($do === 'add_column') {
        $title = trim((string) (post('column_title', '') ?? ''));
        if ($title === '') {
            Flash::error('Give the column a heading.');
            redirect_to(admin_url('footer'));
        }
        $max = (int) Db::value('SELECT COALESCE(MAX(sort_order), 0) FROM footer_columns', [], 0);
        $key = 'col-' . substr(bin2hex(random_bytes(4)), 0, 6);
        Db::insert('footer_columns', ['skey' => $key, 'title' => mb_substr($title, 0, 120), 'sort_order' => $max + 10, 'enabled' => 1]);
        Cms::flush();
        Activity::log('footer_column_added', 'menu', $key, 'Added footer column ' . $title);
        Flash::success('Column added. Now add links to it.');
        redirect_to(admin_url('footer'));
    }

    if ($do === 'save') {
        $items = post_deep('items');
        $saved = 0;
        $touched = 0;
        foreach ($items as $id => $data) {
            $id = (int) $id;
            if ($id <= 0) {
                continue;
            }
            $exists = Db::one('SELECT id FROM menu_items WHERE id = ?', [$id]);
            if ($exists === null) {
                continue;
            }
            $touched++;
            $saved += Db::update('menu_items', [
                'label'      => mb_substr(trim((string) ($data['label'] ?? '')), 0, 120) ?: 'Untitled',
                'url'        => $cleanUrl((string) ($data['url'] ?? '/')),
                'sort_order' => (int) ($data['sort_order'] ?? 0),
                'target'     => ($data['target'] ?? '_self') === '_blank' ? '_blank' : '_self',
                'enabled'    => !empty($data['enabled']) ? 1 : 0,
                'parent_id'  => (int) ($data['parent_id'] ?? 0) ?: null,
                'updated_at' => date('Y-m-d H:i:s'),
            ], 'id = :id', [':id' => $id]);
        }
        // columns, when on the footer screen
        $columns = post_deep('columns');
        foreach ($columns as $id => $data) {
            $id = (int) $id;
            if ($id <= 0) {
                continue;
            }
            Db::update('footer_columns', [
                'title'      => mb_substr(trim((string) ($data['title'] ?? '')), 0, 120) ?: 'Untitled',
                'sort_order' => (int) ($data['sort_order'] ?? 0),
                'enabled'    => !empty($data['enabled']) ? 1 : 0,
            ], 'id = :id', [':id' => $id]);
        }
        Cms::flush();
        Activity::log($section . '_saved', 'menu', $section, 'Saved ' . $touched . ' link(s)');
        Flash::success('Saved ' . $touched . ' link' . ($touched === 1 ? '' : 's') . '.');
        redirect_to(admin_url($screen));
    }

    if ($do === 'delete') {
        $id = post_int('id');
        Db::delete('menu_items', 'parent_id = ? OR id = ?', [$id, $id]);
        Cms::flush();
        Activity::log('menu_item_deleted', 'menu', (string) $id, 'Deleted a menu link');
        Flash::success('Link removed.');
        redirect_to(admin_url($screen));
    }

    if ($do === 'delete_column') {
        $id = post_int('id');
        Db::delete('menu_items', 'footer_column_id = ?', [$id]);
        Db::delete('footer_columns', 'id = ?', [$id]);
        Cms::flush();
        Activity::log('footer_column_deleted', 'menu', (string) $id, 'Deleted a footer column with its links');
        Flash::success('Column and its links removed.');
        redirect_to(admin_url('footer'));
    }

    redirect_to(admin_url($screen));
}

if ($isFooter) {
    $columns = Db::all('SELECT * FROM footer_columns ORDER BY sort_order, id');
    $links = Db::all("SELECT * FROM menu_items WHERE location = 'footer_column' ORDER BY sort_order, id");
    $byColumn = [];
    foreach ($links as $link) {
        $byColumn[(int) $link['footer_column_id']][] = $link;
    }
    $pageTitle = 'Footer';
    $title = $pageTitle;
    $wide = true;
    $topbarActions = [['label' => 'View site', 'url' => site_link('/'), 'icon' => 'external']];
    render('footer', compact('columns', 'byColumn', 'pageTitle', 'title', 'wide', 'topbarActions'));
    exit;
}

$header = Db::all("SELECT * FROM menu_items WHERE location IN ('header','header_actions','mobile','legal') ORDER BY location, sort_order, id");
$grouped = ['header' => [], 'header_actions' => [], 'mobile' => [], 'legal' => []];
foreach ($header as $item) {
    $grouped[(string) $item['location']][] = $item;
}
$parents = array_values(array_filter($grouped['header'], static fn (array $i): bool => (int) ($i['parent_id'] ?? 0) === 0));
$pages = Db::all("SELECT id, title, slug FROM pages WHERE status = 'published' ORDER BY title");

$pageTitle = 'Header & menu';
$title = $pageTitle;
$wide = true;
$topbarActions = [['label' => 'View site', 'url' => site_link('/'), 'icon' => 'external']];

render('navigation', compact('grouped', 'parents', 'pages', 'pageTitle', 'title', 'wide', 'topbarActions'));

<?php
/**
 * Categories — name, description, icon, order, status and SEO for the category
 * landing pages (/math, /finance …), plus the ability to create a new one.
 *
 * Categories are shared with the calculator catalogue: renaming one here changes
 * the heading, cards and breadcrumbs on the public site, but the calculators stay
 * where they are.
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Activity;
use Onim\Admin\Auth;
use Onim\Admin\Csrf;
use Onim\Admin\Flash;
use Onim\Cms;
use Onim\Data;
use Onim\Db;

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $action = post('do', 'save') ?? 'save';

    if ($action === 'delete') {
        $id = post_int('id');
        $slug = (string) Db::value('SELECT slug FROM categories WHERE id = ?', [$id], '');
        $inUse = count(Data::byCategory($slug));
        if ($inUse > 0) {
            Flash::error('“' . $slug . '” still holds ' . $inUse . ' calculators. Move them to another category first.');
        } else {
            Db::delete('categories', 'id = ?', [$id]);
            Cms::flush();
            Activity::log('category_deleted', 'category', (string) $id, 'Deleted category ' . $slug);
            Flash::success('Category deleted.');
        }
        redirect_to(admin_url('categories'));
    }

    $input = [
        'slug'             => Cms::slugify(post('slug', '') ?? ''),
        'name'             => post('name', '') ?? '',
        'title'            => post('title', '') ?? '',
        'description'      => post('description', '') ?? '',
        'icon'             => post('icon', '') ?? '',
        'meta_title'       => post('meta_title', '') ?? '',
        'meta_description' => post('meta_description', '') ?? '',
        'sort_order'       => post_int('sort_order', 0),
        'status'           => post('status', 'published') === 'draft' ? 'draft' : 'published',
        'noindex'          => post_bool('noindex') ? 1 : 0,
        'updated_at'       => date('Y-m-d H:i:s'),
    ];

    $errors = [];
    if ($input['slug'] === '') {
        $errors[] = 'The slug is required.';
    }
    if ($input['name'] === '') {
        $errors[] = 'The name is required.';
    }
    if (in_array($input['slug'], ['admin', 'api', 'assets', 'search', 'blog', 'uploads', 'contact'], true)) {
        $errors[] = 'That slug is used by the site itself.';
    }
    $id = post_int('id');
    $existing = $input['slug'] === '' ? null : Db::one('SELECT id FROM categories WHERE slug = ? AND id <> ?', [$input['slug'], $id]);
    if ($existing !== null) {
        $errors[] = 'Another category already uses that slug.';
    }

    if ($errors !== []) {
        foreach ($errors as $error) {
            Flash::error($error);
        }
        redirect_to(admin_url('categories', $id > 0 ? ['edit' => $id] : []));
    }

    if ($id > 0) {
        Db::update('categories', $input, 'id = :id', [':id' => $id]);
        Activity::log('category_updated', 'category', (string) $id, 'Saved category ' . $input['slug']);
        Flash::success('Category saved.');
    } else {
        $input['created_at'] = date('Y-m-d H:i:s');
        $id = Db::insert('categories', $input);
        Activity::log('category_created', 'category', (string) $id, 'Created category ' . $input['slug']);
        Flash::success('Category created. Add calculators to it by editing them — it stays hidden from the site until it has at least one.');
    }
    Cms::flush();
    redirect_to(admin_url('categories'));
}

$editId = request_int('edit', 0);
$editing = $editId > 0 ? Db::one('SELECT * FROM categories WHERE id = ?', [$editId]) : null;

$rows = [];
$known = [];
foreach (Db::all('SELECT * FROM categories ORDER BY sort_order, name') as $row) {
    $known[(string) $row['slug']] = true;
    $row['count'] = Data::countByCategory((string) $row['slug']);
    $row['managed'] = true;
    $rows[] = $row;
}
// catalogue categories with no row yet (should not happen after seeding, but a
// fresh install with a different data set could)
foreach (Data::categories() as $cat) {
    if (isset($known[(string) $cat['slug']])) {
        continue;
    }
    $rows[] = [
        'id' => 0,
        'slug' => (string) $cat['slug'],
        'name' => (string) $cat['name'],
        'title' => (string) ($cat['title'] ?? ''),
        'description' => (string) ($cat['description'] ?? ''),
        'icon' => (string) ($cat['icon'] ?? ''),
        'meta_title' => '',
        'meta_description' => '',
        'sort_order' => 0,
        'status' => 'published',
        'noindex' => 0,
        'count' => (int) ($cat['count'] ?? 0),
        'managed' => false,
    ];
}
usort($rows, static fn (array $a, array $b): int => ((int) $a['sort_order'] <=> (int) $b['sort_order']) ?: strcasecmp($a['name'], $b['name']));

$pageTitle = 'Categories';
$title = $pageTitle;
$topbarActions = [['label' => 'New category', 'url' => admin_url('categories', ['edit' => 'new']), 'icon' => 'plus', 'class' => 'btn-primary']];

render('categories', compact('rows', 'editing', 'editId', 'pageTitle', 'title', 'topbarActions'));

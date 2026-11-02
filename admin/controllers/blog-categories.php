<?php
/**
 * Blog categories — the taxonomy the blog index filters by.
 *
 * One category per post, ordered by hand, each with a description that becomes
 * the lede of its page at /category/<slug>. Deleting one is deliberately gentle:
 * the posts keep existing and simply lose their filing, which the confirmation
 * says in as many words.
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

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $do = (string) (post('do', 'save') ?? 'save');

    if ($do === 'delete') {
        $id = post_int('id');
        $row = Db::one('SELECT * FROM post_categories WHERE id = ?', [$id]);
        if ($row === null) {
            Flash::error('That category no longer exists.');
            redirect_to(admin_url('blog-categories'));
        }
        $used = (int) Db::value('SELECT COUNT(*) FROM posts WHERE category_id = ?', [$id], 0);
        Db::update('posts', ['category_id' => null], 'category_id = :id', [':id' => $id]);
        Db::delete('post_categories', 'id = ?', [$id]);
        Activity::log('post_category_deleted', 'post_category', (string) $id,
            'Deleted category ' . $row['slug'] . ' (' . $used . ' post(s) unfiled)');
        Flash::success('“' . $row['name'] . '” deleted. ' . ($used > 0
            ? $used . ' post' . ($used === 1 ? ' is' : 's are') . ' now unfiled and still published.'
            : 'No posts were filed under it.'));
        redirect_to(admin_url('blog-categories'));
    }

    $id = post_int('id');
    $name = trim((string) (post('name', '') ?? ''));
    $slug = Cms::slugify((string) (post('slug', '') ?: $name));
    $description = mb_substr(trim((string) (post('description', '') ?? '')), 0, 320);
    $sort = post_int('sort_order');

    if ($name === '' || $slug === '') {
        Flash::error('A category needs a name.');
        redirect_to(admin_url('blog-categories', $id > 0 ? ['edit' => $id] : []));
    }
    if (Db::one('SELECT id FROM post_categories WHERE slug = ? AND id <> ?', [$slug, $id]) !== null) {
        Flash::error('Another category already uses the slug “' . $slug . '”.');
        redirect_to(admin_url('blog-categories', $id > 0 ? ['edit' => $id] : []));
    }
    if ($slug === 'blog' || $slug === 'tag' || $slug === 'category') {
        Flash::error('“' . $slug . '” is a page this site already uses. Pick another slug.');
        redirect_to(admin_url('blog-categories', $id > 0 ? ['edit' => $id] : []));
    }

    $data = [
        'name' => mb_substr($name, 0, 120),
        'slug' => mb_substr($slug, 0, 120),
        'description' => $description,
        'sort_order' => $sort,
    ];
    if ($id > 0) {
        Db::update('post_categories', $data, 'id = :id', [':id' => $id]);
        Activity::log('post_category_saved', 'post_category', (string) $id, 'Saved category ' . $slug);
        Flash::success('Category saved.');
    } else {
        $id = Db::insert('post_categories', $data);
        Activity::log('post_category_created', 'post_category', (string) $id, 'Created category ' . $slug);
        Flash::success('Category created.');
    }
    redirect_to(admin_url('blog-categories', ['edit' => $id]));
}

$categories = Db::all(
    'SELECT c.*, COUNT(p.id) AS posts FROM post_categories c
     LEFT JOIN posts p ON p.category_id = c.id
     GROUP BY c.id ORDER BY c.sort_order, c.name'
);
$editing = request_int('edit', 0) > 0
    ? Db::one('SELECT * FROM post_categories WHERE id = ?', [request_int('edit', 0)])
    : null;
$unfiled = (int) Db::value('SELECT COUNT(*) FROM posts WHERE category_id IS NULL', [], 0);
$pageTitle = 'Blog categories';
$title = $pageTitle;
$wide = true;
$topbarActions = [['label' => 'New post', 'url' => admin_url('blog-edit'), 'icon' => 'plus', 'class' => 'btn-ghost']];
render('blog-categories', compact('categories', 'editing', 'unfiled', 'pageTitle', 'title', 'wide', 'topbarActions'));

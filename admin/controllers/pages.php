<?php
/**
 * Pages — About, Contact, Privacy, Terms, FAQ and anything else.
 *
 * A page lives at /{slug}. The slug is validated against the calculator
 * catalogue, the categories and the site's own routes, so a page can never
 * shadow /math or /search.
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

/** Slugs the router owns. */
function page_reserved(): array
{
    $reserved = ['admin', 'api', 'assets', 'uploads', 'search', 'sitemap.xml', 'robots.txt',
                 'search-index.json', 'blog', 'tag', 'feed', 'index', 'router', 'config'];
    foreach (Data::categories() as $cat) {
        $reserved[] = (string) $cat['slug'];
    }
    return $reserved;
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $do = post('do', 'save') ?? 'save';
    $id = post_int('id');

    if ($do === 'delete') {
        $row = Db::one('SELECT * FROM pages WHERE id = ?', [$id]);
        if ($row !== null) {
            Db::delete('pages', 'id = ?', [$id]);
            Activity::log('page_deleted', 'page', (string) $id, 'Deleted page ' . $row['slug']);
            Flash::success('Page deleted.');
        }
        redirect_to(admin_url('pages'));
    }

    $slug = Cms::slugify(post('slug', '') ?? '');
    $title = trim((string) (post('title', '') ?? ''));
    $errors = [];
    if ($title === '') {
        $errors[] = 'The page needs a title.';
    }
    if ($slug === '') {
        $errors[] = 'The page needs a slug.';
    }
    if (in_array($slug, page_reserved(), true)) {
        $errors[] = '“' . $slug . '” is already used by a category, a system route or a special page.';
    }
    $clash = Db::one('SELECT id, title FROM pages WHERE slug = ? AND id <> ?', [$slug, $id]);
    if ($clash !== null) {
        $errors[] = 'Another page (“' . $clash['title'] . '”) already uses that slug.';
    }
    // a calculator at /{slug} (single segment) cannot exist, but /{cat}/{slug} can
    if (str_contains($slug, '/')) {
        $errors[] = 'The slug cannot contain a slash.';
    }

    if ($errors !== []) {
        foreach ($errors as $error) {
            Flash::error($error);
        }
        redirect_to(admin_url('pages', $id > 0 ? ['edit' => $id] : ['edit' => 'new']));
    }

    $data = [
        'slug'             => $slug,
        'title'            => $title,
        'excerpt'          => mb_substr(trim((string) (post('excerpt', '') ?? '')), 0, 320),
        'content'          => clean_html((string) ($_POST['content'] ?? '')),
        'template'         => in_array(post('template'), ['default', 'contact', 'wide', 'faq'], true) ? (string) post('template') : 'default',
        'status'           => post('status') === 'published' ? 'published' : 'draft',
        'meta_title'       => mb_substr(trim((string) (post('meta_title', '') ?? '')), 0, 190),
        'meta_description' => mb_substr(trim((string) (post('meta_description', '') ?? '')), 0, 320),
        'canonical_url'    => trim((string) (post('canonical_url', '') ?? '')),
        'noindex'          => post_bool('noindex') ? 1 : 0,
        'show_in_header'   => post_bool('show_in_header') ? 1 : 0,
        'show_in_footer'   => post_bool('show_in_footer') ? 1 : 0,
        'author_id'        => Auth::id(),
        'updated_at'       => date('Y-m-d H:i:s'),
    ];

    if ($id > 0) {
        $old = Db::one('SELECT slug FROM pages WHERE id = ?', [$id]);
        Db::update('pages', $data, 'id = :id', [':id' => $id]);
        if ($old !== null && $old['slug'] !== $slug) {
            \Onim\Admin\CalcRepo::upsertRedirect('/' . $old['slug'], '/' . $slug, 301, 'Page slug changed');
        }
        Db::delete('redirects', 'from_path = ?', ['/' . $slug]);
        Activity::log('page_updated', 'page', (string) $id, 'Saved page ' . $slug);
        Flash::success('Page saved.');
    } else {
        $data['created_at'] = date('Y-m-d H:i:s');
        $id = Db::insert('pages', $data);
        Activity::log('page_created', 'page', (string) $id, 'Created page ' . $slug);
        Flash::success('Page created.');
    }

    Cms::flush();
    redirect_to(admin_url('pages', ['edit' => $id]));
}

$editParam = request('edit');
$editing = null;
if ($editParam !== null && $editParam !== 'new') {
    $editing = Db::one('SELECT * FROM pages WHERE id = ?', [(int) $editParam]);
}

$search = (string) (request('q') ?? '');
$sql = 'SELECT p.*, u.name AS author FROM pages p LEFT JOIN users u ON u.id = p.author_id';
$params = [];
if ($search !== '') {
    $sql .= ' WHERE p.title LIKE ? OR p.slug LIKE ?';
    $params = ['%' . $search . '%', '%' . $search . '%'];
}
$sql .= ' ORDER BY p.updated_at DESC';
$rows = Db::all($sql, $params);

$pageTitle = 'Pages';
$title = $pageTitle;
$wide = $editParam !== null;
$topbarActions = [['label' => 'New page', 'url' => admin_url('pages', ['edit' => 'new']), 'icon' => 'plus', 'class' => 'btn-primary']];

render('pages', compact('rows', 'editing', 'search', 'pageTitle', 'title', 'wide', 'topbarActions'));

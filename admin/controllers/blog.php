<?php
/**
 * Blog — posts (draft / scheduled / published / archived), tags, authors.
 *
 * Authors may only touch their own posts: the list is filtered and the editor
 * re-checks ownership on every request, so the permission is enforced by the
 * server rather than by hiding a button.
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
use Onim\Db;

$page = (string) ($GLOBALS['page'] ?? 'blog');
$canManageOthers = in_array(Auth::role(), ['administrator', 'editor'], true);

/* ------------------------------------------------------------------ actions */

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $do = post('do', 'save') ?? 'save';

    if ($do === 'delete') {
        $id = post_int('id');
        $post = Db::one('SELECT * FROM posts WHERE id = ?', [$id]);
        if ($post === null) {
            Flash::error('That post no longer exists.');
        } elseif (!$canManageOthers && (int) $post['author_id'] !== Auth::id()) {
            Flash::error('You can only delete your own posts.');
        } else {
            Db::delete('posts', 'id = ?', [$id]);
            Activity::log('post_deleted', 'post', (string) $id, 'Deleted post ' . $post['slug']);
            Flash::success('Post deleted.');
        }
        redirect_to(admin_url('blog'));
    }

    if ($do === 'tag_save') {
        $id = post_int('id');
        $name = trim((string) (post('name', '') ?? ''));
        $slug = Cms::slugify(post('slug', '') ?: $name);
        if ($name === '' || $slug === '') {
            Flash::error('A tag needs a name.');
            redirect_to(admin_url('tags'));
        }
        $clash = Db::one('SELECT id FROM tags WHERE slug = ? AND id <> ?', [$slug, $id]);
        if ($clash !== null) {
            Flash::error('Another tag already uses that slug.');
            redirect_to(admin_url('tags'));
        }
        $data = ['name' => mb_substr($name, 0, 80), 'slug' => $slug, 'description' => mb_substr(trim((string) (post('description', '') ?? '')), 0, 320)];
        if ($id > 0) {
            Db::update('tags', $data, 'id = :id', [':id' => $id]);
            Flash::success('Tag updated.');
        } else {
            Db::insert('tags', $data);
            Flash::success('Tag created.');
        }
        Activity::log('tag_saved', 'tag', (string) $id, 'Saved tag ' . $slug);
        redirect_to(admin_url('tags'));
    }

    if ($do === 'tag_delete') {
        $id = post_int('id');
        $used = (int) Db::value('SELECT COUNT(*) FROM post_tags WHERE tag_id = ?', [$id], 0);
        Db::delete('tags', 'id = ?', [$id]); // post_tags rows cascade
        Activity::log('tag_deleted', 'tag', (string) $id, 'Deleted a tag used by ' . $used . ' post(s)');
        Flash::success('Tag removed' . ($used > 0 ? ' from ' . $used . ' post(s)' : '') . '. The posts themselves are untouched.');
        redirect_to(admin_url('tags'));
    }

    /* ------------------------------------------------------------ post save */
    $id = post_int('id');
    $existing = $id > 0 ? Db::one('SELECT * FROM posts WHERE id = ?', [$id]) : null;
    if ($existing !== null && !$canManageOthers && (int) $existing['author_id'] !== Auth::id()) {
        Flash::error('You can only edit your own posts.');
        redirect_to(admin_url('blog'));
    }

    $title = trim((string) (post('title', '') ?? ''));
    $slug = Cms::slugify(post('slug', '') ?: $title);
    $errors = [];
    if ($title === '') {
        $errors[] = 'The post needs a title.';
    }
    if ($slug === '') {
        $errors[] = 'The post needs a slug.';
    }
    if (Db::one('SELECT id FROM posts WHERE slug = ? AND id <> ?', [$slug, $id]) !== null) {
        $errors[] = 'Another post already uses that slug.';
    }
    if (Db::one('SELECT id FROM pages WHERE slug = ?', [$slug]) !== null) {
        $errors[] = 'A page already uses that slug.';
    }

    $status = (string) (post('status', 'draft') ?? 'draft');
    if (!in_array($status, ['draft', 'published', 'scheduled', 'archived'], true)) {
        $status = 'draft';
    }
    $publishedRaw = (string) (post('published_at', '') ?? '');
    $publishedAt = $publishedRaw !== '' ? date('Y-m-d H:i:s', strtotime($publishedRaw) ?: time()) : null;
    if ($status === 'published' && $publishedAt === null) {
        $publishedAt = date('Y-m-d H:i:s');
    }
    if ($status === 'scheduled') {
        if ($publishedAt === null || strtotime($publishedAt) <= time()) {
            $errors[] = 'A scheduled post needs a publish time in the future.';
        }
    }
    if ($status === 'published' && $publishedAt !== null && strtotime($publishedAt) > time()) {
        $status = 'scheduled'; // a future date means scheduled, whatever the select said
    }

    $authorId = $canManageOthers ? (post_int('author_id') ?: Auth::id()) : Auth::id();

    if ($errors !== []) {
        foreach ($errors as $error) {
            Flash::error($error);
        }
        redirect_to(admin_url('blog-edit', $id > 0 ? ['id' => $id] : []));
    }

    $data = [
        'slug'             => $slug,
        'title'            => $title,
        'excerpt'          => mb_substr(trim((string) (post('excerpt', '') ?? '')), 0, 400),
        'content'          => clean_html((string) ($_POST['content'] ?? '')),
        'cover_image'      => trim((string) (post('cover_image', '') ?? '')),
        'cover_alt'        => mb_substr(trim((string) (post('cover_alt', '') ?? '')), 0, 255),
        'status'           => $status,
        'published_at'     => $publishedAt,
        'author_id'        => $authorId,
        'meta_title'       => mb_substr(trim((string) (post('meta_title', '') ?? '')), 0, 190),
        'meta_description' => mb_substr(trim((string) (post('meta_description', '') ?? '')), 0, 320),
        'canonical_url'    => trim((string) (post('canonical_url', '') ?? '')),
        'og_title'         => mb_substr(trim((string) (post('og_title', '') ?? '')), 0, 190),
        'og_description'   => mb_substr(trim((string) (post('og_description', '') ?? '')), 0, 320),
        'og_image'         => trim((string) (post('og_image', '') ?? '')),
        'noindex'          => post_bool('noindex') ? 1 : 0,
        'updated_at'       => date('Y-m-d H:i:s'),
    ];

    if ($id > 0) {
        Db::update('posts', $data, 'id = :id', [':id' => $id]);
    } else {
        $data['created_at'] = date('Y-m-d H:i:s');
        $id = Db::insert('posts', $data);
    }

    // tags
    $tagIds = array_map('intval', post_array('tags'));
    Db::delete('post_tags', 'post_id = ?', [$id]);
    foreach (array_unique($tagIds) as $tagId) {
        if ($tagId > 0 && Db::one('SELECT id FROM tags WHERE id = ?', [$tagId]) !== null) {
            Db::insert('post_tags', ['post_id' => $id, 'tag_id' => $tagId]);
        }
    }
    $newTags = trim((string) (post('new_tags', '') ?? ''));
    if ($newTags !== '') {
        foreach (explode(',', $newTags) as $name) {
            $name = trim($name);
            $slug = Cms::slugify($name);
            if ($name === '' || $slug === '') {
                continue;
            }
            $tagId = (int) Db::value('SELECT id FROM tags WHERE slug = ?', [$slug], 0);
            if ($tagId === 0) {
                $tagId = Db::insert('tags', ['slug' => $slug, 'name' => mb_substr($name, 0, 80), 'description' => '']);
            }
            Db::insert('post_tags', ['post_id' => $id, 'tag_id' => $tagId]);
        }
    }

    Activity::log($existing === null ? 'post_created' : 'post_updated', 'post', (string) $id, ucfirst($status) . ' post ' . $slug);
    Flash::success($status === 'scheduled'
        ? 'Post scheduled for ' . date('j M Y H:i', (int) strtotime((string) $publishedAt)) . '.'
        : 'Post saved (' . $status . ').');
    redirect_to(admin_url('blog-edit', ['id' => $id]));
}

/* ------------------------------------------------------------- tag screen */

if ($page === 'tags') {
    $tags = Db::all('SELECT t.*, COUNT(pt.post_id) AS posts FROM tags t LEFT JOIN post_tags pt ON pt.tag_id = t.id GROUP BY t.id ORDER BY t.name');
    $editing = request_int('edit', 0) > 0 ? Db::one('SELECT * FROM tags WHERE id = ?', [request_int('edit', 0)]) : null;
    $pageTitle = 'Tags';
    $title = $pageTitle;
    render('tags', compact('tags', 'editing', 'pageTitle', 'title'));
    exit;
}

/* ------------------------------------------------------------ post editor */

if ($page === 'blog-edit') {
    $id = request_int('id', 0);
    $post = $id > 0 ? Db::one('SELECT * FROM posts WHERE id = ?', [$id]) : null;
    if ($post !== null && !$canManageOthers && (int) $post['author_id'] !== Auth::id()) {
        Flash::error('You can only edit your own posts.');
        redirect_to(admin_url('blog'));
    }
    $form = $post ?? [
        'id' => 0, 'slug' => '', 'title' => '', 'excerpt' => '', 'content' => '', 'cover_image' => '', 'cover_alt' => '',
        'status' => 'draft', 'published_at' => '', 'author_id' => Auth::id(), 'meta_title' => '', 'meta_description' => '',
        'canonical_url' => '', 'og_title' => '', 'og_description' => '', 'og_image' => '', 'noindex' => 0,
    ];
    $form['tags'] = $id > 0 ? array_map(static fn (array $t): int => (int) $t['id'], Cms::postTags($id)) : [];
    $allTags = Db::all('SELECT * FROM tags ORDER BY name');
    $authors = $canManageOthers ? Db::all("SELECT id, name, role FROM users WHERE status = 'active' ORDER BY name") : [];
    $pageTitle = $post === null ? 'New post' : 'Edit post';
    $title = $pageTitle;
    $wide = true;
    $breadcrumbs = [['label' => 'Blog', 'url' => admin_url('blog')], ['label' => $post === null ? 'New post' : str_limit((string) $post['title'], 40)]];
    render('blog-edit', compact('form', 'post', 'allTags', 'authors', 'canManageOthers', 'pageTitle', 'title', 'wide', 'breadcrumbs'));
    exit;
}

/* ---------------------------------------------------------------- list */

$q = (string) (request('q') ?? '');
$status = (string) (request('status') ?? '');
$sql = 'SELECT p.*, u.name AS author, (SELECT COUNT(*) FROM post_tags pt WHERE pt.post_id = p.id) AS tag_count
        FROM posts p LEFT JOIN users u ON u.id = p.author_id WHERE 1 = 1';
$params = [];
if (!$canManageOthers) {
    $sql .= ' AND p.author_id = ?';
    $params[] = Auth::id();
}
if ($q !== '') {
    $sql .= ' AND (p.title LIKE ? OR p.excerpt LIKE ?)';
    $params[] = '%' . $q . '%';
    $params[] = '%' . $q . '%';
}
if ($status !== '') {
    $sql .= ' AND p.status = ?';
    $params[] = $status;
}
$sql .= ' ORDER BY COALESCE(p.published_at, p.updated_at) DESC';
$rows = Db::all($sql, $params);

$counts = [
    'published' => (int) Db::value("SELECT COUNT(*) FROM posts WHERE status = 'published'", [], 0),
    'scheduled' => (int) Db::value("SELECT COUNT(*) FROM posts WHERE status IN ('scheduled','published') AND published_at > NOW()", [], 0),
    'draft'     => (int) Db::value("SELECT COUNT(*) FROM posts WHERE status = 'draft'", [], 0),
];

$pageTitle = 'Blog';
$title = $pageTitle;
$wide = true;
$topbarActions = [['label' => 'New post', 'url' => admin_url('blog-edit'), 'icon' => 'plus', 'class' => 'btn-primary']];

render('blog', compact('rows', 'counts', 'q', 'status', 'pageTitle', 'title', 'wide', 'topbarActions'));

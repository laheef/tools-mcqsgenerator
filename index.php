<?php
/**
 * Front controller.
 *
 * URL map mirrors the reference site:
 *   /                        home
 *   /search?q=               search results
 *   /{category}              category index
 *   /{category}/{slug}       calculator
 *   /sitemap.xml             sitemap
 *   /robots.txt              robots
 *
 * Anything else is a 404 with a real 404 status code and a helpful page.
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';

use Onim\Browse;
use Onim\Contact;
use Onim\Cms;
use Onim\Data;
use Onim\LiveCounts;
use Onim\Db;
use Onim\Seo;
use Onim\View;

$path = View::currentPath();
$segments = array_values(array_filter(explode('/', $path), static fn ($s) => $s !== ''));
$count = count($segments);

/* ------------------------------------------------------------ sitemap/robots */
if ($count === 1 && $segments[0] === 'sitemap.xml') {
    header('Content-Type: application/xml; charset=utf-8');
    echo Seo::sitemap();
    exit;
}
if ($count === 1 && $segments[0] === 'robots.txt') {
    header('Content-Type: text/plain; charset=utf-8');
    echo Seo::robots();
    exit;
}

/* -------------------------------------------------- search index (json) */
if ($count === 1 && $segments[0] === 'search-index.json') {
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-Control: public, max-age=3600');
    echo json_encode(Data::searchIndex(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

/* ------------------------------------------------------- live counters (json) */
/*
 * The numbers in the header, on a category tile and in the page meta are all
 * derived per request, which makes them correct on load. This endpoint makes
 * them correct on a page that is *already open*: the browser asks again after a
 * change (and on focus), and nothing in between may cache the answer.
 */
if ($count === 2 && $segments[0] === 'api' && $segments[1] === 'counts') {
    echo LiveCounts::json();
    exit;
}

/* ------------------------------------------------------------- page views */
/*
 * Real counters, no estimates: one row per path per day, incremented with a
 * single INSERT ... ON DUPLICATE KEY UPDATE. The dashboard reads this table and
 * nothing else, so its numbers are exactly what happened on this install.
 */
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'GET') {
    Cms::trackView($path);
}

/* ---------------------------------------------------------- engagement api */
/*
 * /api/like, /api/review, /api/reviews — real writes, validated on the server.
 * They live under their own prefix so the router never treats "api" as a
 * category slug.
 */
if ($count >= 2 && $segments[0] === 'api') {
    require __DIR__ . '/api.php';
    exit;
}

/* ----------------------------------------------------------- redirects */
/*
 * Some sitemap URLs are historical aliases: the reference site answers them
 * with a 301 to the calculator that replaced them. Reproducing the redirect
 * (instead of serving duplicate content) keeps one canonical URL per page.
 */
$alias = Data::redirectFor($path);
if ($alias !== null && $alias !== $path) {
    http_response_code(301);
    header('Location: ' . rtrim(SITE_URL, '/') . $alias, true, 301);
    exit;
}

/*
 * Redirects an administrator added in the panel (SEO → Redirects) or that the
 * panel created automatically when a slug changed. These are checked before any
 * route so a renamed calculator, page or post keeps its old address working.
 */
$custom = Cms::redirect($path);
if ($custom !== null) {
    $code = (int) ($custom['status_code'] ?? 301);
    if (!in_array($code, [301, 302, 307, 308], true)) {
        $code = 301;
    }
    $target = (string) $custom['to_path'];
    if (preg_match('~^https?://~i', $target) !== 1) {
        $target = rtrim(SITE_URL, '/') . '/' . ltrim($target, '/');
    }
    header('Location: ' . $target, true, $code);
    exit;
}

/* --------------------------------------------------------- view counting */
/*
 * A real counter, not an estimate: one row per path per day in `page_views`,
 * flipped with INSERT … ON DUPLICATE KEY UPDATE. It is what the dashboard's
 * traffic card reads, and it stops at the first visit after an edit so a
 * refresh cannot inflate it into fiction.
 */
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'GET') {
    Cms::trackView($path);
}

/* -------------------------------------------------------------- search */
if ($count === 1 && $segments[0] === 'search') {
    $q = trim((string) ($_GET['q'] ?? ''));
    $results = Data::search($q);
    $title = $q !== '' ? 'Search results for “' . $q . '”' : 'Search calculators';
    $seo = new Seo($title, $q !== ''
        ? 'Calculators matching “' . $q . '” on ' . SITE_NAME . '.'
        : 'Search ' . Data::total() . ' free online calculators.');
    $seo->canonical = SITE_URL . '/search';
    $seo->noindex = true;
    $seo->schema[] = $seo->websiteSchema();

    echo View::page('search', [
        'seo' => $seo,
        'query' => $q,
        'results' => $results,
        'categories' => Data::categories(),
        'navCategories' => Data::categories(),
    ]);
    exit;
}

/* ------------------------------------------------------ all calculators */
/*
 * The one page that lists the whole catalogue rather than one category of it.
 * Filters live in the query string (q, cat, letter, sort, page) so every view of
 * the catalogue is a link that keeps working when it is shared, crawled or opened
 * with JavaScript off; `assets/js/browse.js` only makes the same filters apply
 * without a round trip.
 */
if ($count === 1 && $segments[0] === 'calculators') {
    $params = Browse::params();
    $state = Browse::query($params);
    $filtered = Browse::describe($state);

    $title = 'All calculators';
    if ($state['cat'] !== '') {
        $catRow = Data::category($state['cat']);
        $title = ($catRow['name'] ?? 'All') . ' calculators';
    }
    if ($state['q'] !== '') {
        $title = 'Calculators matching “' . $state['q'] . '”';
    }
    $description = $filtered !== ''
        ? ucfirst($filtered) . ' — ' . $state['total'] . ' of ' . $state['catalogue']
          . ' calculators, with the formula and a worked example on every page.'
        : 'Browse all ' . $state['catalogue'] . ' free calculators by category, letter or name. '
          . 'Every page shows the formula, the units and a worked example.';

    $seo = new Seo($title, $description);
    $seo->canonical = SITE_URL . '/calculators';
    $seo->breadcrumbs = [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'All calculators', 'url' => '/calculators'],
    ];
    // A filtered view is a navigation aid, not a landing page: index the plain
    // catalogue, keep the combinations out of it.
    $seo->noindex = $filtered !== '' || $state['page'] > 1;
    $seo->schema[] = $seo->websiteSchema();
    /* The rows on screen, positioned against the whole catalogue, so a crawler
       reads the page as "part 49–96 of 4,041" instead of as the entire site. */
    $seo->schema[] = $seo->collectionSchema(
        $state['q'] !== '' ? 'Calculators matching “' . $state['q'] . '”' : 'All calculators',
        $description,
        $state['rows'],
        (int) $state['total'],
        ((int) $state['page'] - 1) * Browse::PER_PAGE + 1
    );

    /*
     * `?partial=1` returns the results block on its own, for the scripted
     * filter-as-you-type on that page. It is the same partial the full page
     * renders, so a filtered view can never differ between the two paths.
     */
    if (($_GET['partial'] ?? '') === '1') {
        header('Content-Type: text/html; charset=utf-8');
        header('Cache-Control: no-store');
        $catName = $state['cat'] !== '' ? (Data::category($state['cat'])['name'] ?? '') : '';
        echo View::render('partials/browse-status', ['state' => $state, 'catName' => $catName]);
        echo View::render('partials/browse-results', [
            'state' => $state,
            'params' => $params,
            'categories' => Data::categories(),
            'filtersActive' => $state['q'] !== '' || $state['cat'] !== '' || $state['letter'] !== '',
            'catName' => $catName,
        ]);
        exit;
    }

    echo View::page('all-calculators', [
        'seo' => $seo,
        'state' => $state,
        'params' => $params,
        'letterCounts' => Browse::letterCounts($state['cat']),
        'categories' => Data::categories(),
        'navCategories' => Data::categories(),
        'withBrowseJs' => true,
        'active' => 'calculators',
    ]);
    exit;
}

/* ---------------------------------------------------------------- home */
if ($count === 0) {
    $seo = (new Seo(SITE_NAME, SITE_DESCRIPTION))->setShareCard(null);
    $seo->canonical = SITE_URL . '/';
    $seo->schema[] = $seo->websiteSchema();

    echo View::page('home', [
        'seo' => $seo,
        'categories' => Data::categories(),
        'navCategories' => Data::categories(),
        'featured' => Data::featured(12),
        'total' => Data::total(),
    ]);
    exit;
}

/* ----------------------------------------------------------------- blog */
if ($count === 1 && $segments[0] === 'blog') {
    $perPage = max(3, min(36, (int) (Cms::setting('posts_per_page', '9') ?: 9)));
    $pageNo = max(1, (int) ($_GET['page'] ?? 1));
    $total = Cms::blogCount()['total'];
    $pages = max(1, (int) ceil($total / $perPage));
    $pageNo = min($pageNo, $pages);
    $posts = Cms::posts($perPage, ($pageNo - 1) * $perPage);
    $seo = new Seo('The calculator blog', 'Worked examples and plain-language explanations behind the numbers — written by the people who build the calculators.');
    $seo->canonical = SITE_URL . '/blog' . ($pageNo > 1 ? '?page=' . $pageNo : '');
    $seo->type = 'website';
    $seo->schema[] = $seo->websiteSchema();
    $seo->breadcrumbs = [['name' => 'Home', 'url' => '/'], ['name' => 'Blog', 'url' => '/blog']];
    echo View::page('blog', [
        'seo' => $seo,
        'posts' => $posts,
        'tags' => Cms::tags(),
        'page' => $pageNo,
        'pages' => $pages,
        'activeTag' => '',
        'categories' => Data::categories(),
        'navCategories' => Data::categories(),
    ]);
    exit;
}

if ($count === 2 && $segments[0] === 'blog') {
    $post = Cms::post($segments[1]);
    $isPreview = false;
    if ($post === null && Cms::previewValid('/blog/' . $segments[1], isset($_GET['preview']) ? (string) $_GET['preview'] : null)) {
        $post = Cms::postAny($segments[1]);
        $isPreview = $post !== null;
    }
    if ($isPreview) {
        $post['noindex'] = 1;
    }
    if ($post !== null) {
        Db::exec('UPDATE posts SET views = views + 1 WHERE id = ?', [(int) $post['id']]);
        $tags = Cms::postTags((int) $post['id']);
        $seo = new Seo((string) ($post['meta_title'] !== '' ? $post['meta_title'] : $post['title']),
            (string) ($post['meta_description'] !== '' ? $post['meta_description'] : $post['excerpt']));
        $seo->canonical = (string) ($post['canonical_url'] !== '' ? $post['canonical_url'] : SITE_URL . '/blog/' . $post['slug']);
        $seo->noindex = (int) $post['noindex'] === 1;
        $seo->type = 'article';
        $seo->publishedAt = (string) ($post['published_at'] ?? '');
        $seo->updatedAt = (string) ($post['updated_at'] ?? '');
        $seo->setShareCard(null);
        if ((string) ($post['og_image'] ?? '') !== '') {
            $seo->ogImage = (string) $post['og_image'];
        }
        $seo->breadcrumbs = [
            ['name' => 'Home', 'url' => '/'],
            ['name' => 'Blog', 'url' => '/blog'],
            ['name' => (string) $post['title'], 'url' => '/blog/' . $post['slug']],
        ];
        echo View::page('post', [
            'seo' => $seo,
            'bodyClass' => 'is-post',
            'post' => $post,
            'tags' => $tags,
            'related' => array_values(array_filter(Cms::posts(4), static fn (array $p): bool => (int) $p['id'] !== (int) $post['id'])),
            'categories' => Data::categories(),
            'navCategories' => Data::categories(),
        ]);
        exit;
    }
}

if ($count === 2 && $segments[0] === 'tag') {
    $tagSlug = $segments[1];
    $tag = null;
    foreach (Cms::tags() as $candidate) {
        if ((string) $candidate['slug'] === $tagSlug) {
            $tag = $candidate;
            break;
        }
    }
    if ($tag !== null) {
        $perPage = 12;
        $pageNo = max(1, (int) ($_GET['page'] ?? 1));
        $posts = Cms::posts($perPage, ($pageNo - 1) * $perPage, $tagSlug);
        $seo = new Seo('Posts tagged “' . $tag['name'] . '”', (string) ($tag['description'] ?? ''));
        $seo->canonical = SITE_URL . '/tag/' . $tagSlug;
        $seo->breadcrumbs = [['name' => 'Home', 'url' => '/'], ['name' => 'Blog', 'url' => '/blog'], ['name' => (string) $tag['name'], 'url' => '/tag/' . $tagSlug]];
        echo View::page('blog', [
            'seo' => $seo,
            'posts' => $posts,
            'tags' => Cms::tags(),
            'page' => $pageNo,
            'pages' => max(1, (int) ceil(((int) $tag['post_count']) / $perPage)),
            'activeTag' => $tagSlug,
            'categories' => Data::categories(),
            'navCategories' => Data::categories(),
        ]);
        exit;
    }
}

/* ------------------------------------------------------------ category */
if ($count === 1) {
    $cat = Data::category($segments[0]);
    if ($cat !== null) {
        $rows = Data::byCategory($cat['slug']);
        $seo = (new Seo($cat['title'] ?? ($cat['name'] . ' Calculators'), $cat['description'] ?? ''))
            ->setShareCard((string) ($cat['slug'] ?? $slug));
        $seo->canonical = SITE_URL . '/' . $cat['slug'];
        $seo->breadcrumbs = [
            ['name' => 'Home', 'url' => '/'],
            ['name' => $cat['name'], 'url' => '/' . $cat['slug']],
        ];
        echo View::page('category', [
            'seo' => $seo,
            'category' => $cat,
            'rows' => $rows,
            'categories' => Data::categories(),
            'navCategories' => Data::categories(),
        ]);
        exit;
    }
}

/* ------------------------------------------------------------- CMS page */
/*
 * A single-segment URL that is not a category is a page created in the panel
 * (about, privacy, contact, terms…). The panel refuses slugs that would collide
 * with a category or a system route, so this lookup is unambiguous.
 */
if ($count === 1) {
    $page = Cms::page($segments[0]);
    if ($page !== null) {
        $contactError = '';
        $contactOld = [];
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST' && ($_POST['action'] ?? '') === 'contact') {
            $result = Contact::handle();
            if ($result['ok']) {
                header('Location: ' . rtrim(SITE_URL, '/') . '/' . $page['slug'] . '?sent=1#contact-form', true, 303);
                exit;
            }
            $contactError = $result['error'];
            $contactOld = [
                'name' => (string) ($_POST['name'] ?? ''),
                'email' => (string) ($_POST['email'] ?? ''),
                'subject' => (string) ($_POST['subject'] ?? ''),
                'message' => (string) ($_POST['message'] ?? ''),
            ];
        }
        $title = (string) ($page['meta_title'] !== '' ? $page['meta_title'] : $page['title']);
        $description = (string) ($page['meta_description'] !== '' ? $page['meta_description'] : $page['excerpt']);
        $seo = new Seo($title, $description);
        $seo->canonical = (string) ($page['canonical_url'] !== '' ? $page['canonical_url'] : SITE_URL . '/' . $page['slug']);
        $seo->noindex = (int) $page['noindex'] === 1;
        $seo->breadcrumbs = [['name' => 'Home', 'url' => '/'], ['name' => (string) $page['title'], 'url' => '/' . $page['slug']]];
        echo View::page('page', [
            'seo' => $seo,
            'page' => $page,
            'contactError' => $contactError,
            'contactOld' => $contactOld,
            'categories' => Data::categories(),
            'navCategories' => Data::categories(),
        ]);
        exit;
    }
}

/* ---------------------------------------------------------- calculator */
if ($count === 2) {
    $calc = Data::findByRoute($segments[0], $segments[1]);
    $isPreview = false;
    if ($calc === null && Cms::previewValid('/' . $segments[0] . '/' . $segments[1], isset($_GET['preview']) ? (string) $_GET['preview'] : null)) {
        $previewRow = Data::row('/' . $segments[0] . '/' . $segments[1]);
        if ($previewRow !== null) {
            $calc = Data::calculator((string) $previewRow['path']);
            $isPreview = $calc !== null;
        }
    }
    if ($calc !== null) {
        require __DIR__ . '/templates/calculator.controller.php';
        exit;
    }
}

/* ---------------------------------------------------------------- 404 */
http_response_code(404);
$seo = new Seo('Page not found', 'The page you requested could not be found.');
$seo->canonical = SITE_URL . $path;
$seo->noindex = true;
echo View::page('error', [
    'seo' => $seo,
    'categories' => Data::categories(),
    'navCategories' => Data::categories(),
]);

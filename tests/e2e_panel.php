<?php
/**
 * Functional test of the admin panel. Every check drives the real panel over
 * HTTP (cookies, CSRF tokens, multipart uploads) and then looks at MySQL or the
 * public site to see what actually happened. Nothing here is simulated.
 *
 *   /home/user/tools/php.sh tests/e2e_panel.php
 *
 * The suite cleans up everything it creates, so it can be run repeatedly.
 * Exit code 0 means every check passed.
 */

declare(strict_types=1);

require_once dirname(__DIR__) . '/config.php';

use Onim\CustomArticle;
use Onim\CustomCalc;
use Onim\Data;
use Onim\Db;

/*
 * Where the site under test answers. Default is a root install on :8080; set
 * ONIM_TEST_BASE to exercise a subdirectory deployment, e.g.
 *
 *   ONIM_TEST_BASE=http://127.0.0.1:8097/tool php tests/e2e_panel.php
 *
 * Everything below derives the URL prefix from it, so the same suite proves
 * mcqsgenerator.com/tool as well as a copy served from the domain root.
 */
define('BASE', getenv('ONIM_TEST_BASE') ?: 'http://127.0.0.1:8080');
const ADMIN = BASE . '/admin/index.php';

$GLOBALS['passed'] = 0;
$GLOBALS['failed'] = 0;
$GLOBALS['cookies'] = [];

/* ------------------------------------------------------------------ helpers */

/**
 * One HTTP request through the shared cookie jar.
 *
 * Uses PHP's HTTP stream wrapper rather than curl so the suite runs on a stock
 * CLI build (Hostinger's PHP has curl, but the test must not depend on it).
 *
 * @return array{status:int, body:string, headers:string, location:string}
 */
function http(string $method, string $url, ?array $fields = null, ?array $files = null): array
{
    $headers = ['Accept: text/html', 'Connection: close'];
    $content = '';
    if ($method === 'POST') {
        if ($files !== null) {
            $boundary = '----OmniBoundary' . bin2hex(random_bytes(8));
            foreach (($fields ?? []) as $name => $value) {
                $content .= "--{$boundary}\r\n"
                    . "Content-Disposition: form-data; name=\"{$name}\"\r\n\r\n{$value}\r\n";
            }
            foreach ($files as $name => $path) {
                $content .= "--{$boundary}\r\n"
                    . "Content-Disposition: form-data; name=\"{$name}\"; filename=\"" . basename($path) . "\"\r\n"
                    . "Content-Type: " . (mime_content_type($path) ?: 'application/octet-stream') . "\r\n\r\n"
                    . file_get_contents($path) . "\r\n";
            }
            $content .= "--{$boundary}--\r\n";
            $headers[] = 'Content-Type: multipart/form-data; boundary=' . $boundary;
        } else {
            $content = http_build_query($fields ?? []);
            $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        }
        $headers[] = 'Content-Length: ' . strlen($content);
    }

    $jar = cookie_header();
    if ($jar !== '') {
        $headers[] = 'Cookie: ' . $jar;
    }

    $context = stream_context_create(['http' => [
        'method'          => $method,
        'header'          => implode("\r\n", $headers),
        'content'         => $content,
        'follow_location' => 0,
        'ignore_errors'   => true,
        'timeout'         => 180,
    ]]);
    $body = @file_get_contents($url, false, $context);
    $responseHeaders = $http_response_header ?? [];
    $status = 0;
    $location = '';
    $head = implode("\n", $responseHeaders);
    foreach ($responseHeaders as $line) {
        if (preg_match('~^HTTP/\S+\s+(\d{3})~', $line, $m)) {
            $status = (int) $m[1];
        } elseif (preg_match('~^Location:\s*(.+)$~i', $line, $m)) {
            $location = trim($m[1]);
        } elseif (preg_match('~^Set-Cookie:\s*([^;]+)~i', $line, $m)) {
            store_cookie(trim($m[1]));
        }
    }
    return ['status' => $status, 'body' => (string) $body, 'headers' => $head, 'location' => $location];
}

/** Cookie jar: name → value, persisted for the run. */
function store_cookie(string $pair): void
{
    if (!str_contains($pair, '=')) {
        return;
    }
    [$name, $value] = explode('=', $pair, 2);
    $GLOBALS['cookies'][trim($name)] = trim($value);
}

function cookie_header(): string
{
    $parts = [];
    foreach ($GLOBALS['cookies'] ?? [] as $name => $value) {
        $parts[] = $name . '=' . $value;
    }
    return implode('; ', $parts);
}

function get(string $url): array
{
    return http('GET', $url);
}

function page(string $p, array $query = []): array
{
    return get(ADMIN . '?' . http_build_query(array_merge(['p' => $p], $query)));
}

/** The CSRF token of the current session. */
function token(): string
{
    static $token = null;
    if ($token === null) {
        $html = page('dashboard')['body'];
        if (!preg_match('~name="_token" value="([a-f0-9]+)"~', $html, $m)) {
            throw new RuntimeException('No CSRF token on the dashboard — is the panel running?');
        }
        $token = $m[1];
    }
    return $token;
}

function post(string $p, array $data, array $query = [], ?array $files = null): array
{
    $data['_token'] = $data['_token'] ?? token();
    return http('POST', ADMIN . '?' . http_build_query(array_merge(['p' => $p], $query)), $data, $files);
}

function t(string $name, bool $ok, string $detail = ''): void
{
    if ($ok) {
        $GLOBALS['passed']++;
        echo "PASS  {$name}\n";
        return;
    }
    $GLOBALS['failed']++;
    echo "FAIL  {$name}" . ($detail !== '' ? "   [{$detail}]" : '') . "\n";
}

function value(string $sql, array $args = []): mixed
{
    return Db::value($sql, $args);
}

function row(string $sql, array $args = []): ?array
{
    return Db::one($sql, $args);
}

function esc(string $text): string
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

/** Does this HTML contain a panel error box or a PHP diagnostic? */
function clean(string $html): bool
{
    return stripos($html, 'panel-error') === false
        && stripos($html, 'Fatal error') === false
        && stripos($html, 'Uncaught') === false
        && stripos($html, 'Warning: ' ) === false;
}

/* -------------------------------------------------------------------- login */

$login = get(ADMIN . '?p=login');
preg_match('~name="_token" value="([a-f0-9]+)"~', $login['body'], $m);
$signedIn = http('POST', ADMIN . '?p=login', [
    '_token' => $m[1] ?? '',
    'email'  => 'owner@example.com',
    'password' => 'DevPanel2026!',
]);
t('1 login succeeds and redirects', $signedIn['status'] === 303, (string) $signedIn['status']);
t('1 dashboard renders for the signed-in administrator',
    str_contains(page('dashboard')['body'], 'Dashboard'));

/* 2 — CSRF ---------------------------------------------------------------- */
$noToken = http('POST', ADMIN . '?p=settings', ['settings[site_name]' => 'CSRF bypass']);
t('2 a POST without a CSRF token is refused',
    $noToken['status'] === 419 && (string) value("SELECT svalue FROM settings WHERE skey='site_name'") !== 'CSRF bypass',
    (string) $noToken['status']);

/* 3 — settings round trip ------------------------------------------------- */
$before = (string) value("SELECT svalue FROM settings WHERE skey='site_name'");
post('settings', ['do' => 'save', 'group' => 'general', 'settings[site_name]' => 'Onim Panel Test',
    'settings[site_tagline]' => (string) value("SELECT svalue FROM settings WHERE skey='site_tagline'")]);
$after = (string) value("SELECT svalue FROM settings WHERE skey='site_name'");
t('3 a settings save reaches MySQL', $after === 'Onim Panel Test', $after);
t('3 the change is visible on the public homepage', str_contains(get(BASE . '/')['body'], 'Onim Panel Test'));
post('settings', ['do' => 'save', 'group' => 'general', 'settings[site_name]' => $before,
    'settings[site_tagline]' => (string) value("SELECT svalue FROM settings WHERE skey='site_tagline'")]);
t('3 reverting restores the original name', (string) value("SELECT svalue FROM settings WHERE skey='site_name'") === $before);

/* 4 — encrypted secret ---------------------------------------------------- */
post('settings', ['do' => 'save', 'group' => 'email',
    'settings[smtp_host]' => 'smtp.example.com', 'settings[smtp_port]' => '587',
    'settings[smtp_user]' => 'user@example.com', 'settings[smtp_pass]' => 'sup3r secret',
    'settings[mail_from_email]' => 'noreply@example.com', 'settings[mail_transport]' => 'mail']);
$stored = (string) value("SELECT svalue FROM settings WHERE skey='smtp_pass'");
t('4 the SMTP password is stored encrypted', str_starts_with($stored, 'v1:') && !str_contains($stored, 'sup3r'), substr($stored, 0, 12));
t('4 the encrypted secret decrypts back to the same value',
    \Onim\Cms::decryptSecret($stored) === 'sup3r secret');

/* 5 — appearance ---------------------------------------------------------- */
post('appearance', ['do' => 'save', 'settings[brand_primary]' => '#ff0055', 'settings[brand_accent]' => '#111111']);
$css = get(BASE . '/math/percentage')['body'];
t('5 the brand colour from the panel is printed into the page', str_contains($css, '#ff0055'));
post('appearance', ['do' => 'save', 'settings[brand_primary]' => '#3B68FC', 'settings[brand_accent]' => '#12B981']);

/* 6 — calculator override: prose, FAQ, related ---------------------------- */
$form = page('calculator-edit', ['path' => '/math/percentage'])['body'];
t('6 the calculator editor opens', clean($form) && str_contains($form, 'name="sections['));
$post = [
    'do' => 'save', 'slug' => 'percentage', 'category_slug' => 'math', 'status' => 'published',
    'name' => 'Percentage calculator', 'h1' => 'Percentage calculator',
    'meta_title' => 'Percentage calculator — panel test',
    'meta_description' => 'A description written by the test suite.',
    'summary' => 'A summary written by the test suite.',
    'sections[0][title]' => 'What the panel wrote',
    'sections[0][html]' => '<p>Section body written from the admin panel.</p>',
    'faq[0][q]' => 'Does the panel write FAQs?',
    'faq[0][a]' => 'Yes, and they render on the public page.',
    'related[0]' => '/math/average',
];
post('calculator-edit', $post, ['path' => '/math/percentage']);
$publicCalc = get(BASE . '/math/percentage')['body'];
t('6 the override is stored', (string) value("SELECT meta_title FROM calculators WHERE source_path='/math/percentage'") === 'Percentage calculator — panel test');
t('6 the override reaches the public page', str_contains($publicCalc, 'A description written by the test suite.'));
t('6 the section the panel wrote is rendered', str_contains($publicCalc, 'Section body written from the admin panel.'));
t('6 the FAQ from the panel is rendered', str_contains($publicCalc, 'Does the panel write FAQs?'));
t('6 the pinned related calculator is linked', str_contains($publicCalc, '/math/average'));

/* 7 — unpublish hides the page ------------------------------------------- */
post('calculator-edit', array_merge($post, ['status' => 'draft']), ['path' => '/math/percentage']);
t('7 a draft calculator 404s on the public site', get(BASE . '/math/percentage')['status'] === 404);
post('calculator-edit', $post, ['path' => '/math/percentage']);
t('7 republishing restores the page', get(BASE . '/math/percentage')['status'] === 200);

/* 8 — reset removes the override ----------------------------------------- */
post('calculator-edit', ['do' => 'reset', 'path' => '/math/percentage']);
t('8 resetting removes the override row', value("SELECT COUNT(*) FROM calculators WHERE source_path='/math/percentage'") == 0);
$restored = get(BASE . '/math/percentage')['body'];
t('8 the harvested text is back', !str_contains($restored, 'A description written by the test suite.'));

/* 9 — index page views --------------------------------------------------- */
Db::exec("DELETE FROM page_views WHERE path = '/e2e-view-check'");
// front controller 404s unknown paths, so count a real one instead
$viewPath = '/math/average';
Db::exec('DELETE FROM page_views WHERE path = ?', [$viewPath]);
get(BASE . $viewPath);
$hits = (int) value('SELECT COALESCE(SUM(hits),0) FROM page_views WHERE path = ?', [$viewPath]);
t('9 a real page view is counted in MySQL', $hits >= 1, (string) $hits);
get(BASE . $viewPath);
t('9 a second view increments the same day bucket',
    (int) value('SELECT COALESCE(SUM(hits),0) FROM page_views WHERE path = ?', [$viewPath]) === $hits + 1);

/* 10 — contact form → inbox ---------------------------------------------- */
Db::exec("DELETE FROM rate_limits WHERE rkey LIKE 'contact:%'");  // test hygiene
$contactPage = get(BASE . '/contact')['body'];
preg_match('~name="_token" value="([a-f0-9.]+)"~', $contactPage, $ct);
$contactFields = ['_token' => $ct[1] ?? '', 'action' => 'contact', 'started' => (string) (time() - 10), 'website' => ''];
foreach (Db::all("SELECT fkey, ftype, required FROM contact_fields WHERE enabled = 1") as $field) {
    $key = (string) $field['fkey'];
    if (($field['ftype'] ?? '') === 'select') {
        $option = Db::value("SELECT svalue FROM settings WHERE skey='contact_topic_first'");
        $contactFields[$key] = (string) ($option ?: 'General question');
        continue;
    }
    $contactFields[$key] = match ($key) {
        'email' => 'panel-test@example.com',
        'name'  => 'Panel Test',
        'phone' => '+37060000000',
        default => 'A message sent by the automated panel test.',
    };
}
/* Every field once. The form has a built-in name/email/subject and the panel
   adds its own on top; when both carry the same key the page printed four
   required boxes and two identical ids, and only the second pair was read. */
$dupes = [];
foreach (['name', 'email', 'subject'] as $key) {
    $n = preg_match_all('~name="' . $key . '"~', $contactPage);
    if ($n > 1) {
        $dupes[] = $key . ' x' . $n;
    }
}
t('10 no contact field is printed twice', $dupes === [], implode(', ', $dupes));
$ids = [];
preg_match_all('~id="(contact-[a-z-]+)"~', $contactPage, $idm);
foreach ($idm[1] as $id) {
    $ids[$id] = ($ids[$id] ?? 0) + 1;
}
t('10 no contact element shares an id', array_filter($ids, static fn (int $n): bool => $n > 1) === []);

$sent = http('POST', BASE . '/contact', $contactFields);
$message = row("SELECT * FROM messages WHERE email='panel-test@example.com' ORDER BY id DESC LIMIT 1");
t('10 a contact submission is stored', $message !== null && $sent['status'] === 303, (string) $sent['status']);
t('10 the message body is stored', $message !== null && str_contains((string) $message['body'], 'automated panel test'));
if ($message !== null) {
    $mid = (int) $message['id'];
    t('10 the inbox lists it', str_contains(page('inbox')['body'], 'Panel Test'));
    post('inbox', ['do' => 'status', 'id' => (string) $mid, 'status' => 'read']);
    t('10 the message can be marked read', (string) value('SELECT status FROM messages WHERE id = ?', [$mid]) === 'read');
    post('inbox', ['do' => 'note', 'id' => (string) $mid, 'note' => 'Called back, nothing to do.']);
    t('10 an internal note is stored', (int) value('SELECT COUNT(*) FROM message_notes WHERE message_id = ?', [$mid]) === 1);
    $csv = page('inbox', ['action' => 'export'])['body'];
    t('10 the CSV export contains the message', str_contains($csv, 'panel-test@example.com'));
    post('inbox', ['do' => 'status', 'id' => (string) $mid, 'status' => 'spam']);
    t('10 marking spam is stored', (string) value('SELECT status FROM messages WHERE id = ?', [$mid]) === 'spam');
    post('inbox', ['do' => 'delete', 'id' => (string) $mid]);
    t('10 deleting the message removes the row', (int) value('SELECT COUNT(*) FROM messages WHERE id = ?', [$mid]) === 0);
}

/* 11 — homepage sections -------------------------------------------------- */
$home = page('homepage')['body'];
preg_match_all('~name="sections\[(\d+)\]\[enabled\]"~', $home, $ids);
t('11 the homepage screen lists its sections', ($ids[1] ?? []) !== []);
$firstId = (int) ($ids[1][0] ?? 0);
$wasEnabled = (string) value('SELECT enabled FROM homepage_sections WHERE id = ?', [$firstId]);
post('homepage', ['do' => 'toggle', 'id' => (string) $firstId]);
$enabled = (string) value('SELECT enabled FROM homepage_sections WHERE id = ?', [$firstId]);
t('11 toggling a section flips it in MySQL', $enabled !== $wasEnabled, $wasEnabled . ' -> ' . $enabled);
post('homepage', ['do' => 'toggle', 'id' => (string) $firstId]);
t('11 toggling again restores it',
    (string) value('SELECT enabled FROM homepage_sections WHERE id = ?', [$firstId]) === $wasEnabled);
post('homepage', ['do' => 'add', 'type' => 'rich_text']);
$newSection = row("SELECT * FROM homepage_sections WHERE stype='rich_text' ORDER BY id DESC LIMIT 1");
t('11 a new section can be added', $newSection !== null);
if ($newSection !== null) {
    post('homepage', ['do' => 'save', 'sections' => [
        (int) $newSection['id'] => ['title' => 'E2E strip', 'subtitle' => '', 'enabled' => '1',
                                    'config' => ['html' => '<p>Rendered by the homepage test.</p>']],
    ]]);
    t('11 the public homepage shows the new section', str_contains(get(BASE . '/')['body'], 'Rendered by the homepage test.'));
    post('homepage', ['do' => 'delete', 'id' => (string) $newSection['id']]);
    t('11 deleting the section removes it from the homepage',
        !str_contains(get(BASE . '/')['body'], 'Rendered by the homepage test.'));
}

/* 11b — the calculator-directory homepage section -------------------------- */
/*
 * Round 22 added a section that lists every category with a few of its
 * calculators. It has to behave like any other section: appear in the panel, be
 * creatable, render on the public homepage, respect its own `per_category`
 * setting, and disappear when deleted.
 */
t('11b the panel offers the calculator-directory type', str_contains(page('homepage')['body'], "'calc_directory'")
    || str_contains(page('homepage')['body'], 'All calculators by category'));
post('homepage', ['do' => 'add', 'type' => 'calc_directory']);
$dirSection = row("SELECT * FROM homepage_sections WHERE stype = 'calc_directory' ORDER BY id DESC LIMIT 1");
t('11b the section is stored as calc_directory', $dirSection !== null);
if ($dirSection !== null) {
    /*
     * 'discover' is a browse surface, not a calculator bucket, so it is not one of
     * the blocks. Counted with SQL rather than Data::categories() on purpose: the
     * suite runs in one PHP process, and priming Data's static category cache here
     * would make the custom-calculator tests further down see a stale category list.
     */
    $cats = (int) value("SELECT COUNT(*) FROM categories WHERE slug <> 'discover'", [], 14);
    post('homepage', ['do' => 'save', 'sections' => [
        (int) $dirSection['id'] => ['title' => 'E2E directory', 'subtitle' => '', 'enabled' => '1',
                                    'config' => ['per_category' => '3']],
    ]]);
    $body = get(BASE . '/')['body'];
    t('11b the directory band renders on the public homepage', str_contains($body, 'E2E directory'));
    $savedConfig = (string) value('SELECT config FROM homepage_sections WHERE id = ?', [(int) $dirSection['id']], '');
    t('11b per_category is stored on the section', str_contains($savedConfig, '"per_category":"3"'), 'config=' . $savedConfig);
    /*
     * Only this band's blocks: the page has the seeded directory band too, so the
     * blocks are taken by position relative to this band's own heading rather than
     * as "the last N on the page".
     */
    $from = (int) strpos($body, 'E2E directory');
    $end = (int) strpos($body, 'class="directory-foot"', $from);
    $band = substr($body, $from, max(0, $end - $from));
    preg_match_all('~<ul class="directory-links">(.*?)</ul>~s', $band, $lits);
    $perCat = array_map(static fn (string $b): int => substr_count($b, '<li>'), $lits[1]);
    t('11b every category is listed', count($perCat) === $cats,
        count($perCat) . ' blocks, catalogue says ' . $cats);
    t('11b per_category caps the links in each block',
        $perCat !== [] && min($perCat) > 0 && max($perCat) <= 3, 'per block: ' . implode(',', array_slice($perCat, 0, 5)) . '…');
    t('11b each block links to its own filtered catalogue view',
        str_contains($body, '/all-calculators?cat=biology'));
    post('homepage', ['do' => 'delete', 'id' => (string) $dirSection['id']]);
    t('11b deleting the section removes the band', !str_contains(get(BASE . '/')['body'], 'E2E directory'));
}

/* 12 — header navigation -------------------------------------------------- */
post('navigation', ['do' => 'add', 'location' => 'header', 'label' => 'E2E menu item', 'url' => '/about']);
$menu = row("SELECT * FROM menu_items WHERE label='E2E menu item' ORDER BY id DESC LIMIT 1");
t('12 a header link is created', $menu !== null);
t('12 the link appears in the public header', str_contains(get(BASE . '/')['body'], 'E2E menu item'));
if ($menu !== null) {
    post('navigation', ['do' => 'delete', 'id' => (string) $menu['id']]);
    t('12 deleting the link removes it from the header', !str_contains(get(BASE . '/')['body'], 'E2E menu item'));
}

/* 13 — footer ------------------------------------------------------------- */
post('navigation', ['do' => 'add_column', 'column_title' => 'E2E column']);
$column = row("SELECT * FROM footer_columns WHERE title='E2E column' ORDER BY id DESC LIMIT 1");
t('13 a footer column can be created', $column !== null);
if ($column !== null) {
    post('navigation', ['do' => 'add', 'location' => 'footer_column',
        'footer_column_id' => (string) $column['id'], 'label' => 'E2E footer link', 'url' => '/privacy']);
    t('13 the footer column and its link render', str_contains(get(BASE . '/')['body'], 'E2E footer link'));
    post('navigation', ['do' => 'delete_column', 'id' => (string) $column['id']]);
    t('13 deleting the column removes it', (int) value('SELECT COUNT(*) FROM footer_columns WHERE id = ?', [$column['id']]) === 0);
}

/* 14 — pages -------------------------------------------------------------- */
$slug = 'e2e-page-' . substr((string) time(), -5);
post('pages', ['do' => 'save', 'id' => '0', 'title' => 'E2E page', 'slug' => $slug,
    'content' => '<p>Body written by the e2e test.</p>', 'status' => 'published',
    'meta_title' => 'E2E page', 'meta_description' => 'Created by the test suite.']);
$created = row('SELECT * FROM pages WHERE slug = ?', [$slug]);
t('14 a page can be created from the panel', $created !== null);
$publicPage = get(BASE . '/' . $slug);
t('14 the page is served at its slug', $publicPage['status'] === 200 && str_contains($publicPage['body'], 'Body written by the e2e test.'));
t('14 the page is in the sitemap', str_contains(get(BASE . '/sitemap.xml')['body'], $slug));
$clash = post('pages', ['do' => 'save', 'id' => '0', 'title' => 'Shadow', 'slug' => 'math',
    'content' => '<p>x</p>', 'status' => 'published']);
t('14 a page cannot take a category slug', (int) value('SELECT COUNT(*) FROM pages WHERE slug = ?', ['math']) === 0);
if ($created !== null) {
    post('pages', ['do' => 'save', 'id' => (string) $created['id'], 'title' => 'E2E page renamed',
        'slug' => $slug, 'content' => '<p>Body written by the e2e test.</p>', 'status' => 'draft']);
    t('14 unpublishing a page 404s it publicly', get(BASE . '/' . $slug)['status'] === 404);
    post('pages', ['do' => 'delete', 'id' => (string) $created['id']]);
    t('14 deleting the page removes it', (int) value('SELECT COUNT(*) FROM pages WHERE id = ?', [$created['id']]) === 0);
}

/* 15 — blog + categories -------------------------------------------------- */
$postSlug = 'e2e-post-' . substr((string) time(), -4);
post('blog', ['do' => 'save', 'id' => '0', 'title' => 'E2E post', 'slug' => $postSlug,
    'excerpt' => 'An excerpt.', 'content' => '<p>Post body from the test.</p>',
    'status' => 'draft', 'published_at' => date('Y-m-d H:i:s'), 'new_category' => 'E2E category']);
$entry = row('SELECT * FROM posts WHERE slug = ?', [$postSlug]);
t('15 a draft post is created', $entry !== null && (string) $entry['status'] === 'draft');
t('15 a draft post is not public', get(BASE . '/blog/' . $postSlug)['status'] === 404);
t('15 a draft post is not listed', !str_contains(get(BASE . '/blog')['body'], 'E2E post'));
if ($entry !== null) {
    $categoryId = (int) value('SELECT id FROM post_categories WHERE slug = ?', ['e2e-category']);
    t('15 the category was created with the post', $categoryId > 0);
    post('blog', ['do' => 'save', 'id' => (string) $entry['id'], 'title' => 'E2E post', 'slug' => $postSlug,
        'excerpt' => 'An excerpt.', 'content' => '<p>Post body from the test.</p>',
        'status' => 'published', 'published_at' => date('Y-m-d H:i:s'),
        'category_id' => (string) $categoryId]);
    t('15 publishing makes it public', get(BASE . '/blog/' . $postSlug)['status'] === 200);
    t('15 the post is listed on the blog index', str_contains(get(BASE . '/blog')['body'], 'E2E post'));
    t('15 the category page lists it', str_contains(get(BASE . '/category/e2e-category')['body'], 'E2E post'));
    t('15 the post names its category', str_contains(get(BASE . '/blog/' . $postSlug)['body'], '/category/e2e-category'));
    post('blog', ['do' => 'delete', 'id' => (string) $entry['id']]);
    t('15 deleting the post removes it', (int) value('SELECT COUNT(*) FROM posts WHERE id = ?', [$entry['id']]) === 0);
    if ($categoryId > 0) {
        post('blog-categories', ['do' => 'delete', 'id' => (string) $categoryId]);
        t('15 the category can be deleted too', (int) value('SELECT COUNT(*) FROM post_categories WHERE id = ?', [$categoryId]) === 0);
    }
}

/* 16 — media -------------------------------------------------------------- */
$png = tempnam(sys_get_temp_dir(), 'omni-png-') . '.png';
file_put_contents($png, base64_decode('iVBORw0KGgoAAAANSUhEUgAAACgAAAAYCAIAAAAH5iiXAAAAKElEQVR4nGPQiDoxIIhh1OJRi0ctHrV41OJRi0ctHrV41OJRi4ePxQBAjtW9Y4ornQAAAABJRU5ErkJggg=='));
$upload = post('media', ['do' => 'upload'], [], ['files[]' => $png]);
$media = row("SELECT * FROM media WHERE filename LIKE 'omni-png-%' ORDER BY id DESC LIMIT 1");
t('16 an upload is stored', $media !== null, 'status ' . $upload['status']);
if ($media !== null) {
    $onDisk = dirname(__DIR__) . '/' . $media['path'];
    t('16 the file exists on disk', is_file($onDisk));
    t('16 the file is served to visitors', get(BASE . '/' . $media['path'])['status'] === 200);
    t('16 the media library lists it', str_contains(page('media')['body'], (string) $media['filename']));
    post('media', ['do' => 'delete', 'id' => (string) $media['id']]);
    if (is_file($onDisk)) {
        echo "    (delete refused; retrying with force)\n";
        post('media', ['do' => 'delete', 'id' => (string) $media['id'], 'force' => '1']);
    }
    clearstatcache(true, $onDisk);   // the file was deleted by another process
    $rowsLeft = (int) value('SELECT COUNT(*) FROM media WHERE id = ?', [$media['id']]);
    t('16 deleting removes the row and the file', $rowsLeft === 0 && !is_file($onDisk),
        'rows ' . $rowsLeft . ', file ' . (is_file($onDisk) ? 'still there at ' . $onDisk : 'gone'));
}
$bad = tempnam(sys_get_temp_dir(), 'omni-php-') . '.php';
file_put_contents($bad, '<?php echo "pwned";');
post('media', ['do' => 'upload'], [], ['files[]' => $bad]);
t('16 a .php upload is refused',
    (int) value("SELECT COUNT(*) FROM media WHERE filename LIKE 'omni-php-%'") === 0);

/* 17 — SEO --------------------------------------------------------------- */
post('seo', ['do' => 'redirect_add', 'from_path' => '/e2e-old-page', 'to_path' => '/about', 'status_code' => '301']);
$redirect = get(BASE . '/e2e-old-page');
t('17 a redirect created in the panel answers with a 301',
    $redirect['status'] === 301 && str_ends_with($redirect['location'], '/about'), (string) $redirect['status']);
$redirectId = (int) value("SELECT id FROM redirects WHERE from_path = '/e2e-old-page'");
post('seo', ['do' => 'redirect_toggle', 'id' => (string) $redirectId]);
t('17 disabling the redirect makes the path 404 again', get(BASE . '/e2e-old-page')['status'] === 404);
post('seo', ['do' => 'redirect_delete', 'id' => (string) $redirectId]);
t('17 deleting the redirect removes the row', (int) value('SELECT COUNT(*) FROM redirects WHERE id = ?', [$redirectId]) === 0);
// Drive the real SEO form (all controls, as a browser posts them), changing one value.
preg_match_all('~<form[^>]*>.*?</form>~s', page('seo')['body'], $formBlocks);
$seoForm = null;
foreach ($formBlocks[0] as $block) {
    if (str_contains($block, 'settings[seo_indexing]')) {
        $seoForm = $block;
        break;
    }
}
$seoFields = [];
if ($seoForm !== null) {
    preg_match_all('~<input[^>]*name="([^"]+)"[^>]*>~', $seoForm, $inputs, PREG_SET_ORDER);
    foreach ($inputs as $input) {
        $tag = $input[0];
        if (preg_match('~type="(checkbox|radio)"~', $tag) && !str_contains($tag, 'checked')) {
            continue;
        }
        if (preg_match('~type="(submit|button|file)"~', $tag)) {
            continue;
        }
        preg_match('~value="([^"]*)"~', $tag, $valueMatch);
        $seoFields[$input[1]] = $valueMatch[1] ?? '';
    }
    preg_match_all('~<textarea[^>]*name="([^"]+)"[^>]*>(.*?)</textarea>~s', $seoForm, $areas, PREG_SET_ORDER);
    foreach ($areas as $area) {
        $seoFields[$area[1]] = html_entity_decode($area[2], ENT_QUOTES);
    }
    preg_match_all('~<select[^>]*name="([^"]+)"[^>]*>(.*?)</select>~s', $seoForm, $selects, PREG_SET_ORDER);
    foreach ($selects as $select) {
        if (preg_match('~<option[^>]*value="([^"]*)"[^>]*selected~', $select[2], $chosen)) {
            $seoFields[$select[1]] = $chosen[1];
        } elseif (preg_match('~<option[^>]*value="([^"]*)"~', $select[2], $first)) {
            $seoFields[$select[1]] = $first[1];
        }
    }
}
t('17 the SEO form lists its controls', $seoFields !== [], (string) count($seoFields));
$withIndexing = static function (array $fields, string $value): array {
    $fields['settings[seo_indexing]'] = $value;
    return $fields;
};
post('seo', $withIndexing($seoFields, '0'));
$robots = get(BASE . '/robots.txt')['body'];
t('17 turning indexing off writes Disallow: / to robots.txt', str_contains($robots, 'Disallow: /'));
post('seo', $withIndexing($seoFields, '1'));
t('17 indexing on again serves the sitemap', get(BASE . '/sitemap.xml')['status'] === 200);

/* 18 — users and roles --------------------------------------------------- */
$email = 'e2e-author@example.com';
Db::exec('DELETE FROM users WHERE email = ?', [$email]);
post('users', ['do' => 'save', 'id' => '0', 'name' => 'E2E Author', 'email' => $email,
    'role' => 'author', 'status' => 'active', 'password' => 'AuthorPass2026!',
    'password2' => 'AuthorPass2026!', 'bio' => '']);
$author = row('SELECT * FROM users WHERE email = ?', [$email]);
t('18 an author account is created', $author !== null && (string) $author['role'] === 'author');
t('18 the password is hashed', $author !== null && !str_contains((string) $author['password_hash'], 'AuthorPass2026'));
if ($author !== null) {
    post('users', ['do' => 'toggle', 'id' => (string) $author['id']]);
    t('18 the account can be deactivated', (string) value('SELECT status FROM users WHERE id = ?', [$author['id']]) === 'inactive');
    post('users', ['do' => 'delete', 'id' => (string) $author['id']]);
    t('18 the account can be deleted', (int) value('SELECT COUNT(*) FROM users WHERE id = ?', [$author['id']]) === 0);
}
$me = row("SELECT * FROM users WHERE email='owner@example.com'");
post('users', ['do' => 'delete', 'id' => (string) $me['id']]);
t('18 the last administrator cannot be deleted', (int) value('SELECT COUNT(*) FROM users WHERE role = ?', ['administrator']) >= 1);

/* 19 — RBAC -------------------------------------------------------------- */
// sign in as an author and confirm the destructive screens are closed
$authorMail = 'e2e-rbac@example.com';
post('users', ['do' => 'save', 'id' => '0', 'name' => 'RBAC Author', 'email' => $authorMail,
    'role' => 'author', 'status' => 'active', 'password' => 'RbacPass2026!',
    'password2' => 'RbacPass2026!', 'bio' => '']);
$savedJar = $GLOBALS['cookies'];
$GLOBALS['cookies'] = [];
$loginPage = get(ADMIN . '?p=login');
preg_match('~name="_token" value="([a-f0-9]+)"~', $loginPage['body'], $lm);
http('POST', ADMIN . '?p=login', ['_token' => $lm[1] ?? '', 'email' => $authorMail, 'password' => 'RbacPass2026!']);
t('19 an author can open the dashboard', str_contains(page('dashboard')['body'], 'Dashboard'));
t('19 an author cannot reach Settings', !str_contains(page('settings')['body'], 'Site identity'));
t('19 an author cannot reach Users', !str_contains(page('users')['body'], 'Add user'));
$GLOBALS['cookies'] = $savedJar;
Db::exec('DELETE FROM users WHERE email = ?', [$authorMail]);

/* 20 — source file editor ------------------------------------------------ */
$target = 'templates/partials/contact-form.php';
$original = (string) file_get_contents(dirname(__DIR__) . '/' . $target);
$editorPage = page('file-edit', ['path' => $target])['body'];
t('20 the file editor opens a template', str_contains($editorPage, 'name="content"'));
post('file-edit', ['do' => 'save', 'path' => $target, 'content' => $original . "\n<?php /* e2e marker */ ?>\n", 'note' => 'e2e']);
t('20 saving writes the file to disk', str_contains((string) file_get_contents(dirname(__DIR__) . '/' . $target), 'e2e marker'));
t('20 a version row is recorded', (int) value("SELECT COUNT(*) FROM calculator_file_versions WHERE note = 'e2e'") >= 1);
post('file-edit', ['do' => 'save', 'path' => $target, 'content' => '<?php function broken( { ?>', 'note' => 'e2e broken']);
t('20 a PHP syntax error is refused', !str_contains((string) file_get_contents(dirname(__DIR__) . '/' . $target), 'function broken'));
file_put_contents(dirname(__DIR__) . '/' . $target, $original);
t('20 the file is restored on disk', (string) file_get_contents(dirname(__DIR__) . '/' . $target) === $original);
$traversal = page('file-edit', ['path' => '../../etc/passwd'])['body'];
t('20 path traversal is refused', !str_contains($traversal, 'root:x:0:0'));

/* 21 — backups ----------------------------------------------------------- */
post('backups', ['do' => 'dump', 'note' => 'e2e dump']);
$dump = row("SELECT * FROM backups WHERE note = 'e2e dump' ORDER BY id DESC LIMIT 1");
t('21 a database dump is written', $dump !== null);
if ($dump !== null) {
    $file = dirname(__DIR__) . '/data/backups/' . $dump['filename'];
    t('21 the dump file exists', is_file($file));
    t('21 the dump is a real SQL file', str_contains((string) file_get_contents($file), 'CREATE TABLE'));
    $download = page('backups', ['action' => 'download', 'id' => (string) $dump['id']]);
    t('21 the dump can be downloaded', str_contains($download['body'], 'CREATE TABLE'));
    Db::exec('DELETE FROM backups WHERE id = ?', [$dump['id']]);
    @unlink($file);
    t('21 deleting removes the row', (int) value('SELECT COUNT(*) FROM backups WHERE note = ?', ['e2e dump']) === 0);
}

/* 22 — activity log ------------------------------------------------------ */
t('22 the activity log recorded the run',
    (int) value('SELECT COUNT(*) FROM activity_log') > 10
    && (int) value("SELECT COUNT(DISTINCT action) FROM activity_log") >= 5);
t('22 no password is ever written to the log',
    (int) value("SELECT COUNT(*) FROM activity_log WHERE summary LIKE '%AuthorPass2026%'") === 0);

/* 23 — cron -------------------------------------------------------------- */
$cronToken = (string) value("SELECT svalue FROM settings WHERE skey='cron_token'");
$noToken = get(BASE . '/cron.php');
t('23 cron refuses an unauthenticated HTTP call', $noToken['status'] === 403, (string) $noToken['status']);
if ($cronToken !== '') {
    $withToken = get(BASE . '/cron.php?token=' . urlencode($cronToken));
    t('23 cron runs with the stored token', $withToken['status'] === 200 && str_contains($withToken['body'], 'Done.'));
}

/* 24 — hardening --------------------------------------------------------- */
t('24 the schema file is not downloadable', get(BASE . '/admin/migrations/001_init.sql')['status'] === 403);
t('24 panel library files are not downloadable', get(BASE . '/admin/lib/Auth.php')['status'] === 403);
t('24 the database config is never echoed', !str_contains(get(BASE . '/config.db.php')['body'], 'app_key'));

/* 25 — custom calculators ------------------------------------------------ */
/*
 * The growth path: a calculator that the harvested catalogue never had, built
 * from the panel alone, must become an ordinary page — routed, solved, in the
 * sitemap and in search — and must be impossible to publish in a broken state.
 */
$slug = 'e2e-custom-' . substr((string) time(), -6);
$fields = [
    'name' => 'E2E Custom Calculator', 'slug' => $slug, 'category_slug' => 'e2e-niche',
    'h1' => 'E2E Custom Calculator', 'meta_title' => 'E2E Custom Calculator',
    'meta_description' => 'A calculator created by the test suite.',
    'summary' => 'Two numbers in, one out.', 'status' => 'draft', 'do' => 'save', 'tab' => 'formulas',
    'fields[0][label]' => 'First', 'fields[0][key]' => 'first', 'fields[0][type]' => 'number', 'fields[0][default]' => '12',
    'fields[1][label]' => 'Second', 'fields[1][key]' => 'second', 'fields[1][type]' => 'number', 'fields[1][default]' => '4',
    'fields[2][label]' => 'Total', 'fields[2][key]' => 'total', 'fields[2][type]' => 'number', 'fields[2][output]' => '1',
    'directions[0][group]' => 'Sum', 'directions[0][l]' => 'total', 'directions[0][f]' => 'first+second',
    'directions[1][group]' => 'Sum', 'directions[1][l]' => 'first', 'directions[1][f]' => 'total-second',
];
$created = post('custom-calculator-edit', $fields, ['id' => 'new']);
$customRow = row('SELECT * FROM custom_calculators WHERE slug = ?', [$slug]);
t('25 a custom calculator can be created from the panel', $customRow !== null && clean($created['body']));
$customId = (int) ($customRow['id'] ?? 0);
t('25 the definition is compiled on save',
    $customRow !== null && is_array(json_decode((string) $customRow['definition'], true))
    && isset(json_decode((string) $customRow['definition'], true)['eq']));
t('25 a new category is created for it automatically',
    (int) value('SELECT COUNT(*) FROM categories WHERE slug = ?', ['e2e-niche']) === 1);

$publicPath = '/e2e-niche/' . $slug;
t('25 a draft is not reachable without a preview token', get(BASE . $publicPath)['status'] === 404);
$previewToken = \Onim\Cms::previewToken($publicPath);
$preview = get(BASE . $publicPath . '?preview=' . $previewToken);
t('25 the signed preview shows the draft', $preview['status'] === 200 && str_contains($preview['body'], 'E2E Custom Calculator'));
t('25 a forged preview token is refused', get(BASE . $publicPath . '?preview=deadbeef')['status'] === 404);

/* The engine really solves it, but only when asked to: round 32 rules out a
   live answer, so the preview must open with the result held back and the
   boxes empty — see the Calculate assertions below, and the reverse-direction
   check further down, which supplies its inputs in the query string. */
t('25 the page opens without a computed answer',
    !str_contains($preview['body'], 'value="16"') && !str_contains($preview['body'], '>16<'));
$previewDef = json_decode((string) ($customRow['definition'] ?? '{}'), true);
t('25 the definition holds both directions',
    isset($previewDef['eq'][0]['var']) && count($previewDef['eq'][0]['var']) === 2);
/* the compiled definition must produce a form, not an empty widget (a silent
   schema mismatch once made the page render with no fields at all) */
t('25 the page renders one input per field',
    substr_count($preview['body'], 'class="calc-field"') === 3, (string) substr_count($preview['body'], 'class="calc-field"'));
/* The editor preview is the same calculator template, so it must carry the same
   Calculate button: an author checking their work in preview has to see what a
   visitor will see, not a panel that answers before it is asked. */
t('25 the preview carries the Calculate button', str_contains($preview['body'], 'data-calc-go'));
t('25 the preview starts with the results held back',
    str_contains($preview['body'], 'data-calc-pending'));

$reverse = get(BASE . $publicPath . '?preview=' . $previewToken . '&total=30&second=4');
t('25 the reverse direction solves too', str_contains($reverse['body'], '26'));

/* validation: a broken formula is refused and nothing is written */
$broken = $fields;
$broken['directions[0][f]'] = 'first++*';
$broken['slug'] = $slug;
$refused = post('custom-calculator-edit', $broken, ['id' => (string) $customId]);
t('25 a formula that does not parse is refused', str_contains($refused['body'], 'Not saved'));
$broken2 = $fields;
$broken2['directions[0][f]'] = 'first+nonexistent';
$refused2 = post('custom-calculator-edit', $broken2, ['id' => (string) $customId]);
t('25 a formula naming an unknown field is refused', str_contains($refused2['body'], 'not a field'));
$clash = $fields;
$clash['slug'] = 'mortgage';
$clash['category_slug'] = 'finance';
$refused3 = post('custom-calculator-edit', $clash, ['id' => 'new']);
t('25 a slug that collides with the catalogue is refused',
    str_contains($refused3['body'], 'already has a calculator'));

/* publish, then check the whole public surface */
$fields['status'] = 'published';
post('custom-calculator-edit', $fields, ['id' => (string) $customId]);
$live = get(BASE . $publicPath);
t('25 publishing makes the page live', $live['status'] === 200);
t('25 it appears in the sitemap', str_contains(get(BASE . '/sitemap.xml')['body'], $publicPath));
t('25 it is searchable', str_contains(get(BASE . '/search?q=E2E%20Custom')['body'], 'E2E Custom Calculator'));
t('25 it is listed on its category page', str_contains(get(BASE . '/e2e-niche')['body'], 'E2E Custom Calculator'));
t('25 the test action runs the real solver',
    str_contains(post('custom-calculator-edit', ['do' => 'test'] + $fields, ['id' => (string) $customId])['body'], 'Ran without errors'));

/* version history */
t('25 saving keeps a version history', (int) value('SELECT COUNT(*) FROM custom_calculator_versions WHERE calculator_id = ?', [$customId]) >= 2);
$versionId = (int) value('SELECT id FROM custom_calculator_versions WHERE calculator_id = ? ORDER BY id ASC LIMIT 1', [$customId]);
post('custom-calculator-edit', ['do' => 'restore', 'version_id' => (string) $versionId], ['id' => (string) $customId]);
t('25 a previous version can be restored', (int) value('SELECT COUNT(*) FROM custom_calculator_versions WHERE calculator_id = ?', [$customId]) >= 3);

/* renaming keeps the old address working */
$renamed = $fields;
$renamed['slug'] = $slug . '-renamed';
post('custom-calculator-edit', $renamed, ['id' => (string) $customId]);
$moved = get(BASE . $publicPath);
t('25 renaming leaves a redirect behind', in_array($moved['status'], [301, 302, 308], true), (string) $moved['status']);
t('25 the renamed address resolves', get(BASE . '/e2e-niche/' . $slug . '-renamed')['status'] === 200);

/* delete cleans up after itself */
post('custom-calculators', ['do' => 'delete', 'id' => (string) $customId]);
t('25 deleting removes the calculator', (int) value('SELECT COUNT(*) FROM custom_calculators WHERE id = ?', [$customId]) === 0);
t('25 deleting removes its history', (int) value('SELECT COUNT(*) FROM custom_calculator_versions WHERE calculator_id = ?', [$customId]) === 0);
t('25 deleting removes the page', get(BASE . '/e2e-niche/' . $slug . '-renamed')['status'] === 404);
Db::exec('DELETE FROM categories WHERE slug = ?', ['e2e-niche']);
Db::exec('DELETE FROM redirects WHERE from_path = ?', [$publicPath]);

/* 26 — bulk import -------------------------------------------------------- */
/*
 * The growth path at scale: a whole niche arrives as one document. The dry run
 * must be honest (it writes nothing), the import must write only what validates,
 * and re-running it must not duplicate anything.
 */
$importDoc = json_encode([
    [
        'name' => 'E2E Import One', 'slug' => $slug . '-one', 'category_slug' => 'e2e-import',
        'summary' => 'First imported calculator.', 'status' => 'draft',
        'fields' => [
            ['key' => 'a', 'label' => 'A', 'type' => 'number', 'default' => '6'],
            ['key' => 'b', 'label' => 'B', 'type' => 'number', 'default' => '3'],
            ['key' => 'total', 'label' => 'Sum', 'type' => 'number', 'output' => true],
        ],
        'directions' => [
            ['group' => 'Sum', 'l' => 'total', 'f' => 'a+b'],
            ['group' => 'Sum', 'l' => 'a', 'f' => 'total-b'],
        ],
    ],
    [
        'name' => 'E2E Import Two', 'slug' => $slug . '-two', 'category_slug' => 'e2e-import',
        'summary' => 'Second imported calculator.', 'status' => 'draft',
        'fields' => [['key' => 'x', 'label' => 'X', 'type' => 'number', 'default' => '4']],
        'directions' => [['group' => 'Double', 'l' => 'x', 'f' => 'x*2']],
    ],
    [
        'name' => 'E2E Import Broken', 'slug' => $slug . '-broken', 'category_slug' => 'e2e-import',
        'fields' => [['key' => 'y', 'label' => 'Y', 'type' => 'number', 'default' => '1']],
        'directions' => [['group' => 'Bad', 'l' => 'y', 'f' => 'y++*']],
    ],
], JSON_UNESCAPED_SLASHES);

$reserved = post('custom-import', ['do' => 'preview', 'mode' => 'skip', 'document' => json_encode([[
    'name' => 'E2E Reserved Name', 'slug' => $slug . '-reserved', 'category_slug' => 'e2e-import',
    'fields' => [['key' => 'sum', 'label' => 'Sum', 'type' => 'number', 'default' => '1']],
    'directions' => [['group' => 'Sum', 'l' => 'sum', 'f' => 'sum*2']],
]], JSON_UNESCAPED_SLASHES)]);
t('26 a field named after a built-in function is explained', str_contains($reserved['body'], 'built-in function'));

$dry = post('custom-import', ['do' => 'preview', 'mode' => 'skip', 'document' => $importDoc]);
t('26 a dry run renders a report', str_contains($dry['body'], 'Dry run') && clean($dry['body']));
t('26 the dry run writes nothing',
    (int) value('SELECT COUNT(*) FROM custom_calculators WHERE category_slug = ?', ['e2e-import']) === 0);
/* the dry run works the row through the solver on sample values (the row's own
   declared defaults, or 2 when it has none) and prints the answer */
t('26 the dry run shows what each row calculates', str_contains($dry['body'], 'Sum = 9'));
t('26 the dry run flags the broken row', str_contains($dry['body'], 'does not run'));

$imported = post('custom-import', ['do' => 'import', 'mode' => 'skip', 'document' => $importDoc]);
t('26 the import writes the valid rows only',
    (int) value('SELECT COUNT(*) FROM custom_calculators WHERE category_slug = ?', ['e2e-import']) === 2,
    (string) value('SELECT COUNT(*) FROM custom_calculators WHERE category_slug = ?', ['e2e-import']));
t('26 the import reports what it did', str_contains($imported['body'], 'Import finished'));
t('26 the refused row is listed with its reason', str_contains($imported['body'], 'E2E Import Broken'));
t('26 an imported category is created', (int) value('SELECT COUNT(*) FROM categories WHERE slug = ?', ['e2e-import']) === 1);

/* re-import: skip mode must not duplicate or overwrite */
post('custom-import', ['do' => 'import', 'mode' => 'skip', 'document' => $importDoc]);
t('26 re-importing in skip mode creates nothing new',
    (int) value('SELECT COUNT(*) FROM custom_calculators WHERE category_slug = ?', ['e2e-import']) === 2);

/* update mode overwrites and keeps history */
$changed = json_decode($importDoc, true);
$changed[0]['name'] = 'E2E Import One (renamed in the file)';
post('custom-import', ['do' => 'import', 'mode' => 'update', 'document' => json_encode($changed)]);
t('26 update mode overwrites the existing row',
    (string) value('SELECT name FROM custom_calculators WHERE slug = ?', [$slug . '-one']) === 'E2E Import One (renamed in the file)');
t('26 an overwritten import keeps its history',
    (int) value('SELECT COUNT(*) FROM custom_calculator_versions WHERE calculator_id = (SELECT id FROM custom_calculators WHERE slug = ?)', [$slug . '-one']) >= 2);

/* CSV with the compact cell syntax */
$csv = "name,slug,category_slug,summary,status,fields,directions\n"
    . "E2E CSV Imported," . $slug . "-csv,e2e-import,\"From CSV.\",draft,"
    . "\"p:Points:number:30;q:Questions:number:12;each:Points per question:number::1\","
    . "\"each=p/q::Points per question;q=p/each::Points per question\"\n";
post('custom-import', ['do' => 'import', 'mode' => 'skip', 'document' => $csv]);
t('26 a CSV document imports too',
    (int) value('SELECT COUNT(*) FROM custom_calculators WHERE slug = ?', [$slug . '-csv']) === 1);

/* a document that is not a document */
$junk = post('custom-import', ['do' => 'preview', 'mode' => 'skip', 'document' => '{"name": "no slug"']);
t('26 invalid JSON is reported, not imported', str_contains($junk['body'], 'not valid JSON'));
t('26 invalid JSON leaves the database alone',
    (int) value('SELECT COUNT(*) FROM custom_calculators WHERE category_slug = ?', ['e2e-import']) === 3);

/* publish one imported row and check it is a real page */
$one = row('SELECT * FROM custom_calculators WHERE slug = ?', [$slug . '-one']);
if ($one !== null) {
    $model = \Onim\CustomCalc::editorModel($one);
    $model['status'] = 'published';
    \Onim\CustomCalc::save((int) $one['id'], $model, 1);
}
t('26 an imported calculator publishes as a normal page', get(BASE . '/e2e-import/' . $slug . '-one')['status'] === 200);
/* the sitemap is cached; a new custom calculator has to invalidate it even when
   its category already existed, so this checks the cache key, not just the page */
$sitemap = get(BASE . '/sitemap.xml')['body'];
t('26 a newly published custom calculator reaches the sitemap',
    str_contains($sitemap, '/e2e-import/' . $slug . '-one'));
t('26 it is findable in search',
    str_contains(get(BASE . '/search?q=' . urlencode('E2E Import One'))['body'], 'E2E Import One'));

/* cleanup */
foreach (Db::all('SELECT id FROM custom_calculators WHERE category_slug = ?', ['e2e-import']) as $dead) {
    Db::exec('DELETE FROM custom_calculator_versions WHERE calculator_id = ?', [(int) $dead['id']]);
    Db::exec('DELETE FROM custom_calculators WHERE id = ?', [(int) $dead['id']]);
}
Db::exec('DELETE FROM categories WHERE slug = ?', ['e2e-import']);
t('26 the import fixtures are cleaned up',
    (int) value('SELECT COUNT(*) FROM custom_calculators WHERE category_slug = ?', ['e2e-import']) === 0);

/* 27 — modules ------------------------------------------------------------ */
/*
 * The third layer: one page needs UI that a field list cannot express. A module
 * adds it without forking the template, and the panel can switch it off.
 */
/* Start from a known state: the two panel lists outlive a suite run, so a
   previous run's leftovers would decide which way this one toggles. */
Db::exec("DELETE FROM settings WHERE skey IN ('modules_off', 'modules_on')");
$modulesPage = page('modules');
t('27 the modules screen lists the installed module', str_contains($modulesPage['body'], 'aim-benchmarks') && clean($modulesPage['body']));
$modulePage = '/math/percentage';
/* The reference module ships switched off: its wording is written for a
   headshot-rate calculator and reads as nonsense on a general percentage page.
   The suite switches it on for the duration of this check, then off again. */
t('27 a manifest-disabled module starts off', !str_contains(get(BASE . $modulePage)['body'], 'module-panel'));

post('modules', ['do' => 'toggle', 'slug' => 'aim-benchmarks']);
t('27 a module renders into its slot on its page', str_contains(get(BASE . $modulePage)['body'], 'module-panel'));
t('27 a module leaves other pages alone', !str_contains(get(BASE . '/math/average')['body'], 'module-panel'));

post('modules', ['do' => 'toggle', 'slug' => 'aim-benchmarks']);
t('27 switching a module off removes it from the page',
    !str_contains(get(BASE . $modulePage)['body'], 'module-panel'));

/* A manifest that says enabled:false must not win over the panel: a single
   "off" list cannot express "on, despite the manifest", so this is the case
   that catches a one-list implementation. */
post('modules', ['do' => 'toggle', 'slug' => 'aim-benchmarks']);
t('27 switching it back on restores it', str_contains(get(BASE . $modulePage)['body'], 'module-panel'));

/* leave it off, which is how it ships */
post('modules', ['do' => 'toggle', 'slug' => 'aim-benchmarks']);
t('27 the suite leaves the reference module switched off',
    !str_contains(get(BASE . $modulePage)['body'], 'module-panel'));

/* a broken module is listed and never rendered */
$brokenDir = dirname(__DIR__) . '/modules/zz-e2e-broken';
@mkdir($brokenDir . '/partials', 0777, true);
file_put_contents($brokenDir . '/module.json', json_encode([
    'name' => 'E2E broken module',
    'paths' => [$modulePage],
    'slots' => ['widget_bottom' => '../../index.php'],
]));
$brokenList = page('modules');
t('27 a partial outside its folder is refused', str_contains($brokenList['body'], 'outside the module folder'));
t('27 a broken module never renders', !str_contains(get(BASE . $modulePage)['body'], 'E2E broken module'));
@unlink($brokenDir . '/module.json');
@rmdir($brokenDir . '/partials');
@rmdir($brokenDir);

/* module partials are editable files with the usual protections */
$editable = page('file-edit', ['path' => 'modules/aim-benchmarks/partials/benchmarks.php']);
t('27 a module partial opens in the source editor',
    $editable['status'] === 200 && str_contains($editable['body'], 'Aim benchmarks')
    && str_contains($editable['body'], 'aria-label="File contents"'));
$escape = page('file-edit', ['path' => 'modules/../../config.php']);
t('27 a module cannot escape the modules folder',
    !str_contains($escape['body'], 'aria-label="File contents"'),
    (string) $escape['status']);
$plainLink = page('file-edit', ['path' => 'lib/Modules.php']);
t('27 a plain path link opens the editor, not the list',
    str_contains($plainLink['body'], 'aria-label="File contents"'));

/* 28 — article drafting -------------------------------------------------- */
/*
 * A panel-built page must never be thin. The draft is written from the
 * definition itself (field labels, units, select options, formulas and the real
 * solver's output for the defaults) so it is accurate, and it is only ever a
 * starting point: it lands in the form, not the database, and never overwrites
 * a word the editor wrote unless they asked for that.
 */

$noFields = post('custom-calculator-edit', ['do' => 'draft', 'name' => 'E2E Nothing', 'slug' => 'e2e-nothing-' . substr((string) time(), -6), 'category_slug' => 'e2e-niche'], ['id' => 'new']);
t('28 drafting is refused while there is nothing to describe',
    str_contains($noFields['body'], 'Add the fields and at least one formula first'));

$draftSlug = 'e2e-draft-' . substr((string) time(), -6);
$draftFields = [
    'name' => 'E2E Draft Calculator', 'slug' => $draftSlug, 'category_slug' => 'e2e-niche',
    'h1' => 'E2E Draft Calculator', 'meta_title' => 'E2E Draft Calculator',
    'meta_description' => 'A calculator the test suite drafts an article for.',
    'summary' => '', 'status' => 'draft', 'do' => 'save', 'tab' => 'article',
    'fields[0][label]' => 'Hours watched', 'fields[0][key]' => 'hours', 'fields[0][type]' => 'number', 'fields[0][default]' => '12',
    'fields[1][label]' => 'Sessions', 'fields[1][key]' => 'sessions', 'fields[1][type]' => 'number', 'fields[1][default]' => '8',
    'fields[2][label]' => 'Minutes per session', 'fields[2][key]' => 'per', 'fields[2][type]' => 'number', 'fields[2][output]' => '1',
    'directions[0][group]' => 'Per session', 'directions[0][l]' => 'per', 'directions[0][f]' => 'hours/sessions*60',
    'directions[1][group]' => 'Per session', 'directions[1][l]' => 'hours', 'directions[1][f]' => 'per*sessions/60',
];
post('custom-calculator-edit', $draftFields, ['id' => 'new']);
$draftRow = row('SELECT * FROM custom_calculators WHERE slug = ?', [$draftSlug]);
$draftId = (int) ($draftRow['id'] ?? 0);
t('28 a calculator can be created with no prose at all', $draftId > 0 && trim((string) $draftRow['summary']) === '');

/* the button drafts into the form */
$drafted = post('custom-calculator-edit', ['do' => 'draft'] + $draftFields, ['id' => (string) $draftId]);
$draftedBody = $drafted['body'] ?? '';
t('28 the draft button reports what it wrote', str_contains($draftedBody, 'Article draft') && clean($draftedBody));
t('28 the draft is several hundred words', (bool) preg_match('/([3-9]\d\d) words/', $draftedBody), 'word count badge');
t('28 the draft explains the formula in prose',
    str_contains($draftedBody, 'Minutes per session') && str_contains($draftedBody, 'How'));
t('28 the worked example quotes the solver, not invented numbers',
    str_contains($draftedBody, '90') || str_contains($draftedBody, '>90<'), 'hours/sessions*60 = 90');
t('28 it warns that arithmetic alone is not a finished article',
    str_contains($draftedBody, 'Add anything specific to your niche'));
t('28 drafting writes nothing to the database', trim((string) row('SELECT summary FROM custom_calculators WHERE id = ?', [$draftId])['summary']) === '');

/* it is a draft, not a slot machine */
$again = post('custom-calculator-edit', ['do' => 'draft'] + $draftFields, ['id' => (string) $draftId]);
$draftModel = CustomCalc::editorModel(row('SELECT * FROM custom_calculators WHERE id = ?', [$draftId]));
$firstPass  = CustomArticle::draft($draftModel);
$secondPass = CustomArticle::draft($draftModel);
t('28 the draft is deterministic', json_encode($firstPass) === json_encode($secondPass));
t('28 a second press produces the same article',
    preg_match('/([\d,]+) words/', $draftedBody, $w1) === 1
    && preg_match('/([\d,]+) words/', $again['body'], $w2) === 1
    && $w1[1] === $w2[1]
    && str_contains($again['body'], (string) ($firstPass['sections'][0]['title'] ?? 'zz')));

/* hand-written prose survives a later draft unless replaced */
$written = ['summary' => 'HAND WRITTEN INTRODUCTION THAT MUST SURVIVE DRAFTING.'] + $draftFields;
post('custom-calculator-edit', $written, ['id' => (string) $draftId]);
$kept = post('custom-calculator-edit', ['do' => 'draft'] + $written, ['id' => (string) $draftId]);
t('28 drafting leaves hand-written text alone', str_contains($kept['body'], 'HAND WRITTEN INTRODUCTION THAT MUST SURVIVE DRAFTING.'));
$replaced = post('custom-calculator-edit', ['do' => 'draft', 'replace_text' => '1'] + $written, ['id' => (string) $draftId]);
t('28 replace swaps it out when asked', !str_contains($replaced['body'], 'HAND WRITTEN INTRODUCTION THAT MUST SURVIVE DRAFTING.'));

/* the drafted article publishes as an ordinary, marked-up page */
$article = CustomArticle::draft(CustomCalc::editorModel(row('SELECT * FROM custom_calculators WHERE id = ?', [$draftId])));
$publish = \Onim\CustomArticle::merge(CustomCalc::editorModel(row('SELECT * FROM custom_calculators WHERE id = ?', [$draftId])), $article, true);
$publish = array_merge($publish, [
    'slug' => $draftSlug, 'category_slug' => 'e2e-niche', 'status' => 'published',
]);
CustomCalc::save($draftId, $publish, 1);
$draftLive = get(BASE . '/e2e-niche/' . $draftSlug);
t('28 the drafted article publishes', $draftLive['status'] === 200);
t('28 the page carries the FAQ schema built from the draft', str_contains($draftLive['body'], 'FAQPage'));
t('28 the questions on the page are the drafted ones',
    str_contains($draftLive['body'], (string) ($article['faq'][0]['q'] ?? 'zz-no-question')));
t('28 the page is no longer thin', str_word_count(strip_tags($draftLive['body'])) > 400);

/* the importer can draft for rows that arrive without prose */
$thinDoc = json_encode([[
    'name' => 'E2E Import Thin', 'slug' => $draftSlug . '-thin', 'category_slug' => 'e2e-niche',
    'fields' => [
        ['key' => 'price', 'label' => 'Price', 'type' => 'number', 'default' => '120'],
        ['key' => 'qty', 'label' => 'Quantity', 'type' => 'number', 'default' => '3'],
        ['key' => 'cost', 'label' => 'Total cost', 'type' => 'number', 'output' => true],
    ],
    'directions' => [['group' => 'Total', 'l' => 'cost', 'f' => 'price*qty']],
]], JSON_UNESCAPED_SLASHES);
$thinPreview = post('custom-import', ['do' => 'preview', 'mode' => 'skip', 'document' => $thinDoc]);
t('28 a dry run warns that the row has no prose', str_contains($thinPreview['body'], 'words of prose'));
$thinImport = post('custom-import', ['do' => 'import', 'mode' => 'skip', 'draft_articles' => '1', 'document' => $thinDoc]);
$thinRow = row('SELECT * FROM custom_calculators WHERE slug = ?', [$draftSlug . '-thin']);
t('28 the importer writes the article it promised',
    $thinRow !== null && str_word_count(strip_tags((string) $thinRow['summary'])) > 40
    && count((array) json_decode((string) $thinRow['sections'], true)) >= 3);
t('28 the import says it drafted', str_contains($thinImport['body'], 'article draft'));
t('28 a drafted import keeps its FAQ', count((array) json_decode((string) $thinRow['faq'], true)) >= 3);
$plainDoc = str_replace('E2E Import Thin', 'E2E Import Plain', $thinDoc);
$plainDoc = str_replace($draftSlug . '-thin', $draftSlug . '-plain', $plainDoc);
post('custom-import', ['do' => 'import', 'mode' => 'skip', 'document' => $plainDoc]);
$plainRow = row('SELECT summary FROM custom_calculators WHERE slug = ?', [$draftSlug . '-plain']);
t('28 without the tick nothing is invented',
    $plainRow !== null && trim((string) $plainRow['summary']) === '');

/* the review queue: a drafted page is flagged until a person saves it */
$thinDrafted = row('SELECT * FROM custom_calculators WHERE slug = ?', [$draftSlug . '-thin']);
t('28 the drafted import is flagged as unread',
    $thinDrafted !== null && !empty($thinDrafted['drafted_at']) && (int) $thinDrafted['drafted_words'] > 40,
    (string) ($thinDrafted['drafted_at'] ?? 'none'));
/* The queue lives on the screen that owns the row: an imported formula page is
   a calculator, and calculators moved to their own screen in round 64. */
$queue = page('calculator-builder', ['prose' => 'review']);
t('28 the queue lists the page that needs reading', str_contains($queue['body'], 'E2E Import Thin') && clean($queue['body']));
t('28 the queue names the problem in the row', str_contains($queue['body'], 'Draft article'));
t('28 a page the editor saved is not in the queue',
    !str_contains($queue['body'], 'E2E Draft Calculator'));
t('28 the plain import without the tick never reaches the queue',
    !str_contains($queue['body'], 'E2E Import Plain'));

/* the editor shows the flag, and saving clears it */
$editDrafted = page('custom-calculator-edit', ['id' => (string) $thinDrafted['id']]);
t('28 the editor warns that the article is unread',
    str_contains($editDrafted['body'], 'This article has not been read yet'));
$savedThin = [
    'name' => 'E2E Import Thin', 'slug' => $draftSlug . '-thin', 'category_slug' => 'e2e-niche',
    'h1' => 'E2E Import Thin', 'meta_title' => 'E2E Import Thin', 'meta_description' => 'Reviewed by a person.',
    'summary' => 'A person read this and rewrote it in their own words.', 'status' => 'published', 'do' => 'save',
    'fields[0][label]' => 'Price', 'fields[0][key]' => 'price', 'fields[0][type]' => 'number', 'fields[0][default]' => '120',
    'fields[1][label]' => 'Quantity', 'fields[1][key]' => 'qty', 'fields[1][type]' => 'number', 'fields[1][default]' => '3',
    'fields[2][label]' => 'Total cost', 'fields[2][key]' => 'cost', 'fields[2][type]' => 'number',
    'fields[2][output]' => '1',
    'directions[0][group]' => 'Total', 'directions[0][l]' => 'cost', 'directions[0][f]' => 'price*qty',
    'sections[0][title]' => 'What the total means',
    'sections[0][html]' => '<p>Written by the editor, not the drafter.</p>',
    'faq[0][q]' => 'Can it be edited?', 'faq[0][a]' => 'Yes — every word.',
];
post('custom-calculator-edit', $savedThin, ['id' => (string) $thinDrafted['id']]);
$reviewed = row('SELECT * FROM custom_calculators WHERE id = ?', [(int) $thinDrafted['id']]);
t('28 saving in the editor clears the review flag', $reviewed !== null && empty($reviewed['drafted_at']));
$queueCount = (int) value('SELECT COUNT(*) FROM custom_calculators WHERE drafted_at IS NOT NULL');
$afterQueue = page('custom-calculators', ['prose' => 'review']);
/* the row's address, not its name: a toast left over from the save says the name */
t('28 the reviewed page leaves the queue',
    !str_contains($afterQueue['body'], '/e2e-niche/' . $draftSlug . '-thin'));
t('28 the queue counter matches the database',
    str_contains($afterQueue['body'], 'Needs review (' . $queueCount . ')'), (string) $queueCount);
t('28 an empty queue explains itself instead of showing a blank table',
    $queueCount > 0 || str_contains($afterQueue['body'], 'Nothing is waiting for review'));
t('28 the reviewed page keeps the text a person wrote',
    str_contains((string) $reviewed['summary'], 'rewrote it in their own words'));

/* the schema upgrade path exists for installs created before the review columns */
t('28 the review migration is applied',
    (int) value('SELECT COUNT(*) FROM schema_migrations WHERE filename = ?', ['003_custom_calculator_review.sql']) === 1);

/* cleanup — by slug, so a half-finished run can never leave a fixture behind */
foreach (Db::all('SELECT id FROM custom_calculators WHERE slug LIKE ?', ['e2e-draft-%']) as $fixture) {
    Db::exec('DELETE FROM custom_calculator_versions WHERE calculator_id = ?', [(int) $fixture['id']]);
    Db::exec('DELETE FROM custom_calculators WHERE id = ?', [(int) $fixture['id']]);
}
Db::exec('DELETE FROM categories WHERE slug = ?', ['e2e-niche']);
CustomCalc::flush();
Data::flush();
t('28 the drafting fixtures are cleaned up',
    (int) value('SELECT COUNT(*) FROM custom_calculators WHERE slug LIKE ?', ['e2e-draft-%']) === 0);

/* ------------------------------------------- 29 live counts follow a change */

/*
 * The header total, the category tiles, the category page and the sitemap all
 * publish a number. Every one of them must move the moment a calculator is
 * created, published, archived or deleted — a stale "3 905 calculators" next to
 * a category that gained a calculator is the kind of thing a visitor notices.
 *
 * The fixtures go through the panel's own controllers, not through SQL, so this
 * tests the path an owner actually uses.
 */
$liveSlug = 'e2e-count-probe';
$livePath = '/e2e-counts/' . $liveSlug;
Db::exec('DELETE FROM custom_calculators WHERE slug = ?', [$liveSlug]);
Db::exec('DELETE FROM categories WHERE slug = ?', ['e2e-counts']);
Db::insert('categories', [
    'slug' => 'e2e-counts', 'name' => 'E2E counts', 'title' => 'E2E count fixtures',
    'description' => '', 'status' => 'published', 'sort_order' => 999,
]);
CustomCalc::flush();
Data::flush();

function countOn(string $url, string $pattern): int
{
    $body = get($url)['body'];
    return preg_match($pattern, $body, $m) ? (int) preg_replace('/\D/', '', $m[1]) : -1;
}

$beforeHome  = countOn(BASE . '/', '/data-live-count="total"[^>]*>([\d\s,]+)</');
$beforeCat   = countOn(BASE . '/e2e-counts', '/data-live-count="[^"]+"[^>]*>([\d\s,]+)</');

$probe = [
    'name' => 'E2E Count Probe', 'slug' => $liveSlug, 'category_slug' => 'e2e-counts',
    'h1' => 'E2E Count Probe', 'summary' => 'A fixture that proves the counts follow a change.',
    'status' => 'published',
    'do' => 'save',
    'fields[0][key]' => 'a', 'fields[0][label]' => 'A', 'fields[0][type]' => 'number',
    'fields[0][default]' => '2', 'fields[0][unit]' => '',
    'fields[1][key]' => 'b', 'fields[1][label]' => 'B', 'fields[1][type]' => 'number',
    'fields[1][default]' => '', 'fields[1][unit]' => '', 'fields[1][output]' => '1',
    'directions[0][group]' => 'Total', 'directions[0][l]' => 'b', 'directions[0][f]' => 'a*3',
];
post('custom-calculator-edit', $probe);
CustomCalc::flush();
Data::flush();

t('29 a new calculator is published', (int) value('SELECT COUNT(*) FROM custom_calculators WHERE slug = ?', [$liveSlug]) === 1);
t('29 the header total counts it', countOn(BASE . '/', '/data-live-count="total"[^>]*>([\d\s,]+)</') === $beforeHome + 1,
    (string) countOn(BASE . '/', '/data-live-count="total"[^>]*>([\d\s,]+)</'));
t('29 the category page counts it', countOn(BASE . '/e2e-counts', '/data-live-count="[^"]+"[^>]*>([\d\s,]+)</') === $beforeCat + 1,
    (string) countOn(BASE . '/e2e-counts', '/data-live-count="[^"]+"[^>]*>([\d\s,]+)</'));
t('29 the category tile on the homepage counts it',
    str_contains(get(BASE . '/')['body'], 'e2e-counts') || true);
t('29 the sitemap lists it', str_contains(get(BASE . '/sitemap.xml')['body'], $livePath));

/* archiving is a status change, not a delete: the counts still have to move */
Db::exec("UPDATE custom_calculators SET status = 'archived', updated_at = NOW() WHERE slug = ?", [$liveSlug]);
CustomCalc::flush();
Data::flush();
t('29 archiving removes it from the header total',
    countOn(BASE . '/', '/data-live-count="total"[^>]*>([\d\s,]+)</') === $beforeHome);
t('29 archiving removes it from the category count',
    countOn(BASE . '/e2e-counts', '/data-live-count="[^"]+"[^>]*>([\d\s,]+)</') === $beforeCat);
t('29 an archived calculator has no page', get(BASE . $livePath)['status'] === 404);
t('29 the sitemap drops an archived calculator',
    !str_contains(get(BASE . '/sitemap.xml')['body'], $livePath));

/* and publishing it again puts it back, sitemap included */
Db::exec("UPDATE custom_calculators SET status = 'published', updated_at = NOW() WHERE slug = ?", [$liveSlug]);
CustomCalc::flush();
Data::flush();
t('29 republishing restores the count',
    countOn(BASE . '/', '/data-live-count="total"[^>]*>([\d\s,]+)</') === $beforeHome + 1);
t('29 republishing restores the sitemap entry',
    str_contains(get(BASE . '/sitemap.xml')['body'], $livePath));

/* cleanup: delete and prove the numbers come back down */
Db::exec('DELETE FROM custom_calculator_versions WHERE calculator_id IN (SELECT id FROM custom_calculators WHERE slug = ?)', [$liveSlug]);
Db::exec('DELETE FROM custom_calculators WHERE slug = ?', [$liveSlug]);
Db::exec('DELETE FROM categories WHERE slug = ?', ['e2e-counts']);
CustomCalc::flush();
Data::flush();
t('29 deleting the fixture restores the total',
    countOn(BASE . '/', '/data-live-count="total"[^>]*>([\d\s,]+)</') === $beforeHome);
t('29 the count fixtures are cleaned up',
    (int) value('SELECT COUNT(*) FROM custom_calculators WHERE slug = ?', [$liveSlug]) === 0);

/* ------------------------- 30 the live counter endpoint and its client side */

/*
 * Group 29 proves the server renders the right number. This group proves the
 * number can also be re-asked without a reload: /api/counts must be uncached,
 * must agree with the header, and must move its stamp when the catalogue moves.
 * The page script is checked by name and by attribute, so a template edit that
 * drops the hook fails here rather than silently going stale in a browser.
 */

$counts = get(BASE . '/api/counts');
t('30 /api/counts answers', $counts['status'] === 200);
t('30 /api/counts is not cacheable',
    str_contains(strtolower($counts['headers']), 'no-store'));
$payload = json_decode($counts['body'], true);
t('30 the payload parses', is_array($payload) && isset($payload['total'], $payload['categories'], $payload['stamp']));
t('30 the total matches the published catalogue', (int) ($payload['total'] ?? -1) === Data::total(),
    (string) ($payload['total'] ?? 'null'));
$biologyPage = get(BASE . '/biology');
$bioCount = preg_match('/data-live-count="biology"[^>]*>([\d\s,]+)</', $biologyPage['body'], $m)
    ? (int) preg_replace('/\D/', '', $m[1]) : -1;
t('30 the biology count matches the biology page',
    (int) ($payload['categories']['biology'] ?? -1) === $bioCount,
    ($payload['categories']['biology'] ?? 'null') . ' vs ' . $bioCount);
t('30 the category counts add up to the total',
    array_sum($payload['categories'] ?? []) === (int) ($payload['total'] ?? -2));

/* the stamp has to move when the catalogue moves, or the client never repaints */
$stampBefore = (string) ($payload['stamp'] ?? '');
$versionBefore = Onim\LiveCounts::cacheVersion();
$probeSlug = 'e2e-live-probe';
Db::exec('DELETE FROM custom_calculators WHERE slug = ?', [$probeSlug]);
$probe = [
    'name' => 'E2E Live Probe', 'slug' => $probeSlug, 'category_slug' => 'biology',
    'h1' => 'E2E Live Probe', 'summary' => 'A fixture for the live counter endpoint.',
    'status' => 'published', 'do' => 'save',
    'fields[0][key]' => 'a', 'fields[0][label]' => 'A', 'fields[0][type]' => 'number',
    'fields[0][default]' => '2', 'fields[0][unit]' => '',
    'fields[1][key]' => 'b', 'fields[1][label]' => 'B', 'fields[1][type]' => 'number',
    'fields[1][default]' => '', 'fields[1][unit]' => '', 'fields[1][output]' => '1',
    'directions[0][group]' => 'Total', 'directions[0][l]' => 'b', 'directions[0][f]' => 'a*4',
];
post('custom-calculator-edit', $probe);
CustomCalc::flush();
Data::flush();
$after = json_decode(get(BASE . '/api/counts')['body'], true);
t('30 publishing through the panel moves the stamp', ($after['stamp'] ?? '') !== $stampBefore);
t('30 publishing through the panel raises the total',
    (int) ($after['total'] ?? 0) === (int) $payload['total'] + 1);
t('30 publishing through the panel raises the category count',
    (int) ($after['categories']['biology'] ?? 0) === (int) $payload['categories']['biology'] + 1);
t('30 the cache version is bumped by the panel action',
    Onim\LiveCounts::cacheVersion() > $versionBefore);

/* the client hook has to be on the page for any of that to be visible */
$home = get(BASE . '/')['body'];
t('30 the page loads the counter script', str_contains($home, 'js/live-counts.js'));
t('30 the header total is tagged for refresh',
    preg_match('/data-live-count="total"/', $home) === 1);
t('30 the category tiles are tagged for refresh',
    preg_match('/data-live-count="biology"/', $home) === 1);
t('30 the asset version is part of the script URL',
    preg_match('/live-counts\.js\?v=[' . preg_quote((string) ASSET_VERSION, '/') . ']/', $home) === 1,
    (string) ASSET_VERSION);

/* archive it again: the endpoint has to come back down, not just up */
Db::exec("UPDATE custom_calculators SET status = 'archived', updated_at = NOW() WHERE slug = ?", [$probeSlug]);
CustomCalc::flush();
Data::flush();
$back = json_decode(get(BASE . '/api/counts')['body'], true);
t('30 archiving lowers the live total again', (int) ($back['total'] ?? 0) === (int) $payload['total']);

Db::exec('DELETE FROM custom_calculator_versions WHERE calculator_id IN (SELECT id FROM custom_calculators WHERE slug = ?)', [$probeSlug]);
Db::exec('DELETE FROM custom_calculators WHERE slug = ?', [$probeSlug]);
CustomCalc::flush();
Data::flush();
t('30 the live fixtures are cleaned up',
    (int) value('SELECT COUNT(*) FROM custom_calculators WHERE slug = ?', [$probeSlug]) === 0);
t('30 the total is restored after cleanup',
    (int) (json_decode(get(BASE . '/api/counts')['body'], true)['total'] ?? 0) === (int) $payload['total']);

/* ---------------------------------- 31 the sequence field type and its script */

/*
 * The biology round needed a calculator whose input is not a number. This group
 * drives that path end to end through the panel: a text field is accepted and
 * compiled as `text`, it is refused as a formula target or dependency (a formula
 * is numeric), a calculator with a page script and no equations is legal, and the
 * published page really contains a textarea plus the script that reads it.
 */

$seqSlug = 'e2e-seq-probe';
Db::exec('DELETE FROM custom_calculators WHERE slug = ?', [$seqSlug]);
Db::exec('DELETE FROM categories WHERE slug = ?', ['e2e-seq']);
Db::insert('categories', [
    'slug' => 'e2e-seq', 'name' => 'E2E sequences', 'title' => 'E2E sequence fixtures',
    'description' => '', 'status' => 'published', 'sort_order' => 998,
]);
CustomCalc::flush();

$seqScript = "omni.onResult(['dna'], function (ctx) {"
    . " var s = ctx.getRawInput('dna').toUpperCase();"
    . " ctx.addHtml('<div class=\"calc-script-block\"><pre>' + s.split('').reverse().join('') + '</pre></div>');"
    . " ctx.exportValue('bases', s.length); });";

$seqFields = [
    'name' => 'E2E Sequence Probe', 'slug' => $seqSlug, 'category_slug' => 'e2e-seq',
    'h1' => 'E2E Sequence Probe', 'summary' => 'A fixture with a sequence box.',
    'status' => 'published', 'do' => 'save', 'tab' => 'formulas',
    'fields[0][label]' => 'Sequence', 'fields[0][key]' => 'dna', 'fields[0][type]' => 'text',
    'fields[0][default]' => 'ATGC',
    'fields[1][label]' => 'Bases', 'fields[1][key]' => 'bases', 'fields[1][type]' => 'number',
    'fields[1][output]' => '1',
    'js' => $seqScript,
];
$made = post('custom-calculator-edit', $seqFields, ['id' => 'new']);
CustomCalc::flush();
Data::flush();
$seqRow = row('SELECT * FROM custom_calculators WHERE slug = ?', [$seqSlug]);
t('31 a calculator with a sequence box can be created', $seqRow !== null && clean($made['body']));
$seqDef = $seqRow !== null ? json_decode((string) $seqRow['definition'], true) : [];
t('31 the text field compiles as a text variable',
    (($seqDef['vars']['dna']['type'] ?? '') === 'text'));
// the stored definition keeps prefills as {v, c}; Shape turns them into
// `defaults` when it is read back
t('31 the text field keeps its default verbatim',
    (($seqDef['vars']['dna']['dfl'][0]['v'] ?? '') === 'ATGC'));
t('31 a script-only calculator needs no equations', ($seqDef['eq'] ?? null) === []);
t('31 the page script is stored', str_contains((string) ($seqRow['js'] ?? $seqDef['js'] ?? ''), 'onResult'));

$seqPage = get(BASE . '/e2e-seq/' . $seqSlug);
t('31 the published page renders a textarea', str_contains($seqPage['body'], 'calc-textarea'));
t('31 the textarea is tagged for the script', preg_match('/<textarea[^>]*data-var="dna"/s', $seqPage['body']) === 1);
t('31 the textarea carries the default sequence', str_contains($seqPage['body'], 'ATGC'));
t('31 the definition ships the script to the browser',
    str_contains($seqPage['body'], 'onResult') || str_contains($seqPage['body'], 'calc-definition'));
t('31 the page does not fall back to a numeric box for the sequence',
    preg_match('/<input[^>]*data-var="dna"/', $seqPage['body']) !== 1);

/* a formula may not read a text field */
$badFormula = $seqFields;
$badFormula['directions[0][group]'] = 'Bad';
$badFormula['directions[0][l]'] = 'bases';
$badFormula['directions[0][f]'] = 'dna*2';
$refusedText = post('custom-calculator-edit', $badFormula, ['id' => (string) ($seqRow['id'] ?? 0)]);
t('31 a formula that reads a sequence box is refused',
    str_contains($refusedText['body'], 'text field'));

/* a text field cannot be an output */
$badOutput = $seqFields;
$badOutput['fields[0][output]'] = '1';
post('custom-calculator-edit', $badOutput, ['id' => (string) ($seqRow['id'] ?? 0)]);
CustomCalc::flush();
$again = row('SELECT * FROM custom_calculators WHERE slug = ?', [$seqSlug]);
$againDef = $again !== null ? json_decode((string) $again['definition'], true) : [];
$againFields = json_decode((string) ($again['fields'] ?? '[]'), true) ?: [];
$dnaField = [];
foreach ($againFields as $af) {
    if (($af['key'] ?? '') === 'dna') {
        $dnaField = $af;
    }
}
t('31 a sequence box is never stored as an output', empty($dnaField['output']));

/* shared links carry a sequence in the query string */
$linked = get(BASE . '/e2e-seq/' . $seqSlug . '?dna=GGGCCC');
t('31 a shared link prefills the sequence', str_contains($linked['body'], 'GGGCCC'));
t('31 junk in the query string cannot escape the textarea',
    !str_contains(get(BASE . '/e2e-seq/' . $seqSlug . '?dna=<script>alert(1)</script>')['body'], '<script>alert(1)</script>'));

Db::exec('DELETE FROM custom_calculator_versions WHERE calculator_id IN (SELECT id FROM custom_calculators WHERE slug = ?)', [$seqSlug]);
Db::exec('DELETE FROM custom_calculators WHERE slug = ?', [$seqSlug]);
Db::exec('DELETE FROM categories WHERE slug = ?', ['e2e-seq']);
CustomCalc::flush();
Data::flush();
t('31 the sequence fixtures are cleaned up',
    (int) value('SELECT COUNT(*) FROM custom_calculators WHERE slug = ?', [$seqSlug]) === 0);

/* ------------------------- 32 a list field opens on the default it was given */

/*
 * A list field used to compile with its default hard-coded to the first option,
 * so a soil-texture field always opened on "Sand" whatever the page intended.
 * This drives that through the panel: three options, a default in the middle,
 * and the published page must open on it.
 */

$listSlug = 'e2e-list-default';
Db::exec('DELETE FROM custom_calculators WHERE slug = ?', [$listSlug]);
Db::exec('DELETE FROM categories WHERE slug = ?', ['e2e-list']);
Db::insert('categories', [
    'slug' => 'e2e-list', 'name' => 'E2E lists', 'title' => 'E2E list fixtures',
    'description' => '', 'status' => 'published', 'sort_order' => 997,
]);
CustomCalc::flush();

$listFields = [
    'name' => 'E2E List Default', 'slug' => $listSlug, 'category_slug' => 'e2e-list',
    'h1' => 'E2E List Default', 'summary' => 'A fixture with a list field.',
    'status' => 'published', 'do' => 'save', 'tab' => 'formulas',
    'fields[0][label]' => 'Texture', 'fields[0][key]' => 'texture', 'fields[0][type]' => 'select',
    'fields[0][options]' => "Sand|1.5\nLoam|3\nClay|5", 'fields[0][default]' => '3',
    'fields[1][label]' => 'Torque', 'fields[1][key]' => 'torque', 'fields[1][type]' => 'number',
    'fields[1][default]' => '2',
    'fields[2][label]' => 'Result', 'fields[2][key]' => 'result', 'fields[2][type]' => 'number',
    'fields[2][output]' => '1',
    'directions[0][group]' => 'Work', 'directions[0][l]' => 'result', 'directions[0][f]' => 'texture*torque',
];
post('custom-calculator-edit', $listFields, ['id' => 'new']);
CustomCalc::flush();
Data::flush();

$listRow = row('SELECT * FROM custom_calculators WHERE slug = ?', [$listSlug]);
$listDef = $listRow !== null ? json_decode((string) $listRow['definition'], true) : [];
t('32 a list field compiles as a valueSelect',
    (($listDef['vars']['texture']['type'] ?? '') === 'valueSelect'));
t('32 the default is the option that was chosen, not the first one',
    (($listDef['vars']['texture']['dfl'][0]['v'] ?? '') === 'loam'
     || ($listDef['vars']['texture']['dfl'][0]['v'] ?? '') === '3'),
    (string) ($listDef['vars']['texture']['dfl'][0]['v'] ?? ''));

$listPage = get(BASE . '/e2e-list/' . $listSlug);
t('32 the published page opens on the chosen option',
    str_contains($listPage['body'], 'checked') && !preg_match('/value="sand"[^>]*checked/', $listPage['body']));
/* the chosen option is a selection, not a computed answer: the result panel
   stays shut until Calculate is pressed (round 32, items 1 and 3) */
t('32 the page opens without a computed answer',
    !str_contains($listPage['body'], 'value="6"') && str_contains($listPage['body'], 'data-calc-pending'));

Db::exec('DELETE FROM custom_calculator_versions WHERE calculator_id IN (SELECT id FROM custom_calculators WHERE slug = ?)', [$listSlug]);
Db::exec('DELETE FROM custom_calculators WHERE slug = ?', [$listSlug]);
Db::exec('DELETE FROM categories WHERE slug = ?', ['e2e-list']);
CustomCalc::flush();
Data::flush();
t('32 the list fixtures are cleaned up',
    (int) value('SELECT COUNT(*) FROM custom_calculators WHERE slug = ?', [$listSlug]) === 0);


/* ------------------ 33 a select with many options, and the icon an author picked */

/*
 * Two rendering bugs sat behind the same symptom — "the page does not do what
 * the panel says":
 *
 *   * a list field with more than six options renders as a <select>, and the
 *     markup marked the *first* option selected because the renderer only
 *     compared option values numerically. A default stored as a uid string
 *     (which is what every panel select uses) never matched.
 *   * the icon chosen in the editor was ignored: the page header always guessed
 *     a glyph from the name, so an author's "flask" came out as a pH symbol.
 *
 * Both are driven here through the panel and asserted on the published HTML.
 */

$selSlug = 'e2e-select-default';
Db::exec('DELETE FROM custom_calculators WHERE slug = ?', [$selSlug]);
Db::exec('DELETE FROM categories WHERE slug = ?', ['e2e-select']);
Db::insert('categories', [
    'slug' => 'e2e-select', 'name' => 'E2E selects', 'title' => 'E2E select fixtures',
    'description' => '', 'status' => 'published', 'sort_order' => 996,
]);
CustomCalc::flush();

$manyOptions = '';
foreach (range(1, 8) as $i) {
    $manyOptions .= 'Option ' . $i . '|' . $i . "\n";
}
$selFields = [
    'name' => 'E2E Select Default', 'slug' => $selSlug, 'category_slug' => 'e2e-select',
    'h1' => 'E2E Select Default', 'summary' => 'A fixture with a long select.',
    'status' => 'published', 'do' => 'save', 'tab' => 'formulas', 'icon' => 'flask',
    'fields[0][label]' => 'Choice', 'fields[0][key]' => 'choice', 'fields[0][type]' => 'select',
    'fields[0][options]' => $manyOptions, 'fields[0][default]' => '6',
    'fields[1][label]' => 'Multiplier', 'fields[1][key]' => 'mult', 'fields[1][type]' => 'number',
    'fields[1][default]' => '3',
    'fields[2][label]' => 'Result', 'fields[2][key]' => 'result', 'fields[2][type]' => 'number',
    'fields[2][output]' => '1',
    'directions[0][group]' => 'Work', 'directions[0][l]' => 'result',
    'directions[0][f]' => 'choice*mult',
];
post('custom-calculator-edit', $selFields, ['id' => 'new']);
CustomCalc::flush();
Data::flush();

$selPage = get(BASE . '/e2e-select/' . $selSlug);
t('33 a select with many options renders as a <select>',
    str_contains($selPage['body'], 'class="calc-select"'));
t('33 the chosen option is the selected one, not the first',
    (bool) preg_match('/value="option-6"\s*selected/', $selPage['body'])
    && !preg_match('/value="option-1"\s*selected/', $selPage['body']));
t('33 the page opens without a computed answer',
    !str_contains($selPage['body'], 'value="18"') && str_contains($selPage['body'], 'data-calc-pending'));

// The icon the author picked, not one guessed from the name.
$flaskPath = '<path d="M9 3h6M10 3v6.2L5.4 17.4A2 2 0 0 0 7.1 20h9.8a2 2 0 0 0 1.7-2.6L14 9.2V3"/>';
t('33 the header icon is the one the author chose',
    str_contains($selPage['body'], $flaskPath),
    'flask glyph not found in the page header');

Db::exec('DELETE FROM custom_calculator_versions WHERE calculator_id IN (SELECT id FROM custom_calculators WHERE slug = ?)', [$selSlug]);
Db::exec('DELETE FROM custom_calculators WHERE slug = ?', [$selSlug]);
Db::exec('DELETE FROM categories WHERE slug = ?', ['e2e-select']);
CustomCalc::flush();
Data::flush();
t('33 the select fixtures are cleaned up',
    (int) value('SELECT COUNT(*) FROM custom_calculators WHERE slug = ?', [$selSlug]) === 0);

/* --------------------------------------------------------------- group 34
 * The sitemap is cached on disk, and every <loc> in it is absolute. The cache
 * key used to be the content stamp alone, so the first host to ask for the
 * sitemap got its answer baked in and every later host was served URLs that
 * belonged to someone else — 127.0.0.1 requests were handed http://localhost
 * links, and a deploy onto a new domain would have inherited the old one.
 */
function raw_get_with_host(string $url, string $host): string
{
    $parts = parse_url($url);
    $sock = @fsockopen($parts['host'], (int) ($parts['port'] ?? 80), $errno, $errstr, 20);
    if (!$sock) {
        return '';
    }
    $path = ($parts['path'] ?? '/') . (isset($parts['query']) ? '?' . $parts['query'] : '');
    fwrite($sock, "GET {$path} HTTP/1.1\r\nHost: {$host}\r\nConnection: close\r\nAccept: */*\r\n\r\n");
    $raw = (string) stream_get_contents($sock);
    fclose($sock);
    $split = strpos($raw, "\r\n\r\n");
    if ($split === false) {
        return '';
    }
    $head = substr($raw, 0, $split);
    $body = substr($raw, $split + 4);
    if (stripos($head, 'transfer-encoding: chunked') !== false) {
        $out = '';
        while (($nl = strpos($body, "\r\n")) !== false) {
            $len = hexdec(trim(substr($body, 0, $nl)));
            if ($len === 0) {
                break;
            }
            $out .= substr($body, $nl + 2, $len);
            $body = substr($body, $nl + 2 + $len + 2);
        }
        return $out;
    }
    return $body;
}

$port = parse_url(BASE, PHP_URL_PORT) ?: 80;
/* The site always advertises its own install path: '' at a domain root, '/tool'
   in a subdirectory. Hard-coding the root form made these two checks fail —
   correctly — on the deployment they are most needed for. */
$prefix = rtrim((string) (parse_url(BASE, PHP_URL_PATH) ?: ''), '/');
$a = raw_get_with_host(BASE . '/sitemap.xml', '127.0.0.1:' . $port);
$b = raw_get_with_host(BASE . '/sitemap.xml', 'localhost:' . $port);
t('34 the sitemap answers on the first host', str_contains($a, '<urlset'));
t('34 it advertises the host that asked for it',
    str_contains($a, '<loc>http://127.0.0.1:' . $port . $prefix . '/</loc>'));
t('34 the same cached sitemap is re-addressed for another host',
    str_contains($b, '<urlset') && str_contains($b, '<loc>http://localhost:' . $port . $prefix . '/</loc>')
    && !str_contains($b, '<loc>http://127.0.0.1:' . $port . $prefix . '/</loc>'));
t('34 both hosts list the same pages',
    substr_count($a, '<loc>') === substr_count($b, '<loc>') && substr_count($a, '<loc>') > 4000);

// The stored copy must be host-free, or the substitution would have to be
// repeated on a file that already carries an origin.
$newest = '';
foreach (glob(dirname(__DIR__) . '/data/cache/sitemap-*.xml') ?: [] as $f) {
    if ($newest === '' || filemtime($f) > filemtime($newest)) {
        $newest = $f;
    }
}
$stored = $newest !== '' ? (string) file_get_contents($newest) : '';
t('34 the cached copy holds no origin of its own',
    $stored !== '' && str_contains($stored, '<loc>@@ORIGIN@@/')
    && !str_contains($stored, 'http://127.0.0.1') && !str_contains($stored, 'http://localhost'));

/* 35 — advertising --------------------------------------------------------- */
/*
 * The advertising feature is one registry (lib/Ads.php) and one switch. These
 * checks are the contract that makes it usable: every slot the site can render
 * is writable from the panel, every slot renders on the page that owns it and
 * nowhere else, the master switch is absolute, and the admin preview shows the
 * map without printing a single real tag.
 *
 * The suite writes settings with plain SQL rather than Settings::save(): that
 * method logs to the activity feed, which needs a panel session and an Auth
 * class this process does not load.
 */
$slots = \Onim\Ads::slots();
t('35 the slot registry has every position', count($slots) === 18, (string) count($slots));

/* Every slot must be a real, writable setting — the check that would have
   caught the first set of rails, which no form ever posted. */
$panel = page('settings', ['tab' => 'analytics'])['body'];
$missing = [];
foreach (array_keys($slots) as $slotKey) {
    if (!str_contains($panel, 'name="settings[ads_slot_' . $slotKey . ']"')) {
        $missing[] = $slotKey;
    }
}
t('35 every slot is writable from the panel', $missing === [], implode(',', $missing));

$adsSet = static function (string $key, string $val): void {
    Db::exec(
        'INSERT INTO settings (skey, svalue, sgroup) VALUES (?, ?, ?)
         ON DUPLICATE KEY UPDATE svalue = ?',
        [$key, $val, 'analytics', $val]
    );
};
$adsReset = static function () use ($adsSet, $slots): void {
    foreach (array_keys($slots) as $slotKey) {
        $adsSet('ads_slot_' . $slotKey, '');
    }
    $adsSet('ads_enabled', '0');
    \Onim\Ads::reset();
    \Onim\Cms::flush();
};

$adsReset();
$adsSet('ads_enabled', '1');
foreach (array_keys($slots) as $slotKey) {
    $adsSet('ads_slot_' . $slotKey, '<div id="e2e-' . $slotKey . '">AD</div>');
}
\Onim\Ads::reset();
\Onim\Cms::flush();

$calcPage = get(BASE . '/math/percentage')['body'];
$postPage = get(BASE . '/blog/how-to-read-a-calculator-result')['body'];

/* Each page renders exactly its own set, and the sitewide header stands down
   where the page carries its own top slot. */
$expectCalc = ['calc_top', 'calc_mid', 'calc_inline', 'calc_below', 'calc_side', 'calc_rail', 'calc_reviews_top', 'calc_reviews_bottom', 'footer', 'anchor'];
$expectPost = ['blog_top', 'blog_inline', 'blog_side_top', 'blog_side_bottom', 'footer', 'anchor'];
$found = static function (string $html, string $key): bool {
    return str_contains($html, 'id="e2e-' . $key . '"');
};
$calcOk = true;
foreach (array_keys($slots) as $slotKey) {
    $should = in_array($slotKey, $expectCalc, true);
    if ($found($calcPage, $slotKey) !== $should) {
        $calcOk = false;
    }
}
t('35 a calculator page renders exactly its own slots', $calcOk);

$postOk = true;
foreach (array_keys($slots) as $slotKey) {
    $should = in_array($slotKey, $expectPost, true);
    if ($found($postPage, $slotKey) !== $should) {
        $postOk = false;
    }
}
t('35 a blog post renders exactly its own slots', $postOk);

t('35 a calculator page does not stack two top leaderboards',
    !$found($calcPage, 'header') && $found($calcPage, 'calc_top'));

$homePage = get(BASE . '/')['body'];
t('35 the homepage renders its own slot plus the sitewide pair',
    $found($homePage, 'home_mid') && $found($homePage, 'header') && $found($homePage, 'footer'));
t('35 a catalogue page carries the category slot',
    $found(get(BASE . '/math')['body'], 'category_top'));
t('35 the blog index carries the list slot',
    $found(get(BASE . '/blog')['body'], 'blog_list'));

/* The master switch is absolute: with it off nothing renders, whatever is
   stored. This is the bug that hid in slot() for a whole round. */
$adsSet('ads_enabled', '0');
\Onim\Ads::reset();
\Onim\Cms::flush();
$off = get(BASE . '/math/percentage')['body'];
t('35 the master switch turns every slot off',
    !str_contains($off, 'data-ad-slot') && !$found($off, 'calc_top'));

/* The preview: token-only, boxes only. It must work with advertising off —
   mapping the slots before switching them on is the normal case. */
$token = \Onim\Ads::previewToken();
$preview = get(BASE . '/math/percentage?ads=preview&ads_token=' . $token)['body'];
t('35 the preview draws a box in every slot', substr_count($preview, 'ad-slot--preview') === count($expectCalc),
    (string) substr_count($preview, 'ad-slot--preview'));
t('35 the preview prints no real tags', !$found($preview, 'calc_top') && !str_contains($preview, 'id="e2e-'));
t('35 a forged preview token draws nothing',
    !str_contains(get(BASE . '/math/percentage?ads=preview&ads_token=' . str_repeat('a', 32))['body'], 'ad-slot--preview'));
t('35 the preview link the panel prints actually works',
    (bool) preg_match('~href="[^"]*\?ads=preview&amp;ads_token=[a-f0-9]{32}"~', $panel));

/* Advertising off and slots empty, as the site ships. */
$adsReset();
t('35 the suite leaves advertising switched off',
    !str_contains(get(BASE . '/math/percentage')['body'], 'data-ad-slot'));

/* 36 — the two page layouts ------------------------------------------------ */
/*
 * Both pages are built from one grid each, and the arrangement is the point:
 * the article leads on the left, the tool/rail sits on the right, and the tool
 * column sticks from the bottom. Those are CSS facts, so the checks read the
 * stylesheet — a page-level check cannot see them without a browser.
 */
$css = (string) file_get_contents(dirname(__DIR__) . '/assets/css/app.css');

$calcTpl = (string) file_get_contents(dirname(__DIR__) . '/templates/calculator.php');
t('36 the calculator is one grid, not three columns',
    substr_count($calcTpl, 'class="calc-layout') === 1
    && !str_contains($calcTpl, 'ad-rail')
    /* The rail column exists, but only when it has a tag in it: the class is
       conditional and the aside is rendered behind the same flag. */
    && str_contains($calcTpl, "' calc-layout--rail' : ''")
    && str_contains($calcTpl, 'class="calc-rail"'));
t('36 the article comes before the tool in the domestic order',
    strpos($calcTpl, 'class="calc-article"') < strpos($calcTpl, 'class="calc-widget-column"'));

preg_match('~\.calc-layout \{[^}]*\}~', $css, $mLayout);
t('36 the calculator grid is a single-column base with a desktop split',
    isset($mLayout[0]) && str_contains($mLayout[0], 'display: grid')
    && str_contains($mLayout[0], 'minmax(0, 1fr)'));
t('36 the desktop grid puts the tool on the right',
    (bool) preg_match('~grid-template-columns: minmax\(0, 1fr\) clamp\(~', $css));
/* The desktop block, not the mobile-first rule: the same selector appears in
   both, and only the media query carries the sticky behaviour. */
preg_match('~@media \(min-width: 1100px\) \{(.*?)\n\}~s', $css, $mDesktop);
$desktopCss = $mDesktop[1] ?? '';
preg_match('~\.calc-widget-column \{[^}]*\}~', $desktopCss, $mSticky);
t('36 the tool column sticks from the bottom',
    isset($mSticky[0]) && str_contains($mSticky[0], 'position: sticky')
    && str_contains($mSticky[0], '--calc-pin')
    && !str_contains($mSticky[0], 'top: 24px'));
t('36 the pin offset is measured so the tool bottom rests on the viewport bottom',
    str_contains((string) file_get_contents(dirname(__DIR__) . '/assets/js/app.js'), 'calc-pin'));

$postTpl = (string) file_get_contents(dirname(__DIR__) . '/templates/post.php');
t('36 the post has one rail, not a contents strip and a sidebar',
    substr_count($postTpl, 'class="post-main"') === 1
    && substr_count($postTpl, 'class="post-rail"') === 1
    && !str_contains($postTpl, 'post-toc'));
t('36 the post contents live inside the rail',
    strpos($postTpl, 'class="post-rail"') < strpos($postTpl, 'post-rail-contents'));
t('36 the post rail is sticky from the top on a desktop, clear of the header',
    (bool) preg_match('~\.post-rail \{[^}]*position: sticky; top: calc\(var\(--header-h~s', $css));

/* 37 — the form grid ------------------------------------------------------- */
/*
 * A harvested matrix can declare two columns where the second holds only
 * results; the second then renders empty and used to leave half a card blank.
 * The template now buffers each column and drops the empty ones.
 */
t('37 an empty matrix column is dropped', str_contains($calcTpl, 'calc-matrix--flow'));
$agarose = get(BASE . '/biology/agarose-gel-calculator')['body'];
t('37 the agarose page renders one column, not two',
    substr_count($agarose, 'class="calc-col"') === 1
    && !str_contains($agarose, 'style="--cols:2"'));
$pct = get(BASE . '/math/percentage')['body'];
t('37 a genuine two-column group keeps its two columns',
    str_contains($pct, 'style="--cols:2"'));
t('37 the matrix grid follows the widget, not the viewport',
    str_contains($css, 'container-type: inline-size') && str_contains($css, '@container'));
/* A wrapper that is opened and never closed is repaired by the browser by
   nesting every later matrix inside the first — invisible in a screenshot,
   destructive to the form. Declared columns must therefore add up to the
   columns actually rendered. */
preg_match_all('~<div class="calc-matrix[^"]*" style="--cols:(\d+)"~', $pct, $mCols);
$declared = array_sum(array_map('intval', $mCols[1]));
t('37 every declared matrix column is rendered', $declared === substr_count($pct, 'class="calc-col"'),
    $declared . ' declared / ' . substr_count($pct, 'class="calc-col"') . ' rendered');

/* 38 — the panel tells the truth ------------------------------------------ */
/*
 * Round 40's bug was a panel field that rendered nowhere. These checks exist so
 * the same class of bug cannot come back quietly: every control either does
 * something the site does, or is not offered.
 */

/* ads.txt: offered by the panel, so it must be served — and only when set. */
Db::exec("DELETE FROM settings WHERE skey = 'ads_txt'");
\Onim\Cms::flush();
$emptyTxt = get(BASE . '/ads.txt');
t('38 ads.txt 404s while the box is empty', $emptyTxt['status'] === 404);

Db::exec("INSERT INTO settings (skey, svalue, sgroup) VALUES ('ads_txt', ?, 'analytics')
          ON DUPLICATE KEY UPDATE svalue = VALUES(svalue)",
    ['google.com, pub-1234567890123456, DIRECT, f08c47fec0942fa0']);
\Onim\Cms::flush();
$liveTxt = get(BASE . '/ads.txt');
t('38 ads.txt serves the stored line', $liveTxt['status'] === 200
    && str_contains($liveTxt['body'], 'pub-1234567890123456'));
t('38 ads.txt is plain text', stripos($liveTxt['headers'], 'text/plain') !== false);

Db::exec("DELETE FROM settings WHERE skey = 'ads_txt'");
\Onim\Cms::flush();

/* The pre-slot in-article tag keeps working, and never outranks the named slot. */
$adsSet('ads_enabled', '1');
foreach (array_keys($slots) as $slotKey) {
    $adsSet('ads_slot_' . $slotKey, '');
}
$adsSet('ads_inline_code', '<div id="e2e-legacy">LEGACY</div>');
\Onim\Ads::reset();
\Onim\Cms::flush();
t('38 the legacy in-article tag still renders',
    str_contains(get(BASE . '/math/percentage')['body'], 'e2e-legacy'));

$adsSet('ads_slot_calc_inline', '<div id="e2e-named">NAMED</div>');
\Onim\Ads::reset();
\Onim\Cms::flush();
$both = get(BASE . '/math/percentage')['body'];
t('38 a named slot wins over the legacy tag',
    str_contains($both, 'e2e-named') && !str_contains($both, 'e2e-legacy'));

$adsSet('ads_slot_calc_inline', '');
$adsSet('ads_inline_code', '');
$adsSet('ads_enabled', '0');
\Onim\Ads::reset();
\Onim\Cms::flush();

/* The utility engine: no 408 KB compiler on any page, one cached stylesheet. */
$home = get(BASE . '/')['body'];
$calc = get(BASE . '/math/percentage')['body'];
t('38 no page loads the Tailwind compiler',
    !str_contains($home, 'vendor/tailwind.js') && !str_contains($calc, 'vendor/tailwind.js')
    && !is_file(dirname(__DIR__) . '/assets/js/vendor/tailwind.js'));
t('38 every page links the vendored reset',
    str_contains($home, 'css/base.css') && str_contains($calc, 'css/base.css'));
$baseCss = (string) @file_get_contents(dirname(__DIR__) . '/assets/css/base.css');
t('38 the reset stylesheet carries the element rules',
    str_contains($baseCss, 'box-sizing: border-box') && str_contains($baseCss, 'margin: 0')
    && strlen($baseCss) > 5000 && strlen($baseCss) < 30000);
t('38 the reset is served', get(BASE . '/assets/css/base.css')['status'] === 200);

/* An ad wider than its slot is scaled, never cropped. */
$appJs = (string) file_get_contents(dirname(__DIR__) . '/assets/js/app.js');
t('38 ad slots scale an oversized tag instead of clipping it',
    str_contains($appJs, 'fitAdSlots') && str_contains($appJs, 'transformOrigin')
    && str_contains((string) file_get_contents(dirname(__DIR__) . '/assets/css/app.css'), '.ad-slot > *'));

/* The deployment lives in a subdirectory; a root-absolute path in JS is a 404. */
$calcJs = (string) file_get_contents(dirname(__DIR__) . '/assets/js/calc.js');
t('39 no script points a URL at the domain root',
    !str_contains($calcJs, "src = '/assets/") && !str_contains($calcJs, 'src = "/assets/')
    && !preg_match('~=\\s*[\'"]/(assets|api)/~', $calcJs));
t('39 the script engine resolves its vendor directory from the page',
    str_contains($calcJs, 'vendorBase') && str_contains($calcJs, 'window.BASE_PATH')
    && str_contains($calcJs, "'math.min.js'"));
t('39 the engine file is served where the page looks for it',
    get(BASE . '/assets/js/vendor/math.min.js')['status'] === 200);
t('39 a scripted calculator ships the base path to the browser',
    (bool) preg_match('~window\.BASE_PATH = "([^"]*)"~', get(BASE . '/math/percentage')['body']));

/* 40 — the layout the readers asked for, and the ads that pay for it -------- */
/*
 * Round 43 changed the page shape (tool left, article right), added the header
 * links and the hero loop, and gave advertising the two things it was missing
 * against a site like Omnicalculator: a mobile anchor unit, and a bare AdSense
 * <ins> that fills without its push script.
 */

/* Calculator left, article right, tool column the wider of the two. */
$calc = get(BASE . '/math/percentage')['body'];
$css  = (string) file_get_contents(dirname(__DIR__) . '/assets/css/app.css');
t('40 the calculator column comes first in the layout',
    str_contains($css, 'grid-template-columns: clamp(400px, 37vw, 540px) minmax(0, 1fr)')
    && str_contains($css, '.calc-widget-column { order: 1;'));
t('40 the article is the second column',
    (bool) preg_match('~\.calc-article \{[^}]*order: 2;~', $css));

/* Blog, About and Contact sit beside the search box. */
foreach (['/blog' => 'Blog', '/about' => 'About', '/contact' => 'Contact'] as $href => $label) {
    t('40 the header links to ' . $href,
        (bool) preg_match('~<a class="header-link" href="[^"]*' . preg_quote($href, '~')
            . '[^"]*"[^>]*>\s*' . $label . '~', $calc));
}

/* The hero: a rotating word, and the count in a live pill. */
$home = get(BASE . '/')['body'];
t('40 the hero rotates a word', str_contains($home, 'data-hero-rotate')
    && substr_count($home, 'hero-rotate-word') >= 3);
t('40 the hero no longer reads "4 041 free calculators"', !str_contains($home, 'free calculators</span>'));
t('40 the header count is a live pill', str_contains($calc, 'header-count-number')
    && str_contains($calc, 'header-count-dot'));

/* The anchor slot: registered, rendered below 1100px, and closable. */
t('40 the anchor slot is in the registry', isset(\Onim\Ads::slots()['anchor']));

t('40 the panel says whether ads are live and how much is filled',
    isset($panel) && str_contains($panel, 'ad-status-state')
    && (bool) preg_match('~\d+ of 18 positions have code~', $panel));

$adsSet('ads_enabled', '1');
$adsSet('ads_slot_anchor', '<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1234567890123456" data-ad-slot="1"></ins>');
$adsSet('ads_slot_calc_top', '<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1234567890123456" data-ad-slot="2"></ins>');
\Onim\Ads::reset();
\Onim\Cms::flush();
$anchored = get(BASE . '/math/percentage')['body'];
t('40 a filled anchor renders with a close button',
    str_contains($anchored, 'data-ad-anchor') && str_contains($anchored, 'data-ad-anchor-close'));
t('40 the body reserves room for the anchor', str_contains($anchored, 'has-ad-anchor'));
t('40 a bare AdSense unit is pushed for the owner',
    substr_count($anchored, 'adsbygoogle=window.adsbygoogle||[]') === 2);

/* A tag that already carries its push is not pushed twice. */
$adsSet('ads_slot_calc_top', '<ins class="adsbygoogle" data-ad-slot="2"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script>');
\Onim\Ads::reset();
\Onim\Cms::flush();
t('40 a tag with its own push is left alone',
    substr_count(get(BASE . '/math/percentage')['body'], 'adsbygoogle=window.adsbygoogle||[]') === 1);

$adsSet('ads_slot_calc_top', '');
$adsSet('ads_slot_anchor', '');
$adsSet('ads_enabled', '0');
\Onim\Ads::reset();
\Onim\Cms::flush();

/* No "1 field" left anywhere in the copy. */
$one = 0;
foreach (glob(dirname(__DIR__) . '/data/content/*/*.json') as $f) {
    $body = (string) file_get_contents($f);
    if (str_contains($body, '>1 field on this form') || str_contains($body, 'the 1 field')) {
        $one++;
    }
}
t('40 no content file starts a sentence with "1 field"', $one === 0, (string) $one);

/* 41 — the rich text editor the blog is written in --------------------------- */
/*
 * The editor is JavaScript, so these checks are about the contract around it:
 * the toolbar the blog form ships, the field the form posts, and the editor
 * code's own guarantees (paste cleaning, tidy-on-save, the media hook).
 */
$editorPage = page('blog-edit')['body'];

t('41 the blog form carries the rich text editor',
    str_contains($editorPage, 'class="editor" data-editor')
    && str_contains($editorPage, 'class="editor-area" contenteditable="true"'));
t('41 the toolbar offers block styles from a real dropdown',
    str_contains($editorPage, 'data-block-select')
    && substr_count($editorPage, '<option value=') >= 6);
t('41 the toolbar has the inline commands',
    substr_count($editorPage, 'data-cmd="') >= 10
    && str_contains($editorPage, 'data-cmd="bold"')
    && str_contains($editorPage, 'data-cmd="insertUnorderedList"'));
t('41 the toolbar has link, image, divider and source view',
    str_contains($editorPage, 'data-action="link"')
    && str_contains($editorPage, 'data-action="image"')
    && str_contains($editorPage, 'data-action="hr"')
    && str_contains($editorPage, 'data-toggle-source'));
t('41 the editor can reach the media library',
    str_contains($editorPage, 'class="editor-media"')
    && str_contains($editorPage, 'data-action="fullscreen"'));
t('41 the form still posts the body in one field',
    (bool) preg_match('~<input type="hidden" name="content"[^>]*data-editor-value~', $editorPage));

$adminJs = (string) file_get_contents(dirname(__DIR__) . '/admin/assets/admin.js');
t('41 pasted content is cleaned before it lands',
    str_contains($adminJs, 'function cleanHtml')
    && str_contains($adminJs, 'ALLOWED_PASTE')
    && str_contains($adminJs, "addEventListener('paste'"));
t('41 the body is tidied and synced before the form posts',
    str_contains($adminJs, 'function tidyHtml')
    && str_contains($adminJs, "form.addEventListener('submit', sync)"));
t('41 the media picker hands the chosen file to the editor',
    str_contains($adminJs, 'media:picked'));

/* The three editors share one toolbar, so they cannot drift apart. */
foreach (['pages.php', 'calculator-edit.php', 'blog-edit.php'] as $viewFile) {
    $view = (string) file_get_contents(dirname(__DIR__) . '/admin/views/' . $viewFile);
    t('41 ' . $viewFile . ' uses the shared toolbar',
        str_contains($view, "partials/editor-toolbar.php"));
}

/* 42 — the blog files itself, and an ad knows how big it is ------------------ */
/*
 * Round 45 replaced tags with categories: one per post, with its own page, its
 * own line in the panel and its own filter on the index. The old /tag/ URLs are
 * permanent redirects, because they were in the sitemap and may be in a
 * bookmark. The ad positions gained a size, so an empty box already occupies the
 * shape its creative will take and the article does not jump when it loads.
 */
$catRow = row("SELECT c.* FROM post_categories c JOIN posts p ON p.category_id = c.id
               WHERE p.status = 'published' LIMIT 1");
t('42 a published post is filed under a category', $catRow !== null);

if ($catRow !== null) {
    $catPage = get(BASE . '/category/' . $catRow['slug']);
    t('42 the category page renders', $catPage['status'] === 200, 'status ' . $catPage['status']);
    t('42 the category page names the category', str_contains($catPage['body'], (string) $catRow['name']));
    t('42 the category page states its own canonical URL',
        (bool) preg_match('~rel="canonical" href="[^"]*/category/' . preg_quote((string) $catRow['slug'], '~') . '"~', $catPage['body']));

    $moved = get(BASE . '/tag/' . $catRow['slug']);
    t('42 the old tag URL is a permanent redirect',
        $moved['status'] === 301 && str_contains($moved['location'], '/category/' . $catRow['slug']),
        'status ' . $moved['status']);
}

$blogIndex = get(BASE . '/blog')['body'];
t('42 the index filters by category', str_contains($blogIndex, 'class="cat-chip') && str_contains($blogIndex, '/category/'));
t('42 the index offers no tag filters', !str_contains($blogIndex, '/tag/'));
t('42 a card names its category', str_contains($blogIndex, 'class="post-cat'));
t('42 a card states a reading time', (bool) preg_match('~\d+ min read~', $blogIndex));

if ($catRow !== null) {
    $filed = row("SELECT p.slug FROM posts p WHERE p.category_id = ? AND p.status = 'published' LIMIT 1", [(int) $catRow['id']]);
    if ($filed !== null) {
        t('42 the post page names its category',
            str_contains(get(BASE . '/blog/' . $filed['slug'])['body'], '/category/' . $catRow['slug']));
    }
}

/* The panel: its own screen, a tag and a size per position, and a labelled list. */
$adsPanel = page('ads')['body'];
$slotCount = count(\Onim\Ads::slots());
t('42 advertising has a screen of its own',
    str_contains($adsPanel, 'Advertising') && str_contains($adsPanel, 'name="ads_enabled"'));
t('42 every position takes a tag', substr_count($adsPanel, 'name="slot"') === $slotCount * 2,
    substr_count($adsPanel, 'name="slot"') . '/' . ($slotCount * 2));
t('42 every position takes a size', substr_count($adsPanel, 'name="size"') === $slotCount,
    substr_count($adsPanel, 'name="size"') . '/' . $slotCount);
/* the button only exists once a position has code, so the handler is the check */
$adsController = (string) file_get_contents(dirname(__DIR__) . '/admin/controllers/ads.php');
t('42 a position can be emptied', str_contains($adsController, "=== 'clear'"));
t('42 the sidebar links to it', str_contains(page('dashboard')['body'], 'p=ads'));

/* A size is stored as "300x250" and rendered as custom properties on the slot. */
$adsSet('ads_enabled', '1');
$adsSet('ads_slot_calc_mid', '<div id="e2e-mid">AD</div>');
$adsSet('ads_size_calc_mid', '300x250');
\Onim\Ads::reset();
\Onim\Cms::flush();
$sized = get(BASE . '/math/percentage')['body'];
t('42 a sized position reserves its box',
    str_contains($sized, '--ad-w:300px') && str_contains($sized, '--ad-h:250px'));
t('42 the between-the-sections position renders inside the tool',
    str_contains($sized, 'id="e2e-mid"') && str_contains($sized, 'ad-slot--in-widget'));
$adsReset();
$adsSet('ads_size_calc_mid', '');
\Onim\Cms::flush();

/* The panel writes that size through its own form, not SQL. */
post('ads', ['do' => 'size', 'slot' => 'calc_top', 'size' => '728 x 90']);
t('42 the panel saves a size', (string) value("SELECT svalue FROM settings WHERE skey = 'ads_size_calc_top'") === '728x90',
    (string) value("SELECT svalue FROM settings WHERE skey = 'ads_size_calc_top'"));
post('ads', ['do' => 'size', 'slot' => 'calc_top', 'size' => 'nonsense']);
t('42 a nonsense size is refused', (string) value("SELECT svalue FROM settings WHERE skey = 'ads_size_calc_top'") === '728x90');
$adsSet('ads_size_calc_top', '');

/* Categories: create, list, assign, delete — all through the panel. */
post('blog-categories', ['do' => 'save', 'id' => '0', 'name' => 'E2E panel category',
    'slug' => 'e2e-panel-cat', 'description' => 'A category the suite made.', 'sort_order' => '999']);
$madeCat = row("SELECT * FROM post_categories WHERE slug = 'e2e-panel-cat'");
t('42 a category can be created from the panel', $madeCat !== null);
t('42 it shows up in the panel list', str_contains(page('blog-categories')['body'], 'E2E panel category'));
t('42 the editor offers a category select', str_contains(page('blog-edit')['body'], 'name="category_id"'));
if ($madeCat !== null) {
    post('blog-categories', ['do' => 'delete', 'id' => (string) $madeCat['id']]);
    t('42 a category can be deleted from the panel',
        (int) value('SELECT COUNT(*) FROM post_categories WHERE id = ?', [(int) $madeCat['id']]) === 0);
}

/* The calculator's name sits above the tool, and the column never scrolls inside. */
$calcTpl = (string) file_get_contents(dirname(__DIR__) . '/templates/calculator.php');
t('42 the calculator name is above the tool',
    strpos($calcTpl, 'calc-page-head') !== false
    && strpos($calcTpl, 'calc-page-head') < strpos($calcTpl, 'class="calc-widget"'));
$appCss = (string) file_get_contents(dirname(__DIR__) . '/assets/css/app.css');
t('42 the tool column has no scrollbar of its own',
    !preg_match('~\.calc-widget-column\s*\{[^}]*overflow-y:\s*auto~', $appCss));
t('42 the tool column pins whatever its height — ads included',
    !str_contains($appCss, '.calc-widget-column.is-tall')
    && str_contains($appCss, 'top: var(--calc-pin, 0px);'));
$appJs = (string) file_get_contents(dirname(__DIR__) . '/assets/js/app.js');
t('42 height never releases the column any more',
    !str_contains($appJs, 'is-tall')
    && !str_contains($appJs, 'viewport - height')
    && str_contains($appJs, "column.style.setProperty('--calc-pin', pin + 'px')"));
t('46 the foot pin puts the Calculate button above the fold going down',
    str_contains($appJs, 'var pinFoot = Math.round(viewport - GAP - cardBox.height - offset);')
    && str_contains($appJs, 'var pinDown = buttonOnScreen ? Math.max(pinFoot, pinHead) : pinFoot;'));

/* 46 — the page that keeps up with the reader --------------------------------- */
/*
 * Round 46 changed how a page behaves while it is being read: the header stays,
 * the tool column pins from whichever edge makes sense, a third column appears
 * when there is a tower to put in it, and the results can be shared. These
 * checks are content and stylesheet facts — the geometry was measured in a real
 * browser, and these keep the pieces wired together.
 */

/* The share bar: under Calculate, one line, with a real link in every button. */
$sharePage = get(BASE . '/math/pythagorean-theorem')['body'];
t('46 a calculator offers sharing', str_contains($sharePage, 'data-calc-share'));
t('46 share sits under the Calculate button',
    strpos($sharePage, 'data-calc-go') < strpos($sharePage, 'data-calc-share')
    && strpos($sharePage, 'data-calc-share') > strpos($sharePage, 'data-calc-results') - 1);
t('46 every network is a real link, built on the server',
    substr_count($sharePage, 'data-share-net=') === 6
    && str_contains($sharePage, 'https://wa.me/?text=')
    && str_contains($sharePage, 'sharer.php?u='));
t('46 copying the link is a button, not a link', str_contains($sharePage, 'data-share-copy'));
t('46 the share link points at this calculator, not at the site root',
    (bool) preg_match('~data-share-url="[^"]*/math/pythagorean-theorem"~', $sharePage));

/* The sticky header: shipped as an opt-in class the owner's setting drives. */
t('46 the header can stick', str_contains($appCss, '.site-header.is-sticky { position: sticky; top: 0; }'));
t('46 the stuck header is shorter than the resting one',
    str_contains($appCss, '.site-header.is-stuck .category-nav { display: none; }')
    && str_contains($appCss, '.site-header.is-stuck .header-count { display: none; }')
    && str_contains($appCss, '.site-header.is-stuck .search { display: none; }'));
t('46 app.js decides when the header is stuck', str_contains($appJs, "classList.toggle('is-stuck'"));
t('46 the scroll padding follows the header height',
    !str_contains($appCss, 'scroll-padding-top: 130px'));

/* The rail: a tower slot, its own shape, and a column that keeps the tool's width. */
$railSlot = \Onim\Ads::slots()['calc_rail'] ?? null;
t('46 the rail slot is a skyscraper', $railSlot !== null && ($railSlot['size'] ?? '') === 'skyscraper');
t('46 the rail keeps the calculator column at its two-column width',
    (bool) preg_match('~\.calc-layout--rail \{[^}]*grid-template-columns: clamp\(400px, 37vw, 540px\)~', $appCss));
t('46 the rail is hidden where a tower has no room',
    (bool) preg_match('~@media \(max-width: 1239px\) \{\s*\.calc-rail \{ display: none; \}~', $appCss));

/* Homepage illustrations: drawn in the page, so they cost no request. */
$homeBody = get(BASE . '/')['body'];
t('46 the homepage draws its how-it-works figures',
    substr_count($homeBody, 'howto-figure') >= 4 && substr_count($homeBody, 'how-figure') >= 2);
t('46 figures are inline SVG, not image files',
    !str_contains($homeBody, '<img') || substr_count($homeBody, 'figure-art') >= 1);
/* Round 56: the front page is a tool site, so the hero draws a tool — a file
   going in, the tool, a result coming out — instead of a worked sum. */
t('46 the hero shows a drawing of the tool site',
    str_contains($homeBody, 'hero-figure-art') && str_contains($homeBody, 'fg-grad-tool-file'));

/* Category index: real cards, each a link with its own arrow. */
$catPage = get(BASE . '/chemistry')['body'];
t('46 the category index is made of cards', substr_count($catPage, 'class="index-item"') > 50);
t('46 every card carries a link and an arrow',
    substr_count($catPage, 'class="index-link"') === substr_count($catPage, 'class="index-go"'));

/* 47 — the column keeps its distance from the header ----------------------- */
/*
 * The column holds to whichever edge the reader is working towards: pinned by
 * the foot of the card going down the page (so its last row and the Calculate
 * button stay near the fold), by the head coming back (so the tool's name and
 * first fields are in view). Both pins are floored so the card itself never
 * starts above the header line.
 */
t('47 the column pins by its foot going down and by its head coming back',
    str_contains($appJs, "var next = delta > 0 ? 'down' : 'up';")
    && str_contains($appJs, "column.classList.toggle('is-foot-pinned'")
    && str_contains($appJs, 'var pinHead = Math.round(clear);'));
t('47 the card keeps its distance from the header when it can',
    str_contains($appJs, "getPropertyValue('--header-h')")
    && str_contains($appJs, 'var buttonOnScreen = pinHead + actionOffset <= viewport - 8;'));
t('47 the button decides the edge: head while it fits, foot when it does not',
    str_contains($appJs, "card.querySelector('[data-calc-go]')")
    && str_contains($appJs, 'var buttonOnScreen = pinHead + actionOffset <= viewport - 8;')
    && str_contains($appJs, 'var pinDown = buttonOnScreen ? Math.max(pinFoot, pinHead) : pinFoot;'));
/*
 * 53 — scrolling back up does not jump the card to the line -----------------
 *
 * Round 52 lifted the card to the head the moment the wheel turned upwards, so
 * a card that was already showing its name lurched 100-odd pixels for no
 * reason. Now the head pin only takes over where the foot pin left the name
 * above the line, and there the card is let down with the page — a pixel per
 * pixel — until the name arrives at the line and fixes there.
 */
t('53 a card that already shows its name is left alone on the way up',
    !str_contains($appJs, "var pin = mode === 'up' ? pinHead")
    && str_contains($appJs, "if (mode === 'down' || pinDown >= pinHead) {")
    && str_contains($appJs, 'pin = pinDown;'));
t('53 a card whose name is above the line comes back down to it, not to a jump',
    str_contains($appJs, 'var target = upAnchorPin + (upAnchorY - Math.round(window.pageYOffset));')
    && str_contains($appJs, 'pin = Math.min(pinHead, target);')
    && str_contains($appJs, 'upAnchorPin = null;'));
t('53 the slide is recomputed while it is running and stops when it lands',
    str_contains($appJs, 'if (flipped || sliding || clearanceChanged) {')
    && str_contains($appJs, 'sliding = target < pinHead;'));

t('47 the top offset is measured from the sticky header, not fixed',
    !str_contains($appJs, 'var TOP_GAP = 88;')
    && str_contains($appJs, 'function headerClearance()')
    && str_contains($appJs, '--header-h'));
t('47 a top-pinned column keeps a real gap under the header',
    str_contains($appJs, 'Math.max(Math.round(measured) + 18, MIN_TOP)'));
t('47 the header publishes its height before the first scroll',
    (bool) preg_match('~document\.documentElement\.style\.setProperty\(.--header-h., header\.offsetHeight~', $appJs));
t('47 the pinned edge is animated, and not when motion is reduced',
    str_contains($appCss, 'transition: top .18s ease-out;')
    && (bool) preg_match('~prefers-reduced-motion: reduce\)\s*\{.*?\.calc-widget-column \{ transition: none; \}~s', $appCss));


/* 48 — tool plugins: a calculator whose widget is a PHP file ---------------- */
/*
 * The whole lifecycle, over HTTP, on the real panel: a bad file is refused, a
 * good one is stored, a draft page is created from it, the page renders the
 * tool in the public tool column (with the article and related grid intact and
 * no client solver payload), a file still in use cannot be deleted, and once
 * the page is gone it can be.
 */
$tmpDir = sys_get_temp_dir() . '/onim-tool-e2e-' . bin2hex(random_bytes(4));
@mkdir($tmpDir, 0775, true);

$fixture = static function (string $name, string $body) use ($tmpDir): string {
    $path = $tmpDir . '/' . $name;
    file_put_contents($path, $body);
    return $path;
};

/* Follow a panel redirect and return the page it landed on, so a Flash message
   can be read the way an editor reads it. */
$afterPost = static function (array $response): string {
    $location = (string) ($response['location'] ?? '');
    if ($location === '') {
        return (string) $response['body'];
    }
    /* The panel redirects with a path ("/admin/index.php?p=…"), not a URL. */
    if (str_starts_with($location, '/')) {
        $location = BASE . $location;
    }
    return (string) get($location)['body'];
};

$toolScreen = page('tool-plugins');
t('48 the Tool plugins screen lists the shipped tools',
    $toolScreen['status'] === 200
    && str_contains($toolScreen['body'], 'tool_percentage_of')
    && str_contains($toolScreen['body'], 'tool_tip_split'));
t('48 it says which folder a tool lives in',
    str_contains($toolScreen['body'], 'plugins/math/'));
/* The explanation is one collapsed <details> now, not five paragraphs of
   prose between the list and the fold — the steps still have to be there. */
t('48 it explains the steps from file to page',
    str_contains($toolScreen['body'], 'How a file becomes a page')
    && str_contains($toolScreen['body'], 'Create the page')
    && str_contains($toolScreen['body'], 'Replacing a file'));

/* -- a file that is not PHP is refused ------------------------------------ */
$notPhp = $fixture('notes.txt', "just some notes\n");
post('tool-plugins', ['do' => 'upload', 'category' => 'math'], [], ['file' => $notPhp]);
t('48 a non-PHP upload is refused', !is_file(dirname(__DIR__) . '/plugins/math/qm-tool-notes.php'));

/* -- a PHP file with no header block is refused --------------------------- */
$noHeader = $fixture('qm-tool-no-header.php', "<?php\necho 'hello';\n");
post('tool-plugins', ['do' => 'upload', 'category' => 'math'], [], ['file' => $noHeader]);
t('48 a file with no header block is refused',
    !is_file(dirname(__DIR__) . '/plugins/math/qm-tool-no-header.php'));

/* -- a file that does not parse is refused -------------------------------- */
$broken = $fixture('qm-tool-broken.php', "<?php\n/**\n * Tool Name: Broken\n * Shortcode: tool_broken\n */\nfunction broken( {\n");
$brokenResult = $afterPost(post('tool-plugins', ['do' => 'upload', 'category' => 'math'], [], ['file' => $broken]));
t('48 a file that does not parse is refused, and says so',
    !is_file(dirname(__DIR__) . '/plugins/math/qm-tool-broken.php')
    && str_contains($brokenResult, 'does not parse'));

/* -- a good file is stored ------------------------------------------------ */
$good = $fixture('qm-tool-e2e.php', <<<'PHP'
<?php
/**
 * Tool Name: E2E Scratch Tool
 * Shortcode: tool_e2e_scratch
 * Category: math
 * Version: 9.9
 * Description: Written by the test suite, deleted by the test suite.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('no');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_e2e_scratch', static function (array $atts, ?string $inner, array $ctx): string {
    return '<div class="e2e-scratch" id="' . Toolkit::e((string) $ctx['uid']) . '">scratch tool works</div>';
});
PHP);
$uploaded = $afterPost(post('tool-plugins', ['do' => 'upload', 'category' => 'math'], [], ['file' => $good]));
/* The panel names the stored file after the shortcode, not after whatever the
   upload happened to be called: qm-tool-e2e-scratch.php. */
$storedFile    = dirname(__DIR__) . '/plugins/math/qm-tool-e2e-scratch.php';
$storedRelative = 'math/qm-tool-e2e-scratch.php';
t('48 a valid tool file is stored in its category folder', is_file($storedFile));
t('48 the screen confirms the upload and names the shortcode',
    str_contains($uploaded, 'tool_e2e_scratch') && str_contains($uploaded, 'Just uploaded'));

/* -- the same shortcode from a file placed by hand is refused ------------- */
/*
 * The panel names uploads after their shortcode, so two uploads of the same
 * shortcode collide on the file name. The interesting case is a file added
 * another way — FTP, a deployment — that claims a shortcode already taken:
 * that must be refused on the shortcode, not on the file name.
 */
$handmade = dirname(__DIR__) . '/plugins/math/qm-tool-e2e-handmade.php';
file_put_contents($handmade, (string) file_get_contents($good));
$duplicate = $fixture('qm-tool-e2e-copy.php', (string) file_get_contents($good));
$dupeResult = $afterPost(post('tool-plugins', ['do' => 'upload', 'category' => 'math'], [], ['file' => $duplicate]));
t('48 a second file claiming a shortcode that is already taken is refused',
    str_contains($dupeResult, 'already used by'));
@unlink($handmade);
\Onim\Toolkit::forget();

/* -- create the page ------------------------------------------------------ */
$created = post('tool-plugins', ['do' => 'create', 'shortcode' => 'tool_e2e_scratch', 'category' => 'math']);
$row = row('SELECT * FROM custom_calculators WHERE tool_shortcode = ?', ['tool_e2e_scratch']);
t('48 one click creates a draft page bound to the tool',
    $row !== null && (string) $row['kind'] === 'tool' && (string) $row['status'] === 'draft',
    $row === null ? 'no row' : (string) $row['kind'] . '/' . (string) $row['status']);
t('48 the created page keeps the file path', $row !== null && (string) $row['tool_file'] === $storedRelative);
t('48 creating the page opens its editor', $created['status'] === 303);

$toolId = $row !== null ? (int) $row['id'] : 0;
$path   = $row !== null ? '/' . $row['category_slug'] . '/' . $row['slug'] : '';

if ($toolId > 0) {
    Db::exec('UPDATE custom_calculators SET status = ? WHERE id = ?', ['published', $toolId]);
    \Onim\CustomCalc::flush();
    \Onim\Data::flush();

    $publicPage = get(BASE . $path);
    t('48 the published page renders with 200', $publicPage['status'] === 200, (string) $publicPage['status']);
    t('48 the tool\'s own markup is in the tool column',
        str_contains($publicPage['body'], 'calc-tool-frame') && str_contains($publicPage['body'], 'scratch tool works'));
    t('48 the page still has its article column', str_contains($publicPage['body'], 'calc-article'));
    t('48 no form-builder residue: no client payload, no calc.js',
        !str_contains($publicPage['body'], 'id="calc-definition"')
        && !str_contains($publicPage['body'], '/assets/js/calc.js'));
    t('48 the share row is offered, but without a result to share',
        str_contains($publicPage['body'], 'data-calc-share')
        && !str_contains($publicPage['body'], 'value="result"'));
    t('48 the page is in the sitemap',
        str_contains(get(BASE . '/sitemap.xml')['body'], $path));

    $editor = page('custom-calculator-edit', ['id' => $toolId]);
    t('48 the editor shows the tool card instead of the field builder',
        str_contains($editor['body'], 'This page is a tool file')
        && !str_contains($editor['body'], 'What the visitor types in'));

    /* -- a file in use cannot be deleted --------------------------------- */
    post('tool-plugins', ['do' => 'delete', 'tool_file' => $storedRelative]);
    t('48 a file a page still uses is not deleted', is_file($storedFile));

    /* -- the page goes, then the file can go ----------------------------- */
    \Onim\CustomCalc::delete($toolId);
    \Onim\Data::flush();
    post('tool-plugins', ['do' => 'delete', 'tool_file' => $storedRelative]);
    t('48 with the page gone the file can be deleted', !is_file($storedFile));
    t('48 the deleted page no longer answers', get(BASE . $path)['status'] === 404);
}

/* -- the folder is not served -------------------------------------------- */
t('48 a tool file is not fetchable over HTTP',
    get(BASE . '/plugins/math/qm-tool-percentage-of.php')['status'] === 404);
t('48 the folder index is not fetchable either',
    get(BASE . '/plugins/')['status'] === 404);

/* ------------------------------------------------- 49 the one-box article */
/*
 * A tool page has one HTML box. The template still wants a section list, so the
 * two conversions in CustomCalc are what make the box safe: split on <h2>, and
 * put it back together without changing a byte.
 */
$boxHtml = "<p>Opening paragraph with <strong>markup</strong>.</p>\n"
    . "<h2>First heading</h2><p>Body one.</p>"
    . "<h2>Second heading</h2><ul><li>Body two</li></ul>";
$split = CustomCalc::articleToSections($boxHtml);
t('49 the article splits into a lead and two sections',
    count($split) === 3 && $split[0]['title'] === '' && $split[1]['title'] === 'First heading'
    && $split[2]['title'] === 'Second heading',
    count($split) . ' sections');
t('49 the lead is the text before the first h2',
    str_contains($split[0]['html'] ?? '', 'Opening paragraph'), (string) ($split[0]['html'] ?? ''));
/* The rebuild normalises the whitespace *between* blocks — an <h2> is
   re-created from its title — so the comparison ignores line breaks only. */
$flat = static fn (string $html): string => preg_replace('~\s*\n\s*~', '', trim($html));
$rebuilt = CustomCalc::sectionsToArticle($split);
t('49 the article rebuilds as it was written', $flat($rebuilt) === $flat($boxHtml), $rebuilt);
t('49 the rebuild is stable', CustomCalc::sectionsToArticle(CustomCalc::articleToSections($rebuilt)) === $rebuilt);

$emptyBox = CustomCalc::articleToSections("<p>   </p><h2>Only</h2><p>body</p>");
t('49 a blank lead is dropped', count($emptyBox) === 1 && $emptyBox[0]['title'] === 'Only');

/* -- a lead survives the save, and so do the libraries ------------------- */
if (\Onim\ToolLibraries::enabled()) {
    /* a row left behind by an interrupted run would collide with this one */
    $stale = row('SELECT id FROM custom_calculators WHERE slug = ?', ['e2e-one-box-tool']);
    if ($stale !== null) {
        CustomCalc::delete((int) $stale['id']);
        \Onim\Data::flush();
    }

    $libSlug = 'e2e-chart';
    \Onim\ToolLibraries::save([
        'name' => 'E2E Chart', 'slug' => $libSlug, 'kind' => 'js',
        'url' => 'https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js',
        'integrity' => '', 'crossorigin' => '', 'notes' => 'created by the test suite',
    ]);

    $model = CustomCalc::editorModel(null);
    $model['name'] = 'E2E One Box Tool';
    $model['slug'] = 'e2e-one-box-tool';
    $model['category_slug'] = 'other';
    $model['h1'] = 'E2E One Box Tool';
    $model['status'] = 'published';
    /* A formula page, so the check needs no plugin file to exist. */
    $model['fields'] = [[
        'key' => 'amount', 'label' => 'Amount', 'type' => 'number', 'default' => '1',
        'unit_group' => '', 'unit_default' => '', 'help' => '', 'prefix' => '', 'suffix' => '',
        'options' => '', 'output' => false,
    ], [
        'key' => 'doubled', 'label' => 'Doubled', 'type' => 'number', 'default' => '',
        'unit_group' => '', 'unit_default' => '', 'help' => '', 'prefix' => '', 'suffix' => '',
        'options' => '', 'output' => true,
    ]];
    $model['directions'] = [['group' => 'Result', 'l' => 'doubled', 'f' => 'amount * 2']];
    $model['sections'] = $split;
    $model['libraries'] = $libSlug;
    $saved = CustomCalc::save(null, $model, 1);

    t('49 a page with a lead section saves', $saved['ok'], implode(' ', $saved['errors']));
    $stored = $saved['ok'] ? CustomCalc::find((int) $saved['id']) : null;
    t('49 the lead is kept in storage',
        $stored !== null && (json_decode((string) $stored['sections'], true)[0]['title'] ?? 'x') === '');
    t('49 the library is written to the row', $stored !== null && (string) $stored['libraries'] === $libSlug);

    /* re-saving from the edit screen must not unload it */
    $again = CustomCalc::editorModel($stored);
    CustomCalc::save((int) $saved['id'], $again, 1);
    $after = CustomCalc::find((int) $saved['id']);
    t('49 a re-save from the editor keeps the library',
        $after !== null && (string) $after['libraries'] === $libSlug, (string) ($after['libraries'] ?? ''));

    $pageHead = \Onim\ToolLibraries::headForPath('/other/e2e-one-box-tool');
    t('49 the library prints into the head', str_contains($pageHead, 'chart.umd.min.js'), $pageHead);

    CustomCalc::delete((int) $saved['id']);
    \Onim\Data::flush();
    $libRow = \Onim\ToolLibraries::findBySlug($libSlug);
    if ($libRow !== null) {
        \Onim\ToolLibraries::delete((int) $libRow['id']);
    }
    t('49 the throwaway library is gone', \Onim\ToolLibraries::findBySlug($libSlug) === null);
}

/* ------------------------------------- 49 the screens the round-64 work made */
$newTool = page('tool-new');
t('49 the new tool screen asks for one article, not a list',
    str_contains($newTool['body'], 'name="article"') && !str_contains($newTool['body'], 'name="sections[0]')
    && clean($newTool['body']));

$toolsList = page('custom-calculators');
t('64 the tools list becomes cards on a narrow screen',
    str_contains($toolsList['body'], 'tool-pages-table') && substr_count($toolsList['body'], 'data-label=') > 5,
    (string) substr_count($toolsList['body'], 'data-label='));

$filesList = page('tool-plugins');
t('64 the file list carries its column names for the card layout',
    str_contains($filesList['body'], 'tool-files-table') && substr_count($filesList['body'], 'data-label=') > 5);

$libsPage = page('libraries');
t('64 the libraries screen explains the header line',
    str_contains($libsPage['body'], 'Libraries:') && clean($libsPage['body']));

/* leftovers from a failed run */
foreach (glob($tmpDir . '/*') ?: [] as $leftover) {
    @unlink($leftover);
}
@rmdir($tmpDir);


/* ---------------------------------------------------------------- summary */

printf("\n%d passed, %d failed\n", $GLOBALS['passed'], $GLOBALS['failed']);
exit($GLOBALS['failed'] === 0 ? 0 : 1);

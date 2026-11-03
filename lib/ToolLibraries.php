<?php
/**
 * ToolLibraries — the third-party scripts and stylesheets a tool needs.
 *
 * A widget is PHP that prints markup; the hard part of many widgets is in a
 * library — a chart renderer, a formula typesetter, a CSV parser. Those used to
 * be pasted into each tool file as a raw <script src="…">, which meant the same
 * address was retyped in a dozen files and could not be seen from the panel.
 *
 * This class owns them:
 *
 *   rows()            every row, for the admin list
 *   find()/save()     one row
 *   forTool()         the libraries a tool file asks for, from its header
 *   discover()        create the rows a tool file mentions, and attach them
 *   forPath()         the libraries a published page loads, for the front end
 *   headHtml()        the tags, in load order, escaped
 *
 * A tool file declares them in its header block, either by name from the
 * registry below or by address:
 *
 *     * Libraries: chart-js, katex
 *     * Libraries: https://cdn.example.com/lib.min.js
 *
 * A name with no row is looked up in KNOWN and created with auto = 1, so the
 * first upload of a Chart.js tool is enough for the script to load.
 */

declare(strict_types=1);

namespace Onim;

final class ToolLibraries
{
    /**
     * The addresses a declared name resolves to when no row exists yet.
     *
     * These are pinned to exact versions on purpose: a tool that renders money
     * should not change its output the day a CDN publishes a major release.
     * The owner can edit any row in the panel — pointing it at a self-hosted
     * copy only takes changing the address.
     */
    public const KNOWN = [
        'chart-js'   => ['name' => 'Chart.js',        'kind' => 'js',  'url' => 'https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js'],
        'katex'      => ['name' => 'KaTeX',           'kind' => 'css', 'url' => 'https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css'],
        'katex-js'   => ['name' => 'KaTeX script',    'kind' => 'js',  'url' => 'https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js'],
        'mathjax'    => ['name' => 'MathJax',         'kind' => 'js',  'url' => 'https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js'],
        'd3'         => ['name' => 'D3',              'kind' => 'js',  'url' => 'https://cdn.jsdelivr.net/npm/d3@7/dist/d3.min.js'],
        'plotly'     => ['name' => 'Plotly',          'kind' => 'js',  'url' => 'https://cdn.jsdelivr.net/npm/plotly.js-dist-min@2.27.0/plotly.min.js'],
        'papaparse'  => ['name' => 'PapaParse',       'kind' => 'js',  'url' => 'https://cdn.jsdelivr.net/npm/papaparse@5.4.1/papaparse.min.js'],
        'jspdf'      => ['name' => 'jsPDF',           'kind' => 'js',  'url' => 'https://cdn.jsdelivr.net/npm/jspdf@2.5.1/dist/jspdf.umd.min.js'],
        'xlsx'       => ['name' => 'SheetJS',         'kind' => 'js',  'url' => 'https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js'],
        'marked'     => ['name' => 'Marked',          'kind' => 'js',  'url' => 'https://cdn.jsdelivr.net/npm/marked@12.0.0/marked.min.js'],
        'dompurify'  => ['name' => 'DOMPurify',       'kind' => 'js',  'url' => 'https://cdn.jsdelivr.net/npm/dompurify@3.0.8/dist/purify.min.js'],
        'alpine'     => ['name' => 'Alpine.js',       'kind' => 'js',  'url' => 'https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js'],
    ];

    /** @var array<int,array>|null */
    private static ?array $rows = null;

    /**
     * Both halves of migration 015 must be in place before anything here runs:
     * the table that holds the addresses, and the column that points a page at
     * them. Half a migration is the one state that would fatal, so it is checked
     * as one fact.
     */
    public static function enabled(): bool
    {
        return class_exists(Db::class)
            && Db::hasTable('tool_libraries')
            && Db::hasColumn('custom_calculators', 'libraries');
    }

    /**
     * Take an uploaded .js/.css and put it where the site can serve it.
     *
     * Not every library comes from a CDN: a plugin the owner bought, or a build
     * they made themselves, arrives as a file. It is stored under
     * assets/libraries/ and the row points at that path, so swapping the file
     * later is a new upload and nothing else changes.
     *
     * @return string the public path, or '' on failure (with $error set)
     */
    public static function storeUpload(array $file, string $kind, string &$error = ''): string
    {
        $error = '';
        $code  = (int) ($file['error'] ?? UPLOAD_ERR_NO_FILE);
        if ($code === UPLOAD_ERR_NO_FILE) {
            return '';
        }
        if ($code !== UPLOAD_ERR_OK) {
            $error = $code === UPLOAD_ERR_INI_SIZE || $code === UPLOAD_ERR_FORM_SIZE
                ? 'That file is larger than the server accepts.'
                : 'The upload failed (error ' . $code . ').';
            return '';
        }
        $tmp = (string) ($file['tmp_name'] ?? '');
        if ($tmp === '' || !is_uploaded_file($tmp)) {
            $error = 'That file did not arrive through an upload.';
            return '';
        }
        if ((int) ($file['size'] ?? 0) <= 0) {
            $error = 'The file is empty.';
            return '';
        }
        if ((int) $file['size'] > 4 * 1024 * 1024) {
            $error = 'Library files over 4 MB are not allowed.';
            return '';
        }

        $ext = strtolower(pathinfo((string) ($file['name'] ?? ''), PATHINFO_EXTENSION));
        if (!in_array($ext, ['js', 'css'], true)) {
            $error = 'A library is a .js or a .css file.';
            return '';
        }
        if ($ext !== $kind) {
            /* The type says how it is printed: a stylesheet must not be marked as a script. */
            $kind = $ext;
        }

        /* A .js is served as text; PHP in it would be a way to run code. */
        $head = (string) file_get_contents($tmp, false, null, 0, 8192);
        if (stripos($head, '<?php') !== false || stripos($head, '<?=') !== false) {
            $error = 'That file contains PHP. A library is plain JavaScript or CSS.';
            return '';
        }

        $dir = dirname(__DIR__) . '/assets/libraries';
        if (!is_dir($dir) && !@mkdir($dir, 0755, true)) {
            $error = 'The assets/libraries folder could not be created.';
            return '';
        }
        if (!is_writable($dir)) {
            $error = 'The assets/libraries folder is not writable.';
            return '';
        }

        $base = preg_replace('~[^a-z0-9]+~i', '-', pathinfo((string) $file['name'], PATHINFO_FILENAME)) ?: 'library';
        $name = strtolower(trim((string) $base, '-')) . '-' . bin2hex(random_bytes(4)) . '.' . $ext;
        $target = $dir . '/' . $name;
        if (!@move_uploaded_file($tmp, $target)) {
            $error = 'The file could not be saved. Check the folder permissions.';
            return '';
        }
        @chmod($target, 0644);

        return '/assets/libraries/' . $name;
    }

    /** @return array<int,array> every row, by name */
    public static function rows(bool $refresh = false): array
    {
        if (!self::enabled()) {
            return [];
        }
        if (self::$rows === null || $refresh) {
            self::$rows = Db::all('SELECT * FROM tool_libraries ORDER BY kind DESC, name');
        }
        return self::$rows ?? [];
    }

    /** @return array<string,array> keyed by slug */
    public static function bySlug(): array
    {
        $out = [];
        foreach (self::rows() as $row) {
            $out[(string) $row['slug']] = $row;
        }
        return $out;
    }

    public static function find(int $id): ?array
    {
        if (!self::enabled()) {
            return null;
        }
        return Db::one('SELECT * FROM tool_libraries WHERE id = ?', [$id]);
    }

    public static function findBySlug(string $slug): ?array
    {
        return self::bySlug()[$slug] ?? null;
    }

    public static function slugify(string $value): string
    {
        $slug = strtolower(trim($value));
        $slug = preg_replace('~[^a-z0-9]+~', '-', $slug) ?? '';
        return trim($slug, '-');
    }

    /**
     * Save one row. An empty slug is derived from the name, and a collision gets
     * a numeric suffix rather than overwriting the row that owns it.
     *
     * @param array $in name, kind, url, integrity, crossorigin, notes, auto
     * @return array{ok:bool,id:int,errors:array<int,string>}
     */
    public static function save(array $in, int $id = 0): array
    {
        if (!self::enabled()) {
            return ['ok' => false, 'id' => 0, 'errors' => ['Libraries need the database — run the migrations.']];
        }
        $errors = [];
        $name = trim((string) ($in['name'] ?? ''));
        $url  = trim((string) ($in['url'] ?? ''));
        $kind = (string) ($in['kind'] ?? 'js') === 'css' ? 'css' : 'js';
        if ($name === '') {
            $errors[] = 'The library needs a name.';
        }
        if ($url === '') {
            $errors[] = 'The library needs an address — a CDN URL, or a path that starts with /.';
        } elseif (!preg_match('~^(https?://|/)~i', $url)) {
            $errors[] = 'The address has to start with https:// or / .';
        }
        if ($errors !== []) {
            return ['ok' => false, 'id' => 0, 'errors' => $errors];
        }

        $slug = self::slugify((string) ($in['slug'] ?? '')) ?: self::slugify($name);
        $taken = self::findBySlug($slug);
        if ($taken !== null && (int) $taken['id'] !== $id) {
            $base = $slug;
            $n = 2;
            while (self::findBySlug($slug) !== null) {
                $slug = $base . '-' . $n;
                $n++;
            }
        }

        $row = [
            'slug'        => $slug,
            'name'        => $name,
            'kind'        => $kind,
            'url'         => $url,
            'integrity'   => trim((string) ($in['integrity'] ?? '')),
            'crossorigin' => trim((string) ($in['crossorigin'] ?? '')),
            'notes'       => trim((string) ($in['notes'] ?? '')),
            'auto'        => !empty($in['auto']) ? 1 : 0,
            'updated_at'  => date('Y-m-d H:i:s'),
        ];

        if ($id > 0 && self::find($id) !== null) {
            Db::update('tool_libraries', $row, 'id = :id', [':id' => $id]);
        } else {
            $row['created_at'] = date('Y-m-d H:i:s');
            $id = (int) Db::insert('tool_libraries', $row);
        }
        self::$rows = null;
        return ['ok' => true, 'id' => $id, 'errors' => []];
    }

    public static function delete(int $id): bool
    {
        if (!self::enabled() || $id <= 0) {
            return false;
        }
        $row = self::find($id);
        if ($row === null) {
            return false;
        }
        Db::exec('DELETE FROM tool_libraries WHERE id = ?', [$id]);
        self::$rows = null;
        /* Pages keep their list; the slug simply stops resolving. That is the
           least surprising outcome: adding the library back restores the tag. */
        return true;
    }

    /* ------------------------------------------------------------------ */
    /* What a tool asks for                                                */
    /* ------------------------------------------------------------------ */

    /**
     * The library slugs a tool file declares.
     *
     * Reads `Libraries:` from the parsed header (names or addresses, comma or
     * space separated) and, as a fallback, any absolute .js/.css address that
     * appears in the file's opening comment — which is how the older tool files
     * were written before anyone thought to declare them.
     *
     * @param array $tool a row from Toolkit::scan()
     * @return array<int,string>
     */
    public static function forTool(array $tool): array
    {
        $path = (string) ($tool['path'] ?? '');
        if ($path === '' || !is_file($path)) {
            return [];
        }
        $head = (string) file_get_contents($path, false, null, 0, 4096);
        $wanted = [];

        if (preg_match('~^\s*\*\s*Libraries\s*:\s*(.+)$~mi', $head, $m)) {
            foreach (preg_split('~[,]+~', (string) $m[1]) ?: [] as $piece) {
                $piece = trim($piece);
                if ($piece !== '') {
                    $wanted[] = $piece;
                }
            }
        }

        if ($wanted === [] && preg_match_all('~https?://[^\s"\'<>]+\.(?:js|css)~i', $head, $m2)) {
            foreach ($m2[0] as $url) {
                $wanted[] = $url;
            }
        }

        $slugs = [];
        foreach ($wanted as $item) {
            $slug = self::resolve($item);
            if ($slug !== '') {
                $slugs[] = $slug;
            }
        }
        return array_values(array_unique($slugs));
    }

    /**
     * Turn one declared item — a name, a registry key or an address — into a
     * library slug, creating the row when it does not exist yet.
     */
    public static function resolve(string $item): string
    {
        $item = trim($item);
        if ($item === '') {
            return '';
        }

        /* An address: reuse the row that already points there, else make one. */
        if (preg_match('~^(https?://|/)~i', $item)) {
            foreach (self::rows() as $row) {
                if (rtrim((string) $row['url'], '/') === rtrim($item, '/')) {
                    return (string) $row['slug'];
                }
            }
            $kind = preg_match('~\.css($|\?)~i', $item) ? 'css' : 'js';
            $name = preg_replace('~^.*/~', '', (string) parse_url($item, PHP_URL_PATH)) ?: $item;
            $name = preg_replace('~\.[a-z0-9]+$~i', '', (string) $name) ?: $item;
            $saved = self::save([
                'name' => ucfirst(str_replace(['-', '_', '.'], ' ', (string) $name)),
                'kind' => $kind,
                'url'  => $item,
                'auto' => 1,
                'notes' => 'Found in a tool file.',
            ]);
            return $saved['ok'] ? (string) (self::find($saved['id'])['slug'] ?? '') : '';
        }

        $key = self::slugify($item);
        if (self::findBySlug($key) !== null) {
            return $key;
        }
        if (isset(self::KNOWN[$key])) {
            $known = self::KNOWN[$key];
            $saved = self::save([
                'slug' => $key,
                'name' => (string) $known['name'],
                'kind' => (string) $known['kind'],
                'url'  => (string) $known['url'],
                'auto' => 1,
                'notes' => 'Declared by a tool file; address from the built-in list.',
            ]);
            return $saved['ok'] ? $key : '';
        }
        return '';
    }

    /** Attach whatever a tool declares to its page row, without losing picks. */
    public static function discoverForPage(int $calcId, array $tool): array
    {
        if (!self::enabled() || $calcId <= 0) {
            return [];
        }
        $slugs = self::forTool($tool);
        if ($slugs === []) {
            return [];
        }
        $row = Db::one('SELECT libraries FROM custom_calculators WHERE id = ?', [$calcId]);
        $current = self::split((string) ($row['libraries'] ?? ''));
        $merged = array_values(array_unique(array_merge($current, $slugs)));
        Db::update('custom_calculators', ['libraries' => implode(',', $merged)], 'id = :id', [':id' => $calcId]);
        return $slugs;
    }

    /** @return array<int,string> */
    public static function split(string $list): array
    {
        $out = [];
        foreach (explode(',', $list) as $piece) {
            $piece = trim($piece);
            if ($piece !== '') {
                $out[] = $piece;
            }
        }
        return $out;
    }

    /**
     * The libraries a page loads, in the order the tags should appear: styles
     * first, then scripts — a browser needs the stylesheet before the script
     * that measures the element it styles.
     */
    public static function forList(string $list): array
    {
        $bySlug = self::bySlug();
        $css = [];
        $js = [];
        foreach (self::split($list) as $slug) {
            $row = $bySlug[$slug] ?? null;
            if ($row === null) {
                continue;
            }
            if ((string) $row['kind'] === 'css') {
                $css[] = $row;
            } else {
                $js[] = $row;
            }
        }
        return array_merge($css, $js);
    }

    /** The tags for a page, ready to print inside <head>. */
    public static function headHtml(string $list): string
    {
        $out = '';
        foreach (self::forList($list) as $row) {
            $url = (string) $row['url'];
            /* Root-relative addresses are served by this site; absolute ones go
               out as they are. Either way the attribute is escaped. */
            $attrs = ' src="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"';
            if ((string) $row['integrity'] !== '') {
                $attrs .= ' integrity="' . htmlspecialchars((string) $row['integrity'], ENT_QUOTES, 'UTF-8') . '"';
                $attrs .= ' crossorigin="' . htmlspecialchars((string) ($row['crossorigin'] !== '' ? $row['crossorigin'] : 'anonymous'), ENT_QUOTES, 'UTF-8') . '"';
            }
            if ((string) $row['kind'] === 'css') {
                $out .= '    <link rel="stylesheet" href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"'
                    . ((string) $row['integrity'] !== ''
                        ? ' integrity="' . htmlspecialchars((string) $row['integrity'], ENT_QUOTES, 'UTF-8') . '" crossorigin="'
                          . htmlspecialchars((string) ($row['crossorigin'] !== '' ? $row['crossorigin'] : 'anonymous'), ENT_QUOTES, 'UTF-8') . '"'
                        : '')
                    . ">\n";
            } else {
                $out .= '    <script' . $attrs . ' defer></script>' . "\n";
            }
        }
        return $out;
    }

    /** The libraries a public path loads, or '' when it is not a tool page. */
    public static function headForPath(string $path): string
    {
        if (!self::enabled() || !CustomCalc::enabled()) {
            return '';
        }
        static $cache = [];
        if (!array_key_exists($path, $cache)) {
            $row = Db::one('SELECT libraries FROM custom_calculators WHERE CONCAT("/", category_slug, "/", slug) = ? LIMIT 1', [$path]);
            $cache[$path] = self::headHtml((string) ($row['libraries'] ?? ''));
        }
        return $cache[$path];
    }
}

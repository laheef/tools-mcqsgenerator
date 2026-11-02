<?php
/**
 * Toolkit — calculator tools that live in a PHP file, not in a database.
 *
 * ---------------------------------------------------------------------------
 * The idea
 * ---------------------------------------------------------------------------
 * Most of this site's calculators come from a formula definition: a list of
 * variables and an equation, rendered by the form builder and solved by
 * lib/Solver.php. That is the right shape for 4 041 of them.
 *
 * It is the wrong shape for a tool that is *not* a formula — a file converter,
 * a text counter, a chart, anything whose answer is "produce a new file" or
 * "count these characters". Those tools are programs, and a program is easiest
 * to write as code.
 *
 * So a tool may also be a single self-contained PHP file:
 *
 *     plugins/<category>/qm-tool-<name>.php
 *
 * which registers one shortcode:
 *
 *     [tool_percentage_of]
 *
 * and returns the HTML for the widget. A calculator page that names that
 * shortcode renders it in the tool column, exactly where the form would have
 * been. The article, the FAQ, the table of contents, the related grid, the
 * reviews and every advertising slot below it are unaffected: they belong to
 * the page, not to the tool.
 *
 * ---------------------------------------------------------------------------
 * Why a shortcode and not "just include the file"
 * ---------------------------------------------------------------------------
 * A shortcode is a *name*, and a name is what the editor binds to the page.
 * The file can be rewritten, moved between categories, given attributes or
 * replaced by a different implementation without the page knowing. It also
 * means the same tool can be embedded more than once on one page with
 * isolated ids, and that a page written today still renders after the tool
 * behind it is swapped out.
 *
 * ---------------------------------------------------------------------------
 * Isolation
 * ---------------------------------------------------------------------------
 *   * one file per tool, so one broken tool cannot take another one down;
 *   * every render is wrapped in a Throwable catch — a tool that throws shows
 *     a short note in its own box and nothing else on the page notices;
 *   * every file is syntax-checked before it is stored, so a half-written
 *     upload never becomes an include that kills the request;
 *   * the folder is blocked by .htaccess and by router.php, so a tool file is
 *     never fetchable over HTTP;
 *   * every tool must carry a header block, so a stray PHP file in the folder
 *     is ignored rather than executed.
 *
 * ---------------------------------------------------------------------------
 * Translation
 * ---------------------------------------------------------------------------
 * Everything a tool prints that a visitor reads may go through
 * Toolkit::t('key', 'Default'). Strings resolve from
 * plugins/i18n/<locale>.php, then <language>.php, then the default. The
 * article around the tool is translated by the CMS; the tool's own labels are
 * translated here. A tool written without t() still works — it is simply
 * English-only.
 */

declare(strict_types=1);

namespace Onim;

final class Toolkit
{
    /** Every tool file must open with a guard against direct HTTP access. */
    public const GUARD = 'ONIM_TOOLKIT';

    /** Files live here, one folder per category. */
    public const FOLDER = 'plugins';

    /** Largest tool file accepted by the panel, in bytes. */
    public const MAX_BYTES = 2097152;

    /** @var array<string,array>|null shortcode => header */
    private static ?array $index = null;

    /** @var array<string,callable> tag => renderer */
    private static array $shortcodes = [];

    /** @var array<string,bool> files already included this request */
    private static array $loaded = [];

    /** @var array<string,int> per-tag instance counters */
    private static array $counters = [];

    /** @var array<string,string> shortcode => last error, for the panel */
    private static array $errors = [];

    /** @var array<string,mixed> context handed to every render */
    private static array $context = [];

    /** @var string|null current locale override */
    private static ?string $locale = null;

    /** @var array<string,array<string,string>> loaded translation files */
    private static array $translations = [];

    /* =====================================================================
       1. Where the files are
       ===================================================================== */

    public static function root(): string
    {
        return dirname(__DIR__) . '/' . self::FOLDER;
    }

    /** Absolute path of a tool file from its stored relative path. */
    public static function absolute(string $relative): string
    {
        return self::root() . '/' . ltrim($relative, '/');
    }

    /**
     * Is this relative path a tool file inside the plugin folder?
     *
     * Guards every filesystem action in the panel: a form field that says
     * "../../config.db.php" must never reach unlink().
     */
    public static function isToolPath(string $relative): bool
    {
        $relative = trim($relative);
        if ($relative === '' || str_contains($relative, '..') || str_starts_with($relative, '/')) {
            return false;
        }
        if (!str_ends_with($relative, '.php')) {
            return false;
        }
        $root = realpath(self::root());
        $real = realpath(self::absolute($relative));
        if ($root === false || $real === false) {
            return false;
        }
        return str_starts_with($real, $root . DIRECTORY_SEPARATOR);
    }

    /* =====================================================================
       2. The index — what tools exist
       ===================================================================== */

    /**
     * Every discoverable tool, keyed by its shortcode.
     *
     * Reading is cheap and cached: a signature of (path, mtime, size) is
     * compared against data/cache/toolkit-index.json, and only when it
     * changes are the header blocks re-parsed. A folder with no tools costs
     * one scandir.
     *
     * @return array<string,array{shortcode:string,name:string,description:string,category:string,version:string,author:string,language:string,file:string,path:string,bytes:int,mtime:int,valid:bool,error:string}>
     */
    public static function scan(bool $refresh = false): array
    {
        if (self::$index !== null && !$refresh) {
            return self::$index;
        }

        $files = self::files();
        $signature = md5(implode("\n", array_map(
            static fn (string $rel): string => $rel . '|' . (int) @filemtime(self::absolute($rel)) . '|' . (int) @filesize(self::absolute($rel)),
            $files
        )));

        $cacheFile = self::cacheFile();
        if (!$refresh && $cacheFile !== null && is_file($cacheFile)) {
            $cached = json_decode((string) @file_get_contents($cacheFile), true);
            if (is_array($cached) && ($cached['signature'] ?? '') === $signature && is_array($cached['tools'] ?? null)) {
                return self::$index = $cached['tools'];
            }
        }

        $tools = [];
        foreach ($files as $relative) {
            $tool = self::describe($relative);
            if ($tool === null) {
                continue;                       // not a tool file (no header block)
            }
            if (isset($tools[$tool['shortcode']])) {
                /* Two files claiming one shortcode: keep the first, report the
                   second under its path so the panel can show what is wrong. */
                $tool['valid'] = false;
                $tool['error'] = 'The shortcode [' . $tool['shortcode'] . '] is already declared by '
                    . $tools[$tool['shortcode']]['file'] . '.';
                $tools[$tool['file']] = $tool;
                continue;
            }
            $tools[$tool['shortcode']] = $tool;
        }
        ksort($tools);

        if ($cacheFile !== null) {
            @file_put_contents(
                $cacheFile,
                json_encode(['signature' => $signature, 'tools' => $tools], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
            );
        }

        return self::$index = $tools;
    }

    /** Only the tools that may actually be rendered. @return array<string,array> */
    public static function valid(): array
    {
        return array_filter(self::scan(), static fn (array $tool): bool => $tool['valid']);
    }

    public static function find(string $shortcode): ?array
    {
        return self::scan()[strtolower(trim($shortcode))] ?? null;
    }

    public static function has(string $shortcode): bool
    {
        $tool = self::find($shortcode);
        return $tool !== null && $tool['valid'];
    }

    /** Tools grouped by category folder, for the panel. @return array<string,array<int,array>> */
    public static function byCategory(): array
    {
        $out = [];
        foreach (self::scan() as $tool) {
            $cat = $tool['category'] !== '' ? $tool['category'] : 'other';
            $out[$cat][] = $tool;
        }
        ksort($out);
        return $out;
    }

    /** Category folders that exist on disk, folder => readable label. */
    public static function categoryNames(): array
    {
        $out = [];
        foreach (self::folders() as $folder) {
            $out[$folder] = ucfirst(str_replace('-', ' ', $folder));
        }
        return $out;
    }

    /** @return array<int,string> relative paths of every candidate file */
    private static function files(): array
    {
        $root = self::root();
        if (!is_dir($root)) {
            return [];
        }
        $out = [];
        foreach (self::folders() as $folder) {
            foreach (glob($root . '/' . $folder . '/*.php') ?: [] as $file) {
                if (basename($file) === 'index.php') {
                    continue;
                }
                $out[] = $folder . '/' . basename($file);
            }
        }
        sort($out);
        return $out;
    }

    /** @return array<int,string> category folders */
    private static function folders(): array
    {
        $root = self::root();
        if (!is_dir($root)) {
            return [];
        }
        $out = [];
        foreach ((array) @scandir($root) as $entry) {
            if ($entry === '.' || $entry === '..' || !is_dir($root . '/' . $entry)) {
                continue;
            }
            if (in_array($entry, ['i18n', 'assets', 'partials'], true)) {
                continue;
            }
            $out[] = (string) $entry;
        }
        sort($out);
        return $out;
    }

    /**
     * Parse one file's header block into a tool record.
     *
     * The header is the first docblock of the file:
     *
     *     /**
     *      * Tool Name: Percentage of a Number
     *      * Shortcode: tool_percentage_of
     *      * Category: math
     *      * Description: What one number is as a percentage of another.
     *      * Version: 1.0.0
     *      * Language: en
     *      *\/
     *
     * A file with no "Shortcode:" line is not a tool and is ignored — which
     * is what keeps a stray helper or a half-finished draft from being run.
     */
    private static function describe(string $relative): ?array
    {
        $path   = self::absolute($relative);
        $source = @file_get_contents($path, false, null, 0, 16384);
        if (!is_string($source) || $source === '') {
            return null;
        }
        return self::toolFromSource($source, $relative, (int) @filesize($path), (int) @filemtime($path));
    }

    /**
     * Build a tool record from a file's source.
     *
     * Shared by the scanner and the uploader, so a file is judged by exactly
     * the same rules whether it arrived over HTTP or is already on disk.
     */
    private static function toolFromSource(string $source, string $relative, int $bytes, int $mtime): ?array
    {
        $header = [];
        if (preg_match('~/\*\*(.*?)\*/~s', $source, $block)) {
            /* Strip the leading " * " from each line, then read "Key: value". */
            foreach (preg_split('~\R~', (string) $block[1]) ?: [] as $line) {
                $line = preg_replace('~^\s*\*\s?~', '', $line) ?? '';
                if (preg_match('~^([A-Za-z][A-Za-z ]{1,24})\s*:\s*(.+)$~', trim($line), $m)) {
                    $header[strtolower(trim($m[1]))] = trim($m[2]);
                }
            }
        }

        $shortcode = strtolower((string) ($header['shortcode'] ?? ''));
        if ($shortcode === '') {
            return null;                        // not a tool file
        }

        $folder   = str_contains($relative, '/') ? explode('/', $relative)[0] : 'other';
        $category = strtolower((string) ($header['category'] ?? $folder));
        $category = preg_replace('~[^a-z0-9\-]~', '', $category) ?: $folder;

        $tool = [
            'shortcode'   => $shortcode,
            'name'        => (string) ($header['tool name'] ?? ($header['name'] ?? self::humanise($shortcode))),
            'description' => (string) ($header['description'] ?? ''),
            'category'    => $category,
            'version'     => (string) ($header['version'] ?? ''),
            'author'      => (string) ($header['author'] ?? ''),
            'language'    => strtolower((string) ($header['language'] ?? 'en')),
            'file'        => $relative,
            'path'        => self::absolute($relative),
            'bytes'       => $bytes,
            'mtime'       => $mtime,
            'valid'       => true,
            'error'       => '',
        ];

        if (preg_match('~^[a-z][a-z0-9_]{2,79}$~', $shortcode) !== 1) {
            $tool['valid'] = false;
            $tool['error'] = 'A shortcode must be lower-case letters, digits and underscores, at least three characters.';
            return $tool;
        }

        if (!str_contains($source, self::GUARD)) {
            $tool['valid'] = false;
            $tool['error'] = 'The file does not name the ' . self::GUARD . ' guard, so it would also run over HTTP.';
            return $tool;
        }

        if (!str_contains($source, 'addShortcode(')) {
            $tool['valid'] = false;
            $tool['error'] = 'The file never calls Toolkit::addShortcode(), so the shortcode it declares would print nothing.';
        }

        return $tool;
    }

    private static function humanise(string $shortcode): string
    {
        $name = preg_replace('~^tool_~', '', $shortcode) ?? $shortcode;
        return ucfirst(str_replace(['_', '-'], ' ', $name));
    }

    private static function cacheFile(): ?string
    {
        $dir = (defined('DATA_PATH') ? DATA_PATH : dirname(__DIR__) . '/data') . '/cache';
        if (!is_dir($dir) && !@mkdir($dir, 0775, true) && !is_dir($dir)) {
            return null;
        }
        return $dir . '/toolkit-index.json';
    }

    /** Drop the in-request index and its cache file (after an upload or a delete). */
    public static function forget(): void
    {
        self::$index = null;
        $cache = self::cacheFile();
        if ($cache !== null && is_file($cache)) {
            @unlink($cache);
        }
    }

    /* =====================================================================
       3. Registration
       ===================================================================== */

    /**
     * Register a tool's renderer.
     *
     * The callback receives three arguments:
     *
     *     function (array $atts, ?string $inner, array $ctx): string
     *
     *   $atts   the shortcode's attributes, e.g. [tool_x step="5"]
     *   $inner  the text between an enclosing pair, or null when self-closing
     *   $ctx    uid, tag, the tool header, and the calculator page (if any)
     */
    public static function addShortcode(string $tag, callable $renderer): void
    {
        self::$shortcodes[strtolower(trim($tag, ' []'))] = $renderer;
    }

    public static function isRegistered(string $tag): bool
    {
        return isset(self::$shortcodes[strtolower($tag)]);
    }

    /**
     * Include every valid tool file once, so its addShortcode() calls run.
     *
     * Errors are contained per file: one tool that throws on load cannot stop
     * the others from registering, and cannot stop the page from rendering.
     */
    public static function boot(): void
    {
        /* Every tool file opens with "if (!defined('ONIM_TOOLKIT')) exit;" — so
           the constant has to exist before the first include, or the guards
           would refuse the one caller that is allowed in. */
        if (!defined(self::GUARD)) {
            define(self::GUARD, true);
        }

        foreach (self::valid() as $shortcode => $tool) {
            if (isset(self::$loaded[$tool['file']])) {
                continue;
            }
            self::$loaded[$tool['file']] = true;
            try {
                $returned = require $tool['path'];
                /* A file may return its renderer instead of calling
                   addShortcode() — both are supported. The returned callable
                   is used only if nothing was registered under the tag. */
                if (is_callable($returned) && !isset(self::$shortcodes[$shortcode])) {
                    self::addShortcode($shortcode, $returned);
                }
            } catch (\Throwable $e) {
                self::$errors[$shortcode] = $e->getMessage();
                self::log($shortcode, $e);
            }
        }
    }

    /* =====================================================================
       4. Rendering
       ===================================================================== */

    /**
     * Render one shortcode string, e.g. "[tool_tip_split currency='€']".
     *
     * $context is merged into what the tool sees in $ctx — the calculator page
     * passes its own record, so a tool can read the page's slug, path and
     * locale without the editor having to encode them as attributes.
     */
    public static function render(string $shortcode, array $context = []): string
    {
        self::$context = $context;

        /* Accept either form: the page may store "[tool_x]" or just the tag
           name "tool_x". Both mean the same thing, and the second is what a
           template naturally has in hand. */
        $shortcode = trim($shortcode);
        if ($shortcode !== '' && !str_contains($shortcode, '[')) {
            $shortcode = '[' . $shortcode . ']';
        }

        return self::doShortcode($shortcode);
    }

    /**
     * Expand every registered shortcode in a piece of text.
     *
     * Anything that is not a registered tag is left exactly as typed: an
     * article about arrays can contain "[[1, 2]]" and a formula can contain
     * "[x + 1]" without being eaten.
     */
    public static function doShortcode(string $content, int $depth = 0): string
    {
        if ($content === '' || !str_contains($content, '[') || $depth > 8) {
            return $content;
        }

        $out = '';
        $i   = 0;
        $len = strlen($content);

        while ($i < $len) {
            $open = strpos($content, '[', $i);
            if ($open === false) {
                $out .= substr($content, $i);
                break;
            }
            $out .= substr($content, $i, $open - $i);

            /* Escaped: [[anything]] prints as [anything]. */
            if (($content[$open + 1] ?? '') === '[') {
                $close = strpos($content, ']]', $open + 2);
                if ($close !== false) {
                    /* "[[tag]]" prints "[tag]": one pair of brackets survives,
                       which is how a page can show a shortcode without running
                       it. */
                    $out .= '[' . substr($content, $open + 2, $close - ($open + 2)) . ']';
                    $i = $close + 2;
                    continue;
                }
            }

            if (preg_match('~\G\[([A-Za-z][A-Za-z0-9_\-]*)([^\]\[]*)\]~', $content, $m, 0, $open) !== 1) {
                $out .= '[';
                $i = $open + 1;
                continue;
            }

            $tag  = strtolower($m[1]);
            $raw  = $m[0];
            $end  = $open + strlen($raw);
            $tail = rtrim($m[2]);
            $selfClosing = str_ends_with($tail, '/');
            $atts = self::attributes($selfClosing ? substr($tail, 0, -1) : $tail);

            /* A tag is expandable when a tool file declares it, or when a file
               already loaded this request registered it. Anything else is
               left exactly as typed. */
            if (!self::has($tag) && !self::isRegistered($tag)) {
                $out .= $raw;
                $i = $end;
                continue;
            }

            $inner = null;
            if (!$selfClosing) {
                $closeAt = self::matchingClose($content, $tag, $end);
                if ($closeAt !== null) {
                    $inner = substr($content, $end, $closeAt - $end);
                    $end   = $closeAt + strlen('[/' . $tag . ']');
                }
            }

            $out .= self::call($tag, $atts, $inner === null ? null : self::doShortcode($inner, $depth + 1));
            $i = $end;
        }

        return $out;
    }

    public static function hasShortcode(string $content, string $tag): bool
    {
        return (bool) preg_match('~\[/?' . preg_quote($tag, '~') . '(?![\w\-])~i', $content);
    }

    /** Text with every shortcode removed — for meta descriptions and excerpts. */
    public static function stripShortcodes(string $content): string
    {
        return trim((string) (preg_replace('~\[/?[A-Za-z][A-Za-z0-9_\-]*(?:[^\]\[]*)\]~', '', $content) ?? $content));
    }

    /** Run one renderer, containing whatever it throws. */
    private static function call(string $tag, array $atts, ?string $inner): string
    {
        self::boot();
        $renderer = self::$shortcodes[$tag] ?? null;
        if ($renderer === null) {
            return '';
        }

        self::$counters[$tag] = (self::$counters[$tag] ?? 0) + 1;
        $ctx = self::$context + [
            'uid'  => $tag . '-' . self::$counters[$tag],
            'tag'  => $tag,
            'tool' => self::find($tag),
        ];
        $ctx['uid'] = preg_replace('~[^a-z0-9_\-]~i', '-', (string) $ctx['uid']) ?: $tag;

        try {
            $html = (string) $renderer($atts, $inner, $ctx);
            unset(self::$errors[$tag]);
            return $html;
        } catch (\Throwable $e) {
            self::$errors[$tag] = $e->getMessage();
            self::log($tag, $e);
            return self::fallbackBox($tag);
        }
    }

    /**
     * What a visitor sees when a tool throws.
     *
     * Not a blank column: an empty box under the page title reads as a broken
     * site. A short, honest note reads as a tool that is being fixed — and the
     * rest of the page (the method, the tables, the related calculators) is
     * still there and still true.
     */
    private static function fallbackBox(string $tag): string
    {
        $debug  = defined('ONIM_DEBUG') && ONIM_DEBUG;
        $detail = $debug
            ? ' <code>' . htmlspecialchars(self::$errors[$tag] ?? '', ENT_QUOTES) . '</code>'
            : '';
        return '<div class="calc-tool-error" role="status">'
            . '<p><strong>This tool could not run.</strong> The rest of the page is unaffected.</p>'
            . ($detail !== '' ? '<p>' . $detail . '</p>' : '')
            . '</div>';
    }

    /** Last error per tag, for the panel. @return array<string,string> */
    public static function errors(): array
    {
        return self::$errors;
    }

    private static function log(string $tag, \Throwable $e): void
    {
        $dir = (defined('DATA_PATH') ? DATA_PATH : dirname(__DIR__) . '/data') . '/logs';
        if (!is_dir($dir) && !@mkdir($dir, 0775, true) && !is_dir($dir)) {
            return;
        }
        @file_put_contents(
            $dir . '/tools.log',
            sprintf("[%s] %s: %s in %s:%d\n", date('c'), $tag, $e->getMessage(), $e->getFile(), $e->getLine()),
            FILE_APPEND
        );
    }

    /** Position of the "[/tag]" that closes the opening tag at $from. */
    private static function matchingClose(string $content, string $tag, int $from): ?int
    {
        $closeTag = '[/' . $tag . ']';
        $depth    = 1;
        $offset   = $from;

        while (true) {
            $close = strpos($content, $closeTag, $offset);
            if ($close === false) {
                return null;
            }
            $chunk  = substr($content, $offset, $close - $offset);
            $depth += (int) preg_match_all('~\[' . preg_quote($tag, '~') . '(?![\w\-])~i', $chunk);
            $depth -= 1;
            if ($depth === 0) {
                return $close;
            }
            $offset = $close + strlen($closeTag);
        }
    }

    /** Shortcode attributes: key="value", key='value', key=value, flag. */
    private static function attributes(string $source): array
    {
        $source = trim($source);
        if ($source === '') {
            return [];
        }
        preg_match_all(
            '~([A-Za-z_][\w\-:]*)(?:\s*=\s*(?:"([^"]*)"|\'([^\']*)\'|([^\s"\']+)))?~',
            $source,
            $matches,
            PREG_SET_ORDER
        );
        $out = [];
        foreach ($matches as $set) {
            $value = $set[2] ?? '';
            if ($value === '') {
                $value = $set[3] ?? '';
            }
            if ($value === '') {
                $value = $set[4] ?? '';
            }
            $out[strtolower($set[1])] = $value;
        }
        return $out;
    }

    /* =====================================================================
       5. Translation
       ===================================================================== */

    /** The locale tool strings resolve in. */
    public static function locale(): string
    {
        if (self::$locale !== null) {
            return self::$locale;
        }
        $fromSetting = '';
        if (class_exists(Cms::class)) {
            /* `locale` is the panel's Settings → General field ("de_DE"). The
               older `site_locale` key is still read so a site that set it
               before the field existed keeps its language. */
            foreach (['locale', 'site_locale'] as $key) {
                try {
                    $fromSetting = (string) (Cms::setting($key, '') ?? '');
                } catch (\Throwable) {
                    $fromSetting = '';
                }
                if ($fromSetting !== '') {
                    break;
                }
            }
        }
        if ($fromSetting === '' && defined('SITE_LOCALE')) {
            $fromSetting = (string) SITE_LOCALE;
        }

        /* "de_DE" is a locale; "de-de" is a file name. Normalise once here so
           every caller — and the i18n loader — sees the same shape. */
        $locale = strtolower(str_replace('_', '-', trim($fromSetting)));
        return $locale !== '' ? $locale : 'en';
    }

    public static function setLocale(?string $locale): void
    {
        /* Same normalisation as locale(): "de_DE" and "de-DE" are one locale. */
        self::$locale = $locale !== null
            ? strtolower(str_replace('_', '-', trim($locale)))
            : null;
    }

    /**
     * A tool's label in the current locale.
     *
     *   Toolkit::t('Tip amount', 'Tip amount')
     *
     * Falls back to the default, then to the key itself, so a missing
     * translation never prints an empty box.
     */
    public static function t(string $key, string $default = ''): string
    {
        $map = self::translations();
        if (isset($map[$key]) && $map[$key] !== '') {
            return $map[$key];
        }
        return $default !== '' ? $default : $key;
    }

    /** @return array<string,string> */
    private static function translations(): array
    {
        $locale = self::locale();
        if (isset(self::$translations[$locale])) {
            return self::$translations[$locale];
        }

        $out = [];
        $candidates = [$locale];
        $language = explode('-', $locale)[0];
        if ($language !== $locale) {
            $candidates[] = $language;
        }

        foreach (array_reverse($candidates) as $candidate) {
            $file = self::root() . '/i18n/' . preg_replace('~[^a-z0-9\-_]~', '', $candidate) . '.php';
            if (!is_file($file)) {
                continue;
            }
            try {
                $map = require $file;
            } catch (\Throwable $e) {
                self::log('i18n:' . $candidate, $e);
                continue;
            }
            if (is_array($map)) {
                $out = array_merge($out, array_map('strval', $map));
            }
        }

        return self::$translations[$locale] = $out;
    }

    /** Locales that have a translation file. @return array<int,string> */
    public static function locales(): array
    {
        $out = [];
        foreach (glob(self::root() . '/i18n/*.php') ?: [] as $file) {
            $out[] = basename($file, '.php');
        }
        sort($out);
        return $out;
    }

    /* =====================================================================
       6. Filesystem actions — what the panel calls
       ===================================================================== */

    /**
     * Store an uploaded tool file.
     *
     * Everything here is a refusal waiting to happen: the wrong extension, a
     * file that is too big, a file that does not parse, a file with no header,
     * a shortcode that already belongs to another tool. Only a file that
     * passes all of it is written, and the version it replaces is kept in
     * data/backups/tools/.
     *
     * @param array{name:string,tmp_name:string,error:int,size:int} $upload
     * @return string|null the stored relative path, or null with $error set
     */
    public static function install(array $upload, string $category, bool $overwrite, ?string &$error = null): ?string
    {
        $error = '';

        if ((int) ($upload['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
            $error = match ((int) ($upload['error'] ?? 0)) {
                UPLOAD_ERR_INI_SIZE, UPLOAD_ERR_FORM_SIZE => 'The file is larger than this server accepts.',
                UPLOAD_ERR_NO_FILE => 'Choose a .php file to upload.',
                default => 'The upload did not complete (error ' . (int) ($upload['error'] ?? 0) . ').',
            };
            return null;
        }

        $name = (string) ($upload['name'] ?? '');
        if (strtolower(pathinfo($name, PATHINFO_EXTENSION)) !== 'php') {
            $error = 'Only a .php file can be uploaded.';
            return null;
        }
        if ((int) ($upload['size'] ?? 0) > self::MAX_BYTES) {
            $error = 'Tool files must be under ' . number_format(self::MAX_BYTES / 1048576, 1) . ' MB.';
            return null;
        }

        $category = strtolower(preg_replace('~[^a-z0-9\-]~', '', $category) ?? '');
        if ($category === '') {
            $error = 'Choose the category this tool belongs to.';
            return null;
        }

        $tmp = (string) ($upload['tmp_name'] ?? '');
        if ($tmp === '' || !is_file($tmp)) {
            $error = 'The uploaded file could not be read.';
            return null;
        }

        $source = (string) file_get_contents($tmp);
        if ($source === '') {
            $error = 'The uploaded file is empty.';
            return null;
        }

        /* Syntax first: a file that does not parse must never reach a folder
           that PHP includes. */
        $lint = self::lint($source);
        if ($lint !== null) {
            $error = 'The file does not parse: ' . $lint;
            return null;
        }

        $relative = $category . '/' . self::fileNameFor($source, $name);
        $header   = self::toolFromSource($source, $relative, strlen($source), time());
        if ($header === null) {
            $error = 'The file has no header block. Start it with a comment containing "Tool Name:" and "Shortcode:".';
            return null;
        }
        if (!$header['valid']) {
            $error = $header['error'];
            return null;
        }

        $existing = self::scan(true)[$header['shortcode']] ?? null;
        if ($existing !== null && $existing['file'] !== $relative && !$overwrite) {
            $error = 'The shortcode [' . $header['shortcode'] . '] is already used by ' . $existing['file'] . '.';
            return null;
        }

        $target = self::absolute($relative);
        $dir    = dirname($target);
        if (!is_dir($dir) && !@mkdir($dir, 0775, true) && !is_dir($dir)) {
            $error = 'The folder ' . self::FOLDER . '/' . $category . ' could not be created.';
            return null;
        }
        if (is_file($target) && !$overwrite) {
            $error = 'A file called ' . basename($relative) . ' already exists. Tick “replace” to overwrite it.';
            return null;
        }
        if (is_file($target)) {
            self::backup($relative);
        }

        $written = is_uploaded_file($tmp)
            ? @move_uploaded_file($tmp, $target)
            : @copy($tmp, $target);
        if (!$written) {
            $error = 'The file could not be written to ' . self::FOLDER . '/' . $relative . '. Check the folder permissions.';
            return null;
        }
        @chmod($target, 0644);

        self::forget();
        return $relative;
    }

    /** Delete a tool file. The caller decides whether that is safe. */
    public static function remove(string $relative, ?string &$error = null): bool
    {
        $error = '';
        if (!self::isToolPath($relative)) {
            $error = 'That is not a tool file inside ' . self::FOLDER . '/.';
            return false;
        }
        $path = self::absolute($relative);
        if (!is_file($path)) {
            $error = 'The file is already gone.';
            return false;
        }
        self::backup($relative);
        if (!@unlink($path)) {
            $error = 'The file could not be deleted. Check the folder permissions.';
            return false;
        }
        self::forget();
        return true;
    }

    /** Keep the previous version before it is replaced or deleted. */
    private static function backup(string $relative): void
    {
        $dir = (defined('DATA_PATH') ? DATA_PATH : dirname(__DIR__) . '/data') . '/backups/tools';
        if (!is_dir($dir) && !@mkdir($dir, 0775, true) && !is_dir($dir)) {
            return;
        }
        $source = self::absolute($relative);
        if (!is_file($source)) {
            return;
        }
        @copy($source, $dir . '/' . date('Ymd-His') . '-' . str_replace('/', '__', $relative));
    }

    /**
     * php -l when the host allows it, a token scan when it does not.
     *
     * @return string|null the error message, or null when the source is fine
     */
    public static function lint(string $source): ?string
    {
        if (function_exists('exec') && PHP_BINARY !== '') {
            $tmp = tempnam(sys_get_temp_dir(), 'onimtool');
            if ($tmp !== false) {
                @file_put_contents($tmp, $source);
                $output = [];
                $status = 1;
                @exec(escapeshellarg(PHP_BINARY) . ' -l ' . escapeshellarg($tmp) . ' 2>&1', $output, $status);
                @unlink($tmp);
                if ($status !== 0) {
                    $message = preg_replace('~^.*?in .*? on line~', 'on line', implode(' ', $output)) ?? '';
                    return trim($message) !== '' ? trim($message) : 'syntax error';
                }
                return null;
            }
        }

        try {
            token_get_all($source, TOKEN_PARSE);
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
        return null;
    }

    /** qm-tool-<slug>.php, from the shortcode when the source declares one. */
    private static function fileNameFor(string $source, string $fallback): string
    {
        $shortcode = '';
        if (preg_match('~^\s*\*\s*Shortcode\s*:\s*([A-Za-z0-9_\-]+)~mi', $source, $m)) {
            $shortcode = strtolower($m[1]);
        }
        $slug = preg_replace('~^tool[_-]~', '', $shortcode) ?: (string) pathinfo($fallback, PATHINFO_FILENAME);
        $slug = preg_replace('~[^a-z0-9]+~', '-', strtolower($slug)) ?? '';
        $slug = trim($slug, '-');
        return 'qm-tool-' . ($slug !== '' ? $slug : 'tool') . '.php';
    }

    /* =====================================================================
       7. Small helpers a tool file can use
       ===================================================================== */

    public static function e(?string $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    /** A stable, unique id for a tool's markup on this page. */
    public static function uid(string $tag = 'tool'): string
    {
        return preg_replace('~[^a-z0-9_\-]~i', '-', $tag) . '-' . bin2hex(random_bytes(3));
    }
}

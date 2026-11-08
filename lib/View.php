<?php
/**
 * View helpers: escaping, layout rendering, asset URLs, icons and the small
 * formatting helpers templates need. No template engine — plain PHP files
 * with output buffering, which is the fastest and most debuggable option.
 */

declare(strict_types=1);

namespace Onim;

final class View
{
    private static array $shared = [];

    public static function escape($value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    /** URL for an asset inside /assets, cache-busted. */
    /**
     * Intrinsic pixel size of an image under /assets, for width/height attributes.
     *
     * Without them the browser reserves no space until the pixels arrive, and
     * every article figure on the page makes the text below it jump — the
     * layout-shift metric search engines actually measure. `getimagesize()` reads
     * only the file header (no GD needed) and the result is memoised per request.
     *
     * @return array{0:int,1:int}|null
     */
    public static function imageSize(string $url): ?array
    {
        static $cache = [];
        $path = parse_url($url, PHP_URL_PATH) ?: $url;
        if (array_key_exists($path, $cache)) {
            return $cache[$path];
        }
        $file = dirname(__DIR__) . '/' . ltrim($path, '/');
        $size = null;
        if (is_file($file)) {
            $info = @getimagesize($file);
            if (is_array($info) && $info[0] > 0 && $info[1] > 0) {
                $size = [(int) $info[0], (int) $info[1]];
            } elseif (str_ends_with(strtolower($file), '.svg')) {
                // getimagesize() does not read vector formats; the root <svg> tag
                // carries the same numbers in width/height or the viewBox.
                $head = (string) file_get_contents($file, false, null, 0, 2048);
                if (preg_match('~viewBox\s*=\s*["\']\s*[-\d.]+[\s,]+[-\d.]+[\s,]+([\d.]+)[\s,]+([\d.]+)~i', $head, $m)
                    || preg_match('~\swidth\s*=\s*["\']([\d.]+)(?:px)?["\'][^>]*\sheight\s*=\s*["\']([\d.]+)~i', $head, $m)) {
                    if ((float) $m[1] > 0 && (float) $m[2] > 0) {
                        $size = [(int) round((float) $m[1]), (int) round((float) $m[2])];
                    }
                }
            }
        }
        return $cache[$path] = $size;
    }

    public static function asset(string $path): string
    {
        return site_base() . '/assets/' . ltrim($path, '/') . '?v=' . ASSET_VERSION;
    }

    /*
     * Advertising used to print here, through a name switch that hid the
     * setting key. It now lives in lib/Ads.php, which owns the slot registry
     * the panel lists. Nothing calls adSlot() any more; it is gone rather than
     * kept as an alias, so there is exactly one way to print an ad.
     */

    /** Absolute-or-relative site path. */
    public static function url(string $path = '/'): string
    {
        $path = '/' . ltrim($path, '/');
        return site_base() . ($path === '/' ? '/' : rtrim($path, '/'));
    }

    /**
     * Prefix root-relative links inside stored HTML with the install path.
     *
     * Article and page bodies are written in the editor as "/uploads/media/x.png"
     * or "/math/percentage". At a domain root that already works; inside /tool
     * the same markup would point at the domain root and 404. Only single-slash
     * paths are touched — "//cdn.example.com/x" and "https://…" are left alone,
     * and a URL that already carries the prefix is not prefixed twice.
     */
    public static function rewriteRootUrls(string $html): string
    {
        $base = site_base();
        if ($base === '' || $html === '') {
            return $html;
        }
        /* Built in a double-quoted string so the quote characters in the class
           are unambiguous: [\"\x27] is a double quote or an apostrophe. */
        $pattern = "~\b(src|href|poster|data-src|action)=(\\\\?)([\"\x27])(/(?!/)[^\"\x27]*)\\3~i";
        $out = preg_replace_callback(
            $pattern,
            static function (array $m) use ($base): string {
                $url = $m[4];
                if ($url === $base || str_starts_with($url, $base . '/')) {
                    return $m[0];
                }
                return $m[1] . '=' . $m[2] . $m[3] . $base . $url . $m[3];
            },
            $html
        );
        return $out === null ? $html : $out;
    }

    public static function currentPath(): string
    {
        $p = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
        if (BASE_PATH !== '' && str_starts_with($p, BASE_PATH)) {
            $p = substr($p, strlen(BASE_PATH));
        }
        return '/' . ltrim($p, '/');
    }

    public static function share(array $data): void
    {
        self::$shared = array_merge(self::$shared, $data);
    }

    public static function shared(string $key, $default = null)
    {
        return self::$shared[$key] ?? $default;
    }

    /**
     * Render a template with variables, returning its output.
     *
     * @param array<string,mixed> $vars
     */
    public static function render(string $template, array $vars = []): string
    {
        $file = __DIR__ . '/../templates/' . $template . '.php';
        if (!is_file($file)) {
            throw new \RuntimeException("Template not found: $template");
        }
        extract(array_merge(self::$shared, $vars), EXTR_SKIP);
        ob_start();
        require $file;
        return (string) ob_get_clean();
    }

    /** Render a template into the layout. */
    public static function page(string $template, array $vars = []): string
    {
        $content = self::render($template, $vars);
        return self::render('layout', array_merge($vars, ['content' => $content]));
    }

    /** Inline SVG icon by name (line icons, currentColor). */
    public static function icon(string $name, int $size = 24, string $class = '', ?int $hue = null): string
    {
        $icons = self::icons();
        $paths = (string) ($icons[$name] ?? '');
        if ($paths === '') {
            /* An icon name with no shape behind it used to render an empty
               <svg> — an invisible gap in the page. Fall back to something
               that actually draws. */
            $paths = (string) ($icons['star'] ?? '<circle cx="12" cy="12" r="9"/>');
        }
        return sprintf(
            '<svg class="%s"%s width="%d" height="%d" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">%s</svg>',
            self::escape($class),
            /* The accent travels as a custom property, so one stylesheet rule
               (`.calc-glyph`) turns it into a tinted chip for every icon that
               asks for one — the same mechanism the calculator cards use. */
            $hue === null ? '' : ' style="--icon-hue:' . (int) $hue . '"',
            $size,
            $size,
            $paths
        );
    }

    /** Does this name have a shape in the icon map? */
    public static function hasIcon(string $name): bool
    {
        return (string) (self::icons()[$name] ?? '') !== '';
    }

    /**
     * The glyph for a tool: its own icon when it names one, the section's icon
     * otherwise.
     *
     * A calculator built in the panel carries the author's glyph; a file tool
     * uploaded as a PHP file often carries none, and "MP3 to WAV Converter"
     * matches no keyword rule in Icons::keyFor() — which is why a shelf of
     * tools used to show a row of identical stars. The section's own glyph is
     * at least true: everything in the Audio shelf is an audio tool.
     */
    public static function toolIcon(array $row, string $fallback, int $size = 13, string $class = 'calc-glyph', ?int $hue = null): string
    {
        $own = trim((string) ($row['icon'] ?? ''));
        /*
         * Two glyph sets, one row.
         *
         * The layout's own set (self::icons()) drew the section marks, while the
         * tools' data was written against Icons' set, which has twice as many
         * shapes. A tool whose row said `tile`, `ruler` or `database` matched
         * neither branch below and fell through to the empty-circle default —
         * so the same tool could read as its section's picture here and as a
         * plain circle on the catalogue. Ask Icons first when it is Icons that
         * knows the name.
         */
        if ($own !== '' && !self::hasIcon($own) && Icons::has($own)) {
            return Icons::svg($own, $size, $class, $hue);
        }
        $name = self::hasIcon($own) ? $own : (self::hasIcon($fallback) ? $fallback : 'star');
        /* A tool with its own glyph keeps the accent of the page it lives on; a
           tool wearing its section's glyph takes an accent of its own, so two
           cards in the same band are not the same colour twice. */
        if ($hue === null) {
            $hue = $own !== '' ? null : Icons::hueFor((string) ($row['path'] ?? ''));
        }
        return self::icon($name, $size, $class, $hue);
    }

    public static function icons(): array
    {
        return [
            'chevron-down' => '<path d="m6 9.5 6 6 6-6"/>',
            /* The tool groups' own shapes: until the site became a tool site
               every icon on it was a topic, so nothing drew a speaker, a
               picture, a PDF or a padlock. */
            'gauge'        => '<path d="M4 17.2a8 8 0 1 1 16 0"/><path d="M12 17.2 15.7 11"/><circle cx="12" cy="17.4" r="1.3"/>',
            'lock'         => '<rect x="4.6" y="10.4" width="14.8" height="10.2" rx="2.6"/><path d="M8.2 10.4V7.6a3.8 3.8 0 0 1 7.6 0v2.8"/><path d="M12 14.4v2.4"/>',
            'file'         => '<path d="M13.6 3.2H7a2 2 0 0 0-2 2v13.6a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8.6z"/><path d="M13.4 3.4v5.2h5.2"/>',
            'plug'         => '<path d="M9 3.5v4M15 3.5v4"/><path d="M6.8 7.5h10.4v4.1a5.2 5.2 0 0 1-10.4 0z"/><path d="M12 16.8v3.7"/>',
            'clock'        => '<circle cx="12" cy="12" r="9"/><path d="M12 7.2V12l3.2 2"/>',
            'paint'        => '<path d="M4.5 20.5c3.4.6 5.2-1.2 5.2-3.2 0-1.7-1.2-2.6-2.6-2.6-1.9 0-2.6 1.5-2.6 3.1 0 .9-.3 1.7-1 2.7z"/><path d="M9.7 14.7 18 6.4a2.1 2.1 0 0 1 3 3l-8.3 8.3"/>',
            'people'       => '<circle cx="9" cy="8.4" r="3.2"/><path d="M3.2 20c0-3.1 2.6-5.2 5.8-5.2s5.8 2.1 5.8 5.2"/><path d="M16 5.6a3 3 0 0 1 0 5.7M17.6 14.9c2 .6 3.4 2.3 3.4 4.6"/>',
            'dice'         => '<rect x="3.5" y="3.5" width="17" height="17" rx="3.4"/><path d="M8.4 8.4h.01M15.6 8.4h.01M12 12h.01M8.4 15.6h.01M15.6 15.6h.01"/>',
            'calculator'   => '<rect x="4" y="2.8" width="16" height="18.4" rx="2.6"/><path d="M8 7h8M8 12h.01M12 12h.01M16 12h.01M8 16h.01M12 16h.01M16 16h.01"/>',
            'audio'        => '<path d="M4 10v4M8 7v10M12 4.5v15M16 7v10M20 10v4"/>',
            'video'        => '<rect x="3" y="5.5" width="13" height="13" rx="2.5"/><path d="m16 11 5-3v8l-5-3z"/>',
            'image'        => '<rect x="3" y="4.5" width="18" height="15" rx="2.5"/><circle cx="8.6" cy="10" r="1.7"/><path d="m4 18 5.2-5.2a2 2 0 0 1 2.8 0L21 19"/>',
            'pdf'          => '<path d="M7 2.5h7l4.5 4.5v14.5H7z"/><path d="M14 2.5V7h4.5"/><path d="M9.6 16.5v-4h1.2a1.2 1.2 0 0 1 0 2.4H9.6"/><path d="M14.4 12.5H16a1.5 1.5 0 0 1 0 4h-1.6z"/>',
            'code'         => '<path d="m9 8-4 4 4 4M15 8l4 4-4 4"/>',
            'shield'       => '<path d="M12 3 5 6v6c0 4.2 3 7.4 7 9 4-1.6 7-4.8 7-9V6z"/><path d="m9.2 12 2 2 3.6-3.8"/>',
            'gamepad'      => '<rect x="2.5" y="7" width="19" height="10" rx="4.5"/><path d="M7 10v4M5 12h4M15.5 11h.01M18 13.5h.01"/>',
            'zip'          => '<rect x="4" y="3" width="16" height="18" rx="2.4"/><path d="M11 3v3M11 8v2M11 12v2M11 16h2"/>',
            'text'         => '<path d="M5 6.5V4.5h14v2M12 4.5v15M9 19.5h6"/>',
            'swap'         => '<path d="M4 8h13l-3-3M20 16H7l3 3"/>',
            'music'        => '<path d="M9 18V6l10-2v12"/><circle cx="6.5" cy="18" r="2.6"/><circle cx="16.5" cy="16" r="2.6"/>',
            'scissors'     => '<circle cx="6.5" cy="7" r="2.6"/><circle cx="6.5" cy="17" r="2.6"/><path d="M8.7 8.6 20 18M8.7 15.4 20 6"/>',
            'film'         => '<rect x="3" y="4.5" width="18" height="15" rx="2.4"/><path d="M7.5 4.5v15M16.5 4.5v15M3 12h18M3 8.2h4.5M3 15.8h4.5M16.5 8.2H21M16.5 15.8H21"/>',
            'hash'         => '<path d="M9.5 4 8 20M16 4l-1.5 16M4 9h16M3.5 15h16"/>',
            'sliders'      => '<path d="M4 7h9M17 7h3M4 17h3M11 17h9"/><circle cx="15" cy="7" r="2.2"/><circle cx="9" cy="17" r="2.2"/>',
            'list'         => '<path d="M9 6.5h11M9 12h11M9 17.5h11"/><path d="M4.5 6.5h.01M4.5 12h.01M4.5 17.5h.01"/>',
            'type'         => '<path d="M4 6.5V4.5h16v2M12 4.5v15M8.5 19.5h7"/><path d="M17.5 12.5V11h5v1.5M20 11v7.5M18.6 18.5h2.8"/>',
            'sparkles'     => '<path d="M11 4.5 12.6 9l4.5 1.6-4.5 1.6L11 16.7 9.4 12.2 4.9 10.6 9.4 9z"/><path d="M18 15.5l.8 2.2 2.2.8-2.2.8-.8 2.2-.8-2.2-2.2-.8 2.2-.8z"/>',
            'shuffle'      => '<path d="M4 6.5h4l8 11h4M4 17.5h4l2.2-3M14.5 9.5 16 6.5h4"/><path d="m17 3.5 3 3-3 3M17 14.5l3 3-3 3"/>',
            'palette'      => '<path d="M12 3a9 9 0 1 0 0 18c1.4 0 2-.9 2-1.9 0-1.4 1-2.1 2.3-2.1H18a3.4 3.4 0 0 0 3-3.4A8.8 8.8 0 0 0 12 3Z"/><path d="M8 10h.01M9.5 6.6h.01M14 6.5h.01M16.5 9.5h.01"/>',

            'menu'         => '<path d="M3.5 7h17M3.5 12h17M3.5 17h17"/>',
            'close'        => '<path d="M6 6l12 12M18 6 6 18"/>',
            'arrow-right'  => '<path d="M4.5 12h15"/><path d="m13.5 6 6 6-6 6"/>',
            'mail'         => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3.5 6.5 12 13l8.5-6.5"/>',
            'rss'          => '<path d="M4 11a9 9 0 0 1 9 9"/><path d="M4 4a16 16 0 0 1 16 16"/><circle cx="5" cy="19" r="1.6"/>',
            'biology'      => '<path d="M8 3c0 4 8 6 8 10s-8 4-8 8"/><path d="M16 3c0 4-8 6-8 10s8 4 8 8"/><path d="M9.2 8.5h5.6M9.2 15.5h5.6"/>',
            'chemistry'    => '<path d="M9 3h6M10 3v6.2L5.4 17.4A2 2 0 0 0 7.1 20h9.8a2 2 0 0 0 1.7-2.6L14 9.2V3"/><path d="M7.2 14.5h9.6"/>',
            'construction' => '<path d="M3.6 17.6 15.2 6a2 2 0 0 1 2.8 2.8L6.4 20.4z"/><path d="m14 7.2 2.8 2.8M4.4 16.8l2.8 2.8"/><path d="M17.5 3.5h4M19.5 1.5v4"/>',
            'conversion'   => '<rect x="3" y="4.5" width="18" height="15" rx="2.5"/><path d="M8 9h8l-2.2-2.2M16 15H8l2.2 2.2"/>',
            'ecology'      => '<path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18z"/><path d="M3.2 9.8h17.6M3.2 14.2h17.6"/><path d="M12 3c2.4 2.4 3.6 5.4 3.6 9s-1.2 6.6-3.6 9c-2.4-2.4-3.6-5.4-3.6-9S9.6 5.4 12 3z"/>',
            'life'         => '<path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18z"/><path d="M12 7.2V12l3.2 2"/>',
            'finance'      => '<path d="M12 2.5v19"/><path d="M16.8 6.2H10a3.2 3.2 0 0 0 0 6.4h4a3.2 3.2 0 0 1 0 6.4H7.2"/>',
            'food'         => '<path d="M3.5 11.5h17a8.5 8.5 0 0 1-17 0z"/><path d="M2 20h20"/><path d="M8 7.5c0-1.4 1-2 1-3.5M12 7.5c0-1.4 1-2 1-3.5M16 7.5c0-1.4 1-2 1-3.5"/>',
            'health'       => '<path d="M12 20.2S3.6 15.4 3.6 9.6A4.6 4.6 0 0 1 12 6.9a4.6 4.6 0 0 1 8.4 2.7c0 5.8-8.4 10.6-8.4 10.6z"/><path d="M7.6 12h2.2l1.2-2 1.8 4 1.2-2h2.4"/>',
            'math'         => '<path d="M5 7.5h6M8 4.5v6"/><path d="M14.5 5.5h5M14.5 9.5h5"/><path d="M5.5 16.5h5M8 14v5"/><path d="m14.6 14.4 4.4 4.4M19 14.4l-4.4 4.4"/>',
            'physics'      => '<circle cx="12" cy="12" r="2.2"/><ellipse cx="12" cy="12" rx="9.2" ry="4"/><ellipse cx="12" cy="12" rx="9.2" ry="4" transform="rotate(60 12 12)"/><ellipse cx="12" cy="12" rx="9.2" ry="4" transform="rotate(120 12 12)"/>',
            'sports'       => '<circle cx="14.5" cy="4.8" r="2"/><path d="M8.5 21l2.2-5.4-2.4-3.2 3.2-2.6 2.8 2.4 3.2 1.2"/><path d="M5.2 12.4l3.4-1.6"/><path d="m10.7 15.6-3.2 5.4"/>',
            'statistics'   => '<path d="M5 20V13M10 20V8M15 20v-5M20 20V4"/>',
            'other'        => '<circle cx="6" cy="12" r="1.6"/><circle cx="12" cy="12" r="1.6"/><circle cx="18" cy="12" r="1.6"/>',
            'discover'     => '<path d="m12 3.6 2.6 5.4 5.9.8-4.3 4.1 1 5.9-5.2-2.8-5.2 2.8 1-5.9L3.5 9.8l5.9-.8z"/>',
            'search'       => '<circle cx="11" cy="11" r="6.6"/><path d="m16 16 4.2 4.2"/>',
            'chevron'      => '<path d="m6 9 6 6 6-6"/>',
            'thumb'        => '<path d="M7 10.5 11 3a2.4 2.4 0 0 1 2.4 2.4V9h4.3a2 2 0 0 1 2 2.4l-1.3 6.6a2 2 0 0 1-2 1.6H7"/><rect x="3.2" y="10.5" width="3.8" height="9.2" rx="1"/>',
            'share'        => '<circle cx="18" cy="5.6" r="2.4"/><circle cx="6" cy="12" r="2.4"/><circle cx="18" cy="18.4" r="2.4"/><path d="m8.1 10.8 7.8-4M8.1 13.2l7.8 4"/>',
            'embed'        => '<path d="m8.5 8-4 4 4 4M15.5 8l4 4-4 4"/>',
            'link'         => '<path d="M10.5 13.5a3.5 3.5 0 0 0 5 0l3-3a3.5 3.5 0 0 0-5-5l-1.4 1.4"/><path d="M13.5 10.5a3.5 3.5 0 0 0-5 0l-3 3a3.5 3.5 0 0 0 5 5l1.4-1.4"/>',
            'bookmark'     => '<path d="M6 4h12v16l-6-4-6 4z"/>',
            'check'        => '<path d="m5 12.5 4.5 4.5L19 7.5"/>',
            'copy'         => '<rect x="9" y="9" width="11" height="11" rx="2"/><path d="M15 9V6.5A2.5 2.5 0 0 0 12.5 4H6.5A2.5 2.5 0 0 0 4 6.5v6A2.5 2.5 0 0 0 6.5 15H9"/>',
            'equals'       => '<path d="M5 9.5h14M5 14.5h14"/>',
            'grid'         => '<rect x="3.5" y="3.5" width="7" height="7" rx="1.8"/><rect x="13.5" y="3.5" width="7" height="7" rx="1.8"/><rect x="3.5" y="13.5" width="7" height="7" rx="1.8"/><rect x="13.5" y="13.5" width="7" height="7" rx="1.8"/>',
            'info'         => '<circle cx="12" cy="12" r="9"/><path d="M12 11v5.5M12 7.8v.4"/>',
            'arrow'        => '<path d="M4.5 12h15M14 6.5l5.5 5.5L14 17.5"/>',
            'whatsapp'     => '<path fill="currentColor" stroke="none" d="M12.04 2.2c-5.4 0-9.79 4.39-9.79 9.79 0 1.72.45 3.4 1.3 4.88L2.2 21.8l5.06-1.33a9.76 9.76 0 0 0 4.78 1.25h.01c5.4 0 9.79-4.39 9.79-9.79 0-2.62-1.02-5.08-2.87-6.93a9.72 9.72 0 0 0-6.93-2.8Zm0 17.9h-.01a8.13 8.13 0 0 1-4.15-1.14l-.3-.18-3.08.81.82-3.01-.19-.31a8.11 8.11 0 0 1-1.24-4.33c0-4.49 3.66-8.14 8.15-8.14 2.18 0 4.22.85 5.76 2.39a8.09 8.09 0 0 1 2.38 5.76c0 4.49-3.65 8.15-8.14 8.15Zm4.47-6.09c-.24-.12-1.45-.72-1.68-.8-.23-.08-.39-.12-.56.12-.16.25-.64.8-.78.97-.14.16-.29.18-.53.06-.24-.12-1.03-.38-1.97-1.21-.73-.65-1.22-1.45-1.36-1.7-.14-.24-.02-.38.11-.5.11-.11.24-.29.36-.43.12-.14.16-.25.24-.41.08-.16.04-.31-.02-.43-.06-.12-.55-1.33-.76-1.82-.2-.48-.4-.41-.55-.42h-.47c-.16 0-.43.06-.66.31-.23.25-.86.85-.86 2.06s.88 2.39 1 2.55c.12.16 1.73 2.67 4.2 3.74.59.25 1.05.4 1.4.52.59.19 1.13.16 1.55.1.47-.07 1.45-.59 1.66-1.17.2-.57.2-1.06.14-1.17-.06-.1-.22-.16-.47-.28Z"/>',
            'facebook'     => '<path d="M14.5 21v-8h2.7l.4-3.1h-3.1V7.9c0-.9.3-1.5 1.6-1.5h1.6V3.6c-.3 0-1.3-.1-2.4-.1-2.4 0-4 1.4-4 4.1v2.3H8.5V13h2.8v8z"/>',
            'x'            => '<path d="M4 4l7 8.5L4.4 20h2l5.4-6.4L16.6 20H20l-7.2-8.8L19.5 4h-2l-5 6L8.3 4z"/>',
            'linkedin'     => '<rect x="3.2" y="9" width="3.6" height="11.5" rx=".6" fill="currentColor" stroke="none"/><circle cx="5" cy="5.1" r="1.9" fill="currentColor" stroke="none"/><path d="M10 20.5V9h3.5v1.6a4 4 0 0 1 3.4-1.8c3.1 0 4.1 1.9 4.1 4.6v7.1h-3.6v-6.3c0-1.5-.5-2.5-1.8-2.5-1.1 0-1.8.7-2 1.5-.1.3-.1.7-.1 1v6.3z" fill="currentColor" stroke="none"/>',
            'reddit'       => '<circle cx="12" cy="12" r="9"/><circle cx="9" cy="12" r="1.2" fill="currentColor"/><circle cx="15" cy="12" r="1.2" fill="currentColor"/><path d="M8.6 15.4c1.9 1.4 4.9 1.4 6.8 0"/><path d="M12 6.4 13 3.2l2.6.6"/>',
            'telegram'     => '<path d="M21 4.5 2.8 11.1l5 1.6 1.9 6.2 2.7-3.2 4.6 3.3z"/><path d="m7.8 12.7 9.6-6.4-7.4 7.6"/>',
            'google'       => '<path d="M21 12.2c0-.7-.1-1.3-.2-1.9H12v3.6h5c-.2 1.2-.9 2.2-1.8 2.9v2.4h2.9c1.7-1.6 2.7-3.9 2.7-7z" fill="#4285F4" stroke="none"/><path d="M12 21.5c2.4 0 4.5-.8 6-2.2l-2.9-2.3c-.8.5-1.8.9-3.1.9-2.4 0-4.4-1.6-5.1-3.8H3.9v2.4A9.4 9.4 0 0 0 12 21.5z" fill="#34A853" stroke="none"/><path d="M6.9 14.1a5.6 5.6 0 0 1 0-3.6V8.1H3.9a9.4 9.4 0 0 0 0 8.4l3-2.4z" fill="#FBBC05" stroke="none"/><path d="M12 6.4c1.3 0 2.5.5 3.4 1.3l2.6-2.6A9.2 9.2 0 0 0 12 2.5a9.4 9.4 0 0 0-8.1 5.6l3 2.4C7.6 8.3 9.6 6.4 12 6.4z" fill="#EA4335" stroke="none"/>',
        ];
    }

    /** Breadcrumb markup (also feeds the BreadcrumbList schema). */
    public static function breadcrumbs(array $items): string
    {
        $out = '<nav class="breadcrumbs" aria-label="Breadcrumb"><ol>';
        $last = count($items) - 1;
        foreach ($items as $i => $item) {
            $out .= '<li>';
            if ($i === $last) {
                $out .= '<span aria-current="page">' . self::escape($item['name']) . '</span>';
            } else {
                $out .= '<a href="' . self::escape(self::url($item['url'])) . '">' . self::escape($item['name']) . '</a>';
                $out .= '<span class="crumb-sep" aria-hidden="true">/</span>';
            }
            $out .= '</li>';
        }
        return $out . '</ol></nav>';
    }

    /** Truncate on a word boundary. */
    public static function excerpt(string $text, int $limit = 160): string
    {
        $text = trim(strip_tags($text));
        if (mb_strlen($text) <= $limit) {
            return $text;
        }
        $cut = mb_substr($text, 0, $limit);
        // Prefer to end on a clause boundary ("Enter the rate — the Mortgage
        // Calculator…") than mid-phrase ("…and shows the result with the…").
        // Only worth it when the boundary is in the last third of the excerpt.
        foreach ([', ', ' — ', ' – ', '; ', '. '] as $sep) {
            $pos = mb_strrpos($cut, $sep);
            if ($pos !== false && $pos >= (int) ($limit * 0.6)) {
                return rtrim(mb_substr($cut, 0, $pos), " ,.;:—–") . '…';
            }
        }
        $pos = mb_strrpos($cut, ' ');
        $out = rtrim($pos !== false ? mb_substr($cut, 0, $pos) : $cut, " ,.;:");
        // never leave a dangling function word before the ellipsis
        $stop = ['a', 'an', 'and', 'as', 'at', 'by', 'for', 'from', 'in', 'into', 'it',
                 'its', 'of', 'on', 'or', 'per', 'plus', 'that', 'the', 'their', 'they',
                 'this', 'to', 'with', 'you', 'your'];
        for ($i = 0; $i < 4; $i++) {
            $pos = mb_strrpos($out, ' ');
            $last = $pos !== false ? mb_strtolower(mb_substr($out, $pos + 1)) : '';
            if ($pos === false || !in_array($last, $stop, true)) {
                break;
            }
            $out = rtrim(mb_substr($out, 0, $pos), " ,.;:");
        }
        return $out . '…';
    }

    /**
     * Prepare extracted article HTML for output.
     *
     * The reference site ships rich HTML (MathML, <picture>, tables, figures)
     * plus a few things we must not echo verbatim:
     *   <script>          tracking/JSON blobs
     *   <iframe>          third-party embeds that cannot work offline
     *   on* attributes    inline handlers
     *   CDN images        hotlinked to uploads-cdn.omnicalculator.com
     *
     * So: strip scripts, turn embeds into a labelled link, point images at the
     * mirrored copies in assets/img/article/, and rewrite internal calculator
     * links to routes that exist here (dropping links, keeping the words, for
     * calculators this build does not include).
     */
    /**
     * Sanitise article HTML and add contextual links to other calculators.
     *
     * $selfPath is the page being rendered: passing it stops the linker from
     * linking a page to itself. Pass '' to disable link insertion (e.g. for FAQ
     * answers that already sit next to the full article).
     */
    public static function rewriteArticleHtml(
        string $html,
        string $selfPath = '',
        int $budget = \Onim\InternalLinks::MAX_PER_PAGE,
        bool $keepSlots = false
    ): string {
        $html = self::sanitize($html);
        if ($keepSlots) {
            /* A widget line is different from article prose: its {{x.value}}
               slots are live in the browser, which fills them on every
               keystroke. Stripping them here leaves "Recommended dosage: -
               mg." on the page — half a sentence, no numbers. */
            $html = self::rewriteImages($html);
            $html = self::wrapTables($html);
            return $html;
        }
        // The reference's own interpolation slots occasionally survive in body
        // copy ("(_{{p)"), complete or truncated; neither can be filled here.
        $html = (string) preg_replace('~\{\{[^{}]{0,60}\}\}~u', '', $html);
        // truncated slot: never spans whitespace or markup, or the strip would
        // swallow the closing tag behind it
        $html = (string) preg_replace('~\{\{[^{}\s<>]{0,60}~u', '', $html);
        $html = self::rewriteImages($html);
        $html = self::wrapTables($html);
        $html = self::rewriteLinks($html);
        if ($selfPath !== '') {
            [$html] = \Onim\InternalLinks::linkify($html, $selfPath, $budget);
        }
        return $html;
    }

    /**
     * Put every table in a horizontally scrollable wrapper.
     *
     * Wide reference tables (an amortisation schedule is the classic case) are
     * wider than a phone screen. Without a wrapper they push the whole document
     * sideways and every section on the page starts scrolling; with one, only
     * the table scrolls and the layout stays put.
     */
    private static function wrapTables(string $html): string
    {
        if (!str_contains($html, '<table')) {
            return $html;
        }
        $html = (string) preg_replace('~<table\b~i', '<div class="table-scroll"><table', $html);
        $html = (string) preg_replace('~</table>~i', '</table></div>', $html);
        return $html;
    }

    private static ?array $imageManifest = null;

    private static function imageManifest(): array
    {
        if (self::$imageManifest === null) {
            $raw = @file_get_contents(Data::path('article-images.json'));
            self::$imageManifest = is_array(json_decode((string) $raw, true))
                ? json_decode((string) $raw, true)
                : [];
        }
        return self::$imageManifest;
    }

    private static function sanitize(string $html): string
    {
        // drop scripts and styles entirely
        $html = (string) preg_replace('~<(script|style)\b[^>]*>.*?</\1>~is', '', $html);
        $html = (string) preg_replace('~<(script|style)\b[^>]*/?>~i', '', $html);

        // embeds -> a readable fallback
        $html = (string) preg_replace_callback(
            '~<iframe\b[^>]*?(?:src="([^"]*)")?[^>]*>.*?</iframe>~is',
            static function (array $m): string {
                $src = $m[1] ?? '';
                if ($src === '' || str_starts_with($src, 'about:')) {
                    return '';
                }
                $label = str_contains($src, 'youtube') || str_contains($src, 'youtu.be')
                    ? 'Watch the video on YouTube'
                    : 'Open embedded content';
                return '<p class="embed-fallback"><a href="' . htmlspecialchars($src, ENT_QUOTES)
                    . '" rel="noopener nofollow" target="_blank">' . $label . '</a></p>';
            },
            $html
        ) ?? $html;
        $html = (string) preg_replace('~<iframe\b[^>]*/?>~i', '', $html);

        // inline event handlers and javascript: urls
        $html = (string) preg_replace('~\son[a-z]+\s*=\s*"[^"]*"~i', '', $html);
        $html = (string) preg_replace("~\son[a-z]+\s*=\s*'[^']*'~i", '', $html);
        $html = (string) preg_replace('~href\s*=\s*"\s*javascript:[^"]*"~i', 'href="#"', $html);

        return $html;
    }

    /** Point CDN images at mirrored copies; flatten <picture> to a single <img>. */
    private static function rewriteImages(string $html): string
    {
        $manifest = self::imageManifest();

        // <picture> with <source> sets: keep the fallback <img>, drop the sources
        $html = (string) preg_replace('~<source\b[^>]*>~i', '', $html);

        return (string) preg_replace_callback(
            '~(<img\b[^>]*?\ssrc=")([^"]+)(")~i',
            static function (array $m) use ($manifest): string {
                $url = html_entity_decode($m[2], ENT_QUOTES);
                $path = parse_url($url, PHP_URL_PATH) ?: '';
                $local = $manifest[$url] ?? $manifest[$path] ?? null;
                if ($local !== null) {
                    $file = __DIR__ . '/../assets/img/article/' . $local;
                    if (is_file($file)) {
                        return $m[1] . View::asset('img/article/' . $local) . $m[3];
                    }
                }
                // not mirrored: leave it alone rather than break the figure
                return $m[0];
            },
            $html
        );
    }

    private static function rewriteLinks(string $html): string
    {
        return (string) preg_replace_callback(
            '~<a\s+([^>]*?)href="([^"]+)"([^>]*)>(.*?)</a>~is',
            static function (array $m): string {
                $href = html_entity_decode($m[2], ENT_QUOTES);
                $text = $m[4];
                if ($href === '' || $href[0] === '#') {
                    return $m[0];
                }
                $abs = str_starts_with($href, '/')
                    ? 'https://www.omnicalculator.com' . $href
                    : $href;
                $host = parse_url($abs, PHP_URL_HOST) ?: '';
                $isReferenceHost = str_contains($host, 'omnicalculator.com');

                if (!$isReferenceHost) {
                    $rel = str_contains($m[1] . $m[3], 'rel=') ? '' : ' rel="noopener nofollow"';
                    return '<a href="' . htmlspecialchars($href, ENT_QUOTES) . '"' . $rel . ' target="_blank">' . $text . '</a>';
                }

                $parts = array_values(array_filter(explode('/', parse_url($abs, PHP_URL_PATH) ?: '')));
                if (count($parts) >= 2) {
                    [$cat, $slug] = $parts;
                    $row = Data::findRow($cat, $slug);
                    if ($row !== null) {
                        return '<a href="' . htmlspecialchars(View::url($row['path']), ENT_QUOTES) . '">' . $text . '</a>';
                    }
                }
                // Calculator we do not carry: keep the words, drop the dead link.
                return '<span class="external-term" title="Not included in this build">' . $text . '</span>';
            },
            $html
        );
    }
}

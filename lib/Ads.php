<?php
/**
 * Ads — one registry of every place an ad can appear.
 *
 * Two things were wrong with the first pass at advertising. The slots were
 * scattered through the templates as `View::adSlot('something')` with the
 * setting name hidden inside a switch, so the panel could not list them and
 * nobody could tell which slots existed without reading PHP. And there were
 * only two of them, in rails that were empty on every page.
 *
 * This class is the single source of truth. Each slot declares
 *
 *   key      the setting suffix: `ads_slot_<key>` holds the tag
 *   label    what the panel shows
 *   where    a plain-English note about the position, shown in the panel
 *   size     the shape, for the reserved height and the preview outline
 *   pages    which page types render it
 *
 * The templates only ever ask for a key. Adding a slot means adding one row
 * here plus one `Ads::slot('key')` call in a template; the panel picks it up
 * automatically, which is what stops the two from drifting.
 *
 * Rendering rules, in order:
 *   1. the signed preview token -> an empty, labelled box; never a saved tag.
 *   2. `ads_enabled` off       -> nothing renders anywhere, whatever is saved.
 *   3. slot code empty         -> nothing renders, and nothing reserves space.
 *   4. otherwise               -> the saved HTML is printed verbatim inside a
 *                                 wrapper that carries the reserved height, so
 *                                 an ad that loads late does not shift the
 *                                 article.
 *
 * Nothing here escapes the saved tag: an ad tag is HTML written by an
 * administrator. Everything else on the site escapes its output.
 */

declare(strict_types=1);

namespace Onim;

final class Ads
{
    /**
     * Every slot, in the order the panel lists them.
     *
     * `size` is advisory: it sets the reserved height and the width of the
     * preview outline, so the page does not jump when a slow ad arrives.
     *
     * @var array<string,array{label:string,where:string,size:string,pages:string}>
     */
    private const SLOTS = [
        /* ---- sitewide ------------------------------------------------- */
        'header' => [
            'label' => 'Header leaderboard',
            'where' => 'Directly under the navigation, above the page content, on every page.',
            'size'  => 'leaderboard',
            'pages' => 'all',
        ],
        'footer' => [
            'label' => 'Footer billboard',
            'where' => 'Between the page content and the footer, on every page.',
            'size'  => 'billboard',
            'pages' => 'all',
        ],

        /* ---- calculator pages ----------------------------------------- */
        'calc_top' => [
            'label' => 'Calculator — above the tool',
            'where' => 'Calculator pages, between the breadcrumb and the first field. The most valuable slot on the site.',
            'size'  => 'leaderboard',
            'pages' => 'calculator',
        ],
        'calc_inline' => [
            'label' => 'Calculator — inside the article',
            'where' => 'Calculator pages, after the second section of the write-up, inside the reading flow.',
            'size'  => 'inline',
            'pages' => 'calculator',
        ],
        'calc_below' => [
            'label' => 'Calculator — under the result',
            'where' => 'Calculator pages, immediately after the results panel, before the article.',
            'size'  => 'rectangle',
            'pages' => 'calculator',
        ],
        'calc_rail' => [
            'label' => 'Calculator — right rail skyscraper',
            'where' => 'Calculator pages, in the narrow third column on the right. Leave it empty and the column folds away, giving the space back to the article.',
            'size'  => 'skyscraper',
            'pages' => 'calculator',
        ],
        'calc_side' => [
            'label' => 'Calculator — under the tool column',
            'where' => 'Calculator pages, at the bottom of the sticky right-hand column (below the tool).',
            'size'  => 'rectangle',
            'pages' => 'calculator',
        ],

        /* ---- blog ----------------------------------------------------- */
        'blog_top' => [
            'label' => 'Blog — under the headline',
            'where' => 'Blog posts, under the title and byline, above the first paragraph.',
            'size'  => 'leaderboard',
            'pages' => 'post',
        ],
        'blog_inline' => [
            'label' => 'Blog — inside the post body',
            'where' => 'Blog posts, after the second section of the article.',
            'size'  => 'inline',
            'pages' => 'post',
        ],
        'blog_side_top' => [
            'label' => 'Blog — top of the sidebar',
            'where' => 'Blog posts, first thing in the right-hand rail, above “On this page”.',
            'size'  => 'rectangle',
            'pages' => 'post',
        ],
        'blog_side_bottom' => [
            'label' => 'Blog — bottom of the sidebar',
            'where' => 'Blog posts, last thing in the right-hand rail, under the category list.',
            'size'  => 'rectangle',
            'pages' => 'post',
        ],
        'blog_list' => [
            'label' => 'Blog index — after the list',
            'where' => 'The blog index, under the post list.',
            'size'  => 'leaderboard',
            'pages' => 'blog',
        ],

        /* ---- catalogue ------------------------------------------------ */
        'category_top' => [
            'label' => 'Category pages — under the heading',
            'where' => 'Category and catalogue listings, above the grid of calculators.',
            'size'  => 'leaderboard',
            'pages' => 'category',
        ],
        'home_mid' => [
            'label' => 'Home — between sections',
            'where' => 'The homepage, after the featured calculators.',
            'size'  => 'leaderboard',
            'pages' => 'home',
        ],

        /* ---- inside the calculator ------------------------------------ */
        'calc_mid' => [
            'label' => 'Calculator — between the sections',
            'where' => 'Calculator pages, between the second and third group of fields, inside the tool itself.',
            'size'  => 'inline',
            'pages' => 'calculator',
        ],
        'calc_reviews_top' => [
            'label' => 'Calculator — above the reviews',
            'where' => 'Calculator pages, directly above the reader reviews section, in the article column.',
            'size'  => 'inline',
            'pages' => 'calculator',
        ],
        'calc_reviews_bottom' => [
            'label' => 'Calculator — below the reviews',
            'where' => 'Calculator pages, between the review form and “Cite this calculator”.',
            'size'  => 'inline',
            'pages' => 'calculator',
        ],

        /* ---- sticky footer bar ---------------------------------------- */
        'anchor' => [
            'label' => 'Sticky anchor (phones and tablets)',
            'where' => 'A bar fixed to the bottom of the screen on phones and tablets, with a close button. Hidden from 1100px up, where the tool column is sticky and would sit underneath it.',
            'size'  => 'anchor',
            'pages' => 'all',
        ],
    ];

    /** The default box for each shape, in CSS pixels. */
    private const SHAPES = [
        'leaderboard' => [728, 90],
        'billboard'   => [970, 250],
        'rectangle'   => [300, 250],
        'inline'      => [468, 120],
        'anchor'      => [320, 50],
        'skyscraper'  => [160, 600],
    ];

    /**
     * The box a slot reserves, in pixels.
     *
     * The panel lets an owner set the exact size for a slot (`ads_size_<key>`,
     * "300x250"), because the tag they paste has a shape of its own and the
     * reserved space should match it — a 336x280 unit in a box sized 300x250
     * reserves the wrong height and the page still jumps.
     *
     * @return array{w:int,h:int,shape:string}
     */
    public static function dimensions(string $key): array
    {
        $meta = self::SLOTS[$key] ?? null;
        $shape = $meta['size'] ?? 'leaderboard';
        [$w, $h] = self::SHAPES[$shape] ?? [728, 90];
        if (class_exists(Cms::class)) {
            $raw = trim((string) (Cms::setting('ads_size_' . $key, '') ?? ''));
            if (preg_match('~^\s*(\d{2,4})\s*[x×*]\s*(\d{2,4})\s*$~i', $raw, $m)) {
                $w = (int) $m[1];
                $h = (int) $m[2];
            }
        }
        return ['w' => $w, 'h' => $h, 'shape' => $shape];
    }

    /** Memoised master switch for the life of one request. */
    private static ?bool $enabled = null;

    /** @return array<string,array{label:string,where:string,size:string,pages:string}> */
    public static function slots(): array
    {
        return self::SLOTS;
    }

    public static function exists(string $key): bool
    {
        return isset(self::SLOTS[$key]);
    }

    /** The settings row that holds this slot's tag. */
    public static function settingKey(string $key): string
    {
        return 'ads_slot_' . $key;
    }

    public static function enabled(): bool
    {
        if (self::$enabled === null) {
            self::$enabled = class_exists(Cms::class) && Cms::settingBool('ads_enabled', false);
        }
        return self::$enabled;
    }

    /** Forget the memoised switch (tests toggle it mid-request). */
    public static function reset(): void
    {
        self::$enabled = null;
    }

    /** The saved tag for a slot, or '' — no defaults, no placeholders. */
    public static function code(string $key): string
    {
        if (!class_exists(Cms::class) || !self::exists($key)) {
            return '';
        }
        $html = trim((string) (Cms::setting(self::settingKey($key), '') ?? ''));
        /* `ads_inline_code` was the in-article tag before the slots had names.
           An install that already filled it in keeps its ad: the named slot
           wins, and the old key is the fallback, which is exactly what the
           panel's hint promises. Without this the textarea was a control that
           saved a value nothing ever read. */
        if ($html === '' && $key === 'calc_inline') {
            $html = trim((string) (Cms::setting('ads_inline_code', '') ?? ''));
        }
        if ($html === '') {
            return '';
        }
        /* Saved-but-empty markup ("<div></div>") is still nothing. A tag with a
           <script> or an <ins> counts even when its text is empty, because that
           is what an ad tag looks like. */
        if (trim(strip_tags($html)) === '' && !str_contains($html, '<script') && !str_contains($html, '<ins')) {
            return '';
        }
        return $html;
    }

    public static function has(string $key): bool
    {
        return self::enabled() && self::code($key) !== '';
    }

    /**
     * Render one slot. Empty string when advertising is off, when the slot has
     * no tag, or when the key does not exist — a typo in a template is a
     * missing ad, never a fatal error on a live page.
     */
    public static function slot(string $key, string $class = ''): string
    {
        $meta = self::SLOTS[$key] ?? null;
        if ($meta === null) {
            return '';
        }

        /* Preview first, and it wins: the preview is a map of the slots, so it
           draws a box in every position and prints none of the saved tags. That
           also keeps a third-party script from loading, and counting an
           impression, while an administrator rearranges the page. It
           deliberately ignores the master switch — mapping the slots is most
           useful before advertising is turned on. */
        if (self::showOutlines()) {
            return self::outline($key, $meta, $class);
        }

        /* The master switch comes second, and it is absolute. It used to be
           checked only by has(), which left slot() printing a stored tag on a
           site where advertising was switched off — the one thing the switch
           exists to prevent. */
        if (!self::enabled()) {
            return '';
        }

        $code = self::code($key);
        if ($code === '') {
            return '';
        }
        $classes = 'ad-slot ad-slot--' . $meta['size'] . ($class !== '' ? ' ' . $class : '');
        $box = self::dimensions($key);
        return '<div class="' . htmlspecialchars($classes, ENT_QUOTES) . '" data-ad-slot="'
            . htmlspecialchars($key, ENT_QUOTES) . '" role="complementary" aria-label="Advertisement"'
            . ' style="--ad-w:' . $box['w'] . 'px;--ad-h:' . $box['h'] . 'px">'
            . $code
            . self::autoPush($key, $code)
            . '</div>';
    }

    /**
     * Fill an AdSense unit that was pasted without its push.
     *
     * An AdSense tag is two pieces: the `<ins class="adsbygoogle">` and, after
     * it, `(adsbygoogle = window.adsbygoogle || []).push({})`. Copying the unit
     * out of AdSense gives both, but every other source — a plugin's export, a
     * screenshot of the dashboard, an operator copying only the visible half —
     * gives the `<ins>` and nothing else, and an `<ins>` that is never pushed
     * stays collapsed and blank. The slot looks empty and the conclusion is
     * "the ad code does not work", which is exactly the report this change is
     * answering.
     *
     * So: if the saved tag contains an `.adsbygoogle` element and no push of
     * its own, push it once, scoped to this slot. A tag that already carries
     * its push is left exactly as saved — no double request, no double count.
     */
    private static function autoPush(string $key, string $code): string
    {
        if (stripos($code, 'adsbygoogle') === false || stripos($code, 'push(') !== false) {
            return '';
        }
        if (preg_match('~<ins[^>]*class="[^"]*adsbygoogle~i', $code) !== 1) {
            return '';
        }
        $sel = '[data-ad-slot="' . $key . '"] ins.adsbygoogle';
        return '<script>(function(){try{var n=document.querySelectorAll('
            . json_encode($sel) . ');for(var i=0;i<n.length;i++){'
            . 'if(!n[i].getAttribute("data-adsbygoogle-status")){'
            . '(window.adsbygoogle=window.adsbygoogle||[]).push({});'
            . '}}}catch(e){}})();</script>';
    }

    /**
     * The skeleton an administrator sees in place of an empty slot.
     *
     * Deliberately shaped like the ad that would sit there, and labelled, so
     * "where can an ad go" is answerable by looking at the site — the question
     * that started this whole piece of work.
     */
    private static function outline(string $key, ?array $meta, string $class): string
    {
        if ($meta === null) {
            return '';
        }
        $classes = 'ad-slot ad-slot--' . $meta['size'] . ' ad-slot--preview' . ($class !== '' ? ' ' . $class : '');
        $box = self::dimensions($key);
        return '<div class="' . htmlspecialchars($classes, ENT_QUOTES) . '" data-ad-slot="'
            . htmlspecialchars($key, ENT_QUOTES) . '" role="complementary" aria-label="Empty advertisement slot"'
            . ' style="--ad-w:' . $box['w'] . 'px;--ad-h:' . $box['h'] . 'px">'
            . '<span class="ad-slot-label">Ad slot &middot; ' . $box['w'] . '&times;' . $box['h'] . '</span>'
            . '<span class="ad-slot-note">' . htmlspecialchars($meta['label'], ENT_QUOTES) . '</span>'
            . '</div>';
    }

    /**
     * Is this request the admin's slot preview?
     *
     * The public site has no admin session — the panel's cookie is scoped to its
     * own path on purpose — so the preview is carried by a signed token that the
     * panel prints next to the switch. The token is an HMAC of today's date with
     * the install's key: unguessable, expiring, and it only ever draws empty
     * boxes, so a leaked link exposes nothing.
     *
     * The token is the only gate. It used to also require an `ads_show_outlines`
     * checkbox, which meant the panel's own preview link drew nothing unless a
     * second switch happened to be on — a switch whose only purpose was to
     * enable the thing the link already asks for.
     */
    public static function showOutlines(): bool
    {
        if (!class_exists(Cms::class)) {
            return false;
        }
        $given = (string) ($_GET['ads_token'] ?? '');
        if ($given === '' || ($_GET['ads'] ?? '') !== 'preview') {
            return false;
        }
        return hash_equals(self::previewToken(), $given);
    }

    /** The token the panel puts in its “preview on the site” link. */
    public static function previewToken(): string
    {
        $cfg = onim_db_config();
        $key = (string) ($cfg['app_key'] ?? '');
        if ($key === '') {
            $key = (string) ($cfg['name'] ?? 'onim');
        }
        return substr(hash_hmac('sha256', 'ads-preview|' . date('Y-m-d'), $key), 0, 32);
    }

    /** The preview URL the panel links to. */
    public static function previewUrl(string $path = '/'): string
    {
        return site_base() . $path . (str_contains($path, '?') ? '&' : '?')
            . 'ads=preview&ads_token=' . self::previewToken();
    }

    /**
     * Insert a slot into a rendered HTML body, after the Nth heading.
     *
     * Blog bodies arrive as one HTML string rather than as blocks, so the only
     * way to put an ad inside the flow is to count the headings. If the post has
     * fewer sections than asked for, the slot goes before the last third of the
     * text instead of being dropped — a short post still shows the ad, just
     * further down.
     */
    public static function inject(string $html, string $key, int $after = 2): string
    {
        $slot = self::slot($key, 'ad-slot--inline');
        if ($slot === '') {
            return $html;
        }
        if (!preg_match_all('~<h2[\s>]~i', $html, $m, PREG_OFFSET_CAPTURE) || count($m[0]) < $after) {
            /* No headings to count: put it a third of the way in, at a paragraph
               boundary, so it never lands inside a sentence or a list. */
            $pos = (int) (strlen($html) * 0.35);
            $cut = strpos($html, '</p>', $pos);
            if ($cut === false) {
                return $html . $slot;
            }
            $cut += 4;
            return substr($html, 0, $cut) . $slot . substr($html, $cut);
        }
        $offset = (int) $m[0][$after - 1][1];
        /* Walk to the end of that heading's section: the slot goes after the
           section's closing paragraph, not between a heading and its first
           sentence. */
        $next = isset($m[0][$after]) ? (int) $m[0][$after][1] : strlen($html);
        return substr($html, 0, $next) . $slot . substr($html, $next);
    }

    /** How many slots a page type has, for the panel. */
    public static function countFor(string $page): int
    {
        $n = 0;
        foreach (self::SLOTS as $slot) {
            if ($slot['pages'] === $page || $slot['pages'] === 'all') {
                $n++;
            }
        }
        return $n;
    }
}

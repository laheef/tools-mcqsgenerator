<?php
/**
 * SEO surface: titles, meta, canonical, hreflang, Open Graph, Twitter cards,
 * JSON-LD graphs, sitemap and robots. Mirrors what the original emits (see
 * SPEC.md §5) including which schema.org types each page carries.
 */

declare(strict_types=1);

namespace Onim;

final class Seo
{

    public string $title = "";
    public string $description = '';
    public string $canonical = '';
    public string $ogImage = '';
    public string $type = 'website';
    /** @var array<int,array{name:string,url:string}> */
    public array $breadcrumbs = [];
    /** @var array<int,array> extra JSON-LD nodes */
    public array $schema = [];
    public bool $noindex = false;
    public string $publishedAt = '';
    public string $updatedAt = '';

    public function __construct(?string $title = null, string $description = '')
    {
        $this->title = $title ?? SITE_NAME;
        $this->description = self::clamp($description);
    }

    /**
     * Search engines truncate around 155–160 characters; the reference site
     * keeps the same budget, so longer source descriptions are trimmed on a
     * word boundary rather than emitted half-visible.
     */
    public static function clamp(string $description, int $limit = 158): string
    {
        $text = trim(preg_replace('/\s+/', ' ', strip_tags($description)) ?? '');
        if (mb_strlen($text) <= $limit) {
            return $text;
        }
        $cut = mb_substr($text, 0, $limit - 1);
        $space = mb_strrpos($cut, ' ');
        if ($space !== false) {
            $cut = mb_substr($cut, 0, $space);
        }
        return rtrim($cut, " ,.;:—-") . '…';
    }

    public function url(string $path = '/'): string
    {
        return rtrim(SITE_URL, '/') . '/' . ltrim($path, '/');
    }

    /**
     * Keep a page title in the range a search result actually shows.
     *
     * The brand suffix costs 18 characters, so the title itself has 44 to work
     * with. Harvested titles sit at both extremes: "Kp Calculator" is a
     * 30-character result that tells a searcher nothing, and a
     * 63-character one is cut off mid-phrase. So: boilerplate tails are removed,
     * an over-long title is trimmed at a word boundary, and a short one is
     * topped up with what the page actually contains.
     */
    public static function tuneTitle(string $title, string $category = ''): string
    {
        $title = trim((string) preg_replace('~\s+~u', ' ', $title));
        if ($title === '') {
            return $title;
        }
        // " | Onim Calculator" is 18 characters, so 62 - 18 is all a title gets
        $budget = 44;

        // "X Calculator Calculator"
        $title = (string) preg_replace('~\s*Calculator(\s+Calculator)+$~i', ' Calculator', $title);

        // a name the reference itself truncated: "CIWA (Clinical … Calculator"
        if (str_contains($title, '…')) {
            $title = trim((string) preg_replace('~\s*….*$~u', '', $title));
            $title = trim((string) preg_replace('~\s*\([^)]*$~u', '', $title));
        }

        // boilerplate that adds no keywords
        $boiler = [
            '~\s*[—–-]\s*Answer,? Formula\s*&\s*Units$~iu',
            '~\s*[—–-]\s*Free Online Calculator$~iu',
            '~\s*[—–-]\s*Free Calculator with Units$~iu',
            '~\s*[—–-]\s*Formula,? Units & Example$~iu',
            '~\s*[—–-]\s*Formula & Units$~iu',
            '~\s*:\s*Free,? With Steps$~iu',
        ];
        foreach ($boiler as $p) {
            $title = trim((string) preg_replace($p, '', $title));
        }

        // the word "calculator" is already in the brand suffix
        if (mb_strlen($title) > $budget) {
            $head = trim((string) preg_replace('~\s+Calculators?$~i', '', $title));
            if (mb_strlen($head) >= 10) {
                $title = $head;
            }
        }
        // a trailing qualifier after a dash is the least valuable part
        if (mb_strlen($title) > $budget) {
            $head = (string) preg_replace('~\s+[—–-]\s+[^—–-]*$~u', '', $title);
            if ($head !== $title && mb_strlen($head) >= 10) {
                $title = trim($head);
            }
        }
        // still long: cut at a word boundary, never mid-word or after an opener
        if (mb_strlen($title) > $budget) {
            $cut = (string) preg_replace('~\s+\S*$~u', '', mb_substr($title, 0, $budget + 1));
            $cut = rtrim($cut, " ,;:-–—(");
            if (mb_strlen($cut) >= 10) {
                $title = $cut;
            }
        }

        // short: say what the page has on it
        if (mb_strlen($title) < $budget - 12) {
            $tails = [
                'finance'      => 'Formula, Rates & Worked Example',
                'health'       => 'Formula, Chart & Worked Example',
                'physics'      => 'Formula, Units & Worked Example',
                'chemistry'    => 'Formula, Units & Worked Example',
                'conversion'   => 'Conversion Table, Formula & Examples',
                'construction' => 'Formula, Chart & Worked Example',
                'food'         => 'Recipe, Formula & Worked Example',
            ];
            $candidates = [
                $tails[$category] ?? 'Free Calculator with Formula & Units',
                'Formula & Worked Example',
                'Formula & Units',
                'Free Calculator',
            ];
            foreach ($candidates as $tail) {
                $candidate = $title . ' — ' . $tail;
                if (mb_strlen($candidate) <= $budget) {
                    return $candidate;
                }
            }
        }

        return $title;
    }

    /**
     * Share card for a page, as a 1200x630 PNG.
     *
     * Social crawlers do not rasterise SVG, so a page whose `og:image` is an SVG
     * shows a blank card wherever the link is posted. One card exists per
     * category (built by `tools/build_og_images.py`) plus a default, and a page
     * gets its own category's card so two different calculators do not advertise
     * themselves with the same picture.
     */
    public function setShareCard(?string $categorySlug): self
    {
        $slug = (string) preg_replace('~[^a-z0-9-]~', '', mb_strtolower((string) $categorySlug));
        $rel  = '/assets/img/og/default.png';
        if ($slug !== '' && is_file(dirname(__DIR__) . '/assets/img/og/' . $slug . '.png')) {
            $rel = '/assets/img/og/' . $slug . '.png';
        }
        $this->ogImage = $this->url($rel);
        return $this;
    }

    /** Page <title>: "X | Onim Calculator" unless it already is the site name. */
    public function fullTitle(): string
    {
        $t = trim($this->title);
        if ($t === '' || $t === SITE_NAME) {
            return SITE_NAME;
        }
        if (str_contains($t, SITE_NAME)) {
            return $t;
        }
        return $t . ' | ' . SITE_NAME;
    }

    public function websiteSchema(string $searchPath = '/search'): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => SITE_NAME,
            'url' => $this->url('/'),
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => [
                    '@type' => 'EntryPoint',
                    'urlTemplate' => $this->url($searchPath) . '?q={search_term_string}',
                ],
                'query-input' => 'required name=search_term_string',
            ],
        ];
    }

    /**
     * A catalogue page's own structured data: the page, and the rows it shows.
     *
     * Only the rows actually rendered go in the list — listing all 4,041 under an
     * `ItemList` that displays 48 would describe a page that does not exist. The
     * `numberOfItems` states the real size, so an answer engine can say "4,041
     * calculators listed 48 at a time" rather than guessing from the markup.
     *
     * @param array<int,array> $rows  rows in display order
     */
    public function collectionSchema(string $name, string $description, array $rows, int $total, int $startIndex = 1): array
    {
        $items = [];
        $i = $startIndex;
        foreach ($rows as $row) {
            $items[] = [
                '@type' => 'ListItem',
                'position' => $i++,
                'name' => (string) ($row['name'] ?? ''),
                'url' => $this->url((string) ($row['path'] ?? '/')),
            ];
        }
        return [
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => $name,
            'description' => $description,
            'url' => $this->canonical,
            'isPartOf' => ['@type' => 'WebSite', 'name' => SITE_NAME, 'url' => $this->url('/')],
            'mainEntity' => [
                '@type' => 'ItemList',
                'name' => $name,
                'numberOfItems' => $total,
                'itemListOrder' => 'https://schema.org/ItemListOrderAscending',
                'itemListElement' => $items,
            ],
        ];
    }

    public function breadcrumbSchema(): array
    {
        $items = [];
        foreach ($this->breadcrumbs as $i => $b) {
            $items[] = [
                '@type' => 'ListItem',
                'position' => $i + 1,
                'name' => $b['name'],
                'item' => $b['url'],
            ];
        }
        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $items,
        ];
    }

    public function faqSchema(array $faq): array
    {
        $items = [];
        foreach ($faq as $f) {
            $items[] = [
                '@type' => 'Question',
                'name' => $f['q'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => trim(strip_tags($f['a'])),
                ],
            ];
        }
        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $items,
        ];
    }

    public function appSchema(array $calc, string $url, ?array $rating = null, array $reviews = []): array
    {
        $node = [
            '@context' => 'https://schema.org',
            '@type' => 'SoftwareApplication',
            'name' => $calc['title'] ?: $calc['name'],
            'url' => $url,
            'applicationCategory' => 'UtilitiesApplication',
            'operatingSystem' => 'Any',
            'description' => $calc['description'],
            'offers' => [
                '@type' => 'Offer',
                'price' => '0',
                'priceCurrency' => 'USD',
            ],
        ];
        /*
         * Only real, reader-written reviews are published as structured data.
         * The harvested "N people find this helpful" number is a like count, not
         * a rating, and inventing an average from it (or hard-coding one) is
         * exactly the fake review markup Google penalises.
         */
        if ($rating !== null && $rating[1] > 0) {
            $node['aggregateRating'] = [
                '@type'       => 'AggregateRating',
                'ratingValue' => number_format((float) $rating[0], 1, '.', ''),
                'reviewCount' => (int) $rating[1],
                'bestRating'  => '5',
                'worstRating' => '1',
            ];
        }
        // Individual reviews, capped: markup that lists a hundred reviews is
        // noise, and Google only ever shows a handful.
        if ($reviews !== []) {
            $node['review'] = array_slice(array_map(
                static fn (array $r) => [
                    '@type' => 'Review',
                    'reviewRating' => [
                        '@type'       => 'Rating',
                        'ratingValue' => (int) $r['rating'],
                        'bestRating'  => '5',
                        'worstRating' => '1',
                    ],
                    'name'         => $r['title'] !== '' ? $r['title'] : 'Review of ' . ($calc['name'] ?? 'this calculator'),
                    'reviewBody'   => $r['body'],
                    'datePublished' => date('Y-m-d', (int) $r['ts']),
                    'author'       => ['@type' => 'Person', 'name' => $r['name']],
                ],
                $reviews
            ), 0, 10);
        }
        if (!empty($calc['authors'])) {
            $node['author'] = array_map(
                static fn ($n) => ['@type' => 'Person', 'name' => $n],
                $calc['authors']
            );
        }
        return $node;
    }

    /** Renders everything that belongs in <head>. */
    public function render(): string
    {
        $e = static fn (string $s): string => htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        $url = $this->canonical !== '' ? $this->canonical : $this->url('/');
        $img = $this->ogImage !== '' ? $this->ogImage : $this->url('/assets/img/og/default.png');
        $alt = $this->fullTitle();

        $out = [];
        $out[] = '<title>' . $e($this->fullTitle()) . '</title>';
        $out[] = '<meta name="description" content="' . $e($this->description) . '">';
        $out[] = '<link rel="canonical" href="' . $e($url) . '">';
        $out[] = '<link rel="alternate" hreflang="en" href="' . $e($url) . '">';
        $out[] = '<link rel="alternate" hreflang="x-default" href="' . $e($url) . '">';
        $out[] = '<meta name="robots" content="' . ($this->noindex ? 'noindex,follow' : 'index,follow,max-image-preview:large') . '">';

        $out[] = '<meta property="og:type" content="' . $e($this->type) . '">';
        $out[] = '<meta property="og:site_name" content="' . $e(SITE_NAME) . '">';
        $out[] = '<meta property="og:title" content="' . $e($this->fullTitle()) . '">';
        $out[] = '<meta property="og:description" content="' . $e($this->description) . '">';
        $out[] = '<meta property="og:url" content="' . $e($url) . '">';
        $out[] = '<meta property="og:image" content="' . $e($img) . '">';
        $out[] = '<meta property="og:image:type" content="image/png">';
        $out[] = '<meta property="og:image:width" content="1200">';
        $out[] = '<meta property="og:image:height" content="630">';
        $out[] = '<meta property="og:image:alt" content="' . $e($alt) . '">';
        $out[] = '<meta property="og:locale" content="en_US">';

        $out[] = '<meta name="twitter:card" content="summary_large_image">';
        $out[] = '<meta name="twitter:title" content="' . $e($this->fullTitle()) . '">';
        $out[] = '<meta name="twitter:description" content="' . $e($this->description) . '">';
        $out[] = '<meta name="twitter:image" content="' . $e($img) . '">';
        $out[] = '<meta name="twitter:image:alt" content="' . $e($alt) . '">';

        if ($this->publishedAt !== '') {
            $out[] = '<meta property="article:published_time" content="' . $e($this->publishedAt) . '">';
        }
        if ($this->updatedAt !== '') {
            $out[] = '<meta property="article:modified_time" content="' . $e($this->updatedAt) . '">';
        }

        return implode("\n    ", $out);
    }

    /** JSON-LD blocks, one <script> per graph. */
    public function renderSchema(): string
    {
        $blocks = [];
        if ($this->breadcrumbs !== []) {
            $blocks[] = $this->breadcrumbSchema();
        }
        foreach ($this->schema as $node) {
            $blocks[] = $node;
        }
        $out = '';
        foreach ($blocks as $b) {
            $json = json_encode($b, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_HEX_TAG);
            $out .= "\n    <script type=\"application/ld+json\">\n" . $json . "\n    </script>";
        }
        return $out;
    }

    public static function sitemap(): string
    {
        // The sitemap needs a lastmod per calculator, which means decoding all
        // 3.8k definitions (about 3.5 s). It is cached until the manifest or
        // any shard changes, so a crawler hitting it repeatedly costs nothing.
        /* Every <loc> is absolute, but the cache must not be tied to one host:
           a sitemap built while the site answered on localhost:8080 was handed
           back verbatim to requests on 127.0.0.1 (and would survive a move to
           a new domain). Keying the cache by host would fix that and cost a
           full 3.8k-page rebuild per host, twice on the first request after
           every content change. So the file stores a placeholder and the
           origin is substituted on the way out — one cache file, always the
           right URLs, and no risk of the substitution itself being cached. */
        $stamp = class_exists(Cms::class) ? Cms::stamp() : 'nocms';
        /* The stamp tracks content, not code — so a change to *what the sitemap
           contains* (a new kind of URL, a new section of the site) used to leave
           the old file in place until somebody deleted it by hand. Bump this when
           the shape of the sitemap changes; the filename carries it, so the next
           request rebuilds and the old file ages out. */
        /* v4: the tool sub-categories were rolled back, and the stamp only
           tracks content in MySQL — a change to data/groups.json leaves it
           untouched, so the v3 file would keep advertising addresses that now
           404 until it aged out. */
        $cacheVersion = 4;
        $cache = Data::path('cache/sitemap-v' . $cacheVersion . '-' . $stamp . '.xml');
        $origin = rtrim(SITE_URL, '/');
        $host = static fn (string $xml): string => str_replace('@@ORIGIN@@', $origin, $xml);
        /* Older generations are dead files. One is kept until it is replaced,
           the rest are pruned here so the cache directory does not grow by one
           250 kB file per content change (87 of them had accumulated). */
        foreach (glob(Data::path('cache/sitemap-*.xml')) ?: [] as $old) {
            if ($old !== $cache && @filemtime($old) < time() - 3600) {
                @unlink($old);
            }
        }
        if (is_file($cache)) {
            $cached = file_get_contents($cache);
            if ($cached !== false && $cached !== '') {
                return $host($cached);
            }
        }

        $urls = [];
        $urls[] = ['loc' => '@@ORIGIN@@' . '/', 'lastmod' => date('Y-m-d'), 'priority' => '1.0'];
        /* The full catalogue, one click from the home page. Filtered views are
           noindex and canonicalise here, so only the bare URL is listed. */
        $urls[] = ['loc' => '@@ORIGIN@@' . '/all-calculators', 'lastmod' => date('Y-m-d'), 'priority' => '0.9'];
        foreach (Data::categories() as $c) {
            $urls[] = [
                'loc' => '@@ORIGIN@@' . '/' . $c['slug'],
                'lastmod' => date('Y-m-d'),
                'priority' => '0.8',
            ];
        }
        /* The file tools: one catalogue for all of them and one page per
           section, because those are the addresses the bands link to. A section
           with nothing in it is left out — an empty list is not a landing
           page. */
        $urls[] = ['loc' => '@@ORIGIN@@' . '/all-tools', 'lastmod' => date('Y-m-d'), 'priority' => '0.8'];
        foreach (Groups::all() as $group) {
            if ((string) $group['slug'] === Groups::CALCULATORS || (string) ($group['parent'] ?? '') !== '') {
                continue;
            }
            if (Groups::countGroup((string) $group['slug']) === 0) {
                continue;
            }
            $urls[] = [
                'loc' => '@@ORIGIN@@' . '/all-tools/' . (string) $group['slug'],
                'lastmod' => date('Y-m-d'),
                'priority' => '0.7',
            ];
        }
        /*
         * The section pages themselves, and one per sub-category.
         *
         * These are the sixteen tabs in the header and the forty-odd children
         * under them: the site's whole taxonomy, reachable from every page and
         * listed in no sitemap at all. A crawler found them only by following
         * the header, which put them an order of magnitude behind the
         * calculators. An empty section is still left out — it is noindex and
         * has nothing to rank with.
         */
        foreach (Groups::rows() as $group) {
            if ((string) $group['slug'] === Groups::CALCULATORS) {
                /* /calculators is the home template at a second address, with a
                   canonical of its own; listing it would enter the same page
                   twice. */
                continue;
            }
            if ((string) ($group['status'] ?? 'published') !== 'published') {
                continue;
            }
            $slug = (string) $group['slug'];
            $isSub = (string) ($group['parent'] ?? '') !== '';
            if (Groups::countGroup($slug) === 0) {
                continue;
            }
            $urls[] = [
                'loc' => '@@ORIGIN@@' . '/' . $slug,
                'lastmod' => date('Y-m-d'),
                'priority' => $isSub ? '0.6' : '0.8',
            ];
        }
        /* One <lastmod> per calculator, read without building the widget:
           see Data::updatedMap(). Building all 4 041 definitions here cost
           450 MB and died on any host with a 128-256 MB memory_limit. */
        $updated = Data::updatedMap();
        foreach (Data::all() as $row) {
            $urls[] = [
                'loc' => '@@ORIGIN@@' . $row['path'],
                'lastmod' => Format::isoDate($updated[$row['path']] ?? '') ?: date('Y-m-d'),
                'priority' => '0.9',
            ];
        }

        // CMS pages and blog posts (the panel decides what is public)
        if (class_exists(Cms::class) && Cms::enabled()) {
            foreach (Db::all("SELECT slug, updated_at FROM pages WHERE status = 'published' AND noindex = 0") as $page) {
                $urls[] = [
                    'loc' => '@@ORIGIN@@' . '/' . $page['slug'],
                    'lastmod' => date('Y-m-d', strtotime((string) $page['updated_at']) ?: time()),
                    'priority' => '0.5',
                ];
            }
            if (Cms::settingBool('seo_sitemap_blog', true)) {
                $urls[] = ['loc' => '@@ORIGIN@@' . '/blog', 'lastmod' => date('Y-m-d'), 'priority' => '0.6'];
                // Category pages are real, indexable lists — they belong here for
                // the same reason /blog does.
                if (Cms::hasCategories()) {
                    foreach (Db::all('SELECT c.slug FROM post_categories c
                                      WHERE EXISTS (SELECT 1 FROM posts p WHERE p.category_id = c.id
                                                    AND p.status = \'published\' AND p.published_at <= NOW())') as $cat) {
                        $urls[] = [
                            'loc' => '@@ORIGIN@@' . '/category/' . $cat['slug'],
                            'lastmod' => date('Y-m-d'),
                            'priority' => '0.5',
                        ];
                    }
                }
                foreach (Db::all("SELECT slug, updated_at FROM posts WHERE status = 'published' AND published_at <= NOW() AND noindex = 0") as $post) {
                    $urls[] = [
                        'loc' => '@@ORIGIN@@' . '/blog/' . $post['slug'],
                        'lastmod' => date('Y-m-d', strtotime((string) $post['updated_at']) ?: time()),
                        'priority' => '0.6',
                    ];
                }
            }
        }
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        foreach ($urls as $u) {
            $xml .= '  <url><loc>' . htmlspecialchars($u['loc'], ENT_XML1) . '</loc>'
                . '<lastmod>' . $u['lastmod'] . '</lastmod>'
                . '<priority>' . $u['priority'] . '</priority></url>' . "\n";
        }
        $xml .= '</urlset>' . "\n";
        $dir = dirname($cache);
        if (!is_dir($dir)) {
            @mkdir($dir, 0777, true);
        }
        @file_put_contents($cache, $xml);
        return $host($xml);
    }

    public static function robots(): string
    {
        $base = rtrim(SITE_URL, '/');
        $indexing = !class_exists(Cms::class) || !Cms::enabled() || Cms::settingBool('seo_indexing', true);

        /*
         * Robots paths are read from the host root, not from wherever robots.txt
         * is served. On a site in a subdirectory (/tool) a bare `/admin/` pointed
         * at a folder that does not exist, so the panel stayed crawlable while
         * the rule looked correct. The base path is prepended.
         */
        $root = site_base();

        if (!$indexing) {
            // A staging copy: keep the whole thing out of the index, sitemap included.
            return "User-agent: *\nDisallow: " . ($root === '' ? '/' : $root . '/') . "\n";
        }

        $lines = [
            "User-agent: *",
            'Allow: ' . ($root === '' ? '/' : $root . '/'),
            'Disallow: ' . $root . '/admin/',
            'Disallow: ' . $root . '/uploads/*.php',
            '',
        ];
        $extra = class_exists(Cms::class) ? trim((string) Cms::setting('seo_robots_extra', '')) : '';
        if ($extra !== '') {
            $lines[] = $extra;
            $lines[] = '';
        }
        $lines[] = 'Sitemap: ' . $base . '/sitemap.xml';
        return implode("\n", $lines) . "\n";
    }
}

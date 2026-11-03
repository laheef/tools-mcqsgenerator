<?php
/**
 * Data access layer for the full catalogue.
 *
 * Definitions live in sharded NDJSON (`data/calc/batch-NNNN.ndjson`) with an
 * offset manifest (`data/calc/manifest.json`) built by tools/build_manifest.py.
 * A page render costs one 4 KB line read, not a 30 MB decode, so the whole
 * catalogue can live on disk without a database.
 *
 * Rows handed to the templates are plain arrays:
 *   path, cat, slug, name, title, description, file, shard, offset, updated
 * `file` stays the lookup key for Data::calculator() so the engine keeps its
 * original call sites.
 */

declare(strict_types=1);

namespace Onim;

final class Data
{
    private static ?array $manifest = null;
    private static ?array $rows = null;
    private static ?array $byPath = null;
    /** Published subset of $rows (public pages). */
    private static ?array $published = null;
    private static array $byCat = [];
    private static array $calcCache = [];
    /** @var array<string,string>|null raw "updated" date per path, for the sitemap */
    private static ?array $updatedMap = null;
    private static ?Units $units = null;
    private static ?array $categories = null;
    /** Admin-managed category rows, keyed by slug. */
    private static ?array $catOverrides = null;
    private static ?array $catNames = null;
    private static ?array $redirects = null;

    /** @var array<string,array<string,float>>|null article-similarity neighbours */
    private static ?array $similar = null;

    public static function path(string $rel = ''): string
    {
        $base = defined('DATA_PATH') ? DATA_PATH : dirname(__DIR__) . '/data';
        return $rel === '' ? $base : $base . '/' . ltrim($rel, '/');
    }

    /**
     * Drop every in-request cache. Called after the panel writes anything the
     * public side renders, so an edit is visible on the next page load instead
     * of on the next request that happens to miss the cache.
     */
    public static function flush(): void
    {
        self::$rows = null;
        self::$byPath = null;
        self::$published = null;
        self::$categories = null;
        self::$catNames = null;
        self::$catOverrides = null;
        self::$byCat = [];
        self::$calcCache = [];
        self::$updatedMap = null;
        self::$similar = null;
        self::$redirects = null;
        if (class_exists(CustomCalc::class)) {
            CustomCalc::flush();
        }
    }

    public static function units(): Units
    {
        if (self::$units === null) {
            self::$units = Units::load(self::path('calc/units.json'));
        }
        return self::$units;
    }

    /* ------------------------------------------------------------------ index */

    private static function manifest(): array
    {
        if (self::$manifest === null) {
            $file = self::path('calc/manifest.json');
            $raw  = is_file($file) ? json_decode((string) file_get_contents($file), true) : null;
            self::$manifest = is_array($raw) ? $raw : ['count' => 0, 'shards' => [], 'categories' => [], 'calcs' => []];
        }
        return self::$manifest;
    }

    /** @return array<int,array> one row per calculator, ordered by category then name */
    public static function all(): array
    {
        $rows = self::allRows();
        if (self::$published === null) {
            self::$published = array_values(array_filter(
                $rows,
                static fn (array $r): bool => ($r['status'] ?? 'published') === 'published'
            ));
        }
        return self::$published;
    }

    /**
     * The whole catalogue including anything the CMS has unpublished.
     * Used by the admin panel and by dashboards; public pages use all().
     *
     * @return array<int,array>
     */
    public static function allRows(): array
    {
        if (self::$rows !== null) {
            return self::$rows;
        }
        $m = self::manifest();
        $rows = [];
        $byPath = [];
        foreach ($m['calcs'] as $c) {
            [$path, $cat, $slug, $name, $desc, $shard, $offset, $length] = $c;
            $row = [
                'path' => $path,
                'cat' => $cat,
                'slug' => $slug,
                'name' => self::cleanName($name),
                'rawName' => $name,
                'title' => $name,
                'description' => self::cleanDescription($desc, $name),
                'file' => $path,
                'shard' => (int) $shard,
                'offset' => (int) $offset,
                'length' => (int) $length,
            ];
            $rows[] = $row;
            $byPath[$path] = $row;
        }
        [$rows, $byPath] = self::applyCmsOverrides($rows, $byPath);

        /*
         * Calculators created in the panel rather than harvested. They carry a
         * `customId` instead of a shard offset, and everything downstream —
         * routing, the form, the solver, search, the sitemap, related links —
         * treats them exactly like a catalogue row. This is the one seam that
         * makes new niches possible without touching code again.
         */
        if (class_exists(CustomCalc::class) && CustomCalc::available()) {
            foreach (CustomCalc::rows() as $custom) {
                if (($custom['status'] ?? '') === 'archived') {
                    continue;
                }
                $row = CustomCalc::dataRow($custom);
                if (isset($byPath[$row['path']])) {
                    continue;               // a rename that collides: the catalogue wins
                }
                $rows[] = $row;
                $byPath[$row['path']] = $row;
            }
        }

        self::$rows = $rows;
        self::$byPath = $byPath;
        return $rows;
    }

    /**
     * Layer the admin panel's calculator rows on top of the harvested catalogue.
     *
     * An override can rename, re-slug, re-categorise, unpublish, feature, reorder
     * or re-seo a calculator — but never touch its formulas, which stay in the
     * NDJSON shards. Original identifiers are kept as `sourcePath`, `sourceCat`
     * and `sourceSlug` so the article file and the shard offset still resolve.
     *
     * @param array<int,array> $rows
     * @param array<string,array> $byPath
     * @return array{0:array<int,array>,1:array<string,array>}
     */
    private static function applyCmsOverrides(array $rows, array $byPath): array
    {
        foreach ($rows as &$row) {
            $row['sourcePath'] = $row['path'];
            $row['sourceCat']  = $row['cat'];
            $row['sourceSlug'] = $row['slug'];
            $row['status']     = 'published';
            $row['sortOrder']  = 0;
            $row['featured']   = false;
        }
        unset($row);

        if (!class_exists(Cms::class)) {
            return [$rows, $byPath];
        }
        $overrides = Cms::overrides();
        if ($overrides === []) {
            return [$rows, $byPath];
        }

        $byPath = [];
        foreach ($rows as &$row) {
            $o = $overrides[$row['sourcePath']] ?? null;
            if ($o !== null) {
                $row['status']    = (string) ($o['status'] ?? 'published');
                $row['sortOrder'] = (int) ($o['sort_order'] ?? 0);
                $row['featured']  = (int) ($o['is_featured'] ?? 0) === 1;
                $row['cmsId']     = (int) $o['id'];

                if (trim((string) ($o['category_slug'] ?? '')) !== '') {
                    $row['cat'] = (string) $o['category_slug'];
                }
                if (trim((string) ($o['slug'] ?? '')) !== '') {
                    $row['slug'] = (string) $o['slug'];
                }
                $row['path'] = '/' . $row['cat'] . '/' . $row['slug'];
                $row['file'] = $row['path'];

                if (trim((string) ($o['name'] ?? '')) !== '') {
                    $row['name']  = (string) $o['name'];
                    $row['title'] = (string) $o['name'];
                }
                if (trim((string) ($o['meta_description'] ?? '')) !== '') {
                    $row['description'] = (string) $o['meta_description'];
                }
                if (trim((string) ($o['icon'] ?? '')) !== '') {
                    $row['icon'] = (string) $o['icon'];
                }
                if (trim((string) ($o['thumbnail'] ?? '')) !== '') {
                    $row['thumbnail'] = (string) $o['thumbnail'];
                }
            }
            $byPath[$row['path']] = $row;
        }
        unset($row);

        return [$rows, $byPath];
    }

    /** @return array{count:int,calculators:array<int,array>} */
    public static function index(): array
    {
        return ['count' => self::total(), 'calculators' => self::all()];
    }

    public static function total(): int
    {
        // counted from the merged rows so unpublished calculators are excluded
        return count(self::all());
    }

    /* -------------------------------------------------------------- one calc */

    /** Read one line out of its shard and adapt it to the engine shape. */
    /**
     * Publication date of every calculator, keyed by path.
     *
     * The sitemap needs one <lastmod> per URL. Asking Data::calculator() for
     * them meant building (and caching) the full widget definition for all
     * 4 041 pages just to read one string — 450 MB of peak memory on a cold
     * cache, which is more than a shared host gives PHP. The date lives in the
     * same NDJSON line as the rest of the definition, so this reads the line,
     * keeps the one field and throws the record away.
     *
     * @return array<string,string>
     */
    public static function updatedMap(): array
    {
        if (self::$updatedMap !== null) {
            return self::$updatedMap;
        }
        $map = [];
        $manifest = self::manifest();
        $byShard = [];
        foreach (self::allRows() as $row) {
            if (isset($row['customId'])) {
                $custom = class_exists(CustomCalc::class) ? CustomCalc::find((int) $row['customId']) : null;
                $map[(string) $row['path']] = $custom !== null ? (string) ($custom['updated_at'] ?? '') : '';
                continue;
            }
            $byShard[(int) $row['shard']][] = $row;
        }
        foreach ($byShard as $index => $rows) {
            $shard = $manifest['shards'][$index] ?? null;
            if ($shard === null) {
                continue;
            }
            $fh = @fopen(self::path('calc/' . $shard), 'rb');
            if ($fh === false) {
                continue;
            }
            foreach ($rows as $row) {
                fseek($fh, (int) $row['offset']);
                $line = fread($fh, max(1, (int) $row['length']));
                $rec = is_string($line) ? json_decode($line, true) : null;
                if (is_array($rec)) {
                    $map[(string) $row['path']] = (string) ($rec['updated'] ?? '');
                }
            }
            fclose($fh);
        }
        return self::$updatedMap = $map;
    }

    public static function calculator(string $file): ?array
    {
        $key = $file;
        if (isset(self::$calcCache[$key])) {
            return self::$calcCache[$key];
        }
        // accept both '/math/percentage' and legacy 'math--percentage.json'
        if (str_contains($key, '--')) {
            $key = '/' . str_replace(['--', '.json'], ['/', ''], $key);
        }
        $row = self::row($key);
        if ($row === null) {
            return null;
        }
        $rec = self::readRecord($row);
        if ($rec === null) {
            return null;
        }
        $sourceCat  = (string) ($row['sourceCat'] ?? $row['cat']);
        $sourceSlug = (string) ($row['sourceSlug'] ?? $row['slug']);
        $calc = Shape::fromRecord($rec, self::content($sourceCat, $sourceSlug), self::catNames());
        $calc['title'] = $calc['title'] !== '' ? $calc['title'] : $row['name'];

        // the CMS may say this calculator now lives somewhere else
        $calc['sourcePath'] = (string) ($row['sourcePath'] ?? $row['path']);
        $calc['path'] = (string) ($row['path'] ?? $calc['path']);
        $calc['slug'] = (string) ($row['slug'] ?? $calc['slug']);
        $calc['cat']  = (string) ($row['cat'] ?? $calc['cat']);
        $calc['file'] = $calc['path'];
        $calc['id']   = $calc['path'];
        if (isset($row['icon'])) {
            $calc['icon'] = (string) $row['icon'];
        }
        if (isset($row['thumbnail'])) {
            $calc['thumbnail'] = (string) $row['thumbnail'];
        }
        if (isset($row['cmsId'])) {
            $calc['cmsId'] = (int) $row['cmsId'];
        }
        /* A calculator written here rather than harvested: its author chose its
           defaults deliberately, and the "nothing prefilled" rule is about the
           reference site's prefills. The widget asks this to decide. */
        if (isset($row['customId'])) {
            $calc['authored'] = true;
        }
        $calc['category'] = [
            'slug' => $calc['cat'],
            'name' => self::catNames()[$calc['cat']] ?? ucfirst(str_replace('-', ' ', $calc['cat'])),
        ];
        return self::$calcCache[$key] = $calc;
    }

    private static function readRecord(array $row): ?array
    {
        if (isset($row['customId'])) {
            $custom = CustomCalc::find((int) $row['customId']);
            if ($custom === null) {
                return null;
            }
            $record = CustomCalc::record($custom);
            return $record === [] ? null : $record;
        }
        $manifest = self::manifest();
        $shard = $manifest['shards'][$row['shard']] ?? null;
        if ($shard === null) {
            return null;
        }
        $fh = @fopen(self::path('calc/' . $shard), 'rb');
        if ($fh === false) {
            return null;
        }
        fseek($fh, (int) $row['offset']);
        $line = fread($fh, max(1, (int) $row['length']));
        fclose($fh);
        $rec = $line !== false ? json_decode($line, true) : null;
        if (!is_array($rec)) {
            return null;
        }
        /*
         * A harvested page whose equation list was lost is repaired by a
         * supplement file, merged here so every caller sees the whole page.
         */
        $rec = Supplement::apply((string) ($rec['path'] ?? ''), $rec);
        return $rec;
    }

    /**
     * Generated prose for one calculator, with any admin edits merged over it.
     *
     * The file supplies the baseline article; the CMS row replaces only the
     * parts an editor actually saved, so a half-finished edit never blanks a
     * page.
     *
     * @return array|null
     */
    public static function content(string $cat, string $slug): ?array
    {
        $custom = (class_exists(CustomCalc::class) && CustomCalc::available())
            ? CustomCalc::findByPath('/' . $cat . '/' . $slug)
            : null;

        if ($custom !== null) {
            $raw = CustomCalc::content($custom);
        } else {
            $file = self::path('content/' . $cat . '/' . $slug . '.json');
            $raw  = is_file($file) ? json_decode((string) file_get_contents($file), true) : null;
            $raw  = is_array($raw) ? $raw : null;
        }

        if (!class_exists(Cms::class)) {
            return $raw;
        }
        $override = Cms::overrideFor('/' . $cat . '/' . $slug);
        if ($override === null) {
            return $raw;
        }

        $raw ??= ['path' => '/' . $cat . '/' . $slug, 'cat' => $cat, 'slug' => $slug];
        foreach (['summary' => 'summary', 'h1' => 'h1', 'meta_title' => 'seoTitle', 'meta_description' => 'seoDesc'] as $col => $key) {
            $value = trim((string) ($override[$col] ?? ''));
            if ($value !== '') {
                $raw[$key] = $value;
            }
        }
        if (trim((string) ($override['sections'] ?? '')) !== '') {
            $sections = Cms::decode((string) $override['sections']);
            $clean = [];
            foreach ($sections as $section) {
                if (!is_array($section)) {
                    continue;
                }
                $title = trim((string) ($section['title'] ?? ''));
                $html  = (string) ($section['html'] ?? '');
                if ($title === '' && trim(strip_tags($html)) === '') {
                    continue;
                }
                $clean[] = ['title' => $title, 'html' => $html];
            }
            $raw['sections'] = $clean;
        }
        if (trim((string) ($override['faq'] ?? '')) !== '') {
            $faq = Cms::decode((string) $override['faq']);
            $clean = [];
            foreach ($faq as $pair) {
                if (!is_array($pair)) {
                    continue;
                }
                $q = trim((string) ($pair['q'] ?? ''));
                $a = trim((string) ($pair['a'] ?? ''));
                if ($q !== '' && $a !== '') {
                    $clean[] = ['q' => $q, 'a' => $a];
                }
            }
            $raw['faq'] = $clean;
        }
        if (trim((string) ($override['related'] ?? '')) !== '') {
            $paths = Cms::decode((string) $override['related']);
            $clean = [];
            foreach ($paths as $path) {
                $target = is_string($path) ? self::row($path) : null;
                if ($target !== null && ($target['status'] ?? 'published') === 'published') {
                    $clean[] = ['path' => $target['path'], 'name' => $target['name']];
                }
            }
            if ($clean !== []) {
                $raw['related'] = $clean;
            }
        }
        return $raw;
    }

    /** @return array<string,array> */
    public static function row(?string $path = null): ?array
    {
        if (self::$byPath === null) {
            self::all();
        }
        if ($path === null) {
            return null;
        }
        return self::$byPath[$path] ?? null;
    }

    public static function findRow(string $cat, string $slug): ?array
    {
        $row = self::row('/' . $cat . '/' . $slug);
        if ($row !== null) {
            // A calculator the panel unpublished or archived must 404, even
            // though it is still in the harvested catalogue.
            return ($row['status'] ?? 'published') === 'published' ? $row : null;
        }
        // an admin may have re-slugged or re-categorised it
        if (class_exists(Cms::class)) {
            $source = Cms::overrideRoutes()[$cat . '/' . $slug] ?? null;
            if ($source !== null) {
                $row = self::row($source);
                if ($row !== null && ($row['status'] ?? 'published') !== 'published') {
                    return null;
                }
                if ($row !== null) {
                    return $row;
                }
            }
        }
        // alias from the sitemap that the reference site now redirects
        $target = self::redirects()['/' . $cat . '/' . $slug] ?? null;
        if ($target !== null) {
            return self::row($target);
        }
        return null;
    }

    public static function findByRoute(string $cat, string $slug): ?array
    {
        $row = self::findRow($cat, $slug);
        return $row === null ? null : self::calculator((string) $row['path']);
    }

    /** @return array<string,string> old path => canonical path */
    public static function redirects(): array
    {
        if (self::$redirects === null) {
            $file = self::path('calc/redirects.json');
            $raw  = is_file($file) ? json_decode((string) file_get_contents($file), true) : null;
            self::$redirects = is_array($raw) ? $raw : [];
        }
        return self::$redirects;
    }

    /**
     * How well this calculator can be evaluated from its definition alone:
     *   full    — every equation has a working direction
     *   partial — some equations need the original page's custom script
     *   none    — the whole result set comes from a custom script
     * Produced by tools/audit_expr.php.
     */
    public static function support(string $path): string
    {
        static $table = null;
        if ($table === null) {
            $file = self::path('calc/support.json');
            $raw  = is_file($file) ? json_decode((string) file_get_contents($file), true) : null;
            $table = is_array($raw) ? $raw : [];
        }
        return $table[$path] ?? 'full';
    }

    public static function redirectFor(string $path): ?string
    {
        return self::redirects()[$path] ?? null;
    }

    /**
     * Strip the SEO tail off a manifest name.
     *
     * The harvested list stores names as they appear in <title>: "Animal
     * mortality rate Calculator — Answer, Formula & Units", "Allele frequency:
     * Free Calculator with Units". That tail is fine for a <title> and wrong
     * everywhere a human reads it — cards, chips, breadcrumbs, related lists.
     */
    public static function cleanName(string $name): string
    {
        $name = trim($name);
        $patterns = [
            /*
             * The harvested titles carry the SEO tail in the name field as well
             * as in the meta title: 937 end ": Free, With Steps", 885 end
             * "— Formula, Units & Example" and 895 "— Free Online Calculator".
             * On a card or in a list that reads as a keyword-stuffed label, so
             * the tail is stripped for display; `rawName` and `title` keep it for
             * the <title> tag, where it is doing real work.
             */
            '~\s*[:—–-]\s*Free,?\s+With\s+Steps\s*$~iu',
            '~\s*[—–-]\s*Formula\s*&\s*Results\s*$~iu',
            '~\s*[:—–-]\s*Formula,?\s*Units\s*&\s*Example\s*$~iu',
            '~\s*[—–-]\s*Answer,? Formula\s*&\s*Units\s*$~iu',
            '~\s*[—–-]\s*Free Calculator with Units\s*$~iu',
            '~\s*:\s*Free Calculator with Units\s*$~iu',
            '~\s*[—–-]\s*Free Online Calculator\s*$~iu',
            '~\s*:\s*Free Online Calculator\s*$~iu',
            '~\s*[—–-]\s*Onim Calculator\s*$~iu',
            '~\s*\|\s*Onim Calculator\s*$~iu',
        ];
        foreach ($patterns as $p) {
            $name = (string) preg_replace($p, '', $name);
        }
        return trim($name) !== '' ? trim($name) : trim($name);
    }

    /**
     * Shorten a manifest description for a card.
     *
     * Descriptions end with the same boilerplate on every one of the 3,831
     * pages ("— a free, unit-aware biology calculator with the formula shown"),
     * which is noise in a 90-character card but useful in a meta description.
     */
    /** Words so common in calculator names that they carry almost no signal. */
    private const UBIQUITOUS = [
        'rate', 'ratio', 'index', 'value', 'number', 'cost', 'price', 'size',
        'area', 'length', 'mass', 'time', 'type', 'unit', 'scale', 'model',
    ];

    /**
     * Used when a description contains nothing but boilerplate. Several
     * variants, picked by the calculator's own name, so a grid of cards never
     * shows the same sentence six times.
     */
    private const FALLBACK_BLURBS = [
        'Formula, units and a worked example, with the result shown once you press Calculate.',
        'Every value in the form feeds one relationship, so changing any of them updates the answer.',
        'Shows the relationship behind the result, the units it accepts and a worked example.',
        'Type what you know, leave the unknown blank, and the calculator solves for it.',
        'Comes with the definition of each field, the formula and a check you can do in your head.',
    ];

    private static function fallbackBlurb(string $name): string
    {
        $list = self::FALLBACK_BLURBS;
        return $list[(int) sprintf('%u', crc32($name)) % count($list)];
    }

    /**
     * Turn the raw "work out your result from …" tail into clean input labels.
     *
     * The tail is a stitched label list from the reference definitions, so it
     * carries their noise: `^^(required)^^` markers, emoji, the "what would you
     * like to know?" solve-for selector and bare "Choose an equation:" prompts.
     * Those read as gibberish inside a sentence, so they are dropped.
     *
     * @return array<int,string>
     */
    private static function fieldList(string $raw): array
    {
        // =="x"== is the reference's subscript markup: A==1== renders as A₁
        $raw = str_replace(['^^', '**', '__', '==', '⮑', '→', '⇒'], ' ', $raw);
        $raw = (string) preg_replace('~\(\s*(?:required|optional|opt\.?)\s*\)~iu', '', $raw);
        // emoji / pictographs and stray punctuation carry no meaning here
        $raw = (string) preg_replace('~[^\p{L}\p{N}\s%°/\'’().,-]~u', ' ', $raw);
        // "A 1" / "(W 1 )" are one token, not two
        $raw = (string) preg_replace('~\b([A-Za-z])\s+(\d)\b~u', '$1$2', $raw);
        $raw = (string) preg_replace('~\(\s*([A-Za-z])(\d)\s*\)~u', '($1$2)', $raw);
        $raw = (string) preg_replace('~\s+~', ' ', $raw);
        // a bracketed symbol ("(r)", "(h₁)") is useful; a phrase in brackets
        // ("(t ridge board )") is just noise from a subscripted variable
        $raw = (string) preg_replace_callback('~\(\s*([^)]*?)\s*\)~u', static function (array $m): string {
            $inner = trim((string) preg_replace('~\s+~', ' ', $m[1]));
            if ($inner === '') {
                return '';
            }
            return mb_strpos($inner, ' ') === false ? '(' . $inner . ')' : '';
        }, $raw);
        $raw = (string) preg_replace('~\s+~', ' ', $raw);
        // the reference writes the pronoun in lower case ("i'm serving")
        $raw = (string) preg_replace_callback("~\bi'\s?(m|ve|ll|d)\b~iu", static fn (array $m): string => "I'" . mb_strtolower($m[1]), $raw);
        $raw = trim($raw, " .,;:");

        $bits = preg_split('~\s*(?:,|\band\b|&)\s*~i', $raw) ?: [];
        $out  = [];
        foreach ($bits as $bit) {
            $bit = trim((string) preg_replace('~\s+~', ' ', $bit), " .,;:");
            if ($bit === '' || mb_strlen($bit) < 2) {
                continue;
            }
            // the solve-for selector and menu prompts are not inputs
            if (preg_match('~^(what|which)\b.*\b(know|want|need|solve)\b~iu', $bit) === 1) {
                continue;
            }
            if (preg_match('~^(choose|select|pick|enter|type)\b~iu', $bit) === 1) {
                continue;
            }
            if (mb_strpos($bit, '?') !== false) {
                continue;
            }
            // never lowercase the pronoun: "I'm serving" -> "i'm serving"
            if (preg_match('~^I(\'|’|\b)~u', $bit) !== 1) {
                $bit = mb_strtolower(mb_substr($bit, 0, 1)) . mb_substr($bit, 1);
            }
            $out[] = $bit;
        }
        // three inputs is as many as a meta description can carry
        return array_slice(array_values(array_unique($out)), 0, 3);
    }

    /**
     * Join input labels into one readable clause: "a", "a and b", "a, b and c".
     *
     * @param array<int,string> $parts
     */
    private static function joinFields(array $parts): string
    {
        $n = count($parts);
        if ($n === 0) {
            return '';
        }
        if ($n === 1) {
            return $parts[0];
        }
        $last = array_pop($parts);
        return implode(', ', $parts) . ' and ' . $last;
    }

    /** Sentences naming the calculator's inputs, picked by name so they vary. */
    private const FIELD_SENTENCES = [
        'Enter %fields — the %name gives the result with the formula and units.',
        'Type in %fields for an instant answer from the %name, formula included.',
        '%Name: enter %fields, press Calculate and read the result, units and all.',
        'Give the %name %fields and it returns the result plus the formula.',
        'The %name takes %fields and shows the result with the formula and units.',
    ];

    /**
     * Build the fallback meta description from input labels.
     *
     * @param array<int,string> $parts
     */
    private static function fieldSentence(array $parts, string $name): string
    {
        $label = trim(self::cleanName($name));
        if ($label === '') {
            return self::fallbackBlurb($name);
        }
        $cap  = 150; // the meta-description window
        $card = 96;  // a grid card shows about this much before it clips
        $pool = self::FIELD_SENTENCES;
        // "Give the Convert fraction to percentage Calculator numerator and
        // denominator" is unreadable, so names that already end in "Calculator"
        // only take templates that start with the inputs.
        if (preg_match('~\bcalculator$~i', $label) === 1) {
            $pool = [$pool[0], $pool[1], $pool[2], $pool[4]];
        }
        // try the name's own template first, then the rest, so phrasing still
        // varies across the catalogue instead of collapsing to one sentence
        $start = (int) sprintf('%u', crc32($label)) % count($pool);
        $order = [];
        for ($i = 0; $i < count($pool); $i++) {
            $order[] = $pool[($start + $i) % count($pool)];
        }
        $lead = mb_strtoupper(mb_substr($label, 0, 1)) . mb_substr($label, 1);

        // Long input labels push the sentence past both windows, so shed the
        // least important inputs rather than truncating mid-phrase, and prefer
        // whichever template lets a card show the sentence whole.
        $fits = null;
        for ($keep = count($parts); $keep >= 1; $keep--) {
            $fields = self::joinFields(array_slice($parts, 0, $keep));
            foreach ($order as $tpl) {
                $out = str_replace(['%Name', '%name', '%fields'], [$lead, $label, $fields], $tpl);
                if (mb_strlen($out) > $cap) {
                    continue;
                }
                if (mb_strlen($out) <= $card) {
                    return $out;
                }
                $fits = $fits ?? $out;
            }
        }
        return $fits ?? self::fallbackBlurb($name);
    }


    public static function cleanDescription(string $desc, string $name = ''): string
    {
        $desc = trim($desc);

        // 1. "Name: work out your result from A and B — a free, unit-aware …
        //     biology calculator with the formula shown."  ->  a real sentence
        //     naming the inputs, never a bare "Takes A and B."
        //     The terminator must be a spaced dash or a full stop: a bare "-"
        //     would cut "after-tax income" short at "after".
        if (preg_match('~^(.{2,80}?):\s*work out your result from (.+?)\s*(?:\s[—–]\s|\s-\s|\.\s|\.$|$)~iu', $desc, $m) === 1) {
            $parts = self::fieldList($m[2]);
            if ($parts === []) {
                return self::fallbackBlurb($name);
            }
            return self::fieldSentence($parts, $name);
        }

        // 1b. "Name: a free, unit-aware … calculator with the working shown."
        if (preg_match('~^.{2,80}?:\s*a free,?~iu', $desc) === 1) {
            return self::fallbackBlurb($name);
        }

        // 2. drop the trailing marketing sentence(s)
        $desc = (string) preg_replace('~\s*[—–-]\s*a free,?[^.]*\.?\s*$~iu', '', $desc);
        $desc = (string) preg_replace('~\s*A free[^.]*calculator[^.]*\.?\s*$~iu', '', $desc);
        $desc = (string) preg_replace('~\s*Enter your figures and read the result instantly\.?\s*$~iu', '', $desc);

        // 3. the label is already the card title
        $label = mb_strtolower(trim(self::cleanName($name)));
        if ($label !== '' && mb_strpos(mb_strtolower($desc), $label . ':') === 0) {
            $desc = trim(mb_substr($desc, mb_strlen($label) + 1));
        }

        $desc = trim($desc, " .,;:\t\n");
        if ($desc === '') {
            return self::fallbackBlurb($name);
        }
        if ($desc !== '') {
            $desc = mb_strtoupper(mb_substr($desc, 0, 1)) . mb_substr($desc, 1);
            $desc .= '.';
        }
        return $desc;
    }

    /* ------------------------------------------------------------ categories */

    private static function catNames(): array
    {
        if (self::$catNames === null) {
            self::$catNames = array_column(self::allCategories(), 'name', 'slug');
            // a category created in the panel (e.g. for a custom calculator)
            foreach (self::categoryOverrides() as $slug => $row) {
                if (trim((string) ($row['name'] ?? '')) !== '') {
                    self::$catNames[$slug] = (string) $row['name'];
                }
            }
            /* A tool filed under a section rather than a calculator category:
               the breadcrumb says "Image Converters", not "Img Converters". */
            if (class_exists(Groups::class)) {
                foreach (Groups::rows() as $group) {
                    $slug = (string) ($group['slug'] ?? '');
                    if ($slug !== '' && !isset(self::$catNames[$slug])) {
                        self::$catNames[$slug] = (string) $group['name'];
                    }
                }
            }
        }
        return self::$catNames;
    }

    /** Categories that actually hold calculators in this build. */
    public static function categories(): array
    {
        if (self::$categories === null) {
            /* A tool filed under a section — /img-converters, /audio — uses the
               section slug as its category. That slug is not a calculator
               topic: it has a page of its own, it is already in the secondary
               header, and listing it here would put "Audio Tools" inside the
               Calculators dropdown and in the calculator grid. */
            $isSection = static function (string $slug): bool {
                return class_exists(Groups::class) && Groups::isSection($slug);
            };
            $counts = [];
            foreach (self::all() as $row) {
                $counts[$row['cat']] = ($counts[$row['cat']] ?? 0) + 1;
            }
            $overrides = self::categoryOverrides();
            $out = [];
            foreach (self::allCategories() as $cat) {
                $slug = (string) $cat['slug'];
                if ($slug === 'discover' || $isSection($slug)) {
                    continue;
                }
                $o = $overrides[$slug] ?? null;
                if ($o !== null && ($o['status'] ?? 'published') !== 'published') {
                    continue;
                }
                if (($counts[$slug] ?? 0) > 0) {
                    $cat['count'] = $counts[$slug];
                    if ($o !== null) {
                        foreach (['name', 'title', 'description', 'icon', 'meta_title', 'meta_description', 'sort_order', 'noindex'] as $col) {
                            if (trim((string) ($o[$col] ?? '')) !== '') {
                                $cat[$col] = $o[$col];
                            }
                        }
                    }
                    $out[] = $cat;
                }
            }
            // categories created in the panel that the harvested list has never heard of
            foreach ($overrides as $slug => $o) {
                if (($counts[$slug] ?? 0) === 0 || ($o['status'] ?? 'published') !== 'published' || $isSection((string) $slug)) {
                    continue;
                }
                $known = false;
                foreach ($out as $c) {
                    $known = $known || $c['slug'] === $slug;
                }
                if (!$known) {
                    $out[] = [
                        'slug' => $slug,
                        'name' => (string) $o['name'],
                        'title' => (string) ($o['title'] ?: $o['name'] . ' Calculators'),
                        'description' => (string) $o['description'],
                        'icon' => (string) ($o['icon'] ?: 'grid'),
                        'meta_title' => (string) $o['meta_title'],
                        'meta_description' => (string) $o['meta_description'],
                        'count' => $counts[$slug],
                    ];
                }
            }
            usort($out, static fn (array $a, array $b): int => ((int) ($a['sort_order'] ?? 0)) <=> ((int) ($b['sort_order'] ?? 0)));
            self::$categories = $out;
        }
        return self::$categories;
    }

    /** @return array<string,array> admin-managed category rows keyed by slug */
    private static function categoryOverrides(): array
    {
        if (self::$catOverrides === null) {
            self::$catOverrides = [];
            if (class_exists(Cms::class) && Cms::enabled() && Db::hasTable('categories')) {
                foreach (Db::all('SELECT * FROM categories') as $r) {
                    self::$catOverrides[(string) $r['slug']] = $r;
                }
            }
        }
        return self::$catOverrides;
    }

    /** Every category from the reference site, including any empty ones. */
    public static function allCategories(): array
    {
        static $raw = null;
        if ($raw === null) {
            $decoded = json_decode((string) @file_get_contents(self::path('categories.json')), true);
            $raw = is_array($decoded) ? $decoded : [];
        }
        return $raw;
    }

    public static function category(string $slug): ?array
    {
        foreach (self::categories() as $c) {
            if ($c['slug'] === $slug) {
                return $c;
            }
        }
        return null;
    }

    /** @return array<int,array> calculators of one category, alphabetical */
    public static function byCategory(string $cat): array
    {
        if (isset(self::$byCat[$cat])) {
            return self::$byCat[$cat];
        }
        $out = [];
        foreach (self::all() as $row) {
            if ($row['cat'] === $cat) {
                $out[] = $row;
            }
        }
        return self::$byCat[$cat] = $out;
    }

    public static function countByCategory(string $cat): int
    {
        foreach (self::categories() as $c) {
            if ($c['slug'] === $cat) {
                return (int) ($c['count'] ?? 0);
            }
        }
        return count(self::byCategory($cat));
    }

    /* ------------------------------------------------------------- discovery */

    /** Featured list for the homepage: one per category, then fill up. */
    public static function featured(int $limit = 12): array
    {
        $picked = [];
        $seenCat = [];
        foreach (self::all() as $row) {
            if (isset($seenCat[$row['cat']])) {
                continue;
            }
            $seenCat[$row['cat']] = true;
            $picked[] = $row;
        }
        foreach (self::all() as $row) {
            if (count($picked) >= $limit) {
                break;
            }
            foreach ($picked as $p) {
                if ($p['path'] === $row['path']) {
                    continue 2;
                }
            }
            $picked[] = $row;
        }
        return array_slice($picked, 0, $limit);
    }

    /**
     * Related calculators.
     *
     * Scoring runs over the whole catalogue, not just the current category: for
     * "Animal mortality rate" the most useful neighbour is "Mortality rate"
     * (Health), not whatever happens to sit next to it alphabetically in
     * Biology. Sharing a meaningful word in the name is what counts; sharing a
     * category is worth much less.
     */
    /**
     * Nearest calculators by what their articles actually say.
     *
     * Built offline by `tools/build_related.py` (TF-IDF over all 3,831 articles)
     * and read here, because computing it per request would be absurd and
     * because the result must be identical on every render. Name-word scoring
     * below is a decent fallback, but it degrades into alphabetical order for
     * calculators whose names share no useful word — which is exactly the case
     * where a reader most needs a real suggestion.
     *
     * @return array<string,float> path => similarity
     */
    private static function similarTo(string $path): array
    {
        if (self::$similar === null) {
            $file = self::path('cache/related-index.json');
            $raw  = is_file($file) ? json_decode((string) file_get_contents($file), true) : null;
            self::$similar = is_array($raw) ? $raw : [];
        }
        $list = self::$similar[$path] ?? [];
        $out  = [];
        foreach ($list as $pair) {
            if (is_array($pair) && isset($pair[0])) {
                $out[(string) $pair[0]] = (float) ($pair[1] ?? 0.0);
            }
        }
        return $out;
    }

    public static function related(string $path, string $cat, int $limit = 6): array
    {
        $self = self::row($path);
        if ($self === null) {
            return array_slice(self::byCategory($cat), 0, $limit);
        }

        // Article similarity first; the older scoring is only a top-up.
        $picked = [];
        foreach (self::similarTo($path) as $candidate => $score) {
            $row = self::row($candidate);
            if ($row === null || $row['path'] === $path) {
                continue;
            }
            $picked[] = $row;
            if (count($picked) >= $limit) {
                return $picked;
            }
        }

        $words = self::keywords((string) $self['name']);

        $scored  = [];
        $fillers = [];
        foreach (self::all() as $row) {
            if ($row['path'] === $path) {
                continue;
            }
            $nameKeys = self::keywords((string) $row['name']);
            $shared   = array_intersect($words, $nameKeys);

            /*
             * Only the name counts. Descriptions are generated from a handful
             * of templates, so every page shares the same words ("formula",
             * "units", "worked example") and scoring them promoted unrelated
             * pages above real matches.
             */
            $score = 0;
            foreach ($shared as $w) {
                // a word that appears in a hundred calculator names says
                // nothing about two pages being neighbours
                $score += in_array((string) $w, self::UBIQUITOUS, true) ? 4 : 20;
            }
            if ($row['cat'] === $cat) {
                $score += 10;
            }
            if ($score <= 10) {
                // same category and nothing else in common: a reasonable last
                // resort, but never ahead of a real match
                if ($row['cat'] === $cat) {
                    $fillers[] = [$score, $row];
                }
                continue;
            }
            $scored[] = [$score, $row];
        }

        if ($scored === []) {
            foreach (self::byCategory($cat) as $row) {
                if ($row['path'] !== $path) {
                    $scored[] = [10, $row];
                }
            }
        }

        $byScore = static fn ($a, $b) => $b[0] <=> $a[0]
            ?: strcasecmp((string) $a[1]['name'], (string) $b[1]['name']);
        usort($scored, $byScore);
        usort($fillers, $byScore);

        // strong matches first, then same-category neighbours to fill the grid
        $merged = array_merge($scored, $fillers);

        $out = $picked;
        $seen = array_flip(array_map(static fn ($r) => (string) $r['path'], $out));
        foreach ($merged as $s) {
            $row = $s[1];
            if (isset($seen[(string) $row['path']])) {
                continue;
            }
            $seen[(string) $row['path']] = true;
            $out[] = $row;
            if (count($out) >= $limit) {
                break;
            }
        }

        return array_slice($out, 0, $limit);
    }

    /**
     * Related calculators with a reason attached, for the card grid.
     *
     * Cards read better when they say *why* two pages are neighbours, so each
     * row carries a short "shares …" note. The tag vocabulary is the calculator
     * name broken into meaningful words, which is the same signal the scoring
     * uses.
     *
     * @return array<int,array{row:array,reason:string,shared:array<int,string>}>
     */
    public static function relatedCards(string $path, ?string $cat, int $limit = 6): array
    {
        $cat   = (string) ($cat ?? 'other');
        $self  = self::row($path);
        $words = self::keywords((string) ($self['name'] ?? ''));
        $rows  = self::related($path, $cat, $limit * 3);

        $out = [];
        foreach ($rows as $row) {
            $theirs = self::keywords((string) $row['name']);
            $shared = array_values(array_intersect($words, $theirs));
            if ($shared !== []) {
                $reason = 'Also covers ' . implode(', ', array_slice($shared, 0, 2));
            } else {
                $reason = 'Also in ' . self::catName($cat);
            }
            $out[] = ['row' => $row, 'reason' => $reason, 'shared' => $shared];
            if (count($out) >= $limit) {
                break;
            }
        }
        return $out;
    }

    /**
     * Meaningful words of a calculator name: no stop words, no unit-of-measure
     * noise, minimum four letters. Used for "shares …" labels and for matching
     * calculators to the categories and concepts named inside an article.
     *
     * @return array<int,string>
     */
    public static function keywords(string $name): array
    {
        static $stop = null;
        if ($stop === null) {
            $stop = array_flip([
                'calculator', 'calculators', 'calc', 'what', 'your', 'with', 'from', 'that',
                'this', 'have', 'will', 'much', 'many', 'does', 'need', 'should', 'into',
                'over', 'under', 'between', 'other', 'than', 'then', 'also', 'about',
                'based', 'using', 'find', 'free', 'online', 'here', 'they', 'them',
            ]);
        }
        // Crude but effective normalisation: "percentages"/"percentage" and
        // "percent" are the same concept to a reader looking for a neighbour.
        $alias = [
            'percentage' => 'percent', 'percentages' => 'percent', 'percents' => 'percent',
            'calculation' => 'calc', 'calculate' => 'calc',
            'conversion' => 'convert', 'conversions' => 'convert',
            'interests' => 'interest', 'payments' => 'payment', 'salaries' => 'salary',
            'calories' => 'calorie', 'weights' => 'weight', 'heights' => 'height',
            'areas' => 'area', 'volumes' => 'volume', 'speeds' => 'speed',
            'distances' => 'distance', 'pressures' => 'pressure', 'ratios' => 'ratio',
            'probabilities' => 'probability', 'fractions' => 'fraction',
            'equations' => 'equation', 'functions' => 'function', 'angles' => 'angle',
            'triangles' => 'triangle', 'circles' => 'circle', 'squares' => 'square',
            'growth' => 'growth', 'taxes' => 'tax', 'costs' => 'cost', 'prices' => 'price',
        ];
        $out = [];
        foreach (preg_split('/[^a-z0-9]+/', mb_strtolower($name)) ?: [] as $w) {
            if (mb_strlen($w) < 4 || isset($stop[$w])) {
                continue;
            }
            if (isset($alias[$w])) {
                $w = $alias[$w];
            } elseif (str_ends_with($w, 's') && mb_strlen($w) > 5) {
                $w = mb_substr($w, 0, -1);
            }
            $out[$w] = true;
        }
        return array_keys($out);
    }

    public static function catName(string $slug): string
    {
        return self::catNames()[$slug] ?? ucfirst($slug);
    }

    /** @return array<int,array> naive but effective search */
    public static function search(string $q, int $limit = 30): array
    {
        $q = trim($q);
        if ($q === '') {
            return [];
        }
        $needle = mb_strtolower($q);
        $terms  = array_values(array_filter(preg_split('/\s+/', $needle) ?: [$needle]));
        $scored  = [];
        $fillers = [];
        foreach (self::all() as $row) {
            $name = mb_strtolower((string) $row['name']);
            $desc = mb_strtolower((string) $row['description']);
            $score = 0;
            if (str_contains($name, $needle)) {
                $score += 100;
                if (str_starts_with($name, $needle)) {
                    $score += 50;
                }
            }
            foreach ($terms as $t) {
                if ($t !== '' && str_contains($name, $t)) {
                    $score += 25;
                }
                if ($t !== '' && str_contains($desc, $t)) {
                    $score += 5;
                }
            }
            if ($score > 0) {
                $scored[] = [$score, $row];
            }
        }
        usort($scored, static fn ($a, $b) => $b[0] <=> $a[0] ?: strcasecmp($a[1]['name'], $b[1]['name']));
        return array_map(static fn ($s) => $s[1], array_slice($scored, 0, $limit));
    }

    /** Compact index for the client-side instant search. */
    public static function searchIndex(): array
    {
        $out = [];
        foreach (self::all() as $row) {
            $out[] = [
                'n' => $row['name'],
                'u' => $row['path'],
                'c' => $row['cat'],
                'd' => mb_substr((string) $row['description'], 0, 110),
            ];
        }
        return $out;
    }
}

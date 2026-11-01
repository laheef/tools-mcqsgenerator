<?php
/**
 * InternalLinks — contextual links between calculators, inside the article text.
 *
 * Search engines read a link best when it sits in a sentence that is about the
 * thing being linked, so each calculator page links to its neighbours from the
 * body copy — not only from a list at the bottom. Doing that by hand across
 * 3,831 pages is impossible; doing it with a naive search-and-replace wrecks the
 * copy. This class therefore:
 *
 *   1. builds an index of every calculator name (multi-word phrases included)
 *      once, and caches it next to the sitemap;
 *   2. walks the HTML and only touches *text* — never a tag, never the inside of
 *      an existing link, heading or code block;
 *   3. links the first occurrence of a phrase, at most once per target and at
 *      most MAX_PER_PAGE targets, never the page to itself;
 *   4. picks phrases longest-first, so "compound interest calculator" wins over
 *      "interest".
 *
 * The result is deterministic: the same page always gets the same links, which
 * keeps the HTML cacheable and the sitemap stable.
 */

declare(strict_types=1);

namespace Omni;

final class InternalLinks
{
    /** Hard ceiling on new links added to one page's article. */
    public const MAX_PER_PAGE = 8;

    /** Phrases shorter than this are too generic to link ("bmi" is fine). */
    private const MIN_PHRASE = 4;

    /** Three-letter acronyms are worth linking even below the floor. */
    private const ACRONYM_PHRASE = 3;

    /**
     * A one-word phrase only earns a link when the word is distinctive. Every
     * calculator called "Time", "Work" or "Stock" would otherwise turn ordinary
     * prose into a wall of unrelated links, which is worse for a reader and for
     * a search engine than no link at all.
     */
    private const MIN_SINGLE_WORD = 8;

    /**
     * A calculator is usually named in the gerund while prose uses the plain
     * verb: the page is "Adding Fractions" but the sentence says "how to add
     * fractions". Both forms name the same tool, so the index carries both.
     * The map is explicit rather than a rule, because "string" -> "str" is not
     * an English conjugation.
     */
    private const VERB_FORMS = [
        'adding' => 'add', 'subtracting' => 'subtract', 'multiplying' => 'multiply',
        'dividing' => 'divide', 'converting' => 'convert', 'calculating' => 'calculate',
        'computing' => 'compute', 'estimating' => 'estimate', 'finding' => 'find',
        'solving' => 'solve', 'determining' => 'determine', 'comparing' => 'compare',
        'measuring' => 'measure', 'rounding' => 'round', 'simplifying' => 'simplify',
        'factoring' => 'factor', 'graphing' => 'graph', 'plotting' => 'plot',
        'mixing' => 'mix', 'diluting' => 'dilute', 'compounding' => 'compound',
        'interpolating' => 'interpolate',
        'integrating' => 'integrate', 'differentiating' => 'differentiate',
        'grading' => 'grade', 'scaling' => 'scale', 'balancing' => 'balance',
        'averaging' => 'average', 'grouping' => 'group', 'sorting' => 'sort',
        'sampling' => 'sample', 'matching' => 'match', 'combining' => 'combine',
        'expanding' => 'expand', 'reducing' => 'reduce', 'tracking' => 'track',
        'planning' => 'plan', 'saving' => 'save', 'borrowing' => 'borrow',
        'refinancing' => 'refinance', 'amortizing' => 'amortize',
    ];

    /** Everyday nouns that name a calculator but never belong in a sentence link. */
    private const GENERIC_WORDS = [
        'average', 'balance', 'budget', 'calorie', 'capacity', 'circle', 'compare',
        'compound', 'convert', 'converter', 'density', 'discount', 'distance',
        'dividend', 'energy', 'estimate', 'fraction', 'gradient', 'growth', 'height',
        'income', 'interest', 'length', 'margin', 'measure', 'mileage', 'number',
        'payment', 'percent', 'period', 'pressure', 'profit', 'radius', 'return',
        'revenue', 'salary', 'savings', 'speed', 'square', 'stock', 'temperature',
        'time', 'triangle', 'velocity', 'volume', 'weight', 'width', 'work', 'year',
    ];

    /** Words that turn a page title into a useless link phrase. */
    private const BANNED_FIRST = ['how', 'what', 'why', 'the', 'and', 'for', 'with', 'from', 'your', 'free', 'online', 'calculator', 'calculators'];

    /** @var array<string,string>|null lowercase phrase => path */
    private static ?array $phrases = null;

    /** @var array<string,array<int,string>>|null first word => [phrases] */
    private static ?array $buckets = null;

    /** Page-wide state: one budget and one target list for the whole article. */
    private static int $pageRemaining = self::MAX_PER_PAGE;
    private static array $pageUsed = [];

    /** Start a page: reset the budget and the "already linked" target set. */
    public static function beginPage(int $max = self::MAX_PER_PAGE): void
    {
        self::$pageRemaining = $max;
        self::$pageUsed = [];
    }

    /** Targets already linked on this page (so a fallback sentence can avoid them). */
    public static function pageTargets(): array
    {
        return array_keys(self::$pageUsed);
    }

    /** How many links the page ended up with (used by the QA script). */
    public static function pageLinksAdded(): int
    {
        return self::MAX_PER_PAGE - self::$pageRemaining;
    }

    /**
     * Add contextual links to a chunk of article HTML.
     *
     * @param string $html     already-sanitised article HTML
     * @param string $selfPath the calculator being rendered (never linked to itself)
     * @param int    $budget   how many links this chunk may add
     * @return array{0:string,1:int} html and the number of links inserted
     */
    public static function linkify(string $html, string $selfPath, int $budget = self::MAX_PER_PAGE): array
    {
        $budget = min($budget, self::$pageRemaining);
        if ($budget <= 0 || $html === '' || !str_contains($html, '<p')) {
            return [$html, 0];
        }
        $buckets = self::buckets();
        if ($buckets === []) {
            return [$html, 0];
        }

        $used = &self::$pageUsed;   // targets already linked anywhere on this page
        $added = 0;
        $inAnchor = 0;     // depth counter for <a>
        $inSkip = 0;       // depth for headings / code we must not touch

        // Split into tags and text so replacements can never land inside markup.
        $parts = preg_split('~(<[^>]*>)~', $html, -1, PREG_SPLIT_DELIM_CAPTURE) ?: [$html];
        foreach ($parts as $i => $part) {
            if ($i % 2 === 1) {                       // a tag
                if (preg_match('~^<a\b~i', $part)) {
                    $inAnchor++;
                } elseif (preg_match('~^</a\b~i', $part)) {
                    $inAnchor = max(0, $inAnchor - 1);
                } elseif (preg_match('~^<(h[1-6]|code|pre|script|style|button|label)\b~i', $part)) {
                    $inSkip++;
                } elseif (preg_match('~^</(h[1-6]|code|pre|script|style|button|label)\b~i', $part)) {
                    $inSkip = max(0, $inSkip - 1);
                }
                continue;
            }
            if ($inAnchor > 0 || $inSkip > 0 || trim($part) === '') {
                continue;
            }
            if ($added >= $budget) {
                break;
            }
            $part = self::linkText($part, $selfPath, $buckets, $used, $budget - $added, $n);
            $added += $n;
            $parts[$i] = $part;
        }

        self::$pageRemaining -= $added;
        return [implode('', $parts), $added];
    }

    /**
     * Link phrases inside one text node.
     *
     * The text is tokenised once and each word is looked up in the first-word
     * bucket of the index, so the work is proportional to the number of words in
     * the paragraph and not to the size of the catalogue.
     */
    private static function linkText(string $text, string $selfPath, array $buckets, array &$used, int $budget, ?int &$added): string
    {
        $added = 0;
        $plain = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        if (strlen($plain) < self::MIN_PHRASE) {
            return $text;
        }

        // word offsets; the text is matched case-insensitively but inserted as-is
        preg_match_all("~[A-Za-z][A-Za-z0-9\x{2019}'-]*~u", $plain, $m, PREG_OFFSET_CAPTURE);
        $words = $m[0];
        if ($words === []) {
            return $text;
        }

        $hits = [];
        foreach ($words as $wi => [$word, $offset]) {
            $key = mb_strtolower($word);
            if (!isset($buckets[$key])) {
                continue;
            }
            foreach ($buckets[$key] as $phrase) {
                $path = self::pathOf($phrase);
                if ($path === null || $path === $selfPath || isset($used[$path])) {
                    continue;
                }
                $parts = explode(' ', $phrase);
                if (count($parts) > count($words) - $wi) {
                    continue;
                }
                // following words must line up exactly (allowing any spacing)
                $end = $offset + strlen($word);
                $ok = true;
                for ($k = 1, $n = count($parts); $k < $n; $k++) {
                    $next = $words[$wi + $k] ?? null;
                    if ($next === null || strcasecmp($next[0], $parts[$k]) !== 0) {
                        $ok = false;
                        break;
                    }
                    // the words must be separated by whitespace only
                    $gap = substr($plain, $end, $next[1] - $end);
                    if (trim($gap) !== '' || $gap === '') {
                        $ok = false;
                        break;
                    }
                    $end = $next[1] + strlen($next[0]);
                }
                if (!$ok) {
                    continue;
                }
                // A short phrase is almost always an acronym, and an acronym only
                // counts when the text actually writes it in capitals: "BMI" is
                // the body-mass index, "bed" is a piece of furniture.
                if (strlen($phrase) === self::ACRONYM_PHRASE && !str_contains($phrase, ' ')) {
                    $visible = substr($plain, $offset, $end - $offset);
                    if (strtoupper($visible) !== $visible) {
                        continue;
                    }
                }
                $hits[] = [$offset, $end - $offset, $phrase, $path];
            }
        }
        if ($hits === []) {
            return $text;
        }

        // A phrase that already contains the word "calculator" reads badly
        // inside a sentence ("see the Cubic equation Calculator"), so a plain
        // term at the same spot wins; otherwise longest match first, then
        // leftmost.
        $isPlain = static fn (string $phrase): int => preg_match('~\bcalculators?\b~i', $phrase) ? 1 : 0;
        usort($hits, static fn ($a, $b) => $isPlain($a[2]) <=> $isPlain($b[2])
            ?: $b[1] <=> $a[1]
            ?: $a[0] <=> $b[0]);

        $taken = [];
        $chosen = [];
        foreach ($hits as [$start, $len, $phrase, $path]) {
            if (count($chosen) >= $budget) {
                break;
            }
            $end = $start + $len;
            if (isset($used[$path])) {
                continue;                // the same target twice on one page reads as spam
            }
            foreach ($taken as [$s, $e]) {
                if ($start < $e && $end > $s) {
                    continue 2;          // overlaps a phrase already linked
                }
            }
            $taken[] = [$start, $end];
            $used[$path] = true;
            $chosen[] = [$start, $len, $path];
        }
        if ($chosen === []) {
            return $text;
        }
        usort($chosen, static fn ($a, $b) => $a[0] <=> $b[0]);

        // The text was entity-decoded for matching, so everything that goes back
        // into the document has to be re-escaped: emitting the decoded string
        // turned "0&lt;p&lt;1" back into "0<p<1", which the browser read as a tag.
        $out = '';
        $cursor = 0;
        foreach ($chosen as [$start, $len, $path]) {
            if ($start < $cursor) {
                continue;
            }
            $out .= htmlspecialchars(substr($plain, $cursor, $start - $cursor), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
            $visible = substr($plain, $start, $len);
            $out .= '<a class="inline-link" href="' . htmlspecialchars(View::url($path), ENT_QUOTES)
                  . '">' . htmlspecialchars($visible, ENT_QUOTES) . '</a>';
            $cursor = $start + $len;
            $added++;
        }
        $out .= htmlspecialchars(substr($plain, $cursor), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        return $out;
    }

    /* ------------------------------------------------------------------ index */

    /**
     * Build (once) and cache the phrase table.
     *
     * Two sources: each calculator's display name, and its slug with spaces
     * ("pounds-to-kg" also matches "pounds to kg"). A phrase claimed by more than
     * one calculator keeps the shortest path, so links stay stable.
     *
     * @return array<string,string> phrase => path
     */
    private static function phrases(): array
    {
        if (self::$phrases !== null) {
            return self::$phrases;
        }
        $cache = Data::path('cache/link-index-v2.json');
        $stampFile = Data::path('cache/link-index-v2.stamp');
        $manifest = Data::path('calc/manifest.json');
        /*
         * The harvested manifest is not the only thing this index depends on: a
         * calculator created in the panel adds a new name that prose should link
         * to. Comparing against the manifest alone meant such a page never
         * entered the index until `cron.php` wiped the cache. The CMS stamp
         * covers every table the panel can write, so a new, renamed, archived or
         * deleted calculator invalidates this index on the very next request.
         */
        $stamp = class_exists('Omni\\Cms') ? \Omni\Cms::stamp() : 'nocms';
        if (is_file($cache) && is_file($manifest) && filemtime($cache) >= filemtime($manifest)
            && is_file($stampFile) && trim((string) file_get_contents($stampFile)) === $stamp) {
            $raw = json_decode((string) file_get_contents($cache), true);
            if (is_array($raw) && $raw !== []) {
                return self::$phrases = $raw;
            }
        }

        $out = [];
        foreach (Data::all() as $row) {
            $path = (string) $row['path'];
            $name = mb_strtolower(trim((string) $row['name']));
            $candidates = [$name];

            // "Acres per hour Calculator" -> "acres per hour"
            $stripped = preg_replace('~\s+calculators?$~i', '', $name) ?? $name;
            $candidates[] = $stripped;

            // "Pounds to kg" also appears in prose as "pounds to kilograms"
            $slugPhrase = str_replace('-', ' ', mb_strtolower((string) ($row['slug'] ?? '')));
            if ($slugPhrase !== '' && $slugPhrase !== $stripped) {
                $candidates[] = $slugPhrase;
            }

            // English variants of the same name: the plain verb for a gerund,
            // and the other number of the head noun. "add fractions",
            // "fraction", "fractions" then all resolve to the same page.
            foreach ($candidates as $candidate) {
                foreach (self::variants($candidate) as $variant) {
                    $candidates[] = $variant;
                }
            }
            $candidates = array_values(array_unique($candidates));

            foreach ($candidates as $phrase) {
                $phrase = trim(preg_replace('~\s+~', ' ', $phrase) ?? '');
                $len = mb_strlen($phrase);
                // "bmi", "gpa", "apr" are useful; "age", "tax" are not: only a
                // phrase the calculator names in capitals counts as an acronym
                $isAcronym = $len === self::ACRONYM_PHRASE
                    && str_contains((string) ($row['name'] ?? ''), mb_strtoupper($phrase));
                if (preg_match('~[a-z]~', $phrase) !== 1) {
                    continue;              // "2050" is not a link phrase
                }
                if ($len < self::MIN_PHRASE && !$isAcronym) {
                    continue;
                }
                if (!str_contains($phrase, ' ') && !$isAcronym) {
                    if ($len < self::MIN_SINGLE_WORD || in_array($phrase, self::GENERIC_WORDS, true)) {
                        continue;          // too generic to be a meaningful link
                    }
                }
                $first = explode(' ', $phrase)[0];
                if (in_array($first, self::BANNED_FIRST, true)) {
                    continue;
                }
                if (!isset($out[$phrase]) || strlen($path) < strlen($out[$phrase])) {
                    $out[$phrase] = $path;
                }
            }
        }
        // longest phrases first so the scan prefers the most specific match
        uksort($out, static fn ($a, $b) => strlen((string) $b) <=> strlen((string) $a) ?: strcmp((string) $a, (string) $b));

        $dir = dirname($cache);
        if (!is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }
        @file_put_contents($cache, json_encode($out, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
        @file_put_contents($stampFile, $stamp);

        return self::$phrases = $out;
    }

    /**
     * Word-form variants of a candidate phrase.
     *
     * Only phrases of two or more words are varied: a single word is already
     * covered by the generic-word rules, and pluralising "density" to
     * "densities" would only add noise.
     *
     * @return array<int,string>
     */
    private static function variants(string $phrase): array
    {
        $words = preg_split('~\s+~', trim($phrase)) ?: [];
        if (count($words) < 2) {
            return [];
        }
        $out = [];

        // gerund -> plain verb on the first word
        $first = mb_strtolower($words[0]);
        if (isset(self::VERB_FORMS[$first])) {
            $copy = $words;
            $copy[0] = self::VERB_FORMS[$first];
            $out[] = implode(' ', $copy);
        }

        // head noun singular <-> plural
        $last = mb_strtolower($words[count($words) - 1]);
        if (mb_strlen($last) >= 4 && preg_match('~^[a-z]+$~', $last) === 1) {
            $other = null;
            if (str_ends_with($last, 'ies') && mb_strlen($last) > 5) {
                $other = mb_substr($last, 0, -3) . 'y';
            } elseif (str_ends_with($last, 'ses') || str_ends_with($last, 'xes') || str_ends_with($last, 'ches') || str_ends_with($last, 'shes')) {
                $other = mb_substr($last, 0, -2);
            } elseif (str_ends_with($last, 's') && !str_ends_with($last, 'ss')) {
                $other = mb_substr($last, 0, -1);
            } elseif (!str_ends_with($last, 'ss') && !str_ends_with($last, 'us')) {
                $other = str_ends_with($last, 'y') && !preg_match('~[aeiou]y$~', $last)
                    ? mb_substr($last, 0, -1) . 'ies'
                    : $last . 's';
            }
            if ($other !== null && $other !== $last && mb_strlen($other) >= 3) {
                $copy = $words;
                $copy[count($copy) - 1] = $other;
                $out[] = implode(' ', $copy);
            }
        }

        return array_values(array_unique($out));
    }

    /** @return array<string,array<int,string>> first word => phrases starting with it */
    private static function buckets(): array
    {
        if (self::$buckets !== null) {
            return self::$buckets;
        }
        $out = [];
        foreach (self::phrases() as $phrase => $path) {
            $phrase = (string) $phrase;
            $first = explode(' ', $phrase)[0];
            $out[$first][] = $phrase;
        }
        foreach ($out as $k => $list) {
            usort($list, static fn ($a, $b) => strlen($b) <=> strlen($a) ?: strcmp($a, $b));
        }
        return self::$buckets = $out;
    }

    private static function pathOf(string $phrase): ?string
    {
        return self::phrases()[$phrase] ?? null;
    }

    /** Exposed for the QA script: how many phrases can be matched. */
    public static function phraseCount(): int
    {
        return count(self::phrases());
    }
}

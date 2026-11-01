<?php
/**
 * The catalogue browser behind `/calculators`.
 *
 * One page that can answer three questions the category indexes cannot:
 * "where is the calculator called X", "show me everything in Health", and
 * "show me everything that starts with P" — with search, category and letter
 * filters that combine, and pagination so 4,041 rows are not one page.
 *
 * Everything is done on the server from a GET query string, because that is the
 * one implementation that also works with JavaScript switched off, is linkable,
 * and can be crawled. `assets/js/browse.js` adds instant filtering on top; it
 * never becomes the only way to browse.
 *
 * Query parameters (all optional, all validated):
 *   q      free text, matched against the calculator name and description
 *   cat    category slug, or '' for every category
 *   letter A–Z, "#" for anything not starting with a letter, or '' for all
 *   sort   az | za | relevant   (relevant is the default when q is present)
 *   page   1-based page number
 *
 * @var array{rows:array,total:int,page:int,pages:int,per:int,q:string,cat:string,letter:string,sort:string,filters:array}
 */

declare(strict_types=1);

namespace Omni;

final class Browse
{
    public const PER_PAGE = 100;

    /** Read + validate the query string into a filter set. */
    public static function params(array $in = []): array
    {
        $in = $in === [] ? $_GET : $in;

        $q      = trim((string) ($in['q'] ?? ''));
        $q      = mb_substr($q, 0, 80);
        $cat    = strtolower(trim((string) ($in['cat'] ?? '')));
        $cat    = preg_replace('~[^a-z0-9-]~', '', $cat) ?? '';
        if ($cat !== '' && Data::category($cat) === null) {
            $cat = '';
        }
        $letter = strtoupper(trim((string) ($in['letter'] ?? '')));
        if ($letter === '#' || $letter === '0-9' || $letter === 'NUM') {
            $letter = '#';
        } elseif (!preg_match('~^[A-Z]$~', $letter)) {
            $letter = '';
        } elseif ($letter === '') {
            $letter = '';
        }
        $sort = (string) ($in['sort'] ?? '');
        if (!in_array($sort, ['az', 'za', 'relevant'], true)) {
            $sort = $q !== '' ? 'relevant' : 'az';
        }
        $page = max(1, (int) ($in['page'] ?? 1));

        return compact('q', 'cat', 'letter', 'sort', 'page') + ['per' => self::PER_PAGE];
    }

    /** Apply the filter set to the catalogue and slice one page out of it. */
    public static function query(array $params): array
    {
        $rows = Data::all();

        if ($params['cat'] !== '') {
            $rows = array_values(array_filter(
                $rows,
                static fn (array $r): bool => $r['cat'] === $params['cat']
            ));
        }

        if ($params['letter'] !== '') {
            $rows = array_values(array_filter($rows, static function (array $r) use ($params): bool {
                $first = mb_substr((string) $r['name'], 0, 1);
                $isAlpha = preg_match('~[A-Za-z]~', $first) === 1;
                if ($params['letter'] === '#') {
                    return !$isAlpha;
                }
                return $isAlpha && mb_strtoupper($first) === $params['letter'];
            }));
        }

        $scored = [];
        if ($params['q'] !== '') {
            $scored = self::score($rows, $params['q']);
            $rows = array_map(static fn (array $s): array => $s[1], $scored);
        }

        if ($params['sort'] === 'az') {
            usort($rows, static fn (array $a, array $b): int => strcasecmp((string) $a['name'], (string) $b['name'])
                ?: strcmp((string) $a['path'], (string) $b['path']));
        } elseif ($params['sort'] === 'za') {
            usort($rows, static fn (array $a, array $b): int => strcasecmp((string) $b['name'], (string) $a['name'])
                ?: strcmp((string) $a['path'], (string) $b['path']));
        }
        // 'relevant' keeps the score order that score() already applied

        $total = count($rows);
        $per   = max(1, (int) $params['per']);
        $pages = max(1, (int) ceil($total / $per));
        $page  = min(max(1, (int) $params['page']), $pages);
        $slice = array_slice($rows, ($page - 1) * $per, $per);

        return [
            'rows'   => $slice,
            'total'  => $total,
            'page'   => $page,
            'pages'  => $pages,
            'per'    => $per,
            'catalogue' => count(Data::all()),
            'q'      => $params['q'],
            'cat'    => $params['cat'],
            'letter' => $params['letter'],
            'sort'   => $params['sort'],
        ];
    }

    /**
     * Score rows against a search phrase.
     *
     * Same weighting as Data::search() so the two never disagree about what
     * counts as a match — the difference is that this one keeps every match
     * (the caller paginates) instead of stopping at 30.
     *
     * @param array<int,array> $rows
     * @return array<int,array{0:int,1:array}>
     */
    private static function score(array $rows, string $q): array
    {
        $needle = mb_strtolower($q);
        $terms  = array_values(array_filter(preg_split('~\s+~', $needle) ?: [$needle], static fn ($t) => $t !== ''));
        $scored = [];
        foreach ($rows as $row) {
            $name = mb_strtolower((string) $row['name']);
            $desc = mb_strtolower((string) $row['description']);
            $score = 0;
            if (str_contains($name, $needle)) {
                $score += 100;
                if (str_starts_with($name, $needle)) {
                    $score += 50;
                }
            }
            foreach ($terms as $term) {
                if (str_contains($name, $term)) {
                    $score += 25;
                }
                if (str_contains($desc, $term)) {
                    $score += 5;
                }
            }
            if ($score > 0) {
                $scored[] = [$score, $row];
            }
        }
        usort($scored, static fn (array $a, array $b): int =>
            $b[0] <=> $a[0] ?: strcasecmp((string) $a[1]['name'], (string) $b[1]['name']));
        return $scored;
    }

    /** How many calculators start with each letter, for the jump bar. */
    public static function letterCounts(string $cat = ''): array
    {
        $counts = [];
        foreach (Data::all() as $row) {
            if ($cat !== '' && $row['cat'] !== $cat) {
                continue;
            }
            $first = mb_substr((string) $row['name'], 0, 1);
            $key = preg_match('~[A-Za-z]~', $first) === 1 ? mb_strtoupper($first) : '#';
            $counts[$key] = ($counts[$key] ?? 0) + 1;
        }
        uksort($counts, static function (string $a, string $b): int {
            if ($a === '#') { return -1; }
            if ($b === '#') { return 1; }
            return strcmp($a, $b);
        });
        return $counts;
    }

    /**
     * Build a URL for the browser with some filters changed.
     *
     * Every link on the page goes through here, so a filter combination is a real,
     * shareable URL rather than a piece of JavaScript state.
     */
    public static function url(array $params, array $changes = []): string
    {
        $merged = array_merge($params, $changes);
        $qs = [];
        foreach (['q' => 'q', 'cat' => 'cat', 'letter' => 'letter', 'sort' => 'sort'] as $key) {
            $value = trim((string) ($merged[$key] ?? ''));
            if ($value !== '') {
                $qs[$key] = $value;
            }
        }
        // keep the URL clean: no sort/letter/cat when they are the defaults
        if (($qs['sort'] ?? '') === 'az' || ($qs['sort'] ?? '') === 'relevant') {
            unset($qs['sort']);
        }
        $page = (int) ($merged['page'] ?? 1);
        if ($page > 1) {
            $qs['page'] = (string) $page;
        }
        $query = http_build_query($qs);
        return View::url('/calculators') . ($query !== '' ? '?' . $query : '');
    }

    /** Human description of what is being filtered, for the page's status line. */
    public static function describe(array $state): string
    {
        $bits = [];
        if ($state['q'] !== '') {
            $bits[] = 'matching “' . $state['q'] . '”';
        }
        if ($state['cat'] !== '') {
            $cat = Data::category($state['cat']);
            $bits[] = 'in ' . ($cat['name'] ?? $state['cat']);
        }
        if ($state['letter'] !== '') {
            $bits[] = $state['letter'] === '#' ? 'starting with a digit or symbol' : 'starting with ' . $state['letter'];
        }
        return implode(' ', $bits);
    }
}

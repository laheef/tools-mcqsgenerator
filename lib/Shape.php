<?php
/**
 * Shape — adapts one harvested definition to the shape the engine expects.
 *
 * The harvester (tools/harvest_all.py) stores a compact form of the reference
 * page's widget definition:
 *
 *   groups : [{uid,title,desc,m:[[grid, [[field,…],…]], …]}]
 *   vars   : {name:{type, rnd:[algorithm,precision], dfl:[{v,c}], ds}}
 *   eq     : [{formula, var:[{l,f,r}, …]}]
 *   datasets, js, needsJs, authors, reviewers, updated, rate
 *
 * The engine (Solver, Widget, the templates and assets/js/calc.js) speaks the
 * reference site's own vocabulary instead — `matrices`, `columns`, `variants`,
 * `chunks` and so on. This class is the single translation point, so a change
 * in the harvest format never leaks past here.
 */

declare(strict_types=1);

namespace Onim;

final class Shape
{
    /**
     * @param array      $rec     one decoded NDJSON line
     * @param array|null $content generated prose (summary, sections, faq)
     * @param array      $catNames slug => display name
     */
    public static function fromRecord(array $rec, ?array $content, array $catNames = []): array
    {
        $cat  = (string) ($rec['cat'] ?? 'other');
        $slug = (string) ($rec['slug'] ?? basename((string) ($rec['path'] ?? '')));
        $path = (string) ($rec['path'] ?? '/' . $cat . '/' . $slug);
        $name = (string) ($rec['name'] ?? ucfirst(str_replace('-', ' ', $slug)));

        $faq     = $content['faq'] ?? [];
        $article = [];
        $toc     = [];

        if ($content !== null) {
            if (!empty($content['summary'])) {
                /* The summary is written as an answer-first pair of paragraphs:
                   the first answers the title in two sentences, the rest is
                   support. They are split here so the lead is a real <p> of its
                   own — an answer engine that gets one giant paragraph has to
                   guess where the answer stops. */
                foreach (preg_split('/\n\s*\n/', trim((string) $content['summary'])) ?: [] as $para) {
                    $para = trim($para);
                    if ($para !== '') {
                        $article[] = ['type' => 'lead', 'title' => '', 'html' => '<p>' . $para . '</p>'];
                    }
                }
            }
            foreach ($content['sections'] ?? [] as $section) {
                $title = (string) ($section['title'] ?? '');
                $body  = (string) ($section['html'] ?? '');
                if (trim($body) === '') {
                    continue;
                }
                /*
                 * A section with no heading is the article's opening prose: the
                 * one-box editor turns everything before the first <h2> into it.
                 * It is printed as a lead and gets no table-of-contents entry,
                 * because there is no heading to point at.
                 */
                if ($title === '') {
                    $article[] = ['type' => 'lead', 'title' => '', 'html' => $body];
                    continue;
                }
                $article[] = ['type' => 'regular', 'title' => $title, 'html' => $body];
                $toc[] = ['slug' => self::slugify($title), 'text' => $title];
            }
            if ($faq !== []) {
                $toc[] = ['slug' => 'faq', 'text' => 'FAQ'];
            }
        }

        return [
            'id'          => $path,
            'slug'        => $slug,
            'path'        => $path,
            'cat'         => $cat,
            'file'        => $path,
            'category'    => ['slug' => $cat, 'name' => $catNames[$cat] ?? ucfirst(str_replace('-', ' ', $cat))],
            'name'        => $name,
            'title'       => (string) ($content['h1'] ?? $rec['title'] ?? ($name . ' Calculator')),
            'seoTitle'    => (string) ($content['seoTitle'] ?? $rec['title'] ?? ($name . ' Calculator')),
            'description' => (string) ($content['seoDesc'] ?? $rec['desc'] ?? ''),
            'sourceDesc'  => (string) ($rec['desc'] ?? ''),
            'createdAt'   => '',
            'updatedAt'   => (string) ($rec['updated'] ?? ''),
            'authors'     => self::people($rec['authors'] ?? []),
            'reviewers'   => self::people($rec['reviewers'] ?? []),
            'rating'      => (int) ($rec['rate'] ?? 0),
            'needsJs'     => (bool) ($rec['needsJs'] ?? false),
            'js'          => isset($rec['js']) && $rec['js'] !== '' ? (string) $rec['js'] : null,
            'faq'         => $faq,
            'related'     => is_array($content['related'] ?? null) ? $content['related'] : [],
            'article'     => $article,
            'toc'         => $toc,
            'groups'      => self::groups($rec['groups'] ?? []),
            'variables'   => self::variables($rec),
            'datasets'    => self::datasets($rec['datasets'] ?? []),
            'equations'   => self::equations($rec['eq'] ?? []),
            /* Which boxes a page shows depends on another field ("how many
               groups?"): a map of variable → condition, honoured by the client. */
            'showIf'      => is_array($rec['showIf'] ?? null) ? $rec['showIf'] : [],
            /*
             * Not every widget is a formula. A tool-backed page carries the
             * shortcode that renders it instead of a field set; the template
             * branches on `kind`, and everything else on the page (article,
             * FAQ, related, ads) is untouched either way.
             */
            'kind'        => (string) ($rec['kind'] ?? 'formula'),
            'tool'        => is_array($rec['tool'] ?? null) ? $rec['tool'] : null,
        ];
    }

    /* ----------------------------------------------------------------- fields */

    private static function groups(array $groups): array
    {
        $out = [];
        foreach ($groups as $g) {
            // The reference keeps plumbing variables (day/month/year parts, the
            // "now" timestamps) in groups titled "Hidden variables …". They are
            // not meant to be seen, and showing them turns a date picker into a
            // wall of epoch numbers.
            if (preg_match('/^\s*hidden\b/i', (string) ($g['title'] ?? ''))) {
                continue;
            }
            $matrices = [];
            foreach ($g['m'] ?? [] as $matrix) {
                $grid    = (string) ($matrix[0] ?? 'FR1');
                $columns = [];
                foreach ($matrix[1] ?? [] as $column) {
                    $fields = [];
                    foreach ($column ?? [] as $field) {
                        $shaped = self::field($field);
                        if ($shaped !== null) {
                            $fields[] = $shaped;
                        }
                    }
                    if ($fields !== []) {
                        $columns[] = $fields;
                    }
                }
                if ($columns !== []) {
                    $matrices[] = [
                        'uid'     => (string) ($g['uid'] ?? ''),
                        'grid'    => $grid,
                        'columns' => $columns,
                    ];
                }
            }
            if ($matrices === [] && empty($g['title'])) {
                continue;
            }
            $out[] = [
                'uid'         => (string) ($g['uid'] ?? ''),
                'title'       => (string) ($g['title'] ?? ''),
                'description' => (string) ($g['desc'] ?? ''),
                'collapsable' => 'defaultExpanded',
                'hidden'      => false,
                'condition'   => null,
                'matrices'    => $matrices,
            ];
        }
        return $out;
    }

    /** Map of the subscript characters the reference uses in chemical names. */
    private const SUBSCRIPTS = [
        '0' => '₀', '1' => '₁', '2' => '₂', '3' => '₃', '4' => '₄',
        '5' => '₅', '6' => '₆', '7' => '₇', '8' => '₈', '9' => '₉',
        '+' => '₊', '-' => '₋', '=' => '₌', '(' => '₍', ')' => '₎',
        'a' => 'ₐ', 'e' => 'ₑ', 'o' => 'ₒ', 'x' => 'ₓ', 'h' => 'ₕ',
        'k' => 'ₖ', 'l' => 'ₗ', 'm' => 'ₘ', 'n' => 'ₙ', 'p' => 'ₚ',
        's' => 'ₛ', 't' => 'ₜ',
    ];

    /**
     * The definitions mark subscripts as `==2==` ("pCO==2==" for pCO₂). The
     * browser never saw the raw markers, so they are folded into real Unicode
     * subscripts rather than being shown to the reader.
     */
    public static function label(string $raw): string
    {
        if (!str_contains($raw, '==')) {
            return $raw;
        }
        return (string) preg_replace_callback('/==(.+?)==/', static function (array $m): string {
            $sub = '';
            foreach (preg_split('//u', $m[1], -1, PREG_SPLIT_NO_EMPTY) ?: [] as $ch) {
                $sub .= self::SUBSCRIPTS[$ch] ?? $ch;
            }
            return $sub;
        }, $raw);
    }

    private static function field(array $f): ?array
    {
        $type = (string) ($f['t'] ?? '');
        if ($type === 'v') {
            $out = [
                'type'         => 'variable',
                'var'          => (string) ($f['n'] ?? ''),
                'label'        => self::label((string) ($f['l'] ?? '')),
                'prefix'       => (string) ($f['pre'] ?? ''),
                'suffix'       => (string) ($f['suf'] ?? ''),
                'help'         => (string) ($f['h'] ?? ''),
                'unitSwitcher' => $f['us'] ?? null,
                'unitDefault'  => $f['du'] ?? null,
                'outputOnly'   => !empty($f['oo']),
                'datasetUid'   => $f['ds'] ?? null,
                'options'      => self::options($f['opts'] ?? []),
            ];
            return $out['var'] === '' ? null : $out;
        }

        if ($type === 'x') {
            $variants = [];
            foreach ($f['c'] ?? [] as $chunk) {
                if (!is_array($chunk) || count($chunk) < 2) {
                    continue;
                }
                $variants[] = [
                    'condition' => $chunk[0] ?? null,
                    'html'      => (string) ($chunk[1] ?? ''),
                ];
            }
            if ($variants === []) {
                return null;
            }
            // Each entry is one *fragment* of the line ("= 34 years", "and 2
            // months"), shown only when its own condition holds. They have to
            // stay separate chunks: folding them into one variant list would
            // show a single fragment and drop the rest of the sentence.
            $chunks = [];
            foreach ($variants as $v) {
                $chunks[] = ['variants' => [$v]];
            }
            return [
                'type'       => 'text',
                'chunks'     => $chunks,
                'formatType' => '',
            ];
        }

        if ($type === 'i') {
            $urls = array_map(static fn ($u) => ['value' => (string) $u], $f['u'] ?? []);
            if ($urls === []) {
                return null;
            }
            return ['type' => 'image', 'urls' => $urls, 'alt' => '', 'caption' => ''];
        }

        return null;
    }

    /** Turn [[uid,label,value], …] into the engine's option records. */
    private static function options(array $opts): array
    {
        $out = [];
        foreach ($opts as $o) {
            if (!is_array($o) || count($o) < 2) {
                continue;
            }
            $out[] = [
                'uid'   => (string) $o[0],
                'label' => (string) $o[1],
                'value' => (string) ($o[2] ?? ''),
            ];
        }
        return $out;
    }

    /* -------------------------------------------------------------- variables */

    private static function variables(array $rec): array
    {
        $fields = [];
        foreach ($rec['groups'] ?? [] as $g) {
            foreach ($g['m'] ?? [] as $matrix) {
                foreach ($matrix[1] ?? [] as $column) {
                    foreach ($column ?? [] as $f) {
                        if (($f['t'] ?? '') !== 'v' || empty($f['n'])) {
                            continue;
                        }
                        if (!isset($fields[$f['n']])) {
                            $fields[$f['n']] = $f;
                        }
                    }
                }
            }
        }

        $out = [];
        foreach ($rec['vars'] ?? [] as $name => $def) {
            $rnd = $def['rnd'] ?? null;
            $var = [
                'name'      => (string) $name,
                'type'      => (string) ($def['type'] ?? 'numerical'),
                'lock'      => 'UNSET',
                'unit'      => 'omni',
                'rounding'  => is_array($rnd)
                    ? ['algorithm' => (string) ($rnd[0] ?? 'omni'), 'precision' => (string) ($rnd[1] ?? '')]
                    : ['algorithm' => 'omni', 'precision' => ''],
                'minDigits' => null,
                'defaults'  => [],
            ];

            // prefilled values: the shard keeps them as {v, c} (value, condition)
            foreach ($def['dfl'] ?? [] as $d) {
                $var['defaults'][] = [
                    'value'     => $d['v'] ?? null,
                    'now'       => null,
                    'condition' => $d['c'] ?? null,
                ];
            }

            $meta = $fields[$name] ?? null;
            if ($meta !== null) {
                /* The name a box is given is the name its answer deserves. A
                   date output that is never rendered as a box (dog-heat-cycle's
                   "day 18 of the cycle") used to reach the results panel as the
                   variable's own name, "Cycle1". */
                if (!empty($meta['label'])) {
                    $var['label'] = (string) $meta['label'];
                }
                if (!empty($meta['us'])) {
                    $var['unitKey'] = (string) $meta['us'];
                }
                // the unit this particular field opens in (converters share one
                // switcher but start in different units)
                if (!empty($meta['du'])) {
                    $var['defaultUnit'] = (string) $meta['du'];
                }
                if (!empty($meta['ds'])) {
                    $var['datasetUid'] = (string) $meta['ds'];
                }
            }
            if (!empty($def['ds'])) {
                $var['datasetUid'] = (string) $def['ds'];
            }
            $out[$name] = $var;
        }
        return $out;
    }

    /* --------------------------------------------------------------- datasets */

    private static function datasets(array $raw): array
    {
        $out = [];
        foreach ($raw as $uid => $ds) {
            $options = [];
            foreach ($ds['options'] ?? [] as $o) {
                $options[] = [
                    'uid'   => (string) ($o['uid'] ?? ''),
                    'label' => (string) ($o['label'] ?? ''),
                    'value' => (string) ($o['value'] ?? ''),
                ];
            }
            $out[(string) $uid] = [
                'name'    => (string) ($ds['name'] ?? ''),
                'uiType'  => (string) ($ds['uiType'] ?? 'RADIO'),
                'options' => $options,
            ];
        }
        return $out;
    }

    /* -------------------------------------------------------------- equations */

    private static function equations(array $eq): array
    {
        $out = [];
        foreach ($eq as $entry) {
            $variants = [];
            foreach ($entry['var'] ?? [] as $v) {
                $variants[] = [
                    'lhs'     => (string) ($v['l'] ?? ''),
                    'formula' => (string) ($v['f'] ?? ''),
                    'rhs'     => array_values(array_map('strval', $v['r'] ?? [])),
                ];
            }
            if ($variants === []) {
                continue;
            }
            $out[] = [
                'formula'  => (string) ($entry['formula'] ?? ''),
                'variants' => $variants,
            ];
        }
        return $out;
    }

    /* ----------------------------------------------------------------- people */

    /** @return array<int,array{name:string}> */
    public static function people($raw): array
    {
        if (!is_array($raw)) {
            return [];
        }
        $out = [];
        foreach ($raw as $p) {
            if (is_string($p)) {
                $p = ['name' => $p];
            }
            $name = '';
            if (is_array($p)) {
                $name = (string) ($p['name'] ?? $p['fullName'] ?? '');
                if ($name === '' && isset($p['first'])) {
                    $name = trim((string) $p['first'] . ' ' . (string) ($p['last'] ?? ''));
                }
            }
            if ($name !== '') {
                $out[] = ['name' => $name];
            }
        }
        return $out;
    }

    public static function slugify(string $text): string
    {
        $text = strtolower(trim(strip_tags($text)));
        $text = str_replace(['’', "'"], '', $text);
        $text = preg_replace('/[^a-z0-9]+/', '-', $text) ?? '';
        return trim($text, '-');
    }
}

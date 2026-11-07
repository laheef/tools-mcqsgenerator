<?php

declare(strict_types=1);

namespace Onim;

/**
 * CalcFile — one calculator, one PHP file.
 *
 * A formula calculator used to be a line in `data/calc/batch-NNNN.ndjson`: its
 * variables, its form rows and its equations lived in one compact record that
 * only the form builder understood, and a repair had to be bolted on from
 * `data/calc/supplement/`. That works for a thousand pages nobody touches, but
 * it is the wrong shape for a page somebody maintains: to change a label you
 * open a 40 000-line shard.
 *
 * A calculator file is the whole page in one place:
 *
 *   plugins/calc/<category>/qm-calc-<slug>.php
 *
 * returning an array with the calculator's name, its SEO metadata, its form,
 * its formulas and its article. When the file exists it wins over the shard —
 * the page is built from it and nothing else. When it does not, the harvested
 * record is used exactly as before, so converting a category is a matter of
 * writing its files, one at a time.
 *
 * The format
 * ----------
 *
 *   return [
 *       'name'  => 'Punnett Square Calculator',
 *       'meta'  => [
 *           'title'       => '…',          // <title>, before " | Onim"
 *           'description' => '…',          // meta description
 *           'h1'          => '…',          // defaults to 'name'
 *           'updated'     => '2026-11-07',
 *       ],
 *       'sections' => [                    // the form, top to bottom
 *           [
 *               'title'  => 'Parents',     // optional heading
 *               'note'   => '…',           // optional paragraph above the fields
 *               'fields' => [
 *                   ['name' => 'mother1', 'label' => "Mother's genotype",
 *                    'type' => 'select', 'options' => ['AA' => 1, 'Aa' => 2],
 *                    'default' => 'Aa', 'width' => 'half'],
 *                   ['name' => 'absorbance', 'label' => 'Absorbance',
 *                    'type' => 'number', 'unit' => 'omni'],
 *                   ['name' => 'transmittance', 'label' => 'Transmittance',
 *                    'type' => 'result', 'suffix' => ''],
 *               ],
 *           ],
 *       ],
 *       'formula' => [
 *           'AA' => 'get_chance_a(mother1, father1)',
 *       ],
 *       'article' => [
 *           'intro'    => 'Answer-first paragraph.',
 *           'sections' => [['title' => 'How it works', 'html' => '<p>…</p>']],
 *           'faq'      => [['q' => '…', 'a' => '…']],
 *           'related'  => ['/biology/genetics'],
 *       ],
 *   ];
 *
 * Field types: number, result, select, note, image, text, date. A field's
 * `width` is full, half or third (two halves share a row). `formula` is either
 * a plain map of result => expression, or a list of
 * `['title' => '…', 'results' => ['result' => 'expression']]` when the page
 * computes in more than one pass.
 *
 * Anything the shorthand above cannot express — a page script, a formula image,
 * a date picker with epoch arithmetic — can be carried verbatim in a `'raw'`
 * block holding the engine's own `vars`, `groups`, `eq` and `datasets` arrays.
 * The compiled output is the same record the shard would have produced, which
 * is why nothing downstream has to know which of the two a page uses.
 *
 * Everything is validated before it is trusted: a file that returns something
 * that is not an array, names no calculator, has a formula for a variable that
 * is not on the form, or points a formula at a name that does not exist is
 * refused with the reason, so a broken upload cannot take a page down.
 */
final class CalcFile
{
    /** Where the files live, relative to the project root. */
    public const DIR = 'plugins/calc';

    /** @var array<string,array|null> */
    private static array $cache = [];

    /** @var array<string,array>|null */
    private static ?array $manifest = null;

    public static function root(): string
    {
        return dirname(__DIR__);
    }

    public static function dir(): string
    {
        return self::root() . '/' . self::DIR;
    }

    /** plugins/calc/biology/qm-calc-punnett-square.php */
    public static function path(string $cat, string $slug): string
    {
        $cat  = self::clean($cat);
        $slug = self::clean($slug);
        return self::DIR . '/' . $cat . '/qm-calc-' . $slug . '.php';
    }

    public static function absolute(string $file): string
    {
        return self::root() . '/' . ltrim($file, '/');
    }

    public static function clean(string $s): string
    {
        $s = strtolower(trim($s));
        return (string) preg_replace('~[^a-z0-9-]+~', '-', $s);
    }

    /** Does this calculator have its own file? */
    public static function has(string $cat, string $slug): bool
    {
        return is_file(self::absolute(self::path($cat, $slug)));
    }

    /** '/biology/punnett-square' or 'biology--punnett-square' -> [cat, slug] */
    public static function split(string $path): array
    {
        $path = trim($path, '/');
        if (str_contains($path, '--')) {
            [$cat, $slug] = explode('--', $path, 2);
            return [self::clean($cat), self::clean($slug)];
        }
        $parts = explode('/', $path);
        $slug  = (string) array_pop($parts);
        $cat   = (string) array_pop($parts);
        return [self::clean($cat), self::clean($slug)];
    }

    /**
     * Include and check one file.
     *
     * @return array{ok:bool,def:array|null,error:string}
     */
    public static function read(string $file): array
    {
        $abs = self::absolute($file);
        if (!is_file($abs)) {
            return ['ok' => false, 'def' => null, 'error' => 'no such calculator file: ' . $file];
        }
        try {
            /** @psalm-suppress UnresolvableInclude */
            $def = include $abs;
        } catch (\Throwable $e) {
            return ['ok' => false, 'def' => null, 'error' => 'the file threw: ' . $e->getMessage()];
        }
        if (!is_array($def)) {
            return ['ok' => false, 'def' => null, 'error' => 'the file must return an array'];
        }
        return self::validate($def, $file);
    }

    /**
     * Check a definition, with the file's own name as the only thing that the
     * definition itself cannot disagree with.
     *
     * @return array{ok:bool,def:array|null,error:string}
     */
    public static function validate(array $def, string $file = ''): array
    {
        $fail = static fn (string $why): array => ['ok' => false, 'def' => null, 'error' => $why];

        $name = trim((string) ($def['name'] ?? ''));
        if ($name === '') {
            return $fail('the definition has no name');
        }

        /* A raw block is the engine's own record: nothing to check beyond the
           four arrays it is made of. */
        if (isset($def['raw'])) {
            if (!is_array($def['raw'])) {
                return $fail('raw must be an array');
            }
            foreach (['vars', 'groups'] as $key) {
                if (!isset($def['raw'][$key]) || !is_array($def['raw'][$key])) {
                    return $fail('raw.' . $key . ' is missing');
                }
            }
            return ['ok' => true, 'def' => $def, 'error' => ''];
        }

        $fields  = self::fields($def);
        $formula = self::formulaMap($def);
        if ($fields === []) {
            return $fail('the form has no fields');
        }
        if ($formula === []) {
            return $fail('there is no formula');
        }

        $inputs = [];
        foreach ($fields as $f) {
            $type = strtolower((string) ($f['type'] ?? 'number'));
            if ($type === 'note' || $type === 'image') {
                continue;                      // decoration, not a variable
            }
            $n = trim((string) ($f['name'] ?? ''));
            if ($n === '') {
                return $fail('a field has no name');
            }
            $inputs[$n] = $type;
        }
        foreach ($formula as $lhs => $expr) {
            if (!isset($inputs[$lhs]) && !isset($def['raw'])) {
                return $fail('formula for "' . $lhs . '", which is not a field on the form');
            }
            foreach (Expr::dependencies((string) $expr) as $dep) {
                if (!isset($inputs[$dep]) && !Expr::knows($dep)) {
                    return $fail('"' . $lhs . '" reads "' . $dep . '", which is not a field on the form');
                }
            }
        }
        $article = $def['article'] ?? [];
        if (!is_array($article)) {
            return $fail('article must be an array');
        }
        return ['ok' => true, 'def' => $def, 'error' => ''];
    }

    /** @return array<int,array> every field, flattened, in form order */
    public static function fields(array $def): array
    {
        $out = [];
        foreach (self::sections($def) as $section) {
            foreach ($section['blocks'] as $block) {
                foreach ($block['fields'] as $f) {
                    $out[] = $f;
                }
            }
        }
        return $out;
    }

    /**
     * A form's sections, normalised.
     *
     * A section is a group on the page: an optional heading, an optional note,
     * and one or more blocks. A block is a matrix — `columns => 2` lays its
     * fields out in two columns (the first getting the odd one, as the
     * harvested pages do); with no `columns`, every field takes a full-width row
     * of its own.
     *
     * Two shorthands are accepted for a simple page: a flat list of fields, and
     * a section with `fields` instead of `blocks`.
     *
     * @return array<int,array{title:string,note:string,blocks:array}>
     */
    public static function sections(array $def): array
    {
        $sections = $def['sections'] ?? [];
        if (!is_array($sections) || $sections === []) {
            return [];
        }
        if (!isset($sections[0]['fields']) && !isset($sections[0]['blocks'])) {
            $sections = [['fields' => $sections]];       // the flat list
        }
        $out = [];
        foreach ($sections as $s) {
            if (!is_array($s)) {
                continue;
            }
            $blocks = [];
            if (isset($s['blocks']) && is_array($s['blocks'])) {
                foreach ($s['blocks'] as $b) {
                    if (!is_array($b)) {
                        continue;
                    }
                    $fields = self::onlyFields((array) ($b['fields'] ?? []));
                    if ($fields !== []) {
                        $blocks[] = ['columns' => max(1, (int) ($b['columns'] ?? 1)), 'fields' => $fields];
                    }
                }
            }
            $fields = self::onlyFields((array) ($s['fields'] ?? []));
            if ($fields !== []) {
                $blocks[] = ['columns' => max(1, (int) ($s['columns'] ?? 1)), 'fields' => $fields];
            }
            $title = (string) ($s['title'] ?? '');
            $note  = (string) ($s['note'] ?? '');
            if ($blocks === [] && $title === '' && $note === '') {
                continue;
            }
            $out[] = ['title' => $title, 'note' => $note, 'blocks' => $blocks];
        }
        return $out;
    }

    /** @return array<int,array> */
    private static function onlyFields(array $fields): array
    {
        return array_values(array_filter($fields, 'is_array'));
    }

    /**
     * The formulas as one flat map of result => expression, in page order.
     *
     * @return array<string,string>
     */
    public static function formulaMap(array $def): array
    {
        $raw = $def['formula'] ?? [];
        if (!is_array($raw)) {
            return [];
        }
        $out = [];
        if (isset($raw['results'])) {          // a single pass written long-hand
            $raw = [$raw];
        }
        foreach ($raw as $key => $value) {
            if (is_string($value)) {           // the plain map
                $out[(string) $key] = $value;
                continue;
            }
            if (!is_array($value)) {
                continue;
            }
            foreach ((array) ($value['results'] ?? []) as $lhs => $expr) {
                if (is_string($expr)) {
                    $out[(string) $lhs] = $expr;
                }
            }
        }
        return $out;
    }

    /** Formula passes, keeping their titles. @return array<int,array{title:string,results:array<string,string>}> */
    public static function formulaPasses(array $def): array
    {
        $raw = $def['formula'] ?? [];
        if (!is_array($raw)) {
            return [];
        }
        if (isset($raw['results'])) {
            $raw = [$raw];
        }
        $out = [];
        foreach ($raw as $key => $value) {
            if (is_string($value)) {
                if (!isset($out[0])) {
                    $out[0] = ['title' => '', 'results' => []];
                }
                $out[0]['results'][(string) $key] = $value;
                continue;
            }
            if (!is_array($value)) {
                continue;
            }
            $results = [];
            foreach ((array) ($value['results'] ?? []) as $lhs => $expr) {
                if (is_string($expr)) {
                    $results[(string) $lhs] = $expr;
                }
            }
            if ($results !== []) {
                $out[] = ['title' => (string) ($value['title'] ?? ''), 'results' => $results];
            }
        }
        return $out;
    }

    /* ------------------------------------------------------------------ build */

    /**
     * The engine record for one calculator file, or null when there is none.
     *
     * @return array|null
     */
    public static function record(string $path): ?array
    {
        [$cat, $slug] = self::split($path);
        if ($cat === '' || $slug === '') {
            return null;
        }
        $file = self::path($cat, $slug);
        if (array_key_exists($file, self::$cache)) {
            return self::$cache[$file];
        }
        if (!is_file(self::absolute($file))) {
            return self::$cache[$file] = null;
        }
        $read = self::read($file);
        if (!$read['ok']) {
            /* A broken file must not blank the page: fall back to the shard and
               let the panel show the error. */
            return self::$cache[$file] = null;
        }
        return self::$cache[$file] = self::compile($read['def'], '/' . $cat . '/' . $slug);
    }

    /**
     * Turn a definition into the record the rest of the site understands.
     *
     * @return array<string,mixed>
     */
    public static function compile(array $def, string $path): array
    {
        [$cat, $slug] = self::split($path);
        $name  = (string) ($def['name'] ?? '');
        $meta  = is_array($def['meta'] ?? null) ? $def['meta'] : [];

        if (isset($def['raw']) && is_array($def['raw'])) {
            $raw = $def['raw'];
            $rec = [
                'path'     => $path,
                'slug'     => $slug,
                'cat'      => $cat,
                'name'     => $name,
                'title'    => (string) ($meta['title'] ?? $name),
                'desc'     => (string) ($meta['description'] ?? ''),
                'updated'  => (string) ($meta['updated'] ?? ''),
                'authors'  => is_array($def['authors'] ?? null) ? $def['authors'] : [],
                'vars'     => (array) ($raw['vars'] ?? []),
                'groups'   => (array) ($raw['groups'] ?? []),
                'eq'       => (array) ($raw['eq'] ?? []),
                'datasets' => (array) ($raw['datasets'] ?? []),
            ];
            if (!empty($raw['js'])) {
                $rec['js'] = (string) $raw['js'];
            }
            if (!empty($raw['showIf'])) {
                $rec['showIf'] = (array) $raw['showIf'];
            }
            /* Cross-field rules live with the rest of the machine in `raw` on an
               exported page, and at the top level on an authored one. */
            $checks = !empty($raw['checks']) ? $raw['checks'] : ($def['checks'] ?? null);
            if (!empty($checks) && is_array($checks)) {
                $rec['checks'] = $checks;
            }
            return $rec;
        }

        $vars     = [];
        $datasets = [];
        $groups   = [];
        $uid      = 0;

        foreach (self::sections($def) as $section) {
            $matrices = [];
            foreach ($section['blocks'] as $block) {
                $fields = [];
                foreach ($block['fields'] as $f) {
                    $field = self::field($f, $path, $vars, $datasets);
                    if ($field !== null) {
                        $fields[] = $field;
                    }
                }
                if ($fields === []) {
                    continue;
                }
                $cols = max(1, (int) $block['columns']);
                if ($cols === 1) {
                    /* One column: each field is its own full-width row. */
                    foreach ($fields as $field) {
                        $matrices[] = ['FR1', [[$field]]];
                    }
                    continue;
                }
                /* N columns: the fields are dealt out top to bottom, the first
                   columns taking the extra one — the same split the harvested
                   matrices have (six and five across two columns). */
                $per   = (int) ceil(count($fields) / $cols);
                $chunks = array_chunk($fields, max(1, $per));
                $columns = [];
                foreach ($chunks as $chunk) {
                    $columns[] = $chunk;
                }
                $grid = $cols === 2 ? 'FR1_FR1' : ($cols === 3 ? 'FR1_FR1_FR1' : 'FR1');
                $matrices[] = [$grid, $columns];
            }
            $groups[] = [
                'uid'   => 'calc-' . $slug . '-' . $uid,
                'title' => $section['title'],
                'desc'  => $section['note'],
                'm'     => $matrices,
            ];
            $uid++;
        }

        $eq = [];
        foreach (self::formulaPasses($def) as $pass) {
            $variants = [];
            foreach ($pass['results'] as $lhs => $expr) {
                $rhs = [];
                foreach (Expr::dependencies($expr) as $dep) {
                    if (isset($vars[$dep])) {
                        $rhs[] = $dep;
                    }
                }
                $variants[] = ['l' => $lhs, 'f' => $expr, 'r' => $rhs];
            }
            $eq[] = ['formula' => $pass['title'], 'var' => $variants];
        }

        $rec = [
            'path'     => $path,
            'slug'     => $slug,
            'cat'      => $cat,
            'name'     => $name,
            'title'    => (string) ($meta['title'] ?? $name),
            'desc'     => (string) ($meta['description'] ?? ''),
            'updated'  => (string) ($meta['updated'] ?? ''),
            'authors'  => is_array($def['authors'] ?? null) ? $def['authors'] : [],
            'vars'     => $vars,
            'groups'   => $groups,
            'eq'       => $eq,
            'datasets' => $datasets,
        ];
        if (trim((string) ($def['js'] ?? '')) !== '') {
            $rec['js'] = (string) $def['js'];
        }
        if (!empty($def['showIf']) && is_array($def['showIf'])) {
            $rec['showIf'] = $def['showIf'];
        }
        /*
         * Cross-field rules: statements that are true of the world rather than
         * of one box. A wet bulb cannot read above the dry bulb; a leaf cannot
         * be colder than the dew point and still be wet. Each rule is checked
         * once both boxes hold a number, and the message lands under the field
         * it is about — the same place a scale error appears.
         */
        if (!empty($def['checks']) && is_array($def['checks'])) {
            $rec['checks'] = $def['checks'];
        }
        return $rec;
    }

    /** Field shorthand -> the record's field array. */
    private static function field(array $f, string $path, array &$vars, array &$datasets): ?array
    {
        $name  = trim((string) ($f['name'] ?? ''));
        $label = (string) ($f['label'] ?? $name);
        $type  = strtolower((string) ($f['type'] ?? 'number'));

        if ($type === 'note') {
            $text = (string) ($f['text'] ?? $f['label'] ?? '');
            return $text === '' ? null : ['t' => 'x', 'c' => [[null, $text]]];
        }
        if ($type === 'image') {
            $url = (string) ($f['url'] ?? '');
            return $url === '' ? null : ['t' => 'i', 'u' => [$url]];
        }
        if ($name === '') {
            return null;
        }

        $out = ['t' => 'v', 'n' => $name, 'l' => $label];
        $var = ['type' => 'numerical', 'rnd' => null];

        switch ($type) {
            case 'select':
                $options  = is_array($f['options'] ?? null) ? $f['options'] : [];
                $dsUid    = 'ds-' . self::hash($path . '|' . $name);
                $rows     = [];
                $firstUid = null;
                $defaultUid = null;
                foreach ($options as $optLabel => $optValue) {
                    $optUid = 'o-' . self::hash($path . '|' . $name . '|' . (string) $optLabel);
                    $firstUid ??= $optUid;
                    $rows[] = ['uid' => $optUid, 'label' => (string) $optLabel, 'value' => (string) $optValue];
                    if (array_key_exists('default', $f) && (string) $f['default'] === (string) $optLabel) {
                        $defaultUid = $optUid;
                    }
                }
                if ($rows === []) {
                    return null;
                }
                $datasets[$dsUid] = [
                    'name'    => (string) ($f['dataset'] ?? $label),
                    'uiType'  => (string) ($f['control'] ?? 'RADIO'),
                    'options' => $rows,
                ];
                /* The dataset's own name and control are what the harvested
                   record kept; they are carried through rather than derived,
                   because a drop-down that becomes radio buttons changes the
                   page. */
                /* No default means no default: the control opens unanswered
                   rather than quietly choosing the first option. */
                $var = [
                    'type' => 'valueSelect',
                    'rnd'  => null,
                    'dfl'  => $defaultUid !== null ? [['v' => $defaultUid, 'c' => null]] : [],
                    'ds'   => $dsUid,
                ];
                $out['vt']   = 'valueSelect';
                $out['ds']   = $dsUid;
                $out['opts'] = array_map(static fn (array $o): array => [$o['uid'], $o['label'], $o['value']], $rows);
                break;

            case 'result':
                $var['type'] = 'dependent';
                $out['vt']   = 'dependent';
                break;

            case 'text':
                $var['type'] = 'text';
                $out['vt']   = (string) ($f['control'] ?? 'text');
                break;

            case 'date':
                $var['type'] = 'date';
                $out['vt']   = 'date';
                break;

            default:                                  // number
                $var['type'] = 'numerical';
                $out['vt']   = 'numerical';
                break;
        }

        foreach (['prefix' => 'pre', 'suffix' => 'suf', 'help' => 'h'] as $src => $key) {
            if (isset($f[$src]) && (string) $f[$src] !== '') {
                $out[$key] = (string) $f[$src];
            }
        }
        if (isset($f['unit']) && (string) $f['unit'] !== '') {
            $out['us'] = (string) $f['unit'];
        }
        if (isset($f['unit_default']) && (string) $f['unit_default'] !== '') {
            $out['du'] = (string) $f['unit_default'];
        }
        if (!empty($f['readonly'])) {
            $out['oo'] = 1;
        }
        if (array_key_exists('default', $f) && $type !== 'select') {
            $var['dfl'] = [['v' => $f['default'], 'c' => null]];
        }
        if (isset($f['rounding']) && is_array($f['rounding'])) {
            $var['rnd'] = array_values($f['rounding']);
        }

        $vars[$name] = $var;
        return $out;
    }

    /**
     * How much of a row a field takes, in sixths.
     *
     * A row is six; two halves (3 + 3) fill one, three thirds (2 + 2 + 2) fill
     * one, and anything that would overflow starts a new row. Sixths rather
     * than a fraction keeps the arithmetic integral.
     */
    private static function width(string $w): int
    {
        return match (strtolower($w)) {
            'third', 'one-third' => 2,
            'full', 'wide', 'block' => 6,
            'half', 'two-up' => 3,
            default => 6,
        };
    }

    private static function hash(string $s): string
    {
        return substr(sha1($s), 0, 12);
    }

    /* ---------------------------------------------------------------- content */

    /**
     * The article half of a calculator file, in the shape Shape::fromRecord
     * expects (the same shape the content JSON files have).
     */
    public static function content(string $path): ?array
    {
        [$cat, $slug] = self::split($path);
        if ($cat === '' || $slug === '') {
            return null;
        }
        $rec = self::record($path);
        if ($rec === null) {
            return null;
        }
        $read = self::read(self::path($cat, $slug));
        $def  = $read['ok'] ? (array) $read['def'] : [];
        $article = is_array($def['article'] ?? null) ? $def['article'] : [];
        $meta    = is_array($def['meta'] ?? null) ? $def['meta'] : [];

        $sections = [];
        foreach ((array) ($article['sections'] ?? []) as $s) {
            if (!is_array($s)) {
                continue;
            }
            $sections[] = [
                'title' => (string) ($s['title'] ?? ''),
                'html'  => (string) ($s['html'] ?? ''),
            ];
        }
        $faq = [];
        foreach ((array) ($article['faq'] ?? []) as $q) {
            if (is_array($q) && isset($q['q'])) {
                $faq[] = ['q' => (string) $q['q'], 'a' => (string) ($q['a'] ?? '')];
            }
        }
        $related = [];
        foreach ((array) ($article['related'] ?? []) as $r) {
            if (is_string($r) && str_starts_with($r, '/')) {
                $related[] = ['path' => $r, 'name' => ''];
            } elseif (is_array($r) && str_starts_with((string) ($r['path'] ?? ''), '/')) {
                $related[] = ['path' => (string) $r['path'], 'name' => (string) ($r['name'] ?? '')];
            }
        }

        return [
            'path'      => $path,
            'slug'      => $slug,
            'cat'       => $cat,
            'name'      => (string) ($def['name'] ?? ''),
            'seoTitle'  => (string) ($meta['title'] ?? ''),
            'seoDesc'   => (string) ($meta['description'] ?? ''),
            'h1'        => (string) ($meta['h1'] ?? $def['name'] ?? ''),
            'summary'   => (string) ($article['intro'] ?? ''),
            'sections'  => $sections,
            'faq'       => $faq,
            'related'   => $related,
            'words'     => self::words($article),
        ];
    }

    public static function words(array $article): int
    {
        $text = (string) ($article['intro'] ?? '');
        foreach ((array) ($article['sections'] ?? []) as $s) {
            $text .= ' ' . (string) ($s['html'] ?? '');
        }
        $text = strip_tags($text);
        return str_word_count($text);
    }

    /* --------------------------------------------------------------- manifest */

    /**
     * Every calculator file on disk, keyed by '/category/slug'.
     *
     * @return array<string,array{file:string,cat:string,slug:string,name:string,title:string,description:string,updated:string,bytes:int,mtime:int,words:int}>
     */
    public static function manifest(bool $fresh = false): array
    {
        if (self::$manifest !== null && !$fresh) {
            return self::$manifest;
        }
        $files = glob(self::dir() . '/*/qm-calc-*.php') ?: [];
        /* A signature that changes when a file is added, removed, resized or
           touched — cheap enough (one stat each) to check on every request, and
           it means the cache below cannot outlive an edit. */
        $signature = [];
        foreach ($files as $abs) {
            $signature[basename(dirname($abs)) . '/' . basename($abs)] = @filemtime($abs) . ':' . @filesize($abs);
        }
        ksort($signature);
        $sig = sha1((string) json_encode($signature));

        $cacheFile = self::root() . '/data/cache/calc-files.json';
        if (!$fresh && is_file($cacheFile)) {
            $cached = json_decode((string) @file_get_contents($cacheFile), true);
            if (is_array($cached) && ($cached['sig'] ?? '') === $sig && is_array($cached['files'] ?? null)) {
                return self::$manifest = $cached['files'];
            }
        }

        $out = [];
        foreach ($files as $abs) {
            $rel = str_replace(self::root() . '/', '', $abs);
            $dir = basename(dirname($abs));
            $cat = self::clean($dir);
            $slug = self::clean((string) preg_replace('~^qm-calc-~', '', basename($abs, '.php')));
            $read = self::read($rel);
            $def  = $read['ok'] ? (array) $read['def'] : [];
            $meta = is_array($def['meta'] ?? null) ? $def['meta'] : [];
            $article = is_array($def['article'] ?? null) ? $def['article'] : [];
            $out['/' . $cat . '/' . $slug] = [
                'file'        => $rel,
                'cat'         => $cat,
                'slug'        => $slug,
                'name'        => (string) ($def['name'] ?? $slug),
                'title'       => (string) ($meta['title'] ?? ''),
                'description' => (string) ($meta['description'] ?? ''),
                'updated'     => (string) ($meta['updated'] ?? ''),
                'bytes'       => (int) @filesize($abs),
                'mtime'       => (int) @filemtime($abs),
                'words'       => self::words($article),
                'error'       => $read['ok'] ? '' : $read['error'],
            ];
        }
        ksort($out);
        if (@is_dir(dirname($cacheFile))) {
            @file_put_contents($cacheFile, (string) json_encode(['sig' => $sig, 'files' => $out], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        }
        return self::$manifest = $out;
    }

    public static function flush(): void
    {
        self::$cache = [];
        self::$manifest = null;
    }

    /** Paths of every calculator file, for the sitemap and the panel. */
    public static function paths(): array
    {
        return array_keys(self::manifest(true));
    }

    /* ------------------------------------------------------------------ write */

    /**
     * Render a definition as the source of a calculator file.
     *
     * The output is meant to be read and edited by a person: one field per
     * line group, formulas one per line, the article last.
     */
    public static function render(array $def, string $path): string
    {
        [$cat, $slug] = self::split($path);
        $name  = (string) ($def['name'] ?? $slug);
        $meta  = (array) ($def['meta'] ?? []);
        $head  = "/**\n * " . $name . "\n * /" . $cat . '/' . $slug . "\n *\n"
               . " * One calculator, one file. Edit the form, the formulas or the\n"
               . " * article here; the page is rebuilt from this file on the next\n"
               . " * request. See docs/calc-files.md for the format.\n */\n\n";
        $src = "<?php\n\n" . $head . "return " . self::export($def, 0) . ";\n";
        return $src;
    }

    /** Array -> PHP source with long arrays, 4-space indent, prose in heredocs. */
    public static function export($value, int $depth = 0): string
    {
        $pad = str_repeat('    ', $depth);
        if (is_array($value)) {
            if ($value === []) {
                return '[]';
            }
            /* Small scalar arrays stay on one line: 'rounding' => ['omni',
               '0.0001'] is one fact, not four. */
            if (count($value) <= 4 && self::allScalar($value)) {
                $isList = array_keys($value) === range(0, count($value) - 1);
                $parts = [];
                foreach ($value as $k => $v) {
                    $parts[] = ($isList ? '' : self::key((string) $k) . ' => ') . self::export($v, $depth);
                }
                return '[' . implode(', ', $parts) . ']';
            }
            $isList = array_keys($value) === range(0, count($value) - 1);
            $lines = [];
            foreach ($value as $k => $v) {
                $key = $isList ? '' : self::key((string) $k) . ' => ';
                $lines[] = $pad . '    ' . $key . self::export($v, $depth + 1) . ',';
            }
            return "[\n" . implode("\n", $lines) . "\n" . $pad . ']';
        }
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }
        if (is_int($value) || is_float($value)) {
            return var_export($value, true);
        }
        if ($value === null) {
            return 'null';
        }
        return self::string((string) $value, $depth);
    }

    /** True when every value is a scalar (so the array can sit on one line). */
    private static function allScalar(array $value): bool
    {
        foreach ($value as $v) {
            if (is_array($v)) {
                return false;
            }
        }
        return true;
    }

    /** An array key. Always quoted: a bare word is a constant in PHP. */
    public static function key(string $k): string
    {
        return self::string($k, 0);
    }

    /**
     * A PHP literal for a string.
     *
     * Prose goes in a nowdoc: three thousand characters of article on one
     * quoted line is unreadable and unmergeable, and a nowdoc keeps the HTML
     * exactly as written (no interpolation, no escaping of quotes).
     */
    public static function string(string $s, int $depth = 0): string
    {
        if (!str_contains($s, "\n") && strlen($s) <= 160) {
            return "'" . str_replace(["\\", "'"], ["\\\\", "\\'"], $s) . "'";
        }
        $body   = rtrim($s, "\n");
        $marker = 'TXT';
        $i      = 0;
        while (preg_match('~^' . $marker . '$~m', $body) === 1) {
            $marker = 'TXT' . (++$i);
        }
        /* The body is indented to the closing marker, not left at column 0:
           flexible heredoc removes that indentation from every line, and a line
           that starts further left than the marker is a parse error. */
        $pad = str_repeat('    ', $depth);
        $body = $pad . str_replace("\n", "\n" . $pad, $body);
        return "<<<'" . $marker . "'\n" . $body . "\n" . $pad . $marker;
    }

    /** A single-quoted PHP string, kept on one line unless it is long. */
    public static function str(string $s): string
    {
        $out = "'" . str_replace(["\\", "'"], ["\\\\", "\\'"], $s) . "'";
        if (str_contains($s, "\n") || strlen($s) > 160) {
            /* Multi-line prose reads better as a heredoc — but a heredoc in an
               array must not carry trailing spaces, and the closing marker has
               to start at column 0 of its own line. Both are easy to break by
               hand, so long strings stay single-quoted and simply wrap. */
            return $out;
        }
        return $out;
    }
}

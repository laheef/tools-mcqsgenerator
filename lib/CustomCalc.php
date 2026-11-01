<?php
/**
 * CustomCalc — calculators that are not part of the harvested catalogue.
 *
 * The other 3,831 pages come from `data/calc/*.ndjson` and the panel never
 * rewrites them. This class covers the opposite case: a tool that has to exist
 * but was never harvested (a social-platform calculator, a gaming calculator,
 * whatever the next niche needs). It lives in MySQL and is created, edited and
 * published entirely from the panel.
 *
 * The important design point: a custom calculator is not a new kind of thing.
 * It is compiled into exactly the same definition shape the harvester produces
 * (`groups`, `vars`, `datasets`, `eq`, `js`), so the routing, the form builder,
 * the solver, the PHP/JS parity, the sitemap, search, related links and the
 * signed preview all work through the existing code with no special cases.
 *
 * Everything is validated with the real engine before it is stored:
 *   * every expression parses and evaluates on sample values,
 *   * every identifier used is a declared variable,
 *   * a reverse direction is round-tripped against the forward one,
 *   * the slug cannot collide with the catalogue, a page, a category or a route.
 */

declare(strict_types=1);

namespace Omni;

final class CustomCalc
{
    /** @var array<int,array>|null rows keyed by id */
    private static ?array $rows = null;
    /** @var array<string,array>|null rows keyed by path */
    private static ?array $byPath = null;

    public const TYPES = [
        'number'      => 'Number',
        'number_unit' => 'Number with a unit switcher',
        'select'      => 'Drop-down / radio list',
        'checkbox'    => 'On/off checkbox',
        'text'        => 'Text (a DNA, RNA or protein sequence)',
    ];

    public static function enabled(): bool
    {
        return class_exists(Db::class) && Db::available() && Db::hasTable('custom_calculators');
    }

    public static function flush(): void
    {
        self::$rows = null;
        self::$byPath = null;
    }

    /* ------------------------------------------------------------------ read */

    /** @return array<int,array> every custom calculator, newest slug first */
    public static function rows(): array
    {
        if (self::$rows === null) {
            self::$rows = [];
            self::$byPath = [];
            if (self::enabled()) {
                foreach (Db::all('SELECT * FROM custom_calculators ORDER BY category_slug, name') as $row) {
                    $row['id'] = (int) $row['id'];
                    self::$rows[$row['id']] = $row;
                    self::$byPath[(string) $row['category_slug'] . '/' . $row['slug']] = $row;
                    self::$byPath['/' . $row['category_slug'] . '/' . $row['slug']] = $row;
                }
            }
        }
        return self::$rows ?? [];
    }

    public static function find(int $id): ?array
    {
        return self::rows()[$id] ?? null;
    }

    public static function findByPath(string $path): ?array
    {
        self::rows();
        $key = '/' . ltrim($path, '/');
        return self::$byPath[$key] ?? self::$byPath[ltrim($key, '/')] ?? null;
    }

    /* ------------------------------------------------- catalogue integration */

    /**
     * One catalogue row, in the same shape Data::allRows() builds from the
     * manifest — so the rest of the site cannot tell the difference.
     */
    public static function dataRow(array $row): array
    {
        $path = '/' . $row['category_slug'] . '/' . $row['slug'];
        return [
            'path'        => $path,
            'cat'         => (string) $row['category_slug'],
            'slug'        => (string) $row['slug'],
            'name'        => self::cleanName((string) $row['name']),
            'rawName'     => (string) $row['name'],
            'title'       => (string) ($row['meta_title'] !== '' ? $row['meta_title'] : $row['name']),
            'description' => (string) ($row['meta_description'] !== '' ? $row['meta_description'] : (string) $row['summary']),
            'file'        => $path,
            'shard'       => -1,
            'offset'      => 0,
            'length'      => 0,
            'customId'    => (int) $row['id'],
            'sourcePath'  => $path,
            'sourceCat'   => (string) $row['category_slug'],
            'sourceSlug'  => (string) $row['slug'],
            'status'      => (string) $row['status'],
            'sortOrder'   => (int) $row['sort_order'],
            'featured'    => (int) $row['is_featured'] === 1,
            'icon'        => (string) $row['icon'],
            'thumbnail'   => (string) $row['thumbnail'],
        ];
    }

    /** The compiled engine record (what Data::readRecord returns for shards). */
    public static function record(array $row): array
    {
        $decoded = json_decode((string) ($row['definition'] ?? ''), true);
        if (is_array($decoded) && $decoded !== []) {
            return $decoded;
        }
        $compiled = self::compile(self::editorModel($row));
        return $compiled['record'] ?? [];
    }

    /** Article prose for the page (summary, sections, FAQ). */
    public static function content(array $row): array
    {
        return [
            'path'     => '/' . $row['category_slug'] . '/' . $row['slug'],
            'cat'      => (string) $row['category_slug'],
            'slug'     => (string) $row['slug'],
            'name'     => (string) $row['name'],
            'h1'       => (string) $row['h1'],
            'seoTitle' => (string) $row['meta_title'],
            'seoDesc'  => (string) $row['meta_description'],
            'summary'  => (string) ($row['summary'] ?? ''),
            'sections' => self::decode((string) ($row['sections'] ?? ''), []),
            'faq'      => self::decode((string) ($row['faq'] ?? ''), []),
            'words'    => str_word_count(strip_tags((string) ($row['summary'] ?? ''))),
            'draftedAt'   => (string) ($row['drafted_at'] ?? ''),
            'draftedWords' => (int) ($row['drafted_words'] ?? 0),
            'needsReview' => self::needsReview($row),
        ];
    }

    /**
     * Does this install have the review columns from migration 003?
     *
     * A calculator saved before the upgrade is perfectly valid without them, so
     * every read and write of `drafted_at` goes through this check rather than
     * assuming the schema is current.
     */
    public static function tracksReview(): bool
    {
        static $has = null;
        return $has ??= Db::hasColumn('custom_calculators', 'drafted_at');
    }

    /** Was the article on this row machine-drafted and not yet reviewed? */
    public static function needsReview(array $row): bool
    {
        return self::tracksReview() && !empty($row['drafted_at']);
    }

    /** Category slugs a custom calculator can live in. */
    public static function categories(): array
    {
        $out = [];
        foreach (Data::categories() as $cat) {
            $out[(string) $cat['slug']] = (string) $cat['name'];
        }
        return $out;
    }

    /* -------------------------------------------------------------- compile */

    /**
     * The editor's model for one row: fields, equations, prose.
     *
     * @return array<string,mixed>
     */
    public static function editorModel(?array $row = null): array
    {
        $empty = [
            'name' => '', 'slug' => '', 'category_slug' => 'other', 'h1' => '',
            'meta_title' => '', 'meta_description' => '', 'summary' => '',
            'icon' => '', 'status' => 'draft', 'is_featured' => 0, 'sort_order' => 0,
            'noindex' => 0, 'sections' => [], 'faq' => [], 'fields' => [],
            'equations' => [], 'js' => '',
        ];
        if ($row === null) {
            return $empty;
        }
        return [
            'id'               => (int) $row['id'],
            'name'             => (string) $row['name'],
            'slug'             => (string) $row['slug'],
            'category_slug'    => (string) $row['category_slug'],
            'h1'               => (string) $row['h1'],
            'meta_title'       => (string) $row['meta_title'],
            'meta_description' => (string) $row['meta_description'],
            'summary'          => (string) ($row['summary'] ?? ''),
            'icon'             => (string) $row['icon'],
            'status'           => (string) $row['status'],
            'is_featured'      => (int) $row['is_featured'],
            'sort_order'       => (int) $row['sort_order'],
            'noindex'          => (int) $row['noindex'],
            'sections'         => self::decode((string) ($row['sections'] ?? ''), []),
            'faq'              => self::decode((string) ($row['faq'] ?? ''), []),
            'fields'           => self::decode((string) ($row['fields'] ?? ''), []),
            'directions'       => self::flattenEquations(self::decode((string) ($row['equations'] ?? ''), [])),
            'js'              => (string) ($row['js'] ?? ''),
        ];
    }

    /**
     * Turn the editor model into a compiled engine record.
     *
     * @return array{record:array,errors:array<int,string>}
     */
    public static function compile(array $model): array
    {
        $errors = [];
        $fields = self::normaliseFields($model['fields'] ?? [], $errors);
        $slug     = self::slugify((string) ($model['slug'] ?? ''));
        $cat      = self::slugify((string) ($model['category_slug'] ?? 'other')) ?: 'other';
        $name     = trim((string) ($model['name'] ?? ''));
        $path     = '/' . $cat . '/' . $slug;

        if ($slug === '') {
            $errors[] = 'The calculator needs a slug (its address: /category/slug).';
        }
        if ($name === '') {
            $errors[] = 'The calculator needs a name.';
        }

        /* variables -------------------------------------------------------- */
        $vars     = [];
        $datasets = [];
        $lines    = [];
        foreach ($fields as $index => $field) {
            $key = $field['key'];
            if ($key === '') {
                continue;
            }
            $entry = ['t' => 'v', 'n' => $key, 'l' => $field['label'] !== '' ? $field['label'] : $key];
            if ($field['help'] !== '') {
                $entry['h'] = $field['help'];
            }
            if ($field['prefix'] !== '') {
                $entry['pre'] = $field['prefix'];
            }
            if ($field['suffix'] !== '') {
                $entry['suf'] = $field['suffix'];
            }
            if ($field['output']) {
                $entry['oo'] = 1;
            }

            if ($field['type'] === 'text') {
                /*
                 * A sequence box is not a number: it never appears in an
                 * equation, and the page script reads it with getRawInput().
                 * The definition still carries it so the widget can render it
                 * and so a shared link can prefill it.
                 */
                $entry['vt'] = 'text';
                $vars[$key] = ['type' => 'text', 'rnd' => null];
                if (trim($field['default']) !== '') {
                    $vars[$key]['dfl'] = [['v' => (string) $field['default'], 'c' => null]];
                }
                $lines[] = $entry;
                continue;
            }

            if ($field['type'] === 'select' || $field['type'] === 'checkbox') {
                $options = $field['type'] === 'checkbox'
                    ? [['yes', 'Yes', '1'], ['no', 'No', '0']]
                    : $field['options'];
                if (count($options) < 2) {
                    $errors[] = 'The list field “' . $entry['l'] . '” needs at least two options (Label|value per line).';
                    continue;
                }
                $dsUid = 'ds-' . $key;
                $entry['vt']   = 'valueSelect';
                $entry['ds']   = $dsUid;
                $entry['opts'] = $options;
                $datasets[$dsUid] = [
                    'name'    => $entry['l'],
                    'uiType'  => count($options) > 4 ? 'SELECT' : 'RADIO',
                    'options' => array_map(static fn (array $o): array => [
                        'uid' => $o[0], 'label' => $o[1], 'value' => $o[2],
                    ], $options),
                ];
                /*
                 * The default used to be hard-coded to the first option, so a
                 * list field always opened on whatever happened to be listed
                 * first — "Sand" for a soil texture where the page meant "Loam".
                 * Honour the field's default when it names an option (by uid,
                 * value or label) and fall back to the first option otherwise.
                 */
                $defaultUid = $options[0][0];
                $wanted = trim((string) ($field['default'] ?? ''));
                if ($wanted !== '') {
                    foreach ($options as $option) {
                        if ((string) $option[0] === $wanted || (string) $option[2] === $wanted
                            || (string) $option[1] === $wanted) {
                            $defaultUid = (string) $option[0];
                            break;
                        }
                    }
                }
                $vars[$key] = [
                    'type' => 'valueSelect',
                    'rnd'  => null,
                    'dfl'  => [['v' => $defaultUid, 'c' => null]],
                    'ds'   => $dsUid,
                ];
            } else {
                $entry['vt'] = 'numerical';
                if ($field['type'] === 'number_unit' && $field['unit_group'] !== '') {
                    $entry['us'] = $field['unit_group'];
                    if ($field['unit_default'] !== '') {
                        $entry['du'] = $field['unit_default'];
                    }
                }
                $vars[$key] = ['type' => 'numerical', 'rnd' => ['omni', '0.0001']];
                if (trim($field['default']) !== '') {
                    $vars[$key]['dfl'] = [['v' => trim($field['default']), 'c' => null]];
                }
            }
            $lines[] = $entry;
        }

        if ($vars === []) {
            $errors[] = 'Add at least one field — a calculator with no inputs has nothing to solve.';
        }

        /* equations -------------------------------------------------------- */
        $eq = [];
        foreach (self::groupDirections($model['directions'] ?? []) as $equation) {
            $directions = [];
            $label = trim((string) ($equation['formula'] ?? ''));
            foreach ($equation['directions'] as $direction) {
                $lhs  = trim((string) ($direction['l'] ?? ''));
                $expr = trim((string) ($direction['f'] ?? ''));
                if ($lhs === '' && $expr === '') {
                    continue;
                }
                if ($lhs === '' || $expr === '') {
                    $errors[] = 'An equation row has a target but no expression (or the other way round).';
                    continue;
                }
                if (!isset($vars[$lhs])) {
                    $errors[] = '“' . $lhs . '” is used as an equation target but is not a field. Add it as a field first.';
                    continue;
                }
                if (($vars[$lhs]['type'] ?? '') !== 'numerical') {
                    $errors[] = '“' . $lhs . '” is a list field, so it cannot be calculated by an equation.';
                    continue;
                }
                $deps = [];
                try {
                    $deps = Expr::dependencies($expr);
                } catch (\Throwable $e) {
                    $errors[] = 'The expression for “' . $lhs . '” does not parse: ' . $e->getMessage();
                    continue;
                }
                $textual = [];
                foreach ($deps as $dep) {
                    if (($vars[$dep]['type'] ?? '') === 'text') {
                        $textual[] = $dep;
                    }
                }
                if ($textual !== []) {
                    $errors[] = 'The expression for “' . $lhs . '” uses ' . implode(', ', $textual)
                        . ', which is a text field. Formulas work on numbers — use a page script '
                        . 'for anything that reads a sequence.';
                    continue;
                }
                $unknown = array_values(array_diff($deps, array_keys($vars)));
                if ($unknown !== []) {
                    $errors[] = 'The expression for “' . $lhs . '” uses ' . implode(', ', $unknown)
                        . ', which is not a field. Rename it or add the field.';
                    continue;
                }
                if (in_array($lhs, array_column($directions, 'l'), true)) {
                    $errors[] = 'Two rows both solve for “' . $lhs . '”. Keep one.';
                    continue;
                }
                $directions[] = ['l' => $lhs, 'f' => $expr, 'r' => array_values($deps)];
            }
            if ($directions === []) {
                continue;
            }
            if ($label === '') {
                $label = $directions[0]['l'] . ' = ' . $directions[0]['f'];
            }
            $eq[] = ['formula' => $label, 'var' => $directions];
        }

        if ($eq === [] && $vars !== [] && trim((string) ($model['js'] ?? '')) === '') {
            $errors[] = 'Add at least one equation — without one nothing is calculated.';
        }

        /*
         * Parsing is not enough: a formula can tokenise and still be nonsense
         * ("first++*"). Every direction is evaluated once on sample values here,
         * so a definition that cannot run is never stored.
         */
        foreach ($eq as $equation) {
            foreach ($equation['var'] as $direction) {
                /* Distinct values per dependency, not 2.0 for all of them: a
                   difference such as (control - blank) is legitimately zero when
                   every input is 2, and 0/0 would reject a perfectly good
                   formula. Primes keep coincidences out of the sample. */
                $probe = [2.0, 3.0, 5.0, 7.0, 11.0, 13.0, 17.0, 19.0, 23.0, 29.0, 31.0, 37.0];
                $sample = [];
                $pi = 0;
                foreach ($direction['r'] as $dep) {
                    $sample[$dep] = $probe[$pi % count($probe)];
                    $pi++;
                }
                try {
                    $value = Expr::evaluate($direction['f'], $sample);
                } catch (\Throwable $e) {
                    $errors[] = 'The expression for “' . $direction['l'] . '” does not run: ' . $e->getMessage();
                    continue;
                }
                if (!is_finite($value)) {
                    $errors[] = 'The expression for “' . $direction['l'] . '” does not produce a number.';
                }
            }
        }

        /*
         * Never more than two grid columns, each stacking its fields.
         *
         * The widget lives in the right-hand rail, which is about 400 px wide on
         * a desktop and full-width on a phone. Three columns there leave roughly
         * 110 px each and a label such as "Master mix stock concentration" wraps
         * into four lines and collides with its neighbour's label — measured on
         * /biology/pcr-master-mix-calculator. Two columns keep every label on
         * one or two lines, and one column is used for a definition with only one
         * field so it does not sit half-width.
         */
        $columns = [];
        if ($lines !== []) {
            $count = count($lines);
            $perColumn = (int) ceil($count / ($count <= 1 ? 1 : 2));
            foreach (array_chunk($lines, max(1, $perColumn)) as $chunk) {
                $columns[] = array_values($chunk);   // one grid column holds 1–3 fields
            }
        }

        $record = [
            'path'      => $path,
            'slug'      => $slug,
            'cat'       => $cat,
            'name'      => $name,
            'title'     => trim((string) ($model['meta_title'] ?? '')) ?: $name . ' Calculator',
            'desc'      => trim((string) ($model['meta_description'] ?? '')),
            'authors'   => [],
            'reviewers' => [],
            'updated'   => date('Y-m-d'),
            'rate'      => 0,
            'groups'    => $columns === [] ? [] : [['uid' => 'custom-' . $slug, 'title' => '', 'desc' => '', 'm' => [['FR' . count($columns), $columns]]]],
            'vars'      => $vars,
            'datasets'  => $datasets,
            'eq'        => $eq,
            'js'        => trim((string) ($model['js'] ?? '')) !== '' ? (string) $model['js'] : null,
            'needsJs'   => false,
        ];

        return ['record' => $record, 'errors' => $errors];
    }

    /**
     * Run the compiled definition through the real engine and report what a
     * visitor would see. This is the editor's Test button: it is not a mock, it
     * is the same Solver the public page calls, fed with the fields an editor
     * has left as inputs.
     *
     * @param array<string,array<string,string>> $supplied target => value, from the Test form
     * @return array{ok:bool,outputs:array<string,array{label:string,value:string}>,unknown:array<int,string>,errors:array<int,string>,warnings:array<int,string>}
     */
    public static function testModel(array $model, array $supplied = []): array
    {
        $compiled = self::compile($model);
        $errors   = $compiled['errors'];
        $record   = $compiled['record'];
        $warnings = [];

        if ($errors !== []) {
            return ['ok' => false, 'outputs' => [], 'unknown' => [], 'errors' => $errors, 'warnings' => []];
        }

        $calc  = Shape::fromRecord($record, null, []);
        $units = Data::units();
        $labels = [];
        foreach ($record['groups'] as $group) {
            foreach ($group['m'] as $matrix) {
                foreach ($matrix[1] as $column) {
                    foreach ($column as $field) {
                        if (($field['t'] ?? '') === 'v') {
                            $labels[(string) $field['n']] = (string) ($field['l'] ?? $field['n']);
                        }
                    }
                }
            }
        }

        /* which variables are targets (outputs) and which are inputs */
        $targets = [];
        foreach ($record['eq'] as $equation) {
            foreach ($equation['var'] as $direction) {
                $targets[$direction['l']] = true;
            }
        }

        /* every direction has to evaluate on sample values */
        $sample = [];
        foreach ($record['vars'] as $name => $def) {
            if (($def['type'] ?? '') === 'valueSelect') {
                continue;
            }
            $default = $def['dfl'][0]['v'] ?? null;
            $sample[$name] = is_numeric($default) ? (float) $default : 2.0;
            if ($sample[$name] == 0.0) {
                $sample[$name] = 2.0;          // a zero would make every reverse direction divide by zero
            }
        }
        $directionValues = [];
        foreach ($record['eq'] as $equation) {
            foreach ($equation['var'] as $direction) {
                $vars = [];
                foreach ($direction['r'] as $dep) {
                    $vars[$dep] = $sample[$dep] ?? 2.0;
                }
                try {
                    $value = Expr::evaluate($direction['f'], $vars);
                } catch (\Throwable $e) {
                    $errors[] = 'The expression for “' . $direction['l'] . '” failed: ' . $e->getMessage();
                    continue;
                }
                if (!is_finite($value)) {
                    $errors[] = 'The expression for “' . $direction['l'] . '” produced a non-finite number.';
                    continue;
                }
                $sample[$direction['l']] = $value;
                $directionValues[$direction['l']] = $value;
            }
        }

        /*
         * A reverse direction must be the inverse of the forward one. Two
         * directions form a pair when each one's target is the other one's
         * input; then solving forward and back has to land where it started.
         */
        foreach ($record['eq'] as $equation) {
            $dirs = $equation['var'];
            if (count($dirs) < 2) {
                continue;
            }
            $forward = $dirs[0];
            foreach (array_slice($dirs, 1) as $reverse) {
                if (!in_array($forward['l'], $reverse['r'], true) || !in_array($reverse['l'], $forward['r'], true)) {
                    continue;               // not an inverse pair
                }
                $base = [];
                foreach ($forward['r'] as $dep) {
                    $base[$dep] = $sample[$dep] ?? 2.0;
                }
                try {
                    $forwardValue = Expr::evaluate($forward['f'], $base);
                    $reverseVars = [];
                    foreach ($reverse['r'] as $dep) {
                        $reverseVars[$dep] = $dep === $forward['l'] ? $forwardValue : ($base[$dep] ?? 2.0);
                    }
                    $back = Expr::evaluate($reverse['f'], $reverseVars);
                } catch (\Throwable $e) {
                    $warnings[] = 'Could not round-trip “' . $reverse['l'] . '”: ' . $e->getMessage();
                    continue;
                }
                $expected = $base[$reverse['l']];
                $scale    = max(1.0, abs($expected));
                if (abs($back - $expected) / $scale > 0.001) {
                    $warnings[] = 'Solving for “' . $reverse['l'] . '” returns ' . self::num($back) . ' where it should return '
                        . self::num($expected) . '. It still calculates, but that direction is not the exact inverse of “'
                        . $forward['l'] . '”.';
                }
            }
        }

        if ($errors !== []) {
            return ['ok' => false, 'outputs' => [], 'unknown' => [], 'errors' => $errors, 'warnings' => $warnings];
        }

        /* what the page would show, using the inputs the editor left alone */
        $inputs = [];
        foreach ($record['vars'] as $name => $def) {
            $name = (string) $name;
            if (isset($supplied[$name]) && is_numeric($supplied[$name])) {
                $inputs[$name] = (float) $supplied[$name];
                continue;
            }
            if (isset($targets[$name])) {
                continue;                    // an output: let the engine compute it
            }
            if (($def['type'] ?? '') === 'valueSelect') {
                $option = $record['datasets'][$def['ds'] ?? '']['options'][0]['uid'] ?? null;
                if ($option !== null) {
                    $inputs[$name] = $option;
                }
                continue;
            }
            if (isset($sample[$name])) {
                $inputs[$name] = $sample[$name];
            }
        }

        $outputs = [];
        $unknown = [];
        try {
            $solver = Solver::solve($calc, $inputs, $units);
            foreach ($targets as $name => $_) {
                $value = $solver->value((string) $name);
                if ($value === null) {
                    /*
                     * A definition where every field is a target leaves the solver
                     * nothing to work from — nothing to hold fixed. The direction
                     * has already been evaluated against the sample values above,
                     * so report that instead of claiming the row calculates nothing.
                     */
                    $value = $directionValues[$name] ?? null;
                }
                if ($value === null) {
                    $unknown[] = $labels[$name] ?? (string) $name;
                    continue;
                }
                $outputs[$name] = [
                    'label' => $labels[$name] ?? (string) $name,
                    'value' => self::num($value),
                ];
            }
        } catch (\Throwable $e) {
            $errors[] = 'The solver reported: ' . $e->getMessage();
        }

        return [
            'ok'       => $errors === [],
            'outputs'  => $outputs,
            'unknown'  => $unknown,
            'errors'   => $errors,
            'warnings' => $warnings,
        ];
    }

    /* ----------------------------------------------------------------- save */

    /**
     * Validate and store. Never writes a definition the engine cannot run.
     *
     * @return array{ok:bool,id:int,errors:array<int,string>,message:string}
     */
    /**
     * Validate, compile and store one calculator.
     *
     * `$draftedWords` is the length of an article the *importer* wrote from the
     * definition: passing it marks the row as machine-drafted and unread. Saving
     * from the editor passes nothing, which clears the mark — the reviewer has
     * seen the text and pressed Save.
     */
    public static function save(?int $id, array $model, int $userId, ?int $draftedWords = null): array
    {
        $errors = [];
        $slug   = self::slugify((string) ($model['slug'] ?? ''));
        $cat    = self::slugify((string) ($model['category_slug'] ?? 'other')) ?: 'other';

        if ($slug === '') {
            $errors[] = 'The slug is required.';
        }
        foreach (self::slugConflicts($slug, $cat, (int) $id) as $conflict) {
            $errors[] = $conflict;
        }

        $compiled = self::compile($model);
        $errors   = array_merge($errors, $compiled['errors']);

        if ($errors !== []) {
            return ['ok' => false, 'id' => (int) $id, 'errors' => array_values(array_unique($errors)), 'message' => 'Not saved — fix the highlighted problems.'];
        }

        $fieldErrors = [];
        $row = [
            'slug'             => $slug,
            'category_slug'    => $cat,
            'name'             => trim((string) $model['name']),
            'h1'               => trim((string) ($model['h1'] ?? '')) ?: trim((string) $model['name']),
            'meta_title'       => trim((string) ($model['meta_title'] ?? '')),
            'meta_description' => trim((string) ($model['meta_description'] ?? '')),
            'summary'          => trim((string) ($model['summary'] ?? '')),
            'sections'         => json_encode(array_values(self::cleanSections($model['sections'] ?? [])), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'faq'              => json_encode(array_values(self::cleanFaq($model['faq'] ?? [])), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'fields'           => json_encode(array_values(self::normaliseFields($model['fields'] ?? [], $fieldErrors)), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'equations'        => json_encode(array_values(self::groupDirections($model['directions'] ?? [])), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'definition'       => json_encode($compiled['record'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'icon'             => trim((string) ($model['icon'] ?? '')),
            'status'           => in_array($model['status'] ?? 'draft', ['published', 'draft', 'archived'], true) ? (string) $model['status'] : 'draft',
            'is_featured'      => !empty($model['is_featured']) ? 1 : 0,
            'sort_order'       => (int) ($model['sort_order'] ?? 0),
            'noindex'          => !empty($model['noindex']) ? 1 : 0,
            'js'               => trim((string) ($model['js'] ?? '')) ?: null,
            'updated_by'       => $userId,
            'updated_at'       => date('Y-m-d H:i:s'),
        ];
        if (self::tracksReview()) {
            $row['drafted_at']    = $draftedWords === null ? null : date('Y-m-d H:i:s');
            $row['drafted_words'] = $draftedWords ?? 0;
        }

        if ($id !== null && $id > 0) {
            $existing = self::find($id);
            if ($existing === null) {
                return ['ok' => false, 'id' => 0, 'errors' => ['That calculator no longer exists.'], 'message' => 'Not saved.'];
            }
            self::snapshot($existing, $userId, 'Before edit');
            Db::update('custom_calculators', $row, 'id = :id', [':id' => $id]);
        } else {
            $row['created_by'] = $userId;
            $row['created_at'] = date('Y-m-d H:i:s');
            $id = (int) Db::insert('custom_calculators', $row);
            self::flush();                  // re-read so the first snapshot has the stored row
            self::snapshot(self::find($id) ?? [], $userId, 'Created');
        }

        self::ensureCategory($cat, (string) $row['name']);
        LiveCounts::invalidate();
        return ['ok' => true, 'id' => (int) $id, 'errors' => [], 'message' => 'Saved.'];
    }

    public static function delete(int $id): bool
    {
        $row = self::find($id);
        if ($row === null) {
            return false;
        }
        Db::delete('custom_calculators', 'id = ?', [$id]);
        Db::delete('custom_calculator_versions', 'calculator_id = ?', [$id]);
        self::flush();
        LiveCounts::invalidate();
        return true;
    }

    /** @return array<int,array> version history, newest first */
    public static function versions(int $id): array
    {
        if (!self::enabled() || !Db::hasTable('custom_calculator_versions')) {
            return [];
        }
        return Db::all('SELECT id, version, note, created_by, created_at FROM custom_calculator_versions WHERE calculator_id = ? ORDER BY id DESC LIMIT 30', [$id]);
    }

    /** Restore one snapshot. Returns the calculator id, or null when it is gone. */
    public static function restore(int $versionId, int $userId): ?int
    {
        $version = Db::one('SELECT * FROM custom_calculator_versions WHERE id = ?', [$versionId]);
        if ($version === null) {
            return null;
        }
        $snapshot = json_decode((string) $version['snapshot'], true);
        if (!is_array($snapshot) || $snapshot === []) {
            return null;
        }
        $id = (int) $version['calculator_id'];
        if (self::find($id) === null) {
            return null;
        }
        $current = self::find($id);
        self::snapshot($current ?? [], $userId, 'Before restore of version ' . (int) $version['version']);
        unset($snapshot['id']);
        $snapshot['updated_by'] = $userId;
        $snapshot['updated_at'] = date('Y-m-d H:i:s');
        Db::update('custom_calculators', $snapshot, 'id = :id', [':id' => $id]);
        self::flush();
        LiveCounts::invalidate();
        return $id;
    }

    /* --------------------------------------------------------------- helpers */

    /** @return array<int,string> reasons this slug cannot be used, empty when free */
    public static function slugConflicts(string $slug, string $cat, int $ignoreId = 0): array
    {
        if ($slug === '') {
            return [];
        }
        $out = [];
        $path = '/' . $cat . '/' . $slug;

        foreach (self::rows() as $row) {
            if ((int) $row['id'] === $ignoreId) {
                continue;
            }
            if ($row['slug'] === $slug && (string) $row['category_slug'] === $cat) {
                $out[] = 'Another custom calculator already lives at ' . $path . '.';
            }
        }
        if (class_exists(Data::class)) {
            foreach (Data::allRows() as $row) {
                if ($ignoreId > 0 && (int) ($row['customId'] ?? 0) === $ignoreId) {
                    continue;           // editing this calculator: it may keep its own address
                }
                if ($row['path'] === $path) {
                    $out[] = 'The catalogue already has a calculator at ' . $path . '. Choose another slug or category.';
                    break;
                }
            }
        }
        $reserved = ['admin', 'api', 'assets', 'uploads', 'search', 'blog', 'tag', 'feed',
                     'sitemap.xml', 'robots.txt', 'search-index.json', 'index', 'router', 'config'];
        if (in_array($cat, $reserved, true)) {
            $out[] = '“' . $cat . '” is a system route, so it cannot be a category.';
        }
        if (Db::hasTable('pages') && Db::value('SELECT COUNT(*) FROM pages WHERE slug = ?', [$slug]) > 0) {
            $out[] = 'A page already uses “' . $slug . '” at /' . $slug . '.';
        }
        return $out;
    }

    /** Create the category row when a calculator introduces a new niche. */
    public static function ensureCategory(string $slug, string $calculatorName = ''): void
    {
        if ($slug === '' || !Db::hasTable('categories')) {
            return;
        }
        if (Db::value('SELECT COUNT(*) FROM categories WHERE slug = ?', [$slug]) > 0) {
            return;
        }
        foreach (Data::allCategories() as $cat) {
            if ((string) $cat['slug'] === $slug) {
                return;
            }
        }
        $name = ucfirst(str_replace('-', ' ', $slug));
        Db::insert('categories', [
            'slug'      => $slug,
            'name'      => $name,
            'title'     => $name . ' calculators',
            'description' => 'Calculators in the ' . $name . ' category.',
            'icon'      => 'grid',
            'sort_order' => 900,
            'status'    => 'published',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Cms::flush();
    }

    /** @return array<string,array{name:string,units:array<string,string>,default:string}> */
    public static function unitGroups(): array
    {
        $out = [];
        foreach (Data::units()->all() as $key => $group) {
            $out[(string) $key] = $group;
        }
        return $out;
    }

    public static function slugify(string $value): string
    {
        $value = strtolower(trim($value));
        $value = (string) preg_replace('~[^a-z0-9]+~', '-', $value);
        return trim($value, '-');
    }

    /** @return array<int,array> */
    private static function normaliseFields($raw, array &$errors = []): array
    {
        $out = [];
        $seen = [];
        foreach (is_array($raw) ? $raw : [] as $field) {
            if (!is_array($field)) {
                continue;
            }
            $label = trim((string) ($field['label'] ?? ''));
            $key   = self::slugify((string) ($field['key'] ?? ''));
            $key   = str_replace('-', '_', $key);
            if ($key === '' && $label !== '') {
                $key = str_replace('-', '_', self::slugify($label));
            }
            if ($key === '') {
                continue;
            }
            if (isset($seen[$key])) {
                $errors[] = 'Two fields share the key “' . $key . '”. Variable names have to be unique.';
                continue;
            }
            if (class_exists(Functions::class) && Functions::knows($key)) {
                $errors[] = '“' . $key . '” is the name of a built-in function, so it cannot be used as a field key. '
                    . 'Rename it (for example ' . $key . '_total) and update the formulas that mention it.';
                continue;
            }
            $seen[$key] = true;
            $type = (string) ($field['type'] ?? 'number');
            if (!isset(self::TYPES[$type])) {
                $type = 'number';
            }
            $out[] = [
                'key'          => $key,
                'label'        => $label !== '' ? $label : ucfirst(str_replace('_', ' ', $key)),
                'type'         => $type,
                'default'      => (string) ($field['default'] ?? ''),
                'unit_group'   => (string) ($field['unit_group'] ?? ''),
                'unit_default' => (string) ($field['unit_default'] ?? ''),
                'help'         => (string) ($field['help'] ?? ''),
                'prefix'       => (string) ($field['prefix'] ?? ''),
                'suffix'       => (string) ($field['suffix'] ?? ''),
                'options'      => self::parseOptions($field['options'] ?? ''),
                // a text field is an input by definition: it cannot be solved for
                'output'       => $type === 'text' ? false : !empty($field['output']),
            ];
        }
        return $out;
    }

    /**
     * Stored option list → the text the editor shows, so a saved list can be
     * edited and saved again without turning into something else.
     */
    public static function optionsToText($options): string
    {
        if (!is_array($options)) {
            return (string) $options;
        }
        $lines = [];
        foreach ($options as $option) {
            if (!is_array($option)) {
                continue;
            }
            $label = (string) ($option[1] ?? $option['label'] ?? '');
            $value = (string) ($option[2] ?? $option['value'] ?? '');
            $lines[] = $label . '|' . $value;
        }
        return implode("\n", $lines);
    }

    /** "Label|value" per line → [[uid,label,value], …] */
    private static function parseOptions($raw): array
    {
        if (is_array($raw)) {
            return array_values(array_filter($raw, 'is_array'));
        }
        $out = [];
        foreach (preg_split('~\r\n|\r|\n~', (string) $raw) ?: [] as $line) {
            $line = trim($line);
            if ($line === '') {
                continue;
            }
            $parts = array_map('trim', explode('|', $line, 2));
            $label = $parts[0];
            $value = $parts[1] ?? self::slugify($label);
            $out[] = [self::slugify($label) ?: 'opt', $label, $value];
        }
        return $out;
    }

    private static function cleanSections($raw): array
    {
        $out = [];
        foreach (is_array($raw) ? $raw : [] as $section) {
            if (!is_array($section)) {
                continue;
            }
            $title = trim((string) ($section['title'] ?? ''));
            $html  = trim((string) ($section['html'] ?? ''));
            if ($title === '' || $html === '') {
                continue;
            }
            $out[] = ['title' => $title, 'html' => $html];
        }
        return $out;
    }

    private static function cleanFaq($raw): array
    {
        $out = [];
        foreach (is_array($raw) ? $raw : [] as $pair) {
            if (!is_array($pair)) {
                continue;
            }
            $q = trim((string) ($pair['q'] ?? ''));
            $a = trim((string) ($pair['a'] ?? ''));
            if ($q === '' || $a === '') {
                continue;
            }
            $out[] = ['q' => $q, 'a' => $a];
        }
        return $out;
    }

    /**
     * Flat editor rows → engine equations.
     *
     * Every row in the editor is one direction: "given these other fields, here
     * is how to compute THIS one". Rows that share a formula-family label are
     * the same equation rearranged, which is exactly how the engine models
     * solving for any variable, so they become the `var` variants of one `eq`
     * entry. A row with no family label becomes a single-direction equation.
     *
     * @return array<int,array{formula:string,directions:array<int,array{l:string,f:string}>}>
     */
    private static function groupDirections($raw): array
    {
        $groups = [];
        $order  = [];
        foreach (is_array($raw) ? $raw : [] as $direction) {
            if (!is_array($direction)) {
                continue;
            }
            $lhs  = trim((string) ($direction['l'] ?? ''));
            $expr = trim((string) ($direction['f'] ?? ''));
            if ($lhs === '' && $expr === '') {
                continue;
            }
            $family = trim((string) ($direction['group'] ?? ''));
            $key    = $family !== '' ? 'f:' . $family : 's:' . count($order);
            if (!isset($groups[$key])) {
                $groups[$key] = ['formula' => $family, 'directions' => []];
                $order[] = $key;
            }
            $groups[$key]['directions'][] = ['l' => $lhs, 'f' => $expr];
        }
        $out = [];
        foreach ($order as $key) {
            $out[] = $groups[$key];
        }
        return $out;
    }

    /**
     * Stored equations → flat editor rows (the inverse of groupDirections), so
     * reopening a calculator shows the same rows the editor saved.
     *
     * @return array<int,array{group:string,l:string,f:string}>
     */
    private static function flattenEquations(array $equations): array
    {
        $out = [];
        foreach ($equations as $equation) {
            if (!is_array($equation)) {
                continue;
            }
            $family = trim((string) ($equation['formula'] ?? ''));
            foreach (($equation['directions'] ?? $equation['var'] ?? []) as $direction) {
                if (!is_array($direction)) {
                    continue;
                }
                $out[] = [
                    'group' => $family,
                    'l'     => (string) ($direction['l'] ?? ''),
                    'f'     => (string) ($direction['f'] ?? ''),
                ];
            }
        }
        return $out;
    }

    private static function snapshot(array $row, int $userId, string $note): void
    {
        if ($row === [] || !Db::hasTable('custom_calculator_versions')) {
            return;
        }
        $id = (int) ($row['id'] ?? 0);
        if ($id <= 0) {
            return;
        }
        $last = (int) Db::value('SELECT COALESCE(MAX(version), 0) FROM custom_calculator_versions WHERE calculator_id = ?', [$id], 0);
        Db::insert('custom_calculator_versions', [
            'calculator_id' => $id,
            'version'       => $last + 1,
            'snapshot'      => json_encode($row, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'note'          => mb_substr($note, 0, 190),
            'created_by'    => $userId,
            'created_at'    => date('Y-m-d H:i:s'),
        ]);
    }

    private static function decode(string $json, array $default): array
    {
        $decoded = json_decode($json, true);
        return is_array($decoded) ? $decoded : $default;
    }

    private static function cleanName(string $name): string
    {
        return class_exists(Data::class) ? Data::cleanName($name) : $name;
    }

    private static function num(float $value): string
    {
        if (abs($value - round($value)) < 1e-9) {
            return number_format($value, 0, '.', '');
        }
        return rtrim(rtrim(number_format($value, 6, '.', ''), '0'), '.');
    }
}

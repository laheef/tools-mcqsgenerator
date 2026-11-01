<?php
/**
 * CustomImport — add many custom calculators at once.
 *
 * Adding one calculator in the panel is a few minutes of typing; adding a whole
 * niche (20 social platforms, 40 games) should not be. This class takes the same
 * editor model the panel saves one record at a time and turns a pasted or
 * uploaded document into many rows.
 *
 * Accepted input
 * --------------
 *   * JSON array of editor records — the exact shape the editor posts:
 *
 *         [{
 *           "name": "Instagram Engagement Rate",
 *           "slug": "instagram-engagement-rate",
 *           "category_slug": "social-media",
 *           "summary": "…", "h1": "…",
 *           "meta_title": "…", "meta_description": "…",
 *           "status": "published",
 *           "fields":     [{"key":"likes","label":"Likes","type":"number","default":"1200"}],
 *           "directions": [{"group":"Engagement rate","l":"rate","f":"likes/followers*100"}],
 *           "sections":   [{"title":"…","html":"<p>…</p>"}],
 *           "faq":        [{"q":"…","a":"…"}]
 *         }, …]
 *
 *   * a single JSON object (imported as one record)
 *   * CSV with a header row — one row per calculator, `fields` and `directions`
 *     holding JSON (or the compact `key:Label:type:default` syntax)
 *   * harvested-style engine records (`vars` + `eq` + `groups`), so a definition
 *     produced offline by the harvester can be imported unchanged
 *
 * Everything goes through the same validation as the single-calculator editor:
 * a row is only written when `CustomCalc::save()` accepts it. A dry run validates
 * without writing, so a 200-row file can be checked before anything is created.
 */

declare(strict_types=1);

namespace Omni;

final class CustomImport
{
    /** Hard ceiling per import: a pasted document, not a data migration. */
    public const MAX_ROWS = 500;
    /*
     * Raised from 2 MB to 8 MB: the generated biology pack passed 2 MB with the
     * 206th calculator, and 8 MB matches the upload limit PHP is configured with
     * here and on the usual shared-hosting profile. The message is derived from
     * the constant so the two can never disagree again.
     */
    public const MAX_BYTES = 8_000_000;

    /** @var array<int,array> */
    private array $rows = [];
    private array $errors = [];
    private string $format = '';

    /**
     * Parse whatever was pasted or uploaded.
     *
     * @return array{ok:bool,format:string,rows:array<int,array>,errors:array<int,string>}
     */
    public static function parse(string $raw): array
    {
        $raw = trim($raw);
        if ($raw === '') {
            return ['ok' => false, 'format' => '', 'rows' => [], 'errors' => ['Nothing to import — paste JSON or CSV, or choose a file.']];
        }
        if (strlen($raw) > self::MAX_BYTES) {
            return ['ok' => false, 'format' => '', 'rows' => [], 'errors' => [
                'That document is larger than ' . self::humanSize(self::MAX_BYTES)
                . '. Split it into a few imports.']];
        }

        $first = substr(ltrim($raw), 0, 1);
        if ($first === '[' || $first === '{') {
            return self::parseJson($raw);
        }
        return self::parseCsv($raw);
    }

    /** Bytes as a short human label, for messages that quote the limit. */
    public static function humanSize(int $bytes): string
    {
        if ($bytes >= 1_000_000) {
            return rtrim(rtrim(number_format($bytes / 1_000_000, 1), '0'), '.') . ' MB';
        }
        return $bytes . ' bytes';
    }

    /* --------------------------------------------------------------- parsing */

    private static function parseJson(string $raw): array
    {
        $decoded = json_decode($raw, true);
        if (!is_array($decoded)) {
            return ['ok' => false, 'format' => 'json', 'rows' => [], 'errors' => [
                'That is not valid JSON: ' . json_last_error_msg() . '. A trailing comma or a smart quote is the usual cause.',
            ]];
        }
        // a single record, a list of records, or {calculators: [...]}
        if (isset($decoded['calculators']) && is_array($decoded['calculators'])) {
            $decoded = $decoded['calculators'];
        } elseif (isset($decoded['name']) || isset($decoded['slug'])) {
            $decoded = [$decoded];
        }

        $rows = [];
        $errors = [];
        foreach ($decoded as $index => $item) {
            if (!is_array($item)) {
                $errors[] = 'Row ' . ($index + 1) . ' is not an object.';
                continue;
            }
            $rows[] = self::normaliseRecord($item, (int) $index);
            if (count($rows) >= self::MAX_ROWS) {
                $errors[] = 'Only the first ' . self::MAX_ROWS . ' rows were read.';
                break;
            }
        }
        if ($rows === []) {
            $errors[] = 'The document contains no calculator objects.';
        }
        return ['ok' => $rows !== [], 'format' => 'json', 'rows' => $rows, 'errors' => $errors];
    }

    private static function parseCsv(string $raw): array
    {
        $lines = preg_split('~\r\n|\r|\n~', $raw) ?: [];
        $lines = array_values(array_filter($lines, static fn (string $l): bool => trim($l) !== ''));
        if (count($lines) < 2) {
            return ['ok' => false, 'format' => 'csv', 'rows' => [], 'errors' => [
                'A CSV import needs a header row and at least one data row.',
            ]];
        }

        $header = array_map(static fn (string $h): string => strtolower(trim($h, " \t\"'")), str_getcsv(array_shift($lines)));
        $known = ['name', 'slug', 'category_slug', 'category', 'summary', 'h1', 'meta_title',
                  'meta_description', 'status', 'icon', 'sort_order', 'fields', 'directions',
                  'sections', 'faq', 'js'];
        $missing = array_diff(['name', 'slug', 'category_slug'], array_map(
            static fn (string $h): string => $h === 'category' ? 'category_slug' : $h,
            $header
        ));
        if ($missing !== []) {
            return ['ok' => false, 'format' => 'csv', 'rows' => [], 'errors' => [
                'The header row is missing: ' . implode(', ', $missing) . '. Expected columns such as '
                . 'name,slug,category_slug,summary,status,fields,directions.',
            ]];
        }

        $rows = [];
        $errors = [];
        foreach ($lines as $index => $line) {
            if (count($rows) >= self::MAX_ROWS) {
                $errors[] = 'Only the first ' . self::MAX_ROWS . ' rows were read.';
                break;
            }
            $values = str_getcsv($line);
            $item = [];
            foreach ($header as $column => $key) {
                if (!in_array($key, $known, true)) {
                    continue;
                }
                $item[$key] = $values[$column] ?? '';
            }
            if (!isset($item['category_slug']) && isset($item['category'])) {
                $item['category_slug'] = $item['category'];
            }
            $rows[] = self::normaliseRecord($item, $index + 1, true);
        }
        return ['ok' => $rows !== [], 'format' => 'csv', 'rows' => $rows, 'errors' => $errors];
    }

    /**
     * One input record → the editor model CustomCalc understands.
     *
     * @param array $item   raw record
     * @param int   $index  position, for error messages
     * @param bool  $csv    CSV cells arrive as strings and need decoding
     */
    private static function normaliseRecord(array $item, int $index, bool $csv = false): array
    {
        $record = [
            'name'             => self::text($item['name'] ?? ''),
            'slug'             => self::text($item['slug'] ?? ''),
            'category_slug'    => self::text($item['category_slug'] ?? ($item['category'] ?? 'other')) ?: 'other',
            'h1'               => self::text($item['h1'] ?? ''),
            'meta_title'       => self::text($item['meta_title'] ?? ''),
            'meta_description' => self::text($item['meta_description'] ?? ''),
            'summary'          => self::text($item['summary'] ?? ''),
            'icon'             => self::text($item['icon'] ?? ''),
            'status'           => in_array(self::text($item['status'] ?? 'draft'), ['published', 'draft', 'archived'], true)
                ? self::text($item['status'] ?? 'draft') : 'draft',
            'is_featured'      => !empty($item['is_featured']) ? 1 : 0,
            'sort_order'       => (int) ($item['sort_order'] ?? 0),
            'noindex'          => !empty($item['noindex']) ? 1 : 0,
            'js'               => self::text($item['js'] ?? ''),
            'sections'         => self::listOf($item['sections'] ?? [], $csv),
            'faq'              => self::listOf($item['faq'] ?? [], $csv),
            'fields'           => [],
            'directions'       => [],
        ];

        // harvested-style engine record?
        if (!isset($item['fields']) && isset($item['vars'])) {
            [$record['fields'], $record['directions']] = self::fromEngine($item);
            return $record;
        }

        $fields = self::listOf($item['fields'] ?? [], $csv);
        foreach ($fields as $field) {
            // compact "key:Label:type:default" strings are accepted too
            if (is_string($field)) {
                $field = self::compactField($field);
            }
            if (isset($field[0]) && is_string($field[0]) && !isset($field['key'])) {
                $field = self::compactField((string) $field[0]);
            }
            if (!is_array($field)) {
                continue;
            }
            $record['fields'][] = $field;
        }

        $directions = self::listOf($item['directions'] ?? ($item['equations'] ?? []), $csv);
        foreach ($directions as $direction) {
            if (is_string($direction)) {
                $direction = self::compactDirection($direction);
            }
            if (isset($direction[0]) && is_string($direction[0]) && !isset($direction['l'])) {
                $direction = self::compactDirection((string) $direction[0]);
            }
            if (!is_array($direction)) {
                continue;
            }
            // a full engine equation ({formula, var:[…]}) becomes flat rows
            if (isset($direction['var']) && is_array($direction['var'])) {
                foreach ($direction['var'] as $variant) {
                    if (is_array($variant)) {
                        $record['directions'][] = [
                            'group' => self::text($direction['formula'] ?? ''),
                            'l'     => self::text($variant['l'] ?? ''),
                            'f'     => self::text($variant['f'] ?? ''),
                        ];
                    }
                }
                continue;
            }
            $record['directions'][] = $direction;
        }

        return $record;
    }

    /** `key:Label:type:default` → a field row. */
    private static function compactField(string $raw): array
    {
        $parts = array_map('trim', explode(':', $raw));
        return [
            'key'     => $parts[0] ?? '',
            'label'   => $parts[1] ?? ($parts[0] ?? ''),
            'type'    => $parts[2] ?? 'number',
            'default' => $parts[3] ?? '',
            'output'  => !empty($parts[4]) && !in_array(strtolower($parts[4]), ['0', 'no', 'false'], true),
        ];
    }

    /** `key=expression[:family]` → a direction row. */
    private static function compactDirection(string $raw): array
    {
        [$lhs, $rest] = array_pad(explode('=', $raw, 2), 2, '');
        $family = '';
        if (str_contains($rest, '::')) {
            [$rest, $family] = explode('::', $rest, 2);
        }
        return ['group' => trim($family), 'l' => trim($lhs), 'f' => trim($rest)];
    }

    /**
     * A harvested definition (`vars` + `groups` + `datasets` + `eq`) → editor rows.
     *
     * @return array{0:array<int,array>,1:array<int,array>}
     */
    private static function fromEngine(array $item): array
    {
        $labels = [];
        $order  = [];
        $unitOf = [];
        $optionsOf = [];
        foreach (($item['groups'] ?? []) as $group) {
            foreach (($group['m'] ?? []) as $matrix) {
                foreach (($matrix[1] ?? []) as $column) {
                    foreach (($column ?? []) as $field) {
                        if (!is_array($field) || ($field['t'] ?? '') !== 'v') {
                            continue;
                        }
                        $name = self::text($field['n'] ?? '');
                        if ($name === '') {
                            continue;
                        }
                        $labels[$name] = self::text($field['l'] ?? $name);
                        $order[] = $name;
                        if (!empty($field['us'])) {
                            $unitOf[$name] = (string) $field['us'];
                        }
                        if (!empty($field['ds'])) {
                            $optionsOf[$name] = (string) $field['ds'];
                        }
                    }
                }
            }
        }

        $targets = [];
        foreach (($item['eq'] ?? []) as $equation) {
            foreach (($equation['var'] ?? []) as $variant) {
                if (is_array($variant) && isset($variant['l'])) {
                    $targets[(string) $variant['l']] = true;
                }
            }
        }

        $fields = [];
        foreach (($item['vars'] ?? []) as $name => $def) {
            $name = (string) $name;
            if (!in_array($name, $order, true)) {
                $order[] = $name;
            }
            if (!isset($labels[$name])) {
                $labels[$name] = ucfirst(str_replace('_', ' ', $name));
            }
            $type = ($def['type'] ?? '') === 'valueSelect' ? 'select' : (isset($unitOf[$name]) ? 'number_unit' : 'number');
            $default = '';
            $defaults = $def['dfl'] ?? $def['defaults'] ?? [];
            if (is_array($defaults) && isset($defaults[0]['v'])) {
                $default = (string) $defaults[0]['v'];
            } elseif (is_array($defaults) && isset($defaults[0]['value'])) {
                $default = (string) $defaults[0]['value'];
            }
            $options = '';
            $ds = (string) ($def['ds'] ?? ($optionsOf[$name] ?? ''));
            if ($type === 'select' && $ds !== '' && isset($item['datasets'][$ds]['options'])) {
                $lines = [];
                foreach ($item['datasets'][$ds]['options'] as $option) {
                    if (!is_array($option)) {
                        continue;
                    }
                    $lines[] = self::text($option['label'] ?? '') . '|' . self::text($option['value'] ?? '');
                }
                $options = implode("\n", $lines);
            }
            $fields[] = [
                'key'          => $name,
                'label'        => $labels[$name],
                'type'         => $type,
                'default'      => $default,
                'unit_group'   => $unitOf[$name] ?? '',
                'unit_default' => '',
                'help'         => '',
                'prefix'       => '',
                'suffix'       => '',
                'options'      => $options,
                'output'       => isset($targets[$name]),
            ];
        }

        $directions = [];
        foreach (($item['eq'] ?? []) as $equation) {
            $family = self::text($equation['formula'] ?? '');
            foreach (($equation['var'] ?? []) as $variant) {
                if (!is_array($variant)) {
                    continue;
                }
                $directions[] = [
                    'group' => $family,
                    'l'     => self::text($variant['l'] ?? ''),
                    'f'     => self::text($variant['f'] ?? ''),
                ];
            }
        }

        return [$fields, $directions];
    }

    /**
     * A JSON cell or an already-decoded list.
     *
     * @return array<int,mixed>
     */
    private static function listOf(mixed $value, bool $csv): array
    {
        if (is_array($value)) {
            return array_values($value);
        }
        if (!is_string($value)) {
            return [];
        }
        $value = trim($value);
        if ($value === '') {
            return [];
        }
        $decoded = json_decode($value, true);
        if (is_array($decoded)) {
            return array_values($decoded);
        }
        // semicolon-separated compact syntax
        $out = [];
        foreach (preg_split('~\s*;\s*~', $value) ?: [] as $part) {
            if (trim($part) !== '') {
                $out[] = trim($part);
            }
        }
        return $out;
    }

    private static function text(mixed $value): string
    {
        return is_scalar($value) ? trim((string) $value) : '';
    }

    /* ----------------------------------------------------------- validation */

    /**
     * Validate every row without writing anything.
     *
     * @param array<int,array> $rows
     * @param string           $mode  'skip' (leave an existing slug alone) or 'update'
     * @return array{rows:array<int,array>,ok:int,failed:int,warnings:array<int,string>}
     */
    /**
     * An import row in the shape CustomCalc::editorModel() and CustomArticle use.
     *
     * Import rows carry `directions`; rows loaded from the database carry
     * `equations`, so both keys are filled in before anything is compiled.
     */
    private static function asModel(array $row): array
    {
        $model = CustomCalc::editorModel(null);
        foreach (array_keys($model) as $key) {
            if (array_key_exists($key, $row)) {
                $model[$key] = $row[$key];
            }
        }
        $model['directions'] = $row['directions'] ?? $row['equations'] ?? [];
        return $model;
    }

    public static function preview(array $rows, string $mode = 'skip'): array
    {
        $out = [];
        $ok = 0;
        $failed = 0;
        $warnings = [];
        $seen = [];
        $id = 0;

        foreach ($rows as $index => $row) {
            $id++;
            $path = '/' . CustomCalc::slugify((string) ($row['category_slug'] ?? 'other'))
                . '/' . CustomCalc::slugify((string) ($row['slug'] ?? ''));
            $existing = CustomCalc::findByPath($path);
            $action = 'create';
            if ($existing !== null) {
                $action = $mode === 'update' ? 'update' : 'skip';
            }
            if (isset($seen[$path])) {
                $action = 'duplicate';
            }
            $seen[$path] = true;

            $entry = [
                'line'     => $index + 1,
                'name'     => (string) ($row['name'] ?? ''),
                'path'     => $path,
                'action'   => $action,
                'errors'   => [],
                'warnings' => [],
                'calculated' => [],
                'words'    => str_word_count(strip_tags((string) ($row['summary'] ?? ''))),
            ];
            if ($entry['words'] < 150 && $action !== 'duplicate') {
                $entry['warnings'][] = 'Only ' . $entry['words'] . ' words of prose — tick “draft missing articles” to have one written from the fields and formulas.';
            }

            if ($action === 'skip') {
                $entry['warnings'][] = 'A calculator already lives at ' . $path . ' — it will be left alone.';
            } elseif ($action === 'duplicate') {
                $entry['errors'][] = 'Another row in this file also creates ' . $path . '.';
            } else {
                $compiled = CustomCalc::compile($row);
                $entry['errors'] = $compiled['errors'];
                foreach (CustomCalc::slugConflicts(
                    CustomCalc::slugify((string) ($row['slug'] ?? '')),
                    CustomCalc::slugify((string) ($row['category_slug'] ?? 'other')) ?: 'other',
                    $action === 'update' ? (int) ($existing['id'] ?? 0) : 0
                ) as $conflict) {
                    $entry['errors'][] = $conflict;
                }

                if ($entry['errors'] === []) {
                    $test = CustomCalc::testModel($row);
                    $entry['errors'] = $test['errors'];
                    $entry['warnings'] = array_merge($entry['warnings'], $test['warnings']);
                    foreach ($test['outputs'] as $name => $output) {
                        $entry['calculated'][] = $output['label'] . ' = ' . $output['value'];
                    }
                    foreach ($test['unknown'] as $label) {
                        $entry['warnings'][] = 'Nothing calculates “' . $label . '” from the defaults.';
                    }
                }
            }

            if ($entry['errors'] === [] && $action !== 'duplicate') {
                $ok++;
            } elseif ($entry['errors'] !== []) {
                $failed++;
            }
            $out[] = $entry;
        }

        return ['rows' => $out, 'ok' => $ok, 'failed' => $failed, 'warnings' => $warnings];
    }

    /* --------------------------------------------------------------- import */

    /**
     * Write every row that validates. Rows that fail are reported and skipped —
     * a single bad row never blocks the rest of the file.
     *
     * @return array{created:array<int,string>,updated:array<int,string>,skipped:array<int,string>,failed:array<int,array>,errors:array<int,string>}
     */
    public static function run(array $rows, string $mode, int $userId, bool $draftArticles = false): array
    {
        $result = ['created' => [], 'updated' => [], 'skipped' => [], 'failed' => [], 'errors' => [], 'drafted' => []];
        $preview = self::preview($rows, $mode);

        foreach ($preview['rows'] as $position => $entry) {
            $row = $rows[$position] ?? null;
            if ($row === null) {
                continue;
            }
            if ($entry['action'] === 'skip') {
                $result['skipped'][] = $entry['path'];
                continue;
            }
            if ($entry['errors'] !== []) {
                $result['failed'][] = [
                    'line'   => $entry['line'],
                    'name'   => $entry['name'],
                    'path'   => $entry['path'],
                    'errors' => $entry['errors'],
                ];
                continue;
            }
            /*
             * A row that arrives with fields and formulas but no prose would be a
             * thin page. When the caller asked for it, draft the article from the
             * definition before saving — the same text the editor's "Draft the
             * article" button produces, and it still goes through validation.
             */
            $draftedWords = null;
            if ($draftArticles) {
                $model = self::asModel($row);
                $empty = trim((string) ($model['summary'] ?? '')) === ''
                    && ($model['sections'] ?? []) === []
                    && ($model['faq'] ?? []) === [];
                $hasSections = ($model['sections'] ?? []) !== [] && ($model['faq'] ?? []) !== [];
                if ($empty || !$hasSections) {
                    $article = CustomArticle::draft($model);
                    $row = CustomArticle::merge($model, $article, false);
                    $draftedWords = (int) $article['words'];
                    $result['drafted'][] = $entry['path'];
                }
            }

            $existing = CustomCalc::findByPath($entry['path']);
            $save = CustomCalc::save(
                $existing === null ? null : (int) $existing['id'],
                $row,
                $userId,
                $draftedWords
            );
            if (!$save['ok']) {
                $result['failed'][] = [
                    'line'   => $entry['line'],
                    'name'   => $entry['name'],
                    'path'   => $entry['path'],
                    'errors' => $save['errors'],
                ];
                continue;
            }
            if ($entry['action'] === 'update') {
                $result['updated'][] = $entry['path'];
            } else {
                $result['created'][] = $entry['path'];
            }
        }

        return $result;
    }

    /** A ready-to-fill example, shown in the panel so the format is never a guess. */
    public static function example(): string
    {
        return <<<'JSON'
[
  {
    "name": "Instagram Engagement Rate",
    "slug": "instagram-engagement-rate",
    "category_slug": "social-media",
    "h1": "Instagram Engagement Rate Calculator",
    "meta_title": "Instagram Engagement Rate Calculator",
    "meta_description": "Work out your engagement rate from likes, comments and followers.",
    "summary": "Engagement rate is the interactions a post earns divided by the audience that could see it.",
    "status": "draft",
    "fields": [
      {"key": "likes", "label": "Average likes", "type": "number", "default": "850"},
      {"key": "comments", "label": "Average comments", "type": "number", "default": "45"},
      {"key": "followers", "label": "Followers", "type": "number", "default": "12000"},
      {"key": "rate", "label": "Engagement rate", "type": "number", "suffix": "%", "output": true},
      {"key": "posts_needed", "label": "Posts needed for 100 interactions", "type": "number", "output": true}
    ],
    "directions": [
      {"group": "Engagement rate", "l": "rate", "f": "(likes+comments)/followers*100"},
      {"group": "Engagement rate", "l": "followers", "f": "(likes+comments)/rate*100"},
      {"group": "Posts needed", "l": "posts_needed", "f": "100/(likes+comments)"}
    ],
    "sections": [
      {"title": "How it is calculated", "html": "<p>Add likes and comments, divide by followers, multiply by 100.</p>"}
    ],
    "faq": [
      {"q": "What is a good engagement rate?", "a": "Around 1–5% is typical; above 5% is strong."}
    ]
  }
]
JSON;
    }
}

<?php
/**
 * CustomArticle — draft the article for a calculator built in the panel.
 *
 * The 3,831 harvested pages each ship prose written from their own definition
 * (see tools/generate_content.py). A calculator created in the panel would
 * otherwise be the only kind of page on the site with a form and no explanation,
 * which is exactly the thin page a search engine ignores.
 *
 * So this class writes a first draft the same way: only from what the definition
 * actually says — the labels on its fields, the units it accepts, the options in
 * its lists, the relationships in its equations, and the numbers the real solver
 * returns for those fields' default values. Nothing is copied from anywhere and
 * nothing is asserted that the model cannot support: it describes the arithmetic,
 * it does not invent advice, benchmarks or medical/financial claims.
 *
 * The draft is a *starting point*. The editor puts it in the form, unsaved, so a
 * human reviews and rewrites it before publishing. `draft()` is deterministic for
 * a given definition (the wording is seeded from the slug), so pressing the
 * button twice does not produce a different article.
 */

declare(strict_types=1);

namespace Onim;

final class CustomArticle
{
    /** Words per section we aim for, so a draft is never a three-line stub. */
    private const TARGET_WORDS = 650;

    /**
     * Build a draft from the editor model.
     *
     * @return array{summary:string,sections:array<int,array{title:string,html:string}>,faq:array<int,array{q:string,a:string}>,words:int,notes:array<int,string>}
     */
    public static function draft(array $model): array
    {
        $compiled = CustomCalc::compile($model);
        $record   = $compiled['record'];

        $name    = trim((string) ($model['name'] ?? 'Calculator')) ?: 'Calculator';
        $slug    = (string) ($model['slug'] ?? '');
        $category = (string) ($model['category_slug'] ?? 'other');
        $fields  = self::fields($model);
        $families = self::families($model);

        $rng = new Picker($slug !== '' ? $slug : $name);

        /* which fields the visitor fills in and which are answers */
        $inputs  = [];
        $outputs = [];
        foreach ($fields as $field) {
            if ($field['output']) {
                $outputs[] = $field;
            } else {
                $inputs[] = $field;
            }
        }
        /* a field can be an answer in one direction and an input in another */
        $targets = [];
        foreach ($families as $family) {
            foreach ($family['directions'] as $direction) {
                $targets[$direction['l']] = true;
            }
        }
        foreach ($fields as $field) {
            if (!$field['output'] && isset($targets[$field['key']])) {
                $outputs[] = $field;
            }
        }

        $primary = $outputs[0] ?? ($outputs[0] ?? null);
        $primaryLabel = $primary !== null ? $primary['label'] : 'the result';

        $example = self::workedExample($record, $fields, $targets);

        $summary  = self::summary($name, $category, $inputs, $primaryLabel, $rng, $families);
        $sections = [];
        $notes    = [];

        $sections[] = self::howItWorks($name, $fields, $families, $primaryLabel, $rng);
        $sections[] = self::whatYouEnter($name, $inputs, $rng);
        if ($example['lines'] !== []) {
            $sections[] = self::workedExampleSection($name, $example, $rng);
        }
        $sections[] = self::readingTheAnswer($name, $outputs, $primaryLabel, $rng);
        $sections[] = self::unitsAndPrecision($fields, $rng);
        $sections[] = self::categoryNote($name, $category, $inputs, $rng);

        $faq = self::faq($name, $fields, $families, $inputs, $outputs, $primaryLabel, $example, $rng);

        /* drop empty sections and keep the prose honest about length */
        $sections = array_values(array_filter($sections, static function (array $section): bool {
            return $section['title'] !== '' && trim(strip_tags($section['html'])) !== '';
        }));

        $words = str_word_count(strip_tags($summary))
            + array_sum(array_map(static fn (array $s): int => str_word_count(strip_tags($s['html'])), $sections))
            + array_sum(array_map(static fn (array $f): int => str_word_count(strip_tags($f['a'])), $faq));

        if ($words < 350) {
            $notes[] = 'The draft is short because the calculator has few fields and one equation. Add a section of your own about how you expect people to use it.';
        }
        if ($outputs === []) {
            $notes[] = 'No field is marked as an answer, so the draft cannot describe a result. Tick “this is an answer” on at least one field.';
        }
        $notes[] = 'Generated text describes the arithmetic only. Add anything specific to your niche — what a good result looks like, what to do with it — before you publish.';

        return [
            'summary'  => $summary,
            'sections' => $sections,
            'faq'      => $faq,
            'words'    => $words,
            'notes'    => $notes,
        ];
    }

    /** Merge a draft into an existing model without destroying written text. */
    public static function merge(array $model, array $draft, bool $replace = false): array
    {
        if ($replace) {
            $model['summary']  = $draft['summary'];
            $model['sections'] = $draft['sections'];
            $model['faq']      = $draft['faq'];
            return $model;
        }
        if (trim((string) ($model['summary'] ?? '')) === '') {
            $model['summary'] = $draft['summary'];
        }
        $sections = is_array($model['sections'] ?? null) ? $model['sections'] : [];
        $existingTitles = [];
        foreach ($sections as $section) {
            $existingTitles[mb_strtolower(trim((string) ($section['title'] ?? '')))] = true;
        }
        foreach ($draft['sections'] as $section) {
            $key = mb_strtolower(trim($section['title']));
            if (!isset($existingTitles[$key])) {
                $sections[] = $section;
                $existingTitles[$key] = true;
            }
        }
        $model['sections'] = array_values($sections);

        $faq = is_array($model['faq'] ?? null) ? $model['faq'] : [];
        $questions = [];
        foreach ($faq as $pair) {
            $questions[mb_strtolower(trim((string) ($pair['q'] ?? '')))] = true;
        }
        foreach ($draft['faq'] as $pair) {
            $key = mb_strtolower(trim($pair['q']));
            if (!isset($questions[$key])) {
                $faq[] = $pair;
                $questions[$key] = true;
            }
        }
        $model['faq'] = array_values($faq);
        return $model;
    }

    /* ---------------------------------------------------------------- parts */

    /** @return array<int,array> the editor's normalised field rows */
    private static function fields(array $model): array
    {
        $fields = [];
        foreach (is_array($model['fields'] ?? null) ? $model['fields'] : [] as $field) {
            if (!is_array($field) || trim((string) ($field['key'] ?? '')) === '') {
                continue;
            }
            $fields[] = [
                'key'      => (string) $field['key'],
                'label'    => trim((string) ($field['label'] ?? '')) ?: ucfirst(str_replace('_', ' ', (string) $field['key'])),
                'type'     => (string) ($field['type'] ?? 'number'),
                'default'  => trim((string) ($field['default'] ?? '')),
                'help'     => trim((string) ($field['help'] ?? '')),
                'prefix'   => trim((string) ($field['prefix'] ?? '')),
                'suffix'   => trim((string) ($field['suffix'] ?? '')),
                'unit_group' => trim((string) ($field['unit_group'] ?? '')),
                'options'  => CustomCalc::optionsToText($field['options'] ?? ''),
                'output'   => !empty($field['output']),
            ];
        }
        return $fields;
    }

    /** @return array<int,array{family:string,directions:array<int,array{l:string,f:string}>}> */
    private static function families(array $model): array
    {
        $groups = [];
        $order  = [];
        foreach (is_array($model['directions'] ?? null) ? $model['directions'] : [] as $row) {
            if (!is_array($row)) {
                continue;
            }
            $lhs = trim((string) ($row['l'] ?? ''));
            $rhs = trim((string) ($row['f'] ?? ''));
            if ($lhs === '' || $rhs === '') {
                continue;
            }
            $family = trim((string) ($row['group'] ?? ''));
            $key = $family !== '' ? 'f:' . $family : 's:' . $lhs;
            if (!isset($groups[$key])) {
                $groups[$key] = ['family' => $family, 'directions' => []];
                $order[] = $key;
            }
            $groups[$key]['directions'][] = ['l' => $lhs, 'f' => $rhs];
        }
        $out = [];
        foreach ($order as $key) {
            $out[] = $groups[$key];
        }
        return $out;
    }

    /**
     * Run the definition through the real solver with its own defaults and keep
     * the numbers, so the worked example is a fact rather than a made-up one.
     *
     * @return array{lines:array<int,string>,inputs:array<int,array{label:string,value:string}>,outputs:array<int,array{label:string,value:string}>,computed:bool}
     */
    private static function workedExample(array $record, array $fields, array $targets): array
    {
        $out = ['lines' => [], 'inputs' => [], 'outputs' => [], 'computed' => false];
        if ($record === [] || ($record['vars'] ?? []) === []) {
            return $out;
        }

        $calc  = Shape::fromRecord($record, null, []);
        $units = Data::units();

        /* the values a visitor would find when the page opens */
        $inputs = [];
        foreach ($record['vars'] as $name => $def) {
            $name = (string) $name;
            if (isset($targets[$name])) {
                continue;
            }
            if (($def['type'] ?? '') === 'valueSelect') {
                $option = $record['datasets'][$def['ds'] ?? '']['options'][0]['uid'] ?? null;
                if ($option !== null) {
                    $inputs[$name] = $option;
                }
                continue;
            }
            $default = $def['dfl'][0]['v'] ?? null;
            if (is_numeric($default)) {
                $inputs[$name] = (float) $default;
            }
        }

        $labels = [];
        foreach ($fields as $field) {
            $labels[$field['key']] = $field['label'];
        }

        try {
            $solver = Solver::solve($calc, $inputs, $units);
        } catch (\Throwable $e) {
            return $out;
        }

        foreach ($inputs as $name => $value) {
            if (!is_numeric($value)) {
                continue;
            }
            $out['inputs'][] = [
                'label' => $labels[$name] ?? (string) $name,
                'value' => self::number((float) $value),
            ];
        }
        foreach (array_keys($targets) as $name) {
            $value = $solver->value((string) $name);
            /* only report what the page actually derived: a field that was also
               supplied as an input is not a result, it is the visitor's own value */
            if ($value === null || empty($solver->computed[(string) $name])) {
                continue;
            }
            $field = null;
            foreach ($fields as $candidate) {
                if ($candidate['key'] === (string) $name) {
                    $field = $candidate;
                    break;
                }
            }
            $label = $field['label'] ?? (string) $name;
            $suffix = $field['suffix'] ?? '';
            $glued = in_array($suffix, ['%', '‰', '°', '°C', '°F', '"', "'"], true);
            $out['outputs'][] = [
                'label' => $label,
                'value' => self::number($value) . ($suffix === '' ? '' : ($glued ? $suffix : ' ' . $suffix)),
            ];
            $out['computed'] = true;
        }

        if ($out['outputs'] !== []) {
            $in = [];
            foreach ($out['inputs'] as $input) {
                $in[] = self::lower($input['label']) . ' of ' . $input['value'];
            }
            $res = [];
            foreach ($out['outputs'] as $output) {
                $res[] = self::lower($output['label']) . ' of ' . $output['value'];
            }
            $out['lines'][] = ($in !== [] ? 'With ' . self::joinList($in) . ' the calculator returns ' : 'The calculator returns ')
                . self::joinList($res) . '.';
        }

        return $out;
    }

    /* ------------------------------------------------------------- sections */

    private static function summary(string $name, string $category, array $inputs, string $primaryLabel, Picker $rng, array $families): string
    {
        $in = array_values(array_filter($inputs, static fn (array $f): bool => $f['type'] !== 'checkbox'));
        $labels = [];
        foreach (array_slice($in, 0, 4) as $field) {
            $labels[] = self::lower($field['label']);
        }
        $list = self::joinList($labels);
        $niche = str_replace('-', ' ', $category);

        $parts = [];
        if ($list !== '') {
            $parts[] = $rng->pick([
                'The ' . $name . ' works out <strong>' . self::lower($primaryLabel) . '</strong> from '
                    . $list . ', so the answer follows the numbers you type instead of a fixed table.',
                'Enter ' . $list . ' and the ' . $name . ' reports <strong>' . self::lower($primaryLabel)
                    . '</strong> straight away, showing the relationship it used rather than just the total.',
                'This page turns ' . $list . ' into <strong>' . self::lower($primaryLabel)
                    . '</strong>. Every box is editable and any one of them can be left blank for the page to solve.',
            ]);
        } else {
            $parts[] = 'The ' . $name . ' works out <strong>' . self::lower($primaryLabel)
                . '</strong> from the values on the form, with the arithmetic printed underneath.';
        }

        $multi = 0;
        foreach ($families as $family) {
            $multi += count($family['directions']) > 1 ? 1 : 0;
        }
        if ($multi > 0) {
            $parts[] = $rng->pick([
                'The relationship is reversible, so you can fill in the answer and work backwards to any input.',
                'Because the same relationship is rearranged for each field, starting from the result and solving for an input works too.',
                'Nothing here is one-way: supply the result instead of one of the inputs and the page solves for what is missing.',
            ]);
        }
        $parts[] = 'It is free, needs no account, and ' . ($niche !== '' && $niche !== 'other'
            ? 'sits with the other ' . $niche . ' tools on the site.'
            : 'sits alongside the rest of the calculators on the site.');

        return implode(' ', $parts);
    }

    private static function howItWorks(string $name, array $fields, array $families, string $primaryLabel, Picker $rng): array
    {
        $labels = [];
        foreach ($fields as $field) {
            $labels[$field['key']] = $field['label'];
        }

        $html = [];
        $html[] = '<p>' . $rng->pick([
            'The calculator keeps one relationship and rearranges it for whichever value is missing, which is why no box is compulsory.',
            'One relationship drives the whole page: the page tracks which values you have supplied and solves for the rest.',
            'Everything on the page comes from a single relationship, solved for whichever value you left empty.',
        ]) . '</p>';

        if ($families === []) {
            $html[] = '<p>The definition has no formula yet, so this section will describe the calculation once one is added.</p>';
            return ['title' => 'How ' . $name . ' works', 'html' => implode("\n", $html)];
        }

        $shown = 0;
        foreach ($families as $family) {
            $shown++;
            $title = $family['family'] !== '' ? $family['family'] : 'The relationship';
            $first = $family['directions'][0];
            $pretty = self::prettyFormula($first['f'], $labels);
            $html[] = '<p><strong>' . self::escape($title) . '</strong>. '
                . self::escape($labels[$first['l']] ?? $first['l']) . ' = <code>'
                . self::escape($pretty) . '</code></p>';

            $solveFor = [];
            foreach (array_slice($family['directions'], 1) as $direction) {
                $solveFor[] = self::lower($labels[$direction['l']] ?? $direction['l']);
            }
            if ($solveFor !== []) {
                $html[] = '<p>' . $rng->pick([
                    'The same equation is also rearranged so the page can solve for ',
                    'It is inverted as well, which lets you supply the result and get ',
                    'Rearranged, it will also give you ',
                ]) . self::joinList($solveFor) . '.</p>';
            }
        }

        if ($shown > 1) {
            $html[] = '<p>' . $rng->pick([
                'Where a page carries more than one relationship, each one only fires when the values it needs are known, so unrelated boxes do not interfere with each other.',
                'Each relationship above is independent: it runs when its own inputs are known, and boxes that belong to another relationship are ignored.',
            ]) . '</p>';
        }

        return ['title' => 'How ' . $name . ' works', 'html' => implode("\n", $html)];
    }

    private static function whatYouEnter(string $name, array $inputs, Picker $rng): array
    {
        $html = [];
        $html[] = '<p>' . $rng->pick([
            'These are the values the page asks for. Every one of them can be left alone if you would rather supply the answer and get it solved instead.',
            'The form asks for the following. None of them is required: fill in what you know and leave the rest to the calculator.',
        ]) . '</p>';

        $items = [];
        foreach ($inputs as $field) {
            $line = '<strong>' . self::escape($field['label']) . '</strong>';
            if ($field['type'] === 'checkbox') {
                $line .= ' — an on/off switch';
            } elseif ($field['type'] === 'select' && $field['options'] !== '') {
                $options = [];
                foreach (preg_split('~\r\n|\r|\n~', $field['options']) ?: [] as $option) {
                    $parts = explode('|', $option);
                    if (trim($parts[0]) !== '') {
                        $options[] = self::escape(trim($parts[0]));
                    }
                }
                $line .= ' — one of: ' . implode(', ', array_slice($options, 0, 6))
                    . (count($options) > 6 ? '…' : '');
            } elseif ($field['unit_group'] !== '') {
                $line .= ' — a quantity with a unit switcher, so you can enter it in whatever unit you have to hand';
            } else {
                $line .= ' — a plain number';
            }
            if ($field['help'] !== '') {
                $line .= '. ' . self::escape($field['help']);
            }
            $items[] = $line;
        }
        if ($items !== []) {
            $html[] = '<ul><li>' . implode('</li><li>', $items) . '</li></ul>';
        }

        return ['title' => 'What you need to enter', 'html' => implode("\n", $html)];
    }

    private static function workedExampleSection(string $name, array $example, Picker $rng): array
    {
        $html = [];
        $in = [];
        foreach ($example['inputs'] as $input) {
            $in[] = self::lower($input['label']) . ' of <strong>' . self::escape($input['value']) . '</strong>';
        }
        $out = [];
        foreach ($example['outputs'] as $output) {
            $out[] = self::lower($output['label']) . ' of <strong>' . self::escape($output['value']) . '</strong>';
        }

        if ($in !== [] && $out !== []) {
            $html[] = '<p>With ' . self::joinList($in) . ' — the values the page opens with — the calculator returns '
                . self::joinList($out) . '. Those numbers are produced by the same solver the page runs in your browser, '
                . 'not typed in as an illustration, so changing one box moves the result in exactly the way the arithmetic says it should.</p>';
        } elseif ($out !== []) {
            $html[] = '<p>With the values the page opens with, the calculator returns ' . self::joinList($out) . '.</p>';
        }

        $html[] = '<p>' . $rng->pick([
            'Try it the other way round: type your own answer into the result box, clear one of the inputs and watch the page solve for it.',
            'The example is also a way to check you are entering the right thing — substitute your own figures and the result should move in a direction you can predict from the formula above.',
        ]) . '</p>';

        return ['title' => 'A worked example', 'html' => implode("\n", $html)];
    }

    private static function readingTheAnswer(string $name, array $outputs, string $primaryLabel, Picker $rng): array
    {
        $html = [];
        if ($outputs === []) {
            $html[] = '<p>The definition does not mark any field as an answer yet, so the page has nothing to report. '
                . 'Tick “this is an answer” on a field to make it a result.</p>';
            return ['title' => 'Reading the result', 'html' => implode("\n", $html)];
        }

        $labels = [];
        foreach ($outputs as $field) {
            $labels[] = self::lower($field['label']);
        }
        $html[] = '<p>The result panel shows ' . self::joinList(array_slice($labels, 0, 4))
            . '. ' . $rng->pick([
                'A value that keeps changing while you type is normal: every keystroke re-solves the relationship, and a half-typed number is still a number.',
                'Nothing is submitted anywhere — the answer is recalculated locally each time an input changes, so a typo is corrected in place.',
            ]) . '</p>';

        $html[] = '<p>' . $rng->pick([
            'If a result looks wrong, check the units first: mixing two different units in one calculation is the most common way to get a number that is out by a large factor.',
            'When a number surprises you, compare it with a value you already know before suspecting the formula — most disagreements turn out to be a unit or an off-by-one-figure input.',
        ]) . '</p>';

        return ['title' => 'Reading the result', 'html' => implode("\n", $html)];
    }

    private static function unitsAndPrecision(array $fields, Picker $rng): array
    {
        $unitFields = array_values(array_filter($fields, static fn (array $f): bool => $f['unit_group'] !== ''));
        $hasSuffix = false;
        foreach ($fields as $field) {
            if ($field['suffix'] !== '' || $field['prefix'] !== '') {
                $hasSuffix = true;
                break;
            }
        }
        if ($unitFields === [] && !$hasSuffix) {
            return ['title' => '', 'html' => ''];
        }

        $html = [];
        if ($unitFields !== []) {
            $names = [];
            foreach ($unitFields as $field) {
                $names[] = self::lower($field['label']);
            }
            $html[] = '<p>' . self::joinList($names) . ' can be entered in more than one unit. '
                . 'The calculation happens in a single base unit behind the scenes, so the answer does not change when you switch the unit in the dropdown — only the way the number is written does.</p>';
        }
        $html[] = '<p>' . $rng->pick([
            'Results are rounded for display. Repeating the calculation with the unrounded value can differ in the last digit, which is rounding rather than a second answer.',
            'The page rounds what it shows. If you need more digits, copy the value into a spreadsheet before rounding it further — the underlying number is kept at full precision.',
        ]) . '</p>';

        return ['title' => 'Units and rounding', 'html' => implode("\n", $html)];
    }

    private static function categoryNote(string $name, string $category, array $inputs, Picker $rng): array
    {
        $notes = [
            'finance' => 'Money figures are treated as plain numbers: the calculator does not know about tax bands, fees or rounding conventions, so enter the amounts as they apply to your case and read the result as an estimate of the arithmetic, not as advice.',
            'health' => 'This is an arithmetic tool, not a diagnosis. It applies the relationship above to the figures you enter and nothing else; for anything that affects a decision about your health, take the number to a professional.',
            'gaming' => 'Game data changes with patches, but the arithmetic here does not: the relationships are the ones the scoreboard itself uses, so as long as the numbers you enter match what the game shows, the result stays meaningful across updates.',
            'social-media' => 'Platform analytics define their own metrics, and two screens can disagree about the same account. Enter the figures exactly as the app reports them, and compare results taken the same way rather than across different screens.',
            'sports' => 'Statistics depend on how a competition records them, so keep the source consistent: mixing figures from two different providers is more likely to explain an odd result than the formula is.',
            'math' => 'The arithmetic is exact up to the rounding shown; if you are working something out for an exam, reproduce the steps above rather than copying the output.',
            'physics' => 'Units matter more than the digits. The base units behind the switchers keep the multiplication consistent, but a value entered in the wrong quantity will still produce a wrong answer.',
            'chemistry' => 'Concentrations, masses and volumes are only comparable when they are expressed in the same basis, which is what the unit switchers are for.',
            'construction' => 'Material estimates ignore waste, overlaps and supplier rounding unless you add them yourself — enter the figures you will actually buy and treat the result as a starting quantity.',
            'other' => 'The page applies the relationship above and nothing else, so enter the figures in the form they are measured in and read the result as the output of that arithmetic.',
        ];
        $note = $notes[$category] ?? $notes['other'];

        return [
            'title' => 'Things to watch for',
            'html'  => '<p>' . self::escape($note) . '</p>'
                . '<p>' . $rng->pick([
                    'Keep a note of the figures you entered alongside the result — a number without its inputs is hard to check later.',
                    'If you are comparing two scenarios, change one input at a time; changing several at once makes it impossible to tell which one moved the answer.',
                ]) . '</p>',
        ];
    }

    /* ------------------------------------------------------------------ faq */

    private static function faq(string $name, array $fields, array $families, array $inputs, array $outputs, string $primaryLabel, array $example, Picker $rng): array
    {
        $faq = [];
        $primary = $outputs[0] ?? null;

        if ($primary !== null) {
            $faq[] = [
                'q' => 'How is ' . self::lower($primary['label']) . ' calculated?',
                'a' => self::faqHow($primary, $fields, $families),
            ];
        }

        $multi = [];
        foreach ($families as $family) {
            foreach (array_slice($family['directions'], 1) as $direction) {
                if ($primary !== null && $direction['l'] === $primary['key']) {
                    continue;
                }
                foreach ($fields as $field) {
                    if ($field['key'] === $direction['l']) {
                        $multi[] = self::lower($field['label']);
                    }
                }
            }
        }
        $multi = array_values(array_unique($multi));
        if ($multi !== []) {
            $faq[] = [
                'q' => 'Can I work out ' . self::joinList(array_slice(array_unique($multi), 0, 3)) . ' instead?',
                'a' => 'Yes. The equation is rearranged for that field, so you can put the result in its box, clear the value you want back and the page solves for it. '
                    . 'That is also how you answer the reverse question — “what input gives this result?” — without doing the algebra by hand.',
            ];
        }

        if ($inputs !== []) {
            $names = [];
            foreach (array_slice($inputs, 0, 4) as $field) {
                $names[] = self::lower($field['label']);
            }
            $faq[] = [
                'q' => 'Which values do I need to fill in?',
                'a' => 'Only the ones you know. The page needs enough information to close the relationship — usually all but one of ' . self::joinList($names)
                    . '. Leave the field you want solved empty rather than entering a guess, because a guess is treated as a fact.',
            ];
        }

        $unitFields = array_values(array_filter($fields, static fn (array $f): bool => $f['unit_group'] !== ''));
        if ($unitFields !== []) {
            $faq[] = [
                'q' => 'Does it matter which unit I use?',
                'a' => 'No, as long as each value is in the unit you selected for it. The page converts to a common base unit before calculating, '
                    . 'so 1 metre and 100 centimetres give the same answer. What does change the answer is entering a value in one unit while the switcher says another.',
            ];
        }

        $selectFields = array_values(array_filter($fields, static fn (array $f): bool => $f['type'] === 'select'));
        if ($selectFields !== []) {
            $field = $selectFields[0];
            $faq[] = [
                'q' => 'What does the “' . self::lower($field['label']) . '” choice change?',
                'a' => 'It selects which case the arithmetic applies. Different options stand for different values in the relationship, '
                    . 'so switching it changes the result in the way the formula above describes — it is not just a label.',
            ];
        }

        if ($example['outputs'] !== []) {
            $first = $example['outputs'][0];
            $faq[] = [
                'q' => 'Why does the page show ' . self::escape($first['value']) . ' before I type anything?',
                'a' => 'That is the answer for the default values the fields open with. They are there so the calculator demonstrates itself, '
                    . 'not because they describe your situation — replace them with your own figures and the result follows.',
            ];
        }

        $faq[] = [
            'q' => 'Is the result rounded?',
            'a' => 'What you see is rounded for readability. The calculation itself uses the unrounded numbers, so recomputing by hand from the displayed values can differ in the last digit.',
        ];

        if (count($faq) > 6) {
            $faq = array_slice($faq, 0, 6);
        }
        return $faq;
    }

    private static function faqHow(array $primary, array $fields, array $families): string
    {
        $labels = [];
        foreach ($fields as $field) {
            $labels[$field['key']] = $field['label'];
        }
        foreach ($families as $family) {
            foreach ($family['directions'] as $direction) {
                if ($direction['l'] === $primary['key']) {
                    return 'It comes from ' . self::escape($labels[$direction['l']] ?? $direction['l']) . ' = '
                        . self::escape(self::prettyFormula($direction['f'], $labels))
                        . '. The same relationship is rearranged for the other fields, so the page can solve whichever one is left blank.';
                }
            }
        }
        return 'It is one of the values the definition computes; the formula is shown in the section above.';
    }

    /* -------------------------------------------------------------- helpers */

    /** `(likes+comments)/followers*100` → `(Average likes + Average comments) ÷ Followers × 100` */
    public static function prettyFormula(string $formula, array $labels): string
    {
        /*
         * Replace every variable once, through placeholders. Substituting labels
         * one key at a time is wrong: after `target_rate` becomes "Target
         * engagement rate", a later pass for the key `rate` would rewrite the
         * word inside the label it just inserted ("Target engagement
         * Engagement rate").
         */
        $holders = [];
        $pattern = null;
        if ($labels !== []) {
            $keys = array_keys($labels);
            usort($keys, static fn (string $a, string $b): int => strlen($b) <=> strlen($a));
            foreach ($keys as $index => $key) {
                $holders['\u0001' . $index . '\u0002'] = (string) $labels[$key];
            }
            $pattern = '~(?<![A-Za-z0-9_])(?:' . implode('|', array_map(
                static fn (string $key): string => preg_quote($key, '~'),
                $keys
            )) . ')(?![A-Za-z0-9_])~';
        }

        if ($pattern !== null) {
            $order = array_flip($keys);
            $formula = (string) preg_replace_callback(
                $pattern,
                static fn (array $m): string => "\u0001" . $order[$m[0]] . "\u0002",
                $formula
            );
        }
        $formula = str_replace(['*', '/', '+', '-', '^'], [' × ', ' ÷ ', ' + ', ' − ', ' ^ '], $formula);
        $formula = (string) preg_replace('~\s+~', ' ', $formula);
        if ($holders !== []) {
            $formula = strtr($formula, $holders);
        }
        return trim($formula);
    }

    private static function number(float $value): string
    {
        if (abs($value - round($value)) < 1e-9) {
            return number_format($value, 0, '.', ',');
        }
        return rtrim(rtrim(number_format($value, 4, '.', ','), '0'), '.');
    }

    private static function joinList(array $items): string
    {
        $items = array_values(array_filter($items, static fn ($i): bool => trim((string) $i) !== ''));
        if ($items === []) {
            return '';
        }
        if (count($items) === 1) {
            return (string) $items[0];
        }
        $last = array_pop($items);
        return implode(', ', $items) . ' and ' . $last;
    }

    private static function lower(string $text): string
    {
        if ($text === '') {
            return '';
        }
        /* keep acronyms and symbols alone: "BMI" must not become "bmi" */
        if (preg_match('~^[A-Z0-9%$€£]{2,}~', $text)) {
            return $text;
        }
        return mb_strtolower(mb_substr($text, 0, 1)) . mb_substr($text, 1);
    }

    private static function escape(string $text): string
    {
        return htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}

/**
 * Deterministic wording picker.
 *
 * The catalogue's generator varies its phrasing per page so 3,800 pages do not
 * read like a mail merge. This does the same, but seeded from the slug, so the
 * same definition always drafts the same article — pressing the button twice
 * must not shuffle the text under an editor who is reviewing it.
 */
final class Picker
{
    private int $seed;

    public function __construct(string $key)
    {
        $this->seed = crc32($key !== '' ? $key : 'calculator');
    }

    public function pick(array $options): string
    {
        if ($options === []) {
            return '';
        }
        $index = $this->seed % count($options);
        /* advance the seed so two consecutive picks are not always correlated */
        $this->seed = ($this->seed * 1103515245 + 12345) & 0x7fffffff;
        return (string) $options[$index];
    }
}

<?php

declare(strict_types=1);

namespace Onim;

/**
 * CalcArticle — the article a calculator page deserves, written from the page.
 *
 * The bulk sections were harvested with a generator that filled the same prose
 * shell with a different name on every page: "the results leave the screen the
 * moment you edit a field", "a free biology calculator with the formula, units
 * and a worked example". A third of the sentences in Biology appeared on five
 * pages or more, and the parts that were specific — which boxes to fill, what
 * the answer means, how it is worked out — were the parts that were missing.
 *
 * This class does the opposite. Every sentence it writes is built from the
 * page's own record: the labels on its boxes, the units those boxes carry, the
 * equations it solves, the rounding it applies, the numbers its own formulas
 * produce for its own defaults. Two pages can only come out the same if they
 * are the same calculator.
 *
 * What it cannot know, it does not claim. There is no invented history, no
 * "widely used by agronomists", no citation. Where a page has a limitation —
 * an input that must be positive, a result that is only as good as the
 * measurement behind it — the limitation is stated with the name of the box it
 * applies to.
 *
 * The result is an article of six or seven sections and five or six questions,
 * roughly 700 words, in the same shape as the ones the hand-built tools use.
 */
final class CalcArticle
{
    /** Set once per build: the unit registry, for naming a box's unit. */
    private static ?Units $units = null;
    /**
     * @param array $calc   shaped calculator (Shape::fromRecord)
     * @param array $peers  sibling calculators in the same category: [['path','name'], …]
     * @param array $keep   the article being replaced, for authors and related
     * @return array{intro:string,sections:array,faq:array,related:array,authors:array}
     */
    public static function build(array $calc, Units $units, array $peers = [], array $keep = []): array
    {
        $name  = self::short(trim((string) ($calc['name'] ?? 'Calculator')));
        $cat   = (string) ($calc['cat'] ?? '');
        $seed  = (string) ($calc['slug'] ?? $name);

        self::$units = $units;
        $fields = self::fields($calc);
        $in     = $fields['inputs'];
        $out    = $fields['outputs'];
        $labels = $fields['labels'];
        $unitOf = $fields['unitOf'];

        if ($out === []) {
            return $keep + ['intro' => '', 'sections' => [], 'faq' => [], 'related' => [], 'authors' => []];
        }

        $example = self::example($calc, $units, $labels);
        $formulas = self::formulas($calc, $labels);

        $sections = [];
        $sections[] = [
            'title' => 'How the ' . $name . ' calculator works',
            'html'  => self::sectionHow($seed, $name, $in, $out, $labels, $unitOf, $formulas),
        ];
        if ($in !== []) {
            $sections[] = [
                'title' => 'What to enter, and what comes back',
                'html'  => self::sectionFields($seed, $name, $in, $out, $labels, $unitOf, $fields),
            ];
        }
        if ($example !== null) {
            $sections[] = [
                'title' => 'A worked example with numbers from this page',
                'html'  => self::sectionExample($seed, $name, $labels, $unitOf, $example, $formulas),
            ];
        }
        $sections[] = [
            'title' => 'Reading the answer',
            'html'  => self::sectionReading($seed, $name, $out, $labels, $unitOf, $example, $fields, $units),
        ];
        if ($formulas !== []) {
            $sections[] = [
                'title' => 'The formula, and what turns it round',
                'html'  => self::sectionFormula($seed, $name, $labels, $formulas, $calc),
            ];
        }
        $sections[] = [
            'title' => 'Checking an answer by hand',
            'html'  => self::sectionCheck($seed, $name, $calc, $units, $labels, $unitOf, $example),
        ];
        $sections[] = [
            'title' => 'Where the numbers usually go wrong',
            'html'  => self::sectionTraps($seed, $name, $in, $out, $labels, $unitOf, $units),
        ];
        $sections[] = [
            'title' => 'Where this calculation comes up',
            'html'  => self::sectionUses($seed, $name, $cat, $in, $out, $labels, $peers),
        ];

        return [
            'intro'    => self::intro($seed, $name, $in, $out, $labels, $unitOf, $cat),
            'sections' => $sections,
            'faq'      => self::faq($seed, $name, $in, $out, $labels, $unitOf, $formulas, $example, $calc, $peers),
            'related'  => self::related($peers, (array) ($keep['related'] ?? [])),
            'authors'  => (array) ($keep['authors'] ?? []),
        ];
    }

    /* ------------------------------------------------------------- the pieces */

    /** Who is in the form, in the order the form shows them. */
    private static function fields(array $calc): array
    {
        $inputs = [];
        $outputs = [];
        $labels = [];
        $unitOf = [];
        $help = [];
        $notes = [];
        $defaults = [];

        foreach ($calc['groups'] as $group) {
            foreach ($group['matrices'] as $matrix) {
                foreach ($matrix['columns'] as $column) {
                    foreach ($column as $field) {
                        $type = (string) ($field['type'] ?? '');
                        if ($type === 'note' || $type === 'image') {
                            $text = trim(strip_tags((string) ($field['label'] ?? '')));
                            if ($text !== '') {
                                $notes[] = $text;
                            }
                            continue;
                        }
                        if ($type !== 'variable') {
                            continue;
                        }
                        $var = (string) ($field['var'] ?? '');
                        if ($var === '') {
                            continue;
                        }
                        $label = trim((string) ($field['label'] ?? ''));
                        $label = $label !== '' ? $label : $var;
                        $labels[$var] = $label;
                        $unitOf[$var] = [
                            'key'     => $field['unitSwitcher'] ?? null,
                            'default' => $field['unitDefault'] ?? null,
                            'suffix'  => trim((string) ($field['suffix'] ?? '')),
                        ];
                        $help[$var] = trim((string) ($field['help'] ?? ''));
                        $vt = (string) ($calc['variables'][$var]['type'] ?? 'numerical');
                        $isOut = !empty($field['outputOnly']) || $vt === 'dependent';
                        if ($isOut) {
                            if (!in_array($var, $outputs, true)) {
                                $outputs[] = $var;
                            }
                        } elseif (!in_array($var, $inputs, true)) {
                            $inputs[] = $var;
                        }
                    }
                }
            }
        }

        /*
         * Most of these pages do not mark a box as an output: the record simply
         * lists four variables and four equations, one per variable, and the
         * visitor can leave any of them empty. For the article to read like a
         * calculation rather than a list, the subject of the first equation is
         * taken as the answer and the rest as what you feed it — which is the
         * direction the page itself opens with.
         */
        if ($outputs === [] && $inputs !== []) {
            /* The primary relationship: the first equation variant whose
               left-hand side is on the form and whose right-hand side is on it
               too. Everything it reads is an input; everything else the page
               can compute is a result. */
            $primary = null;
            $reads = [];
            foreach ((array) ($calc['equations'] ?? []) as $entry) {
                foreach ((array) ($entry['variants'] ?? []) as $variant) {
                    $lhs = (string) ($variant['lhs'] ?? '');
                    $rhs = array_values((array) ($variant['rhs'] ?? []));
                    if ($lhs === '' || $rhs === [] || !isset($labels[$lhs]) || !isset($labels[$lhs])) {
                        continue;
                    }
                    $missing = [];
                    foreach ($rhs as $var) {
                        if (!isset($labels[$var])) {
                            $missing[] = $var;
                        }
                    }
                    if ($missing !== []) {
                        continue;
                    }
                    $primary = $lhs;
                    $reads = $rhs;
                    break 2;
                }
            }

            $computable = [];
            foreach ((array) ($calc['equations'] ?? []) as $entry) {
                foreach ((array) ($entry['variants'] ?? []) as $variant) {
                    $lhs = (string) ($variant['lhs'] ?? '');
                    if ($lhs !== '' && isset($labels[$lhs])) {
                        $computable[$lhs] = true;
                    }
                }
            }

            if ($primary !== null) {
                $inputs = array_values(array_intersect($inputs, $reads));
                $outputs = [];
                foreach (array_keys($labels) as $var) {
                    if (!isset($computable[$var]) || in_array($var, $inputs, true)) {
                        continue;
                    }
                    $outputs[] = $var;
                }
            } elseif (count($computable) === 1) {
                $outputs = array_keys($computable);
                $inputs = array_values(array_filter($inputs, static fn (string $v): bool => !in_array($v, $outputs, true)));
            }
        }

        /*
         * A page that scores its answers has no result box at all: the value is
         * computed under a name the form never shows. It is still what the page
         * is for, so it is still what the article is about.
         */
        if ($outputs === []) {
            $named = [];
            foreach ((array) ($calc['variables'] ?? []) as $var => $meta) {
                if (isset($labels[$var])) {
                    continue;
                }
                $named[(string) $var] = trim((string) ($meta['label'] ?? '')) !== ''
                    ? trim((string) $meta['label'])
                    : (string) $var;
            }
            foreach ((array) ($calc['equations'] ?? []) as $entry) {
                foreach ((array) ($entry['variants'] ?? []) as $variant) {
                    $lhs = (string) ($variant['lhs'] ?? '');
                    if ($lhs === '' || isset($labels[$lhs])) {
                        continue;
                    }
                    $labels[$lhs] = $named[$lhs] ?? $lhs;
                    if (!in_array($lhs, $outputs, true)) {
                        $outputs[] = $lhs;
                    }
                }
            }
        }

        return [
            'inputs' => $inputs,
            'outputs' => $outputs,
            'labels' => $labels,
            'unitOf' => $unitOf,
            'help' => $help,
            'notes' => $notes,
            'variables' => (array) ($calc['variables'] ?? []),
        ];
    }

    /**
     * Every equation as "Label = readable expression", one per left-hand side,
     * longest first so the general relationship leads and its rearrangements
     * follow.
     *
     * @return array<int,array{lhs:string,label:string,expr:string,rhs:array<int,string>}>
     */
    private static function formulas(array $calc, array $labels): array
    {
        $out = [];
        foreach ((array) ($calc['equations'] ?? []) as $entry) {
            foreach ((array) ($entry['variants'] ?? []) as $variant) {
                $lhs = (string) ($variant['lhs'] ?? '');
                $expr = trim((string) ($variant['formula'] ?? ''));
                if ($lhs === '' || $expr === '') {
                    continue;
                }
                $out[] = [
                    'lhs'   => $lhs,
                    'label' => $labels[$lhs] ?? $lhs,
                    'expr'  => self::expand(CustomArticle::prettyFormula($expr, $labels)),
                    'rhs'   => array_values((array) ($variant['rhs'] ?? [])),
                ];
            }
        }
        return $out;
    }

    /**
     * The page's own defaults pushed through its own solver: the numbers every
     * later section can point at.
     *
     * @return array{in:array<string,float>,out:array<string,float>,inText:array<string,string>,outText:array<string,string>}|null
     */
    private static function example(array $calc, Units $units, array $labels): ?array
    {
        $inputs = CalcExample::sample($calc, $units);
        if ($inputs === []) {
            return null;
        }
        $solved = Solver::solve($calc, $inputs, $units);
        $out = [];
        foreach ($solved->values as $var => $value) {
            if (!is_finite((float) $value) || !empty($solved->placeholder[$var]) || isset($inputs[$var])) {
                continue;
            }
            if (!isset($labels[$var])) {
                continue;
            }
            $out[$var] = (float) $value;
        }
        if ($out === []) {
            return null;
        }
        $inText = [];
        foreach ($inputs as $var => $value) {
            $inText[$var] = self::num((float) $value);
        }
        $outText = [];
        foreach ($out as $var => $value) {
            $outText[$var] = self::num($value);
        }
        return ['in' => $inputs, 'out' => $out, 'inText' => $inText, 'outText' => $outText];
    }

    /* --------------------------------------------------------------- sections */

    private static function intro(string $seed, string $name, array $in, array $out, array $labels, array $unitOf, string $cat): string
    {
        $firstOut = self::names($out, $labels, 2);
        $firstIn = $in === [] ? '' : self::names($in, $labels, 3);
        $oneIn = $in === [] ? '' : $labels[$in[0]];
        $oneOut = $out === [] ? '' : $labels[$out[0]];
        $unit = $out === [] ? '' : self::unitText($unitOf[$out[0]]['key'] ?? null, $unitOf[$out[0]]['default'] ?? null, $unitOf[$out[0]]['suffix'] ?? '');

        $parts = [];
        if ($in === []) {
            $parts[] = sprintf(self::pick($seed, 'intro2', [
                '%s works out %s.',
                '%s reports %s.',
                '%s returns %s from the values already on the page.',
            ]), $name, $firstOut);
        } else {
            $frame = self::pick($seed, 'intro', ['a', 'b', 'c', 'd']);
            $parts[] = match ($frame) {
                'a' => sprintf('%s works out %s from %s.', $name, $firstOut, $firstIn),
                'b' => sprintf('%s takes %s and returns %s.', $name, $firstIn, $firstOut),
                'c' => sprintf('Enter %s into %s and the answer comes back as %s.', $firstIn, $name, $firstOut),
                default => sprintf('%s turns %s into %s.', $name, $firstIn, $firstOut),
            };
        }

        $parts[] = sprintf(self::pick($seed, 'intro3', [
            'Nothing is looked up on this page: %s is computed from %s and the other boxes, so an unusual pair of values gives an honest answer rather than an error.',
            'It is a single relationship that reads %s out of %s, not a table of canned results keyed by them.',
            'The arithmetic is the whole method: %s is worked out from %s by one formula, applied once.',
            'There is no hidden constant here: change %s and %s moves with it.',
        ]), $oneOut, $oneIn);

        if ($unit !== '') {
            $parts[] = sprintf(self::pick($seed, 'intro4', [
                'The main result, %s, is reported in %s.',
                '%s comes back in %s unless you switch the unit chip beside the box.',
                'Units for %s default to %s and can be changed on the answer itself.',
                '%s is opened in %s; the chip beside it switches to any unit of the same quantity.',
            ]), $oneOut, $unit);
        }

        return implode(' ', $parts);
    }

    private static function sectionHow(string $seed, string $name, array $in, array $out, array $labels, array $unitOf, array $formulas): string
    {
        $asked = $in === [] ? 'the value already on the page' : self::countNoun(count($in), 'number');
        $reports = self::names($out, $labels, 3);
        $frames = [
            'The %s calculator applies one relationship to %s and reports %s.'          => [$name, $asked, $reports],
            'There is one relationship behind %s: it takes %s and reports %s.'          => [$name, $asked, $reports],
            '%s answers one question from %s, and the answer is %s.'                   => [$name, $asked, $reports],
        ];
        $frame = self::pick($seed, 'how1', array_keys($frames));
        $html  = '<p>' . View::escape(sprintf($frame, ...$frames[$frame])) . '</p>';

        if ($formulas !== [] && strlen($formulas[0]['expr']) <= 240) {
            $lead = $formulas[0];
            $html .= '<p>' . View::escape(sprintf(self::pick($seed, 'how2', [
                "In the form's own words, %s = %s.",
                'Written with the labels from the form, %s = %s.',
                'The relationship it solves reads %s = %s.',
            ]), $lead['label'], $lead['expr'])) . '</p>';
        }

        if ($out !== []) {
            $html .= '<p>' . View::escape(sprintf(self::pick($seed, 'how3', [
                'What comes back is %s — each answer is a box on the form, so you read it beside the numbers that produced it.',
                'The result panel carries %s, each in a box of its own rather than buried in a sentence.',
                'The answers are %s; they are reported together because a single calculation usually settles more than one question.',
            ]), self::names($out, $labels, 4))) . '</p>';
        }

        return $html;
    }

    private static function sectionFields(string $seed, string $name, array $in, array $out, array $labels, array $unitOf, array $fields): string
    {
        $items = [];
        foreach ($in as $var) {
            $unit = self::unitText($unitOf[$var]['key'] ?? null, $unitOf[$var]['default'] ?? null, $unitOf[$var]['suffix'] ?? '');
            $line = '<strong>' . View::escape(self::clean($labels[$var])) . '</strong>';
            $line .= $unit !== '' ? ' — in ' . View::escape($unit) : ' — a plain number, no unit';
            if (!empty($fields['variables'][$var]['type']) && $fields['variables'][$var]['type'] === 'date') {
                $line .= ', entered as a date';
            }
            $help = trim((string) ($fields['help'][$var] ?? ''));
            if ($help !== '') {
                $line .= '. ' . View::escape($help);
            }
            $items[] = '<li>' . $line . '</li>';
        }

        $html = '<p>' . View::escape(sprintf(self::pick($seed, 'fields1', [
            'The form asks for %s, and nothing else.',
            'There are %s to fill in; every one of them is used by the formula.',
            'Fill in %s and the page has everything it needs.',
        ]), self::countNoun(count($in), 'box', 'boxes'))) . '</p>';

        if ($items !== []) {
            $html .= '<ul>' . implode('', $items) . '</ul>';
        }

        if ($out !== []) {
            $outBits = [];
            foreach ($out as $var) {
                $unit = self::unitText($unitOf[$var]['key'] ?? null, $unitOf[$var]['default'] ?? null, $unitOf[$var]['suffix'] ?? '');
                $outBits[] = View::escape(self::clean($labels[$var])) . ($unit !== '' ? ' in ' . View::escape($unit) : '');
            }
            $single = count($outBits) === 1;
            $frames = $single
                ? [
                    'The result box is %s. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.',
                    'The answer comes back as %s. The page writes that box; there is nothing to submit or save before you can read it.',
                    'What you get back is %s, shown next to the form rather than on a page of its own.',
                ]
                : [
                    'The result boxes are %s; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.',
                    'The answers come back as %s. Those boxes are written by the page, not by you, so there is nothing to submit.',
                    'What you get back is %s, shown next to the form rather than on a page of its own.',
                ];
            $html .= '<p>' . sprintf(self::pick($seed, 'fields2', $frames), implode(', ', $outBits)) . '</p>';
        }

        return $html;
    }

    private static function sectionExample(string $seed, string $name, array $labels, array $unitOf, array $example, array $formulas): string
    {
        $inParts = [];
        foreach ($example['in'] as $var => $value) {
            $unit = self::unitShort($unitOf[$var] ?? []);
            $inParts[] = View::escape(self::clean($labels[$var] ?? $var)) . ' = ' . $example['inText'][$var] . ($unit !== '' ? ' ' . View::escape($unit) : '');
        }
        $outParts = [];
        foreach ($example['out'] as $var => $value) {
            $unit = self::unitShort($unitOf[$var] ?? []);
            $outParts[] = '<strong>' . View::escape(self::clean($labels[$var] ?? $var)) . '</strong> = '
                . $example['outText'][$var] . ($unit !== '' ? ' ' . View::escape($unit) : '');
        }

        $html = '<p>' . View::escape(sprintf(self::pick($seed, 'ex1', [
            'Run the numbers the page opens with — %s — through the same formula and the panel reports %s.',
            'With the defaults in place, %s gives %s.',
            'Take the values the form starts on, %s; the answers are %s.',
        ]), self::plainList($inParts), self::plainList($outParts)))
            . '</p>';

        $html .= '<ul>' . implode('', array_map(static fn (string $p): string => '<li>' . $p . '</li>', $outParts)) . '</ul>';

        if ($formulas !== [] && strlen($formulas[0]['expr']) <= 240) {
            $lead = $formulas[0];
            $html .= '<p>' . sprintf(self::pick($seed, 'ex2', [
                'That is %s = %s, with each symbol replaced by one of the boxes above.',
                'The line behind those figures is %s = %s — nothing in it is a constant the page keeps to itself.',
                'Spelled out with this form\'s labels, the arithmetic is %s = %s.',
            ]), '<strong>' . View::escape($lead['label']) . '</strong>', '<code>' . View::escape($lead['expr']) . '</code>') . '</p>';
        }

        return $html;
    }

    private static function sectionReading(string $seed, string $name, array $out, array $labels, array $unitOf, ?array $example, array $fields, Units $units): string
    {
        $html = '';

        $magnitudes = [];
        if ($example !== null) {
            foreach ($example['out'] as $var => $value) {
                $magnitudes[] = '<strong>' . View::escape($labels[$var] ?? $var) . '</strong> = ' . self::num($value);
            }
        }
        if ($magnitudes !== [] && $out !== []) {
            $html .= '<p>' . View::escape(sprintf(self::pick($seed, 'read1', [
                'Treat the size of a result as part of the answer: %s is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.',
                'A sanity check costs one glance: the page\'s defaults give %s. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.',
            ]), self::plainList($magnitudes))) . '</p>';
        }

        /* Units, if any box carries a switcher. */
        $switchers = [];
        foreach (array_merge($out, array_keys($labels)) as $var) {
            $entry = $unitOf[$var] ?? [];
            if (!empty($entry['key']) && $units->supported((string) $entry['key'])) {
                $count = count($units->options((string) $entry['key']));
                $switchers[$var] = [$count, self::unitText($entry['key'], $entry['default'] ?? null, '')];
            }
        }
        if ($switchers !== []) {
            $first = array_key_first($switchers);
            $html .= '<p>' . View::escape(sprintf(self::pick($seed, 'read2', [
                'Units are handled before the formula runs: %s offers %d units and opens on %s, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.',
                'The unit chip on %s lists %d options and opens on %s. Moving it changes the conversion applied to that row, not the number stored behind it.',
            ]), $labels[$first] ?? $first, $switchers[$first][0], $switchers[$first][1])) . '</p>';
        } else {
            $subject = $out !== [] ? ($labels[$out[0]] ?? 'this page') : 'this page';
            $html .= '<p>' . View::escape(sprintf(self::pick($seed, 'read3', [
                'None of the boxes on this page carries a unit chip: %s takes a plain number and the answer inherits whatever scale the inputs were measured in.',
                'As far as %s is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.',
            ]), $subject)) . '</p>';
        }

        /* Rounding, from the page's own setting. */
        $rounding = [];
        foreach ($out as $var) {
            $rnd = (array) ($fields['variables'][$var]['rnd'] ?? []);
            if ($rnd !== []) {
                $rounding[] = strtolower((string) ($rnd[0] ?? '')) === 'standard'
                    ? (int) ($rnd[1] ?? 0)
                    : (int) ceil(-log10(max(1e-12, (float) ($rnd[1] ?? 0.01))));
            }
        }
        $places = $rounding === [] ? null : max($rounding);
        if ($places !== null) {
            $html .= '<p>' . View::escape(sprintf(self::pick($seed, 'read4', [
                'Results are displayed to %d decimal places; the arithmetic itself runs at full precision, so the figure shown is a view of the number rather than a second calculation from it.',
                'The panel rounds to %d decimals and does it once, at the end, which is why two inputs that differ in the third decimal can still produce visibly different answers.',
            ]), $places)) . '</p>';
        }

        return $html;
    }

    private static function sectionFormula(string $seed, string $name, array $labels, array $formulas, array $calc): string
    {
        $html = '<p>' . View::escape(self::pick($seed, 'f1', [
            'The relationship is shown here as the page solves it, with the form\'s labels standing where the variable names would.',
            'Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.',
        ])) . '</p>';

        $html .= '<ul>';
        $seen = [];
        $budget = 0;
        foreach ($formulas as $formula) {
            if (isset($seen[$formula['label']])) {
                continue;
            }
            /* A page built on a dataset can carry a formula per row; the list
               is a summary, not a dump, so it stops once it stops being one. */
            if (strlen($formula['expr']) > 240 || $budget > 260) {
                continue;
            }
            $seen[$formula['label']] = true;
            $budget += str_word_count($formula['expr']) + 4;
            $html .= '<li><strong>' . View::escape($formula['label']) . '</strong> = <code>'
                . View::escape($formula['expr']) . '</code></li>';
            if (count($seen) >= 6) {
                break;
            }
        }
        $html .= '</ul>';

        /* Which boxes can be the answer, read from the equations rather than
           from the form: a page with one formula per left-hand side solves in
           as many directions as it has equations. */
        $targets = [];
        foreach ($formulas as $formula) {
            $targets[$formula['lhs']] = $formula['label'];
        }
        if (count($targets) > 1) {
            $html .= '<p>' . View::escape(sprintf(self::pick($seed, 'f2', [
                'Because the equation is written once per variable, the page works in either direction: any one of %s can be the unknown.',
                'Any one of %s can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.',
            ]), self::plainNames(array_values($targets), 3))) . '</p>';
        }

        return $html;
    }

    /**
     * One number changed, the same solver run again: the cheapest way for a
     * reader to see that the page is arithmetic and not a table.
     */
    private static function sectionCheck(string $seed, string $name, array $calc, Units $units, array $labels, array $unitOf, ?array $example): string
    {
        if ($example === null) {
            return '<p>' . View::escape(self::pick($seed, 'check0', [
                'There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.',
                'A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.',
            ])) . '</p>';
        }

        $var = array_key_first($example['in']);
        if ($var === null) {
            return '';
        }
        $value = (float) $example['in'][$var];
        if ($value <= 0) {
            return '';
        }
        $altered = $example['in'];
        $altered[$var] = $value * 2;
        $solved = Solver::solve($calc, $altered, $units);

        $before = [];
        $after = [];
        foreach ($example['out'] as $out => $_) {
            $new = $solved->values[$out] ?? null;
            if ($new === null || !is_finite((float) $new)) {
                continue;
            }
            $unit = self::unitShort($unitOf[$out] ?? []);
            $before[] = '<strong>' . View::escape($labels[$out] ?? $out) . '</strong> ' . $example['outText'][$out] . ($unit !== '' ? ' ' . View::escape($unit) : '');
            $after[] = '<strong>' . View::escape($labels[$out] ?? $out) . '</strong> ' . self::num((float) $new) . ($unit !== '' ? ' ' . View::escape($unit) : '');
        }
        if ($after === []) {
            return '';
        }

        $html = '<p>' . View::escape(sprintf(self::pick($seed, 'check1', [
            'Take the example above and double %s from %s to %s, leaving every other box alone. The panel moves from %s to %s.',
            'Change one box only — %s, from %s to %s — and the answers go from %s to %s.',
        ]), $labels[$var] ?? $var, $example['inText'][$var], self::num($value * 2), self::plainList($before), self::plainList($after))) . '</p>';

        $html .= '<p>' . View::escape(self::pick($seed, 'check2', [
            'Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.',
            'That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.',
        ])) . '</p>';

        return $html;
    }

    /**
     * The mistakes this specific page invites, named after the boxes that
     * invite them — a unit switch left in the wrong place, a measurement
     * entered in the wrong scale, an answer typed into an input.
     */
    private static function sectionTraps(string $seed, string $name, array $in, array $out, array $labels, array $unitOf, Units $units): string
    {
        $traps = [];

        $switchable = [];
        foreach ($in as $var) {
            $entry = $unitOf[$var] ?? [];
            if (!empty($entry['key']) && $units->supported((string) $entry['key'])) {
                $switchable[] = $labels[$var];
            }
        }
        if ($switchable !== []) {
            $traps[] = '<strong>Units left where they were.</strong> ' . View::escape(sprintf(self::pick($seed, 'trap1', [
                '%s carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.',
                'The chip beside %s is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.',
            ]), self::plainNames($switchable, 3)));
        }

        if ($out !== []) {
            $traps[] = '<strong>The answer typed back in.</strong> ' . View::escape(sprintf(self::pick($seed, 'trap2', [
                '%s, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.',
                'A result box can be typed into, and doing so changes the question rather than the arithmetic: with %s filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.',
            ]), self::names($out, $labels, 3) . (count($out) === 1 ? ' is a result' : ' are results')));
        }

        $traps[] = '<strong>Measurements mixed across scales.</strong> ' . View::escape(sprintf(self::pick($seed, 'trap3', [
            'Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert %s to one scale before entering anything.',
            'A calculation cannot tell a measured value from an estimated one. If %s is an estimate, the answer is only as good as that number, whatever precision the panel displays.',
            'Entering a rounded value is fine; rounding twice is not. Keep full precision in %s and let the panel round the answer once.',
        ]), $in === [] ? 'the measured values' : $labels[$in[0]]));

        return '<ul>' . implode('', array_map(static fn (string $t): string => '<li>' . $t . '</li>', $traps)) . '</ul>';
    }

    private static function sectionUses(string $seed, string $name, string $cat, array $in, array $out, array $labels, array $peers): string
    {
        $html = '';

        if ($in !== [] && $out !== []) {
            $html .= '<p>' . View::escape(sprintf(self::pick($seed, 'uses1', [
                'Reach for this page when %s is what you already know and %s is what you need — the reverse of that situation is what the rearranged form is for.',
                'The typical use is one direction of the relationship: %s measured, %s wanted.',
                'Use it whenever the numbers you have are %s and the number you are missing is %s.',
            ]), self::names($in, $labels, 3), self::names($out, $labels, 2))) . '</p>';
        }

        $html .= '<p>' . View::escape(self::pick($seed, 'uses2', [
            'It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.',
            'Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.',
        ])) . '</p>';

        /* Contextual internal links: the neighbouring steps of the same job. */
        $links = [];
        foreach (array_slice($peers, 0, 3) as $peer) {
            $path = (string) ($peer['path'] ?? '');
            $peerName = trim((string) ($peer['name'] ?? ''));
            if ($path === '' || $peerName === '') {
                continue;
            }
            $links[] = '<a href="' . View::escape(View::url($path)) . '">' . View::escape($peerName) . '</a>';
        }
        if ($links !== []) {
            $html .= '<p>' . sprintf(self::pick($seed, 'uses3', [
                'Two more from the same section come up alongside this one: %s.',
                'If the answer you need is a step further on, the nearest pages are %s.',
                'Related work in the same category: %s.',
            ]), self::plainList($links)) . '</p>';
        }

        return $html;
    }

    /* -------------------------------------------------------------------- FAQ */

    private static function faq(string $seed, string $name, array $in, array $out, array $labels, array $unitOf, array $formulas, ?array $example, array $calc, array $peers): array
    {
        $faq = [];

        if (isset($formulas[0]) && strlen($formulas[0]['expr']) > 240) {
            $formulas[0]['expr'] = '';
        }
        $reads = $formulas[0]['rhs'] ?? [];
        $readLabels = [];
        foreach ($reads as $var) {
            if (isset($labels[$var])) {
                $readLabels[] = $labels[$var];
            }
        }
        $oneOut = $out === [] ? 'the answer' : $labels[$out[0]];
        $oneIn  = $in === [] ? 'the value already on the page' : $labels[$in[0]];

        $faq[] = [
            'q' => 'What does the ' . $name . ' calculator work out?',
            'a' => self::names($out, $labels, 4) . ($formulas !== []
                ? ', from ' . ($readLabels === [] ? self::names($in, $labels, 4) : self::plainNames($readLabels, 4))
                  . ($formulas[0]['expr'] !== ''
                        ? '. The relationship is ' . $formulas[0]['label'] . ' = ' . $formulas[0]['expr'] . '.'
                        : '.')
                : '.'),
        ];

        if ($in !== []) {
            $bits = [];
            foreach ($in as $var) {
                $unit = self::unitText($unitOf[$var]['key'] ?? null, $unitOf[$var]['default'] ?? null, $unitOf[$var]['suffix'] ?? '');
                $bits[] = self::clean($labels[$var]) . ($unit !== '' ? ' (' . $unit . ')' : '');
            }
            $list = implode(', ', array_slice($bits, 0, 5));
            $faq[] = [
                'q' => 'Which values do I need before I start?',
                'a' => $list . '. ' . sprintf(self::pick($seed, 'q2', [
                    'Fill %s and leave %s empty if you would rather have that one solved instead.',
                    'With %s in place, %s can stay blank and the page will work it out.',
                    'Enter %s; %s is the box to leave alone unless it is the value you came for.',
                ]), self::plainNames(array_slice(array_diff($in, [$out[0] ?? '']), 0, 3), 3), $oneOut),
            ];
        }

        $targets = [];
        foreach ($formulas as $formula) {
            $targets[$formula['lhs']] = $formula['label'];
        }
        if (count($targets) > 1) {
            $faq[] = [
                'q' => 'Can it solve for a different variable?',
                'a' => sprintf(self::pick($seed, 'q3', [
                    'Yes. %s can each be the answer: the page works out which box is empty and rearranges the relationship for it.',
                    'It can. Leave any of %s blank and the page solves for that one instead — nothing has to be switched first.',
                ]), self::plainNames(array_values($targets), 4)),
            ];
        }

        if ($example !== null) {
            $outParts = [];
            foreach ($example['out'] as $var => $value) {
                $outParts[] = self::clean($labels[$var]) . ' = ' . $example['outText'][$var] . self::unitShortSuffix($unitOf[$var] ?? []);
            }
            $faq[] = [
                'q' => 'What answer do the default values give?',
                'a' => self::plainList($outParts) . '. ' . sprintf(self::pick($seed, 'q4', [
                    'That comes from the page\'s own defaults, entered in %s; change one of them and the whole set is recomputed.',
                    'Those are the defaults written into the form — move %s and every result box follows.',
                    'The figures come from %s as the page opens it; they are a starting point, not a fixed answer.',
                ]), $oneIn),
            ];
        }

        $decimals = null;
        foreach ($out as $var) {
            $rnd = (array) ($calc['variables'][$var]['rnd'] ?? []);
            if ($rnd !== []) {
                $decimals = strtolower((string) ($rnd[0] ?? '')) === 'standard'
                    ? (int) ($rnd[1] ?? 0)
                    : (int) ceil(-log10(max(1e-12, (float) ($rnd[1] ?? 0.01))));
                break;
            }
        }
        $faq[] = [
            'q' => 'How precise is the result?',
            'a' => sprintf(self::pick($seed, 'q5', [
                'The arithmetic runs at full precision and only the display of %s is rounded%s. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.',
                '%s is computed at full precision and rounded once at the end%s, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.',
                'Internally %s is not rounded at all%s; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.',
            ]), $oneOut, $decimals === null ? '' : ' to ' . $decimals . ' decimals'),
        ];

        $faq[] = [
            'q' => 'What happens if I leave a box empty?',
            'a' => count($targets) > 1
                ? sprintf(self::pick($seed, 'q6a', [
                    'The empty box becomes the unknown: leave %s blank and the page solves for it, reporting %s instead of the usual answer.',
                    'A blank box is the question. With %s left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.',
                ]), $oneIn, $oneOut)
                : sprintf(self::pick($seed, 'q6b', [
                    'The page needs every box filled: %s is fixed as the value it works out, so there is nothing to solve for when an input is missing.',
                    'Every box has to have a number in it. What this page returns is %s, so an empty input simply leaves the result blank rather than choosing a new unknown.',
                ]), $oneOut),
        ];

        $faq[] = [
            'q' => 'Does it round to the nearest whole number?',
            'a' => sprintf(self::pick($seed, 'q7', [
                'Only for display. %s keeps its decimals behind the panel, and a figure copied out is the rounded one shown.',
                'No — the rounding you see is formatting applied to %s at the moment it is drawn.',
                'It rounds for display only; the underlying value of %s keeps more digits than the panel prints.',
            ]), $oneOut),
        ];

        return $faq;
    }

    private static function related(array $peers, array $keep): array
    {
        $out = [];
        foreach (array_slice($peers, 0, 3) as $peer) {
            if (!empty($peer['path']) && !empty($peer['name'])) {
                $out[] = ['path' => (string) $peer['path'], 'name' => (string) $peer['name']];
            }
        }
        foreach ($keep as $row) {
            if (count($out) >= 3) {
                break;
            }
            if (!empty($row['path']) && !empty($row['name'])) {
                $out[] = ['path' => (string) $row['path'], 'name' => (string) $row['name']];
            }
        }
        return array_values(array_slice($out, 0, 3));
    }

    /* ---------------------------------------------------------------- helpers */

    /**
     * `pow(a, b)` as `(a)^(b)`, `log(x)` as `ln(x)`, `log10(x)` as `log₁₀(x)`.
     *
     * Runs after the labels are substituted, so the arguments are words rather
     * than identifiers and a plain string replace would eat the wrong commas.
     */
    public static function expand(string $expr): string
    {
        $expr = (string) preg_replace('~\blog10\(~', 'log₁₀(', $expr);
        $expr = (string) preg_replace('~(?<!\w)log\(~', 'ln(', $expr);
        $expr = (string) preg_replace('~(?<!\w)sqrt\(~', '√(', $expr);
        $expr = (string) preg_replace('~(?<!\w)exp\(~', 'e^(', $expr);

        /* pow(A, B) -> (A)^(B), matching the closing bracket rather than
           trusting the argument to be parenthesis-free. */
        while (($start = stripos($expr, 'pow(')) !== false) {
            $open = $start + 3;
            $depth = 0;
            $comma = -1;
            $end = -1;
            for ($i = $open, $len = strlen($expr); $i < $len; $i++) {
                $ch = $expr[$i];
                if ($ch === '(') {
                    $depth++;
                } elseif ($ch === ')') {
                    $depth--;
                    if ($depth === 0) {
                        $end = $i;
                        break;
                    }
                } elseif ($ch === ',' && $depth === 1) {
                    $comma = $i;
                }
            }
            if ($end === -1 || $comma === -1) {
                break;
            }
            $base = trim(substr($expr, $open + 1, $comma - $open - 1));
            $power = trim(substr($expr, $comma + 1, $end - $comma - 1));
            $expr = substr($expr, 0, $start) . '(' . $base . ')^(' . $power . ')' . substr($expr, $end + 1);
        }

        return trim((string) preg_replace('~\s+~', ' ', $expr));
    }

    /**
     * "The Acid–Base Balance Calculator (ABG)" is already a page name; asking
     * "how the … calculator works" would say the word twice.
     */
    public static function short(string $name): string
    {
        $name = (string) preg_replace('~^the\s+~i', '', trim($name));
        return trim((string) preg_replace('~\s+(calculator|converter|generator)$~i', '', $name));
    }

    /** Pick one of N wordings, stably, from the page's slug. */
    private static function pick(string $seed, string $key, array $variants): string
    {
        $variants = array_values($variants);
        $index = abs((int) crc32($seed . '|' . $key)) % max(1, count($variants));
        return $variants[$index];
    }

    /** "A", "A and B", "A, B and C" */
    private static function names(array $vars, array $labels, int $max = 3): string
    {
        $out = [];
        foreach (array_slice($vars, 0, $max) as $var) {
            $out[] = self::clean((string) ($labels[$var] ?? $var));
        }
        return self::plainNames($out, $max);
    }

    private static function plainNames(array $names, int $max = 3): string
    {
        $names = array_values(array_filter(array_map(static fn ($n): string => self::clean((string) $n), $names)));
        $names = array_slice($names, 0, $max);
        if ($names === []) {
            return '';
        }
        if (count($names) === 1) {
            return $names[0];
        }
        $last = array_pop($names);
        return implode(', ', $names) . ' and ' . $last;
    }

    private static function plainList(array $items): string
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

    private static function countNoun(int $count, string $singular, string $plural = ''): string
    {
        $plural = $plural !== '' ? $plural : $singular . 's';
        return $count . ' ' . ($count === 1 ? $singular : $plural);
    }

    /** The unit a box opens in, named if the registry knows it. */
    private static function unitText(?string $key, ?string $unit, string $suffix): string
    {
        if ($suffix !== '') {
            return $suffix;
        }
        if ($key === null || $key === '') {
            return '';
        }
        if (self::$units !== null && self::$units->supported($key)) {
            $name = self::$units->name($key, $unit);
            if ($name !== '') {
                return $name;
            }
        }
        return (string) $unit;
    }

    private static function unitShort(array $entry): string
    {
        return trim((string) ($entry['suffix'] ?? '')) !== ''
            ? trim((string) $entry['suffix'])
            : (string) ($entry['default'] ?? '');
    }

    /** A label with its trailing punctuation removed, for use mid-sentence. */
    private static function clean(string $label): string
    {
        $label = trim($label);
        $label = (string) preg_replace('~\.{2,}$~u', '…', $label);
        return rtrim($label, " .:;,");
    }

    private static function unitShortSuffix(array $entry): string
    {
        $unit = self::unitShort($entry);
        return $unit !== '' ? ' ' . $unit : '';
    }

    private static function num(float $value): string
    {
        $abs = abs($value);
        if ($abs !== 0.0 && ($abs < 0.001 || $abs >= 1000000)) {
            return rtrim(rtrim(sprintf('%.3e', $value), '0'), '.');
        }
        $decimals = $abs >= 100 ? 0 : ($abs >= 1 ? 2 : 4);
        $text = number_format($value, $decimals, '.', '');
        if (str_contains($text, '.')) {
            $text = rtrim(rtrim($text, '0'), '.');
        }
        return $text;
    }
}

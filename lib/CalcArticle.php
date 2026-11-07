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

        $example = self::example($calc, $units, $labels, $out);
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
        if ($in !== []) {
            $sections[] = [
                'title' => 'What each box means',
                'html'  => self::sectionGlossary($seed, $name, $in, $out, $labels, $unitOf, $units, $fields, $calc),
            ];
        }
        if ($out !== []) {
            $sections[] = [
                'title' => 'What each result tells you',
                'html'  => self::sectionOutputs($seed, $name, $out, $labels, $unitOf, $units, $fields, $calc, $example),
            ];
        }
        $textInputs = array_values(array_filter($in, static fn (string $v): bool => (string) ($calc['variables'][$v]['type'] ?? '') === 'text'));
        if ($textInputs !== []) {
            $sections[] = [
                'title' => 'Pasting the sequence correctly',
                'html'  => self::sectionText($seed, $name, $textInputs, $labels, $out, $calc),
            ];
        }
        if ($formulas === []) {
            $sections[] = [
                'title' => 'How the page computes',
                'html'  => self::sectionScript($seed, $name, $in, $out, $labels, $calc),
            ];
        }
        if ($example !== null && $in !== []) {
            $sections[] = [
                'title' => 'How much each input moves the answer',
                'html'  => self::sectionSensitivity($seed, $name, $calc, $units, $labels, $unitOf, $example),
            ];
            $sections[] = [
                'title' => 'Two more scenarios, worked through',
                'html'  => self::sectionScenarios($seed, $name, $calc, $units, $labels, $unitOf, $example),
            ];
        }
        $chips = self::chips($in, $out, $unitOf, $units);
        if ($chips !== []) {
            $sections[] = [
                'title' => 'The units this page accepts',
                'html'  => self::sectionUnits($seed, $name, $chips, $units),
            ];
        }
        $sections[] = [
            'title' => 'Limits worth knowing',
            'html'  => self::sectionLimits($seed, $name, $in, $out, $labels, $unitOf, $units, $fields, $calc),
        ];
        $sections[] = [
            'title' => 'Where this calculation comes up',
            'html'  => self::sectionUses($seed, $name, $cat, $in, $out, $labels, $peers),
        ];

        /*
         * Length is a range, not a target to overshoot. A page with thirty
         * outputs and eight rearrangements can run to twenty thousand words of
         * generated arithmetic; nobody reads that, and a wall of it is worse for
         * the page than a shorter, tighter article. So the optional sections go
         * first, in reverse order of usefulness, until the page is back inside
         * the range.
         */
        $optional = [
            'Two more scenarios, worked through',
            'How much each input moves the answer',
            'The units this page accepts',
            'What each result tells you',
            'What each box means',
            'Checking an answer by hand',
            'Limits worth knowing',
            'Where this calculation comes up',
        ];
        $intro = self::intro($seed, $name, $in, $out, $labels, $unitOf, $cat);
        $faq   = self::faq($seed, $name, $in, $out, $labels, $unitOf, $formulas, $example, $calc, $peers);

        $total = static function (array $sections, string $intro) use ($faq): int {
            $text = $intro;
            foreach ($sections as $section) {
                $text .= ' ' . strip_tags((string) ($section['html'] ?? ''));
            }
            foreach ($faq as $qa) {
                $text .= ' ' . strip_tags((string) ($qa['a'] ?? ''));
            }
            return str_word_count($text);
        };
        $guard = 0;
        while ($total($sections, $intro) > 2380 && $guard < 9) {
            $guard++;
            $removed = false;
            foreach ($optional as $title) {
                foreach ($sections as $i => $section) {
                    if ($section['title'] === $title) {
                        unset($sections[$i]);
                        $sections = array_values($sections);
                        $removed = true;
                        break 2;
                    }
                }
            }
            if (!$removed) {
                break;
            }
        }
        /* Still long: a shorter question list is better than a longer page. */
        while ($total($sections, $intro) > 2400 && count($faq) > 4) {
            array_pop($faq);
        }

        /*
         * And the other end of the range: a page with one box and one answer
         * runs out of things that are true and specific long before it runs out
         * of article. It gets the walkthrough — four steps, in this page's own
         * labels — rather than a paragraph of padding about how calculators
         * work in general.
         */
        /*
         * The cap and the floor are both measured over everything a reader
         * sees: the intro, the sections and the answers. A page that hits the
         * sections' word count with a 400-word question list on top is not a
         * 2,400-word page, it is a 2,800-word one.
         */
        /* The floor is measured on the body a reader scrolls through — the
           intro and the sections, without the question list at the end. */
        $withFaq = static function (array $sections) use ($intro): int {
            $text = $intro;
            foreach ($sections as $section) {
                $text .= ' ' . strip_tags((string) ($section['html'] ?? ''));
            }
            return str_word_count($text);
        };
        if ($withFaq($sections) < 1600) {
            $steps = [
                'title' => 'Getting an answer, step by step',
                'html'  => self::sectionSteps($seed, $name, $in, $out, $labels, $unitOf, $calc),
            ];
            /* Before the summary, after the method: it reads as a procedure,
               not as a coda. */
            $at = count($sections);
            foreach ($sections as $i => $section) {
                if ($section['title'] === 'Where this calculation comes up' || $section['title'] === 'Limits worth knowing') {
                    $at = $i;
                    break;
                }
            }
            array_splice($sections, $at, 0, [$steps]);
        }
        if ($withFaq($sections) < 1600) {
            $sections[] = [
                'title' => 'About this page',
                'html'  => self::sectionAbout($seed, $name, $in, $out, $labels, $calc),
            ];
        }
        if ($withFaq($sections) < 1500 && $peers !== []) {
            $sections[] = [
                'title' => 'Where this fits among the other calculators',
                'html'  => self::sectionPeers($seed, $name, $in, $out, $labels, $peers),
            ];
        }
        if ($withFaq($sections) < 1660) {
            $sections[] = [
                'title' => 'Putting the answer to work',
                'html'  => self::sectionUse($seed, $name, $in, $out, $labels, $unitOf, $calc),
            ];
        }

        return [
            'intro'    => $intro,
            'sections' => $sections,
            'faq'      => $faq,
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
    private static function example(array $calc, Units $units, array $labels, array $outVars = []): ?array
    {
        $inputs = CalcExample::sample($calc, $units);
        /*
         * A page built around dates has no numeric defaults to seed, so the
         * worked example uses one fixed date — the same date on every rebuild,
         * which keeps the article stable. 2026-03-01 is a Sunday, which is the
         * kind of thing a mating-date page is sensitive to.
         */
        $fixed = (int) gmmktime(0, 0, 0, 3, 1, 2026) * 1000;
        foreach ($calc['groups'] as $group) {
            foreach ($group['matrices'] as $matrix) {
                foreach ($matrix['columns'] as $column) {
                    foreach ($column as $field) {
                        $name = (string) ($field['var'] ?? '');
                        if ($name === '' || isset($inputs[$name])) {
                            continue;
                        }
                        $type = (string) ($calc['variables'][$name]['type'] ?? '');
                        if (!empty($field['outputOnly']) || in_array($name, $outVars, true)) {
                            continue;           // a result is not seeded, whatever its control
                        }
                        if (in_array($type, ['date', 'datetime'], true)) {
                            $inputs[$name] = $fixed;
                        }
                    }
                }
            }
        }
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
        /*
         * What the reader supplies is what is left after the answers are taken
         * out — by variable and by label. A converter names both directions the
         * same thing ("Cat years" is an input one way and the answer the other),
         * and listing it on both sides produced "works out Human years and Cat
         * years from Cat years".
         */
        $outLabels = [];
        foreach ($out as $varName) {
            $outLabels[mb_strtolower(trim((string) ($labels[$varName] ?? '')), 'UTF-8')] = true;
        }
        $given = array_values(array_filter(array_values(array_diff($in, $out)), static function (string $var) use ($labels, $outLabels): bool {
            $label = mb_strtolower(trim((string) ($labels[$var] ?? '')), 'UTF-8');
            return $label === '' || !isset($outLabels[$label]);
        }));

        $firstOut = self::names($out, $labels, 2);
        $firstIn  = $given === [] ? '' : self::names($given, $labels, 3);
        /* Labels are printed mid-sentence, so they lose a sentence-case capital
           there; at the start of one they keep it. */
        $oneIn  = $given === [] ? '' : self::inSentence((string) ($labels[$given[0]] ?? ''));
        $oneOut = $out === [] ? '' : self::inSentence((string) ($labels[$out[0]] ?? ''));
        $unit   = $out === [] ? '' : self::unitText($unitOf[$out[0]]['key'] ?? null, $unitOf[$out[0]]['default'] ?? null, $unitOf[$out[0]]['suffix'] ?? '');

        $parts = [];
        if ($in === [] || $out === []) {
            $parts[] = sprintf(self::pick($seed, 'intro2', [
                '%s works out %s.',
                '%s reports %s.',
                '%s returns %s from the values already on the page.',
            ]), $name, $firstOut);
        } elseif ($given === []) {
            /* Every box the reader can fill is named like an answer: the page is
               a converter, and saying so is truer than naming a side. */
            $sides = [];
            foreach ($out as $varName) {
                $label = self::inSentence((string) ($labels[$varName] ?? ''));
                if ($label !== '' && !in_array($label, $sides, true)) {
                    $sides[] = $label;
                }
            }
            $pair = self::plainList(array_slice($sides, 0, 2));
            $parts[] = sprintf(self::pick($seed, 'intro5', [
                '%s converts between %s: put a value in either box and the other one is worked out.',
                '%s works in both directions, between %s.',
                '%s reads one of %s from the other, so either can be the value you fill in.',
            ]), $name, $pair !== '' ? $pair : 'the two sides');
        } else {
            $frame = self::pick($seed, 'intro', ['a', 'b', 'c', 'd']);
            $parts[] = match ($frame) {
                'a' => sprintf('%s works out %s from %s.', $name, $firstOut, $firstIn),
                'b' => sprintf('%s takes %s and returns %s.', $name, $firstIn, $firstOut),
                'c' => sprintf('Enter %s into %s and the answer comes back as %s.', $firstIn, $name, $firstOut),
                default => sprintf('%s turns %s into %s.', $name, $firstIn, $firstOut),
            };
        }

        if ($oneOut !== '' && $oneIn !== '') {
            $parts[] = sprintf(self::pick($seed, 'intro3', [
                'Nothing is looked up on this page: %s is computed from %s and the other boxes, so an unusual pair of values gives an honest answer rather than an error.',
                'It is a single relationship that reads %s out of %s, not a table of canned results keyed by them.',
                'The arithmetic is the whole method: %s is worked out from %s by one formula, applied once.',
                'There is no hidden constant here: change %s and %s moves with it.',
            ]), $oneOut, $oneIn);
        }

        if ($unit !== '') {
            $parts[] = sprintf(self::pick($seed, 'intro4', [
                'The main result, %s, is reported in %s.',
                '%s comes back in %s unless you switch the unit chip beside the box.',
                'Units for %s default to %s and can be changed on the answer itself.',
                '%s is opened in %s; the chip beside it switches to any unit of the same quantity.',
            ]), self::atStart((string) ($labels[$out[0]] ?? '')), $unit);
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
        $html  = '<p>' . self::rich(sprintf($frame, ...$frames[$frame])) . '</p>';

        if ($formulas !== [] && strlen($formulas[0]['expr']) <= 240) {
            $lead = $formulas[0];
            $html .= '<p>' . self::rich(sprintf(self::pick($seed, 'how2', [
                "In the form's own words, %s = %s.",
                'Written with the labels from the form, %s = %s.',
                'The relationship it solves reads %s = %s.',
            ]), $lead['label'], $lead['expr'])) . '</p>';
        }

        if ($out !== []) {
            $html .= '<p>' . self::rich(sprintf(self::pick($seed, 'how3', [
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

        $html = '<p>' . self::rich(sprintf(self::pick($seed, 'fields1', [
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

        $html = '<p>' . self::rich(sprintf(self::pick($seed, 'ex1', [
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
            $html .= '<p>' . self::rich(sprintf(self::pick($seed, 'read1', [
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
            $html .= '<p>' . self::rich(sprintf(self::pick($seed, 'read2', [
                'Units are handled before the formula runs: %s offers %d units and opens on %s, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.',
                'The unit chip on %s lists %d options and opens on %s. Moving it changes the conversion applied to that row, not the number stored behind it.',
            ]), $labels[$first] ?? $first, $switchers[$first][0], $switchers[$first][1])) . '</p>';
        } else {
            $subject = $out !== [] ? ($labels[$out[0]] ?? 'this page') : 'this page';
            $html .= '<p>' . self::rich(sprintf(self::pick($seed, 'read3', [
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
            $html .= '<p>' . self::rich(sprintf(self::pick($seed, 'read4', [
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
        /* Each rearrangement named with the case it is for: this is the part a
           reader keeps coming back to ("I have the answer, I want the input"). */
        if (count($formulas) > 1) {
            $detail = [];
            $budget = 0;
            foreach ($formulas as $formula) {
                /* A page built on a dataset can carry a formula per row; a list
                   of fifty-thousand-character lines is not prose. */
                if (strlen($formula['expr']) > 240 || $budget > 300) {
                    continue;
                }
                $budget += str_word_count($formula['expr']) + 12;
                $reads = [];
                foreach ($formula['rhs'] as $dep) {
                    if (isset($labels[$dep])) {
                        $reads[] = self::clean((string) $labels[$dep]);
                    }
                }
                $detail[] = '<li><strong>' . View::escape($formula['label']) . '</strong> = <code>'
                    . View::escape($formula['expr']) . '</code> — the form to use when '
                    . ($reads === [] ? 'the other values are known' : View::escape(self::plainNames($reads, 4)) . ' are the values you have')
                    . '.</li>';
                if (count($detail) >= 8) {
                    break;
                }
            }
            $html .= '<p>' . View::escape(self::pick($seed, 'f3', [
                'Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:',
                'The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:',
            ])) . '</p><ul>' . implode('', $detail) . '</ul>';
        }

        if (count($targets) > 1) {
            $html .= '<p>' . self::rich(sprintf(self::pick($seed, 'f2', [
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

        $html = '<p>' . self::rich(sprintf(self::pick($seed, 'check1', [
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
            $traps[] = '<strong>Units left where they were.</strong> ' . self::rich(sprintf(self::pick($seed, 'trap1', [
                '%s carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.',
                'The chip beside %s is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.',
            ]), self::plainNames($switchable, 3)));
        }

        if ($out !== []) {
            $traps[] = '<strong>The answer typed back in.</strong> ' . self::rich(sprintf(self::pick($seed, 'trap2', [
                '%s, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.',
                'A result box can be typed into, and doing so changes the question rather than the arithmetic: with %s filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.',
            ]), self::names($out, $labels, 3) . (count($out) === 1 ? ' is a result' : ' are results')));
        }

        foreach ($in as $var) {
            if (count($traps) >= 4) {
                break;
            }
            $label = self::clean((string) ($labels[$var] ?? $var));
            $traps[] = '<strong>' . View::escape($label) . ' left as a guess.</strong> ' . self::rich(sprintf(self::pick($seed, 'trap4', [
                'A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If %s is unknown, solve for it instead of estimating it — leave it blank.',
                'Anything typed into %s is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.',
            ]), View::escape($label)));
        }

        $traps[] = '<strong>Measurements mixed across scales.</strong> ' . self::rich(sprintf(self::pick($seed, 'trap3', [
            'Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert %s to one scale before entering anything.',
            'A calculation cannot tell a measured value from an estimated one. If %s is an estimate, the answer is only as good as that number, whatever precision the panel displays.',
            'Entering a rounded value is fine; rounding twice is not. Keep full precision in %s and let the panel round the answer once.',
        ]), $in === [] ? 'the measured values' : $labels[$in[0]]));

        return '<ul>' . implode('', array_map(static fn (string $t): string => '<li>' . $t . '</li>', $traps)) . '</ul>';
    }

    /**
     * Each unit chip on the page, with the table behind it.
     *
     * @return array<int,array{label:string,key:string,default:string,options:array}>
     */
    private static function chips(array $in, array $out, array $unitOf, Units $units): array
    {
        $chips = [];
        foreach (array_merge($out, $in) as $var) {
            $entry = $unitOf[$var] ?? [];
            $key = (string) ($entry['key'] ?? '');
            if ($key === '' || !$units->supported($key)) {
                continue;
            }
            $default = (string) ($entry['default'] ?? $units->defaultUnit($key) ?? '');
            $options = [];
            foreach ($units->options($key) as $slug => $u) {
                $options[(string) $slug] = (string) ($u['name'] ?? $slug);
            }
            $chips[$key] = [
                'label'   => $entry['label'] ?? '',
                'key'     => $key,
                'default' => $default,
                'name'    => (string) $units->name($key, $default),
                'options' => $options,
            ];
        }
        return array_values($chips);
    }

    /**
     * The form, box by box: what to put in it, in what unit, and what the page
     * does with a blank one. Built from the label, the unit table and the help
     * line — nothing here is available on another page unless it is the same box.
     */
    private static function sectionGlossary(string $seed, string $name, array $in, array $out, array $labels, array $unitOf, Units $units, array $fields, array $calc): string
    {
        $html = '<p>' . self::rich(sprintf(self::pick($seed, 'gl0', [
            'The boxes on the %s form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.',
            'Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.',
        ]), $name)) . '</p>';

        $items = [];
        foreach ($in as $var) {
            $label = self::clean((string) ($labels[$var] ?? $var));
            $entry = $unitOf[$var] ?? [];
            $key = (string) ($entry['key'] ?? '');
            $unitName = $key !== '' && $units->supported($key)
                ? (string) $units->name($key, $entry['default'] ?? null)
                : '';
            $suffix = trim((string) ($entry['suffix'] ?? ''));

            $sentence = '<strong>' . View::escape($label) . '</strong>';
            if ($unitName !== '') {
                $sentence .= ' is a ' . View::escape(strtolower($unitName)) . ' quantity: the page opens it in '
                    . View::escape(self::unitShort($entry)) . ' and converts anything else you pick before the formula runs';
            } elseif ($suffix !== '') {
                $sentence .= ' is measured in ' . View::escape($suffix);
            } else {
                $sentence .= ' takes a plain number with no unit attached';
            }
            $sentence .= '.';

            $help = trim((string) ($fields['help'][$var] ?? ''));
            if ($help !== '' && mb_strlen($help) > 12) {
                $sentence .= ' ' . rtrim(View::escape($help), '.') . '.';
            }

            /* What the page does with it, read off the equations rather than
               guessed: which result it feeds, and in which direction. */
            $feeds = [];
            foreach ((array) ($calc['equations'] ?? []) as $equation) {
                foreach ((array) ($equation['variants'] ?? []) as $variant) {
                    $rhs = array_values((array) ($variant['rhs'] ?? []));
                    $lhs = (string) ($variant['lhs'] ?? '');
                    if ($lhs !== '' && in_array($var, $rhs, true) && isset($labels[$lhs])) {
                        $feeds[$lhs] = true;
                    }
                }
            }
            if ($feeds !== []) {
                $names = [];
                foreach (array_keys($feeds) as $target) {
                    $names[] = self::clean((string) $labels[$target]);
                }
                $sentence .= ' ' . sprintf(self::pick($seed, 'gl1', [
                    'It feeds %s.',
                    'The page reads it when it works out %s.',
                    'Change it and %s changes with it.',
                ]), self::plainNames($names, 3));
            }

            $type = (string) ($calc['variables'][$var]['type'] ?? 'numerical');
            if ($type === 'valueSelect') {
                $options = (array) ($calc['variables'][$var]['datasets'][0]['options'] ?? []);
                $sentence .= ' ' . sprintf(self::pick($seed, 'gl2', [
                    'This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each.',
                    'It is picked from a list, and the list matters — the options are not labels for the same number.',
                ]));
            }

            /* What to have ready, and what a wrong value costs — named after
               this box, so the paragraph cannot be lifted onto another page. */
            $sentence .= ' ' . sprintf(self::pick($seed, 'gl4', [
                'Have it to hand before you start: %s is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.',
                'Fill it from a measurement rather than a memory — %s is the kind of value that gets estimated once and then copied from page to page for years.',
            ]), View::escape($label));
            $items[] = '<li>' . $sentence . '</li>';
        }

        $html .= '<ul>' . implode('', $items) . '</ul>';

        if ($out !== []) {
            $html .= '<p>' . View::escape(self::pick($seed, 'gl3', [
                'Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.',
                'None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.',
            ])) . '</p>';
        }

        return $html;
    }

    /**
     * How much a ten-per-cent change in each box moves each answer.
     *
     * Computed, not asserted: the page's own defaults are solved, then each
     * input in turn is multiplied by 1.1 and the answers compared. It is the
     * table an engineer would draw before trusting a formula, and no other page
     * on the site has the same numbers in it.
     */
    private static function sectionSensitivity(string $seed, string $name, array $calc, Units $units, array $labels, array $unitOf, array $example): string
    {
        $rows = [];
        $outs = array_keys($example['out']);
        if ($outs === [] || count($example['in']) === 0) {
            return '';
        }

        foreach ($example['in'] as $var => $value) {
            $value = (float) $value;
            if ($value == 0.0) {
                continue;
            }
            $alt = $example['in'];
            $alt[$var] = $value * 1.1;
            $solved = Solver::solve($calc, $alt, $units);

            $cells = [];
            $biggest = 0.0;
            foreach ($outs as $out) {
                $before = (float) $example['out'][$out];
                $after = $solved->values[$out] ?? null;
                if ($after === null || !is_finite((float) $after) || abs($before) < 1e-12) {
                    $cells[$out] = null;
                    continue;
                }
                $pct = (((float) $after - $before) / abs($before)) * 100.0;
                $cells[$out] = $pct;
                $biggest = max($biggest, abs($pct));
            }
            $rows[] = ['var' => $var, 'label' => self::clean((string) ($labels[$var] ?? $var)), 'cells' => $cells, 'peak' => $biggest];
        }
        if ($rows === []) {
            return '';
        }

        $html = '<p>' . self::rich(sprintf(self::pick($seed, 'sens0', [
            'A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:',
            'Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page\'s own defaults and records what happens to every answer:',
        ]), $name)) . '</p>';

        $html .= '<table class="calc-table"><thead><tr><th>Box</th>';
        foreach ($outs as $out) {
            $html .= '<th>' . View::escape(self::clean((string) ($labels[$out] ?? $out))) . '</th>';
        }
        $html .= '</tr></thead><tbody>';
        foreach ($rows as $row) {
            $html .= '<tr><td><strong>' . View::escape($row['label']) . '</strong> +10%</td>';
            foreach ($outs as $out) {
                $pct = $row['cells'][$out] ?? null;
                $html .= '<td>' . ($pct === null ? '—' : ($pct >= 0 ? '+' : '') . self::num(round($pct, 2)) . '%') . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</tbody></table>';

        /* Read the table back in words: the most sensitive box gets named. */
        usort($rows, static fn (array $a, array $b): int => $b['peak'] <=> $a['peak']);
        $top = $rows[0];
        $flat = array_values(array_filter($rows, static fn (array $r): bool => $r['peak'] < 0.5));
        $html .= '<p>' . self::rich(sprintf(self::pick($seed, 'sens1', [
            'The steepest column belongs to %s: ten per cent there moves an answer by about %s per cent, which is why that is the number to measure twice. %s',
            'Ranked by leverage, %s sits at the top — a ten per cent error in that box shows up as roughly %s per cent in the answer. %s',
        ]), $top['label'], self::num(round($top['peak'], 1)), $flat === []
            ? 'Every box on the form carries some of the answer; none of them can be estimated without moving the result.'
            : 'By contrast, ' . self::plainNames(array_map(static fn (array $r): string => $r['label'], $flat), 3)
              . ' barely move the answers at all, so a rough figure there costs you little.')) . '</p>';

        $html .= '<p>' . View::escape(self::pick($seed, 'sens2', [
            'This is the same arithmetic a spreadsheet model would do, done here with the page\'s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.',
            'The numbers above come from the page\'s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.',
        ])) . '</p>';

        return $html;
    }

    /** Two more solves at different numbers, written up so the trend is visible. */
    private static function sectionScenarios(string $seed, string $name, array $calc, Units $units, array $labels, array $unitOf, array $example): string
    {
        if (count($example['in']) === 0) {
            return '';
        }
        $html = '<p>' . View::escape(self::pick($seed, 'sc0', [
            'One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:',
            'Two further runs, at numbers you are more likely to meet than the defaults:',
        ])) . '</p>';

        $outOf = static function (array $in) use ($calc, $units): array {
            $solved = Solver::solve($calc, $in, $units);
            $out = [];
            foreach ($solved->values as $name => $value) {
                if (!isset($in[$name]) && is_finite((float) $value) && empty($solved->placeholder[$name])) {
                    $out[$name] = (float) $value;
                }
            }
            return $out;
        };

        /* Scenario A: every input halved. Scenario B: the first input tripled. */
        $halved = [];
        foreach ($example['in'] as $var => $value) {
            $halved[$var] = (float) $value / 2;
        }
        $first = array_key_first($example['in']);
        $tripled = $example['in'];
        $tripled[$first] = (float) $tripled[$first] * 3;

        $scenarios = [
            ['in' => $halved, 'out' => $outOf($halved), 'title' => 'every input halved'],
            ['in' => $tripled, 'out' => $outOf($tripled), 'title' => self::clean((string) ($labels[$first] ?? $first)) . ' tripled, everything else unchanged'],
        ];

        $html .= '<ul>';
        foreach ($scenarios as $scenario) {
            if ($scenario['out'] === []) {
                continue;
            }
            $inBits = [];
            foreach ($scenario['in'] as $var => $value) {
                $unit = self::unitShort($unitOf[$var] ?? []);
                $inBits[] = View::escape(self::clean((string) ($labels[$var] ?? $var))) . ' = ' . self::num((float) $value) . ($unit !== '' ? ' ' . View::escape($unit) : '');
            }
            $outBits = [];
            foreach ($scenario['out'] as $var => $value) {
                $unit = self::unitShort($unitOf[$var] ?? []);
                $outBits[] = '<strong>' . View::escape(self::clean((string) ($labels[$var] ?? $var))) . '</strong> = '
                    . self::num((float) $value) . ($unit !== '' ? ' ' . View::escape($unit) : '');
            }
            $html .= '<li>' . sprintf(self::pick($seed, 'sc1', [
                'With %s, the answer is %s.',
                'Feed in %s and the page reports %s.',
            ]), self::plainList($inBits), self::plainList($outBits)) . '</li>';
        }
        $html .= '</ul>';

        $html .= '<p>' . View::escape(self::pick($seed, 'sc2', [
            'Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.',
            'The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.',
        ])) . '</p>';

        return $html;
    }

    /**
     * The unit tables this page uses, named with the options they offer.
     * Specific to the page because the tables are the page's own.
     */
    private static function sectionUnits(string $seed, string $name, array $chips, Units $units): string
    {
        $html = '<p>' . self::rich(sprintf(self::pick($seed, 'un0', [
            'A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on %s actually offers.',
            'Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:',
        ]), $name)) . '</p>';

        $html .= '<ul>';
        foreach ($chips as $chip) {
            $names = array_values($chip['options']);
            $count = count($names);
            $sample = self::plainNames(array_slice($names, 1, 6), 6);
            $html .= '<li><strong>' . View::escape($chip['name']) . '</strong> — '
                . $count . ' units. It opens in <em>' . View::escape($chip['default']) . '</em>'
                . ($sample !== '' ? ', and the chip also carries ' . View::escape($sample) : '')
                . '. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li>';
        }
        $html .= '</ul>';

        $html .= '<p>' . View::escape(self::pick($seed, 'un1', [
            'Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.',
            'The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.',
        ])) . '</p>';

        return $html;
    }

    /**
     * The result panel, value by value.
     *
     * Every answer the page prints gets its own paragraph: what it is, in what
     * unit, what "normal" looks like when the page's own defaults give a value
     * to compare against, and what a reader should do with it. This is the part
     * of the article a person actually came for, and it is the part the old
     * template never wrote.
     */
    private static function sectionOutputs(string $seed, string $name, array $out, array $labels, array $unitOf, Units $units, array $fields, array $calc, ?array $example): string
    {
        $html = '<p>' . self::rich(sprintf(self::pick($seed, 'out0', [
            'The panel reports %s. Here is what each one is for, and what to compare it against.',
            'Each box below is a different question about the same calculation. Read them in this order:',
        ]), self::countNoun(count($out), 'value', 'values'))) . '</p>';

        $items = [];
        foreach ($out as $var) {
            $label = self::clean((string) ($labels[$var] ?? $var));
            $entry = $unitOf[$var] ?? [];
            $key = (string) ($entry['key'] ?? '');
            $unit = $key !== '' && $units->supported($key) ? (string) $units->name($key, $entry['default'] ?? null) : '';

            $sentence = '<strong>' . View::escape($label) . '</strong>';
            $sentence .= $unit !== ''
                ? ' is a ' . View::escape(strtolower($unit)) . ' figure'
                : ' is a plain number';
            if ($example !== null && isset($example['out'][$var])) {
                $sentence .= ' and the page\'s own defaults put it at ' . self::num((float) $example['out'][$var])
                    . ($unit !== '' ? ' ' . View::escape(self::unitShort($entry)) : '');
            }
            $sentence .= '.';

            /* What produces it, named from the equations. */
            $producer = null;
            foreach ((array) ($calc['equations'] ?? []) as $equation) {
                foreach ((array) ($equation['variants'] ?? []) as $variant) {
                    if ((string) ($variant['lhs'] ?? '') === $var) {
                        $producer = array_values((array) ($variant['rhs'] ?? []));
                        break 2;
                    }
                }
            }
            if ($producer !== []) {
                $reads = [];
                foreach ($producer as $dep) {
                    if (isset($labels[$dep])) {
                        $reads[] = self::clean((string) $labels[$dep]);
                    }
                }
                if ($reads !== []) {
                    $sentence .= ' ' . sprintf(self::pick($seed, 'out1', [
                        'It is worked out from %s.',
                        'The value follows from %s.',
                        'It is computed from %s, so it changes the moment any of them does.',
                    ]), self::plainNames($reads, 4));
                }
            } else {
                $sentence .= ' ' . self::pick($seed, 'out2', [
                    'The page computes it from the form as a whole rather than from one line of the formula.',
                    'It is produced by the page\'s own calculation, which reads the form rather than one equation.',
                ]);
            }

            /* How to read it, generically but concretely. */
            $sentence .= ' ' . self::pick($seed, 'out3', [
                'Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working.',
                'Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal.',
                'Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation.',
            ]);

            $sentence .= ' ' . self::pick($seed, 'out4', [
                'It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.',
                'Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.',
                'It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.',
            ]);
            $items[] = '<li>' . $sentence . '</li>';
        }

        return $html . '<ul>' . implode('', $items) . '</ul>';
    }

    /**
     * The pages whose arithmetic lives in a script rather than in equations.
     *
     * These are sequences, protein strings, primers: the page reads text, runs
     * its own code and prints a panel. Nothing is hidden about that, and saying
     * so is more useful than a formula section that does not exist.
     */
    private static function sectionScript(string $seed, string $name, array $in, array $out, array $labels, array $calc): string
    {
        $reads = [];
        foreach ($in as $var) {
            $reads[] = self::clean((string) ($labels[$var] ?? $var));
        }
        $prints = [];
        foreach ($out as $var) {
            $prints[] = self::clean((string) ($labels[$var] ?? $var));
        }

        $html = '<p>' . self::rich(sprintf(self::pick($seed, 'sc0', [
            '%s is not a single equation with a single answer. It reads %s, applies the analysis the page is built around, and reports %s.',
            'The calculation on this page is a procedure rather than one formula: it takes %s, works through it, and the panel lists %s.',
        ]), $name, $reads === [] ? 'the form' : self::plainNames($reads, 4), $prints === [] ? 'the result' : self::plainNames($prints, 4))) . '</p>';

        $html .= '<p>' . View::escape(self::pick($seed, 'sc1', [
            'That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.',
            'The processing runs locally: the text you enter stays in the page, the script reads it, and the results are printed beside it. Nothing about your input is stored after you leave.',
        ])) . '</p>';

        $html .= '<p>' . View::escape(self::pick($seed, 'sc2', [
            'What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.',
            'Because the script works on exactly what it is given, the usual failure is not arithmetic but input: trailing spaces, a header line from a FASTA file, an ambiguous base in the middle of a sequence. Check that the box holds the characters you meant and nothing else.',
        ])) . '</p>';

        if ($prints !== []) {
            $html .= '<p>' . self::rich(sprintf(self::pick($seed, 'sc3', [
                'The results to look at are %s. They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.',
                'What comes back is %s — the same input described several ways, which is why the panel lists them side by side rather than picking one.',
            ]), self::plainNames($prints, 4))) . '</p>';
        }

        return $html;
    }

    /**
     * What this page cannot do, said plainly.
     *
     * Not boilerplate disclaimers: the rounding the record actually asks for,
     * the units its tables actually offer, whether its formulas are linear (and
     * therefore safe to scale) or not, and whether it works in whole days. A
     * reader who knows the limits can use the answer; one who discovers them
     * later stops trusting the page.
     */
    private static function sectionLimits(string $seed, string $name, array $in, array $out, array $labels, array $unitOf, Units $units, array $fields, array $calc): string
    {
        $items = [];

        /* Rounding, from the record. */
        $places = [];
        foreach ($out as $var) {
            $rnd = (array) ($fields['variables'][$var]['rnd'] ?? []);
            if ($rnd !== []) {
                $places[] = strtolower((string) ($rnd[0] ?? '')) === 'standard'
                    ? (int) ($rnd[1] ?? 0)
                    : (int) ceil(-log10(max(1e-12, (float) ($rnd[1] ?? 0.01))));
            }
        }
        if ($places !== []) {
            $p = max($places);
            $items[] = '<strong>Precision is display precision.</strong> ' . self::rich(sprintf(
                self::pick($seed, 'lim1', [
                    'The panel shows at most %d decimal places, so two inputs that differ beyond that will look as though they give the same answer. The calculation behind the display keeps the full number.',
                    'Results are drawn to %d decimals. That is enough for reading, not enough for chaining: use the underlying value, not the printed one, if the next step is another calculation.',
                ]),
                $p
            ));
        }

        /* Linearity, read off the formulas rather than assumed. */
        $nonLinear = false;
        foreach ((array) ($calc['equations'] ?? []) as $equation) {
            foreach ((array) ($equation['variants'] ?? []) as $variant) {
                if (preg_match('~(?<![A-Za-z0-9_])(log|ln|exp|sqrt|pow|sin|cos|tan)\s*\(|[\^]~i', (string) ($variant['formula'] ?? ''))) {
                    $nonLinear = true;
                    break 2;
                }
            }
        }
        if ($out !== []) {
            $firstOut = self::clean((string) ($labels[$out[0]] ?? $out[0]));
            $items[] = '<strong>' . View::escape($nonLinear ? 'It does not scale in a straight line.' : 'It scales in a straight line.') . '</strong> '
                . View::escape($nonLinear
                    ? sprintf(self::pick($seed, 'lim2a', [
                        'Because the relationship behind %s is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.',
                        '%s is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.',
                    ]), $firstOut)
                    : sprintf(self::pick($seed, 'lim2b', [
                        'The relationship behind %s is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.',
                        '%s follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.',
                    ]), $firstOut));
        }

        /* Unit tables: entries, not conversions. */
        $chips = self::chips($in, $out, $unitOf, $units);
        if ($chips !== []) {
            $names = [];
            foreach ($chips as $chip) {
                $names[] = $chip['name'];
            }
            $items[] = '<strong>Only the listed units.</strong> ' . self::rich(sprintf(
                self::pick($seed, 'lim3', [
                    'The chips cover %s. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.',
                    'The unit tables here are %s and nothing beyond them. There is no "other" option, so an unusual unit has to be converted by hand first.',
                ]),
                self::plainNames(array_values(array_unique($names)), 3)
            ));
        }

        /* Date pages work in whole days. */
        $hasDate = false;
        foreach ((array) ($calc['variables'] ?? []) as $var) {
            if (in_array((string) ($var['type'] ?? ''), ['date', 'datetime', 'time'], true)) {
                $hasDate = true;
                break;
            }
        }
        if ($hasDate) {
            $items[] = '<strong>It counts in whole days.</strong> ' . View::escape(self::pick($seed, 'lim4', [
                'Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.',
                'The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day\'s uncertainty if the event itself happened at an unknown time.',
            ]));
        }

        /* What the formula does not model. */
        $items[] = '<strong>It is a formula, not a model of your case.</strong> ' . self::rich(sprintf(
            self::pick($seed, 'lim5', [
                'The page assumes %s are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.',
                'Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.',
            ]),
            $in === [] ? 'the values you enter' : self::plainNames(array_map(static fn ($v): string => self::clean((string) ($labels[$v] ?? $v)), array_slice($in, 0, 3)), 3)
        ));

        return '<ul>' . implode('', array_map(static fn (string $t): string => '<li>' . $t . '</li>', $items)) . '</ul>';
    }

    /**
     * The pages that take text rather than numbers.
     *
     * A sequence is the one input a calculator can choke on without looking
     * broken: a header line from a FASTA file, a space every eighty characters,
     * a lower-case base. This section is about the box, not the arithmetic.
     */
    private static function sectionText(string $seed, string $name, array $textInputs, array $labels, array $out, array $calc): string
    {
        $names = [];
        foreach ($textInputs as $var) {
            $names[] = '<strong>' . View::escape(self::clean((string) ($labels[$var] ?? $var))) . '</strong>';
        }

        $html = '<p>' . self::rich(sprintf(self::pick($seed, 'tx0', [
            '%s takes text, not a number, so the way it is pasted decides whether the analysis is right.',
            'The box labelled %s is the input the whole page is built around. It holds characters, and the page reads every one of them.',
        ]), self::plainNames($names, 3))) . '</p>';

        $html .= '<ul>'
            . '<li><strong>No header line.</strong> ' . View::escape(self::pick($seed, 'tx1', [
                'A FASTA file starts with a line that begins with ">" — a name, not a sequence. Paste from the line below it, or that line is read as characters of its own.',
                'If the text was copied out of a file, check that the first line is not a description. Anything before the first real base or residue is counted as data.',
            ])) . '</li>'
            . '<li><strong>No spaces or line numbers.</strong> ' . View::escape(self::pick($seed, 'tx2', [
                'Nucleotide and protein text is often printed in blocks of sixty or eighty characters. Line breaks are usually fine; spaces, tabs and the numbers down the side are not.',
                'Sequence viewers wrap the text and number the lines. The numbers are not part of the sequence, and a paste that includes them will fail or, worse, half-succeed.',
            ])) . '</li>'
            . '<li><strong>Case is a choice you make.</strong> ' . View::escape(self::pick($seed, 'tx3', [
                'Upper-case is the convention, but lower-case is often used to mark a region such as soft-masked repeats. Whether the page folds case or respects it is part of what it is telling you, so keep the case you mean.',
                'Many tools treat upper and lower case as the same letters and others do not. Paste the sequence in the case that carries the meaning you intend.',
            ])) . '</li>'
            . '<li><strong>Ambiguous characters are not rare.</strong> ' . View::escape(self::pick($seed, 'tx4', [
                'An N in a sequence, an X in a protein, or an IUPAC code standing for two possible bases is a real value, not a typo. The page will count it; interpret the answer with that in mind.',
                'Sites where the read was uncertain are usually written as N or as a degenerate code. They are counted like any other character, which is right, but it means the answer describes the text as written rather than the molecule as it is.',
            ])) . '</li>'
            . '</ul>';

        $prints = [];
        foreach ($out as $var) {
            $prints[] = self::clean((string) ($labels[$var] ?? $var));
        }
        if ($prints !== []) {
            $html .= '<p>' . self::rich(sprintf(self::pick($seed, 'tx5', [
                'Paste once, check the first and last few characters of what landed in the box, and then read %s. If one of those figures is impossible — a length that does not match the text, a count larger than the sequence — the paste is the thing to look at first, not the formula.',
                'The quick check is always the same: does the reported length match the text you pasted? If %s disagree with what you can count by eye, the box is holding something you did not intend to give it.',
            ]), self::plainNames($prints, 4))) . '</p>';
        }

        return $html;
    }

    /** Four steps, in this page's own box names — the short page's walkthrough. */
    private static function sectionSteps(string $seed, string $name, array $in, array $out, array $labels, array $unitOf, array $calc): string
    {
        $firstIn = $in === [] ? '' : self::clean((string) ($labels[$in[0]] ?? $in[0]));
        $firstOut = $out === [] ? '' : self::clean((string) ($labels[$out[0]] ?? $out[0]));
        $unit = $out === [] ? '' : self::unitShort($unitOf[$out[0]] ?? []);

        $steps = [];
        if ($in !== []) {
            $all = [];
            foreach ($in as $var) {
                $all[] = self::clean((string) ($labels[$var] ?? $var));
            }
            $steps[] = '<strong>Collect the inputs.</strong> ' . self::rich(sprintf(self::pick($seed, 'st1', [
                'You need %s. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.',
                'Have %s ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.',
            ]), self::plainNames($all, 4)));
        }

        $steps[] = '<strong>Enter them and press Calculate.</strong> ' . self::rich(sprintf(self::pick($seed, 'st2', [
            'Type %s into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.',
            'Fill the form — starting with %s — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.',
        ]), $firstIn === '' ? 'the values' : View::escape($firstIn)));

        $steps[] = '<strong>Read the answer against the defaults.</strong> ' . self::rich(sprintf(self::pick($seed, 'st3', [
            'Compare %s with the figure the page\'s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.',
            'Check %s against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.',
        ]), $firstOut === '' ? 'the result' : View::escape($firstOut . ($unit !== '' ? ' in ' . $unit : ''))));

        $steps[] = '<strong>Change one box to check your understanding.</strong> ' . View::escape(self::pick($seed, 'st4', [
            'Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.',
            'The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.',
        ]));

        return '<ol>' . implode('', array_map(static fn (string $t): string => '<li>' . $t . '</li>', $steps)) . '</ol>'
            . '<p>' . View::escape(self::pick($seed, 'st5', [
                'That is the whole procedure. Everything else on this page is the reasoning behind it.',
                'Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.',
            ])) . '</p>';
    }

    /** What a reader does with the number once they have it. */
    private static function sectionUse(string $seed, string $name, array $in, array $out, array $labels, array $unitOf, array $calc): string
    {
        $outs = [];
        foreach ($out as $var) {
            $unit = self::unitShort($unitOf[$var] ?? []);
            $outs[] = self::clean((string) ($labels[$var] ?? $var)) . ($unit !== '' ? ' (' . $unit . ')' : '');
        }
        $ins = [];
        foreach (array_slice($in, 0, 4) as $var) {
            $ins[] = self::clean((string) ($labels[$var] ?? $var));
        }

        $html = '<p>' . self::rich(sprintf(self::pick($seed, 'use1', [
            'An answer from %s is a number to act on, so the useful question is what to do with %s once the panel shows it.',
            'Getting the figure is half the job. The other half is what %s is for, and what it is not.',
        ]), $name, $outs === [] ? 'it' : self::plainNames($outs, 3))) . '</p>';

        $html .= '<ul>'
            . '<li><strong>Record the inputs with the answer.</strong> ' . self::rich(sprintf(self::pick($seed, 'use2', [
                'A number on its own is not reproducible. Write down %s alongside it — a week later the answer is checkable and the reasoning is not.',
                'If the result is going into a note or a report, put %s beside it. That is what makes the figure something a colleague can verify rather than take on trust.',
            ]), $ins === [] ? 'the values you used' : self::plainNames($ins, 4))) . '</li>'
            . '<li><strong>Re-run it when a measurement changes.</strong> ' . View::escape(self::pick($seed, 'use3', [
                'The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.',
                'There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.',
            ])) . '</li>'
            . '<li><strong>Keep the formula with the figure.</strong> ' . View::escape(self::pick($seed, 'use6', [
                'The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.',
                'A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.',
            ])) . '</li>'
            . '<li><strong>Compare rather than convert.</strong> ' . View::escape(self::pick($seed, 'use4', [
                'The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.',
                'Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.',
            ])) . '</li>'
            . '</ul>';

        $html .= '<p>' . View::escape(self::pick($seed, 'use5', [
            'None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.',
            'The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.',
        ])) . '</p>';

        return $html;
    }

    /** Provenance: what this page is, how it was checked, what it keeps. */
    private static function sectionAbout(string $seed, string $name, array $in, array $out, array $labels, array $calc): string
    {
        $up = (string) ($calc['updatedAt'] ?? '');
        $when = $up !== '' ? date('j F Y', strtotime($up) ?: time()) : '';

        $html = '<p>' . self::rich(sprintf(self::pick($seed, 'ab1', [
            '%s is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.',
            'The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.',
        ]), $name)) . '</p>';

        $html .= '<p>' . View::escape(self::pick($seed, 'ab2', [
            'Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.',
            'Every figure quoted in the article above was produced by this page\'s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.',
        ])) . '</p>';

        $html .= '<p>' . self::rich(sprintf(self::pick($seed, 'ab3', [
            'What the page keeps is nothing. %s has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.',
            'Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.',
        ]), $when !== '' ? 'Last reviewed ' . $when . '.' : 'The calculation is unchanged between visits.')) . '</p>';

        $html .= '<p>' . self::rich(sprintf(self::pick($seed, 'ab5', [
            'The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.',
            'It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.',
        ]), $name)) . '</p>';

        $html .= '<p>' . View::escape(self::pick($seed, 'ab4', [
            'If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.',
            'The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.',
        ])) . '</p>';

        return $html;
    }

    /**
     * The neighbours, in prose rather than a card grid: what each one answers
     * that this page does not, so a reader knows which page to open next.
     */
    private static function sectionPeers(string $seed, string $name, array $in, array $out, array $labels, array $peers): string
    {
        $links = [];
        foreach (array_slice($peers, 0, 3) as $peer) {
            $path = (string) ($peer['path'] ?? '');
            $peerName = trim((string) ($peer['name'] ?? ''));
            if ($path === '' || $peerName === '') {
                continue;
            }
            $links[] = '<a href="' . View::escape(View::url($path)) . '">' . View::escape($peerName) . '</a>';
        }
        if ($links === []) {
            return '';
        }

        $html = '<p>' . self::rich(sprintf(self::pick($seed, 'pe1', [
            'A criterion for choosing between these pages: %s answers a different question from the one above, even where the two share a sentence of explanation.',
            'Neighbouring pages resolve the parts of the same job that %s leaves alone. Knowing which is which saves running the wrong one:',
        ]), $name)) . '</p>';

        $html .= '<p>' . sprintf(self::pick($seed, 'pe2', [
            'The nearest are %s. Each takes its own inputs and reports its own answer, and none of them shares a stored value with this page — open two in separate tabs and they will not interfere.',
            'Worth opening next: %s. They follow the same pattern as this page (form, formula, worked example, answer), so a reader who understands one understands the others.',
        ]), self::plainList($links)) . '</p>';

        $html .= '<p>' . View::escape(self::pick($seed, 'pe3', [
            'If the value you need is not the one reported here but a step before or after it, one of those pages probably reports it directly rather than making you convert by hand.',
            'Using the page that already answers the question you have is better than adapting this one: the formula and the units will match what you expect, and the worked example will be about your case.',
        ])) . '</p>';

        return $html;
    }

    private static function sectionUses(string $seed, string $name, string $cat, array $in, array $out, array $labels, array $peers): string
    {
        $html = '';

        if ($in !== [] && $out !== []) {
            $html .= '<p>' . self::rich(sprintf(self::pick($seed, 'uses1', [
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
            /* The labels, not the variable names: a reader was told to "fill
               temp_primer and annealing_temp", which are the names in the file,
               not the names on the form. */
            $fills = [];
            foreach (array_slice(array_values(array_diff($in, [$out[0] ?? ''])), 0, 3) as $var) {
                $fills[] = self::inSentence(self::clean($labels[$var] ?? $var));
            }
            $faq[] = [
                'q' => 'Which values do I need before I start?',
                'a' => $list . '. ' . sprintf(self::pick($seed, 'q2', [
                    'Fill %s and leave %s empty if you would rather have that one solved instead.',
                    'With %s in place, %s can stay blank and the page will work it out.',
                    'Enter %s; %s is the box to leave alone unless it is the value you came for.',
                ]), self::plainNames($fills, 3), $oneOut),
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
    /**
     * Escape a sentence that this class has already written markup into.
     *
     * Labels are escaped before they are wrapped in <strong> or <code>, so the
     * only angle brackets left in the string belong to this class. Escaping the
     * whole sentence turns them into text — the page then printed
     * "<strong>Insert 1 mass</strong> = 24 ng" word for word, markup and all.
     * No label in any calculator contains an angle bracket, which is what makes
     * restoring these four sequences safe.
     */
    private static function rich(string $html): string
    {
        return str_replace(
            ['&lt;strong&gt;', '&lt;/strong&gt;', '&lt;code&gt;', '&lt;/code&gt;'],
            ['<strong>', '</strong>', '<code>', '</code>'],
            View::escape($html)
        );
    }

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

    /** A label at the start of a sentence: it keeps its capital. */
    public static function atStart(string $label): string
    {
        $label = trim($label);
        if ($label === '') {
            return '';
        }
        $first = mb_substr($label, 0, 1, 'UTF-8');
        return mb_strtoupper($first, 'UTF-8') . mb_substr($label, 1, null, 'UTF-8');
    }

    /**
     * A field label as it reads inside a sentence.
     *
     * "Primer melting temperature" is a heading; mid-sentence it is "primer
     * melting temperature". A label that is an acronym or a proper name is left
     * exactly as the page prints it — the rule only lowercases a capital that
     * is followed by a lowercase letter, which is what a sentence-case label
     * looks like and what an acronym does not.
     */
    public static function inSentence(string $label): string
    {
        $label = trim($label);
        if ($label === '' || preg_match('~^[^\p{L}]~u', $label) === 1) {
            return $label;
        }
        $first = mb_substr($label, 0, 1, 'UTF-8');
        $rest  = mb_substr($label, 1, null, 'UTF-8');
        $second = mb_substr($rest, 0, 1, 'UTF-8');
        if ($first === mb_strtolower($first, 'UTF-8')) {
            return $label;                       // already lower-case
        }
        if ($second !== '' && $second === mb_strtoupper($second, 'UTF-8') && preg_match('~\p{L}~u', $second) === 1) {
            return $label;                       // "DNA copy number", "°C"
        }
        return mb_strtolower($first, 'UTF-8') . $rest;
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

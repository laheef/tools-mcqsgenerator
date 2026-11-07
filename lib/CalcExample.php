<?php

declare(strict_types=1);

namespace Onim;

/**
 * CalcExample — a worked example that is actually about this calculator.
 *
 * Most pages in a bulk-written section end up thin once the shared sentences go,
 * and the one paragraph a calculator page can always afford is the one nobody
 * else can copy: its own numbers, pushed through its own formulas.
 *
 * So this class does the arithmetic rather than dressing a template in new words.
 * It reads the page's visible inputs, seeds them with the defaults the page
 * ships (or a value drawn from the label when there is none), solves with the
 * site's own solver, and writes up the result with the labels and units the page
 * uses. Two pages built from the same template come out with different numbers
 * because their formulas are different; a page whose formula changes gets a new
 * example the next time it is built.
 *
 * The wording is deliberately plain. A calculator page does not need a metaphor
 * for a Punnett square; it needs to show one.
 */
final class CalcExample
{
    /**
     * Build the sections, or an empty array when there is nothing honest to say.
     *
     * @param array $calc  the shaped calculator (Data::calculator)
     * @return array<int,array{title:string,html:string}>
     */
    public static function sections(array $calc, Units $units): array
    {
        $roles  = self::roles($calc);
        $inputs = self::sample($calc, $units);
        if ($inputs === [] || $roles['outputs'] === []) {
            return [];
        }

        $solved = Solver::solve($calc, $inputs, $units);
        $rows   = [];
        foreach (Solver::visibleInputs($calc) as $name => $_) {
            if (isset($inputs[$name])) {
                continue;                       // a box the visitor typed in
            }
            if (isset($solved->values[$name]) && empty($solved->placeholder[$name])) {
                $rows[$name] = $solved->values[$name];
            }
        }
        if ($rows === []) {
            return [];
        }

        $label = static fn (string $name): string => $roles['labels'][$name] ?? $name;
        $suffix = static fn (string $name): string => $roles['suffixes'][$name] ?? '';

        /*  A date is a number of milliseconds, and printed as one it reads as
            1.772e+12 — the eleven date pages in Biology all did, in the worked
            example, the sensitivity table and the two extra runs. Ask the
            variable's type first and give the calendar date instead. */
        $isDate = static function (string $name) use ($calc): bool {
            $t = (string) ($calc['variables'][$name]['type'] ?? '');
            return $t === 'date' || $t === 'datetime';
        };
        $fmt = static function (float $v, string $name = '') use ($isDate): string {
            if ($name !== '' && $isDate($name) && abs($v) > 1.0e10) {
                return (string) gmdate('D j F Y', (int) round($v / 1000));
            }
            $abs = abs($v);
            if ($abs !== 0.0 && ($abs < 0.001 || $abs >= 1000000)) {
                return rtrim(rtrim(sprintf('%.3e', $v), '0'), '.');
            }
            $decimals = $abs >= 100 ? 0 : ($abs >= 1 ? 2 : 4);
            $text = number_format($v, $decimals, '.', '');
            if (str_contains($text, '.')) {
                $text = rtrim(rtrim($text, '0'), '.');
            }
            return $text;
        };

        $inParts = [];
        foreach ($inputs as $name => $value) {
            $unit = $suffix($name);
            $inParts[] = $label($name) . ' = ' . $fmt((float) $value, (string) $name) . ($unit !== '' ? ' ' . $unit : '');
        }
        $outParts = [];
        foreach ($rows as $name => $value) {
            $unit = $suffix($name);
            $outParts[] = '<strong>' . View::escape($label($name)) . '</strong> = '
                . $fmt((float) $value, (string) $name) . ($unit !== '' ? ' ' . View::escape($unit) : '');
        }

        $html = '<p>Take a worked example with numbers a reader might have to hand. '
            . 'Enter ' . View::escape(self::joinList($inParts)) . '. '
            . 'The calculator returns ' . self::joinList($outParts) . '.</p>';

        /* The formula, with the page's own labels in place of the variable
           names — the one place a reader can see why the numbers came out as
           they did. */
        foreach ($calc['equations'] as $entry) {
            foreach ($entry['variants'] as $variant) {
                $lhs  = (string) ($variant['lhs'] ?? '');
                $expr = (string) ($variant['formula'] ?? '');
                if ($lhs === '' || $expr === '' || !isset($roles['labels'][$lhs])) {
                    continue;
                }
                $html .= '<p>The relationship behind those numbers is <strong>'
                    . View::escape(self::humanise($label($lhs))) . '</strong> = <code>'
                    . View::escape(self::humanise($expr)) . '</code>. Nothing in that line is looked up: '
                    . 'every letter is one of the boxes above.</p>';
                break 2;
            }
        }

        return [[
            'title' => 'A worked example with these formulas',
            'html'  => $html,
        ]];
    }

    /**
     * Which boxes are inputs and which are results, from the form itself.
     *
     * @return array{outputs:array<int,string>,labels:array<string,string>,suffixes:array<string,string>}
     */
    public static function roles(array $calc): array
    {
        $labels = [];
        $suffixes = [];
        $outputs = [];
        foreach ($calc['groups'] as $group) {
            foreach ($group['matrices'] as $matrix) {
                foreach ($matrix['columns'] as $column) {
                    foreach ($column as $field) {
                        if (($field['type'] ?? '') !== 'variable') {
                            continue;
                        }
                        $name = (string) ($field['var'] ?? '');
                        if ($name === '') {
                            continue;
                        }
                        $labels[$name] = trim((string) ($field['label'] ?? '')) !== ''
                            ? trim((string) $field['label'])
                            : $name;
                        $suffixes[$name] = trim((string) ($field['suffix'] ?? ''));
                        $type = (string) ($calc['variables'][$name]['type'] ?? 'numerical');
                        if (!empty($field['outputOnly']) || $type === 'dependent') {
                            $outputs[$name] = true;
                        }
                    }
                }
            }
        }
        return ['outputs' => array_keys($outputs), 'labels' => $labels, 'suffixes' => $suffixes];
    }

    /**
     * Sample inputs: the page's own defaults where it has them, otherwise a
     * small number that keeps a division from exploding.
     *
     * @return array<string,float>
     */
    public static function sample(array $calc, ?Units $units = null): array
    {
        /* Only boxes the visitor can type in. A result box is visible too, and
           seeding it is how a worked example ends up quoting its own answer back
           at itself. */
        $typed = [];
        foreach ($calc['groups'] as $group) {
            foreach ($group['matrices'] as $matrix) {
                foreach ($matrix['columns'] as $column) {
                    foreach ($column as $field) {
                        if (($field['type'] ?? '') !== 'variable') {
                            continue;
                        }
                        $name = (string) ($field['var'] ?? '');
                        if ($name === '' || !empty($field['outputOnly'])) {
                            continue;
                        }
                        $type = (string) ($calc['variables'][$name]['type'] ?? 'numerical');
                        if ($type === 'dependent') {
                            continue;
                        }
                        $typed[$name] = $field;
                    }
                }
            }
        }

        /* A name that an equation computes is a result, whatever its control
           looks like — the harvested pages mark some of them as plain numeric
           boxes. Typing into one and then "solving" gives the example its own
           answer back. */
        $computed = [];
        foreach ($calc['equations'] as $entry) {
            foreach ($entry['variants'] as $variant) {
                $computed[(string) ($variant['lhs'] ?? '')] = true;
            }
        }

        $seed = [];
        $n    = 0;
        foreach ($typed as $name => $field) {
            if (isset($computed[$name])) {
                continue;
            }
            $var  = $calc['variables'][$name];
            $type = (string) ($var['type'] ?? 'numerical');
            if ($type === 'valueSelect') {
                $value = Solver::selectValue($calc, $name, $var, null);
                if ($value !== null) {
                    $seed[$name] = $value;
                }
                continue;
            }
            if ($type !== 'numerical') {
                continue;                       // dates and free text are skipped
            }
            $n++;
            $seed[$name] = (float) (2 + ($n % 9));
            $defaults = $var['defaults'] ?? [];
            $first = $defaults[0]['value'] ?? null;
            if ($first !== null && is_numeric($first) && (float) $first > 0) {
                $seed[$name] = (float) $first;
            }
        }

        /*
         * A page that solves in every direction has no variable that is only an
         * input: the harvest shows four boxes and four equations, so skipping
         * everything an equation computes leaves nothing to type in and no
         * example at all. Those pages get one box left as the unknown and the
         * rest seeded.
         */
        if ($seed === [] && $typed !== [] && $units !== null) {
            $names = array_keys($typed);
            $unknown = null;
            $needs = [];
            /*
             * Which box stays empty is the page's subject, not the solver's
             * first preference: for "annealing_temp = 0.3·primer + 0.7·product
             * − 14.9" the compiler offers temp_product first, and seeding on
             * that wrote a worked example that computed the target melting
             * temperature on a page whose answer is the annealing temperature.
             */
            $declaredFor = [];
            foreach ($calc['equations'] as $entry) {
                if (preg_match('~^\s*([A-Za-z_][A-Za-z0-9_]*)\s*=~', (string) ($entry['formula'] ?? ''), $m)) {
                    $declaredFor[] = $m[1];
                }
            }
            foreach ([true, false] as $preferDeclared) {
                foreach ($calc['equations'] as $entry) {
                    foreach ($entry['variants'] as $variant) {
                        $lhs = (string) ($variant['lhs'] ?? '');
                        $rhs = array_values((array) ($variant['rhs'] ?? []));
                        /* Seed the boxes that variant reads and nothing else: the
                           variables it does not mention are then computed, which
                           is what a reader wants to see in a worked example. */
                        if ($lhs !== '' && in_array($lhs, $names, true) && $rhs !== []
                            && array_diff($rhs, $names) === []) {
                            if ($preferDeclared && !in_array($lhs, $declaredFor, true)) {
                                continue;
                            }
                            $unknown = $lhs;
                            $needs = $rhs;
                            break 3;
                        }
                    }
                }
            }
            /*
             * Two passes. The first seeds only the boxes the chosen equation
             * reads, which gives the cleanest example; the second seeds every
             * input box except the unknown, which is what a page needs when its
             * equations have to be chained (area and time both fall out of
             * width, speed, area and overlap, so seeding "just the inputs of
             * one equation" leaves the other one unsolvable).
             */
            $ramps = [[10, 100, 1000], [2, 4, 8], [100, 250, 50], [1, 10, 5]];
            foreach (['needs', 'all'] as $mode) {
            foreach ($ramps as $ramp) {
                $candidate = [];
                $i = 0;
                foreach ($names as $name) {
                    if ($name === $unknown) {
                        continue;
                    }
                    if ($mode === 'needs' && !in_array($name, $needs, true)) {
                        continue;
                    }
                    $type = (string) ($calc['variables'][$name]['type'] ?? 'numerical');
                    if ($type === 'valueSelect') {
                        $value = Solver::selectValue($calc, $name, $calc['variables'][$name], null);
                        if ($value !== null) {
                            $candidate[$name] = $value;
                        }
                        continue;
                    }
                    if ($type !== 'numerical') {
                        continue;
                    }
                    $defaults = $calc['variables'][$name]['defaults'] ?? [];
                    $first = $defaults[0]['value'] ?? null;
                    $candidate[$name] = ($first !== null && is_numeric($first) && (float) $first > 0)
                        ? (float) $first
                        : (float) $ramp[$i % count($ramp)];
                    $i++;
                }
                if ($mode === 'needs' && $needs !== [] && array_diff($needs, array_keys($candidate)) !== []) {
                    continue;                   // a box the formula reads was left blank
                }
                $solved = Solver::solve($calc, $candidate, $units);
                $good = true;
                foreach ($names as $name) {
                    $value = $solved->values[$name] ?? null;
                    if ($value === null || !is_finite((float) $value) || !empty($solved->placeholder[$name])) {
                        $good = false;
                        break;
                    }
                }
                if ($good) {
                    return $candidate;
                }
            }
            }
        }

        return $seed;
    }

    /** "a, b and c" — with <strong> kept when the caller wants markup. */
    private static function joinList(array $parts, string $mode = 'text'): string
    {
        if ($parts === []) {
            return '';
        }
        if (count($parts) === 1) {
            return $parts[0];
        }
        $last = array_pop($parts);
        return implode(', ', $parts) . ($mode === 'html' ? ' and ' : ' and ') . $last;
    }

    /** pow(10,-absorbance) -> easily read as it is, but tidy the call style. */
    public static function humanise(string $expr): string
    {
        $map = [
            'sqrt(' => '√(',
            'log10(' => 'log₁₀(',
            'log(' => 'ln(',
        ];
        $out = str_replace(array_keys($map), array_values($map), $expr);
        $out = str_replace('*', ' × ', $out);
        $out = (string) preg_replace('~pow\(([^,()]+),\s*([^()]+)\)~', '$1^$2', $out);
        return trim((string) preg_replace('~\s+~', ' ', $out));
    }
}

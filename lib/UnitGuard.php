<?php

declare(strict_types=1);

namespace Onim;

/**
 * UnitGuard — which boxes may carry a unit chip, and which may not.
 *
 * A unit chip is a promise: pick centimetres or metres and the page will do the
 * same arithmetic either way. The harvest attached a chip to every box whose
 * record happened to name a unit table, and on most pages that promise holds.
 * It does not hold on three kinds of box, and those are what this class finds:
 *
 *   · a value the formula uses as a plain number — an exponent in `pow()`, the
 *     argument of `log()`/`exp()`/`sqrt()`, a box raised to a power. Converting
 *     hours to minutes inside `(1 + r)^t` multiplies the exponent by sixty while
 *     the growth rate stays per hour, so the answer changes when the unit does;
 *   · a box nothing depends on — the unit switch moves a number that no result
 *     reads, so it looks like an option and works like decoration;
 *   · a count wearing a measurement — "number of trees" offering centimetres.
 *
 * The audit is numeric where it can be: the page's own defaults are solved, one
 * box is doubled, and the result set is compared. A box whose value changes
 * without any answer changing is not participating in the calculation.
 *
 * A chip is only removed when its default unit converts by a factor of one. A
 * percentage box is not decorated: it is how 95% reaches a formula that expects
 * 0.95, and removing the chip would quietly multiply the answer by a hundred.
 * Those chips stay, whatever else the audit thinks of them.
 */
final class UnitGuard
{
    /** The default unit converts by one, so dropping the chip changes no number. */
    private static function identity(Units $units, string $key, ?string $unit): bool
    {
        if ($unit === null || $unit === '') {
            $unit = $units->defaultUnit($key);
        }
        if ($unit === null) {
            return false;
        }
        $pair = $units->linearPair($key, (string) $unit);
        if ($pair === null) {
            return false;
        }
        return abs($pair[0] - 1.0) < 1e-9 && abs($pair[1]) < 1e-9;
    }

    /**
     * Every box on the page, in form order, with the unit table it was given.
     *
     * @return array<string,array{label:string,key:string,unit:?string}>
     */
    private static function chipped(array $calc): array
    {
        $out = [];
        foreach ($calc['groups'] as $group) {
            foreach ($group['matrices'] as $matrix) {
                foreach ($matrix['columns'] as $column) {
                    foreach ($column as $field) {
                        if (($field['type'] ?? '') !== 'variable' || empty($field['var'])) {
                            continue;
                        }
                        $key = (string) ($field['unitSwitcher'] ?? '');
                        if ($key === '') {
                            continue;
                        }
                        /* A result box is allowed to choose the unit it is
                           *displayed* in; the audit is about inputs. */
                        $type = (string) ($calc['variables'][$field['var']]['type'] ?? 'numerical');
                        if (!empty($field['outputOnly']) || in_array($type, ['dependent', 'presentation'], true)) {
                            continue;
                        }
                        $out[(string) $field['var']] = [
                            'label' => trim((string) ($field['label'] ?? '')),
                            'key'   => $key,
                            'unit'  => isset($field['unitDefault']) ? (string) $field['unitDefault'] : null,
                        ];
                    }
                }
            }
        }
        return $out;
    }

    /** The call `fn` wraps around `$var`, if any: log, exp, sqrt, pow-exponent, ^. */
    private static function nonLinearUse(array $calc, string $var): ?string
    {
        $needle = '~(?<![A-Za-z0-9_])' . preg_quote($var, '~') . '(?![A-Za-z0-9_])~';
        foreach ($calc['equations'] as $entry) {
            foreach ($entry['variants'] as $variant) {
                $formula = (string) ($variant['formula'] ?? '');
                if ($formula === '' || !preg_match($needle, $formula)) {
                    continue;
                }
                foreach (['log', 'ln', 'exp', 'sqrt', 'sin', 'cos', 'tan'] as $fn) {
                    if (preg_match('~(?<![A-Za-z0-9_])' . $fn . '\s*\(~i', $formula)
                        && self::insideCall($formula, $fn, $var)) {
                        return $fn;
                    }
                }
                if (preg_match('~(?<![A-Za-z0-9_])pow\s*\(~i', $formula) && self::asExponent($formula, $var)) {
                    return 'pow';
                }
                if (preg_match('~(?<![A-Za-z0-9_])[A-Za-z0-9_.]+\s*\^\s*[^ ]*\b' . preg_quote($var, '~') . '\b~', $formula)) {
                    return '^';
                }
            }
        }
        return null;
    }

    /** Is $var inside the parentheses of a call to $fn? */
    private static function insideCall(string $formula, string $fn, string $var): bool
    {
        $offset = 0;
        $needle = '~(?<![A-Za-z0-9_])' . preg_quote($var, '~') . '(?![A-Za-z0-9_])~';
        while (preg_match($needle, $formula, $m, PREG_OFFSET_CAPTURE, $offset)) {
            $pos = (int) $m[0][1];
            $offset = $pos + 1;
            /* Walk back to the nearest opening bracket before the variable and
               see which name sits in front of it. */
            $depth = 0;
            for ($i = $pos - 1; $i >= 0; $i--) {
                $ch = $formula[$i];
                if ($ch === ')') {
                    $depth++;
                } elseif ($ch === '(') {
                    if ($depth > 0) {
                        $depth--;
                        continue;
                    }
                    if (preg_match('~([A-Za-z_][A-Za-z0-9_]*)\s*$~', substr($formula, 0, $i), $nm)) {
                        return strtolower($nm[1]) === strtolower($fn);
                    }
                    return false;
                }
            }
        }
        return false;
    }

    /** Is $var the exponent in pow(base, $var)? */
    private static function asExponent(string $formula, string $var): bool
    {
        if (!preg_match_all('~pow\s*\(~i', $formula, $m, PREG_OFFSET_CAPTURE)) {
            return false;
        }
        foreach ($m[0] as $hit) {
            $open = (int) $hit[1] + strlen($hit[0]) - 1;
            $depth = 0;
            $comma = -1;
            $end = -1;
            for ($i = $open, $len = strlen($formula); $i < $len; $i++) {
                $ch = $formula[$i];
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
            if ($comma === -1 || $end === -1) {
                continue;
            }
            $power = substr($formula, $comma + 1, $end - $comma - 1);
            if (preg_match('~(?<![A-Za-z0-9_])' . preg_quote($var, '~') . '(?![A-Za-z0-9_])~', $power)) {
                return true;
            }
        }
        return false;
    }

    /** Does any equation read $var at all? */
    private static function used(array $calc, string $var): bool
    {
        $needle = '~(?<![A-Za-z0-9_])' . preg_quote($var, '~') . '(?![A-Za-z0-9_])~';
        foreach ($calc['equations'] as $entry) {
            foreach ((array) ($entry['variants'] ?? []) as $variant) {
                $formula = (string) ($variant['formula'] ?? '');
                $rhs = (array) ($variant['rhs'] ?? []);
                if ($formula !== '' && preg_match($needle, $formula)) {
                    return true;
                }
                if (in_array($var, $rhs, true)) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Boxes that must lose the chip, with the reason, keyed by variable.
     *
     * @return array<string,array{label:string,reason:string,unit:?string}>
     */
    public static function audit(array $calc, Units $units): array
    {
        $out = [];
        $chipped = self::chipped($calc);
        if ($chipped === []) {
            return $out;
        }

        $sample = CalcExample::sample($calc, $units);
        $base = null;
        $baseOut = [];
        if ($sample !== []) {
            $solved = Solver::solve($calc, $sample, $units);
            $base = $solved;
            foreach ($solved->values as $name => $value) {
                if (!isset($sample[$name]) && is_finite((float) $value) && empty($solved->placeholder[$name])) {
                    $baseOut[$name] = (float) $value;
                }
            }
        }

        foreach ($chipped as $var => $info) {
            if (!$units->supported($info['key'])) {
                continue;
            }
            if (!self::identity($units, $info['key'], $info['unit'])) {
                continue;                       // the chip is doing real conversion work
            }

            /* A page with a script computes in JavaScript, so "no equation
               reads this box" is not evidence of anything there — the script
               may be the only thing that reads it. */
            $scripted = trim((string) ($calc['js'] ?? '')) !== ''
                && preg_match('~(?<![A-Za-z0-9_])' . preg_quote($var, '~') . '(?![A-Za-z0-9_])~', (string) $calc['js']) === 1;

            $reason = '';
            if (!self::used($calc, $var)) {
                if ($scripted) {
                    continue;
                }
                $reason = 'no formula reads this box';
            } else {
                $call = self::nonLinearUse($calc, $var);
                if ($call !== null) {
                    $reason = 'the formula uses it as a plain number (' . $call . ')';
                }
            }

            if ($reason === '' && !$scripted && $base !== null && isset($sample[$var]) && $baseOut !== []) {
                /* Inert: double it, halve it, and see whether any answer moves. */
                $moved = false;
                foreach ([2.0, 0.5, 3.0] as $factor) {
                    if ((float) $sample[$var] === 0.0 && $factor !== 3.0) {
                        continue;
                    }
                    $alt = $sample;
                    $alt[$var] = (float) $sample[$var] * $factor + ($factor === 3.0 ? 1.0 : 0.0);
                    $solved = Solver::solve($calc, $alt, $units);
                    foreach ($baseOut as $name => $value) {
                        $other = $solved->values[$name] ?? null;
                        if ($other === null || !is_finite((float) $other)) {
                            $moved = true;
                            break 2;
                        }
                        $scale = max(1.0, abs($value));
                        if (abs((float) $other - $value) > 1e-9 * $scale) {
                            $moved = true;
                            break 2;
                        }
                    }
                }
                if (!$moved) {
                    $reason = 'no result depends on it';
                }
            }

            if ($reason !== '') {
                $out[$var] = ['label' => $info['label'], 'reason' => $reason, 'unit' => $info['unit']];
            }
        }

        return $out;
    }

    /**
     * Remove the chip from those boxes, in either file shape: the shorthand
     * (`unit`, `unit_default`) and the engine arrays (`unitKey`, `defaultUnit`,
     * `unitSwitcher`, `unitDefault`).
     */
    public static function drop(array $def, array $vars): array
    {
        if ($vars === []) {
            return $def;
        }
        $drop = array_flip($vars);

        $walk = static function (array $fields) use ($drop): array {
            foreach ($fields as $i => $field) {
                $name = (string) ($field['name'] ?? $field['var'] ?? $field['n'] ?? '');
                if ($name === '' || !isset($drop[$name])) {
                    continue;
                }
                /* Both spellings: the long-form definition and the compact
                   record the exporter writes (`us` = chip, `du` = its unit). */
                foreach (['unit', 'unit_default', 'unitKey', 'unitDefault', 'unitSwitcher', 'us', 'du'] as $key) {
                    if (array_key_exists($key, $field)) {
                        unset($fields[$i][$key]);
                    }
                }
            }
            return $fields;
        };

        foreach ($def['sections'] ?? [] as $si => $section) {
            foreach ($section['blocks'] ?? [] as $bi => $block) {
                if (isset($block['fields'])) {
                    $def['sections'][$si]['blocks'][$bi]['fields'] = $walk((array) $block['fields']);
                }
                foreach ($block['columns'] ?? [] as $ci => $column) {
                    if (is_array($column)) {
                        $def['sections'][$si]['blocks'][$bi]['columns'][$ci] = $walk($column);
                    }
                }
            }
            if (isset($section['fields'])) {
                $def['sections'][$si]['fields'] = array_map(
                    static fn (array $row): array => $walk([$row])[0] ?? $row,
                    (array) $section['fields']
                );
            }
            /* A block written as rows of fields (the panel's own shape). */
            foreach ($section['blocks'] ?? [] as $bi => $block) {
                foreach ($block['rows'] ?? [] as $ri => $row) {
                    $def['sections'][$si]['blocks'][$bi]['rows'][$ri] = $walk((array) $row);
                }
            }
        }

        if (isset($def['raw']['vars'])) {
            foreach ($vars as $var) {
                if (isset($def['raw']['vars'][$var]['unitKey'])) {
                    unset($def['raw']['vars'][$var]['unitKey'], $def['raw']['vars'][$var]['defaultUnit']);
                }
            }
            /* The form rows in a raw block carry their own copy of the chip. */
            foreach ($def['raw']['groups'] ?? [] as $gi => $group) {
                foreach ($group['m'] ?? [] as $mi => $matrix) {
                    foreach ($matrix[1] ?? [] as $ci => $column) {
                        $def['raw']['groups'][$gi]['m'][$mi][1][$ci] = $walk((array) $column);
                    }
                }
            }
        }

        return $def;
    }
}

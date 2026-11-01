<?php
/**
 * The calculator solver.
 *
 * A calculator definition is a system of equations, each shipped with one
 * pre-rearranged variant per unknown. Solving is therefore a fixed-point
 * propagation: keep applying every variant whose right-hand side is fully
 * known until nothing new can be derived. No linear algebra, no iteration on
 * approximations — which is exactly how the original behaves and why filling
 * any two boxes answers the third.
 */

declare(strict_types=1);

namespace Onim;

final class Solver
{
    /** @var array<string,float> */
    public array $values = [];

    /** @var array<string,bool> */
    public array $known = [];

    /** @var array<string,bool> variables produced by the solver (not typed) */
    public array $computed = [];

    /**
     * Dependent variables with no default, seeded with 0 so that helper
     * functions called with an unused argument still evaluate (the reference
     * behaves the same way: an unset optional is 0). They are known to the
     * solver but must never be *displayed* — showing a 0 for a value that was
     * never computed is exactly the bug this set prevents.
     *
     * @var array<string,bool>
     */
    public array $placeholder = [];

    /** @var array<string,array{eq:int,formula:string}> */
    public array $source = [];

    /** @var array<int,int> equation index => variant index that fired */
    public array $fired = [];

    /** @var array<string,string> var => error message for out-of-range input */
    public array $errors = [];

    /** @var array<string,array{0:float,1:float}> base -> formula unit map */
    private array $formulaUnits = [];

    /**
     * @param array<string,float> $inputs already converted to base units
     */
    public static function solve(array $calc, array $inputs, Units $units): self
    {
        $s = new self();
        $s->seed($calc, $units);
        foreach ($inputs as $name => $value) {
            if ($value === null) {
                continue;
            }
            $s->values[$name] = (float) $value;
            $s->known[$name]  = true;
            unset($s->computed[$name]);
        }
        $s->formulaUnits = self::formulaUnits($calc, $units);
        $s->propagate($calc);
        return $s;
    }

    /** Apply defaults: valueSelect option, numeric defaults, dependent rows. */
    private function seed(array $calc, Units $units): void
    {
        $visible = self::visibleInputs($calc);
        foreach ($calc['variables'] as $name => $v) {
            $type = $v['type'] ?? 'numerical';
            if ($type === 'valueSelect') {
                $value = $this->selectValue($calc, $name, $v, null);
                if ($value !== null) {
                    $this->values[$name] = $value;
                    $this->known[$name]  = true;
                }
                continue;
            }
            /*
             * A value the visitor can see carries no seed.
             *
             * Harvested defaults used to be seeded as "known", which meant the
             * page could answer before anybody had typed anything — an answer
             * computed from numbers that were never on screen. So every row the
             * form shows — an input the visitor fills in and an output they are
             * meant to read — starts unknown here.
             *
             * A helper the form never shows (an intermediate growth rate, a
             * sub-total, an unused optional argument to a page function) keeps
             * its harvested constant: that is part of the model, not a value on
             * screen, and dropping it would leave equations with an unknown that
             * no box can ever fill.
             */
            $shown = isset($visible[$name]);
            $default = $this->numericDefault($v);
            $def = $shown ? null : $default;
            if ($def !== null && !empty($v['unitKey'])) {
                // defaults are stored in display units ("95" for 95%), while the
                // solver works in base units (0.95)
                $key = (string) $v['unitKey'];
                if ($units->supported($key)) {
                    $unit = $v['defaultUnit'] ?? $units->defaultUnit($key);
                    if (!$units->offers($key, $unit)) {
                        // A compound default ("deg min sec") has no single-number
                        // factor; the stored default is already in base units.
                        $unit = ($v['defaultUnit'] ?? null) === null
                            ? $units->defaultUnit($key)
                            : null;
                    }
                    $def = $units->toBase($def, $key, $unit);
                }
            }
            /*
             * A dependent row with nothing to go on is still seeded with 0 for
             * the solver's benefit — an optional argument the page's own function
             * never reads (the degrees of freedom of a z-test) would otherwise
             * block an answer that does not depend on it. It is flagged in
             * `placeholder` and never displayed.
             */
            if ($def === null && $type === 'dependent') {
                $def = 0.0;
            }
            if ($def !== null) {
                $this->values[$name] = $def;
                $this->known[$name]  = true;
                if ($type === 'dependent') {
                    if ($shown || $default === null) {
                        $this->placeholder[$name] = true;   // seeded, not derived
                    } else {
                        $this->computed[$name] = true;
                    }
                }
            }
        }
    }

    /**
     * Names the form actually shows a box for (raw group fields marked `t: v`,
     * skipping groups marked hidden). Everything else is internal to the model.
     *
     * @return array<string,bool>
     */
    public static function visibleInputs(array $calc): array
    {
        $out = [];
        foreach ($calc['groups'] ?? [] as $group) {
            if (!empty($group['hidden'])) {
                continue;
            }
            foreach ($group['matrices'] ?? [] as $matrix) {
                foreach ($matrix['columns'] ?? [] as $column) {
                    foreach ((array) $column as $raw) {
                        if (!is_array($raw)) {
                            continue;
                        }
                        if (($raw['type'] ?? '') === 'variable' && isset($raw['var'])) {
                            $out[(string) $raw['var']] = true;      // shaped groups
                        } elseif (($raw['t'] ?? '') === 'v' && isset($raw['n'])) {
                            $out[(string) $raw['n']] = true;        // raw definitions
                        }
                    }
                }
            }
        }
        return $out;
    }

    /** Resolve a valueSelect default (option uid) or a provided option uid. */
    public static function selectValue(array $calc, string $name, array $var, ?string $optionUid): ?float
    {
        $dsUid = $var['datasetUid'] ?? null;
        $ds = $dsUid !== null ? ($calc['datasets'][$dsUid] ?? null) : null;
        if ($ds === null) {
            return null;
        }
        $wanted = $optionUid;
        if ($wanted === null) {
            foreach ($var['defaults'] ?? [] as $d) {
                if (!empty($d['value'])) {
                    $wanted = (string) $d['value'];
                    break;
                }
            }
        }
        /*
         * No first-option fallback. A choice with no stored default used to
         * resolve to whichever option happened to be listed first, which put a
         * value in a field the visitor had not answered and made the field
         * impossible to leave empty. Only an option that was actually chosen —
         * by the caller or by the record's own default — has a value.
         */
        if ($wanted === null) {
            return null;
        }
        foreach ($ds['options'] as $o) {
            if ($o['uid'] === $wanted) {
                $num = Format::parse($o['value']);
                return $num;
            }
        }
        return null;
    }

    private function numericDefault(array $var): ?float
    {
        foreach ($var['defaults'] ?? [] as $d) {
            $cond = $d['condition'] ?? null;
            if ($cond !== null && !Conditions::evaluate($cond, $this->known, $this->values)) {
                continue;
            }
            if (isset($d['now']) && $d['now'] !== null && $d['now'] !== '') {
                $n = Format::parse($d['now']);
                if ($n !== null) {
                    return $n;
                }
            }
            if (isset($d['value']) && $d['value'] !== null && $d['value'] !== '') {
                $n = Format::parse($d['value']);
                if ($n !== null) {
                    return $n;
                }
            }
        }
        return null;
    }

    /**
     * Some definitions read a period variable as a plain count of years or
     * months ("n = 12 * term"), even though the unit chip stores it in seconds
     * because that is the switcher's base unit. For those variables the formula
     * side and the display side disagree by a constant factor, so the solver
     * converts on the way in and out.
     *
     * @return array<string,array{0:float,1:float}> var => [display, offset]
     */
    private static function formulaUnits(array $calc, Units $units): array
    {
        $period = ['yrs', 'years', 'year', 'months', 'month', 'weeks', 'week'];
        $body = '';
        foreach ($calc['equations'] ?? [] as $eq) {
            $body .= ' ' . (string) ($eq['formula'] ?? '');
            foreach ($eq['variants'] ?? [] as $v) {
                $body .= ' ' . (string) ($v['formula'] ?? '');
            }
        }
        // a definition that spells the conversion out itself is already correct
        if (preg_match('/31557600|86400|604800|3600\b/', $body)) {
            return [];
        }
        $out = [];
        foreach ($calc['variables'] ?? [] as $name => $var) {
            $key = $var['unitKey'] ?? null;
            $unit = $var['defaultUnit'] ?? null;
            if ($key === null || $unit === null || !in_array($unit, $period, true)) {
                continue;
            }
            $pair = $units->linearPair((string) $key, (string) $unit);
            if ($pair !== null && $pair[0] != 0.0) {
                $out[(string) $name] = $pair;
            }
        }

        /*
         * A page that works with dates works in days.
         *
         * The definitions were written against a page where a date is a day
         * number: "time between = −date1 + date2 + include end date" adds the
         * tick box's 1 to a difference of two dates, which only makes sense in
         * days, and "years = (4/1461) × days" is the days-per-year constant. Our
         * pickers hand over milliseconds and the unit table carries durations in
         * seconds, so on these pages both are handed to the formulas in days and
         * converted back afterwards. On the eight pages that call a date
         * function (daysBetween, getDate, …) the arguments have to stay in
         * milliseconds, so those keep the default.
         */
        $spansDates = false;
        foreach ($calc['variables'] ?? [] as $var) {
            if (in_array($var['type'] ?? '', ['date', 'datetime', 'time'], true)) {
                $spansDates = true;
                break;
            }
        }
        if (!$spansDates) {
            return $out;
        }
        foreach ($calc['variables'] ?? [] as $name => $var) {
            if (isset($out[(string) $name])) {
                continue;
            }
            $type = $var['type'] ?? '';
            if (in_array($type, ['date', 'datetime', 'time'], true)) {
                $out[(string) $name] = [1 / 86400000, 0.0];     // ms -> days
                continue;
            }
            $key = $var['unitKey'] ?? null;
            if ($key === null || !$units->supported((string) $key)) {
                continue;
            }
            if ($units->offers((string) $key, 'sec')) {
                $out[(string) $name] = [1 / 86400, 0.0];        // seconds -> days
            }
        }
        return $out;
    }

    /** Values as the formulas expect to see them. */
    private function formulaValues(): array
    {
        if ($this->formulaUnits === []) {
            return $this->values;
        }
        $out = $this->values;
        foreach ($this->formulaUnits as $name => [$display, $offset]) {
            if (isset($out[$name])) {
                $out[$name] = $display * $out[$name] + $offset;
            }
        }
        return $out;
    }

    /** A result computed in formula units, back in base units. */
    private function fromFormula(string $name, float $value): float
    {
        if (!isset($this->formulaUnits[$name])) {
            return $value;
        }
        [$display, $offset] = $this->formulaUnits[$name];
        return ($value - $offset) / $display;
    }

    private function propagate(array $calc): void
    {
        $equations = $calc['equations'] ?? [];
        $limit = max(8, count($equations) * count($calc['variables'] ?? []) + 8);
        for ($iter = 0; $iter < $limit; $iter++) {
            $progress = false;
            foreach ($equations as $ei => $eq) {
                foreach ($eq['variants'] ?? [] as $vi => $variant) {
                    $lhs = $variant['lhs'] ?? null;
                    if ($lhs === null || isset($this->known[$lhs])) {
                        continue;
                    }
                    $ready = true;
                    foreach ($variant['rhs'] ?? [] as $dep) {
                        if (!isset($this->known[$dep])) {
                            $ready = false;
                            break;
                        }
                    }
                    if (!$ready) {
                        continue;
                    }
                    try {
                        $value = Expr::evaluate((string) $variant['formula'], $this->formulaValues());
                    } catch (ExprException | \DivisionByZeroError | \Throwable) {
                        continue;
                    }
                    if (!is_finite($value)) {
                        continue;
                    }
                    $value = $this->fromFormula((string) $lhs, $value);
                    unset($this->placeholder[$lhs]);
                    $this->values[$lhs]   = $value;
                    $this->known[$lhs]    = true;
                    $this->computed[$lhs] = true;
                    $this->source[$lhs]   = ['eq' => (int) $ei, 'formula' => (string) $variant['formula']];
                    $this->fired[(int) $ei] = (int) $vi;
                    $progress = true;
                }
            }
            if (!$progress) {
                break;
            }
        }
    }

    /**
     * Variants that had every dependency known yet still produced no value, with
     * the reason. That combination is always a defect in the engine or in the
     * definition — it never means "waiting for more input".
     *
     * @return array<int,array{lhs:string,formula:string,reason:string}>
     */
    public function misses(array $calc): array
    {
        $out = [];
        foreach ($calc['equations'] ?? [] as $eq) {
            foreach ($eq['variants'] ?? [] as $variant) {
                $lhs = (string) ($variant['lhs'] ?? '');
                if ($lhs === '' || isset($this->known[$lhs])) {
                    continue;
                }
                $ready = true;
                foreach ($variant['rhs'] ?? [] as $dep) {
                    if (!isset($this->known[$dep])) {
                        $ready = false;
                        break;
                    }
                }
                if (!$ready) {
                    continue;
                }
                $reason = 'evaluated';
                try {
                    $value = Expr::evaluate((string) $variant['formula'], $this->formulaValues());
                    if (!is_finite($value)) {
                        $reason = 'non-finite';
                    }
                } catch (\Throwable $e) {
                    $reason = $e->getMessage();
                }
                if ($reason !== 'evaluated') {
                    $out[] = ['lhs' => $lhs, 'formula' => (string) $variant['formula'],
                              'reason' => $reason];
                }
            }
        }
        return $out;
    }

    public function has(string $name): bool
    {
        return isset($this->known[$name]);
    }

    public function value(string $name): ?float
    {
        return $this->values[$name] ?? null;
    }

    /** Variables that are still blank (used to grey out / disable rows). */
    public function missing(array $calc): array
    {
        $out = [];
        foreach ($calc['variables'] as $name => $v) {
            if (($v['type'] ?? '') === 'presentation') {
                continue;
            }
            if (!isset($this->known[$name])) {
                $out[] = $name;
            }
        }
        return $out;
    }
}

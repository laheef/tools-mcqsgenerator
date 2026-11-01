<?php
/**
 * Unit registry.
 *
 * Every Omni unit is declared as a *linear* expression in `v`, mapping the
 * value the user typed onto the base unit:
 *
 *   cm    -> 100*v      (1 m = 100 cm, base is metre)
 *   inch  -> (5000/127)*v
 *   perc  -> 100*v      (base is the decimal)
 *   x10e3 -> v/1000
 *
 * Because each map is linear we never invert symbolically: sampling f(0) and
 * f(1) gives the intercept and slope, so shown = (base - c) / k exactly.
 * Non-finite or non-linear ("mix(a,b)") definitions are reported as
 * unsupported and the widget falls back to a plain number.
 */

declare(strict_types=1);

namespace Omni;

final class Units
{
    private array $registry;

    public function __construct(array $registry)
    {
        $this->registry = $registry;
    }

    public static function load(string $file): self
    {
        $raw = json_decode((string) file_get_contents($file), true) ?: [];
        return new self(self::normalise($raw));
    }

    /**
     * The harvester stores switchers in a compact form
     *   {name, default:[...], units:{slug:{n,f,e}}}
     * while the engine works with {name, default, units:{slug:{name,full,expr}}}.
     * Normalising on load keeps one vocabulary everywhere else.
     */
    private static function normalise(array $registry): array
    {
        foreach ($registry as $key => $sw) {
            if (!isset($sw['units']) || !is_array($sw['units'])) {
                unset($registry[$key]);
                continue;
            }
            $units = [];
            foreach ($sw['units'] as $slug => $u) {
                if (!is_array($u)) {
                    continue;
                }
                $units[$slug] = [
                    'name' => (string) ($u['name'] ?? $u['n'] ?? $slug),
                    'full' => (string) ($u['full'] ?? $u['f'] ?? $u['n'] ?? $slug),
                    'expr' => (string) ($u['expr'] ?? $u['e'] ?? ''),
                ];
            }
            $registry[$key] = [
                'name'    => (string) ($sw['name'] ?? $key),
                'default' => array_values((array) ($sw['default'] ?? [])),
                'units'   => $units,
            ];
        }
        return $registry;
    }

    /** The normalised registry, for the panel's unit pickers. */
    public function all(): array
    {
        return $this->registry;
    }

    public function has(string $key): bool
    {
        return isset($this->registry[$key]['units'][$key === '' ? '' : array_key_first($this->registry[$key]['units'] ?? [])]);
    }

    /** @return array<string,mixed>|null */
    public function switcher(?string $key): ?array
    {
        if ($key === null || $key === '' || !isset($this->registry[$key])) {
            return null;
        }
        return $this->registry[$key];
    }

    /**
     * Units that can drive a single input + chip.
     *
     * Some switchers (Length, Mass, Time) also contain multi-field units such as
     * `mix(m, cm)` or `mix(ft, inch)`. Those cannot be represented by one box, so
     * they are filtered out — the reference site renders them as compound inputs.
     * Filtering here (instead of rejecting the whole switcher) keeps the
     * remaining units usable and, crucially, keeps value conversion and display
     * using the same unit list.
     */
    /**
     * Is this unit one a reader can actually switch to? Compound entries such as
     * mix(wk, days) need several boxes at once and cannot be applied to a single
     * number, so they are not offered and must not be used to convert.
     */
    public function offers(?string $key, ?string $unit): bool
    {
        if ($key === null || $unit === null) {
            return false;
        }
        return isset($this->options($key)[$unit]);
    }

    /** Full name of any unit in a switcher, offered or not ("weeks / days"). */
    public function name(?string $key, ?string $unit): string
    {
        $sw = $this->switcher($key);
        if (!is_array($sw) || $unit === null) {
            return '';
        }
        $def = $sw['units'][$unit] ?? null;
        return (string) ($def['full'] ?? $def['name'] ?? $unit);
    }

    public function options(?string $key): array
    {
        $sw = $this->switcher($key);
        if (!$sw) {
            return [];
        }
        $units = [];
        foreach ($sw['units'] as $slug => $u) {
            if ($this->isLinear((string) $u['expr'])) {
                $units[$slug] = $u;
            }
        }
        $order = [];
        foreach ($sw['default'] as $slug) {
            if (isset($units[$slug])) {
                $order[$slug] = $units[$slug];
            }
        }
        foreach ($units as $slug => $u) {
            if (!isset($order[$slug])) {
                $order[$slug] = $u;
            }
        }
        return $order;
    }

    public function defaultUnit(?string $key): ?string
    {
        $sw = $this->switcher($key);
        if (!$sw) {
            return null;
        }
        $options = $this->options($key);
        foreach ($sw['default'] as $slug) {
            if (isset($options[$slug])) {
                return (string) $slug;
            }
        }
        // The declared default may be a compound unit (e.g. Time defaults to
        // "hrs / min / sec") which a single input cannot show. Fall back to the
        // switcher's base unit, which is the one whose expression is plain `v`.
        foreach ($options as $slug => $u) {
            if (trim((string) $u['expr']) === 'v') {
                return (string) $slug;
            }
        }
        $first = array_key_first($options);
        return $first === null ? null : (string) $first;
    }

    /**
     * $unit expression maps a BASE value to the displayed number, e.g.
     * `cm -> 100*v` means 1 m shows as 100 cm. Verified against the site:
     * a radius typed as 100 cm is solved and stored as 1 (metre).
     */
    public function toDisplay(float $base, ?string $key, ?string $unit): float
    {
        if (!$this->offers($key, $unit)) {
            return $base;          // compound unit: there is no single-number conversion
        }
        $u = $this->unitDef($key, $unit);
        if ($u === null) {
            return $base;
        }
        [$c, $k] = $this->linear($u['expr']);
        if ($k === null) {
            return $base;
        }
        return $c + $k * $base;
    }

    /** value displayed in $unit -> base value (inverse of the above) */
    public function toBase(float $shown, ?string $key, ?string $unit): float
    {
        if (!$this->offers($key, $unit)) {
            return $shown;
        }
        $u = $this->unitDef($key, $unit);
        if ($u === null) {
            return $shown;
        }
        [$c, $k] = $this->linear($u['expr']);
        if ($k === null || $k == 0.0) {
            return $shown;
        }
        return ($shown - $c) / $k;
    }

    public function label(?string $key, ?string $unit): string
    {
        $u = $this->unitDef($key, $unit);
        return $u ? (string) $u['name'] : '';
    }

    public function fullName(?string $key, ?string $unit): string
    {
        $u = $this->unitDef($key, $unit);
        return $u ? (string) $u['full'] : '';
    }

    /** True when the switcher has at least one unit usable by a single input. */
    public function supported(?string $key): bool
    {
        return $this->options($key) !== [];
    }

    private function isLinear(string $expr): bool
    {
        [$c, $k] = $this->linear($expr);
        return $k !== null;
    }

    private function unitDef(?string $key, ?string $unit): ?array
    {
        $sw = $this->switcher($key);
        if (!$sw || $unit === null) {
            return null;
        }
        return $sw['units'][$unit] ?? null;
    }

    /**
     * Sample a linear expression: returns [intercept, slope], slope null when
     * the expression is not a finite linear function of v.
     */
    /**
     * The [factor, offset] pair for one unit: display = factor * base + offset.
     * Returns null for units that are not a straight line (mix(days, hrs)).
     *
     * @return array{0:float,1:float}|null
     */
    public function linearPair(string $key, string $unit): ?array
    {
        $u = $this->unitDef($key, $unit);
        if ($u === null) {
            return null;
        }
        [$c, $k] = $this->linear($u['expr']);
        if ($k === null || $k == 0.0) {
            return null;
        }
        return [$k, $c];
    }

    private function linear(string $expr): array
    {
        try {
            $f0 = Expr::evaluate($expr, ['v' => 0.0]);
            $f1 = Expr::evaluate($expr, ['v' => 1.0]);
            $f2 = Expr::evaluate($expr, ['v' => 2.0]);
        } catch (\Throwable) {
            return [0.0, null];
        }
        if (!is_finite($f0) || !is_finite($f1) || !is_finite($f2)) {
            return [0.0, null];
        }
        $k = $f1 - $f0;
        // linearity check keeps multi-input units such as mix(days,hrs) out
        if (abs(($f2 - $f0) - 2 * $k) > 1e-9 * max(1.0, abs($k))) {
            return [0.0, null];
        }
        return [$f0, $k];
    }
}

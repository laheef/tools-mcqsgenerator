<?php
/**
 * Condition evaluation for UI variants and validation messages.
 *
 * Observed grammar (from `conditions.ui` in the payload):
 *   hasValue(n) and hasValue(d) and hasValue(p)
 *   p4 > 0
 *   userUsesImperialUnits()
 *   not hasValue(x) or y <= 10
 * Anything we cannot parse evaluates to `false`, which makes the caller fall
 * back to the first variant — the same progressive behaviour as the original,
 * never a fatal error.
 */

declare(strict_types=1);

namespace Omni;

final class Conditions
{
    /** @param array<string,bool> $known  @param array<string,float> $values */
    public static function evaluate(?string $condition, array $known, array $values): bool
    {
        if ($condition === null || trim($condition) === '') {
            return true;
        }
        $c = (string) $condition;

        // or has the lowest precedence
        $orParts = preg_split('/\s+or\s+/i', $c);
        if (count($orParts) > 1) {
            foreach ($orParts as $part) {
                if (self::evaluate($part, $known, $values)) {
                    return true;
                }
            }
            return false;
        }
        $andParts = preg_split('/\s+and\s+/i', $c);
        if (count($andParts) > 1) {
            foreach ($andParts as $part) {
                if (!self::evaluate($part, $known, $values)) {
                    return false;
                }
            }
            return true;
        }

        // Only whitespace is trimmed here: trimming brackets would eat the
        // closing paren of hasValue(x) and break the match below.
        $t = trim($c);

        if (preg_match('/^not\s+(.+)$/i', $t, $m)) {
            return !self::evaluate($m[1], $known, $values);
        }
        if (preg_match('/^hasValue\(\s*([A-Za-z_][A-Za-z0-9_]*)\s*\)$/i', $t, $m)) {
            return isset($known[$m[1]]);
        }
        if (preg_match('/^(isFilled|isNotEmpty)\(\s*([A-Za-z_][A-Za-z0-9_]*)\s*\)$/i', $t, $m)) {
            return isset($known[$m[2]]);
        }
        // environment helpers we treat as false (metric UI, desktop, logged out)
        if (preg_match('/^[A-Za-z_][A-Za-z0-9_]*\(\)$/', $t)) {
            return false;
        }
        if (preg_match('/^([A-Za-z_][A-Za-z0-9_]*)\s*(>=|<=|==|!=|>|<)\s*(-?[\d.]+)$/', $t, $m)) {
            $left = $values[$m[1]] ?? null;
            if ($left === null) {
                return false;
            }
            return self::compare((float) $left, $m[2], (float) $m[3]);
        }
        if (preg_match('/^(-?[\d.]+)\s*(>=|<=|==|!=|>|<)\s*([A-Za-z_][A-Za-z0-9_]*)$/', $t, $m)) {
            $right = $values[$m[3]] ?? null;
            if ($right === null) {
                return false;
            }
            return self::compare((float) $m[1], $m[2], (float) $right);
        }
        return false;
    }

    private static function compare(float $a, string $op, float $b): bool
    {
        return match ($op) {
            '>'  => $a > $b,
            '<'  => $a < $b,
            '>=' => $a >= $b,
            '<=' => $a <= $b,
            '==' => abs($a - $b) < 1e-12,
            '!=' => abs($a - $b) >= 1e-12,
            default => false,
        };
    }

    /**
     * Pick the variant of a rich-text chunk whose condition holds, preferring
     * the most specific (first matching, as the original does).
     *
     * @param array<int,array{html:string,condition:?string}> $variants
     */
    public static function pick(array $variants, array $known, array $values): ?string
    {
        // Prefer a *conditional* variant that holds (that is the version with
        // the user's numbers substituted), then fall back to the unconditional
        // one. The reference site renders "50 = (200 ⋅ 25)/100" once solved.
        $fallback = null;
        foreach ($variants as $v) {
            $condition = $v['condition'] ?? null;
            $ok = self::evaluate($condition, $known, $values);
            if (($condition === null || trim((string) $condition) === '')) {
                $fallback ??= $ok ? $v['html'] : null;
                continue;
            }
            if ($ok) {
                return $v['html'];
            }
        }
        return $fallback;
    }

    /**
     * Substitute Omni's template placeholders: {{n.value}} -> formatted number.
     *
     * @param array<string,string> $rendered var => already formatted display string
     */
    public static function interpolate(string $html, array $rendered, array $labels = []): string
    {
        $out = (string) preg_replace_callback(
            '/\{\{\s*([A-Za-z_][A-Za-z0-9_]*)\.([A-Za-z]+)\s*\}\}/',
            static function (array $m) use ($rendered, $labels): string {
                $name = $m[1];
                $prop = $m[2];
                if ($prop === 'uiValue' || $prop === 'label') {
                    return (string) ($labels[$name] ?? $rendered[$name] ?? '');
                }
                return (string) ($rendered[$name] ?? '');
            },
            $html
        );
        // never leak an unresolved placeholder into the page
        $out = (string) preg_replace('/\{\{\s*[A-Za-z_][A-Za-z0-9_.]*\s*\}\}/', '', $out);
        // ...nor a truncated one ("({{x2.formattedValue"), which has no closing braces
        return (string) preg_replace('/\{\{[^{}]{0,60}$/u', '', $out);
    }
}

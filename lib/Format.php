<?php
/**
 * Number formatting.
 *
 * Two rounding algorithms appear in the definitions:
 *   omni     – round to the variable's `precision` step, trim trailing zeros,
 *              never print more decimals than the step allows, group thousands.
 *   standard – half away from zero to the same step, fixed decimal count.
 * Very large / very small magnitudes switch to ×10ⁿ, matching the site.
 */

declare(strict_types=1);

namespace Onim;

final class Format
{
    private const SUPERSCRIPT = [
        '0' => '⁰', '1' => '¹', '2' => '²', '3' => '³', '4' => '⁴',
        '5' => '⁵', '6' => '⁶', '7' => '⁷', '8' => '⁸', '9' => '⁹', '-' => '⁻',
    ];

    /**
     * @param float       $value
     * @param string|null $precision  rounding step as a string, e.g. "0.000001"
     * @param string      $algorithm  omni|standard
     */
    public static function number($value, ?string $precision = null, string $algorithm = 'omni', ?int $minDigits = null): string
    {
        if ($value === null || $value === '' || !is_finite((float) $value)) {
            return '';
        }
        $value = (float) $value;

        /*
         * The definitions carry two rounding conventions:
         *   omni     — precision is a *step* ("0.0001"), keep full precision and
         *              trim the display
         *   standard — precision is a *number of decimals* ("2" = 22.86)
         * Both occur thousands of times, so the interpretation is chosen by the
         * algorithm rather than guessed from the string.
         */
        $decimals = 0;
        $step = 0.0;
        if ($algorithm === 'standard') {
            $decimals = $precision !== null && $precision !== ''
                ? (int) max(0, min(12, (int) round((float) $precision)))
                : 0;
            $step = $decimals > 0 ? 10 ** -$decimals : 0.0;
        } else {
            $step = $precision !== null && (float) $precision > 0 ? (float) $precision : 0.0;
            if ($step > 0) {
                $decimals = (int) max(0, min(12, ceil(-log10($step) - 1e-9)));
            }
        }
        if ($minDigits !== null) {
            $decimals = max($decimals, $minDigits);
        }

        if ($step > 0) {
            $value = $algorithm === 'standard'
                ? round($value, $decimals, PHP_ROUND_HALF_UP)
                : $value; // omni: keep full precision, trim below
        }

        /*
         * Below one, four significant figures are worth more than a fixed
         * decimal count. One inch is 0.025 4 m; with the harvested step of
         * 0.0001 that already reads correctly, but a figure just under a
         * thousandth used to lose everything (0.0006 for 0.000 621). Six
         * decimals carry four figures down to 0.001, and below that the
         * sentence uses ×10ⁿ exactly as the boxes do.
         *
         * `standard` is an author's decimal count and is left alone.
         */
        $abs = abs($value);
        if ($algorithm !== 'standard' && $abs !== 0.0 && $abs < 1.0) {
            $need = 3 - (int) floor(log10($abs) + 1e-12);
            $decimals = max($decimals, min(6, $need));
        }
        if ($abs !== 0.0 && ($abs >= 1e15 || $abs < 1e-3)) {
            return self::scientific($value, 3);
        }

        $out = number_format($value, $decimals, '.', ' ');
        if ($decimals > 0) {
            $out = rtrim($out, '0');
            $out = rtrim($out, '.');
        }
        if ($out === '-0' || $out === '') {
            $out = '0';
        }
        if ($minDigits !== null && $minDigits > 0 && strpos($out, '.') === false && $abs >= 1) {
            $out .= '.' . str_repeat('0', $minDigits);
        }
        return $out;
    }

    /** 1234567 -> "1.234567 ×10⁶" */
    public static function scientific(float $value, int $sig = 6): string
    {
        if ($value == 0.0) {
            return '0';
        }
        $exp = (int) floor(log10(abs($value)));
        $mant = $value / (10 ** $exp);
        $m = rtrim(rtrim(number_format($mant, $sig, '.', ''), '0'), '.');
        return $m . ' ×10' . self::superscript((string) $exp);
    }

    public static function superscript(string $n): string
    {
        $out = '';
        foreach (str_split($n) as $ch) {
            $out .= self::SUPERSCRIPT[$ch] ?? $ch;
        }
        return $out;
    }

    /** Human date, e.g. "September 29, 2026" (matches the site's "Last updated" line). */
    public static function date(?string $iso): string
    {
        if (!$iso) {
            return '';
        }
        $ts = strtotime($iso);
        return $ts ? date('F j, Y', $ts) : '';
    }

    public static function isoDate(?string $iso): string
    {
        $ts = $iso ? strtotime($iso) : false;
        return $ts ? date('Y-m-d', $ts) : '';
    }

    /** 3507 -> "3 507" */
    public static function count(int $n): string
    {
        return number_format($n, 0, '.', ' ');
    }

    /** Relative time for a review: "just now", "3 hours ago", "12 May 2026". */
    public static function ago(int $ts): string
    {
        $diff = time() - $ts;
        if ($diff < 60) {
            return 'just now';
        }
        if ($diff < 3600) {
            $m = (int) floor($diff / 60);
            return $m === 1 ? '1 minute ago' : $m . ' minutes ago';
        }
        if ($diff < 86400) {
            $h = (int) floor($diff / 3600);
            return $h === 1 ? '1 hour ago' : $h . ' hours ago';
        }
        if ($diff < 86400 * 7) {
            $d = (int) floor($diff / 86400);
            return $d === 1 ? 'yesterday' : $d . ' days ago';
        }
        return date('j M Y', $ts);
    }

    /** 3500 -> "3K", 1200 -> "1.2K" */
    public static function compact(int $n): string
    {
        if ($n >= 1000000) {
            return rtrim(rtrim(number_format($n / 1000000, 1, '.', ''), '0'), '.') . 'M';
        }
        if ($n >= 1000) {
            return rtrim(rtrim(number_format($n / 1000, 1, '.', ''), '0'), '.') . 'K';
        }
        return (string) $n;
    }

    /** Parse a user-typed number, tolerating spaces, commas and unicode minus. */
    public static function parse($raw): ?float
    {
        if ($raw === null) {
            return null;
        }
        if (is_int($raw) || is_float($raw)) {
            return (float) $raw;
        }
        $s = trim((string) $raw);
        if ($s === '') {
            return null;
        }
        $s = str_replace(["\u{2212}", "\u{2013}", '−'], '-', $s);
        $s = str_replace(["\u{00A0}", "\u{202F}", ' '], '', $s);
        // 1,234.5  or 1.234,5  -> 1234.5
        if (preg_match('/^-?\d{1,3}(,\d{3})+(\.\d+)?$/', $s)) {
            $s = str_replace(',', '', $s);
        } elseif (str_contains($s, ',') && !str_contains($s, '.')) {
            $s = str_replace(',', '.', $s);
        }
        if (!is_numeric($s)) {
            return null;
        }
        return (float) $s;
    }
}

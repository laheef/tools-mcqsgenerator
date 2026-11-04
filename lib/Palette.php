<?php
/**
 * Colour arithmetic for the Appearance screen.
 *
 * The stylesheet is written against tokens — `--brand` for links and buttons,
 * `--brand-ink` for the darker state a link takes on hover, `--brand-soft` for
 * the tint behind a soft button. The panel only asks the owner for *one* of
 * those: the brand colour. The other two are derived here so that picking green
 * in the panel does not leave a blue hover state behind.
 *
 * Everything works on hex triples; an unreadable value is returned unchanged so
 * a bad setting can never blank out the CSS.
 */

declare(strict_types=1);

namespace Onim;

final class Palette
{
    /** # rgb, #rrggbb, #rgba, #rrggbbaa → [r, g, b], or null. */
    public static function rgb(string $hex): ?array
    {
        $hex = trim($hex);
        if ($hex !== '' && $hex[0] === '#') {
            $hex = substr($hex, 1);
        }
        if (!preg_match('~^[0-9a-f]{3,8}$~i', $hex)) {
            return null;
        }
        if (strlen($hex) === 3 || strlen($hex) === 4) {
            $hex = preg_replace('~.~', '$0$0', substr($hex, 0, 3));
        }
        if (strlen($hex) < 6) {
            return null;
        }
        return [
            (int) hexdec(substr($hex, 0, 2)),
            (int) hexdec(substr($hex, 2, 2)),
            (int) hexdec(substr($hex, 4, 2)),
        ];
    }

    /** [r, g, b] → #rrggbb */
    public static function hex(array $rgb): string
    {
        return sprintf(
            '#%02X%02X%02X',
            max(0, min(255, (int) round($rgb[0]))),
            max(0, min(255, (int) round($rgb[1]))),
            max(0, min(255, (int) round($rgb[2])))
        );
    }

    /**
     * Mix a colour with another one.
     *
     * @param float $amount 0 keeps the colour, 1 is entirely $toward
     */
    public static function mix(string $hex, string $toward, float $amount): string
    {
        $from = self::rgb($hex);
        $to   = self::rgb($toward);
        if ($from === null || $to === null) {
            return $hex;
        }
        $amount = max(0.0, min(1.0, $amount));
        return self::hex([
            $from[0] + ($to[0] - $from[0]) * $amount,
            $from[1] + ($to[1] - $from[1]) * $amount,
            $from[2] + ($to[2] - $from[2]) * $amount,
        ]);
    }

    /** Darker: the hover/active shade a brand colour needs. */
    public static function shade(string $hex, float $amount = 0.22): string
    {
        return self::mix($hex, '#000000', $amount);
    }

    /** Lighter: the tint behind soft buttons and active rows. */
    public static function tint(string $hex, float $amount = 0.9): string
    {
        return self::mix($hex, '#FFFFFF', $amount);
    }

    /**
     * Relative luminance, used to decide whether text on a colour should be
     * black or white. The weights are the WCAG ones.
     */
    public static function luminance(string $hex): float
    {
        $rgb = self::rgb($hex);
        if ($rgb === null) {
            return 1.0;
        }
        $channel = static function (int $value): float {
            $v = $value / 255;
            return $v <= 0.03928 ? $v / 12.92 : (($v + 0.055) / 1.055) ** 2.4;
        };
        return 0.2126 * $channel($rgb[0]) + 0.7152 * $channel($rgb[1]) + 0.0722 * $channel($rgb[2]);
    }

    /** The ink to print on top of $hex: white on dark colours, near-black on light. */
    public static function onColor(string $hex): string
    {
        return self::luminance($hex) > 0.45 ? '#0A0A0A' : '#FFFFFF';
    }
}

<?php
/**
 * Figures — the small illustrations the home page puts beside its copy.
 *
 * The homepage explained itself in text alone: three panels of words about
 * filling in values, switching units and checking the formula, and four more
 * about what every calculator does. Nothing on the page showed any of it. On a
 * site whose whole proposition is "the arithmetic is visible", a wall of prose,
 * an icon and no picture is the wrong first impression.
 *
 * These are drawn as inline SVG rather than shipped as image files, for three
 * reasons that all matter here:
 *
 *   * they inherit the CSS custom properties (--brand, --border, --ink), so the
 *     day an owner changes the brand colour in the panel the figures change too,
 *     instead of a folder of PNGs going out of date;
 *   * they cost no extra request and no layout shift, on a page that already
 *     loads a font and a search index;
 *   * they stay sharp at any density and can be recoloured for a dark theme
 *     without a second asset.
 *
 * Every figure is decorative: the copy beside it already says the thing, so the
 * SVG is aria-hidden and carries no title. Nothing here is a diagram a reader
 * has to decode to use the page.
 */

declare(strict_types=1);

namespace Onim;

final class Figures
{
    /**
     * One figure, inline.
     *
     * @param string $key   which drawing
     * @param string $class extra classes on the <svg>
     */
    public static function svg(string $key, string $class = 'figure-art'): string
    {
        $body = self::drawings()[$key] ?? self::drawings()['fill-values'];
        return '<svg class="' . htmlspecialchars(trim($class), ENT_QUOTES) . '" viewBox="0 0 320 180"'
            . ' fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"'
            . ' preserveAspectRatio="xMidYMid meet">'
            . '<defs>'
            . '<linearGradient id="fg-grad-' . $key . '" x1="0" y1="0" x2="1" y2="1">'
            . '<stop offset="0" stop-color="#EEF2FF"/><stop offset="1" stop-color="#E3E9FF"/>'
            . '</linearGradient>'
            . '</defs>'
            . $body
            . '</svg>';
    }

    /** @return array<string,string> */
    private static function drawings(): array
    {
        return [
            /*
             * Three fields, two filled. The empty one has the cursor in it and
             * the answer underneath — "type the values you know, the rest is
             * solved for you", without a caption.
             */
            'fill-values' => <<<'SVG'
<rect x="0" y="0" width="320" height="180" rx="16" fill="url(#fg-grad-fill-values)"/>
<rect x="44" y="26" width="232" height="128" rx="14" fill="#FFFFFF" stroke="#DDE3F4"/>
<rect x="62" y="44" width="86" height="40" rx="9" fill="#FFFFFF" stroke="#DDE3F4"/>
<rect x="72" y="56" width="42" height="5" rx="2.5" fill="#9AA6C4"/>
<rect x="72" y="67" width="26" height="7" rx="3.5" fill="#2B3A66"/>
<rect x="172" y="44" width="86" height="40" rx="9" fill="#FFFFFF" stroke="#DDE3F4"/>
<rect x="182" y="56" width="34" height="5" rx="2.5" fill="#9AA6C4"/>
<rect x="182" y="67" width="44" height="7" rx="3.5" fill="#2B3A66"/>
<rect x="62" y="96" width="196" height="40" rx="9" fill="#F2F5FF" stroke="#3B68FC" stroke-dasharray="5 4"/>
<rect x="74" y="112" width="58" height="7" rx="3.5" fill="#B9C4E4"/>
<rect x="176" y="108" width="2.4" height="17" rx="1.2" fill="#3B68FC"><animate attributeName="opacity" values="1;0.15;1" dur="1.5s" repeatCount="indefinite"/></rect>
<circle cx="246" cy="116" r="10" fill="#3B68FC"/>
<path d="m242 116 3 3 5.5-6" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
SVG,

            /*
             * One value, two units, and the switch between them. The arrow does
             * the work: the number does not change meaning, only its clothes.
             */
            'units' => <<<'SVG'
<rect x="0" y="0" width="320" height="180" rx="16" fill="url(#fg-grad-units)"/>
<rect x="26" y="58" width="96" height="64" rx="14" fill="#FFFFFF" stroke="#DDE3F4"/>
<rect x="44" y="74" width="40" height="10" rx="5" fill="#2B3A66"/>
<rect x="44" y="92" width="58" height="6" rx="3" fill="#9AA6C4"/>
<rect x="198" y="58" width="96" height="64" rx="14" fill="#FFFFFF" stroke="#DDE3F4"/>
<rect x="216" y="74" width="40" height="10" rx="5" fill="#2B3A66"/>
<rect x="216" y="92" width="58" height="6" rx="3" fill="#9AA6C4"/>
<path d="M132 78h56" stroke="#3B68FC" stroke-width="2.4" stroke-linecap="round"/>
<path d="m180 71 8 7-8 7" stroke="#3B68FC" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M188 102h-56" stroke="#8FA6FF" stroke-width="2.4" stroke-linecap="round"/>
<path d="m140 95-8 7 8 7" stroke="#8FA6FF" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
<circle cx="160" cy="90" r="17" fill="#FFFFFF" stroke="#3B68FC" stroke-width="2"/>
<path d="M152 86h14l-3-3M168 94h-14l3 3" stroke="#3B68FC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<rect x="88" y="140" width="144" height="8" rx="4" fill="#C9D4F2"/>
<rect x="88" y="140" width="72" height="8" rx="4" fill="#3B68FC"/>
SVG,

            /*
             * The formula line, with one value boxed as if it had just been
             * substituted. Under it, the same line rendered small three times —
             * a page that shows its working rather than one number.
             */
            'formula' => <<<'SVG'
<rect x="0" y="0" width="320" height="180" rx="16" fill="url(#fg-grad-formula)"/>
<rect x="30" y="34" width="260" height="116" rx="14" fill="#FFFFFF" stroke="#DDE3F4"/>
<rect x="48" y="52" width="224" height="34" rx="8" fill="#F7F9FF"/>
<rect x="60" y="63" width="26" height="12" rx="4" fill="#2B3A66"/>
<rect x="92" y="63" width="12" height="12" rx="3" fill="#9AA6C4"/>
<rect x="110" y="60" width="40" height="18" rx="5" fill="#EBEFFF" stroke="#3B68FC"/>
<rect x="118" y="66" width="24" height="6" rx="3" fill="#3B68FC"/>
<rect x="158" y="63" width="12" height="12" rx="3" fill="#9AA6C4"/>
<rect x="176" y="63" width="26" height="12" rx="4" fill="#2B3A66"/>
<rect x="208" y="63" width="12" height="12" rx="3" fill="#9AA6C4"/>
<rect x="226" y="63" width="30" height="12" rx="4" fill="#2B3A66"/>
<rect x="48" y="98" width="150" height="6" rx="3" fill="#C7D0E8"/>
<rect x="48" y="110" width="190" height="6" rx="3" fill="#DCE2F1"/>
<rect x="48" y="122" width="120" height="6" rx="3" fill="#DCE2F1"/>
<circle cx="252" cy="122" r="18" fill="#3B68FC"/>
<path d="M245 117h14M245 127h14" stroke="#FFFFFF" stroke-width="2.4" stroke-linecap="round"/>
SVG,

            /*
             * Two boxes and two-way arrows: the same equation rearranged, so
             * either end can be the question.
             */
            'solve-both-ways' => <<<'SVG'
<rect x="0" y="0" width="320" height="180" rx="16" fill="url(#fg-grad-solve-both-ways)"/>
<rect x="24" y="52" width="104" height="76" rx="14" fill="#FFFFFF" stroke="#DDE3F4"/>
<rect x="42" y="70" width="46" height="9" rx="4.5" fill="#2B3A66"/>
<rect x="42" y="88" width="66" height="6" rx="3" fill="#9AA6C4"/>
<rect x="42" y="102" width="34" height="6" rx="3" fill="#C7D0E8"/>
<rect x="192" y="52" width="104" height="76" rx="14" fill="#FFFFFF" stroke="#3B68FC"/>
<rect x="210" y="70" width="46" height="9" rx="4.5" fill="#3B68FC"/>
<rect x="210" y="88" width="66" height="6" rx="3" fill="#9AA6C4"/>
<rect x="210" y="102" width="34" height="6" rx="3" fill="#C7D0E8"/>
<path d="M138 74h38" stroke="#3B68FC" stroke-width="2.4" stroke-linecap="round"/>
<path d="m170 67 8 7-8 7" stroke="#3B68FC" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M182 106h-38" stroke="#8FA6FF" stroke-width="2.4" stroke-linecap="round"/>
<path d="m150 99-8 7 8 7" stroke="#8FA6FF" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
<circle cx="160" cy="90" r="13" fill="#EBEFFF"/>
<path d="M154 90h12M160 84v12" stroke="#3B68FC" stroke-width="2" stroke-linecap="round" opacity="0"/>
<path d="M155 90h10" stroke="#3B68FC" stroke-width="2" stroke-linecap="round"/>
SVG,

            /*
             * The result panel: three rows, one value per row, one copied.
             */
            'results' => <<<'SVG'
<rect x="0" y="0" width="320" height="180" rx="16" fill="url(#fg-grad-results)"/>
<rect x="34" y="26" width="252" height="128" rx="14" fill="#FFFFFF" stroke="#DDE3F4"/>
<rect x="34" y="26" width="252" height="34" rx="14" fill="#EBEFFF"/>
<rect x="34" y="46" width="252" height="14" fill="#EBEFFF"/>
<rect x="50" y="38" width="58" height="9" rx="4.5" fill="#3B68FC"/>
<rect x="52" y="74" width="152" height="10" rx="5" fill="#2B3A66"/>
<rect x="52" y="92" width="96" height="6" rx="3" fill="#C7D0E8"/>
<rect x="52" y="112" width="168" height="10" rx="5" fill="#2B3A66"/>
<rect x="52" y="130" width="72" height="6" rx="3" fill="#C7D0E8"/>
<rect x="230" y="72" width="40" height="16" rx="6" fill="#F2F5FF" stroke="#DDE3F4"/>
<rect x="230" y="110" width="40" height="16" rx="6" fill="#F2F5FF" stroke="#DDE3F4"/>
<circle cx="250" cy="80" r="4" fill="#3B68FC" opacity=".5"/>
<circle cx="250" cy="118" r="4" fill="#3B68FC" opacity=".5"/>
<g transform="translate(196 136)">
  <rect x="0" y="0" width="80" height="26" rx="13" fill="#3B68FC"/>
  <rect x="42" y="7" width="12" height="12" rx="3" stroke="#fff" stroke-width="2"/>
  <path d="M56 9h4a3 3 0 0 1 3 3v4" stroke="#fff" stroke-width="2" stroke-linecap="round" opacity=".7"/>
  <rect x="14" y="9" width="18" height="8" rx="4" fill="#fff" opacity=".9"/>
</g>
SVG,

            /*
             * Chips swapping: the same measurement in two systems, side by side.
             */
            'unit-swap' => <<<'SVG'
<rect x="0" y="0" width="320" height="180" rx="16" fill="url(#fg-grad-unit-swap)"/>
<rect x="30" y="40" width="118" height="100" rx="16" fill="#FFFFFF" stroke="#DDE3F4"/>
<rect x="48" y="58" width="52" height="8" rx="4" fill="#9AA6C4"/>
<rect x="48" y="74" width="74" height="14" rx="6" fill="#2B3A66"/>
<rect x="48" y="100" width="82" height="22" rx="11" fill="#F2F5FF" stroke="#DDE3F4"/>
<rect x="58" y="107" width="28" height="8" rx="4" fill="#3B68FC"/>
<rect x="172" y="40" width="118" height="100" rx="16" fill="#FFFFFF" stroke="#3B68FC"/>
<rect x="190" y="58" width="52" height="8" rx="4" fill="#9AA6C4"/>
<rect x="190" y="74" width="74" height="14" rx="6" fill="#2B3A66"/>
<rect x="190" y="100" width="82" height="22" rx="11" fill="#EBEFFF"/>
<rect x="200" y="107" width="28" height="8" rx="4" fill="#3B68FC"/>
<path d="M156 78c0-8 6-14 14-14" stroke="#3B68FC" stroke-width="2.2" stroke-linecap="round" opacity="0"/>
<circle cx="160" cy="66" r="12" fill="#EBEFFF"/>
<path d="M155 66h10M162 62l4 4-4 4" stroke="#3B68FC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<circle cx="160" cy="114" r="12" fill="#EBEFFF"/>
<path d="M165 114h-10M158 110l-4 4 4 4" stroke="#3B68FC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
SVG,

            /*
             * Free and open: a page with its working shown, no lock on it.
             */
            'free-open' => <<<'SVG'
<rect x="0" y="0" width="320" height="180" rx="16" fill="url(#fg-grad-free-open)"/>
<rect x="70" y="26" width="180" height="128" rx="14" fill="#FFFFFF" stroke="#DDE3F4"/>
<rect x="88" y="44" width="76" height="10" rx="5" fill="#2B3A66"/>
<rect x="88" y="64" width="144" height="6" rx="3" fill="#DCE2F1"/>
<rect x="88" y="78" width="132" height="6" rx="3" fill="#DCE2F1"/>
<rect x="88" y="92" width="144" height="6" rx="3" fill="#DCE2F1"/>
<rect x="88" y="110" width="88" height="26" rx="8" fill="#EBEFFF" stroke="#3B68FC"/>
<path d="M100 123h30" stroke="#3B68FC" stroke-width="2" stroke-linecap="round"/>
<circle cx="222" cy="126" r="26" fill="#3B68FC"/>
<path d="M212 126h20M226 118l8 8-8 8" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
<circle cx="88" cy="34" r="9" fill="#EBEFFF"/>
<path d="m84 34 3 3 6-6" stroke="#3B68FC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
SVG,

            /*
             * The catalogue: nine cards, three of them lit — a directory of
             * thousands that still starts with one row you can scan.
             */
            'catalogue' => <<<'SVG'
<rect x="0" y="0" width="320" height="180" rx="16" fill="url(#fg-grad-catalogue)"/>
<g stroke="#DDE3F4" fill="#FFFFFF">
  <rect x="30" y="30" width="78" height="46" rx="10"/>
  <rect x="120" y="30" width="78" height="46" rx="10"/>
  <rect x="210" y="30" width="78" height="46" rx="10"/>
  <rect x="30" y="86" width="78" height="46" rx="10"/>
  <rect x="120" y="86" width="78" height="46" rx="10"/>
  <rect x="210" y="86" width="78" height="46" rx="10"/>
</g>
<rect x="120" y="30" width="78" height="46" rx="10" fill="#EBEFFF" stroke="#3B68FC"/>
<g fill="#C7D0E8">
  <rect x="42" y="42" width="20" height="8" rx="4"/><rect x="42" y="56" width="46" height="6" rx="3"/>
  <rect x="222" y="42" width="20" height="8" rx="4"/><rect x="222" y="56" width="46" height="6" rx="3"/>
  <rect x="42" y="98" width="20" height="8" rx="4"/><rect x="42" y="112" width="46" height="6" rx="3"/>
  <rect x="132" y="98" width="20" height="8" rx="4"/><rect x="132" y="112" width="46" height="6" rx="3"/>
  <rect x="222" y="98" width="20" height="8" rx="4"/><rect x="222" y="112" width="46" height="6" rx="3"/>
</g>
<g fill="#3B68FC">
  <rect x="132" y="42" width="20" height="8" rx="4"/><rect x="132" y="56" width="46" height="6" rx="3" opacity=".55"/>
</g>
<rect x="30" y="146" width="150" height="8" rx="4" fill="#C9D4F2"/>
SVG,
        ];
    }
}

<?php

/**
 * Percent Viability Calculator
 * /biology/percent-viability
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Percent Viability Calculator',
    'meta' => ['title' => 'Percent Viability Calculator: Steps & Units', 'description' => 'Percent Viability Calculator turns live cells and dead cells into non-viable. Free to use, and the working stays on the page beside the answer. No sign-up.', 'h1' => 'Percent Viability Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'live',
                            'label' => 'Live cells',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '920',
                        ],
                        [
                            'name' => 'dead',
                            'label' => 'Dead cells',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '80',
                        ],
                        [
                            'name' => 'viability',
                            'label' => 'Viability',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dead_pct',
                            'label' => 'Non-viable',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Live to dead ratio',
                            'type' => 'number',
                            'suffix' => ':1',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Viability',
            'results' => ['viability' => 'live/(live+dead)*100', 'dead_pct' => 'dead/(live+dead)*100', 'ratio' => 'live/dead'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Live cells and Dead cells into Percent Viability and the answer comes back as Viability and Non-viable. There is no hidden constant here: change viability and live cells moves with it. The main result, Viability, is reported in %.
        TXT,
        'sections' => [
            ['title' => 'How the Percent Viability calculator works', 'html' => <<<'TXT'
            <p>Percent Viability answers one question from 2 numbers, and the answer is Viability, Non-viable and Live to dead ratio.</p><p>Written with the labels from the form, Viability = Live cells ÷ (Live cells + Dead cells) × 100.</p><p>The answers are Viability, Non-viable and Live to dead ratio; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Live cells</strong> — in cells</li><li><strong>Dead cells</strong> — in cells</li></ul><p>The result boxes are Viability in %, Non-viable in %, Live to dead ratio in :1; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Live cells = 920 cells and Dead cells = 80 cells; the answers are <strong>Viability</strong> = 92 %, <strong>Non-viable</strong> = 8 % and <strong>Live to dead ratio</strong> = 11.5 :1.</p><ul><li><strong>Viability</strong> = 92 %</li><li><strong>Non-viable</strong> = 8 %</li><li><strong>Live to dead ratio</strong> = 11.5 :1</li></ul><p>That is <strong>Viability</strong> = <code>Live cells ÷ (Live cells + Dead cells) × 100</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Viability</strong> = 92, <strong>Non-viable</strong> = 8 and <strong>Live to dead ratio</strong> = 11.5. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Viability is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Viability</strong> = <code>Live cells ÷ (Live cells + Dead cells) × 100</code></li><li><strong>Non-viable</strong> = <code>Dead cells ÷ (Live cells + Dead cells) × 100</code></li><li><strong>Live to dead ratio</strong> = <code>Live cells ÷ Dead cells</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Viability</strong> = <code>Live cells ÷ (Live cells + Dead cells) × 100</code> — the form to use when Live cells and Dead cells are the values you have.</li><li><strong>Non-viable</strong> = <code>Dead cells ÷ (Live cells + Dead cells) × 100</code> — the form to use when Dead cells and Live cells are the values you have.</li><li><strong>Live to dead ratio</strong> = <code>Live cells ÷ Dead cells</code> — the form to use when Live cells and Dead cells are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Viability, Non-viable and Live to dead ratio can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Live cells from 920 to 1840, leaving every other box alone. The panel moves from <strong>Viability</strong> 92 %, <strong>Non-viable</strong> 8 % and <strong>Live to dead ratio</strong> 11.5 :1 to <strong>Viability</strong> 95.83 %, <strong>Non-viable</strong> 4.17 % and <strong>Live to dead ratio</strong> 23 :1.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Viability, Non-viable and Live to dead ratio are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Live cells left as a guess.</strong> Anything typed into Live cells is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Dead cells left as a guess.</strong> Anything typed into Dead cells is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Live cells and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Percent Viability form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Live cells</strong> is measured in cells. The page reads it when it works out Viability, Non-viable and Live to dead ratio. Fill it from a measurement rather than a memory — Live cells is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Dead cells</strong> is measured in cells. The page reads it when it works out Viability, Non-viable and Live to dead ratio. Fill it from a measurement rather than a memory — Dead cells is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Viability</strong> is a plain number and the page's own defaults put it at 92. It is computed from Live cells and Dead cells, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Non-viable</strong> is a plain number and the page's own defaults put it at 8. It is computed from Dead cells and Live cells, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Live to dead ratio</strong> is a plain number and the page's own defaults put it at 11.5. It is computed from Live cells and Dead cells, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Viability</th><th>Non-viable</th><th>Live to dead ratio</th></tr></thead><tbody><tr><td><strong>Live cells</strong> +10%</td><td>+0.73%</td><td>-8.42%</td><td>+10%</td></tr><tr><td><strong>Dead cells</strong> +10%</td><td>-0.79%</td><td>+9.13%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Live cells: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Live cells = 460 cells and Dead cells = 40 cells and the page reports <strong>Viability</strong> = 92 %, <strong>Non-viable</strong> = 8 % and <strong>Live to dead ratio</strong> = 11.5 :1.</li><li>Feed in Live cells = 2760 cells and Dead cells = 80 cells and the page reports <strong>Viability</strong> = 97.18 %, <strong>Non-viable</strong> = 2.82 % and <strong>Live to dead ratio</strong> = 34.5 :1.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Live cells and Dead cells ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Live cells — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Viability in % against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Viability is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Live cells and Dead cells are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Live cells and Dead cells measured, Viability and Non-viable wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/od600-to-cell-density">OD600 to Cell Density Calculator</a>, <a href="/biology/genetic-odds-ratio">Odds Ratio for Genetics Calculator</a> and <a href="/biology/oligo-converter">Oligo pmol/µL to µg/mL Converter Calculator — Formula &amp; Result</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Percent Viability calculator work out?', 'a' => 'Viability, Non-viable and Live to dead ratio, from Live cells and Dead cells. The relationship is Viability = Live cells ÷ (Live cells + Dead cells) × 100.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Live cells (cells), Dead cells (cells). With live cells and dead cells in place, Viability can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Viability, Non-viable and Live to dead ratio can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Viability = 92 %, Non-viable = 8 % and Live to dead ratio = 11.5 :1. Those are the defaults written into the form — move Live cells and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Viability is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Live cells blank and the page solves for it, reporting Viability instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Viability at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/od600-to-cell-density', 'name' => 'OD600 to Cell Density Calculator'],
            ['path' => '/biology/genetic-odds-ratio', 'name' => 'Odds Ratio for Genetics Calculator'],
            ['path' => '/biology/oligo-converter', 'name' => 'Oligo pmol/µL to µg/mL Converter Calculator — Formula & Result'],
        ],
        'authors' => [],
    ],
];

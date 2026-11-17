<?php

/**
 * GMROI
 * /finance/gmroi
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'GMROI',
    'meta' => ['title' => 'GMROI Calculator: Formula, Steps & Examples', 'description' => 'GMROI works out average inventory cost from starting inventory cost and final inventory cost. Results come back in USD, with any other unit a click away.', 'h1' => 'GMROI Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beg_inv',
                            'label' => 'Starting inventory cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'end_inv',
                            'label' => 'Final inventory cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'avg_inv',
                            'label' => 'Average inventory cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'margin',
                            'label' => ' Gross profit',
                            'type' => 'number',
                            'help' => 'Revenue − Cost of goods sold (COGS)',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gmroi',
                            'label' => 'GMROI',
                            'type' => 'number',
                            'help' => 'Gross margin return on inventory.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gmroi2',
                            'label' => 'GMROI percentage',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'avg_inv = (beg_inv + end_inv) / 2',
            'results' => ['end_inv' => '2*avg_inv - beg_inv', 'beg_inv' => '2*avg_inv - end_inv', 'avg_inv' => '(1/2)*beg_inv + (1/2)*end_inv'],
        ],
        [
            'title' => 'gmroi = one_way(margin / avg_inv)',
            'results' => ['gmroi' => '(margin/avg_inv)'],
        ],
        [
            'title' => 'gmroi2 = one_way(margin / avg_inv)',
            'results' => ['gmroi2' => '(margin/avg_inv)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Starting inventory cost and Final inventory cost into GMROI and the answer comes back as Average inventory cost and GMROI. It is a single relationship that reads average inventory cost out of starting inventory cost, not a table of canned results keyed by them. Units for Average inventory cost default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the GMROI calculator works', 'html' => <<<'TXT'
            <p>GMROI answers one question from 2 numbers, and the answer is Average inventory cost, GMROI and GMROI percentage.</p><p>In the form&#039;s own words, Average inventory cost = (1 ÷ 2) × Starting inventory cost + (1 ÷ 2) × Final inventory cost.</p><p>The answers are Average inventory cost, GMROI and GMROI percentage; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Starting inventory cost</strong> — in USD</li><li><strong>Final inventory cost</strong> — in USD</li></ul><p>The result boxes are Average inventory cost in USD, GMROI, GMROI percentage in percent; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on GMROI percentage lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Average inventory cost</strong> = <code>(1 ÷ 2) × Starting inventory cost + (1 ÷ 2) × Final inventory cost</code></li><li><strong>Final inventory cost</strong> = <code>2 × Average inventory cost − Starting inventory cost</code></li><li><strong>Starting inventory cost</strong> = <code>2 × Average inventory cost − Final inventory cost</code></li><li><strong>GMROI</strong> = <code>(Gross profit ÷ Average inventory cost)</code></li><li><strong>GMROI percentage</strong> = <code>(Gross profit ÷ Average inventory cost)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Average inventory cost</strong> = <code>(1 ÷ 2) × Starting inventory cost + (1 ÷ 2) × Final inventory cost</code> — the form to use when Starting inventory cost and Final inventory cost are the values you have.</li><li><strong>Final inventory cost</strong> = <code>2 × Average inventory cost − Starting inventory cost</code> — the form to use when Average inventory cost and Starting inventory cost are the values you have.</li><li><strong>Starting inventory cost</strong> = <code>2 × Average inventory cost − Final inventory cost</code> — the form to use when Average inventory cost and Final inventory cost are the values you have.</li><li><strong>GMROI</strong> = <code>(Gross profit ÷ Average inventory cost)</code> — the form to use when Gross profit and Average inventory cost are the values you have.</li><li><strong>GMROI percentage</strong> = <code>(Gross profit ÷ Average inventory cost)</code> — the form to use when Gross profit and Average inventory cost are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Average inventory cost, Final inventory cost and Starting inventory cost can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Average inventory cost, GMROI and GMROI percentage are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Starting inventory cost left as a guess.</strong> Anything typed into Starting inventory cost is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Final inventory cost left as a guess.</strong> Anything typed into Final inventory cost is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Starting inventory cost and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the GMROI form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Starting inventory cost</strong> takes a plain number with no unit attached. It feeds Final inventory cost and Average inventory cost. Fill it from a measurement rather than a memory — Starting inventory cost is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Final inventory cost</strong> takes a plain number with no unit attached. It feeds Starting inventory cost and Average inventory cost. Fill it from a measurement rather than a memory — Final inventory cost is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Average inventory cost</strong> is a plain number. It is computed from Starting inventory cost and Final inventory cost, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>GMROI</strong> is a plain number. It is computed from Gross profit and Average inventory cost, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>GMROI percentage</strong> is a percent figure. It is computed from Gross profit and Average inventory cost, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on GMROI actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Starting inventory cost and Final inventory cost ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Starting inventory cost — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Average inventory cost in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Average inventory cost is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Starting inventory cost and Final inventory cost are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Starting inventory cost and Final inventory cost measured, Average inventory cost and GMROI wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/sinking-fund">Sinking fund Calculator</a>, <a href="/finance/smokers-ctc">Smoker&#039;s CTC (cost to company) Calculator</a> and <a href="/finance/software-contract-value">Software contract value Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>GMROI is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the GMROI calculator work out?', 'a' => <<<'TXT'
            Average inventory cost, GMROI and GMROI percentage, from Starting inventory cost and Final inventory cost. The relationship is Average inventory cost = (1 ÷ 2) × Starting inventory cost + (1 ÷ 2) × Final inventory cost.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Starting inventory cost (USD), Final inventory cost (USD). Fill starting inventory cost and final inventory cost and leave Average inventory cost empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Average inventory cost, Final inventory cost, Starting inventory cost and GMROI can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Average inventory cost is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Starting inventory cost blank and the page solves for it, reporting Average inventory cost instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Average inventory cost at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/sinking-fund', 'name' => 'Sinking fund Calculator'],
            ['path' => '/finance/smokers-ctc', 'name' => 'Smoker\'s CTC (cost to company) Calculator'],
            ['path' => '/finance/software-contract-value', 'name' => 'Software contract value Calculator'],
        ],
        'authors' => [],
    ],
];

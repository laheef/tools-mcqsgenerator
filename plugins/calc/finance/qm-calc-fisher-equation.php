<?php

/**
 * Fisher equation
 * /finance/fisher-equation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fisher equation',
    'meta' => ['title' => 'Fisher equation Calculator — Formula, Units & Example', 'description' => 'Fisher equation reports real interest rate and approximated real interest rate. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Fisher equation Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest',
                            'label' => 'Nominal interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inflExp',
                            'label' => 'Expected inflation rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'real',
                            'label' => 'Real interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'realAprox',
                            'label' => 'Approximated real interest rate',
                            'type' => 'number',
                            'help' => 'The real interest rate approximated using a simplified form of the Fisher equation, which deducts the expected inflation rate from the nominal interest rate.',
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
            'title' => 'real  = (interest  - inflExp) / (1 + inflExp)',
            'results' => ['interest' => 'inflExp*real + inflExp + real', 'inflExp' => '(interest - real)/(real + 1)', 'real' => '(-inflExp + interest)/(inflExp + 1)'],
        ],
        [
            'title' => 'realAprox = interest  - inflExp',
            'results' => ['realAprox' => '-inflExp + interest', 'interest' => 'inflExp + realAprox', 'inflExp' => 'interest - realAprox'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Fisher equation works out Real interest rate and Approximated real interest rate from Nominal interest rate and Expected inflation rate. There is no hidden constant here: change real interest rate and nominal interest rate moves with it. The main result, Real interest rate, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Fisher equation calculator works', 'html' => <<<'TXT'
            <p>The Fisher equation calculator applies one relationship to 2 numbers and reports Real interest rate and Approximated real interest rate.</p><p>In the form&#039;s own words, Real interest rate = ( − Expected inflation rate + Nominal interest rate) ÷ (Expected inflation rate + 1).</p><p>What comes back is Real interest rate and Approximated real interest rate — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Nominal interest rate</strong> — in percent</li><li><strong>Expected inflation rate</strong> — in percent</li></ul><p>The answers come back as Real interest rate in percent, Approximated real interest rate in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Nominal interest rate = 10 perc and Expected inflation rate = 100 perc gives <strong>Real interest rate</strong> = -0.8911 perc and <strong>Approximated real interest rate</strong> = -90 perc.</p><ul><li><strong>Real interest rate</strong> = -0.8911 perc</li><li><strong>Approximated real interest rate</strong> = -90 perc</li></ul><p>That is <strong>Real interest rate</strong> = <code>( − Expected inflation rate + Nominal interest rate) ÷ (Expected inflation rate + 1)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Real interest rate</strong> = -0.8911 and <strong>Approximated real interest rate</strong> = -90. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Real interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Real interest rate</strong> = <code>( − Expected inflation rate + Nominal interest rate) ÷ (Expected inflation rate + 1)</code></li><li><strong>Nominal interest rate</strong> = <code>Expected inflation rate × Real interest rate + Expected inflation rate + Real interest rate</code></li><li><strong>Expected inflation rate</strong> = <code>(Nominal interest rate − Real interest rate) ÷ (Real interest rate + 1)</code></li><li><strong>Approximated real interest rate</strong> = <code>− Expected inflation rate + Nominal interest rate</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Real interest rate</strong> = <code>( − Expected inflation rate + Nominal interest rate) ÷ (Expected inflation rate + 1)</code> — the form to use when Expected inflation rate and Nominal interest rate are the values you have.</li><li><strong>Nominal interest rate</strong> = <code>Expected inflation rate × Real interest rate + Expected inflation rate + Real interest rate</code> — the form to use when Expected inflation rate and Real interest rate are the values you have.</li><li><strong>Expected inflation rate</strong> = <code>(Nominal interest rate − Real interest rate) ÷ (Real interest rate + 1)</code> — the form to use when Nominal interest rate and Real interest rate are the values you have.</li><li><strong>Approximated real interest rate</strong> = <code>− Expected inflation rate + Nominal interest rate</code> — the form to use when Expected inflation rate and Nominal interest rate are the values you have.</li><li><strong>Nominal interest rate</strong> = <code>Expected inflation rate + Approximated real interest rate</code> — the form to use when Expected inflation rate and Approximated real interest rate are the values you have.</li><li><strong>Expected inflation rate</strong> = <code>Nominal interest rate − Approximated real interest rate</code> — the form to use when Nominal interest rate and Approximated real interest rate are the values you have.</li></ul><p>Any one of Real interest rate, Nominal interest rate and Expected inflation rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Nominal interest rate from 10 to 20, leaving every other box alone. The panel moves from <strong>Real interest rate</strong> -0.8911 perc and <strong>Approximated real interest rate</strong> -90 perc to <strong>Real interest rate</strong> -0.7921 perc and <strong>Approximated real interest rate</strong> -80 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Nominal interest rate and Expected inflation rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Real interest rate and Approximated real interest rate are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Nominal interest rate left as a guess.</strong> Anything typed into Nominal interest rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Expected inflation rate left as a guess.</strong> Anything typed into Expected inflation rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Nominal interest rate to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Fisher equation form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Nominal interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Expected inflation rate, Real interest rate and Approximated real interest rate changes with it. Fill it from a measurement rather than a memory — Nominal interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Expected inflation rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Nominal interest rate, Real interest rate and Approximated real interest rate changes with it. Fill it from a measurement rather than a memory — Expected inflation rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Real interest rate</strong> is a percent figure and the page's own defaults put it at -0.8911 perc. It is worked out from Expected inflation rate and Nominal interest rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Approximated real interest rate</strong> is a percent figure and the page's own defaults put it at -90 perc. It is worked out from Expected inflation rate and Nominal interest rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Real interest rate</th><th>Approximated real interest rate</th></tr></thead><tbody><tr><td><strong>Nominal interest rate</strong> +10%</td><td>+1.11%</td><td>+1.11%</td></tr><tr><td><strong>Expected inflation rate</strong> +10%</td><td>-1.1%</td><td>-11.11%</td></tr></tbody></table><p>The steepest column belongs to Expected inflation rate: ten per cent there moves an answer by about 11.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Nominal interest rate = 5 perc and Expected inflation rate = 50 perc and the page reports <strong>Real interest rate</strong> = -0.8824 perc and <strong>Approximated real interest rate</strong> = -45 perc.</li><li>Feed in Nominal interest rate = 30 perc and Expected inflation rate = 100 perc and the page reports <strong>Real interest rate</strong> = -0.6931 perc and <strong>Approximated real interest rate</strong> = -70 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Fisher equation actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Real interest rate is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Nominal interest rate and Expected inflation rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Nominal interest rate and Expected inflation rate measured, Real interest rate and Approximated real interest rate wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/personal-loan">Personal loan</a>, <a href="/finance/phillips-curve">Phillips curve Calculator</a> and <a href="/finance/piti">PITI Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fisher equation calculator work out?', 'a' => <<<'TXT'
            Real interest rate and Approximated real interest rate, from Expected inflation rate and Nominal interest rate. The relationship is Real interest rate = ( − Expected inflation rate + Nominal interest rate) ÷ (Expected inflation rate + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Nominal interest rate (percent), Expected inflation rate (percent). Enter nominal interest rate and expected inflation rate; Real interest rate is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Real interest rate, Nominal interest rate, Expected inflation rate and Approximated real interest rate blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Real interest rate = -0.8911 perc and Approximated real interest rate = -90 perc. Those are the defaults written into the form — move Nominal interest rate and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Real interest rate is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Nominal interest rate blank and the page solves for it, reporting Real interest rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Real interest rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/personal-loan', 'name' => 'Personal loan'],
            ['path' => '/finance/phillips-curve', 'name' => 'Phillips curve Calculator'],
            ['path' => '/finance/piti', 'name' => 'PITI Calculator'],
        ],
        'authors' => [],
    ],
];

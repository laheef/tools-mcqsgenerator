<?php

/**
 * Coupon rate
 * /finance/coupon-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Coupon rate',
    'meta' => ['title' => 'Coupon rate Calculator: Formula, Steps & Examples', 'description' => 'Coupon rate works out coupon per period from face value and coupon frequency. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Coupon rate Calculator', 'updated' => '2024-05-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'faceValue',
                            'label' => 'Face value',
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
                            'name' => 'couponPerPeriod',
                            'label' => 'Coupon per period',
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
                            'name' => 'couponFrequency',
                            'label' => 'Coupon frequency',
                            'type' => 'select',
                            'options' => [
                                'Annually' => '1.000000000000000',
                                'Semi-annually' => '2.000000000000000',
                                'Quarterly' => '4.000000000000000',
                                'Monthly' => '12.000000000000000',
                                'Weekly' => '52.000000000000000',
                                'Daily' => '365.000000000000000',
                            ],
                            'control' => 'DROPDOWN',
                            'default' => 'Annually',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coup_annual',
                            'label' => 'Annual coupon',
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
                            'name' => 'coup_rate',
                            'label' => 'Coupon rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'couponPerPeriod = (faceValue * coup_rate) / couponFrequency',
            'results' => ['couponFrequency' => 'coup_rate*faceValue/couponPerPeriod', 'coup_rate' => 'couponFrequency*couponPerPeriod/faceValue', 'faceValue' => 'couponFrequency*couponPerPeriod/coup_rate', 'couponPerPeriod' => 'coup_rate*faceValue/couponFrequency'],
        ],
        [
            'title' => 'coup_annual = faceValue * coup_rate',
            'results' => ['coup_annual' => 'coup_rate*faceValue', 'faceValue' => 'coup_annual/coup_rate', 'coup_rate' => 'coup_annual/faceValue'],
        ],
        [
            'title' => 'couponPerPeriod = coup_annual / couponFrequency',
            'results' => ['couponFrequency' => 'coup_annual/couponPerPeriod', 'coup_annual' => 'couponFrequency*couponPerPeriod', 'couponPerPeriod' => 'coup_annual/couponFrequency'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Coupon rate works out Coupon per period and Annual coupon from Face value, Coupon frequency and Coupon rate. Nothing is looked up on this page: coupon per period is computed from face value and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Coupon per period is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Coupon rate calculator works', 'html' => <<<'TXT'
            <p>Coupon rate answers one question from 3 numbers, and the answer is Coupon per period and Annual coupon.</p><p>The relationship it solves reads Coupon per period = Coupon rate × Face value ÷ Coupon frequency.</p><p>What comes back is Coupon per period and Annual coupon — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Face value</strong> — in USD</li><li><strong>Coupon frequency</strong> — a plain number, no unit</li><li><strong>Coupon rate</strong> — in percent</li></ul><p>The result boxes are Coupon per period in USD, Annual coupon in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Face value = 10 USD, Coupon frequency = 1 and Coupon rate = 100 perc; the answers are <strong>Coupon per period</strong> = 1000 USD and <strong>Annual coupon</strong> = 1000 USD.</p><ul><li><strong>Coupon per period</strong> = 1000 USD</li><li><strong>Annual coupon</strong> = 1000 USD</li></ul><p>The line behind those figures is <strong>Coupon per period</strong> = <code>Coupon rate × Face value ÷ Coupon frequency</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Coupon per period</strong> = 1000 and <strong>Annual coupon</strong> = 1000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Coupon rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Coupon per period</strong> = <code>Coupon rate × Face value ÷ Coupon frequency</code></li><li><strong>Coupon frequency</strong> = <code>Coupon rate × Face value ÷ Coupon per period</code></li><li><strong>Coupon rate</strong> = <code>Coupon frequency × Coupon per period ÷ Face value</code></li><li><strong>Face value</strong> = <code>Coupon frequency × Coupon per period ÷ Coupon rate</code></li><li><strong>Annual coupon</strong> = <code>Coupon rate × Face value</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Coupon per period</strong> = <code>Coupon rate × Face value ÷ Coupon frequency</code> — the form to use when Coupon rate, Face value and Coupon frequency are the values you have.</li><li><strong>Coupon frequency</strong> = <code>Coupon rate × Face value ÷ Coupon per period</code> — the form to use when Coupon rate, Face value and Coupon per period are the values you have.</li><li><strong>Coupon rate</strong> = <code>Coupon frequency × Coupon per period ÷ Face value</code> — the form to use when Coupon frequency, Coupon per period and Face value are the values you have.</li><li><strong>Face value</strong> = <code>Coupon frequency × Coupon per period ÷ Coupon rate</code> — the form to use when Coupon frequency, Coupon per period and Coupon rate are the values you have.</li><li><strong>Annual coupon</strong> = <code>Coupon rate × Face value</code> — the form to use when Coupon rate and Face value are the values you have.</li><li><strong>Face value</strong> = <code>Annual coupon ÷ Coupon rate</code> — the form to use when Annual coupon and Coupon rate are the values you have.</li><li><strong>Coupon rate</strong> = <code>Annual coupon ÷ Face value</code> — the form to use when Annual coupon and Face value are the values you have.</li><li><strong>Coupon per period</strong> = <code>Annual coupon ÷ Coupon frequency</code> — the form to use when Annual coupon and Coupon frequency are the values you have.</li></ul><p>Any one of Coupon per period, Coupon frequency and Coupon rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Face value, from 10 to 20 — and the answers go from <strong>Coupon per period</strong> 1000 USD and <strong>Annual coupon</strong> 1000 USD to <strong>Coupon per period</strong> 2000 USD and <strong>Annual coupon</strong> 2000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Coupon rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Coupon per period and Annual coupon are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Face value left as a guess.</strong> Anything typed into Face value is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Coupon frequency left as a guess.</strong> Anything typed into Coupon frequency is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Face value is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Coupon rate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Face value</strong> takes a plain number with no unit attached. It feeds Coupon frequency, Coupon rate and Coupon per period. Fill it from a measurement rather than a memory — Face value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Coupon frequency</strong> takes a plain number with no unit attached. It feeds Coupon rate, Face value and Coupon per period. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Coupon frequency is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Coupon rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Coupon frequency, Face value and Coupon per period. Fill it from a measurement rather than a memory — Coupon rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Coupon per period</strong> is a plain number and the page's own defaults put it at 1000. The value follows from Coupon rate, Face value and Coupon frequency. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Annual coupon</strong> is a plain number and the page's own defaults put it at 1000. The value follows from Coupon rate and Face value. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Coupon per period</th><th>Annual coupon</th></tr></thead><tbody><tr><td><strong>Face value</strong> +10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Coupon frequency</strong> +10%</td><td>-9.09%</td><td>+0%</td></tr><tr><td><strong>Coupon rate</strong> +10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Coupon rate: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Face value = 5 USD, Coupon frequency = 0.5 and Coupon rate = 50 perc and the page reports <strong>Coupon per period</strong> = 500 USD and <strong>Annual coupon</strong> = 250 USD.</li><li>Feed in Face value = 30 USD, Coupon frequency = 1 and Coupon rate = 100 perc and the page reports <strong>Coupon per period</strong> = 3000 USD and <strong>Annual coupon</strong> = 3000 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Coupon rate actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Coupon per period is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Face value, Coupon frequency and Coupon rate and the number you are missing is Coupon per period and Annual coupon.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/margin-discount">Margin with discount Calculator</a>, <a href="/finance/marginal-cost">Marginal cost</a> and <a href="/finance/mpc">Marginal propensity to consume</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Coupon rate calculator work out?', 'a' => <<<'TXT'
            Coupon per period and Annual coupon, from Coupon rate, Face value and Coupon frequency. The relationship is Coupon per period = Coupon rate × Face value ÷ Coupon frequency.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Face value (USD), Coupon frequency, Coupon rate (percent). Enter face value, coupon frequency and coupon rate; Coupon per period is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Coupon per period, Coupon frequency, Coupon rate and Face value blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Coupon per period = 1000 USD and Annual coupon = 1000 USD. The figures come from Face value as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Coupon per period is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Face value blank and the page solves for it, reporting Coupon per period instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Coupon per period keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/margin-discount', 'name' => 'Margin with discount Calculator'],
            ['path' => '/finance/marginal-cost', 'name' => 'Marginal cost'],
            ['path' => '/finance/mpc', 'name' => 'Marginal propensity to consume'],
        ],
        'authors' => [],
    ],
];

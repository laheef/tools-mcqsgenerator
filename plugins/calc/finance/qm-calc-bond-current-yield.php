<?php

/**
 * Bond current yield
 * /finance/bond-current-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bond current yield',
    'meta' => ['title' => 'Bond current yield: Formula, Steps & Results', 'description' => 'Bond current yield turns face value and frequency into coupon per period. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Bond current yield Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => 'Annual coupon payment',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'face_value',
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
                            'name' => 'frequency',
                            'label' => 'Frequency',
                            'type' => 'select',
                            'options' => [
                                'Annually' => '1.000000000000000',
                                'Semi-annually' => '2.000000000000000',
                                'Quarterly' => '4.000000000000000',
                                'Monthly' => '12.000000000000000',
                                'Weekly' => '52.000000000000000',
                                'Daily' => '365.000000000000000',
                            ],
                            'dataset' => 'Coupon frequency',
                            'control' => 'DROPDOWN',
                            'default' => 'Annually',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coupon_rate',
                            'label' => 'Coupon rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coupon',
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
                            'name' => 'coupon_annual',
                            'label' => 'Annual coupon',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Bond current yield',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bond_price',
                            'label' => 'Bond price',
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
                            'name' => 'current_yield',
                            'label' => 'Current yield',
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
            'title' => 'coupon = (face_value * coupon_rate) / frequency',
            'results' => ['coupon' => 'coupon_rate*face_value/frequency', 'frequency' => 'coupon_rate*face_value/coupon', 'coupon_rate' => 'coupon*frequency/face_value', 'face_value' => 'coupon*frequency/coupon_rate'],
        ],
        [
            'title' => 'coupon_annual = face_value * coupon_rate',
            'results' => ['coupon_rate' => 'coupon_annual/face_value', 'face_value' => 'coupon_annual/coupon_rate', 'coupon_annual' => 'coupon_rate*face_value'],
        ],
        [
            'title' => 'current_yield = coupon_annual / bond_price',
            'results' => ['current_yield' => 'coupon_annual/bond_price', 'bond_price' => 'coupon_annual/current_yield', 'coupon_annual' => 'bond_price*current_yield'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Bond current yield turns Face value, Frequency and Coupon rate into Coupon per period and Annual coupon. There is no hidden constant here: change coupon per period and face value moves with it. The main result, Coupon per period, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Bond current yield calculator works', 'html' => <<<'TXT'
            <p>Bond current yield answers one question from 3 numbers, and the answer is Coupon per period, Annual coupon and Bond price.</p><p>Written with the labels from the form, Coupon per period = Coupon rate × Face value ÷ Frequency.</p><p>What comes back is Coupon per period, Annual coupon, Bond price and Current yield — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Face value</strong> — in USD</li><li><strong>Frequency</strong> — a plain number, no unit</li><li><strong>Coupon rate</strong> — in percent</li></ul><p>What you get back is Coupon per period in USD, Annual coupon in USD, Bond price in USD, Current yield in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Face value = 10 USD, Frequency = 1, Coupon rate = 100 perc, Annual coupon = 1000 USD, Bond price = 10 USD and Current yield = 100 perc; the answers are <strong>Coupon per period</strong> = 1000 USD.</p><ul><li><strong>Coupon per period</strong> = 1000 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Coupon per period</strong> = <code>Coupon rate × Face value ÷ Frequency</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Coupon per period</strong> = 1000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Current yield offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Coupon per period</strong> = <code>Coupon rate × Face value ÷ Frequency</code></li><li><strong>Frequency</strong> = <code>Coupon rate × Face value ÷ Coupon per period</code></li><li><strong>Coupon rate</strong> = <code>Coupon per period × Frequency ÷ Face value</code></li><li><strong>Face value</strong> = <code>Coupon per period × Frequency ÷ Coupon rate</code></li><li><strong>Annual coupon</strong> = <code>Coupon rate × Face value</code></li><li><strong>Current yield</strong> = <code>Annual coupon ÷ Bond price</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Coupon per period</strong> = <code>Coupon rate × Face value ÷ Frequency</code> — the form to use when Coupon rate, Face value and Frequency are the values you have.</li><li><strong>Frequency</strong> = <code>Coupon rate × Face value ÷ Coupon per period</code> — the form to use when Coupon rate, Face value and Coupon per period are the values you have.</li><li><strong>Coupon rate</strong> = <code>Coupon per period × Frequency ÷ Face value</code> — the form to use when Coupon per period, Frequency and Face value are the values you have.</li><li><strong>Face value</strong> = <code>Coupon per period × Frequency ÷ Coupon rate</code> — the form to use when Coupon per period, Frequency and Coupon rate are the values you have.</li><li><strong>Annual coupon</strong> = <code>Coupon rate × Face value</code> — the form to use when Coupon rate and Face value are the values you have.</li><li><strong>Coupon rate</strong> = <code>Annual coupon ÷ Face value</code> — the form to use when Annual coupon and Face value are the values you have.</li><li><strong>Face value</strong> = <code>Annual coupon ÷ Coupon rate</code> — the form to use when Annual coupon and Coupon rate are the values you have.</li><li><strong>Current yield</strong> = <code>Annual coupon ÷ Bond price</code> — the form to use when Annual coupon and Bond price are the values you have.</li></ul><p>Any one of Coupon per period, Frequency and Coupon rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Face value from 10 to 20, leaving every other box alone. The panel moves from <strong>Coupon per period</strong> 1000 USD to <strong>Coupon per period</strong> 2000 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Coupon rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Coupon per period, Annual coupon and Bond price are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Face value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Face value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Frequency left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Frequency is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Face value to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Bond current yield form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Face value</strong> takes a plain number with no unit attached. Change it and Coupon per period, Frequency and Coupon rate changes with it. Fill it from a measurement rather than a memory — Face value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Frequency</strong> takes a plain number with no unit attached. Change it and Coupon per period, Coupon rate and Face value changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Frequency is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Coupon rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Coupon per period, Frequency and Face value changes with it. Fill it from a measurement rather than a memory — Coupon rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Coupon per period</strong> is a plain number and the page's own defaults put it at 1000. It is worked out from Coupon rate, Face value and Frequency. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Annual coupon</strong> is a plain number. It is worked out from Coupon rate and Face value. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Bond price</strong> is a plain number. It is worked out from Annual coupon and Current yield. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Current yield</strong> is a percent figure. It is worked out from Annual coupon and Bond price. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Coupon per period</th></tr></thead><tbody><tr><td><strong>Face value</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Frequency</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Coupon rate</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Annual coupon</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Bond price</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Current yield</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Coupon rate sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Annual coupon, Bond price and Current yield barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Face value = 5 USD, Frequency = 0.5, Coupon rate = 50 perc, Annual coupon = 500 USD, Bond price = 5 USD and Current yield = 50 perc and the page reports <strong>Coupon per period</strong> = 500 USD.</li><li>Feed in Face value = 30 USD, Frequency = 1, Coupon rate = 100 perc, Annual coupon = 1000 USD, Bond price = 10 USD and Current yield = 100 perc and the page reports <strong>Coupon per period</strong> = 3000 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Bond current yield actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Coupon per period follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Face value, Frequency and Coupon rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Face value, Frequency and Coupon rate is what you already know and Coupon per period and Annual coupon is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/rmd">RMD Calculator</a>, <a href="/finance/roa">ROA (return on assets)</a> and <a href="/finance/roas">ROAS Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bond current yield calculator work out?', 'a' => <<<'TXT'
            Coupon per period, Annual coupon, Bond price and Current yield, from Coupon rate, Face value and Frequency. The relationship is Coupon per period = Coupon rate × Face value ÷ Frequency.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Face value (USD), Frequency, Coupon rate (percent). Fill face value, frequency and coupon rate and leave Coupon per period empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Coupon per period, Frequency, Coupon rate and Face value blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Coupon per period = 1000 USD. Those are the defaults written into the form — move Face value and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Coupon per period is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Face value blank and the page solves for it, reporting Coupon per period instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Coupon per period at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/rmd', 'name' => 'RMD Calculator'],
            ['path' => '/finance/roa', 'name' => 'ROA (return on assets)'],
            ['path' => '/finance/roas', 'name' => 'ROAS Calculator'],
        ],
        'authors' => [],
    ],
];

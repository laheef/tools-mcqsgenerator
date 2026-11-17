<?php

/**
 * Coupon payment
 * /finance/coupon-payment
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Coupon payment',
    'meta' => ['title' => 'Coupon payment Calculator — Formula, Units & Example', 'description' => 'Coupon payment turns face value of bond, annual coupon rate and number of payments per annum into current yield. The formula is printed in the form\'s own words.', 'h1' => 'Coupon payment Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'face_value',
                            'label' => 'Face value of bond',
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
                            'name' => 'annual_coupon_rate',
                            'label' => 'Annual coupon rate',
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
                            'name' => 'num_payments',
                            'label' => 'Number of payments per annum',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coupon_payment',
                            'label' => 'Coupon payment',
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
            'title' => 'Current yield',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annual_coupon_payments',
                            'label' => 'Annual coupon payments',
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
                            'name' => 'market_value',
                            'label' => 'Market value',
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
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'coupon_payment = face_value * (annual_coupon_rate / num_payments)',
            'results' => ['coupon_payment' => 'annual_coupon_rate*face_value/num_payments', 'annual_coupon_rate' => 'coupon_payment*num_payments/face_value', 'num_payments' => 'annual_coupon_rate*face_value/coupon_payment', 'face_value' => 'coupon_payment*num_payments/annual_coupon_rate'],
        ],
        [
            'title' => 'current_yield = annual_coupon_payments / market_value',
            'results' => ['annual_coupon_payments' => 'current_yield*market_value', 'current_yield' => 'annual_coupon_payments/market_value', 'market_value' => 'annual_coupon_payments/current_yield'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Coupon payment works out Coupon payment and Annual coupon payments from Face value of bond, Annual coupon rate and Number of payments per annum. The arithmetic is the whole method: coupon payment is worked out from face value of bond by one formula, applied once. Coupon payment comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Coupon payment calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Coupon payment: it takes 3 numbers and reports Coupon payment, Annual coupon payments and Market value.</p><p>The relationship it solves reads Coupon payment = Annual coupon rate × Face value of bond ÷ Number of payments per annum.</p><p>What comes back is Coupon payment, Annual coupon payments, Market value and Current yield — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Face value of bond</strong> — in USD</li><li><strong>Annual coupon rate</strong> — in percent</li><li><strong>Number of payments per annum</strong> — a plain number, no unit</li></ul><p>The result boxes are Coupon payment in USD, Annual coupon payments in USD, Market value in USD, Current yield in percent; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Face value of bond = 10 USD, Annual coupon rate = 100 perc, Number of payments per annum = 1000, Annual coupon payments = 10 USD, Market value = 100 USD and Current yield = 1000 perc; the answers are <strong>Coupon payment</strong> = 1 USD.</p><ul><li><strong>Coupon payment</strong> = 1 USD</li></ul><p>The line behind those figures is <strong>Coupon payment</strong> = <code>Annual coupon rate × Face value of bond ÷ Number of payments per annum</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Coupon payment</strong> = 1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Current yield lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Coupon payment</strong> = <code>Annual coupon rate × Face value of bond ÷ Number of payments per annum</code></li><li><strong>Annual coupon rate</strong> = <code>Coupon payment × Number of payments per annum ÷ Face value of bond</code></li><li><strong>Number of payments per annum</strong> = <code>Annual coupon rate × Face value of bond ÷ Coupon payment</code></li><li><strong>Face value of bond</strong> = <code>Coupon payment × Number of payments per annum ÷ Annual coupon rate</code></li><li><strong>Current yield</strong> = <code>Annual coupon payments ÷ Market value</code></li><li><strong>Annual coupon payments</strong> = <code>Current yield × Market value</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Coupon payment</strong> = <code>Annual coupon rate × Face value of bond ÷ Number of payments per annum</code> — the form to use when Annual coupon rate, Face value of bond and Number of payments per annum are the values you have.</li><li><strong>Annual coupon rate</strong> = <code>Coupon payment × Number of payments per annum ÷ Face value of bond</code> — the form to use when Coupon payment, Number of payments per annum and Face value of bond are the values you have.</li><li><strong>Number of payments per annum</strong> = <code>Annual coupon rate × Face value of bond ÷ Coupon payment</code> — the form to use when Annual coupon rate, Face value of bond and Coupon payment are the values you have.</li><li><strong>Face value of bond</strong> = <code>Coupon payment × Number of payments per annum ÷ Annual coupon rate</code> — the form to use when Coupon payment, Number of payments per annum and Annual coupon rate are the values you have.</li><li><strong>Current yield</strong> = <code>Annual coupon payments ÷ Market value</code> — the form to use when Annual coupon payments and Market value are the values you have.</li><li><strong>Annual coupon payments</strong> = <code>Current yield × Market value</code> — the form to use when Current yield and Market value are the values you have.</li><li><strong>Market value</strong> = <code>Annual coupon payments ÷ Current yield</code> — the form to use when Annual coupon payments and Current yield are the values you have.</li></ul><p>Any one of Coupon payment, Annual coupon rate and Number of payments per annum can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Face value of bond, from 10 to 20 — and the answers go from <strong>Coupon payment</strong> 1 USD to <strong>Coupon payment</strong> 2 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Annual coupon rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Coupon payment, Annual coupon payments and Market value are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Face value of bond left as a guess.</strong> Anything typed into Face value of bond is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Annual coupon rate left as a guess.</strong> Anything typed into Annual coupon rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Face value of bond is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Coupon payment form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Face value of bond</strong> takes a plain number with no unit attached. It feeds Coupon payment, Annual coupon rate and Number of payments per annum. Fill it from a measurement rather than a memory — Face value of bond is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Annual coupon rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Coupon payment, Number of payments per annum and Face value of bond. Fill it from a measurement rather than a memory — Annual coupon rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of payments per annum</strong> takes a plain number with no unit attached. It feeds Coupon payment, Annual coupon rate and Face value of bond. Fill it from a measurement rather than a memory — Number of payments per annum is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Coupon payment</strong> is a plain number and the page's own defaults put it at 1. It is worked out from Annual coupon rate, Face value of bond and Number of payments per annum. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Annual coupon payments</strong> is a plain number. It is worked out from Current yield and Market value. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Market value</strong> is a plain number. It is worked out from Annual coupon payments and Current yield. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Current yield</strong> is a percent figure. It is worked out from Annual coupon payments and Market value. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Coupon payment</th></tr></thead><tbody><tr><td><strong>Face value of bond</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Annual coupon rate</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Number of payments per annum</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Annual coupon payments</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Market value</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Current yield</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Annual coupon rate: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Annual coupon payments, Market value and Current yield barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Face value of bond = 5 USD, Annual coupon rate = 50 perc, Number of payments per annum = 500, Annual coupon payments = 5 USD, Market value = 50 USD and Current yield = 500 perc and the page reports <strong>Coupon payment</strong> = 0.5 USD.</li><li>Feed in Face value of bond = 30 USD, Annual coupon rate = 100 perc, Number of payments per annum = 1000, Annual coupon payments = 10 USD, Market value = 100 USD and Current yield = 1000 perc and the page reports <strong>Coupon payment</strong> = 3 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Coupon payment actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Coupon payment is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Face value of bond, Annual coupon rate and Number of payments per annum are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Face value of bond, Annual coupon rate and Number of payments per annum measured, Coupon payment and Annual coupon payments wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/depreciation">Depreciation Calculator</a>, <a href="/finance/direct-material-price-variance">Direct material price variance Calculator</a> and <a href="/finance/discount-rate">Discount rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Coupon payment calculator work out?', 'a' => <<<'TXT'
            Coupon payment, Annual coupon payments, Market value and Current yield, from Annual coupon rate, Face value of bond and Number of payments per annum. The relationship is Coupon payment = Annual coupon rate × Face value of bond ÷ Number of payments per annum.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Face value of bond (USD), Annual coupon rate (percent), Number of payments per annum. With face value of bond, annual coupon rate and number of payments per annum in place, Coupon payment can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Coupon payment, Annual coupon rate, Number of payments per annum and Face value of bond blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Coupon payment = 1 USD. The figures come from Face value of bond as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Coupon payment is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Face value of bond blank and the page solves for it, reporting Coupon payment instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Coupon payment at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/depreciation', 'name' => 'Depreciation Calculator'],
            ['path' => '/finance/direct-material-price-variance', 'name' => 'Direct material price variance Calculator'],
            ['path' => '/finance/discount-rate', 'name' => 'Discount rate Calculator'],
        ],
        'authors' => [],
    ],
];

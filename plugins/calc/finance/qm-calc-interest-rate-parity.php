<?php

/**
 * Interest rate parity
 * /finance/interest-rate-parity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Interest rate parity',
    'meta' => ['title' => 'Interest rate parity — Free Online Calculator', 'description' => 'Interest rate parity works out price currency interest rate and base currency interest rate and reports both. The formula is printed in the form\'s own words.', 'h1' => 'Interest rate parity Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'version',
                            'label' => 'Version',
                            'type' => 'select',
                            'options' => ['Covered' => '0', 'Uncovered' => '1'],
                            'dataset' => 'select_version_VS',
                            'default' => 'Covered',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days',
                            'label' => 'Number of days in the forward contract',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Price currency interest rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Annualised_price_rate',
                            'label' => 'Annualised price currency interest rate',
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
                            'name' => 'Price_rate',
                            'label' => 'Price currency interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Base currency interest rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Annualised_base',
                            'label' => 'Annualised base currency interest rate',
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
                            'name' => 'Base',
                            'label' => 'Base currency interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Currency forward price',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spot_price',
                            'label' => 'Spot price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '4'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Currency_forward_covered',
                            'label' => 'Currency forward price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '4'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Currency_forward_uncovered',
                            'label' => 'Currency forward price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '4'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Price_rate = Annualised_price_rate * (days / 360)',
            'results' => ['Annualised_price_rate' => '360*Price_rate/days', 'days' => '360*Price_rate/Annualised_price_rate', 'Price_rate' => '(1/360)*Annualised_price_rate*days'],
        ],
        [
            'title' => 'Base =  Annualised_base * (days / 360)',
            'results' => ['Base' => '(1/360)*Annualised_base*days', 'days' => '360*Base/Annualised_base', 'Annualised_base' => '360*Base/days'],
        ],
        [
            'title' => 'Currency_forward_covered = spot_price * ((1 + Price_rate) / (1 + Base))',
            'results' => ['Currency_forward_covered' => 'spot_price*(Price_rate + 1)/(Base + 1)', 'spot_price' => 'Currency_forward_covered*(Base + 1)/(Price_rate + 1)', 'Base' => '(-Currency_forward_covered + Price_rate*spot_price + spot_price)/Currency_forward_covered', 'Price_rate' => '(Base*Currency_forward_covered + Currency_forward_covered - spot_price)/spot_price'],
        ],
        [
            'title' => 'Currency_forward_uncovered = spot_price * (1 + (Price_rate - Base))',
            'results' => ['Currency_forward_uncovered' => 'spot_price*(-Base + Price_rate + 1)', 'spot_price' => 'Currency_forward_uncovered/(-Base + Price_rate + 1)', 'Base' => '-Currency_forward_uncovered/spot_price + Price_rate + 1', 'Price_rate' => 'Base + Currency_forward_uncovered/spot_price - 1'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Interest rate parity works out Price currency interest rate and Annualised base currency interest rate from Number of days in the forward contract and Annualised price currency interest rate. The arithmetic is the whole method: price currency interest rate is worked out from number of days in the forward contract by one formula, applied once. Price currency interest rate comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Interest rate parity calculator works', 'html' => <<<'TXT'
            <p>The Interest rate parity calculator applies one relationship to 2 numbers and reports Price currency interest rate, Annualised base currency interest rate and Base currency interest rate.</p><p>In the form&#039;s own words, Price currency interest rate = (1 ÷ 360) × Annualised price currency interest rate × Number of days in the forward contract.</p><p>What comes back is Price currency interest rate, Annualised base currency interest rate, Base currency interest rate and Spot price — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Number of days in the forward contract</strong> — in days</li><li><strong>Annualised price currency interest rate</strong> — in percent</li></ul><p>The answers come back as Price currency interest rate in percent, Annualised base currency interest rate in percent, Base currency interest rate in percent, Spot price in USD, Currency forward price in USD, Currency forward price in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Price currency interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Price currency interest rate</strong> = <code>(1 ÷ 360) × Annualised price currency interest rate × Number of days in the forward contract</code></li><li><strong>Annualised price currency interest rate</strong> = <code>360 × Price currency interest rate ÷ Number of days in the forward contract</code></li><li><strong>Number of days in the forward contract</strong> = <code>360 × Price currency interest rate ÷ Annualised price currency interest rate</code></li><li><strong>Base currency interest rate</strong> = <code>(1 ÷ 360) × Annualised base currency interest rate × Number of days in the forward contract</code></li><li><strong>Annualised base currency interest rate</strong> = <code>360 × Base currency interest rate ÷ Number of days in the forward contract</code></li><li><strong>Currency forward price</strong> = <code>Spot price × (Price currency interest rate + 1) ÷ (Base currency interest rate + 1)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Price currency interest rate</strong> = <code>(1 ÷ 360) × Annualised price currency interest rate × Number of days in the forward contract</code> — the form to use when Annualised price currency interest rate and Number of days in the forward contract are the values you have.</li><li><strong>Annualised price currency interest rate</strong> = <code>360 × Price currency interest rate ÷ Number of days in the forward contract</code> — the form to use when Price currency interest rate and Number of days in the forward contract are the values you have.</li><li><strong>Number of days in the forward contract</strong> = <code>360 × Price currency interest rate ÷ Annualised price currency interest rate</code> — the form to use when Price currency interest rate and Annualised price currency interest rate are the values you have.</li><li><strong>Base currency interest rate</strong> = <code>(1 ÷ 360) × Annualised base currency interest rate × Number of days in the forward contract</code> — the form to use when Annualised base currency interest rate and Number of days in the forward contract are the values you have.</li><li><strong>Number of days in the forward contract</strong> = <code>360 × Base currency interest rate ÷ Annualised base currency interest rate</code> — the form to use when Base currency interest rate and Annualised base currency interest rate are the values you have.</li><li><strong>Annualised base currency interest rate</strong> = <code>360 × Base currency interest rate ÷ Number of days in the forward contract</code> — the form to use when Base currency interest rate and Number of days in the forward contract are the values you have.</li><li><strong>Currency forward price</strong> = <code>Spot price × (Price currency interest rate + 1) ÷ (Base currency interest rate + 1)</code> — the form to use when Spot price, Price currency interest rate and Base currency interest rate are the values you have.</li><li><strong>Spot price</strong> = <code>Currency forward price × (Base currency interest rate + 1) ÷ (Price currency interest rate + 1)</code> — the form to use when Currency forward price, Base currency interest rate and Price currency interest rate are the values you have.</li></ul><p>Any one of Price currency interest rate, Annualised price currency interest rate and Number of days in the forward contract can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Annualised price currency interest rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Price currency interest rate, Annualised base currency interest rate and Base currency interest rate are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Number of days in the forward contract left as a guess.</strong> Anything typed into Number of days in the forward contract is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Annualised price currency interest rate left as a guess.</strong> Anything typed into Annualised price currency interest rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Number of days in the forward contract to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Interest rate parity form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Number of days in the forward contract</strong> is measured in days. Change it and Annualised price currency interest rate, Price currency interest rate and Base currency interest rate changes with it. Fill it from a measurement rather than a memory — Number of days in the forward contract is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Annualised price currency interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Number of days in the forward contract and Price currency interest rate changes with it. Fill it from a measurement rather than a memory — Annualised price currency interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Price currency interest rate</strong> is a percent figure. It is computed from Annualised price currency interest rate and Number of days in the forward contract, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Annualised base currency interest rate</strong> is a percent figure. It is computed from Base currency interest rate and Number of days in the forward contract, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Base currency interest rate</strong> is a percent figure. It is computed from Annualised base currency interest rate and Number of days in the forward contract, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Spot price</strong> is a plain number. It is computed from Currency forward price, Base currency interest rate and Price currency interest rate, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Currency forward price</strong> is a plain number. It is computed from Spot price, Price currency interest rate and Base currency interest rate, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Currency forward price</strong> is a plain number. It is computed from Spot price, Base currency interest rate and Price currency interest rate, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Price currency interest rate is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Number of days in the forward contract and Annualised price currency interest rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Number of days in the forward contract and Annualised price currency interest rate is what you already know and Price currency interest rate and Annualised base currency interest rate is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/personal-loan">Personal loan</a>, <a href="/finance/phillips-curve">Phillips curve Calculator</a> and <a href="/finance/piti">PITI Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Interest rate parity calculator work out?', 'a' => <<<'TXT'
            Price currency interest rate, Annualised base currency interest rate, Base currency interest rate and Spot price, from Annualised price currency interest rate and Number of days in the forward contract. The relationship is Price currency interest rate = (1 ÷ 360) × Annualised price currency interest rate × Number of days in the forward contract.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of days in the forward contract (days), Annualised price currency interest rate (percent). With number of days in the forward contract and annualised price currency interest rate in place, Price currency interest rate can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Price currency interest rate, Annualised price currency interest rate, Number of days in the forward contract and Base currency interest rate blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Price currency interest rate is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Number of days in the forward contract blank and the page solves for it, reporting Price currency interest rate instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Price currency interest rate keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/personal-loan', 'name' => 'Personal loan'],
            ['path' => '/finance/phillips-curve', 'name' => 'Phillips curve Calculator'],
            ['path' => '/finance/piti', 'name' => 'PITI Calculator'],
        ],
        'authors' => [],
    ],
];

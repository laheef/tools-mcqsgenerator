<?php

/**
 * Mileage reimbursement
 * /finance/mileage-reimbursement
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mileage reimbursement',
    'meta' => ['title' => 'Mileage reimbursement: Formula, Steps & Results', 'description' => 'Mileage reimbursement turns tax year, business and medical into mileage deduction. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Mileage reimbursement Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_year',
                            'label' => 'Tax year',
                            'type' => 'select',
                            'options' => [
                                '2026' => '0.725',
                                '2025' => '0.7',
                                '2024' => '0.67',
                                '2023' => '0.655',
                                '2022 (2nd half)' => '0.625',
                                '2022 (1st half)' => '0.585',
                                '2021' => '0.56',
                                '2020' => '0.575',
                                '2019' => '0.58',
                                '2018' => '0.545',
                                'Custom rates' => '',
                            ],
                            'dataset' => 'year',
                            'control' => 'DROPDOWN',
                            'default' => '2026',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'business',
                            'label' => 'Business',
                            'type' => 'result',
                            'prefix' => '$',
                            'suffix' => 'per mile',
                            'rounding' => ['standard', '3'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'medical',
                            'label' => 'Medical',
                            'type' => 'result',
                            'prefix' => '$',
                            'suffix' => 'per mile',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'charity',
                            'label' => 'Charity',
                            'type' => 'result',
                            'prefix' => '$',
                            'suffix' => 'per mile',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'miles_business',
                            'label' => 'Miles driven for business purpose',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'mi',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'miles_medical',
                            'label' => 'Miles driven for medical purpose',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'mi',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'miles_charity',
                            'label' => 'Miles driven for charity purpose',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'mi',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'reimbursement',
                            'label' => 'Mileage deduction',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'reimbursement = (miles_business * business) + (miles_medical * medical) + (miles_charity * charity)',
            'results' => [
                'miles_charity' => '(-business*miles_business - medical*miles_medical + reimbursement)/charity',
                'business' => '(-charity*miles_charity - medical*miles_medical + reimbursement)/miles_business',
                'charity' => '(-business*miles_business - medical*miles_medical + reimbursement)/miles_charity',
                'miles_business' => '(-charity*miles_charity - medical*miles_medical + reimbursement)/business',
                'miles_medical' => '(-business*miles_business - charity*miles_charity + reimbursement)/medical',
                'medical' => '(-business*miles_business - charity*miles_charity + reimbursement)/miles_medical',
                'reimbursement' => 'business*miles_business + charity*miles_charity + medical*miles_medical',
            ],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Mileage reimbursement works out Business and Medical from Tax year, Miles driven for business purpose and Miles driven for medical purpose. The arithmetic is the whole method: business is worked out from tax year by one formula, applied once. Business comes back in per mile unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Mileage reimbursement calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Mileage reimbursement: it takes 5 numbers and reports Business, Medical and Charity.</p><p>Written with the labels from the form, Mileage deduction = Business × Miles driven for business purpose + Charity × Miles driven for charity purpose + Medical × Miles driven for medical purpose.</p><p>What comes back is Business, Medical and Charity — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>Tax year</strong> — a plain number, no unit</li><li><strong>Miles driven for business purpose</strong> — in miles</li><li><strong>Miles driven for medical purpose</strong> — in miles</li><li><strong>Miles driven for charity purpose</strong> — in miles</li><li><strong>Mileage deduction</strong> — a plain number, no unit</li></ul><p>The answers come back as Business in per mile, Medical in per mile, Charity in per mile. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Miles driven for business purpose lists 6 options and opens on miles. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Mileage deduction</strong> = <code>Business × Miles driven for business purpose + Charity × Miles driven for charity purpose + Medical × Miles driven for medical purpose</code></li><li><strong>Miles driven for charity purpose</strong> = <code>( − Business × Miles driven for business purpose − Medical × Miles driven for medical purpose + Mileage deduction) ÷ Charity</code></li><li><strong>Business</strong> = <code>( − Charity × Miles driven for charity purpose − Medical × Miles driven for medical purpose + Mileage deduction) ÷ Miles driven for business purpose</code></li><li><strong>Charity</strong> = <code>( − Business × Miles driven for business purpose − Medical × Miles driven for medical purpose + Mileage deduction) ÷ Miles driven for charity purpose</code></li><li><strong>Miles driven for business purpose</strong> = <code>( − Charity × Miles driven for charity purpose − Medical × Miles driven for medical purpose + Mileage deduction) ÷ Business</code></li><li><strong>Miles driven for medical purpose</strong> = <code>( − Business × Miles driven for business purpose − Charity × Miles driven for charity purpose + Mileage deduction) ÷ Medical</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Mileage deduction</strong> = <code>Business × Miles driven for business purpose + Charity × Miles driven for charity purpose + Medical × Miles driven for medical purpose</code> — the form to use when Business, Miles driven for business purpose, Charity and Miles driven for charity purpose are the values you have.</li><li><strong>Miles driven for charity purpose</strong> = <code>( − Business × Miles driven for business purpose − Medical × Miles driven for medical purpose + Mileage deduction) ÷ Charity</code> — the form to use when Business, Miles driven for business purpose, Medical and Miles driven for medical purpose are the values you have.</li><li><strong>Business</strong> = <code>( − Charity × Miles driven for charity purpose − Medical × Miles driven for medical purpose + Mileage deduction) ÷ Miles driven for business purpose</code> — the form to use when Charity, Miles driven for charity purpose, Medical and Miles driven for medical purpose are the values you have.</li><li><strong>Charity</strong> = <code>( − Business × Miles driven for business purpose − Medical × Miles driven for medical purpose + Mileage deduction) ÷ Miles driven for charity purpose</code> — the form to use when Business, Miles driven for business purpose, Medical and Miles driven for medical purpose are the values you have.</li><li><strong>Miles driven for business purpose</strong> = <code>( − Charity × Miles driven for charity purpose − Medical × Miles driven for medical purpose + Mileage deduction) ÷ Business</code> — the form to use when Charity, Miles driven for charity purpose, Medical and Miles driven for medical purpose are the values you have.</li><li><strong>Miles driven for medical purpose</strong> = <code>( − Business × Miles driven for business purpose − Charity × Miles driven for charity purpose + Mileage deduction) ÷ Medical</code> — the form to use when Business, Miles driven for business purpose, Charity and Miles driven for charity purpose are the values you have.</li><li><strong>Medical</strong> = <code>( − Business × Miles driven for business purpose − Charity × Miles driven for charity purpose + Mileage deduction) ÷ Miles driven for medical purpose</code> — the form to use when Business, Miles driven for business purpose, Charity and Miles driven for charity purpose are the values you have.</li></ul><p>Any one of Mileage deduction, Miles driven for charity purpose and Business can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Miles driven for business purpose, Miles driven for medical purpose and Miles driven for charity purpose carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Business, Medical and Charity are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Tax year left as a guess.</strong> Anything typed into Tax year is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Miles driven for business purpose left as a guess.</strong> Anything typed into Miles driven for business purpose is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Tax year to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Mileage reimbursement form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Tax year</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Tax year is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Miles driven for business purpose</strong> is a miles quantity: the page opens it in mi and converts anything else you pick before the formula runs. Change it and Miles driven for charity purpose, Business and Charity changes with it. Fill it from a measurement rather than a memory — Miles driven for business purpose is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Miles driven for medical purpose</strong> is a miles quantity: the page opens it in mi and converts anything else you pick before the formula runs. Change it and Miles driven for charity purpose, Business and Charity changes with it. Fill it from a measurement rather than a memory — Miles driven for medical purpose is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Miles driven for charity purpose</strong> is a miles quantity: the page opens it in mi and converts anything else you pick before the formula runs. Change it and Business, Charity and Miles driven for business purpose changes with it. Fill it from a measurement rather than a memory — Miles driven for charity purpose is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Mileage deduction</strong> takes a plain number with no unit attached. Change it and Miles driven for charity purpose, Business and Charity changes with it. Fill it from a measurement rather than a memory — Mileage deduction is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Business</strong> is a plain number. The value follows from Charity, Miles driven for charity purpose, Medical and Miles driven for medical purpose. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Medical</strong> is a plain number. The value follows from Business, Miles driven for business purpose, Charity and Miles driven for charity purpose. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Charity</strong> is a plain number. The value follows from Business, Miles driven for business purpose, Medical and Miles driven for medical purpose. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Mileage reimbursement actually offers.</p><ul><li><strong>miles</strong> — opens in <em>mi</em>, and the chip also carries km, ft, yd, mi and nmi. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Business is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover miles. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Tax year, Miles driven for business purpose and Miles driven for medical purpose measured, Business and Medical wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/va-disability">VA disability Calculator</a>, <a href="/finance/va-loan">VA loan Calculator</a> and <a href="/finance/var">Value at risk (VaR)</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mileage reimbursement calculator work out?', 'a' => <<<'TXT'
            Business, Medical and Charity, from Business, Miles driven for business purpose, Charity and Miles driven for charity purpose. The relationship is Mileage deduction = Business × Miles driven for business purpose + Charity × Miles driven for charity purpose + Medical × Miles driven for medical purpose.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Tax year, Miles driven for business purpose (miles), Miles driven for medical purpose (miles), Miles driven for charity purpose (miles), Mileage deduction. With tax year, miles driven for business purpose and miles driven for medical purpose in place, Business can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Mileage deduction, Miles driven for charity purpose, Business and Charity blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Business is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Tax year blank and the page solves for it, reporting Business instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Business keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/va-disability', 'name' => 'VA disability Calculator'],
            ['path' => '/finance/va-loan', 'name' => 'VA loan Calculator'],
            ['path' => '/finance/var', 'name' => 'Value at risk (VaR)'],
        ],
        'authors' => [],
    ],
];

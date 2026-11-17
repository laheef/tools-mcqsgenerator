<?php

/**
 * HRA exemption
 * /finance/hra-exemption
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'HRA exemption',
    'meta' => ['title' => 'HRA exemption Calculator — Formula & Results', 'description' => 'HRA exemption works out exempted HRA and hra 1 from basic pay and DA received. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'HRA exemption Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'basic_pay',
                            'label' => 'Basic pay',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dearness_allowance',
                            'label' => 'DA received',
                            'type' => 'number',
                            'help' => 'Dearness Allowance.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hra_employer',
                            'label' => 'HRA received',
                            'type' => 'number',
                            'help' => 'HRA received from employer as per payslip.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actual_rent',
                            'label' => 'Actual rent paid',
                            'type' => 'number',
                            'help' => 'The actual rent you pay.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'metro',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['I am in a metro city' => '0.5', '' => '0.4'],
                            'dataset' => 'is_metro',
                            'control' => 'CHECKBOX',
                            'default' => 'I am in a metro city',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Your HRA exemption',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hra',
                            'label' => 'Exempted HRA',
                            'type' => 'number',
                            'suffix' => '₹',
                            'help' => 'For this financial year.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hra_1',
                            'label' => 'Hra 1',
                            'type' => 'number',
                            'suffix' => '₹',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hra_2',
                            'label' => 'Hra 2',
                            'type' => 'number',
                            'suffix' => '₹',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hra_3',
                            'label' => 'Hra 3',
                            'type' => 'number',
                            'suffix' => '₹',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'taxable_hra',
                            'label' => 'Taxable HRA',
                            'type' => 'number',
                            'suffix' => '₹',
                            'help' => 'For this financial year.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'hra_1 = max(0,actual_rent - (basic_pay + dearness_allowance) * 0.1)',
            'results' => ['hra_1' => 'max(0, actual_rent - 1/10*basic_pay - 1/10*dearness_allowance)'],
        ],
        [
            'title' => 'hra_2 = max(0,hra_employer)',
            'results' => ['hra_2' => 'max(0, hra_employer)', 'hra_employer' => 'hra_2'],
        ],
        [
            'title' => 'hra_3 = max(0,(basic_pay + dearness_allowance) * metro)',
            'results' => ['metro' => 'hra_3/(basic_pay + dearness_allowance)', 'hra_3' => 'max(0, metro*(basic_pay + dearness_allowance))', 'dearness_allowance' => '-basic_pay + hra_3/metro', 'basic_pay' => '-dearness_allowance + hra_3/metro'],
        ],
        [
            'title' => 'hra = min(hra_1, hra_2, hra_3)',
            'results' => ['hra' => 'min(hra_2, hra_3, max(0, actual_rent - 1/10*basic_pay - 1/10*dearness_allowance))'],
        ],
        [
            'title' => 'taxable_hra = max(0,hra_employer - min(hra_1, hra_2, hra_3))',
            'results' => ['taxable_hra' => 'max(0, hra_employer - min(hra_2, hra_3, max(0, actual_rent - 1/10*basic_pay - 1/10*dearness_allowance)))'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Basic pay, DA received and Actual rent paid into HRA exemption and the answer comes back as HRA received and Exempted HRA. There is no hidden constant here: change HRA received and basic pay moves with it. The main result, HRA received, is reported in years.
        TXT,
        'sections' => [
            ['title' => 'How the HRA exemption calculator works', 'html' => <<<'TXT'
            <p>HRA exemption answers one question from 3 numbers, and the answer is HRA received, Exempted HRA and Hra 1.</p><p>The relationship it solves reads Hra 1 = max(0, Actual rent paid − 1 ÷ 10 × Basic pay − 1 ÷ 10 × DA received).</p><p>The result panel carries HRA received, Exempted HRA, Hra 1 and Hra 2, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Basic pay</strong> — in years</li><li><strong>DA received</strong> — in years. Dearness Allowance.</li><li><strong>Actual rent paid</strong> — in years. The actual rent you pay.</li></ul><p>The answers come back as HRA received in years, Exempted HRA in ₹, Hra 1 in ₹, Hra 2 in ₹, Hra 3 in ₹, Taxable HRA in ₹, Metro. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Actual rent paid = 3 yrs — through the same formula and the panel reports <strong>Metro</strong> = 0.5.</p><ul><li><strong>Metro</strong> = 0.5</li></ul><p>That is <strong>Hra 1</strong> = <code>max(0, Actual rent paid − 1 ÷ 10 × Basic pay − 1 ÷ 10 × DA received)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Metro</strong> = 0.5. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on HRA received lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Hra 1</strong> = <code>max(0, Actual rent paid − 1 ÷ 10 × Basic pay − 1 ÷ 10 × DA received)</code></li><li><strong>Hra 2</strong> = <code>max(0, HRA received)</code></li><li><strong>HRA received</strong> = <code>Hra 2</code></li><li><strong>Hra 3</strong> = <code>max(0, Metro × (Basic pay + DA received))</code></li><li><strong>Metro</strong> = <code>Hra 3 ÷ (Basic pay + DA received)</code></li><li><strong>DA received</strong> = <code>− Basic pay + Hra 3 ÷ Metro</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Hra 1</strong> = <code>max(0, Actual rent paid − 1 ÷ 10 × Basic pay − 1 ÷ 10 × DA received)</code> — the form to use when Actual rent paid, Basic pay and DA received are the values you have.</li><li><strong>Hra 2</strong> = <code>max(0, HRA received)</code> — the form to use when HRA received are the values you have.</li><li><strong>HRA received</strong> = <code>Hra 2</code> — the form to use when Hra 2 are the values you have.</li><li><strong>Hra 3</strong> = <code>max(0, Metro × (Basic pay + DA received))</code> — the form to use when Metro, Basic pay and DA received are the values you have.</li><li><strong>Metro</strong> = <code>Hra 3 ÷ (Basic pay + DA received)</code> — the form to use when Hra 3, Basic pay and DA received are the values you have.</li><li><strong>DA received</strong> = <code>− Basic pay + Hra 3 ÷ Metro</code> — the form to use when Basic pay, Hra 3 and Metro are the values you have.</li><li><strong>Basic pay</strong> = <code>− DA received + Hra 3 ÷ Metro</code> — the form to use when DA received, Hra 3 and Metro are the values you have.</li><li><strong>Exempted HRA</strong> = <code>min(Hra 2, Hra 3, max(0, Actual rent paid − 1 ÷ 10 × Basic pay − 1 ÷ 10 × DA received))</code> — the form to use when Hra 2, Hra 3, Actual rent paid and Basic pay are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Hra 1, Hra 2 and HRA received can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Actual rent paid from 3 to 6, leaving every other box alone. The panel moves from <strong>Metro</strong> 0.5 to <strong>Metro</strong> 0.5.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Basic pay, DA received and Actual rent paid carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> HRA received, Exempted HRA and Hra 1 are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Basic pay left as a guess.</strong> Anything typed into Basic pay is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>DA received left as a guess.</strong> Anything typed into DA received is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Basic pay is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the HRA exemption form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Basic pay</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The page reads it when it works out Hra 1, Metro and Hra 3. Fill it from a measurement rather than a memory — Basic pay is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>DA received</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. Dearness Allowance. The page reads it when it works out Hra 1, Metro and Hra 3. Fill it from a measurement rather than a memory — DA received is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Actual rent paid</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The actual rent you pay. The page reads it when it works out Hra 1, Exempted HRA and Taxable HRA. Fill it from a measurement rather than a memory — Actual rent paid is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 7 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>HRA received</strong> is a years figure. It is computed from Hra 2, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Exempted HRA</strong> is a plain number. It is computed from Hra 2, Hra 3, Actual rent paid and Basic pay, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Hra 1</strong> is a plain number. It is computed from Actual rent paid, Basic pay and DA received, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Hra 2</strong> is a plain number. It is computed from HRA received, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Hra 3</strong> is a plain number. It is computed from Metro, Basic pay and DA received, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Taxable HRA</strong> is a plain number. It is computed from HRA received, Hra 2, Hra 3 and Actual rent paid, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Metro</strong> is a plain number and the page's own defaults put it at 0.5. It is computed from Hra 3, Basic pay and DA received, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Metro</th></tr></thead><tbody><tr><td><strong>Actual rent paid</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Actual rent paid: ten per cent there moves an answer by about 0 per cent, which is why that is the number to measure twice. By contrast, Actual rent paid barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on HRA exemption actually offers.</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind HRA received is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover years. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Basic pay, DA received and Actual rent paid and the number you are missing is HRA received and Exempted HRA.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/biweekly-pay">Biweekly pay</a>, <a href="/finance/black-friday">Black Friday Calculator</a> and <a href="/finance/black-scholes">Black Scholes Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the HRA exemption calculator work out?', 'a' => <<<'TXT'
            HRA received, Exempted HRA, Hra 1 and Hra 2, from Actual rent paid, Basic pay and DA received. The relationship is Hra 1 = max(0, Actual rent paid − 1 ÷ 10 × Basic pay − 1 ÷ 10 × DA received).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Basic pay (years), DA received (years), Actual rent paid (years). With basic pay, DA received and actual rent paid in place, HRA received can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Hra 1, Hra 2, HRA received and Hra 3 can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Metro = 0.5. The figures come from Basic pay as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally HRA received is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Basic pay blank and the page solves for it, reporting HRA received instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. HRA received keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/biweekly-pay', 'name' => 'Biweekly pay'],
            ['path' => '/finance/black-friday', 'name' => 'Black Friday Calculator'],
            ['path' => '/finance/black-scholes', 'name' => 'Black Scholes Calculator'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * APY
 * /finance/apy
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'APY',
    'meta' => ['title' => 'APY Calculator — Free, With Worked Examples', 'description' => 'APY works out annual percentage yield (APY) and final deposit from initial deposit and Annual percentage rate of charge (APR). A worked example follows.', 'h1' => 'APY Calculator', 'updated' => '2026-10-05'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_balance',
                            'label' => 'Initial deposit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '10000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest',
                            'label' => 'Annual percentage rate of charge (APR)',
                            'type' => 'number',
                            'help' => 'The annual percentage rate.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                            'default' => '5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'compounding_frequency',
                            'label' => 'Compound frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Half-yearly' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Weekly' => '52.1775',
                                'Daily' => '365.242',
                            ],
                            'dataset' => 'compound frequency',
                            'control' => 'DROPDOWN',
                            'help' => 'The number of times in a given unit of time that accumulated interest is capitalized and the balance increases.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'APY',
                            'label' => 'Annual percentage yield (APY)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'years',
                            'label' => 'Term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.000001'],
                            'default' => '12',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_balance',
                            'label' => 'Final deposit',
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
    ],
    'formula' => [
        [
            'title' => 'APY = (1 + interest / compounding_frequency)^compounding_frequency - 1',
            'results' => ['interest' => 'compounding_frequency*(pow(APY + 1, 1/compounding_frequency) - 1)', 'APY' => 'pow((compounding_frequency + interest)/compounding_frequency, compounding_frequency) - 1'],
        ],
        [
            'title' => 'final_balance = initial_balance * (1 + interest / compounding_frequency)^(compounding_frequency * years)',
            'results' => ['final_balance' => 'initial_balance*pow((compounding_frequency + interest)/compounding_frequency, compounding_frequency*years)', 'interest' => 'compounding_frequency*(pow(final_balance/initial_balance, 1/(compounding_frequency*years)) - 1)', 'years' => 'log(final_balance/initial_balance)/(compounding_frequency*log((compounding_frequency + interest)/compounding_frequency))', 'initial_balance' => 'final_balance*pow((compounding_frequency + interest)/compounding_frequency, -compounding_frequency*years)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Annual percentage rate of charge (APR) and Compound frequency into APY and the answer comes back as Initial deposit and Annual percentage yield (APY). Nothing is looked up on this page: initial deposit is computed from annual percentage rate of charge (APR) and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Initial deposit is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the APY calculator works', 'html' => <<<'TXT'
            <p>The APY calculator applies one relationship to 2 numbers and reports Initial deposit, Annual percentage yield (APY) and Term.</p><p>In the form&#039;s own words, Annual percentage yield (APY) = ((Compound frequency + Annual percentage rate of charge (APR)) ÷ Compound frequency)^(Compound frequency) − 1.</p><p>The answers are Initial deposit, Annual percentage yield (APY), Term and Final deposit; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Annual percentage rate of charge (APR)</strong> — in percent. The annual percentage rate.</li><li><strong>Compound frequency</strong> — a plain number, no unit. The number of times in a given unit of time that accumulated interest is capitalized and the balance increases.</li></ul><p>What you get back is Initial deposit in USD, Annual percentage yield (APY) in percent, Term in months, Final deposit in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Annual percentage yield (APY) lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Annual percentage yield (APY)</strong> = <code>((Compound frequency + Annual percentage rate of charge (APR)) ÷ Compound frequency)^(Compound frequency) − 1</code></li><li><strong>Annual percentage rate of charge (APR)</strong> = <code>Compound frequency × ((Annual percentage yield (APY) + 1)^(1 ÷ Compound frequency) − 1)</code></li><li><strong>Final deposit</strong> = <code>Initial deposit × ((Compound frequency + Annual percentage rate of charge (APR)) ÷ Compound frequency)^(Compound frequency × Term)</code></li><li><strong>Term</strong> = <code>ln(Final deposit ÷ Initial deposit) ÷ (Compound frequency × ln((Compound frequency + Annual percentage rate of charge (APR)) ÷ Compound frequency))</code></li><li><strong>Initial deposit</strong> = <code>Final deposit × ((Compound frequency + Annual percentage rate of charge (APR)) ÷ Compound frequency)^(− Compound frequency × Term)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Annual percentage yield (APY)</strong> = <code>((Compound frequency + Annual percentage rate of charge (APR)) ÷ Compound frequency)^(Compound frequency) − 1</code> — the form to use when Compound frequency and Annual percentage rate of charge (APR) are the values you have.</li><li><strong>Annual percentage rate of charge (APR)</strong> = <code>Compound frequency × ((Annual percentage yield (APY) + 1)^(1 ÷ Compound frequency) − 1)</code> — the form to use when Compound frequency and Annual percentage yield (APY) are the values you have.</li><li><strong>Final deposit</strong> = <code>Initial deposit × ((Compound frequency + Annual percentage rate of charge (APR)) ÷ Compound frequency)^(Compound frequency × Term)</code> — the form to use when Initial deposit, Compound frequency, Annual percentage rate of charge (APR) and Term are the values you have.</li><li><strong>Annual percentage rate of charge (APR)</strong> = <code>Compound frequency × ((Final deposit ÷ Initial deposit)^(1 ÷ (Compound frequency × Term)) − 1)</code> — the form to use when Compound frequency, Final deposit, Initial deposit and Term are the values you have.</li><li><strong>Term</strong> = <code>ln(Final deposit ÷ Initial deposit) ÷ (Compound frequency × ln((Compound frequency + Annual percentage rate of charge (APR)) ÷ Compound frequency))</code> — the form to use when Final deposit, Initial deposit, Compound frequency and Annual percentage rate of charge (APR) are the values you have.</li><li><strong>Initial deposit</strong> = <code>Final deposit × ((Compound frequency + Annual percentage rate of charge (APR)) ÷ Compound frequency)^(− Compound frequency × Term)</code> — the form to use when Final deposit, Compound frequency, Annual percentage rate of charge (APR) and Term are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Annual percentage yield (APY), Annual percentage rate of charge (APR) and Final deposit can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Annual percentage rate of charge (APR) carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Initial deposit, Annual percentage yield (APY) and Term are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Annual percentage rate of charge (APR) left as a guess.</strong> Anything typed into Annual percentage rate of charge (APR) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Compound frequency left as a guess.</strong> Anything typed into Compound frequency is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Annual percentage rate of charge (APR) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the APY form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Annual percentage rate of charge (APR)</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The annual percentage rate. Change it and Annual percentage yield (APY), Final deposit and Term changes with it. Fill it from a measurement rather than a memory — Annual percentage rate of charge (APR) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Compound frequency</strong> takes a plain number with no unit attached. The number of times in a given unit of time that accumulated interest is capitalized and the balance increases. Change it and Annual percentage rate of charge (APR), Annual percentage yield (APY) and Final deposit changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Compound frequency is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Initial deposit</strong> is a plain number. It is computed from Final deposit, Compound frequency, Annual percentage rate of charge (APR) and Term, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Annual percentage yield (APY)</strong> is a percent figure. It is computed from Compound frequency and Annual percentage rate of charge (APR), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Term</strong> is a months figure. It is computed from Final deposit, Initial deposit, Compound frequency and Annual percentage rate of charge (APR), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Final deposit</strong> is a plain number. It is computed from Initial deposit, Compound frequency, Annual percentage rate of charge (APR) and Term, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on APY actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>months</strong> — opens in <em>mos</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Initial deposit is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover percent and months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Annual percentage rate of charge (APR) and Compound frequency measured, Initial deposit and Annual percentage yield (APY) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/sinking-fund">Sinking fund Calculator</a>, <a href="/finance/smokers-ctc">Smoker&#039;s CTC (cost to company) Calculator</a> and <a href="/finance/software-contract-value">Software contract value Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the APY calculator work out?', 'a' => <<<'TXT'
            Initial deposit, Annual percentage yield (APY), Term and Final deposit, from Compound frequency and Annual percentage rate of charge (APR). The relationship is Annual percentage yield (APY) = ((Compound frequency + Annual percentage rate of charge (APR)) ÷ Compound frequency)^(Compound frequency) − 1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Annual percentage rate of charge (APR) (percent), Compound frequency. Fill annual percentage rate of charge (APR) and compound frequency and leave Initial deposit empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Annual percentage yield (APY), Annual percentage rate of charge (APR), Final deposit and Term can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Initial deposit is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Annual percentage rate of charge (APR) blank and the page solves for it, reporting Initial deposit instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Initial deposit keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/sinking-fund', 'name' => 'Sinking fund Calculator'],
            ['path' => '/finance/smokers-ctc', 'name' => 'Smoker\'s CTC (cost to company) Calculator'],
            ['path' => '/finance/software-contract-value', 'name' => 'Software contract value Calculator'],
        ],
        'authors' => [],
    ],
];

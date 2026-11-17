<?php

/**
 * EAR
 * /finance/ear
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'EAR',
    'meta' => ['title' => 'EAR Calculator — Free, With Worked Examples', 'description' => 'EAR turns annual interest rate and compounding frequency into periodic rate. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'EAR Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Interest rate calculation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_rate',
                            'label' => 'Annual interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.00001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'compound_freq',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => [
                                'Annual' => '1.000000000000000',
                                'Semi-annual' => '2.000000000000000',
                                'Quarterly' => '4.000000000000000',
                                'Monthly' => '12.000000000000000',
                                'Weekly' => '52.177500000000000',
                                'Daily' => '365.242000000000000',
                                'Continuous' => '0',
                            ],
                            'dataset' => 'm',
                            'control' => 'DROPDOWN',
                            'default' => 'Annual',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'periodic_interest_rate',
                            'label' => 'Periodic rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.00001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'EAR',
                            'label' => 'Effective Annual Rate (EAR)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.00001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'EAR_continuous',
                            'label' => 'Effective Annual Rate (EAR)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.00001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Future value calculation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'years',
                            'label' => 'Term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_balance',
                            'label' => 'Initial balance',
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
                            'name' => 'final_balance',
                            'label' => 'Final balance',
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
                            'name' => 'final_balance_cont',
                            'label' => 'Final balance',
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
            'title' => 'EAR = one_way((1 + interest_rate / compound_freq)^compound_freq - 1)',
            'results' => ['EAR' => '(pow((compound_freq + interest_rate)/compound_freq, compound_freq) - 1)'],
        ],
        [
            'title' => 'EAR_continuous = e^interest_rate-1',
            'results' => ['interest_rate' => 'log(EAR_continuous + 1)', 'EAR_continuous' => 'exp(interest_rate) - 1'],
        ],
        [
            'title' => 'final_balance = one_way(initial_balance * (1 + interest_rate / compound_freq)^(compound_freq * years))',
            'results' => ['final_balance' => '(initial_balance*pow((compound_freq + interest_rate)/compound_freq, compound_freq*years))'],
        ],
        [
            'title' => 'final_balance_cont = initial_balance * e^(interest_rate * years)',
            'results' => ['initial_balance' => 'final_balance_cont*exp(-interest_rate*years)', 'interest_rate' => 'log(final_balance_cont/initial_balance)/years', 'final_balance_cont' => 'initial_balance*exp(interest_rate*years)', 'years' => 'log(final_balance_cont/initial_balance)/interest_rate'],
        ],
        [
            'title' => 'periodic_interest_rate = interest_rate / compound_freq',
            'results' => ['interest_rate' => 'compound_freq*periodic_interest_rate', 'periodic_interest_rate' => 'interest_rate/compound_freq', 'compound_freq' => 'interest_rate/periodic_interest_rate'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        EAR takes Annual interest rate and Compounding frequency and returns Periodic rate and Effective Annual Rate (EAR). The arithmetic is the whole method: periodic rate is worked out from annual interest rate by one formula, applied once. Periodic rate comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the EAR calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind EAR: it takes 2 numbers and reports Periodic rate, Effective Annual Rate (EAR) and Effective Annual Rate (EAR).</p><p>The relationship it solves reads Effective Annual Rate (EAR) = (((Compounding frequency + Annual interest rate) ÷ Compounding frequency)^(Compounding frequency) − 1).</p><p>The result panel carries Periodic rate, Effective Annual Rate (EAR), Effective Annual Rate (EAR) and Term, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Annual interest rate</strong> — in percent</li><li><strong>Compounding frequency</strong> — a plain number, no unit</li></ul><p>The result boxes are Periodic rate in percent, Effective Annual Rate (EAR) in percent, Effective Annual Rate (EAR) in percent, Term in years / months, Initial balance in USD, Final balance in USD, Final balance in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Annual interest rate = 10 perc, Compounding frequency = 1, Periodic rate = 100 perc, Effective Annual Rate (EAR) = 1000 perc, Term = 10 yrsmos, Initial balance = 100 USD, Final balance = 1000 USD and Final balance = 10 USD — through the same formula and the panel reports <strong>Effective Annual Rate (EAR)</strong> = 10 perc.</p><ul><li><strong>Effective Annual Rate (EAR)</strong> = 10 perc</li></ul><p>The line behind those figures is <strong>Effective Annual Rate (EAR)</strong> = <code>(((Compounding frequency + Annual interest rate) ÷ Compounding frequency)^(Compounding frequency) − 1)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Effective Annual Rate (EAR)</strong> = 10 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Periodic rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Effective Annual Rate (EAR)</strong> = <code>(((Compounding frequency + Annual interest rate) ÷ Compounding frequency)^(Compounding frequency) − 1)</code></li><li><strong>Annual interest rate</strong> = <code>ln(Effective Annual Rate (EAR) + 1)</code></li><li><strong>Final balance</strong> = <code>(Initial balance × ((Compounding frequency + Annual interest rate) ÷ Compounding frequency)^(Compounding frequency × Term))</code></li><li><strong>Initial balance</strong> = <code>Final balance × e^( − Annual interest rate × Term)</code></li><li><strong>Term</strong> = <code>ln(Final balance ÷ Initial balance) ÷ Annual interest rate</code></li><li><strong>Periodic rate</strong> = <code>Annual interest rate ÷ Compounding frequency</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Effective Annual Rate (EAR)</strong> = <code>(((Compounding frequency + Annual interest rate) ÷ Compounding frequency)^(Compounding frequency) − 1)</code> — the form to use when Compounding frequency and Annual interest rate are the values you have.</li><li><strong>Effective Annual Rate (EAR)</strong> = <code>e^(Annual interest rate) − 1</code> — the form to use when Annual interest rate are the values you have.</li><li><strong>Annual interest rate</strong> = <code>ln(Effective Annual Rate (EAR) + 1)</code> — the form to use when Effective Annual Rate (EAR) are the values you have.</li><li><strong>Final balance</strong> = <code>(Initial balance × ((Compounding frequency + Annual interest rate) ÷ Compounding frequency)^(Compounding frequency × Term))</code> — the form to use when Initial balance, Compounding frequency, Annual interest rate and Term are the values you have.</li><li><strong>Final balance</strong> = <code>Initial balance × e^(Annual interest rate × Term)</code> — the form to use when Initial balance, Annual interest rate and Term are the values you have.</li><li><strong>Initial balance</strong> = <code>Final balance × e^( − Annual interest rate × Term)</code> — the form to use when Final balance, Annual interest rate and Term are the values you have.</li><li><strong>Annual interest rate</strong> = <code>ln(Final balance ÷ Initial balance) ÷ Term</code> — the form to use when Final balance, Initial balance and Term are the values you have.</li><li><strong>Term</strong> = <code>ln(Final balance ÷ Initial balance) ÷ Annual interest rate</code> — the form to use when Final balance, Initial balance and Annual interest rate are the values you have.</li></ul><p>Any one of Effective Annual Rate (EAR), Effective Annual Rate (EAR) and Annual interest rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Annual interest rate, from 10 to 20 — and the answers go from <strong>Effective Annual Rate (EAR)</strong> 10 perc to <strong>Effective Annual Rate (EAR)</strong> 20 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Annual interest rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Periodic rate, Effective Annual Rate (EAR) and Effective Annual Rate (EAR) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Annual interest rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Annual interest rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Compounding frequency left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Compounding frequency is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Annual interest rate is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the EAR form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Annual interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Effective Annual Rate (EAR), Effective Annual Rate (EAR) and Final balance changes with it. Fill it from a measurement rather than a memory — Annual interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Compounding frequency</strong> takes a plain number with no unit attached. Change it and Effective Annual Rate (EAR), Final balance and Annual interest rate changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Compounding frequency is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Periodic rate</strong> is a percent figure. It is computed from Annual interest rate and Compounding frequency, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Effective Annual Rate (EAR)</strong> is a percent figure and the page's own defaults put it at 10 perc. It is computed from Compounding frequency and Annual interest rate, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Effective Annual Rate (EAR)</strong> is a percent figure. It is computed from Annual interest rate, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Term</strong> is a years / months figure. It is computed from Final balance, Initial balance and Annual interest rate, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Initial balance</strong> is a plain number. It is computed from Final balance, Annual interest rate and Term, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Final balance</strong> is a plain number. It is computed from Initial balance, Compounding frequency, Annual interest rate and Term, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Final balance</strong> is a plain number. It is computed from Initial balance, Annual interest rate and Term, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Periodic rate is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years / months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Annual interest rate and Compounding frequency are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Annual interest rate and Compounding frequency is what you already know and Periodic rate and Effective Annual Rate (EAR) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/interest-coverage-ratio">Interest coverage ratio Calculator</a>, <a href="/finance/interest-per-day">Interest per day Calculator</a> and <a href="/finance/interest-rate">Interest rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the EAR calculator work out?', 'a' => <<<'TXT'
            Periodic rate, Effective Annual Rate (EAR), Effective Annual Rate (EAR) and Term, from Compounding frequency and Annual interest rate. The relationship is Effective Annual Rate (EAR) = (((Compounding frequency + Annual interest rate) ÷ Compounding frequency)^(Compounding frequency) − 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Annual interest rate (percent), Compounding frequency. Fill annual interest rate and compounding frequency and leave Periodic rate empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Effective Annual Rate (EAR), Effective Annual Rate (EAR), Annual interest rate and Final balance blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Effective Annual Rate (EAR) = 10 perc. That comes from the page's own defaults, entered in Annual interest rate; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Periodic rate is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Annual interest rate blank and the page solves for it, reporting Periodic rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Periodic rate at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/interest-coverage-ratio', 'name' => 'Interest coverage ratio Calculator'],
            ['path' => '/finance/interest-per-day', 'name' => 'Interest per day Calculator'],
            ['path' => '/finance/interest-rate', 'name' => 'Interest rate Calculator'],
        ],
        'authors' => [],
    ],
];

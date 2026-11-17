<?php

/**
 * Effective interest rate
 * /finance/effective-interest-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Effective interest rate',
    'meta' => ['title' => 'Effective interest rate — Formula & Results', 'description' => 'Effective interest rate takes annual interest rate and returns periodic rate. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Effective interest rate Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Interest rates',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annualRate',
                            'label' => 'Annual interest rate',
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
                            'name' => 'compFreq',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => [
                                'Annual' => '1.000000000000000',
                                'Semi-annual' => '2.000000000000000',
                                'Quarterly' => '4.000000000000000',
                                'Monthly' => '12.000000000000000',
                                'Weekly' => '52.177500000000000',
                                'Daily (average)' => '365.242000000000000',
                                'Daily (360/yr)' => '360',
                                'Daily (365/yr)' => '365',
                                'Continuous' => '0',
                            ],
                            'dataset' => 'compFreq',
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'periodicRate',
                            'label' => 'Periodic rate',
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
                            'name' => 'effectiveRate',
                            'label' => 'Effective interest rate (EIR)',
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
                            'name' => 'effectiveRate_continousCompFreq',
                            'label' => 'Effective interest rate (EIR)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Balances',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'term',
                            'label' => 'Term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.000001'],
                            'default' => '120',
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
                            'default' => '1000',
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
                            'name' => 'final_balance_continousCompFreq',
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
            'title' => 'effectiveRate = (1 + annualRate / compFreq)^compFreq - 1',
            'results' => ['annualRate' => 'compFreq*(pow(effectiveRate + 1, 1/compFreq) - 1)', 'effectiveRate' => 'pow((annualRate + compFreq)/compFreq, compFreq) - 1'],
        ],
        [
            'title' => 'effectiveRate_continousCompFreq = e^annualRate-1',
            'results' => ['annualRate' => 'log(effectiveRate_continousCompFreq + 1)', 'effectiveRate_continousCompFreq' => 'exp(annualRate) - 1'],
        ],
        [
            'title' => 'final_balance = initial_balance * (1 + annualRate / compFreq)^(compFreq * term)',
            'results' => ['annualRate' => 'compFreq*(pow(final_balance/initial_balance, 1/(compFreq*term)) - 1)', 'term' => 'log(final_balance/initial_balance)/(compFreq*log((annualRate + compFreq)/compFreq))', 'final_balance' => 'initial_balance*pow((annualRate + compFreq)/compFreq, compFreq*term)', 'initial_balance' => 'final_balance*pow((annualRate + compFreq)/compFreq, -compFreq*term)'],
        ],
        [
            'title' => 'final_balance_continousCompFreq = initial_balance * e^(annualRate * term)',
            'results' => ['annualRate' => 'log(final_balance_continousCompFreq/initial_balance)/term', 'initial_balance' => 'final_balance_continousCompFreq*exp(-annualRate*term)', 'term' => 'log(final_balance_continousCompFreq/initial_balance)/annualRate', 'final_balance_continousCompFreq' => 'initial_balance*exp(annualRate*term)'],
        ],
        [
            'title' => 'periodicRate = annualRate / compFreq',
            'results' => ['compFreq' => 'annualRate/periodicRate', 'annualRate' => 'compFreq*periodicRate', 'periodicRate' => 'annualRate/compFreq'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Effective interest rate works out Effective interest rate (EIR) from Annual interest rate, Compounding frequency and Periodic rate. The arithmetic is the whole method: effective interest rate (EIR) is worked out from annual interest rate by one formula, applied once. Effective interest rate (EIR) comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Effective interest rate calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Effective interest rate: it takes 8 numbers and reports Effective interest rate (EIR).</p><p>Written with the labels from the form, Effective interest rate (EIR) = ((Annual interest rate + Compounding frequency) ÷ Compounding frequency)^(Compounding frequency) − 1.</p><p>The answers are Effective interest rate (EIR); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 8 boxes, and nothing else.</p><ul><li><strong>Annual interest rate</strong> — in percent</li><li><strong>Compounding frequency</strong> — a plain number, no unit</li><li><strong>Periodic rate</strong> — in percent</li><li><strong>Effective interest rate (EIR)</strong> — in percent</li><li><strong>Term</strong> — in years / months</li><li><strong>Initial balance</strong> — in USD</li><li><strong>Final balance</strong> — in USD</li><li><strong>Final balance</strong> — in USD</li></ul><p>What you get back is Effective interest rate (EIR) in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Annual interest rate = 10 perc, Compounding frequency = 12, Periodic rate = 100 perc, Term = 120 yrsmos, Initial balance = 1000 USD, Final balance = 100 USD and Final balance = 1000 USD gives <strong>Effective interest rate (EIR)</strong> = 1441 perc and <strong>Effective interest rate (EIR)</strong> = 22025 perc.</p><ul><li><strong>Effective interest rate (EIR)</strong> = 1441 perc</li><li><strong>Effective interest rate (EIR)</strong> = 22025 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Effective interest rate (EIR)</strong> = <code>((Annual interest rate + Compounding frequency) ÷ Compounding frequency)^(Compounding frequency) − 1</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Effective interest rate (EIR)</strong> = 1441 and <strong>Effective interest rate (EIR)</strong> = 22025. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Effective interest rate (EIR) lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Effective interest rate (EIR)</strong> = <code>((Annual interest rate + Compounding frequency) ÷ Compounding frequency)^(Compounding frequency) − 1</code></li><li><strong>Annual interest rate</strong> = <code>Compounding frequency × ((Effective interest rate (EIR) + 1)^(1 ÷ Compounding frequency) − 1)</code></li><li><strong>Final balance</strong> = <code>Initial balance × ((Annual interest rate + Compounding frequency) ÷ Compounding frequency)^(Compounding frequency × Term)</code></li><li><strong>Term</strong> = <code>ln(Final balance ÷ Initial balance) ÷ (Compounding frequency × ln((Annual interest rate + Compounding frequency) ÷ Compounding frequency))</code></li><li><strong>Initial balance</strong> = <code>Final balance × ((Annual interest rate + Compounding frequency) ÷ Compounding frequency)^(− Compounding frequency × Term)</code></li><li><strong>Periodic rate</strong> = <code>Annual interest rate ÷ Compounding frequency</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Effective interest rate (EIR)</strong> = <code>((Annual interest rate + Compounding frequency) ÷ Compounding frequency)^(Compounding frequency) − 1</code> — the form to use when Annual interest rate and Compounding frequency are the values you have.</li><li><strong>Annual interest rate</strong> = <code>Compounding frequency × ((Effective interest rate (EIR) + 1)^(1 ÷ Compounding frequency) − 1)</code> — the form to use when Compounding frequency and Effective interest rate (EIR) are the values you have.</li><li><strong>Effective interest rate (EIR)</strong> = <code>e^(Annual interest rate) − 1</code> — the form to use when Annual interest rate are the values you have.</li><li><strong>Annual interest rate</strong> = <code>ln(Effective interest rate (EIR) + 1)</code> — the form to use when Effective interest rate (EIR) are the values you have.</li><li><strong>Final balance</strong> = <code>Initial balance × ((Annual interest rate + Compounding frequency) ÷ Compounding frequency)^(Compounding frequency × Term)</code> — the form to use when Initial balance, Annual interest rate, Compounding frequency and Term are the values you have.</li><li><strong>Annual interest rate</strong> = <code>Compounding frequency × ((Final balance ÷ Initial balance)^(1 ÷ (Compounding frequency × Term)) − 1)</code> — the form to use when Compounding frequency, Final balance, Initial balance and Term are the values you have.</li><li><strong>Term</strong> = <code>ln(Final balance ÷ Initial balance) ÷ (Compounding frequency × ln((Annual interest rate + Compounding frequency) ÷ Compounding frequency))</code> — the form to use when Final balance, Initial balance, Compounding frequency and Annual interest rate are the values you have.</li><li><strong>Initial balance</strong> = <code>Final balance × ((Annual interest rate + Compounding frequency) ÷ Compounding frequency)^(− Compounding frequency × Term)</code> — the form to use when Final balance, Annual interest rate, Compounding frequency and Term are the values you have.</li></ul><p>Any one of Effective interest rate (EIR), Annual interest rate and Effective interest rate (EIR) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Annual interest rate, from 10 to 20 — and the answers go from <strong>Effective interest rate (EIR)</strong> 1441 perc and <strong>Effective interest rate (EIR)</strong> 22025 perc to <strong>Effective interest rate (EIR)</strong> 129307 perc and <strong>Effective interest rate (EIR)</strong> 4.852e+8 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Annual interest rate, Periodic rate and Effective interest rate (EIR) carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Effective interest rate (EIR) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Annual interest rate left as a guess.</strong> Anything typed into Annual interest rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Compounding frequency left as a guess.</strong> Anything typed into Compounding frequency is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Annual interest rate and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Annual interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Effective interest rate (EIR), Effective interest rate (EIR) and Term. Have it to hand before you start: Annual interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Compounding frequency</strong> takes a plain number with no unit attached. The page reads it when it works out Annual interest rate, Effective interest rate (EIR) and Term. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Compounding frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Periodic rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Compounding frequency and Annual interest rate. Have it to hand before you start: Periodic rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Effective interest rate (EIR)</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Annual interest rate. Have it to hand before you start: Effective interest rate (EIR) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. The page reads it when it works out Annual interest rate, Final balance and Initial balance. Have it to hand before you start: Term is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Initial balance</strong> takes a plain number with no unit attached. The page reads it when it works out Annual interest rate, Term and Final balance. Have it to hand before you start: Initial balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Final balance</strong> takes a plain number with no unit attached. The page reads it when it works out Annual interest rate, Term and Initial balance. Have it to hand before you start: Final balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Final balance</strong> takes a plain number with no unit attached. The page reads it when it works out Annual interest rate, Initial balance and Term. Have it to hand before you start: Final balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Effective interest rate (EIR)</strong> is a percent figure and the page's own defaults put it at 22025 perc. It is computed from Annual interest rate, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Effective interest rate (EIR) is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years / months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Annual interest rate, Compounding frequency and Periodic rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Annual interest rate, Compounding frequency and Periodic rate and the number you are missing is Effective interest rate (EIR).</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/maximum-drawdown">Maximum drawdown Calculator</a>, <a href="/finance/mega-millions-payout">Mega Millions payout</a> and <a href="/finance/mileage-reimbursement">Mileage reimbursement Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Effective interest rate calculator work out?', 'a' => <<<'TXT'
            Effective interest rate (EIR), from Annual interest rate and Compounding frequency. The relationship is Effective interest rate (EIR) = ((Annual interest rate + Compounding frequency) ÷ Compounding frequency)^(Compounding frequency) − 1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Annual interest rate (percent), Compounding frequency, Periodic rate (percent), Effective interest rate (EIR) (percent), Term (years / months). With annual interest rate, compounding frequency and periodic rate in place, Effective interest rate (EIR) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Effective interest rate (EIR), Annual interest rate, Effective interest rate (EIR) and Final balance blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Effective interest rate (EIR) = 1441 perc and Effective interest rate (EIR) = 22025 perc. That comes from the page's own defaults, entered in Annual interest rate; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Effective interest rate (EIR) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Annual interest rate left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Effective interest rate (EIR) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/maximum-drawdown', 'name' => 'Maximum drawdown Calculator'],
            ['path' => '/finance/mega-millions-payout', 'name' => 'Mega Millions payout'],
            ['path' => '/finance/mileage-reimbursement', 'name' => 'Mileage reimbursement Calculator'],
        ],
        'authors' => [],
    ],
];

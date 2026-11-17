<?php

/**
 * Bitcoin ETF
 * /finance/bitcoin-etf
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bitcoin ETF',
    'meta' => ['title' => 'Bitcoin ETF Calculator: Formula, Steps & Examples', 'description' => 'Bitcoin ETF turns investment amount and duration into choose your ETF. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Bitcoin ETF Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ETF',
                            'label' => 'Choose your ETF',
                            'type' => 'select',
                            'options' => [
                                'iShares Bitcoin Trust' => '1',
                                'Grayscale Bitcoin Trust' => '2',
                                'Wise Origin Bitcoin Trust by Fidelity' => '3',
                                'Ark/21 Shares Bitcoin Trust' => '4',
                                'Bitwise Bitcoin ETP' => '5',
                                'VanEck Bitcoin Trust' => '6',
                                'Valkyrie Bitcoin Fund' => '7',
                                'Invesco Galaxy Bitcoin ETF' => '8',
                                'Franklin Bitcoin ETF' => '9',
                                'WisdomTree Bitcoin Trust' => '10',
                                'Custom' => '11',
                            ],
                            'dataset' => 'ETFs',
                            'control' => 'DROPDOWN',
                            'help' => 'Select Custom if your ETF isn\'t on the list. Then you can enter the Expense ratio manually.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InitialInv',
                            'label' => 'Investment amount',
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
                            'name' => 'Duration',
                            'label' => 'Duration',
                            'type' => 'number',
                            'help' => 'How long you plan to invest.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'ExpRatio',
                            'label' => 'Expense ratio ',
                            'type' => 'result',
                            'help' => 'The expense ratio is the fee that you are paying annually for the maintenance of the ETF / trust fund.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'Other',
                            'label' => 'Other costs',
                            'type' => 'number',
                            'help' => 'Any additional fees or costs like transaction fees during the investment period.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'ExpReturn',
                            'label' => 'Expected return',
                            'type' => 'number',
                            'help' => 'What annual growth rate do you expect for your ETF? Input as a percentage.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'EffectiveInvRet',
                            'label' => 'Effective return ',
                            'type' => 'number',
                            'help' => 'Expected return after deducting expense ratio.',
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
                            'name' => 'FutureValue_TotInv',
                            'label' => 'Future value of your investment',
                            'type' => 'number',
                            'help' => 'Total worth of investment after the given duration.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TotCost_ETF',
                            'label' => 'Total cost of ETF',
                            'type' => 'number',
                            'help' => 'Sum of all expenses over the investment period.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'DiffPercentage > 0 and Duration != 1', 'text' => <<<'TXT'
                                If you invest {{InitialInv.monetaryValue}} in a selected ETF and expect it to grow {{ExpReturn.formattedValue}}% annually, your investment will be worth {{FutureValue_TotInv.monetaryValue}} after {{Duration.value}} years.  This is a {{DiffPercentage.formattedValue}}% increase from your initial investment.  The total cost of this investment would be {{TotCost_ETF.monetaryValue}}.&nbsp;
                                TXT],
                                ['when' => 'DiffPercentage < 0 and Duration != 1', 'text' => <<<'TXT'
                                If you invest {{InitialInv.monetaryValue}} in a selected ETF and expect it to grow {{ExpReturn.formattedValue}}% annually, your investment will be worth {{FutureValue_TotInv.monetaryValue}} after {{Duration.value}} years.  This is {{DiffPercentage.formattedValue}}% from your initial investment.  The total cost of this investment would be {{TotCost_ETF.monetaryValue}}.&nbsp;
                                TXT],
                                ['when' => 'DiffPercentage > 0 and Duration == 1', 'text' => <<<'TXT'
                                If you invest {{InitialInv.monetaryValue}} in a selected ETF and expect it to grow {{ExpReturn.formattedValue}}% annually, your investment will be worth {{FutureValue_TotInv.monetaryValue}} after {{Duration.value}} year.  This is a {{DiffPercentage.formattedValue}}% increase from your initial investment.  The total cost of this investment would be {{TotCost_ETF.monetaryValue}}.&nbsp;
                                TXT],
                                ['when' => 'DiffPercentage < 0 and Duration == 1', 'text' => <<<'TXT'
                                If you invest {{InitialInv.monetaryValue}} in a selected ETF and expect it to grow {{ExpReturn.formattedValue}}% annually, your investment will be worth {{FutureValue_TotInv.monetaryValue}} after {{Duration.value}} year.  This is {{DiffPercentage.formattedValue}}% from your initial investment.  The total cost of this investment would be {{TotCost_ETF.monetaryValue}}.
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FutureValue_InitialInv',
                            'label' => 'Initial investment future value',
                            'type' => 'number',
                            'help' => 'Total worth of investment after costs, after&nbsp;',
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
                            'name' => 'FutureValue_PerInv',
                            'label' => 'Periodic investment future value',
                            'type' => 'number',
                            'suffix' => '/ year',
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
                            'name' => 'debug',
                            'label' => 'Debug',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PerInv',
                            'label' => 'Yearly investment',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'DiffPercentage',
                            'label' => 'Diff percentage',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'FutureValue_InitialInv = InitialInv* (1 + EffectiveInvRet)^(Duration)',
            'results' => ['EffectiveInvRet' => 'pow(FutureValue_InitialInv/InitialInv, 1/Duration) - 1', 'InitialInv' => 'FutureValue_InitialInv*pow(EffectiveInvRet + 1, -Duration)', 'FutureValue_InitialInv' => 'InitialInv*pow(EffectiveInvRet + 1, Duration)', 'Duration' => 'log(FutureValue_InitialInv/InitialInv)/log(EffectiveInvRet + 1)'],
        ],
        [
            'title' => 'FutureValue_PerInv = PerInv*((1 +EffectiveInvRet) ^ Duration - 1) / EffectiveInvRet',
            'results' => ['FutureValue_PerInv' => 'PerInv*(pow(EffectiveInvRet + 1, Duration) - 1)/EffectiveInvRet', 'PerInv' => 'EffectiveInvRet*FutureValue_PerInv/(pow(EffectiveInvRet + 1, Duration) - 1)', 'Duration' => 'log((EffectiveInvRet*FutureValue_PerInv + PerInv)/PerInv)/log(EffectiveInvRet + 1)'],
        ],
        [
            'title' => 'FutureValue_TotInv= FutureValue_InitialInv + FutureValue_PerInv - Other',
            'results' => ['FutureValue_PerInv' => '-FutureValue_InitialInv + FutureValue_TotInv + Other', 'FutureValue_TotInv' => 'FutureValue_InitialInv + FutureValue_PerInv - Other', 'FutureValue_InitialInv' => '-FutureValue_PerInv + FutureValue_TotInv + Other', 'Other' => 'FutureValue_InitialInv + FutureValue_PerInv - FutureValue_TotInv'],
        ],
        [
            'title' => 'EffectiveInvRet = ExpReturn - ExpRatio',
            'results' => ['EffectiveInvRet' => '-ExpRatio + ExpReturn', 'ExpRatio' => '-EffectiveInvRet + ExpReturn', 'ExpReturn' => 'EffectiveInvRet + ExpRatio'],
        ],
        [
            'title' => 'TotCost_ETF= ((InitialInv* (1 + ExpReturn )^(Duration)) + (PerInv*((1 +ExpReturn) ^ Duration- 1) / ExpReturn))-FutureValue_TotInv',
            'results' => [
                'FutureValue_TotInv' => '(ExpReturn*(InitialInv*pow(ExpReturn + 1, Duration) - TotCost_ETF) + PerInv*pow(ExpReturn + 1, Duration) - PerInv)/ExpReturn',
                'PerInv' => 'ExpReturn*(FutureValue_TotInv - InitialInv*pow(ExpReturn + 1, Duration) + TotCost_ETF)/(pow(ExpReturn + 1, Duration) - 1)',
                'Duration' => 'log((ExpReturn*FutureValue_TotInv + ExpReturn*TotCost_ETF + PerInv)/(ExpReturn*InitialInv + PerInv))/log(ExpReturn + 1)',
                'InitialInv' => 'pow(ExpReturn + 1, -Duration)*(ExpReturn*(FutureValue_TotInv + TotCost_ETF) - PerInv*pow(ExpReturn + 1, Duration) + PerInv)/ExpReturn',
                'TotCost_ETF' => '(ExpReturn*(-FutureValue_TotInv + InitialInv*pow(ExpReturn + 1, Duration)) + PerInv*pow(ExpReturn + 1, Duration) - PerInv)/ExpReturn',
            ],
        ],
        [
            'title' => 'ETF=debug',
            'results' => ['ETF' => 'debug', 'debug' => 'ETF'],
        ],
        [
            'title' => '(FutureValue_TotInv-InitialInv)/InitialInv*100=DiffPercentage',
            'results' => ['FutureValue_TotInv' => '(1/100)*InitialInv*(DiffPercentage + 100)', 'InitialInv' => '100*FutureValue_TotInv/(DiffPercentage + 100)', 'DiffPercentage' => '100*FutureValue_TotInv/InitialInv - 100'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Bitcoin ETF takes Choose your ETF, Investment amount and Duration and returns Expense ratio and Future value of your investment. It is a single relationship that reads expense ratio out of choose your ETF, not a table of canned results keyed by them. Units for Expense ratio default to percent and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Bitcoin ETF calculator works', 'html' => <<<'TXT'
            <p>The Bitcoin ETF calculator applies one relationship to 10 numbers and reports Expense ratio, Future value of your investment and Total cost of ETF.</p><p>The relationship it solves reads Initial investment future value = Investment amount × (Effective return + 1)^(Duration).</p><p>What comes back is Expense ratio, Future value of your investment, Total cost of ETF and Debug — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 10 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Choose your ETF</strong> — a plain number, no unit. Select Custom if your ETF isn&#039;t on the list. Then you can enter the Expense ratio manually.</li><li><strong>Investment amount</strong> — in USD</li><li><strong>Duration</strong> — in years. How long you plan to invest.</li><li><strong>Other costs</strong> — in USD. Any additional fees or costs like transaction fees during the investment period.</li><li><strong>Expected return</strong> — in percent. What annual growth rate do you expect for your ETF? Input as a percentage.</li><li><strong>Effective return</strong> — in percent. Expected return after deducting expense ratio.</li><li><strong>Initial investment future value</strong> — in USD. Total worth of investment after costs, after&amp;nbsp;</li><li><strong>Periodic investment future value</strong> — in / year</li><li><strong>Yearly investment</strong> — in USD</li><li><strong>Diff percentage</strong> — a plain number, no unit</li></ul><p>The result boxes are Expense ratio in percent, Future value of your investment in USD, Total cost of ETF in USD, Debug; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Expense ratio offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Initial investment future value</strong> = <code>Investment amount × (Effective return + 1)^(Duration)</code></li><li><strong>Effective return</strong> = <code>(Initial investment future value ÷ Investment amount)^(1 ÷ Duration) − 1</code></li><li><strong>Investment amount</strong> = <code>Initial investment future value × (Effective return + 1)^(− Duration)</code></li><li><strong>Duration</strong> = <code>ln(Initial investment future value ÷ Investment amount) ÷ ln(Effective return + 1)</code></li><li><strong>Periodic investment future value</strong> = <code>Yearly investment × ((Effective return + 1)^(Duration) − 1) ÷ Effective return</code></li><li><strong>Yearly investment</strong> = <code>Effective return × Periodic investment future value ÷ ((Effective return + 1)^(Duration) − 1)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Initial investment future value</strong> = <code>Investment amount × (Effective return + 1)^(Duration)</code> — the form to use when Investment amount, Effective return and Duration are the values you have.</li><li><strong>Effective return</strong> = <code>(Initial investment future value ÷ Investment amount)^(1 ÷ Duration) − 1</code> — the form to use when Initial investment future value, Investment amount and Duration are the values you have.</li><li><strong>Investment amount</strong> = <code>Initial investment future value × (Effective return + 1)^(− Duration)</code> — the form to use when Initial investment future value, Effective return and Duration are the values you have.</li><li><strong>Duration</strong> = <code>ln(Initial investment future value ÷ Investment amount) ÷ ln(Effective return + 1)</code> — the form to use when Initial investment future value, Investment amount and Effective return are the values you have.</li><li><strong>Periodic investment future value</strong> = <code>Yearly investment × ((Effective return + 1)^(Duration) − 1) ÷ Effective return</code> — the form to use when Yearly investment, Effective return and Duration are the values you have.</li><li><strong>Yearly investment</strong> = <code>Effective return × Periodic investment future value ÷ ((Effective return + 1)^(Duration) − 1)</code> — the form to use when Effective return, Periodic investment future value and Duration are the values you have.</li><li><strong>Duration</strong> = <code>ln((Effective return × Periodic investment future value + Yearly investment) ÷ Yearly investment) ÷ ln(Effective return + 1)</code> — the form to use when Effective return, Periodic investment future value and Yearly investment are the values you have.</li><li><strong>Future value of your investment</strong> = <code>Initial investment future value + Periodic investment future value − Other costs</code> — the form to use when Initial investment future value, Periodic investment future value and Other costs are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Initial investment future value, Effective return and Investment amount can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Duration, Expected return and Effective return is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Expense ratio, Future value of your investment and Total cost of ETF are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Choose your ETF left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Choose your ETF is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Investment amount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Investment amount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Choose your ETF is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Choose your ETF</strong> takes a plain number with no unit attached. Select Custom if your ETF isn&#039;t on the list. Then you can enter the Expense ratio manually. It feeds Debug. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Choose your ETF is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Investment amount</strong> takes a plain number with no unit attached. It feeds Effective return, Initial investment future value and Duration. Have it to hand before you start: Investment amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Duration</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. How long you plan to invest. It feeds Effective return, Investment amount and Initial investment future value. Have it to hand before you start: Duration is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Other costs</strong> takes a plain number with no unit attached. Any additional fees or costs like transaction fees during the investment period. It feeds Periodic investment future value, Future value of your investment and Initial investment future value. Have it to hand before you start: Other costs is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Expected return</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. What annual growth rate do you expect for your ETF? Input as a percentage. It feeds Effective return, Expense ratio and Future value of your investment. Have it to hand before you start: Expected return is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Effective return</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Expected return after deducting expense ratio. It feeds Investment amount, Initial investment future value and Duration. Have it to hand before you start: Effective return is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Initial investment future value</strong> takes a plain number with no unit attached. Total worth of investment after costs, after&amp;nbsp;. It feeds Effective return, Investment amount and Duration. Have it to hand before you start: Initial investment future value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Periodic investment future value</strong> is measured in / year. It feeds Yearly investment, Duration and Future value of your investment. Have it to hand before you start: Periodic investment future value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Yearly investment</strong> takes a plain number with no unit attached. It feeds Periodic investment future value, Duration and Future value of your investment. Have it to hand before you start: Yearly investment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Diff percentage</strong> takes a plain number with no unit attached. It feeds Future value of your investment and Investment amount. Have it to hand before you start: Diff percentage is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Expense ratio</strong> is a percent figure. It is worked out from Effective return and Expected return. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Future value of your investment</strong> is a plain number. It is worked out from Initial investment future value, Periodic investment future value and Other costs. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total cost of ETF</strong> is a plain number. It is worked out from Expected return, Future value of your investment, Investment amount and Duration. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Debug</strong> is a plain number. It is worked out from Choose your ETF. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Expense ratio is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent and years. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Choose your ETF, Investment amount and Duration is what you already know and Expense ratio and Future value of your investment is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/cltv">CLTV (customer lifetime value)</a>, <a href="/finance/cobb-douglas-production-function">Cobb-Douglas production function Calculator</a> and <a href="/finance/combined-ratio">Combined ratio</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bitcoin ETF calculator work out?', 'a' => <<<'TXT'
            Expense ratio, Future value of your investment, Total cost of ETF and Debug, from Investment amount, Effective return and Duration. The relationship is Initial investment future value = Investment amount × (Effective return + 1)^(Duration).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Choose your ETF, Investment amount (USD), Duration (years), Other costs (USD), Expected return (percent). Enter choose your ETF, investment amount and duration; Expense ratio is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Initial investment future value, Effective return, Investment amount and Duration can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Expense ratio is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Choose your ETF left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Expense ratio at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/cltv', 'name' => 'CLTV (customer lifetime value)'],
            ['path' => '/finance/cobb-douglas-production-function', 'name' => 'Cobb-Douglas production function Calculator'],
            ['path' => '/finance/combined-ratio', 'name' => 'Combined ratio'],
        ],
        'authors' => [],
    ],
];

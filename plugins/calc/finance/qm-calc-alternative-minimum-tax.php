<?php

/**
 * Alternative minimum tax
 * /finance/alternative-minimum-tax
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Alternative minimum tax',
    'meta' => ['title' => 'Alternative minimum tax — Formula & Results', 'description' => 'Alternative minimum tax works out AMTI and taxable income from year, Adjusted Gross Income (AGI) and non-deductible taxes. Any box can be the unknown.', 'h1' => 'Alternative minimum tax Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Alternative minimum tax income',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'year',
                            'label' => 'Year',
                            'type' => 'select',
                            'options' => ['2022' => '2022', '2023' => '2023'],
                            'dataset' => 'year',
                            'help' => 'Choose 2022 if your taxes due in April 2023 or in October 2023.',
                            'default' => '2022',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_income',
                            'label' => 'Adjusted Gross Income (AGI)',
                            'type' => 'number',
                            'suffix' => '$',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'exemption_amount',
                            'label' => 'Non-deductible taxes',
                            'type' => 'number',
                            'suffix' => '$',
                            'help' => 'Add here the claimed state income and local tax deductions.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amt_income',
                            'label' => 'AMTI',
                            'type' => 'number',
                            'suffix' => '$',
                            'help' => 'Alternative Minimum Taxable Income',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Taxable income',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'filing_status',
                            'label' => 'Filing status',
                            'type' => 'select',
                            'options' => ['Single' => '0', 'Married, filed jointly' => '1', 'Married, filed separately' => '2'],
                            'default' => 'Single',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'taxable_income',
                            'label' => 'Taxable income',
                            'type' => 'number',
                            'suffix' => '$',
                            'help' => 'The base of the AMT tax rate after deducting the AMT exemption determined by your filing status.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Alternative minimum tax',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_credits',
                            'label' => 'Tax credits',
                            'type' => 'number',
                            'suffix' => '$',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'Your alternative minimum tax (AMT) is $&nbsp;'],
                                ['when' => 'year == 2022 and taxable_income > 206100 and (filing_status == 0 or filing_status == 1)', 'text' => '{{amt_2022_2.formattedValue}}.'],
                                ['when' => 'year == 2022 and taxable_income > 103050 and filing_status == 2', 'text' => '{{amt_2022_4.formattedValue}}.'],
                                ['when' => 'year == 2023 and taxable_income > 220700 and (filing_status == 0 or filing_status == 1)', 'text' => '{{amt_2023_2.formattedValue}}.'],
                                ['when' => 'year == 2023 and taxable_income > 110350 and filing_status == 2', 'text' => '{{amt_2023_4.formattedValue}}.'],
                                ['when' => 'year == 2022 and (filing_status == 0 or filing_status == 1) and taxable_income <= 206100', 'text' => '{{amt_common.formattedValue}}.'],
                                ['when' => 'year == 2022 and filing_status == 2 and taxable_income <= 103050', 'text' => '{{amt_common.formattedValue}}.'],
                                ['when' => 'year == 2023 and (filing_status == 0 or filing_status == 1) and taxable_income <= 220700', 'text' => '{{amt_common.formattedValue}}.'],
                                ['when' => 'year == 2023 and filing_status == 2 and taxable_income <= 110350', 'text' => '{{amt_common.formattedValue}}.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'amt_2022_2',
                            'label' => 'Amt 2022 2',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'amt_2022_4',
                            'label' => 'Amt 2022 4',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'amt_2023_2',
                            'label' => 'Amt 2023 2',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                        [
                            'name' => 'amt_2023_4',
                            'label' => 'Amt 2023 4',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amt_common',
                            'label' => 'Amt common',
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
            'title' => 'amt_income = total_income + exemption_amount',
            'results' => ['amt_income' => 'exemption_amount + total_income', 'exemption_amount' => 'amt_income - total_income', 'total_income' => 'amt_income - exemption_amount'],
        ],
        [
            'title' => 'taxable_income = taxable_income_calc(amt_income, filing_status, year)',
            'results' => ['taxable_income' => 'taxable_income_calc(amt_income, filing_status, year)'],
        ],
        [
            'title' => 'amt_common = one_way(taxable_income * 0.26 - tax_credits)',
            'results' => ['amt_common' => '(-tax_credits + (13/50)*taxable_income_calc(amt_income, filing_status, year))'],
        ],
        [
            'title' => 'amt_2022_2 = one_way((taxable_income - 206100) * 0.28 + 206100 * 0.26 - tax_credits)',
            'results' => ['amt_2022_2' => '(-tax_credits + (7/25)*taxable_income_calc(amt_income, filing_status, year) - 4122)'],
        ],
        [
            'title' => 'amt_2022_4 = one_way((taxable_income - 103050) * 0.28 + 103050 * 0.26 - tax_credits)',
            'results' => ['amt_2022_4' => '(-tax_credits + (7/25)*taxable_income_calc(amt_income, filing_status, year) - 2061)'],
        ],
        [
            'title' => 'amt_2023_2 = one_way((taxable_income - 220700) * 0.28 + 220700 * 0.26 - tax_credits)',
            'results' => ['amt_2023_2' => '(-tax_credits + (7/25)*taxable_income_calc(amt_income, filing_status, year) - 4414)'],
        ],
        [
            'title' => 'amt_2023_4 = one_way((taxable_income - 110350) * 0.28 + 110350 * 0.26 - tax_credits)',
            'results' => ['amt_2023_4' => '(-tax_credits + (7/25)*taxable_income_calc(amt_income, filing_status, year) - 2207)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("taxable_income_calc",function(amt_income,filing_status,year){var exemption_amount=0;var phase_out=0;var taxable_income=0;if(year===2022){if(filing_status===0){exemption_amount=73600;phase_out=539900}else if(filing_status===1){exemption_amount=118100;phase_out=1079800}else{exemption_amount=59050;phase_out=539900}}else if(year===2023){if(filing_status===0){exemption_amount=81300;phase_out=578150}else if(filing_status===1){exemption_amount=126500;phase_out=1156300}else{exemption_amount=63250;phase_out=578150}}if(amt_income>phase_out){exemption_amount=exemption_amount-(amt_income-phase_out)*0.25}if(exemption_amount<0){exemption_amount=0}taxable_income=amt_income-exemption_amount;if(taxable_income>0){return taxable_income}else{return 0}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Alternative minimum tax turns Adjusted Gross Income (AGI) and Non-deductible taxes into AMTI and Taxable income. It is a single relationship that reads AMTI out of adjusted Gross Income (AGI), not a table of canned results keyed by them. Units for AMTI default to $ and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Alternative minimum tax calculator works', 'html' => <<<'TXT'
            <p>Alternative minimum tax answers one question from 2 numbers, and the answer is AMTI, Taxable income and Amt 2022 2.</p><p>In the form&#039;s own words, AMTI = Non-deductible taxes + Adjusted Gross Income (AGI).</p><p>What comes back is AMTI, Taxable income, Amt 2022 2 and Amt 2022 4 — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Adjusted Gross Income (AGI)</strong> — in $</li><li><strong>Non-deductible taxes</strong> — in $. Add here the claimed state income and local tax deductions.</li></ul><p>The result boxes are AMTI in $, Taxable income in $, Amt 2022 2, Amt 2022 4, Amt 2023 2, Amt 2023 4, Amt common; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: AMTI takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>AMTI</strong> = <code>Non-deductible taxes + Adjusted Gross Income (AGI)</code></li><li><strong>Non-deductible taxes</strong> = <code>AMTI − Adjusted Gross Income (AGI)</code></li><li><strong>Adjusted Gross Income (AGI)</strong> = <code>AMTI − Non-deductible taxes</code></li><li><strong>Taxable income</strong> = <code>taxable_income_calc(AMTI, Filing status, Year)</code></li><li><strong>Amt common</strong> = <code>( − Tax credits + (13 ÷ 50) × taxable_income_calc(AMTI, Filing status, Year))</code></li><li><strong>Amt 2022 2</strong> = <code>( − Tax credits + (7 ÷ 25) × taxable_income_calc(AMTI, Filing status, Year) − 4122)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>AMTI</strong> = <code>Non-deductible taxes + Adjusted Gross Income (AGI)</code> — the form to use when Non-deductible taxes and Adjusted Gross Income (AGI) are the values you have.</li><li><strong>Non-deductible taxes</strong> = <code>AMTI − Adjusted Gross Income (AGI)</code> — the form to use when AMTI and Adjusted Gross Income (AGI) are the values you have.</li><li><strong>Adjusted Gross Income (AGI)</strong> = <code>AMTI − Non-deductible taxes</code> — the form to use when AMTI and Non-deductible taxes are the values you have.</li><li><strong>Taxable income</strong> = <code>taxable_income_calc(AMTI, Filing status, Year)</code> — the form to use when AMTI, Filing status and Year are the values you have.</li><li><strong>Amt common</strong> = <code>( − Tax credits + (13 ÷ 50) × taxable_income_calc(AMTI, Filing status, Year))</code> — the form to use when Tax credits, AMTI, Filing status and Year are the values you have.</li><li><strong>Amt 2022 2</strong> = <code>( − Tax credits + (7 ÷ 25) × taxable_income_calc(AMTI, Filing status, Year) − 4122)</code> — the form to use when Tax credits, AMTI, Filing status and Year are the values you have.</li><li><strong>Amt 2022 4</strong> = <code>( − Tax credits + (7 ÷ 25) × taxable_income_calc(AMTI, Filing status, Year) − 2061)</code> — the form to use when Tax credits, AMTI, Filing status and Year are the values you have.</li><li><strong>Amt 2023 2</strong> = <code>( − Tax credits + (7 ÷ 25) × taxable_income_calc(AMTI, Filing status, Year) − 4414)</code> — the form to use when Tax credits, AMTI, Filing status and Year are the values you have.</li></ul><p>Any one of AMTI, Non-deductible taxes and Adjusted Gross Income (AGI) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with AMTI, Taxable income and Amt 2022 2 are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Adjusted Gross Income (AGI) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Adjusted Gross Income (AGI) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Non-deductible taxes left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Non-deductible taxes is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Adjusted Gross Income (AGI) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Alternative minimum tax form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Adjusted Gross Income (AGI)</strong> is measured in $. Change it and AMTI and Non-deductible taxes changes with it. Fill it from a measurement rather than a memory — Adjusted Gross Income (AGI) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Non-deductible taxes</strong> is measured in $. Add here the claimed state income and local tax deductions. Change it and AMTI and Adjusted Gross Income (AGI) changes with it. Fill it from a measurement rather than a memory — Non-deductible taxes is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>AMTI</strong> is a plain number. It is computed from Non-deductible taxes and Adjusted Gross Income (AGI), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Taxable income</strong> is a plain number. It is computed from AMTI, Filing status and Year, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Amt 2022 2</strong> is a plain number. It is computed from Tax credits, AMTI, Filing status and Year, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Amt 2022 4</strong> is a plain number. It is computed from Tax credits, AMTI, Filing status and Year, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Amt 2023 2</strong> is a plain number. It is computed from Tax credits, AMTI, Filing status and Year, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Amt 2023 4</strong> is a plain number. It is computed from Tax credits, AMTI, Filing status and Year, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Amt common</strong> is a plain number. It is computed from Tax credits, AMTI, Filing status and Year, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> AMTI follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Adjusted Gross Income (AGI) and Non-deductible taxes are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Adjusted Gross Income (AGI) and Non-deductible taxes is what you already know and AMTI and Taxable income is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/ffo">Funds from operation (FFO) Calculator</a>, <a href="/finance/future-salary">Future salary Calculator</a> and <a href="/finance/annuity-future-value">Future value of annuity</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Alternative minimum tax is a number to act on, so the useful question is what to do with AMTI ($), Taxable income ($) and Amt 2022 2 once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Adjusted Gross Income (AGI) and Non-deductible taxes alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Alternative minimum tax calculator work out?', 'a' => <<<'TXT'
            AMTI, Taxable income, Amt 2022 2 and Amt 2022 4, from Non-deductible taxes and Adjusted Gross Income (AGI). The relationship is AMTI = Non-deductible taxes + Adjusted Gross Income (AGI).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Adjusted Gross Income (AGI) ($), Non-deductible taxes ($). With adjusted Gross Income (AGI) and non-deductible taxes in place, AMTI can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of AMTI, Non-deductible taxes, Adjusted Gross Income (AGI) and Taxable income blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally AMTI is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Adjusted Gross Income (AGI) blank and the page solves for it, reporting AMTI instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to AMTI at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/ffo', 'name' => 'Funds from operation (FFO) Calculator'],
            ['path' => '/finance/future-salary', 'name' => 'Future salary Calculator'],
            ['path' => '/finance/annuity-future-value', 'name' => 'Future value of annuity'],
        ],
        'authors' => [],
    ],
];

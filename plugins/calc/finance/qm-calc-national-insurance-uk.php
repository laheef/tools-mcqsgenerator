<?php

/**
 * National insurance UK
 * /finance/national-insurance-uk
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'National insurance UK',
    'meta' => ['title' => 'National insurance UK — Free Online Calculator', 'description' => 'Enter employment income, self employment net income and tax year and National insurance UK returns total annual income and Class 1 National Insurance.', 'h1' => 'National insurance UK Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => 'Annual income',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employment_income',
                            'label' => 'Employment income',
                            'type' => 'number',
                            'prefix' => '£',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'self_employment_net_income',
                            'label' => 'Self employment net income',
                            'type' => 'number',
                            'prefix' => '£',
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
                            'name' => 'total_income',
                            'label' => 'Total annual income',
                            'type' => 'number',
                            'prefix' => '£',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_year',
                            'label' => 'Tax year',
                            'type' => 'select',
                            'options' => ['2022 / 2023' => '0', '2021 / 2022' => '1'],
                            'default' => '2022 / 2023',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'national_insurance',
                            'label' => 'National insurance',
                            'type' => 'number',
                            'prefix' => '£',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0, 0],
                    'fields' => [
                        ['type' => 'note', 'text' => 'As you are employed, you will need to pay a Class 1 National Insurance of £{{ni_c1.formattedValue}} in a year.'],
                        ['type' => 'note', 'text' => <<<'TXT'
                        As you are self-employed, you will need to pay a Class 2 National Insurance of £{{ni_c2.formattedValue}} and a Class 4 National Insurance of £{{ni_c4.formattedValue}} in a year.
                        TXT],
                        ['type' => 'note', 'text' => 'In total, you need to pay £{{national_insurance.formattedValue}} for National Insurance in a year.'],
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
                            'name' => 'ni_c1',
                            'label' => 'Class 1 National Insurance',
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
                            'name' => 'ni_c2',
                            'label' => 'Class 2 National Insurance',
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
                            'name' => 'ni_c4',
                            'label' => 'Class 4 National Insurance',
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
            'title' => 'total_income = employment_income + self_employment_net_income',
            'results' => ['total_income' => 'employment_income + self_employment_net_income', 'employment_income' => '-self_employment_net_income + total_income', 'self_employment_net_income' => '-employment_income + total_income'],
        ],
        [
            'title' => 'national_insurance = ni_uk(employment_income, self_employment_net_income, tax_year)',
            'results' => ['national_insurance' => 'ni_uk(employment_income, self_employment_net_income, tax_year)'],
        ],
        [
            'title' => 'ni_c1 = ni_em_uk(employment_income, tax_year)',
            'results' => ['ni_c1' => 'ni_em_uk(employment_income, tax_year)'],
        ],
        [
            'title' => 'ni_c2 = ni_se_uk_2(self_employment_net_income, tax_year)',
            'results' => ['ni_c2' => 'ni_se_uk_2(self_employment_net_income, tax_year)'],
        ],
        [
            'title' => 'ni_c4 = ni_se_uk_4(self_employment_net_income, tax_year)',
            'results' => ['ni_c4' => 'ni_se_uk_4(self_employment_net_income, tax_year)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("ni_uk",function(employment_income,self_employment_net_income,tax_year){if(tax_year===0){var ni_se_2_thres=6515;var ni_se_2_rate=163.8;var ni_se_4_thres=[12570,50270];var ni_se_4_rates=[0.1025,0.0325];var ni_em_thres=[11904,50270];var ni_em_rates=[0.1325,0.0325]}else if(tax_year===1){var ni_se_2_thres=6725;var ni_se_2_rate=158.6;var ni_se_4_thres=[9568,50270];var ni_se_4_rates=[0.09,0.02];var ni_em_thres=[9564,50268];var ni_em_rates=[0.12,0.02]}var ni=0;var ni_em=0;var ni_se=0;var ni_se_2=0;var ni_se_4=0;if(self_employment_net_income>=ni_se_2_thres){ni_se_2=ni_se_2_rate}if(self_employment_net_income>0){if(self_employment_net_income<ni_se_4_thres[0]){ni_se_4=0}else if(self_employment_net_income<ni_se_4_thres[1]){ni_se_4=(self_employment_net_income-ni_se_4_thres[0])*ni_se_4_rates[0]}else{ni_se_4=(self_employment_net_income-ni_se_4_thres[1])*ni_se_4_rates[1]+(ni_se_4_thres[1]-ni_se_4_thres[0])*ni_se_4_rates[0]}}ni_se=ni_se_2+ni_se_4;if(employment_income>0){if(employment_income<ni_em_thres[0]){ni_em=0}else if(employment_income<ni_em_thres[1]){ni_em=(employment_income-ni_em_thres[0])*ni_em_rates[0]}else{ni_em=(employment_income-ni_em_thres[1])*ni_em_rates[1]+(ni_em_thres[1]-ni_em_thres[0])*ni_em_rates[0]}}ni=ni_em+ni_se;return ni});omni.define("ni_em_uk",function(employment_income,tax_year){if(tax_year===0){var ni_em_thres=[11904,50270];var ni_em_rates=[0.1325,0.0325]}else if(tax_year===1){var ni_em_thres=[9564,50268];var ni_em_rates=[0.12,0.02]}var ni_em=0;if(employment_income>0){if(employment_income<ni_em_thres[0]){ni_em=0}else if(employment_income<ni_em_thres[1]){ni_em=(employment_income-ni_em_thres[0])*ni_em_rates[0]}else{ni_em=(employment_income-ni_em_thres[1])*ni_em_rates[1]+(ni_em_thres[1]-ni_em_thres[0])*ni_em_rates[0]}}return ni_em});omni.define("ni_se_uk_2",function(self_employment_net_income,tax_year){if(tax_year===0){var ni_se_2_thres=6515;var ni_se_2_rate=163.8;var ni_se_4_thres=[12570,50270];var ni_se_4_rates=[0.1025,0.0325]}else if(tax_year===1){var ni_se_2_thres=6725;var ni_se_2_rate=158.6;var ni_se_4_thres=[9568,50270];var ni_se_4_rates=[0.09,0.02]}var ni_se_2=0;if(self_employment_net_income>=ni_se_2_thres){ni_se_2=ni_se_2_rate}return ni_se_2});omni.define("ni_se_uk_4",function(self_employment_net_income,tax_year){if(tax_year===0){var ni_se_2_thres=6515;var ni_se_2_rate=163.8;var ni_se_4_thres=[12570,50270];var ni_se_4_rates=[0.1025,0.0325]}else if(tax_year===1){var ni_se_2_thres=6725;var ni_se_2_rate=158.6;var ni_se_4_thres=[9568,50270];var ni_se_4_rates=[0.09,0.02]}var ni_se_4=0;if(self_employment_net_income>0){if(self_employment_net_income<ni_se_4_thres[0]){ni_se_4=0}else if(self_employment_net_income<ni_se_4_thres[1]){ni_se_4=(self_employment_net_income-ni_se_4_thres[0])*ni_se_4_rates[0]}else{ni_se_4=(self_employment_net_income-ni_se_4_thres[1])*ni_se_4_rates[1]+(ni_se_4_thres[1]-ni_se_4_thres[0])*ni_se_4_rates[0]}}return ni_se_4});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        National insurance UK takes Employment income and Self employment net income and returns Total annual income and National insurance. The arithmetic is the whole method: total annual income is worked out from employment income by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the National insurance UK calculator works', 'html' => <<<'TXT'
            <p>National insurance UK answers one question from 2 numbers, and the answer is Total annual income, National insurance and Class 1 National Insurance.</p><p>In the form&#039;s own words, Total annual income = Employment income + Self employment net income.</p><p>The answers are Total annual income, National insurance, Class 1 National Insurance and Class 2 National Insurance; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Employment income</strong> — a plain number, no unit</li><li><strong>Self employment net income</strong> — a plain number, no unit</li></ul><p>What you get back is Total annual income, National insurance, Class 1 National Insurance in USD, Class 2 National Insurance in USD, Class 4 National Insurance in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Total annual income takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total annual income</strong> = <code>Employment income + Self employment net income</code></li><li><strong>Employment income</strong> = <code>− Self employment net income + Total annual income</code></li><li><strong>Self employment net income</strong> = <code>− Employment income + Total annual income</code></li><li><strong>National insurance</strong> = <code>ni_uk(Employment income, Self employment net income, Tax year)</code></li><li><strong>Class 1 National Insurance</strong> = <code>ni_em_uk(Employment income, Tax year)</code></li><li><strong>Class 2 National Insurance</strong> = <code>ni_se_uk_2(Self employment net income, Tax year)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Total annual income</strong> = <code>Employment income + Self employment net income</code> — the form to use when Employment income and Self employment net income are the values you have.</li><li><strong>Employment income</strong> = <code>− Self employment net income + Total annual income</code> — the form to use when Self employment net income and Total annual income are the values you have.</li><li><strong>Self employment net income</strong> = <code>− Employment income + Total annual income</code> — the form to use when Employment income and Total annual income are the values you have.</li><li><strong>National insurance</strong> = <code>ni_uk(Employment income, Self employment net income, Tax year)</code> — the form to use when Employment income, Self employment net income and Tax year are the values you have.</li><li><strong>Class 1 National Insurance</strong> = <code>ni_em_uk(Employment income, Tax year)</code> — the form to use when Employment income and Tax year are the values you have.</li><li><strong>Class 2 National Insurance</strong> = <code>ni_se_uk_2(Self employment net income, Tax year)</code> — the form to use when Self employment net income and Tax year are the values you have.</li><li><strong>Class 4 National Insurance</strong> = <code>ni_se_uk_4(Self employment net income, Tax year)</code> — the form to use when Self employment net income and Tax year are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total annual income, Employment income and Self employment net income can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total annual income, National insurance and Class 1 National Insurance are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Employment income left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Employment income is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Self employment net income left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Self employment net income is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Employment income and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Employment income</strong> takes a plain number with no unit attached. The page reads it when it works out Total annual income, Self employment net income and National insurance. Have it to hand before you start: Employment income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Self employment net income</strong> takes a plain number with no unit attached. The page reads it when it works out Total annual income, Employment income and National insurance. Have it to hand before you start: Self employment net income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Total annual income</strong> is a plain number. The value follows from Employment income and Self employment net income. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>National insurance</strong> is a plain number. The value follows from Employment income, Self employment net income and Tax year. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Class 1 National Insurance</strong> is a plain number. The value follows from Employment income and Tax year. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Class 2 National Insurance</strong> is a plain number. The value follows from Self employment net income and Tax year. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Class 4 National Insurance</strong> is a plain number. The value follows from Self employment net income and Tax year. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Employment income and Self employment net income. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Employment income into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Total annual income with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Total annual income follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Employment income and Self employment net income are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Employment income and Self employment net income and the number you are missing is Total annual income and National insurance.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/income-tax-philippines">Income tax Philippines Calculator</a>, <a href="/finance/inflation">Inflation Calculator</a> and <a href="/finance/information-ratio">Information ratio Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from National insurance UK is a number to act on, so the useful question is what to do with Total annual income, National insurance and Class 1 National Insurance (USD) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Employment income and Self employment net income alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the National insurance UK calculator work out?', 'a' => <<<'TXT'
            Total annual income, National insurance, Class 1 National Insurance and Class 2 National Insurance, from Employment income and Self employment net income. The relationship is Total annual income = Employment income + Self employment net income.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Employment income, Self employment net income. With employment income and self employment net income in place, Total annual income can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Total annual income, Employment income, Self employment net income and National insurance can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Total annual income is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Employment income left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Total annual income at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/income-tax-philippines', 'name' => 'Income tax Philippines Calculator'],
            ['path' => '/finance/inflation', 'name' => 'Inflation Calculator'],
            ['path' => '/finance/information-ratio', 'name' => 'Information ratio Calculator'],
        ],
        'authors' => [],
    ],
];

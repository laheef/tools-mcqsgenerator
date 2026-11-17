<?php

/**
 * California Stimulus Check
 * /finance/california-stimulus-check
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'California Stimulus Check',
    'meta' => ['title' => 'California Stimulus Check — Formula & Results', 'description' => 'California Stimulus Check reports test condition and text output number. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'California Stimulus Check Calculator', 'updated' => '2025-11-06'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        On August 27, 2021, Californians began receiving the second round of Golden State Stimulus payments introduced by Gavin Newsom, the governor of California. This stimulus check is expected to provide a short-term financial boost to more than 66% of Californians. This tool helps you calculate the stimulus you are eligible for under the Golden State Stimulus II.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Golden State Stimulus II criteria',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cali_income',
                            'label' => 'What is your California Adjusted Gross Income?',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cali_resident',
                            'label' => 'Have you been a California resident for more than half of 2020?',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'dataset' => 'yesNo',
                            'default' => 'Yes',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Golden State Stimulus II',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_file',
                            'label' => 'Tax file',
                            'type' => 'select',
                            'options' => ['SSN' => '1', 'ITIN' => '0'],
                            'dataset' => 'tax_filing',
                            'default' => 'SSN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'first_stim_check',
                            'label' => 'Are you qualified for the Golden State Stimulus I?',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'dataset' => 'yesNo',
                            'help' => 'For more information, please refer to our article.',
                            'default' => 'Yes',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dependent',
                            'label' => 'Have you claimed at least one child dependent?',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'dataset' => 'yesNo',
                            'default' => 'Yes',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'text_output_number == 1', 'text' => <<<'TXT'
                                 You are eligible for ${{second_stim.formattedValue}} of stimulus because your profile meets the criteria listed by the state of California. To apply for the check, all you need to do is file a 2020 tax return by October 15, 2021.
                                TXT],
                                ['when' => 'text_output_number == 2', 'text' => <<<'TXT'
                                You are not eligible for this stimulus.  To be eligible for the Golden State Stimulus II, you need to earn a California Adjusted Gross Income between $1 and $75,000. You also need to be a California resident for more than half of 2020.
                                TXT],
                                ['when' => 'text_output_number == 3', 'text' => <<<'TXT'
                                You are not eligible for this stimulus.  To be eligible for the Golden State Stimulus II, you need to earn a California Adjusted Gross Income between $1 and $75,000. You also need to be a California resident for more than half of 2020. • If you file your tax using SSN, you will not be eligible for this stimulus check if you are qualified for the Golden State Stimulus I and you have not claimed an
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'When will you receive the payment?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pay_method',
                            'label' => 'What payment method did you opt for?',
                            'type' => 'select',
                            'options' => ['Direct deposit' => '0', 'Paper check' => '1'],
                            'dataset' => 'payment_method',
                            'default' => 'Direct deposit',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'tax_date', 'label' => 'Tax filing date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'zip_code',
                            'label' => 'Zip code',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'limit_date < tax_date and pay_method == 0', 'text' => 'Your payment will be made 45 days after your tax return is processed.&nbsp;'],
                                ['when' => 'limit_date >= tax_date and hasValue(tax_date) and pay_method == 0', 'text' => 'Your payments will be issued between September 1, 2021, and October 15, 2021.&nbsp;'],
                                ['when' => 'last_three_zip_code <= 65', 'text' => 'You will receive your payment between 10/04/2021 and 10/22/2021.'],
                                ['when' => '65 < last_three_zip_code <= 221', 'text' => 'You will receive your payment between 10/18/2021 and 11/05/2021.'],
                                ['when' => '221 < last_three_zip_code <= 302', 'text' => 'You will receive your payment between 11/1/2021 and 11/19/2021.'],
                                ['when' => '302 < last_three_zip_code <= 543', 'text' => 'You will receive your payment between 11/15/2021 and 12/03/2021.'],
                                ['when' => '543 < last_three_zip_code <= 709', 'text' => 'You will receive your payment between 11/29/2021 and 12/17/2021.'],
                                ['when' => '709 < last_three_zip_code <= 998', 'text' => 'You will receive your payment between 12/13/2021 and 12/31/2021.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'text_output_number',
                            'label' => 'Text output number',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'test_condition',
                            'label' => 'Test condition',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'second_stim',
                            'label' => 'Second stim',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stim_criteria',
                            'label' => 'Stim criteria',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'limit_date', 'label' => '', 'type' => 'date', 'default' => '1626739200000'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'last_three_zip_code',
                            'label' => 'Zip code last 3',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'test_condition = zip_code % 1',
            'results' => ['test_condition' => '((zip_code % 1) + 1) % 1'],
        ],
        [
            'title' => 'text_output_number = textOutput(cali_income, cali_resident, tax_file, first_stim_check, dependent)',
            'results' => ['text_output_number' => 'textOutput(cali_income, cali_resident, tax_file, first_stim_check, dependent)'],
        ],
        [
            'title' => 'second_stim = getSecondStim(cali_income, cali_resident, tax_file, first_stim_check, dependent)',
            'results' => ['second_stim' => 'getSecondStim(cali_income, cali_resident, tax_file, first_stim_check, dependent)'],
        ],
        [
            'title' => 'stim_criteria = getStimCriteria(cali_income, cali_resident, tax_file, first_stim_check, dependent)',
            'results' => ['stim_criteria' => 'getStimCriteria(cali_income, cali_resident, tax_file, first_stim_check, dependent)'],
        ],
        [
            'title' => 'last_three_zip_code = getLast3ZipCode(zip_code)',
            'results' => ['last_three_zip_code' => 'getLast3ZipCode(zip_code)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("getLast3ZipCode",function(zip_code){var last_3=Number(zip_code.toString().slice(-3));return last_3});omni.define("textOutput",function(cali_income,cali_resident,tax_file,first_stim_check,dependent){var stim_criteria,second_stim;if(cali_income>=1&&cali_income<=75000&&cali_resident===1){stim_criteria=1}else{stim_criteria=0}if(tax_file===1){if(first_stim_check===1&&dependent===1){second_stim=500}else if(first_stim_check===0&&dependent===0){second_stim=600}else if(first_stim_check===0&&dependent===1){second_stim=1100}else{second_stim=0}}else{if(dependent){second_stim=1000}else{second_stim=0}}if(second_stim===0){stim_criteria=0}if(stim_criteria===1){return 1}else if(cali_income>=1&&cali_income<=75000&&cali_resident===1){return 2}else{return 3}});omni.define("getSecondStim",function(cali_income,cali_resident,tax_file,first_stim_check,dependent){var stim_criteria,second_stim;if(cali_income>=1&&cali_income<=75000&&cali_resident===1){stim_criteria=1}else{stim_criteria=0}if(tax_file===1){if(first_stim_check===1&&dependent===1){second_stim=500}else if(first_stim_check===0&&dependent===0){second_stim=600}else if(first_stim_check===0&&dependent===1){second_stim=1100}else{second_stim=0}}else{if(dependent){second_stim=1000}else{second_stim=0}}return second_stim});omni.define("getStimCriteria",function(cali_income,cali_resident,tax_file,first_stim_check,dependent){var stim_criteria,second_stim;if(cali_income>=1&&cali_income<=75000&&cali_resident===1){stim_criteria=1}else{stim_criteria=0}if(tax_file===1){if(first_stim_check===1&&dependent===1){second_stim=500}else if(first_stim_check===0&&dependent===0){second_stim=600}else if(first_stim_check===0&&dependent===1){second_stim=1100}else{second_stim=0}}else{if(dependent){second_stim=1000}else{second_stim=0}}return stim_criteria});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        California Stimulus Check works out Text output number and Test condition from Zip code. It is a single relationship that reads text output number out of zip code, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the California Stimulus Check calculator works', 'html' => <<<'TXT'
            <p>The California Stimulus Check calculator applies one relationship to 1 number and reports Text output number, Test condition and Second stim.</p><p>Written with the labels from the form, Test condition = ((Zip code % 1) + 1) % 1.</p><p>The answers are Text output number, Test condition, Second stim and Stim criteria; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Zip code</strong> — a plain number, no unit</li></ul><p>The result boxes are Text output number, Test condition, Second stim, Stim criteria, Zip code last 3; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — What is your California Adjusted Gross Income? = 3, Have you been a California resident for more than half of 2020? = 1, Tax file = 1, Are you qualified for the Golden State Stimulus I? = 1, Have you claimed at least one child dependent? = 1, What payment method did you opt for? = 0, Zip code = 4 and Tax filing date = Sun 1 March 2026 — through the same formula and the panel reports <strong>Limit date</strong> = Tue 20 July 2021 and <strong>Test condition</strong> = 0.</p><ul><li><strong>Limit date</strong> = Tue 20 July 2021</li><li><strong>Test condition</strong> = 0</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Test condition</strong> = <code>((Zip code % 1) + 1) % 1</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Limit date</strong> = Tue 20 July 2021 and <strong>Test condition</strong> = 0. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Text output number is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Test condition</strong> = <code>((Zip code % 1) + 1) % 1</code></li><li><strong>Text output number</strong> = <code>textOutput(What is your California Adjusted Gross Income?, Have you been a California resident for more than half of 2020?, Tax file, Are you qualified for the Golden State Stimulus I?, Have you claimed at least one child dependent?)</code></li><li><strong>Second stim</strong> = <code>getSecondStim(What is your California Adjusted Gross Income?, Have you been a California resident for more than half of 2020?, Tax file, Are you qualified for the Golden State Stimulus I?, Have you claimed at least one child dependent?)</code></li><li><strong>Stim criteria</strong> = <code>getStimCriteria(What is your California Adjusted Gross Income?, Have you been a California resident for more than half of 2020?, Tax file, Are you qualified for the Golden State Stimulus I?, Have you claimed at least one child dependent?)</code></li><li><strong>Zip code last 3</strong> = <code>getLast3ZipCode(Zip code)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Test condition</strong> = <code>((Zip code % 1) + 1) % 1</code> — the form to use when Zip code are the values you have.</li><li><strong>Text output number</strong> = <code>textOutput(What is your California Adjusted Gross Income?, Have you been a California resident for more than half of 2020?, Tax file, Are you qualified for the Golden State Stimulus I?, Have you claimed at least one child dependent?)</code> — the form to use when What is your California Adjusted Gross Income?, Have you been a California resident for more than half of 2020?, Tax file and Are you qualified for the Golden State Stimulus I? are the values you have.</li><li><strong>Second stim</strong> = <code>getSecondStim(What is your California Adjusted Gross Income?, Have you been a California resident for more than half of 2020?, Tax file, Are you qualified for the Golden State Stimulus I?, Have you claimed at least one child dependent?)</code> — the form to use when What is your California Adjusted Gross Income?, Have you been a California resident for more than half of 2020?, Tax file and Are you qualified for the Golden State Stimulus I? are the values you have.</li><li><strong>Stim criteria</strong> = <code>getStimCriteria(What is your California Adjusted Gross Income?, Have you been a California resident for more than half of 2020?, Tax file, Are you qualified for the Golden State Stimulus I?, Have you claimed at least one child dependent?)</code> — the form to use when What is your California Adjusted Gross Income?, Have you been a California resident for more than half of 2020?, Tax file and Are you qualified for the Golden State Stimulus I? are the values you have.</li><li><strong>Zip code last 3</strong> = <code>getLast3ZipCode(Zip code)</code> — the form to use when Zip code are the values you have.</li></ul><p>Any one of Test condition, Text output number and Second stim can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double What is your California Adjusted Gross Income? from 3 to 6, leaving every other box alone. The panel moves from <strong>Limit date</strong> Tue 20 July 2021 and <strong>Test condition</strong> 0 to <strong>Limit date</strong> Tue 20 July 2021 and <strong>Test condition</strong> 0.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Text output number, Test condition and Second stim are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Zip code left as a guess.</strong> Anything typed into Zip code is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Zip code and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Zip code</strong> takes a plain number with no unit attached. The page reads it when it works out Test condition and Zip code last 3. Have it to hand before you start: Zip code is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Text output number</strong> is a plain number. The value follows from What is your California Adjusted Gross Income?, Have you been a California resident for more than half of 2020?, Tax file and Are you qualified for the Golden State Stimulus I?. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Test condition</strong> is a plain number and the page's own defaults put it at 0. The value follows from Zip code. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Second stim</strong> is a plain number. The value follows from What is your California Adjusted Gross Income?, Have you been a California resident for more than half of 2020?, Tax file and Are you qualified for the Golden State Stimulus I?. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Stim criteria</strong> is a plain number. The value follows from What is your California Adjusted Gross Income?, Have you been a California resident for more than half of 2020?, Tax file and Are you qualified for the Golden State Stimulus I?. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Zip code last 3</strong> is a plain number. The value follows from Zip code. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Limit date</th><th>Test condition</th></tr></thead><tbody><tr><td><strong>What is your California Adjusted Gross Income?</strong> +10%</td><td>+0%</td><td>—</td></tr><tr><td><strong>Have you been a California resident for more than half of 2020?</strong> +10%</td><td>+0%</td><td>—</td></tr><tr><td><strong>Tax file</strong> +10%</td><td>+0%</td><td>—</td></tr><tr><td><strong>Are you qualified for the Golden State Stimulus I?</strong> +10%</td><td>+0%</td><td>—</td></tr><tr><td><strong>Have you claimed at least one child dependent?</strong> +10%</td><td>+0%</td><td>—</td></tr><tr><td><strong>Zip code</strong> +10%</td><td>+0%</td><td>—</td></tr><tr><td><strong>Tax filing date</strong> +10%</td><td>+0%</td><td>—</td></tr></tbody></table><p>The steepest column belongs to What is your California Adjusted Gross Income?: ten per cent there moves an answer by about 0 per cent, which is why that is the number to measure twice. By contrast, What is your California Adjusted Gross Income?, Have you been a California resident for more than half of 2020? and Tax file barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With What is your California Adjusted Gross Income? = 1.5, Have you been a California resident for more than half of 2020? = 0.5, Tax file = 0.5, Are you qualified for the Golden State Stimulus I? = 0.5, Have you claimed at least one child dependent? = 0.5, What payment method did you opt for? = 0, Zip code = 2 and Tax filing date = Fri 30 January 1998, the answer is <strong>Limit date</strong> = Tue 20 July 2021 and <strong>Test condition</strong> = 0.</li><li>With What is your California Adjusted Gross Income? = 9, Have you been a California resident for more than half of 2020? = 1, Tax file = 1, Are you qualified for the Golden State Stimulus I? = 1, Have you claimed at least one child dependent? = 1, What payment method did you opt for? = 0, Zip code = 4 and Tax filing date = Sun 1 March 2026, the answer is <strong>Limit date</strong> = Tue 20 July 2021 and <strong>Test condition</strong> = 0.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Text output number is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Zip code measured, Text output number and Test condition wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/new-york-overtime">New York overtime</a>, <a href="/finance/new-york-tax">New York tax Calculator</a> and <a href="/finance/nopat">NOPAT</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the California Stimulus Check calculator work out?', 'a' => 'Text output number, Test condition, Second stim and Stim criteria, from Zip code. The relationship is Test condition = ((Zip code % 1) + 1) % 1.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Zip code. Enter zip code; Text output number is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Test condition, Text output number, Second stim and Stim criteria blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Limit date = Tue 20 July 2021 and Test condition = 0. Those are the defaults written into the form — move Zip code and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Text output number is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Zip code left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Text output number at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/new-york-overtime', 'name' => 'New York overtime'],
            ['path' => '/finance/new-york-tax', 'name' => 'New York tax Calculator'],
            ['path' => '/finance/nopat', 'name' => 'NOPAT'],
        ],
        'authors' => [],
    ],
];

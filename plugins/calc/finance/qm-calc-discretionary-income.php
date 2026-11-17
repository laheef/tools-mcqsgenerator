<?php

/**
 * Discretionary income
 * /finance/discretionary-income
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Discretionary income',
    'meta' => ['title' => 'Discretionary income: Formula, Steps & Results', 'description' => 'Discretionary income turns marital status and state into pov guide and total income. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Discretionary income Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'marital_status',
                            'label' => 'Marital status',
                            'type' => 'select',
                            'options' => ['Single' => '1', 'Married filed jointly' => '2', 'Married filed separately' => '3'],
                            'dataset' => 'marital_status',
                            'default' => 'Single',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'state',
                            'label' => 'State',
                            'type' => 'select',
                            'options' => [
                                'Alabama' => '1',
                                'Alaska' => '2',
                                'Arizona' => '3',
                                'Arkansas' => '4',
                                'California' => '5',
                                'Colorado' => '6',
                                'Connecticut' => '7',
                                'Delaware' => '8',
                                'District of Columbia' => '9',
                                'Florida' => '10',
                                'Georgia' => '11',
                                'Hawaii' => '12',
                                'Idaho' => '13',
                                'Illinois' => '14',
                                'Indiana' => '15',
                                'Iowa' => '16',
                                'Kansas' => '17',
                                'Kentucky' => '18',
                                'Louisiana' => '19',
                                'Maine' => '20',
                                'Maryland' => '21',
                                'Massachusetts' => '22',
                                'Michigan' => '23',
                                'Minnesota' => '24',
                                'Mississippi' => '25',
                                'Missouri' => '26',
                                'Montana' => '27',
                                'Nebraska' => '28',
                                'Nevada' => '29',
                                'New Hampshire' => '30',
                                'New Jersey' => '31',
                                'New Mexico' => '32',
                                'New York' => '33',
                                'North Carolina' => '34',
                                'North Dakota' => '35',
                                'Ohio' => '36',
                                'Oklahoma' => '37',
                                'Oregon' => '38',
                                'Pennsylvania' => '39',
                                'Rhode Island' => '40',
                                'South Carolina' => '41',
                                'South Dakota' => '42',
                                'Tennessee' => '43',
                                'Texas' => '44',
                                'Utah' => '45',
                                'Vermont' => '46',
                                'Virginia' => '47',
                                'Washington' => '48',
                                'West Virginia' => '49',
                                'Wisconsin' => '50',
                                'Wyoming' => '51',
                            ],
                            'dataset' => 'state',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'adj_income',
                            'label' => 'Annual Adjusted Gross Income',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'You can find your Annual Adjusted Gross Income on the 2nd page of your most recently filed tax return (line 7 on your 1040).',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spouse_adj_income',
                            'label' => 'Spouse\'s Adjusted Gross Income',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_dependents',
                            'label' => 'Number of dependents',
                            'type' => 'number',
                            'suffix' => 'person(s)',
                            'help' => 'Include any children or other family member who receive more than half their support through you.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'discIncComb < 0', 'text' => 'Your Annual Adjusted Gross Income must be higher for the calculator to work with the given number of dependents.&nbsp;'],
                                ['when' => 'discIncComb >= 0 and marital_status != 3', 'text' => <<<'TXT'
                                Your annual discretionary income, based on the HHS Poverty Guidelines for 2026, is ${{discIncComb.formattedValue}}. Your annual discretionary income, with the Income-Contingent Repayment (ICR) Formula, is ${{discIncCombICR.formattedValue}}.&nbsp;
                                TXT],
                                ['when' => 'discIncComb >= 0 and marital_status == 3 and (discInc1 < 0 or discInc2 < 0)', 'text' => <<<'TXT'
                                Your combined annual discretionary income is ${{discIncComb.formattedValue}}. Your combined annual discretionary income, with the Income-Contingent Repayment (ICR) Formula, is ${{discIncCombICR.formattedValue}}.&nbsp;
                                TXT],
                                ['when' => 'discIncComb >= 0 and marital_status == 3 and not(discInc1 < 0 or discInc2 < 0)', 'text' => <<<'TXT'
                                Your combined annual discretionary income is ${{discIncComb.formattedValue}}. Your personal annual discretionary income is ${{discInc1.formattedValue}}. Your spouse's annual discretionary income is ${{discInc2.formattedValue}}. Your combined annual discretionary income, with the Income-Contingent Repayment (ICR) Formula, is ${{discIncCombICR.formattedValue}}. Your personal annual discretionary inc
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
                            'name' => 'pov_guide',
                            'label' => 'Pov guide',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_income',
                            'label' => 'Total income',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'discIncComb',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discInc1',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discInc2',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discIncCombICR',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discInc1ICR',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discInc2ICR',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'pov_guide = get_pov_guide(state, marital_status, num_dependents)',
            'results' => ['pov_guide' => 'get_pov_guide(state, marital_status, num_dependents)'],
        ],
        [
            'title' => 'total_income = get_total_income(adj_income, spouse_adj_income, marital_status)',
            'results' => ['total_income' => 'get_total_income(adj_income, spouse_adj_income, marital_status)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_pov_guide",function(state,marital_status,dep){var famMem;if(marital_status===1){famMem=dep+1}else{famMem=dep+2}if(famMem===1&&state!==2&&state!==12){return 15960}else if(famMem===2&&state!==2&&state!==12){return 21640}else if(famMem===3&&state!==2&&state!==12){return 27320}else if(famMem===4&&state!==2&&state!==12){return 33000}else if(famMem===5&&state!==2&&state!==12){return 38680}else if(famMem===6&&state!==2&&state!==12){return 44360}else if(famMem===7&&state!==2&&state!==12){return 50040}else if(famMem===8&&state!==2&&state!==12){return 55720}else if(famMem>8&&state!==2&&state!==12){return 55720+(famMem-8)*5680}else if(famMem===1&&state===2){return 19950}else if(famMem===2&&state===2){return 27050}else if(famMem===3&&state===2){return 34150}else if(famMem===4&&state===2){return 41250}else if(famMem===5&&state===2){return 48350}else if(famMem===6&&state===2){return 55450}else if(famMem===7&&state===2){return 62550}else if(famMem===8&&state===2){return 69650}else if(famMem>8&&state===2){return 69650+(famMem-8)*7100}else if(famMem===1&&state===12){return 18360}else if(famMem===2&&state===12){return 24890}else if(famMem===3&&state===12){return 31420}else if(famMem===4&&state===12){return 37950}else if(famMem===5&&state===12){return 44480}else if(famMem===6&&state===12){return 51010}else if(famMem===7&&state===12){return 57540}else if(famMem===8&&state===12){return 64070}else if(famMem>8&&state===12){return 64070+(famMem-8)*6530}});omni.define("get_total_income",function(adj_income,spouse_adj_income,marital_status){if(marital_status===2){return adj_income+spouse_adj_income}else{return adj_income}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Discretionary income turns Marital status, State and Number of dependents into Pov guide and Total income. There is no hidden constant here: change pov guide and marital status moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Discretionary income calculator works', 'html' => <<<'TXT'
            <p>Discretionary income answers one question from 3 numbers, and the answer is Pov guide and Total income.</p><p>In the form&#039;s own words, Pov guide = get_pov_guide(State, Marital status, Number of dependents).</p><p>The result panel carries Pov guide and Total income, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Marital status</strong> — a plain number, no unit</li><li><strong>State</strong> — a plain number, no unit</li><li><strong>Number of dependents</strong> — in person(s). Include any children or other family member who receive more than half their support through you.</li></ul><p>The result boxes are Pov guide, Total income; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: Pov guide takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Pov guide</strong> = <code>get_pov_guide(State, Marital status, Number of dependents)</code></li><li><strong>Total income</strong> = <code>get_total_income(Annual Adjusted Gross Income, Spouse&#039;s Adjusted Gross Income, Marital status)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Pov guide</strong> = <code>get_pov_guide(State, Marital status, Number of dependents)</code> — the form to use when State, Marital status and Number of dependents are the values you have.</li><li><strong>Total income</strong> = <code>get_total_income(Annual Adjusted Gross Income, Spouse&#039;s Adjusted Gross Income, Marital status)</code> — the form to use when Annual Adjusted Gross Income, Spouse&#039;s Adjusted Gross Income and Marital status are the values you have.</li></ul><p>Any one of Pov guide and Total income can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Pov guide and Total income are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Marital status left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Marital status is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>State left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If State is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of dependents left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of dependents is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Marital status is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Marital status</strong> takes a plain number with no unit attached. Change it and Pov guide and Total income changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Marital status is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>State</strong> takes a plain number with no unit attached. Change it and Pov guide changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: State is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of dependents</strong> is measured in person(s). Include any children or other family member who receive more than half their support through you. Change it and Pov guide changes with it. Have it to hand before you start: Number of dependents is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Pov guide</strong> is a plain number. It is worked out from State, Marital status and Number of dependents. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total income</strong> is a plain number. It is worked out from Annual Adjusted Gross Income, Spouse's Adjusted Gross Income and Marital status. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Marital status, State and Number of dependents. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Marital status into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Pov guide with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Pov guide follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Marital status, State and Number of dependents are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Marital status, State and Number of dependents measured, Pov guide and Total income wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/401k">401(k) Calculator</a>, <a href="/finance/403b">403b Calculator</a> and <a href="/finance/50-30-20-rule">50/30/20 rule</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Discretionary income is a number to act on, so the useful question is what to do with Pov guide and Total income once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Marital status, State and Number of dependents alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Discretionary income calculator work out?', 'a' => <<<'TXT'
            Pov guide and Total income, from State, Marital status and Number of dependents. The relationship is Pov guide = get_pov_guide(State, Marital status, Number of dependents).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Marital status, State, Number of dependents (person(s)). Fill marital status, state and number of dependents and leave Pov guide empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Pov guide and Total income blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Pov guide is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Marital status left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Pov guide keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/401k', 'name' => '401(k) Calculator'],
            ['path' => '/finance/403b', 'name' => '403b Calculator'],
            ['path' => '/finance/50-30-20-rule', 'name' => '50/30/20 rule'],
        ],
        'authors' => [],
    ],
];

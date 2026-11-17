<?php

/**
 * Stimulus check - HEALS Act
 * /finance/stimulus-check-heals
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Stimulus check - HEALS Act',
    'meta' => ['title' => 'Stimulus check - HEALS Act — Formula & Results', 'description' => 'Stimulus check - HEALS Act takes have you filed 2019 taxes?, filing status and how many dependents? and returns you will receive. Any box can be the unknown.', 'h1' => 'Stimulus check - HEALS Act Calculator', 'updated' => '2024-08-19'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        This calculator is based on the GOP Coronavirus Bill, which is a second round of stimulus checks proposed by congressional Republicans on Monday, July 27th 2020. To qualify for a payout, you have to be a U.S. resident with a social security number. You don’t need to have paid any taxes recently, but you must have at least filed your paperwork.
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'taxForm',
                            'label' => 'Have you filed 2019 taxes?',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'dataset' => 'yesno',
                            'help' => <<<'TXT'
                            You need to have filed your tax form either for 2018 or 2019. If you haven't filed your taxes over the last two years, you're not eligible for the stimulus check.
                            TXT,
                            'default' => 'Yes',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'married',
                            'label' => 'Filing status',
                            'type' => 'select',
                            'options' => ['Single' => '1', 'Married' => '2', 'Head of household' => '3'],
                            'dataset' => 'singlemarried',
                            'help' => 'Head of household typically means a single parent.',
                            'default' => 'Single',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kids',
                            'label' => 'How many dependents?',
                            'type' => 'number',
                            'help' => 'Enter the number of dependents you claimed on your last tax form. There is no age limit for dependents.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income2018',
                            'label' => 'Income in 2018 (AGI)',
                            'type' => 'number',
                            'suffix' => '$',
                            'help' => 'Adjusted gross income on your tax form.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income2019',
                            'label' => 'Income in 2019 (AGI)',
                            'type' => 'number',
                            'suffix' => '$',
                            'help' => 'Adjusted gross income on your tax form.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result2018',
                            'label' => 'You will receive',
                            'type' => 'number',
                            'suffix' => '$',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result2019',
                            'label' => 'You will receive',
                            'type' => 'number',
                            'suffix' => '$',
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
                                ['when' => 'taxForm == 1 and result2019 == 0', 'text' => 'Your income in 2019 was too high to qualify you for the stimulus payment.&nbsp;'],
                                ['when' => 'taxForm == 0 and result2018 == 0', 'text' => 'Your income in 2018 was too high to qualify you for the stimulus payment.&nbsp;'],
                                ['when' => 'taxForm == 1 and result2019 > 0', 'text' => 'You are likely to receive a stimulus payment of ${{result2019.formattedValue}}.&nbsp;'],
                                ['when' => 'taxForm == 0 and result2018 > 0', 'text' => 'You are likely to receive a stimulus payment of ${{result2018.formattedValue}}.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                         Make sure to check how much you'd get from the HEROES Act  proposed by the Democrats!  If you're currently unemployed, check the differences in unemployment benefit  proposed by the Republicans (the HEALS Act) and the Democrats (the HEROES Act)!
                        TXT],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'result2019 = get_check(married, kids, income2019)',
            'results' => ['result2019' => 'get_check(married, kids, income2019)'],
        ],
        [
            'title' => 'result2018 = get_check(married, kids, income2018)',
            'results' => ['result2018' => 'get_check(married, kids, income2018)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_check",function(married,kids,income2019){var result=0;if(married==1){if(income2019<75000){result=result+1200;result=result+500*kids}else{result=result+500*kids;result=Math.max(0,result+1200-5*(income2019-75000)/100)}}else if(married==2){if(income2019<150000){result=result+2400;result=result+500*kids}else{result=result+500*kids;result=Math.max(0,result+2400-5*(income2019-150000)/100)}}else if(married==3){if(income2019<112500){result=result+1200;result=result+500*kids}else{result=result+500*kids;result=Math.max(0,result+1200-5*(income2019-112500)/100)}}return result});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Stimulus check - HEALS Act takes Filing status, How many dependents? and Income in 2019 (AGI) and returns You will receive and You will receive. Nothing is looked up on this page: you will receive is computed from filing status and the other boxes, so an unusual pair of values gives an honest answer rather than an error. You will receive is opened in $; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Stimulus check - HEALS Act calculator works', 'html' => <<<'TXT'
            <p>The Stimulus check - HEALS Act calculator applies one relationship to 3 numbers and reports You will receive and You will receive.</p><p>In the form&#039;s own words, You will receive = get_check(Filing status, How many dependents?, Income in 2019 (AGI)).</p><p>The answers are You will receive and You will receive; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Filing status</strong> — a plain number, no unit. Head of household typically means a single parent.</li><li><strong>How many dependents?</strong> — a plain number, no unit. Enter the number of dependents you claimed on your last tax form. There is no age limit for dependents.</li><li><strong>Income in 2019 (AGI)</strong> — in $. Adjusted gross income on your tax form.</li></ul><p>What you get back is You will receive in $, You will receive in $, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: You will receive takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>You will receive</strong> = <code>get_check(Filing status, How many dependents?, Income in 2019 (AGI))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>You will receive</strong> = <code>get_check(Filing status, How many dependents?, Income in 2019 (AGI))</code> — the form to use when Filing status, How many dependents? and Income in 2019 (AGI) are the values you have.</li><li><strong>You will receive</strong> = <code>get_check(Filing status, How many dependents?, Income in 2018 (AGI))</code> — the form to use when Filing status, How many dependents? and Income in 2018 (AGI) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of You will receive and You will receive can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with You will receive and You will receive are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Filing status left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Filing status is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>How many dependents? left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If How many dependents? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Income in 2019 (AGI) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Income in 2019 (AGI) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Filing status and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Filing status</strong> takes a plain number with no unit attached. Head of household typically means a single parent. Change it and You will receive and You will receive changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Filing status is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>How many dependents?</strong> takes a plain number with no unit attached. Enter the number of dependents you claimed on your last tax form. There is no age limit for dependents. Change it and You will receive and You will receive changes with it. Have it to hand before you start: How many dependents? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Income in 2019 (AGI)</strong> is measured in $. Adjusted gross income on your tax form. Change it and You will receive changes with it. Have it to hand before you start: Income in 2019 (AGI) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>You will receive</strong> is a plain number. The value follows from Filing status, How many dependents? and Income in 2018 (AGI). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>You will receive</strong> is a plain number. The value follows from Filing status, How many dependents? and Income in 2019 (AGI). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Filing status, How many dependents? and Income in 2019 (AGI). Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Filing status into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare You will receive in $ with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> You will receive follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Filing status, How many dependents? and Income in 2019 (AGI) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Filing status, How many dependents? and Income in 2019 (AGI) is what you already know and You will receive and You will receive is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/post-judgment-interest">Post judgment interest Calculator</a>, <a href="/finance/post-office-monthly-income-scheme">Post Office Monthly Income Scheme</a> and <a href="/finance/powerball">Powerball</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Stimulus check - HEALS Act calculator work out?', 'a' => <<<'TXT'
            You will receive and You will receive, from Filing status, How many dependents? and Income in 2019 (AGI). The relationship is You will receive = get_check(Filing status, How many dependents?, Income in 2019 (AGI)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Filing status, How many dependents?, Income in 2019 (AGI) ($). Enter filing status, how many dependents? and income in 2019 (AGI); You will receive is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. You will receive and You will receive can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of You will receive is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Filing status left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of You will receive keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/post-judgment-interest', 'name' => 'Post judgment interest Calculator'],
            ['path' => '/finance/post-office-monthly-income-scheme', 'name' => 'Post Office Monthly Income Scheme'],
            ['path' => '/finance/powerball', 'name' => 'Powerball'],
        ],
        'authors' => [],
    ],
];

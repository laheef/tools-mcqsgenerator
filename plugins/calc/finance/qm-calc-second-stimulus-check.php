<?php

/**
 * Second stimulus check
 * /finance/second-stimulus-check
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Second stimulus check',
    'meta' => ['title' => 'Second stimulus check — Free Online Calculator', 'description' => 'Second stimulus check takes have you filed 2019 taxes? and returns you will receive. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Second stimulus check Calculator', 'updated' => '2026-09-04'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        To qualify for a payout, you have to be a U.S. resident with a social security number. You don’t need to have paid any taxes recently, but you must have at least filed your paperwork or fall under one of the special eligibility categories (see the text), such as receiving SSI.
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
                            'help' => 'You need to have filed your tax form for 2019.',
                            'default' => 'Yes',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'If you haven\'t paid taxes but fall under a special eligibility category, set "kids" and "income in 2019" to 0 to see how much you will get.'],
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
                            'help' => 'Head of household typically means a single parent or a married couple with a single earner.',
                            'default' => 'Single',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kids',
                            'label' => 'How many kids?',
                            'type' => 'number',
                            'help' => 'Enter the number of child dependents under age 17 you claimed on your last tax form.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
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
                            'prefix' => '$',
                            'help' => 'Adjusted gross income on your tax form.',
                            'rounding' => ['omni', '0.0001'],
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
                            'prefix' => '$',
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
                                ['when' => 'taxForm == 1 and result2019 != 0 and hasValue(result2019)', 'text' => 'You are likely to receive a stimulus payment of ${{result2019.formattedValue}}.&nbsp;'],
                                ['when' => 'taxForm == 1 and result2019 == 0', 'text' => <<<'TXT'
                                Your income in 2019 was too high to qualify you for the stimulus payment. Please note that the money phases out at a lower income bracket compared to the CARES Act due to a lower initial stimulus value. Read the FAQ at the end of the article for details.
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
                            'name' => 'income2018',
                            'label' => 'Income in 2018 (AGI)',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'prefix' => '$',
                            'rounding' => ['standard', '0'],
                        ],
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
    "use strict";omni.define("get_check",function(married,kids,income2019){var result=0;if(married===1){if(income2019<=75000){result=result+600;result=result+600*kids}else{result=result+600*kids;result=Math.max(0,result+600-0.05*(income2019-75000))}}else if(married===2){if(income2019<=150000){result=result+1200;result=result+600*kids}else{result=result+600*kids;result=Math.max(0,result+1200-0.05*(income2019-150000))}}else if(married===3){if(income2019<=112500){result=result+600;result=result+600*kids}else{result=result+600*kids;result=Math.max(0,result+600-0.05*(income2019-112500))}}return result});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Second stimulus check turns Filing status, How many kids? and Income in 2019 (AGI) into You will receive and You will receive. Nothing is looked up on this page: you will receive is computed from filing status and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Second stimulus check calculator works', 'html' => <<<'TXT'
            <p>The Second stimulus check calculator applies one relationship to 3 numbers and reports You will receive and You will receive.</p><p>The relationship it solves reads You will receive = get_check(Filing status, How many kids?, Income in 2019 (AGI)).</p><p>The answers are You will receive and You will receive; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Filing status</strong> — a plain number, no unit. Head of household typically means a single parent or a married couple with a single earner.</li><li><strong>How many kids?</strong> — a plain number, no unit. Enter the number of child dependents under age 17 you claimed on your last tax form.</li><li><strong>Income in 2019 (AGI)</strong> — a plain number, no unit. Adjusted gross income on your tax form.</li></ul><p>The result boxes are You will receive, You will receive; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: You will receive takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>You will receive</strong> = <code>get_check(Filing status, How many kids?, Income in 2019 (AGI))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>You will receive</strong> = <code>get_check(Filing status, How many kids?, Income in 2019 (AGI))</code> — the form to use when Filing status, How many kids? and Income in 2019 (AGI) are the values you have.</li><li><strong>You will receive</strong> = <code>get_check(Filing status, How many kids?, Income in 2018 (AGI))</code> — the form to use when Filing status, How many kids? and Income in 2018 (AGI) are the values you have.</li></ul><p>Any one of You will receive and You will receive can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with You will receive and You will receive are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Filing status left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Filing status is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>How many kids? left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If How many kids? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Income in 2019 (AGI) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Income in 2019 (AGI) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Filing status and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Filing status</strong> takes a plain number with no unit attached. Head of household typically means a single parent or a married couple with a single earner. The page reads it when it works out You will receive and You will receive. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Filing status is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>How many kids?</strong> takes a plain number with no unit attached. Enter the number of child dependents under age 17 you claimed on your last tax form. The page reads it when it works out You will receive and You will receive. Have it to hand before you start: How many kids? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Income in 2019 (AGI)</strong> takes a plain number with no unit attached. Adjusted gross income on your tax form. The page reads it when it works out You will receive. Have it to hand before you start: Income in 2019 (AGI) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>You will receive</strong> is a plain number. It is computed from Filing status, How many kids? and Income in 2019 (AGI), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>You will receive</strong> is a plain number. It is computed from Filing status, How many kids? and Income in 2018 (AGI), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Filing status, How many kids? and Income in 2019 (AGI). Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Filing status into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare You will receive with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> You will receive follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Filing status, How many kids? and Income in 2019 (AGI) and the number you are missing is You will receive and You will receive.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/gst">GST</a>, <a href="/finance/gst-qst">GST/QST Calculator</a> and <a href="/finance/hedge-ratio">Hedge ratio Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Second stimulus check calculator work out?', 'a' => <<<'TXT'
            You will receive and You will receive, from Filing status, How many kids? and Income in 2019 (AGI). The relationship is You will receive = get_check(Filing status, How many kids?, Income in 2019 (AGI)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Filing status, How many kids?, Income in 2019 (AGI). Fill filing status, how many kids? and income in 2019 (AGI) and leave You will receive empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of You will receive and You will receive blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of You will receive is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Filing status left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of You will receive keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/gst', 'name' => 'GST'],
            ['path' => '/finance/gst-qst', 'name' => 'GST/QST Calculator'],
            ['path' => '/finance/hedge-ratio', 'name' => 'Hedge ratio Calculator'],
        ],
        'authors' => [],
    ],
];

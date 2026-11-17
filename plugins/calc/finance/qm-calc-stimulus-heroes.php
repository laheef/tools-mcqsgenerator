<?php

/**
 * Second stimulus check - HEROES Act
 * /finance/stimulus-heroes
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Second stimulus check - HEROES Act',
    'meta' => ['title' => 'Second stimulus check - HEROES Act Calculator', 'description' => 'Enter filing status, how many dependents? and Your income (AGI) and Second stimulus check - HEROES Act returns you could receive. A worked example follows.', 'h1' => 'Second stimulus check - HEROES Act Calculator', 'updated' => '2024-10-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        This calculator is based on the HEROES Act, which is a proposed second round of stimulus checks. It was passed by The House of Representatives on May 16, 2020. On May 29, the Senate Majority Leader Mitch McConnell informed that the Senate needs "about a month" to reach the final decision.
                        TXT],
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
                            'help' => 'Enter the number of children you claim as dependents. The maximum number of kids you can claim a stimulus payment for is 3.',
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
                            'label' => 'Your income (AGI)',
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
                            'label' => 'You could receive',
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
                                ['when' => 'result2019 == 0', 'text' => 'Your income is too high for you to qualify for the hypothetical stimulus payment.'],
                                ['when' => 'result2019 > 0', 'text' => ' If the bill passes, you are likely to receive a stimulus payment of ${{result2019.formattedValue}}.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                         Are you unemployed, a frontline worker, or a student? If this bill passes, you will be eligible for additional payments!  Make sure to check the differences in unemployment benefits  proposed by the Republicans (the HEALS Act) and the Democrats (the HEROES Act)!
                        TXT],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'result2019 = get_check(married, kids, income2019)  ',
            'results' => ['result2019' => 'get_check(married, kids, income2019)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_check",function(married,kids,income2019){var result=0;kids=Math.min(kids,3);if(married==1){if(income2019<75000){result=result+1200;result=result+1200*kids}else{result=result+1200*kids;result=Math.max(0,result+1200-5*(income2019-75000)/100)}}else if(married==2){if(income2019<150000){result=result+2400;result=result+1200*kids}else{result=result+1200*kids;result=Math.max(0,result+2400-5*(income2019-150000)/100)}}else if(married==3){if(income2019<112500){result=result+1200;result=result+1200*kids}else{result=result+1200*kids;result=Math.max(0,result+1200-5*(income2019-112500)/100)}}return result});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Filing status, How many dependents? and Your income (AGI) into Second stimulus check - HEROES Act and the answer comes back as You could receive. The arithmetic is the whole method: you could receive is worked out from filing status by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Second stimulus check - HEROES Act calculator works', 'html' => <<<'TXT'
            <p>The Second stimulus check - HEROES Act calculator applies one relationship to 3 numbers and reports You could receive.</p><p>The relationship it solves reads You could receive = get_check(Filing status, How many dependents?, Your income (AGI)).</p><p>The result panel carries You could receive, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Filing status</strong> — a plain number, no unit. Head of household typically means a single parent.</li><li><strong>How many dependents?</strong> — a plain number, no unit. Enter the number of children you claim as dependents. The maximum number of kids you can claim a stimulus payment for is 3.</li><li><strong>Your income (AGI)</strong> — a plain number, no unit. Adjusted gross income on your tax form.</li></ul><p>The answer comes back as You could receive. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as You could receive is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>You could receive</strong> = <code>get_check(Filing status, How many dependents?, Your income (AGI))</code></li></ul>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> You could receive is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Filing status left as a guess.</strong> Anything typed into Filing status is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>How many dependents? left as a guess.</strong> Anything typed into How many dependents? is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Your income (AGI) left as a guess.</strong> Anything typed into Your income (AGI) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Filing status is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Filing status</strong> takes a plain number with no unit attached. Head of household typically means a single parent. The page reads it when it works out You could receive. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Filing status is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>How many dependents?</strong> takes a plain number with no unit attached. Enter the number of children you claim as dependents. The maximum number of kids you can claim a stimulus payment for is 3. The page reads it when it works out You could receive. Have it to hand before you start: How many dependents? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Your income (AGI)</strong> takes a plain number with no unit attached. Adjusted gross income on your tax form. The page reads it when it works out You could receive. Have it to hand before you start: Your income (AGI) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>You could receive</strong> is a plain number. The value follows from Filing status, How many dependents? and Your income (AGI). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Filing status, How many dependents? and Your income (AGI). Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Filing status into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare You could receive with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind You could receive is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Filing status, How many dependents? and Your income (AGI) and the number you are missing is You could receive.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/cpm">CPM Calculator</a>, <a href="/finance/credit-card-interest">Credit card interest Calculator</a> and <a href="/finance/credit-card-minimum-payment">Credit card minimum payment Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>Neighbouring pages resolve the parts of the same job that Second stimulus check - HEROES Act leaves alone. Knowing which is which saves running the wrong one:</p><p>Worth opening next: <a href="/finance/cpm">CPM Calculator</a>, <a href="/finance/credit-card-interest">Credit card interest Calculator</a> and <a href="/finance/credit-card-minimum-payment">Credit card minimum payment Calculator</a>. They follow the same pattern as this page (form, formula, worked example, answer), so a reader who understands one understands the others.</p><p>Using the page that already answers the question you have is better than adapting this one: the formula and the units will match what you expect, and the worked example will be about your case.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Second stimulus check - HEROES Act is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Filing status, How many dependents? and Your income (AGI) beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Second stimulus check - HEROES Act calculator work out?', 'a' => <<<'TXT'
            You could receive, from Filing status, How many dependents? and Your income (AGI). The relationship is You could receive = get_check(Filing status, How many dependents?, Your income (AGI)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Filing status, How many dependents?, Your income (AGI). Enter filing status, how many dependents? and your income (AGI); You could receive is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            You could receive is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is You could receive, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of You could receive keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/cpm', 'name' => 'CPM Calculator'],
            ['path' => '/finance/credit-card-interest', 'name' => 'Credit card interest Calculator'],
            ['path' => '/finance/credit-card-minimum-payment', 'name' => 'Credit card minimum payment Calculator'],
        ],
        'authors' => [],
    ],
];

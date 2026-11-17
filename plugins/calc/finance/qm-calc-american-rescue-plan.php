<?php

/**
 * Stimulus check - American Rescue Plan
 * /finance/american-rescue-plan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Stimulus check - American Rescue Plan',
    'meta' => ['title' => 'Stimulus check - American Rescue Plan Calculator', 'description' => 'Stimulus check - American Rescue Plan reports according to the bill, you could receive, you could receive and with lower income caps, you could receive.', 'h1' => 'Stimulus check - American Rescue Plan Calculator', 'updated' => '2024-08-01'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        This calculator estimates the payment you are likely to receive according to the version of the American Rescue Plan, which was passed into law on March 10, 2021. To qualify for a relief check, you must be a U.S. resident with a social security number. However, certain people who didn't file taxes recently may still receive a payment.
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'taxForm',
                            'label' => 'Have you filed 2019 or 2020 taxes?',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'dataset' => 'yesno',
                            'help' => 'You need to have filed your tax form for 2019 or 2020.',
                            'default' => 'Yes',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'If you haven\'t paid taxes but fall under a special eligibility category, set "dependents" and "income in 2019" to 0 to see how much you might get.'],
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
                            'help' => 'Enter the number of dependents (any age) you claimed on your last tax form.',
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
                            'label' => 'Income in 2019 or 2020 (AGI)',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'Use your most recent tax form; this is the Adjusted gross income.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result2019',
                            'label' => 'According to the bill, you could receive',
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
                                ['when' => 'taxForm == 1 and result2019 == 0', 'text' => <<<'TXT'
                                Your income in 2019 was too high to qualify you for the relief payment. Please note that the money phases out differently than the previous stimulus checks. Read the FAQ section of the text for details.&nbsp;
                                TXT],
                                ['when' => 'taxForm == 1 and result2019 != 0 and hasValue(result2019)', 'text' => 'You are likely to receive a relief payment of ${{result2019.formattedValue}} if the bill is passed without changes.'],
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
                            'name' => 'resultLowered',
                            'label' => 'With lower income caps, you could receive',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['omni', '0.0001'],
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
        [
            'title' => 'resultLowered = get_lowered_check(married, kids, income2019)',
            'results' => ['resultLowered' => 'get_lowered_check(married, kids, income2019)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_check",function(married,kids,income2019){var result=0;if(married===1){if(income2019<=75000){result=result+1400;result=result+1400*kids}else{result=result=1400;result=result+1400*kids;result=Math.max(0,result*(1-(income2019-75000)/5000))}}else if(married===2){if(income2019<=150000){result=result+2800;result=result+1400*kids}else{result=result+2800;result=result+1400*kids;result=Math.max(0,result*(1-(income2019-150000)/10000))}}else if(married===3){if(income2019<=112500){result=result+1400;result=result+1400*kids}else{result=result+1400;result=result+1400*kids;result=Math.max(0,result*(1-(income2019-112500)/7500))}}return result});omni.define("get_lowered_check",function(married,kids,income2019){var result=0;if(married===1){if(income2019<=75000){result=result+1400;result=result+1400*kids}else{result=result=1400;result=result+1400*kids;result=Math.max(0,result*(1-(income2019-75000)/5000))}}else if(married===2){if(income2019<=150000){result=result+2800;result=result+1400*kids}else{result=result+2800;result=result+1400*kids;result=Math.max(0,result*(1-(income2019-150000)/10000))}}else if(married===3){if(income2019<=112500){result=result+1400;result=result+1400*kids}else{result=result+1400;result=result+1400*kids;result=Math.max(0,result*(1-(income2019-112500)/7500))}}return result});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Stimulus check - American Rescue Plan takes Filing status, How many dependents? and Income in 2019 or 2020 (AGI) and returns According to the bill, you could receive and You could receive. It is a single relationship that reads according to the bill, you could receive out of filing status, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Stimulus check - American Rescue Plan calculator works', 'html' => <<<'TXT'
            <p>The Stimulus check - American Rescue Plan calculator applies one relationship to 3 numbers and reports According to the bill, you could receive, You could receive and With lower income caps, you could receive.</p><p>Written with the labels from the form, According to the bill, you could receive = get_check(Filing status, How many dependents?, Income in 2019 or 2020 (AGI)).</p><p>What comes back is According to the bill, you could receive, You could receive and With lower income caps, you could receive — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Filing status</strong> — a plain number, no unit. Head of household typically means a single parent.</li><li><strong>How many dependents?</strong> — a plain number, no unit. Enter the number of dependents (any age) you claimed on your last tax form.</li><li><strong>Income in 2019 or 2020 (AGI)</strong> — a plain number, no unit. Use your most recent tax form; this is the Adjusted gross income.</li></ul><p>What you get back is According to the bill, you could receive, You could receive, With lower income caps, you could receive, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: According to the bill, you could receive takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>According to the bill, you could receive</strong> = <code>get_check(Filing status, How many dependents?, Income in 2019 or 2020 (AGI))</code></li><li><strong>You could receive</strong> = <code>get_check(Filing status, How many dependents?, Income in 2018 (AGI))</code></li><li><strong>With lower income caps, you could receive</strong> = <code>get_lowered_check(Filing status, How many dependents?, Income in 2019 or 2020 (AGI))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>According to the bill, you could receive</strong> = <code>get_check(Filing status, How many dependents?, Income in 2019 or 2020 (AGI))</code> — the form to use when Filing status, How many dependents? and Income in 2019 or 2020 (AGI) are the values you have.</li><li><strong>You could receive</strong> = <code>get_check(Filing status, How many dependents?, Income in 2018 (AGI))</code> — the form to use when Filing status, How many dependents? and Income in 2018 (AGI) are the values you have.</li><li><strong>With lower income caps, you could receive</strong> = <code>get_lowered_check(Filing status, How many dependents?, Income in 2019 or 2020 (AGI))</code> — the form to use when Filing status, How many dependents? and Income in 2019 or 2020 (AGI) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of According to the bill, you could receive, You could receive and With lower income caps, you could receive can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with According to the bill, you could receive, You could receive and With lower income caps, you could receive are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Filing status left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Filing status is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>How many dependents? left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If How many dependents? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Income in 2019 or 2020 (AGI) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Income in 2019 or 2020 (AGI) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Filing status is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Stimulus check - American Rescue Plan form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Filing status</strong> takes a plain number with no unit attached. Head of household typically means a single parent. Change it and According to the bill, you could receive, You could receive and With lower income caps, you could receive changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Filing status is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>How many dependents?</strong> takes a plain number with no unit attached. Enter the number of dependents (any age) you claimed on your last tax form. Change it and According to the bill, you could receive, You could receive and With lower income caps, you could receive changes with it. Fill it from a measurement rather than a memory — How many dependents? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Income in 2019 or 2020 (AGI)</strong> takes a plain number with no unit attached. Use your most recent tax form; this is the Adjusted gross income. Change it and According to the bill, you could receive and With lower income caps, you could receive changes with it. Fill it from a measurement rather than a memory — Income in 2019 or 2020 (AGI) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>According to the bill, you could receive</strong> is a plain number. The value follows from Filing status, How many dependents? and Income in 2019 or 2020 (AGI). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>You could receive</strong> is a plain number. The value follows from Filing status, How many dependents? and Income in 2018 (AGI). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>With lower income caps, you could receive</strong> is a plain number. The value follows from Filing status, How many dependents? and Income in 2019 or 2020 (AGI). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Filing status, How many dependents? and Income in 2019 or 2020 (AGI) ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Filing status — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check According to the bill, you could receive against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> According to the bill, you could receive follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Filing status, How many dependents? and Income in 2019 or 2020 (AGI) and the number you are missing is According to the bill, you could receive and You could receive.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/hr-software-roi">HR software ROI Calculator</a>, <a href="/finance/hra-exemption">HRA exemption Calculator</a> and <a href="/finance/illinois-overtime">Illinois overtime Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Stimulus check - American Rescue Plan calculator work out?', 'a' => <<<'TXT'
            According to the bill, you could receive, You could receive and With lower income caps, you could receive, from Filing status, How many dependents? and Income in 2019 or 2020 (AGI). The relationship is According to the bill, you could receive = get_check(Filing status, How many dependents?, Income in 2019 or 2020 (AGI)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Filing status, How many dependents?, Income in 2019 or 2020 (AGI). With filing status, how many dependents? and income in 2019 or 2020 (AGI) in place, According to the bill, you could receive can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. According to the bill, you could receive, You could receive and With lower income caps, you could receive can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally According to the bill, you could receive is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Filing status blank and the page solves for it, reporting According to the bill, you could receive instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. According to the bill, you could receive keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/hr-software-roi', 'name' => 'HR software ROI Calculator'],
            ['path' => '/finance/hra-exemption', 'name' => 'HRA exemption Calculator'],
            ['path' => '/finance/illinois-overtime', 'name' => 'Illinois overtime Calculator'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * CASH Act of 2020
 * /finance/cash-act-2020
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'CASH Act of 2020',
    'meta' => ['title' => 'CASH Act of 2020 — Formula, Steps & Examples', 'description' => 'CASH Act of 2020 takes have you filed 2019 taxes? and returns you will receive. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'CASH Act of 2020 Calculator', 'updated' => '2025-10-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        To qualify for a payout, you have to be a U.S. resident with a social security number. You don’t need to have paid any taxes recently, but you must have at least filed your paperwork or fall under one of the special eligibility categories (see text) such as receiving SSI.
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
                            'help' => 'You need to have filed your tax form for 2019 or fall under one of the special eligibility categories (see text).',
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
                                ['when' => 'taxForm == 1 and result2019 == 0 and hasValue(result2019)', 'text' => <<<'TXT'
                                Your income in 2019 was too high to qualify you for the stimulus payment. Note that the money phases out at a higher income bracket compared to the CARES Act due to a higher initial stimulus value. Read the FAQ for details.&nbsp;
                                TXT],
                                ['when' => 'taxForm == 1 and result2019 != 0 and hasValue(result2019)', 'text' => 'If the bill passes, you would likely receive a relief payment of ${{result2019.formattedValue}}.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'How much more will you get?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kids_under_17',
                            'label' => 'How many dependents under 17?',
                            'type' => 'number',
                            'help' => 'The original COVID-related Tax Relief Act of 2020 limits dependents to children under 17 years of age.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result600',
                            'label' => 'You would receive',
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
                                ['when' => 'result600 != 0 and result2019 != 0 and hasValue(result600) and hasValue(result2019)', 'text' => <<<'TXT'
                                You would get ${{difference.formattedValue}} more than the original COVID-related Tax Relief Act of 2020, which provided $600 per individual and $600 per child dependent.
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
                            'name' => 'difference',
                            'label' => 'Difference',
                            'type' => 'presentation',
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
            'title' => 'result600 = get_check_600(married, kids_under_17, income2019)',
            'results' => ['result600' => 'get_check_600(married, kids_under_17, income2019)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_check",function(married,kids,income2019){var result=0;if(married===1){if(income2019<=75000){result=result+2000;result=result+2000*kids}else{result=result+2000*kids;result=Math.max(0,result+2000-0.05*(income2019-75000))}}else if(married===2){if(income2019<=150000){result=result+4000;result=result+2000*kids}else{result=result+2000*kids;result=Math.max(0,result+4000-0.05*(income2019-150000))}}else if(married===3){if(income2019<=112500){result=result+2000;result=result+2000*kids}else{result=result+2000*kids;result=Math.max(0,result+2000-0.05*(income2019-112500))}}return result});omni.define("get_check_600",function(married,kids,income2019){var result=0;if(married===1){if(income2019<=75000){result=result+600;result=result+600*kids}else{result=result+600*kids;result=Math.max(0,result+600-0.05*(income2019-75000))}}else if(married===2){if(income2019<=150000){result=result+1200;result=result+600*kids}else{result=result+600*kids;result=Math.max(0,result+1200-0.05*(income2019-150000))}}else if(married===3){if(income2019<=112500){result=result+600;result=result+600*kids}else{result=result+600*kids;result=Math.max(0,result+600-0.05*(income2019-112500))}}return result});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        CASH Act of 2020 works out You will receive and You would receive from Filing status, How many dependents? and Income in 2019 (AGI). There is no hidden constant here: change you will receive and filing status moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the CASH Act of 2020 calculator works', 'html' => <<<'TXT'
            <p>The CASH Act of 2020 calculator applies one relationship to 3 numbers and reports You will receive and You would receive.</p><p>The relationship it solves reads You will receive = get_check(Filing status, How many dependents?, Income in 2019 (AGI)).</p><p>The result panel carries You will receive and You would receive, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Filing status</strong> — a plain number, no unit. Head of household typically means a single parent or a married couple with a single earner.</li><li><strong>How many dependents?</strong> — a plain number, no unit. Enter the number of dependents (any age) you claimed on your last tax form.</li><li><strong>Income in 2019 (AGI)</strong> — a plain number, no unit. Adjusted gross income on your tax form.</li></ul><p>What you get back is You will receive, You would receive, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as You will receive is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>You will receive</strong> = <code>get_check(Filing status, How many dependents?, Income in 2019 (AGI))</code></li><li><strong>You would receive</strong> = <code>get_check_600(Filing status, How many dependents under 17?, Income in 2019 (AGI))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>You will receive</strong> = <code>get_check(Filing status, How many dependents?, Income in 2019 (AGI))</code> — the form to use when Filing status, How many dependents? and Income in 2019 (AGI) are the values you have.</li><li><strong>You would receive</strong> = <code>get_check_600(Filing status, How many dependents under 17?, Income in 2019 (AGI))</code> — the form to use when Filing status, How many dependents under 17? and Income in 2019 (AGI) are the values you have.</li></ul><p>Any one of You will receive and You would receive can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> You will receive and You would receive are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Filing status left as a guess.</strong> Anything typed into Filing status is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>How many dependents? left as a guess.</strong> Anything typed into How many dependents? is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Income in 2019 (AGI) left as a guess.</strong> Anything typed into Income in 2019 (AGI) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Filing status to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the CASH Act of 2020 form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Filing status</strong> takes a plain number with no unit attached. Head of household typically means a single parent or a married couple with a single earner. The page reads it when it works out You will receive and You would receive. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Filing status is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>How many dependents?</strong> takes a plain number with no unit attached. Enter the number of dependents (any age) you claimed on your last tax form. The page reads it when it works out You will receive. Fill it from a measurement rather than a memory — How many dependents? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Income in 2019 (AGI)</strong> takes a plain number with no unit attached. Adjusted gross income on your tax form. The page reads it when it works out You will receive and You would receive. Fill it from a measurement rather than a memory — Income in 2019 (AGI) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>You will receive</strong> is a plain number. It is computed from Filing status, How many dependents? and Income in 2019 (AGI), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>You would receive</strong> is a plain number. It is computed from Filing status, How many dependents under 17? and Income in 2019 (AGI), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Filing status, How many dependents? and Income in 2019 (AGI) ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Filing status — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check You will receive against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind You will receive is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Filing status, How many dependents? and Income in 2019 (AGI) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Filing status, How many dependents? and Income in 2019 (AGI) measured, You will receive and You would receive wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/impermanent-loss">Impermanent loss</a>, <a href="/finance/income-elasticity-demand">Income elasticity of demand Calculator</a> and <a href="/finance/income-tax-pakistan">Income tax - Pakistan</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>CASH Act of 2020 is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the CASH Act of 2020 calculator work out?', 'a' => <<<'TXT'
            You will receive and You would receive, from Filing status, How many dependents? and Income in 2019 (AGI). The relationship is You will receive = get_check(Filing status, How many dependents?, Income in 2019 (AGI)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Filing status, How many dependents?, Income in 2019 (AGI). Enter filing status, how many dependents? and income in 2019 (AGI); You will receive is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of You will receive and You would receive blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of You will receive is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Filing status blank and the page solves for it, reporting You will receive instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of You will receive keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/impermanent-loss', 'name' => 'Impermanent loss'],
            ['path' => '/finance/income-elasticity-demand', 'name' => 'Income elasticity of demand Calculator'],
            ['path' => '/finance/income-tax-pakistan', 'name' => 'Income tax - Pakistan'],
        ],
        'authors' => [],
    ],
];

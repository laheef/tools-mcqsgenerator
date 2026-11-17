<?php

/**
 * Stimulus payment
 * /finance/stimulus-payment
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Stimulus payment',
    'meta' => ['title' => 'Stimulus payment Calculator: Free, With Steps', 'description' => 'Stimulus payment works out you will receive from have you filed 2019 taxes?. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Stimulus payment Calculator', 'updated' => '2024-07-02'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        To qualify for a payout, you have to be a U.S. resident with a social security number. You don’t need to have paid any taxes recently, but you must have at least filed your paperwork.
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_filed',
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
                            'name' => 'filing_status',
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
                            'label' => 'How many kids?',
                            'type' => 'number',
                            'help' => 'Enter the number of children under 17 you claimed as dependents on your last tax form.',
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
                            'name' => 'result2018',
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
                                ['when' => 'tax_filed == 0 and result2018 == 0', 'text' => 'Your income in 2018 was too high to qualify you for the stimulus payment.&nbsp;'],
                                ['when' => 'tax_filed == 0 and result2018 != 0', 'text' => 'You are likely to receive a stimulus payment of ${{result2018.formattedValue}}.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'tax_filed == 1 and result2019 == 0', 'text' => 'Your income in 2019 was too high to qualify you for the stimulus payment.&nbsp;'],
                                ['when' => 'tax_filed == 1 and result2019 != 0', 'text' => 'You are likely to receive a stimulus payment of ${{result2019.formattedValue}}.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'result2019 = get_check(filing_status, kids, income2019)',
            'results' => ['result2019' => 'get_check(filing_status, kids, income2019)'],
        ],
        [
            'title' => 'result2018 = get_check(filing_status, kids, income2018)',
            'results' => ['result2018' => 'get_check(filing_status, kids, income2018)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_check",function(filing_status,kids,income2019){var result=0;if(filing_status==1){if(income2019<75000){result=result+1200;result=result+500*kids}else{result=result+500*kids;result=Math.max(0,result+1200-5*(income2019-75000)/100)}}else if(filing_status==2){if(income2019<150000){result=result+2400;result=result+500*kids}else{result=result+500*kids;result=Math.max(0,result+2400-5*(income2019-150000)/100)}}else if(filing_status==3){if(income2019<112500){result=result+1200;result=result+500*kids}else{result=result+500*kids;result=Math.max(0,result+1200-5*(income2019-112500)/100)}}return result});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Stimulus payment works out You will receive and You will receive from Filing status, How many kids? and Income in 2019 (AGI). There is no hidden constant here: change you will receive and filing status moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Stimulus payment calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Stimulus payment: it takes 3 numbers and reports You will receive and You will receive.</p><p>In the form&#039;s own words, You will receive = get_check(Filing status, How many kids?, Income in 2019 (AGI)).</p><p>The answers are You will receive and You will receive; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Filing status</strong> — a plain number, no unit. Head of household typically means a single parent.</li><li><strong>How many kids?</strong> — a plain number, no unit. Enter the number of children under 17 you claimed as dependents on your last tax form.</li><li><strong>Income in 2019 (AGI)</strong> — a plain number, no unit. Adjusted gross income on your tax form.</li></ul><p>What you get back is You will receive, You will receive, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as You will receive is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>You will receive</strong> = <code>get_check(Filing status, How many kids?, Income in 2019 (AGI))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>You will receive</strong> = <code>get_check(Filing status, How many kids?, Income in 2019 (AGI))</code> — the form to use when Filing status, How many kids? and Income in 2019 (AGI) are the values you have.</li><li><strong>You will receive</strong> = <code>get_check(Filing status, How many kids?, Income in 2018 (AGI))</code> — the form to use when Filing status, How many kids? and Income in 2018 (AGI) are the values you have.</li></ul><p>Any one of You will receive and You will receive can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> You will receive and You will receive are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Filing status left as a guess.</strong> Anything typed into Filing status is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>How many kids? left as a guess.</strong> Anything typed into How many kids? is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Income in 2019 (AGI) left as a guess.</strong> Anything typed into Income in 2019 (AGI) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Filing status is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Stimulus payment form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Filing status</strong> takes a plain number with no unit attached. Head of household typically means a single parent. The page reads it when it works out You will receive and You will receive. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Filing status is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>How many kids?</strong> takes a plain number with no unit attached. Enter the number of children under 17 you claimed as dependents on your last tax form. The page reads it when it works out You will receive and You will receive. Fill it from a measurement rather than a memory — How many kids? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Income in 2019 (AGI)</strong> takes a plain number with no unit attached. Adjusted gross income on your tax form. The page reads it when it works out You will receive. Fill it from a measurement rather than a memory — Income in 2019 (AGI) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>You will receive</strong> is a plain number. It is worked out from Filing status, How many kids? and Income in 2018 (AGI). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>You will receive</strong> is a plain number. It is worked out from Filing status, How many kids? and Income in 2019 (AGI). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Filing status, How many kids? and Income in 2019 (AGI) ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Filing status — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check You will receive against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind You will receive is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Filing status, How many kids? and Income in 2019 (AGI) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Filing status, How many kids? and Income in 2019 (AGI) measured, You will receive and You will receive wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/lottery-tax">Lottery tax Calculator</a>, <a href="/finance/ltv">LTV (Loan to Value) Calculator</a> and <a href="/finance/lumpsum">Lumpsum (India)</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Stimulus payment is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Stimulus payment is a number to act on, so the useful question is what to do with You will receive and You will receive once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Filing status, How many kids? and Income in 2019 (AGI) alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Stimulus payment calculator work out?', 'a' => <<<'TXT'
            You will receive and You will receive, from Filing status, How many kids? and Income in 2019 (AGI). The relationship is You will receive = get_check(Filing status, How many kids?, Income in 2019 (AGI)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Filing status, How many kids?, Income in 2019 (AGI). With filing status, how many kids? and income in 2019 (AGI) in place, You will receive can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of You will receive and You will receive blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of You will receive is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Filing status blank and the page solves for it, reporting You will receive instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of You will receive keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/lottery-tax', 'name' => 'Lottery tax Calculator'],
            ['path' => '/finance/ltv', 'name' => 'LTV (Loan to Value) Calculator'],
            ['path' => '/finance/lumpsum', 'name' => 'Lumpsum (India)'],
        ],
        'authors' => [],
    ],
];

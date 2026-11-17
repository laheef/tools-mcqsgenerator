<?php

/**
 * Stimulus check (40k cap)
 * /finance/stimulus-check-40k-cap
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Stimulus check (40k cap)',
    'meta' => ['title' => 'Stimulus check (40k cap) — Formula & Results', 'description' => 'Stimulus check (40k cap) works out you could receive from filing status and how many dependents?. Every box can be solved for, not only the one in the title.', 'h1' => 'Stimulus check (40k cap) Calculator', 'updated' => '2024-10-01'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        This calculator is based on the HEROES Act, which is a proposed second round of stimulus checks. On July 6, Senate Majority Leader Mitch McConnell stated that the new stimulus check will most likely only go to the low-income group, with a yearly income of $40,000 as the cut-off point.
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
                            'rounding' => ['standard', '2'],
                            'min' => 2,
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
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0],
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'result2019 == 0', 'text' => 'Your income is too high for you to qualify for the hypothetical stimulus payment.'],
                                ['when' => 'result2019 > 0', 'text' => ' If the bill passes, you are likely to receive a stimulus payment of ${{result2019.formattedValue}}.'],
                            ],
                        ],
                        ['type' => 'note', 'text' => ' Check how much you would be eligible for under the original HEROES Act proposal !'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'result2019 = get_check(married, kids, income2019) ',
            'results' => ['result2019' => 'get_check(married, kids, income2019)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_check",function(married,kids,income2019){var result=0;kids=Math.min(kids,3);if(married==1){if(income2019<=40000){result=result+1200;result=result+1200*kids}else{result=0}}else if(married==2){if(income2019<=80000){result=result+2400;result=result+1200*kids}else{result=0}}else if(married==3){if(income2019<=60000){result=result+1200;result=result+1200*kids}else{result=0}}return result});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Stimulus check (40k cap) works out You could receive from Filing status, How many dependents? and Your income (AGI). The arithmetic is the whole method: you could receive is worked out from filing status by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Stimulus check (40k cap) calculator works', 'html' => <<<'TXT'
            <p>The Stimulus check (40k cap) calculator applies one relationship to 3 numbers and reports You could receive.</p><p>In the form&#039;s own words, You could receive = get_check(Filing status, How many dependents?, Your income (AGI)).</p><p>The result panel carries You could receive, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Filing status</strong> — a plain number, no unit. Head of household typically means a single parent.</li><li><strong>How many dependents?</strong> — a plain number, no unit. Enter the number of children you claim as dependents. The maximum number of kids you can claim a stimulus payment for is 3.</li><li><strong>Your income (AGI)</strong> — a plain number, no unit. Adjusted gross income on your tax form.</li></ul><p>The answer comes back as You could receive. The page writes that box; there is nothing to submit or save before you can read it.</p>
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
            <p>The boxes on the Stimulus check (40k cap) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Filing status</strong> takes a plain number with no unit attached. Head of household typically means a single parent. The page reads it when it works out You could receive. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Filing status is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>How many dependents?</strong> takes a plain number with no unit attached. Enter the number of children you claim as dependents. The maximum number of kids you can claim a stimulus payment for is 3. The page reads it when it works out You could receive. Fill it from a measurement rather than a memory — How many dependents? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Your income (AGI)</strong> takes a plain number with no unit attached. Adjusted gross income on your tax form. The page reads it when it works out You could receive. Fill it from a measurement rather than a memory — Your income (AGI) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>You could receive</strong> is a plain number. It is computed from Filing status, How many dependents? and Your income (AGI), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Filing status, How many dependents? and Your income (AGI) ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Filing status — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check You could receive against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind You could receive is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Filing status, How many dependents? and Your income (AGI) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Filing status, How many dependents? and Your income (AGI) and the number you are missing is You could receive.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/gdp-deflator">GDP deflator</a>, <a href="/finance/gdp-gap">GDP gap</a> and <a href="/finance/gdp-growth">GDP growth rate Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Stimulus check (40k cap) is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>A criterion for choosing between these pages: Stimulus check (40k cap) answers a different question from the one above, even where the two share a sentence of explanation.</p><p>The nearest are <a href="/finance/gdp-deflator">GDP deflator</a>, <a href="/finance/gdp-gap">GDP gap</a> and <a href="/finance/gdp-growth">GDP growth rate Calculator</a>. Each takes its own inputs and reports its own answer, and none of them shares a stored value with this page — open two in separate tabs and they will not interfere.</p><p>If the value you need is not the one reported here but a step before or after it, one of those pages probably reports it directly rather than making you convert by hand.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Stimulus check (40k cap) is a number to act on, so the useful question is what to do with You could receive once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Filing status, How many dependents? and Your income (AGI) alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Stimulus check (40k cap) calculator work out?', 'a' => <<<'TXT'
            You could receive, from Filing status, How many dependents? and Your income (AGI). The relationship is You could receive = get_check(Filing status, How many dependents?, Your income (AGI)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Filing status, How many dependents?, Your income (AGI). Fill filing status, how many dependents? and your income (AGI) and leave You could receive empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally You could receive is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: You could receive is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to You could receive at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/gdp-deflator', 'name' => 'GDP deflator'],
            ['path' => '/finance/gdp-gap', 'name' => 'GDP gap'],
            ['path' => '/finance/gdp-growth', 'name' => 'GDP growth rate Calculator'],
        ],
        'authors' => [],
    ],
];

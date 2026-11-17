<?php

/**
 * Car depreciation
 * /finance/car-depreciation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Car depreciation',
    'meta' => ['title' => 'Car depreciation — Formula, Steps & Examples', 'description' => 'Car depreciation turns initial car value and car age into reduced car value. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Car depreciation Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'car_value',
                            'label' => 'Initial car value',
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
                            'name' => 'time',
                            'label' => 'Car age',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'value_custom',
                            'label' => 'Reduced car value',
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
        [
            'title' => 'Car value after...',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'value_1min',
                            'label' => '1 minute',
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
                        ['type' => 'note', 'text' => ' Why did it drop by {{difference.monetaryValue}} in one minute? Click to find out!'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'value_1year',
                            'label' => '1 year',
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
                            'name' => 'value_2years',
                            'label' => '2 years',
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
                            'name' => 'value_3years',
                            'label' => '3 years',
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
                            'name' => 'value_4years',
                            'label' => '4 years',
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
                            'name' => 'value_5years',
                            'label' => '5 years',
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
                        ['type' => 'note', 'text' => 'Scared of depreciation? Check out our car lease calculator!'],
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
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                         Are you a car market expert? Most people underestimate how fast depreciation hits.  Test your knowledge on resale values and hidden costs in our car depreciation quiz. ​ Can you get 5/5? 
                        TXT],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'car_value * 0.9153997743531311= value_1min',
            'results' => ['car_value' => '(10000000000000000/9153997743531311)*value_1min', 'value_1min' => '(9153997743531311/10000000000000000)*car_value'],
        ],
        [
            'title' => 'car_value * 0.7998= value_1year',
            'results' => ['car_value' => '(5000/3999)*value_1year', 'value_1year' => '(3999/5000)*car_value'],
        ],
        [
            'title' => 'car_value * 0.6902= value_2years',
            'results' => ['value_2years' => '(3451/5000)*car_value', 'car_value' => '(5000/3451)*value_2years'],
        ],
        [
            'title' => 'car_value * 0.5866= value_3years',
            'results' => ['car_value' => '(5000/2933)*value_3years', 'value_3years' => '(2933/5000)*car_value'],
        ],
        [
            'title' => 'car_value * 0.489= value_4years',
            'results' => ['car_value' => '(1000/489)*value_4years', 'value_4years' => '(489/1000)*car_value'],
        ],
        [
            'title' => 'car_value * 0.3974= value_5years',
            'results' => ['value_5years' => '(1987/5000)*car_value', 'car_value' => '(5000/1987)*value_5years'],
        ],
        [
            'title' => 'max(0, car_value*(time^2 *0.003 -0.1186*time + 0.9154)) = value_custom',
            'results' => ['value_custom' => 'max(0, (1/5000)*car_value*(15*pow(time, 2) - 593*time + 4577))'],
        ],
        [
            'title' => 'difference = car_value - value_1min',
            'results' => ['car_value' => 'difference + value_1min', 'value_1min' => 'car_value - difference', 'difference' => 'car_value - value_1min'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Car depreciation works out Reduced car value and 1 year from Initial car value and 1 minute. It is a single relationship that reads reduced car value out of initial car value, not a table of canned results keyed by them. Units for Reduced car value default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Car depreciation calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Car depreciation: it takes 2 numbers and reports Reduced car value, 1 year and 2 years.</p><p>In the form&#039;s own words, Initial car value = (10000000000000000 ÷ 9153997743531311) × 1 minute.</p><p>The result panel carries Reduced car value, 1 year, 2 years and 3 years, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Initial car value</strong> — in USD</li><li><strong>1 minute</strong> — in USD</li></ul><p>The answers come back as Reduced car value in USD, 1 year in USD, 2 years in USD, 3 years in USD, 4 years in USD, 5 years in USD, Difference in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Car age lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Initial car value</strong> = <code>(10000000000000000 ÷ 9153997743531311) × 1 minute</code></li><li><strong>1 minute</strong> = <code>(9153997743531311 ÷ 10000000000000000) × Initial car value</code></li><li><strong>1 year</strong> = <code>(3999 ÷ 5000) × Initial car value</code></li><li><strong>2 years</strong> = <code>(3451 ÷ 5000) × Initial car value</code></li><li><strong>3 years</strong> = <code>(2933 ÷ 5000) × Initial car value</code></li><li><strong>4 years</strong> = <code>(489 ÷ 1000) × Initial car value</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Initial car value</strong> = <code>(10000000000000000 ÷ 9153997743531311) × 1 minute</code> — the form to use when 1 minute are the values you have.</li><li><strong>1 minute</strong> = <code>(9153997743531311 ÷ 10000000000000000) × Initial car value</code> — the form to use when Initial car value are the values you have.</li><li><strong>Initial car value</strong> = <code>(5000 ÷ 3999) × 1 year</code> — the form to use when 1 year are the values you have.</li><li><strong>1 year</strong> = <code>(3999 ÷ 5000) × Initial car value</code> — the form to use when Initial car value are the values you have.</li><li><strong>2 years</strong> = <code>(3451 ÷ 5000) × Initial car value</code> — the form to use when Initial car value are the values you have.</li><li><strong>Initial car value</strong> = <code>(5000 ÷ 3451) × 2 years</code> — the form to use when 2 years are the values you have.</li><li><strong>Initial car value</strong> = <code>(5000 ÷ 2933) × 3 years</code> — the form to use when 3 years are the values you have.</li><li><strong>3 years</strong> = <code>(2933 ÷ 5000) × Initial car value</code> — the form to use when Initial car value are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Initial car value, 1 minute and 1 year can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Reduced car value, 1 year and 2 years are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Initial car value left as a guess.</strong> Anything typed into Initial car value is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>1 minute left as a guess.</strong> Anything typed into 1 minute is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Initial car value and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Car depreciation form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Initial car value</strong> takes a plain number with no unit attached. It feeds 1 minute, 1 year and 2 years. Fill it from a measurement rather than a memory — Initial car value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>1 minute</strong> takes a plain number with no unit attached. It feeds Initial car value and Difference. Fill it from a measurement rather than a memory — 1 minute is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Reduced car value</strong> is a plain number. The value follows from Initial car value and Car age. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>1 year</strong> is a plain number. The value follows from Initial car value. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>2 years</strong> is a plain number. The value follows from Initial car value. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>3 years</strong> is a plain number. The value follows from Initial car value. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>4 years</strong> is a plain number. The value follows from Initial car value. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>5 years</strong> is a plain number. The value follows from Initial car value. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Difference</strong> is a plain number. The value follows from Initial car value and 1 minute. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Initial car value and 1 minute ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Initial car value — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Reduced car value in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Reduced car value is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Initial car value and 1 minute are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Initial car value and 1 minute and the number you are missing is Reduced car value and 1 year.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/uk-coin-weight">UK coin weight Calculator</a>, <a href="/finance/uk-take-home-pay">UK take-home pay Calculator</a> and <a href="/finance/unemployment-benefit">Unemployment benefit - CARES Act Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Car depreciation is a number to act on, so the useful question is what to do with Reduced car value (USD), 1 year (USD) and 2 years (USD) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Initial car value and 1 minute alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Car depreciation calculator work out?', 'a' => 'Reduced car value, 1 year, 2 years and 3 years, from 1 minute. The relationship is Initial car value = (10000000000000000 ÷ 9153997743531311) × 1 minute.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Initial car value (USD), 1 minute (USD). Enter initial car value and 1 minute; Reduced car value is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Initial car value, 1 minute, 1 year and 2 years can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Reduced car value is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Initial car value blank and the page solves for it, reporting Reduced car value instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Reduced car value keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/uk-coin-weight', 'name' => 'UK coin weight Calculator'],
            ['path' => '/finance/uk-take-home-pay', 'name' => 'UK take-home pay Calculator'],
            ['path' => '/finance/unemployment-benefit', 'name' => 'Unemployment benefit - CARES Act Calculator'],
        ],
        'authors' => [],
    ],
];

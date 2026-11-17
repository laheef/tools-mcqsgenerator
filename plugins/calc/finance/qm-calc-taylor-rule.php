<?php

/**
 * Taylor rule
 * /finance/taylor-rule
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Taylor rule',
    'meta' => ['title' => 'Taylor rule Calculator — Formula, Units & Example', 'description' => 'Taylor rule turns current inflation, target inflation and Current GDP into inflation rate gap and output gap. The formula is printed in the form\'s own words.', 'h1' => 'Taylor rule Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => 'Inflation rate gap',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'current_inflation',
                            'label' => 'Current inflation',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'target_inflation',
                            'label' => 'Target inflation',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'The ideal inflation rate for the federal funds.',
                            'rounding' => ['standard', '2'],
                            'default' => '2',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inf_gap',
                            'label' => 'Inflation rate gap',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'The gap between the current inflation and the target inflation.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Output gap',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'current_gdp',
                            'label' => 'Current GDP',
                            'type' => 'number',
                            'help' => 'The current gross domestic product (GDP) of a country.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'long_run_gdp',
                            'label' => 'Long-run GDP',
                            'type' => 'number',
                            'help' => 'A country\'s potential economic output when fully utilising all its resources.',
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
                            'name' => 'output_gap',
                            'label' => 'Output gap',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'The gap between the current GDP and the long-run GDP.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Federal funds target rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nom_int',
                            'label' => 'Nominal interest rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'The interest rate before accounting for inflation.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'real_int',
                            'label' => 'Real interest rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'The interest rate after accounting for inflation.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'target_rate',
                            'label' => 'Federal funds target rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'The interest rate set by a country\'s central bank to influence monetary policy.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'inf_gap = current_inflation - target_inflation',
            'results' => ['target_inflation' => 'current_inflation - inf_gap', 'inf_gap' => 'current_inflation - target_inflation', 'current_inflation' => 'inf_gap + target_inflation'],
        ],
        [
            'title' => 'output_gap = log10(current_gdp) - log10(long_run_gdp)',
            'results' => ['output_gap' => 'log10(current_gdp) - log10(long_run_gdp)'],
        ],
        [
            'title' => 'real_int = nom_int - current_inflation',
            'results' => ['nom_int' => 'current_inflation + real_int', 'real_int' => '-current_inflation + nom_int', 'current_inflation' => 'nom_int - real_int'],
        ],
        [
            'title' => 'target_rate = real_int + current_inflation + 0.5*(current_inflation - target_inflation) + 0.5 * (log10(current_gdp) - log10(long_run_gdp))',
            'results' => ['real_int' => '-3/2*current_inflation + (1/2)*target_inflation + target_rate - 1/2*log10(current_gdp) + (1/2)*log10(long_run_gdp)', 'current_inflation' => '-2/3*real_int + (1/3)*target_inflation + (2/3)*target_rate - 1/3*log10(current_gdp) + (1/3)*log10(long_run_gdp)', 'target_inflation' => '3*current_inflation + 2*real_int - 2*target_rate + log10(current_gdp) - log10(long_run_gdp)', 'target_rate' => '(3/2)*current_inflation + real_int - 1/2*target_inflation + (1/2)*log10(current_gdp) - 1/2*log10(long_run_gdp)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Current inflation and Target inflation into Taylor rule and the answer comes back as Inflation rate gap and Output gap. There is no hidden constant here: change inflation rate gap and current inflation moves with it. The main result, Inflation rate gap, is reported in %.
        TXT,
        'sections' => [
            ['title' => 'How the Taylor rule calculator works', 'html' => <<<'TXT'
            <p>The Taylor rule calculator applies one relationship to 2 numbers and reports Inflation rate gap, Output gap and Nominal interest rate.</p><p>Written with the labels from the form, Inflation rate gap = Current inflation − Target inflation.</p><p>The answers are Inflation rate gap, Output gap, Nominal interest rate and Real interest rate; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Current inflation</strong> — in %</li><li><strong>Target inflation</strong> — in %. The ideal inflation rate for the federal funds.</li></ul><p>The result boxes are Inflation rate gap in %, Output gap in %, Nominal interest rate in %, Real interest rate in %, Federal funds target rate in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Current GDP = 3 USD and Long-run GDP = 4 USD; the answers are <strong>Output gap</strong> = -0.1249 %.</p><ul><li><strong>Output gap</strong> = -0.1249 %</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Inflation rate gap</strong> = <code>Current inflation − Target inflation</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Output gap</strong> = -0.1249. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Inflation rate gap is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Inflation rate gap</strong> = <code>Current inflation − Target inflation</code></li><li><strong>Target inflation</strong> = <code>Current inflation − Inflation rate gap</code></li><li><strong>Current inflation</strong> = <code>Inflation rate gap + Target inflation</code></li><li><strong>Output gap</strong> = <code>log₁₀(Current GDP) − log₁₀(Long-run GDP)</code></li><li><strong>Real interest rate</strong> = <code>− Current inflation + Nominal interest rate</code></li><li><strong>Nominal interest rate</strong> = <code>Current inflation + Real interest rate</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Inflation rate gap</strong> = <code>Current inflation − Target inflation</code> — the form to use when Current inflation and Target inflation are the values you have.</li><li><strong>Target inflation</strong> = <code>Current inflation − Inflation rate gap</code> — the form to use when Current inflation and Inflation rate gap are the values you have.</li><li><strong>Current inflation</strong> = <code>Inflation rate gap + Target inflation</code> — the form to use when Inflation rate gap and Target inflation are the values you have.</li><li><strong>Output gap</strong> = <code>log₁₀(Current GDP) − log₁₀(Long-run GDP)</code> — the form to use when Current GDP and Long-run GDP are the values you have.</li><li><strong>Real interest rate</strong> = <code>− Current inflation + Nominal interest rate</code> — the form to use when Current inflation and Nominal interest rate are the values you have.</li><li><strong>Nominal interest rate</strong> = <code>Current inflation + Real interest rate</code> — the form to use when Current inflation and Real interest rate are the values you have.</li><li><strong>Current inflation</strong> = <code>Nominal interest rate − Real interest rate</code> — the form to use when Nominal interest rate and Real interest rate are the values you have.</li><li><strong>Federal funds target rate</strong> = <code>(3 ÷ 2) × Current inflation + Real interest rate − 1 ÷ 2 × Target inflation + (1 ÷ 2) × log₁₀(Current GDP) − 1 ÷ 2 × log₁₀(Long-run GDP)</code> — the form to use when Current inflation, Real interest rate, Target inflation and Current GDP are the values you have.</li></ul><p>Any one of Inflation rate gap, Target inflation and Current inflation can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Current GDP from 3 to 6, leaving every other box alone. The panel moves from <strong>Output gap</strong> -0.1249 % to <strong>Output gap</strong> 0.1761 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Inflation rate gap, Output gap and Nominal interest rate are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Current inflation left as a guess.</strong> Anything typed into Current inflation is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Target inflation left as a guess.</strong> Anything typed into Target inflation is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Current inflation to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Taylor rule form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Current inflation</strong> is measured in %. Change it and Target inflation, Inflation rate gap and Nominal interest rate changes with it. Fill it from a measurement rather than a memory — Current inflation is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Target inflation</strong> is measured in %. The ideal inflation rate for the federal funds. Change it and Inflation rate gap, Current inflation and Real interest rate changes with it. Fill it from a measurement rather than a memory — Target inflation is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Inflation rate gap</strong> is a plain number. It is computed from Current inflation and Target inflation, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Output gap</strong> is a plain number and the page's own defaults put it at -0.1249. It is computed from Current GDP and Long-run GDP, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Nominal interest rate</strong> is a plain number. It is computed from Current inflation and Real interest rate, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Real interest rate</strong> is a plain number. It is computed from Current inflation and Nominal interest rate, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Federal funds target rate</strong> is a plain number. It is computed from Current inflation, Real interest rate, Target inflation and Current GDP, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Output gap</th></tr></thead><tbody><tr><td><strong>Current GDP</strong> +10%</td><td>+33.13%</td></tr><tr><td><strong>Long-run GDP</strong> +10%</td><td>-33.13%</td></tr></tbody></table><p>The steepest column belongs to Current GDP: ten per cent there moves an answer by about 33.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Current GDP = 1.5 USD and Long-run GDP = 2 USD and the page reports <strong>Output gap</strong> = -0.1249 %.</li><li>Feed in Current GDP = 9 USD and Long-run GDP = 4 USD and the page reports <strong>Output gap</strong> = 0.3522 %.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Inflation rate gap is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Current inflation and Target inflation measured, Inflation rate gap and Output gap wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/present-value">Present value Calculator</a>, <a href="/finance/annuity-present-value">Present value of annuity</a> and <a href="/finance/pvgo">Present value of growth opportunities (PVGO) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Taylor rule calculator work out?', 'a' => <<<'TXT'
            Inflation rate gap, Output gap, Nominal interest rate and Real interest rate, from Current inflation and Target inflation. The relationship is Inflation rate gap = Current inflation − Target inflation.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current inflation (%), Target inflation (%). Fill current inflation and target inflation and leave Inflation rate gap empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Inflation rate gap, Target inflation, Current inflation and Output gap blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Output gap = -0.1249 %. Those are the defaults written into the form — move Current inflation and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Inflation rate gap is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Current inflation blank and the page solves for it, reporting Inflation rate gap instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Inflation rate gap keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/present-value', 'name' => 'Present value Calculator'],
            ['path' => '/finance/annuity-present-value', 'name' => 'Present value of annuity'],
            ['path' => '/finance/pvgo', 'name' => 'Present value of growth opportunities (PVGO) Calculator'],
        ],
        'authors' => [],
    ],
];

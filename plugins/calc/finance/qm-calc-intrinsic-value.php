<?php

/**
 * Intrinsic value
 * /finance/intrinsic-value
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Intrinsic value',
    'meta' => ['title' => 'Intrinsic value Calculator — Formula, Units & Example', 'description' => 'Enter Earnings per share (EPS) and expected annual growth rate (g) and get Intrinsic value per share (V) back. The formula is printed in the form\'s own words.', 'h1' => 'Intrinsic value Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'earnings_per_share',
                            'label' => 'Earnings per share (EPS)',
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
                            'name' => 'expected_annual_growth_rate',
                            'label' => 'Expected annual growth rate (g)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'corporate_bond_yield',
                            'label' => 'Corporate bond yield (Y)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'current_market_price',
                            'label' => 'Current market price (CMP)',
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
                            'name' => 'intrinsic_value',
                            'label' => 'Intrinsic value per share (V)',
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
                            'name' => 'margin_of_safety',
                            'label' => 'Margin of safety (MS)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'intrinsic_value = (earnings_per_share * (8.5 + (2*expected_annual_growth_rate))* 4.4)/corporate_bond_yield',
            'results' => ['corporate_bond_yield' => '(11/5)*earnings_per_share*(4*expected_annual_growth_rate + 17)/intrinsic_value', 'earnings_per_share' => '(5/11)*corporate_bond_yield*intrinsic_value/(4*expected_annual_growth_rate + 17)', 'expected_annual_growth_rate' => '(1/44)*(5*corporate_bond_yield*intrinsic_value - 187*earnings_per_share)/earnings_per_share', 'intrinsic_value' => '(11/5)*earnings_per_share*(4*expected_annual_growth_rate + 17)/corporate_bond_yield'],
        ],
        [
            'title' => 'margin_of_safety = ((intrinsic_value - current_market_price)/intrinsic_value)*100',
            'results' => ['current_market_price' => '(1/100)*intrinsic_value*(-margin_of_safety + 100)', 'intrinsic_value' => '-100*current_market_price/(margin_of_safety - 100)', 'margin_of_safety' => '-100*current_market_price/intrinsic_value + 100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Intrinsic value takes Earnings per share (EPS), Expected annual growth rate (g) and Corporate bond yield (Y) and returns Current market price (CMP) and Intrinsic value per share (V). It is a single relationship that reads current market price (CMP) out of earnings per share (EPS), not a table of canned results keyed by them. Units for Current market price (CMP) default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Intrinsic value calculator works', 'html' => <<<'TXT'
            <p>The Intrinsic value calculator applies one relationship to 3 numbers and reports Current market price (CMP), Intrinsic value per share (V) and Margin of safety (MS).</p><p>Written with the labels from the form, Intrinsic value per share (V) = (11 ÷ 5) × Earnings per share (EPS) × (4 × Expected annual growth rate (g) + 17) ÷ Corporate bond yield (Y).</p><p>The answers are Current market price (CMP), Intrinsic value per share (V) and Margin of safety (MS); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Earnings per share (EPS)</strong> — in USD</li><li><strong>Expected annual growth rate (g)</strong> — in %</li><li><strong>Corporate bond yield (Y)</strong> — in %</li></ul><p>The answers come back as Current market price (CMP) in USD, Intrinsic value per share (V) in USD, Margin of safety (MS) in %. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Earnings per share (EPS) = 10 USD, Expected annual growth rate (g) = 100 %, Corporate bond yield (Y) = 1000 %, Current market price (CMP) = 10 USD and Margin of safety (MS) = 100 % gives <strong>Intrinsic value per share (V)</strong> = 9.17 USD.</p><ul><li><strong>Intrinsic value per share (V)</strong> = 9.17 USD</li></ul><p>That is <strong>Intrinsic value per share (V)</strong> = <code>(11 ÷ 5) × Earnings per share (EPS) × (4 × Expected annual growth rate (g) + 17) ÷ Corporate bond yield (Y)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Intrinsic value per share (V)</strong> = 9.17 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Current market price (CMP) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Intrinsic value per share (V)</strong> = <code>(11 ÷ 5) × Earnings per share (EPS) × (4 × Expected annual growth rate (g) + 17) ÷ Corporate bond yield (Y)</code></li><li><strong>Corporate bond yield (Y)</strong> = <code>(11 ÷ 5) × Earnings per share (EPS) × (4 × Expected annual growth rate (g) + 17) ÷ Intrinsic value per share (V)</code></li><li><strong>Earnings per share (EPS)</strong> = <code>(5 ÷ 11) × Corporate bond yield (Y) × Intrinsic value per share (V) ÷ (4 × Expected annual growth rate (g) + 17)</code></li><li><strong>Expected annual growth rate (g)</strong> = <code>(1 ÷ 44) × (5 × Corporate bond yield (Y) × Intrinsic value per share (V) − 187 × Earnings per share (EPS)) ÷ Earnings per share (EPS)</code></li><li><strong>Margin of safety (MS)</strong> = <code>− 100 × Current market price (CMP) ÷ Intrinsic value per share (V) + 100</code></li><li><strong>Current market price (CMP)</strong> = <code>(1 ÷ 100) × Intrinsic value per share (V) × ( − Margin of safety (MS) + 100)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Intrinsic value per share (V)</strong> = <code>(11 ÷ 5) × Earnings per share (EPS) × (4 × Expected annual growth rate (g) + 17) ÷ Corporate bond yield (Y)</code> — the form to use when Earnings per share (EPS), Expected annual growth rate (g) and Corporate bond yield (Y) are the values you have.</li><li><strong>Corporate bond yield (Y)</strong> = <code>(11 ÷ 5) × Earnings per share (EPS) × (4 × Expected annual growth rate (g) + 17) ÷ Intrinsic value per share (V)</code> — the form to use when Earnings per share (EPS), Expected annual growth rate (g) and Intrinsic value per share (V) are the values you have.</li><li><strong>Earnings per share (EPS)</strong> = <code>(5 ÷ 11) × Corporate bond yield (Y) × Intrinsic value per share (V) ÷ (4 × Expected annual growth rate (g) + 17)</code> — the form to use when Corporate bond yield (Y), Intrinsic value per share (V) and Expected annual growth rate (g) are the values you have.</li><li><strong>Expected annual growth rate (g)</strong> = <code>(1 ÷ 44) × (5 × Corporate bond yield (Y) × Intrinsic value per share (V) − 187 × Earnings per share (EPS)) ÷ Earnings per share (EPS)</code> — the form to use when Corporate bond yield (Y), Intrinsic value per share (V) and Earnings per share (EPS) are the values you have.</li><li><strong>Margin of safety (MS)</strong> = <code>− 100 × Current market price (CMP) ÷ Intrinsic value per share (V) + 100</code> — the form to use when Current market price (CMP) and Intrinsic value per share (V) are the values you have.</li><li><strong>Current market price (CMP)</strong> = <code>(1 ÷ 100) × Intrinsic value per share (V) × ( − Margin of safety (MS) + 100)</code> — the form to use when Intrinsic value per share (V) and Margin of safety (MS) are the values you have.</li><li><strong>Intrinsic value per share (V)</strong> = <code>− 100 × Current market price (CMP) ÷ (Margin of safety (MS) − 100)</code> — the form to use when Current market price (CMP) and Margin of safety (MS) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Intrinsic value per share (V), Corporate bond yield (Y) and Earnings per share (EPS) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Earnings per share (EPS) from 10 to 20, leaving every other box alone. The panel moves from <strong>Intrinsic value per share (V)</strong> 9.17 USD to <strong>Intrinsic value per share (V)</strong> 18.35 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Current market price (CMP), Intrinsic value per share (V) and Margin of safety (MS) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Earnings per share (EPS) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Earnings per share (EPS) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Expected annual growth rate (g) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Expected annual growth rate (g) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Corporate bond yield (Y) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Corporate bond yield (Y) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Earnings per share (EPS) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Intrinsic value form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Earnings per share (EPS)</strong> takes a plain number with no unit attached. The page reads it when it works out Corporate bond yield (Y), Expected annual growth rate (g) and Intrinsic value per share (V). Fill it from a measurement rather than a memory — Earnings per share (EPS) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Expected annual growth rate (g)</strong> is measured in %. The page reads it when it works out Corporate bond yield (Y), Earnings per share (EPS) and Intrinsic value per share (V). Fill it from a measurement rather than a memory — Expected annual growth rate (g) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Corporate bond yield (Y)</strong> is measured in %. The page reads it when it works out Earnings per share (EPS), Expected annual growth rate (g) and Intrinsic value per share (V). Fill it from a measurement rather than a memory — Corporate bond yield (Y) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Current market price (CMP)</strong> is a plain number. The value follows from Intrinsic value per share (V) and Margin of safety (MS). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Intrinsic value per share (V)</strong> is a plain number and the page's own defaults put it at 9.17. The value follows from Earnings per share (EPS), Expected annual growth rate (g) and Corporate bond yield (Y). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Margin of safety (MS)</strong> is a plain number. The value follows from Current market price (CMP) and Intrinsic value per share (V). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Intrinsic value per share (V)</th></tr></thead><tbody><tr><td><strong>Earnings per share (EPS)</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Expected annual growth rate (g)</strong> +10%</td><td>+9.59%</td></tr><tr><td><strong>Corporate bond yield (Y)</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Current market price (CMP)</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Margin of safety (MS)</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Earnings per share (EPS) sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Current market price (CMP) and Margin of safety (MS) barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Current market price (CMP) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Earnings per share (EPS), Expected annual growth rate (g) and Corporate bond yield (Y) and the number you are missing is Current market price (CMP) and Intrinsic value per share (V).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/simple-interest">Simple interest</a>, <a href="/finance/simple-mortgage">Simple mortgage Calculator</a> and <a href="/finance/sinking-fund">Sinking fund Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Intrinsic value calculator work out?', 'a' => <<<'TXT'
            Current market price (CMP), Intrinsic value per share (V) and Margin of safety (MS), from Earnings per share (EPS), Expected annual growth rate (g) and Corporate bond yield (Y). The relationship is Intrinsic value per share (V) = (11 ÷ 5) × Earnings per share (EPS) × (4 × Expected annual growth rate (g) + 17) ÷ Corporate bond yield (Y).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Earnings per share (EPS) (USD), Expected annual growth rate (g) (%), Corporate bond yield (Y) (%). Fill earnings per share (EPS), expected annual growth rate (g) and corporate bond yield (Y) and leave Current market price (CMP) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Intrinsic value per share (V), Corporate bond yield (Y), Earnings per share (EPS) and Expected annual growth rate (g) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Intrinsic value per share (V) = 9.17 USD. The figures come from Earnings per share (EPS) as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Current market price (CMP) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Earnings per share (EPS) blank and the page solves for it, reporting Current market price (CMP) instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Current market price (CMP) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/simple-interest', 'name' => 'Simple interest'],
            ['path' => '/finance/simple-mortgage', 'name' => 'Simple mortgage Calculator'],
            ['path' => '/finance/sinking-fund', 'name' => 'Sinking fund Calculator'],
        ],
        'authors' => [],
    ],
];

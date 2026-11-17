<?php

/**
 * Operating cash flow ratio
 * /finance/operating-cash-flow-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Operating cash flow ratio',
    'meta' => ['title' => 'Operating cash flow ratio — Formula & Results', 'description' => 'Operating cash flow ratio turns current liabilities, Operating cash flow Q4 and Operating cash flow Q3 into operating cash flow TTM. Every figure is computed.', 'h1' => 'Operating cash flow ratio Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Current_liabilities',
                            'label' => 'Current liabilities',
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
                            'name' => 'Operating_cash_flow_TTM',
                            'label' => 'Operating cash flow TTM',
                            'type' => 'number',
                            'help' => 'TTM stands for trailing twelve months, i.e., the results of the past twelve months or four quarters have to be included.',
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
                            'name' => 'Operating_cash_flow_ratio',
                            'label' => 'Operating cash flow ratio',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'Operating_cash_flow_ratio<= 0.5', 'text' => 'Your company looks to be in financial distress. Better analyze its interest coverage ratio.'],
                                ['when' => 'Operating_cash_flow_ratio<=1 and Operating_cash_flow_ratio>0.5', 'text' => 'Your company looks to be partially covering its current liabilities with asset rotation. For more detail, better analyze its current ratio and its quick ratio.'],
                                ['when' => 'Operating_cash_flow_ratio >1', 'text' => 'Your company looks to be doing great. We recommend you check its free cash flow for future projections.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Operating cash flow TTM calculation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Operating_cash_flow_4',
                            'label' => 'Operating cash flow Q4',
                            'type' => 'number',
                            'help' => 'We can consider this quarter value as the most recent operating cash flow provided by the company in its quarterly reports.',
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
                            'name' => 'Operating_cash_flow_3',
                            'label' => 'Operating cash flow Q3',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            Considering Operating cash flow Q4 is the most recent quarterly value presented by the company, this variable shall be one quarter before, meaning that it was presented at least three months ago from the present time.
                            TXT,
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
                            'name' => 'Operating_cash_flow_2',
                            'label' => 'Operating cash flow Q2',
                            'type' => 'number',
                            'help' => 'Like Operating cash flow Q3, this value shall be from the company report issued at least six months ago.',
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
                            'name' => 'Operating_cash_flow_1',
                            'label' => 'Operating cash flow Q1',
                            'type' => 'number',
                            'help' => 'Similar to Operating cash flow Q2, this value shall be from the company report issued at least nine months ago.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Operating_cash_flow_ratio=Operating_cash_flow_TTM/Current_liabilities',
            'results' => ['Operating_cash_flow_ratio' => 'Operating_cash_flow_TTM/Current_liabilities', 'Operating_cash_flow_TTM' => 'Current_liabilities*Operating_cash_flow_ratio', 'Current_liabilities' => 'Operating_cash_flow_TTM/Operating_cash_flow_ratio'],
        ],
        [
            'title' => 'Operating_cash_flow_TTM = Operating_cash_flow_4+Operating_cash_flow_3+Operating_cash_flow_2+Operating_cash_flow_1',
            'results' => [
                'Operating_cash_flow_3' => '-Operating_cash_flow_1 - Operating_cash_flow_2 - Operating_cash_flow_4 + Operating_cash_flow_TTM',
                'Operating_cash_flow_4' => '-Operating_cash_flow_1 - Operating_cash_flow_2 - Operating_cash_flow_3 + Operating_cash_flow_TTM',
                'Operating_cash_flow_TTM' => 'Operating_cash_flow_1 + Operating_cash_flow_2 + Operating_cash_flow_3 + Operating_cash_flow_4',
                'Operating_cash_flow_2' => '-Operating_cash_flow_1 - Operating_cash_flow_3 - Operating_cash_flow_4 + Operating_cash_flow_TTM',
                'Operating_cash_flow_1' => '-Operating_cash_flow_2 - Operating_cash_flow_3 - Operating_cash_flow_4 + Operating_cash_flow_TTM',
            ],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Operating cash flow ratio turns Current liabilities and Operating cash flow TTM into Operating cash flow ratio and Operating cash flow Q4. The arithmetic is the whole method: operating cash flow ratio is worked out from current liabilities by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Operating cash flow ratio calculator works', 'html' => <<<'TXT'
            <p>The Operating cash flow ratio calculator applies one relationship to 2 numbers and reports Operating cash flow ratio, Operating cash flow Q4 and Operating cash flow Q3.</p><p>The relationship it solves reads Operating cash flow ratio = Operating cash flow TTM ÷ Current liabilities.</p><p>The answers are Operating cash flow ratio, Operating cash flow Q4, Operating cash flow Q3 and Operating cash flow Q2; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Current liabilities</strong> — in USD</li><li><strong>Operating cash flow TTM</strong> — in USD. TTM stands for trailing twelve months, i.e., the results of the past twelve months or four quarters have to be included.</li></ul><p>The result boxes are Operating cash flow ratio, Operating cash flow Q4 in USD, Operating cash flow Q3 in USD, Operating cash flow Q2 in USD, Operating cash flow Q1 in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Current liabilities = 10 USD, Operating cash flow TTM = 100 USD, Operating cash flow Q4 = 1000 USD, Operating cash flow Q3 = 10 USD, Operating cash flow Q2 = 100 USD and Operating cash flow Q1 = 1000 USD — through the same formula and the panel reports <strong>Operating cash flow ratio</strong> = 10.</p><ul><li><strong>Operating cash flow ratio</strong> = 10</li></ul><p>The line behind those figures is <strong>Operating cash flow ratio</strong> = <code>Operating cash flow TTM ÷ Current liabilities</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Operating cash flow ratio</strong> = 10 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Operating cash flow ratio takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Operating cash flow ratio</strong> = <code>Operating cash flow TTM ÷ Current liabilities</code></li><li><strong>Operating cash flow TTM</strong> = <code>Current liabilities × Operating cash flow ratio</code></li><li><strong>Current liabilities</strong> = <code>Operating cash flow TTM ÷ Operating cash flow ratio</code></li><li><strong>Operating cash flow Q3</strong> = <code>− Operating cash flow Q1 − Operating cash flow Q2 − Operating cash flow Q4 + Operating cash flow TTM</code></li><li><strong>Operating cash flow Q4</strong> = <code>− Operating cash flow Q1 − Operating cash flow Q2 − Operating cash flow Q3 + Operating cash flow TTM</code></li><li><strong>Operating cash flow Q2</strong> = <code>− Operating cash flow Q1 − Operating cash flow Q3 − Operating cash flow Q4 + Operating cash flow TTM</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Operating cash flow ratio</strong> = <code>Operating cash flow TTM ÷ Current liabilities</code> — the form to use when Operating cash flow TTM and Current liabilities are the values you have.</li><li><strong>Operating cash flow TTM</strong> = <code>Current liabilities × Operating cash flow ratio</code> — the form to use when Current liabilities and Operating cash flow ratio are the values you have.</li><li><strong>Current liabilities</strong> = <code>Operating cash flow TTM ÷ Operating cash flow ratio</code> — the form to use when Operating cash flow TTM and Operating cash flow ratio are the values you have.</li><li><strong>Operating cash flow TTM</strong> = <code>Operating cash flow Q1 + Operating cash flow Q2 + Operating cash flow Q3 + Operating cash flow Q4</code> — the form to use when Operating cash flow Q1, Operating cash flow Q2, Operating cash flow Q3 and Operating cash flow Q4 are the values you have.</li><li><strong>Operating cash flow Q3</strong> = <code>− Operating cash flow Q1 − Operating cash flow Q2 − Operating cash flow Q4 + Operating cash flow TTM</code> — the form to use when Operating cash flow Q1, Operating cash flow Q2, Operating cash flow Q4 and Operating cash flow TTM are the values you have.</li><li><strong>Operating cash flow Q4</strong> = <code>− Operating cash flow Q1 − Operating cash flow Q2 − Operating cash flow Q3 + Operating cash flow TTM</code> — the form to use when Operating cash flow Q1, Operating cash flow Q2, Operating cash flow Q3 and Operating cash flow TTM are the values you have.</li><li><strong>Operating cash flow Q2</strong> = <code>− Operating cash flow Q1 − Operating cash flow Q3 − Operating cash flow Q4 + Operating cash flow TTM</code> — the form to use when Operating cash flow Q1, Operating cash flow Q3, Operating cash flow Q4 and Operating cash flow TTM are the values you have.</li><li><strong>Operating cash flow Q1</strong> = <code>− Operating cash flow Q2 − Operating cash flow Q3 − Operating cash flow Q4 + Operating cash flow TTM</code> — the form to use when Operating cash flow Q2, Operating cash flow Q3, Operating cash flow Q4 and Operating cash flow TTM are the values you have.</li></ul><p>Any one of Operating cash flow ratio, Operating cash flow TTM and Current liabilities can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Current liabilities, from 10 to 20 — and the answers go from <strong>Operating cash flow ratio</strong> 10 to <strong>Operating cash flow ratio</strong> 5.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Operating cash flow ratio, Operating cash flow Q4 and Operating cash flow Q3 are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Current liabilities left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Current liabilities is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Operating cash flow TTM left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Operating cash flow TTM is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Current liabilities is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Operating cash flow ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Current liabilities</strong> takes a plain number with no unit attached. The page reads it when it works out Operating cash flow ratio and Operating cash flow TTM. Fill it from a measurement rather than a memory — Current liabilities is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Operating cash flow TTM</strong> takes a plain number with no unit attached. TTM stands for trailing twelve months, i.e., the results of the past twelve months or four quarters have to be included. The page reads it when it works out Operating cash flow ratio, Current liabilities and Operating cash flow Q3. Fill it from a measurement rather than a memory — Operating cash flow TTM is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Operating cash flow ratio</strong> is a plain number and the page's own defaults put it at 10. The value follows from Operating cash flow TTM and Current liabilities. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Operating cash flow Q4</strong> is a plain number. The value follows from Operating cash flow Q1, Operating cash flow Q2, Operating cash flow Q3 and Operating cash flow TTM. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Operating cash flow Q3</strong> is a plain number. The value follows from Operating cash flow Q1, Operating cash flow Q2, Operating cash flow Q4 and Operating cash flow TTM. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Operating cash flow Q2</strong> is a plain number. The value follows from Operating cash flow Q1, Operating cash flow Q3, Operating cash flow Q4 and Operating cash flow TTM. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Operating cash flow Q1</strong> is a plain number. The value follows from Operating cash flow Q2, Operating cash flow Q3, Operating cash flow Q4 and Operating cash flow TTM. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Operating cash flow ratio</th></tr></thead><tbody><tr><td><strong>Current liabilities</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Operating cash flow TTM</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Operating cash flow Q4</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Operating cash flow Q3</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Operating cash flow Q2</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Operating cash flow Q1</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Operating cash flow TTM sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Operating cash flow Q4, Operating cash flow Q3 and Operating cash flow Q2 barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Current liabilities = 5 USD, Operating cash flow TTM = 50 USD, Operating cash flow Q4 = 500 USD, Operating cash flow Q3 = 5 USD, Operating cash flow Q2 = 50 USD and Operating cash flow Q1 = 500 USD and the page reports <strong>Operating cash flow ratio</strong> = 10.</li><li>Feed in Current liabilities = 30 USD, Operating cash flow TTM = 100 USD, Operating cash flow Q4 = 1000 USD, Operating cash flow Q3 = 10 USD, Operating cash flow Q2 = 100 USD and Operating cash flow Q1 = 1000 USD and the page reports <strong>Operating cash flow ratio</strong> = 3.33.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Operating cash flow ratio follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Current liabilities and Operating cash flow TTM measured, Operating cash flow ratio and Operating cash flow Q4 wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/money-multiplier">Money multiplier Calculator</a>, <a href="/finance/money-per-hour">Money per hour Calculator</a> and <a href="/finance/money-supply">Money supply Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Operating cash flow ratio calculator work out?', 'a' => <<<'TXT'
            Operating cash flow ratio, Operating cash flow Q4, Operating cash flow Q3 and Operating cash flow Q2, from Operating cash flow TTM and Current liabilities. The relationship is Operating cash flow ratio = Operating cash flow TTM ÷ Current liabilities.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current liabilities (USD), Operating cash flow TTM (USD). Enter current liabilities and operating cash flow TTM; Operating cash flow ratio is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Operating cash flow ratio, Operating cash flow TTM, Current liabilities and Operating cash flow Q3 blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Operating cash flow ratio = 10. That comes from the page\'s own defaults, entered in Current liabilities; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Operating cash flow ratio is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Current liabilities blank and the page solves for it, reporting Operating cash flow ratio instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Operating cash flow ratio at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/money-multiplier', 'name' => 'Money multiplier Calculator'],
            ['path' => '/finance/money-per-hour', 'name' => 'Money per hour Calculator'],
            ['path' => '/finance/money-supply', 'name' => 'Money supply Calculator'],
        ],
        'authors' => [],
    ],
];

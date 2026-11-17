<?php

/**
 * CPM
 * /finance/cpm
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'CPM',
    'meta' => ['title' => 'CPM Calculator — Free, With Worked Examples', 'description' => 'CPM takes total cost of a campaign and returns cost per 1000 impressions (CPM). Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'CPM Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost_1',
                            'label' => 'Total cost of a campaign',
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
                            'name' => 'CPM_1',
                            'label' => 'Cost per 1000 impressions (CPM)',
                            'type' => 'number',
                            'help' => 'Cost per mille (1000): what will it cost to get a thousand impressions?',
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
                            'name' => 'impressions_1',
                            'label' => 'Number of impressions',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Use the expandable menu below (Second campaign) to compare the costs of the two campaigns. For more useful online business tools, check out our CPC calculator as well.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Second campaign',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost_2',
                            'label' => 'Total cost of a campaign',
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
                            'name' => 'CPM_2',
                            'label' => 'Cost per 1000 impressions (CPM)',
                            'type' => 'number',
                            'help' => 'Cost per mille (1000): what will it cost to get a thousand impressions?',
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
                            'name' => 'impressions_2',
                            'label' => 'Number of impressions',
                            'type' => 'number',
                            'suffix' => ' impressions',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'CPM_1 > CPM_2', 'text' => 'Campaign 2 is less expensive.'],
                                ['when' => 'CPM_1 < CPM_2', 'text' => 'Campaign 1 is less expensive.'],
                                ['when' => 'CPM_1 == CPM_2', 'text' => 'The campaigns cost the same.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'cost_1/(impressions_1/1000) = CPM_1',
            'results' => ['cost_1' => '(1/1000)*CPM_1*impressions_1', 'impressions_1' => '1000*cost_1/CPM_1', 'CPM_1' => '1000*cost_1/impressions_1'],
        ],
        [
            'title' => 'cost_2/(impressions_2/1000) = CPM_2',
            'results' => ['CPM_2' => '1000*cost_2/impressions_2', 'impressions_2' => '1000*cost_2/CPM_2', 'cost_2' => '(1/1000)*CPM_2*impressions_2'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        CPM converts between total cost of a campaign and cost per 1000 impressions (CPM): put a value in either box and the other one is worked out. Total cost of a campaign is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the CPM calculator works', 'html' => <<<'TXT'
            <p>The CPM calculator applies one relationship to 2 numbers and reports Total cost of a campaign, Total cost of a campaign and Cost per 1000 impressions (CPM).</p><p>Written with the labels from the form, Total cost of a campaign = (1 ÷ 1000) × Cost per 1000 impressions (CPM) × Number of impressions.</p><p>What comes back is Total cost of a campaign, Total cost of a campaign, Cost per 1000 impressions (CPM) and Number of impressions — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Cost per 1000 impressions (CPM)</strong> — in USD. Cost per mille (1000): what will it cost to get a thousand impressions?</li><li><strong>Number of impressions</strong> — a plain number, no unit</li></ul><p>What you get back is Total cost of a campaign in USD, Total cost of a campaign in USD, Cost per 1000 impressions (CPM) in USD, Number of impressions in impressions, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Cost per 1000 impressions (CPM) = 10 USD, Number of impressions = 100, Total cost of a campaign = 1000 USD, Cost per 1000 impressions (CPM) = 10 USD and Number of impressions = 100 impressions — through the same formula and the panel reports <strong>Total cost of a campaign</strong> = 1 USD.</p><ul><li><strong>Total cost of a campaign</strong> = 1 USD</li></ul><p>That is <strong>Total cost of a campaign</strong> = <code>(1 ÷ 1000) × Cost per 1000 impressions (CPM) × Number of impressions</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Total cost of a campaign</strong> = 1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Total cost of a campaign takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total cost of a campaign</strong> = <code>(1 ÷ 1000) × Cost per 1000 impressions (CPM) × Number of impressions</code></li><li><strong>Number of impressions</strong> = <code>1000 × Total cost of a campaign ÷ Cost per 1000 impressions (CPM)</code></li><li><strong>Cost per 1000 impressions (CPM)</strong> = <code>1000 × Total cost of a campaign ÷ Number of impressions</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total cost of a campaign</strong> = <code>(1 ÷ 1000) × Cost per 1000 impressions (CPM) × Number of impressions</code> — the form to use when Cost per 1000 impressions (CPM) and Number of impressions are the values you have.</li><li><strong>Number of impressions</strong> = <code>1000 × Total cost of a campaign ÷ Cost per 1000 impressions (CPM)</code> — the form to use when Total cost of a campaign and Cost per 1000 impressions (CPM) are the values you have.</li><li><strong>Cost per 1000 impressions (CPM)</strong> = <code>1000 × Total cost of a campaign ÷ Number of impressions</code> — the form to use when Total cost of a campaign and Number of impressions are the values you have.</li><li><strong>Cost per 1000 impressions (CPM)</strong> = <code>1000 × Total cost of a campaign ÷ Number of impressions</code> — the form to use when Total cost of a campaign and Number of impressions are the values you have.</li><li><strong>Number of impressions</strong> = <code>1000 × Total cost of a campaign ÷ Cost per 1000 impressions (CPM)</code> — the form to use when Total cost of a campaign and Cost per 1000 impressions (CPM) are the values you have.</li><li><strong>Total cost of a campaign</strong> = <code>(1 ÷ 1000) × Cost per 1000 impressions (CPM) × Number of impressions</code> — the form to use when Cost per 1000 impressions (CPM) and Number of impressions are the values you have.</li></ul><p>Any one of Total cost of a campaign, Number of impressions and Cost per 1000 impressions (CPM) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Cost per 1000 impressions (CPM), from 10 to 20 — and the answers go from <strong>Total cost of a campaign</strong> 1 USD to <strong>Total cost of a campaign</strong> 2 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total cost of a campaign, Total cost of a campaign and Cost per 1000 impressions (CPM) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Cost per 1000 impressions (CPM) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cost per 1000 impressions (CPM) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of impressions left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of impressions is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Cost per 1000 impressions (CPM) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Cost per 1000 impressions (CPM)</strong> takes a plain number with no unit attached. Cost per mille (1000): what will it cost to get a thousand impressions?. It feeds Total cost of a campaign and Number of impressions. Have it to hand before you start: Cost per 1000 impressions (CPM) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of impressions</strong> takes a plain number with no unit attached. It feeds Total cost of a campaign and Cost per 1000 impressions (CPM). Have it to hand before you start: Number of impressions is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Total cost of a campaign</strong> is a plain number and the page's own defaults put it at 1. The value follows from Cost per 1000 impressions (CPM) and Number of impressions. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total cost of a campaign</strong> is a plain number. The value follows from Cost per 1000 impressions (CPM) and Number of impressions. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Cost per 1000 impressions (CPM)</strong> is a plain number. The value follows from Total cost of a campaign and Number of impressions. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Number of impressions</strong> is a plain number. The value follows from Total cost of a campaign and Cost per 1000 impressions (CPM). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total cost of a campaign</th></tr></thead><tbody><tr><td><strong>Cost per 1000 impressions (CPM)</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Number of impressions</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Total cost of a campaign</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Cost per 1000 impressions (CPM)</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Number of impressions</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Number of impressions sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Total cost of a campaign, Cost per 1000 impressions (CPM) and Number of impressions barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Cost per 1000 impressions (CPM) = 5 USD, Number of impressions = 50, Total cost of a campaign = 500 USD, Cost per 1000 impressions (CPM) = 5 USD and Number of impressions = 50 impressions, the answer is <strong>Total cost of a campaign</strong> = 0.25 USD.</li><li>With Cost per 1000 impressions (CPM) = 30 USD, Number of impressions = 100, Total cost of a campaign = 1000 USD, Cost per 1000 impressions (CPM) = 10 USD and Number of impressions = 100 impressions, the answer is <strong>Total cost of a campaign</strong> = 3 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Total cost of a campaign follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Cost per 1000 impressions (CPM) and Number of impressions is what you already know and Total cost of a campaign and Total cost of a campaign is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/impermanent-loss">Impermanent loss</a>, <a href="/finance/income-elasticity-demand">Income elasticity of demand Calculator</a> and <a href="/finance/income-tax-pakistan">Income tax - Pakistan</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the CPM calculator work out?', 'a' => <<<'TXT'
            Total cost of a campaign, Total cost of a campaign, Cost per 1000 impressions (CPM) and Number of impressions, from Cost per 1000 impressions (CPM) and Number of impressions. The relationship is Total cost of a campaign = (1 ÷ 1000) × Cost per 1000 impressions (CPM) × Number of impressions.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cost per 1000 impressions (CPM) (USD), Number of impressions. Fill cost per 1000 impressions (CPM) and number of impressions and leave Total cost of a campaign empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total cost of a campaign, Number of impressions, Cost per 1000 impressions (CPM) and Cost per 1000 impressions (CPM) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Total cost of a campaign = 1 USD. The figures come from Cost per 1000 impressions (CPM) as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Total cost of a campaign is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Cost per 1000 impressions (CPM) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Total cost of a campaign keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/impermanent-loss', 'name' => 'Impermanent loss'],
            ['path' => '/finance/income-elasticity-demand', 'name' => 'Income elasticity of demand Calculator'],
            ['path' => '/finance/income-tax-pakistan', 'name' => 'Income tax - Pakistan'],
        ],
        'authors' => [],
    ],
];

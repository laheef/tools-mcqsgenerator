<?php

/**
 * Working capital turnover ratio
 * /finance/working-capital-turnover-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Working capital turnover ratio',
    'meta' => ['title' => 'Working capital turnover ratio — Formula & Results', 'description' => 'Working capital turnover ratio works out average current assets and average current liabilities from opening current assets and closing current assets.', 'h1' => 'Working capital turnover ratio Calculator', 'updated' => '2026-09-19'],
    'sections' => [
        [
            'title' => 'Average current assets',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'begin_assets',
                            'label' => 'Opening current assets',
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
                            'name' => 'end_assets',
                            'label' => 'Closing current assets',
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
                            'name' => 'avg_assets',
                            'label' => 'Average current assets',
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
            'title' => 'Average current liabilities',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'begin_liabilities',
                            'label' => 'Opening current liabilities',
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
                            'name' => 'end_liabilities',
                            'label' => 'Closing current liabilities',
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
                            'name' => 'avg_liabilities',
                            'label' => 'Average current liabilities',
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
            'title' => 'Working capital turnover',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_working_capital',
                            'label' => 'Average working capital',
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
                            'name' => 'revenue',
                            'label' => 'Revenue',
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
                            'name' => 'working_capital_turnover',
                            'label' => 'Working capital turnover',
                            'type' => 'number',
                            'suffix' => 'x',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'avg_assets = (begin_assets + end_assets) / 2',
            'results' => ['end_assets' => '2*avg_assets - begin_assets', 'avg_assets' => '(1/2)*begin_assets + (1/2)*end_assets', 'begin_assets' => '2*avg_assets - end_assets'],
        ],
        [
            'title' => 'avg_liabilities = (begin_liabilities + end_liabilities) / 2',
            'results' => ['avg_liabilities' => '(1/2)*begin_liabilities + (1/2)*end_liabilities', 'end_liabilities' => '2*avg_liabilities - begin_liabilities', 'begin_liabilities' => '2*avg_liabilities - end_liabilities'],
        ],
        [
            'title' => 'average_working_capital = avg_assets - avg_liabilities',
            'results' => ['avg_liabilities' => '-average_working_capital + avg_assets', 'average_working_capital' => 'avg_assets - avg_liabilities', 'avg_assets' => 'average_working_capital + avg_liabilities'],
        ],
        [
            'title' => 'working_capital_turnover = revenue / average_working_capital',
            'results' => ['average_working_capital' => 'revenue/working_capital_turnover', 'revenue' => 'average_working_capital*working_capital_turnover', 'working_capital_turnover' => 'revenue/average_working_capital'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Working capital turnover ratio turns Opening current assets and Closing current assets into Average current assets and Opening current liabilities. It is a single relationship that reads average current assets out of opening current assets, not a table of canned results keyed by them. Units for Average current assets default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Working capital turnover ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Working capital turnover ratio: it takes 2 numbers and reports Average current assets, Opening current liabilities and Closing current liabilities.</p><p>The relationship it solves reads Average current assets = (1 ÷ 2) × Opening current assets + (1 ÷ 2) × Closing current assets.</p><p>What comes back is Average current assets, Opening current liabilities, Closing current liabilities and Average current liabilities — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Opening current assets</strong> — in USD</li><li><strong>Closing current assets</strong> — in USD</li></ul><p>The answers come back as Average current assets in USD, Opening current liabilities in USD, Closing current liabilities in USD, Average current liabilities in USD, Average working capital in USD, Revenue in USD, Working capital turnover in x. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Opening current assets = 10 USD, Closing current assets = 100 USD, Opening current liabilities = 1000 USD, Closing current liabilities = 10 USD, Average current liabilities = 100 USD, Average working capital = 1000 USD, Revenue = 10 USD and Working capital turnover = 100 x — through the same formula and the panel reports <strong>Average current assets</strong> = 55 USD.</p><ul><li><strong>Average current assets</strong> = 55 USD</li></ul><p>That is <strong>Average current assets</strong> = <code>(1 ÷ 2) × Opening current assets + (1 ÷ 2) × Closing current assets</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Average current assets</strong> = 55 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Average current assets takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Average current assets</strong> = <code>(1 ÷ 2) × Opening current assets + (1 ÷ 2) × Closing current assets</code></li><li><strong>Closing current assets</strong> = <code>2 × Average current assets − Opening current assets</code></li><li><strong>Opening current assets</strong> = <code>2 × Average current assets − Closing current assets</code></li><li><strong>Average current liabilities</strong> = <code>(1 ÷ 2) × Opening current liabilities + (1 ÷ 2) × Closing current liabilities</code></li><li><strong>Closing current liabilities</strong> = <code>2 × Average current liabilities − Opening current liabilities</code></li><li><strong>Opening current liabilities</strong> = <code>2 × Average current liabilities − Closing current liabilities</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Average current assets</strong> = <code>(1 ÷ 2) × Opening current assets + (1 ÷ 2) × Closing current assets</code> — the form to use when Opening current assets and Closing current assets are the values you have.</li><li><strong>Closing current assets</strong> = <code>2 × Average current assets − Opening current assets</code> — the form to use when Average current assets and Opening current assets are the values you have.</li><li><strong>Opening current assets</strong> = <code>2 × Average current assets − Closing current assets</code> — the form to use when Average current assets and Closing current assets are the values you have.</li><li><strong>Average current liabilities</strong> = <code>(1 ÷ 2) × Opening current liabilities + (1 ÷ 2) × Closing current liabilities</code> — the form to use when Opening current liabilities and Closing current liabilities are the values you have.</li><li><strong>Closing current liabilities</strong> = <code>2 × Average current liabilities − Opening current liabilities</code> — the form to use when Average current liabilities and Opening current liabilities are the values you have.</li><li><strong>Opening current liabilities</strong> = <code>2 × Average current liabilities − Closing current liabilities</code> — the form to use when Average current liabilities and Closing current liabilities are the values you have.</li><li><strong>Average working capital</strong> = <code>Average current assets − Average current liabilities</code> — the form to use when Average current assets and Average current liabilities are the values you have.</li><li><strong>Average current liabilities</strong> = <code>− Average working capital + Average current assets</code> — the form to use when Average working capital and Average current assets are the values you have.</li></ul><p>Any one of Average current assets, Closing current assets and Opening current assets can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Opening current assets from 10 to 20, leaving every other box alone. The panel moves from <strong>Average current assets</strong> 55 USD to <strong>Average current assets</strong> 60 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Average current assets, Opening current liabilities and Closing current liabilities are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Opening current assets left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Opening current assets is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Closing current assets left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Closing current assets is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Opening current assets to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Opening current assets</strong> takes a plain number with no unit attached. It feeds Closing current assets and Average current assets. Have it to hand before you start: Opening current assets is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Closing current assets</strong> takes a plain number with no unit attached. It feeds Average current assets and Opening current assets. Have it to hand before you start: Closing current assets is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Average current assets</strong> is a plain number and the page's own defaults put it at 55. The value follows from Opening current assets and Closing current assets. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Opening current liabilities</strong> is a plain number. The value follows from Average current liabilities and Closing current liabilities. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Closing current liabilities</strong> is a plain number. The value follows from Average current liabilities and Opening current liabilities. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Average current liabilities</strong> is a plain number. The value follows from Opening current liabilities and Closing current liabilities. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Average working capital</strong> is a plain number. The value follows from Average current assets and Average current liabilities. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Revenue</strong> is a plain number. The value follows from Average working capital and Working capital turnover. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Working capital turnover</strong> is a plain number. The value follows from Revenue and Average working capital. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Average current assets</th></tr></thead><tbody><tr><td><strong>Opening current assets</strong> +10%</td><td>+0.91%</td></tr><tr><td><strong>Closing current assets</strong> +10%</td><td>+9.09%</td></tr><tr><td><strong>Opening current liabilities</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Closing current liabilities</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Average current liabilities</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Average working capital</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Revenue</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Working capital turnover</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Closing current assets sits at the top — a ten per cent error in that box shows up as roughly 9.1 per cent in the answer. By contrast, Opening current liabilities, Closing current liabilities and Average current liabilities barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Opening current assets = 5 USD, Closing current assets = 50 USD, Opening current liabilities = 500 USD, Closing current liabilities = 5 USD, Average current liabilities = 50 USD, Average working capital = 500 USD, Revenue = 5 USD and Working capital turnover = 50 x, the answer is <strong>Average current assets</strong> = 27.5 USD.</li><li>With Opening current assets = 30 USD, Closing current assets = 100 USD, Opening current liabilities = 1000 USD, Closing current liabilities = 10 USD, Average current liabilities = 100 USD, Average working capital = 1000 USD, Revenue = 10 USD and Working capital turnover = 100 x, the answer is <strong>Average current assets</strong> = 65 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Average current assets follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Opening current assets and Closing current assets are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Opening current assets and Closing current assets measured, Average current assets and Opening current liabilities wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/american-rescue-plan">Stimulus check - American Rescue Plan Calculator</a>, <a href="/finance/stimulus-heals-vs-heroes">Stimulus check - CAAF vs. HEALS vs. HEROES Calculator</a> and <a href="/finance/stimulus-check-heals">Stimulus check - HEALS Act Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Working capital turnover ratio calculator work out?', 'a' => <<<'TXT'
            Average current assets, Opening current liabilities, Closing current liabilities and Average current liabilities, from Opening current assets and Closing current assets. The relationship is Average current assets = (1 ÷ 2) × Opening current assets + (1 ÷ 2) × Closing current assets.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Opening current assets (USD), Closing current assets (USD). Enter opening current assets and closing current assets; Average current assets is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Average current assets, Closing current assets, Opening current assets and Average current liabilities blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Average current assets = 55 USD. That comes from the page\'s own defaults, entered in Opening current assets; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Average current assets is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Opening current assets left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Average current assets keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/american-rescue-plan', 'name' => 'Stimulus check - American Rescue Plan Calculator'],
            ['path' => '/finance/stimulus-heals-vs-heroes', 'name' => 'Stimulus check - CAAF vs. HEALS vs. HEROES Calculator'],
            ['path' => '/finance/stimulus-check-heals', 'name' => 'Stimulus check - HEALS Act Calculator'],
        ],
        'authors' => [],
    ],
];

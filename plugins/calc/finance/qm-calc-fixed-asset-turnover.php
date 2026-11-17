<?php

/**
 * Fixed asset turnover
 * /finance/fixed-asset-turnover
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fixed asset turnover',
    'meta' => ['title' => 'Fixed asset turnover — Free Online Calculator', 'description' => 'Fixed asset turnover turns starting fixed assets and final fixed assets into average fixed assets. Every box can be solved for, not only the one in the title.', 'h1' => 'Fixed asset turnover Calculator', 'updated' => '2026-09-19'],
    'sections' => [
        [
            'title' => 'Average fixed assets',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'starting_fixed_assets',
                            'label' => 'Starting fixed assets',
                            'type' => 'number',
                            'help' => 'Fixed assets at the start of the balance sheet period.',
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
                            'name' => 'final_fixed_assets',
                            'label' => 'Final fixed assets',
                            'type' => 'number',
                            'help' => 'Fixed assets at the end of the balance sheet period.',
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
                            'name' => 'avg_fixed_assets',
                            'label' => 'Average fixed assets',
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
            'title' => 'Fixed asset turnover (FAT)',
            'note' => '',
            'blocks' => [
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
                            'name' => 'fixed_asset_turnover',
                            'label' => 'Fixed asset turnover (FAT)',
                            'type' => 'number',
                            'suffix' => 'x',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'fixed_asset_turnover = revenue / avg_fixed_assets',
            'results' => ['avg_fixed_assets' => 'revenue/fixed_asset_turnover', 'fixed_asset_turnover' => 'revenue/avg_fixed_assets', 'revenue' => 'avg_fixed_assets*fixed_asset_turnover'],
        ],
        [
            'title' => 'avg_fixed_assets = (starting_fixed_assets + final_fixed_assets) / 2',
            'results' => ['avg_fixed_assets' => '(1/2)*final_fixed_assets + (1/2)*starting_fixed_assets', 'final_fixed_assets' => '2*avg_fixed_assets - starting_fixed_assets', 'starting_fixed_assets' => '2*avg_fixed_assets - final_fixed_assets'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Fixed asset turnover takes Average fixed assets and Revenue and returns Starting fixed assets and Final fixed assets. There is no hidden constant here: change starting fixed assets and average fixed assets moves with it. The main result, Starting fixed assets, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Fixed asset turnover calculator works', 'html' => <<<'TXT'
            <p>The Fixed asset turnover calculator applies one relationship to 2 numbers and reports Starting fixed assets, Final fixed assets and Fixed asset turnover (FAT).</p><p>Written with the labels from the form, Fixed asset turnover (FAT) = Revenue ÷ Average fixed assets.</p><p>The answers are Starting fixed assets, Final fixed assets and Fixed asset turnover (FAT); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Average fixed assets</strong> — in USD</li><li><strong>Revenue</strong> — in USD</li></ul><p>The answers come back as Starting fixed assets in USD, Final fixed assets in USD, Fixed asset turnover (FAT) in x. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Starting fixed assets = 10 USD, Final fixed assets = 100 USD, Revenue = 1000 USD and Fixed asset turnover (FAT) = 10 x — through the same formula and the panel reports <strong>Average fixed assets</strong> = 100 USD.</p><ul><li><strong>Average fixed assets</strong> = 100 USD</li></ul><p>The line behind those figures is <strong>Fixed asset turnover (FAT)</strong> = <code>Revenue ÷ Average fixed assets</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Average fixed assets</strong> = 100 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Starting fixed assets takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Fixed asset turnover (FAT)</strong> = <code>Revenue ÷ Average fixed assets</code></li><li><strong>Average fixed assets</strong> = <code>Revenue ÷ Fixed asset turnover (FAT)</code></li><li><strong>Revenue</strong> = <code>Average fixed assets × Fixed asset turnover (FAT)</code></li><li><strong>Final fixed assets</strong> = <code>2 × Average fixed assets − Starting fixed assets</code></li><li><strong>Starting fixed assets</strong> = <code>2 × Average fixed assets − Final fixed assets</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Fixed asset turnover (FAT)</strong> = <code>Revenue ÷ Average fixed assets</code> — the form to use when Revenue and Average fixed assets are the values you have.</li><li><strong>Average fixed assets</strong> = <code>Revenue ÷ Fixed asset turnover (FAT)</code> — the form to use when Revenue and Fixed asset turnover (FAT) are the values you have.</li><li><strong>Revenue</strong> = <code>Average fixed assets × Fixed asset turnover (FAT)</code> — the form to use when Average fixed assets and Fixed asset turnover (FAT) are the values you have.</li><li><strong>Average fixed assets</strong> = <code>(1 ÷ 2) × Final fixed assets + (1 ÷ 2) × Starting fixed assets</code> — the form to use when Final fixed assets and Starting fixed assets are the values you have.</li><li><strong>Final fixed assets</strong> = <code>2 × Average fixed assets − Starting fixed assets</code> — the form to use when Average fixed assets and Starting fixed assets are the values you have.</li><li><strong>Starting fixed assets</strong> = <code>2 × Average fixed assets − Final fixed assets</code> — the form to use when Average fixed assets and Final fixed assets are the values you have.</li></ul><p>Any one of Fixed asset turnover (FAT), Average fixed assets and Revenue can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Starting fixed assets from 10 to 20, leaving every other box alone. The panel moves from <strong>Average fixed assets</strong> 100 USD to <strong>Average fixed assets</strong> 100 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Starting fixed assets, Final fixed assets and Fixed asset turnover (FAT) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Average fixed assets left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Average fixed assets is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Revenue left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Revenue is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Average fixed assets and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Fixed asset turnover form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Average fixed assets</strong> takes a plain number with no unit attached. It feeds Fixed asset turnover (FAT), Revenue and Final fixed assets. Fill it from a measurement rather than a memory — Average fixed assets is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Revenue</strong> takes a plain number with no unit attached. It feeds Average fixed assets and Fixed asset turnover (FAT). Fill it from a measurement rather than a memory — Revenue is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Starting fixed assets</strong> is a plain number. It is worked out from Average fixed assets and Final fixed assets. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Final fixed assets</strong> is a plain number. It is worked out from Average fixed assets and Starting fixed assets. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Fixed asset turnover (FAT)</strong> is a plain number. It is worked out from Revenue and Average fixed assets. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Average fixed assets</th></tr></thead><tbody><tr><td><strong>Starting fixed assets</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Final fixed assets</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Revenue</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Fixed asset turnover (FAT)</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Revenue sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Starting fixed assets and Final fixed assets barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Starting fixed assets = 5 USD, Final fixed assets = 50 USD, Revenue = 500 USD and Fixed asset turnover (FAT) = 5 x and the page reports <strong>Average fixed assets</strong> = 100 USD.</li><li>Feed in Starting fixed assets = 30 USD, Final fixed assets = 100 USD, Revenue = 1000 USD and Fixed asset turnover (FAT) = 10 x and the page reports <strong>Average fixed assets</strong> = 100 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Starting fixed assets follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Average fixed assets and Revenue are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Average fixed assets and Revenue and the number you are missing is Starting fixed assets and Final fixed assets.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/rv-loan">RV loan Calculator</a>, <a href="/finance/saas-ltv">SaaS lifetime value Calculator</a> and <a href="/finance/sabbatical">Sabbatical Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Fixed asset turnover is a number to act on, so the useful question is what to do with Starting fixed assets (USD), Final fixed assets (USD) and Fixed asset turnover (FAT) (x) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Average fixed assets and Revenue alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fixed asset turnover calculator work out?', 'a' => <<<'TXT'
            Starting fixed assets, Final fixed assets and Fixed asset turnover (FAT), from Revenue and Average fixed assets. The relationship is Fixed asset turnover (FAT) = Revenue ÷ Average fixed assets.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Average fixed assets (USD), Revenue (USD). With average fixed assets and revenue in place, Starting fixed assets can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Fixed asset turnover (FAT), Average fixed assets, Revenue and Final fixed assets blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Average fixed assets = 100 USD. That comes from the page\'s own defaults, entered in Average fixed assets; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Starting fixed assets is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Average fixed assets blank and the page solves for it, reporting Starting fixed assets instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Starting fixed assets keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/rv-loan', 'name' => 'RV loan Calculator'],
            ['path' => '/finance/saas-ltv', 'name' => 'SaaS lifetime value Calculator'],
            ['path' => '/finance/sabbatical', 'name' => 'Sabbatical Calculator'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * Total asset turnover
 * /finance/total-asset-turnover
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Total asset turnover',
    'meta' => ['title' => 'Total asset turnover: Formula, Steps & Results', 'description' => 'Total asset turnover works out average asset from beginning asset and ending asset. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Total asset turnover Calculator', 'updated' => '2026-09-19'],
    'sections' => [
        [
            'title' => 'Average asset',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beg_asset',
                            'label' => 'Beginning asset',
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
                            'name' => 'end_asset',
                            'label' => 'Ending asset',
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
                            'name' => 'avg_asset',
                            'label' => 'Average asset',
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
            'title' => 'Total asset turnover',
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
                            'name' => 'asset_turnover',
                            'label' => 'Total asset turnover',
                            'type' => 'number',
                            'suffix' => 'x',
                            'help' => 'Amount of revenue a company can generate per unit asset.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'asset_turnover = revenue / avg_asset',
            'results' => ['asset_turnover' => 'revenue/avg_asset', 'revenue' => 'asset_turnover*avg_asset', 'avg_asset' => 'revenue/asset_turnover'],
        ],
        [
            'title' => 'avg_asset = (beg_asset + end_asset) / 2',
            'results' => ['beg_asset' => '2*avg_asset - end_asset', 'end_asset' => '2*avg_asset - beg_asset', 'avg_asset' => '(1/2)*beg_asset + (1/2)*end_asset'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Average asset and Revenue into Total asset turnover and the answer comes back as Beginning asset and Ending asset. Nothing is looked up on this page: beginning asset is computed from average asset and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Beginning asset is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Total asset turnover calculator works', 'html' => <<<'TXT'
            <p>The Total asset turnover calculator applies one relationship to 2 numbers and reports Beginning asset, Ending asset and Total asset turnover.</p><p>The relationship it solves reads Total asset turnover = Revenue ÷ Average asset.</p><p>What comes back is Beginning asset, Ending asset and Total asset turnover — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Average asset</strong> — in USD</li><li><strong>Revenue</strong> — in USD</li></ul><p>What you get back is Beginning asset in USD, Ending asset in USD, Total asset turnover in x, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Beginning asset = 10 USD, Ending asset = 100 USD, Average asset = 1000 USD and Revenue = 10 USD — through the same formula and the panel reports <strong>Total asset turnover</strong> = 0.01 x.</p><ul><li><strong>Total asset turnover</strong> = 0.01 x</li></ul><p>That is <strong>Total asset turnover</strong> = <code>Revenue ÷ Average asset</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Total asset turnover</strong> = 0.01. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Beginning asset is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total asset turnover</strong> = <code>Revenue ÷ Average asset</code></li><li><strong>Revenue</strong> = <code>Total asset turnover × Average asset</code></li><li><strong>Average asset</strong> = <code>Revenue ÷ Total asset turnover</code></li><li><strong>Beginning asset</strong> = <code>2 × Average asset − Ending asset</code></li><li><strong>Ending asset</strong> = <code>2 × Average asset − Beginning asset</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total asset turnover</strong> = <code>Revenue ÷ Average asset</code> — the form to use when Revenue and Average asset are the values you have.</li><li><strong>Revenue</strong> = <code>Total asset turnover × Average asset</code> — the form to use when Total asset turnover and Average asset are the values you have.</li><li><strong>Average asset</strong> = <code>Revenue ÷ Total asset turnover</code> — the form to use when Revenue and Total asset turnover are the values you have.</li><li><strong>Average asset</strong> = <code>(1 ÷ 2) × Beginning asset + (1 ÷ 2) × Ending asset</code> — the form to use when Beginning asset and Ending asset are the values you have.</li><li><strong>Beginning asset</strong> = <code>2 × Average asset − Ending asset</code> — the form to use when Average asset and Ending asset are the values you have.</li><li><strong>Ending asset</strong> = <code>2 × Average asset − Beginning asset</code> — the form to use when Average asset and Beginning asset are the values you have.</li></ul><p>Any one of Total asset turnover, Revenue and Average asset can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Beginning asset, from 10 to 20 — and the answers go from <strong>Total asset turnover</strong> 0.01 x to <strong>Total asset turnover</strong> 0.01 x.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Beginning asset, Ending asset and Total asset turnover are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Average asset left as a guess.</strong> Anything typed into Average asset is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Revenue left as a guess.</strong> Anything typed into Revenue is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Average asset and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Average asset</strong> takes a plain number with no unit attached. The page reads it when it works out Total asset turnover, Revenue and Beginning asset. Have it to hand before you start: Average asset is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Revenue</strong> takes a plain number with no unit attached. The page reads it when it works out Total asset turnover and Average asset. Have it to hand before you start: Revenue is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Beginning asset</strong> is a plain number. It is worked out from Average asset and Ending asset. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Ending asset</strong> is a plain number. It is worked out from Average asset and Beginning asset. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total asset turnover</strong> is a plain number and the page's own defaults put it at 0.01. It is worked out from Revenue and Average asset. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total asset turnover</th></tr></thead><tbody><tr><td><strong>Beginning asset</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Ending asset</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Average asset</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Revenue</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Revenue: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Beginning asset and Ending asset barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Beginning asset = 5 USD, Ending asset = 50 USD, Average asset = 500 USD and Revenue = 5 USD, the answer is <strong>Total asset turnover</strong> = 0.01 x.</li><li>With Beginning asset = 30 USD, Ending asset = 100 USD, Average asset = 1000 USD and Revenue = 10 USD, the answer is <strong>Total asset turnover</strong> = 0.01 x.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Average asset and Revenue. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Average asset into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Beginning asset in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Beginning asset is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Average asset and Revenue are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Average asset and Revenue and the number you are missing is Beginning asset and Ending asset.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/basis-point">Basis point Calculator</a>, <a href="/finance/beta-stock">Beta stock</a> and <a href="/finance/bi-weekly-mortgage-payment">Bi-weekly mortgage payment Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Total asset turnover calculator work out?', 'a' => 'Beginning asset, Ending asset and Total asset turnover, from Revenue and Average asset. The relationship is Total asset turnover = Revenue ÷ Average asset.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Average asset (USD), Revenue (USD). Enter average asset and revenue; Beginning asset is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total asset turnover, Revenue, Average asset and Beginning asset blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Total asset turnover = 0.01 x. The figures come from Average asset as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Beginning asset is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Average asset left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Beginning asset keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/basis-point', 'name' => 'Basis point Calculator'],
            ['path' => '/finance/beta-stock', 'name' => 'Beta stock'],
            ['path' => '/finance/bi-weekly-mortgage-payment', 'name' => 'Bi-weekly mortgage payment Calculator'],
        ],
        'authors' => [],
    ],
];

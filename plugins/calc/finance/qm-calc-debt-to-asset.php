<?php

/**
 * Debt to asset ratio
 * /finance/debt-to-asset
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Debt to asset ratio',
    'meta' => ['title' => 'Debt to asset ratio: Formula, Steps & Results', 'description' => 'Debt to asset ratio works out total debt and debt to assets ratio and reports both. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Debt to asset ratio Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'long_term_debt',
                            'label' => 'Long-term debt',
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
                            'name' => 'short_term_debt',
                            'label' => 'Short-term debt',
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
                            'name' => 'total_debt',
                            'label' => 'Total debt',
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
                            'name' => 'total_assets',
                            'label' => 'Total assets',
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
                            'name' => 'Debt_to_assets_ratio',
                            'label' => 'Debt to assets ratio',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Debt_to_assets_ratio=total_debt/total_assets',
            'results' => ['total_assets' => 'total_debt/Debt_to_assets_ratio', 'total_debt' => 'Debt_to_assets_ratio*total_assets', 'Debt_to_assets_ratio' => 'total_debt/total_assets'],
        ],
        [
            'title' => 'total_debt=short_term_debt+long_term_debt',
            'results' => ['short_term_debt' => '-long_term_debt + total_debt', 'long_term_debt' => '-short_term_debt + total_debt', 'total_debt' => 'long_term_debt + short_term_debt'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Debt to asset ratio turns Total debt and Total assets into Long-term debt and Short-term debt. The arithmetic is the whole method: long-term debt is worked out from total debt by one formula, applied once. Long-term debt comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Debt to asset ratio calculator works', 'html' => <<<'TXT'
            <p>Debt to asset ratio answers one question from 2 numbers, and the answer is Long-term debt, Short-term debt and Debt to assets ratio.</p><p>In the form&#039;s own words, Debt to assets ratio = Total debt ÷ Total assets.</p><p>The answers are Long-term debt, Short-term debt and Debt to assets ratio; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Total debt</strong> — in USD</li><li><strong>Total assets</strong> — in USD</li></ul><p>What you get back is Long-term debt in USD, Short-term debt in USD, Debt to assets ratio in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Long-term debt = 10 USD, Short-term debt = 100 USD, Total assets = 1000 USD and Debt to assets ratio = 10 perc gives <strong>Total debt</strong> = 10000 USD.</p><ul><li><strong>Total debt</strong> = 10000 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Debt to assets ratio</strong> = <code>Total debt ÷ Total assets</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Total debt</strong> = 10000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Debt to assets ratio offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Debt to assets ratio</strong> = <code>Total debt ÷ Total assets</code></li><li><strong>Total assets</strong> = <code>Total debt ÷ Debt to assets ratio</code></li><li><strong>Total debt</strong> = <code>Debt to assets ratio × Total assets</code></li><li><strong>Short-term debt</strong> = <code>− Long-term debt + Total debt</code></li><li><strong>Long-term debt</strong> = <code>− Short-term debt + Total debt</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Debt to assets ratio</strong> = <code>Total debt ÷ Total assets</code> — the form to use when Total debt and Total assets are the values you have.</li><li><strong>Total assets</strong> = <code>Total debt ÷ Debt to assets ratio</code> — the form to use when Total debt and Debt to assets ratio are the values you have.</li><li><strong>Total debt</strong> = <code>Debt to assets ratio × Total assets</code> — the form to use when Debt to assets ratio and Total assets are the values you have.</li><li><strong>Total debt</strong> = <code>Long-term debt + Short-term debt</code> — the form to use when Long-term debt and Short-term debt are the values you have.</li><li><strong>Short-term debt</strong> = <code>− Long-term debt + Total debt</code> — the form to use when Long-term debt and Total debt are the values you have.</li><li><strong>Long-term debt</strong> = <code>− Short-term debt + Total debt</code> — the form to use when Short-term debt and Total debt are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Debt to assets ratio, Total assets and Total debt can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Long-term debt, from 10 to 20 — and the answers go from <strong>Total debt</strong> 10000 USD to <strong>Total debt</strong> 10000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Long-term debt, Short-term debt and Debt to assets ratio are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Total debt left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total debt is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Total assets left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total assets is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Total debt is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Total debt</strong> takes a plain number with no unit attached. Change it and Total assets, Debt to assets ratio and Short-term debt changes with it. Have it to hand before you start: Total debt is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total assets</strong> takes a plain number with no unit attached. Change it and Total debt and Debt to assets ratio changes with it. Have it to hand before you start: Total assets is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Long-term debt</strong> is a plain number. The value follows from Short-term debt and Total debt. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Short-term debt</strong> is a plain number. The value follows from Long-term debt and Total debt. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Debt to assets ratio</strong> is a percent figure. The value follows from Total debt and Total assets. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total debt</th></tr></thead><tbody><tr><td><strong>Long-term debt</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Short-term debt</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total assets</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Debt to assets ratio</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Total assets sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Long-term debt and Short-term debt barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Long-term debt = 5 USD, Short-term debt = 50 USD, Total assets = 500 USD and Debt to assets ratio = 5 perc, the answer is <strong>Total debt</strong> = 2500 USD.</li><li>With Long-term debt = 30 USD, Short-term debt = 100 USD, Total assets = 1000 USD and Debt to assets ratio = 10 perc, the answer is <strong>Total debt</strong> = 10000 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Long-term debt follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Total debt and Total assets measured, Long-term debt and Short-term debt wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/degree-of-operating-leverage">Degree of operating leverage Calculator</a>, <a href="/finance/depreciation">Depreciation Calculator</a> and <a href="/finance/direct-material-price-variance">Direct material price variance Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Debt to asset ratio calculator work out?', 'a' => <<<'TXT'
            Long-term debt, Short-term debt and Debt to assets ratio, from Total debt and Total assets. The relationship is Debt to assets ratio = Total debt ÷ Total assets.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Total debt (USD), Total assets (USD). With total debt and total assets in place, Long-term debt can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Debt to assets ratio, Total assets, Total debt and Short-term debt can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Total debt = 10000 USD. The figures come from Total debt as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Long-term debt is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Total debt left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Long-term debt keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/degree-of-operating-leverage', 'name' => 'Degree of operating leverage Calculator'],
            ['path' => '/finance/depreciation', 'name' => 'Depreciation Calculator'],
            ['path' => '/finance/direct-material-price-variance', 'name' => 'Direct material price variance Calculator'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * Treynor ratio
 * /finance/treynor-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Treynor ratio',
    'meta' => ['title' => 'Treynor ratio Calculator — Formula, Units & Example', 'description' => 'Treynor ratio works out portfolio return from beginning portfolio value and ending portfolio value. Results come back in perc, with any other unit a click away.', 'h1' => 'Treynor ratio Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => 'Portfolio\'s return',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beginning_portfolio',
                            'label' => 'Beginning portfolio value',
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
                            'name' => 'ending_portfolio',
                            'label' => 'Ending portfolio value',
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
                            'name' => 'portfolio_return',
                            'label' => 'Portfolio return',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Treynor ratio',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'risk_free',
                            'label' => 'Risk-free rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'portfolio_beta',
                            'label' => 'Portfolio\'s beta (> 0)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'treynor_ratio',
                            'label' => 'Treynor ratio',
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
            'title' => 'portfolio_return = (ending_portfolio - beginning_portfolio) / beginning_portfolio',
            'results' => ['portfolio_return' => '(-beginning_portfolio + ending_portfolio)/beginning_portfolio', 'ending_portfolio' => 'beginning_portfolio*(portfolio_return + 1)', 'beginning_portfolio' => 'ending_portfolio/(portfolio_return + 1)'],
        ],
        [
            'title' => 'treynor_ratio = (portfolio_return - risk_free) / portfolio_beta',
            'results' => ['portfolio_beta' => '(portfolio_return - risk_free)/treynor_ratio', 'portfolio_return' => 'portfolio_beta*treynor_ratio + risk_free', 'risk_free' => '-portfolio_beta*treynor_ratio + portfolio_return', 'treynor_ratio' => '(portfolio_return - risk_free)/portfolio_beta'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Treynor ratio turns Beginning portfolio value and Ending portfolio value into Portfolio return and Risk-free rate. Nothing is looked up on this page: portfolio return is computed from beginning portfolio value and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Portfolio return is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Treynor ratio calculator works', 'html' => <<<'TXT'
            <p>Treynor ratio answers one question from 2 numbers, and the answer is Portfolio return, Risk-free rate and Portfolio&#039;s beta (&gt; 0).</p><p>In the form&#039;s own words, Portfolio return = ( − Beginning portfolio value + Ending portfolio value) ÷ Beginning portfolio value.</p><p>The answers are Portfolio return, Risk-free rate, Portfolio&#039;s beta (&gt; 0) and Treynor ratio; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Beginning portfolio value</strong> — in USD</li><li><strong>Ending portfolio value</strong> — in USD</li></ul><p>The result boxes are Portfolio return in percent, Risk-free rate in percent, Portfolio&#039;s beta (&gt; 0), Treynor ratio in percent; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Beginning portfolio value = 10 USD, Ending portfolio value = 100 USD, Risk-free rate = 1000 perc, Portfolio&amp;#039;s beta (&amp;gt; 0) = 10 and Treynor ratio = 100 perc gives <strong>Portfolio return</strong> = 9 perc.</p><ul><li><strong>Portfolio return</strong> = 9 perc</li></ul><p>The line behind those figures is <strong>Portfolio return</strong> = <code>( − Beginning portfolio value + Ending portfolio value) ÷ Beginning portfolio value</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Portfolio return</strong> = 9 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Portfolio return offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Portfolio return</strong> = <code>( − Beginning portfolio value + Ending portfolio value) ÷ Beginning portfolio value</code></li><li><strong>Ending portfolio value</strong> = <code>Beginning portfolio value × (Portfolio return + 1)</code></li><li><strong>Beginning portfolio value</strong> = <code>Ending portfolio value ÷ (Portfolio return + 1)</code></li><li><strong>Treynor ratio</strong> = <code>(Portfolio return − Risk-free rate) ÷ Portfolio&#039;s beta (&gt; 0)</code></li><li><strong>Portfolio&#039;s beta (&gt; 0)</strong> = <code>(Portfolio return − Risk-free rate) ÷ Treynor ratio</code></li><li><strong>Risk-free rate</strong> = <code>− Portfolio&#039;s beta (&gt; 0) × Treynor ratio + Portfolio return</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Portfolio return</strong> = <code>( − Beginning portfolio value + Ending portfolio value) ÷ Beginning portfolio value</code> — the form to use when Beginning portfolio value and Ending portfolio value are the values you have.</li><li><strong>Ending portfolio value</strong> = <code>Beginning portfolio value × (Portfolio return + 1)</code> — the form to use when Beginning portfolio value and Portfolio return are the values you have.</li><li><strong>Beginning portfolio value</strong> = <code>Ending portfolio value ÷ (Portfolio return + 1)</code> — the form to use when Ending portfolio value and Portfolio return are the values you have.</li><li><strong>Treynor ratio</strong> = <code>(Portfolio return − Risk-free rate) ÷ Portfolio&#039;s beta (&gt; 0)</code> — the form to use when Portfolio return, Risk-free rate and Portfolio&#039;s beta (&gt; 0) are the values you have.</li><li><strong>Portfolio&#039;s beta (&gt; 0)</strong> = <code>(Portfolio return − Risk-free rate) ÷ Treynor ratio</code> — the form to use when Portfolio return, Risk-free rate and Treynor ratio are the values you have.</li><li><strong>Portfolio return</strong> = <code>Portfolio&#039;s beta (&gt; 0) × Treynor ratio + Risk-free rate</code> — the form to use when Portfolio&#039;s beta (&gt; 0), Treynor ratio and Risk-free rate are the values you have.</li><li><strong>Risk-free rate</strong> = <code>− Portfolio&#039;s beta (&gt; 0) × Treynor ratio + Portfolio return</code> — the form to use when Portfolio&#039;s beta (&gt; 0), Treynor ratio and Portfolio return are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Portfolio return, Ending portfolio value and Beginning portfolio value can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Beginning portfolio value, from 10 to 20 — and the answers go from <strong>Portfolio return</strong> 9 perc to <strong>Portfolio return</strong> 4 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Portfolio return, Risk-free rate and Portfolio&#039;s beta (&gt; 0) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Beginning portfolio value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Beginning portfolio value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Ending portfolio value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Ending portfolio value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Beginning portfolio value to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Beginning portfolio value</strong> takes a plain number with no unit attached. The page reads it when it works out Portfolio return and Ending portfolio value. Have it to hand before you start: Beginning portfolio value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Ending portfolio value</strong> takes a plain number with no unit attached. The page reads it when it works out Portfolio return and Beginning portfolio value. Have it to hand before you start: Ending portfolio value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Portfolio return</strong> is a percent figure and the page's own defaults put it at 9 perc. It is worked out from Beginning portfolio value and Ending portfolio value. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Risk-free rate</strong> is a percent figure. It is worked out from Portfolio's beta (> 0), Treynor ratio and Portfolio return. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Portfolio&#039;s beta (&gt; 0)</strong> is a plain number. It is worked out from Portfolio return, Risk-free rate and Treynor ratio. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Treynor ratio</strong> is a percent figure. It is worked out from Portfolio return, Risk-free rate and Portfolio's beta (> 0). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Portfolio return</th></tr></thead><tbody><tr><td><strong>Beginning portfolio value</strong> +10%</td><td>-10.1%</td></tr><tr><td><strong>Ending portfolio value</strong> +10%</td><td>+11.11%</td></tr><tr><td><strong>Risk-free rate</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Portfolio&#039;s beta (&gt; 0)</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Treynor ratio</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Ending portfolio value sits at the top — a ten per cent error in that box shows up as roughly 11.1 per cent in the answer. By contrast, Risk-free rate, Portfolio&#039;s beta (&gt; 0) and Treynor ratio barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Beginning portfolio value = 5 USD, Ending portfolio value = 50 USD, Risk-free rate = 500 perc, Portfolio&#039;s beta (&gt; 0) = 5 and Treynor ratio = 50 perc, the answer is <strong>Portfolio return</strong> = 9 perc.</li><li>With Beginning portfolio value = 30 USD, Ending portfolio value = 100 USD, Risk-free rate = 1000 perc, Portfolio&#039;s beta (&gt; 0) = 10 and Treynor ratio = 100 perc, the answer is <strong>Portfolio return</strong> = 2.33 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Portfolio return follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Beginning portfolio value and Ending portfolio value are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Beginning portfolio value and Ending portfolio value is what you already know and Portfolio return and Risk-free rate is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/rent-or-buy">Rent or buy</a>, <a href="/finance/rent-split">Rent split Calculator</a> and <a href="/finance/rental-commission">Rental commission Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Treynor ratio calculator work out?', 'a' => <<<'TXT'
            Portfolio return, Risk-free rate, Portfolio's beta (> 0) and Treynor ratio, from Beginning portfolio value and Ending portfolio value. The relationship is Portfolio return = ( − Beginning portfolio value + Ending portfolio value) ÷ Beginning portfolio value.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Beginning portfolio value (USD), Ending portfolio value (USD). Enter beginning portfolio value and ending portfolio value; Portfolio return is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Portfolio return, Ending portfolio value, Beginning portfolio value and Treynor ratio can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Portfolio return = 9 perc. The figures come from Beginning portfolio value as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Portfolio return is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Beginning portfolio value left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Portfolio return keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/rent-or-buy', 'name' => 'Rent or buy'],
            ['path' => '/finance/rent-split', 'name' => 'Rent split Calculator'],
            ['path' => '/finance/rental-commission', 'name' => 'Rental commission Calculator'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * Retention ratio
 * /finance/retention-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Retention ratio',
    'meta' => ['title' => 'Retention ratio Calculator — Formula, Units & Example', 'description' => 'Retention ratio works out retained earnings from net income and dividends paid. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Retention ratio Calculator', 'updated' => '2026-04-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net_income',
                            'label' => 'Net income',
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
                            'name' => 'dividends_paid',
                            'label' => 'Dividends paid',
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
                            'name' => 'retained_earnings',
                            'label' => 'Retained earnings',
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
                            'name' => 'retention_ratio',
                            'label' => 'Retention ratio',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
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
                                ['when' => 'retention_ratio< 0', 'text' => 'The company is relying on lending to sustain its dividend payouts. You might want to investigate if this trend is sustainable. '],
                                ['when' => 'retention_ratio< 0.4', 'text' => 'The company does not focus on reinvesting its cash, hence might exhibit limited growth in the future. '],
                                ['when' => 'retention_ratio< 0.7', 'text' => 'The company is doing great! It is reinvesting most of its cash into its business. It might exhibit a higher than average growth in the future. '],
                                ['when' => 'retention_ratio<= 1', 'text' => <<<'TXT'
                                The company is reinvesting almost all of its cash! This is great if you believe the company has a lot of profitable growth opportunities. Otherwise, the company might be harming the shareholders by not paying out enough dividends. 
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'retention_ratio = retained_earnings / net_income',
            'results' => ['retention_ratio' => 'retained_earnings/net_income', 'net_income' => 'retained_earnings/retention_ratio', 'retained_earnings' => 'net_income*retention_ratio'],
        ],
        [
            'title' => 'retained_earnings = net_income - dividends_paid',
            'results' => ['dividends_paid' => 'net_income - retained_earnings', 'net_income' => 'dividends_paid + retained_earnings', 'retained_earnings' => '-dividends_paid + net_income'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Retention ratio takes Net income and Retained earnings and returns Dividends paid and Retention ratio. It is a single relationship that reads dividends paid out of net income, not a table of canned results keyed by them. Units for Dividends paid default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Retention ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Retention ratio: it takes 2 numbers and reports Dividends paid and Retention ratio.</p><p>In the form&#039;s own words, Retention ratio = Retained earnings ÷ Net income.</p><p>The result panel carries Dividends paid and Retention ratio, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Net income</strong> — in USD</li><li><strong>Retained earnings</strong> — in USD</li></ul><p>The answers come back as Dividends paid in USD, Retention ratio in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Net income = 10 USD and Retained earnings = 100 USD gives <strong>Retention ratio</strong> = 10 perc and <strong>Dividends paid</strong> = -90 USD.</p><ul><li><strong>Retention ratio</strong> = 10 perc</li><li><strong>Dividends paid</strong> = -90 USD</li></ul><p>That is <strong>Retention ratio</strong> = <code>Retained earnings ÷ Net income</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Retention ratio</strong> = 10 and <strong>Dividends paid</strong> = -90 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Retention ratio offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Retention ratio</strong> = <code>Retained earnings ÷ Net income</code></li><li><strong>Net income</strong> = <code>Retained earnings ÷ Retention ratio</code></li><li><strong>Retained earnings</strong> = <code>Net income × Retention ratio</code></li><li><strong>Dividends paid</strong> = <code>Net income − Retained earnings</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Retention ratio</strong> = <code>Retained earnings ÷ Net income</code> — the form to use when Retained earnings and Net income are the values you have.</li><li><strong>Net income</strong> = <code>Retained earnings ÷ Retention ratio</code> — the form to use when Retained earnings and Retention ratio are the values you have.</li><li><strong>Retained earnings</strong> = <code>Net income × Retention ratio</code> — the form to use when Net income and Retention ratio are the values you have.</li><li><strong>Retained earnings</strong> = <code>− Dividends paid + Net income</code> — the form to use when Dividends paid and Net income are the values you have.</li><li><strong>Dividends paid</strong> = <code>Net income − Retained earnings</code> — the form to use when Net income and Retained earnings are the values you have.</li><li><strong>Net income</strong> = <code>Dividends paid + Retained earnings</code> — the form to use when Dividends paid and Retained earnings are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Retention ratio, Net income and Retained earnings can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Net income from 10 to 20, leaving every other box alone. The panel moves from <strong>Retention ratio</strong> 10 perc and <strong>Dividends paid</strong> -90 USD to <strong>Retention ratio</strong> 5 perc and <strong>Dividends paid</strong> -80 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Dividends paid and Retention ratio are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Net income left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Net income is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Retained earnings left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Retained earnings is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Net income and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Net income</strong> takes a plain number with no unit attached. Change it and Retention ratio, Retained earnings and Dividends paid changes with it. Have it to hand before you start: Net income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Retained earnings</strong> takes a plain number with no unit attached. Change it and Retention ratio, Net income and Dividends paid changes with it. Have it to hand before you start: Retained earnings is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Dividends paid</strong> is a plain number and the page's own defaults put it at -90. The value follows from Net income and Retained earnings. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Retention ratio</strong> is a percent figure and the page's own defaults put it at 10 perc. The value follows from Retained earnings and Net income. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Retention ratio</th><th>Dividends paid</th></tr></thead><tbody><tr><td><strong>Net income</strong> +10%</td><td>-9.09%</td><td>+1.11%</td></tr><tr><td><strong>Retained earnings</strong> +10%</td><td>+10%</td><td>-11.11%</td></tr></tbody></table><p>Ranked by leverage, Retained earnings sits at the top — a ten per cent error in that box shows up as roughly 11.1 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Net income = 5 USD and Retained earnings = 50 USD, the answer is <strong>Retention ratio</strong> = 10 perc and <strong>Dividends paid</strong> = -45 USD.</li><li>With Net income = 30 USD and Retained earnings = 100 USD, the answer is <strong>Retention ratio</strong> = 3.33 perc and <strong>Dividends paid</strong> = -70 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Dividends paid follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Net income and Retained earnings are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Net income and Retained earnings and the number you are missing is Dividends paid and Retention ratio.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/dcf">Discounted cash flow Calculator</a>, <a href="/finance/discretionary-income">Discretionary income Calculator</a> and <a href="/finance/disposable-income">Disposable income Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Retention ratio is a number to act on, so the useful question is what to do with Dividends paid (USD) and Retention ratio (perc) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Net income and Retained earnings alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Retention ratio calculator work out?', 'a' => 'Dividends paid and Retention ratio, from Retained earnings and Net income. The relationship is Retention ratio = Retained earnings ÷ Net income.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Net income (USD), Retained earnings (USD). Fill net income and retained earnings and leave Dividends paid empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Retention ratio, Net income, Retained earnings and Dividends paid can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Retention ratio = 10 perc and Dividends paid = -90 USD. That comes from the page's own defaults, entered in Net income; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Dividends paid is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Net income left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Dividends paid at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/dcf', 'name' => 'Discounted cash flow Calculator'],
            ['path' => '/finance/discretionary-income', 'name' => 'Discretionary income Calculator'],
            ['path' => '/finance/disposable-income', 'name' => 'Disposable income Calculator'],
        ],
        'authors' => [],
    ],
];

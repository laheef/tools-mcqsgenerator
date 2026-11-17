<?php

/**
 * Sustainable growth rate
 * /finance/sustainable-growth-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sustainable growth rate',
    'meta' => ['title' => 'Sustainable growth rate Calculator: Free, With Steps', 'description' => 'Enter net income, dividends paid and total shareholder\'s equity and Sustainable growth rate returns retention ratio and ROE. The answer is shown in perc.', 'h1' => 'Sustainable growth rate Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => 'Retention ratio',
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
                            'name' => 'retention_ratio',
                            'label' => 'Retention ratio',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Return on equity (ROE)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shareholder_equity',
                            'label' => 'Total shareholder\'s equity',
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
                            'name' => 'roe',
                            'label' => 'ROE',
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
            'title' => 'Sustainable growth rate (SGR)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'growth',
                            'label' => 'SGR',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'retention_ratio = (net_income - dividends_paid) / net_income',
            'results' => ['net_income' => '-dividends_paid/(retention_ratio - 1)', 'dividends_paid' => 'net_income*(1 - retention_ratio)', 'retention_ratio' => '(-dividends_paid + net_income)/net_income'],
        ],
        [
            'title' => 'roe = net_income / shareholder_equity',
            'results' => ['shareholder_equity' => 'net_income/roe', 'roe' => 'net_income/shareholder_equity', 'net_income' => 'roe*shareholder_equity'],
        ],
        [
            'title' => 'growth = retention_ratio * roe',
            'results' => ['roe' => 'growth/retention_ratio', 'retention_ratio' => 'growth/roe', 'growth' => 'retention_ratio*roe'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Sustainable growth rate works out Retention ratio and Total shareholder's equity from Net income and Dividends paid. There is no hidden constant here: change retention ratio and net income moves with it. The main result, Retention ratio, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Sustainable growth rate calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Sustainable growth rate: it takes 2 numbers and reports Retention ratio, Total shareholder&#039;s equity and ROE.</p><p>Written with the labels from the form, Retention ratio = ( − Dividends paid + Net income) ÷ Net income.</p><p>The result panel carries Retention ratio, Total shareholder&#039;s equity, ROE and SGR, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Net income</strong> — in USD</li><li><strong>Dividends paid</strong> — in USD</li></ul><p>The answers come back as Retention ratio in percent, Total shareholder&#039;s equity in USD, ROE in percent, SGR in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Net income = 10 USD, Dividends paid = 100 USD, Total shareholder&amp;#039;s equity = 1000 USD, ROE = 10 perc and SGR = 100 perc — through the same formula and the panel reports <strong>Retention ratio</strong> = -9 perc.</p><ul><li><strong>Retention ratio</strong> = -9 perc</li></ul><p>The line behind those figures is <strong>Retention ratio</strong> = <code>( − Dividends paid + Net income) ÷ Net income</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Retention ratio</strong> = -9. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Retention ratio lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Retention ratio</strong> = <code>( − Dividends paid + Net income) ÷ Net income</code></li><li><strong>Net income</strong> = <code>− Dividends paid ÷ (Retention ratio − 1)</code></li><li><strong>Dividends paid</strong> = <code>Net income × (1 − Retention ratio)</code></li><li><strong>ROE</strong> = <code>Net income ÷ Total shareholder&#039;s equity</code></li><li><strong>Total shareholder&#039;s equity</strong> = <code>Net income ÷ ROE</code></li><li><strong>SGR</strong> = <code>Retention ratio × ROE</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Retention ratio</strong> = <code>( − Dividends paid + Net income) ÷ Net income</code> — the form to use when Dividends paid and Net income are the values you have.</li><li><strong>Net income</strong> = <code>− Dividends paid ÷ (Retention ratio − 1)</code> — the form to use when Dividends paid and Retention ratio are the values you have.</li><li><strong>Dividends paid</strong> = <code>Net income × (1 − Retention ratio)</code> — the form to use when Net income and Retention ratio are the values you have.</li><li><strong>ROE</strong> = <code>Net income ÷ Total shareholder&#039;s equity</code> — the form to use when Net income and Total shareholder&#039;s equity are the values you have.</li><li><strong>Total shareholder&#039;s equity</strong> = <code>Net income ÷ ROE</code> — the form to use when Net income and ROE are the values you have.</li><li><strong>Net income</strong> = <code>ROE × Total shareholder&#039;s equity</code> — the form to use when ROE and Total shareholder&#039;s equity are the values you have.</li><li><strong>SGR</strong> = <code>Retention ratio × ROE</code> — the form to use when Retention ratio and ROE are the values you have.</li><li><strong>ROE</strong> = <code>SGR ÷ Retention ratio</code> — the form to use when SGR and Retention ratio are the values you have.</li></ul><p>Any one of Retention ratio, Net income and Dividends paid can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Net income from 10 to 20, leaving every other box alone. The panel moves from <strong>Retention ratio</strong> -9 perc to <strong>Retention ratio</strong> -4 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Retention ratio, Total shareholder&#039;s equity and ROE are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Net income left as a guess.</strong> Anything typed into Net income is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Dividends paid left as a guess.</strong> Anything typed into Dividends paid is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Net income to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Net income</strong> takes a plain number with no unit attached. The page reads it when it works out Dividends paid, Retention ratio and Total shareholder's equity. Have it to hand before you start: Net income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Dividends paid</strong> takes a plain number with no unit attached. The page reads it when it works out Net income and Retention ratio. Have it to hand before you start: Dividends paid is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Retention ratio</strong> is a percent figure and the page's own defaults put it at -9 perc. The value follows from Dividends paid and Net income. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total shareholder&#039;s equity</strong> is a plain number. The value follows from Net income and ROE. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>ROE</strong> is a percent figure. The value follows from Net income and Total shareholder's equity. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>SGR</strong> is a percent figure. The value follows from Retention ratio and ROE. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Retention ratio</th></tr></thead><tbody><tr><td><strong>Net income</strong> +10%</td><td>+10.1%</td></tr><tr><td><strong>Dividends paid</strong> +10%</td><td>-11.11%</td></tr><tr><td><strong>Total shareholder&#039;s equity</strong> +10%</td><td>+0%</td></tr><tr><td><strong>ROE</strong> +10%</td><td>+0%</td></tr><tr><td><strong>SGR</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Dividends paid: ten per cent there moves an answer by about 11.1 per cent, which is why that is the number to measure twice. By contrast, Total shareholder&#039;s equity, ROE and SGR barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Net income = 5 USD, Dividends paid = 50 USD, Total shareholder&#039;s equity = 500 USD, ROE = 5 perc and SGR = 50 perc, the answer is <strong>Retention ratio</strong> = -9 perc.</li><li>With Net income = 30 USD, Dividends paid = 100 USD, Total shareholder&#039;s equity = 1000 USD, ROE = 10 perc and SGR = 100 perc, the answer is <strong>Retention ratio</strong> = -2.33 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Retention ratio is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Net income and Dividends paid are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Net income and Dividends paid is what you already know and Retention ratio and Total shareholder&#039;s equity is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/net-effective-rent">Net effective rent Calculator</a>, <a href="/finance/net-income">Net income</a> and <a href="/finance/net-operating-assets">Net operating assets Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sustainable growth rate calculator work out?', 'a' => <<<'TXT'
            Retention ratio, Total shareholder's equity, ROE and SGR, from Dividends paid and Net income. The relationship is Retention ratio = ( − Dividends paid + Net income) ÷ Net income.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Net income (USD), Dividends paid (USD). Enter net income and dividends paid; Retention ratio is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Retention ratio, Net income, Dividends paid and ROE blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Retention ratio = -9 perc. That comes from the page\'s own defaults, entered in Net income; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Retention ratio is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Net income left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Retention ratio at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/net-effective-rent', 'name' => 'Net effective rent Calculator'],
            ['path' => '/finance/net-income', 'name' => 'Net income'],
            ['path' => '/finance/net-operating-assets', 'name' => 'Net operating assets Calculator'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * Return on invested capital (ROIC)
 * /finance/roic
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Return on invested capital (ROIC)',
    'meta' => ['title' => 'Return on invested capital (ROIC) Calculator', 'description' => 'Return on invested capital (ROIC) works out NOPAT and ROIC from EBIT and tax rate. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Return on invested capital (ROIC) Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => 'Net income',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ebit',
                            'label' => 'EBIT',
                            'type' => 'number',
                            'help' => 'Earnings before interest and taxes.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0],
                    'fields' => [
                        [
                            'name' => 'tax_rate',
                            'label' => 'Tax rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'nopat',
                            'label' => 'NOPAT',
                            'type' => 'number',
                            'help' => 'Net operating profit after tax.',
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
            'title' => 'Invested capital',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'equity',
                            'label' => 'Equity',
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
                            'name' => 'debt',
                            'label' => 'Debt',
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
                            'name' => 'fixed_capital',
                            'label' => 'Invested capital',
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
            'title' => 'Return on invested capital',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'roic',
                            'label' => 'ROIC',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'roic = nopat / fixed_capital',
            'results' => ['roic' => 'nopat/fixed_capital', 'fixed_capital' => 'nopat/roic', 'nopat' => 'fixed_capital*roic'],
        ],
        [
            'title' => 'nopat = ebit * (1-tax_rate)',
            'results' => ['nopat' => 'ebit*(1 - tax_rate)', 'ebit' => '-nopat/(tax_rate - 1)', 'tax_rate' => '(ebit - nopat)/ebit'],
        ],
        [
            'title' => 'fixed_capital = debt + equity ',
            'results' => ['fixed_capital' => 'debt + equity', 'debt' => '-equity + fixed_capital', 'equity' => '-debt + fixed_capital'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Return on invested capital (ROIC) takes NOPAT and Invested capital and returns EBIT and Tax rate. The arithmetic is the whole method: EBIT is worked out from NOPAT by one formula, applied once. EBIT comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Return on invested capital (ROIC) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Return on invested capital (ROIC): it takes 2 numbers and reports EBIT, Tax rate and Equity.</p><p>In the form&#039;s own words, ROIC = NOPAT ÷ Invested capital.</p><p>What comes back is EBIT, Tax rate, Equity and Debt — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>NOPAT</strong> — in USD. Net operating profit after tax.</li><li><strong>Invested capital</strong> — in USD</li></ul><p>The answers come back as EBIT in USD, Tax rate in percent, Equity in USD, Debt in USD, ROIC in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, EBIT = 10 USD, Tax rate = 100 perc, NOPAT = 1000 USD, Equity = 10 USD, Debt = 100 USD and Invested capital = 1000 USD; the answers are <strong>ROIC</strong> = 1 perc.</p><ul><li><strong>ROIC</strong> = 1 perc</li></ul><p>That is <strong>ROIC</strong> = <code>NOPAT ÷ Invested capital</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>ROIC</strong> = 1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Tax rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>ROIC</strong> = <code>NOPAT ÷ Invested capital</code></li><li><strong>Invested capital</strong> = <code>NOPAT ÷ ROIC</code></li><li><strong>NOPAT</strong> = <code>Invested capital × ROIC</code></li><li><strong>EBIT</strong> = <code>− NOPAT ÷ (Tax rate − 1)</code></li><li><strong>Tax rate</strong> = <code>(EBIT − NOPAT) ÷ EBIT</code></li><li><strong>Debt</strong> = <code>− Equity + Invested capital</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>ROIC</strong> = <code>NOPAT ÷ Invested capital</code> — the form to use when NOPAT and Invested capital are the values you have.</li><li><strong>Invested capital</strong> = <code>NOPAT ÷ ROIC</code> — the form to use when NOPAT and ROIC are the values you have.</li><li><strong>NOPAT</strong> = <code>Invested capital × ROIC</code> — the form to use when Invested capital and ROIC are the values you have.</li><li><strong>NOPAT</strong> = <code>EBIT × (1 − Tax rate)</code> — the form to use when EBIT and Tax rate are the values you have.</li><li><strong>EBIT</strong> = <code>− NOPAT ÷ (Tax rate − 1)</code> — the form to use when NOPAT and Tax rate are the values you have.</li><li><strong>Tax rate</strong> = <code>(EBIT − NOPAT) ÷ EBIT</code> — the form to use when EBIT and NOPAT are the values you have.</li><li><strong>Invested capital</strong> = <code>Debt + Equity</code> — the form to use when Debt and Equity are the values you have.</li><li><strong>Debt</strong> = <code>− Equity + Invested capital</code> — the form to use when Equity and Invested capital are the values you have.</li></ul><p>Any one of ROIC, Invested capital and NOPAT can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — EBIT, from 10 to 20 — and the answers go from <strong>ROIC</strong> 1 perc to <strong>ROIC</strong> 1 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with EBIT, Tax rate and Equity are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>NOPAT left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If NOPAT is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Invested capital left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Invested capital is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in NOPAT and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>NOPAT</strong> takes a plain number with no unit attached. Net operating profit after tax. The page reads it when it works out ROIC, Invested capital and EBIT. Have it to hand before you start: NOPAT is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Invested capital</strong> takes a plain number with no unit attached. The page reads it when it works out ROIC, NOPAT and Debt. Have it to hand before you start: Invested capital is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>EBIT</strong> is a plain number. The value follows from NOPAT and Tax rate. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Tax rate</strong> is a percent figure. The value follows from EBIT and NOPAT. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Equity</strong> is a plain number. The value follows from Debt and Invested capital. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Debt</strong> is a plain number. The value follows from Equity and Invested capital. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>ROIC</strong> is a percent figure and the page's own defaults put it at 1 perc. The value follows from NOPAT and Invested capital. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>ROIC</th></tr></thead><tbody><tr><td><strong>EBIT</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Tax rate</strong> +10%</td><td>+0%</td></tr><tr><td><strong>NOPAT</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Equity</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Debt</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Invested capital</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, NOPAT sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, EBIT, Tax rate and Equity barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With EBIT = 5 USD, Tax rate = 50 perc, NOPAT = 500 USD, Equity = 5 USD, Debt = 50 USD and Invested capital = 500 USD, the answer is <strong>ROIC</strong> = 1 perc.</li><li>With EBIT = 30 USD, Tax rate = 100 perc, NOPAT = 1000 USD, Equity = 10 USD, Debt = 100 USD and Invested capital = 1000 USD, the answer is <strong>ROIC</strong> = 1 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> EBIT follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when NOPAT and Invested capital is what you already know and EBIT and Tax rate is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/net-debt">Net debt Calculator</a>, <a href="/finance/net-effective-rent">Net effective rent Calculator</a> and <a href="/finance/net-income">Net income</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Return on invested capital (ROIC) calculator work out?', 'a' => 'EBIT, Tax rate, Equity and Debt, from NOPAT and Invested capital. The relationship is ROIC = NOPAT ÷ Invested capital.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'NOPAT (USD), Invested capital (USD). With NOPAT and invested capital in place, EBIT can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of ROIC, Invested capital, NOPAT and EBIT blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'ROIC = 1 perc. That comes from the page\'s own defaults, entered in NOPAT; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally EBIT is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With NOPAT left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of EBIT keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/net-debt', 'name' => 'Net debt Calculator'],
            ['path' => '/finance/net-effective-rent', 'name' => 'Net effective rent Calculator'],
            ['path' => '/finance/net-income', 'name' => 'Net income'],
        ],
        'authors' => [],
    ],
];

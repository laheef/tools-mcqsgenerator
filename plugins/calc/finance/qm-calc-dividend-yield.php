<?php

/**
 * Dividend yield
 * /finance/dividend-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dividend yield',
    'meta' => ['title' => 'Dividend yield Calculator — Formula, Units & Example', 'description' => 'Dividend yield works out annual dividends from dividends per period and dividend frequency. Every box can be solved for, not only the one in the title.', 'h1' => 'Dividend yield Calculator', 'updated' => '2026-09-18'],
    'sections' => [
        [
            'title' => 'Annual dividends',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'period_div',
                            'label' => 'Dividends per period',
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
                            'name' => 'div_freq',
                            'label' => 'Dividend frequency',
                            'type' => 'select',
                            'options' => ['Annually' => '1.000000000000000', 'Semi-annually' => '2.000000000000000', 'Quarterly' => '4.000000000000000', 'Monthly' => '12.000000000000000'],
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annual_div',
                            'label' => 'Annual dividends',
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
            'title' => 'Dividend yield',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'share_price',
                            'label' => 'Share price',
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
                            'name' => 'div_yield',
                            'label' => 'Dividend yield',
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
                        ['type' => 'note', 'text' => 'Check out how to use this calculator!'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'div_yield = annual_div / share_price',
            'results' => ['div_yield' => 'annual_div/share_price', 'share_price' => 'annual_div/div_yield', 'annual_div' => 'div_yield*share_price'],
        ],
        [
            'title' => 'annual_div = period_div * div_freq',
            'results' => ['div_freq' => 'annual_div/period_div', 'annual_div' => 'div_freq*period_div', 'period_div' => 'annual_div/div_freq'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dividend yield turns Annual dividends and Share price into Dividends per period and Dividend frequency. Nothing is looked up on this page: dividends per period is computed from annual dividends and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Dividends per period is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Dividend yield calculator works', 'html' => <<<'TXT'
            <p>The Dividend yield calculator applies one relationship to 2 numbers and reports Dividends per period, Dividend frequency and Dividend yield.</p><p>The relationship it solves reads Dividend yield = Annual dividends ÷ Share price.</p><p>The result panel carries Dividends per period, Dividend frequency and Dividend yield, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Annual dividends</strong> — in USD</li><li><strong>Share price</strong> — in USD</li></ul><p>The result boxes are Dividends per period in USD, Dividend frequency, Dividend yield in percent; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Dividends per period = 10 USD, Annual dividends = 100 USD and Share price = 1000 USD gives <strong>Dividend yield</strong> = 0.1 perc and <strong>Dividend frequency</strong> = 10.</p><ul><li><strong>Dividend yield</strong> = 0.1 perc</li><li><strong>Dividend frequency</strong> = 10</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Dividend yield</strong> = <code>Annual dividends ÷ Share price</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Dividend yield</strong> = 0.1 and <strong>Dividend frequency</strong> = 10 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Dividend yield offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Dividend yield</strong> = <code>Annual dividends ÷ Share price</code></li><li><strong>Share price</strong> = <code>Annual dividends ÷ Dividend yield</code></li><li><strong>Annual dividends</strong> = <code>Dividend yield × Share price</code></li><li><strong>Dividend frequency</strong> = <code>Annual dividends ÷ Dividends per period</code></li><li><strong>Dividends per period</strong> = <code>Annual dividends ÷ Dividend frequency</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Dividend yield</strong> = <code>Annual dividends ÷ Share price</code> — the form to use when Annual dividends and Share price are the values you have.</li><li><strong>Share price</strong> = <code>Annual dividends ÷ Dividend yield</code> — the form to use when Annual dividends and Dividend yield are the values you have.</li><li><strong>Annual dividends</strong> = <code>Dividend yield × Share price</code> — the form to use when Dividend yield and Share price are the values you have.</li><li><strong>Annual dividends</strong> = <code>Dividend frequency × Dividends per period</code> — the form to use when Dividend frequency and Dividends per period are the values you have.</li><li><strong>Dividend frequency</strong> = <code>Annual dividends ÷ Dividends per period</code> — the form to use when Annual dividends and Dividends per period are the values you have.</li><li><strong>Dividends per period</strong> = <code>Annual dividends ÷ Dividend frequency</code> — the form to use when Annual dividends and Dividend frequency are the values you have.</li></ul><p>Any one of Dividend yield, Share price and Annual dividends can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Dividends per period, from 10 to 20 — and the answers go from <strong>Dividend yield</strong> 0.1 perc and <strong>Dividend frequency</strong> 10 to <strong>Dividend yield</strong> 0.1 perc and <strong>Dividend frequency</strong> 5.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Dividends per period, Dividend frequency and Dividend yield are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Annual dividends left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Annual dividends is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Share price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Share price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Annual dividends is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Dividend yield form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Annual dividends</strong> takes a plain number with no unit attached. Change it and Dividend yield, Share price and Dividend frequency changes with it. Fill it from a measurement rather than a memory — Annual dividends is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Share price</strong> takes a plain number with no unit attached. Change it and Dividend yield and Annual dividends changes with it. Fill it from a measurement rather than a memory — Share price is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Dividends per period</strong> is a plain number. It is computed from Annual dividends and Dividend frequency, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Dividend frequency</strong> is a plain number and the page's own defaults put it at 10. It is computed from Annual dividends and Dividends per period, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Dividend yield</strong> is a percent figure and the page's own defaults put it at 0.1 perc. It is computed from Annual dividends and Share price, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Dividend yield</th><th>Dividend frequency</th></tr></thead><tbody><tr><td><strong>Dividends per period</strong> +10%</td><td>+0%</td><td>-9.09%</td></tr><tr><td><strong>Annual dividends</strong> +10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Share price</strong> +10%</td><td>-9.09%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Annual dividends sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Dividends per period = 5 USD, Annual dividends = 50 USD and Share price = 500 USD and the page reports <strong>Dividend yield</strong> = 0.1 perc and <strong>Dividend frequency</strong> = 10.</li><li>Feed in Dividends per period = 30 USD, Annual dividends = 100 USD and Share price = 1000 USD and the page reports <strong>Dividend yield</strong> = 0.1 perc and <strong>Dividend frequency</strong> = 3.33.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Dividend yield actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Dividends per period follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Annual dividends and Share price is what you already know and Dividends per period and Dividend frequency is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/maximum-drawdown">Maximum drawdown Calculator</a>, <a href="/finance/mega-millions-payout">Mega Millions payout</a> and <a href="/finance/mileage-reimbursement">Mileage reimbursement Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dividend yield calculator work out?', 'a' => <<<'TXT'
            Dividends per period, Dividend frequency and Dividend yield, from Annual dividends and Share price. The relationship is Dividend yield = Annual dividends ÷ Share price.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Annual dividends (USD), Share price (USD). With annual dividends and share price in place, Dividends per period can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Dividend yield, Share price, Annual dividends and Dividend frequency blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Dividend yield = 0.1 perc and Dividend frequency = 10. Those are the defaults written into the form — move Annual dividends and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Dividends per period is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Annual dividends blank and the page solves for it, reporting Dividends per period instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Dividends per period at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/maximum-drawdown', 'name' => 'Maximum drawdown Calculator'],
            ['path' => '/finance/mega-millions-payout', 'name' => 'Mega Millions payout'],
            ['path' => '/finance/mileage-reimbursement', 'name' => 'Mileage reimbursement Calculator'],
        ],
        'authors' => [],
    ],
];

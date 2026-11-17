<?php

/**
 * Present value of growth opportunities (PVGO)
 * /finance/pvgo
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Present value of growth opportunities (PVGO)',
    'meta' => ['title' => 'Present value of growth opportunities (PVGO)', 'description' => 'Present value of growth opportunities (PVGO) takes earnings and returns earnings per share (EPS). Every box can be solved for, not only the one in the title.', 'h1' => 'Present value of growth opportunities (PVGO) Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => 'EPS',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'earnings',
                            'label' => 'Earnings',
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
                            'name' => 'number_shares',
                            'label' => 'Number of shares outstanding',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'earnings_per_share',
                            'label' => 'Earnings per share (EPS)',
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
            'title' => 'PVGO',
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
                            'name' => 'cost_equity',
                            'label' => 'Cost of equity',
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
                            'name' => 'pvgo',
                            'label' => 'Present value of growth opportunities (PVGO)',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'pvgo <= 0', 'text' => 'The company should distribute their earnings to its shareholders. '],
                                ['when' => 'pvgo > 0', 'text' => 'The company should reinvest their earnings on its growth opportunities! '],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'pvgo = share_price - earnings_per_share / cost_equity',
            'results' => ['earnings_per_share' => 'cost_equity*(-pvgo + share_price)', 'cost_equity' => '-earnings_per_share/(pvgo - share_price)', 'pvgo' => 'share_price - earnings_per_share/cost_equity', 'share_price' => 'pvgo + earnings_per_share/cost_equity'],
        ],
        [
            'title' => 'earnings_per_share = earnings / number_shares',
            'results' => ['earnings_per_share' => 'earnings/number_shares', 'number_shares' => 'earnings/earnings_per_share', 'earnings' => 'earnings_per_share*number_shares'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Present value of growth opportunities (PVGO) works out Earnings and Number of shares outstanding from Earnings per share (EPS), Share price and Cost of equity. Nothing is looked up on this page: earnings is computed from earnings per share (EPS) and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Earnings is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Present value of growth opportunities (PVGO) calculator works', 'html' => <<<'TXT'
            <p>The Present value of growth opportunities (PVGO) calculator applies one relationship to 3 numbers and reports Earnings, Number of shares outstanding and Present value of growth opportunities (PVGO).</p><p>Written with the labels from the form, Present value of growth opportunities (PVGO) = Share price − Earnings per share (EPS) ÷ Cost of equity.</p><p>What comes back is Earnings, Number of shares outstanding and Present value of growth opportunities (PVGO) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Earnings per share (EPS)</strong> — in USD</li><li><strong>Share price</strong> — in USD</li><li><strong>Cost of equity</strong> — in percent</li></ul><p>The result boxes are Earnings in USD, Number of shares outstanding, Present value of growth opportunities (PVGO) in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Earnings = 10 USD, Number of shares outstanding = 100, Share price = 1000 USD, Cost of equity = 10 perc and Present value of growth opportunities (PVGO) = 100 USD — through the same formula and the panel reports <strong>Earnings per share (EPS)</strong> = 9000 USD.</p><ul><li><strong>Earnings per share (EPS)</strong> = 9000 USD</li></ul><p>The line behind those figures is <strong>Present value of growth opportunities (PVGO)</strong> = <code>Share price − Earnings per share (EPS) ÷ Cost of equity</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Earnings per share (EPS)</strong> = 9000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Cost of equity lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Present value of growth opportunities (PVGO)</strong> = <code>Share price − Earnings per share (EPS) ÷ Cost of equity</code></li><li><strong>Earnings per share (EPS)</strong> = <code>Cost of equity × ( − Present value of growth opportunities (PVGO) + Share price)</code></li><li><strong>Cost of equity</strong> = <code>− Earnings per share (EPS) ÷ (Present value of growth opportunities (PVGO) − Share price)</code></li><li><strong>Share price</strong> = <code>Present value of growth opportunities (PVGO) + Earnings per share (EPS) ÷ Cost of equity</code></li><li><strong>Number of shares outstanding</strong> = <code>Earnings ÷ Earnings per share (EPS)</code></li><li><strong>Earnings</strong> = <code>Earnings per share (EPS) × Number of shares outstanding</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Present value of growth opportunities (PVGO)</strong> = <code>Share price − Earnings per share (EPS) ÷ Cost of equity</code> — the form to use when Share price, Earnings per share (EPS) and Cost of equity are the values you have.</li><li><strong>Earnings per share (EPS)</strong> = <code>Cost of equity × ( − Present value of growth opportunities (PVGO) + Share price)</code> — the form to use when Cost of equity, Present value of growth opportunities (PVGO) and Share price are the values you have.</li><li><strong>Cost of equity</strong> = <code>− Earnings per share (EPS) ÷ (Present value of growth opportunities (PVGO) − Share price)</code> — the form to use when Earnings per share (EPS), Present value of growth opportunities (PVGO) and Share price are the values you have.</li><li><strong>Share price</strong> = <code>Present value of growth opportunities (PVGO) + Earnings per share (EPS) ÷ Cost of equity</code> — the form to use when Present value of growth opportunities (PVGO), Earnings per share (EPS) and Cost of equity are the values you have.</li><li><strong>Earnings per share (EPS)</strong> = <code>Earnings ÷ Number of shares outstanding</code> — the form to use when Earnings and Number of shares outstanding are the values you have.</li><li><strong>Number of shares outstanding</strong> = <code>Earnings ÷ Earnings per share (EPS)</code> — the form to use when Earnings and Earnings per share (EPS) are the values you have.</li><li><strong>Earnings</strong> = <code>Earnings per share (EPS) × Number of shares outstanding</code> — the form to use when Earnings per share (EPS) and Number of shares outstanding are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Present value of growth opportunities (PVGO), Earnings per share (EPS) and Cost of equity can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Earnings, from 10 to 20 — and the answers go from <strong>Earnings per share (EPS)</strong> 9000 USD to <strong>Earnings per share (EPS)</strong> 9000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Cost of equity carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Earnings, Number of shares outstanding and Present value of growth opportunities (PVGO) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Earnings per share (EPS) left as a guess.</strong> Anything typed into Earnings per share (EPS) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Share price left as a guess.</strong> Anything typed into Share price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Earnings per share (EPS) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Present value of growth opportunities (PVGO) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Earnings per share (EPS)</strong> takes a plain number with no unit attached. The page reads it when it works out Cost of equity, Present value of growth opportunities (PVGO) and Share price. Fill it from a measurement rather than a memory — Earnings per share (EPS) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Share price</strong> takes a plain number with no unit attached. The page reads it when it works out Earnings per share (EPS), Cost of equity and Present value of growth opportunities (PVGO). Fill it from a measurement rather than a memory — Share price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cost of equity</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Earnings per share (EPS), Present value of growth opportunities (PVGO) and Share price. Fill it from a measurement rather than a memory — Cost of equity is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Earnings</strong> is a plain number. It is computed from Earnings per share (EPS) and Number of shares outstanding, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Number of shares outstanding</strong> is a plain number. It is computed from Earnings and Earnings per share (EPS), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Present value of growth opportunities (PVGO)</strong> is a plain number. It is computed from Share price, Earnings per share (EPS) and Cost of equity, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Earnings per share (EPS)</th></tr></thead><tbody><tr><td><strong>Earnings</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Number of shares outstanding</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Share price</strong> +10%</td><td>+11.11%</td></tr><tr><td><strong>Cost of equity</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Present value of growth opportunities (PVGO)</strong> +10%</td><td>-1.11%</td></tr></tbody></table><p>The steepest column belongs to Share price: ten per cent there moves an answer by about 11.1 per cent, which is why that is the number to measure twice. By contrast, Earnings and Number of shares outstanding barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Earnings = 5 USD, Number of shares outstanding = 50, Share price = 500 USD, Cost of equity = 5 perc and Present value of growth opportunities (PVGO) = 50 USD and the page reports <strong>Earnings per share (EPS)</strong> = 2250 USD.</li><li>Feed in Earnings = 30 USD, Number of shares outstanding = 100, Share price = 1000 USD, Cost of equity = 10 perc and Present value of growth opportunities (PVGO) = 100 USD and the page reports <strong>Earnings per share (EPS)</strong> = 9000 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Present value of growth opportunities (PVGO) actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Earnings is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Earnings per share (EPS), Share price and Cost of equity is what you already know and Earnings and Number of shares outstanding is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/business-valuation">Business valuation Calculator</a>, <a href="/finance/buying-power">Buying power Calculator</a> and <a href="/finance/cagr">CAGR Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Present value of growth opportunities (PVGO) calculator work out?', 'a' => <<<'TXT'
            Earnings, Number of shares outstanding and Present value of growth opportunities (PVGO), from Share price, Earnings per share (EPS) and Cost of equity. The relationship is Present value of growth opportunities (PVGO) = Share price − Earnings per share (EPS) ÷ Cost of equity.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Earnings per share (EPS) (USD), Share price (USD), Cost of equity (percent). With earnings per share (EPS), share price and cost of equity in place, Earnings can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Present value of growth opportunities (PVGO), Earnings per share (EPS), Cost of equity and Share price can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Earnings per share (EPS) = 9000 USD. Those are the defaults written into the form — move Earnings per share (EPS) and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Earnings is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Earnings per share (EPS) blank and the page solves for it, reporting Earnings instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Earnings at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/business-valuation', 'name' => 'Business valuation Calculator'],
            ['path' => '/finance/buying-power', 'name' => 'Buying power Calculator'],
            ['path' => '/finance/cagr', 'name' => 'CAGR Calculator'],
        ],
        'authors' => [],
    ],
];

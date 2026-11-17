<?php

/**
 * Price to cash flow ratio
 * /finance/price-to-cash-flow-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Price to cash flow ratio',
    'meta' => ['title' => 'Price to cash flow ratio — Formula & Results', 'description' => 'Price to cash flow ratio works out cash flow per share from cash flow and number of shares outstanding. The formula is printed in the form\'s own words.', 'h1' => 'Price to cash flow ratio Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => 'Cash flow per share',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_flow',
                            'label' => 'Cash flow',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_shares',
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
                            'name' => 'cf_per_share',
                            'label' => 'Cash flow per share',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Price to cash flow ratio',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_per_share',
                            'label' => 'Price per share',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pcf_ratio',
                            'label' => 'Price to cash flow ratio',
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
            'title' => 'cf_per_share = cash_flow / number_of_shares',
            'results' => ['cf_per_share' => 'cash_flow/number_of_shares', 'cash_flow' => 'cf_per_share*number_of_shares', 'number_of_shares' => 'cash_flow/cf_per_share'],
        ],
        [
            'title' => 'pcf_ratio = price_per_share / cf_per_share',
            'results' => ['cf_per_share' => 'price_per_share/pcf_ratio', 'price_per_share' => 'cf_per_share*pcf_ratio', 'pcf_ratio' => 'price_per_share/cf_per_share'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Price to cash flow ratio works out Cash flow per share and Price per share from Cash flow and Number of shares outstanding. Nothing is looked up on this page: cash flow per share is computed from cash flow and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Cash flow per share is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Price to cash flow ratio calculator works', 'html' => <<<'TXT'
            <p>The Price to cash flow ratio calculator applies one relationship to 2 numbers and reports Cash flow per share, Price per share and Price to cash flow ratio.</p><p>The relationship it solves reads Cash flow per share = Cash flow ÷ Number of shares outstanding.</p><p>The result panel carries Cash flow per share, Price per share and Price to cash flow ratio, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Cash flow</strong> — in USD</li><li><strong>Number of shares outstanding</strong> — a plain number, no unit</li></ul><p>What you get back is Cash flow per share in USD, Price per share in USD, Price to cash flow ratio in x, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Cash flow = 10 USD, Number of shares outstanding = 100, Price per share = 1000 USD and Price to cash flow ratio = 10 x gives <strong>Cash flow per share</strong> = 0.1 USD.</p><ul><li><strong>Cash flow per share</strong> = 0.1 USD</li></ul><p>The line behind those figures is <strong>Cash flow per share</strong> = <code>Cash flow ÷ Number of shares outstanding</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Cash flow per share</strong> = 0.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Cash flow per share is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Cash flow per share</strong> = <code>Cash flow ÷ Number of shares outstanding</code></li><li><strong>Cash flow</strong> = <code>Cash flow per share × Number of shares outstanding</code></li><li><strong>Number of shares outstanding</strong> = <code>Cash flow ÷ Cash flow per share</code></li><li><strong>Price to cash flow ratio</strong> = <code>Price per share ÷ Cash flow per share</code></li><li><strong>Price per share</strong> = <code>Cash flow per share × Price to cash flow ratio</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Cash flow per share</strong> = <code>Cash flow ÷ Number of shares outstanding</code> — the form to use when Cash flow and Number of shares outstanding are the values you have.</li><li><strong>Cash flow</strong> = <code>Cash flow per share × Number of shares outstanding</code> — the form to use when Cash flow per share and Number of shares outstanding are the values you have.</li><li><strong>Number of shares outstanding</strong> = <code>Cash flow ÷ Cash flow per share</code> — the form to use when Cash flow and Cash flow per share are the values you have.</li><li><strong>Price to cash flow ratio</strong> = <code>Price per share ÷ Cash flow per share</code> — the form to use when Price per share and Cash flow per share are the values you have.</li><li><strong>Cash flow per share</strong> = <code>Price per share ÷ Price to cash flow ratio</code> — the form to use when Price per share and Price to cash flow ratio are the values you have.</li><li><strong>Price per share</strong> = <code>Cash flow per share × Price to cash flow ratio</code> — the form to use when Cash flow per share and Price to cash flow ratio are the values you have.</li></ul><p>Any one of Cash flow per share, Cash flow and Number of shares outstanding can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Cash flow, from 10 to 20 — and the answers go from <strong>Cash flow per share</strong> 0.1 USD to <strong>Cash flow per share</strong> 0.2 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Cash flow per share, Price per share and Price to cash flow ratio are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Cash flow left as a guess.</strong> Anything typed into Cash flow is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Number of shares outstanding left as a guess.</strong> Anything typed into Number of shares outstanding is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Cash flow to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Price to cash flow ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Cash flow</strong> takes a plain number with no unit attached. The page reads it when it works out Cash flow per share and Number of shares outstanding. Fill it from a measurement rather than a memory — Cash flow is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of shares outstanding</strong> takes a plain number with no unit attached. The page reads it when it works out Cash flow per share and Cash flow. Fill it from a measurement rather than a memory — Number of shares outstanding is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Cash flow per share</strong> is a plain number and the page's own defaults put it at 0.1. It is computed from Cash flow and Number of shares outstanding, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Price per share</strong> is a plain number. It is computed from Cash flow per share and Price to cash flow ratio, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Price to cash flow ratio</strong> is a plain number. It is computed from Price per share and Cash flow per share, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Cash flow per share</th></tr></thead><tbody><tr><td><strong>Cash flow</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Number of shares outstanding</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Price per share</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Price to cash flow ratio</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Cash flow: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Price per share and Price to cash flow ratio barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Cash flow = 5 USD, Number of shares outstanding = 50, Price per share = 500 USD and Price to cash flow ratio = 5 x and the page reports <strong>Cash flow per share</strong> = 0.1 USD.</li><li>Feed in Cash flow = 30 USD, Number of shares outstanding = 100, Price per share = 1000 USD and Price to cash flow ratio = 10 x and the page reports <strong>Cash flow per share</strong> = 0.3 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Cash flow per share is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Cash flow and Number of shares outstanding measured, Cash flow per share and Price per share wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/debt-consolidation">Debt consolidation</a>, <a href="/finance/debt-payoff">Debt payoff Calculator</a> and <a href="/finance/dscr">Debt service coverage ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Price to cash flow ratio calculator work out?', 'a' => <<<'TXT'
            Cash flow per share, Price per share and Price to cash flow ratio, from Cash flow and Number of shares outstanding. The relationship is Cash flow per share = Cash flow ÷ Number of shares outstanding.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cash flow (USD), Number of shares outstanding. Fill cash flow and number of shares outstanding and leave Cash flow per share empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Cash flow per share, Cash flow, Number of shares outstanding and Price to cash flow ratio blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Cash flow per share = 0.1 USD. The figures come from Cash flow as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Cash flow per share is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Cash flow blank and the page solves for it, reporting Cash flow per share instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Cash flow per share keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/debt-consolidation', 'name' => 'Debt consolidation'],
            ['path' => '/finance/debt-payoff', 'name' => 'Debt payoff Calculator'],
            ['path' => '/finance/dscr', 'name' => 'Debt service coverage ratio Calculator'],
        ],
        'authors' => [],
    ],
];

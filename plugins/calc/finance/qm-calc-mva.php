<?php

/**
 * Market value added (MVA)
 * /finance/mva
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Market value added (MVA)',
    'meta' => ['title' => 'Market value added (MVA) — Formula & Results', 'description' => 'Market value added (MVA) takes current share price and returns current market value. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Market value added (MVA) Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => 'Current market value',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'current_share_price',
                            'label' => 'Current share price',
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
                            'name' => 'shares_outstanding',
                            'label' => 'Shares outstanding',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'current_market_value',
                            'label' => 'Current market value',
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
            'title' => 'MVA',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'capital_invested',
                            'label' => 'Capital invested',
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
                            'name' => 'mva',
                            'label' => 'Market value added (MVA)',
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
    ],
    'formula' => [
        [
            'title' => 'current_market_value = current_share_price * shares_outstanding',
            'results' => ['current_market_value' => 'current_share_price*shares_outstanding', 'shares_outstanding' => 'current_market_value/current_share_price', 'current_share_price' => 'current_market_value/shares_outstanding'],
        ],
        [
            'title' => 'mva = current_market_value - capital_invested',
            'results' => ['current_market_value' => 'capital_invested + mva', 'mva' => '-capital_invested + current_market_value', 'capital_invested' => 'current_market_value - mva'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Market value added (MVA) works out Current market value and Capital invested from Current share price and Shares outstanding. The arithmetic is the whole method: current market value is worked out from current share price by one formula, applied once. Current market value comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Market value added (MVA) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Market value added (MVA): it takes 2 numbers and reports Current market value, Capital invested and Market value added (MVA).</p><p>The relationship it solves reads Current market value = Current share price × Shares outstanding.</p><p>The answers are Current market value, Capital invested and Market value added (MVA); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Current share price</strong> — in USD</li><li><strong>Shares outstanding</strong> — a plain number, no unit</li></ul><p>What you get back is Current market value in USD, Capital invested in USD, Market value added (MVA) in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Current share price = 10 USD, Shares outstanding = 100, Capital invested = 1000 USD and Market value added (MVA) = 10 USD — through the same formula and the panel reports <strong>Current market value</strong> = 1000 USD.</p><ul><li><strong>Current market value</strong> = 1000 USD</li></ul><p>That is <strong>Current market value</strong> = <code>Current share price × Shares outstanding</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Current market value</strong> = 1000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Current market value is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Current market value</strong> = <code>Current share price × Shares outstanding</code></li><li><strong>Shares outstanding</strong> = <code>Current market value ÷ Current share price</code></li><li><strong>Current share price</strong> = <code>Current market value ÷ Shares outstanding</code></li><li><strong>Market value added (MVA)</strong> = <code>− Capital invested + Current market value</code></li><li><strong>Capital invested</strong> = <code>Current market value − Market value added (MVA)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Current market value</strong> = <code>Current share price × Shares outstanding</code> — the form to use when Current share price and Shares outstanding are the values you have.</li><li><strong>Shares outstanding</strong> = <code>Current market value ÷ Current share price</code> — the form to use when Current market value and Current share price are the values you have.</li><li><strong>Current share price</strong> = <code>Current market value ÷ Shares outstanding</code> — the form to use when Current market value and Shares outstanding are the values you have.</li><li><strong>Market value added (MVA)</strong> = <code>− Capital invested + Current market value</code> — the form to use when Capital invested and Current market value are the values you have.</li><li><strong>Current market value</strong> = <code>Capital invested + Market value added (MVA)</code> — the form to use when Capital invested and Market value added (MVA) are the values you have.</li><li><strong>Capital invested</strong> = <code>Current market value − Market value added (MVA)</code> — the form to use when Current market value and Market value added (MVA) are the values you have.</li></ul><p>Any one of Current market value, Shares outstanding and Current share price can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Current share price, from 10 to 20 — and the answers go from <strong>Current market value</strong> 1000 USD to <strong>Current market value</strong> 2000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Current market value, Capital invested and Market value added (MVA) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Current share price left as a guess.</strong> Anything typed into Current share price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Shares outstanding left as a guess.</strong> Anything typed into Shares outstanding is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Current share price and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Market value added (MVA) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Current share price</strong> takes a plain number with no unit attached. The page reads it when it works out Current market value and Shares outstanding. Fill it from a measurement rather than a memory — Current share price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Shares outstanding</strong> takes a plain number with no unit attached. The page reads it when it works out Current market value and Current share price. Fill it from a measurement rather than a memory — Shares outstanding is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Current market value</strong> is a plain number and the page's own defaults put it at 1000. It is worked out from Current share price and Shares outstanding. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Capital invested</strong> is a plain number. It is worked out from Current market value and Market value added (MVA). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Market value added (MVA)</strong> is a plain number. It is worked out from Capital invested and Current market value. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Current market value</th></tr></thead><tbody><tr><td><strong>Current share price</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Shares outstanding</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Capital invested</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Market value added (MVA)</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Shares outstanding: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Capital invested and Market value added (MVA) barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Current share price = 5 USD, Shares outstanding = 50, Capital invested = 500 USD and Market value added (MVA) = 5 USD and the page reports <strong>Current market value</strong> = 250 USD.</li><li>Feed in Current share price = 30 USD, Shares outstanding = 100, Capital invested = 1000 USD and Market value added (MVA) = 10 USD and the page reports <strong>Current market value</strong> = 3000 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Current market value is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Current share price and Shares outstanding are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Current share price and Shares outstanding is what you already know and Current market value and Capital invested is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/debt-avalanche">Debt avalanche Calculator</a>, <a href="/finance/debt">Debt Calculator</a> and <a href="/finance/debt-consolidation">Debt consolidation</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Market value added (MVA) is a number to act on, so the useful question is what to do with Current market value (USD), Capital invested (USD) and Market value added (MVA) (USD) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Current share price and Shares outstanding alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Market value added (MVA) calculator work out?', 'a' => <<<'TXT'
            Current market value, Capital invested and Market value added (MVA), from Current share price and Shares outstanding. The relationship is Current market value = Current share price × Shares outstanding.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current share price (USD), Shares outstanding. Enter current share price and shares outstanding; Current market value is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Current market value, Shares outstanding, Current share price and Market value added (MVA) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Current market value = 1000 USD. That comes from the page\'s own defaults, entered in Current share price; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Current market value is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Current share price blank and the page solves for it, reporting Current market value instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Current market value at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/debt-avalanche', 'name' => 'Debt avalanche Calculator'],
            ['path' => '/finance/debt', 'name' => 'Debt Calculator'],
            ['path' => '/finance/debt-consolidation', 'name' => 'Debt consolidation'],
        ],
        'authors' => [],
    ],
];

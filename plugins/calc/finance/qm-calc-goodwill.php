<?php

/**
 * Goodwill
 * /finance/goodwill
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Goodwill',
    'meta' => ['title' => 'Goodwill Calculator: Formula, Steps & Examples', 'description' => 'Enter purchase price and fair value of the asset and get goodwill back. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Goodwill Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'purchase_price',
                            'label' => 'Purchase price',
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
                            'name' => 'asset_fv',
                            'label' => 'Fair value of the asset',
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
                            'name' => 'liabilities_fv',
                            'label' => 'Fair value of the liabilities',
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
                            'name' => 'goodwill',
                            'label' => 'Goodwill',
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
            'title' => 'goodwill = purchase_price - asset_fv + liabilities_fv',
            'results' => ['goodwill' => '-asset_fv + liabilities_fv + purchase_price', 'liabilities_fv' => 'asset_fv + goodwill - purchase_price', 'purchase_price' => 'asset_fv + goodwill - liabilities_fv', 'asset_fv' => '-goodwill + liabilities_fv + purchase_price'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Purchase price, Fair value of the asset and Fair value of the liabilities into Goodwill and the answer comes back as Goodwill. It is a single relationship that reads goodwill out of purchase price, not a table of canned results keyed by them. Units for Goodwill default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Goodwill calculator works', 'html' => <<<'TXT'
            <p>The Goodwill calculator applies one relationship to 3 numbers and reports Goodwill.</p><p>Written with the labels from the form, Goodwill = − Fair value of the asset + Fair value of the liabilities + Purchase price.</p><p>The answers are Goodwill; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Purchase price</strong> — in USD</li><li><strong>Fair value of the asset</strong> — in USD</li><li><strong>Fair value of the liabilities</strong> — in USD</li></ul><p>The answer comes back as Goodwill in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Purchase price = 10 USD, Fair value of the asset = 100 USD and Fair value of the liabilities = 1000 USD; the answers are <strong>Goodwill</strong> = 910 USD.</p><ul><li><strong>Goodwill</strong> = 910 USD</li></ul><p>That is <strong>Goodwill</strong> = <code>− Fair value of the asset + Fair value of the liabilities + Purchase price</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Goodwill</strong> = 910. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Goodwill is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Goodwill</strong> = <code>− Fair value of the asset + Fair value of the liabilities + Purchase price</code></li><li><strong>Fair value of the liabilities</strong> = <code>Fair value of the asset + Goodwill − Purchase price</code></li><li><strong>Purchase price</strong> = <code>Fair value of the asset + Goodwill − Fair value of the liabilities</code></li><li><strong>Fair value of the asset</strong> = <code>− Goodwill + Fair value of the liabilities + Purchase price</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Goodwill</strong> = <code>− Fair value of the asset + Fair value of the liabilities + Purchase price</code> — the form to use when Fair value of the asset, Fair value of the liabilities and Purchase price are the values you have.</li><li><strong>Fair value of the liabilities</strong> = <code>Fair value of the asset + Goodwill − Purchase price</code> — the form to use when Fair value of the asset, Goodwill and Purchase price are the values you have.</li><li><strong>Purchase price</strong> = <code>Fair value of the asset + Goodwill − Fair value of the liabilities</code> — the form to use when Fair value of the asset, Goodwill and Fair value of the liabilities are the values you have.</li><li><strong>Fair value of the asset</strong> = <code>− Goodwill + Fair value of the liabilities + Purchase price</code> — the form to use when Goodwill, Fair value of the liabilities and Purchase price are the values you have.</li></ul><p>Any one of Goodwill, Fair value of the liabilities and Purchase price can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Purchase price from 10 to 20, leaving every other box alone. The panel moves from <strong>Goodwill</strong> 910 USD to <strong>Goodwill</strong> 920 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Goodwill is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Purchase price left as a guess.</strong> Anything typed into Purchase price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Fair value of the asset left as a guess.</strong> Anything typed into Fair value of the asset is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Fair value of the liabilities left as a guess.</strong> Anything typed into Fair value of the liabilities is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Purchase price is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Purchase price</strong> takes a plain number with no unit attached. It feeds Goodwill, Fair value of the liabilities and Fair value of the asset. Have it to hand before you start: Purchase price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Fair value of the asset</strong> takes a plain number with no unit attached. It feeds Goodwill, Fair value of the liabilities and Purchase price. Have it to hand before you start: Fair value of the asset is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Fair value of the liabilities</strong> takes a plain number with no unit attached. It feeds Goodwill, Purchase price and Fair value of the asset. Have it to hand before you start: Fair value of the liabilities is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Goodwill</strong> is a plain number and the page's own defaults put it at 910. It is worked out from Fair value of the asset, Fair value of the liabilities and Purchase price. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Goodwill</th></tr></thead><tbody><tr><td><strong>Purchase price</strong> +10%</td><td>+0.11%</td></tr><tr><td><strong>Fair value of the asset</strong> +10%</td><td>-1.1%</td></tr><tr><td><strong>Fair value of the liabilities</strong> +10%</td><td>+10.99%</td></tr></tbody></table><p>The steepest column belongs to Fair value of the liabilities: ten per cent there moves an answer by about 11 per cent, which is why that is the number to measure twice. By contrast, Purchase price barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Purchase price = 5 USD, Fair value of the asset = 50 USD and Fair value of the liabilities = 500 USD, the answer is <strong>Goodwill</strong> = 455 USD.</li><li>With Purchase price = 30 USD, Fair value of the asset = 100 USD and Fair value of the liabilities = 1000 USD, the answer is <strong>Goodwill</strong> = 930 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Purchase price, Fair value of the asset and Fair value of the liabilities. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Purchase price into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Goodwill in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Goodwill is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Purchase price, Fair value of the asset and Fair value of the liabilities are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Purchase price, Fair value of the asset and Fair value of the liabilities measured, Goodwill wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/debt">Debt Calculator</a>, <a href="/finance/debt-consolidation">Debt consolidation</a> and <a href="/finance/debt-payoff">Debt payoff Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Goodwill calculator work out?', 'a' => <<<'TXT'
            Goodwill, from Fair value of the asset, Fair value of the liabilities and Purchase price. The relationship is Goodwill = − Fair value of the asset + Fair value of the liabilities + Purchase price.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Purchase price (USD), Fair value of the asset (USD), Fair value of the liabilities (USD). Enter purchase price, fair value of the asset and fair value of the liabilities; Goodwill is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Goodwill, Fair value of the liabilities, Purchase price and Fair value of the asset blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Goodwill = 910 USD. The figures come from Purchase price as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Goodwill is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Purchase price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Goodwill keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/debt', 'name' => 'Debt Calculator'],
            ['path' => '/finance/debt-consolidation', 'name' => 'Debt consolidation'],
            ['path' => '/finance/debt-payoff', 'name' => 'Debt payoff Calculator'],
        ],
        'authors' => [],
    ],
];

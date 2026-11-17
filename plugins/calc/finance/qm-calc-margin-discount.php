<?php

/**
 * Margin with discount
 * /finance/margin-discount
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Margin with discount',
    'meta' => ['title' => 'Margin with discount Calculator: Free, With Steps', 'description' => 'Margin with discount works out base markup from cost before discount and base margin. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Margin with discount Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Margin, markup, and revenue',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost',
                            'label' => 'Cost before discount',
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
                            'name' => 'margin',
                            'label' => 'Base margin',
                            'type' => 'number',
                            'help' => 'Profit margin is a ratio of profit to revenue before the discount is applied.',
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
                            'name' => 'markup',
                            'label' => 'Base markup',
                            'type' => 'number',
                            'help' => 'The ratio of profit to cost before the discount is applied.',
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
                            'name' => 'base_revenue',
                            'label' => 'Base revenue',
                            'type' => 'number',
                            'help' => 'How much the sale earns you before the discount is applied.',
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
            'title' => 'How much discount is being applied?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discount',
                            'label' => 'Discount',
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
            'title' => 'How the discount affects you:',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discounted_revenue',
                            'label' => 'Price after discount',
                            'type' => 'number',
                            'help' => 'Discounted revenue.',
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
                            'name' => 'true_margin',
                            'label' => 'True margin',
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
                            'name' => 'true_markup',
                            'label' => 'True markup',
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
                            'name' => 'profit',
                            'label' => 'Profit',
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
            'title' => 'cost + cost * markup = base_revenue',
            'results' => ['cost' => 'base_revenue/(markup + 1)', 'base_revenue' => 'cost*(markup + 1)', 'markup' => '(base_revenue - cost)/cost'],
        ],
        [
            'title' => 'profit = discounted_revenue - cost',
            'results' => ['cost' => 'discounted_revenue - profit', 'discounted_revenue' => 'cost + profit', 'profit' => '-cost + discounted_revenue'],
        ],
        [
            'title' => 'discounted_revenue = base_revenue - base_revenue * discount',
            'results' => ['discount' => '(base_revenue - discounted_revenue)/base_revenue', 'discounted_revenue' => 'base_revenue*(1 - discount)', 'base_revenue' => '-discounted_revenue/(discount - 1)'],
        ],
        [
            'title' => 'markup = 1 / (1 - margin) - 1',
            'results' => ['margin' => 'markup/(markup + 1)', 'markup' => '-margin/(margin - 1)'],
        ],
        [
            'title' => 'cost + cost * true_markup = discounted_revenue',
            'results' => ['cost' => 'discounted_revenue/(true_markup + 1)', 'true_markup' => '(-cost + discounted_revenue)/cost', 'discounted_revenue' => 'cost*(true_markup + 1)'],
        ],
        [
            'title' => 'true_markup = 1 / (1 - true_margin) - 1',
            'results' => ['true_margin' => 'true_markup/(true_markup + 1)', 'true_markup' => '-true_margin/(true_margin - 1)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Margin with discount works out Base margin and Base markup from Cost before discount and Price after discount. The arithmetic is the whole method: base margin is worked out from cost before discount by one formula, applied once. Base margin comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Margin with discount calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Margin with discount: it takes 2 numbers and reports Base margin, Base markup and Base revenue.</p><p>Written with the labels from the form, Cost before discount = Base revenue ÷ (Base markup + 1).</p><p>The answers are Base margin, Base markup, Base revenue and Discount; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Cost before discount</strong> — in USD</li><li><strong>Price after discount</strong> — in USD. Discounted revenue.</li></ul><p>What you get back is Base margin in percent, Base markup in percent, Base revenue in USD, Discount in percent, True margin in percent, True markup in percent, Profit in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Cost before discount = 10 USD, Base margin = 100 perc, Base revenue = 1000 USD, Discount = 10 perc, Price after discount = 100 USD, True margin = 1000 perc, True markup = 10 perc and Profit = 100 USD gives <strong>Base markup</strong> = 99 perc.</p><ul><li><strong>Base markup</strong> = 99 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Cost before discount</strong> = <code>Base revenue ÷ (Base markup + 1)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Base markup</strong> = 99. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Base margin lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Cost before discount</strong> = <code>Base revenue ÷ (Base markup + 1)</code></li><li><strong>Base revenue</strong> = <code>Cost before discount × (Base markup + 1)</code></li><li><strong>Base markup</strong> = <code>(Base revenue − Cost before discount) ÷ Cost before discount</code></li><li><strong>Profit</strong> = <code>− Cost before discount + Price after discount</code></li><li><strong>Price after discount</strong> = <code>Cost before discount + Profit</code></li><li><strong>Discount</strong> = <code>(Base revenue − Price after discount) ÷ Base revenue</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Cost before discount</strong> = <code>Base revenue ÷ (Base markup + 1)</code> — the form to use when Base revenue and Base markup are the values you have.</li><li><strong>Base revenue</strong> = <code>Cost before discount × (Base markup + 1)</code> — the form to use when Cost before discount and Base markup are the values you have.</li><li><strong>Base markup</strong> = <code>(Base revenue − Cost before discount) ÷ Cost before discount</code> — the form to use when Base revenue and Cost before discount are the values you have.</li><li><strong>Profit</strong> = <code>− Cost before discount + Price after discount</code> — the form to use when Cost before discount and Price after discount are the values you have.</li><li><strong>Cost before discount</strong> = <code>Price after discount − Profit</code> — the form to use when Price after discount and Profit are the values you have.</li><li><strong>Price after discount</strong> = <code>Cost before discount + Profit</code> — the form to use when Cost before discount and Profit are the values you have.</li><li><strong>Price after discount</strong> = <code>Base revenue × (1 − Discount)</code> — the form to use when Base revenue and Discount are the values you have.</li><li><strong>Discount</strong> = <code>(Base revenue − Price after discount) ÷ Base revenue</code> — the form to use when Base revenue and Price after discount are the values you have.</li></ul><p>Any one of Cost before discount, Base revenue and Base markup can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Cost before discount, from 10 to 20 — and the answers go from <strong>Base markup</strong> 99 perc to <strong>Base markup</strong> 49 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Base margin, Base markup and Base revenue are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Cost before discount left as a guess.</strong> Anything typed into Cost before discount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Price after discount left as a guess.</strong> Anything typed into Price after discount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Cost before discount is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Cost before discount</strong> takes a plain number with no unit attached. Change it and Base revenue, Base markup and Price after discount changes with it. Have it to hand before you start: Cost before discount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price after discount</strong> takes a plain number with no unit attached. Discounted revenue. Change it and Cost before discount, Profit and Discount changes with it. Have it to hand before you start: Price after discount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Base margin</strong> is a percent figure. The value follows from Base markup. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Base markup</strong> is a percent figure and the page's own defaults put it at 99 perc. The value follows from Base revenue and Cost before discount. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Base revenue</strong> is a plain number. The value follows from Cost before discount and Base markup. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Discount</strong> is a percent figure. The value follows from Base revenue and Price after discount. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>True margin</strong> is a percent figure. The value follows from True markup. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>True markup</strong> is a percent figure. The value follows from Cost before discount and Price after discount. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Profit</strong> is a plain number. The value follows from Cost before discount and Price after discount. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Base markup</th></tr></thead><tbody><tr><td><strong>Cost before discount</strong> +10%</td><td>-9.18%</td></tr><tr><td><strong>Base margin</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Base revenue</strong> +10%</td><td>+10.1%</td></tr><tr><td><strong>Discount</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Price after discount</strong> +10%</td><td>+0%</td></tr><tr><td><strong>True margin</strong> +10%</td><td>+0%</td></tr><tr><td><strong>True markup</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Profit</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Base revenue: ten per cent there moves an answer by about 10.1 per cent, which is why that is the number to measure twice. By contrast, Base margin, Discount and Price after discount barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Cost before discount = 5 USD, Base margin = 50 perc, Base revenue = 500 USD, Discount = 5 perc, Price after discount = 50 USD, True margin = 500 perc, True markup = 5 perc and Profit = 50 USD, the answer is <strong>Base markup</strong> = 99 perc.</li><li>With Cost before discount = 30 USD, Base margin = 100 perc, Base revenue = 1000 USD, Discount = 10 perc, Price after discount = 100 USD, True margin = 1000 perc, True markup = 10 perc and Profit = 100 USD, the answer is <strong>Base markup</strong> = 32.33 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Base margin is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Cost before discount and Price after discount are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Cost before discount and Price after discount and the number you are missing is Base margin and Base markup.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/price-per-sqft">Price per square foot Calculator</a>, <a href="/finance/price-per-square-meter">Price per square meter Calculator</a> and <a href="/finance/price-to-book-ratio">Price to book ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Margin with discount calculator work out?', 'a' => <<<'TXT'
            Base margin, Base markup, Base revenue and Discount, from Base revenue and Base markup. The relationship is Cost before discount = Base revenue ÷ (Base markup + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cost before discount (USD), Price after discount (USD). Fill cost before discount and price after discount and leave Base margin empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Cost before discount, Base revenue, Base markup and Profit blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Base markup = 99 perc. The figures come from Cost before discount as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Base margin is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Cost before discount left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Base margin keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/price-per-sqft', 'name' => 'Price per square foot Calculator'],
            ['path' => '/finance/price-per-square-meter', 'name' => 'Price per square meter Calculator'],
            ['path' => '/finance/price-to-book-ratio', 'name' => 'Price to book ratio Calculator'],
        ],
        'authors' => [],
    ],
];

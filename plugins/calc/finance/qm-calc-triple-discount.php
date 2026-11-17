<?php

/**
 * Triple discount
 * /finance/triple-discount
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Triple discount',
    'meta' => ['title' => 'Triple discount Calculator: Free, With Steps', 'description' => 'Triple discount works out final price and price difference from original price, 1st discount and 2nd discount. The formula is printed in the form\'s own words.', 'h1' => 'Triple discount Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'original_price',
                            'label' => 'Original price',
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
                            'name' => 'first_discount',
                            'label' => '1st discount',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'second_discount',
                            'label' => '2nd discount',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'third_discount',
                            'label' => '3rd discount',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_price',
                            'label' => 'Final price',
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
                            'name' => 'price_difference',
                            'label' => 'Price difference',
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
            'title' => 'Effective discount',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'effective_discount',
                            'label' => 'Effective discount',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => <<<'TXT'
            final_price = original_price - original_price*first_discount - (original_price - original_price*first_discount)*second_discount-(original_price-original_price*first_discount-(original_price-original_price*first_discount)*second_discount)*third_discount
            TXT,
            'results' => [
                'first_discount' => <<<'TXT'
                (-final_price + original_price*second_discount*third_discount - original_price*second_discount - original_price*third_discount + original_price)/(original_price*(second_discount*third_discount - second_discount - third_discount + 1))
                TXT,
                'second_discount' => <<<'TXT'
                (-final_price + first_discount*original_price*third_discount - first_discount*original_price - original_price*third_discount + original_price)/(original_price*(first_discount*third_discount - first_discount - third_discount + 1))
                TXT,
                'original_price' => <<<'TXT'
                -final_price/(first_discount*second_discount*third_discount - first_discount*second_discount - first_discount*third_discount + first_discount - second_discount*third_discount + second_discount + third_discount - 1)
                TXT,
                'third_discount' => <<<'TXT'
                (-final_price + first_discount*original_price*second_discount - first_discount*original_price - original_price*second_discount + original_price)/(original_price*(first_discount*second_discount - first_discount - second_discount + 1))
                TXT,
                'final_price' => <<<'TXT'
                original_price*(-first_discount*second_discount*third_discount + first_discount*second_discount + first_discount*third_discount - first_discount + second_discount*third_discount - second_discount - third_discount + 1)
                TXT,
            ],
        ],
        [
            'title' => 'price_difference = original_price - final_price',
            'results' => ['original_price' => 'final_price + price_difference', 'price_difference' => '-final_price + original_price', 'final_price' => 'original_price - price_difference'],
        ],
        [
            'title' => 'effective_discount = first_discount + (1 - first_discount) * second_discount + (1 - (first_discount + (1 - first_discount) * second_discount)) * third_discount',
            'results' => ['third_discount' => '(effective_discount + first_discount*second_discount - first_discount - second_discount)/(first_discount*second_discount - first_discount - second_discount + 1)', 'first_discount' => '(effective_discount + second_discount*third_discount - second_discount - third_discount)/(second_discount*third_discount - second_discount - third_discount + 1)', 'effective_discount' => <<<'TXT'
            first_discount*second_discount*third_discount - first_discount*second_discount - first_discount*third_discount + first_discount - second_discount*third_discount + second_discount + third_discount
            TXT, 'second_discount' => '(effective_discount + first_discount*third_discount - first_discount - third_discount)/(first_discount*third_discount - first_discount - third_discount + 1)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Triple discount works out Final price and Price difference from Original price, 1st discount and 2nd discount. It is a single relationship that reads final price out of original price, not a table of canned results keyed by them. Units for Final price default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Triple discount calculator works', 'html' => <<<'TXT'
            <p>The Triple discount calculator applies one relationship to 4 numbers and reports Final price, Price difference and Effective discount.</p><p>The relationship it solves reads Final price = Original price × ( − 1st discount × 2nd discount × 3rd discount + 1st discount × 2nd discount + 1st discount × 3rd discount − 1st discount + 2nd discount × 3rd discount − 2nd discount − 3rd discount + 1).</p><p>The answers are Final price, Price difference and Effective discount; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Original price</strong> — in USD</li><li><strong>1st discount</strong> — in percent</li><li><strong>2nd discount</strong> — in percent</li><li><strong>3rd discount</strong> — in percent</li></ul><p>The answers come back as Final price in USD, Price difference in USD, Effective discount in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Original price = 10 USD, 1st discount = 100 perc, 2nd discount = 1000 perc and 3rd discount = 10 perc; the answers are <strong>Final price</strong> = -8.901e+6 USD, <strong>Price difference</strong> = 8.901e+6 USD and <strong>Effective discount</strong> = 890110 perc.</p><ul><li><strong>Final price</strong> = -8.901e+6 USD</li><li><strong>Price difference</strong> = 8.901e+6 USD</li><li><strong>Effective discount</strong> = 890110 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Final price</strong> = <code>Original price × ( − 1st discount × 2nd discount × 3rd discount + 1st discount × 2nd discount + 1st discount × 3rd discount − 1st discount + 2nd discount × 3rd discount − 2nd discount − 3rd discount + 1)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Final price</strong> = -8.901e+6, <strong>Price difference</strong> = 8.901e+6 and <strong>Effective discount</strong> = 890110. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Effective discount lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Final price</strong> = <code>Original price × ( − 1st discount × 2nd discount × 3rd discount + 1st discount × 2nd discount + 1st discount × 3rd discount − 1st discount + 2nd discount × 3rd discount − 2nd discount − 3rd discount + 1)</code></li><li><strong>Original price</strong> = <code>− Final price ÷ (1st discount × 2nd discount × 3rd discount − 1st discount × 2nd discount − 1st discount × 3rd discount + 1st discount − 2nd discount × 3rd discount + 2nd discount + 3rd discount − 1)</code></li><li><strong>Price difference</strong> = <code>− Final price + Original price</code></li><li><strong>Effective discount</strong> = <code>1st discount × 2nd discount × 3rd discount − 1st discount × 2nd discount − 1st discount × 3rd discount + 1st discount − 2nd discount × 3rd discount + 2nd discount + 3rd discount</code></li><li><strong>3rd discount</strong> = <code>(Effective discount + 1st discount × 2nd discount − 1st discount − 2nd discount) ÷ (1st discount × 2nd discount − 1st discount − 2nd discount + 1)</code></li><li><strong>1st discount</strong> = <code>(Effective discount + 2nd discount × 3rd discount − 2nd discount − 3rd discount) ÷ (2nd discount × 3rd discount − 2nd discount − 3rd discount + 1)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Final price</strong> = <code>Original price × ( − 1st discount × 2nd discount × 3rd discount + 1st discount × 2nd discount + 1st discount × 3rd discount − 1st discount + 2nd discount × 3rd discount − 2nd discount − 3rd discount + 1)</code> — the form to use when Original price, 1st discount, 2nd discount and 3rd discount are the values you have.</li><li><strong>Original price</strong> = <code>− Final price ÷ (1st discount × 2nd discount × 3rd discount − 1st discount × 2nd discount − 1st discount × 3rd discount + 1st discount − 2nd discount × 3rd discount + 2nd discount + 3rd discount − 1)</code> — the form to use when Final price, 1st discount, 2nd discount and 3rd discount are the values you have.</li><li><strong>Price difference</strong> = <code>− Final price + Original price</code> — the form to use when Final price and Original price are the values you have.</li><li><strong>Original price</strong> = <code>Final price + Price difference</code> — the form to use when Final price and Price difference are the values you have.</li><li><strong>Final price</strong> = <code>Original price − Price difference</code> — the form to use when Original price and Price difference are the values you have.</li><li><strong>Effective discount</strong> = <code>1st discount × 2nd discount × 3rd discount − 1st discount × 2nd discount − 1st discount × 3rd discount + 1st discount − 2nd discount × 3rd discount + 2nd discount + 3rd discount</code> — the form to use when 1st discount, 2nd discount and 3rd discount are the values you have.</li><li><strong>3rd discount</strong> = <code>(Effective discount + 1st discount × 2nd discount − 1st discount − 2nd discount) ÷ (1st discount × 2nd discount − 1st discount − 2nd discount + 1)</code> — the form to use when Effective discount, 1st discount and 2nd discount are the values you have.</li><li><strong>1st discount</strong> = <code>(Effective discount + 2nd discount × 3rd discount − 2nd discount − 3rd discount) ÷ (2nd discount × 3rd discount − 2nd discount − 3rd discount + 1)</code> — the form to use when Effective discount, 2nd discount and 3rd discount are the values you have.</li></ul><p>Any one of Final price, 1st discount and 2nd discount can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Original price from 10 to 20, leaving every other box alone. The panel moves from <strong>Final price</strong> -8.901e+6 USD, <strong>Price difference</strong> 8.901e+6 USD and <strong>Effective discount</strong> 890110 perc to <strong>Final price</strong> -1.780e+7 USD, <strong>Price difference</strong> 1.780e+7 USD and <strong>Effective discount</strong> 890110 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> 1st discount, 2nd discount and 3rd discount carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Final price, Price difference and Effective discount are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Original price left as a guess.</strong> Anything typed into Original price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>1st discount left as a guess.</strong> Anything typed into 1st discount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Original price is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Triple discount form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Original price</strong> takes a plain number with no unit attached. It feeds 1st discount, 2nd discount and 3rd discount. Fill it from a measurement rather than a memory — Original price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>1st discount</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds 2nd discount, Original price and 3rd discount. Fill it from a measurement rather than a memory — 1st discount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>2nd discount</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds 1st discount, Original price and 3rd discount. Fill it from a measurement rather than a memory — 2nd discount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>3rd discount</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds 1st discount, 2nd discount and Original price. Fill it from a measurement rather than a memory — 3rd discount is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Final price</strong> is a plain number and the page's own defaults put it at -8.901e+6. The value follows from Original price, 1st discount, 2nd discount and 3rd discount. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Price difference</strong> is a plain number and the page's own defaults put it at 8.901e+6. The value follows from Final price and Original price. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Effective discount</strong> is a percent figure and the page's own defaults put it at 890110 perc. The value follows from 1st discount, 2nd discount and 3rd discount. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Final price</th><th>Price difference</th><th>Effective discount</th></tr></thead><tbody><tr><td><strong>Original price</strong> +10%</td><td>-10%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>1st discount</strong> +10%</td><td>-10.1%</td><td>+10.1%</td><td>+10.1%</td></tr><tr><td><strong>2nd discount</strong> +10%</td><td>-10.01%</td><td>+10.01%</td><td>+10.01%</td></tr><tr><td><strong>3rd discount</strong> +10%</td><td>-11.11%</td><td>+11.11%</td><td>+11.11%</td></tr></tbody></table><p>The steepest column belongs to 3rd discount: ten per cent there moves an answer by about 11.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Triple discount actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Final price is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Original price, 1st discount and 2nd discount are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Original price, 1st discount and 2nd discount measured, Final price and Price difference wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/margin-and-vat">Margin and VAT Calculator</a>, <a href="/finance/margin">Margin Calculator</a> and <a href="/finance/margin-call">Margin call Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Triple discount calculator work out?', 'a' => <<<'TXT'
            Final price, Price difference and Effective discount, from Original price, 1st discount, 2nd discount and 3rd discount. The relationship is Final price = Original price × ( − 1st discount × 2nd discount × 3rd discount + 1st discount × 2nd discount + 1st discount × 3rd discount − 1st discount + 2nd discount × 3rd discount − 2nd discount − 3rd discount + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Original price (USD), 1st discount (percent), 2nd discount (percent), 3rd discount (percent). Enter original price, 1st discount and 2nd discount; Final price is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Final price, 1st discount, 2nd discount and Original price blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Final price = -8.901e+6 USD, Price difference = 8.901e+6 USD and Effective discount = 890110 perc. That comes from the page's own defaults, entered in Original price; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Final price is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Original price blank and the page solves for it, reporting Final price instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Final price keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/margin-and-vat', 'name' => 'Margin and VAT Calculator'],
            ['path' => '/finance/margin', 'name' => 'Margin Calculator'],
            ['path' => '/finance/margin-call', 'name' => 'Margin call Calculator'],
        ],
        'authors' => [],
    ],
];

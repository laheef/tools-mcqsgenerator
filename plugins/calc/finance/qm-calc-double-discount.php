<?php

/**
 * Double discount
 * /finance/double-discount
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Double discount',
    'meta' => ['title' => 'Double discount Calculator: Free, With Steps', 'description' => 'Double discount works out final price and total savings from original price, 1st discount and 2nd discount. The formula is printed in the form\'s own words.', 'h1' => 'Double discount Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'originalPrice',
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
                            'name' => 'firstDiscount',
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
                            'name' => 'secondDiscount',
                            'label' => '2nd discount',
                            'type' => 'number',
                            'help' => 'The discount applied on top of the first discount.',
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
                            'name' => 'finalPrice',
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
                            'name' => 'savings',
                            'label' => 'Total savings',
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
                            'readonly' => true,
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'finalPrice = originalPrice- originalPrice * firstDiscount - (originalPrice - originalPrice * firstDiscount ) * secondDiscount',
            'results' => ['originalPrice' => 'finalPrice/(firstDiscount*secondDiscount - firstDiscount - secondDiscount + 1)', 'firstDiscount' => '(finalPrice + originalPrice*secondDiscount - originalPrice)/(originalPrice*(secondDiscount - 1))', 'secondDiscount' => '(finalPrice + firstDiscount*originalPrice - originalPrice)/(originalPrice*(firstDiscount - 1))', 'finalPrice' => 'originalPrice*(firstDiscount*secondDiscount - firstDiscount - secondDiscount + 1)'],
        ],
        [
            'title' => 'savings = originalPrice - finalPrice',
            'results' => ['savings' => '-finalPrice + originalPrice', 'originalPrice' => 'finalPrice + savings', 'finalPrice' => 'originalPrice - savings'],
        ],
        [
            'title' => 'effective_discount = firstDiscount + (1 - firstDiscount) * secondDiscount',
            'results' => ['firstDiscount' => '(-effective_discount + secondDiscount)/(secondDiscount - 1)', 'secondDiscount' => '(-effective_discount + firstDiscount)/(firstDiscount - 1)', 'effective_discount' => '-firstDiscount*secondDiscount + firstDiscount + secondDiscount'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Original price, 1st discount and 2nd discount into Double discount and the answer comes back as Effective discount. The arithmetic is the whole method: effective discount is worked out from original price by one formula, applied once. Effective discount comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Double discount calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Double discount: it takes 5 numbers and reports Effective discount.</p><p>The relationship it solves reads Final price = Original price × (1st discount × 2nd discount − 1st discount − 2nd discount + 1).</p><p>The answers are Effective discount; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Original price</strong> — in USD</li><li><strong>1st discount</strong> — in percent</li><li><strong>2nd discount</strong> — in percent. The discount applied on top of the first discount.</li><li><strong>Final price</strong> — in USD</li><li><strong>Total savings</strong> — in USD</li></ul><p>What you get back is Effective discount in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Original price = 10 USD, 1st discount = 100 perc and 2nd discount = 1000 perc gives <strong>Final price</strong> = 989010 USD, <strong>Total savings</strong> = -989000 USD and <strong>Effective discount</strong> = -98900 perc.</p><ul><li><strong>Final price</strong> = 989010 USD</li><li><strong>Total savings</strong> = -989000 USD</li><li><strong>Effective discount</strong> = -98900 perc</li></ul><p>That is <strong>Final price</strong> = <code>Original price × (1st discount × 2nd discount − 1st discount − 2nd discount + 1)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Final price</strong> = 989010, <strong>Total savings</strong> = -989000 and <strong>Effective discount</strong> = -98900. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Effective discount lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Final price</strong> = <code>Original price × (1st discount × 2nd discount − 1st discount − 2nd discount + 1)</code></li><li><strong>Original price</strong> = <code>Final price ÷ (1st discount × 2nd discount − 1st discount − 2nd discount + 1)</code></li><li><strong>1st discount</strong> = <code>(Final price + Original price × 2nd discount − Original price) ÷ (Original price × (2nd discount − 1))</code></li><li><strong>2nd discount</strong> = <code>(Final price + 1st discount × Original price − Original price) ÷ (Original price × (1st discount − 1))</code></li><li><strong>Total savings</strong> = <code>− Final price + Original price</code></li><li><strong>Effective discount</strong> = <code>− 1st discount × 2nd discount + 1st discount + 2nd discount</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Final price</strong> = <code>Original price × (1st discount × 2nd discount − 1st discount − 2nd discount + 1)</code> — the form to use when Original price, 1st discount and 2nd discount are the values you have.</li><li><strong>Original price</strong> = <code>Final price ÷ (1st discount × 2nd discount − 1st discount − 2nd discount + 1)</code> — the form to use when Final price, 1st discount and 2nd discount are the values you have.</li><li><strong>1st discount</strong> = <code>(Final price + Original price × 2nd discount − Original price) ÷ (Original price × (2nd discount − 1))</code> — the form to use when Final price, Original price and 2nd discount are the values you have.</li><li><strong>2nd discount</strong> = <code>(Final price + 1st discount × Original price − Original price) ÷ (Original price × (1st discount − 1))</code> — the form to use when Final price, 1st discount and Original price are the values you have.</li><li><strong>Total savings</strong> = <code>− Final price + Original price</code> — the form to use when Final price and Original price are the values you have.</li><li><strong>Original price</strong> = <code>Final price + Total savings</code> — the form to use when Final price and Total savings are the values you have.</li><li><strong>Final price</strong> = <code>Original price − Total savings</code> — the form to use when Original price and Total savings are the values you have.</li><li><strong>Effective discount</strong> = <code>− 1st discount × 2nd discount + 1st discount + 2nd discount</code> — the form to use when 1st discount and 2nd discount are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Final price, Original price and 1st discount can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Original price, from 10 to 20 — and the answers go from <strong>Final price</strong> 989010 USD, <strong>Total savings</strong> -989000 USD and <strong>Effective discount</strong> -98900 perc to <strong>Final price</strong> 1.978e+6 USD, <strong>Total savings</strong> -1.978e+6 USD and <strong>Effective discount</strong> -98900 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> 1st discount and 2nd discount carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Effective discount is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Original price left as a guess.</strong> Anything typed into Original price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>1st discount left as a guess.</strong> Anything typed into 1st discount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Original price and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Double discount form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Original price</strong> takes a plain number with no unit attached. Change it and 1st discount, 2nd discount and Final price changes with it. Fill it from a measurement rather than a memory — Original price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>1st discount</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Original price, 2nd discount and Final price changes with it. Fill it from a measurement rather than a memory — 1st discount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>2nd discount</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The discount applied on top of the first discount. Change it and Original price, 1st discount and Final price changes with it. Fill it from a measurement rather than a memory — 2nd discount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Final price</strong> takes a plain number with no unit attached. Change it and Original price, 1st discount and 2nd discount changes with it. Fill it from a measurement rather than a memory — Final price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total savings</strong> takes a plain number with no unit attached. Change it and Original price and Final price changes with it. Fill it from a measurement rather than a memory — Total savings is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Effective discount</strong> is a percent figure and the page's own defaults put it at -98900 perc. It is worked out from 1st discount and 2nd discount. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Final price</th><th>Total savings</th><th>Effective discount</th></tr></thead><tbody><tr><td><strong>Original price</strong> +10%</td><td>+10%</td><td>-10%</td><td>+0%</td></tr><tr><td><strong>1st discount</strong> +10%</td><td>+10.1%</td><td>-10.1%</td><td>-10.1%</td></tr><tr><td><strong>2nd discount</strong> +10%</td><td>+10.01%</td><td>-10.01%</td><td>-10.01%</td></tr></tbody></table><p>The steepest column belongs to 1st discount: ten per cent there moves an answer by about 10.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Original price = 5 USD, 1st discount = 50 perc and 2nd discount = 500 perc and the page reports <strong>Final price</strong> = 122255 USD, <strong>Total savings</strong> = -122250 USD and <strong>Effective discount</strong> = -24450 perc.</li><li>Feed in Original price = 30 USD, 1st discount = 100 perc and 2nd discount = 1000 perc and the page reports <strong>Final price</strong> = 2.967e+6 USD, <strong>Total savings</strong> = -2.967e+6 USD and <strong>Effective discount</strong> = -98900 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Double discount actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Effective discount is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Original price, 1st discount and 2nd discount are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Original price, 1st discount and 2nd discount measured, Effective discount wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/bond-ytm">Bond YTM Calculator</a>, <a href="/finance/bounce-rate">Bounce rate Calculator</a> and <a href="/finance/bradford-factor">Bradford factor Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Double discount calculator work out?', 'a' => <<<'TXT'
            Effective discount, from Original price, 1st discount and 2nd discount. The relationship is Final price = Original price × (1st discount × 2nd discount − 1st discount − 2nd discount + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Original price (USD), 1st discount (percent), 2nd discount (percent), Final price (USD), Total savings (USD). Enter original price, 1st discount and 2nd discount; Effective discount is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Final price, Original price, 1st discount and 2nd discount can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Final price = 989010 USD, Total savings = -989000 USD and Effective discount = -98900 perc. That comes from the page's own defaults, entered in Original price; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Effective discount is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Original price blank and the page solves for it, reporting Effective discount instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Effective discount at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/bond-ytm', 'name' => 'Bond YTM Calculator'],
            ['path' => '/finance/bounce-rate', 'name' => 'Bounce rate Calculator'],
            ['path' => '/finance/bradford-factor', 'name' => 'Bradford factor Calculator'],
        ],
        'authors' => [],
    ],
];

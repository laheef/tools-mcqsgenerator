<?php

/**
 * Bond equivalent yield
 * /finance/bond-equivalent-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bond equivalent yield',
    'meta' => ['title' => 'Bond equivalent yield Calculator: Free, With Steps', 'description' => 'Enter bond price and face value and get Bond equivalent yield (BEY) back. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Bond equivalent yield Calculator', 'updated' => '2024-05-09'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bond_price',
                            'label' => 'Bond price',
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
                            'name' => 'face_value',
                            'label' => 'Face value',
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
                            'name' => 'days_to_maturity',
                            'label' => 'Number of days to maturity',
                            'type' => 'number',
                            'suffix' => 'day(s)',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bond_equivalent_yield',
                            'label' => 'Bond equivalent yield (BEY)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'bond_equivalent_yield = ((face_value - bond_price) / bond_price) * (365 / days_to_maturity)',
            'results' => ['days_to_maturity' => '365*(-bond_price + face_value)/(bond_equivalent_yield*bond_price)', 'face_value' => '(1/365)*bond_price*(bond_equivalent_yield*days_to_maturity + 365)', 'bond_equivalent_yield' => '365*(-bond_price + face_value)/(bond_price*days_to_maturity)', 'bond_price' => '365*face_value/(bond_equivalent_yield*days_to_maturity + 365)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Bond price, Face value and Number of days to maturity into Bond equivalent yield and the answer comes back as Bond equivalent yield (BEY). Nothing is looked up on this page: bond equivalent yield (BEY) is computed from bond price and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Bond equivalent yield (BEY) is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Bond equivalent yield calculator works', 'html' => <<<'TXT'
            <p>Bond equivalent yield answers one question from 3 numbers, and the answer is Bond equivalent yield (BEY).</p><p>The relationship it solves reads Bond equivalent yield (BEY) = 365 × ( − Bond price + Face value) ÷ (Bond price × Number of days to maturity).</p><p>The result panel carries Bond equivalent yield (BEY), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Bond price</strong> — in USD</li><li><strong>Face value</strong> — in USD</li><li><strong>Number of days to maturity</strong> — in day(s)</li></ul><p>What you get back is Bond equivalent yield (BEY) in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Bond price = 10 USD, Face value = 100 USD and Number of days to maturity = 1000 day(s); the answers are <strong>Bond equivalent yield (BEY)</strong> = 3.29 perc.</p><ul><li><strong>Bond equivalent yield (BEY)</strong> = 3.29 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Bond equivalent yield (BEY)</strong> = <code>365 × ( − Bond price + Face value) ÷ (Bond price × Number of days to maturity)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Bond equivalent yield (BEY)</strong> = 3.29. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Bond equivalent yield (BEY) lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Bond equivalent yield (BEY)</strong> = <code>365 × ( − Bond price + Face value) ÷ (Bond price × Number of days to maturity)</code></li><li><strong>Number of days to maturity</strong> = <code>365 × ( − Bond price + Face value) ÷ (Bond equivalent yield (BEY) × Bond price)</code></li><li><strong>Face value</strong> = <code>(1 ÷ 365) × Bond price × (Bond equivalent yield (BEY) × Number of days to maturity + 365)</code></li><li><strong>Bond price</strong> = <code>365 × Face value ÷ (Bond equivalent yield (BEY) × Number of days to maturity + 365)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Bond equivalent yield (BEY)</strong> = <code>365 × ( − Bond price + Face value) ÷ (Bond price × Number of days to maturity)</code> — the form to use when Bond price, Face value and Number of days to maturity are the values you have.</li><li><strong>Number of days to maturity</strong> = <code>365 × ( − Bond price + Face value) ÷ (Bond equivalent yield (BEY) × Bond price)</code> — the form to use when Bond price, Face value and Bond equivalent yield (BEY) are the values you have.</li><li><strong>Face value</strong> = <code>(1 ÷ 365) × Bond price × (Bond equivalent yield (BEY) × Number of days to maturity + 365)</code> — the form to use when Bond price, Bond equivalent yield (BEY) and Number of days to maturity are the values you have.</li><li><strong>Bond price</strong> = <code>365 × Face value ÷ (Bond equivalent yield (BEY) × Number of days to maturity + 365)</code> — the form to use when Face value, Bond equivalent yield (BEY) and Number of days to maturity are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Bond equivalent yield (BEY), Number of days to maturity and Face value can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Bond price, from 10 to 20 — and the answers go from <strong>Bond equivalent yield (BEY)</strong> 3.29 perc to <strong>Bond equivalent yield (BEY)</strong> 1.46 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Bond equivalent yield (BEY) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Bond price left as a guess.</strong> Anything typed into Bond price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Face value left as a guess.</strong> Anything typed into Face value is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Number of days to maturity left as a guess.</strong> Anything typed into Number of days to maturity is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Bond price to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Bond equivalent yield form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Bond price</strong> takes a plain number with no unit attached. Change it and Number of days to maturity, Face value and Bond equivalent yield (BEY) changes with it. Fill it from a measurement rather than a memory — Bond price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Face value</strong> takes a plain number with no unit attached. Change it and Number of days to maturity, Bond equivalent yield (BEY) and Bond price changes with it. Fill it from a measurement rather than a memory — Face value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of days to maturity</strong> is measured in day(s). Change it and Face value, Bond equivalent yield (BEY) and Bond price changes with it. Fill it from a measurement rather than a memory — Number of days to maturity is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Bond equivalent yield (BEY)</strong> is a percent figure and the page's own defaults put it at 3.29 perc. The value follows from Bond price, Face value and Number of days to maturity. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Bond equivalent yield (BEY)</th></tr></thead><tbody><tr><td><strong>Bond price</strong> +10%</td><td>-10.1%</td></tr><tr><td><strong>Face value</strong> +10%</td><td>+11.11%</td></tr><tr><td><strong>Number of days to maturity</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Face value: ten per cent there moves an answer by about 11.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Bond price = 5 USD, Face value = 50 USD and Number of days to maturity = 500 day(s) and the page reports <strong>Bond equivalent yield (BEY)</strong> = 6.57 perc.</li><li>Feed in Bond price = 30 USD, Face value = 100 USD and Number of days to maturity = 1000 day(s) and the page reports <strong>Bond equivalent yield (BEY)</strong> = 0.8517 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Bond equivalent yield actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Bond equivalent yield (BEY) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Bond price, Face value and Number of days to maturity are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Bond price, Face value and Number of days to maturity and the number you are missing is Bond equivalent yield (BEY).</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/net-to-gross">Net to gross Calculator</a>, <a href="/finance/net-worth">Net worth Calculator</a> and <a href="/finance/new-jersey-sales-tax">New Jersey sales tax</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bond equivalent yield calculator work out?', 'a' => <<<'TXT'
            Bond equivalent yield (BEY), from Bond price, Face value and Number of days to maturity. The relationship is Bond equivalent yield (BEY) = 365 × ( − Bond price + Face value) ÷ (Bond price × Number of days to maturity).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Bond price (USD), Face value (USD), Number of days to maturity (day(s)). Fill bond price, face value and number of days to maturity and leave Bond equivalent yield (BEY) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Bond equivalent yield (BEY), Number of days to maturity, Face value and Bond price can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Bond equivalent yield (BEY) = 3.29 perc. The figures come from Bond price as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Bond equivalent yield (BEY) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Bond price blank and the page solves for it, reporting Bond equivalent yield (BEY) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Bond equivalent yield (BEY) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/net-to-gross', 'name' => 'Net to gross Calculator'],
            ['path' => '/finance/net-worth', 'name' => 'Net worth Calculator'],
            ['path' => '/finance/new-jersey-sales-tax', 'name' => 'New Jersey sales tax'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * Capital gains yield
 * /finance/capital-gains-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Capital gains yield',
    'meta' => ['title' => 'Capital gains yield — Free Online Calculator', 'description' => 'Capital gains yield works out capital gains from bought price and current price. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Capital gains yield Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => 'Capital gains',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bought_price',
                            'label' => 'Bought price',
                            'type' => 'number',
                            'help' => 'The price of the stock when you bought it.',
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
                            'name' => 'current_price',
                            'label' => 'Current price',
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
            'title' => 'Capital gains yield',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'capital_gains',
                            'label' => 'Capital gains',
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
                            'name' => 'capital_gains_yield',
                            'label' => 'Capital gains yield',
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
            'title' => 'capital_gains = current_price - bought_price',
            'results' => ['bought_price' => '-capital_gains + current_price', 'capital_gains' => '-bought_price + current_price', 'current_price' => 'bought_price + capital_gains'],
        ],
        [
            'title' => 'capital_gains_yield = capital_gains / bought_price',
            'results' => ['bought_price' => 'capital_gains/capital_gains_yield', 'capital_gains_yield' => 'capital_gains/bought_price', 'capital_gains' => 'bought_price*capital_gains_yield'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Capital gains yield works out Capital gains and Capital gains yield from Bought price and Current price. Nothing is looked up on this page: capital gains is computed from bought price and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Capital gains is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Capital gains yield calculator works', 'html' => <<<'TXT'
            <p>Capital gains yield answers one question from 2 numbers, and the answer is Capital gains and Capital gains yield.</p><p>In the form&#039;s own words, Capital gains = − Bought price + Current price.</p><p>The result panel carries Capital gains and Capital gains yield, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Bought price</strong> — in USD. The price of the stock when you bought it.</li><li><strong>Current price</strong> — in USD</li></ul><p>What you get back is Capital gains in USD, Capital gains yield in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Bought price = 10 USD and Current price = 100 USD gives <strong>Capital gains</strong> = 90 USD and <strong>Capital gains yield</strong> = 9 perc.</p><ul><li><strong>Capital gains</strong> = 90 USD</li><li><strong>Capital gains yield</strong> = 9 perc</li></ul><p>That is <strong>Capital gains</strong> = <code>− Bought price + Current price</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Capital gains</strong> = 90 and <strong>Capital gains yield</strong> = 9. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Capital gains yield lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Capital gains</strong> = <code>− Bought price + Current price</code></li><li><strong>Bought price</strong> = <code>− Capital gains + Current price</code></li><li><strong>Current price</strong> = <code>Bought price + Capital gains</code></li><li><strong>Capital gains yield</strong> = <code>Capital gains ÷ Bought price</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Capital gains</strong> = <code>− Bought price + Current price</code> — the form to use when Bought price and Current price are the values you have.</li><li><strong>Bought price</strong> = <code>− Capital gains + Current price</code> — the form to use when Capital gains and Current price are the values you have.</li><li><strong>Current price</strong> = <code>Bought price + Capital gains</code> — the form to use when Bought price and Capital gains are the values you have.</li><li><strong>Capital gains yield</strong> = <code>Capital gains ÷ Bought price</code> — the form to use when Capital gains and Bought price are the values you have.</li><li><strong>Bought price</strong> = <code>Capital gains ÷ Capital gains yield</code> — the form to use when Capital gains and Capital gains yield are the values you have.</li><li><strong>Capital gains</strong> = <code>Bought price × Capital gains yield</code> — the form to use when Bought price and Capital gains yield are the values you have.</li></ul><p>Any one of Capital gains, Bought price and Current price can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Bought price, from 10 to 20 — and the answers go from <strong>Capital gains</strong> 90 USD and <strong>Capital gains yield</strong> 9 perc to <strong>Capital gains</strong> 80 USD and <strong>Capital gains yield</strong> 4 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Capital gains and Capital gains yield are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Bought price left as a guess.</strong> Anything typed into Bought price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Current price left as a guess.</strong> Anything typed into Current price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Bought price is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Bought price</strong> takes a plain number with no unit attached. The price of the stock when you bought it. The page reads it when it works out Capital gains, Current price and Capital gains yield. Have it to hand before you start: Bought price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Current price</strong> takes a plain number with no unit attached. The page reads it when it works out Bought price and Capital gains. Have it to hand before you start: Current price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Capital gains</strong> is a plain number and the page's own defaults put it at 90. It is worked out from Bought price and Current price. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Capital gains yield</strong> is a percent figure and the page's own defaults put it at 9 perc. It is worked out from Capital gains and Bought price. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Capital gains</th><th>Capital gains yield</th></tr></thead><tbody><tr><td><strong>Bought price</strong> +10%</td><td>-1.11%</td><td>-10.1%</td></tr><tr><td><strong>Current price</strong> +10%</td><td>+11.11%</td><td>+11.11%</td></tr></tbody></table><p>The steepest column belongs to Current price: ten per cent there moves an answer by about 11.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Bought price = 5 USD and Current price = 50 USD, the answer is <strong>Capital gains</strong> = 45 USD and <strong>Capital gains yield</strong> = 9 perc.</li><li>With Bought price = 30 USD and Current price = 100 USD, the answer is <strong>Capital gains</strong> = 70 USD and <strong>Capital gains yield</strong> = 2.33 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Capital gains is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Bought price and Current price are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Bought price and Current price and the number you are missing is Capital gains and Capital gains yield.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/wacc">WACC</a>, <a href="/finance/wage">Wage Calculator</a> and <a href="/finance/wage-to-salary">Wage to salary Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Capital gains yield is a number to act on, so the useful question is what to do with Capital gains (USD) and Capital gains yield (perc) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Bought price and Current price alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Capital gains yield calculator work out?', 'a' => 'Capital gains and Capital gains yield, from Bought price and Current price. The relationship is Capital gains = − Bought price + Current price.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Bought price (USD), Current price (USD). Fill bought price and current price and leave Capital gains empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Capital gains, Bought price, Current price and Capital gains yield blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Capital gains = 90 USD and Capital gains yield = 9 perc. The figures come from Bought price as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Capital gains is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Bought price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Capital gains at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/wacc', 'name' => 'WACC'],
            ['path' => '/finance/wage', 'name' => 'Wage Calculator'],
            ['path' => '/finance/wage-to-salary', 'name' => 'Wage to salary Calculator'],
        ],
        'authors' => [],
    ],
];

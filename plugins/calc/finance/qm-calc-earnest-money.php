<?php

/**
 * Earnest money
 * /finance/earnest-money
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Earnest money',
    'meta' => ['title' => 'Earnest money Calculator — Formula & Results', 'description' => 'Enter property price and earnest money percentage and get earnest money needed back. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Earnest money Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'property_price',
                            'label' => 'Property price',
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
                            'name' => 'earnest_money_percentage',
                            'label' => 'Earnest money percentage',
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
                            'name' => 'earnest_money_needed',
                            'label' => 'Earnest money needed',
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
            'title' => 'earnest_money_needed = property_price * earnest_money_percentage',
            'results' => ['earnest_money_needed' => 'earnest_money_percentage*property_price', 'earnest_money_percentage' => 'earnest_money_needed/property_price', 'property_price' => 'earnest_money_needed/earnest_money_percentage'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Property price and Earnest money percentage into Earnest money and the answer comes back as Earnest money needed. Nothing is looked up on this page: earnest money needed is computed from property price and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Earnest money needed is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Earnest money calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Earnest money: it takes 2 numbers and reports Earnest money needed.</p><p>The relationship it solves reads Earnest money needed = Earnest money percentage × Property price.</p><p>What comes back is Earnest money needed — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Property price</strong> — in USD</li><li><strong>Earnest money percentage</strong> — in percent</li></ul><p>The answer comes back as Earnest money needed in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Property price = 10 USD and Earnest money percentage = 100 perc — through the same formula and the panel reports <strong>Earnest money needed</strong> = 1000 USD.</p><ul><li><strong>Earnest money needed</strong> = 1000 USD</li></ul><p>The line behind those figures is <strong>Earnest money needed</strong> = <code>Earnest money percentage × Property price</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Earnest money needed</strong> = 1000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Earnest money percentage lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Earnest money needed</strong> = <code>Earnest money percentage × Property price</code></li><li><strong>Earnest money percentage</strong> = <code>Earnest money needed ÷ Property price</code></li><li><strong>Property price</strong> = <code>Earnest money needed ÷ Earnest money percentage</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Earnest money needed</strong> = <code>Earnest money percentage × Property price</code> — the form to use when Earnest money percentage and Property price are the values you have.</li><li><strong>Earnest money percentage</strong> = <code>Earnest money needed ÷ Property price</code> — the form to use when Earnest money needed and Property price are the values you have.</li><li><strong>Property price</strong> = <code>Earnest money needed ÷ Earnest money percentage</code> — the form to use when Earnest money needed and Earnest money percentage are the values you have.</li></ul><p>Any one of Earnest money needed, Earnest money percentage and Property price can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Property price, from 10 to 20 — and the answers go from <strong>Earnest money needed</strong> 1000 USD to <strong>Earnest money needed</strong> 2000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Earnest money percentage carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Earnest money needed is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Property price left as a guess.</strong> Anything typed into Property price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Earnest money percentage left as a guess.</strong> Anything typed into Earnest money percentage is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Property price and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Earnest money form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Property price</strong> takes a plain number with no unit attached. The page reads it when it works out Earnest money needed and Earnest money percentage. Fill it from a measurement rather than a memory — Property price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Earnest money percentage</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Earnest money needed and Property price. Fill it from a measurement rather than a memory — Earnest money percentage is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Earnest money needed</strong> is a plain number and the page's own defaults put it at 1000. It is computed from Earnest money percentage and Property price, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Earnest money needed</th></tr></thead><tbody><tr><td><strong>Property price</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Earnest money percentage</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Earnest money percentage: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Property price = 5 USD and Earnest money percentage = 50 perc and the page reports <strong>Earnest money needed</strong> = 250 USD.</li><li>Feed in Property price = 30 USD and Earnest money percentage = 100 perc and the page reports <strong>Earnest money needed</strong> = 3000 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Earnest money actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Property price and Earnest money percentage ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Property price — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Earnest money needed in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Earnest money needed is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Property price and Earnest money percentage are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Property price and Earnest money percentage measured, Earnest money needed wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/bond-price">Bond price</a>, <a href="/finance/bond-yield">Bond yield Calculator</a> and <a href="/finance/bond-ytm">Bond YTM Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Earnest money calculator work out?', 'a' => 'Earnest money needed, from Earnest money percentage and Property price. The relationship is Earnest money needed = Earnest money percentage × Property price.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Property price (USD), Earnest money percentage (percent). Enter property price and earnest money percentage; Earnest money needed is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Earnest money needed, Earnest money percentage and Property price blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Earnest money needed = 1000 USD. That comes from the page\'s own defaults, entered in Property price; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Earnest money needed is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Property price blank and the page solves for it, reporting Earnest money needed instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Earnest money needed keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/bond-price', 'name' => 'Bond price'],
            ['path' => '/finance/bond-yield', 'name' => 'Bond yield Calculator'],
            ['path' => '/finance/bond-ytm', 'name' => 'Bond YTM Calculator'],
        ],
        'authors' => [],
    ],
];

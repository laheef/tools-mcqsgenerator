<?php

/**
 * Yield to call
 * /finance/yield-to-call
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Yield to call',
    'meta' => ['title' => 'Yield to call Calculator — Formula & Results', 'description' => 'Enter annual interest and call price and get yield to call back. The answer is shown in perc. Every box can be solved for, not only the one in the title.', 'h1' => 'Yield to call Calculator', 'updated' => '2024-07-05'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annual_interest',
                            'label' => 'Annual interest',
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
                            'name' => 'call_price',
                            'label' => 'Call price',
                            'type' => 'number',
                            'help' => 'Also known as "redemption price", this is the price at which the issuer of a callable bond has the right to buy back the bond from investors.',
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
                            'name' => 'market_price',
                            'label' => 'Market price',
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
                            'name' => 'number_of_years_until_call',
                            'label' => 'Number of years until call',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yield_to_call',
                            'label' => 'Yield to call',
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
            'title' => 'yield_to_call = ( annual_interest + ( (call_price - market_price) / number_of_years_until_call) ) / ( (call_price + market_price) / 2 )',
            'results' => [
                'call_price' => <<<'TXT'
                (2*annual_interest*number_of_years_until_call - market_price*number_of_years_until_call*yield_to_call - 2*market_price)/(number_of_years_until_call*yield_to_call - 2)
                TXT,
                'number_of_years_until_call' => '2*(call_price - market_price)/(-2*annual_interest + call_price*yield_to_call + market_price*yield_to_call)',
                'annual_interest' => '(-call_price + market_price + (1/2)*number_of_years_until_call*yield_to_call*(call_price + market_price))/number_of_years_until_call',
                'yield_to_call' => '2*(annual_interest*number_of_years_until_call + call_price - market_price)/(number_of_years_until_call*(call_price + market_price))',
                'market_price' => <<<'TXT'
                (2*annual_interest*number_of_years_until_call - call_price*number_of_years_until_call*yield_to_call + 2*call_price)/(number_of_years_until_call*yield_to_call + 2)
                TXT,
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Annual interest, Call price and Market price into Yield to call and the answer comes back as Yield to call. Nothing is looked up on this page: yield to call is computed from annual interest and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Yield to call is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Yield to call calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Yield to call: it takes 4 numbers and reports Yield to call.</p><p>Written with the labels from the form, Yield to call = 2 × (Annual interest × Number of years until call + Call price − Market price) ÷ (Number of years until call × (Call price + Market price)).</p><p>What comes back is Yield to call — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Annual interest</strong> — in USD</li><li><strong>Call price</strong> — in USD. Also known as &quot;redemption price&quot;, this is the price at which the issuer of a callable bond has the right to buy back the bond from investors.</li><li><strong>Market price</strong> — in USD</li><li><strong>Number of years until call</strong> — in years</li></ul><p>The result box is Yield to call in percent. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Annual interest = 10 USD, Call price = 100 USD, Market price = 1000 USD and Number of years until call = 10 yrs gives <strong>Yield to call</strong> = -5.164e+6 perc.</p><ul><li><strong>Yield to call</strong> = -5.164e+6 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Yield to call</strong> = <code>2 × (Annual interest × Number of years until call + Call price − Market price) ÷ (Number of years until call × (Call price + Market price))</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Yield to call</strong> = -5.164e+6. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Yield to call lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Yield to call</strong> = <code>2 × (Annual interest × Number of years until call + Call price − Market price) ÷ (Number of years until call × (Call price + Market price))</code></li><li><strong>Call price</strong> = <code>(2 × Annual interest × Number of years until call − Market price × Number of years until call × Yield to call − 2 × Market price) ÷ (Number of years until call × Yield to call − 2)</code></li><li><strong>Number of years until call</strong> = <code>2 × (Call price − Market price) ÷ ( − 2 × Annual interest + Call price × Yield to call + Market price × Yield to call)</code></li><li><strong>Annual interest</strong> = <code>( − Call price + Market price + (1 ÷ 2) × Number of years until call × Yield to call × (Call price + Market price)) ÷ Number of years until call</code></li><li><strong>Market price</strong> = <code>(2 × Annual interest × Number of years until call − Call price × Number of years until call × Yield to call + 2 × Call price) ÷ (Number of years until call × Yield to call + 2)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Yield to call</strong> = <code>2 × (Annual interest × Number of years until call + Call price − Market price) ÷ (Number of years until call × (Call price + Market price))</code> — the form to use when Annual interest, Number of years until call, Call price and Market price are the values you have.</li><li><strong>Call price</strong> = <code>(2 × Annual interest × Number of years until call − Market price × Number of years until call × Yield to call − 2 × Market price) ÷ (Number of years until call × Yield to call − 2)</code> — the form to use when Annual interest, Number of years until call, Market price and Yield to call are the values you have.</li><li><strong>Number of years until call</strong> = <code>2 × (Call price − Market price) ÷ ( − 2 × Annual interest + Call price × Yield to call + Market price × Yield to call)</code> — the form to use when Call price, Market price, Annual interest and Yield to call are the values you have.</li><li><strong>Annual interest</strong> = <code>( − Call price + Market price + (1 ÷ 2) × Number of years until call × Yield to call × (Call price + Market price)) ÷ Number of years until call</code> — the form to use when Call price, Market price, Number of years until call and Yield to call are the values you have.</li><li><strong>Market price</strong> = <code>(2 × Annual interest × Number of years until call − Call price × Number of years until call × Yield to call + 2 × Call price) ÷ (Number of years until call × Yield to call + 2)</code> — the form to use when Annual interest, Number of years until call, Call price and Yield to call are the values you have.</li></ul><p>Any one of Yield to call, Call price and Number of years until call can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Annual interest, from 10 to 20 — and the answers go from <strong>Yield to call</strong> -5.164e+6 perc to <strong>Yield to call</strong> -5.164e+6 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Number of years until call carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Yield to call is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Annual interest left as a guess.</strong> Anything typed into Annual interest is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Call price left as a guess.</strong> Anything typed into Call price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Annual interest and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Yield to call form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Annual interest</strong> takes a plain number with no unit attached. It feeds Call price, Number of years until call and Yield to call. Fill it from a measurement rather than a memory — Annual interest is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Call price</strong> takes a plain number with no unit attached. Also known as &quot;redemption price&quot;, this is the price at which the issuer of a callable bond has the right to buy back the bond from investors. It feeds Number of years until call, Annual interest and Yield to call. Fill it from a measurement rather than a memory — Call price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Market price</strong> takes a plain number with no unit attached. It feeds Call price, Number of years until call and Annual interest. Fill it from a measurement rather than a memory — Market price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of years until call</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. It feeds Call price, Annual interest and Yield to call. Fill it from a measurement rather than a memory — Number of years until call is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Yield to call</strong> is a percent figure and the page's own defaults put it at -5.164e+6 perc. The value follows from Annual interest, Number of years until call, Call price and Market price. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Yield to call</th></tr></thead><tbody><tr><td><strong>Annual interest</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Call price</strong> +10%</td><td>+2%</td></tr><tr><td><strong>Market price</strong> +10%</td><td>-1.85%</td></tr><tr><td><strong>Number of years until call</strong> +10%</td><td>+9.09%</td></tr></tbody></table><p>The steepest column belongs to Number of years until call: ten per cent there moves an answer by about 9.1 per cent, which is why that is the number to measure twice. By contrast, Annual interest barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Annual interest = 5 USD, Call price = 50 USD, Market price = 500 USD and Number of years until call = 5 yrs and the page reports <strong>Yield to call</strong> = -1.033e+7 perc.</li><li>Feed in Annual interest = 30 USD, Call price = 100 USD, Market price = 1000 USD and Number of years until call = 10 yrs and the page reports <strong>Yield to call</strong> = -5.164e+6 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Yield to call actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Yield to call is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Annual interest, Call price and Market price are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Annual interest, Call price and Market price and the number you are missing is Yield to call.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/loan-balance">Loan balance</a>, <a href="/finance/loan">Loan Calculator</a> and <a href="/finance/loan-interest">Loan interest Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Yield to call calculator work out?', 'a' => <<<'TXT'
            Yield to call, from Annual interest, Number of years until call, Call price and Market price. The relationship is Yield to call = 2 × (Annual interest × Number of years until call + Call price − Market price) ÷ (Number of years until call × (Call price + Market price)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Annual interest (USD), Call price (USD), Market price (USD), Number of years until call (years). Enter annual interest, call price and market price; Yield to call is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Yield to call, Call price, Number of years until call and Annual interest blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Yield to call = -5.164e+6 perc. The figures come from Annual interest as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Yield to call is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Annual interest blank and the page solves for it, reporting Yield to call instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Yield to call keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/loan-balance', 'name' => 'Loan balance'],
            ['path' => '/finance/loan', 'name' => 'Loan Calculator'],
            ['path' => '/finance/loan-interest', 'name' => 'Loan interest Calculator'],
        ],
        'authors' => [],
    ],
];

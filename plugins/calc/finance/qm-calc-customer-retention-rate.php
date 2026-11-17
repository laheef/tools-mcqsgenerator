<?php

/**
 * Customer retention rate
 * /finance/customer-retention-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Customer retention rate',
    'meta' => ['title' => 'Customer retention rate — Free Online Calculator', 'description' => 'Customer retention rate takes existing customers, new customers and total customers and returns attrition rate. The formula is printed in the form\'s own words.', 'h1' => 'Customer retention rate Calculator', 'updated' => '2024-05-31'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beg_cus',
                            'label' => 'Existing customers',
                            'type' => 'number',
                            'help' => 'How many customers at the beginning of the period?',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'new_cus',
                            'label' => 'New customers',
                            'type' => 'number',
                            'help' => 'How many new customers acquired during the period?',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'end_cus',
                            'label' => 'Total customers',
                            'type' => 'number',
                            'help' => 'How many customers at the end of the period?',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'attrition_rate',
                            'label' => 'Attrition rate',
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
                            'name' => 'cus_ret',
                            'label' => 'Customer retention rate',
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
            'title' => 'cus_ret = (end_cus - new_cus) / beg_cus',
            'results' => ['beg_cus' => '(end_cus - new_cus)/cus_ret', 'end_cus' => 'beg_cus*cus_ret + new_cus', 'new_cus' => '-beg_cus*cus_ret + end_cus', 'cus_ret' => '(end_cus - new_cus)/beg_cus'],
        ],
        [
            'title' => 'attrition_rate = 1 - cus_ret',
            'results' => ['cus_ret' => '1 - attrition_rate', 'attrition_rate' => '1 - cus_ret'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Customer retention rate works out Attrition rate and Customer retention rate from Existing customers, New customers and Total customers. The arithmetic is the whole method: attrition rate is worked out from existing customers by one formula, applied once. Attrition rate comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Customer retention rate calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Customer retention rate: it takes 3 numbers and reports Attrition rate and Customer retention rate.</p><p>Written with the labels from the form, Customer retention rate = (Total customers − New customers) ÷ Existing customers.</p><p>What comes back is Attrition rate and Customer retention rate — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Existing customers</strong> — a plain number, no unit. How many customers at the beginning of the period?</li><li><strong>New customers</strong> — a plain number, no unit. How many new customers acquired during the period?</li><li><strong>Total customers</strong> — a plain number, no unit. How many customers at the end of the period?</li></ul><p>The result boxes are Attrition rate in percent, Customer retention rate in percent; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Existing customers = 10, New customers = 100 and Total customers = 1000 — through the same formula and the panel reports <strong>Customer retention rate</strong> = 90 perc and <strong>Attrition rate</strong> = -89 perc.</p><ul><li><strong>Customer retention rate</strong> = 90 perc</li><li><strong>Attrition rate</strong> = -89 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Customer retention rate</strong> = <code>(Total customers − New customers) ÷ Existing customers</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Customer retention rate</strong> = 90 and <strong>Attrition rate</strong> = -89. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Attrition rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Customer retention rate</strong> = <code>(Total customers − New customers) ÷ Existing customers</code></li><li><strong>Existing customers</strong> = <code>(Total customers − New customers) ÷ Customer retention rate</code></li><li><strong>Total customers</strong> = <code>Existing customers × Customer retention rate + New customers</code></li><li><strong>New customers</strong> = <code>− Existing customers × Customer retention rate + Total customers</code></li><li><strong>Attrition rate</strong> = <code>1 − Customer retention rate</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Customer retention rate</strong> = <code>(Total customers − New customers) ÷ Existing customers</code> — the form to use when Total customers, New customers and Existing customers are the values you have.</li><li><strong>Existing customers</strong> = <code>(Total customers − New customers) ÷ Customer retention rate</code> — the form to use when Total customers, New customers and Customer retention rate are the values you have.</li><li><strong>Total customers</strong> = <code>Existing customers × Customer retention rate + New customers</code> — the form to use when Existing customers, Customer retention rate and New customers are the values you have.</li><li><strong>New customers</strong> = <code>− Existing customers × Customer retention rate + Total customers</code> — the form to use when Existing customers, Customer retention rate and Total customers are the values you have.</li><li><strong>Attrition rate</strong> = <code>1 − Customer retention rate</code> — the form to use when Customer retention rate are the values you have.</li><li><strong>Customer retention rate</strong> = <code>1 − Attrition rate</code> — the form to use when Attrition rate are the values you have.</li></ul><p>Any one of Customer retention rate, Existing customers and Total customers can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Existing customers, from 10 to 20 — and the answers go from <strong>Customer retention rate</strong> 90 perc and <strong>Attrition rate</strong> -89 perc to <strong>Customer retention rate</strong> 45 perc and <strong>Attrition rate</strong> -44 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Attrition rate and Customer retention rate are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Existing customers left as a guess.</strong> Anything typed into Existing customers is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>New customers left as a guess.</strong> Anything typed into New customers is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Total customers left as a guess.</strong> Anything typed into Total customers is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Existing customers and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Customer retention rate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Existing customers</strong> takes a plain number with no unit attached. How many customers at the beginning of the period?. The page reads it when it works out Total customers, New customers and Customer retention rate. Fill it from a measurement rather than a memory — Existing customers is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>New customers</strong> takes a plain number with no unit attached. How many new customers acquired during the period?. The page reads it when it works out Existing customers, Total customers and Customer retention rate. Fill it from a measurement rather than a memory — New customers is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total customers</strong> takes a plain number with no unit attached. How many customers at the end of the period?. The page reads it when it works out Existing customers, New customers and Customer retention rate. Fill it from a measurement rather than a memory — Total customers is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Attrition rate</strong> is a percent figure and the page's own defaults put it at -89 perc. It is computed from Customer retention rate, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Customer retention rate</strong> is a percent figure and the page's own defaults put it at 90 perc. It is computed from Total customers, New customers and Existing customers, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Customer retention rate</th><th>Attrition rate</th></tr></thead><tbody><tr><td><strong>Existing customers</strong> +10%</td><td>-9.09%</td><td>+9.19%</td></tr><tr><td><strong>New customers</strong> +10%</td><td>-1.11%</td><td>+1.12%</td></tr><tr><td><strong>Total customers</strong> +10%</td><td>+11.11%</td><td>-11.24%</td></tr></tbody></table><p>The steepest column belongs to Total customers: ten per cent there moves an answer by about 11.2 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Existing customers = 5, New customers = 50 and Total customers = 500 and the page reports <strong>Customer retention rate</strong> = 90 perc and <strong>Attrition rate</strong> = -89 perc.</li><li>Feed in Existing customers = 30, New customers = 100 and Total customers = 1000 and the page reports <strong>Customer retention rate</strong> = 30 perc and <strong>Attrition rate</strong> = -29 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Customer retention rate actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Attrition rate is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Existing customers, New customers and Total customers and the number you are missing is Attrition rate and Customer retention rate.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/price-elasticity-demand">Price elasticity of demand Calculator</a>, <a href="/finance/price-elasticity-supply">Price elasticity of supply Calculator</a> and <a href="/finance/price-per-share">Price per share Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Customer retention rate calculator work out?', 'a' => <<<'TXT'
            Attrition rate and Customer retention rate, from Total customers, New customers and Existing customers. The relationship is Customer retention rate = (Total customers − New customers) ÷ Existing customers.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Existing customers, New customers, Total customers. With existing customers, new customers and total customers in place, Attrition rate can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Customer retention rate, Existing customers, Total customers and New customers blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Customer retention rate = 90 perc and Attrition rate = -89 perc. That comes from the page's own defaults, entered in Existing customers; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Attrition rate is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Existing customers blank and the page solves for it, reporting Attrition rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Attrition rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/price-elasticity-demand', 'name' => 'Price elasticity of demand Calculator'],
            ['path' => '/finance/price-elasticity-supply', 'name' => 'Price elasticity of supply Calculator'],
            ['path' => '/finance/price-per-share', 'name' => 'Price per share Calculator'],
        ],
        'authors' => [],
    ],
];

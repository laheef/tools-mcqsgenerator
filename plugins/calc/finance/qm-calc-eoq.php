<?php

/**
 * Economic order quantity (EOQ)
 * /finance/eoq
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Economic order quantity (EOQ)',
    'meta' => ['title' => 'Economic order quantity (EOQ) — Formula & Results', 'description' => 'Enter yearly demand and order cost and get Economic order quantity (EOQ) back. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Economic order quantity (EOQ) Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yearlyDemand',
                            'label' => 'Yearly demand',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'orderCost',
                            'label' => 'Order cost',
                            'type' => 'number',
                            'suffix' => ' per order',
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
                            'name' => 'holdingCost',
                            'label' => 'Yearly cost of holding',
                            'type' => 'number',
                            'suffix' => ' per unit',
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
                            'name' => 'economicOrderQuantity',
                            'label' => 'Economic order quantity (EOQ)',
                            'type' => 'number',
                            'unit' => '97',
                            'unit_default' => 'unit',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'economicOrderQuantityPrint',
                            'label' => 'Eoq print',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'To minimize your holding and order costs, you should order {{economicOrderQuantityPrint.formattedValue}} units.'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'economicOrderQuantity = (2 * yearlyDemand * orderCost / holdingCost) ^ (0.5)',
            'results' => ['economicOrderQuantity' => 'sqrt(2)*sqrt(orderCost*yearlyDemand/holdingCost)', 'orderCost' => '(1/2)*pow(economicOrderQuantity, 2)*holdingCost/yearlyDemand', 'holdingCost' => '2*orderCost*yearlyDemand/pow(economicOrderQuantity, 2)', 'yearlyDemand' => '(1/2)*pow(economicOrderQuantity, 2)*holdingCost/orderCost'],
        ],
        [
            'title' => 'economicOrderQuantityPrint = economicOrderQuantity',
            'results' => ['economicOrderQuantity' => 'economicOrderQuantityPrint', 'economicOrderQuantityPrint' => 'economicOrderQuantity'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Yearly demand, Order cost and Yearly cost of holding into Economic order quantity (EOQ) and the answer comes back as Economic order quantity (EOQ) and Eoq print. There is no hidden constant here: change economic order quantity (EOQ) and yearly demand moves with it. The main result, Economic order quantity (EOQ), is reported in units/points (1).
        TXT,
        'sections' => [
            ['title' => 'How the Economic order quantity (EOQ) calculator works', 'html' => <<<'TXT'
            <p>The Economic order quantity (EOQ) calculator applies one relationship to 3 numbers and reports Economic order quantity (EOQ) and Eoq print.</p><p>The relationship it solves reads Economic order quantity (EOQ) = √(2) × √(Order cost × Yearly demand ÷ Yearly cost of holding).</p><p>The result panel carries Economic order quantity (EOQ) and Eoq print, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Yearly demand</strong> — in units/points (1)</li><li><strong>Order cost</strong> — in per order</li><li><strong>Yearly cost of holding</strong> — in per unit</li></ul><p>What you get back is Economic order quantity (EOQ) in units/points (1), Eoq print, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Yearly demand = 10 unit, Order cost = 100 per order and Yearly cost of holding = 1000 per unit gives <strong>Economic order quantity (EOQ)</strong> = 1.41 unit and <strong>Eoq print</strong> = 1.41.</p><ul><li><strong>Economic order quantity (EOQ)</strong> = 1.41 unit</li><li><strong>Eoq print</strong> = 1.41</li></ul><p>The line behind those figures is <strong>Economic order quantity (EOQ)</strong> = <code>√(2) × √(Order cost × Yearly demand ÷ Yearly cost of holding)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Economic order quantity (EOQ)</strong> = 1.41 and <strong>Eoq print</strong> = 1.41. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Economic order quantity (EOQ) lists 9 options and opens on units/points (1). Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Economic order quantity (EOQ)</strong> = <code>√(2) × √(Order cost × Yearly demand ÷ Yearly cost of holding)</code></li><li><strong>Order cost</strong> = <code>(1 ÷ 2) × (Economic order quantity (EOQ))^(2) × Yearly cost of holding ÷ Yearly demand</code></li><li><strong>Yearly cost of holding</strong> = <code>2 × Order cost × Yearly demand ÷ (Economic order quantity (EOQ))^(2)</code></li><li><strong>Yearly demand</strong> = <code>(1 ÷ 2) × (Economic order quantity (EOQ))^(2) × Yearly cost of holding ÷ Order cost</code></li><li><strong>Eoq print</strong> = <code>Economic order quantity (EOQ)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Economic order quantity (EOQ)</strong> = <code>√(2) × √(Order cost × Yearly demand ÷ Yearly cost of holding)</code> — the form to use when Order cost, Yearly demand and Yearly cost of holding are the values you have.</li><li><strong>Order cost</strong> = <code>(1 ÷ 2) × (Economic order quantity (EOQ))^(2) × Yearly cost of holding ÷ Yearly demand</code> — the form to use when Economic order quantity (EOQ), Yearly cost of holding and Yearly demand are the values you have.</li><li><strong>Yearly cost of holding</strong> = <code>2 × Order cost × Yearly demand ÷ (Economic order quantity (EOQ))^(2)</code> — the form to use when Order cost, Yearly demand and Economic order quantity (EOQ) are the values you have.</li><li><strong>Yearly demand</strong> = <code>(1 ÷ 2) × (Economic order quantity (EOQ))^(2) × Yearly cost of holding ÷ Order cost</code> — the form to use when Economic order quantity (EOQ), Yearly cost of holding and Order cost are the values you have.</li><li><strong>Eoq print</strong> = <code>Economic order quantity (EOQ)</code> — the form to use when Economic order quantity (EOQ) are the values you have.</li><li><strong>Economic order quantity (EOQ)</strong> = <code>Eoq print</code> — the form to use when Eoq print are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Economic order quantity (EOQ), Order cost and Yearly cost of holding can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Yearly demand from 10 to 20, leaving every other box alone. The panel moves from <strong>Economic order quantity (EOQ)</strong> 1.41 unit and <strong>Eoq print</strong> 1.41 to <strong>Economic order quantity (EOQ)</strong> 2 unit and <strong>Eoq print</strong> 2.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Yearly demand carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Economic order quantity (EOQ) and Eoq print are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Yearly demand left as a guess.</strong> Anything typed into Yearly demand is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Order cost left as a guess.</strong> Anything typed into Order cost is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Yearly demand is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Economic order quantity (EOQ) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Yearly demand</strong> is a units/points (1) quantity: the page opens it in unit and converts anything else you pick before the formula runs. Change it and Economic order quantity (EOQ), Order cost and Yearly cost of holding changes with it. Fill it from a measurement rather than a memory — Yearly demand is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Order cost</strong> is measured in per order. Change it and Economic order quantity (EOQ), Yearly cost of holding and Yearly demand changes with it. Fill it from a measurement rather than a memory — Order cost is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Yearly cost of holding</strong> is measured in per unit. Change it and Economic order quantity (EOQ), Order cost and Yearly demand changes with it. Fill it from a measurement rather than a memory — Yearly cost of holding is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Economic order quantity (EOQ)</strong> is a units/points (1) figure and the page's own defaults put it at 1.41 unit. The value follows from Order cost, Yearly demand and Yearly cost of holding. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Eoq print</strong> is a plain number and the page's own defaults put it at 1.41. The value follows from Economic order quantity (EOQ). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Economic order quantity (EOQ)</th><th>Eoq print</th></tr></thead><tbody><tr><td><strong>Yearly demand</strong> +10%</td><td>+4.88%</td><td>+4.88%</td></tr><tr><td><strong>Order cost</strong> +10%</td><td>+4.88%</td><td>+4.88%</td></tr><tr><td><strong>Yearly cost of holding</strong> +10%</td><td>-4.65%</td><td>-4.65%</td></tr></tbody></table><p>The steepest column belongs to Yearly demand: ten per cent there moves an answer by about 4.9 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Yearly demand = 5 unit, Order cost = 50 per order and Yearly cost of holding = 500 per unit and the page reports <strong>Economic order quantity (EOQ)</strong> = 1 unit and <strong>Eoq print</strong> = 1.</li><li>Feed in Yearly demand = 30 unit, Order cost = 100 per order and Yearly cost of holding = 1000 per unit and the page reports <strong>Economic order quantity (EOQ)</strong> = 2.45 unit and <strong>Eoq print</strong> = 2.45.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Economic order quantity (EOQ) actually offers.</p><ul><li><strong>units/points (1)</strong> — opens in <em>unit</em>, and the chip also carries pairs, decades, half-dozens, dozens, baker&#039;s dozens and scores. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Economic order quantity (EOQ) is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover units/points (1). A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Yearly demand, Order cost and Yearly cost of holding is what you already know and Economic order quantity (EOQ) and Eoq print is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/information-ratio">Information ratio Calculator</a>, <a href="/finance/interest-coverage-ratio">Interest coverage ratio Calculator</a> and <a href="/finance/interest-per-day">Interest per day Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Economic order quantity (EOQ) calculator work out?', 'a' => <<<'TXT'
            Economic order quantity (EOQ) and Eoq print, from Order cost, Yearly demand and Yearly cost of holding. The relationship is Economic order quantity (EOQ) = √(2) × √(Order cost × Yearly demand ÷ Yearly cost of holding).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Yearly demand (units/points (1)), Order cost (per order), Yearly cost of holding (per unit). Enter yearly demand, order cost and yearly cost of holding; Economic order quantity (EOQ) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Economic order quantity (EOQ), Order cost, Yearly cost of holding and Yearly demand can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Economic order quantity (EOQ) = 1.41 unit and Eoq print = 1.41. That comes from the page's own defaults, entered in Yearly demand; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Economic order quantity (EOQ) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Yearly demand blank and the page solves for it, reporting Economic order quantity (EOQ) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Economic order quantity (EOQ) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/information-ratio', 'name' => 'Information ratio Calculator'],
            ['path' => '/finance/interest-coverage-ratio', 'name' => 'Interest coverage ratio Calculator'],
            ['path' => '/finance/interest-per-day', 'name' => 'Interest per day Calculator'],
        ],
        'authors' => [],
    ],
];

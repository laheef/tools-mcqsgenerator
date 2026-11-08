<?php

/**
 * Carpet
 * /construction/carpet
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Carpet',
    'meta' => ['title' => 'Carpet Calculator: Square Yards and Cost Tool', 'description' => 'Turn a room\'s length and width into carpet area in square feet and square yards, with a waste allowance and the installed cost at your price. Units shown.', 'h1' => 'Carpet', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Room length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '15',
                    'help' => 'Longest run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Room width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Across it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Waste',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Roll direction and cuts',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/yd²',
                    'default' => '18',
                    'help' => 'Supplied and laid',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area_ft2',
                    'label' => 'Area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'area_yd2',
                    'label' => 'Area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd²',
                ],
                [
                    'name' => 'order_yd2',
                    'label' => 'Order',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd²',
                ],
                [
                    'name' => 'cost',
                    'label' => 'Cost',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Carpet',
            'results' => [
                'area_ft2' => 'length*width',
                'area_yd2' => 'length*width/9',
                'order_yd2' => 'length*width/9*(1+waste/100)',
                'cost' => 'length*width/9*(1+waste/100)*price',
                'length' => 'area_ft2/width',
                'width' => 'area_ft2/length',
                'waste' => '(order_yd2/(area_ft2/9)-1)*100',
                'price' => 'cost/order_yd2',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Area = length × width</strong>, <strong>square yards = area ÷ 9</strong>, and the order carries a waste allowance for the roll cut.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Carpet is sold by the square yard and cut from a roll, and the two do not match the room: a roll is twelve or fifteen feet wide, so a room that is eleven feet across wastes a strip if the pile runs the long way. The square yard figure is the trade's unit and the one on the invoice.</p><p>The page reports <strong>area (ft²) and area (yd²) and order and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Area (ft²)</strong></td><td><code>Room length × Room width</code></td></tr><tr><td><strong>Area (yd²)</strong></td><td><code>Room length × Room width ÷ 9</code></td></tr><tr><td><strong>Order</strong></td><td><code>Room length × Room width ÷ 9 × (1+Waste ÷ 100)</code></td></tr><tr><td><strong>Cost</strong></td><td><code>Room length × Room width ÷ 9 × (1+Waste ÷ 100) × Price</code></td></tr><tr><td><strong>Room length</strong></td><td><code>Area (ft²) ÷ Room width</code></td></tr><tr><td><strong>Room width</strong></td><td><code>Area (ft²) ÷ Room length</code></td></tr><tr><td><strong>Waste</strong></td><td><code>(Order ÷ (Area (ft²) ÷ 9)-1) × 100</code></td></tr><tr><td><strong>Price</strong></td><td><code>Cost ÷ Order</code></td></tr></tbody></table><p><p>Dividing the square footage by nine gives square yards. The waste allowance is applied to the order rather than the area, because it exists to cover the roll cut, seams and the odd angle — not the floor itself.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports area (ft²) and area (yd²) and order and cost.</p><ul><li><strong>Room length</strong> — in ft. Longest run</li><li><strong>Room width</strong> — in ft. Across it</li><li><strong>Waste</strong> — in %. Roll direction and cuts</li><li><strong>Price</strong> — in $/yd². Supplied and laid</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Area</strong> — in ft²</li><li><strong>Area</strong> — in yd²</li><li><strong>Order</strong> — in yd²</li><li><strong>Cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Room length = 15 ft, Room width = 12 ft, Waste = 10 %, Price = 18 $/yd² — and the results panel reads:</p><ul><li><strong>Area</strong> = <code>Room length × Room width</code> = <strong>180 ft²</strong></li><li><strong>Area</strong> = <code>Room length × Room width ÷ 9</code> = <strong>20 yd²</strong></li><li><strong>Order</strong> = <code>Room length × Room width ÷ 9 × (1+Waste ÷ 100)</code> = <strong>22 yd²</strong></li><li><strong>Cost</strong> = <code>Room length × Room width ÷ 9 × (1+Waste ÷ 100) × Price</code> = <strong>396 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>15 × 12 = 180</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A room 15 by 12 ft is 180 ft² — 20 yd² of carpet. With ten per cent for cuts the order is 22 yd², and at $18 a square yard the job is 396.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the square yards against the square feet: nine to one. If the two are much closer, the length and width have been entered in yards rather than feet.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Area</th><th>Area</th><th>Order</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Room length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Room width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Waste</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0.91 %</td><td>+0.91 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Room width</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Waste</strong>, at 0.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Room length = 24, Room width = 18, Waste = 15, Price = 22, the page reports <strong>Area</strong> = 432 ft², <strong>Area</strong> = 48 yd², <strong>Order</strong> = 55.2 yd², <strong>Cost</strong> = 1 214.4 $. A large room where the roll width does not divide evenly: more waste.</li><li>With Room length = 10, Room width = 9, Waste = 5, Price = 14, the page reports <strong>Area</strong> = 90 ft², <strong>Area</strong> = 10 yd², <strong>Order</strong> = 10.5 yd², <strong>Cost</strong> = 147 $. A small bedroom that fits inside one roll width with almost no waste.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Square feet ordered.</strong> Carpet is priced by the square yard.</li><li><strong>Pile direction ignored.</strong> Turning a piece to save carpet shows at the seam.</li><li><strong>Underlay forgotten.</strong> It is a separate line, usually cheaper.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Area (ft²), Area (yd²), Order (yd²), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Room dimensions in feet, area in square feet and square yards, the order in square yards and cost in dollars per square yard.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need room length and room width and waste and price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Area (ft²) and area (yd²) and order and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Room length</strong> ×10</td><td>180</td><td>1 800</td><td>ten times larger</td></tr><tr><td><strong>Room width</strong> ×10</td><td>180</td><td>1 800</td><td>ten times larger</td></tr><tr><td><strong>Waste</strong> ×10</td><td>180</td><td>180</td><td>unchanged</td></tr><tr><td><strong>Price</strong> ×10</td><td>180</td><td>180</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A rectangle.</strong> L-shaped rooms are two rectangles plus a seam.</li><li><strong>One price.</strong> Underlay, gripper and fitting are separate.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Buying carpet for a room.</li></li><li><li>Comparing quotes in square yards.</li></li><li><li>Checking a fitter's measure.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/flooring">Flooring</a> <a href="/construction/stair-carpet">Stair carpet</a> <a href="/construction/square-yard">Square yard</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Carpet calculator work out?', 'a' => 'It returns area (ft²) and area (yd²) and order and cost from room length and room width and waste and price. The relationship is Room length × Room width.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Room length (ft), Room width (ft), Waste (%), Price ($/yd²). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: room length in ft; room width in ft; waste in %; price in $/yd². The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many square yards is a 15 by 12 room?', 'a' => '20 square yards, and about 22 once waste is allowed.'],
            ['q' => 'Why is carpet sold by the square yard?', 'a' => 'It is the traditional trade unit; nine square feet make one square yard.'],
        ],
        'related' => [
            ['path' => '/construction/flooring', 'name' => 'Flooring'],
            ['path' => '/construction/stair-carpet', 'name' => 'Stair carpet'],
            ['path' => '/construction/square-yard', 'name' => 'Square yard'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

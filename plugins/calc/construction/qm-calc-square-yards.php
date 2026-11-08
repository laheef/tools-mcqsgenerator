<?php

/**
 * Square yards
 * /construction/square-yards
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Square yards',
    'meta' => ['title' => 'Square Yards Calculator: Feet, Metres and Cost', 'description' => 'Convert square feet or square metres into square yards, with the square footage, the square metres and the cost at a price per square yard. Units shown.', 'h1' => 'Square yards', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'square_feet',
                    'label' => 'Square feet',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '200',
                    'help' => 'The area you have',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/yd²',
                    'default' => '18',
                    'help' => 'Material per square yard',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Waste',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Cuts and seams',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'square_yards',
                    'label' => 'Square yards',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd²',
                ],
                [
                    'name' => 'square_meters',
                    'label' => 'Square meters',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm²',
                ],
                [
                    'name' => 'order_yards',
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
            'title' => 'Square yards',
            'results' => [
                'square_yards' => 'square_feet/9',
                'square_meters' => 'square_feet*0.092903',
                'order_yards' => 'square_feet/9*(1+waste/100)',
                'cost' => 'square_feet/9*(1+waste/100)*price',
                'square_feet' => 'square_yards*9',
                'price' => 'cost/order_yards',
                'waste' => '(order_yards/(square_feet/9)-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Square yards = ft² ÷ 9</strong> and <strong>= m² × 1.196</strong>; the two are the same area in different units.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>This is the conversion rather than the measurement: a quantity you already know in square feet, turned into the square yards a supplier prices in, with the waste applied once so the order and the cost agree.</p><p>The page reports <strong>square yards and square meters and order and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Square yards</strong></td><td><code>Square feet ÷ 9</code></td></tr><tr><td><strong>Square meters</strong></td><td><code>Square feet × 0.092903</code></td></tr><tr><td><strong>Order</strong></td><td><code>Square feet ÷ 9 × (1+Waste ÷ 100)</code></td></tr><tr><td><strong>Cost</strong></td><td><code>Square feet ÷ 9 × (1+Waste ÷ 100) × Price</code></td></tr><tr><td><strong>Square feet</strong></td><td><code>Square yards × 9</code></td></tr><tr><td><strong>Price</strong></td><td><code>Cost ÷ Order</code></td></tr><tr><td><strong>Waste</strong></td><td><code>(Order ÷ (Square feet ÷ 9)-1) × 100</code></td></tr></tbody></table><p><p>Nine square feet to the square yard, and 1.196 square yards to the square metre. The waste is applied after the conversion, so the price per square yard multiplies the yardage actually being bought.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports square yards and square meters and order and cost.</p><ul><li><strong>Square feet</strong> — in ft². The area you have</li><li><strong>Price</strong> — in $/yd². Material per square yard</li><li><strong>Waste</strong> — in %. Cuts and seams</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Square yards</strong> — in yd²</li><li><strong>Square meters</strong> — in m²</li><li><strong>Order</strong> — in yd²</li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Square feet = 200 ft², Price = 18 $/yd², Waste = 10 % — and the results panel reads:</p><ul><li><strong>Square yards</strong> = <code>Square feet ÷ 9</code> = <strong>22.222 yd²</strong></li><li><strong>Square meters</strong> = <code>Square feet × 0.092903</code> = <strong>18.581 m²</strong></li><li><strong>Order</strong> = <code>Square feet ÷ 9 × (1+Waste ÷ 100)</code> = <strong>24.444 yd²</strong></li><li><strong>Cost</strong> = <code>Square feet ÷ 9 × (1+Waste ÷ 100) × Price</code> = <strong>440 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>200 ÷ 9 = 22.222</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Two hundred square feet is 22.222 yd² — 18.581 m². With ten per cent for cuts the order is 24.444 yd², and at $18 a square yard the cost is 440.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the square yards against the square feet: nine to one. A figure that is a third of the square footage means it has been divided by three instead of nine.</p>
            <p>The square metre figure on the same row is a useful second opinion, because a square metre and a square yard are within twenty per cent of each other — if the two differ by a factor of ten, one of the conversions has gone wrong.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Square yards</th><th>Square meters</th><th>Order</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Square feet</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Waste</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0.91 %</td><td>+0.91 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Square feet</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Waste</strong>, at 0.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Square feet = 450, Price = 14, Waste = 15, the page reports <strong>Square yards</strong> = 50 yd², <strong>Square meters</strong> = 41.806 m², <strong>Order</strong> = 57.5 yd², <strong>Cost</strong> = 805 $. A large room with a diagonal layout: more waste on the same area.</li><li>With Square feet = 54, Price = 30, Waste = 5, the page reports <strong>Square yards</strong> = 6 yd², <strong>Square meters</strong> = 5.017 m², <strong>Order</strong> = 6.3 yd², <strong>Cost</strong> = 189 $. A small bathroom: six square yards and almost no waste.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Divided by three.</strong> A yard is three feet, but a square yard is nine square feet.</li><li><strong>Waste applied to the price.</strong> It belongs in the quantity.</li><li><strong>Metric mixed in.</strong> Square metres are about 20 per cent bigger than square yards.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Square yards (yd²), Square meters (m²), Order (yd²), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Area in square feet, converted to square yards and square metres, the order in square yards and cost in dollars per square yard.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need square feet and price and waste. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Square yards and square meters and order and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Square feet</strong> ×10</td><td>22.222</td><td>222.222</td><td>ten times larger</td></tr><tr><td><strong>Price</strong> ×10</td><td>22.222</td><td>22.222</td><td>unchanged</td></tr><tr><td><strong>Waste</strong> ×10</td><td>22.222</td><td>22.222</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Area only.</strong> Perimeter and length stay in feet.</li><li><strong>A flat surface.</strong> Slopes measure larger than their plan.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Converting a square-foot takeoff.</li></li><li><li>Comparing a metric quote with a US one.</li></li><li><li>Ordering carpet from an area figure.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/square-yard">Square yard</a> <a href="/construction/square-meter">Square meter</a> <a href="/construction/carpet">Carpet</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Square yards calculator work out?', 'a' => 'It returns square yards and square meters and order and cost from square feet and price and waste. The relationship is Square feet ÷ 9.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Square feet (ft²), Price ($/yd²), Waste (%). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: square feet in ft²; price in $/yd²; waste in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many square yards is 200 square feet?', 'a' => '22.2 square yards.'],
            ['q' => 'Is a square yard the same as a square metre?', 'a' => 'No — a square metre is about 1.196 square yards, nearly a fifth larger.'],
        ],
        'related' => [
            ['path' => '/construction/square-yard', 'name' => 'Square yard'],
            ['path' => '/construction/square-meter', 'name' => 'Square meter'],
            ['path' => '/construction/carpet', 'name' => 'Carpet'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

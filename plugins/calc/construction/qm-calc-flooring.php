<?php

/**
 * Flooring
 * /construction/flooring
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Flooring',
    'meta' => ['title' => 'Flooring Calculator: Boxes, Waste and Cost Tool', 'description' => 'Work out how much flooring a room needs in square feet, how many boxes that makes at the coverage on the carton, and the total cost. The formula is shown.', 'h1' => 'Flooring', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Room length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '14',
                    'help' => 'Longest run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Room width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '11',
                    'help' => 'Across it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Waste',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Cuts and grading',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'coverage',
                    'label' => 'Coverage per box',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '24',
                    'help' => 'Printed on the carton',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price per box',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '58',
                    'help' => 'Delivered',
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
                    'name' => 'order_ft2',
                    'label' => 'Order area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'boxes',
                    'label' => 'Boxes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
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
            'title' => 'Flooring',
            'results' => [
                'area_ft2' => 'length*width',
                'order_ft2' => 'length*width*(1+waste/100)',
                'boxes' => 'ceil(length*width*(1+waste/100)/coverage)',
                'cost' => 'ceil(length*width*(1+waste/100)/coverage)*price',
                'length' => 'area_ft2/width',
                'width' => 'area_ft2/length',
                'waste' => '(order_ft2/area_ft2-1)*100',
                'price' => 'cost/boxes',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Area = length × width</strong>, the order adds waste, and <strong>boxes = ceiling(order ÷ coverage per box)</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Laminate, vinyl plank and engineered wood all arrive in boxes with a coverage figure on the side, and that figure is the one number the whole order hangs on. Rooms are rarely square, so the waste allowance matters more here than it does for carpet.</p><p>The page reports <strong>area and order area and boxes and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Area</strong></td><td><code>Room length × Room width</code></td></tr><tr><td><strong>Order area</strong></td><td><code>Room length × Room width × (1+Waste ÷ 100)</code></td></tr><tr><td><strong>Boxes</strong></td><td><code>ceil(Room length × Room width × (1+Waste ÷ 100) ÷ Coverage per box)</code></td></tr><tr><td><strong>Cost</strong></td><td><code>ceil(Room length × Room width × (1+Waste ÷ 100) ÷ Coverage per box) × Price per box</code></td></tr><tr><td><strong>Room length</strong></td><td><code>Area ÷ Room width</code></td></tr><tr><td><strong>Room width</strong></td><td><code>Area ÷ Room length</code></td></tr><tr><td><strong>Waste</strong></td><td><code>(Order area ÷ Area-1) × 100</code></td></tr><tr><td><strong>Price per box</strong></td><td><code>Cost ÷ Boxes</code></td></tr></tbody></table><p><p>The waste is applied to the area before the box count, so the boxes and the cost can never disagree. Ten per cent is right for a simple rectangle laid straight; fifteen is safer for a herringbone or a room full of doorways.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports area and order area and boxes and cost.</p><ul><li><strong>Room length</strong> — in ft. Longest run</li><li><strong>Room width</strong> — in ft. Across it</li><li><strong>Waste</strong> — in %. Cuts and grading</li><li><strong>Coverage per box</strong> — in ft². Printed on the carton</li><li><strong>Price per box</strong> — in $. Delivered</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Area</strong> — in ft²</li><li><strong>Order area</strong> — in ft²</li><li><strong>Boxes</strong></li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Room length = 14 ft, Room width = 11 ft, Waste = 10 %, Coverage per box = 24 ft², Price per box = 58 $ — and the results panel reads:</p><ul><li><strong>Area</strong> = <code>Room length × Room width</code> = <strong>154 ft²</strong></li><li><strong>Order area</strong> = <code>Room length × Room width × (1+Waste ÷ 100)</code> = <strong>169.4 ft²</strong></li><li><strong>Boxes</strong> = <code>ceil(Room length × Room width × (1+Waste ÷ 100) ÷ Coverage per box)</code> = <strong>8</strong></li><li><strong>Cost</strong> = <code>ceil(Room length × Room width × (1+Waste ÷ 100) ÷ Coverage per box) × Price per box</code> = <strong>464 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>14 × 11 = 154</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A room 14 by 11 ft is 154 ft². With ten per cent that is 169.4 ft² of flooring, 8 boxes at 24 ft² each, and 464 at $58 a box.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the boxes against the area: at 24 ft² a box, a hundred square feet is five boxes with a little over. If the count is double that, the coverage has been entered in square metres.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Area</th><th>Order area</th><th>Boxes</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Room length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Room width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Waste</strong> +10 %</td><td>+0 %</td><td>+0.91 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Coverage per box</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−12.5 %</td><td>−12.5 %</td></tr><tr><td><strong>Price per box</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Coverage per box</strong>: a ten per cent move there shifts the result by about 12.5 per cent. The least sensitive is <strong>Waste</strong>, at 0.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Room length = 20, Room width = 15, Waste = 15, Coverage per box = 20, Price per box = 46, the page reports <strong>Area</strong> = 300 ft², <strong>Order area</strong> = 345 ft², <strong>Boxes</strong> = 18, <strong>Cost</strong> = 828 $. A large room with a diagonal layout: more waste and a smaller box.</li><li>With Room length = 8, Room width = 6, Waste = 8, Coverage per box = 30, Price per box = 72, the page reports <strong>Area</strong> = 48 ft², <strong>Order area</strong> = 51.84 ft², <strong>Boxes</strong> = 2, <strong>Cost</strong> = 144 $. A small bathroom where one box may be enough.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Waste left at the retailer's minimum.</strong> Always keep one spare box.</li><li><strong>Coverage in square metres.</strong> The box is in square feet.</li><li><strong>Doorway and alcove left out.</strong> Measure the floor, not the room schedule.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Area (ft²), Order area (ft²), Boxes, Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Room dimensions in feet, area in square feet, coverage in square feet per box, boxes as a whole count and cost in dollars.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need room length and room width and waste and coverage per box and price per box. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Area and order area and boxes and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Room length</strong> ×10</td><td>154</td><td>1 540</td><td>ten times larger</td></tr><tr><td><strong>Room width</strong> ×10</td><td>154</td><td>1 540</td><td>ten times larger</td></tr><tr><td><strong>Waste</strong> ×10</td><td>154</td><td>154</td><td>unchanged</td></tr><tr><td><strong>Coverage per box</strong> ×10</td><td>154</td><td>154</td><td>unchanged</td></tr><tr><td><strong>Price per box</strong> ×10</td><td>154</td><td>154</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A rectangle.</strong> Add each bay and doorway separately.</li><li><strong>Material only.</strong> Underlay, trim and fitting are extra.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Buying laminate or vinyl plank.</li></li><li><li>Comparing boxes across products.</li></li><li><li>Estimating a room renovation.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/carpet">Carpet</a> <a href="/construction/decking">Decking</a> <a href="/construction/square-footage">Square footage</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Flooring calculator work out?', 'a' => <<<'TXT'
            It returns area and order area and boxes and cost from room length and room width and waste and coverage per box and price per box. The relationship is Room length × Room width.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Room length (ft), Room width (ft), Waste (%), Coverage per box (ft²), Price per box ($). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: room length in ft; room width in ft; waste in %; coverage per box in ft²; price per box in $. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many boxes of flooring for a 14 by 11 room?', 'a' => 'About eight boxes at 24 ft² per box with ten per cent waste.'],
            ['q' => 'How much waste should I allow for flooring?', 'a' => 'Ten per cent laid straight, fifteen for a diagonal or a room with many cuts.'],
        ],
        'related' => [
            ['path' => '/construction/carpet', 'name' => 'Carpet'],
            ['path' => '/construction/decking', 'name' => 'Decking'],
            ['path' => '/construction/square-footage', 'name' => 'Square footage'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

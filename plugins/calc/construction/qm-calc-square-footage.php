<?php

/**
 * Square footage
 * /construction/square-footage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Square footage',
    'meta' => ['title' => 'Square Footage Calculator: Area and Cost Tool', 'description' => 'Work out the square footage of a rectangle, repeat it over several rooms, and see the area in square yards and square metres with a cost. Units shown.', 'h1' => 'Square footage', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'One dimension',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '10',
                    'help' => 'The other',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'quantity',
                    'label' => 'Quantity',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Identical areas',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/ft²',
                    'default' => '4.5',
                    'help' => 'Material or flooring',
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
                    'name' => 'area_m2',
                    'label' => 'Area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm²',
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
            'title' => 'Square footage',
            'results' => [
                'area_ft2' => 'length*width*quantity',
                'area_yd2' => 'length*width*quantity/9',
                'area_m2' => 'length*width*quantity*0.092903',
                'cost' => 'length*width*quantity*price',
                'length' => 'area_ft2/(width*quantity)',
                'width' => 'area_ft2/(length*quantity)',
                'quantity' => 'area_ft2/(length*width)',
                'price' => 'cost/area_ft2',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Area = length × width × quantity</strong>, with the same figure in square yards and square metres beside it.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Square footage is the unit every material and every lease is priced in, and it is the one measurement people take from memory. Writing the length and width down and letting the arithmetic happen is worth more than any estimating app.</p><p>The page reports <strong>area (ft²) and area (yd²) and area (m²) and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Area (ft²)</strong></td><td><code>Length × Width × Quantity</code></td></tr><tr><td><strong>Area (yd²)</strong></td><td><code>Length × Width × Quantity ÷ 9</code></td></tr><tr><td><strong>Area (m²)</strong></td><td><code>Length × Width × Quantity × 0.092903</code></td></tr><tr><td><strong>Cost</strong></td><td><code>Length × Width × Quantity × Price</code></td></tr><tr><td><strong>Length</strong></td><td><code>Area (ft²) ÷ (Width × Quantity)</code></td></tr><tr><td><strong>Width</strong></td><td><code>Area (ft²) ÷ (Length × Quantity)</code></td></tr><tr><td><strong>Quantity</strong></td><td><code>Area (ft²) ÷ (Length × Width)</code></td></tr><tr><td><strong>Price</strong></td><td><code>Cost ÷ Area (ft²)</code></td></tr></tbody></table><p><p>The quantity box multiplies identical areas — four identical bedrooms, eight identical bays — so a repeated layout does not need repeating arithmetic. The square yards divide by nine and the square metres by 10.764.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports area (ft²) and area (yd²) and area (m²) and cost.</p><ul><li><strong>Length</strong> — in ft. One dimension</li><li><strong>Width</strong> — in ft. The other</li><li><strong>Quantity</strong>. Identical areas</li><li><strong>Price</strong> — in $/ft². Material or flooring</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Area</strong> — in ft²</li><li><strong>Area</strong> — in yd²</li><li><strong>Area</strong> — in m²</li><li><strong>Cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Length = 12 ft, Width = 10 ft, Quantity = 1, Price = 4.5 $/ft² — and the results panel reads:</p><ul><li><strong>Area</strong> = <code>Length × Width × Quantity</code> = <strong>120 ft²</strong></li><li><strong>Area</strong> = <code>Length × Width × Quantity ÷ 9</code> = <strong>13.333 yd²</strong></li><li><strong>Area</strong> = <code>Length × Width × Quantity × 0.092903</code> = <strong>11.148 m²</strong></li><li><strong>Cost</strong> = <code>Length × Width × Quantity × Price</code> = <strong>540 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>12 × 10 × 1 = 120</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A room 12 by 10 ft is 120 ft² — 13.333 yd² or 11.148 m². At $4.50 a square foot, flooring for it costs 540.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the three areas together: square yards are about a ninth of square feet and square metres about a tenth. If the metric figure is larger than the imperial one, the feet have been entered as metres.</p>
            <p>The quantity box is worth using on any layout that repeats — a block of four identical flats, a row of eight identical bays — because a mistyped dimension in a repeated area is four times the error by the time it reaches the order.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Area</th><th>Area</th><th>Area</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Quantity</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Length</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Price</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Length = 15, Width = 12, Quantity = 4, Price = 3.2, the page reports <strong>Area</strong> = 720 ft², <strong>Area</strong> = 80 yd², <strong>Area</strong> = 66.89 m², <strong>Cost</strong> = 2 304 $. Four identical bedrooms: the quantity box does the repeating.</li><li>With Length = 30, Width = 24, Quantity = 1, Price = 12, the page reports <strong>Area</strong> = 720 ft², <strong>Area</strong> = 80 yd², <strong>Area</strong> = 66.89 m², <strong>Cost</strong> = 8 640 $. A large open floor in an expensive finish.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Paces used as feet.</strong> They are about a third short.</li><li><strong>Wall height included.</strong> This is floor area, not wall area.</li><li><strong>Closets left out.</strong> They count in most property measurements.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Area (ft²), Area (yd²), Area (m²), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Length and width in feet, area in square feet, square yards and square metres, cost in dollars per square foot.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need length and width and quantity and price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Area (ft²) and area (yd²) and area (m²) and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Length</strong> ×10</td><td>120</td><td>1 200</td><td>ten times larger</td></tr><tr><td><strong>Width</strong> ×10</td><td>120</td><td>1 200</td><td>ten times larger</td></tr><tr><td><strong>Quantity</strong> ×10</td><td>120</td><td>1 200</td><td>ten times larger</td></tr><tr><td><strong>Price</strong> ×10</td><td>120</td><td>120</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Rectangles.</strong> L-shapes are two rectangles added together, measured as a pair and added.</li><li><strong>One price.</strong> Mixed flooring is a line per material, so a room with a tiled bathroom corner is two calculations.</li><li><strong>Plan area, not floor area.</strong> A sloping ceiling reduces the usable floor but not the measurement a plan shows.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Measuring a room for flooring.</li></li><li><li>Checking a floor plan's area.</li></li><li><li>Pricing material by the square foot.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/square-meter">Square meter</a> <a href="/construction/square-yard">Square yard</a> <a href="/construction/flooring">Flooring</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Square footage calculator work out?', 'a' => 'It returns area (ft²) and area (yd²) and area (m²) and cost from length and width and quantity and price. The relationship is Length × Width × Quantity.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (ft), Width (ft), Quantity, Price ($/ft²). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: length in ft; width in ft; price in $/ft². The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I work out square footage?', 'a' => 'Multiply the length by the width in feet.'],
            ['q' => 'How many square feet in a square metre?', 'a' => 'About 10.76.'],
        ],
        'related' => [
            ['path' => '/construction/square-meter', 'name' => 'Square meter'],
            ['path' => '/construction/square-yard', 'name' => 'Square yard'],
            ['path' => '/construction/flooring', 'name' => 'Flooring'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Square meter
 * /construction/square-meter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Square meter',
    'meta' => ['title' => 'Square Meter Calculator: Area in m² and ft²', 'description' => 'Work out an area in square meters from a rectangle, a circle or a triangle, with the square footage and the cost at a price per square meter. Units shown.', 'h1' => 'Square meter', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Length',
                    'type' => 'number',
                    'suffix' => 'm',
                    'default' => '5',
                    'help' => 'Rectangle side',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Width',
                    'type' => 'number',
                    'suffix' => 'm',
                    'default' => '4',
                    'help' => 'Rectangle side',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'shape_factor',
                    'label' => 'Shape factor',
                    'type' => 'number',
                    'default' => '1',
                    'help' => '1 rectangle, 0.785 circle, 0.5 triangle',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/m²',
                    'default' => '22',
                    'help' => 'Material per square meter',
                    'rounding' => ['omni', '0.0001'],
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
                    'name' => 'area_ft2',
                    'label' => 'Area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'perimeter',
                    'label' => 'Perimeter',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm',
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
            'title' => 'Square meter',
            'results' => [
                'area_m2' => 'length*width*shape_factor',
                'area_ft2' => 'length*width*shape_factor*10.7639',
                'perimeter' => '2*(length+width)',
                'cost' => 'length*width*shape_factor*price',
                'length' => 'area_m2/(width*shape_factor)',
                'width' => 'area_m2/(length*shape_factor)',
                'shape_factor' => 'area_m2/(length*width)',
                'price' => 'cost/area_m2',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p><strong>Rectangle = a × b</strong>, <strong>circle = π × r²</strong>, <strong>triangle = ½ × base × height</strong>, then <strong>ft² = m² × 10.764</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Most of the world quotes flooring, paint and land in square metres, and most plans drawn in feet are quoted in square feet, so the conversion runs in both directions every working day. One square metre is 10.764 square feet — a little more than a square yard.</p><p>The page reports <strong>area (m²) and area (ft²) and perimeter and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Area (m²)</strong></td><td><code>Length × Width × Shape factor</code></td></tr><tr><td><strong>Area (ft²)</strong></td><td><code>Length × Width × Shape factor × 10.7639</code></td></tr><tr><td><strong>Perimeter</strong></td><td><code>2 × (Length+Width)</code></td></tr><tr><td><strong>Cost</strong></td><td><code>Length × Width × Shape factor × Price</code></td></tr><tr><td><strong>Length</strong></td><td><code>Area (m²) ÷ (Width × Shape factor)</code></td></tr><tr><td><strong>Width</strong></td><td><code>Area (m²) ÷ (Length × Shape factor)</code></td></tr><tr><td><strong>Shape factor</strong></td><td><code>Area (m²) ÷ (Length × Width)</code></td></tr><tr><td><strong>Price</strong></td><td><code>Cost ÷ Area (m²)</code></td></tr></tbody></table><p><p>The shape factor turns the rectangle into the other common shapes: π/4 for a circle described by its diameter, and 0.5 for a triangle. The perimeter stays a rectangle's perimeter, which is the correct figure for skirting and edging.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports area (m²) and area (ft²) and perimeter and cost.</p><ul><li><strong>Length</strong> — in m. Rectangle side</li><li><strong>Width</strong> — in m. Rectangle side</li><li><strong>Shape factor</strong>. 1 rectangle, 0.785 circle, 0.5 triangle</li><li><strong>Price</strong> — in $/m². Material per square meter</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Area</strong> — in m²</li><li><strong>Area</strong> — in ft²</li><li><strong>Perimeter</strong> — in m</li><li><strong>Cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Length = 5 m, Width = 4 m, Shape factor = 1, Price = 22 $/m² — and the results panel reads:</p><ul><li><strong>Area</strong> = <code>Length × Width × Shape factor</code> = <strong>20 m²</strong></li><li><strong>Area</strong> = <code>Length × Width × Shape factor × 10.7639</code> = <strong>215.278 ft²</strong></li><li><strong>Perimeter</strong> = <code>2 × (Length+Width)</code> = <strong>18 m</strong></li><li><strong>Cost</strong> = <code>Length × Width × Shape factor × Price</code> = <strong>440 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>5 × 4 × 1 = 20</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A rectangle 5 by 4 m is 20 m² — 215.278 ft² — with 18 m around it. At $22 a square metre the material is 440.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the square metres against the square feet: ten to one, roughly. A result much closer than that means the metric figure has been typed into the imperial conversion.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Area</th><th>Area</th><th>Perimeter</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+5.56 %</td><td>+10 %</td></tr><tr><td><strong>Width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+4.44 %</td><td>+10 %</td></tr><tr><td><strong>Shape factor</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Price</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Shape factor</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Length = 6, Width = 6, Shape factor = 0.785, Price = 30, the page reports <strong>Area</strong> = 28.26 m², <strong>Area</strong> = 304.188 ft², <strong>Perimeter</strong> = 24 m, <strong>Cost</strong> = 847.8 $. A circle drawn inside a 6 m square: the factor turns it into the round bed.</li><li>With Length = 8, Width = 5, Shape factor = 0.5, Price = 18, the page reports <strong>Area</strong> = 20 m², <strong>Area</strong> = 215.278 ft², <strong>Perimeter</strong> = 26 m, <strong>Cost</strong> = 360 $. A triangular gable end: half the rectangle that encloses it.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Centimetres entered as metres.</strong> A factor of ten thousand.</li><li><strong>Radius used as diameter for a circle.</strong> The factor assumes the full width.</li><li><strong>Perimeter assumed for every shape.</strong> A circle's perimeter is π times the diameter.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Area (m²), Area (ft²), Perimeter (m), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Dimensions in metres, area in square metres and square feet, perimeter in metres and cost in dollars per square metre.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need length and width and shape factor and price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Area (m²) and area (ft²) and perimeter and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Length</strong> ×10</td><td>20</td><td>200</td><td>ten times larger</td></tr><tr><td><strong>Width</strong> ×10</td><td>20</td><td>200</td><td>ten times larger</td></tr><tr><td><strong>Shape factor</strong> ×10</td><td>20</td><td>200</td><td>ten times larger</td></tr><tr><td><strong>Price</strong> ×10</td><td>20</td><td>20</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Three shapes.</strong> Irregular rooms need splitting into these.</li><li><strong>Plan area.</strong> Sloping surfaces are larger than their plan.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Converting a plan to metric.</li></li><li><li>Pricing imported flooring.</li></li><li><li>Checking a property's floor area.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/square-footage">Square footage</a> <a href="/construction/square-yard">Square yard</a> <a href="/construction/floor-area-ratio">Floor area ratio</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Square meter calculator work out?', 'a' => <<<'TXT'
            It returns area (m²) and area (ft²) and perimeter and cost from length and width and shape factor and price. The relationship is Length × Width × Shape factor.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (m), Width (m), Shape factor, Price ($/m²). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: length in m; width in m; price in $/m². The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many square feet in a square meter?', 'a' => '10.764.'],
            ['q' => 'How do I work out square meters of a circle?', 'a' => 'Three point one four times the radius squared, or 0.785 times the diameter squared.'],
        ],
        'related' => [
            ['path' => '/construction/square-footage', 'name' => 'Square footage'],
            ['path' => '/construction/square-yard', 'name' => 'Square yard'],
            ['path' => '/construction/floor-area-ratio', 'name' => 'Floor area ratio'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

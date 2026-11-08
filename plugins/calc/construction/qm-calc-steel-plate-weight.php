<?php

/**
 * Steel plate weight
 * /construction/steel-plate-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Steel plate weight',
    'meta' => ['title' => 'Steel Plate Weight Calculator by Thickness Tool', 'description' => 'Work out what a steel plate weighs from its length, width and thickness, in pounds, kilograms and pounds per square foot. The formula and units are shown.', 'h1' => 'Steel plate weight', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '48',
                    'help' => 'Plate length',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '24',
                    'help' => 'Plate width',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'thickness',
                    'label' => 'Thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.25',
                    'help' => 'Gauge thickness in inches',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'count',
                    'label' => 'Plates',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Same size',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area_ft2',
                    'label' => 'Area each',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'weight_each',
                    'label' => 'Weight each',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'weight_total',
                    'label' => 'Total weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'psf',
                    'label' => 'Weight per ft²',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb/ft²',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Steel plate weight',
            'results' => [
                'area_ft2' => 'length*width/144',
                'weight_each' => 'length*width*thickness*0.2836',
                'weight_total' => 'length*width*thickness*0.2836*count',
                'psf' => 'thickness*12*12*0.2836',
                'length' => 'weight_each/(width*thickness*0.2836)',
                'width' => 'weight_each/(length*thickness*0.2836)',
                'thickness' => 'weight_each/(length*width*0.2836)',
                'count' => 'weight_total/weight_each',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Weight = length × width × thickness × 0.2836</strong>, with every dimension in inches; the constant is the weight of a cubic inch of steel.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Plate is priced by the pound and fabricated by the sheet, and the weight decides everything from the shear table to the tail-lift. The per-square-foot figure is the one to carry: it depends only on the thickness, so it works for any plate size.</p><p>The page reports <strong>area each and weight each and total weight and weight per ft²</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Area each</strong></td><td><code>Length × Width ÷ 144</code></td></tr><tr><td><strong>Weight each</strong></td><td><code>Length × Width × Thickness × 0.2836</code></td></tr><tr><td><strong>Total weight</strong></td><td><code>Length × Width × Thickness × 0.2836 × Plates</code></td></tr><tr><td><strong>Weight per ft²</strong></td><td><code>Thickness × 12 × 12 × 0.2836</code></td></tr><tr><td><strong>Length</strong></td><td><code>Weight each ÷ (Width × Thickness × 0.2836)</code></td></tr><tr><td><strong>Width</strong></td><td><code>Weight each ÷ (Length × Thickness × 0.2836)</code></td></tr><tr><td><strong>Thickness</strong></td><td><code>Weight each ÷ (Length × Width × 0.2836)</code></td></tr><tr><td><strong>Plates</strong></td><td><code>Total weight ÷ Weight each</code></td></tr></tbody></table><p><p>A square foot of steel one inch thick weighs 40.8 lb, so a quarter-inch plate is 10.2 lb/ft². The total weight is that figure times the area times the number of plates.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports area each and weight each and total weight and weight per ft².</p><ul><li><strong>Length</strong> — in in. Plate length</li><li><strong>Width</strong> — in in. Plate width</li><li><strong>Thickness</strong> — in in. Gauge thickness in inches</li><li><strong>Plates</strong>. Same size</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Area each</strong> — in ft²</li><li><strong>Weight each</strong> — in lb</li><li><strong>Total weight</strong> — in lb</li><li><strong>Weight per ft²</strong> — in lb/ft²</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Length = 48 in, Width = 24 in, Thickness = 0.25 in, Plates = 1 — and the results panel reads:</p><ul><li><strong>Area each</strong> = <code>Length × Width ÷ 144</code> = <strong>8 ft²</strong></li><li><strong>Weight each</strong> = <code>Length × Width × Thickness × 0.2836</code> = <strong>81.677 lb</strong></li><li><strong>Total weight</strong> = <code>Length × Width × Thickness × 0.2836 × Plates</code> = <strong>81.677 lb</strong></li><li><strong>Weight per ft²</strong> = <code>Thickness × 12 × 12 × 0.2836</code> = <strong>10.21 lb/ft²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>48 × 24 ÷ 144 = 8</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A plate 48 by 24 in at a quarter inch is 8 ft² of steel weighing 81.677 lb — 10.21 lb per square foot. A half-inch plate of the same size doubles that, and both are still liftable by two people.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the per-square-foot figure against the thickness: 40.8 lb for every inch. Three-sixteenths plate comes out at 7.65 lb/ft², which is a useful sanity figure for a trailer deck or a patch panel.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Area each</th><th>Weight each</th><th>Total weight</th><th>Weight per ft²</th></tr></thead><tbody><tr><td><strong>Length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Thickness</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Plates</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Length</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Plates</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Length = 96, Width = 48, Thickness = 0.5, Plates = 2, the page reports <strong>Area each</strong> = 32 ft², <strong>Weight each</strong> = 653.414 lb, <strong>Total weight</strong> = 1 306.829 lb, <strong>Weight per ft²</strong> = 20.419 lb/ft². Two half-inch plates at 8 by 4: a forklift job, not a two-person one.</li><li>With Length = 12, Width = 12, Thickness = 0.125, Plates = 20, the page reports <strong>Area each</strong> = 1 ft², <strong>Weight each</strong> = 5.105 lb, <strong>Total weight</strong> = 102.096 lb, <strong>Weight per ft²</strong> = 5.105 lb/ft². Twenty small gauge plates, cut from one sheet.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Gauge number used as thickness.</strong> Gauge is a table, not a decimal.</li><li><strong>Millimetres typed as inches.</strong> The weight comes out about twenty-five times too high.</li><li><strong>Cut-outs ignored.</strong> Heavy holes change the lift.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Area each (ft²), Weight each (lb), Total weight (lb), Weight per ft² (lb/ft²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Length, width and thickness in inches, area in square feet, weight in pounds with a per-square-foot figure.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need length and width and thickness and plates. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Area each and weight each and total weight and weight per ft² should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Length</strong> ×10</td><td>8</td><td>80</td><td>ten times larger</td></tr><tr><td><strong>Width</strong> ×10</td><td>8</td><td>80</td><td>ten times larger</td></tr><tr><td><strong>Thickness</strong> ×10</td><td>8</td><td>8</td><td>unchanged</td></tr><tr><td><strong>Plates</strong> ×10</td><td>8</td><td>8</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Rectangular plates.</strong> Shapes need an area, not a rectangle.</li><li><strong>Plain carbon steel.</strong> Stainless is about 3 per cent heavier.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a lift or a tail-lift limit.</li></li><li><li>Estimating a shear order.</li></li><li><li>Comparing plate thicknesses.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/plate-weight">Plate weight</a> <a href="/construction/steel-weight">Steel weight</a> <a href="/construction/metal-weight">Metal weight</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Steel plate weight calculator work out?', 'a' => <<<'TXT'
            It returns area each and weight each and total weight and weight per ft² from length and width and thickness and plates. The relationship is Length × Width ÷ 144.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (in), Width (in), Thickness (in), Plates. Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: length in in; width in in; thickness in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much does 1/4 inch steel plate weigh per square foot?', 'a' => 'About 10.2 lb/ft².'],
            ['q' => 'How much does a 4 by 8 sheet of half-inch plate weigh?', 'a' => 'About 653 lb, which is why it arrives on a truck with a crane.'],
        ],
        'related' => [
            ['path' => '/construction/plate-weight', 'name' => 'Plate weight'],
            ['path' => '/construction/steel-weight', 'name' => 'Steel weight'],
            ['path' => '/construction/metal-weight', 'name' => 'Metal weight'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

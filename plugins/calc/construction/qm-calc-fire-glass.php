<?php

/**
 * Fire glass
 * /construction/fire-glass
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fire glass',
    'meta' => ['title' => 'Fire Glass Calculator: Pounds for a Fire Pit', 'description' => 'Work out how many pounds of fire glass a round or rectangular fire pit takes from its size and the depth of glass, with the volume in cubic feet. Units shown.', 'h1' => 'Fire glass', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '24',
                    'help' => 'Diameter for a round pit',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '24',
                    'help' => 'Equal to the length for a round pit',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'factor',
                    'label' => 'Shape factor',
                    'type' => 'number',
                    'default' => '0.785',
                    'help' => '0.785 round, 1.000 square',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Glass depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '2',
                    'help' => 'Usually one to two inches',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Density',
                    'type' => 'number',
                    'suffix' => 'lb/ft³',
                    'default' => '100',
                    'help' => '100 reflective, 80 recycled',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area_ft2',
                    'label' => 'Pit area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'volume_ft3',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'weight_lb',
                    'label' => 'Glass',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Fire glass',
            'results' => [
                'area_ft2' => 'length*width*factor/144',
                'volume_ft3' => 'length*width*factor/144*depth/12',
                'weight_lb' => 'length*width*factor/144*depth/12*density',
                'length' => 'area_ft2*144/(width*factor)',
                'width' => 'area_ft2*144/(length*factor)',
                'factor' => 'area_ft2*144/(length*width)',
                'depth' => '12*volume_ft3/area_ft2',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Volume = area × depth</strong>, and <strong>weight = volume × density</strong>: reflective glass is about 100 lb/ft³, recycled glass about 80.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Fire glass is sold by the pound and covers by the inch, so the two numbers have to be worked back and forth. It is heavier than people expect: two inches over a two-foot fire pit is over fifty pounds, so a pit takes several bags rather than one.</p><p>The page reports <strong>pit area and volume and glass</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Pit area</strong></td><td><code>Length × Width × Shape factor ÷ 144</code></td></tr><tr><td><strong>Volume</strong></td><td><code>Length × Width × Shape factor ÷ 144 × Glass depth ÷ 12</code></td></tr><tr><td><strong>Glass</strong></td><td><code>Length × Width × Shape factor ÷ 144 × Glass depth ÷ 12 × Density</code></td></tr><tr><td><strong>Length</strong></td><td><code>Pit area × 144 ÷ (Width × Shape factor)</code></td></tr><tr><td><strong>Width</strong></td><td><code>Pit area × 144 ÷ (Length × Shape factor)</code></td></tr><tr><td><strong>Shape factor</strong></td><td><code>Pit area × 144 ÷ (Length × Width)</code></td></tr><tr><td><strong>Glass depth</strong></td><td><code>12 × Volume ÷ Pit area</code></td></tr></tbody></table><p><p>The pit area is a circle or a rectangle — the shape factor is π over four for a round pit and 1.000 for a square, with width set equal to length. The glass depth is rarely more than two inches; deeper than that and the burner disappears.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports pit area and volume and glass.</p><ul><li><strong>Length</strong> — in in. Diameter for a round pit</li><li><strong>Width</strong> — in in. Equal to the length for a round pit</li><li><strong>Shape factor</strong>. 0.785 round, 1.000 square</li><li><strong>Glass depth</strong> — in in. Usually one to two inches</li><li><strong>Density</strong> — in lb/ft³. 100 reflective, 80 recycled</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Pit area</strong> — in ft²</li><li><strong>Volume</strong> — in ft³</li><li><strong>Glass</strong> — in lb</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Length = 24 in, Width = 24 in, Shape factor = 0.785, Glass depth = 2 in, Density = 100 lb/ft³ — and the results panel reads:</p><ul><li><strong>Pit area</strong> = <code>Length × Width × Shape factor ÷ 144</code> = <strong>3.14 ft²</strong></li><li><strong>Volume</strong> = <code>Length × Width × Shape factor ÷ 144 × Glass depth ÷ 12</code> = <strong>0.523 ft³</strong></li><li><strong>Glass</strong> = <code>Length × Width × Shape factor ÷ 144 × Glass depth ÷ 12 × Density</code> = <strong>52.333 lb</strong></li></ul><p>With the numbers written into the formula, the first result is <code>24 × 24 × 0.785 ÷ 144 = 3.14</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A round pit 24 in across takes 3.14 ft², and two inches of glass fills 0.523 ft³ — about 52.333 lb. A square pit the same size takes more, because the corners hold more than the circle.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the weight against the bag size: 10 lb bags are standard, so round up and keep a spare. A pit that wants 52 lb wants six bags, not five and a bit.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Pit area</th><th>Volume</th><th>Glass</th></tr></thead><tbody><tr><td><strong>Length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Shape factor</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Glass depth</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Density</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Shape factor</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Glass depth</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Length = 36, Width = 12, Shape factor = 1, Glass depth = 2, Density = 80, the page reports <strong>Pit area</strong> = 3 ft², <strong>Volume</strong> = 0.5 ft³, <strong>Glass</strong> = 40 lb. A long linear fire pit with recycled glass: a shallow, wide bed.</li><li>With Length = 36, Width = 36, Shape factor = 0.785, Glass depth = 1, Density = 100, the page reports <strong>Pit area</strong> = 7.065 ft², <strong>Volume</strong> = 0.589 ft³, <strong>Glass</strong> = 58.875 lb. A larger round pit with a thin, decorative layer.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Buried burner.</strong> Glass deeper than the burner's air gap will soot.</li><li><strong>Shape factor left at round.</strong> A square pit needs 1.000.</li><li><strong>Density guessed.</strong> Reflective glass is denser than recycled.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Pit area (ft²), Volume (ft³), Glass (lb).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Pit dimensions in inches, area in square feet, volume in cubic feet, density in pounds per cubic foot and the glass weight in pounds.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need length and width and shape factor and glass depth and density. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Pit area and volume and glass should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Length</strong> ×10</td><td>3.14</td><td>31.4</td><td>ten times larger</td></tr><tr><td><strong>Width</strong> ×10</td><td>3.14</td><td>31.4</td><td>ten times larger</td></tr><tr><td><strong>Shape factor</strong> ×10</td><td>3.14</td><td>31.4</td><td>ten times larger</td></tr><tr><td><strong>Glass depth</strong> ×10</td><td>3.14</td><td>3.14</td><td>unchanged</td></tr><tr><td><strong>Density</strong> ×10</td><td>3.14</td><td>3.14</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A flat bed.</strong> A bowl holds more per inch of depth.</li><li><strong>No burner displacement.</strong> A large burner ring takes up some volume.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Buying glass for a fire pit.</li></li><li><li>Comparing reflective with recycled glass.</li></li><li><li>Checking a depth against a burner.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/gravel">Gravel</a> <a href="/construction/pea-gravel">Pea gravel</a> <a href="/construction/rock">Rock</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fire glass calculator work out?', 'a' => <<<'TXT'
            It returns pit area and volume and glass from length and width and shape factor and glass depth and density. The relationship is Length × Width × Shape factor ÷ 144.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (in), Width (in), Shape factor, Glass depth (in), Density (lb/ft³). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: length in in; width in in; glass depth in in; density in lb/ft³. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many pounds of fire glass for a 24 inch pit?', 'a' => 'About 52 lb for two inches at 100 lb/ft³.'],
            ['q' => 'How deep should fire glass be?', 'a' => 'One to two inches — just enough to cover the burner.'],
        ],
        'related' => [
            ['path' => '/construction/gravel', 'name' => 'Gravel'],
            ['path' => '/construction/pea-gravel', 'name' => 'Pea gravel'],
            ['path' => '/construction/rock', 'name' => 'Rock'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Box size to weight
 * /construction/size-to-weight-rectangular-cuboid
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Box size to weight',
    'meta' => ['title' => 'Box Weight Calculator: Volume to Weight in Pounds', 'description' => 'Turn the outside dimensions of a rectangular block into its volume and weight, at the density of whatever it is made from, in pounds and kilograms. Units shown.', 'h1' => 'Box size to weight', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'Longest dimension',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '6',
                    'help' => 'Middle dimension',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Height',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '6',
                    'help' => 'Shortest dimension',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Density',
                    'type' => 'number',
                    'suffix' => 'lb/ft³',
                    'default' => '150',
                    'help' => '150 concrete, 45 oak, 0.075 air',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume_in3',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in³',
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
                    'label' => 'Weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'weight_kg',
                    'label' => 'Weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kg',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Box size to weight',
            'results' => [
                'volume_in3' => 'length*width*height',
                'volume_ft3' => 'length*width*height/1728',
                'weight_lb' => 'length*width*height/1728*density',
                'weight_kg' => 'length*width*height/1728*density/2.20462',
                'length' => '1728*volume_ft3/(width*height)',
                'width' => '1728*volume_ft3/(length*height)',
                'height' => '1728*volume_ft3/(length*width)',
                'density' => 'weight_lb/volume_ft3',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p>Volume first, then weight: <strong>volume = length × width × height</strong>, and <strong>weight = volume × density</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Weight is what decides whether something can be lifted, shipped or stood on a floor, and a block of material gives up its weight from its dimensions and one density. The density is the only external fact needed, and it is the one people guess.</p><p>The page reports <strong>volume (in³) and volume (ft³) and weight (lb) and weight (kg)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume (in³)</strong></td><td><code>Length × Width × Height</code></td></tr><tr><td><strong>Volume (ft³)</strong></td><td><code>Length × Width × Height ÷ 1728</code></td></tr><tr><td><strong>Weight (lb)</strong></td><td><code>Length × Width × Height ÷ 1728 × Density</code></td></tr><tr><td><strong>Weight (kg)</strong></td><td><code>Length × Width × Height ÷ 1728 × Density ÷ 2.20462</code></td></tr><tr><td><strong>Length</strong></td><td><code>1728 × Volume (ft³) ÷ (Width × Height)</code></td></tr><tr><td><strong>Width</strong></td><td><code>1728 × Volume (ft³) ÷ (Length × Height)</code></td></tr><tr><td><strong>Height</strong></td><td><code>1728 × Volume (ft³) ÷ (Length × Width)</code></td></tr><tr><td><strong>Density</strong></td><td><code>Weight (lb) ÷ Volume (ft³)</code></td></tr></tbody></table><p><p>Dividing the cubic inches by 1 728 gives cubic feet, which is the unit the density is quoted in. The kilograms result divides by 2.20462, so the two weight boxes never disagree.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports volume (in³) and volume (ft³) and weight (lb) and weight (kg).</p><ul><li><strong>Length</strong> — in in. Longest dimension</li><li><strong>Width</strong> — in in. Middle dimension</li><li><strong>Height</strong> — in in. Shortest dimension</li><li><strong>Density</strong> — in lb/ft³. 150 concrete, 45 oak, 0.075 air</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume</strong> — in in³</li><li><strong>Volume</strong> — in ft³</li><li><strong>Weight</strong> — in lb</li><li><strong>Weight</strong> — in kg</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Length = 12 in, Width = 6 in, Height = 6 in, Density = 150 lb/ft³ — and the results panel reads:</p><ul><li><strong>Volume</strong> = <code>Length × Width × Height</code> = <strong>432 in³</strong></li><li><strong>Volume</strong> = <code>Length × Width × Height ÷ 1728</code> = <strong>0.25 ft³</strong></li><li><strong>Weight</strong> = <code>Length × Width × Height ÷ 1728 × Density</code> = <strong>37.5 lb</strong></li><li><strong>Weight</strong> = <code>Length × Width × Height ÷ 1728 × Density ÷ 2.20462</code> = <strong>17.01 kg</strong></li></ul><p>With the numbers written into the formula, the first result is <code>12 × 6 × 6 = 432</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A block 12 by 6 by 6 in is 432 in³ — 0.25 ft³ — and at 150 lb/ft³ it weighs 37.5 lb, or 17.01 kg. In oak at 45 lb/ft³ the same block weighs less than a third of that.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the density against the material: water is 62.4 lb/ft³, concrete 150, oak about 45, aluminium 169 and steel 490. A weight that looks wrong by a factor of two is usually a density in the wrong units.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume</th><th>Volume</th><th>Weight</th><th>Weight</th></tr></thead><tbody><tr><td><strong>Length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Height</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Density</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Length</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Density</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Length = 24, Width = 12, Height = 4, Density = 490, the page reports <strong>Volume</strong> = 1 152 in³, <strong>Volume</strong> = 0.667 ft³, <strong>Weight</strong> = 326.667 lb, <strong>Weight</strong> = 148.174 kg. A steel billet — the density is eight times a block of timber.</li><li>With Length = 36, Width = 18, Height = 18, Density = 150, the page reports <strong>Volume</strong> = 11 664 in³, <strong>Volume</strong> = 6.75 ft³, <strong>Weight</strong> = 1 012.5 lb, <strong>Weight</strong> = 459.263 kg. A concrete pier block: small dimensions, heavy result.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Density in g/cm³ entered as lb/ft³.</strong> A factor of 62 between them.</li><li><strong>Outside dimensions on a hollow box.</strong> It assumes solid.</li><li><strong>Millimetres typed as inches.</strong> The volume is out by a factor of 16 000.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume (in³), Volume (ft³), Weight (lb), Weight (kg).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Dimensions in inches, volume in cubic inches and cubic feet, weight in pounds and kilograms at the density you enter in pounds per cubic foot.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need length and width and height and density. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Volume (in³) and volume (ft³) and weight (lb) and weight (kg) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Length</strong> ×10</td><td>432</td><td>4 320</td><td>ten times larger</td></tr><tr><td><strong>Width</strong> ×10</td><td>432</td><td>4 320</td><td>ten times larger</td></tr><tr><td><strong>Height</strong> ×10</td><td>432</td><td>4 320</td><td>ten times larger</td></tr><tr><td><strong>Density</strong> ×10</td><td>432</td><td>432</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Solid, rectangular.</strong> Hollow and shaped objects need their own volume.</li><li><strong>One material.</strong> A composite needs a weighted density.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a lift.</li></li><li><li>Estimating a shipping weight.</li></li><li><li>Comparing materials by weight.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/metal-weight">Metal weight</a> <a href="/construction/glass-weight">Glass weight</a> <a href="/construction/cubic-yard">Cubic yard</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Box size to weight calculator work out?', 'a' => <<<'TXT'
            It returns volume (in³) and volume (ft³) and weight (lb) and weight (kg) from length and width and height and density. The relationship is Length × Width × Height.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (in), Width (in), Height (in), Density (lb/ft³). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: length in in; width in in; height in in; density in lb/ft³. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I work out the weight of a block?', 'a' => 'Multiply the three dimensions, divide by 1 728 for cubic feet, then multiply by the density.'],
            ['q' => 'What density should I use for concrete?', 'a' => '150 lb/ft³ for normal weight, about 110 for lightweight.'],
        ],
        'related' => [
            ['path' => '/construction/metal-weight', 'name' => 'Metal weight'],
            ['path' => '/construction/glass-weight', 'name' => 'Glass weight'],
            ['path' => '/construction/cubic-yard', 'name' => 'Cubic yard'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

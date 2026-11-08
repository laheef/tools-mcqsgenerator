<?php

/**
 * Gallons per square foot
 * /construction/gallons-per-square-foot
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Gallons per square foot',
    'meta' => ['title' => 'Gallons per Square Foot Calculator: Volume Tool', 'description' => 'Work out the gallons a tray, a tank or a flooded floor holds from its area and depth, with gallons per square foot and the litres beside them. Units shown.', 'h1' => 'Gallons per square foot', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '10',
                    'help' => 'One side',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'help' => 'The other',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '6',
                    'help' => 'Water or liquid depth',
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
                    'name' => 'volume_ft3',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'gallons',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gal',
                ],
                [
                    'name' => 'gallons_per_ft2',
                    'label' => 'Gallons per ft²',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gal/ft²',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Gallons per square foot',
            'results' => [
                'area_ft2' => 'length*width',
                'volume_ft3' => 'length*width*depth/12',
                'gallons' => 'length*width*depth/12*7.48052',
                'gallons_per_ft2' => 'depth/12*7.48052',
                'length' => 'area_ft2/width',
                'width' => 'area_ft2/length',
                'depth' => '12*gallons_per_ft2/7.48052',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Volume = area × depth</strong>, and <strong>gallons per square foot = depth × 7.48</strong> because a cubic foot holds 7.48 US gallons.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The gallons per square foot figure is the one worth remembering: an inch of water over a square foot is 0.623 gallons, so a foot of it is 7.48. That single number turns a flooded floor or a shallow tray into a volume without any further arithmetic.</p><p>The page reports <strong>area and volume (ft³) and volume (gal) and gallons per ft²</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Area</strong></td><td><code>Length × Width</code></td></tr><tr><td><strong>Volume (ft³)</strong></td><td><code>Length × Width × Depth ÷ 12</code></td></tr><tr><td><strong>Volume (gal)</strong></td><td><code>Length × Width × Depth ÷ 12 × 7.48052</code></td></tr><tr><td><strong>Gallons per ft²</strong></td><td><code>Depth ÷ 12 × 7.48052</code></td></tr><tr><td><strong>Length</strong></td><td><code>Area ÷ Width</code></td></tr><tr><td><strong>Width</strong></td><td><code>Area ÷ Length</code></td></tr><tr><td><strong>Depth</strong></td><td><code>12 × Gallons per ft² ÷ 7.48052</code></td></tr></tbody></table><p><p>Depth in inches divided by twelve gives feet, and 7.48 converts the cubic foot to US gallons. The per-square-foot figure is the same calculation with the area left out, so it depends only on the depth.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports area and volume (ft³) and volume (gal) and gallons per ft².</p><ul><li><strong>Length</strong> — in ft. One side</li><li><strong>Width</strong> — in ft. The other</li><li><strong>Depth</strong> — in in. Water or liquid depth</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Area</strong> — in ft²</li><li><strong>Volume</strong> — in ft³</li><li><strong>Volume</strong> — in gal</li><li><strong>Gallons per ft²</strong> — in gal/ft²</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Length = 10 ft, Width = 8 ft, Depth = 6 in — and the results panel reads:</p><ul><li><strong>Area</strong> = <code>Length × Width</code> = <strong>80 ft²</strong></li><li><strong>Volume</strong> = <code>Length × Width × Depth ÷ 12</code> = <strong>40 ft³</strong></li><li><strong>Volume</strong> = <code>Length × Width × Depth ÷ 12 × 7.48052</code> = <strong>299.221 gal</strong></li><li><strong>Gallons per ft²</strong> = <code>Depth ÷ 12 × 7.48052</code> = <strong>3.74 gal/ft²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>10 × 8 = 80</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A floor 10 by 8 ft flooded six inches deep holds 40 ft³ of water — 299.221 US gallons, or 3.74 gal/ft². An inch of water would be only an eighth of that.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the per-square-foot figure against the depth: 0.62 gallons for every inch. If a result is near 7.5, the depth is being read in feet rather than inches.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Area</th><th>Volume</th><th>Volume</th><th>Gallons per ft²</th></tr></thead><tbody><tr><td><strong>Length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Depth</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Depth</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Width</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Length = 20, Width = 20, Depth = 1, the page reports <strong>Area</strong> = 400 ft², <strong>Volume</strong> = 33.333 ft³, <strong>Volume</strong> = 249.351 gal, <strong>Gallons per ft²</strong> = 0.623 gal/ft². A large shallow tray: an inch over four hundred square feet is still 250 gallons.</li><li>With Length = 4, Width = 2, Depth = 24, the page reports <strong>Area</strong> = 8 ft², <strong>Volume</strong> = 16 ft³, <strong>Volume</strong> = 119.688 gal, <strong>Gallons per ft²</strong> = 14.961 gal/ft². A deep bin: the depth matters more than the area at this size.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Depth in feet.</strong> The box is in inches and divides by twelve.</li><li><strong>Imperial gallons.</strong> A UK gallon is 4.55 litres, not 3.79, so an imperial figure is a fifth larger than the same volume in US gallons.</li><li><strong>Displacement ignored.</strong> Whatever sits in the volume takes up some of it.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Area (ft²), Volume (ft³), Volume (gal), Gallons per ft² (gal/ft²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Length and width in feet, depth in inches, area in square feet, volume in cubic feet and US gallons, and the per-square-foot figure in gallons per square foot.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need length and width and depth. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Area and volume (ft³) and volume (gal) and gallons per ft² should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Length</strong> ×10</td><td>80</td><td>800</td><td>ten times larger</td></tr><tr><td><strong>Width</strong> ×10</td><td>80</td><td>800</td><td>ten times larger</td></tr><tr><td><strong>Depth</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A level surface.</strong> A sloping floor holds less.</li><li><strong>Water only by weight.</strong> Other liquids have their own density.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Estimating flood water.</li></li><li><li>Sizing a tray or a shallow tank.</li></li><li><li>Working out a dose per square foot.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/tank-volume">Tank volume</a> <a href="/construction/pipe-volume">Pipe volume</a> <a href="/construction/square-footage">Square footage</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Gallons per square foot calculator work out?', 'a' => 'It returns area and volume (ft³) and volume (gal) and gallons per ft² from length and width and depth. The relationship is Length × Width.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (ft), Width (ft), Depth (in). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: length in ft; width in ft; depth in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many gallons per square foot per inch of depth?', 'a' => 'About 0.623 US gallons.'],
            ['q' => 'How many gallons in a cubic foot?', 'a' => '7.48 US gallons.'],
        ],
        'related' => [
            ['path' => '/construction/tank-volume', 'name' => 'Tank volume'],
            ['path' => '/construction/pipe-volume', 'name' => 'Pipe volume'],
            ['path' => '/construction/square-footage', 'name' => 'Square footage'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

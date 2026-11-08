<?php

/**
 * Gravel
 * /construction/gravel
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Gravel',
    'meta' => ['title' => 'Gravel Calculator: Yards and Tons for a Bed', 'description' => 'Work out the gravel a drive or bed needs in cubic yards, cubic feet and tons, from the area, the depth and the density of the gravel you are buying. All shown.', 'h1' => 'Gravel', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Area length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '30',
                    'help' => 'Along the drive or bed',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Area width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '10',
                    'help' => 'Across it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '4',
                    'help' => 'Four inches is a light drive, six a permanent one',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Density',
                    'type' => 'number',
                    'suffix' => 'tons/yd³',
                    'default' => '1.35',
                    'help' => '1.35 for crushed gravel, 1.5 for wet stone',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Over-order',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Compaction and an uneven subgrade',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area',
                    'label' => 'Area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'volume_yd3',
                    'label' => 'Gravel volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
                ],
                [
                    'name' => 'tons',
                    'label' => 'Gravel weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'tons',
                ],
                [
                    'name' => 'volume_ft3',
                    'label' => 'Gravel volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Gravel',
            'results' => [
                'area' => 'length*width',
                'volume_yd3' => 'length*width*depth/12/27*(1+waste/100)',
                'tons' => 'length*width*depth/12/27*(1+waste/100)*density',
                'volume_ft3' => 'length*width*depth/12*(1+waste/100)',
                'length' => 'area/width',
                'width' => 'area/length',
                'depth' => 'volume_yd3*27*12/(length*width*(1+waste/100))',
                'density' => 'tons/(length*width*depth/12/27*(1+waste/100))',
                'waste' => '(volume_yd3/(length*width*depth/12/27)-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Gravel is ordered by the yard or the ton: <strong>volume = L × W × D ÷ 27</strong> in cubic yards, and <strong>tons = volume × 1.35</strong> for a typical 1½ in crushed gravel.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Gravel is sold both ways — by the yard from a landscape yard and by the ton from a quarry — and the density is what converts between them. A cubic yard of crushed stone is a little over 1.3 tons, which is why a small trailer rarely carries a full yard.</p><p>The page reports <strong>area and gravel volume (yd³) and gravel weight and gravel volume (ft³)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Area</strong></td><td><code>Area length × Area width</code></td></tr><tr><td><strong>Gravel volume (yd³)</strong></td><td><code>Area length × Area width × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100)</code></td></tr><tr><td><strong>Gravel weight</strong></td><td><code>Area length × Area width × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100) × Density</code></td></tr><tr><td><strong>Gravel volume (ft³)</strong></td><td><code>Area length × Area width × Depth ÷ 12 × (1+Over-order ÷ 100)</code></td></tr><tr><td><strong>Area length</strong></td><td><code>Area ÷ Area width</code></td></tr><tr><td><strong>Area width</strong></td><td><code>Area ÷ Area length</code></td></tr><tr><td><strong>Depth</strong></td><td><code>Gravel volume (yd³) × 27 × 12 ÷ (Area length × Area width × (1+Over-order ÷ 100))</code></td></tr><tr><td><strong>Density</strong></td><td><code>Gravel weight ÷ (Area length × Area width × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100))</code></td></tr><tr><td><strong>Over-order</strong></td><td><code>(Gravel volume (yd³) ÷ (Area length × Area width × Depth ÷ 12 ÷ 27)-1) × 100</code></td></tr></tbody></table><p><p>Depth in inches over twelve gives feet, and the product over 27 gives cubic yards. The density box is the only place the material matters, so the same calculation serves gravel, crushed stone and sand.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports area and gravel volume (yd³) and gravel weight and gravel volume (ft³).</p><ul><li><strong>Area length</strong> — in ft. Along the drive or bed</li><li><strong>Area width</strong> — in ft. Across it</li><li><strong>Depth</strong> — in in. Four inches is a light drive, six a permanent one</li><li><strong>Density</strong> — in tons/yd³. 1.35 for crushed gravel, 1.5 for wet stone</li><li><strong>Over-order</strong> — in %. Compaction and an uneven subgrade</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Area</strong> — in ft²</li><li><strong>Gravel volume</strong> — in yd³</li><li><strong>Gravel weight</strong> — in tons</li><li><strong>Gravel volume</strong> — in ft³</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Area length = 30 ft, Area width = 10 ft, Depth = 4 in, Density = 1.35 tons/yd³, Over-order = 10 % — and the results panel reads:</p><ul><li><strong>Area</strong> = <code>Area length × Area width</code> = <strong>300 ft²</strong></li><li><strong>Gravel volume</strong> = <code>Area length × Area width × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100)</code> = <strong>4.074 yd³</strong></li><li><strong>Gravel weight</strong> = <code>Area length × Area width × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100) × Density</code> = <strong>5.5 tons</strong></li><li><strong>Gravel volume</strong> = <code>Area length × Area width × Depth ÷ 12 × (1+Over-order ÷ 100)</code> = <strong>110 ft³</strong></li></ul><p>With the numbers written into the formula, the first result is <code>30 × 10 = 300</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 30 × 10 ft drive at 4 in: 300 ft², 4.07 yd³ and 5.5 tons at 1.35 tons/yd³ with ten per cent over — two trips in most pickups, or one small tipper.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Check the depth against the use: four inches for a footpath or light drive, six for cars, and eight to twelve for a heavy vehicle. Gravel at four inches over soft ground will rut whatever the tonnage.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Area</th><th>Gravel volume</th><th>Gravel weight</th><th>Gravel volume</th></tr></thead><tbody><tr><td><strong>Area length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Area width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Depth</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Density</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Over-order</strong> +10 %</td><td>+0 %</td><td>+0.91 %</td><td>+0.91 %</td><td>+0.91 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Depth</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Over-order</strong>, at 0.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Area length = 50, Area width = 12, Depth = 6, Density = 1.4, Over-order = 10, the page reports <strong>Area</strong> = 600 ft², <strong>Gravel volume</strong> = 12.222 yd³, <strong>Gravel weight</strong> = 17.111 tons, <strong>Gravel volume</strong> = 330 ft³. A 50 × 12 drive six inches deep: 12.2 yd³ and 17.1 tons — a full delivery truck.</li><li>With Area length = 10, Area width = 4, Depth = 3, Density = 1.35, Over-order = 10, the page reports <strong>Area</strong> = 40 ft², <strong>Gravel volume</strong> = 0.407 yd³, <strong>Gravel weight</strong> = 0.55 tons, <strong>Gravel volume</strong> = 11 ft³. A garden path: 0.41 yd³ and half a ton — a few trailer loads.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Depth entered in feet.</strong> The formula divides by twelve, so 4 means four inches.</li><li><strong>Volume ordered without compaction.</strong> Gravel settles by ten to twenty per cent, which is what the over-order is for.</li><li><strong>Density borrowed from sand.</strong> Sand is about the same, but wet stone and slag are heavier.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Area (ft²), Gravel volume (yd³), Gravel weight (tons), Gravel volume (ft³).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Lengths in feet, depth in inches, volume in cubic feet and cubic yards, and weight in short tons at the density you give. The over-order applies to both volumes and the weight.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need area length and area width and depth and density and over-order. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Area and gravel volume (yd³) and gravel weight and gravel volume (ft³) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Area length</strong> ×10</td><td>300</td><td>3 000</td><td>ten times larger</td></tr><tr><td><strong>Area width</strong> ×10</td><td>300</td><td>3 000</td><td>ten times larger</td></tr><tr><td><strong>Depth</strong> ×10</td><td>300</td><td>300</td><td>unchanged</td></tr><tr><td><strong>Density</strong> ×10</td><td>300</td><td>300</td><td>unchanged</td></tr><tr><td><strong>Over-order</strong> ×10</td><td>300</td><td>300</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>One layer.</strong> A drive with a base course and a surface course needs two calculations.</li><li><strong>No allowance for edging.</strong> Gravel migrates without an edge, which costs more than the stone.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering gravel for a drive.</li></li><li><li>Converting a yard price to a ton price.</li></li><li><li>Sizing a delivery.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/crushed-stone">Crushed stone</a> <a href="/construction/gravel-driveway">Gravel driveway</a> <a href="/construction/cubic-yard">Cubic yard</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Gravel calculator work out?', 'a' => <<<'TXT'
            It returns area and gravel volume (yd³) and gravel weight and gravel volume (ft³) from area length and area width and depth and density and over-order. The relationship is Area length × Area width.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Area length (ft), Area width (ft), Depth (in), Density (tons/yd³), Over-order (%). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: area length in ft; area width in ft; depth in in; density in tons/yd³; over-order in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many tons in a cubic yard of gravel?', 'a' => 'About 1.35 for 1½ in crushed gravel, 1.4 to 1.5 for wet or denser stone.'],
            ['q' => 'How deep should a gravel drive be?', 'a' => 'Four inches for light use over a prepared base, six for cars, and more over soft ground with a geotextile underneath.'],
        ],
        'related' => [
            ['path' => '/construction/crushed-stone', 'name' => 'Crushed stone'],
            ['path' => '/construction/gravel-driveway', 'name' => 'Gravel driveway'],
            ['path' => '/construction/cubic-yard', 'name' => 'Cubic yard'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

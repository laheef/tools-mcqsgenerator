<?php

/**
 * Cubic yard
 * /construction/cubic-yard
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cubic yard',
    'meta' => ['title' => 'Cubic Yard Calculator: Feet, Inches and Yards', 'description' => 'Turn a length, a width and a depth into cubic feet, cubic yards and cubic metres, the three units a yard, a plant and a plan each insist on. Units shown.', 'h1' => 'Cubic yard', 'updated' => '2026-10-23'],
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
                    'help' => 'Along the bed or slab',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Width',
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
                    'help' => 'Thickness in inches',
                    'rounding' => ['omni', '0.0001'],
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
                    'name' => 'volume_yd3',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
                ],
                [
                    'name' => 'volume_m3',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm³',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Cubic yard',
            'results' => [
                'volume_ft3' => 'length*width*depth/12',
                'volume_yd3' => 'length*width*depth/12/27',
                'volume_m3' => 'length*width*depth/12*0.0283168',
                'length' => '12*volume_ft3/(width*depth)',
                'width' => '12*volume_ft3/(length*depth)',
                'depth' => '12*volume_ft3/(length*width)',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p>A cubic yard is 27 cubic feet. <strong>Volume = length × width × depth ÷ 27</strong>, with the depth converted to feet first if it is in inches.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Almost every material in construction ends up priced in cubic yards, and almost every drawing is dimensioned in feet and inches. The conversion is one division by 27, but it is the step where a pour comes up short, because a thickness in inches has to go to feet first and the two divisions are easy to conflate.</p><p>The page reports <strong>volume (ft³) and volume (yd³) and volume (m³)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume (ft³)</strong></td><td><code>Length × Width × Depth ÷ 12</code></td></tr><tr><td><strong>Volume (yd³)</strong></td><td><code>Length × Width × Depth ÷ 12 ÷ 27</code></td></tr><tr><td><strong>Volume (m³)</strong></td><td><code>Length × Width × Depth ÷ 12 × 0.0283168</code></td></tr><tr><td><strong>Length</strong></td><td><code>12 × Volume (ft³) ÷ (Width × Depth)</code></td></tr><tr><td><strong>Width</strong></td><td><code>12 × Volume (ft³) ÷ (Length × Depth)</code></td></tr><tr><td><strong>Depth</strong></td><td><code>12 × Volume (ft³) ÷ (Length × Width)</code></td></tr></tbody></table><p><p>Depth over twelve puts the thickness in feet, so the product is cubic feet; over 27 turns that into cubic yards. The metric result is the same volume in cubic metres, which is what a plant outside the US will quote.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports volume (ft³) and volume (yd³) and volume (m³).</p><ul><li><strong>Length</strong> — in ft. Along the bed or slab</li><li><strong>Width</strong> — in ft. Across it</li><li><strong>Depth</strong> — in in. Thickness in inches</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume</strong> — in ft³</li><li><strong>Volume</strong> — in yd³</li><li><strong>Volume</strong> — in m³</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Length = 10 ft, Width = 10 ft, Depth = 4 in — and the results panel reads:</p><ul><li><strong>Volume</strong> = <code>Length × Width × Depth ÷ 12</code> = <strong>33.333 ft³</strong></li><li><strong>Volume</strong> = <code>Length × Width × Depth ÷ 12 ÷ 27</code> = <strong>1.235 yd³</strong></li><li><strong>Volume</strong> = <code>Length × Width × Depth ÷ 12 × 0.0283168</code> = <strong>0.944 m³</strong></li></ul><p>With the numbers written into the formula, the first result is <code>10 × 10 × 4 ÷ 12 = 33.333</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Ten feet by ten at four inches: 33.333 ft³, which is 1.235 yd³ — a little under 0.944 m³ in metric. The same box a foot deep would be three times the volume, which is why depth is the box to measure twice.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the cubic yards against the cubic feet: 27 to one, every time. If the two numbers are not in that ratio, the depth has been entered in feet where inches were meant, or the other way round.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume</th><th>Volume</th><th>Volume</th></tr></thead><tbody><tr><td><strong>Length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Depth</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Depth</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Width</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Length = 20, Width = 12, Depth = 6, the page reports <strong>Volume</strong> = 120 ft³, <strong>Volume</strong> = 4.444 yd³, <strong>Volume</strong> = 3.398 m³. A slab six inches thick — the depth that makes a driveway.</li><li>With Length = 4, Width = 3, Depth = 18, the page reports <strong>Volume</strong> = 18 ft³, <strong>Volume</strong> = 0.667 yd³, <strong>Volume</strong> = 0.51 m³. A raised bed three foot by four, deep enough to matter.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Depth in feet.</strong> Entering 0.33 for four inches works, entering 4 does not.</li><li><strong>Dividing by 27 twice.</strong> The 27 already contains the cubic-feet step.</li><li><strong>Yards confused with square yards.</strong> A yard of material is a volume — 27 ft³ — not a yard of area.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume (ft³), Volume (yd³), Volume (m³).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Length and width in feet, depth in inches, the result in cubic feet, cubic yards and cubic metres.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need length and width and depth. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Volume (ft³) and volume (yd³) and volume (m³) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Length</strong> ×10</td><td>33.333</td><td>333.333</td><td>ten times larger</td></tr><tr><td><strong>Width</strong> ×10</td><td>33.333</td><td>333.333</td><td>ten times larger</td></tr><tr><td><strong>Depth</strong> ×10</td><td>33.333</td><td>333.333</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Rectangular only.</strong> Curved beds need the area worked out first.</li><li><strong>No allowance for compaction.</strong> Loose and compacted volumes differ.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Converting a takeoff into yards.</li></li><li><li>Checking a ready-mix order.</li></li><li><li>Comparing a metric quote with a US one.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/ft2-yd3">Square feet to cubic yards</a> <a href="/construction/concrete-weight">Concrete weight</a> <a href="/construction/concrete-slab">Concrete slab</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cubic yard calculator work out?', 'a' => 'It returns volume (ft³) and volume (yd³) and volume (m³) from length and width and depth. The relationship is Length × Width × Depth ÷ 12.'],
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
            ['q' => 'How many cubic feet in a cubic yard?', 'a' => 'Twenty-seven: a yard is three feet each way, and three cubed is 27.'],
            ['q' => 'How do I convert inches of depth into yards?', 'a' => 'Divide the depth by twelve to get feet, then divide the volume by 27.'],
        ],
        'related' => [
            ['path' => '/construction/ft2-yd3', 'name' => 'Square feet to cubic yards'],
            ['path' => '/construction/concrete-weight', 'name' => 'Concrete weight'],
            ['path' => '/construction/concrete-slab', 'name' => 'Concrete slab'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

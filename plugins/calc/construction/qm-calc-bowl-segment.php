<?php

/**
 * Bowl segment
 * /construction/bowl-segment
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bowl segment',
    'meta' => ['title' => 'Bowl Segment Calculator: Cut Angle and Length', 'description' => 'Work out the miter angle and the inside and outside edge lengths for each segment of a segmented woodturning bowl ring. The formula and units are shown.', 'h1' => 'Bowl segment', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'segments',
                    'label' => 'Segments per ring',
                    'type' => 'number',
                    'default' => '12',
                    'help' => 'Eight to sixteen is usual',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'outer_radius',
                    'label' => 'Outer radius',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '6',
                    'help' => 'Finished ring',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'ring_width',
                    'label' => 'Ring width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '1.5',
                    'help' => 'Radial width',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'thickness',
                    'label' => 'Segment thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '1',
                    'help' => 'Height of the ring',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cut_angle',
                    'label' => 'Miter angle',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '°',
                ],
                [
                    'name' => 'outer_length',
                    'label' => 'Outer edge',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'inner_length',
                    'label' => 'Inner edge',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'volume_in3',
                    'label' => 'Segment volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in³',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Bowl segment',
            'results' => [
                'cut_angle' => '180/segments',
                'outer_length' => '2*outer_radius*tan(pi/segments)',
                'inner_length' => '2*(outer_radius-ring_width)*tan(pi/segments)',
                'volume_in3' => '(outer_length+inner_length)/2*ring_width*thickness',
                'segments' => '180/cut_angle',
                'outer_radius' => 'outer_length/(2*tan(pi/segments))',
                'ring_width' => 'outer_radius-inner_length/(2*tan(pi/segments))',
                'thickness' => 'volume_in3/((outer_length+inner_length)/2*ring_width)',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Cut angle = 180 ÷ segments</strong>, and each segment\'s outer edge is <strong>2 R tan(π ÷ n)</strong> for a ring of n pieces.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A segmented ring is made of identical wedges, and every one of them has to be cut at the same angle or the ring will not close. The angle is simple — 180 over the number of pieces — but the edge lengths are not, because the inside of the wedge is shorter than the outside, and both have to be cut from the same setup.</p><p>The page reports <strong>miter angle and outer edge and inner edge and segment volume</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Miter angle</strong></td><td><code>180 ÷ Segments per ring</code></td></tr><tr><td><strong>Outer edge</strong></td><td><code>2 × Outer radius × tan(pi ÷ Segments per ring)</code></td></tr><tr><td><strong>Inner edge</strong></td><td><code>2 × (Outer radius-Ring width) × tan(pi ÷ Segments per ring)</code></td></tr><tr><td><strong>Segment volume</strong></td><td><code>(Outer edge+Inner edge) ÷ 2 × Ring width × Segment thickness</code></td></tr><tr><td><strong>Segments per ring</strong></td><td><code>180 ÷ Miter angle</code></td></tr><tr><td><strong>Outer radius</strong></td><td><code>Outer edge ÷ (2 × tan(pi ÷ Segments per ring))</code></td></tr><tr><td><strong>Ring width</strong></td><td><code>Outer radius-Inner edge ÷ (2 × tan(pi ÷ Segments per ring))</code></td></tr><tr><td><strong>Segment thickness</strong></td><td><code>Segment volume ÷ ((Outer edge+Inner edge) ÷ 2 × Ring width)</code></td></tr></tbody></table><p><p>The miter angle is measured at the saw, between the cut face and the long edge, so a twelve-segment ring needs each piece cut at 15°. The edge lengths come from the tangent of the half-segment angle, which is why the outside is longer.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports miter angle and outer edge and inner edge and segment volume.</p><ul><li><strong>Segments per ring</strong>. Eight to sixteen is usual</li><li><strong>Outer radius</strong> — in in. Finished ring</li><li><strong>Ring width</strong> — in in. Radial width</li><li><strong>Segment thickness</strong> — in in. Height of the ring</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Miter angle</strong> — in °</li><li><strong>Outer edge</strong> — in in</li><li><strong>Inner edge</strong> — in in</li><li><strong>Segment volume</strong> — in in³</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Segments per ring = 12, Outer radius = 6 in, Ring width = 1.5 in, Segment thickness = 1 in — and the results panel reads:</p><ul><li><strong>Miter angle</strong> = <code>180 ÷ Segments per ring</code> = <strong>15 °</strong></li><li><strong>Outer edge</strong> = <code>2 × Outer radius × tan(pi ÷ Segments per ring)</code> = <strong>3.215 in</strong></li><li><strong>Inner edge</strong> = <code>2 × (Outer radius-Ring width) × tan(pi ÷ Segments per ring)</code> = <strong>2.412 in</strong></li><li><strong>Segment volume</strong> = <code>(Outer edge+Inner edge) ÷ 2 × Ring width × Segment thickness</code> = <strong>4.22 in³</strong></li></ul><p>With the numbers written into the formula, the first result is <code>180 ÷ 12 = 15</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Twelve segments at a six-inch outer radius: a miter of 15 °, an outer edge of 3.215 in and an inner edge of 2.412 in. Each piece is 4.22 in³ of wood, which is the number that sizes the blank.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the two edge lengths together: their average times the ring width is the area of the wedge. If the inner edge comes out negative, the ring width is larger than the radius and the ring would close on itself.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Miter angle</th><th>Outer edge</th><th>Inner edge</th><th>Segment volume</th></tr></thead><tbody><tr><td><strong>Segments per ring</strong> +10 %</td><td>−9.09 %</td><td>−9.46 %</td><td>−9.46 %</td><td>−9.46 %</td></tr><tr><td><strong>Outer radius</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+13.33 %</td><td>+11.43 %</td></tr><tr><td><strong>Ring width</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−3.33 %</td><td>+8.43 %</td></tr><tr><td><strong>Segment thickness</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Outer radius</strong>: a ten per cent move there shifts the result by about 13.3 per cent. The least sensitive is <strong>Ring width</strong>, at 8.4 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Segments per ring = 8, Outer radius = 4, Ring width = 1, Segment thickness = 0.75, the page reports <strong>Miter angle</strong> = 22.5 °, <strong>Outer edge</strong> = 3.314 in, <strong>Inner edge</strong> = 2.485 in, <strong>Segment volume</strong> = 2.175 in³. A small eight-segment ring: the angle is sharper and the pieces are chunkier.</li><li>With Segments per ring = 16, Outer radius = 8, Ring width = 2, Segment thickness = 1.5, the page reports <strong>Miter angle</strong> = 11.25 °, <strong>Outer edge</strong> = 3.183 in, <strong>Inner edge</strong> = 2.387 in, <strong>Segment volume</strong> = 8.354 in³. A large fine ring: many thin pieces, each with a shallow angle.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Cut angle used as the full angle.</strong> The saw is set to half the segment angle.</li><li><strong>Radius entered as diameter.</strong> Every length doubles.</li><li><strong>Kerf ignored.</strong> A wide blade steals a little from each piece.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Miter angle (°), Outer edge (in), Inner edge (in), Segment volume (in³).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Radius, ring width and thickness in inches, lengths in inches, volume in cubic inches and the miter angle in degrees.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need segments per ring and outer radius and ring width and segment thickness. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Miter angle and outer edge and inner edge and segment volume should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Segments per ring</strong> ×10</td><td>15</td><td>1.5</td><td>ten times smaller</td></tr><tr><td><strong>Outer radius</strong> ×10</td><td>15</td><td>15</td><td>unchanged</td></tr><tr><td><strong>Ring width</strong> ×10</td><td>15</td><td>15</td><td>unchanged</td></tr><tr><td><strong>Segment thickness</strong> ×10</td><td>15</td><td>15</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Flat rings only.</strong> A staved or angled bowl needs a compound cut.</li><li><strong>No kerf allowance.</strong> Trim each piece to length after the cut.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Setting up a miter cut.</li></li><li><li>Sizing a blank for a ring.</li></li><li><li>Checking a segment count.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/miter-angle">Miter angle</a> <a href="/construction/angle-cut">Angle cut</a> <a href="/construction/board-foot">Board foot</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bowl segment calculator work out?', 'a' => <<<'TXT'
            It returns miter angle and outer edge and inner edge and segment volume from segments per ring and outer radius and ring width and segment thickness. The relationship is 180 ÷ Segments per ring.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Segments per ring, Outer radius (in), Ring width (in), Segment thickness (in). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: outer radius in in; ring width in in; segment thickness in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What angle do I cut for a 12 segment bowl?', 'a' => '15° on the miter gauge, since the full segment angle is 30°.'],
            ['q' => 'How long should each segment be?', 'a' => 'Two times the radius times the tangent of 180 over the segment count.'],
        ],
        'related' => [
            ['path' => '/construction/miter-angle', 'name' => 'Miter angle'],
            ['path' => '/construction/angle-cut', 'name' => 'Angle cut'],
            ['path' => '/construction/board-foot', 'name' => 'Board foot'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

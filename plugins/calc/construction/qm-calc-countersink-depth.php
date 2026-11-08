<?php

/**
 * Countersink depth
 * /construction/countersink-depth
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Countersink depth',
    'meta' => ['title' => 'Countersink Depth Calculator: Head, Shaft and Angle', 'description' => 'Work out how deep to cut a countersink so a screw head sits flush, from the head diameter, the shaft diameter and the included angle. The formula is shown.', 'h1' => 'Countersink depth', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'head_diameter',
                    'label' => 'Head diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.4',
                    'help' => 'Across the head',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'shaft_diameter',
                    'label' => 'Shaft diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.16',
                    'help' => 'The screw body',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'angle',
                    'label' => 'Included angle',
                    'type' => 'number',
                    'suffix' => '°',
                    'default' => '82',
                    'help' => 'Eighty two for a wood screw',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Countersink depth',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'depth_mm',
                    'label' => 'Countersink depth',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mm',
                ],
                [
                    'name' => 'radius_diff',
                    'label' => 'Head to shaft',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'cone_volume',
                    'label' => 'Removed volume',
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
            'title' => 'Countersink depth',
            'results' => [
                'depth' => '(head_diameter-shaft_diameter)/(2*tan(angle/2*pi/180))',
                'depth_mm' => '(head_diameter-shaft_diameter)/(2*tan(angle/2*pi/180))*25.4',
                'radius_diff' => '(head_diameter-shaft_diameter)/2',
                'cone_volume' => 'pi/3*pow((head_diameter-shaft_diameter)/2,2)*(head_diameter-shaft_diameter)/(2*tan(angle/2*pi/180))',
                'head_diameter' => 'shaft_diameter+2*tan(angle/2*pi/180)*depth',
                'shaft_diameter' => 'head_diameter-2*tan(angle/2*pi/180)*depth',
                'angle' => '2*atan((head_diameter-shaft_diameter)/(2*depth))*180/pi',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Depth = (head − shaft) ÷ (2 × tan(angle ÷ 2))</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A countersunk screw is only flush when the cone cut matches the head. Too shallow and the head stands proud; too deep and the wood around it is crushed and the joint loses strength. The depth follows directly from the head and shaft diameters.</p><p>The page reports <strong>countersink depth (in) and countersink depth (mm) and head to shaft and removed volume</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Countersink depth (in)</strong></td><td><code>(Head diameter-Shaft diameter) ÷ (2 × tan(Included angle ÷ 2 × pi ÷ 180))</code></td></tr><tr><td><strong>Countersink depth (mm)</strong></td><td><code>(Head diameter-Shaft diameter) ÷ (2 × tan(Included angle ÷ 2 × pi ÷ 180)) × 25.4</code></td></tr><tr><td><strong>Head to shaft</strong></td><td><code>(Head diameter-Shaft diameter) ÷ 2</code></td></tr><tr><td><strong>Removed volume</strong></td><td><code>pi ÷ 3 × ((Head diameter-Shaft diameter) ÷ 2)^2 × (Head diameter-Shaft diameter) ÷ (2 × tan(Included angle ÷ 2 × pi ÷ 180))</code></td></tr><tr><td><strong>Head diameter</strong></td><td><code>Shaft diameter+2 × tan(Included angle ÷ 2 × pi ÷ 180) × Countersink depth (in)</code></td></tr><tr><td><strong>Shaft diameter</strong></td><td><code>Head diameter-2 × tan(Included angle ÷ 2 × pi ÷ 180) × Countersink depth (in)</code></td></tr><tr><td><strong>Included angle</strong></td><td><code>2 × atan((Head diameter-Shaft diameter) ÷ (2 × Countersink depth (in))) × 180 ÷ pi</code></td></tr></tbody></table><p><p>Half the difference between head and shaft is the radius the cone has to cover. The cone's slope is the tangent of half the included angle, so dividing the radius by that tangent gives the depth. Wood screws are usually eighty two degrees, machine screws ninety.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports countersink depth (in) and countersink depth (mm) and head to shaft and removed volume.</p><ul><li><strong>Head diameter</strong> — in in. Across the head</li><li><strong>Shaft diameter</strong> — in in. The screw body</li><li><strong>Included angle</strong> — in °. Eighty two for a wood screw</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Countersink depth</strong> — in in</li><li><strong>Countersink depth</strong> — in mm</li><li><strong>Head to shaft</strong> — in in</li><li><strong>Removed volume</strong> — in in³</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Head diameter = 0.4 in, Shaft diameter = 0.16 in, Included angle = 82 ° — and the results panel reads:</p><ul><li><strong>Countersink depth</strong> = <code>(Head diameter-Shaft diameter) ÷ (2 × tan(Included angle ÷ 2 × pi ÷ 180))</code> = <strong>0.138 in</strong></li><li><strong>Countersink depth</strong> = <code>(Head diameter-Shaft diameter) ÷ (2 × tan(Included angle ÷ 2 × pi ÷ 180)) × 25.4</code> = <strong>3.506 mm</strong></li><li><strong>Head to shaft</strong> = <code>(Head diameter-Shaft diameter) ÷ 2</code> = <strong>0.12 in</strong></li><li><strong>Removed volume</strong> = <code>pi ÷ 3 × ((Head diameter-Shaft diameter) ÷ 2)^2 × (Head diameter-Shaft diameter) ÷ (2 × tan(Included angle ÷ 2 × pi ÷ 180))</code> = <strong>0.002 in³</strong></li></ul><p>With the numbers written into the formula, the first result is <code>(0.4-0.16) ÷ (2 × tan(82 ÷ 2 × pi ÷ 180)) = 0.138</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 0.4 in head on a 0.16 in screw at 82 ° needs a 0.138 in countersink — 3.506 mm — with a rim of 0.12 in and 0.002 in³ of material removed.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the depth against the head thickness: a countersink deeper than the head is thin wastes the material under the screw. Anything more than half the head thickness means the angle is wrong for the screw.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Countersink depth</th><th>Countersink depth</th><th>Head to shaft</th><th>Removed volume</th></tr></thead><tbody><tr><td><strong>Head diameter</strong> +10 %</td><td>+16.67 %</td><td>+16.67 %</td><td>+16.67 %</td><td>+58.8 %</td></tr><tr><td><strong>Shaft diameter</strong> +10 %</td><td>−6.67 %</td><td>−6.67 %</td><td>−6.67 %</td><td>−18.7 %</td></tr><tr><td><strong>Included angle</strong> +10 %</td><td>−13.37 %</td><td>−13.37 %</td><td>+0 %</td><td>−13.37 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Head diameter</strong>: a ten per cent move there shifts the result by about 58.8 per cent. The least sensitive is <strong>Included angle</strong>, at 13.4 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Head diameter = 0.5, Shaft diameter = 0.19, Included angle = 90, the page reports <strong>Countersink depth</strong> = 0.155 in, <strong>Countersink depth</strong> = 3.937 mm, <strong>Head to shaft</strong> = 0.155 in, <strong>Removed volume</strong> = 0.004 in³. A machine screw with a ninety degree head.</li><li>With Head diameter = 0.3, Shaft diameter = 0.11, Included angle = 82, the page reports <strong>Countersink depth</strong> = 0.109 in, <strong>Countersink depth</strong> = 2.776 mm, <strong>Head to shaft</strong> = 0.095 in, <strong>Removed volume</strong> = 0.001 in³. A small wood screw: a shallow cut.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Included angle halved twice.</strong> The formula already halves it.</li><li><strong>Head diameter measured across flats.</strong> Use the full diameter.</li><li><strong>Depth measured from the surface.</strong> It is from the surface to the seat.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Countersink depth (in), Countersink depth (mm), Head to shaft (in), Removed volume (in³).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Diameters and depth in inches, angle in degrees, depth also in millimetres.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need head diameter and shaft diameter and included angle. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Countersink depth (in) and countersink depth (mm) and head to shaft and removed volume should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Head diameter</strong> ×10</td><td>0.138</td><td>2.209</td><td>×16</td></tr><tr><td><strong>Shaft diameter</strong> ×10</td><td>0.138</td><td>-0.69</td><td>×-5</td></tr><tr><td><strong>Included angle</strong> ×10</td><td>0.138</td><td>0.101</td><td>×0.729</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Sharp cone assumed.</strong> A worn bit leaves a rounded seat.</li><li><strong>No material compression.</strong> Softwood crushes a little.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Setting a countersink bit.</li></li><li><li>Choosing a bit for a screw.</li></li><li><li>Checking a flush finish.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/clearance-hole">Clearance hole</a> <a href="/construction/thread">Thread</a> <a href="/construction/taper">Taper</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Countersink depth calculator work out?', 'a' => <<<'TXT'
            It returns countersink depth (in) and countersink depth (mm) and head to shaft and removed volume from head diameter and shaft diameter and included angle. The relationship is (Head diameter-Shaft diameter) ÷ (2 × tan(Included angle ÷ 2 × pi ÷ 180)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Head diameter (in), Shaft diameter (in), Included angle (°). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: head diameter in in; shaft diameter in in; included angle in °. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How deep should a countersink be?', 'a' => 'Roughly (head − shaft) divided by twice the tangent of half the angle.'],
            ['q' => 'What angle are wood screw heads?', 'a' => 'Eighty two degrees; machine screws are usually ninety.'],
        ],
        'related' => [
            ['path' => '/construction/clearance-hole', 'name' => 'Clearance hole'],
            ['path' => '/construction/thread', 'name' => 'Thread'],
            ['path' => '/construction/taper', 'name' => 'Taper'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

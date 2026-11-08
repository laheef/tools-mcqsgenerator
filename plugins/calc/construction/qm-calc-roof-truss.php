<?php

/**
 * Roof truss
 * /construction/roof-truss
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Roof truss',
    'meta' => ['title' => 'Roof Truss Calculator: Count, Rafters and Gable', 'description' => 'Work out how many trusses a roof needs from its length and spacing, with each rafter\'s length, the peak height and the gable area it closes. before the crane.', 'h1' => 'Roof truss', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'roof_length',
                    'label' => 'Roof length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '30',
                    'help' => 'Along the ridge',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'span',
                    'label' => 'Building span',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '24',
                    'help' => 'Eave to eave across',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'spacing',
                    'label' => 'Truss spacing',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '24',
                    'help' => '24 in centres is common in trusses',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pitch',
                    'label' => 'Pitch',
                    'type' => 'number',
                    'suffix' => 'x/12',
                    'default' => '6',
                    'help' => 'Rise per foot of run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'overhang',
                    'label' => 'Overhang',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'Beyond the wall line, each side',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'trusses',
                    'label' => 'Trusses',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rafter_length',
                    'label' => 'Rafter length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'peak_height',
                    'label' => 'Peak above wall',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'gable_area',
                    'label' => 'Gable area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Roof truss',
            'results' => [
                'trusses' => 'ceil(roof_length*12/spacing+1)',
                'rafter_length' => 'sqrt(pow(span/2+overhang/12,2)+pow((span/2+overhang/12)*pitch/12,2))',
                'peak_height' => 'span/2*pitch/12',
                'gable_area' => 'span*(span/2*pitch/12)/2',
                'roof_length' => '(trusses-1)*spacing/12',
                'span' => '2*peak_height*12/pitch',
                'pitch' => 'peak_height*12/(span/2)',
                'overhang' => 'sqrt(pow(rafter_length,2)/(1+pow(pitch/12,2)))*12-span/2*12',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Trusses are placed on centres: <strong>count = roof length in inches ÷ spacing + 1</strong>. The rafter length comes from the half span and the pitch, with the overhang added along the slope.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Manufactured trusses arrive on a truck in one delivery, so the count has to be right before the crane is booked. The same page gives the gable area, which is the sheathing and the siding that closes the two ends.</p><p>The page reports <strong>trusses and rafter length and peak above wall and gable area</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Trusses</strong></td><td><code>ceil(Roof length × 12 ÷ Truss spacing+1)</code></td></tr><tr><td><strong>Rafter length</strong></td><td><code>√((Building span ÷ 2+Overhang ÷ 12)^2+((Building span ÷ 2+Overhang ÷ 12) × Pitch ÷ 12)^2)</code></td></tr><tr><td><strong>Peak above wall</strong></td><td><code>Building span ÷ 2 × Pitch ÷ 12</code></td></tr><tr><td><strong>Gable area</strong></td><td><code>Building span × (Building span ÷ 2 × Pitch ÷ 12) ÷ 2</code></td></tr><tr><td><strong>Roof length</strong></td><td><code>(Trusses-1) × Truss spacing ÷ 12</code></td></tr><tr><td><strong>Building span</strong></td><td><code>2 × Peak above wall × 12 ÷ Pitch</code></td></tr><tr><td><strong>Pitch</strong></td><td><code>Peak above wall × 12 ÷ (Building span ÷ 2)</code></td></tr><tr><td><strong>Overhang</strong></td><td><code>√((Rafter length)^2 ÷ (1+(Pitch ÷ 12)^2)) × 12-Building span ÷ 2 × 12</code></td></tr></tbody></table><p><p>The rafter length is Pythagoras on the horizontal run — half the span plus the overhang — and the rise that run produces at the stated pitch. The gable is a triangle of base equal to the span and height equal to the peak.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports trusses and rafter length and peak above wall and gable area.</p><ul><li><strong>Roof length</strong> — in ft. Along the ridge</li><li><strong>Building span</strong> — in ft. Eave to eave across</li><li><strong>Truss spacing</strong> — in in. 24 in centres is common in trusses</li><li><strong>Pitch</strong> — in x/12. Rise per foot of run</li><li><strong>Overhang</strong> — in in. Beyond the wall line, each side</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Trusses</strong></li><li><strong>Rafter length</strong> — in ft</li><li><strong>Peak above wall</strong> — in ft</li><li><strong>Gable area</strong> — in ft²</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Roof length = 30 ft, Building span = 24 ft, Truss spacing = 24 in, Pitch = 6 x/12, Overhang = 12 in — and the results panel reads:</p><ul><li><strong>Trusses</strong> = <code>ceil(Roof length × 12 ÷ Truss spacing+1)</code> = <strong>16</strong></li><li><strong>Rafter length</strong> = <code>√((Building span ÷ 2+Overhang ÷ 12)^2+((Building span ÷ 2+Overhang ÷ 12) × Pitch ÷ 12)^2)</code> = <strong>14.534 ft</strong></li><li><strong>Peak above wall</strong> = <code>Building span ÷ 2 × Pitch ÷ 12</code> = <strong>6 ft</strong></li><li><strong>Gable area</strong> = <code>Building span × (Building span ÷ 2 × Pitch ÷ 12) ÷ 2</code> = <strong>72 ft²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil(30 × 12 ÷ 24+1) = 16</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 30 ft roof on 24 in centres takes 16 trusses. At a 6/12 pitch over a 24 ft span the peak is 6 ft above the wall, each rafter runs about 14.5 ft with the overhang, and each gable closes 72 ft².</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the truss count against the roof length: one per two feet at 24 in centres. A count per foot means the spacing box is in the wrong unit, which on a truss order is an expensive mistake to discover on the day.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Trusses</th><th>Rafter length</th><th>Peak above wall</th><th>Gable area</th></tr></thead><tbody><tr><td><strong>Roof length</strong> +10 %</td><td>+12.5 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Building span</strong> +10 %</td><td>+0 %</td><td>+9.23 %</td><td>+10 %</td><td>+21 %</td></tr><tr><td><strong>Truss spacing</strong> +10 %</td><td>−6.25 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Pitch</strong> +10 %</td><td>+0 %</td><td>+2.08 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Overhang</strong> +10 %</td><td>+0 %</td><td>+0.77 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Building span</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Overhang</strong>, at 0.8 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Roof length = 40, Building span = 30, Truss spacing = 24, Pitch = 8, Overhang = 18, the page reports <strong>Trusses</strong> = 21, <strong>Rafter length</strong> = 19.831 ft, <strong>Peak above wall</strong> = 10 ft, <strong>Gable area</strong> = 150 ft². A larger roof at a steeper pitch: the rafters lengthen faster than the span grows.</li><li>With Roof length = 20, Building span = 20, Truss spacing = 16, Pitch = 4, Overhang = 12, the page reports <strong>Trusses</strong> = 16, <strong>Rafter length</strong> = 11.595 ft, <strong>Peak above wall</strong> = 3.333 ft, <strong>Gable area</strong> = 33.333 ft². A shallow pitch on the tighter spacing, which is what a heavy tile roof asks for.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Spacing read as a gap.</strong> 24 in centres is 24 in joist to joist.</li><li><strong>Overhang left out of the rafter.</strong> It adds length along the slope, not horizontally.</li><li><strong>Peak measured to the ridge board.</strong> The number here is the rise above the wall, before any ridge depth.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Trusses, Rafter length (ft), Peak above wall (ft), Gable area (ft²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Roof length, span, pitch as rise per 12, overhang in inches; the count is whole trusses, lengths in feet and the gable area in square feet.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need roof length and building span and truss spacing and pitch and overhang. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Trusses and rafter length and peak above wall and gable area should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Roof length</strong> ×10</td><td>16</td><td>151</td><td>×9.438</td></tr><tr><td><strong>Building span</strong> ×10</td><td>16</td><td>16</td><td>unchanged</td></tr><tr><td><strong>Truss spacing</strong> ×10</td><td>16</td><td>3</td><td>×0.188</td></tr><tr><td><strong>Pitch</strong> ×10</td><td>16</td><td>16</td><td>unchanged</td></tr><tr><td><strong>Overhang</strong> ×10</td><td>16</td><td>16</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A simple gable.</strong> Hips, valleys and dormers change both the count and the sheathing.</li><li><strong>No structural sizing.</strong> The truss engineer does that.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering trusses for a gable roof.</li></li><li><li>Sizing gable sheathing.</li></li><li><li>Checking a truss layout drawing.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/roof-pitch">Roof pitch</a> <a href="/construction/rafter-length">Rafter length</a> <a href="/construction/roof-shingle">Roof shingle</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Roof truss calculator work out?', 'a' => <<<'TXT'
            It returns trusses and rafter length and peak above wall and gable area from roof length and building span and truss spacing and pitch and overhang. The relationship is ceil(Roof length × 12 ÷ Truss spacing+1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Roof length (ft), Building span (ft), Truss spacing (in), Pitch (x/12), Overhang (in). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: roof length in ft; building span in ft; truss spacing in in; pitch in x/12; overhang in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many trusses for a 30 ft roof?', 'a' => 'Sixteen at 24 in centres: fifteen spaces plus the truss at the far end.'],
            ['q' => 'How do you find the peak height from the pitch?', 'a' => 'Multiply half the span by the pitch and divide by twelve.'],
        ],
        'related' => [
            ['path' => '/construction/roof-pitch', 'name' => 'Roof pitch'],
            ['path' => '/construction/rafter-length', 'name' => 'Rafter length'],
            ['path' => '/construction/roof-shingle', 'name' => 'Roof shingle'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

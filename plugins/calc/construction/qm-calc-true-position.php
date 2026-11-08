<?php

/**
 * True position
 * /construction/true-position
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'True position',
    'meta' => ['title' => 'True Position Calculator: Deviation and Tolerance', 'description' => 'Work out the true position of a hole from its deviations in X and Y, as a diametral zone in inches, millimetres and radius. The formula and units are shown.', 'h1' => 'True position', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'deviation_x',
                    'label' => 'Deviation in X',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.01',
                    'help' => 'Measured minus basic',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'deviation_y',
                    'label' => 'Deviation in Y',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.005',
                    'help' => 'Measured minus basic',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'true_position',
                    'label' => 'True position',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'true_position_mm',
                    'label' => 'True position',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mm',
                ],
                [
                    'name' => 'radius',
                    'label' => 'Radial deviation',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'zone_area',
                    'label' => 'Zone area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in²',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'True position',
            'results' => [
                'true_position' => '2*sqrt(pow(deviation_x,2)+pow(deviation_y,2))',
                'true_position_mm' => '2*sqrt(pow(deviation_x,2)+pow(deviation_y,2))*25.4',
                'radius' => 'sqrt(pow(deviation_x,2)+pow(deviation_y,2))',
                'zone_area' => 'pi*pow(sqrt(pow(deviation_x,2)+pow(deviation_y,2)),2)',
                'deviation_x' => 'sqrt(pow(true_position/2,2)-pow(deviation_y,2))',
                'deviation_y' => 'sqrt(pow(true_position/2,2)-pow(deviation_x,2))',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>True position = 2 × √(Δx² + Δy²)</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>True position is how a drawing says "put this hole here, and let it be off by no more than this much in any direction". Because the tolerance is a circle, the deviation is combined as a diameter — twice the radial distance — which is why the formula doubles it.</p><p>The page reports <strong>true position (in) and true position (mm) and radial deviation and zone area</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>True position (in)</strong></td><td><code>2 × √((Deviation in X)^2+(Deviation in Y)^2)</code></td></tr><tr><td><strong>True position (mm)</strong></td><td><code>2 × √((Deviation in X)^2+(Deviation in Y)^2) × 25.4</code></td></tr><tr><td><strong>Radial deviation</strong></td><td><code>√((Deviation in X)^2+(Deviation in Y)^2)</code></td></tr><tr><td><strong>Zone area</strong></td><td><code>pi × pow(√((Deviation in X)^2+(Deviation in Y)^2),2)</code></td></tr><tr><td><strong>Deviation in X</strong></td><td><code>√((True position (in) ÷ 2)^2-(Deviation in Y)^2)</code></td></tr><tr><td><strong>Deviation in Y</strong></td><td><code>√((True position (in) ÷ 2)^2-(Deviation in X)^2)</code></td></tr></tbody></table><p><p>The two deviations form a right triangle, so the radial error is the square root of the sum of their squares. The tolerance zone is a circle of twice that diameter, so the true position is the diameter of the smallest circle that would contain the actual hole centre.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports true position (in) and true position (mm) and radial deviation and zone area.</p><ul><li><strong>Deviation in X</strong> — in in. Measured minus basic</li><li><strong>Deviation in Y</strong> — in in. Measured minus basic</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>True position</strong> — in in</li><li><strong>True position</strong> — in mm</li><li><strong>Radial deviation</strong> — in in</li><li><strong>Zone area</strong> — in in²</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Deviation in X = 0.01 in, Deviation in Y = 0.005 in — and the results panel reads:</p><ul><li><strong>True position</strong> = <code>2 × √((Deviation in X)^2+(Deviation in Y)^2)</code> = <strong>0.022 in</strong></li><li><strong>True position</strong> = <code>2 × √((Deviation in X)^2+(Deviation in Y)^2) × 25.4</code> = <strong>0.568 mm</strong></li><li><strong>Radial deviation</strong> = <code>√((Deviation in X)^2+(Deviation in Y)^2)</code> = <strong>0.011 in</strong></li><li><strong>Zone area</strong> = <code>pi × pow(√((Deviation in X)^2+(Deviation in Y)^2),2)</code> = <strong>0.0003927 in²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>2 × sqrt(pow(0.01,2)+pow(0.005,2)) = 0.022</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A hole 0.01 in off in X and 0.005 in off in Y has a radial error of 0.011 in and a true position of 0.022 in — 0.568 mm.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the true position against the drawing's tolerance: if it is inside, the hole passes. A value at about seventy per cent of the tolerance is the sensible target, because the next part will not be made the same way.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>True position</th><th>True position</th><th>Radial deviation</th><th>Zone area</th></tr></thead><tbody><tr><td><strong>Deviation in X</strong> +10 %</td><td>+8.07 %</td><td>+8.07 %</td><td>+8.07 %</td><td>+16.8 %</td></tr><tr><td><strong>Deviation in Y</strong> +10 %</td><td>+2.08 %</td><td>+2.08 %</td><td>+2.08 %</td><td>+4.2 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Deviation in X</strong>: a ten per cent move there shifts the result by about 16.8 per cent. The least sensitive is <strong>Deviation in Y</strong>, at 4.2 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Deviation in X = 0.02, Deviation in Y = 0.02, the page reports <strong>True position</strong> = 0.057 in, <strong>True position</strong> = 1.437 mm, <strong>Radial deviation</strong> = 0.028 in, <strong>Zone area</strong> = 0.003 in². Equal deviations: the radial error is over forty per cent larger than either.</li><li>With Deviation in X = 0.005, Deviation in Y = 0, the page reports <strong>True position</strong> = 0.01 in, <strong>True position</strong> = 0.254 mm, <strong>Radial deviation</strong> = 0.005 in, <strong>Zone area</strong> = 7.854 × 10<sup>-5</sup> in². A hole off in one axis only: the position is twice the deviation.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Radial error quoted as true position.</strong> It is half the tolerance zone.</li><li><strong>Deviations added rather than squared.</strong> The error is a vector.</li><li><strong>MMC bonus forgotten.</strong> It enlarges the zone.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: True position (in), True position (mm), Radial deviation (in), Zone area (in²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Deviations and position in inches and millimetres.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need deviation in X and deviation in Y. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> True position (in) and true position (mm) and radial deviation and zone area should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Deviation in X</strong> ×10</td><td>0.022</td><td>0.2</td><td>×8.955</td></tr><tr><td><strong>Deviation in Y</strong> ×10</td><td>0.022</td><td>0.102</td><td>×4.561</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Two axes.</strong> A three-dimensional position needs a third term.</li><li><strong>Position only.</strong> Form and orientation are separate tolerances.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a hole on a CMM.</li></li><li><li>Converting a drawing callout.</li></li><li><li>Reporting an inspection result.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/bolt-circle">Bolt circle</a> <a href="/construction/clearance-hole">Clearance hole</a> <a href="/construction/thread">Thread</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the True position calculator work out?', 'a' => <<<'TXT'
            It returns true position (in) and true position (mm) and radial deviation and zone area from deviation in X and deviation in Y. The relationship is 2 × √((Deviation in X)^2+(Deviation in Y)^2).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Deviation in X (in), Deviation in Y (in). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: deviation in X in in; deviation in Y in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why does the true position formula double the error?', 'a' => 'Because the tolerance is a diametral zone, so the combined error is expressed as a diameter.'],
            ['q' => 'What true position is acceptable?', 'a' => 'Whatever the drawing allows — the calculated value must be inside that zone.'],
        ],
        'related' => [
            ['path' => '/construction/bolt-circle', 'name' => 'Bolt circle'],
            ['path' => '/construction/clearance-hole', 'name' => 'Clearance hole'],
            ['path' => '/construction/thread', 'name' => 'Thread'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

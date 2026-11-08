<?php

/**
 * Arch
 * /construction/arch
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Arch',
    'meta' => ['title' => 'Arch Calculator: Radius, Arc Length and Area', 'description' => 'Work out the radius of a segmental arch from its span and rise, with the arc length, the angle it subtends and the area it encloses. for the setting-out string.', 'h1' => 'Arch', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'span',
                    'label' => 'Span',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '10',
                    'help' => 'The clear opening, chord to chord',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rise',
                    'label' => 'Rise',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '2.5',
                    'help' => 'Height of the arch above the springing line',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'radius',
                    'label' => 'Radius',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'angle',
                    'label' => 'Angle subtended',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '°',
                ],
                [
                    'name' => 'arc_length',
                    'label' => 'Arc length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'area',
                    'label' => 'Area under the arch',
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
            'title' => 'Arch',
            'results' => [
                'radius' => '(pow(span,2)/4+pow(rise,2))/(2*rise)',
                'angle' => '2*asin((span/2)/((pow(span,2)/4+pow(rise,2))/(2*rise)))*180/pi',
                'arc_length' => '(pow(span,2)/4+pow(rise,2))/(2*rise)*2*asin((span/2)/((pow(span,2)/4+pow(rise,2))/(2*rise)))',
                'area' => <<<'TXT'
                pow((pow(span,2)/4+pow(rise,2))/(2*rise),2)/2*(2*asin((span/2)/((pow(span,2)/4+pow(rise,2))/(2*rise)))-sin(2*asin((span/2)/((pow(span,2)/4+pow(rise,2))/(2*rise)))))
                TXT,
                'span' => '2*sqrt(2*radius*rise-pow(rise,2))',
                'rise' => 'radius-sqrt(pow(radius,2)-pow(span,2)/4)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A segmental arch is a chord and a rise on one circle: <strong>R = (span² ÷ 4 + rise²) ÷ (2 × rise)</strong>, and the arc follows from the angle that circle subtends.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>An arch is drawn by its span and its rise, but it is built from a radius — the setting-out string, the plywood template and the brick bond all need that radius. The arc length is what the arch soffit is measured along, and the area is what the infill concrete or the glass has to match.</p><p>The page reports <strong>radius and angle subtended and arc length and area under the arch</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Radius</strong></td><td><code>((Span)^2 ÷ 4+(Rise)^2) ÷ (2 × Rise)</code></td></tr><tr><td><strong>Angle subtended</strong></td><td><code>2 × asin((Span ÷ 2) ÷ (((Span)^2 ÷ 4+(Rise)^2) ÷ (2 × Rise))) × 180 ÷ pi</code></td></tr><tr><td><strong>Arc length</strong></td><td><code>((Span)^2 ÷ 4+(Rise)^2) ÷ (2 × Rise) × 2 × asin((Span ÷ 2) ÷ (((Span)^2 ÷ 4+(Rise)^2) ÷ (2 × Rise)))</code></td></tr><tr><td><strong>Area under the arch</strong></td><td><code>pow(((Span)^2 ÷ 4+(Rise)^2) ÷ (2 × Rise),2) ÷ 2 × (2 × asin((Span ÷ 2) ÷ (((Span)^2 ÷ 4+(Rise)^2) ÷ (2 × Rise)))-sin(2 × asin((Span ÷ 2) ÷ (((Span)^2 ÷ 4+(Rise)^2) ÷ (2 × Rise)))))</code></td></tr><tr><td><strong>Span</strong></td><td><code>2 × √(2 × Radius × Rise-(Rise)^2)</code></td></tr><tr><td><strong>Rise</strong></td><td><code>Radius-√((Radius)^2-(Span)^2 ÷ 4)</code></td></tr></tbody></table><p><p>The radius comes from the intersecting chord theorem: half the span squared over the rise, plus half the rise. The arc length is the radius times the angle in radians, and the segment area is a sector minus the triangle inside it.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports radius and angle subtended and arc length and area under the arch.</p><ul><li><strong>Span</strong> — in ft. The clear opening, chord to chord</li><li><strong>Rise</strong> — in ft. Height of the arch above the springing line</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Radius</strong> — in ft</li><li><strong>Angle subtended</strong> — in °</li><li><strong>Arc length</strong> — in ft</li><li><strong>Area under the arch</strong> — in ft²</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Span = 10 ft, Rise = 2.5 ft — and the results panel reads:</p><ul><li><strong>Radius</strong> = <code>((Span)^2 ÷ 4+(Rise)^2) ÷ (2 × Rise)</code> = <strong>6.25 ft</strong></li><li><strong>Angle subtended</strong> = <code>2 × asin((Span ÷ 2) ÷ (((Span)^2 ÷ 4+(Rise)^2) ÷ (2 × Rise))) × 180 ÷ pi</code> = <strong>106.26 °</strong></li><li><strong>Arc length</strong> = <code>((Span)^2 ÷ 4+(Rise)^2) ÷ (2 × Rise) × 2 × asin((Span ÷ 2) ÷ (((Span)^2 ÷ 4+(Rise)^2) ÷ (2 × Rise)))</code> = <strong>11.591 ft</strong></li><li><strong>Area under the arch</strong> = <code>pow(((Span)^2 ÷ 4+(Rise)^2) ÷ (2 × Rise),2) ÷ 2 × (2 × asin((Span ÷ 2) ÷ (((Span)^2 ÷ 4+(Rise)^2) ÷ (2 × Rise)))-sin(2 × asin((Span ÷ 2) ÷ (((Span)^2 ÷ 4+(Rise)^2) ÷ (2 × Rise)))))</code> = <strong>17.472 ft²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>(pow(10,2) ÷ 4+pow(2.5,2)) ÷ (2 × 2.5) = 6.25</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 10 ft span with a 2.5 ft rise needs a radius of 6.25 ft, subtends 106.3° and runs 11.6 ft along the arc. The segment enclosed is 17.47 ft² — the area a window or a lintel infill has to fill.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the angle against the rise: a shallow segment subtends a small angle, and a semicircular arch subtends exactly 180° when the rise is half the span. Past that, the arch is horseshoe-shaped and the formula still works.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Radius</th><th>Angle subtended</th><th>Arc length</th><th>Area under the arch</th></tr></thead><tbody><tr><td><strong>Span</strong> +10 %</td><td>+16.8 %</td><td>−7.98 %</td><td>+7.47 %</td><td>+9.14 %</td></tr><tr><td><strong>Rise</strong> +10 %</td><td>−5.27 %</td><td>+8.45 %</td><td>+2.74 %</td><td>+11.03 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Span</strong>: a ten per cent move there shifts the result by about 16.8 per cent. The least sensitive is <strong>Rise</strong>, at 11 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Span = 6, Rise = 3, the page reports <strong>Radius</strong> = 3 ft, <strong>Angle subtended</strong> = 180 °, <strong>Arc length</strong> = 9.425 ft, <strong>Area under the arch</strong> = 14.137 ft². A semicircular arch: rise is half the span, so the radius equals half the span and the angle is 180°.</li><li>With Span = 12, Rise = 1.5, the page reports <strong>Radius</strong> = 12.75 ft, <strong>Angle subtended</strong> = 56.145 °, <strong>Arc length</strong> = 12.494 ft, <strong>Area under the arch</strong> = 12.149 ft². A shallow segmental arch over a wide opening — a long radius and a small angle.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Rise measured to the top of the arch.</strong> It is measured from the springing line, the level where the curve starts.</li><li><strong>Radius assumed to be half the span.</strong> That is only true of a semicircle.</li><li><strong>Arc length used as the opening.</strong> The opening is the chord.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Radius (ft), Angle subtended (°), Arc length (ft), Area under the arch (ft²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Span and rise in feet, the radius and arc length in feet, the angle in degrees and the area in square feet.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need span and rise. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Radius and angle subtended and arc length and area under the arch should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Span</strong> ×10</td><td>6.25</td><td>501.25</td><td>×80.2</td></tr><tr><td><strong>Rise</strong> ×10</td><td>6.25</td><td>13</td><td>×2.08</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A circular segment.</strong> Elliptical and pointed arches are set out differently.</li><li><strong>Geometry only.</strong> Thrust and abutment are the engineer's problem.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Setting out an arch template.</li></li><li><li>Measuring a soffit along the curve.</li></li><li><li>Sizing glass or infill for a segmental opening.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/arch">Arch</a> <a href="/construction/rafter-length">Rafter length</a> <a href="/construction/roof-pitch">Roof pitch</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Arch calculator work out?', 'a' => 'It returns radius and angle subtended and arc length and area under the arch from span and rise. The relationship is ((Span)^2 ÷ 4+(Rise)^2) ÷ (2 × Rise).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Span (ft), Rise (ft). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: span in ft; rise in ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do you find the radius of an arch?', 'a' => 'R = (span²/4 + rise²) / (2 × rise). A semicircular arch gives R = span/2.'],
            ['q' => 'What is the area under an arch?', 'a' => 'A circular segment: R²/2 × (θ − sin θ) with θ in radians.'],
        ],
        'related' => [
            ['path' => '/construction/arch', 'name' => 'Arch'],
            ['path' => '/construction/rafter-length', 'name' => 'Rafter length'],
            ['path' => '/construction/roof-pitch', 'name' => 'Roof pitch'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

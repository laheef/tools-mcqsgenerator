<?php

/**
 * Wood beam span
 * /construction/wood-beam-span
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Wood beam span',
    'meta' => ['title' => 'Wood Beam Span Calculator: Depth for a Load', 'description' => 'Check how far a wood beam can span from its section, its species and the load it carries, using the section modulus and allowable bending stress. in one check.', 'h1' => 'Wood beam span', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'width',
                    'label' => 'Beam width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '3.5',
                    'help' => 'Actual width of the section',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Beam depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '9.25',
                    'help' => 'Actual depth — the term that matters',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fb',
                    'label' => 'Allowable bending stress',
                    'type' => 'number',
                    'suffix' => 'psi',
                    'default' => '1000',
                    'help' => 'Fb for the species and grade, about 1000',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'load',
                    'label' => 'Uniform load',
                    'type' => 'number',
                    'suffix' => 'lb/ft',
                    'default' => '300',
                    'help' => 'Total load per foot of beam',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'section_modulus',
                    'label' => 'Section modulus',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in³',
                ],
                [
                    'name' => 'max_moment',
                    'label' => 'Allowable moment',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb·in',
                ],
                [
                    'name' => 'max_span',
                    'label' => 'Maximum span',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'total_load',
                    'label' => 'Load at that span',
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
            'title' => 'Wood beam span',
            'results' => [
                'section_modulus' => 'width*pow(depth,2)/6',
                'max_moment' => 'fb*width*pow(depth,2)/6',
                'max_span' => 'sqrt(8*fb*width*pow(depth,2)/6/(load/12))/12',
                'total_load' => 'load*sqrt(8*fb*width*pow(depth,2)/6/(load/12))/12',
                'width' => '6*section_modulus/pow(depth,2)',
                'depth' => 'sqrt(6*section_modulus/width)',
                'fb' => 'max_moment/section_modulus',
                'load' => '8*fb*width*pow(depth,2)/6/pow(max_span*12,2)*12',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A beam fails in bending when the moment exceeds the allowable stress: <strong>M = Fb × S</strong> with <strong>S = b × d² ÷ 6</strong>. Set that against <strong>M = w × L² ÷ 8</strong> and the span follows.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Span tables answer this question by looking up a number, which is fine until the beam is a size the table does not list, or the load is not the one the table assumes. Going back to the bending equation shows why depth matters so much more than width: the capacity goes with the square of the depth and only linearly with the width.</p><p>The page reports <strong>section modulus and allowable moment and maximum span and load at that span</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Section modulus</strong></td><td><code>Beam width × (Beam depth)^2 ÷ 6</code></td></tr><tr><td><strong>Allowable moment</strong></td><td><code>Allowable bending stress × Beam width × (Beam depth)^2 ÷ 6</code></td></tr><tr><td><strong>Maximum span</strong></td><td><code>√(8 × Allowable bending stress × Beam width × (Beam depth)^2 ÷ 6 ÷ (Uniform load ÷ 12)) ÷ 12</code></td></tr><tr><td><strong>Load at that span</strong></td><td><code>Uniform load × √(8 × Allowable bending stress × Beam width × (Beam depth)^2 ÷ 6 ÷ (Uniform load ÷ 12)) ÷ 12</code></td></tr><tr><td><strong>Beam width</strong></td><td><code>6 × Section modulus ÷ (Beam depth)^2</code></td></tr><tr><td><strong>Beam depth</strong></td><td><code>√(6 × Section modulus ÷ Beam width)</code></td></tr><tr><td><strong>Allowable bending stress</strong></td><td><code>Allowable moment ÷ Section modulus</code></td></tr><tr><td><strong>Uniform load</strong></td><td><code>8 × Allowable bending stress × Beam width × (Beam depth)^2 ÷ 6 ÷ (Maximum span × 12)^2 × 12</code></td></tr></tbody></table><p><p>The section modulus of a rectangle is bd²/6. Multiplying by the allowable bending stress gives the moment the beam can take, and the moment at midspan of a uniformly loaded beam is wL²/8, so the span is the square root of eight times the moment over the load. The load in pounds per foot is divided by twelve to keep the span in inches.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports section modulus and allowable moment and maximum span and load at that span.</p><ul><li><strong>Beam width</strong> — in in. Actual width of the section</li><li><strong>Beam depth</strong> — in in. Actual depth — the term that matters</li><li><strong>Allowable bending stress</strong> — in psi. Fb for the species and grade, about 1000</li><li><strong>Uniform load</strong> — in lb/ft. Total load per foot of beam</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Section modulus</strong> — in in³</li><li><strong>Allowable moment</strong> — in lb·in</li><li><strong>Maximum span</strong> — in ft</li><li><strong>Load at that span</strong> — in lb</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Beam width = 3.5 in, Beam depth = 9.25 in, Allowable bending stress = 1 000 psi, Uniform load = 300 lb/ft — and the results panel reads:</p><ul><li><strong>Section modulus</strong> = <code>Beam width × (Beam depth)^2 ÷ 6</code> = <strong>49.911 in³</strong></li><li><strong>Allowable moment</strong> = <code>Allowable bending stress × Beam width × (Beam depth)^2 ÷ 6</code> = <strong>49 911.458 lb·in</strong></li><li><strong>Maximum span</strong> = <code>√(8 × Allowable bending stress × Beam width × (Beam depth)^2 ÷ 6 ÷ (Uniform load ÷ 12)) ÷ 12</code> = <strong>10.532 ft</strong></li><li><strong>Load at that span</strong> = <code>Uniform load × √(8 × Allowable bending stress × Beam width × (Beam depth)^2 ÷ 6 ÷ (Uniform load ÷ 12)) ÷ 12</code> = <strong>3 159.476 lb</strong></li></ul><p>With the numbers written into the formula, the first result is <code>3.5 × pow(9.25,2) ÷ 6 = 49.911</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 3½ × 9¼ beam of 1000 psi timber carrying 300 lb/ft: the section modulus is 49.9 in³, the allowable moment 49 900 lb·in, and the span works out near 10½ ft — before deflection is considered, which usually governs a long span first.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the span against the depth: a 2 × 10 spans about 1.3 times a 2 × 8 in the same species, because capacity follows the square of the depth. Doubling the depth quadruples the allowable moment and roughly doubles the span.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Section modulus</th><th>Allowable moment</th><th>Maximum span</th><th>Load at that span</th></tr></thead><tbody><tr><td><strong>Beam width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+4.88 %</td><td>+4.88 %</td></tr><tr><td><strong>Beam depth</strong> +10 %</td><td>+21 %</td><td>+21 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Allowable bending stress</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+4.88 %</td><td>+4.88 %</td></tr><tr><td><strong>Uniform load</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−4.65 %</td><td>+4.88 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Beam depth</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Uniform load</strong>, at 4.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Beam width = 5.5, Beam depth = 11.25, Allowable bending stress = 1 200, Uniform load = 400, the page reports <strong>Section modulus</strong> = 116.016 in³, <strong>Allowable moment</strong> = 139 218.75 lb·in, <strong>Maximum span</strong> = 15.233 ft, <strong>Load at that span</strong> = 6 093.029 lb. A 6 × 12 in a better grade, carrying a heavier floor — the same calculation with both capacity terms improved.</li><li>With Beam width = 3.5, Beam depth = 7.25, Allowable bending stress = 900, Uniform load = 250, the page reports <strong>Section modulus</strong> = 30.661 in³, <strong>Allowable moment</strong> = 27 595.312 lb·in, <strong>Maximum span</strong> = 8.578 ft, <strong>Load at that span</strong> = 2 144.579 lb. A 2 × 8 doing light duty: the depth term falls away quickly.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Deflection ignored.</strong> The bending check gives the strength span; the serviceability limit is often shorter.</li><li><strong>Fb guessed.</strong> Species and grade move the allowable stress from about 600 to over 1500 psi.</li><li><strong>Self weight left out.</strong> A heavy beam adds to its own load.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Section modulus (in³), Allowable moment (lb·in), Maximum span (ft), Load at that span (lb).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Section in inches, stress in psi, load in pounds per linear foot, moment in pound-inches and the span in feet.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need beam width and beam depth and allowable bending stress and uniform load. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Section modulus and allowable moment and maximum span and load at that span should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Beam width</strong> ×10</td><td>49.911</td><td>499.115</td><td>ten times larger</td></tr><tr><td><strong>Beam depth</strong> ×10</td><td>49.911</td><td>4 991.146</td><td>×100</td></tr><tr><td><strong>Allowable bending stress</strong> ×10</td><td>49.911</td><td>49.911</td><td>unchanged</td></tr><tr><td><strong>Uniform load</strong> ×10</td><td>49.911</td><td>49.911</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Simple span, uniform load.</strong> Point loads, cantilevers and continuous beams need their own equations.</li><li><strong>No lateral stability check.</strong> Bearing, shear and buckling are separate.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a beam size against a span.</li></li><li><li>Seeing what a deeper section buys.</li></li><li><li>Sanity-checking a span table.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/beam-deflection">Beam deflection</a> <a href="/construction/beam-load">Beam load</a> <a href="/construction/floor-joist">Floor joist</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Wood beam span calculator work out?', 'a' => <<<'TXT'
            It returns section modulus and allowable moment and maximum span and load at that span from beam width and beam depth and allowable bending stress and uniform load. The relationship is Beam width × (Beam depth)^2 ÷ 6.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Beam width (in), Beam depth (in), Allowable bending stress (psi), Uniform load (lb/ft). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: beam width in in; beam depth in in; allowable bending stress in psi; uniform load in lb/ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How far can a 2 × 10 span?', 'a' => 'Roughly 12 ft carrying 300 lb/ft in a 1000 psi species on the bending check; deflection usually shortens it.'],
            ['q' => 'Why does depth matter more than width?', 'a' => 'The section modulus goes with the square of the depth but only linearly with the width.'],
        ],
        'related' => [
            ['path' => '/construction/beam-deflection', 'name' => 'Beam deflection'],
            ['path' => '/construction/beam-load', 'name' => 'Beam load'],
            ['path' => '/construction/floor-joist', 'name' => 'Floor joist'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

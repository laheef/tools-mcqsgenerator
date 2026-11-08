<?php

/**
 * Beam deflection
 * /construction/beam-deflection
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Beam deflection',
    'meta' => ['title' => 'Beam Deflection Calculator: Sag under a Uniform Load', 'description' => 'Work out how far a beam sags under a uniform load from its span, stiffness and section, and compare the answer with the L/360 limit. before the floor is framed.', 'h1' => 'Beam deflection', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'span',
                    'label' => 'Span',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Clear span, support to support',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'load',
                    'label' => 'Uniform load',
                    'type' => 'number',
                    'suffix' => 'lb/ft',
                    'default' => '300',
                    'help' => 'Total load per foot',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'e',
                    'label' => 'Modulus of elasticity',
                    'type' => 'number',
                    'suffix' => 'psi',
                    'default' => '1600000',
                    'help' => '1.6 million for softwood, 1.8 for better grades',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'i',
                    'label' => 'Moment of inertia',
                    'type' => 'number',
                    'suffix' => 'in⁴',
                    'default' => '120',
                    'help' => 'For a 2 × 10: bd³/12 = 98',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'deflection',
                    'label' => 'Deflection',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'ratio',
                    'label' => 'Span / deflection',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'limit',
                    'label' => 'L/360 limit',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'margin',
                    'label' => 'Margin to the L/360 limit',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Beam deflection',
            'results' => [
                'deflection' => '5*(load/12)*pow(span*12,4)/(384*e*i)',
                'ratio' => 'span*12/(5*(load/12)*pow(span*12,4)/(384*e*i))',
                'limit' => 'span*12/360',
                'margin' => 'span*12/360-5*(load/12)*pow(span*12,4)/(384*e*i)',
                'span' => 'pow(deflection*384*e*i/(5*(load/12)),0.25)/12',
                'i' => '5*(load/12)*pow(span*12,4)/(384*e*deflection)',
                'e' => '5*(load/12)*pow(span*12,4)/(384*i*deflection)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A uniformly loaded simple beam sags by <strong>δ = 5 w L⁴ ÷ (384 E I)</strong>, with the load in pounds per inch, the span in inches, E in psi and I in inches to the fourth.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Strength and stiffness are different questions. A beam can be strong enough not to break and still sag enough to crack the plaster above it or make a floor feel springy. The L/360 rule — a deflection of no more than the span divided by 360 — is the usual serviceability limit for a floor.</p><p>The page reports <strong>deflection and span / deflection and l/360 limit and margin to the L/360 limit</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Deflection</strong></td><td><code>5 × (Uniform load ÷ 12) × (Span × 12)^4 ÷ (384 × Modulus of elasticity × Moment of inertia)</code></td></tr><tr><td><strong>Span / deflection</strong></td><td><code>Span × 12 ÷ (5 × (Uniform load ÷ 12) × (Span × 12)^4 ÷ (384 × Modulus of elasticity × Moment of inertia))</code></td></tr><tr><td><strong>L/360 limit</strong></td><td><code>Span × 12 ÷ 360</code></td></tr><tr><td><strong>Margin to the L/360 limit</strong></td><td><code>Span × 12 ÷ 360-5 × (Uniform load ÷ 12) × (Span × 12)^4 ÷ (384 × Modulus of elasticity × Moment of inertia)</code></td></tr><tr><td><strong>Span</strong></td><td><code>pow(Deflection × 384 × Modulus of elasticity × Moment of inertia ÷ (5 × (Uniform load ÷ 12)),0.25) ÷ 12</code></td></tr><tr><td><strong>Moment of inertia</strong></td><td><code>5 × (Uniform load ÷ 12) × (Span × 12)^4 ÷ (384 × Modulus of elasticity × Deflection)</code></td></tr><tr><td><strong>Modulus of elasticity</strong></td><td><code>5 × (Uniform load ÷ 12) × (Span × 12)^4 ÷ (384 × Moment of inertia × Deflection)</code></td></tr></tbody></table><p><p>The span appears to the fourth power, which is why deflection is so sensitive to length: doubling the span multiplies the sag by sixteen. The load is divided by twelve to get pounds per inch so that the whole equation works in inches.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports deflection and span / deflection and l/360 limit and margin to the L/360 limit.</p><ul><li><strong>Span</strong> — in ft. Clear span, support to support</li><li><strong>Uniform load</strong> — in lb/ft. Total load per foot</li><li><strong>Modulus of elasticity</strong> — in psi. 1.6 million for softwood, 1.8 for better grades</li><li><strong>Moment of inertia</strong> — in in⁴. For a 2 × 10: bd³/12 = 98</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Deflection</strong> — in in</li><li><strong>Span / deflection</strong></li><li><strong>L/360 limit</strong> — in in</li><li><strong>Margin to the L/360 limit</strong> — in in</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Span = 12 ft, Uniform load = 300 lb/ft, Modulus of elasticity = 1.6 × 10<sup>6</sup> psi, Moment of inertia = 120 in⁴ — and the results panel reads:</p><ul><li><strong>Deflection</strong> = <code>5 × (Uniform load ÷ 12) × (Span × 12)^4 ÷ (384 × Modulus of elasticity × Moment of inertia)</code> = <strong>0.729 in</strong></li><li><strong>Span / deflection</strong> = <code>Span × 12 ÷ (5 × (Uniform load ÷ 12) × (Span × 12)^4 ÷ (384 × Modulus of elasticity × Moment of inertia))</code> = <strong>197.531</strong></li><li><strong>L/360 limit</strong> = <code>Span × 12 ÷ 360</code> = <strong>0.4 in</strong></li><li><strong>Margin to the L/360 limit</strong> = <code>Span × 12 ÷ 360-5 × (Uniform load ÷ 12) × (Span × 12)^4 ÷ (384 × Modulus of elasticity × Moment of inertia)</code> = <strong>-0.329 in</strong></li></ul><p>With the numbers written into the formula, the first result is <code>5 × (300 ÷ 12) × pow(12 × 12,4) ÷ (384 × 1.6 × 10<sup>6< ÷ sup> × 120) = 0.729</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 12 ft span carrying 300 lb/ft on E 1.6 M psi and I 120 in⁴ sags 0.73 in, which is L/198 — past the L/360 limit of 0.40 in, so this beam fails the serviceability check. A 2 × 14 with I 290 in⁴ brings it to 0.30 in and inside the limit, which is the trade this page is for.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the ratio against 360: a larger number is stiffer and a smaller one sags more than a floor should. Ceilings with plaster want L/480, and a garage header with brick above wants more again.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Deflection</th><th>Span / deflection</th><th>L/360 limit</th><th>Margin to the L/360 limit</th></tr></thead><tbody><tr><td><strong>Span</strong> +10 %</td><td>+46.41 %</td><td>−24.87 %</td><td>+10 %</td><td>−90.68 %</td></tr><tr><td><strong>Uniform load</strong> +10 %</td><td>+10 %</td><td>−9.09 %</td><td>+0 %</td><td>−22.16 %</td></tr><tr><td><strong>Modulus of elasticity</strong> +10 %</td><td>−9.09 %</td><td>+10 %</td><td>+0 %</td><td>+20.14 %</td></tr><tr><td><strong>Moment of inertia</strong> +10 %</td><td>−9.09 %</td><td>+10 %</td><td>+0 %</td><td>+20.14 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Span</strong>: a ten per cent move there shifts the result by about 90.7 per cent. The least sensitive is <strong>Moment of inertia</strong>, at 20.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Span = 16, Uniform load = 300, Modulus of elasticity = 1.6 × 10<sup>6</sup>, Moment of inertia = 120, the page reports <strong>Deflection</strong> = 2.304 in, <strong>Span / deflection</strong> = 83.333, <strong>L/360 limit</strong> = 0.533 in, <strong>Margin to the L/360 limit</strong> = -1.771 in. The same load over a longer span: the fourth-power term makes this the case that fails.</li><li>With Span = 10, Uniform load = 450, Modulus of elasticity = 1.8 × 10<sup>6</sup>, Moment of inertia = 178, the page reports <strong>Deflection</strong> = 0.316 in, <strong>Span / deflection</strong> = 379.733, <strong>L/360 limit</strong> = 0.333 in, <strong>Margin to the L/360 limit</strong> = 0.017 in. A short, deep, stiff beam carrying a heavy load — comfortably inside L/360.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Span in feet in the equation.</strong> Everything inside works in inches; the twelve is not optional.</li><li><strong>Moment of inertia guessed.</strong> For a rectangle it is bd³/12, and the cube makes depth decisive.</li><li><strong>Deflection checked after the fact.</strong> It usually governs the design, so it belongs in the first pass.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Deflection (in), Span / deflection, L/360 limit (in), Margin to the L/360 limit (in).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Span in feet, load in pounds per foot, E in psi and I in in⁴; the deflection and the L/360 limit come out in inches, and the ratio is a plain number.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need span and uniform load and modulus of elasticity and moment of inertia. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Deflection and span / deflection and l/360 limit and margin to the l/360 limit should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Span</strong> ×10</td><td>0.729</td><td>7 290</td><td>×10 000</td></tr><tr><td><strong>Uniform load</strong> ×10</td><td>0.729</td><td>7.29</td><td>ten times larger</td></tr><tr><td><strong>Modulus of elasticity</strong> ×10</td><td>0.729</td><td>0.073</td><td>ten times smaller</td></tr><tr><td><strong>Moment of inertia</strong> ×10</td><td>0.729</td><td>0.073</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Simple span, uniform load.</strong> Point loads and cantilevers differ.</li><li><strong>No creep or long-term factor.</strong> Timber sags further over time under sustained load.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a floor for springiness.</li></li><li><li>Sizing a header over a wide opening.</li></li><li><li>Seeing what a deeper section does to sag.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/wood-beam-span">Wood beam span</a> <a href="/construction/beam-load">Beam load</a> <a href="/construction/floor-joist">Floor joist</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Beam deflection calculator work out?', 'a' => <<<'TXT'
            It returns deflection and span / deflection and l/360 limit and margin to the L/360 limit from span and uniform load and modulus of elasticity and moment of inertia. The relationship is 5 × (Uniform load ÷ 12) × (Span × 12)^4 ÷ (384 × Modulus of elasticity × Moment of inertia).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Span (ft), Uniform load (lb/ft), Modulus of elasticity (psi), Moment of inertia (in⁴). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: span in ft; uniform load in lb/ft; modulus of elasticity in psi; moment of inertia in in⁴. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is the L/360 rule?', 'a' => 'A beam may sag no more than its span divided by 360 — 0.4 in on a 12 ft span.'],
            ['q' => 'How much does a beam sag under a uniform load?', 'a' => '5wL⁴/(384EI), with everything in inches: the span to the fourth power dominates.'],
        ],
        'related' => [
            ['path' => '/construction/wood-beam-span', 'name' => 'Wood beam span'],
            ['path' => '/construction/beam-load', 'name' => 'Beam load'],
            ['path' => '/construction/floor-joist', 'name' => 'Floor joist'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

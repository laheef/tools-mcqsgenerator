<?php

/**
 * K-factor
 * /construction/k-factor
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'K-factor',
    'meta' => ['title' => 'K-Factor Calculator: Bend Allowance and Deduction', 'description' => 'Work out the bend allowance, setback and bend deduction for a sheet metal bend from its angle, inside radius, thickness and K-factor. The formula is shown.', 'h1' => 'K-factor', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'angle',
                    'label' => 'Bend angle',
                    'type' => 'number',
                    'suffix' => '°',
                    'default' => '90',
                    'help' => 'Included angle of the bend',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'inside_radius',
                    'label' => 'Inside radius',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.125',
                    'help' => 'To the inside face',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'thickness',
                    'label' => 'Thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.05',
                    'help' => 'Sheet gauge thickness',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'k_factor',
                    'label' => 'K-factor',
                    'type' => 'number',
                    'default' => '0.44',
                    'help' => 'About 0.44 for air bending',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'bend_allowance',
                    'label' => 'Bend allowance',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'neutral_radius',
                    'label' => 'Neutral radius',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'setback',
                    'label' => 'Setback',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'bend_deduction',
                    'label' => 'Bend deduction',
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
            'title' => 'K-factor',
            'results' => [
                'bend_allowance' => 'angle*pi/180*(inside_radius+k_factor*thickness)',
                'neutral_radius' => 'inside_radius+k_factor*thickness',
                'setback' => '(inside_radius+thickness)*tan(angle/2*pi/180)',
                'bend_deduction' => '2*(inside_radius+thickness)*tan(angle/2*pi/180)-angle*pi/180*(inside_radius+k_factor*thickness)',
                'angle' => 'bend_allowance/(inside_radius+k_factor*thickness)*180/pi',
                'thickness' => '(bend_allowance/(angle*pi/180)-inside_radius)/k_factor',
                'k_factor' => '(bend_allowance/(angle*pi/180)-inside_radius)/thickness',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Bend allowance = θ × (R + K × t)</strong>, with θ in radians.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Sheet metal does not bend on its inside face — it stretches around a neutral line somewhere in the thickness. The K-factor says where that line sits, and without it the flat pattern is either too long or too short by the bend allowance.</p><p>The page reports <strong>bend allowance and neutral radius and setback and bend deduction</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Bend allowance</strong></td><td><code>Bend angle × pi ÷ 180 × (Inside radius+K-factor × Thickness)</code></td></tr><tr><td><strong>Neutral radius</strong></td><td><code>Inside radius+K-factor × Thickness</code></td></tr><tr><td><strong>Setback</strong></td><td><code>(Inside radius+Thickness) × tan(Bend angle ÷ 2 × pi ÷ 180)</code></td></tr><tr><td><strong>Bend deduction</strong></td><td><code>2 × (Inside radius+Thickness) × tan(Bend angle ÷ 2 × pi ÷ 180)-Bend angle × pi ÷ 180 × (Inside radius+K-factor × Thickness)</code></td></tr><tr><td><strong>Bend angle</strong></td><td><code>Bend allowance ÷ (Inside radius+K-factor × Thickness) × 180 ÷ pi</code></td></tr><tr><td><strong>Thickness</strong></td><td><code>(Bend allowance ÷ (Bend angle × pi ÷ 180)-Inside radius) ÷ K-factor</code></td></tr><tr><td><strong>K-factor</strong></td><td><code>(Bend allowance ÷ (Bend angle × pi ÷ 180)-Inside radius) ÷ Thickness</code></td></tr></tbody></table><p><p>The neutral radius is the inside radius plus the K-factor times the thickness. Multiply that by the bend angle in radians and the answer is the arc length along the neutral line — the bend allowance. The setback is the outside corner distance, and the bend deduction is twice the setback less the allowance.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports bend allowance and neutral radius and setback and bend deduction.</p><ul><li><strong>Bend angle</strong> — in °. Included angle of the bend</li><li><strong>Inside radius</strong> — in in. To the inside face</li><li><strong>Thickness</strong> — in in. Sheet gauge thickness</li><li><strong>K-factor</strong>. About 0.44 for air bending</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Bend allowance</strong> — in in</li><li><strong>Neutral radius</strong> — in in</li><li><strong>Setback</strong> — in in</li><li><strong>Bend deduction</strong> — in in</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Bend angle = 90 °, Inside radius = 0.125 in, Thickness = 0.05 in, K-factor = 0.44 — and the results panel reads:</p><ul><li><strong>Bend allowance</strong> = <code>Bend angle × pi ÷ 180 × (Inside radius+K-factor × Thickness)</code> = <strong>0.231 in</strong></li><li><strong>Neutral radius</strong> = <code>Inside radius+K-factor × Thickness</code> = <strong>0.147 in</strong></li><li><strong>Setback</strong> = <code>(Inside radius+Thickness) × tan(Bend angle ÷ 2 × pi ÷ 180)</code> = <strong>0.175 in</strong></li><li><strong>Bend deduction</strong> = <code>2 × (Inside radius+Thickness) × tan(Bend angle ÷ 2 × pi ÷ 180)-Bend angle × pi ÷ 180 × (Inside radius+K-factor × Thickness)</code> = <strong>0.119 in</strong></li></ul><p>With the numbers written into the formula, the first result is <code>90 × pi ÷ 180 × (0.125+0.44 × 0.05) = 0.231</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 90 ° bend on 0.05 in sheet with a 0.125 in radius and K-0.44 has a neutral radius of 0.147 in and a bend allowance of 0.231 in. The setback is 0.175 in and the deduction 0.119 in.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the K-factor against the process: about 0.33 for a tight bottomed bend, 0.44 for air bending, and nearer 0.5 as the radius grows. A K-factor above half means the neutral line has left the material.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Bend allowance</th><th>Neutral radius</th><th>Setback</th><th>Bend deduction</th></tr></thead><tbody><tr><td><strong>Bend angle</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+17.08 %</td><td>+30.82 %</td></tr><tr><td><strong>Inside radius</strong> +10 %</td><td>+8.5 %</td><td>+8.5 %</td><td>+7.14 %</td><td>+4.5 %</td></tr><tr><td><strong>Thickness</strong> +10 %</td><td>+1.5 %</td><td>+1.5 %</td><td>+2.86 %</td><td>+5.5 %</td></tr><tr><td><strong>K-factor</strong> +10 %</td><td>+1.5 %</td><td>+1.5 %</td><td>+0 %</td><td>−2.9 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Bend angle</strong>: a ten per cent move there shifts the result by about 30.8 per cent. The least sensitive is <strong>K-factor</strong>, at 2.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Thickness = 0.125, Inside radius = 0.25, K-factor = 0.5, the page reports <strong>Bend allowance</strong> = 0.491 in, <strong>Neutral radius</strong> = 0.312 in, <strong>Setback</strong> = 0.375 in, <strong>Bend deduction</strong> = 0.259 in. A heavy bend where the neutral line sits mid-thickness.</li><li>With Bend angle = 45, Thickness = 0.036, K-factor = 0.33, the page reports <strong>Bend allowance</strong> = 0.108 in, <strong>Neutral radius</strong> = 0.137 in, <strong>Setback</strong> = 0.067 in, <strong>Bend deduction</strong> = 0.026 in. A shallow bend in thin sheet.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Degrees used as radians.</strong> The formula needs radians.</li><li><strong>K-factor guessed.</strong> It depends on the tooling.</li><li><strong>Allowance and deduction confused.</strong> They move opposite ways.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Bend allowance (in), Neutral radius (in), Setback (in), Bend deduction (in).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Angle in degrees, radii and thickness in inches, allowance and deduction in inches.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need bend angle and inside radius and thickness and k-factor. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Bend allowance and neutral radius and setback and bend deduction should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Bend angle</strong> ×10</td><td>0.231</td><td>2.309</td><td>ten times larger</td></tr><tr><td><strong>Inside radius</strong> ×10</td><td>0.231</td><td>1.998</td><td>×8.653</td></tr><tr><td><strong>Thickness</strong> ×10</td><td>0.231</td><td>0.542</td><td>×2.347</td></tr><tr><td><strong>K-factor</strong> ×10</td><td>0.231</td><td>0.542</td><td>×2.347</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Single bend.</strong> A multi-bend part accumulates tolerance.</li><li><strong>No springback.</strong> The finished angle differs slightly.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Laying out a flat pattern.</li></li><li><li>Setting a press brake.</li></li><li><li>Checking a fabricator's blank size.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/taper">Taper</a> <a href="/construction/bending-stress">Bending stress</a> <a href="/construction/material-removal-rate">Material removal rate</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the K-factor calculator work out?', 'a' => <<<'TXT'
            It returns bend allowance and neutral radius and setback and bend deduction from bend angle and inside radius and thickness and k-factor. The relationship is Bend angle × pi ÷ 180 × (Inside radius+K-factor × Thickness).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Bend angle (°), Inside radius (in), Thickness (in), K-factor. The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: bend angle in °; inside radius in in; thickness in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is a K-factor in sheet metal?', 'a' => 'The fraction of the thickness at which the neutral bending line sits.'],
            ['q' => 'What is bend allowance?', 'a' => 'The arc length along the neutral line — the material consumed by the bend.'],
        ],
        'related' => [
            ['path' => '/construction/taper', 'name' => 'Taper'],
            ['path' => '/construction/bending-stress', 'name' => 'Bending stress'],
            ['path' => '/construction/material-removal-rate', 'name' => 'Material removal rate'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

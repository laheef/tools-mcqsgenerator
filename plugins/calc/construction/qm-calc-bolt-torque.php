<?php

/**
 * Bolt torque
 * /construction/bolt-torque
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bolt torque',
    'meta' => ['title' => 'Bolt Torque Calculator: Clamp Force and Torque', 'description' => 'Work out the torque needed to develop a clamp force in a bolt from its diameter and the nut factor, in foot-pounds and newton metres. The formula is shown.', 'h1' => 'Bolt torque', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'force',
                    'label' => 'Clamp force',
                    'type' => 'number',
                    'suffix' => 'lb',
                    'default' => '8000',
                    'help' => 'Tension wanted in the bolt',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'diameter',
                    'label' => 'Bolt diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.5',
                    'help' => 'Nominal shank',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'k_factor',
                    'label' => 'Nut factor',
                    'type' => 'number',
                    'default' => '0.2',
                    'help' => 'About 0.2 for dry steel',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'torque_ftlb',
                    'label' => 'Torque',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb·ft',
                ],
                [
                    'name' => 'torque_nm',
                    'label' => 'Torque',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'N·m',
                ],
                [
                    'name' => 'stress_psi',
                    'label' => 'Bolt stress',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'psi',
                ],
                [
                    'name' => 'torque_inlb',
                    'label' => 'Torque',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb·in',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Bolt torque',
            'results' => [
                'torque_ftlb' => 'k_factor*force*diameter/12',
                'torque_nm' => 'k_factor*force*diameter/12*1.35582',
                'stress_psi' => 'force/(3.14159/4*pow(diameter,2))',
                'torque_inlb' => 'k_factor*force*diameter',
                'force' => 'torque_ftlb*12/(k_factor*diameter)',
                'k_factor' => 'torque_ftlb*12/(force*diameter)',
                'diameter' => 'torque_ftlb*12/(k_factor*force)',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Torque = K × F × d ÷ 12</strong>, with torque in foot-pounds.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A torque wrench does not measure tension, it measures the twist that friction and thread geometry turn into tension. The nut factor is the fudge that connects the two, and it is why the same torque gives very different clamp loads on dry and lubricated threads.</p><p>The page reports <strong>torque (lb·ft) and torque (N·m) and bolt stress and torque (lb·in)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Torque (lb·ft)</strong></td><td><code>Nut factor × Clamp force × Bolt diameter ÷ 12</code></td></tr><tr><td><strong>Torque (N·m)</strong></td><td><code>Nut factor × Clamp force × Bolt diameter ÷ 12 × 1.35582</code></td></tr><tr><td><strong>Bolt stress</strong></td><td><code>Clamp force ÷ (3.14159 ÷ 4 × (Bolt diameter)^2)</code></td></tr><tr><td><strong>Torque (lb·in)</strong></td><td><code>Nut factor × Clamp force × Bolt diameter</code></td></tr><tr><td><strong>Clamp force</strong></td><td><code>Torque (lb·ft) × 12 ÷ (Nut factor × Bolt diameter)</code></td></tr><tr><td><strong>Nut factor</strong></td><td><code>Torque (lb·ft) × 12 ÷ (Clamp force × Bolt diameter)</code></td></tr><tr><td><strong>Bolt diameter</strong></td><td><code>Torque (lb·ft) × 12 ÷ (Nut factor × Clamp force)</code></td></tr></tbody></table><p><p>Torque is the nut factor times the clamp force times the bolt diameter, with the division by twelve converting inch-pounds to foot-pounds. The stress follows from the clamp force over the tensile area, which is close to the shank area for a first estimate.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports torque (lb·ft) and torque (N·m) and bolt stress and torque (lb·in).</p><ul><li><strong>Clamp force</strong> — in lb. Tension wanted in the bolt</li><li><strong>Bolt diameter</strong> — in in. Nominal shank</li><li><strong>Nut factor</strong>. About 0.2 for dry steel</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Torque</strong> — in lb·ft</li><li><strong>Torque</strong> — in N·m</li><li><strong>Bolt stress</strong> — in psi</li><li><strong>Torque</strong> — in lb·in</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Clamp force = 8 000 lb, Bolt diameter = 0.5 in, Nut factor = 0.2 — and the results panel reads:</p><ul><li><strong>Torque</strong> = <code>Nut factor × Clamp force × Bolt diameter ÷ 12</code> = <strong>66.667 lb·ft</strong></li><li><strong>Torque</strong> = <code>Nut factor × Clamp force × Bolt diameter ÷ 12 × 1.35582</code> = <strong>90.388 N·m</strong></li><li><strong>Bolt stress</strong> = <code>Clamp force ÷ (3.14159 ÷ 4 × (Bolt diameter)^2)</code> = <strong>40 743.7 psi</strong></li><li><strong>Torque</strong> = <code>Nut factor × Clamp force × Bolt diameter</code> = <strong>800 lb·in</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.2 × 8 000 × 0.5 ÷ 12 = 66.667</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 0.5 in bolt pulled to 8 000 lb at a nut factor of 0.2 takes 66.667 lb·ft, or 90.388 N·m, and carries 40 743.7 psi.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the stress against the bolt's proof load: a grade 5 half-inch bolt is good for about eighty five thousand psi, a grade 8 nearer a hundred and twenty. If the stress is above the proof load the bolt will yield before the torque is reached.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Torque</th><th>Torque</th><th>Bolt stress</th><th>Torque</th></tr></thead><tbody><tr><td><strong>Clamp force</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Bolt diameter</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>−17.36 %</td><td>+10 %</td></tr><tr><td><strong>Nut factor</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Bolt diameter</strong>: a ten per cent move there shifts the result by about 17.4 per cent. The least sensitive is <strong>Clamp force</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Bolt diameter = 0.75, Clamp force = 20 000, the page reports <strong>Torque</strong> = 250 lb·ft, <strong>Torque</strong> = 338.955 N·m, <strong>Bolt stress</strong> = 45 270.778 psi, <strong>Torque</strong> = 3 000 lb·in. A heavier bolt at a higher clamp force.</li><li>With Nut factor = 0.16, Clamp force = 8 000, the page reports <strong>Torque</strong> = 53.333 lb·ft, <strong>Torque</strong> = 72.31 N·m, <strong>Bolt stress</strong> = 40 743.7 psi, <strong>Torque</strong> = 640 lb·in. A lubricated thread: less torque for the same tension.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Torque taken as tension.</strong> It is a proxy at best.</li><li><strong>Dry and lubricated mixed.</strong> The nut factor differs by a third.</li><li><strong>Reusing a torque value across diameters.</strong> Torque scales with diameter.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Torque (lb·ft), Torque (N·m), Bolt stress (psi), Torque (lb·in).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Force in pounds, diameter in inches, torque in foot-pounds and newton metres, stress in psi.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need clamp force and bolt diameter and nut factor. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Torque (lb·ft) and torque (n·m) and bolt stress and torque (lb·in) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Clamp force</strong> ×10</td><td>66.667</td><td>666.667</td><td>ten times larger</td></tr><tr><td><strong>Bolt diameter</strong> ×10</td><td>66.667</td><td>666.667</td><td>ten times larger</td></tr><tr><td><strong>Nut factor</strong> ×10</td><td>66.667</td><td>666.667</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Elastic clamping.</strong> Yielding and embedment change the tension.</li><li><strong>Static only.</strong> Vibration needs a locking method.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Setting a torque wrench.</li></li><li><li>Checking a bolted joint.</li></li><li><li>Comparing lubricated assemblies.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/bolt-circle">Bolt circle</a> <a href="/construction/clearance-hole">Clearance hole</a> <a href="/construction/bending-stress">Bending stress</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bolt torque calculator work out?', 'a' => <<<'TXT'
            It returns torque (lb·ft) and torque (N·m) and bolt stress and torque (lb·in) from clamp force and bolt diameter and nut factor. The relationship is Nut factor × Clamp force × Bolt diameter ÷ 12.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Clamp force (lb), Bolt diameter (in), Nut factor. The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: clamp force in lb; bolt diameter in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is a nut factor?', 'a' => 'A dimensionless factor near 0.2 that links applied torque to bolt tension for dry steel threads.'],
            ['q' => 'Does grease change the torque?', 'a' => 'Yes — a lubricated thread needs less torque for the same tension.'],
        ],
        'related' => [
            ['path' => '/construction/bolt-circle', 'name' => 'Bolt circle'],
            ['path' => '/construction/clearance-hole', 'name' => 'Clearance hole'],
            ['path' => '/construction/bending-stress', 'name' => 'Bending stress'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

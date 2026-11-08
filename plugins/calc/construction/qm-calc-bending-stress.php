<?php

/**
 * Bending stress
 * /construction/bending-stress
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bending stress',
    'meta' => ['title' => 'Bending Stress Calculator: Moment, Section and Stress', 'description' => 'Work out the bending stress in a beam from its moment, the distance to the extreme fibre and its second moment of area, in psi and MPa. See the steps.', 'h1' => 'Bending stress', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'moment',
                    'label' => 'Bending moment',
                    'type' => 'number',
                    'suffix' => 'lb·in',
                    'default' => '12000',
                    'help' => 'At the section',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'c',
                    'label' => 'Distance to fibre',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '2',
                    'help' => 'Half the depth for a rectangle',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'inertia',
                    'label' => 'Second moment',
                    'type' => 'number',
                    'suffix' => 'in⁴',
                    'default' => '10',
                    'help' => 'Of the section',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'stress',
                    'label' => 'Bending stress',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'psi',
                ],
                [
                    'name' => 'stress_mpa',
                    'label' => 'Bending stress',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'MPa',
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
                    'name' => 'stress_ksi',
                    'label' => 'Bending stress',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ksi',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Bending stress',
            'results' => [
                'stress' => 'moment*c/inertia',
                'stress_mpa' => 'moment*c/inertia*0.00689476',
                'section_modulus' => 'inertia/c',
                'stress_ksi' => 'moment*c/inertia/1000',
                'moment' => 'stress*inertia/c',
                'c' => 'stress*inertia/moment',
                'inertia' => 'moment*c/stress',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Stress = M × c ÷ I</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Every beam carries a moment, and the stress that moment produces is what decides whether the section is adequate. The same moment is far more damaging on a shallow section than a deep one, because the stress depends on how far the extreme fibre sits from the neutral axis.</p><p>The page reports <strong>bending stress (psi) and bending stress (MPa) and section modulus and bending stress (ksi)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Bending stress (psi)</strong></td><td><code>Bending moment × Distance to fibre ÷ Second moment</code></td></tr><tr><td><strong>Bending stress (MPa)</strong></td><td><code>Bending moment × Distance to fibre ÷ Second moment × 0.00689476</code></td></tr><tr><td><strong>Section modulus</strong></td><td><code>Second moment ÷ Distance to fibre</code></td></tr><tr><td><strong>Bending stress (ksi)</strong></td><td><code>Bending moment × Distance to fibre ÷ Second moment ÷ 1000</code></td></tr><tr><td><strong>Bending moment</strong></td><td><code>Bending stress (psi) × Second moment ÷ Distance to fibre</code></td></tr><tr><td><strong>Distance to fibre</strong></td><td><code>Bending stress (psi) × Second moment ÷ Bending moment</code></td></tr><tr><td><strong>Second moment</strong></td><td><code>Bending moment × Distance to fibre ÷ Bending stress (psi)</code></td></tr></tbody></table><p><p>The moment divided by the section modulus gives the stress, and the section modulus is the second moment of area divided by the distance to the extreme fibre. For a rectangle that distance is half the depth, so a beam twice as deep carries four times the moment for the same stress.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports bending stress (psi) and bending stress (MPa) and section modulus and bending stress (ksi).</p><ul><li><strong>Bending moment</strong> — in lb·in. At the section</li><li><strong>Distance to fibre</strong> — in in. Half the depth for a rectangle</li><li><strong>Second moment</strong> — in in⁴. Of the section</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Bending stress</strong> — in psi</li><li><strong>Bending stress</strong> — in MPa</li><li><strong>Section modulus</strong> — in in³</li><li><strong>Bending stress</strong> — in ksi</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Bending moment = 12 000 lb·in, Distance to fibre = 2 in, Second moment = 10 in⁴ — and the results panel reads:</p><ul><li><strong>Bending stress</strong> = <code>Bending moment × Distance to fibre ÷ Second moment</code> = <strong>2 400 psi</strong></li><li><strong>Bending stress</strong> = <code>Bending moment × Distance to fibre ÷ Second moment × 0.00689476</code> = <strong>16.547 MPa</strong></li><li><strong>Section modulus</strong> = <code>Second moment ÷ Distance to fibre</code> = <strong>5 in³</strong></li><li><strong>Bending stress</strong> = <code>Bending moment × Distance to fibre ÷ Second moment ÷ 1000</code> = <strong>2.4 ksi</strong></li></ul><p>With the numbers written into the formula, the first result is <code>12 000 × 2 ÷ 10 = 2 400</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 12 000 lb·in moment on a section with a 2 in extreme fibre and an inertia of 10 in⁴ develops 2 400 psi — 16.547 MPa — with a section modulus of 5 in³.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the stress against the allowable for the material: mild steel is usually run under twenty thousand psi, timber under fifteen hundred. Anything near double that means the section is too shallow.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Bending stress</th><th>Bending stress</th><th>Section modulus</th><th>Bending stress</th></tr></thead><tbody><tr><td><strong>Bending moment</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Distance to fibre</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Second moment</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+10 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Bending moment</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Second moment</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Bending moment = 24 000, Distance to fibre = 4, Second moment = 40, the page reports <strong>Bending stress</strong> = 2 400 psi, <strong>Bending stress</strong> = 16.547 MPa, <strong>Section modulus</strong> = 10 in³, <strong>Bending stress</strong> = 2.4 ksi. A deeper beam carrying twice the moment: the same stress.</li><li>With Bending moment = 8 000, Distance to fibre = 1.5, Second moment = 3, the page reports <strong>Bending stress</strong> = 4 000 psi, <strong>Bending stress</strong> = 27.579 MPa, <strong>Section modulus</strong> = 2 in³, <strong>Bending stress</strong> = 4 ksi. A small section under a small moment.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Inertia about the wrong axis.</strong> Bending happens about one axis.</li><li><strong>c taken as the full depth.</strong> It is half for a symmetric section.</li><li><strong>Units mixed.</strong> lb·in with in and in⁴ gives psi.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Bending stress (psi), Bending stress (MPa), Section modulus (in³), Bending stress (ksi).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Moment in pound-inches, distances in inches, inertia in inches to the fourth, stress in psi, ksi and MPa.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need bending moment and distance to fibre and second moment. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Bending stress (psi) and bending stress (mpa) and section modulus and bending stress (ksi) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Bending moment</strong> ×10</td><td>2 400</td><td>24 000</td><td>ten times larger</td></tr><tr><td><strong>Distance to fibre</strong> ×10</td><td>2 400</td><td>24 000</td><td>ten times larger</td></tr><tr><td><strong>Second moment</strong> ×10</td><td>2 400</td><td>240</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Elastic range only.</strong> Yielding changes the distribution.</li><li><strong>No shear or buckling.</strong> Those are separate checks.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a beam section.</li></li><li><li>Comparing timber with steel.</li></li><li><li>Teaching the section modulus.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/wood-beam-span">Wood beam span</a> <a href="/construction/beam-load">Beam load</a> <a href="/construction/steel-weight">Steel weight</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bending stress calculator work out?', 'a' => <<<'TXT'
            It returns bending stress (psi) and bending stress (MPa) and section modulus and bending stress (ksi) from bending moment and distance to fibre and second moment. The relationship is Bending moment × Distance to fibre ÷ Second moment.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Bending moment (lb·in), Distance to fibre (in), Second moment (in⁴). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: bending moment in lb·in; distance to fibre in in; second moment in in⁴. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is the bending stress formula?', 'a' => 'Moment times the distance to the extreme fibre, divided by the second moment of area.'],
            ['q' => 'What is the section modulus?', 'a' => 'The inertia divided by the distance to the extreme fibre — the same calculation rearranged.'],
        ],
        'related' => [
            ['path' => '/construction/wood-beam-span', 'name' => 'Wood beam span'],
            ['path' => '/construction/beam-load', 'name' => 'Beam load'],
            ['path' => '/construction/steel-weight', 'name' => 'Steel weight'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

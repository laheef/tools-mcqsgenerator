<?php

/**
 * Punch force
 * /construction/punch-force
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Punch force',
    'meta' => ['title' => 'Punch Force Calculator: Tonnage for a Round Hole', 'description' => 'Work out the force a punch needs to shear a round hole through plate, in pounds, tons and kilonewtons, from the diameter and shear strength. Units shown.', 'h1' => 'Punch force', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'diameter',
                    'label' => 'Hole diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.5',
                    'help' => 'Round punch',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'thickness',
                    'label' => 'Plate thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.125',
                    'help' => 'Material being punched',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'shear_strength',
                    'label' => 'Shear strength',
                    'type' => 'number',
                    'suffix' => 'psi',
                    'default' => '50000',
                    'help' => 'About 80 % of tensile',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'force_lb',
                    'label' => 'Punch force',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'force_tons',
                    'label' => 'Punch force',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ton',
                ],
                [
                    'name' => 'force_kn',
                    'label' => 'Punch force',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kN',
                ],
                [
                    'name' => 'shear_area',
                    'label' => 'Shear area',
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
            'title' => 'Punch force',
            'results' => [
                'force_lb' => 'pi*diameter*thickness*shear_strength',
                'force_tons' => 'pi*diameter*thickness*shear_strength/2000',
                'force_kn' => 'pi*diameter*thickness*shear_strength*0.00444822',
                'shear_area' => 'pi*diameter*thickness',
                'diameter' => 'force_lb/(pi*thickness*shear_strength)',
                'thickness' => 'force_lb/(pi*diameter*shear_strength)',
                'shear_strength' => 'force_lb/(pi*diameter*thickness)',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Force = π × diameter × thickness × shear strength</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A punch does not cut metal, it shears it, and the force needed is the area of the sheared surface times the shear strength. That area is the circumference of the hole times the thickness — which is why a small increase in diameter or thickness demands a disproportionately larger press.</p><p>The page reports <strong>punch force (lb) and punch force (ton) and punch force (kN) and shear area</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Punch force (lb)</strong></td><td><code>pi × Hole diameter × Plate thickness × Shear strength</code></td></tr><tr><td><strong>Punch force (ton)</strong></td><td><code>pi × Hole diameter × Plate thickness × Shear strength ÷ 2000</code></td></tr><tr><td><strong>Punch force (kN)</strong></td><td><code>pi × Hole diameter × Plate thickness × Shear strength × 0.00444822</code></td></tr><tr><td><strong>Shear area</strong></td><td><code>pi × Hole diameter × Plate thickness</code></td></tr><tr><td><strong>Hole diameter</strong></td><td><code>Punch force (lb) ÷ (pi × Plate thickness × Shear strength)</code></td></tr><tr><td><strong>Plate thickness</strong></td><td><code>Punch force (lb) ÷ (pi × Hole diameter × Shear strength)</code></td></tr><tr><td><strong>Shear strength</strong></td><td><code>Punch force (lb) ÷ (pi × Hole diameter × Plate thickness)</code></td></tr></tbody></table><p><p>The circumference is pi times the diameter, the sheared band is that circumference times the thickness, and the force is the band times the shear strength of the material. Divide by two thousand for short tons, or multiply by 0.004 448 for kilonewtons.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports punch force (lb) and punch force (ton) and punch force (kN) and shear area.</p><ul><li><strong>Hole diameter</strong> — in in. Round punch</li><li><strong>Plate thickness</strong> — in in. Material being punched</li><li><strong>Shear strength</strong> — in psi. About 80 % of tensile</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Punch force</strong> — in lb</li><li><strong>Punch force</strong> — in ton</li><li><strong>Punch force</strong> — in kN</li><li><strong>Shear area</strong> — in in²</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Hole diameter = 0.5 in, Plate thickness = 0.125 in, Shear strength = 50 000 psi — and the results panel reads:</p><ul><li><strong>Punch force</strong> = <code>pi × Hole diameter × Plate thickness × Shear strength</code> = <strong>9 817.477 lb</strong></li><li><strong>Punch force</strong> = <code>pi × Hole diameter × Plate thickness × Shear strength ÷ 2000</code> = <strong>4.909 ton</strong></li><li><strong>Punch force</strong> = <code>pi × Hole diameter × Plate thickness × Shear strength × 0.00444822</code> = <strong>43.67 kN</strong></li><li><strong>Shear area</strong> = <code>pi × Hole diameter × Plate thickness</code> = <strong>0.196 in²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>pi × 0.5 × 0.125 × 50 000 = 9 817.477</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 0.5 in hole through 0.125 in plate at 50 000 psi shears 0.196 in² of material and needs 9 817.477 lb — 4.909 tons, or 43.67 kN.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the tonnage against the press: a punch that needs more than about eighty per cent of the press rating will stall or snap the punch. The usual answer is a smaller diameter and a second pass.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Punch force</th><th>Punch force</th><th>Punch force</th><th>Shear area</th></tr></thead><tbody><tr><td><strong>Hole diameter</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Plate thickness</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Shear strength</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Hole diameter</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Shear strength</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Hole diameter = 1, Plate thickness = 0.25, the page reports <strong>Punch force</strong> = 39 269.908 lb, <strong>Punch force</strong> = 19.635 ton, <strong>Punch force</strong> = 174.681 kN, <strong>Shear area</strong> = 0.785 in². A one inch hole in quarter plate: four times the force.</li><li>With Hole diameter = 0.25, Plate thickness = 0.048, Shear strength = 30 000, the page reports <strong>Punch force</strong> = 1 130.973 lb, <strong>Punch force</strong> = 0.565 ton, <strong>Punch force</strong> = 5.031 kN, <strong>Shear area</strong> = 0.038 in². Thin aluminium: a bench press handles it.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Tensile strength used.</strong> Shear is about eighty per cent of it.</li><li><strong>Thickness in gauge numbers.</strong> Convert to inches.</li><li><strong>Clearance ignored.</strong> A tight die raises the force and wears the punch.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Punch force (lb), Punch force (ton), Punch force (kN), Shear area (in²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Diameter and thickness in inches, strength in psi, force in pounds, tons and kilonewtons.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need hole diameter and plate thickness and shear strength. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Punch force (lb) and punch force (ton) and punch force (kn) and shear area should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Hole diameter</strong> ×10</td><td>9 817.477</td><td>98 174.77</td><td>ten times larger</td></tr><tr><td><strong>Plate thickness</strong> ×10</td><td>9 817.477</td><td>98 174.77</td><td>ten times larger</td></tr><tr><td><strong>Shear strength</strong> ×10</td><td>9 817.477</td><td>98 174.77</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Sharp punch and die.</strong> Wear increases the force.</li><li><strong>Single hit.</strong> Stripping and slug ejection add load.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a press is big enough.</li></li><li><li>Comparing materials for a punched part.</li></li><li><li>Teaching the shear-area method.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/material-removal-rate">Material removal rate</a> <a href="/construction/rivet-size">Rivet size</a> <a href="/construction/bending-stress">Bending stress</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Punch force calculator work out?', 'a' => <<<'TXT'
            It returns punch force (lb) and punch force (ton) and punch force (kN) and shear area from hole diameter and plate thickness and shear strength. The relationship is pi × Hole diameter × Plate thickness × Shear strength.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Hole diameter (in), Plate thickness (in), Shear strength (psi). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: hole diameter in in; plate thickness in in; shear strength in psi. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I calculate punch tonnage?', 'a' => 'Circumference times thickness times shear strength, divided by two thousand.'],
            ['q' => 'What shear strength should I use?', 'a' => 'About eighty per cent of the tensile strength of the material.'],
        ],
        'related' => [
            ['path' => '/construction/material-removal-rate', 'name' => 'Material removal rate'],
            ['path' => '/construction/rivet-size', 'name' => 'Rivet size'],
            ['path' => '/construction/bending-stress', 'name' => 'Bending stress'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

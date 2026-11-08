<?php

/**
 * Ionic Strength Calculator
 * /chemistry/ionic-strength
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Ionic Strength Calculator',
    'meta' => ['title' => 'Ionic Strength Calculator: Three Ions at a Time', 'description' => 'Add up each dissolved ion\'s concentration weighted by the square of its charge to get the ionic strength that activity corrections and pH both depend on.', 'h1' => 'Ionic Strength Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'conc_1',
                    'label' => 'Concentration of ion 1',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.1',
                    'help' => 'Sodium, in a 0.1 M NaCl solution',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'charge_1',
                    'label' => 'Charge of ion 1',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Magnitude only',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'conc_2',
                    'label' => 'Concentration of ion 2',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.1',
                    'help' => 'Chloride',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'charge_2',
                    'label' => 'Charge of ion 2',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Magnitude only',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'conc_3',
                    'label' => 'Concentration of ion 3',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0',
                    'help' => 'Leave at zero for a two-ion salt',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'charge_3',
                    'label' => 'Charge of ion 3',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Magnitude only',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'ionic_strength',
                    'label' => 'Ionic strength',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol/L',
                ],
                [
                    'name' => 'contribution_1',
                    'label' => 'Contribution of the first ion',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol/L',
                ],
                [
                    'name' => 'contribution_2',
                    'label' => 'Contribution of the second ion',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol/L',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Ionic Strength',
            'results' => [
                'ionic_strength' => '0.5*(conc_1*pow(charge_1,2)+conc_2*pow(charge_2,2)+conc_3*pow(charge_3,2))',
                'contribution_1' => '0.5*conc_1*pow(charge_1,2)',
                'contribution_2' => '0.5*conc_2*pow(charge_2,2)',
                'conc_1' => '(2*ionic_strength-conc_2*pow(charge_2,2)-conc_3*pow(charge_3,2))/pow(charge_1,2)',
                'conc_2' => '(2*ionic_strength-conc_1*pow(charge_1,2)-conc_3*pow(charge_3,2))/pow(charge_2,2)',
                'conc_3' => '(2*ionic_strength-conc_1*pow(charge_1,2)-conc_2*pow(charge_2,2))/pow(charge_3,2)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Ionic strength counts not just how much salt is dissolved but how strongly each ion interacts electrostatically: <strong>I = ½ Σ c·z²</strong>. A divalent ion counts four times as much as a monovalent one at the same concentration.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Every activity coefficient, every pH measured in salt water and every equilibrium constant quoted in a buffer depends on ionic strength rather than on concentration. It is the single variable that says how far a solution is from ideal.</p><p>The page reports <strong>ionic strength and contribution of the first ion and contribution of the second ion</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Ionic strength</strong></td><td><code>0.5 × (Concentration of ion 1 × (Charge of ion 1)^2+Concentration of ion 2 × (Charge of ion 2)^2+Concentration of ion 3 × (Charge of ion 3)^2)</code></td></tr><tr><td><strong>Contribution of the first ion</strong></td><td><code>0.5 × Concentration of ion 1 × (Charge of ion 1)^2</code></td></tr><tr><td><strong>Contribution of the second ion</strong></td><td><code>0.5 × Concentration of ion 2 × (Charge of ion 2)^2</code></td></tr><tr><td><strong>Concentration of ion 1</strong></td><td><code>(2 × Ionic strength-Concentration of ion 2 × (Charge of ion 2)^2-Concentration of ion 3 × (Charge of ion 3)^2) ÷ (Charge of ion 1)^2</code></td></tr><tr><td><strong>Concentration of ion 2</strong></td><td><code>(2 × Ionic strength-Concentration of ion 1 × (Charge of ion 1)^2-Concentration of ion 3 × (Charge of ion 3)^2) ÷ (Charge of ion 2)^2</code></td></tr><tr><td><strong>Concentration of ion 3</strong></td><td><code>(2 × Ionic strength-Concentration of ion 1 × (Charge of ion 1)^2-Concentration of ion 2 × (Charge of ion 2)^2) ÷ (Charge of ion 3)^2</code></td></tr></tbody></table><p><p>The half is there because the sum counts both signs and each ion pair shares the effect. The charge is squared, which is why a 0.1 M solution of sodium sulfate has three times the ionic strength of 0.1 M sodium chloride.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports ionic strength and contribution of the first ion and contribution of the second ion.</p><ul><li><strong>Concentration of ion 1</strong> — in mol/L. Sodium, in a 0.1 M NaCl solution</li><li><strong>Charge of ion 1</strong>. Magnitude only</li><li><strong>Concentration of ion 2</strong> — in mol/L. Chloride</li><li><strong>Charge of ion 2</strong>. Magnitude only</li><li><strong>Concentration of ion 3</strong> — in mol/L. Leave at zero for a two-ion salt</li><li><strong>Charge of ion 3</strong>. Magnitude only</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Ionic strength</strong> — in mol/L</li><li><strong>Contribution of the first ion</strong> — in mol/L</li><li><strong>Contribution of the second ion</strong> — in mol/L</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Concentration of ion 1 = 0.1 mol/L, Charge of ion 1 = 1, Concentration of ion 2 = 0.1 mol/L, Charge of ion 2 = 1, Concentration of ion 3 = 0 mol/L, Charge of ion 3 = 1 — and the results panel reads:</p><ul><li><strong>Ionic strength</strong> = <code>0.5 × (Concentration of ion 1 × (Charge of ion 1)^2+Concentration of ion 2 × (Charge of ion 2)^2+Concentration of ion 3 × (Charge of ion 3)^2)</code> = <strong>0.1 mol/L</strong></li><li><strong>Contribution of the first ion</strong> = <code>0.5 × Concentration of ion 1 × (Charge of ion 1)^2</code> = <strong>0.05 mol/L</strong></li><li><strong>Contribution of the second ion</strong> = <code>0.5 × Concentration of ion 2 × (Charge of ion 2)^2</code> = <strong>0.05 mol/L</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.5 × (0.1 × pow(1,2)+0.1 × pow(1,2)+0 × pow(1,2)) = 0.1</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>0.1 M sodium chloride: each ion contributes 0.05, and the total ionic strength is 0.1 mol/L. Calcium chloride at the same molarity gives ½(0.1 × 4 + 0.2 × 1) = 0.3 mol/L — three times as much, because the calcium is divalent.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Below 0.01 mol/L the Debye–Hückel limiting law holds. Between 0.01 and 0.1 extended forms are needed, and above 0.5 — seawater, brine — activity coefficients have to be measured rather than calculated.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Ionic strength</th><th>Contribution of the first ion</th><th>Contribution of the second ion</th></tr></thead><tbody><tr><td><strong>Concentration of ion 1</strong> +10 %</td><td>+5 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Charge of ion 1</strong> +10 %</td><td>+10.5 %</td><td>+21 %</td><td>+0 %</td></tr><tr><td><strong>Concentration of ion 2</strong> +10 %</td><td>+5 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Charge of ion 2</strong> +10 %</td><td>+10.5 %</td><td>+0 %</td><td>+21 %</td></tr><tr><td><strong>Concentration of ion 3</strong> +10 %</td><td>+50 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Charge of ion 3</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Concentration of ion 3</strong>: a ten per cent move there shifts the result by about 50 per cent. The least sensitive is <strong>Charge of ion 3</strong>, at 0 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Concentration of ion 1 = 0.1, Charge of ion 1 = 2, Concentration of ion 2 = 0.2, Charge of ion 2 = 1, Concentration of ion 3 = 0, Charge of ion 3 = 1, the page reports <strong>Ionic strength</strong> = 0.3 mol/L, <strong>Contribution of the first ion</strong> = 0.2 mol/L, <strong>Contribution of the second ion</strong> = 0.1 mol/L. Calcium chloride: 0.1 mol/L of the 2+ ion and 0.2 of the 1− gives I = 0.3.</li><li>With Concentration of ion 1 = 0.05, Charge of ion 1 = 2, Concentration of ion 2 = 0.05, Charge of ion 2 = 2, Concentration of ion 3 = 0, Charge of ion 3 = 1, the page reports <strong>Ionic strength</strong> = 0.2 mol/L, <strong>Contribution of the first ion</strong> = 0.1 mol/L, <strong>Contribution of the second ion</strong> = 0.1 mol/L. Magnesium sulfate at 0.05 M: I = 0.2, four times its molarity because both ions are divalent.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Charge signs included.</strong> The square removes the sign; entering −1 for an anion gives the same contribution as +1, which is correct, but summing signed charges first is not.</li><li><strong>Molarity used as ionic strength.</strong> They are equal only for a 1:1 salt at any concentration.</li><li><strong>Water's own ions ignored.</strong> They matter only below about 10⁻⁶ mol/L, but that is exactly where ultra-pure water chemistry lives.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Ionic strength (mol/L), Contribution of the first ion (mol/L), Contribution of the second ion (mol/L).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Concentrations in moles per litre and charges as magnitudes give an ionic strength in moles per litre, which is dimensionless in the Debye–Hückel expressions because it appears inside a square root against a constant.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need concentration of ion 1 and charge of ion 1 and concentration of ion 2 and charge of ion 2 and concentration of ion 3 and charge of ion 3. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Ionic strength and contribution of the first ion and contribution of the second ion should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Concentration of ion 1</strong> ×10</td><td>0.1</td><td>0.55</td><td>×5.5</td></tr><tr><td><strong>Charge of ion 1</strong> ×10</td><td>0.1</td><td>5.05</td><td>×50.5</td></tr><tr><td><strong>Concentration of ion 2</strong> ×10</td><td>0.1</td><td>0.55</td><td>×5.5</td></tr><tr><td><strong>Charge of ion 2</strong> ×10</td><td>0.1</td><td>5.05</td><td>×50.5</td></tr><tr><td><strong>Concentration of ion 3</strong> ×10</td><td>0.1</td><td>0.6</td><td>×6</td></tr><tr><td><strong>Charge of ion 3</strong> ×10</td><td>0.1</td><td>0.1</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Three ions at a time.</strong> A full water analysis has ten or more; group them or use the summation directly.</li><li><strong>It says nothing about ion pairing.</strong> At high concentration, paired ions behave as uncharged species and the effective ionic strength is lower.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Supplying the ionic strength an activity coefficient needs.</li></li><li><li>Comparing buffers of the same molarity but different salts.</li></li><li><li>Estimating how far a solution deviates from ideal behaviour.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/activity-coefficient">Activity coefficient</a> <a href="/chemistry/molarity">Molarity</a> <a href="/chemistry/tds">TDS</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Ionic Strength calculator work out?', 'a' => <<<'TXT'
            It returns ionic strength and contribution of the first ion and contribution of the second ion from concentration of ion 1 and charge of ion 1 and concentration of ion 2 and charge of ion 2 and concentration of ion 3 and charge of ion 3. The relationship is 0.5 × (Concentration of ion 1 × (Charge of ion 1)^2+Concentration of ion 2 × (Charge of ion 2)^2+Concentration of ion 3 × (Charge of ion 3)^2).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Concentration of ion 1 (mol/L), Charge of ion 1, Concentration of ion 2 (mol/L), Charge of ion 2, Concentration of ion 3 (mol/L), Charge of ion 3. The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: concentration of ion 1 in mol/L; concentration of ion 2 in mol/L; concentration of ion 3 in mol/L. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is ionic strength not just total concentration?', 'a' => 'Because charge matters more than count. A divalent ion interacts four times as strongly as a monovalent one, and the square captures that.'],
            ['q' => 'What is the ionic strength of seawater?', 'a' => 'About 0.7 mol/L. That is well beyond the range where any simple theory works, which is why seawater chemistry uses measured activity coefficients.'],
        ],
        'related' => [
            ['path' => '/chemistry/activity-coefficient', 'name' => 'Activity coefficient'],
            ['path' => '/chemistry/molarity', 'name' => 'Molarity'],
            ['path' => '/chemistry/tds', 'name' => 'TDS'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

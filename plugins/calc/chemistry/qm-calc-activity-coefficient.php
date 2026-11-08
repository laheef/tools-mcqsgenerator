<?php

/**
 * Activity Coefficient Calculator
 * /chemistry/activity-coefficient
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Activity Coefficient Calculator',
    'meta' => ['title' => 'Activity Coefficient Calculator: Debye-Hückel', 'description' => 'Use the Debye-Hückel limiting law to turn an ionic strength and an ion\'s charge into an activity coefficient, which is how far a solution is from ideal.', 'h1' => 'Activity Coefficient Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'ionic_strength',
                    'label' => 'Ionic strength',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.01',
                    'help' => 'Half the sum of every concentration times its charge squared',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'charge',
                    'label' => 'Charge of the ion',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Magnitude only: 1 for Na⁺, 2 for Ca²⁺',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'constant_a',
                    'label' => 'Debye-Hückel constant A',
                    'type' => 'number',
                    'default' => '0.509',
                    'help' => '0.509 for water at 25 °C; 0.51 at 20 °C',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'activity_coefficient',
                    'label' => 'Activity coefficient γ',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'log_gamma',
                    'label' => 'log₁₀ γ',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'shortfall',
                    'label' => 'Activity below concentration',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Activity Coefficient',
            'results' => [
                'log_gamma' => '-constant_a*pow(charge,2)*sqrt(ionic_strength)',
                'activity_coefficient' => 'pow(10,-constant_a*pow(charge,2)*sqrt(ionic_strength))',
                'shortfall' => '(1-pow(10,-constant_a*pow(charge,2)*sqrt(ionic_strength)))*100',
                'ionic_strength' => 'pow(log_gamma/(constant_a*pow(charge,2)),2)',
                'charge' => 'sqrt(-log_gamma/(constant_a*sqrt(ionic_strength)))',
                'constant_a' => '-log_gamma/(pow(charge,2)*sqrt(ionic_strength))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>In a real solution, concentration is not what the ion experiences: <strong>log₁₀γ = −A·z²·√I</strong>, with A near 0.509 for water at 25 °C. The page reports γ, its logarithm and the percentage by which the ion's activity falls short of its concentration.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Equilibrium constants, pH measurements and electrode potentials are all defined on activities, and activity is concentration times γ. In dilute solution the two are almost the same; in seawater or a physiological buffer they are not.</p><p>The page reports <strong>activity coefficient γ and log₁₀ γ and activity below concentration</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>log₁₀ γ</strong></td><td><code>-Debye-Hückel constant A × (Charge of the ion)^2 × √(Ionic strength)</code></td></tr><tr><td><strong>Activity coefficient γ</strong></td><td><code>pow(10,-Debye-Hückel constant A × (Charge of the ion)^2 × √(Ionic strength))</code></td></tr><tr><td><strong>Activity below concentration</strong></td><td><code>(1-pow(10,-Debye-Hückel constant A × (Charge of the ion)^2 × √(Ionic strength))) × 100</code></td></tr><tr><td><strong>Ionic strength</strong></td><td><code>pow(log₁₀ γ ÷ (Debye-Hückel constant A × (Charge of the ion)^2),2)</code></td></tr><tr><td><strong>Charge of the ion</strong></td><td><code>√(-log₁₀ γ ÷ (Debye-Hückel constant A × √(Ionic strength)))</code></td></tr><tr><td><strong>Debye-Hückel constant A</strong></td><td><code>-log₁₀ γ ÷ ((Charge of the ion)^2 × √(Ionic strength))</code></td></tr></tbody></table><p><p>The law is logarithmic because the effect is electrostatic: an ion is surrounded by an atmosphere of opposite charge that grows with √I. The charge appears squared, so a 2+ ion is affected four times as strongly as a 1+ ion at the same ionic strength.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports activity coefficient γ and log₁₀ γ and activity below concentration.</p><ul><li><strong>Ionic strength</strong> — in mol/L. Half the sum of every concentration times its charge squared</li><li><strong>Charge of the ion</strong>. Magnitude only: 1 for Na⁺, 2 for Ca²⁺</li><li><strong>Debye-Hückel constant A</strong>. 0.509 for water at 25 °C; 0.51 at 20 °C</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Activity coefficient γ</strong></li><li><strong>log₁₀ γ</strong></li><li><strong>Activity below concentration</strong> — in %</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Ionic strength = 0.01 mol/L, Charge of the ion = 1, Debye-Hückel constant A = 0.509 — and the results panel reads:</p><ul><li><strong>Activity coefficient γ</strong> = <code>pow(10,-Debye-Hückel constant A × (Charge of the ion)^2 × √(Ionic strength))</code> = <strong>0.889</strong></li><li><strong>log₁₀ γ</strong> = <code>-Debye-Hückel constant A × (Charge of the ion)^2 × √(Ionic strength)</code> = <strong>-0.051</strong></li><li><strong>Activity below concentration</strong> = <code>(1-pow(10,-Debye-Hückel constant A × (Charge of the ion)^2 × √(Ionic strength))) × 100</code> = <strong>11.059 %</strong></li></ul><p>With the numbers written into the formula, the first result is <code>pow(10,-0.509 × pow(1,2) × sqrt(0.01)) = 0.889</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>I = 0.01 mol/L and z = 1: log₁₀γ = −0.509 × 0.1 = −0.0509, so γ = 0.889. The ion's activity is 88.9 per cent of its concentration — an 11 per cent correction in a solution that most people would call dilute.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>γ falls as ionic strength rises, reaching about 0.69 at I = 0.1 for a 1:1 electrolyte. The limiting law works below about 0.01 mol/L; beyond that, extended forms with an ion-size term are needed.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Activity coefficient γ</th><th>log₁₀ γ</th><th>Activity below concentration</th></tr></thead><tbody><tr><td><strong>Ionic strength</strong> +10 %</td><td>−0.57 %</td><td>−4.88 %</td><td>+4.59 %</td></tr><tr><td><strong>Charge of the ion</strong> +10 %</td><td>−2.43 %</td><td>−21 %</td><td>+19.55 %</td></tr><tr><td><strong>Debye-Hückel constant A</strong> +10 %</td><td>−1.17 %</td><td>−10 %</td><td>+9.37 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Charge of the ion</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Ionic strength</strong>, at 4.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Ionic strength = 0.001, Charge of the ion = 1, Debye-Hückel constant A = 0.509, the page reports <strong>Activity coefficient γ</strong> = 0.964, <strong>log₁₀ γ</strong> = -0.016, <strong>Activity below concentration</strong> = 3.638 %. A millimolar solution: γ = 0.964, only a 3.6 per cent correction.</li><li>With Ionic strength = 0.01, Charge of the ion = 2, Debye-Hückel constant A = 0.509, the page reports <strong>Activity coefficient γ</strong> = 0.626, <strong>log₁₀ γ</strong> = -0.204, <strong>Activity below concentration</strong> = 37.425 %. A divalent ion at the same ionic strength: γ = 0.626, because the charge is squared and the deviation is four times larger.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Concentration used as ionic strength.</strong> I weights every ion by its charge squared, so a 0.1 mol/L solution of CaCl₂ has I = 0.3, not 0.1.</li><li><strong>The law used above 0.01 mol/L.</strong> Seawater has I near 0.7, where the limiting law over-corrects badly and activity coefficients start to rise again.</li><li><strong>Temperature ignored.</strong> The constant A is 0.509 at 25 °C and about 0.49 at 0 °C, and the dielectric constant it depends on moves with temperature.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Activity coefficient γ, log₁₀ γ, Activity below concentration (%).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Ionic strength is in moles per litre, and the charge and the constant A are plain numbers. The activity coefficient is dimensionless, as is its logarithm; the shortfall is a percentage.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need ionic strength and charge of the ion and debye-Hückel constant A. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Activity coefficient γ and log₁₀ γ and activity below concentration should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Ionic strength</strong> ×10</td><td>0.889</td><td>0.69</td><td>×0.776</td></tr><tr><td><strong>Charge of the ion</strong> ×10</td><td>0.889</td><td>8.128 × 10<sup>-6</sup></td><td>×9.139 × 10<sup>-6</sup></td></tr><tr><td><strong>Debye-Hückel constant A</strong> ×10</td><td>0.889</td><td>0.31</td><td>×0.348</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Limiting law only.</strong> It ignores ion size and ion pairing, which is why it is accurate only in very dilute solutions.</li><li><strong>Single ions, not salts.</strong> A single ion's activity coefficient cannot be measured on its own; mean ionic coefficients are what experiments give.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Correcting a concentration into an activity.</li></li><li><li>Seeing how far a buffer is from ideal behaviour.</li></li><li><li>Estimating the ionic-strength limit of a measurement method.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/ionic-strength">Ionic strength</a> <a href="/chemistry/molarity">Molarity</a> <a href="/chemistry/ph">pH</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Activity Coefficient calculator work out?', 'a' => <<<'TXT'
            It returns activity coefficient γ and log₁₀ γ and activity below concentration from ionic strength and charge of the ion and debye-Hückel constant A. The relationship is -Debye-Hückel constant A × (Charge of the ion)^2 × √(Ionic strength).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Ionic strength (mol/L), Charge of the ion, Debye-Hückel constant A. The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: ionic strength in mol/L. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is activity, in one sentence?', 'a' => 'It is the effective concentration — what the ion behaves as, rather than how many are in the litre. Activity is concentration multiplied by this coefficient.'],
            ['q' => 'Why does γ fall and then rise?', 'a' => 'The limiting law only describes the fall. At high ionic strength, ions pair up and carry each other\'s charge, so their effective concentration climbs again.'],
        ],
        'related' => [
            ['path' => '/chemistry/ionic-strength', 'name' => 'Ionic strength'],
            ['path' => '/chemistry/molarity', 'name' => 'Molarity'],
            ['path' => '/chemistry/ph', 'name' => 'pH'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Langmuir Isotherm Calculator
 * /chemistry/langmuir-isotherm
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Langmuir Isotherm Calculator',
    'meta' => ['title' => 'Langmuir Isotherm Calculator: Surface Coverage', 'description' => 'Work out how much of a surface is covered at a given concentration, from the adsorption capacity and the Langmuir binding constant for that particular pair.', 'h1' => 'Langmuir Isotherm Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'qmax',
                    'label' => 'Maximum adsorption capacity',
                    'type' => 'number',
                    'suffix' => 'mg/g',
                    'default' => '100',
                    'help' => 'Saturation coverage, from the isotherm\'s plateau',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'k',
                    'label' => 'Langmuir constant K',
                    'type' => 'number',
                    'suffix' => 'L/mg',
                    'default' => '2',
                    'help' => 'The affinity of the adsorbate for the surface',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'concentration',
                    'label' => 'Equilibrium concentration',
                    'type' => 'number',
                    'suffix' => 'mg/L',
                    'default' => '1',
                    'help' => 'The concentration left in solution at equilibrium',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'adsorbed',
                    'label' => 'Amount adsorbed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mg/g',
                ],
                [
                    'name' => 'coverage',
                    'label' => 'Fraction of sites occupied',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'kc',
                    'label' => 'K × C',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Langmuir Isotherm',
            'results' => [
                'adsorbed' => 'qmax*k*concentration/(1+k*concentration)',
                'coverage' => 'k*concentration/(1+k*concentration)*100',
                'kc' => 'k*concentration',
                'qmax' => 'adsorbed*(1+k*concentration)/(k*concentration)',
                'k' => 'adsorbed/(concentration*(qmax-adsorbed))',
                'concentration' => 'adsorbed/(k*(qmax-adsorbed))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>The Langmuir isotherm assumes a fixed number of identical sites that fill up and then stop: <strong>q = q<sub>max</sub>·K·C ÷ (1 + K·C)</strong>. The page reports the amount adsorbed, the fraction of sites occupied and the dimensionless product K·C that drives both.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Langmuir's isotherm is the standard description of monolayer adsorption: activated carbon, catalysts, antibody surfaces and soil particles all get fitted with it. Two numbers — capacity and affinity — then describe the whole curve.</p><p>The page reports <strong>amount adsorbed and fraction of sites occupied and k × C</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Amount adsorbed</strong></td><td><code>Maximum adsorption capacity × Langmuir constant K × Equilibrium concentration ÷ (1+Langmuir constant K × Equilibrium concentration)</code></td></tr><tr><td><strong>Fraction of sites occupied</strong></td><td><code>Langmuir constant K × Equilibrium concentration ÷ (1+Langmuir constant K × Equilibrium concentration) × 100</code></td></tr><tr><td><strong>K × C</strong></td><td><code>Langmuir constant K × Equilibrium concentration</code></td></tr><tr><td><strong>Maximum adsorption capacity</strong></td><td><code>Amount adsorbed × (1+Langmuir constant K × Equilibrium concentration) ÷ (Langmuir constant K × Equilibrium concentration)</code></td></tr><tr><td><strong>Langmuir constant K</strong></td><td><code>Amount adsorbed ÷ (Equilibrium concentration × (Maximum adsorption capacity-Amount adsorbed))</code></td></tr><tr><td><strong>Equilibrium concentration</strong></td><td><code>Amount adsorbed ÷ (Langmuir constant K × (Maximum adsorption capacity-Amount adsorbed))</code></td></tr></tbody></table><p><p>At low concentration the product K·C is small and the isotherm is nearly linear, with a slope of qmax·K. At high concentration it saturates at qmax. The transition happens around C = 1/K.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports amount adsorbed and fraction of sites occupied and k × C.</p><ul><li><strong>Maximum adsorption capacity</strong> — in mg/g. Saturation coverage, from the isotherm&#x27;s plateau</li><li><strong>Langmuir constant K</strong> — in L/mg. The affinity of the adsorbate for the surface</li><li><strong>Equilibrium concentration</strong> — in mg/L. The concentration left in solution at equilibrium</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Amount adsorbed</strong> — in mg/g</li><li><strong>Fraction of sites occupied</strong> — in %</li><li><strong>K × C</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Maximum adsorption capacity = 100 mg/g, Langmuir constant K = 2 L/mg, Equilibrium concentration = 1 mg/L — and the results panel reads:</p><ul><li><strong>Amount adsorbed</strong> = <code>Maximum adsorption capacity × Langmuir constant K × Equilibrium concentration ÷ (1+Langmuir constant K × Equilibrium concentration)</code> = <strong>66.667 mg/g</strong></li><li><strong>Fraction of sites occupied</strong> = <code>Langmuir constant K × Equilibrium concentration ÷ (1+Langmuir constant K × Equilibrium concentration) × 100</code> = <strong>66.667 %</strong></li><li><strong>K × C</strong> = <code>Langmuir constant K × Equilibrium concentration</code> = <strong>2</strong></li></ul><p>With the numbers written into the formula, the first result is <code>100 × 2 × 1 ÷ (1+2 × 1) = 66.667</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>qmax = 100 mg/g and K = 2 L/mg at C = 1 mg/L: 66.7 mg/g adsorbed, with two thirds of the sites occupied. At 10 mg/L it reaches 95.2 mg/g — the remaining sites are hard to fill.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>A large K means strong binding and saturation at low concentration. A small K means a nearly linear isotherm across the working range, which is easier to use but harder to desorb.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Amount adsorbed</th><th>Fraction of sites occupied</th><th>K × C</th></tr></thead><tbody><tr><td><strong>Maximum adsorption capacity</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Langmuir constant K</strong> +10 %</td><td>+3.12 %</td><td>+3.13 %</td><td>+10 %</td></tr><tr><td><strong>Equilibrium concentration</strong> +10 %</td><td>+3.12 %</td><td>+3.13 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Langmuir constant K</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Maximum adsorption capacity</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Maximum adsorption capacity = 200, Langmuir constant K = 0.1, Equilibrium concentration = 10, the page reports <strong>Amount adsorbed</strong> = 100 mg/g, <strong>Fraction of sites occupied</strong> = 50 %, <strong>K × C</strong> = 1. K·C = 1 gives exactly half the capacity — the definition of the constant, and a useful check.</li><li>With Maximum adsorption capacity = 50, Langmuir constant K = 20, Equilibrium concentration = 5, the page reports <strong>Amount adsorbed</strong> = 49.505 mg/g, <strong>Fraction of sites occupied</strong> = 99.01 %, <strong>K × C</strong> = 100. Strong binding saturates the surface: 99 per cent coverage at 5 mg/L.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>K's units ignored.</strong> K is per concentration unit, so the product K·C only comes out dimensionless when the two share that unit.</li><li><strong>It fitted to multilayer data.</strong> Where adsorption keeps rising past the plateau, the BET or Freundlich models apply, not Langmuir.</li><li><strong>The capacity read as the amount adsorbed.</strong> qmax is the ceiling; what you get at a given concentration is always below it.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Amount adsorbed (mg/g), Fraction of sites occupied (%), K × C.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The capacity is in milligrams per gram of adsorbent, the concentration in milligrams per litre and K in litres per milligram, so K·C is dimensionless and the coverage is a percentage.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need maximum adsorption capacity and langmuir constant K and equilibrium concentration. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Amount adsorbed and fraction of sites occupied and k × c should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Maximum adsorption capacity</strong> ×10</td><td>66.667</td><td>666.667</td><td>ten times larger</td></tr><tr><td><strong>Langmuir constant K</strong> ×10</td><td>66.667</td><td>95.238</td><td>×1.429</td></tr><tr><td><strong>Equilibrium concentration</strong> ×10</td><td>66.667</td><td>95.238</td><td>×1.429</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>One adsorbate, one layer.</strong> Competing species and multilayer adsorption both break the model.</li><li><strong>It assumes identical sites.</strong> Real surfaces have a distribution of binding energies, which is why fitted curves often miss at the ends.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing a carbon bed from a batch isotherm.</li></li><li><li>Comparing two adsorbents' capacity and affinity.</li></li><li><li>Predicting the equilibrium loading for a given dose.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/beer-lambert-law">Beer-Lambert law</a> <a href="/chemistry/michaelis-menten-equation">Michaelis-Menten</a> <a href="/chemistry/calibration-curve">Calibration curve</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Langmuir Isotherm calculator work out?', 'a' => <<<'TXT'
            It returns amount adsorbed and fraction of sites occupied and k × C from maximum adsorption capacity and langmuir constant K and equilibrium concentration. The relationship is Maximum adsorption capacity × Langmuir constant K × Equilibrium concentration ÷ (1+Langmuir constant K × Equilibrium concentration).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Maximum adsorption capacity (mg/g), Langmuir constant K (L/mg), Equilibrium concentration (mg/L). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: maximum adsorption capacity in mg/g; langmuir constant K in L/mg; equilibrium concentration in mg/L. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What does the Langmuir constant mean?', 'a' => <<<'TXT'
            The affinity of the adsorbate for the surface. Its reciprocal is the concentration at which half the sites are filled, which is why K·C = 1 gives 50 per cent coverage.
            TXT],
            ['q' => 'How do I find qmax and K from data?', 'a' => 'Plot C/q against C: the slope is 1/qmax and the intercept is 1/(qmax·K). The page runs the same relation the other way.'],
        ],
        'related' => [
            ['path' => '/chemistry/beer-lambert-law', 'name' => 'Beer-Lambert law'],
            ['path' => '/chemistry/michaelis-menten-equation', 'name' => 'Michaelis-Menten'],
            ['path' => '/chemistry/calibration-curve', 'name' => 'Calibration curve'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

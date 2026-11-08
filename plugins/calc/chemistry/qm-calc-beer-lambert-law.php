<?php

/**
 * Beer-Lambert Law Calculator
 * /chemistry/beer-lambert-law
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Beer-Lambert Law Calculator',
    'meta' => ['title' => 'Beer-Lambert Law Calculator: Absorbance and T', 'description' => 'Turn a molar absorptivity, a concentration and a path length into an absorbance, and read off the transmittance and the fraction of light the sample absorbed.', 'h1' => 'Beer-Lambert Law Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'absorptivity',
                    'label' => 'Molar absorptivity ε',
                    'type' => 'number',
                    'suffix' => 'L/(mol·cm)',
                    'default' => '15000',
                    'help' => 'A property of the substance at that wavelength; 15 000 is a strong chromophore',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'concentration',
                    'label' => 'Concentration',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.0002',
                    'help' => '0.2 mmol/L',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'path_length',
                    'label' => 'Path length',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '1',
                    'help' => '1 cm is the standard cuvette',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'absorbance',
                    'label' => 'Absorbance',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'transmittance',
                    'label' => 'Transmittance',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'absorbed',
                    'label' => 'Light absorbed',
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
            'title' => 'Beer-Lambert Law',
            'results' => [
                'absorbance' => 'absorptivity*concentration*path_length',
                'transmittance' => 'pow(10,-(absorptivity*concentration*path_length))*100',
                'absorbed' => '(1-pow(10,-(absorptivity*concentration*path_length)))*100',
                'absorptivity' => 'absorbance/(concentration*path_length)',
                'concentration' => 'absorbance/(absorptivity*path_length)',
                'path_length' => 'absorbance/(absorptivity*concentration)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Absorbance is proportional to how much light-absorbing material the beam passes through: <strong>A = ε·c·l</strong>. The page reports the absorbance, the transmitted fraction as a percentage, and how much light the sample removed.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Almost every quantitative measurement in a spectrophotometer rests on this one linear relation. It converts a number the instrument prints — absorbance — into a concentration, which is the quantity the experiment is actually about.</p><p>The page reports <strong>absorbance and transmittance and light absorbed</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Absorbance</strong></td><td><code>Molar absorptivity ε × Concentration × Path length</code></td></tr><tr><td><strong>Transmittance</strong></td><td><code>(10)^-(Molar absorptivity ε × Concentration × Path length) × 100</code></td></tr><tr><td><strong>Light absorbed</strong></td><td><code>(1-(10)^-(Molar absorptivity ε × Concentration × Path length)) × 100</code></td></tr><tr><td><strong>Molar absorptivity ε</strong></td><td><code>Absorbance ÷ (Concentration × Path length)</code></td></tr><tr><td><strong>Concentration</strong></td><td><code>Absorbance ÷ (Molar absorptivity ε × Path length)</code></td></tr><tr><td><strong>Path length</strong></td><td><code>Absorbance ÷ (Molar absorptivity ε × Concentration)</code></td></tr></tbody></table><p><p>Absorbance is logarithmic, so it adds along the path: two identical cuvettes in series double the absorbance but multiply the transmitted light by a hundredth. That is why the law is linear in c and l but the transmittance is exponential.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports absorbance and transmittance and light absorbed.</p><ul><li><strong>Molar absorptivity ε</strong> — in L/(mol·cm). A property of the substance at that wavelength; 15 000 is a strong chromophore</li><li><strong>Concentration</strong> — in mol/L. 0.2 mmol/L</li><li><strong>Path length</strong> — in cm. 1 cm is the standard cuvette</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Absorbance</strong></li><li><strong>Transmittance</strong> — in %</li><li><strong>Light absorbed</strong> — in %</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Molar absorptivity ε = 15 000 L/(mol·cm), Concentration = 0.0002 mol/L, Path length = 1 cm — and the results panel reads:</p><ul><li><strong>Absorbance</strong> = <code>Molar absorptivity ε × Concentration × Path length</code> = <strong>3</strong></li><li><strong>Transmittance</strong> = <code>(10)^-(Molar absorptivity ε × Concentration × Path length) × 100</code> = <strong>0.1 %</strong></li><li><strong>Light absorbed</strong> = <code>(1-(10)^-(Molar absorptivity ε × Concentration × Path length)) × 100</code> = <strong>99.9 %</strong></li></ul><p>With the numbers written into the formula, the first result is <code>15 000 × 0.0002 × 1 = 3</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>ε = 15 000, c = 0.2 mmol/L, l = 1 cm: A = 3.0, so one photon in a thousand gets through — 0.1 per cent transmittance. Absorbances above about 2 are usually too dark to measure reliably, which is why the sample would be diluted.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Keep the absorbance between roughly 0.1 and 1.0. Below 0.1 the noise in the detector dominates; above 1.5 stray light starts to flatten the curve and the linear relation fails, so the answer drifts low.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Absorbance</th><th>Transmittance</th><th>Light absorbed</th></tr></thead><tbody><tr><td><strong>Molar absorptivity ε</strong> +10 %</td><td>+10 %</td><td>−49.88 %</td><td>+0.05 %</td></tr><tr><td><strong>Concentration</strong> +10 %</td><td>+10 %</td><td>−49.88 %</td><td>+0.05 %</td></tr><tr><td><strong>Path length</strong> +10 %</td><td>+10 %</td><td>−49.88 %</td><td>+0.05 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Concentration</strong>: a ten per cent move there shifts the result by about 49.9 per cent. The least sensitive is <strong>Path length</strong>, at 49.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Molar absorptivity ε = 6 220, Concentration = 0.0001, Path length = 1, the page reports <strong>Absorbance</strong> = 0.622, <strong>Transmittance</strong> = 23.878 %, <strong>Light absorbed</strong> = 76.122 %. NADH at 340 nm: 6 220 L/(mol·cm) and 0.1 mmol/L gives A = 0.622, a comfortable reading.</li><li>With Molar absorptivity ε = 15 000, Concentration = 4 × 10<sup>-5</sup>, Path length = 1, the page reports <strong>Absorbance</strong> = 0.6, <strong>Transmittance</strong> = 25.119 %, <strong>Light absorbed</strong> = 74.881 %. Diluting ten-fold leaves A = 0.60 — the same sample, back inside the reliable range.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Transmittance read as absorbance.</strong> A = −log₁₀T; a transmittance of 10 per cent is an absorbance of 1, not of 10.</li><li><strong>Concentration in mmol/L.</strong> ε is per mole; using millimoles in the c box makes the absorbance a thousand times too small.</li><li><strong>Absorbance beyond the linear range.</strong> Above about 1.5 the instrument's stray light bends the curve and the concentration comes out low.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Absorbance, Transmittance (%), Light absorbed (%).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Molar absorptivity in litres per mole per centimetre, concentration in moles per litre and path length in centimetres give a dimensionless absorbance. A path in millimetres has to be divided by ten first.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need molar absorptivity ε and concentration and path length. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Absorbance and transmittance and light absorbed should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Molar absorptivity ε</strong> ×10</td><td>3</td><td>30</td><td>ten times larger</td></tr><tr><td><strong>Concentration</strong> ×10</td><td>3</td><td>30</td><td>ten times larger</td></tr><tr><td><strong>Path length</strong> ×10</td><td>3</td><td>30</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Dilute solutions only.</strong> Above about 10 mmol/L, solute interactions shift the spectrum and the law stops being linear.</li><li><strong>One absorbing species at a time.</strong> A mixture's absorbance is the sum of its components, which is what makes multi-wavelength analysis possible and this page insufficient on its own.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Converting a plate-reader absorbance into a concentration.</li></li><li><li>Choosing a dilution so a sample lands in the linear range.</li></li><li><li>Finding an extinction coefficient from a known standard.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/calibration-curve">Calibration curve</a> <a href="/chemistry/concentration">Concentration</a> <a href="/chemistry/molarity">Molarity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Beer-Lambert Law calculator work out?', 'a' => <<<'TXT'
            It returns absorbance and transmittance and light absorbed from molar absorptivity ε and concentration and path length. The relationship is Molar absorptivity ε × Concentration × Path length.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Molar absorptivity ε (L/(mol·cm)), Concentration (mol/L), Path length (cm). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: molar absorptivity ε in L/(mol·cm); concentration in mol/L; path length in cm. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is absorbance not just a percentage?', 'a' => <<<'TXT'
            Because the transmitted light falls exponentially with concentration. The logarithm turns that curve into a straight line, and a straight line is what a calibration uses.
            TXT],
            ['q' => 'What is a typical molar absorptivity?', 'a' => 'From a few hundred for a weak chromophore to over 100 000 for a strong dye. Proteins at 280 nm are around 40 000 per molar concentration of the whole molecule.'],
        ],
        'related' => [
            ['path' => '/chemistry/calibration-curve', 'name' => 'Calibration curve'],
            ['path' => '/chemistry/concentration', 'name' => 'Concentration'],
            ['path' => '/chemistry/molarity', 'name' => 'Molarity'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

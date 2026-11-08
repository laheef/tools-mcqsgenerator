<?php

/**
 * Enzyme Activity Calculator
 * /chemistry/enzyme-activity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Enzyme Activity Calculator',
    'meta' => ['title' => 'Enzyme Activity Calculator: From Absorbance Rate', 'description' => 'Convert a spectrophotometric rate into enzyme activity in international units, corrected for the assay volume and for any dilution of the sample before assay.', 'h1' => 'Enzyme Activity Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'delta_a',
                    'label' => 'Absorbance change',
                    'type' => 'number',
                    'suffix' => 'ΔA',
                    'default' => '0.5',
                    'help' => 'Over the measurement window, at the assay wavelength',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'extinction',
                    'label' => 'Extinction coefficient',
                    'type' => 'number',
                    'suffix' => 'mM⁻¹·cm⁻¹',
                    'default' => '6.22',
                    'help' => '6.22 for NADH at 340 nm',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'path_length',
                    'label' => 'Path length',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '1',
                    'help' => '1 cm for a standard cuvette',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'time',
                    'label' => 'Time over which ΔA was measured',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '1',
                    'help' => 'Minutes, because a unit is defined per minute',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume',
                    'label' => 'Assay volume',
                    'type' => 'number',
                    'suffix' => 'mL',
                    'default' => '1',
                    'help' => 'The total volume in the cuvette',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'dilution',
                    'label' => 'Dilution of the sample',
                    'type' => 'number',
                    'default' => '1',
                    'help' => '10 for a sample diluted ten-fold before assay',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'activity_per_ml',
                    'label' => 'Activity in the assay',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'U/mL',
                ],
                [
                    'name' => 'total_activity',
                    'label' => 'Total activity in the assay',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'U',
                ],
                [
                    'name' => 'sample_activity',
                    'label' => 'Activity of the undiluted sample',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'U/mL',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Enzyme Activity',
            'results' => [
                'activity_per_ml' => 'delta_a/(extinction*path_length*time)',
                'total_activity' => 'delta_a/(extinction*path_length*time)*volume',
                'sample_activity' => 'delta_a/(extinction*path_length*time)*dilution',
                'delta_a' => 'activity_per_ml*extinction*path_length*time',
                'extinction' => 'delta_a/(activity_per_ml*path_length*time)',
                'path_length' => 'delta_a/(activity_per_ml*extinction*time)',
                'time' => 'delta_a/(activity_per_ml*extinction*path_length)',
                'volume' => 'total_activity/(delta_a/(extinction*path_length*time))',
                'dilution' => 'sample_activity/(delta_a/(extinction*path_length*time))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>One international unit is one micromole of substrate converted per minute. From an absorbance change, <strong>U per mL = ΔA ÷ (ε·l·t)</strong>, with ε in millimolar inverse-centimetres and t in minutes; the assay volume and the dilution scale it to your sample.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Enzyme activity is the currency of every biochemistry lab: it is how much enzyme you have, how pure a fraction is, and whether a batch is going off. Because it is measured as a rate, every number in the assay — volume, path length, time — enters the conversion.</p><p>The page reports <strong>activity in the assay and total activity in the assay and activity of the undiluted sample</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Activity in the assay</strong></td><td><code>Absorbance change ÷ (Extinction coefficient × Path length × Time over which ΔA was measured)</code></td></tr><tr><td><strong>Total activity in the assay</strong></td><td><code>Absorbance change ÷ (Extinction coefficient × Path length × Time over which ΔA was measured) × Assay volume</code></td></tr><tr><td><strong>Activity of the undiluted sample</strong></td><td><code>Absorbance change ÷ (Extinction coefficient × Path length × Time over which ΔA was measured) × Dilution of the sample</code></td></tr><tr><td><strong>Absorbance change</strong></td><td><code>Activity in the assay × Extinction coefficient × Path length × Time over which ΔA was measured</code></td></tr><tr><td><strong>Extinction coefficient</strong></td><td><code>Absorbance change ÷ (Activity in the assay × Path length × Time over which ΔA was measured)</code></td></tr><tr><td><strong>Path length</strong></td><td><code>Absorbance change ÷ (Activity in the assay × Extinction coefficient × Time over which ΔA was measured)</code></td></tr><tr><td><strong>Time over which ΔA was measured</strong></td><td><code>Absorbance change ÷ (Activity in the assay × Extinction coefficient × Path length)</code></td></tr><tr><td><strong>Assay volume</strong></td><td><code>Total activity in the assay ÷ (Absorbance change ÷ (Extinction coefficient × Path length × Time over which ΔA was measured))</code></td></tr><tr><td><strong>Dilution of the sample</strong></td><td><code>Activity of the undiluted sample ÷ (Absorbance change ÷ (Extinction coefficient × Path length × Time over which ΔA was measured))</code></td></tr></tbody></table><p><p>The bracket ε·l converts absorbance into millimolar concentration, and dividing by time makes it a rate. Millimolar per minute is micromoles per millilitre per minute, which is exactly a unit per millilitre.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports activity in the assay and total activity in the assay and activity of the undiluted sample.</p><ul><li><strong>Absorbance change</strong> — in ΔA. Over the measurement window, at the assay wavelength</li><li><strong>Extinction coefficient</strong> — in mM⁻¹·cm⁻¹. 6.22 for NADH at 340 nm</li><li><strong>Path length</strong> — in cm. 1 cm for a standard cuvette</li><li><strong>Time over which ΔA was measured</strong> — in min. Minutes, because a unit is defined per minute</li><li><strong>Assay volume</strong> — in mL. The total volume in the cuvette</li><li><strong>Dilution of the sample</strong>. 10 for a sample diluted ten-fold before assay</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Activity in the assay</strong> — in U/mL</li><li><strong>Total activity in the assay</strong> — in U</li><li><strong>Activity of the undiluted sample</strong> — in U/mL</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Absorbance change = 0.5 ΔA, Extinction coefficient = 6.22 mM⁻¹·cm⁻¹, Path length = 1 cm, Time over which ΔA was measured = 1 min, Assay volume = 1 mL, Dilution of the sample = 1 — and the results panel reads:</p><ul><li><strong>Activity in the assay</strong> = <code>Absorbance change ÷ (Extinction coefficient × Path length × Time over which ΔA was measured)</code> = <strong>0.08 U/mL</strong></li><li><strong>Total activity in the assay</strong> = <code>Absorbance change ÷ (Extinction coefficient × Path length × Time over which ΔA was measured) × Assay volume</code> = <strong>0.08 U</strong></li><li><strong>Activity of the undiluted sample</strong> = <code>Absorbance change ÷ (Extinction coefficient × Path length × Time over which ΔA was measured) × Dilution of the sample</code> = <strong>0.08 U/mL</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.5 ÷ (6.22 × 1 × 1) = 0.08</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>An NADH assay losing 0.5 absorbance units a minute at 340 nm: 0.5 ÷ 6.22 is 0.080 U/mL, so a one millilitre assay holds 0.080 U — 80 milliunits. If the sample had been diluted ten-fold, the undiluted activity is 0.80 U/mL.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Keep the rate in the linear range: a ΔA per minute between about 0.05 and 0.3 is comfortable. Faster than that and the substrate is depleted during the measurement; slower and the noise dominates.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Activity in the assay</th><th>Total activity in the assay</th><th>Activity of the undiluted sample</th></tr></thead><tbody><tr><td><strong>Absorbance change</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Extinction coefficient</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Path length</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Time over which ΔA was measured</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Assay volume</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Dilution of the sample</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Absorbance change</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Time over which ΔA was measured</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Absorbance change = 0.15, Extinction coefficient = 6.22, Path length = 1, Time over which ΔA was measured = 1, Assay volume = 1, Dilution of the sample = 10, the page reports <strong>Activity in the assay</strong> = 0.024 U/mL, <strong>Total activity in the assay</strong> = 0.024 U, <strong>Activity of the undiluted sample</strong> = 0.241 U/mL. A twenty-fold lower rate with a ten-fold dilution: 0.024 U/mL in the assay, 0.24 U/mL in the sample.</li><li>With Absorbance change = 1.244, Extinction coefficient = 6.22, Path length = 1, Time over which ΔA was measured = 2, Assay volume = 0.2, Dilution of the sample = 1, the page reports <strong>Activity in the assay</strong> = 0.1 U/mL, <strong>Total activity in the assay</strong> = 0.02 U, <strong>Activity of the undiluted sample</strong> = 0.1 U/mL. A 200 µL assay read over two minutes: 0.1 U/mL and 0.02 U in the well.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The extinction coefficient in the wrong units.</strong> 6 220 L/(mol·cm) is the same as 6.22 mM⁻¹·cm⁻¹; the factor of a thousand has to be right or the answer is out by it.</li><li><strong>Time in seconds.</strong> A unit is per minute, and entering seconds makes the activity sixty times too large.</li><li><strong>The dilution left out.</strong> Activity per millilitre of a diluted sample is not the activity of the sample; multiply by the dilution factor.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Activity in the assay (U/mL), Total activity in the assay (U), Activity of the undiluted sample (U/mL).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Absorbance is dimensionless, the extinction coefficient is per millimolar per centimetre and the time is in minutes, which is what makes the answer come out in micromoles per millilitre per minute — the international unit.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need absorbance change and extinction coefficient and path length and time over which ΔA was measured and assay volume and dilution of the sample. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Activity in the assay and total activity in the assay and activity of the undiluted sample should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Absorbance change</strong> ×10</td><td>0.08</td><td>0.804</td><td>ten times larger</td></tr><tr><td><strong>Extinction coefficient</strong> ×10</td><td>0.08</td><td>0.008</td><td>ten times smaller</td></tr><tr><td><strong>Path length</strong> ×10</td><td>0.08</td><td>0.008</td><td>ten times smaller</td></tr><tr><td><strong>Time over which ΔA was measured</strong> ×10</td><td>0.08</td><td>0.008</td><td>ten times smaller</td></tr><tr><td><strong>Assay volume</strong> ×10</td><td>0.08</td><td>0.08</td><td>unchanged</td></tr><tr><td><strong>Dilution of the sample</strong> ×10</td><td>0.08</td><td>0.08</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It needs a known extinction coefficient.</strong> For a coupled assay, the coefficient belongs to the reporter, not the substrate.</li><li><strong>It says nothing about purity.</strong> Activity per millilitre and specific activity per milligram of protein are different numbers; this page gives the first.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Reporting an enzyme preparation's activity in units.</li></li><li><li>Converting a plate-reader kinetic read into units per millilitre.</li></li><li><li>Comparing two batches of the same enzyme.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/beer-lambert-law">Beer-Lambert law</a> <a href="/chemistry/michaelis-menten-equation">Michaelis-Menten</a> <a href="/chemistry/protein-solubility">Protein solubility</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Enzyme Activity calculator work out?', 'a' => <<<'TXT'
            It returns activity in the assay and total activity in the assay and activity of the undiluted sample from absorbance change and extinction coefficient and path length and time over which ΔA was measured and assay volume and dilution of the sample. The relationship is Absorbance change ÷ (Extinction coefficient × Path length × Time over which ΔA was measured).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Absorbance change (ΔA), Extinction coefficient (mM⁻¹·cm⁻¹), Path length (cm), Time over which ΔA was measured (min), Assay volume (mL), Dilution of the sample. The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: absorbance change in ΔA; extinction coefficient in mM⁻¹·cm⁻¹; path length in cm; time over which ΔA was measured in min; assay volume in mL. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What exactly is one unit of enzyme?', 'a' => 'One micromole of substrate converted per minute, under the assay\'s stated conditions. It is defined by the assay, not by the protein.'],
            ['q' => 'Why does the assay volume matter?', 'a' => <<<'TXT'
            Because the unit is per millilitre. The same rate in a smaller volume means a higher concentration of enzyme, and the total activity is what the volume converts.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/beer-lambert-law', 'name' => 'Beer-Lambert law'],
            ['path' => '/chemistry/michaelis-menten-equation', 'name' => 'Michaelis-Menten'],
            ['path' => '/chemistry/protein-solubility', 'name' => 'Protein solubility'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Calibration Curve Calculator
 * /chemistry/calibration-curve
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Calibration Curve Calculator',
    'meta' => ['title' => 'Calibration Curve Calculator: Line From Standards', 'description' => 'Fit a straight line through three standards, read the sample\'s concentration back off it, and see the correlation coefficient that says whether it is usable.', 'h1' => 'Calibration Curve Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'x1',
                    'label' => 'Concentration of standard 1',
                    'type' => 'number',
                    'suffix' => 'mg/L',
                    'default' => '0.1',
                    'help' => 'The lowest standard',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'y1',
                    'label' => 'Signal of standard 1',
                    'type' => 'number',
                    'default' => '0.12',
                    'help' => 'Absorbance or peak area',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'x2',
                    'label' => 'Concentration of standard 2',
                    'type' => 'number',
                    'suffix' => 'mg/L',
                    'default' => '0.5',
                    'help' => 'A middle standard',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'y2',
                    'label' => 'Signal of standard 2',
                    'type' => 'number',
                    'default' => '0.55',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'x3',
                    'label' => 'Concentration of standard 3',
                    'type' => 'number',
                    'suffix' => 'mg/L',
                    'default' => '1.0',
                    'help' => 'The highest standard',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'y3',
                    'label' => 'Signal of standard 3',
                    'type' => 'number',
                    'default' => '1.08',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sample_signal',
                    'label' => 'Signal of the sample',
                    'type' => 'number',
                    'default' => '0.72',
                    'help' => 'Measured the same way as the standards',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'concentration',
                    'label' => 'Concentration of the sample',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mg/L',
                ],
                [
                    'name' => 'slope',
                    'label' => 'Slope of the line',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'per mg/L',
                ],
                [
                    'name' => 'intercept',
                    'label' => 'Intercept',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'r_squared',
                    'label' => 'R²',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'mean_x',
                    'label' => 'Mean concentration of the standards',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mg/L',
                ],
                [
                    'name' => 'mean_y',
                    'label' => 'Mean signal of the standards',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Calibration Curve',
            'results' => [
                'mean_x' => '(x1+x2+x3)/3',
                'mean_y' => '(y1+y2+y3)/3',
                'slope' => '((x1-mean_x)*(y1-mean_y)+(x2-mean_x)*(y2-mean_y)+(x3-mean_x)*(y3-mean_y))/(pow(x1-mean_x,2)+pow(x2-mean_x,2)+pow(x3-mean_x,2))',
                'intercept' => 'mean_y-slope*mean_x',
                'concentration' => '(sample_signal-intercept)/slope',
                'r_squared' => 'pow(slope,2)*(pow(x1-mean_x,2)+pow(x2-mean_x,2)+pow(x3-mean_x,2))/(pow(y1-mean_y,2)+pow(y2-mean_y,2)+pow(y3-mean_y,2))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Three standards define a straight line by least squares, and the sample's signal is read back off it: <strong>c = (signal − intercept) ÷ slope</strong>. The page reports the slope, the intercept, R² and the concentration the sample corresponds to.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A calibration curve is how an instrument is made quantitative. The standards convert a signal into a concentration, and the correlation coefficient says whether that conversion is worth trusting.</p><p>The page reports <strong>concentration of the sample and slope of the line and intercept and r² and mean concentration of the standards and mean signal of the standards</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Mean concentration of the standards</strong></td><td><code>(Concentration of standard 1+Concentration of standard 2+Concentration of standard 3) ÷ 3</code></td></tr><tr><td><strong>Mean signal of the standards</strong></td><td><code>(Signal of standard 1+Signal of standard 2+Signal of standard 3) ÷ 3</code></td></tr><tr><td><strong>Slope of the line</strong></td><td><code>((Concentration of standard 1-Mean concentration of the standards) × (Signal of standard 1-Mean signal of the standards)+(Concentration of standard 2-Mean concentration of the standards) × (Signal of standard 2-Mean signal of the standards)+(Concentration of standard 3-Mean concentration of the standards) × (Signal of standard 3-Mean signal of the standards)) ÷ ((Concentration of standard 1-Mean concentration of the standards)^2+(Concentration of standard 2-Mean concentration of the standards)^2+(Concentration of standard 3-Mean concentration of the standards)^2)</code></td></tr><tr><td><strong>Intercept</strong></td><td><code>Mean signal of the standards-Slope of the line × Mean concentration of the standards</code></td></tr><tr><td><strong>Concentration of the sample</strong></td><td><code>(Signal of the sample-Intercept) ÷ Slope of the line</code></td></tr><tr><td><strong>R²</strong></td><td><code>(Slope of the line)^2 × ((Concentration of standard 1-Mean concentration of the standards)^2+(Concentration of standard 2-Mean concentration of the standards)^2+(Concentration of standard 3-Mean concentration of the standards)^2) ÷ ((Signal of standard 1-Mean signal of the standards)^2+(Signal of standard 2-Mean signal of the standards)^2+pow(Signal of standard 3-Mean signal of the standards,2))</code></td></tr></tbody></table><p><p>Least squares finds the line that minimises the squared vertical distances from the three points. With only three standards the arithmetic is short enough to check by hand, which is why three is the usual minimum in a teaching lab.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 7 boxes and the page has everything it needs. It reports concentration of the sample and slope of the line and intercept and r² and mean concentration of the standards and mean signal of the standards.</p><ul><li><strong>Concentration of standard 1</strong> — in mg/L. The lowest standard</li><li><strong>Signal of standard 1</strong>. Absorbance or peak area</li><li><strong>Concentration of standard 2</strong> — in mg/L. A middle standard</li><li><strong>Signal of standard 2</strong>.</li><li><strong>Concentration of standard 3</strong> — in mg/L. The highest standard</li><li><strong>Signal of standard 3</strong>.</li><li><strong>Signal of the sample</strong>. Measured the same way as the standards</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Concentration of the sample</strong> — in mg/L</li><li><strong>Slope of the line</strong> — in per mg/L</li><li><strong>Intercept</strong></li><li><strong>R²</strong></li><li><strong>Mean concentration of the standards</strong> — in mg/L</li><li><strong>Mean signal of the standards</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Concentration of standard 1 = 0.1 mg/L, Signal of standard 1 = 0.12, Concentration of standard 2 = 0.5 mg/L, Signal of standard 2 = 0.55, Concentration of standard 3 = 1 mg/L, Signal of standard 3 = 1.08, Signal of the sample = 0.72 — and the results panel reads:</p><ul><li><strong>Concentration of the sample</strong> = <code>(Signal of the sample-Intercept) ÷ Slope of the line</code> = <strong>0.661 mg/L</strong></li><li><strong>Slope of the line</strong> = <code>((Concentration of standard 1-Mean concentration of the standards) × (Signal of standard 1-Mean signal of the standards)+(Concentration of standard 2-Mean concentration of the standards) × (Signal of standard 2-Mean signal of the standards)+(Concentration of standard 3-Mean concentration of the standards) × (Signal of standard 3-Mean signal of the standards)) ÷ ((Concentration of standard 1-Mean concentration of the standards)^2+(Concentration of standard 2-Mean concentration of the standards)^2+(Concentration of standard 3-Mean concentration of the standards)^2)</code> = <strong>1.066 per mg/L</strong></li><li><strong>Intercept</strong> = <code>Mean signal of the standards-Slope of the line × Mean concentration of the standards</code> = <strong>0.015</strong></li><li><strong>R²</strong> = <code>(Slope of the line)^2 × ((Concentration of standard 1-Mean concentration of the standards)^2+(Concentration of standard 2-Mean concentration of the standards)^2+(Concentration of standard 3-Mean concentration of the standards)^2) ÷ ((Signal of standard 1-Mean signal of the standards)^2+(Signal of standard 2-Mean signal of the standards)^2+pow(Signal of standard 3-Mean signal of the standards,2))</code> = <strong>1</strong></li><li><strong>Mean concentration of the standards</strong> = <code>(Concentration of standard 1+Concentration of standard 2+Concentration of standard 3) ÷ 3</code> = <strong>0.533 mg/L</strong></li><li><strong>Mean signal of the standards</strong> = <code>(Signal of standard 1+Signal of standard 2+Signal of standard 3) ÷ 3</code> = <strong>0.583</strong></li></ul><p>With the numbers written into the formula, the first result is <code>(0.72-intercept) ÷ slope = 0.661</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Standards at 0.1, 0.5 and 1.0 mg/L giving 0.12, 0.55 and 1.08: the slope is about 1.07 per mg/L and the intercept near 0.01. A sample reading 0.72 sits at roughly 0.66 mg/L, and an R² that rounds to 1.000 says the three points are almost exactly on one line.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>An R² below about 0.995 with three points means something went wrong with a standard rather than that the chemistry is curved. Re-run the outlier before trusting the sample's number.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Concentration of the sample</th><th>Slope of the line</th><th>Intercept</th><th>R²</th><th>Mean concentration of the standards</th><th>Mean signal of the standards</th></tr></thead><tbody><tr><td><strong>Concentration of standard 1</strong> +10 %</td><td>+0.3 %</td><td>+1.07 %</td><td>−66.29 %</td><td>−0.01 %</td><td>+0.62 %</td><td>+0 %</td></tr><tr><td><strong>Signal of standard 1</strong> +10 %</td><td>−0.34 %</td><td>−1.2 %</td><td>+74.16 %</td><td>−3.895 × 10<sup>-5</sup> %</td><td>+0 %</td><td>+0.69 %</td></tr><tr><td><strong>Concentration of standard 2</strong> +10 %</td><td>+2.51 %</td><td>+0.03 %</td><td>−122.85 %</td><td>−0.36 %</td><td>+3.12 %</td><td>+0 %</td></tr><tr><td><strong>Signal of standard 2</strong> +10 %</td><td>−2.53 %</td><td>−0.42 %</td><td>+142.13 %</td><td>−0.49 %</td><td>+0 %</td><td>+3.14 %</td></tr><tr><td><strong>Concentration of standard 3</strong> +10 %</td><td>+7.32 %</td><td>−10.54 %</td><td>+193.1 %</td><td>−0.3 %</td><td>+6.25 %</td><td>+0 %</td></tr><tr><td><strong>Signal of standard 3</strong> +10 %</td><td>−6.59 %</td><td>+11.62 %</td><td>−206.29 %</td><td>−0.23 %</td><td>+0 %</td><td>+6.17 %</td></tr><tr><td><strong>Signal of the sample</strong> +10 %</td><td>+10.21 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Signal of standard 3</strong>: a ten per cent move there shifts the result by about 206.3 per cent. The least sensitive is <strong>Signal of the sample</strong>, at 10.2 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Concentration of standard 1 = 1, Signal of standard 1 = 0.2, Concentration of standard 2 = 2, Signal of standard 2 = 0.4, Concentration of standard 3 = 3, Signal of standard 3 = 0.6, Signal of the sample = 0.5, the page reports <strong>Concentration of the sample</strong> = 2.5 mg/L, <strong>Slope of the line</strong> = 0.2 per mg/L, <strong>Intercept</strong> = 1.11 × 10<sup>-16</sup>, <strong>R²</strong> = 1, <strong>Mean concentration of the standards</strong> = 2 mg/L, <strong>Mean signal of the standards</strong> = 0.4. A perfect line through the origin: slope 0.2, intercept 0, and a signal of 0.5 is 2.5 mg/L.</li><li>With Concentration of standard 1 = 0, Signal of standard 1 = 0.05, Concentration of standard 2 = 5, Signal of standard 2 = 0.53, Concentration of standard 3 = 10, Signal of standard 3 = 1.01, Signal of the sample = 0.77, the page reports <strong>Concentration of the sample</strong> = 7.5 mg/L, <strong>Slope of the line</strong> = 0.096 per mg/L, <strong>Intercept</strong> = 0.05, <strong>R²</strong> = 1, <strong>Mean concentration of the standards</strong> = 5 mg/L, <strong>Mean signal of the standards</strong> = 0.53. A blank with a real signal offsets the intercept to about 0.05, which is why a blank is included even when it reads zero.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The blank left out.</strong> A reagent blank shifts the intercept, and every sample concentration then inherits that offset.</li><li><strong>R² read as accuracy.</strong> Three points can sit perfectly on a line that is wrong because every standard was made up at the wrong concentration.</li><li><strong>Extrapolating past the standards.</strong> A sample reading above the top standard is outside the tested range, however straight the line looks.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Concentration of the sample (mg/L), Slope of the line (per mg/L), Intercept, R², Mean concentration of the standards (mg/L), Mean signal of the standards.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The standards' concentrations and the sample's answer share a unit; the signal and the intercept share theirs. The slope carries signal per concentration unit, and R² is dimensionless.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need concentration of standard 1 and signal of standard 1 and concentration of standard 2 and signal of standard 2 and concentration of standard 3 and signal of standard 3 and signal of the sample. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Concentration of the sample and slope of the line and intercept and r² and mean concentration of the standards and mean signal of the standards should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Concentration of standard 1</strong> ×10</td><td>0.661</td><td>2.2</td><td>×3.326</td></tr><tr><td><strong>Signal of standard 1</strong> ×10</td><td>0.661</td><td>3.179</td><td>×4.805</td></tr><tr><td><strong>Concentration of standard 2</strong> ×10</td><td>0.661</td><td>8.589</td><td>×12.984</td></tr><tr><td><strong>Signal of standard 2</strong> ×10</td><td>0.661</td><td>-1.757</td><td>×-2.657</td></tr><tr><td><strong>Concentration of standard 3</strong> ×10</td><td>0.661</td><td>5.284</td><td>×7.988</td></tr><tr><td><strong>Signal of standard 3</strong> ×10</td><td>0.661</td><td>0.279</td><td>×0.422</td></tr><tr><td><strong>Signal of the sample</strong> ×10</td><td>0.661</td><td>6.738</td><td>×10.186</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Three points only.</strong> Three standards cannot show curvature; five or six across the range can.</li><li><strong>It assumes the relation is linear.</strong> Where the chemistry is not — immunoassays at low concentration, for instance — a straight line is the wrong model.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Turning an absorbance into a concentration against standards.</li></li><li><li>Checking whether a set of standards is linear at all.</li></li><li><li>Estimating the detection limit from the slope and the blank's noise.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/beer-lambert-law">Beer-Lambert law</a> <a href="/chemistry/concentration">Concentration</a> <a href="/chemistry/serial-dilution">Serial dilution</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Calibration Curve calculator work out?', 'a' => <<<'TXT'
            It returns concentration of the sample and slope of the line and intercept and r² and mean concentration of the standards and mean signal of the standards from concentration of standard 1 and signal of standard 1 and concentration of standard 2 and signal of standard 2 and concentration of standard 3 and signal of standard 3 and signal of the sample. The relationship is (Concentration of standard 1+Concentration of standard 2+Concentration of standard 3) ÷ 3.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Concentration of standard 1 (mg/L), Signal of standard 1, Concentration of standard 2 (mg/L), Signal of standard 2, Concentration of standard 3 (mg/L), Signal of standard 3, Signal of the sample. The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: concentration of standard 1 in mg/L; concentration of standard 2 in mg/L; concentration of standard 3 in mg/L. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many standards do I need?', 'a' => 'Three is the minimum for a line with a check; five is the usual number in practice. Three cannot detect curvature, only gross error.'],
            ['q' => 'What R² is good enough?', 'a' => 'Above 0.995 for a three-point calibration. Above 0.999 is what a well-made set of standards should give.'],
        ],
        'related' => [
            ['path' => '/chemistry/beer-lambert-law', 'name' => 'Beer-Lambert law'],
            ['path' => '/chemistry/concentration', 'name' => 'Concentration'],
            ['path' => '/chemistry/serial-dilution', 'name' => 'Serial dilution'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

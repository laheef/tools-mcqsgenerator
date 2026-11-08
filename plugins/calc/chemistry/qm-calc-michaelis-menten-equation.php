<?php

/**
 * Michaelis-Menten Calculator
 * /chemistry/michaelis-menten-equation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Michaelis-Menten Calculator',
    'meta' => ['title' => 'Michaelis-Menten Calculator: Rate From Vmax and Km', 'description' => 'Work out an enzyme\'s reaction velocity at any given substrate concentration, and see how far below its maximum rate the enzyme is really running in practice.', 'h1' => 'Michaelis-Menten Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'vmax',
                    'label' => 'Maximum velocity Vmax',
                    'type' => 'number',
                    'suffix' => 'µmol/min',
                    'default' => '100',
                    'help' => 'The rate at saturating substrate',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'km',
                    'label' => 'Michaelis constant Km',
                    'type' => 'number',
                    'suffix' => 'mmol/L',
                    'default' => '0.5',
                    'help' => 'The substrate concentration giving half of Vmax',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'substrate',
                    'label' => 'Substrate concentration',
                    'type' => 'number',
                    'suffix' => 'mmol/L',
                    'default' => '1.0',
                    'help' => 'The concentration in the assay',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'velocity',
                    'label' => 'Reaction velocity',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'µmol/min',
                ],
                [
                    'name' => 'fraction_of_vmax',
                    'label' => 'Fraction of Vmax',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'substrate_ratio',
                    'label' => 'Substrate relative to Km',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Michaelis-Menten',
            'results' => [
                'velocity' => 'vmax*substrate/(km+substrate)',
                'fraction_of_vmax' => 'substrate/(km+substrate)*100',
                'substrate_ratio' => 'substrate/km',
                'vmax' => 'velocity*(km+substrate)/substrate',
                'km' => 'substrate*(vmax-velocity)/velocity',
                'substrate' => 'velocity*km/(vmax-velocity)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>The Michaelis–Menten equation describes a saturating rate: <strong>v = V<sub>max</sub>·S ÷ (K<sub>m</sub> + S)</strong>. At S = Km the enzyme runs at exactly half its maximum; far above Km it approaches Vmax and stops responding to substrate.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Km and Vmax are the two numbers that summarise an enzyme. Vmax says how fast it can go, Km says how much substrate it needs to get halfway there — and the ratio of substrate to Km says whether a change in substrate will change the rate at all.</p><p>The page reports <strong>reaction velocity and fraction of Vmax and substrate relative to Km</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Reaction velocity</strong></td><td><code>Maximum velocity Vmax × Substrate concentration ÷ (Michaelis constant Km+Substrate concentration)</code></td></tr><tr><td><strong>Fraction of Vmax</strong></td><td><code>Substrate concentration ÷ (Michaelis constant Km+Substrate concentration) × 100</code></td></tr><tr><td><strong>Substrate relative to Km</strong></td><td><code>Substrate concentration ÷ Michaelis constant Km</code></td></tr><tr><td><strong>Maximum velocity Vmax</strong></td><td><code>Reaction velocity × (Michaelis constant Km+Substrate concentration) ÷ Substrate concentration</code></td></tr><tr><td><strong>Michaelis constant Km</strong></td><td><code>Substrate concentration × (Maximum velocity Vmax-Reaction velocity) ÷ Reaction velocity</code></td></tr><tr><td><strong>Substrate concentration</strong></td><td><code>Reaction velocity × Michaelis constant Km ÷ (Maximum velocity Vmax-Reaction velocity)</code></td></tr></tbody></table><p><p>The curve is a rectangular hyperbola, not a straight line: the first half of the saturation range costs as much substrate as all the rest. That is why assays are run at substrate concentrations several times Km, where the rate is nearly independent of small pipetting errors.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports reaction velocity and fraction of Vmax and substrate relative to Km.</p><ul><li><strong>Maximum velocity Vmax</strong> — in µmol/min. The rate at saturating substrate</li><li><strong>Michaelis constant Km</strong> — in mmol/L. The substrate concentration giving half of Vmax</li><li><strong>Substrate concentration</strong> — in mmol/L. The concentration in the assay</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Reaction velocity</strong> — in µmol/min</li><li><strong>Fraction of Vmax</strong> — in %</li><li><strong>Substrate relative to Km</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Maximum velocity Vmax = 100 µmol/min, Michaelis constant Km = 0.5 mmol/L, Substrate concentration = 1 mmol/L — and the results panel reads:</p><ul><li><strong>Reaction velocity</strong> = <code>Maximum velocity Vmax × Substrate concentration ÷ (Michaelis constant Km+Substrate concentration)</code> = <strong>66.667 µmol/min</strong></li><li><strong>Fraction of Vmax</strong> = <code>Substrate concentration ÷ (Michaelis constant Km+Substrate concentration) × 100</code> = <strong>66.667 %</strong></li><li><strong>Substrate relative to Km</strong> = <code>Substrate concentration ÷ Michaelis constant Km</code> = <strong>2</strong></li></ul><p>With the numbers written into the formula, the first result is <code>100 × 1 ÷ (0.5+1) = 66.667</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Km = 0.5 mmol/L and S = 1.0 mmol/L: v = 100 × 1.0 ÷ 1.5 = 66.7 µmol/min, two thirds of Vmax. Doubling the substrate again takes it to 80 % — each doubling buys less than the one before.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>At S = Km the enzyme runs at 50 % and the rate is most sensitive to substrate. At 10 × Km it is at 91 % and nearly saturated; at 0.1 × Km it is at 9 % and the assay is effectively first order in substrate.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Reaction velocity</th><th>Fraction of Vmax</th><th>Substrate relative to Km</th></tr></thead><tbody><tr><td><strong>Maximum velocity Vmax</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Michaelis constant Km</strong> +10 %</td><td>−3.23 %</td><td>−3.23 %</td><td>−9.09 %</td></tr><tr><td><strong>Substrate concentration</strong> +10 %</td><td>+3.12 %</td><td>+3.13 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Substrate concentration</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Michaelis constant Km</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Maximum velocity Vmax = 50, Michaelis constant Km = 2, Substrate concentration = 2, the page reports <strong>Reaction velocity</strong> = 25 µmol/min, <strong>Fraction of Vmax</strong> = 50 %, <strong>Substrate relative to Km</strong> = 1. Substrate equal to Km gives exactly half of Vmax — the definition, as a check.</li><li>With Maximum velocity Vmax = 50, Michaelis constant Km = 2, Substrate concentration = 20, the page reports <strong>Reaction velocity</strong> = 45.455 µmol/min, <strong>Fraction of Vmax</strong> = 90.909 %, <strong>Substrate relative to Km</strong> = 10. Ten times Km reaches 90.9 % of Vmax, which is as close to saturated as most assays need.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Km and S in different units.</strong> One in millimoles and one in micromoles puts the ratio out by a thousand.</li><li><strong>Vmax read as the measured rate.</strong> The measured rate only equals Vmax at infinite substrate; everything finite runs below it.</li><li><strong>It applied to a real assay with inhibition.</strong> Competitive and non-competitive inhibitors change the apparent Km or Vmax, and this page has neither.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Reaction velocity (µmol/min), Fraction of Vmax (%), Substrate relative to Km.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Km and the substrate must share a unit, so the ratio inside the expression is dimensionless. The velocity comes back in whatever unit Vmax was entered in, and the fraction of Vmax is a percentage.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need maximum velocity Vmax and michaelis constant Km and substrate concentration. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Reaction velocity and fraction of vmax and substrate relative to km should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Maximum velocity Vmax</strong> ×10</td><td>66.667</td><td>666.667</td><td>ten times larger</td></tr><tr><td><strong>Michaelis constant Km</strong> ×10</td><td>66.667</td><td>16.667</td><td>×0.25</td></tr><tr><td><strong>Substrate concentration</strong> ×10</td><td>66.667</td><td>95.238</td><td>×1.429</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>One substrate, no inhibitors.</strong> The equation assumes a single substrate and a simple mechanism.</li><li><strong>Steady-state only.</strong> Before the first few milliseconds the enzyme is still filling up, and the equation does not apply.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Choosing an assay substrate concentration.</li></li><li><li>Checking whether a rate is substrate-limited.</li></li><li><li>Reading a Km and Vmax pair off a measured rate.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/enzyme-activity">Enzyme activity</a> <a href="/chemistry/rate-constant">Rate constant</a> <a href="/chemistry/langmuir-isotherm">Langmuir isotherm</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Michaelis-Menten calculator work out?', 'a' => <<<'TXT'
            It returns reaction velocity and fraction of Vmax and substrate relative to Km from maximum velocity Vmax and michaelis constant Km and substrate concentration. The relationship is Maximum velocity Vmax × Substrate concentration ÷ (Michaelis constant Km+Substrate concentration).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Maximum velocity Vmax (µmol/min), Michaelis constant Km (mmol/L), Substrate concentration (mmol/L). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: maximum velocity Vmax in µmol/min; michaelis constant Km in mmol/L; substrate concentration in mmol/L. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What does Km mean physically?', 'a' => 'The substrate concentration at which half the enzyme\'s active sites are occupied, which is why it is also the concentration giving half of Vmax.'],
            ['q' => 'Is a low Km good or bad?', 'a' => 'Neither — it means high affinity. A low Km enzyme saturates at a low substrate concentration, which matters when substrate is scarce.'],
        ],
        'related' => [
            ['path' => '/chemistry/enzyme-activity', 'name' => 'Enzyme activity'],
            ['path' => '/chemistry/rate-constant', 'name' => 'Rate constant'],
            ['path' => '/chemistry/langmuir-isotherm', 'name' => 'Langmuir isotherm'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

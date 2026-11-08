<?php

/**
 * Rate Constant Calculator
 * /chemistry/rate-constant
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rate Constant Calculator',
    'meta' => ['title' => 'Rate Constant Calculator: First Order Kinetics', 'description' => 'Get the first-order rate constant from an initial concentration, the concentration left after a measured time, plus the half-life that constant implies.', 'h1' => 'Rate Constant Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'c0',
                    'label' => 'Initial concentration',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '1.0',
                    'help' => 'Measured at the start of the run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'ct',
                    'label' => 'Concentration after time t',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.5',
                    'help' => 'Measured at the end of the same run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'time',
                    'label' => 'Elapsed time',
                    'type' => 'number',
                    'suffix' => 's',
                    'default' => '60',
                    'help' => 'Between the two measurements',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rate_constant',
                    'label' => 'Rate constant k',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '1/s',
                ],
                [
                    'name' => 'half_life',
                    'label' => 'Half-life',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 's',
                ],
                [
                    'name' => 'fraction_remaining',
                    'label' => 'Fraction remaining',
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
            'title' => 'Rate Constant',
            'results' => [
                'rate_constant' => 'log(c0/ct)/time',
                'half_life' => 'log(2)*time/log(c0/ct)',
                'fraction_remaining' => 'ct/c0*100',
                'c0' => 'ct*exp(rate_constant*time)',
                'ct' => 'c0*exp(-rate_constant*time)',
                'time' => 'log(c0/ct)/rate_constant',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>For a first-order reaction the concentration decays exponentially, and the rate constant is the slope of the logarithm: <strong>k = ln(C₀ ÷ Cₜ) ÷ t</strong>. The page reports k in per second, the half-life it corresponds to, and how much of the starting material remains.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A first-order rate constant is the cleanest number in kinetics: it has units of per second and it does not depend on concentration. Every drug's clearance, every radionuclide and every unimolecular decomposition is described by one.</p><p>The page reports <strong>rate constant k and half-life and fraction remaining</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Rate constant k</strong></td><td><code>ln(Initial concentration ÷ Concentration after time t) ÷ Elapsed time</code></td></tr><tr><td><strong>Half-life</strong></td><td><code>ln(2) × Elapsed time ÷ ln(Initial concentration ÷ Concentration after time t)</code></td></tr><tr><td><strong>Fraction remaining</strong></td><td><code>Concentration after time t ÷ Initial concentration × 100</code></td></tr><tr><td><strong>Initial concentration</strong></td><td><code>Concentration after time t × exp(Rate constant k × Elapsed time)</code></td></tr><tr><td><strong>Concentration after time t</strong></td><td><code>Initial concentration × exp(-Rate constant k × Elapsed time)</code></td></tr><tr><td><strong>Elapsed time</strong></td><td><code>ln(Initial concentration ÷ Concentration after time t) ÷ Rate constant k</code></td></tr></tbody></table><p><p>The logarithm of the ratio is dimensionless, so dividing by the time gives per second directly. Using logarithms to base ten instead of natural logs shifts the answer by 2.303 — the commonest error in this calculation.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports rate constant k and half-life and fraction remaining.</p><ul><li><strong>Initial concentration</strong> — in mol/L. Measured at the start of the run</li><li><strong>Concentration after time t</strong> — in mol/L. Measured at the end of the same run</li><li><strong>Elapsed time</strong> — in s. Between the two measurements</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Rate constant k</strong> — in 1/s</li><li><strong>Half-life</strong> — in s</li><li><strong>Fraction remaining</strong> — in %</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Initial concentration = 1 mol/L, Concentration after time t = 0.5 mol/L, Elapsed time = 60 s — and the results panel reads:</p><ul><li><strong>Rate constant k</strong> = <code>ln(Initial concentration ÷ Concentration after time t) ÷ Elapsed time</code> = <strong>0.012 1/s</strong></li><li><strong>Half-life</strong> = <code>ln(2) × Elapsed time ÷ ln(Initial concentration ÷ Concentration after time t)</code> = <strong>60 s</strong></li><li><strong>Fraction remaining</strong> = <code>Concentration after time t ÷ Initial concentration × 100</code> = <strong>50 %</strong></li></ul><p>With the numbers written into the formula, the first result is <code>log(1 ÷ 0.5) ÷ 60 = 0.012</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>One molar falling to half a molar in sixty seconds is exactly one half-life: k = ln 2 ÷ 60 = 0.01155 per second, which is a half-life of sixty seconds. Any pair of points on the same curve gives the same k, which is what "first order" means.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Check the units against the chemistry. A rate constant around 10⁻³ per second means a half-life near twelve minutes; one around 10⁻⁵ per second means about nineteen hours. A number that looks orders of magnitude wrong is usually a unit slip in the time box.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Rate constant k</th><th>Half-life</th><th>Fraction remaining</th></tr></thead><tbody><tr><td><strong>Initial concentration</strong> +10 %</td><td>+13.75 %</td><td>−12.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Concentration after time t</strong> +10 %</td><td>−13.75 %</td><td>+15.94 %</td><td>+10 %</td></tr><tr><td><strong>Elapsed time</strong> +10 %</td><td>−9.09 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Concentration after time t</strong>: a ten per cent move there shifts the result by about 15.9 per cent. The least sensitive is <strong>Elapsed time</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Initial concentration = 2, Concentration after time t = 1, Elapsed time = 600, the page reports <strong>Rate constant k</strong> = 0.001 1/s, <strong>Half-life</strong> = 600 s, <strong>Fraction remaining</strong> = 50 %. Two molar to one in ten minutes: k = 1.16 × 10⁻³ per second, half-life ten minutes.</li><li>With Initial concentration = 0.1, Concentration after time t = 0.01, Elapsed time = 3 600, the page reports <strong>Rate constant k</strong> = 0.0006396 1/s, <strong>Half-life</strong> = 1 083.708 s, <strong>Fraction remaining</strong> = 10 %. One decade of concentration loss in an hour: k = 6.4 × 10⁻⁴ per second, half-life eighteen minutes.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Base-ten logarithms used.</strong> ln(C₀/Cₜ) ÷ t, not log₁₀; the difference is a factor of 2.303.</li><li><strong>A reaction that is not first order.</strong> If doubling the concentration quadruples the rate, the decay is second order and this page's constant will drift with concentration.</li><li><strong>Time in the wrong unit.</strong> Sixty seconds is not sixty minutes: k comes back per second, so the time must be in seconds.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Rate constant k (1/s), Half-life (s), Fraction remaining (%).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Both concentrations must share a unit — the ratio is what matters — and the time must be in seconds for k to come back in per second. The half-life is returned in the same unit as the time box.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need initial concentration and concentration after time t and elapsed time. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Rate constant k and half-life and fraction remaining should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Initial concentration</strong> ×10</td><td>0.012</td><td>0.05</td><td>×4.322</td></tr><tr><td><strong>Concentration after time t</strong> ×10</td><td>0.012</td><td>-0.027</td><td>×-2.322</td></tr><tr><td><strong>Elapsed time</strong> ×10</td><td>0.012</td><td>0.001</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>First order only.</strong> Zero-order, second-order and Michaelis–Menten reactions all have different integrated forms and different constants.</li><li><strong>Two points only.</strong> A single pair of measurements cannot show whether the order is really one; several points on a log plot can.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Finding a rate constant from two concentration readings.</li></li><li><li>Converting a measured decay into the half-life a protocol quotes.</li></li><li><li>Checking whether a reaction is really first order.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/half-life">Half-life</a> <a href="/chemistry/arrhenius-equation">Arrhenius equation</a> <a href="/chemistry/activation-energy">Activation energy</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rate Constant calculator work out?', 'a' => <<<'TXT'
            It returns rate constant k and half-life and fraction remaining from initial concentration and concentration after time t and elapsed time. The relationship is ln(Initial concentration ÷ Concentration after time t) ÷ Elapsed time.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial concentration (mol/L), Concentration after time t (mol/L), Elapsed time (s). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: initial concentration in mol/L; concentration after time t in mol/L; elapsed time in s. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is the rate constant called k and not a rate?', 'a' => <<<'TXT'
            Because it is the rate per unit concentration. A first-order rate is k times the concentration, so k carries the per-second unit and the concentration carries the rest.
            TXT],
            ['q' => 'What units does k have for other orders?', 'a' => 'First order is per second; second order is litres per mole per second; zero order is moles per litre per second. Only the first-order case is covered here.'],
        ],
        'related' => [
            ['path' => '/chemistry/half-life', 'name' => 'Half-life'],
            ['path' => '/chemistry/arrhenius-equation', 'name' => 'Arrhenius equation'],
            ['path' => '/chemistry/activation-energy', 'name' => 'Activation energy'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

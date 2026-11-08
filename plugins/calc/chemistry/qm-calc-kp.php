<?php

/**
 * Kp Calculator
 * /chemistry/kp
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Kp Calculator',
    'meta' => ['title' => 'Kp Calculator: From Kc, R and the Temperature', 'description' => 'Convert an equilibrium constant expressed in concentrations into one expressed in partial pressures, with the (RT)^Δn factor that does it. Units shown.', 'h1' => 'Kp Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'kc',
                    'label' => 'Kc (from concentrations)',
                    'type' => 'number',
                    'default' => '4',
                    'help' => 'The equilibrium constant in mol/L terms',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'temperature',
                    'label' => 'Temperature (T)',
                    'type' => 'number',
                    'suffix' => 'K',
                    'default' => '298.15',
                    'help' => 'Kelvin',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'delta_n',
                    'label' => 'Change in moles of gas (Δn)',
                    'type' => 'number',
                    'default' => '0',
                    'help' => 'Moles of gaseous product minus gaseous reactant; 0 for a reaction with no change',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'kp',
                    'label' => 'Kp (from partial pressures)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rt_factor',
                    'label' => 'RT factor (L·atm/mol)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'kp_over_kc',
                    'label' => 'Kp ÷ Kc',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Kp',
            'results' => [
                'kp' => 'kc*pow(0.08206*temperature,delta_n)',
                'rt_factor' => '0.08206*temperature',
                'kp_over_kc' => 'pow(0.08206*temperature,delta_n)',
                'kc' => 'kp/pow(0.08206*temperature,delta_n)',
                'temperature' => 'pow(kp/kc,1/delta_n)/0.08206',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Equilibria in the gas phase can be written in concentrations or in partial pressures, and the two are related by <strong>Kp = Kc × (RT)<sup>Δn</sup></strong>, where Δn is the change in the number of moles of gas across the equation and R = 0.08206 L·atm/(mol·K).</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Gas equilibria are measured in pressures and tabulated in concentrations, and the two differ by a temperature-dependent factor. Getting the conversion right is what lets a Kc from a textbook be compared with a Kp from a pressure gauge.</p><p>The page reports <strong>kp (from partial pressures) and rT factor (L·atm/mol) and kp ÷ Kc</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Kp (from partial pressures)</strong></td><td><code>Kc (from concentrations) × (0.08206 × Temperature (T))^Change in moles of gas (Δn)</code></td></tr><tr><td><strong>RT factor (L·atm/mol)</strong></td><td><code>0.08206 × Temperature (T)</code></td></tr><tr><td><strong>Kp ÷ Kc</strong></td><td><code>(0.08206 × Temperature (T))^Change in moles of gas (Δn)</code></td></tr><tr><td><strong>Kc (from concentrations)</strong></td><td><code>Kp (from partial pressures) ÷ (0.08206 × Temperature (T))^Change in moles of gas (Δn)</code></td></tr><tr><td><strong>Temperature (T)</strong></td><td><code>(Kp (from partial pressures) ÷ Kc (from concentrations))^1 ÷ Change in moles of gas (Δn) ÷ 0.08206</code></td></tr></tbody></table><p><p>The exponent Δn counts only gases. A reaction that consumes two moles of gas and produces one has Δn = −1, and the factor becomes 1/(RT) — the direction of the correction reverses.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports kp (from partial pressures) and rT factor (L·atm/mol) and kp ÷ Kc.</p><ul><li><strong>Kc (from concentrations)</strong>. The equilibrium constant in mol/L terms</li><li><strong>Temperature (T)</strong> — in K. Kelvin</li><li><strong>Change in moles of gas (Δn)</strong>. Moles of gaseous product minus gaseous reactant; 0 for a reaction with no change</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Kp (from partial pressures)</strong></li><li><strong>RT factor (L·atm/mol)</strong></li><li><strong>Kp ÷ Kc</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Kc (from concentrations) = 4, Temperature (T) = 298.15 K, Change in moles of gas (Δn) = 0 — and the results panel reads:</p><ul><li><strong>Kp (from partial pressures)</strong> = <code>Kc (from concentrations) × (0.08206 × Temperature (T))^Change in moles of gas (Δn)</code> = <strong>4</strong></li><li><strong>RT factor (L·atm/mol)</strong> = <code>0.08206 × Temperature (T)</code> = <strong>24.466</strong></li><li><strong>Kp ÷ Kc</strong> = <code>(0.08206 × Temperature (T))^Change in moles of gas (Δn)</code> = <strong>1</strong></li></ul><p>With the numbers written into the formula, the first result is <code>4 × pow(0.08206 × 298.15,0) = 4</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>At 298.15 K the RT factor is 0.08206 × 298.15 = 24.46 L·atm/mol. With Δn = 0 the exponent vanishes and Kp equals Kc exactly, which is the check that the page is wired correctly: a reaction with the same number of gas moles on each side has the same constant in either unit.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Look at Δn first. Positive Δn means more gas on the product side and a Kp larger than Kc at room temperature — by a factor of 24 for each unit of Δn. Negative Δn does the opposite, and a large negative Δn can move Kp by many orders of magnitude.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Kp (from partial pressures)</th><th>RT factor (L·atm/mol)</th><th>Kp ÷ Kc</th></tr></thead><tbody><tr><td><strong>Kc (from concentrations)</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Temperature (T)</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Change in moles of gas (Δn)</strong> +10 %</td><td>+37.68 %</td><td>+0 %</td><td>+37.68 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Change in moles of gas (Δn)</strong>: a ten per cent move there shifts the result by about 37.7 per cent. The least sensitive is <strong>Temperature (T)</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Kc (from concentrations) = 1, Temperature (T) = 500, Change in moles of gas (Δn) = 1, the page reports <strong>Kp (from partial pressures)</strong> = 41.03, <strong>RT factor (L·atm/mol)</strong> = 41.03, <strong>Kp ÷ Kc</strong> = 41.03. At 500 K the RT factor is 41.0, so Kp is 41 times Kc.</li><li>With Kc (from concentrations) = 1, Temperature (T) = 298.15, Change in moles of gas (Δn) = -1, the page reports <strong>Kp (from partial pressures)</strong> = 0.041, <strong>RT factor (L·atm/mol)</strong> = 24.466, <strong>Kp ÷ Kc</strong> = 0.041. Δn of −1 divides by 24.46 instead of multiplying: Kp = 0.041.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Δn counted from the whole equation.</strong> Only gaseous species count; a solid product does not enter it.</li><li><strong>R in the wrong units.</strong> 8.314 is the gas constant in J/mol·K. Using it here gives a factor 101 times too large, because the pressure must be in atmospheres.</li><li><strong>Temperature in Celsius.</strong> The factor is linear in kelvin, so 25 makes it twelve times too small.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Kp (from partial pressures), RT factor (L·atm/mol), Kp ÷ Kc.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Kp is unitless in the thermodynamic sense, but the RT factor carries units of L·atm/mol: R is 0.08206 L·atm/(mol·K) precisely because pressures here are in atmospheres.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need kc (from concentrations) and temperature (T) and change in moles of gas (Δn). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Kp (from partial pressures) and rt factor (l·atm/mol) and kp ÷ kc should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Kc (from concentrations)</strong> ×10</td><td>4</td><td>40</td><td>ten times larger</td></tr><tr><td><strong>Temperature (T)</strong> ×10</td><td>4</td><td>4</td><td>unchanged</td></tr><tr><td><strong>Change in moles of gas (Δn)</strong> ×10</td><td>4</td><td>97.865</td><td>×24.466</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes ideal gases.</strong> At high pressure, fugacity replaces partial pressure and the conversion drifts.</li><li><strong>It is a single-temperature relationship.</strong> Both Kc and Kp move with temperature, each in its own way, so the conversion must be redone whenever T changes.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Comparing a tabulated Kc with a Kp measured from gas pressures.</li></li><li><li>Converting an equilibrium constant for use in a pressure-based calculation.</li></li><li><li>Seeing how much of a difference the mole-count change really makes.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/equilibrium-constant">Equilibrium constant</a> <a href="/chemistry/partial-pressure">Partial pressure</a> <a href="/chemistry/reaction-quotient">Reaction quotient</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Kp calculator work out?', 'a' => <<<'TXT'
            It returns kp (from partial pressures) and rT factor (L·atm/mol) and kp ÷ Kc from kc (from concentrations) and temperature (T) and change in moles of gas (Δn). The relationship is Kc (from concentrations) × (0.08206 × Temperature (T))^Change in moles of gas (Δn).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Kc (from concentrations), Temperature (T) (K), Change in moles of gas (Δn). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: temperature (T) in K. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'When is Kp equal to Kc?', 'a' => 'When Δn is zero — the same number of moles of gas on each side. Then (RT)⁰ = 1 and the two constants are identical.'],
            ['q' => 'Why is R 0.08206 here and 8.314 elsewhere?', 'a' => 'Because this page works in atmospheres and litres. 0.08206 L·atm/(mol·K) and 8.314 J/(mol·K) are the same constant in different units.'],
        ],
        'related' => [
            ['path' => '/chemistry/equilibrium-constant', 'name' => 'Equilibrium constant'],
            ['path' => '/chemistry/partial-pressure', 'name' => 'Partial pressure'],
            ['path' => '/chemistry/reaction-quotient', 'name' => 'Reaction quotient'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

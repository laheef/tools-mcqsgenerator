<?php

/**
 * Entropy Change Calculator
 * /chemistry/entropy
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Entropy Change Calculator',
    'meta' => ['title' => 'Entropy Change Calculator: Heat Over Temperature', 'description' => 'Work out the entropy change of a process from the reversible heat it exchanges and the temperature at which it happens, in J/K and per mole. Units shown.', 'h1' => 'Entropy Change Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'heat',
                    'label' => 'Heat exchanged (q)',
                    'type' => 'number',
                    'suffix' => 'J',
                    'default' => '6010',
                    'help' => 'Positive for heat absorbed by the system, negative for heat released',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'temperature',
                    'label' => 'Temperature (T)',
                    'type' => 'number',
                    'suffix' => 'K',
                    'default' => '373.15',
                    'help' => 'The temperature at which it is exchanged',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'moles',
                    'label' => 'Amount of substance (n)',
                    'type' => 'number',
                    'suffix' => 'mol',
                    'default' => '1',
                    'help' => 'Moles the heat refers to',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'delta_s',
                    'label' => 'Entropy change (ΔS)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'J/K',
                ],
                [
                    'name' => 'delta_s_molar',
                    'label' => 'Molar entropy change',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'J/mol/K',
                ],
                [
                    'name' => 'delta_s_kj',
                    'label' => 'Entropy change',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kJ/K',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Entropy Change',
            'results' => [
                'delta_s' => 'heat/temperature',
                'delta_s_molar' => 'heat/temperature/moles',
                'delta_s_kj' => 'heat/temperature/1000',
                'heat' => 'delta_s*temperature',
                'temperature' => 'heat/delta_s',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>For a reversible process the entropy change is the heat exchanged divided by the temperature at which it is exchanged: <strong>ΔS = q<sub>rev</sub> ÷ T</strong>. This page computes ΔS from a measured heat and temperature, and the molar entropy change from the moles involved.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Entropy measures how the energy of a system is spread out, and the heat over temperature definition is the one that can be measured. Everything else — the entropy of vaporisation, the third-law values in tables, the TΔS term in the Gibbs energy — is built on it.</p><p>The page reports <strong>entropy change (J/K) and molar entropy change and entropy change (kJ/K)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Entropy change (J per K)</strong></td><td><code>Heat exchanged (q) ÷ Temperature (T)</code></td></tr><tr><td><strong>Molar entropy change</strong></td><td><code>Heat exchanged (q) ÷ Temperature (T) ÷ Amount of substance (n)</code></td></tr><tr><td><strong>Entropy change (kJ per K)</strong></td><td><code>Heat exchanged (q) ÷ Temperature (T) ÷ 1000</code></td></tr><tr><td><strong>Heat exchanged (q)</strong></td><td><code>Entropy change (J per K) × Temperature (T)</code></td></tr><tr><td><strong>Temperature (T)</strong></td><td><code>Heat exchanged (q) ÷ Entropy change (J per K)</code></td></tr></tbody></table><p><p>The division by temperature is what makes entropy a state function: the same heat exchanged at a higher temperature changes the entropy less, because the same energy is spread over more available states.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports entropy change (J/K) and molar entropy change and entropy change (kJ/K).</p><ul><li><strong>Heat exchanged (q)</strong> — in J. Positive for heat absorbed by the system, negative for heat released</li><li><strong>Temperature (T)</strong> — in K. The temperature at which it is exchanged</li><li><strong>Amount of substance (n)</strong> — in mol. Moles the heat refers to</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Entropy change (ΔS)</strong> — in J/K</li><li><strong>Molar entropy change</strong> — in J/mol/K</li><li><strong>Entropy change</strong> — in kJ/K</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Heat exchanged (q) = 6 010 J, Temperature (T) = 373.15 K, Amount of substance (n) = 1 mol — and the results panel reads:</p><ul><li><strong>Entropy change (ΔS)</strong> = <code>Heat exchanged (q) ÷ Temperature (T)</code> = <strong>16.106 J/K</strong></li><li><strong>Molar entropy change</strong> = <code>Heat exchanged (q) ÷ Temperature (T) ÷ Amount of substance (n)</code> = <strong>16.106 J/mol/K</strong></li><li><strong>Entropy change</strong> = <code>Heat exchanged (q) ÷ Temperature (T) ÷ 1000</code> = <strong>0.016 kJ/K</strong></li></ul><p>With the numbers written into the formula, the first result is <code>6 010 ÷ 373.15 = 16.106</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Vaporising one mole of water takes about 40.7 kJ, and at the normal boiling point of 373.15 K that gives an entropy of vaporisation of 109 J/mol·K — the tabulated value, recovered from two numbers and one division.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Compare the molar result with what the process should cost. Melting ice takes 6.01 kJ/mol at 273.15 K, giving 22.0 J/mol·K — much smaller than vaporisation, because a liquid is only slightly more disordered than a solid. Vaporisation is the expensive step in every phase change.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Entropy change (ΔS)</th><th>Molar entropy change</th><th>Entropy change</th></tr></thead><tbody><tr><td><strong>Heat exchanged (q)</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Temperature (T)</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Amount of substance (n)</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Heat exchanged (q)</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Amount of substance (n)</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Heat exchanged (q) = 6 010, Temperature (T) = 273.15, Amount of substance (n) = 1, the page reports <strong>Entropy change (ΔS)</strong> = 22.003 J/K, <strong>Molar entropy change</strong> = 22.003 J/mol/K, <strong>Entropy change</strong> = 0.022 kJ/K. The enthalpy of fusion of ice, divided by the melting point: 22.0 J/mol·K.</li><li>With Heat exchanged (q) = -40 700, Temperature (T) = 373.15, Amount of substance (n) = 1, the page reports <strong>Entropy change (ΔS)</strong> = -109.071 J/K, <strong>Molar entropy change</strong> = -109.071 J/mol/K, <strong>Entropy change</strong> = -0.109 kJ/K. Condensation, the reverse of vaporisation: −109 J/mol·K.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Heat in kilojoules.</strong> The formula divides joules; a kJ figure gives an entropy a thousand times too small.</li><li><strong>Heat over the wrong temperature.</strong> The temperature must be the one at which the heat is exchanged, not room temperature.</li><li><strong>Irreversible processes treated as reversible.</strong> q/T gives ΔS only for a reversible path; for a real one, use tabulated entropies instead.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Entropy change (ΔS) (J/K), Molar entropy change (J/mol/K), Entropy change (kJ/K).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>J/K for the whole system, J/mol·K for one mole of substance. The third result in kJ/K exists because the Gibbs energy equation wants to subtract it from an enthalpy in kJ.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need heat exchanged (q) and temperature (T) and amount of substance (n). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Entropy change (j/k) and molar entropy change and entropy change (kj/k) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Heat exchanged (q)</strong> ×10</td><td>16.106</td><td>161.061</td><td>ten times larger</td></tr><tr><td><strong>Temperature (T)</strong> ×10</td><td>16.106</td><td>1.611</td><td>ten times smaller</td></tr><tr><td><strong>Amount of substance (n)</strong> ×10</td><td>16.106</td><td>16.106</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It is reversible-path only.</strong> Measured heat in a real process is not q_rev, and the entropy computed from it is not the system's entropy change.</li><li><strong>It needs a defined system.</strong> Heat into the surroundings has the opposite sign, and the two must not be mixed.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Finding an entropy of vaporisation or fusion from calorimetry.</li></li><li><li>Supplying the ΔS a Gibbs energy calculation needs.</li></li><li><li>Showing why vaporisation costs so much entropy.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/gibbs-energy">Gibbs energy</a> <a href="/chemistry/equilibrium-constant">Equilibrium constant</a> <a href="/chemistry/heat-of-combustion">Heat of combustion</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Entropy Change calculator work out?', 'a' => <<<'TXT'
            It returns entropy change (J/K) and molar entropy change and entropy change (kJ/K) from heat exchanged (q) and temperature (T) and amount of substance (n). The relationship is Heat exchanged (q) ÷ Temperature (T).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Heat exchanged (q) (J), Temperature (T) (K), Amount of substance (n) (mol). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: heat exchanged (q) in J; temperature (T) in K; amount of substance (n) in mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Can entropy be negative?', 'a' => <<<'TXT'
            Yes — the entropy of the system falls when heat leaves it, as in condensation or freezing. The entropy of the universe still rises, which is what the second law requires.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/gibbs-energy', 'name' => 'Gibbs energy'],
            ['path' => '/chemistry/equilibrium-constant', 'name' => 'Equilibrium constant'],
            ['path' => '/chemistry/heat-of-combustion', 'name' => 'Heat of combustion'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

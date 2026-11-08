<?php

/**
 * Gibbs Energy Calculator
 * /chemistry/gibbs-energy
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Gibbs Energy Calculator',
    'meta' => ['title' => 'Gibbs Energy Calculator: ΔG = ΔH − TΔS Tool', 'description' => 'Work out the free energy change of a reaction from its enthalpy, entropy and temperature, and the temperature at which it turns. The formula is shown.', 'h1' => 'Gibbs Energy Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'enthalpy',
                    'label' => 'Enthalpy change (ΔH)',
                    'type' => 'number',
                    'suffix' => 'kJ/mol',
                    'default' => '-92.2',
                    'help' => 'From a table or a calorimetry experiment; negative for an exothermic reaction',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'entropy',
                    'label' => 'Entropy change (ΔS)',
                    'type' => 'number',
                    'suffix' => 'J/mol/K',
                    'default' => '-198.7',
                    'help' => 'Note the units: joules, not kilojoules',
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
                    'name' => 'delta_g',
                    'label' => 'Gibbs energy change (ΔG)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kJ/mol',
                ],
                [
                    'name' => 't_switch',
                    'label' => 'Temperature at which ΔG = 0',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'K',
                ],
                [
                    'name' => 'entropy_term',
                    'label' => 'Entropy contribution (TΔS)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kJ/mol',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Gibbs Energy',
            'results' => [
                'delta_g' => 'enthalpy-temperature*entropy/1000',
                't_switch' => 'enthalpy*1000/entropy',
                'entropy_term' => 'temperature*entropy/1000',
                'enthalpy' => 'delta_g+temperature*entropy/1000',
                'entropy' => '(enthalpy-delta_g)*1000/temperature',
                'temperature' => '(enthalpy-delta_g)*1000/entropy',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Whether a reaction is spontaneous at a given temperature is decided by the Gibbs energy: <strong>ΔG = ΔH − TΔS</strong>. Negative ΔG means the forward reaction is spontaneous; positive means it is not. This page computes ΔG and the temperature at which it changes sign.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The Gibbs energy is the accountant of chemistry: it weighs the heat released against the disorder created and returns a single number that decides direction. Everything about why some reactions run cold and some only run hot comes out of that balance.</p><p>The page reports <strong>gibbs energy change (ΔG) and temperature at which ΔG = 0 and entropy contribution (TΔS)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Gibbs energy change (ΔG)</strong></td><td><code>Enthalpy change (ΔH)-Temperature (T) × Entropy change (ΔS) ÷ 1000</code></td></tr><tr><td><strong>Temperature at which ΔG = 0</strong></td><td><code>Enthalpy change (ΔH) × 1000 ÷ Entropy change (ΔS)</code></td></tr><tr><td><strong>Entropy contribution (TΔS)</strong></td><td><code>Temperature (T) × Entropy change (ΔS) ÷ 1000</code></td></tr><tr><td><strong>Enthalpy change (ΔH)</strong></td><td><code>Gibbs energy change (ΔG)+Temperature (T) × Entropy change (ΔS) ÷ 1000</code></td></tr><tr><td><strong>Entropy change (ΔS)</strong></td><td><code>(Enthalpy change (ΔH)-Gibbs energy change (ΔG)) × 1000 ÷ Temperature (T)</code></td></tr><tr><td><strong>Temperature (T)</strong></td><td><code>(Enthalpy change (ΔH)-Gibbs energy change (ΔG)) × 1000 ÷ Entropy change (ΔS)</code></td></tr></tbody></table><p><p>The unit mismatch is deliberate and is the commonest source of error: enthalpy is tabulated in kJ/mol and entropy in J/mol·K, so the entropy term is divided by a thousand before it is subtracted.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports gibbs energy change (ΔG) and temperature at which ΔG = 0 and entropy contribution (TΔS).</p><ul><li><strong>Enthalpy change (ΔH)</strong> — in kJ/mol. From a table or a calorimetry experiment; negative for an exothermic reaction</li><li><strong>Entropy change (ΔS)</strong> — in J/mol/K. Note the units: joules, not kilojoules</li><li><strong>Temperature (T)</strong> — in K. Kelvin</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Gibbs energy change (ΔG)</strong> — in kJ/mol</li><li><strong>Temperature at which ΔG = 0</strong> — in K</li><li><strong>Entropy contribution (TΔS)</strong> — in kJ/mol</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Enthalpy change (ΔH) = -92.2 kJ/mol, Entropy change (ΔS) = -198.7 J/mol/K, Temperature (T) = 298.15 K — and the results panel reads:</p><ul><li><strong>Gibbs energy change (ΔG)</strong> = <code>Enthalpy change (ΔH)-Temperature (T) × Entropy change (ΔS) ÷ 1000</code> = <strong>-32.958 kJ/mol</strong></li><li><strong>Temperature at which ΔG = 0</strong> = <code>Enthalpy change (ΔH) × 1000 ÷ Entropy change (ΔS)</code> = <strong>464.016 K</strong></li><li><strong>Entropy contribution (TΔS)</strong> = <code>Temperature (T) × Entropy change (ΔS) ÷ 1000</code> = <strong>-59.242 kJ/mol</strong></li></ul><p>With the numbers written into the formula, the first result is <code>-92.2-298.15 × -198.7 ÷ 1000 = -32.958</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>The combustion of hydrogen has ΔH = −92.2 kJ/mol and ΔS = −198.7 J/mol·K at 298.15 K. The entropy term is −59.2 kJ/mol, so ΔG = −92.2 + 59.2 = −33.0 kJ/mol — spontaneous, but only because the enthalpy term wins. The switch temperature, where ΔG reaches zero, is 464 K.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the two contributions side by side. If |TΔS| is much smaller than |ΔH|, the reaction is enthalpy-driven and roughly temperature-insensitive; if they nearly cancel, the reaction is finely balanced and a modest temperature change flips it. A switch temperature below the working range means the reaction is spontaneous throughout it.</p></p><table class="calc-table"><thead><tr><th>Range</th><th>What it means</th></tr></thead><tbody><tr><td><strong>ΔH negative, ΔS positive</strong></td><td>Spontaneous at every temperature — rare and welcome.</td></tr><tr><td><strong>ΔH negative, ΔS negative</strong></td><td>Spontaneous below the switch temperature, not above.</td></tr><tr><td><strong>ΔH positive, ΔS positive</strong></td><td>Spontaneous above the switch temperature — the entropy-driven case.</td></tr><tr><td><strong>ΔH positive, ΔS negative</strong></td><td>Never spontaneous as written.</td></tr></tbody></table>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Gibbs energy change (ΔG)</th><th>Temperature at which ΔG = 0</th><th>Entropy contribution (TΔS)</th></tr></thead><tbody><tr><td><strong>Enthalpy change (ΔH)</strong> +10 %</td><td>−27.98 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Entropy change (ΔS)</strong> +10 %</td><td>+17.98 %</td><td>−9.09 %</td><td>−10 %</td></tr><tr><td><strong>Temperature (T)</strong> +10 %</td><td>+17.98 %</td><td>+0 %</td><td>−10 %</td></tr></tbody></table><p><p>Temperature acts only on the entropy term, so a change of 10 K moves ΔG by 10 × ΔS — small for a small entropy change and decisive for a large one.</p></p><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Enthalpy change (ΔH)</strong>: a ten per cent move there shifts the result by about 28 per cent. The least sensitive is <strong>Temperature (T)</strong>, at 18 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Enthalpy change (ΔH) = 0, Entropy change (ΔS) = 100, Temperature (T) = 300, the page reports <strong>Gibbs energy change (ΔG)</strong> = -30 kJ/mol, <strong>Temperature at which ΔG = 0</strong> = 0 K, <strong>Entropy contribution (TΔS)</strong> = 30 kJ/mol. A purely entropic process: ΔG = −30 kJ/mol at 300 K.</li><li>With Enthalpy change (ΔH) = 50, Entropy change (ΔS) = 100, Temperature (T) = 400, the page reports <strong>Gibbs energy change (ΔG)</strong> = 10 kJ/mol, <strong>Temperature at which ΔG = 0</strong> = 500 K, <strong>Entropy contribution (TΔS)</strong> = 40 kJ/mol. Above the switch temperature of 500 K the reaction is still not spontaneous: ΔG = +10 kJ/mol.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Entropy entered in kJ.</strong> A factor of a thousand error that makes the entropy term invisible and the answer look believable.</li><li><strong>ΔG° used for a real mixture.</strong> The tabulated standard value applies at 1 mol/L; the actual ΔG adds RT ln Q.</li><li><strong>Switch temperature treated as applicable always.</strong> ΔH and ΔS both drift with temperature, so the linear extrapolation is only good over a modest range.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Gibbs energy change (ΔG) (kJ/mol), Temperature at which ΔG = 0 (K), Entropy contribution (TΔS) (kJ/mol).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>ΔG and ΔH are in kJ/mol, ΔS in J/mol·K, and T in kelvin. Everything in the formula is per mole of reaction as written, so a doubled equation doubles all three quantities.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need enthalpy change (ΔH) and entropy change (ΔS) and temperature (T). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Gibbs energy change (δg) and temperature at which δg = 0 and entropy contribution (tδs) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Enthalpy change (ΔH)</strong> ×10</td><td>-32.958</td><td>-862.758</td><td>×26.178</td></tr><tr><td><strong>Entropy change (ΔS)</strong> ×10</td><td>-32.958</td><td>500.224</td><td>×-15.178</td></tr><tr><td><strong>Temperature (T)</strong> ×10</td><td>-32.958</td><td>500.224</td><td>×-15.178</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It is a thermodynamic answer, not a kinetic one.</strong> A reaction with ΔG of −100 kJ/mol may still be too slow to observe at room temperature.</li><li><strong>It assumes standard conditions.</strong> The concentrations in a real flask shift ΔG by RT ln Q, which can be many kilojoules.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Deciding whether a proposed route will go at the temperature available.</li></li><li><li>Explaining why a reaction needs heating to start.</li></li><li><li>Choosing between two routes on thermodynamic grounds.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/entropy">Entropy</a> <a href="/chemistry/equilibrium-constant">Equilibrium constant</a> <a href="/chemistry/reaction-quotient">Reaction quotient</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Gibbs Energy calculator work out?', 'a' => <<<'TXT'
            It returns gibbs energy change (ΔG) and temperature at which ΔG = 0 and entropy contribution (TΔS) from enthalpy change (ΔH) and entropy change (ΔS) and temperature (T). The relationship is Enthalpy change (ΔH)-Temperature (T) × Entropy change (ΔS) ÷ 1000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Enthalpy change (ΔH) (kJ/mol), Entropy change (ΔS) (J/mol/K), Temperature (T) (K). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: enthalpy change (ΔH) in kJ/mol; entropy change (ΔS) in J/mol/K; temperature (T) in K. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why can a reaction with positive ΔS be spontaneous even when it absorbs heat?', 'a' => 'Because the entropy term −TΔS is negative when ΔS is positive, and above the switch temperature it outweighs the positive enthalpy change.'],
            ['q' => 'What does the switch temperature mean?', 'a' => 'It is the temperature at which ΔG = 0, so the reaction is at equilibrium under standard conditions. Below it one direction dominates, above it the other.'],
        ],
        'related' => [
            ['path' => '/chemistry/entropy', 'name' => 'Entropy'],
            ['path' => '/chemistry/equilibrium-constant', 'name' => 'Equilibrium constant'],
            ['path' => '/chemistry/reaction-quotient', 'name' => 'Reaction quotient'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

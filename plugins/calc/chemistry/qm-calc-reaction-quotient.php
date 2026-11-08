<?php

/**
 * Reaction Quotient Calculator
 * /chemistry/reaction-quotient
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Reaction Quotient Calculator',
    'meta' => ['title' => 'Reaction Quotient Calculator: Q, K and ΔG Values', 'description' => 'Compute the reaction quotient from the concentrations you have now, compare it with K, and read the free energy that decides which way it goes. Units shown.', 'h1' => 'Reaction Quotient Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'product_conc',
                    'label' => 'Product concentration now',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.1',
                    'help' => 'As the mixture stands',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'reactant_conc',
                    'label' => 'Reactant concentration now',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.5',
                    'help' => 'As the mixture stands',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'k',
                    'label' => 'Equilibrium constant (K)',
                    'type' => 'number',
                    'default' => '4',
                    'help' => 'For the reaction, at this temperature',
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
                    'name' => 'q',
                    'label' => 'Reaction quotient (Q)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'delta_g',
                    'label' => 'Free energy change (ΔG)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kJ/mol',
                ],
                [
                    'name' => 'q_over_k',
                    'label' => 'Q ÷ K',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Reaction Quotient',
            'results' => [
                'q' => 'product_conc/reactant_conc',
                'delta_g' => '8.314*temperature*log((product_conc/reactant_conc)/k)/1000',
                'q_over_k' => 'product_conc/reactant_conc/k',
                'product_conc' => 'k*exp(delta_g*1000/(8.314*temperature))*reactant_conc',
                'reactant_conc' => 'product_conc/(k*exp(delta_g*1000/(8.314*temperature)))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>The reaction quotient is the equilibrium expression evaluated with whatever concentrations are present right now: <strong>Q = [products]ⁿ ÷ [reactants]ᵐ</strong>. Comparing Q with K gives the direction, and <strong>ΔG = RT ln(Q ÷ K)</strong> gives the driving force.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>K tells you where a reaction would settle; Q tells you where it is. The ratio of the two is the sign of the free energy change, which is the only thing that decides whether the forward or the reverse reaction is spontaneous at this instant.</p><p>The page reports <strong>reaction quotient (Q) and free energy change (ΔG) and q ÷ K</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Reaction quotient (Q)</strong></td><td><code>Product concentration now ÷ Reactant concentration now</code></td></tr><tr><td><strong>Free energy change (ΔG)</strong></td><td><code>8.314 × Temperature (T) × ln((Product concentration now ÷ Reactant concentration now) ÷ Equilibrium constant (K)) ÷ 1000</code></td></tr><tr><td><strong>Q ÷ K</strong></td><td><code>Product concentration now ÷ Reactant concentration now ÷ Equilibrium constant (K)</code></td></tr><tr><td><strong>Product concentration now</strong></td><td><code>Equilibrium constant (K) × exp(Free energy change (ΔG) × 1000 ÷ (8.314 × Temperature (T))) × Reactant concentration now</code></td></tr><tr><td><strong>Reactant concentration now</strong></td><td><code>Product concentration now ÷ (Equilibrium constant (K) × exp(Free energy change (ΔG) × 1000 ÷ (8.314 × Temperature (T))))</code></td></tr></tbody></table><p><p>At equilibrium Q equals K, the logarithm vanishes and ΔG is zero — the statement of equilibrium written as an equation. Away from it, the sign of ΔG follows the sign of ln(Q ÷ K), which is the same as whether Q is above or below K.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports reaction quotient (Q) and free energy change (ΔG) and q ÷ K.</p><ul><li><strong>Product concentration now</strong> — in mol/L. As the mixture stands</li><li><strong>Reactant concentration now</strong> — in mol/L. As the mixture stands</li><li><strong>Equilibrium constant (K)</strong>. For the reaction, at this temperature</li><li><strong>Temperature (T)</strong> — in K. Kelvin</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Reaction quotient (Q)</strong></li><li><strong>Free energy change (ΔG)</strong> — in kJ/mol</li><li><strong>Q ÷ K</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Product concentration now = 0.1 mol/L, Reactant concentration now = 0.5 mol/L, Equilibrium constant (K) = 4, Temperature (T) = 298.15 K — and the results panel reads:</p><ul><li><strong>Reaction quotient (Q)</strong> = <code>Product concentration now ÷ Reactant concentration now</code> = <strong>0.2</strong></li><li><strong>Free energy change (ΔG)</strong> = <code>8.314 × Temperature (T) × ln((Product concentration now ÷ Reactant concentration now) ÷ Equilibrium constant (K)) ÷ 1000</code> = <strong>-7.426 kJ/mol</strong></li><li><strong>Q ÷ K</strong> = <code>Product concentration now ÷ Reactant concentration now ÷ Equilibrium constant (K)</code> = <strong>0.05</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.1 ÷ 0.5 = 0.2</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>With 0.1 mol/L of product, 0.5 mol/L of reactant and K = 4, Q = 0.2 — well below K. The logarithm of 0.05 is −3.00, so ΔG = 8.314 × 298.15 × (−3.00) = −7.43 kJ/mol: the forward reaction is spontaneous and the mixture will make more product.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the sign, then the size. A ΔG of −7 kJ/mol is a mild push; −40 kJ/mol is a reaction that will go. Exactly zero means the mixture is already at equilibrium, and no net change will occur however long it is left.</p></p><table class="calc-table"><thead><tr><th>Range</th><th>What it means</th></tr></thead><tbody><tr><td><strong>Q below K</strong></td><td>ΔG negative: the forward reaction is spontaneous.</td></tr><tr><td><strong>Q equal to K</strong></td><td>ΔG zero: the mixture is at equilibrium.</td></tr><tr><td><strong>Q above K</strong></td><td>ΔG positive: the reverse reaction is spontaneous.</td></tr></tbody></table>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Reaction quotient (Q)</th><th>Free energy change (ΔG)</th><th>Q ÷ K</th></tr></thead><tbody><tr><td><strong>Product concentration now</strong> +10 %</td><td>+10 %</td><td>+3.18 %</td><td>+10 %</td></tr><tr><td><strong>Reactant concentration now</strong> +10 %</td><td>−9.09 %</td><td>−3.18 %</td><td>−9.09 %</td></tr><tr><td><strong>Equilibrium constant (K)</strong> +10 %</td><td>+0 %</td><td>−3.18 %</td><td>−9.09 %</td></tr><tr><td><strong>Temperature (T)</strong> +10 %</td><td>+0 %</td><td>−10 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Product concentration now</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Equilibrium constant (K)</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Product concentration now = 2, Reactant concentration now = 0.5, Equilibrium constant (K) = 4, Temperature (T) = 298.15, the page reports <strong>Reaction quotient (Q)</strong> = 4, <strong>Free energy change (ΔG)</strong> = 0 kJ/mol, <strong>Q ÷ K</strong> = 1. Q = 4 equals K, so ΔG is exactly 0 — an equilibrium mixture.</li><li>With Product concentration now = 4, Reactant concentration now = 0.5, Equilibrium constant (K) = 4, Temperature (T) = 298.15, the page reports <strong>Reaction quotient (Q)</strong> = 8, <strong>Free energy change (ΔG)</strong> = 1.718 kJ/mol, <strong>Q ÷ K</strong> = 2. Q = 8 is twice K: ΔG = +1.72 kJ/mol, and the reaction runs backwards.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Q computed with the wrong powers.</strong> The coefficients of the balanced equation are the exponents, exactly as in K.</li><li><strong>Solids and pure liquids included.</strong> Their activity is 1 and they are left out of both Q and K.</li><li><strong>K from a different temperature.</strong> K is temperature-dependent; pairing a room-temperature K with a hot Q gives a meaningless ΔG.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Reaction quotient (Q), Free energy change (ΔG) (kJ/mol), Q ÷ K.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Q is unitless, and so is the ratio Q ÷ K. ΔG is reported in kJ/mol, the unit thermodynamic tables use.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need product concentration now and reactant concentration now and equilibrium constant (K) and temperature (T). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Reaction quotient (q) and free energy change (δg) and q ÷ k should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Product concentration now</strong> ×10</td><td>0.2</td><td>2</td><td>ten times larger</td></tr><tr><td><strong>Reactant concentration now</strong> ×10</td><td>0.2</td><td>0.02</td><td>ten times smaller</td></tr><tr><td><strong>Equilibrium constant (K)</strong> ×10</td><td>0.2</td><td>0.2</td><td>unchanged</td></tr><tr><td><strong>Temperature (T)</strong> ×10</td><td>0.2</td><td>0.2</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It says nothing about rate.</strong> A reaction can be strongly spontaneous and still immeasurably slow; that is what a catalyst changes.</li><li><strong>It uses concentrations, not activities.</strong> In non-ideal mixtures the real driving force differs from the one computed here.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Predicting which way a mixture will shift.</li></li><li><li>Checking whether a reaction has reached equilibrium.</li></li><li><li>Working out how far from equilibrium a starting mixture is.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/equilibrium-constant">Equilibrium constant</a> <a href="/chemistry/gibbs-energy">Gibbs energy</a> <a href="/chemistry/kp">Kp</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Reaction Quotient calculator work out?', 'a' => <<<'TXT'
            It returns reaction quotient (Q) and free energy change (ΔG) and q ÷ K from product concentration now and reactant concentration now and equilibrium constant (K) and temperature (T). The relationship is Product concentration now ÷ Reactant concentration now.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Product concentration now (mol/L), Reactant concentration now (mol/L), Equilibrium constant (K), Temperature (T) (K). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: product concentration now in mol/L; reactant concentration now in mol/L; temperature (T) in K. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is the difference between Q and K?', 'a' => <<<'TXT'
            They are the same expression. K is its value at equilibrium; Q is its value at any other moment. Comparing them is how you know which way the reaction will move.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/equilibrium-constant', 'name' => 'Equilibrium constant'],
            ['path' => '/chemistry/gibbs-energy', 'name' => 'Gibbs energy'],
            ['path' => '/chemistry/kp', 'name' => 'Kp'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Equilibrium Constant Calculator
 * /chemistry/equilibrium-constant
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Equilibrium Constant Calculator',
    'meta' => ['title' => 'Equilibrium Constant Calculator: K and Examples', 'description' => 'Work out the equilibrium constant from product and reactant concentrations, and the standard free energy change it implies at a stated temperature. Units shown.', 'h1' => 'Equilibrium Constant Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'product_conc',
                    'label' => 'Product concentration at equilibrium',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.8',
                    'help' => 'Total of the products on the right of the equation',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'product_coeff',
                    'label' => 'Product coefficient',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'The exponent in the equilibrium expression',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'reactant_conc',
                    'label' => 'Reactant concentration at equilibrium',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.2',
                    'help' => 'Total of the reactants on the left',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'reactant_coeff',
                    'label' => 'Reactant coefficient',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'The exponent in the equilibrium expression',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'temperature',
                    'label' => 'Temperature (T)',
                    'type' => 'number',
                    'suffix' => 'K',
                    'default' => '298.15',
                    'help' => 'Kelvin: add 273.15 to a Celsius reading',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'k',
                    'label' => 'Equilibrium constant (K)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gibbs_standard',
                    'label' => 'Standard free energy change (ΔG°)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kJ/mol',
                ],
                [
                    'name' => 'gibbs_standard_j',
                    'label' => 'Standard free energy change',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'J/mol',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Equilibrium Constant',
            'results' => ['k' => 'pow(product_conc,product_coeff)/pow(reactant_conc,reactant_coeff)', 'gibbs_standard' => '-8.314*temperature*log(pow(product_conc,product_coeff)/pow(reactant_conc,reactant_coeff))/1000', 'gibbs_standard_j' => '-8.314*temperature*log(pow(product_conc,product_coeff)/pow(reactant_conc,reactant_coeff))', 'product_conc' => 'pow(reactant_conc,reactant_coeff/product_coeff)*pow(exp(-gibbs_standard*1000/(8.314*temperature)),1/product_coeff)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>For a reaction at equilibrium the ratio of product concentrations to reactant concentrations, each raised to its coefficient, is a constant: <strong>K = [products]ⁿ ÷ [reactants]ᵐ</strong>. This page computes K from the concentrations and converts it into the standard free energy change, <strong>ΔG° = −RT ln K</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>K is the one number that says where a reaction sits when it has stopped changing. It is independent of the starting amounts, which is why it can be tabulated and why it can be compared across experiments that began with completely different mixtures.</p><p>The page reports <strong>equilibrium constant (K) and standard free energy change (kJ/mol) and standard free energy change (J/mol)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Equilibrium constant (K)</strong></td><td><code>(Product concentration at equilibrium)^Product coefficient ÷ (Reactant concentration at equilibrium)^Reactant coefficient</code></td></tr><tr><td><strong>Standard free energy change (kJ per mol)</strong></td><td><code>-8.314 × Temperature (T) × ln((Product concentration at equilibrium)^Product coefficient ÷ (Reactant concentration at equilibrium)^Reactant coefficient) ÷ 1000</code></td></tr><tr><td><strong>Standard free energy change (J per mol)</strong></td><td><code>-8.314 × Temperature (T) × ln((Product concentration at equilibrium)^Product coefficient ÷ (Reactant concentration at equilibrium)^Reactant coefficient)</code></td></tr><tr><td><strong>Product concentration at equilibrium</strong></td><td><code>(Reactant concentration at equilibrium)^Reactant coefficient ÷ Product coefficient × pow(exp(-Standard free energy change (kJ per mol) × 1000 ÷ (8.314 × Temperature (T))),1 ÷ Product coefficient)</code></td></tr></tbody></table><p><p>ΔG° = −RT ln K is the bridge between the thermodynamic tables and the concentration ratio. A K above 1 gives a negative ΔG°, meaning the reaction is product-favoured under standard conditions; a K below 1 gives a positive one.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports equilibrium constant (K) and standard free energy change (kJ/mol) and standard free energy change (J/mol).</p><ul><li><strong>Product concentration at equilibrium</strong> — in mol/L. Total of the products on the right of the equation</li><li><strong>Product coefficient</strong>. The exponent in the equilibrium expression</li><li><strong>Reactant concentration at equilibrium</strong> — in mol/L. Total of the reactants on the left</li><li><strong>Reactant coefficient</strong>. The exponent in the equilibrium expression</li><li><strong>Temperature (T)</strong> — in K. Kelvin: add 273.15 to a Celsius reading</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Equilibrium constant (K)</strong></li><li><strong>Standard free energy change (ΔG°)</strong> — in kJ/mol</li><li><strong>Standard free energy change</strong> — in J/mol</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Product concentration at equilibrium = 0.8 mol/L, Product coefficient = 1, Reactant concentration at equilibrium = 0.2 mol/L, Reactant coefficient = 1, Temperature (T) = 298.15 K — and the results panel reads:</p><ul><li><strong>Equilibrium constant (K)</strong> = <code>(Product concentration at equilibrium)^Product coefficient ÷ (Reactant concentration at equilibrium)^Reactant coefficient</code> = <strong>4</strong></li><li><strong>Standard free energy change (ΔG°)</strong> = <code>-8.314 × Temperature (T) × ln((Product concentration at equilibrium)^Product coefficient ÷ (Reactant concentration at equilibrium)^Reactant coefficient) ÷ 1000</code> = <strong>-3.436 kJ/mol</strong></li><li><strong>Standard free energy change</strong> = <code>-8.314 × Temperature (T) × ln((Product concentration at equilibrium)^Product coefficient ÷ (Reactant concentration at equilibrium)^Reactant coefficient)</code> = <strong>-3 436.373 J/mol</strong></li></ul><p>With the numbers written into the formula, the first result is <code>pow(0.8,1) ÷ pow(0.2,1) = 4</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>With 0.8 mol/L of product and 0.2 mol/L of reactant, both to the first power, K = 4. The standard free energy change at 298.15 K is −8.314 × 298.15 × ln 4 = −3.44 kJ/mol, comfortably negative — a reaction that sits to the right but not overwhelmingly so.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read K on a logarithmic scale, not a linear one. K = 10 and K = 0.1 are equally far from equilibrium, in opposite directions; K = 1 × 10⁵ and K = 1 × 10⁻⁵ differ by a factor of 10¹⁰. Dividing a tenfold change into the ΔG° result gives 5.7 kJ/mol at room temperature.</p></p><table class="calc-table"><thead><tr><th>Range</th><th>What it means</th></tr></thead><tbody><tr><td><strong>K above 10³</strong></td><td>Product-favoured: effectively complete for most practical purposes.</td></tr><tr><td><strong>K between 0.1 and 10</strong></td><td>A genuinely balanced equilibrium; both sides present.</td></tr><tr><td><strong>K below 10⁻³</strong></td><td>Reactant-favoured: very little product at equilibrium.</td></tr></tbody></table>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Equilibrium constant (K)</th><th>Standard free energy change (ΔG°)</th><th>Standard free energy change</th></tr></thead><tbody><tr><td><strong>Product concentration at equilibrium</strong> +10 %</td><td>+10 %</td><td>−6.88 %</td><td>−6.88 %</td></tr><tr><td><strong>Product coefficient</strong> +10 %</td><td>−2.21 %</td><td>+1.61 %</td><td>+1.61 %</td></tr><tr><td><strong>Reactant concentration at equilibrium</strong> +10 %</td><td>−9.09 %</td><td>+6.88 %</td><td>+6.88 %</td></tr><tr><td><strong>Reactant coefficient</strong> +10 %</td><td>+17.46 %</td><td>−11.61 %</td><td>−11.61 %</td></tr><tr><td><strong>Temperature (T)</strong> +10 %</td><td>+0 %</td><td>−10 %</td><td>−10 %</td></tr></tbody></table><p><p>Temperature is the only box that moves both results in different directions: it leaves K alone but scales ΔG° directly, so a temperature entered in Celsius rather than kelvin reverses a sign without any warning.</p></p><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Reactant coefficient</strong>: a ten per cent move there shifts the result by about 17.5 per cent. The least sensitive is <strong>Product coefficient</strong>, at 2.2 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Product concentration at equilibrium = 1, Product coefficient = 1, Reactant concentration at equilibrium = 1, Reactant coefficient = 1, Temperature (T) = 298.15, the page reports <strong>Equilibrium constant (K)</strong> = 1, <strong>Standard free energy change (ΔG°)</strong> = 0 kJ/mol, <strong>Standard free energy change</strong> = 0 J/mol. Equal concentrations give K = 1 and ΔG° = 0 — the definition of standard state.</li><li>With Product concentration at equilibrium = 0.01, Product coefficient = 1, Reactant concentration at equilibrium = 1, Reactant coefficient = 1, Temperature (T) = 298.15, the page reports <strong>Equilibrium constant (K)</strong> = 0.01, <strong>Standard free energy change (ΔG°)</strong> = 11.415 kJ/mol, <strong>Standard free energy change</strong> = 11 415.384 J/mol. K = 0.01 gives ΔG° = +11.4 kJ/mol: reactant-favoured, but only just.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Pure solids and liquids left in the expression.</strong> They have an activity of 1 and do not appear; including their concentration is the classic error on this page.</li><li><strong>Coefficients ignored.</strong> The exponents are not decoration: doubling a coefficient squares that side of the ratio.</li><li><strong>Celsius used as kelvin.</strong> 25 instead of 298.15 makes the free energy change twelve times too small and can flip its sign.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Equilibrium constant (K), Standard free energy change (ΔG°) (kJ/mol), Standard free energy change (J/mol).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>K is unitless — it is a ratio of concentrations each raised to a power, with the standard state implied. ΔG° is reported in both kJ/mol and J/mol because tables use the first and the equation produces the second.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need product concentration at equilibrium and product coefficient and reactant concentration at equilibrium and reactant coefficient and temperature (T). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Equilibrium constant (k) and standard free energy change (kj/mol) and standard free energy change (j/mol) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Product concentration at equilibrium</strong> ×10</td><td>4</td><td>40</td><td>ten times larger</td></tr><tr><td><strong>Product coefficient</strong> ×10</td><td>4</td><td>0.537</td><td>×0.134</td></tr><tr><td><strong>Reactant concentration at equilibrium</strong> ×10</td><td>4</td><td>0.4</td><td>ten times smaller</td></tr><tr><td><strong>Reactant coefficient</strong> ×10</td><td>4</td><td>7.812 × 10<sup>6</sup></td><td>×1.953 × 10<sup>6</sup></td></tr><tr><td><strong>Temperature (T)</strong> ×10</td><td>4</td><td>4</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes ideal behaviour.</strong> In concentrated solutions, activities replace concentrations and K computed this way is only approximate.</li><li><strong>It describes one temperature.</strong> K moves with temperature — by the van 't Hoff relationship — and so does ΔG°.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Deciding whether a reaction will go, and how far.</li></li><li><li>Converting a tabulated ΔG° into the concentration ratio it implies.</li></li><li><li>Checking that a measured equilibrium composition is self-consistent.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/reaction-quotient">Reaction quotient</a> <a href="/chemistry/gibbs-energy">Gibbs energy</a> <a href="/chemistry/kp">Kp</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Equilibrium Constant calculator work out?', 'a' => <<<'TXT'
            It returns equilibrium constant (K) and standard free energy change (kJ/mol) and standard free energy change (J/mol) from product concentration at equilibrium and product coefficient and reactant concentration at equilibrium and reactant coefficient and temperature (T). The relationship is (Product concentration at equilibrium)^Product coefficient ÷ (Reactant concentration at equilibrium)^Reactant coefficient.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Product concentration at equilibrium (mol/L), Product coefficient, Reactant concentration at equilibrium (mol/L), Reactant coefficient, Temperature (T) (K). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: product concentration at equilibrium in mol/L; reactant concentration at equilibrium in mol/L; temperature (T) in K. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is ΔG° called standard?', 'a' => <<<'TXT'
            Because it refers to every species at its standard state — 1 mol/L for solutes, 1 bar for gases. The actual ΔG at other concentrations uses the reaction quotient instead.
            TXT],
            ['q' => 'What does a K of exactly 1 mean?', 'a' => <<<'TXT'
            That the products and reactants are equally favoured under standard conditions, and ΔG° is zero. It does not mean the reaction is at its midpoint in your flask.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/reaction-quotient', 'name' => 'Reaction quotient'],
            ['path' => '/chemistry/gibbs-energy', 'name' => 'Gibbs energy'],
            ['path' => '/chemistry/kp', 'name' => 'Kp'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

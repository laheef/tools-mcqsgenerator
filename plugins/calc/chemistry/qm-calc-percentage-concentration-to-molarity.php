<?php

/**
 * Percent to Molarity Calculator
 * /chemistry/percentage-concentration-to-molarity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Percent to Molarity Calculator',
    'meta' => ['title' => 'Percent to Molarity Calculator: % w/w into M', 'description' => 'Convert a percent by mass solution into molarity with its density and molar mass, the calculation that sits behind every concentrated acid or base label.', 'h1' => 'Percent to Molarity Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'percent',
                    'label' => 'Concentration',
                    'type' => 'number',
                    'suffix' => '% w/w',
                    'default' => '37',
                    'help' => 'Percent by mass, as printed on the bottle',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Density of the solution',
                    'type' => 'number',
                    'suffix' => 'g/mL',
                    'default' => '1.19',
                    'help' => 'From the label or a density table, not the density of water',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molar_mass',
                    'label' => 'Molar mass',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '36.46',
                    'help' => 'Molar mass of the solute',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molarity',
                    'label' => 'Molarity',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol/L',
                ],
                [
                    'name' => 'mass_conc',
                    'label' => 'Mass concentration',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g/L',
                ],
                [
                    'name' => 'molality_approx',
                    'label' => 'Moles per kg of solution',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol/kg',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Percent to Molarity',
            'results' => [
                'molarity' => 'percent*density*10/molar_mass',
                'mass_conc' => 'percent*density*10',
                'molality_approx' => 'percent*10/molar_mass',
                'percent' => 'molarity*molar_mass/density/10',
                'density' => 'molarity*molar_mass/percent/10',
                'molar_mass' => 'percent*density*10/molarity',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A bottle of concentrated reagent gives its strength as a percentage by mass, while every method wants molarity. The bridge is the density: <strong>M = (% × density × 10) ÷ M<sub>r</sub></strong>, which turns 37 % hydrochloric acid (density 1.19 g/mL) into 12.1 mol/L.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>This is the calculation that turns a reagent bottle into a working solution. Hydrochloric acid is sold as 37 % w/w, sulfuric acid as 98 %, ammonia as 28 %; none of those numbers can go into a stoichiometric calculation until they are divided by a molar mass and multiplied by a density.</p><p>The page reports <strong>molarity and mass concentration and moles per kg of solution</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Molarity</strong></td><td><code>Concentration × Density of the solution × 10 ÷ Molar mass</code></td></tr><tr><td><strong>Mass concentration</strong></td><td><code>Concentration × Density of the solution × 10</code></td></tr><tr><td><strong>Moles per kg of solution</strong></td><td><code>Concentration × 10 ÷ Molar mass</code></td></tr><tr><td><strong>Concentration</strong></td><td><code>Molarity × Molar mass ÷ Density of the solution ÷ 10</code></td></tr><tr><td><strong>Density of the solution</strong></td><td><code>Molarity × Molar mass ÷ Concentration ÷ 10</code></td></tr><tr><td><strong>Molar mass</strong></td><td><code>Concentration × Density of the solution × 10 ÷ Molarity</code></td></tr></tbody></table><p><p>The factor of ten comes from two unit conversions at once: 100 g of solution to a percentage, and a millilitre to a litre. It is not a fudge factor, and it does not change with the substance.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports molarity and mass concentration and moles per kg of solution.</p><ul><li><strong>Concentration</strong> — in % w/w. Percent by mass, as printed on the bottle</li><li><strong>Density of the solution</strong> — in g/mL. From the label or a density table, not the density of water</li><li><strong>Molar mass</strong> — in g/mol. Molar mass of the solute</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Molarity</strong> — in mol/L</li><li><strong>Mass concentration</strong> — in g/L</li><li><strong>Moles per kg of solution</strong> — in mol/kg</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Concentration = 37 % w/w, Density of the solution = 1.19 g/mL, Molar mass = 36.46 g/mol — and the results panel reads:</p><ul><li><strong>Molarity</strong> = <code>Concentration × Density of the solution × 10 ÷ Molar mass</code> = <strong>12.076 mol/L</strong></li><li><strong>Mass concentration</strong> = <code>Concentration × Density of the solution × 10</code> = <strong>440.3 g/L</strong></li><li><strong>Moles per kg of solution</strong> = <code>Concentration × 10 ÷ Molar mass</code> = <strong>10.148 mol/kg</strong></li></ul><p>With the numbers written into the formula, the first result is <code>37 × 1.19 × 10 ÷ 36.46 = 12.076</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>37 % × 1.19 g/mL × 10 ÷ 36.46 gives 12.08 mol/L, which agrees with the 12.1 M quoted for concentrated hydrochloric acid. The third result, 12.3 mol/kg of solution, shows how little the two differ at this strength.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Compare with the supplier's stated molarity. Most reagent labels print both; if the calculation and the label disagree by more than a per cent, the density used is the wrong one — check whether it is the solution density or the pure substance's.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Molarity</th><th>Mass concentration</th><th>Moles per kg of solution</th></tr></thead><tbody><tr><td><strong>Concentration</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Density of the solution</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Molar mass</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Concentration</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Molar mass</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Concentration = 98, Density of the solution = 1.84, Molar mass = 98.079, the page reports <strong>Molarity</strong> = 18.385 mol/L, <strong>Mass concentration</strong> = 1 803.2 g/L, <strong>Moles per kg of solution</strong> = 9.992 mol/kg. 98 % sulfuric acid at 1.84 g/mL is 18.4 M.</li><li>With Concentration = 28, Density of the solution = 0.9, Molar mass = 17.031, the page reports <strong>Molarity</strong> = 14.797 mol/L, <strong>Mass concentration</strong> = 252 g/L, <strong>Moles per kg of solution</strong> = 16.441 mol/kg. 28 % ammonia solution at 0.9 g/mL is 14.8 M.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Density of the pure solute.</strong> The box wants the density of the solution as sold; water's 1.00 g/mL is a common and costly substitute.</li><li><strong>Percent read as w/v.</strong> A w/v percentage already contains the volume, so multiplying by density double-counts it.</li><li><strong>Molar mass of the solution.</strong> The molar mass belongs to the solute alone.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Molarity (mol/L), Mass concentration (g/L), Moles per kg of solution (mol/kg).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Density must be in g/mL so that the percentage, the density and the factor of ten give grams per litre. kg/m³ values are a thousand times smaller and need converting.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need concentration and density of the solution and molar mass. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Molarity and mass concentration and moles per kg of solution should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Concentration</strong> ×10</td><td>12.076</td><td>120.762</td><td>ten times larger</td></tr><tr><td><strong>Density of the solution</strong> ×10</td><td>12.076</td><td>120.762</td><td>ten times larger</td></tr><tr><td><strong>Molar mass</strong> ×10</td><td>12.076</td><td>1.208</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It needs the true density at your temperature.</strong> Concentrated acids expand noticeably between 15 °C and 30 °C.</li><li><strong>It assumes one solute.</strong> A mixed reagent — an acid with a stabiliser, for instance — gives the total dissolved mass, not the active component's.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Turning a concentrated acid or base label into the molarity a method needs.</li></li><li><li>Working out how much of a reagent to weigh for a target molarity.</li></li><li><li>Checking a supplier's stated molarity against their own percentage and density.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/mass-percent">Mass percent</a> <a href="/chemistry/molarity">Molarity</a> <a href="/chemistry/mass-concentration-to-molar-concentration">Mass to molar concentration</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Percent to Molarity calculator work out?', 'a' => <<<'TXT'
            It returns molarity and mass concentration and moles per kg of solution from concentration and density of the solution and molar mass. The relationship is Concentration × Density of the solution × 10 ÷ Molar mass.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Concentration (% w/w), Density of the solution (g/mL), Molar mass (g/mol). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: concentration in % w/w; density of the solution in g/mL; molar mass in g/mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is a factor of 10 in the formula?', 'a' => <<<'TXT'
            Because a percentage is per 100 g and a molarity is per litre. Density converts the 100 g to a volume in millilitres, and the factor of ten carries that to a litre.
            TXT],
            ['q' => 'Which density should I use?', 'a' => <<<'TXT'
            The density of the solution as supplied, at the temperature you are working at. It is printed on most reagent labels and tabulated in the supplier's safety data sheet.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/mass-percent', 'name' => 'Mass percent'],
            ['path' => '/chemistry/molarity', 'name' => 'Molarity'],
            ['path' => '/chemistry/mass-concentration-to-molar-concentration', 'name' => 'Mass to molar concentration'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

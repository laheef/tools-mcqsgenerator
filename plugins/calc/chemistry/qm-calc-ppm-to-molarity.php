<?php

/**
 * PPM to Molarity Calculator
 * /chemistry/ppm-to-molarity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'PPM to Molarity Calculator',
    'meta' => ['title' => 'PPM to Molarity Calculator: mg/L into mol/L', 'description' => 'Convert parts per million in water into a molar concentration with the molar mass, the calculation that sits behind water-quality limits and trace analysis.', 'h1' => 'PPM to Molarity Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'ppm',
                    'label' => 'Concentration',
                    'type' => 'number',
                    'suffix' => 'ppm',
                    'default' => '1000',
                    'help' => 'Parts per million by mass; 1 ppm ≈ 1 mg/L in water',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molar_mass',
                    'label' => 'Molar mass',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '58.44',
                    'help' => 'Molar mass of the dissolved substance',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'mg_per_l',
                    'label' => 'Mass concentration',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mg/L',
                ],
                [
                    'name' => 'molarity',
                    'label' => 'Molar concentration',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol/L',
                ],
                [
                    'name' => 'micromolarity',
                    'label' => 'Molar concentration',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'µmol/L',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'PPM to Molarity',
            'results' => [
                'mg_per_l' => 'ppm',
                'molarity' => 'ppm/(molar_mass*1000)',
                'micromolarity' => 'ppm/molar_mass',
                'ppm' => 'molarity*molar_mass*1000',
                'molar_mass' => 'ppm/molarity/1000',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>In dilute aqueous solution one part per million is one milligram per litre, so ppm converts to molarity as <strong>M = ppm ÷ (M<sub>r</sub> × 1000)</strong>. This page does that division and shows the mg/L figure it starts from.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Drinking-water standards, effluent consents and nutrient solutions are all written in ppm or mg/L, while the chemistry behind them — precipitation, complexation, toxicity — happens in moles. The conversion is how a regulatory limit becomes an equilibrium calculation.</p><p>The page reports <strong>mass concentration and molar concentration (mol/L) and molar concentration (µmol/L)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Mass concentration</strong></td><td><code>Concentration</code></td></tr><tr><td><strong>Molar concentration (mol per L)</strong></td><td><code>Concentration ÷ (Molar mass × 1000)</code></td></tr><tr><td><strong>Molar concentration (µmol per L)</strong></td><td><code>Concentration ÷ Molar mass</code></td></tr><tr><td><strong>Concentration</strong></td><td><code>Molar concentration (mol per L) × Molar mass × 1000</code></td></tr><tr><td><strong>Molar mass</strong></td><td><code>Concentration ÷ Molar concentration (mol per L) ÷ 1000</code></td></tr></tbody></table><p><p>The approximation is that a litre of dilute aqueous solution weighs a kilogram. That is true to about 0.1 % for the concentrations where ppm is normally used, and it is why 1 ppm is treated as 1 mg/L without comment.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports mass concentration and molar concentration (mol/L) and molar concentration (µmol/L).</p><ul><li><strong>Concentration</strong> — in ppm. Parts per million by mass; 1 ppm ≈ 1 mg/L in water</li><li><strong>Molar mass</strong> — in g/mol. Molar mass of the dissolved substance</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Mass concentration</strong> — in mg/L</li><li><strong>Molar concentration</strong> — in mol/L</li><li><strong>Molar concentration</strong> — in µmol/L</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Concentration = 1 000 ppm, Molar mass = 58.44 g/mol — and the results panel reads:</p><ul><li><strong>Mass concentration</strong> = <code>Concentration</code> = <strong>1 000 mg/L</strong></li><li><strong>Molar concentration</strong> = <code>Concentration ÷ (Molar mass × 1000)</code> = <strong>0.017 mol/L</strong></li><li><strong>Molar concentration</strong> = <code>Concentration ÷ Molar mass</code> = <strong>17.112 µmol/L</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1 000 = 1 000</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>1 000 ppm of sodium chloride is 1 000 mg/L and 0.0171 mol/L — 17 mmol/L. The micromolar result, 17 100 µmol/L, is the scale at which trace-metal chemists usually work.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the molarity against the effect you are studying. Metal solubility limits often bite in the micromolar range, nutrient solutions sit in the millimolar range, and a 1 000 ppm total-dissolved-solids reading is brackish water.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Mass concentration</th><th>Molar concentration</th><th>Molar concentration</th></tr></thead><tbody><tr><td><strong>Concentration</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Molar mass</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Concentration</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Molar mass</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Concentration = 10, Molar mass = 40.078, the page reports <strong>Mass concentration</strong> = 10 mg/L, <strong>Molar concentration</strong> = 0.0002495 mol/L, <strong>Molar concentration</strong> = 0.25 µmol/L. 10 ppm calcium is 0.25 mmol/L — soft water by any standard.</li><li>With Concentration = 1, Molar mass = 1 000, the page reports <strong>Mass concentration</strong> = 1 mg/L, <strong>Molar concentration</strong> = 1 × 10<sup>-6</sup> mol/L, <strong>Molar concentration</strong> = 0.001 µmol/L. 1 ppm of a large molecule is only 1 µmol/L, which is why trace analytics are hard.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>ppm by volume used as ppm by mass.</strong> For gases these differ by the density ratio and the two are routinely confused.</li><li><strong>The 1 kg/L assumption broken.</strong> In brine or a dense solvent, a litre weighs more than a kilogram and the conversion needs the density.</li><li><strong>ppm read as mg/kg of dry matter.</strong> Environmental results are often quoted per dry kilogram; the water content has to be allowed for.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Mass concentration (mg/L), Molar concentration (mol/L), Molar concentration (µmol/L).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>1 ppm = 1 mg/kg ≈ 1 mg/L in water. 1 ppb = 1 µg/L and 1 ppt = 1 ng/L; the same conversion chain carries through with the molar mass unchanged.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need concentration and molar mass. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Mass concentration and molar concentration (mol/l) and molar concentration (µmol/l) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Concentration</strong> ×10</td><td>1 000</td><td>10 000</td><td>ten times larger</td></tr><tr><td><strong>Molar mass</strong> ×10</td><td>1 000</td><td>1 000</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It is an approximation for dilute aqueous solutions.</strong> Above about 1 % dissolved solids the density correction matters.</li><li><strong>It cannot distinguish species.</strong> A ppm figure for an element says nothing about whether it is free ion, complexed or colloidal.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Turning a water-quality limit into the molar concentration that drives a reaction.</li></li><li><li>Preparing trace standards from a concentrated stock in mg/L.</li></li><li><li>Comparing a nutrient solution's ppm of each ion with a plant's requirement in mmol/L.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/concentration">Concentration</a> <a href="/chemistry/mass-concentration-to-molar-concentration">Mass to molar concentration</a> <a href="/chemistry/tds">Total dissolved solids</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the PPM to Molarity calculator work out?', 'a' => <<<'TXT'
            It returns mass concentration and molar concentration (mol/L) and molar concentration (µmol/L) from concentration and molar mass. The relationship is Concentration.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Concentration (ppm), Molar mass (g/mol). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: concentration in ppm; molar mass in g/mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Is 1 ppm exactly 1 mg/L?', 'a' => <<<'TXT'
            In dilute aqueous solution, to within about 0.1 %. Strictly, ppm is a mass ratio and mg/L is a mass per volume; they coincide only because a litre of dilute solution weighs almost exactly a kilogram.
            TXT],
            ['q' => 'How do I convert ppb or ppt?', 'a' => 'The chain is the same with the decimal point moved: 1 ppb = 1 µg/L and 1 ppt = 1 ng/L. Divide by the molar mass in g/mol and by 10⁶ or 10⁹ instead of 10³.'],
        ],
        'related' => [
            ['path' => '/chemistry/concentration', 'name' => 'Concentration'],
            ['path' => '/chemistry/mass-concentration-to-molar-concentration', 'name' => 'Mass to molar concentration'],
            ['path' => '/chemistry/tds', 'name' => 'Total dissolved solids'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

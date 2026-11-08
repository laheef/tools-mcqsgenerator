<?php

/**
 * Molality Calculator
 * /chemistry/molality
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Molality Calculator',
    'meta' => ['title' => 'Molality Calculator: Moles per Kilogram Solvent of It', 'description' => 'Find molality from the moles of solute and the mass of solvent in grams — the temperature-proof concentration unit used for colligative property work.', 'h1' => 'Molality Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'moles',
                    'label' => 'Moles of solute (n)',
                    'type' => 'number',
                    'suffix' => 'mol',
                    'default' => '0.5',
                    'help' => 'Amount of the dissolved substance',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'solvent_mass_g',
                    'label' => 'Mass of solvent',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '500',
                    'help' => 'The liquid doing the dissolving, not the solution',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molality',
                    'label' => 'Molality (b)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol/kg',
                ],
                [
                    'name' => 'millimolality',
                    'label' => 'Molality',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mmol/kg',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Molality',
            'results' => ['molality' => 'moles/(solvent_mass_g/1000)', 'millimolality' => 'moles/(solvent_mass_g/1000)*1000', 'moles' => 'molality*solvent_mass_g/1000', 'solvent_mass_g' => 'moles/molality*1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Molality is the number of moles of solute per kilogram of <em>solvent</em>, <strong>b = n ÷ m<sub>solvent</sub></strong>, and its advantage is that it does not move when the solution is heated: mass does not expand. This page converts bench masses in grams into the molality that boiling-point and freezing-point equations need.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Every colligative property — freezing-point depression, boiling-point elevation, osmotic pressure, vapour-pressure lowering — is proportional to the number of particles per kilogram of solvent. Using molarity there introduces a temperature error exactly when temperature is what you are measuring.</p><p>The page reports <strong>molality (mol/kg) and molality (mmol/kg)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Molality (mol per kg)</strong></td><td><code>Moles of solute (n) ÷ (Mass of solvent ÷ 1000)</code></td></tr><tr><td><strong>Molality (mmol per kg)</strong></td><td><code>Moles of solute (n) ÷ (Mass of solvent ÷ 1000) × 1000</code></td></tr><tr><td><strong>Moles of solute (n)</strong></td><td><code>Molality (mol per kg) × Mass of solvent ÷ 1000</code></td></tr><tr><td><strong>Mass of solvent</strong></td><td><code>Moles of solute (n) ÷ Molality (mol per kg) × 1000</code></td></tr></tbody></table><p><p>The 1000 in the expression converts grams to kilograms. If you already have the solvent mass in kilograms, type it as grams by multiplying by a thousand — or leave the mass box empty and solve from a molality you already know.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports molality (mol/kg) and molality (mmol/kg).</p><ul><li><strong>Moles of solute (n)</strong> — in mol. Amount of the dissolved substance</li><li><strong>Mass of solvent</strong> — in g. The liquid doing the dissolving, not the solution</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Molality (b)</strong> — in mol/kg</li><li><strong>Molality</strong> — in mmol/kg</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Moles of solute (n) = 0.5 mol, Mass of solvent = 500 g — and the results panel reads:</p><ul><li><strong>Molality (b)</strong> = <code>Moles of solute (n) ÷ (Mass of solvent ÷ 1000)</code> = <strong>1 mol/kg</strong></li><li><strong>Molality</strong> = <code>Moles of solute (n) ÷ (Mass of solvent ÷ 1000) × 1000</code> = <strong>1 000 mmol/kg</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.5 ÷ (500 ÷ 1000) = 1</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Half a mole of solute in 500 g of water is 1 mol/kg. The same solution is roughly 1 M, but not exactly: its total volume is a little over 500 mL, and it is the kilogram of water, not the litre of solution, that this page divides by.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Molality is numerically close to molarity for dilute aqueous solutions and increasingly different above 1 mol/kg, where the solute occupies a real fraction of the volume. When the two disagree by more than a few per cent, the molality is the one to use in any equation that involves a temperature change.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Molality (b)</th><th>Molality</th></tr></thead><tbody><tr><td><strong>Moles of solute (n)</strong> +10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Mass of solvent</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Moles of solute (n)</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Mass of solvent</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Moles of solute (n) = 1, Mass of solvent = 1 000, the page reports <strong>Molality (b)</strong> = 1 mol/kg, <strong>Molality</strong> = 1 000 mmol/kg. One mole per kilogram of solvent is 1 mol/kg, the definition.</li><li>With Moles of solute (n) = 0.058, Mass of solvent = 1 000, the page reports <strong>Molality (b)</strong> = 0.058 mol/kg, <strong>Molality</strong> = 58.44 mmol/kg. 58.44 mmol of salt in a kilogram of water is 0.058 mol/kg — a freezing point depression of about 0.108 °C.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Solution mass used instead of solvent mass.</strong> The solute is inside the solution; subtracting it matters as soon as the solution is concentrated.</li><li><strong>Molality and molarity swapped.</strong> In water at room temperature they are close enough to hide the mistake until a calculation that depends on the difference.</li><li><strong>Grams assumed.</strong> The box says grams and the formula divides by a thousand; a mass typed in kilograms makes the answer a thousand times too small.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Molality (b) (mol/kg), Molality (mmol/kg).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The unit is mol kg⁻¹, sometimes written lowercase m. It is not the same as molarity's uppercase M, and the two are easy to confuse in a lab notebook.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need moles of solute (n) and mass of solvent. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Molality (mol/kg) and molality (mmol/kg) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Moles of solute (n)</strong> ×10</td><td>1</td><td>10</td><td>ten times larger</td></tr><tr><td><strong>Mass of solvent</strong> ×10</td><td>1</td><td>0.1</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It needs the solvent identified.</strong> A kilogram of water and a kilogram of ethanol behave completely differently at the same molality.</li><li><strong>It assumes the solute is fully dissolved.</strong> A saturated solution has undissolved solid that is not part of the molality.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Freezing-point and boiling-point calculations, where molality is the correct unit.</li></li><li><li>Comparing solutions made at different temperatures.</li></li><li><li>Electrolyte work where the number of particles matters more than the volume.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/molarity">Molarity</a> <a href="/chemistry/normality">Normality</a> <a href="/chemistry/freezing-point-depression">Freezing point depression</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Molality calculator work out?', 'a' => <<<'TXT'
            It returns molality (mol/kg) and molality (mmol/kg) from moles of solute (n) and mass of solvent. The relationship is Moles of solute (n) ÷ (Mass of solvent ÷ 1000).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Moles of solute (n) (mol), Mass of solvent (g). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: moles of solute (n) in mol; mass of solvent in g. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why use molality instead of molarity?', 'a' => <<<'TXT'
            Because mass does not change with temperature and volume does. Any property tied to the solvent's mass — freezing point, boiling point, vapour pressure — is written in molality.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/molarity', 'name' => 'Molarity'],
            ['path' => '/chemistry/normality', 'name' => 'Normality'],
            ['path' => '/chemistry/freezing-point-depression', 'name' => 'Freezing point depression'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

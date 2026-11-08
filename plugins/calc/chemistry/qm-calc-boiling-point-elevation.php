<?php

/**
 * Boiling Point Elevation Calculator
 * /chemistry/boiling-point-elevation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Boiling Point Elevation Calculator',
    'meta' => ['title' => 'Boiling Point Elevation Calculator: ΔTb = Kb·b·i', 'description' => 'Work out how far a solution boils above the pure solvent, from the ebullioscopic constant, the molality and the number of particles. The formula is shown.', 'h1' => 'Boiling Point Elevation Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'kb',
                    'label' => 'Ebullioscopic constant (Kb)',
                    'type' => 'number',
                    'suffix' => 'K·kg/mol',
                    'default' => '0.512',
                    'help' => '0.512 for water, 2.53 for benzene, 3.63 for chloroform',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molality',
                    'label' => 'Molality of the solution (b)',
                    'type' => 'number',
                    'suffix' => 'mol/kg',
                    'default' => '1',
                    'help' => 'Moles of solute per kilogram of solvent',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'van_t_hoff',
                    'label' => 'Van\'t Hoff factor (i)',
                    'type' => 'number',
                    'default' => '2',
                    'help' => '2 for NaCl, 3 for CaCl₂, 1 for a non-electrolyte',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pure_bp',
                    'label' => 'Boiling point of the pure solvent',
                    'type' => 'number',
                    'suffix' => '°C',
                    'default' => '100',
                    'help' => '100 for water at sea level, 80.1 for benzene',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'delta_tb',
                    'label' => 'Boiling point elevation (ΔTb)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'K',
                ],
                [
                    'name' => 'solution_bp',
                    'label' => 'Boiling point of the solution',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '°C',
                ],
                [
                    'name' => 'effective_particles',
                    'label' => 'Particles per kilogram of solvent',
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
            'title' => 'Boiling Point Elevation',
            'results' => [
                'delta_tb' => 'kb*molality*van_t_hoff',
                'solution_bp' => 'pure_bp+kb*molality*van_t_hoff',
                'effective_particles' => 'molality*van_t_hoff',
                'kb' => 'delta_tb/(molality*van_t_hoff)',
                'molality' => 'delta_tb/(kb*van_t_hoff)',
                'van_t_hoff' => 'delta_tb/(kb*molality)',
                'pure_bp' => 'solution_bp-delta_tb',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A dissolved solute raises the boiling point in proportion to the number of particles: <strong>ΔT<sub>b</sub> = K<sub>b</sub> × b × i</strong>. For water Kb is 0.512 K·kg/mol — a smaller constant than the freezing-point one, which is why the boiling effect is always the less dramatic of the two.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Boiling point elevation is the same physics as freezing point depression seen from the other side: the solute lowers the chemical potential of the liquid, so more heat is needed before its vapour pressure reaches atmospheric. It is also how a candy-maker judges a syrup's sugar concentration without a refractometer.</p><p>The page reports <strong>boiling point elevation (ΔTb) and boiling point of the solution and particles per kilogram of solvent</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Boiling point elevation (ΔTb)</strong></td><td><code>Ebullioscopic constant (Kb) × Molality of the solution (b) × Van't Hoff factor (i)</code></td></tr><tr><td><strong>Boiling point of the solution</strong></td><td><code>Boiling point of the pure solvent+Ebullioscopic constant (Kb) × Molality of the solution (b) × Van't Hoff factor (i)</code></td></tr><tr><td><strong>Particles per kilogram of solvent</strong></td><td><code>Molality of the solution (b) × Van't Hoff factor (i)</code></td></tr><tr><td><strong>Ebullioscopic constant (Kb)</strong></td><td><code>Boiling point elevation (ΔTb) ÷ (Molality of the solution (b) × Van't Hoff factor (i))</code></td></tr><tr><td><strong>Molality of the solution (b)</strong></td><td><code>Boiling point elevation (ΔTb) ÷ (Ebullioscopic constant (Kb) × Van't Hoff factor (i))</code></td></tr><tr><td><strong>Van&#x27;t Hoff factor (i)</strong></td><td><code>Boiling point elevation (ΔTb) ÷ (Ebullioscopic constant (Kb) × Molality of the solution (b))</code></td></tr><tr><td><strong>Boiling point of the pure solvent</strong></td><td><code>Boiling point of the solution-Boiling point elevation (ΔTb)</code></td></tr></tbody></table><p><p>Kb is about a quarter of Kf for water, so a solution that freezes at −3.7 °C boils only about 1 K above 100 °C. That asymmetry is thermodynamic, not experimental.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports boiling point elevation (ΔTb) and boiling point of the solution and particles per kilogram of solvent.</p><ul><li><strong>Ebullioscopic constant (Kb)</strong> — in K·kg/mol. 0.512 for water, 2.53 for benzene, 3.63 for chloroform</li><li><strong>Molality of the solution (b)</strong> — in mol/kg. Moles of solute per kilogram of solvent</li><li><strong>Van&#x27;t Hoff factor (i)</strong>. 2 for NaCl, 3 for CaCl₂, 1 for a non-electrolyte</li><li><strong>Boiling point of the pure solvent</strong> — in °C. 100 for water at sea level, 80.1 for benzene</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Boiling point elevation (ΔTb)</strong> — in K</li><li><strong>Boiling point of the solution</strong> — in °C</li><li><strong>Particles per kilogram of solvent</strong> — in mol/kg</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Ebullioscopic constant (Kb) = 0.512 K·kg/mol, Molality of the solution (b) = 1 mol/kg, Van't Hoff factor (i) = 2, Boiling point of the pure solvent = 100 °C — and the results panel reads:</p><ul><li><strong>Boiling point elevation (ΔTb)</strong> = <code>Ebullioscopic constant (Kb) × Molality of the solution (b) × Van't Hoff factor (i)</code> = <strong>1.024 K</strong></li><li><strong>Boiling point of the solution</strong> = <code>Boiling point of the pure solvent+Ebullioscopic constant (Kb) × Molality of the solution (b) × Van't Hoff factor (i)</code> = <strong>101.024 °C</strong></li><li><strong>Particles per kilogram of solvent</strong> = <code>Molality of the solution (b) × Van't Hoff factor (i)</code> = <strong>2 mol/kg</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.512 × 1 × 2 = 1.024</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 1 mol/kg solution of sodium chloride in water gives ΔTb = 0.512 × 1 × 2 = 1.02 K, so it boils at 101.02 °C at sea level. The same solution freezes at −3.72 °C — the freezing effect is nearly four times larger.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the elevation against the precision of your thermometer. A tenth of a kelvin needs a good thermometer and a steady pressure; that is why boiling point elevation is used less often than freezing point depression for molar mass work.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Boiling point elevation (ΔTb)</th><th>Boiling point of the solution</th><th>Particles per kilogram of solvent</th></tr></thead><tbody><tr><td><strong>Ebullioscopic constant (Kb)</strong> +10 %</td><td>+10 %</td><td>+0.1 %</td><td>+0 %</td></tr><tr><td><strong>Molality of the solution (b)</strong> +10 %</td><td>+10 %</td><td>+0.1 %</td><td>+10 %</td></tr><tr><td><strong>Van&#x27;t Hoff factor (i)</strong> +10 %</td><td>+10 %</td><td>+0.1 %</td><td>+10 %</td></tr><tr><td><strong>Boiling point of the pure solvent</strong> +10 %</td><td>+0 %</td><td>+9.9 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Molality of the solution (b)</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Boiling point of the pure solvent</strong>, at 9.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Ebullioscopic constant (Kb) = 0.512, Molality of the solution (b) = 0.5, Van&#x27;t Hoff factor (i) = 1, Boiling point of the pure solvent = 100, the page reports <strong>Boiling point elevation (ΔTb)</strong> = 0.256 K, <strong>Boiling point of the solution</strong> = 100.256 °C, <strong>Particles per kilogram of solvent</strong> = 0.5 mol/kg. Half a mole per kilogram of sugar raises the boiling point to 100.26 °C.</li><li>With Ebullioscopic constant (Kb) = 0.512, Molality of the solution (b) = 5, Van&#x27;t Hoff factor (i) = 1, Boiling point of the pure solvent = 100, the page reports <strong>Boiling point elevation (ΔTb)</strong> = 2.56 K, <strong>Boiling point of the solution</strong> = 102.56 °C, <strong>Particles per kilogram of solvent</strong> = 5 mol/kg. A 5 mol/kg sugar syrup boils at 102.6 °C — close to the soft-ball stage of candy.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Atmospheric pressure ignored.</strong> Water boils at 94 °C in Denver; the pure boiling point has to be the local one before any elevation is added.</li><li><strong>i left at 1 for a salt.</strong> The predicted elevation halves and looks plausible.</li><li><strong>A volatile solute used.</strong> Ethanol in water raises the vapour pressure and lowers the boiling point; this equation assumes a non-volatile solute.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Boiling point elevation (ΔTb) (K), Boiling point of the solution (°C), Particles per kilogram of solvent (mol/kg).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Kb is in K·kg/mol, molality in mol/kg, so the elevation is in kelvin. A kelvin step equals a Celsius step, which is why the boiling point result is in °C.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need ebullioscopic constant (Kb) and molality of the solution (b) and van't Hoff factor (i) and boiling point of the pure solvent. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Boiling point elevation (δtb) and boiling point of the solution and particles per kilogram of solvent should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Ebullioscopic constant (Kb)</strong> ×10</td><td>1.024</td><td>10.24</td><td>ten times larger</td></tr><tr><td><strong>Molality of the solution (b)</strong> ×10</td><td>1.024</td><td>10.24</td><td>ten times larger</td></tr><tr><td><strong>Van&#x27;t Hoff factor (i)</strong> ×10</td><td>1.024</td><td>10.24</td><td>ten times larger</td></tr><tr><td><strong>Boiling point of the pure solvent</strong> ×10</td><td>1.024</td><td>1.024</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes a non-volatile solute.</strong> Anything with a measurable vapour pressure of its own breaks the model.</li><li><strong>It is dilute-solution physics.</strong> In thick syrups the activity of water departs sharply from the molality.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Estimating the strength of a sugar syrup from its boiling point.</li></li><li><li>Finding the molar mass of an unknown from a measured elevation.</li></li><li><li>Correcting a distillation temperature for dissolved solids.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/freezing-point-depression">Freezing point depression</a> <a href="/chemistry/boiling-point-altitude">Boiling point at altitude</a> <a href="/chemistry/molality">Molality</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Boiling Point Elevation calculator work out?', 'a' => <<<'TXT'
            It returns boiling point elevation (ΔTb) and boiling point of the solution and particles per kilogram of solvent from ebullioscopic constant (Kb) and molality of the solution (b) and van't Hoff factor (i) and boiling point of the pure solvent. The relationship is Ebullioscopic constant (Kb) × Molality of the solution (b) × Van't Hoff factor (i).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Ebullioscopic constant (Kb) (K·kg/mol), Molality of the solution (b) (mol/kg), Van't Hoff factor (i), Boiling point of the pure solvent (°C). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: ebullioscopic constant (Kb) in K·kg/mol; molality of the solution (b) in mol/kg; boiling point of the pure solvent in °C. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is boiling point elevation smaller than freezing point depression?', 'a' => 'Because the constants differ: 0.512 against 1.86 K·kg/mol for water. The same particle count moves the boiling point about a quarter as far.'],
            ['q' => 'Does altitude matter?', 'a' => 'Yes, for the starting point. The elevation from solute is added to whatever the pure solvent boils at locally, so at altitude the whole answer shifts down.'],
        ],
        'related' => [
            ['path' => '/chemistry/freezing-point-depression', 'name' => 'Freezing point depression'],
            ['path' => '/chemistry/boiling-point-altitude', 'name' => 'Boiling point at altitude'],
            ['path' => '/chemistry/molality', 'name' => 'Molality'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

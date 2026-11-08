<?php

/**
 * Freezing Point Depression Calculator
 * /chemistry/freezing-point-depression
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Freezing Point Depression Calculator',
    'meta' => ['title' => 'Freezing Point Depression Calculator: ΔTf = Kf·b·i', 'description' => 'Work out how far a solution freezes below the pure solvent, from the cryoscopic constant, the molality and the van\'t Hoff factor. The formula is shown.', 'h1' => 'Freezing Point Depression Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'kf',
                    'label' => 'Cryoscopic constant (Kf)',
                    'type' => 'number',
                    'suffix' => 'K·kg/mol',
                    'default' => '1.86',
                    'help' => '1.86 for water, 5.12 for benzene, 37.7 for camphor',
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
                    'name' => 'pure_fp',
                    'label' => 'Freezing point of the pure solvent',
                    'type' => 'number',
                    'suffix' => '°C',
                    'default' => '0',
                    'help' => '0 for water, 5.5 for benzene',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'delta_tf',
                    'label' => 'Freezing point depression (ΔTf)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'K',
                ],
                [
                    'name' => 'solution_fp',
                    'label' => 'Freezing point of the solution',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '°C',
                ],
                [
                    'name' => 'effective_particles',
                    'label' => 'Particles per litre of solvent',
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
            'title' => 'Freezing Point Depression',
            'results' => [
                'delta_tf' => 'kf*molality*van_t_hoff',
                'solution_fp' => 'pure_fp-kf*molality*van_t_hoff',
                'effective_particles' => 'molality*van_t_hoff',
                'kf' => 'delta_tf/(molality*van_t_hoff)',
                'molality' => 'delta_tf/(kf*van_t_hoff)',
                'van_t_hoff' => 'delta_tf/(kf*molality)',
                'pure_fp' => 'solution_fp+delta_tf',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Dissolving something in a solvent lowers its freezing point in proportion to the number of particles: <strong>ΔT<sub>f</sub> = K<sub>f</sub> × b × i</strong>. For water Kf is 1.86 K·kg/mol, b is the molality and i is the number of particles each formula unit produces.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Freezing point depression is one of the colligative properties, which depend on how many particles are dissolved rather than what they are. That makes it a way of counting molecules without knowing anything about them — the classical method for finding molar mass, and the reason salt melts ice on a road.</p><p>The page reports <strong>freezing point depression (ΔTf) and freezing point of the solution and particles per litre of solvent</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Freezing point depression (ΔTf)</strong></td><td><code>Cryoscopic constant (Kf) × Molality of the solution (b) × Van't Hoff factor (i)</code></td></tr><tr><td><strong>Freezing point of the solution</strong></td><td><code>Freezing point of the pure solvent-Cryoscopic constant (Kf) × Molality of the solution (b) × Van't Hoff factor (i)</code></td></tr><tr><td><strong>Particles per litre of solvent</strong></td><td><code>Molality of the solution (b) × Van't Hoff factor (i)</code></td></tr><tr><td><strong>Cryoscopic constant (Kf)</strong></td><td><code>Freezing point depression (ΔTf) ÷ (Molality of the solution (b) × Van't Hoff factor (i))</code></td></tr><tr><td><strong>Molality of the solution (b)</strong></td><td><code>Freezing point depression (ΔTf) ÷ (Cryoscopic constant (Kf) × Van't Hoff factor (i))</code></td></tr><tr><td><strong>Van&#x27;t Hoff factor (i)</strong></td><td><code>Freezing point depression (ΔTf) ÷ (Cryoscopic constant (Kf) × Molality of the solution (b))</code></td></tr><tr><td><strong>Freezing point of the pure solvent</strong></td><td><code>Freezing point of the solution+Freezing point depression (ΔTf)</code></td></tr></tbody></table><p><p>The van't Hoff factor is the ideal particle count. Sodium chloride gives 2, calcium chloride 3, glucose 1. In real solutions ion pairing pulls the effective value below the ideal one, so measured depressions are slightly smaller than this predicts.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports freezing point depression (ΔTf) and freezing point of the solution and particles per litre of solvent.</p><ul><li><strong>Cryoscopic constant (Kf)</strong> — in K·kg/mol. 1.86 for water, 5.12 for benzene, 37.7 for camphor</li><li><strong>Molality of the solution (b)</strong> — in mol/kg. Moles of solute per kilogram of solvent</li><li><strong>Van&#x27;t Hoff factor (i)</strong>. 2 for NaCl, 3 for CaCl₂, 1 for a non-electrolyte</li><li><strong>Freezing point of the pure solvent</strong> — in °C. 0 for water, 5.5 for benzene</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Freezing point depression (ΔTf)</strong> — in K</li><li><strong>Freezing point of the solution</strong> — in °C</li><li><strong>Particles per litre of solvent</strong> — in mol/kg</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Cryoscopic constant (Kf) = 1.86 K·kg/mol, Molality of the solution (b) = 1 mol/kg, Van't Hoff factor (i) = 2, Freezing point of the pure solvent = 0 °C — and the results panel reads:</p><ul><li><strong>Freezing point depression (ΔTf)</strong> = <code>Cryoscopic constant (Kf) × Molality of the solution (b) × Van't Hoff factor (i)</code> = <strong>3.72 K</strong></li><li><strong>Freezing point of the solution</strong> = <code>Freezing point of the pure solvent-Cryoscopic constant (Kf) × Molality of the solution (b) × Van't Hoff factor (i)</code> = <strong>-3.72 °C</strong></li><li><strong>Particles per litre of solvent</strong> = <code>Molality of the solution (b) × Van't Hoff factor (i)</code> = <strong>2 mol/kg</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1.86 × 1 × 2 = 3.72</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 1 mol/kg solution of sodium chloride in water has i = 2, so ΔTf = 1.86 × 1 × 2 = 3.72 K and the solution freezes at −3.72 °C. That is roughly the strength of the brine used on winter roads.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the depression against the application. A few tenths of a kelvin is a laboratory curiosity; 10 K is a serious antifreeze mixture; more than about 20 K is beyond what any practical solute achieves in water before the solution becomes unworkable.</p></p><table class="calc-table"><thead><tr><th>Range</th><th>What it means</th></tr></thead><tbody><tr><td><strong>ΔTf under 0.5 K</strong></td><td>Dilute solution — osmolarity work, or a check on water purity.</td></tr><tr><td><strong>0.5–5 K</strong></td><td>Typical de-icing brine or a laboratory cooling bath.</td></tr><tr><td><strong>Above 10 K</strong></td><td>Concentrated antifreeze; the colligative approximation is stretched.</td></tr></tbody></table>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Freezing point depression (ΔTf)</th><th>Freezing point of the solution</th><th>Particles per litre of solvent</th></tr></thead><tbody><tr><td><strong>Cryoscopic constant (Kf)</strong> +10 %</td><td>+10 %</td><td>−10 %</td><td>+0 %</td></tr><tr><td><strong>Molality of the solution (b)</strong> +10 %</td><td>+10 %</td><td>−10 %</td><td>+10 %</td></tr><tr><td><strong>Van&#x27;t Hoff factor (i)</strong> +10 %</td><td>+10 %</td><td>−10 %</td><td>+10 %</td></tr><tr><td><strong>Freezing point of the pure solvent</strong> +10 %</td><td>+0 %</td><td>+2.69 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Cryoscopic constant (Kf)</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Freezing point of the pure solvent</strong>, at 2.7 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Cryoscopic constant (Kf) = 1.86, Molality of the solution (b) = 0.5, Van&#x27;t Hoff factor (i) = 1, Freezing point of the pure solvent = 0, the page reports <strong>Freezing point depression (ΔTf)</strong> = 0.93 K, <strong>Freezing point of the solution</strong> = -0.93 °C, <strong>Particles per litre of solvent</strong> = 0.5 mol/kg. Half a mole per kilogram of sugar: −0.93 °C.</li><li>With Cryoscopic constant (Kf) = 1.86, Molality of the solution (b) = 2, Van&#x27;t Hoff factor (i) = 3, Freezing point of the pure solvent = 0, the page reports <strong>Freezing point depression (ΔTf)</strong> = 11.16 K, <strong>Freezing point of the solution</strong> = -11.16 °C, <strong>Particles per litre of solvent</strong> = 6 mol/kg. Calcium chloride at 2 mol/kg: ΔTf = 11.2 K, the classic road-salt strength.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>i left at 1 for a salt.</strong> Halving the predicted depression — the single biggest error on this page.</li><li><strong>Molarity used as molality.</strong> Close in dilute aqueous solution, wrong in concentrated ones, and this equation needs the mass-based unit.</li><li><strong>Ka or Kb used as Kf.</strong> The cryoscopic constant is a property of the solvent, not of the solute.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Freezing point depression (ΔTf) (K), Freezing point of the solution (°C), Particles per litre of solvent (mol/kg).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Kf carries K·kg/mol, so molality in mol/kg gives a depression in kelvin. A kelvin step is the same size as a Celsius step, which is why the freezing point result can be reported in °C.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need cryoscopic constant (Kf) and molality of the solution (b) and van't Hoff factor (i) and freezing point of the pure solvent. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Freezing point depression (δtf) and freezing point of the solution and particles per litre of solvent should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Cryoscopic constant (Kf)</strong> ×10</td><td>3.72</td><td>37.2</td><td>ten times larger</td></tr><tr><td><strong>Molality of the solution (b)</strong> ×10</td><td>3.72</td><td>37.2</td><td>ten times larger</td></tr><tr><td><strong>Van&#x27;t Hoff factor (i)</strong> ×10</td><td>3.72</td><td>37.2</td><td>ten times larger</td></tr><tr><td><strong>Freezing point of the pure solvent</strong> ×10</td><td>3.72</td><td>3.72</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes dilute, ideal behaviour.</strong> Above about 1 mol/kg, ion pairing and solute-solute interaction make the real depression smaller.</li><li><strong>It is one colligative property among four.</strong> Boiling point elevation, osmotic pressure and vapour pressure lowering all describe the same particle count.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Working out how much salt protects a road or a cooling system.</li></li><li><li>Estimating the molar mass of an unknown from a measured depression.</li></li><li><li>Checking that a solution's osmolarity is what a protocol assumed.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/boiling-point-elevation">Boiling point elevation</a> <a href="/chemistry/osmotic-pressure">Osmotic pressure</a> <a href="/chemistry/molality">Molality</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Freezing Point Depression calculator work out?', 'a' => <<<'TXT'
            It returns freezing point depression (ΔTf) and freezing point of the solution and particles per litre of solvent from cryoscopic constant (Kf) and molality of the solution (b) and van't Hoff factor (i) and freezing point of the pure solvent. The relationship is Cryoscopic constant (Kf) × Molality of the solution (b) × Van't Hoff factor (i).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cryoscopic constant (Kf) (K·kg/mol), Molality of the solution (b) (mol/kg), Van't Hoff factor (i), Freezing point of the pure solvent (°C). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: cryoscopic constant (Kf) in K·kg/mol; molality of the solution (b) in mol/kg; freezing point of the pure solvent in °C. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why does salt melt ice if it makes water freeze at a lower temperature?', 'a' => <<<'TXT'
            Because the ice is already at 0 °C and the salted water in contact with it is now below its own freezing point, so the ice melts into the brine. The mixture ends up colder than 0 °C.
            TXT],
            ['q' => 'Is the depression the same for every solute?', 'a' => 'For equal numbers of particles, yes. Two moles of glucose depress the freezing point as much as one mole of sodium chloride, which dissociates into two.'],
        ],
        'related' => [
            ['path' => '/chemistry/boiling-point-elevation', 'name' => 'Boiling point elevation'],
            ['path' => '/chemistry/osmotic-pressure', 'name' => 'Osmotic pressure'],
            ['path' => '/chemistry/molality', 'name' => 'Molality'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Mass to Molar Concentration Calculator
 * /chemistry/mass-concentration-to-molar-concentration
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mass to Molar Concentration Calculator',
    'meta' => ['title' => 'Mass to Molar Concentration: g/L into mol/L', 'description' => 'Divide a mass concentration in grams per litre by the molar mass to get molarity, or go the other way from moles per litre back to grams per litre of solution.', 'h1' => 'Mass to Molar Concentration Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'mass_conc',
                    'label' => 'Mass concentration',
                    'type' => 'number',
                    'suffix' => 'g/L',
                    'default' => '10',
                    'help' => 'Grams of solute per litre of solution',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molar_mass',
                    'label' => 'Molar mass',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '58.44',
                    'help' => 'Molar mass of the solute',
                    'rounding' => ['omni', '0.0001'],
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
                    'name' => 'millimolarity',
                    'label' => 'Molar concentration',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mmol/L',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Mass to Molar Concentration',
            'results' => ['molarity' => 'mass_conc/molar_mass', 'millimolarity' => 'mass_conc/molar_mass*1000', 'mass_conc' => 'molarity*molar_mass', 'molar_mass' => 'mass_conc/molarity'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Mass concentration and molar concentration describe the same solution in two different currencies. One division converts between them: <strong>M = c<sub>m</sub> ÷ M<sub>r</sub></strong>, where the mass concentration is in g/L and the molar mass in g/mol.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Analytical methods are written either way depending on what the instrument measures. An HPLC method may call for 10 g/L while a kinetics experiment needs the same solution as 0.171 mol/L, and the only thing between them is the molar mass.</p><p>The page reports <strong>molar concentration (mol/L) and molar concentration (mmol/L)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Molar concentration (mol per L)</strong></td><td><code>Mass concentration ÷ Molar mass</code></td></tr><tr><td><strong>Molar concentration (mmol per L)</strong></td><td><code>Mass concentration ÷ Molar mass × 1000</code></td></tr><tr><td><strong>Mass concentration</strong></td><td><code>Molar concentration (mol per L) × Molar mass</code></td></tr><tr><td><strong>Molar mass</strong></td><td><code>Mass concentration ÷ Molar concentration (mol per L)</code></td></tr></tbody></table><p><p>The arithmetic is a single division, so the error budget is entirely in the molar mass. A salt bought as a hydrate has a molar mass several per cent higher than the anhydrous value on the method sheet.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports molar concentration (mol/L) and molar concentration (mmol/L).</p><ul><li><strong>Mass concentration</strong> — in g/L. Grams of solute per litre of solution</li><li><strong>Molar mass</strong> — in g/mol. Molar mass of the solute</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Molar concentration</strong> — in mol/L</li><li><strong>Molar concentration</strong> — in mmol/L</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Mass concentration = 10 g/L, Molar mass = 58.44 g/mol — and the results panel reads:</p><ul><li><strong>Molar concentration</strong> = <code>Mass concentration ÷ Molar mass</code> = <strong>0.171 mol/L</strong></li><li><strong>Molar concentration</strong> = <code>Mass concentration ÷ Molar mass × 1000</code> = <strong>171.116 mmol/L</strong></li></ul><p>With the numbers written into the formula, the first result is <code>10 ÷ 58.44 = 0.171</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>10 g/L of sodium chloride is 10 ÷ 58.44 = 0.171 mol/L, or 171 mmol/L. The mass figure sounds modest and the molar figure shows how strong the solution really is.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Sanity-check the answer against the mass: for anything with a molar mass near 100 g/mol, moles per litre is roughly a hundredth of grams per litre. Results far from that rule of thumb are worth re-reading.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Molar concentration</th><th>Molar concentration</th></tr></thead><tbody><tr><td><strong>Mass concentration</strong> +10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Molar mass</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Mass concentration</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Molar mass</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Mass concentration = 180.16, Molar mass = 180.16, the page reports <strong>Molar concentration</strong> = 1 mol/L, <strong>Molar concentration</strong> = 1 000 mmol/L. A molar mass in g/L is exactly 1 M — the quickest check there is.</li><li>With Mass concentration = 5, Molar mass = 50 000, the page reports <strong>Molar concentration</strong> = 0.0001 mol/L, <strong>Molar concentration</strong> = 0.1 mmol/L. A protein at 5 g/L and 50 kDa is only 0.1 mmol/L, which is why protein work is written in micromoles.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Mass concentration in mg/mL.</strong> That is numerically the same as g/L, so no conversion is needed — but 10 mg/mL is not 10 g/L.</li><li><strong>Molar mass of the wrong form.</strong> Anhydrous versus hydrated shifts the answer by the water of crystallisation.</li><li><strong>Mixing the units of the two boxes.</strong> The expression expects g/L and g/mol; anything else has to be converted first.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Molar concentration (mol/L), Molar concentration (mmol/L).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Both g/L and mg/mL describe the same concentration. The page takes g/L because that is the unit the expression needs; multiply a mg/mL figure by a thousand before typing it.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need mass concentration and molar mass. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Molar concentration (mol/l) and molar concentration (mmol/l) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Mass concentration</strong> ×10</td><td>0.171</td><td>1.711</td><td>ten times larger</td></tr><tr><td><strong>Molar mass</strong> ×10</td><td>0.171</td><td>0.017</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes the solute is fully dissolved and pure.</strong> A stated percent purity or a suspension changes the real concentration.</li><li><strong>It is an average over the whole solution.</strong> It says nothing about gradients or local concentrations at a surface.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Reconciling a method written in g/L with calculations written in mol/L.</li></li><li><li>Converting a label's strength into a molarity for a kinetics calculation.</li></li><li><li>Working out what dilution of a stock gives a target in either unit.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/concentration">Concentration</a> <a href="/chemistry/molarity">Molarity</a> <a href="/chemistry/percentage-concentration-to-molarity">Percent to molarity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mass to Molar Concentration calculator work out?', 'a' => <<<'TXT'
            It returns molar concentration (mol/L) and molar concentration (mmol/L) from mass concentration and molar mass. The relationship is Mass concentration ÷ Molar mass.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mass concentration (g/L), Molar mass (g/mol). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: mass concentration in g/L; molar mass in g/mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why does the answer depend on molar mass?', 'a' => <<<'TXT'
            Because grams and moles are different currencies. The molar mass is the exchange rate, so the same g/L figure is a strong solution for a small molecule and a dilute one for a protein.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/concentration', 'name' => 'Concentration'],
            ['path' => '/chemistry/molarity', 'name' => 'Molarity'],
            ['path' => '/chemistry/percentage-concentration-to-molarity', 'name' => 'Percent to molarity'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

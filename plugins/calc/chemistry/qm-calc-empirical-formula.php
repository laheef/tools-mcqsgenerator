<?php

/**
 * Empirical Formula Calculator
 * /chemistry/empirical-formula
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Empirical Formula Calculator',
    'meta' => ['title' => 'Empirical Formula Calculator: Percent to Subscript', 'description' => 'Turn a percentage composition into the simplest whole-number ratio of atoms, then scale that ratio up to the molecular formula using the compound\'s molar mass.', 'h1' => 'Empirical Formula Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'percent_a',
                    'label' => 'Mass of element A in 100 g',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '69.94',
                    'help' => 'Percentage by mass of the first element; in 100 g of sample this is also its mass in grams',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molar_mass_a',
                    'label' => 'Atomic mass of element A',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '55.845',
                    'help' => 'From the periodic table — iron is 55.845',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'percent_b',
                    'label' => 'Mass of element B in 100 g',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '30.06',
                    'help' => 'Percentage by mass of the second element',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molar_mass_b',
                    'label' => 'Atomic mass of element B',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '15.999',
                    'help' => 'Oxygen is 15.999',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'compound_molar_mass',
                    'label' => 'Molar mass of the compound',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '159.69',
                    'help' => 'From a mass spectrometry or freezing point measurement; use the empirical mass itself if you only want the ratio',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'mol_a',
                    'label' => 'Moles of element A per 100 g',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol',
                ],
                [
                    'name' => 'mol_b',
                    'label' => 'Moles of element B per 100 g',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol',
                ],
                [
                    'name' => 'ratio_a',
                    'label' => 'Subscript ratio for element A',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'ratio_b',
                    'label' => 'Subscript ratio for element B',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'multiplier',
                    'label' => 'Multiplier to the molecular formula',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Empirical Formula',
            'results' => [
                'mol_a' => 'percent_a/molar_mass_a',
                'mol_b' => 'percent_b/molar_mass_b',
                'ratio_a' => 'mol_a/min(mol_a,mol_b)',
                'ratio_b' => 'mol_b/min(mol_a,mol_b)',
                'multiplier' => 'compound_molar_mass/(mol_a/min(mol_a,mol_b)*molar_mass_a+mol_b/min(mol_a,mol_b)*molar_mass_b)',
                'percent_a' => 'mol_a*molar_mass_a',
                'molar_mass_a' => 'percent_a/mol_a',
                'percent_b' => 'mol_b*molar_mass_b',
                'molar_mass_b' => 'percent_b/mol_b',
                'compound_molar_mass' => 'multiplier*(ratio_a*molar_mass_a+ratio_b*molar_mass_b)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>An empirical formula is the smallest whole-number ratio of atoms a compound can have. Divide each element's percentage by its atomic mass to get moles, divide every mole figure by the smallest, and the quotients are the subscripts. Scale by the compound's molar mass and the same ratio becomes the molecular formula.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Percentages off an elemental analyser describe mass, and mass is not what a formula is written in. Moles are. The division by atomic mass is the whole conversion, and the ratio that comes out is the formula — no need to know the compound beforehand.</p><p>The page reports <strong>moles of element A per 100 g and moles of element B per 100 g and subscript ratio for element A and subscript ratio for element B and multiplier to the molecular formula</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Moles of element A per 100 g</strong></td><td><code>Mass of element A in 100 g ÷ Atomic mass of element A</code></td></tr><tr><td><strong>Moles of element B per 100 g</strong></td><td><code>Mass of element B in 100 g ÷ Atomic mass of element B</code></td></tr><tr><td><strong>Subscript ratio for element A</strong></td><td><code>Moles of element A per 100 g ÷ min(Moles of element A per 100 g,Moles of element B per 100 g)</code></td></tr><tr><td><strong>Subscript ratio for element B</strong></td><td><code>Moles of element B per 100 g ÷ min(Moles of element A per 100 g,Moles of element B per 100 g)</code></td></tr><tr><td><strong>Multiplier to the molecular formula</strong></td><td><code>Molar mass of the compound ÷ (Moles of element A per 100 g ÷ min(Moles of element A per 100 g,Moles of element B per 100 g) × Atomic mass of element A+Moles of element B per 100 g ÷ min(Moles of element A per 100 g,Moles of element B per 100 g) × Atomic mass of element B)</code></td></tr><tr><td><strong>Mass of element A in 100 g</strong></td><td><code>Moles of element A per 100 g × Atomic mass of element A</code></td></tr><tr><td><strong>Atomic mass of element A</strong></td><td><code>Mass of element A in 100 g ÷ Moles of element A per 100 g</code></td></tr><tr><td><strong>Mass of element B in 100 g</strong></td><td><code>Moles of element B per 100 g × Atomic mass of element B</code></td></tr><tr><td><strong>Atomic mass of element B</strong></td><td><code>Mass of element B in 100 g ÷ Moles of element B per 100 g</code></td></tr><tr><td><strong>Molar mass of the compound</strong></td><td><code>Multiplier to the molecular formula × (Subscript ratio for element A × Atomic mass of element A+Subscript ratio for element B × Atomic mass of element B)</code></td></tr></tbody></table><p><p>The multiplier is the compound's molar mass divided by the mass of the empirical unit. Iron oxide at 1 : 1.5 has an empirical mass of 79.85 g/mol; a measured 159.69 g/mol is exactly twice that, so the molecular formula is Fe₂O₃, not FeO₁.₅.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports moles of element A per 100 g and moles of element B per 100 g and subscript ratio for element A and subscript ratio for element B and multiplier to the molecular formula.</p><ul><li><strong>Mass of element A in 100 g</strong> — in %. Percentage by mass of the first element; in 100 g of sample this is also its mass in grams</li><li><strong>Atomic mass of element A</strong> — in g/mol. From the periodic table — iron is 55.845</li><li><strong>Mass of element B in 100 g</strong> — in %. Percentage by mass of the second element</li><li><strong>Atomic mass of element B</strong> — in g/mol. Oxygen is 15.999</li><li><strong>Molar mass of the compound</strong> — in g/mol. From a mass spectrometry or freezing point measurement; use the empirical mass itself if you only want the ratio</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Moles of element A per 100 g</strong> — in mol</li><li><strong>Moles of element B per 100 g</strong> — in mol</li><li><strong>Subscript ratio for element A</strong></li><li><strong>Subscript ratio for element B</strong></li><li><strong>Multiplier to the molecular formula</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Mass of element A in 100 g = 69.94 %, Atomic mass of element A = 55.845 g/mol, Mass of element B in 100 g = 30.06 %, Atomic mass of element B = 15.999 g/mol, Molar mass of the compound = 159.69 g/mol — and the results panel reads:</p><ul><li><strong>Moles of element A per 100 g</strong> = <code>Mass of element A in 100 g ÷ Atomic mass of element A</code> = <strong>1.252 mol</strong></li><li><strong>Moles of element B per 100 g</strong> = <code>Mass of element B in 100 g ÷ Atomic mass of element B</code> = <strong>1.879 mol</strong></li><li><strong>Subscript ratio for element A</strong> = <code>Moles of element A per 100 g ÷ min(Moles of element A per 100 g,Moles of element B per 100 g)</code> = <strong>1</strong></li><li><strong>Subscript ratio for element B</strong> = <code>Moles of element B per 100 g ÷ min(Moles of element A per 100 g,Moles of element B per 100 g)</code> = <strong>1.5</strong></li><li><strong>Multiplier to the molecular formula</strong> = <code>Molar mass of the compound ÷ (Moles of element A per 100 g ÷ min(Moles of element A per 100 g,Moles of element B per 100 g) × Atomic mass of element A+Moles of element B per 100 g ÷ min(Moles of element A per 100 g,Moles of element B per 100 g) × Atomic mass of element B)</code> = <strong>2</strong></li></ul><p>With the numbers written into the formula, the first result is <code>69.94 ÷ 55.845 = 1.252</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>69.94 % iron and 30.06 % oxygen gives 1.252 mol of Fe and 1.879 mol of O per 100 g. Dividing both by 1.252 gives 1 and 1.5 — a ratio, not yet a formula, because subscripts are whole numbers.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>When a ratio lands near a half or a third, multiply the whole set: 1 : 1.5 is 2 : 3, and 1 : 1.33 is 3 : 4. When it lands near 0.98 or 1.02, round it to the integer — that spread is what the last two digits of an atomic mass are for.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Moles of element A per 100 g</th><th>Moles of element B per 100 g</th><th>Subscript ratio for element A</th><th>Subscript ratio for element B</th><th>Multiplier to the molecular formula</th></tr></thead><tbody><tr><td><strong>Mass of element A in 100 g</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td><td>+2.81 %</td></tr><tr><td><strong>Atomic mass of element A</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Mass of element B in 100 g</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>−2.92 %</td></tr><tr><td><strong>Atomic mass of element B</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td></tr><tr><td><strong>Molar mass of the compound</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Atomic mass of element A</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Atomic mass of element B</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Mass of element A in 100 g = 40, Atomic mass of element A = 12.011, Mass of element B in 100 g = 6.72, Atomic mass of element B = 1.008, Molar mass of the compound = 180.16, the page reports <strong>Moles of element A per 100 g</strong> = 3.33 mol, <strong>Moles of element B per 100 g</strong> = 6.667 mol, <strong>Subscript ratio for element A</strong> = 1, <strong>Subscript ratio for element B</strong> = 2.002, <strong>Multiplier to the molecular formula</strong> = 12.842. 40 % carbon and 6.72 % hydrogen give 1 : 2, and 180.16 g/mol makes that CH₂ unit fit six times — C₆H₁₂, which is only the whole story if the missing 53 % is oxygen.</li><li>With Mass of element A in 100 g = 63.65, Atomic mass of element A = 63.546, Mass of element B in 100 g = 36.35, Atomic mass of element B = 15.999, Molar mass of the compound = 79.545, the page reports <strong>Moles of element A per 100 g</strong> = 1.002 mol, <strong>Moles of element B per 100 g</strong> = 2.272 mol, <strong>Subscript ratio for element A</strong> = 1, <strong>Subscript ratio for element B</strong> = 2.268, <strong>Multiplier to the molecular formula</strong> = 0.797. Copper at 1 : 1 and a molar mass of 79.55 g/mol is CuO, the multiplier being one.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Dividing by the largest instead of the smallest.</strong> The smallest mole figure sets the scale; dividing by any other number gives a ratio nobody can read.</li><li><strong>Reporting 1.5 as a formula.</strong> Subscripts are integers. Multiply the whole ratio until every entry is whole, and say so in your answer.</li><li><strong>Using the molecular molar mass when the question asks for the empirical formula.</strong> The ratio is the empirical formula; only the multiplier turns it into the molecular one.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Moles of element A per 100 g (mol), Moles of element B per 100 g (mol), Subscript ratio for element A, Subscript ratio for element B, Multiplier to the molecular formula.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Percent by mass and grams are interchangeable here because the arithmetic is done per 100 g. Atomic and molar masses must both be in grams per mole, and the compound's molar mass on the same scale as the atomic masses — grams per mole throughout, not kilograms.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need mass of element A in 100 g and atomic mass of element A and mass of element B in 100 g and atomic mass of element B and molar mass of the compound. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Moles of element a per 100 g and moles of element b per 100 g and subscript ratio for element a and subscript ratio for element b and multiplier to the molecular formula should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Mass of element A in 100 g</strong> ×10</td><td>1.252</td><td>12.524</td><td>ten times larger</td></tr><tr><td><strong>Atomic mass of element A</strong> ×10</td><td>1.252</td><td>0.125</td><td>ten times smaller</td></tr><tr><td><strong>Mass of element B in 100 g</strong> ×10</td><td>1.252</td><td>1.252</td><td>unchanged</td></tr><tr><td><strong>Atomic mass of element B</strong> ×10</td><td>1.252</td><td>1.252</td><td>unchanged</td></tr><tr><td><strong>Molar mass of the compound</strong> ×10</td><td>1.252</td><td>1.252</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Two elements at a time.</strong> For a three-element compound, run the page twice or reduce all three mole figures by the same divisor by hand.</li><li><strong>It trusts the analysis.</strong> Percentages that do not sum to 100 mean unweighed oxygen, moisture or ash, and every ratio downstream inherits that error.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Turning combustion-analysis percentages into a formula.</li></li><li><li>Checking a supplier's stated formula against a measured composition.</li></li><li><li>Finding the molecular formula once the molar mass is known.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/percent-composition">Percent composition</a> <a href="/chemistry/molar-mass">Molar mass</a> <a href="/chemistry/mole">Mole</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Empirical Formula calculator work out?', 'a' => <<<'TXT'
            It returns moles of element A per 100 g and moles of element B per 100 g and subscript ratio for element A and subscript ratio for element B and multiplier to the molecular formula from mass of element A in 100 g and atomic mass of element A and mass of element B in 100 g and atomic mass of element B and molar mass of the compound. The relationship is Mass of element A in 100 g ÷ Atomic mass of element A.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Mass of element A in 100 g (%), Atomic mass of element A (g/mol), Mass of element B in 100 g (%), Atomic mass of element B (g/mol), Molar mass of the compound (g/mol). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: mass of element A in 100 g in %; atomic mass of element A in g/mol; mass of element B in 100 g in %; atomic mass of element B in g/mol; molar mass of the compound in g/mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is the difference between empirical and molecular formula?', 'a' => <<<'TXT'
            The empirical formula is the simplest ratio — CH₂O for glucose. The molecular formula is the ratio scaled by a whole number, C₆H₁₂O₆. Multiply the empirical unit's mass by the multiplier this page reports and you have the molecular formula.
            TXT],
            ['q' => 'What if the ratio comes out as 1.33?', 'a' => <<<'TXT'
            Multiply the whole ratio by three: 1 : 1.33 is 3 : 4. Half ratios scale by two, quarter ratios by four. A ratio that stays awkward after that usually means one percentage is wrong.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/percent-composition', 'name' => 'Percent composition'],
            ['path' => '/chemistry/molar-mass', 'name' => 'Molar mass'],
            ['path' => '/chemistry/mole', 'name' => 'Mole'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

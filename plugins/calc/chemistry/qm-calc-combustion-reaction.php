<?php

/**
 * Combustion Reaction Calculator
 * /chemistry/combustion-reaction
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Combustion Reaction Calculator',
    'meta' => ['title' => 'Combustion Reaction Calculator: Fuel, O₂, CO₂', 'description' => 'For a hydrocarbon fuel, work out the oxygen a given amount needs, and the carbon dioxide and water it produces, straight from the balanced equation itself.', 'h1' => 'Combustion Reaction Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'carbon_atoms',
                    'label' => 'Carbon atoms in the fuel molecule',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'n in CₙHₘ; methane is 1',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hydrogen_atoms',
                    'label' => 'Hydrogen atoms in the fuel molecule',
                    'type' => 'number',
                    'default' => '4',
                    'help' => 'm in CₙHₘ; methane is 4',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fuel_moles',
                    'label' => 'Moles of fuel burnt',
                    'type' => 'number',
                    'suffix' => 'mol',
                    'default' => '1',
                    'help' => 'Amount of fuel, in moles',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'oxygen_moles',
                    'label' => 'Oxygen required',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol',
                ],
                [
                    'name' => 'co2_moles',
                    'label' => 'Carbon dioxide produced',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol',
                ],
                [
                    'name' => 'water_moles',
                    'label' => 'Water produced',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol',
                ],
                [
                    'name' => 'oxygen_mass',
                    'label' => 'Mass of oxygen required',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Combustion Reaction',
            'results' => [
                'oxygen_moles' => 'fuel_moles*(carbon_atoms+hydrogen_atoms/4)',
                'co2_moles' => 'fuel_moles*carbon_atoms',
                'water_moles' => 'fuel_moles*hydrogen_atoms/2',
                'oxygen_mass' => 'fuel_moles*(carbon_atoms+hydrogen_atoms/4)*31.998',
                'fuel_moles' => 'co2_moles/carbon_atoms',
                'carbon_atoms' => 'co2_moles/fuel_moles',
                'hydrogen_atoms' => 'water_moles*2/fuel_moles',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Burning a hydrocarbon C<sub>n</sub>H<sub>m</sub> is fixed by one balance: <strong>C<sub>n</sub>H<sub>m</sub> + (n + m/4) O₂ → n CO₂ + (m/2) H₂O</strong>. Given the formula and the moles of fuel, the page reports the oxygen consumed and both products, in moles and in grams.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Every combustion calculation — a burner's air demand, a car's CO₂ output, a bomb calorimeter's oxygen charge — starts from this one balance. The formula alone fixes every coefficient, so nothing has to be looked up.</p><p>The page reports <strong>oxygen required and carbon dioxide produced and water produced and mass of oxygen required</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Oxygen required</strong></td><td><code>Moles of fuel burnt × (Carbon atoms in the fuel molecule+Hydrogen atoms in the fuel molecule ÷ 4)</code></td></tr><tr><td><strong>Carbon dioxide produced</strong></td><td><code>Moles of fuel burnt × Carbon atoms in the fuel molecule</code></td></tr><tr><td><strong>Water produced</strong></td><td><code>Moles of fuel burnt × Hydrogen atoms in the fuel molecule ÷ 2</code></td></tr><tr><td><strong>Mass of oxygen required</strong></td><td><code>Moles of fuel burnt × (Carbon atoms in the fuel molecule+Hydrogen atoms in the fuel molecule ÷ 4) × 31.998</code></td></tr><tr><td><strong>Moles of fuel burnt</strong></td><td><code>Carbon dioxide produced ÷ Carbon atoms in the fuel molecule</code></td></tr><tr><td><strong>Carbon atoms in the fuel molecule</strong></td><td><code>Carbon dioxide produced ÷ Moles of fuel burnt</code></td></tr><tr><td><strong>Hydrogen atoms in the fuel molecule</strong></td><td><code>Water produced × 2 ÷ Moles of fuel burnt</code></td></tr></tbody></table><p><p>Each carbon atom needs one O₂ to become CO₂; each pair of hydrogen atoms needs half an O₂ to become water. Adding them gives n + m/4, which is why methane needs two moles of oxygen for every mole burnt.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports oxygen required and carbon dioxide produced and water produced and mass of oxygen required.</p><ul><li><strong>Carbon atoms in the fuel molecule</strong>. n in CₙHₘ; methane is 1</li><li><strong>Hydrogen atoms in the fuel molecule</strong>. m in CₙHₘ; methane is 4</li><li><strong>Moles of fuel burnt</strong> — in mol. Amount of fuel, in moles</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Oxygen required</strong> — in mol</li><li><strong>Carbon dioxide produced</strong> — in mol</li><li><strong>Water produced</strong> — in mol</li><li><strong>Mass of oxygen required</strong> — in g</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Carbon atoms in the fuel molecule = 1, Hydrogen atoms in the fuel molecule = 4, Moles of fuel burnt = 1 mol — and the results panel reads:</p><ul><li><strong>Oxygen required</strong> = <code>Moles of fuel burnt × (Carbon atoms in the fuel molecule+Hydrogen atoms in the fuel molecule ÷ 4)</code> = <strong>2 mol</strong></li><li><strong>Carbon dioxide produced</strong> = <code>Moles of fuel burnt × Carbon atoms in the fuel molecule</code> = <strong>1 mol</strong></li><li><strong>Water produced</strong> = <code>Moles of fuel burnt × Hydrogen atoms in the fuel molecule ÷ 2</code> = <strong>2 mol</strong></li><li><strong>Mass of oxygen required</strong> = <code>Moles of fuel burnt × (Carbon atoms in the fuel molecule+Hydrogen atoms in the fuel molecule ÷ 4) × 31.998</code> = <strong>63.996 g</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1 × (1+4 ÷ 4) = 2</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>One mole of methane, CH₄: oxygen is 1 + 4 ÷ 4 = 2 mol, carbon dioxide is 1 mol, water is 2 mol. In mass terms that is 64.0 g of oxygen for 16.0 g of fuel — a ratio of four to one, which is why gas burners have large air ports.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Compare the oxygen the equation needs with the oxygen actually supplied. Equal amounts is stoichiometric, less is a reducing flame that leaves soot and carbon monoxide, more is an oxidising flame and a stack loss.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Oxygen required</th><th>Carbon dioxide produced</th><th>Water produced</th><th>Mass of oxygen required</th></tr></thead><tbody><tr><td><strong>Carbon atoms in the fuel molecule</strong> +10 %</td><td>+5 %</td><td>+10 %</td><td>+0 %</td><td>+5 %</td></tr><tr><td><strong>Hydrogen atoms in the fuel molecule</strong> +10 %</td><td>+5 %</td><td>+0 %</td><td>+10 %</td><td>+5 %</td></tr><tr><td><strong>Moles of fuel burnt</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Carbon atoms in the fuel molecule</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Moles of fuel burnt</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Carbon atoms in the fuel molecule = 8, Hydrogen atoms in the fuel molecule = 18, Moles of fuel burnt = 1, the page reports <strong>Oxygen required</strong> = 12.5 mol, <strong>Carbon dioxide produced</strong> = 8 mol, <strong>Water produced</strong> = 9 mol, <strong>Mass of oxygen required</strong> = 399.975 g. Octane needs 12.5 mol of oxygen per mole — a fractional coefficient that is normal in combustion and doubles cleanly to 25 O₂ for 2 C₈H₁₈.</li><li>With Carbon atoms in the fuel molecule = 2, Hydrogen atoms in the fuel molecule = 6, Moles of fuel burnt = 0.5, the page reports <strong>Oxygen required</strong> = 1.75 mol, <strong>Carbon dioxide produced</strong> = 1 mol, <strong>Water produced</strong> = 1.5 mol, <strong>Mass of oxygen required</strong> = 55.997 g. Half a mole of ethanol needs 1.5 mol of oxygen and gives 1 mol of CO₂.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using m/4 as the whole oxygen figure.</strong> The carbon term comes first; methane needs 2, not 1.</li><li><strong>Oxygenated fuels treated as hydrocarbons.</strong> Ethanol already carries an oxygen atom, so its own oxygen reduces the demand below what C₂H₆ alone would take.</li><li><strong>Incomplete combustion assumed.</strong> The equation describes complete burning to CO₂; a sooty flame follows a different balance and produces CO.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Oxygen required (mol), Carbon dioxide produced (mol), Water produced (mol), Mass of oxygen required (g).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Moles in, moles out. The mass result uses 31.998 g/mol for O₂ — if your answer is in kilograms, multiply by a thousand at the end rather than entering moles in kilomoles.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need carbon atoms in the fuel molecule and hydrogen atoms in the fuel molecule and moles of fuel burnt. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Oxygen required and carbon dioxide produced and water produced and mass of oxygen required should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Carbon atoms in the fuel molecule</strong> ×10</td><td>2</td><td>11</td><td>×5.5</td></tr><tr><td><strong>Hydrogen atoms in the fuel molecule</strong> ×10</td><td>2</td><td>11</td><td>×5.5</td></tr><tr><td><strong>Moles of fuel burnt</strong> ×10</td><td>2</td><td>20</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Hydrocarbons only.</strong> Fuels with oxygen, nitrogen or sulfur need those atoms in the balance; use this page for the carbon and hydrogen backbone and add the rest by hand.</li><li><strong>It assumes complete combustion.</strong> Real flames produce some CO and unburnt fuel, which is what an emissions measurement reports.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing the air supply for a burner.</li></li><li><li>Working out the CO₂ a given amount of fuel emits.</li></li><li><li>Checking a combustion equation you have balanced by hand.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/combustion-analysis">Combustion analysis</a> <a href="/chemistry/heat-of-combustion">Heat of combustion</a> <a href="/chemistry/molar-ratio">Molar ratio</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Combustion Reaction calculator work out?', 'a' => <<<'TXT'
            It returns oxygen required and carbon dioxide produced and water produced and mass of oxygen required from carbon atoms in the fuel molecule and hydrogen atoms in the fuel molecule and moles of fuel burnt. The relationship is Moles of fuel burnt × (Carbon atoms in the fuel molecule+Hydrogen atoms in the fuel molecule ÷ 4).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Carbon atoms in the fuel molecule, Hydrogen atoms in the fuel molecule, Moles of fuel burnt (mol). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: moles of fuel burnt in mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why does octane need 12.5 moles of oxygen?', 'a' => <<<'TXT'
            Because n + m/4 = 8 + 18/4 = 12.5. Fractions are fine in a balanced equation for a single molecule; double everything if you want whole numbers, which gives 2 C₈H₁₈ + 25 O₂.
            TXT],
            ['q' => 'Does this work for diesel and petrol?', 'a' => 'Approximately. Real fuels are mixtures, so use an average formula — roughly C₁₂H₂₃ for diesel — and treat the answer as an estimate.'],
        ],
        'related' => [
            ['path' => '/chemistry/combustion-analysis', 'name' => 'Combustion analysis'],
            ['path' => '/chemistry/heat-of-combustion', 'name' => 'Heat of combustion'],
            ['path' => '/chemistry/molar-ratio', 'name' => 'Molar ratio'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

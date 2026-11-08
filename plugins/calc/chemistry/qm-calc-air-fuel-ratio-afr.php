<?php

/**
 * Air-fuel ratio (AFR)
 * /chemistry/air-fuel-ratio-afr
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Air-fuel ratio (AFR)',
    'meta' => ['title' => 'Air-Fuel Ratio Calculator: AFR, Lambda, Excess', 'description' => 'Turn the masses of air and fuel you actually measured into an air-fuel ratio, then compare that ratio with stoichiometric to read lambda and excess air.', 'h1' => 'Air-fuel ratio (AFR)', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'air_mass',
                    'label' => 'Mass of air',
                    'type' => 'number',
                    'suffix' => 'kg',
                    'default' => '14.7',
                    'help' => 'Weighed or metered over the same interval as the fuel',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fuel_mass',
                    'label' => 'Mass of fuel',
                    'type' => 'number',
                    'suffix' => 'kg',
                    'default' => '1.0',
                    'help' => 'Use the same interval as the air',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'stoich_afr',
                    'label' => 'Stoichiometric AFR',
                    'type' => 'number',
                    'default' => '14.7',
                    'help' => '14.7 for gasoline, 14.5 for diesel, 17.2 for natural gas',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'afr',
                    'label' => 'Air-fuel ratio',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kg/kg',
                ],
                [
                    'name' => 'lambda',
                    'label' => 'Lambda (equivalence ratio)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'excess_air',
                    'label' => 'Excess air',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Air-fuel ratio (AFR)',
            'results' => [
                'afr' => 'air_mass/fuel_mass',
                'lambda' => 'air_mass/(fuel_mass*stoich_afr)',
                'excess_air' => '(air_mass/(fuel_mass*stoich_afr)-1)*100',
                'air_mass' => 'afr*fuel_mass',
                'fuel_mass' => 'air_mass/afr',
                'stoich_afr' => 'air_mass/(fuel_mass*lambda)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>The air-fuel ratio is the mass of air burned with each unit mass of fuel: <strong>AFR = m<sub>air</sub> ÷ m<sub>fuel</sub></strong>. Comparing it with the stoichiometric ratio gives lambda, and lambda minus one is the excess air, as a percentage.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>AFR is the number that decides everything downstream of the injector: how hot the flame runs, how much carbon monoxide leaves the tailpipe and whether a three-way catalyst can work at all. Every lambda sensor is really reporting this ratio, normalised to the fuel's own stoichiometry.</p><p>The page reports <strong>air-fuel ratio and lambda (equivalence ratio) and excess air</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Air-fuel ratio</strong></td><td><code>Mass of air ÷ Mass of fuel</code></td></tr><tr><td><strong>Lambda (equivalence ratio)</strong></td><td><code>Mass of air ÷ (Mass of fuel × Stoichiometric AFR)</code></td></tr><tr><td><strong>Excess air</strong></td><td><code>(Mass of air ÷ (Mass of fuel × Stoichiometric AFR)-1) × 100</code></td></tr><tr><td><strong>Mass of air</strong></td><td><code>Air-fuel ratio × Mass of fuel</code></td></tr><tr><td><strong>Mass of fuel</strong></td><td><code>Mass of air ÷ Air-fuel ratio</code></td></tr><tr><td><strong>Stoichiometric AFR</strong></td><td><code>Mass of air ÷ (Mass of fuel × Lambda (equivalence ratio))</code></td></tr></tbody></table><p><p>Lambda is AFR divided by the stoichiometric AFR. Below one means rich — there is not enough air to burn all the fuel; above one means lean. A lambda of 1.05 is five per cent excess air, which is where most engines cruise.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports air-fuel ratio and lambda (equivalence ratio) and excess air.</p><ul><li><strong>Mass of air</strong> — in kg. Weighed or metered over the same interval as the fuel</li><li><strong>Mass of fuel</strong> — in kg. Use the same interval as the air</li><li><strong>Stoichiometric AFR</strong>. 14.7 for gasoline, 14.5 for diesel, 17.2 for natural gas</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Air-fuel ratio</strong> — in kg/kg</li><li><strong>Lambda (equivalence ratio)</strong></li><li><strong>Excess air</strong> — in %</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Mass of air = 14.7 kg, Mass of fuel = 1 kg, Stoichiometric AFR = 14.7 — and the results panel reads:</p><ul><li><strong>Air-fuel ratio</strong> = <code>Mass of air ÷ Mass of fuel</code> = <strong>14.7 kg/kg</strong></li><li><strong>Lambda (equivalence ratio)</strong> = <code>Mass of air ÷ (Mass of fuel × Stoichiometric AFR)</code> = <strong>1</strong></li><li><strong>Excess air</strong> = <code>(Mass of air ÷ (Mass of fuel × Stoichiometric AFR)-1) × 100</code> = <strong>0 %</strong></li></ul><p>With the numbers written into the formula, the first result is <code>14.7 ÷ 1 = 14.7</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>14.7 kg of air to 1.0 kg of gasoline is an AFR of 14.7 and a lambda of 1.00, with no excess air. Drop the air to 12.5 kg and lambda is 0.85 — a rich mixture that makes power at the cost of carbon monoxide. Raise it to 15.4 kg and lambda is 1.05, the lean cruise point.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Spark-ignition engines run around lambda 0.9 at full load for maximum power and 1.05 to 1.1 when cruising for economy. Diesel runs lean throughout, usually between lambda 1.3 and 6 depending on load, because it is not throttled.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Air-fuel ratio</th><th>Lambda (equivalence ratio)</th><th>Excess air</th></tr></thead><tbody><tr><td><strong>Mass of air</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>—</td></tr><tr><td><strong>Mass of fuel</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>—</td></tr><tr><td><strong>Stoichiometric AFR</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>—</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Mass of air</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Stoichiometric AFR</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Mass of air = 12.5, Mass of fuel = 1, Stoichiometric AFR = 14.7, the page reports <strong>Air-fuel ratio</strong> = 12.5 kg/kg, <strong>Lambda (equivalence ratio)</strong> = 0.85, <strong>Excess air</strong> = -14.966 %. AFR 12.5, lambda 0.85 and −15 per cent excess air: a rich mixture, and the negative excess is how lambda less than one is usually reported.</li><li>With Mass of air = 17.2, Mass of fuel = 1, Stoichiometric AFR = 17.2, the page reports <strong>Air-fuel ratio</strong> = 17.2 kg/kg, <strong>Lambda (equivalence ratio)</strong> = 1, <strong>Excess air</strong> = 0 %. Natural gas at its own stoichiometric point: lambda 1.00, no excess air, and the same 17.2 ratio as methane's chemistry gives.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The wrong stoichiometric ratio.</strong> Using 14.7 for diesel makes the mixture look richer than it is; diesel's is about 14.5 and it normally runs far leaner.</li><li><strong>Air and fuel measured over different intervals.</strong> A ratio of two averages from different windows is not the ratio at any instant.</li><li><strong>Lambda read as excess air.</strong> Excess air is lambda minus one, expressed as a percentage; the two numbers differ by exactly that one.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Air-fuel ratio (kg/kg), Lambda (equivalence ratio), Excess air (%).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Both masses must be in the same unit, and the ratio is dimensionless. The stoichiometric AFR carries no unit either — it is kilograms of air per kilogram of fuel, which cancels.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need mass of air and mass of fuel and stoichiometric AFR. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Air-fuel ratio and lambda (equivalence ratio) and excess air should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Mass of air</strong> ×10</td><td>14.7</td><td>147</td><td>ten times larger</td></tr><tr><td><strong>Mass of fuel</strong> ×10</td><td>14.7</td><td>1.47</td><td>ten times smaller</td></tr><tr><td><strong>Stoichiometric AFR</strong> ×10</td><td>14.7</td><td>14.7</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It ignores combustion efficiency.</strong> Some fuel always leaves unburned, so measured AFR and the true air-fuel charge differ.</li><li><strong>It says nothing about the fuel's composition.</strong> Two fuels with the same AFR can have very different energy content.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a fuel-injection calibration.</li></li><li><li>Converting a lambda reading into an AFR for a given fuel.</li></li><li><li>Setting up an engine test cell.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/chemical-equation-balancer">Equation balancer</a> <a href="/chemistry/heat-of-combustion">Heat of combustion</a> <a href="/chemistry/mole">Mole</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Air-fuel ratio (AFR) calculator work out?', 'a' => <<<'TXT'
            It returns air-fuel ratio and lambda (equivalence ratio) and excess air from mass of air and mass of fuel and stoichiometric AFR. The relationship is Mass of air ÷ Mass of fuel.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mass of air (kg), Mass of fuel (kg), Stoichiometric AFR. Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: mass of air in kg; mass of fuel in kg. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is gasoline\'s stoichiometric AFR 14.7?', 'a' => <<<'TXT'
            Because octane's combustion consumes about 14.7 grams of air for every gram of fuel. The number follows directly from the balanced equation and the oxygen fraction of air.
            TXT],
            ['q' => 'What lambda is best for power?', 'a' => 'Around 0.85 to 0.90 on a spark-ignition engine: slightly rich cools the charge and prevents detonation, at the cost of fuel and emissions.'],
        ],
        'related' => [
            ['path' => '/chemistry/chemical-equation-balancer', 'name' => 'Equation balancer'],
            ['path' => '/chemistry/heat-of-combustion', 'name' => 'Heat of combustion'],
            ['path' => '/chemistry/mole', 'name' => 'Mole'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Heat of Combustion Calculator
 * /chemistry/heat-of-combustion
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Heat of Combustion Calculator',
    'meta' => ['title' => 'Heat of Combustion Calculator: kJ per Mole Burnt', 'description' => 'Turn a calorimeter\'s temperature rise into the heat released by a weighed sample, then into the molar and the specific heat of combustion for that fuel.', 'h1' => 'Heat of Combustion Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'sample_mass',
                    'label' => 'Mass of fuel burnt',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '0.5',
                    'help' => 'Weighed sample in the bomb',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molar_mass',
                    'label' => 'Molar mass of the fuel',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '46.07',
                    'help' => 'Ethanol is 46.07',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'temperature_rise',
                    'label' => 'Temperature rise',
                    'type' => 'number',
                    'suffix' => 'K',
                    'default' => '1.5',
                    'help' => 'ΔT of the water jacket; a kelvin and a Celsius degree are the same size',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'heat_capacity',
                    'label' => 'Heat capacity of the calorimeter',
                    'type' => 'number',
                    'suffix' => 'kJ/K',
                    'default' => '10.0',
                    'help' => 'From calibration with a known standard, usually benzoic acid',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'heat_released',
                    'label' => 'Heat released',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kJ',
                ],
                [
                    'name' => 'moles_burnt',
                    'label' => 'Moles of fuel burnt',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol',
                ],
                [
                    'name' => 'molar_heat',
                    'label' => 'Molar heat of combustion',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kJ/mol',
                ],
                [
                    'name' => 'specific_heat',
                    'label' => 'Specific heat of combustion',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kJ/g',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Heat of Combustion',
            'results' => [
                'heat_released' => 'heat_capacity*temperature_rise',
                'moles_burnt' => 'sample_mass/molar_mass',
                'molar_heat' => 'heat_capacity*temperature_rise/(sample_mass/molar_mass)',
                'specific_heat' => 'heat_capacity*temperature_rise/sample_mass',
                'sample_mass' => 'heat_capacity*temperature_rise/specific_heat',
                'molar_mass' => 'sample_mass/(heat_capacity*temperature_rise/molar_heat)',
                'temperature_rise' => 'molar_heat*(sample_mass/molar_mass)/heat_capacity',
                'heat_capacity' => 'molar_heat*(sample_mass/molar_mass)/temperature_rise',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A bomb calorimeter measures heat, not enthalpy directly: <strong>q = C × ΔT</strong>, where C is the calorimeter's heat capacity in kilojoules per kelvin. Divide the heat by the moles burnt and you have the molar heat of combustion in kJ/mol.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Heats of combustion are how fuel values are compared — megajoules per kilogram on a gas bill, kilojoules per mole in a textbook. A calorimeter gives the first directly and the second with one division by the molar mass.</p><p>The page reports <strong>heat released and moles of fuel burnt and molar heat of combustion and specific heat of combustion</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Heat released</strong></td><td><code>Heat capacity of the calorimeter × Temperature rise</code></td></tr><tr><td><strong>Moles of fuel burnt</strong></td><td><code>Mass of fuel burnt ÷ Molar mass of the fuel</code></td></tr><tr><td><strong>Molar heat of combustion</strong></td><td><code>Heat capacity of the calorimeter × Temperature rise ÷ (Mass of fuel burnt ÷ Molar mass of the fuel)</code></td></tr><tr><td><strong>Specific heat of combustion</strong></td><td><code>Heat capacity of the calorimeter × Temperature rise ÷ Mass of fuel burnt</code></td></tr><tr><td><strong>Mass of fuel burnt</strong></td><td><code>Heat capacity of the calorimeter × Temperature rise ÷ Specific heat of combustion</code></td></tr><tr><td><strong>Molar mass of the fuel</strong></td><td><code>Mass of fuel burnt ÷ (Heat capacity of the calorimeter × Temperature rise ÷ Molar heat of combustion)</code></td></tr><tr><td><strong>Temperature rise</strong></td><td><code>Molar heat of combustion × (Mass of fuel burnt ÷ Molar mass of the fuel) ÷ Heat capacity of the calorimeter</code></td></tr><tr><td><strong>Heat capacity of the calorimeter</strong></td><td><code>Molar heat of combustion × (Mass of fuel burnt ÷ Molar mass of the fuel) ÷ Temperature rise</code></td></tr></tbody></table><p><p>q = CΔT is the whole measurement: the heat capacity folds in the water, the bomb and the thermometer, which is why the vessel has to be calibrated with a substance whose heat of combustion is known exactly.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports heat released and moles of fuel burnt and molar heat of combustion and specific heat of combustion.</p><ul><li><strong>Mass of fuel burnt</strong> — in g. Weighed sample in the bomb</li><li><strong>Molar mass of the fuel</strong> — in g/mol. Ethanol is 46.07</li><li><strong>Temperature rise</strong> — in K. ΔT of the water jacket; a kelvin and a Celsius degree are the same size</li><li><strong>Heat capacity of the calorimeter</strong> — in kJ/K. From calibration with a known standard, usually benzoic acid</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Heat released</strong> — in kJ</li><li><strong>Moles of fuel burnt</strong> — in mol</li><li><strong>Molar heat of combustion</strong> — in kJ/mol</li><li><strong>Specific heat of combustion</strong> — in kJ/g</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Mass of fuel burnt = 0.5 g, Molar mass of the fuel = 46.07 g/mol, Temperature rise = 1.5 K, Heat capacity of the calorimeter = 10 kJ/K — and the results panel reads:</p><ul><li><strong>Heat released</strong> = <code>Heat capacity of the calorimeter × Temperature rise</code> = <strong>15 kJ</strong></li><li><strong>Moles of fuel burnt</strong> = <code>Mass of fuel burnt ÷ Molar mass of the fuel</code> = <strong>0.011 mol</strong></li><li><strong>Molar heat of combustion</strong> = <code>Heat capacity of the calorimeter × Temperature rise ÷ (Mass of fuel burnt ÷ Molar mass of the fuel)</code> = <strong>1 382.1 kJ/mol</strong></li><li><strong>Specific heat of combustion</strong> = <code>Heat capacity of the calorimeter × Temperature rise ÷ Mass of fuel burnt</code> = <strong>30 kJ/g</strong></li></ul><p>With the numbers written into the formula, the first result is <code>10 × 1.5 = 15</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>0.5 g of ethanol is 0.01085 mol. A 1.5 K rise with C = 10 kJ/K is 15 kJ, which is 1 382 kJ/mol and 30 kJ/g — within a couple of per cent of the accepted 1 367 kJ/mol for ethanol, which is what a good calorimeter run should give.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Bomb calorimetry gives the higher heating value, because the water formed is liquid. Real burners vent steam, so the lower heating value — about 10 % smaller for a hydrocarbon — is the number for fuel economy.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Heat released</th><th>Moles of fuel burnt</th><th>Molar heat of combustion</th><th>Specific heat of combustion</th></tr></thead><tbody><tr><td><strong>Mass of fuel burnt</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Molar mass of the fuel</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Temperature rise</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Heat capacity of the calorimeter</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Molar mass of the fuel</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Heat capacity of the calorimeter</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Mass of fuel burnt = 1, Molar mass of the fuel = 180.16, Temperature rise = 1.3, Heat capacity of the calorimeter = 12, the page reports <strong>Heat released</strong> = 15.6 kJ, <strong>Moles of fuel burnt</strong> = 0.006 mol, <strong>Molar heat of combustion</strong> = 2 810.496 kJ/mol, <strong>Specific heat of combustion</strong> = 15.6 kJ/g. 15.6 kJ from 1 g of glucose is 2 810 kJ/mol, and a carbohydrate is expected near 2 800.</li><li>With Mass of fuel burnt = 0.2, Molar mass of the fuel = 2.016, Temperature rise = 2.6, Heat capacity of the calorimeter = 11, the page reports <strong>Heat released</strong> = 28.6 kJ, <strong>Moles of fuel burnt</strong> = 0.099 mol, <strong>Molar heat of combustion</strong> = 288.288 kJ/mol, <strong>Specific heat of combustion</strong> = 143 kJ/g. 28.6 kJ from 0.2 g of hydrogen is 143 kJ/g — three times what methane releases per gram, and why hydrogen is a candidate fuel.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Heat capacity of the water only.</strong> The bomb, the stirrer and the thermometer absorb heat too; the calibrated value covers all of them.</li><li><strong>Moles forgotten.</strong> The calorimeter gives kilojoules per sample, not per mole — divide by n before quoting a molar figure.</li><li><strong>Sign convention dropped.</strong> Combustion releases heat, so ΔH is negative while q, as measured by the rise, is positive.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Heat released (kJ), Moles of fuel burnt (mol), Molar heat of combustion (kJ/mol), Specific heat of combustion (kJ/g).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Kilojoules, grams and moles. A temperature rise in kelvin and one in degrees Celsius are numerically identical, so no conversion is needed — but a rise in degrees Fahrenheit is not.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need mass of fuel burnt and molar mass of the fuel and temperature rise and heat capacity of the calorimeter. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Heat released and moles of fuel burnt and molar heat of combustion and specific heat of combustion should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Mass of fuel burnt</strong> ×10</td><td>15</td><td>15</td><td>unchanged</td></tr><tr><td><strong>Molar mass of the fuel</strong> ×10</td><td>15</td><td>15</td><td>unchanged</td></tr><tr><td><strong>Temperature rise</strong> ×10</td><td>15</td><td>150</td><td>ten times larger</td></tr><tr><td><strong>Heat capacity of the calorimeter</strong> ×10</td><td>15</td><td>150</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It measures a constant-volume process.</strong> The bomb's heat is internal energy; converting to enthalpy at constant pressure needs the small PV work term.</li><li><strong>It assumes complete combustion.</strong> Soot or carbon monoxide means part of the sample never released its share.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Comparing fuels by energy per gram before buying them.</li></li><li><li>Converting a calorimetry practical's numbers into a molar enthalpy.</li></li><li><li>Checking a published heat of combustion against a measured one.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/combustion-reaction">Combustion reaction</a> <a href="/chemistry/gibbs-energy">Gibbs energy</a> <a href="/chemistry/entropy">Entropy</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Heat of Combustion calculator work out?', 'a' => <<<'TXT'
            It returns heat released and moles of fuel burnt and molar heat of combustion and specific heat of combustion from mass of fuel burnt and molar mass of the fuel and temperature rise and heat capacity of the calorimeter. The relationship is Heat capacity of the calorimeter × Temperature rise.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Mass of fuel burnt (g), Molar mass of the fuel (g/mol), Temperature rise (K), Heat capacity of the calorimeter (kJ/K). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: mass of fuel burnt in g; molar mass of the fuel in g/mol; temperature rise in K; heat capacity of the calorimeter in kJ/K. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is the measured value sometimes lower than the data book?', 'a' => <<<'TXT'
            Heat lost to the surroundings, incomplete combustion, and the difference between the higher and lower heating values. A few per cent below the literature figure is a clean experiment.
            TXT],
            ['q' => 'Should ΔH be negative here?', 'a' => 'Yes, for combustion. The heat released is positive as a quantity but the enthalpy change is negative, because the products hold less energy than the reactants.'],
        ],
        'related' => [
            ['path' => '/chemistry/combustion-reaction', 'name' => 'Combustion reaction'],
            ['path' => '/chemistry/gibbs-energy', 'name' => 'Gibbs energy'],
            ['path' => '/chemistry/entropy', 'name' => 'Entropy'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

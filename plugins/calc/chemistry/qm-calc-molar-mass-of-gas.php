<?php

/**
 * Molar Mass of Gas Calculator
 * /chemistry/molar-mass-of-gas
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Molar Mass of Gas Calculator',
    'meta' => ['title' => 'Molar Mass of Gas Calculator: From P, V and T', 'description' => 'Find the molar mass of an unknown gas from its mass, pressure, volume and temperature, using the ideal gas law rearranged for M, with density alongside.', 'h1' => 'Molar Mass of Gas Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'mass',
                    'label' => 'Mass of the gas',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '32',
                    'help' => 'The weighed mass of the sample',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pressure',
                    'label' => 'Pressure',
                    'type' => 'number',
                    'suffix' => 'kPa',
                    'default' => '101.325',
                    'help' => 'Absolute pressure, not gauge',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume',
                    'label' => 'Volume',
                    'type' => 'number',
                    'suffix' => 'L',
                    'default' => '22.414',
                    'help' => 'The volume the gas occupies',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'temperature',
                    'label' => 'Temperature',
                    'type' => 'number',
                    'suffix' => 'K',
                    'default' => '273.15',
                    'help' => 'Absolute temperature: add 273.15 to the Celsius reading',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molar_mass',
                    'label' => 'Molar mass',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g/mol',
                ],
                [
                    'name' => 'density',
                    'label' => 'Density at these conditions',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g/L',
                ],
                [
                    'name' => 'moles',
                    'label' => 'Moles in the sample',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Molar Mass of Gas',
            'results' => [
                'molar_mass' => 'mass*8.314*temperature/(pressure*volume)',
                'density' => 'mass/volume',
                'moles' => 'pressure*volume/(8.314*temperature)',
                'mass' => 'molar_mass*pressure*volume/(8.314*temperature)',
                'pressure' => 'mass*8.314*temperature/(molar_mass*volume)',
                'volume' => 'mass*8.314*temperature/(molar_mass*pressure)',
                'temperature' => 'molar_mass*pressure*volume/(mass*8.314)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Weigh a known volume of gas at a known pressure and temperature and the ideal gas law hands you the molar mass: <strong>M = mRT ÷ PV</strong>. It is the standard way to identify a gas you can weigh but cannot see.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Molar mass identifies a gas: 32 g/mol is oxygen, 44 carbon dioxide, 28 nitrogen. Weighing a flask of gas is easy; deciding what the number means is where the ideal gas law comes in.</p><p>The page reports <strong>molar mass and density at these conditions and moles in the sample</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Molar mass</strong></td><td><code>Mass of the gas × 8.314 × Temperature ÷ (Pressure × Volume)</code></td></tr><tr><td><strong>Density at these conditions</strong></td><td><code>Mass of the gas ÷ Volume</code></td></tr><tr><td><strong>Moles in the sample</strong></td><td><code>Pressure × Volume ÷ (8.314 × Temperature)</code></td></tr><tr><td><strong>Mass of the gas</strong></td><td><code>Molar mass × Pressure × Volume ÷ (8.314 × Temperature)</code></td></tr><tr><td><strong>Pressure</strong></td><td><code>Mass of the gas × 8.314 × Temperature ÷ (Molar mass × Volume)</code></td></tr><tr><td><strong>Volume</strong></td><td><code>Mass of the gas × 8.314 × Temperature ÷ (Molar mass × Pressure)</code></td></tr><tr><td><strong>Temperature</strong></td><td><code>Molar mass × Pressure × Volume ÷ (Mass of the gas × 8.314)</code></td></tr></tbody></table><p><p>R is 8.314 kPa·L per mole per kelvin, which is why the pressure is in kilopascals and the volume in litres. Using 0.08206 instead means switching pressure to atmospheres — the two mistakes cancel only by luck.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports molar mass and density at these conditions and moles in the sample.</p><ul><li><strong>Mass of the gas</strong> — in g. The weighed mass of the sample</li><li><strong>Pressure</strong> — in kPa. Absolute pressure, not gauge</li><li><strong>Volume</strong> — in L. The volume the gas occupies</li><li><strong>Temperature</strong> — in K. Absolute temperature: add 273.15 to the Celsius reading</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Molar mass</strong> — in g/mol</li><li><strong>Density at these conditions</strong> — in g/L</li><li><strong>Moles in the sample</strong> — in mol</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Mass of the gas = 32 g, Pressure = 101.325 kPa, Volume = 22.414 L, Temperature = 273.15 K — and the results panel reads:</p><ul><li><strong>Molar mass</strong> = <code>Mass of the gas × 8.314 × Temperature ÷ (Pressure × Volume)</code> = <strong>31.998 g/mol</strong></li><li><strong>Density at these conditions</strong> = <code>Mass of the gas ÷ Volume</code> = <strong>1.428 g/L</strong></li><li><strong>Moles in the sample</strong> = <code>Pressure × Volume ÷ (8.314 × Temperature)</code> = <strong>1 mol</strong></li></ul><p>With the numbers written into the formula, the first result is <code>32 × 8.314 × 273.15 ÷ (101.325 × 22.414) = 31.998</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>32 g of a gas filling 22.414 L at 101.325 kPa and 273.15 K gives M = 32 × 8.314 × 273.15 ÷ (101.325 × 22.414) = 32.0 g/mol, and one mole in the flask — which is oxygen.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Compare the answer with the periodic table: 28.01 is nitrogen or carbon monoxide, 44.01 is carbon dioxide or propane's cousin nitrous oxide. When two gases share a molar mass, the chemistry of the source decides between them.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Molar mass</th><th>Density at these conditions</th><th>Moles in the sample</th></tr></thead><tbody><tr><td><strong>Mass of the gas</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Pressure</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Volume</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Temperature</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Mass of the gas</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Volume</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Mass of the gas = 44, Pressure = 101.325, Volume = 22.414, Temperature = 273.15, the page reports <strong>Molar mass</strong> = 43.997 g/mol, <strong>Density at these conditions</strong> = 1.963 g/L, <strong>Moles in the sample</strong> = 1 mol. 44.0 g/mol at STP in one mole's volume is carbon dioxide.</li><li>With Mass of the gas = 0.572, Pressure = 95, Volume = 0.5, Temperature = 298.15, the page reports <strong>Molar mass</strong> = 29.85 g/mol, <strong>Density at these conditions</strong> = 1.144 g/L, <strong>Moles in the sample</strong> = 0.019 mol. Half a litre at 95 kPa in a warm room: about 29.8 g/mol, which is air.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Celsius entered as kelvin.</strong> 25 °C is 298.15 K; entering 25 changes the answer by more than a factor of ten.</li><li><strong>Gauge pressure used as absolute.</strong> A cylinder reading 200 kPa gauge is at about 300 kPa absolute, and the molar mass scales with the difference.</li><li><strong>A wet gas weighed as dry.</strong> Water vapour contributes mass but not molar mass of your gas, so a sample collected over water reads heavy.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Molar mass (g/mol), Density at these conditions (g/L), Moles in the sample (mol).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Kelvin, kilopascals, litres and grams throughout — that is what R = 8.314 expects. Mixing millilitres or atmospheres with this R offsets the answer by a factor of a thousand or a hundred.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need mass of the gas and pressure and volume and temperature. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Molar mass and density at these conditions and moles in the sample should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Mass of the gas</strong> ×10</td><td>31.998</td><td>319.982</td><td>ten times larger</td></tr><tr><td><strong>Pressure</strong> ×10</td><td>31.998</td><td>3.2</td><td>ten times smaller</td></tr><tr><td><strong>Volume</strong> ×10</td><td>31.998</td><td>3.2</td><td>ten times smaller</td></tr><tr><td><strong>Temperature</strong> ×10</td><td>31.998</td><td>319.982</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes ideal behaviour.</strong> Above a few atmospheres, real gases deviate and the answer drifts by a per cent or two.</li><li><strong>It assumes a pure sample.</strong> A mixture gives the average molar mass, which is a perfectly good number but not any single substance's.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Identifying an unknown gas from a weighed flask.</li></li><li><li>Checking that a cylinder holds what the label says.</li></li><li><li>Getting a molar mass for a vapour before running further analysis.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/standard-temperature-and-pressure">Gas volume at STP</a> <a href="/chemistry/molar-mass">Molar mass</a> <a href="/chemistry/mole">Mole</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Molar Mass of Gas calculator work out?', 'a' => <<<'TXT'
            It returns molar mass and density at these conditions and moles in the sample from mass of the gas and pressure and volume and temperature. The relationship is Mass of the gas × 8.314 × Temperature ÷ (Pressure × Volume).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mass of the gas (g), Pressure (kPa), Volume (L), Temperature (K). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: mass of the gas in g; pressure in kPa; volume in L; temperature in K. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Which R should I use?', 'a' => '8.314 with kilopascals and litres, or 0.08206 with atmospheres and litres. This page uses the first, so pressure must be in kPa.'],
            ['q' => 'Why is the answer slightly off the periodic table value?', 'a' => 'Real gases are not ideal, and a weighed flask has buoyancy and vapour errors. A per cent or two of deviation is normal; ten per cent means the sample is impure.'],
        ],
        'related' => [
            ['path' => '/chemistry/standard-temperature-and-pressure', 'name' => 'Gas volume at STP'],
            ['path' => '/chemistry/molar-mass', 'name' => 'Molar mass'],
            ['path' => '/chemistry/mole', 'name' => 'Mole'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Heat loss
 * /construction/heat-loss
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Heat loss',
    'meta' => ['title' => 'Heat Loss Calculator: U-Value, Area and Temperature', 'description' => 'Work out the transmission heat loss through a wall, roof or window from its area, U-value and the temperature difference across it. The formula is shown.', 'h1' => 'Heat loss', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'area',
                    'label' => 'Area',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '2000',
                    'help' => 'Surface being measured',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'u_value',
                    'label' => 'U-value',
                    'type' => 'number',
                    'suffix' => 'Btu/ft²·h·°F',
                    'default' => '0.1',
                    'help' => 'The assembly\'s conductance',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'delta_t',
                    'label' => 'Temperature difference',
                    'type' => 'number',
                    'suffix' => '°F',
                    'default' => '50',
                    'help' => 'Inside minus outside',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'loss_btu',
                    'label' => 'Heat loss',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'Btu/h',
                ],
                [
                    'name' => 'loss_kw',
                    'label' => 'Heat loss',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kW',
                ],
                [
                    'name' => 'loss_per_ft2',
                    'label' => 'Loss per ft²',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'Btu/ft²',
                ],
                [
                    'name' => 'r_value',
                    'label' => 'R-value',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²·h·°F/Btu',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Heat loss',
            'results' => [
                'loss_btu' => 'u_value*area*delta_t',
                'loss_kw' => 'u_value*area*delta_t/3412.14',
                'loss_per_ft2' => 'u_value*delta_t',
                'r_value' => '1/u_value',
                'area' => 'loss_btu/(u_value*delta_t)',
                'u_value' => 'loss_btu/(area*delta_t)',
                'delta_t' => 'loss_btu/(u_value*area)',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Heat loss = U × area × ΔT</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Heat leaves a building through its surfaces at a rate set by three things: how big the surface is, how well it insulates, and how cold it is outside. The U-value folds the whole wall assembly — sheathing, cavity, plasterboard — into one number.</p><p>The page reports <strong>heat loss (Btu/h) and heat loss (kW) and loss per ft² and r-value</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Heat loss (Btu per h)</strong></td><td><code>U-value × Area × Temperature difference</code></td></tr><tr><td><strong>Heat loss (kW)</strong></td><td><code>U-value × Area × Temperature difference ÷ 3412.14</code></td></tr><tr><td><strong>Loss per ft²</strong></td><td><code>U-value × Temperature difference</code></td></tr><tr><td><strong>R-value</strong></td><td><code>1 ÷ U-value</code></td></tr><tr><td><strong>Area</strong></td><td><code>Heat loss (Btu per h) ÷ (U-value × Temperature difference)</code></td></tr><tr><td><strong>U-value</strong></td><td><code>Heat loss (Btu per h) ÷ (Area × Temperature difference)</code></td></tr><tr><td><strong>Temperature difference</strong></td><td><code>Heat loss (Btu per h) ÷ (U-value × Area)</code></td></tr></tbody></table><p><p>U-value times area times the temperature difference gives Btu per hour. The U-value is the reciprocal of the R-value that insulation is sold by, so a wall of R-13 is about U-0.077 before the framing and air films are counted.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports heat loss (Btu/h) and heat loss (kW) and loss per ft² and r-value.</p><ul><li><strong>Area</strong> — in ft². Surface being measured</li><li><strong>U-value</strong> — in Btu/ft²·h·°F. The assembly&#x27;s conductance</li><li><strong>Temperature difference</strong> — in °F. Inside minus outside</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Heat loss</strong> — in Btu/h</li><li><strong>Heat loss</strong> — in kW</li><li><strong>Loss per ft²</strong> — in Btu/ft²</li><li><strong>R-value</strong> — in ft²·h·°F/Btu</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Area = 2 000 ft², U-value = 0.1 Btu/ft²·h·°F, Temperature difference = 50 °F — and the results panel reads:</p><ul><li><strong>Heat loss</strong> = <code>U-value × Area × Temperature difference</code> = <strong>10 000 Btu/h</strong></li><li><strong>Heat loss</strong> = <code>U-value × Area × Temperature difference ÷ 3412.14</code> = <strong>2.931 kW</strong></li><li><strong>Loss per ft²</strong> = <code>U-value × Temperature difference</code> = <strong>5 Btu/ft²</strong></li><li><strong>R-value</strong> = <code>1 ÷ U-value</code> = <strong>10 ft²·h·°F/Btu</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.1 × 2 000 × 50 = 10 000</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>2 000 ft² at U-0.1 across 50 °F loses 10 000 Btu/h, which is 2.931 kW — 5 Btu/ft² for every square foot. That U-value is an R-value of 10 ft²·h·°F/Btu.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the loss per square foot against the temperature difference: ten Btu an hour for each square foot per fifty degrees is a reasonable wall. A figure three times that is an uninsulated assembly or a single-glazed window.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Heat loss</th><th>Heat loss</th><th>Loss per ft²</th><th>R-value</th></tr></thead><tbody><tr><td><strong>Area</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>U-value</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Temperature difference</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>U-value</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Area</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Area = 200, U-value = 0.5, Temperature difference = 50, the page reports <strong>Heat loss</strong> = 5 000 Btu/h, <strong>Heat loss</strong> = 1.465 kW, <strong>Loss per ft²</strong> = 25 Btu/ft², <strong>R-value</strong> = 2 ft²·h·°F/Btu. Two hundred square feet of single glazing: the loss dominates the wall.</li><li>With Area = 1 500, U-value = 0.03, the page reports <strong>Heat loss</strong> = 2 250 Btu/h, <strong>Heat loss</strong> = 0.659 kW, <strong>Loss per ft²</strong> = 1.5 Btu/ft², <strong>R-value</strong> = 33.333 ft²·h·°F/Btu. A well insulated roof with a low U-value.</li><li>With Area = 600, U-value = 0.08, Temperature difference = 70, the page reports <strong>Heat loss</strong> = 3 360 Btu/h, <strong>Heat loss</strong> = 0.985 kW, <strong>Loss per ft²</strong> = 5.6 Btu/ft², <strong>R-value</strong> = 12.5 ft²·h·°F/Btu. A cold snap on an older wall: the same assembly loses far more.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>R-value entered as U-value.</strong> They are reciprocals.</li><li><strong>Indoor temperature taken as the thermostat.</strong> Use the air temperature.</li><li><strong>Bridging ignored.</strong> Studs and joists conduct.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Heat loss (Btu/h), Heat loss (kW), Loss per ft² (Btu/ft²), R-value (ft²·h·°F/Btu).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Area in square feet, U-value in Btu per square foot per hour per Fahrenheit degree, temperatures in Fahrenheit, loss in Btu per hour and kilowatts.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need area and u-value and temperature difference. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Heat loss (btu/h) and heat loss (kw) and loss per ft² and r-value should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Area</strong> ×10</td><td>10 000</td><td>100 000</td><td>ten times larger</td></tr><tr><td><strong>U-value</strong> ×10</td><td>10 000</td><td>100 000</td><td>ten times larger</td></tr><tr><td><strong>Temperature difference</strong> ×10</td><td>10 000</td><td>100 000</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Steady state.</strong> Thermal mass delays and flattens the real curve.</li><li><strong>Conduction only.</strong> Air leakage is usually a separate and larger loss.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Comparing wall assemblies.</li></li><li><li>Sizing a heating system.</li></li><li><li>Checking whether new glazing pays.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/boiler-size">Boiler size</a> <a href="/construction/insulation">Insulation</a> <a href="/construction/furnace-size">Furnace size</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Heat loss calculator work out?', 'a' => <<<'TXT'
            It returns heat loss (Btu/h) and heat loss (kW) and loss per ft² and r-value from area and u-value and temperature difference. The relationship is U-value × Area × Temperature difference.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Area (ft²), U-value (Btu/ft²·h·°F), Temperature difference (°F). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: area in ft²; u-value in Btu/ft²·h·°F; temperature difference in °F. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is a good U-value?', 'a' => 'Below 0.2 for a wall in a cold climate; single glazing is about 1.0.'],
            ['q' => 'How do I convert R-value to U-value?', 'a' => 'Divide one by the R-value.'],
        ],
        'related' => [
            ['path' => '/construction/boiler-size', 'name' => 'Boiler size'],
            ['path' => '/construction/insulation', 'name' => 'Insulation'],
            ['path' => '/construction/furnace-size', 'name' => 'Furnace size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Boiler size
 * /construction/boiler-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Boiler size',
    'meta' => ['title' => 'Boiler Size Calculator: Heat Load, Output and kW', 'description' => 'Size a boiler from the heated floor area and a heat load per square foot, with the gross load, the output after efficiency and the kW rating. Units shown.', 'h1' => 'Boiler size', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'heated_area',
                    'label' => 'Heated area',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '2000',
                    'help' => 'Conditioned floor area',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'btu_per_ft2',
                    'label' => 'Heat load',
                    'type' => 'number',
                    'suffix' => 'Btu/ft²',
                    'default' => '40',
                    'help' => 'Forty for an older house',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'efficiency',
                    'label' => 'Efficiency',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '85',
                    'help' => 'Seasonal efficiency',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'load_btu',
                    'label' => 'Heat load',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'Btu/h',
                ],
                [
                    'name' => 'output_btu',
                    'label' => 'Boiler output',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'Btu/h',
                ],
                [
                    'name' => 'load_kw',
                    'label' => 'Heat load',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kW',
                ],
                [
                    'name' => 'output_kw',
                    'label' => 'Output',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kW',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Boiler size',
            'results' => [
                'load_btu' => 'heated_area*btu_per_ft2',
                'output_btu' => 'heated_area*btu_per_ft2/(efficiency/100)',
                'load_kw' => 'heated_area*btu_per_ft2/3412.14',
                'output_kw' => 'heated_area*btu_per_ft2/(efficiency/100)/3412.14',
                'heated_area' => 'load_btu/btu_per_ft2',
                'btu_per_ft2' => 'load_btu/heated_area',
                'efficiency' => 'load_btu/output_btu*100',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Load = area × Btu per ft²</strong>; <strong>boiler output = load ÷ efficiency</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A boiler is rated on its output, but the house needs a load. The gap between the two is the efficiency: a boiler that is eighty five per cent efficient has to burn more than the house loses, and the difference is what goes up the flue.</p><p>The page reports <strong>heat load (Btu/h) and boiler output and heat load (kW) and output</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Heat load (Btu per h)</strong></td><td><code>Heated area × Heat load</code></td></tr><tr><td><strong>Boiler output</strong></td><td><code>Heated area × Heat load ÷ (Efficiency ÷ 100)</code></td></tr><tr><td><strong>Heat load (kW)</strong></td><td><code>Heated area × Heat load ÷ 3412.14</code></td></tr><tr><td><strong>Output</strong></td><td><code>Heated area × Heat load ÷ (Efficiency ÷ 100) ÷ 3412.14</code></td></tr><tr><td><strong>Heated area</strong></td><td><code>Heat load (Btu per h) ÷ Heat load</code></td></tr><tr><td><strong>Heat load</strong></td><td><code>Heat load (Btu per h) ÷ Heated area</code></td></tr><tr><td><strong>Efficiency</strong></td><td><code>Heat load (Btu per h) ÷ Boiler output × 100</code></td></tr></tbody></table><p><p>The heated area times the load per square foot gives the heat the house loses on the design day. Dividing that by the seasonal efficiency gives the output the boiler must be capable of, and both are converted to kilowatts at three thousand four hundred and twelve Btu per kilowatt hour.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports heat load (Btu/h) and boiler output and heat load (kW) and output.</p><ul><li><strong>Heated area</strong> — in ft². Conditioned floor area</li><li><strong>Heat load</strong> — in Btu/ft². Forty for an older house</li><li><strong>Efficiency</strong> — in %. Seasonal efficiency</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Heat load</strong> — in Btu/h</li><li><strong>Boiler output</strong> — in Btu/h</li><li><strong>Heat load</strong> — in kW</li><li><strong>Output</strong> — in kW</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Heated area = 2 000 ft², Heat load = 40 Btu/ft², Efficiency = 85 % — and the results panel reads:</p><ul><li><strong>Heat load</strong> = <code>Heated area × Heat load</code> = <strong>80 000 Btu/h</strong></li><li><strong>Boiler output</strong> = <code>Heated area × Heat load ÷ (Efficiency ÷ 100)</code> = <strong>94 117.647 Btu/h</strong></li><li><strong>Heat load</strong> = <code>Heated area × Heat load ÷ 3412.14</code> = <strong>23.446 kW</strong></li><li><strong>Output</strong> = <code>Heated area × Heat load ÷ (Efficiency ÷ 100) ÷ 3412.14</code> = <strong>27.583 kW</strong></li></ul><p>With the numbers written into the formula, the first result is <code>2 000 × 40 = 80 000</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>2 000 ft² at 40 Btu/ft² is a 80 000 Btu/h load — 23.446 kW. At 85 % efficiency the boiler must deliver 94 117.647 Btu/h, which is 27.583 kW.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the output against the load: they differ by the efficiency. Much more than a fifth and the efficiency is low enough that the fuel bill, not the boiler, is the problem to fix first.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Heat load</th><th>Boiler output</th><th>Heat load</th><th>Output</th></tr></thead><tbody><tr><td><strong>Heated area</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Heat load</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Efficiency</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Heated area</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Efficiency</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Heated area = 1 200, Heat load = 30, Efficiency = 92, the page reports <strong>Heat load</strong> = 36 000 Btu/h, <strong>Boiler output</strong> = 39 130.435 Btu/h, <strong>Heat load</strong> = 10.551 kW, <strong>Output</strong> = 11.468 kW. A small, well insulated house with a condensing boiler.</li><li>With Heated area = 3 500, Heat load = 50, the page reports <strong>Heat load</strong> = 175 000 Btu/h, <strong>Boiler output</strong> = 205 882.353 Btu/h, <strong>Heat load</strong> = 51.287 kW, <strong>Output</strong> = 60.338 kW. A large older house in a cold climate.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Output read as input.</strong> The rating plate gives the output.</li><li><strong>Efficiency taken as a hundred.</strong> Nothing is lossless.</li><li><strong>Domestic hot water left out.</strong> It can size the boiler on its own.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Heat load (Btu/h), Boiler output (Btu/h), Heat load (kW), Output (kW).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Area in square feet, load in Btu per square foot, capacity in Btu per hour and kilowatts, efficiency in per cent.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need heated area and heat load and efficiency. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Heat load (btu/h) and boiler output and heat load (kw) and output should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Heated area</strong> ×10</td><td>80 000</td><td>800 000</td><td>ten times larger</td></tr><tr><td><strong>Heat load</strong> ×10</td><td>80 000</td><td>800 000</td><td>ten times larger</td></tr><tr><td><strong>Efficiency</strong> ×10</td><td>80 000</td><td>80 000</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Steady state only.</strong> Cycling losses are separate.</li><li><strong>No pipework or radiator sizing.</strong></li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing a replacement boiler.</li></li><li><li>Checking a quote against the load.</li></li><li><li>Comparing kW ratings across models.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/heat-loss">Heat loss</a> <a href="/construction/furnace-size">Furnace size</a> <a href="/construction/ac-tonnage">AC tonnage</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Boiler size calculator work out?', 'a' => <<<'TXT'
            It returns heat load (Btu/h) and boiler output and heat load (kW) and output from heated area and heat load and efficiency. The relationship is Heated area × Heat load.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Heated area (ft²), Heat load (Btu/ft²), Efficiency (%). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: heated area in ft²; heat load in Btu/ft²; efficiency in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How big a boiler do I need for 2 000 square feet?', 'a' => 'About eighty thousand Btu of load, so a little over ninety thousand of output at eighty five per cent.'],
            ['q' => 'Should the boiler be oversized?', 'a' => 'No — a boiler that is too large cycles and wastes fuel.'],
        ],
        'related' => [
            ['path' => '/construction/heat-loss', 'name' => 'Heat loss'],
            ['path' => '/construction/furnace-size', 'name' => 'Furnace size'],
            ['path' => '/construction/ac-tonnage', 'name' => 'AC tonnage'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

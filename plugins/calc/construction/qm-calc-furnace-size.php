<?php

/**
 * Furnace size
 * /construction/furnace-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Furnace size',
    'meta' => ['title' => 'Furnace Size Calculator: Btu Output from Airflow', 'description' => 'Size a furnace from the airflow and the temperature rise it is designed for, with the output, the input fuel and the kilowatt equivalent. Units shown.', 'h1' => 'Furnace size', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'cfm',
                    'label' => 'Airflow',
                    'type' => 'number',
                    'suffix' => 'cfm',
                    'default' => '1200',
                    'help' => 'Through the furnace',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'temp_rise',
                    'label' => 'Temperature rise',
                    'type' => 'number',
                    'suffix' => '°F',
                    'default' => '40',
                    'help' => 'Return to supply',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'efficiency',
                    'label' => 'Efficiency',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '80',
                    'help' => 'AFUE of the furnace',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'output_btu',
                    'label' => 'Output',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'Btu/h',
                ],
                [
                    'name' => 'input_btu',
                    'label' => 'Input',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'Btu/h',
                ],
                [
                    'name' => 'output_kw',
                    'label' => 'Output',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kW',
                ],
                [
                    'name' => 'cfm_per_ton',
                    'label' => 'Airflow per ton',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cfm/ton',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Furnace size',
            'results' => [
                'output_btu' => 'cfm*1.08*temp_rise',
                'input_btu' => 'cfm*1.08*temp_rise/(efficiency/100)',
                'output_kw' => 'cfm*1.08*temp_rise/3412.14',
                'cfm_per_ton' => 'cfm/(cfm*1.08*temp_rise/12000)',
                'cfm' => 'output_btu/(1.08*temp_rise)',
                'temp_rise' => 'output_btu/(cfm*1.08)',
                'efficiency' => 'output_btu/input_btu*100',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Output = cfm × 1.08 × temperature rise</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A furnace is matched to its ductwork, not the other way round. The same cabinet can deliver very different heat depending on how much air moves through it and how much the air is allowed to warm, which is why the rating plate lists a rise range.</p><p>The page reports <strong>output (Btu/h) and input and output (kW) and airflow per ton</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Output (Btu per h)</strong></td><td><code>Airflow × 1.08 × Temperature rise</code></td></tr><tr><td><strong>Input</strong></td><td><code>Airflow × 1.08 × Temperature rise ÷ (Efficiency ÷ 100)</code></td></tr><tr><td><strong>Output (kW)</strong></td><td><code>Airflow × 1.08 × Temperature rise ÷ 3412.14</code></td></tr><tr><td><strong>Airflow per ton</strong></td><td><code>Airflow ÷ (Airflow × 1.08 × Temperature rise ÷ 12000)</code></td></tr><tr><td><strong>Airflow</strong></td><td><code>Output (Btu per h) ÷ (1.08 × Temperature rise)</code></td></tr><tr><td><strong>Temperature rise</strong></td><td><code>Output (Btu per h) ÷ (Airflow × 1.08)</code></td></tr><tr><td><strong>Efficiency</strong></td><td><code>Output (Btu per h) ÷ Input × 100</code></td></tr></tbody></table><p><p>1.08 is the heat carried by a cubic foot of air per minute per degree — the density and specific heat rolled together. Airflow times the rise gives the output, and dividing by the efficiency gives the gas or oil input the burner must supply.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports output (Btu/h) and input and output (kW) and airflow per ton.</p><ul><li><strong>Airflow</strong> — in cfm. Through the furnace</li><li><strong>Temperature rise</strong> — in °F. Return to supply</li><li><strong>Efficiency</strong> — in %. AFUE of the furnace</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Output</strong> — in Btu/h</li><li><strong>Input</strong> — in Btu/h</li><li><strong>Output</strong> — in kW</li><li><strong>Airflow per ton</strong> — in cfm/ton</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Airflow = 1 200 cfm, Temperature rise = 40 °F, Efficiency = 80 % — and the results panel reads:</p><ul><li><strong>Output</strong> = <code>Airflow × 1.08 × Temperature rise</code> = <strong>51 840 Btu/h</strong></li><li><strong>Input</strong> = <code>Airflow × 1.08 × Temperature rise ÷ (Efficiency ÷ 100)</code> = <strong>64 800 Btu/h</strong></li><li><strong>Output</strong> = <code>Airflow × 1.08 × Temperature rise ÷ 3412.14</code> = <strong>15.193 kW</strong></li><li><strong>Airflow per ton</strong> = <code>Airflow ÷ (Airflow × 1.08 × Temperature rise ÷ 12000)</code> = <strong>277.778 cfm/ton</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1 200 × 1.08 × 40 = 51 840</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>1 200 cfm of air rising 40 °F carries 51 840 Btu/h — 15.193 kW. At 80 % efficiency the burner input is 64 800 Btu/h, and the airflow is 277.778 cfm/ton of cooling equivalent.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the rise against the plate range: most furnaces want thirty five to sixty five degrees. A rise above seventy means too little air, and the heat exchanger will suffer for it.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Output</th><th>Input</th><th>Output</th><th>Airflow per ton</th></tr></thead><tbody><tr><td><strong>Airflow</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>−2.046 × 10<sup>-14</sup> %</td></tr><tr><td><strong>Temperature rise</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Efficiency</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Airflow</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Efficiency</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Airflow = 800, Temperature rise = 55, the page reports <strong>Output</strong> = 47 520 Btu/h, <strong>Input</strong> = 59 400 Btu/h, <strong>Output</strong> = 13.927 kW, <strong>Airflow per ton</strong> = 202.02 cfm/ton. Low airflow in a small duct system: a high rise for the heat.</li><li>With Airflow = 1 600, Temperature rise = 35, Efficiency = 96, the page reports <strong>Output</strong> = 60 480 Btu/h, <strong>Input</strong> = 63 000 Btu/h, <strong>Output</strong> = 17.725 kW, <strong>Airflow per ton</strong> = 317.46 cfm/ton. A condensing furnace moving a lot of gentle air.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Rise measured at one register.</strong> Measure at the plenum.</li><li><strong>Airflow taken from the fan curve.</strong> Measure it.</li><li><strong>Output read as input.</strong> The two differ by the efficiency.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Output (Btu/h), Input (Btu/h), Output (kW), Airflow per ton (cfm/ton).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Airflow in cfm, rise in Fahrenheit degrees, capacity in Btu per hour and kilowatts, efficiency in per cent.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need airflow and temperature rise and efficiency. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Output (btu/h) and input and output (kw) and airflow per ton should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Airflow</strong> ×10</td><td>51 840</td><td>518 400</td><td>ten times larger</td></tr><tr><td><strong>Temperature rise</strong> ×10</td><td>51 840</td><td>518 400</td><td>ten times larger</td></tr><tr><td><strong>Efficiency</strong> ×10</td><td>51 840</td><td>51 840</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Steady state.</strong> Cyclic losses reduce the seasonal average.</li><li><strong>No duct losses.</strong> Heat lost to an attic never reaches a room.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a furnace against its ductwork.</li></li><li><li>Sizing a replacement in an existing system.</li></li><li><li>Working out the temperature rise.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/heat-loss">Heat loss</a> <a href="/construction/boiler-size">Boiler size</a> <a href="/construction/cfm">CFM</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Furnace size calculator work out?', 'a' => <<<'TXT'
            It returns output (Btu/h) and input and output (kW) and airflow per ton from airflow and temperature rise and efficiency. The relationship is Airflow × 1.08 × Temperature rise.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Airflow (cfm), Temperature rise (°F), Efficiency (%). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: airflow in cfm; temperature rise in °F; efficiency in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What temperature rise should a furnace have?', 'a' => 'Typically thirty five to sixty five degrees Fahrenheit on the rating plate range.'],
            ['q' => 'How many cfm per ton of cooling?', 'a' => 'About four hundred, which the form reports from your own airflow and rise.'],
        ],
        'related' => [
            ['path' => '/construction/heat-loss', 'name' => 'Heat loss'],
            ['path' => '/construction/boiler-size', 'name' => 'Boiler size'],
            ['path' => '/construction/cfm', 'name' => 'CFM'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

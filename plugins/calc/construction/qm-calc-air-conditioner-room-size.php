<?php

/**
 * Air conditioner room size
 * /construction/air-conditioner-room-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Air conditioner room size',
    'meta' => ['title' => 'Air Conditioner Room Size Calculator: Area per Ton', 'description' => 'Work out how much floor area an air conditioner can cool from its tonnage and a load per square foot, in square feet and square metres. See the steps.', 'h1' => 'Air conditioner room size', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'tons',
                    'label' => 'Capacity',
                    'type' => 'number',
                    'suffix' => 'ton',
                    'default' => '1.5',
                    'help' => 'Rated cooling capacity',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'btu_per_ft2',
                    'label' => 'Cooling load',
                    'type' => 'number',
                    'suffix' => 'Btu/ft²',
                    'default' => '25',
                    'help' => 'Twenty five for a normal room',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'safety',
                    'label' => 'Allowance',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'For sun and appliances',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'btu',
                    'label' => 'Capacity',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'Btu/h',
                ],
                [
                    'name' => 'area_ft2',
                    'label' => 'Area served',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'area_m2',
                    'label' => 'Area served',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm²',
                ],
                [
                    'name' => 'kw',
                    'label' => 'Capacity',
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
            'title' => 'Air conditioner room size',
            'results' => [
                'btu' => 'tons*12000',
                'area_ft2' => 'tons*12000/(btu_per_ft2*(1+safety/100))',
                'area_m2' => 'tons*12000/(btu_per_ft2*(1+safety/100))/10.7639',
                'kw' => 'tons*12000/3412.14',
                'tons' => 'btu/12000',
                'btu_per_ft2' => 'btu/(area_ft2*(1+safety/100))',
                'safety' => '(btu/area_ft2/btu_per_ft2-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Btu = tons × 12 000</strong>, and the area it serves is <strong>Btu ÷ load per ft²</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The question is usually the other way round from the tonnage calculator: the unit is already chosen, and the job is to know what it will actually cool. Working from the capacity backwards keeps the answer honest about the allowance and the load.</p><p>The page reports <strong>capacity (Btu/h) and area served (ft²) and area served (m²) and capacity (kW)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Capacity (Btu per h)</strong></td><td><code>Capacity × 12000</code></td></tr><tr><td><strong>Area served (ft²)</strong></td><td><code>Capacity × 12000 ÷ (Cooling load × (1+Allowance ÷ 100))</code></td></tr><tr><td><strong>Area served (m²)</strong></td><td><code>Capacity × 12000 ÷ (Cooling load × (1+Allowance ÷ 100)) ÷ 10.7639</code></td></tr><tr><td><strong>Capacity (kW)</strong></td><td><code>Capacity × 12000 ÷ 3412.14</code></td></tr><tr><td><strong>Capacity</strong></td><td><code>Capacity (Btu per h) ÷ 12000</code></td></tr><tr><td><strong>Cooling load</strong></td><td><code>Capacity (Btu per h) ÷ (Area served (ft²) × (1+Allowance ÷ 100))</code></td></tr><tr><td><strong>Allowance</strong></td><td><code>(Capacity (Btu per h) ÷ Area served (ft²) ÷ Cooling load-1) × 100</code></td></tr></tbody></table><p><p>The rated tonnage converts to Btu at twelve thousand an hour, and the allowance means the real load per square foot is higher than the nominal one, so the served area is the capacity divided by the lifted load. Square metres are the same area divided by ten point seven six.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports capacity (Btu/h) and area served (ft²) and area served (m²) and capacity (kW).</p><ul><li><strong>Capacity</strong> — in ton. Rated cooling capacity</li><li><strong>Cooling load</strong> — in Btu/ft². Twenty five for a normal room</li><li><strong>Allowance</strong> — in %. For sun and appliances</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Capacity</strong> — in Btu/h</li><li><strong>Area served</strong> — in ft²</li><li><strong>Area served</strong> — in m²</li><li><strong>Capacity</strong> — in kW</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Capacity = 1.5 ton, Cooling load = 25 Btu/ft², Allowance = 10 % — and the results panel reads:</p><ul><li><strong>Capacity</strong> = <code>Capacity × 12000</code> = <strong>18 000 Btu/h</strong></li><li><strong>Area served</strong> = <code>Capacity × 12000 ÷ (Cooling load × (1+Allowance ÷ 100))</code> = <strong>654.545 ft²</strong></li><li><strong>Area served</strong> = <code>Capacity × 12000 ÷ (Cooling load × (1+Allowance ÷ 100)) ÷ 10.7639</code> = <strong>60.809 m²</strong></li><li><strong>Capacity</strong> = <code>Capacity × 12000 ÷ 3412.14</code> = <strong>5.275 kW</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1.5 × 12000 = 18 000</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 1.5 ton unit is 18 000 Btu/h, or 5.275 kW. At 25 Btu/ft² with a 10 % allowance it serves 654.545 ft², which is 60.809 m².</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the area against the tonnage: a ton per four hundred square feet of served floor is the familiar rule. A much larger area for the same tonnage means the allowance has been set to zero and the room will not keep up on a hot day.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Capacity</th><th>Area served</th><th>Area served</th><th>Capacity</th></tr></thead><tbody><tr><td><strong>Capacity</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Cooling load</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+0 %</td></tr><tr><td><strong>Allowance</strong> +10 %</td><td>+0 %</td><td>−0.9 %</td><td>−0.9 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Capacity</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Allowance</strong>, at 0.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Capacity = 2, Cooling load = 30, Allowance = 5, the page reports <strong>Capacity</strong> = 24 000 Btu/h, <strong>Area served</strong> = 761.905 ft², <strong>Area served</strong> = 70.783 m², <strong>Capacity</strong> = 7.034 kW. A larger unit in a hotter room: the area served shrinks.</li><li>With Capacity = 0.75, Allowance = 0, the page reports <strong>Capacity</strong> = 9 000 Btu/h, <strong>Area served</strong> = 360 ft², <strong>Area served</strong> = 33.445 m², <strong>Capacity</strong> = 2.638 kW. A small window unit with no allowance.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Capacity taken from the model number.</strong> Check the rated Btu.</li><li><strong>Open-plan space measured as separate rooms.</strong> Air moves between them.</li><li><strong>Tall ceilings ignored.</strong> Volume, not floor, carries the heat.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Capacity (Btu/h), Area served (ft²), Area served (m²), Capacity (kW).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Capacity in tons and Btu per hour, area in square feet and square metres, cooling in kW.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need capacity and cooling load and allowance. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Capacity (btu/h) and area served (ft²) and area served (m²) and capacity (kw) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Capacity</strong> ×10</td><td>18 000</td><td>180 000</td><td>ten times larger</td></tr><tr><td><strong>Cooling load</strong> ×10</td><td>18 000</td><td>18 000</td><td>unchanged</td></tr><tr><td><strong>Allowance</strong> ×10</td><td>18 000</td><td>18 000</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Rule of thumb.</strong> A room-by-room load calculation is more accurate.</li><li><strong>No duct losses.</strong> Delivered capacity is lower than rated.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a unit before buying.</li></li><li><li>Converting a model's tonnage to a room size.</li></li><li><li>Comparing metric and imperial listings.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/ac-tonnage">AC tonnage</a> <a href="/construction/heat-loss">Heat loss</a> <a href="/construction/furnace-size">Furnace size</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Air conditioner room size calculator work out?', 'a' => <<<'TXT'
            It returns capacity (Btu/h) and area served (ft²) and area served (m²) and capacity (kW) from capacity and cooling load and allowance. The relationship is Capacity × 12000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Capacity (ton), Cooling load (Btu/ft²), Allowance (%). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: capacity in ton; cooling load in Btu/ft²; allowance in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What size room will a 1.5 ton unit cool?', 'a' => 'Around six hundred and fifty square feet at a normal load with a ten per cent allowance.'],
            ['q' => 'How many kW is a ton of cooling?', 'a' => 'About three and a half kilowatts of cooling capacity.'],
        ],
        'related' => [
            ['path' => '/construction/ac-tonnage', 'name' => 'AC tonnage'],
            ['path' => '/construction/heat-loss', 'name' => 'Heat loss'],
            ['path' => '/construction/furnace-size', 'name' => 'Furnace size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * AC tonnage
 * /construction/ac-tonnage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'AC tonnage',
    'meta' => ['title' => 'AC Tonnage Calculator: Btu Load and Tons of Cooling', 'description' => 'Size an air conditioner from the room area and a load per square foot: the Btu load, the tonnage it needs and what that equipment costs. See the steps.', 'h1' => 'AC tonnage', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Room length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '20',
                    'help' => 'One side',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Room width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '15',
                    'help' => 'The other',
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
                    'name' => 'price_per_ton',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/ton',
                    'default' => '1200',
                    'help' => 'Installed equipment',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area_ft2',
                    'label' => 'Area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'btu',
                    'label' => 'Cooling load',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'Btu/h',
                ],
                [
                    'name' => 'tons',
                    'label' => 'Tonnage',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ton',
                ],
                [
                    'name' => 'cost',
                    'label' => 'Cost',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'AC tonnage',
            'results' => [
                'area_ft2' => 'length*width',
                'btu' => 'length*width*btu_per_ft2*(1+safety/100)',
                'tons' => 'length*width*btu_per_ft2*(1+safety/100)/12000',
                'cost' => 'length*width*btu_per_ft2*(1+safety/100)/12000*price_per_ton',
                'length' => 'area_ft2/width',
                'width' => 'area_ft2/length',
                'btu_per_ft2' => 'btu/(length*width*(1+safety/100))',
                'price_per_ton' => 'cost/tons',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Btu = area × load per ft² × (1 + safety)</strong>, and <strong>tons = Btu ÷ 12 000</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Air conditioners are sold in tons, and a ton of cooling is not a weight — it is twelve thousand Btu per hour, the old name for the heat a ton of ice absorbs in a day. Getting from a room's size to a tonnage is the first step in every equipment quote.</p><p>The page reports <strong>area and cooling load and tonnage and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Area</strong></td><td><code>Room length × Room width</code></td></tr><tr><td><strong>Cooling load</strong></td><td><code>Room length × Room width × Cooling load × (1+Allowance ÷ 100)</code></td></tr><tr><td><strong>Tonnage</strong></td><td><code>Room length × Room width × Cooling load × (1+Allowance ÷ 100) ÷ 12000</code></td></tr><tr><td><strong>Cost</strong></td><td><code>Room length × Room width × Cooling load × (1+Allowance ÷ 100) ÷ 12000 × Price</code></td></tr><tr><td><strong>Room length</strong></td><td><code>Area ÷ Room width</code></td></tr><tr><td><strong>Room width</strong></td><td><code>Area ÷ Room length</code></td></tr><tr><td><strong>Cooling load</strong></td><td><code>Cooling load ÷ (Room length × Room width × (1+Allowance ÷ 100))</code></td></tr><tr><td><strong>Price</strong></td><td><code>Cost ÷ Tonnage</code></td></tr></tbody></table><p><p>The area carries a load per square foot, which is a rule of thumb for the climate and the room, and the allowance lifts it for sun, people and appliances. Dividing by twelve thousand converts Btu to tons, the unit the equipment is sold in.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports area and cooling load and tonnage and cost.</p><ul><li><strong>Room length</strong> — in ft. One side</li><li><strong>Room width</strong> — in ft. The other</li><li><strong>Cooling load</strong> — in Btu/ft². Twenty five for a normal room</li><li><strong>Allowance</strong> — in %. For sun and appliances</li><li><strong>Price</strong> — in $/ton. Installed equipment</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Area</strong> — in ft²</li><li><strong>Cooling load</strong> — in Btu/h</li><li><strong>Tonnage</strong> — in ton</li><li><strong>Cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Room length = 20 ft, Room width = 15 ft, Cooling load = 25 Btu/ft², Allowance = 10 %, Price = 1 200 $/ton — and the results panel reads:</p><ul><li><strong>Area</strong> = <code>Room length × Room width</code> = <strong>300 ft²</strong></li><li><strong>Cooling load</strong> = <code>Room length × Room width × Cooling load × (1+Allowance ÷ 100)</code> = <strong>8 250 Btu/h</strong></li><li><strong>Tonnage</strong> = <code>Room length × Room width × Cooling load × (1+Allowance ÷ 100) ÷ 12000</code> = <strong>0.688 ton</strong></li><li><strong>Cost</strong> = <code>Room length × Room width × Cooling load × (1+Allowance ÷ 100) ÷ 12000 × Price</code> = <strong>825 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>20 × 15 = 300</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>300 ft² at 25 Btu/ft² with a 10 % allowance is 8 250 Btu/h of cooling, or 0.688 tons. The equipment costs 825 at the price shown.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the tonnage against the area: about one ton per four hundred square feet is typical for a home in a temperate climate. A figure near one ton per hundred square feet means the load per square foot has been entered for a commercial kitchen.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Area</th><th>Cooling load</th><th>Tonnage</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Room length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Room width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Cooling load</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Allowance</strong> +10 %</td><td>+0 %</td><td>+0.91 %</td><td>+0.91 %</td><td>+0.91 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Cooling load</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Allowance</strong>, at 0.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Room length = 30, Room width = 20, Cooling load = 30, the page reports <strong>Area</strong> = 600 ft², <strong>Cooling load</strong> = 19 800 Btu/h, <strong>Tonnage</strong> = 1.65 ton, <strong>Cost</strong> = 1 980 $. A large sunlit room with a heavier load per foot.</li><li>With Room length = 12, Room width = 10, Allowance = 0, the page reports <strong>Area</strong> = 120 ft², <strong>Cooling load</strong> = 3 000 Btu/h, <strong>Tonnage</strong> = 0.25 ton, <strong>Cost</strong> = 300 $. A small bedroom with no allowance at all.</li><li>With Room length = 12, Room width = 10, Allowance = 0, the page reports <strong>Area</strong> = 120 ft², <strong>Cooling load</strong> = 3 000 Btu/h, <strong>Tonnage</strong> = 0.25 ton, <strong>Cost</strong> = 300 $. A small bedroom with no allowance at all.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Tons assumed to be weight.</strong> They are 12 000 Btu/h each.</li><li><strong>Area taken from the floor plan with closets.</strong> Use the cooled space.</li><li><strong>Load copied from another house.</strong> Shade and insulation differ.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Area (ft²), Cooling load (Btu/h), Tonnage (ton), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Room dimensions in feet, load in Btu per square foot, capacity in tons of cooling.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need room length and room width and cooling load and allowance and price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Area and cooling load and tonnage and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Room length</strong> ×10</td><td>300</td><td>3 000</td><td>ten times larger</td></tr><tr><td><strong>Room width</strong> ×10</td><td>300</td><td>3 000</td><td>ten times larger</td></tr><tr><td><strong>Cooling load</strong> ×10</td><td>300</td><td>300</td><td>unchanged</td></tr><tr><td><strong>Allowance</strong> ×10</td><td>300</td><td>300</td><td>unchanged</td></tr><tr><td><strong>Price</strong> ×10</td><td>300</td><td>300</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Rule of thumb, not a Manual J.</strong> A real load calculation is room by room.</li><li><strong>No duct or line losses.</strong> Those are added by the installer.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing a window unit.</li></li><li><li>Checking a contractor's tonnage.</li></li><li><li>Budgeting equipment for a new room.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/furnace-size">Furnace size</a> <a href="/construction/heat-loss">Heat loss</a> <a href="/construction/cfm">CFM</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the AC tonnage calculator work out?', 'a' => <<<'TXT'
            It returns area and cooling load and tonnage and cost from room length and room width and cooling load and allowance and price. The relationship is Room length × Room width.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Room length (ft), Room width (ft), Cooling load (Btu/ft²), Allowance (%), Price ($/ton). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: room length in ft; room width in ft; cooling load in Btu/ft²; allowance in %; price in $/ton. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many square feet does a ton cool?', 'a' => 'About four hundred in a normal home, less in a hot climate or a poorly insulated room.'],
            ['q' => 'How many Btu is a ton of cooling?', 'a' => 'Twelve thousand per hour.'],
        ],
        'related' => [
            ['path' => '/construction/furnace-size', 'name' => 'Furnace size'],
            ['path' => '/construction/heat-loss', 'name' => 'Heat loss'],
            ['path' => '/construction/cfm', 'name' => 'CFM'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

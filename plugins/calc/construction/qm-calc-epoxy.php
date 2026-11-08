<?php

/**
 * Epoxy
 * /construction/epoxy
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Epoxy',
    'meta' => ['title' => 'Epoxy Floor Calculator: Kits and Cost Guide', 'description' => 'Work out how many epoxy kits a garage floor needs from its area, the number of coats and the coverage per kit, with a waste allowance and the cost. Units shown.', 'h1' => 'Epoxy', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Floor length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '20',
                    'help' => 'Garage length',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Floor width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '20',
                    'help' => 'Garage width',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'coats',
                    'label' => 'Coats',
                    'type' => 'number',
                    'default' => '2',
                    'help' => 'A base and a top coat',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'coverage',
                    'label' => 'Coverage per kit',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '250',
                    'help' => 'At the film thickness sold',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Waste',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Roller loss and edges',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price per kit',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '120',
                    'help' => 'Delivered',
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
                    'name' => 'coated_ft2',
                    'label' => 'Coated area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'kits',
                    'label' => 'Kits',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
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
            'title' => 'Epoxy',
            'results' => [
                'area_ft2' => 'length*width',
                'coated_ft2' => 'length*width*coats*(1+waste/100)',
                'kits' => 'ceil(length*width*coats*(1+waste/100)/coverage)',
                'cost' => 'ceil(length*width*coats*(1+waste/100)/coverage)*price',
                'length' => 'area_ft2/width',
                'width' => 'area_ft2/length',
                'coats' => 'coated_ft2/(area_ft2*(1+waste/100))',
                'waste' => '(coated_ft2/(area_ft2*coats)-1)*100',
                'price' => 'cost/kits',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Kits = ceiling(area × coats × (1 + waste) ÷ coverage per kit)</strong>, and the cost is kits times the price.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Epoxy is sold in kits that cover a stated area at a stated thickness, and the two are tied together: spreading a kit thinner to save money gives a coat that wears through in a year. Running out mid-pour is worse than buying a spare kit, because the join shows.</p><p>The page reports <strong>area and coated area and kits and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Area</strong></td><td><code>Floor length × Floor width</code></td></tr><tr><td><strong>Coated area</strong></td><td><code>Floor length × Floor width × Coats × (1+Waste ÷ 100)</code></td></tr><tr><td><strong>Kits</strong></td><td><code>ceil(Floor length × Floor width × Coats × (1+Waste ÷ 100) ÷ Coverage per kit)</code></td></tr><tr><td><strong>Cost</strong></td><td><code>ceil(Floor length × Floor width × Coats × (1+Waste ÷ 100) ÷ Coverage per kit) × Price per kit</code></td></tr><tr><td><strong>Floor length</strong></td><td><code>Area ÷ Floor width</code></td></tr><tr><td><strong>Floor width</strong></td><td><code>Area ÷ Floor length</code></td></tr><tr><td><strong>Coats</strong></td><td><code>Coated area ÷ (Area × (1+Waste ÷ 100))</code></td></tr><tr><td><strong>Waste</strong></td><td><code>(Coated area ÷ (Area × Coats)-1) × 100</code></td></tr><tr><td><strong>Price per kit</strong></td><td><code>Cost ÷ Kits</code></td></tr></tbody></table><p><p>The area is multiplied by the number of coats before the kit count, because a two-coat system uses twice the material. The waste allowance covers the roller loss that never reaches the floor and the extra at the walls.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports area and coated area and kits and cost.</p><ul><li><strong>Floor length</strong> — in ft. Garage length</li><li><strong>Floor width</strong> — in ft. Garage width</li><li><strong>Coats</strong>. A base and a top coat</li><li><strong>Coverage per kit</strong> — in ft². At the film thickness sold</li><li><strong>Waste</strong> — in %. Roller loss and edges</li><li><strong>Price per kit</strong> — in $. Delivered</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Area</strong> — in ft²</li><li><strong>Coated area</strong> — in ft²</li><li><strong>Kits</strong></li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Floor length = 20 ft, Floor width = 20 ft, Coats = 2, Coverage per kit = 250 ft², Waste = 10 %, Price per kit = 120 $ — and the results panel reads:</p><ul><li><strong>Area</strong> = <code>Floor length × Floor width</code> = <strong>400 ft²</strong></li><li><strong>Coated area</strong> = <code>Floor length × Floor width × Coats × (1+Waste ÷ 100)</code> = <strong>880 ft²</strong></li><li><strong>Kits</strong> = <code>ceil(Floor length × Floor width × Coats × (1+Waste ÷ 100) ÷ Coverage per kit)</code> = <strong>4</strong></li><li><strong>Cost</strong> = <code>ceil(Floor length × Floor width × Coats × (1+Waste ÷ 100) ÷ Coverage per kit) × Price per kit</code> = <strong>480 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>20 × 20 = 400</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 20 by 20 ft garage is 400 ft². Two coats with ten per cent waste is 880 ft² of coverage to buy — 4 kits at 250 ft² each, and 480.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the kits against the area: a single-car garage lands near two kits, a double near four. If a two-car garage asks for eight, the coverage has been entered for a single coat.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Area</th><th>Coated area</th><th>Kits</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Floor length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Floor width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Coats</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Coverage per kit</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Waste</strong> +10 %</td><td>+0 %</td><td>+0.91 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Price per kit</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Coats</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Coverage per kit</strong>, at 0 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Floor length = 24, Floor width = 24, Coats = 2, Coverage per kit = 200, Waste = 15, Price per kit = 135, the page reports <strong>Area</strong> = 576 ft², <strong>Coated area</strong> = 1 324.8 ft², <strong>Kits</strong> = 7, <strong>Cost</strong> = 945 $. A larger garage on a porous slab: more waste and a heavier film.</li><li>With Floor length = 12, Floor width = 10, Coats = 1, Coverage per kit = 300, Waste = 5, Price per kit = 95, the page reports <strong>Area</strong> = 120 ft², <strong>Coated area</strong> = 126 ft², <strong>Kits</strong> = 1, <strong>Cost</strong> = 95 $. A small utility room with a single coat over a sealed floor.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>One coat counted.</strong> Most systems need a base and a top.</li><li><strong>Coverage for a thin film.</strong> The kit covers less at the thickness that lasts.</li><li><strong>Moisture left in the slab.</strong> No kit count saves a floor that blisters.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Area (ft²), Coated area (ft²), Kits, Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Floor dimensions in feet, area in square feet, coverage in square feet per kit, kits as a whole count and cost in dollars.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need floor length and floor width and coats and coverage per kit and waste and price per kit. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Area and coated area and kits and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Floor length</strong> ×10</td><td>400</td><td>4 000</td><td>ten times larger</td></tr><tr><td><strong>Floor width</strong> ×10</td><td>400</td><td>4 000</td><td>ten times larger</td></tr><tr><td><strong>Coats</strong> ×10</td><td>400</td><td>400</td><td>unchanged</td></tr><tr><td><strong>Coverage per kit</strong> ×10</td><td>400</td><td>400</td><td>unchanged</td></tr><tr><td><strong>Waste</strong> ×10</td><td>400</td><td>400</td><td>unchanged</td></tr><tr><td><strong>Price per kit</strong> ×10</td><td>400</td><td>400</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A sound, dry slab.</strong> New concrete needs curing first.</li><li><strong>One system.</strong> Flake, metallic and mortar systems differ.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Buying epoxy for a garage.</li></li><li><li>Comparing kits by coverage.</li></li><li><li>Pricing a floor coating.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/concrete-slab">Concrete slab</a> <a href="/construction/paint">Paint</a> <a href="/construction/flooring">Flooring</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Epoxy calculator work out?', 'a' => <<<'TXT'
            It returns area and coated area and kits and cost from floor length and floor width and coats and coverage per kit and waste and price per kit. The relationship is Floor length × Floor width.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Floor length (ft), Floor width (ft), Coats, Coverage per kit (ft²), Waste (%), Price per kit ($). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: floor length in ft; floor width in ft; coverage per kit in ft²; waste in %; price per kit in $. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many epoxy kits for a 2-car garage?', 'a' => 'About four 250 ft² kits for two coats on a 400 ft² floor with ten per cent waste.'],
            ['q' => 'Can I apply epoxy in one coat?', 'a' => 'A single coat can work on a sealed floor, but a base plus top coat wears far better.'],
        ],
        'related' => [
            ['path' => '/construction/concrete-slab', 'name' => 'Concrete slab'],
            ['path' => '/construction/paint', 'name' => 'Paint'],
            ['path' => '/construction/flooring', 'name' => 'Flooring'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

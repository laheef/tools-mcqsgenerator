<?php

/**
 * Landscape rock
 * /construction/landscape-rock
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Landscape rock',
    'meta' => ['title' => 'Landscape Rock Calculator: Depth, Yards and Cost', 'description' => 'Work out the landscape rock a bed needs at any depth, in cubic yards and tons, and what it costs at the price your own supplier quotes you. All shown.', 'h1' => 'Landscape rock', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'area',
                    'label' => 'Bed area',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '300',
                    'help' => 'The bed to be covered',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '3',
                    'help' => 'Three inches is the usual mulch-depth replacement',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Density',
                    'type' => 'number',
                    'suffix' => 'tons/yd³',
                    'default' => '1.4',
                    'help' => '1.4 for mixed landscape rock',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/ton',
                    'default' => '55',
                    'help' => 'Delivered, or $/yd³ if your yard quotes that way',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Over-order',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Settlement and a ragged edge',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume_yd3',
                    'label' => 'Rock volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
                ],
                [
                    'name' => 'tons',
                    'label' => 'Rock weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'tons',
                ],
                [
                    'name' => 'cost',
                    'label' => 'Rock cost',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'cost_per_ft2',
                    'label' => 'Cost per square foot',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/ft²',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Landscape rock',
            'results' => [
                'volume_yd3' => 'area*depth/12/27*(1+waste/100)',
                'tons' => 'area*depth/12/27*(1+waste/100)*density',
                'cost' => 'area*depth/12/27*(1+waste/100)*density*price',
                'cost_per_ft2' => 'area*depth/12/27*(1+waste/100)*density*price/area',
                'area' => 'volume_yd3*27*12/(depth*(1+waste/100))',
                'depth' => 'volume_yd3*27*12/(area*(1+waste/100))',
                'density' => 'tons/volume_yd3',
                'price' => 'cost/tons',
                'waste' => '(volume_yd3/(area*depth/12/27)-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Landscape rock is a bed calculation with a price on the end: <strong>volume = area × depth ÷ 27</strong>, <strong>tons = volume × density</strong>, and <strong>cost = tons × price</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Replacing mulch with rock is a one-off purchase that lasts decades, and the price per square foot is what makes the comparison honest. Rock costs more up front and much less over ten years — which is the calculation this page supports.</p><p>The page reports <strong>rock volume and rock weight and rock cost and cost per square foot</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Rock volume</strong></td><td><code>Bed area × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100)</code></td></tr><tr><td><strong>Rock weight</strong></td><td><code>Bed area × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100) × Density</code></td></tr><tr><td><strong>Rock cost</strong></td><td><code>Bed area × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100) × Density × Price</code></td></tr><tr><td><strong>Cost per square foot</strong></td><td><code>Bed area × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100) × Density × Price ÷ Bed area</code></td></tr><tr><td><strong>Bed area</strong></td><td><code>Rock volume × 27 × 12 ÷ (Depth × (1+Over-order ÷ 100))</code></td></tr><tr><td><strong>Depth</strong></td><td><code>Rock volume × 27 × 12 ÷ (Bed area × (1+Over-order ÷ 100))</code></td></tr><tr><td><strong>Density</strong></td><td><code>Rock weight ÷ Rock volume</code></td></tr><tr><td><strong>Price</strong></td><td><code>Rock cost ÷ Rock weight</code></td></tr><tr><td><strong>Over-order</strong></td><td><code>(Rock volume ÷ (Bed area × Depth ÷ 12 ÷ 27)-1) × 100</code></td></tr></tbody></table><p><p>The volume and weight are the same bed calculation as elsewhere; the cost multiplies tons by the delivered price, and the last result divides by the area so a rock bed can be compared with mulch by the square foot.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports rock volume and rock weight and rock cost and cost per square foot.</p><ul><li><strong>Bed area</strong> — in ft². The bed to be covered</li><li><strong>Depth</strong> — in in. Three inches is the usual mulch-depth replacement</li><li><strong>Density</strong> — in tons/yd³. 1.4 for mixed landscape rock</li><li><strong>Price</strong> — in $/ton. Delivered, or $/yd³ if your yard quotes that way</li><li><strong>Over-order</strong> — in %. Settlement and a ragged edge</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Rock volume</strong> — in yd³</li><li><strong>Rock weight</strong> — in tons</li><li><strong>Rock cost</strong> — in $</li><li><strong>Cost per square foot</strong> — in $/ft²</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Bed area = 300 ft², Depth = 3 in, Density = 1.4 tons/yd³, Price = 55 $/ton, Over-order = 10 % — and the results panel reads:</p><ul><li><strong>Rock volume</strong> = <code>Bed area × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100)</code> = <strong>3.056 yd³</strong></li><li><strong>Rock weight</strong> = <code>Bed area × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100) × Density</code> = <strong>4.278 tons</strong></li><li><strong>Rock cost</strong> = <code>Bed area × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100) × Density × Price</code> = <strong>235.278 $</strong></li><li><strong>Cost per square foot</strong> = <code>Bed area × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100) × Density × Price ÷ Bed area</code> = <strong>0.784 $/ft²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>300 × 3 ÷ 12 ÷ 27 × (1+10 ÷ 100) = 3.056</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Three hundred square feet at three inches with ten per cent over: 3.06 yd³ and 4.28 tons, which at $55 a ton is $235 — 78 cents per square foot, against a few dollars for mulch that has to be replaced.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the cost per square foot against the alternative: mulch runs $1 to $3 per square foot installed every year or two, rock $1 to $3 once. The break-even is usually in the second or third season.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Rock volume</th><th>Rock weight</th><th>Rock cost</th><th>Cost per square foot</th></tr></thead><tbody><tr><td><strong>Bed area</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Depth</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Density</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Over-order</strong> +10 %</td><td>+0.91 %</td><td>+0.91 %</td><td>+0.91 %</td><td>+0.91 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Depth</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Over-order</strong>, at 0.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Bed area = 150, Depth = 2, Density = 1.4, Price = 60, Over-order = 5, the page reports <strong>Rock volume</strong> = 0.972 yd³, <strong>Rock weight</strong> = 1.361 tons, <strong>Rock cost</strong> = 81.667 $, <strong>Cost per square foot</strong> = 0.544 $/ft². A small bed at two inches: 0.97 yd³, 1.36 tons and $82 — 54 cents a square foot.</li><li>With Bed area = 800, Depth = 4, Density = 1.5, Price = 50, Over-order = 10, the page reports <strong>Rock volume</strong> = 10.864 yd³, <strong>Rock weight</strong> = 16.296 tons, <strong>Rock cost</strong> = 814.815 $, <strong>Cost per square foot</strong> = 1.019 $/ft². A large bed at four inches: 10.9 yd³, 16.3 tons and $815 — $1.02 per square foot, with a delivery charge on top.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Price per yard entered as per ton.</strong> A yard is 1.4 tons, so the two prices differ by forty per cent.</li><li><strong>Depth copied from a mulch spec.</strong> Rock needs less depth to look right but is far heavier.</li><li><strong>Delivery left out.</strong> Bulk rock delivery is a separate, significant line.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Rock volume (yd³), Rock weight (tons), Rock cost ($), Cost per square foot ($/ft²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Area in square feet, depth in inches, volume in cubic yards, weight in short tons and cost in dollars at the price per ton you enter.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need bed area and depth and density and price and over-order. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Rock volume and rock weight and rock cost and cost per square foot should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Bed area</strong> ×10</td><td>3.056</td><td>30.556</td><td>ten times larger</td></tr><tr><td><strong>Depth</strong> ×10</td><td>3.056</td><td>30.556</td><td>ten times larger</td></tr><tr><td><strong>Density</strong> ×10</td><td>3.056</td><td>3.056</td><td>unchanged</td></tr><tr><td><strong>Price</strong> ×10</td><td>3.056</td><td>3.056</td><td>unchanged</td></tr><tr><td><strong>Over-order</strong> ×10</td><td>3.056</td><td>5.556</td><td>×1.818</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>One rock type.</strong> Mixed loads average out; a single dense stone changes the density.</li><li><strong>No weed fabric.</strong> A membrane under rock is a separate cost that pays for itself.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Budgeting a rock bed.</li></li><li><li>Comparing rock against mulch.</li></li><li><li>Checking a landscape supplier's quote.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/rock">Rock</a> <a href="/construction/river-rock">River rock</a> <a href="/construction/stone">Stone</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Landscape rock calculator work out?', 'a' => <<<'TXT'
            It returns rock volume and rock weight and rock cost and cost per square foot from bed area and depth and density and price and over-order. The relationship is Bed area × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Bed area (ft²), Depth (in), Density (tons/yd³), Price ($/ton), Over-order (%). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: bed area in ft²; depth in in; density in tons/yd³; price in $/ton; over-order in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How deep should landscape rock be?', 'a' => 'Two to three inches for weed suppression and appearance, four if it will be walked on.'],
            ['q' => 'Is rock cheaper than mulch?', 'a' => 'Per square foot it costs more up front and much less over a decade, because it is not replaced every year.'],
        ],
        'related' => [
            ['path' => '/construction/rock', 'name' => 'Rock'],
            ['path' => '/construction/river-rock', 'name' => 'River rock'],
            ['path' => '/construction/stone', 'name' => 'Stone'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

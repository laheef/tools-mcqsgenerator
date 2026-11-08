<?php

/**
 * Roof shingle
 * /construction/roof-shingle
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Roof shingle',
    'meta' => ['title' => 'Roof Shingle Calculator: Squares and Bundles', 'description' => 'Work out the shingles a gable roof needs in squares, bundles and nails, and what they cost, from the footprint, the pitch and the waste. to the bundle.', 'h1' => 'Roof shingle', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Building length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '30',
                    'help' => 'Along the ridge',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Building width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '24',
                    'help' => 'Eave to eave',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pitch',
                    'label' => 'Pitch',
                    'type' => 'number',
                    'suffix' => 'x/12',
                    'default' => '6',
                    'help' => 'Rise per foot of run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Wastage',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Hips, valleys and starter course',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/bundle',
                    'default' => '38',
                    'help' => 'Per bundle, delivered',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'roof_area',
                    'label' => 'Roof area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'squares',
                    'label' => 'Squares',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'bundles',
                    'label' => 'Bundles',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'nails_lb',
                    'label' => 'Roofing nails',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
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
            'title' => 'Roof shingle',
            'results' => [
                'roof_area' => 'length*width*sqrt(1+pow(pitch/12,2))',
                'squares' => 'length*width*sqrt(1+pow(pitch/12,2))/100',
                'bundles' => 'ceil(length*width*sqrt(1+pow(pitch/12,2))*(1+waste/100)/100*3)',
                'nails_lb' => 'length*width*sqrt(1+pow(pitch/12,2))/100*1.5',
                'cost' => 'ceil(length*width*sqrt(1+pow(pitch/12,2))*(1+waste/100)/100*3)*price',
                'length' => 'roof_area/(width*sqrt(1+pow(pitch/12,2)))',
                'width' => 'roof_area/(length*sqrt(1+pow(pitch/12,2)))',
                'pitch' => '12*sqrt(pow(roof_area/(length*width),2)-1)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Shingles are sold by the bundle, three to a square, and a square covers 100 ft² of roof. <strong>Roof area = footprint × slope multiplier</strong>, then squares, then bundles.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Shingles are the material most often bought short, because the area quoted is the floor plan and the roof is always bigger than the plan. The slope multiplier is the correction, and it grows quickly: a 12/12 roof is forty per cent more material than its footprint.</p><p>The page reports <strong>roof area and squares and bundles and roofing nails and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Roof area</strong></td><td><code>Building length × Building width × √(1+(Pitch ÷ 12)^2)</code></td></tr><tr><td><strong>Squares</strong></td><td><code>Building length × Building width × √(1+(Pitch ÷ 12)^2) ÷ 100</code></td></tr><tr><td><strong>Bundles</strong></td><td><code>ceil(Building length × Building width × √(1+(Pitch ÷ 12)^2) × (1+Wastage ÷ 100) ÷ 100 × 3)</code></td></tr><tr><td><strong>Roofing nails</strong></td><td><code>Building length × Building width × √(1+(Pitch ÷ 12)^2) ÷ 100 × 1.5</code></td></tr><tr><td><strong>Cost</strong></td><td><code>ceil(Building length × Building width × √(1+(Pitch ÷ 12)^2) × (1+Wastage ÷ 100) ÷ 100 × 3) × Price</code></td></tr><tr><td><strong>Building length</strong></td><td><code>Roof area ÷ (Building width × √(1+(Pitch ÷ 12)^2))</code></td></tr><tr><td><strong>Building width</strong></td><td><code>Roof area ÷ (Building length × √(1+(Pitch ÷ 12)^2))</code></td></tr><tr><td><strong>Pitch</strong></td><td><code>12 × √((Roof area ÷ (Building length × Building width))^2-1)</code></td></tr></tbody></table><p><p>The multiplier comes from the pitch: the square root of one plus the pitch over twelve, squared. Bundles are three to the square, so the bundle count is the area over a hundred, times three, times the waste allowance, rounded up.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports roof area and squares and bundles and roofing nails and cost.</p><ul><li><strong>Building length</strong> — in ft. Along the ridge</li><li><strong>Building width</strong> — in ft. Eave to eave</li><li><strong>Pitch</strong> — in x/12. Rise per foot of run</li><li><strong>Wastage</strong> — in %. Hips, valleys and starter course</li><li><strong>Price</strong> — in $/bundle. Per bundle, delivered</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Roof area</strong> — in ft²</li><li><strong>Squares</strong></li><li><strong>Bundles</strong></li><li><strong>Roofing nails</strong> — in lb</li><li><strong>Cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Building length = 30 ft, Building width = 24 ft, Pitch = 6 x/12, Wastage = 10 %, Price = 38 $/bundle — and the results panel reads:</p><ul><li><strong>Roof area</strong> = <code>Building length × Building width × √(1+(Pitch ÷ 12)^2)</code> = <strong>804.984 ft²</strong></li><li><strong>Squares</strong> = <code>Building length × Building width × √(1+(Pitch ÷ 12)^2) ÷ 100</code> = <strong>8.05</strong></li><li><strong>Bundles</strong> = <code>ceil(Building length × Building width × √(1+(Pitch ÷ 12)^2) × (1+Wastage ÷ 100) ÷ 100 × 3)</code> = <strong>27</strong></li><li><strong>Roofing nails</strong> = <code>Building length × Building width × √(1+(Pitch ÷ 12)^2) ÷ 100 × 1.5</code> = <strong>12.075 lb</strong></li><li><strong>Cost</strong> = <code>ceil(Building length × Building width × √(1+(Pitch ÷ 12)^2) × (1+Wastage ÷ 100) ÷ 100 × 3) × Price</code> = <strong>1 026 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>30 × 24 × sqrt(1+pow(6 ÷ 12,2)) = 804.984</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 30 × 24 ft building at 6/12: 720 ft² of plan becomes 805 ft² of roof, eight squares, and 27 bundles with ten per cent over. The nails come to about 12 lb, and at $38 a bundle the order is just over a thousand dollars.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the bundle count against the area: three bundles a square, so eight squares is 24 bundles and the waste takes it to 27. A figure near four bundles a square means the waste box has been set too high.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Roof area</th><th>Squares</th><th>Bundles</th><th>Roofing nails</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Building length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+11.11 %</td><td>+10 %</td><td>+11.11 %</td></tr><tr><td><strong>Building width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+11.11 %</td><td>+10 %</td><td>+11.11 %</td></tr><tr><td><strong>Pitch</strong> +10 %</td><td>+2.08 %</td><td>+2.08 %</td><td>+3.7 %</td><td>+2.08 %</td><td>+3.7 %</td></tr><tr><td><strong>Wastage</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Building length</strong>: a ten per cent move there shifts the result by about 11.1 per cent. The least sensitive is <strong>Wastage</strong>, at 0 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Building length = 40, Building width = 28, Pitch = 8, Wastage = 15, Price = 42, the page reports <strong>Roof area</strong> = 1 346.072 ft², <strong>Squares</strong> = 13.461, <strong>Bundles</strong> = 47, <strong>Roofing nails</strong> = 20.191 lb, <strong>Cost</strong> = 1 974 $. A steeper roof on a bigger footprint: both terms in the area grow.</li><li>With Building length = 20, Building width = 16, Pitch = 4, Wastage = 10, Price = 35, the page reports <strong>Roof area</strong> = 337.31 ft², <strong>Squares</strong> = 3.373, <strong>Bundles</strong> = 12, <strong>Roofing nails</strong> = 5.06 lb, <strong>Cost</strong> = 420 $. A garage roof, shallow and small, where a bundle or two of waste is cheap insurance.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Plan area used as roof area.</strong> The multiplier is the whole point of the page.</li><li><strong>Waste left at zero.</strong> Starter course, ridge caps and valleys all come out of the same bundles.</li><li><strong>Bundles rounded down.</strong> Part bundles are bought whole.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Roof area (ft²), Squares, Bundles, Roofing nails (lb), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Building dimensions in feet, pitch as rise per 12, area in square feet, squares at 100 ft², bundles at three to the square and nails in pounds.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need building length and building width and pitch and wastage and price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Roof area and squares and bundles and roofing nails and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Building length</strong> ×10</td><td>804.984</td><td>8 049.845</td><td>ten times larger</td></tr><tr><td><strong>Building width</strong> ×10</td><td>804.984</td><td>8 049.845</td><td>ten times larger</td></tr><tr><td><strong>Pitch</strong> ×10</td><td>804.984</td><td>3 671.294</td><td>×4.561</td></tr><tr><td><strong>Wastage</strong> ×10</td><td>804.984</td><td>804.984</td><td>unchanged</td></tr><tr><td><strong>Price</strong> ×10</td><td>804.984</td><td>804.984</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A simple gable.</strong> Hips and dormers add cut waste the percentage only partly covers.</li><li><strong>No underlayment or flashing.</strong> Both are separate lines.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering shingles for a new roof.</li></li><li><li>Checking a roofer's square count.</li></li><li><li>Budgeting a re-roof.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/roofing">Roofing</a> <a href="/construction/roof-pitch">Roof pitch</a> <a href="/construction/roof-truss">Roof truss</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Roof shingle calculator work out?', 'a' => <<<'TXT'
            It returns roof area and squares and bundles and roofing nails and cost from building length and building width and pitch and wastage and price. The relationship is Building length × Building width × √(1+(Pitch ÷ 12)^2).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Building length (ft), Building width (ft), Pitch (x/12), Wastage (%), Price ($/bundle). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: building length in ft; building width in ft; pitch in x/12; wastage in %; price in $/bundle. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many bundles are in a square?', 'a' => 'Three for standard three-tab and most architectural shingles.'],
            ['q' => 'Does pitch change the shingle count?', 'a' => 'Yes — a steeper roof has more surface for the same footprint, and the multiplier rises with the pitch.'],
        ],
        'related' => [
            ['path' => '/construction/roofing', 'name' => 'Roofing'],
            ['path' => '/construction/roof-pitch', 'name' => 'Roof pitch'],
            ['path' => '/construction/roof-truss', 'name' => 'Roof truss'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

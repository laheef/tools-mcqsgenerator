<?php

/**
 * Rock
 * /construction/rock
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rock',
    'meta' => ['title' => 'Rock Calculator: Boulders by Size and Cover', 'description' => 'Work out how many boulders or how many tons of rock a bed needs, from the coverage area and the size of the stone you are actually buying for it. All shown.', 'h1' => 'Rock', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'area',
                    'label' => 'Coverage area',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '200',
                    'help' => 'The bed being covered',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'stone_size',
                    'label' => 'Average stone size',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'The dimension across the stone',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '3',
                    'help' => 'Depth of the rock layer',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Density',
                    'type' => 'number',
                    'suffix' => 'tons/yd³',
                    'default' => '1.5',
                    'help' => '1.5 for most decorative rock',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Over-order',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Gaps and spillage',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'stones',
                    'label' => 'Stones to cover the area',
                    'type' => 'number',
                    'readonly' => true,
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
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Rock',
            'results' => [
                'stones' => 'ceil(area/pow(stone_size/12,2)-0.000000001)',
                'volume_yd3' => 'area*depth/12/27*(1+waste/100)',
                'tons' => 'area*depth/12/27*(1+waste/100)*density',
                'area' => 'stones*pow(stone_size/12,2)',
                'stone_size' => '12*sqrt(area/stones)',
                'depth' => 'volume_yd3*27*12/(area*(1+waste/100))',
                'density' => 'tons/volume_yd3',
                'waste' => '(volume_yd3/(area*depth/12/27)-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Boulders are counted, decorative rock is weighed. For <strong>A</strong> square feet covered with stone of average diameter <strong>d</strong> inches, the count is about <strong>A ÷ (d/12)²</strong> at one stone per square of its own footprint.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Rock beds are bought in two different ways depending on what the stone is for: boulders and specimen stones are counted, while river rock and drain rock are weighed. The page gives both, so a plan drawn in stones and a delivery note in tons can be reconciled.</p><p>The page reports <strong>stones to cover the area and rock volume and rock weight</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Stones to cover the area</strong></td><td><code>ceil(Coverage area ÷ (Average stone size ÷ 12)^2-0.000000001)</code></td></tr><tr><td><strong>Rock volume</strong></td><td><code>Coverage area × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100)</code></td></tr><tr><td><strong>Rock weight</strong></td><td><code>Coverage area × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100) × Density</code></td></tr><tr><td><strong>Coverage area</strong></td><td><code>Stones to cover the area × (Average stone size ÷ 12)^2</code></td></tr><tr><td><strong>Average stone size</strong></td><td><code>12 × √(Coverage area ÷ Stones to cover the area)</code></td></tr><tr><td><strong>Depth</strong></td><td><code>Rock volume × 27 × 12 ÷ (Coverage area × (1+Over-order ÷ 100))</code></td></tr><tr><td><strong>Density</strong></td><td><code>Rock weight ÷ Rock volume</code></td></tr><tr><td><strong>Over-order</strong></td><td><code>(Rock volume ÷ (Coverage area × Depth ÷ 12 ÷ 27)-1) × 100</code></td></tr></tbody></table><p><p>The count assumes each stone covers a square of its own diameter, which is a reasonable coverage estimate for rounded boulders set in a bed; for tight stacking it over-counts, and for a scatter it under-counts.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports stones to cover the area and rock volume and rock weight.</p><ul><li><strong>Coverage area</strong> — in ft². The bed being covered</li><li><strong>Average stone size</strong> — in in. The dimension across the stone</li><li><strong>Depth</strong> — in in. Depth of the rock layer</li><li><strong>Density</strong> — in tons/yd³. 1.5 for most decorative rock</li><li><strong>Over-order</strong> — in %. Gaps and spillage</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Stones to cover the area</strong></li><li><strong>Rock volume</strong> — in yd³</li><li><strong>Rock weight</strong> — in tons</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Coverage area = 200 ft², Average stone size = 12 in, Depth = 3 in, Density = 1.5 tons/yd³, Over-order = 10 % — and the results panel reads:</p><ul><li><strong>Stones to cover the area</strong> = <code>ceil(Coverage area ÷ (Average stone size ÷ 12)^2-0.000000001)</code> = <strong>200</strong></li><li><strong>Rock volume</strong> = <code>Coverage area × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100)</code> = <strong>2.037 yd³</strong></li><li><strong>Rock weight</strong> = <code>Coverage area × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100) × Density</code> = <strong>3.056 tons</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil(200 ÷ pow(12 ÷ 12,2)-0.000000001) = 200</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>200 ft² of bed with 12 in stones: 200 stones at one per square foot, and 2.04 yd³ of 3 in rock — 3.1 tons — for the same area. The count and the weight answer different questions.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the count against the look you want: one stone per square foot is a full bed, one per two square feet a scattered feature. The weight is what the delivery will be.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Stones to cover the area</th><th>Rock volume</th><th>Rock weight</th></tr></thead><tbody><tr><td><strong>Coverage area</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Average stone size</strong> +10 %</td><td>−17 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Depth</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Density</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Over-order</strong> +10 %</td><td>+0 %</td><td>+0.91 %</td><td>+0.91 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Average stone size</strong>: a ten per cent move there shifts the result by about 17 per cent. The least sensitive is <strong>Over-order</strong>, at 0.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Coverage area = 400, Average stone size = 18, Depth = 4, Density = 1.5, Over-order = 10, the page reports <strong>Stones to cover the area</strong> = 178, <strong>Rock volume</strong> = 5.432 yd³, <strong>Rock weight</strong> = 8.148 tons. Four hundred square feet of 18 in boulders: 178 stones, and 5.4 yd³ of underlay at 9 tons.</li><li>With Coverage area = 50, Average stone size = 6, Depth = 2, Density = 1.4, Over-order = 5, the page reports <strong>Stones to cover the area</strong> = 200, <strong>Rock volume</strong> = 0.324 yd³, <strong>Rock weight</strong> = 0.454 tons. A small feature bed: 200 six-inch stones, 0.32 yd³ and 0.46 tons.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Stone size read as the bed depth.</strong> The stone size is the size of the rock, the depth is how deep the layer is buried.</li><li><strong>Count used for rock sold by weight.</strong> Boulders are counted, drain rock is weighed; the two are not interchangeable.</li><li><strong>Waste left out of a loose bed.</strong> Rock beds settle and spill; ten per cent is normal.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Stones to cover the area, Rock volume (yd³), Rock weight (tons).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Coverage in square feet, stone size and depth in inches. The count is whole stones, the volume in cubic yards and the weight in short tons at the density you give.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need coverage area and average stone size and depth and density and over-order. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Stones to cover the area and rock volume and rock weight should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Coverage area</strong> ×10</td><td>200</td><td>2 000</td><td>ten times larger</td></tr><tr><td><strong>Average stone size</strong> ×10</td><td>200</td><td>2</td><td>×0.01</td></tr><tr><td><strong>Depth</strong> ×10</td><td>200</td><td>200</td><td>unchanged</td></tr><tr><td><strong>Density</strong> ×10</td><td>200</td><td>200</td><td>unchanged</td></tr><tr><td><strong>Over-order</strong> ×10</td><td>200</td><td>200</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Uniform stones.</strong> A mixed load needs an average size that means something.</li><li><strong>Coverage only.</strong> Setting boulders in soil needs a base the page does not include.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering boulders for a bed.</li></li><li><li>Working out drain rock by weight.</li></li><li><li>Checking a landscape quote.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/stone">Stone</a> <a href="/construction/river-rock">River rock</a> <a href="/construction/landscape-rock">Landscape rock</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rock calculator work out?', 'a' => <<<'TXT'
            It returns stones to cover the area and rock volume and rock weight from coverage area and average stone size and depth and density and over-order. The relationship is ceil(Coverage area ÷ (Average stone size ÷ 12)^2-0.000000001).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Coverage area (ft²), Average stone size (in), Depth (in), Density (tons/yd³), Over-order (%). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: coverage area in ft²; average stone size in in; depth in in; density in tons/yd³; over-order in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many boulders do I need per square foot?', 'a' => 'One 12 in boulder covers roughly one square foot of bed; a 24 in boulder covers about four.'],
            ['q' => 'How big is a ton of rock?', 'a' => 'About two thirds of a cubic yard for typical decorative stone at 1.5 tons per yard.'],
        ],
        'related' => [
            ['path' => '/construction/stone', 'name' => 'Stone'],
            ['path' => '/construction/river-rock', 'name' => 'River rock'],
            ['path' => '/construction/landscape-rock', 'name' => 'Landscape rock'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

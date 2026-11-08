<?php

/**
 * Sand
 * /construction/sand
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sand',
    'meta' => ['title' => 'Sand Calculator: Cubic Yards, Tons and Bags', 'description' => 'Work out how much sand a bed or a mix needs, in cubic yards, cubic feet, tons and 60 lb bags, with the density and moisture allowance that matter on site.', 'h1' => 'Sand', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Area length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '10',
                    'help' => 'Along the bed or the slab',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Area width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '10',
                    'help' => 'Across it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '2',
                    'help' => 'Two inches under pavers, six for a sandbox',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Density',
                    'type' => 'number',
                    'suffix' => 'tons/yd³',
                    'default' => '1.35',
                    'help' => '1.35 dry, 1.45 damp',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Over-order',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Settlement and spillage',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume_yd3',
                    'label' => 'Sand volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
                ],
                [
                    'name' => 'volume_ft3',
                    'label' => 'Sand volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'tons',
                    'label' => 'Sand weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'tons',
                ],
                [
                    'name' => 'bags_60lb',
                    'label' => 'Bags of 60 lb',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Sand',
            'results' => [
                'volume_yd3' => 'length*width*depth/12/27*(1+waste/100)',
                'volume_ft3' => 'length*width*depth/12*(1+waste/100)',
                'tons' => 'length*width*depth/12/27*(1+waste/100)*density',
                'bags_60lb' => 'ceil(length*width*depth/12*(1+waste/100)/0.5)',
                'length' => 'volume_ft3*12/(width*depth*(1+waste/100))',
                'width' => 'volume_ft3*12/(length*depth*(1+waste/100))',
                'depth' => 'volume_ft3*12/(length*width*(1+waste/100))',
                'density' => 'tons/volume_yd3',
                'waste' => '(volume_ft3/(length*width*depth/12)-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Sand is bought by the yard, the ton or the bag. <strong>Volume = L × W × D ÷ 27</strong> cubic yards, <strong>tons = volume × 1.35</strong> dry, and a 60 lb bag holds 0.5 ft³.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Sand turns up everywhere: under pavers, mixed into mortar, filling a sandbox and bedding a pool. It weighs about 1.35 tons per loose yard dry, and noticeably more when it is wet — which is why a delivery can weigh out over the ticket.</p><p>The page reports <strong>sand volume (yd³) and sand volume (ft³) and sand weight and bags of 60 lb</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Sand volume (yd³)</strong></td><td><code>Area length × Area width × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100)</code></td></tr><tr><td><strong>Sand volume (ft³)</strong></td><td><code>Area length × Area width × Depth ÷ 12 × (1+Over-order ÷ 100)</code></td></tr><tr><td><strong>Sand weight</strong></td><td><code>Area length × Area width × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100) × Density</code></td></tr><tr><td><strong>Bags of 60 lb</strong></td><td><code>ceil(Area length × Area width × Depth ÷ 12 × (1+Over-order ÷ 100) ÷ 0.5)</code></td></tr><tr><td><strong>Area length</strong></td><td><code>Sand volume (ft³) × 12 ÷ (Area width × Depth × (1+Over-order ÷ 100))</code></td></tr><tr><td><strong>Area width</strong></td><td><code>Sand volume (ft³) × 12 ÷ (Area length × Depth × (1+Over-order ÷ 100))</code></td></tr><tr><td><strong>Depth</strong></td><td><code>Sand volume (ft³) × 12 ÷ (Area length × Area width × (1+Over-order ÷ 100))</code></td></tr><tr><td><strong>Density</strong></td><td><code>Sand weight ÷ Sand volume (yd³)</code></td></tr><tr><td><strong>Over-order</strong></td><td><code>(Sand volume (ft³) ÷ (Area length × Area width × Depth ÷ 12)-1) × 100</code></td></tr></tbody></table><p><p>The volume arithmetic is the same as any bed; the density box converts to tons and the last result divides into 60 lb bags, each holding half a cubic foot.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports sand volume (yd³) and sand volume (ft³) and sand weight and bags of 60 lb.</p><ul><li><strong>Area length</strong> — in ft. Along the bed or the slab</li><li><strong>Area width</strong> — in ft. Across it</li><li><strong>Depth</strong> — in in. Two inches under pavers, six for a sandbox</li><li><strong>Density</strong> — in tons/yd³. 1.35 dry, 1.45 damp</li><li><strong>Over-order</strong> — in %. Settlement and spillage</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Sand volume</strong> — in yd³</li><li><strong>Sand volume</strong> — in ft³</li><li><strong>Sand weight</strong> — in tons</li><li><strong>Bags of 60 lb</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Area length = 10 ft, Area width = 10 ft, Depth = 2 in, Density = 1.35 tons/yd³, Over-order = 10 % — and the results panel reads:</p><ul><li><strong>Sand volume</strong> = <code>Area length × Area width × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100)</code> = <strong>0.679 yd³</strong></li><li><strong>Sand volume</strong> = <code>Area length × Area width × Depth ÷ 12 × (1+Over-order ÷ 100)</code> = <strong>18.333 ft³</strong></li><li><strong>Sand weight</strong> = <code>Area length × Area width × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100) × Density</code> = <strong>0.917 tons</strong></li><li><strong>Bags of 60 lb</strong> = <code>ceil(Area length × Area width × Depth ÷ 12 × (1+Over-order ÷ 100) ÷ 0.5)</code> = <strong>37</strong></li></ul><p>With the numbers written into the formula, the first result is <code>10 × 10 × 2 ÷ 12 ÷ 27 × (1+10 ÷ 100) = 0.679</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Ten by ten feet at two inches: 16.7 ft³ before waste — about 0.68 yd³ with ten per cent over — and 0.92 ton at 1.35. That is 37 bags of 60 lb, which is why nobody buys a paver bed bagged.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>For a paver bed, one inch of sand is the target, not two; deeper beds settle and the pavers move. For a sandbox, six inches over the whole area is the usual playing depth.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Sand volume</th><th>Sand volume</th><th>Sand weight</th><th>Bags of 60 lb</th></tr></thead><tbody><tr><td><strong>Area length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10.81 %</td></tr><tr><td><strong>Area width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10.81 %</td></tr><tr><td><strong>Depth</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10.81 %</td></tr><tr><td><strong>Density</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Over-order</strong> +10 %</td><td>+0.91 %</td><td>+0.91 %</td><td>+0.91 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Area length</strong>: a ten per cent move there shifts the result by about 10.8 per cent. The least sensitive is <strong>Over-order</strong>, at 0.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Area length = 20, Area width = 20, Depth = 1, Density = 1.35, Over-order = 5, the page reports <strong>Sand volume</strong> = 1.296 yd³, <strong>Sand volume</strong> = 35 ft³, <strong>Sand weight</strong> = 1.75 tons, <strong>Bags of 60 lb</strong> = 70. A paver bed an inch deep: 1.30 yd³ and 1.8 tons — a trailer load.</li><li>With Area length = 6, Area width = 6, Depth = 6, Density = 1.35, Over-order = 10, the page reports <strong>Sand volume</strong> = 0.733 yd³, <strong>Sand volume</strong> = 19.8 ft³, <strong>Sand weight</strong> = 0.99 tons, <strong>Bags of 60 lb</strong> = 40. A sandbox: 0.73 yd³, 1.0 ton, 40 bags.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Depth overdone under pavers.</strong> An inch is right; three inches of sand is a floating pavement.</li><li><strong>Wet sand weighed as dry.</strong> Damp sand runs 1.45 tons/yd³ and the supplier's ticket may show more tons for the same volume.</li><li><strong>Bags assumed to be a yard.</strong> A yard is 54 bags of 60 lb, not 27.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Sand volume (yd³), Sand volume (ft³), Sand weight (tons), Bags of 60 lb.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Dimensions in feet, depth in inches, volume in cubic feet and yards, weight in short tons, and bags of 60 lb mix — a different yield from an 80 lb bag.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need area length and area width and depth and density and over-order. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Sand volume (yd³) and sand volume (ft³) and sand weight and bags of 60 lb should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Area length</strong> ×10</td><td>0.679</td><td>6.79</td><td>ten times larger</td></tr><tr><td><strong>Area width</strong> ×10</td><td>0.679</td><td>6.79</td><td>ten times larger</td></tr><tr><td><strong>Depth</strong> ×10</td><td>0.679</td><td>6.79</td><td>ten times larger</td></tr><tr><td><strong>Density</strong> ×10</td><td>0.679</td><td>0.679</td><td>unchanged</td></tr><tr><td><strong>Over-order</strong> ×10</td><td>0.679</td><td>1.235</td><td>×1.818</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>One bed.</strong> Layered beds need each layer calculated.</li><li><strong>No compaction allowance.</strong> Sand under pavers is screeded, not compacted, so the over-order stays small.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering sand for a paver bed.</li></li><li><li>Filling a sandbox.</li></li><li><li>Converting a ton price into a yard price.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/paver-sand">Paver sand</a> <a href="/construction/gravel">Gravel</a> <a href="/construction/concrete-slab">Concrete slab</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sand calculator work out?', 'a' => <<<'TXT'
            It returns sand volume (yd³) and sand volume (ft³) and sand weight and bags of 60 lb from area length and area width and depth and density and over-order. The relationship is Area length × Area width × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Area length (ft), Area width (ft), Depth (in), Density (tons/yd³), Over-order (%). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: area length in ft; area width in ft; depth in in; density in tons/yd³; over-order in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much does a yard of sand weigh?', 'a' => 'About 1.35 short tons dry and 1.45 damp, which is 2 700 to 2 900 lb.'],
            ['q' => 'How deep should the sand be under pavers?', 'a' => 'One inch, screeded level over a compacted base. Deeper sand is a sign the base is out of level.'],
        ],
        'related' => [
            ['path' => '/construction/paver-sand', 'name' => 'Paver sand'],
            ['path' => '/construction/gravel', 'name' => 'Gravel'],
            ['path' => '/construction/concrete-slab', 'name' => 'Concrete slab'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

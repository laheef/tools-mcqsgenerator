<?php

/**
 * Pea gravel
 * /construction/pea-gravel
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pea gravel',
    'meta' => ['title' => 'Pea Gravel Calculator: Yards, Tons and Bags', 'description' => 'Work out the pea gravel a path or play area needs, with the depth that suits small rounded stone and the coverage a ton gives at that depth. All shown.', 'h1' => 'Pea gravel', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Area length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '30',
                    'help' => 'Along the path',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Area width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '3',
                    'help' => 'Across it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '2',
                    'help' => 'Two inches of pea gravel is a path surface',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Density',
                    'type' => 'number',
                    'suffix' => 'tons/yd³',
                    'default' => '1.25',
                    'help' => '1.25 for dry pea gravel',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Over-order',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Pea gravel migrates and settles',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area',
                    'label' => 'Area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'volume_yd3',
                    'label' => 'Pea gravel volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
                ],
                [
                    'name' => 'tons',
                    'label' => 'Pea gravel weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'tons',
                ],
                [
                    'name' => 'bags_50lb',
                    'label' => 'Bags of 50 lb',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Pea gravel',
            'results' => [
                'area' => 'length*width',
                'volume_yd3' => 'length*width*depth/12/27*(1+waste/100)',
                'tons' => 'length*width*depth/12/27*(1+waste/100)*density',
                'bags_50lb' => 'ceil(length*width*depth/12*(1+waste/100)/0.5-0.000000001)',
                'length' => 'area/width',
                'width' => 'area/length',
                'depth' => 'volume_yd3*27*12/(length*width*(1+waste/100))',
                'density' => 'tons/volume_yd3',
                'waste' => '(volume_yd3/(length*width*depth/12/27)-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Pea gravel is small, rounded and light: about <strong>1.25 tons per cubic yard</strong>. Coverage is <strong>area × depth ÷ 27</strong>, and because the stone is small the depth has to be greater to stay put.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Pea gravel is the friendly stone — barefoot-safe in a play area, quiet underfoot on a path, and easy to top up. It is also the stone that migrates most, which is why the depth and the edging matter more than the tonnage.</p><p>The page reports <strong>area and pea gravel volume and pea gravel weight and bags of 50 lb</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Area</strong></td><td><code>Area length × Area width</code></td></tr><tr><td><strong>Pea gravel volume</strong></td><td><code>Area length × Area width × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100)</code></td></tr><tr><td><strong>Pea gravel weight</strong></td><td><code>Area length × Area width × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100) × Density</code></td></tr><tr><td><strong>Bags of 50 lb</strong></td><td><code>ceil(Area length × Area width × Depth ÷ 12 × (1+Over-order ÷ 100) ÷ 0.5-0.000000001)</code></td></tr><tr><td><strong>Area length</strong></td><td><code>Area ÷ Area width</code></td></tr><tr><td><strong>Area width</strong></td><td><code>Area ÷ Area length</code></td></tr><tr><td><strong>Depth</strong></td><td><code>Pea gravel volume × 27 × 12 ÷ (Area length × Area width × (1+Over-order ÷ 100))</code></td></tr><tr><td><strong>Density</strong></td><td><code>Pea gravel weight ÷ Pea gravel volume</code></td></tr><tr><td><strong>Over-order</strong></td><td><code>(Pea gravel volume ÷ (Area length × Area width × Depth ÷ 12 ÷ 27)-1) × 100</code></td></tr></tbody></table><p><p>The arithmetic is the usual bed calculation with a lighter density. The bag count uses 50 lb bags at 0.5 ft³, which is how hardware stores sell it for small jobs.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports area and pea gravel volume and pea gravel weight and bags of 50 lb.</p><ul><li><strong>Area length</strong> — in ft. Along the path</li><li><strong>Area width</strong> — in ft. Across it</li><li><strong>Depth</strong> — in in. Two inches of pea gravel is a path surface</li><li><strong>Density</strong> — in tons/yd³. 1.25 for dry pea gravel</li><li><strong>Over-order</strong> — in %. Pea gravel migrates and settles</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Area</strong> — in ft²</li><li><strong>Pea gravel volume</strong> — in yd³</li><li><strong>Pea gravel weight</strong> — in tons</li><li><strong>Bags of 50 lb</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Area length = 30 ft, Area width = 3 ft, Depth = 2 in, Density = 1.25 tons/yd³, Over-order = 10 % — and the results panel reads:</p><ul><li><strong>Area</strong> = <code>Area length × Area width</code> = <strong>90 ft²</strong></li><li><strong>Pea gravel volume</strong> = <code>Area length × Area width × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100)</code> = <strong>0.611 yd³</strong></li><li><strong>Pea gravel weight</strong> = <code>Area length × Area width × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100) × Density</code> = <strong>0.764 tons</strong></li><li><strong>Bags of 50 lb</strong> = <code>ceil(Area length × Area width × Depth ÷ 12 × (1+Over-order ÷ 100) ÷ 0.5-0.000000001)</code> = <strong>33</strong></li></ul><p>With the numbers written into the formula, the first result is <code>30 × 3 = 90</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 30 × 3 ft path at two inches: 90 ft², 0.61 yd³ with ten per cent, and 0.76 tons — one delivery, or 33 bags if you are carrying it yourself.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Two inches is a path surface over a compacted base; three inches is a play area. Without edging, expect to lose a bag or two a year to the lawn.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Area</th><th>Pea gravel volume</th><th>Pea gravel weight</th><th>Bags of 50 lb</th></tr></thead><tbody><tr><td><strong>Area length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+12.12 %</td></tr><tr><td><strong>Area width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+12.12 %</td></tr><tr><td><strong>Depth</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+12.12 %</td></tr><tr><td><strong>Density</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Over-order</strong> +10 %</td><td>+0 %</td><td>+0.91 %</td><td>+0.91 %</td><td>+3.03 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Area length</strong>: a ten per cent move there shifts the result by about 12.1 per cent. The least sensitive is <strong>Over-order</strong>, at 3 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Area length = 12, Area width = 12, Depth = 3, Density = 1.25, Over-order = 10, the page reports <strong>Area</strong> = 144 ft², <strong>Pea gravel volume</strong> = 1.467 yd³, <strong>Pea gravel weight</strong> = 1.833 tons, <strong>Bags of 50 lb</strong> = 80. A play area: 1.47 yd³ and 1.83 tons at three inches — a tipper load.</li><li>With Area length = 8, Area width = 2, Depth = 2, Density = 1.25, Over-order = 5, the page reports <strong>Area</strong> = 16 ft², <strong>Pea gravel volume</strong> = 0.104 yd³, <strong>Pea gravel weight</strong> = 0.13 tons, <strong>Bags of 50 lb</strong> = 6. A short path: 0.10 yd³, a quarter of a ton, 6 bags.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Depth under two inches.</strong> Small rounded stone disappears into the base and the soil.</li><li><strong>No edging.</strong> Pea gravel rolls; a 4 in edge keeps it where it was put.</li><li><strong>Bags bought for a large area.</strong> At 0.5 ft³ a bag, a cubic yard is 54 bags — bulk is far cheaper past a few square metres.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Area (ft²), Pea gravel volume (yd³), Pea gravel weight (tons), Bags of 50 lb.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Dimensions in feet, depth in inches, area in square feet, volume in cubic yards and weight in short tons; bag counts assume 50 lb bags of half a cubic foot.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need area length and area width and depth and density and over-order. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Area and pea gravel volume and pea gravel weight and bags of 50 lb should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Area length</strong> ×10</td><td>90</td><td>900</td><td>ten times larger</td></tr><tr><td><strong>Area width</strong> ×10</td><td>90</td><td>900</td><td>ten times larger</td></tr><tr><td><strong>Depth</strong> ×10</td><td>90</td><td>90</td><td>unchanged</td></tr><tr><td><strong>Density</strong> ×10</td><td>90</td><td>90</td><td>unchanged</td></tr><tr><td><strong>Over-order</strong> ×10</td><td>90</td><td>90</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Clean, dry stone.</strong> Wet pea gravel is heavier and clumps.</li><li><strong>A flat bed.</strong> Slopes need a binder or a different aggregate.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering stone for a path.</li></li><li><li>Filling a play area to depth.</li></li><li><li>Working out a bag count for a small job.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/river-rock">River rock</a> <a href="/construction/gravel">Gravel</a> <a href="/construction/rock">Rock</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pea gravel calculator work out?', 'a' => <<<'TXT'
            It returns area and pea gravel volume and pea gravel weight and bags of 50 lb from area length and area width and depth and density and over-order. The relationship is Area length × Area width.
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
            ['q' => 'How deep should pea gravel be?', 'a' => 'Two inches for a path over a solid base, three to four for a play area.'],
            ['q' => 'How much does a yard of pea gravel weigh?', 'a' => 'About 1.25 short tons — 2 500 lb — which is lighter than most other gravels.'],
        ],
        'related' => [
            ['path' => '/construction/river-rock', 'name' => 'River rock'],
            ['path' => '/construction/gravel', 'name' => 'Gravel'],
            ['path' => '/construction/rock', 'name' => 'Rock'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

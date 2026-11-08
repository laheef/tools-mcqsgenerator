<?php

/**
 * River rock
 * /construction/river-rock
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'River rock',
    'meta' => ['title' => 'River Rock Calculator: Yards for a Rock Bed', 'description' => 'Work out how much river rock a bed or border needs in cubic yards and tons, and how far a single ton will cover at the depth you want to lay it. All shown.', 'h1' => 'River rock', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Bed length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '20',
                    'help' => 'Along the border',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Bed width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '4',
                    'help' => 'Across it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '3',
                    'help' => 'Three inches hides the soil',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Density',
                    'type' => 'number',
                    'suffix' => 'tons/yd³',
                    'default' => '1.3',
                    'help' => '1.3 for rounded river rock',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Over-order',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Settlement and gaps',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area',
                    'label' => 'Bed area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'volume_yd3',
                    'label' => 'River rock volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
                ],
                [
                    'name' => 'tons',
                    'label' => 'River rock weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'tons',
                ],
                [
                    'name' => 'coverage_per_ton',
                    'label' => 'Coverage per ton',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'River rock',
            'results' => [
                'area' => 'length*width',
                'volume_yd3' => 'length*width*depth/12/27*(1+waste/100)',
                'tons' => 'length*width*depth/12/27*(1+waste/100)*density',
                'coverage_per_ton' => '27*12/(density*depth)',
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
        <p>River rock is a rounded, dense stone: about <strong>1.3 tons per cubic yard</strong>. Coverage is <strong>area × depth ÷ 27</strong> in yards, and a ton covers about <strong>33 ft² at 3 inches</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>River rock is the standard bed and border stone: rounded, comfortable to walk on and heavy enough to stay put. Because it is rounded it packs with more void than crushed stone, which is why the depth and the over-order both matter.</p><p>The page reports <strong>bed area and river rock volume and river rock weight and coverage per ton</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Bed area</strong></td><td><code>Bed length × Bed width</code></td></tr><tr><td><strong>River rock volume</strong></td><td><code>Bed length × Bed width × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100)</code></td></tr><tr><td><strong>River rock weight</strong></td><td><code>Bed length × Bed width × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100) × Density</code></td></tr><tr><td><strong>Coverage per ton</strong></td><td><code>27 × 12 ÷ (Density × Depth)</code></td></tr><tr><td><strong>Bed length</strong></td><td><code>Bed area ÷ Bed width</code></td></tr><tr><td><strong>Bed width</strong></td><td><code>Bed area ÷ Bed length</code></td></tr><tr><td><strong>Depth</strong></td><td><code>River rock volume × 27 × 12 ÷ (Bed length × Bed width × (1+Over-order ÷ 100))</code></td></tr><tr><td><strong>Density</strong></td><td><code>River rock weight ÷ River rock volume</code></td></tr><tr><td><strong>Over-order</strong></td><td><code>(River rock volume ÷ (Bed length × Bed width × Depth ÷ 12 ÷ 27)-1) × 100</code></td></tr></tbody></table><p><p>The coverage-per-ton result is the inverse of the volume calculation at the chosen depth: it says how many square feet one ton will cover, which is how bags and small deliveries are sold.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports bed area and river rock volume and river rock weight and coverage per ton.</p><ul><li><strong>Bed length</strong> — in ft. Along the border</li><li><strong>Bed width</strong> — in ft. Across it</li><li><strong>Depth</strong> — in in. Three inches hides the soil</li><li><strong>Density</strong> — in tons/yd³. 1.3 for rounded river rock</li><li><strong>Over-order</strong> — in %. Settlement and gaps</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Bed area</strong> — in ft²</li><li><strong>River rock volume</strong> — in yd³</li><li><strong>River rock weight</strong> — in tons</li><li><strong>Coverage per ton</strong> — in ft²</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Bed length = 20 ft, Bed width = 4 ft, Depth = 3 in, Density = 1.3 tons/yd³, Over-order = 10 % — and the results panel reads:</p><ul><li><strong>Bed area</strong> = <code>Bed length × Bed width</code> = <strong>80 ft²</strong></li><li><strong>River rock volume</strong> = <code>Bed length × Bed width × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100)</code> = <strong>0.815 yd³</strong></li><li><strong>River rock weight</strong> = <code>Bed length × Bed width × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100) × Density</code> = <strong>1.059 tons</strong></li><li><strong>Coverage per ton</strong> = <code>27 × 12 ÷ (Density × Depth)</code> = <strong>83.077 ft²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>20 × 4 = 80</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 20 × 4 ft border three inches deep: 80 ft², 0.81 yd³, 1.06 tons with ten per cent over. One ton covers about 83 ft² at that depth, so a ton almost does the whole border.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Three inches is enough to hide soil and hold weeds down; two inches is a mulch layer and four is a walking surface. Round rock at two inches lets soil show through within a season.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Bed area</th><th>River rock volume</th><th>River rock weight</th><th>Coverage per ton</th></tr></thead><tbody><tr><td><strong>Bed length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Bed width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Depth</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Density</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Over-order</strong> +10 %</td><td>+0 %</td><td>+0.91 %</td><td>+0.91 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Bed length</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Over-order</strong>, at 0.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Bed length = 10, Bed width = 3, Depth = 2, Density = 1.3, Over-order = 5, the page reports <strong>Bed area</strong> = 30 ft², <strong>River rock volume</strong> = 0.194 yd³, <strong>River rock weight</strong> = 0.253 tons, <strong>Coverage per ton</strong> = 124.615 ft². A small bed at two inches: 0.19 yd³ and a quarter of a ton — four or five bags.</li><li>With Bed length = 50, Bed width = 6, Depth = 4, Density = 1.35, Over-order = 10, the page reports <strong>Bed area</strong> = 300 ft², <strong>River rock volume</strong> = 4.074 yd³, <strong>River rock weight</strong> = 5.5 tons, <strong>Coverage per ton</strong> = 60 ft². A long border at four inches: 4.07 yd³ and 5.5 tons — a tipper, not a trailer.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Depth understated.</strong> Two inches of rounded rock does not hide soil; the job needs three.</li><li><strong>Density of crushed stone used.</strong> River rock is lighter, 1.3 against 1.4 to 1.5.</li><li><strong>Bags priced as yards.</strong> A 0.5 ft³ bag is 54 to the yard, and bagged rock costs several times the bulk price.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Bed area (ft²), River rock volume (yd³), River rock weight (tons), Coverage per ton (ft²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Bed dimensions in feet, depth in inches, area in square feet, volume in cubic yards and weight in short tons. Coverage per ton is in square feet at the depth entered.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need bed length and bed width and depth and density and over-order. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Bed area and river rock volume and river rock weight and coverage per ton should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Bed length</strong> ×10</td><td>80</td><td>800</td><td>ten times larger</td></tr><tr><td><strong>Bed width</strong> ×10</td><td>80</td><td>800</td><td>ten times larger</td></tr><tr><td><strong>Depth</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr><tr><td><strong>Density</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr><tr><td><strong>Over-order</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>One size of rock.</strong> Mixed sizes pack differently and need their own density.</li><li><strong>No edging.</strong> Round rock rolls; without an edge it ends up on the lawn.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering rock for a border.</li></li><li><li>Working out what a ton covers.</li></li><li><li>Comparing bagged and bulk prices.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/rock">Rock</a> <a href="/construction/pea-gravel">Pea gravel</a> <a href="/construction/landscape-rock">Landscape rock</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the River rock calculator work out?', 'a' => <<<'TXT'
            It returns bed area and river rock volume and river rock weight and coverage per ton from bed length and bed width and depth and density and over-order. The relationship is Bed length × Bed width.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Bed length (ft), Bed width (ft), Depth (in), Density (tons/yd³), Over-order (%). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: bed length in ft; bed width in ft; depth in in; density in tons/yd³; over-order in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many square feet does a ton of river rock cover?', 'a' => 'About 83 ft² at three inches deep, or 62 ft² at four inches.'],
            ['q' => 'How deep should river rock be?', 'a' => 'Three inches for weed suppression, four if it will be walked on.'],
        ],
        'related' => [
            ['path' => '/construction/rock', 'name' => 'Rock'],
            ['path' => '/construction/pea-gravel', 'name' => 'Pea gravel'],
            ['path' => '/construction/landscape-rock', 'name' => 'Landscape rock'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Paver sand
 * /construction/paver-sand
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Paver sand',
    'meta' => ['title' => 'Paver Sand Calculator: Bags and Volume Tool', 'description' => 'Work out the bedding sand a paver patio needs in cubic feet, tons and 50 lb bags from the area and the depth of the sand course. The formula is shown.', 'h1' => 'Paver sand', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'area',
                    'label' => 'Patio area',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '200',
                    'help' => 'Being paved',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Sand depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '1',
                    'help' => 'One inch is the usual bedding',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Sand density',
                    'type' => 'number',
                    'suffix' => 'lb/ft³',
                    'default' => '100',
                    'help' => '100 for damp bedding sand',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Waste',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Losses and screeding',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price per bag',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '6',
                    'help' => '50 lb bag',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume_ft3',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'tons',
                    'label' => 'Weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'tons',
                ],
                [
                    'name' => 'bags',
                    'label' => 'Bags',
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
            'title' => 'Paver sand',
            'results' => [
                'volume_ft3' => 'area*depth/12*(1+waste/100)',
                'tons' => 'area*depth/12*(1+waste/100)*density/2000',
                'bags' => 'ceil(area*depth/12*(1+waste/100)*density/50)',
                'cost' => 'ceil(area*depth/12*(1+waste/100)*density/50)*price',
                'area' => '12*volume_ft3/(depth*(1+waste/100))',
                'depth' => '12*volume_ft3/(area*(1+waste/100))',
                'waste' => '(volume_ft3/(area*depth/12)-1)*100',
                'price' => 'cost/bags',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Volume = area × depth</strong>, and <strong>bags = ceiling(volume ÷ 0.5)</strong> for 50 lb bags of damp sand.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Bedding sand is what the pavers sit on, and the course is thin — an inch is normal, and anything deeper settles unevenly. Because it is thin, the tonnage is small and the bag count is what people actually buy.</p><p>The page reports <strong>volume and weight and bags and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume</strong></td><td><code>Patio area × Sand depth ÷ 12 × (1+Waste ÷ 100)</code></td></tr><tr><td><strong>Weight</strong></td><td><code>Patio area × Sand depth ÷ 12 × (1+Waste ÷ 100) × Sand density ÷ 2000</code></td></tr><tr><td><strong>Bags</strong></td><td><code>ceil(Patio area × Sand depth ÷ 12 × (1+Waste ÷ 100) × Sand density ÷ 50)</code></td></tr><tr><td><strong>Cost</strong></td><td><code>ceil(Patio area × Sand depth ÷ 12 × (1+Waste ÷ 100) × Sand density ÷ 50) × Price per bag</code></td></tr><tr><td><strong>Patio area</strong></td><td><code>12 × Volume ÷ (Sand depth × (1+Waste ÷ 100))</code></td></tr><tr><td><strong>Sand depth</strong></td><td><code>12 × Volume ÷ (Patio area × (1+Waste ÷ 100))</code></td></tr><tr><td><strong>Waste</strong></td><td><code>(Volume ÷ (Patio area × Sand depth ÷ 12)-1) × 100</code></td></tr><tr><td><strong>Price per bag</strong></td><td><code>Cost ÷ Bags</code></td></tr></tbody></table><p><p>Damp bedding sand weighs about 100 lb/ft³, so an inch over a hundred square feet is a little over eight cubic feet, or about half a ton. Bags are sold at 50 lb, which is 0.5 ft³ each.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports volume and weight and bags and cost.</p><ul><li><strong>Patio area</strong> — in ft². Being paved</li><li><strong>Sand depth</strong> — in in. One inch is the usual bedding</li><li><strong>Sand density</strong> — in lb/ft³. 100 for damp bedding sand</li><li><strong>Waste</strong> — in %. Losses and screeding</li><li><strong>Price per bag</strong> — in $. 50 lb bag</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume</strong> — in ft³</li><li><strong>Weight</strong> — in tons</li><li><strong>Bags</strong></li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Patio area = 200 ft², Sand depth = 1 in, Sand density = 100 lb/ft³, Waste = 10 %, Price per bag = 6 $ — and the results panel reads:</p><ul><li><strong>Volume</strong> = <code>Patio area × Sand depth ÷ 12 × (1+Waste ÷ 100)</code> = <strong>18.333 ft³</strong></li><li><strong>Weight</strong> = <code>Patio area × Sand depth ÷ 12 × (1+Waste ÷ 100) × Sand density ÷ 2000</code> = <strong>0.917 tons</strong></li><li><strong>Bags</strong> = <code>ceil(Patio area × Sand depth ÷ 12 × (1+Waste ÷ 100) × Sand density ÷ 50)</code> = <strong>37</strong></li><li><strong>Cost</strong> = <code>ceil(Patio area × Sand depth ÷ 12 × (1+Waste ÷ 100) × Sand density ÷ 50) × Price per bag</code> = <strong>222 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>200 × 1 ÷ 12 × (1+10 ÷ 100) = 18.333</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 200 ft² patio with an inch of bedding sand and ten per cent waste is 18.333 ft³ of sand — 0.917 tons, or 37 bags, and 222 at $6 a bag.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the volume against the area: an inch of sand covers 12 ft² per cubic foot, so a hundred square feet is eight and a bit. If the volume is far higher, the depth has been entered in centimetres.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume</th><th>Weight</th><th>Bags</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Patio area</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10.81 %</td><td>+10.81 %</td></tr><tr><td><strong>Sand depth</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10.81 %</td><td>+10.81 %</td></tr><tr><td><strong>Sand density</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10.81 %</td><td>+10.81 %</td></tr><tr><td><strong>Waste</strong> +10 %</td><td>+0.91 %</td><td>+0.91 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Price per bag</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Patio area</strong>: a ten per cent move there shifts the result by about 10.8 per cent. The least sensitive is <strong>Waste</strong>, at 0.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Patio area = 500, Sand depth = 1, Sand density = 100, Waste = 12, Price per bag = 5, the page reports <strong>Volume</strong> = 46.667 ft³, <strong>Weight</strong> = 2.333 tons, <strong>Bags</strong> = 94, <strong>Cost</strong> = 470 $. A driveway in pavers: the same inch, five times the area.</li><li>With Patio area = 60, Sand depth = 2, Sand density = 100, Waste = 15, Price per bag = 7, the page reports <strong>Volume</strong> = 11.5 ft³, <strong>Weight</strong> = 0.575 tons, <strong>Bags</strong> = 23, <strong>Cost</strong> = 161 $. A small terrace over an uneven base, where the bedding is thicker.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Masonry sand ordered as bedding.</strong> Bedding sand is sharp and graded.</li><li><strong>Depth over an inch.</strong> A thick bed compacts unevenly and the pavers rock.</li><li><strong>Joint sand forgotten.</strong> It is swept in afterwards and is a separate bag count.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume (ft³), Weight (tons), Bags, Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Area in square feet, depth in inches, volume in cubic feet, weight in short tons, bags at 50 lb and cost in dollars.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need patio area and sand depth and sand density and waste and price per bag. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Volume and weight and bags and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Patio area</strong> ×10</td><td>18.333</td><td>183.333</td><td>ten times larger</td></tr><tr><td><strong>Sand depth</strong> ×10</td><td>18.333</td><td>183.333</td><td>ten times larger</td></tr><tr><td><strong>Sand density</strong> ×10</td><td>18.333</td><td>18.333</td><td>unchanged</td></tr><tr><td><strong>Waste</strong> ×10</td><td>18.333</td><td>33.333</td><td>×1.818</td></tr><tr><td><strong>Price per bag</strong> ×10</td><td>18.333</td><td>18.333</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A level course.</strong> Slopes and steps change the thickness.</li><li><strong>Bedding only.</strong> The base is compacted stone, not sand.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Buying bedding sand.</li></li><li><li>Checking a bulk order against bags.</li></li><li><li>Estimating a small patio.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/paver">Paver</a> <a href="/construction/sand">Sand</a> <a href="/construction/road-base">Road base</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Paver sand calculator work out?', 'a' => <<<'TXT'
            It returns volume and weight and bags and cost from patio area and sand depth and sand density and waste and price per bag. The relationship is Patio area × Sand depth ÷ 12 × (1+Waste ÷ 100).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Patio area (ft²), Sand depth (in), Sand density (lb/ft³), Waste (%), Price per bag ($). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: patio area in ft²; sand depth in in; sand density in lb/ft³; waste in %; price per bag in $. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much sand under pavers?', 'a' => 'One inch of bedding sand, which is about 0.083 ft³ per square foot.'],
            ['q' => 'How many bags of sand for 200 square feet?', 'a' => 'About 50 bags of 50 lb at an inch deep with ten per cent waste.'],
        ],
        'related' => [
            ['path' => '/construction/paver', 'name' => 'Paver'],
            ['path' => '/construction/sand', 'name' => 'Sand'],
            ['path' => '/construction/road-base', 'name' => 'Road base'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

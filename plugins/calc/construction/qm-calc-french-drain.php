<?php

/**
 * French drain
 * /construction/french-drain
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'French drain',
    'meta' => ['title' => 'French Drain Calculator: Gravel, Pipe and Fabric', 'description' => 'Size a French drain trench: the gravel it holds, the pipe and geotextile that line it, and the cost of the three at your own prices. The formula is shown.', 'h1' => 'French drain', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Drain length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '60',
                    'help' => 'Total trench',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'trench_width',
                    'label' => 'Trench width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'A shovel\'s width',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'trench_depth',
                    'label' => 'Trench depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '18',
                    'help' => 'Below the surface',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Gravel density',
                    'type' => 'number',
                    'suffix' => 'lb/ft³',
                    'default' => '100',
                    'help' => 'Washed stone is about 100',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gravel_price',
                    'label' => 'Gravel price',
                    'type' => 'number',
                    'suffix' => '$/ton',
                    'default' => '45',
                    'help' => 'Delivered',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pipe_price',
                    'label' => 'Pipe price',
                    'type' => 'number',
                    'suffix' => '$/ft',
                    'default' => '1.5',
                    'help' => 'Perforated pipe',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fabric_price',
                    'label' => 'Fabric price',
                    'type' => 'number',
                    'suffix' => '$/ft²',
                    'default' => '0.4',
                    'help' => 'Geotextile',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'trench_ft3',
                    'label' => 'Trench volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'gravel_tons',
                    'label' => 'Gravel',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ton',
                ],
                [
                    'name' => 'pipe_ft',
                    'label' => 'Pipe',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'fabric_ft2',
                    'label' => 'Fabric',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
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
            'title' => 'French drain',
            'results' => [
                'trench_ft3' => 'length*trench_width*trench_depth/144',
                'gravel_tons' => 'length*trench_width*trench_depth/144*density/2000',
                'pipe_ft' => 'length',
                'fabric_ft2' => 'length*(trench_width+2*trench_depth)/12',
                'cost' => 'length*trench_width*trench_depth/144*density/2000*gravel_price+length*pipe_price+length*(trench_width+2*trench_depth)/12*fabric_price',
                'length' => 'trench_ft3*144/(trench_width*trench_depth)',
                'trench_depth' => 'trench_ft3*144/(length*trench_width)',
                'trench_width' => 'trench_ft3*144/(length*trench_depth)',
                'gravel_price' => '(cost-pipe_ft*pipe_price-fabric_ft2*fabric_price)/gravel_tons',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Trench cubic feet = length × width × depth ÷ 144</strong> with inches for width and depth; the gravel weight follows from the density.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A French drain is a trench filled with stone around a perforated pipe, lined with fabric so the soil does not silt it up. It is cheap to build and easy to under-order, because the stone is nearly the whole volume and the pipe is a small part of the cost.</p><p>The page reports <strong>trench volume and gravel and pipe and fabric and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Trench volume</strong></td><td><code>Drain length × Trench width × Trench depth ÷ 144</code></td></tr><tr><td><strong>Gravel</strong></td><td><code>Drain length × Trench width × Trench depth ÷ 144 × Gravel density ÷ 2000</code></td></tr><tr><td><strong>Pipe</strong></td><td><code>Drain length</code></td></tr><tr><td><strong>Fabric</strong></td><td><code>Drain length × (Trench width+2 × Trench depth) ÷ 12</code></td></tr><tr><td><strong>Cost</strong></td><td><code>Drain length × Trench width × Trench depth ÷ 144 × Gravel density ÷ 2000 × Gravel price+Drain length × Pipe price+Drain length × (Trench width+2 × Trench depth) ÷ 12 × Fabric price</code></td></tr><tr><td><strong>Drain length</strong></td><td><code>Trench volume × 144 ÷ (Trench width × Trench depth)</code></td></tr><tr><td><strong>Trench depth</strong></td><td><code>Trench volume × 144 ÷ (Drain length × Trench width)</code></td></tr><tr><td><strong>Trench width</strong></td><td><code>Trench volume × 144 ÷ (Drain length × Trench depth)</code></td></tr><tr><td><strong>Gravel price</strong></td><td><code>(Cost-Pipe × Pipe price-Fabric × Fabric price) ÷ Gravel</code></td></tr></tbody></table><p><p>The trench is a long box, so its volume is length times width times depth, with the two small dimensions in inches and the conversion of a hundred and forty four folded in. The fabric has to line the sides and the bottom, so it takes the width plus twice the depth for every foot of trench.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 7 boxes and the page has everything it needs. It reports trench volume and gravel and pipe and fabric and cost.</p><ul><li><strong>Drain length</strong> — in ft. Total trench</li><li><strong>Trench width</strong> — in in. A shovel&#x27;s width</li><li><strong>Trench depth</strong> — in in. Below the surface</li><li><strong>Gravel density</strong> — in lb/ft³. Washed stone is about 100</li><li><strong>Gravel price</strong> — in $/ton. Delivered</li><li><strong>Pipe price</strong> — in $/ft. Perforated pipe</li><li><strong>Fabric price</strong> — in $/ft². Geotextile</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Trench volume</strong> — in ft³</li><li><strong>Gravel</strong> — in ton</li><li><strong>Pipe</strong> — in ft</li><li><strong>Fabric</strong> — in ft²</li><li><strong>Cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Drain length = 60 ft, Trench width = 12 in, Trench depth = 18 in, Gravel density = 100 lb/ft³, Gravel price = 45 $/ton, Pipe price = 1.5 $/ft, Fabric price = 0.4 $/ft² — and the results panel reads:</p><ul><li><strong>Trench volume</strong> = <code>Drain length × Trench width × Trench depth ÷ 144</code> = <strong>90 ft³</strong></li><li><strong>Gravel</strong> = <code>Drain length × Trench width × Trench depth ÷ 144 × Gravel density ÷ 2000</code> = <strong>4.5 ton</strong></li><li><strong>Pipe</strong> = <code>Drain length</code> = <strong>60 ft</strong></li><li><strong>Fabric</strong> = <code>Drain length × (Trench width+2 × Trench depth) ÷ 12</code> = <strong>240 ft²</strong></li><li><strong>Cost</strong> = <code>Drain length × Trench width × Trench depth ÷ 144 × Gravel density ÷ 2000 × Gravel price+Drain length × Pipe price+Drain length × (Trench width+2 × Trench depth) ÷ 12 × Fabric price</code> = <strong>388.5 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>60 × 12 × 18 ÷ 144 = 90</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>60 ft of trench 12 in wide and 18 in deep holds 90 ft³ of stone — 4.5 tons — with 60 ft of pipe and 240 ft² of fabric, for 388.5 at the prices shown.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the stone against the length: a foot of twelve by eighteen trench holds about a cubic foot and a half, so the tons should be a little under a tenth of the length in feet. Half that suggests a missing conversion.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Trench volume</th><th>Gravel</th><th>Pipe</th><th>Fabric</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Drain length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Trench width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+2.5 %</td><td>+5.83 %</td></tr><tr><td><strong>Trench depth</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+7.5 %</td><td>+7.07 %</td></tr><tr><td><strong>Gravel density</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td><td>+5.21 %</td></tr><tr><td><strong>Gravel price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+5.21 %</td></tr><tr><td><strong>Pipe price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+2.32 %</td></tr><tr><td><strong>Fabric price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+2.47 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Trench width</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Pipe price</strong>, at 2.3 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Drain length = 120, Trench width = 18, Trench depth = 24, the page reports <strong>Trench volume</strong> = 360 ft³, <strong>Gravel</strong> = 18 ton, <strong>Pipe</strong> = 120 ft, <strong>Fabric</strong> = 660 ft², <strong>Cost</strong> = 1 254 $. A deep, wide drain around a wet basement: much more stone.</li><li>With Drain length = 40, Trench depth = 12, the page reports <strong>Trench volume</strong> = 40 ft³, <strong>Gravel</strong> = 2 ton, <strong>Pipe</strong> = 40 ft, <strong>Fabric</strong> = 120 ft², <strong>Cost</strong> = 198 $. A shallow surface drain for a lawn.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Fabric counted once.</strong> It lines both sides and the bottom.</li><li><strong>Stone compacted.</strong> Loose fill settles; order a little more.</li><li><strong>No fall.</strong> A level trench holds water instead of moving it.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Trench volume (ft³), Gravel (ton), Pipe (ft), Fabric (ft²), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Length in feet, trench dimensions in inches, stone in tons, fabric in square feet.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need drain length and trench width and trench depth and gravel density and gravel price and pipe price and fabric price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Trench volume and gravel and pipe and fabric and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Drain length</strong> ×10</td><td>90</td><td>900</td><td>ten times larger</td></tr><tr><td><strong>Trench width</strong> ×10</td><td>90</td><td>900</td><td>ten times larger</td></tr><tr><td><strong>Trench depth</strong> ×10</td><td>90</td><td>900</td><td>ten times larger</td></tr><tr><td><strong>Gravel density</strong> ×10</td><td>90</td><td>90</td><td>unchanged</td></tr><tr><td><strong>Gravel price</strong> ×10</td><td>90</td><td>90</td><td>unchanged</td></tr><tr><td><strong>Pipe price</strong> ×10</td><td>90</td><td>90</td><td>unchanged</td></tr><tr><td><strong>Fabric price</strong> ×10</td><td>90</td><td>90</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Straight trench.</strong> Corners and outlets need fittings.</li><li><strong>No outlet design.</strong> The drain still needs somewhere to go.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering stone for a drain.</li></li><li><li>Costing a basement waterproofing job.</li></li><li><li>Checking a landscaper's quantities.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/gravel-driveway">Gravel driveway</a> <a href="/construction/retaining-wall">Retaining wall</a> <a href="/construction/elevation-grade">Elevation grade</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the French drain calculator work out?', 'a' => <<<'TXT'
            It returns trench volume and gravel and pipe and fabric and cost from drain length and trench width and trench depth and gravel density and gravel price and pipe price and fabric price. The relationship is Drain length × Trench width × Trench depth ÷ 144.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Drain length (ft), Trench width (in), Trench depth (in), Gravel density (lb/ft³), Gravel price ($/ton), Pipe price ($/ft), Fabric price ($/ft²). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: drain length in ft; trench width in in; trench depth in in; gravel density in lb/ft³; gravel price in $/ton; pipe price in $/ft; fabric price in $/ft². The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much gravel goes in a French drain?', 'a' => 'The whole trench volume — about a cubic foot and a half per foot for twelve by eighteen.'],
            ['q' => 'Do I need fabric around a French drain?', 'a' => 'Yes, or the surrounding soil silts into the stone and the drain stops working.'],
        ],
        'related' => [
            ['path' => '/construction/gravel-driveway', 'name' => 'Gravel driveway'],
            ['path' => '/construction/retaining-wall', 'name' => 'Retaining wall'],
            ['path' => '/construction/elevation-grade', 'name' => 'Elevation grade'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Road base
 * /construction/road-base
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Road base',
    'meta' => ['title' => 'Road Base Calculator: Tons and Cubic Yards Tool', 'description' => 'Work out how much road base a drive needs, in cubic yards, tons and tonnes, with compaction allowed for and the delivered cost beside it. Units shown.', 'h1' => 'Road base', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Road length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '100',
                    'help' => 'Along the drive',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Road width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '10',
                    'help' => 'Carriageway width',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Compacted depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '6',
                    'help' => 'Finished thickness',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'compaction',
                    'label' => 'Compaction allowance',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '20',
                    'help' => 'Loose over compacted, 15 to 25',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Density',
                    'type' => 'number',
                    'suffix' => 'lb/ft³',
                    'default' => '120',
                    'help' => '120 crushed stone, 105 gravel',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/ton',
                    'default' => '25',
                    'help' => 'Delivered',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume_yd3',
                    'label' => 'Order volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
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
                    'name' => 'tonnes',
                    'label' => 'Weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 't',
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
            'title' => 'Road base',
            'results' => [
                'volume_yd3' => 'length*width*depth/12*(1+compaction/100)/27',
                'tons' => 'length*width*depth/12*(1+compaction/100)*density/2000',
                'tonnes' => 'length*width*depth/12*(1+compaction/100)*density/2204.62',
                'cost' => 'length*width*depth/12*(1+compaction/100)*density/2000*price',
                'length' => '27*volume_yd3/(width*depth/12*(1+compaction/100))',
                'width' => '27*volume_yd3/(length*depth/12*(1+compaction/100))',
                'depth' => '12*27*volume_yd3/(length*width*(1+compaction/100))',
                'price' => 'cost/tons',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p><strong>Volume = length × width × depth</strong>, and <strong>tons = volume × density ÷ 2 000</strong>, with a compaction allowance added to the loose volume.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A road base is ordered loose and paid for compacted, and the gap between the two is the whole difficulty: stone that measures six inches loose will finish nearer five, so the order carries a fifth more. Get the allowance wrong and the drive ends up short at the gate, which is the worst place to be short.</p><p>The page reports <strong>order volume and weight (tons) and weight (t) and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Order volume</strong></td><td><code>Road length × Road width × Compacted depth ÷ 12 × (1+Compaction allowance ÷ 100) ÷ 27</code></td></tr><tr><td><strong>Weight (tons)</strong></td><td><code>Road length × Road width × Compacted depth ÷ 12 × (1+Compaction allowance ÷ 100) × Density ÷ 2000</code></td></tr><tr><td><strong>Weight (t)</strong></td><td><code>Road length × Road width × Compacted depth ÷ 12 × (1+Compaction allowance ÷ 100) × Density ÷ 2204.62</code></td></tr><tr><td><strong>Cost</strong></td><td><code>Road length × Road width × Compacted depth ÷ 12 × (1+Compaction allowance ÷ 100) × Density ÷ 2000 × Price</code></td></tr><tr><td><strong>Road length</strong></td><td><code>27 × Order volume ÷ (Road width × Compacted depth ÷ 12 × (1+Compaction allowance ÷ 100))</code></td></tr><tr><td><strong>Road width</strong></td><td><code>27 × Order volume ÷ (Road length × Compacted depth ÷ 12 × (1+Compaction allowance ÷ 100))</code></td></tr><tr><td><strong>Compacted depth</strong></td><td><code>12 × 27 × Order volume ÷ (Road length × Road width × (1+Compaction allowance ÷ 100))</code></td></tr><tr><td><strong>Price</strong></td><td><code>Cost ÷ Weight (tons)</code></td></tr></tbody></table><p><p>The compaction allowance is applied to the loose volume, not to the finished depth, so the finished job is the depth asked for. Density at 120 lb/ft³ is typical of crushed limestone; a rounded river gravel is nearer 105.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports order volume and weight (tons) and weight (t) and cost.</p><ul><li><strong>Road length</strong> — in ft. Along the drive</li><li><strong>Road width</strong> — in ft. Carriageway width</li><li><strong>Compacted depth</strong> — in in. Finished thickness</li><li><strong>Compaction allowance</strong> — in %. Loose over compacted, 15 to 25</li><li><strong>Density</strong> — in lb/ft³. 120 crushed stone, 105 gravel</li><li><strong>Price</strong> — in $/ton. Delivered</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Order volume</strong> — in yd³</li><li><strong>Weight</strong> — in tons</li><li><strong>Weight</strong> — in t</li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Road length = 100 ft, Road width = 10 ft, Compacted depth = 6 in, Compaction allowance = 20 %, Density = 120 lb/ft³, Price = 25 $/ton — and the results panel reads:</p><ul><li><strong>Order volume</strong> = <code>Road length × Road width × Compacted depth ÷ 12 × (1+Compaction allowance ÷ 100) ÷ 27</code> = <strong>22.222 yd³</strong></li><li><strong>Weight</strong> = <code>Road length × Road width × Compacted depth ÷ 12 × (1+Compaction allowance ÷ 100) × Density ÷ 2000</code> = <strong>36 tons</strong></li><li><strong>Weight</strong> = <code>Road length × Road width × Compacted depth ÷ 12 × (1+Compaction allowance ÷ 100) × Density ÷ 2204.62</code> = <strong>32.659 t</strong></li><li><strong>Cost</strong> = <code>Road length × Road width × Compacted depth ÷ 12 × (1+Compaction allowance ÷ 100) × Density ÷ 2000 × Price</code> = <strong>900 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>100 × 10 × 6 ÷ 12 × (1+20 ÷ 100) ÷ 27 = 22.222</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A hundred feet by ten at six inches compacted, with twenty per cent extra, is 22.222 yd³ of loose stone weighing 36 short tons — 32.659 tonnes. At $25 a ton that is 900 delivered.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the tons against the yards: crushed stone at 120 lb/ft³ works out near 1.6 tons to the cubic yard. If the figure is far from that, the density is in the wrong units — tonnes per cubic metre is 1 600, not 120.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Order volume</th><th>Weight</th><th>Weight</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Road length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Road width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Compacted depth</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Compaction allowance</strong> +10 %</td><td>+1.67 %</td><td>+1.67 %</td><td>+1.67 %</td><td>+1.67 %</td></tr><tr><td><strong>Density</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Road length</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Compaction allowance</strong>, at 1.7 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Road length = 60, Road width = 12, Compacted depth = 4, Compaction allowance = 15, Density = 120, Price = 28, the page reports <strong>Order volume</strong> = 10.222 yd³, <strong>Weight</strong> = 16.56 tons, <strong>Weight</strong> = 15.023 t, <strong>Cost</strong> = 463.68 $. A short domestic drive with a thinner base and a tighter allowance.</li><li>With Road length = 400, Road width = 12, Compacted depth = 8, Compaction allowance = 25, Density = 120, Price = 22, the page reports <strong>Order volume</strong> = 148.148 yd³, <strong>Weight</strong> = 240 tons, <strong>Weight</strong> = 217.725 t, <strong>Cost</strong> = 5 280 $. A long farm track: the allowance is larger because the sub-base is uneven.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Finished depth used as the order depth.</strong> Stone compacts by about a fifth.</li><li><strong>Density in kg/m³.</strong> Those figures are about 1 600 and belong in a metric calculator.</li><li><strong>Geotextile left out.</strong> Without a membrane the base pumps into the subgrade.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Order volume (yd³), Weight (tons), Weight (t), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Length and width in feet, depth in inches, order volume in cubic yards, weight in short tons and tonnes, cost in dollars at the price you enter per ton.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need road length and road width and compacted depth and compaction allowance and density and price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Order volume and weight (tons) and weight (t) and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Road length</strong> ×10</td><td>22.222</td><td>222.222</td><td>ten times larger</td></tr><tr><td><strong>Road width</strong> ×10</td><td>22.222</td><td>222.222</td><td>ten times larger</td></tr><tr><td><strong>Compacted depth</strong> ×10</td><td>22.222</td><td>222.222</td><td>ten times larger</td></tr><tr><td><strong>Compaction allowance</strong> ×10</td><td>22.222</td><td>55.556</td><td>×2.5</td></tr><tr><td><strong>Density</strong> ×10</td><td>22.222</td><td>22.222</td><td>unchanged</td></tr><tr><td><strong>Price</strong> ×10</td><td>22.222</td><td>22.222</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A flat rectangle.</strong> Camber and cross-fall add a little material.</li><li><strong>One layer.</strong> A two-layer base is two calculations.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering stone for a drive.</li></li><li><li>Pricing a haul.</li></li><li><li>Comparing crushed stone with gravel.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/gravel">Gravel</a> <a href="/construction/crushed-stone">Crushed stone</a> <a href="/construction/gravel-driveway">Gravel driveway</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Road base calculator work out?', 'a' => <<<'TXT'
            It returns order volume and weight (tons) and weight (t) and cost from road length and road width and compacted depth and compaction allowance and density and price. The relationship is Road length × Road width × Compacted depth ÷ 12 × (1+Compaction allowance ÷ 100) ÷ 27.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Road length (ft), Road width (ft), Compacted depth (in), Compaction allowance (%), Density (lb/ft³), Price ($/ton). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: road length in ft; road width in ft; compacted depth in in; compaction allowance in %; density in lb/ft³; price in $/ton. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many tons of road base do I need?', 'a' => 'About 1.6 tons per cubic yard of finished base at 120 lb/ft³, plus a fifth for compaction.'],
            ['q' => 'How thick should a drive base be?', 'a' => 'Four inches of compacted stone carries a car; eight carries a delivery truck.'],
        ],
        'related' => [
            ['path' => '/construction/gravel', 'name' => 'Gravel'],
            ['path' => '/construction/crushed-stone', 'name' => 'Crushed stone'],
            ['path' => '/construction/gravel-driveway', 'name' => 'Gravel driveway'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Asphalt
 * /construction/asphalt
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Asphalt',
    'meta' => ['title' => 'Asphalt Calculator: Tons for a Driveway Tool', 'description' => 'Work out the asphalt a driveway takes in tons and tonnes from its length, width and compacted depth, with a waste allowance and the delivered cost. Units shown.', 'h1' => 'Asphalt', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Drive length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '40',
                    'help' => 'Along the run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Drive width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Carriageway',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Compacted depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '3',
                    'help' => 'Finished thickness',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Density',
                    'type' => 'number',
                    'suffix' => 'lb/ft³',
                    'default' => '145',
                    'help' => '145 for hot-mix asphalt',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Over-order',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '5',
                    'help' => 'Edges and joints',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/ton',
                    'default' => '120',
                    'help' => 'Delivered and laid',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume_yd3',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
                ],
                [
                    'name' => 'tons',
                    'label' => 'Tons',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'tonnes',
                    'label' => 'Tonnes',
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
            'title' => 'Asphalt',
            'results' => [
                'volume_yd3' => 'length*width*depth/12*(1+waste/100)/27',
                'tons' => 'length*width*depth/12*(1+waste/100)*density/2000',
                'tonnes' => 'length*width*depth/12*(1+waste/100)*density/2204.62',
                'cost' => 'length*width*depth/12*(1+waste/100)*density/2000*price',
                'length' => '27*volume_yd3/(width*depth/12*(1+waste/100))',
                'width' => '27*volume_yd3/(length*depth/12*(1+waste/100))',
                'depth' => '324*volume_yd3/(length*width*(1+waste/100))',
                'density' => 'tons*2000/(length*width*depth/12*(1+waste/100))',
                'waste' => '(tons/(length*width*depth/12*density/2000)-1)*100',
                'price' => 'cost/tons',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Volume = length × width × depth</strong>, then <strong>tons = volume × density ÷ 2 000</strong>, with a compaction allowance on top.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Asphalt is ordered by the ton and laid by the inch, and the density is the number that connects them: a ton of hot-mix covers about 80 square feet at two inches. Getting the tonnage wrong means a lorry sent away or a driveway that finishes two inches thin at the gate.</p><p>The page reports <strong>volume and tons and tonnes and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume</strong></td><td><code>Drive length × Drive width × Compacted depth ÷ 12 × (1+Over-order ÷ 100) ÷ 27</code></td></tr><tr><td><strong>Tons</strong></td><td><code>Drive length × Drive width × Compacted depth ÷ 12 × (1+Over-order ÷ 100) × Density ÷ 2000</code></td></tr><tr><td><strong>Tonnes</strong></td><td><code>Drive length × Drive width × Compacted depth ÷ 12 × (1+Over-order ÷ 100) × Density ÷ 2204.62</code></td></tr><tr><td><strong>Cost</strong></td><td><code>Drive length × Drive width × Compacted depth ÷ 12 × (1+Over-order ÷ 100) × Density ÷ 2000 × Price</code></td></tr><tr><td><strong>Drive length</strong></td><td><code>27 × Volume ÷ (Drive width × Compacted depth ÷ 12 × (1+Over-order ÷ 100))</code></td></tr><tr><td><strong>Drive width</strong></td><td><code>27 × Volume ÷ (Drive length × Compacted depth ÷ 12 × (1+Over-order ÷ 100))</code></td></tr><tr><td><strong>Compacted depth</strong></td><td><code>324 × Volume ÷ (Drive length × Drive width × (1+Over-order ÷ 100))</code></td></tr><tr><td><strong>Density</strong></td><td><code>Tons × 2000 ÷ (Drive length × Drive width × Compacted depth ÷ 12 × (1+Over-order ÷ 100))</code></td></tr><tr><td><strong>Over-order</strong></td><td><code>(Tons ÷ (Drive length × Drive width × Compacted depth ÷ 12 × Density ÷ 2000)-1) × 100</code></td></tr><tr><td><strong>Price</strong></td><td><code>Cost ÷ Tons</code></td></tr></tbody></table><p><p>Hot-mix asphalt is about 145 lb/ft³ laid and compacted, which works out near 1.95 tons to the cubic yard. The over-order is small here — five per cent covers the joints and edges — because surplus hot-mix is expensive to waste.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports volume and tons and tonnes and cost.</p><ul><li><strong>Drive length</strong> — in ft. Along the run</li><li><strong>Drive width</strong> — in ft. Carriageway</li><li><strong>Compacted depth</strong> — in in. Finished thickness</li><li><strong>Density</strong> — in lb/ft³. 145 for hot-mix asphalt</li><li><strong>Over-order</strong> — in %. Edges and joints</li><li><strong>Price</strong> — in $/ton. Delivered and laid</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume</strong> — in yd³</li><li><strong>Tons</strong></li><li><strong>Tonnes</strong> — in t</li><li><strong>Cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Drive length = 40 ft, Drive width = 12 ft, Compacted depth = 3 in, Density = 145 lb/ft³, Over-order = 5 %, Price = 120 $/ton — and the results panel reads:</p><ul><li><strong>Volume</strong> = <code>Drive length × Drive width × Compacted depth ÷ 12 × (1+Over-order ÷ 100) ÷ 27</code> = <strong>4.667 yd³</strong></li><li><strong>Tons</strong> = <code>Drive length × Drive width × Compacted depth ÷ 12 × (1+Over-order ÷ 100) × Density ÷ 2000</code> = <strong>9.135</strong></li><li><strong>Tonnes</strong> = <code>Drive length × Drive width × Compacted depth ÷ 12 × (1+Over-order ÷ 100) × Density ÷ 2204.62</code> = <strong>8.287 t</strong></li><li><strong>Cost</strong> = <code>Drive length × Drive width × Compacted depth ÷ 12 × (1+Over-order ÷ 100) × Density ÷ 2000 × Price</code> = <strong>1 096.2 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>40 × 12 × 3 ÷ 12 × (1+5 ÷ 100) ÷ 27 = 4.667</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A drive 40 by 12 ft at three inches is 4.667 yd³ of asphalt, weighing 9.135 tons — 8.287 tonnes. At $120 a ton, laid, that is 1 096.2.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the tons against the volume: asphalt is close to two tons to the cubic yard. If the figure is far off, the density has been entered as kilograms per cubic metre, which is about 2 400.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume</th><th>Tons</th><th>Tonnes</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Drive length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Drive width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Compacted depth</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Density</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Over-order</strong> +10 %</td><td>+0.48 %</td><td>+0.48 %</td><td>+0.48 %</td><td>+0.48 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Drive width</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Over-order</strong>, at 0.5 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Drive length = 60, Drive width = 15, Compacted depth = 4, Density = 145, Over-order = 5, Price = 115, the page reports <strong>Volume</strong> = 11.667 yd³, <strong>Tons</strong> = 22.837, <strong>Tonnes</strong> = 20.718 t, <strong>Cost</strong> = 2 626.312 $. A heavier section for a drive used by vans: four inches instead of three.</li><li>With Drive length = 20, Drive width = 10, Compacted depth = 2, Density = 145, Over-order = 8, Price = 130, the page reports <strong>Volume</strong> = 1.333 yd³, <strong>Tons</strong> = 2.61, <strong>Tonnes</strong> = 2.368 t, <strong>Cost</strong> = 339.3 $. A patch or a footpath: two inches, and a larger over-order for the small area.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Loose depth used instead of compacted.</strong> Asphalt compacts by about a quarter.</li><li><strong>Density in metric.</strong> 2 400 kg/m³ is the same material in other units.</li><li><strong>Base left out of the price.</strong> The sub-base is a separate line.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume (yd³), Tons, Tonnes (t), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Length and width in feet, depth in inches, volume in cubic yards, weight in short tons and tonnes, cost in dollars per ton.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need drive length and drive width and compacted depth and density and over-order and price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Volume and tons and tonnes and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Drive length</strong> ×10</td><td>4.667</td><td>46.667</td><td>ten times larger</td></tr><tr><td><strong>Drive width</strong> ×10</td><td>4.667</td><td>46.667</td><td>ten times larger</td></tr><tr><td><strong>Compacted depth</strong> ×10</td><td>4.667</td><td>46.667</td><td>ten times larger</td></tr><tr><td><strong>Density</strong> ×10</td><td>4.667</td><td>4.667</td><td>unchanged</td></tr><tr><td><strong>Over-order</strong> ×10</td><td>4.667</td><td>6.667</td><td>×1.429</td></tr><tr><td><strong>Price</strong> ×10</td><td>4.667</td><td>4.667</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A flat rectangle.</strong> Camber and tie-ins add a little.</li><li><strong>Material and lay only.</strong> Excavation and edging are separate.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering asphalt for a drive.</li></li><li><li>Pricing a resurfacing job.</li></li><li><li>Checking a contractor's tonnage.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/road-base">Road base</a> <a href="/construction/gravel-driveway">Gravel driveway</a> <a href="/construction/paver">Paver</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Asphalt calculator work out?', 'a' => <<<'TXT'
            It returns volume and tons and tonnes and cost from drive length and drive width and compacted depth and density and over-order and price. The relationship is Drive length × Drive width × Compacted depth ÷ 12 × (1+Over-order ÷ 100) ÷ 27.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Drive length (ft), Drive width (ft), Compacted depth (in), Density (lb/ft³), Over-order (%), Price ($/ton). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: drive length in ft; drive width in ft; compacted depth in in; density in lb/ft³; over-order in %; price in $/ton. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many tons of asphalt for a 40 by 12 drive?', 'a' => 'About 9 tons at three inches with five per cent over-order.'],
            ['q' => 'How thick should an asphalt drive be?', 'a' => 'Two to three inches over a prepared base for cars, four for heavier traffic.'],
        ],
        'related' => [
            ['path' => '/construction/road-base', 'name' => 'Road base'],
            ['path' => '/construction/gravel-driveway', 'name' => 'Gravel driveway'],
            ['path' => '/construction/paver', 'name' => 'Paver'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

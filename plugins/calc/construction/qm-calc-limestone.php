<?php

/**
 * Limestone
 * /construction/limestone
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Limestone',
    'meta' => ['title' => 'Limestone Calculator: Volume, Tons and Price', 'description' => 'Work out the limestone a drive, base or wall needs, in cubic yards and tons, at the density crushed limestone actually runs, with the cost added up. All shown.', 'h1' => 'Limestone', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Area length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '40',
                    'help' => 'Along the drive or base',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Area width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Across it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '4',
                    'help' => 'Four inches for a compacted base',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Density',
                    'type' => 'number',
                    'suffix' => 'tons/yd³',
                    'default' => '1.5',
                    'help' => '1.5 crushed, 1.7 for solid blocks',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/ton',
                    'default' => '45',
                    'help' => 'Delivered crushed limestone',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume_yd3',
                    'label' => 'Limestone volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
                ],
                [
                    'name' => 'tons',
                    'label' => 'Limestone weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'tons',
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
            'title' => 'Limestone',
            'results' => [
                'volume_yd3' => 'length*width*depth/12/27',
                'tons' => 'length*width*depth/12/27*density',
                'cost' => 'length*width*depth/12/27*density*price',
                'length' => 'volume_yd3*27*12/(width*depth)',
                'width' => 'volume_yd3*27*12/(length*depth)',
                'depth' => 'volume_yd3*27*12/(length*width)',
                'density' => 'tons/volume_yd3',
                'price' => 'cost/tons',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Limestone is denser than most gravel: about <strong>1.5 tons per cubic yard</strong> when crushed. <strong>Volume = L × W × D ÷ 27</strong>, and the tonnage follows from the density box.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Crushed limestone is the go-to base and drive surface across much of the US: it compacts well, binds with fines and drains reasonably. Being denser than gravel, the same volume costs more in tons — and the ton is how it is priced.</p><p>The page reports <strong>limestone volume and limestone weight and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Limestone volume</strong></td><td><code>Area length × Area width × Depth ÷ 12 ÷ 27</code></td></tr><tr><td><strong>Limestone weight</strong></td><td><code>Area length × Area width × Depth ÷ 12 ÷ 27 × Density</code></td></tr><tr><td><strong>Cost</strong></td><td><code>Area length × Area width × Depth ÷ 12 ÷ 27 × Density × Price</code></td></tr><tr><td><strong>Area length</strong></td><td><code>Limestone volume × 27 × 12 ÷ (Area width × Depth)</code></td></tr><tr><td><strong>Area width</strong></td><td><code>Limestone volume × 27 × 12 ÷ (Area length × Depth)</code></td></tr><tr><td><strong>Depth</strong></td><td><code>Limestone volume × 27 × 12 ÷ (Area length × Area width)</code></td></tr><tr><td><strong>Density</strong></td><td><code>Limestone weight ÷ Limestone volume</code></td></tr><tr><td><strong>Price</strong></td><td><code>Cost ÷ Limestone weight</code></td></tr></tbody></table><p><p>There is no waste box here because a limestone base is usually ordered to a compacted depth, and the over-order is the difference between loose and compacted — about a fifth. Add it to the depth instead, or add ten per cent to the volume by hand.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports limestone volume and limestone weight and cost.</p><ul><li><strong>Area length</strong> — in ft. Along the drive or base</li><li><strong>Area width</strong> — in ft. Across it</li><li><strong>Depth</strong> — in in. Four inches for a compacted base</li><li><strong>Density</strong> — in tons/yd³. 1.5 crushed, 1.7 for solid blocks</li><li><strong>Price</strong> — in $/ton. Delivered crushed limestone</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Limestone volume</strong> — in yd³</li><li><strong>Limestone weight</strong> — in tons</li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Area length = 40 ft, Area width = 12 ft, Depth = 4 in, Density = 1.5 tons/yd³, Price = 45 $/ton — and the results panel reads:</p><ul><li><strong>Limestone volume</strong> = <code>Area length × Area width × Depth ÷ 12 ÷ 27</code> = <strong>5.926 yd³</strong></li><li><strong>Limestone weight</strong> = <code>Area length × Area width × Depth ÷ 12 ÷ 27 × Density</code> = <strong>8.889 tons</strong></li><li><strong>Cost</strong> = <code>Area length × Area width × Depth ÷ 12 ÷ 27 × Density × Price</code> = <strong>400 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>40 × 12 × 4 ÷ 12 ÷ 27 = 5.926</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 40 × 12 ft drive at four inches: 480 ft², 5.9 yd³ and 8.9 tons at 1.5 tons a yard, which at $45 a ton is $400 — before compaction, so order in the region of seven yards loose.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Compare the tonnage with the depth: a four-inch compacted base needs about 20 per cent more loose stone, so the number to order is 7.4 yd³ and 11.1 tons. The page gives the finished volume, which is what the detail specifies.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Limestone volume</th><th>Limestone weight</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Area length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Area width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Depth</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Density</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Density</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Depth</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Area length = 20, Area width = 10, Depth = 6, Density = 1.5, Price = 45, the page reports <strong>Limestone volume</strong> = 3.704 yd³, <strong>Limestone weight</strong> = 5.556 tons, <strong>Cost</strong> = 250 $. A small pad at six inches: 3.70 yd³, 5.6 tons and $250.</li><li>With Area length = 100, Area width = 3, Depth = 3, Density = 1.5, Price = 50, the page reports <strong>Limestone volume</strong> = 2.778 yd³, <strong>Limestone weight</strong> = 4.167 tons, <strong>Cost</strong> = 208.333 $. A hundred-foot path: 2.78 yd³ and 4.2 tons — $208 of stone.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Finished depth entered as loose.</strong> Limestone compacts by about a fifth; order the loose volume.</li><li><strong>Density of solid stone used.</strong> Crushed limestone is 1.5 tons/yd³; solid blocks are 1.7 and are sold differently.</li><li><strong>Price per yard compared with per ton.</strong> A yard is 1.5 tons, so a $45/ton price is $67.50 a yard.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Limestone volume (yd³), Limestone weight (tons), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Dimensions in feet, depth in inches, volume in cubic yards, weight in short tons and cost in dollars at the price per ton.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need area length and area width and depth and density and price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Limestone volume and limestone weight and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Area length</strong> ×10</td><td>5.926</td><td>59.259</td><td>ten times larger</td></tr><tr><td><strong>Area width</strong> ×10</td><td>5.926</td><td>59.259</td><td>ten times larger</td></tr><tr><td><strong>Depth</strong> ×10</td><td>5.926</td><td>59.259</td><td>ten times larger</td></tr><tr><td><strong>Density</strong> ×10</td><td>5.926</td><td>5.926</td><td>unchanged</td></tr><tr><td><strong>Price</strong> ×10</td><td>5.926</td><td>5.926</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Crushed limestone only.</strong> Block and flagstone are priced by area, not by ton.</li><li><strong>No compaction factor.</strong> Add it to the depth or the volume yourself.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering a limestone drive.</li></li><li><li>Budgeting a base course.</li></li><li><li>Converting a ton price to a yard price.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/crushed-stone">Crushed stone</a> <a href="/construction/gravel">Gravel</a> <a href="/construction/road-base">Road base</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Limestone calculator work out?', 'a' => <<<'TXT'
            It returns limestone volume and limestone weight and cost from area length and area width and depth and density and price. The relationship is Area length × Area width × Depth ÷ 12 ÷ 27.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Area length (ft), Area width (ft), Depth (in), Density (tons/yd³), Price ($/ton). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: area length in ft; area width in ft; depth in in; density in tons/yd³; price in $/ton. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much does a yard of crushed limestone weigh?', 'a' => 'About 1.5 short tons, which is heavier than gravel at 1.35.'],
            ['q' => 'Does limestone compact?', 'a' => 'Yes, by about a fifth, which is why a four-inch finished base is ordered as five inches loose.'],
        ],
        'related' => [
            ['path' => '/construction/crushed-stone', 'name' => 'Crushed stone'],
            ['path' => '/construction/gravel', 'name' => 'Gravel'],
            ['path' => '/construction/road-base', 'name' => 'Road base'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

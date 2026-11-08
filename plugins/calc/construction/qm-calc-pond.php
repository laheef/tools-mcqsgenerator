<?php

/**
 * Pond
 * /construction/pond
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pond',
    'meta' => ['title' => 'Pond Volume Calculator: Gallons and Acre-Feet', 'description' => 'Work out a pond\'s volume in gallons, litres and acre-feet from its length, width and maximum depth, using a shape factor for the sloping sides. Units shown.', 'h1' => 'Pond', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Pond length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '20',
                    'help' => 'Longest dimension at the water line',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Pond width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Across it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'max_depth',
                    'label' => 'Maximum depth',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '4',
                    'help' => 'At the deepest point',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'shape_factor',
                    'label' => 'Shape factor',
                    'type' => 'number',
                    'default' => '0.6',
                    'help' => '0.5 to 0.7 for a dug pond',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'avg_depth',
                    'label' => 'Average depth',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
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
                    'name' => 'gallons',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gal',
                ],
                [
                    'name' => 'acre_feet',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'acre-ft',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Pond',
            'results' => [
                'avg_depth' => 'max_depth*shape_factor',
                'volume_ft3' => 'length*width*max_depth*shape_factor',
                'gallons' => 'length*width*max_depth*shape_factor*7.48052',
                'acre_feet' => 'length*width*max_depth*shape_factor/43560',
                'length' => 'volume_ft3/(width*max_depth*shape_factor)',
                'width' => 'volume_ft3/(length*max_depth*shape_factor)',
                'max_depth' => 'volume_ft3/(length*width*shape_factor)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A pond is not a box: <strong>average depth = maximum depth × shape factor</strong>, usually 0.6 for a dug pond, and <strong>volume = length × width × average depth</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A pond is judged by its volume: how many fish it carries, how often the pump turns it over, how much treatment it needs, and how much liner it takes. The maximum depth is easy to measure and the average is not, which is what the shape factor is for.</p><p>The page reports <strong>average depth and volume (ft³) and volume (gal) and volume (acre-ft)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Average depth</strong></td><td><code>Maximum depth × Shape factor</code></td></tr><tr><td><strong>Volume (ft³)</strong></td><td><code>Pond length × Pond width × Maximum depth × Shape factor</code></td></tr><tr><td><strong>Volume (gal)</strong></td><td><code>Pond length × Pond width × Maximum depth × Shape factor × 7.48052</code></td></tr><tr><td><strong>Volume (acre-ft)</strong></td><td><code>Pond length × Pond width × Maximum depth × Shape factor ÷ 43560</code></td></tr><tr><td><strong>Pond length</strong></td><td><code>Volume (ft³) ÷ (Pond width × Maximum depth × Shape factor)</code></td></tr><tr><td><strong>Pond width</strong></td><td><code>Volume (ft³) ÷ (Pond length × Maximum depth × Shape factor)</code></td></tr><tr><td><strong>Maximum depth</strong></td><td><code>Volume (ft³) ÷ (Pond length × Pond width × Shape factor)</code></td></tr></tbody></table><p><p>Dug ponds with sloping sides average about 0.6 of their maximum depth; a steep-sided or lined pond with vertical walls tends towards 0.8 or more. The acre-foot is the unit a water engineer uses: one acre covered a foot deep, which is 43 560 ft³.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports average depth and volume (ft³) and volume (gal) and volume (acre-ft).</p><ul><li><strong>Pond length</strong> — in ft. Longest dimension at the water line</li><li><strong>Pond width</strong> — in ft. Across it</li><li><strong>Maximum depth</strong> — in ft. At the deepest point</li><li><strong>Shape factor</strong>. 0.5 to 0.7 for a dug pond</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Average depth</strong> — in ft</li><li><strong>Volume</strong> — in ft³</li><li><strong>Volume</strong> — in gal</li><li><strong>Volume</strong> — in acre-ft</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Pond length = 20 ft, Pond width = 12 ft, Maximum depth = 4 ft, Shape factor = 0.6 — and the results panel reads:</p><ul><li><strong>Average depth</strong> = <code>Maximum depth × Shape factor</code> = <strong>2.4 ft</strong></li><li><strong>Volume</strong> = <code>Pond length × Pond width × Maximum depth × Shape factor</code> = <strong>576 ft³</strong></li><li><strong>Volume</strong> = <code>Pond length × Pond width × Maximum depth × Shape factor × 7.48052</code> = <strong>4 308.78 gal</strong></li><li><strong>Volume</strong> = <code>Pond length × Pond width × Maximum depth × Shape factor ÷ 43560</code> = <strong>0.013 acre-ft</strong></li></ul><p>With the numbers written into the formula, the first result is <code>4 × 0.6 = 2.4</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A pond 20 ft by 12 with a maximum depth of 4 ft and a factor of 0.6: an average depth of 2.4 ft, 576 ft³ of water — 4 308.78 US gallons, or 0.013 acre-feet.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the shape factor against the profile: a saucer-shaped wildlife pond is nearer 0.5, a dug koi pond with steep sides nearer 0.7, and a lined tank of a pond 1.0. Getting it wrong is the difference between a pump that copes and one that does not.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Average depth</th><th>Volume</th><th>Volume</th><th>Volume</th></tr></thead><tbody><tr><td><strong>Pond length</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Pond width</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Maximum depth</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Shape factor</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Pond length</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Shape factor</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Pond length = 30, Pond width = 20, Maximum depth = 6, Shape factor = 0.5, the page reports <strong>Average depth</strong> = 3 ft, <strong>Volume</strong> = 1 800 ft³, <strong>Volume</strong> = 13 464.936 gal, <strong>Volume</strong> = 0.041 acre-ft. A wide, saucer-shaped pond: the maximum depth is only reached in the middle.</li><li>With Pond length = 12, Pond width = 8, Maximum depth = 3, Shape factor = 0.75, the page reports <strong>Average depth</strong> = 2.25 ft, <strong>Volume</strong> = 216 ft³, <strong>Volume</strong> = 1 615.792 gal, <strong>Volume</strong> = 0.005 acre-ft. A small steep-sided pond with a liner and vertical walls.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Maximum depth used as average.</strong> A dug pond holds about 60 per cent of the box it fits in.</li><li><strong>Dimensions taken at the top of the bank.</strong> Measure at the water line.</li><li><strong>Liner area confused with volume.</strong> They are different calculations and the liner is always bigger.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Average depth (ft), Volume (ft³), Volume (gal), Volume (acre-ft).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Dimensions and depths in feet, volume in cubic feet, US gallons and acre-feet, with the shape factor as a plain number.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need pond length and pond width and maximum depth and shape factor. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Average depth and volume (ft³) and volume (gal) and volume (acre-ft) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Pond length</strong> ×10</td><td>2.4</td><td>2.4</td><td>unchanged</td></tr><tr><td><strong>Pond width</strong> ×10</td><td>2.4</td><td>2.4</td><td>unchanged</td></tr><tr><td><strong>Maximum depth</strong> ×10</td><td>2.4</td><td>24</td><td>ten times larger</td></tr><tr><td><strong>Shape factor</strong> ×10</td><td>2.4</td><td>24</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A simple shape.</strong> An irregular pond needs its area surveyed.</li><li><strong>No rainfall or groundwater.</strong> Steady-state level is a site question.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing a pump for a pond.</li></li><li><li>Working out fish capacity.</li></li><li><li>Estimating a water treatment dose.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/pool">Pool volume</a> <a href="/construction/tank-volume">Tank volume</a> <a href="/construction/round-pool-volume">Round pool volume</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pond calculator work out?', 'a' => <<<'TXT'
            It returns average depth and volume (ft³) and volume (gal) and volume (acre-ft) from pond length and pond width and maximum depth and shape factor. The relationship is Maximum depth × Shape factor.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Pond length (ft), Pond width (ft), Maximum depth (ft), Shape factor. Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: pond length in ft; pond width in ft; maximum depth in ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many gallons in a pond 20 feet by 12 feet, 4 feet deep?', 'a' => 'About 4 300 US gallons at a 0.6 shape factor.'],
            ['q' => 'What is an acre-foot?', 'a' => 'One acre covered a foot deep — 43 560 cubic feet, or about 326 000 gallons.'],
        ],
        'related' => [
            ['path' => '/construction/pool', 'name' => 'Pool volume'],
            ['path' => '/construction/tank-volume', 'name' => 'Tank volume'],
            ['path' => '/construction/round-pool-volume', 'name' => 'Round pool volume'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

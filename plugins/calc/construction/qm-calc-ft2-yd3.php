<?php

/**
 * Square feet to cubic yards
 * /construction/ft2-yd3
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Square feet to cubic yards',
    'meta' => ['title' => 'Square Feet to Cubic Yards: Volume Calculator', 'description' => 'Convert a measured area and a depth into cubic feet and cubic yards, with an over-order allowance and the bags of mix that volume would take. Units shown.', 'h1' => 'Square feet to cubic yards', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'area',
                    'label' => 'Area',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '100',
                    'help' => 'The measured surface',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'Depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '4',
                    'help' => 'The thickness being placed',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Over-order',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Spillage and an uneven base',
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
                    'name' => 'volume_yd3',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
                ],
                [
                    'name' => 'bags_80lb',
                    'label' => 'Bags of 80 lb',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Square feet to cubic yards',
            'results' => [
                'volume_ft3' => 'area*depth/12*(1+waste/100)',
                'volume_yd3' => 'area*depth/12/27*(1+waste/100)',
                'bags_80lb' => 'ceil(area*depth/12*(1+waste/100)/0.6)',
                'area' => '27*volume_yd3/(depth/12*(1+waste/100))',
                'depth' => '324*volume_yd3/(area*(1+waste/100))',
                'waste' => '(volume_yd3/(area*depth/12/27)-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p><strong>Cubic yards = area × depth ÷ 12 ÷ 27</strong>: the area is already square feet, so the only conversion is the depth in inches, then the divisor of 27.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>This is the workhorse conversion: an area you can measure with a tape, a depth the specification gives, and an order the yard wants in cubic yards. Every material sold by volume — concrete, gravel, sand, mulch — passes through this arithmetic.</p><p>The page reports <strong>volume (ft³) and volume (yd³) and bags of 80 lb</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume (ft³)</strong></td><td><code>Area × Depth ÷ 12 × (1+Over-order ÷ 100)</code></td></tr><tr><td><strong>Volume (yd³)</strong></td><td><code>Area × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100)</code></td></tr><tr><td><strong>Bags of 80 lb</strong></td><td><code>ceil(Area × Depth ÷ 12 × (1+Over-order ÷ 100) ÷ 0.6)</code></td></tr><tr><td><strong>Area</strong></td><td><code>27 × Volume (yd³) ÷ (Depth ÷ 12 × (1+Over-order ÷ 100))</code></td></tr><tr><td><strong>Depth</strong></td><td><code>324 × Volume (yd³) ÷ (Area × (1+Over-order ÷ 100))</code></td></tr><tr><td><strong>Over-order</strong></td><td><code>(Volume (yd³) ÷ (Area × Depth ÷ 12 ÷ 27)-1) × 100</code></td></tr></tbody></table><p><p>The over-order is applied to the volume before the bag count, so the two results always agree. An 80 lb bag of premixed concrete yields 0.6 ft³, which is why the bag count is so large on anything bigger than a small pad.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports volume (ft³) and volume (yd³) and bags of 80 lb.</p><ul><li><strong>Area</strong> — in ft². The measured surface</li><li><strong>Depth</strong> — in in. The thickness being placed</li><li><strong>Over-order</strong> — in %. Spillage and an uneven base</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume</strong> — in ft³</li><li><strong>Volume</strong> — in yd³</li><li><strong>Bags of 80 lb</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Area = 100 ft², Depth = 4 in, Over-order = 10 % — and the results panel reads:</p><ul><li><strong>Volume</strong> = <code>Area × Depth ÷ 12 × (1+Over-order ÷ 100)</code> = <strong>36.667 ft³</strong></li><li><strong>Volume</strong> = <code>Area × Depth ÷ 12 ÷ 27 × (1+Over-order ÷ 100)</code> = <strong>1.358 yd³</strong></li><li><strong>Bags of 80 lb</strong> = <code>ceil(Area × Depth ÷ 12 × (1+Over-order ÷ 100) ÷ 0.6)</code> = <strong>62</strong></li></ul><p>With the numbers written into the formula, the first result is <code>100 × 4 ÷ 12 × (1+10 ÷ 100) = 36.667</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A hundred square feet at four inches with ten per cent over: 36.667 ft³, or 1.358 yd³ — and 62 bags of 80 lb mix if you are mixing it by hand rather than calling a truck.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the bags against the yards: 45 bags of 80 lb make a yard, so a figure much below that means the bag yield has been overestimated. Above about three yards the truck is cheaper and far faster.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume</th><th>Volume</th><th>Bags of 80 lb</th></tr></thead><tbody><tr><td><strong>Area</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+9.68 %</td></tr><tr><td><strong>Depth</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+9.68 %</td></tr><tr><td><strong>Over-order</strong> +10 %</td><td>+0.91 %</td><td>+0.91 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Area</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Over-order</strong>, at 0.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Area = 400, Depth = 6, Over-order = 5, the page reports <strong>Volume</strong> = 210 ft³, <strong>Volume</strong> = 7.778 yd³, <strong>Bags of 80 lb</strong> = 350. A larger pad with a tighter allowance — the kind of job that arrives on a truck.</li><li>With Area = 24, Depth = 3, Over-order = 15, the page reports <strong>Volume</strong> = 6.9 ft³, <strong>Volume</strong> = 0.256 yd³, <strong>Bags of 80 lb</strong> = 12. A single post pad, where a bag or two covers the whole job.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Area taken from the plan.</strong> It is the measured surface, including any over-excavation.</li><li><strong>Depth in feet.</strong> The twelve is doing the conversion.</li><li><strong>Waste applied after the bag count.</strong> It belongs in the volume.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume (ft³), Volume (yd³), Bags of 80 lb.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Area in square feet, depth in inches, volume in cubic feet and cubic yards, and the bag count in 80 lb bags at 0.6 ft³ each.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need area and depth and over-order. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Volume (ft³) and volume (yd³) and bags of 80 lb should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Area</strong> ×10</td><td>36.667</td><td>366.667</td><td>ten times larger</td></tr><tr><td><strong>Depth</strong> ×10</td><td>36.667</td><td>366.667</td><td>ten times larger</td></tr><tr><td><strong>Over-order</strong> ×10</td><td>36.667</td><td>66.667</td><td>×1.818</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Level surface.</strong> A graded base needs its depth varied along the slope.</li><li><strong>One material.</strong> Different mixes have different bag yields.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering concrete by the yard.</li></li><li><li>Sizing a bag mix for a small pour.</li></li><li><li>Converting a specification to an order.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/cubic-yard">Cubic yard</a> <a href="/construction/concrete-slab">Concrete slab</a> <a href="/construction/gravel">Gravel</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Square feet to cubic yards calculator work out?', 'a' => <<<'TXT'
            It returns volume (ft³) and volume (yd³) and bags of 80 lb from area and depth and over-order. The relationship is Area × Depth ÷ 12 × (1+Over-order ÷ 100).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Area (ft²), Depth (in), Over-order (%). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: area in ft²; depth in in; over-order in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many cubic yards is 100 square feet at 4 inches?', 'a' => '1.23 yd³ before an over-order, and about 1.36 with ten per cent.'],
            ['q' => 'How many bags of concrete make a cubic yard?', 'a' => 'Forty-five 80 lb bags at 0.6 ft³ each, or sixty 60 lb bags.'],
        ],
        'related' => [
            ['path' => '/construction/cubic-yard', 'name' => 'Cubic yard'],
            ['path' => '/construction/concrete-slab', 'name' => 'Concrete slab'],
            ['path' => '/construction/gravel', 'name' => 'Gravel'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

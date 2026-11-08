<?php

/**
 * Insulation
 * /construction/insulation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Insulation',
    'meta' => ['title' => 'Insulation Calculator: R-Value and Bags Tool', 'description' => 'Work out the R-value of an insulation layer from its thickness and material, and the number of bags needed to cover an attic at that depth. Units shown.', 'h1' => 'Insulation', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'area',
                    'label' => 'Area to insulate',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '1200',
                    'help' => 'Attic floor or wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'thickness',
                    'label' => 'Thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'Installed depth',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'r_per_inch',
                    'label' => 'R per inch',
                    'type' => 'number',
                    'default' => '3.7',
                    'help' => '3.7 blown fibre, 3.1 mineral wool',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'bag_coverage',
                    'label' => 'Coverage per bag',
                    'type' => 'number',
                    'suffix' => 'ft³',
                    'default' => '40',
                    'help' => 'Cubic feet in the bag',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price per bag',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '18',
                    'help' => 'Delivered',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'r_value',
                    'label' => 'R-value',
                    'type' => 'number',
                    'readonly' => true,
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
            'title' => 'Insulation',
            'results' => [
                'r_value' => 'thickness*r_per_inch',
                'volume_ft3' => 'area*thickness/12',
                'bags' => 'ceil(area*thickness/12/bag_coverage)',
                'cost' => 'ceil(area*thickness/12/bag_coverage)*price',
                'area' => 'volume_ft3*12/thickness',
                'thickness' => 'r_value/r_per_inch',
                'r_per_inch' => 'r_value/thickness',
                'bag_coverage' => 'volume_ft3/bags',
                'price' => 'cost/bags',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p><strong>R = thickness ÷ conductivity</strong>, or thickness times the R per inch of the material; <strong>bags = ceiling(area × depth ÷ coverage per bag)</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Insulation is sold by the bag and judged by the R-value, and the two are linked by the depth it is blown or laid to: a bag that covers a certain volume only gives its stated R-value at the depth it was designed for. Compressing it to fit takes the R-value away.</p><p>The page reports <strong>r-value and volume and bags and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>R-value</strong></td><td><code>Thickness × R per inch</code></td></tr><tr><td><strong>Volume</strong></td><td><code>Area to insulate × Thickness ÷ 12</code></td></tr><tr><td><strong>Bags</strong></td><td><code>ceil(Area to insulate × Thickness ÷ 12 ÷ Coverage per bag)</code></td></tr><tr><td><strong>Cost</strong></td><td><code>ceil(Area to insulate × Thickness ÷ 12 ÷ Coverage per bag) × Price per bag</code></td></tr><tr><td><strong>Area to insulate</strong></td><td><code>Volume × 12 ÷ Thickness</code></td></tr><tr><td><strong>Thickness</strong></td><td><code>R-value ÷ R per inch</code></td></tr><tr><td><strong>R per inch</strong></td><td><code>R-value ÷ Thickness</code></td></tr><tr><td><strong>Coverage per bag</strong></td><td><code>Volume ÷ Bags</code></td></tr><tr><td><strong>Price per bag</strong></td><td><code>Cost ÷ Bags</code></td></tr></tbody></table><p><p>R per inch is a property of the material — about 3.7 for blown cellulose, 3.1 for mineral wool, 3.6 for fibreglass batts — so the R-value is simply thickness times that figure. The bag coverage is the volume of insulation in the bag, which is why the area times the depth has to be divided by it.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports r-value and volume and bags and cost.</p><ul><li><strong>Area to insulate</strong> — in ft². Attic floor or wall</li><li><strong>Thickness</strong> — in in. Installed depth</li><li><strong>R per inch</strong>. 3.7 blown fibre, 3.1 mineral wool</li><li><strong>Coverage per bag</strong> — in ft³. Cubic feet in the bag</li><li><strong>Price per bag</strong> — in $. Delivered</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>R-value</strong></li><li><strong>Volume</strong> — in ft³</li><li><strong>Bags</strong></li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Area to insulate = 1 200 ft², Thickness = 12 in, R per inch = 3.7, Coverage per bag = 40 ft³, Price per bag = 18 $ — and the results panel reads:</p><ul><li><strong>R-value</strong> = <code>Thickness × R per inch</code> = <strong>44.4</strong></li><li><strong>Volume</strong> = <code>Area to insulate × Thickness ÷ 12</code> = <strong>1 200 ft³</strong></li><li><strong>Bags</strong> = <code>ceil(Area to insulate × Thickness ÷ 12 ÷ Coverage per bag)</code> = <strong>30</strong></li><li><strong>Cost</strong> = <code>ceil(Area to insulate × Thickness ÷ 12 ÷ Coverage per bag) × Price per bag</code> = <strong>540 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>12 × 3.7 = 44.4</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Twelve inches of blown fibre at 3.7 per inch is 44.4 — the sort of figure a cold climate asks for. A thousand two hundred square feet at that depth is 1 200 ft³, which is 30 bags and 540.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the R-value against the thickness: ten inches of mineral wool is R-31, twelve inches of blown cellulose R-44. A figure much lower means the R per inch was entered as a total R.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>R-value</th><th>Volume</th><th>Bags</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Area to insulate</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Thickness</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>R per inch</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Coverage per bag</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−6.67 %</td><td>−6.67 %</td></tr><tr><td><strong>Price per bag</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Thickness</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Coverage per bag</strong>, at 6.7 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Area to insulate = 900, Thickness = 16, R per inch = 3.7, Coverage per bag = 40, Price per bag = 20, the page reports <strong>R-value</strong> = 59.2, <strong>Volume</strong> = 1 200 ft³, <strong>Bags</strong> = 30, <strong>Cost</strong> = 600 $. A deep attic blanket: the R-value climbs into the fifties.</li><li>With Area to insulate = 400, Thickness = 4, R per inch = 3.1, Coverage per bag = 30, Price per bag = 15, the page reports <strong>R-value</strong> = 12.4, <strong>Volume</strong> = 133.333 ft³, <strong>Bags</strong> = 5, <strong>Cost</strong> = 75 $. A stud wall in mineral wool: a modest R-value over a small area.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Total R entered as R per inch.</strong> The figure then multiplies by the depth.</li><li><strong>Compressed to fit.</strong> Squashing batts lowers the R-value.</li><li><strong>Coverage in square feet used as volume.</strong> The bag is sold by volume.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: R-value, Volume (ft³), Bags, Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Area in square feet, thickness in inches, bag coverage in cubic feet, volume in cubic feet and cost in dollars per bag.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need area to insulate and thickness and r per inch and coverage per bag and price per bag. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> R-value and volume and bags and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Area to insulate</strong> ×10</td><td>44.4</td><td>44.4</td><td>unchanged</td></tr><tr><td><strong>Thickness</strong> ×10</td><td>44.4</td><td>444</td><td>ten times larger</td></tr><tr><td><strong>R per inch</strong> ×10</td><td>44.4</td><td>444</td><td>ten times larger</td></tr><tr><td><strong>Coverage per bag</strong> ×10</td><td>44.4</td><td>44.4</td><td>unchanged</td></tr><tr><td><strong>Price per bag</strong> ×10</td><td>44.4</td><td>44.4</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A single layer.</strong> Mixed materials add their R-values separately.</li><li><strong>No thermal bridging.</strong> Studs and joists bypass the insulation.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing an attic top-up.</li></li><li><li>Checking a bag count.</li></li><li><li>Comparing materials by R-value.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/heat-loss">Heat loss</a> <a href="/construction/drywall">Drywall</a> <a href="/construction/framing">Framing</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Insulation calculator work out?', 'a' => <<<'TXT'
            It returns r-value and volume and bags and cost from area to insulate and thickness and r per inch and coverage per bag and price per bag. The relationship is Thickness × R per inch.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Area to insulate (ft²), Thickness (in), R per inch, Coverage per bag (ft³), Price per bag ($). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: area to insulate in ft²; thickness in in; coverage per bag in ft³; price per bag in $. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many inches of insulation for R-49?', 'a' => 'About thirteen inches of blown cellulose at 3.7 per inch.'],
            ['q' => 'Does compressing insulation lower its R-value?', 'a' => 'Yes — the R-value depends on the installed thickness, not the bag\'s nominal depth.'],
        ],
        'related' => [
            ['path' => '/construction/heat-loss', 'name' => 'Heat loss'],
            ['path' => '/construction/drywall', 'name' => 'Drywall'],
            ['path' => '/construction/framing', 'name' => 'Framing'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

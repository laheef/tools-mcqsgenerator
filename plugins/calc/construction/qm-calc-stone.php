<?php

/**
 * Stone
 * /construction/stone
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Stone',
    'meta' => ['title' => 'Stone Calculator: Wall Stone by Volume and Weight', 'description' => 'Work out the stone a wall or a bed needs from its dimensions, in cubic yards, tons and the number of pickup loads it will take to move it all. All shown.', 'h1' => 'Stone', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '20',
                    'help' => 'Wall or bed length',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '3',
                    'help' => 'Above and below grade if it is a wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'thickness',
                    'label' => 'Thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'Wall thickness, or the bed\'s depth',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Density',
                    'type' => 'number',
                    'suffix' => 'tons/yd³',
                    'default' => '1.5',
                    'help' => '1.5 for most building stone',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Wastage',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Cutting and broken pieces',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume_yd3',
                    'label' => 'Stone volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
                ],
                [
                    'name' => 'tons',
                    'label' => 'Stone weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'tons',
                ],
                [
                    'name' => 'truckloads',
                    'label' => 'Pickup loads (½ yd³ each)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Stone',
            'results' => [
                'volume_yd3' => 'length*height*thickness/12/27*(1+waste/100)',
                'tons' => 'length*height*thickness/12/27*(1+waste/100)*density',
                'truckloads' => 'ceil(length*height*thickness/12/27*(1+waste/100)/0.5)',
                'length' => 'volume_yd3*27*12/(height*thickness*(1+waste/100))',
                'height' => 'volume_yd3*27*12/(length*thickness*(1+waste/100))',
                'thickness' => 'volume_yd3*27*12/(length*height*(1+waste/100))',
                'density' => 'tons/volume_yd3',
                'waste' => '(volume_yd3/(length*height*thickness/12/27)-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Stone for a wall or a bed is a volume: <strong>L × H × T ÷ 27</strong> cubic yards, times about 1.5 tons per yard for most building stone. A pickup bed holds about half a yard.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Stone is heavier than most people expect: a cubic yard of it is a ton and a half, and a half-ton pickup should carry less than half a yard. The truckload count is often the most useful number on the page.</p><p>The page reports <strong>stone volume and stone weight and pickup loads (½ yd³ each)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Stone volume</strong></td><td><code>Length × Height × Thickness ÷ 12 ÷ 27 × (1+Wastage ÷ 100)</code></td></tr><tr><td><strong>Stone weight</strong></td><td><code>Length × Height × Thickness ÷ 12 ÷ 27 × (1+Wastage ÷ 100) × Density</code></td></tr><tr><td><strong>Pickup loads (½ yd³ each)</strong></td><td><code>ceil(Length × Height × Thickness ÷ 12 ÷ 27 × (1+Wastage ÷ 100) ÷ 0.5)</code></td></tr><tr><td><strong>Length</strong></td><td><code>Stone volume × 27 × 12 ÷ (Height × Thickness × (1+Wastage ÷ 100))</code></td></tr><tr><td><strong>Height</strong></td><td><code>Stone volume × 27 × 12 ÷ (Length × Thickness × (1+Wastage ÷ 100))</code></td></tr><tr><td><strong>Thickness</strong></td><td><code>Stone volume × 27 × 12 ÷ (Length × Height × (1+Wastage ÷ 100))</code></td></tr><tr><td><strong>Density</strong></td><td><code>Stone weight ÷ Stone volume</code></td></tr><tr><td><strong>Wastage</strong></td><td><code>(Stone volume ÷ (Length × Height × Thickness ÷ 12 ÷ 27)-1) × 100</code></td></tr></tbody></table><p><p>The thickness box does double duty: a wall's thickness or a bed's depth, both in inches. The density of 1.5 tons per yard suits granite, limestone and most fieldstone.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports stone volume and stone weight and pickup loads (½ yd³ each).</p><ul><li><strong>Length</strong> — in ft. Wall or bed length</li><li><strong>Height</strong> — in ft. Above and below grade if it is a wall</li><li><strong>Thickness</strong> — in in. Wall thickness, or the bed&#x27;s depth</li><li><strong>Density</strong> — in tons/yd³. 1.5 for most building stone</li><li><strong>Wastage</strong> — in %. Cutting and broken pieces</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Stone volume</strong> — in yd³</li><li><strong>Stone weight</strong> — in tons</li><li><strong>Pickup loads (½ yd³ each)</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Length = 20 ft, Height = 3 ft, Thickness = 12 in, Density = 1.5 tons/yd³, Wastage = 10 % — and the results panel reads:</p><ul><li><strong>Stone volume</strong> = <code>Length × Height × Thickness ÷ 12 ÷ 27 × (1+Wastage ÷ 100)</code> = <strong>2.444 yd³</strong></li><li><strong>Stone weight</strong> = <code>Length × Height × Thickness ÷ 12 ÷ 27 × (1+Wastage ÷ 100) × Density</code> = <strong>3.667 tons</strong></li><li><strong>Pickup loads (½ yd³ each)</strong> = <code>ceil(Length × Height × Thickness ÷ 12 ÷ 27 × (1+Wastage ÷ 100) ÷ 0.5)</code> = <strong>5</strong></li></ul><p>With the numbers written into the formula, the first result is <code>20 × 3 × 12 ÷ 12 ÷ 27 × (1+10 ÷ 100) = 2.444</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 20 ft wall 3 ft high and 12 in thick: 60 ft³ — 2.22 yd³, 2.44 with waste — 3.7 tons, and five pickup loads. The loads decide whether to hire a tipper.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the loads against your vehicle: half a ton per trip is the safe figure for a half-ton truck, and the page's ½ yd³ per load is already generous. A stone wall also needs a batter and a footing, neither of which is in the volume.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Stone volume</th><th>Stone weight</th><th>Pickup loads (½ yd³ each)</th></tr></thead><tbody><tr><td><strong>Length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+20 %</td></tr><tr><td><strong>Height</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+20 %</td></tr><tr><td><strong>Thickness</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+20 %</td></tr><tr><td><strong>Density</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Wastage</strong> +10 %</td><td>+0.91 %</td><td>+0.91 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Length</strong>: a ten per cent move there shifts the result by about 20 per cent. The least sensitive is <strong>Wastage</strong>, at 0.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Length = 12, Height = 2, Thickness = 8, Density = 1.6, Wastage = 15, the page reports <strong>Stone volume</strong> = 0.681 yd³, <strong>Stone weight</strong> = 1.09 tons, <strong>Pickup loads (½ yd³ each)</strong> = 2. A 12 ft garden wall 2 ft high and 8 in thick: 0.68 yd³ and 1.1 tons at the heavier density.</li><li>With Length = 30, Height = 0.5, Thickness = 6, Density = 1.5, Wastage = 10, the page reports <strong>Stone volume</strong> = 0.306 yd³, <strong>Stone weight</strong> = 0.458 tons, <strong>Pickup loads (½ yd³ each)</strong> = 1. A 30 ft bed six inches deep: 0.31 yd³ and 0.46 tons — one trip in a pickup.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Wall thickness read as face width.</strong> The 8 to 12 inches is how deep the wall is, not how long.</li><li><strong>Batter and footing ignored.</strong> A dry stone wall leans and sits on a footing, both of which use stone.</li><li><strong>A ton assumed to be a yard.</strong> Stone is 1.5 tons per yard, so a half-ton load is a third of a yard.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Stone volume (yd³), Stone weight (tons), Pickup loads (½ yd³ each).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Length and height in feet, thickness in inches, volume in cubic yards and weight in short tons. The truckload count uses half a cubic yard per load.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need length and height and thickness and density and wastage. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Stone volume and stone weight and pickup loads (½ yd³ each) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Length</strong> ×10</td><td>2.444</td><td>24.444</td><td>ten times larger</td></tr><tr><td><strong>Height</strong> ×10</td><td>2.444</td><td>24.444</td><td>ten times larger</td></tr><tr><td><strong>Thickness</strong> ×10</td><td>2.444</td><td>24.444</td><td>ten times larger</td></tr><tr><td><strong>Density</strong> ×10</td><td>2.444</td><td>2.444</td><td>unchanged</td></tr><tr><td><strong>Wastage</strong> ×10</td><td>2.444</td><td>4.444</td><td>×1.818</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Solid volume.</strong> A dry stone wall is maybe 70 per cent stone by volume, the rest voids.</li><li><strong>One stone type.</strong> Bluestone and granite are heavier; sandstone lighter.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering stone for a garden wall.</li></li><li><li>Sizing a pickup trip.</li></li><li><li>Estimating a stone bed's depth.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/landscape-rock">Landscape rock</a> <a href="/construction/rip-rap">Rip rap</a> <a href="/construction/limestone">Limestone</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Stone calculator work out?', 'a' => <<<'TXT'
            It returns stone volume and stone weight and pickup loads (½ yd³ each) from length and height and thickness and density and wastage. The relationship is Length × Height × Thickness ÷ 12 ÷ 27 × (1+Wastage ÷ 100).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (ft), Height (ft), Thickness (in), Density (tons/yd³), Wastage (%). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: length in ft; height in ft; thickness in in; density in tons/yd³; wastage in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much does a yard of stone weigh?', 'a' => 'About 1.5 short tons for most building stone, and up to 1.7 for granite.'],
            ['q' => 'How much stone fits in a pickup?', 'a' => 'Half a cubic yard safely in a half-ton truck — three quarters of a ton, not the ton a yard weighs.'],
        ],
        'related' => [
            ['path' => '/construction/landscape-rock', 'name' => 'Landscape rock'],
            ['path' => '/construction/rip-rap', 'name' => 'Rip rap'],
            ['path' => '/construction/limestone', 'name' => 'Limestone'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

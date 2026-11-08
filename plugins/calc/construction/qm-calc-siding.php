<?php

/**
 * Siding
 * /construction/siding
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Siding',
    'meta' => ['title' => 'Siding Calculator: Squares, Openings and Cost', 'description' => 'Work out the siding a wall or a gable needs in square feet and squares, with doors and windows deducted, waste added and the cost per square. Units shown.', 'h1' => 'Siding', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'wall_length',
                    'label' => 'Wall length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '40',
                    'help' => 'The run being clad',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '9',
                    'help' => 'Eave to ground',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gable_rise',
                    'label' => 'Gable rise',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '0',
                    'help' => 'Eave to ridge, 0 for a flat wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'doors',
                    'label' => 'Doors',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Opening count',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'door_area',
                    'label' => 'Each door',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '21',
                    'help' => 'Standard door',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'windows',
                    'label' => 'Windows',
                    'type' => 'number',
                    'default' => '4',
                    'help' => 'Opening count',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'window_area',
                    'label' => 'Each window',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '15',
                    'help' => 'Measured opening',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Waste',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Laps and cuts',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/square',
                    'default' => '320',
                    'help' => '100 ft² supplied and fitted',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'wall_area',
                    'label' => 'Gross area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'net_area',
                    'label' => 'Siding needed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'squares',
                    'label' => 'Squares',
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
            'title' => 'Siding',
            'results' => [
                'wall_area' => 'wall_length*height+wall_length*gable_rise/2',
                'net_area' => 'wall_length*height+wall_length*gable_rise/2-doors*door_area-windows*window_area',
                'squares' => '(wall_length*height+wall_length*gable_rise/2-doors*door_area-windows*window_area)*(1+waste/100)/100',
                'cost' => '(wall_length*height+wall_length*gable_rise/2-doors*door_area-windows*window_area)*(1+waste/100)/100*price',
                'wall_length' => 'wall_area/(height+gable_rise/2)',
                'height' => 'wall_area/wall_length-gable_rise/2',
                'gable_rise' => '2*(wall_area/wall_length-height)',
                'doors' => '(wall_length*height+wall_length*gable_rise/2-windows*window_area-net_area)/door_area',
                'windows' => '(wall_length*height+wall_length*gable_rise/2-doors*door_area-net_area)/window_area',
                'waste' => '(squares*100/net_area-1)*100',
                'price' => 'cost/squares',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Wall area = perimeter run × height</strong>, plus the gable triangle, less the openings; a square is 100 ft².</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Siding is quoted in squares — a hundred square feet — and the gable end above a plain wall can add a fifth to the order. Openings come off, but only at face value, because the cut pieces around a window cannot be used elsewhere.</p><p>The page reports <strong>gross area and siding needed and squares and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Gross area</strong></td><td><code>Wall length × Height+Wall length × Gable rise ÷ 2</code></td></tr><tr><td><strong>Siding needed</strong></td><td><code>Wall length × Height+Wall length × Gable rise ÷ 2-Doors × Each door-Windows × Each window</code></td></tr><tr><td><strong>Squares</strong></td><td><code>(Wall length × Height+Wall length × Gable rise ÷ 2-Doors × Each door-Windows × Each window) × (1+Waste ÷ 100) ÷ 100</code></td></tr><tr><td><strong>Cost</strong></td><td><code>(Wall length × Height+Wall length × Gable rise ÷ 2-Doors × Each door-Windows × Each window) × (1+Waste ÷ 100) ÷ 100 × Price</code></td></tr><tr><td><strong>Wall length</strong></td><td><code>Gross area ÷ (Height+Gable rise ÷ 2)</code></td></tr><tr><td><strong>Height</strong></td><td><code>Gross area ÷ Wall length-Gable rise ÷ 2</code></td></tr><tr><td><strong>Gable rise</strong></td><td><code>2 × (Gross area ÷ Wall length-Height)</code></td></tr><tr><td><strong>Doors</strong></td><td><code>(Wall length × Height+Wall length × Gable rise ÷ 2-Windows × Each window-Siding needed) ÷ Each door</code></td></tr><tr><td><strong>Windows</strong></td><td><code>(Wall length × Height+Wall length × Gable rise ÷ 2-Doors × Each door-Siding needed) ÷ Each window</code></td></tr><tr><td><strong>Waste</strong></td><td><code>(Squares × 100 ÷ Siding needed-1) × 100</code></td></tr><tr><td><strong>Price</strong></td><td><code>Cost ÷ Squares</code></td></tr></tbody></table><p><p>A gable is a triangle on top of a rectangle, so its area is half the span times the rise. The waste allowance covers the laps that siding needs and the cuts at every opening and corner.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 9 boxes and the page has everything it needs. It reports gross area and siding needed and squares and cost.</p><ul><li><strong>Wall length</strong> — in ft. The run being clad</li><li><strong>Height</strong> — in ft. Eave to ground</li><li><strong>Gable rise</strong> — in ft. Eave to ridge, 0 for a flat wall</li><li><strong>Doors</strong>. Opening count</li><li><strong>Each door</strong> — in ft². Standard door</li><li><strong>Windows</strong>. Opening count</li><li><strong>Each window</strong> — in ft². Measured opening</li><li><strong>Waste</strong> — in %. Laps and cuts</li><li><strong>Price</strong> — in $/square. 100 ft² supplied and fitted</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Gross area</strong> — in ft²</li><li><strong>Siding needed</strong> — in ft²</li><li><strong>Squares</strong></li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Wall length = 40 ft, Height = 9 ft, Gable rise = 0 ft, Doors = 1, Each door = 21 ft², Windows = 4, Each window = 15 ft², Waste = 10 %, Price = 320 $/square — and the results panel reads:</p><ul><li><strong>Gross area</strong> = <code>Wall length × Height+Wall length × Gable rise ÷ 2</code> = <strong>360 ft²</strong></li><li><strong>Siding needed</strong> = <code>Wall length × Height+Wall length × Gable rise ÷ 2-Doors × Each door-Windows × Each window</code> = <strong>279 ft²</strong></li><li><strong>Squares</strong> = <code>(Wall length × Height+Wall length × Gable rise ÷ 2-Doors × Each door-Windows × Each window) × (1+Waste ÷ 100) ÷ 100</code> = <strong>3.069</strong></li><li><strong>Cost</strong> = <code>(Wall length × Height+Wall length × Gable rise ÷ 2-Doors × Each door-Windows × Each window) × (1+Waste ÷ 100) ÷ 100 × Price</code> = <strong>982.08 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>40 × 9+40 × 0 ÷ 2 = 360</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 40 ft wall 9 ft high with no gable is 360 ft². One door and four windows take off 81 ft², leaving 279 ft² — 3.069 squares with ten per cent waste, and 982.08 at $320 a square.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the squares against the area: a hundred square feet is one square, so the figures should be in that ratio. If the squares come out near the square footage, the divisor of 100 has been dropped.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Gross area</th><th>Siding needed</th><th>Squares</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Wall length</strong> +10 %</td><td>+10 %</td><td>+12.9 %</td><td>+12.9 %</td><td>+12.9 %</td></tr><tr><td><strong>Height</strong> +10 %</td><td>+10 %</td><td>+12.9 %</td><td>+12.9 %</td><td>+12.9 %</td></tr><tr><td><strong>Gable rise</strong> +10 %</td><td>+0.56 %</td><td>+0.72 %</td><td>+0.72 %</td><td>+0.72 %</td></tr><tr><td><strong>Doors</strong> +10 %</td><td>+0 %</td><td>−0.75 %</td><td>−0.75 %</td><td>−0.75 %</td></tr><tr><td><strong>Each door</strong> +10 %</td><td>+0 %</td><td>−0.75 %</td><td>−0.75 %</td><td>−0.75 %</td></tr><tr><td><strong>Windows</strong> +10 %</td><td>+0 %</td><td>−2.15 %</td><td>−2.15 %</td><td>−2.15 %</td></tr><tr><td><strong>Each window</strong> +10 %</td><td>+0 %</td><td>−2.15 %</td><td>−2.15 %</td><td>−2.15 %</td></tr><tr><td><strong>Waste</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0.91 %</td><td>+0.91 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Wall length</strong>: a ten per cent move there shifts the result by about 12.9 per cent. The least sensitive is <strong>Gable rise</strong>, at 0.7 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Wall length = 32, Height = 8, Gable rise = 6, Doors = 1, Each door = 21, Windows = 2, Each window = 15, Waste = 12, Price = 380, the page reports <strong>Gross area</strong> = 352 ft², <strong>Siding needed</strong> = 301 ft², <strong>Squares</strong> = 3.371, <strong>Cost</strong> = 1 281.056 $. A gable end in vinyl: the triangle adds two hundred square feet.</li><li>With Wall length = 60, Height = 10, Gable rise = 0, Doors = 2, Each door = 42, Windows = 6, Each window = 20, Waste = 8, Price = 290, the page reports <strong>Gross area</strong> = 600 ft², <strong>Siding needed</strong> = 396 ft², <strong>Squares</strong> = 4.277, <strong>Cost</strong> = 1 240.272 $. A long barn wall with big openings: the deduction is a real part of the job.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Gable measured as a rectangle.</strong> Half the span times the rise is the triangle.</li><li><strong>Openings deducted at the frame.</strong> Measure the opening, not the glass.</li><li><strong>Waste left at zero.</strong> Every corner and lap cuts.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Gross area (ft²), Siding needed (ft²), Squares, Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Dimensions in feet, opening areas in square feet, siding in square feet and squares, cost in dollars per square.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need wall length and height and gable rise and doors and each door and windows and each window and waste and price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Gross area and siding needed and squares and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Wall length</strong> ×10</td><td>360</td><td>3 600</td><td>ten times larger</td></tr><tr><td><strong>Height</strong> ×10</td><td>360</td><td>3 600</td><td>ten times larger</td></tr><tr><td><strong>Gable rise</strong> ×10</td><td>360</td><td>380</td><td>×1.056</td></tr><tr><td><strong>Doors</strong> ×10</td><td>360</td><td>360</td><td>unchanged</td></tr><tr><td><strong>Each door</strong> ×10</td><td>360</td><td>360</td><td>unchanged</td></tr><tr><td><strong>Windows</strong> ×10</td><td>360</td><td>360</td><td>unchanged</td></tr><tr><td><strong>Each window</strong> ×10</td><td>360</td><td>360</td><td>unchanged</td></tr><tr><td><strong>Waste</strong> ×10</td><td>360</td><td>360</td><td>unchanged</td></tr><tr><td><strong>Price</strong> ×10</td><td>360</td><td>360</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Flat walls and single gables.</strong> Dormers and bays need their own areas.</li><li><strong>Material and labour together.</strong> The price is per square, not per board.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering siding by the square.</li></li><li><li>Comparing quotes from contractors.</li></li><li><li>Checking a gable's contribution.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/vinyl-siding">Vinyl siding</a> <a href="/construction/wall-square-footage">Wall square footage</a> <a href="/construction/shiplap">Shiplap</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Siding calculator work out?', 'a' => <<<'TXT'
            It returns gross area and siding needed and squares and cost from wall length and height and gable rise and doors and each door and windows and each window and waste and price. The relationship is Wall length × Height+Wall length × Gable rise ÷ 2.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Wall length (ft), Height (ft), Gable rise (ft), Doors, Each door (ft²), Windows, Each window (ft²), Waste (%), Price ($/square). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: wall length in ft; height in ft; gable rise in ft; each door in ft²; each window in ft²; waste in %; price in $/square. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is a square of siding?', 'a' => 'One hundred square feet of wall area.'],
            ['q' => 'Do you deduct windows and doors from siding?', 'a' => 'At face value, yes, but the offcuts around them are waste so the saving is smaller than it looks.'],
        ],
        'related' => [
            ['path' => '/construction/vinyl-siding', 'name' => 'Vinyl siding'],
            ['path' => '/construction/wall-square-footage', 'name' => 'Wall square footage'],
            ['path' => '/construction/shiplap', 'name' => 'Shiplap'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

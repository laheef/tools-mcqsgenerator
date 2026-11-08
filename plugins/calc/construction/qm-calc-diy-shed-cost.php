<?php

/**
 * DIY shed cost
 * /construction/diy-shed-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'DIY shed cost',
    'meta' => ['title' => 'DIY Shed Cost Calculator: Floor, Walls and Roof', 'description' => 'Estimate a garden shed\'s floor, wall and roof areas from its size, then add the slab, wall and roofing prices into a single total cost. See the steps.', 'h1' => 'DIY shed cost', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'width',
                    'label' => 'Shed width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'help' => 'Gable end',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'length',
                    'label' => 'Shed length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '10',
                    'help' => 'Along the ridge',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'wall_height',
                    'label' => 'Wall height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '7',
                    'help' => 'Floor to eave',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'roof_rise',
                    'label' => 'Roof rise',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '2',
                    'help' => 'Eave to ridge',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'overhang',
                    'label' => 'Overhang',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '1',
                    'help' => 'All round',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'slab_price',
                    'label' => 'Slab price',
                    'type' => 'number',
                    'suffix' => '$/ft²',
                    'default' => '8',
                    'help' => 'Foundation',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'wall_price',
                    'label' => 'Wall price',
                    'type' => 'number',
                    'suffix' => '$/ft²',
                    'default' => '12',
                    'help' => 'Frame and cladding',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'roof_price',
                    'label' => 'Roof price',
                    'type' => 'number',
                    'suffix' => '$/ft²',
                    'default' => '6',
                    'help' => 'Roofing',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'floor_area',
                    'label' => 'Floor area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'wall_area',
                    'label' => 'Wall area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'roof_area',
                    'label' => 'Roof area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'total_cost',
                    'label' => 'Total cost',
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
            'title' => 'DIY shed cost',
            'results' => [
                'floor_area' => 'width*length',
                'wall_area' => '2*(width+length)*wall_height',
                'roof_area' => '(width+2*overhang)*(length+2*overhang)*sqrt(1+pow((roof_rise+overhang)/((width+2*overhang)/2),2))',
                'total_cost' => <<<'TXT'
                width*length*slab_price+2*(width+length)*wall_height*wall_price+(width+2*overhang)*(length+2*overhang)*sqrt(1+pow((roof_rise+overhang)/((width+2*overhang)/2),2))*roof_price
                TXT,
                'width' => 'floor_area/length',
                'length' => 'floor_area/width',
                'wall_height' => 'wall_area/(2*(width+length))',
                'roof_rise' => 'sqrt(pow(roof_area/((width+2*overhang)*(length+2*overhang)),2)-1)*(width+2*overhang)/2-overhang',
                'slab_price' => <<<'TXT'
                (total_cost-2*(width+length)*wall_height*wall_price-(width+2*overhang)*(length+2*overhang)*sqrt(1+pow((roof_rise+overhang)/((width+2*overhang)/2),2))*roof_price)/floor_area
                TXT,
                'wall_price' => '(total_cost-width*length*slab_price-(width+2*overhang)*(length+2*overhang)*sqrt(1+pow((roof_rise+overhang)/((width+2*overhang)/2),2))*roof_price)/wall_area',
                'roof_price' => '(total_cost-width*length*slab_price-2*(width+length)*wall_height*wall_price)/roof_area',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p><strong>Floor = width × length</strong>, <strong>walls = perimeter × height</strong>, and <strong>roof = footprint × pitch factor</strong>, each priced per square foot.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A shed is three separate boxes of cost — a slab, a box of walls and a roof — and each is priced by the square foot. Doing them separately is what stops the estimate being one guessed number, and it makes the roof, which is usually the smallest area, visible as the biggest surprise.</p><p>The page reports <strong>floor area and wall area and roof area and total cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Floor area</strong></td><td><code>Shed width × Shed length</code></td></tr><tr><td><strong>Wall area</strong></td><td><code>2 × (Shed width+Shed length) × Wall height</code></td></tr><tr><td><strong>Roof area</strong></td><td><code>(Shed width+2 × Overhang) × (Shed length+2 × Overhang) × √(1+pow((Roof rise+Overhang) ÷ ((Shed width+2 × Overhang) ÷ 2),2))</code></td></tr><tr><td><strong>Total cost</strong></td><td><code>Shed width × Shed length × Slab price+2 × (Shed width+Shed length) × Wall height × Wall price+(Shed width+2 × Overhang) × (Shed length+2 × Overhang) × √(1+pow((Roof rise+Overhang) ÷ ((Shed width+2 × Overhang) ÷ 2),2)) × Roof price</code></td></tr><tr><td><strong>Shed width</strong></td><td><code>Floor area ÷ Shed length</code></td></tr><tr><td><strong>Shed length</strong></td><td><code>Floor area ÷ Shed width</code></td></tr><tr><td><strong>Wall height</strong></td><td><code>Wall area ÷ (2 × (Shed width+Shed length))</code></td></tr><tr><td><strong>Roof rise</strong></td><td><code>√(pow(Roof area ÷ ((Shed width+2 × Overhang) × (Shed length+2 × Overhang)),2)-1) × (Shed width+2 × Overhang) ÷ 2-Overhang</code></td></tr><tr><td><strong>Slab price</strong></td><td><code>(Total cost-2 × (Shed width+Shed length) × Wall height × Wall price-(Shed width+2 × Overhang) × (Shed length+2 × Overhang) × √(1+pow((Roof rise+Overhang) ÷ ((Shed width+2 × Overhang) ÷ 2),2)) × Roof price) ÷ Floor area</code></td></tr><tr><td><strong>Wall price</strong></td><td><code>(Total cost-Shed width × Shed length × Slab price-(Shed width+2 × Overhang) × (Shed length+2 × Overhang) × √(1+pow((Roof rise+Overhang) ÷ ((Shed width+2 × Overhang) ÷ 2),2)) × Roof price) ÷ Wall area</code></td></tr><tr><td><strong>Roof price</strong></td><td><code>(Total cost-Shed width × Shed length × Slab price-2 × (Shed width+Shed length) × Wall height × Wall price) ÷ Roof area</code></td></tr></tbody></table><p><p>The floor is the footprint; the walls are the perimeter times the height, which ignores gable triangles and openings because they roughly cancel in a shed. The roof is measured at its pitch, with the overhang added all round.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 8 boxes and the page has everything it needs. It reports floor area and wall area and roof area and total cost.</p><ul><li><strong>Shed width</strong> — in ft. Gable end</li><li><strong>Shed length</strong> — in ft. Along the ridge</li><li><strong>Wall height</strong> — in ft. Floor to eave</li><li><strong>Roof rise</strong> — in ft. Eave to ridge</li><li><strong>Overhang</strong> — in ft. All round</li><li><strong>Slab price</strong> — in $/ft². Foundation</li><li><strong>Wall price</strong> — in $/ft². Frame and cladding</li><li><strong>Roof price</strong> — in $/ft². Roofing</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Floor area</strong> — in ft²</li><li><strong>Wall area</strong> — in ft²</li><li><strong>Roof area</strong> — in ft²</li><li><strong>Total cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Shed width = 8 ft, Shed length = 10 ft, Wall height = 7 ft, Roof rise = 2 ft, Overhang = 1 ft, Slab price = 8 $/ft², Wall price = 12 $/ft², Roof price = 6 $/ft² — and the results panel reads:</p><ul><li><strong>Floor area</strong> = <code>Shed width × Shed length</code> = <strong>80 ft²</strong></li><li><strong>Wall area</strong> = <code>2 × (Shed width+Shed length) × Wall height</code> = <strong>252 ft²</strong></li><li><strong>Roof area</strong> = <code>(Shed width+2 × Overhang) × (Shed length+2 × Overhang) × √(1+pow((Roof rise+Overhang) ÷ ((Shed width+2 × Overhang) ÷ 2),2))</code> = <strong>139.943 ft²</strong></li><li><strong>Total cost</strong> = <code>Shed width × Shed length × Slab price+2 × (Shed width+Shed length) × Wall height × Wall price+(Shed width+2 × Overhang) × (Shed length+2 × Overhang) × √(1+pow((Roof rise+Overhang) ÷ ((Shed width+2 × Overhang) ÷ 2),2)) × Roof price</code> = <strong>4 503.657 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>8 × 10 = 80</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>An 8 by 10 ft shed with 7 ft walls has 80 ft² of floor, 252 ft² of wall and 139.943 ft² of roof — 4 503.657 at the prices entered.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the wall area against the floor: for a shed, the walls are usually two to three times the floor. If they are close, the floor has been counted as walls.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Floor area</th><th>Wall area</th><th>Roof area</th><th>Total cost</th></tr></thead><tbody><tr><td><strong>Shed width</strong> +10 %</td><td>+10 %</td><td>+4.44 %</td><td>+5.94 %</td><td>+5.51 %</td></tr><tr><td><strong>Shed length</strong> +10 %</td><td>+10 %</td><td>+5.56 %</td><td>+8.33 %</td><td>+6.71 %</td></tr><tr><td><strong>Wall height</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+6.71 %</td></tr><tr><td><strong>Roof rise</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+1.81 %</td><td>+0.34 %</td></tr><tr><td><strong>Overhang</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+4.06 %</td><td>+0.76 %</td></tr><tr><td><strong>Slab price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+1.42 %</td></tr><tr><td><strong>Wall price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+6.71 %</td></tr><tr><td><strong>Roof price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+1.86 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Wall height</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Slab price</strong>, at 1.4 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Shed width = 12, Shed length = 16, Wall height = 8, Roof rise = 3, Overhang = 1.5, Slab price = 9, Wall price = 14, Roof price = 7, the page reports <strong>Floor area</strong> = 192 ft², <strong>Wall area</strong> = 448 ft², <strong>Roof area</strong> = 332.364 ft², <strong>Total cost</strong> = 10 326.55 $. A larger workshop: every area grows and the slab becomes a serious line.</li><li>With Shed width = 6, Shed length = 8, Wall height = 6.5, Roof rise = 1.5, Overhang = 0.5, Slab price = 6, Wall price = 10, Roof price = 5, the page reports <strong>Floor area</strong> = 48 ft², <strong>Wall area</strong> = 182 ft², <strong>Roof area</strong> = 72.56 ft², <strong>Total cost</strong> = 2 470.802 $. A small garden store: a cheap job where the slab is a dry-laid base.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Roof measured as the floor.</strong> Pitch and overhang both add.</li><li><strong>Doors and windows ignored.</strong> They roughly cancel with the gables.</li><li><strong>Labour assumed included.</strong> The prices are materials unless you say so.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Floor area (ft²), Wall area (ft²), Roof area (ft²), Total cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Dimensions in feet, areas in square feet and prices in dollars per square foot.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need shed width and shed length and wall height and roof rise and overhang and slab price and wall price and roof price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Floor area and wall area and roof area and total cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Shed width</strong> ×10</td><td>80</td><td>800</td><td>ten times larger</td></tr><tr><td><strong>Shed length</strong> ×10</td><td>80</td><td>800</td><td>ten times larger</td></tr><tr><td><strong>Wall height</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr><tr><td><strong>Roof rise</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr><tr><td><strong>Overhang</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr><tr><td><strong>Slab price</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr><tr><td><strong>Wall price</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr><tr><td><strong>Roof price</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A simple gable shed.</strong> Lean-tos and gambrels differ.</li><li><strong>A parametric estimate.</strong> It is not a quote.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Budgeting a garden shed.</li></li><li><li>Comparing a kit with a build.</li></li><li><li>Splitting a cost into trades.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/framing">Framing</a> <a href="/construction/square-footage">Square footage</a> <a href="/construction/hoop-house">Hoop house</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the DIY shed cost calculator work out?', 'a' => <<<'TXT'
            It returns floor area and wall area and roof area and total cost from shed width and shed length and wall height and roof rise and overhang and slab price and wall price and roof price. The relationship is Shed width × Shed length.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Shed width (ft), Shed length (ft), Wall height (ft), Roof rise (ft), Overhang (ft), Slab price ($/ft²), Wall price ($/ft²), Roof price ($/ft²). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: shed width in ft; shed length in ft; wall height in ft; roof rise in ft; overhang in ft; slab price in $/ft²; wall price in $/ft²; roof price in $/ft². The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much does it cost to build an 8 by 10 shed?', 'a' => 'About 1 700 to 2 500 dollars in materials at typical prices, depending on the cladding.'],
            ['q' => 'Is it cheaper to build a shed or buy a kit?', 'a' => 'A kit is usually cheaper for a standard size and quicker to assemble.'],
        ],
        'related' => [
            ['path' => '/construction/framing', 'name' => 'Framing'],
            ['path' => '/construction/square-footage', 'name' => 'Square footage'],
            ['path' => '/construction/hoop-house', 'name' => 'Hoop house'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

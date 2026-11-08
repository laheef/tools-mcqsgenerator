<?php

/**
 * Vinyl siding
 * /construction/vinyl-siding
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Vinyl siding',
    'meta' => ['title' => 'Vinyl Siding Calculator: Panels and Trim Tool', 'description' => 'Work out how many vinyl siding panels a wall takes, plus the J-channel, undersill and starter strip, and what the whole order costs. The formula is shown.', 'h1' => 'Vinyl siding', 'updated' => '2026-10-23'],
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
                    'name' => 'openings',
                    'label' => 'Openings',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '60',
                    'help' => 'Total perimeter of doors and windows',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'panel_length',
                    'label' => 'Panel length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => '12 ft is common',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'panel_width',
                    'label' => 'Panel width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '8',
                    'help' => 'Exposed width of a lap',
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
                    'name' => 'panel_price',
                    'label' => 'Price per panel',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '14',
                    'help' => 'Delivered',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'trim_price',
                    'label' => 'Trim price',
                    'type' => 'number',
                    'suffix' => '$/ft',
                    'default' => '2.5',
                    'help' => 'J-channel, undersill and starter',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area_ft2',
                    'label' => 'Wall area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'panel_area',
                    'label' => 'Panel coverage',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'panels',
                    'label' => 'Panels',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'trim_ft',
                    'label' => 'Trim run',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
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
            'title' => 'Vinyl siding',
            'results' => [
                'area_ft2' => 'wall_length*height',
                'panel_area' => 'panel_length*panel_width/12',
                'panels' => 'ceil(wall_length*height*(1+waste/100)/(panel_length*panel_width/12))',
                'trim_ft' => 'wall_length*2+openings+height*2',
                'cost' => 'ceil(wall_length*height*(1+waste/100)/(panel_length*panel_width/12))*panel_price+(wall_length*2+openings+height*2)*trim_price',
                'wall_length' => 'area_ft2/height',
                'height' => 'area_ft2/wall_length',
                'openings' => 'trim_ft-wall_length*2-height*2',
                'panel_length' => 'panel_area/(panel_width/12)',
                'panel_width' => 'panel_area/panel_length*12',
                'waste' => '(panels*panel_area/area_ft2-1)*100',
                'panel_price' => '(cost-(wall_length*2+openings+height*2)*trim_price)/panels',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Panels = ceiling(area × (1 + waste) ÷ panel area)</strong>, and the trim runs follow the perimeter, the openings and the bottom course.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Vinyl is bought in panels that cover far less than their nominal area, because each lap covers the one below it: an 8 in panel exposes about 4 to 6 in of wall. The trim is the part that catches people out, since every window and door needs J-channel all the way round.</p><p>The page reports <strong>wall area and panel coverage and panels and trim run and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Wall area</strong></td><td><code>Wall length × Height</code></td></tr><tr><td><strong>Panel coverage</strong></td><td><code>Panel length × Panel width ÷ 12</code></td></tr><tr><td><strong>Panels</strong></td><td><code>ceil(Wall length × Height × (1+Waste ÷ 100) ÷ (Panel length × Panel width ÷ 12))</code></td></tr><tr><td><strong>Trim run</strong></td><td><code>Wall length × 2+Openings+Height × 2</code></td></tr><tr><td><strong>Cost</strong></td><td><code>ceil(Wall length × Height × (1+Waste ÷ 100) ÷ (Panel length × Panel width ÷ 12)) × Price per panel+(Wall length × 2+Openings+Height × 2) × Trim price</code></td></tr><tr><td><strong>Wall length</strong></td><td><code>Wall area ÷ Height</code></td></tr><tr><td><strong>Height</strong></td><td><code>Wall area ÷ Wall length</code></td></tr><tr><td><strong>Openings</strong></td><td><code>Trim run-Wall length × 2-Height × 2</code></td></tr><tr><td><strong>Panel length</strong></td><td><code>Panel coverage ÷ (Panel width ÷ 12)</code></td></tr><tr><td><strong>Panel width</strong></td><td><code>Panel coverage ÷ Panel length × 12</code></td></tr><tr><td><strong>Waste</strong></td><td><code>(Panels × Panel coverage ÷ Wall area-1) × 100</code></td></tr><tr><td><strong>Price per panel</strong></td><td><code>(Cost-(Wall length × 2+Openings+Height × 2) × Trim price) ÷ Panels</code></td></tr></tbody></table><p><p>The panel's coverage is its length times its exposed width, not its full width — a 12 in panel lapped to 8 in covers two thirds of its nominal area. The trim run is the two ends, the top, the bottom course and every opening perimeter.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 8 boxes and the page has everything it needs. It reports wall area and panel coverage and panels and trim run and cost.</p><ul><li><strong>Wall length</strong> — in ft. The run being clad</li><li><strong>Height</strong> — in ft. Eave to ground</li><li><strong>Openings</strong> — in ft. Total perimeter of doors and windows</li><li><strong>Panel length</strong> — in ft. 12 ft is common</li><li><strong>Panel width</strong> — in in. Exposed width of a lap</li><li><strong>Waste</strong> — in %. Laps and cuts</li><li><strong>Price per panel</strong> — in $. Delivered</li><li><strong>Trim price</strong> — in $/ft. J-channel, undersill and starter</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Wall area</strong> — in ft²</li><li><strong>Panel coverage</strong> — in ft²</li><li><strong>Panels</strong></li><li><strong>Trim run</strong> — in ft</li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Wall length = 40 ft, Height = 9 ft, Openings = 60 ft, Panel length = 12 ft, Panel width = 8 in, Waste = 10 %, Price per panel = 14 $, Trim price = 2.5 $/ft — and the results panel reads:</p><ul><li><strong>Wall area</strong> = <code>Wall length × Height</code> = <strong>360 ft²</strong></li><li><strong>Panel coverage</strong> = <code>Panel length × Panel width ÷ 12</code> = <strong>8 ft²</strong></li><li><strong>Panels</strong> = <code>ceil(Wall length × Height × (1+Waste ÷ 100) ÷ (Panel length × Panel width ÷ 12))</code> = <strong>50</strong></li><li><strong>Trim run</strong> = <code>Wall length × 2+Openings+Height × 2</code> = <strong>158 ft</strong></li><li><strong>Cost</strong> = <code>ceil(Wall length × Height × (1+Waste ÷ 100) ÷ (Panel length × Panel width ÷ 12)) × Price per panel+(Wall length × 2+Openings+Height × 2) × Trim price</code> = <strong>1 095 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>40 × 9 = 360</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 40 by 9 ft wall is 360 ft². A 12 ft panel at 8 in exposed covers 8 ft², so the job takes 50 panels and 158 ft of trim — 1 095 at the prices entered.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the panel count against the area: a 12 ft panel at 8 in exposed covers eight square feet. If the count is half what that suggests, the full panel width has been used instead of the exposed width.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Wall area</th><th>Panel coverage</th><th>Panels</th><th>Trim run</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Wall length</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>+5.06 %</td><td>+8.22 %</td></tr><tr><td><strong>Height</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>+1.14 %</td><td>+6.8 %</td></tr><tr><td><strong>Openings</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+3.8 %</td><td>+1.37 %</td></tr><tr><td><strong>Panel length</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>−10 %</td><td>+0 %</td><td>−6.39 %</td></tr><tr><td><strong>Panel width</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>−10 %</td><td>+0 %</td><td>−6.39 %</td></tr><tr><td><strong>Waste</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+2 %</td><td>+0 %</td><td>+1.28 %</td></tr><tr><td><strong>Price per panel</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+6.39 %</td></tr><tr><td><strong>Trim price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+3.61 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Panel length</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Waste</strong>, at 2 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Wall length = 32, Height = 8, Openings = 40, Panel length = 12.5, Panel width = 6, Waste = 12, Price per panel = 12, Trim price = 2.2, the page reports <strong>Wall area</strong> = 256 ft², <strong>Panel coverage</strong> = 6.25 ft², <strong>Panels</strong> = 46, <strong>Trim run</strong> = 120 ft, <strong>Cost</strong> = 816 $. A narrower lap: same wall, a third more panels.</li><li>With Wall length = 60, Height = 10, Openings = 120, Panel length = 16, Panel width = 9, Waste = 8, Price per panel = 19, Trim price = 2.8, the page reports <strong>Wall area</strong> = 600 ft², <strong>Panel coverage</strong> = 12 ft², <strong>Panels</strong> = 54, <strong>Trim run</strong> = 260 ft, <strong>Cost</strong> = 1 754 $. A commercial wall with many openings: the trim becomes a serious line item.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Full panel width used.</strong> Only the exposed width covers wall.</li><li><strong>Trim measured as the wall only.</strong> Every opening adds its perimeter.</li><li><strong>Waste left at zero.</strong> Cutting around openings wastes both ends.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Wall area (ft²), Panel coverage (ft²), Panels, Trim run (ft), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Wall dimensions in feet, panel width in inches, openings as a total perimeter in feet, coverage in square feet, trim in feet and cost in dollars.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need wall length and height and openings and panel length and panel width and waste and price per panel and trim price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Wall area and panel coverage and panels and trim run and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Wall length</strong> ×10</td><td>360</td><td>3 600</td><td>ten times larger</td></tr><tr><td><strong>Height</strong> ×10</td><td>360</td><td>3 600</td><td>ten times larger</td></tr><tr><td><strong>Openings</strong> ×10</td><td>360</td><td>360</td><td>unchanged</td></tr><tr><td><strong>Panel length</strong> ×10</td><td>360</td><td>360</td><td>unchanged</td></tr><tr><td><strong>Panel width</strong> ×10</td><td>360</td><td>360</td><td>unchanged</td></tr><tr><td><strong>Waste</strong> ×10</td><td>360</td><td>360</td><td>unchanged</td></tr><tr><td><strong>Price per panel</strong> ×10</td><td>360</td><td>360</td><td>unchanged</td></tr><tr><td><strong>Trim price</strong> ×10</td><td>360</td><td>360</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A flat wall.</strong> Gables add a triangle, and soffits are separate.</li><li><strong>One profile.</strong> Board-and-batten and insulated profiles cover differently.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering vinyl siding panels.</li></li><li><li>Estimating the trim with the panels.</li></li><li><li>Comparing lap profiles.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/siding">Siding</a> <a href="/construction/shiplap">Shiplap</a> <a href="/construction/framing">Framing</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Vinyl siding calculator work out?', 'a' => <<<'TXT'
            It returns wall area and panel coverage and panels and trim run and cost from wall length and height and openings and panel length and panel width and waste and price per panel and trim price. The relationship is Wall length × Height.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Wall length (ft), Height (ft), Openings (ft), Panel length (ft), Panel width (in), Waste (%), Price per panel ($), Trim price ($/ft). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: wall length in ft; height in ft; openings in ft; panel length in ft; panel width in in; waste in %; price per panel in $; trim price in $/ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many panels of vinyl siding for a 40 ft wall?', 'a' => 'About 47 panels of 12 ft at 8 in exposed with ten per cent waste.'],
            ['q' => 'How much does a panel of vinyl siding cover?', 'a' => 'Its length times the exposed width — eight square feet for a 12 ft panel lapped to 8 in.'],
        ],
        'related' => [
            ['path' => '/construction/siding', 'name' => 'Siding'],
            ['path' => '/construction/shiplap', 'name' => 'Shiplap'],
            ['path' => '/construction/framing', 'name' => 'Framing'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

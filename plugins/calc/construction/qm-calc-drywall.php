<?php

/**
 * Drywall
 * /construction/drywall
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Drywall',
    'meta' => ['title' => 'Drywall Calculator: Sheets, Mud and Tape Tool', 'description' => 'Work out the drywall sheets a wall or ceiling needs from its area, the sheet size and waste, with joint compound, tape, screws and the cost. Units shown.', 'h1' => 'Drywall', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Room length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '16',
                    'help' => 'Wall to wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Room width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Wall to wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Ceiling height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'help' => 'Floor to ceiling',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Waste',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Cuts and breaks',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sheet_area',
                    'label' => 'Sheet area',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '32',
                    'help' => '4 × 8 is 32 ft²',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price per sheet',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '16',
                    'help' => 'Delivered',
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
                    'name' => 'sheets',
                    'label' => 'Sheets',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'mud_lb',
                    'label' => 'Joint compound',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'tape_ft',
                    'label' => 'Tape',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'screws',
                    'label' => 'Screws',
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
            'title' => 'Drywall',
            'results' => [
                'area_ft2' => '2*(length+width)*height',
                'sheets' => 'ceil(2*(length+width)*height*(1+waste/100)/sheet_area)',
                'mud_lb' => '2*(length+width)*height*0.1',
                'tape_ft' => '2*(length+width)*height*0.5',
                'screws' => 'ceil(2*(length+width)*height*1.1)',
                'cost' => 'ceil(2*(length+width)*height*(1+waste/100)/sheet_area)*price',
                'length' => 'area_ft2/(2*height)-width',
                'width' => 'area_ft2/(2*height)-length',
                'height' => 'area_ft2/(2*(length+width))',
                'waste' => '(sheets*sheet_area/area_ft2-1)*100',
                'price' => 'cost/sheets',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Sheets = ceiling(area × (1 + waste) ÷ sheet area)</strong>, and the mud, tape and screws follow from the sheet count.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Drywall is cheap per sheet and expensive per trip, and the hanging is only half the job: the mud, tape and screws have to arrive with the boards. A room's wall area is the starting point, and every sheet of 4 by 8 covers 32 square feet of it.</p><p>The page reports <strong>wall area and sheets and joint compound and tape and screws and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Wall area</strong></td><td><code>2 × (Room length+Room width) × Ceiling height</code></td></tr><tr><td><strong>Sheets</strong></td><td><code>ceil(2 × (Room length+Room width) × Ceiling height × (1+Waste ÷ 100) ÷ Sheet area)</code></td></tr><tr><td><strong>Joint compound</strong></td><td><code>2 × (Room length+Room width) × Ceiling height × 0.1</code></td></tr><tr><td><strong>Tape</strong></td><td><code>2 × (Room length+Room width) × Ceiling height × 0.5</code></td></tr><tr><td><strong>Screws</strong></td><td><code>ceil(2 × (Room length+Room width) × Ceiling height × 1.1)</code></td></tr><tr><td><strong>Cost</strong></td><td><code>ceil(2 × (Room length+Room width) × Ceiling height × (1+Waste ÷ 100) ÷ Sheet area) × Price per sheet</code></td></tr><tr><td><strong>Room length</strong></td><td><code>Wall area ÷ (2 × Ceiling height)-Room width</code></td></tr><tr><td><strong>Room width</strong></td><td><code>Wall area ÷ (2 × Ceiling height)-Room length</code></td></tr><tr><td><strong>Ceiling height</strong></td><td><code>Wall area ÷ (2 × (Room length+Room width))</code></td></tr><tr><td><strong>Waste</strong></td><td><code>(Sheets × Sheet area ÷ Wall area-1) × 100</code></td></tr><tr><td><strong>Price per sheet</strong></td><td><code>Cost ÷ Sheets</code></td></tr></tbody></table><p><p>The sheet count rounds up because a wall is never a whole number of boards. The other three figures are rules of thumb from site practice: about a tenth of a pound of joint compound per square foot, half a foot of tape, and a screw every square foot with a tenth over for studs and corners.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports wall area and sheets and joint compound and tape and screws and cost.</p><ul><li><strong>Room length</strong> — in ft. Wall to wall</li><li><strong>Room width</strong> — in ft. Wall to wall</li><li><strong>Ceiling height</strong> — in ft. Floor to ceiling</li><li><strong>Waste</strong> — in %. Cuts and breaks</li><li><strong>Sheet area</strong> — in ft². 4 × 8 is 32 ft²</li><li><strong>Price per sheet</strong> — in $. Delivered</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Wall area</strong> — in ft²</li><li><strong>Sheets</strong></li><li><strong>Joint compound</strong> — in lb</li><li><strong>Tape</strong> — in ft</li><li><strong>Screws</strong></li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Room length = 16 ft, Room width = 12 ft, Ceiling height = 8 ft, Waste = 10 %, Sheet area = 32 ft², Price per sheet = 16 $ — and the results panel reads:</p><ul><li><strong>Wall area</strong> = <code>2 × (Room length+Room width) × Ceiling height</code> = <strong>448 ft²</strong></li><li><strong>Sheets</strong> = <code>ceil(2 × (Room length+Room width) × Ceiling height × (1+Waste ÷ 100) ÷ Sheet area)</code> = <strong>16</strong></li><li><strong>Joint compound</strong> = <code>2 × (Room length+Room width) × Ceiling height × 0.1</code> = <strong>44.8 lb</strong></li><li><strong>Tape</strong> = <code>2 × (Room length+Room width) × Ceiling height × 0.5</code> = <strong>224 ft</strong></li><li><strong>Screws</strong> = <code>ceil(2 × (Room length+Room width) × Ceiling height × 1.1)</code> = <strong>493</strong></li><li><strong>Cost</strong> = <code>ceil(2 × (Room length+Room width) × Ceiling height × (1+Waste ÷ 100) ÷ Sheet area) × Price per sheet</code> = <strong>256 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>2 × (16+12) × 8 = 448</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A room 16 by 12 with an 8 ft ceiling has 448 ft² of wall. That is 16 sheets with ten per cent for cuts, 44.8 lb of joint compound, 224 ft of tape and 493 screws — 256 in board.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the sheets against the area: a 32 ft² sheet means roughly one sheet per 29 square feet once waste is allowed. If the count is near the area itself, the sheet size has been entered as 1.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Wall area</th><th>Sheets</th><th>Joint compound</th><th>Tape</th><th>Screws</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Room length</strong> +10 %</td><td>+5.71 %</td><td>+6.25 %</td><td>+5.71 %</td><td>+5.71 %</td><td>+5.68 %</td><td>+6.25 %</td></tr><tr><td><strong>Room width</strong> +10 %</td><td>+4.29 %</td><td>+6.25 %</td><td>+4.29 %</td><td>+4.29 %</td><td>+4.26 %</td><td>+6.25 %</td></tr><tr><td><strong>Ceiling height</strong> +10 %</td><td>+10 %</td><td>+6.25 %</td><td>+10 %</td><td>+10 %</td><td>+10.14 %</td><td>+6.25 %</td></tr><tr><td><strong>Waste</strong> +10 %</td><td>+0 %</td><td>+6.25 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+6.25 %</td></tr><tr><td><strong>Sheet area</strong> +10 %</td><td>+0 %</td><td>−12.5 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−12.5 %</td></tr><tr><td><strong>Price per sheet</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Sheet area</strong>: a ten per cent move there shifts the result by about 12.5 per cent. The least sensitive is <strong>Waste</strong>, at 6.2 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Room length = 20, Room width = 16, Ceiling height = 9, Waste = 12, Sheet area = 48, Price per sheet = 24, the page reports <strong>Wall area</strong> = 648 ft², <strong>Sheets</strong> = 16, <strong>Joint compound</strong> = 64.8 lb, <strong>Tape</strong> = 324 ft, <strong>Screws</strong> = 713, <strong>Cost</strong> = 384 $. A large room in 4 by 12 sheets: fewer joints to tape, heavier to handle.</li><li>With Room length = 10, Room width = 8, Ceiling height = 8, Waste = 8, Sheet area = 32, Price per sheet = 14, the page reports <strong>Wall area</strong> = 288 ft², <strong>Sheets</strong> = 10, <strong>Joint compound</strong> = 28.8 lb, <strong>Tape</strong> = 144 ft, <strong>Screws</strong> = 317, <strong>Cost</strong> = 140 $. A small bedroom: fewer than ten sheets and one bucket of mud.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Ceiling left out.</strong> Add length × width if it is being boarded.</li><li><strong>Waste below ten per cent.</strong> Doorways and corners always cut.</li><li><strong>Fire-rated board priced as standard.</strong> The sheet price differs.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Wall area (ft²), Sheets, Joint compound (lb), Tape (ft), Screws, Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Room dimensions in feet, area and sheet size in square feet, compound in pounds, tape in feet, screws as a count and cost in dollars.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need room length and room width and ceiling height and waste and sheet area and price per sheet. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Wall area and sheets and joint compound and tape and screws and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Room length</strong> ×10</td><td>448</td><td>2 752</td><td>×6.143</td></tr><tr><td><strong>Room width</strong> ×10</td><td>448</td><td>2 176</td><td>×4.857</td></tr><tr><td><strong>Ceiling height</strong> ×10</td><td>448</td><td>4 480</td><td>ten times larger</td></tr><tr><td><strong>Waste</strong> ×10</td><td>448</td><td>448</td><td>unchanged</td></tr><tr><td><strong>Sheet area</strong> ×10</td><td>448</td><td>448</td><td>unchanged</td></tr><tr><td><strong>Price per sheet</strong> ×10</td><td>448</td><td>448</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Plain board.</strong> Moisture and fire boards are a different spec.</li><li><strong>Rules of thumb.</strong> Heavy texture and many corners take more mud.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Buying drywall for a room.</li></li><li><li>Ordering mud and tape in one pass.</li></li><li><li>Comparing sheet sizes.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/paint">Paint</a> <a href="/construction/framing">Framing</a> <a href="/construction/insulation">Insulation</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Drywall calculator work out?', 'a' => <<<'TXT'
            It returns wall area and sheets and joint compound and tape and screws and cost from room length and room width and ceiling height and waste and sheet area and price per sheet. The relationship is 2 × (Room length+Room width) × Ceiling height.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Room length (ft), Room width (ft), Ceiling height (ft), Waste (%), Sheet area (ft²), Price per sheet ($). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: room length in ft; room width in ft; ceiling height in ft; waste in %; sheet area in ft²; price per sheet in $. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many sheets of drywall for a 12 by 16 room?', 'a' => 'About 20 sheets of 4 by 8 for the walls with ten per cent waste.'],
            ['q' => 'How much joint compound per sheet?', 'a' => 'About 3 lb a sheet, which is a tenth of a pound per square foot.'],
        ],
        'related' => [
            ['path' => '/construction/paint', 'name' => 'Paint'],
            ['path' => '/construction/framing', 'name' => 'Framing'],
            ['path' => '/construction/insulation', 'name' => 'Insulation'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

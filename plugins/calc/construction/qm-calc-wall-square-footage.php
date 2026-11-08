<?php

/**
 * Wall square footage
 * /construction/wall-square-footage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Wall square footage',
    'meta' => ['title' => 'Wall Square Footage Calculator: Room Walls Tool', 'description' => 'Work out the wall area of a room from its perimeter and ceiling height, less the doors and windows, with gable and soffit areas noted. The formula is shown.', 'h1' => 'Wall square footage', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Room length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '14',
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
                    'default' => '9',
                    'help' => 'Floor to ceiling',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'doors',
                    'label' => 'Doors',
                    'type' => 'number',
                    'default' => '2',
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
                    'default' => '3',
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
                    'name' => 'perimeter',
                    'label' => 'Perimeter',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'gross_area',
                    'label' => 'Gross wall area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'openings',
                    'label' => 'Openings',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'net_area',
                    'label' => 'Net wall area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Wall square footage',
            'results' => [
                'perimeter' => '2*(length+width)',
                'gross_area' => '2*(length+width)*height',
                'openings' => 'doors*door_area+windows*window_area',
                'net_area' => '2*(length+width)*height-doors*door_area-windows*window_area',
                'length' => 'perimeter/2-width',
                'width' => 'perimeter/2-length',
                'height' => 'gross_area/(2*(length+width))',
                'doors' => '(gross_area-windows*window_area-net_area)/door_area',
                'windows' => '(gross_area-doors*door_area-net_area)/window_area',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Wall area = perimeter × ceiling height</strong>, less the openings; the perimeter is twice the sum of the two room dimensions.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Wall area is what paint, wallpaper, panelling and insulation are all bought against, and it is always larger than the floor — roughly three times for a normal room. The openings matter most on small walls, where two doors can take a sixth of the paint.</p><p>The page reports <strong>perimeter and gross wall area and openings and net wall area</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Perimeter</strong></td><td><code>2 × (Room length+Room width)</code></td></tr><tr><td><strong>Gross wall area</strong></td><td><code>2 × (Room length+Room width) × Ceiling height</code></td></tr><tr><td><strong>Openings</strong></td><td><code>Doors × Each door+Windows × Each window</code></td></tr><tr><td><strong>Net wall area</strong></td><td><code>2 × (Room length+Room width) × Ceiling height-Doors × Each door-Windows × Each window</code></td></tr><tr><td><strong>Room length</strong></td><td><code>Perimeter ÷ 2-Room width</code></td></tr><tr><td><strong>Room width</strong></td><td><code>Perimeter ÷ 2-Room length</code></td></tr><tr><td><strong>Ceiling height</strong></td><td><code>Gross wall area ÷ (2 × (Room length+Room width))</code></td></tr><tr><td><strong>Doors</strong></td><td><code>(Gross wall area-Windows × Each window-Net wall area) ÷ Each door</code></td></tr><tr><td><strong>Windows</strong></td><td><code>(Gross wall area-Doors × Each door-Net wall area) ÷ Each window</code></td></tr></tbody></table><p><p>The perimeter is twice the sum of the room's two dimensions, because every room has two long walls and two short ones. Multiply by the ceiling height and the openings come off at face value.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 7 boxes and the page has everything it needs. It reports perimeter and gross wall area and openings and net wall area.</p><ul><li><strong>Room length</strong> — in ft. Wall to wall</li><li><strong>Room width</strong> — in ft. Wall to wall</li><li><strong>Ceiling height</strong> — in ft. Floor to ceiling</li><li><strong>Doors</strong>. Opening count</li><li><strong>Each door</strong> — in ft². Standard door</li><li><strong>Windows</strong>. Opening count</li><li><strong>Each window</strong> — in ft². Measured opening</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Perimeter</strong> — in ft</li><li><strong>Gross wall area</strong> — in ft²</li><li><strong>Openings</strong> — in ft²</li><li><strong>Net wall area</strong> — in ft²</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Room length = 14 ft, Room width = 12 ft, Ceiling height = 9 ft, Doors = 2, Each door = 21 ft², Windows = 3, Each window = 15 ft² — and the results panel reads:</p><ul><li><strong>Perimeter</strong> = <code>2 × (Room length+Room width)</code> = <strong>52 ft</strong></li><li><strong>Gross wall area</strong> = <code>2 × (Room length+Room width) × Ceiling height</code> = <strong>468 ft²</strong></li><li><strong>Openings</strong> = <code>Doors × Each door+Windows × Each window</code> = <strong>87 ft²</strong></li><li><strong>Net wall area</strong> = <code>2 × (Room length+Room width) × Ceiling height-Doors × Each door-Windows × Each window</code> = <strong>381 ft²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>2 × (14+12) = 52</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A room 14 by 12 with a 9 ft ceiling has 52 ft of wall running 468 ft². Two doors and three windows take 87 ft² off, leaving 381 ft².</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the net against the gross: the openings should be 10 to 20 per cent of the total. A deduction much larger than that means the door or window areas have been entered in inches.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Perimeter</th><th>Gross wall area</th><th>Openings</th><th>Net wall area</th></tr></thead><tbody><tr><td><strong>Room length</strong> +10 %</td><td>+5.38 %</td><td>+5.38 %</td><td>+0 %</td><td>+6.61 %</td></tr><tr><td><strong>Room width</strong> +10 %</td><td>+4.62 %</td><td>+4.62 %</td><td>+0 %</td><td>+5.67 %</td></tr><tr><td><strong>Ceiling height</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+12.28 %</td></tr><tr><td><strong>Doors</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+4.83 %</td><td>−1.1 %</td></tr><tr><td><strong>Each door</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+4.83 %</td><td>−1.1 %</td></tr><tr><td><strong>Windows</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+5.17 %</td><td>−1.18 %</td></tr><tr><td><strong>Each window</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+5.17 %</td><td>−1.18 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Ceiling height</strong>: a ten per cent move there shifts the result by about 12.3 per cent. The least sensitive is <strong>Each door</strong>, at 4.8 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Room length = 24, Room width = 18, Ceiling height = 10, Doors = 3, Each door = 21, Windows = 6, Each window = 20, the page reports <strong>Perimeter</strong> = 84 ft, <strong>Gross wall area</strong> = 840 ft², <strong>Openings</strong> = 183 ft², <strong>Net wall area</strong> = 657 ft². An open-plan room: a long perimeter and a lot of glass.</li><li>With Room length = 8, Room width = 8, Ceiling height = 8, Doors = 1, Each door = 21, Windows = 1, Each window = 15, the page reports <strong>Perimeter</strong> = 32 ft, <strong>Gross wall area</strong> = 256 ft², <strong>Openings</strong> = 36 ft², <strong>Net wall area</strong> = 220 ft². A box room where the single door takes a seventh of the wall.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Floor area used instead.</strong> Walls are about three times the floor.</li><li><strong>Ceiling area double-counted.</strong> It is a separate rectangle.</li><li><strong>Openings deducted twice.</strong> Do not deduct and then add back for trim.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Perimeter (ft), Gross wall area (ft²), Openings (ft²), Net wall area (ft²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Room dimensions in feet, perimeter and gross area in feet and square feet, opening areas in square feet and net wall area in square feet.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need room length and room width and ceiling height and doors and each door and windows and each window. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Perimeter and gross wall area and openings and net wall area should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Room length</strong> ×10</td><td>52</td><td>304</td><td>×5.846</td></tr><tr><td><strong>Room width</strong> ×10</td><td>52</td><td>268</td><td>×5.154</td></tr><tr><td><strong>Ceiling height</strong> ×10</td><td>52</td><td>52</td><td>unchanged</td></tr><tr><td><strong>Doors</strong> ×10</td><td>52</td><td>52</td><td>unchanged</td></tr><tr><td><strong>Each door</strong> ×10</td><td>52</td><td>52</td><td>unchanged</td></tr><tr><td><strong>Windows</strong> ×10</td><td>52</td><td>52</td><td>unchanged</td></tr><tr><td><strong>Each window</strong> ×10</td><td>52</td><td>52</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A rectangular room.</strong> Sloped ceilings and half walls need their own runs.</li><li><strong>Face area only.</strong> Reveals and returns are extra.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing paint or wallpaper.</li></li><li><li>Ordering panelling or cladding.</li></li><li><li>Checking a room's wall area for insulation.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/paint">Paint</a> <a href="/construction/square-footage">Square footage</a> <a href="/construction/siding">Siding</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Wall square footage calculator work out?', 'a' => <<<'TXT'
            It returns perimeter and gross wall area and openings and net wall area from room length and room width and ceiling height and doors and each door and windows and each window. The relationship is 2 × (Room length+Room width).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Room length (ft), Room width (ft), Ceiling height (ft), Doors, Each door (ft²), Windows, Each window (ft²). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: room length in ft; room width in ft; ceiling height in ft; each door in ft²; each window in ft². The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I find the wall area of a room?', 'a' => 'Add the length and width, double it for the perimeter, multiply by the ceiling height, then subtract the doors and windows.'],
            ['q' => 'How much wall area is a 12 by 12 room?', 'a' => '384 ft² at an 8 ft ceiling before openings.'],
        ],
        'related' => [
            ['path' => '/construction/paint', 'name' => 'Paint'],
            ['path' => '/construction/square-footage', 'name' => 'Square footage'],
            ['path' => '/construction/siding', 'name' => 'Siding'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

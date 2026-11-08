<?php

/**
 * Paint
 * /construction/paint
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Paint',
    'meta' => ['title' => 'Paint Calculator: Gallons for a Room — Formula', 'description' => 'Work out the paintable wall area of a room, the gallons and cans of paint it takes for two coats, and what the job costs at your price. See the steps.', 'h1' => 'Paint', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Room length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Wall to wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Room width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '10',
                    'help' => 'Wall to wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Wall height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'help' => 'Floor to ceiling',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'doors',
                    'label' => 'Doors',
                    'type' => 'number',
                    'default' => '2',
                    'help' => 'Counted as openings',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'door_area',
                    'label' => 'Each door',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '21',
                    'help' => 'A standard door is 21 ft²',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'windows',
                    'label' => 'Windows',
                    'type' => 'number',
                    'default' => '2',
                    'help' => 'Counted as openings',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'window_area',
                    'label' => 'Each window',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '15',
                    'help' => 'Measured glass and frame',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'coats',
                    'label' => 'Coats',
                    'type' => 'number',
                    'default' => '2',
                    'help' => 'Two is normal',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'coverage',
                    'label' => 'Coverage',
                    'type' => 'number',
                    'suffix' => 'ft²/gal',
                    'default' => '350',
                    'help' => '350 on a smooth wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/gal',
                    'default' => '38',
                    'help' => 'Per gallon',
                    'rounding' => ['omni', '0.0001'],
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
                    'name' => 'net_area',
                    'label' => 'Paintable area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'gallons',
                    'label' => 'Paint',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gal',
                ],
                [
                    'name' => 'cans',
                    'label' => 'Cans to buy',
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
            'title' => 'Paint',
            'results' => [
                'wall_area' => '2*(length+width)*height',
                'net_area' => '2*(length+width)*height-doors*door_area-windows*window_area',
                'gallons' => '(2*(length+width)*height-doors*door_area-windows*window_area)*coats/coverage',
                'cans' => 'ceil((2*(length+width)*height-doors*door_area-windows*window_area)*coats/coverage)',
                'cost' => 'ceil((2*(length+width)*height-doors*door_area-windows*window_area)*coats/coverage)*price',
                'length' => 'wall_area/(2*height)-width',
                'width' => 'wall_area/(2*height)-length',
                'height' => 'wall_area/(2*(length+width))',
                'doors' => '(2*(length+width)*height-windows*window_area-net_area)/door_area',
                'windows' => '(2*(length+width)*height-doors*door_area-net_area)/window_area',
                'coats' => 'gallons*coverage/net_area',
                'coverage' => 'net_area*coats/gallons',
                'price' => 'cost/cans',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Wall area = perimeter × height</strong>, less the doors and windows, then <strong>gallons = net area × coats ÷ coverage</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Paint is the one material almost everyone buys twice: the first tin goes on, the wall drinks it, and the second trip is an hour of the weekend. The room's perimeter times its height is a rectangle you can measure in two minutes, and subtracting the openings keeps the estimate honest.</p><p>The page reports <strong>wall area and paintable area and paint and cans to buy and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Wall area</strong></td><td><code>2 × (Room length+Room width) × Wall height</code></td></tr><tr><td><strong>Paintable area</strong></td><td><code>2 × (Room length+Room width) × Wall height-Doors × Each door-Windows × Each window</code></td></tr><tr><td><strong>Paint</strong></td><td><code>(2 × (Room length+Room width) × Wall height-Doors × Each door-Windows × Each window) × Coats ÷ Coverage</code></td></tr><tr><td><strong>Cans to buy</strong></td><td><code>ceil((2 × (Room length+Room width) × Wall height-Doors × Each door-Windows × Each window) × Coats ÷ Coverage)</code></td></tr><tr><td><strong>Cost</strong></td><td><code>ceil((2 × (Room length+Room width) × Wall height-Doors × Each door-Windows × Each window) × Coats ÷ Coverage) × Price</code></td></tr><tr><td><strong>Room length</strong></td><td><code>Wall area ÷ (2 × Wall height)-Room width</code></td></tr><tr><td><strong>Room width</strong></td><td><code>Wall area ÷ (2 × Wall height)-Room length</code></td></tr><tr><td><strong>Wall height</strong></td><td><code>Wall area ÷ (2 × (Room length+Room width))</code></td></tr><tr><td><strong>Doors</strong></td><td><code>(2 × (Room length+Room width) × Wall height-Windows × Each window-Paintable area) ÷ Each door</code></td></tr><tr><td><strong>Windows</strong></td><td><code>(2 × (Room length+Room width) × Wall height-Doors × Each door-Paintable area) ÷ Each window</code></td></tr><tr><td><strong>Coats</strong></td><td><code>Paint × Coverage ÷ Paintable area</code></td></tr><tr><td><strong>Coverage</strong></td><td><code>Paintable area × Coats ÷ Paint</code></td></tr><tr><td><strong>Price</strong></td><td><code>Cost ÷ Cans to buy</code></td></tr></tbody></table><p><p>Every wall is counted twice — the long pair and the short pair — which is where the factor of two comes from. Doors and windows are subtracted at face value, though a door usually needs its frame painted, so the over-order in the can count absorbs it.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 10 boxes and the page has everything it needs. It reports wall area and paintable area and paint and cans to buy and cost.</p><ul><li><strong>Room length</strong> — in ft. Wall to wall</li><li><strong>Room width</strong> — in ft. Wall to wall</li><li><strong>Wall height</strong> — in ft. Floor to ceiling</li><li><strong>Doors</strong>. Counted as openings</li><li><strong>Each door</strong> — in ft². A standard door is 21 ft²</li><li><strong>Windows</strong>. Counted as openings</li><li><strong>Each window</strong> — in ft². Measured glass and frame</li><li><strong>Coats</strong>. Two is normal</li><li><strong>Coverage</strong> — in ft²/gal. 350 on a smooth wall</li><li><strong>Price</strong> — in $/gal. Per gallon</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Wall area</strong> — in ft²</li><li><strong>Paintable area</strong> — in ft²</li><li><strong>Paint</strong> — in gal</li><li><strong>Cans to buy</strong></li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Room length = 12 ft, Room width = 10 ft, Wall height = 8 ft, Doors = 2, Each door = 21 ft², Windows = 2, Each window = 15 ft², Coats = 2, Coverage = 350 ft²/gal, Price = 38 $/gal — and the results panel reads:</p><ul><li><strong>Wall area</strong> = <code>2 × (Room length+Room width) × Wall height</code> = <strong>352 ft²</strong></li><li><strong>Paintable area</strong> = <code>2 × (Room length+Room width) × Wall height-Doors × Each door-Windows × Each window</code> = <strong>280 ft²</strong></li><li><strong>Paint</strong> = <code>(2 × (Room length+Room width) × Wall height-Doors × Each door-Windows × Each window) × Coats ÷ Coverage</code> = <strong>1.6 gal</strong></li><li><strong>Cans to buy</strong> = <code>ceil((2 × (Room length+Room width) × Wall height-Doors × Each door-Windows × Each window) × Coats ÷ Coverage)</code> = <strong>2</strong></li><li><strong>Cost</strong> = <code>ceil((2 × (Room length+Room width) × Wall height-Doors × Each door-Windows × Each window) × Coats ÷ Coverage) × Price</code> = <strong>76 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>2 × (12+10) × 8 = 352</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A room 12 by 10 ft with an 8 ft ceiling has 352 ft² of wall. Two doors and two windows take off 72 ft², leaving 280 ft² to paint — 1.6 gallons, or 2 cans, for 76.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the gallons against the room: a typical bedroom lands near two gallons for two coats. If the figure is far higher, the coverage has been entered as square metres per litre, which is a much larger number.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Wall area</th><th>Paintable area</th><th>Paint</th><th>Cans to buy</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Room length</strong> +10 %</td><td>+5.45 %</td><td>+6.86 %</td><td>+6.86 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Room width</strong> +10 %</td><td>+4.55 %</td><td>+5.71 %</td><td>+5.71 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Wall height</strong> +10 %</td><td>+10 %</td><td>+12.57 %</td><td>+12.57 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Doors</strong> +10 %</td><td>+0 %</td><td>−1.5 %</td><td>−1.5 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Each door</strong> +10 %</td><td>+0 %</td><td>−1.5 %</td><td>−1.5 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Windows</strong> +10 %</td><td>+0 %</td><td>−1.07 %</td><td>−1.07 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Each window</strong> +10 %</td><td>+0 %</td><td>−1.07 %</td><td>−1.07 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Coats</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Coverage</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Wall height</strong>: a ten per cent move there shifts the result by about 12.6 per cent. The least sensitive is <strong>Each window</strong>, at 1.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Room length = 20, Room width = 16, Wall height = 9, Doors = 2, Each door = 21, Windows = 4, Each window = 18, Coats = 2, Coverage = 350, Price = 42, the page reports <strong>Wall area</strong> = 648 ft², <strong>Paintable area</strong> = 534 ft², <strong>Paint</strong> = 3.051 gal, <strong>Cans to buy</strong> = 4, <strong>Cost</strong> = 168 $. A large open room: the perimeter grows with both dimensions, so the gallon count climbs faster than the floor area suggests.</li><li>With Room length = 10, Room width = 10, Wall height = 8, Doors = 1, Each door = 21, Windows = 1, Each window = 15, Coats = 3, Coverage = 300, Price = 45, the page reports <strong>Wall area</strong> = 320 ft², <strong>Paintable area</strong> = 284 ft², <strong>Paint</strong> = 2.84 gal, <strong>Cans to buy</strong> = 3, <strong>Cost</strong> = 135 $. A dark colour over a light wall: three coats and a heavier hide.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Floor area used as wall area.</strong> The walls are always larger.</li><li><strong>Ceiling left out.</strong> Add length × width if it is being painted.</li><li><strong>Coverage taken from the label.</strong> A textured or bare wall takes far more.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Wall area (ft²), Paintable area (ft²), Paint (gal), Cans to buy, Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Room dimensions in feet, door and window areas in square feet, coverage in square feet per gallon, paint in gallons and cost in dollars.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need room length and room width and wall height and doors and each door and windows and each window and coats and coverage and price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Wall area and paintable area and paint and cans to buy and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Room length</strong> ×10</td><td>352</td><td>2 080</td><td>×5.909</td></tr><tr><td><strong>Room width</strong> ×10</td><td>352</td><td>1 792</td><td>×5.091</td></tr><tr><td><strong>Wall height</strong> ×10</td><td>352</td><td>3 520</td><td>ten times larger</td></tr><tr><td><strong>Doors</strong> ×10</td><td>352</td><td>352</td><td>unchanged</td></tr><tr><td><strong>Each door</strong> ×10</td><td>352</td><td>352</td><td>unchanged</td></tr><tr><td><strong>Windows</strong> ×10</td><td>352</td><td>352</td><td>unchanged</td></tr><tr><td><strong>Each window</strong> ×10</td><td>352</td><td>352</td><td>unchanged</td></tr><tr><td><strong>Coats</strong> ×10</td><td>352</td><td>352</td><td>unchanged</td></tr><tr><td><strong>Coverage</strong> ×10</td><td>352</td><td>352</td><td>unchanged</td></tr><tr><td><strong>Price</strong> ×10</td><td>352</td><td>352</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A rectangular room.</strong> Alcoves, bays and stairwells need their own runs.</li><li><strong>One colour.</strong> Trim, doors and ceiling are separate work.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Buying paint for a room.</li></li><li><li>Pricing a decorating job.</li></li><li><li>Checking a painter's estimate.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/wall-square-footage">Wall square footage</a> <a href="/construction/wallpaper">Wallpaper</a> <a href="/construction/drywall">Drywall</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Paint calculator work out?', 'a' => <<<'TXT'
            It returns wall area and paintable area and paint and cans to buy and cost from room length and room width and wall height and doors and each door and windows and each window and coats and coverage and price. The relationship is 2 × (Room length+Room width) × Wall height.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Room length (ft), Room width (ft), Wall height (ft), Doors, Each door (ft²), Windows, Each window (ft²), Coats, Coverage (ft²/gal), Price ($/gal). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: room length in ft; room width in ft; wall height in ft; each door in ft²; each window in ft²; coverage in ft²/gal; price in $/gal. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much paint for a 12 by 12 room?', 'a' => 'About 2.4 gallons for two coats on an 8 ft ceiling, before openings are taken off.'],
            ['q' => 'How many square feet does a gallon cover?', 'a' => 'About 350 ft² on a smooth sealed wall, and 250 on new plaster.'],
        ],
        'related' => [
            ['path' => '/construction/wall-square-footage', 'name' => 'Wall square footage'],
            ['path' => '/construction/wallpaper', 'name' => 'Wallpaper'],
            ['path' => '/construction/drywall', 'name' => 'Drywall'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

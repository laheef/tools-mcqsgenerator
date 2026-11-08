<?php

/**
 * Decking
 * /construction/decking
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Decking',
    'meta' => ['title' => 'Decking Calculator: Boards, Gaps and Linear Feet', 'description' => 'Work out how many deck boards a deck needs with the gap counted in the coverage, plus the linear feet, the cost and the fixings to order. before you buy.', 'h1' => 'Decking', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'area',
                    'label' => 'Deck area',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '200',
                    'help' => 'The surface to be boarded',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'board_width',
                    'label' => 'Board width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '5.5',
                    'help' => 'A 1 × 6 deck board is 5½ actual',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gap',
                    'label' => 'Gap between boards',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.25',
                    'help' => '¼ in is usual, ⅛ for hardwood',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'board_length',
                    'label' => 'Board length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Stock length you are buying',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Wastage',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'End cuts and culls',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/board',
                    'default' => '14',
                    'help' => 'Per board, delivered',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'boards',
                    'label' => 'Boards',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'linear_feet',
                    'label' => 'Linear feet',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'coverage_per_board',
                    'label' => 'Coverage per board',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
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
            'title' => 'Decking',
            'results' => [
                'boards' => 'ceil(area*144/((board_width+gap)*board_length*12)*(1+waste/100))',
                'linear_feet' => 'ceil(area*144/((board_width+gap)*board_length*12)*(1+waste/100))*board_length',
                'coverage_per_board' => '(board_width+gap)*board_length/12',
                'cost' => 'ceil(area*144/((board_width+gap)*board_length*12)*(1+waste/100))*price',
                'area' => 'boards/(1+waste/100)*(board_width+gap)*board_length/12',
                'board_length' => 'linear_feet/boards',
                'waste' => '(boards/(area*144/((board_width+gap)*board_length*12))-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Deck boards cover their own width plus one gap: <strong>boards = area ÷ ((width + gap) × length)</strong>, times the waste, and the linear feet follow from the count.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A deck is the classic weekend order that comes up two boards short. The reason is the gap: a 5½ in board laid with a ¼ in gap covers 5¾ in, not 6, and on a 200 ft² deck that is a difference of a whole board and a bit.</p><p>The page reports <strong>boards and linear feet and coverage per board and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Boards</strong></td><td><code>ceil(Deck area × 144 ÷ ((Board width+Gap between boards) × Board length × 12) × (1+Wastage ÷ 100))</code></td></tr><tr><td><strong>Linear feet</strong></td><td><code>ceil(Deck area × 144 ÷ ((Board width+Gap between boards) × Board length × 12) × (1+Wastage ÷ 100)) × Board length</code></td></tr><tr><td><strong>Coverage per board</strong></td><td><code>(Board width+Gap between boards) × Board length ÷ 12</code></td></tr><tr><td><strong>Cost</strong></td><td><code>ceil(Deck area × 144 ÷ ((Board width+Gap between boards) × Board length × 12) × (1+Wastage ÷ 100)) × Price</code></td></tr><tr><td><strong>Deck area</strong></td><td><code>Boards ÷ (1+Wastage ÷ 100) × (Board width+Gap between boards) × Board length ÷ 12</code></td></tr><tr><td><strong>Board length</strong></td><td><code>Linear feet ÷ Boards</code></td></tr><tr><td><strong>Wastage</strong></td><td><code>(Boards ÷ (Deck area × 144 ÷ ((Board width+Gap between boards) × Board length × 12))-1) × 100</code></td></tr></tbody></table><p><p>Boards and gaps together make the module — 5.75 in here. Dividing the area by the module times the board length gives the count, and the waste allowance covers the cut at the far end of every row.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports boards and linear feet and coverage per board and cost.</p><ul><li><strong>Deck area</strong> — in ft². The surface to be boarded</li><li><strong>Board width</strong> — in in. A 1 × 6 deck board is 5½ actual</li><li><strong>Gap between boards</strong> — in in. ¼ in is usual, ⅛ for hardwood</li><li><strong>Board length</strong> — in ft. Stock length you are buying</li><li><strong>Wastage</strong> — in %. End cuts and culls</li><li><strong>Price</strong> — in $/board. Per board, delivered</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Boards</strong></li><li><strong>Linear feet</strong> — in ft</li><li><strong>Coverage per board</strong> — in ft²</li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Deck area = 200 ft², Board width = 5.5 in, Gap between boards = 0.25 in, Board length = 12 ft, Wastage = 10 %, Price = 14 $/board — and the results panel reads:</p><ul><li><strong>Boards</strong> = <code>ceil(Deck area × 144 ÷ ((Board width+Gap between boards) × Board length × 12) × (1+Wastage ÷ 100))</code> = <strong>39</strong></li><li><strong>Linear feet</strong> = <code>ceil(Deck area × 144 ÷ ((Board width+Gap between boards) × Board length × 12) × (1+Wastage ÷ 100)) × Board length</code> = <strong>468 ft</strong></li><li><strong>Coverage per board</strong> = <code>(Board width+Gap between boards) × Board length ÷ 12</code> = <strong>5.75 ft²</strong></li><li><strong>Cost</strong> = <code>ceil(Deck area × 144 ÷ ((Board width+Gap between boards) × Board length × 12) × (1+Wastage ÷ 100)) × Price</code> = <strong>546 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil(200 × 144 ÷ ((5.5+0.25) × 12 × 12) × (1+10 ÷ 100)) = 39</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 200 ft² deck in 5½ in boards with ¼ in gaps: each 12 ft board covers 5.75 ft², so the deck takes 35 boards and 39 with ten per cent. That is 468 linear feet, and at $14 a board $546.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the coverage against the board width: the gap adds about four per cent on a 5½ in board and nine per cent on a 3½ in one — which is why narrow boards cost more than their width suggests.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Boards</th><th>Linear feet</th><th>Coverage per board</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Deck area</strong> +10 %</td><td>+10.26 %</td><td>+10.26 %</td><td>+0 %</td><td>+10.26 %</td></tr><tr><td><strong>Board width</strong> +10 %</td><td>−10.26 %</td><td>−10.26 %</td><td>+9.57 %</td><td>−10.26 %</td></tr><tr><td><strong>Gap between boards</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0.43 %</td><td>+0 %</td></tr><tr><td><strong>Board length</strong> +10 %</td><td>−10.26 %</td><td>−1.28 %</td><td>+10 %</td><td>−10.26 %</td></tr><tr><td><strong>Wastage</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Deck area</strong>: a ten per cent move there shifts the result by about 10.3 per cent. The least sensitive is <strong>Wastage</strong>, at 0 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Deck area = 320, Board width = 5.5, Gap between boards = 0.125, Board length = 16, Wastage = 8, Price = 22, the page reports <strong>Boards</strong> = 47, <strong>Linear feet</strong> = 752 ft, <strong>Coverage per board</strong> = 7.5 ft², <strong>Cost</strong> = 1 034 $. A hardwood deck with a tight ⅛ in gap and long boards: fewer joints, fewer wasteful ends.</li><li>With Deck area = 100, Board width = 3.5, Gap between boards = 0.25, Board length = 8, Wastage = 15, Price = 7, the page reports <strong>Boards</strong> = 46, <strong>Linear feet</strong> = 368 ft, <strong>Coverage per board</strong> = 2.5 ft², <strong>Cost</strong> = 322 $. A small porch in narrow boards, where the gaps take a bigger share and the waste runs higher.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Board width used without the gap.</strong> The gap is part of the coverage.</li><li><strong>Nominal width used.</strong> A 1 × 6 is 5½ in, and the difference is a board in twenty.</li><li><strong>Picture-frame borders ignored.</strong> A border changes the board direction and adds cuts.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Boards, Linear feet (ft), Coverage per board (ft²), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Deck area in square feet, board width and gap in inches, board length in feet, the count in whole boards and the cost in dollars at the board price.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need deck area and board width and gap between boards and board length and wastage and price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Boards and linear feet and coverage per board and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Deck area</strong> ×10</td><td>39</td><td>390</td><td>ten times larger</td></tr><tr><td><strong>Board width</strong> ×10</td><td>39</td><td>4</td><td>×0.103</td></tr><tr><td><strong>Gap between boards</strong> ×10</td><td>39</td><td>28</td><td>×0.718</td></tr><tr><td><strong>Board length</strong> ×10</td><td>39</td><td>4</td><td>×0.103</td></tr><tr><td><strong>Wastage</strong> ×10</td><td>39</td><td>70</td><td>×1.795</td></tr><tr><td><strong>Price</strong> ×10</td><td>39</td><td>39</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A rectangular deck.</strong> Angles and diagonal layouts waste more.</li><li><strong>Fixings not counted.</strong> Screws run at about two per joist crossing per board.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering deck boards.</li></li><li><li>Comparing board widths by cost.</li></li><li><li>Budgeting a deck rebuild.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/plywood">Plywood</a> <a href="/construction/deck-stain">Deck stain</a> <a href="/construction/shiplap">Shiplap</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Decking calculator work out?', 'a' => <<<'TXT'
            It returns boards and linear feet and coverage per board and cost from deck area and board width and gap between boards and board length and wastage and price. The relationship is ceil(Deck area × 144 ÷ ((Board width+Gap between boards) × Board length × 12) × (1+Wastage ÷ 100)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Deck area (ft²), Board width (in), Gap between boards (in), Board length (ft), Wastage (%), Price ($/board). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: deck area in ft²; board width in in; gap between boards in in; board length in ft; wastage in %; price in $/board. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many deck boards do I need for 200 square feet?', 'a' => 'About 35 in 12 ft lengths of 5½ in board with a ¼ in gap, and 39 with ten per cent waste.'],
            ['q' => 'What gap should be left between deck boards?', 'a' => 'A quarter inch for softwood, an eighth for hardwood that moves less.'],
        ],
        'related' => [
            ['path' => '/construction/plywood', 'name' => 'Plywood'],
            ['path' => '/construction/deck-stain', 'name' => 'Deck stain'],
            ['path' => '/construction/shiplap', 'name' => 'Shiplap'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Shiplap
 * /construction/shiplap
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Shiplap',
    'meta' => ['title' => 'Shiplap Calculator: Boards, Coverage and Waste', 'description' => 'Work out how many shiplap boards a wall needs once the rebate overlap is taken off the coverage, with the linear feet and the waste to buy. before you order.', 'h1' => 'Shiplap', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'area',
                    'label' => 'Wall area',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '200',
                    'help' => 'The face to be clad',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'board_width',
                    'label' => 'Board width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '6',
                    'help' => 'Full width, edge to edge',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'overlap',
                    'label' => 'Overlap',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '1',
                    'help' => 'The rebate that is hidden',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'board_length',
                    'label' => 'Board length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'help' => 'The length you are buying',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Wastage',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Ends, openings and broken boards',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'exposed_width',
                    'label' => 'Exposed width',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
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
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Shiplap',
            'results' => [
                'exposed_width' => 'board_width-overlap',
                'boards' => 'ceil(area*144/((board_width-overlap)*board_length*12)*(1+waste/100))',
                'linear_feet' => 'ceil(area*144/((board_width-overlap)*board_length*12)*(1+waste/100))*board_length',
                'coverage_per_board' => '(board_width-overlap)*board_length/12',
                'area' => 'boards/(1+waste/100)*(board_width-overlap)*board_length/12',
                'board_length' => 'linear_feet/boards',
                'waste' => '(boards/(area*144/((board_width-overlap)*board_length*12))-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Shiplap overlaps by a rebate, so each board shows less than its width. <strong>Boards = area ÷ (exposed width × length)</strong>, with the lap subtracted first.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Shiplap is the one cladding where the width you buy is not the width that covers: the rebate hides an inch, so a 6 in board lays up as 5 in. Order by the full width and the wall comes up short by a sixth of its boards.</p><p>The page reports <strong>exposed width and boards and linear feet and coverage per board</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Exposed width</strong></td><td><code>Board width-Overlap</code></td></tr><tr><td><strong>Boards</strong></td><td><code>ceil(Wall area × 144 ÷ ((Board width-Overlap) × Board length × 12) × (1+Wastage ÷ 100))</code></td></tr><tr><td><strong>Linear feet</strong></td><td><code>ceil(Wall area × 144 ÷ ((Board width-Overlap) × Board length × 12) × (1+Wastage ÷ 100)) × Board length</code></td></tr><tr><td><strong>Coverage per board</strong></td><td><code>(Board width-Overlap) × Board length ÷ 12</code></td></tr><tr><td><strong>Wall area</strong></td><td><code>Boards ÷ (1+Wastage ÷ 100) × (Board width-Overlap) × Board length ÷ 12</code></td></tr><tr><td><strong>Board length</strong></td><td><code>Linear feet ÷ Boards</code></td></tr><tr><td><strong>Wastage</strong></td><td><code>(Boards ÷ (Wall area × 144 ÷ ((Board width-Overlap) × Board length × 12))-1) × 100</code></td></tr></tbody></table><p><p>The exposed width is the board width minus the overlap, and that is what the area is divided by. Horizontal shiplap wastes more than vertical because every course ends in a cut at the corner.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports exposed width and boards and linear feet and coverage per board.</p><ul><li><strong>Wall area</strong> — in ft². The face to be clad</li><li><strong>Board width</strong> — in in. Full width, edge to edge</li><li><strong>Overlap</strong> — in in. The rebate that is hidden</li><li><strong>Board length</strong> — in ft. The length you are buying</li><li><strong>Wastage</strong> — in %. Ends, openings and broken boards</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Exposed width</strong> — in in</li><li><strong>Boards</strong></li><li><strong>Linear feet</strong> — in ft</li><li><strong>Coverage per board</strong> — in ft²</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Wall area = 200 ft², Board width = 6 in, Overlap = 1 in, Board length = 8 ft, Wastage = 10 % — and the results panel reads:</p><ul><li><strong>Exposed width</strong> = <code>Board width-Overlap</code> = <strong>5 in</strong></li><li><strong>Boards</strong> = <code>ceil(Wall area × 144 ÷ ((Board width-Overlap) × Board length × 12) × (1+Wastage ÷ 100))</code> = <strong>66</strong></li><li><strong>Linear feet</strong> = <code>ceil(Wall area × 144 ÷ ((Board width-Overlap) × Board length × 12) × (1+Wastage ÷ 100)) × Board length</code> = <strong>528 ft</strong></li><li><strong>Coverage per board</strong> = <code>(Board width-Overlap) × Board length ÷ 12</code> = <strong>3.333 ft²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>6-1 = 5</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>200 ft² of wall in 6 in boards overlapping an inch: each 8 ft board covers 3.33 ft², so 60 boards cover the wall before waste and 66 with ten per cent. That is 528 linear feet.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the coverage per board against the board: 3.33 ft² of wall for every 4 ft² of board is the rebate showing up as a fifteen per cent loss. Halving the overlap won't help — the rebate is cut to a fixed depth.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Exposed width</th><th>Boards</th><th>Linear feet</th><th>Coverage per board</th></tr></thead><tbody><tr><td><strong>Wall area</strong> +10 %</td><td>+0 %</td><td>+10.61 %</td><td>+10.61 %</td><td>+0 %</td></tr><tr><td><strong>Board width</strong> +10 %</td><td>+12 %</td><td>−10.61 %</td><td>−10.61 %</td><td>+12 %</td></tr><tr><td><strong>Overlap</strong> +10 %</td><td>−2 %</td><td>+3.03 %</td><td>+3.03 %</td><td>−2 %</td></tr><tr><td><strong>Board length</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Wastage</strong> +10 %</td><td>+0 %</td><td>+1.52 %</td><td>+1.52 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Board width</strong>: a ten per cent move there shifts the result by about 12 per cent. The least sensitive is <strong>Wastage</strong>, at 1.5 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Wall area = 450, Board width = 8, Overlap = 1, Board length = 12, Wastage = 12, the page reports <strong>Exposed width</strong> = 7 in, <strong>Boards</strong> = 72, <strong>Linear feet</strong> = 864 ft, <strong>Coverage per board</strong> = 7 ft². A gable end in wide boards: longer stock covers more, so the count comes down faster than the area grows.</li><li>With Wall area = 120, Board width = 5.5, Overlap = 0.75, Board length = 8, Wastage = 15, the page reports <strong>Exposed width</strong> = 4.75 in, <strong>Boards</strong> = 44, <strong>Linear feet</strong> = 352 ft, <strong>Coverage per board</strong> = 3.167 ft². A small bathroom wall with a lot of cuts: the waste allowance carries the fiddly work.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Full width used as coverage.</strong> The overlap is always hidden.</li><li><strong>Overlap guessed.</strong> Measure the rebate — a half-inch board and an inch board differ.</li><li><strong>Openings not deducted.</strong> Windows and doors take boards out of the count.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Exposed width (in), Boards, Linear feet (ft), Coverage per board (ft²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Wall area in square feet, board width and overlap in inches, board length in feet; the count is whole boards and the linear footage in feet.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need wall area and board width and overlap and board length and wastage. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Exposed width and boards and linear feet and coverage per board should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Wall area</strong> ×10</td><td>5</td><td>5</td><td>unchanged</td></tr><tr><td><strong>Board width</strong> ×10</td><td>5</td><td>59</td><td>×11.8</td></tr><tr><td><strong>Overlap</strong> ×10</td><td>5</td><td>-4</td><td>×-0.8</td></tr><tr><td><strong>Board length</strong> ×10</td><td>5</td><td>5</td><td>unchanged</td></tr><tr><td><strong>Wastage</strong> ×10</td><td>5</td><td>5</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Flat wall.</strong> Corners and rakes add cuts the percentage only partly covers.</li><li><strong>One board size.</strong> A mixed layout needs a line per size.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering shiplap for a wall.</li></li><li><li>Comparing board widths by coverage.</li></li><li><li>Budgeting a feature wall.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/board-and-batten">Board and batten</a> <a href="/construction/siding">Siding</a> <a href="/construction/wainscoting">Wainscoting</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Shiplap calculator work out?', 'a' => <<<'TXT'
            It returns exposed width and boards and linear feet and coverage per board from wall area and board width and overlap and board length and wastage. The relationship is Board width-Overlap.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Wall area (ft²), Board width (in), Overlap (in), Board length (ft), Wastage (%). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: wall area in ft²; board width in in; overlap in in; board length in ft; wastage in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much does a 6 in shiplap board cover?', 'a' => 'Five inches with a one-inch overlap; the rebate is hidden behind the next board.'],
            ['q' => 'Should I add waste for shiplap?', 'a' => 'Yes — ten per cent for a plain wall, fifteen or more where there are openings and corners.'],
        ],
        'related' => [
            ['path' => '/construction/board-and-batten', 'name' => 'Board and batten'],
            ['path' => '/construction/siding', 'name' => 'Siding'],
            ['path' => '/construction/wainscoting', 'name' => 'Wainscoting'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

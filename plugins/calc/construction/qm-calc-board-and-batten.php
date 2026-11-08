<?php

/**
 * Board and batten
 * /construction/board-and-batten
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Board and batten',
    'meta' => ['title' => 'Board and Batten Calculator: Boards and Battens', 'description' => 'Work out the boards, the battens and the linear feet for a board-and-batten wall from the area, board width and batten spacing. with both orders counted.', 'h1' => 'Board and batten', 'updated' => '2026-10-23'],
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
                    'help' => 'Board edge to edge, no overlap',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'batten_width',
                    'label' => 'Batten width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '2',
                    'help' => 'The strip over each joint',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'batten_spacing',
                    'label' => 'Batten spacing',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '16',
                    'help' => 'Centre to centre across the wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'board_length',
                    'label' => 'Board length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'help' => 'Stock length you are buying',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Wastage',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Cuts and culls',
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
                    'name' => 'battens',
                    'label' => 'Battens',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'total_linear',
                    'label' => 'Total linear feet',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'coverage_per_board',
                    'label' => 'Board coverage',
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
            'title' => 'Board and batten',
            'results' => [
                'boards' => 'ceil(area*144/(board_width*board_length*12)*(1+waste/100))',
                'battens' => 'ceil(area*144/(batten_spacing*board_length*12)*(1+waste/100))',
                'total_linear' => '(ceil(area*144/(board_width*board_length*12)*(1+waste/100))+ceil(area*144/(batten_spacing*board_length*12)*(1+waste/100)))*board_length',
                'coverage_per_board' => 'board_width*board_length/12',
                'area' => 'boards/(1+waste/100)*board_width*board_length/12',
                'board_length' => 'total_linear/(boards+battens)',
                'waste' => '(boards/(area*144/(board_width*board_length*12))-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Board and batten is a layer of boards with a narrow strip over every joint: <strong>boards = area ÷ board coverage</strong> and <strong>battens = area ÷ spacing</strong>, each with its own waste.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Board and batten is two orders rolled into one: the boards cover the wall and the battens cover the joints. Count only the boards and the wall comes up an eighth short, because the battens are a separate purchase at a different width.</p><p>The page reports <strong>boards and battens and total linear feet and board coverage</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Boards</strong></td><td><code>ceil(Wall area × 144 ÷ (Board width × Board length × 12) × (1+Wastage ÷ 100))</code></td></tr><tr><td><strong>Battens</strong></td><td><code>ceil(Wall area × 144 ÷ (Batten spacing × Board length × 12) × (1+Wastage ÷ 100))</code></td></tr><tr><td><strong>Total linear feet</strong></td><td><code>(ceil(Wall area × 144 ÷ (Board width × Board length × 12) × (1+Wastage ÷ 100))+ceil(Wall area × 144 ÷ (Batten spacing × Board length × 12) × (1+Wastage ÷ 100))) × Board length</code></td></tr><tr><td><strong>Board coverage</strong></td><td><code>Board width × Board length ÷ 12</code></td></tr><tr><td><strong>Wall area</strong></td><td><code>Boards ÷ (1+Wastage ÷ 100) × Board width × Board length ÷ 12</code></td></tr><tr><td><strong>Board length</strong></td><td><code>Total linear feet ÷ (Boards+Battens)</code></td></tr><tr><td><strong>Wastage</strong></td><td><code>(Boards ÷ (Wall area × 144 ÷ (Board width × Board length × 12))-1) × 100</code></td></tr></tbody></table><p><p>Boards are counted on their full width, because they butt rather than overlap; battens are counted at the spacing, one strip per joint. In practice the board count is set by the batten spacing, so the two totals are linked.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports boards and battens and total linear feet and board coverage.</p><ul><li><strong>Wall area</strong> — in ft². The face to be clad</li><li><strong>Board width</strong> — in in. Board edge to edge, no overlap</li><li><strong>Batten width</strong> — in in. The strip over each joint</li><li><strong>Batten spacing</strong> — in in. Centre to centre across the wall</li><li><strong>Board length</strong> — in ft. Stock length you are buying</li><li><strong>Wastage</strong> — in %. Cuts and culls</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Boards</strong></li><li><strong>Battens</strong></li><li><strong>Total linear feet</strong> — in ft</li><li><strong>Board coverage</strong> — in ft²</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Wall area = 200 ft², Board width = 6 in, Batten width = 2 in, Batten spacing = 16 in, Board length = 8 ft, Wastage = 10 % — and the results panel reads:</p><ul><li><strong>Boards</strong> = <code>ceil(Wall area × 144 ÷ (Board width × Board length × 12) × (1+Wastage ÷ 100))</code> = <strong>55</strong></li><li><strong>Battens</strong> = <code>ceil(Wall area × 144 ÷ (Batten spacing × Board length × 12) × (1+Wastage ÷ 100))</code> = <strong>21</strong></li><li><strong>Total linear feet</strong> = <code>(ceil(Wall area × 144 ÷ (Board width × Board length × 12) × (1+Wastage ÷ 100))+ceil(Wall area × 144 ÷ (Batten spacing × Board length × 12) × (1+Wastage ÷ 100))) × Board length</code> = <strong>608 ft</strong></li><li><strong>Board coverage</strong> = <code>Board width × Board length ÷ 12</code> = <strong>4 ft²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil(200 × 144 ÷ (6 × 8 × 12) × (1+10 ÷ 100)) = 55</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>200 ft² of wall in 6 in boards: 50 boards cover it, 55 with waste. Battens at 16 in centre cover the same area at 19 before waste and 21 after, so the order is 76 pieces — 608 linear feet in 8 ft stock.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the two counts against each other: the battens come to roughly one per buttoned joint, so a ratio near one batten for every two and a half boards is right. Far fewer means the spacing is wider than the board width, which shows a gap between battens.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Boards</th><th>Battens</th><th>Total linear feet</th><th>Board coverage</th></tr></thead><tbody><tr><td><strong>Wall area</strong> +10 %</td><td>+10.91 %</td><td>+9.52 %</td><td>+10.53 %</td><td>+0 %</td></tr><tr><td><strong>Board width</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>−6.58 %</td><td>+10 %</td></tr><tr><td><strong>Batten width</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Batten spacing</strong> +10 %</td><td>+0 %</td><td>−9.52 %</td><td>−2.63 %</td><td>+0 %</td></tr><tr><td><strong>Board length</strong> +10 %</td><td>−9.09 %</td><td>−9.52 %</td><td>−0.13 %</td><td>+10 %</td></tr><tr><td><strong>Wastage</strong> +10 %</td><td>+1.82 %</td><td>+0 %</td><td>+1.32 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Wall area</strong>: a ten per cent move there shifts the result by about 10.9 per cent. The least sensitive is <strong>Batten width</strong>, at 0 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Wall area = 400, Board width = 8, Batten width = 2, Batten spacing = 16, Board length = 12, Wastage = 12, the page reports <strong>Boards</strong> = 56, <strong>Battens</strong> = 28, <strong>Total linear feet</strong> = 1 008 ft, <strong>Board coverage</strong> = 8 ft². A barn wall in wide boards: bigger pieces cover more, so the count grows slower than the area.</li><li>With Wall area = 80, Board width = 5.5, Batten width = 1.5, Batten spacing = 12, Board length = 8, Wastage = 15, the page reports <strong>Boards</strong> = 26, <strong>Battens</strong> = 12, <strong>Total linear feet</strong> = 304 ft, <strong>Board coverage</strong> = 3.667 ft². A small gable in tight spacing: the battens take a much bigger share of the order.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Battens left out of the order.</strong> They are a separate width and a separate count.</li><li><strong>Batten spacing read as the gap.</strong> It is centre to centre.</li><li><strong>Boards overlapping.</strong> Board and batten boards butt; shiplap overlaps, and the two are counted differently.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Boards, Battens, Total linear feet (ft), Board coverage (ft²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Area in square feet, widths and spacing in inches, board length in feet, the counts in whole pieces and the total in linear feet.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need wall area and board width and batten width and batten spacing and board length and wastage. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Boards and battens and total linear feet and board coverage should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Wall area</strong> ×10</td><td>55</td><td>550</td><td>ten times larger</td></tr><tr><td><strong>Board width</strong> ×10</td><td>55</td><td>6</td><td>×0.109</td></tr><tr><td><strong>Batten width</strong> ×10</td><td>55</td><td>55</td><td>unchanged</td></tr><tr><td><strong>Batten spacing</strong> ×10</td><td>55</td><td>55</td><td>unchanged</td></tr><tr><td><strong>Board length</strong> ×10</td><td>55</td><td>6</td><td>×0.109</td></tr><tr><td><strong>Wastage</strong> ×10</td><td>55</td><td>100</td><td>×1.818</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Vertical boarding.</strong> Horizontal board and batten adds a course per board width.</li><li><strong>Openings ignored.</strong> Deduct windows and doors from the area.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering a board-and-batten wall.</li></li><li><li>Comparing batten spacings by material.</li></li><li><li>Budgeting a gable end.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/shiplap">Shiplap</a> <a href="/construction/siding">Siding</a> <a href="/construction/wainscoting">Wainscoting</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Board and batten calculator work out?', 'a' => <<<'TXT'
            It returns boards and battens and total linear feet and board coverage from wall area and board width and batten width and batten spacing and board length and wastage. The relationship is ceil(Wall area × 144 ÷ (Board width × Board length × 12) × (1+Wastage ÷ 100)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Wall area (ft²), Board width (in), Batten width (in), Batten spacing (in), Board length (ft), Wastage (%). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: wall area in ft²; board width in in; batten width in in; batten spacing in in; board length in ft; wastage in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many battens do I need?', 'a' => 'One per joint — the batten spacing sets it, so a 16 in spacing gives roughly one batten for every 16 in of wall width.'],
            ['q' => 'Do the boards overlap in board and batten?', 'a' => 'No. They butt and the batten covers the joint, which is why the board width is used in full.'],
        ],
        'related' => [
            ['path' => '/construction/shiplap', 'name' => 'Shiplap'],
            ['path' => '/construction/siding', 'name' => 'Siding'],
            ['path' => '/construction/wainscoting', 'name' => 'Wainscoting'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

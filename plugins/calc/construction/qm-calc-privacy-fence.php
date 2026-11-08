<?php

/**
 * Privacy fence
 * /construction/privacy-fence
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Privacy fence',
    'meta' => ['title' => 'Privacy Fence Calculator: Boards, Coverage and Cost', 'description' => 'Count the boards a privacy fence needs when each board overlaps the next, see the closed share of the fence and price the boards. The formula is shown.', 'h1' => 'Privacy fence', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Fence length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '80',
                    'help' => 'Straight run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Fence height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '6',
                    'help' => 'Board height',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'board_width',
                    'label' => 'Board width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '5.5',
                    'help' => 'Face width',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'overlap',
                    'label' => 'Board overlap',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.5',
                    'help' => 'Each board over the last',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price per board',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '3',
                    'help' => 'Each board',
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
                    'name' => 'exposure',
                    'label' => 'Exposed width',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'coverage',
                    'label' => 'Closed share',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'board_feet',
                    'label' => 'Board feet',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'bd ft',
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
            'title' => 'Privacy fence',
            'results' => [
                'boards' => 'ceil(length*12/(board_width-overlap))+1',
                'exposure' => 'board_width-overlap',
                'coverage' => 'board_width/(board_width-overlap)*100',
                'board_feet' => 'ceil(length*12/(board_width-overlap)+1)*board_width*height/12',
                'cost' => '(ceil(length*12/(board_width-overlap))+1)*price',
                'length' => '(boards-1)*(board_width-overlap)/12',
                'overlap' => 'board_width-length*12/(boards-1)',
                'board_width' => 'length*12/(boards-1)+overlap',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Exposure = board width − overlap</strong>; <strong>boards = run in inches ÷ exposure + 1</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A privacy fence is not a picket fence with smaller gaps. The boards lap over one another so that no straight line of sight gets through, which means every board covers less than its own width and the count rises accordingly.</p><p>The page reports <strong>boards and exposed width and closed share and board feet and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Boards</strong></td><td><code>ceil(Fence length × 12 ÷ (Board width-Board overlap))+1</code></td></tr><tr><td><strong>Exposed width</strong></td><td><code>Board width-Board overlap</code></td></tr><tr><td><strong>Closed share</strong></td><td><code>Board width ÷ (Board width-Board overlap) × 100</code></td></tr><tr><td><strong>Board feet</strong></td><td><code>ceil(Fence length × 12 ÷ (Board width-Board overlap)+1) × Board width × Fence height ÷ 12</code></td></tr><tr><td><strong>Cost</strong></td><td><code>(ceil(Fence length × 12 ÷ (Board width-Board overlap))+1) × Price per board</code></td></tr><tr><td><strong>Fence length</strong></td><td><code>(Boards-1) × (Board width-Board overlap) ÷ 12</code></td></tr><tr><td><strong>Board overlap</strong></td><td><code>Board width-Fence length × 12 ÷ (Boards-1)</code></td></tr><tr><td><strong>Board width</strong></td><td><code>Fence length × 12 ÷ (Boards-1)+Board overlap</code></td></tr></tbody></table><p><p>The exposed width is the board width less the overlap, and that is the pitch the boards are laid at. Dividing the run in inches by the pitch gives the number of laps, and the closing board adds one. Board feet use the full width, not the exposed width, because that is the timber you pay for.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports boards and exposed width and closed share and board feet and cost.</p><ul><li><strong>Fence length</strong> — in ft. Straight run</li><li><strong>Fence height</strong> — in ft. Board height</li><li><strong>Board width</strong> — in in. Face width</li><li><strong>Board overlap</strong> — in in. Each board over the last</li><li><strong>Price per board</strong> — in $. Each board</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Boards</strong></li><li><strong>Exposed width</strong> — in in</li><li><strong>Closed share</strong> — in %</li><li><strong>Board feet</strong> — in bd ft</li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Fence length = 80 ft, Fence height = 6 ft, Board width = 5.5 in, Board overlap = 0.5 in, Price per board = 3 $ — and the results panel reads:</p><ul><li><strong>Boards</strong> = <code>ceil(Fence length × 12 ÷ (Board width-Board overlap))+1</code> = <strong>193</strong></li><li><strong>Exposed width</strong> = <code>Board width-Board overlap</code> = <strong>5 in</strong></li><li><strong>Closed share</strong> = <code>Board width ÷ (Board width-Board overlap) × 100</code> = <strong>110 %</strong></li><li><strong>Board feet</strong> = <code>ceil(Fence length × 12 ÷ (Board width-Board overlap)+1) × Board width × Fence height ÷ 12</code> = <strong>530.75 bd ft</strong></li><li><strong>Cost</strong> = <code>(ceil(Fence length × 12 ÷ (Board width-Board overlap))+1) × Price per board</code> = <strong>579 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil(80 × 12 ÷ (5.5-0.5))+1 = 193</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>80 ft of 6 ft fence in 5.5 in boards with a 0.5 in lap needs 193 boards at a 5 in exposure, which is 530.75 bd ft of timber and 579 at the price on the form.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the closed share: above a hundred per cent means the boards overlap and no light passes, exactly as intended. A share just over a hundred with a large lap means you are paying for timber you never see.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Boards</th><th>Exposed width</th><th>Closed share</th><th>Board feet</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Fence length</strong> +10 %</td><td>+10.36 %</td><td>+0 %</td><td>+0 %</td><td>+10.36 %</td><td>+10.36 %</td></tr><tr><td><strong>Fence height</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Board width</strong> +10 %</td><td>−9.84 %</td><td>+11 %</td><td>−0.9 %</td><td>−0.83 %</td><td>−9.84 %</td></tr><tr><td><strong>Board overlap</strong> +10 %</td><td>+1.04 %</td><td>−1 %</td><td>+1.01 %</td><td>+1.04 %</td><td>+1.04 %</td></tr><tr><td><strong>Price per board</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Board width</strong>: a ten per cent move there shifts the result by about 11 per cent. The least sensitive is <strong>Board overlap</strong>, at 1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Board width = 3.5, Board overlap = 0.25, the page reports <strong>Boards</strong> = 297, <strong>Exposed width</strong> = 3.25 in, <strong>Closed share</strong> = 107.692 %, <strong>Board feet</strong> = 519.75 bd ft, <strong>Cost</strong> = 891 $. Narrow boards, a small lap: more boards, thinner coverage.</li><li>With Fence length = 120, Board overlap = 1, the page reports <strong>Boards</strong> = 321, <strong>Exposed width</strong> = 4.5 in, <strong>Closed share</strong> = 122.222 %, <strong>Board feet</strong> = 882.75 bd ft, <strong>Cost</strong> = 963 $. A wide lap on a long run: the count climbs quickly.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Overlap entered as a gap.</strong> An overlap of zero is a picket fence.</li><li><strong>Full width used for the pitch.</strong> The lap reduces it.</li><li><strong>Boards bought by the square foot.</strong> They are sold by the piece.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Boards, Exposed width (in), Closed share (%), Board feet (bd ft), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Run and height in feet, board width and overlap in inches, board feet in timber measure.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need fence length and fence height and board width and board overlap and price per board. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Boards and exposed width and closed share and board feet and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Fence length</strong> ×10</td><td>193</td><td>1 921</td><td>×9.953</td></tr><tr><td><strong>Fence height</strong> ×10</td><td>193</td><td>193</td><td>unchanged</td></tr><tr><td><strong>Board width</strong> ×10</td><td>193</td><td>19</td><td>×0.098</td></tr><tr><td><strong>Board overlap</strong> ×10</td><td>193</td><td>1 921</td><td>×9.953</td></tr><tr><td><strong>Price per board</strong> ×10</td><td>193</td><td>193</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Vertical boards.</strong> A horizontal privacy fence counts differently.</li><li><strong>No rails or posts.</strong> Those are on the fence calculator.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering boards for a screen fence.</li></li><li><li>Comparing overlap against cost.</li></li><li><li>Checking how much timber a lap needs.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/board-on-board-fence">Board on board fence</a> <a href="/construction/fence-picket">Fence picket</a> <a href="/construction/wood-fence">Wood fence</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Privacy fence calculator work out?', 'a' => <<<'TXT'
            It returns boards and exposed width and closed share and board feet and cost from fence length and fence height and board width and board overlap and price per board. The relationship is ceil(Fence length × 12 ÷ (Board width-Board overlap))+1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Fence length (ft), Fence height (ft), Board width (in), Board overlap (in), Price per board ($). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: fence length in ft; fence height in ft; board width in in; board overlap in in; price per board in $. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much overlap should a privacy fence have?', 'a' => 'Half an inch to an inch is typical; more overlap closes the fence but costs timber.'],
            ['q' => 'How many boards for 80 feet of privacy fence?', 'a' => 'A hundred and ninety three at five and a half inches with a half inch lap.'],
        ],
        'related' => [
            ['path' => '/construction/board-on-board-fence', 'name' => 'Board on board fence'],
            ['path' => '/construction/fence-picket', 'name' => 'Fence picket'],
            ['path' => '/construction/wood-fence', 'name' => 'Wood fence'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Fence material
 * /construction/fence-material
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fence material',
    'meta' => ['title' => 'Fence Material Calculator: Boards, Posts and Rails', 'description' => 'Turn a fence run into a timber order: the number of vertical boards, the posts, the rail footage and the board feet those boards represent. Units shown.', 'h1' => 'Fence material', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Fence length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '100',
                    'help' => 'Straight run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Fence height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '6',
                    'help' => 'Height of the boards',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'post_spacing',
                    'label' => 'Post spacing',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'help' => 'Centre to centre',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rail_count',
                    'label' => 'Rails per section',
                    'type' => 'number',
                    'default' => '2',
                    'help' => 'Horizontal rails',
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
                    'name' => 'board_gap',
                    'label' => 'Gap between boards',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.25',
                    'help' => 'Daylight between boards',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'board_thickness',
                    'label' => 'Board thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '1',
                    'help' => 'One inch nominal',
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
                    'name' => 'posts',
                    'label' => 'Posts',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rail_ft',
                    'label' => 'Rail length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'board_feet',
                    'label' => 'Board feet',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'bd ft',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Fence material',
            'results' => [
                'boards' => 'ceil(length*12/(board_width+board_gap))+1',
                'posts' => 'ceil(length/post_spacing)+1',
                'rail_ft' => 'ceil(length/post_spacing)*rail_count*post_spacing',
                'board_feet' => 'ceil(length*12/(board_width+board_gap)+1)*board_thickness*board_width*height/12',
                'length' => '(boards-1)*(board_width+board_gap)/12',
                'board_gap' => 'length*12/(boards-1)-board_width',
                'board_width' => 'length*12/(boards-1)-board_gap',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Boards = run in inches ÷ (width + gap) + 1</strong>; <strong>board feet = boards × width × height ÷ 12</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Timber is ordered in board feet, but a fence is built from boards of a fixed width and height, and the two measures do not line up until you know how many boards the run takes. This page does the counting and the conversion in one step.</p><p>The page reports <strong>boards and posts and rail length and board feet</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Boards</strong></td><td><code>ceil(Fence length × 12 ÷ (Board width+Gap between boards))+1</code></td></tr><tr><td><strong>Posts</strong></td><td><code>ceil(Fence length ÷ Post spacing)+1</code></td></tr><tr><td><strong>Rail length</strong></td><td><code>ceil(Fence length ÷ Post spacing) × Rails per section × Post spacing</code></td></tr><tr><td><strong>Board feet</strong></td><td><code>ceil(Fence length × 12 ÷ (Board width+Gap between boards)+1) × Board thickness × Board width × Fence height ÷ 12</code></td></tr><tr><td><strong>Fence length</strong></td><td><code>(Boards-1) × (Board width+Gap between boards) ÷ 12</code></td></tr><tr><td><strong>Gap between boards</strong></td><td><code>Fence length × 12 ÷ (Boards-1)-Board width</code></td></tr><tr><td><strong>Board width</strong></td><td><code>Fence length × 12 ÷ (Boards-1)-Gap between boards</code></td></tr></tbody></table><p><p>The board count is the run in inches divided by one board plus one gap, plus the closing board. Board feet use the true dimensions: thickness times width times length in inches, divided by one hundred and forty-four — with the dividing by twelve already folded in here because the length is the fence height in feet.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 7 boxes and the page has everything it needs. It reports boards and posts and rail length and board feet.</p><ul><li><strong>Fence length</strong> — in ft. Straight run</li><li><strong>Fence height</strong> — in ft. Height of the boards</li><li><strong>Post spacing</strong> — in ft. Centre to centre</li><li><strong>Rails per section</strong>. Horizontal rails</li><li><strong>Board width</strong> — in in. Face width</li><li><strong>Gap between boards</strong> — in in. Daylight between boards</li><li><strong>Board thickness</strong> — in in. One inch nominal</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Boards</strong></li><li><strong>Posts</strong></li><li><strong>Rail length</strong> — in ft</li><li><strong>Board feet</strong> — in bd ft</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Fence length = 100 ft, Fence height = 6 ft, Post spacing = 8 ft, Rails per section = 2, Board width = 5.5 in, Gap between boards = 0.25 in, Board thickness = 1 in — and the results panel reads:</p><ul><li><strong>Boards</strong> = <code>ceil(Fence length × 12 ÷ (Board width+Gap between boards))+1</code> = <strong>210</strong></li><li><strong>Posts</strong> = <code>ceil(Fence length ÷ Post spacing)+1</code> = <strong>14</strong></li><li><strong>Rail length</strong> = <code>ceil(Fence length ÷ Post spacing) × Rails per section × Post spacing</code> = <strong>208 ft</strong></li><li><strong>Board feet</strong> = <code>ceil(Fence length × 12 ÷ (Board width+Gap between boards)+1) × Board thickness × Board width × Fence height ÷ 12</code> = <strong>577.5 bd ft</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil(100 × 12 ÷ (5.5+0.25))+1 = 210</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>100.146 ft of 6 ft fence in 5.5 in boards takes 210 boards, 14 posts and 208 ft of rail. The boards alone come to 577.5 bd ft.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read board feet against boards: a six foot board of nominal five and a half inches is about two and three quarter board feet. A figure far above that means the width has been entered in centimetres.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Boards</th><th>Posts</th><th>Rail length</th><th>Board feet</th></tr></thead><tbody><tr><td><strong>Fence length</strong> +10 %</td><td>+10 %</td><td>+7.14 %</td><td>+7.69 %</td><td>+10 %</td></tr><tr><td><strong>Fence height</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Post spacing</strong> +10 %</td><td>+0 %</td><td>−7.14 %</td><td>+1.54 %</td><td>+0 %</td></tr><tr><td><strong>Rails per section</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Board width</strong> +10 %</td><td>−8.57 %</td><td>+0 %</td><td>+0 %</td><td>+0.57 %</td></tr><tr><td><strong>Gap between boards</strong> +10 %</td><td>−0.48 %</td><td>+0 %</td><td>+0 %</td><td>−0.48 %</td></tr><tr><td><strong>Board thickness</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Fence height</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Gap between boards</strong>, at 0.5 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Fence height = 4, Board width = 3.5, the page reports <strong>Boards</strong> = 321, <strong>Posts</strong> = 14, <strong>Rail length</strong> = 208 ft, <strong>Board feet</strong> = 374.5 bd ft. A low picket fence in narrower boards.</li><li>With Fence length = 160, Rails per section = 3, Gap between boards = 0.5, the page reports <strong>Boards</strong> = 321, <strong>Posts</strong> = 21, <strong>Rail length</strong> = 480 ft, <strong>Board feet</strong> = 882.75 bd ft. A long run with three rails and wider gaps.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Nominal against actual width.</strong> A one by six is five and a half inches.</li><li><strong>Rails left out of the board feet.</strong> They are bought separately.</li><li><strong>No waste.</strong> Add five to ten per cent for cut boards.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Boards, Posts, Rail length (ft), Board feet (bd ft).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Run and height in feet, board dimensions in inches, rail length in feet and board feet in timber measure.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need fence length and fence height and post spacing and rails per section and board width and gap between boards and board thickness. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Boards and posts and rail length and board feet should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Fence length</strong> ×10</td><td>210</td><td>2 091</td><td>×9.957</td></tr><tr><td><strong>Fence height</strong> ×10</td><td>210</td><td>210</td><td>unchanged</td></tr><tr><td><strong>Post spacing</strong> ×10</td><td>210</td><td>210</td><td>unchanged</td></tr><tr><td><strong>Rails per section</strong> ×10</td><td>210</td><td>210</td><td>unchanged</td></tr><tr><td><strong>Board width</strong> ×10</td><td>210</td><td>23</td><td>×0.11</td></tr><tr><td><strong>Gap between boards</strong> ×10</td><td>210</td><td>151</td><td>×0.719</td></tr><tr><td><strong>Board thickness</strong> ×10</td><td>210</td><td>210</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Vertical boards only.</strong> Horizontal cladding needs its own count.</li><li><strong>No rail board feet.</strong> The rail footage is given, not its volume.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering timber for a privacy fence.</li></li><li><li>Converting a board count to board feet.</li></li><li><li>Checking a lumber yard's quote.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/wood-fence">Wood fence</a> <a href="/construction/fence">Fence</a> <a href="/construction/lumber">Lumber</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fence material calculator work out?', 'a' => <<<'TXT'
            It returns boards and posts and rail length and board feet from fence length and fence height and post spacing and rails per section and board width and gap between boards and board thickness. The relationship is ceil(Fence length × 12 ÷ (Board width+Gap between boards))+1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Fence length (ft), Fence height (ft), Post spacing (ft), Rails per section, Board width (in), Gap between boards (in), Board thickness (in). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: fence length in ft; fence height in ft; post spacing in ft; board width in in; gap between boards in in; board thickness in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many boards for a six foot fence?', 'a' => 'About two per foot for a five and a half inch board, so roughly two hundred for a hundred feet.'],
            ['q' => 'How many board feet is one fence board?', 'a' => 'Thickness times width times height, divided by twelve — about 2.75 for a one by six.'],
        ],
        'related' => [
            ['path' => '/construction/wood-fence', 'name' => 'Wood fence'],
            ['path' => '/construction/fence', 'name' => 'Fence'],
            ['path' => '/construction/lumber', 'name' => 'Lumber'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

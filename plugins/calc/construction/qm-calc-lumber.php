<?php

/**
 * Lumber
 * /construction/lumber
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lumber',
    'meta' => ['title' => 'Lumber Calculator: Board Feet, Volume and Cost', 'description' => 'Work out the board feet, cubic feet, linear feet and cost of a stack of lumber from the size of each piece and how many of them you have. before you order.', 'h1' => 'Lumber', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Length of a piece',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'help' => 'Stock length, end to end',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '6',
                    'help' => 'Nominal or actual — be consistent',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'thickness',
                    'label' => 'Thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '2',
                    'help' => '2 for a nominal 2 in',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'quantity',
                    'label' => 'Pieces',
                    'type' => 'number',
                    'default' => '10',
                    'help' => 'How many of this size',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/bf',
                    'default' => '3.5',
                    'help' => 'Board-foot price, or a piece price converted',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume_piece',
                    'label' => 'Volume of one piece',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'total_volume',
                    'label' => 'Total volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'board_feet',
                    'label' => 'Board feet',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'bf',
                ],
                [
                    'name' => 'total_length',
                    'label' => 'Total length',
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
            'title' => 'Lumber',
            'results' => [
                'volume_piece' => 'length*width*thickness/144',
                'total_volume' => 'length*width*thickness/144*quantity',
                'board_feet' => 'length*width*thickness/12*quantity',
                'total_length' => 'length*quantity',
                'cost' => 'length*width*thickness/12*quantity*price',
                'length' => 'total_length/quantity',
                'quantity' => 'total_length/length',
                'width' => '144*volume_piece/(length*thickness)',
                'thickness' => '144*volume_piece/(length*width)',
                'price' => 'cost/board_feet',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Lumber is sold three ways at once: by the piece, by the foot and by the board foot. <strong>Board feet = length × width × thickness ÷ 12</strong>, with the length in feet and the section in inches.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A lumber quote is rarely in the unit you built the takeoff in. The yard prices by the board foot and delivers by the piece; the truck is loaded by the yard of volume and the job is planned in linear feet. Getting from one to the others without losing a factor of twelve is the whole exercise.</p><p>The page reports <strong>volume of one piece and total volume and board feet and total length and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume of one piece</strong></td><td><code>Length of a piece × Width × Thickness ÷ 144</code></td></tr><tr><td><strong>Total volume</strong></td><td><code>Length of a piece × Width × Thickness ÷ 144 × Pieces</code></td></tr><tr><td><strong>Board feet</strong></td><td><code>Length of a piece × Width × Thickness ÷ 12 × Pieces</code></td></tr><tr><td><strong>Total length</strong></td><td><code>Length of a piece × Pieces</code></td></tr><tr><td><strong>Cost</strong></td><td><code>Length of a piece × Width × Thickness ÷ 12 × Pieces × Price</code></td></tr><tr><td><strong>Length of a piece</strong></td><td><code>Total length ÷ Pieces</code></td></tr><tr><td><strong>Pieces</strong></td><td><code>Total length ÷ Length of a piece</code></td></tr><tr><td><strong>Width</strong></td><td><code>144 × Volume of one piece ÷ (Length of a piece × Thickness)</code></td></tr><tr><td><strong>Thickness</strong></td><td><code>144 × Volume of one piece ÷ (Length of a piece × Width)</code></td></tr><tr><td><strong>Price</strong></td><td><code>Cost ÷ Board feet</code></td></tr></tbody></table><p><p>The 12 in the board-foot formula is not a conversion between units the way the 144 is: a board foot is a volume of 144 cubic inches, one square foot an inch thick, so board feet are cubic inches divided by 144 and then multiplied by twelve. Writing it as length × width × thickness ÷ 12 with the length in feet is the same arithmetic in the form carpenters use.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports volume of one piece and total volume and board feet and total length and cost.</p><ul><li><strong>Length of a piece</strong> — in ft. Stock length, end to end</li><li><strong>Width</strong> — in in. Nominal or actual — be consistent</li><li><strong>Thickness</strong> — in in. 2 for a nominal 2 in</li><li><strong>Pieces</strong>. How many of this size</li><li><strong>Price</strong> — in $/bf. Board-foot price, or a piece price converted</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume of one piece</strong> — in ft³</li><li><strong>Total volume</strong> — in ft³</li><li><strong>Board feet</strong> — in bf</li><li><strong>Total length</strong> — in ft</li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Length of a piece = 8 ft, Width = 6 in, Thickness = 2 in, Pieces = 10, Price = 3.5 $/bf — and the results panel reads:</p><ul><li><strong>Volume of one piece</strong> = <code>Length of a piece × Width × Thickness ÷ 144</code> = <strong>0.667 ft³</strong></li><li><strong>Total volume</strong> = <code>Length of a piece × Width × Thickness ÷ 144 × Pieces</code> = <strong>6.667 ft³</strong></li><li><strong>Board feet</strong> = <code>Length of a piece × Width × Thickness ÷ 12 × Pieces</code> = <strong>80 bf</strong></li><li><strong>Total length</strong> = <code>Length of a piece × Pieces</code> = <strong>80 ft</strong></li><li><strong>Cost</strong> = <code>Length of a piece × Width × Thickness ÷ 12 × Pieces × Price</code> = <strong>280 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>8 × 6 × 2 ÷ 144 = 0.667</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Ten pieces of 2 × 6 in 8 ft lengths: each is 8 × 6 × 2 ÷ 12 = 8 board feet, so the stack is 80 board feet and 6.67 ft³ of timber. At $3.50 a board foot that is $280, which is the number to compare against a per-piece price.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the board-foot total against the volume: twelve board feet make a cubic foot, so 80 board feet is 6.67 ft³ and the two boxes agree. They only diverge when the section is entered one way and the price is quoted on another — a nominal 2 × 6 is dressed to 1½ × 5½, and the board-foot price is set on the size the yard actually ships.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume of one piece</th><th>Total volume</th><th>Board feet</th><th>Total length</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Length of a piece</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Thickness</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Pieces</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Price</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Pieces</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Length of a piece = 12, Width = 4, Thickness = 1, Pieces = 40, Price = 2.4, the page reports <strong>Volume of one piece</strong> = 0.333 ft³, <strong>Total volume</strong> = 13.333 ft³, <strong>Board feet</strong> = 160 bf, <strong>Total length</strong> = 480 ft, <strong>Cost</strong> = 384 $. A run of 1 × 4 trim: a small stack that prices by the foot far more often than by the board foot.</li><li>With Length of a piece = 16, Width = 11.25, Thickness = 1.75, Pieces = 6, Price = 4.8, the page reports <strong>Volume of one piece</strong> = 2.188 ft³, <strong>Total volume</strong> = 13.125 ft³, <strong>Board feet</strong> = 157.5 bf, <strong>Total length</strong> = 96 ft, <strong>Cost</strong> = 756 $. Six 2 × 12 joists in 16 ft lengths — the case where the yard will quote per piece and the invoice will show board feet.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Nominal and actual mixed.</strong> A 2 × 6 is 1½ × 5½ dressed; using nominal width for volume and actual for board feet gives two answers for one stack.</li><li><strong>Thickness in quarters ignored.</strong> Rough hardwood is priced in quarter inches — 8/4 is 2 in — and the board-foot figure depends on it.</li><li><strong>Length left in inches.</strong> The formula divides by 12 once; a length in inches makes the answer twelve times too large.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume of one piece (ft³), Total volume (ft³), Board feet (bf), Total length (ft), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Length in feet, width and thickness in inches, volume in cubic feet, board feet as the trade unit — 144 cubic inches — and cost in dollars at the price per board foot.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need length of a piece and width and thickness and pieces and price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Volume of one piece and total volume and board feet and total length and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Length of a piece</strong> ×10</td><td>0.667</td><td>6.667</td><td>ten times larger</td></tr><tr><td><strong>Width</strong> ×10</td><td>0.667</td><td>6.667</td><td>ten times larger</td></tr><tr><td><strong>Thickness</strong> ×10</td><td>0.667</td><td>6.667</td><td>ten times larger</td></tr><tr><td><strong>Pieces</strong> ×10</td><td>0.667</td><td>0.667</td><td>unchanged</td></tr><tr><td><strong>Price</strong> ×10</td><td>0.667</td><td>0.667</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Rectangular stock only.</strong> Mouldings and rounds are priced by the linear foot.</li><li><strong>One size per line.</strong> A mixed order needs a line per size.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a yard's board-foot price against a piece price.</li></li><li><li>Sizing a stack for collection.</li></li><li><li>Converting a cut list into an order.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/board-foot">Board foot</a> <a href="/construction/lumber-weight">Lumber weight</a> <a href="/construction/plywood">Plywood</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lumber calculator work out?', 'a' => <<<'TXT'
            It returns volume of one piece and total volume and board feet and total length and cost from length of a piece and width and thickness and pieces and price. The relationship is Length of a piece × Width × Thickness ÷ 144.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length of a piece (ft), Width (in), Thickness (in), Pieces, Price ($/bf). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: length of a piece in ft; width in in; thickness in in; price in $/bf. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many board feet are in a 2 × 4 × 8?', 'a' => '5⅓ board feet nominal: 8 × 4 × 2 ÷ 12. Priced on actual 1½ × 3½ it is 3½.'],
            ['q' => 'Is a board foot the same as a cubic foot?', 'a' => 'No. A board foot is 144 cubic inches, so there are twelve board feet in a cubic foot.'],
        ],
        'related' => [
            ['path' => '/construction/board-foot', 'name' => 'Board foot'],
            ['path' => '/construction/lumber-weight', 'name' => 'Lumber weight'],
            ['path' => '/construction/plywood', 'name' => 'Plywood'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

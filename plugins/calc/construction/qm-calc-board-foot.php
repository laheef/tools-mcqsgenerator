<?php

/**
 * Board foot
 * /construction/board-foot
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Board foot',
    'meta' => ['title' => 'Board Foot Calculator: Lumber Pricing by Volume', 'description' => 'Turn width, thickness, length and a piece count into board feet and a price, the way a lumber yard quotes hardwood, dressed stock and trim. per board foot.', 'h1' => 'Board foot', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'width',
                    'label' => 'Width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '6',
                    'help' => 'Actual width of the dressed board',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'thickness',
                    'label' => 'Thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '2',
                    'help' => 'In inches, or quarters divided by four',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'length',
                    'label' => 'Length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'help' => 'End to end',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pieces',
                    'label' => 'Pieces',
                    'type' => 'number',
                    'default' => '10',
                    'help' => 'The same size and length',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/bf',
                    'default' => '4',
                    'help' => 'Board-foot price before tax',
                    'rounding' => ['omni', '0.0001'],
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
                    'name' => 'volume_ft3',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
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
            'title' => 'Board foot',
            'results' => [
                'board_feet' => 'width*thickness*length/12*pieces',
                'volume_ft3' => 'width*thickness*length/144*pieces',
                'total_length' => 'length*pieces',
                'cost' => 'width*thickness*length/12*pieces*price',
                'width' => '12*board_feet/(thickness*length*pieces)',
                'thickness' => '12*board_feet/(width*length*pieces)',
                'length' => 'total_length/pieces',
                'pieces' => 'total_length/length',
                'price' => 'cost/board_feet',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A board foot is 144 cubic inches — a foot square and an inch thick. <strong>bf = length(ft) × width(in) × thickness(in) ÷ 12</strong> per piece, times the number of pieces.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Hardwood, and most dressed softwood above a certain grade, is priced by the board foot rather than by the piece. It is a volume unit dressed up as a length unit, which is why the arithmetic trips people up: a long thin board and a short thick one can be the same money.</p><p>The page reports <strong>board feet and volume and total length and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Board feet</strong></td><td><code>Width × Thickness × Length ÷ 12 × Pieces</code></td></tr><tr><td><strong>Volume</strong></td><td><code>Width × Thickness × Length ÷ 144 × Pieces</code></td></tr><tr><td><strong>Total length</strong></td><td><code>Length × Pieces</code></td></tr><tr><td><strong>Cost</strong></td><td><code>Width × Thickness × Length ÷ 12 × Pieces × Price</code></td></tr><tr><td><strong>Width</strong></td><td><code>12 × Board feet ÷ (Thickness × Length × Pieces)</code></td></tr><tr><td><strong>Thickness</strong></td><td><code>12 × Board feet ÷ (Width × Length × Pieces)</code></td></tr><tr><td><strong>Length</strong></td><td><code>Total length ÷ Pieces</code></td></tr><tr><td><strong>Pieces</strong></td><td><code>Total length ÷ Length</code></td></tr><tr><td><strong>Price</strong></td><td><code>Cost ÷ Board feet</code></td></tr></tbody></table><p><p>Dividing by twelve converts the inch dimensions into feet-thicknesses once. The equivalent route — cubic inches divided by 144, then multiplied by twelve — gives exactly the same number, and is worth doing in your head as a check when a quote looks wrong.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports board feet and volume and total length and cost.</p><ul><li><strong>Width</strong> — in in. Actual width of the dressed board</li><li><strong>Thickness</strong> — in in. In inches, or quarters divided by four</li><li><strong>Length</strong> — in ft. End to end</li><li><strong>Pieces</strong>. The same size and length</li><li><strong>Price</strong> — in $/bf. Board-foot price before tax</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Board feet</strong> — in bf</li><li><strong>Volume</strong> — in ft³</li><li><strong>Total length</strong> — in ft</li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Width = 6 in, Thickness = 2 in, Length = 8 ft, Pieces = 10, Price = 4 $/bf — and the results panel reads:</p><ul><li><strong>Board feet</strong> = <code>Width × Thickness × Length ÷ 12 × Pieces</code> = <strong>80 bf</strong></li><li><strong>Volume</strong> = <code>Width × Thickness × Length ÷ 144 × Pieces</code> = <strong>6.667 ft³</strong></li><li><strong>Total length</strong> = <code>Length × Pieces</code> = <strong>80 ft</strong></li><li><strong>Cost</strong> = <code>Width × Thickness × Length ÷ 12 × Pieces × Price</code> = <strong>320 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>6 × 2 × 8 ÷ 12 × 10 = 80</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Ten boards 6 in wide, 2 in thick and 8 ft long come to 80 board feet and 6.67 ft³. At $4 a board foot the stack is $320, and the per-piece price the yard might quote instead is $32.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the board feet against the volume: this pair of results is a direct check, because twelve board feet make a cubic foot. If the two disagree by anything other than a factor of twelve, a dimension is in the wrong unit.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Board feet</th><th>Volume</th><th>Total length</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Thickness</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Pieces</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Width</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Price</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Width = 5.5, Thickness = 1.5, Length = 10, Pieces = 24, Price = 3.2, the page reports <strong>Board feet</strong> = 165 bf, <strong>Volume</strong> = 13.75 ft³, <strong>Total length</strong> = 240 ft, <strong>Cost</strong> = 528 $. A stack of dressed 2 × 6 in ten-foot lengths, priced the way a yard quotes it.</li><li>With Width = 7.25, Thickness = 1.75, Length = 16, Pieces = 40, Price = 5.1, the page reports <strong>Board feet</strong> = 676.667 bf, <strong>Volume</strong> = 56.389 ft³, <strong>Total length</strong> = 640 ft, <strong>Cost</strong> = 3 451 $. Forty 2 × 8 joists: a bigger stack where the board-foot price decides the supplier.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Quarters read as inches.</strong> 4/4 stock is one inch thick, not four.</li><li><strong>Length typed in inches.</strong> A 96 where 8 belongs multiplies the price by twelve.</li><li><strong>Board feet used for sheet goods.</strong> Plywood is sold by the sheet, not by the board foot.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Board feet (bf), Volume (ft³), Total length (ft), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Width and thickness in inches, length in feet, area-independent volume in cubic feet, and the board-foot count in the trade unit of 144 in³.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need width and thickness and length and pieces and price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Board feet and volume and total length and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Width</strong> ×10</td><td>80</td><td>800</td><td>ten times larger</td></tr><tr><td><strong>Thickness</strong> ×10</td><td>80</td><td>800</td><td>ten times larger</td></tr><tr><td><strong>Length</strong> ×10</td><td>80</td><td>800</td><td>ten times larger</td></tr><tr><td><strong>Pieces</strong> ×10</td><td>80</td><td>800</td><td>ten times larger</td></tr><tr><td><strong>Price</strong> ×10</td><td>80</td><td>80</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Rectangular sections.</strong> A moulded profile is priced by its own rules.</li><li><strong>No grade or species.</strong> Both change the price per board foot, not the count.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Pricing hardwood by the board foot.</li></li><li><li>Comparing a piece price with a board-foot price.</li></li><li><li>Checking a yard's invoice.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/lumber">Lumber</a> <a href="/construction/lumber-weight">Lumber weight</a> <a href="/construction/plywood">Plywood</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Board foot calculator work out?', 'a' => <<<'TXT'
            It returns board feet and volume and total length and cost from width and thickness and length and pieces and price. The relationship is Width × Thickness × Length ÷ 12 × Pieces.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Width (in), Thickness (in), Length (ft), Pieces, Price ($/bf). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: width in in; thickness in in; length in ft; price in $/bf. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do you calculate board feet?', 'a' => 'Multiply length in feet by width in inches by thickness in inches and divide by twelve; multiply by the number of pieces.'],
            ['q' => 'How many board feet is a 1 × 6 × 8?', 'a' => 'Four board feet: 8 × 6 × 1 ÷ 12.'],
        ],
        'related' => [
            ['path' => '/construction/lumber', 'name' => 'Lumber'],
            ['path' => '/construction/lumber-weight', 'name' => 'Lumber weight'],
            ['path' => '/construction/plywood', 'name' => 'Plywood'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

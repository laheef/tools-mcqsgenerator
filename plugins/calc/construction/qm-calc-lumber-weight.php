<?php

/**
 * Lumber weight
 * /construction/lumber-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lumber weight',
    'meta' => ['title' => 'Lumber Weight Calculator: Pounds per Piece and Load', 'description' => 'Work out what a stack of lumber weighs from the actual section, the length, the piece count and the species density, in pounds and kilograms. before you load.', 'h1' => 'Lumber weight', 'updated' => '2026-10-23'],
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
                    'help' => 'Actual dressed width',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'thickness',
                    'label' => 'Thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '2',
                    'help' => 'Actual dressed thickness',
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
                    'help' => 'How many',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Density',
                    'type' => 'number',
                    'suffix' => 'lb/ft³',
                    'default' => '32',
                    'help' => '32 softwood, 45 oak, 50 hickory',
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
                    'name' => 'weight_piece',
                    'label' => 'Weight of one piece',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'weight_total',
                    'label' => 'Total weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'weight_kg',
                    'label' => 'Total weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kg',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Lumber weight',
            'results' => [
                'volume_piece' => 'length*width*thickness/144',
                'weight_piece' => 'length*width*thickness/144*density',
                'weight_total' => 'length*width*thickness/144*pieces*density',
                'weight_kg' => 'length*width*thickness/144*pieces*density/2.20462',
                'length' => '144*volume_piece/(width*thickness)',
                'width' => '144*volume_piece/(length*thickness)',
                'thickness' => '144*volume_piece/(length*width)',
                'pieces' => 'weight_total/weight_piece',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Lumber weight is volume times density: <strong>weight = length × width × thickness ÷ 144 × pieces × density</strong>, with density in pounds per cubic foot — about 32 for softwood, 45 for oak.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Weight decides the trailer, the roof rack and the pair of hands at the other end of a 16 ft joist. Lumber is lighter than concrete by a long way, but a stack of it is not light: a 2 × 10 in 16 ft lengths runs about 40 lb a piece in the common softwoods.</p><p>The page reports <strong>volume of one piece and weight of one piece and total weight (lb) and total weight (kg)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume of one piece</strong></td><td><code>Length × Width × Thickness ÷ 144</code></td></tr><tr><td><strong>Weight of one piece</strong></td><td><code>Length × Width × Thickness ÷ 144 × Density</code></td></tr><tr><td><strong>Total weight (lb)</strong></td><td><code>Length × Width × Thickness ÷ 144 × Pieces × Density</code></td></tr><tr><td><strong>Total weight (kg)</strong></td><td><code>Length × Width × Thickness ÷ 144 × Pieces × Density ÷ 2.20462</code></td></tr><tr><td><strong>Length</strong></td><td><code>144 × Volume of one piece ÷ (Width × Thickness)</code></td></tr><tr><td><strong>Width</strong></td><td><code>144 × Volume of one piece ÷ (Length × Thickness)</code></td></tr><tr><td><strong>Thickness</strong></td><td><code>144 × Volume of one piece ÷ (Length × Width)</code></td></tr><tr><td><strong>Pieces</strong></td><td><code>Total weight (lb) ÷ Weight of one piece</code></td></tr></tbody></table><p><p>The 144 converts the inch section and the foot length into cubic feet, and the density in pounds per cubic foot finishes the job. Density is the only term that changes with species, so it is the one to look up rather than guess.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports volume of one piece and weight of one piece and total weight (lb) and total weight (kg).</p><ul><li><strong>Width</strong> — in in. Actual dressed width</li><li><strong>Thickness</strong> — in in. Actual dressed thickness</li><li><strong>Length</strong> — in ft. End to end</li><li><strong>Pieces</strong>. How many</li><li><strong>Density</strong> — in lb/ft³. 32 softwood, 45 oak, 50 hickory</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume of one piece</strong> — in ft³</li><li><strong>Weight of one piece</strong> — in lb</li><li><strong>Total weight</strong> — in lb</li><li><strong>Total weight</strong> — in kg</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Width = 6 in, Thickness = 2 in, Length = 8 ft, Pieces = 10, Density = 32 lb/ft³ — and the results panel reads:</p><ul><li><strong>Volume of one piece</strong> = <code>Length × Width × Thickness ÷ 144</code> = <strong>0.667 ft³</strong></li><li><strong>Weight of one piece</strong> = <code>Length × Width × Thickness ÷ 144 × Density</code> = <strong>21.333 lb</strong></li><li><strong>Total weight</strong> = <code>Length × Width × Thickness ÷ 144 × Pieces × Density</code> = <strong>213.333 lb</strong></li><li><strong>Total weight</strong> = <code>Length × Width × Thickness ÷ 144 × Pieces × Density ÷ 2.20462</code> = <strong>96.766 kg</strong></li></ul><p>With the numbers written into the formula, the first result is <code>8 × 6 × 2 ÷ 144 = 0.667</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Ten 2 × 6 in 8 ft lengths at 32 lb/ft³: each is 0.67 ft³ and weighs 21 lb, so the stack is 213 lb — a trailer rather than a car boot. The same stack in oak is heavier again.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the per-piece weight as the handling question and the total as the transport question. Thirty-five pounds is about the ceiling for one person on a ladder; anything above that is a two-person lift, whatever the total says.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume of one piece</th><th>Weight of one piece</th><th>Total weight</th><th>Total weight</th></tr></thead><tbody><tr><td><strong>Width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Thickness</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Pieces</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Density</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Width</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Density</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Width = 9.25, Thickness = 1.5, Length = 16, Pieces = 20, Density = 32, the page reports <strong>Volume of one piece</strong> = 1.542 ft³, <strong>Weight of one piece</strong> = 49.333 lb, <strong>Total weight</strong> = 986.667 lb, <strong>Total weight</strong> = 447.545 kg. Twenty 2 × 10 joists — the load that decides whether the trailer is big enough.</li><li>With Width = 3.5, Thickness = 1.5, Length = 8, Pieces = 100, Density = 45, the page reports <strong>Volume of one piece</strong> = 0.292 ft³, <strong>Weight of one piece</strong> = 13.125 lb, <strong>Total weight</strong> = 1 312.5 lb, <strong>Total weight</strong> = 595.341 kg. A hundred studs in a dense hardwood, the sort of order that arrives on a pallet and gets weighed.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Nominal size weighed.</strong> A 2 × 6 is 1½ × 5½; weighing the nominal section overstates the load by about a quarter.</li><li><strong>Green timber read as dry.</strong> Fresh softwood can weigh half as much again as kiln-dried.</li><li><strong>Density guessed.</strong> Species run from about 20 to over 60 lb/ft³, so the box matters more than the measurements.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume of one piece (ft³), Weight of one piece (lb), Total weight (lb), Total weight (kg).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Width and thickness in inches, length in feet, volume in cubic feet, weight in pounds and kilograms at the density you enter.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need width and thickness and length and pieces and density. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Volume of one piece and weight of one piece and total weight (lb) and total weight (kg) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Width</strong> ×10</td><td>0.667</td><td>6.667</td><td>ten times larger</td></tr><tr><td><strong>Thickness</strong> ×10</td><td>0.667</td><td>6.667</td><td>ten times larger</td></tr><tr><td><strong>Length</strong> ×10</td><td>0.667</td><td>6.667</td><td>ten times larger</td></tr><tr><td><strong>Pieces</strong> ×10</td><td>0.667</td><td>0.667</td><td>unchanged</td></tr><tr><td><strong>Density</strong> ×10</td><td>0.667</td><td>0.667</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Solid stock.</strong> Engineered lumber has its own published weights.</li><li><strong>Moisture content unmodelled.</strong> Dry density is assumed.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a trailer's capacity.</li></li><li><li>Planning a two-person lift.</li></li><li><li>Estimating freight.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/lumber">Lumber</a> <a href="/construction/board-foot">Board foot</a> <a href="/construction/wood-beam-span">Wood beam span</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lumber weight calculator work out?', 'a' => <<<'TXT'
            It returns volume of one piece and weight of one piece and total weight (lb) and total weight (kg) from width and thickness and length and pieces and density. The relationship is Length × Width × Thickness ÷ 144.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Width (in), Thickness (in), Length (ft), Pieces, Density (lb/ft³). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: width in in; thickness in in; length in ft; density in lb/ft³. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much does a 2 × 4 × 8 weigh?', 'a' => 'About 10 lb in kiln-dried spruce at 1½ × 3½ in, and nearer 13 lb in a denser species.'],
            ['q' => 'How heavy is a cubic foot of lumber?', 'a' => 'Between about 20 and 60 lb depending on species and moisture; 32 lb is a fair softwood figure.'],
        ],
        'related' => [
            ['path' => '/construction/lumber', 'name' => 'Lumber'],
            ['path' => '/construction/board-foot', 'name' => 'Board foot'],
            ['path' => '/construction/wood-beam-span', 'name' => 'Wood beam span'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

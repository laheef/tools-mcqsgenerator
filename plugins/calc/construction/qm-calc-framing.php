<?php

/**
 * Framing
 * /construction/framing
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Framing',
    'meta' => ['title' => 'Framing Calculator: Studs, Plates and Board Feet', 'description' => 'Work out the studs, the plate lengths and the board feet for a stud wall, with the openings counted and the double top plate included. with openings counted.', 'h1' => 'Framing', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'wall_length',
                    'label' => 'Wall length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '20',
                    'help' => 'Along the wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'wall_height',
                    'label' => 'Wall height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '9',
                    'help' => 'Floor to the underside of the ceiling',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'spacing',
                    'label' => 'Stud spacing',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '16',
                    'help' => '16 in centres, or 24',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'openings',
                    'label' => 'Opening width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '0',
                    'help' => 'Doors and windows, for the extra studs',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'stud_width',
                    'label' => 'Stud width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '3.5',
                    'help' => 'Actual 2 × 4 is 3½',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'stud_thickness',
                    'label' => 'Stud thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '1.5',
                    'help' => 'Actual 2 × 4 is 1½',
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
                    'name' => 'studs',
                    'label' => 'Studs',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'plate_length',
                    'label' => 'Plate length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'stud_linear',
                    'label' => 'Stud linear feet',
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
                    'suffix' => 'bf',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Framing',
            'results' => [
                'studs' => 'ceil((wall_length*12/spacing+1+openings*2)*(1+waste/100))',
                'plate_length' => 'wall_length*3',
                'stud_linear' => 'ceil((wall_length*12/spacing+1+openings*2)*(1+waste/100))*wall_height',
                'board_feet' => '(ceil((wall_length*12/spacing+1+openings*2)*(1+waste/100))*wall_height+wall_length*3)*stud_width*stud_thickness/12',
                'wall_length' => 'plate_length/3',
                'wall_height' => 'stud_linear/studs',
                'openings' => '(studs/(1+waste/100)-wall_length*12/spacing-1)/2',
                'waste' => '(studs/(wall_length*12/spacing+1+openings*2)-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A stud wall is counted on centres: <strong>studs = wall length in inches ÷ spacing + 1</strong>, plus the corner and opening studs, times the waste. Plates run the length of the wall, three courses deep.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Framing is the one trade where counting is still the fastest method: a stud every 16 inches, a plate top and bottom, and a trimmer either side of every opening. The calculator does the counting so the order is in studs and board feet at the same time.</p><p>The page reports <strong>studs and plate length and stud linear feet and board feet</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Studs</strong></td><td><code>ceil((Wall length × 12 ÷ Stud spacing+1+Opening width × 2) × (1+Wastage ÷ 100))</code></td></tr><tr><td><strong>Plate length</strong></td><td><code>Wall length × 3</code></td></tr><tr><td><strong>Stud linear feet</strong></td><td><code>ceil((Wall length × 12 ÷ Stud spacing+1+Opening width × 2) × (1+Wastage ÷ 100)) × Wall height</code></td></tr><tr><td><strong>Board feet</strong></td><td><code>(ceil((Wall length × 12 ÷ Stud spacing+1+Opening width × 2) × (1+Wastage ÷ 100)) × Wall height+Wall length × 3) × Stud width × Stud thickness ÷ 12</code></td></tr><tr><td><strong>Wall length</strong></td><td><code>Plate length ÷ 3</code></td></tr><tr><td><strong>Wall height</strong></td><td><code>Stud linear feet ÷ Studs</code></td></tr><tr><td><strong>Opening width</strong></td><td><code>(Studs ÷ (1+Wastage ÷ 100)-Wall length × 12 ÷ Stud spacing-1) ÷ 2</code></td></tr><tr><td><strong>Wastage</strong></td><td><code>(Studs ÷ (Wall length × 12 ÷ Stud spacing+1+Opening width × 2)-1) × 100</code></td></tr></tbody></table><p><p>The plus one is the stud at the far end, which a length divided by spacing does not count. Openings add two studs each — a trimmer on either side — and the waste percentage sits outside the whole count because culls happen to every stud equally.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 7 boxes and the page has everything it needs. It reports studs and plate length and stud linear feet and board feet.</p><ul><li><strong>Wall length</strong> — in ft. Along the wall</li><li><strong>Wall height</strong> — in ft. Floor to the underside of the ceiling</li><li><strong>Stud spacing</strong> — in in. 16 in centres, or 24</li><li><strong>Opening width</strong> — in ft. Doors and windows, for the extra studs</li><li><strong>Stud width</strong> — in in. Actual 2 × 4 is 3½</li><li><strong>Stud thickness</strong> — in in. Actual 2 × 4 is 1½</li><li><strong>Wastage</strong> — in %. Cuts and culls</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Studs</strong></li><li><strong>Plate length</strong> — in ft</li><li><strong>Stud linear feet</strong> — in ft</li><li><strong>Board feet</strong> — in bf</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Wall length = 20 ft, Wall height = 9 ft, Stud spacing = 16 in, Opening width = 0 ft, Stud width = 3.5 in, Stud thickness = 1.5 in, Wastage = 10 % — and the results panel reads:</p><ul><li><strong>Studs</strong> = <code>ceil((Wall length × 12 ÷ Stud spacing+1+Opening width × 2) × (1+Wastage ÷ 100))</code> = <strong>18</strong></li><li><strong>Plate length</strong> = <code>Wall length × 3</code> = <strong>60 ft</strong></li><li><strong>Stud linear feet</strong> = <code>ceil((Wall length × 12 ÷ Stud spacing+1+Opening width × 2) × (1+Wastage ÷ 100)) × Wall height</code> = <strong>162 ft</strong></li><li><strong>Board feet</strong> = <code>(ceil((Wall length × 12 ÷ Stud spacing+1+Opening width × 2) × (1+Wastage ÷ 100)) × Wall height+Wall length × 3) × Stud width × Stud thickness ÷ 12</code> = <strong>97.125 bf</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil((20 × 12 ÷ 16+1+0 × 2) × (1+10 ÷ 100)) = 18</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 20 ft wall 9 ft high on 16 in centres: 16 studs before waste, 18 with ten per cent, and 60 ft of plate for the top, bottom and double top. In 2 × 4 that is 97 board feet of timber and 162 linear feet of stud.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the stud count against the wall length: about one per foot at 16 in centres, and a little more once openings and waste are included. A figure far above that means the spacing box has been read as centimetres.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Studs</th><th>Plate length</th><th>Stud linear feet</th><th>Board feet</th></tr></thead><tbody><tr><td><strong>Wall length</strong> +10 %</td><td>+11.11 %</td><td>+10 %</td><td>+11.11 %</td><td>+10.81 %</td></tr><tr><td><strong>Wall height</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+7.3 %</td></tr><tr><td><strong>Stud spacing</strong> +10 %</td><td>−5.56 %</td><td>+0 %</td><td>−5.56 %</td><td>−4.05 %</td></tr><tr><td><strong>Opening width</strong> +10 %</td><td>+5.56 %</td><td>+0 %</td><td>+5.56 %</td><td>+4.05 %</td></tr><tr><td><strong>Stud width</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Stud thickness</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Wastage</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Wall length</strong>: a ten per cent move there shifts the result by about 11.1 per cent. The least sensitive is <strong>Wastage</strong>, at 0 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Wall length = 32, Wall height = 8, Stud spacing = 24, Opening width = 6, Stud width = 5.5, Stud thickness = 1.5, Wastage = 10, the page reports <strong>Studs</strong> = 32, <strong>Plate length</strong> = 96 ft, <strong>Stud linear feet</strong> = 256 ft, <strong>Board feet</strong> = 242 bf. A long wall on 24 in centres in 2 × 6, the layout a modern code asks for in an exterior wall.</li><li>With Wall length = 12, Wall height = 9, Stud spacing = 16, Opening width = 3, Stud width = 3.5, Stud thickness = 1.5, Wastage = 15, the page reports <strong>Studs</strong> = 19, <strong>Plate length</strong> = 36 ft, <strong>Stud linear feet</strong> = 171 ft, <strong>Board feet</strong> = 90.562 bf. A short interior wall with a door and a window: the openings dominate the count.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The end stud left out.</strong> Sixteen inches into a 20 ft wall is 15 spaces and 16 studs.</li><li><strong>Openings ignored.</strong> Every door and window needs a trimmer each side and a header above.</li><li><strong>Single top plate assumed.</strong> Most walls carry a double top plate, which is why the plate length here is three times the wall length.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Studs, Plate length (ft), Stud linear feet (ft), Board feet (bf).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Wall dimensions in feet, spacing and stud section in inches, the count in whole studs, plates in linear feet and the timber in board feet at the actual section you enter.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need wall length and wall height and stud spacing and opening width and stud width and stud thickness and wastage. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Studs and plate length and stud linear feet and board feet should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Wall length</strong> ×10</td><td>18</td><td>167</td><td>×9.278</td></tr><tr><td><strong>Wall height</strong> ×10</td><td>18</td><td>18</td><td>unchanged</td></tr><tr><td><strong>Stud spacing</strong> ×10</td><td>18</td><td>3</td><td>×0.167</td></tr><tr><td><strong>Opening width</strong> ×10</td><td>18</td><td>22</td><td>×1.222</td></tr><tr><td><strong>Stud width</strong> ×10</td><td>18</td><td>18</td><td>unchanged</td></tr><tr><td><strong>Stud thickness</strong> ×10</td><td>18</td><td>18</td><td>unchanged</td></tr><tr><td><strong>Wastage</strong> ×10</td><td>18</td><td>32</td><td>×1.778</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Straight walls.</strong> Corners, tees and intersections add studs the count does not see.</li><li><strong>No headers.</strong> Header sizing is a separate calculation.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering studs for a partition.</li></li><li><li>Converting a wall takeoff to board feet.</li></li><li><li>Checking a framer's material list.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/floor-joist">Floor joist</a> <a href="/construction/plywood">Plywood</a> <a href="/construction/drywall">Drywall</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Framing calculator work out?', 'a' => <<<'TXT'
            It returns studs and plate length and stud linear feet and board feet from wall length and wall height and stud spacing and opening width and stud width and stud thickness and wastage. The relationship is ceil((Wall length × 12 ÷ Stud spacing+1+Opening width × 2) × (1+Wastage ÷ 100)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Wall length (ft), Wall height (ft), Stud spacing (in), Opening width (ft), Stud width (in), Stud thickness (in), Wastage (%). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: wall length in ft; wall height in ft; stud spacing in in; opening width in ft; stud width in in; stud thickness in in; wastage in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many studs are in a 20 ft wall?', 'a' => 'Sixteen at 16 in centres before openings and waste, plus one either side of each opening.'],
            ['q' => 'How many plates does a stud wall need?', 'a' => 'Three: one bottom plate and a double top plate, so three times the wall length in linear feet.'],
        ],
        'related' => [
            ['path' => '/construction/floor-joist', 'name' => 'Floor joist'],
            ['path' => '/construction/plywood', 'name' => 'Plywood'],
            ['path' => '/construction/drywall', 'name' => 'Drywall'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

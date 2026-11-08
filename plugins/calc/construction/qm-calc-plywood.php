<?php

/**
 * Plywood
 * /construction/plywood
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Plywood',
    'meta' => ['title' => 'Plywood Calculator: Sheets for a Floor or Wall', 'description' => 'Work out how many 4 by 8 sheets a floor, wall or roof needs from its area, with a waste allowance for cuts, offcuts and the last row. with the waste you decide.', 'h1' => 'Plywood', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Area length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '20',
                    'help' => 'The floor or wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Area width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Across it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sheet_length',
                    'label' => 'Sheet length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'help' => 'Eight feet is standard',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sheet_width',
                    'label' => 'Sheet width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '4',
                    'help' => 'Four feet is standard',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Wastage',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Ten per cent covers cuts and damage',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/sheet',
                    'default' => '42',
                    'help' => 'Per sheet, delivered',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area',
                    'label' => 'Area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'sheets',
                    'label' => 'Sheets',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste_area',
                    'label' => 'Waste allowance',
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
            'title' => 'Plywood',
            'results' => [
                'area' => 'length*width',
                'sheets' => 'ceil(length*width*(1+waste/100)/(sheet_length*sheet_width))',
                'waste_area' => 'length*width*waste/100',
                'cost' => 'ceil(length*width*(1+waste/100)/(sheet_length*sheet_width))*price',
                'length' => 'area/width',
                'width' => 'area/length',
                'waste' => '(sheets*sheet_length*sheet_width/area-1)*100',
                'price' => 'cost/sheets',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Plywood is bought by the sheet, so the calculation is area divided by sheet area, rounded up: <strong>sheets = area × (1 + waste) ÷ sheet area</strong>, with a 4 × 8 sheet covering 32 ft².</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Sheets are a packing problem disguised as an area calculation. A 240 ft² floor is 7½ sheets of 4 × 8 by area, but the offcuts rarely tile perfectly, so the order is nine or ten — and a sheet short at the end of the day costs a trip, not a dollar.</p><p>The page reports <strong>area and sheets and waste allowance and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Area</strong></td><td><code>Area length × Area width</code></td></tr><tr><td><strong>Sheets</strong></td><td><code>ceil(Area length × Area width × (1+Wastage ÷ 100) ÷ (Sheet length × Sheet width))</code></td></tr><tr><td><strong>Waste allowance</strong></td><td><code>Area length × Area width × Wastage ÷ 100</code></td></tr><tr><td><strong>Cost</strong></td><td><code>ceil(Area length × Area width × (1+Wastage ÷ 100) ÷ (Sheet length × Sheet width)) × Price</code></td></tr><tr><td><strong>Area length</strong></td><td><code>Area ÷ Area width</code></td></tr><tr><td><strong>Area width</strong></td><td><code>Area ÷ Area length</code></td></tr><tr><td><strong>Wastage</strong></td><td><code>(Sheets × Sheet length × Sheet width ÷ Area-1) × 100</code></td></tr><tr><td><strong>Price</strong></td><td><code>Cost ÷ Sheets</code></td></tr></tbody></table><p><p>The waste percentage is applied to the area before dividing, which is the same as buying the extra sheets up front. A ten per cent allowance is normal for a rectangular room and light for a roof with hips and valleys, where fifteen to twenty is closer.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports area and sheets and waste allowance and cost.</p><ul><li><strong>Area length</strong> — in ft. The floor or wall</li><li><strong>Area width</strong> — in ft. Across it</li><li><strong>Sheet length</strong> — in ft. Eight feet is standard</li><li><strong>Sheet width</strong> — in ft. Four feet is standard</li><li><strong>Wastage</strong> — in %. Ten per cent covers cuts and damage</li><li><strong>Price</strong> — in $/sheet. Per sheet, delivered</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Area</strong> — in ft²</li><li><strong>Sheets</strong></li><li><strong>Waste allowance</strong> — in ft²</li><li><strong>Cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Area length = 20 ft, Area width = 12 ft, Sheet length = 8 ft, Sheet width = 4 ft, Wastage = 10 %, Price = 42 $/sheet — and the results panel reads:</p><ul><li><strong>Area</strong> = <code>Area length × Area width</code> = <strong>240 ft²</strong></li><li><strong>Sheets</strong> = <code>ceil(Area length × Area width × (1+Wastage ÷ 100) ÷ (Sheet length × Sheet width))</code> = <strong>9</strong></li><li><strong>Waste allowance</strong> = <code>Area length × Area width × Wastage ÷ 100</code> = <strong>24 ft²</strong></li><li><strong>Cost</strong> = <code>ceil(Area length × Area width × (1+Wastage ÷ 100) ÷ (Sheet length × Sheet width)) × Price</code> = <strong>378 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>20 × 12 = 240</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 20 × 12 ft floor is 240 ft², which is 8.25 sheets with ten per cent over — nine sheets, at $42 each $378. The waste allowance is 24 ft², most of which ends up as the last row.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the sheet count against the room's dimensions: a room whose width is a multiple of four loses nothing to cuts, while one at 13 ft leaves a foot off every row. That is the difference the waste figure is standing in for.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Area</th><th>Sheets</th><th>Waste allowance</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Area length</strong> +10 %</td><td>+10 %</td><td>+11.11 %</td><td>+10 %</td><td>+11.11 %</td></tr><tr><td><strong>Area width</strong> +10 %</td><td>+10 %</td><td>+11.11 %</td><td>+10 %</td><td>+11.11 %</td></tr><tr><td><strong>Sheet length</strong> +10 %</td><td>+0 %</td><td>−11.11 %</td><td>+0 %</td><td>−11.11 %</td></tr><tr><td><strong>Sheet width</strong> +10 %</td><td>+0 %</td><td>−11.11 %</td><td>+0 %</td><td>−11.11 %</td></tr><tr><td><strong>Wastage</strong> +10 %</td><td>+0 %</td><td>+11.11 %</td><td>+120 %</td><td>+11.11 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Wastage</strong>: a ten per cent move there shifts the result by about 120 per cent. The least sensitive is <strong>Price</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Area length = 12, Area width = 12, Sheet length = 8, Sheet width = 4, Wastage = 15, Price = 38, the page reports <strong>Area</strong> = 144 ft², <strong>Sheets</strong> = 6, <strong>Waste allowance</strong> = 21.6 ft², <strong>Cost</strong> = 228 $. A square room with a diagonal lay: more cutting, so a bigger allowance.</li><li>With Area length = 40, Area width = 24, Sheet length = 8, Sheet width = 4, Wastage = 5, Price = 30, the page reports <strong>Area</strong> = 960 ft², <strong>Sheets</strong> = 32, <strong>Waste allowance</strong> = 48 ft², <strong>Cost</strong> = 960 $. A large rectangular deck, where the sheets run out cleanly and the allowance can come down.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Waste applied to the sheet count.</strong> It belongs on the area, before the division.</li><li><strong>Tongue-and-groove ignored.</strong> T&G sheets lose a little coverage to the joint, and the joints have to land on joists.</li><li><strong>Thickness not in the order.</strong> The area is the same for ⅜ and ¾, but the price and the structure are not.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Area (ft²), Sheets, Waste allowance (ft²), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Area and sheet dimensions in feet, the result in whole sheets, and the cost in dollars at the price per sheet.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need area length and area width and sheet length and sheet width and wastage and price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Area and sheets and waste allowance and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Area length</strong> ×10</td><td>240</td><td>2 400</td><td>ten times larger</td></tr><tr><td><strong>Area width</strong> ×10</td><td>240</td><td>2 400</td><td>ten times larger</td></tr><tr><td><strong>Sheet length</strong> ×10</td><td>240</td><td>240</td><td>unchanged</td></tr><tr><td><strong>Sheet width</strong> ×10</td><td>240</td><td>240</td><td>unchanged</td></tr><tr><td><strong>Wastage</strong> ×10</td><td>240</td><td>240</td><td>unchanged</td></tr><tr><td><strong>Price</strong> ×10</td><td>240</td><td>240</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Area only.</strong> Cutting layout, joist spacing and sheet orientation are not modelled.</li><li><strong>One thickness.</strong> Mixed thicknesses need a line each.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering subfloor for a room.</li></li><li><li>Sizing roof sheathing.</li></li><li><li>Budgeting a wall lining.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/lumber">Lumber</a> <a href="/construction/framing">Framing</a> <a href="/construction/decking">Decking</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Plywood calculator work out?', 'a' => <<<'TXT'
            It returns area and sheets and waste allowance and cost from area length and area width and sheet length and sheet width and wastage and price. The relationship is Area length × Area width.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Area length (ft), Area width (ft), Sheet length (ft), Sheet width (ft), Wastage (%), Price ($/sheet). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: area length in ft; area width in ft; sheet length in ft; sheet width in ft; wastage in %; price in $/sheet. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many square feet is a sheet of plywood?', 'a' => '32 ft² for the standard 4 × 8 sheet.'],
            ['q' => 'How much waste should I allow for plywood?', 'a' => 'Ten per cent for a simple rectangular floor, fifteen to twenty where there are hips, valleys or diagonal layouts.'],
        ],
        'related' => [
            ['path' => '/construction/lumber', 'name' => 'Lumber'],
            ['path' => '/construction/framing', 'name' => 'Framing'],
            ['path' => '/construction/decking', 'name' => 'Decking'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

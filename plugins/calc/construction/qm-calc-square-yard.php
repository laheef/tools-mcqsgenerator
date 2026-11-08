<?php

/**
 * Square yard
 * /construction/square-yard
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Square yard',
    'meta' => ['title' => 'Square Yard Calculator: Area, Perimeter and Cost', 'description' => 'Work out a rectangular area in square yards and square feet from its sides, with the perimeter and the cost at a price per square yard. See the steps.', 'h1' => 'Square yard', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '15',
                    'help' => 'One side',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'The other',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/yd²',
                    'default' => '20',
                    'help' => 'Material per square yard',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area_yd2',
                    'label' => 'Area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd²',
                ],
                [
                    'name' => 'area_ft2',
                    'label' => 'Area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'perimeter',
                    'label' => 'Perimeter',
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
            'title' => 'Square yard',
            'results' => [
                'area_yd2' => 'length*width/9',
                'area_ft2' => 'length*width',
                'perimeter' => '2*(length+width)',
                'cost' => 'length*width/9*price',
                'length' => 'area_ft2/width',
                'width' => 'area_ft2/length',
                'price' => 'cost/area_yd2',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Square yards = length × width ÷ 9</strong>, and the perimeter is twice the sum of the sides.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The square yard is the unit carpet, concrete and topsoil are still sold in across the United States, and it is a ninth of a square foot — a figure that catches out anyone who assumes a yard is three feet and forgets to square it.</p><p>The page reports <strong>area (yd²) and area (ft²) and perimeter and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Area (yd²)</strong></td><td><code>Length × Width ÷ 9</code></td></tr><tr><td><strong>Area (ft²)</strong></td><td><code>Length × Width</code></td></tr><tr><td><strong>Perimeter</strong></td><td><code>2 × (Length+Width)</code></td></tr><tr><td><strong>Cost</strong></td><td><code>Length × Width ÷ 9 × Price</code></td></tr><tr><td><strong>Length</strong></td><td><code>Area (ft²) ÷ Width</code></td></tr><tr><td><strong>Width</strong></td><td><code>Area (ft²) ÷ Length</code></td></tr><tr><td><strong>Price</strong></td><td><code>Cost ÷ Area (yd²)</code></td></tr></tbody></table><p><p>Length times width gives square feet, and nine of those make a square yard. The perimeter is a plain length and stays in feet, which is what a border, edging or skirting is bought in.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports area (yd²) and area (ft²) and perimeter and cost.</p><ul><li><strong>Length</strong> — in ft. One side</li><li><strong>Width</strong> — in ft. The other</li><li><strong>Price</strong> — in $/yd². Material per square yard</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Area</strong> — in yd²</li><li><strong>Area</strong> — in ft²</li><li><strong>Perimeter</strong> — in ft</li><li><strong>Cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Length = 15 ft, Width = 12 ft, Price = 20 $/yd² — and the results panel reads:</p><ul><li><strong>Area</strong> = <code>Length × Width ÷ 9</code> = <strong>20 yd²</strong></li><li><strong>Area</strong> = <code>Length × Width</code> = <strong>180 ft²</strong></li><li><strong>Perimeter</strong> = <code>2 × (Length+Width)</code> = <strong>54 ft</strong></li><li><strong>Cost</strong> = <code>Length × Width ÷ 9 × Price</code> = <strong>400 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>15 × 12 ÷ 9 = 20</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A rectangle 15 by 12 ft is 180 ft² — 20 yd² — with 54 ft around it. At $20 a square yard the material is 400.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the two areas together: nine square feet to one square yard. If they come out close, the dimensions have been entered in yards rather than feet.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Area</th><th>Area</th><th>Perimeter</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+5.56 %</td><td>+10 %</td></tr><tr><td><strong>Width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+4.44 %</td><td>+10 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Width</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Price</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Length = 30, Width = 20, Price = 16, the page reports <strong>Area</strong> = 66.667 yd², <strong>Area</strong> = 600 ft², <strong>Perimeter</strong> = 100 ft, <strong>Cost</strong> = 1 066.667 $. A larger floor where the square yardage is the number on the quote.</li><li>With Length = 9, Width = 9, Price = 25, the page reports <strong>Area</strong> = 9 yd², <strong>Area</strong> = 81 ft², <strong>Perimeter</strong> = 36 ft, <strong>Cost</strong> = 225 $. A nine-foot square, which is exactly nine square yards — a useful check.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Dividing by three instead of nine.</strong> Both dimensions need converting, because a yard of length and a yard of width make nine square feet, not three.</li><li><strong>Perimeter priced as area.</strong> Edging and skirting are bought by the running foot, and that figure stays in feet.</li><li><strong>Waste left out.</strong> Carpet, turf and paving all need an allowance for cuts, and the allowance is applied to the square yardage rather than the square footage.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Area (yd²), Area (ft²), Perimeter (ft), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Dimensions in feet, area in square yards and square feet, perimeter in feet and cost in dollars per square yard.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need length and width and price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Area (yd²) and area (ft²) and perimeter and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Length</strong> ×10</td><td>20</td><td>200</td><td>ten times larger</td></tr><tr><td><strong>Width</strong> ×10</td><td>20</td><td>200</td><td>ten times larger</td></tr><tr><td><strong>Price</strong> ×10</td><td>20</td><td>20</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A rectangle.</strong> Other shapes need their own area worked out first and then converted the same way.</li><li><strong>Plan area only.</strong> A sloping roof, a stair or a cambered drive measures larger than the flat rectangle it plans as.</li><li><strong>No seam allowance.</strong> Carpet and turf are cut from a roll, so the width that divides into the room matters as much as the area.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Buying carpet in square yards.</li></li><li><li>Ordering concrete or topsoil.</li></li><li><li>Converting a square-foot quote.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/square-yards">Square yards</a> <a href="/construction/carpet">Carpet</a> <a href="/construction/square-meter">Square meter</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Square yard calculator work out?', 'a' => 'It returns area (yd²) and area (ft²) and perimeter and cost from length and width and price. The relationship is Length × Width ÷ 9.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (ft), Width (ft), Price ($/yd²). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: length in ft; width in ft; price in $/yd². The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many square feet in a square yard?', 'a' => 'Nine.'],
            ['q' => 'How do I convert square feet to square yards?', 'a' => 'Divide by nine.'],
        ],
        'related' => [
            ['path' => '/construction/square-yards', 'name' => 'Square yards'],
            ['path' => '/construction/carpet', 'name' => 'Carpet'],
            ['path' => '/construction/square-meter', 'name' => 'Square meter'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Metal weight
 * /construction/metal-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Metal weight',
    'meta' => ['title' => 'Metal Weight Calculator: Round, Square and Hex', 'description' => 'Work out a metal bar\'s weight from its section, size and length, for round, square or hexagonal stock in steel, aluminium or brass. The formula is shown.', 'h1' => 'Metal weight', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'size',
                    'label' => 'Size',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '2',
                    'help' => 'Diameter, or across flats',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'factor',
                    'label' => 'Section factor',
                    'type' => 'number',
                    'default' => '0.785',
                    'help' => '0.785 round, 1.000 square, 0.866 hex',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'length',
                    'label' => 'Length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'Length of the piece',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Density',
                    'type' => 'number',
                    'suffix' => 'lb/in³',
                    'default' => '0.2836',
                    'help' => '0.2836 steel, 0.0975 aluminium',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area_in2',
                    'label' => 'Section area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in²',
                ],
                [
                    'name' => 'volume_in3',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in³',
                ],
                [
                    'name' => 'weight_lb',
                    'label' => 'Weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'weight_kg',
                    'label' => 'Weight',
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
            'title' => 'Metal weight',
            'results' => [
                'area_in2' => 'size*size*factor',
                'volume_in3' => 'size*size*factor*length',
                'weight_lb' => 'size*size*factor*length*density',
                'weight_kg' => 'size*size*factor*length*density/2.20462',
                'size' => 'sqrt(area_in2/factor)',
                'factor' => 'area_in2/(size*size)',
                'length' => 'volume_in3/area_in2',
                'density' => 'weight_lb/volume_in3',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Section area times length times density, with the section as <strong>size² × factor</strong>: 0.785 for round, 1.000 for square, 0.866 for hexagon across the flats.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Stock comes in three sections and one job: working out the weight before it is cut. The hexagonal section is the one people look up rather than derive, and 0.866 times the square of the across-flats size is the whole of it.</p><p>The page reports <strong>section area and volume and weight (lb) and weight (kg)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Section area</strong></td><td><code>Size × Size × Section factor</code></td></tr><tr><td><strong>Volume</strong></td><td><code>Size × Size × Section factor × Length</code></td></tr><tr><td><strong>Weight (lb)</strong></td><td><code>Size × Size × Section factor × Length × Density</code></td></tr><tr><td><strong>Weight (kg)</strong></td><td><code>Size × Size × Section factor × Length × Density ÷ 2.20462</code></td></tr><tr><td><strong>Size</strong></td><td><code>√(Section area ÷ Section factor)</code></td></tr><tr><td><strong>Section factor</strong></td><td><code>Section area ÷ (Size × Size)</code></td></tr><tr><td><strong>Length</strong></td><td><code>Volume ÷ Section area</code></td></tr><tr><td><strong>Density</strong></td><td><code>Weight (lb) ÷ Volume</code></td></tr></tbody></table><p><p>For a hexagon, the area is 0.866 times the square of the distance across the flats — not across the corners. The volume in cubic inches times the density gives pounds, and kilograms follow at 2.20462 to the pound.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports section area and volume and weight (lb) and weight (kg).</p><ul><li><strong>Size</strong> — in in. Diameter, or across flats</li><li><strong>Section factor</strong>. 0.785 round, 1.000 square, 0.866 hex</li><li><strong>Length</strong> — in in. Length of the piece</li><li><strong>Density</strong> — in lb/in³. 0.2836 steel, 0.0975 aluminium</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Section area</strong> — in in²</li><li><strong>Volume</strong> — in in³</li><li><strong>Weight</strong> — in lb</li><li><strong>Weight</strong> — in kg</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Size = 2 in, Section factor = 0.785, Length = 12 in, Density = 0.284 lb/in³ — and the results panel reads:</p><ul><li><strong>Section area</strong> = <code>Size × Size × Section factor</code> = <strong>3.14 in²</strong></li><li><strong>Volume</strong> = <code>Size × Size × Section factor × Length</code> = <strong>37.68 in³</strong></li><li><strong>Weight</strong> = <code>Size × Size × Section factor × Length × Density</code> = <strong>10.686 lb</strong></li><li><strong>Weight</strong> = <code>Size × Size × Section factor × Length × Density ÷ 2.20462</code> = <strong>4.847 kg</strong></li></ul><p>With the numbers written into the formula, the first result is <code>2 × 2 × 0.785 = 3.14</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 2 in round bar a foot long is 3.14 in² of section — 37.68 in³ of steel weighing 10.686 lb, or 4.847 kg. In aluminium at 0.0975 the same bar weighs just over a third.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the section area first: round and square of the same nominal size differ by 27 per cent, and the hexagon sits between. A weight that disagrees with a stock table is nearly always the across-corners dimension entered for across-flats.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Section area</th><th>Volume</th><th>Weight</th><th>Weight</th></tr></thead><tbody><tr><td><strong>Size</strong> +10 %</td><td>+21 %</td><td>+21 %</td><td>+21 %</td><td>+21 %</td></tr><tr><td><strong>Section factor</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Length</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Density</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Size</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Density</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Size = 1.5, Section factor = 0.866, Length = 6, Density = 0.284, the page reports <strong>Section area</strong> = 1.948 in², <strong>Volume</strong> = 11.691 in³, <strong>Weight</strong> = 3.316 lb, <strong>Weight</strong> = 1.504 kg. A short hex nut blank: the section area is 0.866 of the square.</li><li>With Size = 2, Section factor = 1, Length = 24, Density = 0.098, the page reports <strong>Section area</strong> = 4 in², <strong>Volume</strong> = 96 in³, <strong>Weight</strong> = 9.36 lb, <strong>Weight</strong> = 4.246 kg. An aluminium square bar — long, but light enough to handle.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Across corners used for a hex.</strong> That is the circumscribed circle, not the flats.</li><li><strong>Mixed units.</strong> Inches for the section, and inches again for the length.</li><li><strong>Tubing entered as solid.</strong> Hollow sections weigh a fraction.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Section area (in²), Volume (in³), Weight (lb), Weight (kg).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Size and length in inches, section in square inches, volume in cubic inches, density per cubic inch, weight in pounds and kilograms.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need size and section factor and length and density. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Section area and volume and weight (lb) and weight (kg) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Size</strong> ×10</td><td>3.14</td><td>314</td><td>×100</td></tr><tr><td><strong>Section factor</strong> ×10</td><td>3.14</td><td>31.4</td><td>ten times larger</td></tr><tr><td><strong>Length</strong> ×10</td><td>3.14</td><td>3.14</td><td>unchanged</td></tr><tr><td><strong>Density</strong> ×10</td><td>3.14</td><td>3.14</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Solid stock.</strong> Tubes, angles and channels need their own areas.</li><li><strong>One alloy.</strong> Density varies by a few per cent.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Weighing stock before cutting.</li></li><li><li>Estimating a scrap value.</li></li><li><li>Balancing a fabrication.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/steel-weight">Steel weight</a> <a href="/construction/aluminum-weight">Aluminium weight</a> <a href="/construction/plate-weight">Plate weight</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Metal weight calculator work out?', 'a' => <<<'TXT'
            It returns section area and volume and weight (lb) and weight (kg) from size and section factor and length and density. The relationship is Size × Size × Section factor.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Size (in), Section factor, Length (in), Density (lb/in³). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: size in in; length in in; density in lb/in³. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I work out the weight of hex bar?', 'a' => '0.866 times the across-flats size squared, times the length, times the density.'],
            ['q' => 'What is the difference between round and square bar weight?', 'a' => 'Square is 27 per cent heavier at the same nominal size, because it encloses more area.'],
        ],
        'related' => [
            ['path' => '/construction/steel-weight', 'name' => 'Steel weight'],
            ['path' => '/construction/aluminum-weight', 'name' => 'Aluminium weight'],
            ['path' => '/construction/plate-weight', 'name' => 'Plate weight'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Glass weight
 * /construction/glass-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Glass weight',
    'meta' => ['title' => 'Glass Weight Calculator by Thickness and Size', 'description' => 'Work out how much a pane of glass weighs from its width, height and thickness, in pounds and kilograms, at 160 pounds to the cubic foot. See the steps.', 'h1' => 'Glass weight', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'width',
                    'label' => 'Width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '36',
                    'help' => 'Pane width',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Height',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '48',
                    'help' => 'Pane height',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'thickness',
                    'label' => 'Thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.25',
                    'help' => '6 mm is about 0.236 in',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'count',
                    'label' => 'Panes',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Same size',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area_ft2',
                    'label' => 'Area each',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'weight_each',
                    'label' => 'Weight each',
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
                    'name' => 'psf',
                    'label' => 'Weight per ft²',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb/ft²',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Glass weight',
            'results' => [
                'area_ft2' => 'width*height/144',
                'weight_each' => 'width*height*thickness*0.092',
                'weight_total' => 'width*height*thickness*0.092*count',
                'psf' => 'thickness*144*0.092',
                'width' => 'weight_each/(height*thickness*0.092)',
                'height' => 'weight_each/(width*thickness*0.092)',
                'thickness' => 'weight_each/(width*height*0.092)',
                'count' => 'weight_total/weight_each',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Weight = width × height × thickness × 0.092</strong>, with all three dimensions in inches and 0.092 the weight of a cubic inch of glass.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Glass is heavier than most people expect: a square metre of 6 mm glass weighs 15 kg, and a large double-glazed unit is a two-person lift with suction cups. The weight decides the glazing bar, the hinge and how many people turn up.</p><p>The page reports <strong>area each and weight each and total weight and weight per ft²</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Area each</strong></td><td><code>Width × Height ÷ 144</code></td></tr><tr><td><strong>Weight each</strong></td><td><code>Width × Height × Thickness × 0.092</code></td></tr><tr><td><strong>Total weight</strong></td><td><code>Width × Height × Thickness × 0.092 × Panes</code></td></tr><tr><td><strong>Weight per ft²</strong></td><td><code>Thickness × 144 × 0.092</code></td></tr><tr><td><strong>Width</strong></td><td><code>Weight each ÷ (Height × Thickness × 0.092)</code></td></tr><tr><td><strong>Height</strong></td><td><code>Weight each ÷ (Width × Thickness × 0.092)</code></td></tr><tr><td><strong>Thickness</strong></td><td><code>Weight each ÷ (Width × Height × 0.092)</code></td></tr><tr><td><strong>Panes</strong></td><td><code>Total weight ÷ Weight each</code></td></tr></tbody></table><p><p>Glass is about 160 lb/ft³, which is 0.092 lb per cubic inch — a little under a third of steel. Double glazing adds a second pane and a spacer, so roughly double the figure for the glass alone.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports area each and weight each and total weight and weight per ft².</p><ul><li><strong>Width</strong> — in in. Pane width</li><li><strong>Height</strong> — in in. Pane height</li><li><strong>Thickness</strong> — in in. 6 mm is about 0.236 in</li><li><strong>Panes</strong>. Same size</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Area each</strong> — in ft²</li><li><strong>Weight each</strong> — in lb</li><li><strong>Total weight</strong> — in lb</li><li><strong>Weight per ft²</strong> — in lb/ft²</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Width = 36 in, Height = 48 in, Thickness = 0.25 in, Panes = 1 — and the results panel reads:</p><ul><li><strong>Area each</strong> = <code>Width × Height ÷ 144</code> = <strong>12 ft²</strong></li><li><strong>Weight each</strong> = <code>Width × Height × Thickness × 0.092</code> = <strong>39.744 lb</strong></li><li><strong>Total weight</strong> = <code>Width × Height × Thickness × 0.092 × Panes</code> = <strong>39.744 lb</strong></li><li><strong>Weight per ft²</strong> = <code>Thickness × 144 × 0.092</code> = <strong>3.312 lb/ft²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>36 × 48 ÷ 144 = 12</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A pane 36 by 48 in at a quarter inch is 12 ft² weighing 39.744 lb — 3.312 lb per square foot. In 6 mm glass the figure is close, because 6 mm is 0.236 in and the density is similar.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the per-square-foot weight against the thickness: 2.5 lb/ft² for every eighth of an inch. A full sheet of quarter-inch glass is about 3.3 lb/ft², which is the number to quote when someone plans to carry a 4 by 8 pane alone.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Area each</th><th>Weight each</th><th>Total weight</th><th>Weight per ft²</th></tr></thead><tbody><tr><td><strong>Width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Height</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Thickness</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Panes</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Thickness</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Panes</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Width = 24, Height = 36, Thickness = 0.375, Panes = 2, the page reports <strong>Area each</strong> = 6 ft², <strong>Weight each</strong> = 29.808 lb, <strong>Total weight</strong> = 59.616 lb, <strong>Weight per ft²</strong> = 4.968 lb/ft². Two thick panes for a shower screen: short and wide, but heavy.</li><li>With Width = 96, Height = 48, Thickness = 0.5, Panes = 1, the page reports <strong>Area each</strong> = 32 ft², <strong>Weight each</strong> = 211.968 lb, <strong>Total weight</strong> = 211.968 lb, <strong>Weight per ft²</strong> = 6.624 lb/ft². A shopfront pane — a crane item, not a lifting item.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Nominal glass thickness.</strong> 6 mm is 0.236 in, not a quarter.</li><li><strong>Double glazing counted once.</strong> Each pane weighs its own.</li><li><strong>Frame weight left out.</strong> Add it for the whole unit.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Area each (ft²), Weight each (lb), Total weight (lb), Weight per ft² (lb/ft²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Dimensions in inches, area in square feet, weight in pounds with a per-square-foot figure.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need width and height and thickness and panes. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Area each and weight each and total weight and weight per ft² should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Width</strong> ×10</td><td>12</td><td>120</td><td>ten times larger</td></tr><tr><td><strong>Height</strong> ×10</td><td>12</td><td>120</td><td>ten times larger</td></tr><tr><td><strong>Thickness</strong> ×10</td><td>12</td><td>12</td><td>unchanged</td></tr><tr><td><strong>Panes</strong> ×10</td><td>12</td><td>12</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Flat glass only.</strong> Laminated and coated glass differs a little.</li><li><strong>Glass weight only.</strong> Frames, seals and spacers are extra.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing a lifting crew.</li></li><li><li>Checking a glazing bar or hinge rating.</li></li><li><li>Estimating freight.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/plate-weight">Plate weight</a> <a href="/construction/metal-weight">Metal weight</a> <a href="/construction/steel-weight">Steel weight</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Glass weight calculator work out?', 'a' => <<<'TXT'
            It returns area each and weight each and total weight and weight per ft² from width and height and thickness and panes. The relationship is Width × Height ÷ 144.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Width (in), Height (in), Thickness (in), Panes. Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: width in in; height in in; thickness in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much does 6 mm glass weigh per square metre?', 'a' => 'About 15 kg, or 3.1 lb per square foot.'],
            ['q' => 'How much does a 36 by 48 quarter-inch pane weigh?', 'a' => 'About 40 lb.'],
        ],
        'related' => [
            ['path' => '/construction/plate-weight', 'name' => 'Plate weight'],
            ['path' => '/construction/metal-weight', 'name' => 'Metal weight'],
            ['path' => '/construction/steel-weight', 'name' => 'Steel weight'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Plate weight
 * /construction/plate-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Plate weight',
    'meta' => ['title' => 'Plate Weight Calculator for Any Metal Sheet', 'description' => 'Work out the weight of a metal plate from its dimensions, thickness and the density of the metal, in pounds and kilograms, for steel, aluminium or copper.', 'h1' => 'Plate weight', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '48',
                    'help' => 'Plate length',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '24',
                    'help' => 'Plate width',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'thickness',
                    'label' => 'Thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.25',
                    'help' => 'Plate thickness',
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
            'title' => 'Plate weight',
            'results' => [
                'volume_in3' => 'length*width*thickness',
                'weight_lb' => 'length*width*thickness*density',
                'weight_kg' => 'length*width*thickness*density/2.20462',
                'psf' => 'thickness*144*density',
                'length' => 'weight_lb/(width*thickness*density)',
                'width' => 'weight_lb/(length*thickness*density)',
                'thickness' => 'weight_lb/(length*width*density)',
                'density' => 'weight_lb/volume_in3',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p><strong>Weight = length × width × thickness × density</strong>, with the density given per cubic inch so steel, aluminium and copper all fit the same formula.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Any plate — steel, aluminium, brass, copper — is the same arithmetic with one number changed. Working from the density per cubic inch keeps the units consistent and lets a mixed order be priced sheet by sheet.</p><p>The page reports <strong>volume and weight (lb) and weight (kg) and weight per ft²</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume</strong></td><td><code>Length × Width × Thickness</code></td></tr><tr><td><strong>Weight (lb)</strong></td><td><code>Length × Width × Thickness × Density</code></td></tr><tr><td><strong>Weight (kg)</strong></td><td><code>Length × Width × Thickness × Density ÷ 2.20462</code></td></tr><tr><td><strong>Weight per ft²</strong></td><td><code>Thickness × 144 × Density</code></td></tr><tr><td><strong>Length</strong></td><td><code>Weight (lb) ÷ (Width × Thickness × Density)</code></td></tr><tr><td><strong>Width</strong></td><td><code>Weight (lb) ÷ (Length × Thickness × Density)</code></td></tr><tr><td><strong>Thickness</strong></td><td><code>Weight (lb) ÷ (Length × Width × Density)</code></td></tr><tr><td><strong>Density</strong></td><td><code>Weight (lb) ÷ Volume</code></td></tr></tbody></table><p><p>The density is per cubic inch rather than per cubic foot so nothing has to be converted twice. Steel is 0.2836, aluminium 0.0975, copper 0.323, brass 0.306 and lead 0.410.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports volume and weight (lb) and weight (kg) and weight per ft².</p><ul><li><strong>Length</strong> — in in. Plate length</li><li><strong>Width</strong> — in in. Plate width</li><li><strong>Thickness</strong> — in in. Plate thickness</li><li><strong>Density</strong> — in lb/in³. 0.2836 steel, 0.0975 aluminium</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume</strong> — in in³</li><li><strong>Weight</strong> — in lb</li><li><strong>Weight</strong> — in kg</li><li><strong>Weight per ft²</strong> — in lb/ft²</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Length = 48 in, Width = 24 in, Thickness = 0.25 in, Density = 0.284 lb/in³ — and the results panel reads:</p><ul><li><strong>Volume</strong> = <code>Length × Width × Thickness</code> = <strong>288 in³</strong></li><li><strong>Weight</strong> = <code>Length × Width × Thickness × Density</code> = <strong>81.677 lb</strong></li><li><strong>Weight</strong> = <code>Length × Width × Thickness × Density ÷ 2.20462</code> = <strong>37.048 kg</strong></li><li><strong>Weight per ft²</strong> = <code>Thickness × 144 × Density</code> = <strong>10.21 lb/ft²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>48 × 24 × 0.25 = 288</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 48 by 24 in plate at a quarter inch is 288 in³ of metal, so 81.677 lb in steel or a third of that in aluminium. The per-square-foot weight is 10.21 lb/ft², which is what a deck or a panel is really judged on.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the per-square-foot weight against the metal: a quarter inch of steel is 10.2 lb/ft², the same thickness of aluminium 3.5. A panel that is too heavy to lift is a panel to roll or to reduce.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume</th><th>Weight</th><th>Weight</th><th>Weight per ft²</th></tr></thead><tbody><tr><td><strong>Length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Thickness</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Density</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Density</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Thickness</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Length = 48, Width = 24, Thickness = 0.125, Density = 0.098, the page reports <strong>Volume</strong> = 144 in³, <strong>Weight</strong> = 14.04 lb, <strong>Weight</strong> = 6.368 kg, <strong>Weight per ft²</strong> = 1.755 lb/ft². An aluminium tread plate cover — a quarter of the weight of steel.</li><li>With Length = 36, Width = 12, Thickness = 0.5, Density = 0.323, the page reports <strong>Volume</strong> = 216 in³, <strong>Weight</strong> = 69.768 lb, <strong>Weight</strong> = 31.646 kg, <strong>Weight per ft²</strong> = 23.256 lb/ft². A heavy copper busbar plate, where density matters more than size.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Density per cubic foot used here.</strong> The box wants per cubic inch.</li><li><strong>Gauge numbers mistaken for inches.</strong> Convert through the gauge table.</li><li><strong>Coating weight added.</strong> Galvanising adds a little, paint almost nothing.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume (in³), Weight (lb), Weight (kg), Weight per ft² (lb/ft²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Dimensions in inches, volume in cubic inches, density in pounds per cubic inch, weight in pounds and kilograms.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need length and width and thickness and density. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Volume and weight (lb) and weight (kg) and weight per ft² should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Length</strong> ×10</td><td>288</td><td>2 880</td><td>ten times larger</td></tr><tr><td><strong>Width</strong> ×10</td><td>288</td><td>2 880</td><td>ten times larger</td></tr><tr><td><strong>Thickness</strong> ×10</td><td>288</td><td>2 880</td><td>ten times larger</td></tr><tr><td><strong>Density</strong> ×10</td><td>288</td><td>288</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Rectangular.</strong> Cut shapes need their own area.</li><li><strong>A single alloy.</strong> Density varies slightly by grade.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Comparing metals by weight.</li></li><li><li>Estimating a fabrication order.</li></li><li><li>Checking a panel can be lifted.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/steel-plate-weight">Steel plate weight</a> <a href="/construction/aluminum-weight">Aluminium weight</a> <a href="/construction/metal-weight">Metal weight</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Plate weight calculator work out?', 'a' => <<<'TXT'
            It returns volume and weight (lb) and weight (kg) and weight per ft² from length and width and thickness and density. The relationship is Length × Width × Thickness.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (in), Width (in), Thickness (in), Density (lb/in³). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: length in in; width in in; thickness in in; density in lb/in³. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I weigh a plate of any metal?', 'a' => 'Multiply the three dimensions in inches, then by the density in lb/in³.'],
            ['q' => 'What is the density of aluminium?', 'a' => 'About 0.0975 lb/in³, or 169 lb/ft³.'],
        ],
        'related' => [
            ['path' => '/construction/steel-plate-weight', 'name' => 'Steel plate weight'],
            ['path' => '/construction/aluminum-weight', 'name' => 'Aluminium weight'],
            ['path' => '/construction/metal-weight', 'name' => 'Metal weight'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

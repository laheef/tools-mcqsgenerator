<?php

/**
 * Concrete cylinder
 * /construction/concrete-cylinder
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Concrete cylinder',
    'meta' => ['title' => 'Concrete Cylinder Calculator: Test Specimens', 'description' => 'Work out the volume and weight of concrete test cylinders, and how many specimens a pour\'s sampling schedule will actually need at each test age. All shown.', 'h1' => 'Concrete cylinder', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'diameter',
                    'label' => 'Cylinder diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '6',
                    'help' => '6 in for standard US specimens',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Cylinder height',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => '12 in, twice the diameter',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'count',
                    'label' => 'Number of cylinders',
                    'type' => 'number',
                    'default' => '3',
                    'help' => 'Three is the usual set: 7, 14 and 28 day',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Concrete density',
                    'type' => 'number',
                    'suffix' => 'lb/ft³',
                    'default' => '150',
                    'help' => '150 for normal-weight concrete',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume_each',
                    'label' => 'Volume per cylinder',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'volume_total',
                    'label' => 'Volume of all cylinders',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'weight_each',
                    'label' => 'Weight per cylinder',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'weight_total',
                    'label' => 'Weight of all cylinders',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Concrete cylinder',
            'results' => [
                'volume_each' => 'pi*pow(diameter/24,2)*height/12',
                'volume_total' => 'pi*pow(diameter/24,2)*height/12*count',
                'weight_each' => 'pi*pow(diameter/24,2)*height/12*density',
                'weight_total' => 'pi*pow(diameter/24,2)*height/12*count*density',
                'diameter' => '24*sqrt(volume_each/(pi*height/12))',
                'height' => 'volume_each*12/(pi*pow(diameter/24,2))',
                'count' => 'volume_total/(pi*pow(diameter/24,2)*height/12)',
                'density' => 'weight_each/(pi*pow(diameter/24,2)*height/12)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A test cylinder is 6 in across and 12 in tall in US practice, which is 0.196 ft³ or 0.00727 yd³ each. <strong>Volume = π·(d/24)²·h</strong>, and the specimens scale with the pour's volume.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Cylinders are how a pour proves its strength. The set size and the volume behind it matter to the testing lab, to the sample's cure weight, and to whether the pour's sampling plan is being met.</p><p>The page reports <strong>volume per cylinder and volume of all cylinders and weight per cylinder and weight of all cylinders</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume per cylinder</strong></td><td><code>pi × (Cylinder diameter ÷ 24)^2 × Cylinder height ÷ 12</code></td></tr><tr><td><strong>Volume of all cylinders</strong></td><td><code>pi × (Cylinder diameter ÷ 24)^2 × Cylinder height ÷ 12 × Number of cylinders</code></td></tr><tr><td><strong>Weight per cylinder</strong></td><td><code>pi × (Cylinder diameter ÷ 24)^2 × Cylinder height ÷ 12 × Concrete density</code></td></tr><tr><td><strong>Weight of all cylinders</strong></td><td><code>pi × (Cylinder diameter ÷ 24)^2 × Cylinder height ÷ 12 × Number of cylinders × Concrete density</code></td></tr><tr><td><strong>Cylinder diameter</strong></td><td><code>24 × √(Volume per cylinder ÷ (pi × Cylinder height ÷ 12))</code></td></tr><tr><td><strong>Cylinder height</strong></td><td><code>Volume per cylinder × 12 ÷ (pi × (Cylinder diameter ÷ 24)^2)</code></td></tr><tr><td><strong>Number of cylinders</strong></td><td><code>Volume of all cylinders ÷ (pi × (Cylinder diameter ÷ 24)^2 × Cylinder height ÷ 12)</code></td></tr><tr><td><strong>Concrete density</strong></td><td><code>Weight per cylinder ÷ (pi × (Cylinder diameter ÷ 24)^2 × Cylinder height ÷ 12)</code></td></tr></tbody></table><p><p>The height is divided by twelve as well, so both dimensions are in feet before multiplying. A 6 × 12 cylinder is 0.196 ft³; the strength test is on the cross-section, 28.3 in², and the volume only matters for the mix and the weight.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports volume per cylinder and volume of all cylinders and weight per cylinder and weight of all cylinders.</p><ul><li><strong>Cylinder diameter</strong> — in in. 6 in for standard US specimens</li><li><strong>Cylinder height</strong> — in in. 12 in, twice the diameter</li><li><strong>Number of cylinders</strong>. Three is the usual set: 7, 14 and 28 day</li><li><strong>Concrete density</strong> — in lb/ft³. 150 for normal-weight concrete</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume per cylinder</strong> — in ft³</li><li><strong>Volume of all cylinders</strong> — in ft³</li><li><strong>Weight per cylinder</strong> — in lb</li><li><strong>Weight of all cylinders</strong> — in lb</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Cylinder diameter = 6 in, Cylinder height = 12 in, Number of cylinders = 3, Concrete density = 150 lb/ft³ — and the results panel reads:</p><ul><li><strong>Volume per cylinder</strong> = <code>pi × (Cylinder diameter ÷ 24)^2 × Cylinder height ÷ 12</code> = <strong>0.196 ft³</strong></li><li><strong>Volume of all cylinders</strong> = <code>pi × (Cylinder diameter ÷ 24)^2 × Cylinder height ÷ 12 × Number of cylinders</code> = <strong>0.589 ft³</strong></li><li><strong>Weight per cylinder</strong> = <code>pi × (Cylinder diameter ÷ 24)^2 × Cylinder height ÷ 12 × Concrete density</code> = <strong>29.452 lb</strong></li><li><strong>Weight of all cylinders</strong> = <code>pi × (Cylinder diameter ÷ 24)^2 × Cylinder height ÷ 12 × Number of cylinders × Concrete density</code> = <strong>88.357 lb</strong></li></ul><p>With the numbers written into the formula, the first result is <code>pi × pow(6 ÷ 24,2) × 12 ÷ 12 = 0.196</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Three 6 × 12 cylinders: 0.196 ft³ each, 0.589 ft³ in total, and at 150 lb/ft³ each weighs 29.4 lb — 88 lb of samples to carry, cure and break.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>A set of three at 7, 14 and 28 days is the minimum for a standard specification; six cylinders, two per age, is what most specifications ask for on a structural pour so a break can fail without losing the age.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume per cylinder</th><th>Volume of all cylinders</th><th>Weight per cylinder</th><th>Weight of all cylinders</th></tr></thead><tbody><tr><td><strong>Cylinder diameter</strong> +10 %</td><td>+21 %</td><td>+21 %</td><td>+21 %</td><td>+21 %</td></tr><tr><td><strong>Cylinder height</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Number of cylinders</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Concrete density</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Cylinder diameter</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Concrete density</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Cylinder diameter = 4, Cylinder height = 8, Number of cylinders = 6, Concrete density = 150, the page reports <strong>Volume per cylinder</strong> = 0.058 ft³, <strong>Volume of all cylinders</strong> = 0.349 ft³, <strong>Weight per cylinder</strong> = 8.727 lb, <strong>Weight of all cylinders</strong> = 52.36 lb. Small 4 × 8 specimens: 0.0582 ft³ each, 8.7 lb, six for 52 lb.</li><li>With Cylinder diameter = 6, Cylinder height = 12, Number of cylinders = 12, Concrete density = 145, the page reports <strong>Volume per cylinder</strong> = 0.196 ft³, <strong>Volume of all cylinders</strong> = 2.356 ft³, <strong>Weight per cylinder</strong> = 28.471 lb, <strong>Weight of all cylinders</strong> = 341.648 lb. Twelve cylinders from a large pour at 145 lb/ft³: 2.35 ft³ and 341 lb of samples.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The height left in inches.</strong> The 12 in the denominator is easy to drop, and a cylinder twelve times too heavy is the result.</li><li><strong>Weight taken as the test load.</strong> The break load is force over area; the weight is only handling.</li><li><strong>Density assumed for heavyweight mixes.</strong> 150 lb/ft³ is normal weight; heavyweight aggregate runs to 180 or more.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume per cylinder (ft³), Volume of all cylinders (ft³), Weight per cylinder (lb), Weight of all cylinders (lb).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Diameter and height are both entered in inches and converted inside, so the volume is in cubic feet and the weight in pounds at the density you give.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need cylinder diameter and cylinder height and number of cylinders and concrete density. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Volume per cylinder and volume of all cylinders and weight per cylinder and weight of all cylinders should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Cylinder diameter</strong> ×10</td><td>0.196</td><td>19.635</td><td>×100</td></tr><tr><td><strong>Cylinder height</strong> ×10</td><td>0.196</td><td>1.963</td><td>ten times larger</td></tr><tr><td><strong>Number of cylinders</strong> ×10</td><td>0.196</td><td>0.196</td><td>unchanged</td></tr><tr><td><strong>Concrete density</strong> ×10</td><td>0.196</td><td>0.196</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Geometry only.</strong> Compaction, curing and the mould's condition are what actually decide the break.</li><li><strong>One size.</strong> A pour tested with both 4 × 8 and 6 × 12 specimens needs two calculations.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing a cylinder set for a pour.</li></li><li><li>Estimating sample weight for transport.</li></li><li><li>Checking a lab's sampling quantity.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/concrete-slab">Concrete slab</a> <a href="/construction/concrete-weight">Concrete weight</a> <a href="/construction/concrete-tube">Concrete tube</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Concrete cylinder calculator work out?', 'a' => <<<'TXT'
            It returns volume per cylinder and volume of all cylinders and weight per cylinder and weight of all cylinders from cylinder diameter and cylinder height and number of cylinders and concrete density. The relationship is pi × (Cylinder diameter ÷ 24)^2 × Cylinder height ÷ 12.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Cylinder diameter (in), Cylinder height (in), Number of cylinders, Concrete density (lb/ft³). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: cylinder diameter in in; cylinder height in in; concrete density in lb/ft³. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why are cylinders twice as tall as they are wide?', 'a' => 'So the failure plane in compression is not influenced by the platens. The 2:1 ratio is what makes the measured strength comparable between labs.'],
            ['q' => 'How many cylinders should a pour have?', 'a' => 'At least three per sample, for 7, 14 and 28 day breaks, and six where the specification wants a spare at each age.'],
        ],
        'related' => [
            ['path' => '/construction/concrete-slab', 'name' => 'Concrete slab'],
            ['path' => '/construction/concrete-weight', 'name' => 'Concrete weight'],
            ['path' => '/construction/concrete-tube', 'name' => 'Concrete tube'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

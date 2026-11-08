<?php

/**
 * Rip rap
 * /construction/rip-rap
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rip rap',
    'meta' => ['title' => 'Rip Rap Calculator: Rock Size and Volume Tool', 'description' => 'Size rip rap rock from the water velocity it must resist, and work out the volume and tonnage needed to cover a bank at a given layer thickness. Units shown.', 'h1' => 'Rip rap', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'velocity',
                    'label' => 'Water velocity',
                    'type' => 'number',
                    'suffix' => 'ft/s',
                    'default' => '8',
                    'help' => 'Approach velocity',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'isbash',
                    'label' => 'Isbash constant',
                    'type' => 'number',
                    'default' => '0.86',
                    'help' => '0.86 turbulent, 1.2 still',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area',
                    'label' => 'Bank area',
                    'type' => 'number',
                    'suffix' => 'ft²',
                    'default' => '500',
                    'help' => 'To be covered',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'thickness',
                    'label' => 'Layer thickness',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '1.5',
                    'help' => 'About twice the rock diameter',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Rock density',
                    'type' => 'number',
                    'suffix' => 'lb/ft³',
                    'default' => '165',
                    'help' => '165 granite, 150 limestone',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rock_in',
                    'label' => 'Rock diameter',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'volume_yd3',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
                ],
                [
                    'name' => 'tons',
                    'label' => 'Weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'tons',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Rip rap',
            'results' => [
                'rock_in' => '12*velocity*velocity/(2*32.174*pow(isbash,2))',
                'volume_yd3' => 'area*thickness/27',
                'tons' => 'area*thickness*density/2000',
                'velocity' => 'sqrt(rock_in/12*2*32.174*pow(isbash,2))',
                'area' => '27*volume_yd3/thickness',
                'thickness' => '27*volume_yd3/area',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p>Isbash gives the stable rock size: <strong>diameter = v² ÷ (2 g C²)</strong>, then the layer volume is area times thickness.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Rip rap fails in one of two ways: the rock is too small and the flood carries it away, or the layer is too thin and the bank washes out beneath it. Sizing the rock to the velocity is the part that cannot be eyeballed, because a doubling of velocity quadruples the size needed.</p><p>The page reports <strong>rock diameter and volume and weight</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Rock diameter</strong></td><td><code>12 × Water velocity × Water velocity ÷ (2 × 32.174 × (Isbash constant)^2)</code></td></tr><tr><td><strong>Volume</strong></td><td><code>Bank area × Layer thickness ÷ 27</code></td></tr><tr><td><strong>Weight</strong></td><td><code>Bank area × Layer thickness × Rock density ÷ 2000</code></td></tr><tr><td><strong>Water velocity</strong></td><td><code>√(Rock diameter ÷ 12 × 2 × 32.174 × (Isbash constant)^2)</code></td></tr><tr><td><strong>Bank area</strong></td><td><code>27 × Volume ÷ Layer thickness</code></td></tr><tr><td><strong>Layer thickness</strong></td><td><code>27 × Volume ÷ Bank area</code></td></tr></tbody></table><p><p>Isbash's relationship sets the stable diameter from the square of the velocity, over twice gravity and the square of the Isbash constant — 0.86 for highly turbulent flow and 1.2 for still water. The layer should be about twice the rock diameter to be self-supporting.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports rock diameter and volume and weight.</p><ul><li><strong>Water velocity</strong> — in ft/s. Approach velocity</li><li><strong>Isbash constant</strong>. 0.86 turbulent, 1.2 still</li><li><strong>Bank area</strong> — in ft². To be covered</li><li><strong>Layer thickness</strong> — in ft. About twice the rock diameter</li><li><strong>Rock density</strong> — in lb/ft³. 165 granite, 150 limestone</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Rock diameter</strong> — in in</li><li><strong>Volume</strong> — in yd³</li><li><strong>Weight</strong> — in tons</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Water velocity = 8 ft/s, Isbash constant = 0.86, Bank area = 500 ft², Layer thickness = 1.5 ft, Rock density = 165 lb/ft³ — and the results panel reads:</p><ul><li><strong>Rock diameter</strong> = <code>12 × Water velocity × Water velocity ÷ (2 × 32.174 × (Isbash constant)^2)</code> = <strong>16.137 in</strong></li><li><strong>Volume</strong> = <code>Bank area × Layer thickness ÷ 27</code> = <strong>27.778 yd³</strong></li><li><strong>Weight</strong> = <code>Bank area × Layer thickness × Rock density ÷ 2000</code> = <strong>61.875 tons</strong></li></ul><p>With the numbers written into the formula, the first result is <code>12 × 8 × 8 ÷ (2 × 32.174 × pow(0.86,2)) = 16.137</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Water at 8 ft/s against a bank of 500 ft² needs rock about 16.137 in across. Laid 1.5 ft thick that is 27.778 yd³ of stone, 61.875 short tons — around three truckloads.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the rock size against the velocity: 8 ft/s gives about sixteen inches and 10 ft/s about two feet, because the size goes with the square of the velocity. Above about 12 ft/s no loose rock is stable and the answer is revetment, not rip rap.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Rock diameter</th><th>Volume</th><th>Weight</th></tr></thead><tbody><tr><td><strong>Water velocity</strong> +10 %</td><td>+21 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Isbash constant</strong> +10 %</td><td>−17.36 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Bank area</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Layer thickness</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Rock density</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Water velocity</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Bank area</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Water velocity = 4, Isbash constant = 1.2, Bank area = 200, Layer thickness = 1, Rock density = 165, the page reports <strong>Rock diameter</strong> = 2.072 in, <strong>Volume</strong> = 7.407 yd³, <strong>Weight</strong> = 16.5 tons. A slow, sheltered bank: small rock in a single layer.</li><li>With Water velocity = 12, Isbash constant = 0.86, Bank area = 800, Layer thickness = 4, Rock density = 165, the page reports <strong>Rock diameter</strong> = 36.309 in, <strong>Volume</strong> = 118.519 yd³, <strong>Weight</strong> = 264 tons. Flood velocity: the rock is boulder size and the layer is a machine job.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Average velocity used.</strong> It is the velocity at the bank, which is faster on the outside of a bend.</li><li><strong>Layer thinner than twice the rock.</strong> It cannot interlock.</li><li><strong>Subgrade ignored.</strong> Soft ground needs a filter layer first.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Rock diameter (in), Volume (yd³), Weight (tons).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Velocity in feet per second, area in square feet, thickness in feet, density in pounds per cubic foot, rock diameter in inches, volume in cubic yards and weight in short tons.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need water velocity and isbash constant and bank area and layer thickness and rock density. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Rock diameter and volume and weight should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Water velocity</strong> ×10</td><td>16.137</td><td>1 613.724</td><td>×100</td></tr><tr><td><strong>Isbash constant</strong> ×10</td><td>16.137</td><td>0.161</td><td>×0.01</td></tr><tr><td><strong>Bank area</strong> ×10</td><td>16.137</td><td>16.137</td><td>unchanged</td></tr><tr><td><strong>Layer thickness</strong> ×10</td><td>16.137</td><td>16.137</td><td>unchanged</td></tr><tr><td><strong>Rock density</strong> ×10</td><td>16.137</td><td>16.137</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Isbash sizing.</strong> It is a design aid, not a substitute for a hydraulic study.</li><li><strong>Angular rock.</strong> Rounded stone interlocks badly and needs to be larger.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing rock for a stream bank.</li></li><li><li>Estimating a revetment order.</li></li><li><li>Checking a culvert outfall.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/river-rock">River rock</a> <a href="/construction/rock">Rock</a> <a href="/construction/gravel">Gravel</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rip rap calculator work out?', 'a' => <<<'TXT'
            It returns rock diameter and volume and weight from water velocity and isbash constant and bank area and layer thickness and rock density. The relationship is 12 × Water velocity × Water velocity ÷ (2 × 32.174 × (Isbash constant)^2).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Water velocity (ft/s), Isbash constant, Bank area (ft²), Layer thickness (ft), Rock density (lb/ft³). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: water velocity in ft/s; bank area in ft²; layer thickness in ft; rock density in lb/ft³. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How big should rip rap be?', 'a' => 'About v² over 2gC²: at 8 ft/s with a 0.86 constant that is about sixteen inches across.'],
            ['q' => 'How thick should a rip rap layer be?', 'a' => 'About twice the diameter of the rock, so it interlocks rather than floats.'],
        ],
        'related' => [
            ['path' => '/construction/river-rock', 'name' => 'River rock'],
            ['path' => '/construction/rock', 'name' => 'Rock'],
            ['path' => '/construction/gravel', 'name' => 'Gravel'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

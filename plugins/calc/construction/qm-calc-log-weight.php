<?php

/**
 * Log weight
 * /construction/log-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Log weight',
    'meta' => ['title' => 'Log Weight Calculator by Diameter and Length', 'description' => 'Estimate a log\'s weight in pounds and tonnes from its small-end diameter, length and a form factor, at the density of the species you are burning. Units shown.', 'h1' => 'Log weight', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'diameter',
                    'label' => 'Small-end diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'Inside the bark',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'length',
                    'label' => 'Log length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'help' => 'End to end',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'form_factor',
                    'label' => 'Form factor',
                    'type' => 'number',
                    'default' => '0.7',
                    'help' => '0.6 to 0.8 for a tapered log',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Density',
                    'type' => 'number',
                    'suffix' => 'lb/ft³',
                    'default' => '40',
                    'help' => '40 green oak, 30 pine, 25 dry',
                    'rounding' => ['omni', '0.0001'],
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
                    'name' => 'tons',
                    'label' => 'Weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'short tons',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Log weight',
            'results' => [
                'volume_ft3' => 'pi/4*pow(diameter/12,2)*length*form_factor',
                'weight_lb' => 'pi/4*pow(diameter/12,2)*length*form_factor*density',
                'weight_kg' => 'pi/4*pow(diameter/12,2)*length*form_factor*density/2.20462',
                'tons' => 'pi/4*pow(diameter/12,2)*length*form_factor*density/2000',
                'diameter' => '12*sqrt(volume_ft3/(pi/4*length*form_factor))',
                'length' => 'volume_ft3/(pi/4*pow(diameter/12,2)*form_factor)',
                'form_factor' => 'volume_ft3/(pi/4*pow(diameter/12,2)*length)',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Volume = π/4 × (diameter ÷ 12)² × length × form factor</strong>, then volume times density. The form factor allows for the taper.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The weight of a log decides whether it goes in a trailer, a pickup or a skid steer. Timber is bought by volume and weighed by the ton, and the gap between green and dry wood is bigger than the gap between most species.</p><p>The page reports <strong>volume and weight (lb) and weight (kg) and weight (short tons)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume</strong></td><td><code>pi ÷ 4 × (Small-end diameter ÷ 12)^2 × Log length × Form factor</code></td></tr><tr><td><strong>Weight (lb)</strong></td><td><code>pi ÷ 4 × (Small-end diameter ÷ 12)^2 × Log length × Form factor × Density</code></td></tr><tr><td><strong>Weight (kg)</strong></td><td><code>pi ÷ 4 × (Small-end diameter ÷ 12)^2 × Log length × Form factor × Density ÷ 2.20462</code></td></tr><tr><td><strong>Weight (short tons)</strong></td><td><code>pi ÷ 4 × (Small-end diameter ÷ 12)^2 × Log length × Form factor × Density ÷ 2000</code></td></tr><tr><td><strong>Small-end diameter</strong></td><td><code>12 × √(Volume ÷ (pi ÷ 4 × Log length × Form factor))</code></td></tr><tr><td><strong>Log length</strong></td><td><code>Volume ÷ (pi ÷ 4 × (Small-end diameter ÷ 12)^2 × Form factor)</code></td></tr><tr><td><strong>Form factor</strong></td><td><code>Volume ÷ (pi ÷ 4 × (Small-end diameter ÷ 12)^2 × Log length)</code></td></tr></tbody></table><p><p>The small-end diameter is measured inside the bark, and the form factor of about 0.7 accounts for the cone-shape taper — a true cylinder would overstate the volume by a third. Green hardwood is about 40 to 55 lb/ft³; seasoned wood drops to the high twenties.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports volume and weight (lb) and weight (kg) and weight (short tons).</p><ul><li><strong>Small-end diameter</strong> — in in. Inside the bark</li><li><strong>Log length</strong> — in ft. End to end</li><li><strong>Form factor</strong>. 0.6 to 0.8 for a tapered log</li><li><strong>Density</strong> — in lb/ft³. 40 green oak, 30 pine, 25 dry</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume</strong> — in ft³</li><li><strong>Weight</strong> — in lb</li><li><strong>Weight</strong> — in kg</li><li><strong>Weight</strong> — in short tons</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Small-end diameter = 12 in, Log length = 8 ft, Form factor = 0.7, Density = 40 lb/ft³ — and the results panel reads:</p><ul><li><strong>Volume</strong> = <code>pi ÷ 4 × (Small-end diameter ÷ 12)^2 × Log length × Form factor</code> = <strong>4.398 ft³</strong></li><li><strong>Weight</strong> = <code>pi ÷ 4 × (Small-end diameter ÷ 12)^2 × Log length × Form factor × Density</code> = <strong>175.929 lb</strong></li><li><strong>Weight</strong> = <code>pi ÷ 4 × (Small-end diameter ÷ 12)^2 × Log length × Form factor × Density ÷ 2.20462</code> = <strong>79.8 kg</strong></li><li><strong>Weight</strong> = <code>pi ÷ 4 × (Small-end diameter ÷ 12)^2 × Log length × Form factor × Density ÷ 2000</code> = <strong>0.088 short tons</strong></li></ul><p>With the numbers written into the formula, the first result is <code>pi ÷ 4 × pow(12 ÷ 12,2) × 8 × 0.7 = 4.398</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 12 in log 8 ft long at a form factor of 0.7 holds 4.398 ft³, and at 40 lb/ft³ that is 175.929 lb — 79.8 kg, or 0.088 short tons. Dry firewood of the same size would weigh about two thirds as much.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the tonnage against the vehicle: a half-ton pickup takes about half a cord of dry hardwood, which is around a ton. If the weight says two tons, the trailer suspension and the brakes need to agree.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume</th><th>Weight</th><th>Weight</th><th>Weight</th></tr></thead><tbody><tr><td><strong>Small-end diameter</strong> +10 %</td><td>+21 %</td><td>+21 %</td><td>+21 %</td><td>+21 %</td></tr><tr><td><strong>Log length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Form factor</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Density</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Small-end diameter</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Density</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Small-end diameter = 18, Log length = 10, Form factor = 0.75, Density = 50, the page reports <strong>Volume</strong> = 13.254 ft³, <strong>Weight</strong> = 662.68 lb, <strong>Weight</strong> = 300.587 kg, <strong>Weight</strong> = 0.331 short tons. A green hardwood saw log: the density is the season's biggest uncertainty.</li><li>With Small-end diameter = 8, Log length = 4, Form factor = 0.65, Density = 30, the page reports <strong>Volume</strong> = 0.908 ft³, <strong>Weight</strong> = 27.227 lb, <strong>Weight</strong> = 12.35 kg, <strong>Weight</strong> = 0.014 short tons. A short, small bolt of seasoned softwood — carryable, just.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Large-end diameter measured.</strong> The small end sets the volume.</li><li><strong>Bark counted.</strong> It is lighter and burns badly.</li><li><strong>Green density used for seasoned wood.</strong> The weight is overstated by a third.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume (ft³), Weight (lb), Weight (kg), Weight (short tons).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Diameter in inches, length in feet, volume in cubic feet, density in pounds per cubic foot, weight in pounds, kilograms and short tons.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need small-end diameter and log length and form factor and density. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Volume and weight (lb) and weight (kg) and weight (short tons) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Small-end diameter</strong> ×10</td><td>4.398</td><td>439.823</td><td>×100</td></tr><tr><td><strong>Log length</strong> ×10</td><td>4.398</td><td>43.982</td><td>ten times larger</td></tr><tr><td><strong>Form factor</strong> ×10</td><td>4.398</td><td>43.982</td><td>ten times larger</td></tr><tr><td><strong>Density</strong> ×10</td><td>4.398</td><td>4.398</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A tapered cylinder.</strong> Crooked and forked logs need a volume table.</li><li><strong>Density is species and moisture.</strong> It is the biggest single source of error.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Loading a trailer within its rating.</li></li><li><li>Estimating firewood weight.</li></li><li><li>Pricing timber by weight.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/lumber-weight">Lumber weight</a> <a href="/construction/lumber">Lumber</a> <a href="/construction/board-foot">Board foot</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Log weight calculator work out?', 'a' => <<<'TXT'
            It returns volume and weight (lb) and weight (kg) and weight (short tons) from small-end diameter and log length and form factor and density. The relationship is pi ÷ 4 × (Small-end diameter ÷ 12)^2 × Log length × Form factor.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Small-end diameter (in), Log length (ft), Form factor, Density (lb/ft³). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: small-end diameter in in; log length in ft; density in lb/ft³. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much does a 12 inch log weigh?', 'a' => 'An 8 ft green hardwood log is about 175 lb at 40 lb/ft³ and a 0.7 form factor.'],
            ['q' => 'Why is green wood heavier than dry?', 'a' => 'It contains water: up to half its weight when freshly felled.'],
        ],
        'related' => [
            ['path' => '/construction/lumber-weight', 'name' => 'Lumber weight'],
            ['path' => '/construction/lumber', 'name' => 'Lumber'],
            ['path' => '/construction/board-foot', 'name' => 'Board foot'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

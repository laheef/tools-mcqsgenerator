<?php

/**
 * Fire flow
 * /construction/fire-flow
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fire flow',
    'meta' => ['title' => 'Fire Flow Calculator: Hydrant Flow from a Pitot', 'description' => 'Estimate the flow a hydrant delivers from its nozzle diameter, the pitot pressure and the discharge coefficient, in gallons per minute. See the steps.', 'h1' => 'Fire flow', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'coefficient',
                    'label' => 'Discharge coefficient',
                    'type' => 'number',
                    'default' => '0.9',
                    'help' => 'About 0.9 for a smooth nozzle',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'nozzle_diameter',
                    'label' => 'Nozzle diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '2.5',
                    'help' => 'Inside diameter',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pressure',
                    'label' => 'Pitot pressure',
                    'type' => 'number',
                    'suffix' => 'psi',
                    'default' => '50',
                    'help' => 'Gauge reading at the stream',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gpm',
                    'label' => 'Flow',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gpm',
                ],
                [
                    'name' => 'lpm',
                    'label' => 'Flow',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'L/min',
                ],
                [
                    'name' => 'flow_per_psi',
                    'label' => 'Flow per psi',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gpm/psi',
                ],
                [
                    'name' => 'nozzle_area',
                    'label' => 'Nozzle area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in²',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Fire flow',
            'results' => [
                'gpm' => '29.83*coefficient*pow(nozzle_diameter,2)*sqrt(pressure)',
                'lpm' => '29.83*coefficient*pow(nozzle_diameter,2)*sqrt(pressure)*3.78541',
                'flow_per_psi' => '29.83*coefficient*pow(nozzle_diameter,2)*(sqrt(pressure+1)-sqrt(pressure))',
                'nozzle_area' => 'pi/4*pow(nozzle_diameter,2)',
                'nozzle_diameter' => 'sqrt(gpm/(29.83*coefficient*sqrt(pressure)))',
                'coefficient' => 'gpm/(29.83*pow(nozzle_diameter,2)*sqrt(pressure))',
                'pressure' => 'pow(gpm/(29.83*coefficient*pow(nozzle_diameter,2)),2)',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>GPM = 29.83 × C × d² × √P</strong>, with the nozzle diameter in inches and the pressure in psi.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Fire flow testing is how a water system proves it can supply a fire. The pitot tube measures the pressure at the centre of the stream, and the nozzle diameter turns that pressure into a flow through the standard orifice equation.</p><p>The page reports <strong>flow (gpm) and flow (L/min) and flow per psi and nozzle area</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Flow (gpm)</strong></td><td><code>29.83 × Discharge coefficient × (Nozzle diameter)^2 × √(Pitot pressure)</code></td></tr><tr><td><strong>Flow (L per min)</strong></td><td><code>29.83 × Discharge coefficient × (Nozzle diameter)^2 × √(Pitot pressure) × 3.78541</code></td></tr><tr><td><strong>Flow per psi</strong></td><td><code>29.83 × Discharge coefficient × (Nozzle diameter)^2 × (√(Pitot pressure+1)-√(Pitot pressure))</code></td></tr><tr><td><strong>Nozzle area</strong></td><td><code>pi ÷ 4 × (Nozzle diameter)^2</code></td></tr><tr><td><strong>Nozzle diameter</strong></td><td><code>√(Flow (gpm) ÷ (29.83 × Discharge coefficient × √(Pitot pressure)))</code></td></tr><tr><td><strong>Discharge coefficient</strong></td><td><code>Flow (gpm) ÷ (29.83 × (Nozzle diameter)^2 × √(Pitot pressure))</code></td></tr><tr><td><strong>Pitot pressure</strong></td><td><code>pow(Flow (gpm) ÷ (29.83 × Discharge coefficient × (Nozzle diameter)^2),2)</code></td></tr></tbody></table><p><p>The coefficient accounts for the shape of the nozzle, the diameter squared is the orifice area, and the square root of the pressure is the velocity term. The constant 29.83 folds the unit conversions together so the answer lands in gallons per minute.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports flow (gpm) and flow (L/min) and flow per psi and nozzle area.</p><ul><li><strong>Discharge coefficient</strong>. About 0.9 for a smooth nozzle</li><li><strong>Nozzle diameter</strong> — in in. Inside diameter</li><li><strong>Pitot pressure</strong> — in psi. Gauge reading at the stream</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Flow</strong> — in gpm</li><li><strong>Flow</strong> — in L/min</li><li><strong>Flow per psi</strong> — in gpm/psi</li><li><strong>Nozzle area</strong> — in in²</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Discharge coefficient = 0.9, Nozzle diameter = 2.5 in, Pitot pressure = 50 psi — and the results panel reads:</p><ul><li><strong>Flow</strong> = <code>29.83 × Discharge coefficient × (Nozzle diameter)^2 × √(Pitot pressure)</code> = <strong>1 186.481 gpm</strong></li><li><strong>Flow</strong> = <code>29.83 × Discharge coefficient × (Nozzle diameter)^2 × √(Pitot pressure) × 3.78541</code> = <strong>4 491.317 L/min</strong></li><li><strong>Flow per psi</strong> = <code>29.83 × Discharge coefficient × (Nozzle diameter)^2 × (√(Pitot pressure+1)-√(Pitot pressure))</code> = <strong>11.806 gpm/psi</strong></li><li><strong>Nozzle area</strong> = <code>pi ÷ 4 × (Nozzle diameter)^2</code> = <strong>4.909 in²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>29.83 × 0.9 × pow(2.5,2) × sqrt(50) = 1 186.481</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 2.5 in nozzle at 50 psi with a coefficient of 0.9 flows 1 186.481 gpm, which is 4 491.317 L/min. The nozzle face is 4.909 in².</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the flow against the nozzle: a two and a half inch nozzle at fifty psi is close to twelve hundred gallons a minute, which is the benchmark a hydrant test quotes. Half of that means the mains, not the nozzle, are the limit.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Flow</th><th>Flow</th><th>Flow per psi</th><th>Nozzle area</th></tr></thead><tbody><tr><td><strong>Discharge coefficient</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Nozzle diameter</strong> +10 %</td><td>+21 %</td><td>+21 %</td><td>+21 %</td><td>+21 %</td></tr><tr><td><strong>Pitot pressure</strong> +10 %</td><td>+4.88 %</td><td>+4.88 %</td><td>−4.61 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Nozzle diameter</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Pitot pressure</strong>, at 4.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Nozzle diameter = 2, Pitot pressure = 30, the page reports <strong>Flow</strong> = 588.188 gpm, <strong>Flow</strong> = 2 226.534 L/min, <strong>Flow per psi</strong> = 9.723 gpm/psi, <strong>Nozzle area</strong> = 3.142 in². A smaller nozzle at lower pressure: a test on a weak main.</li><li>With Pitot pressure = 80, Discharge coefficient = 0.97, the page reports <strong>Flow</strong> = 1 617.521 gpm, <strong>Flow</strong> = 6 122.981 L/min, <strong>Flow per psi</strong> = 10.078 gpm/psi, <strong>Nozzle area</strong> = 4.909 in². A smooth nozzle on a strong system.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Static pressure used.</strong> The pitot reads the flowing stream.</li><li><strong>Nozzle measured outside.</strong> Use the inside diameter.</li><li><strong>Coefficient left at one.</strong> Real nozzles are below it.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Flow (gpm), Flow (L/min), Flow per psi (gpm/psi), Nozzle area (in²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Nozzle diameter in inches, pressure in psi, flow in gallons per minute and litres per minute.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need discharge coefficient and nozzle diameter and pitot pressure. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Flow (gpm) and flow (l/min) and flow per psi and nozzle area should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Discharge coefficient</strong> ×10</td><td>1 186.481</td><td>11 864.81</td><td>ten times larger</td></tr><tr><td><strong>Nozzle diameter</strong> ×10</td><td>1 186.481</td><td>118 648.098</td><td>×100</td></tr><tr><td><strong>Pitot pressure</strong> ×10</td><td>1 186.481</td><td>3 751.982</td><td>×3.162</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Smooth-bore nozzle.</strong> Fog nozzles have a different coefficient.</li><li><strong>No residual pressure.</strong> System adequacy is tested separately.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Recording a hydrant flow test.</li></li><li><li>Checking a sprinkler supply.</li></li><li><li>Comparing nozzle sizes.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/gallons-per-minute">Gallons per minute</a> <a href="/construction/liters-per-minute">Litres per minute</a> <a href="/construction/cfm">CFM</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fire flow calculator work out?', 'a' => <<<'TXT'
            It returns flow (gpm) and flow (L/min) and flow per psi and nozzle area from discharge coefficient and nozzle diameter and pitot pressure. The relationship is 29.83 × Discharge coefficient × (Nozzle diameter)^2 × √(Pitot pressure).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Discharge coefficient, Nozzle diameter (in), Pitot pressure (psi). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: nozzle diameter in in; pitot pressure in psi. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is the formula for hydrant flow?', 'a' => 'Twenty nine point eight three times the coefficient times the diameter squared times the square root of the pitot pressure.'],
            ['q' => 'How much does a 2.5 inch nozzle flow at 50 psi?', 'a' => 'Around eleven hundred and ninety gallons a minute with a coefficient of 0.9.'],
        ],
        'related' => [
            ['path' => '/construction/gallons-per-minute', 'name' => 'Gallons per minute'],
            ['path' => '/construction/liters-per-minute', 'name' => 'Litres per minute'],
            ['path' => '/construction/cfm', 'name' => 'CFM'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

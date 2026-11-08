<?php

/**
 * Residence time
 * /chemistry/residence-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Residence time',
    'meta' => ['title' => 'Residence Time Calculator: Column Length and Flow', 'description' => 'Work out how long a sample spends travelling inside a chromatography column, from the column\'s length, its internal diameter and the flow you set on the pump.', 'h1' => 'Residence time', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Column length',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '25',
                    'help' => '25 cm is a standard analytical column',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'diameter',
                    'label' => 'Internal diameter',
                    'type' => 'number',
                    'suffix' => 'mm',
                    'default' => '4.6',
                    'help' => '4.6 mm is the usual bore for a 25 cm column',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'flow',
                    'label' => 'Flow rate',
                    'type' => 'number',
                    'suffix' => 'mL/min',
                    'default' => '1.0',
                    'help' => 'What the pump is delivering',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area',
                    'label' => 'Column cross-section',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm²',
                ],
                [
                    'name' => 'linear_velocity',
                    'label' => 'Linear velocity',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm/min',
                ],
                [
                    'name' => 'residence_time',
                    'label' => 'Residence time',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                [
                    'name' => 'residence_time_s',
                    'label' => 'Residence time',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 's',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Residence time',
            'results' => [
                'area' => 'pi*pow(diameter/20,2)',
                'linear_velocity' => 'flow/(pi*pow(diameter/20,2))',
                'residence_time' => 'length/(flow/(pi*pow(diameter/20,2)))',
                'residence_time_s' => 'length/(flow/(pi*pow(diameter/20,2)))*60',
                'length' => 'residence_time*flow/(pi*pow(diameter/20,2))',
                'diameter' => '20*sqrt(flow*residence_time/(pi*length))',
                'flow' => 'length*pi*pow(diameter/20,2)/residence_time',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A sample moving through a column at the mobile phase's linear velocity stays for the column's length divided by that velocity: <strong>t = L ÷ u</strong>, where <strong>u = Q ÷ A</strong>. The page reports the cross-section, the linear velocity and the residence time.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Residence time is what connects the flow you set to the time the sample actually spends on the stationary phase. It is the number to change when a method is transferred from a 4.6 mm column to a 2.1 mm one, and it is why a narrower column needs a lower flow to keep the same time.</p><p>The page reports <strong>column cross-section and linear velocity and residence time (min) and residence time (s)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Column cross-section</strong></td><td><code>pi × (Internal diameter ÷ 20)^2</code></td></tr><tr><td><strong>Linear velocity</strong></td><td><code>Flow rate ÷ (pi × (Internal diameter ÷ 20)^2)</code></td></tr><tr><td><strong>Residence time (min)</strong></td><td><code>Column length ÷ (Flow rate ÷ (pi × (Internal diameter ÷ 20)^2))</code></td></tr><tr><td><strong>Residence time (s)</strong></td><td><code>Column length ÷ (Flow rate ÷ (pi × (Internal diameter ÷ 20)^2)) × 60</code></td></tr><tr><td><strong>Column length</strong></td><td><code>Residence time (min) × Flow rate ÷ (pi × (Internal diameter ÷ 20)^2)</code></td></tr><tr><td><strong>Internal diameter</strong></td><td><code>20 × √(Flow rate × Residence time (min) ÷ (pi × Column length))</code></td></tr><tr><td><strong>Flow rate</strong></td><td><code>Column length × pi × (Internal diameter ÷ 20)^2 ÷ Residence time (min)</code></td></tr></tbody></table><p><p>Area is π times the square of the radius, and the radius in centimetres is the diameter in millimetres divided by twenty. Flow divided by area gives the velocity, and length divided by velocity gives the time.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports column cross-section and linear velocity and residence time (min) and residence time (s).</p><ul><li><strong>Column length</strong> — in cm. 25 cm is a standard analytical column</li><li><strong>Internal diameter</strong> — in mm. 4.6 mm is the usual bore for a 25 cm column</li><li><strong>Flow rate</strong> — in mL/min. What the pump is delivering</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Column cross-section</strong> — in cm²</li><li><strong>Linear velocity</strong> — in cm/min</li><li><strong>Residence time</strong> — in min</li><li><strong>Residence time</strong> — in s</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Column length = 25 cm, Internal diameter = 4.6 mm, Flow rate = 1 mL/min — and the results panel reads:</p><ul><li><strong>Column cross-section</strong> = <code>pi × (Internal diameter ÷ 20)^2</code> = <strong>0.166 cm²</strong></li><li><strong>Linear velocity</strong> = <code>Flow rate ÷ (pi × (Internal diameter ÷ 20)^2)</code> = <strong>6.017 cm/min</strong></li><li><strong>Residence time</strong> = <code>Column length ÷ (Flow rate ÷ (pi × (Internal diameter ÷ 20)^2))</code> = <strong>4.155 min</strong></li><li><strong>Residence time</strong> = <code>Column length ÷ (Flow rate ÷ (pi × (Internal diameter ÷ 20)^2)) × 60</code> = <strong>249.285 s</strong></li></ul><p>With the numbers written into the formula, the first result is <code>pi × pow(4.6 ÷ 20,2) = 0.166</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 25 cm column of 4.6 mm bore at 1.0 mL/min: the area is 0.166 cm², so the linear velocity is 6.0 cm/min and the sample spends 4.2 minutes in the column. Halve the bore to 2.1 mm and the same flow gives more than twice the velocity — and the retention time falls with it.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Compare the residence time with the run time: a gradient that reaches the detector before the sample has left the column is not doing anything. And keep the linear velocity near the optimum for the particle size, or efficiency pays for the convenience.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Column cross-section</th><th>Linear velocity</th><th>Residence time</th><th>Residence time</th></tr></thead><tbody><tr><td><strong>Column length</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Internal diameter</strong> +10 %</td><td>+21 %</td><td>−17.36 %</td><td>+21 %</td><td>+21 %</td></tr><tr><td><strong>Flow rate</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Internal diameter</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Flow rate</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Column length = 15, Internal diameter = 2.1, Flow rate = 0.3, the page reports <strong>Column cross-section</strong> = 0.035 cm², <strong>Linear velocity</strong> = 8.661 cm/min, <strong>Residence time</strong> = 1.732 min, <strong>Residence time</strong> = 103.908 s. A narrow-bore column: 0.0346 cm², 8.7 cm/min and 1.7 minutes of travel.</li><li>With Column length = 25, Internal diameter = 4.6, Flow rate = 2, the page reports <strong>Column cross-section</strong> = 0.166 cm², <strong>Linear velocity</strong> = 12.034 cm/min, <strong>Residence time</strong> = 2.077 min, <strong>Residence time</strong> = 124.643 s. Doubling the flow halves the residence time to 2.1 minutes, at the cost of back-pressure.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Diameter used as the radius.</strong> The area formula needs the radius; putting the diameter in makes the area four times too large.</li><li><strong>Millimetres mixed with centimetres.</strong> The page converts the bore for you, but hand calculations often do not.</li><li><strong>Residence time read as retention time.</strong> The chromatographic retention time also includes time on the stationary phase and is always longer.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Column cross-section (cm²), Linear velocity (cm/min), Residence time (min), Residence time (s).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Millilitres per minute over square centimetres gives centimetres per minute, so the residence time comes out in minutes. The bore is entered in millimetres because that is how columns are sold, and converted inside the formula.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need column length and internal diameter and flow rate. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Column cross-section and linear velocity and residence time (min) and residence time (s) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Column length</strong> ×10</td><td>0.166</td><td>0.166</td><td>unchanged</td></tr><tr><td><strong>Internal diameter</strong> ×10</td><td>0.166</td><td>16.619</td><td>×100</td></tr><tr><td><strong>Flow rate</strong> ×10</td><td>0.166</td><td>0.166</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It ignores the packing.</strong> Interstitial velocity is higher than the average, because the particles take up volume.</li><li><strong>It assumes plug flow.</strong> Real flow spreads, so molecules leave over a range of times.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Converting a method between column dimensions.</li></li><li><li>Checking that a gradient fits inside a run.</li></li><li><li>Working out linear velocity for a kinetic plot.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/detention-time">Detention time</a> <a href="/chemistry/hydraulic-retention-time">Hydraulic retention time</a> <a href="/chemistry/dilution-factor">Dilution factor</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Residence time calculator work out?', 'a' => <<<'TXT'
            It returns column cross-section and linear velocity and residence time (min) and residence time (s) from column length and internal diameter and flow rate. The relationship is pi × (Internal diameter ÷ 20)^2.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Column length (cm), Internal diameter (mm), Flow rate (mL/min). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: column length in cm; internal diameter in mm; flow rate in mL/min. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I keep the same residence time when I change the column diameter?', 'a' => 'Scale the flow with the square of the diameter: a 2.1 mm column takes about 0.21 of the flow of a 4.6 mm one for the same linear velocity.'],
            ['q' => 'Is residence time the same as retention time?', 'a' => 'No. Residence time is how long the mobile phase takes to pass; retention time adds the time the analyte spends interacting with the stationary phase.'],
        ],
        'related' => [
            ['path' => '/chemistry/detention-time', 'name' => 'Detention time'],
            ['path' => '/chemistry/hydraulic-retention-time', 'name' => 'Hydraulic retention time'],
            ['path' => '/chemistry/dilution-factor', 'name' => 'Dilution factor'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

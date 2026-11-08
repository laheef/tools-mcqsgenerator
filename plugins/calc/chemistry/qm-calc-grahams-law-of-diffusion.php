<?php

/**
 * Graham's Law Calculator
 * /chemistry/grahams-law-of-diffusion
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Graham\'s Law Calculator',
    'meta' => ['title' => 'Graham\'s Law Calculator: Effusion Rate Ratio', 'description' => 'Compare the effusion rates of two gases from their molar masses, and work out how long the heavier of the two takes to escape through the same pinhole.', 'h1' => 'Graham\'s Law Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'molar_mass_1',
                    'label' => 'Molar mass of gas 1',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '2.016',
                    'help' => 'Hydrogen is 2.016',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molar_mass_2',
                    'label' => 'Molar mass of gas 2',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '32.0',
                    'help' => 'Oxygen is 32.0',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'time_1',
                    'label' => 'Time for gas 1 to effuse',
                    'type' => 'number',
                    'suffix' => 's',
                    'default' => '10',
                    'help' => 'Through the same pinhole, at the same temperature and pressure',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rate_ratio',
                    'label' => 'Effusion rate ratio r₁/r₂',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'time_2',
                    'label' => 'Time for gas 2 to effuse',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 's',
                ],
                [
                    'name' => 'relative_rate',
                    'label' => 'Rate of gas 2 relative to gas 1',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Graham\'s Law',
            'results' => [
                'rate_ratio' => 'sqrt(molar_mass_2/molar_mass_1)',
                'time_2' => 'time_1*sqrt(molar_mass_2/molar_mass_1)',
                'relative_rate' => 'sqrt(molar_mass_1/molar_mass_2)*100',
                'molar_mass_1' => 'molar_mass_2/pow(rate_ratio,2)',
                'molar_mass_2' => 'molar_mass_1*pow(rate_ratio,2)',
                'time_1' => 'time_2/sqrt(molar_mass_2/molar_mass_1)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Graham's law says a gas's effusion rate is inversely proportional to the square root of its molar mass: <strong>r₁ ÷ r₂ = √(M₂ ÷ M₁)</strong>. Light gases escape faster, by exactly the square root of the mass ratio.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Graham's law is the reason uranium enrichment worked: the two isotopes' fluorides differ in molar mass by less than one per cent, and the square root of that tiny difference is what a cascade of thousands of barriers multiplies into a separation.</p><p>The page reports <strong>effusion rate ratio r₁/r₂ and time for gas 2 to effuse and rate of gas 2 relative to gas 1</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Effusion rate ratio r₁/r₂</strong></td><td><code>√(Molar mass of gas 2 ÷ Molar mass of gas 1)</code></td></tr><tr><td><strong>Time for gas 2 to effuse</strong></td><td><code>Time for gas 1 to effuse × √(Molar mass of gas 2 ÷ Molar mass of gas 1)</code></td></tr><tr><td><strong>Rate of gas 2 relative to gas 1</strong></td><td><code>√(Molar mass of gas 1 ÷ Molar mass of gas 2) × 100</code></td></tr><tr><td><strong>Molar mass of gas 1</strong></td><td><code>Molar mass of gas 2 ÷ (Effusion rate ratio r₁ ÷ r₂)^2</code></td></tr><tr><td><strong>Molar mass of gas 2</strong></td><td><code>Molar mass of gas 1 × (Effusion rate ratio r₁ ÷ r₂)^2</code></td></tr><tr><td><strong>Time for gas 1 to effuse</strong></td><td><code>Time for gas 2 to effuse ÷ √(Molar mass of gas 2 ÷ Molar mass of gas 1)</code></td></tr></tbody></table><p><p>The square root is what distinguishes effusion from ordinary mixing. At the same temperature both gases have the same average kinetic energy, so the lighter one must be moving faster — by exactly √(M₂/M₁).</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports effusion rate ratio r₁/r₂ and time for gas 2 to effuse and rate of gas 2 relative to gas 1.</p><ul><li><strong>Molar mass of gas 1</strong> — in g/mol. Hydrogen is 2.016</li><li><strong>Molar mass of gas 2</strong> — in g/mol. Oxygen is 32.0</li><li><strong>Time for gas 1 to effuse</strong> — in s. Through the same pinhole, at the same temperature and pressure</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Effusion rate ratio r₁/r₂</strong></li><li><strong>Time for gas 2 to effuse</strong> — in s</li><li><strong>Rate of gas 2 relative to gas 1</strong> — in %</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Molar mass of gas 1 = 2.016 g/mol, Molar mass of gas 2 = 32 g/mol, Time for gas 1 to effuse = 10 s — and the results panel reads:</p><ul><li><strong>Effusion rate ratio r₁/r₂</strong> = <code>√(Molar mass of gas 2 ÷ Molar mass of gas 1)</code> = <strong>3.984</strong></li><li><strong>Time for gas 2 to effuse</strong> = <code>Time for gas 1 to effuse × √(Molar mass of gas 2 ÷ Molar mass of gas 1)</code> = <strong>39.841 s</strong></li><li><strong>Rate of gas 2 relative to gas 1</strong> = <code>√(Molar mass of gas 1 ÷ Molar mass of gas 2) × 100</code> = <strong>25.1 %</strong></li></ul><p>With the numbers written into the formula, the first result is <code>sqrt(32 ÷ 2.016) = 3.984</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Hydrogen against oxygen: √(32 ÷ 2.016) = 3.98, so hydrogen escapes four times as fast. Ten seconds for hydrogen to pass a pinhole means 39.8 seconds for the same amount of oxygen.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>The ratio is the thing to quote, not the times. If your measured ratio is far from the square root of the masses, the pinhole is too large and you are measuring bulk flow rather than effusion.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Effusion rate ratio r₁/r₂</th><th>Time for gas 2 to effuse</th><th>Rate of gas 2 relative to gas 1</th></tr></thead><tbody><tr><td><strong>Molar mass of gas 1</strong> +10 %</td><td>−4.65 %</td><td>−4.65 %</td><td>+4.88 %</td></tr><tr><td><strong>Molar mass of gas 2</strong> +10 %</td><td>+4.88 %</td><td>+4.88 %</td><td>−4.65 %</td></tr><tr><td><strong>Time for gas 1 to effuse</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Time for gas 1 to effuse</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Molar mass of gas 1</strong>, at 4.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Molar mass of gas 1 = 4, Molar mass of gas 2 = 44, Time for gas 1 to effuse = 20, the page reports <strong>Effusion rate ratio r₁/r₂</strong> = 3.317, <strong>Time for gas 2 to effuse</strong> = 66.332 s, <strong>Rate of gas 2 relative to gas 1</strong> = 30.151 %. Helium against carbon dioxide: √(44/4) = 3.32, so 20 seconds becomes 66.3.</li><li>With Molar mass of gas 1 = 28, Molar mass of gas 2 = 32, Time for gas 1 to effuse = 30, the page reports <strong>Effusion rate ratio r₁/r₂</strong> = 1.069, <strong>Time for gas 2 to effuse</strong> = 32.071 s, <strong>Rate of gas 2 relative to gas 1</strong> = 93.541 %. Nitrogen and oxygen are close: a ratio of 1.069, so the times differ by only seven per cent.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The ratio inverted.</strong> √(M₂/M₁) gives the rate of gas 1 relative to gas 2; the other way round is the reciprocal, not the same number.</li><li><strong>Density used instead of molar mass.</strong> At the same temperature and pressure they are proportional, so the ratio survives — but they are not interchangeable at different conditions.</li><li><strong>The law applied to diffusion in a liquid.</strong> Graham's law is about gas effusion through a pinhole; diffusion in solution follows different rules.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Effusion rate ratio r₁/r₂, Time for gas 2 to effuse (s), Rate of gas 2 relative to gas 1 (%).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Molar masses in grams per mole cancel inside the square root, so the ratio is dimensionless. The time comes back in whatever unit the first time used, and the relative rate is a percentage.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need molar mass of gas 1 and molar mass of gas 2 and time for gas 1 to effuse. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Effusion rate ratio r₁/r₂ and time for gas 2 to effuse and rate of gas 2 relative to gas 1 should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Molar mass of gas 1</strong> ×10</td><td>3.984</td><td>1.26</td><td>×0.316</td></tr><tr><td><strong>Molar mass of gas 2</strong> ×10</td><td>3.984</td><td>12.599</td><td>×3.162</td></tr><tr><td><strong>Time for gas 1 to effuse</strong> ×10</td><td>3.984</td><td>3.984</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes ideal gases and a small pinhole.</strong> Wide openings give bulk flow, where both gases leave together.</li><li><strong>It assumes one gas at a time.</strong> In a mixture, each component effuses at its own rate and the composition changes as it does.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Comparing how fast two gases escape a leak.</li></li><li><li>Understanding isotope separation by gaseous diffusion.</li></li><li><li>Estimating a gas's molar mass from two measured effusion times.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/diffusion-coefficient">Diffusion coefficient</a> <a href="/chemistry/molar-mass-of-gas">Molar mass of a gas</a> <a href="/chemistry/partial-pressure">Partial pressure</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Graham\'s Law calculator work out?', 'a' => <<<'TXT'
            It returns effusion rate ratio r₁/r₂ and time for gas 2 to effuse and rate of gas 2 relative to gas 1 from molar mass of gas 1 and molar mass of gas 2 and time for gas 1 to effuse. The relationship is √(Molar mass of gas 2 ÷ Molar mass of gas 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Molar mass of gas 1 (g/mol), Molar mass of gas 2 (g/mol), Time for gas 1 to effuse (s). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: molar mass of gas 1 in g/mol; molar mass of gas 2 in g/mol; time for gas 1 to effuse in s. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why the square root?', 'a' => <<<'TXT'
            Because at the same temperature the average kinetic energy ½mv² is the same for both gases, so v is proportional to 1/√m. The ratio of speeds is therefore the square root of the inverse mass ratio.
            TXT],
            ['q' => 'Does temperature matter?', 'a' => 'It cancels, as long as both gases are at the same temperature. At different temperatures the ratio picks up a factor of √(T₁/T₂).'],
        ],
        'related' => [
            ['path' => '/chemistry/diffusion-coefficient', 'name' => 'Diffusion coefficient'],
            ['path' => '/chemistry/molar-mass-of-gas', 'name' => 'Molar mass of a gas'],
            ['path' => '/chemistry/partial-pressure', 'name' => 'Partial pressure'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

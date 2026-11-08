<?php

/**
 * Q10 Temperature Coefficient Calculator
 * /chemistry/q10
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Q10 Temperature Coefficient Calculator',
    'meta' => ['title' => 'Q10 Calculator: Reaction Rate Per 10 Degrees', 'description' => 'Measure how strongly a reaction rate responds to temperature by comparing two rates, then use that coefficient to predict the rate ten degrees higher.', 'h1' => 'Q10 Temperature Coefficient Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'rate1',
                    'label' => 'Rate at T₁',
                    'type' => 'number',
                    'default' => '1.0',
                    'help' => 'Any consistent unit; only the ratio is used',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'temp1',
                    'label' => 'Temperature T₁',
                    'type' => 'number',
                    'suffix' => '°C',
                    'default' => '25',
                    'help' => 'Celsius here, because the ten-degree interval is defined on that scale',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rate2',
                    'label' => 'Rate at T₂',
                    'type' => 'number',
                    'default' => '2.0',
                    'help' => 'Measured at the second temperature',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'temp2',
                    'label' => 'Temperature T₂',
                    'type' => 'number',
                    'suffix' => '°C',
                    'default' => '35',
                    'help' => 'Ten degrees above T₁ gives Q10 directly',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'q10',
                    'label' => 'Q10 coefficient',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rate_ratio',
                    'label' => 'Rate ratio r₂/r₁',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rate_plus_10',
                    'label' => 'Rate at T₁ + 10 °C',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Q10 Temperature Coefficient',
            'results' => [
                'q10' => 'pow(rate2/rate1,10/(temp2-temp1))',
                'rate_ratio' => 'rate2/rate1',
                'rate_plus_10' => 'rate1*pow(rate2/rate1,10/(temp2-temp1))',
                'rate1' => 'rate2/pow(q10,(temp2-temp1)/10)',
                'rate2' => 'rate1*pow(q10,(temp2-temp1)/10)',
                'temp1' => 'temp2-10*log(rate2/rate1)/log(q10)',
                'temp2' => 'temp1+10*log(rate2/rate1)/log(q10)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Q10 is the factor by which a rate changes over ten degrees: <strong>Q10 = (r₂ ÷ r₁)<sup>10 ÷ (T₂ − T₁)</sup></strong>. A Q10 of 2 means the rate doubles per ten degrees, which is the usual figure for biological and many chemical processes.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Q10 is the working version of the Arrhenius equation: instead of joules per mole it answers the question people actually ask — how much faster is this at body temperature than in the fridge? For most biological processes the answer is about two.</p><p>The page reports <strong>q10 coefficient and rate ratio r₂/r₁ and rate at T₁ + 10 °C</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Q10 coefficient</strong></td><td><code>(Rate at T₂ ÷ Rate at T₁)^10 ÷ (Temperature T₂-Temperature T₁)</code></td></tr><tr><td><strong>Rate ratio r₂/r₁</strong></td><td><code>Rate at T₂ ÷ Rate at T₁</code></td></tr><tr><td><strong>Rate at T₁ + 10 °C</strong></td><td><code>Rate at T₁ × (Rate at T₂ ÷ Rate at T₁)^10 ÷ (Temperature T₂-Temperature T₁)</code></td></tr><tr><td><strong>Rate at T₁</strong></td><td><code>Rate at T₂ ÷ (Q10 coefficient)^(Temperature T₂-Temperature T₁) ÷ 10</code></td></tr><tr><td><strong>Rate at T₂</strong></td><td><code>Rate at T₁ × (Q10 coefficient)^(Temperature T₂-Temperature T₁) ÷ 10</code></td></tr><tr><td><strong>Temperature T₁</strong></td><td><code>Temperature T₂-10 × ln(Rate at T₂ ÷ Rate at T₁) ÷ ln(Q10 coefficient)</code></td></tr><tr><td><strong>Temperature T₂</strong></td><td><code>Temperature T₁+10 × ln(Rate at T₂ ÷ Rate at T₁) ÷ ln(Q10 coefficient)</code></td></tr></tbody></table><p><p>The exponent rescales whatever temperature interval you used to ten degrees. Measure across ten degrees and the exponent is one; measure across thirty and the ratio is raised to a third first.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports q10 coefficient and rate ratio r₂/r₁ and rate at T₁ + 10 °C.</p><ul><li><strong>Rate at T₁</strong>. Any consistent unit; only the ratio is used</li><li><strong>Temperature T₁</strong> — in °C. Celsius here, because the ten-degree interval is defined on that scale</li><li><strong>Rate at T₂</strong>. Measured at the second temperature</li><li><strong>Temperature T₂</strong> — in °C. Ten degrees above T₁ gives Q10 directly</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Q10 coefficient</strong></li><li><strong>Rate ratio r₂/r₁</strong></li><li><strong>Rate at T₁ + 10 °C</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Rate at T₁ = 1, Temperature T₁ = 25 °C, Rate at T₂ = 2, Temperature T₂ = 35 °C — and the results panel reads:</p><ul><li><strong>Q10 coefficient</strong> = <code>(Rate at T₂ ÷ Rate at T₁)^10 ÷ (Temperature T₂-Temperature T₁)</code> = <strong>2</strong></li><li><strong>Rate ratio r₂/r₁</strong> = <code>Rate at T₂ ÷ Rate at T₁</code> = <strong>2</strong></li><li><strong>Rate at T₁ + 10 °C</strong> = <code>Rate at T₁ × (Rate at T₂ ÷ Rate at T₁)^10 ÷ (Temperature T₂-Temperature T₁)</code> = <strong>2</strong></li></ul><p>With the numbers written into the formula, the first result is <code>pow(2 ÷ 1,10 ÷ (35-25)) = 2</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A rate doubling between 25 °C and 35 °C is Q10 = 2.0 measured directly. The same doubling between 25 °C and 45 °C is four-fold over twenty degrees, which normalises to a Q10 of 2.0 as well — the square root of four.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>A Q10 near 1 means the process ignores temperature, which happens for diffusion-limited steps. Between 2 and 3 is ordinary chemistry. Above 4 usually means a protein is unfolding or a phase is changing, not that the reaction itself is fast.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Q10 coefficient</th><th>Rate ratio r₂/r₁</th><th>Rate at T₁ + 10 °C</th></tr></thead><tbody><tr><td><strong>Rate at T₁</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+0 %</td></tr><tr><td><strong>Temperature T₁</strong> +10 %</td><td>+25.99 %</td><td>+0 %</td><td>+25.99 %</td></tr><tr><td><strong>Rate at T₂</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Temperature T₂</strong> +10 %</td><td>−16.45 %</td><td>+0 %</td><td>−16.45 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Temperature T₁</strong>: a ten per cent move there shifts the result by about 26 per cent. The least sensitive is <strong>Rate at T₁</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Rate at T₁ = 5, Temperature T₁ = 20, Rate at T₂ = 15, Temperature T₂ = 30, the page reports <strong>Q10 coefficient</strong> = 3, <strong>Rate ratio r₂/r₁</strong> = 3, <strong>Rate at T₁ + 10 °C</strong> = 15. A three-fold rise per ten degrees is Q10 = 3, steep but plausible for an enzyme.</li><li>With Rate at T₁ = 1, Temperature T₁ = 10, Rate at T₂ = 4, Temperature T₂ = 30, the page reports <strong>Q10 coefficient</strong> = 2, <strong>Rate ratio r₂/r₁</strong> = 4, <strong>Rate at T₁ + 10 °C</strong> = 2. Four-fold over twenty degrees is Q10 = 2 — the square root, because the interval is twice ten degrees.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The interval not divided by ten.</strong> Four-fold over twenty degrees is Q10 = 2, not 4; the exponent of a half does that.</li><li><strong>Kelvin and Celsius mixed.</strong> Q10 is defined on a ten-degree interval, which is the same size in both scales, but entering 298.15 and 25 makes the interval 273.</li><li><strong>Q10 assumed constant.</strong> It falls as temperature rises, because the Arrhenius exponent is not linear in T.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Q10 coefficient, Rate ratio r₂/r₁, Rate at T₁ + 10 °C.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The rates can be in any unit as long as both are the same — Q10 is a pure ratio. Temperatures are in Celsius here, since the ten-degree interval is defined that way and a kelvin step is the same size.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need rate at T₁ and temperature T₁ and rate at T₂ and temperature T₂. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Q10 coefficient and rate ratio r₂/r₁ and rate at t₁ + 10 °c should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Rate at T₁</strong> ×10</td><td>2</td><td>0.2</td><td>ten times smaller</td></tr><tr><td><strong>Temperature T₁</strong> ×10</td><td>2</td><td>0.968</td><td>×0.484</td></tr><tr><td><strong>Rate at T₂</strong> ×10</td><td>2</td><td>20</td><td>ten times larger</td></tr><tr><td><strong>Temperature T₂</strong> ×10</td><td>2</td><td>1.022</td><td>×0.511</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It is a local approximation.</strong> Over a wide temperature range the coefficient drifts and a single number misleads.</li><li><strong>It says nothing above the optimum.</strong> Enzymes denature, and the rate falls rather than rising, which Q10 cannot represent.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Comparing a biological rate at two temperatures.</li></li><li><li>Predicting shelf life or reaction speed at a warmer temperature.</li></li><li><li>Reducing a measured rate ratio to the standard ten-degree basis.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/arrhenius-equation">Arrhenius equation</a> <a href="/chemistry/activation-energy">Activation energy</a> <a href="/chemistry/rate-constant">Rate constant</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Q10 Temperature Coefficient calculator work out?', 'a' => <<<'TXT'
            It returns q10 coefficient and rate ratio r₂/r₁ and rate at T₁ + 10 °C from rate at T₁ and temperature T₁ and rate at T₂ and temperature T₂. The relationship is (Rate at T₂ ÷ Rate at T₁)^10 ÷ (Temperature T₂-Temperature T₁).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Rate at T₁, Temperature T₁ (°C), Rate at T₂, Temperature T₂ (°C). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: temperature T₁ in °C; temperature T₂ in °C. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is a normal Q10?', 'a' => 'About 2 for most chemical and biological reactions near room temperature. Values between 1.5 and 3 cover the ordinary range.'],
            ['q' => 'Why use ten degrees rather than one?', 'a' => 'Because a one-degree change is close to measurement noise, while ten degrees gives a ratio big enough to read reliably.'],
        ],
        'related' => [
            ['path' => '/chemistry/arrhenius-equation', 'name' => 'Arrhenius equation'],
            ['path' => '/chemistry/activation-energy', 'name' => 'Activation energy'],
            ['path' => '/chemistry/rate-constant', 'name' => 'Rate constant'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Activation Energy Calculator
 * /chemistry/activation-energy
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Activation Energy Calculator',
    'meta' => ['title' => 'Activation Energy Calculator: Two Temperatures', 'description' => 'Find the activation energy of a reaction from two rate constants measured at two temperatures, together with the pre-exponential factor those two points imply.', 'h1' => 'Activation Energy Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'k1',
                    'label' => 'Rate constant at T₁',
                    'type' => 'number',
                    'default' => '0.001',
                    'help' => 'In any consistent unit; only the ratio to k₂ is used',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 't1',
                    'label' => 'Temperature T₁',
                    'type' => 'number',
                    'suffix' => 'K',
                    'default' => '300',
                    'help' => 'Absolute temperature: add 273.15 to the Celsius reading',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'k2',
                    'label' => 'Rate constant at T₂',
                    'type' => 'number',
                    'default' => '0.01',
                    'help' => 'Measured at the higher of the two temperatures',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 't2',
                    'label' => 'Temperature T₂',
                    'type' => 'number',
                    'suffix' => 'K',
                    'default' => '320',
                    'help' => 'Must differ from T₁ by enough to matter — 20 K is a good start',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'activation_energy',
                    'label' => 'Activation energy',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kJ/mol',
                ],
                [
                    'name' => 'ratio',
                    'label' => 'Rate constant ratio k₂/k₁',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pre_exponential',
                    'label' => 'Pre-exponential factor A',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Activation Energy',
            'results' => [
                'activation_energy' => '8.314*log(k2/k1)/(1/t1-1/t2)/1000',
                'ratio' => 'k2/k1',
                'pre_exponential' => 'k1*exp(activation_energy*1000/(8.314*t1))',
                'k1' => 'k2/exp(activation_energy*1000/8.314*(1/t1-1/t2))',
                'k2' => 'k1*exp(activation_energy*1000/8.314*(1/t1-1/t2))',
                't1' => '1/(1/t2+8.314*log(k2/k1)/(activation_energy*1000))',
                't2' => '1/(1/t1-8.314*log(k2/k1)/(activation_energy*1000))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Two rate constants at two temperatures fix the barrier between them: <strong>Ea = R·ln(k₂/k₁) ÷ (1/T₁ − 1/T₂)</strong>. The page returns the activation energy in kilojoules per mole, the ratio of the two constants, and the pre-exponential factor A in the units of your rate constants.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Activation energy is what makes a reaction fast at one temperature and slow at another. Measuring it needs nothing more than the same experiment run twice at two temperatures, and the logarithm turns the exponential into a straight line.</p><p>The page reports <strong>activation energy and rate constant ratio k₂/k₁ and pre-exponential factor A</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Activation energy</strong></td><td><code>8.314 × ln(Rate constant at T₂ ÷ Rate constant at T₁) ÷ (1 ÷ Temperature T₁-1 ÷ Temperature T₂) ÷ 1000</code></td></tr><tr><td><strong>Rate constant ratio k₂/k₁</strong></td><td><code>Rate constant at T₂ ÷ Rate constant at T₁</code></td></tr><tr><td><strong>Pre-exponential factor A</strong></td><td><code>Rate constant at T₁ × exp(Activation energy × 1000 ÷ (8.314 × Temperature T₁))</code></td></tr><tr><td><strong>Rate constant at T₁</strong></td><td><code>Rate constant at T₂ ÷ exp(Activation energy × 1000 ÷ 8.314 × (1 ÷ Temperature T₁-1 ÷ Temperature T₂))</code></td></tr><tr><td><strong>Rate constant at T₂</strong></td><td><code>Rate constant at T₁ × exp(Activation energy × 1000 ÷ 8.314 × (1 ÷ Temperature T₁-1 ÷ Temperature T₂))</code></td></tr><tr><td><strong>Temperature T₁</strong></td><td><code>1 ÷ (1 ÷ Temperature T₂+8.314 × ln(Rate constant at T₂ ÷ Rate constant at T₁) ÷ (Activation energy × 1000))</code></td></tr><tr><td><strong>Temperature T₂</strong></td><td><code>1 ÷ (1 ÷ Temperature T₁-8.314 × ln(Rate constant at T₂ ÷ Rate constant at T₁) ÷ (Activation energy × 1000))</code></td></tr></tbody></table><p><p>The two temperatures enter as reciprocals, which is why they must be in kelvin. A mistake between 25 °C and 298.15 K changes the reciprocal by more than a factor of ten, and the barrier with it.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports activation energy and rate constant ratio k₂/k₁ and pre-exponential factor A.</p><ul><li><strong>Rate constant at T₁</strong>. In any consistent unit; only the ratio to k₂ is used</li><li><strong>Temperature T₁</strong> — in K. Absolute temperature: add 273.15 to the Celsius reading</li><li><strong>Rate constant at T₂</strong>. Measured at the higher of the two temperatures</li><li><strong>Temperature T₂</strong> — in K. Must differ from T₁ by enough to matter — 20 K is a good start</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Activation energy</strong> — in kJ/mol</li><li><strong>Rate constant ratio k₂/k₁</strong></li><li><strong>Pre-exponential factor A</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Rate constant at T₁ = 0.001, Temperature T₁ = 300 K, Rate constant at T₂ = 0.01, Temperature T₂ = 320 K — and the results panel reads:</p><ul><li><strong>Activation energy</strong> = <code>8.314 × ln(Rate constant at T₂ ÷ Rate constant at T₁) ÷ (1 ÷ Temperature T₁-1 ÷ Temperature T₂) ÷ 1000</code> = <strong>91.89 kJ/mol</strong></li><li><strong>Rate constant ratio k₂/k₁</strong> = <code>Rate constant at T₂ ÷ Rate constant at T₁</code> = <strong>10</strong></li><li><strong>Pre-exponential factor A</strong> = <code>Rate constant at T₁ × exp(Activation energy × 1000 ÷ (8.314 × Temperature T₁))</code> = <strong>1 × 10<sup>13</sup></strong></li></ul><p>With the numbers written into the formula, the first result is <code>8.314 × log(0.01 ÷ 0.001) ÷ (1 ÷ 300-1 ÷ 320) ÷ 1000 = 91.89</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A rate constant rising from 0.001 to 0.01 between 300 K and 320 K: the ratio is ten, ln 10 is 2.303, and 1/300 − 1/320 is 2.083 × 10⁻⁴. That gives 91.9 kJ/mol — the kind of barrier whose rate more than triples every ten degrees, so it doubles in about six, at room temperature.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Barriers under about 20 kJ/mol are diffusive: the reaction runs as fast as the molecules can find each other. Between 50 and 100 kJ/mol is the ordinary chemical range, with rates roughly doubling per ten degrees. Above 150 kJ/mol a reaction needs a flame, a catalyst or both.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Activation energy</th><th>Rate constant ratio k₂/k₁</th><th>Pre-exponential factor A</th></tr></thead><tbody><tr><td><strong>Rate constant at T₁</strong> +10 %</td><td>−4.14 %</td><td>−9.09 %</td><td>−76.06 %</td></tr><tr><td><strong>Temperature T₁</strong> +10 %</td><td>−320 %</td><td>+0 %</td><td>−100 %</td></tr><tr><td><strong>Rate constant at T₂</strong> +10 %</td><td>+4.14 %</td><td>+10 %</td><td>+359.5 %</td></tr><tr><td><strong>Temperature T₂</strong> +10 %</td><td>−57.69 %</td><td>+0 %</td><td>−100 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Rate constant at T₂</strong>: a ten per cent move there shifts the result by about 359.5 per cent. The least sensitive is <strong>Rate constant at T₁</strong>, at 76.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Rate constant at T₁ = 0.0002, Temperature T₁ = 290, Rate constant at T₂ = 0.0004, Temperature T₂ = 300, the page reports <strong>Activation energy</strong> = 50.137 kJ/mol, <strong>Rate constant ratio k₂/k₁</strong> = 2, <strong>Pre-exponential factor A</strong> = 214 748.365. A doubling over ten degrees just above room temperature is about 50 kJ/mol — the textbook rule of thumb made exact.</li><li>With Rate constant at T₁ = 1, Temperature T₁ = 300, Rate constant at T₂ = 8, Temperature T₂ = 350, the page reports <strong>Activation energy</strong> = 36.306 kJ/mol, <strong>Rate constant ratio k₂/k₁</strong> = 8, <strong>Pre-exponential factor A</strong> = 2.097 × 10<sup>6</sup>. An eight-fold rise over fifty degrees is only 36 kJ/mol: a fast, poorly temperature-sensitive reaction.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Celsius in the temperature boxes.</strong> The reciprocal term assumes kelvin; 25 and 35 instead of 298.15 and 308.15 gives a barrier wrong by a factor of ten.</li><li><strong>The two temperatures too close together.</strong> Two runs 2 K apart give a number dominated by the experimental error in k.</li><li><strong>The rate constants in different units.</strong> Only their ratio matters, but a ratio taken between molar and millimolar figures is out by a thousand.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Activation energy (kJ/mol), Rate constant ratio k₂/k₁, Pre-exponential factor A.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The rate constants can be in any unit as long as both are the same — the page only uses their ratio. The activation energy comes back in kilojoules per mole because R is 8.314 J per mole per kelvin and the division by a thousand is included.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need rate constant at T₁ and temperature T₁ and rate constant at T₂ and temperature T₂. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Activation energy and rate constant ratio k₂/k₁ and pre-exponential factor a should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Rate constant at T₁</strong> ×10</td><td>91.89</td><td>-8.861 × 10<sup>-15</sup></td><td>×-9.643 × 10<sup>-17</sup></td></tr><tr><td><strong>Temperature T₁</strong> ×10</td><td>91.89</td><td>-6.857</td><td>×-0.075</td></tr><tr><td><strong>Rate constant at T₂</strong> ×10</td><td>91.89</td><td>183.779</td><td>×2</td></tr><tr><td><strong>Temperature T₂</strong> ×10</td><td>91.89</td><td>6.337</td><td>×0.069</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Two points only.</strong> A curved Arrhenius plot — which happens with a change of mechanism or a phase change — is not a straight line, and this page averages it into one misleading slope.</li><li><strong>It assumes the rate constants are accurate.</strong> A few per cent of error in k propagates into several kilojoules per mole.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Finding a barrier from two reaction runs.</li></li><li><li>Predicting the rate at a temperature you did not measure.</li></li><li><li>Checking a literature activation energy against your own data.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/arrhenius-equation">Arrhenius equation</a> <a href="/chemistry/rate-constant">Rate constant</a> <a href="/chemistry/half-life">Half-life</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Activation Energy calculator work out?', 'a' => <<<'TXT'
            It returns activation energy and rate constant ratio k₂/k₁ and pre-exponential factor A from rate constant at T₁ and temperature T₁ and rate constant at T₂ and temperature T₂. The relationship is 8.314 × ln(Rate constant at T₂ ÷ Rate constant at T₁) ÷ (1 ÷ Temperature T₁-1 ÷ Temperature T₂) ÷ 1000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Rate constant at T₁, Temperature T₁ (K), Rate constant at T₂, Temperature T₂ (K). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: temperature T₁ in K; temperature T₂ in K. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why must the temperatures be in kelvin?', 'a' => <<<'TXT'
            Because the Arrhenius equation contains 1/T, and a ratio of reciprocals only behaves the way the algebra expects on an absolute scale. 0 °C is 273.15 K, and 0 in the box divides by zero.
            TXT],
            ['q' => 'What if k₂ is smaller than k₁?', 'a' => <<<'TXT'
            Then the ratio is below one and the logarithm is negative, so the activation energy comes out negative — which means the numbers were entered with the temperatures the wrong way round, or the reaction slows as it warms and something else is going on.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/arrhenius-equation', 'name' => 'Arrhenius equation'],
            ['path' => '/chemistry/rate-constant', 'name' => 'Rate constant'],
            ['path' => '/chemistry/half-life', 'name' => 'Half-life'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Vapour Pressure Calculator
 * /chemistry/vapor-pressure
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Vapour Pressure Calculator',
    'meta' => ['title' => 'Vapour Pressure Calculator: Clausius-Clapeyron', 'description' => 'Use the Clausius-Clapeyron equation to move a liquid\'s vapour pressure from one temperature to the next, from the enthalpy of vaporisation in kilojoules per.', 'h1' => 'Vapour Pressure Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'pressure_1',
                    'label' => 'Vapour pressure at T₁',
                    'type' => 'number',
                    'suffix' => 'mmHg',
                    'default' => '760',
                    'help' => 'One atmosphere at the normal boiling point',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'temp_1',
                    'label' => 'Temperature T₁',
                    'type' => 'number',
                    'suffix' => 'K',
                    'default' => '373.15',
                    'help' => 'Water\'s normal boiling point',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'enthalpy',
                    'label' => 'Enthalpy of vaporisation',
                    'type' => 'number',
                    'suffix' => 'kJ/mol',
                    'default' => '40.66',
                    'help' => 'Water is 40.66 kJ/mol at its boiling point',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'temp_2',
                    'label' => 'Temperature T₂',
                    'type' => 'number',
                    'suffix' => 'K',
                    'default' => '298.15',
                    'help' => 'The temperature you want the pressure at',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pressure_2',
                    'label' => 'Vapour pressure at T₂',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mmHg',
                ],
                [
                    'name' => 'pressure_ratio',
                    'label' => 'Pressure ratio P₂/P₁',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pressure_2_kpa',
                    'label' => 'Vapour pressure at T₂',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kPa',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Vapour Pressure',
            'results' => [
                'pressure_2' => 'pressure_1*exp(-enthalpy*1000/8.314*(1/temp_2-1/temp_1))',
                'pressure_ratio' => 'exp(-enthalpy*1000/8.314*(1/temp_2-1/temp_1))',
                'pressure_2_kpa' => 'pressure_1*exp(-enthalpy*1000/8.314*(1/temp_2-1/temp_1))*0.133322',
                'pressure_1' => 'pressure_2/exp(-enthalpy*1000/8.314*(1/temp_2-1/temp_1))',
                'enthalpy' => '-8.314*log(pressure_2/pressure_1)/(1/temp_2-1/temp_1)/1000',
                'temp_1' => '1/(1/temp_2+8.314*log(pressure_2/pressure_1)/enthalpy/1000)',
                'temp_2' => '1/(1/temp_1-8.314*log(pressure_2/pressure_1)/enthalpy/1000)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Vapour pressure rises steeply with temperature, and the Clausius–Clapeyron equation connects two points on that curve: <strong>ln(P₂/P₁) = −ΔH<sub>vap</sub>/R · (1/T₂ − 1/T₁)</strong>. The page reports the second pressure and the ratio between them.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The Clausius–Clapeyron equation is why a pressure cooker works, why water boils cooler in the mountains, and why a solvent evaporates in a rotavap but not on the bench. One equation ties all three together.</p><p>The page reports <strong>vapour pressure at T₂ (mmHg) and pressure ratio P₂/P₁ and vapour pressure at T₂ (kPa)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Vapour pressure at T₂ (mmHg)</strong></td><td><code>Vapour pressure at T₁ × exp(-Enthalpy of vaporisation × 1000 ÷ 8.314 × (1 ÷ Temperature T₂-1 ÷ Temperature T₁))</code></td></tr><tr><td><strong>Pressure ratio P₂/P₁</strong></td><td><code>exp(-Enthalpy of vaporisation × 1000 ÷ 8.314 × (1 ÷ Temperature T₂-1 ÷ Temperature T₁))</code></td></tr><tr><td><strong>Vapour pressure at T₂ (kPa)</strong></td><td><code>Vapour pressure at T₁ × exp(-Enthalpy of vaporisation × 1000 ÷ 8.314 × (1 ÷ Temperature T₂-1 ÷ Temperature T₁)) × 0.133322</code></td></tr><tr><td><strong>Vapour pressure at T₁</strong></td><td><code>Vapour pressure at T₂ (mmHg) ÷ exp(-Enthalpy of vaporisation × 1000 ÷ 8.314 × (1 ÷ Temperature T₂-1 ÷ Temperature T₁))</code></td></tr><tr><td><strong>Enthalpy of vaporisation</strong></td><td><code>-8.314 × ln(Vapour pressure at T₂ (mmHg) ÷ Vapour pressure at T₁) ÷ (1 ÷ Temperature T₂-1 ÷ Temperature T₁) ÷ 1000</code></td></tr><tr><td><strong>Temperature T₁</strong></td><td><code>1 ÷ (1 ÷ Temperature T₂+8.314 × ln(Vapour pressure at T₂ (mmHg) ÷ Vapour pressure at T₁) ÷ Enthalpy of vaporisation ÷ 1000)</code></td></tr><tr><td><strong>Temperature T₂</strong></td><td><code>1 ÷ (1 ÷ Temperature T₁-8.314 × ln(Vapour pressure at T₂ (mmHg) ÷ Vapour pressure at T₁) ÷ Enthalpy of vaporisation ÷ 1000)</code></td></tr></tbody></table><p><p>The temperatures enter as reciprocals and must be in kelvin. The enthalpy is per mole and needs to match R's joules, which is what the thousand does. Because the left side is a logarithm, a pressure change of a factor of ten is only about 2.3 in the exponent.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports vapour pressure at T₂ (mmHg) and pressure ratio P₂/P₁ and vapour pressure at T₂ (kPa).</p><ul><li><strong>Vapour pressure at T₁</strong> — in mmHg. One atmosphere at the normal boiling point</li><li><strong>Temperature T₁</strong> — in K. Water&#x27;s normal boiling point</li><li><strong>Enthalpy of vaporisation</strong> — in kJ/mol. Water is 40.66 kJ/mol at its boiling point</li><li><strong>Temperature T₂</strong> — in K. The temperature you want the pressure at</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Vapour pressure at T₂</strong> — in mmHg</li><li><strong>Pressure ratio P₂/P₁</strong></li><li><strong>Vapour pressure at T₂</strong> — in kPa</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Vapour pressure at T₁ = 760 mmHg, Temperature T₁ = 373.15 K, Enthalpy of vaporisation = 40.66 kJ/mol, Temperature T₂ = 298.15 K — and the results panel reads:</p><ul><li><strong>Vapour pressure at T₂</strong> = <code>Vapour pressure at T₁ × exp(-Enthalpy of vaporisation × 1000 ÷ 8.314 × (1 ÷ Temperature T₂-1 ÷ Temperature T₁))</code> = <strong>28.119 mmHg</strong></li><li><strong>Pressure ratio P₂/P₁</strong> = <code>exp(-Enthalpy of vaporisation × 1000 ÷ 8.314 × (1 ÷ Temperature T₂-1 ÷ Temperature T₁))</code> = <strong>0.037</strong></li><li><strong>Vapour pressure at T₂</strong> = <code>Vapour pressure at T₁ × exp(-Enthalpy of vaporisation × 1000 ÷ 8.314 × (1 ÷ Temperature T₂-1 ÷ Temperature T₁)) × 0.133322</code> = <strong>3.749 kPa</strong></li></ul><p>With the numbers written into the formula, the first result is <code>760 × exp(-40.66 × 1000 ÷ 8.314 × (1 ÷ 298.15-1 ÷ 373.15)) = 28.119</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Water from 373.15 K to 298.15 K with ΔH 40.66 kJ/mol: the exponent is about −3.30, so the pressure falls to 28 mmHg. The measured value is 23.8 — the equation is good but not exact, because ΔH itself changes with temperature.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>A large enthalpy means a steep curve and a large pressure change over a modest temperature range. That is why water, with 40.66 kJ/mol, has a much steeper curve than a volatile solvent at 30 kJ/mol.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Vapour pressure at T₂</th><th>Pressure ratio P₂/P₁</th><th>Vapour pressure at T₂</th></tr></thead><tbody><tr><td><strong>Vapour pressure at T₁</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Temperature T₁</strong> +10 %</td><td>−69.62 %</td><td>−69.62 %</td><td>−69.62 %</td></tr><tr><td><strong>Enthalpy of vaporisation</strong> +10 %</td><td>−28.09 %</td><td>−28.09 %</td><td>−28.09 %</td></tr><tr><td><strong>Temperature T₂</strong> +10 %</td><td>+344.23 %</td><td>+344.23 %</td><td>+344.23 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Temperature T₂</strong>: a ten per cent move there shifts the result by about 344.2 per cent. The least sensitive is <strong>Vapour pressure at T₁</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Vapour pressure at T₁ = 760, Temperature T₁ = 373.15, Enthalpy of vaporisation = 40.66, Temperature T₂ = 323.15, the page reports <strong>Vapour pressure at T₂</strong> = 100.028 mmHg, <strong>Pressure ratio P₂/P₁</strong> = 0.132, <strong>Vapour pressure at T₂</strong> = 13.336 kPa. Water at 50 °C: 100 mmHg, about an eighth of an atmosphere.</li><li>With Vapour pressure at T₁ = 100, Temperature T₁ = 300, Enthalpy of vaporisation = 32, Temperature T₂ = 350, the page reports <strong>Vapour pressure at T₂</strong> = 625.151 mmHg, <strong>Pressure ratio P₂/P₁</strong> = 6.252, <strong>Vapour pressure at T₂</strong> = 83.346 kPa. A solvent with a 32 kJ/mol enthalpy raises it about six-fold over fifty degrees.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Celsius temperatures.</strong> The reciprocals need kelvin; 100 and 25 give a negative absolute temperature in the algebra.</li><li><strong>A constant enthalpy assumed.</strong> ΔHvap falls as temperature rises, so a wide extrapolation drifts.</li><li><strong>Logarithm base mixed.</strong> ln, not log₁₀ — the difference is a factor of 2.303 in the exponent.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Vapour pressure at T₂ (mmHg), Pressure ratio P₂/P₁, Vapour pressure at T₂ (kPa).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Pressures can be in any unit as long as both are the same, because only the ratio matters. The enthalpy is in kilojoules per mole and the temperatures in kelvin; the output pressure follows the input's units.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need vapour pressure at T₁ and temperature T₁ and enthalpy of vaporisation and temperature T₂. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Vapour pressure at t₂ (mmhg) and pressure ratio p₂/p₁ and vapour pressure at t₂ (kpa) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Vapour pressure at T₁</strong> ×10</td><td>28.119</td><td>281.194</td><td>ten times larger</td></tr><tr><td><strong>Temperature T₁</strong> ×10</td><td>28.119</td><td>0.000212</td><td>×7.538 × 10<sup>-6</sup></td></tr><tr><td><strong>Enthalpy of vaporisation</strong> ×10</td><td>28.119</td><td>3.654 × 10<sup>-12</sup></td><td>×1.299 × 10<sup>-13</sup></td></tr><tr><td><strong>Temperature T₂</strong> ×10</td><td>28.119</td><td>7.25 × 10<sup>7</sup></td><td>×2.578 × 10<sup>6</sup></td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Two points at a time.</strong> It assumes a straight line of ln P against 1/T, which holds over a moderate range and not across a phase change.</li><li><strong>It needs a known ΔH.</strong> Without a measured enthalpy of vaporisation, the equation has nothing to say.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Finding a solvent's vapour pressure away from its boiling point.</li></li><li><li>Working out a boiling point at a pressure you can reach in the lab.</li></li><li><li>Deriving an enthalpy of vaporisation from two measured pressures.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/vapour-pressure-of-water">Water vapour pressure</a> <a href="/chemistry/boiling-point">Boiling point</a> <a href="/chemistry/boiling-point-altitude">Boiling point at altitude</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Vapour Pressure calculator work out?', 'a' => <<<'TXT'
            It returns vapour pressure at T₂ (mmHg) and pressure ratio P₂/P₁ and vapour pressure at T₂ (kPa) from vapour pressure at T₁ and temperature T₁ and enthalpy of vaporisation and temperature T₂. The relationship is Vapour pressure at T₁ × exp(-Enthalpy of vaporisation × 1000 ÷ 8.314 × (1 ÷ Temperature T₂-1 ÷ Temperature T₁)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Vapour pressure at T₁ (mmHg), Temperature T₁ (K), Enthalpy of vaporisation (kJ/mol), Temperature T₂ (K). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: vapour pressure at T₁ in mmHg; temperature T₁ in K; enthalpy of vaporisation in kJ/mol; temperature T₂ in K. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is my answer lower than the handbook?', 'a' => 'Because ΔHvap is not constant: it falls by several per cent across the range. Using the value at the boiling point underestimates the low-temperature pressure.'],
            ['q' => 'Can I use this for a solid?', 'a' => 'Yes, with the enthalpy of sublimation instead. The algebra is identical; only the physical process and the constants change.'],
        ],
        'related' => [
            ['path' => '/chemistry/vapour-pressure-of-water', 'name' => 'Water vapour pressure'],
            ['path' => '/chemistry/boiling-point', 'name' => 'Boiling point'],
            ['path' => '/chemistry/boiling-point-altitude', 'name' => 'Boiling point at altitude'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

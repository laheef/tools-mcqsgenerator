<?php

/**
 * Boiling Point Calculator
 * /chemistry/boiling-point
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Boiling Point Calculator',
    'meta' => ['title' => 'Boiling Point Calculator: Boiling Under Any Pressure', 'description' => 'Find the temperature at which a liquid boils at a pressure other than one atmosphere, from its normal boiling point and its enthalpy of vaporisation in kJ/mol.', 'h1' => 'Boiling Point Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'normal_bp',
                    'label' => 'Normal boiling point',
                    'type' => 'number',
                    'suffix' => '°C',
                    'default' => '100',
                    'help' => 'At one atmosphere',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'enthalpy',
                    'label' => 'Enthalpy of vaporisation',
                    'type' => 'number',
                    'suffix' => 'kJ/mol',
                    'default' => '40.66',
                    'help' => 'Water is 40.66 kJ/mol',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pressure',
                    'label' => 'External pressure',
                    'type' => 'number',
                    'suffix' => 'kPa',
                    'default' => '70',
                    'help' => '101.325 is one atmosphere',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'boiling_point_c',
                    'label' => 'Boiling point',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '°C',
                ],
                [
                    'name' => 'boiling_point_k',
                    'label' => 'Boiling point',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'K',
                ],
                [
                    'name' => 'shift',
                    'label' => 'Shift from the normal boiling point',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'K',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Boiling Point',
            'results' => [
                'boiling_point_k' => '1/(1/(normal_bp+273.15)-8.314*log(pressure/101.325)/(enthalpy*1000))',
                'boiling_point_c' => '1/(1/(normal_bp+273.15)-8.314*log(pressure/101.325)/(enthalpy*1000))-273.15',
                'shift' => '1/(1/(normal_bp+273.15)-8.314*log(pressure/101.325)/(enthalpy*1000))-(normal_bp+273.15)',
                'normal_bp' => '1/(1/(boiling_point_k)+8.314*log(pressure/101.325)/(enthalpy*1000))-273.15',
                'enthalpy' => '8.314*log(pressure/101.325)/(1/(normal_bp+273.15)-1/boiling_point_k)/1000',
                'pressure' => '101.325*exp((1/(normal_bp+273.15)-1/boiling_point_k)*enthalpy*1000/8.314)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A liquid boils when its vapour pressure equals the surrounding pressure. Rearranging Clausius–Clapeyron gives the boiling temperature at any pressure: <strong>1/T = 1/T<sub>b</sub> − R·ln(P/P₀) ÷ ΔH<sub>vap</sub></strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Boiling is not a property of a liquid alone; it is a relation between the liquid's vapour pressure and what is pressing down on it. That is why a vacuum distillation works at all and why a mountain camp cooks slowly.</p><p>The page reports <strong>boiling point (°C) and boiling point (K) and shift from the normal boiling point</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Boiling point (K)</strong></td><td><code>1 ÷ (1 ÷ (Normal boiling point+273.15)-8.314 × ln(External pressure ÷ 101.325) ÷ (Enthalpy of vaporisation × 1000))</code></td></tr><tr><td><strong>Boiling point (°C)</strong></td><td><code>1 ÷ (1 ÷ (Normal boiling point+273.15)-8.314 × ln(External pressure ÷ 101.325) ÷ (Enthalpy of vaporisation × 1000))-273.15</code></td></tr><tr><td><strong>Shift from the normal boiling point</strong></td><td><code>1 ÷ (1 ÷ (Normal boiling point+273.15)-8.314 × ln(External pressure ÷ 101.325) ÷ (Enthalpy of vaporisation × 1000))-(Normal boiling point+273.15)</code></td></tr><tr><td><strong>Normal boiling point</strong></td><td><code>1 ÷ (1 ÷ (Boiling point (K))+8.314 × ln(External pressure ÷ 101.325) ÷ (Enthalpy of vaporisation × 1000))-273.15</code></td></tr><tr><td><strong>Enthalpy of vaporisation</strong></td><td><code>8.314 × ln(External pressure ÷ 101.325) ÷ (1 ÷ (Normal boiling point+273.15)-1 ÷ Boiling point (K)) ÷ 1000</code></td></tr><tr><td><strong>External pressure</strong></td><td><code>101.325 × exp((1 ÷ (Normal boiling point+273.15)-1 ÷ Boiling point (K)) × Enthalpy of vaporisation × 1000 ÷ 8.314)</code></td></tr></tbody></table><p><p>The normal boiling point anchors the curve at exactly one atmosphere, and the enthalpy sets its slope. Everything else is the same equation rearranged for temperature instead of for pressure.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports boiling point (°C) and boiling point (K) and shift from the normal boiling point.</p><ul><li><strong>Normal boiling point</strong> — in °C. At one atmosphere</li><li><strong>Enthalpy of vaporisation</strong> — in kJ/mol. Water is 40.66 kJ/mol</li><li><strong>External pressure</strong> — in kPa. 101.325 is one atmosphere</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Boiling point</strong> — in °C</li><li><strong>Boiling point</strong> — in K</li><li><strong>Shift from the normal boiling point</strong> — in K</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Normal boiling point = 100 °C, Enthalpy of vaporisation = 40.66 kJ/mol, External pressure = 70 kPa — and the results panel reads:</p><ul><li><strong>Boiling point</strong> = <code>1 ÷ (1 ÷ (Normal boiling point+273.15)-8.314 × ln(External pressure ÷ 101.325) ÷ (Enthalpy of vaporisation × 1000))-273.15</code> = <strong>89.759 °C</strong></li><li><strong>Boiling point</strong> = <code>1 ÷ (1 ÷ (Normal boiling point+273.15)-8.314 × ln(External pressure ÷ 101.325) ÷ (Enthalpy of vaporisation × 1000))</code> = <strong>362.909 K</strong></li><li><strong>Shift from the normal boiling point</strong> = <code>1 ÷ (1 ÷ (Normal boiling point+273.15)-8.314 × ln(External pressure ÷ 101.325) ÷ (Enthalpy of vaporisation × 1000))-(Normal boiling point+273.15)</code> = <strong>-10.241 K</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1 ÷ (1 ÷ (100+273.15)-8.314 × log(70 ÷ 101.325) ÷ (40.66 × 1000))-273.15 = 89.759</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Water at 70 kPa: 1/373.15 plus 8.314 × ln(0.691) ÷ 40 660 gives 1/368.1, so it boils at 89.8 °C — a shift of about 10 K. At 20 kPa it would boil near 60 °C, which is the point of a vacuum line.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Roughly, water's boiling point falls about 1 K per 3.5 kPa near atmospheric pressure. At the top of Everest, 33 kPa, it boils at 71 °C — hot enough to cook rice badly and not to make decent tea.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Boiling point</th><th>Boiling point</th><th>Shift from the normal boiling point</th></tr></thead><tbody><tr><td><strong>Normal boiling point</strong> +10 %</td><td>+10.53 %</td><td>+2.6 %</td><td>−5.35 %</td></tr><tr><td><strong>Enthalpy of vaporisation</strong> +10 %</td><td>+1.01 %</td><td>+0.25 %</td><td>+8.86 %</td></tr><tr><td><strong>External pressure</strong> +10 %</td><td>+2.88 %</td><td>+0.71 %</td><td>+25.24 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>External pressure</strong>: a ten per cent move there shifts the result by about 25.2 per cent. The least sensitive is <strong>Enthalpy of vaporisation</strong>, at 8.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Normal boiling point = 78.37, Enthalpy of vaporisation = 38.56, External pressure = 50, the page reports <strong>Boiling point</strong> = 60.508 °C, <strong>Boiling point</strong> = 333.658 K, <strong>Shift from the normal boiling point</strong> = -17.862 K. Ethanol at 50 kPa boils at 61 °C instead of 78.4 — why a rotavap runs warm water and still strips solvent quickly.</li><li>With Normal boiling point = 100, Enthalpy of vaporisation = 40.66, External pressure = 101.325, the page reports <strong>Boiling point</strong> = 100 °C, <strong>Boiling point</strong> = 373.15 K, <strong>Shift from the normal boiling point</strong> = 0 K. At exactly one atmosphere the shift is zero, which is the check to run on the constants.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Normal boiling point entered in kelvin.</strong> The box expects Celsius, and 273.15 added twice makes the answer absurd.</li><li><strong>Gauge pressure used.</strong> A vacuum gauge reading −30 kPa is 71 kPa absolute, not 30.</li><li><strong>ΔH assumed constant.</strong> Over the range from one atmosphere to a hard vacuum it falls by several per cent, so the answer drifts at the extremes.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Boiling point (°C), Boiling point (K), Shift from the normal boiling point (K).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The normal boiling point is in Celsius and the pressures are absolute kilopascals. The answer comes back in both scales, and the shift is in kelvin — the same size as a Celsius degree.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need normal boiling point and enthalpy of vaporisation and external pressure. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Boiling point (°c) and boiling point (k) and shift from the normal boiling point should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Normal boiling point</strong> ×10</td><td>89.759</td><td>888.187</td><td>×9.895</td></tr><tr><td><strong>Enthalpy of vaporisation</strong> ×10</td><td>89.759</td><td>98.95</td><td>×1.102</td></tr><tr><td><strong>External pressure</strong> ×10</td><td>89.759</td><td>164.547</td><td>×1.833</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>No dissolved solutes.</strong> Boiling point elevation is a separate effect; this page describes the pure liquid.</li><li><strong>No superheating.</strong> A clean vessel can hold a liquid above its boiling point until it nucleates — the calculated value is where it boils, not where it must.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Setting a vacuum distillation's temperature.</li></li><li><li>Working out a cooking time at altitude.</li></li><li><li>Checking whether a solvent can be stripped at a safe temperature.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/boiling-point-altitude">Boiling point at altitude</a> <a href="/chemistry/vapour-pressure-of-water">Water vapour pressure</a> <a href="/chemistry/boiling-point-elevation">Boiling point elevation</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Boiling Point calculator work out?', 'a' => <<<'TXT'
            It returns boiling point (°C) and boiling point (K) and shift from the normal boiling point from normal boiling point and enthalpy of vaporisation and external pressure. The relationship is 1 ÷ (1 ÷ (Normal boiling point+273.15)-8.314 × ln(External pressure ÷ 101.325) ÷ (Enthalpy of vaporisation × 1000)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Normal boiling point (°C), Enthalpy of vaporisation (kJ/mol), External pressure (kPa). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: normal boiling point in °C; enthalpy of vaporisation in kJ/mol; external pressure in kPa. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why does water boil at 71 °C on Everest?', 'a' => <<<'TXT'
            Because the summit pressure is about a third of an atmosphere, and vapour pressure matches it at 71 °C. The water is boiling; it is simply not hot enough to cook with.
            TXT],
            ['q' => 'Does boiling point depend on how much liquid there is?', 'a' => 'No, only on pressure and the liquid\'s identity. A teaspoon and a litre boil at the same temperature.'],
        ],
        'related' => [
            ['path' => '/chemistry/boiling-point-altitude', 'name' => 'Boiling point at altitude'],
            ['path' => '/chemistry/vapour-pressure-of-water', 'name' => 'Water vapour pressure'],
            ['path' => '/chemistry/boiling-point-elevation', 'name' => 'Boiling point elevation'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

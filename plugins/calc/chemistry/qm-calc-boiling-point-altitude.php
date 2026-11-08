<?php

/**
 * Boiling Point at Altitude Calculator
 * /chemistry/boiling-point-altitude
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Boiling Point at Altitude Calculator',
    'meta' => ['title' => 'Boiling Point at Altitude Calculator: Pressure and T', 'description' => 'Estimate the atmospheric pressure at a given altitude and the temperature at which water boils there, from the barometric formula and Clausius-Clapeyron.', 'h1' => 'Boiling Point at Altitude Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'altitude',
                    'label' => 'Altitude above sea level',
                    'type' => 'number',
                    'suffix' => 'm',
                    'default' => '1500',
                    'help' => 'Metres; a mountain valley or a highland city',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'enthalpy',
                    'label' => 'Enthalpy of vaporisation',
                    'type' => 'number',
                    'suffix' => 'kJ/mol',
                    'default' => '40.66',
                    'help' => 'Water is 40.66 kJ/mol at 100 °C',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pressure',
                    'label' => 'Atmospheric pressure',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kPa',
                ],
                [
                    'name' => 'boiling_point',
                    'label' => 'Boiling point of water',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '°C',
                ],
                [
                    'name' => 'shift',
                    'label' => 'Shift from 100 °C',
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
            'title' => 'Boiling Point at Altitude',
            'results' => [
                'pressure' => '101.325*exp((1/373.15-1/(boiling_point+273.15))*enthalpy*1000/8.314)',
                'boiling_point' => '1/(1/373.15-8.314*log((101.325*exp(-altitude/8434.5))/101.325)/(enthalpy*1000))-273.15',
                'shift' => '1/(1/373.15-8.314*log((101.325*exp(-altitude/8434.5))/101.325)/(enthalpy*1000))-273.15-100',
                'altitude' => '-8434.5*log(pressure/101.325)',
                'enthalpy' => '-8.314*log(pressure/101.325)/(1/(boiling_point+273.15)-1/373.15)/1000',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Air pressure falls with height, and water's boiling point falls with it. The page applies the barometric formula for pressure and Clausius–Clapeyron for the boiling temperature that pressure gives.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Cooking instructions written at sea level produce undercooked food at 2 000 m, and a steriliser set for 121 °C does not reach it. The reason is entirely pressure, and both numbers follow from the altitude.</p><p>The page reports <strong>atmospheric pressure and boiling point of water and shift from 100 °C</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Atmospheric pressure</strong></td><td><code>101.325 × exp((1 ÷ 373.15-1 ÷ (Boiling point of water+273.15)) × Enthalpy of vaporisation × 1000 ÷ 8.314)</code></td></tr><tr><td><strong>Boiling point of water</strong></td><td><code>1 ÷ (1 ÷ 373.15-8.314 × ln((101.325 × exp(-Altitude above sea level ÷ 8434.5)) ÷ 101.325) ÷ (Enthalpy of vaporisation × 1000))-273.15</code></td></tr><tr><td><strong>Shift from 100 °C</strong></td><td><code>1 ÷ (1 ÷ 373.15-8.314 × ln((101.325 × exp(-Altitude above sea level ÷ 8434.5)) ÷ 101.325) ÷ (Enthalpy of vaporisation × 1000))-273.15-100</code></td></tr><tr><td><strong>Altitude above sea level</strong></td><td><code>-8434.5 × ln(Atmospheric pressure ÷ 101.325)</code></td></tr><tr><td><strong>Enthalpy of vaporisation</strong></td><td><code>-8.314 × ln(Atmospheric pressure ÷ 101.325) ÷ (1 ÷ (Boiling point of water+273.15)-1 ÷ 373.15) ÷ 1000</code></td></tr></tbody></table><p><p>The barometric formula assumes a standard atmosphere — 15 °C at sea level, lapsing at 6.5 K per kilometre. Real weather moves the pressure by a few per cent around that curve, which is worth about a degree of boiling point.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports atmospheric pressure and boiling point of water and shift from 100 °C.</p><ul><li><strong>Altitude above sea level</strong> — in m. Metres; a mountain valley or a highland city</li><li><strong>Enthalpy of vaporisation</strong> — in kJ/mol. Water is 40.66 kJ/mol at 100 °C</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Atmospheric pressure</strong> — in kPa</li><li><strong>Boiling point of water</strong> — in °C</li><li><strong>Shift from 100 °C</strong> — in K</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Altitude above sea level = 1 500 m, Enthalpy of vaporisation = 40.66 kJ/mol — and the results panel reads:</p><ul><li><strong>Atmospheric pressure</strong> = <code>101.325 × exp((1 ÷ 373.15-1 ÷ (Boiling point of water+273.15)) × Enthalpy of vaporisation × 1000 ÷ 8.314)</code> = <strong>84.817 kPa</strong></li><li><strong>Boiling point of water</strong> = <code>1 ÷ (1 ÷ 373.15-8.314 × ln((101.325 × exp(-Altitude above sea level ÷ 8434.5)) ÷ 101.325) ÷ (Enthalpy of vaporisation × 1000))-273.15</code> = <strong>95.004 °C</strong></li><li><strong>Shift from 100 °C</strong> = <code>1 ÷ (1 ÷ 373.15-8.314 × ln((101.325 × exp(-Altitude above sea level ÷ 8434.5)) ÷ 101.325) ÷ (Enthalpy of vaporisation × 1000))-273.15-100</code> = <strong>-4.996 K</strong></li></ul><p>With the numbers written into the formula, the first result is <code>101.325 × exp((1 ÷ 373.15-1 ÷ (boiling_point+273.15)) × 40.66 × 1000 ÷ 8.314) = 84.817</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>At 1 500 m the pressure is about 84.8 kPa, and water boils at 94.9 °C — a shift of 5 K. That is enough to change a bread recipe and not enough to sterilise anything that needs 121 °C.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Rule of thumb: the boiling point drops about 1 °C per 300 m near sea level, and faster at height. By 5 000 m the pressure is 56 kPa and water boils at 84 °C; at the summit of Everest it is 71 °C.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Atmospheric pressure</th><th>Boiling point of water</th><th>Shift from 100 °C</th></tr></thead><tbody><tr><td><strong>Altitude above sea level</strong> +10 %</td><td>−1.76 %</td><td>−0.52 %</td><td>−9.85 %</td></tr><tr><td><strong>Enthalpy of vaporisation</strong> +10 %</td><td>−1.173 × 10<sup>-13</sup> %</td><td>+0.47 %</td><td>+8.98 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Altitude above sea level</strong>: a ten per cent move there shifts the result by about 9.9 per cent. The least sensitive is <strong>Enthalpy of vaporisation</strong>, at 9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Altitude above sea level = 0, Enthalpy of vaporisation = 40.66, the page reports <strong>Atmospheric pressure</strong> = 101.325 kPa, <strong>Boiling point of water</strong> = 100 °C, <strong>Shift from 100 °C</strong> = 0 K. Sea level: 101.3 kPa and exactly 100 °C, which is the anchor both formulas are built around.</li><li>With Altitude above sea level = 3 000, Enthalpy of vaporisation = 40.66, the page reports <strong>Atmospheric pressure</strong> = 70.998 kPa, <strong>Boiling point of water</strong> = 90.141 °C, <strong>Shift from 100 °C</strong> = -9.859 K. Three thousand metres: 70.9 kPa and a boiling point near 90 °C — pasta needs several extra minutes.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Altitude in feet.</strong> The formula expects metres; 5 000 feet entered as 5 000 metres gives Everest-like pressure at a modest hill.</li><li><strong>A standard atmosphere assumed.</strong> A low-pressure weather system can cost two more degrees of boiling point at the same altitude.</li><li><strong>Boiling point read as cooking temperature.</strong> Food cooks at the water's temperature, so a lower boiling point means slower cooking, not less heat in the pan.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Atmospheric pressure (kPa), Boiling point of water (°C), Shift from 100 °C (K).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Altitude in metres, pressure in kilopascals and boiling point in Celsius, with the shift in kelvin — the same size as a Celsius degree. The enthalpy is in kilojoules per mole.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need altitude above sea level and enthalpy of vaporisation. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Atmospheric pressure and boiling point of water and shift from 100 °c should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Altitude above sea level</strong> ×10</td><td>84.817</td><td>17.114</td><td>×0.202</td></tr><tr><td><strong>Enthalpy of vaporisation</strong> ×10</td><td>84.817</td><td>84.817</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Water only, as written.</strong> The enthalpy is a field, so another liquid works if its own normal boiling point is substituted by hand.</li><li><strong>It ignores humidity and weather.</strong> Both move the pressure a little and the boiling point less.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Adjusting a recipe for a high-altitude kitchen.</li></li><li><li>Checking whether an autoclave can reach its set point locally.</li></li><li><li>Explaining why a kettle takes longer to boil on a mountain.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/boiling-point">Boiling point</a> <a href="/chemistry/vapour-pressure-of-water">Water vapour pressure</a> <a href="/chemistry/boiling-point-elevation">Boiling point elevation</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Boiling Point at Altitude calculator work out?', 'a' => <<<'TXT'
            It returns atmospheric pressure and boiling point of water and shift from 100 °C from altitude above sea level and enthalpy of vaporisation. The relationship is 101.325 × exp((1 ÷ 373.15-1 ÷ (Boiling point of water+273.15)) × Enthalpy of vaporisation × 1000 ÷ 8.314).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Altitude above sea level (m), Enthalpy of vaporisation (kJ/mol). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: altitude above sea level in m; enthalpy of vaporisation in kJ/mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Does water boil faster at altitude?', 'a' => 'It reaches boiling sooner but at a lower temperature, so food cooks more slowly. Boiling faster and cooking faster are not the same thing.'],
            ['q' => 'At what altitude does water boil at 90 °C?', 'a' => 'About 3 000 m, where the pressure is 70 kPa. The page will give the exact figure for any height you enter.'],
        ],
        'related' => [
            ['path' => '/chemistry/boiling-point', 'name' => 'Boiling point'],
            ['path' => '/chemistry/vapour-pressure-of-water', 'name' => 'Water vapour pressure'],
            ['path' => '/chemistry/boiling-point-elevation', 'name' => 'Boiling point elevation'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

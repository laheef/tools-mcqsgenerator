<?php

/**
 * Water Vapour Pressure Calculator
 * /chemistry/vapour-pressure-of-water
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Water Vapour Pressure Calculator',
    'meta' => ['title' => 'Water Vapour Pressure Calculator: Antoine Equation', 'description' => 'Get the saturation vapour pressure of water at any temperature from 1 to 100 °C from the Antoine equation, in millimetres of mercury, kPa and atmospheres.', 'h1' => 'Water Vapour Pressure Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'temperature',
                    'label' => 'Temperature',
                    'type' => 'number',
                    'suffix' => '°C',
                    'default' => '25',
                    'help' => 'Between 1 and 100 °C, where these constants are fitted',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pressure_mmhg',
                    'label' => 'Vapour pressure',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mmHg',
                ],
                [
                    'name' => 'pressure_kpa',
                    'label' => 'Vapour pressure',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kPa',
                ],
                [
                    'name' => 'pressure_atm',
                    'label' => 'Vapour pressure',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'atm',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Water Vapour Pressure',
            'results' => ['pressure_mmhg' => 'pow(10,8.07131-1730.63/(233.426+temperature))', 'pressure_kpa' => 'pow(10,8.07131-1730.63/(233.426+temperature))*0.133322', 'pressure_atm' => 'pow(10,8.07131-1730.63/(233.426+temperature))/760', 'temperature' => '1730.63/(8.07131-log10(pressure_mmhg))-233.426'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Water's saturation vapour pressure follows the Antoine equation: <strong>log₁₀ P = 8.07131 − 1730.63 ÷ (233.426 + T)</strong>, with P in millimetres of mercury and T in degrees Celsius. This page evaluates it and converts the result.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Water's vapour pressure sets the humidity of every room, the drying rate of every sample and the boiling point of every open vessel. Knowing it is what makes a desiccator, a lyophilisator or a humidity chamber calculable rather than rule-of-thumb.</p><p>The page reports <strong>vapour pressure (mmHg) and vapour pressure (kPa) and vapour pressure (atm)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Vapour pressure (mmHg)</strong></td><td><code>(10)^8.07131-1730.63 ÷ (233.426+Temperature)</code></td></tr><tr><td><strong>Vapour pressure (kPa)</strong></td><td><code>(10)^8.07131-1730.63 ÷ (233.426+Temperature) × 0.133322</code></td></tr><tr><td><strong>Vapour pressure (atm)</strong></td><td><code>(10)^8.07131-1730.63 ÷ (233.426+Temperature) ÷ 760</code></td></tr><tr><td><strong>Temperature</strong></td><td><code>1730.63 ÷ (8.07131-log₁₀(Vapour pressure (mmHg)))-233.426</code></td></tr></tbody></table><p><p>The Antoine equation is an empirical fit to measured data rather than a theoretical law, which is why the three constants are quoted with a range of validity. These are for 1–100 °C; outside that the error grows.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs. It reports vapour pressure (mmHg) and vapour pressure (kPa) and vapour pressure (atm).</p><ul><li><strong>Temperature</strong> — in °C. Between 1 and 100 °C, where these constants are fitted</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Vapour pressure</strong> — in mmHg</li><li><strong>Vapour pressure</strong> — in kPa</li><li><strong>Vapour pressure</strong> — in atm</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Temperature = 25 °C — and the results panel reads:</p><ul><li><strong>Vapour pressure</strong> = <code>(10)^8.07131-1730.63 ÷ (233.426+Temperature)</code> = <strong>23.686 mmHg</strong></li><li><strong>Vapour pressure</strong> = <code>(10)^8.07131-1730.63 ÷ (233.426+Temperature) × 0.133322</code> = <strong>3.158 kPa</strong></li><li><strong>Vapour pressure</strong> = <code>(10)^8.07131-1730.63 ÷ (233.426+Temperature) ÷ 760</code> = <strong>0.031 atm</strong></li></ul><p>With the numbers written into the formula, the first result is <code>pow(10,8.07131-1730.63 ÷ (233.426+25)) = 23.686</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>At 25 °C: 23.7 mmHg, which is 3.16 kPa and 0.0312 atm — the familiar figure behind relative humidity. At 100 °C it reaches 760 mmHg, which is the definition of the normal boiling point.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Relative humidity is the actual vapour pressure divided by this saturation value. A room at 25 °C holding 1.6 kPa of water vapour is at 50 per cent humidity, and cooling it to 14 °C brings it to saturation and the dew point.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Vapour pressure</th><th>Vapour pressure</th><th>Vapour pressure</th></tr></thead><tbody><tr><td><strong>Temperature</strong> +10 %</td><td>+15.92 %</td><td>+15.92 %</td><td>+15.92 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Temperature</strong>: a ten per cent move there shifts the result by about 15.9 per cent. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Temperature = 20, the page reports <strong>Vapour pressure</strong> = 17.473 mmHg, <strong>Vapour pressure</strong> = 2.33 kPa, <strong>Vapour pressure</strong> = 0.023 atm. At 20 °C the saturation pressure is 17.5 mmHg, or 2.34 kPa — a comfortable indoor humidity at about 1.2 kPa.</li><li>With Temperature = 37, the page reports <strong>Vapour pressure</strong> = 46.953 mmHg, <strong>Vapour pressure</strong> = 6.26 kPa, <strong>Vapour pressure</strong> = 0.062 atm. Body temperature: 46.9 mmHg, or 6.26 kPa, which is why exhaled air condenses on a cold mirror.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Kelvin entered.</strong> The Antoine constants here are for Celsius; entering 298.15 evaluates the fit far outside its range.</li><li><strong>Saturation confused with actual pressure.</strong> This is the maximum the air can hold at that temperature, not what is in it.</li><li><strong>Supercooled water.</strong> Below 0 °C the fit still returns a number, but the true value needs the ice constants, not these.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Vapour pressure (mmHg), Vapour pressure (kPa), Vapour pressure (atm).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The temperature is Celsius and the first result is in millimetres of mercury, the unit the constants were fitted in. The kilopascal and atmosphere results are conversions, and 1 atm is exactly 760 mmHg.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need temperature. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Vapour pressure (mmhg) and vapour pressure (kpa) and vapour pressure (atm) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Temperature</strong> ×10</td><td>23.686</td><td>31 001.49</td><td>×1 308.83</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Valid from 1 to 100 °C.</strong> Above the boiling point the pressure rises faster than this fit describes.</li><li><strong>Pure water only.</strong> A solution's vapour pressure is lower — that is Raoult's law — and a salt solution lowers it further.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Converting a relative humidity to an absolute vapour pressure.</li></li><li><li>Finding the dew point of a room by cooling its air.</li></li><li><li>Checking the pressure inside a vacuum desiccator.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/vapor-pressure">Clausius-Clapeyron</a> <a href="/chemistry/boiling-point">Boiling point</a> <a href="/chemistry/raoults-law">Raoult&#x27;s law</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Water Vapour Pressure calculator work out?', 'a' => <<<'TXT'
            It returns vapour pressure (mmHg) and vapour pressure (kPa) and vapour pressure (atm) from temperature. The relationship is (10)^8.07131-1730.63 ÷ (233.426+Temperature).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Temperature (°C). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: temperature in °C. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why does water boil at 100 °C?', 'a' => <<<'TXT'
            Because that is the temperature at which its vapour pressure reaches one atmosphere. Lower the external pressure and it boils cooler; raise it and it boils hotter.
            TXT],
            ['q' => 'What is the vapour pressure at 0 °C?', 'a' => '4.58 mmHg over ice, about 0.6 kPa. Water just above freezing shows the same value.'],
        ],
        'related' => [
            ['path' => '/chemistry/vapor-pressure', 'name' => 'Clausius-Clapeyron'],
            ['path' => '/chemistry/boiling-point', 'name' => 'Boiling point'],
            ['path' => '/chemistry/raoults-law', 'name' => 'Raoult\'s law'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

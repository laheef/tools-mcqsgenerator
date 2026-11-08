<?php

/**
 * Liquid ethylene density
 * /chemistry/liquid-ethylene-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Liquid ethylene density',
    'meta' => ['title' => 'Liquid Ethylene Density Calculator: Rackett', 'description' => 'Estimate the density of saturated liquid ethylene at any temperature below its critical point, using the Rackett correlation and ethylene\'s critical constants.', 'h1' => 'Liquid ethylene density', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'temperature',
                    'label' => 'Temperature',
                    'type' => 'number',
                    'suffix' => 'K',
                    'default' => '250',
                    'help' => 'Must be below ethylene\'s critical 282.35 K',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'critical_temperature',
                    'label' => 'Critical temperature',
                    'type' => 'number',
                    'suffix' => 'K',
                    'default' => '282.35',
                    'help' => '282.35 K for ethylene',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'critical_pressure',
                    'label' => 'Critical pressure',
                    'type' => 'number',
                    'suffix' => 'MPa',
                    'default' => '5.041',
                    'help' => '5.041 MPa for ethylene',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rackett_z',
                    'label' => 'Rackett compressibility',
                    'type' => 'number',
                    'default' => '0.2727',
                    'help' => 'An empirical constant, 0.2727 for ethylene',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molar_mass',
                    'label' => 'Molar mass',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '28.054',
                    'help' => 'Ethylene is 28.054 g/mol',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molar_volume',
                    'label' => 'Saturated liquid molar volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm³/mol',
                ],
                [
                    'name' => 'density',
                    'label' => 'Density',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g/cm³',
                ],
                [
                    'name' => 'density_kg_m3',
                    'label' => 'Density',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kg/m³',
                ],
                [
                    'name' => 'reduced_temperature',
                    'label' => 'Reduced temperature',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Liquid ethylene density',
            'results' => [
                'molar_volume' => '(8.314*critical_temperature/critical_pressure)*pow(rackett_z,1+pow(1-temperature/critical_temperature,2/7))',
                'density' => 'molar_mass/((8.314*critical_temperature/critical_pressure)*pow(rackett_z,1+pow(1-temperature/critical_temperature,2/7)))',
                'density_kg_m3' => 'molar_mass/((8.314*critical_temperature/critical_pressure)*pow(rackett_z,1+pow(1-temperature/critical_temperature,2/7)))*1000',
                'reduced_temperature' => 'temperature/critical_temperature',
                'temperature' => 'critical_temperature*(1-pow((log(molar_mass/density)-log(8.314*critical_temperature/critical_pressure))/log(rackett_z)-1,3.5))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>The Rackett equation gives the saturated liquid molar volume from the critical constants and the reduced temperature: <strong>V = (R·T<sub>c</sub>/P<sub>c</sub>)·Z<sub>RA</sub><sup>1+(1−T/T<sub>c</sub>)<sup>2/7</sup></sup></strong>. Density follows by dividing the molar mass by that volume.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Ethylene is stored and shipped as a refrigerated liquid, and its density decides how much fits in a tank, how the level instruments are scaled and what the relief valves are sized for. Below about 282 K it can be liquefied at modest pressure, so the density curve is the working range.</p><p>The page reports <strong>saturated liquid molar volume and density (g/cm³) and density (kg/m³) and reduced temperature</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Saturated liquid molar volume</strong></td><td><code>(8.314 × Critical temperature ÷ Critical pressure) × (Rackett compressibility)^1+(1-Temperature ÷ Critical temperature)^2 ÷ 7</code></td></tr><tr><td><strong>Density (g per cm³)</strong></td><td><code>Molar mass ÷ ((8.314 × Critical temperature ÷ Critical pressure) × (Rackett compressibility)^1+(1-Temperature ÷ Critical temperature)^2 ÷ 7)</code></td></tr><tr><td><strong>Density (kg per m³)</strong></td><td><code>Molar mass ÷ ((8.314 × Critical temperature ÷ Critical pressure) × (Rackett compressibility)^1+(1-Temperature ÷ Critical temperature)^2 ÷ 7) × 1000</code></td></tr><tr><td><strong>Reduced temperature</strong></td><td><code>Temperature ÷ Critical temperature</code></td></tr><tr><td><strong>Temperature</strong></td><td><code>Critical temperature × (1-pow((ln(Molar mass ÷ Density (g per cm³))-ln(8.314 × Critical temperature ÷ Critical pressure)) ÷ ln(Rackett compressibility)-1,3.5))</code></td></tr></tbody></table><p><p>The bracketed term R·T<sub>c</sub>/P<sub>c</sub> is the critical volume scale; everything else corrects it down as the temperature rises toward the critical point. At the critical temperature the correction makes the volume larger and the density falls toward the critical density.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports saturated liquid molar volume and density (g/cm³) and density (kg/m³) and reduced temperature.</p><ul><li><strong>Temperature</strong> — in K. Must be below ethylene&#x27;s critical 282.35 K</li><li><strong>Critical temperature</strong> — in K. 282.35 K for ethylene</li><li><strong>Critical pressure</strong> — in MPa. 5.041 MPa for ethylene</li><li><strong>Rackett compressibility</strong>. An empirical constant, 0.2727 for ethylene</li><li><strong>Molar mass</strong> — in g/mol. Ethylene is 28.054 g/mol</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Saturated liquid molar volume</strong> — in cm³/mol</li><li><strong>Density</strong> — in g/cm³</li><li><strong>Density</strong> — in kg/m³</li><li><strong>Reduced temperature</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Temperature = 250 K, Critical temperature = 282.35 K, Critical pressure = 5.041 MPa, Rackett compressibility = 0.273, Molar mass = 28.054 g/mol — and the results panel reads:</p><ul><li><strong>Saturated liquid molar volume</strong> = <code>(8.314 × Critical temperature ÷ Critical pressure) × (Rackett compressibility)^1+(1-Temperature ÷ Critical temperature)^2 ÷ 7</code> = <strong>63.081 cm³/mol</strong></li><li><strong>Density</strong> = <code>Molar mass ÷ ((8.314 × Critical temperature ÷ Critical pressure) × (Rackett compressibility)^1+(1-Temperature ÷ Critical temperature)^2 ÷ 7)</code> = <strong>0.445 g/cm³</strong></li><li><strong>Density</strong> = <code>Molar mass ÷ ((8.314 × Critical temperature ÷ Critical pressure) × (Rackett compressibility)^1+(1-Temperature ÷ Critical temperature)^2 ÷ 7) × 1000</code> = <strong>444.733 kg/m³</strong></li><li><strong>Reduced temperature</strong> = <code>Temperature ÷ Critical temperature</code> = <strong>0.885</strong></li></ul><p>With the numbers written into the formula, the first result is <code>(8.314 × 282.35 ÷ 5.041) × pow(0.273,1+pow(1-250 ÷ 282.35,2 ÷ 7)) = 63.081</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>At 250 K, with ethylene's constants: the corrected factor gives a molar volume of about 63 cm³/mol, so the density is 28.054 ÷ 63 = 0.445 g/cm³. Warm it to 280 K and the density falls to 0.31 g/cm³ as the liquid approaches its critical point.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Liquid ethylene at its boiling point, 169 K, is measured at about 0.57 g/cm³; the correlation returns 0.60 there, a few per cent high. The density falls steeply in the last ten kelvin before the critical point, which is why refrigerated storage is run well below it.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Saturated liquid molar volume</th><th>Density</th><th>Density</th><th>Reduced temperature</th></tr></thead><tbody><tr><td><strong>Temperature</strong> +10 %</td><td>+27.32 %</td><td>−21.46 %</td><td>−21.46 %</td><td>+10 %</td></tr><tr><td><strong>Critical temperature</strong> +10 %</td><td>−1.94 %</td><td>+1.98 %</td><td>+1.98 %</td><td>−9.09 %</td></tr><tr><td><strong>Critical pressure</strong> +10 %</td><td>−9.09 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Rackett compressibility</strong> +10 %</td><td>+15.79 %</td><td>−13.64 %</td><td>−13.64 %</td><td>+0 %</td></tr><tr><td><strong>Molar mass</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Temperature</strong>: a ten per cent move there shifts the result by about 27.3 per cent. The least sensitive is <strong>Critical temperature</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Temperature = 170, Critical temperature = 282.35, Critical pressure = 5.041, Rackett compressibility = 0.273, Molar mass = 28.054, the page reports <strong>Saturated liquid molar volume</strong> = 46.782 cm³/mol, <strong>Density</strong> = 0.6 g/cm³, <strong>Density</strong> = 599.672 kg/m³, <strong>Reduced temperature</strong> = 0.602. Just above the normal boiling point: the correlation gives 0.60 g/cm³ against a measured 0.57, the value a storage vessel's level scale assumes.</li><li>With Temperature = 280, Critical temperature = 282.35, Critical pressure = 5.041, Rackett compressibility = 0.273, Molar mass = 28.054, the page reports <strong>Saturated liquid molar volume</strong> = 91.225 cm³/mol, <strong>Density</strong> = 0.308 g/cm³, <strong>Density</strong> = 307.526 kg/m³, <strong>Reduced temperature</strong> = 0.992. Within two kelvin of the critical point: the liquid has thinned to 0.31 g/cm³ and the correlation is at the edge of its validity.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Above the critical temperature.</strong> There is no saturated liquid there, and the correlation has no meaning.</li><li><strong>Another compound's constants.</strong> The page's defaults are ethylene's; changing the temperature without checking the constants gives someone else's fluid.</li><li><strong>The Rackett constant ignored.</strong> Z<sub>RA</sub> is fitted per compound and a value borrowed from another fluid shifts the density by tens of per cent near the critical point.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Saturated liquid molar volume (cm³/mol), Density (g/cm³), Density (kg/m³), Reduced temperature.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>R is used as 8.314 MPa·cm³/(mol·K), which is why the volume comes out in cubic centimetres per mole and the density in grams per cubic centimetre. Multiply by a thousand for kilograms per cubic metre.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need temperature and critical temperature and critical pressure and rackett compressibility and molar mass. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Saturated liquid molar volume and density (g/cm³) and density (kg/m³) and reduced temperature should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Critical temperature</strong> ×10</td><td>63.081</td><td>358.264</td><td>×5.679</td></tr><tr><td><strong>Critical pressure</strong> ×10</td><td>63.081</td><td>6.308</td><td>ten times smaller</td></tr><tr><td><strong>Rackett compressibility</strong> ×10</td><td>63.081</td><td>2 179.58</td><td>×34.552</td></tr><tr><td><strong>Molar mass</strong> ×10</td><td>63.081</td><td>63.081</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>An empirical correlation.</strong> Rackett is good to a few per cent over most of the liquid range and poorer near the critical point.</li><li><strong>Saturated liquid only.</strong> Compressed liquid at higher pressure is denser by a small amount the page does not model.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Scaling a level gauge on a refrigerated ethylene tank.</li></li><li><li>Getting a density for a pump or relief calculation.</li></li><li><li>Seeing how steeply the density falls near the critical point.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/molar-mass">Molar mass</a> <a href="/chemistry/vapour-pressure-of-water">Vapour pressure of water</a> <a href="/chemistry/standard-temperature-and-pressure">Standard conditions</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Liquid ethylene density calculator work out?', 'a' => <<<'TXT'
            It returns saturated liquid molar volume and density (g/cm³) and density (kg/m³) and reduced temperature from temperature and critical temperature and critical pressure and rackett compressibility and molar mass. The relationship is (8.314 × Critical temperature ÷ Critical pressure) × (Rackett compressibility)^1+(1-Temperature ÷ Critical temperature)^2 ÷ 7.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Temperature (K), Critical temperature (K), Critical pressure (MPa), Rackett compressibility, Molar mass (g/mol). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: temperature in K; critical temperature in K; critical pressure in MPa; molar mass in g/mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is ethylene stored cold rather than compressed?', 'a' => 'Because its critical temperature is only 282 K: above that it cannot be liquefied by pressure alone. Refrigeration keeps it as a liquid at modest pressure.'],
            ['q' => 'How accurate is Rackett?', 'a' => 'A few per cent over the normal liquid range, degrading toward the critical point where all such correlations struggle.'],
        ],
        'related' => [
            ['path' => '/chemistry/molar-mass', 'name' => 'Molar mass'],
            ['path' => '/chemistry/vapour-pressure-of-water', 'name' => 'Vapour pressure of water'],
            ['path' => '/chemistry/standard-temperature-and-pressure', 'name' => 'Standard conditions'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Young Laplace equation
 * /chemistry/young-laplace-equation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Young Laplace equation',
    'meta' => ['title' => 'Young-Laplace Equation Calculator: Capillary Rise', 'description' => 'Get the capillary pressure and the height of the rise in a narrow tube from surface tension, contact angle, tube radius and the density of the liquid itself.', 'h1' => 'Young Laplace equation', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'surface_tension',
                    'label' => 'Surface tension',
                    'type' => 'number',
                    'suffix' => 'mN/m',
                    'default' => '72.0',
                    'help' => '72.0 for water at 25 °C',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'contact_angle',
                    'label' => 'Contact angle',
                    'type' => 'number',
                    'suffix' => '°',
                    'default' => '0',
                    'help' => '0° for perfectly wetting glass; 140° for a hydrophobic surface',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'radius',
                    'label' => 'Capillary radius',
                    'type' => 'number',
                    'suffix' => 'mm',
                    'default' => '0.5',
                    'help' => 'Half the tube\'s bore',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'density',
                    'label' => 'Liquid density',
                    'type' => 'number',
                    'suffix' => 'kg/m³',
                    'default' => '1000',
                    'help' => '1 000 for water',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'capillary_pressure',
                    'label' => 'Capillary pressure',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'Pa',
                ],
                [
                    'name' => 'capillary_rise',
                    'label' => 'Capillary rise',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mm',
                ],
                [
                    'name' => 'capillary_rise_m',
                    'label' => 'Capillary rise',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Young Laplace equation',
            'results' => [
                'capillary_pressure' => '2*surface_tension*cos(contact_angle*pi/180)/radius',
                'capillary_rise' => '2*surface_tension*cos(contact_angle*pi/180)/radius/(density*9.81)*1000',
                'capillary_rise_m' => '2*surface_tension*cos(contact_angle*pi/180)/radius/(density*9.81)',
                'surface_tension' => 'capillary_pressure*radius/(2*cos(contact_angle*pi/180))',
                'contact_angle' => 'acos(capillary_pressure*radius/(2*surface_tension))*180/pi',
                'radius' => '2*surface_tension*cos(contact_angle*pi/180)/capillary_pressure',
                'density' => '2*surface_tension*cos(contact_angle*pi/180)/radius/(capillary_rise_m*9.81)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A curved meniscus supports a pressure difference: <strong>ΔP = 2γ·cosθ ÷ r</strong>, and that pressure lifts a column of liquid to <strong>h = ΔP ÷ (ρ·g)</strong>. Wetting liquids (θ below 90°) rise; non-wetting ones are depressed.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The Young–Laplace equation explains why water climbs a narrow tube, why a wetting liquid soaks into paper, and why mercury is pushed down a thermometer's bore. It also sets the pressure a membrane or a filter must overcome to let a non-wetting liquid through.</p><p>The page reports <strong>capillary pressure and capillary rise (mm) and capillary rise (m)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Capillary pressure</strong></td><td><code>2 × Surface tension × cos(Contact angle × pi ÷ 180) ÷ Capillary radius</code></td></tr><tr><td><strong>Capillary rise (mm)</strong></td><td><code>2 × Surface tension × cos(Contact angle × pi ÷ 180) ÷ Capillary radius ÷ (Liquid density × 9.81) × 1000</code></td></tr><tr><td><strong>Capillary rise (m)</strong></td><td><code>2 × Surface tension × cos(Contact angle × pi ÷ 180) ÷ Capillary radius ÷ (Liquid density × 9.81)</code></td></tr><tr><td><strong>Surface tension</strong></td><td><code>Capillary pressure × Capillary radius ÷ (2 × cos(Contact angle × pi ÷ 180))</code></td></tr><tr><td><strong>Contact angle</strong></td><td><code>acos(Capillary pressure × Capillary radius ÷ (2 × Surface tension)) × 180 ÷ pi</code></td></tr><tr><td><strong>Capillary radius</strong></td><td><code>2 × Surface tension × cos(Contact angle × pi ÷ 180) ÷ Capillary pressure</code></td></tr><tr><td><strong>Liquid density</strong></td><td><code>2 × Surface tension × cos(Contact angle × pi ÷ 180) ÷ Capillary radius ÷ (Capillary rise (m) × 9.81)</code></td></tr></tbody></table><p><p>The factor of two is there because the meniscus is a sphere with two principal radii of curvature. The contact angle enters through its cosine, which is why a 90° angle gives no rise at all and a hydrophobic surface gives a negative one.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports capillary pressure and capillary rise (mm) and capillary rise (m).</p><ul><li><strong>Surface tension</strong> — in mN/m. 72.0 for water at 25 °C</li><li><strong>Contact angle</strong> — in °. 0° for perfectly wetting glass; 140° for a hydrophobic surface</li><li><strong>Capillary radius</strong> — in mm. Half the tube&#x27;s bore</li><li><strong>Liquid density</strong> — in kg/m³. 1 000 for water</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Capillary pressure</strong> — in Pa</li><li><strong>Capillary rise</strong> — in mm</li><li><strong>Capillary rise</strong> — in m</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Surface tension = 72 mN/m, Contact angle = 0 °, Capillary radius = 0.5 mm, Liquid density = 1 000 kg/m³ — and the results panel reads:</p><ul><li><strong>Capillary pressure</strong> = <code>2 × Surface tension × cos(Contact angle × pi ÷ 180) ÷ Capillary radius</code> = <strong>288 Pa</strong></li><li><strong>Capillary rise</strong> = <code>2 × Surface tension × cos(Contact angle × pi ÷ 180) ÷ Capillary radius ÷ (Liquid density × 9.81) × 1000</code> = <strong>29.358 mm</strong></li><li><strong>Capillary rise</strong> = <code>2 × Surface tension × cos(Contact angle × pi ÷ 180) ÷ Capillary radius ÷ (Liquid density × 9.81)</code> = <strong>0.029 m</strong></li></ul><p>With the numbers written into the formula, the first result is <code>2 × 72 × cos(0 × pi ÷ 180) ÷ 0.5 = 288</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Water in a 0.5 mm radius tube: 2 × 72 mN/m ÷ 0.5 mm is 288 Pa, and 288 Pa over a water column is 29.4 mm of rise. Use a 0.05 mm capillary and the rise becomes 294 mm — ten times higher, because the radius is in the denominator.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the sign with the contact angle: below 90° the liquid rises, exactly 90° it is flat, and above 90° the result is negative — a depression, as mercury shows in a glass tube.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Capillary pressure</th><th>Capillary rise</th><th>Capillary rise</th></tr></thead><tbody><tr><td><strong>Surface tension</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Contact angle</strong> +10 %</td><td>−0.0001523 %</td><td>−0.0001523 %</td><td>−0.0001523 %</td></tr><tr><td><strong>Capillary radius</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Liquid density</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Surface tension</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Contact angle</strong>, at 0.0001523 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Surface tension = 72.8, Contact angle = 0, Capillary radius = 0.1, Liquid density = 998, the page reports <strong>Capillary pressure</strong> = 1 456 Pa, <strong>Capillary rise</strong> = 148.717 mm, <strong>Capillary rise</strong> = 0.149 m. A finer capillary: 1 456 Pa and a 149 mm rise, the classic barometer-tube result.</li><li>With Surface tension = 72.8, Contact angle = 120, Capillary radius = 0.5, Liquid density = 1 000, the page reports <strong>Capillary pressure</strong> = -145.6 Pa, <strong>Capillary rise</strong> = -14.842 mm, <strong>Capillary rise</strong> = -0.015 m. A hydrophobic surface: the pressure reverses and the liquid is pushed down 14.8 mm.</li><li>With Surface tension = 485, Contact angle = 140, Capillary radius = 0.2, Liquid density = 13 534, the page reports <strong>Capillary pressure</strong> = -3 715.316 Pa, <strong>Capillary rise</strong> = -27.983 mm, <strong>Capillary rise</strong> = -0.028 m. Mercury in glass: 3 715 Pa of pressure pushing it down, a depression of about 28 mm.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Diameter entered as radius.</strong> The radius is what appears in the equation, and using the bore doubles the answer.</li><li><strong>Degrees passed straight to cosine.</strong> The formula converts to radians inside; a hand calculation that forgets gives nonsense.</li><li><strong>The contact angle assumed zero.</strong> Real surfaces rarely wet perfectly, and a 30° angle already cuts the rise by 13 per cent.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Capillary pressure (Pa), Capillary rise (mm), Capillary rise (m).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Surface tension in millinewtons per metre and radius in millimetres cancel their factors of a thousand, so the pressure comes out directly in pascals. Dividing by density times gravity then gives metres, and the page shows millimetres as well.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need surface tension and contact angle and capillary radius and liquid density. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Capillary pressure and capillary rise (mm) and capillary rise (m) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Surface tension</strong> ×10</td><td>288</td><td>2 880</td><td>ten times larger</td></tr><tr><td><strong>Contact angle</strong> ×10</td><td>288</td><td>287.956</td><td>unchanged</td></tr><tr><td><strong>Capillary radius</strong> ×10</td><td>288</td><td>28.8</td><td>ten times smaller</td></tr><tr><td><strong>Liquid density</strong> ×10</td><td>288</td><td>288</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A clean, cylindrical tube.</strong> Contamination and taper change the contact angle and the result.</li><li><strong>It ignores the meniscus mass.</strong> For a wide tube the correction is tiny; for a very narrow one the curved volume matters.</li><li><strong>It is static.</strong> It says nothing about the rate of rise once flow is involved.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Working out how far water climbs in a capillary.</li></li><li><li>Sizing a hydrophobic membrane's breakthrough pressure.</li></li><li><li>Explaining why a meniscus is curved.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/osmotic-pressure">Osmotic pressure</a> <a href="/chemistry/vapour-pressure-of-water">Vapour pressure of water</a> <a href="/chemistry/partial-pressure">Partial pressure</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Young Laplace equation calculator work out?', 'a' => <<<'TXT'
            It returns capillary pressure and capillary rise (mm) and capillary rise (m) from surface tension and contact angle and capillary radius and liquid density. The relationship is 2 × Surface tension × cos(Contact angle × pi ÷ 180) ÷ Capillary radius.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Surface tension (mN/m), Contact angle (°), Capillary radius (mm), Liquid density (kg/m³). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: surface tension in mN/m; contact angle in °; capillary radius in mm; liquid density in kg/m³. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why does a narrower tube lift the liquid higher?', 'a' => 'Because the same surface tension acts around a smaller perimeter, so the pressure it supports is larger — the radius is in the denominator.'],
            ['q' => 'Why does mercury go down instead of up?', 'a' => 'Its contact angle with glass is around 140°, so the cosine is negative and the pressure points the other way.'],
        ],
        'related' => [
            ['path' => '/chemistry/osmotic-pressure', 'name' => 'Osmotic pressure'],
            ['path' => '/chemistry/vapour-pressure-of-water', 'name' => 'Vapour pressure of water'],
            ['path' => '/chemistry/partial-pressure', 'name' => 'Partial pressure'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

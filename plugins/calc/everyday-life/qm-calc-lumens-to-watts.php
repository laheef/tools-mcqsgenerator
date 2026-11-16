<?php

/**
 * Lumens to watts
 * /everyday-life/lumens-to-watts
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lumens to watts',
    'meta' => ['title' => 'Lumens to watts — Formula, Steps & Examples', 'description' => 'Lumens to watts turns luminous efficacy (η) and lumens into nits and power. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Lumens to watts Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => 'Bulb\'s efficiency for producing visible light',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'luminosity',
                            'label' => 'Luminous efficacy (η)',
                            'type' => 'number',
                            'suffix' => 'lm/W',
                            'help' => 'It is the ratio of luminous flux to power. E.g., LED\'s luminous efficacy is usually between 80-120 lumens per watt.',
                            'rounding' => ['standard', '1'],
                            'defaults' => [
                                ['value' => '100', 'when' => null],
                                ['value' => '100', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Bulb\'s brightness',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lumen',
                            'label' => 'Lumens',
                            'type' => 'number',
                            'suffix' => 'lm',
                            'help' => 'The amount of visible light emitted per unit of time. It is also known as Luminous flux (Φᵥ).',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nits',
                            'label' => 'Nits',
                            'type' => 'number',
                            'help' => 'The intensity of visible light equal to one candle per square meter.',
                            'unit' => '72',
                            'unit_default' => 'cdm2',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Power requirements',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'power',
                            'label' => 'Power',
                            'type' => 'number',
                            'unit' => '13',
                            'unit_default' => 'w',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'power = lumen / luminosity',
            'results' => ['luminosity' => 'lumen/power', 'lumen' => 'luminosity*power', 'power' => 'lumen/luminosity'],
        ],
        [
            'title' => 'nits = lumen / 3.426',
            'results' => ['lumen' => '(1713/500)*nits', 'nits' => '(500/1713)*lumen'],
        ],
    ],
    'article' => [
        'intro' => '<strong>luminous efficacy (η)</strong> is what the Lumens to watts calculator works out, and it gets there from the nits and the power.',
        'sections' => [
            ['title' => 'How does the Lumens to watts calculator work?', 'html' => <<<'TXT'
            <p>The Lumens to watts calculator takes the values in the form, applies the relationship described below and reports <strong>luminous efficacy (η)</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the nits and the power.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in candela/m². The unit chip switches it to any of the 3 supported units.</li><li>A measured quantity, entered by default in watts. The unit chip switches it to any of the 21 supported units.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Luminous efficacy (η)</strong></td><td>A number stated in lm/W.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Lumens</strong></td><td>A number stated in lm.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Nits</strong></td><td>A measured quantity, 3 units available.</td><td>candela/m²</td><td>You supply it</td></tr><tr><td><strong>Power</strong></td><td>A measured quantity, 21 units available.</td><td>watts</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Lumens to watts calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Luminous efficacy (η)</span><span class="formula-eq">=</span><span class="formula-rhs">lumens ÷ power</span></div><div class="formula-row"><span class="formula-lhs">Lumens</span><span class="formula-eq">=</span><span class="formula-rhs">(1713 ÷ 500) × nits</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>Luminous efficacy (η)</strong> = 100, <strong>Lumens</strong> = 10 and <strong>Power</strong> = 10 W. Working through the relationship above gives <strong>Nits</strong> = 10 cd/m².</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Nits</strong> = 10 cd/m² should be roughly the size you expected from <strong>Luminous efficacy (η)</strong> = 100 and <strong>Lumens</strong> = 10.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Screen brightness, opening in candela/m²</li><li>Power, opening in watts</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Lumens to watts calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 2 figures keep coming back — the nits and the power — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Lumens to watts calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — nits for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/birth-from-death-date">Birth from death date</a>, <a href="/everyday-life/birth-year">Birth year</a> and <a href="/everyday-life/birthday">Birthday</a>.</p>
            TXT],
            ['title' => 'Distinguishing light output, electrical power and brightness', 'html' => <<<'TXT'
            <p>Light measurements describe different things. A lumen (lm) is luminous flux—the visible light output weighted by human visual sensitivity. A watt (W) is electrical power. Their ratio, lumens per watt, is a measure of luminous efficacy for a source or system. It is not the same as brightness as perceived by a person, which depends on distance, direction, surface area, optics, contrast and the viewing environment.</p>
            <p>This calculator relates the fields provided on the page to a power or efficacy result. Check the labels and formula before interpreting it: a calculation of watts from lumens requires an efficacy assumption, while efficacy is found from flux divided by electrical power. If the page asks for a value called luminosity, confirm whether it means luminous efficacy in lm/W or another quantity. Similar words are often used informally for different physical measures.</p>
            <p>Nits are a unit of luminance, equal to candelas per square meter. Luminance describes light emitted or reflected from a surface in a given direction; it is not directly interchangeable with total lumens. Converting a lamp’s lumen output to screen luminance generally requires additional information about emitting area, optical distribution and geometry. If those details are not represented in the form, do not treat a nits result as a complete physical description of a real source or display.</p>
            <p>For comparing lamps, use lumen output for the amount of visible light and electrical watts for energy demand, then compare lm/W if both values refer to the same operating conditions. Check whether the watt figure is input power for the whole fixture or just a component. Drivers, optics and operating temperature can affect the delivered result. Package ratings are useful for comparison, but actual performance depends on the installed product and conditions.</p>
            <p>Unit selection matters. Lumens, watts, candela per square meter and related units are not interchangeable merely because they all concern light. Check the unit chip on each field and verify that the result label uses the expected unit. If a conversion yields an implausible value, check whether a luminous-flux value was entered where an efficacy or power input was expected.</p>
            <p>Use this tool as a calculation aid for the specific relationship it implements, not as a substitute for a photometric datasheet. For lighting design, display calibration, safety or energy compliance, use manufacturer specifications and appropriate measurement equipment. A single number cannot capture beam shape, illuminance on a task surface, color rendering or perceived comfort.</p>
            <p>To compare two sources fairly, record the same metric for both and the test conditions. Do not describe a higher wattage as brighter without checking lumens and optics, and do not infer display brightness from lumens alone. The calculator helps translate or rearrange its entered quantities; careful interpretation depends on using the right physical quantity.</p>
            TXT],
            ['title' => 'How to compare a light source with the result', 'html' => <<<'TXT'
            <p>For an efficacy comparison, divide luminous flux in lumens by electrical input power in watts when both refer to the same source and operating state. If a lamp emits 800 lumens and consumes 10 watts, the ratio is 80 lumens per watt. This example illustrates the relationship; it is not a rating for a particular product. Check whether the power value includes the driver or fixture and whether the lumen figure is initial, measured or a package claim.</p><p>Do not compare a bare LED component’s rating with a complete lamp’s output as if they were the same system. Optics, diffusers, drivers, thermal conditions and operating current can affect the light delivered by the finished product. A useful comparison uses comparable measurement conditions and product boundaries.</p><p>Illuminance, measured in lux, describes light reaching a surface per unit area. Luminance, measured in nits or candelas per square meter, describes light emitted or reflected from a surface in a direction. Neither can be derived from total lumens alone without assumptions about distance, area and distribution. If the calculator returns a value labeled in nits, inspect the specific formula and its assumptions before applying it to a real display.</p><p>Use the result for the relationship the form actually computes. For selecting a bulb, compare lumens, watts, color temperature, beam angle and fixture compatibility. For a display, use its manufacturer’s luminance specification or a calibrated meter. The calculator cannot replace photometric data or a measurement in the installed environment.</p>
            TXT],
            ['title' => 'Keep the unit labels beside every number', 'html' => <<<'TXT'
            <p>Write down both the value and its unit whenever you compare outputs. “100” could mean 100 lumens, 100 watts or 100 lumens per watt, and those quantities have different meanings. If a result seems implausible, return to the formula shown on the page and check that the chosen values correspond to the formula’s numerator and denominator.</p><p>When accuracy matters, use a datasheet that states the measured quantity and conditions. The calculator rearranges its stated relationship; it cannot validate the source data.</p>
            TXT],
            ['title' => 'Confirm the system boundary', 'html' => <<<'TXT'
            <p>Check whether the watt figure describes a lamp, its LED component or a complete fixture. Comparing different system boundaries can make an efficacy ratio misleading even when the arithmetic is correct.</p>
            TXT],
            ['title' => 'Verify product figures from the maker', 'html' => <<<'TXT'
            <p>For an actual purchase, compare the manufacturer’s lumen output and input wattage on the same product data sheet. If you need a measured result for a lighting project, use appropriate photometric equipment or a qualified lighting professional rather than inferring performance from a partial specification.</p>
            TXT],
            ['title' => 'Use the formula shown for the intended quantity', 'html' => <<<'TXT'
            <p>When the purpose is energy use, compare electrical watts and operating hours. When the purpose is light output, compare lumens and beam distribution. Keep those questions separate so a single converted figure is not asked to answer both.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the Lumens to watts calculator?', 'a' => 'The form asks for the nits and the power, which is 2 fields in total.'],
            ['q' => 'Can I enter nits in a different unit?', 'a' => 'Yes. Nits opens in candela/m² and the chip beside it offers 3 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Nits = 10 cd/m².'],
        ],
        'related' => [
            ['path' => '/everyday-life/birth-from-death-date', 'name' => 'Birth from death date'],
            ['path' => '/everyday-life/birth-year', 'name' => 'Birth year'],
            ['path' => '/everyday-life/birthday', 'name' => 'Birthday'],
        ],
    ],
];

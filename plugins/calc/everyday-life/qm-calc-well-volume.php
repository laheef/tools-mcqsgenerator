<?php

/**
 * Well volume
 * /everyday-life/well-volume
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Well volume',
    'meta' => ['title' => 'Well volume Calculator — Formula, Units & Example', 'description' => 'Enter well diameter, total well depth and static water depth and Well volume returns three well volumes and total well volume. Every figure is computed.', 'h1' => 'Well volume Calculator', 'updated' => '2025-11-12'],
    'sections' => [
        [
            'title' => 'Well dimensions',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'diameter',
                            'label' => 'Well diameter',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Height_2',
                            'label' => 'Total well depth',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Height_1',
                            'label' => 'Static water depth',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Well volume',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Well_Volume',
                            'label' => 'Well volume',
                            'type' => 'number',
                            'help' => 'Well volume is the total water contained within the well.',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Three_Well_Volumes',
                            'label' => 'Three well volumes',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Total_Well_Volume',
                            'label' => 'Total well volume',
                            'type' => 'number',
                            'help' => 'Total volume of water the well could contain.',
                            'unit' => '20',
                            'unit_default' => 'm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Well_Volume = pi * (diameter/2)^2 * (Height_2 - Height_1)',
            'results' => ['Height_1' => 'Height_2 - 4*Well_Volume/(PI*pow(diameter, 2))', 'Height_2' => 'Height_1 + 4*Well_Volume/(PI*pow(diameter, 2))', 'diameter' => '2*sqrt(-Well_Volume/(Height_1 - Height_2))/sqrt(PI)', 'Well_Volume' => '(1/4)*PI*pow(diameter, 2)*(-Height_1 + Height_2)'],
        ],
        [
            'title' => 'Three_Well_Volumes =  3*Well_Volume',
            'results' => ['Three_Well_Volumes' => '3*Well_Volume', 'Well_Volume' => '(1/3)*Three_Well_Volumes'],
        ],
        [
            'title' => 'Total_Well_Volume = pi * (diameter/2)^2 * (Height_2)',
            'results' => ['Height_2' => '4*Total_Well_Volume/(PI*pow(diameter, 2))', 'diameter' => '2*sqrt(Total_Well_Volume/Height_2)/sqrt(PI)', 'Total_Well_Volume' => '(1/4)*PI*Height_2*pow(diameter, 2)'],
        ],
    ],
    'article' => [
        'intro' => 'The Well volume calculator turns the well diameter, the well volume and the total well volume into <strong>static water depth</strong>.',
        'sections' => [
            ['title' => 'How does the Well volume calculator work?', 'html' => <<<'TXT'
            <p>The Well volume calculator takes the values in the form, applies the relationship described below and reports <strong>static water depth</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the well diameter, the well volume and the total well volume.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in meters. </li><li>A measured quantity, entered by default in cubic meters. The unit chip switches it to any of the 40 supported units.</li><li>A measured quantity, entered by default in cubic meters. The unit chip switches it to any of the 40 supported units.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Well diameter</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Total well depth</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Static water depth</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Well volume</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>You supply it</td></tr><tr><td><strong>Three well volumes</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>Calculated</td></tr><tr><td><strong>Total well volume</strong></td><td>A measured quantity, 40 units available.</td><td>cubic meters</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Well volume calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Static water depth</span><span class="formula-eq">=</span><span class="formula-rhs">total well depth − 4 × well volume ÷ (PI × (well diameter ^ 2))</span></div><div class="formula-row"><span class="formula-lhs">Three well volumes</span><span class="formula-eq">=</span><span class="formula-rhs">3 × well volume</span></div><div class="formula-row"><span class="formula-lhs">Total well depth</span><span class="formula-eq">=</span><span class="formula-rhs">4 × total well volume ÷ (PI × (well diameter ^ 2))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in cubic meters, and convertible to any of the 40 units on that chip.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Volume, opening in cubic meters</li><li>Volume, opening in cubic meters</li><li>Volume, opening in cubic meters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Well volume calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 3 figures keep coming back — the well diameter, the well volume and the total well volume — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Well volume calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/jacket-size">Jacket size</a>, <a href="/everyday-life/jeans-size">Jeans size</a> and <a href="/everyday-life/keystrokes-per-hour">Keystrokes per hour</a>.</p>
            TXT],
            ['title' => 'Using a cylinder estimate for a well', 'html' => <<<'TXT'
            <p>The Well volume calculator uses diameter and height differences to estimate a cylindrical volume. In a simple cylinder, cross-sectional area is pi times the radius squared, and volume is that area multiplied by the height. The calculator’s well-volume relationship follows this geometry. Confirm that the diameter is the inside diameter of the water column or casing section being measured; an outside casing measurement includes wall thickness and can overstate the usable volume.</p>
            <p>Identify which two height readings define the interval. The formula uses the difference between Height 2 and Height 1, so the order matters: the upper and lower reference points must match the labels and the volume being calculated. If the result represents static water depth or a segment volume, do not confuse it with the total depth of the well or the amount of water available for pumping.</p>
            <p>Enter diameter and heights in compatible units. A diameter in inches and height difference in feet require deliberate conversion; a unit chip helps, but verify the displayed units. Volume units scale by the cube of a length conversion, so a simple unit mismatch can create a very large error. Check the result label before comparing with a tank, water meter or pump specification.</p>
            <p>Real wells are not always perfect cylinders. The bore may be irregular, the casing diameter can change, sediment can occupy part of the column and the water level can fluctuate. The calculator assumes the geometry represented by its inputs and does not model these conditions. If the well contains multiple casing sections or shapes, calculate each segment separately using its own dimensions and combine volumes only when the units match.</p>
            <p>Water volume is not the same as sustainable yield. A static column estimate does not tell you how quickly a well replenishes, whether pumping will lower the level or whether the water is potable. Those questions require site measurements and appropriate professional assessment. Do not enter a well or confined space to take measurements without proper training and safety equipment; wells can present serious hazards.</p>
            <p>Use the output as a geometric estimate for planning or checking a measurement, then compare it with well records or a qualified contractor’s data. Record diameter type, height references, units and date because water levels can change. The calculation does not certify water quality, pump capacity or the safe yield of a well.</p>
            TXT],
            ['title' => 'Check the measurements against well records', 'html' => <<<'TXT'
            <p>Use a consistent reference point for Height 1 and Height 2, and note whether each is measured from the top of the casing, ground level or another datum. The formula uses their difference; if one measurement uses a different reference, the calculated interval will not correspond to a real section of the well. Keep a written record of the point and units for future comparisons.</p><p>For a circular casing, measure inside diameter at more than one orientation if you suspect it is not round. If diameter changes with depth, divide the well into sections and calculate each section separately. Use the appropriate diameter for each interval and add volumes only after converting them to the same unit. A single average diameter can mask a large change in a stepped casing.</p><p>Static water volume is a snapshot. Water level can change with rainfall, season, nearby pumping and recovery time. The estimated volume does not tell you the amount that can be withdrawn sustainably or how fast the well refills. A pump test or professional well assessment is needed for those questions.</p><p>Well access can be hazardous. Do not lean into or enter a well to measure it. Follow local rules and use a qualified contractor with suitable equipment, particularly where there are confined-space, electrical, contamination or structural risks. The calculator is a geometry aid and does not provide a safe work procedure.</p>
            TXT],
            ['title' => 'Use the result for volume, not water quality', 'html' => <<<'TXT'
            <p>A geometric volume does not tell you whether well water is safe to drink. Water quality depends on contaminants and testing, not simply the amount of water in the casing. Use a certified testing service and local public-health advice when assessing drinking-water safety.</p><p>The result also does not predict pump capacity or sustainable yield. Those depend on the aquifer, drawdown, recovery and equipment. Keep the static volume estimate separate from operational decisions about how much water can be withdrawn.</p><p>When sharing the result with a contractor, include the diameter, reference heights, unit conversions and measurement date. This context lets them verify the geometry and distinguish a static water column from total well depth or usable storage.</p>
            TXT],
            ['title' => 'Keep an audit trail of the well dimensions', 'html' => <<<'TXT'
            <p>Record whether measurements were taken from the casing interior, the ground or another reference, and note the instrument used. If a later survey uses a different reference point, do not combine the values without reconciling them. A clear record makes it easier to compare volume estimates after repair or seasonal water-level changes.</p><p>If a well has stepped diameters or a non-cylindrical section, break the geometry into parts and calculate each section using its own dimensions. A single-cylinder estimate should not be presented as exact for an irregular bore.</p>
            TXT],
            ['title' => 'Understand the limits of a static volume estimate', 'html' => <<<'TXT'
            <p>The volume calculated from a water column is not necessarily the amount a pump can deliver without lowering the water level. A well may recover slowly or have an aquifer yield that differs from the static storage in its casing. Pumping decisions require measurements such as drawdown and recovery, not only geometric volume.</p><p>Keep records of static water level, total well depth and the interval used in the calculation as separate quantities. They answer different questions. If you are planning a pump or diagnosing a supply problem, work with a qualified well professional who can test the site.</p><p>Do not use this calculation to assess potability. Arrange appropriate water testing through a qualified lab or local authority if water quality is a concern.</p>
            TXT],
            ['title' => 'Repeat a measurement if it is close to a threshold', 'html' => <<<'TXT'
            <p>If the calculated volume will inform an equipment choice, verify diameter and water-level references with a reliable measurement. Small errors in diameter affect cross-sectional area, so a rough reading may have a larger effect than expected. A contractor can confirm dimensions safely.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Well volume calculator work out?', 'a' => 'It returns static water depth, derived from the well diameter, the well volume and the total well volume.'],
            ['q' => 'What do I need to enter to use the Well volume calculator?', 'a' => 'The form asks for the well diameter, the well volume and the total well volume, which is 3 fields in total.'],
            ['q' => 'Can I enter well diameter in a different unit?', 'a' => 'Yes. Well diameter opens in meters and the chip beside it offers 34 units.'],
        ],
        'related' => [
            ['path' => '/everyday-life/jacket-size', 'name' => 'Jacket size'],
            ['path' => '/everyday-life/jeans-size', 'name' => 'Jeans size'],
            ['path' => '/everyday-life/keystrokes-per-hour', 'name' => 'Keystrokes per hour'],
        ],
    ],
];

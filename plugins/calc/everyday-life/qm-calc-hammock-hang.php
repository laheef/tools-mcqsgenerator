<?php

/**
 * Hammock hang
 * /everyday-life/hammock-hang
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hammock hang',
    'meta' => ['title' => 'Hammock hang Calculator — Formula & Results', 'description' => 'Hammock hang works out hammock length and anchor height and reports both. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Hammock hang Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => 'Hammock preferences',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'hammock-new-lbs.png'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'distance',
                            'label' => 'Distance between anchors',
                            'type' => 'number',
                            'help' => 'Recommended range: 10-20 ft (3-6 m). The greater the distance, the higher the anchor height and the longer the suspension will be.',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sit_height',
                            'label' => 'Preferred sit height',
                            'type' => 'number',
                            'help' => 'Usually in the 16 - 19\'\' / 40 - 50 cm range.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.001'],
                            'defaults' => [
                                ['value' => '50', 'when' => null],
                                ['value' => '18', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Weight in hammock',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hammock_length',
                            'label' => 'Hammock length',
                            'type' => 'number',
                            'help' => 'At least 2 ft longer than your height. Usually in the 8-11\' (2.5-3.4 m) range.',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ridgeline_length',
                            'label' => 'Ridgeline length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'angle',
                            'label' => 'Hang angle',
                            'type' => 'select',
                            'options' => [
                                '5°' => '5',
                                '10°' => '10',
                                '15°' => '15',
                                '20°' => '20',
                                '25°' => '25',
                                '30°' => '30',
                                '35°' => '35',
                                '40°' => '40',
                                '45°' => '45',
                            ],
                            'dataset' => 'Angles',
                            'control' => 'DROPDOWN',
                            'help' => 'Recommended values: 25° to 40°.',
                            'default' => '30°',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'The default hang angle is 30°.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'angles/5.png'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'How to hang a hammock?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'anchor_height',
                            'label' => 'Anchor height',
                            'type' => 'number',
                            'help' => 'Hang point measured from the ground.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'suspension_cord_length',
                            'label' => 'Suspension length',
                            'type' => 'number',
                            'help' => 'From hammock end to anchor.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tension_display_options',
                            'label' => 'Display cord tension as...',
                            'type' => 'select',
                            'options' => ['weight (mass)' => '0', 'force' => '1'],
                            'dataset' => 'Tension display options',
                            'default' => 'weight (mass)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cord_tension',
                            'label' => 'Cord tension',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cord_tension_force',
                            'label' => 'Cord tension',
                            'type' => 'number',
                            'unit' => '62',
                            'unit_default' => 'kN',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tension_horizontal',
                            'label' => 'Horizontal tension',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tension_horizontal_force',
                            'label' => 'Horizontal tension',
                            'type' => 'number',
                            'unit' => '62',
                            'unit_default' => 'kN',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tension_vertical',
                            'label' => 'Vertical tension',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tension_vertical_force',
                            'label' => 'Vertical tension',
                            'type' => 'number',
                            'unit' => '62',
                            'unit_default' => 'kN',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'display_more_tension_value_checkbox',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Display more tension values' => '1', '' => '0'],
                            'dataset' => 'More tension values',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Great! Now you can hang your hammock: The hang point should be about {{anchor_height.value}}&nbsp;{{anchor_height.unit}} above the ground. You will need two times {{suspension_cord_length.value}}&nbsp;{{suspension_cord_length.unit}} of the cord. Remember, that's the value without the length needed for mounting, so add more depending on your suspension system. Your rope should be able to hold at le
                        TXT],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'hammock_length = ridgeline_length / cos(angle * PI / 180)',
            'results' => ['hammock_length' => 'ridgeline_length/cos((1/180)*PI*angle)', 'angle' => '-180*acos(ridgeline_length/hammock_length)/PI + 360', 'ridgeline_length' => 'hammock_length*cos((1/180)*PI*angle)'],
        ],
        [
            'title' => 'tension_vertical = weight / 2',
            'results' => ['weight' => '2*tension_vertical', 'tension_vertical' => '(1/2)*weight'],
        ],
        [
            'title' => 'tension_vertical / tension_horizontal = tan(angle * PI / 180)',
            'results' => ['tension_vertical' => 'tension_horizontal*tan((1/180)*PI*angle)', 'angle' => '180*atan(tension_vertical/tension_horizontal)/PI', 'tension_horizontal' => 'tension_vertical/tan((1/180)*PI*angle)'],
        ],
        [
            'title' => 'cord_tension = tension_vertical / sin(angle * PI / 180)',
            'results' => ['tension_vertical' => 'cord_tension*sin((1/180)*PI*angle)', 'angle' => '-180*asin(tension_vertical/cord_tension)/PI + 180', 'cord_tension' => 'tension_vertical/sin((1/180)*PI*angle)'],
        ],
        [
            'title' => 'anchor_height = sit_height + (1 / 2) * ridgeline_length * tan(angle * PI / 180) + sqrt(suspension_cord_length ^ 2 - (0.5 * (distance - ridgeline_length)) ^ 2)',
            'results' => [
                'suspension_cord_length' => <<<'TXT'
                (1/2)*sqrt(pow(distance, 2) - 2*distance*ridgeline_length + pow(ridgeline_length, 2) + pow(-2*anchor_height + ridgeline_length*tan((1/180)*PI*angle) + 2*sit_height, 2))
                TXT,
                'distance' => 'ridgeline_length + sqrt(4*pow(suspension_cord_length, 2) - pow(-2*anchor_height + ridgeline_length*tan((1/180)*PI*angle) + 2*sit_height, 2))',
                'sit_height' => 'anchor_height - 1/2*ridgeline_length*tan((1/180)*PI*angle) - 1/2*sqrt(4*pow(suspension_cord_length, 2) - pow(distance - ridgeline_length, 2))',
                'anchor_height' => '(1/2)*ridgeline_length*tan((1/180)*PI*angle) + sit_height + (1/2)*sqrt(4*pow(suspension_cord_length, 2) - pow(distance - ridgeline_length, 2))',
                'angle' => <<<'TXT'
                -180*atan((-2*anchor_height + 2*sit_height + sqrt(-pow(distance, 2) + 2*distance*ridgeline_length - pow(ridgeline_length, 2) + 4*pow(suspension_cord_length, 2)))/ridgeline_length)/PI
                TXT,
            ],
        ],
        [
            'title' => 'suspension_cord_length = (0.5 * (distance - ridgeline_length)) / cos(angle * PI / 180)',
            'results' => ['ridgeline_length' => 'distance - 2*suspension_cord_length*cos((1/180)*PI*angle)', 'angle' => '180*acos((1/2)*(distance - ridgeline_length)/suspension_cord_length)/PI', 'distance' => 'ridgeline_length + 2*suspension_cord_length*cos((1/180)*PI*angle)', 'suspension_cord_length' => '(1/2)*(distance - ridgeline_length)/cos((1/180)*PI*angle)'],
        ],
        [
            'title' => 'cord_tension_force = cord_tension * 9.80665',
            'results' => ['cord_tension_force' => '(196133/20000)*cord_tension', 'cord_tension' => '(20000/196133)*cord_tension_force'],
        ],
        [
            'title' => 'tension_vertical_force = tension_vertical * 9.80665',
            'results' => ['tension_vertical_force' => '(196133/20000)*tension_vertical', 'tension_vertical' => '(20000/196133)*tension_vertical_force'],
        ],
        [
            'title' => 'tension_horizontal_force = tension_horizontal * 9.80665',
            'results' => ['tension_horizontal_force' => '(196133/20000)*tension_horizontal', 'tension_horizontal' => '(20000/196133)*tension_horizontal_force'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Supply the distance between anchors, the preferred sit height, the anchor height and the cord tension and the Hammock hang calculator solves for <strong>hammock length</strong>.

        The results leave the screen the moment you edit a field; press Calculate and they come back updated, so a single changed input shows its own effect.
        TXT,
        'sections' => [
            ['title' => 'How does the Hammock hang calculator work?', 'html' => <<<'TXT'
            <p>The Hammock hang calculator takes the values in the form, applies the relationship described below and reports <strong>hammock length</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case; then you type in the distance between anchors, the preferred sit height, the anchor height and the cord tension (How to hang a hammock).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in meters. </li><li>Pick the option that matches your case — 2 options, such as weight (mass) and force. </li><li>A measured quantity, entered by default in kilograms. The unit chip switches it to any of the 29 supported units.</li><li>A measured quantity, entered by default in kilograms. The unit chip switches it to any of the 29 supported units.</li><li>A single on/off switch — tick it for &ldquo;Display more tension values&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li></ul><p>3 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Distance between anchors</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Preferred sit height</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Weight in hammock</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Hammock length</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Ridgeline length</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Hang angle</strong></td><td>One of 9 options, such as 5°, 10° and 15°.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Anchor height</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Suspension length</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Cord tension (How to hang a hammock)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Cord tension (How to hang a hammock)</strong></td><td>A measured quantity, 16 units available.</td><td>kilonewtons</td><td>Calculated</td></tr><tr><td><strong>Horizontal tension (How to hang a hammock)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Horizontal tension (How to hang a hammock)</strong></td><td>A measured quantity, 16 units available.</td><td>kilonewtons</td><td>Calculated</td></tr><tr><td><strong>Vertical tension (How to hang a hammock)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Vertical tension (How to hang a hammock)</strong></td><td>A measured quantity, 16 units available.</td><td>kilonewtons</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Hammock hang calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Hammock length</span><span class="formula-eq">=</span><span class="formula-rhs">ridgeline length ÷ the cosine of ((1 ÷ 180) × PI × hang angle)</span></div><div class="formula-row"><span class="formula-lhs">Weight in hammock</span><span class="formula-eq">=</span><span class="formula-rhs">2 × vertical tension</span></div><div class="formula-row"><span class="formula-lhs">Vertical tension</span><span class="formula-eq">=</span><span class="formula-rhs">horizontal tension × the tangent of ((1 ÷ 180) × PI × hang angle)</span></div><div class="formula-row"><span class="formula-lhs">Vertical tension</span><span class="formula-eq">=</span><span class="formula-rhs">cord tension × the sine of ((1 ÷ 180) × PI × hang angle)</span></div><div class="formula-row"><span class="formula-lhs">Suspension length</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 2) × the square root of ((distance between anchors ^ 2) − 2 × distance between anchors × ridgeline length + (ridgeline length ^ 2) + (-2 × anchor height + ridgeline length × the tangent of ((1 ÷ 180) × PI × hang angle) + 2 × preferred sit height, 2))</span></div><div class="formula-row"><span class="formula-lhs">Ridgeline length</span><span class="formula-eq">=</span><span class="formula-rhs">distance between anchors − 2 × suspension length × the cosine of ((1 ÷ 180) × PI × hang angle)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>The option the calculation settles on.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in kilonewtons, and convertible to any of the 16 units on that chip.</li><li>Shown in kilonewtons, and convertible to any of the 16 units on that chip.</li><li>Shown in kilonewtons, and convertible to any of the 16 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in meters</li><li>Length, opening in centimeters</li><li>Mass, opening in kilograms</li><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Mass, opening in kilograms</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Hammock hang calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 4 figures keep coming back — the distance between anchors, the preferred sit height and the anchor height — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/age-in-hours">Age in hours</a>, <a href="/everyday-life/age-in-minutes">Age in minutes</a> and <a href="/everyday-life/age-in-months">Age in months</a>.</p>
            TXT],
            ['title' => 'Choosing a site and checking the hang', 'html' => <<<'TXT'
            <p>Begin by checking the two anchor points, their separation and their height above the surface where the hammock will hang. Measure between the attachment points, not between the bases of the trees or posts if the straps will sit elsewhere. The calculator combines the anchor distance, desired sitting height, anchor height and cord tension to estimate a hammock length for the selected setup. Because real fabric and suspension stretch, treat the displayed figure as a starting point for adjustment rather than a guaranteed installation dimension.</p>
            <p>Hammock comfort depends on sag as well as length. A very tight, nearly flat suspension can create uncomfortable pressure and high forces at the anchors; a deeper hang changes the geometry and the amount of clearance beneath the hammock. The calculator’s simplified inputs cannot model every fabric cut, suspension angle, occupant weight, material stretch or movement. Make small adjustments while the hammock is unloaded, then test it gently at a low height before settling into it.</p>
            <p>Inspect the anchors before attaching anything. Living trees should be healthy and large enough for the load, and straps should be broad enough to avoid damaging bark. Do not use weak branches, decorative posts, railings or fixtures unless they are designed and approved for that loading. Indoors, use structural supports installed for the purpose; drywall anchors and ordinary trim are not suitable suspension points. When unsure about a structure, ask a qualified professional rather than relying on a calculator estimate.</p>
            <p>Check clearance in every direction, including the sides and the path a person may take when getting in or out. Keep the hammock low enough to reduce injury risk if someone falls, while leaving comfortable clearance above the ground under load. Avoid placing it above water, hard edges, a fire pit or other hazards. Children should be supervised, and a hammock should not be treated as a substitute for a certified sleeping or safety device.</p>
            <p>Use the unit controls consistently for all lengths. If the anchor distance is entered in meters but the anchor height is entered in feet without changing the relevant unit, the resulting geometry will be misleading. Recheck the units after changing a chip and read the result label before adjusting your suspension. If the suggested length seems unreasonable, verify the measurements and the direction in which the calculator defines cord tension before buying equipment.</p>
            <p>Once installed, follow the hammock and suspension manufacturers’ load limits and inspection guidance. Knots, straps, carabiners and attachment points form one system, and the weakest part constrains the whole setup. Recheck wear, abrasion and shifting after use. The calculator helps organize the dimensions; it does not rate hardware or certify an anchor.</p>
            TXT],
            ['title' => 'Fine adjustments after installation', 'html' => <<<'TXT'
            <p>Once the hammock is hung, sit down slowly and check how much the suspension settles under your weight. If the hammock is too high or too taut, adjust the attachment point or suspension length in small increments, then test again. Avoid making a dramatic change while anyone is in the hammock, and do not exceed the hardware maker’s limits. The first result is a setup estimate; the loaded position is the practical comfort check.</p><p>Keep a note of the final attachment height and strap setting. This makes it easier to recreate a comfortable hang at the same site later.</p>
            TXT],
            ['title' => 'Account for how the materials behave', 'html' => <<<'TXT'
            <p>Suspension materials and hammock fabric can stretch with use, moisture and temperature. A setup measured while empty may hang lower once occupied, and older straps can creep or fray. Check the manufacturer’s care and loading instructions and inspect stitching, seams, knots and connection points before each use. Replace damaged gear rather than compensating for it by changing the calculator inputs.</p><p>If you are using a ridgeline, spreader bars or a specialty hammock, the assumptions behind a basic geometry estimate may not match that design. Follow the product’s installation guide and use the calculator only for the dimensions it explicitly models.</p>
            TXT],
            ['title' => 'A sensible final safety check', 'html' => <<<'TXT'
            <p>After setup, confirm that the straps have not slid and that the suspension is not rubbing against a sharp edge. Keep children from swinging hard or standing in the hammock, which can create loads and movement the estimate does not represent. If the ground is uneven, choose a level site or reassess the clearances on both sides. The calculator’s dimensions do not replace checking the actual loaded setup.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hammock hang calculator work out?', 'a' => 'It returns hammock length, derived from the distance between anchors, the preferred sit height and the anchor height.'],
            ['q' => 'What do I need to enter to use the Hammock hang calculator?', 'a' => 'The form asks for the distance between anchors, the preferred sit height, the anchor height and the cord tension, which is 7 fields in total.'],
            ['q' => 'Can I enter distance between anchors in a different unit?', 'a' => 'Yes. Distance between anchors opens in meters and the chip beside it offers 34 units.'],
        ],
        'related' => [
            ['path' => '/everyday-life/age-in-hours', 'name' => 'Age in hours'],
            ['path' => '/everyday-life/age-in-minutes', 'name' => 'Age in minutes'],
            ['path' => '/everyday-life/age-in-months', 'name' => 'Age in months'],
        ],
    ],
];

<?php

/**
 * Fuel injector
 * /everyday-life/fuel-injector
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fuel injector',
    'meta' => ['title' => 'Fuel injector Calculator — Formula, Units & Example', 'description' => 'Fuel injector works out target horsepower at crankshaft from fuel type is.... Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Fuel injector Calculator', 'updated' => '2026-10-02'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fuel_type',
                            'label' => 'Fuel type is...',
                            'type' => 'select',
                            'options' => [
                                'gasoline' => '.5',
                                'race gas' => '.545',
                                'E85' => '.667',
                                'methanol' => '.95',
                                'diesel' => '.38',
                            ],
                            'dataset' => 'bsfc',
                            'control' => 'DROPDOWN',
                            'default' => 'gasoline',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'aspiration',
                            'label' => 'Aspiration',
                            'type' => 'select',
                            'options' => ['Naturally aspirated' => '1', 'Supercharged' => '2', 'Turbocharged' => '3'],
                            'dataset' => 'aspiration',
                            'control' => 'DROPDOWN',
                            'default' => 'Naturally aspirated',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hp_at',
                            'label' => 'Horsepower at the...',
                            'type' => 'select',
                            'options' => ['wheel' => '1', 'crankshaft' => '2'],
                            'dataset' => 'hp_at',
                            'control' => 'DROPDOWN',
                            'default' => 'crankshaft',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'whp',
                            'label' => 'Target horsepower at wheels',
                            'type' => 'number',
                            'suffix' => 'hp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chp',
                            'label' => 'Target horsepower at crankshaft',
                            'type' => 'number',
                            'suffix' => 'hp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cylinders',
                            'label' => 'Number of cylinders',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fuel_pressure',
                            'label' => 'Fuel pressure',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'bar',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '3', 'when' => null],
                                ['value' => '43.5', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'duty_cycle',
                            'label' => 'Max duty cycle',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => <<<'TXT'
                                  To safely support your setup with {{whp.formattedValue}}&nbsp;hp at the wheel across {{cylinders.formattedValue}} cylinders using {{fuel_type.name}} with a max duty cycle of {{duty_cycle.formattedValue}}%, your recommended minimum fuel injector flow rate is:
                                TXT],
                                ['when' => 'aspiration == 1', 'text' => '{{flow_rate1.formattedValue}}&nbsp;lb/hr; {{flow_rate1_cc.formattedValue}}&nbsp;cc/min; or {{flow_rate1_g.formattedValue}}&nbsp;g/s.'],
                                ['when' => 'aspiration == 2', 'text' => '{{flow_rate2.formattedValue}}&nbsp;lb/hr; {{flow_rate2_cc.formattedValue}}&nbsp;cc/min; or {{flow_rate2_g.formattedValue}}&nbsp;g/s.'],
                                ['when' => 'aspiration == 3', 'text' => '{{flow_rate3.formattedValue}}&nbsp;lb/hr; {{flow_rate3_cc.formattedValue}}&nbsp;cc/min; or {{flow_rate3_g.formattedValue}}&nbsp;g/s.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bsfc1',
                            'label' => 'Bsfc1',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flow_rate1',
                            'label' => 'Flow rate1',
                            'type' => 'number',
                            'suffix' => 'lb / hr',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bsfc2',
                            'label' => 'Bsfc2',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flow_rate2',
                            'label' => 'Flow rate2',
                            'type' => 'number',
                            'suffix' => 'lb / hr',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bsfc3',
                            'label' => 'Bsfc3',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flow_rate3',
                            'label' => 'Flow rate3',
                            'type' => 'number',
                            'suffix' => 'lb / hr',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flow_rate1_cc',
                            'label' => 'Flow rate1 cc',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flow_rate2_cc',
                            'label' => 'Flow rate2 cc',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flow_rate3_cc',
                            'label' => 'Flow rate3 cc',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flow_rate1_g',
                            'label' => 'Flow rate1 g',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flow_rate2_g',
                            'label' => 'Flow rate2 g',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flow_rate3_g',
                            'label' => 'Flow rate3 g',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'chp = whp * 1.15',
            'results' => ['whp' => '(20/23)*chp', 'chp' => '(23/20)*whp'],
        ],
        [
            'title' => 'flow_rate1 = ((chp * bsfc1) / (cylinders * (duty_cycle / 100) )) * sqrt(43.5 / fuel_pressure)',
            'results' => [
                'fuel_pressure' => '435000*pow(bsfc1, 2)*pow(chp, 2)/(pow(cylinders, 2)*pow(duty_cycle, 2)*pow(flow_rate1, 2))',
                'cylinders' => '50*sqrt(174)*bsfc1*chp*sqrt(1/fuel_pressure)/(duty_cycle*flow_rate1)',
                'duty_cycle' => '50*sqrt(174)*bsfc1*chp*sqrt(1/fuel_pressure)/(cylinders*flow_rate1)',
                'chp' => '(1/8700)*sqrt(174)*cylinders*duty_cycle*flow_rate1/(bsfc1*sqrt(1/fuel_pressure))',
                'flow_rate1' => '50*sqrt(174)*bsfc1*chp*sqrt(1/fuel_pressure)/(cylinders*duty_cycle)',
                'bsfc1' => '(1/8700)*sqrt(174)*cylinders*duty_cycle*flow_rate1/(chp*sqrt(1/fuel_pressure))',
            ],
        ],
        [
            'title' => 'flow_rate2 = ((chp * bsfc2) / (cylinders * (duty_cycle / 100) )) * sqrt(43.5 / fuel_pressure)',
            'results' => [
                'fuel_pressure' => '435000*pow(bsfc2, 2)*pow(chp, 2)/(pow(cylinders, 2)*pow(duty_cycle, 2)*pow(flow_rate2, 2))',
                'bsfc2' => '(1/8700)*sqrt(174)*cylinders*duty_cycle*flow_rate2/(chp*sqrt(1/fuel_pressure))',
                'cylinders' => '50*sqrt(174)*bsfc2*chp*sqrt(1/fuel_pressure)/(duty_cycle*flow_rate2)',
                'chp' => '(1/8700)*sqrt(174)*cylinders*duty_cycle*flow_rate2/(bsfc2*sqrt(1/fuel_pressure))',
                'duty_cycle' => '50*sqrt(174)*bsfc2*chp*sqrt(1/fuel_pressure)/(cylinders*flow_rate2)',
                'flow_rate2' => '50*sqrt(174)*bsfc2*chp*sqrt(1/fuel_pressure)/(cylinders*duty_cycle)',
            ],
        ],
        [
            'title' => 'flow_rate3 = ((chp * bsfc3) / (cylinders * (duty_cycle / 100) )) * sqrt(43.5 / fuel_pressure)',
            'results' => [
                'bsfc3' => '(1/8700)*sqrt(174)*cylinders*duty_cycle*flow_rate3/(chp*sqrt(1/fuel_pressure))',
                'fuel_pressure' => '435000*pow(bsfc3, 2)*pow(chp, 2)/(pow(cylinders, 2)*pow(duty_cycle, 2)*pow(flow_rate3, 2))',
                'flow_rate3' => '50*sqrt(174)*bsfc3*chp*sqrt(1/fuel_pressure)/(cylinders*duty_cycle)',
                'cylinders' => '50*sqrt(174)*bsfc3*chp*sqrt(1/fuel_pressure)/(duty_cycle*flow_rate3)',
                'duty_cycle' => '50*sqrt(174)*bsfc3*chp*sqrt(1/fuel_pressure)/(cylinders*flow_rate3)',
                'chp' => '(1/8700)*sqrt(174)*cylinders*duty_cycle*flow_rate3/(bsfc3*sqrt(1/fuel_pressure))',
            ],
        ],
        [
            'title' => 'flow_rate1_cc = flow_rate1 * 10.5',
            'results' => ['flow_rate1_cc' => '(21/2)*flow_rate1', 'flow_rate1' => '(2/21)*flow_rate1_cc'],
        ],
        [
            'title' => 'flow_rate2_cc = flow_rate2 * 10.5',
            'results' => ['flow_rate2' => '(2/21)*flow_rate2_cc', 'flow_rate2_cc' => '(21/2)*flow_rate2'],
        ],
        [
            'title' => 'flow_rate3_cc = flow_rate3 * 10.5',
            'results' => ['flow_rate3_cc' => '(21/2)*flow_rate3', 'flow_rate3' => '(2/21)*flow_rate3_cc'],
        ],
        [
            'title' => 'flow_rate1_g = flow_rate1 * .126',
            'results' => ['flow_rate1_g' => '(63/500)*flow_rate1', 'flow_rate1' => '(500/63)*flow_rate1_g'],
        ],
        [
            'title' => 'flow_rate2_g = flow_rate2 * .126',
            'results' => ['flow_rate2' => '(500/63)*flow_rate2_g', 'flow_rate2_g' => '(63/500)*flow_rate2'],
        ],
        [
            'title' => 'flow_rate3_g = flow_rate3 * .126',
            'results' => ['flow_rate3_g' => '(63/500)*flow_rate3', 'flow_rate3' => '(500/63)*flow_rate3_g'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Supply the target horsepower at crankshaft, number of cylinders, the max duty cycle and the Flow rate 1 and the Fuel injector calculator solves for <strong>target horsepower at wheels</strong>.
        TXT,
        'sections' => [
            ['title' => 'How does the Fuel injector calculator work?', 'html' => <<<'TXT'
            <p>The Fuel injector calculator takes the values in the form, applies the relationship described below and reports <strong>target horsepower at wheels</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the aspiration); then you type in the target horsepower at crankshaft, number of cylinders, the max duty cycle and the Flow rate 1.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 5 options, such as gasoline, race gas and E85. </li><li>Pick the option that matches your case — 3 options, such as naturally aspirated, supercharged and turbocharged. </li><li>Pick the option that matches your case — 2 options, such as wheel and crankshaft. </li><li>A number, expressed in hp.</li><li>A plain number with no unit attached.</li><li>A number, expressed in %.</li><li>A number, expressed in lb / hr.</li><li>A number, expressed in lb / hr.</li><li>A plain number with no unit attached.</li></ul><p>3 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Aspiration</strong></td><td>One of 3 options, such as naturally aspirated, supercharged and turbocharged.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Target horsepower at wheels</strong></td><td>A number stated in hp.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Target horsepower at crankshaft</strong></td><td>A number stated in hp.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Number of cylinders</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Fuel pressure</strong></td><td>A measured quantity, 28 units available.</td><td>bars</td><td>Calculated</td></tr><tr><td><strong>Max duty cycle</strong></td><td>A number stated in %.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Flow rate 1</strong></td><td>A number stated in lb / hr.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Flow rate 2</strong></td><td>A number stated in lb / hr.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Flow rate 3</strong></td><td>A number stated in lb / hr.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Flow rate 1 cc</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Flow rate 2 cc</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Flow rate 3 cc</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Flow rate 1 g</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Flow rate 2 g</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Flow rate 3 g</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Fuel injector calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Target horsepower at wheels</span><span class="formula-eq">=</span><span class="formula-rhs">(20 ÷ 23) × target horsepower at crankshaft</span></div><div class="formula-row"><span class="formula-lhs">Fuel pressure</span><span class="formula-eq">=</span><span class="formula-rhs">435000 × (Bsfc 1 ^ 2) × (target horsepower at crankshaft ^ 2) ÷ ((number of cylinders ^ 2) × (max duty cycle ^ 2) × (Flow rate 1 ^ 2))</span></div><div class="formula-row"><span class="formula-lhs">Fuel pressure</span><span class="formula-eq">=</span><span class="formula-rhs">435000 × (Bsfc 2 ^ 2) × (target horsepower at crankshaft ^ 2) ÷ ((number of cylinders ^ 2) × (max duty cycle ^ 2) × (Flow rate 2 ^ 2))</span></div><div class="formula-row"><span class="formula-lhs">Bsfc 3</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 8700) × the square root of (174) × number of cylinders × max duty cycle × Flow rate 3 ÷ (target horsepower at crankshaft × the square root of (1 ÷ fuel pressure))</span></div><div class="formula-row"><span class="formula-lhs">Flow rate 1 cc</span><span class="formula-eq">=</span><span class="formula-rhs">(21 ÷ 2) × flow rate1</span></div><div class="formula-row"><span class="formula-lhs">Flow rate 2</span><span class="formula-eq">=</span><span class="formula-rhs">(2 ÷ 21) × Flow rate 2 cc</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in bars, and convertible to any of the 28 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Pressure, opening in bars</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Fuel injector calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 4 figures keep coming back — the target horsepower at crankshaft, number of cylinders and the max duty cycle — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/180-day">180 day</a>, <a href="/everyday-life/30-day">30 day</a> and <a href="/everyday-life/30-min">30 min</a>.</p>
            TXT],
            ['title' => 'Using an injector-flow estimate responsibly', 'html' => <<<'TXT'
            <p>The Fuel injector calculator estimates flow requirements from inputs such as fuel type, aspiration, target horsepower, cylinder count, fuel pressure and the chosen duty-cycle limit. It can help compare injector sizes during early planning, but the result is only as reliable as the assumptions. Enter the horsepower basis the page asks for—crank or wheel output—and do not substitute one for the other. A target at the wheels implies drivetrain losses before the engine’s crankshaft output is considered, so mixing those values changes the sizing estimate.</p>
            <p>Fuel type matters because the calculator uses fuel-specific consumption assumptions. Select the fuel that will actually be used, and review the BSFC or related values shown by the page rather than treating them as universal constants. Engine configuration, tune, boost, efficiency and operating conditions can move real fuel demand. A published injector rating is also tied to a specified test fluid and pressure; two products with the same nominal flow may not deliver identical performance in a particular system.</p>
            <p>Duty cycle is the share of time an injector is commanded open within an engine cycle. A lower maximum can leave operating headroom, while an overly aggressive limit may not be appropriate for the injector or control system. The calculator does not certify that a chosen duty cycle is safe. Use the injector maker’s data and a qualified tuner’s recommendations for the engine and intended use. A paper estimate is not a substitute for logging and checking the actual system under controlled conditions.</p>
            <p>Fuel pressure must be entered on the basis expected by the calculator. Injector flow changes with the pressure difference across the injector, not just a gauge reading considered in isolation. Regulator configuration and manifold pressure can matter, particularly on forced-induction setups. If the pressure reference or units are uncertain, stop and confirm them from the service information before comparing results. A unit mismatch can create a plausible-looking but materially incorrect estimate.</p>
            <p>The output should be compared with available injector ratings, but do not simply select the smallest product that clears the displayed number. Consider the manufacturer’s flow tolerance, electrical compatibility, spray pattern, impedance, connector, rail fitment and the capabilities of the fuel pump, lines and regulator. Larger injectors can also be difficult to control at very small pulse widths, so “more flow” is not automatically a better match for every engine.</p>
            <p>Use the calculator to create scenarios—for example, compare two horsepower goals or fuel types while holding the rest of the assumptions steady. Record the inputs beside each result. Then review the complete fuel system with a qualified automotive professional, especially for a modified or high-output engine. This tool estimates injector flow; it does not select a complete fuel system, write an engine calibration, or guarantee performance, emissions compliance or safe operation.</p>
            TXT],
            ['title' => 'Compare the estimate with product specifications', 'html' => <<<'TXT'
            <p>Injector listings may state flow at a particular pressure, fuel and test condition. Compare like with like and read the manufacturer’s footnotes before treating a catalog number as directly interchangeable with the calculator’s output. If the calculator lets you enter a pressure, confirm that it represents the same pressure basis as the injector rating. For a forced-induction engine, the relevant pressure difference can change under boost; a static base-pressure number alone may not describe the operating condition.</p><p>Injector selection also interacts with the control unit and the rest of the fuel system. Connector, impedance, dead-time data, minimum controllable pulse width and calibration support can matter alongside peak flow. A qualified tuner should validate the chosen injectors with appropriate data and monitoring, not just a nominal horsepower estimate.</p>
            TXT],
            ['title' => 'Treat assumptions as part of the answer', 'html' => <<<'TXT'
            <p>Record the calculator’s selected fuel, aspiration, horsepower basis, cylinder count, pressure and duty-cycle assumptions with the result. A flow number separated from those inputs is easy to misuse. If your build changes—for example, a different fuel blend, boost level or power target—run the estimate again and review the fuel-system plan rather than scaling the previous answer informally.</p><p>Do not use this estimate to justify operation at the edge of an injector’s or pump’s rating. The calculator does not model every transient condition, component tolerance, temperature effect or control strategy. Product documentation and measurements from a qualified tuner are needed before a modified engine is run under load.</p>
            TXT],
            ['title' => 'Use one change at a time in a comparison', 'html' => <<<'TXT'
            <p>For planning, compare scenarios by changing one assumption at a time: fuel, horsepower goal, pressure or duty cycle. Keep the other entries fixed and label each run. This shows which choice drives the change in estimated flow and makes it easier to discuss with a tuner. It is a useful screening exercise, not a recommendation to buy the highest number in the comparison.</p><p>Confirm that the selected horsepower value refers to the engine output the form requests. Mixing wheel and crank figures can make a result misleading even when every unit is entered correctly.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fuel injector calculator work out?', 'a' => 'It returns target horsepower at wheels, derived from the target horsepower at crankshaft, number of cylinders and the max duty cycle.'],
            ['q' => 'What do I need to enter to use the Fuel injector calculator?', 'a' => 'The form asks for the target horsepower at crankshaft, number of cylinders, the max duty cycle and the flow rate1, which is 9 fields in total.'],
            ['q' => 'Can I enter fuel pressure in a different unit?', 'a' => 'Yes. Fuel pressure opens in bars and the chip beside it offers 28 units.'],
        ],
        'related' => [
            ['path' => '/everyday-life/180-day', 'name' => '180 day'],
            ['path' => '/everyday-life/30-day', 'name' => '30 day'],
            ['path' => '/everyday-life/30-min', 'name' => '30 min'],
        ],
    ],
];

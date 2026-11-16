<?php

/**
 * Fuel pump
 * /everyday-life/fuel-pump
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fuel pump',
    'meta' => ['title' => 'Fuel pump Calculator: Formula, Steps & Examples', 'description' => 'Fuel pump works out flow rate from power, induction type and fuel type. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Fuel pump Calculator', 'updated' => '2026-08-22'],
    'sections' => [
        [
            'title' => 'Flow',
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
                            'unit_default' => 'hp_M',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'induction',
                            'label' => 'Induction type',
                            'type' => 'select',
                            'options' => ['Naturally aspirated' => '0.000500872', 'Turbocharged' => '0.0005565', 'Supercharged' => '0.000667829'],
                            'dataset' => 'induction',
                            'control' => 'DROPDOWN',
                            'default' => 'Naturally aspirated',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fuel',
                            'label' => 'Fuel type',
                            'type' => 'select',
                            'options' => ['Petrol' => '0.0000002777777', 'Ethanol E30' => '0.00000038783', 'Ethanol E85' => '0.000000336317', 'Methanol' => '0.00000060241'],
                            'dataset' => 'fuel',
                            'control' => 'DROPDOWN',
                            'default' => 'Petrol',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flow',
                            'label' => 'Flow rate',
                            'type' => 'number',
                            'unit' => '146',
                            'unit_default' => 'L-h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Pressure',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'base',
                            'label' => 'Base fuel pressure',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'bar',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'boost',
                            'label' => 'Boost pressure',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'bar',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'system',
                            'label' => 'Fuel system type',
                            'type' => 'select',
                            'options' => ['Return' => '1', 'Returnless' => '0'],
                            'dataset' => 'system',
                            'control' => 'DROPDOWN',
                            'default' => 'Return',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pressure',
                            'label' => 'Fuel pump pressure',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'bar',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'flow=power*induction*fuel',
            'results' => ['fuel' => 'flow/(induction*power)', 'flow' => 'fuel*induction*power', 'power' => 'flow/(fuel*induction)', 'induction' => 'flow/(fuel*power)'],
        ],
        [
            'title' => 'pressure=base+(boost*system)',
            'results' => ['boost' => '(-base + pressure)/system', 'system' => '(-base + pressure)/boost', 'base' => '-boost*system + pressure', 'pressure' => 'base + boost*system'],
        ],
    ],
    'article' => [
        'intro' => 'Supply the power, the flow rate, the base fuel pressure and the fuel pump pressure and the Fuel pump calculator solves for <strong>fuel type</strong>.',
        'sections' => [
            ['title' => 'How does the Fuel pump calculator work?', 'html' => <<<'TXT'
            <p>The Fuel pump calculator takes the values in the form, applies the relationship described below and reports <strong>fuel type</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the induction type and the fuel system type); then you type in the power, the flow rate, the base fuel pressure and the fuel pump pressure.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in metric horsepowers. The unit chip switches it to any of the 21 supported units.</li><li>Pick the option that matches your case — 3 options, such as naturally aspirated, turbocharged and supercharged. </li><li>A measured quantity, entered by default in liters per hour. The unit chip switches it to any of the 39 supported units.</li><li>A measured quantity, entered by default in bars. The unit chip switches it to any of the 28 supported units.</li><li>Pick the option that matches your case — 2 options, such as return and returnless. </li><li>A measured quantity, entered by default in bars. The unit chip switches it to any of the 28 supported units.</li></ul><p>3 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Power</strong></td><td>A measured quantity, 21 units available.</td><td>metric horsepowers</td><td>You supply it</td></tr><tr><td><strong>Induction type</strong></td><td>One of 3 options, such as naturally aspirated, turbocharged and supercharged.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Fuel type</strong></td><td>One of 4 options, such as petrol, ethanol E30 and ethanol E85.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Flow rate</strong></td><td>A measured quantity, 39 units available.</td><td>liters per hour</td><td>You supply it</td></tr><tr><td><strong>Base fuel pressure</strong></td><td>A measured quantity, 28 units available.</td><td>bars</td><td>You supply it</td></tr><tr><td><strong>Boost pressure</strong></td><td>A measured quantity, 28 units available.</td><td>bars</td><td>Calculated</td></tr><tr><td><strong>Fuel system type</strong></td><td>One of 2 options, such as return and returnless.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Fuel pump pressure</strong></td><td>A measured quantity, 28 units available.</td><td>bars</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Fuel pump calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Fuel type</span><span class="formula-eq">=</span><span class="formula-rhs">flow rate ÷ (induction type × power)</span></div><div class="formula-row"><span class="formula-lhs">Boost pressure</span><span class="formula-eq">=</span><span class="formula-rhs">(-base fuel pressure + fuel pump pressure) ÷ fuel system type</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>The option the calculation settles on.</li><li>Shown in bars, and convertible to any of the 28 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Power, opening in metric horsepowers</li><li>Flow rate, opening in liters per hour</li><li>Pressure, opening in bars</li><li>Pressure, opening in bars</li><li>Pressure, opening in bars</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Fuel pump calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Any time the same 4 figures keep coming back — the power, the flow rate and the base fuel pressure — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/30-min">30 min</a>, <a href="/everyday-life/45-day">45 day</a> and <a href="/everyday-life/6-month">6 month</a>.</p>
            TXT],
            ['title' => 'Sizing a fuel pump from engine assumptions', 'html' => <<<'TXT'
            <p>The Fuel pump calculator estimates a flow requirement from power, induction type, fuel and pressure inputs. It helps with a first-pass comparison, but pump selection depends on more than a single flow number. Enter power on the basis the form expects and check whether it refers to engine or wheel output. A wheel-horsepower target may require a higher engine output to account for drivetrain loss; using the wrong basis changes the estimate.</p>
            <p>Fuel type affects the required flow because different fuels have different consumption assumptions. Select the fuel that will actually be used and review the model’s factor rather than assuming a gasoline estimate transfers unchanged to another fuel. Engine efficiency, tuning, boost, temperature and operating conditions can all change real demand. Treat the calculator’s assumptions as inputs to be checked, not as universal constants.</p>
            <p>Pressure matters because many pumps deliver less flow as operating pressure rises. Compare the estimated requirement with the manufacturer’s pump curve at the actual system pressure and voltage. A pump’s advertised maximum flow at low pressure may not be available at the pressure needed by the engine. For forced induction, verify how base pressure and boost pressure affect the differential pressure across the injectors and the pump’s operating point.</p>
            <p>Include the complete fuel system in the review: pump, wiring, relay, filter, lines, regulator, injectors and tank pickup. Voltage drop at the pump can reduce delivery, and a restriction or undersized line can limit flow. The calculator does not size these components or account for every transient condition. Use appropriate margins recommended by the component manufacturer and a qualified tuner.</p>
            <p>Do not select the smallest pump that barely meets the displayed estimate. Consider continuous duty, fuel compatibility, installation, noise, cooling and the manufacturer’s specified operating range. More capacity is not automatically better if it creates control or return-flow issues; the system must be designed as a whole.</p>
            <p>Run scenarios by changing one input at a time, such as fuel type, power goal or pressure, and record the assumptions. Then compare the result with technical data for the exact pump model. A professional should verify the setup, especially for a modified engine or high-load use. This calculator estimates flow; it does not guarantee fuel delivery, engine performance, emissions compliance or safe operation.</p>
            TXT],
            ['title' => 'Flow, pressure and the fuel-pump curve', 'html' => <<<'TXT'
            <p>A pump’s flow rating is meaningful only at a stated pressure and voltage. As pressure rises, many pumps deliver less volume per hour, so a free-flow figure or a rating at low pressure may not match the engine’s operating point. Use the manufacturer’s flow curve for the exact pump and compare it with the pressure the system must maintain. If the calculator’s pressure field represents base pressure, do not confuse it with total rail pressure under boost.</p><p>Fuel pressure regulation determines the pressure difference across the injector. On a manifold-referenced system, rail pressure may rise as boost rises to maintain that difference. The pump must still deliver fuel against the resulting system pressure. Check regulator design, return-line capacity and the pump curve under those conditions; a single base-pressure number may not capture them.</p><p>Power is also an assumption. Clarify whether the target is at the crankshaft or wheels, and use the same basis as the calculator. Drivetrain losses vary, so adding an arbitrary fixed percentage can be misleading. Fuel-consumption factors differ by engine, tune and fuel type. The calculator’s model is a screening estimate, not an engine-specific dyno or calibration result.</p><p>Review pump voltage at the connector under load. Long wiring, undersized conductors, poor grounds, a weak relay or a low charging voltage can reduce pump performance. A pump may meet its catalog rating on a test bench but fail to deliver it in an installed vehicle. Wiring, fusing and fuel compatibility should follow the component manufacturer’s instructions.</p><p>Consider the full system: tank pickup, pre-filter, pump, post-filter, fuel lines, regulator, injectors and return path. Restrictions, hot fuel, low tank level and installation orientation can affect reliability. For an engine used under high load, a qualified tuner or fuel-system specialist should validate the system with suitable measurements and safe procedures.</p><p>Use the calculator to compare assumptions, then check the exact pump curve and system design. Do not operate an engine on the assumption that a mathematical flow estimate guarantees adequate delivery. This page does not certify a pump, tune or vehicle as safe.</p>
            TXT],
            ['title' => 'What to verify with a pump manufacturer or tuner', 'html' => <<<'TXT'
            <p>Before purchasing, confirm the exact pump part number, fuel compatibility, flow curve, voltage range, pressure range, continuous-duty limits and installation requirements. If you are using ethanol blends or a specialized fuel, check that seals and internal materials are rated for it. A generic pump family name is not enough to verify compatibility.</p><p>Ask how the system will maintain fuel pressure at the intended load and what measurements will confirm that it does. A tuner can evaluate logs and operating conditions, while the pump maker can clarify the published curve and test basis. The calculator provides an estimate from simplified inputs; it does not validate the installed system.</p><p>Also check the vehicle’s electrical supply and safety requirements. Correct fuse sizing, wiring gauge, relay arrangement, grounding and fuel-line routing depend on the installation. Follow the manufacturer’s instructions and local regulations. If you are unsure, have a qualified automotive professional install and test the system.</p>
            TXT],
            ['title' => 'Keep a record of the chosen assumptions', 'html' => <<<'TXT'
            <p>Save the power basis, fuel, pressure, induction setting and target flow with any pump comparison. If a tuner or manufacturer reviews the estimate, those inputs help them identify where the model differs from the actual system.</p>
            TXT],
            ['title' => 'Check the result against the pump curve', 'html' => <<<'TXT'
            <p>A catalogue flow figure without its pressure and voltage is not enough for final selection. Compare the calculator’s estimated need with the manufacturer’s curve at the system’s actual conditions, and ask a specialist to review any uncertainty.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fuel pump calculator work out?', 'a' => 'It returns fuel type, derived from the power, the flow rate and the base fuel pressure.'],
            ['q' => 'What do I need to enter to use the Fuel pump calculator?', 'a' => 'The form asks for the power, the flow rate, the base fuel pressure and the fuel pump pressure, which is 6 fields in total.'],
            ['q' => 'Can I enter power in a different unit?', 'a' => 'Yes. Power opens in metric horsepowers and the chip beside it offers 21 units.'],
        ],
        'related' => [
            ['path' => '/everyday-life/30-min', 'name' => '30 min'],
            ['path' => '/everyday-life/45-day', 'name' => '45 day'],
            ['path' => '/everyday-life/6-month', 'name' => '6 month'],
        ],
    ],
];

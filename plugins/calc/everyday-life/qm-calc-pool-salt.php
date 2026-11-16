<?php

/**
 * Pool salt
 * /everyday-life/pool-salt
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pool salt',
    'meta' => ['title' => 'Pool salt Calculator: Formula, Steps & Examples', 'description' => 'Pool salt takes pool volume, current salt concentration and desired salt concentration and returns volume of water to replace and amount of salt to add.', 'h1' => 'Pool salt Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pool_volume',
                            'label' => 'Pool volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'current_ppm',
                            'label' => 'Current salt concentration',
                            'type' => 'number',
                            'suffix' => 'ppm',
                            'help' => 'Obtained from a salt chlorine generator or a salt testing&nbsp;kit.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'desired_ppm',
                            'label' => 'Desired salt concentration',
                            'type' => 'number',
                            'suffix' => 'ppm',
                            'help' => 'Optimal range for salt in a pool is 2,700-3,400&nbsp;ppm.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3200',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => ' TIP: The recommended range for salt concentration in a pool is 2700-3400&nbsp;ppm, so you may want to consider&nbsp;'],
                                ['when' => 'desired_ppm > 3400', 'text' => 'lowering this value to have the perfect swim !&nbsp;'],
                                ['when' => 'desired_ppm < 2700', 'text' => 'increasing this value to have the perfect swim !'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'replace_volume_copy',
                            'label' => 'Volume of water to replace',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
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
                                ['when' => 'current_ppm > desired_ppm', 'text' => <<<'TXT'
                                You need to replace {{replace_volume_copy_gallons.formattedValue}}&nbsp;gallons ({{replace_volume_copy_liters.formattedValue}}&nbsp;liters) of pool water with normal water.
                                TXT],
                                ['when' => 'current_ppm == desired_ppm', 'text' => 'You don\'t need to modify anything since your required concentration is the same as your current concentration!'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salt_to_add_copy',
                            'label' => 'Amount of salt to add',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'replace_volume',
                            'label' => 'Replace volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'excess_ppm',
                            'label' => 'Excess ppm',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'required_ppm',
                            'label' => 'Required ppm',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salt_to_add',
                            'label' => 'Salt to add',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'replace_volume_copy_gallons',
                            'label' => 'Replace volume copy gallons',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'replace_volume_copy_liters',
                            'label' => 'Replace volume copy liters',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'desired_ppm - current_ppm = required_ppm',
            'results' => ['required_ppm' => '-current_ppm + desired_ppm', 'current_ppm' => 'desired_ppm - required_ppm', 'desired_ppm' => 'current_ppm + required_ppm'],
        ],
        [
            'title' => 'current_ppm - desired_ppm = excess_ppm',
            'results' => ['excess_ppm' => 'current_ppm - desired_ppm', 'desired_ppm' => 'current_ppm - excess_ppm', 'current_ppm' => 'desired_ppm + excess_ppm'],
        ],
        [
            'title' => 'salt_to_add = required_ppm * pool_volume',
            'results' => ['pool_volume' => 'salt_to_add/required_ppm', 'required_ppm' => 'salt_to_add/pool_volume', 'salt_to_add' => 'pool_volume*required_ppm'],
        ],
        [
            'title' => 'pool_volume * excess_ppm = current_ppm * replace_volume',
            'results' => ['pool_volume' => 'current_ppm*replace_volume/excess_ppm', 'excess_ppm' => 'current_ppm*replace_volume/pool_volume', 'current_ppm' => 'excess_ppm*pool_volume/replace_volume', 'replace_volume' => 'excess_ppm*pool_volume/current_ppm'],
        ],
        [
            'title' => 'salt_to_add_copy = copy(salt_to_add)',
            'results' => ['salt_to_add_copy' => 'copy(salt_to_add)'],
        ],
        [
            'title' => 'replace_volume_copy = copy(replace_volume)',
            'results' => ['replace_volume_copy' => 'copy(replace_volume)'],
        ],
    ],
    'js' => '"use strict";omni.define("copy",function(value_to_copy){return Math.round(value_to_copy*100)/100});//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Supply the desired salt concentration, the replace volume and the salt to add and the Pool salt calculator solves for <strong>required ppm</strong>.

        The panel waits for the button.
        TXT,
        'sections' => [
            ['title' => 'How does the Pool salt calculator work?', 'html' => <<<'TXT'
            <p>The Pool salt calculator takes the values in the form, applies the relationship described below and reports <strong>required ppm</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the desired salt concentration, the replace volume and the salt to add.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A number, expressed in ppm.</li><li>A measured quantity, entered by default in liters. The unit chip switches it to any of the 40 supported units.</li><li>A measured quantity, entered by default in kilograms. The unit chip switches it to any of the 29 supported units.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Pool volume</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>Calculated</td></tr><tr><td><strong>Current salt concentration</strong></td><td>A number stated in ppm.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Desired salt concentration</strong></td><td>A number stated in ppm.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Volume of water to replace</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>Calculated</td></tr><tr><td><strong>Amount of salt to add</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Replace volume</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>You supply it</td></tr><tr><td><strong>Excess ppm</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Required ppm</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Salt to add</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Pool salt calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Required ppm</span><span class="formula-eq">=</span><span class="formula-rhs">-current salt concentration + desired salt concentration</span></div><div class="formula-row"><span class="formula-lhs">Excess ppm</span><span class="formula-eq">=</span><span class="formula-rhs">current salt concentration − desired salt concentration</span></div><div class="formula-row"><span class="formula-lhs">Pool volume</span><span class="formula-eq">=</span><span class="formula-rhs">salt to add ÷ required ppm</span></div><div class="formula-row"><span class="formula-lhs">Pool volume</span><span class="formula-eq">=</span><span class="formula-rhs">current salt concentration × replace volume ÷ excess ppm</span></div><div class="formula-row"><span class="formula-lhs">Amount of salt to add</span><span class="formula-eq">=</span><span class="formula-rhs">(salt to add)</span></div><div class="formula-row"><span class="formula-lhs">Volume of water to replace</span><span class="formula-eq">=</span><span class="formula-rhs">(replace volume)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in liters, and convertible to any of the 40 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in liters, and convertible to any of the 40 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Volume, opening in liters</li><li>Volume, opening in liters</li><li>Mass, opening in kilograms</li><li>Volume, opening in liters</li><li>Mass, opening in kilograms</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Pool salt calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 3 figures keep coming back — the desired salt concentration, the replace volume and the salt to add — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/cost-per-minute">Cost per minute</a>, <a href="/everyday-life/count-hours">Count hours</a> and <a href="/everyday-life/countdown">Countdown</a>.</p>
            TXT],
            ['title' => 'Estimating pool salt from measured concentration', 'html' => <<<'TXT'
            <p>The Pool salt calculator uses pool volume, current salt concentration and desired concentration to estimate a salt addition or dilution. Start with a reliable current reading and check that the pool volume and concentration units match the fields. Parts per million is a concentration measure, not a mass of salt. The amount required depends on how much water is in the system, so an incorrect volume can produce a proportionally incorrect estimate.</p>
            <p>Use a test method suitable for the pool and follow its instructions. Salt readings can vary with test strips, electronic meters, temperature and calibration. If the reading is near a product limit or seems implausible, repeat it with a dependable method before changing the water. Do not assume the calculator can validate the test result.</p>
            <p>Check the salt type and product label. Saltwater chlorine generators may specify a compatible grade and purity; ordinary table salt, road salt and pool salt are not automatically interchangeable. Follow the equipment maker’s instructions for acceptable salt, target concentration and adding procedure. This calculator does not know the generator model or the chemical composition of a product.</p>
            <p>When the current concentration is higher than the target, a simple addition formula cannot reduce it by adding salt. The page may calculate replacement volume or a related dilution estimate; confirm the label and result carefully. Replacement water also changes other dissolved substances and may affect water balance. Do not drain or refill a pool without considering the pool structure, groundwater and local rules.</p>
            <p>Volume estimates should reflect the actual pool shape and water level. A rectangular pool can be estimated from length, width and average depth, while a sloped or irregular pool needs a more careful calculation. If the form asks for a replacement volume, check whether it is in gallons or liters and whether the result is a fraction or an amount. Unit mismatches are a common source of implausible recommendations.</p>
            <p>Run scenarios only as arithmetic checks. Record the measured concentration, target, pool volume, product and date, then compare the result with the salt-system manufacturer’s instructions. Add chemicals only as directed, with appropriate circulation and handling precautions. Never mix chemicals or allow undissolved material to damage a surface or equipment.</p>
            <p>The calculator estimates a concentration adjustment; it does not test water, assess equipment condition or say whether the pool is safe to use. Retest after any treatment and follow the equipment maker’s guidance. Ask a qualified pool professional when readings conflict or when a large correction is being considered.</p>
            TXT],
            ['title' => 'Plan a correction without guessing', 'html' => <<<'TXT'
            <p>Before changing the salt level, confirm the pool type and the salt system’s target range in its manual. The calculator’s target is a user input; it is not automatically the correct setpoint for every chlorinator. If you do not know the required range, look up the exact model rather than choosing a value because it appears in a generic chart.</p><p>Current salt concentration should be measured with a method appropriate for the system. Salt test strips, drop tests and electronic meters can have different resolution and calibration needs. Rinse and store instruments according to their instructions, and check calibration where applicable. If two tests disagree substantially, resolve the measurement before calculating a correction.</p><p>The amount added can depend on salt purity and how much of the product is active salt. The calculator may assume a standard product and does not read the bag label. Check the product’s ingredient statement and system compatibility. Do not substitute a different grade without confirmation from the equipment maker.</p><p>For a high reading, a dilution or partial replacement may be considered in some pool-maintenance plans, but it is not a universal remedy. Replacement water can affect other chemistry, and draining a pool can create structural or groundwater risks. Consult a pool professional before a large drain or refill, and follow local requirements.</p><p>After any maintenance, circulate and retest according to the chlorinator and product instructions. Do not rely on the calculated amount alone to decide that the system is ready or that water is safe to use. Verify operation and readings with the equipment guidance.</p><p>Keep a log of salt readings, test method, water replacement, product amount and date. This makes trends easier to spot and helps diagnose a salt-system warning. The calculator is a planning aid for concentration arithmetic, not a diagnostic tool for the generator or a complete pool-water treatment plan.</p>
            TXT],
            ['title' => 'Compare the result with your salt-system manual', 'html' => <<<'TXT'
            <p>Different saltwater chlorinators specify different operating ranges. Check the exact manual for the system installed and do not assume that a value recommended for another model is appropriate. If the calculator’s target field is user-selected, entering a target outside the maker’s range can produce a mathematically consistent but unhelpful answer.</p><p>Also distinguish salt concentration from total dissolved solids and from sanitizer level. These are separate water measurements. A salt reading does not tell you whether chlorine is present at the required level, whether pH is balanced or whether the water is suitable for swimming. Use the proper tests for each parameter.</p><p>If you are replacing water, confirm the replacement volume is measured from the total pool volume and the desired reduction. The calculator may display several replacement outputs in different units; read the label carefully before interpreting a copy-ready value. Replacing too much water can affect water balance and pool structure, so large changes deserve professional guidance.</p><p>After an adjustment, allow the system to circulate and recheck according to the manufacturer’s process. The salt concentration can take time to become uniform, and a sample taken near a recent addition may not represent the whole pool. Avoid repeated additions based on an immediate reading before mixing is complete.</p>
            TXT],
            ['title' => 'Keep a simple water-care log', 'html' => <<<'TXT'
            <p>For recurring maintenance, record each salt reading with the test method, pool volume estimate, target range, product and date. A log helps distinguish a one-time correction from a gradual trend and gives a pool professional useful context if the generator reports a warning. Do not make repeated large corrections from a single reading; confirm the measurement and consult the system instructions first.</p><p>If different testers report different values, compare their calibration, units and sample timing. The calculator cannot resolve disagreement between measurements.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pool salt calculator work out?', 'a' => 'It returns required ppm, derived from the desired salt concentration, the replace volume and the salt to add.'],
            ['q' => 'What do I need to enter to use the Pool salt calculator?', 'a' => 'The form asks for the desired salt concentration, the replace volume and the salt to add, which is 3 fields in total.'],
            ['q' => 'Can I enter pool volume in a different unit?', 'a' => 'Yes. Pool volume opens in liters and the chip beside it offers 40 units.'],
        ],
        'related' => [
            ['path' => '/everyday-life/cost-per-minute', 'name' => 'Cost per minute'],
            ['path' => '/everyday-life/count-hours', 'name' => 'Count hours'],
            ['path' => '/everyday-life/countdown', 'name' => 'Countdown'],
        ],
    ],
];

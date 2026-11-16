<?php

/**
 * Clay shrinkage
 * /everyday-life/clay-shrinkage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Clay shrinkage',
    'meta' => ['title' => 'Clay shrinkage Calculator — Formula, Units & Example', 'description' => 'Clay shrinkage takes length, height and width and returns length and height. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Clay shrinkage Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => 'Original dimensions',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'originalLength',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'originalHeight',
                            'label' => 'Height',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'originalWidth',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'clayShrinkage',
                            'label' => 'Clay shrinkage',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Usually 10%-20%.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Usually 10%-20%. Using a metal clay? Check the metal clay shrinkage chart in the "What is metal clay? Metal clay shrinkage chart" section in the article for the specific values.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Final dimensions',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'finalLength',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'finalHeight',
                            'label' => 'Height',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'finalWidth',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'finalLength=originalLength*(1-(clayShrinkage/100))',
            'results' => ['originalLength' => '-100*finalLength/(clayShrinkage - 100)', 'finalLength' => '(1/100)*originalLength*(100 - clayShrinkage)', 'clayShrinkage' => '-100*finalLength/originalLength + 100'],
        ],
        [
            'title' => 'finalWidth=originalWidth*(1-(clayShrinkage/100))',
            'results' => ['originalWidth' => '-100*finalWidth/(clayShrinkage - 100)', 'finalWidth' => '(1/100)*originalWidth*(100 - clayShrinkage)', 'clayShrinkage' => '-100*finalWidth/originalWidth + 100'],
        ],
        [
            'title' => 'finalHeight=originalHeight*(1-(clayShrinkage/100))',
            'results' => ['finalHeight' => '(1/100)*originalHeight*(100 - clayShrinkage)', 'originalHeight' => '-100*finalHeight/(clayShrinkage - 100)', 'clayShrinkage' => '-100*finalHeight/originalHeight + 100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Clay shrinkage calculator turns the height, the clay shrinkage and more into <strong>length (Original dimensions)</strong>.

        Press Calculate for the answer; change a value and it steps off screen until you press again, so each edit can be judged on its own.
        TXT,
        'sections' => [
            ['title' => 'How does the Clay shrinkage calculator work?', 'html' => <<<'TXT'
            <p>The Clay shrinkage calculator takes the values in the form, applies the relationship described below and reports <strong>length (Original dimensions)</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the height (Original dimensions), the clay shrinkage, the length (Final dimensions) and the width (Final dimensions).</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Length (Original dimensions)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Height (Original dimensions)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Width (Original dimensions)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Clay shrinkage</strong></td><td>A number stated in %.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Length (Final dimensions)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Height (Final dimensions)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Width (Final dimensions)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Clay shrinkage calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Length</span><span class="formula-eq">=</span><span class="formula-rhs">-100 × length ÷ (clay shrinkage − 100)</span></div><div class="formula-row"><span class="formula-lhs">Width</span><span class="formula-eq">=</span><span class="formula-rhs">-100 × width ÷ (clay shrinkage − 100)</span></div><div class="formula-row"><span class="formula-lhs">Height</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 100) × height × (100 − clay shrinkage)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>Clay shrinkage</strong> = 10 and <strong>Length</strong> = 30 cm. Working through the relationship above gives <strong>Length</strong> = 33.3333 cm.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Length</strong> = 33.3333 cm should be roughly the size you expected from <strong>Clay shrinkage</strong> = 10 and <strong>Length</strong> = 30 cm.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Clay shrinkage calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 4 figures keep coming back — the height, the clay shrinkage and the length — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/sofa-size">Sofa size</a>, <a href="/everyday-life/speaking-time">Speaking time</a> and <a href="/everyday-life/speed">Speed</a>.</p>
            TXT],
            ['title' => 'Using a linear shrinkage estimate in ceramics', 'html' => <<<'TXT'
            <p>The Clay shrinkage calculator estimates final length, height and width from original dimensions and a shrinkage percentage. Its linear formula is final dimension equals original dimension multiplied by one minus the shrinkage fraction. For example, a 10 percent linear shrinkage leaves 90 percent of the original measured length. The same percentage is applied independently to each dimension; it does not directly calculate mass or volume shrinkage.</p>
            <p>Use shrinkage data for the specific clay body and firing schedule. Clay bodies differ, and shrinkage can depend on drying, firing temperature, firing atmosphere, forming method and how measurements are taken. A manufacturer’s data sheet provides a useful starting value, but a test tile made with your own process is more representative of your finished work.</p>
            <p>Measure the original piece at a clearly defined stage, such as when formed or when leather-hard, and compare the final piece at the corresponding fired stage. If the reference shrinkage percentage was measured from a different moisture state or firing schedule, applying it may not predict your result. Keep a record of the clay batch, test dimensions, drying conditions and firing cycle.</p>
            <p>The calculator assumes the same shrinkage percentage in all directions. Real pieces can distort unevenly because of wall thickness, shape, drying speed, support, orientation and construction. A tall narrow form may warp differently from a flat tile. The result is a dimensional estimate, not a guarantee of shape or symmetry.</p>
            <p>If you need a finished opening or a part that must fit another object, work backward from the desired final dimension using a tested shrinkage factor. The calculator can solve for the original dimension as well as the final one; verify that the field roles match your question. Leave margin for measurement tolerance and make a test piece before producing a critical component.</p>
            <p>Do not confuse linear shrinkage with volumetric shrinkage. If all three dimensions shrink equally by a fraction, the volume changes by the cube of the linear scale factor, not by the same percentage. The calculator reports dimensions only, so use a separate method for volume, mass or glaze calculations.</p>
            <p>Use the output as a planning aid and validate it with repeated test pieces. If results differ, investigate the clay, moisture and firing process rather than adjusting the percentage until a desired dimension appears. This tool does not model cracking, warping or kiln behavior.</p>
            TXT],
            ['title' => 'Make a test tile that matches the project', 'html' => <<<'TXT'
            <p>A useful shrinkage test uses the same clay body, forming method, drying routine and firing schedule as the finished work. Mark a known length on a test bar or tile before drying, then measure it at the stage the clay supplier’s data defines and again after firing. Keep the endpoints and measurement method consistent. A short test can be misleading if the marks are too close together for your ruler to resolve accurately.</p><p>Calculate linear shrinkage as the change in length divided by the original length, expressed as a percentage. The calculator applies that percentage to each dimension. For example, if a test length decreases by 1 unit from an original 10 units, the linear shrinkage is 10 percent. This simple ratio is useful only if the original and final measurements correspond to the same material and process.</p><p>Drying shrinkage and firing shrinkage are often considered separately, and a total shrinkage value depends on which stages were included. Do not apply a firing-only percentage to a dimension measured before drying unless the source specifically says it is total shrinkage from that stage. Keep the reference stage visible in your notes.</p><p>Different clay bodies and even batches may behave differently. A change in water content, thickness, drying speed or firing temperature can alter the outcome. Test pieces should be placed and fired consistently with the work when practical. If a piece warps, the length change alone may not describe the distortion.</p><p>For a component that must fit another object, work backward from the desired fired dimension using your tested percentage. The calculator can solve the relation in either direction, but verify that the field roles are set correctly. Leave tolerance for measurement error, glaze buildup and assembly clearance. A final test fit is still necessary.</p><p>Use repeated test tiles if the dimension matters. Compare length, width and height separately rather than assuming identical shrinkage in every direction. This tool performs a proportional calculation; it does not predict cracking, warping, glaze fit or kiln behavior.</p>
            TXT],
            ['title' => 'Account for direction and measurement precision', 'html' => <<<'TXT'
            <p>A test piece can shrink differently along different axes if it is formed, rolled or oriented differently. Record length, width and height changes separately rather than assuming a single percentage describes every direction. If the work is delicate or must fit another part, make more than one test piece and use the results from the same construction method.</p><p>Measurement precision matters. Use a ruler or caliper with resolution appropriate to the original dimension, and mark endpoints clearly before drying. If the original is very small, a one-millimeter change may represent a large percentage. Report the shrinkage to a sensible precision and avoid treating a noisy measurement as an exact material property.</p><p>If the final size differs from the estimate, check the clay batch, water content, drying stage and firing record before changing the design. The calculator applies a percentage; it cannot identify which process caused the difference.</p>
            TXT],
            ['title' => 'Keep the tested value with the clay body', 'html' => <<<'TXT'
            <p>Store the shrinkage percentage alongside the clay body name, batch, forming method and firing schedule. A value from one body or firing may not transfer to another. Re-test after changing clay or process rather than assuming the previous percentage still applies.</p><p>For critical dimensions, use the observed test result and allow tolerance for measurement and process variation.</p>
            TXT],
            ['title' => 'Use the result to plan a test, not skip one', 'html' => <<<'TXT'
            <p>If the final dimension matters, make a test piece using the same clay and process before scaling the result to a full project. Compare the fired measurement with the calculator’s estimate and update the percentage from your own observations. The tool cannot predict warping or uneven drying, so visual inspection remains part of the test.</p><p>Keep the final and original dimensions labeled separately to avoid reversing the calculation.</p>
            TXT],
            ['title' => 'Use consistent units in the test', 'html' => <<<'TXT'
            <p>Measure original and fired dimensions in the same unit and along the same axis. A unit or endpoint change can look like shrinkage even when it is only a measurement mismatch.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Clay shrinkage calculator work out?', 'a' => 'It returns length (Original dimensions), derived from the height, the clay shrinkage and the length.'],
            ['q' => 'What do I need to enter to use the Clay shrinkage calculator?', 'a' => 'The form asks for the height, the clay shrinkage, the length and the width, which is 4 fields in total.'],
            ['q' => 'Can I enter length (Original dimensions) in a different unit?', 'a' => 'Yes. Length (Original dimensions) opens in centimeters and the chip beside it offers 34 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Length = 33.3333 cm.'],
        ],
        'related' => [
            ['path' => '/everyday-life/sofa-size', 'name' => 'Sofa size'],
            ['path' => '/everyday-life/speaking-time', 'name' => 'Speaking time'],
            ['path' => '/everyday-life/speed', 'name' => 'Speed'],
        ],
    ],
];

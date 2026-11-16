<?php

/**
 * Curtain panel
 * /everyday-life/curtain-panel
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Curtain panel',
    'meta' => ['title' => 'Curtain panel Calculator — Formula & Results', 'description' => 'Curtain panel works out fabric width from type of panel and curtain fullness ratio. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Curtain panel Calculator', 'updated' => '2024-07-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'typeOfPanel',
                            'label' => 'Type of panel',
                            'type' => 'select',
                            'options' => ['Rod pocket' => '8.5', 'Grommet or pleated' => '10', 'Cuffed tab top' => '4.5'],
                            'dataset' => 'typeOfPanel',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'curtainFullnessRatio',
                            'label' => 'Curtain fullness ratio',
                            'type' => 'select',
                            'options' => ['Light folds' => '2', 'Medium folds' => '2.5', 'Dense folds' => '3'],
                            'dataset' => 'curtainFullness',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rodCircumference',
                            'label' => 'Rod circumference',
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
                            'name' => 'bracketWidth',
                            'label' => 'Bracket width',
                            'type' => 'number',
                            'help' => 'Brackets are the devices used to hang curtain rods. The width is the area from one bracket to the other.',
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
                            'name' => 'desiredLength',
                            'label' => 'Desired length',
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
                            'name' => 'fabricWidth',
                            'label' => 'Fabric width',
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
                            'name' => 'baseFabric',
                            'label' => 'Base fabric length',
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
                            'name' => 'lengthOfFabricForLoops',
                            'label' => 'Length of fabric for loops',
                            'type' => 'number',
                            'help' => 'This is the amount of fabric you will use to create the loops at the top of the main part of the curtain.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '15.24', 'when' => null],
                                ['value' => '6', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'requiredLengthOfFabric',
                            'label' => 'Required length of fabric',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Total amount of fabric needed',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numberOfPanelsOfThisLength',
                            'label' => 'Number of panels of this length',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalAmountOfCurtainFabric',
                            'label' => 'Total amount of curtain fabric',
                            'type' => 'number',
                            'help' => 'This is the total length of fabric needed to make all the curtains given the specified width.',
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
                            'name' => 'totalAmountOfCurtainFabric1',
                            'label' => 'Total amount of curtain fabric',
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
            'title' => 'fabricWidth = bracketWidth * curtainFullnessRatio + 2',
            'results' => ['fabricWidth' => 'bracketWidth*curtainFullnessRatio + 2', 'curtainFullnessRatio' => '(fabricWidth - 2)/bracketWidth', 'bracketWidth' => '(fabricWidth - 2)/curtainFullnessRatio'],
        ],
        [
            'title' => 'requiredLengthOfFabric = desiredLength + typeOfPanel + rodCircumference/2 ',
            'results' => ['typeOfPanel' => '-desiredLength + requiredLengthOfFabric - 1/2*rodCircumference', 'requiredLengthOfFabric' => 'desiredLength + (1/2)*rodCircumference + typeOfPanel', 'rodCircumference' => '-2*desiredLength + 2*requiredLengthOfFabric - 2*typeOfPanel', 'desiredLength' => 'requiredLengthOfFabric - 1/2*rodCircumference - typeOfPanel'],
        ],
        [
            'title' => 'baseFabric = desiredLength + typeOfPanel',
            'results' => ['baseFabric' => 'desiredLength + typeOfPanel', 'typeOfPanel' => 'baseFabric - desiredLength', 'desiredLength' => 'baseFabric - typeOfPanel'],
        ],
        [
            'title' => 'totalAmountOfCurtainFabric = requiredLengthOfFabric * numberOfPanelsOfThisLength',
            'results' => ['numberOfPanelsOfThisLength' => 'totalAmountOfCurtainFabric/requiredLengthOfFabric', 'requiredLengthOfFabric' => 'totalAmountOfCurtainFabric/numberOfPanelsOfThisLength', 'totalAmountOfCurtainFabric' => 'numberOfPanelsOfThisLength*requiredLengthOfFabric'],
        ],
        [
            'title' => 'totalAmountOfCurtainFabric1 = (baseFabric + lengthOfFabricForLoops) *  numberOfPanelsOfThisLength ',
            'results' => ['baseFabric' => '-lengthOfFabricForLoops + totalAmountOfCurtainFabric1/numberOfPanelsOfThisLength', 'numberOfPanelsOfThisLength' => 'totalAmountOfCurtainFabric1/(baseFabric + lengthOfFabricForLoops)', 'lengthOfFabricForLoops' => '-baseFabric + totalAmountOfCurtainFabric1/numberOfPanelsOfThisLength', 'totalAmountOfCurtainFabric1' => 'numberOfPanelsOfThisLength*(baseFabric + lengthOfFabricForLoops)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Give the Curtain panel calculator the rod circumference, the bracket width, the desired length and the required length of fabric and it returns <strong>fabric width</strong>.
        TXT,
        'sections' => [
            ['title' => 'How does the Curtain panel calculator work?', 'html' => <<<'TXT'
            <p>The Curtain panel calculator takes the values in the form, applies the relationship described below and reports <strong>fabric width</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the curtain fullness ratio); then you type in the rod circumference, the bracket width, the desired length and the required length of fabric.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 3 options, such as light folds, medium folds and dense folds. </li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Type of panel</strong></td><td>One of 3 options, such as rod pocket, grommet or pleated and cuffed tab top.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Curtain fullness ratio</strong></td><td>One of 3 options, such as light folds, medium folds and dense folds.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Rod circumference</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Bracket width</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Desired length</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Fabric width</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Base fabric length</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Length of fabric for loops</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Required length of fabric</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Number of panels of this length</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Curtain panel calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Fabric width</span><span class="formula-eq">=</span><span class="formula-rhs">bracket width × curtain fullness ratio + 2</span></div><div class="formula-row"><span class="formula-lhs">Type of panel</span><span class="formula-eq">=</span><span class="formula-rhs">-desired length + required length of fabric − 1 ÷ 2 × rod circumference</span></div><div class="formula-row"><span class="formula-lhs">Base fabric length</span><span class="formula-eq">=</span><span class="formula-rhs">desired length + type of panel</span></div><div class="formula-row"><span class="formula-lhs">Number of panels of this length</span><span class="formula-eq">=</span><span class="formula-rhs">total amount of curtain fabric ÷ required length of fabric</span></div><div class="formula-row"><span class="formula-lhs">Base fabric length</span><span class="formula-eq">=</span><span class="formula-rhs">-length of fabric for loops + total amount of curtain fabric ÷ number of panels of this length</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>The option the calculation settles on.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Curtain panel calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 4 figures keep coming back — the rod circumference, the bracket width and the desired length — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/time-between-dates">Time between dates</a>, <a href="/everyday-life/time-card">Time card</a> and <a href="/everyday-life/time-difference">Time difference</a>.</p>
            TXT],
            ['title' => 'Planning panel fullness and fabric length', 'html' => <<<'TXT'
            <p>This calculator estimates curtain fabric using the rod or bracket width, a selected fullness ratio, desired curtain length and a panel-style allowance. Fullness describes how much fabric is gathered across the hanging width compared with the space it covers. A higher ratio creates deeper folds and requires more fabric; a lower ratio produces a flatter appearance. The page offers preset fold levels, so choose the look you want before interpreting the fabric-width result.</p>
            <p>Measure the span the curtains need to cover. A rod measurement may differ from the clear opening because brackets extend beyond the window frame. Decide whether the panels should meet in the middle, overlap or stack outside the glass when open. The bracket-width input is intended to represent the width being covered; measure between the relevant bracket points and add any desired overlap or stack-back allowance separately if the form does not include it.</p>
            <p>Measure desired length from the chosen hanging point to the intended hem. The top treatment changes how much fabric is consumed: the page’s panel-type selector adds a fixed allowance for rod pocket, grommet or pleated, or cuffed tab top. Those values are built into the calculator and may not match every heading tape, hardware system or sewing method. Check the product’s actual construction and the fabric manufacturer’s instructions before cutting.</p>
            <p>Use the same unit for rod circumference, bracket width, desired length and fabric dimensions. The rod-circumference input is used by the page’s formula as an additional length allowance; if you are unsure how your rod or header method relates to that input, confirm the form’s definition. A circumference is not the same as a straight rod width. Mixing the measurements can create an unexpectedly large or small yardage estimate.</p>
            <p>Fabric is usually sold in a fixed width, and the calculator’s required fabric width may describe the flat width of a panel rather than the bolt width you buy. Determine the usable fabric width after selvages and compare it with the amount needed for the selected fullness. The number of panels affects total yardage. If you split a wide curtain into multiple widths, plan for seam allowances and pattern matching.</p>
            <p>Print repeat, nap, shrinkage, hems, lining, interlining and returns can all increase the amount to buy. Buy extra when the fabric has a directional pattern or must match across panels. Wash or pre-shrink only as directed by the fabric maker. The calculator’s result is a planning quantity, not a guarantee that a particular bolt will yield the cut pieces without waste.</p>
            <p>Before cutting, sketch each panel and label the top, bottom, width and header allowance. Check the window measurement, panel count and selected fullness. For custom drapery or expensive fabric, compare the estimate with a professional workroom or sewing pattern. This tool helps organize dimensions; it does not replace a full cutting layout.</p>
            TXT],
            ['title' => 'Plan panel count, header and finished drop', 'html' => <<<'TXT'
            <p>Decide how many panels will cover the opening and how each panel will stack when drawn back. A pair of curtains usually shares the total width, while a single panel uses the full span. The calculator’s number-of-panels field changes the total fabric quantity, so enter the panel count you will actually sew or buy. If each panel is cut from a separate fabric width, consider the finished width after hems and seams.</p><p>The header treatment affects both fabric consumption and how the curtain hangs. The page’s panel-type selector applies fixed allowances for its listed styles. A particular grommet, pleating tape, tab or rod-pocket product may require a different allowance; verify the hardware’s instructions and the fabric’s weight. The selected value is a planning convention, not a standard that applies to every curtain heading.</p><p>Measure finished length from the actual hanging point to the desired hem position. Decide whether the curtain should just touch the floor, hover above it or puddle. Check for radiators, furniture or window hardware that would change the desired drop. If measuring from the rod, account for how the chosen header positions the top edge relative to the rod.</p><p>Fullness is a visual choice as well as a fabric calculation. A light fold ratio uses less fabric and looks flatter; denser folds create a more gathered appearance and may require more width. Heavy fabric can hang with different folds than a light sheer at the same ratio. A sample pleat or swatch can help you judge the look before buying a large quantity.</p><p>Use the output to prepare a cutting plan, then add hems, pattern repeats, shrinkage and any lining not represented in the form. If the fabric has a large repeat, calculate matching across adjacent panels to avoid mismatched motifs. For a wide window or costly material, consult a workroom or pattern guide before cutting.</p>
            TXT],
            ['title' => 'Plan for the actual window and hardware', 'html' => <<<'TXT'
            <p>Measure the installed rod or track, not only the glass width. The amount of stack-back needed depends on the curtain’s thickness and how much window you want uncovered when the panels are open. The calculator’s bracket width is one input to the fullness estimate, but it does not know the window trim, track extension or where the brackets are mounted.</p><p>Check whether the fabric is sold by the meter or yard and whether the usable width is less than the listed width. If the pattern has a repeat, matching adjacent drops can consume extra length. Add that repeat allowance before ordering and confirm the number of drops with a cutting plan.</p><p>For a pair, account for the center meeting and side hems. If one panel is wider than the available fabric, you may need to join multiple widths. That affects seam placement and visual balance; it cannot be corrected by simply increasing the fullness ratio.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Curtain panel calculator work out?', 'a' => 'It returns fabric width, derived from the rod circumference, the bracket width and the desired length.'],
            ['q' => 'What do I need to enter to use the Curtain panel calculator?', 'a' => 'The form asks for the rod circumference, the bracket width, the desired length and the required length of fabric, which is 7 fields in total.'],
            ['q' => 'Can I enter rod circumference in a different unit?', 'a' => 'Yes. Rod circumference opens in centimeters and the chip beside it offers 34 units.'],
        ],
        'related' => [
            ['path' => '/everyday-life/time-between-dates', 'name' => 'Time between dates'],
            ['path' => '/everyday-life/time-card', 'name' => 'Time card'],
            ['path' => '/everyday-life/time-difference', 'name' => 'Time difference'],
        ],
    ],
];

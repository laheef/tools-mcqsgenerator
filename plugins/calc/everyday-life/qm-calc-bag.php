<?php

/**
 * Bag
 * /everyday-life/bag
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bag',
    'meta' => ['title' => 'Bag Calculator — Free, With Worked Examples', 'description' => 'Bag takes height (h), width (w) and depth (d) and returns width and height. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Bag Calculator', 'updated' => '2024-07-15'],
    'sections' => [
        [
            'title' => 'Desired bag size',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'height',
                            'label' => 'Height (h)',
                            'type' => 'number',
                            'help' => 'The desired height you want for your bag.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'width',
                            'label' => 'Width (w)',
                            'type' => 'number',
                            'help' => 'The desired width you want for your bag.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'depth',
                            'label' => 'Depth (d)',
                            'type' => 'number',
                            'help' => 'The desired depth you want for your bag.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/Komal/bag-calculator.png '],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Fabric needed&nbsp;',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fabric_width',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fabric_height',
                            'label' => 'Height',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Box corner',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'corner',
                            'label' => 'Box corners?',
                            'type' => 'select',
                            'options' => ['Yes!' => '1.1', 'No!' => '2.2'],
                            'dataset' => 'Corner',
                            'default' => 'No!',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'box_corner',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'fabric_width = ((2 * width) + (2 * depth) + 1)',
            'results' => ['fabric_width' => '2*depth + 2*width + 1', 'width' => '-depth + (1/2)*fabric_width - 1/2', 'depth' => '(1/2)*fabric_width - width - 1/2'],
        ],
        [
            'title' => 'fabric_height = (height + (1/2 * depth)  + 1)',
            'results' => ['height' => '-1/2*depth + fabric_height - 1', 'depth' => '2*fabric_height - 2*height - 2', 'fabric_height' => '(1/2)*depth + height + 1'],
        ],
        [
            'title' => 'box_corner = depth/2',
            'results' => ['box_corner' => '(1/2)*depth', 'depth' => '2*box_corner'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        <strong>Width (w)</strong> is what the Bag calculator works out, and it gets there from the width, the depth and the height.

        Press Calculate for the answer; change a value and it steps off screen until you press again, so each edit can be judged on its own.
        TXT,
        'sections' => [
            ['title' => 'How does the Bag calculator work?', 'html' => <<<'TXT'
            <p>The Bag calculator takes the values in the form, applies the relationship described below and reports <strong>Width (w)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (box corners?); then you type in the width (w), the depth (d) and the height.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => '<ul><li>Pick the option that matches your case — 2 options, such as yes! and no!. </li></ul><p>One field on this form is a choice rather than a number. </p>'],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Height (h)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Width (w)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Depth (d)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Width (w)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Height (h)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Box corners?</strong></td><td>One of 2 options, such as yes! and no!.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Length</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Bag calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Width</span><span class="formula-eq">=</span><span class="formula-rhs">2 × depth (d) + 2 × width (w) + 1</span></div><div class="formula-row"><span class="formula-lhs">Height (h)</span><span class="formula-eq">=</span><span class="formula-rhs">-1 ÷ 2 × depth (d) + height − 1</span></div><div class="formula-row"><span class="formula-lhs">Length</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 2) × depth (d)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>Width (w)</strong> = 30 cm, <strong>Depth (d)</strong> = 30 cm and <strong>Box corners?</strong> set to No!. Working through the relationship above gives <strong>Width (w)</strong> = 220 cm and <strong>Length</strong> = 15 cm.</p><p>Read it as a template. Every number above can be replaced with one of yours; only the relationship between them is fixed.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Width (w)</strong> = 220 cm and <strong>Length</strong> = 15 cm should be roughly the size you expected from <strong>Width (w)</strong> = 30 cm and <strong>Depth (d)</strong> = 30 cm.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Bag calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 3 figures keep coming back — the width, the depth and the height — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/price-per-square-inch">Price per square inch</a>, <a href="/everyday-life/price-per-unit">Price per unit</a> and <a href="/everyday-life/price-per-weight">Price per weight</a>.</p>
            TXT],
            ['title' => 'From finished bag dimensions to a fabric cut', 'html' => <<<'TXT'
            <p>The Bag calculator starts with desired finished height, width and depth, then estimates fabric dimensions. The formulas reflect a particular simple box-bag layout: fabric width is based on two widths, two depths and a fixed allowance, while fabric height includes the bag height, half the depth and an allowance. The corner value is tied to half the depth. These are pattern assumptions, not universal sewing rules, so treat the output as a starting rectangle for the design represented by the page.</p>
            <p>Measure the finished bag’s usable interior or exterior dimensions consistently. Decide whether the requested height includes a folded top, cuff, lining or hem. A bag with a boxed bottom, gusset, zipper, drawstring channel or shaped sides may need additional pattern pieces or allowances that this calculator does not model. Check the field labels and formula before cutting expensive fabric.</p>
            <p>Keep units consistent across height, width and depth. The page’s unit selectors can convert measurements, but a fixed “+1” allowance in the formula must correspond to the unit basis used by the engine. Verify the displayed unit and inspect the worked example if one is provided. When changing from centimeters to inches, do not assume every fixed seam or edge allowance automatically represents the same real-world amount unless the formula explicitly converts it.</p>
            <p>Fabric width and height are not necessarily the same as the amount purchased from a store. Fabric has a usable width after selvages, shrinkage, directional prints, nap and pattern matching. The calculated rectangle may need to be rotated or split into pieces depending on the fabric’s width and grain. Allow extra material for seams, hems, handles, pockets, lining and mistakes if those are part of your project.</p>
            <p>Before cutting, draw a paper pattern or use inexpensive test material. Check that the bottom corners fold into the intended depth and that the side seams meet where expected. Measure the actual fabric width available and compare it with the calculated requirement. If the required panel is wider than the bolt, plan separate pieces and seams rather than trying to force a single cut.</p>
            <p>For a lined or reversible bag, calculate the outer and lining fabrics separately and account for different seam allowances or thickness. Heavy canvas, quilting cotton and slippery lining fabric behave differently when turned and pressed. This calculator does not account for fabric stretch, interfacing, directional prints or how a material drapes when loaded.</p>
            <p>Use the result for estimating a basic panel and checking proportions. Add project-specific allowances, test the pattern and follow a sewing guide suited to your construction. The calculator cannot guarantee the finished capacity or fit of a bag because those depend on seams, closures, handles and material behavior.</p>
            TXT],
            ['title' => 'Check the pattern before buying fabric', 'html' => <<<'TXT'
            <p>Use the output to check whether a single panel is practical for the fabric width available. The formula’s finished dimensions do not automatically tell you how to arrange pattern pieces on a bolt. If the required width exceeds the usable fabric width, you may need a seam, a different orientation or a revised design. Prints with a one-way motif need to face the same direction on every visible panel, which can increase yardage.</p><p>Think through each construction feature before cutting: seam allowances, a hem, a boxed bottom, lining, interfacing, handle tabs and pockets each use material. The calculator’s fixed allowance may not match your sewing pattern or preferred seam finish. Add allowances explicitly and mark them on a paper pattern so you do not accidentally count them twice or omit them.</p><p>For a bag that must hold a particular object, measure the object and allow room for access, not just the object’s outer dimensions. The fabric thickness and seam placement reduce interior space. A test bag in scrap material is a useful way to verify capacity and closure position before cutting the final fabric.</p><p>After sewing, compare the finished bag with the intended dimensions while it is empty and loaded. The sides can bulge or the base can sag under weight, so external measurements may not equal usable capacity. This calculator estimates a fabric rectangle; it does not determine load strength, seam durability or handle placement.</p>
            TXT],
            ['title' => 'Build in enough material for details', 'html' => <<<'TXT'
            <p>Handles, drawstrings and pockets should be planned as separate pieces unless the form explicitly includes them. Their orientation can change the cutting layout, and a handle needs reinforcement appropriate to the load. A simple rectangle estimate cannot tell you whether the seams or fabric are strong enough for groceries, books or tools.</p><p>Check the fabric’s usable width after selvages and any printed border are excluded. If the panel needs to be pieced, plan where the seam will sit and add the seam allowance for that construction. A centered print may require extra fabric so the motif aligns on both sides.</p><p>Make a small scale drawing with the finished dimensions and the formula’s allowances marked. This helps distinguish bag size from cut size and makes it easier to catch an omitted allowance before cutting. If dimensions are close to the bolt width, a paper layout is much safer than estimating by eye.</p>
            TXT],
            ['title' => 'Make a test version when fit is critical', 'html' => <<<'TXT'
            <p>For a bag that must hold a particular device or fit inside luggage, make a quick test from scrap fabric or paper. Load it with the intended contents and check the opening, depth and handle position before cutting the final material. The formula estimates a panel, not the feel or capacity of the finished bag.</p>
            TXT],
            ['title' => 'Double-check dimensions before cutting', 'html' => <<<'TXT'
            <p>Re-read height, width and depth at the form before using the result. A swapped width and depth can still produce a plausible rectangle, but the boxed corner may no longer match the intended bag.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bag calculator work out?', 'a' => 'It returns width, derived from the width, the depth and the height.'],
            ['q' => 'What do I need to enter to use the Bag calculator?', 'a' => 'The form asks for the width, the depth and the height, which is 4 fields in total.'],
            ['q' => 'Can I enter height (h) in a different unit?', 'a' => 'Yes. Height (h) opens in centimeters and the chip beside it offers 34 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Width = 220 cm.'],
        ],
        'related' => [
            ['path' => '/everyday-life/price-per-square-inch', 'name' => 'Price per square inch'],
            ['path' => '/everyday-life/price-per-unit', 'name' => 'Price per unit'],
            ['path' => '/everyday-life/price-per-weight', 'name' => 'Price per weight'],
        ],
    ],
];

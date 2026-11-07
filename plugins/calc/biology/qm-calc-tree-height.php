<?php

/**
 * Tree height
 * /biology/tree-height
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tree height',
    'meta' => ['title' => 'Tree height Calculator: Formula, Steps & Examples', 'description' => 'The Tree height calculator returns <strong>tree height</strong>. The inputs are distance from the tree, the angle between the viewpoint and the treetop and…', 'h1' => 'Tree height Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'method',
                            'label' => 'Method',
                            'type' => 'select',
                            'options' => ['Trigonometry' => '10', 'Shadow measurement' => '15'],
                            'dataset' => 'method',
                            'default' => 'Trigonometry',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'location',
                            'label' => 'Tree location',
                            'type' => 'select',
                            'options' => ['Below viewpoint' => '0', 'On level ground' => '1', 'On elevation' => '2'],
                            'dataset' => 'location',
                            'default' => 'Below viewpoint',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'distance_from_lowered_or_level_tree',
                            'label' => 'Distance from the tree',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'angle_to_treetop_lowered_or_level',
                            'label' => 'Angle between the viewpoint and the treetop (β)',
                            'type' => 'number',
                            'unit' => '43',
                            'unit_default' => 'deg',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eye_level',
                            'label' => 'Eye level',
                            'type' => 'number',
                            'help' => 'Difference between the height of your eyes and the tree base.',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'angle_to_tree_base_lowered_or_level',
                            'label' => 'Angle between the viewpoint and the tree base (α)',
                            'type' => 'number',
                            'unit' => '43',
                            'unit_default' => 'deg',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tree_height_lowered_or_level',
                            'label' => 'Tree height',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'distance_from_elevated_tree',
                            'label' => 'Distance from the tree',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'angle_to_treetop_elevated',
                            'label' => 'Angle between the viewpoint and the treetop (β)',
                            'type' => 'number',
                            'unit' => '43',
                            'unit_default' => 'deg',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'angle_to_tree_base_elevated',
                            'label' => 'Angle between the viewpoint and the tree base (α)',
                            'type' => 'number',
                            'unit' => '43',
                            'unit_default' => 'deg',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tree_height_elevated',
                            'label' => 'Tree height',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'human_height',
                            'label' => 'Your height',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'human_shadow_length',
                            'label' => 'Length of your shadow',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tree_shadow_length',
                            'label' => 'Length of the tree\'s shadow',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tree_height_shadow_method',
                            'label' => 'Tree height',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'tree-height-bel.png'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'tree_height_lowered_or_level = tan(angle_to_treetop_lowered_or_level) * distance_from_lowered_or_level_tree + eye_level',
            'results' => ['tree_height_lowered_or_level' => 'distance_from_lowered_or_level_tree*tan(angle_to_treetop_lowered_or_level) + eye_level', 'eye_level' => '-distance_from_lowered_or_level_tree*tan(angle_to_treetop_lowered_or_level) + tree_height_lowered_or_level', 'distance_from_lowered_or_level_tree' => '(-eye_level + tree_height_lowered_or_level)/tan(angle_to_treetop_lowered_or_level)', 'angle_to_treetop_lowered_or_level' => '-atan((eye_level - tree_height_lowered_or_level)/distance_from_lowered_or_level_tree)'],
        ],
        [
            'title' => 'eye_level = tan(angle_to_tree_base_lowered_or_level)*distance_from_lowered_or_level_tree',
            'results' => ['eye_level' => 'distance_from_lowered_or_level_tree*tan(angle_to_tree_base_lowered_or_level)', 'distance_from_lowered_or_level_tree' => 'eye_level/tan(angle_to_tree_base_lowered_or_level)', 'angle_to_tree_base_lowered_or_level' => 'atan(eye_level/distance_from_lowered_or_level_tree)'],
        ],
        [
            'title' => 'tree_height_elevated = (tan(angle_to_treetop_elevated) - tan(angle_to_tree_base_elevated)) * distance_from_elevated_tree',
            'results' => ['tree_height_elevated' => 'distance_from_elevated_tree*(-tan(angle_to_tree_base_elevated) + tan(angle_to_treetop_elevated))', 'distance_from_elevated_tree' => '-tree_height_elevated/(tan(angle_to_tree_base_elevated) - tan(angle_to_treetop_elevated))', 'angle_to_treetop_elevated' => 'atan(tan(angle_to_tree_base_elevated) + tree_height_elevated/distance_from_elevated_tree)', 'angle_to_tree_base_elevated' => 'atan(tan(angle_to_treetop_elevated) - tree_height_elevated/distance_from_elevated_tree)'],
        ],
        [
            'title' => 'tree_height_shadow_method = (human_height * tree_shadow_length) / human_shadow_length',
            'results' => ['tree_shadow_length' => 'human_shadow_length*tree_height_shadow_method/human_height', 'tree_height_shadow_method' => 'human_height*tree_shadow_length/human_shadow_length', 'human_shadow_length' => 'human_height*tree_shadow_length/tree_height_shadow_method', 'human_height' => 'human_shadow_length*tree_height_shadow_method/tree_shadow_length'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Tree height calculator returns <strong>tree height</strong>. The inputs are distance from the tree, the angle between the viewpoint and the treetop and the angle between the viewpoint and the tree base.
        TXT,
        'sections' => [
            ['title' => 'How does the Tree height calculator work?', 'html' => <<<'TXT'
            <p>The Tree height calculator takes the values in the form, applies the relationship described below and reports <strong>tree height</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the method and the tree location); then you type in the distance from the tree, the angle between the viewpoint and the treetop (β), the angle between the viewpoint and the tree base (α) and the distance from the tree (2).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as trigonometry and shadow measurement. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 3 options, such as below viewpoint, on level ground and on elevation. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in degrees. The unit chip switches it to any of the 12 supported units.</li><li>A measured quantity, entered by default in degrees. The unit chip switches it to any of the 12 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in degrees. The unit chip switches it to any of the 12 supported units.</li><li>A measured quantity, entered by default in degrees. The unit chip switches it to any of the 12 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Method</strong></td><td>One of 2 options, such as trigonometry and shadow measurement.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Tree location</strong></td><td>One of 3 options, such as below viewpoint, on level ground and on elevation.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Distance from the tree</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Angle between the viewpoint and the treetop (β)</strong></td><td>A measured quantity, 12 units available.</td><td>degrees</td><td>You supply it</td></tr><tr><td><strong>Eye level</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Angle between the viewpoint and the tree base (α)</strong></td><td>A measured quantity, 12 units available.</td><td>degrees</td><td>You supply it</td></tr><tr><td><strong>Tree height</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Distance from the tree (2)</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Angle between the viewpoint and the treetop (β) (2)</strong></td><td>A measured quantity, 12 units available.</td><td>degrees</td><td>You supply it</td></tr><tr><td><strong>Angle between the viewpoint and the tree base (α) (2)</strong></td><td>A measured quantity, 12 units available.</td><td>degrees</td><td>You supply it</td></tr><tr><td><strong>Tree height (2)</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Your height</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Length of your shadow</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Length of the tree's shadow</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Tree height (3)</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Tree height calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Tree height</span><span class="formula-eq">=</span><span class="formula-rhs">distance from the tree × the tangent of (angle between the viewpoint and the treetop (β)) + eye level</span></div><div class="formula-row"><span class="formula-lhs">Eye level</span><span class="formula-eq">=</span><span class="formula-rhs">distance from the tree × the tangent of (angle between the viewpoint and the tree base (α))</span></div><div class="formula-row"><span class="formula-lhs">Tree height</span><span class="formula-eq">=</span><span class="formula-rhs">distance from the tree × (-the tangent of (angle between the viewpoint and the tree base (α)) + the tangent of (angle between the viewpoint and the treetop (β)))</span></div><div class="formula-row"><span class="formula-lhs">Length of the tree&#x27;s shadow</span><span class="formula-eq">=</span><span class="formula-rhs">length of your shadow × tree height ÷ your height</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Take <strong>Method</strong> set to Trigonometry, <strong>Tree location</strong> set to Below viewpoint, <strong>Distance from the tree</strong> = 30 m and <strong>Angle between the viewpoint and the treetop (β)</strong> = 10 deg. The calculator returns <strong>Angle between the viewpoint and the tree base (α)</strong> = 45 deg and <strong>Tree height</strong> = 35 m.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Angle between the viewpoint and the tree base (α)</strong> = 45 deg and <strong>Tree height</strong> = 35 m should be roughly the size you expected from <strong>Method</strong> set to Trigonometry and <strong>Tree location</strong> set to Below viewpoint.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in meters</li><li>Angle, opening in degrees</li><li>Length, opening in meters</li><li>Angle, opening in degrees</li><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Angle, opening in degrees</li><li>Angle, opening in degrees</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Tree height calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 3 figures keep coming back — the distance from the tree, the angle between the viewpoint and the treetop and the angle between the viewpoint and the tree base — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/tree-leaves">Leaves on tree</a>, <a href="/biology/tree-spacing">Tree spacing</a> and <a href="/biology/tree-value">Tree value</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tree height calculator work out?', 'a' => <<<'TXT'
            It returns tree height, derived from the distance from the tree, the angle between the viewpoint and the treetop and the angle between the viewpoint and the tree base. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Tree height calculator?', 'a' => <<<'TXT'
            The form asks for the distance from the tree, the angle between the viewpoint and the treetop and the angle between the viewpoint and the tree base, which is 11 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter distance from the tree in a different unit?', 'a' => <<<'TXT'
            Yes. Distance from the tree opens in meters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (2 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Angle between the viewpoint and the tree base (α) = 45 deg. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Tree height calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/tree-leaves', 'name' => 'Leaves on tree'],
            ['path' => '/biology/tree-spacing', 'name' => 'Tree spacing'],
            ['path' => '/biology/tree-value', 'name' => 'Tree value'],
        ],
    ],
];

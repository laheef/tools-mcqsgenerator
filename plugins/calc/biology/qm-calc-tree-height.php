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
    'meta' => ['title' => 'Tree height Calculator: Formula, Steps & Examples', 'description' => 'Enter Distance from the tree, Angle between the viewpoint and the treetop (β) and Eye level into Tree height and the answer comes back as Angle between the…', 'h1' => 'Tree height Calculator', 'updated' => '2026-08-10'],
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
        Enter Distance from the tree, Angle between the viewpoint and the treetop (β) and Eye level into Tree height and the answer comes back as Angle between the viewpoint and the tree base (α) and Tree height. The arithmetic is the whole method: Angle between the viewpoint and the tree base (α) is worked out from Distance from the tree by one formula, applied once. Angle between the viewpoint and the tree base (α) comes back in degrees unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Tree height calculator works', 'html' => <<<'TXT'
            <p>Tree height answers one question from 3 numbers, and the answer is Angle between the viewpoint and the tree base (α), Tree height and Distance from the tree.</p><p>In the form&#039;s own words, Tree height = Distance from the tree × tan(Angle between the viewpoint and the treetop (β)) + Eye level.</p><p>What comes back is Angle between the viewpoint and the tree base (α), Tree height, Distance from the tree and Angle between the viewpoint and the treetop (β) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Distance from the tree</strong> — in meters</li><li><strong>Angle between the viewpoint and the treetop (β)</strong> — in degrees</li><li><strong>Eye level</strong> — in meters. Difference between the height of your eyes and the tree base.</li></ul><p>The answers come back as Angle between the viewpoint and the tree base (α) in degrees, Tree height in meters, Distance from the tree in meters, Angle between the viewpoint and the treetop (β) in degrees, Angle between the viewpoint and the tree base (α) in degrees, Tree height in meters, Your height in meters, Length of your shadow in meters, Length of the tree&#039;s shadow in meters, Tree height in meters. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Tree height</strong> = <code>Distance from the tree × tan(Angle between the viewpoint and the treetop (β)) + Eye level</code></li><li><strong>Eye level</strong> = <code>− Distance from the tree × tan(Angle between the viewpoint and the treetop (β)) + Tree height</code></li><li><strong>Distance from the tree</strong> = <code>( − Eye level + Tree height) ÷ tan(Angle between the viewpoint and the treetop (β))</code></li><li><strong>Angle between the viewpoint and the treetop (β)</strong> = <code>− atan((Eye level − Tree height) ÷ Distance from the tree)</code></li><li><strong>Angle between the viewpoint and the tree base (α)</strong> = <code>atan(Eye level ÷ Distance from the tree)</code></li><li><strong>Length of the tree&#039;s shadow</strong> = <code>Length of your shadow × Tree height ÷ Your height</code></li></ul><p>Any one of Tree height, Eye level and Distance from the tree can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Distance from the tree, Angle between the viewpoint and the treetop (β) and Eye level carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Angle between the viewpoint and the tree base (α), Tree height and Distance from the tree are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Distance from the tree and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Distance from the tree, Angle between the viewpoint and the treetop (β) and Eye level is what you already know and Angle between the viewpoint and the tree base (α) and Tree height is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/livestock-fence">Livestock fence cost Calculator</a>, <a href="/biology/livestock-water-requirement">Livestock Water Requirement Calculator</a> and <a href="/biology/llama">Llama</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tree height calculator work out?', 'a' => <<<'TXT'
            Angle between the viewpoint and the tree base (α), Tree height, Distance from the tree and Angle between the viewpoint and the treetop (β), from Distance from the tree, Angle between the viewpoint and the treetop (β) and Eye level. The relationship is Tree height = Distance from the tree × tan(Angle between the viewpoint and the treetop (β)) + Eye level.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Distance from the tree (meters), Angle between the viewpoint and the treetop (β) (degrees), Eye level (meters). Enter distance_from_lowered_or_level_tree, angle_to_treetop_lowered_or_level and eye_level; Angle between the viewpoint and the tree base (α) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Tree height, Eye level, Distance from the tree and Angle between the viewpoint and the treetop (β) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Angle between the viewpoint and the tree base (α) is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Distance from the tree left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Angle between the viewpoint and the tree base (α) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/livestock-fence', 'name' => 'Livestock fence cost Calculator'],
            ['path' => '/biology/livestock-water-requirement', 'name' => 'Livestock Water Requirement Calculator'],
            ['path' => '/biology/llama', 'name' => 'Llama'],
        ],
        'authors' => [],
    ],
];

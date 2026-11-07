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
    'meta' => ['title' => 'Tree height Calculator: Formula, Steps & Examples', 'description' => 'Tree height turns method, tree location and distance from the tree into eye level. Nothing is stored between visits, and the working stays on the page.', 'h1' => 'Tree height Calculator', 'updated' => '2026-08-10'],
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
        Enter Eye level into Tree height and the answer comes back as Angle between the viewpoint and the tree base (α) and Tree height. The arithmetic is the whole method: angle between the viewpoint and the tree base (α) is worked out from eye level by one formula, applied once. Angle between the viewpoint and the tree base (α) comes back in degrees unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Tree height calculator works', 'html' => <<<'TXT'
            <p>Tree height answers one question from 3 numbers, and the answer is Angle between the viewpoint and the tree base (α), Tree height and Distance from the tree.</p><p>In the form&#039;s own words, Tree height = Distance from the tree × tan(Angle between the viewpoint and the treetop (β)) + Eye level.</p><p>What comes back is Angle between the viewpoint and the tree base (α), Tree height, Distance from the tree and Angle between the viewpoint and the treetop (β) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Distance from the tree</strong> — in meters</li><li><strong>Angle between the viewpoint and the treetop (β)</strong> — in degrees</li><li><strong>Eye level</strong> — in meters. Difference between the height of your eyes and the tree base.</li></ul><p>The answers come back as Angle between the viewpoint and the tree base (α) in degrees, Tree height in meters, Distance from the tree in meters, Angle between the viewpoint and the treetop (β) in degrees, Angle between the viewpoint and the tree base (α) in degrees, Tree height in meters, Your height in meters, Length of your shadow in meters, Length of the tree&#039;s shadow in meters, Tree height in meters. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Angle between the viewpoint and the tree base (α) lists 12 options and opens on degrees. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Tree height</strong> = <code>Distance from the tree × tan(Angle between the viewpoint and the treetop (β)) + Eye level</code></li><li><strong>Eye level</strong> = <code>− Distance from the tree × tan(Angle between the viewpoint and the treetop (β)) + Tree height</code></li><li><strong>Distance from the tree</strong> = <code>( − Eye level + Tree height) ÷ tan(Angle between the viewpoint and the treetop (β))</code></li><li><strong>Angle between the viewpoint and the treetop (β)</strong> = <code>− atan((Eye level − Tree height) ÷ Distance from the tree)</code></li><li><strong>Angle between the viewpoint and the tree base (α)</strong> = <code>atan(Eye level ÷ Distance from the tree)</code></li><li><strong>Length of the tree&#039;s shadow</strong> = <code>Length of your shadow × Tree height ÷ Your height</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Tree height</strong> = <code>Distance from the tree × tan(Angle between the viewpoint and the treetop (β)) + Eye level</code> — the form to use when Distance from the tree, Angle between the viewpoint and the treetop (β) and Eye level are the values you have.</li><li><strong>Eye level</strong> = <code>− Distance from the tree × tan(Angle between the viewpoint and the treetop (β)) + Tree height</code> — the form to use when Distance from the tree, Angle between the viewpoint and the treetop (β) and Tree height are the values you have.</li><li><strong>Distance from the tree</strong> = <code>( − Eye level + Tree height) ÷ tan(Angle between the viewpoint and the treetop (β))</code> — the form to use when Eye level, Tree height and Angle between the viewpoint and the treetop (β) are the values you have.</li><li><strong>Angle between the viewpoint and the treetop (β)</strong> = <code>− atan((Eye level − Tree height) ÷ Distance from the tree)</code> — the form to use when Eye level, Tree height and Distance from the tree are the values you have.</li><li><strong>Eye level</strong> = <code>Distance from the tree × tan(Angle between the viewpoint and the tree base (α))</code> — the form to use when Distance from the tree and Angle between the viewpoint and the tree base (α) are the values you have.</li><li><strong>Distance from the tree</strong> = <code>Eye level ÷ tan(Angle between the viewpoint and the tree base (α))</code> — the form to use when Eye level and Angle between the viewpoint and the tree base (α) are the values you have.</li><li><strong>Angle between the viewpoint and the tree base (α)</strong> = <code>atan(Eye level ÷ Distance from the tree)</code> — the form to use when Eye level and Distance from the tree are the values you have.</li><li><strong>Tree height</strong> = <code>Distance from the tree × ( − tan(Angle between the viewpoint and the tree base (α)) + tan(Angle between the viewpoint and the treetop (β)))</code> — the form to use when Distance from the tree, Angle between the viewpoint and the tree base (α) and Angle between the viewpoint and the treetop (β) are the values you have.</li></ul><p>Any one of Tree height, Eye level and Distance from the tree can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Distance from the tree, Angle between the viewpoint and the treetop (β) and Eye level carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Angle between the viewpoint and the tree base (α), Tree height and Distance from the tree are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Distance from the tree left as a guess.</strong> Anything typed into Distance from the tree is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Angle between the viewpoint and the treetop (β) left as a guess.</strong> Anything typed into Angle between the viewpoint and the treetop (β) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Distance from the tree and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Distance from the tree</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. Change it and Tree height, Eye level and Angle between the viewpoint and the treetop (β) changes with it. Have it to hand before you start: Distance from the tree is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Angle between the viewpoint and the treetop (β)</strong> is a degrees quantity: the page opens it in deg and converts anything else you pick before the formula runs. Change it and Tree height, Eye level and Distance from the tree changes with it. Have it to hand before you start: Angle between the viewpoint and the treetop (β) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Eye level</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. Difference between the height of your eyes and the tree base. Change it and Tree height, Distance from the tree and Angle between the viewpoint and the treetop (β) changes with it. Have it to hand before you start: Eye level is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Angle between the viewpoint and the tree base (α) is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover degrees and meters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Distance from the tree, Angle between the viewpoint and the treetop (β) and Eye level is what you already know and Angle between the viewpoint and the tree base (α) and Tree height is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/livestock-fence">Livestock fence cost Calculator</a>, <a href="/biology/livestock-water-requirement">Livestock Water Requirement Calculator</a> and <a href="/biology/llama">Llama</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Tree height is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Distance from the tree, Angle between the viewpoint and the treetop (β) and Eye level beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tree height calculator work out?', 'a' => <<<'TXT'
            Angle between the viewpoint and the tree base (α), Tree height, Distance from the tree and Angle between the viewpoint and the treetop (β), from Distance from the tree, Angle between the viewpoint and the treetop (β) and Eye level. The relationship is Tree height = Distance from the tree × tan(Angle between the viewpoint and the treetop (β)) + Eye level.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Distance from the tree (meters), Angle between the viewpoint and the treetop (β) (degrees), Eye level (meters). Enter distance from the tree, angle between the viewpoint and the treetop (β) and eye level; Angle between the viewpoint and the tree base (α) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Tree height, Eye level, Distance from the tree and Angle between the viewpoint and the treetop (β) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Angle between the viewpoint and the tree base (α) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
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

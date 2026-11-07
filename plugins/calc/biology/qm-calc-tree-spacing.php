<?php

/**
 * Tree spacing
 * /biology/tree-spacing
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tree spacing',
    'meta' => ['title' => 'Tree spacing Calculator — Formula & Results', 'description' => '<strong>width</strong> is what the Tree spacing calculator works out, and it gets there from the length, the area and the space between trees.', 'h1' => 'Tree spacing Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => 'Planting area specification',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.1'],
                        ],
                        [
                            'name' => 'width',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'are',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Tree type',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Tree_type',
                            'label' => 'Tree type',
                            'type' => 'select',
                            'options' => [
                                'Apple tree (standard) ' => '30',
                                'Alder' => '6.7',
                                'American beech' => '20',
                                'American chestnut' => '28',
                                'American elm' => '20.000001',
                                'European beech' => '24',
                                'Black cherry' => '18',
                                'Black locust' => '24.00000002',
                                'Black walnut' => '30',
                                'Common juniper' => '6',
                                'Cottonwood' => '21.00008',
                                'Douglas fir' => '16',
                                'Dutch elm' => '24.0000005',
                                'Eucalyptus' => '25',
                                'Hornbeam tree' => '15.00008',
                                'Hybrid poplar' => '15',
                                'Linden' => '25.000056',
                                ' Loblolly pine ' => '12',
                                'Mahogany' => '25.000001',
                                'Maple tree' => '25.000024',
                                'Norway spruce' => '10.0001',
                                'Paper birch' => '17',
                                'Pauloownia ' => '16.00001',
                                'Pear tree' => '20.00008',
                                'Red oak' => '23',
                                'Rosewood' => '23.000002',
                                'Rowan & mountain ash' => '22.97',
                                ' Scots pine' => '16.00003',
                                'Western red cedar' => '18.0000001',
                                'White oak' => '26',
                                'White pine' => '20.000003',
                                'Wheeping willow' => '30.0006',
                                'Yellow birch' => '21',
                            ],
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'space_between_trees',
                            'label' => 'Space between trees',
                            'type' => 'number',
                            'help' => 'The minimal recommended distance between your tree seedlings.',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'How many trees you can plant 🌱',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Trees_population',
                            'label' => 'Tree population',
                            'type' => 'number',
                            'help' => 'It\'s rounded down so that when the leftover land is too small for a tree, quarter and half trees are not accounted for.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'area = width*length',
            'results' => ['width' => 'area/length', 'area' => 'length*width', 'length' => 'area/width'],
        ],
        [
            'title' => 'space_between_trees = Tree_type',
            'results' => ['Tree_type' => 'space_between_trees', 'space_between_trees' => 'Tree_type'],
        ],
        [
            'title' => 'Trees_population = floor(length/space_between_trees) * floor(width/space_between_trees)',
            'results' => ['Trees_population' => 'floor(length/space_between_trees)*floor(width/space_between_trees)'],
        ],
    ],
    'article' => [
        'intro' => '<strong>width</strong> is what the Tree spacing calculator works out, and it gets there from the length, the area and the space between trees.',
        'sections' => [
            ['title' => 'How does the Tree spacing calculator work?', 'html' => <<<'TXT'
            <p>The Tree spacing calculator takes the values in the form, applies the relationship described below and reports <strong>width</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the length, the area and the space between trees.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in ares. The unit chip switches it to any of the 24 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Length</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Width</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Area</strong></td><td>A measured quantity, 24 units available.</td><td>ares</td><td>You supply it</td></tr><tr><td><strong>Tree type</strong></td><td>One of 33 options, such as apple tree (standard), alder and american beech.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Space between trees</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Tree population</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Tree spacing calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Width</span><span class="formula-eq">=</span><span class="formula-rhs">area ÷ length</span></div><div class="formula-row"><span class="formula-lhs">Tree type</span><span class="formula-eq">=</span><span class="formula-rhs">space between trees</span></div><div class="formula-row"><span class="formula-lhs">Tree population</span><span class="formula-eq">=</span><span class="formula-rhs">rounded down, (length ÷ space between trees) × rounded down, (width ÷ space between trees)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>The form opens with a complete set of values: <strong>Tree type</strong> set to Apple tree (standard). Straight away the calculator returns <strong>Space between trees</strong> = 3000 m.</p><p>Those are real numbers produced by the same engine that runs when you press Calculate, so you can change any single box afterwards and watch the answer move from this starting point.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Space between trees</strong> = 3000 m should be roughly the size you expected from <strong>Tree type</strong> set to Apple tree (standard).</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>The option the calculation settles on.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Area, opening in ares</li><li>Length, opening in meters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Tree spacing calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 3 figures keep coming back — the length, the area and the space between trees — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/tree-value">Tree value</a>, <a href="/biology/trihybrid-cross-punnett-square">Trihybrid cross Punnett square</a> and <a href="/biology/turtle-tank">Turtle tank</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tree spacing calculator work out?', 'a' => <<<'TXT'
            It returns width, derived from the length, the area and the space between trees. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Tree spacing calculator?', 'a' => <<<'TXT'
            The form asks for the length, the area and the space between trees, which is 3 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter length in a different unit?', 'a' => <<<'TXT'
            Yes. Length opens in meters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Space between trees = 3000 m. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Tree spacing calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/tree-value', 'name' => 'Tree value'],
            ['path' => '/biology/trihybrid-cross-punnett-square', 'name' => 'Trihybrid cross Punnett square'],
            ['path' => '/biology/turtle-tank', 'name' => 'Turtle tank'],
        ],
    ],
];

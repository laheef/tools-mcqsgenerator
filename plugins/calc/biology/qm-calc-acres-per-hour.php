<?php

/**
 * Acres per hour
 * /biology/acres-per-hour
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Acres per hour',
    'meta' => ['title' => 'Acres per hour Calculator — Formula & Results', 'description' => 'Supply the tool\'s width, the plot area, the time to complete and the overlap and the Acres per hour calculator solves for <strong>area per hour</strong>.', 'h1' => 'Acres per hour Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tool_width',
                            'label' => 'Tool\'s width',
                            'type' => 'number',
                            'help' => 'Width of your mower, plow, seeder, etc.',
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
                            'name' => 'speed',
                            'label' => 'Speed',
                            'type' => 'number',
                            'unit' => '32',
                            'unit_default' => 'kmph',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area_per_hour',
                            'label' => 'Area per hour',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'hectare',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Mowing time',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Plot area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'hectare',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time',
                            'label' => 'Time to complete',
                            'type' => 'number',
                            'help' => 'The time to complete for chosen plot area. It is a rough estimation as the plot may have different shapes.',
                            'unit' => '19',
                            'unit_default' => 'hrsmin',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Overlapping area',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'overlap',
                            'label' => 'Overlap',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'time = area / (area_per_hour/3600)',
            'results' => ['area_per_hour' => '3600*area/time', 'area' => '(1/3600)*area_per_hour*time', 'time' => '3600*area/area_per_hour'],
        ],
        [
            'title' => 'area_per_hour = speed * tool_width * (1 - overlap) * 3600',
            'results' => ['speed' => '-1/3600*area_per_hour/(tool_width*(overlap - 1))', 'overlap' => '-1/3600*area_per_hour/(speed*tool_width) + 1', 'area_per_hour' => '3600*speed*tool_width*(1 - overlap)', 'tool_width' => '-1/3600*area_per_hour/(speed*(overlap - 1))'],
        ],
    ],
    'article' => [
        'intro' => 'Supply the tool\'s width, the plot area, the time to complete and the overlap and the Acres per hour calculator solves for <strong>area per hour</strong>.',
        'sections' => [
            ['title' => 'How does the Acres per hour calculator work?', 'html' => <<<'TXT'
            <p>The Acres per hour calculator takes the values in the form, applies the relationship described below and reports <strong>area per hour</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the tool's width, the plot area, the time to complete and the overlap.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li> The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in hectares. The unit chip switches it to any of the 24 supported units.</li><li>A measured quantity, entered by default in hours / minutes. </li><li>A measured quantity, entered by default in percent. The unit chip switches it to any of the 6 supported units.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Tool's width</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Speed</strong></td><td>A measured quantity, 25 units available.</td><td>kilometers per hour</td><td>Calculated</td></tr><tr><td><strong>Area per hour</strong></td><td>A measured quantity, 24 units available.</td><td>hectares</td><td>Calculated</td></tr><tr><td><strong>Plot area</strong></td><td>A measured quantity, 24 units available.</td><td>hectares</td><td>You supply it</td></tr><tr><td><strong>Time to complete</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes</td><td>You supply it</td></tr><tr><td><strong>Overlap</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Acres per hour calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Area per hour</span><span class="formula-eq">=</span><span class="formula-rhs">3600 × plot area ÷ time to complete</span></div><div class="formula-row"><span class="formula-lhs">Speed</span><span class="formula-eq">=</span><span class="formula-rhs">-1 ÷ 3600 × area per hour ÷ (tool&#x27;s width × (overlap − 1))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Take <strong>Plot area</strong> = 10 ha, <strong>Time to complete</strong> = 10 hrs and <strong>Overlap</strong> = 10 %. The calculator returns <strong>Area per hour</strong> = 1 ha.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Area per hour</strong> = 1 ha should be roughly the size you expected from <strong>Plot area</strong> = 10 ha and <strong>Time to complete</strong> = 10 hrs.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in hectares, and convertible to any of the 24 units on that chip.</li><li>Shown in kilometers per hour, and convertible to any of the 25 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Speed, opening in kilometers per hour</li><li>Area, opening in hectares</li><li>Area, opening in hectares</li><li>Time, opening in hours / minutes</li><li>%, opening in percent</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Acres per hour calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 4 figures keep coming back — the tool's width, the plot area and the time to complete — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Keep the units you enter consistent. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/allele-frequency">Allele frequency</a>, <a href="/biology/animal-mortality-rate">Animal mortality rate</a> and <a href="/biology/annealing-temperature">Annealing temperature</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Acres per hour calculator work out?', 'a' => <<<'TXT'
            It returns area per hour, derived from the tool's width, the plot area and the time to complete. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Acres per hour calculator?', 'a' => <<<'TXT'
            The form asks for the tool's width, the plot area, the time to complete and the overlap, which is 4 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter tool\'s width in a different unit?', 'a' => <<<'TXT'
            Yes. Tool's width opens in centimeters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Area per hour = 1 ha. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Acres per hour calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/allele-frequency', 'name' => 'Allele frequency'],
            ['path' => '/biology/animal-mortality-rate', 'name' => 'Animal mortality rate'],
            ['path' => '/biology/annealing-temperature', 'name' => 'Annealing temperature'],
        ],
    ],
];

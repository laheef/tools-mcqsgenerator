<?php

/**
 * Pine straw
 * /biology/pine-straw
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pine straw',
    'meta' => ['title' => 'Pine straw Calculator: Formula, Steps & Examples', 'description' => <<<'TXT'
    The Pine straw calculator turns the length, the width and number of bales needed into <strong>area</strong>. The Pine straw calculator takes the values in the…
    TXT, 'h1' => 'Pine straw Calculator', 'updated' => '2026-06-02'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'ft',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'width',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'ft',
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
                            'unit_default' => 'ft2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalStraw',
                            'label' => 'Number of bales needed',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'We are working on the assumption that each bale covers roughly 35-40 square feet when used for a 2"-3" depth.&nbsp;'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Bales per square feet',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'balesPerSquareFeet',
                            'label' => 'Number of bales',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'area = length * width',
            'results' => ['area' => 'length*width', 'length' => 'area/width', 'width' => 'area/length'],
        ],
        [
            'title' => 'totalStraw = area/balesPerSquareFeet',
            'results' => ['area' => 'balesPerSquareFeet*totalStraw', 'balesPerSquareFeet' => 'area/totalStraw', 'totalStraw' => 'area/balesPerSquareFeet'],
        ],
    ],
    'article' => [
        'intro' => 'The Pine straw calculator turns the length, the width and number of bales needed into <strong>area</strong>.',
        'sections' => [
            ['title' => 'How does the Pine straw calculator work?', 'html' => <<<'TXT'
            <p>The Pine straw calculator takes the values in the form, applies the relationship described below and reports <strong>area</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the length, the width and number of bales needed.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in feet. The unit chip switches it to any of the 34 supported units.</li><li>A measured quantity, entered by default in feet. The unit chip switches it to any of the 34 supported units.</li><li>A plain number with no unit attached.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Length</strong></td><td>A measured quantity, 34 units available.</td><td>feet</td><td>You supply it</td></tr><tr><td><strong>Width</strong></td><td>A measured quantity, 34 units available.</td><td>feet</td><td>You supply it</td></tr><tr><td><strong>Area</strong></td><td>A measured quantity, 24 units available.</td><td>square feet</td><td>Calculated</td></tr><tr><td><strong>Number of bales needed</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Number of bales</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Pine straw calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Area</span><span class="formula-eq">=</span><span class="formula-rhs">length × width</span></div><div class="formula-row"><span class="formula-lhs">Area</span><span class="formula-eq">=</span><span class="formula-rhs">number of bales × number of bales needed</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in square feet, and convertible to any of the 24 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in feet</li><li>Length, opening in feet</li><li>Area, opening in square feet</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Pine straw calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 3 figures keep coming back — the length, the width and number of bales needed — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Pine straw calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — length for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/plant-population">Plant population</a>, <a href="/biology/plants">Plant spacing</a> and <a href="/biology/potting-soil-calculator">Potting soil</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pine straw calculator work out?', 'a' => <<<'TXT'
            It returns area, derived from the length, the width and number of bales needed. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Pine straw calculator?', 'a' => <<<'TXT'
            The form asks for the length, the width and number of bales needed, which is 3 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter length in a different unit?', 'a' => <<<'TXT'
            Yes. Length opens in feet and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the Pine straw calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/plant-population', 'name' => 'Plant population'],
            ['path' => '/biology/plants', 'name' => 'Plant spacing'],
            ['path' => '/biology/potting-soil-calculator', 'name' => 'Potting soil'],
        ],
    ],
];

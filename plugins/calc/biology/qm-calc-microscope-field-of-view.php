<?php

/**
 * Microscope Field of View Calculator
 * /biology/microscope-field-of-view
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Microscope Field of View Calculator',
    'meta' => ['title' => 'Microscope Field of View Calculator — Biology', 'description' => 'The field of view is how much of the specimen you see through the eyepiece: the eyepiece field number divided by the objective magnification.', 'h1' => 'Microscope Field of View Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'field_number',
                            'label' => 'Eyepiece field number',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'Usually printed on the eyepiece, 18–26',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'magnification',
                            'label' => 'Objective magnification',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '4, 10, 40 or 100',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'fov_mm',
                            'label' => 'Field of view',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fov_um',
                            'label' => 'Field of view',
                            'type' => 'number',
                            'suffix' => 'µm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'area_mm2',
                            'label' => 'Area of the field',
                            'type' => 'number',
                            'suffix' => 'mm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cells_seen',
                            'label' => 'Cells counted in the field',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Cell density',
                            'type' => 'number',
                            'suffix' => 'cells/mm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'density_ml',
                            'label' => 'Cells per mL',
                            'type' => 'number',
                            'help' => 'Assumes a monolayer on a haemocytometer scale',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Field',
            'results' => [
                'fov_mm' => 'field_number/magnification',
                'fov_um' => 'field_number/magnification*1000',
                'area_mm2' => '3.14159265358979*(field_number/magnification/2)^2',
                'density' => 'cells_seen/(3.14159265358979*(field_number/magnification/2)^2)',
                'density_ml' => 'cells_seen/(3.14159265358979*(field_number/magnification/2)^2)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The field of view is how much of the specimen you see through the eyepiece: the eyepiece field number divided by the objective magnification. It returns field of view, field of view, area of the field and cell density, and the panel shows all of them at once.
        
        It decides how many cells fit in one frame, which is the first number you need to turn a count into a concentration.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Microscope Field of View', 'html' => <<<'TXT'
            <p>FOV (mm) = field number ÷ magnification. Area = π × (FOV ÷ 2)². Density = cells counted ÷ area</p>
            <figure class="calc-figure"><img src="/uploads/biology/microscope-field-of-view.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Microscope Field of View Calculator — Field of view with a 20 mm field number (mm)" title="Microscope Field of View Calculator"><figcaption>Field of view with a 20 mm field number (mm)</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>FN</code></td><td>field number of the eyepiece, in mm</td><td>mm</td></tr><tr><td><code>M</code></td><td>objective magnification</td><td>×</td></tr><tr><td><code>FOV</code></td><td>diameter of the circular field of view</td><td>mm</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Microscope Field of View?', 'html' => <<<'TXT'
            <ol><li>Read the field number off the eyepiece (18, 20, 22 or 25 mm is common).</li><li>Enter the objective magnification you are using.</li><li>The diameter, area and — if you counted cells — the density are calculated.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: eyepiece field number of <strong>20</strong> mm, objective magnification of <strong>40</strong> ×, cells counted in the field of <strong>50</strong>.</p>
            <p>Substituting them into the formula gives field of view of <strong>0.5</strong> mm, field of view of <strong>500</strong> µm, area of the field of <strong>0.1963</strong> mm², cell density of <strong>254.65</strong> cells/mm², cells per ml of <strong>25,464.79</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>4× / 10×</td><td><strong>Overview</strong></td><td>find the specimen and check confluence</td></tr><tr><td>40×</td><td><strong>Counting</strong></td><td>individual cells are distinguishable</td></tr><tr><td>100× oil</td><td><strong>Detail</strong></td><td>subcellular structure, not for counting</td></tr></tbody></table>
            <ul><li><p>The objective magnifies, not the eyepiece: a 10× eyepiece with a 20 mm field number gives a 2 mm field at 10× and a 0.5 mm field at 40×.</p></li><li><p>Counting cells in a field only gives a density once you know the area — which is why the field number matters and the eyepiece magnification does not.</p></li><li><p>For a haemocytometer the field of view is irrelevant: the grid defines the volume, and a count there is already per 0.1 µL.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using the eyepiece magnification instead of the field number, which gives a made-up answer.</li><li>Assuming the field is square — it is a circle, so the area uses π.</li><li>Comparing cell counts from different objectives without rescaling to area.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a field number?', 'a' => 'The diameter in millimetres of the image the eyepiece shows before the objective magnifies it, usually 18–26 mm.'],
            ['q' => 'How big is the field at 400× total magnification?', 'a' => 'With a 20 mm field number and a 40× objective, 0.5 mm across — about 0.196 mm².'],
            ['q' => 'Does the eyepiece magnification change the field?', 'a' => 'No, only the field number does; the eyepiece\'s 10× affects the apparent size, not the area imaged.'],
            ['q' => 'What does the Microscope Field of View actually calculate?', 'a' => <<<'TXT'
            It returns field of view, field of view, area of the field and cell density. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [],
    ],
];

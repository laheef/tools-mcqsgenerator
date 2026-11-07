<?php

/**
 * Microscope Magnification Calculator
 * /biology/microscope-magnification
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Microscope Magnification Calculator',
    'meta' => ['title' => 'Microscope Magnification Calculator — Biology', 'description' => <<<'TXT'
    Total magnification is the objective times the eyepiece, but what people usually need is the reverse: how big the object actually is. This calculator converts…
    TXT, 'h1' => 'Microscope Magnification Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'objective',
                            'label' => 'Objective magnification',
                            'type' => 'number',
                            'suffix' => '×',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'eyepiece',
                            'label' => 'Eyepiece magnification',
                            'type' => 'number',
                            'suffix' => '×',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'field_number',
                            'label' => 'Field number',
                            'type' => 'number',
                            'help' => 'Eyepiece field number, usually 18–22',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'measured',
                            'label' => 'Measured image size',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'On the printed or on-screen image',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total magnification',
                            'type' => 'number',
                            'suffix' => '×',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fov',
                            'label' => 'Field of view',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'actual',
                            'label' => 'Actual specimen size',
                            'type' => 'number',
                            'suffix' => 'µm',
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
            'title' => 'Magnification',
            'results' => ['total' => 'objective*eyepiece', 'fov' => 'field_number/objective', 'actual' => 'measured/(objective*eyepiece)*1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Total magnification is the objective times the eyepiece, but what people usually need is the reverse: how big the object actually is. It returns total magnification, field of view and actual specimen size, and the panel shows all of them at once.
        
        This calculator converts a measured image size into a real size, and a real size into the field of view.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Microscope Magnification', 'html' => <<<'TXT'
            <p>Total magnification = objective × eyepiece; field of view = field number ÷ objective</p>
            <figure class="calc-figure"><img src="/uploads/biology/microscope-magnification.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Microscope Magnification Calculator — Objective, eyepiece, and the size of the real object." title="Microscope Magnification Calculator"><figcaption>Objective, eyepiece, and the size of the real object.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>objective</code></td><td>objective lens magnification</td><td>×</td></tr><tr><td><code>eyepiece</code></td><td>ocular magnification</td><td>×</td></tr><tr><td><code>field number</code></td><td>the eyepiece's field-of-view diameter in mm</td><td>mm</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Microscope Magnification?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: objective magnification of <strong>40</strong> ×, eyepiece magnification of <strong>10</strong> ×, field number of <strong>20</strong>, measured image size of <strong>25</strong> mm.</p>
            <p>Substituting them into the formula gives total magnification of <strong>400</strong> ×, field of view of <strong>0.5</strong> mm, actual specimen size of <strong>62.5</strong> µm.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Resolution, not magnification, is the limit: 0.2 µm is about the best a light microscope can do, and empty magnification beyond about 1000× adds nothing.</p></li><li><p>Use a stage micrometer to calibrate a camera or an eyepiece graticule — the printed magnification of a screen image is almost never the optical one.</p></li><li><p>Field of view shrinks in proportion to the objective magnification: a 40× objective on a 20 mm field number sees 0.5 mm.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Multiplying by the camera's digital zoom and calling it magnification.</li><li>Measuring an image printed at a different size than assumed.</li><li>Confusing field of view (diameter) with field area.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is the magnification of a 40× objective with a 10× eyepiece?', 'a' => '400×.'],
            ['q' => 'How do I measure a cell from a photograph?', 'a' => 'Calibrate with a stage micrometer, then measure pixels and convert; the optical magnification alone does not tell you the scale of a resized image.'],
            ['q' => 'What does the Microscope Magnification actually calculate?', 'a' => 'It returns total magnification, field of view and actual specimen size. Each one is derived by the formula on this page, so you can check any figure by hand.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
        ],
        'related' => [],
    ],
];

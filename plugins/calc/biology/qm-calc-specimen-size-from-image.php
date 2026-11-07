<?php

/**
 * Actual Specimen Size from Image Calculator
 * /biology/specimen-size-from-image
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Actual Specimen Size from Image Calculator',
    'meta' => ['title' => 'Actual Specimen Size from Image Calculator — Biology', 'description' => 'Turn a measurement taken on a photograph or a micrograph into the real size of the object. It returns actual length, image to real ratio, actual length and…', 'h1' => 'Actual Specimen Size from Image Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'measured_mm',
                            'label' => 'Object length on the image',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'Measure with a ruler on paper or a pixel ruler on screen',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'scale_mm',
                            'label' => 'Scale bar length on the image',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'Set to 0 to use the magnification instead',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'scale_real_um',
                            'label' => 'Real length of the scale bar',
                            'type' => 'number',
                            'suffix' => 'µm',
                            'help' => 'What the bar represents',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'magnification',
                            'label' => 'Microscope magnification',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => 'Only used if there is no scale bar (leave the scale bar at 0)',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '400',
                        ],
                        [
                            'name' => 'actual_um',
                            'label' => 'Actual length',
                            'type' => 'number',
                            'suffix' => 'µm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'actual_mm',
                            'label' => 'Actual length',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Image to real ratio',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => 'How much the image is enlarged',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'area_um2',
                            'label' => 'Area if square',
                            'type' => 'number',
                            'suffix' => 'µm²',
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
            'title' => 'Scale',
            'results' => ['actual_um' => 'measured_mm*(if_else(scale_mm>0,scale_real_um/max(scale_mm,0.000001),1000/magnification))', 'ratio' => '(if_else(scale_mm>0,scale_real_um/max(scale_mm,0.000001),1000/magnification))', 'actual_mm' => 'measured_mm*(if_else(scale_mm>0,scale_real_um/max(scale_mm,0.000001),1000/magnification))/1000', 'area_um2' => '(measured_mm*(if_else(scale_mm>0,scale_real_um/max(scale_mm,0.000001),1000/magnification)))^2'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Turn a measurement taken on a photograph or a micrograph into the real size of the object. It returns actual length, image to real ratio, actual length and area if square, and the panel shows all of them at once.
        
        You need one known reference — a scale bar, a stage micrometer or a ruler in the frame — and the length you measured on the image; the ratio gives the answer whether the image is a hand specimen or an electron micrograph.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Actual Specimen Size from Image', 'html' => <<<'TXT'
            <p>Actual size = (measured length ÷ scale bar length) × real length of the bar. Without a scale bar: actual size = measured length ÷ magnification</p>
            <figure class="calc-figure"><img src="/uploads/biology/specimen-size-from-image.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Actual Specimen Size from Image Calculator — Actual sizes across microscopy scales (µm)" title="Actual Specimen Size from Image Calculator"><figcaption>Actual sizes across microscopy scales (µm)</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>scale bar</code></td><td>a line of known real length printed on the image</td><td>mm</td></tr><tr><td><code>magnification</code></td><td>how many times the specimen is enlarged</td><td>×</td></tr><tr><td><code>µm</code></td><td>micrometre, a thousandth of a millimetre</td><td>m</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Actual Specimen Size from Image?', 'html' => <<<'TXT'
            <ol><li>Measure the object and the scale bar on the same image, in the same units.</li><li>Enter what the scale bar represents in real life.</li><li>The actual size follows in micrometres and millimetres; without a bar, use the magnification.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: object length on the image of <strong>30</strong> mm, scale bar length on the image of <strong>0</strong> mm, real length of the scale bar of <strong>100</strong> µm, microscope magnification of <strong>400</strong> ×.</p>
            <p>Substituting them into the formula gives actual length of <strong>75</strong> µm, image to real ratio of <strong>2.5</strong> ×, actual length of <strong>0.075</strong> mm, area if square of <strong>5,625</strong> µm².</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>4× – 10×</td><td><strong>Stereo microscope</strong></td><td>whole insects, plant parts, millimetre features</td></tr><tr><td>40× – 100×</td><td><strong>Compound, low power</strong></td><td>cells and tissue layers</td></tr><tr><td>400× – 1 000×</td><td><strong>Compound, high power</strong></td><td>organelles, bacteria</td></tr><tr><td>above 10 000×</td><td><strong>Electron microscope</strong></td><td>viruses and membranes; a scale bar is essential</td></tr></tbody></table>
            <ul><li><p>Always measure the scale bar in the same units and on the same copy of the image — printing or resizing changes every pixel-based measurement.</p></li><li><p>A scale bar is more reliable than the magnification written on the image: micrographs are cropped and resized constantly, and the number in the caption is often the original setting.</p></li><li><p>Electron micrographs have no meaningful optical magnification to quote; measure the bar.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using the on-screen size of a resized image against a magnification figure.</li><li>Mixing millimetres and micrometres between the measurement and the scale bar.</li><li>Measuring the object with a bent ruler or along a curve, which over-estimates a long specimen.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I find the real size of a specimen?', 'a' => 'Divide the measurement on the image by the scale bar\'s image length, then multiply by the bar\'s real length.'],
            ['q' => 'What if there is no scale bar?', 'a' => 'Divide by the magnification instead, but only if you are sure of it.'],
            ['q' => 'Why measure a scale bar rather than use the objective?', 'a' => 'Because the image may have been resized; the bar scales with the picture and the objective number does not.'],
            ['q' => 'What does the Actual Specimen Size from Image actually calculate?', 'a' => <<<'TXT'
            It returns actual length, image to real ratio, actual length and area if square. Each one is derived by the formula on this page, so you can check any figure by hand.
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

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
    'meta' => ['title' => 'Actual Specimen Size from Image Calculator — Biology', 'description' => 'Actual Specimen Size from Image works out Actual length and Actual length from Object length on the image, Scale bar length on the image and Real length of…', 'h1' => 'Actual Specimen Size from Image Calculator', 'updated' => '2026-10-29'],
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
        Actual Specimen Size from Image works out Actual length and Actual length from Object length on the image, Scale bar length on the image and Real length of the scale bar. The arithmetic is the whole method: Actual length is worked out from Object length on the image by one formula, applied once. Actual length comes back in µm unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Actual Specimen Size from Image calculator works', 'html' => <<<'TXT'
            <p>The Actual Specimen Size from Image calculator applies one relationship to 4 numbers and reports Actual length, Actual length and Image to real ratio.</p><p>The relationship it solves reads Actual length = Object length on the image × (if_else(Scale bar length on the image&gt;0,Real length of the scale bar ÷ max(Scale bar length on the image,0.000001),1000 ÷ Microscope magnification)).</p><p>What comes back is Actual length, Actual length, Image to real ratio and Area if square — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Object length on the image</strong> — in mm. Measure with a ruler on paper or a pixel ruler on screen</li><li><strong>Scale bar length on the image</strong> — in mm. Set to 0 to use the magnification instead</li><li><strong>Real length of the scale bar</strong> — in µm. What the bar represents</li><li><strong>Microscope magnification</strong> — in ×. Only used if there is no scale bar (leave the scale bar at 0)</li></ul><p>What you get back is Actual length in µm, Actual length in mm, Image to real ratio in ×, Area if square in µm², shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Object length on the image = 30 mm, Scale bar length on the image = 4 mm, Real length of the scale bar = 100 µm and Microscope magnification = 400 × — through the same formula and the panel reports &lt;strong&gt;Actual length&lt;/strong&gt; = 750 µm, &lt;strong&gt;Image to real ratio&lt;/strong&gt; = 25 ×, &lt;strong&gt;Actual length&lt;/strong&gt; = 0.75 mm and &lt;strong&gt;Area if square&lt;/strong&gt; = 562500 µm².</p><ul><li><strong>Actual length</strong> = 750 µm</li><li><strong>Image to real ratio</strong> = 25 ×</li><li><strong>Actual length</strong> = 0.75 mm</li><li><strong>Area if square</strong> = 562500 µm²</li></ul><p>The line behind those figures is <strong>Actual length</strong> = <code>Object length on the image × (if_else(Scale bar length on the image&gt;0,Real length of the scale bar ÷ max(Scale bar length on the image,0.000001),1000 ÷ Microscope magnification))</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Actual length&lt;/strong&gt; = 750, &lt;strong&gt;Image to real ratio&lt;/strong&gt; = 25, &lt;strong&gt;Actual length&lt;/strong&gt; = 0.75 and &lt;strong&gt;Area if square&lt;/strong&gt; = 562500. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Actual length is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Actual length</strong> = <code>Object length on the image × (if_else(Scale bar length on the image&gt;0,Real length of the scale bar ÷ max(Scale bar length on the image,0.000001),1000 ÷ Microscope magnification))</code></li><li><strong>Image to real ratio</strong> = <code>(if_else(Scale bar length on the image&gt;0,Real length of the scale bar ÷ max(Scale bar length on the image,0.000001),1000 ÷ Microscope magnification))</code></li><li><strong>Area if square</strong> = <code>(Object length on the image × (if_else(Scale bar length on the image&gt;0,Real length of the scale bar ÷ max(Scale bar length on the image,0.000001),1000 ÷ Microscope magnification))) ^ 2</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Actual length, Image to real ratio and Actual length can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Object length on the image, from 30 to 60 — and the answers go from &lt;strong&gt;Actual length&lt;/strong&gt; 750 µm, &lt;strong&gt;Image to real ratio&lt;/strong&gt; 25 ×, &lt;strong&gt;Actual length&lt;/strong&gt; 0.75 mm and &lt;strong&gt;Area if square&lt;/strong&gt; 562500 µm² to &lt;strong&gt;Actual length&lt;/strong&gt; 1500 µm, &lt;strong&gt;Image to real ratio&lt;/strong&gt; 25 ×, &lt;strong&gt;Actual length&lt;/strong&gt; 1.5 mm and &lt;strong&gt;Area if square&lt;/strong&gt; 2.250e+6 µm².</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Actual length, Actual length and Image to real ratio are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Object length on the image is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Object length on the image, Scale bar length on the image and Real length of the scale bar is what you already know and Actual length and Actual length is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/solids-retention-time">Solids Retention Time (SRT) Calculator</a>, <a href="/biology/solute-potential">Solute Potential Calculator</a> and <a href="/biology/species-richness">Species Richness Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Actual Specimen Size from Image calculator work out?', 'a' => <<<'TXT'
            Actual length, Actual length, Image to real ratio and Area if square, from Object length on the image, Scale bar length on the image, Real length of the scale bar and Microscope magnification. The relationship is Actual length = Object length on the image × (if_else(Scale bar length on the image>0,Real length of the scale bar ÷ max(Scale bar length on the image,0.000001),1000 ÷ Microscope magnification)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Object length on the image (mm), Scale bar length on the image (mm), Real length of the scale bar (µm), Microscope magnification (×). With measured_mm, scale_mm and scale_real_um in place, Actual length can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Actual length, Image to real ratio, Actual length and Area if square can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Actual length = 750 µm, Image to real ratio = 25 ×, Actual length = 0.75 mm and Area if square = 562500 µm². The figures come from Object length on the image as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Actual length is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Object length on the image left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Actual length keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/solids-retention-time', 'name' => 'Solids Retention Time (SRT) Calculator'],
            ['path' => '/biology/solute-potential', 'name' => 'Solute Potential Calculator'],
            ['path' => '/biology/species-richness', 'name' => 'Species Richness Calculator'],
        ],
        'authors' => [],
    ],
];

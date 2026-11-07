<?php

/**
 * Cell Surface Area to Volume Ratio Calculator
 * /biology/cell-surface-area-volume-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell Surface Area to Volume Ratio Calculator',
    'meta' => ['title' => 'Cell Surface Area to Volume Ratio Calculator', 'description' => 'A cell\'s surface area to volume ratio sets how fast it can exchange materials, and it falls as the cell grows — which is why cells divide instead of getting b', 'h1' => 'Cell Surface Area to Volume Ratio Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'shape',
                            'label' => 'Shape',
                            'type' => 'select',
                            'options' => ['Sphere (coccus)' => '1', 'Rod, 2:1 (bacillus)' => '2', 'Cube' => '3'],
                            'default' => 'Sphere (coccus)',
                        ],
                        [
                            'name' => 'size',
                            'label' => 'Size (diameter or length)',
                            'type' => 'number',
                            'suffix' => 'µm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'flux',
                            'label' => 'Surface flux',
                            'type' => 'number',
                            'suffix' => 'µmol/m²/s',
                            'help' => 'Substrate uptake per area',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.0',
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Surface area',
                            'type' => 'number',
                            'suffix' => 'µm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Volume',
                            'type' => 'number',
                            'suffix' => 'µm³',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Surface area to volume',
                            'type' => 'number',
                            'suffix' => 'per µm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'uptake',
                            'label' => 'Total uptake capacity',
                            'type' => 'number',
                            'suffix' => 'µmol/s',
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
            'title' => 'Geometry',
            'results' => ['area' => 'if_else(shape==1,4*pi*pow(size/2,2),if_else(shape==2,2*pi*pow(size/2,2)+2*pi*size/2*size*2,6*size*size))', 'volume' => 'if_else(shape==1,4/3*pi*pow(size/2,3),if_else(shape==2,pi*pow(size/2,2)*size*2,pow(size,3)))', 'ratio' => <<<'TXT'
            if_else(shape==1,4*pi*pow(size/2,2),if_else(shape==2,2*pi*pow(size/2,2)+2*pi*size/2*size*2,6*size*size))/if_else(shape==1,4/3*pi*pow(size/2,3),if_else(shape==2,pi*pow(size/2,2)*size*2,pow(size,3)))
            TXT, 'uptake' => 'if_else(shape==1,4*pi*pow(size/2,2),if_else(shape==2,2*pi*pow(size/2,2)+2*pi*size/2*size*2,6*size*size))*flux'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Shape, Size (diameter or length) and Surface flux into Cell Surface Area to Volume Ratio and the answer comes back as Surface area and Volume. Nothing is looked up on this page: Surface area is computed from Shape and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Surface area is opened in µm²; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Cell Surface Area to Volume Ratio calculator works', 'html' => <<<'TXT'
            <p>Cell Surface Area to Volume Ratio answers one question from 3 numbers, and the answer is Surface area, Volume and Surface area to volume.</p><p>The answers are Surface area, Volume, Surface area to volume and Total uptake capacity; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Shape</strong> — a plain number, no unit</li><li><strong>Size (diameter or length)</strong> — in µm</li><li><strong>Surface flux</strong> — in µmol/m²/s. Substrate uptake per area</li></ul><p>The result boxes are Surface area in µm², Volume in µm³, Surface area to volume in per µm, Total uptake capacity in µmol/s; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Shape = 1, Size (diameter or length) = 2 µm and Surface flux = 1 µmol/m²/s; the answers are &lt;strong&gt;Surface area&lt;/strong&gt; = 12.57 µm², &lt;strong&gt;Volume&lt;/strong&gt; = 4.19 µm³, &lt;strong&gt;Surface area to volume&lt;/strong&gt; = 3 per µm and &lt;strong&gt;Total uptake capacity&lt;/strong&gt; = 12.57 µmol/s.</p><ul><li><strong>Surface area</strong> = 12.57 µm²</li><li><strong>Volume</strong> = 4.19 µm³</li><li><strong>Surface area to volume</strong> = 3 per µm</li><li><strong>Total uptake capacity</strong> = 12.57 µmol/s</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Surface area&lt;/strong&gt; = 12.57, &lt;strong&gt;Volume&lt;/strong&gt; = 4.19, &lt;strong&gt;Surface area to volume&lt;/strong&gt; = 3 and &lt;strong&gt;Total uptake capacity&lt;/strong&gt; = 12.57. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Surface area is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Volume</strong> = <code>if_else(Shape==1,4 ÷ 3 × pi × (Size (diameter or length) ÷ 2)^(3),if_else(Shape==2,pi × (Size (diameter or length) ÷ 2)^(2) × Size (diameter or length) × 2,(Size (diameter or length))^(3)))</code></li></ul><p>Any one of Surface area, Volume and Surface area to volume can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Shape, from 1 to 2 — and the answers go from &lt;strong&gt;Surface area&lt;/strong&gt; 12.57 µm², &lt;strong&gt;Volume&lt;/strong&gt; 4.19 µm³, &lt;strong&gt;Surface area to volume&lt;/strong&gt; 3 per µm and &lt;strong&gt;Total uptake capacity&lt;/strong&gt; 12.57 µmol/s to &lt;strong&gt;Surface area&lt;/strong&gt; 31.42 µm², &lt;strong&gt;Volume&lt;/strong&gt; 12.57 µm³, &lt;strong&gt;Surface area to volume&lt;/strong&gt; 2.5 per µm and &lt;strong&gt;Total uptake capacity&lt;/strong&gt; 31.42 µmol/s.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Surface area, Volume and Surface area to volume are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Shape to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Shape, Size (diameter or length) and Surface flux measured, Surface area and Volume wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/chicken-years-to-human-years">Chicken Years to Human Years Calculator</a>, <a href="/biology/coding-capacity-of-dna">Coding Capacity of DNA Calculator</a> and <a href="/biology/codon-adaptation-index">Codon Adaptation Index Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cell Surface Area to Volume Ratio calculator work out?', 'a' => 'Surface area, Volume, Surface area to volume and Total uptake capacity, from Shape and Size (diameter or length).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Shape, Size (diameter or length) (µm), Surface flux (µmol/m²/s). Enter shape, size and flux; Surface area is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Surface area, Volume, Surface area to volume and Total uptake capacity blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Surface area = 12.57 µm², Volume = 4.19 µm³, Surface area to volume = 3 per µm and Total uptake capacity = 12.57 µmol/s. The figures come from Shape as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Surface area is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Shape left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Surface area at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/chicken-years-to-human-years', 'name' => 'Chicken Years to Human Years Calculator'],
            ['path' => '/biology/coding-capacity-of-dna', 'name' => 'Coding Capacity of DNA Calculator'],
            ['path' => '/biology/codon-adaptation-index', 'name' => 'Codon Adaptation Index Calculator'],
        ],
        'authors' => [],
    ],
];

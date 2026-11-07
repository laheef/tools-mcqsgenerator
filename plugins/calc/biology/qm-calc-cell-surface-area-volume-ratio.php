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
    'meta' => ['title' => 'Cell Surface Area to Volume Ratio Calculator', 'description' => <<<'TXT'
    A cell's surface area to volume ratio sets how fast it can exchange materials, and it falls as the cell grows — which is why cells divide instead of getting…
    TXT, 'h1' => 'Cell Surface Area to Volume Ratio Calculator', 'updated' => '2026-10-29'],
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
        A cell's surface area to volume ratio sets how fast it can exchange materials, and it falls as the cell grows — which is why cells divide instead of getting bigger. It returns surface area, volume, surface area to volume and total uptake capacity, and the panel shows all of them at once.
        
        This calculator returns the ratio for spheres, rods and cubes, and the size at which diffusion becomes limiting.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Cell Surface Area to Volume Ratio', 'html' => <<<'TXT'
            <p>Sphere: A = 4πr², V = 4⁄3πr³, A/V = 3/r; cube: A/V = 6/s</p>
            <figure class="calc-figure"><img src="/uploads/biology/cell-surface-area-volume-ratio.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Cell Surface Area to Volume Ratio Calculator — The ratio falls as 1/size — the geometric reason cells divide." title="Cell Surface Area to Volume Ratio Calculator"><figcaption>The ratio falls as 1/size — the geometric reason cells divide.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>r</code></td><td>radius</td><td>µm</td></tr><tr><td><code>s</code></td><td>side length</td><td>µm</td></tr><tr><td><code>A/V</code></td><td>surface area to volume ratio</td><td>per µm</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Cell Surface Area to Volume Ratio?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: shape set to <strong>1.0</strong>, size (diameter or length) of <strong>2</strong> µm, surface flux of <strong>1</strong> µmol/m²/s.</p>
            <p>Substituting them into the formula gives surface area of <strong>12.57</strong> µm², volume of <strong>4.19</strong> µm³, surface area to volume of <strong>3</strong> per µm, total uptake capacity of <strong>12.57</strong> µmol/s.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>6 per µm</td><td><strong>1 µm sphere</strong></td><td>enormous exchange capacity</td></tr><tr><td>3 per µm</td><td><strong>2 µm sphere</strong></td><td>typical bacterium</td></tr><tr><td>0.6 per µm</td><td><strong>10 µm sphere</strong></td><td>typical eukaryotic cell</td></tr><tr><td>below 0.2 per µm</td><td><strong>Very large</strong></td><td>diffusion alone cannot feed the cell</td></tr></tbody></table>
            <ul><li><p>For a sphere the ratio is exactly 3/r, so a cell that doubles its diameter halves its exchange capacity per unit volume — the reason growth triggers division.</p></li><li><p>Rod shapes keep a higher ratio than spheres at the same volume, which is one explanation for the success of bacilli in nutrient-poor environments.</p></li><li><p>Above roughly 1 mm, diffusion cannot supply oxygen to the centre; that is when organisms need a circulatory system.</p></li><li><p>Real cells are not smooth spheres: microvilli and cristae raise the effective area several-fold, and this calculation is the lower bound.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Using the diameter where the formula needs the radius.</li><li>Comparing a rod's ratio with a sphere's at the same 'size' — the two are different lengths.</li><li>Forgetting that units matter: a ratio in per micrometre is a thousand times one in per millimetre.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why do cells stay small?', 'a' => 'Because the surface to volume ratio falls as size rises, and beyond a point the membrane cannot import nutrients or export waste fast enough.'],
            ['q' => 'What is the A/V ratio of a 2 µm coccus?', 'a' => '3/(1 µm) = 3 µm⁻¹.'],
            ['q' => 'What does the Cell Surface Area to Volume Ratio actually calculate?', 'a' => <<<'TXT'
            It returns surface area, volume, surface area to volume and total uptake capacity. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
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

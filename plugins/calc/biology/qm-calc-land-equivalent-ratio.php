<?php

/**
 * Land Equivalent Ratio Calculator
 * /biology/land-equivalent-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Land Equivalent Ratio Calculator',
    'meta' => ['title' => 'Land Equivalent Ratio Calculator — Formula & Results', 'description' => 'Enter Crop 1 yield, intercropped, Crop 1 yield, sole crop and Crop 2 yield, intercropped into Land Equivalent Ratio and the answer comes back as Land…', 'h1' => 'Land Equivalent Ratio Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'y1i',
                            'label' => 'Crop 1 yield, intercropped',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3200',
                        ],
                        [
                            'name' => 'y1s',
                            'label' => 'Crop 1 yield, sole crop',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5000',
                        ],
                        [
                            'name' => 'y2i',
                            'label' => 'Crop 2 yield, intercropped',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1800',
                        ],
                        [
                            'name' => 'y2s',
                            'label' => 'Crop 2 yield, sole crop',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2500',
                        ],
                        [
                            'name' => 'ler',
                            'label' => 'Land equivalent ratio',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'partial1',
                            'label' => 'Crop 1 partial ratio',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'partial2',
                            'label' => 'Crop 2 partial ratio',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'advantage',
                            'label' => 'Land saved',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'The share of land the mixture saves',
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
            'title' => 'LER',
            'results' => ['partial1' => 'y1i/y1s', 'partial2' => 'y2i/y2s', 'ler' => 'y1i/y1s+y2i/y2s', 'advantage' => '(y1i/y1s+y2i/y2s-1)*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Crop 1 yield, intercropped, Crop 1 yield, sole crop and Crop 2 yield, intercropped into Land Equivalent Ratio and the answer comes back as Land equivalent ratio and Crop 1 partial ratio. There is no hidden constant here: change Land equivalent ratio and Crop 1 yield, intercropped moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Land Equivalent Ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Land Equivalent Ratio: it takes 4 numbers and reports Land equivalent ratio, Crop 1 partial ratio and Crop 2 partial ratio.</p><p>The relationship it solves reads Crop 1 partial ratio = Crop 1 yield, intercropped ÷ Crop 1 yield, sole crop.</p><p>The result panel carries Land equivalent ratio, Crop 1 partial ratio, Crop 2 partial ratio and Land saved, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Crop 1 yield, intercropped</strong> — in kg/ha</li><li><strong>Crop 1 yield, sole crop</strong> — in kg/ha</li><li><strong>Crop 2 yield, intercropped</strong> — in kg/ha</li><li><strong>Crop 2 yield, sole crop</strong> — in kg/ha</li></ul><p>The result boxes are Land equivalent ratio, Crop 1 partial ratio, Crop 2 partial ratio, Land saved in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Crop 1 yield, intercropped = 3200 kg/ha, Crop 1 yield, sole crop = 5000 kg/ha, Crop 2 yield, intercropped = 1800 kg/ha and Crop 2 yield, sole crop = 2500 kg/ha — through the same formula and the panel reports &lt;strong&gt;Crop 1 partial ratio&lt;/strong&gt; = 0.64, &lt;strong&gt;Crop 2 partial ratio&lt;/strong&gt; = 0.72, &lt;strong&gt;Land equivalent ratio&lt;/strong&gt; = 1.36 and &lt;strong&gt;Land saved&lt;/strong&gt; = 36 %.</p><ul><li><strong>Crop 1 partial ratio</strong> = 0.64</li><li><strong>Crop 2 partial ratio</strong> = 0.72</li><li><strong>Land equivalent ratio</strong> = 1.36</li><li><strong>Land saved</strong> = 36 %</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Crop 1 partial ratio</strong> = <code>Crop 1 yield, intercropped ÷ Crop 1 yield, sole crop</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Crop 1 partial ratio&lt;/strong&gt; = 0.64, &lt;strong&gt;Crop 2 partial ratio&lt;/strong&gt; = 0.72, &lt;strong&gt;Land equivalent ratio&lt;/strong&gt; = 1.36 and &lt;strong&gt;Land saved&lt;/strong&gt; = 36. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Land equivalent ratio is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Crop 1 partial ratio</strong> = <code>Crop 1 yield, intercropped ÷ Crop 1 yield, sole crop</code></li><li><strong>Crop 2 partial ratio</strong> = <code>Crop 2 yield, intercropped ÷ Crop 2 yield, sole crop</code></li><li><strong>Land equivalent ratio</strong> = <code>Crop 1 yield, intercropped ÷ Crop 1 yield, sole crop + Crop 2 yield, intercropped ÷ Crop 2 yield, sole crop</code></li><li><strong>Land saved</strong> = <code>(Crop 1 yield, intercropped ÷ Crop 1 yield, sole crop + Crop 2 yield, intercropped ÷ Crop 2 yield, sole crop − 1) × 100</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Crop 1 partial ratio, Crop 2 partial ratio and Land equivalent ratio can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Crop 1 yield, intercropped from 3200 to 6400, leaving every other box alone. The panel moves from &lt;strong&gt;Crop 1 partial ratio&lt;/strong&gt; 0.64, &lt;strong&gt;Crop 2 partial ratio&lt;/strong&gt; 0.72, &lt;strong&gt;Land equivalent ratio&lt;/strong&gt; 1.36 and &lt;strong&gt;Land saved&lt;/strong&gt; 36 % to &lt;strong&gt;Crop 1 partial ratio&lt;/strong&gt; 1.28, &lt;strong&gt;Crop 2 partial ratio&lt;/strong&gt; 0.72, &lt;strong&gt;Land equivalent ratio&lt;/strong&gt; 2 and &lt;strong&gt;Land saved&lt;/strong&gt; 100 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Land equivalent ratio, Crop 1 partial ratio and Crop 2 partial ratio are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Crop 1 yield, intercropped to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Crop 1 yield, intercropped, Crop 1 yield, sole crop and Crop 2 yield, intercropped is what you already know and Land equivalent ratio and Crop 1 partial ratio is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/photosynthesis-rate">Photosynthesis Rate Calculator</a>, <a href="/biology/pig-weight">Pig Weight Calculator</a> and <a href="/biology/pine-straw">Pine straw</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Land Equivalent Ratio calculator work out?', 'a' => <<<'TXT'
            Land equivalent ratio, Crop 1 partial ratio, Crop 2 partial ratio and Land saved, from Crop 1 yield, intercropped and Crop 1 yield, sole crop. The relationship is Crop 1 partial ratio = Crop 1 yield, intercropped ÷ Crop 1 yield, sole crop.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Crop 1 yield, intercropped (kg/ha), Crop 1 yield, sole crop (kg/ha), Crop 2 yield, intercropped (kg/ha), Crop 2 yield, sole crop (kg/ha). Fill y1i, y1s and y2i and leave Land equivalent ratio empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Crop 1 partial ratio, Crop 2 partial ratio, Land equivalent ratio and Land saved can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Crop 1 partial ratio = 0.64, Crop 2 partial ratio = 0.72, Land equivalent ratio = 1.36 and Land saved = 36 %. The figures come from Crop 1 yield, intercropped as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Land equivalent ratio is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Crop 1 yield, intercropped left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Land equivalent ratio at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/photosynthesis-rate', 'name' => 'Photosynthesis Rate Calculator'],
            ['path' => '/biology/pig-weight', 'name' => 'Pig Weight Calculator'],
            ['path' => '/biology/pine-straw', 'name' => 'Pine straw'],
        ],
        'authors' => [],
    ],
];

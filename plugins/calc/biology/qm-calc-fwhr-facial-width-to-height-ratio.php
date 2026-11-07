<?php

/**
 * FWHR (Facial Width-to-Height Ratio) Calculator
 * /biology/fwhr-facial-width-to-height-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'FWHR (Facial Width-to-Height Ratio) Calculator',
    'meta' => ['title' => 'FWHR (Facial Width-to-Height Ratio) Calculator', 'description' => 'Facial width-to-height ratio compares the distance between the cheekbones with the height of the upper face, from the brow to the upper lip.', 'h1' => 'FWHR (Facial Width-to-Height Ratio) Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'width',
                            'label' => 'Bizygomatic width',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'Widest point of the face, cheekbone to cheekbone',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '138',
                        ],
                        [
                            'name' => 'height',
                            'label' => 'Upper face height',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'Brow (nasion) to the upper lip (prosthion)',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '98',
                        ],
                        [
                            'name' => 'fwhr',
                            'label' => 'Facial width-to-height ratio',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fwhr_100',
                            'label' => 'FWHR scaled ×100',
                            'type' => 'number',
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
            'title' => 'FWHR',
            'results' => ['fwhr' => 'width/height', 'fwhr_100' => 'width/height*100', 'width' => 'fwhr*height', 'height' => 'width/fwhr'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Facial width-to-height ratio compares the distance between the cheekbones with the height of the upper face, from the brow to the upper lip. It returns facial width-to-height ratio, FWHR scaled ×100, bizygomatic width and upper face height, and the panel shows all of them at once.
        
        It is used in studies of perceived dominance, in behavioural endocrinology and in facial anthropometry, and it is simply the width divided by the height.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the FWHR (Facial Width-to-Height Ratio)', 'html' => <<<'TXT'
            <p>FWHR = bizygomatic width ÷ upper face height</p>
            <figure class="calc-figure"><img src="/uploads/biology/fwhr-facial-width-to-height-ratio.svg" width="720" height="300" loading="lazy" alt="Animated diagram: FWHR (Facial Width-to-Height Ratio) Calculator — FWHR on the usual range, with the average band shaded between 1.7 and 1.9." title="FWHR (Facial Width-to-Height Ratio) Calculator"><figcaption>FWHR on the usual range, with the average band shaded between 1.7 and 1.9.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>width</code></td><td>distance between the left and right zygion</td><td>mm</td></tr><tr><td><code>height</code></td><td>nasion to prosthion, the brow to the upper lip</td><td>mm</td></tr><tr><td><code>fwhr</code></td><td>width divided by height, typically 1.5 to 2.2</td><td>—</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> The width-over-upper-face-height definition follows Carré, McCormick & Mondloch (2009), the paper that established the measure in behavioural studies.</p>
            TXT],
            ['title' => 'How do I use the FWHR (Facial Width-to-Height Ratio)?', 'html' => <<<'TXT'
            <ol><li>Take a frontal photograph with the head level and a neutral expression.</li><li>Measure cheekbone to cheekbone across the widest point.</li><li>Measure from the brow ridge to the point where the upper and lower lips meet, not to the chin — including the chin is the usual way to get a value that cannot be compared with published figures.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Substituting them into the formula gives facial width-to-height ratio of <strong>1.41</strong>, fwhr scaled ×100 of <strong>140.82</strong>, bizygomatic width of <strong>138</strong> mm, upper face height of <strong>98</strong> mm.</p>
            <p>138 mm of width over 98 mm of upper face gives 1.41 by the strict measure — a value below the published average because the height here spans brow to lip only.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 1.70</td><td><strong>Narrow</strong></td><td>longer, narrower face</td></tr><tr><td>1.70 – 1.89</td><td><strong>Average</strong></td><td>where most adult faces sit</td></tr><tr><td>1.90 and above</td><td><strong>Wide</strong></td><td>broader face relative to its upper height</td></tr></tbody></table>
            <ul><li><p>Published FWHR values cluster around 1.8–1.9 for men and 1.7–1.8 for women, with wide overlap between the sexes.</p></li><li><p>Measurement method matters more than anatomy: studies that include the chin report values about 0.3 lower than studies that stop at the lip.</p></li><li><p>The ratio changes with camera distance and head tilt, so it is only comparable between images taken the same way.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Including the chin in the height measurement.</li><li>Using a tilted or smiling photograph — both change the apparent height substantially.</li><li>Comparing a value measured from a 50 mm portrait lens with one from a phone selfie; perspective distortion alone moves FWHR by 0.1 or more.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Does a high FWHR mean anything about personality?', 'a' => <<<'TXT'
            Studies report small statistical associations with perceived dominance, but the effect is weak and contested, and it says nothing about an individual. Treat the number as a measurement, not a personality test.
            TXT],
            ['q' => 'Should I measure to the lip or to the chin?', 'a' => 'To the upper lip for anything you want to compare with the literature. Chin-included variants exist but are not comparable with those figures.'],
            ['q' => 'What does the FWHR (Facial Width-to-Height Ratio) actually calculate?', 'a' => <<<'TXT'
            It returns facial width-to-height ratio, FWHR scaled ×100, bizygomatic width and upper face height. Each one is derived by the formula on this page, so you can check any figure by hand.
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

<?php

/**
 * Cephalic Index Calculator
 * /biology/cephalic-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cephalic Index Calculator',
    'meta' => ['title' => 'Cephalic Index Calculator — Formula & Results', 'description' => 'The cephalic index is the width of the head expressed as a percentage of its length, the standard measure used to describe head shape in anthropology…', 'h1' => 'Cephalic Index Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Head width (biparietal)',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'Widest transverse diameter of the head',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '150',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Head length (fronto-occipital)',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'Glabella to the most posterior point',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '190',
                        ],
                        [
                            'name' => 'index',
                            'label' => 'Cephalic index',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Width to length ratio',
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
            'title' => 'Cephalic index',
            'results' => ['index' => 'width/length*100', 'ratio' => 'width/length', 'width' => 'index*length/100', 'length' => 'width/index*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The cephalic index is the width of the head expressed as a percentage of its length, the standard measure used to describe head shape in anthropology, paediatrics and ergonomics. It returns cephalic index, width to length ratio, head width (biparietal) and head length (fronto-occipital), and the panel shows all of them at once.
        
        Enter the two diameters and it returns the index together with the shape category the value falls into.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Cephalic Index', 'html' => <<<'TXT'
            <p>Cephalic index = (head width ÷ head length) × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/cephalic-index.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Cephalic Index Calculator — The index plotted on the conventional shape scale." title="Cephalic Index Calculator"><figcaption>The index plotted on the conventional shape scale.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>width</code></td><td>maximum transverse diameter</td><td>mm</td></tr><tr><td><code>length</code></td><td>maximum anteroposterior diameter</td><td>mm</td></tr><tr><td><code>index</code></td><td>width as a percentage of length</td><td>%</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> Boundaries follow the conventional anthropometric classification (Retzius, 1842; modern cut-offs in Martin & Saller).</p>
            TXT],
            ['title' => 'How do I use the Cephalic Index?', 'html' => <<<'TXT'
            <ol><li>Measure head width across the widest part of the skull, above the ears.</li><li>Measure head length from the brow ridge to the furthest point at the back.</li><li>Enter both in the same unit — the index is dimensionless, so millimetres or centimetres both work, but never one of each.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Substituting them into the formula gives cephalic index of <strong>78.95</strong>%, width to length ratio of <strong>0.7895</strong>, head width (biparietal) of <strong>150</strong> mm, head length (fronto-occipital) of <strong>190</strong> mm.</p>
            <p>A head 150 mm wide and 190 mm long gives 78.9 — mesocephalic, the middle of the usual adult range.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 75</td><td><strong>Dolichocephalic</strong></td><td>long and narrow head</td></tr><tr><td>75 – 79.9</td><td><strong>Mesocephalic</strong></td><td>average, the usual human range</td></tr><tr><td>80 – 84.9</td><td><strong>Brachycephalic</strong></td><td>short and broad head</td></tr><tr><td>85 and above</td><td><strong>Hyperbrachycephalic</strong></td><td>markedly broad head</td></tr></tbody></table>
            <ul><li><p>The index describes shape, not size, and it is normal for it to differ between populations and between men and women within the same population.</p></li><li><p>In infants the index is naturally higher, because the skull is still broad relative to its length; adult bands do not apply before about two years of age.</p></li><li><p>Ergonomics uses the same number to size helmets and headphones, where the length matters more than the index itself.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Mixing units: 150 mm of width with 19 cm of length gives an index ten times too small.</li><li>Using head circumference as the width or the length. Circumference is a different measure and cannot be substituted into this ratio.</li><li>Treating a high index as a diagnosis. Brachycephaly is a shape, and only a clinician can say whether a particular skull shape is a medical finding.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Is the cephalic index the same as the cranial index?', 'a' => <<<'TXT'
            Yes in everyday use. Strictly, the cranial index is measured on the skull and the cephalic index on the living head, which is a few millimetres wider because of soft tissue.
            TXT],
            ['q' => 'What is a normal cephalic index?', 'a' => 'Between about 75 and 85 for adults of most populations. Values outside that range are common in some regions and are not by themselves abnormal.'],
            ['q' => 'What does the Cephalic Index actually calculate?', 'a' => <<<'TXT'
            It returns cephalic index, width to length ratio, head width (biparietal) and head length (fronto-occipital). Each one is derived by the formula on this page, so you can check any figure by hand.
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

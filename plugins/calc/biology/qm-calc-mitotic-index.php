<?php

/**
 * Mitotic Index Calculator
 * /biology/mitotic-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mitotic Index Calculator',
    'meta' => ['title' => 'Mitotic Index Calculator — Formula & Results', 'description' => 'The mitotic index is the percentage of cells caught in mitosis on a slide, the classic measure of proliferation in plant roots, tumour tissue and any treated…', 'h1' => 'Mitotic Index Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'total',
                            'label' => 'Total cells counted',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1200',
                        ],
                        [
                            'name' => 'mitotic',
                            'label' => 'Cells in mitosis',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'help' => 'Prophase to telophase',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '96',
                        ],
                        [
                            'name' => 'prophase',
                            'label' => 'Prophase',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'help' => 'Optional phase breakdown',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'metaphase',
                            'label' => 'Metaphase',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '28',
                        ],
                        [
                            'name' => 'anaphase',
                            'label' => 'Anaphase',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '18',
                        ],
                        [
                            'name' => 'telophase',
                            'label' => 'Telophase',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'index',
                            'label' => 'Mitotic index',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_1000',
                            'label' => 'Mitotic cells per 1000',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'phase_check',
                            'label' => 'Phases add up to',
                            'type' => 'number',
                            'suffix' => 'cells',
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
            'title' => 'Index',
            'results' => ['index' => 'mitotic/total*100', 'per_1000' => 'mitotic/total*1000', 'phase_check' => 'prophase+metaphase+anaphase+telophase'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The mitotic index is the percentage of cells caught in mitosis on a slide, the classic measure of proliferation in plant roots, tumour tissue and any treated culture. It returns mitotic index, mitotic cells per 1000 and phases add up to, and the panel shows all of them at once.
        
        This calculator returns the index, the phase breakdown and the total counted.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Mitotic Index', 'html' => <<<'TXT'
            <p>Mitotic index (%) = mitotic cells ÷ total cells × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/mitotic-index.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Mitotic Index Calculator — Mitotic phases as a share of the cells counted." title="Mitotic Index Calculator"><figcaption>Mitotic phases as a share of the cells counted.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>mitotic</code></td><td>cells showing condensed chromosomes</td><td>cells</td></tr><tr><td><code>total</code></td><td>all cells counted in the field</td><td>cells</td></tr><tr><td><code>index</code></td><td>share of cells in mitosis</td><td>%</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Mitotic Index?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: total cells counted of <strong>1,200</strong> cells, cells in mitosis of <strong>96</strong> cells, prophase of <strong>40</strong> cells, metaphase of <strong>28</strong> cells, anaphase of <strong>18</strong> cells, telophase of <strong>10</strong> cells.</p>
            <p>Substituting them into the formula gives mitotic index of <strong>8</strong>%, mitotic cells per 1000 of <strong>80</strong>, phases add up to of <strong>96</strong> cells.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0 – 2%</td><td><strong>Low</strong></td><td>quiescent tissue or an inhibited treatment</td></tr><tr><td>2 – 6%</td><td><strong>Normal</strong></td><td>typical of healthy root meristems</td></tr><tr><td>above 6%</td><td><strong>High</strong></td><td>rapidly dividing tissue, or a block in mitosis</td></tr></tbody></table>
            <ul><li><p>The index depends on how long mitosis lasts as well as on how often it starts: a drug that arrests cells in metaphase raises the index without raising proliferation.</p></li><li><p>Count at least 1000 cells, ideally from several fields, and score blind to the treatment.</p></li><li><p>Colchicine or similar spindle poisons are used to accumulate metaphases; say whether you used one.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Counting only fields with obvious mitoses, which inflates the index.</li><li>Confusing apoptotic bodies with mitotic figures.</li><li>Counting cells that overlap, which makes the denominator unreliable.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a normal mitotic index?', 'a' => 'About 2–6% in plant root tips and lower in most adult animal tissues.'],
            ['q' => 'Why is my mitotic index so high after treatment?', 'a' => 'Spindle poisons and DNA damage can arrest cells in mitosis, so the index rises even as proliferation falls.'],
            ['q' => 'What does the Mitotic Index actually calculate?', 'a' => 'It returns mitotic index, mitotic cells per 1000 and phases add up to. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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

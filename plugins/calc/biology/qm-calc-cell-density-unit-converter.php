<?php

/**
 * Cell Density Unit Converter
 * /biology/cell-density-unit-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell Density Unit Converter',
    'meta' => ['title' => 'Cell Density Unit Converter — Formula & Results', 'description' => 'Cell counts get written as cells/mL, cells/µL, ×10⁶/mL or ×10⁵/mL depending on the lab, and a factor of a thousand between them is easy to lose.', 'h1' => 'Cell Density Unit Converter', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'value',
                            'label' => 'Cell concentration',
                            'type' => 'number',
                            'suffix' => '×10⁶/mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.5',
                        ],
                        [
                            'name' => 'per_ml',
                            'label' => 'Cells per mL',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_ul',
                            'label' => 'Cells per µL',
                            'type' => 'number',
                            'suffix' => 'cells/µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'million',
                            'label' => 'Millions per mL',
                            'type' => 'number',
                            'suffix' => '×10⁶/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_l',
                            'label' => 'Cells per litre',
                            'type' => 'number',
                            'suffix' => 'cells/L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'log_value',
                            'label' => 'log₁₀(cells/mL)',
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
            'title' => 'Conversion',
            'results' => [
                'per_ml' => 'value*1000000',
                'per_ul' => 'value*1000',
                'million' => 'value',
                'per_l' => 'value*1000000000',
                'log_value' => 'log10(value*1000000)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cell counts get written as cells/mL, cells/µL, ×10⁶/mL or ×10⁵/mL depending on the lab, and a factor of a thousand between them is easy to lose. It returns cells per mL, cells per µL, millions per mL and cells per litre, and the panel shows all of them at once.
        
        This converter moves between all of them, and to and from a haemocytometer count.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Cell Density Unit Converter', 'html' => <<<'TXT'
            <p>1 ×10⁶ cells/mL = 1 000 000 cells/mL = 1 000 cells/µL</p>
            <figure class="calc-figure"><img src="/uploads/biology/cell-density-unit-converter.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Cell Density Unit Converter — One concentration, every unit." title="Cell Density Unit Converter"><figcaption>One concentration, every unit.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>cells/mL</code></td><td>the base unit</td><td>cells/mL</td></tr><tr><td><code>cells/µL</code></td><td>a thousandth of cells/mL</td><td>cells/µL</td></tr><tr><td><code>×10⁶/mL</code></td><td>millions per mL</td><td>10⁶ cells/mL</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Cell Density Unit Converter?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: cell concentration of <strong>1.5</strong> ×10⁶/mL.</p>
            <p>Substituting them into the formula gives cells per ml of <strong>1,500,000</strong> cells/mL, cells per µl of <strong>1,500</strong> cells/µL, millions per ml of <strong>1.5</strong> ×10⁶/mL, cells per litre of <strong>1,500,000,000</strong> cells/L, log₁₀(cells/ml) of <strong>6.18</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>A log₁₀ value is how cell densities are plotted in growth curves, because it turns exponential growth into a straight line.</p></li><li><p>The ×10⁶/mL convention is common in haematology and in cell culture; the underlying unit is still cells per millilitre.</p></li><li><p>Mixing cells/µL and cells/mL between a count and a protocol is the most common unit error in the lab.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Reading 1.5 as 1.5 × 10⁵ rather than 1.5 × 10⁶.</li><li>Converting a bacterial count (10⁸ scale) with the same factor as a mammalian one (10⁶ scale).</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many cells/µL is 1 × 10⁶ cells/mL?', 'a' => 'Exactly 1 000 cells/µL.'],
            ['q' => 'What does the Cell Density Unit Converter actually calculate?', 'a' => <<<'TXT'
            It returns cells per mL, cells per µL, millions per mL and cells per litre. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
            ['q' => 'Does it work in both directions?', 'a' => <<<'TXT'
            Where the maths allows it, yes: the page states which values it solves for and which you supply. A field marked as a result is always computed, never typed into.
            TXT],
        ],
        'related' => [],
    ],
];

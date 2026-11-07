<?php

/**
 * CFU/g Calculator
 * /biology/cfu-g-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'CFU/g Calculator',
    'meta' => ['title' => 'CFU/g Calculator — Formula, Steps & Examples', 'description' => 'Food, soil and tissue microbiology counts per gram, not per millilitre, and getting from a plate count to CFU/g needs the dilution and the wet weight.', 'h1' => 'CFU/g Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'colonies',
                            'label' => 'Colonies counted',
                            'type' => 'number',
                            'suffix' => 'CFU',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '126',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Volume plated',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.1',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Dilution factor',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '10⁴ for a 1 g in 9 mL then 10⁻³ series',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10000',
                        ],
                        [
                            'name' => 'weight',
                            'label' => 'Sample weight',
                            'type' => 'number',
                            'suffix' => 'g',
                            'help' => 'Weight that went into the first dilution',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'cfu_g',
                            'label' => 'CFU per gram',
                            'type' => 'number',
                            'suffix' => 'CFU/g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cfu_log',
                            'label' => 'log₁₀(CFU/g)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_kg',
                            'label' => 'CFU per kg',
                            'type' => 'number',
                            'suffix' => 'CFU/kg',
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
            'title' => 'Count',
            'results' => ['cfu_g' => 'colonies/volume*dilution/weight', 'cfu_log' => 'log10(colonies/volume*dilution/weight)', 'per_kg' => 'colonies/volume*dilution/weight*1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Food, soil and tissue microbiology counts per gram, not per millilitre, and getting from a plate count to CFU/g needs the dilution and the wet weight. It returns CFU per gram, log₁₀(CFU/g) and CFU per kg, and the panel shows all of them at once.
        
        This calculator does it, and converts to log CFU/g, the scale used in food safety limits.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the CFU/g', 'html' => <<<'TXT'
            <p>CFU/g = colonies ÷ volume plated × dilution factor ÷ sample weight</p>
            <figure class="calc-figure"><img src="/uploads/biology/cfu-g-calculator.svg" width="720" height="300" loading="lazy" alt="Animated diagram: CFU/g Calculator — Plate count, dilution and sample weight give CFU/g." title="CFU/g Calculator"><figcaption>Plate count, dilution and sample weight give CFU/g.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>colonies</code></td><td>colonies on the countable plate</td><td>CFU</td></tr><tr><td><code>volume</code></td><td>volume plated</td><td>mL</td></tr><tr><td><code>dilution</code></td><td>total dilution</td><td>×</td></tr><tr><td><code>weight</code></td><td>mass of sample in the first dilution</td><td>g</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the CFU/g?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: colonies counted of <strong>126</strong> CFU, volume plated of <strong>0.1</strong> mL, dilution factor of <strong>10,000</strong> ×, sample weight of <strong>1</strong> g.</p>
            <p>Substituting them into the formula gives cfu per gram of <strong>12,600,000</strong> CFU/g, log₁₀(cfu/g) of <strong>7.1</strong>, cfu per kg of <strong>12,600,000,000</strong> CFU/kg.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 4 log CFU/g</td><td><strong>Low</strong></td><td>below most spoilage thresholds</td></tr><tr><td>4 – 6 log</td><td><strong>Moderate</strong></td><td>typical of raw foods</td></tr><tr><td>above 6 log</td><td><strong>High</strong></td><td>spoilage or a process failure</td></tr></tbody></table>
            <ul><li><p>Log CFU/g is the industry language: 6 log CFU/g is a million per gram.</p></li><li><p>If the sample was frozen or dried, report whether the weight was taken before or after.</p></li><li><p>Homogenisation must be included in the first dilution volume, not after it.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Dividing by the weight twice.</li><li>Treating a 25 g sample in 225 mL as a dilution factor of 225 instead of 10.</li><li>Reporting CFU/mL from a solid sample without stating the weight used.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I convert CFU/g to log CFU/g?', 'a' => 'Take the base-10 logarithm: 1 × 10⁶ CFU/g is 6 log CFU/g.'],
            ['q' => 'Does this work for swabs?', 'a' => 'Use CFU per swab or per cm² instead; a swab has no meaningful gram weight.'],
            ['q' => 'What does the CFU/g actually calculate?', 'a' => 'It returns CFU per gram, log₁₀(CFU/g) and CFU per kg. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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

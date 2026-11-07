<?php

/**
 * OD600 to Cell Density Calculator
 * /biology/od600-to-cell-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'OD600 to Cell Density Calculator',
    'meta' => ['title' => 'OD600 to Cell Density Calculator — Formula & Results', 'description' => 'OD600 is the fastest way to follow a bacterial culture, but it is an optical reading, not a cell count. It returns corrected OD600, cell density and dry cell…', 'h1' => 'OD600 to Cell Density Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'od',
                            'label' => 'OD600 reading',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.45',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Dilution before reading',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '10 if you diluted 1:10',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'factor',
                            'label' => 'Cells/mL per OD unit',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'help' => '8×10⁸ for E. coli, 3×10⁷ for yeast',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '800000000',
                        ],
                        [
                            'name' => 'dcw_factor',
                            'label' => 'Dry cell weight per OD unit',
                            'type' => 'number',
                            'suffix' => 'g/L',
                            'help' => 'About 0.4–0.5 g/L per OD for E. coli',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.4',
                        ],
                        [
                            'name' => 'cells',
                            'label' => 'Cell density',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dcw',
                            'label' => 'Dry cell weight',
                            'type' => 'number',
                            'suffix' => 'g/L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'od_corrected',
                            'label' => 'Corrected OD600',
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
            'results' => ['od_corrected' => 'od*dilution', 'cells' => 'od*dilution*factor', 'dcw' => 'od*dilution*dcw_factor'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        OD600 is the fastest way to follow a bacterial culture, but it is an optical reading, not a cell count. It returns corrected OD600, cell density and dry cell weight, and the panel shows all of them at once.
        
        This calculator converts absorbance to cells/mL and to dry cell weight using the standard factors, with a dilution correction for readings above 1.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the OD600 to Cell Density', 'html' => <<<'TXT'
            <p>Cells/mL = OD600 × dilution × (cells/mL per OD unit)</p>
            <figure class="calc-figure"><img src="/uploads/biology/od600-to-cell-density.svg" width="720" height="300" loading="lazy" alt="Animated diagram: OD600 to Cell Density Calculator — Absorbance times dilution times the calibration factor." title="OD600 to Cell Density Calculator"><figcaption>Absorbance times dilution times the calibration factor.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>OD600</code></td><td>absorbance at 600 nm against a medium blank</td><td>AU</td></tr><tr><td><code>dilution</code></td><td>how much the sample was diluted before reading</td><td>×</td></tr><tr><td><code>factor</code></td><td>strain-specific conversion</td><td>cells/mL per OD</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the OD600 to Cell Density?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: od600 reading of <strong>0.45</strong>, dilution before reading of <strong>1</strong> ×, cells/ml per od unit of <strong>800,000,000</strong> cells/mL, dry cell weight per od unit of <strong>0.4</strong> g/L.</p>
            <p>Substituting them into the formula gives corrected od600 of <strong>0.45</strong>, cell density of <strong>360,000,000</strong> cells/mL, dry cell weight of <strong>0.18</strong> g/L.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0.1 – 1.0</td><td><strong>Linear</strong></td><td>the reliable range of the spectrophotometer</td></tr><tr><td>1.0 – 1.5</td><td><strong>Edge</strong></td><td>dilute to be safe</td></tr><tr><td>above 1.5</td><td><strong>Non-linear</strong></td><td>always dilute and correct</td></tr></tbody></table>
            <ul><li><p>The factor depends on the strain, the medium and the instrument (path length). Calibrate it once against a haemocytometer count or a plate count for your own system.</p></li><li><p>The relationship is only linear up to about 1.0; above that, dilution is mandatory rather than optional.</p></li><li><p>OD600 counts dead cells as well as live ones, so it is a biomass measure, not a viability one.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Reading against water rather than against fresh medium.</li><li>Forgetting to multiply by the dilution factor after diluting.</li><li>Using a cuvette with a different path length without correcting.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many cells is OD600 = 1?', 'a' => 'About 8 × 10⁸ E. coli per mL, though this varies two-fold between strains and media.'],
            ['q' => 'Can I use OD600 to measure growth rate?', 'a' => 'Yes — in the linear range, ln(OD) against time gives the growth rate, which is what the growth curve calculator does.'],
            ['q' => 'What does the OD600 to Cell Density actually calculate?', 'a' => 'It returns corrected OD600, cell density and dry cell weight. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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

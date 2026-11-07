<?php

/**
 * Field Capacity Calculator
 * /biology/field-capacity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Field Capacity Calculator',
    'meta' => ['title' => 'Field Capacity Calculator — Formula & Results', 'description' => 'Field capacity is the water a soil retains after excess has drained away — the upper limit of what a root zone can store. It returns field capacity…', 'h1' => 'Field Capacity Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'wet',
                            'label' => 'Wet soil mass',
                            'type' => 'number',
                            'suffix' => 'g',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '620',
                        ],
                        [
                            'name' => 'dry',
                            'label' => 'Oven-dry soil mass',
                            'type' => 'number',
                            'suffix' => 'g',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Core volume',
                            'type' => 'number',
                            'suffix' => 'cm³',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '300',
                        ],
                        [
                            'name' => 'fc',
                            'label' => 'Field capacity (gravimetric)',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'vol',
                            'label' => 'Field capacity (volumetric)',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bulk',
                            'label' => 'Bulk density',
                            'type' => 'number',
                            'suffix' => 'g/cm³',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'water',
                            'label' => 'Water stored in the root zone',
                            'type' => 'number',
                            'suffix' => 'mm',
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
            'title' => 'Soil water',
            'results' => ['fc' => '(wet-dry)/dry*100', 'vol' => '(wet-dry)/volume*100', 'bulk' => 'dry/volume', 'water' => '(wet-dry)/volume*100*600/100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Field capacity is the water a soil retains after excess has drained away — the upper limit of what a root zone can store. It returns field capacity (gravimetric), field capacity (volumetric), bulk density and water stored in the root zone, and the panel shows all of them at once.
        
        This calculator derives it from a wet and a dry sample weight, and reports the porosity and bulk density that go with it.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Field Capacity', 'html' => <<<'TXT'
            <p>Gravimetric FC = (wet − dry) ÷ dry × 100; volumetric = (wet − dry) ÷ volume × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/field-capacity.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Field Capacity Calculator — Wet mass, dry mass and the water held between them." title="Field Capacity Calculator"><figcaption>Wet mass, dry mass and the water held between them.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>wet</code></td><td>mass at field capacity</td><td>g</td></tr><tr><td><code>dry</code></td><td>oven-dry mass at 105 °C</td><td>g</td></tr><tr><td><code>volume</code></td><td>volume of the undisturbed core</td><td>cm³</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Field Capacity?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: wet soil mass of <strong>620</strong> g, oven-dry soil mass of <strong>500</strong> g, core volume of <strong>300</strong> cm³.</p>
            <p>Substituting them into the formula gives field capacity (gravimetric) of <strong>24</strong>%, field capacity (volumetric) of <strong>40</strong>%, bulk density of <strong>1.67</strong> g/cm³, water stored in the root zone of <strong>240</strong> mm.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Oven-dry means 105 °C to constant mass; a domestic oven at 100 °C leaves a percent or two of water behind.</p></li><li><p>Volumetric water content is the version irrigation models use, because roots explore volume rather than mass.</p></li><li><p>Bulk density above about 1.6 g/cm³ in a loam signals compaction, which lowers both infiltration and rooting depth.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Drying at too low a temperature and treating the result as oven-dry.</li><li>Using a disturbed sample, which loses the pore structure that holds the water.</li><li>Reporting gravimetric values where a volumetric figure is expected.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is field capacity in mm?', 'a' => 'Volumetric water content × rooting depth in mm — 30% over 600 mm is 180 mm.'],
            ['q' => 'How long does drainage take?', 'a' => 'Two to three days in most soils after saturation.'],
            ['q' => 'What does the Field Capacity actually calculate?', 'a' => <<<'TXT'
            It returns field capacity (gravimetric), field capacity (volumetric), bulk density and water stored in the root zone. Each one is derived by the formula on this page, so you can check any figure by hand.
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

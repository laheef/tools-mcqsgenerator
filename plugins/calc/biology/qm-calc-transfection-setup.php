<?php

/**
 * Transfection Setup Calculator
 * /biology/transfection-setup
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Transfection Setup Calculator',
    'meta' => ['title' => 'Transfection Setup Calculator — Formula & Results', 'description' => 'Transfection protocols are written per well or per flask, and scaling them by hand is where experiments go wrong. It returns DNA per batch to make, reagent…', 'h1' => 'Transfection Setup Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'dna_ref',
                            'label' => 'DNA in the reference well',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                        [
                            'name' => 'reagent_ref',
                            'label' => 'Reagent in the reference well',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.5',
                        ],
                        [
                            'name' => 'diluent_ref',
                            'label' => 'Diluent per reference well',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'wells',
                            'label' => 'Wells (or vessels) needed',
                            'type' => 'number',
                            'help' => 'Add 10% for pipetting loss',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '24',
                        ],
                        [
                            'name' => 'dna_batch',
                            'label' => 'DNA per batch to make',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'reagent_batch',
                            'label' => 'Reagent for the batch',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'diluent_batch',
                            'label' => 'Diluent for the batch',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tube_total',
                            'label' => 'Total complex volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_well',
                            'label' => 'Volume of complex per well',
                            'type' => 'number',
                            'suffix' => 'µL',
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
            'title' => 'Setup',
            'results' => [
                'dna_batch' => 'dna_ref*wells*1.1',
                'reagent_batch' => 'reagent_ref*wells*1.1',
                'diluent_batch' => 'diluent_ref*wells*1.1',
                'tube_total' => '(reagent_ref+diluent_ref)*wells*1.1',
                'per_well' => '(reagent_ref+diluent_ref)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Transfection protocols are written per well or per flask, and scaling them by hand is where experiments go wrong. It returns DNA per batch to make, reagent for the batch, diluent for the batch and total complex volume, and the panel shows all of them at once.
        
        This calculator scales DNA, transfection reagent and diluent from your reference format to the plate you actually have, with the complex formation time.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Transfection Setup', 'html' => <<<'TXT'
            <p>Scale factor = wells × 1.1 for pipetting loss; every component is multiplied by that factor, and the complex is formed at the reference ratio</p>
            <figure class="calc-figure"><img src="/uploads/biology/transfection-setup.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Transfection Setup Calculator — Two dilutions, one mix, then straight onto the cells." title="Transfection Setup Calculator"><figcaption>Two dilutions, one mix, then straight onto the cells.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>DNA</code></td><td>plasmid per well</td><td>µg</td></tr><tr><td><code>reagent</code></td><td>lipid or polymer per well</td><td>µL</td></tr><tr><td><code>diluent</code></td><td>serum-free medium per well</td><td>µL</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Transfection Setup?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: dna in the reference well of <strong>0.5</strong> µg, reagent in the reference well of <strong>1.5</strong> µL, diluent per reference well of <strong>50</strong> µL, wells (or vessels) needed of <strong>24</strong>.</p>
            <p>Substituting them into the formula gives dna per batch to make of <strong>13.2</strong> µg, reagent for the batch of <strong>39.6</strong> µL, diluent for the batch of <strong>1,320</strong> µL, total complex volume of <strong>1,359.6</strong> µL, volume of complex per well of <strong>51.5</strong> µL.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1:2 – 1:3</td><td><strong>DNA to reagent</strong></td><td>typical for Lipofectamine-class reagents</td></tr><tr><td>15 – 30 min</td><td><strong>Complex formation</strong></td><td>room temperature, no serum, no antibiotics</td></tr><tr><td>4 – 6 h</td><td><strong>Exposure</strong></td><td>then change to complete medium for sensitive cells</td></tr></tbody></table>
            <ul><li><p>Make the DNA and the reagent dilutions in separate tubes before mixing; adding lipid straight onto DNA creates local excess and uneven complexes.</p></li><li><p>The 10% excess is not laziness: 24 wells need 25 wells' worth because no pipette delivers exactly what it draws.</p></li><li><p>Scale by surface area, not by well number, when moving between plate formats — a 6-well well holds ten times the area of a 96-well well.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Scaling a 24-well protocol to a 6-well plate by well count only.</li><li>Leaving complexes on the cells overnight, which is toxic for most primary cells.</li><li>Using medium with antibiotics during complex formation.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/cell-culture-vessel-reference">Cell culture vessel reference</a>. <a href="/biology/cell-seeding-density">Seeding density</a>. <a href="/biology/transformation-efficiency">Transformation efficiency</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much DNA for a 6-well transfection?', 'a' => 'About 1–2 µg per well for a 9.6 cm² surface, roughly double a 12-well well.'],
            ['q' => 'Can I scale this to a flask?', 'a' => 'Yes, but scale on growth area: a T-75 flask is about 8 times a 6-well well.'],
            ['q' => 'What does the Transfection Setup actually calculate?', 'a' => <<<'TXT'
            It returns DNA per batch to make, reagent for the batch, diluent for the batch and total complex volume. Each one is derived by the formula on this page, so you can check any figure by hand.
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

<?php

/**
 * Restriction Digest Recipe
 * /biology/restriction-reaction-setup
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Restriction Digest Recipe',
    'meta' => ['title' => 'Restriction Digest Recipe — Formula & Results', 'description' => <<<'TXT'
    Work out how much enzyme, buffer and water go into a digest. It returns DNA volume, enzyme units needed, enzyme volume and 10× buffer, and the panel shows all…
    TXT, 'h1' => 'Restriction Digest Recipe', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'dna_ug',
                            'label' => 'DNA to digest',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'dna_conc',
                            'label' => 'DNA concentration',
                            'type' => 'number',
                            'suffix' => 'ng/µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'volume_ul',
                            'label' => 'Reaction volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'units_per_ug',
                            'label' => 'Units per microgram',
                            'type' => 'number',
                            'suffix' => 'U/µg',
                            'help' => '5–10 U/µg is routine for a plasmid',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'enzyme_conc',
                            'label' => 'Enzyme stock',
                            'type' => 'number',
                            'suffix' => 'U/mL',
                            'help' => 'Most enzymes are supplied at 20 000 U/mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20000',
                        ],
                        [
                            'name' => 'dna_ul',
                            'label' => 'DNA volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'units',
                            'label' => 'Enzyme units needed',
                            'type' => 'number',
                            'suffix' => 'U',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'enzyme_ul',
                            'label' => 'Enzyme volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'help' => 'Must stay under 10% of the reaction',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'buffer_ul',
                            'label' => '10× buffer',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'help' => 'One tenth of the reaction',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'water_ul',
                            'label' => 'Water',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'help' => 'Makes up the rest',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'glycerol_pct',
                            'label' => 'Glycerol in the reaction',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Above 5% the enzyme starts to starve',
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
                'dna_ul' => 'dna_ug*1000/dna_conc',
                'units' => 'dna_ug*units_per_ug',
                'enzyme_ul' => 'units/(enzyme_conc/1000)',
                'buffer_ul' => 'volume_ul/10',
                'water_ul' => 'volume_ul-dna_ul-enzyme_ul-volume_ul/10',
                'glycerol_pct' => 'enzyme_ul/volume_ul*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Work out how much enzyme, buffer and water go into a digest. It returns DNA volume, enzyme units needed, enzyme volume and 10× buffer, and the panel shows all of them at once.
        
        The rule that matters is that the enzyme must never be more than a tenth of the reaction volume, because restriction enzymes are stored in glycerol and too much of it inhibits the digest.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Restriction Digest Recipe', 'html' => <<<'TXT'
            <p>DNA volume (µL) = µg × 1000 ÷ ng/µL. Units = µg × U/µg. Enzyme volume = units ÷ (U/mL ÷ 1000). Buffer = 1/10 of the reaction</p>
            <figure class="calc-figure"><img src="/uploads/biology/restriction-reaction-setup.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Restriction Digest Recipe — Glycerol carried in by the enzyme, by enzyme volume in a 20 µL digest" title="Restriction Digest Recipe"><figcaption>Glycerol carried in by the enzyme, by enzyme volume in a 20 µL digest</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>U</code></td><td>one unit digests 1 µg of substrate in one hour</td><td>U</td></tr><tr><td><code>glycerol</code></td><td>the storage solvent of the enzyme, an inhibitor above 5%</td><td>%</td></tr><tr><td><code>10×</code></td><td>ten-times concentrated buffer, diluted to 1× in the reaction</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Restriction Digest Recipe?', 'html' => <<<'TXT'
            <ol><li>Enter how much DNA you want to cut and its concentration.</li><li>Set the final reaction volume and the units per microgram you intend to use.</li><li>Read the volumes of DNA, enzyme, buffer and water — and the glycerol percentage, which must stay under 5%.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: dna to digest of <strong>1</strong> µg, dna concentration of <strong>100</strong> ng/µL, reaction volume of <strong>20</strong> µL, units per microgram of <strong>10</strong> U/µg, enzyme stock of <strong>20,000</strong> U/mL.</p>
            <p>Substituting them into the formula gives dna volume of <strong>10</strong> µL, enzyme units needed of <strong>10</strong> U, enzyme volume of <strong>0.5</strong> µL, 10× buffer of <strong>2</strong> µL, water of <strong>7.5</strong> µL, glycerol in the reaction of <strong>2.5</strong>%.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>glycerol under 5%</td><td><strong>Safe</strong></td><td>the enzyme works at full speed</td></tr><tr><td>glycerol 5 – 10%</td><td><strong>Marginal</strong></td><td>star activity and incomplete digestion appear</td></tr><tr><td>glycerol over 10%</td><td><strong>Inhibited</strong></td><td>dilute the DNA first rather than adding more enzyme</td></tr></tbody></table>
            <ul><li><p>Adding more enzyme is the usual reaction to an incomplete digest, and it is usually wrong: it adds glycerol, which inhibits the enzyme and can relax its specificity.</p></li><li><p>One unit is defined against a specific substrate in one hour. A PCR product with a blunt end or a plasmid with a methylation pattern may need several times the nominal amount.</p></li><li><p>Keep the reaction at 1× buffer. A 10× buffer diluted wrongly is a common cause of a digest that simply does not work.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Adding 2 µL of enzyme to a 20 µL reaction, which is 10% glycerol before the DNA is counted.</li><li>Forgetting to mix gently — enzyme sticks to the tube wall above the liquid line.</li><li>Incubating for 15 minutes and calling an incomplete digest a failure of the enzyme.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why must the enzyme be under a tenth of the volume?', 'a' => 'Because the enzyme is stored in 50% glycerol, and glycerol above about 5% of the reaction inhibits cutting and can change specificity.'],
            ['q' => 'How many units should I use?', 'a' => '5–10 U per microgram of plasmid for an hour; more for genomic DNA or a blunt-ended PCR product.'],
            ['q' => 'Can I digest in a smaller volume?', 'a' => 'Yes, and it usually works better — a smaller volume means a higher concentration of both ends.'],
            ['q' => 'What does the Restriction Digest Recipe actually calculate?', 'a' => 'It returns DNA volume, enzyme units needed, enzyme volume and 10× buffer. Each one is derived by the formula on this page, so you can check any figure by hand.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [],
    ],
];

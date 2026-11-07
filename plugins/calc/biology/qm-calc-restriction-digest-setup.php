<?php

/**
 * Restriction Digest Reaction Setup
 * /biology/restriction-digest-setup
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Restriction Digest Reaction Setup',
    'meta' => ['title' => 'Restriction Digest Reaction Setup — Biology', 'description' => 'A restriction digest is a small reaction with a strict recipe: enzyme units, buffer strength and volume. It returns DNA volume, enzyme volume, buffer volume…', 'h1' => 'Restriction Digest Reaction Setup', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'dna_ng',
                            'label' => 'DNA mass',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'dna_conc',
                            'label' => 'DNA concentration',
                            'type' => 'number',
                            'suffix' => 'ng/µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '200',
                        ],
                        [
                            'name' => 'total_vol',
                            'label' => 'Reaction volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'units_per_ug',
                            'label' => 'Enzyme units per µg DNA',
                            'type' => 'number',
                            'suffix' => 'U/µg',
                            'help' => '5–10 is typical',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'enzyme_conc',
                            'label' => 'Enzyme concentration',
                            'type' => 'number',
                            'suffix' => 'U/mL',
                            'help' => '20 U/µL is typical',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20000',
                        ],
                        [
                            'name' => 'buffer_x',
                            'label' => 'Buffer stock',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => 'CutSmart is 10×',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'dna_vol',
                            'label' => 'DNA volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'enzyme_vol',
                            'label' => 'Enzyme volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'buffer_vol',
                            'label' => 'Buffer volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'water_vol',
                            'label' => 'Water volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'units',
                            'label' => 'Total enzyme units',
                            'type' => 'number',
                            'suffix' => 'U',
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
            'title' => 'Digest',
            'results' => [
                'dna_vol' => 'dna_ng/dna_conc',
                'enzyme_vol' => 'dna_ng/1000*units_per_ug/enzyme_conc*1000',
                'buffer_vol' => 'total_vol/buffer_x',
                'water_vol' => 'total_vol-dna_ng/dna_conc-dna_ng/1000*units_per_ug/enzyme_conc*1000-total_vol/buffer_x',
                'units' => 'dna_ng/1000*units_per_ug',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A restriction digest is a small reaction with a strict recipe: enzyme units, buffer strength and volume. It returns DNA volume, enzyme volume, buffer volume and water volume, and the panel shows all of them at once.
        
        This calculator builds the 20 µL reaction.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Restriction Digest Reaction Setup', 'html' => <<<'TXT'
            <p>Enzyme units = DNA (µg) × units per µg; buffer = reaction volume ÷ stock fold; water = the balance</p>
            <figure class="calc-figure"><img src="/uploads/biology/restriction-digest-setup.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Restriction Digest Reaction Setup — A 20 µL digest: DNA, enzyme, buffer and water." title="Restriction Digest Reaction Setup"><figcaption>A 20 µL digest: DNA, enzyme, buffer and water.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>dna_ng</code></td><td>mass of DNA digested</td><td>ng</td></tr><tr><td><code>units_per_ug</code></td><td>enzyme excess over the minimum</td><td>U/µg</td></tr><tr><td><code>buffer_vol</code></td><td>1× final concentration</td><td>µL</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Restriction Digest Reaction Setup?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: dna mass of <strong>1,000</strong> ng, dna concentration of <strong>200</strong> ng/µL, reaction volume of <strong>20</strong> µL, enzyme units per µg dna of <strong>10</strong> U/µg, enzyme concentration of <strong>20,000</strong> U/mL, buffer stock of <strong>10</strong> ×.</p>
            <p>Substituting them into the formula gives dna volume of <strong>5</strong> µL, enzyme volume of <strong>0.5</strong> µL, buffer volume of <strong>2</strong> µL, water volume of <strong>12.5</strong> µL, total enzyme units of <strong>10</strong> U.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Glycerol carry-over above 5% of the reaction volume causes star activity; keep the enzyme volume at or below 1/10 of the total.</p></li><li><p>One unit is defined against a specific substrate DNA, so a new lot or a new template may need more; 10 U/µg is the safe working excess.</p></li><li><p>Most enzymes are active for 15 minutes to an hour at 37 °C; longer incubations mostly add star activity, not completeness.</p></li><li><p>Heat-inactivate or column-purify before ligation — residual enzyme will re-cut the product.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Adding 5 µL of enzyme to a 20 µL reaction for a 'fast' digest.</li><li>Using a 10× buffer at 1× in a reaction that already contains a large volume of DNA in TE.</li><li>Assuming complete digestion without running an aliquot on a gel.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/ligation-molar-ratio">Ligation molar ratio</a>. <a href="/biology/agarose-gel-calculator">Agarose gel</a>. <a href="/biology/dilution-calculator-c1v1">C1V1 dilution</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What if the DNA volume exceeds the reaction volume?', 'a' => 'Concentrate the DNA or scale the reaction up; the calculator returns a negative water volume when that happens.'],
            ['q' => 'Does doubled enzyme mean double the reaction volume?', 'a' => 'No — doubling units per µg means more enzyme in the same volume, until the glycerol limit.'],
            ['q' => 'What does the Restriction Digest Reaction Setup actually calculate?', 'a' => 'It returns DNA volume, enzyme volume, buffer volume and water volume. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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

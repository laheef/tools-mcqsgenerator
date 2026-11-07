<?php

/**
 * OD260 to Nucleic Acid Concentration Calculator
 * /biology/od260-nucleic-acid-concentration
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'OD260 to Nucleic Acid Concentration Calculator',
    'meta' => ['title' => 'OD260 to Nucleic Acid Concentration Calculator', 'description' => 'A260 converts to concentration with a factor that depends on what you are measuring: 50 for double-stranded DNA, 40 for RNA, 33 for single-stranded DNA.', 'h1' => 'OD260 to Nucleic Acid Concentration Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'type',
                            'label' => 'Nucleic acid',
                            'type' => 'select',
                            'options' => ['dsDNA' => '50', 'ssDNA / oligo' => '33', 'RNA' => '40', 'Protein' => '1.5'],
                            'default' => 'dsDNA',
                        ],
                        [
                            'name' => 'a260',
                            'label' => 'A260 reading',
                            'type' => 'number',
                            'help' => 'Absorbance in a 1 cm cuvette',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.42',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Dilution factor',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '10 if you diluted 1:10 for the Nanodrop',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'a280',
                            'label' => 'A280 reading',
                            'type' => 'number',
                            'help' => 'Optional — gives the purity ratio',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.23',
                        ],
                        [
                            'name' => 'conc',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'ng/µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'purity',
                            'label' => 'A260/A280',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'yield_ug',
                            'label' => 'Total yield in 100 µL',
                            'type' => 'number',
                            'suffix' => 'µg',
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
            'title' => 'Concentration',
            'results' => ['conc' => 'a260*dilution*type*1000', 'purity' => 'a260/a280', 'yield_ug' => 'a260*dilution*type*1000*100/1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A260 converts to concentration with a factor that depends on what you are measuring: 50 for double-stranded DNA, 40 for RNA, 33 for single-stranded DNA. It returns concentration, A260/A280 and total yield in 100 µL, and the panel shows all of them at once.
        
        This calculator applies the right factor, the dilution, and the A260/A280 ratio that tells you whether the sample is clean.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the OD260 to Nucleic Acid Concentration', 'html' => <<<'TXT'
            <p>Concentration (ng/µL) = A260 × dilution × factor, with factor 50 (dsDNA), 40 (RNA), 33 (ssDNA)</p>
            <figure class="calc-figure"><img src="/uploads/biology/od260-nucleic-acid-concentration.svg" width="720" height="300" loading="lazy" alt="Animated diagram: OD260 to Nucleic Acid Concentration Calculator — Absorbance, dilution and a factor that depends on the molecule." title="OD260 to Nucleic Acid Concentration Calculator"><figcaption>Absorbance, dilution and a factor that depends on the molecule.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>A260</code></td><td>absorbance at 260 nm</td><td>AU</td></tr><tr><td><code>factor</code></td><td>50 ng/µL per A260 for dsDNA</td><td>ng/µL</td></tr><tr><td><code>purity</code></td><td>A260/A280</td><td>ratio</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> Factors of 50, 40 and 33 ng/µL per A260 unit are the standard convention for dsDNA, RNA and ssDNA.</p>
            TXT],
            ['title' => 'How do I use the OD260 to Nucleic Acid Concentration?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: nucleic acid set to <strong>50.0</strong>, a260 reading of <strong>0.42</strong>, dilution factor of <strong>1</strong> ×, a280 reading of <strong>0.23</strong>.</p>
            <p>Substituting them into the formula gives concentration of <strong>21,000</strong> ng/µL, a260/a280 of <strong>1.83</strong>, total yield in 100 µl of <strong>2,100</strong> µg.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1.8</td><td><strong>Pure DNA</strong></td><td>the usual target for dsDNA</td></tr><tr><td>2.0</td><td><strong>Pure RNA</strong></td><td>the usual target for RNA</td></tr><tr><td>below 1.6</td><td><strong>Protein or phenol carry-over</strong></td><td>re-purify before sequencing</td></tr></tbody></table>
            <ul><li><p>The factors assume a 1 cm path length. A Nanodrop normalises to 1 cm automatically; a microplate reader does not, so check the path length.</p></li><li><p>A260 measures everything that absorbs at 260 nm, including free nucleotides and primers, so a high concentration with a poor 260/280 can still fail downstream.</p></li><li><p>Below about 0.1 AU the reading is dominated by noise; use a fluorescent assay instead.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Using the dsDNA factor for RNA (50 instead of 40, a 25% overestimate).</li><li>Forgetting the dilution when the sample was diluted for the reading.</li><li>Reading a sample that still has ethanol in it — ethanol absorbs strongly in the UV.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>Most real jobs need two or three of these together:</p><p><a href="/biology/dsdna-ug-to-pmol-converter">dsDNA µg to pmol</a>. <a href="/biology/genome-copy-number">Genome copy number</a>. <a href="/chemistry/beer-lambert-law">Beer–Lambert law</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why 50 for dsDNA?', 'a' => 'A 50 µg/mL solution of double-stranded DNA in a 1 cm cuvette has an A260 of 1.0.'],
            ['q' => 'My A260/A280 is 1.9 but the sequencing failed — why?', 'a' => 'The ratio is insensitive to some inhibitors; check A260/A230 and run a gel.'],
            ['q' => 'What does the OD260 to Nucleic Acid Concentration actually calculate?', 'a' => 'It returns concentration, A260/A280 and total yield in 100 µL. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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

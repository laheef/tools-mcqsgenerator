<?php

/**
 * Base Pair to kDa Calculator
 * /biology/base-pair-to-kda
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Base Pair to kDa Calculator',
    'meta' => ['title' => 'Base Pair to kDa Calculator — Formula & Results', 'description' => 'Kilodaltons and base pairs convert with one factor: 0.65 kDa per base pair of double-stranded DNA. It returns DNA mass, encoded amino acids, protein mass and…', 'h1' => 'Base Pair to kDa Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'bp',
                            'label' => 'DNA length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3000',
                        ],
                        [
                            'name' => 'kda_dna',
                            'label' => 'DNA mass',
                            'type' => 'number',
                            'suffix' => 'kDa',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'aa',
                            'label' => 'Encoded amino acids',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'kda_protein',
                            'label' => 'Protein mass',
                            'type' => 'number',
                            'suffix' => 'kDa',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bp_per_kda',
                            'label' => 'DNA per kDa of protein',
                            'type' => 'number',
                            'suffix' => 'bp',
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
            'title' => 'Mass',
            'results' => ['kda_dna' => 'bp*0.65', 'aa' => 'bp/3', 'kda_protein' => 'bp/3*0.11', 'bp_per_kda' => 'bp/(bp/3*0.11)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Kilodaltons and base pairs convert with one factor: 0.65 kDa per base pair of double-stranded DNA. It returns DNA mass, encoded amino acids, protein mass and DNA per kDa of protein, and the panel shows all of them at once.
        
        This calculator does both.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Base Pair to kDa', 'html' => <<<'TXT'
            <p>DNA: kDa = bp × 0.65; protein: kDa ≈ (bp ÷ 3) × 0.11</p>
            <figure class="calc-figure"><img src="/uploads/biology/base-pair-to-kda.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Base Pair to kDa Calculator — From base pairs to kilodaltons, for DNA and for the protein it encodes." title="Base Pair to kDa Calculator"><figcaption>From base pairs to kilodaltons, for DNA and for the protein it encodes.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>bp</code></td><td>length in base pairs</td><td>bp</td></tr><tr><td><code>0.65</code></td><td>kDa per base pair of dsDNA</td><td>kDa/bp</td></tr><tr><td><code>0.11</code></td><td>average kDa per amino acid</td><td>kDa/aa</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Base Pair to kDa?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: dna length of <strong>3,000</strong> bp.</p>
            <p>Substituting them into the formula gives dna mass of <strong>1,950</strong> kDa, encoded amino acids of <strong>1,000</strong>, protein mass of <strong>110</strong> kDa, dna per kda of protein of <strong>27.27</strong> bp.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>The protein estimate assumes the whole sequence is one open reading frame with no introns — true for bacterial genes and cDNA, wrong for genomic eukaryotic sequence.</p></li><li><p>Average residue mass is about 110 Da; a protein rich in glycine (57 Da) or tryptophan (186 Da) will deviate, and the estimate is only good to about ±10%.</p></li><li><p>For a fusion protein, add the tag: 6×His is about 0.8 kDa and GST about 26 kDa.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Converting a eukaryotic gene length straight to protein mass, introns included.</li><li>Forgetting the stop codon, which does not become an amino acid.</li><li>Using 0.65 kDa per bp for single-stranded RNA, where it is about 0.34.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>Most real jobs need two or three of these together:</p><p><a href="/biology/base-pair-to-dalton">Base pair to dalton</a>. <a href="/biology/coding-capacity-of-dna">Coding capacity of DNA</a>. <a href="/biology/protein-molar-conversions">Protein molar conversions</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many kDa is a 3 000 bp plasmid?', 'a' => 'About 1 950 kDa, or roughly 2 MDa.'],
            ['q' => 'How big is the protein from a 1 500 bp open reading frame?', 'a' => '500 amino acids, about 55 kDa.'],
            ['q' => 'What does the Base Pair to kDa actually calculate?', 'a' => <<<'TXT'
            It returns DNA mass, encoded amino acids, protein mass and DNA per kDa of protein. Each one is derived by the formula on this page, so you can check any figure by hand.
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

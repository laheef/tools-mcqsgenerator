<?php

/**
 * Coding Capacity of DNA Calculator
 * /biology/coding-capacity-of-dna
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Coding Capacity of DNA Calculator',
    'meta' => ['title' => 'Coding Capacity of DNA Calculator — Formula & Results', 'description' => 'A stretch of DNA can encode a predictable amount of protein: three bases per amino acid, about 110 daltons per residue. It returns codons, amino acids…', 'h1' => 'Coding Capacity of DNA Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Coding DNA length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'help' => 'Exons only',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1200',
                        ],
                        [
                            'name' => 'exons',
                            'label' => 'Share that is coding',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Less than 100 if introns or UTRs are counted',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'aa',
                            'label' => 'Amino acids encoded',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'kda',
                            'label' => 'Protein mass',
                            'type' => 'number',
                            'suffix' => 'kDa',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'codons',
                            'label' => 'Codons',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bp_needed',
                            'label' => 'DNA needed for a 50 kDa protein',
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
            'title' => 'Capacity',
            'results' => ['codons' => 'bp*exons/100/3', 'aa' => 'bp*exons/100/3-1', 'kda' => '(bp*exons/100/3-1)*0.11', 'bp_needed' => '50/0.11*3+3'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A stretch of DNA can encode a predictable amount of protein: three bases per amino acid, about 110 daltons per residue. It returns codons, amino acids encoded, protein mass and DNA needed for a 50 kDa protein, and the panel shows all of them at once.
        
        This calculator converts a coding length into amino acids and protein mass, and a target protein size back into the DNA needed.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Coding Capacity of DNA', 'html' => <<<'TXT'
            <p>Amino acids = (coding bp ÷ 3) − 1; mass ≈ amino acids × 110 Da</p>
            <figure class="calc-figure"><img src="/uploads/biology/coding-capacity-of-dna.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Coding Capacity of DNA Calculator — Three bases per codon, about 110 daltons per residue." title="Coding Capacity of DNA Calculator"><figcaption>Three bases per codon, about 110 daltons per residue.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>bp</code></td><td>coding sequence length</td><td>bp</td></tr><tr><td><code>codons</code></td><td>bp ÷ 3</td><td>codons</td></tr><tr><td><code>110 Da</code></td><td>average residue mass</td><td>Da</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Coding Capacity of DNA?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: coding dna length of <strong>1,200</strong> bp, share that is coding of <strong>100</strong>%.</p>
            <p>Substituting them into the formula gives codons of <strong>400</strong>, amino acids encoded of <strong>399</strong>, protein mass of <strong>43.89</strong> kDa, dna needed for a 50 kda protein of <strong>1,366.64</strong> bp.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>The minus one removes the stop codon, which encodes no amino acid; the start codon's methionine is usually cleaved too, so real proteins are a residue or two shorter.</p></li><li><p>Introns inflate genomic length without changing the protein, which is why cDNA length is the number to use.</p></li><li><p>The genetic code is redundant but unambiguous: 61 sense codons for 20 amino acids, so the DNA-to-protein length ratio is fixed at 3:1 even though the masses vary.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using genomic length for a eukaryotic gene.</li><li>Forgetting that untranslated regions at both ends are transcribed but not translated.</li><li>Assuming a protein's mass from the gene without checking the reading frame.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many amino acids does 900 bp encode?', 'a' => '299 after removing the stop codon — 900 ÷ 3 = 300 codons.'],
            ['q' => 'Why is the average residue mass 110 Da?', 'a' => 'Because the 20 amino acids average about 110 Da, and each peptide bond loses one water.'],
            ['q' => 'What does the Coding Capacity of DNA actually calculate?', 'a' => <<<'TXT'
            It returns codons, amino acids encoded, protein mass and DNA needed for a 50 kDa protein. Each one is derived by the formula on this page, so you can check any figure by hand.
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

<?php

/**
 * Genome Copy Number Calculator
 * /biology/genome-copy-number
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Genome Copy Number Calculator',
    'meta' => ['title' => 'Genome Copy Number Calculator — Formula & Results', 'description' => <<<'TXT'
    The genome copy number in a nanogram of DNA depends only on the genome size. It returns genome copies, copies per µL in 50 µL, log₁₀ copies and mass of one…
    TXT, 'h1' => 'Genome Copy Number Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'mass_ng',
                            'label' => 'DNA mass',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'genome_mb',
                            'label' => 'Genome size',
                            'type' => 'number',
                            'suffix' => 'Mb',
                            'help' => '3 200 Mb for human, 4.6 Mb for E. coli',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3.2',
                        ],
                        [
                            'name' => 'copies',
                            'label' => 'Genome copies',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'copies_ul',
                            'label' => 'Copies per µL in 50 µL',
                            'type' => 'number',
                            'suffix' => 'copies/µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'log_copies',
                            'label' => 'log₁₀ copies',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mass_per_copy',
                            'label' => 'Mass of one genome',
                            'type' => 'number',
                            'suffix' => 'fg',
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
            'title' => 'Copies',
            'results' => ['copies' => 'mass_ng*0.000000001/(genome_mb*1000000*660)/1.66054e-24', 'copies_ul' => 'mass_ng*0.000000001/(genome_mb*1000000*660)/1.66054e-24/50', 'log_copies' => 'log10(mass_ng*0.000000001/(genome_mb*1000000*660)/1.66054e-24)', 'mass_per_copy' => 'genome_mb*1000000*660/602200000000000000000000*1000000000000000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The genome copy number in a nanogram of DNA depends only on the genome size. It returns genome copies, copies per µL in 50 µL, log₁₀ copies and mass of one genome, and the panel shows all of them at once.
        
        The answer depends only on genome size, and it is the number that sets qPCR standard curves, sequencing input and the limit of detection. This calculator converts mass to copies for any genome size.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Genome Copy Number', 'html' => <<<'TXT'
            <p>Copies = mass (g) ÷ (genome length × 660 g/mol) × 6.022 × 10²³</p>
            <figure class="calc-figure"><img src="/uploads/biology/genome-copy-number.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Genome Copy Number Calculator — Mass, genome length and Avogadro's number." title="Genome Copy Number Calculator"><figcaption>Mass, genome length and Avogadro's number.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>mass</code></td><td>mass of DNA</td><td>ng</td></tr><tr><td><code>genome size</code></td><td>length of one genome</td><td>bp</td></tr><tr><td><code>copies</code></td><td>number of genomes</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Genome Copy Number?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: dna mass of <strong>10</strong> ng, genome size of <strong>3.2</strong> Mb.</p>
            <p>Substituting them into the formula gives genome copies of <strong>2,851,391</strong>, copies per µl in 50 µl of <strong>57,027.82</strong> copies/µL, log₁₀ copies of <strong>6.46</strong>, mass of one genome of <strong>3.51</strong> fg.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>A human diploid genome weighs about 6.6 pg; a haploid one 3.3 pg. That is the number to remember: one cell, one copy.</p></li><li><p>For qPCR standards, diluting to 10⁶ copies per µL and then serially tenfold gives a clean seven-point curve.</p></li><li><p>Long-read sequencing needs far more mass per copy because the molecules are not amplified — the copy number, not the mass, is what the flow cell sees.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Using genome size in base pairs where the formula expects megabases.</li><li>Forgetting that a diploid cell contains two copies per genome equivalent.</li><li>Treating mitochondrial or plasmid DNA with the nuclear genome size.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/dna-molarity-from-mass">DNA molarity</a>. <a href="/biology/od260-nucleic-acid-concentration">OD260 concentration</a>. <a href="/biology/plasmid-copy-number">Plasmid copy number</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many copies of a genome are in 1 ng of human DNA?', 'a' => 'About 303 copies of the 3.2 Gb genome.'],
            ['q' => 'What is the mass of one copy of the E. coli genome?', 'a' => 'About 5.0 fg for 4.6 Mb.'],
            ['q' => 'What does the Genome Copy Number actually calculate?', 'a' => <<<'TXT'
            It returns genome copies, copies per µL in 50 µL, log₁₀ copies and mass of one genome. Each one is derived by the formula on this page, so you can check any figure by hand.
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

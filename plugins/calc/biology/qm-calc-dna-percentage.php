<?php

/**
 * DNA Percentage Calculator
 * /biology/dna-percentage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'DNA Percentage Calculator',
    'meta' => ['title' => 'DNA Percentage Calculator — Formula & Results', 'description' => 'The DNA percentage of a genome is the share of its bases that code for protein. It returns coding percentage, non-coding share, gene density and bases per…', 'h1' => 'DNA Percentage Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'genome',
                            'label' => 'Genome size',
                            'type' => 'number',
                            'suffix' => 'Mb',
                            'help' => '3 000 Mb is a mammalian genome',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3000',
                        ],
                        [
                            'name' => 'coding',
                            'label' => 'Coding bases',
                            'type' => 'number',
                            'suffix' => 'Mb',
                            'help' => 'Sum of all coding exons',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '90',
                        ],
                        [
                            'name' => 'genes',
                            'label' => 'Gene count',
                            'type' => 'number',
                            'help' => 'Optional — used for gene density',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20000',
                        ],
                        [
                            'name' => 'coding_pct',
                            'label' => 'Coding percentage',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'noncoding_pct',
                            'label' => 'Non-coding share',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gene_density',
                            'label' => 'Gene density',
                            'type' => 'number',
                            'suffix' => 'genes/Mb',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bases_per_gene',
                            'label' => 'Bases per gene',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'coding_per_gene',
                            'label' => 'Coding bases per gene',
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
            'title' => 'Genome',
            'results' => [
                'coding_pct' => 'coding/genome*100',
                'noncoding_pct' => '100-coding/genome*100',
                'gene_density' => 'genes/genome',
                'bases_per_gene' => 'genome*1000000/genes',
                'coding_per_gene' => 'coding*1000000/genes',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The DNA percentage of a genome is the share of its bases that code for protein. It returns coding percentage, non-coding share, gene density and bases per gene, and the panel shows all of them at once.
        
        Give the genome size and either the coding bases or a gene count with a mean gene length, and the page returns the coding percentage, the non-coding share, the gene density in genes per megabase and the mean bases per gene — the numbers that decide whether a genome is compact or mostly intergenic.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the DNA Percentage', 'html' => <<<'TXT'
            <p>coding % = coding bases ÷ genome size × 100; gene density = genes ÷ genome size (Mb); bases per gene = genome (bp) ÷ genes</p>
            <figure class="calc-figure"><img src="/uploads/biology/dna-percentage.svg" width="720" height="300" loading="lazy" alt="Animated diagram: DNA Percentage Calculator — Coding share of four genomes" title="DNA Percentage Calculator"><figcaption>Coding share of four genomes</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>genome</code></td><td>haploid genome size</td><td>Mb</td></tr><tr><td><code>coding</code></td><td>total length of coding sequence</td><td>Mb</td></tr><tr><td><code>genes</code></td><td>number of protein-coding genes</td><td>—</td></tr><tr><td><code>gene density</code></td><td>how tightly genes are packed</td><td>genes/Mb</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the DNA Percentage?', 'html' => <<<'TXT'
            <ol><li>Enter the genome size in megabases — one copy, not the diploid total.</li><li>Enter the coding bases: the sum of all coding exons, which is what a genome annotation gives you as the total CDS length.</li><li>Add the gene count if you want gene density and bases per gene; leave it as it is to skip those two lines.</li><li>Compare the coding percentage across organisms: it is the single clearest number for how much of a genome is doing something.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: genome size of <strong>3,000</strong> Mb, coding bases of <strong>90</strong> Mb, gene count of <strong>20,000</strong>.</p>
            <p>Substituting them into the formula gives coding percentage of <strong>3</strong>%, non-coding share of <strong>97</strong>%, gene density of <strong>6.67</strong> genes/Mb, bases per gene of <strong>150,000</strong> bp, coding bases per gene of <strong>4,500</strong> bp.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>above 70 %</td><td><strong>Compact</strong></td><td>bacterial and archaeal genomes, and viral genomes</td></tr><tr><td>30 – 70 %</td><td><strong>Dense</strong></td><td>small eukaryotes such as yeast and some fungi</td></tr><tr><td>10 – 30 %</td><td><strong>Typical eukaryote</strong></td><td>invertebrates and many plants</td></tr><tr><td>1 – 10 %</td><td><strong>Sparse</strong></td><td>vertebrates, including the human 1.5 %</td></tr><tr><td>below 1 %</td><td><strong>Very sparse</strong></td><td>large plant and amphibian genomes dominated by repeats</td></tr></tbody></table>
            <ul><li><p>The human figure is about 1.5 % coding and roughly 39 % in introns; the rest is intergenic sequence, much of it repetitive. A genome can be 50× larger than another with barely more genes — the difference is mostly repeats.</p></li><li><p>Coding percentage is not the same as exon percentage: exons include untranslated regions, so exon totals run higher than coding sequence totals.</p></li><li><p>Gene density and mean gene length move in opposite directions across taxa: compact genomes have short genes packed closely, which is why the bases-per-gene figure is worth reading next to the density.</p></li><li><p>Genome size here is haploid. A diploid cell contains twice this, which matters if you are converting to mass of DNA per cell.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using the diploid genome size and then comparing with published haploid percentages.</li><li>Entering the number of exons instead of the coding length.</li><li>Comparing coding percentages between an annotation that counts only reviewed genes and one that includes predicted open reading frames.</li><li>Assuming non-coding means non-functional: promoters, enhancers and non-coding RNA all live in the non-coding share.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What percentage of the human genome is coding?', 'a' => <<<'TXT'
            About 1.5 % — roughly 30 Mb of coding sequence in a 3 000 Mb haploid genome. Adding untranslated regions brings the exonic total to a few percent, and introns take about 39 %.
            TXT],
            ['q' => 'Why do some genomes have almost no non-coding DNA?', 'a' => <<<'TXT'
            Because selection against carrying extra DNA is strong in fast-growing cells with large population sizes, which is the usual explanation for bacterial genome compaction.
            TXT],
            ['q' => 'Is coding percentage the same as gene density?', 'a' => <<<'TXT'
            No. Gene density counts genes per megabase and says how packed the genes are; coding percentage measures how much of the sequence is coding. A genome can be gene-dense and still have a low coding percentage if its genes are mostly introns.
            TXT],
            ['q' => 'Can I use this for a single gene or contig?', 'a' => 'Yes, with small numbers: a 2 000 bp gene with 1 500 bp of coding sequence is 75 % coding. The same formula works at any scale.'],
            ['q' => 'What does the DNA Percentage actually calculate?', 'a' => <<<'TXT'
            It returns coding percentage, non-coding share, gene density and bases per gene. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
        ],
        'related' => [],
    ],
];

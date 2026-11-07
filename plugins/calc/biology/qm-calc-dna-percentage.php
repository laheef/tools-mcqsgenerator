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
    'meta' => ['title' => 'DNA Percentage Calculator — Formula & Results', 'description' => 'DNA Percentage turns Genome size, Coding bases and Gene count into Coding percentage and Non-coding share. It is a single relationship that reads Coding…', 'h1' => 'DNA Percentage Calculator', 'updated' => '2026-10-29'],
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
        DNA Percentage turns Genome size, Coding bases and Gene count into Coding percentage and Non-coding share. It is a single relationship that reads Coding percentage out of Genome size, not a table of canned results keyed by them. Units for Coding percentage default to % and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the DNA Percentage calculator works', 'html' => <<<'TXT'
            <p>The DNA Percentage calculator applies one relationship to 3 numbers and reports Coding percentage, Non-coding share and Gene density.</p><p>In the form&#039;s own words, Coding percentage = Coding bases ÷ Genome size × 100.</p><p>The result panel carries Coding percentage, Non-coding share, Gene density and Bases per gene, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Genome size</strong> — in Mb. 3 000 Mb is a mammalian genome</li><li><strong>Coding bases</strong> — in Mb. Sum of all coding exons</li><li><strong>Gene count</strong> — a plain number, no unit. Optional — used for gene density</li></ul><p>The answers come back as Coding percentage in %, Non-coding share in %, Gene density in genes/Mb, Bases per gene in bp, Coding bases per gene in bp. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Genome size = 3000 Mb, Coding bases = 90 Mb and Gene count = 20000; the answers are &lt;strong&gt;Coding percentage&lt;/strong&gt; = 3 %, &lt;strong&gt;Non-coding share&lt;/strong&gt; = 97 %, &lt;strong&gt;Gene density&lt;/strong&gt; = 6.67 genes/Mb, &lt;strong&gt;Bases per gene&lt;/strong&gt; = 150000 bp and &lt;strong&gt;Coding bases per gene&lt;/strong&gt; = 4500 bp.</p><ul><li><strong>Coding percentage</strong> = 3 %</li><li><strong>Non-coding share</strong> = 97 %</li><li><strong>Gene density</strong> = 6.67 genes/Mb</li><li><strong>Bases per gene</strong> = 150000 bp</li><li><strong>Coding bases per gene</strong> = 4500 bp</li></ul><p>That is <strong>Coding percentage</strong> = <code>Coding bases ÷ Genome size × 100</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Coding percentage&lt;/strong&gt; = 3, &lt;strong&gt;Non-coding share&lt;/strong&gt; = 97, &lt;strong&gt;Gene density&lt;/strong&gt; = 6.67, &lt;strong&gt;Bases per gene&lt;/strong&gt; = 150000 and &lt;strong&gt;Coding bases per gene&lt;/strong&gt; = 4500 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Coding percentage takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Coding percentage</strong> = <code>Coding bases ÷ Genome size × 100</code></li><li><strong>Non-coding share</strong> = <code>100 − Coding bases ÷ Genome size × 100</code></li><li><strong>Gene density</strong> = <code>Gene count ÷ Genome size</code></li><li><strong>Bases per gene</strong> = <code>Genome size × 1000000 ÷ Gene count</code></li><li><strong>Coding bases per gene</strong> = <code>Coding bases × 1000000 ÷ Gene count</code></li></ul><p>Any one of Coding percentage, Non-coding share and Gene density can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Genome size from 3000 to 6000, leaving every other box alone. The panel moves from &lt;strong&gt;Coding percentage&lt;/strong&gt; 3 %, &lt;strong&gt;Non-coding share&lt;/strong&gt; 97 %, &lt;strong&gt;Gene density&lt;/strong&gt; 6.67 genes/Mb, &lt;strong&gt;Bases per gene&lt;/strong&gt; 150000 bp and &lt;strong&gt;Coding bases per gene&lt;/strong&gt; 4500 bp to &lt;strong&gt;Coding percentage&lt;/strong&gt; 1.5 %, &lt;strong&gt;Non-coding share&lt;/strong&gt; 98.5 %, &lt;strong&gt;Gene density&lt;/strong&gt; 3.33 genes/Mb, &lt;strong&gt;Bases per gene&lt;/strong&gt; 300000 bp and &lt;strong&gt;Coding bases per gene&lt;/strong&gt; 4500 bp.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Coding percentage, Non-coding share and Gene density are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Genome size and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Genome size, Coding bases and Gene count is what you already know and Coding percentage and Non-coding share is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/sulfur-soil-acidifier">Sulfur Soil Acidifier Calculator</a>, <a href="/biology/swine-gestation">Swine gestation Calculator</a> and <a href="/biology/sorensen-index">Sørensen Similarity Index Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the DNA Percentage calculator work out?', 'a' => <<<'TXT'
            Coding percentage, Non-coding share, Gene density and Bases per gene, from Coding bases and Genome size. The relationship is Coding percentage = Coding bases ÷ Genome size × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Genome size (Mb), Coding bases (Mb), Gene count. Fill genome, coding and genes and leave Coding percentage empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Coding percentage, Non-coding share, Gene density and Bases per gene blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Coding percentage = 3 %, Non-coding share = 97 %, Gene density = 6.67 genes/Mb, Bases per gene = 150000 bp and Coding bases per gene = 4500 bp. That comes from the page's own defaults, entered in Genome size; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Coding percentage is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Genome size left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Coding percentage at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/sulfur-soil-acidifier', 'name' => 'Sulfur Soil Acidifier Calculator'],
            ['path' => '/biology/swine-gestation', 'name' => 'Swine gestation Calculator'],
            ['path' => '/biology/sorensen-index', 'name' => 'Sørensen Similarity Index Calculator'],
        ],
        'authors' => [],
    ],
];

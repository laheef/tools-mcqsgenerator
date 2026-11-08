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
    'meta' => ['title' => 'DNA Percentage Calculator: Formula & Example', 'description' => 'DNA Percentage Calculator reports coding percentage and non-coding share. The answer, coding percentage, is worked out in one step from the boxes you fill.', 'h1' => 'DNA Percentage Calculator', 'updated' => '2026-10-29'],
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
        DNA Percentage turns Genome size, Coding bases and Gene count into Coding percentage and Non-coding share. It is a single relationship that reads coding percentage out of genome size, not a table of canned results keyed by them. Units for Coding percentage default to % and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the DNA Percentage calculator works', 'html' => <<<'TXT'
            <p>The DNA Percentage calculator applies one relationship to 3 numbers and reports Coding percentage, Non-coding share and Gene density.</p><p>In the form&#039;s own words, Coding percentage = Coding bases ÷ Genome size × 100.</p><p>The result panel carries Coding percentage, Non-coding share, Gene density and Bases per gene, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Genome size</strong> — in Mb. 3 000 Mb is a mammalian genome</li><li><strong>Coding bases</strong> — in Mb. Sum of all coding exons</li><li><strong>Gene count</strong> — a plain number, no unit. Optional — used for gene density</li></ul><p>The answers come back as Coding percentage in %, Non-coding share in %, Gene density in genes/Mb, Bases per gene in bp, Coding bases per gene in bp. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Genome size = 3000 Mb, Coding bases = 90 Mb and Gene count = 20000; the answers are <strong>Coding percentage</strong> = 3 %, <strong>Non-coding share</strong> = 97 %, <strong>Gene density</strong> = 6.67 genes/Mb, <strong>Bases per gene</strong> = 150000 bp and <strong>Coding bases per gene</strong> = 4500 bp.</p><ul><li><strong>Coding percentage</strong> = 3 %</li><li><strong>Non-coding share</strong> = 97 %</li><li><strong>Gene density</strong> = 6.67 genes/Mb</li><li><strong>Bases per gene</strong> = 150000 bp</li><li><strong>Coding bases per gene</strong> = 4500 bp</li></ul><p>That is <strong>Coding percentage</strong> = <code>Coding bases ÷ Genome size × 100</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Coding percentage</strong> = 3, <strong>Non-coding share</strong> = 97, <strong>Gene density</strong> = 6.67, <strong>Bases per gene</strong> = 150000 and <strong>Coding bases per gene</strong> = 4500 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Coding percentage takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Coding percentage</strong> = <code>Coding bases ÷ Genome size × 100</code></li><li><strong>Non-coding share</strong> = <code>100 − Coding bases ÷ Genome size × 100</code></li><li><strong>Gene density</strong> = <code>Gene count ÷ Genome size</code></li><li><strong>Bases per gene</strong> = <code>Genome size × 1000000 ÷ Gene count</code></li><li><strong>Coding bases per gene</strong> = <code>Coding bases × 1000000 ÷ Gene count</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Coding percentage</strong> = <code>Coding bases ÷ Genome size × 100</code> — the form to use when Coding bases and Genome size are the values you have.</li><li><strong>Non-coding share</strong> = <code>100 − Coding bases ÷ Genome size × 100</code> — the form to use when Coding bases and Genome size are the values you have.</li><li><strong>Gene density</strong> = <code>Gene count ÷ Genome size</code> — the form to use when Gene count and Genome size are the values you have.</li><li><strong>Bases per gene</strong> = <code>Genome size × 1000000 ÷ Gene count</code> — the form to use when Genome size and Gene count are the values you have.</li><li><strong>Coding bases per gene</strong> = <code>Coding bases × 1000000 ÷ Gene count</code> — the form to use when Coding bases and Gene count are the values you have.</li></ul><p>Any one of Coding percentage, Non-coding share and Gene density can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Genome size from 3000 to 6000, leaving every other box alone. The panel moves from <strong>Coding percentage</strong> 3 %, <strong>Non-coding share</strong> 97 %, <strong>Gene density</strong> 6.67 genes/Mb, <strong>Bases per gene</strong> 150000 bp and <strong>Coding bases per gene</strong> 4500 bp to <strong>Coding percentage</strong> 1.5 %, <strong>Non-coding share</strong> 98.5 %, <strong>Gene density</strong> 3.33 genes/Mb, <strong>Bases per gene</strong> 300000 bp and <strong>Coding bases per gene</strong> 4500 bp.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box cannot be typed into: the results are worked out from the inputs above, and a past answer has to be entered as one of those inputs instead.</li><li><strong>Genome size left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Genome size is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Coding bases left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Coding bases is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Gene count left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Gene count is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Genome size and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Genome size</strong> is measured in Mb. 3 000 Mb is a mammalian genome. Change it and Coding percentage, Non-coding share and Gene density changes with it. Have it to hand before you start: Genome size is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Coding bases</strong> is measured in Mb. Sum of all coding exons. Change it and Coding percentage, Non-coding share and Coding bases per gene changes with it. Have it to hand before you start: Coding bases is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Gene count</strong> takes a plain number with no unit attached. Optional — used for gene density. Change it and Gene density, Bases per gene and Coding bases per gene changes with it. Have it to hand before you start: Gene count is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Coding percentage</strong> is a plain number and the page's own defaults put it at 3. It is worked out from Coding bases and Genome size. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Non-coding share</strong> is a plain number and the page's own defaults put it at 97. It is worked out from Coding bases and Genome size. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Gene density</strong> is a plain number and the page's own defaults put it at 6.67. It is worked out from Gene count and Genome size. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Bases per gene</strong> is a plain number and the page's own defaults put it at 150000. It is worked out from Genome size and Gene count. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Coding bases per gene</strong> is a plain number and the page's own defaults put it at 4500. It is worked out from Coding bases and Gene count. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Coding percentage</th><th>Non-coding share</th><th>Gene density</th><th>Bases per gene</th><th>Coding bases per gene</th></tr></thead><tbody><tr><td><strong>Genome size</strong> +10%</td><td>-9.09%</td><td>+0.28%</td><td>-9.09%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Coding bases</strong> +10%</td><td>+10%</td><td>-0.31%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Gene count</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>-9.09%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Genome size sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Genome size = 1500 Mb, Coding bases = 45 Mb and Gene count = 10000, the answer is <strong>Coding percentage</strong> = 3 %, <strong>Non-coding share</strong> = 97 %, <strong>Gene density</strong> = 6.67 genes/Mb, <strong>Bases per gene</strong> = 150000 bp and <strong>Coding bases per gene</strong> = 4500 bp.</li><li>With Genome size = 9000 Mb, Coding bases = 90 Mb and Gene count = 20000, the answer is <strong>Coding percentage</strong> = 1 %, <strong>Non-coding share</strong> = 99 %, <strong>Gene density</strong> = 2.22 genes/Mb, <strong>Bases per gene</strong> = 450000 bp and <strong>Coding bases per gene</strong> = 4500 bp.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Coding percentage follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Genome size, Coding bases and Gene count are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
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
            Genome size (Mb), Coding bases (Mb), Gene count. Fill genome size, coding bases and gene count and leave Coding percentage empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Coding percentage, Non-coding share, Gene density and Bases per gene blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Coding percentage = 3 %, Non-coding share = 97 %, Gene density = 6.67 genes/Mb, Bases per gene = 150000 bp and Coding bases per gene = 4500 bp. That comes from the page's own defaults, entered in Genome size; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Coding percentage is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
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

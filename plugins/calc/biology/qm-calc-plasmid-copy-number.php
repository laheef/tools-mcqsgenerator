<?php

/**
 * Plasmid Copy Number Calculator
 * /biology/plasmid-copy-number
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Plasmid Copy Number Calculator',
    'meta' => ['title' => 'Plasmid Copy Number Calculator — Formula & Results', 'description' => 'Plasmid Copy Number turns Plasmid yield, Plasmid size and Culture volume into Plasmids per cell and Cells harvested. The arithmetic is the whole method…', 'h1' => 'Plasmid Copy Number Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'yield_ug',
                            'label' => 'Plasmid yield',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'help' => 'From a miniprep of known culture volume',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'plasmid_kb',
                            'label' => 'Plasmid size',
                            'type' => 'number',
                            'suffix' => 'kb',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'culture_ml',
                            'label' => 'Culture volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                        [
                            'name' => 'od',
                            'label' => 'Culture OD600',
                            'type' => 'number',
                            'help' => 'At harvest',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'copy_number',
                            'label' => 'Plasmids per cell',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cells_total',
                            'label' => 'Cells harvested',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'plasmid_pmol',
                            'label' => 'Plasmid recovered',
                            'type' => 'number',
                            'suffix' => 'pmol',
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
            'title' => 'Copy number',
            'results' => ['cells_total' => 'culture_ml*od*800000000', 'plasmid_pmol' => 'yield_ug*1000000/(plasmid_kb*1000*660)', 'copy_number' => 'yield_ug*0.000001/(plasmid_kb*1000*660)*602200000000000000000000/(culture_ml*od*800000000)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Plasmid Copy Number turns Plasmid yield, Plasmid size and Culture volume into Plasmids per cell and Cells harvested. The arithmetic is the whole method: Plasmids per cell is worked out from Plasmid yield by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Plasmid Copy Number calculator works', 'html' => <<<'TXT'
            <p>The Plasmid Copy Number calculator applies one relationship to 4 numbers and reports Plasmids per cell, Cells harvested and Plasmid recovered.</p><p>The relationship it solves reads Cells harvested = Culture volume × Culture OD600 × 800000000.</p><p>The answers are Plasmids per cell, Cells harvested and Plasmid recovered; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Plasmid yield</strong> — in µg. From a miniprep of known culture volume</li><li><strong>Plasmid size</strong> — in kb</li><li><strong>Culture volume</strong> — in mL</li><li><strong>Culture OD600</strong> — a plain number, no unit. At harvest</li></ul><p>The result boxes are Plasmids per cell, Cells harvested, Plasmid recovered in pmol; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Plasmid yield = 8 µg, Plasmid size = 5 kb, Culture volume = 3 mL and Culture OD600 = 2 gives &lt;strong&gt;Cells harvested&lt;/strong&gt; = 4.800e+9, &lt;strong&gt;Plasmid recovered&lt;/strong&gt; = 2.42 pmol and &lt;strong&gt;Plasmids per cell&lt;/strong&gt; = 304.</p><ul><li><strong>Cells harvested</strong> = 4.800e+9</li><li><strong>Plasmid recovered</strong> = 2.42 pmol</li><li><strong>Plasmids per cell</strong> = 304</li></ul><p>The line behind those figures is <strong>Cells harvested</strong> = <code>Culture volume × Culture OD600 × 800000000</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Cells harvested&lt;/strong&gt; = 4.800e+9, &lt;strong&gt;Plasmid recovered&lt;/strong&gt; = 2.42 and &lt;strong&gt;Plasmids per cell&lt;/strong&gt; = 304 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Plasmids per cell takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Cells harvested</strong> = <code>Culture volume × Culture OD600 × 800000000</code></li><li><strong>Plasmid recovered</strong> = <code>Plasmid yield × 1000000 ÷ (Plasmid size × 1000 × 660)</code></li><li><strong>Plasmids per cell</strong> = <code>Plasmid yield × 0.000001 ÷ (Plasmid size × 1000 × 660) × 602200000000000000000000 ÷ (Culture volume × Culture OD600 × 800000000)</code></li></ul><p>Any one of Cells harvested, Plasmid recovered and Plasmids per cell can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Plasmid yield, from 8 to 16 — and the answers go from &lt;strong&gt;Cells harvested&lt;/strong&gt; 4.800e+9, &lt;strong&gt;Plasmid recovered&lt;/strong&gt; 2.42 pmol and &lt;strong&gt;Plasmids per cell&lt;/strong&gt; 304 to &lt;strong&gt;Cells harvested&lt;/strong&gt; 4.800e+9, &lt;strong&gt;Plasmid recovered&lt;/strong&gt; 4.85 pmol and &lt;strong&gt;Plasmids per cell&lt;/strong&gt; 608.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Plasmids per cell, Cells harvested and Plasmid recovered are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Plasmid yield to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Plasmid yield, Plasmid size and Culture volume and the number you are missing is Plasmids per cell and Cells harvested.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/chi-square-genetics-test">Chi-Square Test for Genetics Calculator</a>, <a href="/biology/chicken-density">Chicken Density Calculator</a> and <a href="/biology/chicken-feed-amount">Chicken Feed Amount Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Plasmid Copy Number calculator work out?', 'a' => <<<'TXT'
            Plasmids per cell, Cells harvested and Plasmid recovered, from Culture volume and Culture OD600. The relationship is Cells harvested = Culture volume × Culture OD600 × 800000000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Plasmid yield (µg), Plasmid size (kb), Culture volume (mL), Culture OD600. With yield_ug, plasmid_kb and culture_ml in place, Plasmids per cell can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Cells harvested, Plasmid recovered and Plasmids per cell blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Cells harvested = 4.800e+9, Plasmid recovered = 2.42 pmol and Plasmids per cell = 304. That comes from the page's own defaults, entered in Plasmid yield; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Plasmids per cell is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Plasmid yield left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Plasmids per cell keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/chi-square-genetics-test', 'name' => 'Chi-Square Test for Genetics Calculator'],
            ['path' => '/biology/chicken-density', 'name' => 'Chicken Density Calculator'],
            ['path' => '/biology/chicken-feed-amount', 'name' => 'Chicken Feed Amount Calculator'],
        ],
        'authors' => [],
    ],
];

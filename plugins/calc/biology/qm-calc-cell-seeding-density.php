<?php

/**
 * Cell Seeding Density Calculator
 * /biology/cell-seeding-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell Seeding Density Calculator',
    'meta' => ['title' => 'Cell Seeding Density Calculator — Formula & Results', 'description' => <<<'TXT'
    Enter Stock concentration, Target density and Growth area per vessel into Cell Seeding Density and the answer comes back as Cells per vessel and Suspension to…
    TXT, 'h1' => 'Cell Seeding Density Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'conc',
                            'label' => 'Stock concentration',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'help' => 'From your count',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1500000',
                        ],
                        [
                            'name' => 'target',
                            'label' => 'Target density',
                            'type' => 'number',
                            'suffix' => 'cells/cm²',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20000',
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Growth area per vessel',
                            'type' => 'number',
                            'suffix' => 'cm²',
                            'help' => 'T25 = 25, T75 = 75, 6-well = 9.6',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'vessels',
                            'label' => 'Number of vessels',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'medium',
                            'label' => 'Final volume per vessel',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'per_vessel',
                            'label' => 'Cells per vessel',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Suspension to pipette per vessel',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_cells',
                            'label' => 'Cells needed in total',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'medium_add',
                            'label' => 'Medium to add per vessel',
                            'type' => 'number',
                            'suffix' => 'mL',
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
            'title' => 'Seeding',
            'results' => ['per_vessel' => 'target*area', 'volume' => 'target*area/conc', 'total_cells' => 'target*area*vessels', 'medium_add' => 'medium-target*area/conc'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Stock concentration, Target density and Growth area per vessel into Cell Seeding Density and the answer comes back as Cells per vessel and Suspension to pipette per vessel. There is no hidden constant here: change Cells per vessel and Stock concentration moves with it. The main result, Cells per vessel, is reported in cells.
        TXT,
        'sections' => [
            ['title' => 'How the Cell Seeding Density calculator works', 'html' => <<<'TXT'
            <p>Cell Seeding Density answers one question from 5 numbers, and the answer is Cells per vessel, Suspension to pipette per vessel and Cells needed in total.</p><p>The relationship it solves reads Cells per vessel = Target density × Growth area per vessel.</p><p>What comes back is Cells per vessel, Suspension to pipette per vessel, Cells needed in total and Medium to add per vessel — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Stock concentration</strong> — in cells/mL. From your count</li><li><strong>Target density</strong> — in cells/cm²</li><li><strong>Growth area per vessel</strong> — in cm². T25 = 25, T75 = 75, 6-well = 9.6</li><li><strong>Number of vessels</strong> — a plain number, no unit</li><li><strong>Final volume per vessel</strong> — in mL</li></ul><p>The answers come back as Cells per vessel in cells, Suspension to pipette per vessel in mL, Cells needed in total in cells, Medium to add per vessel in mL. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Stock concentration = 1.500e+6 cells/mL, Target density = 20000 cells/cm², Growth area per vessel = 25 cm², Number of vessels = 1 and Final volume per vessel = 5 mL — through the same formula and the panel reports &lt;strong&gt;Cells per vessel&lt;/strong&gt; = 500000 cells, &lt;strong&gt;Suspension to pipette per vessel&lt;/strong&gt; = 0.3333 mL, &lt;strong&gt;Cells needed in total&lt;/strong&gt; = 500000 cells and &lt;strong&gt;Medium to add per vessel&lt;/strong&gt; = 4.67 mL.</p><ul><li><strong>Cells per vessel</strong> = 500000 cells</li><li><strong>Suspension to pipette per vessel</strong> = 0.3333 mL</li><li><strong>Cells needed in total</strong> = 500000 cells</li><li><strong>Medium to add per vessel</strong> = 4.67 mL</li></ul><p>The line behind those figures is <strong>Cells per vessel</strong> = <code>Target density × Growth area per vessel</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Cells per vessel&lt;/strong&gt; = 500000, &lt;strong&gt;Suspension to pipette per vessel&lt;/strong&gt; = 0.3333, &lt;strong&gt;Cells needed in total&lt;/strong&gt; = 500000 and &lt;strong&gt;Medium to add per vessel&lt;/strong&gt; = 4.67. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Cells per vessel is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Cells per vessel</strong> = <code>Target density × Growth area per vessel</code></li><li><strong>Suspension to pipette per vessel</strong> = <code>Target density × Growth area per vessel ÷ Stock concentration</code></li><li><strong>Cells needed in total</strong> = <code>Target density × Growth area per vessel × Number of vessels</code></li><li><strong>Medium to add per vessel</strong> = <code>Final volume per vessel − Target density × Growth area per vessel ÷ Stock concentration</code></li></ul><p>Any one of Cells per vessel, Suspension to pipette per vessel and Cells needed in total can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Stock concentration from 1.500e+6 to 3.000e+6, leaving every other box alone. The panel moves from &lt;strong&gt;Cells per vessel&lt;/strong&gt; 500000 cells, &lt;strong&gt;Suspension to pipette per vessel&lt;/strong&gt; 0.3333 mL, &lt;strong&gt;Cells needed in total&lt;/strong&gt; 500000 cells and &lt;strong&gt;Medium to add per vessel&lt;/strong&gt; 4.67 mL to &lt;strong&gt;Cells per vessel&lt;/strong&gt; 500000 cells, &lt;strong&gt;Suspension to pipette per vessel&lt;/strong&gt; 0.1667 mL, &lt;strong&gt;Cells needed in total&lt;/strong&gt; 500000 cells and &lt;strong&gt;Medium to add per vessel&lt;/strong&gt; 4.83 mL.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Cells per vessel, Suspension to pipette per vessel and Cells needed in total are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Stock concentration and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Stock concentration, Target density and Growth area per vessel is what you already know and Cells per vessel and Suspension to pipette per vessel is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/raw-dog-food">Raw dog food Calculator</a>, <a href="/biology/recombination-frequency">Recombination Frequency Calculator</a> and <a href="/biology/genetic-linkage-distance">Recombination to cM — Haldane &amp; Kosambi</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cell Seeding Density calculator work out?', 'a' => <<<'TXT'
            Cells per vessel, Suspension to pipette per vessel, Cells needed in total and Medium to add per vessel, from Target density and Growth area per vessel. The relationship is Cells per vessel = Target density × Growth area per vessel.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Stock concentration (cells/mL), Target density (cells/cm²), Growth area per vessel (cm²), Number of vessels, Final volume per vessel (mL). Enter conc, target and area; Cells per vessel is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Cells per vessel, Suspension to pipette per vessel, Cells needed in total and Medium to add per vessel blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Cells per vessel = 500000 cells, Suspension to pipette per vessel = 0.3333 mL, Cells needed in total = 500000 cells and Medium to add per vessel = 4.67 mL. That comes from the page's own defaults, entered in Stock concentration; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Cells per vessel is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Stock concentration left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Cells per vessel keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/raw-dog-food', 'name' => 'Raw dog food Calculator'],
            ['path' => '/biology/recombination-frequency', 'name' => 'Recombination Frequency Calculator'],
            ['path' => '/biology/genetic-linkage-distance', 'name' => 'Recombination to cM — Haldane & Kosambi'],
        ],
        'authors' => [],
    ],
];

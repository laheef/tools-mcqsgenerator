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
    'meta' => ['title' => 'Base Pair to kDa Calculator — Formula & Results', 'description' => 'Base Pair to kDa takes DNA length and returns DNA mass and Encoded amino acids. There is no hidden constant here: change DNA mass and DNA length moves with it.', 'h1' => 'Base Pair to kDa Calculator', 'updated' => '2026-10-29'],
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
        Base Pair to kDa takes DNA length and returns DNA mass and Encoded amino acids. There is no hidden constant here: change DNA mass and DNA length moves with it. The main result, DNA mass, is reported in kDa.
        TXT,
        'sections' => [
            ['title' => 'How the Base Pair to kDa calculator works', 'html' => <<<'TXT'
            <p>The Base Pair to kDa calculator applies one relationship to 1 number and reports DNA mass, Encoded amino acids and Protein mass.</p><p>In the form&#039;s own words, DNA mass = DNA length × 0.65.</p><p>The answers are DNA mass, Encoded amino acids, Protein mass and DNA per kDa of protein; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>DNA length</strong> — in bp</li></ul><p>What you get back is DNA mass in kDa, Encoded amino acids, Protein mass in kDa, DNA per kDa of protein in bp, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, DNA length = 3000 bp; the answers are &lt;strong&gt;DNA mass&lt;/strong&gt; = 1950 kDa, &lt;strong&gt;Encoded amino acids&lt;/strong&gt; = 1000, &lt;strong&gt;Protein mass&lt;/strong&gt; = 110 kDa and &lt;strong&gt;DNA per kDa of protein&lt;/strong&gt; = 27.27 bp.</p><ul><li><strong>DNA mass</strong> = 1950 kDa</li><li><strong>Encoded amino acids</strong> = 1000</li><li><strong>Protein mass</strong> = 110 kDa</li><li><strong>DNA per kDa of protein</strong> = 27.27 bp</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>DNA mass</strong> = <code>DNA length × 0.65</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;DNA mass&lt;/strong&gt; = 1950, &lt;strong&gt;Encoded amino acids&lt;/strong&gt; = 1000, &lt;strong&gt;Protein mass&lt;/strong&gt; = 110 and &lt;strong&gt;DNA per kDa of protein&lt;/strong&gt; = 27.27 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: DNA mass takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>DNA mass</strong> = <code>DNA length × 0.65</code></li><li><strong>Encoded amino acids</strong> = <code>DNA length ÷ 3</code></li><li><strong>Protein mass</strong> = <code>DNA length ÷ 3 × 0.11</code></li><li><strong>DNA per kDa of protein</strong> = <code>DNA length ÷ (DNA length ÷ 3 × 0.11)</code></li></ul><p>Any one of DNA mass, Encoded amino acids and Protein mass can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double DNA length from 3000 to 6000, leaving every other box alone. The panel moves from &lt;strong&gt;DNA mass&lt;/strong&gt; 1950 kDa, &lt;strong&gt;Encoded amino acids&lt;/strong&gt; 1000, &lt;strong&gt;Protein mass&lt;/strong&gt; 110 kDa and &lt;strong&gt;DNA per kDa of protein&lt;/strong&gt; 27.27 bp to &lt;strong&gt;DNA mass&lt;/strong&gt; 3900 kDa, &lt;strong&gt;Encoded amino acids&lt;/strong&gt; 2000, &lt;strong&gt;Protein mass&lt;/strong&gt; 220 kDa and &lt;strong&gt;DNA per kDa of protein&lt;/strong&gt; 27.27 bp.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with DNA mass, Encoded amino acids and Protein mass are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in DNA length and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are DNA length and the number you are missing is DNA mass and Encoded amino acids.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/microscope-field-of-view">Microscope Field of View Calculator</a>, <a href="/biology/microscope-magnification">Microscope Magnification Calculator</a> and <a href="/biology/mitotic-index">Mitotic Index Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Base Pair to kDa calculator work out?', 'a' => 'DNA mass, Encoded amino acids, Protein mass and DNA per kDa of protein, from DNA length. The relationship is DNA mass = DNA length × 0.65.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'DNA length (bp). With bp in place, DNA mass can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of DNA mass, Encoded amino acids, Protein mass and DNA per kDa of protein blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            DNA mass = 1950 kDa, Encoded amino acids = 1000, Protein mass = 110 kDa and DNA per kDa of protein = 27.27 bp. Those are the defaults written into the form — move DNA length and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of DNA mass is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave DNA length blank and the page solves for it, reporting DNA mass instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to DNA mass at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/microscope-field-of-view', 'name' => 'Microscope Field of View Calculator'],
            ['path' => '/biology/microscope-magnification', 'name' => 'Microscope Magnification Calculator'],
            ['path' => '/biology/mitotic-index', 'name' => 'Mitotic Index Calculator'],
        ],
        'authors' => [],
    ],
];

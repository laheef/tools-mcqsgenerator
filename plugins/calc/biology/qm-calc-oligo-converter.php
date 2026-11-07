<?php

/**
 * Oligo pmol/µL to µg/mL Converter
 * /biology/oligo-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Oligo pmol/µL to µg/mL Converter',
    'meta' => ['title' => 'Oligo pmol/µL to µg/mL Converter — Formula & Results', 'description' => <<<'TXT'
    Oligo pmol/µL to µg/mL turns Oligo length, Concentration and Concentration into Concentration and Amount in the tube. It is a single relationship that reads…
    TXT, 'h1' => 'Oligo pmol/µL to µg/mL Converter', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Oligo length',
                            'type' => 'number',
                            'suffix' => 'nt',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'pmol_ul',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'pmol/µL',
                            'help' => 'A 100 µM stock is 100 pmol/µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'ug_ml',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'µg/mL',
                            'help' => 'Either this or pmol/µL can be typed',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'um',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'nmol_total',
                            'label' => 'Amount in the tube',
                            'type' => 'number',
                            'suffix' => 'nmol',
                            'help' => 'Fill the volume to get the total',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'water_ul',
                            'label' => 'Water to add for a 100 µM stock',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'help' => 'From the nmol on the tube label',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tube_nmol',
                            'label' => 'Oligo amount on the label',
                            'type' => 'number',
                            'suffix' => 'nmol',
                            'help' => 'Normally printed on the synthesis sheet',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Convert',
            'results' => [
                'um' => 'pmol_ul',
                'ug_ml' => 'pmol_ul*330*length/1000',
                'pmol_ul' => 'ug_ml*1000/(330*length)',
                'nmol_total' => 'pmol_ul/1000*1',
                'water_ul' => 'tube_nmol*10',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Oligo pmol/µL to µg/mL turns Oligo length, Concentration and Concentration into Concentration and Amount in the tube. It is a single relationship that reads Concentration out of Oligo length, not a table of canned results keyed by them. Units for Concentration default to µM and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Oligo pmol/µL to µg/mL calculator works', 'html' => <<<'TXT'
            <p>Oligo pmol/µL to µg/mL answers one question from 4 numbers, and the answer is Concentration, Amount in the tube and Water to add for a 100 µM stock.</p><p>Written with the labels from the form, Concentration = Concentration.</p><p>The answers are Concentration, Amount in the tube and Water to add for a 100 µM stock; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Oligo length</strong> — in nt</li><li><strong>Concentration</strong> — in pmol/µL. A 100 µM stock is 100 pmol/µL</li><li><strong>Concentration</strong> — in µg/mL. Either this or pmol/µL can be typed</li><li><strong>Oligo amount on the label</strong> — in nmol. Normally printed on the synthesis sheet</li></ul><p>The answers come back as Concentration in µM, Amount in the tube in nmol, Water to add for a 100 µM stock in µL. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Oligo length = 20 nt and Oligo amount on the label = 25 nmol gives &lt;strong&gt;Water to add for a 100 µM stock&lt;/strong&gt; = 250 µL.</p><ul><li><strong>Water to add for a 100 µM stock</strong> = 250 µL</li></ul><p>The line behind those figures is <strong>Concentration</strong> = <code>Concentration</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Water to add for a 100 µM stock&lt;/strong&gt; = 250 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Concentration takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Concentration</strong> = <code>Concentration</code></li><li><strong>Amount in the tube</strong> = <code>Concentration ÷ 1000 × 1</code></li><li><strong>Water to add for a 100 µM stock</strong> = <code>Oligo amount on the label × 10</code></li></ul><p>Any one of Concentration, Concentration and Concentration can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Oligo length from 20 to 40, leaving every other box alone. The panel moves from &lt;strong&gt;Water to add for a 100 µM stock&lt;/strong&gt; 250 µL to &lt;strong&gt;Water to add for a 100 µM stock&lt;/strong&gt; 250 µL.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Concentration, Amount in the tube and Water to add for a 100 µM stock are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Oligo length to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Oligo length, Concentration and Concentration and the number you are missing is Concentration and Amount in the tube.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/trihybrid-cross-punnett-square">Trihybrid cross Punnett square Calculator</a>, <a href="/biology/trypan-blue-cell-viability">Trypan Blue Cell Viability Calculator</a> and <a href="/biology/turtle-tank">Turtle tank Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Oligo pmol/µL to µg/mL calculator work out?', 'a' => 'Concentration, Amount in the tube and Water to add for a 100 µM stock, from Concentration. The relationship is Concentration = Concentration.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Oligo length (nt), Concentration (pmol/µL), Concentration (µg/mL), Oligo amount on the label (nmol). Enter length, pmol_ul and ug_ml; Concentration is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Concentration, Concentration, Concentration and Amount in the tube blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Water to add for a 100 µM stock = 250 µL. That comes from the page's own defaults, entered in Oligo length; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Concentration is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Oligo length left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Concentration keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/trihybrid-cross-punnett-square', 'name' => 'Trihybrid cross Punnett square Calculator'],
            ['path' => '/biology/trypan-blue-cell-viability', 'name' => 'Trypan Blue Cell Viability Calculator'],
            ['path' => '/biology/turtle-tank', 'name' => 'Turtle tank Calculator'],
        ],
        'authors' => [],
    ],
];

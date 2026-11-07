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
    'meta' => ['title' => 'Oligo pmol/µL to µg/mL Converter — Formula & Results', 'description' => 'Oligo pmol/µL to µg/mL Converter reports concentration and amount in the tube. Enter oligo length and concentration; the answer follows without a table lookup.', 'h1' => 'Oligo pmol/µL to µg/mL Converter', 'updated' => '2026-10-29'],
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
        Oligo pmol/µL to µg/mL turns Oligo length and Oligo amount on the label into Concentration and Amount in the tube. It is a single relationship that reads concentration out of oligo length, not a table of canned results keyed by them. Units for Concentration default to µM and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Oligo pmol/µL to µg/mL calculator works', 'html' => <<<'TXT'
            <p>Oligo pmol/µL to µg/mL answers one question from 4 numbers, and the answer is Concentration, Amount in the tube and Water to add for a 100 µM stock.</p><p>Written with the labels from the form, Concentration = Concentration.</p><p>The answers are Concentration, Amount in the tube and Water to add for a 100 µM stock; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Oligo length</strong> — in nt</li><li><strong>Concentration</strong> — in pmol/µL. A 100 µM stock is 100 pmol/µL</li><li><strong>Concentration</strong> — in µg/mL. Either this or pmol/µL can be typed</li><li><strong>Oligo amount on the label</strong> — in nmol. Normally printed on the synthesis sheet</li></ul><p>The answers come back as Concentration in µM, Amount in the tube in nmol, Water to add for a 100 µM stock in µL. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Oligo length = 20 nt and Oligo amount on the label = 25 nmol gives <strong>Water to add for a 100 µM stock</strong> = 250 µL.</p><ul><li><strong>Water to add for a 100 µM stock</strong> = 250 µL</li></ul><p>The line behind those figures is <strong>Concentration</strong> = <code>Concentration</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Water to add for a 100 µM stock</strong> = 250 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Concentration takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Concentration</strong> = <code>Concentration</code></li><li><strong>Amount in the tube</strong> = <code>Concentration ÷ 1000 × 1</code></li><li><strong>Water to add for a 100 µM stock</strong> = <code>Oligo amount on the label × 10</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Concentration</strong> = <code>Concentration</code> — the form to use when Concentration are the values you have.</li><li><strong>Concentration</strong> = <code>Concentration × 330 × Oligo length ÷ 1000</code> — the form to use when Concentration and Oligo length are the values you have.</li><li><strong>Concentration</strong> = <code>Concentration × 1000 ÷ (330 × Oligo length)</code> — the form to use when Concentration and Oligo length are the values you have.</li><li><strong>Amount in the tube</strong> = <code>Concentration ÷ 1000 × 1</code> — the form to use when Concentration are the values you have.</li><li><strong>Water to add for a 100 µM stock</strong> = <code>Oligo amount on the label × 10</code> — the form to use when Oligo amount on the label are the values you have.</li></ul><p>Any one of Concentration, Concentration and Concentration can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Oligo length from 20 to 40, leaving every other box alone. The panel moves from <strong>Water to add for a 100 µM stock</strong> 250 µL to <strong>Water to add for a 100 µM stock</strong> 250 µL.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Concentration, Amount in the tube and Water to add for a 100 µM stock are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Oligo length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Oligo length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Concentration left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Concentration is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Concentration left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Concentration is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Oligo length to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Oligo length</strong> is measured in nt. It feeds Concentration and Concentration. Have it to hand before you start: Oligo length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Concentration</strong> is measured in pmol/µL. A 100 µM stock is 100 pmol/µL. It feeds Concentration, Concentration and Amount in the tube. Have it to hand before you start: Concentration is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Concentration</strong> is measured in µg/mL. Either this or pmol/µL can be typed. It feeds Concentration. Have it to hand before you start: Concentration is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Oligo amount on the label</strong> is measured in nmol. Normally printed on the synthesis sheet. It feeds Water to add for a 100 µM stock. Have it to hand before you start: Oligo amount on the label is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Concentration</strong> is a plain number. The value follows from Concentration. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Amount in the tube</strong> is a plain number. The value follows from Concentration. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Water to add for a 100 µM stock</strong> is a plain number and the page's own defaults put it at 250. The value follows from Oligo amount on the label. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Water to add for a 100 µM stock</th></tr></thead><tbody><tr><td><strong>Oligo length</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Oligo amount on the label</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Oligo amount on the label sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Oligo length barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Oligo length = 10 nt and Oligo amount on the label = 12.5 nmol, the answer is <strong>Water to add for a 100 µM stock</strong> = 125 µL.</li><li>With Oligo length = 60 nt and Oligo amount on the label = 25 nmol, the answer is <strong>Water to add for a 100 µM stock</strong> = 250 µL.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Concentration follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Oligo length, Concentration and Concentration are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Oligo length, Concentration and Concentration and the number you are missing is Concentration and Amount in the tube.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/trihybrid-cross-punnett-square">Trihybrid cross Punnett square Calculator</a>, <a href="/biology/trypan-blue-cell-viability">Trypan Blue Cell Viability Calculator</a> and <a href="/biology/turtle-tank">Turtle tank Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Oligo pmol/µL to µg/mL calculator work out?', 'a' => 'Concentration, Amount in the tube and Water to add for a 100 µM stock, from Concentration. The relationship is Concentration = Concentration.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Oligo length (nt), Concentration (pmol/µL), Concentration (µg/mL), Oligo amount on the label (nmol). Enter oligo length, concentration and concentration; Concentration is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Concentration, Concentration, Concentration and Amount in the tube blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Water to add for a 100 µM stock = 250 µL. That comes from the page's own defaults, entered in Oligo length; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Concentration is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
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

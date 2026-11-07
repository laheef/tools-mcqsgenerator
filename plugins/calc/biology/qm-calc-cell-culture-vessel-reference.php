<?php

/**
 * Cell Culture Dish / Plate / Flask Reference
 * /biology/cell-culture-vessel-reference
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell Culture Dish / Plate / Flask Reference',
    'meta' => ['title' => 'Cell Culture Dish / Plate / Flask Reference', 'description' => 'Every plasticware format has a growth area, a working volume and a recommended cell number, and mixing them up is a classic source of inconsistent experiments', 'h1' => 'Cell Culture Dish / Plate / Flask Reference', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'vessel',
                            'label' => 'Format',
                            'type' => 'select',
                            'options' => [
                                'T25 flask' => '25',
                                'T75 flask' => '75',
                                'T175 flask' => '175',
                                '35 mm dish' => '8',
                                '60 mm dish' => '21',
                                '100 mm dish' => '55',
                                '6-well plate (per well)' => '9.6',
                                '12-well plate (per well)' => '3.8',
                                '24-well plate (per well)' => '1.9',
                                '96-well plate (per well)' => '0.32',
                            ],
                            'control' => 'SELECT',
                            'default' => 'T75 flask',
                        ],
                        [
                            'name' => 'factor',
                            'label' => 'Number of vessels',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'medium_per_cm2',
                            'label' => 'Medium per cm²',
                            'type' => 'number',
                            'suffix' => 'mL/cm²',
                            'help' => '0.15–0.25 mL/cm² is the usual range',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.2',
                        ],
                        [
                            'name' => 'target',
                            'label' => 'Target seeding density',
                            'type' => 'number',
                            'suffix' => 'cells/cm²',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20000',
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Growth area',
                            'type' => 'number',
                            'suffix' => 'cm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'medium',
                            'label' => 'Medium per vessel',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cells',
                            'label' => 'Cells per vessel at that density',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_area',
                            'label' => 'Total growth area',
                            'type' => 'number',
                            'suffix' => 'cm²',
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
            'title' => 'Vessel',
            'results' => ['area' => 'vessel', 'medium' => 'vessel*medium_per_cm2', 'cells' => 'vessel*target', 'total_area' => 'vessel*factor'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cell Culture Dish / Plate / Flask Reference takes Format, Number of vessels and Medium per cm² and returns Growth area and Medium per vessel. It is a single relationship that reads Growth area out of Format, not a table of canned results keyed by them. Units for Growth area default to cm² and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Cell Culture Dish / Plate / Flask Reference calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Cell Culture Dish / Plate / Flask Reference: it takes 4 numbers and reports Growth area, Medium per vessel and Cells per vessel at that density.</p><p>The relationship it solves reads Growth area = Format.</p><p>The result panel carries Growth area, Medium per vessel, Cells per vessel at that density and Total growth area, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Format</strong> — a plain number, no unit</li><li><strong>Number of vessels</strong> — a plain number, no unit</li><li><strong>Medium per cm²</strong> — in mL/cm². 0.15–0.25 mL/cm² is the usual range</li><li><strong>Target seeding density</strong> — in cells/cm²</li></ul><p>The result boxes are Growth area in cm², Medium per vessel in mL, Cells per vessel at that density in cells, Total growth area in cm²; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Format = 75, Number of vessels = 1, Medium per cm² = 0.2 mL/cm² and Target seeding density = 20000 cells/cm² gives &lt;strong&gt;Growth area&lt;/strong&gt; = 75 cm², &lt;strong&gt;Medium per vessel&lt;/strong&gt; = 15 mL, &lt;strong&gt;Cells per vessel at that density&lt;/strong&gt; = 1.500e+6 cells and &lt;strong&gt;Total growth area&lt;/strong&gt; = 75 cm².</p><ul><li><strong>Growth area</strong> = 75 cm²</li><li><strong>Medium per vessel</strong> = 15 mL</li><li><strong>Cells per vessel at that density</strong> = 1.500e+6 cells</li><li><strong>Total growth area</strong> = 75 cm²</li></ul><p>That is <strong>Growth area</strong> = <code>Format</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Growth area&lt;/strong&gt; = 75, &lt;strong&gt;Medium per vessel&lt;/strong&gt; = 15, &lt;strong&gt;Cells per vessel at that density&lt;/strong&gt; = 1.500e+6 and &lt;strong&gt;Total growth area&lt;/strong&gt; = 75 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Growth area takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Growth area</strong> = <code>Format</code></li><li><strong>Medium per vessel</strong> = <code>Format × Medium per cm²</code></li><li><strong>Cells per vessel at that density</strong> = <code>Format × Target seeding density</code></li><li><strong>Total growth area</strong> = <code>Format × Number of vessels</code></li></ul><p>Any one of Growth area, Medium per vessel and Cells per vessel at that density can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Format from 75 to 150, leaving every other box alone. The panel moves from &lt;strong&gt;Growth area&lt;/strong&gt; 75 cm², &lt;strong&gt;Medium per vessel&lt;/strong&gt; 15 mL, &lt;strong&gt;Cells per vessel at that density&lt;/strong&gt; 1.500e+6 cells and &lt;strong&gt;Total growth area&lt;/strong&gt; 75 cm² to &lt;strong&gt;Growth area&lt;/strong&gt; 150 cm², &lt;strong&gt;Medium per vessel&lt;/strong&gt; 30 mL, &lt;strong&gt;Cells per vessel at that density&lt;/strong&gt; 3.000e+6 cells and &lt;strong&gt;Total growth area&lt;/strong&gt; 150 cm².</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Growth area, Medium per vessel and Cells per vessel at that density are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Format is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Format, Number of vessels and Medium per cm² and the number you are missing is Growth area and Medium per vessel.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/punnett-square">Punnett square Calculator</a>, <a href="/biology/puppy-adult-weight-predictor">Puppy Adult Weight Predictor Calculator</a> and <a href="/biology/q10-temperature-coefficient">Q10 Temperature Coefficient Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cell Culture Dish / Plate / Flask Reference calculator work out?', 'a' => 'Growth area, Medium per vessel, Cells per vessel at that density and Total growth area, from Format. The relationship is Growth area = Format.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Format, Number of vessels, Medium per cm² (mL/cm²), Target seeding density (cells/cm²). With vessel, factor and medium_per_cm2 in place, Growth area can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Growth area, Medium per vessel, Cells per vessel at that density and Total growth area blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Growth area = 75 cm², Medium per vessel = 15 mL, Cells per vessel at that density = 1.500e+6 cells and Total growth area = 75 cm². Those are the defaults written into the form — move Format and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Growth area is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Format left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Growth area at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/punnett-square', 'name' => 'Punnett square Calculator'],
            ['path' => '/biology/puppy-adult-weight-predictor', 'name' => 'Puppy Adult Weight Predictor Calculator'],
            ['path' => '/biology/q10-temperature-coefficient', 'name' => 'Q10 Temperature Coefficient Calculator'],
        ],
        'authors' => [],
    ],
];

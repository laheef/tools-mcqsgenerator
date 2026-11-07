<?php

/**
 * Cell Counting Calculator
 * /biology/cell-counting-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell Counting Calculator',
    'meta' => ['title' => 'Cell Counting Calculator — Formula & Results', 'description' => 'Cell Counting turns Cells counted, Squares counted and Dilution factor into Concentration and Total cells available. It is a single relationship that reads…', 'h1' => 'Cell Counting Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'cells_counted',
                            'label' => 'Cells counted',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '340',
                        ],
                        [
                            'name' => 'squares',
                            'label' => 'Squares counted',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Dilution factor',
                            'type' => 'number',
                            'suffix' => '×',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Suspension volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'target',
                            'label' => 'Cells needed',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'help' => 'For the next flask or plate',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2000000',
                        ],
                        [
                            'name' => 'conc',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total cells available',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'take',
                            'label' => 'Volume to take',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'vessels',
                            'label' => 'Wells at 100 000 per well',
                            'type' => 'number',
                            'suffix' => 'wells',
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
            'title' => 'Counting',
            'results' => ['conc' => 'cells_counted/squares*dilution*10000', 'total' => 'cells_counted/squares*dilution*10000*volume', 'take' => 'target/(cells_counted/squares*dilution*10000)', 'vessels' => 'cells_counted/squares*dilution*10000*volume/100000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cell Counting turns Cells counted, Squares counted and Dilution factor into Concentration and Total cells available. It is a single relationship that reads Concentration out of Cells counted, not a table of canned results keyed by them. Units for Concentration default to cells/mL and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Cell Counting calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Cell Counting: it takes 5 numbers and reports Concentration, Total cells available and Volume to take.</p><p>Written with the labels from the form, Concentration = Cells counted ÷ Squares counted × Dilution factor × 10000.</p><p>What comes back is Concentration, Total cells available, Volume to take and Wells at 100 000 per well — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Cells counted</strong> — in cells</li><li><strong>Squares counted</strong> — a plain number, no unit</li><li><strong>Dilution factor</strong> — in ×</li><li><strong>Suspension volume</strong> — in mL</li><li><strong>Cells needed</strong> — in cells. For the next flask or plate</li></ul><p>The answers come back as Concentration in cells/mL, Total cells available in cells, Volume to take in mL, Wells at 100 000 per well in wells. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Cells counted = 340 cells, Squares counted = 4, Dilution factor = 1 ×, Suspension volume = 12 mL and Cells needed = 2.000e+6 cells gives &lt;strong&gt;Concentration&lt;/strong&gt; = 850000 cells/mL, &lt;strong&gt;Total cells available&lt;/strong&gt; = 1.020e+7 cells, &lt;strong&gt;Volume to take&lt;/strong&gt; = 2.35 mL and &lt;strong&gt;Wells at 100 000 per well&lt;/strong&gt; = 102 wells.</p><ul><li><strong>Concentration</strong> = 850000 cells/mL</li><li><strong>Total cells available</strong> = 1.020e+7 cells</li><li><strong>Volume to take</strong> = 2.35 mL</li><li><strong>Wells at 100 000 per well</strong> = 102 wells</li></ul><p>That is <strong>Concentration</strong> = <code>Cells counted ÷ Squares counted × Dilution factor × 10000</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Concentration&lt;/strong&gt; = 850000, &lt;strong&gt;Total cells available&lt;/strong&gt; = 1.020e+7, &lt;strong&gt;Volume to take&lt;/strong&gt; = 2.35 and &lt;strong&gt;Wells at 100 000 per well&lt;/strong&gt; = 102 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Concentration takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Concentration</strong> = <code>Cells counted ÷ Squares counted × Dilution factor × 10000</code></li><li><strong>Total cells available</strong> = <code>Cells counted ÷ Squares counted × Dilution factor × 10000 × Suspension volume</code></li><li><strong>Volume to take</strong> = <code>Cells needed ÷ (Cells counted ÷ Squares counted × Dilution factor × 10000)</code></li><li><strong>Wells at 100 000 per well</strong> = <code>Cells counted ÷ Squares counted × Dilution factor × 10000 × Suspension volume ÷ 100000</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Concentration, Total cells available and Volume to take can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Cells counted from 340 to 680, leaving every other box alone. The panel moves from &lt;strong&gt;Concentration&lt;/strong&gt; 850000 cells/mL, &lt;strong&gt;Total cells available&lt;/strong&gt; 1.020e+7 cells, &lt;strong&gt;Volume to take&lt;/strong&gt; 2.35 mL and &lt;strong&gt;Wells at 100 000 per well&lt;/strong&gt; 102 wells to &lt;strong&gt;Concentration&lt;/strong&gt; 1.700e+6 cells/mL, &lt;strong&gt;Total cells available&lt;/strong&gt; 2.040e+7 cells, &lt;strong&gt;Volume to take&lt;/strong&gt; 1.18 mL and &lt;strong&gt;Wells at 100 000 per well&lt;/strong&gt; 204 wells.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Concentration, Total cells available and Volume to take are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Cells counted to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Cells counted, Squares counted and Dilution factor measured, Concentration and Total cells available wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/linkage-disequilibrium">Linkage Disequilibrium Calculator</a>, <a href="/biology/livestock-fence">Livestock fence cost Calculator</a> and <a href="/biology/livestock-water-requirement">Livestock Water Requirement Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cell Counting calculator work out?', 'a' => <<<'TXT'
            Concentration, Total cells available, Volume to take and Wells at 100 000 per well, from Cells counted, Squares counted and Dilution factor. The relationship is Concentration = Cells counted ÷ Squares counted × Dilution factor × 10000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cells counted (cells), Squares counted, Dilution factor (×), Suspension volume (mL), Cells needed (cells). Enter cells_counted, squares and dilution; Concentration is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Concentration, Total cells available, Volume to take and Wells at 100 000 per well can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Concentration = 850000 cells/mL, Total cells available = 1.020e+7 cells, Volume to take = 2.35 mL and Wells at 100 000 per well = 102 wells. The figures come from Cells counted as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Concentration is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Cells counted blank and the page solves for it, reporting Concentration instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Concentration keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/linkage-disequilibrium', 'name' => 'Linkage Disequilibrium Calculator'],
            ['path' => '/biology/livestock-fence', 'name' => 'Livestock fence cost Calculator'],
            ['path' => '/biology/livestock-water-requirement', 'name' => 'Livestock Water Requirement Calculator'],
        ],
        'authors' => [],
    ],
];

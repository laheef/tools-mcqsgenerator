<?php

/**
 * OD600 to Cell Density Calculator
 * /biology/od600-to-cell-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'OD600 to Cell Density Calculator',
    'meta' => ['title' => 'OD600 to Cell Density Calculator — Formula & Results', 'description' => 'OD600 is the fastest way to follow a bacterial culture, but it is an optical reading, not a cell count. Free od600 to cell density calculator: enter your valu', 'h1' => 'OD600 to Cell Density Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'od',
                            'label' => 'OD600 reading',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.45',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Dilution before reading',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '10 if you diluted 1:10',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'factor',
                            'label' => 'Cells/mL per OD unit',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'help' => '8×10⁸ for E. coli, 3×10⁷ for yeast',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '800000000',
                        ],
                        [
                            'name' => 'dcw_factor',
                            'label' => 'Dry cell weight per OD unit',
                            'type' => 'number',
                            'suffix' => 'g/L',
                            'help' => 'About 0.4–0.5 g/L per OD for E. coli',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.4',
                        ],
                        [
                            'name' => 'cells',
                            'label' => 'Cell density',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dcw',
                            'label' => 'Dry cell weight',
                            'type' => 'number',
                            'suffix' => 'g/L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'od_corrected',
                            'label' => 'Corrected OD600',
                            'type' => 'number',
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
            'title' => 'Conversion',
            'results' => ['od_corrected' => 'od*dilution', 'cells' => 'od*dilution*factor', 'dcw' => 'od*dilution*dcw_factor'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        OD600 to Cell Density takes OD600 reading, Dilution before reading and Cells/mL per OD unit and returns Cell density and Dry cell weight. It is a single relationship that reads Cell density out of OD600 reading, not a table of canned results keyed by them. Units for Cell density default to cells/mL and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the OD600 to Cell Density calculator works', 'html' => <<<'TXT'
            <p>OD600 to Cell Density answers one question from 4 numbers, and the answer is Cell density, Dry cell weight and Corrected OD600.</p><p>In the form&#039;s own words, Corrected OD600 = OD600 reading × Dilution before reading.</p><p>The answers are Cell density, Dry cell weight and Corrected OD600; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>OD600 reading</strong> — a plain number, no unit</li><li><strong>Dilution before reading</strong> — in ×. 10 if you diluted 1:10</li><li><strong>Cells/mL per OD unit</strong> — in cells/mL. 8×10⁸ for E. coli, 3×10⁷ for yeast</li><li><strong>Dry cell weight per OD unit</strong> — in g/L. About 0.4–0.5 g/L per OD for E. coli</li></ul><p>The answers come back as Cell density in cells/mL, Dry cell weight in g/L, Corrected OD600. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — OD600 reading = 0.45, Dilution before reading = 1 ×, Cells/mL per OD unit = 8.000e+8 cells/mL and Dry cell weight per OD unit = 0.4 g/L — through the same formula and the panel reports &lt;strong&gt;Corrected OD600&lt;/strong&gt; = 0.45, &lt;strong&gt;Cell density&lt;/strong&gt; = 3.600e+8 cells/mL and &lt;strong&gt;Dry cell weight&lt;/strong&gt; = 0.18 g/L.</p><ul><li><strong>Corrected OD600</strong> = 0.45</li><li><strong>Cell density</strong> = 3.600e+8 cells/mL</li><li><strong>Dry cell weight</strong> = 0.18 g/L</li></ul><p>The line behind those figures is <strong>Corrected OD600</strong> = <code>OD600 reading × Dilution before reading</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Corrected OD600&lt;/strong&gt; = 0.45, &lt;strong&gt;Cell density&lt;/strong&gt; = 3.600e+8 and &lt;strong&gt;Dry cell weight&lt;/strong&gt; = 0.18 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Cell density takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Corrected OD600</strong> = <code>OD600 reading × Dilution before reading</code></li><li><strong>Cell density</strong> = <code>OD600 reading × Dilution before reading × Cells/mL per OD unit</code></li><li><strong>Dry cell weight</strong> = <code>OD600 reading × Dilution before reading × Dry cell weight per OD unit</code></li></ul><p>Any one of Corrected OD600, Cell density and Dry cell weight can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double OD600 reading from 0.45 to 0.9, leaving every other box alone. The panel moves from &lt;strong&gt;Corrected OD600&lt;/strong&gt; 0.45, &lt;strong&gt;Cell density&lt;/strong&gt; 3.600e+8 cells/mL and &lt;strong&gt;Dry cell weight&lt;/strong&gt; 0.18 g/L to &lt;strong&gt;Corrected OD600&lt;/strong&gt; 0.9, &lt;strong&gt;Cell density&lt;/strong&gt; 7.200e+8 cells/mL and &lt;strong&gt;Dry cell weight&lt;/strong&gt; 0.36 g/L.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Cell density, Dry cell weight and Corrected OD600 are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If OD600 reading is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are OD600 reading, Dilution before reading and Cells/mL per OD unit and the number you are missing is Cell density and Dry cell weight.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/biodiversity-index">Biodiversity Index (Simpson) Calculator</a>, <a href="/biology/bird-age">Bird age</a> and <a href="/biology/bod-load">BOD Load Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the OD600 to Cell Density calculator work out?', 'a' => <<<'TXT'
            Cell density, Dry cell weight and Corrected OD600, from OD600 reading and Dilution before reading. The relationship is Corrected OD600 = OD600 reading × Dilution before reading.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            OD600 reading, Dilution before reading (×), Cells/mL per OD unit (cells/mL), Dry cell weight per OD unit (g/L). With od, dilution and factor in place, Cell density can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Corrected OD600, Cell density and Dry cell weight blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Corrected OD600 = 0.45, Cell density = 3.600e+8 cells/mL and Dry cell weight = 0.18 g/L. Those are the defaults written into the form — move OD600 reading and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Cell density is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With OD600 reading left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Cell density keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/biodiversity-index', 'name' => 'Biodiversity Index (Simpson) Calculator'],
            ['path' => '/biology/bird-age', 'name' => 'Bird age'],
            ['path' => '/biology/bod-load', 'name' => 'BOD Load Calculator'],
        ],
        'authors' => [],
    ],
];

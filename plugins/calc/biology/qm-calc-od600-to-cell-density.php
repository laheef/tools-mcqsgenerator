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
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>OD600 reading</strong> — a plain number, no unit</li><li><strong>Dilution before reading</strong> — in ×. 10 if you diluted 1:10</li><li><strong>Cells/mL per OD unit</strong> — in cells/mL. 8×10⁸ for E. coli, 3×10⁷ for yeast</li><li><strong>Dry cell weight per OD unit</strong> — in g/L. About 0.4–0.5 g/L per OD for E. coli</li></ul><p>The answers come back as Cell density in cells/mL, Dry cell weight in g/L, Corrected OD600. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — OD600 reading = 0.45, Dilution before reading = 1 ×, Cells/mL per OD unit = 8.000e+8 cells/mL and Dry cell weight per OD unit = 0.4 g/L — through the same formula and the panel reports &lt;strong&gt;Corrected OD600&lt;/strong&gt; = 0.45, &lt;strong&gt;Cell density&lt;/strong&gt; = 3.600e+8 cells/mL and &lt;strong&gt;Dry cell weight&lt;/strong&gt; = 0.18 g/L.</p><ul><li><strong>Corrected OD600</strong> = 0.45</li><li><strong>Cell density</strong> = 3.600e+8 cells/mL</li><li><strong>Dry cell weight</strong> = 0.18 g/L</li></ul><p>The line behind those figures is <strong>Corrected OD600</strong> = <code>OD600 reading × Dilution before reading</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Corrected OD600&lt;/strong&gt; = 0.45, &lt;strong&gt;Cell density&lt;/strong&gt; = 3.600e+8 and &lt;strong&gt;Dry cell weight&lt;/strong&gt; = 0.18 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Cell density takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Corrected OD600</strong> = <code>OD600 reading × Dilution before reading</code></li><li><strong>Cell density</strong> = <code>OD600 reading × Dilution before reading × Cells/mL per OD unit</code></li><li><strong>Dry cell weight</strong> = <code>OD600 reading × Dilution before reading × Dry cell weight per OD unit</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Corrected OD600</strong> = <code>OD600 reading × Dilution before reading</code> — the form to use when OD600 reading and Dilution before reading are the values you have.</li><li><strong>Cell density</strong> = <code>OD600 reading × Dilution before reading × Cells/mL per OD unit</code> — the form to use when OD600 reading, Dilution before reading and Cells/mL per OD unit are the values you have.</li><li><strong>Dry cell weight</strong> = <code>OD600 reading × Dilution before reading × Dry cell weight per OD unit</code> — the form to use when OD600 reading, Dilution before reading and Dry cell weight per OD unit are the values you have.</li></ul><p>Any one of Corrected OD600, Cell density and Dry cell weight can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double OD600 reading from 0.45 to 0.9, leaving every other box alone. The panel moves from &lt;strong&gt;Corrected OD600&lt;/strong&gt; 0.45, &lt;strong&gt;Cell density&lt;/strong&gt; 3.600e+8 cells/mL and &lt;strong&gt;Dry cell weight&lt;/strong&gt; 0.18 g/L to &lt;strong&gt;Corrected OD600&lt;/strong&gt; 0.9, &lt;strong&gt;Cell density&lt;/strong&gt; 7.200e+8 cells/mL and &lt;strong&gt;Dry cell weight&lt;/strong&gt; 0.36 g/L.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Cell density, Dry cell weight and Corrected OD600 are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>OD600 reading left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If OD600 reading is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Dilution before reading left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Dilution before reading is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Cells/mL per OD unit left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cells/mL per OD unit is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If OD600 reading is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>OD600 reading</strong> takes a plain number with no unit attached. The page reads it when it works out Corrected OD600, Cell density and Dry cell weight. Have it to hand before you start: OD600 reading is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Dilution before reading</strong> is measured in ×. 10 if you diluted 1:10. The page reads it when it works out Corrected OD600, Cell density and Dry cell weight. Have it to hand before you start: Dilution before reading is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Cells/mL per OD unit</strong> is measured in cells/mL. 8×10⁸ for E. coli, 3×10⁷ for yeast. The page reads it when it works out Cell density. Have it to hand before you start: Cells/mL per OD unit is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Dry cell weight per OD unit</strong> is measured in g/L. About 0.4–0.5 g/L per OD for E. coli. The page reads it when it works out Dry cell weight. Have it to hand before you start: Dry cell weight per OD unit is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Cell density</strong> is a plain number and the page's own defaults put it at 3.600e+8. The value follows from OD600 reading, Dilution before reading and Cells/mL per OD unit. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Dry cell weight</strong> is a plain number and the page's own defaults put it at 0.18. The value follows from OD600 reading, Dilution before reading and Dry cell weight per OD unit. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Corrected OD600</strong> is a plain number and the page's own defaults put it at 0.45. The value follows from OD600 reading and Dilution before reading. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Corrected OD600</th><th>Cell density</th><th>Dry cell weight</th></tr></thead><tbody><tr><td><strong>OD600 reading</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Dilution before reading</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Cells/mL per OD unit</strong> +10%</td><td>+0%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Dry cell weight per OD unit</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, OD600 reading sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With OD600 reading = 0.225, Dilution before reading = 0.5 ×, Cells/mL per OD unit = 4.000e+8 cells/mL and Dry cell weight per OD unit = 0.2 g/L, the answer is <strong>Corrected OD600</strong> = 0.1125, <strong>Cell density</strong> = 4.500e+7 cells/mL and <strong>Dry cell weight</strong> = 0.0225 g/L.</li><li>With OD600 reading = 1.35, Dilution before reading = 1 ×, Cells/mL per OD unit = 8.000e+8 cells/mL and Dry cell weight per OD unit = 0.4 g/L, the answer is <strong>Corrected OD600</strong> = 1.35, <strong>Cell density</strong> = 1.080e+9 cells/mL and <strong>Dry cell weight</strong> = 0.54 g/L.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Cell density follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
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

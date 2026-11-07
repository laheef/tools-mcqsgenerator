<?php

/**
 * Hemocytometer Cell Counter (cells/mL)
 * /biology/hemocytometer-cell-counter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hemocytometer Cell Counter (cells/mL)',
    'meta' => ['title' => 'Hemocytometer Cell Counter (cells/mL) Calculator', 'description' => 'Hemocytometer Cell Counter (cells/mL) takes Total cells counted, Squares counted and Dilution factor and returns Cell concentration and Cell concentration.', 'h1' => 'Hemocytometer Cell Counter (cells/mL)', 'updated' => '2026-10-29'],
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
                            'label' => 'Total cells counted',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'help' => 'Live plus dead, over all squares counted',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '320',
                        ],
                        [
                            'name' => 'squares',
                            'label' => 'Squares counted',
                            'type' => 'number',
                            'help' => 'Usually the four corner squares',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Dilution factor',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '2 for a 1:1 mix with trypan blue',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Suspension volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'help' => 'Used for the total yield',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'conc',
                            'label' => 'Cell concentration',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_ul',
                            'label' => 'Cell concentration',
                            'type' => 'number',
                            'suffix' => 'cells/µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_cells',
                            'label' => 'Total cells in the suspension',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'million',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => '×10⁶/mL',
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
            'title' => 'Concentration',
            'results' => ['conc' => 'cells_counted/squares*dilution*10000', 'per_ul' => 'cells_counted/squares*dilution*10', 'total_cells' => 'cells_counted/squares*dilution*10000*volume', 'million' => 'cells_counted/squares*dilution*10000/1000000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Hemocytometer Cell Counter (cells/mL) takes Total cells counted, Squares counted and Dilution factor and returns Cell concentration and Cell concentration. It is a single relationship that reads Cell concentration out of Total cells counted, not a table of canned results keyed by them. Units for Cell concentration default to cells/mL and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Hemocytometer Cell Counter (cells/mL) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Hemocytometer Cell Counter (cells/mL): it takes 4 numbers and reports Cell concentration, Cell concentration and Total cells in the suspension.</p><p>In the form&#039;s own words, Cell concentration = Total cells counted ÷ Squares counted × Dilution factor × 10000.</p><p>The answers are Cell concentration, Cell concentration, Total cells in the suspension and Concentration; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Total cells counted</strong> — in cells. Live plus dead, over all squares counted</li><li><strong>Squares counted</strong> — a plain number, no unit. Usually the four corner squares</li><li><strong>Dilution factor</strong> — in ×. 2 for a 1:1 mix with trypan blue</li><li><strong>Suspension volume</strong> — in mL. Used for the total yield</li></ul><p>The answers come back as Cell concentration in cells/mL, Cell concentration in cells/µL, Total cells in the suspension in cells, Concentration in ×10⁶/mL. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Total cells counted = 320 cells, Squares counted = 4, Dilution factor = 2 × and Suspension volume = 10 mL — through the same formula and the panel reports &lt;strong&gt;Cell concentration&lt;/strong&gt; = 1.600e+6 cells/mL, &lt;strong&gt;Cell concentration&lt;/strong&gt; = 1600 cells/µL, &lt;strong&gt;Total cells in the suspension&lt;/strong&gt; = 1.600e+7 cells and &lt;strong&gt;Concentration&lt;/strong&gt; = 1.6 ×10⁶/mL.</p><ul><li><strong>Cell concentration</strong> = 1.600e+6 cells/mL</li><li><strong>Cell concentration</strong> = 1600 cells/µL</li><li><strong>Total cells in the suspension</strong> = 1.600e+7 cells</li><li><strong>Concentration</strong> = 1.6 ×10⁶/mL</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Cell concentration</strong> = <code>Total cells counted ÷ Squares counted × Dilution factor × 10000</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Cell concentration&lt;/strong&gt; = 1.600e+6, &lt;strong&gt;Cell concentration&lt;/strong&gt; = 1600, &lt;strong&gt;Total cells in the suspension&lt;/strong&gt; = 1.600e+7 and &lt;strong&gt;Concentration&lt;/strong&gt; = 1.6 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Cell concentration takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Cell concentration</strong> = <code>Total cells counted ÷ Squares counted × Dilution factor × 10000</code></li><li><strong>Total cells in the suspension</strong> = <code>Total cells counted ÷ Squares counted × Dilution factor × 10000 × Suspension volume</code></li><li><strong>Concentration</strong> = <code>Total cells counted ÷ Squares counted × Dilution factor × 10000 ÷ 1000000</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Cell concentration</strong> = <code>Total cells counted ÷ Squares counted × Dilution factor × 10000</code> — the form to use when Total cells counted, Squares counted and Dilution factor are the values you have.</li><li><strong>Cell concentration</strong> = <code>Total cells counted ÷ Squares counted × Dilution factor × 10</code> — the form to use when Total cells counted, Squares counted and Dilution factor are the values you have.</li><li><strong>Total cells in the suspension</strong> = <code>Total cells counted ÷ Squares counted × Dilution factor × 10000 × Suspension volume</code> — the form to use when Total cells counted, Squares counted, Dilution factor and Suspension volume are the values you have.</li><li><strong>Concentration</strong> = <code>Total cells counted ÷ Squares counted × Dilution factor × 10000 ÷ 1000000</code> — the form to use when Total cells counted, Squares counted and Dilution factor are the values you have.</li></ul><p>Any one of Cell concentration, Cell concentration and Total cells in the suspension can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Total cells counted from 320 to 640, leaving every other box alone. The panel moves from &lt;strong&gt;Cell concentration&lt;/strong&gt; 1.600e+6 cells/mL, &lt;strong&gt;Cell concentration&lt;/strong&gt; 1600 cells/µL, &lt;strong&gt;Total cells in the suspension&lt;/strong&gt; 1.600e+7 cells and &lt;strong&gt;Concentration&lt;/strong&gt; 1.6 ×10⁶/mL to &lt;strong&gt;Cell concentration&lt;/strong&gt; 3.200e+6 cells/mL, &lt;strong&gt;Cell concentration&lt;/strong&gt; 3200 cells/µL, &lt;strong&gt;Total cells in the suspension&lt;/strong&gt; 3.200e+7 cells and &lt;strong&gt;Concentration&lt;/strong&gt; 3.2 ×10⁶/mL.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Cell concentration, Cell concentration and Total cells in the suspension are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Total cells counted left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total cells counted is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Squares counted left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Squares counted is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Dilution factor left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Dilution factor is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Total cells counted to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Hemocytometer Cell Counter (cells/mL) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Total cells counted</strong> is measured in cells. Live plus dead, over all squares counted. The page reads it when it works out Cell concentration, Cell concentration and Total cells in the suspension. Fill it from a measurement rather than a memory — Total cells counted is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Squares counted</strong> takes a plain number with no unit attached. Usually the four corner squares. The page reads it when it works out Cell concentration, Cell concentration and Total cells in the suspension. Fill it from a measurement rather than a memory — Squares counted is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Dilution factor</strong> is measured in ×. 2 for a 1:1 mix with trypan blue. The page reads it when it works out Cell concentration, Cell concentration and Total cells in the suspension. Fill it from a measurement rather than a memory — Dilution factor is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Suspension volume</strong> is measured in mL. Used for the total yield. The page reads it when it works out Total cells in the suspension. Fill it from a measurement rather than a memory — Suspension volume is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Cell concentration</strong> is a plain number and the page's own defaults put it at 1.600e+6. It is worked out from Total cells counted, Squares counted and Dilution factor. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Cell concentration</strong> is a plain number and the page's own defaults put it at 1600. It is worked out from Total cells counted, Squares counted and Dilution factor. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total cells in the suspension</strong> is a plain number and the page's own defaults put it at 1.600e+7. It is worked out from Total cells counted, Squares counted, Dilution factor and Suspension volume. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Concentration</strong> is a plain number and the page's own defaults put it at 1.6. It is worked out from Total cells counted, Squares counted and Dilution factor. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Cell concentration</th><th>Cell concentration</th><th>Total cells in the suspension</th><th>Concentration</th></tr></thead><tbody><tr><td><strong>Total cells counted</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Squares counted</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td></tr><tr><td><strong>Dilution factor</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Suspension volume</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Total cells counted sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Cell concentration follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Total cells counted, Squares counted and Dilution factor are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Total cells counted, Squares counted and Dilution factor measured, Cell concentration and Cell concentration wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/fcr">Feed conversion ratio</a>, <a href="/biology/femur-to-foot-ratio">Femur to Foot Ratio Calculator</a> and <a href="/biology/fertilizer">Fertilizer Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hemocytometer Cell Counter (cells/mL) calculator work out?', 'a' => <<<'TXT'
            Cell concentration, Cell concentration, Total cells in the suspension and Concentration, from Total cells counted, Squares counted and Dilution factor. The relationship is Cell concentration = Total cells counted ÷ Squares counted × Dilution factor × 10000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total cells counted (cells), Squares counted, Dilution factor (×), Suspension volume (mL). Fill cells_counted, squares and dilution and leave Cell concentration empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Cell concentration, Cell concentration, Total cells in the suspension and Concentration blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Cell concentration = 1.600e+6 cells/mL, Cell concentration = 1600 cells/µL, Total cells in the suspension = 1.600e+7 cells and Concentration = 1.6 ×10⁶/mL. The figures come from Total cells counted as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Cell concentration is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Total cells counted blank and the page solves for it, reporting Cell concentration instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Cell concentration keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/fcr', 'name' => 'Feed conversion ratio'],
            ['path' => '/biology/femur-to-foot-ratio', 'name' => 'Femur to Foot Ratio Calculator'],
            ['path' => '/biology/fertilizer', 'name' => 'Fertilizer Calculator'],
        ],
        'authors' => [],
    ],
];

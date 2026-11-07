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
    'meta' => ['title' => 'Cell Counting Calculator: Formula & Example', 'description' => 'Enter cells counted, squares counted and dilution factor and Cell Counting Calculator returns concentration and total cells available. It returns concentration.', 'h1' => 'Cell Counting Calculator', 'updated' => '2026-10-29'],
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
        Cell Counting turns Cells counted, Squares counted and Dilution factor into Concentration and Total cells available. It is a single relationship that reads concentration out of cells counted, not a table of canned results keyed by them. Units for Concentration default to cells/mL and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Cell Counting calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Cell Counting: it takes 5 numbers and reports Concentration, Total cells available and Volume to take.</p><p>Written with the labels from the form, Concentration = Cells counted ÷ Squares counted × Dilution factor × 10000.</p><p>What comes back is Concentration, Total cells available, Volume to take and Wells at 100 000 per well — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Cells counted</strong> — in cells</li><li><strong>Squares counted</strong> — a plain number, no unit</li><li><strong>Dilution factor</strong> — in ×</li><li><strong>Suspension volume</strong> — in mL</li><li><strong>Cells needed</strong> — in cells. For the next flask or plate</li></ul><p>The answers come back as Concentration in cells/mL, Total cells available in cells, Volume to take in mL, Wells at 100 000 per well in wells. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Cells counted = 340 cells, Squares counted = 4, Dilution factor = 1 ×, Suspension volume = 12 mL and Cells needed = 2.000e+6 cells gives <strong>Concentration</strong> = 850000 cells/mL, <strong>Total cells available</strong> = 1.020e+7 cells, <strong>Volume to take</strong> = 2.35 mL and <strong>Wells at 100 000 per well</strong> = 102 wells.</p><ul><li><strong>Concentration</strong> = 850000 cells/mL</li><li><strong>Total cells available</strong> = 1.020e+7 cells</li><li><strong>Volume to take</strong> = 2.35 mL</li><li><strong>Wells at 100 000 per well</strong> = 102 wells</li></ul><p>That is <strong>Concentration</strong> = <code>Cells counted ÷ Squares counted × Dilution factor × 10000</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Concentration</strong> = 850000, <strong>Total cells available</strong> = 1.020e+7, <strong>Volume to take</strong> = 2.35 and <strong>Wells at 100 000 per well</strong> = 102 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Concentration takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Concentration</strong> = <code>Cells counted ÷ Squares counted × Dilution factor × 10000</code></li><li><strong>Total cells available</strong> = <code>Cells counted ÷ Squares counted × Dilution factor × 10000 × Suspension volume</code></li><li><strong>Volume to take</strong> = <code>Cells needed ÷ (Cells counted ÷ Squares counted × Dilution factor × 10000)</code></li><li><strong>Wells at 100 000 per well</strong> = <code>Cells counted ÷ Squares counted × Dilution factor × 10000 × Suspension volume ÷ 100000</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Concentration</strong> = <code>Cells counted ÷ Squares counted × Dilution factor × 10000</code> — the form to use when Cells counted, Squares counted and Dilution factor are the values you have.</li><li><strong>Total cells available</strong> = <code>Cells counted ÷ Squares counted × Dilution factor × 10000 × Suspension volume</code> — the form to use when Cells counted, Squares counted, Dilution factor and Suspension volume are the values you have.</li><li><strong>Volume to take</strong> = <code>Cells needed ÷ (Cells counted ÷ Squares counted × Dilution factor × 10000)</code> — the form to use when Cells needed, Cells counted, Squares counted and Dilution factor are the values you have.</li><li><strong>Wells at 100 000 per well</strong> = <code>Cells counted ÷ Squares counted × Dilution factor × 10000 × Suspension volume ÷ 100000</code> — the form to use when Cells counted, Squares counted, Dilution factor and Suspension volume are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Concentration, Total cells available and Volume to take can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Cells counted from 340 to 680, leaving every other box alone. The panel moves from <strong>Concentration</strong> 850000 cells/mL, <strong>Total cells available</strong> 1.020e+7 cells, <strong>Volume to take</strong> 2.35 mL and <strong>Wells at 100 000 per well</strong> 102 wells to <strong>Concentration</strong> 1.700e+6 cells/mL, <strong>Total cells available</strong> 2.040e+7 cells, <strong>Volume to take</strong> 1.18 mL and <strong>Wells at 100 000 per well</strong> 204 wells.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Concentration, Total cells available and Volume to take are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Cells counted left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cells counted is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Squares counted left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Squares counted is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Dilution factor left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Dilution factor is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Cells counted to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Cell Counting form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Cells counted</strong> is measured in cells. The page reads it when it works out Concentration, Total cells available and Volume to take. Fill it from a measurement rather than a memory — Cells counted is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Squares counted</strong> takes a plain number with no unit attached. The page reads it when it works out Concentration, Total cells available and Volume to take. Fill it from a measurement rather than a memory — Squares counted is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Dilution factor</strong> is measured in ×. The page reads it when it works out Concentration, Total cells available and Volume to take. Fill it from a measurement rather than a memory — Dilution factor is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Suspension volume</strong> is measured in mL. The page reads it when it works out Total cells available and Wells at 100 000 per well. Fill it from a measurement rather than a memory — Suspension volume is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cells needed</strong> is measured in cells. For the next flask or plate. The page reads it when it works out Volume to take. Fill it from a measurement rather than a memory — Cells needed is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Concentration</strong> is a plain number and the page's own defaults put it at 850000. It is computed from Cells counted, Squares counted and Dilution factor, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total cells available</strong> is a plain number and the page's own defaults put it at 1.020e+7. It is computed from Cells counted, Squares counted, Dilution factor and Suspension volume, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Volume to take</strong> is a plain number and the page's own defaults put it at 2.35. It is computed from Cells needed, Cells counted, Squares counted and Dilution factor, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Wells at 100 000 per well</strong> is a plain number and the page's own defaults put it at 102. It is computed from Cells counted, Squares counted, Dilution factor and Suspension volume, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Concentration</th><th>Total cells available</th><th>Volume to take</th><th>Wells at 100 000 per well</th></tr></thead><tbody><tr><td><strong>Cells counted</strong> +10%</td><td>+10%</td><td>+10%</td><td>-9.09%</td><td>+10%</td></tr><tr><td><strong>Squares counted</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>+10%</td><td>-9.09%</td></tr><tr><td><strong>Dilution factor</strong> +10%</td><td>+10%</td><td>+10%</td><td>-9.09%</td><td>+10%</td></tr><tr><td><strong>Suspension volume</strong> +10%</td><td>+0%</td><td>+10%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Cells needed</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Cells counted sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Cells counted = 170 cells, Squares counted = 2, Dilution factor = 0.5 ×, Suspension volume = 6 mL and Cells needed = 1.000e+6 cells and the page reports <strong>Concentration</strong> = 425000 cells/mL, <strong>Total cells available</strong> = 2.550e+6 cells, <strong>Volume to take</strong> = 2.35 mL and <strong>Wells at 100 000 per well</strong> = 25.5 wells.</li><li>Feed in Cells counted = 1020 cells, Squares counted = 4, Dilution factor = 1 ×, Suspension volume = 12 mL and Cells needed = 2.000e+6 cells and the page reports <strong>Concentration</strong> = 2.550e+6 cells/mL, <strong>Total cells available</strong> = 3.060e+7 cells, <strong>Volume to take</strong> = 0.7843 mL and <strong>Wells at 100 000 per well</strong> = 306 wells.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Concentration follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
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
            Cells counted (cells), Squares counted, Dilution factor (×), Suspension volume (mL), Cells needed (cells). Enter cells counted, squares counted and dilution factor; Concentration is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Concentration, Total cells available, Volume to take and Wells at 100 000 per well can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Concentration = 850000 cells/mL, Total cells available = 1.020e+7 cells, Volume to take = 2.35 mL and Wells at 100 000 per well = 102 wells. The figures come from Cells counted as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Concentration is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
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

<?php

/**
 * Cell Density Calculator
 * /biology/cell-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell Density Calculator',
    'meta' => ['title' => 'Cell Density Calculator: Units and Formulas', 'description' => 'Cell density turns cells counted, squares counted and dilution factor into cells per mL, density per cm2 of growth area and a count from the OD600 reading.', 'h1' => 'Cell Density Calculator', 'updated' => '2026-10-29'],
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
                            'default' => '300',
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
                            'name' => 'area',
                            'label' => 'Growth area',
                            'type' => 'number',
                            'suffix' => 'cm²',
                            'help' => 'T25 = 25, T75 = 75, 6-well ≈ 9.6 per well',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Cell density',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_cm2',
                            'label' => 'Density per area',
                            'type' => 'number',
                            'suffix' => 'cells/cm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'od',
                            'label' => 'OD600',
                            'type' => 'number',
                            'help' => 'For bacterial cultures only',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.6',
                        ],
                        [
                            'name' => 'od_cells',
                            'label' => 'Cells/mL from OD600',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
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
            'title' => 'Density',
            'results' => ['density' => 'cells_counted/squares*dilution*10000', 'per_cm2' => 'cells_counted/squares*dilution*10000/area', 'od_cells' => 'od*800000000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cell Density takes Cells counted, Squares counted and Dilution factor and returns Cell density and Density per area. The arithmetic is the whole method: cell density is worked out from cells counted by one formula, applied once. Cell density comes back in cells/mL unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Cell Density calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Cell Density: it takes 5 numbers and reports Cell density, Density per area and Cells/mL from OD600.</p><p>Written with the labels from the form, Cell density = Cells counted ÷ Squares counted × Dilution factor × 10000.</p><p>The answers are Cell density, Density per area and Cells/mL from OD600; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Cells counted</strong> — in cells</li><li><strong>Squares counted</strong> — a plain number, no unit</li><li><strong>Dilution factor</strong> — in ×</li><li><strong>Growth area</strong> — in cm². T25 = 25, T75 = 75, 6-well ≈ 9.6 per well</li><li><strong>OD600</strong> — a plain number, no unit. For bacterial cultures only</li></ul><p>The result boxes are Cell density in cells/mL, Density per area in cells/cm², Cells/mL from OD600 in cells/mL; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Cells counted = 300 cells, Squares counted = 4, Dilution factor = 1 ×, Growth area = 25 cm² and OD600 = 0.6 — through the same formula and the panel reports <strong>Cell density</strong> = 750000 cells/mL, <strong>Density per area</strong> = 30000 cells/cm² and <strong>Cells/mL from OD600</strong> = 4.800e+8 cells/mL.</p><ul><li><strong>Cell density</strong> = 750000 cells/mL</li><li><strong>Density per area</strong> = 30000 cells/cm²</li><li><strong>Cells/mL from OD600</strong> = 4.800e+8 cells/mL</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Cell density</strong> = <code>Cells counted ÷ Squares counted × Dilution factor × 10000</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Cell density</strong> = 750000, <strong>Density per area</strong> = 30000 and <strong>Cells/mL from OD600</strong> = 4.800e+8 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Cell density takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Cell density</strong> = <code>Cells counted ÷ Squares counted × Dilution factor × 10000</code></li><li><strong>Density per area</strong> = <code>Cells counted ÷ Squares counted × Dilution factor × 10000 ÷ Growth area</code></li><li><strong>Cells/mL from OD600</strong> = <code>OD600 × 800000000</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Cell density</strong> = <code>Cells counted ÷ Squares counted × Dilution factor × 10000</code> — the form to use when Cells counted, Squares counted and Dilution factor are the values you have.</li><li><strong>Density per area</strong> = <code>Cells counted ÷ Squares counted × Dilution factor × 10000 ÷ Growth area</code> — the form to use when Cells counted, Squares counted, Dilution factor and Growth area are the values you have.</li><li><strong>Cells/mL from OD600</strong> = <code>OD600 × 800000000</code> — the form to use when OD600 are the values you have.</li></ul><p>Any one of Cell density, Density per area and Cells/mL from OD600 can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Cells counted, from 300 to 600 — and the answers go from <strong>Cell density</strong> 750000 cells/mL, <strong>Density per area</strong> 30000 cells/cm² and <strong>Cells/mL from OD600</strong> 4.800e+8 cells/mL to <strong>Cell density</strong> 1.500e+6 cells/mL, <strong>Density per area</strong> 60000 cells/cm² and <strong>Cells/mL from OD600</strong> 4.800e+8 cells/mL.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Cell density, Density per area and Cells/mL from OD600 are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Cells counted left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cells counted is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Squares counted left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Squares counted is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Dilution factor left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Dilution factor is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Cells counted and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Cells counted</strong> is measured in cells. It feeds Cell density and Density per area. Have it to hand before you start: Cells counted is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Squares counted</strong> takes a plain number with no unit attached. It feeds Cell density and Density per area. Have it to hand before you start: Squares counted is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Dilution factor</strong> is measured in ×. It feeds Cell density and Density per area. Have it to hand before you start: Dilution factor is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Growth area</strong> is measured in cm². T25 = 25, T75 = 75, 6-well ≈ 9.6 per well. It feeds Density per area. Have it to hand before you start: Growth area is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>OD600</strong> takes a plain number with no unit attached. For bacterial cultures only. It feeds Cells/mL from OD600. Have it to hand before you start: OD600 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Cell density</strong> is a plain number and the page's own defaults put it at 750000. The value follows from Cells counted, Squares counted and Dilution factor. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Density per area</strong> is a plain number and the page's own defaults put it at 30000. The value follows from Cells counted, Squares counted, Dilution factor and Growth area. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Cells/mL from OD600</strong> is a plain number and the page's own defaults put it at 4.800e+8. The value follows from OD600. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Cell density</th><th>Density per area</th><th>Cells/mL from OD600</th></tr></thead><tbody><tr><td><strong>Cells counted</strong> +10%</td><td>+10%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Squares counted</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>+0%</td></tr><tr><td><strong>Dilution factor</strong> +10%</td><td>+10%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Growth area</strong> +10%</td><td>+0%</td><td>-9.09%</td><td>+0%</td></tr><tr><td><strong>OD600</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Cells counted sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Cells counted = 150 cells, Squares counted = 2, Dilution factor = 0.5 ×, Growth area = 12.5 cm² and OD600 = 0.3, the answer is <strong>Cell density</strong> = 375000 cells/mL, <strong>Density per area</strong> = 30000 cells/cm² and <strong>Cells/mL from OD600</strong> = 2.400e+8 cells/mL.</li><li>With Cells counted = 900 cells, Squares counted = 4, Dilution factor = 1 ×, Growth area = 25 cm² and OD600 = 0.6, the answer is <strong>Cell density</strong> = 2.250e+6 cells/mL, <strong>Density per area</strong> = 90000 cells/cm² and <strong>Cells/mL from OD600</strong> = 4.800e+8 cells/mL.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Cell density follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Cells counted, Squares counted and Dilution factor are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Cells counted, Squares counted and Dilution factor is what you already know and Cell density and Density per area is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/specific-productivity-qp">Specific Productivity (qP) Calculator</a>, <a href="/biology/cedar-tree-value">Standing Timber Value Calculator</a> and <a href="/biology/stems-per-hectare">Stems Per Hectare Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cell Density calculator work out?', 'a' => <<<'TXT'
            Cell density, Density per area and Cells/mL from OD600, from Cells counted, Squares counted and Dilution factor. The relationship is Cell density = Cells counted ÷ Squares counted × Dilution factor × 10000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cells counted (cells), Squares counted, Dilution factor (×), Growth area (cm²), OD600. With cells counted, squares counted and dilution factor in place, Cell density can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Cell density, Density per area and Cells/mL from OD600 blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Cell density = 750000 cells/mL, Density per area = 30000 cells/cm² and Cells/mL from OD600 = 4.800e+8 cells/mL. Those are the defaults written into the form — move Cells counted and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Cell density is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Cells counted left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Cell density keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/specific-productivity-qp', 'name' => 'Specific Productivity (qP) Calculator'],
            ['path' => '/biology/cedar-tree-value', 'name' => 'Standing Timber Value Calculator'],
            ['path' => '/biology/stems-per-hectare', 'name' => 'Stems Per Hectare Calculator'],
        ],
        'authors' => [],
    ],
];

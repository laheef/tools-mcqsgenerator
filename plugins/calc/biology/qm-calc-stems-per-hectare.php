<?php

/**
 * Stems Per Hectare Calculator
 * /biology/stems-per-hectare
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Stems Per Hectare Calculator',
    'meta' => ['title' => 'Stems Per Hectare Calculator — Formula & Results', 'description' => 'Stems Per Hectare Calculator works out stools per hectare from area and row spacing. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Stems Per Hectare Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'area_ha',
                            'label' => 'Area',
                            'type' => 'number',
                            'suffix' => 'ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'row_m',
                            'label' => 'Row spacing',
                            'type' => 'number',
                            'suffix' => 'm',
                            'help' => 'Sugarcane: 1.4–1.8 m',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.5',
                        ],
                        [
                            'name' => 'stool_m',
                            'label' => 'Spacing along the row',
                            'type' => 'number',
                            'suffix' => 'm',
                            'help' => 'Distance between planting setts',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                        [
                            'name' => 'stems_per_stool',
                            'label' => 'Stems per stool',
                            'type' => 'number',
                            'help' => 'Tillering gives 5–10 in a good crop',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'survival',
                            'label' => 'Survival',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Germination and overwintering losses',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '85',
                        ],
                        [
                            'name' => 'stools',
                            'label' => 'Stools per hectare',
                            'type' => 'number',
                            'suffix' => '/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'stems',
                            'label' => 'Stems per hectare',
                            'type' => 'number',
                            'suffix' => '/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_stems',
                            'label' => 'Stems on the area',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'stems_m2',
                            'label' => 'Stems per square metre',
                            'type' => 'number',
                            'suffix' => '/m²',
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
            'title' => 'Stems',
            'results' => ['stools' => '10000/(row_m*stool_m)', 'stems' => '10000/(row_m*stool_m)*stems_per_stool*survival/100', 'total_stems' => 'area_ha*10000/(row_m*stool_m)*stems_per_stool*survival/100', 'stems_m2' => '10000/(row_m*stool_m)*stems_per_stool*survival/100/10000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Stems Per Hectare turns Area, Row spacing and Spacing along the row into Stools per hectare and Stems per hectare. There is no hidden constant here: change stools per hectare and area moves with it. The main result, Stools per hectare, is reported in /ha.
        TXT,
        'sections' => [
            ['title' => 'How the Stems Per Hectare calculator works', 'html' => <<<'TXT'
            <p>The Stems Per Hectare calculator applies one relationship to 5 numbers and reports Stools per hectare, Stems per hectare and Stems on the area.</p><p>The relationship it solves reads Stools per hectare = 10000 ÷ (Row spacing × Spacing along the row).</p><p>What comes back is Stools per hectare, Stems per hectare, Stems on the area and Stems per square metre — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Area</strong> — in ha</li><li><strong>Row spacing</strong> — in m. Sugarcane: 1.4–1.8 m</li><li><strong>Spacing along the row</strong> — in m. Distance between planting setts</li><li><strong>Stems per stool</strong> — a plain number, no unit. Tillering gives 5–10 in a good crop</li><li><strong>Survival</strong> — in %. Germination and overwintering losses</li></ul><p>The answers come back as Stools per hectare in /ha, Stems per hectare in /ha, Stems on the area, Stems per square metre in /m². Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Area = 1 ha, Row spacing = 1.5 m, Spacing along the row = 0.5 m, Stems per stool = 6 and Survival = 85 %; the answers are <strong>Stools per hectare</strong> = 13333 /ha, <strong>Stems per hectare</strong> = 68000 /ha, <strong>Stems on the area</strong> = 68000 and <strong>Stems per square metre</strong> = 6.8 /m².</p><ul><li><strong>Stools per hectare</strong> = 13333 /ha</li><li><strong>Stems per hectare</strong> = 68000 /ha</li><li><strong>Stems on the area</strong> = 68000</li><li><strong>Stems per square metre</strong> = 6.8 /m²</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Stools per hectare</strong> = <code>10000 ÷ (Row spacing × Spacing along the row)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Stools per hectare</strong> = 13333, <strong>Stems per hectare</strong> = 68000, <strong>Stems on the area</strong> = 68000 and <strong>Stems per square metre</strong> = 6.8 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Stools per hectare takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Stools per hectare</strong> = <code>10000 ÷ (Row spacing × Spacing along the row)</code></li><li><strong>Stems per hectare</strong> = <code>10000 ÷ (Row spacing × Spacing along the row) × Stems per stool × Survival ÷ 100</code></li><li><strong>Stems on the area</strong> = <code>Area × 10000 ÷ (Row spacing × Spacing along the row) × Stems per stool × Survival ÷ 100</code></li><li><strong>Stems per square metre</strong> = <code>10000 ÷ (Row spacing × Spacing along the row) × Stems per stool × Survival ÷ 100 ÷ 10000</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Stools per hectare</strong> = <code>10000 ÷ (Row spacing × Spacing along the row)</code> — the form to use when Row spacing and Spacing along the row are the values you have.</li><li><strong>Stems per hectare</strong> = <code>10000 ÷ (Row spacing × Spacing along the row) × Stems per stool × Survival ÷ 100</code> — the form to use when Row spacing, Spacing along the row, Stems per stool and Survival are the values you have.</li><li><strong>Stems on the area</strong> = <code>Area × 10000 ÷ (Row spacing × Spacing along the row) × Stems per stool × Survival ÷ 100</code> — the form to use when Area, Row spacing, Spacing along the row and Stems per stool are the values you have.</li><li><strong>Stems per square metre</strong> = <code>10000 ÷ (Row spacing × Spacing along the row) × Stems per stool × Survival ÷ 100 ÷ 10000</code> — the form to use when Row spacing, Spacing along the row, Stems per stool and Survival are the values you have.</li></ul><p>Any one of Stools per hectare, Stems per hectare and Stems on the area can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Area from 1 to 2, leaving every other box alone. The panel moves from <strong>Stools per hectare</strong> 13333 /ha, <strong>Stems per hectare</strong> 68000 /ha, <strong>Stems on the area</strong> 68000 and <strong>Stems per square metre</strong> 6.8 /m² to <strong>Stools per hectare</strong> 13333 /ha, <strong>Stems per hectare</strong> 68000 /ha, <strong>Stems on the area</strong> 136000 and <strong>Stems per square metre</strong> 6.8 /m².</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Stools per hectare, Stems per hectare and Stems on the area are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Area left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Area is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Row spacing left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Row spacing is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Spacing along the row left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Spacing along the row is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Area is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Area</strong> is measured in ha. It feeds Stems on the area. Have it to hand before you start: Area is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Row spacing</strong> is measured in m. Sugarcane: 1.4–1.8 m. It feeds Stools per hectare, Stems per hectare and Stems on the area. Have it to hand before you start: Row spacing is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Spacing along the row</strong> is measured in m. Distance between planting setts. It feeds Stools per hectare, Stems per hectare and Stems on the area. Have it to hand before you start: Spacing along the row is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Stems per stool</strong> takes a plain number with no unit attached. Tillering gives 5–10 in a good crop. It feeds Stems per hectare, Stems on the area and Stems per square metre. Have it to hand before you start: Stems per stool is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Survival</strong> is measured in %. Germination and overwintering losses. It feeds Stems per hectare, Stems on the area and Stems per square metre. Have it to hand before you start: Survival is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Stools per hectare</strong> is a plain number and the page's own defaults put it at 13333. It is computed from Row spacing and Spacing along the row, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Stems per hectare</strong> is a plain number and the page's own defaults put it at 68000. It is computed from Row spacing, Spacing along the row, Stems per stool and Survival, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Stems on the area</strong> is a plain number and the page's own defaults put it at 68000. It is computed from Area, Row spacing, Spacing along the row and Stems per stool, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Stems per square metre</strong> is a plain number and the page's own defaults put it at 6.8. It is computed from Row spacing, Spacing along the row, Stems per stool and Survival, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Stools per hectare</th><th>Stems per hectare</th><th>Stems on the area</th><th>Stems per square metre</th></tr></thead><tbody><tr><td><strong>Area</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Row spacing</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td></tr><tr><td><strong>Spacing along the row</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td></tr><tr><td><strong>Stems per stool</strong> +10%</td><td>+0%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Survival</strong> +10%</td><td>+0%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Stems per stool sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Stools per hectare follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Area, Row spacing and Spacing along the row and the number you are missing is Stools per hectare and Stems per hectare.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/fish-tank-stocking">Fish Tank Stocking Calculator</a>, <a href="/biology/fixation-index-fst">Fixation Index (Fst) Calculator</a> and <a href="/biology/fold-change">Fold Change Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Stems Per Hectare calculator work out?', 'a' => <<<'TXT'
            Stools per hectare, Stems per hectare, Stems on the area and Stems per square metre, from Row spacing and Spacing along the row. The relationship is Stools per hectare = 10000 ÷ (Row spacing × Spacing along the row).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Area (ha), Row spacing (m), Spacing along the row (m), Stems per stool, Survival (%). Fill area, row spacing and spacing along the row and leave Stools per hectare empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Stools per hectare, Stems per hectare, Stems on the area and Stems per square metre blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Stools per hectare = 13333 /ha, Stems per hectare = 68000 /ha, Stems on the area = 68000 and Stems per square metre = 6.8 /m². That comes from the page's own defaults, entered in Area; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Stools per hectare is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Area left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Stools per hectare keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/fish-tank-stocking', 'name' => 'Fish Tank Stocking Calculator'],
            ['path' => '/biology/fixation-index-fst', 'name' => 'Fixation Index (Fst) Calculator'],
            ['path' => '/biology/fold-change', 'name' => 'Fold Change Calculator'],
        ],
        'authors' => [],
    ],
];

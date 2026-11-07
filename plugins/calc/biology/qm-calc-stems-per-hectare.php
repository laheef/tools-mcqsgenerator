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
    'meta' => ['title' => 'Stems Per Hectare Calculator — Formula & Results', 'description' => 'Stems Per Hectare turns Area, Row spacing and Spacing along the row into Stools per hectare and Stems per hectare. There is no hidden constant here: change…', 'h1' => 'Stems Per Hectare Calculator', 'updated' => '2026-10-29'],
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
        Stems Per Hectare turns Area, Row spacing and Spacing along the row into Stools per hectare and Stems per hectare. There is no hidden constant here: change Stools per hectare and Area moves with it. The main result, Stools per hectare, is reported in /ha.
        TXT,
        'sections' => [
            ['title' => 'How the Stems Per Hectare calculator works', 'html' => <<<'TXT'
            <p>The Stems Per Hectare calculator applies one relationship to 5 numbers and reports Stools per hectare, Stems per hectare and Stems on the area.</p><p>The relationship it solves reads Stools per hectare = 10000 ÷ (Row spacing × Spacing along the row).</p><p>What comes back is Stools per hectare, Stems per hectare, Stems on the area and Stems per square metre — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Area</strong> — in ha</li><li><strong>Row spacing</strong> — in m. Sugarcane: 1.4–1.8 m</li><li><strong>Spacing along the row</strong> — in m. Distance between planting setts</li><li><strong>Stems per stool</strong> — a plain number, no unit. Tillering gives 5–10 in a good crop</li><li><strong>Survival</strong> — in %. Germination and overwintering losses</li></ul><p>The answers come back as Stools per hectare in /ha, Stems per hectare in /ha, Stems on the area, Stems per square metre in /m². </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Area = 1 ha, Row spacing = 1.5 m, Spacing along the row = 0.5 m, Stems per stool = 6 and Survival = 85 %; the answers are &lt;strong&gt;Stools per hectare&lt;/strong&gt; = 13333 /ha, &lt;strong&gt;Stems per hectare&lt;/strong&gt; = 68000 /ha, &lt;strong&gt;Stems on the area&lt;/strong&gt; = 68000 and &lt;strong&gt;Stems per square metre&lt;/strong&gt; = 6.8 /m².</p><ul><li><strong>Stools per hectare</strong> = 13333 /ha</li><li><strong>Stems per hectare</strong> = 68000 /ha</li><li><strong>Stems on the area</strong> = 68000</li><li><strong>Stems per square metre</strong> = 6.8 /m²</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Stools per hectare</strong> = <code>10000 ÷ (Row spacing × Spacing along the row)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Stools per hectare&lt;/strong&gt; = 13333, &lt;strong&gt;Stems per hectare&lt;/strong&gt; = 68000, &lt;strong&gt;Stems on the area&lt;/strong&gt; = 68000 and &lt;strong&gt;Stems per square metre&lt;/strong&gt; = 6.8 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Stools per hectare takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Stools per hectare</strong> = <code>10000 ÷ (Row spacing × Spacing along the row)</code></li><li><strong>Stems per hectare</strong> = <code>10000 ÷ (Row spacing × Spacing along the row) × Stems per stool × Survival ÷ 100</code></li><li><strong>Stems on the area</strong> = <code>Area × 10000 ÷ (Row spacing × Spacing along the row) × Stems per stool × Survival ÷ 100</code></li><li><strong>Stems per square metre</strong> = <code>10000 ÷ (Row spacing × Spacing along the row) × Stems per stool × Survival ÷ 100 ÷ 10000</code></li></ul><p>Any one of Stools per hectare, Stems per hectare and Stems on the area can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Area from 1 to 2, leaving every other box alone. The panel moves from &lt;strong&gt;Stools per hectare&lt;/strong&gt; 13333 /ha, &lt;strong&gt;Stems per hectare&lt;/strong&gt; 68000 /ha, &lt;strong&gt;Stems on the area&lt;/strong&gt; 68000 and &lt;strong&gt;Stems per square metre&lt;/strong&gt; 6.8 /m² to &lt;strong&gt;Stools per hectare&lt;/strong&gt; 13333 /ha, &lt;strong&gt;Stems per hectare&lt;/strong&gt; 68000 /ha, &lt;strong&gt;Stems on the area&lt;/strong&gt; 136000 and &lt;strong&gt;Stems per square metre&lt;/strong&gt; 6.8 /m².</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Stools per hectare, Stems per hectare and Stems on the area are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Area is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
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
            Area (ha), Row spacing (m), Spacing along the row (m), Stems per stool, Survival (%). Fill area_ha, row_m and stool_m and leave Stools per hectare empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Stools per hectare, Stems per hectare, Stems on the area and Stems per square metre blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Stools per hectare = 13333 /ha, Stems per hectare = 68000 /ha, Stems on the area = 68000 and Stems per square metre = 6.8 /m². That comes from the page's own defaults, entered in Area; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Stools per hectare is not rounded at all; the figure you read is formatted for legibility.'],
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

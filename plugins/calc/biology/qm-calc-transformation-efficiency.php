<?php

/**
 * Transformation Efficiency Calculator
 * /biology/transformation-efficiency
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Transformation Efficiency Calculator',
    'meta' => ['title' => 'Transformation Efficiency Calculator — Biology', 'description' => 'Transformation efficiency is the number of transformants per microgram of plasmid — the number that tells you whether your competent cells are any good. Free', 'h1' => 'Transformation Efficiency Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'colonies',
                            'label' => 'Colonies on the plate',
                            'type' => 'number',
                            'suffix' => 'CFU',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '320',
                        ],
                        [
                            'name' => 'volume_plated',
                            'label' => 'Volume plated',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.1',
                        ],
                        [
                            'name' => 'recovery',
                            'label' => 'Recovery volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'help' => 'SOC or LB used to resuspend',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'dna',
                            'label' => 'Plasmid DNA transformed',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Dilution plated',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '10 if you plated 1/10 of the recovery',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'efficiency',
                            'label' => 'Transformation efficiency',
                            'type' => 'number',
                            'suffix' => 'CFU/µg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_colonies',
                            'label' => 'Total transformants',
                            'type' => 'number',
                            'suffix' => 'CFU',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_ng',
                            'label' => 'Transformants per ng',
                            'type' => 'number',
                            'suffix' => 'CFU/ng',
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
            'title' => 'Efficiency',
            'results' => ['efficiency' => 'colonies/(volume_plated/recovery)/dna*1000*dilution', 'total_colonies' => 'colonies/(volume_plated/recovery)*dilution', 'per_ng' => 'colonies/(volume_plated/recovery)/dna*dilution'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Transformation Efficiency turns Colonies on the plate, Volume plated and Recovery volume into Transformation efficiency and Total transformants. There is no hidden constant here: change Transformation efficiency and Colonies on the plate moves with it. The main result, Transformation efficiency, is reported in CFU/µg.
        TXT,
        'sections' => [
            ['title' => 'How the Transformation Efficiency calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Transformation Efficiency: it takes 5 numbers and reports Transformation efficiency, Total transformants and Transformants per ng.</p><p>Written with the labels from the form, Transformation efficiency = Colonies on the plate ÷ (Volume plated ÷ Recovery volume) ÷ Plasmid DNA transformed × 1000 × Dilution plated.</p><p>The result panel carries Transformation efficiency, Total transformants and Transformants per ng, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Colonies on the plate</strong> — in CFU</li><li><strong>Volume plated</strong> — in mL</li><li><strong>Recovery volume</strong> — in mL. SOC or LB used to resuspend</li><li><strong>Plasmid DNA transformed</strong> — in ng</li><li><strong>Dilution plated</strong> — in ×. 10 if you plated 1/10 of the recovery</li></ul><p>What you get back is Transformation efficiency in CFU/µg, Total transformants in CFU, Transformants per ng in CFU/ng, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Colonies on the plate = 320 CFU, Volume plated = 0.1 mL, Recovery volume = 1 mL, Plasmid DNA transformed = 10 ng and Dilution plated = 1 ×; the answers are &lt;strong&gt;Transformation efficiency&lt;/strong&gt; = 320000 CFU/µg, &lt;strong&gt;Total transformants&lt;/strong&gt; = 3200 CFU and &lt;strong&gt;Transformants per ng&lt;/strong&gt; = 320 CFU/ng.</p><ul><li><strong>Transformation efficiency</strong> = 320000 CFU/µg</li><li><strong>Total transformants</strong> = 3200 CFU</li><li><strong>Transformants per ng</strong> = 320 CFU/ng</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Transformation efficiency</strong> = <code>Colonies on the plate ÷ (Volume plated ÷ Recovery volume) ÷ Plasmid DNA transformed × 1000 × Dilution plated</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Transformation efficiency&lt;/strong&gt; = 320000, &lt;strong&gt;Total transformants&lt;/strong&gt; = 3200 and &lt;strong&gt;Transformants per ng&lt;/strong&gt; = 320 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Transformation efficiency takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Transformation efficiency</strong> = <code>Colonies on the plate ÷ (Volume plated ÷ Recovery volume) ÷ Plasmid DNA transformed × 1000 × Dilution plated</code></li><li><strong>Total transformants</strong> = <code>Colonies on the plate ÷ (Volume plated ÷ Recovery volume) × Dilution plated</code></li><li><strong>Transformants per ng</strong> = <code>Colonies on the plate ÷ (Volume plated ÷ Recovery volume) ÷ Plasmid DNA transformed × Dilution plated</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Transformation efficiency, Total transformants and Transformants per ng can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Colonies on the plate from 320 to 640, leaving every other box alone. The panel moves from &lt;strong&gt;Transformation efficiency&lt;/strong&gt; 320000 CFU/µg, &lt;strong&gt;Total transformants&lt;/strong&gt; 3200 CFU and &lt;strong&gt;Transformants per ng&lt;/strong&gt; 320 CFU/ng to &lt;strong&gt;Transformation efficiency&lt;/strong&gt; 640000 CFU/µg, &lt;strong&gt;Total transformants&lt;/strong&gt; 6400 CFU and &lt;strong&gt;Transformants per ng&lt;/strong&gt; 640 CFU/ng.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Transformation efficiency, Total transformants and Transformants per ng are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Colonies on the plate is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Colonies on the plate, Volume plated and Recovery volume measured, Transformation efficiency and Total transformants wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/basal-metabolic-rate">Basal Metabolic Rate (Mifflin–St Jeor) Calculator</a>, <a href="/biology/base-pair-to-dalton">Base Pair to Dalton Calculator</a> and <a href="/biology/base-pair-to-kda">Base Pair to kDa Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Transformation Efficiency calculator work out?', 'a' => <<<'TXT'
            Transformation efficiency, Total transformants and Transformants per ng, from Colonies on the plate, Volume plated, Recovery volume and Plasmid DNA transformed. The relationship is Transformation efficiency = Colonies on the plate ÷ (Volume plated ÷ Recovery volume) ÷ Plasmid DNA transformed × 1000 × Dilution plated.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Colonies on the plate (CFU), Volume plated (mL), Recovery volume (mL), Plasmid DNA transformed (ng), Dilution plated (×). With colonies, volume_plated and recovery in place, Transformation efficiency can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Transformation efficiency, Total transformants and Transformants per ng can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Transformation efficiency = 320000 CFU/µg, Total transformants = 3200 CFU and Transformants per ng = 320 CFU/ng. Those are the defaults written into the form — move Colonies on the plate and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Transformation efficiency is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Colonies on the plate left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Transformation efficiency keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/basal-metabolic-rate', 'name' => 'Basal Metabolic Rate (Mifflin–St Jeor) Calculator'],
            ['path' => '/biology/base-pair-to-dalton', 'name' => 'Base Pair to Dalton Calculator'],
            ['path' => '/biology/base-pair-to-kda', 'name' => 'Base Pair to kDa Calculator'],
        ],
        'authors' => [],
    ],
];

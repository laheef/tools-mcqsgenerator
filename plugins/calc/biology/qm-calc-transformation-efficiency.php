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
    'meta' => ['title' => 'Transformation Efficiency Calculator — Biology', 'description' => 'Transformation Efficiency Calculator takes colonies on the plate, volume plated and recovery volume and returns total transformants and transformants per ng.', 'h1' => 'Transformation Efficiency Calculator', 'updated' => '2026-10-29'],
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
        Transformation Efficiency turns Colonies on the plate, Volume plated and Recovery volume into Transformation efficiency and Total transformants. There is no hidden constant here: change transformation efficiency and colonies on the plate moves with it. The main result, Transformation efficiency, is reported in CFU/µg.
        TXT,
        'sections' => [
            ['title' => 'How the Transformation Efficiency calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Transformation Efficiency: it takes 5 numbers and reports Transformation efficiency, Total transformants and Transformants per ng.</p><p>Written with the labels from the form, Transformation efficiency = Colonies on the plate ÷ (Volume plated ÷ Recovery volume) ÷ Plasmid DNA transformed × 1000 × Dilution plated.</p><p>The result panel carries Transformation efficiency, Total transformants and Transformants per ng, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Colonies on the plate</strong> — in CFU</li><li><strong>Volume plated</strong> — in mL</li><li><strong>Recovery volume</strong> — in mL. SOC or LB used to resuspend</li><li><strong>Plasmid DNA transformed</strong> — in ng</li><li><strong>Dilution plated</strong> — in ×. 10 if you plated 1/10 of the recovery</li></ul><p>What you get back is Transformation efficiency in CFU/µg, Total transformants in CFU, Transformants per ng in CFU/ng, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Colonies on the plate = 320 CFU, Volume plated = 0.1 mL, Recovery volume = 1 mL, Plasmid DNA transformed = 10 ng and Dilution plated = 1 ×; the answers are <strong>Transformation efficiency</strong> = 320000 CFU/µg, <strong>Total transformants</strong> = 3200 CFU and <strong>Transformants per ng</strong> = 320 CFU/ng.</p><ul><li><strong>Transformation efficiency</strong> = 320000 CFU/µg</li><li><strong>Total transformants</strong> = 3200 CFU</li><li><strong>Transformants per ng</strong> = 320 CFU/ng</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Transformation efficiency</strong> = <code>Colonies on the plate ÷ (Volume plated ÷ Recovery volume) ÷ Plasmid DNA transformed × 1000 × Dilution plated</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Transformation efficiency</strong> = 320000, <strong>Total transformants</strong> = 3200 and <strong>Transformants per ng</strong> = 320 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Transformation efficiency takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Transformation efficiency</strong> = <code>Colonies on the plate ÷ (Volume plated ÷ Recovery volume) ÷ Plasmid DNA transformed × 1000 × Dilution plated</code></li><li><strong>Total transformants</strong> = <code>Colonies on the plate ÷ (Volume plated ÷ Recovery volume) × Dilution plated</code></li><li><strong>Transformants per ng</strong> = <code>Colonies on the plate ÷ (Volume plated ÷ Recovery volume) ÷ Plasmid DNA transformed × Dilution plated</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Transformation efficiency</strong> = <code>Colonies on the plate ÷ (Volume plated ÷ Recovery volume) ÷ Plasmid DNA transformed × 1000 × Dilution plated</code> — the form to use when Colonies on the plate, Volume plated, Recovery volume and Plasmid DNA transformed are the values you have.</li><li><strong>Total transformants</strong> = <code>Colonies on the plate ÷ (Volume plated ÷ Recovery volume) × Dilution plated</code> — the form to use when Colonies on the plate, Volume plated, Recovery volume and Dilution plated are the values you have.</li><li><strong>Transformants per ng</strong> = <code>Colonies on the plate ÷ (Volume plated ÷ Recovery volume) ÷ Plasmid DNA transformed × Dilution plated</code> — the form to use when Colonies on the plate, Volume plated, Recovery volume and Plasmid DNA transformed are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Transformation efficiency, Total transformants and Transformants per ng can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Colonies on the plate from 320 to 640, leaving every other box alone. The panel moves from <strong>Transformation efficiency</strong> 320000 CFU/µg, <strong>Total transformants</strong> 3200 CFU and <strong>Transformants per ng</strong> 320 CFU/ng to <strong>Transformation efficiency</strong> 640000 CFU/µg, <strong>Total transformants</strong> 6400 CFU and <strong>Transformants per ng</strong> 640 CFU/ng.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Transformation efficiency, Total transformants and Transformants per ng are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Colonies on the plate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Colonies on the plate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Volume plated left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Volume plated is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Recovery volume left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Recovery volume is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Colonies on the plate is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Colonies on the plate</strong> is measured in CFU. The page reads it when it works out Transformation efficiency, Total transformants and Transformants per ng. Have it to hand before you start: Colonies on the plate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Volume plated</strong> is measured in mL. The page reads it when it works out Transformation efficiency, Total transformants and Transformants per ng. Have it to hand before you start: Volume plated is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Recovery volume</strong> is measured in mL. SOC or LB used to resuspend. The page reads it when it works out Transformation efficiency, Total transformants and Transformants per ng. Have it to hand before you start: Recovery volume is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Plasmid DNA transformed</strong> is measured in ng. The page reads it when it works out Transformation efficiency and Transformants per ng. Have it to hand before you start: Plasmid DNA transformed is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Dilution plated</strong> is measured in ×. 10 if you plated 1/10 of the recovery. The page reads it when it works out Transformation efficiency, Total transformants and Transformants per ng. Have it to hand before you start: Dilution plated is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Transformation efficiency</strong> is a plain number and the page's own defaults put it at 320000. The value follows from Colonies on the plate, Volume plated, Recovery volume and Plasmid DNA transformed. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total transformants</strong> is a plain number and the page's own defaults put it at 3200. The value follows from Colonies on the plate, Volume plated, Recovery volume and Dilution plated. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Transformants per ng</strong> is a plain number and the page's own defaults put it at 320. The value follows from Colonies on the plate, Volume plated, Recovery volume and Plasmid DNA transformed. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Transformation efficiency</th><th>Total transformants</th><th>Transformants per ng</th></tr></thead><tbody><tr><td><strong>Colonies on the plate</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Volume plated</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td></tr><tr><td><strong>Recovery volume</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Plasmid DNA transformed</strong> +10%</td><td>-9.09%</td><td>+0%</td><td>-9.09%</td></tr><tr><td><strong>Dilution plated</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Dilution plated sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Colonies on the plate = 160 CFU, Volume plated = 0.05 mL, Recovery volume = 0.5 mL, Plasmid DNA transformed = 5 ng and Dilution plated = 0.5 ×, the answer is <strong>Transformation efficiency</strong> = 160000 CFU/µg, <strong>Total transformants</strong> = 800 CFU and <strong>Transformants per ng</strong> = 160 CFU/ng.</li><li>With Colonies on the plate = 960 CFU, Volume plated = 0.1 mL, Recovery volume = 1 mL, Plasmid DNA transformed = 10 ng and Dilution plated = 1 ×, the answer is <strong>Transformation efficiency</strong> = 960000 CFU/µg, <strong>Total transformants</strong> = 9600 CFU and <strong>Transformants per ng</strong> = 960 CFU/ng.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Transformation efficiency follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
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
            Colonies on the plate (CFU), Volume plated (mL), Recovery volume (mL), Plasmid DNA transformed (ng), Dilution plated (×). With colonies on the plate, volume plated and recovery volume in place, Transformation efficiency can stay blank and the page will work it out.
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

<?php

/**
 * Sludge Volume Index Calculator (SVI)
 * /biology/svi-sludge-volume-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sludge Volume Index Calculator (SVI)',
    'meta' => ['title' => 'Sludge Volume Index Calculator (SVI) — Biology', 'description' => 'Sludge Volume Index Calculator (SVI) takes settled sludge volume after 30 min, MLSS and influent flow and returns sludge density index and return sludge ratio.', 'h1' => 'Sludge Volume Index Calculator (SVI)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'settled',
                            'label' => 'Settled sludge volume after 30 min',
                            'type' => 'number',
                            'suffix' => 'mL/L',
                            'help' => 'Read from the cone',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '280',
                        ],
                        [
                            'name' => 'mlss',
                            'label' => 'MLSS',
                            'type' => 'number',
                            'suffix' => 'mg/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3000',
                        ],
                        [
                            'name' => 'flow',
                            'label' => 'Influent flow',
                            'type' => 'number',
                            'suffix' => 'm³/day',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'return_mlss',
                            'label' => 'Return sludge MLSS',
                            'type' => 'number',
                            'suffix' => 'mg/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8000',
                        ],
                        [
                            'name' => 'svi',
                            'label' => 'Sludge volume index',
                            'type' => 'number',
                            'suffix' => 'mL/g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'sdi',
                            'label' => 'Sludge density index',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'return_ratio',
                            'label' => 'Return sludge ratio',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'return_flow',
                            'label' => 'Return sludge flow',
                            'type' => 'number',
                            'suffix' => 'm³/day',
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
            'title' => 'Sludge',
            'results' => ['svi' => 'settled/mlss*1000', 'sdi' => '100/(settled/mlss*1000)', 'return_ratio' => 'mlss/(return_mlss-mlss)*100', 'return_flow' => 'flow*mlss/(return_mlss-mlss)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Sludge Volume Index Calculator (SVI) takes Settled sludge volume after 30 min, MLSS and Influent flow and returns Sludge volume index and Sludge density index. There is no hidden constant here: change sludge volume index and settled sludge volume after 30 min moves with it. The main result, Sludge volume index, is reported in mL/g.
        TXT,
        'sections' => [
            ['title' => 'How the Sludge Volume Index Calculator (SVI) calculator works', 'html' => <<<'TXT'
            <p>The Sludge Volume Index Calculator (SVI) calculator applies one relationship to 4 numbers and reports Sludge volume index, Sludge density index and Return sludge ratio.</p><p>Written with the labels from the form, Sludge volume index = Settled sludge volume after 30 min ÷ MLSS × 1000.</p><p>What comes back is Sludge volume index, Sludge density index, Return sludge ratio and Return sludge flow — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Settled sludge volume after 30 min</strong> — in mL/L. Read from the cone</li><li><strong>MLSS</strong> — in mg/L</li><li><strong>Influent flow</strong> — in m³/day</li><li><strong>Return sludge MLSS</strong> — in mg/L</li></ul><p>The answers come back as Sludge volume index in mL/g, Sludge density index, Return sludge ratio in %, Return sludge flow in m³/day. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Settled sludge volume after 30 min = 280 mL/L, MLSS = 3000 mg/L, Influent flow = 500 m³/day and Return sludge MLSS = 8000 mg/L gives <strong>Sludge volume index</strong> = 93.33 mL/g, <strong>Sludge density index</strong> = 1.07, <strong>Return sludge ratio</strong> = 60 % and <strong>Return sludge flow</strong> = 300 m³/day.</p><ul><li><strong>Sludge volume index</strong> = 93.33 mL/g</li><li><strong>Sludge density index</strong> = 1.07</li><li><strong>Return sludge ratio</strong> = 60 %</li><li><strong>Return sludge flow</strong> = 300 m³/day</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Sludge volume index</strong> = <code>Settled sludge volume after 30 min ÷ MLSS × 1000</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Sludge volume index</strong> = 93.33, <strong>Sludge density index</strong> = 1.07, <strong>Return sludge ratio</strong> = 60 and <strong>Return sludge flow</strong> = 300 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Sludge volume index takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Sludge volume index</strong> = <code>Settled sludge volume after 30 min ÷ MLSS × 1000</code></li><li><strong>Sludge density index</strong> = <code>100 ÷ (Settled sludge volume after 30 min ÷ MLSS × 1000)</code></li><li><strong>Return sludge ratio</strong> = <code>MLSS ÷ (Return sludge MLSS − MLSS) × 100</code></li><li><strong>Return sludge flow</strong> = <code>Influent flow × MLSS ÷ (Return sludge MLSS − MLSS)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Sludge volume index</strong> = <code>Settled sludge volume after 30 min ÷ MLSS × 1000</code> — the form to use when Settled sludge volume after 30 min and MLSS are the values you have.</li><li><strong>Sludge density index</strong> = <code>100 ÷ (Settled sludge volume after 30 min ÷ MLSS × 1000)</code> — the form to use when Settled sludge volume after 30 min and MLSS are the values you have.</li><li><strong>Return sludge ratio</strong> = <code>MLSS ÷ (Return sludge MLSS − MLSS) × 100</code> — the form to use when MLSS and Return sludge MLSS are the values you have.</li><li><strong>Return sludge flow</strong> = <code>Influent flow × MLSS ÷ (Return sludge MLSS − MLSS)</code> — the form to use when Influent flow, MLSS and Return sludge MLSS are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Sludge volume index, Sludge density index and Return sludge ratio can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Settled sludge volume after 30 min from 280 to 560, leaving every other box alone. The panel moves from <strong>Sludge volume index</strong> 93.33 mL/g, <strong>Sludge density index</strong> 1.07, <strong>Return sludge ratio</strong> 60 % and <strong>Return sludge flow</strong> 300 m³/day to <strong>Sludge volume index</strong> 187 mL/g, <strong>Sludge density index</strong> 0.536, <strong>Return sludge ratio</strong> 60 % and <strong>Return sludge flow</strong> 300 m³/day.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Sludge volume index, Sludge density index and Return sludge ratio are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Settled sludge volume after 30 min left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Settled sludge volume after 30 min is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>MLSS left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If MLSS is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Influent flow left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Influent flow is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Settled sludge volume after 30 min is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Settled sludge volume after 30 min</strong> is measured in mL/L. Read from the cone. Change it and Sludge volume index and Sludge density index changes with it. Have it to hand before you start: Settled sludge volume after 30 min is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>MLSS</strong> is measured in mg/L. Change it and Sludge volume index, Sludge density index and Return sludge ratio changes with it. Have it to hand before you start: MLSS is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Influent flow</strong> is measured in m³/day. Change it and Return sludge flow changes with it. Have it to hand before you start: Influent flow is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Return sludge MLSS</strong> is measured in mg/L. Change it and Return sludge ratio and Return sludge flow changes with it. Have it to hand before you start: Return sludge MLSS is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Sludge volume index</strong> is a plain number and the page's own defaults put it at 93.33. It is computed from Settled sludge volume after 30 min and MLSS, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Sludge density index</strong> is a plain number and the page's own defaults put it at 1.07. It is computed from Settled sludge volume after 30 min and MLSS, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Return sludge ratio</strong> is a plain number and the page's own defaults put it at 60. It is computed from MLSS and Return sludge MLSS, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Return sludge flow</strong> is a plain number and the page's own defaults put it at 300. It is computed from Influent flow, MLSS and Return sludge MLSS, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Sludge volume index</th><th>Sludge density index</th><th>Return sludge ratio</th><th>Return sludge flow</th></tr></thead><tbody><tr><td><strong>Settled sludge volume after 30 min</strong> +10%</td><td>+10%</td><td>-9.09%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>MLSS</strong> +10%</td><td>-9.09%</td><td>+10%</td><td>+17.02%</td><td>+17.02%</td></tr><tr><td><strong>Influent flow</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Return sludge MLSS</strong> +10%</td><td>+0%</td><td>+0%</td><td>-13.79%</td><td>-13.79%</td></tr></tbody></table><p>Ranked by leverage, MLSS sits at the top — a ten per cent error in that box shows up as roughly 17 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Settled sludge volume after 30 min = 140 mL/L, MLSS = 1500 mg/L, Influent flow = 250 m³/day and Return sludge MLSS = 4000 mg/L, the answer is <strong>Sludge volume index</strong> = 93.33 mL/g, <strong>Sludge density index</strong> = 1.07, <strong>Return sludge ratio</strong> = 60 % and <strong>Return sludge flow</strong> = 150 m³/day.</li><li>With Settled sludge volume after 30 min = 840 mL/L, MLSS = 3000 mg/L, Influent flow = 500 m³/day and Return sludge MLSS = 8000 mg/L, the answer is <strong>Sludge volume index</strong> = 280 mL/g, <strong>Sludge density index</strong> = 0.357, <strong>Return sludge ratio</strong> = 60 % and <strong>Return sludge flow</strong> = 300 m³/day.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Sludge volume index follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Settled sludge volume after 30 min, MLSS and Influent flow are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Settled sludge volume after 30 min, MLSS and Influent flow and the number you are missing is Sludge volume index and Sludge density index.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/bulb-spacing">Bulb spacing</a>, <a href="/biology/cat-age">Cat age</a> and <a href="/biology/cat-benadryl-dosage">Cat Benadryl dosage Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sludge Volume Index Calculator (SVI) calculator work out?', 'a' => <<<'TXT'
            Sludge volume index, Sludge density index, Return sludge ratio and Return sludge flow, from Settled sludge volume after 30 min and MLSS. The relationship is Sludge volume index = Settled sludge volume after 30 min ÷ MLSS × 1000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Settled sludge volume after 30 min (mL/L), MLSS (mg/L), Influent flow (m³/day), Return sludge MLSS (mg/L). Fill settled sludge volume after 30 min, MLSS and influent flow and leave Sludge volume index empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Sludge volume index, Sludge density index, Return sludge ratio and Return sludge flow can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Sludge volume index = 93.33 mL/g, Sludge density index = 1.07, Return sludge ratio = 60 % and Return sludge flow = 300 m³/day. That comes from the page's own defaults, entered in Settled sludge volume after 30 min; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Sludge volume index is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Settled sludge volume after 30 min left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Sludge volume index at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/bulb-spacing', 'name' => 'Bulb spacing'],
            ['path' => '/biology/cat-age', 'name' => 'Cat age'],
            ['path' => '/biology/cat-benadryl-dosage', 'name' => 'Cat Benadryl dosage Calculator'],
        ],
        'authors' => [],
    ],
];

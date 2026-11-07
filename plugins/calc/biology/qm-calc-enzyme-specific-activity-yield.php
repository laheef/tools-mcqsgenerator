<?php

/**
 * Enzyme Kinetics: Specific Activity and Yield
 * /biology/enzyme-specific-activity-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Enzyme Kinetics: Specific Activity and Yield',
    'meta' => ['title' => 'Enzyme Kinetics: Specific Activity and Yield', 'description' => 'Enzyme Kinetics: Specific Activity and Yield takes Total protein in this step, Total activity in this step and Total protein in the starting material and…', 'h1' => 'Enzyme Kinetics: Specific Activity and Yield', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'total_protein',
                            'label' => 'Total protein in this step',
                            'type' => 'number',
                            'suffix' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '45',
                        ],
                        [
                            'name' => 'total_activity',
                            'label' => 'Total activity in this step',
                            'type' => 'number',
                            'suffix' => 'U',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5400',
                        ],
                        [
                            'name' => 'start_protein',
                            'label' => 'Total protein in the starting material',
                            'type' => 'number',
                            'suffix' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '900',
                        ],
                        [
                            'name' => 'start_activity',
                            'label' => 'Total activity in the starting material',
                            'type' => 'number',
                            'suffix' => 'U',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7200',
                        ],
                        [
                            'name' => 'specific',
                            'label' => 'Specific activity',
                            'type' => 'number',
                            'suffix' => 'U/mg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'start_specific',
                            'label' => 'Starting specific activity',
                            'type' => 'number',
                            'suffix' => 'U/mg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fold',
                            'label' => 'Fold purification',
                            'type' => 'number',
                            'suffix' => '×',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'yield',
                            'label' => 'Activity yield',
                            'type' => 'number',
                            'suffix' => '%',
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
            'title' => 'Purification',
            'results' => ['specific' => 'total_activity/total_protein', 'start_specific' => 'start_activity/start_protein', 'fold' => '(total_activity/total_protein)/(start_activity/start_protein)', 'yield' => 'total_activity/start_activity*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enzyme Kinetics: Specific Activity and Yield takes Total protein in this step, Total activity in this step and Total protein in the starting material and returns Specific activity and Starting specific activity. There is no hidden constant here: change Specific activity and Total protein in this step moves with it. The main result, Specific activity, is reported in U/mg.
        TXT,
        'sections' => [
            ['title' => 'How the Enzyme Kinetics: Specific Activity and Yield calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Enzyme Kinetics: Specific Activity and Yield: it takes 4 numbers and reports Specific activity, Starting specific activity and Fold purification.</p><p>In the form&#039;s own words, Specific activity = Total activity in this step ÷ Total protein in this step.</p><p>The result panel carries Specific activity, Starting specific activity, Fold purification and Activity yield, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Total protein in this step</strong> — in mg</li><li><strong>Total activity in this step</strong> — in U</li><li><strong>Total protein in the starting material</strong> — in mg</li><li><strong>Total activity in the starting material</strong> — in U</li></ul><p>The answers come back as Specific activity in U/mg, Starting specific activity in U/mg, Fold purification in ×, Activity yield in %. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Total protein in this step = 45 mg, Total activity in this step = 5400 U, Total protein in the starting material = 900 mg and Total activity in the starting material = 7200 U gives &lt;strong&gt;Specific activity&lt;/strong&gt; = 120 U/mg, &lt;strong&gt;Starting specific activity&lt;/strong&gt; = 8 U/mg, &lt;strong&gt;Fold purification&lt;/strong&gt; = 15 × and &lt;strong&gt;Activity yield&lt;/strong&gt; = 75 %.</p><ul><li><strong>Specific activity</strong> = 120 U/mg</li><li><strong>Starting specific activity</strong> = 8 U/mg</li><li><strong>Fold purification</strong> = 15 ×</li><li><strong>Activity yield</strong> = 75 %</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Specific activity</strong> = <code>Total activity in this step ÷ Total protein in this step</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Specific activity&lt;/strong&gt; = 120, &lt;strong&gt;Starting specific activity&lt;/strong&gt; = 8, &lt;strong&gt;Fold purification&lt;/strong&gt; = 15 and &lt;strong&gt;Activity yield&lt;/strong&gt; = 75 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Specific activity takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Specific activity</strong> = <code>Total activity in this step ÷ Total protein in this step</code></li><li><strong>Starting specific activity</strong> = <code>Total activity in the starting material ÷ Total protein in the starting material</code></li><li><strong>Fold purification</strong> = <code>(Total activity in this step ÷ Total protein in this step) ÷ (Total activity in the starting material ÷ Total protein in the starting material)</code></li><li><strong>Activity yield</strong> = <code>Total activity in this step ÷ Total activity in the starting material × 100</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Specific activity, Starting specific activity and Fold purification can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Total protein in this step from 45 to 90, leaving every other box alone. The panel moves from &lt;strong&gt;Specific activity&lt;/strong&gt; 120 U/mg, &lt;strong&gt;Starting specific activity&lt;/strong&gt; 8 U/mg, &lt;strong&gt;Fold purification&lt;/strong&gt; 15 × and &lt;strong&gt;Activity yield&lt;/strong&gt; 75 % to &lt;strong&gt;Specific activity&lt;/strong&gt; 60 U/mg, &lt;strong&gt;Starting specific activity&lt;/strong&gt; 8 U/mg, &lt;strong&gt;Fold purification&lt;/strong&gt; 7.5 × and &lt;strong&gt;Activity yield&lt;/strong&gt; 75 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Specific activity, Starting specific activity and Fold purification are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Total protein in this step and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Total protein in this step, Total activity in this step and Total protein in the starting material measured, Specific activity and Starting specific activity wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/mulch">Mulch</a>, <a href="/biology/multi-reverse-translate">Multi Reverse Translate Calculator</a> and <a href="/biology/mushroom-yield">Mushroom Yield Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Enzyme Kinetics: Specific Activity and Yield calculator work out?', 'a' => <<<'TXT'
            Specific activity, Starting specific activity, Fold purification and Activity yield, from Total activity in this step and Total protein in this step. The relationship is Specific activity = Total activity in this step ÷ Total protein in this step.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total protein in this step (mg), Total activity in this step (U), Total protein in the starting material (mg), Total activity in the starting material (U). Enter total_protein, total_activity and start_protein; Specific activity is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Specific activity, Starting specific activity, Fold purification and Activity yield can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Specific activity = 120 U/mg, Starting specific activity = 8 U/mg, Fold purification = 15 × and Activity yield = 75 %. The figures come from Total protein in this step as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Specific activity is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Total protein in this step blank and the page solves for it, reporting Specific activity instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Specific activity keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/mulch', 'name' => 'Mulch'],
            ['path' => '/biology/multi-reverse-translate', 'name' => 'Multi Reverse Translate Calculator'],
            ['path' => '/biology/mushroom-yield', 'name' => 'Mushroom Yield Calculator'],
        ],
        'authors' => [],
    ],
];

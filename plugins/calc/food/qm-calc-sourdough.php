<?php

/**
 * Sourdough
 * /food/sourdough
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sourdough',
    'meta' => ['title' => 'Sourdough Calculator: Formula, Steps & Examples', 'description' => 'Calculate sourdough starter and salt from flour, water and baker’s percentages. Check units and follow the recipe or package directions.', 'h1' => 'Sourdough Calculator', 'updated' => '2026-08-04'],
    'sections' => [
        [
            'title' => 'Sourdough: Baker\'s math',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentage_starter',
                            'label' => 'Percentage starter',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flour',
                            'label' => 'Flour',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water',
                            'label' => 'Water',
                            'type' => 'number',
                            'help' => 'We recommended that your water weighs around 67% of the flour weight.',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'starter',
                            'label' => 'Starter',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salt',
                            'label' => 'Salt',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Starter Hydration',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sHydration',
                            'label' => 'Starter hydration',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sFlour',
                            'label' => 'Starter flour',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sWater',
                            'label' => 'Starter water',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Total Dough',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tDough',
                            'label' => 'Total weight of dough ',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tFlour',
                            'label' => 'Total flour',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tWater',
                            'label' => 'Total water',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tHydration',
                            'label' => 'Total hydration',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'starter = percentage_starter / 100 * flour',
            'results' => ['percentage_starter' => '100*starter/flour', 'starter' => '(1/100)*flour*percentage_starter', 'flour' => '100*starter/percentage_starter'],
        ],
        [
            'title' => 'salt = percentage_starter / 1000 * flour',
            'results' => ['percentage_starter' => '1000*salt/flour', 'flour' => '1000*salt/percentage_starter', 'salt' => '(1/1000)*flour*percentage_starter'],
        ],
        [
            'title' => ' tWater =tHydration/100*(tDough-salt-tWater)',
            'results' => ['tHydration' => '-100*tWater/(salt - tDough + tWater)', 'tDough' => 'salt + tWater + 100*tWater/tHydration', 'tWater' => 'tHydration*(-salt + tDough)/(tHydration + 100)', 'salt' => 'tDough - tWater - 100*tWater/tHydration'],
        ],
        [
            'title' => 'tDough = tFlour+tWater + salt ',
            'results' => ['tDough' => 'salt + tFlour + tWater', 'tWater' => '-salt + tDough - tFlour', 'salt' => 'tDough - tFlour - tWater', 'tFlour' => '-salt + tDough - tWater'],
        ],
        [
            'title' => 'tFlour = flour + sFlour',
            'results' => ['sFlour' => '-flour + tFlour', 'flour' => '-sFlour + tFlour', 'tFlour' => 'flour + sFlour'],
        ],
        [
            'title' => 'tWater = water + sWater',
            'results' => ['sWater' => 'tWater - water', 'tWater' => 'sWater + water', 'water' => '-sWater + tWater'],
        ],
        [
            'title' => 'sFlour = (100*starter)/(100+sHydration)',
            'results' => ['sFlour' => '100*starter/(sHydration + 100)', 'starter' => '(1/100)*sFlour*(sHydration + 100)', 'sHydration' => '-100 + 100*starter/sFlour'],
        ],
        [
            'title' => 'sWater = starter - sFlour',
            'results' => ['sFlour' => '-sWater + starter', 'sWater' => '-sFlour + starter', 'starter' => 'sFlour + sWater'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Sourdough turns Percentage starter and Flour into Water and Starter. There is no hidden constant here: change water and percentage starter moves with it. The main result, Water, is reported in milliliters.
        TXT,
        'sections' => [
            ['title' => 'How the Sourdough calculator works', 'html' => <<<'TXT'
            <p>Sourdough answers one question from 2 numbers, and the answer is Water, Starter and Salt.</p><p>The relationship it solves reads Starter = (1 ÷ 100) × Flour × Percentage starter.</p><p>The answers are Water, Starter, Salt and Starter hydration; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Percentage starter</strong> — in %</li><li><strong>Flour</strong> — in grams</li></ul><p>What you get back is Water in milliliters, Starter in grams, Salt in grams, Starter hydration in %, Starter flour in grams, Starter water in milliliters, Total weight of dough in grams, Total flour in grams, Total water in milliliters, Total hydration in %, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Percentage starter = 20 %, Flour = 100 g, Water = 1000 ml, Salt = 10 g, Starter hydration = 100 %, Starter flour = 1000 g, Starter water = 10 ml, Total weight of dough = 100 g, Total flour = 1000 g, Total water = 10 ml and Total hydration = 100 % — through the same formula and the panel reports <strong>Starter</strong> = 20 g.</p><ul><li><strong>Starter</strong> = 20 g</li></ul><p>The line behind those figures is <strong>Starter</strong> = <code>(1 ÷ 100) × Flour × Percentage starter</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Starter</strong> = 20 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Water offers 16 units and opens on milliliters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Starter</strong> = <code>(1 ÷ 100) × Flour × Percentage starter</code></li><li><strong>Percentage starter</strong> = <code>100 × Starter ÷ Flour</code></li><li><strong>Flour</strong> = <code>100 × Starter ÷ Percentage starter</code></li><li><strong>Salt</strong> = <code>(1 ÷ 1000) × Flour × Percentage starter</code></li><li><strong>Total water</strong> = <code>Total hydration × ( − Salt + Total weight of dough) ÷ (Total hydration + 100)</code></li><li><strong>Total hydration</strong> = <code>− 100 × Total water ÷ (Salt − Total weight of dough + Total water)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Starter</strong> = <code>(1 ÷ 100) × Flour × Percentage starter</code> — the form to use when Flour and Percentage starter are the values you have.</li><li><strong>Percentage starter</strong> = <code>100 × Starter ÷ Flour</code> — the form to use when Starter and Flour are the values you have.</li><li><strong>Flour</strong> = <code>100 × Starter ÷ Percentage starter</code> — the form to use when Starter and Percentage starter are the values you have.</li><li><strong>Salt</strong> = <code>(1 ÷ 1000) × Flour × Percentage starter</code> — the form to use when Flour and Percentage starter are the values you have.</li><li><strong>Percentage starter</strong> = <code>1000 × Salt ÷ Flour</code> — the form to use when Salt and Flour are the values you have.</li><li><strong>Flour</strong> = <code>1000 × Salt ÷ Percentage starter</code> — the form to use when Salt and Percentage starter are the values you have.</li><li><strong>Total water</strong> = <code>Total hydration × ( − Salt + Total weight of dough) ÷ (Total hydration + 100)</code> — the form to use when Total hydration, Salt and Total weight of dough are the values you have.</li><li><strong>Total hydration</strong> = <code>− 100 × Total water ÷ (Salt − Total weight of dough + Total water)</code> — the form to use when Total water, Salt and Total weight of dough are the values you have.</li></ul><p>Any one of Starter, Percentage starter and Flour can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Percentage starter from 20 to 40, leaving every other box alone. The panel moves from <strong>Starter</strong> 20 g to <strong>Starter</strong> 40 g.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Flour is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Water, Starter and Salt are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Percentage starter left as a guess.</strong> If Percentage starter is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Flour left as a guess.</strong> If Flour is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> If Percentage starter is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Sourdough form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Percentage starter</strong> is measured in %. It feeds Starter, Flour and Salt. Fill it from a measurement rather than a memory — Percentage starter is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Flour</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. It feeds Percentage starter, Starter and Salt. Fill it from a measurement rather than a memory — Flour is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p> Read them in this order:</p><ul><li><strong>Water</strong> is a milliliters figure. It is worked out from Starter water and Total water. </li><li><strong>Starter</strong> is a grams figure and the page's own defaults put it at 20 g. It is worked out from Flour and Percentage starter. </li><li><strong>Salt</strong> is a grams figure. It is worked out from Flour and Percentage starter. </li><li><strong>Starter hydration</strong> is a plain number. It is worked out from Starter and Starter flour. </li><li><strong>Starter flour</strong> is a grams figure. It is worked out from Flour and Total flour. </li><li><strong>Starter water</strong> is a milliliters figure. It is worked out from Total water and Water. </li><li><strong>Total weight of dough</strong> is a grams figure. It is worked out from Salt, Total water and Total hydration. </li><li><strong>Total flour</strong> is a grams figure. It is worked out from Salt, Total weight of dough and Total water. </li><li><strong>Total water</strong> is a milliliters figure. It is worked out from Total hydration, Salt and Total weight of dough. </li><li><strong>Total hydration</strong> is a plain number. It is worked out from Total water, Salt and Total weight of dough. </li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Water follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are milliliters and grams and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Percentage starter and Flour are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Percentage starter and Flour is what you already know and Water and Starter is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related calculators: <a href="/food/bakers-percentage">Baker&#x27;s percentage</a>, <a href="/food/yeast-converter">Yeast converter</a> and <a href="/food/self-rising-flour">Self-rising flour</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sourdough calculator work out?', 'a' => 'Water, Starter, Salt and Starter hydration, from Flour and Percentage starter. The relationship is Starter = (1 ÷ 100) × Flour × Percentage starter.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Percentage starter (%), Flour (grams). Enter percentage starter and flour; Water is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Starter, Percentage starter, Flour and Salt blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'Are the Sourdough results exact?', 'a' => 'It follows the selected inputs and displayed relationship, but ingredients and process conditions vary. Check units, measure carefully and follow a tested recipe or relevant brewing guidance.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Water is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Percentage starter blank and the page solves for it, reporting Water instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Water keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/bakers-percentage', 'name' => 'Baker\'s percentage'],
            ['path' => '/food/yeast-converter', 'name' => 'Yeast converter'],
            ['path' => '/food/self-rising-flour', 'name' => 'Self-rising flour']
        ],
    ],
];

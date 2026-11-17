<?php

/**
 * Grams to cups
 * /food/grams-to-cups
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Grams to cups',
    'meta' => ['title' => 'Grams to cups Calculator — Formula & Results', 'description' => 'Convert ingredient grams to cups using ingredient-specific density, or solve for a missing amount. Use consistent units and the correct ingredient density.', 'h1' => 'Grams to cups Calculator', 'updated' => '2026-10-06'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ingredient',
                            'label' => 'Ingredient',
                            'type' => 'select',
                            'options' => [
                                'Water' => '1000',
                                'Flour' => '600',
                                'Milk' => '1038',
                                'Sugar' => '845',
                                'Salt' => '1217',
                                'Honey' => '1420',
                                'Butter' => '911',
                                'Olive oil' => '918',
                                'Rice (raw)' => '850',
                                'Oats' => '410',
                                'Jam' => '1330',
                                'Nutella' => '1260',
                                'Maple syrup' => '1320',
                                'Cream, 38% fat' => '984',
                                'Cream, 13% fat' => '1013',
                                'Powder sugar' => '560',
                                'Flaked almonds' => '430',
                                'Cacao' => '520',
                                'Corn starch' => '650',
                                'Rye flour' => '670',
                                'Custom' => '',
                            ],
                            'dataset' => 'ingredient',
                            'control' => 'DROPDOWN',
                            'default' => 'Water',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'density',
                            'label' => 'Density',
                            'type' => 'result',
                            'unit' => '21',
                            'unit_default' => 'kgm3',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.00001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cups',
                            'label' => 'Cups',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cupsUS',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'weight = cups * one_way(density/1000)*0.2365882365',
            'results' => ['cups' => '(2000000000/473176473)*weight/((1/1000)*density)', 'weight' => '(473176473/2000000000)*cups*((1/1000)*density)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Grams to cups takes Ingredient, Weight and Cups and returns Density. The arithmetic is the whole method: density is worked out from ingredient by one formula, applied once. Density comes back in kilograms per cubic meter unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Grams to cups calculator works', 'html' => <<<'TXT'
            <p>Grams to cups answers one question from 3 numbers, and the answer is Density.</p><p>In the form&#039;s own words, Weight = (473176473 ÷ 2000000000) × Cups × ((1 ÷ 1000) × Density).</p><p>What comes back is Density — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Ingredient</strong> — a plain number, no unit</li><li><strong>Weight</strong> — in grams</li><li><strong>Cups</strong> — in US customary cups (recipes)</li></ul><p>The answer comes back as Density in kilograms per cubic meter. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Density offers 21 units and opens on kilograms per cubic meter, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Weight</strong> = <code>(473176473 ÷ 2000000000) × Cups × ((1 ÷ 1000) × Density)</code></li><li><strong>Cups</strong> = <code>(2000000000 ÷ 473176473) × Weight ÷ ((1 ÷ 1000) × Density)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Weight</strong> = <code>(473176473 ÷ 2000000000) × Cups × ((1 ÷ 1000) × Density)</code> — the form to use when Cups and Density are the values you have.</li><li><strong>Cups</strong> = <code>(2000000000 ÷ 473176473) × Weight ÷ ((1 ÷ 1000) × Density)</code> — the form to use when Weight and Density are the values you have.</li></ul><p>Any one of Weight and Cups can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Weight and Cups is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Density is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Ingredient left as a guess.</strong> If Ingredient is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Weight left as a guess.</strong> If Weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Ingredient and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Ingredient</strong> takes a plain number with no unit attached. Check the field label and unit before calculating.</li><li><strong>Weight</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. Change it and Cups changes with it. Check the field label and unit before calculating.</li><li><strong>Cups</strong> is a us customary cups (recipes) quantity: the page opens it in cupsUS and converts anything else you pick before the formula runs. Change it and Weight changes with it. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p> Read them in this order:</p><ul><li><strong>Density</strong> is a kilograms per cubic meter figure. It is produced by the page's own calculation, which reads the form rather than one equation. </li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p> The tables, with the unit each box opens in:</p><ul><li><strong>kilograms per cubic meter</strong> — opens in <em>kgm3</em>, and the chip also carries µg/mL, g/L, mg/L, kg/m³, lb/cu ft and g/mL. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>grams</strong> — opens in <em>g</em>, and the chip also carries g, mg, lb, oz and st. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>US customary cups (recipes)</strong> — opens in <em>cupsUS</em>, and the chip also carries mL, L, cl, cc, cm³ and m³. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. </p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Ingredient, Weight and Cups. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Ingredient into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Density in kgm3 with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Density follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms per cubic meter, grams and US customary cups (recipes) and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Ingredient, Weight and Cups are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Ingredient, Weight and Cups and the number you are missing is Density.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/healthy-coffee">Healthy coffee Calculator</a>, <a href="/food/how-much-ham-per-person">How much ham per person Calculator</a> and <a href="/food/ice-cream">Ice cream Calculator</a>.</p>
            TXT],
            ['title' => 'Limits and data handling', 'html' => <<<'TXT'
            <p>This calculator applies the relationships and assumptions shown on the page to the values entered. It cannot verify ingredient labels, measurements, equipment or conditions that are not represented in the form. Check the selected units and consult recipe, product or safety instructions where they apply.</p>
            <p>The result is a calculation, not a measurement of the food or drink. Use a scale, thermometer or product label when the real-world quantity or safety status matters.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which values do I need before I start?', 'a' => 'Ingredient, Weight (grams), Cups (US customary cups (recipes)). With ingredient, weight and cups in place, Density can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Weight and Cups blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Ingredient left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
        ],
        'related' => [
            ['path' => '/food/pounds-to-cups', 'name' => 'Pounds to cups'],
            ['path' => '/food/cups-to-pounds', 'name' => 'Cups to pounds'],
            ['path' => '/food/ml-to-grams', 'name' => 'ml to grams']
        ],
    ],
];

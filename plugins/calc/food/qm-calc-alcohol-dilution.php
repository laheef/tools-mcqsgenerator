<?php

/**
 * Alcohol dilution
 * /food/alcohol-dilution
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Alcohol dilution',
    'meta' => ['title' => 'Alcohol dilution — Formula, Steps & Examples', 'description' => <<<'TXT'
    Plan how much water or weaker alcohol to add to a stronger drink for a target strength. Check units and follow the recipe or package directions.
    TXT, 'h1' => 'Alcohol dilution Calculator', 'updated' => '2026-07-29'],
    'sections' => [
        [
            'title' => 'Alcohol content',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'strongAlcoholPercentage',
                            'label' => 'Strong alcohol',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'The strong spirit\'s alcohol content.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weakAlcoholPercentage',
                            'label' => 'Water / weak alcohol',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'The alcohol content of the weak alcohol. Use 0% for water.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'desiredPercentage',
                            'label' => 'Target',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'The desired alcohol content after dilution.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Alcohol volume',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amountStrongAlcohol',
                            'label' => 'Strong alcohol',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weakAlcoholAmount',
                            'label' => 'Water / weak alcohol',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wholeSolutionAmount',
                            'label' => 'Final volume',
                            'type' => 'number',
                            'help' => 'Total amount of the final solution.',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'contraction',
                            'label' => 'Contraction',
                            'type' => 'number',
                            'help' => 'The amount of final volume lost due to alcohol contraction.',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'finalVolumeContraction',
                            'label' => 'Volume after contraction',
                            'type' => 'number',
                            'help' => 'The final volume minus the amount lost due to contraction.',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalPortions',
                            'label' => 'Total portions',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'show_contraction_vol',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show contraction volume' => '1', '' => '0'],
                            'dataset' => 'Contraction volume',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Check out how to use this calculator!'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'weakAlcoholAmount = (strongAlcoholPercentage-desiredPercentage)*amountStrongAlcohol/(desiredPercentage-weakAlcoholPercentage)',
            'results' => [
                'weakAlcoholAmount' => 'amountStrongAlcohol*(-desiredPercentage + strongAlcoholPercentage)/(desiredPercentage - weakAlcoholPercentage)',
                'desiredPercentage' => '(amountStrongAlcohol*strongAlcoholPercentage + weakAlcoholAmount*weakAlcoholPercentage)/(amountStrongAlcohol + weakAlcoholAmount)',
                'weakAlcoholPercentage' => '(amountStrongAlcohol*desiredPercentage - amountStrongAlcohol*strongAlcoholPercentage + desiredPercentage*weakAlcoholAmount)/weakAlcoholAmount',
                'amountStrongAlcohol' => 'weakAlcoholAmount*(-desiredPercentage + weakAlcoholPercentage)/(desiredPercentage - strongAlcoholPercentage)',
                'strongAlcoholPercentage' => '(amountStrongAlcohol*desiredPercentage + desiredPercentage*weakAlcoholAmount - weakAlcoholAmount*weakAlcoholPercentage)/amountStrongAlcohol',
            ],
        ],
        [
            'title' => 'wholeSolutionAmount = amountStrongAlcohol + weakAlcoholAmount',
            'results' => ['weakAlcoholAmount' => '-amountStrongAlcohol + wholeSolutionAmount', 'amountStrongAlcohol' => '-weakAlcoholAmount + wholeSolutionAmount', 'wholeSolutionAmount' => 'amountStrongAlcohol + weakAlcoholAmount'],
        ],
        [
            'title' => 'contraction = get_contraction(wholeSolutionAmount, desiredPercentage)',
            'results' => ['contraction' => 'get_contraction(wholeSolutionAmount, desiredPercentage)'],
        ],
        [
            'title' => 'finalVolumeContraction = wholeSolutionAmount - get_contraction(wholeSolutionAmount, desiredPercentage)',
            'results' => ['finalVolumeContraction' => 'wholeSolutionAmount - get_contraction(wholeSolutionAmount, desiredPercentage)'],
        ],
        [
            'title' => 'totalPortions = (desiredPercentage- weakAlcoholPercentage)+(strongAlcoholPercentage - desiredPercentage)',
            'results' => ['totalPortions' => 'strongAlcoholPercentage - weakAlcoholPercentage', 'weakAlcoholPercentage' => 'strongAlcoholPercentage - totalPortions', 'strongAlcoholPercentage' => 'totalPortions + weakAlcoholPercentage'],
        ],
        [
            'title' => 'amountStrongAlcohol=((desiredPercentage- weakAlcoholPercentage)/totalPortions) * wholeSolutionAmount ',
            'results' => [
                'desiredPercentage' => 'amountStrongAlcohol*totalPortions/wholeSolutionAmount + weakAlcoholPercentage',
                'totalPortions' => 'wholeSolutionAmount*(desiredPercentage - weakAlcoholPercentage)/amountStrongAlcohol',
                'weakAlcoholPercentage' => '-amountStrongAlcohol*totalPortions/wholeSolutionAmount + desiredPercentage',
                'amountStrongAlcohol' => 'wholeSolutionAmount*(desiredPercentage - weakAlcoholPercentage)/totalPortions',
                'wholeSolutionAmount' => 'amountStrongAlcohol*totalPortions/(desiredPercentage - weakAlcoholPercentage)',
            ],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_contraction",function(wholeSolutionAmount,desiredPercentage){var amountLost;if(desiredPercentage<=10){amountLost=wholeSolutionAmount*6/1000;return amountLost}else if(10<desiredPercentage&&desiredPercentage<=20){amountLost=wholeSolutionAmount*15/1000;return amountLost}else if(20<desiredPercentage&&desiredPercentage<=30){amountLost=wholeSolutionAmount*24/1000;return amountLost}if(30<desiredPercentage&&desiredPercentage<=35){amountLost=wholeSolutionAmount*26/1000;return amountLost}else if(35<desiredPercentage&&desiredPercentage<=40){amountLost=wholeSolutionAmount*29/1000;return amountLost}else if(40<desiredPercentage&&desiredPercentage<=60){amountLost=wholeSolutionAmount*31/1000;return amountLost}else if(60<desiredPercentage&&desiredPercentage<=70){amountLost=wholeSolutionAmount*27/1000;return amountLost}else if(70<desiredPercentage&&desiredPercentage<=80){amountLost=wholeSolutionAmount*20/1000;return amountLost}else if(80<desiredPercentage&&desiredPercentage<=100){amountLost=wholeSolutionAmount*10/1000;return amountLost}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Strong alcohol, Target and Strong alcohol into Alcohol dilution and the answer comes back as Water / weak alcohol and Final volume. It is a single relationship that reads water / weak alcohol out of strong alcohol, not a table of canned results keyed by them. Units for Water / weak alcohol default to milliliters and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Alcohol dilution calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Alcohol dilution: it takes 4 numbers and reports Water / weak alcohol, Final volume and Contraction.</p><p>In the form&#039;s own words, Water / weak alcohol = Strong alcohol × ( − Target + Strong alcohol) ÷ (Target − Water / weak alcohol).</p><p>The answers are Water / weak alcohol, Final volume, Contraction and Volume after contraction; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Strong alcohol</strong> — in %. The strong spirit&#039;s alcohol content.</li><li><strong>Water / weak alcohol</strong> — in %. The alcohol content of the weak alcohol. Use 0% for water.</li><li><strong>Target</strong> — in %. The desired alcohol content after dilution.</li><li><strong>Strong alcohol</strong> — in milliliters</li></ul><p>The result boxes are Water / weak alcohol in milliliters, Final volume in milliliters, Contraction in milliliters, Volume after contraction in milliliters, Total portions; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Water / weak alcohol</strong> = <code>Strong alcohol × ( − Target + Strong alcohol) ÷ (Target − Water / weak alcohol)</code></li><li><strong>Target</strong> = <code>(Strong alcohol × Strong alcohol + Water / weak alcohol × Water / weak alcohol) ÷ (Strong alcohol + Water / weak alcohol)</code></li><li><strong>Strong alcohol</strong> = <code>Water / weak alcohol × ( − Target + Water / weak alcohol) ÷ (Target − Strong alcohol)</code></li><li><strong>Final volume</strong> = <code>Strong alcohol + Water / weak alcohol</code></li><li><strong>Contraction</strong> = <code>get_contraction(Final volume, Target)</code></li><li><strong>Volume after contraction</strong> = <code>Final volume − get_contraction(Final volume, Target)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Water / weak alcohol</strong> = <code>Strong alcohol × ( − Target + Strong alcohol) ÷ (Target − Water / weak alcohol)</code> — the form to use when Strong alcohol, Target, Strong alcohol and Water / weak alcohol are the values you have.</li><li><strong>Target</strong> = <code>(Strong alcohol × Strong alcohol + Water / weak alcohol × Water / weak alcohol) ÷ (Strong alcohol + Water / weak alcohol)</code> — the form to use when Strong alcohol, Strong alcohol, Water / weak alcohol and Water / weak alcohol are the values you have.</li><li><strong>Water / weak alcohol</strong> = <code>(Strong alcohol × Target − Strong alcohol × Strong alcohol + Target × Water / weak alcohol) ÷ Water / weak alcohol</code> — the form to use when Strong alcohol, Target, Strong alcohol and Water / weak alcohol are the values you have.</li><li><strong>Strong alcohol</strong> = <code>Water / weak alcohol × ( − Target + Water / weak alcohol) ÷ (Target − Strong alcohol)</code> — the form to use when Water / weak alcohol, Target, Water / weak alcohol and Strong alcohol are the values you have.</li><li><strong>Strong alcohol</strong> = <code>(Strong alcohol × Target + Target × Water / weak alcohol − Water / weak alcohol × Water / weak alcohol) ÷ Strong alcohol</code> — the form to use when Strong alcohol, Target, Water / weak alcohol and Water / weak alcohol are the values you have.</li><li><strong>Final volume</strong> = <code>Strong alcohol + Water / weak alcohol</code> — the form to use when Strong alcohol and Water / weak alcohol are the values you have.</li><li><strong>Water / weak alcohol</strong> = <code>− Strong alcohol + Final volume</code> — the form to use when Strong alcohol and Final volume are the values you have.</li><li><strong>Strong alcohol</strong> = <code>− Water / weak alcohol + Final volume</code> — the form to use when Water / weak alcohol and Final volume are the values you have.</li></ul><p>Any one of Water / weak alcohol, Target and Water / weak alcohol can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Strong alcohol carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Water / weak alcohol, Final volume and Contraction are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Strong alcohol left as a guess.</strong> Anything typed into Strong alcohol is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Water / weak alcohol left as a guess.</strong> Anything typed into Water / weak alcohol is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> If Strong alcohol is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Alcohol dilution form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Strong alcohol</strong> is measured in %. The strong spirit&#039;s alcohol content. The page reads it when it works out Water / weak alcohol, Target and Water / weak alcohol. Fill it from a measurement rather than a memory — Strong alcohol is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Water / weak alcohol</strong> is measured in %. The alcohol content of the weak alcohol. Use 0% for water. The page reads it when it works out Water / weak alcohol, Target and Strong alcohol. Fill it from a measurement rather than a memory — Water / weak alcohol is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Target</strong> is measured in %. The desired alcohol content after dilution. The page reads it when it works out Water / weak alcohol, Water / weak alcohol and Strong alcohol. Fill it from a measurement rather than a memory — Target is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Strong alcohol</strong> is a milliliters quantity: the page opens it in ml and converts anything else you pick before the formula runs. The page reads it when it works out Water / weak alcohol, Target and Water / weak alcohol. Fill it from a measurement rather than a memory — Strong alcohol is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p> Read them in this order:</p><ul><li><strong>Water / weak alcohol</strong> is a milliliters figure. It is computed from Strong alcohol, Target, Strong alcohol and Water / weak alcohol, so it changes the moment any of them does. </li><li><strong>Final volume</strong> is a milliliters figure. It is computed from Strong alcohol and Water / weak alcohol, so it changes the moment any of them does. </li><li><strong>Contraction</strong> is a milliliters figure. It is computed from Final volume and Target, so it changes the moment any of them does. </li><li><strong>Volume after contraction</strong> is a milliliters figure. It is computed from Final volume and Target, so it changes the moment any of them does. </li><li><strong>Total portions</strong> is a plain number. It is computed from Strong alcohol and Water / weak alcohol, so it changes the moment any of them does. </li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Alcohol dilution actually offers.</p><ul><li><strong>milliliters</strong> — opens in <em>ml</em>, and the chip also carries L, µl, cl, cc, cm³ and tsp. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Water / weak alcohol is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are milliliters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Strong alcohol, Water / weak alcohol and Target are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Strong alcohol, Water / weak alcohol and Target is what you already know and Water / weak alcohol and Final volume is what you need — the reverse of that situation is what the rearranged form is for.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/brine">Brine Calculator</a>, <a href="/food/butter">Butter Calculator</a> and <a href="/food/cake-pans">Cake pan Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Alcohol dilution calculator work out?', 'a' => <<<'TXT'
            Water / weak alcohol, Final volume, Contraction and Volume after contraction, from Strong alcohol, Target, Strong alcohol and Water / weak alcohol. The relationship is Water / weak alcohol = Strong alcohol × ( − Target + Strong alcohol) ÷ (Target − Water / weak alcohol).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Strong alcohol (%), Water / weak alcohol (%), Target (%), Strong alcohol (milliliters). With strong alcohol, water / weak alcohol and target in place, Water / weak alcohol can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Water / weak alcohol, Target, Water / weak alcohol and Strong alcohol blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Water / weak alcohol is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Strong alcohol blank and the page solves for it, reporting Water / weak alcohol instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Water / weak alcohol keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/alcohol-by-volume', 'name' => 'ABV'],
            ['path' => '/food/wedding-alcohol', 'name' => 'Wedding alcohol'],
            ['path' => '/food/party-drink', 'name' => 'Party drink']
        ],
    ],
];

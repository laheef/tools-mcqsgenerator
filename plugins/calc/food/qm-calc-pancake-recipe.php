<?php

/**
 * Pancake recipe
 * /food/pancake-recipe
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pancake recipe',
    'meta' => ['title' => 'Pancake recipe Calculator — Formula & Results', 'description' => 'Scale pancake ingredients and servings from the number of people or portions you need. Check units and follow the recipe or package directions.', 'h1' => 'Pancake recipe Calculator', 'updated' => '2026-08-04'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'people',
                            'label' => 'I want to feed...',
                            'type' => 'number',
                            'suffix' => 'people',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pancake_crepe',
                            'label' => 'With...',
                            'type' => 'select',
                            'options' => ['pancakes' => '1', 'crepes' => '0'],
                            'dataset' => 'what',
                            'default' => 'pancakes',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'per_person',
                            'label' => 'How many?',
                            'type' => 'number',
                            'suffix' => 'per person',
                            'rounding' => ['standard', '0'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'no_of_pancakes',
                            'label' => 'How many in total?',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pan_diameter',
                            'label' => 'Pan diameter',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '20', 'when' => null],
                                ['value' => '8', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calories',
                            'label' => 'Calories per person',
                            'type' => 'number',
                            'suffix' => 'kcal',
                            'help' => 'Of course, this number doesn\'t include toppings ',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Ingredients',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flour',
                            'label' => 'Flour',
                            'type' => 'number',
                            'unit' => '74',
                            'unit_default' => 'g',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'milk',
                            'label' => 'Milk',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eggs',
                            'label' => 'Eggs',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'baking_powder',
                            'label' => 'Baking powder',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'teesp',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'oil',
                            'label' => 'Oil',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'tbsp',
                            'rounding' => ['omni', '0.0001'],
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
                            'suffix' => 'pinches',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'pancake_crepe == 1', 'text' => 'Separate all {{eggs.value}} eggs into 2 bowls – one for yolks, the other for whites.&nbsp;'],
                                ['when' => 'pancake_crepe == 1', 'text' => <<<'TXT'
                                Mix the yolks with {{flour.value}} {{flour.unit}} of flour, {{baking_powder.value}} {{baking_powder.unit}} of baking powder, {{milk.value}} {{milk.unit}} of milk and {{oil.value}} {{oil.unit}} of oil.&nbsp;
                                TXT],
                                ['when' => 'pancake_crepe == 1', 'text' => 'Add {{salt.value}} pinches of salt to the whites and mix till they’re stiff.&nbsp;'],
                                ['when' => 'pancake_crepe == 1', 'text' => 'Add it to the batter and gently stir. Put your pan on a medium hit and pour some batter. Fry till both sides are golden. Bon appetit!&nbsp;'],
                                ['when' => 'pancake_crepe == 0', 'text' => <<<'TXT'
                                Mix {{flour.value}} {{flour.unit}} of flour, {{milk.value}} {{milk.unit}} of milk, {{eggs.value}} eggs, {{salt.value}} pinches of salt, and {{oil.value}} {{oil.unit}} of oil in a bowl.&nbsp;
                                TXT],
                                ['when' => 'pancake_crepe == 0', 'text' => <<<'TXT'
                                Leave it for 15 minutes. Put {{pan_diameter.value}} {{pan_diameter.unit}} frying pan on a medium heat and pour in one portion of batter. Spread it all over and fry for 1-2 minutes, then flip the crepe. Add your fav topping and voila! Bon appetit!
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'no_of_pancakes = people * per_person',
            'results' => ['people' => 'no_of_pancakes/per_person', 'no_of_pancakes' => 'people*per_person', 'per_person' => 'no_of_pancakes/people'],
        ],
        [
            'title' => 'flour = 115 * no_of_pancakes/12 * pancake_crepe + 125*no_of_pancakes/(20^2*12/pan_diameter^2)* (1-pancake_crepe)',
            'results' => ['pan_diameter' => '-4/5*sqrt(5)*sqrt(-(12*flour - 115*no_of_pancakes*pancake_crepe)/(no_of_pancakes*(pancake_crepe - 1)))', 'pancake_crepe' => '(-192/5*flour + no_of_pancakes*pow(pan_diameter, 2))/(no_of_pancakes*(pow(pan_diameter, 2) - 368))', 'no_of_pancakes' => '(192/5)*flour/(-pow(pan_diameter, 2)*pancake_crepe + pow(pan_diameter, 2) + 368*pancake_crepe)', 'flour' => '(5/192)*no_of_pancakes*(-pow(pan_diameter, 2)*pancake_crepe + pow(pan_diameter, 2) + 368*pancake_crepe)'],
        ],
        [
            'title' => 'baking_powder = no_of_pancakes/12* pancake_crepe',
            'results' => ['pancake_crepe' => '12*baking_powder/no_of_pancakes', 'no_of_pancakes' => '12*baking_powder/pancake_crepe', 'baking_powder' => '(1/12)*no_of_pancakes*pancake_crepe'],
        ],
        [
            'title' => 'salt =  no_of_pancakes/12* pancake_crepe + no_of_pancakes/(20^2*12/pan_diameter^2)* (1-pancake_crepe)',
            'results' => ['pan_diameter' => '20*sqrt((no_of_pancakes*pancake_crepe - 12*salt)/(no_of_pancakes*(pancake_crepe - 1)))', 'salt' => '(1/4800)*no_of_pancakes*(-pow(pan_diameter, 2)*pancake_crepe + pow(pan_diameter, 2) + 400*pancake_crepe)', 'pancake_crepe' => '(no_of_pancakes*pow(pan_diameter, 2) - 4800*salt)/(no_of_pancakes*(pow(pan_diameter, 2) - 400))', 'no_of_pancakes' => '4800*salt/(-pow(pan_diameter, 2)*pancake_crepe + pow(pan_diameter, 2) + 400*pancake_crepe)'],
        ],
        [
            'title' => 'milk = 140 * no_of_pancakes/12* pancake_crepe + 1.4*(250*no_of_pancakes/(20^2*12/pan_diameter^2)* (1-pancake_crepe))',
            'results' => ['pan_diameter' => '-4/7*sqrt(14)*sqrt(-(3*milk - 35*no_of_pancakes*pancake_crepe)/(no_of_pancakes*(pancake_crepe - 1)))', 'milk' => '(7/96)*no_of_pancakes*(-pow(pan_diameter, 2)*pancake_crepe + pow(pan_diameter, 2) + 160*pancake_crepe)', 'no_of_pancakes' => '(96/7)*milk/(-pow(pan_diameter, 2)*pancake_crepe + pow(pan_diameter, 2) + 160*pancake_crepe)', 'pancake_crepe' => '(-96/7*milk + no_of_pancakes*pow(pan_diameter, 2))/(no_of_pancakes*(pow(pan_diameter, 2) - 160))'],
        ],
        [
            'title' => 'eggs = 3 * no_of_pancakes/12* pancake_crepe + 3*no_of_pancakes/(20^2*12/pan_diameter^2)* (1-pancake_crepe)',
            'results' => ['pan_diameter' => '-20*sqrt(-(4*eggs - no_of_pancakes*pancake_crepe)/(no_of_pancakes*(pancake_crepe - 1)))', 'eggs' => '(1/1600)*no_of_pancakes*(-pow(pan_diameter, 2)*pancake_crepe + pow(pan_diameter, 2) + 400*pancake_crepe)', 'pancake_crepe' => '(-1600*eggs + no_of_pancakes*pow(pan_diameter, 2))/(no_of_pancakes*(pow(pan_diameter, 2) - 400))', 'no_of_pancakes' => '1600*eggs/(-pow(pan_diameter, 2)*pancake_crepe + pow(pan_diameter, 2) + 400*pancake_crepe)'],
        ],
        [
            'title' => 'calories = one_way((72 * eggs + (364 * (flour/100)) + (42 * (milk/100)) + 5 * baking_powder + 100 * oil) / people)',
            'results' => ['calories' => '((1/50)*(250*baking_powder + 3600*eggs + 182*flour + 21*milk + 5000*oil)/people)'],
        ],
        [
            'title' => 'oil = 3 * no_of_pancakes/12* pancake_crepe + 4*no_of_pancakes/(20^2*12/pan_diameter^2)* (1-pancake_crepe)',
            'results' => ['oil' => '(1/1200)*no_of_pancakes*(-pow(pan_diameter, 2)*pancake_crepe + pow(pan_diameter, 2) + 300*pancake_crepe)', 'pan_diameter' => '10*sqrt(3)*sqrt((no_of_pancakes*pancake_crepe - 4*oil)/(no_of_pancakes*(pancake_crepe - 1)))', 'pancake_crepe' => '(no_of_pancakes*pow(pan_diameter, 2) - 1200*oil)/(no_of_pancakes*(pow(pan_diameter, 2) - 300))', 'no_of_pancakes' => '1200*oil/(-pow(pan_diameter, 2)*pancake_crepe + pow(pan_diameter, 2) + 300*pancake_crepe)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter I want to feed… and How many? into Pancake recipe and the answer comes back as With… and How many in total?. It is a single relationship that reads with… out of i want to feed…, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Pancake recipe calculator works', 'html' => <<<'TXT'
            <p>The Pancake recipe calculator applies one relationship to 2 numbers and reports With…, How many in total? and Pan diameter.</p><p>The relationship it solves reads How many in total? = I want to feed... × How many?.</p><p>What comes back is With…, How many in total?, Pan diameter and Calories per person — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>I want to feed…</strong> — in people</li><li><strong>How many?</strong> — in per person</li></ul><p>What you get back is With…, How many in total?, Pan diameter in centimeters, Calories per person in kcal, Flour in grams, Milk in milliliters, Eggs, Baking powder in teaspoons (5 mL), Oil in tablespoons (15 mL), Salt in pinches, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — I want to feed… = 10 people, With… = 1, How many? = 4 per person, Pan diameter = 20 cm, Calories per person = 10 kcal, Flour = 100 g, Milk = 1000 ml, Eggs = 10, Baking powder = 100 teesp, Oil = 1000 tbsp and Salt = 10 pinches — through the same formula and the panel reports <strong>How many in total?</strong> = 40.</p><ul><li><strong>How many in total?</strong> = 40</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>How many in total?</strong> = <code>I want to feed... × How many?</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>How many in total?</strong> = 40. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Pan diameter lists 7 options and opens on centimeters. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>How many in total?</strong> = <code>I want to feed... × How many?</code></li><li><strong>I want to feed…</strong> = <code>How many in total? ÷ How many?</code></li><li><strong>How many?</strong> = <code>How many in total? ÷ I want to feed...</code></li><li><strong>Flour</strong> = <code>(5 ÷ 192) × How many in total? × ( − (Pan diameter)^(2) × With... + (Pan diameter)^(2) + 368 × With...)</code></li><li><strong>Pan diameter</strong> = <code>− 4 ÷ 5 × √(5) × √( − (12 × Flour − 115 × How many in total? × With...) ÷ (How many in total? × (With... − 1)))</code></li><li><strong>With…</strong> = <code>( − 192 ÷ 5 × Flour + How many in total? × (Pan diameter)^(2)) ÷ (How many in total? × ((Pan diameter)^(2) − 368))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>How many in total?</strong> = <code>I want to feed... × How many?</code> — the form to use when I want to feed… and How many? are the values you have.</li><li><strong>I want to feed…</strong> = <code>How many in total? ÷ How many?</code> — the form to use when How many in total? and How many? are the values you have.</li><li><strong>How many?</strong> = <code>How many in total? ÷ I want to feed...</code> — the form to use when How many in total? and I want to feed… are the values you have.</li><li><strong>Flour</strong> = <code>(5 ÷ 192) × How many in total? × ( − (Pan diameter)^(2) × With... + (Pan diameter)^(2) + 368 × With...)</code> — the form to use when How many in total?, Pan diameter and With… are the values you have.</li><li><strong>Pan diameter</strong> = <code>− 4 ÷ 5 × √(5) × √( − (12 × Flour − 115 × How many in total? × With...) ÷ (How many in total? × (With... − 1)))</code> — the form to use when Flour, How many in total? and With… are the values you have.</li><li><strong>With…</strong> = <code>( − 192 ÷ 5 × Flour + How many in total? × (Pan diameter)^(2)) ÷ (How many in total? × ((Pan diameter)^(2) − 368))</code> — the form to use when Flour, How many in total? and Pan diameter are the values you have.</li><li><strong>How many in total?</strong> = <code>(192 ÷ 5) × Flour ÷ ( − (Pan diameter)^(2) × With... + (Pan diameter)^(2) + 368 × With...)</code> — the form to use when Flour, Pan diameter and With… are the values you have.</li><li><strong>Baking powder</strong> = <code>(1 ÷ 12) × How many in total? × With...</code> — the form to use when How many in total? and With… are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of How many in total?, I want to feed… and How many? can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double I want to feed... from 10 to 20, leaving every other box alone. The panel moves from <strong>How many in total?</strong> 40 to <strong>How many in total?</strong> 80.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> With…, How many in total? and Pan diameter are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>I want to feed… left as a guess.</strong> Anything typed into I want to feed… is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>How many? left as a guess.</strong> Anything typed into How many? is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in I want to feed... and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Pancake recipe form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>I want to feed…</strong> is measured in people. It feeds How many in total?, How many? and Calories per person. Fill it from a measurement rather than a memory — I want to feed… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>How many?</strong> is measured in per person. It feeds I want to feed… and How many in total?. Fill it from a measurement rather than a memory — How many? is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have I want to feed… and How many? ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with I want to feed… — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check With… against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind With… is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover centimeters, grams and milliliters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are I want to feed… and How many? and the number you are missing is With… and How many in total?.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>Related calculators: <a href="/food/perfect-pancake">Perfect pancake</a>, <a href="/food/self-rising-flour">Self-rising flour</a> and <a href="/food/cake-pans">Cake pan</a>.</p>
            TXT],
            ['title' => 'Limits and data handling', 'html' => <<<'TXT'
            <p>This calculator applies the relationships and assumptions shown on the page to the values entered. It cannot verify ingredient labels, measurements, equipment or conditions that are not represented in the form. Check the selected units and consult recipe, product or safety instructions where they apply.</p>
            <p>The result is a calculation, not a measurement of the food or drink. Use a scale, thermometer or product label when the real-world quantity or safety status matters.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pancake recipe calculator work out?', 'a' => <<<'TXT'
            With…, How many in total?, Pan diameter and Calories per person, from I want to feed… and How many?. The relationship is How many in total? = I want to feed... × How many?.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            I want to feed… (people), How many? (per person). Enter i want to feed… and how many?; With... is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. How many in total?, I want to feed…, How many? and Flour can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'Are the Pancake recipe results exact?', 'a' => 'It uses the values and assumptions represented in the form. Real ingredients and conditions can vary, so check units and follow the recipe, product label or safety instructions that apply.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of With... is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave I want to feed... blank and the page solves for it, reporting With... instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. With... keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/perfect-pancake', 'name' => 'Perfect pancake'],
            ['path' => '/food/self-rising-flour', 'name' => 'Self-rising flour'],
            ['path' => '/food/cake-pans', 'name' => 'Cake pan']
        ],
    ],
];

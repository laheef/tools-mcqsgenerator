<?php

/**
 * Grams to teaspoons
 * /food/grams-to-tsp
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Grams to teaspoons',
    'meta' => ['title' => 'Grams to teaspoons: Formula, Steps & Results', 'description' => 'Convert grams to teaspoons using the selected ingredient’s density. Check the ingredient, packing and units before using the result.', 'h1' => 'Grams to teaspoons Calculator', 'updated' => '2026-09-28'],
    'raw' => [
        'vars' => [
            'density' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'density_flour' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'density_nuts' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'density_oil' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'density_sugar' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'flour' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => 'Fcz8p67M_DzJJyD2siynL'],
            'grams' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'ingredients' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'VW1z0s2bsccIV2LqeH8wG', 'c' => null],
                ],
                'ds' => 'MswG2urIs85oKkNgmNMJr',
            ],
            'more' => [
                'type' => 'dependent',
                'defaults' => [
                    ['value' => '0'],
                ],
            ],
            'nuts' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => 'Rzaktx9-ZhXWczkVtgtDN'],
            'oil' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'O04ot-V2OCbvHS_FxQLs2', 'c' => null],
                ],
                'ds' => 'Rzaktx9-ZhXWczkVtgtDN',
            ],
            'spoons' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'sugar' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '6JolYaGaGnDtFPmAGzQcY', 'c' => null],
                ],
                'ds' => '8f2ijxdNCzDOXDMFXGKDR',
            ],
        ],
        'groups' => [
            [
                'uid' => 'DrjSDGmUe5CujF6HbDHge',
                'title' => 'Select the ingredient',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'density',
                                    'vt' => 'dependent',
                                    'l' => 'Density',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'density_flour',
                                    'vt' => 'dependent',
                                    'l' => 'Density',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'density_sugar',
                                    'vt' => 'dependent',
                                    'l' => 'Density',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'density_oil',
                                    'vt' => 'dependent',
                                    'l' => 'Density',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'density_nuts',
                                    'vt' => 'dependent',
                                    'l' => 'Density',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'vg1tmqio61bHuvTPupkof',
                'title' => 'Convert',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'grams',
                                    'vt' => 'numerical',
                                    'l' => 'Grams',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'spoons',
                                    'vt' => 'numerical',
                                    'l' => 'Spoons',
                                    'us' => '122',
                                    'du' => 'tsp',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'grams = spoons * (get_density(density, more, density_sugar, density_oil)/1000)',
                'var' => [
                    [
                        'l' => 'spoons',
                        'f' => '1000*grams/get_density(density, more, density_sugar, density_oil)',
                        'r' => [
                            'grams',
                            'density',
                            'density_oil',
                            'density_sugar',
                            'more',
                        ],
                    ],
                    [
                        'l' => 'grams',
                        'f' => '(1/1000)*spoons*get_density(density, more, density_sugar, density_oil)',
                        'r' => [
                            'spoons',
                            'density',
                            'density_oil',
                            'density_sugar',
                            'more',
                        ],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'MswG2urIs85oKkNgmNMJr' => [
                'name' => 'Ingredients',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'hQIbjH8deoW95wuouD7g9', 'label' => 'Water', 'value' => '1000'],
                    ['uid' => 'fmAZxqvaIobE8kX9azYrM', 'label' => 'Salt', 'value' => '1217'],
                    ['uid' => 'VW1z0s2bsccIV2LqeH8wG', 'label' => 'Sugar', 'value' => '845'],
                    ['uid' => 'KHY7fl6hSx6T3x_n3Gsw_', 'label' => 'Instant dry yeast', 'value' => '600'],
                    ['uid' => 'cmK4lyLLVrmMrXYlN07rb', 'label' => 'Baking powder', 'value' => '800'],
                    ['uid' => 'bSUclkkYrjyrhHuXB_arn', 'label' => 'Gelatin', 'value' => '720'],
                    ['uid' => 'hm7tDX4gHacDZOU5NbXzt', 'label' => 'Butter', 'value' => '911'],
                    ['uid' => 'bLEzldIOsxeLgdSSwiW4b', 'label' => 'Oil', 'value' => '880'],
                    ['uid' => '6lPuxZMPevKoOFzSVosl4', 'label' => 'Cacao', 'value' => '520'],
                    ['uid' => 'a4VC19m2LzrJNlxph39gb', 'label' => 'Custom ingredient', 'value' => ''],
                ],
            ],
            'Fcz8p67M_DzJJyD2siynL' => [
                'name' => 'Flour',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'Cvlr1ZvxyWPOX2CS4E8Ut', 'label' => 'Buckwheat', 'value' => '660'],
                    ['uid' => 'xb0Fy1gfEDzNnlJeCrxSB', 'label' => 'Barley', 'value' => '610'],
                    ['uid' => 't_SAexDrppJv4qwuO8PMu', 'label' => 'Corn', 'value' => '550'],
                    ['uid' => '1Jj4evci7Iaq-9joXkWif', 'label' => 'Rye', 'value' => '670'],
                    ['uid' => 'JNYC1UrS5zHUv1StvCVC_', 'label' => 'Wheat (all purpose)', 'value' => '600'],
                    ['uid' => 'bXeEfYNNy3l1HJkY6sm1u', 'label' => 'Soy', 'value' => '680'],
                    ['uid' => 'sOrkoJJUJaaluiM7_qqmv', 'label' => 'Corn starch', 'value' => '650'],
                    ['uid' => '3uPpVlBqhIOAeYV3EbxzV', 'label' => 'Potato starch', 'value' => '720'],
                ],
            ],
            '8f2ijxdNCzDOXDMFXGKDR' => [
                'name' => 'Sugar',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => '6JolYaGaGnDtFPmAGzQcY', 'label' => 'Granulated sugar', 'value' => '845'],
                    ['uid' => 'N9JkP2ORps9817bD7-fsD', 'label' => 'Powder sugar', 'value' => '560'],
                    ['uid' => 'khe1iIHXPBTOIOxxPeHUQ', 'label' => 'Brown sugar', 'value' => '800'],
                ],
            ],
            'Rzaktx9-ZhXWczkVtgtDN' => [
                'name' => 'Oil',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'O04ot-V2OCbvHS_FxQLs2', 'label' => 'Cooking oil', 'value' => '880'],
                    ['uid' => 'qbPzhXNCiatBlGtIVNJRF', 'label' => 'Olive oil', 'value' => '918'],
                    ['uid' => 'CZdodC2dEyUwIWEWYzF8b', 'label' => 'Sunflower oil', 'value' => '960'],
                    ['uid' => '5SZOl9SVp705jfnj8GJSv', 'label' => 'Vegetable oil', 'value' => '890'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";var SUGAR=3;var OIL=4;omni.define("get_density",function(density,more,density_sugar,density_oil){if(more===SUGAR){return density_sugar}if(more===OIL){return density_oil}return density});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Grams and Spoons into Grams to teaspoons and the answer comes back as Density and Density. It is a single relationship that reads density out of grams, not a table of canned results keyed by them. Units for Density default to kilograms and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Grams to teaspoons calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Grams to teaspoons: it takes 2 numbers and reports Density, Density and Density.</p><p>Written with the labels from the form, Grams = (1 ÷ 1000) × Spoons × get_density(Density, More, Density, Density).</p><p>The answers are Density, Density, Density and Density; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Grams</strong> — in grams</li><li><strong>Spoons</strong> — in teaspoons (5 ml)</li></ul><p>The answers come back as Density in kilograms, Density in kilograms, Density in kilograms, Density in kilograms, Density in kilograms. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Grams = 10 g and Spoons = 100 tsp; the answers are <strong>Ingredients</strong> = 845, <strong>Oil</strong> = 880 and <strong>Sugar</strong> = 845.</p><ul><li><strong>Ingredients</strong> = 845</li><li><strong>Oil</strong> = 880</li><li><strong>Sugar</strong> = 845</li></ul><p>The line behind those figures is <strong>Grams</strong> = <code>(1 ÷ 1000) × Spoons × get_density(Density, More, Density, Density)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Ingredients</strong> = 845, <strong>Oil</strong> = 880 and <strong>Sugar</strong> = 845. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Density lists 7 options and opens on kilograms. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Grams</strong> = <code>(1 ÷ 1000) × Spoons × get_density(Density, More, Density, Density)</code></li><li><strong>Spoons</strong> = <code>1000 × Grams ÷ get_density(Density, More, Density, Density)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Grams</strong> = <code>(1 ÷ 1000) × Spoons × get_density(Density, More, Density, Density)</code> — the form to use when Spoons, Density, Density and Density are the values you have.</li><li><strong>Spoons</strong> = <code>1000 × Grams ÷ get_density(Density, More, Density, Density)</code> — the form to use when Grams, Density, Density and Density are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Grams and Spoons can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Grams from 10 to 20, leaving every other box alone. The panel moves from <strong>Ingredients</strong> 845, <strong>Oil</strong> 880 and <strong>Sugar</strong> 845 to <strong>Ingredients</strong> 845, <strong>Oil</strong> 880 and <strong>Sugar</strong> 845.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Grams and Spoons carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Density, Density and Density are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Grams left as a guess.</strong> Anything typed into Grams is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Spoons left as a guess.</strong> Anything typed into Spoons is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Convert Grams to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Grams</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. The page reads it when it works out Spoons. Check the field label and unit before calculating.</li><li><strong>Spoons</strong> is a teaspoons (5 ml) quantity: the page opens it in tsp and converts anything else you pick before the formula runs. The page reads it when it works out Grams. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Density</strong> is a kilograms figure. </li><li><strong>Density</strong> is a kilograms figure. </li><li><strong>Density</strong> is a kilograms figure. </li><li><strong>Density</strong> is a kilograms figure. </li><li><strong>Density</strong> is a kilograms figure. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Ingredients</th><th>Oil</th><th>Sugar</th></tr></thead><tbody><tr><td><strong>Grams</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Spoons</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Grams: ten per cent there moves an answer by about 0 per cent, which is why that is the number to measure twice. By contrast, Grams and Spoons barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. </p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Grams = 5 g and Spoons = 50 tsp, the answer is <strong>Ingredients</strong> = 845, <strong>Oil</strong> = 880 and <strong>Sugar</strong> = 845.</li><li>With Grams = 30 g and Spoons = 100 tsp, the answer is <strong>Ingredients</strong> = 845, <strong>Oil</strong> = 880 and <strong>Sugar</strong> = 845.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p> The tables, with the unit each box opens in:</p><ul><li><strong>kilograms</strong> — opens in <em>kg</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>teaspoons (5 ml)</strong> — opens in <em>tsp</em>, and the chip also carries US tbsp, ml, US cups, pinches, US fl oz and tsp. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Density is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover kilograms and teaspoons (5 ml). A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Grams and Spoons is what you already know and Density and Density is what you need — the reverse of that situation is what the rearranged form is for.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/dry-to-cooked-pasta">Dry to cooked pasta Calculator</a>, <a href="/food/fresh-to-dry-herb-conversion">Fresh to dry herb conversion</a> and <a href="/food/garlic-converter">Garlic converter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Grams to teaspoons calculator work out?', 'a' => <<<'TXT'
            Density, Density, Density and Density, from Spoons, Density, Density and Density. The relationship is Grams = (1 ÷ 1000) × Spoons × get_density(Density, More, Density, Density).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Grams (grams), Spoons (teaspoons (5 ml)). Fill grams and spoons and leave Density empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Grams and Spoons can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'Are the Grams to teaspoons results exact?', 'a' => 'The arithmetic follows the selected ingredient and units, but density, packing and product size can vary. Check the ingredient match and weigh it when a recipe needs precision.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Grams left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Density at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/food/grams-to-tbsp', 'name' => 'Grams to tablespoons'],
            ['path' => '/food/fresh-to-dry-herb-conversion', 'name' => 'Fresh to dry herb conversion'],
            ['path' => '/food/garlic-converter', 'name' => 'Garlic converter']
        ],
    ],
];

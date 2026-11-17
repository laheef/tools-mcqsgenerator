<?php

/**
 * ml to grams
 * /food/ml-to-grams
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'ml to grams',
    'meta' => ['title' => 'ml to grams Calculator — Formula, Units & Example', 'description' => 'Convert milliliters to grams with the chosen ingredient density, or solve for a missing value. Check the ingredient, packing and units before using the result.', 'h1' => 'ml to grams Calculator', 'updated' => '2026-09-28'],
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
            'flour' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'vN1nX2ElaqLXFgXZUDlD3', 'c' => null],
                ],
                'ds' => 'xn0rXILbINW7oj8T3WILt',
            ],
            'grams' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'ingredient' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'x4y54HfS3-ub7KokZYq8k', 'c' => null],
                ],
                'ds' => 'FSKsnopu8Qf9hmghUlAxD',
            ],
            'ml' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'more' => [
                'type' => 'dependent',
                'defaults' => [
                    ['value' => '0'],
                ],
            ],
            'nuts' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'H0tY5yFVnDTJvAGWd0pLj', 'c' => null],
                ],
                'ds' => 'xOwLFVUFM1KQp-rWCI_H1',
            ],
            'oil' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'GoCwsZbmsPjaxy6hHGOqm', 'c' => null],
                ],
                'ds' => 'IDdliNiC6okM6ALOECaF_',
            ],
            'sugar' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'MGEQmaZSivrzavTBzIYVX', 'c' => null],
                ],
                'ds' => 'NV3sltLbssr4hL-c_MB9C',
            ],
        ],
        'groups' => [
            [
                'uid' => 'Y0t7IITEdkrbTKO5jhWLX',
                'title' => 'Select your ingredient',
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
                'uid' => 'lT5bwhWgYdhnKCuGwzZT9',
                'title' => 'Convert',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'ml', 'vt' => 'numerical', 'l' => 'Milliliters'],
                            ],
                        ],
                    ],
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
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'grams = ml * (get_density(density, more, density_flour, density_sugar, density_oil, density_nuts) / 1000)',
                'var' => [
                    [
                        'l' => 'grams',
                        'f' => '(1/1000)*ml*get_density(density, more, density_flour, density_sugar, density_oil, density_nuts)',
                        'r' => [
                            'ml',
                            'density',
                            'density_flour',
                            'density_nuts',
                            'density_oil',
                            'density_sugar',
                            'more',
                        ],
                    ],
                    [
                        'l' => 'ml',
                        'f' => '1000*grams/get_density(density, more, density_flour, density_sugar, density_oil, density_nuts)',
                        'r' => [
                            'grams',
                            'density',
                            'density_flour',
                            'density_nuts',
                            'density_oil',
                            'density_sugar',
                            'more',
                        ],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'FSKsnopu8Qf9hmghUlAxD' => [
                'name' => 'ingredient',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'x4y54HfS3-ub7KokZYq8k', 'label' => 'Water', 'value' => '0'],
                    ['uid' => 'NqBTjjt2mYUb6G8hn1-ax', 'label' => 'Milk', 'value' => '1'],
                    ['uid' => 'JmFfIVW2yX-oXGpEK9Bsc', 'label' => 'Flour', 'value' => '2'],
                    ['uid' => 'MjnBcz6NXc9jro09MrELj', 'label' => 'Sugar', 'value' => '3'],
                    ['uid' => 'tG034-w48Eheozx2Oy1Ps', 'label' => 'Salt', 'value' => '4'],
                    ['uid' => '5FyEmNZIbzLdQA5Hq5Tf2', 'label' => 'Honey', 'value' => '5'],
                    ['uid' => 'ONpAlojJcTxeXzbEM65Cq', 'label' => 'Butter', 'value' => '6'],
                    ['uid' => 'ZjFq33Fe5S1bTgwHHcoxD', 'label' => 'Oil', 'value' => '7'],
                    ['uid' => 'W0yGmbg3QwHU7xWFb1dMk', 'label' => 'Nuts and seeds', 'value' => '8'],
                    ['uid' => 'Trx3MRpcx_kB4BKkK5g3b', 'label' => 'Cacao', 'value' => '9'],
                    ['uid' => '-I3egWuUPDhQ7ArL6rDIf', 'label' => 'Rice (raw)', 'value' => '10'],
                    ['uid' => 'lWcIcaCLdgtG5UcXXn1rT', 'label' => 'Oats', 'value' => '11'],
                    ['uid' => 'qHSYnwUDuQPX7hwH9ld7s', 'label' => 'Jam', 'value' => '12'],
                    ['uid' => '2eMVQ8lJU5ZPUOTMVJYHx', 'label' => 'Nutella', 'value' => '13'],
                    ['uid' => '85xEy2Fyu9TQRtdfQHYJr', 'label' => 'Maple syrup', 'value' => '14'],
                    ['uid' => 'kUwhXiASF5DeO8Niy38Sx', 'label' => 'Cream 38% fat', 'value' => '15'],
                    ['uid' => 'JzR1t7kQBhIsuZKM-9o5G', 'label' => 'Cream 13% fat', 'value' => '16'],
                    ['uid' => 'FjLBG7PaOZhrd4kOg4gV2', 'label' => 'Icecream (less air, more expensive)', 'value' => '17'],
                    ['uid' => 'l6BS7Sr8XEoZgKro37aOn', 'label' => 'Icecream (more air, cheaper)', 'value' => '18'],
                    ['uid' => 'sBPppKwZUGb-5ju8Y405t', 'label' => 'Custom ingredient', 'value' => '19'],
                ],
            ],
            'xn0rXILbINW7oj8T3WILt' => [
                'name' => 'Flour types',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'MHvCqJPVnkrNF9Vi8LCKA', 'label' => 'Buckwheat', 'value' => '660'],
                    ['uid' => '5EoP_vkX-x_j4x-CrQ30q', 'label' => 'Barley', 'value' => '610'],
                    ['uid' => '0Mp-M28rGSDHzBPgrY7N_', 'label' => 'Corn', 'value' => '550'],
                    ['uid' => 'aOMYUnY-p9fuOyD3Vjhw2', 'label' => 'Rye', 'value' => '670'],
                    ['uid' => 'vN1nX2ElaqLXFgXZUDlD3', 'label' => 'Wheat (all purpose)', 'value' => '600'],
                    ['uid' => 'nBlQwVOljVMc9hs8stLy7', 'label' => 'Soy', 'value' => '680'],
                    ['uid' => '9Gb7QhatgKo6srFHPSj2O', 'label' => 'Corn starch', 'value' => '650'],
                    ['uid' => 'HJR0MmFenozMi977SHdMv', 'label' => 'Potato starch', 'value' => '720'],
                ],
            ],
            'NV3sltLbssr4hL-c_MB9C' => [
                'name' => 'Sugar types',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'MGEQmaZSivrzavTBzIYVX', 'label' => 'Granulated sugar', 'value' => '845'],
                    ['uid' => 'b8fmpKO8e0mIf0oJrs5i8', 'label' => 'Powdered sugar', 'value' => '560'],
                    ['uid' => '9j2X41Ali4c30IboPXYZ6', 'label' => 'Brown sugar', 'value' => '800'],
                ],
            ],
            'IDdliNiC6okM6ALOECaF_' => [
                'name' => 'Oil types',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'GoCwsZbmsPjaxy6hHGOqm', 'label' => 'Cooking oil', 'value' => '880'],
                    ['uid' => 'CiRO9F8Aq7n9CuzU5ttV4', 'label' => 'Olive oil', 'value' => '918'],
                    ['uid' => 'rSuD9IXRnRr52qWb_OdW2', 'label' => 'Sunflower oil', 'value' => '960'],
                    ['uid' => 'wKdvmMeaDpR-fIgrDH0Ww', 'label' => 'Vegetable oil', 'value' => '890'],
                ],
            ],
            'xOwLFVUFM1KQp-rWCI_H1' => [
                'name' => 'nut types',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'ycCZYYOmNZK4Yus3_03cx', 'label' => 'Almonds, ground', 'value' => '440'],
                    ['uid' => 'H0tY5yFVnDTJvAGWd0pLj', 'label' => 'Walnuts, hazelnuts, grounded', 'value' => '520'],
                    ['uid' => 'pMryE0pMWP0FlDO88T9Y4', 'label' => 'Sesame', 'value' => '640'],
                    ['uid' => 'vRJDzhOGw6RidFi6djXFy', 'label' => 'Sunflower seeds', 'value' => '620'],
                    ['uid' => 'ycNypA3Osavr6q3fU0hqK', 'label' => 'Peanuts, shelled', 'value' => '690'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";var FLOUR=2;var SUGAR=3;var OIL=7;var NUTS=8;omni.define("get_density",function(density,more,density_flour,density_sugar,density_oil,density_nuts){if(more===FLOUR){return density_flour}if(more===SUGAR){return density_sugar}if(more===OIL){return density_oil}if(more===NUTS){return density_nuts}return density});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        ml to grams takes Milliliters and Grams and returns Density and Density. There is no hidden constant here: change density and milliliters moves with it. The main result, Density, is reported in kilograms.
        TXT,
        'sections' => [
            ['title' => 'How the ml to grams calculator works', 'html' => <<<'TXT'
            <p>The ml to grams calculator applies one relationship to 2 numbers and reports Density, Density and Density.</p><p>In the form&#039;s own words, Grams = (1 ÷ 1000) × Milliliters × get_density(Density, More, Density, Density, Density, Density).</p><p>The result panel carries Density, Density, Density and Density, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Milliliters</strong> — in milliliters</li><li><strong>Grams</strong> — in grams</li></ul><p>What you get back is Density in kilograms, Density in kilograms, Density in kilograms, Density in kilograms, Density in kilograms, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Milliliters = 10 ml and Grams = 100 g; the answers are <strong>Flour</strong> = 600, <strong>Ingredient</strong> = 0, <strong>Nuts</strong> = 520, <strong>Oil</strong> = 880 and <strong>Sugar</strong> = 845.</p><ul><li><strong>Flour</strong> = 600</li><li><strong>Ingredient</strong> = 0</li><li><strong>Nuts</strong> = 520</li><li><strong>Oil</strong> = 880</li><li><strong>Sugar</strong> = 845</li></ul><p>The line behind those figures is <strong>Grams</strong> = <code>(1 ÷ 1000) × Milliliters × get_density(Density, More, Density, Density, Density, Density)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Flour</strong> = 600, <strong>Ingredient</strong> = 0, <strong>Nuts</strong> = 520, <strong>Oil</strong> = 880 and <strong>Sugar</strong> = 845 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Density offers 7 units and opens on kilograms, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Grams</strong> = <code>(1 ÷ 1000) × Milliliters × get_density(Density, More, Density, Density, Density, Density)</code></li><li><strong>Milliliters</strong> = <code>1000 × Grams ÷ get_density(Density, More, Density, Density, Density, Density)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Grams</strong> = <code>(1 ÷ 1000) × Milliliters × get_density(Density, More, Density, Density, Density, Density)</code> — the form to use when Milliliters, Density, Density and Density are the values you have.</li><li><strong>Milliliters</strong> = <code>1000 × Grams ÷ get_density(Density, More, Density, Density, Density, Density)</code> — the form to use when Grams, Density, Density and Density are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Grams and Milliliters can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Milliliters from 10 to 20, leaving every other box alone. The panel moves from <strong>Flour</strong> 600, <strong>Ingredient</strong> 0, <strong>Nuts</strong> 520, <strong>Oil</strong> 880 and <strong>Sugar</strong> 845 to <strong>Flour</strong> 600, <strong>Ingredient</strong> 0, <strong>Nuts</strong> 520, <strong>Oil</strong> 880 and <strong>Sugar</strong> 845.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Milliliters and Grams is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Density, Density and Density are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Milliliters left as a guess.</strong> If Milliliters is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Grams left as a guess.</strong> If Grams is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Convert Milliliters to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the ml to grams form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Milliliters</strong> is a milliliters quantity: the page opens it in ml and converts anything else you pick before the formula runs. It feeds Grams. Fill it from a measurement rather than a memory — Milliliters is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Grams</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. It feeds Milliliters. Fill it from a measurement rather than a memory — Grams is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p> Read them in this order:</p><ul><li><strong>Density</strong> is a kilograms figure. It is produced by the page's own calculation, which reads the form rather than one equation. </li><li><strong>Density</strong> is a kilograms figure. It is produced by the page's own calculation, which reads the form rather than one equation. </li><li><strong>Density</strong> is a kilograms figure. It is produced by the page's own calculation, which reads the form rather than one equation. </li><li><strong>Density</strong> is a kilograms figure. It is produced by the page's own calculation, which reads the form rather than one equation. </li><li><strong>Density</strong> is a kilograms figure. It is produced by the page's own calculation, which reads the form rather than one equation. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Flour</th><th>Ingredient</th><th>Nuts</th><th>Oil</th><th>Sugar</th></tr></thead><tbody><tr><td><strong>Milliliters</strong> +10%</td><td>+0%</td><td>—</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Grams</strong> +10%</td><td>+0%</td><td>—</td><td>+0%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Milliliters sits at the top — a ten per cent error in that box shows up as roughly 0 per cent in the answer. By contrast, Milliliters and Grams barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. </p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Milliliters = 5 ml and Grams = 50 g and the page reports <strong>Flour</strong> = 600, <strong>Ingredient</strong> = 0, <strong>Nuts</strong> = 520, <strong>Oil</strong> = 880 and <strong>Sugar</strong> = 845.</li><li>Feed in Milliliters = 30 ml and Grams = 100 g and the page reports <strong>Flour</strong> = 600, <strong>Ingredient</strong> = 0, <strong>Nuts</strong> = 520, <strong>Oil</strong> = 880 and <strong>Sugar</strong> = 845.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on ml to grams actually offers.</p><ul><li><strong>kilograms</strong> — opens in <em>kg</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>milliliters</strong> — opens in <em>ml</em>, and the chip also carries US tbsp, ml, US cups, pinches, US fl oz and tsp. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Density follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms and milliliters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Milliliters and Grams are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Milliliters and Grams and the number you are missing is Density and Density.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/pizza">Pizza size Calculator</a>, <a href="/food/popcorn">Popcorn Calculator</a> and <a href="/food/pounds-to-cups">Pounds to cups Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the ml to grams calculator work out?', 'a' => <<<'TXT'
            Density, Density, Density and Density, from Milliliters, Density, Density and Density. The relationship is Grams = (1 ÷ 1000) × Milliliters × get_density(Density, More, Density, Density, Density, Density).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Milliliters (milliliters), Grams (grams). With milliliters and grams in place, Density can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Grams and Milliliters can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'Are the ml to grams results exact?', 'a' => 'The arithmetic follows the selected ingredient and units, but density, packing and product size can vary. Check the ingredient match and weigh it when a recipe needs precision.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Milliliters blank and the page solves for it, reporting Density instead of the usual answer.'],
        ],
        'related' => [
            ['path' => '/food/grams-to-cups', 'name' => 'Grams to cups'],
            ['path' => '/food/cups-to-pounds', 'name' => 'Cups to pounds'],
            ['path' => '/food/cooking-measurement', 'name' => 'Cooking measurement']
        ],
    ],
];

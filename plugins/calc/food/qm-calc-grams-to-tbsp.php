<?php

/**
 * Grams to tablespoons
 * /food/grams-to-tbsp
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Grams to tablespoons',
    'meta' => ['title' => 'Grams to tablespoons: Formula, Steps & Results', 'description' => 'Convert grams to tablespoons using ingredient density, or solve for the missing weight or volume. Use consistent units and the correct ingredient density.', 'h1' => 'Grams to tablespoons Calculator', 'updated' => '2026-09-28'],
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
                    ['v' => 'kh_jcymBED1nOnhO8yX8a', 'c' => null],
                ],
                'ds' => 'CbONOZjLDsrS4G60vWiVg',
            ],
            'grams' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'ingredients' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '1urZ8QwpFrHdc6Eqd6fdb', 'c' => null],
                ],
                'ds' => 'WqSgX6zPNadgbAqkpnrth',
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
                    ['v' => 'DQUgkRdNA03wXyo8Y_DK5', 'c' => null],
                ],
                'ds' => 'AL0zzuyIEQ0w14RiTV5YN',
            ],
            'oil' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'YKlrAlbk5TnU9KhBK4wqS', 'c' => null],
                ],
                'ds' => 'S-PS7s6lAtPSlejRJ6hoP',
            ],
            'sugar' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'yxHhqa216mgsxLbS6x-Zl', 'c' => null],
                ],
                'ds' => 'NpvCKoiZnH5yHnn3y5uRu',
            ],
            'tablespoons' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'SIwNKemIdwYiaIFfy1ZWZ',
                'title' => 'Select ingredient',
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
                'uid' => 'WF026MXfUgNbVlcc5ct8z',
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
                                    'n' => 'tablespoons',
                                    'vt' => 'numerical',
                                    'l' => 'Tablespoons',
                                    'us' => '122',
                                    'du' => 'tbsp',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'grams = tablespoons * (get_density(density, more, density_flour, density_sugar, density_oil, density_nuts)/1000)',
                'var' => [
                    [
                        'l' => 'grams',
                        'f' => '(1/1000)*tablespoons*get_density(density, more, density_flour, density_sugar, density_oil, density_nuts)',
                        'r' => [
                            'tablespoons',
                            'density',
                            'density_flour',
                            'density_nuts',
                            'density_oil',
                            'density_sugar',
                            'more',
                        ],
                    ],
                    [
                        'l' => 'tablespoons',
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
            'CbONOZjLDsrS4G60vWiVg' => [
                'name' => 'flour',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'slbr5pyS_rM5w0AtjmsNr', 'label' => 'Buckwheat', 'value' => '660'],
                    ['uid' => '3UwU91H02k-arvqiNWp_5', 'label' => 'Barley', 'value' => '610'],
                    ['uid' => 'ljv9WmemqqIWu6-ji8Jho', 'label' => 'Corn', 'value' => '550'],
                    ['uid' => '0cLY3Zj82AhO936paKzbj', 'label' => 'Rye', 'value' => '670'],
                    ['uid' => 'kh_jcymBED1nOnhO8yX8a', 'label' => 'Wheat (all purpose)', 'value' => '600'],
                    ['uid' => 'TjYQxVHNbkkeQSi_JsGdJ', 'label' => 'Soy', 'value' => '680'],
                    ['uid' => 'XYdVIFDbE45DE-PSwWS7s', 'label' => 'Corn starch', 'value' => '650'],
                    ['uid' => '9mxlQx9rDC7d2PualPTso', 'label' => 'Potato starch', 'value' => '720'],
                ],
            ],
            'NpvCKoiZnH5yHnn3y5uRu' => [
                'name' => 'Sugar',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'yxHhqa216mgsxLbS6x-Zl', 'label' => 'Granulated sugar', 'value' => '845'],
                    ['uid' => 'rdzMrelTD4bKuwTes3tC-', 'label' => 'Powder sugar', 'value' => '560'],
                    ['uid' => 'ya6dWo21DRyoar9BA0r2Q', 'label' => 'Brown sugar', 'value' => '800'],
                ],
            ],
            'S-PS7s6lAtPSlejRJ6hoP' => [
                'name' => 'Oil',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'YKlrAlbk5TnU9KhBK4wqS', 'label' => 'Cooking oil', 'value' => '880'],
                    ['uid' => '-vRGY5KgdyVEZGPL958WT', 'label' => 'Olive oil', 'value' => '918'],
                    ['uid' => 'LXRxUmx0ul6xKKjf6ZMel', 'label' => 'Sunflower oil', 'value' => '960'],
                    ['uid' => '7QGmB7b31qYzcLpXRllZc', 'label' => 'Vegetable oil', 'value' => '890'],
                ],
            ],
            'AL0zzuyIEQ0w14RiTV5YN' => [
                'name' => 'Nuts',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'weS-MexLwAsuHEIKO7jfa', 'label' => 'Almonds, ground', 'value' => '440'],
                    ['uid' => 'DQUgkRdNA03wXyo8Y_DK5', 'label' => 'Walnuts, hazelnuts, grounded', 'value' => '520'],
                    ['uid' => '_SZbdpg2cuH0b4UcjK1jr', 'label' => 'Sesame', 'value' => '640'],
                    ['uid' => '3yqLa6HPxoMynCW-cowat', 'label' => 'Sunflower seeds', 'value' => '620'],
                    ['uid' => 'cJRzX7b4iKAWUoLEh2hmc', 'label' => 'Peanuts, shelled', 'value' => '690'],
                ],
            ],
            'WqSgX6zPNadgbAqkpnrth' => [
                'name' => 'Ingredients',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'dP3cuZDYTzItV0QJjk3r0', 'label' => 'Water', 'value' => '1000'],
                    ['uid' => 'aPPjErUZ4Z3tTHLGQCvVE', 'label' => 'Milk', 'value' => '1030'],
                    ['uid' => 'FIK6q-a8ntaIB6t-KEe_u', 'label' => 'Flour', 'value' => '600'],
                    ['uid' => '-rBSVKQ0l7pNOUhemj3GM', 'label' => 'Sugar', 'value' => '845'],
                    ['uid' => 'zYh910SYXw8cbEp17UhrN', 'label' => 'Salt', 'value' => '1217'],
                    ['uid' => 'ZlQpe4gvJE7Q_dW58XRZJ', 'label' => 'Honey', 'value' => '1420'],
                    ['uid' => '1urZ8QwpFrHdc6Eqd6fdb', 'label' => 'Butter', 'value' => '959'],
                    ['uid' => 'xEopWwcNbZitLJ4sQPC_a', 'label' => 'Oil', 'value' => '880'],
                    ['uid' => 'dTH68qamhks7dHaIVX-e2', 'label' => 'Nuts and seeds', 'value' => '520'],
                    ['uid' => 'iK6Eylhk4rozlGf3HNQ--', 'label' => 'Cacao', 'value' => '520'],
                    ['uid' => 'n4ZuyH_llbSt9VS_vWwsz', 'label' => 'Rice (raw)', 'value' => '850'],
                    ['uid' => 'jOfcHvHwEeO8PkSELMQ6-', 'label' => 'Oats', 'value' => '410'],
                    ['uid' => 'MFS0zs2j5qHUdqA1q_Cvr', 'label' => 'Jam', 'value' => '1330'],
                    ['uid' => '-nCQeoQ9BvnsySq1tau4U', 'label' => 'Nutella', 'value' => '1260'],
                    ['uid' => '-mbrgSDWyo-skMS7vzV8n', 'label' => 'Maple syrup', 'value' => '1320'],
                    ['uid' => 'Q3sbLtrJc8VHn15ypWEbx', 'label' => 'Cream 38% fat', 'value' => '984'],
                    ['uid' => 'rA50GsXEco8S4f5N7AfC2', 'label' => 'Cream 13% fat', 'value' => '1013'],
                    ['uid' => 'WhYoBgiYP5ZpvvXQoK5wl', 'label' => 'Custom ingredient', 'value' => ''],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";var FLOUR=2;var SUGAR=3;var OIL=4;var NUTS=5;omni.define("get_density",function(density){var more=arguments.length>1&&arguments[1]!==undefined?arguments[1]:more||0;var density_flour=arguments.length>2&&arguments[2]!==undefined?arguments[2]:density_flour||0;var density_sugar=arguments.length>3&&arguments[3]!==undefined?arguments[3]:density_sugar||0;var density_oil=arguments.length>4&&arguments[4]!==undefined?arguments[4]:density_oil||0;var density_nuts=arguments.length>5&&arguments[5]!==undefined?arguments[5]:density_nuts||0;if(more===FLOUR){return density_flour}if(more===SUGAR){return density_sugar}if(more===OIL){return density_oil}if(more===NUTS){return density_nuts}return density});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Grams and Tablespoons into Grams to tablespoons and the answer comes back as Density and Density. It is a single relationship that reads density out of grams, not a table of canned results keyed by them. Units for Density default to kilograms and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Grams to tablespoons calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Grams to tablespoons: it takes 2 numbers and reports Density, Density and Density.</p><p>In the form&#039;s own words, Grams = (1 ÷ 1000) × Tablespoons × get_density(Density, More, Density, Density, Density, Density).</p><p>The result panel carries Density, Density, Density and Density, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Grams</strong> — in grams</li><li><strong>Tablespoons</strong> — in tablespoons (15 ml)</li></ul><p>The result boxes are Density in kilograms, Density in kilograms, Density in kilograms, Density in kilograms, Density in kilograms; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Grams = 10 g and Tablespoons = 100 tbsp gives <strong>Flour</strong> = 600, <strong>Ingredients</strong> = 959, <strong>Nuts</strong> = 520, <strong>Oil</strong> = 880 and <strong>Sugar</strong> = 845.</p><ul><li><strong>Flour</strong> = 600</li><li><strong>Ingredients</strong> = 959</li><li><strong>Nuts</strong> = 520</li><li><strong>Oil</strong> = 880</li><li><strong>Sugar</strong> = 845</li></ul><p>The line behind those figures is <strong>Grams</strong> = <code>(1 ÷ 1000) × Tablespoons × get_density(Density, More, Density, Density, Density, Density)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Flour</strong> = 600, <strong>Ingredients</strong> = 959, <strong>Nuts</strong> = 520, <strong>Oil</strong> = 880 and <strong>Sugar</strong> = 845. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Density lists 7 options and opens on kilograms. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Grams</strong> = <code>(1 ÷ 1000) × Tablespoons × get_density(Density, More, Density, Density, Density, Density)</code></li><li><strong>Tablespoons</strong> = <code>1000 × Grams ÷ get_density(Density, More, Density, Density, Density, Density)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Grams</strong> = <code>(1 ÷ 1000) × Tablespoons × get_density(Density, More, Density, Density, Density, Density)</code> — the form to use when Tablespoons, Density, Density and Density are the values you have.</li><li><strong>Tablespoons</strong> = <code>1000 × Grams ÷ get_density(Density, More, Density, Density, Density, Density)</code> — the form to use when Grams, Density, Density and Density are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Grams and Tablespoons can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Grams from 10 to 20, leaving every other box alone. The panel moves from <strong>Flour</strong> 600, <strong>Ingredients</strong> 959, <strong>Nuts</strong> 520, <strong>Oil</strong> 880 and <strong>Sugar</strong> 845 to <strong>Flour</strong> 600, <strong>Ingredients</strong> 959, <strong>Nuts</strong> 520, <strong>Oil</strong> 880 and <strong>Sugar</strong> 845.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Grams and Tablespoons carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Density, Density and Density are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Grams left as a guess.</strong> Anything typed into Grams is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Tablespoons left as a guess.</strong> Anything typed into Tablespoons is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Grams and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Grams</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. The page reads it when it works out Tablespoons. Check the field label and unit before calculating.</li><li><strong>Tablespoons</strong> is a tablespoons (15 ml) quantity: the page opens it in tbsp and converts anything else you pick before the formula runs. The page reads it when it works out Grams. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Density</strong> is a kilograms figure. </li><li><strong>Density</strong> is a kilograms figure. </li><li><strong>Density</strong> is a kilograms figure. </li><li><strong>Density</strong> is a kilograms figure. </li><li><strong>Density</strong> is a kilograms figure. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Flour</th><th>Ingredients</th><th>Nuts</th><th>Oil</th><th>Sugar</th></tr></thead><tbody><tr><td><strong>Grams</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Tablespoons</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Grams: ten per cent there moves an answer by about 0 per cent, which is why that is the number to measure twice. By contrast, Grams and Tablespoons barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. </p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Grams = 5 g and Tablespoons = 50 tbsp, the answer is <strong>Flour</strong> = 600, <strong>Ingredients</strong> = 959, <strong>Nuts</strong> = 520, <strong>Oil</strong> = 880 and <strong>Sugar</strong> = 845.</li><li>With Grams = 30 g and Tablespoons = 100 tbsp, the answer is <strong>Flour</strong> = 600, <strong>Ingredients</strong> = 959, <strong>Nuts</strong> = 520, <strong>Oil</strong> = 880 and <strong>Sugar</strong> = 845.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p> The tables, with the unit each box opens in:</p><ul><li><strong>kilograms</strong> — opens in <em>kg</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>tablespoons (15 ml)</strong> — opens in <em>tbsp</em>, and the chip also carries US tbsp, ml, US cups, pinches, US fl oz and tsp. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Density is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover kilograms and tablespoons (15 ml). A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Grams and Tablespoons and the number you are missing is Density and Density.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>Related calculators: <a href="/food/grams-to-tsp">Grams to teaspoons</a>, <a href="/food/ml-to-grams">ml to grams</a> and <a href="/food/cooking-measurement">Cooking measurement</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Grams to tablespoons calculator work out?', 'a' => <<<'TXT'
            Density, Density, Density and Density, from Tablespoons, Density, Density and Density. The relationship is Grams = (1 ÷ 1000) × Tablespoons × get_density(Density, More, Density, Density, Density, Density).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Grams (grams), Tablespoons (tablespoons (15 ml)). Fill grams and tablespoons and leave Density empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Grams and Tablespoons can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'Are the Grams to tablespoons results exact?', 'a' => 'The arithmetic follows the selected ingredient and units, but density, packing and product size can vary. Check the ingredient match and weigh it when a recipe needs precision.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Grams left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Density at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/food/grams-to-tsp', 'name' => 'Grams to teaspoons'],
            ['path' => '/food/ml-to-grams', 'name' => 'ml to grams'],
            ['path' => '/food/cooking-measurement', 'name' => 'Cooking measurement']
        ],
    ],
];

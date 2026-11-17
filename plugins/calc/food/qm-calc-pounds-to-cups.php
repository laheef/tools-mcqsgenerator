<?php

/**
 * Pounds to cups
 * /food/pounds-to-cups
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pounds to cups',
    'meta' => ['title' => 'Pounds to cups Calculator — Formula, Units & Example', 'description' => 'Convert pounds to cups using the ingredient’s density, or solve for a missing value. Check the ingredient, packing and units before using the result.', 'h1' => 'Pounds to cups Calculator', 'updated' => '2026-09-28'],
    'raw' => [
        'vars' => [
            'd2' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'd3' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'd4' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'd5' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'density' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.000001'],
            ],
            'flour' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'jUPdk3iwy2olJWMSAK6MA', 'c' => null],
                ],
                'ds' => 'jwVa4kEAc2su0avQk8Pdc',
            ],
            'ingredients' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => 'uF6VsOkjY6kr9s1mBZyPX'],
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
                    ['v' => 'gNmnUeT_cEuIsMfqWQWU4', 'c' => null],
                ],
                'ds' => 'Opnaz5JAIPtuepVLi-dZ-',
            ],
            'oil' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'pEWH6hcGrxK78rK5weXV2', 'c' => null],
                ],
                'ds' => 'vWFX55oQ-AXstCUzujs8v',
            ],
            'show_density' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '9DIbt3hN8XeCF3np8JrS0', 'c' => null],
                ],
                'ds' => 'k8u3NO4Or8lkcUwB9jA3q',
            ],
            'sugar' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ITRRQwem42fuJyaW3aH57', 'c' => null],
                ],
                'ds' => 'u5GLtLHYtGP6fT5TqUrpt',
            ],
            'volume' => [
                'type' => 'numerical',
                'rnd' => ['standard', '1'],
            ],
            'volume_butter' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['standard', '1'],
            ],
            'weight_butter' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
        ],
        'groups' => [
            [
                'uid' => '-teQI1VDlUD8dIjTOJWe0',
                'title' => 'Select your ingredient',
                'desc' => 'Select an ingredient for which you want to perform the conversion or select Custom ingredient to input its density.',
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
                                    'us' => '21',
                                    'du' => 'kgm3',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'D4mB99yygDkR_SinbCOc0',
                'title' => 'Convert',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => 'Pounds',
                                    'us' => '22',
                                    'du' => 'lb',
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
                                    'n' => 'volume',
                                    'vt' => 'numerical',
                                    'l' => 'Cups',
                                    'us' => '122',
                                    'du' => 'uscups',
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
                                    'n' => 'weight_butter',
                                    'vt' => 'numerical',
                                    'l' => 'Amount of butter',
                                    'us' => '22',
                                    'du' => 'lb',
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
                                    'n' => 'volume_butter',
                                    'vt' => 'numerical',
                                    'l' => 'Cups',
                                    'us' => '122',
                                    'du' => 'uscups',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'weight*1000 = volume * get_density(density, more, d2, d3, d4, d5)/1000',
                'var' => [
                    [
                        'l' => 'volume',
                        'f' => '1000000*weight/get_density(density, more, d2, d3, d4, d5)',
                        'r' => [
                            'weight',
                            'd2',
                            'd3',
                            'd4',
                            'd5',
                            'density',
                            'more',
                        ],
                    ],
                    [
                        'l' => 'weight',
                        'f' => '(1/1000000)*volume*get_density(density, more, d2, d3, d4, d5)',
                        'r' => [
                            'volume',
                            'd2',
                            'd3',
                            'd4',
                            'd5',
                            'density',
                            'more',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'weight_butter*1000 = volume_butter * get_density(density, more, d2, d3, d4, d5)/1000',
                'var' => [
                    [
                        'l' => 'weight_butter',
                        'f' => '(1/1000000)*volume_butter*get_density(density, more, d2, d3, d4, d5)',
                        'r' => [
                            'volume_butter',
                            'd2',
                            'd3',
                            'd4',
                            'd5',
                            'density',
                            'more',
                        ],
                    ],
                    [
                        'l' => 'volume_butter',
                        'f' => '1000000*weight_butter/get_density(density, more, d2, d3, d4, d5)',
                        'r' => [
                            'weight_butter',
                            'd2',
                            'd3',
                            'd4',
                            'd5',
                            'density',
                            'more',
                        ],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'uF6VsOkjY6kr9s1mBZyPX' => [
                'name' => 'Ingredients',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'VLzminO-pMd3aXisDp5GW', 'label' => 'Water', 'value' => '1000'],
                    ['uid' => '697tcTmegb8406Ln_RQBo', 'label' => 'Milk', 'value' => '1030'],
                    ['uid' => 'fWQrt276E43ylqSbizbJs', 'label' => 'Flour', 'value' => '600'],
                    ['uid' => 'VWXEZX89xe-g5450UXPfa', 'label' => 'Sugar', 'value' => '845'],
                    ['uid' => 'Up60pgTQDt72apa45Y8V-', 'label' => 'Salt', 'value' => '1217'],
                    ['uid' => 'vuktD3IWL17U42GutNb6T', 'label' => 'Honey', 'value' => '1420'],
                    ['uid' => 'dwUjGxYBfOHQeTvnP7pBu', 'label' => 'Butter', 'value' => '959'],
                    ['uid' => 'Fy76tvUpoA8n4yLZUXsWl', 'label' => 'Oil', 'value' => '880'],
                    ['uid' => '3RIx80V5L5gOBGy-voVvi', 'label' => 'Nuts and seeds', 'value' => '520'],
                    ['uid' => '0iEGJj9fion-YZpCg0tAk', 'label' => 'Cacao', 'value' => '520'],
                    ['uid' => 'lrcPAHYaBHK94TOgHDBW-', 'label' => 'Rice (raw)', 'value' => '850'],
                    ['uid' => 'VGkYP217v0mPG0VPcMhIM', 'label' => 'Oats', 'value' => '410'],
                    ['uid' => 'NqMfBy-TL5y2wpZw-ZULl', 'label' => 'Jam', 'value' => '1330'],
                    ['uid' => 'uPJtqN-FQTYfsAC30cq2T', 'label' => 'Nutella', 'value' => '1260'],
                    ['uid' => 'Lo9nl4BkhX4DNhPufRWCs', 'label' => 'Maple syrup', 'value' => '1320'],
                    ['uid' => '8LzgCJZ7f5YVuWwaeRNYg', 'label' => 'Cream 38% fat', 'value' => '984'],
                    ['uid' => 'Y1plkZQtlOZJBTgXe7reE', 'label' => 'Cream 13% fat', 'value' => '1013'],
                    ['uid' => '-sWu4z0epx4LGh5B8YYPM', 'label' => 'Custom ingredient', 'value' => ''],
                ],
            ],
            'jwVa4kEAc2su0avQk8Pdc' => [
                'name' => 'FLOUR',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'BySbfig9s7QreFUqLWd6U', 'label' => 'Buckwheat', 'value' => '660'],
                    ['uid' => 'iNkX0VHXq6FwjEm2kZUiB', 'label' => 'Barley', 'value' => '610'],
                    ['uid' => 'RVBYZio0D2-IX0LbesdF6', 'label' => 'Corn', 'value' => '550'],
                    ['uid' => 'AmxKFTbwTb2z9ni78QxWF', 'label' => 'Rye', 'value' => '670'],
                    ['uid' => 'jUPdk3iwy2olJWMSAK6MA', 'label' => 'Wheat (all purpose)', 'value' => '600'],
                    ['uid' => 'ADlfvSiNr1mcmzurW28FM', 'label' => 'Wheat (for cakes)', 'value' => '450'],
                    ['uid' => 'RfPFE6MvgbrF8eGssJdZL', 'label' => 'Soy', 'value' => '680'],
                    ['uid' => 'jP2hYR7nyW1eF_nWI2SBD', 'label' => 'Corn starch', 'value' => '650'],
                    ['uid' => 'GwlzRafzK_nWGAdTqW0If', 'label' => 'Potato starch', 'value' => '720'],
                ],
            ],
            'u5GLtLHYtGP6fT5TqUrpt' => [
                'name' => 'SUGAR',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'ITRRQwem42fuJyaW3aH57', 'label' => 'Granulated sugar', 'value' => '845'],
                    ['uid' => 'iywyNZ1FezLJzbKU0XDdK', 'label' => 'Powder sugar', 'value' => '560'],
                    ['uid' => 'IrzL4Fp6dP1J448aCnG-w', 'label' => 'Brown sugar', 'value' => '800'],
                ],
            ],
            'vWFX55oQ-AXstCUzujs8v' => [
                'name' => 'OIL',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'pEWH6hcGrxK78rK5weXV2', 'label' => 'Cooking oil', 'value' => '880'],
                    ['uid' => 'V0nCz33FU01ZyLehfSRyF', 'label' => 'Olive oil', 'value' => '918'],
                    ['uid' => 'A2bqRzDq0ahco1LxJWeRH', 'label' => 'Sunflower oil', 'value' => '960'],
                    ['uid' => 'sqAINuHwNE5vte9xw4Ox_', 'label' => 'Vegetable oil', 'value' => '890'],
                ],
            ],
            'Opnaz5JAIPtuepVLi-dZ-' => [
                'name' => 'NUTS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'YNQTyP5yQQ0DmEPPSI-B1', 'label' => 'Almonds, ground', 'value' => '440'],
                    ['uid' => 'gNmnUeT_cEuIsMfqWQWU4', 'label' => 'Walnuts, hazelnuts, grounded', 'value' => '520'],
                    ['uid' => 'M0JfIHMUFVQEGI8wHqXK8', 'label' => 'Sesame', 'value' => '640'],
                    ['uid' => 'bdRX3Gs4lfc215lmYGbqj', 'label' => 'Sunflower seeds', 'value' => '620'],
                    ['uid' => '6WouH-QLPazM2Qviq147k', 'label' => 'Peanuts, shelled', 'value' => '690'],
                ],
            ],
            'k8u3NO4Or8lkcUwB9jA3q' => [
                'name' => 'Show density',
                'uiType' => 'CHECKBOX',
                'options' => [
                    ['uid' => 'r3mEw7cs7LwMl5nzaH6J7', 'label' => 'Show ingredient density', 'value' => '1'],
                    ['uid' => '9DIbt3hN8XeCF3np8JrS0', 'label' => '', 'value' => '0'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";var OTHER=0;var FLOUR=2;var SUGAR=3;var OIL=4;var NUTS=5;var BUTTER=6;var SALT=7;omni.define("get_density",function(_density,more,_d2,_d3,_d4,_d5){if(more===FLOUR){return _d2}if(more===SUGAR){return _d3}if(more===OIL){return _d4}if(more===NUTS){return _d5}return _density});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Pounds to cups takes Pounds, Cups and Amount of butter and returns Density. It is a single relationship that reads density out of pounds, not a table of canned results keyed by them. Units for Density default to kilograms per cubic meter and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Pounds to cups calculator works', 'html' => <<<'TXT'
            <p>The Pounds to cups calculator applies one relationship to 4 numbers and reports Density.</p><p>Written with the labels from the form, Cups = 1000000 × Pounds ÷ get_density(Density, More, D 2, D 3, D 4, D 5).</p><p>The result panel carries Density, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Pounds</strong> — in pounds</li><li><strong>Cups</strong> — in US customary cups (236.59 ml)</li><li><strong>Amount of butter</strong> — in pounds</li><li><strong>Cups</strong> — in US customary cups (236.59 ml)</li></ul><p>What you get back is Density in kilograms per cubic meter, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Pounds = 10 lb, Cups = 100 uscups, Amount of butter = 1000 lb and Cups = 10 uscups — through the same formula and the panel reports <strong>Flour</strong> = 600, <strong>Nuts</strong> = 520, <strong>Oil</strong> = 880, <strong>Show density</strong> = 0 and <strong>Sugar</strong> = 845.</p><ul><li><strong>Flour</strong> = 600</li><li><strong>Nuts</strong> = 520</li><li><strong>Oil</strong> = 880</li><li><strong>Show density</strong> = 0</li><li><strong>Sugar</strong> = 845</li></ul><p>The line behind those figures is <strong>Cups</strong> = <code>1000000 × Pounds ÷ get_density(Density, More, D 2, D 3, D 4, D 5)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Flour</strong> = 600, <strong>Nuts</strong> = 520, <strong>Oil</strong> = 880, <strong>Show density</strong> = 0 and <strong>Sugar</strong> = 845 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Density offers 21 units and opens on kilograms per cubic meter, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Cups</strong> = <code>1000000 × Pounds ÷ get_density(Density, More, D 2, D 3, D 4, D 5)</code></li><li><strong>Pounds</strong> = <code>(1 ÷ 1000000) × Cups × get_density(Density, More, D 2, D 3, D 4, D 5)</code></li><li><strong>Amount of butter</strong> = <code>(1 ÷ 1000000) × Cups × get_density(Density, More, D 2, D 3, D 4, D 5)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Cups</strong> = <code>1000000 × Pounds ÷ get_density(Density, More, D 2, D 3, D 4, D 5)</code> — the form to use when Pounds, D 2, D 3 and D 4 are the values you have.</li><li><strong>Pounds</strong> = <code>(1 ÷ 1000000) × Cups × get_density(Density, More, D 2, D 3, D 4, D 5)</code> — the form to use when Cups, D 2, D 3 and D 4 are the values you have.</li><li><strong>Amount of butter</strong> = <code>(1 ÷ 1000000) × Cups × get_density(Density, More, D 2, D 3, D 4, D 5)</code> — the form to use when Cups, D 2, D 3 and D 4 are the values you have.</li><li><strong>Cups</strong> = <code>1000000 × Amount of butter ÷ get_density(Density, More, D 2, D 3, D 4, D 5)</code> — the form to use when Amount of butter, D 2, D 3 and D 4 are the values you have.</li></ul><p>Any one of Cups, Pounds and Amount of butter can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Pounds from 10 to 20, leaving every other box alone. The panel moves from <strong>Flour</strong> 600, <strong>Nuts</strong> 520, <strong>Oil</strong> 880, <strong>Show density</strong> 0 and <strong>Sugar</strong> 845 to <strong>Flour</strong> 600, <strong>Nuts</strong> 520, <strong>Oil</strong> 880, <strong>Show density</strong> 0 and <strong>Sugar</strong> 845.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Pounds, Cups and Amount of butter is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Density is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Pounds left as a guess.</strong> If Pounds is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Cups left as a guess.</strong> If Cups is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Convert Pounds to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Pounds</strong> is a pounds quantity: the page opens it in lb and converts anything else you pick before the formula runs. The page reads it when it works out Cups. Check the field label and unit before calculating.</li><li><strong>Cups</strong> is a us customary cups (236.59 ml) quantity: the page opens it in uscups and converts anything else you pick before the formula runs. The page reads it when it works out Pounds. Check the field label and unit before calculating.</li><li><strong>Amount of butter</strong> is a pounds quantity: the page opens it in lb and converts anything else you pick before the formula runs. The page reads it when it works out Cups. Check the field label and unit before calculating.</li><li><strong>Cups</strong> is a us customary cups (236.59 ml) quantity: the page opens it in uscups and converts anything else you pick before the formula runs. The page reads it when it works out Amount of butter. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p> Read them in this order:</p><ul><li><strong>Density</strong> is a kilograms per cubic meter figure. It is produced by the page's own calculation, which reads the form rather than one equation. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Flour</th><th>Nuts</th><th>Oil</th><th>Show density</th><th>Sugar</th></tr></thead><tbody><tr><td><strong>Pounds</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>—</td><td>+0%</td></tr><tr><td><strong>Cups</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>—</td><td>+0%</td></tr><tr><td><strong>Amount of butter</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>—</td><td>+0%</td></tr><tr><td><strong>Cups</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>—</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Pounds sits at the top — a ten per cent error in that box shows up as roughly 0 per cent in the answer. By contrast, Pounds, Cups and Amount of butter barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. </p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Pounds = 5 lb, Cups = 50 uscups, Amount of butter = 500 lb and Cups = 5 uscups, the answer is <strong>Flour</strong> = 600, <strong>Nuts</strong> = 520, <strong>Oil</strong> = 880, <strong>Show density</strong> = 0 and <strong>Sugar</strong> = 845.</li><li>With Pounds = 30 lb, Cups = 100 uscups, Amount of butter = 1000 lb and Cups = 10 uscups, the answer is <strong>Flour</strong> = 600, <strong>Nuts</strong> = 520, <strong>Oil</strong> = 880, <strong>Show density</strong> = 0 and <strong>Sugar</strong> = 845.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p> The tables, with the unit each box opens in:</p><ul><li><strong>kilograms per cubic meter</strong> — opens in <em>kgm3</em>, and the chip also carries µg/mL, g/L, mg/L, kg/m³, lb/cu ft and g/mL. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>pounds</strong> — opens in <em>lb</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>US customary cups (236.59 ml)</strong> — opens in <em>uscups</em>, and the chip also carries US tbsp, ml, US cups, pinches, US fl oz and tsp. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Density follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms per cubic meter, pounds and US customary cups (236.59 ml) and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Pounds, Cups and Amount of butter are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Pounds, Cups and Amount of butter is what you already know and Density is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related calculators: <a href="/food/cups-to-pounds">Cups to pounds</a>, <a href="/food/grams-to-cups">Grams to cups</a> and <a href="/food/ml-to-grams">ml to grams</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pounds to cups calculator work out?', 'a' => 'Density, from Pounds, D 2, D 3 and D 4. The relationship is Cups = 1000000 × Pounds ÷ get_density(Density, More, D 2, D 3, D 4, D 5).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Pounds (pounds), Cups (US customary cups (236.59 ml)), Amount of butter (pounds), Cups (US customary cups (236.59 ml)). With pounds, cups and amount of butter in place, Density can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Cups, Pounds, Amount of butter and Cups blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'Are the Pounds to cups results exact?', 'a' => 'The arithmetic follows the selected ingredient and units, but density, packing and product size can vary. Check the ingredient match and weigh it when a recipe needs precision.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Density is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Pounds left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
        ],
        'related' => [
            ['path' => '/food/cups-to-pounds', 'name' => 'Cups to pounds'],
            ['path' => '/food/grams-to-cups', 'name' => 'Grams to cups'],
            ['path' => '/food/ml-to-grams', 'name' => 'ml to grams']
        ],
    ],
];

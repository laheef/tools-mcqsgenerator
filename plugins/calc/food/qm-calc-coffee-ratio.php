<?php

/**
 * Coffee ratio
 * /food/coffee-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Coffee ratio',
    'meta' => ['title' => 'Coffee ratio Calculator — Formula, Units & Example', 'description' => 'Calculate coffee grounds and water for a chosen cup count and brew ratio. Check serving sizes and labels before relying on the estimate.', 'h1' => 'Coffee ratio Calculator', 'updated' => '2024-07-09'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cups',
                            'label' => 'How many cups of coffee? ',
                            'type' => 'select',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                '7' => '7',
                                '8' => '8',
                                '9' => '9',
                                '10' => '10',
                            ],
                            'dataset' => 'cup',
                            'control' => 'DROPDOWN',
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ratio_choice',
                            'label' => 'Coffee : water ratio',
                            'type' => 'select',
                            'options' => [
                                '1:1.5 (Ristretto)' => '1.5',
                                '1:2 (Espresso)' => '3.6',
                                '1:3 (Lungo)' => '3',
                                '9:40 (Cold Brew)' => '4.444',
                                '1:10 (Moka Pot)' => '10',
                                '1:11 (Aeropress)' => '11',
                                '1:12 (French Press)' => '12',
                                '3:50 (V60)' => '16.6666',
                                '3:50 (Siphon)' => '16.6666',
                                '1:17 (Chemex)' => '17',
                                'Custom' => '',
                            ],
                            'dataset' => 'ratio_ch',
                            'control' => 'DROPDOWN',
                            'default' => '1:11 (Aeropress)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ratio',
                            'label' => 'Custom ratio',
                            'type' => 'result',
                            'prefix' => '1 : ',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beans',
                            'label' => 'Ground coffee',
                            'type' => 'number',
                            'unit' => '427',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
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
                            'unit' => '427',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'finalBeans',
                            'label' => 'Ground coffee',
                            'type' => 'number',
                            'unit' => '427',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'finalWater',
                            'label' => 'Water',
                            'type' => 'number',
                            'unit' => '427',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalVolume',
                            'label' => 'Final coffee volume',
                            'type' => 'number',
                            'help' => 'Volume of brewed coffee.',
                            'unit' => '427',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'volumePerCup',
                            'label' => 'Volume per cup',
                            'type' => 'number',
                            'help' => 'Volume of brewed coffee per cup.',
                            'unit' => '427',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        When you're making espresso, you need to consider water retention, i.e., the amount of water that stays in the coffee cake in the machine. That's why we recommend you use 3.6 times more water to achieve the perfect coffee ratio.&nbsp;
                        TXT],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'water = beans * ratio',
            'results' => ['beans' => 'water/ratio', 'water' => 'beans*ratio', 'ratio' => 'water/beans'],
        ],
        [
            'title' => 'finalWater = water * cups',
            'results' => ['cups' => 'finalWater/water', 'water' => 'finalWater/cups', 'finalWater' => 'cups*water'],
        ],
        [
            'title' => 'finalBeans = beans * cups',
            'results' => ['cups' => 'finalBeans/beans', 'beans' => 'finalBeans/cups', 'finalBeans' => 'beans*cups'],
        ],
        [
            'title' => 'totalVolume = cups * water * 0.8753',
            'results' => ['cups' => '(10000/8753)*totalVolume/water', 'water' => '(10000/8753)*totalVolume/cups', 'totalVolume' => '(8753/10000)*cups*water'],
        ],
        [
            'title' => 'volumePerCup = water * 0.8753',
            'results' => ['volumePerCup' => '(8753/10000)*water', 'water' => '(10000/8753)*volumePerCup'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Coffee ratio turns How many cups of coffee?, Coffee: water ratio and Ground coffee into Custom ratio. There is no hidden constant here: change custom ratio and how many cups of coffee? moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Coffee ratio calculator works', 'html' => <<<'TXT'
            <p>Coffee ratio answers one question from 8 numbers, and the answer is Custom ratio.</p><p>In the form&#039;s own words, Water = Ground coffee × Custom ratio.</p><p>What comes back is Custom ratio — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 8 boxes, and nothing else.</p><ul><li><strong>How many cups of coffee?</strong> — a plain number, no unit</li><li><strong>Coffee: water ratio</strong> — a plain number, no unit</li><li><strong>Ground coffee</strong> — in grams</li><li><strong>Water</strong> — in milliliters</li><li><strong>Ground coffee</strong> — in grams</li><li><strong>Water</strong> — in milliliters</li><li><strong>Final coffee volume</strong> — in milliliters. Volume of brewed coffee.</li><li><strong>Volume per cup</strong> — in milliliters. Volume of brewed coffee per cup.</li></ul><p>The result box is Custom ratio. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Coffee: water ratio = 11; the answers are <strong>How many cups of coffee?</strong> = 1.</p><ul><li><strong>How many cups of coffee?</strong> = 1</li></ul><p>That is <strong>Water</strong> = <code>Ground coffee × Custom ratio</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>How many cups of coffee?</strong> = 1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Ground coffee offers 22 units and opens on grams, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Water</strong> = <code>Ground coffee × Custom ratio</code></li><li><strong>Ground coffee</strong> = <code>Water ÷ Custom ratio</code></li><li><strong>Custom ratio</strong> = <code>Water ÷ Ground coffee</code></li><li><strong>How many cups of coffee?</strong> = <code>Water ÷ Water</code></li><li><strong>Final coffee volume</strong> = <code>(8753 ÷ 10000) × How many cups of coffee? × Water</code></li><li><strong>Volume per cup</strong> = <code>(8753 ÷ 10000) × Water</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Water</strong> = <code>Ground coffee × Custom ratio</code> — the form to use when Ground coffee and Custom ratio are the values you have.</li><li><strong>Ground coffee</strong> = <code>Water ÷ Custom ratio</code> — the form to use when Water and Custom ratio are the values you have.</li><li><strong>Custom ratio</strong> = <code>Water ÷ Ground coffee</code> — the form to use when Water and Ground coffee are the values you have.</li><li><strong>Water</strong> = <code>How many cups of coffee? × Water</code> — the form to use when How many cups of coffee? and Water are the values you have.</li><li><strong>How many cups of coffee?</strong> = <code>Water ÷ Water</code> — the form to use when Water and Water are the values you have.</li><li><strong>Water</strong> = <code>Water ÷ How many cups of coffee?</code> — the form to use when Water and How many cups of coffee? are the values you have.</li><li><strong>Ground coffee</strong> = <code>Ground coffee × How many cups of coffee?</code> — the form to use when Ground coffee and How many cups of coffee? are the values you have.</li><li><strong>How many cups of coffee?</strong> = <code>Ground coffee ÷ Ground coffee</code> — the form to use when Ground coffee and Ground coffee are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Water, Ground coffee and Custom ratio can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Coffee: water ratio from 11 to 22, leaving every other box alone. The panel moves from <strong>How many cups of coffee?</strong> 1 to <strong>How many cups of coffee?</strong> 1.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Ground coffee, Water and Ground coffee is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Custom ratio is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>How many cups of coffee? left as a guess.</strong> If How many cups of coffee? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Coffee: water ratio left as a guess.</strong> If Coffee: water ratio is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> If How many cups of coffee? is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Coffee ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>How many cups of coffee?</strong> takes a plain number with no unit attached. The page reads it when it works out Water, Water and Ground coffee. Fill it from a measurement rather than a memory — How many cups of coffee? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Coffee: water ratio</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Coffee: water ratio is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Ground coffee</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. The page reads it when it works out Water, Custom ratio and How many cups of coffee?. Fill it from a measurement rather than a memory — Ground coffee is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Water</strong> is a milliliters quantity: the page opens it in ml and converts anything else you pick before the formula runs. The page reads it when it works out Ground coffee, Custom ratio and How many cups of coffee?. Fill it from a measurement rather than a memory — Water is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Ground coffee</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. The page reads it when it works out How many cups of coffee? and Ground coffee. Fill it from a measurement rather than a memory — Ground coffee is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Water</strong> is a milliliters quantity: the page opens it in ml and converts anything else you pick before the formula runs. The page reads it when it works out How many cups of coffee? and Water. Fill it from a measurement rather than a memory — Water is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Final coffee volume</strong> is a milliliters quantity: the page opens it in ml and converts anything else you pick before the formula runs. Volume of brewed coffee. The page reads it when it works out How many cups of coffee? and Water. Fill it from a measurement rather than a memory — Final coffee volume is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Volume per cup</strong> is a milliliters quantity: the page opens it in ml and converts anything else you pick before the formula runs. Volume of brewed coffee per cup. The page reads it when it works out Water. Fill it from a measurement rather than a memory — Volume per cup is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Custom ratio</strong> is a plain number. It is computed from Water and Ground coffee, so it changes the moment any of them does. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>How many cups of coffee?</th></tr></thead><tbody><tr><td><strong>Coffee: water ratio</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Coffee: water ratio sits at the top — a ten per cent error in that box shows up as roughly 0 per cent in the answer. By contrast, Coffee: water ratio barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. </p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Coffee: water ratio = 5.5 and the page reports <strong>How many cups of coffee?</strong> = 1.</li><li>Feed in Coffee: water ratio = 33 and the page reports <strong>How many cups of coffee?</strong> = 1.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Coffee ratio actually offers.</p><ul><li><strong>grams</strong> — opens in <em>g</em>, and the chip also carries oz, ml, US fl oz, kg, lb and UK fl oz. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Custom ratio follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover grams. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: How many cups of coffee?, Coffee: water ratio and Ground coffee measured, Custom ratio wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related calculators: <a href="/food/coffee-to-water-ratio">Coffee to water ratio</a>, <a href="/food/cold-brew-ratio">Cold brew ratio</a> and <a href="/food/coffee">Coffee</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Coffee ratio calculator work out?', 'a' => 'Custom ratio, from Ground coffee and Custom ratio. The relationship is Water = Ground coffee × Custom ratio.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            How many cups of coffee?, Coffee: water ratio, Ground coffee (grams), Water (milliliters), Ground coffee (grams). Fill how many cups of coffee?, coffee: water ratio and ground coffee and leave Custom ratio empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Water, Ground coffee, Custom ratio and Water can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'Are the Coffee ratio results exact?', 'a' => 'No. Nutrition and caffeine vary with brands, recipes, preparation and serving size. Use the product label for a closer estimate; this calculator is not individualized health advice.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Custom ratio is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave How many cups of coffee? blank and the page solves for it, reporting Custom ratio instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Custom ratio keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/food/coffee-to-water-ratio', 'name' => 'Coffee to water ratio'],
            ['path' => '/food/cold-brew-ratio', 'name' => 'Cold brew ratio'],
            ['path' => '/food/coffee', 'name' => 'Coffee']
        ],
    ],
];

<?php

/**
 * Coffee
 * /food/coffee
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Coffee',
    'meta' => ['title' => 'Coffee Calculator: Formula, Steps & Examples', 'description' => 'Estimate caffeine per serving or compare intake using drink amounts and caffeine values. Check serving sizes and labels before relying on the estimate.', 'h1' => 'Coffee Calculator', 'updated' => '2026-07-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Body weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sensitivity',
                            'label' => 'Your coffee sensitivity',
                            'type' => 'select',
                            'options' => [
                                'Very tolerant' => '7.9',
                                'Tolerant' => '7',
                                'Average' => '6',
                                'Sensitive' => '4.4',
                                'Very sensitive' => '3.1',
                            ],
                            'dataset' => 'sensitivity',
                            'default' => 'Average',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'drink',
                            'label' => 'Drink',
                            'type' => 'select',
                            'options' => [
                                '7 Eleven Brewed Coffee' => '280',
                                'Alpine Start Instant Coffee' => '120',
                                'Americano Coffee' => '154',
                                'Arby\'s Jamocha Shake' => '11.6',
                                'Barista Bros Iced Coffee' => '140',
                                'Baskin Robbins Cappuccino Blast' => '234',
                                'Big Train Java Chip Iced Coffee' => '49',
                                'Biggby Brewed Coffee' => '200',
                                'Biggby Creamy Lattes' => '100',
                                'Biggby Espresso' => '100',
                                'Biggby Iced Coffee' => '155',
                                'Biohazard Coffee' => '928',
                                'Bizzy Cold Brew' => '125',
                                'Black Ink Coffee' => '144',
                                'Black Insomnia Coffee' => '1105',
                                'Black Label Brewed Coffee' => '1555',
                                'Bottled Iced Coffee Dunkin Donuts' => '171',
                                'Bulletproof Coffee' => '145',
                                'Cafe Bustelo' => '150',
                                'Cafe Con Leche' => '154',
                                'Caffe Mocha' => '152',
                                'Caffe Nero Coffee' => '160',
                                'Califia Farms Cold Brew Coffee' => '180',
                                'Cannonball Coffee Maximum Charge (UK)' => '1101',
                                'Cappuccino' => '154',
                                'Caribou Brewed Coffee' => '305',
                                'Caribou Canned Cold Brew' => '177',
                                'CBD Coffee' => '100',
                                'Chameleon Cold Brew Coffee' => '200',
                                'Chameleon Cold Brew RTD' => '230',
                                'Chameleon Cold Brew With Milk' => '100',
                                'Chick-fil-A Brewed Coffee' => '136',
                                'Chick-fil-A Frosted Coffee' => '130',
                                'Chick-fil-A Iced Coffee' => '80',
                                'Choffy (roasted cacao)' => '23',
                                'Black Coffee' => '163',
                                'Coffee (Decaf Instant)' => '2.4',
                                'Coffee (Instant)' => '57',
                                'Coffee Bean & Tea leaf Coffee' => '333',
                                'Coffee Leaf Tea' => '20',
                                'COGO Caffeinated Hot Chocolate' => '98',
                                'CoolBrew Coffee' => '60',
                                'Costa Coffee' => '277',
                                'Crio Bru Brewed Cacao' => '10',
                                'Dare Iced Coffee' => '160',
                                'Death Wish Canned Cold Brew' => '300',
                                'Death Wish Coffee' => '728',
                                'Death Wish Latte' => '300',
                                'Decaf Coffee' => '5.6',
                                'Driftaway Coffee' => '160',
                                'Dripdash Kyoto Coffee' => '225',
                                'Dunkin Donuts Shot In The Dark' => '134',
                                'Dunkin\' Cold Brew' => '260',
                                'Dunkin\' Donuts Brewed Coffee' => '210',
                                'Dunkin\' Donuts Dunkaccino' => '83',
                                'Dunkin\' Donuts Extra Charged Coffee' => '252',
                                'Dunkin\' Donuts Iced Coffee' => '297',
                                'Dunkin\' Donuts Iced Latte' => '166',
                                'Dunkin\' Donuts Latte' => '166',
                                'Dutch Bros Coffee (Classic)' => '187',
                                'Eight O\'Clock Coffee' => '112',
                                'Einstein Bros Coffee' => '206',
                                'Espresso Monster' => '160',
                                'Espresso Shot' => '77',
                                'Flat White' => '130',
                                'Folgers Coffee' => '112',
                                'Gloria Jean\'s Coffee' => '67',
                                'Gold Peak Coffee' => '126',
                                'Gothrider Gasoline Coffee' => '200',
                                'Gourmesso Coffee Pods' => '65',
                                'Greek Coffee (Metrios)' => '50',
                                'Guayaki Canned Yerba Mate' => '150',
                                'GymBrew Coffee' => '333',
                                'Hell Energy Coffee' => '100',
                                'High Brew Coffee' => '140',
                                'High Voltage Coffee (AU)' => '1150',
                                'Illy Issimo Cafe' => '155',
                                'Indulgio Cappuccino' => '20',
                                'International Delight Iced Coffee' => '88',
                                'Jiva Instant Coffee Cubes' => '90',
                                'K-Cup Decaf' => '4',
                                'K-Cup Coffee' => '100',
                                'Killer Coffee (AU)' => '430',
                                'La Colombe Cold Brew ' => '180',
                                'La Colombe Draft Latte' => '120',
                                'Latte' => '154',
                                'Long Black' => '154',
                                'Maxwell House Coffee' => '112',
                                'Maxwell House Max Boost Coffee' => '196',
                                'McDonalds (McCafe) Latte' => '142',
                                'McDonalds (McCafe) Mocha' => '167',
                                'McDonalds Coffee' => '145',
                                'McDonalds Iced Coffee' => '133',
                                'Monster Energy' => '180',
                                'Muscle Milk Coffee House' => '120',
                                'Mushroom Coffee' => '40',
                                'Nescafe 3 in 1 Instant Coffee' => '50',
                                'Nescafe Dolce Gusto' => '106',
                                'Nescafe Gold' => '66',
                                'Nescafe Ice Java' => '100',
                                'Nescafe Ricoffy' => '6.3',
                                'Nespresso Coffee Capsules' => '60',
                                'Nestle Milo' => '3.5',
                                'Noocaf Smart Coffee' => '160',
                                'Ocean Spray Brew' => '40',
                                'Panera Bread Coffee' => '189',
                                'Peet\'s Brewed Coffee' => '267',
                                'Peet\'s Caffe Americano' => '140',
                                'Peet\'s Caffe Latte' => '140',
                                'Peet\'s Caffe Mocha' => '165',
                                'Peet\'s Cappuccino' => '140',
                                'Peet\'s Coffee Espresso' => '70',
                                'Peet\'s Decaf Espresso' => '10',
                                'Peet\'s Iced Coffee' => '150',
                                'Peet\'s Iced Latte' => '140',
                                'Peet\'s Iced Mocha' => '165',
                                'Premier Protein Cafe Latte' => '120',
                                'Private Selection Canned Espresso' => '145',
                                'Purity Coffee' => '163',
                                'Red Bull' => '90',
                                'Revv Coffee Pods' => '127',
                                'Robusta Coffee' => '265',
                                'Rockstar' => '240',
                                'Seattle\'s Best Brewed Coffee' => '260',
                                'SlimFast Shake - Cappuccino' => '100',
                                'Starbucks 2X Coffee Pods' => '260',
                                'Starbucks Bottled Cold Brew' => '180',
                                'Starbucks Bottled Frappuccino' => '110',
                                'Starbucks Bottled Iced Coffee' => '640',
                                'Starbucks Canned Nitro Cold Brew' => '235',
                                'Starbucks Caramel Macchiato' => '150',
                                'Starbucks Cold & Crafted' => '135',
                                'Starbucks Cold Brew Coffee' => '205',
                                'Starbucks Cordusio Mocha' => '155',
                                'Starbucks Decaf Coffee' => '25',
                                'Starbucks Doubleshot Energy' => '135',
                                'Starbucks Doubleshot Espresso' => '120',
                                'Starbucks Grande Caffe Americano' => '225',
                                'Starbucks Grande Caffe Latte' => '150',
                                'Starbucks Grande Caffe Mocha' => '175',
                                'Starbucks Grande Cappuccino' => '150',
                                'Starbucks Grande Coffee' => '310',
                                'Starbucks Iced Americano' => '225',
                                'Starbucks Iced Espresso Classics' => '125',
                                'Starbucks Nitro Cold Brew Coffee' => '280',
                                'Starbucks Pink Drink' => '45',
                                'Starbucks Pumpkin Cream Cold Brew' => '185',
                                'Starbucks Refreshers' => '45',
                                'Starbucks Verismo Coffee Pods' => '60',
                                'Starbucks Via Ready Brew' => '135',
                                'Steep 18 Cold Brew' => '90',
                                'Stipe Miocic Extra Strength Coffee' => '500',
                                'Stok Coffee Shots' => '40',
                                'Stok Cold Brew' => '145',
                                'Stumptown Cold Brew Coffee' => '279',
                                'Stumptown Nitro Cold Brew' => '330',
                                'Sudden Instant Coffee' => '95',
                                'Sunup Green Coffee' => '285',
                                'Taft Coffee (EU)' => '1182',
                                'Taster\'s Choice Instant Coffee' => '98',
                                'Tea' => '30',
                                'Tim Hortons Large Brewed Coffee' => '200',
                                'Tim Hortons Small French Vanilla Coffee' => '60',
                                'TrueStart Performance Coffee' => '95',
                                'Turkish Coffee' => '50',
                                'V  Iced Coffee' => '155',
                                'Very Strong Coffee' => '1350',
                                'Voila Instant Coffee' => '100',
                                'Waka Decaf Instant Coffee' => '4',
                                'Waka Indian Instant Coffee' => '70',
                                'Waka Instant Coffee' => '70',
                                'Wawa Coffee' => '290',
                                'Whipped (Dalgona) Coffee' => '105',
                                'Wide Awake Energy Coffee' => '180',
                                'Wide Awake Coffee Cold Brew' => '120',
                                'Wide Awake Iced Coffee Drinks' => '30',
                                'Yerba Mate' => '40',
                                'Zola Coconut Water Espresso' => '125',
                            ],
                            'dataset' => 'drink',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number',
                            'label' => 'Number of portions',
                            'type' => 'number',
                            'suffix' => '#',
                            'help' => 'Bottles, cups, cans - depending on the type of the beverage.&nbsp;',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        This estimate is above the FDA’s 400 mg/day reference amount for most adults. That figure is not an individual safe limit, and the servings shown are only a rough comparison. Caffeine sensitivity varies; if you are pregnant, trying to become pregnant, breastfeeding, or have a condition or medication concern, ask a healthcare professional about your intake.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Caffeine info',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caffeine',
                            'label' => 'Caffeine amount in 1 portion',
                            'type' => 'result',
                            'suffix' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalCaffeine',
                            'label' => 'Total caffeine',
                            'type' => 'number',
                            'suffix' => 'mg',
                            'help' => 'Caffeine amount in all portions combined.&nbsp;',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'info',
                            'label' => 'Info',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'safeAmount',
                            'label' => 'Safe amount',
                            'type' => 'presentation',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'number = (sensitivity * weight)/ caffeine ',
            'results' => ['caffeine' => 'sensitivity*weight/number', 'number' => 'sensitivity*weight/caffeine', 'sensitivity' => 'caffeine*number/weight', 'weight' => 'caffeine*number/sensitivity'],
        ],
        [
            'title' => 'number * caffeine = totalCaffeine',
            'results' => ['caffeine' => 'totalCaffeine/number', 'number' => 'totalCaffeine/caffeine', 'totalCaffeine' => 'caffeine*number'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Body weight, Your coffee sensitivity and Drink into Coffee and the answer comes back as Caffeine amount in 1 portion. It is a single relationship that reads caffeine amount in 1 portion out of body weight, not a table of canned results keyed by them. Units for Caffeine amount in 1 portion default to mg and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Coffee calculator works', 'html' => <<<'TXT'
            <p>Coffee answers one question from 7 numbers, and the answer is Caffeine amount in 1 portion.</p><p>Written with the labels from the form, Number of portions = Your coffee sensitivity × Body weight ÷ Caffeine amount in 1 portion.</p><p>What comes back is Caffeine amount in 1 portion — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 7 boxes and the page has everything it needs.</p><ul><li><strong>Body weight</strong> — in kilograms</li><li><strong>Your coffee sensitivity</strong> — a plain number, no unit</li><li><strong>Drink</strong> — a plain number, no unit</li><li><strong>Number of portions</strong> — in #. Bottles, cups, cans - depending on the type of the beverage.&amp;nbsp;</li><li><strong>Total caffeine</strong> — in mg. Caffeine amount in all portions combined.&amp;nbsp;</li><li><strong>Info</strong> — a plain number, no unit</li><li><strong>Safe amount</strong> — a plain number, no unit</li></ul><p>The result box is Caffeine amount in 1 portion in mg. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Number of portions</strong> = <code>Your coffee sensitivity × Body weight ÷ Caffeine amount in 1 portion</code></li><li><strong>Caffeine amount in 1 portion</strong> = <code>Your coffee sensitivity × Body weight ÷ Number of portions</code></li><li><strong>Your coffee sensitivity</strong> = <code>Caffeine amount in 1 portion × Number of portions ÷ Body weight</code></li><li><strong>Body weight</strong> = <code>Caffeine amount in 1 portion × Number of portions ÷ Your coffee sensitivity</code></li><li><strong>Total caffeine</strong> = <code>Caffeine amount in 1 portion × Number of portions</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Number of portions</strong> = <code>Your coffee sensitivity × Body weight ÷ Caffeine amount in 1 portion</code> — the form to use when Your coffee sensitivity, Body weight and Caffeine amount in 1 portion are the values you have.</li><li><strong>Caffeine amount in 1 portion</strong> = <code>Your coffee sensitivity × Body weight ÷ Number of portions</code> — the form to use when Your coffee sensitivity, Body weight and Number of portions are the values you have.</li><li><strong>Your coffee sensitivity</strong> = <code>Caffeine amount in 1 portion × Number of portions ÷ Body weight</code> — the form to use when Caffeine amount in 1 portion, Number of portions and Body weight are the values you have.</li><li><strong>Body weight</strong> = <code>Caffeine amount in 1 portion × Number of portions ÷ Your coffee sensitivity</code> — the form to use when Caffeine amount in 1 portion, Number of portions and Your coffee sensitivity are the values you have.</li><li><strong>Caffeine amount in 1 portion</strong> = <code>Total caffeine ÷ Number of portions</code> — the form to use when Total caffeine and Number of portions are the values you have.</li><li><strong>Number of portions</strong> = <code>Total caffeine ÷ Caffeine amount in 1 portion</code> — the form to use when Total caffeine and Caffeine amount in 1 portion are the values you have.</li><li><strong>Total caffeine</strong> = <code>Caffeine amount in 1 portion × Number of portions</code> — the form to use when Caffeine amount in 1 portion and Number of portions are the values you have.</li></ul><p>Any one of Number of portions, Caffeine amount in 1 portion and Your coffee sensitivity can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Body weight carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Caffeine amount in 1 portion is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Body weight left as a guess.</strong> Anything typed into Body weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Your coffee sensitivity left as a guess.</strong> Anything typed into Your coffee sensitivity is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Convert Body weight to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Body weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. The page reads it when it works out Caffeine amount in 1 portion, Number of portions and Your coffee sensitivity. Check the field label and unit before calculating.</li><li><strong>Your coffee sensitivity</strong> takes a plain number with no unit attached. The page reads it when it works out Caffeine amount in 1 portion, Number of portions and Body weight. Check the field label and unit before calculating.</li><li><strong>Drink</strong> takes a plain number with no unit attached. Check the field label and unit before calculating.</li><li><strong>Number of portions</strong> is measured in #. Bottles, cups, cans - depending on the type of the beverage.&amp;nbsp;. The page reads it when it works out Caffeine amount in 1 portion, Your coffee sensitivity and Body weight. Check the field label and unit before calculating.</li><li><strong>Total caffeine</strong> is measured in mg. Caffeine amount in all portions combined.&amp;nbsp;. The page reads it when it works out Caffeine amount in 1 portion and Number of portions. Check the field label and unit before calculating.</li><li><strong>Info</strong> takes a plain number with no unit attached. Check the field label and unit before calculating.</li><li><strong>Safe amount</strong> takes a plain number with no unit attached. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p> Read them in this order:</p><ul><li><strong>Caffeine amount in 1 portion</strong> is a plain number. It is computed from Your coffee sensitivity, Body weight and Number of portions, so it changes the moment any of them does. </li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p> The tables, with the unit each box opens in:</p><ul><li><strong>kilograms</strong> — opens in <em>kg</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Caffeine amount in 1 portion is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Body weight, Your coffee sensitivity and Drink are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Body weight, Your coffee sensitivity and Drink measured, Caffeine amount in 1 portion wanted.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>Related calculators: <a href="/food/coffee-ratio">Coffee ratio</a>, <a href="/food/coffee-to-water-ratio">Coffee to water ratio</a> and <a href="/food/healthy-coffee">Healthy coffee</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Coffee calculator work out?', 'a' => <<<'TXT'
            Caffeine amount in 1 portion, from Your coffee sensitivity, Body weight and Caffeine amount in 1 portion. The relationship is Number of portions = Your coffee sensitivity × Body weight ÷ Caffeine amount in 1 portion.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Body weight (kilograms), Your coffee sensitivity, Drink, Number of portions (#), Total caffeine (mg). With body weight, your coffee sensitivity and drink in place, Caffeine amount in 1 portion can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Number of portions, Caffeine amount in 1 portion, Your coffee sensitivity and Body weight blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Caffeine amount in 1 portion is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Body weight left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Caffeine amount in 1 portion keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/food/coffee-ratio', 'name' => 'Coffee ratio'],
            ['path' => '/food/coffee-to-water-ratio', 'name' => 'Coffee to water ratio'],
            ['path' => '/food/healthy-coffee', 'name' => 'Healthy coffee']
        ],
    ],
];

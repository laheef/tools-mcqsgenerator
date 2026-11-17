<?php

/**
 * Thanksgiving
 * /food/thanksgiving
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Thanksgiving',
    'meta' => ['title' => 'Thanksgiving Calculator — Formula & Results', 'description' => 'Plan turkey and stuffing quantities from guest count and leftovers preference. Check units and follow the recipe or package directions.', 'h1' => 'Thanksgiving Calculator', 'updated' => '2026-07-28'],
    'sections' => [
        [
            'title' => 'Invited to the party',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Adults',
                            'label' => 'Adults',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Children',
                            'label' => 'Children',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Leftovers',
                            'label' => 'Do you want leftovers?',
                            'type' => 'select',
                            'options' => ['No' => '1', 'Yes' => '1.3'],
                            'dataset' => 'Leftovers',
                            'default' => 'No',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Here\'s how much food you\'re gonna need...',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Turkey',
                            'label' => 'Turkey ',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Stuffing',
                            'label' => 'Stuffing',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Appetizers',
                            'label' => 'Appetizers',
                            'type' => 'number',
                            'suffix' => 'pieces',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Wine_amount',
                            'label' => 'Wine ',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Cheese',
                            'label' => 'Cheese ',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Cranberry_Souce',
                            'label' => 'Cranberry sauce',
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
                            'name' => 'Veggie_sides',
                            'label' => 'Veggie sides ',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Potato',
                            'label' => 'Potatoes ',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Rolls',
                            'label' => 'Rolls',
                            'type' => 'number',
                            'suffix' => 'pieces',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Pies',
                            'label' => '9-inch pies',
                            'type' => 'number',
                            'suffix' => 'pieces',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'And now to burn those calories',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Calories',
                            'label' => 'Calories',
                            'type' => 'number',
                            'rounding' => ['omni', '0.000001'],
                            'default' => '2500',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Weight',
                            'label' => 'Weight',
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
                            'name' => 'Activity',
                            'label' => 'Activity type',
                            'type' => 'select',
                            'options' => [
                                'Walking (average pace)' => '2.5',
                                'Climbing stairs' => '4',
                                'Jogging (slow)' => '6',
                                'Hiking' => '6.5',
                                'Jogging (average)' => '8',
                                'Biking (fast)' => '9',
                                'Running (fast)' => '13.5',
                            ],
                            'dataset' => 'Activity',
                            'control' => 'DROPDOWN',
                            'default' => 'Jogging (slow)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Time_needed',
                            'label' => 'Time needed',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Wine_amount = 0.709765 * Adults',
            'results' => ['Wine_amount' => '(141953/200000)*Adults', 'Adults' => '(200000/141953)*Wine_amount'],
        ],
        [
            'title' => 'Appetizers = Adults * 7 + (Children * 7 / 2)',
            'results' => ['Children' => '-2*Adults + (2/7)*Appetizers', 'Appetizers' => '7*Adults + (7/2)*Children', 'Adults' => '(1/7)*Appetizers - 1/2*Children'],
        ],
        [
            'title' => 'Cheese = Adults * 0.056699 + (Children * 0.056699 / 2)',
            'results' => ['Cheese' => '(56699/1000000)*Adults + (56699/2000000)*Children', 'Children' => '-2*Adults + (2000000/56699)*Cheese', 'Adults' => '(1000000/56699)*Cheese - 1/2*Children'],
        ],
        [
            'title' => 'Turkey = (Adults * 0.680389 + (Children * 0.680389 / 2)) * Leftovers',
            'results' => ['Turkey' => '(680389/2000000)*Leftovers*(2*Adults + Children)', 'Children' => '-2*Adults + (2000000/680389)*Turkey/Leftovers', 'Leftovers' => '(2000000/680389)*Turkey/(2*Adults + Children)', 'Adults' => '-1/2*Children + (1000000/680389)*Turkey/Leftovers'],
        ],
        [
            'title' => 'Cranberry_Souce = Adults * 0.05914706 + (Children * 0.05914706 / 2)',
            'results' => ['Cranberry_Souce' => '(2957353/50000000)*Adults + (2957353/100000000)*Children', 'Children' => '-2*Adults + (100000000/2957353)*Cranberry_Souce', 'Adults' => '-1/2*Children + (50000000/2957353)*Cranberry_Souce'],
        ],
        [
            'title' => 'Veggie_sides = Adults * 0.0992233 + (Children * 0.0992233 / 2)',
            'results' => ['Children' => '-2*Adults + (20000000/992233)*Veggie_sides', 'Veggie_sides' => '(992233/10000000)*Adults + (992233/20000000)*Children', 'Adults' => '-1/2*Children + (10000000/992233)*Veggie_sides'],
        ],
        [
            'title' => 'Stuffing = Adults * 0.113398 + (Children * 0.113398 / 2)',
            'results' => ['Stuffing' => '(56699/500000)*Adults + (56699/1000000)*Children', 'Children' => '-2*Adults + (1000000/56699)*Stuffing', 'Adults' => '-1/2*Children + (500000/56699)*Stuffing'],
        ],
        [
            'title' => 'Potato = Adults * 0.15 + (Children * 0.15 / 2)',
            'results' => ['Children' => '-2*Adults + (40/3)*Potato', 'Potato' => '(3/20)*Adults + (3/40)*Children', 'Adults' => '-1/2*Children + (20/3)*Potato'],
        ],
        [
            'title' => 'Rolls = Adults * 2 + Children',
            'results' => ['Children' => '-2*Adults + Rolls', 'Rolls' => '2*Adults + Children', 'Adults' => '-1/2*Children + (1/2)*Rolls'],
        ],
        [
            'title' => 'Pies = ceil(Adults * 0.1666667 + (Children * 0.1666667 / 2))',
            'results' => ['Pies' => 'ceil((1666667/10000000)*Adults + (1666667/20000000)*Children)'],
        ],
        [
            'title' => 'Time_needed = Calories / (Weight * Activity)',
            'results' => ['Activity' => 'Calories/(Time_needed*Weight)', 'Calories' => 'Activity*Time_needed*Weight', 'Weight' => 'Calories/(Activity*Time_needed)', 'Time_needed' => 'Calories/(Activity*Weight)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Adults into Thanksgiving and the answer comes back as Children and Do you want leftovers?. The arithmetic is the whole method: children is worked out from adults by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Thanksgiving calculator works', 'html' => <<<'TXT'
            <p>Thanksgiving answers one question from 1 number, and the answer is Children, Do you want leftovers? and Turkey.</p><p>The relationship it solves reads Wine = (141953 ÷ 200000) × Adults.</p><p>What comes back is Children, Do you want leftovers?, Turkey and Stuffing — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Adults</strong> — a plain number, no unit</li></ul><p>The result boxes are Children, Do you want leftovers?, Turkey in kilograms, Stuffing in kilograms, Appetizers in pieces, Wine in liters, Cheese in kilograms, Cranberry sauce in milliliters, Veggie sides in kilograms, Potatoes in kilograms, Rolls in pieces, 9-inch pies in pieces, Calories, Weight in kilograms, Activity type, Time needed in hours; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Adults = 10, Children = 100, Do you want leftovers? = 1, Turkey = 1000 kg, Stuffing = 10 kg, Appetizers = 100 pieces, Cheese = 1000 kg, Cranberry sauce = 10 ml, Veggie sides = 100 kg, Potatoes = 1000 kg, Rolls = 10 pieces, 9-inch pies = 100 pieces, Calories = 2500, Weight = 10 kg, Activity type = 6 and Time needed = 100 hrs — through the same formula and the panel reports <strong>Wine</strong> = 7.1 liters.</p><ul><li><strong>Wine</strong> = 7.1 liters</li></ul><p>That is <strong>Wine</strong> = <code>(141953 ÷ 200000) × Adults</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Wine</strong> = 7.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Turkey lists 7 options and opens on kilograms. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Wine</strong> = <code>(141953 ÷ 200000) × Adults</code></li><li><strong>Adults</strong> = <code>(200000 ÷ 141953) × Wine</code></li><li><strong>Appetizers</strong> = <code>7 × Adults + (7 ÷ 2) × Children</code></li><li><strong>Children</strong> = <code>− 2 × Adults + (2 ÷ 7) × Appetizers</code></li><li><strong>Cheese</strong> = <code>(56699 ÷ 1000000) × Adults + (56699 ÷ 2000000) × Children</code></li><li><strong>Turkey</strong> = <code>(680389 ÷ 2000000) × Do you want leftovers? × (2 × Adults + Children)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Wine</strong> = <code>(141953 ÷ 200000) × Adults</code> — the form to use when Adults are the values you have.</li><li><strong>Adults</strong> = <code>(200000 ÷ 141953) × Wine</code> — the form to use when Wine are the values you have.</li><li><strong>Appetizers</strong> = <code>7 × Adults + (7 ÷ 2) × Children</code> — the form to use when Adults and Children are the values you have.</li><li><strong>Children</strong> = <code>− 2 × Adults + (2 ÷ 7) × Appetizers</code> — the form to use when Adults and Appetizers are the values you have.</li><li><strong>Adults</strong> = <code>(1 ÷ 7) × Appetizers − 1 ÷ 2 × Children</code> — the form to use when Appetizers and Children are the values you have.</li><li><strong>Cheese</strong> = <code>(56699 ÷ 1000000) × Adults + (56699 ÷ 2000000) × Children</code> — the form to use when Adults and Children are the values you have.</li><li><strong>Children</strong> = <code>− 2 × Adults + (2000000 ÷ 56699) × Cheese</code> — the form to use when Adults and Cheese are the values you have.</li><li><strong>Adults</strong> = <code>(1000000 ÷ 56699) × Cheese − 1 ÷ 2 × Children</code> — the form to use when Cheese and Children are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Wine, Adults and Appetizers can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Adults, from 10 to 20 — and the answers go from <strong>Wine</strong> 7.1 liters to <strong>Wine</strong> 14.2 liters.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Children, Do you want leftovers? and Turkey are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Adults left as a guess.</strong> Anything typed into Adults is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> If Adults is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Thanksgiving form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Adults</strong> takes a plain number with no unit attached. Change it and Wine, Children and Appetizers changes with it. Fill it from a measurement rather than a memory — Adults is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 16 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Children</strong> is a plain number. The value follows from Adults and Appetizers. </li><li><strong>Do you want leftovers?</strong> is a plain number. The value follows from Turkey, Adults and Children. </li><li><strong>Turkey</strong> is a kilograms figure. The value follows from Do you want leftovers?, Adults and Children. </li><li><strong>Stuffing</strong> is a kilograms figure. The value follows from Adults and Children. </li><li><strong>Appetizers</strong> is a plain number. The value follows from Adults and Children. </li><li><strong>Wine</strong> is a liters figure and the page's own defaults put it at 7.1 liters. The value follows from Adults. </li><li><strong>Cheese</strong> is a kilograms figure. The value follows from Adults and Children. </li><li><strong>Cranberry sauce</strong> is a milliliters figure. The value follows from Adults and Children. </li><li><strong>Veggie sides</strong> is a kilograms figure. The value follows from Adults and Children. </li><li><strong>Potatoes</strong> is a kilograms figure. The value follows from Adults and Children. </li><li><strong>Rolls</strong> is a plain number. The value follows from Adults and Children. </li><li><strong>9-inch pies</strong> is a plain number. The value follows from Adults and Children. </li><li><strong>Calories</strong> is a plain number. The value follows from Activity type, Time needed and Weight. </li><li><strong>Weight</strong> is a kilograms figure. The value follows from Calories, Activity type and Time needed. </li><li><strong>Activity type</strong> is a plain number. The value follows from Calories, Time needed and Weight. </li><li><strong>Time needed</strong> is a hours figure. The value follows from Calories, Activity type and Weight. </li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Children is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover kilograms, liters and hours. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Adults is what you already know and Children and Do you want leftovers? is what you need — the reverse of that situation is what the rearranged form is for.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>Related calculators: <a href="/food/turkey-size">Turkey size</a>, <a href="/food/turkey-cooking-time">Turkey cooking time</a> and <a href="/food/thanksgiving-calories">Thanksgiving Calories</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Thanksgiving calculator work out?', 'a' => 'Children, Do you want leftovers?, Turkey and Stuffing, from Adults. The relationship is Wine = (141953 ÷ 200000) × Adults.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Adults. With adults in place, Children can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Wine, Adults, Appetizers and Children can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'Are the Thanksgiving results exact?', 'a' => 'It uses the values and assumptions represented in the form. Real ingredients and conditions can vary, so check units and follow the recipe, product label or safety instructions that apply.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Children is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Adults blank and the page solves for it, reporting Children instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Children at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/food/turkey-size', 'name' => 'Turkey size'],
            ['path' => '/food/turkey-cooking-time', 'name' => 'Turkey cooking time'],
            ['path' => '/food/thanksgiving-calories', 'name' => 'Thanksgiving Calories']
        ],
    ],
];

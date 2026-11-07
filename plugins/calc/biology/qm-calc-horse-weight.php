<?php

/**
 * Horse weight
 * /biology/horse-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Horse weight',
    'meta' => ['title' => 'Horse weight Calculator — Formula, Units & Example', 'description' => 'Supply the height, the neck circumference, the girth circumference and the body length and the Horse weight calculator solves for <strong>actual…', 'h1' => 'Horse weight Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'breed' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ThvDOFCjyyVL8IS9qLHtn', 'c' => null],
                    ['v' => 'ThvDOFCjyyVL8IS9qLHtn', 'c' => 'userUsesImperialUnits()'],
                ],
                'ds' => 'mWHaXt6c4uSJ-5hd2M005',
            ],
            'estimatedIdeal' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'estimatedWeight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'girth' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'height' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'neck' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'TxAzb4N98quWJLufw4y4M',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'breed',
                                    'vt' => 'valueSelect',
                                    'l' => 'Type',
                                    'ds' => 'mWHaXt6c4uSJ-5hd2M005',
                                    'opts' => [
                                        ['ThvDOFCjyyVL8IS9qLHtn', 'Arabian', '0'],
                                        ['FZiVnsEDgoD3U4uZwE53N', 'Pony', '1'],
                                        ['agJLP7fG1FP1VX0cECQ-q', 'Stock horse', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['horse-weight/horse-weight-measurements.png'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'qjU7HQRtOnPsKk01AIKU8',
                'title' => 'Horse\'s measurements',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'height',
                                    'vt' => 'numerical',
                                    'l' => 'Height (A)',
                                    'h' => 'At the third thoracic vertebra.',
                                    'us' => '4',
                                    'du' => 'cm',
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
                                    'n' => 'neck',
                                    'vt' => 'numerical',
                                    'l' => 'Neck circumference (B)',
                                    'h' => 'Located halfway between the poll and the withers.',
                                    'us' => '4',
                                    'du' => 'cm',
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
                                    'n' => 'girth',
                                    'vt' => 'numerical',
                                    'l' => 'Girth circumference (C)',
                                    'h' => 'At the base of the mane hairs.',
                                    'us' => '4',
                                    'du' => 'cm',
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
                                    'n' => 'length',
                                    'vt' => 'numerical',
                                    'l' => 'Body length (D)',
                                    'h' => 'The straight line parallel to the ground from the point of the shoulder to the rear of the horse.',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'FHm8b7HC7w5zqbSPqjZNB',
                'title' => 'Result',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'estimatedWeight',
                                    'vt' => 'numerical',
                                    'l' => 'Actual weight',
                                    'h' => 'The estimation of how much the horse weighs from the four measurements you provided.',
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
                                    'n' => 'estimatedIdeal',
                                    'vt' => 'numerical',
                                    'l' => 'Ideal weight',
                                    'h' => 'The estimation of how much the horse should weigh based on the height and length you provided.',
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
                                    't' => 'x',
                                    'c' => [
                                        ['breed == 1 and estimatedWeight > 600', 'That\'s a huge pony!&nbsp;'],
                                        ['breed != 1 and estimatedWeight > 1000', 'That\'s a huge horse!'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'estimatedWeight = getEstimated(girth, length, height, neck, breed)',
                'var' => [
                    [
                        'l' => 'estimatedWeight',
                        'f' => 'getEstimated(girth, length, height, neck, breed)',
                        'r' => [
                            'breed',
                            'girth',
                            'height',
                            'length',
                            'neck',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'estimatedIdeal = getIdeal(length, height, breed)',
                'var' => [
                    [
                        'l' => 'estimatedIdeal',
                        'f' => 'getIdeal(length, height, breed)',
                        'r' => ['breed', 'height', 'length'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'mWHaXt6c4uSJ-5hd2M005' => [
                'name' => 'Breed',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'ThvDOFCjyyVL8IS9qLHtn', 'label' => 'Arabian', 'value' => '0'],
                    ['uid' => 'FZiVnsEDgoD3U4uZwE53N', 'label' => 'Pony', 'value' => '1'],
                    ['uid' => 'agJLP7fG1FP1VX0cECQ-q', 'label' => 'Stock horse', 'value' => '2'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";omni.define("getEstimated",function(girth,length,height,neck,breed){var divisors=[3596,3606,3441];return Math.pow(girth,1.486)*Math.pow(length,0.554)*Math.pow(height,0.599)*Math.pow(neck,0.173)/divisors[breed]});omni.define("getIdeal",function(length,height,breed){var subtract=[611,606,577];return length*2.8+height*4.2-subtract[breed]});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Supply the height, the neck circumference, the girth circumference and the body length and the Horse weight calculator solves for <strong>actual weight</strong>.
        TXT,
        'sections' => [
            ['title' => 'How does the Horse weight calculator work?', 'html' => <<<'TXT'
            <p>The Horse weight calculator takes the values in the form, applies the relationship described below and reports <strong>actual weight</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the type); then you type in the height (A), the neck circumference (B), the girth circumference (C) and the body length (D).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 3 options, such as arabian, pony and stock horse. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li><li> The unit chip switches it to any of the 34 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Type</strong></td><td>One of 3 options, such as arabian, pony and stock horse.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Height (A)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Neck circumference (B)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Girth circumference (C)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Body length (D)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Actual weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Ideal weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Horse weight calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Actual weight</span><span class="formula-eq">=</span><span class="formula-rhs">(girth circumference (C), body length (D), height (A), neck circumference (B), type)</span></div><div class="formula-row"><span class="formula-lhs">Ideal weight</span><span class="formula-eq">=</span><span class="formula-rhs">(body length (D), height (A), type)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Mass, opening in kilograms</li><li>Mass, opening in kilograms</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Horse weight calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 4 figures keep coming back — the height, the neck circumference and the girth circumference — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/how-big-will-my-cat-get">How big will my cat get</a>, <a href="/biology/ligation">Ligation</a> and <a href="/biology/livestock-fence">Livestock fence cost</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Horse weight calculator work out?', 'a' => <<<'TXT'
            It returns actual weight, derived from the height, the neck circumference and the girth circumference. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Horse weight calculator?', 'a' => <<<'TXT'
            The form asks for the height, the neck circumference, the girth circumference and the body length, which is 5 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter height (A) in a different unit?', 'a' => <<<'TXT'
            Yes. Height (A) opens in centimeters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Horse weight calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/how-big-will-my-cat-get', 'name' => 'How big will my cat get'],
            ['path' => '/biology/ligation', 'name' => 'Ligation'],
            ['path' => '/biology/livestock-fence', 'name' => 'Livestock fence cost'],
        ],
    ],
];

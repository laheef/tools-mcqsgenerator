<?php

/**
 * Lawn mowing
 * /biology/mowing-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lawn mowing',
    'meta' => ['title' => 'Lawn mowing Calculator — Formula, Units & Example', 'description' => '<strong>mower width</strong> is what the Lawn mowing calculator works out, and it gets there from the area to mow, the total costs, the mowing price and the…', 'h1' => 'Lawn mowing Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'area' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'costArea' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'costBy' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'AubDDMa_oQ07qWEMpWW--', 'c' => null],
                ],
                'ds' => '1955',
            ],
            'costHour' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'errorMargin' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '80', 'c' => null],
                ],
            ],
            'hours' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mowArea' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mowSpeed' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mowWidth' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mowingEff' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mowingTime' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'pricePerArea' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'pricePerHour' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'whatCalculate' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'yFJwJ7LmApv9lL7m8MTms', 'c' => null],
                ],
                'ds' => '1953',
            ],
        ],
        'groups' => [
            [
                'uid' => 'Qv1SNWrVfhiECF600NDwI',
                'title' => 'Select mowing calculation',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'whatCalculate',
                                    'vt' => 'valueSelect',
                                    'l' => 'I want to find the...',
                                    'ds' => '1953',
                                    'opts' => [
                                        ['yFJwJ7LmApv9lL7m8MTms', 'Lawn mowing cost', '1'],
                                        ['8qFDJrXZ5ics53kdfam0N', 'Mower efficiency and time', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'NfqjNd6dYmliJ3v2YS9tY',
                'title' => 'Mowing cost',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'costBy',
                                    'vt' => 'valueSelect',
                                    'l' => 'The company charges...',
                                    'ds' => '1955',
                                    'opts' => [
                                        ['AubDDMa_oQ07qWEMpWW--', 'Per area', '11'],
                                        ['50Ab_D4meoMV_fI8BFuJX', 'Per hour', '22'],
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
                                    't' => 'v',
                                    'n' => 'pricePerArea',
                                    'vt' => 'numerical',
                                    'l' => 'Mowing price',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'area',
                                    'vt' => 'numerical',
                                    'l' => 'Area to mow',
                                    'us' => '28',
                                    'du' => 'hectare',
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
                                    'n' => 'costArea',
                                    'vt' => 'numerical',
                                    'l' => 'Total costs',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'pricePerHour',
                                    'vt' => 'numerical',
                                    'l' => 'Mowing price',
                                    'suf' => '/h',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'hours', 'vt' => 'numerical', 'l' => 'Hours of work'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'costHour',
                                    'vt' => 'numerical',
                                    'l' => 'Total costs',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'sj6S6l820Jrv13ZwWq7GT',
                'title' => 'Mower efficiency',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mowSpeed',
                                    'vt' => 'numerical',
                                    'l' => 'Mower speed',
                                    'h' => 'At what speed does your mower move at when mowing?',
                                    'us' => '32',
                                    'du' => 'kmph',
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
                                    'n' => 'mowWidth',
                                    'vt' => 'numerical',
                                    'l' => 'Mower width',
                                    'h' => 'How wide is your mower\'s deck?',
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
                                    'n' => 'errorMargin',
                                    'vt' => 'numerical',
                                    'l' => 'Expected mowing productivity',
                                    'h' => <<<'TXT'
                                    Becuase of overlap, trimming, differences in grass durability, etc., mowing is rarely a 100% successful. Typically, a mower gets about 80-90% of the grass cut perfectly.
                                    TXT,
                                    'us' => '37',
                                    'du' => 'perc',
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
                                    'n' => 'mowingEff',
                                    'vt' => 'numerical',
                                    'l' => 'Your mower can mow',
                                    'us' => '28',
                                    'du' => 'hectare',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'sMGf6DBAnaMhnfQzo79hk',
                'title' => 'Mowing time',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mowArea',
                                    'vt' => 'numerical',
                                    'l' => 'If you have',
                                    'us' => '28',
                                    'du' => 'hectare',
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
                                    'n' => 'mowingTime',
                                    'vt' => 'numerical',
                                    'l' => 'mowing should take',
                                    'h' => 'Estimated mowing time.',
                                    'us' => '19',
                                    'du' => 'hrsmin',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'mowingEff = mowSpeed * mowWidth * errorMargin',
                'var' => [
                    [
                        'l' => 'mowWidth',
                        'f' => 'mowingEff/(errorMargin*mowSpeed)',
                        'r' => ['mowingEff', 'mowSpeed', 'errorMargin'],
                    ],
                    [
                        'l' => 'mowingEff',
                        'f' => 'errorMargin*mowSpeed*mowWidth',
                        'r' => ['mowWidth', 'mowSpeed', 'errorMargin'],
                    ],
                    [
                        'l' => 'mowSpeed',
                        'f' => 'mowingEff/(errorMargin*mowWidth)',
                        'r' => ['mowWidth', 'mowingEff', 'errorMargin'],
                    ],
                    [
                        'l' => 'errorMargin',
                        'f' => 'mowingEff/(mowSpeed*mowWidth)',
                        'r' => ['mowWidth', 'mowingEff', 'mowSpeed'],
                    ],
                ],
            ],
            [
                'formula' => 'costArea = pricePerArea * area',
                'var' => [
                    [
                        'l' => 'pricePerArea',
                        'f' => 'costArea/area',
                        'r' => ['costArea', 'area'],
                    ],
                    [
                        'l' => 'costArea',
                        'f' => 'area*pricePerArea',
                        'r' => ['pricePerArea', 'area'],
                    ],
                    [
                        'l' => 'area',
                        'f' => 'costArea/pricePerArea',
                        'r' => ['pricePerArea', 'costArea'],
                    ],
                ],
            ],
            [
                'formula' => 'costHour = pricePerHour * hours',
                'var' => [
                    [
                        'l' => 'costHour',
                        'f' => 'hours*pricePerHour',
                        'r' => ['hours', 'pricePerHour'],
                    ],
                    [
                        'l' => 'hours',
                        'f' => 'costHour/pricePerHour',
                        'r' => ['costHour', 'pricePerHour'],
                    ],
                    [
                        'l' => 'pricePerHour',
                        'f' => 'costHour/hours',
                        'r' => ['costHour', 'hours'],
                    ],
                ],
            ],
            [
                'formula' => 'mowingTime = mowArea / mowingEff',
                'var' => [
                    [
                        'l' => 'mowArea',
                        'f' => 'mowingEff*mowingTime',
                        'r' => ['mowingEff', 'mowingTime'],
                    ],
                    [
                        'l' => 'mowingEff',
                        'f' => 'mowArea/mowingTime',
                        'r' => ['mowArea', 'mowingTime'],
                    ],
                    [
                        'l' => 'mowingTime',
                        'f' => 'mowArea/mowingEff',
                        'r' => ['mowArea', 'mowingEff'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '1953' => [
                'name' => 'what to do',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'yFJwJ7LmApv9lL7m8MTms', 'label' => 'Lawn mowing cost', 'value' => '1'],
                    ['uid' => '8qFDJrXZ5ics53kdfam0N', 'label' => 'Mower efficiency and time', 'value' => '2'],
                ],
            ],
            '1955' => [
                'name' => 'charge type',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'AubDDMa_oQ07qWEMpWW--', 'label' => 'Per area', 'value' => '11'],
                    ['uid' => '50Ab_D4meoMV_fI8BFuJX', 'label' => 'Per hour', 'value' => '22'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        <strong>mower width</strong> is what the Lawn mowing calculator works out, and it gets there from the area to mow, the total costs, the mowing price and the hours of work. 
        
        Editing anything puts the results away until the next press of Calculate — change one value at a time and the updated answer tells you what that value was worth.
        TXT,
        'sections' => [
            ['title' => 'How does the Lawn mowing calculator work?', 'html' => <<<'TXT'
            <p>The Lawn mowing calculator takes the values in the form, applies the relationship described below and reports <strong>mower width</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case; then you type in the area to mow, the total costs (Mowing cost), the mowing price (Mowing cost) and the hours of work.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as lawn mowing cost and mower efficiency and time. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>Pick the option that matches your case — 2 options, such as per area and per hour. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in hectares. The unit chip switches it to any of the 24 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A plain number with no unit attached.</li><li>A measured quantity, entered by default in kilometers per hour. The unit chip switches it to any of the 25 supported units.</li><li>A measured quantity, entered by default in percent. The unit chip switches it to any of the 6 supported units.</li><li>A measured quantity, entered by default in hectares. The unit chip switches it to any of the 24 supported units.</li><li>A measured quantity, entered by default in hours / minutes. </li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Mowing price (Mowing cost)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Area to mow</strong></td><td>A measured quantity, 24 units available.</td><td>hectares</td><td>You supply it</td></tr><tr><td><strong>Total costs (Mowing cost)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Mowing price (Mowing cost)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Hours of work</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Total costs (Mowing cost)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Mower speed</strong></td><td>A measured quantity, 25 units available.</td><td>kilometers per hour</td><td>You supply it</td></tr><tr><td><strong>Mower width</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Expected mowing productivity</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Your mower can mow</strong></td><td>A measured quantity, 24 units available.</td><td>hectares</td><td>You supply it</td></tr><tr><td><strong>If you have</strong></td><td>A measured quantity, 24 units available.</td><td>hectares</td><td>Calculated</td></tr><tr><td><strong>Mowing should take</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Lawn mowing calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Mower width</span><span class="formula-eq">=</span><span class="formula-rhs">your mower can mow ÷ (expected mowing productivity × mower speed)</span></div><div class="formula-row"><span class="formula-lhs">Mowing price</span><span class="formula-eq">=</span><span class="formula-rhs">total costs ÷ area to mow</span></div><div class="formula-row"><span class="formula-lhs">Total costs</span><span class="formula-eq">=</span><span class="formula-rhs">hours of work × mowing price</span></div><div class="formula-row"><span class="formula-lhs">If you have</span><span class="formula-eq">=</span><span class="formula-rhs">your mower can mow × mowing should take</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in hectares, and convertible to any of the 24 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Currency, opening in US Dollar</li><li>Area, opening in hectares</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Speed, opening in kilometers per hour</li><li>Length, opening in centimeters</li><li>%, opening in percent</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Lawn mowing calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 4 figures keep coming back — the area to mow, the total costs and the mowing price — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/mulch">Mulch</a>, <a href="/biology/mutation-frequency">Mutation frequency</a> and <a href="/biology/mutation-rate">Mutation rate</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lawn mowing calculator work out?', 'a' => <<<'TXT'
            It returns mower width, derived from the area to mow, the total costs and the mowing price. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Lawn mowing calculator?', 'a' => <<<'TXT'
            The form asks for the area to mow, the total costs, the mowing price and the hours of work, which is 10 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter mowing price (Mowing cost) in a different unit?', 'a' => <<<'TXT'
            Yes. Mowing price (Mowing cost) opens in US Dollar and the chip beside it offers 113 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (2 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Lawn mowing calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/mulch', 'name' => 'Mulch'],
            ['path' => '/biology/mutation-frequency', 'name' => 'Mutation frequency'],
            ['path' => '/biology/mutation-rate', 'name' => 'Mutation rate'],
        ],
    ],
];

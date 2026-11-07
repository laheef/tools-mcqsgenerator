<?php

/**
 * Dog harness size
 * /biology/dog-harness-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog harness size',
    'meta' => ['title' => 'Dog harness size — Formula, Steps & Examples', 'description' => 'Supply the weight and the girth and the Dog harness size calculator solves for <strong>min weight print</strong>. The Dog harness size calculator takes the…', 'h1' => 'Dog harness size Calculator', 'updated' => '2026-08-10'],
    'raw' => [
        'vars' => [
            'girth' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'maxGirthPrint' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'maxGirthPrint_imperial' => [
                'type' => 'presentation',
                'rnd' => ['omni', '0.0001'],
            ],
            'maxWeightPrint' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'maxWeightPrint_imperial' => [
                'type' => 'presentation',
                'rnd' => ['omni', '0.0001'],
            ],
            'minGirthPrint' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'minGirthPrint_imperial' => [
                'type' => 'presentation',
                'rnd' => ['omni', '0.0001'],
            ],
            'minWeightPrint' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'minWeightPrint_imperial' => [
                'type' => 'presentation',
                'rnd' => ['omni', '0.0001'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'ot1knAQfPgXHKbqMPZbmZ',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'If you\'re unsure how to measure and weigh your dog, read the "How do I measure a dog for a harness?" section of the accompanying article.'],
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
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => '🐾 Weight',
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
                                    'n' => 'girth',
                                    'vt' => 'numerical',
                                    'l' => '🐕 Girth',
                                    'h' => 'Chest circumference, measured by wrapping a tailor\'s tape around the widest area of the dog\'s chest.',
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
                                    't' => 'x',
                                    'c' => [
                                        [<<<'TXT'
                                        (weight > 0 and weight <= 5 and girth >= 8 and girth <=10) or (weight > 0 and weight < 5 and not(hasValue(girth))) or (girth >= 8 and girth < 9 and not(hasValue(weight)))
                                        TXT, 'Your dog size category is XX-Small. The recommended leash size for the dog with the above measurements is 5/16" (0.79&nbsp;cm) wide.'],
                                        ['(weight == 5 and not(hasValue(girth))) or (girth >= 9 and girth <= 10 and not(hasValue(weight)))', <<<'TXT'
                                        Your dog size category is XX-Small to X-Small. The recommended leash size for the dog with the above measurement is 5/16" (0.79&nbsp;cm) to 3/8" (0.95&nbsp;cm) wide.
                                        TXT],
                                        [<<<'TXT'
                                        (weight == 5 and girth > 10 and girth <=15) or (weight > 5 and weight <= 10 and girth >= 9 and girth <= 15) or (weight > 5 and weight < 10 and not(hasValue(girth))) or (girth > 10 and girth < 13 and not(hasValue(weight)))
                                        TXT, 'Your dog size category is X-Small. The recommended leash size for the dog with the above measurements is 3/8" (0.95&nbsp;cm) wide.'],
                                        ['(weight == 10 and not(hasValue(girth))) or (girth >= 13 and girth <= 15 and not(hasValue(weight)))', <<<'TXT'
                                        Your dog size category is X-Small to Small. The recommended leash size for the dog with the above measurement is 3/8" (0.95&nbsp;cm) to 5/8" (1.59&nbsp;cm) wide.
                                        TXT],
                                        [<<<'TXT'
                                        (weight == 10 and girth > 15 and girth <= 23) or (weight > 10 and weight <= 25 and girth >= 13 and girth <= 23) or (weight > 10 and weight < 25 and not(hasValue(girth))) or (girth > 15 and girth < 18 and not(hasValue(weight)))
                                        TXT, 'Your dog size category is Small. The recommended leash size for the dog with the above measurements is 5/8" (1.59&nbsp;cm) wide.'],
                                        ['(weight == 25 and not(hasValue(girth))) or (girth >= 18 and girth < 22 and not(hasValue(weight)))', <<<'TXT'
                                        Your dog size category is Small to Medium. The recommended leash size for the dog with the above measurement is 5/8" (1.59&nbsp;cm) to 3/4" (1.905&nbsp;cm) wide.
                                        TXT],
                                        [<<<'TXT'
                                        (weight == 25 and girth > 23 and girth <= 29) or (weight > 25 and weight <= 55 and girth >= 18 and girth <=29) or (weight > 25 and weight < 55 and not(hasValue(girth)))
                                        TXT, 'Your dog size category is Medium. The recommended leash size for the dog with the above measurements is 3/4" (1.905&nbsp;cm) wide.'],
                                        ['girth >= 22 and girth <= 23 and not(hasValue(weight))', <<<'TXT'
                                        Your dog size category is Small to Large. The recommended leash size for the dog with the above measurement is 5/8" (1.59&nbsp;cm) to 1" (2.54&nbsp;cm) wide, two-ply for strong pullers.
                                        TXT],
                                        ['weight == 55 and not(hasValue(girth)) or (girth > 23 and girth < 28 and not(hasValue(weight)))', <<<'TXT'
                                        Your dog size category is Medium to Large. The recommended leash size for the dog with the above measurement is 3/4" (1.905&nbsp;cm) wide to 1" (2.54&nbsp;cm) wide, two-ply for strong pullers.
                                        TXT],
                                        [<<<'TXT'
                                        (weight == 55 and girth > 29 and girth <= 39) or (weight > 55 and weight <= 75 and girth >= 22 and girth <= 39) or (weight > 55 and weight < 75 and not(hasValue(girth)))
                                        TXT, 'Your dog size category is Large. The recommended leash size for the dog with the above measurements is 1" (2.54&nbsp;cm) width, two-ply for strong pullers.'],
                                        ['girth >= 28 and girth <= 29 and not(hasValue(weight))', <<<'TXT'
                                        Your dog size category is Medium to X-Large. The recommended leash size for the dog with the above measurement is 3/4" (1.905&nbsp;cm) wide to 1.25" (3.175&nbsp;cm) wide, two-ply for strong pullers.
                                        TXT],
                                        ['weight == 75 and not(hasValue(girth)) or (girth > 29 and girth <= 39 and not(hasValue(weight)))', <<<'TXT'
                                        Your dog size category is Large to X-Large. The recommended leash size for the dog with the above measurement is 1" (2.54&nbsp;cm) to 1.25" (3.18&nbsp;cm) wide, two-ply for strong pullers.
                                        TXT],
                                        [<<<'TXT'
                                        (weight == 75 and girth > 39 and girth <= 48) or (weight > 75 and weight <= 343 and girth >= 28 and girth <= 48) or (weight > 75 and weight <= 343 and not(hasValue(girth))) or (girth > 39 and girth <= 48 and not(hasValue(weight)))
                                        TXT, <<<'TXT'
                                        Your dog size category is X-Large. The recommended leash size for the dog with the above measurements is 1.25" (3.175&nbsp;cm) width, two-ply for strong pullers.
                                        TXT],
                                        ['(hasValue(weight) and (girth < minGirthPrint or girth > maxGirthPrint)) or (hasValue(girth) and (weight < minWeightPrint or weight > maxWeightPrint))', 'The measurements entered seem unlikely; please double-check.&nbsp;'],
                                        [<<<'TXT'
                                        ((hasValue(weight) and weight <= 343 and not(hasValue(girth))) or (not(hasValue(weight)) and hasValue(girth) and girth >= 8)) and(((weight == 5 and not(hasValue(girth))) or (girth >= 9 and girth <= 10 and not(hasValue(weight)))) or ((weight == 10 and not(hasValue(girth))) or (girth >= 13 and girth <= 15 and not(hasValue(weight)))) or ((weight == 25 and not(hasValue(girth))) or (girth >= 18 and girth < 22 and not(hasValue(weight)))) or (girth >= 22 and girth <= 23 and not(hasValue(weight))) or (weight == 55 and not(hasValue(girth)) or (girth > 23 and girth < 28 and not(hasValue(weight)))) or (girth >= 28 and girth <= 29 and not(hasValue(weight))) or (weight == 75 and not(hasValue(girth)) or (girth > 29 and girth <= 39 and not(hasValue(weight)))))
                                        TXT, 'Please complete your inputs to obtain the final dog harness size estimate.&nbsp;'],
                                        ['hasValue(weight) and not(hasValue(girth)) and weight <= 343', <<<'TXT'
                                        With the weight you entered, the girth value must be from {{minGirthPrint.value}}&nbsp;{{minGirthPrint.unit}} to {{maxGirthPrint.value}}&nbsp;{{maxGirthPrint.unit}} ({{minGirthPrint_imperial.value}}&nbsp;{{minGirthPrint_imperial.unit}} to {{maxGirthPrint_imperial.value}}&nbsp;{{maxGirthPrint_imperial.unit}}).&nbsp;
                                        TXT],
                                        ['not(hasValue(weight)) and hasValue(girth) and minWeightPrint > 0', <<<'TXT'
                                        With the girth you entered, the weight must be from {{minWeightPrint.value}}&nbsp;{{minWeightPrint.unit}} to {{maxWeightPrint.value}}&nbsp;{{maxWeightPrint.unit}} ({{minWeightPrint_imperial.value}}&nbsp;{{minWeightPrint_imperial.unit}} to {{maxWeightPrint_imperial.value}}&nbsp;{{maxWeightPrint_imperial.unit}}).&nbsp;
                                        TXT],
                                        ['not(hasValue(weight)) and hasValue(girth) and minWeightPrint == 0 and girth >= 8 and girth <= 48', <<<'TXT'
                                        With the girth you entered, the weight must be {{maxWeightPrint.value}}&nbsp;{{maxWeightPrint.unit}} ({{maxWeightPrint_imperial.value}}&nbsp;{{maxWeightPrint_imperial.unit}}) or less.
                                        TXT],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'P10oE0v9ZfzMqf_WQSjzb',
                'title' => 'Hidden printed variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'minGirthPrint',
                                    'vt' => 'numerical',
                                    'l' => 'Min girth print',
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
                                    'n' => 'maxGirthPrint',
                                    'vt' => 'numerical',
                                    'l' => 'Max girth print',
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
                                    'n' => 'minWeightPrint',
                                    'vt' => 'numerical',
                                    'l' => 'Min weight print',
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
                                    'n' => 'maxWeightPrint',
                                    'vt' => 'numerical',
                                    'l' => 'Max weight print',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '4PgStiCovpBvnuDK3tcBL',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'minWeightPrint_imperial',
                                    'vt' => 'presentation',
                                    'l' => 'Min weight print imperial',
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
                                    'n' => 'maxWeightPrint_imperial',
                                    'vt' => 'presentation',
                                    'l' => 'Max weight print imperial',
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
                                    'n' => 'minGirthPrint_imperial',
                                    'vt' => 'presentation',
                                    'l' => 'Min girth print imperial',
                                    'us' => '4',
                                    'du' => 'inch',
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
                                    'n' => 'maxGirthPrint_imperial',
                                    'vt' => 'presentation',
                                    'l' => 'Max girth print imperial',
                                    'us' => '4',
                                    'du' => 'inch',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'minWeightPrint = get_minWeight(girth)',
                'var' => [
                    [
                        'l' => 'minWeightPrint',
                        'f' => 'get_minWeight(girth)',
                        'r' => ['girth'],
                    ],
                ],
            ],
            [
                'formula' => 'maxWeightPrint = get_maxWeight(girth)',
                'var' => [
                    [
                        'l' => 'maxWeightPrint',
                        'f' => 'get_maxWeight(girth)',
                        'r' => ['girth'],
                    ],
                ],
            ],
            [
                'formula' => 'minGirthPrint = get_minGirth(weight)',
                'var' => [
                    [
                        'l' => 'minGirthPrint',
                        'f' => 'get_minGirth(weight)',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'maxGirthPrint = get_maxGirth(weight)',
                'var' => [
                    [
                        'l' => 'maxGirthPrint',
                        'f' => 'get_maxGirth(weight)',
                        'r' => ['weight'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => <<<'TXT'
        "use strict";omni.define("get_minWeight",function(girth){if(girth<8){return 0}else if(girth>=8&&girth<9){return 0}else if(girth>=9&&girth<=10){return 0}else if(girth>10&&girth<13){return 5}else if(girth>=13&&girth<=15){return 5}else if(girth>15&&girth<18){return 10}else if(girth>=18&&girth<22){return 10}else if(girth>=22&&girth<=23){return 10}else if(girth>23&&girth<28){return 25}else if(girth>=28&&girth<=29){return 25}else if(girth>29&&girth<=39){return 55}else if(girth>39&&girth<=48){return 75}else if(girth>48){return 75}});omni.define("get_maxWeight",function(girth){if(girth<8){return 0}else if(girth>=8&&girth<9){return 5}else if(girth>=9&&girth<=10){return 10}else if(girth>10&&girth<13){return 10}else if(girth>=13&&girth<=15){return 25}else if(girth>15&&girth<18){return 25}else if(girth>=18&&girth<22){return 55}else if(girth>=22&&girth<=23){return 75}else if(girth>23&&girth<28){return 75}else if(girth>=28&&girth<=29){return 343}else if(girth>29&&girth<=39){return 343}else if(girth>39&&girth<=48){return 343}else if(girth>48){return 343}});omni.define("get_minGirth",function(weight){if(weight>0&&weight<5){return 8}else if(weight===5){return 8}else if(weight>5&&weight<10){return 9}else if(weight===10){return 9}else if(weight>10&&weight<25){return 13}else if(weight===25){return 13}else if(weight>25&&weight<55){return 18}else if(weight===55){return 18}else if(weight>55&&weight<75){return 22}else if(weight===75){return 22}else if(weight>75){return 28}});omni.define("get_maxGirth",function(weight){if(weight>0&&weight<5){return 10}else if(weight===5){return 15}else if(weight>5&&weight<10){return 15}else if(weight===10){return 23}else if(weight>10&&weight<25){return 23}else if(weight===25){return 29}else if(weight>25&&weight<55){return 29}else if(weight===55){return 39}else if(weight>55&&weight<75){return 39}else if(weight===75){return 48}else if(weight>75){return 48}});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => 'Supply the weight and the girth and the Dog harness size calculator solves for <strong>min weight print</strong>.',
        'sections' => [
            ['title' => 'How does the Dog harness size calculator work?', 'html' => <<<'TXT'
            <p>The Dog harness size calculator takes the values in the form, applies the relationship described below and reports <strong>min weight print</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the weight and the girth.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Girth</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Min girth print</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Max girth print</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Min weight print</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Max weight print</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Dog harness size calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Min weight print</span><span class="formula-eq">=</span><span class="formula-rhs">(girth)</span></div><div class="formula-row"><span class="formula-lhs">Max weight print</span><span class="formula-eq">=</span><span class="formula-rhs">(girth)</span></div><div class="formula-row"><span class="formula-lhs">Min girth print</span><span class="formula-eq">=</span><span class="formula-rhs">(weight)</span></div><div class="formula-row"><span class="formula-lhs">Max girth print</span><span class="formula-eq">=</span><span class="formula-rhs">(weight)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Mass, opening in kilograms</li><li>Mass, opening in kilograms</li><li>Mass, opening in pounds</li><li>Mass, opening in pounds</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Dog harness size calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 2 figures keep coming back — the weight and the girth — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Dog harness size calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — weight for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/dog-heat-cycle">Dog heat cycle</a>, <a href="/biology/dog-life-expectancy">Dog life expectancy</a> and <a href="/biology/dog-metacam">Dog Metacam dosage</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog harness size calculator work out?', 'a' => <<<'TXT'
            It returns min weight print, derived from the weight and the girth. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Dog harness size calculator?', 'a' => <<<'TXT'
            The form asks for the weight and the girth, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter weight in a different unit?', 'a' => <<<'TXT'
            Yes. Weight opens in kilograms and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Is the Dog harness size calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. The calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/dog-heat-cycle', 'name' => 'Dog heat cycle'],
            ['path' => '/biology/dog-life-expectancy', 'name' => 'Dog life expectancy'],
            ['path' => '/biology/dog-metacam', 'name' => 'Dog Metacam dosage'],
        ],
    ],
];

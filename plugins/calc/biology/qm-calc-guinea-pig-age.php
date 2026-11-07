<?php

/**
 * Guinea pig years to human years
 * /biology/guinea-pig-age
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Guinea pig years to human years',
    'meta' => ['title' => 'Guinea pig years to human years — Formula & Results', 'description' => <<<'TXT'
    Guinea pig years to human years takes Guinea pig age 🐹 and returns Human age 👨‍🌾. It is a single relationship that reads Human age 👨‍🌾 out of Guinea pig age…
    TXT, 'h1' => 'Guinea pig years to human years Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'age' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'pig_age' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'H69aT-wVeOpmzXpTp7zIK',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'pig_age',
                                    'vt' => 'numerical',
                                    'l' => 'Guinea pig age 🐹',
                                    'us' => '19',
                                    'du' => 'yrsmos',
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
                                    'n' => 'age',
                                    'vt' => 'numerical',
                                    'l' => 'Human age 👨‍🌾',
                                    'us' => '19',
                                    'du' => 'yrs',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'age = get_age (pig_age)',
                'var' => [
                    [
                        'l' => 'age',
                        'f' => 'get_age(pig_age)',
                        'r' => ['pig_age'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => <<<'TXT'
        "use strict";omni.define("get_age",function(pig_age){var age=0;if(pig_age==0){age=0}else if(pig_age<=2){age=pig_age*6+8}else if(pig_age>=20){age=pig_age*2+20}else{age=pig_age*3+14}return age});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Guinea pig years to human years takes Guinea pig age 🐹 and returns Human age 👨‍🌾. It is a single relationship that reads Human age 👨‍🌾 out of Guinea pig age 🐹, not a table of canned results keyed by them. Units for Human age 👨‍🌾 default to years and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Guinea pig years to human years calculator works', 'html' => <<<'TXT'
            <p>The Guinea pig years to human years calculator applies one relationship to 1 number and reports Human age 👨‍🌾.</p><p>Written with the labels from the form, Human age 👨‍🌾 = get_age(Guinea pig age 🐹).</p><p>What comes back is Human age 👨‍🌾 — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Guinea pig age 🐹</strong> — in years / months</li></ul><p>The result box is Human age 👨‍🌾 in years. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Human age 👨‍🌾 offers 18 units and opens on years, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Human age 👨‍🌾</strong> = <code>get_age(Guinea pig age 🐹)</code></li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Guinea pig age 🐹 is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Human age 👨‍🌾 is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Guinea pig age 🐹 is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Guinea pig age 🐹 and the number you are missing is Human age 👨‍🌾.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dog-quality-of-life">Dog quality of life</a>, <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity Calculator</a> and <a href="/biology/dog-size">Dog size Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Guinea pig years to human years calculator work out?', 'a' => 'Human age 👨‍🌾, from Guinea pig age 🐹. The relationship is Human age 👨‍🌾 = get_age(Guinea pig age 🐹).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Guinea pig age 🐹 (years / months). Enter pig_age; Human age 👨‍🌾 is the box to leave alone unless it is the value you came for.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Human age 👨‍🌾 is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Human age 👨‍🌾, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Human age 👨‍🌾 keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dog-quality-of-life', 'name' => 'Dog quality of life'],
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
            ['path' => '/biology/dog-size', 'name' => 'Dog size Calculator'],
        ],
        'authors' => [],
    ],
];

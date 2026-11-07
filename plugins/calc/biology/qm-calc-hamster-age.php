<?php

/**
 * Hamster age
 * /biology/hamster-age
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hamster age',
    'meta' => ['title' => 'Hamster age Calculator: Formula, Steps & Examples', 'description' => <<<'TXT'
    Enter 🐹 My hamster is into Hamster age and the answer comes back as 💁 In human years it's. It is a single relationship that reads 💁 In human years it's out of…
    TXT, 'h1' => 'Hamster age Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'age' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'hamster_age' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'yQx0Po6zgZk_QuiJjcI5A',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'hamster_age',
                                    'vt' => 'numerical',
                                    'l' => '🐹 My hamster is ',
                                    'us' => '19',
                                    'du' => 'mos',
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
                                    'l' => '💁 In human years it\'s',
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
                'formula' => 'age = get_age (hamster_age)',
                'var' => [
                    [
                        'l' => 'age',
                        'f' => 'get_age(hamster_age)',
                        'r' => ['hamster_age'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => <<<'TXT'
        "use strict";omni.define("get_age",function(hamster_age){var age=0;if(hamster_age<=1){age=hamster_age*14}else if(hamster_age<=2){age=14+6*(hamster_age-1)}else if(hamster_age<=4){age=14+6*hamster_age/2}else if(hamster_age<=6){age=20+14*(hamster_age-2)/4}else if(hamster_age<=12){age=34+24*(hamster_age-6)/6}else if(hamster_age<=24){age=58+12*(hamster_age-12)/12}else if(hamster_age<=36){age=70+30*(hamster_age-24)/12}return age*12});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter 🐹 My hamster is into Hamster age and the answer comes back as 💁 In human years it's. It is a single relationship that reads 💁 In human years it's out of 🐹 My hamster is, not a table of canned results keyed by them. Units for 💁 In human years it's default to years and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Hamster age calculator works', 'html' => <<<'TXT'
            <p>The Hamster age calculator applies one relationship to 1 number and reports 💁 In human years it&#039;s.</p><p>In the form&#039;s own words, 💁 In human years it&#039;s = get_age(🐹 My hamster is).</p><p>What comes back is 💁 In human years it&#039;s — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>🐹 My hamster is</strong> — in months</li></ul><p>The answer comes back as 💁 In human years it&#039;s in years. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>💁 In human years it&#039;s</strong> = <code>get_age(🐹 My hamster is)</code></li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> 🐹 My hamster is carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> 💁 In human years it&#039;s is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in 🐹 My hamster is and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when 🐹 My hamster is is what you already know and 💁 In human years it&#039;s is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/cat-age">Cat age</a>, <a href="/biology/cat-benadryl-dosage">Cat Benadryl dosage Calculator</a> and <a href="/biology/cat-bmi">Cat BMI Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hamster age calculator work out?', 'a' => '💁 In human years it\'s, from 🐹 My hamster is. The relationship is 💁 In human years it\'s = get_age(🐹 My hamster is).'],
            ['q' => 'Which values do I need before I start?', 'a' => '🐹 My hamster is (months). Enter hamster_age; 💁 In human years it\'s is the box to leave alone unless it is the value you came for.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally 💁 In human years it\'s is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is 💁 In human years it's, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of 💁 In human years it\'s keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/cat-age', 'name' => 'Cat age'],
            ['path' => '/biology/cat-benadryl-dosage', 'name' => 'Cat Benadryl dosage Calculator'],
            ['path' => '/biology/cat-bmi', 'name' => 'Cat BMI Calculator'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * Cat age
 * /biology/cat-age
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cat age',
    'meta' => ['title' => 'Cat age Calculator: Formula, Steps & Examples', 'description' => 'Cat age works out Human years and Cat years from Cat years. There is no hidden constant here: change Human years and Cat years moves with it.', 'h1' => 'Cat age Calculator', 'updated' => '2026-08-10'],
    'raw' => [
        'vars' => [
            'cat_age' => [
                'type' => 'numerical',
                'rnd' => ['standard', '1'],
            ],
            'cat_age_calculation' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'conversion_type' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '4X77jFp-6t5pdHA5T_BEA', 'c' => null],
                ],
                'ds' => '2654',
            ],
            'human_age' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'human_age_calculation' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'IMSxu0UxtUGvEesSVM7Ew',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'conversion_type',
                                    'vt' => 'valueSelect',
                                    'l' => 'Conversion type',
                                    'ds' => '2654',
                                    'opts' => [
                                        ['4X77jFp-6t5pdHA5T_BEA', 'Cat 🐈 to human🧍years', '1'],
                                        ['WQCvl0o64H2OwiinKy7Nq', 'Human🧍to cat 🐈 years', '0'],
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
                                    'n' => 'cat_age_calculation',
                                    'vt' => 'numerical',
                                    'l' => 'Cat years',
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
                                    'n' => 'human_age',
                                    'vt' => 'numerical',
                                    'l' => 'Human years',
                                    'us' => '19',
                                    'du' => 'yrs',
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
                                    'n' => 'human_age_calculation',
                                    'vt' => 'numerical',
                                    'l' => 'Human years',
                                    'us' => '19',
                                    'du' => 'yrs',
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
                                    'n' => 'cat_age',
                                    'vt' => 'numerical',
                                    'l' => 'Cat years',
                                    'us' => '19',
                                    'du' => 'yrs',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'xq_NIzo6SER20PzhouYDj',
                'title' => 'Create a cat-care tool for free',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, <<<'TXT'
                                        Want to check your cat’s well-being without hard math? Type the following prompt into our ✨ AI Calculator Builder to instantly make a working tool or check the ready example of the Cat Quality of Life Scale Calculator that we built for you.
                                        TXT],
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
                                    't' => 'x',
                                    'c' => [
                                        [null, 'Build me a calculator that estimates my cat’s quality of life scale'],
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
                'formula' => 'human_age = get_cat_age(cat_age_calculation)',
                'var' => [
                    [
                        'l' => 'human_age',
                        'f' => 'get_cat_age(cat_age_calculation)',
                        'r' => ['cat_age_calculation'],
                    ],
                ],
            ],
            [
                'formula' => 'cat_age = get_human_age(human_age_calculation)',
                'var' => [
                    [
                        'l' => 'cat_age',
                        'f' => 'get_human_age(human_age_calculation)',
                        'r' => ['human_age_calculation'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '2654' => [
                'name' => 'if_cat_to_human',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '4X77jFp-6t5pdHA5T_BEA', 'label' => 'Cat 🐈 to human🧍years', 'value' => '1'],
                    ['uid' => 'WQCvl0o64H2OwiinKy7Nq', 'label' => 'Human🧍to cat 🐈 years', 'value' => '0'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";omni.define("get_cat_age",function(cat_age){if(cat_age<=0.5){return 20*cat_age}else if(cat_age<=1){return 10+(cat_age-0.5)*10}else if(cat_age<=2){return 15+(cat_age-1)*9}else{return 24+4*(cat_age-2)}});omni.define("get_human_age",function(human_age_calculation){if(human_age_calculation<=10){return human_age_calculation/20}else if(human_age_calculation<=15){return(human_age_calculation-5)/10}else if(human_age_calculation<=24){return(human_age_calculation-6)/9}else{return(human_age_calculation-16)/4}});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cat age works out Human years and Cat years from Cat years. There is no hidden constant here: change Human years and Cat years moves with it. The main result, Human years, is reported in years.
        TXT,
        'sections' => [
            ['title' => 'How the Cat age calculator works', 'html' => <<<'TXT'
            <p>The Cat age calculator applies one relationship to 1 number and reports Human years and Cat years.</p><p>The relationship it solves reads Human years = get_cat_age(Cat years).</p><p>The answers are Human years and Cat years; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Cat years</strong> — in years / months</li></ul><p>What you get back is Human years in years, Cat years in years, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Human years</strong> = <code>get_cat_age(Cat years)</code></li><li><strong>Cat years</strong> = <code>get_human_age(Human years)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Human years and Cat years can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Cat years carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Human years and Cat years are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Cat years is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Cat years measured, Human years and Cat years wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dsdna-ug-to-pmol-converter">dsDNA µg to pmol Converter Calculator</a>, <a href="/biology/egg-incubation-hatch-date">Egg Incubation Hatch Date Calculator</a> and <a href="/biology/encounter-rate">Encounter Rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat age calculator work out?', 'a' => 'Human years and Cat years, from Cat years. The relationship is Human years = get_cat_age(Cat years).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Cat years (years / months). Enter cat_age_calculation; Human years is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Human years and Cat years can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Human years is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Cat years left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Human years keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dsdna-ug-to-pmol-converter', 'name' => 'dsDNA µg to pmol Converter Calculator'],
            ['path' => '/biology/egg-incubation-hatch-date', 'name' => 'Egg Incubation Hatch Date Calculator'],
            ['path' => '/biology/encounter-rate', 'name' => 'Encounter Rate Calculator'],
        ],
        'authors' => [],
    ],
];

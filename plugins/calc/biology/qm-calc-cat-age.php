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
    'meta' => ['title' => 'Cat age Calculator: Formula, Steps & Examples', 'description' => 'Supply the cat years and the <strong>human years</strong> and the Cat age calculator solves for human years. The Cat age calculator takes the values in the…', 'h1' => 'Cat age Calculator', 'updated' => '2026-08-10'],
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
        'intro' => 'Supply the cat years and the <strong>human years</strong> and the Cat age calculator solves for human years.',
        'sections' => [
            ['title' => 'How does the Cat age calculator work?', 'html' => <<<'TXT'
            <p>The Cat age calculator takes the values in the form, applies the relationship described below and reports <strong>human years</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the conversion type); then you type in the cat years and the human years (2).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as cat to human years and human to cat years. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in years / months. </li><li>A measured quantity, entered by default in years. </li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Conversion type</strong></td><td>One of 2 options, such as cat to human years and human to cat years.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Cat years</strong></td><td>A measured quantity, 27 units available.</td><td>years / months</td><td>You supply it</td></tr><tr><td><strong>Human years</strong></td><td>A measured quantity, 27 units available.</td><td>years</td><td>Calculated</td></tr><tr><td><strong>Human years (2)</strong></td><td>A measured quantity, 27 units available.</td><td>years</td><td>You supply it</td></tr><tr><td><strong>Cat years (2)</strong></td><td>A measured quantity, 27 units available.</td><td>years</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Cat age calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Human years</span><span class="formula-eq">=</span><span class="formula-rhs">(cat years)</span></div><div class="formula-row"><span class="formula-lhs">Cat years</span><span class="formula-eq">=</span><span class="formula-rhs">(human years)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in years, and convertible to any of the 27 units on that chip.</li><li>Shown in years, and convertible to any of the 27 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in years / months</li><li>Time, opening in years</li><li>Time, opening in years</li><li>Time, opening in years</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Cat age calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 2 figures keep coming back — the cat years and the human years — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Round only at the end. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Cat age calculator, these are the ones that matter:</p>
            <ul><li>The 1 drop-down on this page offers a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/cat-benadryl-dosage">Cat Benadryl dosage</a>, <a href="/biology/cat-bmi">Cat BMI</a> and <a href="/biology/cat-calorie">Cat calorie</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat age calculator work out?', 'a' => <<<'TXT'
            It returns human years, derived from the cat years and the human years. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Cat age calculator?', 'a' => <<<'TXT'
            The form asks for the cat years and the human years, which is 3 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter cat years in a different unit?', 'a' => <<<'TXT'
            Yes. Cat years opens in years / months and the chip beside it offers 27 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Cat age calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/cat-benadryl-dosage', 'name' => 'Cat Benadryl dosage'],
            ['path' => '/biology/cat-bmi', 'name' => 'Cat BMI'],
            ['path' => '/biology/cat-calorie', 'name' => 'Cat calorie'],
        ],
    ],
];

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
    'meta' => ['title' => 'Hamster age Calculator: Formula, Steps & Examples', 'description' => 'The Hamster age calculator takes the numbers you enter and reports <strong>in human years it\'s</strong> immediately. The Hamster age calculator takes the…', 'h1' => 'Hamster age Calculator', 'updated' => '2026-08-06'],
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
        'intro' => 'The Hamster age calculator takes the numbers you enter and reports <strong>in human years it\'s</strong> immediately.',
        'sections' => [
            ['title' => 'How does the Hamster age calculator work?', 'html' => <<<'TXT'
            <p>The Hamster age calculator takes the values in the form, applies the relationship described below and reports <strong>in human years it's</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the figures it asks for.</p>
            TXT],
            ['title' => 'The formula behind the Hamster age calculator', 'html' => <<<'TXT'
            <p>One relationship drives the whole page:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">In human years it&#x27;s</span><span class="formula-eq">=</span><span class="formula-rhs">(my hamster is)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in years, and convertible to any of the 27 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in months</li><li>Time, opening in years</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Hamster age calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Round only at the end. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Keep the units you enter consistent. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Hamster age calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — my hamster is for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/hardy-weinberg-equilibrium">Hardy-Weinberg equilibrium</a>, <a href="/biology/horse-gestation">Horse gestation</a> and <a href="/biology/horse-weight">Horse weight</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hamster age calculator work out?', 'a' => <<<'TXT'
            It returns in human years it's. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Hamster age calculator?', 'a' => <<<'TXT'
            The form asks for a few values, which is a single field. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter my hamster is in a different unit?', 'a' => <<<'TXT'
            Yes. My hamster is opens in months and the chip beside it offers 27 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Is the Hamster age calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. The calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/hardy-weinberg-equilibrium', 'name' => 'Hardy-Weinberg equilibrium'],
            ['path' => '/biology/horse-gestation', 'name' => 'Horse gestation'],
            ['path' => '/biology/horse-weight', 'name' => 'Horse weight'],
        ],
    ],
];

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
    The Guinea pig years to human years calculator returns <strong>human age ‍</strong> from the field on the form. The Guinea pig years to human years calculator…
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
        'intro' => 'The Guinea pig years to human years calculator returns <strong>human age ‍</strong> from the field on the form.',
        'sections' => [
            ['title' => 'How does the Guinea pig years to human years calculator work?', 'html' => <<<'TXT'
            <p>The Guinea pig years to human years calculator takes the values in the form, applies the relationship described below and reports <strong>human age ‍</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the guinea pig age.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in years, and convertible to any of the 27 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in years / months</li><li>Time, opening in years</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Guinea pig years to human years calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 1 figures keep coming back — the guinea pig age — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Keep the units you enter consistent. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Guinea pig years to human years calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — guinea pig age for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/guinea-pig-pregnancy">Guinea pig pregnancy</a>, <a href="/biology/hamster-age">Hamster age</a> and <a href="/biology/hardy-weinberg-equilibrium">Hardy-Weinberg equilibrium</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Guinea pig years to human years calculator work out?', 'a' => <<<'TXT'
            It returns human age ‍, derived from the guinea pig age. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Guinea pig years to human years calculator?', 'a' => <<<'TXT'
            The form asks for the guinea pig age, which is a single field. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter guinea pig age in a different unit?', 'a' => <<<'TXT'
            Yes. Guinea pig age opens in years / months and the chip beside it offers 27 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Is the Guinea pig years to human years calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. The calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/guinea-pig-pregnancy', 'name' => 'Guinea pig pregnancy'],
            ['path' => '/biology/hamster-age', 'name' => 'Hamster age'],
            ['path' => '/biology/hardy-weinberg-equilibrium', 'name' => 'Hardy-Weinberg equilibrium'],
        ],
    ],
];

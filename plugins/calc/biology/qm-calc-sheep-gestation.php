<?php

/**
 * Sheep gestation
 * /biology/sheep-gestation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sheep gestation',
    'meta' => ['title' => 'Sheep gestation — Formula, Steps & Examples', 'description' => 'The Sheep gestation calculator is a free, no-sign-up biology tool. Fill in the field it asks for and it works out <strong>mating date</strong> straight away…', 'h1' => 'Sheep gestation Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'finalLambing' => ['type' => 'date', 'rnd' => null],
            'initialLambing' => ['type' => 'date', 'rnd' => null],
            'lambing_date' => ['type' => 'date', 'rnd' => null],
            'mating_date' => ['type' => 'date', 'rnd' => null],
        ],
        'groups' => [
            [
                'uid' => 'sxJ_GOM1d0su0YcNkxLAH',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'mating_date', 'vt' => 'date', 'l' => 'Mating date 🐑'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'lambing_date', 'vt' => 'date', 'l' => 'Lambing date 🐏'],
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
                                        [null, 'You may expect the lamb to be born between {{initialLambing.longValue}} and {{finalLambing.longValue}}.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'EvK-ryZpHEtWGrvIFuNFH',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1_FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'initialLambing', 'vt' => 'date', 'l' => ''],
                            ],
                            [
                                ['t' => 'v', 'n' => 'finalLambing', 'vt' => 'date', 'l' => ''],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'lambing_date = mating_date + 147',
                'var' => [
                    [
                        'l' => 'mating_date',
                        'f' => 'lambing_date - 147',
                        'r' => ['lambing_date'],
                    ],
                    [
                        'l' => 'lambing_date',
                        'f' => 'mating_date + 147',
                        'r' => ['mating_date'],
                    ],
                ],
            ],
            [
                'formula' => 'initialLambing = mating_date + 142',
                'var' => [
                    [
                        'l' => 'mating_date',
                        'f' => 'initialLambing - 142',
                        'r' => ['initialLambing'],
                    ],
                    [
                        'l' => 'initialLambing',
                        'f' => 'mating_date + 142',
                        'r' => ['mating_date'],
                    ],
                ],
            ],
            [
                'formula' => 'finalLambing = mating_date + 152',
                'var' => [
                    [
                        'l' => 'mating_date',
                        'f' => 'finalLambing - 152',
                        'r' => ['finalLambing'],
                    ],
                    [
                        'l' => 'finalLambing',
                        'f' => 'mating_date + 152',
                        'r' => ['mating_date'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Sheep gestation calculator is a free, no-sign-up biology tool. Fill in the field it asks for and it works out <strong>mating date</strong> straight away, with the formula shown underneath.
        TXT,
        'sections' => [
            ['title' => 'How does the Sheep gestation calculator work?', 'html' => <<<'TXT'
            <p>The Sheep gestation calculator takes the values in the form, applies the relationship described below and reports <strong>mating date</strong> in the results panel.</p>
            <p>Working from the top of the form: you give the lambing date.</p>
            TXT],
            ['title' => 'The formula behind the Sheep gestation calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Mating date</span><span class="formula-eq">=</span><span class="formula-rhs">lambing date − 147</span></div><div class="formula-row"><span class="formula-lhs">Mating date</span><span class="formula-eq">=</span><span class="formula-rhs">initial Lambing − 142</span></div><div class="formula-row"><span class="formula-lhs">Mating date</span><span class="formula-eq">=</span><span class="formula-rhs">final Lambing − 152</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <table><caption>What you get, field by field</caption><thead><tr><th>Field</th><th>Units and meaning</th></tr></thead><tbody><tr><td>Mating date</td><td>a calendar date.</td></tr><tr><td>Initial Lambing</td><td>a calendar date.</td></tr><tr><td>Final Lambing</td><td>a calendar date.</td></tr></tbody></table><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Sheep gestation calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 1 figures keep coming back — the lambing date — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Keep the units you enter consistent. </li><li>Write the answer down with its unit. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Round only at the end. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Dates are compared date to date in your own time zone, so a daylight-saving change will not shift the count by a day.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Sheep gestation calculator, these are the ones that matter:</p>
            <ul><li>Dates are handled as whole calendar days in the time zone of the browser, so a birth date or a deadline is compared date to date rather than as a span of hours.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — lambing date for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/sod">Sod</a>, <a href="/biology/soil">Soil</a> and <a href="/biology/swine-gestation">Swine gestation</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sheep gestation calculator work out?', 'a' => <<<'TXT'
            It returns mating date, derived from the lambing date. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Sheep gestation calculator?', 'a' => <<<'TXT'
            The form asks for the lambing date, which is a single field. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the Sheep gestation calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. The calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/sod', 'name' => 'Sod'],
            ['path' => '/biology/soil', 'name' => 'Soil'],
            ['path' => '/biology/swine-gestation', 'name' => 'Swine gestation'],
        ],
    ],
];

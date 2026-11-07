<?php

/**
 * Bacteria growth
 * /biology/bacteria-growth
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bacteria growth',
    'meta' => ['title' => 'Bacteria growth — Formula, Steps & Examples', 'description' => <<<'TXT'
    Give the Bacteria growth calculator the initial number of bacteria — N, the final number of bacteria — N and the doubling time and it returns <strong>growth…
    TXT, 'h1' => 'Bacteria growth Calculator', 'updated' => '2026-07-23'],
    'raw' => [
        'vars' => [
            'doublingTime' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'elapsedTime' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'growthRate' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'numberOfBacteria' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'numberOfBacteria2' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'nKP-Smf_8TdUStN5qKUWp',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'numberOfBacteria', 'vt' => 'numerical', 'l' => 'Initial number of bacteria — N(0)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'numberOfBacteria2', 'vt' => 'numerical', 'l' => 'Final number of bacteria — N(t)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'elapsedTime',
                                    'vt' => 'numerical',
                                    'l' => 'Elapsed time',
                                    'us' => '19',
                                    'du' => 'hrs',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'growthRate', 'vt' => 'numerical', 'l' => 'Growth rate (r)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'doublingTime',
                                    'vt' => 'numerical',
                                    'l' => 'Doubling time (T==d==)',
                                    'us' => '19',
                                    'du' => 'hrs',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'numberOfBacteria2 = numberOfBacteria*(1+growthRate)^(elapsedTime )',
                'var' => [
                    [
                        'l' => 'growthRate',
                        'f' => 'pow(numberOfBacteria2/numberOfBacteria, 1/elapsedTime) - 1',
                        'r' => ['elapsedTime', 'numberOfBacteria', 'numberOfBacteria2'],
                    ],
                    [
                        'l' => 'elapsedTime',
                        'f' => 'log(numberOfBacteria2/numberOfBacteria)/log(growthRate + 1)',
                        'r' => ['growthRate', 'numberOfBacteria', 'numberOfBacteria2'],
                    ],
                    [
                        'l' => 'numberOfBacteria',
                        'f' => 'numberOfBacteria2*pow(growthRate + 1, -elapsedTime)',
                        'r' => ['growthRate', 'elapsedTime', 'numberOfBacteria2'],
                    ],
                    [
                        'l' => 'numberOfBacteria2',
                        'f' => 'numberOfBacteria*pow(growthRate + 1, elapsedTime)',
                        'r' => ['growthRate', 'elapsedTime', 'numberOfBacteria'],
                    ],
                ],
            ],
            [
                'formula' => 'doublingTime = (ln(2)*elapsedTime )/ln(numberOfBacteria2/numberOfBacteria)',
                'var' => [
                    [
                        'l' => 'elapsedTime',
                        'f' => 'doublingTime*log(numberOfBacteria2/numberOfBacteria)/log(2)',
                        'r' => ['numberOfBacteria', 'numberOfBacteria2', 'doublingTime'],
                    ],
                    [
                        'l' => 'numberOfBacteria',
                        'f' => 'numberOfBacteria2*exp(-elapsedTime*log(2)/doublingTime)',
                        'r' => ['elapsedTime', 'numberOfBacteria2', 'doublingTime'],
                    ],
                    [
                        'l' => 'numberOfBacteria2',
                        'f' => 'numberOfBacteria*exp(elapsedTime*log(2)/doublingTime)',
                        'r' => ['elapsedTime', 'numberOfBacteria', 'doublingTime'],
                    ],
                    [
                        'l' => 'doublingTime',
                        'f' => 'elapsedTime*log(2)/log(numberOfBacteria2/numberOfBacteria)',
                        'r' => ['elapsedTime', 'numberOfBacteria', 'numberOfBacteria2'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Give the Bacteria growth calculator the initial number of bacteria — N, the final number of bacteria — N and the doubling time and it returns <strong>growth rate (r)</strong>.
        TXT,
        'sections' => [
            ['title' => 'How does the Bacteria growth calculator work?', 'html' => <<<'TXT'
            <p>The Bacteria growth calculator takes the values in the form, applies the relationship described below and reports <strong>growth rate (r)</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the initial number of bacteria — N(0), the final number of bacteria — N(t) and the doubling time (Td).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => '<ul><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A measured quantity, entered by default in hours. </li></ul>'],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Initial number of bacteria — N(0)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Final number of bacteria — N(t)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Elapsed time</strong></td><td>A measured quantity, 27 units available.</td><td>hours</td><td>Calculated</td></tr><tr><td><strong>Growth rate (r)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Doubling time (Td)</strong></td><td>A measured quantity, 27 units available.</td><td>hours</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Bacteria growth calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Growth rate (r)</span><span class="formula-eq">=</span><span class="formula-rhs">(final number of bacteria — N(t) ÷ initial number of bacteria — N(0) ^ 1 ÷ elapsed time) − 1</span></div><div class="formula-row"><span class="formula-lhs">Elapsed time</span><span class="formula-eq">=</span><span class="formula-rhs">doubling time (Td) × the natural log of (final number of bacteria — N(t) ÷ initial number of bacteria — N(0)) ÷ the natural log of (2)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in hours, and convertible to any of the 27 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in hours</li><li>Time, opening in hours</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Bacteria growth calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 3 figures keep coming back — the initial number of bacteria — N, the final number of bacteria — N and the doubling time — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Bacteria growth calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/basal-area">Basal area</a>, <a href="/biology/benadryl-dosage-for-dogs">Benadryl dosage for dogs</a> and <a href="/biology/bird-age">Bird age</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bacteria growth calculator work out?', 'a' => <<<'TXT'
            It returns growth rate (r), derived from the initial number of bacteria — N, the final number of bacteria — N and the doubling time. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Bacteria growth calculator?', 'a' => <<<'TXT'
            The form asks for the initial number of bacteria — N, the final number of bacteria — N and the doubling time, which is 3 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter elapsed time in a different unit?', 'a' => <<<'TXT'
            Yes. Elapsed time opens in hours and the chip beside it offers 27 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the Bacteria growth calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/basal-area', 'name' => 'Basal area'],
            ['path' => '/biology/benadryl-dosage-for-dogs', 'name' => 'Benadryl dosage for dogs'],
            ['path' => '/biology/bird-age', 'name' => 'Bird age'],
        ],
    ],
];

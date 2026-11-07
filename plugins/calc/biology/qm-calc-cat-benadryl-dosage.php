<?php

/**
 * Cat Benadryl dosage
 * /biology/cat-benadryl-dosage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cat Benadryl dosage',
    'meta' => ['title' => 'Cat Benadryl dosage: Formula, Steps & Results', 'description' => <<<'TXT'
    The Cat Benadryl dosage calculator returns <strong>your cat's weight</strong> from the field on the form. The panel waits for the button. Working from the top…
    TXT, 'h1' => 'Cat Benadryl dosage Calculator', 'updated' => '2026-09-28'],
    'raw' => [
        'vars' => [
            'benadryl_mg' => [
                'type' => 'numerical',
                'rnd' => ['standard', '1'],
            ],
            'chewable_tablets' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'chewable_tablets_show' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'liquid' => [
                'type' => 'numerical',
                'rnd' => ['standard', '1'],
            ],
            'tablets' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'tablets_show' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => '6urlD_DdtN5Fmd6R8z-uJ',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => '🐈  Your cat\'s weight',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'KRNcuXDqY2iB17zcIAlMG',
                'title' => 'Benadryl dosage',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'benadryl_mg',
                                    'vt' => 'numerical',
                                    'l' => 'In mg',
                                    'us' => '22',
                                    'du' => 'mg',
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
                                    'n' => 'liquid',
                                    'vt' => 'numerical',
                                    'l' => 'Liquid (12.4 mg/5ml concentration)',
                                    'us' => '20',
                                    'du' => 'ml',
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
                                    'n' => 'tablets_show',
                                    'vt' => 'numerical',
                                    'l' => 'Tablets of 25 mg',
                                    'suf' => '#',
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
                                    'n' => 'chewable_tablets_show',
                                    'vt' => 'numerical',
                                    'l' => 'Chewable tablets of 12.5 mg',
                                    'suf' => '#',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'eVerNpQDYbAdL3eb8Zfmc',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1_FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'tablets',
                                    'vt' => 'numerical',
                                    'l' => 'Tablets',
                                    'suf' => '#',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'chewable_tablets',
                                    'vt' => 'numerical',
                                    'l' => 'Chewable tablets',
                                    'suf' => '#',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'weight = benadryl_mg',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => 'benadryl_mg',
                        'r' => ['benadryl_mg'],
                    ],
                    [
                        'l' => 'benadryl_mg',
                        'f' => 'weight',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'benadryl_mg/ 25 = tablets',
                'var' => [
                    [
                        'l' => 'tablets',
                        'f' => '(1/25)*benadryl_mg',
                        'r' => ['benadryl_mg'],
                    ],
                    [
                        'l' => 'benadryl_mg',
                        'f' => '25*tablets',
                        'r' => ['tablets'],
                    ],
                ],
            ],
            [
                'formula' => 'benadryl_mg/ 2.5 = liquid',
                'var' => [
                    [
                        'l' => 'liquid',
                        'f' => '(2/5)*benadryl_mg',
                        'r' => ['benadryl_mg'],
                    ],
                    [
                        'l' => 'benadryl_mg',
                        'f' => '(5/2)*liquid',
                        'r' => ['liquid'],
                    ],
                ],
            ],
            [
                'formula' => 'benadryl_mg/ 12.5 = chewable_tablets',
                'var' => [
                    [
                        'l' => 'chewable_tablets',
                        'f' => '(2/25)*benadryl_mg',
                        'r' => ['benadryl_mg'],
                    ],
                    [
                        'l' => 'benadryl_mg',
                        'f' => '(25/2)*chewable_tablets',
                        'r' => ['chewable_tablets'],
                    ],
                ],
            ],
            [
                'formula' => 'tablets_show = floor(4*tablets)/4',
                'var' => [
                    [
                        'l' => 'tablets_show',
                        'f' => '(1/4)*floor(4*tablets)',
                        'r' => ['tablets'],
                    ],
                ],
            ],
            [
                'formula' => ' chewable_tablets_show = floor(chewable_tablets*4)/4',
                'var' => [
                    [
                        'l' => 'chewable_tablets_show',
                        'f' => '(1/4)*floor(4*chewable_tablets)',
                        'r' => ['chewable_tablets'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Cat Benadryl dosage calculator returns <strong>your cat's weight</strong> from the field on the form. 
        
         The panel waits for the button. Edit a field, press Calculate, and compare — one input at a time is enough to see what drives the answer.
        TXT,
        'sections' => [
            ['title' => 'How does the Cat Benadryl dosage calculator work?', 'html' => <<<'TXT'
            <p>The Cat Benadryl dosage calculator takes the values in the form, applies the relationship described below and reports <strong>your cat's weight</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the figures it asks for.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Your cat's weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Liquid (12.4 mg/5ml concentration)</strong></td><td>A measured quantity, 40 units available.</td><td>milliliters</td><td>Calculated</td></tr><tr><td><strong>Tablets of 25 mg</strong></td><td>A number stated in #.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Chewable tablets of 12.5 mg</strong></td><td>A number stated in #.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Tablets</strong></td><td>A number stated in #.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Chewable tablets</strong></td><td>A number stated in #.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Cat Benadryl dosage calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Your cat&#x27;s weight</span><span class="formula-eq">=</span><span class="formula-rhs">in mg</span></div><div class="formula-row"><span class="formula-lhs">Tablets</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 25) × in mg</span></div><div class="formula-row"><span class="formula-lhs">Liquid (12.4 mg/5ml concentration)</span><span class="formula-eq">=</span><span class="formula-rhs">(2 ÷ 5) × in mg</span></div><div class="formula-row"><span class="formula-lhs">Chewable tablets</span><span class="formula-eq">=</span><span class="formula-rhs">(2 ÷ 25) × in mg</span></div><div class="formula-row"><span class="formula-lhs">Tablets of 25 mg</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 4) × rounded down, (4 × tablets)</span></div><div class="formula-row"><span class="formula-lhs">Chewable tablets of 12.5 mg</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 4) × rounded down, (4 × chewable tablets)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in milliliters, and convertible to any of the 40 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li><li>Mass, opening in milligrams</li><li>Volume, opening in milliliters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Cat Benadryl dosage calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Keep the units you enter consistent. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Cat Benadryl dosage calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/cat-bmi">Cat BMI</a>, <a href="/biology/cat-calorie">Cat calorie</a> and <a href="/biology/cat-chocolate-toxicity">Cat chocolate toxicity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat Benadryl dosage calculator work out?', 'a' => <<<'TXT'
            It returns your cat's weight. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Cat Benadryl dosage calculator?', 'a' => <<<'TXT'
            The form asks for a few values, which is a single field. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter your cat\'s weight in a different unit?', 'a' => <<<'TXT'
            Yes. Your cat's weight opens in kilograms and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the Cat Benadryl dosage calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/cat-bmi', 'name' => 'Cat BMI'],
            ['path' => '/biology/cat-calorie', 'name' => 'Cat calorie'],
            ['path' => '/biology/cat-chocolate-toxicity', 'name' => 'Cat chocolate toxicity'],
        ],
    ],
];

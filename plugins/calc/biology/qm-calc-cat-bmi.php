<?php

/**
 * Cat BMI
 * /biology/cat-bmi
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cat BMI',
    'meta' => ['title' => 'Cat BMI Calculator: Formula, Steps & Examples', 'description' => 'The Cat BMI calculator turns the length of the lower back leg and the FBMI into <strong>rib cage circumference</strong>. The Cat BMI calculator takes the…', 'h1' => 'Cat BMI Calculator', 'updated' => '2026-09-05'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ribcage',
                            'label' => 'Rib cage circumference',
                            'type' => 'number',
                            'help' => 'Ideally, measured around the 9th rib.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lim',
                            'label' => 'Length of the lower back leg',
                            'type' => 'number',
                            'help' => 'Length of your cat\'s lower back leg from the knee to the ankle.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fbmi',
                            'label' => 'FBMI',
                            'type' => 'number',
                            'help' => 'Feline Body Mass Index.',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'fbmi = (((ribcage/0.7062) - lim )/0.9156) - lim',
            'results' => ['ribcage' => '(8082459/12500000)*fbmi + (16909959/12500000)*lim', 'fbmi' => '-4789/2289*lim + (12500000/8082459)*ribcage', 'lim' => '-2289/4789*fbmi + (12500000/16909959)*ribcage'],
        ],
    ],
    'article' => [
        'intro' => 'The Cat BMI calculator turns the length of the lower back leg and the FBMI into <strong>rib cage circumference</strong>.',
        'sections' => [
            ['title' => 'How does the Cat BMI calculator work?', 'html' => <<<'TXT'
            <p>The Cat BMI calculator takes the values in the form, applies the relationship described below and reports <strong>rib cage circumference</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the length of the lower back leg and the FBMI.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Rib cage circumference</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Length of the lower back leg</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>FBMI</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Cat BMI calculator', 'html' => <<<'TXT'
            <p>One relationship drives the whole page:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Rib cage circumference</span><span class="formula-eq">=</span><span class="formula-rhs">(8082459 ÷ 12500000) × FBMI + (16909959 ÷ 12500000) × length of the lower back leg</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>Length of the lower back leg</strong> = 30 cm and <strong>FBMI</strong> = 10. Working through the relationship above gives <strong>Rib cage circumference</strong> = 687 cm.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Rib cage circumference</strong> = 687 cm should be roughly the size you expected from <strong>Length of the lower back leg</strong> = 30 cm and <strong>FBMI</strong> = 10.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Cat BMI calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 2 figures keep coming back — the length of the lower back leg and the FBMI — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Cat BMI calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — length of the lower back leg for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/cat-calorie">Cat calorie</a>, <a href="/biology/cat-chocolate-toxicity">Cat chocolate toxicity</a> and <a href="/biology/cat-pregnancy">Cat pregnancy</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat BMI calculator work out?', 'a' => <<<'TXT'
            It returns rib cage circumference, derived from the length of the lower back leg and the FBMI. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Cat BMI calculator?', 'a' => <<<'TXT'
            The form asks for the length of the lower back leg and the FBMI, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter rib cage circumference in a different unit?', 'a' => <<<'TXT'
            Yes. Rib cage circumference opens in centimeters and the chip beside it offers 34 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Rib cage circumference = 687 cm. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Cat BMI calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/cat-calorie', 'name' => 'Cat calorie'],
            ['path' => '/biology/cat-chocolate-toxicity', 'name' => 'Cat chocolate toxicity'],
            ['path' => '/biology/cat-pregnancy', 'name' => 'Cat pregnancy'],
        ],
    ],
];

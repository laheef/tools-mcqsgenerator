<?php

/**
 * Benadryl dosage for dogs
 * /biology/benadryl-dosage-for-dogs
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Benadryl dosage for dogs',
    'meta' => ['title' => 'Benadryl dosage for dogs — Free Online Calculator', 'description' => 'The Benadryl dosage for dogs calculator returns <strong>your dog\'s weight</strong> from the field on the form. Editing anything puts the results away until…', 'h1' => 'Benadryl dosage for dogs Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dogs_weight',
                            'label' => 'Your dog\'s weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Benadryl dosage',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mass_dose',
                            'label' => 'Dosage by weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'liquid_dose',
                            'label' => 'Liquid (12.5 mg / 5 mL)',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tablets',
                            'label' => 'Tablets',
                            'type' => 'number',
                            'suffix' => '× 25 mg',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chewable_tablets',
                            'label' => 'Chewable tablets',
                            'type' => 'number',
                            'suffix' => '× 12.5 mg',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => '🕒 Dose must be repeated every 8 or 12 hours (2 or 3 times per day).'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'dogs_weight = mass_dose',
            'results' => ['dogs_weight' => 'mass_dose', 'mass_dose' => 'dogs_weight'],
        ],
        [
            'title' => 'floor(mass_dose/ 25) = tablets',
            'results' => ['tablets' => 'floor((1/25)*mass_dose)'],
        ],
        [
            'title' => 'floor(mass_dose/ 12.5) = chewable_tablets',
            'results' => ['chewable_tablets' => 'floor((2/25)*mass_dose)'],
        ],
        [
            'title' => 'mass_dose/ 2.5 = liquid_dose',
            'results' => ['liquid_dose' => '(2/5)*mass_dose', 'mass_dose' => '(5/2)*liquid_dose'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Benadryl dosage for dogs calculator returns <strong>your dog's weight</strong> from the field on the form. 
        
         Editing anything puts the results away until the next press of Calculate — change one value at a time and the updated answer tells you what that value was worth.
        TXT,
        'sections' => [
            ['title' => 'How does the Benadryl dosage for dogs calculator work?', 'html' => <<<'TXT'
            <p>The Benadryl dosage for dogs calculator takes the values in the form, applies the relationship described below and reports <strong>your dog's weight</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the dosage by weight.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Your dog's weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Dosage by weight</strong></td><td>A measured quantity, 29 units available.</td><td>milligrams</td><td>You supply it</td></tr><tr><td><strong>Liquid (12.5 mg / 5 mL)</strong></td><td>A measured quantity, 40 units available.</td><td>milliliters</td><td>Calculated</td></tr><tr><td><strong>Tablets</strong></td><td>A number stated in × 25 mg.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Chewable tablets</strong></td><td>A number stated in × 12.5 mg.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Benadryl dosage for dogs calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Your dog&#x27;s weight</span><span class="formula-eq">=</span><span class="formula-rhs">dosage by weight</span></div><div class="formula-row"><span class="formula-lhs">Tablets</span><span class="formula-eq">=</span><span class="formula-rhs">rounded down, ((1 ÷ 25) × dosage by weight)</span></div><div class="formula-row"><span class="formula-lhs">Chewable tablets</span><span class="formula-eq">=</span><span class="formula-rhs">rounded down, ((2 ÷ 25) × dosage by weight)</span></div><div class="formula-row"><span class="formula-lhs">Liquid (12.5 mg / 5 mL)</span><span class="formula-eq">=</span><span class="formula-rhs">(2 ÷ 5) × dosage by weight</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in milliliters, and convertible to any of the 40 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li><li>Mass, opening in milligrams</li><li>Volume, opening in milliliters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Benadryl dosage for dogs calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 1 figures keep coming back — the dosage by weight — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Benadryl dosage for dogs calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — dosage by weight for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/bird-age">Bird age</a>, <a href="/biology/bulb-spacing">Bulb spacing</a> and <a href="/biology/cat-age">Cat age</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Benadryl dosage for dogs calculator work out?', 'a' => <<<'TXT'
            It returns your dog's weight, derived from the dosage by weight. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Benadryl dosage for dogs calculator?', 'a' => <<<'TXT'
            The form asks for the dosage by weight, which is a single field. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter your dog\'s weight in a different unit?', 'a' => <<<'TXT'
            Yes. Your dog's weight opens in kilograms and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the Benadryl dosage for dogs calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/bird-age', 'name' => 'Bird age'],
            ['path' => '/biology/bulb-spacing', 'name' => 'Bulb spacing'],
            ['path' => '/biology/cat-age', 'name' => 'Cat age'],
        ],
    ],
];

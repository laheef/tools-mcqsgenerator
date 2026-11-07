<?php

/**
 * Fish oil dosage for cats
 * /biology/fish-oil-dosage-for-cats
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fish oil dosage for cats',
    'meta' => ['title' => 'Fish oil dosage for cats Calculator: Free, With Steps', 'description' => 'The Fish oil dosage for cats calculator is a free, no-sign-up biology tool. Fill in the field it asks for and it works out <strong>your cat\'s weight</strong>…', 'h1' => 'Fish oil dosage for cats Calculator', 'updated' => '2026-05-25'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kg',
                            'label' => 'Your cat\'s weight 🐈',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mg',
                            'label' => 'Fish oil dosage',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'mg = 40 * kg',
            'results' => ['kg' => '(1/40)*mg', 'mg' => '40*kg'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Fish oil dosage for cats calculator is a free, no-sign-up biology tool. Fill in the field it asks for and it works out <strong>your cat's weight</strong> straight away, with the formula shown underneath.
        TXT,
        'sections' => [
            ['title' => 'How does the Fish oil dosage for cats calculator work?', 'html' => <<<'TXT'
            <p>The Fish oil dosage for cats calculator takes the values in the form, applies the relationship described below and reports <strong>your cat's weight</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the fish oil dosage.</p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Take <strong>Fish oil dosage</strong> = 10 mg. The calculator returns <strong>Your cat's weight</strong> = 0.25 kg.</p><p>Read it as a template. Every number above can be replaced with one of yours; only the relationship between them is fixed.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Your cat's weight</strong> = 0.25 kg should be roughly the size you expected from <strong>Fish oil dosage</strong> = 10 mg.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li><li>Mass, opening in milligrams</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Fish oil dosage for cats calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 1 figures keep coming back — the fish oil dosage — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Write the answer down with its unit. </li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Fish oil dosage for cats calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — fish oil dosage for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/gdu">GDU (growing degree units)</a>, <a href="/biology/goat-gestation">Goat gestation</a> and <a href="/biology/grain-bin">Grain bin</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fish oil dosage for cats calculator work out?', 'a' => <<<'TXT'
            It returns your cat's weight, derived from the fish oil dosage. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Fish oil dosage for cats calculator?', 'a' => <<<'TXT'
            The form asks for the fish oil dosage, which is a single field. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter your cat\'s weight in a different unit?', 'a' => <<<'TXT'
            Yes. Your cat's weight opens in kilograms and the chip beside it offers 29 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Your cat's weight = 0.25 kg. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Fish oil dosage for cats calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/gdu', 'name' => 'GDU (growing degree units)'],
            ['path' => '/biology/goat-gestation', 'name' => 'Goat gestation'],
            ['path' => '/biology/grain-bin', 'name' => 'Grain bin'],
        ],
    ],
];

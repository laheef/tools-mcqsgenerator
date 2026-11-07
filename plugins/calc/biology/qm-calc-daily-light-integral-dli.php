<?php

/**
 * Daily light integral (DLI)
 * /biology/daily-light-integral-dli
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Daily light integral (DLI)',
    'meta' => ['title' => 'Daily light integral (DLI) — Formula & Results', 'description' => <<<'TXT'
    <strong>light hours per day</strong> is what the Daily light integral (DLI) calculator works out, and it gets there from the photon flux density and the daily…
    TXT, 'h1' => 'Daily light integral (DLI) Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'dli' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'lfd' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'ppfd' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'Pl2Pl12psJ7L2MbfKFzR9',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'lfd',
                                    'vt' => 'numerical',
                                    'l' => 'Light hours per day ',
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
                                [
                                    't' => 'v',
                                    'n' => 'ppfd',
                                    'vt' => 'numerical',
                                    'l' => 'Photon flux density (PPFD)',
                                    'suf' => 'μmol/s·m²',
                                    'h' => 'PPFD is photosynthetic photon flux density.',
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
                                    'n' => 'dli',
                                    'vt' => 'numerical',
                                    'l' => 'Daily light integral (DLI)',
                                    'suf' => 'mol/m²/day',
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
                                        ['dli > 0 and dli <= 6', 'This amount of light is the minimum requirement for microgreens.'],
                                        ['dli > 6 and dli <= 12', 'This amount of light is good for microgreens.'],
                                        ['dli > 12 and dli <= 17', 'This amount of light is good for vegetative plants like leafy greens and herbs.'],
                                        ['dli > 17 and dli < 40', 'This amount of light is good for flowering crops, including vegetables that grow out of flowers, like peppers and tomatoes.'],
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
                'formula' => 'dli = ppfd * lfd * 3600 / 1000000',
                'var' => [
                    [
                        'l' => 'lfd',
                        'f' => '(2500/9)*dli/ppfd',
                        'r' => ['dli', 'ppfd'],
                    ],
                    [
                        'l' => 'dli',
                        'f' => '(9/2500)*lfd*ppfd',
                        'r' => ['lfd', 'ppfd'],
                    ],
                    [
                        'l' => 'ppfd',
                        'f' => '(2500/9)*dli/lfd',
                        'r' => ['lfd', 'dli'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <strong>light hours per day</strong> is what the Daily light integral (DLI) calculator works out, and it gets there from the photon flux density and the daily light integral.
        TXT,
        'sections' => [
            ['title' => 'How does the Daily light integral (DLI) calculator work?', 'html' => <<<'TXT'
            <p>The Daily light integral (DLI) calculator takes the values in the form, applies the relationship described below and reports <strong>light hours per day</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the photon flux density (PPFD) and the daily light integral (DLI).</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Light hours per day</strong></td><td>A measured quantity, 27 units available.</td><td>hours</td><td>Calculated</td></tr><tr><td><strong>Photon flux density (PPFD)</strong></td><td>A number stated in μmol/s·m².</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Daily light integral (DLI)</strong></td><td>A number stated in mol/m²/day.</td><td>—</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Daily light integral (DLI) calculator', 'html' => <<<'TXT'
            <p>One relationship drives the whole page:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Light hours per day</span><span class="formula-eq">=</span><span class="formula-rhs">(2500 ÷ 9) × daily light integral (DLI) ÷ photon flux density (PPFD)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in hours, and convertible to any of the 27 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in hours</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Daily light integral (DLI) calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 2 figures keep coming back — the photon flux density and the daily light integral — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Keep the units you enter consistent. </li><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Daily light integral (DLI) calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — photon flux density for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/dihybrid-cross-punnett-square">Dihybrid cross Punnett square</a>, <a href="/biology/dna-concentration">DNA concentration</a> and <a href="/biology/dna-copy-number">DNA copy number</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Daily light integral (DLI) calculator work out?', 'a' => <<<'TXT'
            It returns light hours per day, derived from the photon flux density and the daily light integral. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Daily light integral (DLI) calculator?', 'a' => <<<'TXT'
            The form asks for the photon flux density and the daily light integral, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter light hours per day in a different unit?', 'a' => <<<'TXT'
            Yes. Light hours per day opens in hours and the chip beside it offers 27 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the Daily light integral (DLI) calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/dihybrid-cross-punnett-square', 'name' => 'Dihybrid cross Punnett square'],
            ['path' => '/biology/dna-concentration', 'name' => 'DNA concentration'],
            ['path' => '/biology/dna-copy-number', 'name' => 'DNA copy number'],
        ],
    ],
];

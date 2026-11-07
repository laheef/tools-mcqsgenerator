<?php

/**
 * Water potential
 * /biology/water-potential
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Water potential',
    'meta' => ['title' => 'Water potential Calculator: Free, With Steps', 'description' => 'Give the Water potential calculator the osmotic potential, the gravitational potential, the hydrostatic potential and the overburden potential and it returns…', 'h1' => 'Water potential Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => 'Choose the known components!',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'psi_o',
                            'label' => 'Osmotic potential (Ψo)',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'bar',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'psi_p',
                            'label' => 'Pressure potential (Ψp)',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'bar',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'psi_g',
                            'label' => 'Gravitational potential (Ψg)',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'bar',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Additional Components',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'psi_h',
                            'label' => 'Hydrostatic potential (Ψh)',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'bar',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'psi_a',
                            'label' => 'Overburden potential (Ψa)',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'bar',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'psi_m',
                            'label' => 'Matric potential (Ψm)',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'bar',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Water Potential',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Psi_sum',
                            'label' => 'Ψ',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'bar',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Psi_sum = psi_o + psi_h + psi_p + psi_m + psi_a + psi_g',
            'results' => [
                'psi_p' => 'Psi_sum - psi_a - psi_g - psi_h - psi_m - psi_o',
                'psi_a' => 'Psi_sum - psi_g - psi_h - psi_m - psi_o - psi_p',
                'psi_h' => 'Psi_sum - psi_a - psi_g - psi_m - psi_o - psi_p',
                'psi_g' => 'Psi_sum - psi_a - psi_h - psi_m - psi_o - psi_p',
                'psi_o' => 'Psi_sum - psi_a - psi_g - psi_h - psi_m - psi_p',
                'Psi_sum' => 'psi_a + psi_g + psi_h + psi_m + psi_o + psi_p',
                'psi_m' => 'Psi_sum - psi_a - psi_g - psi_h - psi_o - psi_p',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Give the Water potential calculator the osmotic potential, the gravitational potential, the hydrostatic potential and the overburden potential and it returns <strong>pressure potential (Ψp)</strong>.
        TXT,
        'sections' => [
            ['title' => 'How does the Water potential calculator work?', 'html' => <<<'TXT'
            <p>The Water potential calculator takes the values in the form, applies the relationship described below and reports <strong>pressure potential (Ψp)</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the osmotic potential (Ψo), the gravitational potential (Ψg), the hydrostatic potential (Ψh) and the overburden potential (Ψa).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in bars. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in bars. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in bars. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in bars. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in bars. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in bars. The unit chip switches it to any of the 28 supported units.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Osmotic potential (Ψo)</strong></td><td>A measured quantity, 28 units available.</td><td>bars</td><td>You supply it</td></tr><tr><td><strong>Pressure potential (Ψp)</strong></td><td>A measured quantity, 28 units available.</td><td>bars</td><td>Calculated</td></tr><tr><td><strong>Gravitational potential (Ψg)</strong></td><td>A measured quantity, 28 units available.</td><td>bars</td><td>You supply it</td></tr><tr><td><strong>Hydrostatic potential (Ψh)</strong></td><td>A measured quantity, 28 units available.</td><td>bars</td><td>You supply it</td></tr><tr><td><strong>Overburden potential (Ψa)</strong></td><td>A measured quantity, 28 units available.</td><td>bars</td><td>You supply it</td></tr><tr><td><strong>Matric potential (Ψm)</strong></td><td>A measured quantity, 28 units available.</td><td>bars</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Water potential calculator', 'html' => <<<'TXT'
            <p>One relationship drives the whole page:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Pressure potential (Ψp)</span><span class="formula-eq">=</span><span class="formula-rhs">Ψ − overburden potential (Ψa) − gravitational potential (Ψg) − hydrostatic potential (Ψh) − matric potential (Ψm) − osmotic potential (Ψo)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in bars, and convertible to any of the 28 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Pressure, opening in bars</li><li>Pressure, opening in bars</li><li>Pressure, opening in bars</li><li>Pressure, opening in bars</li><li>Pressure, opening in bars</li><li>Pressure, opening in bars</li><li>Pressure, opening in bars</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Water potential calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 4 figures keep coming back — the osmotic potential, the gravitational potential and the hydrostatic potential — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Keep the units you enter consistent. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Water potential calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/water-soluble-fertilizer">Water soluble fertilizer</a>, <a href="/biology/acres-per-hour">Acres per hour</a> and <a href="/biology/allele-frequency">Allele frequency</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Water potential calculator work out?', 'a' => <<<'TXT'
            It returns pressure potential (Ψp), derived from the osmotic potential, the gravitational potential and the hydrostatic potential. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Water potential calculator?', 'a' => <<<'TXT'
            The form asks for the osmotic potential, the gravitational potential, the hydrostatic potential and the overburden potential, which is 6 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter osmotic potential (Ψo) in a different unit?', 'a' => <<<'TXT'
            Yes. Osmotic potential (Ψo) opens in bars and the chip beside it offers 28 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Ψ = 0 bar. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Water potential calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/water-soluble-fertilizer', 'name' => 'Water soluble fertilizer'],
            ['path' => '/biology/acres-per-hour', 'name' => 'Acres per hour'],
            ['path' => '/biology/allele-frequency', 'name' => 'Allele frequency'],
        ],
    ],
];

<?php

/**
 * Bird age
 * /biology/bird-age
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bird age',
    'meta' => ['title' => 'Bird age Calculator: Formula, Steps & Examples', 'description' => <<<'TXT'
    Give the Bird age calculator the bird age and the human life expectancy and it returns <strong>human age</strong>. The Bird age calculator takes the values in…
    TXT, 'h1' => 'Bird age Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'adult' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'average_bird_lifespan' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'average_bird_lifespan_custom' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'bird_age' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'bird_age_custom' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'display_more_variables' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'lLL8BQ-Y2sGJr91bqO3K4', 'c' => null],
                ],
                'ds' => 'Uq1BlLb8fPNQL-aBL8uM7',
            ],
            'human_age' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'human_age_custom' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'human_life_expectancy' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '72.6', 'c' => null],
                ],
            ],
            'human_life_expectancy_custom' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
                'dfl' => [
                    ['v' => '72.6', 'c' => null],
                ],
            ],
            'species' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'GZO7tQa99pxvUrBmDYztF', 'c' => null],
                ],
                'ds' => 'RDc_xGGzE_t4kIikdchrU',
            ],
            'timemax' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'timemin' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'OC-yXyj-s66jq3qE0Ql_8',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'species',
                                    'vt' => 'valueSelect',
                                    'l' => 'Bird species ',
                                    'ds' => 'RDc_xGGzE_t4kIikdchrU',
                                    'opts' => [
                                        ['GZO7tQa99pxvUrBmDYztF', 'Parakeet (Budgie)', '1'],
                                        ['cugOSUM2gotIAXr8DPA3c', 'Cockatiel', '2'],
                                        ['GzErRgCCtQogsedKxi3w6', 'Lovebird', '3'],
                                        ['I3qIabAlLCNZQaBAREnnt', 'Zebra finch', '4'],
                                        ['Xj7FjtIn8UW6Ic86B-A-S', 'Canary', '5'],
                                        ['xWqUe86_E1M8CwxcFgJzs', 'African grey parrot', '6'],
                                        ['jnEsllk4ISS5tR92FJxhb', 'Conure', '7'],
                                        ['Ef1B-aFaUDcYAjEvaakv8', 'Enter a custom average bird lifespan', '8'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['birds/pet-bird-2.png'],
                                ],
                                [
                                    't' => 'i',
                                    'u' => ['birds/pet-bird-7.png'],
                                ],
                                [
                                    't' => 'i',
                                    'u' => ['birds/pet-bird-1.png'],
                                ],
                                [
                                    't' => 'i',
                                    'u' => ['birds/pet-bird-4.png'],
                                ],
                                [
                                    't' => 'i',
                                    'u' => ['birds/pet-bird-6.png'],
                                ],
                                [
                                    't' => 'i',
                                    'u' => ['birds/pet-bird-3.png'],
                                ],
                                [
                                    't' => 'i',
                                    'u' => ['birds/pet-bird-8.png'],
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
                                    'n' => 'average_bird_lifespan',
                                    'vt' => 'dependent',
                                    'l' => 'Average bird lifespan',
                                    'suf' => 'yrs',
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
                                    'n' => 'average_bird_lifespan_custom',
                                    'vt' => 'numerical',
                                    'l' => 'Average bird lifespan',
                                    'suf' => 'yrs',
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
                                    'n' => 'bird_age',
                                    'vt' => 'numerical',
                                    'l' => 'Bird age 🐦',
                                    'us' => '19',
                                    'du' => 'yrs',
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
                                    'n' => 'bird_age_custom',
                                    'vt' => 'numerical',
                                    'l' => 'Bird age 🐦',
                                    'us' => '19',
                                    'du' => 'yrs',
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
                                    'n' => 'human_life_expectancy',
                                    'vt' => 'numerical',
                                    'l' => 'Human life expectancy',
                                    'suf' => 'yrs',
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
                                    'n' => 'human_life_expectancy_custom',
                                    'vt' => 'numerical',
                                    'l' => 'Human life expectancy',
                                    'suf' => 'yrs',
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
                                    'n' => 'human_age',
                                    'vt' => 'numerical',
                                    'l' => 'Human age 🚶',
                                    'h' => 'Assuming the global average life expectancy of 72.6 years.',
                                    'us' => '19',
                                    'du' => 'yrs',
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
                                    'n' => 'human_age_custom',
                                    'vt' => 'numerical',
                                    'l' => 'Human age 🚶',
                                    'h' => 'Assuming the global average life expectancy of 72.6 years.',
                                    'us' => '19',
                                    'du' => 'yrs',
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
                                    'n' => 'display_more_variables',
                                    'vt' => 'valueSelect',
                                    'l' => '',
                                    'ds' => 'Uq1BlLb8fPNQL-aBL8uM7',
                                    'opts' => [
                                        ['R57zBHWJ0KgKkvzSg2sgh', 'Show assumed lifespans', '1'],
                                        ['lLL8BQ-Y2sGJr91bqO3K4', '', '0'],
                                    ],
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
                                        ['species == 1 and bird_age > 0', <<<'TXT'
                                        Parakeet (Budgies)'s lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. A parakeet (budgie) is physically able to breed after ~{{adult.value}} months.&nbsp;
                                        TXT],
                                        ['species == 2 and bird_age > 0', <<<'TXT'
                                        Cockatiel's lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. A cockatiel is physically able to breed after ~{{adult.value}} months.&nbsp;
                                        TXT],
                                        ['species == 3 and bird_age > 0', <<<'TXT'
                                        Lovebird's lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. A lovebird is physically able to breed after ~{{adult.value}} months.&nbsp;
                                        TXT],
                                        ['species == 4 and bird_age > 0', <<<'TXT'
                                        Zebra finch's lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. A zebra finch is physically able to breed after ~{{adult.value}} months.&nbsp;
                                        TXT],
                                        ['species == 5 and bird_age > 0', <<<'TXT'
                                        Canary's lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. A canary is physically able to breed after ~{{adult.value}} months.&nbsp;
                                        TXT],
                                        ['species == 6 and bird_age > 0', <<<'TXT'
                                        African grey parrot's lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. An African grey parrot is physically able to breed after ~{{adult.value}} months.&nbsp;
                                        TXT],
                                        ['species == 7 and bird_age > 0', <<<'TXT'
                                        Conure's lifespan range: {{timemin.value}}-{{timemax.value}} years Average lifespan: {{average_bird_lifespan.value}} years Remember that this is only a rough estimate, as birds mature differently from humans. A conure is physically able to breed after ~{{adult.value}} months.&nbsp;
                                        TXT],
                                        ['species == 8 and average_bird_lifespan_custom > 0 and bird_age_custom > 0', 'Remember that this is only a rough estimate, as birds mature differently from humans.&nbsp;'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '7JQo3exOJa_fqrkUvkLJY',
                'title' => 'dynamic print variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'adult', 'vt' => 'dependent', 'l' => 'Adult'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'timemax', 'vt' => 'dependent', 'l' => 'Timemax'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'timemin', 'vt' => 'dependent', 'l' => 'Timemin'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'bird_age = human_age*average_bird_lifespan/ human_life_expectancy',
                'var' => [
                    [
                        'l' => 'human_age',
                        'f' => 'bird_age*human_life_expectancy/average_bird_lifespan',
                        'r' => ['human_life_expectancy', 'average_bird_lifespan', 'bird_age'],
                    ],
                    [
                        'l' => 'human_life_expectancy',
                        'f' => 'average_bird_lifespan*human_age/bird_age',
                        'r' => ['human_age', 'average_bird_lifespan', 'bird_age'],
                    ],
                    [
                        'l' => 'average_bird_lifespan',
                        'f' => 'bird_age*human_life_expectancy/human_age',
                        'r' => ['human_age', 'human_life_expectancy', 'bird_age'],
                    ],
                    [
                        'l' => 'bird_age',
                        'f' => 'average_bird_lifespan*human_age/human_life_expectancy',
                        'r' => ['human_age', 'human_life_expectancy', 'average_bird_lifespan'],
                    ],
                ],
            ],
            [
                'formula' => 'bird_age_custom = human_age_custom*average_bird_lifespan_custom/ human_life_expectancy_custom',
                'var' => [
                    [
                        'l' => 'average_bird_lifespan_custom',
                        'f' => 'bird_age_custom*human_life_expectancy_custom/human_age_custom',
                        'r' => ['human_age_custom', 'bird_age_custom', 'human_life_expectancy_custom'],
                    ],
                    [
                        'l' => 'human_age_custom',
                        'f' => 'bird_age_custom*human_life_expectancy_custom/average_bird_lifespan_custom',
                        'r' => ['average_bird_lifespan_custom', 'bird_age_custom', 'human_life_expectancy_custom'],
                    ],
                    [
                        'l' => 'bird_age_custom',
                        'f' => 'average_bird_lifespan_custom*human_age_custom/human_life_expectancy_custom',
                        'r' => ['average_bird_lifespan_custom', 'human_age_custom', 'human_life_expectancy_custom'],
                    ],
                    [
                        'l' => 'human_life_expectancy_custom',
                        'f' => 'average_bird_lifespan_custom*human_age_custom/bird_age_custom',
                        'r' => ['average_bird_lifespan_custom', 'human_age_custom', 'bird_age_custom'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'RDc_xGGzE_t4kIikdchrU' => [
                'name' => 'Species data',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'GZO7tQa99pxvUrBmDYztF', 'label' => 'Parakeet (Budgie)', 'value' => '1'],
                    ['uid' => 'cugOSUM2gotIAXr8DPA3c', 'label' => 'Cockatiel', 'value' => '2'],
                    ['uid' => 'GzErRgCCtQogsedKxi3w6', 'label' => 'Lovebird', 'value' => '3'],
                    ['uid' => 'I3qIabAlLCNZQaBAREnnt', 'label' => 'Zebra finch', 'value' => '4'],
                    ['uid' => 'Xj7FjtIn8UW6Ic86B-A-S', 'label' => 'Canary', 'value' => '5'],
                    ['uid' => 'xWqUe86_E1M8CwxcFgJzs', 'label' => 'African grey parrot', 'value' => '6'],
                    ['uid' => 'jnEsllk4ISS5tR92FJxhb', 'label' => 'Conure', 'value' => '7'],
                    ['uid' => 'Ef1B-aFaUDcYAjEvaakv8', 'label' => 'Enter a custom average bird lifespan', 'value' => '8'],
                ],
            ],
            'Uq1BlLb8fPNQL-aBL8uM7' => [
                'name' => 'Display options',
                'uiType' => 'CHECKBOX',
                'options' => [
                    ['uid' => 'R57zBHWJ0KgKkvzSg2sgh', 'label' => 'Show assumed lifespans', 'value' => '1'],
                    ['uid' => 'lLL8BQ-Y2sGJr91bqO3K4', 'label' => '', 'value' => '0'],
                ],
            ],
        ],
    ],
    'article' => [
        'intro' => 'Give the Bird age calculator the bird age and the human life expectancy and it returns <strong>human age</strong>.',
        'sections' => [
            ['title' => 'How does the Bird age calculator work?', 'html' => <<<'TXT'
            <p>The Bird age calculator takes the values in the form, applies the relationship described below and reports <strong>human age</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the bird species); then you type in the bird age, the bird age (2), the human life expectancy and the human life expectancy (2).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 8 options, such as parakeet (Budgie), cockatiel and lovebird. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A measured quantity, entered by default in years. </li><li>A measured quantity, entered by default in years. </li><li>A number, expressed in yrs.</li><li>A number, expressed in yrs.</li><li>A measured quantity, entered by default in years. </li><li>A single on/off switch — tick it for &ldquo;Show assumed lifespans&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Bird species</strong></td><td>One of 8 options, such as parakeet (Budgie), cockatiel and lovebird.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Average bird lifespan</strong></td><td>A number stated in yrs.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Average bird lifespan (2)</strong></td><td>A number stated in yrs.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Bird age</strong></td><td>A measured quantity, 27 units available.</td><td>years</td><td>You supply it</td></tr><tr><td><strong>Bird age (2)</strong></td><td>A measured quantity, 27 units available.</td><td>years</td><td>You supply it</td></tr><tr><td><strong>Human life expectancy</strong></td><td>A number stated in yrs.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Human life expectancy (2)</strong></td><td>A number stated in yrs.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Human age</strong></td><td>A measured quantity, 27 units available.</td><td>years</td><td>Calculated</td></tr><tr><td><strong>Human age (2)</strong></td><td>A measured quantity, 27 units available.</td><td>years</td><td>You supply it</td></tr><tr><td><strong>Adult</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Timemax</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Timemin</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Bird age calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Human age</span><span class="formula-eq">=</span><span class="formula-rhs">bird age × human life expectancy ÷ average bird lifespan</span></div><div class="formula-row"><span class="formula-lhs">Average bird lifespan</span><span class="formula-eq">=</span><span class="formula-rhs">bird age × human life expectancy ÷ human age</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in years, and convertible to any of the 27 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in years</li><li>Time, opening in years</li><li>Time, opening in years</li><li>Time, opening in years</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Bird age calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 2 figures keep coming back — the bird age and the human life expectancy — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Write the answer down with its unit. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/bulb-spacing">Bulb spacing</a>, <a href="/biology/cat-age">Cat age</a> and <a href="/biology/cat-benadryl-dosage">Cat Benadryl dosage</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bird age calculator work out?', 'a' => <<<'TXT'
            It returns human age, derived from the bird age and the human life expectancy. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Bird age calculator?', 'a' => <<<'TXT'
            The form asks for the bird age and the human life expectancy, which is 7 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter bird age in a different unit?', 'a' => <<<'TXT'
            Yes. Bird age opens in years and the chip beside it offers 27 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There are several choices to make (2 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Average bird lifespan = 0. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the Bird age calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/bulb-spacing', 'name' => 'Bulb spacing'],
            ['path' => '/biology/cat-age', 'name' => 'Cat age'],
            ['path' => '/biology/cat-benadryl-dosage', 'name' => 'Cat Benadryl dosage'],
        ],
    ],
];

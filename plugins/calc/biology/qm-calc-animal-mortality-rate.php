<?php

/**
 * Animal mortality rate
 * /biology/animal-mortality-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Animal mortality rate',
    'meta' => ['title' => 'Animal mortality rate — Free Online Calculator', 'description' => 'The Animal mortality rate calculator turns the available stock, number of animals sold and more into <strong>number of deaths</strong>. The Animal mortality…', 'h1' => 'Animal mortality rate Calculator', 'updated' => '2026-08-06'],
    'sections' => [
        [
            'title' => 'Mortality rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'opening_stock',
                            'label' => 'Opening stock',
                            'type' => 'number',
                            'help' => 'Number of animals you started the growing cycle with.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_newborns',
                            'label' => 'Number of newborns',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'available_stock',
                            'label' => 'Available stock',
                            'type' => 'number',
                            'help' => 'Total number of animals during the growing cycle.',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_animals_sold',
                            'label' => 'Number of animals sold',
                            'type' => 'number',
                            'help' => 'Number of animals sold during the growing cycle.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'closing_stock',
                            'label' => 'Closing stock',
                            'type' => 'number',
                            'help' => 'Number of animals you ended the growing cycle with.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_deaths',
                            'label' => 'Number of deaths',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mortality_rate',
                            'label' => 'Mortality rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cumulative_mortality',
                            'label' => 'Cumulative mortality',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Disease mortality rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_disease_cases',
                            'label' => 'Number of disease cases',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_deaths_from_disease',
                            'label' => 'Number of deaths from disease',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'case_mortality',
                            'label' => 'Case mortality',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'number_of_deaths = ((opening_stock + number_of_newborns) - number_of_animals_sold) - closing_stock',
            'results' => [
                'number_of_deaths' => '-closing_stock - number_of_animals_sold + number_of_newborns + opening_stock',
                'number_of_animals_sold' => '-closing_stock - number_of_deaths + number_of_newborns + opening_stock',
                'opening_stock' => 'closing_stock + number_of_animals_sold + number_of_deaths - number_of_newborns',
                'number_of_newborns' => 'closing_stock + number_of_animals_sold + number_of_deaths - opening_stock',
                'closing_stock' => '-number_of_animals_sold - number_of_deaths + number_of_newborns + opening_stock',
            ],
        ],
        [
            'title' => 'mortality_rate = number_of_deaths / (opening_stock + number_of_newborns)',
            'results' => ['opening_stock' => '-number_of_newborns + number_of_deaths/mortality_rate', 'number_of_newborns' => '-opening_stock + number_of_deaths/mortality_rate', 'number_of_deaths' => 'mortality_rate*(number_of_newborns + opening_stock)', 'mortality_rate' => 'number_of_deaths/(number_of_newborns + opening_stock)'],
        ],
        [
            'title' => 'cumulative_mortality = number_of_deaths / closing_stock',
            'results' => ['closing_stock' => 'number_of_deaths/cumulative_mortality', 'number_of_deaths' => 'closing_stock*cumulative_mortality', 'cumulative_mortality' => 'number_of_deaths/closing_stock'],
        ],
        [
            'title' => 'case_mortality = number_of_deaths_from_disease / number_of_disease_cases',
            'results' => ['case_mortality' => 'number_of_deaths_from_disease/number_of_disease_cases', 'number_of_disease_cases' => 'number_of_deaths_from_disease/case_mortality', 'number_of_deaths_from_disease' => 'case_mortality*number_of_disease_cases'],
        ],
        [
            'title' => 'available_stock = opening_stock + number_of_newborns',
            'results' => ['number_of_newborns' => 'available_stock - opening_stock', 'opening_stock' => 'available_stock - number_of_newborns', 'available_stock' => 'number_of_newborns + opening_stock'],
        ],
    ],
    'article' => [
        'intro' => 'The Animal mortality rate calculator turns the available stock, number of animals sold and more into <strong>number of deaths</strong>.',
        'sections' => [
            ['title' => 'How does the Animal mortality rate calculator work?', 'html' => <<<'TXT'
            <p>The Animal mortality rate calculator takes the values in the form, applies the relationship described below and reports <strong>number of deaths</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the available stock, number of animals sold, the mortality rate and the cumulative mortality.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A measured quantity, entered by default in percent. The unit chip switches it to any of the 6 supported units.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Opening stock</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Number of newborns</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Available stock</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Number of animals sold</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Closing stock</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Number of deaths</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Mortality rate</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Cumulative mortality</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Number of disease cases</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Number of deaths from disease</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Case mortality</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Animal mortality rate calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Number of deaths</span><span class="formula-eq">=</span><span class="formula-rhs">-closing stock − number of animals sold + number of newborns + opening stock</span></div><div class="formula-row"><span class="formula-lhs">Opening stock</span><span class="formula-eq">=</span><span class="formula-rhs">-number of newborns + number of deaths ÷ mortality rate</span></div><div class="formula-row"><span class="formula-lhs">Closing stock</span><span class="formula-eq">=</span><span class="formula-rhs">number of deaths ÷ cumulative mortality</span></div><div class="formula-row"><span class="formula-lhs">Case mortality</span><span class="formula-eq">=</span><span class="formula-rhs">number of deaths from disease ÷ number of disease cases</span></div><div class="formula-row"><span class="formula-lhs">Number of newborns</span><span class="formula-eq">=</span><span class="formula-rhs">available stock − opening stock</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>%, opening in percent</li><li>%, opening in percent</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Animal mortality rate calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Putting a biological quantity into a scale you can picture</li><li>Any time the same 4 figures keep coming back — the available stock, number of animals sold and the mortality rate — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Keep the units you enter consistent. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/annealing-temperature">Annealing temperature</a>, <a href="/biology/bacteria-growth">Bacteria growth</a> and <a href="/biology/basal-area">Basal area</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Animal mortality rate calculator work out?', 'a' => <<<'TXT'
            It returns number of deaths, derived from the available stock, number of animals sold and the mortality rate. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Animal mortality rate calculator?', 'a' => <<<'TXT'
            The form asks for the available stock, number of animals sold, the mortality rate and the cumulative mortality, which is 6 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter mortality rate in a different unit?', 'a' => <<<'TXT'
            Yes. Mortality rate opens in percent and the chip beside it offers 6 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the Animal mortality rate calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/annealing-temperature', 'name' => 'Annealing temperature'],
            ['path' => '/biology/bacteria-growth', 'name' => 'Bacteria growth'],
            ['path' => '/biology/basal-area', 'name' => 'Basal area'],
        ],
    ],
];

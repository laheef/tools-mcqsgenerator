<?php

/**
 * Corn yield
 * /biology/corn-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Corn yield',
    'meta' => ['title' => 'Corn yield Calculator — Formula, Units & Example', 'description' => 'Supply the kernels per ear, the ears in a sample, the size of the field and the yield per acre and the Corn yield calculator solves for <strong>size of the…', 'h1' => 'Corn yield Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => '🌽 You will need the results of a 1/1000 acre sample to use this calculator. 💲 Expand the Profit section to find out your total profit!'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kpe',
                            'label' => 'Kernels per ear',
                            'type' => 'number',
                            'help' => 'The average number of kernels per ear based on your sample. A typical ear has around 800 kernels.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '800',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ears',
                            'label' => 'Ears in a sample',
                            'type' => 'number',
                            'help' => 'Number of ears of corn in a 1/1000 acre sample.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Size of the field',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'acre',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'size',
                            'label' => 'Size of the kernels',
                            'type' => 'select',
                            'options' => ['Small' => '120000', 'Medium' => '90000', 'Large' => '80000'],
                            'dataset' => 'sizeDS',
                            'default' => 'Medium',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'corn',
                            'label' => 'Yield per acre',
                            'type' => 'number',
                            'suffix' => 'bushels',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_yield',
                            'label' => 'Total yield',
                            'type' => 'number',
                            'suffix' => 'bushels',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Profit',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price',
                            'label' => 'Price per bushel',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'profit',
                            'label' => 'Profit 💵',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => '(kpe * ears * 1000) / (size) = corn',
            'results' => ['size' => '1000*ears*kpe/corn', 'kpe' => '(1/1000)*corn*size/ears', 'ears' => '(1/1000)*corn*size/kpe', 'corn' => '1000*ears*kpe/size'],
        ],
        [
            'title' => 'corn * area = total_yield',
            'results' => ['total_yield' => 'area*corn', 'area' => 'total_yield/corn', 'corn' => 'total_yield/area'],
        ],
        [
            'title' => 'total_yield * price = profit',
            'results' => ['price' => 'profit/total_yield', 'total_yield' => 'profit/price', 'profit' => 'price*total_yield'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Supply the kernels per ear, the ears in a sample, the size of the field and the yield per acre and the Corn yield calculator solves for <strong>size of the kernels</strong>.
        TXT,
        'sections' => [
            ['title' => 'How does the Corn yield calculator work?', 'html' => <<<'TXT'
            <p>The Corn yield calculator takes the values in the form, applies the relationship described below and reports <strong>size of the kernels</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the kernels per ear, the ears in a sample, the size of the field and the yield per acre.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A measured quantity, entered by default in acres. The unit chip switches it to any of the 24 supported units.</li><li>A number, expressed in bushels.</li><li>A plain number with no unit attached.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Kernels per ear</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Ears in a sample</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Size of the field</strong></td><td>A measured quantity, 24 units available.</td><td>acres</td><td>You supply it</td></tr><tr><td><strong>Size of the kernels</strong></td><td>One of 3 options, such as small, medium and large.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Yield per acre</strong></td><td>A number stated in bushels.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Total yield</strong></td><td>A number stated in bushels.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Price per bushel</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Profit</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Corn yield calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Size of the kernels</span><span class="formula-eq">=</span><span class="formula-rhs">1000 × ears in a sample × kernels per ear ÷ yield per acre</span></div><div class="formula-row"><span class="formula-lhs">Total yield</span><span class="formula-eq">=</span><span class="formula-rhs">size of the field × yield per acre</span></div><div class="formula-row"><span class="formula-lhs">Price per bushel</span><span class="formula-eq">=</span><span class="formula-rhs">profit ÷ total yield</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>The option the calculation settles on.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Area, opening in acres</li><li>Currency, opening in US Dollar</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Corn yield calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li><li>Comparing two organisms, populations or processes</li><li>Any time the same 4 figures keep coming back — the kernels per ear, the ears in a sample and the size of the field — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/cow-gestation">Cow gestation</a>, <a href="/biology/cricket-chirp-thermometer">Crickets chirping thermometer</a> and <a href="/biology/daily-light-integral-dli">Daily light integral (DLI)</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Corn yield calculator work out?', 'a' => <<<'TXT'
            It returns size of the kernels, derived from the kernels per ear, the ears in a sample and the size of the field. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Corn yield calculator?', 'a' => <<<'TXT'
            The form asks for the kernels per ear, the ears in a sample, the size of the field and the yield per acre, which is 5 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter size of the field in a different unit?', 'a' => <<<'TXT'
            Yes. Size of the field opens in acres and the chip beside it offers 24 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Corn yield calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/cow-gestation', 'name' => 'Cow gestation'],
            ['path' => '/biology/cricket-chirp-thermometer', 'name' => 'Crickets chirping thermometer'],
            ['path' => '/biology/daily-light-integral-dli', 'name' => 'Daily light integral (DLI)'],
        ],
    ],
];

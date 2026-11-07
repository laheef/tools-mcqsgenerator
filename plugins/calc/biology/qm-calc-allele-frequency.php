<?php

/**
 * Allele frequency
 * /biology/allele-frequency
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Allele frequency',
    'meta' => ['title' => 'Allele frequency — Formula, Steps & Examples', 'description' => <<<'TXT'
    The Allele frequency calculator returns <strong>healthy allele frequency (p)</strong> from the 2 fields on the form. The Allele frequency calculator takes the…
    TXT, 'h1' => 'Allele frequency Calculator', 'updated' => '2024-07-19'],
    'raw' => [
        'vars' => [
            'a_percentage' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'a_proportion' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'b' => [
                'type' => 'numerical',
                'rnd' => ['standard', '5'],
            ],
            'choice' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'yPeX_tq-wGFJmcq_i6HMj', 'c' => null],
                ],
                'ds' => '4lknRWs5Lxsg-usnWFTNl',
            ],
            'inv_pq' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'p' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'pq' => [
                'type' => 'numerical',
                'rnd' => ['standard', '5'],
            ],
            'q' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'truea' => [
                'type' => 'numerical',
                'rnd' => ['standard', '5'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'NwtGBFWX_Xm1UuLGEzJTF',
                'title' => 'Frequency of the disease in the population',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'choice',
                                    'vt' => 'valueSelect',
                                    'l' => 'Given in: ',
                                    'ds' => '4lknRWs5Lxsg-usnWFTNl',
                                    'opts' => [
                                        ['yPeX_tq-wGFJmcq_i6HMj', 'Proportion', '0'],
                                        ['6yCy7-Mf-OGSkbsLBUmnY', 'Percentage', '1'],
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
                                    't' => 'v',
                                    'n' => 'a_percentage',
                                    'vt' => 'numerical',
                                    'l' => 'Occurrence of the disease: ',
                                    'h' => 'E.g., people with cystic fibrosis constitute 0.00029% of the Caucasian population.&nbsp;',
                                    'us' => '37',
                                    'du' => 'perc',
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
                                    'n' => 'a_proportion',
                                    'vt' => 'numerical',
                                    'l' => 'Occurrence of the disease:',
                                    'pre' => '1 in ',
                                    'h' => 'For example, people with cystic fibrosis constitute 1 in 3500 of the Caucasian population.&nbsp;',
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
                                        ['choice == 1', '{{a_percentage.formattedValue}}% = 1 in {{a_proportion.formattedValue}} people&nbsp;'],
                                        ['choice == 0', '1 in {{a_proportion.formattedValue}} people = {{a_percentage.formattedValue}}%'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'sdPEn0laE49spDKic5Z4h',
                'title' => 'Allele frequency',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'p',
                                    'vt' => 'numerical',
                                    'l' => 'Healthy allele frequency (p)',
                                    'h' => 'So-called "wild type allele".',
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
                                    'n' => 'q',
                                    'vt' => 'numerical',
                                    'l' => 'Mutant allele frequency (q)',
                                    'h' => 'The recessive allele that carries the disease.',
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
                                        [null, <<<'TXT'
                                        Carrier frequency: The mutant allele is present in 1 out of {{inv_pq.formattedValue}} people. Our calculations: People with two healthy alleles: p² = {{b.formattedValue}} People with one healthy, and one mutant allele: 2pq = {{pq.formattedValue}} People with two mutant alleles: q² = {{truea.formattedValue}}
                                        TXT],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '_lPDv7Kew7xorjVY7pdwb',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1_FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'truea', 'vt' => 'numerical', 'l' => 'Truea'],
                            ],
                            [
                                ['t' => 'v', 'n' => 'b', 'vt' => 'numerical', 'l' => 'B'],
                            ],
                        ],
                    ],
                    [
                        'FR1_FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'pq', 'vt' => 'numerical', 'l' => '2pq'],
                            ],
                            [
                                ['t' => 'v', 'n' => 'inv_pq', 'vt' => 'numerical', 'l' => '1/2pq'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'p^2+ (2*p*q)+ q^2 = 1',
                'var' => [
                    [
                        'l' => 'p',
                        'f' => '-q - 1',
                        'r' => ['q'],
                    ],
                    [
                        'l' => 'q',
                        'f' => '-p - 1',
                        'r' => ['p'],
                    ],
                ],
            ],
            [
                'formula' => '1/a_percentage = a_proportion',
                'var' => [
                    [
                        'l' => 'a_percentage',
                        'f' => '1/a_proportion',
                        'r' => ['a_proportion'],
                    ],
                    [
                        'l' => 'a_proportion',
                        'f' => '1/a_percentage',
                        'r' => ['a_percentage'],
                    ],
                ],
            ],
            [
                'formula' => '(q^2) = a_percentage',
                'var' => [
                    [
                        'l' => 'a_percentage',
                        'f' => 'pow(q, 2)',
                        'r' => ['q'],
                    ],
                    [
                        'l' => 'q',
                        'f' => 'sqrt(a_percentage)',
                        'r' => ['a_percentage'],
                    ],
                ],
            ],
            [
                'formula' => '(p^2) = b',
                'var' => [
                    [
                        'l' => 'p',
                        'f' => 'sqrt(b)',
                        'r' => ['b'],
                    ],
                    [
                        'l' => 'b',
                        'f' => 'pow(p, 2)',
                        'r' => ['p'],
                    ],
                ],
            ],
            [
                'formula' => 'p + q = 1',
                'var' => [
                    [
                        'l' => 'p',
                        'f' => '1 - q',
                        'r' => ['q'],
                    ],
                    [
                        'l' => 'q',
                        'f' => '1 - p',
                        'r' => ['p'],
                    ],
                ],
            ],
            [
                'formula' => 'truea = 1 / a_proportion',
                'var' => [
                    [
                        'l' => 'truea',
                        'f' => '1/a_proportion',
                        'r' => ['a_proportion'],
                    ],
                    [
                        'l' => 'a_proportion',
                        'f' => '1/truea',
                        'r' => ['truea'],
                    ],
                ],
            ],
            [
                'formula' => 'pq= 2*p*q',
                'var' => [
                    [
                        'l' => 'pq',
                        'f' => '2*p*q',
                        'r' => ['p', 'q'],
                    ],
                    [
                        'l' => 'p',
                        'f' => '(1/2)*pq/q',
                        'r' => ['pq', 'q'],
                    ],
                    [
                        'l' => 'q',
                        'f' => '(1/2)*pq/p',
                        'r' => ['pq', 'p'],
                    ],
                ],
            ],
            [
                'formula' => 'inv_pq = 1/pq',
                'var' => [
                    [
                        'l' => 'inv_pq',
                        'f' => '1/pq',
                        'r' => ['pq'],
                    ],
                    [
                        'l' => 'pq',
                        'f' => '1/inv_pq',
                        'r' => ['inv_pq'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '4lknRWs5Lxsg-usnWFTNl' => [
                'name' => 'given in',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'yPeX_tq-wGFJmcq_i6HMj', 'label' => 'Proportion', 'value' => '0'],
                    ['uid' => '6yCy7-Mf-OGSkbsLBUmnY', 'label' => 'Percentage', 'value' => '1'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => 'The Allele frequency calculator returns <strong>healthy allele frequency (p)</strong> from the 2 fields on the form.',
        'sections' => [
            ['title' => 'How does the Allele frequency calculator work?', 'html' => <<<'TXT'
            <p>The Allele frequency calculator takes the values in the form, applies the relationship described below and reports <strong>healthy allele frequency (p)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case; then you type in the figures it asks for.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as proportion and percentage. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</li><li>A plain number with no unit attached.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Healthy allele frequency (p)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Mutant allele frequency (q)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Calculated ratio</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Allele frequency calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Healthy allele frequency (p)</span><span class="formula-eq">=</span><span class="formula-rhs">-mutant allele frequency (q) − 1</span></div><div class="formula-row"><span class="formula-lhs">Occurrence of the disease</span><span class="formula-eq">=</span><span class="formula-rhs">1 ÷ occurrence of the disease</span></div><div class="formula-row"><span class="formula-lhs">Occurrence of the disease</span><span class="formula-eq">=</span><span class="formula-rhs">(mutant allele frequency (q) ^ 2)</span></div><div class="formula-row"><span class="formula-lhs">Healthy allele frequency (p)</span><span class="formula-eq">=</span><span class="formula-rhs">the square root of (B)</span></div><div class="formula-row"><span class="formula-lhs">Healthy allele frequency (p)</span><span class="formula-eq">=</span><span class="formula-rhs">1 − mutant allele frequency (q)</span></div><div class="formula-row"><span class="formula-lhs">Calculated ratio</span><span class="formula-eq">=</span><span class="formula-rhs">1 ÷ occurrence of the disease</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>%, opening in percent</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Allele frequency calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two organisms, populations or processes</li><li>Putting a biological quantity into a scale you can picture</li><li>Supporting a lesson, a lecture or a field note</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li><li>Keep the units you enter consistent. </li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/animal-mortality-rate">Animal mortality rate</a>, <a href="/biology/annealing-temperature">Annealing temperature</a> and <a href="/biology/bacteria-growth">Bacteria growth</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Allele frequency calculator work out?', 'a' => <<<'TXT'
            It returns healthy allele frequency (p). Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Allele frequency calculator?', 'a' => <<<'TXT'
            The form asks for a few values, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter occurrence of the disease (Frequency of the disease in the population) in a different unit?', 'a' => <<<'TXT'
            Yes. Occurrence of the disease (Frequency of the disease in the population) opens in percent and the chip beside it offers 6 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => <<<'TXT'
            There is one choice to make (1 in total), and each one selects a different case rather than scaling the result. Switching a single option and watching the result is the fastest way to see how much that choice is worth.
            TXT],
            ['q' => 'Is the Allele frequency calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/animal-mortality-rate', 'name' => 'Animal mortality rate'],
            ['path' => '/biology/annealing-temperature', 'name' => 'Annealing temperature'],
            ['path' => '/biology/bacteria-growth', 'name' => 'Bacteria growth'],
        ],
    ],
];

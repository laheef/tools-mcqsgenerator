<?php

/**
 * Metacam dosage for cats
 * /biology/metacam-dosage-cat
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Metacam dosage for cats',
    'meta' => ['title' => 'Metacam dosage for cats — Free Online Calculator', 'description' => 'Metacam dosage for cats takes Your cat\'s weight and Dosage for the first 24 hours and returns Indication and Volume needed. The chip beside Your cat&#039;s…', 'h1' => 'Metacam dosage for cats Calculator', 'updated' => '2026-08-10'],
    'raw' => [
        'vars' => [
            'dosage' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'drops_needed' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'indication' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'i9ndlAJtFYR7cOkFJvzsb', 'c' => null],
                ],
                'ds' => 'dD9WeVimz-lXfr6TYdzvf',
            ],
            'later_dosage' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'later_drops' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'volume_needed' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'yblO90NXZ3uekwT7e5cM5',
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
                                    'l' => 'Your cat\'s weight',
                                    'us' => '22',
                                    'du' => 'kg',
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
                                    'n' => 'indication',
                                    'vt' => 'valueSelect',
                                    'l' => 'Indication',
                                    'ds' => 'dD9WeVimz-lXfr6TYdzvf',
                                    'opts' => [
                                        ['i9ndlAJtFYR7cOkFJvzsb', 'Post-operative pain', '0.2001'],
                                        ['1BT8FL17srjSj1aPauUs1', 'Acute musculo-skeletal disorders', '0.2'],
                                        ['3B4MriKDStmdPziCuQ1rn', 'Chronic musculo-skeletal disorders', '0.1'],
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
                                        ['indication == 0.2001', '💉 Before the surgery: use the 2&nbsp;mg/mL solution. 💊 After the surgery: use the 0.5&nbsp;mg/mL solution.&nbsp;'],
                                        ['indication == 0.2', '💉 Entire treatment: use the 0.5&nbsp;mg/mL solution.&nbsp;'],
                                        ['indication == 0.1', '💉 Entire treatment: use the 0.5&nbsp;mg/mL solution.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'UKQOuWVayVbrzRQWhP4YO',
                'title' => 'First 24 hours',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'dosage',
                                    'vt' => 'numerical',
                                    'l' => 'Dosage for the first 24 hours',
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
                                    'n' => 'volume_needed',
                                    'vt' => 'numerical',
                                    'l' => 'Volume needed',
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
                                    'n' => 'drops_needed',
                                    'vt' => 'numerical',
                                    'l' => 'Drops needed',
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
                                    't' => 'x',
                                    'c' => [
                                        ['indication == 0.2001', '• Typical dosage: 0.2&nbsp;mg/kg with a 2&nbsp;mg/mL solution. • Single subcutaneous injection.&nbsp;'],
                                        ['indication == 0.2', '• Typical dosage: 0.2&nbsp;mg/kg, orally. • Single oral dose.&nbsp;'],
                                        ['indication == 0.1', '• Typical dosage: 0.1&nbsp;mg/kg, orally. • Single oral dose.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'RPeAMItgap5nnaSWB2sca',
                'title' => 'Following treatment',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'later_dosage',
                                    'vt' => 'numerical',
                                    'l' => 'Dosage after 24 hours',
                                    'h' => 'Typical treatment for a longer period of time.&nbsp;',
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
                                    'n' => 'later_drops',
                                    'vt' => 'numerical',
                                    'l' => 'Drops needed',
                                    'suf' => '#',
                                    'h' => 'Drops needed for the typical, prolonged treatment.',
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
                                        ['indication == 0.2001', '• Typical dosage: 0.05&nbsp;mg/kg, orally. • 24-hour intervals. • Up to 4&nbsp;days.&nbsp;'],
                                        ['indication == 0.2', '• Typical dosage:0.05&nbsp;mg/kg, orally. • 24-hour intervals. • As long as the acute pain persists.&nbsp;'],
                                        ['indication == 0.1', <<<'TXT'
                                        • Typical dosage: 0.05&nbsp;mg/kg, orally. • 24-hour intervals. • Clinical response should be seen within 7&nbsp;days; discontinue treatment after 14&nbsp;days if no improvement.
                                        TXT],
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
                'formula' => 'weight* indication = dosage',
                'var' => [
                    [
                        'l' => 'indication',
                        'f' => 'dosage/weight',
                        'r' => ['weight', 'dosage'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => 'dosage/indication',
                        'r' => ['indication', 'dosage'],
                    ],
                    [
                        'l' => 'dosage',
                        'f' => 'indication*weight',
                        'r' => ['indication', 'weight'],
                    ],
                ],
            ],
            [
                'formula' => 'dosage * 60 = drops_needed',
                'var' => [
                    [
                        'l' => 'drops_needed',
                        'f' => '60*dosage',
                        'r' => ['dosage'],
                    ],
                    [
                        'l' => 'dosage',
                        'f' => '(1/60)*drops_needed',
                        'r' => ['drops_needed'],
                    ],
                ],
            ],
            [
                'formula' => 'later_dosage = weight * 0.05',
                'var' => [
                    [
                        'l' => 'later_dosage',
                        'f' => '(1/20)*weight',
                        'r' => ['weight'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => '20*later_dosage',
                        'r' => ['later_dosage'],
                    ],
                ],
            ],
            [
                'formula' => 'later_drops = later_dosage * 60',
                'var' => [
                    [
                        'l' => 'later_dosage',
                        'f' => '(1/60)*later_drops',
                        'r' => ['later_drops'],
                    ],
                    [
                        'l' => 'later_drops',
                        'f' => '60*later_dosage',
                        'r' => ['later_dosage'],
                    ],
                ],
            ],
            [
                'formula' => 'volume_needed= dosage/2',
                'var' => [
                    [
                        'l' => 'dosage',
                        'f' => '2*volume_needed',
                        'r' => ['volume_needed'],
                    ],
                    [
                        'l' => 'volume_needed',
                        'f' => '(1/2)*dosage',
                        'r' => ['dosage'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'dD9WeVimz-lXfr6TYdzvf' => [
                'name' => 'indication',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'i9ndlAJtFYR7cOkFJvzsb', 'label' => 'Post-operative pain', 'value' => '0.2001'],
                    ['uid' => '1BT8FL17srjSj1aPauUs1', 'label' => 'Acute musculo-skeletal disorders', 'value' => '0.2'],
                    ['uid' => '3B4MriKDStmdPziCuQ1rn', 'label' => 'Chronic musculo-skeletal disorders', 'value' => '0.1'],
                ],
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Metacam dosage for cats takes Your cat's weight and Dosage for the first 24 hours and returns Indication and Volume needed. It is a single relationship that reads Indication out of Your cat's weight, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Metacam dosage for cats calculator works', 'html' => <<<'TXT'
            <p>The Metacam dosage for cats calculator applies one relationship to 2 numbers and reports Indication, Volume needed and Drops needed.</p><p>Written with the labels from the form, Indication = Dosage for the first 24 hours ÷ Your cat&#039;s weight.</p><p>The result panel carries Indication, Volume needed, Drops needed and Dosage after 24 hours, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Your cat&#039;s weight</strong> — in kilograms</li><li><strong>Dosage for the first 24 hours</strong> — in milligrams</li></ul><p>The answers come back as Indication, Volume needed in milliliters, Drops needed in #, Dosage after 24 hours in milligrams, Drops needed in #. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Your cat&amp;#039;s weight = 10 kg and Dosage for the first 24 hours = 100 mg — through the same formula and the panel reports &lt;strong&gt;Indication&lt;/strong&gt; = 0.2001, &lt;strong&gt;Drops needed&lt;/strong&gt; = 6000 #, &lt;strong&gt;Dosage after 24 hours&lt;/strong&gt; = 0.5 mg, &lt;strong&gt;Drops needed&lt;/strong&gt; = 30 # and &lt;strong&gt;Volume needed&lt;/strong&gt; = 50 ml.</p><ul><li><strong>Indication</strong> = 0.2001</li><li><strong>Drops needed</strong> = 6000 #</li><li><strong>Dosage after 24 hours</strong> = 0.5 mg</li><li><strong>Drops needed</strong> = 30 #</li><li><strong>Volume needed</strong> = 50 ml</li></ul><p>The line behind those figures is <strong>Indication</strong> = <code>Dosage for the first 24 hours ÷ Your cat&#039;s weight</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Indication&lt;/strong&gt; = 0.2001, &lt;strong&gt;Drops needed&lt;/strong&gt; = 6000, &lt;strong&gt;Dosage after 24 hours&lt;/strong&gt; = 0.5, &lt;strong&gt;Drops needed&lt;/strong&gt; = 30 and &lt;strong&gt;Volume needed&lt;/strong&gt; = 50 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Volume needed offers 40 units and opens on milliliters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Indication</strong> = <code>Dosage for the first 24 hours ÷ Your cat&#039;s weight</code></li><li><strong>Your cat&#039;s weight</strong> = <code>Dosage for the first 24 hours ÷ Indication</code></li><li><strong>Dosage for the first 24 hours</strong> = <code>Indication × Your cat&#039;s weight</code></li><li><strong>Drops needed</strong> = <code>60 × Dosage for the first 24 hours</code></li><li><strong>Dosage after 24 hours</strong> = <code>(1 ÷ 20) × Your cat&#039;s weight</code></li><li><strong>Volume needed</strong> = <code>(1 ÷ 2) × Dosage for the first 24 hours</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Indication, Your cat&#039;s weight and Dosage for the first 24 hours can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Your cat&#039;s weight from 10 to 20, leaving every other box alone. The panel moves from &lt;strong&gt;Indication&lt;/strong&gt; 0.2001, &lt;strong&gt;Drops needed&lt;/strong&gt; 6000 #, &lt;strong&gt;Dosage after 24 hours&lt;/strong&gt; 0.5 mg, &lt;strong&gt;Drops needed&lt;/strong&gt; 30 # and &lt;strong&gt;Volume needed&lt;/strong&gt; 50 ml to &lt;strong&gt;Indication&lt;/strong&gt; 0.2001, &lt;strong&gt;Drops needed&lt;/strong&gt; 6000 #, &lt;strong&gt;Dosage after 24 hours&lt;/strong&gt; 1 mg, &lt;strong&gt;Drops needed&lt;/strong&gt; 60 # and &lt;strong&gt;Volume needed&lt;/strong&gt; 50 ml.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Your cat&#039;s weight and Dosage for the first 24 hours is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Indication, Volume needed and Drops needed are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Your cat&#039;s weight is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Your cat&#039;s weight and Dosage for the first 24 hours measured, Indication and Volume needed wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dog-crate-size">Dog crate size</a>, <a href="/biology/dog-food">Dog food Calculator</a> and <a href="/biology/dog-harness-size">Dog harness size</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Metacam dosage for cats calculator work out?', 'a' => <<<'TXT'
            Indication, Volume needed, Drops needed and Dosage after 24 hours, from Your cat's weight and Dosage for the first 24 hours. The relationship is Indication = Dosage for the first 24 hours ÷ Your cat's weight.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Your cat's weight (kilograms), Dosage for the first 24 hours (milligrams). Enter weight and dosage; Indication is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Indication, Your cat's weight, Dosage for the first 24 hours and Drops needed can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Indication = 0.2001, Drops needed = 6000 #, Dosage after 24 hours = 0.5 mg, Drops needed = 30 # and Volume needed = 50 ml. That comes from the page's own defaults, entered in Your cat's weight; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Indication is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Your cat\'s weight blank and the page solves for it, reporting Indication instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Indication keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dog-crate-size', 'name' => 'Dog crate size'],
            ['path' => '/biology/dog-food', 'name' => 'Dog food Calculator'],
            ['path' => '/biology/dog-harness-size', 'name' => 'Dog harness size'],
        ],
        'authors' => [],
    ],
];

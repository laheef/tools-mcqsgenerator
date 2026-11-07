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
    'meta' => ['title' => 'Metacam dosage for cats — Free Online Calculator', 'description' => 'Metacam dosage for cats turns your cat\'s weight and indication into dosage for the first 24 hours. Every box can be solved for, not only the one in the title.', 'h1' => 'Metacam dosage for cats Calculator', 'updated' => '2026-08-10'],
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
                                        ['indication == 0.2001', ' Before the surgery: use the 2&nbsp;mg/mL solution.  After the surgery: use the 0.5&nbsp;mg/mL solution.&nbsp;'],
                                        ['indication == 0.2', ' Entire treatment: use the 0.5&nbsp;mg/mL solution.&nbsp;'],
                                        ['indication == 0.1', ' Entire treatment: use the 0.5&nbsp;mg/mL solution.'],
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
        Metacam dosage for cats takes Your cat's weight and returns Indication and Dosage for the first 24 hours. It is a single relationship that reads indication out of your cat's weight, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Metacam dosage for cats calculator works', 'html' => <<<'TXT'
            <p>The Metacam dosage for cats calculator applies one relationship to 1 number and reports Indication, Dosage for the first 24 hours and Volume needed.</p><p>Written with the labels from the form, Indication = Dosage for the first 24 hours ÷ Your cat&#039;s weight.</p><p>The result panel carries Indication, Dosage for the first 24 hours, Volume needed and Drops needed, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Your cat&#039;s weight</strong> — in kilograms</li></ul><p>The answers come back as Indication, Dosage for the first 24 hours in milligrams, Volume needed in milliliters, Drops needed in #, Dosage after 24 hours in milligrams, Drops needed in #. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Your cat&amp;#039;s weight = 10 kg — through the same formula and the panel reports <strong>Indication</strong> = 0.2, <strong>Dosage for the first 24 hours</strong> = 2 mg, <strong>Drops needed</strong> = 120 #, <strong>Dosage after 24 hours</strong> = 0.5 mg, <strong>Drops needed</strong> = 30 # and <strong>Volume needed</strong> = 1 ml.</p><ul><li><strong>Indication</strong> = 0.2</li><li><strong>Dosage for the first 24 hours</strong> = 2 mg</li><li><strong>Drops needed</strong> = 120 #</li><li><strong>Dosage after 24 hours</strong> = 0.5 mg</li><li><strong>Drops needed</strong> = 30 #</li><li><strong>Volume needed</strong> = 1 ml</li></ul><p>The line behind those figures is <strong>Indication</strong> = <code>Dosage for the first 24 hours ÷ Your cat&#039;s weight</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Indication</strong> = 0.2, <strong>Dosage for the first 24 hours</strong> = 2, <strong>Drops needed</strong> = 120, <strong>Dosage after 24 hours</strong> = 0.5, <strong>Drops needed</strong> = 30 and <strong>Volume needed</strong> = 1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Dosage for the first 24 hours offers 27 units and opens on milligrams, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Indication</strong> = <code>Dosage for the first 24 hours ÷ Your cat&#039;s weight</code></li><li><strong>Your cat&#039;s weight</strong> = <code>Dosage for the first 24 hours ÷ Indication</code></li><li><strong>Dosage for the first 24 hours</strong> = <code>Indication × Your cat&#039;s weight</code></li><li><strong>Drops needed</strong> = <code>60 × Dosage for the first 24 hours</code></li><li><strong>Dosage after 24 hours</strong> = <code>(1 ÷ 20) × Your cat&#039;s weight</code></li><li><strong>Volume needed</strong> = <code>(1 ÷ 2) × Dosage for the first 24 hours</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Indication</strong> = <code>Dosage for the first 24 hours ÷ Your cat&#039;s weight</code> — the form to use when Your cat&#039;s weight and Dosage for the first 24 hours are the values you have.</li><li><strong>Your cat&#039;s weight</strong> = <code>Dosage for the first 24 hours ÷ Indication</code> — the form to use when Indication and Dosage for the first 24 hours are the values you have.</li><li><strong>Dosage for the first 24 hours</strong> = <code>Indication × Your cat&#039;s weight</code> — the form to use when Indication and Your cat&#039;s weight are the values you have.</li><li><strong>Drops needed</strong> = <code>60 × Dosage for the first 24 hours</code> — the form to use when Dosage for the first 24 hours are the values you have.</li><li><strong>Dosage for the first 24 hours</strong> = <code>(1 ÷ 60) × Drops needed</code> — the form to use when Drops needed are the values you have.</li><li><strong>Dosage after 24 hours</strong> = <code>(1 ÷ 20) × Your cat&#039;s weight</code> — the form to use when Your cat&#039;s weight are the values you have.</li><li><strong>Your cat&#039;s weight</strong> = <code>20 × Dosage after 24 hours</code> — the form to use when Dosage after 24 hours are the values you have.</li><li><strong>Drops needed</strong> = <code>60 × Dosage after 24 hours</code> — the form to use when Dosage after 24 hours are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Indication, Your cat&#039;s weight and Dosage for the first 24 hours can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Your cat&#039;s weight from 10 to 20, leaving every other box alone. The panel moves from <strong>Indication</strong> 0.2, <strong>Dosage for the first 24 hours</strong> 2 mg, <strong>Drops needed</strong> 120 #, <strong>Dosage after 24 hours</strong> 0.5 mg, <strong>Drops needed</strong> 30 # and <strong>Volume needed</strong> 1 ml to <strong>Indication</strong> 0.2, <strong>Dosage for the first 24 hours</strong> 4 mg, <strong>Drops needed</strong> 240 #, <strong>Dosage after 24 hours</strong> 1 mg, <strong>Drops needed</strong> 60 # and <strong>Volume needed</strong> 2 ml.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Your cat&#039;s weight is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Indication, Dosage for the first 24 hours and Volume needed are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Your cat&#039;s weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Your cat&amp;#039;s weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Your cat&#039;s weight is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Metacam dosage for cats form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Your cat&#039;s weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. Change it and Indication, Dosage for the first 24 hours and Dosage after 24 hours changes with it. Fill it from a measurement rather than a memory — Your cat&#039;s weight is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Indication</strong> is a plain number and the page's own defaults put it at 0.2. It is worked out from Your cat's weight and Dosage for the first 24 hours. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Dosage for the first 24 hours</strong> is a milligrams figure and the page's own defaults put it at 2 mg. It is worked out from Indication and Your cat's weight. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Volume needed</strong> is a milliliters figure and the page's own defaults put it at 1 ml. It is worked out from Dosage for the first 24 hours. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Drops needed</strong> is a plain number and the page's own defaults put it at 120. It is worked out from Dosage for the first 24 hours. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Dosage after 24 hours</strong> is a milligrams figure and the page's own defaults put it at 0.5 mg. It is worked out from Your cat's weight. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Drops needed</strong> is a plain number and the page's own defaults put it at 30. It is worked out from Dosage after 24 hours. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Indication</th><th>Dosage for the first 24 hours</th><th>Drops needed</th><th>Dosage after 24 hours</th><th>Drops needed</th><th>Volume needed</th></tr></thead><tbody><tr><td><strong>Your cat&#039;s weight</strong> +10%</td><td>+0%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Your cat&#039;s weight sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Metacam dosage for cats actually offers.</p><ul><li><strong>kilograms</strong> — 27 units. It opens in <em>kg</em>, and the chip also carries lb, mg, g, oz, t and ng. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>milliliters</strong> — 40 units. It opens in <em>ml</em>, and the chip also carries m³, cu ft, US fl oz, L, dm³ and cu in. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Indication follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms and milliliters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Your cat&#039;s weight are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Your cat&#039;s weight measured, Indication and Dosage for the first 24 hours wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dog-crate-size">Dog crate size</a>, <a href="/biology/dog-food">Dog food Calculator</a> and <a href="/biology/dog-harness-size">Dog harness size</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Metacam dosage for cats calculator work out?', 'a' => <<<'TXT'
            Indication, Dosage for the first 24 hours, Volume needed and Drops needed, from Your cat's weight and Dosage for the first 24 hours. The relationship is Indication = Dosage for the first 24 hours ÷ Your cat's weight.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Your cat\'s weight (kilograms). Enter your cat\'s weight; Indication is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Indication, Your cat's weight, Dosage for the first 24 hours and Drops needed can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Indication = 0.2, Dosage for the first 24 hours = 2 mg, Drops needed = 120 #, Dosage after 24 hours = 0.5 mg, Drops needed = 30 # and Volume needed = 1 ml. That comes from the page's own defaults, entered in Your cat's weight; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Indication is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
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

<?php

/**
 * Cat quality of life
 * /biology/cat-quality-of-life
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cat quality of life',
    'meta' => ['title' => 'Cat quality of life: Formula, Steps & Results', 'description' => 'Cat quality of life takes Hurt, Hunger and Hydration and returns Quality of life score. The arithmetic is the whole method: Quality of life score is worked…', 'h1' => 'Cat quality of life Calculator', 'updated' => '2026-07-23'],
    'raw' => [
        'vars' => [
            'days' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'SS2XgPaqlNvwlBBURKTMS', 'c' => null],
                ],
                'ds' => 'wt1ODljx_oIWh6OA__HbM',
            ],
            'happiness' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'SS2XgPaqlNvwlBBURKTMS', 'c' => null],
                ],
                'ds' => 'wt1ODljx_oIWh6OA__HbM',
            ],
            'hunger' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'SS2XgPaqlNvwlBBURKTMS', 'c' => null],
                ],
                'ds' => 'wt1ODljx_oIWh6OA__HbM',
            ],
            'hurt' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'SS2XgPaqlNvwlBBURKTMS', 'c' => null],
                ],
                'ds' => 'wt1ODljx_oIWh6OA__HbM',
            ],
            'hydration' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'SS2XgPaqlNvwlBBURKTMS', 'c' => null],
                ],
                'ds' => 'wt1ODljx_oIWh6OA__HbM',
            ],
            'hygiene' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'SS2XgPaqlNvwlBBURKTMS', 'c' => null],
                ],
                'ds' => 'wt1ODljx_oIWh6OA__HbM',
            ],
            'mobility' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'SS2XgPaqlNvwlBBURKTMS', 'c' => null],
                ],
                'ds' => 'wt1ODljx_oIWh6OA__HbM',
            ],
            'sum_total' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => '3KRMsZt-2najZwJzKUt9j',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, <<<'TXT'
                                        You can use this Quality of Life (QOL) Scale to determine your beloved cat's quality of life, and assess whether to proceed with hospice care or to consider euthanasia. For each item below, score your pet on a scale of 1 to 10, where 1 is unacceptable and 10 is excellent.
                                        TXT],
                                    ],
                                ],
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'To learn more about the scale and each item, see the "How is quality of life measured for cats?" section in the article.'],
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
                                    'n' => 'hurt',
                                    'vt' => 'valueSelect',
                                    'l' => 'Hurt  ',
                                    'h' => 'Is your cat\'s pain under adequate control?',
                                    'ds' => 'wt1ODljx_oIWh6OA__HbM',
                                    'opts' => [
                                        ['u6A6KohvHvINpKMr6aoXD', '1', '1'],
                                        ['QOA9k6O82M9MAPYLe82jY', '2', '2'],
                                        ['crawt8292GWtS4FGAoM-F', '3', '3'],
                                        ['xr2oj07lPMfKatR5YELky', '4', '4'],
                                        ['TFKpHh2rPxA5rotwuuWt2', '5', '5'],
                                        ['3dYDPOgAYGSumWQAmvWiP', '6', '6'],
                                        ['puH7C6lyFAkn1w5yXy7Zv', '7', '7'],
                                        ['6KhqfKTRq5WEFBhxELurv', '8', '8'],
                                        ['wmkUplOaY-3uDoQdbWG5U', '9', '9'],
                                        ['SS2XgPaqlNvwlBBURKTMS', '10', '10'],
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
                                    'n' => 'hunger',
                                    'vt' => 'valueSelect',
                                    'l' => 'Hunger  ',
                                    'h' => 'Is your cat eating enough? Do you need to hand-feed them?',
                                    'ds' => 'wt1ODljx_oIWh6OA__HbM',
                                    'opts' => [
                                        ['u6A6KohvHvINpKMr6aoXD', '1', '1'],
                                        ['QOA9k6O82M9MAPYLe82jY', '2', '2'],
                                        ['crawt8292GWtS4FGAoM-F', '3', '3'],
                                        ['xr2oj07lPMfKatR5YELky', '4', '4'],
                                        ['TFKpHh2rPxA5rotwuuWt2', '5', '5'],
                                        ['3dYDPOgAYGSumWQAmvWiP', '6', '6'],
                                        ['puH7C6lyFAkn1w5yXy7Zv', '7', '7'],
                                        ['6KhqfKTRq5WEFBhxELurv', '8', '8'],
                                        ['wmkUplOaY-3uDoQdbWG5U', '9', '9'],
                                        ['SS2XgPaqlNvwlBBURKTMS', '10', '10'],
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
                                    'n' => 'hydration',
                                    'vt' => 'valueSelect',
                                    'l' => 'Hydration ',
                                    'h' => 'Is your cat hydrated? Do they need subcutaneous fluids to stay hydrated?',
                                    'ds' => 'wt1ODljx_oIWh6OA__HbM',
                                    'opts' => [
                                        ['u6A6KohvHvINpKMr6aoXD', '1', '1'],
                                        ['QOA9k6O82M9MAPYLe82jY', '2', '2'],
                                        ['crawt8292GWtS4FGAoM-F', '3', '3'],
                                        ['xr2oj07lPMfKatR5YELky', '4', '4'],
                                        ['TFKpHh2rPxA5rotwuuWt2', '5', '5'],
                                        ['3dYDPOgAYGSumWQAmvWiP', '6', '6'],
                                        ['puH7C6lyFAkn1w5yXy7Zv', '7', '7'],
                                        ['6KhqfKTRq5WEFBhxELurv', '8', '8'],
                                        ['wmkUplOaY-3uDoQdbWG5U', '9', '9'],
                                        ['SS2XgPaqlNvwlBBURKTMS', '10', '10'],
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
                                    'n' => 'hygiene',
                                    'vt' => 'valueSelect',
                                    'l' => 'Hygiene  ',
                                    'h' => 'Does your cat need to be cleaned, especially after elimination?',
                                    'ds' => 'wt1ODljx_oIWh6OA__HbM',
                                    'opts' => [
                                        ['u6A6KohvHvINpKMr6aoXD', '1', '1'],
                                        ['QOA9k6O82M9MAPYLe82jY', '2', '2'],
                                        ['crawt8292GWtS4FGAoM-F', '3', '3'],
                                        ['xr2oj07lPMfKatR5YELky', '4', '4'],
                                        ['TFKpHh2rPxA5rotwuuWt2', '5', '5'],
                                        ['3dYDPOgAYGSumWQAmvWiP', '6', '6'],
                                        ['puH7C6lyFAkn1w5yXy7Zv', '7', '7'],
                                        ['6KhqfKTRq5WEFBhxELurv', '8', '8'],
                                        ['wmkUplOaY-3uDoQdbWG5U', '9', '9'],
                                        ['SS2XgPaqlNvwlBBURKTMS', '10', '10'],
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
                                    'n' => 'happiness',
                                    'vt' => 'valueSelect',
                                    'l' => 'Happiness ',
                                    'h' => 'Does your cat express joy and show other emotional signs?',
                                    'ds' => 'wt1ODljx_oIWh6OA__HbM',
                                    'opts' => [
                                        ['u6A6KohvHvINpKMr6aoXD', '1', '1'],
                                        ['QOA9k6O82M9MAPYLe82jY', '2', '2'],
                                        ['crawt8292GWtS4FGAoM-F', '3', '3'],
                                        ['xr2oj07lPMfKatR5YELky', '4', '4'],
                                        ['TFKpHh2rPxA5rotwuuWt2', '5', '5'],
                                        ['3dYDPOgAYGSumWQAmvWiP', '6', '6'],
                                        ['puH7C6lyFAkn1w5yXy7Zv', '7', '7'],
                                        ['6KhqfKTRq5WEFBhxELurv', '8', '8'],
                                        ['wmkUplOaY-3uDoQdbWG5U', '9', '9'],
                                        ['SS2XgPaqlNvwlBBURKTMS', '10', '10'],
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
                                    'n' => 'mobility',
                                    'vt' => 'valueSelect',
                                    'l' => 'Mobility ',
                                    'h' => 'Can your cat get up without assistance? Do they regularly want to go for a walk?',
                                    'ds' => 'wt1ODljx_oIWh6OA__HbM',
                                    'opts' => [
                                        ['u6A6KohvHvINpKMr6aoXD', '1', '1'],
                                        ['QOA9k6O82M9MAPYLe82jY', '2', '2'],
                                        ['crawt8292GWtS4FGAoM-F', '3', '3'],
                                        ['xr2oj07lPMfKatR5YELky', '4', '4'],
                                        ['TFKpHh2rPxA5rotwuuWt2', '5', '5'],
                                        ['3dYDPOgAYGSumWQAmvWiP', '6', '6'],
                                        ['puH7C6lyFAkn1w5yXy7Zv', '7', '7'],
                                        ['6KhqfKTRq5WEFBhxELurv', '8', '8'],
                                        ['wmkUplOaY-3uDoQdbWG5U', '9', '9'],
                                        ['SS2XgPaqlNvwlBBURKTMS', '10', '10'],
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
                                    'n' => 'days',
                                    'vt' => 'valueSelect',
                                    'l' => 'More good days than bad',
                                    'h' => 'Do your cat\'s good days outnumber their bad days?&nbsp;',
                                    'ds' => 'wt1ODljx_oIWh6OA__HbM',
                                    'opts' => [
                                        ['u6A6KohvHvINpKMr6aoXD', '1', '1'],
                                        ['QOA9k6O82M9MAPYLe82jY', '2', '2'],
                                        ['crawt8292GWtS4FGAoM-F', '3', '3'],
                                        ['xr2oj07lPMfKatR5YELky', '4', '4'],
                                        ['TFKpHh2rPxA5rotwuuWt2', '5', '5'],
                                        ['3dYDPOgAYGSumWQAmvWiP', '6', '6'],
                                        ['puH7C6lyFAkn1w5yXy7Zv', '7', '7'],
                                        ['6KhqfKTRq5WEFBhxELurv', '8', '8'],
                                        ['wmkUplOaY-3uDoQdbWG5U', '9', '9'],
                                        ['SS2XgPaqlNvwlBBURKTMS', '10', '10'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'sum_total', 'vt' => 'numerical', 'l' => 'Quality of life score'],
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
                                        ['sum_total <= 35', <<<'TXT'
                                        According to your score, your cat has an unaccaptable quality of life and shouldn't continue with hospice care. This score could serve as a starting point for you to further explore your cat's quality of life with the help of your veterinarian.
                                        TXT],
                                        ['sum_total > 35 and sum_total < 70', 'Your score of {{sum_total.formattedValue}} points indicates an acceptable quality of life for your cat, and that they can continue with hospice care.'],
                                        ['sum_total == 70', 'Your score of {{sum_total.formattedValue}} points is an excellent (purrfect) result! You can confidently continue with cat hospice care 🐈'],
                                        [null, '❗ This tool should not replace the professional recommendation of a veterinarian.'],
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
                'formula' => 'sum_total = one_way(hurt + hunger + hydration + hygiene + happiness + mobility + days)',
                'var' => [
                    [
                        'l' => 'sum_total',
                        'f' => '(days + happiness + hunger + hurt + hydration + hygiene + mobility)',
                        'r' => [
                            'days',
                            'happiness',
                            'hunger',
                            'hurt',
                            'hydration',
                            'hygiene',
                            'mobility',
                        ],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'wt1ODljx_oIWh6OA__HbM' => [
                'name' => 'Scale',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'u6A6KohvHvINpKMr6aoXD', 'label' => '1', 'value' => '1'],
                    ['uid' => 'QOA9k6O82M9MAPYLe82jY', 'label' => '2', 'value' => '2'],
                    ['uid' => 'crawt8292GWtS4FGAoM-F', 'label' => '3', 'value' => '3'],
                    ['uid' => 'xr2oj07lPMfKatR5YELky', 'label' => '4', 'value' => '4'],
                    ['uid' => 'TFKpHh2rPxA5rotwuuWt2', 'label' => '5', 'value' => '5'],
                    ['uid' => '3dYDPOgAYGSumWQAmvWiP', 'label' => '6', 'value' => '6'],
                    ['uid' => 'puH7C6lyFAkn1w5yXy7Zv', 'label' => '7', 'value' => '7'],
                    ['uid' => '6KhqfKTRq5WEFBhxELurv', 'label' => '8', 'value' => '8'],
                    ['uid' => 'wmkUplOaY-3uDoQdbWG5U', 'label' => '9', 'value' => '9'],
                    ['uid' => 'SS2XgPaqlNvwlBBURKTMS', 'label' => '10', 'value' => '10'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cat quality of life takes Hurt, Hunger and Hydration and returns Quality of life score. The arithmetic is the whole method: Quality of life score is worked out from Hurt by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Cat quality of life calculator works', 'html' => <<<'TXT'
            <p>The Cat quality of life calculator applies one relationship to 7 numbers and reports Quality of life score.</p><p>Written with the labels from the form, Quality of life score = (More good days than bad + Happiness + Hunger + Hurt + Hydration + Hygiene + Mobility).</p><p>The answers are Quality of life score; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 7 boxes, and nothing else.</p><ul><li><strong>Hurt</strong> — a plain number, no unit. Is your cat&#039;s pain under adequate control?</li><li><strong>Hunger</strong> — a plain number, no unit. Is your cat eating enough? Do you need to hand-feed them?</li><li><strong>Hydration</strong> — a plain number, no unit. Is your cat hydrated? Do they need subcutaneous fluids to stay hydrated?</li><li><strong>Hygiene</strong> — a plain number, no unit. Does your cat need to be cleaned, especially after elimination?</li><li><strong>Happiness</strong> — a plain number, no unit. Does your cat express joy and show other emotional signs?</li><li><strong>Mobility</strong> — a plain number, no unit. Can your cat get up without assistance? Do they regularly want to go for a walk?</li><li><strong>More good days than bad</strong> — a plain number, no unit. Do your cat&#039;s good days outnumber their bad days?&amp;nbsp;</li></ul><p>What you get back is Quality of life score, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Hurt = 10, Hunger = 10, Hydration = 10, Hygiene = 10, Happiness = 10, Mobility = 10 and More good days than bad = 10 gives &lt;strong&gt;Quality of life score&lt;/strong&gt; = 70.</p><ul><li><strong>Quality of life score</strong> = 70</li></ul><p>The line behind those figures is <strong>Quality of life score</strong> = <code>(More good days than bad + Happiness + Hunger + Hurt + Hydration + Hygiene + Mobility)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Quality of life score&lt;/strong&gt; = 70 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Quality of life score takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Quality of life score</strong> = <code>(More good days than bad + Happiness + Hunger + Hurt + Hydration + Hygiene + Mobility)</code></li></ul>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Hurt, from 10 to 20 — and the answers go from &lt;strong&gt;Quality of life score&lt;/strong&gt; 70 to &lt;strong&gt;Quality of life score&lt;/strong&gt; 80.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Quality of life score is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Hurt left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hurt is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Hunger left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hunger is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Hydration left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hydration is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Hurt is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Hurt</strong> takes a plain number with no unit attached. Is your cat&#039;s pain under adequate control?. Change it and Quality of life score changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Hurt is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hunger</strong> takes a plain number with no unit attached. Is your cat eating enough? Do you need to hand-feed them?. Change it and Quality of life score changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Hunger is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hydration</strong> takes a plain number with no unit attached. Is your cat hydrated? Do they need subcutaneous fluids to stay hydrated?. Change it and Quality of life score changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Hydration is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hygiene</strong> takes a plain number with no unit attached. Does your cat need to be cleaned, especially after elimination?. Change it and Quality of life score changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Hygiene is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Happiness</strong> takes a plain number with no unit attached. Does your cat express joy and show other emotional signs?. Change it and Quality of life score changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Happiness is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Mobility</strong> takes a plain number with no unit attached. Can your cat get up without assistance? Do they regularly want to go for a walk?. Change it and Quality of life score changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Mobility is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>More good days than bad</strong> takes a plain number with no unit attached. Do your cat&#039;s good days outnumber their bad days?&amp;nbsp;. Change it and Quality of life score changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: More good days than bad is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Quality of life score</strong> is a plain number and the page's own defaults put it at 70. It is computed from More good days than bad, Happiness, Hunger and Hurt, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Quality of life score</th></tr></thead><tbody><tr><td><strong>Hurt</strong> +10%</td><td>+1.43%</td></tr><tr><td><strong>Hunger</strong> +10%</td><td>+1.43%</td></tr><tr><td><strong>Hydration</strong> +10%</td><td>+1.43%</td></tr><tr><td><strong>Hygiene</strong> +10%</td><td>+1.43%</td></tr><tr><td><strong>Happiness</strong> +10%</td><td>+1.43%</td></tr><tr><td><strong>Mobility</strong> +10%</td><td>+1.43%</td></tr><tr><td><strong>More good days than bad</strong> +10%</td><td>+1.43%</td></tr></tbody></table><p>Ranked by leverage, Hurt sits at the top — a ten per cent error in that box shows up as roughly 1.4 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Hurt = 5, Hunger = 5, Hydration = 5, Hygiene = 5, Happiness = 5, Mobility = 5 and More good days than bad = 5, the answer is <strong>Quality of life score</strong> = 35.</li><li>With Hurt = 30, Hunger = 10, Hydration = 10, Hygiene = 10, Happiness = 10, Mobility = 10 and More good days than bad = 10, the answer is <strong>Quality of life score</strong> = 90.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Quality of life score follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Hurt, Hunger and Hydration are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Hurt, Hunger and Hydration measured, Quality of life score wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/cat-pregnancy">Cat pregnancy Calculator</a>, <a href="/biology/catch-per-unit-effort">Catch Per Unit Effort Calculator</a> and <a href="/biology/catculator">Catculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat quality of life calculator work out?', 'a' => <<<'TXT'
            Quality of life score, from More good days than bad, Happiness, Hunger and Hurt. The relationship is Quality of life score = (More good days than bad + Happiness + Hunger + Hurt + Hydration + Hygiene + Mobility).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Hurt, Hunger, Hydration, Hygiene, Happiness. Fill hurt, hunger and hydration and leave Quality of life score empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Quality of life score = 70. The figures come from Hurt as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Quality of life score is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Quality of life score, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Quality of life score keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/cat-pregnancy', 'name' => 'Cat pregnancy Calculator'],
            ['path' => '/biology/catch-per-unit-effort', 'name' => 'Catch Per Unit Effort Calculator'],
            ['path' => '/biology/catculator', 'name' => 'Catculator'],
        ],
        'authors' => [],
    ],
];

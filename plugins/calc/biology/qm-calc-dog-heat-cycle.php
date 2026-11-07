<?php

/**
 * Dog heat cycle
 * /biology/dog-heat-cycle
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog heat cycle',
    'meta' => ['title' => 'Dog heat cycle Calculator: Formula & Example', 'description' => 'Dog heat cycle takes the first day of the season and the cycle length you pick, then dates the next heats, the fertile window and the days between them.', 'h1' => 'Dog heat cycle Calculator', 'updated' => '2026-08-19'],
    'raw' => [
        'vars' => [
            'cycle1' => ['type' => 'date', 'rnd' => null],
            'cycle2' => ['type' => 'date', 'rnd' => null],
            'eightMonths' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '244', 'c' => null],
                ],
            ],
            'eighteenDays' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '18', 'c' => null],
                ],
            ],
            'enter_heat_cycle' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '4MhaGP2DO5L_md8W9hnsI', 'c' => null],
                ],
                'ds' => 'w-uJoHUW7pkKMDdhWSRDo',
            ],
            'firstDay' => ['type' => 'date', 'rnd' => null],
            'fiveMonths' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '152', 'c' => null],
                ],
            ],
            'length' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'SmJOM4KUfVLcxoCn9xv7x', 'c' => null],
                ],
                'ds' => 'I3GbN75PmyXFrKKeXiUNm',
            ],
            'length_value' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'nextCycle1' => ['type' => 'date', 'rnd' => null],
            'nextCycle2' => ['type' => 'date', 'rnd' => null],
            'nextCycle3' => ['type' => 'date', 'rnd' => null],
            'twentyoneDays' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '21', 'c' => null],
                ],
            ],
        ],
        'groups' => [
            [
                'uid' => 'SZR7P1BlbCRYxkGwCczJL',
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
                                        [null, ' Skip the math: create, edit, and save custom calculators  instantly just by typing what you need.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'firstDay', 'vt' => 'date', 'l' => 'First day of the cycle'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'enter_heat_cycle',
                                    'vt' => 'valueSelect',
                                    'l' => '',
                                    'ds' => 'w-uJoHUW7pkKMDdhWSRDo',
                                    'opts' => [
                                        ['kwpww5FxEm32wPYMeZvhS', 'Enter your dog\'s heat cycle length (if you know it)', '1'],
                                        ['4MhaGP2DO5L_md8W9hnsI', '', '0'],
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
                                    'n' => 'length',
                                    'vt' => 'valueSelect',
                                    'l' => 'Heat cycle length',
                                    'suf' => 'months',
                                    'ds' => 'I3GbN75PmyXFrKKeXiUNm',
                                    'opts' => [
                                        ['CK4OvRewrE2EcPUlijkYf', '4', '4'],
                                        ['pu_8vY4dOd3i6pAglybI6', '5', '5'],
                                        ['SmJOM4KUfVLcxoCn9xv7x', '6', '6'],
                                        ['ys3PuofM1WOXiN10XhfA9', '7', '7'],
                                        ['TSdrM1ZTgE0lWrj63Z-2m', '8', '8'],
                                        ['SGJLaHMs-CSmjakFiI3oz', '9', '9'],
                                        ['w5UF41W4wrNGcXsXm6Y3k', '10', '10'],
                                        ['BIa3HsO8V9JryI8VY5ZYI', '11', '11'],
                                        ['qgvzojXHcO2ttD0i84zen', '12', '12'],
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
                                        [null, ' Your dog\'s cycle will last up to {{cycle1.shortValue}} - {{cycle2.shortValue}}.'],
                                        ['enter_heat_cycle==0', ' You can expect the next heat cycle between {{nextCycle1.shortValue}} and {{nextCycle2.shortValue}}.&nbsp;'],
                                        ['enter_heat_cycle==1', ' You can expect the next heat on {{nextCycle3.shortValue}}.'],
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
                                        [null, ' Dogs of small breeds might go into heat more often (even every four months), while dogs of giant breeds - less frequently (e.g., once per year).'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'Nks1LHjtP3XnDgvaLipHy',
                'title' => 'Hidden variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'cycle1', 'vt' => 'date', 'l' => 'Day 18 of the cycle'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'cycle2', 'vt' => 'date', 'l' => 'Day 21 of the cycle'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'eightMonths',
                                    'vt' => 'numerical',
                                    'l' => 'Days in eight months',
                                    'us' => '19',
                                    'du' => 'days',
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
                                    'n' => 'eighteenDays',
                                    'vt' => 'numerical',
                                    'l' => 'Days until day 18',
                                    'us' => '19',
                                    'du' => 'days',
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
                                    'n' => 'fiveMonths',
                                    'vt' => 'numerical',
                                    'l' => 'Days in five months',
                                    'us' => '19',
                                    'du' => 'days',
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
                                    'n' => 'twentyoneDays',
                                    'vt' => 'numerical',
                                    'l' => 'Days until day 21',
                                    'us' => '19',
                                    'du' => 'days',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'nextCycle1', 'vt' => 'date', 'l' => 'Next cycle, five months on'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'nextCycle2', 'vt' => 'date', 'l' => 'Next cycle, eight months on'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'nextCycle3', 'vt' => 'date', 'l' => 'Next cycle, from the length you chose'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'length_value', 'vt' => 'dependent', 'l' => 'Cycle length, in months'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'cycle1=one_way(firstDay+eighteenDays)',
                'var' => [
                    [
                        'l' => 'cycle1',
                        'f' => '(eighteenDays + firstDay)',
                        'r' => ['eighteenDays', 'firstDay'],
                    ],
                ],
            ],
            [
                'formula' => 'cycle2 = one_way(firstDay+twentyoneDays)',
                'var' => [
                    [
                        'l' => 'cycle2',
                        'f' => '(firstDay + twentyoneDays)',
                        'r' => ['firstDay', 'twentyoneDays'],
                    ],
                ],
            ],
            [
                'formula' => 'nextCycle1 = one_way(firstDay+fiveMonths)',
                'var' => [
                    [
                        'l' => 'nextCycle1',
                        'f' => '(firstDay + fiveMonths)',
                        'r' => ['firstDay', 'fiveMonths'],
                    ],
                ],
            ],
            [
                'formula' => 'nextCycle2 = one_way(firstDay+eightMonths)',
                'var' => [
                    [
                        'l' => 'nextCycle2',
                        'f' => '(eightMonths + firstDay)',
                        'r' => ['eightMonths', 'firstDay'],
                    ],
                ],
            ],
            [
                'formula' => 'nextCycle3= one_way(firstDay+round(length*30.44))',
                'var' => [
                    [
                        'l' => 'nextCycle3',
                        'f' => '(firstDay + round((761/25)*length))',
                        'r' => ['firstDay', 'length'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'I3GbN75PmyXFrKKeXiUNm' => [
                'name' => 'Length',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'CK4OvRewrE2EcPUlijkYf', 'label' => '4', 'value' => '4'],
                    ['uid' => 'pu_8vY4dOd3i6pAglybI6', 'label' => '5', 'value' => '5'],
                    ['uid' => 'SmJOM4KUfVLcxoCn9xv7x', 'label' => '6', 'value' => '6'],
                    ['uid' => 'ys3PuofM1WOXiN10XhfA9', 'label' => '7', 'value' => '7'],
                    ['uid' => 'TSdrM1ZTgE0lWrj63Z-2m', 'label' => '8', 'value' => '8'],
                    ['uid' => 'SGJLaHMs-CSmjakFiI3oz', 'label' => '9', 'value' => '9'],
                    ['uid' => 'w5UF41W4wrNGcXsXm6Y3k', 'label' => '10', 'value' => '10'],
                    ['uid' => 'BIa3HsO8V9JryI8VY5ZYI', 'label' => '11', 'value' => '11'],
                    ['uid' => 'qgvzojXHcO2ttD0i84zen', 'label' => '12', 'value' => '12'],
                ],
            ],
            'w-uJoHUW7pkKMDdhWSRDo' => [
                'name' => 'Choose heat cycle length',
                'uiType' => 'CHECKBOX',
                'options' => [
                    ['uid' => 'kwpww5FxEm32wPYMeZvhS', 'label' => 'Enter your dog\'s heat cycle length (if you know it)', 'value' => '1'],
                    ['uid' => '4MhaGP2DO5L_md8W9hnsI', 'label' => '', 'value' => '0'],
                ],
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dog heat cycle turns First day of the cycle into Day 18 of the cycle and Day 21 of the cycle. The arithmetic is the whole method: day 18 of the cycle is worked out from first day of the cycle by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Dog heat cycle calculator works', 'html' => <<<'TXT'
            <p>Dog heat cycle answers one question from 1 number, and the answer is Day 18 of the cycle, Day 21 of the cycle and Next cycle, five months on.</p><p>The relationship it solves reads Day 18 of the cycle = (Days until day 18 + First day of the cycle).</p><p>The result panel carries Day 18 of the cycle, Day 21 of the cycle, Next cycle, five months on and Next cycle, eight months on, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>First day of the cycle</strong> — a plain number, no unit, entered as a date</li></ul><p>The answers come back as Day 18 of the cycle, Day 21 of the cycle, Next cycle, five months on, Next cycle, eight months on, Next cycle, from the length you chose. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Enter heat cycle = 0, Heat cycle length = 6 months and First day of the cycle = Sun 1 March 2026 gives <strong>Days in eight months</strong> = 2.108e+7, <strong>Days until day 18</strong> = 1.555e+6, <strong>Days in five months</strong> = 1.313e+7, <strong>Days until day 21</strong> = 1.814e+6, <strong>Day 18 of the cycle</strong> = Thu 19 March 2026, <strong>Day 21 of the cycle</strong> = Sun 22 March 2026, <strong>Next cycle, five months on</strong> = Fri 31 July 2026, <strong>Next cycle, eight months on</strong> = Sat 31 October 2026 and <strong>Next cycle, from the length you chose</strong> = Mon 31 August 2026.</p><ul><li><strong>Days in eight months</strong> = 2.108e+7</li><li><strong>Days until day 18</strong> = 1.555e+6</li><li><strong>Days in five months</strong> = 1.313e+7</li><li><strong>Days until day 21</strong> = 1.814e+6</li><li><strong>Day 18 of the cycle</strong> = Thu 19 March 2026</li><li><strong>Day 21 of the cycle</strong> = Sun 22 March 2026</li><li><strong>Next cycle, five months on</strong> = Fri 31 July 2026</li><li><strong>Next cycle, eight months on</strong> = Sat 31 October 2026</li><li><strong>Next cycle, from the length you chose</strong> = Mon 31 August 2026</li></ul><p>That is <strong>Day 18 of the cycle</strong> = <code>(Days until day 18 + First day of the cycle)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Days in eight months</strong> = 2.108e+7, <strong>Days until day 18</strong> = 1.555e+6, <strong>Days in five months</strong> = 1.313e+7, <strong>Days until day 21</strong> = 1.814e+6, <strong>Day 18 of the cycle</strong> = Thu 19 March 2026, <strong>Day 21 of the cycle</strong> = Sun 22 March 2026, <strong>Next cycle, five months on</strong> = Fri 31 July 2026, <strong>Next cycle, eight months on</strong> = Sat 31 October 2026 and <strong>Next cycle, from the length you chose</strong> = Mon 31 August 2026 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Day 18 of the cycle takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Day 18 of the cycle</strong> = <code>(Days until day 18 + First day of the cycle)</code></li><li><strong>Day 21 of the cycle</strong> = <code>(First day of the cycle + Days until day 21)</code></li><li><strong>Next cycle, five months on</strong> = <code>(First day of the cycle + Days in five months)</code></li><li><strong>Next cycle, eight months on</strong> = <code>(Days in eight months + First day of the cycle)</code></li><li><strong>Next cycle, from the length you chose</strong> = <code>(First day of the cycle + round((761 ÷ 25) × Heat cycle length))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Day 18 of the cycle</strong> = <code>(Days until day 18 + First day of the cycle)</code> — the form to use when Days until day 18 and First day of the cycle are the values you have.</li><li><strong>Day 21 of the cycle</strong> = <code>(First day of the cycle + Days until day 21)</code> — the form to use when First day of the cycle and Days until day 21 are the values you have.</li><li><strong>Next cycle, five months on</strong> = <code>(First day of the cycle + Days in five months)</code> — the form to use when First day of the cycle and Days in five months are the values you have.</li><li><strong>Next cycle, eight months on</strong> = <code>(Days in eight months + First day of the cycle)</code> — the form to use when Days in eight months and First day of the cycle are the values you have.</li><li><strong>Next cycle, from the length you chose</strong> = <code>(First day of the cycle + round((761 ÷ 25) × Heat cycle length))</code> — the form to use when First day of the cycle and Heat cycle length are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Day 18 of the cycle, Day 21 of the cycle and Next cycle, five months on can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => ''],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Day 18 of the cycle, Day 21 of the cycle and Next cycle, five months on are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>First day of the cycle left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If First day of the cycle is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert First day of the cycle to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Dog heat cycle form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>First day of the cycle</strong> takes a plain number with no unit attached. It feeds Day 18 of the cycle, Day 21 of the cycle and Next cycle, five months on. Fill it from a measurement rather than a memory — First day of the cycle is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Day 18 of the cycle</strong> is a plain number and the page's own defaults put it at Thu 19 March 2026. The value follows from Days until day 18 and First day of the cycle. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Day 21 of the cycle</strong> is a plain number and the page's own defaults put it at Sun 22 March 2026. The value follows from First day of the cycle and Days until day 21. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Next cycle, five months on</strong> is a plain number and the page's own defaults put it at Fri 31 July 2026. The value follows from First day of the cycle and Days in five months. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Next cycle, eight months on</strong> is a plain number and the page's own defaults put it at Sat 31 October 2026. The value follows from Days in eight months and First day of the cycle. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Next cycle, from the length you chose</strong> is a plain number and the page's own defaults put it at Mon 31 August 2026. The value follows from First day of the cycle and Heat cycle length. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Days in eight months</th><th>Days until day 18</th><th>Days in five months</th><th>Days until day 21</th><th>Day 18 of the cycle</th><th>Day 21 of the cycle</th><th>Next cycle, five months on</th><th>Next cycle, eight months on</th><th>Next cycle, from the length you chose</th></tr></thead><tbody><tr><td><strong>Heat cycle length</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0.09%</td></tr><tr><td><strong>First day of the cycle</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+9.99%</td><td>+9.99%</td><td>+9.93%</td><td>+9.88%</td><td>+9.91%</td></tr></tbody></table><p>Ranked by leverage, First day of the cycle sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Heat cycle length barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Enter heat cycle = 0, Heat cycle length = 3 months and First day of the cycle = Fri 30 January 1998 and the page reports <strong>Days in eight months</strong> = 2.108e+7, <strong>Days until day 18</strong> = 1.555e+6, <strong>Days in five months</strong> = 1.313e+7, <strong>Days until day 21</strong> = 1.814e+6, <strong>Day 18 of the cycle</strong> = Tue 17 February 1998, <strong>Day 21 of the cycle</strong> = Fri 20 February 1998, <strong>Next cycle, five months on</strong> = Wed 1 July 1998, <strong>Next cycle, eight months on</strong> = Thu 1 October 1998 and <strong>Next cycle, from the length you chose</strong> = Fri 1 May 1998.</li><li>Feed in Enter heat cycle = 0, Heat cycle length = 6 months and First day of the cycle = Sun 1 March 2026 and the page reports <strong>Days in eight months</strong> = 2.108e+7, <strong>Days until day 18</strong> = 1.555e+6, <strong>Days in five months</strong> = 1.313e+7, <strong>Days until day 21</strong> = 1.814e+6, <strong>Day 18 of the cycle</strong> = Thu 19 March 2026, <strong>Day 21 of the cycle</strong> = Sun 22 March 2026, <strong>Next cycle, five months on</strong> = Fri 31 July 2026, <strong>Next cycle, eight months on</strong> = Sat 31 October 2026 and <strong>Next cycle, from the length you chose</strong> = Mon 31 August 2026.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Day 18 of the cycle follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes First day of the cycle are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: First day of the cycle measured, Day 18 of the cycle and Day 21 of the cycle wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/gypsum-application-rate">Gypsum Application Rate Calculator</a>, <a href="/biology/hamster-age">Hamster age Calculator</a> and <a href="/biology/hardy-weinberg-equilibrium">Hardy-Weinberg equilibrium Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog heat cycle calculator work out?', 'a' => <<<'TXT'
            Day 18 of the cycle, Day 21 of the cycle, Next cycle, five months on and Next cycle, eight months on, from Days until day 18 and First day of the cycle. The relationship is Day 18 of the cycle = (Days until day 18 + First day of the cycle).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'First day of the cycle. Enter first day of the cycle; Day 18 of the cycle is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Day 18 of the cycle, Day 21 of the cycle, Next cycle, five months on and Next cycle, eight months on can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Days in eight months = 2.108e+7, Days until day 18 = 1.555e+6, Days in five months = 1.313e+7, Days until day 21 = 1.814e+6, Day 18 of the cycle = Thu 19 March 2026, Day 21 of the cycle = Sun 22 March 2026, Next cycle, five months on = Fri 31 July 2026, Next cycle, eight months on = Sat 31 October 2026 and Next cycle, from the length you chose = Mon 31 August 2026. Those are the defaults written into the form — move First day of the cycle and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Day 18 of the cycle is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave First day of the cycle blank and the page solves for it, reporting Day 18 of the cycle instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Day 18 of the cycle keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/gypsum-application-rate', 'name' => 'Gypsum Application Rate Calculator'],
            ['path' => '/biology/hamster-age', 'name' => 'Hamster age Calculator'],
            ['path' => '/biology/hardy-weinberg-equilibrium', 'name' => 'Hardy-Weinberg equilibrium Calculator'],
        ],
        'authors' => [],
    ],
];

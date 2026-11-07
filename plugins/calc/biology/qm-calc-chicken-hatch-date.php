<?php

/**
 * Chicken Hatch Date Calculator
 * /biology/chicken-hatch-date
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Chicken Hatch Date Calculator',
    'meta' => ['title' => 'Chicken Hatch Date Calculator — Formula & Results', 'description' => 'Chicken Hatch Date works out Hatch day (day of month) and Hatch month from Day of month you set the eggs, Month and Days already incubated.', 'h1' => 'Chicken Hatch Date Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'set_day',
                            'label' => 'Day of month you set the eggs',
                            'type' => 'number',
                            'suffix' => 'day',
                            'help' => '1–31',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'set_month',
                            'label' => 'Month',
                            'type' => 'number',
                            'suffix' => 'month',
                            'help' => '1 = January, 12 = December',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'elapsed',
                            'label' => 'Days already incubated',
                            'type' => 'number',
                            'suffix' => 'days',
                            'help' => 'Leave 0 if you set them today',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'hatch_day',
                            'label' => 'Hatch day (day of month)',
                            'type' => 'number',
                            'suffix' => 'day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hatch_month',
                            'label' => 'Hatch month',
                            'type' => 'number',
                            'suffix' => 'month',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_days',
                            'label' => 'Incubation period',
                            'type' => 'number',
                            'suffix' => 'days',
                            'help' => '21 for chickens, 28 duck, 28–30 goose',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '21',
                        ],
                        [
                            'name' => 'remaining',
                            'label' => 'Days remaining',
                            'type' => 'number',
                            'suffix' => 'days',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'candle_at',
                            'label' => 'Candle on day',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'lockdown_at',
                            'label' => 'Stop turning on day',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Timeline',
            'results' => [
                'remaining' => 'total_days-elapsed',
                'candle_at' => '7',
                'lockdown_at' => 'total_days-3',
                'hatch_day' => 'set_day+total_days',
                'hatch_month' => 'set_month+0',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Chicken Hatch Date works out Hatch day (day of month) and Hatch month from Day of month you set the eggs, Month and Days already incubated. There is no hidden constant here: change Hatch day (day of month) and Day of month you set the eggs moves with it. The main result, Hatch day (day of month), is reported in day.
        TXT,
        'sections' => [
            ['title' => 'How the Chicken Hatch Date calculator works', 'html' => <<<'TXT'
            <p>Chicken Hatch Date answers one question from 4 numbers, and the answer is Hatch day (day of month), Hatch month and Days remaining.</p><p>Written with the labels from the form, Days remaining = Incubation period − Days already incubated.</p><p>The result panel carries Hatch day (day of month), Hatch month, Days remaining and Candle on day, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Day of month you set the eggs</strong> — in day. 1–31</li><li><strong>Month</strong> — in month. 1 = January, 12 = December</li><li><strong>Days already incubated</strong> — in days. Leave 0 if you set them today</li><li><strong>Incubation period</strong> — in days. 21 for chickens, 28 duck, 28–30 goose</li></ul><p>The answers come back as Hatch day (day of month) in day, Hatch month in month, Days remaining in days, Candle on day, Stop turning on day. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Day of month you set the eggs = 1 day, Month = 4 month, Days already incubated = 5 days and Incubation period = 21 days; the answers are &lt;strong&gt;Days remaining&lt;/strong&gt; = 16 days, &lt;strong&gt;Candle on day&lt;/strong&gt; = 7, &lt;strong&gt;Stop turning on day&lt;/strong&gt; = 18, &lt;strong&gt;Hatch day (day of month)&lt;/strong&gt; = 22 day and &lt;strong&gt;Hatch month&lt;/strong&gt; = 4 month.</p><ul><li><strong>Days remaining</strong> = 16 days</li><li><strong>Candle on day</strong> = 7</li><li><strong>Stop turning on day</strong> = 18</li><li><strong>Hatch day (day of month)</strong> = 22 day</li><li><strong>Hatch month</strong> = 4 month</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Days remaining</strong> = <code>Incubation period − Days already incubated</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Days remaining&lt;/strong&gt; = 16, &lt;strong&gt;Candle on day&lt;/strong&gt; = 7, &lt;strong&gt;Stop turning on day&lt;/strong&gt; = 18, &lt;strong&gt;Hatch day (day of month)&lt;/strong&gt; = 22 and &lt;strong&gt;Hatch month&lt;/strong&gt; = 4. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Hatch day (day of month) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Days remaining</strong> = <code>Incubation period − Days already incubated</code></li><li><strong>Candle on day</strong> = <code>7</code></li><li><strong>Stop turning on day</strong> = <code>Incubation period − 3</code></li><li><strong>Hatch day (day of month)</strong> = <code>Day of month you set the eggs + Incubation period</code></li><li><strong>Hatch month</strong> = <code>Month + 0</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Days remaining, Candle on day and Stop turning on day can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Day of month you set the eggs from 1 to 2, leaving every other box alone. The panel moves from &lt;strong&gt;Days remaining&lt;/strong&gt; 16 days, &lt;strong&gt;Candle on day&lt;/strong&gt; 7, &lt;strong&gt;Stop turning on day&lt;/strong&gt; 18, &lt;strong&gt;Hatch day (day of month)&lt;/strong&gt; 22 day and &lt;strong&gt;Hatch month&lt;/strong&gt; 4 month to &lt;strong&gt;Days remaining&lt;/strong&gt; 16 days, &lt;strong&gt;Candle on day&lt;/strong&gt; 7, &lt;strong&gt;Stop turning on day&lt;/strong&gt; 18, &lt;strong&gt;Hatch day (day of month)&lt;/strong&gt; 23 day and &lt;strong&gt;Hatch month&lt;/strong&gt; 4 month.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Hatch day (day of month), Hatch month and Days remaining are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Day of month you set the eggs is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Day of month you set the eggs, Month and Days already incubated and the number you are missing is Hatch day (day of month) and Hatch month.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/egg-incubation-hatch-date">Egg Incubation Hatch Date Calculator</a>, <a href="/biology/encounter-rate">Encounter Rate Calculator</a> and <a href="/biology/enzyme-activity-units">Enzyme Activity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Chicken Hatch Date calculator work out?', 'a' => <<<'TXT'
            Hatch day (day of month), Hatch month, Days remaining and Candle on day, from Incubation period and Days already incubated. The relationship is Days remaining = Incubation period − Days already incubated.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Day of month you set the eggs (day), Month (month), Days already incubated (days), Incubation period (days). Fill set_day, set_month and elapsed and leave Hatch day (day of month) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Days remaining, Candle on day, Stop turning on day and Hatch day (day of month) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Days remaining = 16 days, Candle on day = 7, Stop turning on day = 18, Hatch day (day of month) = 22 day and Hatch month = 4 month. That comes from the page's own defaults, entered in Day of month you set the eggs; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Hatch day (day of month) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Day of month you set the eggs left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Hatch day (day of month) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/egg-incubation-hatch-date', 'name' => 'Egg Incubation Hatch Date Calculator'],
            ['path' => '/biology/encounter-rate', 'name' => 'Encounter Rate Calculator'],
            ['path' => '/biology/enzyme-activity-units', 'name' => 'Enzyme Activity Calculator'],
        ],
        'authors' => [],
    ],
];

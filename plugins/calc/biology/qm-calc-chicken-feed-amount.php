<?php

/**
 * Chicken Feed Amount Calculator
 * /biology/chicken-feed-amount
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Chicken Feed Amount Calculator',
    'meta' => ['title' => 'Chicken Feed Amount Calculator — Formula & Results', 'description' => 'Enter Number of birds, Feed per bird per day and Number of days into Chicken Feed Amount and the answer comes back as Feed per day and Total feed.', 'h1' => 'Chicken Feed Amount Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'birds',
                            'label' => 'Number of birds',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'intake',
                            'label' => 'Feed per bird per day',
                            'type' => 'number',
                            'suffix' => 'g',
                            'help' => 'Layers about 120 g, broilers 100–180 g',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                        [
                            'name' => 'days',
                            'label' => 'Number of days',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'price',
                            'label' => 'Feed price',
                            'type' => 'number',
                            'suffix' => 'per kg',
                            'help' => 'Optional — leave 0 to skip the cost',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.6',
                        ],
                        [
                            'name' => 'daily',
                            'label' => 'Feed per day',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total feed',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bags',
                            'label' => '25 kg bags',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cost',
                            'label' => 'Feed cost',
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
            'title' => 'Feed',
            'results' => [
                'daily' => 'birds*intake/1000',
                'total' => 'birds*intake*days/1000',
                'bags' => 'birds*intake*days/1000/25',
                'cost' => 'birds*intake*days/1000*price',
                'days' => 'total*1000/(birds*intake)',
                'intake' => 'total*1000/(birds*days)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Number of birds, Feed per bird per day and Number of days into Chicken Feed Amount and the answer comes back as Feed per day and Total feed. Nothing is looked up on this page: Feed per day is computed from Number of birds and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Feed per day is opened in kg; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Chicken Feed Amount calculator works', 'html' => <<<'TXT'
            <p>The Chicken Feed Amount calculator applies one relationship to 4 numbers and reports Feed per day, Total feed and 25 kg bags.</p><p>Written with the labels from the form, Feed per day = Number of birds × Feed per bird per day ÷ 1000.</p><p>The answers are Feed per day, Total feed, 25 kg bags and Feed cost; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Number of birds</strong> — a plain number, no unit</li><li><strong>Feed per bird per day</strong> — in g. Layers about 120 g, broilers 100–180 g</li><li><strong>Number of days</strong> — a plain number, no unit</li><li><strong>Feed price</strong> — in per kg. Optional — leave 0 to skip the cost</li></ul><p>The answers come back as Feed per day in kg, Total feed in kg, 25 kg bags, Feed cost. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Feed per day is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Feed per day</strong> = <code>Number of birds × Feed per bird per day ÷ 1000</code></li><li><strong>Total feed</strong> = <code>Number of birds × Feed per bird per day × Number of days ÷ 1000</code></li><li><strong>25 kg bags</strong> = <code>Number of birds × Feed per bird per day × Number of days ÷ 1000 ÷ 25</code></li><li><strong>Feed cost</strong> = <code>Number of birds × Feed per bird per day × Number of days ÷ 1000 × Feed price</code></li><li><strong>Number of days</strong> = <code>Total feed × 1000 ÷ (Number of birds × Feed per bird per day)</code></li><li><strong>Feed per bird per day</strong> = <code>Total feed × 1000 ÷ (Number of birds × Number of days)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Feed per day, Total feed and 25 kg bags can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Feed per day, Total feed and 25 kg bags are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Number of birds is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Number of birds, Feed per bird per day and Number of days and the number you are missing is Feed per day and Total feed.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/cfu-g-calculator">CFU/g Calculator</a>, <a href="/biology/cfu-ml-calculator">CFU/mL Calculator</a> and <a href="/biology/cheng-prusoff-equation">Cheng-Prusoff Equation Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Chicken Feed Amount calculator work out?', 'a' => <<<'TXT'
            Feed per day, Total feed, 25 kg bags and Feed cost, from Number of birds and Feed per bird per day. The relationship is Feed per day = Number of birds × Feed per bird per day ÷ 1000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of birds, Feed per bird per day (g), Number of days, Feed price (per kg). Enter birds, intake and days; Feed per day is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Feed per day, Total feed, 25 kg bags and Feed cost can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Feed per day is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Number of birds blank and the page solves for it, reporting Feed per day instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Feed per day keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/cfu-g-calculator', 'name' => 'CFU/g Calculator'],
            ['path' => '/biology/cfu-ml-calculator', 'name' => 'CFU/mL Calculator'],
            ['path' => '/biology/cheng-prusoff-equation', 'name' => 'Cheng-Prusoff Equation Calculator'],
        ],
        'authors' => [],
    ],
];

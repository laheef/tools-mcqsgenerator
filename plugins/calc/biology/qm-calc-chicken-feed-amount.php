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
    'meta' => ['title' => 'Chicken Feed Amount Calculator — Formula & Results', 'description' => <<<'TXT'
    Feed is the largest running cost of a flock, and a laying hen eats roughly 110–120 g a day. It returns feed per day, total feed, 25 kg bags and feed cost, and…
    TXT, 'h1' => 'Chicken Feed Amount Calculator', 'updated' => '2026-10-29'],
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
        Feed is the largest running cost of a flock, and a laying hen eats roughly 110–120 g a day. It returns feed per day, total feed, 25 kg bags and feed cost, and the panel shows all of them at once.
        
        This calculator turns birds, daily intake and a period into kilos of feed, bags and cost.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Chicken Feed Amount', 'html' => <<<'TXT'
            <p>Total feed (kg) = birds × grams per bird per day × days ÷ 1000</p>
            <figure class="calc-figure"><img src="/uploads/biology/chicken-feed-amount.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Chicken Feed Amount Calculator — Birds × daily intake × days gives the feed bill." title="Chicken Feed Amount Calculator"><figcaption>Birds × daily intake × days gives the feed bill.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>birds</code></td><td>number of birds</td><td>birds</td></tr><tr><td><code>intake</code></td><td>feed eaten by one bird in a day</td><td>g/day</td></tr><tr><td><code>days</code></td><td>length of the period</td><td>days</td></tr><tr><td><code>total</code></td><td>feed needed for the period</td><td>kg</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Chicken Feed Amount?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: number of birds of <strong>12</strong>, feed price of <strong>0.6</strong> per kg.</p>
            <p>Substituting them into the formula gives feed per day of <strong>1.44</strong> kg, total feed of <strong>43.2</strong> kg, 25 kg bags of <strong>1.73</strong>, feed cost of <strong>25.92</strong>, number of days of <strong>30</strong>, feed per bird per day of <strong>120</strong> g.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>100 – 130 g/day</td><td><strong>Laying hen</strong></td><td>typical layer intake at 18–20 °C</td></tr><tr><td>150 – 200 g/day</td><td><strong>Broiler, finishing</strong></td><td>fast-growing meat birds near market weight</td></tr><tr><td>80 – 100 g/day</td><td><strong>Pullet or bantam</strong></td><td>smaller body, lower intake</td></tr></tbody></table>
            <ul><li><p>Add 5–10% for spillage and wild birds; feeding to exactly the calculated figure leaves a trough empty before the next delivery.</p></li><li><p>Intake rises with body weight and falls with ambient temperature above about 20 °C, so a winter month and a summer month are not the same calculation.</p></li><li><p>The 25 kg bag count is rounded up in the field: half a bag is a bag you have to buy.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Entering the bag weight instead of the daily intake per bird.</li><li>Forgetting that chicks eat a fraction of adult intake and that the figure changes weekly.</li><li>Budgeting for feed without a wastage allowance — usually the difference between the plan and the invoice.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/fcr">Feed conversion ratio</a>. <a href="/biology/chicken-density">Chicken density</a>. <a href="/biology/livestock-water-requirement">Livestock water requirement</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much feed does a chicken eat a day?', 'a' => 'A laying hen eats about 110–120 g, a broiler 100 g at the start of the cycle rising to 180–200 g at finishing, and a bantam 80–90 g.'],
            ['q' => 'How many 25 kg bags is that?', 'a' => 'The calculator divides the total by 25 for you. Order the next whole bag up.'],
            ['q' => 'What does the Chicken Feed Amount actually calculate?', 'a' => 'It returns feed per day, total feed, 25 kg bags and feed cost. Each one is derived by the formula on this page, so you can check any figure by hand.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
        ],
        'related' => [],
    ],
];

<?php

/**
 * Puppy Adult Weight Predictor
 * /biology/puppy-adult-weight-predictor
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Puppy Adult Weight Predictor',
    'meta' => ['title' => 'Puppy Adult Weight Predictor — Formula & Results', 'description' => 'A puppy\'s adult weight can be estimated from its current weight and age, because growth follows a predictable curve that depends on the breed\'s adult size.', 'h1' => 'Puppy Adult Weight Predictor', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Current weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'help' => 'At the age you enter below',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'age',
                            'label' => 'Current age',
                            'type' => 'number',
                            'suffix' => 'weeks',
                            'help' => 'Weeks old',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '14',
                        ],
                        [
                            'name' => 'size_class',
                            'label' => 'Predicted breed size',
                            'type' => 'select',
                            'options' => ['Small (<10 kg adult)' => '1', 'Medium (10–25 kg)' => '2', 'Large (25–45 kg)' => '3', 'Giant (>45 kg)' => '4'],
                            'default' => 'Medium (10–25 kg)',
                        ],
                        [
                            'name' => 'adult',
                            'label' => 'Estimated adult weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'low',
                            'label' => 'Likely range — low',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'high',
                            'label' => 'Likely range — high',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'remaining',
                            'label' => 'Growth still to come',
                            'type' => 'number',
                            'suffix' => '%',
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
            'title' => 'Adult weight',
            'results' => [
                'adult' => <<<'TXT'
                if_else(size_class==1, weight*(1+max(0,0.30-age*0.004)), if_else(size_class==2, weight*(1+max(0,0.60-age*0.007)), if_else(size_class==3, weight*(1+max(0,1.10-age*0.010)), weight*(1+max(0,1.60-age*0.013)))))
                TXT,
                'low' => 'adult*0.9',
                'high' => 'adult*1.1',
                'remaining' => 'adult/weight',
                'weight' => 'adult/(1+max(0,0.60-age*0.007))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A puppy's adult weight can be estimated from its current weight and age, because growth follows a predictable curve that depends on the breed's adult size. It returns estimated adult weight, likely range — low, likely range — high and growth still to come, and the panel shows all of them at once.
        
        This calculator gives an estimate and a realistic range, and names the size class the dog is heading for.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Puppy Adult Weight Predictor', 'html' => <<<'TXT'
            <p>Adult weight ≈ current weight × (1 + growth allowance), where the allowance shrinks with age and is larger for bigger breeds</p>
            <figure class="calc-figure"><img src="/uploads/biology/puppy-adult-weight-predictor.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Puppy Adult Weight Predictor — Growth curves flatten at different ages depending on adult size." title="Puppy Adult Weight Predictor"><figcaption>Growth curves flatten at different ages depending on adult size.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>weight</code></td><td>puppy weight now</td><td>kg</td></tr><tr><td><code>age</code></td><td>age in weeks</td><td>weeks</td></tr><tr><td><code>class</code></td><td>breed size class</td><td>—</td></tr><tr><td><code>adult</code></td><td>estimated adult weight</td><td>kg</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Puppy Adult Weight Predictor?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: current age of <strong>14</strong> weeks, predicted breed size set to <strong>2.0</strong>.</p>
            <p>Substituting them into the formula gives estimated adult weight of <strong>9.01</strong> kg, likely range — low of <strong>8.11</strong> kg, likely range — high of <strong>9.91</strong> kg, growth still to come of <strong>1.5</strong>%, current weight of <strong>6</strong> kg.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>under 10 kg</td><td><strong>Small</strong></td><td>terriers, toy breeds, reaching adult weight at 9–10 months</td></tr><tr><td>10 – 25 kg</td><td><strong>Medium</strong></td><td>beagles, border collies, adult at 12 months</td></tr><tr><td>25 – 45 kg</td><td><strong>Large</strong></td><td>labradors, shepherds, adult at 14–16 months</td></tr><tr><td>over 45 kg</td><td><strong>Giant</strong></td><td>mastiffs, great danes, growing until 18–24 months</td></tr></tbody></table>
            <ul><li><p>The estimate is a band, not a promise: within one litter of the same breed, adult weights can differ by 20%.</p></li><li><p>Large and giant breeds keep growing long after small breeds have stopped, which is why the same 14-week-old puppy can have very different trajectories.</p></li><li><p>Puppies should be weighed weekly for the first months — the trend matters more than any single estimate.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Entering the age in months where weeks are expected (a 14 here means 14 weeks).</li><li>Picking the size class by what the puppy looks like now rather than by its parentage.</li><li>Feeding to the predicted adult weight instead of to body condition score.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How accurate is a puppy weight prediction?', 'a' => 'Within about 10–15% for purebred puppies of known parentage; much less reliable for mixed breeds and for puppies whose growth has been uneven.'],
            ['q' => 'When does a puppy stop growing?', 'a' => 'Small breeds at 9–10 months, medium at about 12, large at 14–16 and giant breeds at 18–24.'],
            ['q' => 'What does the Puppy Adult Weight Predictor actually calculate?', 'a' => <<<'TXT'
            It returns estimated adult weight, likely range — low, likely range — high and growth still to come. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
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

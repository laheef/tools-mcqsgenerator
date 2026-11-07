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
    'meta' => ['title' => 'Puppy Adult Weight Predictor — Formula & Results', 'description' => 'Enter Current weight, Current age and Predicted breed size into Puppy Adult Weight Predictor and the answer comes back as Estimated adult weight and Likely…', 'h1' => 'Puppy Adult Weight Predictor', 'updated' => '2026-10-29'],
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
        Enter Current weight, Current age and Predicted breed size into Puppy Adult Weight Predictor and the answer comes back as Estimated adult weight and Likely range — low. It is a single relationship that reads Estimated adult weight out of Current weight, not a table of canned results keyed by them. Units for Estimated adult weight default to kg and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Puppy Adult Weight Predictor calculator works', 'html' => <<<'TXT'
            <p>Puppy Adult Weight Predictor answers one question from 3 numbers, and the answer is Estimated adult weight, Likely range — low and Likely range — high.</p><p>What comes back is Estimated adult weight, Likely range — low, Likely range — high and Growth still to come — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Current weight</strong> — in kg. At the age you enter below</li><li><strong>Current age</strong> — in weeks. Weeks old</li><li><strong>Predicted breed size</strong> — a plain number, no unit</li></ul><p>What you get back is Estimated adult weight in kg, Likely range — low in kg, Likely range — high in kg, Growth still to come in %, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Estimated adult weight is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Likely range — low</strong> = <code>Estimated adult weight × 0.9</code></li><li><strong>Likely range — high</strong> = <code>Estimated adult weight × 1.1</code></li><li><strong>Growth still to come</strong> = <code>Estimated adult weight ÷ Current weight</code></li><li><strong>Current weight</strong> = <code>Estimated adult weight ÷ (1 + max(0,0.60 − Current age × 0.007))</code></li></ul><p>Any one of Estimated adult weight, Likely range — low and Likely range — high can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Estimated adult weight, Likely range — low and Likely range — high are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Current weight and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Current weight, Current age and Predicted breed size is what you already know and Estimated adult weight and Likely range — low is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/beer-lambert-a280-protein-concentration">Beer-Lambert A280 Protein Concentration Calculator</a>, <a href="/biology/benadryl-dosage-for-dogs">Benadryl dosage for dogs</a> and <a href="/biology/berger-parker-index">Berger–Parker Index Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Puppy Adult Weight Predictor calculator work out?', 'a' => 'Estimated adult weight, Likely range — low, Likely range — high and Growth still to come, from Predicted breed size, Current weight and Current age.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current weight (kg), Current age (weeks), Predicted breed size. Enter weight, age and size_class; Estimated adult weight is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Estimated adult weight, Likely range — low, Likely range — high and Growth still to come blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Estimated adult weight is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Current weight blank and the page solves for it, reporting Estimated adult weight instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Estimated adult weight keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/beer-lambert-a280-protein-concentration', 'name' => 'Beer-Lambert A280 Protein Concentration Calculator'],
            ['path' => '/biology/benadryl-dosage-for-dogs', 'name' => 'Benadryl dosage for dogs'],
            ['path' => '/biology/berger-parker-index', 'name' => 'Berger–Parker Index Calculator'],
        ],
        'authors' => [],
    ],
];

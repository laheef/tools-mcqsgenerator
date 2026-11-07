<?php

/**
 * Fish Condition Factor Calculator
 * /biology/fish-condition-factor
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fish Condition Factor Calculator',
    'meta' => ['title' => 'Fish Condition Factor Calculator — Formula & Results', 'description' => 'The arithmetic is the whole method: Condition factor (K) is worked out from Fish weight by one formula, applied once. Fish weight (g), Fork length (cm).', 'h1' => 'Fish Condition Factor Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Fish weight',
                            'type' => 'number',
                            'suffix' => 'g',
                            'help' => 'Total body weight',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '250',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Fork length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Fork of the tail to the snout',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'k',
                            'label' => 'Condition factor (K)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'expected',
                            'label' => 'Expected weight at K = 1',
                            'type' => 'number',
                            'suffix' => 'g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'deviation',
                            'label' => 'Weight against K = 1',
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
            'title' => 'Condition',
            'results' => [
                'k' => 'weight/length^3*100',
                'expected' => 'length^3/100',
                'deviation' => '(k-1)*100',
                'weight' => 'k*length^3/100',
                'length' => 'cbrt(weight*100/k)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Fish Condition Factor takes Fish weight and Fork length and returns Condition factor (K) and Expected weight at K = 1. The arithmetic is the whole method: Condition factor (K) is worked out from Fish weight by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Fish Condition Factor calculator works', 'html' => <<<'TXT'
            <p>Fish Condition Factor answers one question from 2 numbers, and the answer is Condition factor (K), Expected weight at K = 1 and Weight against K = 1.</p><p>In the form&#039;s own words, Condition factor (K) = Fish weight ÷ Fork length ^ 3 × 100.</p><p>What comes back is Condition factor (K), Expected weight at K = 1 and Weight against K = 1 — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Fish weight</strong> — in g. Total body weight</li><li><strong>Fork length</strong> — in cm. Fork of the tail to the snout</li></ul><p>The answers come back as Condition factor (K), Expected weight at K = 1 in g, Weight against K = 1 in %. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Condition factor (K) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Condition factor (K)</strong> = <code>Fish weight ÷ Fork length ^ 3 × 100</code></li><li><strong>Expected weight at K = 1</strong> = <code>Fork length ^ 3 ÷ 100</code></li><li><strong>Weight against K = 1</strong> = <code>(Condition factor (K) − 1) × 100</code></li><li><strong>Fish weight</strong> = <code>Condition factor (K) × Fork length ^ 3 ÷ 100</code></li><li><strong>Fork length</strong> = <code>cbrt(Fish weight × 100 ÷ Condition factor (K))</code></li></ul><p>Any one of Condition factor (K), Expected weight at K = 1 and Weight against K = 1 can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Condition factor (K), Expected weight at K = 1 and Weight against K = 1 are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Fish weight is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Fish weight and Fork length is what you already know and Condition factor (K) and Expected weight at K = 1 is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/species-richness">Species Richness Calculator</a>, <a href="/biology/specific-growth-rate-od">Specific Growth Rate from OD Calculator</a> and <a href="/biology/specific-growth-rate-from-od">Specific Growth Rate from OD Readings Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fish Condition Factor calculator work out?', 'a' => <<<'TXT'
            Condition factor (K), Expected weight at K = 1 and Weight against K = 1, from Fish weight and Fork length. The relationship is Condition factor (K) = Fish weight ÷ Fork length ^ 3 × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Fish weight (g), Fork length (cm). Fill weight and length and leave Condition factor (K) empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Condition factor (K), Expected weight at K = 1, Weight against K = 1 and Fish weight blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Condition factor (K) is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Fish weight left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Condition factor (K) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/species-richness', 'name' => 'Species Richness Calculator'],
            ['path' => '/biology/specific-growth-rate-od', 'name' => 'Specific Growth Rate from OD Calculator'],
            ['path' => '/biology/specific-growth-rate-from-od', 'name' => 'Specific Growth Rate from OD Readings Calculator'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * Hatch Rate Calculator
 * /biology/hatch-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hatch Rate Calculator',
    'meta' => ['title' => 'Hatch Rate Calculator: Formula, Steps & Results', 'description' => 'Hatch Rate turns Eggs set, Fertile eggs and Chicks hatched into Hatch rate (of fertile) and Hatchability (of set). There is no hidden constant here: change…', 'h1' => 'Hatch Rate Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'eggs_set',
                            'label' => 'Eggs set',
                            'type' => 'number',
                            'suffix' => 'eggs',
                            'help' => 'Everything that went into the incubator',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '48',
                        ],
                        [
                            'name' => 'fertile',
                            'label' => 'Fertile eggs',
                            'type' => 'number',
                            'suffix' => 'eggs',
                            'help' => 'From candling at day 7–10',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'hatched',
                            'label' => 'Chicks hatched',
                            'type' => 'number',
                            'suffix' => 'chicks',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '34',
                        ],
                        [
                            'name' => 'hatch_rate',
                            'label' => 'Hatch rate (of fertile)',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hatchability',
                            'label' => 'Hatchability (of set)',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'infertile',
                            'label' => 'Infertile eggs',
                            'type' => 'number',
                            'suffix' => 'eggs',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dead_in_shell',
                            'label' => 'Died after candling',
                            'type' => 'number',
                            'suffix' => 'eggs',
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
            'title' => 'Hatch',
            'results' => [
                'hatch_rate' => 'hatched/fertile*100',
                'hatchability' => 'hatched/eggs_set*100',
                'infertile' => 'eggs_set-fertile',
                'dead_in_shell' => 'fertile-hatched',
                'hatched' => 'hatch_rate*fertile/100',
                'fertile' => 'hatched/hatch_rate*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Hatch Rate turns Eggs set, Fertile eggs and Chicks hatched into Hatch rate (of fertile) and Hatchability (of set). There is no hidden constant here: change Hatch rate (of fertile) and Eggs set moves with it. The main result, Hatch rate (of fertile), is reported in %.
        TXT,
        'sections' => [
            ['title' => 'How the Hatch Rate calculator works', 'html' => <<<'TXT'
            <p>The Hatch Rate calculator applies one relationship to 3 numbers and reports Hatch rate (of fertile), Hatchability (of set) and Infertile eggs.</p><p>Written with the labels from the form, Hatch rate (of fertile) = Chicks hatched ÷ Fertile eggs × 100.</p><p>What comes back is Hatch rate (of fertile), Hatchability (of set), Infertile eggs and Died after candling — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Eggs set</strong> — in eggs. Everything that went into the incubator</li><li><strong>Fertile eggs</strong> — in eggs. From candling at day 7–10</li><li><strong>Chicks hatched</strong> — in chicks</li></ul><p>What you get back is Hatch rate (of fertile) in %, Hatchability (of set) in %, Infertile eggs in eggs, Died after candling in eggs, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Hatch rate (of fertile) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Hatch rate (of fertile)</strong> = <code>Chicks hatched ÷ Fertile eggs × 100</code></li><li><strong>Hatchability (of set)</strong> = <code>Chicks hatched ÷ Eggs set × 100</code></li><li><strong>Infertile eggs</strong> = <code>Eggs set − Fertile eggs</code></li><li><strong>Died after candling</strong> = <code>Fertile eggs − Chicks hatched</code></li><li><strong>Chicks hatched</strong> = <code>Hatch rate (of fertile) × Fertile eggs ÷ 100</code></li><li><strong>Fertile eggs</strong> = <code>Chicks hatched ÷ Hatch rate (of fertile) × 100</code></li></ul><p>Any one of Hatch rate (of fertile), Hatchability (of set) and Infertile eggs can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Hatch rate (of fertile), Hatchability (of set) and Infertile eggs are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Eggs set and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Eggs set, Fertile eggs and Chicks hatched and the number you are missing is Hatch rate (of fertile) and Hatchability (of set).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/pcr-cycle-calculator">PCR Cycle Calculator</a>, <a href="/biology/pcr-master-mix-calculator">PCR Master Mix Calculator</a> and <a href="/biology/pcr-primer-stats">PCR Primer Stats Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hatch Rate calculator work out?', 'a' => <<<'TXT'
            Hatch rate (of fertile), Hatchability (of set), Infertile eggs and Died after candling, from Chicks hatched and Fertile eggs. The relationship is Hatch rate (of fertile) = Chicks hatched ÷ Fertile eggs × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Eggs set (eggs), Fertile eggs (eggs), Chicks hatched (chicks). Enter eggs_set, fertile and hatched; Hatch rate (of fertile) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Hatch rate (of fertile), Hatchability (of set), Infertile eggs and Died after candling blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Hatch rate (of fertile) is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Eggs set left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Hatch rate (of fertile) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/pcr-cycle-calculator', 'name' => 'PCR Cycle Calculator'],
            ['path' => '/biology/pcr-master-mix-calculator', 'name' => 'PCR Master Mix Calculator'],
            ['path' => '/biology/pcr-primer-stats', 'name' => 'PCR Primer Stats Calculator'],
        ],
        'authors' => [],
    ],
];

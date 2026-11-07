<?php

/**
 * Femur to Foot Ratio Calculator
 * /biology/femur-to-foot-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Femur to Foot Ratio Calculator',
    'meta' => ['title' => 'Femur to Foot Ratio Calculator — Formula & Results', 'description' => 'Femur to Foot Ratio takes Femur length and Foot length and returns Femur to foot ratio and Foot length as % of femur. The arithmetic is the whole method…', 'h1' => 'Femur to Foot Ratio Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'femur',
                            'label' => 'Femur length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Maximum length of the femur',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '45',
                        ],
                        [
                            'name' => 'foot',
                            'label' => 'Foot length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Heel to the tip of the longest toe',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '26',
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Femur to foot ratio',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'foot_pct',
                            'label' => 'Foot length as % of femur',
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
            'title' => 'Ratio',
            'results' => ['ratio' => 'femur/foot', 'foot_pct' => 'foot/femur*100', 'femur' => 'ratio*foot', 'foot' => 'femur/ratio'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Femur to Foot Ratio takes Femur length and Foot length and returns Femur to foot ratio and Foot length as % of femur. The arithmetic is the whole method: Femur to foot ratio is worked out from Femur length by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Femur to Foot Ratio calculator works', 'html' => <<<'TXT'
            <p>The Femur to Foot Ratio calculator applies one relationship to 2 numbers and reports Femur to foot ratio and Foot length as % of femur.</p><p>The relationship it solves reads Femur to foot ratio = Femur length ÷ Foot length.</p><p>The result panel carries Femur to foot ratio and Foot length as % of femur, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Femur length</strong> — in cm. Maximum length of the femur</li><li><strong>Foot length</strong> — in cm. Heel to the tip of the longest toe</li></ul><p>The result boxes are Femur to foot ratio, Foot length as % of femur in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Femur to foot ratio takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Femur to foot ratio</strong> = <code>Femur length ÷ Foot length</code></li><li><strong>Foot length as % of femur</strong> = <code>Foot length ÷ Femur length × 100</code></li><li><strong>Femur length</strong> = <code>Femur to foot ratio × Foot length</code></li><li><strong>Foot length</strong> = <code>Femur length ÷ Femur to foot ratio</code></li></ul><p>Any one of Femur to foot ratio, Foot length as % of femur and Femur length can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Femur to foot ratio and Foot length as % of femur are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Femur length and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Femur length and Foot length and the number you are missing is Femur to foot ratio and Foot length as % of femur.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/compost-application-rate">Compost Application Rate Calculator</a>, <a href="/biology/compost">Compost Calculator</a> and <a href="/biology/corn-yield">Corn yield Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Femur to Foot Ratio calculator work out?', 'a' => 'Femur to foot ratio and Foot length as % of femur, from Femur length and Foot length. The relationship is Femur to foot ratio = Femur length ÷ Foot length.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Femur length (cm), Foot length (cm). Fill femur and foot and leave Femur to foot ratio empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Femur to foot ratio, Foot length as % of femur, Femur length and Foot length blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Femur to foot ratio is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Femur length blank and the page solves for it, reporting Femur to foot ratio instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Femur to foot ratio keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/compost-application-rate', 'name' => 'Compost Application Rate Calculator'],
            ['path' => '/biology/compost', 'name' => 'Compost Calculator'],
            ['path' => '/biology/corn-yield', 'name' => 'Corn yield Calculator'],
        ],
        'authors' => [],
    ],
];

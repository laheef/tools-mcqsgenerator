<?php

/**
 * Pig Weight Calculator
 * /biology/pig-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pig Weight Calculator',
    'meta' => ['title' => 'Pig Weight Calculator: Formula, Steps & Results', 'description' => 'Pig Weight takes Heart girth, Body length and Measured in and returns Estimated live weight and Estimated live weight. It is a single relationship that reads…', 'h1' => 'Pig Weight Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'girth',
                            'label' => 'Heart girth',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Circumference just behind the front legs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '110',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Body length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Between the ears to the base of the tail',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'unit',
                            'label' => 'Measured in',
                            'type' => 'select',
                            'options' => ['Centimetres' => '1', 'Inches' => '2'],
                            'default' => 'Centimetres',
                        ],
                        [
                            'name' => 'weight',
                            'label' => 'Estimated live weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'weight_lb',
                            'label' => 'Estimated live weight',
                            'type' => 'number',
                            'suffix' => 'lb',
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
            'title' => 'Live weight',
            'results' => ['weight' => 'if_else(unit==1, girth*girth*length/400, (girth*girth*length)*0.4536/400*16.387)', 'weight_lb' => 'weight*2.2046', 'girth' => 'sqrt(weight*400/length)', 'length' => 'weight*400/(girth*girth)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Pig Weight takes Heart girth, Body length and Measured in and returns Estimated live weight and Estimated live weight. It is a single relationship that reads Estimated live weight out of Heart girth, not a table of canned results keyed by them. Units for Estimated live weight default to kg and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Pig Weight calculator works', 'html' => <<<'TXT'
            <p>The Pig Weight calculator applies one relationship to 3 numbers and reports Estimated live weight and Estimated live weight.</p><p>Written with the labels from the form, Estimated live weight = if_else(Measured in==1, Heart girth × Heart girth × Body length ÷ 400, (Heart girth × Heart girth × Body length) × 0.4536 ÷ 400 × 16.387).</p><p>The answers are Estimated live weight and Estimated live weight; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Heart girth</strong> — in cm. Circumference just behind the front legs</li><li><strong>Body length</strong> — in cm. Between the ears to the base of the tail</li><li><strong>Measured in</strong> — a plain number, no unit</li></ul><p>What you get back is Estimated live weight in kg, Estimated live weight in lb, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Estimated live weight takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Estimated live weight</strong> = <code>if_else(Measured in==1, Heart girth × Heart girth × Body length ÷ 400, (Heart girth × Heart girth × Body length) × 0.4536 ÷ 400 × 16.387)</code></li><li><strong>Heart girth</strong> = <code>√(Estimated live weight × 400 ÷ Body length)</code></li><li><strong>Body length</strong> = <code>Estimated live weight × 400 ÷ (Heart girth × Heart girth)</code></li></ul><p>Any one of Estimated live weight, Estimated live weight and Heart girth can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Estimated live weight and Estimated live weight are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Heart girth to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Heart girth, Body length and Measured in and the number you are missing is Estimated live weight and Estimated live weight.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/cricket-chirp-thermometer">Crickets chirping thermometer Calculator</a>, <a href="/biology/crop-coefficient">Crop Coefficient Calculator</a> and <a href="/biology/crop-water-requirement">Crop Water Requirement (ETc) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pig Weight calculator work out?', 'a' => <<<'TXT'
            Estimated live weight and Estimated live weight, from Measured in, Heart girth and Body length. The relationship is Estimated live weight = if_else(Measured in==1, Heart girth × Heart girth × Body length ÷ 400, (Heart girth × Heart girth × Body length) × 0.4536 ÷ 400 × 16.387).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Heart girth (cm), Body length (cm), Measured in. With girth, length and unit in place, Estimated live weight can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Estimated live weight, Estimated live weight, Heart girth and Body length blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Estimated live weight is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Heart girth blank and the page solves for it, reporting Estimated live weight instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Estimated live weight keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/cricket-chirp-thermometer', 'name' => 'Crickets chirping thermometer Calculator'],
            ['path' => '/biology/crop-coefficient', 'name' => 'Crop Coefficient Calculator'],
            ['path' => '/biology/crop-water-requirement', 'name' => 'Crop Water Requirement (ETc) Calculator'],
        ],
        'authors' => [],
    ],
];

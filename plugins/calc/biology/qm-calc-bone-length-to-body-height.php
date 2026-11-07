<?php

/**
 * Bone Length to Body Height Calculator
 * /biology/bone-length-to-body-height
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bone Length to Body Height Calculator',
    'meta' => ['title' => 'Bone Length to Body Height Calculator — Biology', 'description' => 'Bone Length to Body Height takes Bone measured, Sex of the individual and Bone length and returns Estimated stature and Estimated stature.', 'h1' => 'Bone Length to Body Height Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'bone',
                            'label' => 'Bone measured',
                            'type' => 'select',
                            'options' => ['Femur' => '1', 'Tibia' => '2', 'Humerus' => '3', 'Radius' => '4'],
                            'default' => 'Femur',
                        ],
                        [
                            'name' => 'sex',
                            'label' => 'Sex of the individual',
                            'type' => 'select',
                            'options' => ['Male' => '1', 'Female' => '0'],
                            'default' => 'Male',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Bone length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Maximum length of the bone, measured on an osteometric board',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '45',
                        ],
                        [
                            'name' => 'height_cm',
                            'label' => 'Estimated stature',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'height_in',
                            'label' => 'Estimated stature',
                            'type' => 'number',
                            'suffix' => 'in',
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
            'title' => 'Stature',
            'results' => ['height_cm' => <<<'TXT'
            if_else(bone==1, if_else(sex>0, 2.38*length+61.41, 2.47*length+54.13), if_else(bone==2, if_else(sex>0, 2.52*length+78.62, 2.90*length+61.53), if_else(bone==3, if_else(sex>0, 2.89*length+78.10, 3.36*length+57.97), if_else(sex>0, 3.79*length+79.42, 4.74*length+54.93))))
            TXT, 'height_in' => 'height_cm/2.54', 'length' => <<<'TXT'
            if_else(bone==1, if_else(sex>0, (height_cm-61.41)/2.38, (height_cm-54.13)/2.47), if_else(bone==2, if_else(sex>0, (height_cm-78.62)/2.52, (height_cm-61.53)/2.90), if_else(bone==3, if_else(sex>0, (height_cm-78.10)/2.89, (height_cm-57.97)/3.36), if_else(sex>0, (height_cm-79.42)/3.79, (height_cm-54.93)/4.74))))
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Bone Length to Body Height takes Bone measured, Sex of the individual and Bone length and returns Estimated stature and Estimated stature. Nothing is looked up on this page: Estimated stature is computed from Bone measured and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Estimated stature is opened in cm; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Bone Length to Body Height calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Bone Length to Body Height: it takes 3 numbers and reports Estimated stature and Estimated stature.</p><p>The result panel carries Estimated stature and Estimated stature, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Bone measured</strong> — a plain number, no unit</li><li><strong>Sex of the individual</strong> — a plain number, no unit</li><li><strong>Bone length</strong> — in cm. Maximum length of the bone, measured on an osteometric board</li></ul><p>What you get back is Estimated stature in cm, Estimated stature in in, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Estimated stature takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Estimated stature</strong> = <code>Estimated stature ÷ 2.54</code></li></ul><p>Any one of Estimated stature, Estimated stature and Bone length can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Estimated stature and Estimated stature are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Bone measured to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Bone measured, Sex of the individual and Bone length and the number you are missing is Estimated stature and Estimated stature.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/hardy-weinberg-heterozygote">Hardy–Weinberg from the Heterozygote Frequency Calculator</a>, <a href="/biology/hardy-weinberg-recessive-allele">Hardy–Weinberg from the Recessive Allele Frequency Calculator</a> and <a href="/biology/hardy-weinberg-recessive-homozygote">Hardy–Weinberg from the Recessive Homozygote Frequency Calcula</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bone Length to Body Height calculator work out?', 'a' => 'Estimated stature and Estimated stature, from Bone measured, Sex of the individual and Bone length.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Bone measured, Sex of the individual, Bone length (cm). Fill bone, sex and length and leave Estimated stature empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Estimated stature, Estimated stature and Bone length blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Estimated stature is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Bone measured left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Estimated stature keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/hardy-weinberg-heterozygote', 'name' => 'Hardy–Weinberg from the Heterozygote Frequency Calculator'],
            ['path' => '/biology/hardy-weinberg-recessive-allele', 'name' => 'Hardy–Weinberg from the Recessive Allele Frequency Calculator'],
            ['path' => '/biology/hardy-weinberg-recessive-homozygote', 'name' => 'Hardy–Weinberg from the Recessive Homozygote Frequency Calcula'],
        ],
        'authors' => [],
    ],
];

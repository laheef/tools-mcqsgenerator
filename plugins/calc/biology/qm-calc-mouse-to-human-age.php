<?php

/**
 * Mouse to Human Age Calculator
 * /biology/mouse-to-human-age
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mouse to Human Age Calculator',
    'meta' => ['title' => 'Mouse to Human Age Calculator — Formula & Results', 'description' => 'Mouse to Human Age turns Mouse age into Human-equivalent age and Mouse age. Human-equivalent age is opened in years; the chip beside it switches to any unit…', 'h1' => 'Mouse to Human Age Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'months',
                            'label' => 'Mouse age',
                            'type' => 'number',
                            'suffix' => 'months',
                            'help' => '3 weeks = 0.7 months; 126 days = 4.1 months',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'human',
                            'label' => 'Human-equivalent age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'weeks',
                            'label' => 'Mouse age',
                            'type' => 'number',
                            'suffix' => 'weeks',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'lifespan',
                            'label' => 'Share of a 2-year lifespan',
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
            'title' => 'Conversion',
            'results' => ['weeks' => 'months*4.345', 'human' => <<<'TXT'
            if_else(months<=2, months*8, if_else(months<=10, 16+(months-2)*2.75, if_else(months<=15, 38+(months-10)*1.8, if_else(months<=18, 47+(months-15)*3, if_else(months<=24, 56+(months-18)*2.167, 69+(months-24)*2.2)))))
            TXT, 'lifespan' => 'months/24*100', 'months' => 'weeks/4.345'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Mouse to Human Age turns Mouse age into Human-equivalent age and Mouse age. Nothing is looked up on this page: Human-equivalent age is computed from Mouse age and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Human-equivalent age is opened in years; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Mouse to Human Age calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Mouse to Human Age: it takes 1 number and reports Human-equivalent age, Mouse age and Share of a 2-year lifespan.</p><p>Written with the labels from the form, Mouse age = Mouse age × 4.345.</p><p>The answers are Human-equivalent age, Mouse age and Share of a 2-year lifespan; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Mouse age</strong> — in months. 3 weeks = 0.7 months; 126 days = 4.1 months</li></ul><p>The answers come back as Human-equivalent age in years, Mouse age in weeks, Share of a 2-year lifespan in %. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Human-equivalent age takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Mouse age</strong> = <code>Mouse age × 4.345</code></li><li><strong>Share of a 2-year lifespan</strong> = <code>Mouse age ÷ 24 × 100</code></li></ul><p>Any one of Mouse age, Human-equivalent age and Share of a 2-year lifespan can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Human-equivalent age, Mouse age and Share of a 2-year lifespan are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Mouse age to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Mouse age is what you already know and Human-equivalent age and Mouse age is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/bacterial-concentration-calculator">Bacterial Concentration Calculator</a>, <a href="/biology/bacterial-growth-curve">Bacterial Growth Curve (generation time) Calculator</a> and <a href="/biology/basal-area">Basal area Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mouse to Human Age calculator work out?', 'a' => 'Human-equivalent age, Mouse age and Share of a 2-year lifespan, from Mouse age. The relationship is Mouse age = Mouse age × 4.345.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mouse age (months). Fill months and leave Human-equivalent age empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Mouse age, Human-equivalent age, Share of a 2-year lifespan and Mouse age blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Human-equivalent age is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Mouse age blank and the page solves for it, reporting Human-equivalent age instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Human-equivalent age at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/bacterial-concentration-calculator', 'name' => 'Bacterial Concentration Calculator'],
            ['path' => '/biology/bacterial-growth-curve', 'name' => 'Bacterial Growth Curve (generation time) Calculator'],
            ['path' => '/biology/basal-area', 'name' => 'Basal area Calculator'],
        ],
        'authors' => [],
    ],
];

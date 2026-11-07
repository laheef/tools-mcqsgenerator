<?php

/**
 * Chicken Years to Human Years Calculator
 * /biology/chicken-years-to-human-years
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Chicken Years to Human Years Calculator',
    'meta' => ['title' => 'Chicken Years to Human Years Calculator — Biology', 'description' => 'Chicken Years to Human Years turns Chicken age into Human-equivalent age and Share of a 10-year lifespan. It is a single relationship that reads…', 'h1' => 'Chicken Years to Human Years Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'years',
                            'label' => 'Chicken age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'help' => 'Use 0.5 for six months',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
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
                            'name' => 'lifespan',
                            'label' => 'Share of a 10-year lifespan',
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
            'results' => ['human' => 'years*5.33', 'lifespan' => 'years/10*100', 'years' => 'human/5.33'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Chicken Years to Human Years turns Chicken age into Human-equivalent age and Share of a 10-year lifespan. It is a single relationship that reads Human-equivalent age out of Chicken age, not a table of canned results keyed by them. Units for Human-equivalent age default to years and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Chicken Years to Human Years calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Chicken Years to Human Years: it takes 1 number and reports Human-equivalent age and Share of a 10-year lifespan.</p><p>The relationship it solves reads Human-equivalent age = Chicken age × 5.33.</p><p>The result panel carries Human-equivalent age and Share of a 10-year lifespan, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Chicken age</strong> — in years. Use 0.5 for six months</li></ul><p>The answers come back as Human-equivalent age in years, Share of a 10-year lifespan in %. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Human-equivalent age takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Human-equivalent age</strong> = <code>Chicken age × 5.33</code></li><li><strong>Share of a 10-year lifespan</strong> = <code>Chicken age ÷ 10 × 100</code></li><li><strong>Chicken age</strong> = <code>Human-equivalent age ÷ 5.33</code></li></ul><p>Any one of Human-equivalent age, Share of a 10-year lifespan and Chicken age can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Human-equivalent age and Share of a 10-year lifespan are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Chicken age to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Chicken age and the number you are missing is Human-equivalent age and Share of a 10-year lifespan.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/trypan-blue-cell-viability">Trypan Blue Cell Viability Calculator</a>, <a href="/biology/turtle-tank">Turtle tank Calculator</a> and <a href="/biology/vapor-pressure-deficit">Vapor pressure deficit Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Chicken Years to Human Years calculator work out?', 'a' => 'Human-equivalent age and Share of a 10-year lifespan, from Chicken age. The relationship is Human-equivalent age = Chicken age × 5.33.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Chicken age (years). With years in place, Human-equivalent age can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Human-equivalent age, Share of a 10-year lifespan and Chicken age blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Human-equivalent age is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Chicken age blank and the page solves for it, reporting Human-equivalent age instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Human-equivalent age keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/trypan-blue-cell-viability', 'name' => 'Trypan Blue Cell Viability Calculator'],
            ['path' => '/biology/turtle-tank', 'name' => 'Turtle tank Calculator'],
            ['path' => '/biology/vapor-pressure-deficit', 'name' => 'Vapor pressure deficit Calculator'],
        ],
        'authors' => [],
    ],
];

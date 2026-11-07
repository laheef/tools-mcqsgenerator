<?php

/**
 * Goat Years to Human Years Calculator
 * /biology/goat-years-to-human-years
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Goat Years to Human Years Calculator',
    'meta' => ['title' => 'Goat Years to Human Years Calculator — Biology', 'description' => 'Goat Years to Human Years works out Human-equivalent age and Share of an 18-year lifespan from Goat age. The arithmetic is the whole method: Human-equivalent…', 'h1' => 'Goat Years to Human Years Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Goat age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'help' => 'Use decimals for months, e.g. 0.5 for six months',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
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
                            'label' => 'Share of an 18-year lifespan',
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
            'results' => ['human' => 'if_else(years<=1, years*18, 18+(years-1)*2.5)', 'lifespan' => 'years/18*100', 'years' => 'if_else(human<=18, human/18, 1+(human-18)/2.5)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Goat Years to Human Years works out Human-equivalent age and Share of an 18-year lifespan from Goat age. The arithmetic is the whole method: Human-equivalent age is worked out from Goat age by one formula, applied once. Human-equivalent age comes back in years unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Goat Years to Human Years calculator works', 'html' => <<<'TXT'
            <p>Goat Years to Human Years answers one question from 1 number, and the answer is Human-equivalent age and Share of an 18-year lifespan.</p><p>In the form&#039;s own words, Human-equivalent age = if_else(Goat age&lt;=1, Goat age × 18, 18 + (Goat age − 1) × 2.5).</p><p>The answers are Human-equivalent age and Share of an 18-year lifespan; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Goat age</strong> — in years. Use decimals for months, e.g. 0.5 for six months</li></ul><p>The answers come back as Human-equivalent age in years, Share of an 18-year lifespan in %. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Human-equivalent age is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Human-equivalent age</strong> = <code>if_else(Goat age&lt;=1, Goat age × 18, 18 + (Goat age − 1) × 2.5)</code></li><li><strong>Share of an 18-year lifespan</strong> = <code>Goat age ÷ 18 × 100</code></li><li><strong>Goat age</strong> = <code>if_else(Human-equivalent age&lt;=18, Human-equivalent age ÷ 18, 1 + (Human-equivalent age − 18) ÷ 2.5)</code></li></ul><p>Any one of Human-equivalent age, Share of an 18-year lifespan and Goat age can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Human-equivalent age and Share of an 18-year lifespan are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Goat age to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Goat age and the number you are missing is Human-equivalent age and Share of an 18-year lifespan.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/cell-density">Cell Density Calculator</a>, <a href="/biology/cell-density-unit-converter">Cell Density Unit Converter Calculator</a> and <a href="/biology/cell-dilution">Cell dilution Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Goat Years to Human Years calculator work out?', 'a' => <<<'TXT'
            Human-equivalent age and Share of an 18-year lifespan, from Goat age. The relationship is Human-equivalent age = if_else(Goat age<=1, Goat age × 18, 18 + (Goat age − 1) × 2.5).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Goat age (years). With years in place, Human-equivalent age can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Human-equivalent age, Share of an 18-year lifespan and Goat age blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Human-equivalent age is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Goat age blank and the page solves for it, reporting Human-equivalent age instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Human-equivalent age keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/cell-density', 'name' => 'Cell Density Calculator'],
            ['path' => '/biology/cell-density-unit-converter', 'name' => 'Cell Density Unit Converter Calculator'],
            ['path' => '/biology/cell-dilution', 'name' => 'Cell dilution Calculator'],
        ],
        'authors' => [],
    ],
];

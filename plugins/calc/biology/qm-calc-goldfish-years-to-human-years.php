<?php

/**
 * Goldfish Years to Human Years Calculator
 * /biology/goldfish-years-to-human-years
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Goldfish Years to Human Years Calculator',
    'meta' => ['title' => 'Goldfish Years to Human Years Calculator — Biology', 'description' => 'Goldfish Years to Human Years works out Human-equivalent age and Share of a 20-year lifespan from Goldfish age. It is a single relationship that reads…', 'h1' => 'Goldfish Years to Human Years Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Goldfish age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'help' => 'Use 0.5 for six months',
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
                            'label' => 'Share of a 20-year lifespan',
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
            'results' => ['human' => 'if_else(years<=1, years*16.5, 16.5+(years-1)*4)', 'lifespan' => 'years/20*100', 'years' => 'if_else(human<=16.5, human/16.5, 1+(human-16.5)/4)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Goldfish Years to Human Years works out Human-equivalent age and Share of a 20-year lifespan from Goldfish age. It is a single relationship that reads Human-equivalent age out of Goldfish age, not a table of canned results keyed by them. Units for Human-equivalent age default to years and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Goldfish Years to Human Years calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Goldfish Years to Human Years: it takes 1 number and reports Human-equivalent age and Share of a 20-year lifespan.</p><p>In the form&#039;s own words, Human-equivalent age = if_else(Goldfish age&lt;=1, Goldfish age × 16.5, 16.5 + (Goldfish age − 1) × 4).</p><p>The result panel carries Human-equivalent age and Share of a 20-year lifespan, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Goldfish age</strong> — in years. Use 0.5 for six months</li></ul><p>The answers come back as Human-equivalent age in years, Share of a 20-year lifespan in %. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Human-equivalent age is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Human-equivalent age</strong> = <code>if_else(Goldfish age&lt;=1, Goldfish age × 16.5, 16.5 + (Goldfish age − 1) × 4)</code></li><li><strong>Share of a 20-year lifespan</strong> = <code>Goldfish age ÷ 20 × 100</code></li><li><strong>Goldfish age</strong> = <code>if_else(Human-equivalent age&lt;=16.5, Human-equivalent age ÷ 16.5, 1 + (Human-equivalent age − 16.5) ÷ 4)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Human-equivalent age, Share of a 20-year lifespan and Goldfish age can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Human-equivalent age and Share of a 20-year lifespan are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Goldfish age is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Goldfish age and the number you are missing is Human-equivalent age and Share of a 20-year lifespan.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/cheng-prusoff-equation">Cheng-Prusoff Equation Calculator</a>, <a href="/biology/chi-square-genetics-test">Chi-Square Test for Genetics Calculator</a> and <a href="/biology/chicken-density">Chicken Density Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Goldfish Years to Human Years calculator work out?', 'a' => <<<'TXT'
            Human-equivalent age and Share of a 20-year lifespan, from Goldfish age. The relationship is Human-equivalent age = if_else(Goldfish age<=1, Goldfish age × 16.5, 16.5 + (Goldfish age − 1) × 4).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Goldfish age (years). Enter years; Human-equivalent age is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Human-equivalent age, Share of a 20-year lifespan and Goldfish age can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Human-equivalent age is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Goldfish age left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Human-equivalent age keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/cheng-prusoff-equation', 'name' => 'Cheng-Prusoff Equation Calculator'],
            ['path' => '/biology/chi-square-genetics-test', 'name' => 'Chi-Square Test for Genetics Calculator'],
            ['path' => '/biology/chicken-density', 'name' => 'Chicken Density Calculator'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * Annealing temperature
 * /biology/annealing-temperature
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Annealing temperature',
    'meta' => ['title' => 'Annealing temperature: Formula, Steps & Results', 'description' => <<<'TXT'
    Annealing temperature turns Primer melting temperature and Annealing temperature (Tₐ) into Target melting temperature. It is a single relationship that reads…
    TXT, 'h1' => 'Annealing temperature Calculator', 'updated' => '2026-07-23'],
    'raw' => [
        'vars' => [
            'annealing_temp' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'temp_primer' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'temp_product' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'wIu49XuazM5Q28a1RVIk7',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'temp_primer',
                                    'vt' => 'numerical',
                                    'l' => 'Primer melting temperature',
                                    'h' => 'Consider the less stable primer.',
                                    'us' => '40',
                                    'du' => 'C',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'temp_product',
                                    'vt' => 'numerical',
                                    'l' => 'Target melting temperature',
                                    'us' => '40',
                                    'du' => 'C',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'annealing_temp',
                                    'vt' => 'numerical',
                                    'l' => 'Annealing temperature (Tₐ)',
                                    'us' => '40',
                                    'du' => 'C',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        ['annealing_temp>65  or annealing_temp < 50', 'The annealing temperature is out of the suggested range of 50 to 65 °C.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'annealing_temp=(0.3*temp_primer)+(0.7*temp_product)-14.9',
                'var' => [
                    [
                        'l' => 'temp_product',
                        'f' => '(10/7)*annealing_temp - 3/7*temp_primer + 149/7',
                        'r' => ['temp_primer', 'annealing_temp'],
                    ],
                    [
                        'l' => 'temp_primer',
                        'f' => '(10/3)*annealing_temp - 7/3*temp_product + 149/3',
                        'r' => ['temp_product', 'annealing_temp'],
                    ],
                    [
                        'l' => 'annealing_temp',
                        'f' => '(3/10)*temp_primer + (7/10)*temp_product - 149/10',
                        'r' => ['temp_product', 'temp_primer'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Annealing temperature turns Primer melting temperature and Annealing temperature (Tₐ) into Target melting temperature. It is a single relationship that reads Target melting temperature out of Primer melting temperature, not a table of canned results keyed by them. Units for Target melting temperature default to Celsius and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Annealing temperature calculator works', 'html' => <<<'TXT'
            <p>The Annealing temperature calculator applies one relationship to 2 numbers and reports Target melting temperature.</p><p>The relationship it solves reads Target melting temperature = (10 ÷ 7) × Annealing temperature (Tₐ) − 3 ÷ 7 × Primer melting temperature + 149 ÷ 7.</p><p>What comes back is Target melting temperature — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Primer melting temperature</strong> — in Celsius. Consider the less stable primer.</li><li><strong>Annealing temperature (Tₐ)</strong> — in Celsius</li></ul><p>What you get back is Target melting temperature in Celsius, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Primer melting temperature = 10 C and Annealing temperature (Tₐ) = 100 C gives &lt;strong&gt;Target melting temperature&lt;/strong&gt; = 160 C.</p><ul><li><strong>Target melting temperature</strong> = 160 C</li></ul><p>That is <strong>Target melting temperature</strong> = <code>(10 ÷ 7) × Annealing temperature (Tₐ) − 3 ÷ 7 × Primer melting temperature + 149 ÷ 7</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Target melting temperature&lt;/strong&gt; = 160 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Target melting temperature offers 28 units and opens on Celsius, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Target melting temperature</strong> = <code>(10 ÷ 7) × Annealing temperature (Tₐ) − 3 ÷ 7 × Primer melting temperature + 149 ÷ 7</code></li><li><strong>Primer melting temperature</strong> = <code>(10 ÷ 3) × Annealing temperature (Tₐ) − 7 ÷ 3 × Target melting temperature + 149 ÷ 3</code></li><li><strong>Annealing temperature (Tₐ)</strong> = <code>(3 ÷ 10) × Primer melting temperature + (7 ÷ 10) × Target melting temperature − 149 ÷ 10</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Target melting temperature, Primer melting temperature and Annealing temperature (Tₐ) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Primer melting temperature from 10 to 20, leaving every other box alone. The panel moves from &lt;strong&gt;Target melting temperature&lt;/strong&gt; 160 C to &lt;strong&gt;Target melting temperature&lt;/strong&gt; 156 C.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Primer melting temperature and Annealing temperature (Tₐ) is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Target melting temperature is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Primer melting temperature to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Primer melting temperature and Annealing temperature (Tₐ) and the number you are missing is Target melting temperature.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/plant-population">Plant population Calculator</a>, <a href="/biology/plants">Plant spacing Calculator</a> and <a href="/biology/plants-per-hectare">Plants Per Hectare Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Annealing temperature calculator work out?', 'a' => <<<'TXT'
            Target melting temperature, from Primer melting temperature and Annealing temperature (Tₐ). The relationship is Target melting temperature = (10 ÷ 7) × Annealing temperature (Tₐ) − 3 ÷ 7 × Primer melting temperature + 149 ÷ 7.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Primer melting temperature (Celsius), Annealing temperature (Tₐ) (Celsius). Fill temp_primer and annealing_temp and leave Target melting temperature empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Target melting temperature, Primer melting temperature and Annealing temperature (Tₐ) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Target melting temperature = 160 C. The figures come from Primer melting temperature as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Target melting temperature is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Primer melting temperature left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Target melting temperature at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/plant-population', 'name' => 'Plant population Calculator'],
            ['path' => '/biology/plants', 'name' => 'Plant spacing Calculator'],
            ['path' => '/biology/plants-per-hectare', 'name' => 'Plants Per Hectare Calculator'],
        ],
        'authors' => [],
    ],
];

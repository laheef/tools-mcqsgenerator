<?php

/**
 * Specific Growth Rate from OD
 * /biology/specific-growth-rate-od
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Specific Growth Rate from OD',
    'meta' => ['title' => 'Specific Growth Rate from OD — Formula & Results', 'description' => <<<'TXT'
    Specific Growth Rate from OD turns First OD₆₀₀, Second OD₆₀₀ and First reading at into Specific growth rate and Doubling time. It is a single relationship…
    TXT, 'h1' => 'Specific Growth Rate from OD', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'od1',
                            'label' => 'First OD₆₀₀',
                            'type' => 'number',
                            'help' => 'Blank subtracted, in the linear range',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.15',
                        ],
                        [
                            'name' => 'od2',
                            'label' => 'Second OD₆₀₀',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.62',
                        ],
                        [
                            'name' => 't1',
                            'label' => 'First reading at',
                            'type' => 'number',
                            'suffix' => 'h',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 't2',
                            'label' => 'Second reading at',
                            'type' => 'number',
                            'suffix' => 'h',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                        [
                            'name' => 'mu',
                            'label' => 'Specific growth rate',
                            'type' => 'number',
                            'suffix' => '1/h',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'doubling',
                            'label' => 'Doubling time',
                            'type' => 'number',
                            'suffix' => 'min',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'generations',
                            'label' => 'Generations',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rate_per_day',
                            'label' => 'Growth rate',
                            'type' => 'number',
                            'suffix' => '1/day',
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
            'title' => 'Growth',
            'results' => ['mu' => 'ln(od2/od1)/(t2-t1)', 'doubling' => 'ln(2)/mu*60', 'generations' => 'mu*(t2-t1)/ln(2)', 'rate_per_day' => 'mu*24'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Specific Growth Rate from OD turns First OD₆₀₀, Second OD₆₀₀ and First reading at into Specific growth rate and Doubling time. It is a single relationship that reads Specific growth rate out of First OD₆₀₀, not a table of canned results keyed by them. Units for Specific growth rate default to 1/h and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Specific Growth Rate from OD calculator works', 'html' => <<<'TXT'
            <p>The Specific Growth Rate from OD calculator applies one relationship to 4 numbers and reports Specific growth rate, Doubling time and Generations.</p><p>In the form&#039;s own words, Specific growth rate = ln(Second OD₆₀₀ ÷ First OD₆₀₀) ÷ (Second reading at − First reading at).</p><p>The result panel carries Specific growth rate, Doubling time, Generations and Growth rate, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>First OD₆₀₀</strong> — a plain number, no unit. Blank subtracted, in the linear range</li><li><strong>Second OD₆₀₀</strong> — a plain number, no unit</li><li><strong>First reading at</strong> — in h</li><li><strong>Second reading at</strong> — in h</li></ul><p>The result boxes are Specific growth rate in 1/h, Doubling time in min, Generations, Growth rate in 1/day; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, First OD₆₀₀ = 0.15, Second OD₆₀₀ = 0.62, First reading at = 5 h and Second reading at = 3 h gives &lt;strong&gt;Specific growth rate&lt;/strong&gt; = -0.7095 1/h, &lt;strong&gt;Doubling time&lt;/strong&gt; = -58.61 min, &lt;strong&gt;Generations&lt;/strong&gt; = 2.05 and &lt;strong&gt;Growth rate&lt;/strong&gt; = -17.03 1/day.</p><ul><li><strong>Specific growth rate</strong> = -0.7095 1/h</li><li><strong>Doubling time</strong> = -58.61 min</li><li><strong>Generations</strong> = 2.05</li><li><strong>Growth rate</strong> = -17.03 1/day</li></ul><p>That is <strong>Specific growth rate</strong> = <code>ln(Second OD₆₀₀ ÷ First OD₆₀₀) ÷ (Second reading at − First reading at)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Specific growth rate&lt;/strong&gt; = -0.7095, &lt;strong&gt;Doubling time&lt;/strong&gt; = -58.61, &lt;strong&gt;Generations&lt;/strong&gt; = 2.05 and &lt;strong&gt;Growth rate&lt;/strong&gt; = -17.03 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Specific growth rate takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Specific growth rate</strong> = <code>ln(Second OD₆₀₀ ÷ First OD₆₀₀) ÷ (Second reading at − First reading at)</code></li><li><strong>Doubling time</strong> = <code>ln(2) ÷ Specific growth rate × 60</code></li><li><strong>Generations</strong> = <code>Specific growth rate × (Second reading at − First reading at) ÷ ln(2)</code></li><li><strong>Growth rate</strong> = <code>Specific growth rate × 24</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Specific growth rate, Doubling time and Generations can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double First OD₆₀₀ from 0.15 to 0.3, leaving every other box alone. The panel moves from &lt;strong&gt;Specific growth rate&lt;/strong&gt; -0.7095 1/h, &lt;strong&gt;Doubling time&lt;/strong&gt; -58.61 min, &lt;strong&gt;Generations&lt;/strong&gt; 2.05 and &lt;strong&gt;Growth rate&lt;/strong&gt; -17.03 1/day to &lt;strong&gt;Specific growth rate&lt;/strong&gt; -0.363 1/h, &lt;strong&gt;Doubling time&lt;/strong&gt; -115 min, &lt;strong&gt;Generations&lt;/strong&gt; 1.05 and &lt;strong&gt;Growth rate&lt;/strong&gt; -8.71 1/day.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Specific growth rate, Doubling time and Generations are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert First OD₆₀₀ to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are First OD₆₀₀, Second OD₆₀₀ and First reading at and the number you are missing is Specific growth rate and Doubling time.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/huglin-index">Huglin Index Calculator</a>, <a href="/biology/hunting-tooth-ratio">Hunting Tooth Ratio Calculator</a> and <a href="/biology/ideal-fish-tank-size">Ideal Fish Tank Size Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Specific Growth Rate from OD calculator work out?', 'a' => <<<'TXT'
            Specific growth rate, Doubling time, Generations and Growth rate, from Second OD₆₀₀, First OD₆₀₀, Second reading at and First reading at. The relationship is Specific growth rate = ln(Second OD₆₀₀ ÷ First OD₆₀₀) ÷ (Second reading at − First reading at).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            First OD₆₀₀, Second OD₆₀₀, First reading at (h), Second reading at (h). Enter od1, od2 and t1; Specific growth rate is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Specific growth rate, Doubling time, Generations and Growth rate can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Specific growth rate = -0.7095 1/h, Doubling time = -58.61 min, Generations = 2.05 and Growth rate = -17.03 1/day. Those are the defaults written into the form — move First OD₆₀₀ and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Specific growth rate is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave First OD₆₀₀ blank and the page solves for it, reporting Specific growth rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Specific growth rate at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/huglin-index', 'name' => 'Huglin Index Calculator'],
            ['path' => '/biology/hunting-tooth-ratio', 'name' => 'Hunting Tooth Ratio Calculator'],
            ['path' => '/biology/ideal-fish-tank-size', 'name' => 'Ideal Fish Tank Size Calculator'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * Cell doubling time
 * /biology/cell-doubling-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell doubling time',
    'meta' => ['title' => 'Cell doubling time: Formula, Steps & Results', 'description' => 'Enter Final reference parameter, Time duration and Growth rate into Cell doubling time and the answer comes back as Initial reference parameter and Doubling…', 'h1' => 'Cell doubling time Calculator', 'updated' => '2024-07-30'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_concentration',
                            'label' => 'Initial reference parameter',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            This parameter should be related to cell growth. For example, it could be cell number, concentration, or confluency. You should measure the same parameter at the beginning and end of the experiment.
                            TXT,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_concentration',
                            'label' => 'Final reference parameter',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time',
                            'label' => 'Time duration',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'growth_rate',
                            'label' => 'Growth rate',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'doubling_time',
                            'label' => 'Doubling time',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrsmin',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'growth_rate = log(final_concentration/initial_concentration)/time',
            'results' => ['initial_concentration' => 'final_concentration*exp(-growth_rate*time)', 'time' => 'log(final_concentration/initial_concentration)/growth_rate', 'final_concentration' => 'initial_concentration*exp(growth_rate*time)', 'growth_rate' => 'log(final_concentration/initial_concentration)/time'],
        ],
        [
            'title' => 'doubling_time = log(2)/growth_rate ',
            'results' => ['doubling_time' => 'log(2)/growth_rate', 'growth_rate' => 'log(2)/doubling_time'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Final reference parameter, Time duration and Growth rate into Cell doubling time and the answer comes back as Initial reference parameter and Doubling time. There is no hidden constant here: change Initial reference parameter and Final reference parameter moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Cell doubling time calculator works', 'html' => <<<'TXT'
            <p>Cell doubling time answers one question from 3 numbers, and the answer is Initial reference parameter and Doubling time.</p><p>The relationship it solves reads Initial reference parameter = Final reference parameter × e^( − Growth rate × Time duration).</p><p>The answers are Initial reference parameter and Doubling time; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Final reference parameter</strong> — a plain number, no unit</li><li><strong>Time duration</strong> — in hours</li><li><strong>Growth rate</strong> — in hours</li></ul><p>The answers come back as Initial reference parameter, Doubling time in hours / minutes. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Final reference parameter = 10, Time duration = 100 hrs and Growth rate = 1000 hrs; the answers are &lt;strong&gt;Initial reference parameter&lt;/strong&gt; = 0 and &lt;strong&gt;Doubling time&lt;/strong&gt; = 6.931e-4 hrsmin.</p><ul><li><strong>Initial reference parameter</strong> = 0</li><li><strong>Doubling time</strong> = 6.931e-4 hrsmin</li></ul><p>The line behind those figures is <strong>Initial reference parameter</strong> = <code>Final reference parameter × e^( − Growth rate × Time duration)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Initial reference parameter&lt;/strong&gt; = 0 and &lt;strong&gt;Doubling time&lt;/strong&gt; = 6.931e-4. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Doubling time lists 18 options and opens on hours / minutes. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Initial reference parameter</strong> = <code>Final reference parameter × e^( − Growth rate × Time duration)</code></li><li><strong>Time duration</strong> = <code>ln(Final reference parameter ÷ Initial reference parameter) ÷ Growth rate</code></li><li><strong>Final reference parameter</strong> = <code>Initial reference parameter × e^(Growth rate × Time duration)</code></li><li><strong>Growth rate</strong> = <code>ln(Final reference parameter ÷ Initial reference parameter) ÷ Time duration</code></li><li><strong>Doubling time</strong> = <code>ln(2) ÷ Growth rate</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Initial reference parameter, Time duration and Final reference parameter can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Final reference parameter from 10 to 20, leaving every other box alone. The panel moves from &lt;strong&gt;Initial reference parameter&lt;/strong&gt; 0 and &lt;strong&gt;Doubling time&lt;/strong&gt; 6.931e-4 hrsmin to &lt;strong&gt;Initial reference parameter&lt;/strong&gt; 0 and &lt;strong&gt;Doubling time&lt;/strong&gt; 6.931e-4 hrsmin.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Time duration and Growth rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Initial reference parameter and Doubling time are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Final reference parameter to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Final reference parameter, Time duration and Growth rate measured, Initial reference parameter and Doubling time wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dog-quality-of-life">Dog quality of life</a>, <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity Calculator</a> and <a href="/biology/dog-size">Dog size Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cell doubling time calculator work out?', 'a' => <<<'TXT'
            Initial reference parameter and Doubling time, from Final reference parameter, Growth rate and Time duration. The relationship is Initial reference parameter = Final reference parameter × e^( − Growth rate × Time duration).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Final reference parameter, Time duration (hours), Growth rate (hours). With final_concentration, time and growth_rate in place, Initial reference parameter can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Initial reference parameter, Time duration, Final reference parameter and Growth rate can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Initial reference parameter = 0 and Doubling time = 6.931e-4 hrsmin. The figures come from Final reference parameter as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Initial reference parameter is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Final reference parameter left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Initial reference parameter keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dog-quality-of-life', 'name' => 'Dog quality of life'],
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
            ['path' => '/biology/dog-size', 'name' => 'Dog size Calculator'],
        ],
        'authors' => [],
    ],
];

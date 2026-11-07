<?php

/**
 * PCR Cycle Calculator
 * /biology/pcr-cycle-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'PCR Cycle Calculator',
    'meta' => ['title' => 'PCR Cycle Calculator: Formula, Steps & Results', 'description' => <<<'TXT'
    PCR Cycle works out Time per cycle and Total run time from Denaturation time, Annealing time and Extension time. There is no hidden constant here: change Time…
    TXT, 'h1' => 'PCR Cycle Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'denature_t',
                            'label' => 'Denaturation time',
                            'type' => 'number',
                            'suffix' => 's',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'anneal_t',
                            'label' => 'Annealing time',
                            'type' => 'number',
                            'suffix' => 's',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'extend_t',
                            'label' => 'Extension time',
                            'type' => 'number',
                            'suffix' => 's',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '45',
                        ],
                        [
                            'name' => 'cycles',
                            'label' => 'Cycles',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '35',
                        ],
                        [
                            'name' => 'ramp',
                            'label' => 'Ramp time between steps',
                            'type' => 'number',
                            'suffix' => 's',
                            'help' => 'Per transition',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'copies',
                            'label' => 'Starting copies',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'efficiency',
                            'label' => 'Amplification efficiency',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => '100% doubles every cycle',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '95',
                        ],
                        [
                            'name' => 'cycle_time',
                            'label' => 'Time per cycle',
                            'type' => 'number',
                            'suffix' => 's',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_time',
                            'label' => 'Total run time',
                            'type' => 'number',
                            'suffix' => 'min',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'final_copies',
                            'label' => 'Copies at the end',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fold',
                            'label' => 'Fold amplification',
                            'type' => 'number',
                            'suffix' => 'x',
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
            'title' => 'Run',
            'results' => ['cycle_time' => 'denature_t+anneal_t+extend_t+3*ramp', 'total_time' => '(denature_t+anneal_t+extend_t+3*ramp)*cycles/60', 'fold' => 'pow(1+efficiency/100,cycles)', 'final_copies' => 'copies*pow(1+efficiency/100,cycles)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        PCR Cycle works out Time per cycle and Total run time from Denaturation time, Annealing time and Extension time. There is no hidden constant here: change Time per cycle and Denaturation time moves with it. The main result, Time per cycle, is reported in s.
        TXT,
        'sections' => [
            ['title' => 'How the PCR Cycle calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind PCR Cycle: it takes 7 numbers and reports Time per cycle, Total run time and Copies at the end.</p><p>In the form&#039;s own words, Time per cycle = Denaturation time + Annealing time + Extension time + 3 × Ramp time between steps.</p><p>The answers are Time per cycle, Total run time, Copies at the end and Fold amplification; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 7 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Denaturation time</strong> — in s</li><li><strong>Annealing time</strong> — in s</li><li><strong>Extension time</strong> — in s</li><li><strong>Cycles</strong> — a plain number, no unit</li><li><strong>Ramp time between steps</strong> — in s. Per transition</li><li><strong>Starting copies</strong> — a plain number, no unit</li><li><strong>Amplification efficiency</strong> — in %. 100% doubles every cycle</li></ul><p>What you get back is Time per cycle in s, Total run time in min, Copies at the end, Fold amplification in x, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Denaturation time = 30 s, Annealing time = 30 s, Extension time = 45 s, Cycles = 35, Ramp time between steps = 4 s, Starting copies = 1000 and Amplification efficiency = 95 %; the answers are &lt;strong&gt;Time per cycle&lt;/strong&gt; = 117 s, &lt;strong&gt;Total run time&lt;/strong&gt; = 68.25 min, &lt;strong&gt;Fold amplification&lt;/strong&gt; = 1.416e+1 x and &lt;strong&gt;Copies at the end&lt;/strong&gt; = 1.416e+13.</p><ul><li><strong>Time per cycle</strong> = 117 s</li><li><strong>Total run time</strong> = 68.25 min</li><li><strong>Fold amplification</strong> = 1.416e+1 x</li><li><strong>Copies at the end</strong> = 1.416e+13</li></ul><p>The line behind those figures is <strong>Time per cycle</strong> = <code>Denaturation time + Annealing time + Extension time + 3 × Ramp time between steps</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Time per cycle&lt;/strong&gt; = 117, &lt;strong&gt;Total run time&lt;/strong&gt; = 68.25, &lt;strong&gt;Fold amplification&lt;/strong&gt; = 1.416e+1 and &lt;strong&gt;Copies at the end&lt;/strong&gt; = 1.416e+13. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Time per cycle is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Time per cycle</strong> = <code>Denaturation time + Annealing time + Extension time + 3 × Ramp time between steps</code></li><li><strong>Total run time</strong> = <code>(Denaturation time + Annealing time + Extension time + 3 × Ramp time between steps) × Cycles ÷ 60</code></li><li><strong>Fold amplification</strong> = <code>(1 + Amplification efficiency ÷ 100)^(Cycles)</code></li><li><strong>Copies at the end</strong> = <code>Starting copies × (1 + Amplification efficiency ÷ 100)^(Cycles)</code></li></ul><p>Any one of Time per cycle, Total run time and Fold amplification can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Denaturation time from 30 to 60, leaving every other box alone. The panel moves from &lt;strong&gt;Time per cycle&lt;/strong&gt; 117 s, &lt;strong&gt;Total run time&lt;/strong&gt; 68.25 min, &lt;strong&gt;Fold amplification&lt;/strong&gt; 1.416e+1 x and &lt;strong&gt;Copies at the end&lt;/strong&gt; 1.416e+13 to &lt;strong&gt;Time per cycle&lt;/strong&gt; 147 s, &lt;strong&gt;Total run time&lt;/strong&gt; 85.75 min, &lt;strong&gt;Fold amplification&lt;/strong&gt; 1.416e+1 x and &lt;strong&gt;Copies at the end&lt;/strong&gt; 1.416e+13.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Time per cycle, Total run time and Copies at the end are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Denaturation time and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Denaturation time, Annealing time and Extension time measured, Time per cycle and Total run time wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/pasture-stocking-rate">Pasture Stocking Rate Calculator</a>, <a href="/biology/pcr-annealing-temperature">PCR Annealing Temperature Calculator</a> and <a href="/biology/pcr-master-mix-calculator">PCR Master Mix Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the PCR Cycle calculator work out?', 'a' => <<<'TXT'
            Time per cycle, Total run time, Copies at the end and Fold amplification, from Denaturation time, Annealing time, Extension time and Ramp time between steps. The relationship is Time per cycle = Denaturation time + Annealing time + Extension time + 3 × Ramp time between steps.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Denaturation time (s), Annealing time (s), Extension time (s), Cycles, Ramp time between steps (s). Enter denature_t, anneal_t and extend_t; Time per cycle is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Time per cycle, Total run time, Fold amplification and Copies at the end blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Time per cycle = 117 s, Total run time = 68.25 min, Fold amplification = 1.416e+1 x and Copies at the end = 1.416e+13. Those are the defaults written into the form — move Denaturation time and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Time per cycle is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Denaturation time left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Time per cycle at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/pasture-stocking-rate', 'name' => 'Pasture Stocking Rate Calculator'],
            ['path' => '/biology/pcr-annealing-temperature', 'name' => 'PCR Annealing Temperature Calculator'],
            ['path' => '/biology/pcr-master-mix-calculator', 'name' => 'PCR Master Mix Calculator'],
        ],
        'authors' => [],
    ],
];

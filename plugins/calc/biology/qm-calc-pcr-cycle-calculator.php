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
    'meta' => ['title' => 'PCR Cycle Calculator: Formula, Steps & Example', 'description' => 'PCR Cycle Calculator takes denaturation time, annealing time and extension time and returns time per cycle and total run time. It returns time per cycle.', 'h1' => 'PCR Cycle Calculator', 'updated' => '2026-10-29'],
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
        PCR Cycle works out Time per cycle and Total run time from Denaturation time, Annealing time and Extension time. There is no hidden constant here: change time per cycle and denaturation time moves with it. The main result, Time per cycle, is reported in s.
        TXT,
        'sections' => [
            ['title' => 'How the PCR Cycle calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind PCR Cycle: it takes 7 numbers and reports Time per cycle, Total run time and Copies at the end.</p><p>In the form&#039;s own words, Time per cycle = Denaturation time + Annealing time + Extension time + 3 × Ramp time between steps.</p><p>The answers are Time per cycle, Total run time, Copies at the end and Fold amplification; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 7 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Denaturation time</strong> — in s</li><li><strong>Annealing time</strong> — in s</li><li><strong>Extension time</strong> — in s</li><li><strong>Cycles</strong> — a plain number, no unit</li><li><strong>Ramp time between steps</strong> — in s. Per transition</li><li><strong>Starting copies</strong> — a plain number, no unit</li><li><strong>Amplification efficiency</strong> — in %. 100% doubles every cycle</li></ul><p>What you get back is Time per cycle in s, Total run time in min, Copies at the end, Fold amplification in x, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Denaturation time = 30 s, Annealing time = 30 s, Extension time = 45 s, Cycles = 35, Ramp time between steps = 4 s, Starting copies = 1000 and Amplification efficiency = 95 %; the answers are <strong>Time per cycle</strong> = 117 s, <strong>Total run time</strong> = 68.25 min, <strong>Fold amplification</strong> = 1.416e+1 x and <strong>Copies at the end</strong> = 1.416e+13.</p><ul><li><strong>Time per cycle</strong> = 117 s</li><li><strong>Total run time</strong> = 68.25 min</li><li><strong>Fold amplification</strong> = 1.416e+1 x</li><li><strong>Copies at the end</strong> = 1.416e+13</li></ul><p>The line behind those figures is <strong>Time per cycle</strong> = <code>Denaturation time + Annealing time + Extension time + 3 × Ramp time between steps</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Time per cycle</strong> = 117, <strong>Total run time</strong> = 68.25, <strong>Fold amplification</strong> = 1.416e+1 and <strong>Copies at the end</strong> = 1.416e+13. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Time per cycle is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Time per cycle</strong> = <code>Denaturation time + Annealing time + Extension time + 3 × Ramp time between steps</code></li><li><strong>Total run time</strong> = <code>(Denaturation time + Annealing time + Extension time + 3 × Ramp time between steps) × Cycles ÷ 60</code></li><li><strong>Fold amplification</strong> = <code>(1 + Amplification efficiency ÷ 100)^(Cycles)</code></li><li><strong>Copies at the end</strong> = <code>Starting copies × (1 + Amplification efficiency ÷ 100)^(Cycles)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Time per cycle</strong> = <code>Denaturation time + Annealing time + Extension time + 3 × Ramp time between steps</code> — the form to use when Denaturation time, Annealing time, Extension time and Ramp time between steps are the values you have.</li><li><strong>Total run time</strong> = <code>(Denaturation time + Annealing time + Extension time + 3 × Ramp time between steps) × Cycles ÷ 60</code> — the form to use when Denaturation time, Annealing time, Extension time and Ramp time between steps are the values you have.</li><li><strong>Fold amplification</strong> = <code>(1 + Amplification efficiency ÷ 100)^(Cycles)</code> — the form to use when Amplification efficiency and Cycles are the values you have.</li><li><strong>Copies at the end</strong> = <code>Starting copies × (1 + Amplification efficiency ÷ 100)^(Cycles)</code> — the form to use when Starting copies, Amplification efficiency and Cycles are the values you have.</li></ul><p>Any one of Time per cycle, Total run time and Fold amplification can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Denaturation time from 30 to 60, leaving every other box alone. The panel moves from <strong>Time per cycle</strong> 117 s, <strong>Total run time</strong> 68.25 min, <strong>Fold amplification</strong> 1.416e+1 x and <strong>Copies at the end</strong> 1.416e+13 to <strong>Time per cycle</strong> 147 s, <strong>Total run time</strong> 85.75 min, <strong>Fold amplification</strong> 1.416e+1 x and <strong>Copies at the end</strong> 1.416e+13.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Time per cycle, Total run time and Copies at the end are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Denaturation time left as a guess.</strong> Anything typed into Denaturation time is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Annealing time left as a guess.</strong> Anything typed into Annealing time is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Extension time left as a guess.</strong> Anything typed into Extension time is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Denaturation time and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Denaturation time</strong> is measured in s. Change it and Time per cycle and Total run time changes with it. Have it to hand before you start: Denaturation time is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Annealing time</strong> is measured in s. Change it and Time per cycle and Total run time changes with it. Have it to hand before you start: Annealing time is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Extension time</strong> is measured in s. Change it and Time per cycle and Total run time changes with it. Have it to hand before you start: Extension time is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Cycles</strong> takes a plain number with no unit attached. Change it and Total run time, Fold amplification and Copies at the end changes with it. Have it to hand before you start: Cycles is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Ramp time between steps</strong> is measured in s. Per transition. Change it and Time per cycle and Total run time changes with it. Have it to hand before you start: Ramp time between steps is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Starting copies</strong> takes a plain number with no unit attached. Change it and Copies at the end changes with it. Have it to hand before you start: Starting copies is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Amplification efficiency</strong> is measured in %. 100% doubles every cycle. Change it and Fold amplification and Copies at the end changes with it. Have it to hand before you start: Amplification efficiency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Time per cycle</strong> is a plain number and the page's own defaults put it at 117. It is worked out from Denaturation time, Annealing time, Extension time and Ramp time between steps. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total run time</strong> is a plain number and the page's own defaults put it at 68.25. It is worked out from Denaturation time, Annealing time, Extension time and Ramp time between steps. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Copies at the end</strong> is a plain number and the page's own defaults put it at 1.416e+13. It is worked out from Starting copies, Amplification efficiency and Cycles. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Fold amplification</strong> is a plain number and the page's own defaults put it at 1.416e+1. It is worked out from Amplification efficiency and Cycles. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Time per cycle</th><th>Total run time</th><th>Fold amplification</th><th>Copies at the end</th></tr></thead><tbody><tr><td><strong>Denaturation time</strong> +10%</td><td>+2.56%</td><td>+2.56%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Annealing time</strong> +10%</td><td>+2.56%</td><td>+2.56%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Extension time</strong> +10%</td><td>+3.85%</td><td>+3.85%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Cycles</strong> +10%</td><td>+0%</td><td>+10%</td><td>+935%</td><td>+935%</td></tr><tr><td><strong>Ramp time between steps</strong> +10%</td><td>+1.03%</td><td>+1.03%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Starting copies</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Amplification efficiency</strong> +10%</td><td>+0%</td><td>+0%</td><td>+429%</td><td>+429%</td></tr></tbody></table><p>The steepest column belongs to Cycles: ten per cent there moves an answer by about 935 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Denaturation time = 15 s, Annealing time = 15 s, Extension time = 22.5 s, Cycles = 17.5, Ramp time between steps = 2 s, Starting copies = 500 and Amplification efficiency = 47.5 %, the answer is <strong>Time per cycle</strong> = 58.5 s, <strong>Total run time</strong> = 17.06 min, <strong>Fold amplification</strong> = 899 x and <strong>Copies at the end</strong> = 449604.</li><li>With Denaturation time = 90 s, Annealing time = 30 s, Extension time = 45 s, Cycles = 35, Ramp time between steps = 4 s, Starting copies = 1000 and Amplification efficiency = 95 %, the answer is <strong>Time per cycle</strong> = 177 s, <strong>Total run time</strong> = 103 min, <strong>Fold amplification</strong> = 1.416e+1 x and <strong>Copies at the end</strong> = 1.416e+13.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Time per cycle is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
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
            Denaturation time (s), Annealing time (s), Extension time (s), Cycles, Ramp time between steps (s). Enter denaturation time, annealing time and extension time; Time per cycle is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Time per cycle, Total run time, Fold amplification and Copies at the end blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Time per cycle = 117 s, Total run time = 68.25 min, Fold amplification = 1.416e+1 x and Copies at the end = 1.416e+13. Those are the defaults written into the form — move Denaturation time and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Time per cycle is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
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

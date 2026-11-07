<?php

/**
 * Log Reduction
 * /biology/log-reduction
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Log Reduction',
    'meta' => ['title' => 'Log Reduction Calculator — Formula & Results', 'description' => 'Log Reduction works out Final CFU amount and Perecentage reduction from Initial CFU amount and Log reduction. Final CFU amount and Perecentage reduction are…', 'h1' => 'Log Reduction Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_CFU',
                            'label' => 'Initial CFU amount',
                            'type' => 'number',
                            'help' => 'Amount of Colony Forming Units in sample before treatment.',
                            'unit' => '120',
                            'unit_default' => 'x10e7',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_CFU',
                            'label' => 'Final CFU amount',
                            'type' => 'number',
                            'help' => 'Amount of Colony Forming Units in sample after treatment.',
                            'unit' => '120',
                            'unit_default' => 'x10e5',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'log_reduction',
                            'label' => 'Log reduction',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'perecentage_reduction',
                            'label' => 'Perecentage reduction',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.00001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'log_reduction = log(initial_CFU/final_CFU)/log(10)',
            'results' => ['final_CFU' => 'initial_CFU*exp(-log_reduction*log(10))', 'log_reduction' => 'log(initial_CFU/final_CFU)/log(10)', 'initial_CFU' => 'final_CFU*exp(log_reduction*log(10))'],
        ],
        [
            'title' => 'perecentage_reduction = (initial_CFU - final_CFU)/initial_CFU',
            'results' => ['final_CFU' => 'initial_CFU*(1 - perecentage_reduction)', 'perecentage_reduction' => '(-final_CFU + initial_CFU)/initial_CFU', 'initial_CFU' => '-final_CFU/(perecentage_reduction - 1)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Log Reduction works out Final CFU amount and Perecentage reduction from Initial CFU amount and Log reduction. There is no hidden constant here: change Final CFU amount and Initial CFU amount moves with it. The main result, Final CFU amount, is reported in times 10 to the 5.
        TXT,
        'sections' => [
            ['title' => 'How the Log Reduction calculator works', 'html' => <<<'TXT'
            <p>Log Reduction answers one question from 2 numbers, and the answer is Final CFU amount and Perecentage reduction.</p><p>Written with the labels from the form, Final CFU amount = Initial CFU amount × e^( − Log reduction × ln(10)).</p><p>The result panel carries Final CFU amount and Perecentage reduction, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Initial CFU amount</strong> — in times 10 to the 7. Amount of Colony Forming Units in sample before treatment.</li><li><strong>Log reduction</strong> — a plain number, no unit</li></ul><p>The result boxes are Final CFU amount in times 10 to the 5, Perecentage reduction in percent; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Initial CFU amount = 10 x10e7 and Log reduction = 100 — through the same formula and the panel reports &lt;strong&gt;Final CFU amount&lt;/strong&gt; = 1.000e-99 x10e5 and &lt;strong&gt;Perecentage reduction&lt;/strong&gt; = 1 perc.</p><ul><li><strong>Final CFU amount</strong> = 1.000e-99 x10e5</li><li><strong>Perecentage reduction</strong> = 1 perc</li></ul><p>That is <strong>Final CFU amount</strong> = <code>Initial CFU amount × e^( − Log reduction × ln(10))</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Final CFU amount&lt;/strong&gt; = 1.000e-99 and &lt;strong&gt;Perecentage reduction&lt;/strong&gt; = 1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Final CFU amount lists 69 options and opens on times 10 to the 5. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Final CFU amount</strong> = <code>Initial CFU amount × e^( − Log reduction × ln(10))</code></li><li><strong>Log reduction</strong> = <code>ln(Initial CFU amount ÷ Final CFU amount) ÷ ln(10)</code></li><li><strong>Initial CFU amount</strong> = <code>Final CFU amount × e^(Log reduction × ln(10))</code></li><li><strong>Perecentage reduction</strong> = <code>( − Final CFU amount + Initial CFU amount) ÷ Initial CFU amount</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Final CFU amount, Log reduction and Initial CFU amount can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Initial CFU amount from 10 to 20, leaving every other box alone. The panel moves from &lt;strong&gt;Final CFU amount&lt;/strong&gt; 1.000e-99 x10e5 and &lt;strong&gt;Perecentage reduction&lt;/strong&gt; 1 perc to &lt;strong&gt;Final CFU amount&lt;/strong&gt; 2.000e-99 x10e5 and &lt;strong&gt;Perecentage reduction&lt;/strong&gt; 1 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Initial CFU amount carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Final CFU amount and Perecentage reduction are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Initial CFU amount to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Initial CFU amount and Log reduction is what you already know and Final CFU amount and Perecentage reduction is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/specimen-size-from-image">Actual Specimen Size from Image Calculator</a>, <a href="/biology/agarose-gel-calculator">Agarose Gel (gel percentage and loading) Calculator</a> and <a href="/biology/alamarblue-cell-viability">AlamarBlue Cell Viability / Percent Reduction Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Log Reduction calculator work out?', 'a' => <<<'TXT'
            Final CFU amount and Perecentage reduction, from Initial CFU amount and Log reduction. The relationship is Final CFU amount = Initial CFU amount × e^( − Log reduction × ln(10)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial CFU amount (times 10 to the 7), Log reduction. With initial_CFU and log_reduction in place, Final CFU amount can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Final CFU amount, Log reduction, Initial CFU amount and Perecentage reduction can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Final CFU amount = 1.000e-99 x10e5 and Perecentage reduction = 1 perc. Those are the defaults written into the form — move Initial CFU amount and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Final CFU amount is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Initial CFU amount blank and the page solves for it, reporting Final CFU amount instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Final CFU amount keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/specimen-size-from-image', 'name' => 'Actual Specimen Size from Image Calculator'],
            ['path' => '/biology/agarose-gel-calculator', 'name' => 'Agarose Gel (gel percentage and loading) Calculator'],
            ['path' => '/biology/alamarblue-cell-viability', 'name' => 'AlamarBlue Cell Viability / Percent Reduction Calculator'],
        ],
        'authors' => [],
    ],
];

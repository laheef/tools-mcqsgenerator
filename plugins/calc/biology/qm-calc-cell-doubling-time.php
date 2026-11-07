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
    'meta' => ['title' => 'Cell doubling time: Formula, Steps & Results', 'description' => 'Cell doubling time takes initial reference parameter and returns growth rate. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Cell doubling time Calculator', 'updated' => '2024-07-30'],
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
        Enter Initial reference parameter, Final reference parameter and Time duration into Cell doubling time and the answer comes back as Growth rate and Doubling time. There is no hidden constant here: change growth rate and initial reference parameter moves with it. The main result, Growth rate, is reported in hours.
        TXT,
        'sections' => [
            ['title' => 'How the Cell doubling time calculator works', 'html' => <<<'TXT'
            <p>Cell doubling time answers one question from 3 numbers, and the answer is Growth rate and Doubling time.</p><p>The relationship it solves reads Growth rate = ln(Final reference parameter ÷ Initial reference parameter) ÷ Time duration.</p><p>The answers are Growth rate and Doubling time; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Initial reference parameter</strong> — a plain number, no unit. This parameter should be related to cell growth. For example, it could be cell number, concentration, or confluency. You should measure the same parameter at the beginning and end of the experiment.</li><li><strong>Final reference parameter</strong> — a plain number, no unit</li><li><strong>Time duration</strong> — in hours</li></ul><p>The answers come back as Growth rate in hours, Doubling time in hours / minutes. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Initial reference parameter = 10, Final reference parameter = 100 and Time duration = 1000 hrs; the answers are <strong>Growth rate</strong> = 0.0023 hrs and <strong>Doubling time</strong> = 301 hrsmin.</p><ul><li><strong>Growth rate</strong> = 0.0023 hrs</li><li><strong>Doubling time</strong> = 301 hrsmin</li></ul><p>The line behind those figures is <strong>Growth rate</strong> = <code>ln(Final reference parameter ÷ Initial reference parameter) ÷ Time duration</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Growth rate</strong> = 0.0023 and <strong>Doubling time</strong> = 301. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Growth rate lists 18 options and opens on hours. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Growth rate</strong> = <code>ln(Final reference parameter ÷ Initial reference parameter) ÷ Time duration</code></li><li><strong>Initial reference parameter</strong> = <code>Final reference parameter × e^( − Growth rate × Time duration)</code></li><li><strong>Time duration</strong> = <code>ln(Final reference parameter ÷ Initial reference parameter) ÷ Growth rate</code></li><li><strong>Final reference parameter</strong> = <code>Initial reference parameter × e^(Growth rate × Time duration)</code></li><li><strong>Doubling time</strong> = <code>ln(2) ÷ Growth rate</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Growth rate</strong> = <code>ln(Final reference parameter ÷ Initial reference parameter) ÷ Time duration</code> — the form to use when Final reference parameter, Initial reference parameter and Time duration are the values you have.</li><li><strong>Initial reference parameter</strong> = <code>Final reference parameter × e^( − Growth rate × Time duration)</code> — the form to use when Final reference parameter, Growth rate and Time duration are the values you have.</li><li><strong>Time duration</strong> = <code>ln(Final reference parameter ÷ Initial reference parameter) ÷ Growth rate</code> — the form to use when Final reference parameter, Initial reference parameter and Growth rate are the values you have.</li><li><strong>Final reference parameter</strong> = <code>Initial reference parameter × e^(Growth rate × Time duration)</code> — the form to use when Initial reference parameter, Growth rate and Time duration are the values you have.</li><li><strong>Doubling time</strong> = <code>ln(2) ÷ Growth rate</code> — the form to use when Growth rate are the values you have.</li><li><strong>Growth rate</strong> = <code>ln(2) ÷ Doubling time</code> — the form to use when Doubling time are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Growth rate, Initial reference parameter and Time duration can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Initial reference parameter from 10 to 20, leaving every other box alone. The panel moves from <strong>Growth rate</strong> 0.0023 hrs and <strong>Doubling time</strong> 301 hrsmin to <strong>Growth rate</strong> 0.0016 hrs and <strong>Doubling time</strong> 431 hrsmin.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Time duration carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Growth rate and Doubling time are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Initial reference parameter left as a guess.</strong> Anything typed into Initial reference parameter is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Final reference parameter left as a guess.</strong> Anything typed into Final reference parameter is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Initial reference parameter to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Initial reference parameter</strong> takes a plain number with no unit attached. This parameter should be related to cell growth. For example, it could be cell number, concentration, or confluency. You should measure the same parameter at the beginning and end of the experiment. Change it and Time duration, Final reference parameter and Growth rate changes with it. Have it to hand before you start: Initial reference parameter is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Final reference parameter</strong> takes a plain number with no unit attached. Change it and Initial reference parameter, Time duration and Growth rate changes with it. Have it to hand before you start: Final reference parameter is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Time duration</strong> is a hours quantity: the page opens it in hrs and converts anything else you pick before the formula runs. Change it and Initial reference parameter, Final reference parameter and Growth rate changes with it. Have it to hand before you start: Time duration is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Growth rate</strong> is a hours figure and the page's own defaults put it at 0.0023 hrs. The value follows from Final reference parameter, Initial reference parameter and Time duration. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Doubling time</strong> is a hours / minutes figure and the page's own defaults put it at 301 hrsmin. The value follows from Growth rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Growth rate</th><th>Doubling time</th></tr></thead><tbody><tr><td><strong>Initial reference parameter</strong> +10%</td><td>-4.14%</td><td>+4.32%</td></tr><tr><td><strong>Final reference parameter</strong> +10%</td><td>+4.14%</td><td>-3.97%</td></tr><tr><td><strong>Time duration</strong> +10%</td><td>-9.09%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Time duration: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Initial reference parameter = 5, Final reference parameter = 50 and Time duration = 500 hrs, the answer is <strong>Growth rate</strong> = 0.0046 hrs and <strong>Doubling time</strong> = 151 hrsmin.</li><li>With Initial reference parameter = 30, Final reference parameter = 100 and Time duration = 1000 hrs, the answer is <strong>Growth rate</strong> = 0.0012 hrs and <strong>Doubling time</strong> = 576 hrsmin.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>hours</strong> — 18 units. It opens in <em>hrs</em>, and the chip also carries yrs, min, 15 sec, days, wks and mos. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Growth rate is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover hours. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Initial reference parameter, Final reference parameter and Time duration measured, Growth rate and Doubling time wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dog-quality-of-life">Dog quality of life</a>, <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity Calculator</a> and <a href="/biology/dog-size">Dog size Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cell doubling time calculator work out?', 'a' => <<<'TXT'
            Growth rate and Doubling time, from Final reference parameter, Initial reference parameter and Time duration. The relationship is Growth rate = ln(Final reference parameter ÷ Initial reference parameter) ÷ Time duration.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial reference parameter, Final reference parameter, Time duration (hours). With initial reference parameter, final reference parameter and time duration in place, Growth rate can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Growth rate, Initial reference parameter, Time duration and Final reference parameter can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Growth rate = 0.0023 hrs and Doubling time = 301 hrsmin. The figures come from Initial reference parameter as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Growth rate is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Initial reference parameter left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Growth rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dog-quality-of-life', 'name' => 'Dog quality of life'],
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
            ['path' => '/biology/dog-size', 'name' => 'Dog size Calculator'],
        ],
        'authors' => [],
    ],
];

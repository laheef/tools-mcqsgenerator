<?php

/**
 * Full-time equivalent
 * /finance/full-time-equivalent
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Full-time equivalent',
    'meta' => ['title' => 'Full-time equivalent — Free Online Calculator', 'description' => 'Full-time equivalent turns number of employees and working hours into full time equivalent. Every box can be solved for, not only the one in the title.', 'h1' => 'Full-time equivalent Calculator', 'updated' => '2026-09-22'],
    'sections' => [
        [
            'title' => 'Full-time',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_full_time_employee',
                            'label' => 'Number of employees',
                            'type' => 'number',
                            'suffix' => 'people',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'full_time_working_hour',
                            'label' => 'Working hours',
                            'type' => 'number',
                            'unit' => '124',
                            'unit_default' => 'week',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Part-time',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_part_time_employee',
                            'label' => 'Number of employees',
                            'type' => 'number',
                            'suffix' => 'people',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'part_time_working_hours',
                            'label' => 'Working hours',
                            'type' => 'number',
                            'unit' => '124',
                            'unit_default' => 'week',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Full_Time_Equivalent',
                            'label' => 'Full time equivalent',
                            'type' => 'number',
                            'suffix' => 'FTE',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Full_Time_Equivalent = number_of_full_time_employee + (number_of_part_time_employee * part_time_working_hours) / full_time_working_hour',
            'results' => [
                'number_of_full_time_employee' => 'Full_Time_Equivalent - number_of_part_time_employee*part_time_working_hours/full_time_working_hour',
                'Full_Time_Equivalent' => 'number_of_full_time_employee + number_of_part_time_employee*part_time_working_hours/full_time_working_hour',
                'number_of_part_time_employee' => 'full_time_working_hour*(Full_Time_Equivalent - number_of_full_time_employee)/part_time_working_hours',
                'full_time_working_hour' => 'number_of_part_time_employee*part_time_working_hours/(Full_Time_Equivalent - number_of_full_time_employee)',
                'part_time_working_hours' => 'full_time_working_hour*(Full_Time_Equivalent - number_of_full_time_employee)/number_of_part_time_employee',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Full-time equivalent works out Full time equivalent from Number of employees, Working hours and Number of employees. Nothing is looked up on this page: full time equivalent is computed from number of employees and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Full time equivalent is opened in FTE; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Full-time equivalent calculator works', 'html' => <<<'TXT'
            <p>Full-time equivalent answers one question from 4 numbers, and the answer is Full time equivalent.</p><p>Written with the labels from the form, Full time equivalent = Number of employees + Number of employees × Working hours ÷ Working hours.</p><p>The answers are Full time equivalent; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Number of employees</strong> — in people</li><li><strong>Working hours</strong> — in weeks</li><li><strong>Number of employees</strong> — in people</li><li><strong>Working hours</strong> — in weeks</li></ul><p>The result box is Full time equivalent in FTE. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Number of employees = 10 people, Working hours = 100 week, Number of employees = 1000 people and Working hours = 10 week; the answers are <strong>Full time equivalent</strong> = 110 FTE.</p><ul><li><strong>Full time equivalent</strong> = 110 FTE</li></ul><p>The line behind those figures is <strong>Full time equivalent</strong> = <code>Number of employees + Number of employees × Working hours ÷ Working hours</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Full time equivalent</strong> = 110. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Working hours lists 4 options and opens on weeks. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Full time equivalent</strong> = <code>Number of employees + Number of employees × Working hours ÷ Working hours</code></li><li><strong>Number of employees</strong> = <code>Full time equivalent − Number of employees × Working hours ÷ Working hours</code></li><li><strong>Working hours</strong> = <code>Number of employees × Working hours ÷ (Full time equivalent − Number of employees)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Full time equivalent</strong> = <code>Number of employees + Number of employees × Working hours ÷ Working hours</code> — the form to use when Number of employees, Number of employees, Working hours and Working hours are the values you have.</li><li><strong>Number of employees</strong> = <code>Full time equivalent − Number of employees × Working hours ÷ Working hours</code> — the form to use when Full time equivalent, Number of employees, Working hours and Working hours are the values you have.</li><li><strong>Number of employees</strong> = <code>Working hours × (Full time equivalent − Number of employees) ÷ Working hours</code> — the form to use when Working hours, Full time equivalent, Number of employees and Working hours are the values you have.</li><li><strong>Working hours</strong> = <code>Number of employees × Working hours ÷ (Full time equivalent − Number of employees)</code> — the form to use when Number of employees, Working hours, Full time equivalent and Number of employees are the values you have.</li><li><strong>Working hours</strong> = <code>Working hours × (Full time equivalent − Number of employees) ÷ Number of employees</code> — the form to use when Working hours, Full time equivalent, Number of employees and Number of employees are the values you have.</li></ul><p>Any one of Full time equivalent, Number of employees and Number of employees can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Number of employees, from 10 to 20 — and the answers go from <strong>Full time equivalent</strong> 110 FTE to <strong>Full time equivalent</strong> 120 FTE.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Working hours and Working hours carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Full time equivalent is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Number of employees left as a guess.</strong> Anything typed into Number of employees is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Working hours left as a guess.</strong> Anything typed into Working hours is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Number of employees to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Number of employees</strong> is measured in people. The page reads it when it works out Full time equivalent, Number of employees and Working hours. Have it to hand before you start: Number of employees is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Working hours</strong> is a weeks quantity: the page opens it in week and converts anything else you pick before the formula runs. The page reads it when it works out Number of employees, Full time equivalent and Number of employees. Have it to hand before you start: Working hours is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of employees</strong> is measured in people. The page reads it when it works out Number of employees, Full time equivalent and Working hours. Have it to hand before you start: Number of employees is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Working hours</strong> is a weeks quantity: the page opens it in week and converts anything else you pick before the formula runs. The page reads it when it works out Number of employees, Full time equivalent and Number of employees. Have it to hand before you start: Working hours is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Full time equivalent</strong> is a plain number and the page's own defaults put it at 110. It is worked out from Number of employees, Number of employees, Working hours and Working hours. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Full time equivalent</th></tr></thead><tbody><tr><td><strong>Number of employees</strong> +10%</td><td>+0.91%</td></tr><tr><td><strong>Working hours</strong> +10%</td><td>-8.26%</td></tr><tr><td><strong>Number of employees</strong> +10%</td><td>+9.09%</td></tr><tr><td><strong>Working hours</strong> +10%</td><td>+9.09%</td></tr></tbody></table><p>The steepest column belongs to Number of employees: ten per cent there moves an answer by about 9.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Number of employees = 5 people, Working hours = 50 week, Number of employees = 500 people and Working hours = 5 week, the answer is <strong>Full time equivalent</strong> = 55 FTE.</li><li>With Number of employees = 30 people, Working hours = 100 week, Number of employees = 1000 people and Working hours = 10 week, the answer is <strong>Full time equivalent</strong> = 130 FTE.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>weeks</strong> — opens in <em>week</em>, and the chip also carries weeks, days and months. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Full time equivalent is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover weeks. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Number of employees, Working hours and Number of employees is what you already know and Full time equivalent is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/actual-cash-value">Actual cash value</a>, <a href="/finance/afn">Additional funds needed (AFN) Calculator</a> and <a href="/finance/affo">Adjusted funds from operation (AFFO) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Full-time equivalent calculator work out?', 'a' => <<<'TXT'
            Full time equivalent, from Number of employees, Number of employees, Working hours and Working hours. The relationship is Full time equivalent = Number of employees + Number of employees × Working hours ÷ Working hours.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of employees (people), Working hours (weeks), Number of employees (people), Working hours (weeks). Enter number of employees, working hours and number of employees; Full time equivalent is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Full time equivalent, Number of employees, Number of employees and Working hours blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Full time equivalent = 110 FTE. That comes from the page\'s own defaults, entered in Number of employees; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Full time equivalent is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Number of employees left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Full time equivalent keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/actual-cash-value', 'name' => 'Actual cash value'],
            ['path' => '/finance/afn', 'name' => 'Additional funds needed (AFN) Calculator'],
            ['path' => '/finance/affo', 'name' => 'Adjusted funds from operation (AFFO) Calculator'],
        ],
        'authors' => [],
    ],
];

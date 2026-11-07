<?php

/**
 * Llama
 * /biology/llama
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Llama',
    'meta' => ['title' => 'Llama Calculator: Formula, Steps & Examples', 'description' => 'The Llama calculator turns the current date and the difference into <strong>mating date</strong>. The Llama calculator takes the values in the form, applies…', 'h1' => 'Llama Calculator', 'updated' => '2025-04-07'],
    'raw' => [
        'vars' => [
            'currentDate' => ['type' => 'date', 'rnd' => null],
            'difference_negative' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'difference_positive' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'difference_value' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'dueDate' => ['type' => 'date', 'rnd' => null],
            'earliest' => ['type' => 'date', 'rnd' => null],
            'latest' => ['type' => 'date', 'rnd' => null],
            'matingDate' => ['type' => 'date', 'rnd' => null],
            'weekday' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'Kdz1dFDTJtt6e9cE1HlIv',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'matingDate', 'vt' => 'date', 'l' => '❤️ Mating date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'dueDate', 'vt' => 'date', 'l' => ' 🦙 Due date'],
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
                                        ['difference_value == 0', 'Your llama or alpaca is going to give birth today!'],
                                        ['difference_value == 1', 'Your llama or alpaca is going to give birth in {{difference_positive.formattedValue}} day!'],
                                        ['difference_value > 1', 'Your llama or alpaca is going to give birth in {{difference_positive.formattedValue}} days!'],
                                        ['difference_value == -1', 'Your llama or alpaca gave birth 1 day ago!'],
                                        ['difference_value < -1', 'Your llama or alpaca gave birth {{difference_negative.formattedValue}} days ago!'],
                                        ['difference_value == 0', 'Today is&nbsp;'],
                                        ['difference_value > 0', 'Your llama\'s or alpaca\'s due date is on a&nbsp;'],
                                        ['difference_value < 0', 'Your llama\'s or alpaca\'s due date was on a&nbsp;'],
                                        ['weekday==0', 'Sunday!'],
                                        ['weekday==1', 'Monday!'],
                                        ['weekday==2', 'Tuesday!'],
                                        ['weekday==3', 'Wednesday!'],
                                        ['weekday==4', 'Thursday!'],
                                        ['weekday==5', 'Friday!'],
                                        ['weekday==6', 'Saturday!'],
                                        [null, 'The earliest normal delivery: {{earliest.shortValue}} The latest normal delivery: {{latest.shortValue}}'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'njm_51Yf4CE5qtBB5rF1b',
                'title' => 'Hidden variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'currentDate', 'vt' => 'date', 'l' => 'Current date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'weekday', 'vt' => 'numerical', 'l' => 'Weekday'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'earliest', 'vt' => 'date', 'l' => 'Earliest'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'latest', 'vt' => 'date', 'l' => 'Latest'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'difference_positive',
                                    'vt' => 'numerical',
                                    'l' => 'Difference',
                                    'us' => '19',
                                    'du' => 'days',
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
                                    'n' => 'difference_negative',
                                    'vt' => 'numerical',
                                    'l' => 'Difference negative',
                                    'us' => '19',
                                    'du' => 'days',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'difference_value', 'vt' => 'numerical', 'l' => 'Difference value'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'dueDate = matingDate + 342*86400000',
                'var' => [
                    [
                        'l' => 'matingDate',
                        'f' => 'dueDate - 29548800000',
                        'r' => ['dueDate'],
                    ],
                    [
                        'l' => 'dueDate',
                        'f' => 'matingDate + 29548800000',
                        'r' => ['matingDate'],
                    ],
                ],
            ],
            [
                'formula' => 'earliest = matingDate + 332*86400000',
                'var' => [
                    [
                        'l' => 'matingDate',
                        'f' => 'earliest - 28684800000',
                        'r' => ['earliest'],
                    ],
                    [
                        'l' => 'earliest',
                        'f' => 'matingDate + 28684800000',
                        'r' => ['matingDate'],
                    ],
                ],
            ],
            [
                'formula' => 'latest = matingDate + 352*86400000',
                'var' => [
                    [
                        'l' => 'matingDate',
                        'f' => 'latest - 30412800000',
                        'r' => ['latest'],
                    ],
                    [
                        'l' => 'latest',
                        'f' => 'matingDate + 30412800000',
                        'r' => ['matingDate'],
                    ],
                ],
            ],
            [
                'formula' => 'difference_positive = dueDate - (currentDate - mod(currentDate,86400000))',
                'var' => [
                    [
                        'l' => 'dueDate',
                        'f' => 'currentDate + difference_positive - mod(currentDate, 86400000)',
                        'r' => ['difference_positive', 'currentDate'],
                    ],
                    [
                        'l' => 'difference_positive',
                        'f' => '-currentDate + dueDate + mod(currentDate, 86400000)',
                        'r' => ['dueDate', 'currentDate'],
                    ],
                ],
            ],
            [
                'formula' => 'difference_negative = (currentDate - mod(currentDate,86400000)) - dueDate',
                'var' => [
                    [
                        'l' => 'dueDate',
                        'f' => 'currentDate - difference_negative - mod(currentDate, 86400000)',
                        'r' => ['difference_negative', 'currentDate'],
                    ],
                    [
                        'l' => 'difference_negative',
                        'f' => 'currentDate - dueDate - mod(currentDate, 86400000)',
                        'r' => ['dueDate', 'currentDate'],
                    ],
                ],
            ],
            [
                'formula' => 'weekday = getDayOfWeek(dueDate)',
                'var' => [
                    [
                        'l' => 'weekday',
                        'f' => 'getDayOfWeek(dueDate)',
                        'r' => ['dueDate'],
                    ],
                ],
            ],
            [
                'formula' => 'difference_value = difference_positive/86400000',
                'var' => [
                    [
                        'l' => 'difference_value',
                        'f' => '(1/86400000)*difference_positive',
                        'r' => ['difference_positive'],
                    ],
                    [
                        'l' => 'difference_positive',
                        'f' => '86400000*difference_value',
                        'r' => ['difference_value'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";omni.define("getDayOfWeek",function(dateInput){var day=new Date(dateInput);return day.getUTCDay()});//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => 'The Llama calculator turns the current date and the difference into <strong>mating date</strong>.',
        'sections' => [
            ['title' => 'How does the Llama calculator work?', 'html' => <<<'TXT'
            <p>The Llama calculator takes the values in the form, applies the relationship described below and reports <strong>mating date</strong> in the results panel.</p>
            <p>Working from the top of the form: you give the current date; then you type in the difference.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Mating date</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Due date</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Current date</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr><tr><td><strong>Weekday</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Earliest</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Latest</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Difference</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>You supply it</td></tr><tr><td><strong>Difference negative</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Llama calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Mating date</span><span class="formula-eq">=</span><span class="formula-rhs">due date − 29548800000</span></div><div class="formula-row"><span class="formula-lhs">Mating date</span><span class="formula-eq">=</span><span class="formula-rhs">earliest − 28684800000</span></div><div class="formula-row"><span class="formula-lhs">Mating date</span><span class="formula-eq">=</span><span class="formula-rhs">latest − 30412800000</span></div><div class="formula-row"><span class="formula-lhs">Due date</span><span class="formula-eq">=</span><span class="formula-rhs">current date + difference − (current date, 86400000)</span></div><div class="formula-row"><span class="formula-lhs">Due date</span><span class="formula-eq">=</span><span class="formula-rhs">current date − difference negative − (current date, 86400000)</span></div><div class="formula-row"><span class="formula-lhs">Weekday</span><span class="formula-eq">=</span><span class="formula-rhs">weekday of (due date)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A calendar date.</li><li>A calendar date.</li><li>A calendar date.</li><li>A calendar date.</li><li>Shown in days, and convertible to any of the 27 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in days</li><li>Time, opening in days</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Llama calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 2 figures keep coming back — the current date and the difference — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li><li>Round only at the end. </li><li>Write the answer down with its unit. </li><li>Compare two scenarios by changing the input that actually differs between them, and keep the rest fixed, so the difference you see is the difference you meant to test.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li>Dates are compared date to date in your own time zone, so a daylight-saving change will not shift the count by a day.</li><li>Fields that are still blank are exactly the ones the calculator has not yet been given, so the results panel is a reliable map of what is missing.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Llama calculator, these are the ones that matter:</p>
            <ul><li>Dates are handled as whole calendar days in the time zone of the browser, so a birth date or a deadline is compared date to date rather than as a span of hours.</li><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/log-reduction">Log Reduction</a>, <a href="/biology/metacam-dosage-cat">Metacam dosage for cats</a> and <a href="/biology/mlvss">Mixed liquor volatile suspended solids</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Llama calculator work out?', 'a' => <<<'TXT'
            It returns mating date, derived from the current date and the difference. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the Llama calculator?', 'a' => <<<'TXT'
            The form asks for the current date and the difference, which is 2 fields in total. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter difference in a different unit?', 'a' => <<<'TXT'
            Yes. Difference opens in days and the chip beside it offers 27 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'Is the Llama calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — press Calculate and every result updates together.
            TXT],
        ],
        'related' => [
            ['path' => '/biology/log-reduction', 'name' => 'Log Reduction'],
            ['path' => '/biology/metacam-dosage-cat', 'name' => 'Metacam dosage for cats'],
            ['path' => '/biology/mlvss', 'name' => 'Mixed liquor volatile suspended solids'],
        ],
    ],
];

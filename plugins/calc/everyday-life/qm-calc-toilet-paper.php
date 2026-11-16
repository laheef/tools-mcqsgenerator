<?php

/**
 * Toilet paper
 * /everyday-life/toilet-paper
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Toilet paper',
    'meta' => ['title' => 'Toilet paper Calculator — Formula, Units & Example', 'description' => 'Toilet paper reports i bought..., rolls needed, packs needed and you\'re safe until. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Toilet paper Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'buyOrCheck',
                            'label' => 'I want to know...',
                            'type' => 'select',
                            'options' => ['how many rolls I need' => '0', 'how long will my supplies last' => '1'],
                            'dataset' => 'what',
                            'default' => 'how many rolls I need',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'people',
                            'label' => 'People',
                            'type' => 'number',
                            'help' => 'How many people are in the household?',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'paperUse',
                            'label' => 'Paper use',
                            'type' => 'select',
                            'options' => [' (not much)' => '0.2', ' (average)' => '0.274', ' (a lot)' => '0.4'],
                            'dataset' => 'use',
                            'default' => ' (average)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'packsSupply',
                            'label' => 'I bought...',
                            'type' => 'number',
                            'suffix' => 'packs',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rollsSupply',
                            'label' => 'which is...',
                            'type' => 'number',
                            'suffix' => 'rolls',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days',
                            'label' => 'Days supply',
                            'type' => 'number',
                            'help' => 'How many days do you need supplies for?',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '14',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'RollsPerPack',
                            'label' => 'Rolls per pack',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rolls',
                            'label' => 'Rolls needed',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'packs',
                            'label' => 'Packs needed',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'How long will it last?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'start_date', 'label' => 'Bought on', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'end_date', 'label' => 'You\'re safe until', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'Your  supply will last you {{time.formattedValue}} days!&nbsp;'],
                                ['when' => 'time > 14', 'text' => 'Which is equal to... ...{{time_weeks.formattedValue}} week(s)'],
                                ['when' => 'time > 30.4375', 'text' => '...or {{time_months.formattedValue}} month(s)'],
                                ['when' => 'time > 365.25', 'text' => '...or {{time_years.formattedValue}} year(s)'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'toilet-paper.gif'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Production of this paper consumes...',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water',
                            'label' => '',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water2',
                            'label' => '',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'trees',
                            'label' => '',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'trees2',
                            'label' => '',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time',
                            'label' => 'Time',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['standard', '1'],
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
                            'name' => 'time_weeks',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_months',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_years',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'rolls = ceil(people * days * paperUse)',
            'results' => ['rolls' => 'ceil(days*paperUse*people)'],
        ],
        [
            'title' => 'packs = ceil(rolls / RollsPerPack)',
            'results' => ['packs' => 'ceil(ceil(days*paperUse*people)/RollsPerPack)'],
        ],
        [
            'title' => 'packsSupply =  rollsSupply / RollsPerPack',
            'results' => ['packsSupply' => 'rollsSupply/RollsPerPack', 'rollsSupply' => 'RollsPerPack*packsSupply', 'RollsPerPack' => 'rollsSupply/packsSupply'],
        ],
        [
            'title' => 'time = rollsSupply / people / paperUse ',
            'results' => ['time' => 'rollsSupply/(paperUse*people)', 'people' => 'rollsSupply/(paperUse*time)', 'paperUse' => 'rollsSupply/(people*time)', 'rollsSupply' => 'paperUse*people*time'],
        ],
        [
            'title' => 'start_date + time = end_date',
            'results' => ['time' => 'end_date - start_date', 'start_date' => 'end_date - time', 'end_date' => 'start_date + time'],
        ],
        [
            'title' => 'water = one_way(rolls * 37)',
            'results' => ['water' => '(37*ceil(days*paperUse*people))'],
        ],
        [
            'title' => 'trees = one_way(1.5 * rolls)',
            'results' => ['trees' => '((3/2)*ceil(days*paperUse*people))'],
        ],
        [
            'title' => 'water2 = one_way(rollsSupply * 37)',
            'results' => ['water2' => '(37*rollsSupply)'],
        ],
        [
            'title' => 'trees2 = one_way(1.5 * rollsSupply )',
            'results' => ['trees2' => '((3/2)*rollsSupply)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => 'The Toilet paper calculator turns the people, the days supply and more into <strong>rolls needed</strong>.',
        'sections' => [
            ['title' => 'How does the Toilet paper calculator work?', 'html' => <<<'TXT'
            <p>The Toilet paper calculator takes the values in the form, applies the relationship described below and reports <strong>rolls needed</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the paper use); then you give the you're safe until; then you type in the people, the days supply and the rolls per pack.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as how many rolls I need and how long will my supplies last. </li><li>A plain number with no unit attached.</li><li>Pick the option that matches your case — 3 options, such as (not much), (average) and (a lot). </li><li>A number, expressed in rolls.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A calendar date. Use the picker; the answer is recalculated the moment the date changes, and the count is done date-to-date rather than by subtracting timestamps.</li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>People</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Paper use</strong></td><td>One of 3 options, such as (not much), (average) and (a lot).</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Days supply</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Rolls per pack</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Rolls needed</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Packs needed</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>You're safe until</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr><tr><td><strong>Time</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Toilet paper calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Rolls needed</span><span class="formula-eq">=</span><span class="formula-rhs">rounded up, (days supply × paper use × people)</span></div><div class="formula-row"><span class="formula-lhs">Packs needed</span><span class="formula-eq">=</span><span class="formula-rhs">rounded up, (rounded up, (days supply × paper use × people) ÷ rolls per pack)</span></div><div class="formula-row"><span class="formula-lhs">I bought</span><span class="formula-eq">=</span><span class="formula-rhs">which is ÷ rolls per pack</span></div><div class="formula-row"><span class="formula-lhs">Time</span><span class="formula-eq">=</span><span class="formula-rhs">which is ÷ (paper use × people)</span></div><div class="formula-row"><span class="formula-lhs">Time</span><span class="formula-eq">=</span><span class="formula-rhs">you&#x27;re safe until − bought on</span></div><div class="formula-row"><span class="formula-lhs">Water</span><span class="formula-eq">=</span><span class="formula-rhs">(37 × rounded up, (days supply × paper use × people))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in days, and convertible to any of the 27 units on that chip.</li><li>A calendar date.</li><li>Shown in liters, and convertible to any of the 40 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in liters, and convertible to any of the 40 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Volume, opening in liters</li><li>Volume, opening in liters</li><li>Mass, opening in kilograms</li><li>Mass, opening in kilograms</li><li>Time, opening in days</li><li>Time, opening in weeks</li><li>Time, opening in months</li><li>Time, opening in years</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Toilet paper calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 4 figures keep coming back — the people, the days supply and the rolls per pack — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Dates are compared date to date in your own time zone, so a daylight-saving change will not shift the count by a day.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/hat-size">Hat size</a>, <a href="/everyday-life/headphone-power">Headphone power</a> and <a href="/everyday-life/helium-balloons">Helium balloons</a>.</p>
            TXT],
            ['title' => 'Estimating a supply from your own household use', 'html' => <<<'TXT'
            <p>The most useful starting point for a toilet-paper estimate is the household’s actual consumption, not a generic average. The calculator uses the number of people, the supply period and a paper-use input to estimate rolls, then can express the result in packs if you provide rolls per pack. If you are unsure of daily use, track how many rolls are opened over a normal week or two, then divide by the number of people and days. This gives a more relevant planning input than guessing from a different household’s habits.</p>
            <p>Decide what the time period means. “Days of supply” may be a travel period, an expected interval between shopping trips or the time you want to keep as a reserve. If some people will be away, adjust the household count or run a separate scenario. Guests, home working, illness and changes in routine can alter use, so the result is a forecast based on the assumptions rather than an exact promise.</p>
            <p>Check the package carefully. A pack can contain different numbers of rolls, and roll size varies substantially. A compact roll and a large roll are not necessarily equivalent units of paper even when each is sold as one roll. The calculator’s roll count may not normalize for sheet length, ply, sheet size or roll density unless those details are explicit inputs. Compare package quantities on the basis shown by the manufacturer, such as total sheets or stated equivalent rolls, before deciding that two packs offer the same amount.</p>
            <p>For a “how long will this supply last?” estimate, use the quantity already on hand and a realistic rate of use. Keep the period consistent: a weekly usage rate should not be entered as a daily amount. If the form asks for rolls per person per day, calculate that from your own records. If it asks for paper use in another unit, read the label carefully and verify the conversion before calculating.</p>
            <p>Household planning can include a modest reserve for unexpected guests or delayed shopping, but do not treat a calculated maximum as a requirement to stockpile. Store paper in a dry place and use a reasonable quantity for your available space and budget. Environmental or water-related outputs, if shown, are estimates based on the calculator’s built-in assumptions; they are not a lifecycle assessment of a particular product or a guarantee of savings.</p>
            <p>Run two scenarios to see how sensitive the result is: your typical use and a busier week. Keep the same unit and pack size while comparing them. If the number of packs looks surprising, check the people count, usage period, per-person rate and rolls per pack in that order. The result is most useful for planning a shop or comparing options, then confirming the actual package size on the shelf.</p>
            TXT],
            ['title' => 'Compare packages on a consistent basis', 'html' => <<<'TXT'
            <p>Roll count alone is not a reliable way to compare packages. Look at the number of sheets per roll, sheet dimensions and ply, then use the package’s stated equivalent-roll information if it provides one. A “mega” roll and a standard roll may each count as one package unit but contain different amounts of paper. The calculator’s output is based on the roll and pack definitions entered; it cannot normalize products whose sheet counts are unknown.</p><p>For an estimate of how long existing supplies will last, count the rolls or packs you actually have and enter the corresponding quantity in the appropriate field. Keep a separate note if you have partly used rolls, because treating them as full rolls can overstate the reserve. If your shopping interval changes, recalculate from the new period rather than stretching an old number across a different routine.</p>
            TXT],
            ['title' => 'Plan stock around storage and shopping habits', 'html' => <<<'TXT'
            <p>A supply estimate can help decide whether to buy one pack or several, but storage space and product packaging matter too. Keep paper dry and away from leaks, heat sources and areas where it may be damaged. If the household has limited storage, use the shopping interval and realistic use rate instead of planning a large reserve.</p><p>Consider who is included in the household count and whether the estimate covers guests or travel. Change those inputs when the scenario changes; a result for a full household at home should not be reused for a week when several people are away. This makes the estimate more useful without implying that any one consumption level is universal.</p>
            TXT],
            ['title' => 'Review the estimate after a normal week', 'html' => <<<'TXT'
            <p>After using the calculator, compare its assumed rate with the household’s next ordinary week. If actual use is consistently different, update the per-person rate and rerun the estimate. Keep any unusually busy week separate so it does not distort the baseline. A small record of rolls opened and people present is enough to make the next shopping estimate more personal.</p>
            TXT],
            ['title' => 'Keep package sizes on the same basis', 'html' => <<<'TXT'
            <p>If pack sizes change between shopping trips, update rolls per pack before calculating how many packs to buy. A result expressed as rolls can stay the same while the number of packages changes. Check the package label each time rather than assuming every brand’s multipack contains the same quantity.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Toilet paper calculator work out?', 'a' => 'It returns rolls needed, derived from the people, the days supply and the rolls per pack.'],
            ['q' => 'What do I need to enter to use the Toilet paper calculator?', 'a' => 'The form asks for the people, the days supply, the rolls per pack and the you\'re safe until, which is 7 fields in total.'],
            ['q' => 'Can I enter water in a different unit?', 'a' => 'Yes. Water opens in liters and the chip beside it offers 40 units.'],
        ],
        'related' => [
            ['path' => '/everyday-life/hat-size', 'name' => 'Hat size'],
            ['path' => '/everyday-life/headphone-power', 'name' => 'Headphone power'],
            ['path' => '/everyday-life/helium-balloons', 'name' => 'Helium balloons'],
        ],
    ],
];

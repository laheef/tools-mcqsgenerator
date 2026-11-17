<?php

/**
 * Occupancy rate
 * /finance/occupancy-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Occupancy rate',
    'meta' => ['title' => 'Occupancy rate Calculator — Formula & Results', 'description' => 'Occupancy rate works out daily rate from period and calculate occupancy for. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Occupancy rate Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'period',
                            'label' => 'Period',
                            'type' => 'select',
                            'options' => ['Single day' => '0', 'Single month' => '1', 'Custom' => '2'],
                            'dataset' => 'period',
                            'default' => 'Single day',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'customNumber',
                            'label' => 'Calculate occupancy for',
                            'type' => 'number',
                            'help' => 'Input the desired period to calculate occupancy.',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'occRoomsD',
                            'label' => 'Rooms occupied (in a day)',
                            'type' => 'number',
                            'help' => 'The number of rooms occupied in a specific day.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'occRoomsM',
                            'label' => 'Room-nights (in a month)',
                            'type' => 'number',
                            'help' => 'Total number of nights rented across all your rooms during a specific month.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'occRoomsC',
                            'label' => 'Rooms-nights (custom time)',
                            'type' => 'number',
                            'help' => 'Total number of nights rented across all your rooms during a specific time period.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maintRoomsD',
                            'label' => 'Rooms in maintenance/unavailable',
                            'type' => 'number',
                            'help' => 'This number will be subtracted from the total rooms number to accurately calculate occupancy.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maintRoomsM',
                            'label' => 'Room-nights in maintenance',
                            'type' => 'number',
                            'help' => 'The sum of all the nights each room is unavailable for renting during a month.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maintRoomsC',
                            'label' => 'Room-nights in maintenance',
                            'type' => 'number',
                            'help' => 'The sum of all the nights each room is unavailable for renting during a custom period of time.&nbsp;',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalRoomsD',
                            'label' => 'Total rooms',
                            'type' => 'number',
                            'help' => 'Total number of rooms in your property.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalRoomsM',
                            'label' => 'Total rooms',
                            'type' => 'number',
                            'help' => 'Total number of rooms in your property.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalRoomsC',
                            'label' => 'Total rooms',
                            'type' => 'number',
                            'help' => 'Total number of rooms in your property.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dailyRate',
                            'label' => 'Daily rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Compare your result against others\' in your area using the advanced mode!',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthlyRate',
                            'label' => 'Monthly rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Compare your result against others\' in your area using the advanced mode!',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'customRate',
                            'label' => 'Custom rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Compare your result against others\' in your area using the advanced mode!',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Compare your property to others\'',
            'note' => 'After obtaining your occupancy rate, type in your competitors\' to see how you compare to them.',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'avgAreaRate',
                            'label' => 'Average rate in your area',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'The average daily, monthly, or custom occupancy for hotels/properties in your area.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'period == 0 and diffInRatesD > 0.1', 'text' => 'Congratulations! You\'re doing {{diffInRatesD.formattedValue}}% better than the average.&nbsp;'],
                                ['when' => 'period == 1 and diffInRatesM > 0.1', 'text' => 'Congratulations! You\'re doing {{diffInRatesM.formattedValue}}% better than the average.&nbsp;'],
                                ['when' => 'period == 2 and diffInRatesC > 0.1', 'text' => 'Congratulations! You\'re doing {{diffInRatesC.formattedValue}}% better than the average.&nbsp;'],
                                ['when' => <<<'TXT'
                                (period == 0 and diffInRatesD <= 0.1 and diffInRatesD >= -0.1) or (period == 1 and diffInRatesM <= 0.1 and diffInRatesM >= -0.1) or (period == 2 and diffInRatesC <= 0.1 and diffInRatesC >= -0.1)
                                TXT, 'text' => 'Good! Your property is within 10% of the average.'],
                                ['when' => '(period == 0 and diffInRatesD < -0.1) or (period == 1 and diffInRatesM < -0.1) or (period == 2 and diffInRatesC < -0.1)', 'text' => <<<'TXT'
                                Oh no! Your property is below 10% of the average. Don't worry! You can check the section How can I increase occupancy within the calculator text to see how you can increase your occupancy 
                                TXT],
                            ],
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
                            'name' => 'diffInRatesD',
                            'label' => 'Diff in rates d',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'diffInRatesM',
                            'label' => 'Diff in rates m',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'diffInRatesC',
                            'label' => 'Diff in rates c',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'dailyRate = occRoomsD / (totalRoomsD - maintRoomsD) * 100 ',
            'results' => ['occRoomsD' => '(1/100)*dailyRate*(-maintRoomsD + totalRoomsD)', 'dailyRate' => '-100*occRoomsD/(maintRoomsD - totalRoomsD)', 'maintRoomsD' => 'totalRoomsD - 100*occRoomsD/dailyRate', 'totalRoomsD' => 'maintRoomsD + 100*occRoomsD/dailyRate'],
        ],
        [
            'title' => 'monthlyRate = occRoomsM / (30 * totalRoomsM - maintRoomsM) * 100',
            'results' => ['totalRoomsM' => '(1/30)*(maintRoomsM*monthlyRate + 100*occRoomsM)/monthlyRate', 'monthlyRate' => '-100*occRoomsM/(maintRoomsM - 30*totalRoomsM)', 'occRoomsM' => '(1/100)*monthlyRate*(-maintRoomsM + 30*totalRoomsM)', 'maintRoomsM' => '30*totalRoomsM - 100*occRoomsM/monthlyRate'],
        ],
        [
            'title' => 'customRate = occRoomsC / (customNumber * totalRoomsC - maintRoomsC) * 100',
            'results' => [
                'occRoomsC' => '(1/100)*customRate*(customNumber*totalRoomsC - maintRoomsC)',
                'customNumber' => '(customRate*maintRoomsC + 100*occRoomsC)/(customRate*totalRoomsC)',
                'maintRoomsC' => 'customNumber*totalRoomsC - 100*occRoomsC/customRate',
                'totalRoomsC' => '(customRate*maintRoomsC + 100*occRoomsC)/(customNumber*customRate)',
                'customRate' => '100*occRoomsC/(customNumber*totalRoomsC - maintRoomsC)',
            ],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Rooms occupied (in a day) and Rooms in maintenance/unavailable into Occupancy rate and the answer comes back as Calculate occupancy for and Room-nights (in a month). The arithmetic is the whole method: calculate occupancy for is worked out from rooms occupied (in a day) by one formula, applied once. Calculate occupancy for comes back in days unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Occupancy rate calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Occupancy rate: it takes 3 numbers and reports Calculate occupancy for, Room-nights (in a month) and Rooms-nights (custom time).</p><p>Written with the labels from the form, Daily rate = − 100 × Rooms occupied (in a day) ÷ (Rooms in maintenance/unavailable − Total rooms).</p><p>The result panel carries Calculate occupancy for, Room-nights (in a month), Rooms-nights (custom time) and Room-nights in maintenance, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Rooms occupied (in a day)</strong> — a plain number, no unit. The number of rooms occupied in a specific day.</li><li><strong>Rooms in maintenance/unavailable</strong> — a plain number, no unit. This number will be subtracted from the total rooms number to accurately calculate occupancy.</li><li><strong>Total rooms</strong> — a plain number, no unit. Total number of rooms in your property.</li></ul><p>The result boxes are Calculate occupancy for in days, Room-nights (in a month), Rooms-nights (custom time), Room-nights in maintenance, Room-nights in maintenance, Total rooms, Total rooms, Daily rate in %, Monthly rate in %, Custom rate in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Calculate occupancy for lists 6 options and opens on days. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Daily rate</strong> = <code>− 100 × Rooms occupied (in a day) ÷ (Rooms in maintenance/unavailable − Total rooms)</code></li><li><strong>Rooms occupied (in a day)</strong> = <code>(1 ÷ 100) × Daily rate × ( − Rooms in maintenance/unavailable + Total rooms)</code></li><li><strong>Rooms in maintenance/unavailable</strong> = <code>Total rooms − 100 × Rooms occupied (in a day) ÷ Daily rate</code></li><li><strong>Total rooms</strong> = <code>Rooms in maintenance/unavailable + 100 × Rooms occupied (in a day) ÷ Daily rate</code></li><li><strong>Monthly rate</strong> = <code>− 100 × Room-nights (in a month) ÷ (Room-nights in maintenance − 30 × Total rooms)</code></li><li><strong>Room-nights (in a month)</strong> = <code>(1 ÷ 100) × Monthly rate × ( − Room-nights in maintenance + 30 × Total rooms)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Daily rate</strong> = <code>− 100 × Rooms occupied (in a day) ÷ (Rooms in maintenance/unavailable − Total rooms)</code> — the form to use when Rooms occupied (in a day), Rooms in maintenance/unavailable and Total rooms are the values you have.</li><li><strong>Rooms occupied (in a day)</strong> = <code>(1 ÷ 100) × Daily rate × ( − Rooms in maintenance/unavailable + Total rooms)</code> — the form to use when Daily rate, Rooms in maintenance/unavailable and Total rooms are the values you have.</li><li><strong>Rooms in maintenance/unavailable</strong> = <code>Total rooms − 100 × Rooms occupied (in a day) ÷ Daily rate</code> — the form to use when Total rooms, Rooms occupied (in a day) and Daily rate are the values you have.</li><li><strong>Total rooms</strong> = <code>Rooms in maintenance/unavailable + 100 × Rooms occupied (in a day) ÷ Daily rate</code> — the form to use when Rooms in maintenance/unavailable, Rooms occupied (in a day) and Daily rate are the values you have.</li><li><strong>Monthly rate</strong> = <code>− 100 × Room-nights (in a month) ÷ (Room-nights in maintenance − 30 × Total rooms)</code> — the form to use when Room-nights (in a month), Room-nights in maintenance and Total rooms are the values you have.</li><li><strong>Total rooms</strong> = <code>(1 ÷ 30) × (Room-nights in maintenance × Monthly rate + 100 × Room-nights (in a month)) ÷ Monthly rate</code> — the form to use when Room-nights in maintenance, Monthly rate and Room-nights (in a month) are the values you have.</li><li><strong>Room-nights (in a month)</strong> = <code>(1 ÷ 100) × Monthly rate × ( − Room-nights in maintenance + 30 × Total rooms)</code> — the form to use when Monthly rate, Room-nights in maintenance and Total rooms are the values you have.</li><li><strong>Room-nights in maintenance</strong> = <code>30 × Total rooms − 100 × Room-nights (in a month) ÷ Monthly rate</code> — the form to use when Total rooms, Room-nights (in a month) and Monthly rate are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Daily rate, Rooms occupied (in a day) and Rooms in maintenance/unavailable can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Calculate occupancy for, Room-nights (in a month) and Rooms-nights (custom time) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Rooms occupied (in a day) left as a guess.</strong> Anything typed into Rooms occupied (in a day) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Rooms in maintenance/unavailable left as a guess.</strong> Anything typed into Rooms in maintenance/unavailable is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Total rooms left as a guess.</strong> Anything typed into Total rooms is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Rooms occupied (in a day) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Occupancy rate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Rooms occupied (in a day)</strong> takes a plain number with no unit attached. The number of rooms occupied in a specific day. It feeds Daily rate, Rooms in maintenance/unavailable and Total rooms. Fill it from a measurement rather than a memory — Rooms occupied (in a day) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Rooms in maintenance/unavailable</strong> takes a plain number with no unit attached. This number will be subtracted from the total rooms number to accurately calculate occupancy. It feeds Rooms occupied (in a day), Daily rate and Total rooms. Fill it from a measurement rather than a memory — Rooms in maintenance/unavailable is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total rooms</strong> takes a plain number with no unit attached. Total number of rooms in your property. It feeds Rooms occupied (in a day), Daily rate and Rooms in maintenance/unavailable. Fill it from a measurement rather than a memory — Total rooms is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Rooms occupied (in a day), Rooms in maintenance/unavailable and Total rooms ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Rooms occupied (in a day) — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Calculate occupancy for in days against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Calculate occupancy for is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover days. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Rooms occupied (in a day), Rooms in maintenance/unavailable and Total rooms is what you already know and Calculate occupancy for and Room-nights (in a month) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/529">529 Calculator</a>, <a href="/finance/70-20-10-rule-money">70/20/10 rule money Calculator</a> and <a href="/finance/ar-days">A/R days Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Occupancy rate is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Rooms occupied (in a day), Rooms in maintenance/unavailable and Total rooms beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Occupancy rate calculator work out?', 'a' => <<<'TXT'
            Calculate occupancy for, Room-nights (in a month), Rooms-nights (custom time) and Room-nights in maintenance, from Rooms occupied (in a day), Rooms in maintenance/unavailable and Total rooms. The relationship is Daily rate = − 100 × Rooms occupied (in a day) ÷ (Rooms in maintenance/unavailable − Total rooms).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Rooms occupied (in a day), Rooms in maintenance/unavailable, Total rooms. Enter rooms occupied (in a day), rooms in maintenance/unavailable and total rooms; Calculate occupancy for is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Daily rate, Rooms occupied (in a day), Rooms in maintenance/unavailable and Total rooms can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Calculate occupancy for is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Rooms occupied (in a day) blank and the page solves for it, reporting Calculate occupancy for instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Calculate occupancy for keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/529', 'name' => '529 Calculator'],
            ['path' => '/finance/70-20-10-rule-money', 'name' => '70/20/10 rule money Calculator'],
            ['path' => '/finance/ar-days', 'name' => 'A/R days Calculator'],
        ],
        'authors' => [],
    ],
];

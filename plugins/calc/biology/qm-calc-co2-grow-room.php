<?php

/**
 * CO₂ grow room
 * /biology/co2-grow-room
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'CO₂ grow room',
    'meta' => ['title' => 'CO₂ grow room Calculator — Formula & Results', 'description' => 'CO₂ grow room takes width, length and height and returns area and volume. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'CO₂ grow room Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => 'Grow room dimensions',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'roomWidth',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'roomLength',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ceilingHeight',
                            'label' => 'Height',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'roomArea',
                            'label' => 'Area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'roomVolume',
                            'label' => 'Volume',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'CO₂ levels',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'currentCO2',
                            'label' => 'Current CO₂',
                            'type' => 'number',
                            'help' => 'Atmospheric CO₂ is around 412 ppm.',
                            'unit' => '21',
                            'unit_default' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'targetCO2',
                            'label' => 'Target CO₂',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'neededCO2',
                            'label' => 'Required CO₂',
                            'type' => 'number',
                            'help' => 'Volume of CO₂ required to fill the room to the target CO₂ level.',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'CO₂ tank',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time',
                            'label' => 'Time',
                            'type' => 'number',
                            'help' => 'Time the tank is on.',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'flowRate',
                            'label' => ' CO₂ flow rate',
                            'type' => 'number',
                            'unit' => '146',
                            'unit_default' => 'm-hour',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'roomArea=roomLength*roomWidth',
            'results' => ['roomLength' => 'roomArea/roomWidth', 'roomWidth' => 'roomArea/roomLength', 'roomArea' => 'roomLength*roomWidth'],
        ],
        [
            'title' => 'roomVolume=ceilingHeight*roomArea',
            'results' => ['roomVolume' => 'ceilingHeight*roomArea', 'ceilingHeight' => 'roomVolume/roomArea', 'roomArea' => 'roomVolume/ceilingHeight'],
        ],
        [
            'title' => 'neededCO2 = (targetCO2 - currentCO2)/10^6 * roomVolume',
            'results' => ['roomVolume' => '-1000000*neededCO2/(currentCO2 - targetCO2)', 'currentCO2' => '-1000000*neededCO2/roomVolume + targetCO2', 'neededCO2' => '(1/1000000)*roomVolume*(-currentCO2 + targetCO2)', 'targetCO2' => 'currentCO2 + 1000000*neededCO2/roomVolume'],
        ],
        [
            'title' => 'flowRate = neededCO2/time',
            'results' => ['flowRate' => 'neededCO2/time', 'time' => 'neededCO2/flowRate', 'neededCO2' => 'flowRate*time'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Width and Length into CO₂ grow room and the answer comes back as Height and Area. There is no hidden constant here: change height and width moves with it. The main result, Height, is reported in meters.
        TXT,
        'sections' => [
            ['title' => 'How the CO₂ grow room calculator works', 'html' => <<<'TXT'
            <p>CO₂ grow room answers one question from 2 numbers, and the answer is Height, Area and Volume.</p><p>The relationship it solves reads Length = Area ÷ Width.</p><p>The answers are Height, Area, Volume and Current CO₂; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Width</strong> — in meters</li><li><strong>Length</strong> — in meters</li></ul><p>The answers come back as Height in meters, Area in square meters, Volume in cubic meters, Current CO₂ in parts per million, Target CO₂ in parts per million, Required CO₂ in cubic meters, Time in minutes, CO₂ flow rate in cubic meters per hour. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Width = 10 m, Height = 100 m, Area = 1000 m2, Volume = 10 m3, Current CO₂ = 100 ppm, Target CO₂ = 1000 ppm, Required CO₂ = 10 m3, Time = 100 min and CO₂ flow rate = 1000 m-hour gives <strong>Length</strong> = 100 m.</p><ul><li><strong>Length</strong> = 100 m</li></ul><p>That is <strong>Length</strong> = <code>Area ÷ Width</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Length</strong> = 100. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Height lists 31 options and opens on meters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Length</strong> = <code>Area ÷ Width</code></li><li><strong>Width</strong> = <code>Area ÷ Length</code></li><li><strong>Area</strong> = <code>Length × Width</code></li><li><strong>Volume</strong> = <code>Height × Area</code></li><li><strong>Height</strong> = <code>Volume ÷ Area</code></li><li><strong>Current CO₂</strong> = <code>− 1000000 × Required CO₂ ÷ Volume + Target CO₂</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Length</strong> = <code>Area ÷ Width</code> — the form to use when Area and Width are the values you have.</li><li><strong>Width</strong> = <code>Area ÷ Length</code> — the form to use when Area and Length are the values you have.</li><li><strong>Area</strong> = <code>Length × Width</code> — the form to use when Length and Width are the values you have.</li><li><strong>Volume</strong> = <code>Height × Area</code> — the form to use when Height and Area are the values you have.</li><li><strong>Height</strong> = <code>Volume ÷ Area</code> — the form to use when Volume and Area are the values you have.</li><li><strong>Area</strong> = <code>Volume ÷ Height</code> — the form to use when Volume and Height are the values you have.</li><li><strong>Volume</strong> = <code>− 1000000 × Required CO₂ ÷ (Current CO₂ − Target CO₂)</code> — the form to use when Required CO₂, Current CO₂ and Target CO₂ are the values you have.</li><li><strong>Current CO₂</strong> = <code>− 1000000 × Required CO₂ ÷ Volume + Target CO₂</code> — the form to use when Required CO₂, Volume and Target CO₂ are the values you have.</li></ul><p>Any one of Length, Width and Area can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Width from 10 to 20, leaving every other box alone. The panel moves from <strong>Length</strong> 100 m to <strong>Length</strong> 50 m.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Width and Length carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Height, Area and Volume are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Width left as a guess.</strong> Anything typed into Width is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Length left as a guess.</strong> Anything typed into Length is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Width and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Width</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. Change it and Length and Area changes with it. Have it to hand before you start: Width is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Length</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. Change it and Width and Area changes with it. Have it to hand before you start: Length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Height</strong> is a meters figure. It is worked out from Volume and Area. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Area</strong> is a square meters figure. It is worked out from Length and Width. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Volume</strong> is a cubic meters figure. It is worked out from Height and Area. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Current CO₂</strong> is a parts per million figure. It is worked out from Required CO₂, Volume and Target CO₂. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Target CO₂</strong> is a parts per million figure. It is worked out from Current CO₂, Required CO₂ and Volume. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Required CO₂</strong> is a cubic meters figure. It is worked out from Volume, Current CO₂ and Target CO₂. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Time</strong> is a minutes figure. It is worked out from Required CO₂ and CO₂ flow rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>CO₂ flow rate</strong> is a cubic meters per hour figure. It is worked out from Required CO₂ and Time. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>meters</strong> — 31 units. It opens in <em>m</em>, and the chip also carries in, m, ft, Å, nm and pm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>square meters</strong> — 24 units. It opens in <em>m2</em>, and the chip also carries ac, m², ft², cm², in² and a. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>cubic meters</strong> — 40 units. It opens in <em>m3</em>, and the chip also carries m³, cu ft, US fl oz, L, dm³ and cu in. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>parts per million</strong> — 28 units. It opens in <em>ppm</em>, and the chip also carries µg/mL, g/L, mg/L, kg/m³, lb/cu ft and g/mL. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>minutes</strong> — 18 units. It opens in <em>min</em>, and the chip also carries yrs, min, 15 sec, days, wks and mos. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>cubic meters per hour</strong> — 39 units. It opens in <em>m-hour</em>, and the chip also carries ft³/hr, m³/day, US gal/day, US gal/hr, L/min and US gal/min. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Height is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are meters, square meters and cubic meters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Width and Length are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Width and Length is what you already know and Height and Area is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/daily-light-integral-dli">Daily light integral (DLI) Calculator</a>, <a href="/biology/days-to-maturity">Days to Maturity Calculator</a> and <a href="/biology/dihybrid-cross">Dihybrid Cross (9:3:3:1) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the CO₂ grow room calculator work out?', 'a' => 'Height, Area, Volume and Current CO₂, from Area and Width. The relationship is Length = Area ÷ Width.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Width (meters), Length (meters). Fill width and length and leave Height empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Length, Width, Area and Volume blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Length = 100 m. That comes from the page\'s own defaults, entered in Width; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Height is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Width left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Height keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/daily-light-integral-dli', 'name' => 'Daily light integral (DLI) Calculator'],
            ['path' => '/biology/days-to-maturity', 'name' => 'Days to Maturity Calculator'],
            ['path' => '/biology/dihybrid-cross', 'name' => 'Dihybrid Cross (9:3:3:1) Calculator'],
        ],
        'authors' => [],
    ],
];

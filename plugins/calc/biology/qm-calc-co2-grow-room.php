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
    'meta' => ['title' => 'CO₂ grow room Calculator — Formula & Results', 'description' => <<<'TXT'
    Enter Width and Area into CO₂ grow room and the answer comes back as Length and Height. Fill roomWidth and roomArea and leave Length empty if you would rather…
    TXT, 'h1' => 'CO₂ grow room Calculator', 'updated' => '2026-08-12'],
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
                            'unit' => '20',
                            'unit_default' => 'm3',
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
                            'unit' => '20',
                            'unit_default' => 'm3',
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
        Enter Width and Area into CO₂ grow room and the answer comes back as Length and Height. There is no hidden constant here: change Length and Width moves with it. The main result, Length, is reported in meters.
        TXT,
        'sections' => [
            ['title' => 'How the CO₂ grow room calculator works', 'html' => <<<'TXT'
            <p>CO₂ grow room answers one question from 2 numbers, and the answer is Length, Height and Volume.</p><p>The relationship it solves reads Length = Area ÷ Width.</p><p>The answers are Length, Height, Volume and Current CO₂; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Width</strong> — in meters</li><li><strong>Area</strong> — in square meters</li></ul><p>The answers come back as Length in meters, Height in meters, Volume in cubic meters, Current CO₂ in parts per million, Target CO₂ in parts per million, Required CO₂ in cubic meters, Time in minutes, CO₂ flow rate in cubic meters per hour. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Length</strong> = <code>Area ÷ Width</code></li><li><strong>Width</strong> = <code>Area ÷ Length</code></li><li><strong>Area</strong> = <code>Length × Width</code></li><li><strong>Volume</strong> = <code>Height × Area</code></li><li><strong>Height</strong> = <code>Volume ÷ Area</code></li><li><strong>Current CO₂</strong> = <code>− 1000000 × Required CO₂ ÷ Volume + Target CO₂</code></li></ul><p>Any one of Length, Width and Area can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Width and Area carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Length, Height and Volume are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Width and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Width and Area is what you already know and Length and Height is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/daily-light-integral-dli">Daily light integral (DLI) Calculator</a>, <a href="/biology/days-to-maturity">Days to Maturity Calculator</a> and <a href="/biology/dihybrid-cross">Dihybrid Cross (9:3:3:1) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the CO₂ grow room calculator work out?', 'a' => 'Length, Height, Volume and Current CO₂, from Area and Width. The relationship is Length = Area ÷ Width.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Width (meters), Area (square meters). Fill roomWidth and roomArea and leave Length empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Length, Width, Area and Volume blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Width left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Length keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/daily-light-integral-dli', 'name' => 'Daily light integral (DLI) Calculator'],
            ['path' => '/biology/days-to-maturity', 'name' => 'Days to Maturity Calculator'],
            ['path' => '/biology/dihybrid-cross', 'name' => 'Dihybrid Cross (9:3:3:1) Calculator'],
        ],
        'authors' => [],
    ],
];

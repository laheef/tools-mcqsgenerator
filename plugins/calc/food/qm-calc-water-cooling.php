<?php

/**
 * Water cooling
 * /food/water-cooling
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Water cooling',
    'meta' => ['title' => 'Water cooling Calculator — Formula & Results', 'description' => 'Estimate water-cooling time from method, room conditions and container dimensions. Check units and follow the recipe or package directions.', 'h1' => 'Water cooling Calculator', 'updated' => '2026-08-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'method',
                            'label' => 'Method',
                            'type' => 'select',
                            'options' => ['Wait some time' => '0', 'Add colder water' => '1', 'Pour water between glasses' => '2'],
                            'dataset' => 'cooling method',
                            'default' => 'Wait some time',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ambient_temperature',
                            'label' => 'Ambient temperature',
                            'type' => 'number',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '24.6', 'when' => null],
                                ['value' => '76', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cold_water_temperature',
                            'label' => 'Room/tap water temperature',
                            'type' => 'number',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '15', 'when' => null],
                                ['value' => '60', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_temperature',
                            'label' => 'Initial temperature',
                            'type' => 'number',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '100', 'when' => null],
                                ['value' => '212', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'desired_temperature',
                            'label' => 'Desired temperature',
                            'type' => 'number',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'volume',
                            'label' => 'Volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cup_diameter',
                            'label' => 'Cup diameter',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '5.8', 'when' => null],
                                ['value' => '2.3', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'exchange_area',
                            'label' => 'Exchange area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'cm2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'waiting_time',
                            'label' => 'Waiting time',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'minsec',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pouring_times',
                            'label' => 'How many times?',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hot_water_volume',
                            'label' => 'Mix',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cold_water_volume',
                            'label' => 'and',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'exchange_area = pi * cup_diameter^2 / 4',
            'results' => ['cup_diameter' => '2*sqrt(exchange_area)/sqrt(PI)', 'exchange_area' => '(1/4)*PI*pow(cup_diameter, 2)'],
        ],
        [
            'title' => 'waiting_time = waitingTime(desired_temperature, ambient_temperature, initial_temperature, exchange_area, volume)',
            'results' => ['waiting_time' => 'waitingTime(desired_temperature, ambient_temperature, initial_temperature, exchange_area, volume)'],
        ],
        [
            'title' => 'cold_water_volume = waterProportions(desired_temperature, ambient_temperature, initial_temperature, cold_water_temperature, volume)',
            'results' => ['cold_water_volume' => 'waterProportions(desired_temperature, ambient_temperature, initial_temperature, cold_water_temperature, volume)'],
        ],
        [
            'title' => 'hot_water_volume = one_way(volume - cold_water_volume)',
            'results' => ['hot_water_volume' => '(volume - waterProportions(desired_temperature, ambient_temperature, initial_temperature, cold_water_temperature, volume))'],
        ],
        [
            'title' => 'pouring_times = pourWater(desired_temperature, ambient_temperature, initial_temperature)',
            'results' => ['pouring_times' => 'pourWater(desired_temperature, ambient_temperature, initial_temperature)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("waitingTime",function(desired,ambient,initial,exchange_area,volume){var h=284.16;var specific_heat=4200;var density=973;var time=0;var cooling_constant=h*exchange_area/(specific_heat*density*volume);return time-Math.log((desired-ambient)/(initial-ambient))/cooling_constant});omni.define("pourWater",function(desired,ambient,initial){var k=0.05626;if(desired>=initial){return 0}return-Math.log((desired-ambient)/(initial-ambient))/k});omni.define("waterProportions",function(desired,ambient,initial,cold,volume){if(desired>=initial){return 0}return volume*(desired-initial)/(cold-initial)});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Water cooling turns Cup diameter into Exchange area and Waiting time. It is a single relationship that reads exchange area out of cup diameter, not a table of canned results keyed by them. Units for Exchange area default to square centimeters and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Water cooling calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Water cooling: it takes 1 number and reports Exchange area, Waiting time and How many times?.</p><p>In the form&#039;s own words, Exchange area = (1 ÷ 4) × PI × (Cup diameter)^(2).</p><p>The result panel carries Exchange area, Waiting time, How many times? and Mix, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Cup diameter</strong> — in centimeters</li></ul><p>The result boxes are Exchange area in square centimeters, Waiting time in minutes / seconds, How many times?, Mix in milliliters, and in milliliters; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Exchange area offers 6 units and opens on square centimeters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Exchange area</strong> = <code>(1 ÷ 4) × PI × (Cup diameter)^(2)</code></li><li><strong>Cup diameter</strong> = <code>2 × √(Exchange area) ÷ √(PI)</code></li><li><strong>Waiting time</strong> = <code>waitingTime(Desired temperature, Ambient temperature, Initial temperature, Exchange area, Volume)</code></li><li><strong>and</strong> = <code>waterProportions(Desired temperature, Ambient temperature, Initial temperature, Room/tap water temperature, Volume)</code></li><li><strong>Mix</strong> = <code>(Volume − waterProportions(Desired temperature, Ambient temperature, Initial temperature, Room/tap water temperature, Volume))</code></li><li><strong>How many times?</strong> = <code>pourWater(Desired temperature, Ambient temperature, Initial temperature)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Exchange area</strong> = <code>(1 ÷ 4) × PI × (Cup diameter)^(2)</code> — the form to use when Cup diameter are the values you have.</li><li><strong>Cup diameter</strong> = <code>2 × √(Exchange area) ÷ √(PI)</code> — the form to use when Exchange area are the values you have.</li><li><strong>Waiting time</strong> = <code>waitingTime(Desired temperature, Ambient temperature, Initial temperature, Exchange area, Volume)</code> — the form to use when Desired temperature, Ambient temperature, Initial temperature and Exchange area are the values you have.</li><li><strong>and</strong> = <code>waterProportions(Desired temperature, Ambient temperature, Initial temperature, Room/tap water temperature, Volume)</code> — the form to use when Desired temperature, Ambient temperature, Initial temperature and Room/tap water temperature are the values you have.</li><li><strong>Mix</strong> = <code>(Volume − waterProportions(Desired temperature, Ambient temperature, Initial temperature, Room/tap water temperature, Volume))</code> — the form to use when Volume, Desired temperature, Ambient temperature and Initial temperature are the values you have.</li><li><strong>How many times?</strong> = <code>pourWater(Desired temperature, Ambient temperature, Initial temperature)</code> — the form to use when Desired temperature, Ambient temperature and Initial temperature are the values you have.</li></ul><p>Any one of Exchange area, Cup diameter and Waiting time can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Cup diameter is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Exchange area, Waiting time and How many times? are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Cup diameter left as a guess.</strong> If Cup diameter is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> If Cup diameter is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Cup diameter</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. It feeds Exchange area. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Exchange area</strong> is a square centimeters figure. The value follows from Cup diameter. </li><li><strong>Waiting time</strong> is a minutes / seconds figure. The value follows from Desired temperature, Ambient temperature, Initial temperature and Exchange area. </li><li><strong>How many times?</strong> is a plain number. The value follows from Desired temperature, Ambient temperature and Initial temperature. </li><li><strong>Mix</strong> is a milliliters figure. The value follows from Volume, Desired temperature, Ambient temperature and Initial temperature. </li><li><strong>and</strong> is a milliliters figure. The value follows from Desired temperature, Ambient temperature, Initial temperature and Room/tap water temperature. </li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p> The tables, with the unit each box opens in:</p><ul><li><strong>square centimeters</strong> — opens in <em>cm2</em>, and the chip also carries cm², m², in², ft² and yd². Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>minutes / seconds</strong> — opens in <em>minsec</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>milliliters</strong> — opens in <em>ml</em>, and the chip also carries L, µl, cl, cc, cm³ and tsp. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>centimeters</strong> — opens in <em>cm</em>, and the chip also carries cm, m, in, ft, yd and μm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Exchange area is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover square centimeters, minutes / seconds and milliliters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Cup diameter is what you already know and Exchange area and Waiting time is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related calculators: <a href="/food/chilled-drink">Chilled drink</a>, <a href="/food/ice-cream">Ice cream</a> and <a href="/food/party-drink">Party drink</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Water cooling calculator work out?', 'a' => 'Exchange area, Waiting time, How many times? and Mix, from Cup diameter. The relationship is Exchange area = (1 ÷ 4) × PI × (Cup diameter)^(2).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Cup diameter (centimeters). Enter cup diameter; Exchange area is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Exchange area, Cup diameter, Waiting time and and blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Exchange area is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Cup diameter left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Exchange area keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/chilled-drink', 'name' => 'Chilled drink'],
            ['path' => '/food/ice-cream', 'name' => 'Ice cream'],
            ['path' => '/food/party-drink', 'name' => 'Party drink']
        ],
    ],
];

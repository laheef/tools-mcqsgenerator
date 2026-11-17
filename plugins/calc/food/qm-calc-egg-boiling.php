<?php

/**
 * Ideal egg boiling
 * /food/egg-boiling
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Ideal egg boiling',
    'meta' => ['title' => 'Ideal egg boiling: Formula, Steps & Results', 'description' => 'Estimate egg boiling time from egg size, starting temperature and conditions such as altitude. Use as a guide; follow safe-handling instructions.', 'h1' => 'Ideal egg boiling Calculator', 'updated' => '2026-08-26'],
    'sections' => [
        [
            'title' => 'Egg cooking setup',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'size',
                            'label' => 'Egg\'s size',
                            'type' => 'select',
                            'options' => [
                                'US Jumbo' => '1',
                                'US XL' => '2',
                                'US L' => '3',
                                'US M' => '4',
                                'US S' => '5',
                                'US Peewee' => '6',
                                'EU XL' => '7',
                                'EU L' => '8',
                                'EU M' => '9',
                                'EU S' => '10',
                                'CA Jumbo' => '11',
                                'CA Extra Large' => '12',
                                'CA Large' => '13',
                                'CA Medium' => '14',
                                'CA Small' => '15',
                                'CA Peewee' => '16',
                                'Enter egg\'s weight' => '0',
                            ],
                            'dataset' => 'egg sizes',
                            'control' => 'DROPDOWN',
                            'help' => 'Select the enter egg\'s weight option at the end of the list for more precise results or if you cannot find proper egg\'s size.',
                            'defaults' => [
                                ['value' => 'EU M', 'when' => null],
                                ['value' => 'US M', 'when' => 'userUsesImperialUnits()'],
                                ['value' => 'CA Medium', 'when' => 'isUserFromCountry(\'CA\')'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Egg\'s weight',
                            'type' => 'result',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'origin',
                            'label' => 'Egg\'s origin',
                            'type' => 'select',
                            'options' => ['Fridge' => '1', 'Room temperature' => '2', 'I want to specify temperature' => '0'],
                            'dataset' => 'egg origins',
                            'default' => 'Fridge',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'temperature',
                            'label' => 'Egg\'s initial temperature',
                            'type' => 'result',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4.000000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'altitude',
                            'label' => 'Altitude',
                            'type' => 'number',
                            'help' => 'How high above sea level are your eggs? This impacts the air pressure, which in turn determines the boiling point of water.',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pressure',
                            'label' => 'Air pressure',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'hPa',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'boiling_point',
                            'label' => 'Boiling point of water',
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
                        ['type' => 'note', 'text' => 'The boiling point of water is too low to cook an egg in any way. Reduce the altitude to increase it.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Egg boiling times',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quarter_boiled_egg_time',
                            'label' => 'Quarter-boiled',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'minsec',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'soft_egg_time',
                            'label' => 'Soft egg',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'minsec',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'half_boiled_egg_time',
                            'label' => 'Half-boiled',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'minsec',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hard_egg_time',
                            'label' => 'Hard egg',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'minsec',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'The boiling point of water is too low to cook hard eggs. Reduce the altitude to increase it.'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'soft_egg_time = get_time1(weight, temperature, boiling_point)',
            'results' => ['soft_egg_time' => <<<'TXT'
            get_time1(weight, temperature, ((16387/600)*log(((29921/100000000000000000000000000000000000000000000000000000000)*pow(10, 441/1000)*pow(10000000000 - 68753*altitude, 52559/10000))) + 3233/450))
            TXT],
        ],
        [
            'title' => 'hard_egg_time = get_time2(weight, temperature, boiling_point)',
            'results' => ['hard_egg_time' => <<<'TXT'
            get_time2(weight, temperature, ((16387/600)*log(((29921/100000000000000000000000000000000000000000000000000000000)*pow(10, 441/1000)*pow(10000000000 - 68753*altitude, 52559/10000))) + 3233/450))
            TXT],
        ],
        [
            'title' => 'quarter_boiled_egg_time = get_time3(weight, temperature, boiling_point)',
            'results' => ['quarter_boiled_egg_time' => <<<'TXT'
            get_time3(weight, temperature, ((16387/600)*log(((29921/100000000000000000000000000000000000000000000000000000000)*pow(10, 441/1000)*pow(10000000000 - 68753*altitude, 52559/10000))) + 3233/450))
            TXT],
        ],
        [
            'title' => 'half_boiled_egg_time = get_time4(weight, temperature, boiling_point)',
            'results' => ['half_boiled_egg_time' => <<<'TXT'
            get_time4(weight, temperature, ((16387/600)*log(((29921/100000000000000000000000000000000000000000000000000000000)*pow(10, 441/1000)*pow(10000000000 - 68753*altitude, 52559/10000))) + 3233/450))
            TXT],
        ],
        [
            'title' => 'pressure = one_way(29.921* (1 - 0.0000068753 * altitude)^ 5.2559)',
            'results' => ['pressure' => '((29921/100000000000000000000000000000000000000000000000000000000)*pow(10, 441/1000)*pow(10000000000 - 68753*altitude, 52559/10000))'],
        ],
        [
            'title' => 'boiling_point = one_way((49.161 * ln(pressure) + 44.932 - 32)* 5/9)',
            'results' => ['boiling_point' => <<<'TXT'
            ((16387/600)*log(((29921/100000000000000000000000000000000000000000000000000000000)*pow(10, 441/1000)*pow(10000000000 - 68753*altitude, 52559/10000))) + 3233/450)
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var softTemp=65;var hardTemp=77;var heatCoeff=31;var yolkWhiteRatio=0.86;var yolkWhiteRatio_quarter=0.6;var yolkWhiteRatio_half=0.98;omni.define("get_time1",function(weight,tegg,boilingPoint){if(boilingPoint<=softTemp){return NaN}return Math.pow(weight,2/3)*heatCoeff*Math.log(yolkWhiteRatio*(tegg-boilingPoint)/(softTemp-boilingPoint))+10});omni.define("get_time2",function(weight,tegg,boilingPoint){if(boilingPoint<=hardTemp){return NaN}return Math.pow(weight,2/3)*heatCoeff*Math.log(yolkWhiteRatio*(tegg-boilingPoint)/(hardTemp-boilingPoint))+10});omni.define("get_time3",function(weight,tegg,boilingPoint){if(boilingPoint<=softTemp){return NaN}return Math.pow(weight,2/3)*heatCoeff*Math.log(yolkWhiteRatio_quarter*(tegg-boilingPoint)/(softTemp-boilingPoint))+10});omni.define("get_time4",function(weight,tegg,boilingPoint){if(boilingPoint<=softTemp){return NaN}return Math.pow(weight,2/3)*heatCoeff*Math.log(yolkWhiteRatio_half*(tegg-boilingPoint)/(softTemp-boilingPoint))+10});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Egg's size, Egg's origin and Altitude into Ideal egg boiling and the answer comes back as Egg's weight and Egg's initial temperature. The arithmetic is the whole method: egg's weight is worked out from egg's size by one formula, applied once. Egg's weight comes back in grams unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Ideal egg boiling calculator works', 'html' => <<<'TXT'
            <p>Ideal egg boiling answers one question from 9 numbers, and the answer is Egg&#039;s weight and Egg&#039;s initial temperature.</p><p>In the form&#039;s own words, Soft egg = get_time1(Egg&#039;s weight, Egg&#039;s initial temperature, ((16387 ÷ 600) × ln(((29921 ÷ 100000000000000000000000000000000000000000000000000000000) × (10)^(441 ÷ 1000) × (10000000000 − 68753 × Altitude)^(52559 ÷ 10000))) + 3233 ÷ 450)).</p><p>What comes back is Egg&#039;s weight and Egg&#039;s initial temperature — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 9 boxes and the page has everything it needs.</p><ul><li><strong>Egg&#039;s size</strong> — a plain number, no unit. Select the enter egg&#039;s weight option at the end of the list for more precise results or if you cannot find proper egg&#039;s size.</li><li><strong>Egg&#039;s origin</strong> — a plain number, no unit</li><li><strong>Altitude</strong> — in meters. How high above sea level are your eggs? This impacts the air pressure, which in turn determines the boiling point of water.</li><li><strong>Air pressure</strong> — in hectopascals</li><li><strong>Boiling point of water</strong> — in Celsius</li><li><strong>Quarter-boiled</strong> — in minutes / seconds</li><li><strong>Soft egg</strong> — in minutes / seconds</li><li><strong>Half-boiled</strong> — in minutes / seconds</li><li><strong>Hard egg</strong> — in minutes / seconds</li></ul><p>The result boxes are Egg&#039;s weight in grams, Egg&#039;s initial temperature in Celsius; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Egg&amp;#039;s size = 9, Egg&amp;#039;s origin = 1 and Altitude = 3 m gives <strong>Air pressure</strong> = 29.92 hPa and <strong>Boiling point of water</strong> = 100 C.</p><ul><li><strong>Air pressure</strong> = 29.92 hPa</li><li><strong>Boiling point of water</strong> = 100 C</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Soft egg</strong> = <code>get_time1(Egg&#039;s weight, Egg&#039;s initial temperature, ((16387 ÷ 600) × ln(((29921 ÷ 100000000000000000000000000000000000000000000000000000000) × (10)^(441 ÷ 1000) × (10000000000 − 68753 × Altitude)^(52559 ÷ 10000))) + 3233 ÷ 450))</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Air pressure</strong> = 29.92 and <strong>Boiling point of water</strong> = 100. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Egg&#039;s weight lists 6 options and opens on grams. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Soft egg</strong> = <code>get_time1(Egg&#039;s weight, Egg&#039;s initial temperature, ((16387 ÷ 600) × ln(((29921 ÷ 100000000000000000000000000000000000000000000000000000000) × (10)^(441 ÷ 1000) × (10000000000 − 68753 × Altitude)^(52559 ÷ 10000))) + 3233 ÷ 450))</code></li><li><strong>Hard egg</strong> = <code>get_time2(Egg&#039;s weight, Egg&#039;s initial temperature, ((16387 ÷ 600) × ln(((29921 ÷ 100000000000000000000000000000000000000000000000000000000) × (10)^(441 ÷ 1000) × (10000000000 − 68753 × Altitude)^(52559 ÷ 10000))) + 3233 ÷ 450))</code></li><li><strong>Quarter-boiled</strong> = <code>get_time3(Egg&#039;s weight, Egg&#039;s initial temperature, ((16387 ÷ 600) × ln(((29921 ÷ 100000000000000000000000000000000000000000000000000000000) × (10)^(441 ÷ 1000) × (10000000000 − 68753 × Altitude)^(52559 ÷ 10000))) + 3233 ÷ 450))</code></li><li><strong>Half-boiled</strong> = <code>get_time4(Egg&#039;s weight, Egg&#039;s initial temperature, ((16387 ÷ 600) × ln(((29921 ÷ 100000000000000000000000000000000000000000000000000000000) × (10)^(441 ÷ 1000) × (10000000000 − 68753 × Altitude)^(52559 ÷ 10000))) + 3233 ÷ 450))</code></li><li><strong>Air pressure</strong> = <code>((29921 ÷ 100000000000000000000000000000000000000000000000000000000) × (10)^(441 ÷ 1000) × (10000000000 − 68753 × Altitude)^(52559 ÷ 10000))</code></li><li><strong>Boiling point of water</strong> = <code>((16387 ÷ 600) × ln(((29921 ÷ 100000000000000000000000000000000000000000000000000000000) × (10)^(441 ÷ 1000) × (10000000000 − 68753 × Altitude)^(52559 ÷ 10000))) + 3233 ÷ 450)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Soft egg</strong> = <code>get_time1(Egg&#039;s weight, Egg&#039;s initial temperature, ((16387 ÷ 600) × ln(((29921 ÷ 100000000000000000000000000000000000000000000000000000000) × (10)^(441 ÷ 1000) × (10000000000 − 68753 × Altitude)^(52559 ÷ 10000))) + 3233 ÷ 450))</code> — the form to use when Egg&#039;s weight, Egg&#039;s initial temperature and Altitude are the values you have.</li><li><strong>Hard egg</strong> = <code>get_time2(Egg&#039;s weight, Egg&#039;s initial temperature, ((16387 ÷ 600) × ln(((29921 ÷ 100000000000000000000000000000000000000000000000000000000) × (10)^(441 ÷ 1000) × (10000000000 − 68753 × Altitude)^(52559 ÷ 10000))) + 3233 ÷ 450))</code> — the form to use when Egg&#039;s weight, Egg&#039;s initial temperature and Altitude are the values you have.</li><li><strong>Quarter-boiled</strong> = <code>get_time3(Egg&#039;s weight, Egg&#039;s initial temperature, ((16387 ÷ 600) × ln(((29921 ÷ 100000000000000000000000000000000000000000000000000000000) × (10)^(441 ÷ 1000) × (10000000000 − 68753 × Altitude)^(52559 ÷ 10000))) + 3233 ÷ 450))</code> — the form to use when Egg&#039;s weight, Egg&#039;s initial temperature and Altitude are the values you have.</li><li><strong>Half-boiled</strong> = <code>get_time4(Egg&#039;s weight, Egg&#039;s initial temperature, ((16387 ÷ 600) × ln(((29921 ÷ 100000000000000000000000000000000000000000000000000000000) × (10)^(441 ÷ 1000) × (10000000000 − 68753 × Altitude)^(52559 ÷ 10000))) + 3233 ÷ 450))</code> — the form to use when Egg&#039;s weight, Egg&#039;s initial temperature and Altitude are the values you have.</li><li><strong>Air pressure</strong> = <code>((29921 ÷ 100000000000000000000000000000000000000000000000000000000) × (10)^(441 ÷ 1000) × (10000000000 − 68753 × Altitude)^(52559 ÷ 10000))</code> — the form to use when Altitude are the values you have.</li><li><strong>Boiling point of water</strong> = <code>((16387 ÷ 600) × ln(((29921 ÷ 100000000000000000000000000000000000000000000000000000000) × (10)^(441 ÷ 1000) × (10000000000 − 68753 × Altitude)^(52559 ÷ 10000))) + 3233 ÷ 450)</code> — the form to use when Altitude are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Soft egg, Hard egg and Quarter-boiled can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Egg&#039;s size, from 9 to 18 — and the answers go from <strong>Air pressure</strong> 29.92 hPa and <strong>Boiling point of water</strong> 100 C to <strong>Air pressure</strong> 29.92 hPa and <strong>Boiling point of water</strong> 100 C.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Altitude, Air pressure and Boiling point of water carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Egg&#039;s weight and Egg&#039;s initial temperature are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Egg&#039;s size left as a guess.</strong> Anything typed into Egg&amp;#039;s size is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Egg&#039;s origin left as a guess.</strong> Anything typed into Egg&amp;#039;s origin is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Convert Egg&#039;s size to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Ideal egg boiling form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Egg&#039;s size</strong> takes a plain number with no unit attached. Select the enter egg&#039;s weight option at the end of the list for more precise results or if you cannot find proper egg&#039;s size. Fill it from a measurement rather than a memory — Egg&#039;s size is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Egg&#039;s origin</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Egg&#039;s origin is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Altitude</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. How high above sea level are your eggs? This impacts the air pressure, which in turn determines the boiling point of water. It feeds Soft egg, Hard egg and Quarter-boiled. Fill it from a measurement rather than a memory — Altitude is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Air pressure</strong> is a hectopascals quantity: the page opens it in hPa and converts anything else you pick before the formula runs. Fill it from a measurement rather than a memory — Air pressure is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Boiling point of water</strong> is a celsius quantity: the page opens it in C and converts anything else you pick before the formula runs. Fill it from a measurement rather than a memory — Boiling point of water is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Quarter-boiled</strong> is a minutes / seconds quantity: the page opens it in minsec and converts anything else you pick before the formula runs. Fill it from a measurement rather than a memory — Quarter-boiled is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Soft egg</strong> is a minutes / seconds quantity: the page opens it in minsec and converts anything else you pick before the formula runs. Fill it from a measurement rather than a memory — Soft egg is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Half-boiled</strong> is a minutes / seconds quantity: the page opens it in minsec and converts anything else you pick before the formula runs. Fill it from a measurement rather than a memory — Half-boiled is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Hard egg</strong> is a minutes / seconds quantity: the page opens it in minsec and converts anything else you pick before the formula runs. Fill it from a measurement rather than a memory — Hard egg is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Egg&#039;s weight</strong> is a grams figure. </li><li><strong>Egg&#039;s initial temperature</strong> is a celsius figure. </li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Egg&#039;s weight is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover grams, Celsius and meters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Egg&#039;s size, Egg&#039;s origin and Altitude is what you already know and Egg&#039;s weight and Egg&#039;s initial temperature is what you need — the reverse of that situation is what the rearranged form is for.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>Related calculators: <a href="/food/cake-serving">Cake serving</a>, <a href="/food/pancake-recipe">Pancake recipe</a> and <a href="/food/turkey-cooking-time">Turkey cooking time</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Ideal egg boiling calculator work out?', 'a' => <<<'TXT'
            Egg's weight and Egg's initial temperature, from Egg's weight, Egg's initial temperature and Altitude. The relationship is Soft egg = get_time1(Egg's weight, Egg's initial temperature, ((16387 ÷ 600) × ln(((29921 ÷ 100000000000000000000000000000000000000000000000000000000) × (10)^(441 ÷ 1000) × (10000000000 − 68753 × Altitude)^(52559 ÷ 10000))) + 3233 ÷ 450)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Egg's size, Egg's origin, Altitude (meters), Air pressure (hectopascals), Boiling point of water (Celsius). Fill egg's size, egg's origin and altitude and leave Egg's weight empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Soft egg, Hard egg, Quarter-boiled and Half-boiled can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'Are the Ideal egg boiling results exact?', 'a' => 'No. The time is an estimate from the listed inputs and cannot account for every appliance, starting temperature or portion. Follow product directions and verify safe doneness with a thermometer where relevant.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Egg\'s weight is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Egg\'s size blank and the page solves for it, reporting Egg\'s weight instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Egg\'s weight keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/food/cake-serving', 'name' => 'Cake serving'],
            ['path' => '/food/pancake-recipe', 'name' => 'Pancake recipe'],
            ['path' => '/food/turkey-cooking-time', 'name' => 'Turkey cooking time']
        ],
    ],
];

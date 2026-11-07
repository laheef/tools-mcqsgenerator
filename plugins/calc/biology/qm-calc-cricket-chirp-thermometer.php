<?php

/**
 * Crickets chirping thermometer
 * /biology/cricket-chirp-thermometer
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Crickets chirping thermometer',
    'meta' => ['title' => 'Crickets chirping thermometer — Formula & Results', 'description' => <<<'TXT'
    Crickets chirping thermometer turns Cricket chirps into Temperature and Temperature. Temperature is opened in Celsius; the chip beside it switches to any unit…
    TXT, 'h1' => 'Crickets chirping thermometer Calculator', 'updated' => '2025-12-18'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'formula',
                            'label' => 'Formula',
                            'type' => 'select',
                            'options' => ['Basic' => '0', 'Field cricket' => '1', 'Snowy tree cricket' => '2', 'Common true katydid' => '3'],
                            'dataset' => 'formula',
                            'default' => 'Basic',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chirps_per_min',
                            'label' => 'Cricket chirps',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'fifteen',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'temperature',
                            'label' => 'Temperature',
                            'type' => 'number',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'temperature2',
                            'label' => 'Temperature',
                            'type' => 'number',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'temperature3',
                            'label' => 'Temperature',
                            'type' => 'number',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Crickets don\'t chirp below 50 °F (10 °C).'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'temperature = 50 +  (chirps_per_min - 40)/4 ',
            'results' => ['temperature' => '(1/4)*chirps_per_min + 40', 'chirps_per_min' => '4*temperature - 160'],
        ],
        [
            'title' => 'temperature2 = 50 +  (chirps_per_min - 92)/4.7 ',
            'results' => ['temperature2' => '(10/47)*chirps_per_min + 1430/47', 'chirps_per_min' => '(47/10)*temperature2 - 143'],
        ],
        [
            'title' => 'temperature3 = 60 +  (chirps_per_min - 19)/3',
            'results' => ['temperature3' => '(1/3)*chirps_per_min + 161/3', 'chirps_per_min' => '3*temperature3 - 161'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Crickets chirping thermometer turns Cricket chirps into Temperature and Temperature. Nothing is looked up on this page: Temperature is computed from Cricket chirps and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Temperature is opened in Celsius; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Crickets chirping thermometer calculator works', 'html' => <<<'TXT'
            <p>Crickets chirping thermometer answers one question from 1 number, and the answer is Temperature, Temperature and Temperature.</p><p>Written with the labels from the form, Temperature = (1 ÷ 4) × Cricket chirps + 40.</p><p>What comes back is Temperature, Temperature and Temperature — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Cricket chirps</strong> — in fifteen seconds</li></ul><p>What you get back is Temperature in Celsius, Temperature in Celsius, Temperature in Celsius, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Temperature offers 28 units and opens on Celsius, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Temperature</strong> = <code>(1 ÷ 4) × Cricket chirps + 40</code></li><li><strong>Cricket chirps</strong> = <code>4 × Temperature − 160</code></li></ul><p>Any one of Temperature, Cricket chirps and Temperature can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Cricket chirps is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Temperature, Temperature and Temperature are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Cricket chirps is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Cricket chirps and the number you are missing is Temperature and Temperature.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/ligation-calculator">Ligation Calculator</a>, <a href="/biology/ligation-molar-ratio">Ligation Molar Ratio (Insert: Vector) Calculator</a> and <a href="/biology/ligation">Ligation</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Crickets chirping thermometer calculator work out?', 'a' => 'Temperature, Temperature and Temperature, from Cricket chirps. The relationship is Temperature = (1 ÷ 4) × Cricket chirps + 40.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Cricket chirps (fifteen seconds). Fill chirps_per_min and leave Temperature empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Temperature, Cricket chirps, Temperature and Temperature blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Temperature is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Cricket chirps blank and the page solves for it, reporting Temperature instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Temperature at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/ligation-calculator', 'name' => 'Ligation Calculator'],
            ['path' => '/biology/ligation-molar-ratio', 'name' => 'Ligation Molar Ratio (Insert : Vector) Calculator'],
            ['path' => '/biology/ligation', 'name' => 'Ligation'],
        ],
        'authors' => [],
    ],
];

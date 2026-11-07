<?php

/**
 * Cephalexin for dogs dosage
 * /biology/cephalexin-for-dogs-dosage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cephalexin for dogs dosage',
    'meta' => ['title' => 'Cephalexin for dogs dosage — Formula & Results', 'description' => 'Cephalexin for dogs dosage takes Your dog\'s weight, Amount per dose and Drug type and returns Liquid per dose and Total liquid. Your dog\'s weight (kilograms)…', 'h1' => 'Cephalexin for dogs dosage Calculator', 'updated' => '2026-05-22'],
    'raw' => [
        'vars' => [
            'dailyDosage' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'dosage' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'form' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'eay-loQ4FYdoUG3X6UcYY', 'c' => null],
                ],
                'ds' => 'CXqdqraiaTqswhgEA9ZZh',
            ],
            'number' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'totalNumber' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'totalVolume' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'volume' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'F3vEgrXvPnenQUsZEjUmD',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => 'Your dog\'s weight',
                                    'us' => '22',
                                    'du' => 'kg',
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
                                    'n' => 'dosage',
                                    'vt' => 'numerical',
                                    'l' => 'Amount per dose',
                                    'us' => '22',
                                    'du' => 'mg',
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
                                    'n' => 'form',
                                    'vt' => 'valueSelect',
                                    'l' => 'Drug type',
                                    'ds' => 'CXqdqraiaTqswhgEA9ZZh',
                                    'opts' => [
                                        ['e5xeGNg1zXcjiK8CtWRxz', 'Tablets (250 mg)', '250'],
                                        ['ZikVLaNfd6c2mOUEQCKNR', 'Tablets (500 mg)', '500'],
                                        ['ZvPZKV1UpFwlkY-rt8KIa', 'Chewable tablets (75 mg)', '75'],
                                        ['eay-loQ4FYdoUG3X6UcYY', 'Chewable tablets (150 mg)', '150'],
                                        ['kMnfRUOBPDBUmpkpxnwBE', 'Chewable tablets (300 mg)', '300'],
                                        ['gaa0KQBLHJgcGGNlsujXm', 'Chewable tablets (600 mg)', '600'],
                                        ['oz7nkKp0akqmsmOshs_A8', 'Liquid (125 mg/5 mL)', '25'],
                                        ['dgCxldzA1Dr2yTC5Qvf0N', 'Liquid (250 mg/5 mL)', '50'],
                                    ],
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
                                    'n' => 'volume',
                                    'vt' => 'numerical',
                                    'l' => 'Liquid per dose',
                                    'us' => '20',
                                    'du' => 'ml',
                                    'oo' => 1,
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
                                    'n' => 'number',
                                    'vt' => 'numerical',
                                    'l' => '~Tablets per dose',
                                    'suf' => '#',
                                ],
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
                                        [null, 'It seems that the chosen tablets may be too strong for your dog. Please select another drug type.'],
                                    ],
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
                                    'n' => 'dailyDosage',
                                    'vt' => 'numerical',
                                    'l' => 'Daily dosage',
                                    'h' => 'With 2 doses per day, given every 12 hours.',
                                    'us' => '22',
                                    'du' => 'mg',
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
                                    'n' => 'totalVolume',
                                    'vt' => 'numerical',
                                    'l' => 'Total liquid',
                                    'h' => 'With 2 doses per day, administered every 12 hours.',
                                    'us' => '20',
                                    'du' => 'ml',
                                    'oo' => 1,
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
                                    'n' => 'totalNumber',
                                    'vt' => 'numerical',
                                    'l' => '~Tablets per day',
                                    'suf' => '#',
                                    'h' => 'With 2 doses per day, administered every 12 hours.',
                                ],
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
                                        [null, '📍 The calculated dosage is based on NOAH recommendations and is equal to 15 mg/kg per dose.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'dosage = 15 * weight',
                'var' => [
                    [
                        'l' => 'dosage',
                        'f' => '15*weight',
                        'r' => ['weight'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => '(1/15)*dosage',
                        'r' => ['dosage'],
                    ],
                ],
            ],
            [
                'formula' => '30 * weight = dailyDosage',
                'var' => [
                    [
                        'l' => 'dailyDosage',
                        'f' => '30*weight',
                        'r' => ['weight'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => '(1/30)*dailyDosage',
                        'r' => ['dailyDosage'],
                    ],
                ],
            ],
            [
                'formula' => 'dosage/form = volume',
                'var' => [
                    [
                        'l' => 'form',
                        'f' => 'dosage/volume',
                        'r' => ['dosage', 'volume'],
                    ],
                    [
                        'l' => 'dosage',
                        'f' => 'form*volume',
                        'r' => ['form', 'volume'],
                    ],
                    [
                        'l' => 'volume',
                        'f' => 'dosage/form',
                        'r' => ['form', 'dosage'],
                    ],
                ],
            ],
            [
                'formula' => 'dailyDosage/form = totalVolume',
                'var' => [
                    [
                        'l' => 'totalVolume',
                        'f' => 'dailyDosage/form',
                        'r' => ['dailyDosage', 'form'],
                    ],
                    [
                        'l' => 'dailyDosage',
                        'f' => 'form*totalVolume',
                        'r' => ['totalVolume', 'form'],
                    ],
                    [
                        'l' => 'form',
                        'f' => 'dailyDosage/totalVolume',
                        'r' => ['totalVolume', 'dailyDosage'],
                    ],
                ],
            ],
            [
                'formula' => 'number = floor(dosage/form+0.2)',
                'var' => [
                    [
                        'l' => 'number',
                        'f' => 'floor((dosage + (1/5)*form)/form)',
                        'r' => ['dosage', 'form'],
                    ],
                ],
            ],
            [
                'formula' => 'totalNumber = one_way(2*number)',
                'var' => [
                    [
                        'l' => 'totalNumber',
                        'f' => '(2*floor((dosage + (1/5)*form)/form))',
                        'r' => ['dosage', 'form'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'CXqdqraiaTqswhgEA9ZZh' => [
                'name' => 'type',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'e5xeGNg1zXcjiK8CtWRxz', 'label' => 'Tablets (250 mg)', 'value' => '250'],
                    ['uid' => 'ZikVLaNfd6c2mOUEQCKNR', 'label' => 'Tablets (500 mg)', 'value' => '500'],
                    ['uid' => 'ZvPZKV1UpFwlkY-rt8KIa', 'label' => 'Chewable tablets (75 mg)', 'value' => '75'],
                    ['uid' => 'eay-loQ4FYdoUG3X6UcYY', 'label' => 'Chewable tablets (150 mg)', 'value' => '150'],
                    ['uid' => 'kMnfRUOBPDBUmpkpxnwBE', 'label' => 'Chewable tablets (300 mg)', 'value' => '300'],
                    ['uid' => 'gaa0KQBLHJgcGGNlsujXm', 'label' => 'Chewable tablets (600 mg)', 'value' => '600'],
                    ['uid' => 'oz7nkKp0akqmsmOshs_A8', 'label' => 'Liquid (125 mg/5 mL)', 'value' => '25'],
                    ['uid' => 'dgCxldzA1Dr2yTC5Qvf0N', 'label' => 'Liquid (250 mg/5 mL)', 'value' => '50'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cephalexin for dogs dosage takes Your dog's weight, Amount per dose and Drug type and returns Liquid per dose and Total liquid. There is no hidden constant here: change Liquid per dose and Your dog's weight moves with it. The main result, Liquid per dose, is reported in milliliters.
        TXT,
        'sections' => [
            ['title' => 'How the Cephalexin for dogs dosage calculator works', 'html' => <<<'TXT'
            <p>Cephalexin for dogs dosage answers one question from 6 numbers, and the answer is Liquid per dose and Total liquid.</p><p>The relationship it solves reads Amount per dose = 15 × Your dog&#039;s weight.</p><p>The result panel carries Liquid per dose and Total liquid, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 6 boxes, and nothing else.</p><ul><li><strong>Your dog&#039;s weight</strong> — in kilograms</li><li><strong>Amount per dose</strong> — in milligrams</li><li><strong>Drug type</strong> — a plain number, no unit</li><li><strong>~Tablets per dose</strong> — in #</li><li><strong>Daily dosage</strong> — in milligrams. With 2 doses per day, given every 12 hours.</li><li><strong>~Tablets per day</strong> — in #. With 2 doses per day, administered every 12 hours.</li></ul><p>What you get back is Liquid per dose in milliliters, Total liquid in milliliters, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Your dog&amp;#039;s weight = 10 kg — through the same formula and the panel reports &lt;strong&gt;Drug type&lt;/strong&gt; = 150, &lt;strong&gt;Amount per dose&lt;/strong&gt; = 150 mg, &lt;strong&gt;Daily dosage&lt;/strong&gt; = 300 mg, &lt;strong&gt;Liquid per dose&lt;/strong&gt; = 1 ml, &lt;strong&gt;Total liquid&lt;/strong&gt; = 2 ml, &lt;strong&gt;~Tablets per dose&lt;/strong&gt; = 1 # and &lt;strong&gt;~Tablets per day&lt;/strong&gt; = 2 #.</p><ul><li><strong>Drug type</strong> = 150</li><li><strong>Amount per dose</strong> = 150 mg</li><li><strong>Daily dosage</strong> = 300 mg</li><li><strong>Liquid per dose</strong> = 1 ml</li><li><strong>Total liquid</strong> = 2 ml</li><li><strong>~Tablets per dose</strong> = 1 #</li><li><strong>~Tablets per day</strong> = 2 #</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Amount per dose</strong> = <code>15 × Your dog&#039;s weight</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Drug type&lt;/strong&gt; = 150, &lt;strong&gt;Amount per dose&lt;/strong&gt; = 150, &lt;strong&gt;Daily dosage&lt;/strong&gt; = 300, &lt;strong&gt;Liquid per dose&lt;/strong&gt; = 1, &lt;strong&gt;Total liquid&lt;/strong&gt; = 2, &lt;strong&gt;~Tablets per dose&lt;/strong&gt; = 1 and &lt;strong&gt;~Tablets per day&lt;/strong&gt; = 2 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Liquid per dose offers 40 units and opens on milliliters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Amount per dose</strong> = <code>15 × Your dog&#039;s weight</code></li><li><strong>Your dog&#039;s weight</strong> = <code>(1 ÷ 15) × Amount per dose</code></li><li><strong>Daily dosage</strong> = <code>30 × Your dog&#039;s weight</code></li><li><strong>Drug type</strong> = <code>Amount per dose ÷ Liquid per dose</code></li><li><strong>Liquid per dose</strong> = <code>Amount per dose ÷ Drug type</code></li><li><strong>Total liquid</strong> = <code>Daily dosage ÷ Drug type</code></li></ul><p>Any one of Amount per dose, Your dog&#039;s weight and Daily dosage can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Your dog&#039;s weight from 10 to 20, leaving every other box alone. The panel moves from &lt;strong&gt;Drug type&lt;/strong&gt; 150, &lt;strong&gt;Amount per dose&lt;/strong&gt; 150 mg, &lt;strong&gt;Daily dosage&lt;/strong&gt; 300 mg, &lt;strong&gt;Liquid per dose&lt;/strong&gt; 1 ml, &lt;strong&gt;Total liquid&lt;/strong&gt; 2 ml, &lt;strong&gt;~Tablets per dose&lt;/strong&gt; 1 # and &lt;strong&gt;~Tablets per day&lt;/strong&gt; 2 # to &lt;strong&gt;Drug type&lt;/strong&gt; 150, &lt;strong&gt;Amount per dose&lt;/strong&gt; 300 mg, &lt;strong&gt;Daily dosage&lt;/strong&gt; 600 mg, &lt;strong&gt;Liquid per dose&lt;/strong&gt; 2 ml, &lt;strong&gt;Total liquid&lt;/strong&gt; 4 ml, &lt;strong&gt;~Tablets per dose&lt;/strong&gt; 2 # and &lt;strong&gt;~Tablets per day&lt;/strong&gt; 4 #.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Your dog&#039;s weight, Amount per dose and Daily dosage is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Liquid per dose and Total liquid are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Your dog&#039;s weight to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Your dog&#039;s weight, Amount per dose and Drug type measured, Liquid per dose and Total liquid wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dsdna-ug-to-pmol">dsDNA µg to pmol Calculator</a>, <a href="/biology/dsdna-ug-to-pmol-converter">dsDNA µg to pmol Converter Calculator</a> and <a href="/biology/egg-incubation-hatch-date">Egg Incubation Hatch Date Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cephalexin for dogs dosage calculator work out?', 'a' => 'Liquid per dose and Total liquid, from Your dog\'s weight. The relationship is Amount per dose = 15 × Your dog\'s weight.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Your dog's weight (kilograms), Amount per dose (milligrams), Drug type, ~Tablets per dose (#), Daily dosage (milligrams). Enter weight, dosage and form; Liquid per dose is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Amount per dose, Your dog's weight, Daily dosage and Drug type blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Drug type = 150, Amount per dose = 150 mg, Daily dosage = 300 mg, Liquid per dose = 1 ml, Total liquid = 2 ml, ~Tablets per dose = 1 # and ~Tablets per day = 2 #. Those are the defaults written into the form — move Your dog's weight and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Liquid per dose is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Your dog\'s weight blank and the page solves for it, reporting Liquid per dose instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Liquid per dose keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dsdna-ug-to-pmol', 'name' => 'dsDNA µg to pmol Calculator'],
            ['path' => '/biology/dsdna-ug-to-pmol-converter', 'name' => 'dsDNA µg to pmol Converter Calculator'],
            ['path' => '/biology/egg-incubation-hatch-date', 'name' => 'Egg Incubation Hatch Date Calculator'],
        ],
        'authors' => [],
    ],
];

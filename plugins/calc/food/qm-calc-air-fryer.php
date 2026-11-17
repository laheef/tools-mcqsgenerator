<?php

/**
 * Air fryer
 * /food/air-fryer
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Air fryer',
    'meta' => ['title' => 'Air fryer Calculator — Formula, Units & Example', 'description' => 'Convert an oven recipe to an air-fryer temperature and estimated cooking time. Follow safe-handling directions and verify doneness with a thermometer.', 'h1' => 'Air fryer Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Temperature measurement',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tempUnit',
                            'label' => 'Temperature unit',
                            'type' => 'select',
                            'options' => ['°C' => '0', '°F' => '1'],
                            'dataset' => 'tempCoeff',
                            'defaults' => [
                                ['value' => '°C', 'when' => null],
                                ['value' => '°F', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ovenTempC',
                            'label' => 'Oven recipe’s temperature',
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
                            'name' => 'ovenTempF',
                            'label' => 'Oven recipe’s temperature',
                            'type' => 'number',
                            'unit' => '40',
                            'unit_default' => 'F',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'airTempC',
                            'label' => 'Temperature for air fryer',
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
                            'name' => 'airTempF',
                            'label' => 'Temperature for air fryer',
                            'type' => 'number',
                            'unit' => '40',
                            'unit_default' => 'F',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Time measurement',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ovenTime',
                            'label' => 'Oven cooking time',
                            'type' => 'number',
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
                            'name' => 'airTime',
                            'label' => 'Air frying cooking time',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'airTempC = ovenTempC - 15',
            'results' => ['ovenTempC' => 'airTempC + 15', 'airTempC' => 'ovenTempC - 15'],
        ],
        [
            'title' => 'airTempF = ovenTempF - 25',
            'results' => ['ovenTempF' => 'airTempF + 25', 'airTempF' => 'ovenTempF - 25'],
        ],
        [
            'title' => 'airTime = ovenTime * 0.80',
            'results' => ['ovenTime' => '(5/4)*airTime', 'airTime' => '(4/5)*ovenTime'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Air fryer reads one of oven recipe’s temperature and temperature for air fryer from the other, so either can be the value you fill in. Oven recipe’s temperature is opened in Fahrenheit; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Air fryer calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Air fryer: it takes 1 number and reports Oven recipe’s temperature, Temperature for air fryer and Temperature for air fryer.</p><p>The relationship it solves reads Temperature for air fryer = Oven recipe’s temperature − 15.</p><p>What comes back is Oven recipe’s temperature, Temperature for air fryer, Temperature for air fryer and Oven cooking time — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Oven recipe’s temperature</strong> — in Celsius</li></ul><p>What you get back is Oven recipe’s temperature in Fahrenheit, Temperature for air fryer in Celsius, Temperature for air fryer in Fahrenheit, Oven cooking time in minutes, Air frying cooking time in minutes, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Temperature for air fryer</strong> = <code>Oven recipe’s temperature − 15</code></li><li><strong>Oven recipe’s temperature</strong> = <code>Temperature for air fryer + 15</code></li><li><strong>Air frying cooking time</strong> = <code>(4 ÷ 5) × Oven cooking time</code></li><li><strong>Oven cooking time</strong> = <code>(5 ÷ 4) × Air frying cooking time</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Temperature for air fryer</strong> = <code>Oven recipe’s temperature − 15</code> — the form to use when Oven recipe’s temperature are the values you have.</li><li><strong>Oven recipe’s temperature</strong> = <code>Temperature for air fryer + 15</code> — the form to use when Temperature for air fryer are the values you have.</li><li><strong>Temperature for air fryer</strong> = <code>Oven recipe’s temperature − 25</code> — the form to use when Oven recipe’s temperature are the values you have.</li><li><strong>Oven recipe’s temperature</strong> = <code>Temperature for air fryer + 25</code> — the form to use when Temperature for air fryer are the values you have.</li><li><strong>Air frying cooking time</strong> = <code>(4 ÷ 5) × Oven cooking time</code> — the form to use when Oven cooking time are the values you have.</li><li><strong>Oven cooking time</strong> = <code>(5 ÷ 4) × Air frying cooking time</code> — the form to use when Air frying cooking time are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Temperature for air fryer, Oven recipe’s temperature and Temperature for air fryer can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Oven recipe’s temperature carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Oven recipe’s temperature, Temperature for air fryer and Temperature for air fryer are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Oven recipe’s temperature left as a guess.</strong> Anything typed into Oven recipe’s temperature is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> If Oven recipe’s temperature is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Oven recipe’s temperature</strong> is a celsius quantity: the page opens it in C and converts anything else you pick before the formula runs. It feeds Temperature for air fryer. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Oven recipe’s temperature</strong> is a fahrenheit figure. The value follows from Temperature for air fryer. </li><li><strong>Temperature for air fryer</strong> is a celsius figure. The value follows from Oven recipe’s temperature. </li><li><strong>Temperature for air fryer</strong> is a fahrenheit figure. The value follows from Oven recipe’s temperature. </li><li><strong>Oven cooking time</strong> is a minutes figure. The value follows from Air frying cooking time. </li><li><strong>Air frying cooking time</strong> is a minutes figure. The value follows from Oven cooking time. </li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p> The tables, with the unit each box opens in:</p><ul><li><strong>Fahrenheit</strong> — opens in <em>F</em>, and the chip also carries °F, K and °R. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>minutes</strong> — opens in <em>min</em>, and the chip also carries min, hrs, days and µs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. </p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Oven recipe’s temperature. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Oven recipe’s temperature into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Oven recipe’s temperature in F with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Oven recipe’s temperature is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover Fahrenheit and minutes. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Oven recipe’s temperature and the number you are missing is Oven recipe’s temperature and Temperature for air fryer.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>Related calculators: <a href="/food/steak-cook-time">Steak cook time</a>, <a href="/food/perfect-pizza">Pizza baking</a> and <a href="/food/turkey-cooking-time">Turkey cooking time</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Air fryer calculator work out?', 'a' => <<<'TXT'
            Oven recipe’s temperature, Temperature for air fryer, Temperature for air fryer and Oven cooking time, from Oven recipe’s temperature. The relationship is Temperature for air fryer = Oven recipe’s temperature − 15.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Oven recipe’s temperature (Celsius). Fill oven recipe’s temperature and leave Oven recipe’s temperature empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Temperature for air fryer, Oven recipe’s temperature, Temperature for air fryer and Oven recipe’s temperature can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Oven recipe’s temperature is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Oven recipe’s temperature left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Oven recipe’s temperature keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/steak-cook-time', 'name' => 'Steak cook time'],
            ['path' => '/food/perfect-pizza', 'name' => 'Pizza baking'],
            ['path' => '/food/turkey-cooking-time', 'name' => 'Turkey cooking time']
        ],
    ],
];

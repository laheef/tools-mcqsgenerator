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
    'meta' => ['title' => 'Cephalexin for dogs dosage — Formula & Results', 'description' => 'Cephalexin for dogs dosage reports amount per dose, liquid per dose, ~Tablets per dose and daily dosage. The formula is printed in the form\'s own words.', 'h1' => 'Cephalexin for dogs dosage Calculator', 'updated' => '2026-05-22'],
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
        Cephalexin for dogs dosage takes Your dog's weight, Amount per dose and Drug type and returns Liquid per dose and Total liquid. There is no hidden constant here: change liquid per dose and your dog's weight moves with it. The main result, Liquid per dose, is reported in milliliters.
        TXT,
        'sections' => [
            ['title' => 'How the Cephalexin for dogs dosage calculator works', 'html' => <<<'TXT'
            <p>Cephalexin for dogs dosage answers one question from 6 numbers, and the answer is Liquid per dose and Total liquid.</p><p>The relationship it solves reads Amount per dose = 15 × Your dog&#039;s weight.</p><p>The result panel carries Liquid per dose and Total liquid, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 6 boxes, and nothing else.</p><ul><li><strong>Your dog&#039;s weight</strong> — in kilograms</li><li><strong>Amount per dose</strong> — in milligrams</li><li><strong>Drug type</strong> — a plain number, no unit</li><li><strong>~Tablets per dose</strong> — in #</li><li><strong>Daily dosage</strong> — in milligrams. With 2 doses per day, given every 12 hours.</li><li><strong>~Tablets per day</strong> — in #. With 2 doses per day, administered every 12 hours.</li></ul><p>What you get back is Liquid per dose in milliliters, Total liquid in milliliters, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Your dog&amp;#039;s weight = 10 kg — through the same formula and the panel reports <strong>Drug type</strong> = 150, <strong>Amount per dose</strong> = 150 mg, <strong>Daily dosage</strong> = 300 mg, <strong>Liquid per dose</strong> = 1 ml, <strong>Total liquid</strong> = 2 ml, <strong>~Tablets per dose</strong> = 1 # and <strong>~Tablets per day</strong> = 2 #.</p><ul><li><strong>Drug type</strong> = 150</li><li><strong>Amount per dose</strong> = 150 mg</li><li><strong>Daily dosage</strong> = 300 mg</li><li><strong>Liquid per dose</strong> = 1 ml</li><li><strong>Total liquid</strong> = 2 ml</li><li><strong>~Tablets per dose</strong> = 1 #</li><li><strong>~Tablets per day</strong> = 2 #</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Amount per dose</strong> = <code>15 × Your dog&#039;s weight</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Drug type</strong> = 150, <strong>Amount per dose</strong> = 150, <strong>Daily dosage</strong> = 300, <strong>Liquid per dose</strong> = 1, <strong>Total liquid</strong> = 2, <strong>~Tablets per dose</strong> = 1 and <strong>~Tablets per day</strong> = 2 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Liquid per dose offers 40 units and opens on milliliters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Amount per dose</strong> = <code>15 × Your dog&#039;s weight</code></li><li><strong>Your dog&#039;s weight</strong> = <code>(1 ÷ 15) × Amount per dose</code></li><li><strong>Daily dosage</strong> = <code>30 × Your dog&#039;s weight</code></li><li><strong>Drug type</strong> = <code>Amount per dose ÷ Liquid per dose</code></li><li><strong>Liquid per dose</strong> = <code>Amount per dose ÷ Drug type</code></li><li><strong>Total liquid</strong> = <code>Daily dosage ÷ Drug type</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Amount per dose</strong> = <code>15 × Your dog&#039;s weight</code> — the form to use when Your dog&#039;s weight are the values you have.</li><li><strong>Your dog&#039;s weight</strong> = <code>(1 ÷ 15) × Amount per dose</code> — the form to use when Amount per dose are the values you have.</li><li><strong>Daily dosage</strong> = <code>30 × Your dog&#039;s weight</code> — the form to use when Your dog&#039;s weight are the values you have.</li><li><strong>Your dog&#039;s weight</strong> = <code>(1 ÷ 30) × Daily dosage</code> — the form to use when Daily dosage are the values you have.</li><li><strong>Drug type</strong> = <code>Amount per dose ÷ Liquid per dose</code> — the form to use when Amount per dose and Liquid per dose are the values you have.</li><li><strong>Amount per dose</strong> = <code>Drug type × Liquid per dose</code> — the form to use when Drug type and Liquid per dose are the values you have.</li><li><strong>Liquid per dose</strong> = <code>Amount per dose ÷ Drug type</code> — the form to use when Drug type and Amount per dose are the values you have.</li><li><strong>Total liquid</strong> = <code>Daily dosage ÷ Drug type</code> — the form to use when Daily dosage and Drug type are the values you have.</li></ul><p>Any one of Amount per dose, Your dog&#039;s weight and Daily dosage can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Your dog&#039;s weight from 10 to 20, leaving every other box alone. The panel moves from <strong>Drug type</strong> 150, <strong>Amount per dose</strong> 150 mg, <strong>Daily dosage</strong> 300 mg, <strong>Liquid per dose</strong> 1 ml, <strong>Total liquid</strong> 2 ml, <strong>~Tablets per dose</strong> 1 # and <strong>~Tablets per day</strong> 2 # to <strong>Drug type</strong> 150, <strong>Amount per dose</strong> 300 mg, <strong>Daily dosage</strong> 600 mg, <strong>Liquid per dose</strong> 2 ml, <strong>Total liquid</strong> 4 ml, <strong>~Tablets per dose</strong> 2 # and <strong>~Tablets per day</strong> 4 #.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Your dog&#039;s weight, Amount per dose and Daily dosage is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Liquid per dose and Total liquid are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Your dog&#039;s weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Your dog&amp;#039;s weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Amount per dose left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Amount per dose is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Your dog&#039;s weight to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Cephalexin for dogs dosage form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Your dog&#039;s weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. It feeds Amount per dose and Daily dosage. Fill it from a measurement rather than a memory — Your dog&#039;s weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Amount per dose</strong> is a milligrams quantity: the page opens it in mg and converts anything else you pick before the formula runs. It feeds Your dog's weight, Drug type and Liquid per dose. Fill it from a measurement rather than a memory — Amount per dose is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Drug type</strong> takes a plain number with no unit attached. It feeds Amount per dose, Liquid per dose and Total liquid. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Drug type is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>~Tablets per dose</strong> is measured in #. Fill it from a measurement rather than a memory — ~Tablets per dose is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Daily dosage</strong> is a milligrams quantity: the page opens it in mg and converts anything else you pick before the formula runs. With 2 doses per day, given every 12 hours. It feeds Your dog's weight, Total liquid and Drug type. Fill it from a measurement rather than a memory — Daily dosage is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>~Tablets per day</strong> is measured in #. With 2 doses per day, administered every 12 hours. Fill it from a measurement rather than a memory — ~Tablets per day is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Liquid per dose</strong> is a milliliters figure and the page's own defaults put it at 1 ml. It is worked out from Drug type and Amount per dose. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total liquid</strong> is a milliliters figure and the page's own defaults put it at 2 ml. It is worked out from Daily dosage and Drug type. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Drug type</th><th>Amount per dose</th><th>Daily dosage</th><th>Liquid per dose</th><th>Total liquid</th><th>~Tablets per dose</th><th>~Tablets per day</th></tr></thead><tbody><tr><td><strong>Your dog&#039;s weight</strong> +10%</td><td>+0%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Your dog&#039;s weight sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Cephalexin for dogs dosage actually offers.</p><ul><li><strong>milliliters</strong> — 40 units. It opens in <em>ml</em>, and the chip also carries m³, cu ft, US fl oz, L, dm³ and cu in. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>milligrams</strong> — 27 units. It opens in <em>mg</em>, and the chip also carries lb, mg, g, oz, t and ng. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Liquid per dose follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are milliliters and milligrams and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Your dog&#039;s weight, Amount per dose and Drug type are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Your dog&#039;s weight, Amount per dose and Drug type measured, Liquid per dose and Total liquid wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dsdna-ug-to-pmol">dsDNA µg to pmol Calculator</a>, <a href="/biology/dsdna-ug-to-pmol-converter">dsDNA µg to pmol Converter Calculator</a> and <a href="/biology/egg-incubation-hatch-date">Egg Incubation Hatch Date Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cephalexin for dogs dosage calculator work out?', 'a' => 'Liquid per dose and Total liquid, from Your dog\'s weight. The relationship is Amount per dose = 15 × Your dog\'s weight.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Your dog's weight (kilograms), Amount per dose (milligrams), Drug type, ~Tablets per dose (#), Daily dosage (milligrams). Enter your dog's weight, amount per dose and drug type; Liquid per dose is the box to leave alone unless it is the value you came for.
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

<?php

/**
 * Cephalexin for cats dosage
 * /biology/cephalexin-for-cats-dosage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cephalexin for cats dosage',
    'meta' => ['title' => 'Cephalexin for cats dosage — Formula & Results', 'description' => 'Your cat\'s weight (kilograms), Dose base (milligrams), Drug type, Amount per dose (milligrams), Daily dosage (milligrams). Leave any of Amount per dose, Dose…', 'h1' => 'Cephalexin for cats dosage Calculator', 'updated' => '2026-05-25'],
    'sections' => [
        [
            'title' => 'Cat and drug details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Your cat\'s weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'prescribed_dose',
                            'label' => 'Dose base',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'drug_type',
                            'label' => 'Drug type',
                            'type' => 'select',
                            'options' => [
                                'Tablets (250 mg)' => '250',
                                'Chewable tablets (75 mg)' => '75',
                                'Chewable tablets (150 mg)' => '150',
                                'Chewable tablets (300 mg)' => '300',
                                'Liquid (125 mg/5 mL)' => '25',
                                'Liquid (250 mg/5 mL)' => '50',
                            ],
                            'dataset' => 'drug_type',
                            'control' => 'DROPDOWN',
                            'default' => 'Liquid (125 mg/5 mL)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'It seems that the chosen drug type may be too strong for your cat. Please select another drug type and try again.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => '📍 The calculated dosage is based on the MSD Manual recommendations.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Dosage',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dosage',
                            'label' => 'Amount per dose',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'daily_dosage',
                            'label' => 'Daily dosage',
                            'type' => 'number',
                            'help' => 'With 2 doses per day, given every 12 hours.',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Amount of medicine',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'liquid_per_dose',
                            'label' => 'Liquid per dose',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'readonly' => true,
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'liquid_per_day',
                            'label' => 'Liquid per day',
                            'type' => 'number',
                            'help' => 'With 2 doses per day, administered every 12 hours.',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'readonly' => true,
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tablets_per_dose',
                            'label' => 'Tablets per dose',
                            'type' => 'number',
                            'prefix' => '~',
                            'suffix' => '#',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tablets_per_day',
                            'label' => 'Tablets per day',
                            'type' => 'number',
                            'prefix' => '~',
                            'suffix' => '#',
                            'help' => 'With 2 doses per day, administered every 12 hours.',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'dosage = prescribed_dose * weight',
            'results' => ['dosage' => 'prescribed_dose*weight', 'prescribed_dose' => 'dosage/weight', 'weight' => 'dosage/prescribed_dose'],
        ],
        [
            'title' => 'daily_dosage = 2 * prescribed_dose * weight',
            'results' => ['daily_dosage' => '2*prescribed_dose*weight', 'prescribed_dose' => '(1/2)*daily_dosage/weight', 'weight' => '(1/2)*daily_dosage/prescribed_dose'],
        ],
        [
            'title' => 'liquid_per_dose = dosage/drug_type',
            'results' => ['liquid_per_dose' => 'dosage/drug_type', 'dosage' => 'drug_type*liquid_per_dose', 'drug_type' => 'dosage/liquid_per_dose'],
        ],
        [
            'title' => 'liquid_per_day = daily_dosage/drug_type',
            'results' => ['liquid_per_day' => 'daily_dosage/drug_type', 'daily_dosage' => 'drug_type*liquid_per_day', 'drug_type' => 'daily_dosage/liquid_per_day'],
        ],
        [
            'title' => 'tablets_per_dose = floor(dosage/drug_type+0.2)',
            'results' => ['tablets_per_dose' => 'floor((dosage + (1/5)*drug_type)/drug_type)'],
        ],
        [
            'title' => 'tablets_per_day = one_way(2*tablets_per_dose)',
            'results' => ['tablets_per_day' => '(2*floor((dosage + (1/5)*drug_type)/drug_type))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cephalexin for cats dosage turns Your cat's weight, Dose base and Drug type into Liquid per dose and Liquid per day. It is a single relationship that reads Liquid per dose out of Your cat's weight, not a table of canned results keyed by them. Units for Liquid per dose default to milliliters and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Cephalexin for cats dosage calculator works', 'html' => <<<'TXT'
            <p>Cephalexin for cats dosage answers one question from 7 numbers, and the answer is Liquid per dose and Liquid per day.</p><p>Written with the labels from the form, Amount per dose = Dose base × Your cat&#039;s weight.</p><p>The result panel carries Liquid per dose and Liquid per day, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 7 boxes, and nothing else.</p><ul><li><strong>Your cat&#039;s weight</strong> — in kilograms</li><li><strong>Dose base</strong> — in milligrams</li><li><strong>Drug type</strong> — a plain number, no unit</li><li><strong>Amount per dose</strong> — in milligrams</li><li><strong>Daily dosage</strong> — in milligrams. With 2 doses per day, given every 12 hours.</li><li><strong>Tablets per dose</strong> — in #</li><li><strong>Tablets per day</strong> — in #. With 2 doses per day, administered every 12 hours.</li></ul><p>What you get back is Liquid per dose in milliliters, Liquid per day in milliliters, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Your cat&amp;#039;s weight = 10 kg and Dose base = 15 mg gives &lt;strong&gt;Drug type&lt;/strong&gt; = 25, &lt;strong&gt;Amount per dose&lt;/strong&gt; = 150 mg, &lt;strong&gt;Daily dosage&lt;/strong&gt; = 300 mg, &lt;strong&gt;Liquid per dose&lt;/strong&gt; = 6 ml, &lt;strong&gt;Liquid per day&lt;/strong&gt; = 12 ml, &lt;strong&gt;Tablets per dose&lt;/strong&gt; = 6 # and &lt;strong&gt;Tablets per day&lt;/strong&gt; = 12 #.</p><ul><li><strong>Drug type</strong> = 25</li><li><strong>Amount per dose</strong> = 150 mg</li><li><strong>Daily dosage</strong> = 300 mg</li><li><strong>Liquid per dose</strong> = 6 ml</li><li><strong>Liquid per day</strong> = 12 ml</li><li><strong>Tablets per dose</strong> = 6 #</li><li><strong>Tablets per day</strong> = 12 #</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Amount per dose</strong> = <code>Dose base × Your cat&#039;s weight</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Drug type&lt;/strong&gt; = 25, &lt;strong&gt;Amount per dose&lt;/strong&gt; = 150, &lt;strong&gt;Daily dosage&lt;/strong&gt; = 300, &lt;strong&gt;Liquid per dose&lt;/strong&gt; = 6, &lt;strong&gt;Liquid per day&lt;/strong&gt; = 12, &lt;strong&gt;Tablets per dose&lt;/strong&gt; = 6 and &lt;strong&gt;Tablets per day&lt;/strong&gt; = 12 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Liquid per dose offers 40 units and opens on milliliters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Amount per dose</strong> = <code>Dose base × Your cat&#039;s weight</code></li><li><strong>Dose base</strong> = <code>Amount per dose ÷ Your cat&#039;s weight</code></li><li><strong>Your cat&#039;s weight</strong> = <code>Amount per dose ÷ Dose base</code></li><li><strong>Daily dosage</strong> = <code>2 × Dose base × Your cat&#039;s weight</code></li><li><strong>Liquid per dose</strong> = <code>Amount per dose ÷ Drug type</code></li><li><strong>Drug type</strong> = <code>Amount per dose ÷ Liquid per dose</code></li></ul><p>Any one of Amount per dose, Dose base and Your cat&#039;s weight can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Your cat&#039;s weight from 10 to 20, leaving every other box alone. The panel moves from &lt;strong&gt;Drug type&lt;/strong&gt; 25, &lt;strong&gt;Amount per dose&lt;/strong&gt; 150 mg, &lt;strong&gt;Daily dosage&lt;/strong&gt; 300 mg, &lt;strong&gt;Liquid per dose&lt;/strong&gt; 6 ml, &lt;strong&gt;Liquid per day&lt;/strong&gt; 12 ml, &lt;strong&gt;Tablets per dose&lt;/strong&gt; 6 # and &lt;strong&gt;Tablets per day&lt;/strong&gt; 12 # to &lt;strong&gt;Drug type&lt;/strong&gt; 25, &lt;strong&gt;Amount per dose&lt;/strong&gt; 300 mg, &lt;strong&gt;Daily dosage&lt;/strong&gt; 600 mg, &lt;strong&gt;Liquid per dose&lt;/strong&gt; 12 ml, &lt;strong&gt;Liquid per day&lt;/strong&gt; 24 ml, &lt;strong&gt;Tablets per dose&lt;/strong&gt; 12 # and &lt;strong&gt;Tablets per day&lt;/strong&gt; 24 #.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Your cat&#039;s weight, Dose base and Amount per dose is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Liquid per dose and Liquid per day are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Your cat&#039;s weight is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Your cat&#039;s weight, Dose base and Drug type is what you already know and Liquid per dose and Liquid per day is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/cell-dilution">Cell dilution Calculator</a>, <a href="/biology/cell-doubling-time">Cell doubling time Calculator</a> and <a href="/biology/cell-seeding-density">Cell Seeding Density Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cephalexin for cats dosage calculator work out?', 'a' => 'Liquid per dose and Liquid per day, from Dose base and Your cat\'s weight. The relationship is Amount per dose = Dose base × Your cat\'s weight.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Your cat's weight (kilograms), Dose base (milligrams), Drug type, Amount per dose (milligrams), Daily dosage (milligrams). With weight, prescribed_dose and drug_type in place, Liquid per dose can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Amount per dose, Dose base, Your cat's weight and Daily dosage blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Drug type = 25, Amount per dose = 150 mg, Daily dosage = 300 mg, Liquid per dose = 6 ml, Liquid per day = 12 ml, Tablets per dose = 6 # and Tablets per day = 12 #. Those are the defaults written into the form — move Your cat's weight and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Liquid per dose is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Your cat\'s weight blank and the page solves for it, reporting Liquid per dose instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Liquid per dose keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/cell-dilution', 'name' => 'Cell dilution Calculator'],
            ['path' => '/biology/cell-doubling-time', 'name' => 'Cell doubling time Calculator'],
            ['path' => '/biology/cell-seeding-density', 'name' => 'Cell Seeding Density Calculator'],
        ],
        'authors' => [],
    ],
];

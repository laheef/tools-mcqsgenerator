<?php

/**
 * Benadryl dosage for dogs
 * /biology/benadryl-dosage-for-dogs
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Benadryl dosage for dogs',
    'meta' => ['title' => 'Benadryl dosage for dogs — Free Online Calculator', 'description' => <<<'TXT'
    Benadryl dosage for dogs turns Dosage by weight into Your dog's weight and Liquid (12.5 mg / 5 mL). There is no hidden constant here: change Your dog's weight…
    TXT, 'h1' => 'Benadryl dosage for dogs Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dogs_weight',
                            'label' => 'Your dog\'s weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Benadryl dosage',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mass_dose',
                            'label' => 'Dosage by weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'liquid_dose',
                            'label' => 'Liquid (12.5 mg / 5 mL)',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tablets',
                            'label' => 'Tablets',
                            'type' => 'number',
                            'suffix' => '× 25 mg',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chewable_tablets',
                            'label' => 'Chewable tablets',
                            'type' => 'number',
                            'suffix' => '× 12.5 mg',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => '🕒 Dose must be repeated every 8 or 12 hours (2 or 3 times per day).'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'dogs_weight = mass_dose',
            'results' => ['dogs_weight' => 'mass_dose', 'mass_dose' => 'dogs_weight'],
        ],
        [
            'title' => 'floor(mass_dose/ 25) = tablets',
            'results' => ['tablets' => 'floor((1/25)*mass_dose)'],
        ],
        [
            'title' => 'floor(mass_dose/ 12.5) = chewable_tablets',
            'results' => ['chewable_tablets' => 'floor((2/25)*mass_dose)'],
        ],
        [
            'title' => 'mass_dose/ 2.5 = liquid_dose',
            'results' => ['liquid_dose' => '(2/5)*mass_dose', 'mass_dose' => '(5/2)*liquid_dose'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Benadryl dosage for dogs turns Dosage by weight into Your dog's weight and Liquid (12.5 mg / 5 mL). There is no hidden constant here: change Your dog's weight and Dosage by weight moves with it. The main result, Your dog's weight, is reported in kilograms.
        TXT,
        'sections' => [
            ['title' => 'How the Benadryl dosage for dogs calculator works', 'html' => <<<'TXT'
            <p>Benadryl dosage for dogs answers one question from 1 number, and the answer is Your dog&#039;s weight, Liquid (12.5 mg / 5 mL) and Tablets.</p><p>The relationship it solves reads Your dog&#039;s weight = Dosage by weight.</p><p>What comes back is Your dog&#039;s weight, Liquid (12.5 mg / 5 mL), Tablets and Chewable tablets — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Dosage by weight</strong> — in milligrams</li></ul><p>The answers come back as Your dog&#039;s weight in kilograms, Liquid (12.5 mg / 5 mL) in milliliters, Tablets in × 25 mg, Chewable tablets in × 12.5 mg. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Dosage by weight = 10 mg — through the same formula and the panel reports &lt;strong&gt;Your dog&amp;#039;s weight&lt;/strong&gt; = 10 kg, &lt;strong&gt;Tablets&lt;/strong&gt; = 0 × 25 mg, &lt;strong&gt;Chewable tablets&lt;/strong&gt; = 0 × 12.5 mg and &lt;strong&gt;Liquid (12.5 mg / 5 mL)&lt;/strong&gt; = 4 ml.</p><ul><li><strong>Your dog&#039;s weight</strong> = 10 kg</li><li><strong>Tablets</strong> = 0 × 25 mg</li><li><strong>Chewable tablets</strong> = 0 × 12.5 mg</li><li><strong>Liquid (12.5 mg / 5 mL)</strong> = 4 ml</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Your dog&#039;s weight</strong> = <code>Dosage by weight</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Your dog&amp;#039;s weight&lt;/strong&gt; = 10, &lt;strong&gt;Tablets&lt;/strong&gt; = 0, &lt;strong&gt;Chewable tablets&lt;/strong&gt; = 0 and &lt;strong&gt;Liquid (12.5 mg / 5 mL)&lt;/strong&gt; = 4 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Your dog&#039;s weight offers 27 units and opens on kilograms, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Your dog&#039;s weight</strong> = <code>Dosage by weight</code></li><li><strong>Dosage by weight</strong> = <code>Your dog&#039;s weight</code></li><li><strong>Tablets</strong> = <code>floor((1 ÷ 25) × Dosage by weight)</code></li><li><strong>Chewable tablets</strong> = <code>floor((2 ÷ 25) × Dosage by weight)</code></li><li><strong>Liquid (12.5 mg / 5 mL)</strong> = <code>(2 ÷ 5) × Dosage by weight</code></li></ul><p>Any one of Your dog&#039;s weight, Dosage by weight and Tablets can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Dosage by weight from 10 to 20, leaving every other box alone. The panel moves from &lt;strong&gt;Your dog&amp;#039;s weight&lt;/strong&gt; 10 kg, &lt;strong&gt;Tablets&lt;/strong&gt; 0 × 25 mg, &lt;strong&gt;Chewable tablets&lt;/strong&gt; 0 × 12.5 mg and &lt;strong&gt;Liquid (12.5 mg / 5 mL)&lt;/strong&gt; 4 ml to &lt;strong&gt;Your dog&amp;#039;s weight&lt;/strong&gt; 20 kg, &lt;strong&gt;Tablets&lt;/strong&gt; 0 × 25 mg, &lt;strong&gt;Chewable tablets&lt;/strong&gt; 1 × 12.5 mg and &lt;strong&gt;Liquid (12.5 mg / 5 mL)&lt;/strong&gt; 8 ml.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Dosage by weight is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Your dog&#039;s weight, Liquid (12.5 mg / 5 mL) and Tablets are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Dosage by weight is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Dosage by weight and the number you are missing is Your dog&#039;s weight and Liquid (12.5 mg / 5 mL).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/amino-acid-composition">Amino Acid Composition Calculator</a>, <a href="/biology/animal-mortality-rate">Animal mortality rate</a> and <a href="/biology/annealing-temperature">Annealing temperature Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Benadryl dosage for dogs calculator work out?', 'a' => 'Your dog\'s weight, Liquid (12.5 mg / 5 mL), Tablets and Chewable tablets, from Dosage by weight. The relationship is Your dog\'s weight = Dosage by weight.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Dosage by weight (milligrams). Enter mass_dose; Your dog\'s weight is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Your dog's weight, Dosage by weight, Tablets and Chewable tablets blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Your dog's weight = 10 kg, Tablets = 0 × 25 mg, Chewable tablets = 0 × 12.5 mg and Liquid (12.5 mg / 5 mL) = 4 ml. The figures come from Dosage by weight as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Your dog\'s weight is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Dosage by weight blank and the page solves for it, reporting Your dog\'s weight instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Your dog\'s weight at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/amino-acid-composition', 'name' => 'Amino Acid Composition Calculator'],
            ['path' => '/biology/animal-mortality-rate', 'name' => 'Animal mortality rate'],
            ['path' => '/biology/annealing-temperature', 'name' => 'Annealing temperature Calculator'],
        ],
        'authors' => [],
    ],
];

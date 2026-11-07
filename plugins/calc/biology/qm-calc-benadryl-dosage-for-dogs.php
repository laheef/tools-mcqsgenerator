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
    'meta' => ['title' => 'Benadryl dosage for dogs — Free Online Calculator', 'description' => 'Benadryl dosage for dogs turns dosage by weight into your dog\'s weight. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Benadryl dosage for dogs Calculator', 'updated' => '2026-09-28'],
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
        Benadryl dosage for dogs turns Dosage by weight into Your dog's weight and Liquid (12.5 mg / 5 mL). There is no hidden constant here: change your dog's weight and dosage by weight moves with it. The main result, Your dog's weight, is reported in kilograms.
        TXT,
        'sections' => [
            ['title' => 'How the Benadryl dosage for dogs calculator works', 'html' => <<<'TXT'
            <p>Benadryl dosage for dogs answers one question from 1 number, and the answer is Your dog&#039;s weight, Liquid (12.5 mg / 5 mL) and Tablets.</p><p>The relationship it solves reads Your dog&#039;s weight = Dosage by weight.</p><p>What comes back is Your dog&#039;s weight, Liquid (12.5 mg / 5 mL), Tablets and Chewable tablets — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Dosage by weight</strong> — in milligrams</li></ul><p>The answers come back as Your dog&#039;s weight in kilograms, Liquid (12.5 mg / 5 mL) in milliliters, Tablets in × 25 mg, Chewable tablets in × 12.5 mg. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Dosage by weight = 10 mg — through the same formula and the panel reports <strong>Your dog&amp;#039;s weight</strong> = 10 kg, <strong>Tablets</strong> = 0 × 25 mg, <strong>Chewable tablets</strong> = 0 × 12.5 mg and <strong>Liquid (12.5 mg / 5 mL)</strong> = 4 ml.</p><ul><li><strong>Your dog&#039;s weight</strong> = 10 kg</li><li><strong>Tablets</strong> = 0 × 25 mg</li><li><strong>Chewable tablets</strong> = 0 × 12.5 mg</li><li><strong>Liquid (12.5 mg / 5 mL)</strong> = 4 ml</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Your dog&#039;s weight</strong> = <code>Dosage by weight</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Your dog&amp;#039;s weight</strong> = 10, <strong>Tablets</strong> = 0, <strong>Chewable tablets</strong> = 0 and <strong>Liquid (12.5 mg / 5 mL)</strong> = 4 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Your dog&#039;s weight offers 27 units and opens on kilograms, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Your dog&#039;s weight</strong> = <code>Dosage by weight</code></li><li><strong>Dosage by weight</strong> = <code>Your dog&#039;s weight</code></li><li><strong>Tablets</strong> = <code>floor((1 ÷ 25) × Dosage by weight)</code></li><li><strong>Chewable tablets</strong> = <code>floor((2 ÷ 25) × Dosage by weight)</code></li><li><strong>Liquid (12.5 mg / 5 mL)</strong> = <code>(2 ÷ 5) × Dosage by weight</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Your dog&#039;s weight</strong> = <code>Dosage by weight</code> — the form to use when Dosage by weight are the values you have.</li><li><strong>Dosage by weight</strong> = <code>Your dog&#039;s weight</code> — the form to use when Your dog&#039;s weight are the values you have.</li><li><strong>Tablets</strong> = <code>floor((1 ÷ 25) × Dosage by weight)</code> — the form to use when Dosage by weight are the values you have.</li><li><strong>Chewable tablets</strong> = <code>floor((2 ÷ 25) × Dosage by weight)</code> — the form to use when Dosage by weight are the values you have.</li><li><strong>Liquid (12.5 mg / 5 mL)</strong> = <code>(2 ÷ 5) × Dosage by weight</code> — the form to use when Dosage by weight are the values you have.</li><li><strong>Dosage by weight</strong> = <code>(5 ÷ 2) × Liquid (12.5 mg / 5 mL)</code> — the form to use when Liquid (12.5 mg / 5 mL) are the values you have.</li></ul><p>Any one of Your dog&#039;s weight, Dosage by weight and Tablets can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Dosage by weight from 10 to 20, leaving every other box alone. The panel moves from <strong>Your dog&amp;#039;s weight</strong> 10 kg, <strong>Tablets</strong> 0 × 25 mg, <strong>Chewable tablets</strong> 0 × 12.5 mg and <strong>Liquid (12.5 mg / 5 mL)</strong> 4 ml to <strong>Your dog&amp;#039;s weight</strong> 20 kg, <strong>Tablets</strong> 0 × 25 mg, <strong>Chewable tablets</strong> 1 × 12.5 mg and <strong>Liquid (12.5 mg / 5 mL)</strong> 8 ml.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Dosage by weight is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Your dog&#039;s weight, Liquid (12.5 mg / 5 mL) and Tablets are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Dosage by weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Dosage by weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Dosage by weight is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Benadryl dosage for dogs form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Dosage by weight</strong> is a milligrams quantity: the page opens it in mg and converts anything else you pick before the formula runs. Change it and Your dog's weight, Tablets and Chewable tablets changes with it. Fill it from a measurement rather than a memory — Dosage by weight is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Your dog&#039;s weight</strong> is a kilograms figure and the page's own defaults put it at 10 kg. The value follows from Dosage by weight. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Liquid (12.5 mg / 5 mL)</strong> is a milliliters figure and the page's own defaults put it at 4 ml. The value follows from Dosage by weight. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Tablets</strong> is a plain number and the page's own defaults put it at 0. The value follows from Dosage by weight. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Chewable tablets</strong> is a plain number and the page's own defaults put it at 0. The value follows from Dosage by weight. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Your dog&#039;s weight</th><th>Tablets</th><th>Chewable tablets</th><th>Liquid (12.5 mg / 5 mL)</th></tr></thead><tbody><tr><td><strong>Dosage by weight</strong> +10%</td><td>+10%</td><td>—</td><td>—</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Dosage by weight sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Dosage by weight = 5 mg and the page reports <strong>Your dog&#039;s weight</strong> = 5 kg, <strong>Tablets</strong> = 0 × 25 mg, <strong>Chewable tablets</strong> = 0 × 12.5 mg and <strong>Liquid (12.5 mg / 5 mL)</strong> = 2 ml.</li><li>Feed in Dosage by weight = 30 mg and the page reports <strong>Your dog&#039;s weight</strong> = 30 kg, <strong>Tablets</strong> = 1 × 25 mg, <strong>Chewable tablets</strong> = 2 × 12.5 mg and <strong>Liquid (12.5 mg / 5 mL)</strong> = 12 ml.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Benadryl dosage for dogs actually offers.</p><ul><li><strong>milligrams</strong> — 27 units. It opens in <em>mg</em>, and the chip also carries lb, mg, g, oz, t and ng. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>milliliters</strong> — 40 units. It opens in <em>ml</em>, and the chip also carries m³, cu ft, US fl oz, L, dm³ and cu in. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Your dog&#039;s weight follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are milligrams and milliliters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Dosage by weight are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Dosage by weight and the number you are missing is Your dog&#039;s weight and Liquid (12.5 mg / 5 mL).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/amino-acid-composition">Amino Acid Composition Calculator</a>, <a href="/biology/animal-mortality-rate">Animal mortality rate</a> and <a href="/biology/annealing-temperature">Annealing temperature Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Benadryl dosage for dogs calculator work out?', 'a' => 'Your dog\'s weight, Liquid (12.5 mg / 5 mL), Tablets and Chewable tablets, from Dosage by weight. The relationship is Your dog\'s weight = Dosage by weight.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Dosage by weight (milligrams). Enter dosage by weight; Your dog\'s weight is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Your dog's weight, Dosage by weight, Tablets and Chewable tablets blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Your dog's weight = 10 kg, Tablets = 0 × 25 mg, Chewable tablets = 0 × 12.5 mg and Liquid (12.5 mg / 5 mL) = 4 ml. The figures come from Dosage by weight as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Your dog's weight is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
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

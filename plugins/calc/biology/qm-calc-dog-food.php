<?php

/**
 * Dog food
 * /biology/dog-food
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog food',
    'meta' => ['title' => 'Dog food Calculator: Formula, Steps & Examples', 'description' => 'Dog food takes type, body weight and 1 dose and returns resting daily calories and total daily calories. The formula is printed in the form\'s own words.', 'h1' => 'Dog food Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => 'Dog\'s characteristics',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Type',
                            'label' => 'Type',
                            'type' => 'select',
                            'options' => [
                                'Puppy - 0 to 4 months' => '3.000000000000000',
                                'Puppy - 4 months to adult' => '2.000000000000000',
                                'Dog - inactive or obese prone' => '1.200000000000000',
                                'Dog (neutered/spayed) - average activity' => '1.600000000000000',
                                'Dog (intact) - average activity' => '1.800000000000000',
                                'Dog - weight loss needed' => '1.000000000000000',
                                'Dog - weight gain needed' => '1.700000000000000',
                                'Working dog - light work' => '2.000000000000001',
                                'Working dog - moderate work' => '3.000000000000001',
                                'Working dog - heavy work' => '5.000000000000000',
                                'Senior dog' => '1.100000000000000',
                            ],
                            'dataset' => 'Multiplier',
                            'control' => 'DROPDOWN',
                            'default' => 'Dog (intact) - average activity',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bodyWeight',
                            'label' => 'Body weight',
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
            'title' => 'Results - Dog\'s calorie requirements',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caloriesResting',
                            'label' => 'Resting daily calories',
                            'type' => 'number',
                            'suffix' => 'cal',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caloriesActive',
                            'label' => 'Total daily calories',
                            'type' => 'number',
                            'suffix' => 'cal',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Feeding amount',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caloriesPerCup',
                            'label' => '1 dose',
                            'type' => 'number',
                            'suffix' => 'calories / cup',
                            'help' => 'How many calories per cup, portion, etc.',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'feedingAmount',
                            'label' => 'Daily servings',
                            'type' => 'number',
                            'suffix' => 'cups / day',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'caloriesResting = one_way((70*pow(bodyWeight, 0.75)))',
            'results' => ['caloriesResting' => '(70*pow(bodyWeight, 3/4))'],
        ],
        [
            'title' => 'caloriesActive  = one_way((70*pow(bodyWeight, 0.75))*Type)',
            'results' => ['caloriesActive' => '(70*Type*pow(bodyWeight, 3/4))'],
        ],
        [
            'title' => 'feedingAmount = ((70*pow(bodyWeight, 0.75))*Type)/caloriesPerCup',
            'results' => ['Type' => '(1/70)*caloriesPerCup*feedingAmount/pow(bodyWeight, 3/4)', 'caloriesPerCup' => '70*Type*pow(bodyWeight, 3/4)/feedingAmount', 'feedingAmount' => '70*Type*pow(bodyWeight, 3/4)/caloriesPerCup', 'bodyWeight' => '(1/4900)*pow(70, 2/3)*pow(caloriesPerCup*feedingAmount/Type, 4/3)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dog food takes Body weight and returns Type and Resting daily calories. Nothing is looked up on this page: type is computed from body weight and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Dog food calculator works', 'html' => <<<'TXT'
            <p>Dog food answers one question from 1 number, and the answer is Type, Resting daily calories and Total daily calories.</p><p>In the form&#039;s own words, Resting daily calories = (70 × (Body weight)^(3 ÷ 4)).</p><p>The result panel carries Type, Resting daily calories, Total daily calories and 1 dose, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Body weight</strong> — in kilograms</li></ul><p>The answers come back as Type, Resting daily calories in cal, Total daily calories in cal, 1 dose in calories / cup, Daily servings in cups / day. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Type = 1.8, Body weight = 10 kg, Total daily calories = 100 cal, 1 dose = 1000 calories / cup and Daily servings = 10 cups / day gives <strong>Resting daily calories</strong> = 394 cal.</p><ul><li><strong>Resting daily calories</strong> = 394 cal</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Resting daily calories</strong> = <code>(70 × (Body weight)^(3 ÷ 4))</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Resting daily calories</strong> = 394 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Body weight offers 27 units and opens on kilograms, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Resting daily calories</strong> = <code>(70 × (Body weight)^(3 ÷ 4))</code></li><li><strong>Total daily calories</strong> = <code>(70 × Type × (Body weight)^(3 ÷ 4))</code></li><li><strong>Type</strong> = <code>(1 ÷ 70) × 1 dose × Daily servings ÷ (Body weight)^(3 ÷ 4)</code></li><li><strong>1 dose</strong> = <code>70 × Type × (Body weight)^(3 ÷ 4) ÷ Daily servings</code></li><li><strong>Daily servings</strong> = <code>70 × Type × (Body weight)^(3 ÷ 4) ÷ 1 dose</code></li><li><strong>Body weight</strong> = <code>(1 ÷ 4900) × (70)^(2 ÷ 3) × (1 dose × Daily servings ÷ Type)^(4 ÷ 3)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Resting daily calories</strong> = <code>(70 × (Body weight)^(3 ÷ 4))</code> — the form to use when Body weight are the values you have.</li><li><strong>Total daily calories</strong> = <code>(70 × Type × (Body weight)^(3 ÷ 4))</code> — the form to use when Type and Body weight are the values you have.</li><li><strong>Type</strong> = <code>(1 ÷ 70) × 1 dose × Daily servings ÷ (Body weight)^(3 ÷ 4)</code> — the form to use when 1 dose, Daily servings and Body weight are the values you have.</li><li><strong>1 dose</strong> = <code>70 × Type × (Body weight)^(3 ÷ 4) ÷ Daily servings</code> — the form to use when Type, Body weight and Daily servings are the values you have.</li><li><strong>Daily servings</strong> = <code>70 × Type × (Body weight)^(3 ÷ 4) ÷ 1 dose</code> — the form to use when Type, Body weight and 1 dose are the values you have.</li><li><strong>Body weight</strong> = <code>(1 ÷ 4900) × (70)^(2 ÷ 3) × (1 dose × Daily servings ÷ Type)^(4 ÷ 3)</code> — the form to use when 1 dose, Daily servings and Type are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Resting daily calories, Total daily calories and Type can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Type, from 1.8 to 3.6 — and the answers go from <strong>Resting daily calories</strong> 394 cal to <strong>Resting daily calories</strong> 394 cal.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Body weight is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Type, Resting daily calories and Total daily calories are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Body weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Body weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Body weight and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Body weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. The page reads it when it works out Resting daily calories, Total daily calories and Type. Have it to hand before you start: Body weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Type</strong> is a plain number. It is worked out from 1 dose, Daily servings and Body weight. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Resting daily calories</strong> is a plain number and the page's own defaults put it at 394. It is worked out from Body weight. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total daily calories</strong> is a plain number. It is worked out from Type and Body weight. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>1 dose</strong> is a plain number. It is worked out from Type, Body weight and Daily servings. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Daily servings</strong> is a plain number. It is worked out from Type, Body weight and 1 dose. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Resting daily calories</th></tr></thead><tbody><tr><td><strong>Type</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Body weight</strong> +10%</td><td>+7.41%</td></tr><tr><td><strong>Total daily calories</strong> +10%</td><td>+0%</td></tr><tr><td><strong>1 dose</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Daily servings</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Body weight sits at the top — a ten per cent error in that box shows up as roughly 7.4 per cent in the answer. By contrast, Type, Total daily calories and 1 dose barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Type = 0.9, Body weight = 5 kg, Total daily calories = 50 cal, 1 dose = 500 calories / cup and Daily servings = 5 cups / day, the answer is <strong>Resting daily calories</strong> = 234 cal.</li><li>With Type = 5.4, Body weight = 10 kg, Total daily calories = 100 cal, 1 dose = 1000 calories / cup and Daily servings = 10 cups / day, the answer is <strong>Resting daily calories</strong> = 394 cal.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>kilograms</strong> — 27 units. It opens in <em>kg</em>, and the chip also carries lb, mg, g, oz, t and ng. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Type is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Body weight are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Body weight and the number you are missing is Type and Resting daily calories.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dna-molarity-calculator">DNA Molarity Calculator</a>, <a href="/biology/dna-molarity-from-mass">DNA Molarity from Mass or A260 Calculator</a> and <a href="/biology/dna-molecular-weight-calculator">DNA Molecular Weight Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog food calculator work out?', 'a' => 'Type, Resting daily calories, Total daily calories and 1 dose, from Body weight. The relationship is Resting daily calories = (70 × (Body weight)^(3 ÷ 4)).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Body weight (kilograms). Fill body weight and leave Type empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Resting daily calories, Total daily calories, Type and 1 dose can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Resting daily calories = 394 cal. The figures come from Body weight as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Type is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Body weight left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Type at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/dna-molarity-calculator', 'name' => 'DNA Molarity Calculator'],
            ['path' => '/biology/dna-molarity-from-mass', 'name' => 'DNA Molarity from Mass or A260 Calculator'],
            ['path' => '/biology/dna-molecular-weight-calculator', 'name' => 'DNA Molecular Weight Calculator'],
        ],
        'authors' => [],
    ],
];

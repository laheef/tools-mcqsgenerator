<?php

/**
 * Basal Metabolic Rate Calculator (Mifflin–St Jeor)
 * /biology/basal-metabolic-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Basal Metabolic Rate Calculator (Mifflin–St Jeor)',
    'meta' => ['title' => 'Basal Metabolic Rate (Mifflin–St Jeor) Calculator', 'description' => 'Basal metabolic rate is the energy a body spends at complete rest. Free basal metabolic rate (mifflin–st jeor) calculator: enter your values and get basal met', 'h1' => 'Basal Metabolic Rate Calculator (Mifflin–St Jeor)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'sex',
                            'label' => 'Sex',
                            'type' => 'select',
                            'options' => ['Male (+5 kcal)' => '5', 'Female (−161 kcal)' => '-161'],
                            'default' => 'Male (+5 kcal)',
                        ],
                        [
                            'name' => 'weight',
                            'label' => 'Weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '75',
                        ],
                        [
                            'name' => 'height',
                            'label' => 'Height',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '178',
                        ],
                        [
                            'name' => 'age',
                            'label' => 'Age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'activity',
                            'label' => 'Activity level',
                            'type' => 'select',
                            'options' => [
                                'Sedentary (×1.2)' => '1.2',
                                'Light (×1.375)' => '1.375',
                                'Moderate (×1.55)' => '1.55',
                                'Active (×1.725)' => '1.725',
                                'Very active (×1.9)' => '1.9',
                            ],
                            'control' => 'SELECT',
                            'default' => 'Light (×1.375)',
                        ],
                        [
                            'name' => 'bmr',
                            'label' => 'Basal metabolic rate',
                            'type' => 'number',
                            'suffix' => 'kcal/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tdee',
                            'label' => 'Total daily energy expenditure',
                            'type' => 'number',
                            'suffix' => 'kcal/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_kg',
                            'label' => 'BMR per kg',
                            'type' => 'number',
                            'suffix' => 'kcal/kg/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'kj',
                            'label' => 'BMR',
                            'type' => 'number',
                            'suffix' => 'kJ/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Energy',
            'results' => ['bmr' => '10*weight+6.25*height-5*age+sex', 'tdee' => '(10*weight+6.25*height-5*age+sex)*activity', 'per_kg' => '(10*weight+6.25*height-5*age+sex)/weight', 'kj' => '(10*weight+6.25*height-5*age+sex)*4.184'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Basal Metabolic Rate Calculator (Mifflin–St Jeor) takes Sex, Weight and Height and returns Basal metabolic rate and Total daily energy expenditure. Nothing is looked up on this page: Basal metabolic rate is computed from Sex and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Basal metabolic rate is opened in kcal/day; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Basal Metabolic Rate Calculator (Mifflin–St Jeor) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Basal Metabolic Rate Calculator (Mifflin–St Jeor): it takes 5 numbers and reports Basal metabolic rate, Total daily energy expenditure and BMR per kg.</p><p>In the form&#039;s own words, Basal metabolic rate = 10 × Weight + 6.25 × Height − 5 × Age + Sex.</p><p>What comes back is Basal metabolic rate, Total daily energy expenditure, BMR per kg and BMR — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>Sex</strong> — a plain number, no unit</li><li><strong>Weight</strong> — in kg</li><li><strong>Height</strong> — in cm</li><li><strong>Age</strong> — in years</li><li><strong>Activity level</strong> — a plain number, no unit</li></ul><p>What you get back is Basal metabolic rate in kcal/day, Total daily energy expenditure in kcal/day, BMR per kg in kcal/kg/day, BMR in kJ/day, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Sex = 5, Weight = 75 kg, Height = 178 cm, Age = 30 years and Activity level = 1.38 gives &lt;strong&gt;Basal metabolic rate&lt;/strong&gt; = 1718 kcal/day, &lt;strong&gt;Total daily energy expenditure&lt;/strong&gt; = 2362 kcal/day, &lt;strong&gt;BMR per kg&lt;/strong&gt; = 22.9 kcal/kg/day and &lt;strong&gt;BMR&lt;/strong&gt; = 7186 kJ/day.</p><ul><li><strong>Basal metabolic rate</strong> = 1718 kcal/day</li><li><strong>Total daily energy expenditure</strong> = 2362 kcal/day</li><li><strong>BMR per kg</strong> = 22.9 kcal/kg/day</li><li><strong>BMR</strong> = 7186 kJ/day</li></ul><p>The line behind those figures is <strong>Basal metabolic rate</strong> = <code>10 × Weight + 6.25 × Height − 5 × Age + Sex</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Basal metabolic rate&lt;/strong&gt; = 1718, &lt;strong&gt;Total daily energy expenditure&lt;/strong&gt; = 2362, &lt;strong&gt;BMR per kg&lt;/strong&gt; = 22.9 and &lt;strong&gt;BMR&lt;/strong&gt; = 7186 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Basal metabolic rate takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Basal metabolic rate</strong> = <code>10 × Weight + 6.25 × Height − 5 × Age + Sex</code></li><li><strong>Total daily energy expenditure</strong> = <code>(10 × Weight + 6.25 × Height − 5 × Age + Sex) × Activity level</code></li><li><strong>BMR per kg</strong> = <code>(10 × Weight + 6.25 × Height − 5 × Age + Sex) ÷ Weight</code></li><li><strong>BMR</strong> = <code>(10 × Weight + 6.25 × Height − 5 × Age + Sex) × 4.184</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Basal metabolic rate, Total daily energy expenditure and BMR per kg can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Sex, from 5 to 10 — and the answers go from &lt;strong&gt;Basal metabolic rate&lt;/strong&gt; 1718 kcal/day, &lt;strong&gt;Total daily energy expenditure&lt;/strong&gt; 2362 kcal/day, &lt;strong&gt;BMR per kg&lt;/strong&gt; 22.9 kcal/kg/day and &lt;strong&gt;BMR&lt;/strong&gt; 7186 kJ/day to &lt;strong&gt;Basal metabolic rate&lt;/strong&gt; 1723 kcal/day, &lt;strong&gt;Total daily energy expenditure&lt;/strong&gt; 2368 kcal/day, &lt;strong&gt;BMR per kg&lt;/strong&gt; 22.97 kcal/kg/day and &lt;strong&gt;BMR&lt;/strong&gt; 7207 kJ/day.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Basal metabolic rate, Total daily energy expenditure and BMR per kg are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Sex is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Sex, Weight and Height measured, Basal metabolic rate and Total daily energy expenditure wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/mutation-frequency">Mutation frequency</a>, <a href="/biology/mutation-rate">Mutation rate Calculator</a> and <a href="/biology/ndvi-calculator">NDVI (Normalised Difference Vegetation Index) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Basal Metabolic Rate Calculator (Mifflin–St Jeor) calculator work out?', 'a' => <<<'TXT'
            Basal metabolic rate, Total daily energy expenditure, BMR per kg and BMR, from Weight, Height, Age and Sex. The relationship is Basal metabolic rate = 10 × Weight + 6.25 × Height − 5 × Age + Sex.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Sex, Weight (kg), Height (cm), Age (years), Activity level. With sex, weight and height in place, Basal metabolic rate can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Basal metabolic rate, Total daily energy expenditure, BMR per kg and BMR can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Basal metabolic rate = 1718 kcal/day, Total daily energy expenditure = 2362 kcal/day, BMR per kg = 22.9 kcal/kg/day and BMR = 7186 kJ/day. Those are the defaults written into the form — move Sex and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Basal metabolic rate is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Sex left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Basal metabolic rate keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/mutation-frequency', 'name' => 'Mutation frequency'],
            ['path' => '/biology/mutation-rate', 'name' => 'Mutation rate Calculator'],
            ['path' => '/biology/ndvi-calculator', 'name' => 'NDVI (Normalised Difference Vegetation Index) Calculator'],
        ],
        'authors' => [],
    ],
];

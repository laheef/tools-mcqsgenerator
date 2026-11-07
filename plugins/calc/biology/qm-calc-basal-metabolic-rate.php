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
    'meta' => ['title' => 'Basal Metabolic Rate (Mifflin–St Jeor) Calculator', 'description' => 'Basal metabolic rate is the energy a body spends at complete rest. It returns basal metabolic rate, total daily energy expenditure, BMR per kg and BMR, and…', 'h1' => 'Basal Metabolic Rate Calculator (Mifflin–St Jeor)', 'updated' => '2026-10-29'],
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
        Basal metabolic rate is the energy a body spends at complete rest. It returns basal metabolic rate, total daily energy expenditure, BMR per kg and BMR, and the panel shows all of them at once.
        
        The Mifflin–St Jeor equation is the most accurate simple predictor for most adults, and this calculator adds the activity factor that turns BMR into total daily energy expenditure.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Basal Metabolic Rate (Mifflin–St Jeor)', 'html' => <<<'TXT'
            <p>Male: BMR = 10W + 6.25H − 5A + 5; female: BMR = 10W + 6.25H − 5A − 161</p>
            <figure class="calc-figure"><img src="/uploads/biology/basal-metabolic-rate.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Basal Metabolic Rate Calculator (Mifflin–St Jeor) — Resting burn, activity, and the daily total." title="Basal Metabolic Rate Calculator (Mifflin–St Jeor)"><figcaption>Resting burn, activity, and the daily total.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>W</code></td><td>weight in kilograms</td><td>kg</td></tr><tr><td><code>H</code></td><td>height in centimetres</td><td>cm</td></tr><tr><td><code>A</code></td><td>age in years</td><td>years</td></tr><tr><td><code>TDEE</code></td><td>BMR × activity factor</td><td>kcal/day</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Basal Metabolic Rate (Mifflin–St Jeor)?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: sex set to <strong>5.0</strong>, weight of <strong>75</strong> kg, height of <strong>178</strong> cm, age of <strong>30</strong> years, activity level set to <strong>Light (×1.375)</strong>.</p>
            <p>Substituting them into the formula gives basal metabolic rate of <strong>1,717.5</strong> kcal/day, total daily energy expenditure of <strong>2,361.56</strong> kcal/day, bmr per kg of <strong>22.9</strong> kcal/kg/day, bmr of <strong>7,186.02</strong> kJ/day.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>This page shows the male form on its default settings; the female equation subtracts 161 instead of adding 5, which is about 166 kcal lower for the same body.</p></li><li><p>BMR assumes complete rest; TDEE multiplies it by an activity factor that is the largest source of error in the whole calculation.</p></li><li><p>Measured BMR by indirect calorimetry is typically within 10% of the prediction for healthy adults, and further out in obesity, illness and old age.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Using pounds or inches without converting.</li><li>Adding exercise calories twice — the activity factor already includes them.</li><li>Treating TDEE as a prescription rather than an estimate, then eating back every estimated calorie burned.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/tidal-volume-lung-capacity">Tidal volume and lung capacity</a>. <a href="/biology/basal-metabolic-rate">Basal metabolic rate</a>. <a href="/biology/respiratory-quotient">Respiratory quotient</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How accurate is Mifflin–St Jeor?', 'a' => 'It predicts BMR within about 10% for most adults and is more accurate than the older Harris–Benedict equation.'],
            ['q' => 'Should I eat my BMR or my TDEE?', 'a' => 'TDEE is what you burn; BMR is the floor. Eating below BMR is rarely advisable without medical supervision.'],
            ['q' => 'What does the Basal Metabolic Rate (Mifflin–St Jeor) actually calculate?', 'a' => <<<'TXT'
            It returns basal metabolic rate, total daily energy expenditure, BMR per kg and BMR. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
        ],
        'related' => [],
    ],
];

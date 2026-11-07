<?php

/**
 * In Vivo Formulation Calculator
 * /biology/in-vivo-formulation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'In Vivo Formulation Calculator',
    'meta' => ['title' => 'In Vivo Formulation Calculator — Formula & Results', 'description' => 'Work out the dosing volume, the amount of compound to weigh out and the dilution you need before an in vivo study. It returns volume per animal, dose volume…', 'h1' => 'In Vivo Formulation Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'dose',
                            'label' => 'Dose',
                            'type' => 'number',
                            'suffix' => 'mg/kg',
                            'help' => 'Milligrams of compound per kilogram of animal',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'weight',
                            'label' => 'Body weight',
                            'type' => 'number',
                            'suffix' => 'g',
                            'help' => 'Average weight of the animals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'animals',
                            'label' => 'Number of animals',
                            'type' => 'number',
                            'help' => 'Doses to prepare',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'stock',
                            'label' => 'Stock concentration',
                            'type' => 'number',
                            'suffix' => 'mg/mL',
                            'help' => 'The solution you have or will make',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'max_vol',
                            'label' => 'Maximum volume per dose',
                            'type' => 'number',
                            'suffix' => 'mL/kg',
                            'help' => '5 mL/kg oral, 10 mL/kg IP are common limits',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Volume per animal',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'volume_kg',
                            'label' => 'Dose volume per kg',
                            'type' => 'number',
                            'suffix' => 'mL/kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'compound',
                            'label' => 'Compound for the cohort',
                            'type' => 'number',
                            'suffix' => 'mg',
                            'help' => 'Weigh this much out',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'stock_needed',
                            'label' => 'Minimum stock concentration',
                            'type' => 'number',
                            'suffix' => 'mg/mL',
                            'help' => 'To stay inside the volume limit',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Dilution factor to that stock',
                            'type' => 'number',
                            'suffix' => '×',
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
            'title' => 'Dose',
            'results' => [
                'volume' => 'dose*weight/1000/stock*1000',
                'volume_kg' => 'dose*weight/1000/stock*1000/weight',
                'compound' => 'dose*weight/1000*animals',
                'stock_needed' => 'dose/max_vol',
                'dilution' => 'stock/(dose/max_vol)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Work out the dosing volume, the amount of compound to weigh out and the dilution you need before an in vivo study. It returns volume per animal, dose volume per kg, compound for the cohort and minimum stock concentration, and the panel shows all of them at once.
        
        Give the dose in mg/kg, the animal's weight and the stock concentration, and the page returns the volume to inject or dose orally, the total compound for the whole cohort, and whether the dose sits inside a sensible volume-to-bodyweight limit.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the In Vivo Formulation', 'html' => <<<'TXT'
            <p>V (µL) = dose (mg/kg) × body weight (g) ÷ 1000 ÷ stock (mg/mL) × 1000; compound = dose × weight ÷ 1000 × animals</p>
            <figure class="calc-figure"><img src="/uploads/biology/in-vivo-formulation.svg" width="720" height="300" loading="lazy" alt="Animated diagram: In Vivo Formulation Calculator — Volume per dose against the usual route limits" title="In Vivo Formulation Calculator"><figcaption>Volume per dose against the usual route limits</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>dose</code></td><td>milligrams of compound per kilogram of animal</td><td>mg/kg</td></tr><tr><td><code>weight</code></td><td>body weight of one animal</td><td>g</td></tr><tr><td><code>stock</code></td><td>concentration of the solution you dose from</td><td>mg/mL</td></tr><tr><td><code>V</code></td><td>volume given to one animal</td><td>µL</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the In Vivo Formulation?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the target dose and the average weight of the animals in the cohort.</li><li>Enter the stock concentration you have, or plan to make.</li><li>Compare the volume per animal with the route's limit: oral and subcutaneous doses are usually capped around 10 mL/kg, intravenous around 5 mL/kg.</li><li>Weigh out the compound the page reports, plus a little for losses — the figure is the theoretical minimum for the cohort.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: dose of <strong>10</strong> mg/kg, body weight of <strong>25</strong> g, number of animals of <strong>10</strong>, stock concentration of <strong>5</strong> mg/mL, maximum volume per dose of <strong>10</strong> mL/kg.</p>
            <p>Substituting them into the formula gives volume per animal of <strong>50</strong> µL, dose volume per kg of <strong>2</strong> mL/kg, compound for the cohort of <strong>2.5</strong> mg, minimum stock concentration of <strong>1</strong> mg/mL, dilution factor to that stock of <strong>5</strong> ×.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>≤ 5 mL/kg</td><td><strong>Comfortable</strong></td><td>fine for every common route including IV bolus</td></tr><tr><td>5 – 10 mL/kg</td><td><strong>Acceptable</strong></td><td>usual ceiling for oral gavage and subcutaneous dosing</td></tr><tr><td>10 – 20 mL/kg</td><td><strong>High</strong></td><td>only for oral dosing, and it disturbs fluid balance</td></tr><tr><td>above 20 mL/kg</td><td><strong>Too high</strong></td><td>raise the stock concentration instead of the volume</td></tr></tbody></table>
            <ul><li><p>The volume limit is a physiological constraint, not a convenience: a 25 g mouse given 1 mL has received 40 mL/kg, which is a fluid load large enough to change absorption and sometimes the result.</p></li><li><p>If the required volume exceeds the limit, the answer is a more concentrated stock, not a larger injection. The page reports the weakest stock that still fits, and how far your current stock could be diluted toward it.</p></li><li><p>The compound figure assumes no dead volume, no priming of lines and no spillage. In practice prepare 10–20 % extra, and more for a long study or a suspension.</p></li><li><p>For a suspension rather than a solution, dose by mass and vortex immediately before each dose — a settled suspension is the commonest cause of a variable exposure.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Mixing grams and milligrams: a 25 g mouse is 0.025 kg, and using 25 kg under-doses by 1000×.</li><li>Ignoring the volume limit and dosing 20 mL/kg because the arithmetic was easier.</li><li>Forgetting the vehicle-only control group when calculating how much compound to weigh out.</li><li>Assuming the stock concentration is exact: check the salt form and the purity, because both change the amount of free compound.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/dilution-calculator-c1v1">Dilution C1V1</a>. <a href="/biology/mass-molarity-conversion">Mass ↔ molarity</a>. <a href="/health/pediatric-dose">Paediatric dose</a>. <a href="/biology/serial-dilution-planner">Serial dilution planner</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I convert a mg/kg dose to a volume?', 'a' => <<<'TXT'
            Multiply the dose by the animal's weight in kilograms to get the mass of compound, then divide by the stock concentration. For a 25 g mouse at 10 mg/kg from a 5 mg/mL stock that is 0.25 mg ÷ 5 mg/mL = 50 µL.
            TXT],
            ['q' => 'What is a safe injection volume for a mouse?', 'a' => <<<'TXT'
            Roughly 10 mL/kg for oral and subcutaneous routes and 5 mL/kg for intravenous — about 250 µL and 125 µL for a 25 g mouse. Above that you are dosing fluid as much as compound.
            TXT],
            ['q' => 'Should I weigh out extra compound?', 'a' => <<<'TXT'
            Yes. The page gives the theoretical minimum for the cohort; add 10–20 % for dead volume and losses, and more if the compound is a suspension or the study runs for days.
            TXT],
            ['q' => 'Does body weight matter that much?', 'a' => <<<'TXT'
            It scales the dose linearly, so a cohort that gains 10 % during a study receives 10 % more compound at the same volume. Re-weigh weekly and adjust the volume, not the concentration.
            TXT],
            ['q' => 'What does the In Vivo Formulation actually calculate?', 'a' => <<<'TXT'
            It returns volume per animal, dose volume per kg, compound for the cohort and minimum stock concentration. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
        ],
        'related' => [],
    ],
];

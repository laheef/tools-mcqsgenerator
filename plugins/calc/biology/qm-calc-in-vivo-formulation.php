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
    'meta' => ['title' => 'In Vivo Formulation Calculator — Formula & Results', 'description' => 'In Vivo Formulation works out Volume per animal and Dose volume per kg from Dose, Body weight and Number of animals. It is a single relationship that reads…', 'h1' => 'In Vivo Formulation Calculator', 'updated' => '2026-10-29'],
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
        In Vivo Formulation works out Volume per animal and Dose volume per kg from Dose, Body weight and Number of animals. It is a single relationship that reads Volume per animal out of Dose, not a table of canned results keyed by them. Units for Volume per animal default to µL and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the In Vivo Formulation calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind In Vivo Formulation: it takes 5 numbers and reports Volume per animal, Dose volume per kg and Compound for the cohort.</p><p>Written with the labels from the form, Volume per animal = Dose × Body weight ÷ 1000 ÷ Stock concentration × 1000.</p><p>What comes back is Volume per animal, Dose volume per kg, Compound for the cohort and Minimum stock concentration — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>Dose</strong> — in mg/kg. Milligrams of compound per kilogram of animal</li><li><strong>Body weight</strong> — in g. Average weight of the animals</li><li><strong>Number of animals</strong> — a plain number, no unit. Doses to prepare</li><li><strong>Stock concentration</strong> — in mg/mL. The solution you have or will make</li><li><strong>Maximum volume per dose</strong> — in mL/kg. 5 mL/kg oral, 10 mL/kg IP are common limits</li></ul><p>What you get back is Volume per animal in µL, Dose volume per kg in mL/kg, Compound for the cohort in mg, Minimum stock concentration in mg/mL, Dilution factor to that stock in ×, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Dose = 10 mg/kg, Body weight = 25 g, Number of animals = 10, Stock concentration = 5 mg/mL and Maximum volume per dose = 10 mL/kg gives &lt;strong&gt;Volume per animal&lt;/strong&gt; = 50 µL, &lt;strong&gt;Dose volume per kg&lt;/strong&gt; = 2 mL/kg, &lt;strong&gt;Compound for the cohort&lt;/strong&gt; = 2.5 mg, &lt;strong&gt;Minimum stock concentration&lt;/strong&gt; = 1 mg/mL and &lt;strong&gt;Dilution factor to that stock&lt;/strong&gt; = 5 ×.</p><ul><li><strong>Volume per animal</strong> = 50 µL</li><li><strong>Dose volume per kg</strong> = 2 mL/kg</li><li><strong>Compound for the cohort</strong> = 2.5 mg</li><li><strong>Minimum stock concentration</strong> = 1 mg/mL</li><li><strong>Dilution factor to that stock</strong> = 5 ×</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Volume per animal</strong> = <code>Dose × Body weight ÷ 1000 ÷ Stock concentration × 1000</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Volume per animal&lt;/strong&gt; = 50, &lt;strong&gt;Dose volume per kg&lt;/strong&gt; = 2, &lt;strong&gt;Compound for the cohort&lt;/strong&gt; = 2.5, &lt;strong&gt;Minimum stock concentration&lt;/strong&gt; = 1 and &lt;strong&gt;Dilution factor to that stock&lt;/strong&gt; = 5. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Volume per animal is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Volume per animal</strong> = <code>Dose × Body weight ÷ 1000 ÷ Stock concentration × 1000</code></li><li><strong>Dose volume per kg</strong> = <code>Dose × Body weight ÷ 1000 ÷ Stock concentration × 1000 ÷ Body weight</code></li><li><strong>Compound for the cohort</strong> = <code>Dose × Body weight ÷ 1000 × Number of animals</code></li><li><strong>Minimum stock concentration</strong> = <code>Dose ÷ Maximum volume per dose</code></li><li><strong>Dilution factor to that stock</strong> = <code>Stock concentration ÷ (Dose ÷ Maximum volume per dose)</code></li></ul><p>Any one of Volume per animal, Dose volume per kg and Compound for the cohort can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Dose from 10 to 20, leaving every other box alone. The panel moves from &lt;strong&gt;Volume per animal&lt;/strong&gt; 50 µL, &lt;strong&gt;Dose volume per kg&lt;/strong&gt; 2 mL/kg, &lt;strong&gt;Compound for the cohort&lt;/strong&gt; 2.5 mg, &lt;strong&gt;Minimum stock concentration&lt;/strong&gt; 1 mg/mL and &lt;strong&gt;Dilution factor to that stock&lt;/strong&gt; 5 × to &lt;strong&gt;Volume per animal&lt;/strong&gt; 100 µL, &lt;strong&gt;Dose volume per kg&lt;/strong&gt; 4 mL/kg, &lt;strong&gt;Compound for the cohort&lt;/strong&gt; 5 mg, &lt;strong&gt;Minimum stock concentration&lt;/strong&gt; 2 mg/mL and &lt;strong&gt;Dilution factor to that stock&lt;/strong&gt; 2.5 ×.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Volume per animal, Dose volume per kg and Compound for the cohort are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Dose and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Dose, Body weight and Number of animals and the number you are missing is Volume per animal and Dose volume per kg.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/chi-square-genetics-test">Chi-Square Test for Genetics Calculator</a>, <a href="/biology/chicken-density">Chicken Density Calculator</a> and <a href="/biology/chicken-feed-amount">Chicken Feed Amount Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the In Vivo Formulation calculator work out?', 'a' => <<<'TXT'
            Volume per animal, Dose volume per kg, Compound for the cohort and Minimum stock concentration, from Dose, Body weight and Stock concentration. The relationship is Volume per animal = Dose × Body weight ÷ 1000 ÷ Stock concentration × 1000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Dose (mg/kg), Body weight (g), Number of animals, Stock concentration (mg/mL), Maximum volume per dose (mL/kg). Fill dose, weight and animals and leave Volume per animal empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Volume per animal, Dose volume per kg, Compound for the cohort and Minimum stock concentration blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Volume per animal = 50 µL, Dose volume per kg = 2 mL/kg, Compound for the cohort = 2.5 mg, Minimum stock concentration = 1 mg/mL and Dilution factor to that stock = 5 ×. The figures come from Dose as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Volume per animal is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Dose left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Volume per animal keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/chi-square-genetics-test', 'name' => 'Chi-Square Test for Genetics Calculator'],
            ['path' => '/biology/chicken-density', 'name' => 'Chicken Density Calculator'],
            ['path' => '/biology/chicken-feed-amount', 'name' => 'Chicken Feed Amount Calculator'],
        ],
        'authors' => [],
    ],
];

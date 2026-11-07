<?php

/**
 * Sulfur Soil Acidifier Calculator
 * /biology/sulfur-soil-acidifier
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sulfur Soil Acidifier Calculator',
    'meta' => ['title' => 'Sulfur Soil Acidifier Calculator — Formula & Results', 'description' => 'Sulfur Soil Acidifier turns Area, Current pH and Target pH into Elemental sulfur and Sulfur per 100 m². There is no hidden constant here: change Elemental…', 'h1' => 'Sulfur Soil Acidifier Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Area',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'ph_now',
                            'label' => 'Current pH',
                            'type' => 'number',
                            'suffix' => 'pH',
                            'help' => 'From a soil test',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7.5',
                        ],
                        [
                            'name' => 'ph_target',
                            'label' => 'Target pH',
                            'type' => 'number',
                            'suffix' => 'pH',
                            'help' => 'Blueberries want 4.5–5.5, most vegetables 6–7',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6.5',
                        ],
                        [
                            'name' => 'texture',
                            'label' => 'Soil texture',
                            'type' => 'select',
                            'options' => ['Sand' => '0.5', 'Loam' => '1', 'Clay' => '1.5'],
                            'help' => 'Multiplier on the base rate',
                            'default' => 'Loam',
                        ],
                        [
                            'name' => 'sulfur_kg',
                            'label' => 'Elemental sulfur',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'sulfur_kg_100',
                            'label' => 'Sulfur per 100 m²',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'sulfur_lb_1000',
                            'label' => 'Sulfur per 1 000 ft²',
                            'type' => 'number',
                            'suffix' => 'lb',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'months',
                            'label' => 'Time to take effect',
                            'type' => 'number',
                            'suffix' => 'months',
                            'help' => 'Sulfur needs warm, moist soil to oxidise',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ph_drop',
                            'label' => 'pH change',
                            'type' => 'number',
                            'suffix' => 'units',
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
            'title' => 'Sulfur',
            'results' => [
                'ph_drop' => 'ph_now-ph_target',
                'sulfur_kg' => 'area*(ph_now-ph_target)*texture*0.2',
                'sulfur_kg_100' => '(ph_now-ph_target)*texture*0.2*100',
                'sulfur_lb_1000' => '(ph_now-ph_target)*texture*0.2*9.29*10.7639/10',
                'months' => '(ph_now-ph_target)*texture*3',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Sulfur Soil Acidifier turns Area, Current pH and Target pH into Elemental sulfur and Sulfur per 100 m². There is no hidden constant here: change Elemental sulfur and Area moves with it. The main result, Elemental sulfur, is reported in kg.
        TXT,
        'sections' => [
            ['title' => 'How the Sulfur Soil Acidifier calculator works', 'html' => <<<'TXT'
            <p>The Sulfur Soil Acidifier calculator applies one relationship to 4 numbers and reports Elemental sulfur, Sulfur per 100 m² and Sulfur per 1 000 ft².</p><p>The relationship it solves reads pH change = Current pH − Target pH.</p><p>What comes back is Elemental sulfur, Sulfur per 100 m², Sulfur per 1 000 ft² and Time to take effect — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Area</strong> — in m²</li><li><strong>Current pH</strong> — in pH. From a soil test</li><li><strong>Target pH</strong> — in pH. Blueberries want 4.5–5.5, most vegetables 6–7</li><li><strong>Soil texture</strong> — a plain number, no unit. Multiplier on the base rate</li></ul><p>The answers come back as Elemental sulfur in kg, Sulfur per 100 m² in kg, Sulfur per 1 000 ft² in lb, Time to take effect in months, pH change in units. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Area = 100 m², Current pH = 7.5 pH, Target pH = 6.5 pH and Soil texture = 1 — through the same formula and the panel reports &lt;strong&gt;pH change&lt;/strong&gt; = 1 units, &lt;strong&gt;Elemental sulfur&lt;/strong&gt; = 20 kg, &lt;strong&gt;Sulfur per 100 m²&lt;/strong&gt; = 20 kg, &lt;strong&gt;Sulfur per 1 000 ft²&lt;/strong&gt; = 2 lb and &lt;strong&gt;Time to take effect&lt;/strong&gt; = 3 months.</p><ul><li><strong>pH change</strong> = 1 units</li><li><strong>Elemental sulfur</strong> = 20 kg</li><li><strong>Sulfur per 100 m²</strong> = 20 kg</li><li><strong>Sulfur per 1 000 ft²</strong> = 2 lb</li><li><strong>Time to take effect</strong> = 3 months</li></ul><p>The line behind those figures is <strong>pH change</strong> = <code>Current pH − Target pH</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;pH change&lt;/strong&gt; = 1, &lt;strong&gt;Elemental sulfur&lt;/strong&gt; = 20, &lt;strong&gt;Sulfur per 100 m²&lt;/strong&gt; = 20, &lt;strong&gt;Sulfur per 1 000 ft²&lt;/strong&gt; = 2 and &lt;strong&gt;Time to take effect&lt;/strong&gt; = 3 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Elemental sulfur takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>pH change</strong> = <code>Current pH − Target pH</code></li><li><strong>Elemental sulfur</strong> = <code>Area × (Current pH − Target pH) × Soil texture × 0.2</code></li><li><strong>Sulfur per 100 m²</strong> = <code>(Current pH − Target pH) × Soil texture × 0.2 × 100</code></li><li><strong>Sulfur per 1 000 ft²</strong> = <code>(Current pH − Target pH) × Soil texture × 0.2 × 9.29 × 10.7639 ÷ 10</code></li><li><strong>Time to take effect</strong> = <code>(Current pH − Target pH) × Soil texture × 3</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of pH change, Elemental sulfur and Sulfur per 100 m² can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Area from 100 to 200, leaving every other box alone. The panel moves from &lt;strong&gt;pH change&lt;/strong&gt; 1 units, &lt;strong&gt;Elemental sulfur&lt;/strong&gt; 20 kg, &lt;strong&gt;Sulfur per 100 m²&lt;/strong&gt; 20 kg, &lt;strong&gt;Sulfur per 1 000 ft²&lt;/strong&gt; 2 lb and &lt;strong&gt;Time to take effect&lt;/strong&gt; 3 months to &lt;strong&gt;pH change&lt;/strong&gt; 1 units, &lt;strong&gt;Elemental sulfur&lt;/strong&gt; 40 kg, &lt;strong&gt;Sulfur per 100 m²&lt;/strong&gt; 20 kg, &lt;strong&gt;Sulfur per 1 000 ft²&lt;/strong&gt; 2 lb and &lt;strong&gt;Time to take effect&lt;/strong&gt; 3 months.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Elemental sulfur, Sulfur per 100 m² and Sulfur per 1 000 ft² are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Area to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Area, Current pH and Target pH is what you already know and Elemental sulfur and Sulfur per 100 m² is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/guinea-pig-pregnancy">Guinea pig pregnancy</a>, <a href="/biology/guinea-pig-age">Guinea pig years to human years</a> and <a href="/biology/gypsum-application-rate">Gypsum Application Rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sulfur Soil Acidifier calculator work out?', 'a' => <<<'TXT'
            Elemental sulfur, Sulfur per 100 m², Sulfur per 1 000 ft² and Time to take effect, from Current pH and Target pH. The relationship is pH change = Current pH − Target pH.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Area (m²), Current pH (pH), Target pH (pH), Soil texture. Fill area, ph_now and ph_target and leave Elemental sulfur empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. pH change, Elemental sulfur, Sulfur per 100 m² and Sulfur per 1 000 ft² can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            pH change = 1 units, Elemental sulfur = 20 kg, Sulfur per 100 m² = 20 kg, Sulfur per 1 000 ft² = 2 lb and Time to take effect = 3 months. The figures come from Area as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Elemental sulfur is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Area blank and the page solves for it, reporting Elemental sulfur instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Elemental sulfur keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/guinea-pig-pregnancy', 'name' => 'Guinea pig pregnancy'],
            ['path' => '/biology/guinea-pig-age', 'name' => 'Guinea pig years to human years'],
            ['path' => '/biology/gypsum-application-rate', 'name' => 'Gypsum Application Rate Calculator'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * Compost Application Rate Calculator
 * /biology/compost-application-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Compost Application Rate Calculator',
    'meta' => ['title' => 'Compost Application Rate Calculator — Biology', 'description' => 'Compost Application Rate takes Area, Depth and Bulk density of the compost and returns Volume and Volume. 5–10 cm for a new bed, 1 cm for a lawn…', 'h1' => 'Compost Application Rate Calculator', 'updated' => '2026-10-29'],
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
                            'name' => 'depth_cm',
                            'label' => 'Depth',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => '5–10 cm for a new bed, 1 cm for a lawn top-dressing',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Bulk density of the compost',
                            'type' => 'number',
                            'suffix' => 't/m³',
                            'help' => '0.4 for strawy compost, 0.7 for a wet, heavy one',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.55',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Volume',
                            'type' => 'number',
                            'suffix' => 'm³',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cubic_yards',
                            'label' => 'Volume',
                            'type' => 'number',
                            'suffix' => 'yd³',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tonnes',
                            'label' => 'Mass',
                            'type' => 'number',
                            'suffix' => 't',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_ha',
                            'label' => 'Rate',
                            'type' => 'number',
                            'suffix' => 't/ha',
                            'help' => 'Compare with 5–20 t/ha for field maintenance',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cost',
                            'label' => 'Cost at 40 per tonne',
                            'type' => 'number',
                            'help' => 'Optional sanity check',
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
            'title' => 'Volume',
            'results' => [
                'volume' => 'area*depth_cm/100',
                'cubic_yards' => 'area*depth_cm/100*1.30795',
                'tonnes' => 'area*depth_cm/100*density',
                'per_ha' => 'area*depth_cm/100*density/area*10000',
                'cost' => 'area*depth_cm/100*density*40',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Compost Application Rate takes Area, Depth and Bulk density of the compost and returns Volume and Volume. There is no hidden constant here: change Volume and Area moves with it. The main result, Volume, is reported in m³.
        TXT,
        'sections' => [
            ['title' => 'How the Compost Application Rate calculator works', 'html' => <<<'TXT'
            <p>The Compost Application Rate calculator applies one relationship to 3 numbers and reports Volume, Volume and Mass.</p><p>Written with the labels from the form, Volume = Area × Depth ÷ 100.</p><p>The result panel carries Volume, Volume, Mass and Rate, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Area</strong> — in m²</li><li><strong>Depth</strong> — in cm. 5–10 cm for a new bed, 1 cm for a lawn top-dressing</li><li><strong>Bulk density of the compost</strong> — in t/m³. 0.4 for strawy compost, 0.7 for a wet, heavy one</li></ul><p>The answers come back as Volume in m³, Volume in yd³, Mass in t, Rate in t/ha, Cost at 40 per tonne. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Area = 100 m², Depth = 5 cm and Bulk density of the compost = 0.55 t/m³ gives &lt;strong&gt;Volume&lt;/strong&gt; = 5 m³, &lt;strong&gt;Volume&lt;/strong&gt; = 6.54 yd³, &lt;strong&gt;Mass&lt;/strong&gt; = 2.75 t, &lt;strong&gt;Rate&lt;/strong&gt; = 275 t/ha and &lt;strong&gt;Cost at 40 per tonne&lt;/strong&gt; = 110.</p><ul><li><strong>Volume</strong> = 5 m³</li><li><strong>Volume</strong> = 6.54 yd³</li><li><strong>Mass</strong> = 2.75 t</li><li><strong>Rate</strong> = 275 t/ha</li><li><strong>Cost at 40 per tonne</strong> = 110</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Volume</strong> = <code>Area × Depth ÷ 100</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Volume&lt;/strong&gt; = 5, &lt;strong&gt;Volume&lt;/strong&gt; = 6.54, &lt;strong&gt;Mass&lt;/strong&gt; = 2.75, &lt;strong&gt;Rate&lt;/strong&gt; = 275 and &lt;strong&gt;Cost at 40 per tonne&lt;/strong&gt; = 110 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Volume takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Volume</strong> = <code>Area × Depth ÷ 100</code></li><li><strong>Mass</strong> = <code>Area × Depth ÷ 100 × Bulk density of the compost</code></li><li><strong>Rate</strong> = <code>Area × Depth ÷ 100 × Bulk density of the compost ÷ Area × 10000</code></li><li><strong>Cost at 40 per tonne</strong> = <code>Area × Depth ÷ 100 × Bulk density of the compost × 40</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Volume, Volume and Mass can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Area from 100 to 200, leaving every other box alone. The panel moves from &lt;strong&gt;Volume&lt;/strong&gt; 5 m³, &lt;strong&gt;Volume&lt;/strong&gt; 6.54 yd³, &lt;strong&gt;Mass&lt;/strong&gt; 2.75 t, &lt;strong&gt;Rate&lt;/strong&gt; 275 t/ha and &lt;strong&gt;Cost at 40 per tonne&lt;/strong&gt; 110 to &lt;strong&gt;Volume&lt;/strong&gt; 10 m³, &lt;strong&gt;Volume&lt;/strong&gt; 13.08 yd³, &lt;strong&gt;Mass&lt;/strong&gt; 5.5 t, &lt;strong&gt;Rate&lt;/strong&gt; 275 t/ha and &lt;strong&gt;Cost at 40 per tonne&lt;/strong&gt; 220.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Volume, Volume and Mass are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Area to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Area, Depth and Bulk density of the compost measured, Volume and Volume wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/cat-quality-of-life">Cat quality of life Calculator</a>, <a href="/biology/catch-per-unit-effort">Catch Per Unit Effort Calculator</a> and <a href="/biology/catculator">Catculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Compost Application Rate calculator work out?', 'a' => 'Volume, Volume, Mass and Rate, from Area and Depth. The relationship is Volume = Area × Depth ÷ 100.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Area (m²), Depth (cm), Bulk density of the compost (t/m³). Fill area, depth_cm and density and leave Volume empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Volume, Volume, Mass and Rate can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Volume = 5 m³, Volume = 6.54 yd³, Mass = 2.75 t, Rate = 275 t/ha and Cost at 40 per tonne = 110. The figures come from Area as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Volume is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Area blank and the page solves for it, reporting Volume instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Volume keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/cat-quality-of-life', 'name' => 'Cat quality of life Calculator'],
            ['path' => '/biology/catch-per-unit-effort', 'name' => 'Catch Per Unit Effort Calculator'],
            ['path' => '/biology/catculator', 'name' => 'Catculator'],
        ],
        'authors' => [],
    ],
];

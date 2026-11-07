<?php

/**
 * Crop Coefficient Calculator
 * /biology/crop-coefficient
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Crop Coefficient Calculator',
    'meta' => ['title' => 'Crop Coefficient Calculator — Formula & Results', 'description' => 'The crop coefficient converts the reference evapotranspiration of a well-watered grass crop into what your crop actually uses: ETc = Kc × ETo. Free crop coeff', 'h1' => 'Crop Coefficient Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'eto',
                            'label' => 'Reference evapotranspiration',
                            'type' => 'number',
                            'suffix' => 'mm/day',
                            'help' => 'From a weather station or a local network — the daily reference for grass',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'kc',
                            'label' => 'Crop coefficient',
                            'type' => 'number',
                            'help' => '0.3 at establishment, 1.0–1.2 mid-season',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.05',
                        ],
                        [
                            'name' => 'etc',
                            'label' => 'Crop water use',
                            'type' => 'number',
                            'suffix' => 'mm/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'litres_m2',
                            'label' => 'Crop water use',
                            'type' => 'number',
                            'suffix' => 'L/m²/day',
                            'help' => '1 mm on 1 m² is 1 litre',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'litres_ha',
                            'label' => 'Water per hectare',
                            'type' => 'number',
                            'suffix' => 'm³/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rain',
                            'label' => 'Effective rainfall',
                            'type' => 'number',
                            'suffix' => 'mm/day',
                            'help' => 'Leave at 0 if none',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'irrigation',
                            'label' => 'Irrigation needed',
                            'type' => 'number',
                            'suffix' => 'mm/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'weekly',
                            'label' => 'Irrigation per week',
                            'type' => 'number',
                            'suffix' => 'mm',
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
            'title' => 'Water use',
            'results' => [
                'etc' => 'eto*kc',
                'litres_m2' => 'eto*kc',
                'litres_ha' => 'eto*kc*10',
                'irrigation' => 'eto*kc-rain',
                'weekly' => '(eto*kc-rain)*7',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Crop Coefficient takes Reference evapotranspiration, Crop coefficient and Effective rainfall and returns Crop water use and Crop water use. There is no hidden constant here: change Crop water use and Reference evapotranspiration moves with it. The main result, Crop water use, is reported in mm/day.
        TXT,
        'sections' => [
            ['title' => 'How the Crop Coefficient calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Crop Coefficient: it takes 3 numbers and reports Crop water use, Crop water use and Water per hectare.</p><p>The relationship it solves reads Crop water use = Reference evapotranspiration × Crop coefficient.</p><p>The answers are Crop water use, Crop water use, Water per hectare and Irrigation needed; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Reference evapotranspiration</strong> — in mm/day. From a weather station or a local network — the daily reference for grass</li><li><strong>Crop coefficient</strong> — a plain number, no unit. 0.3 at establishment, 1.0–1.2 mid-season</li><li><strong>Effective rainfall</strong> — in mm/day. Leave at 0 if none</li></ul><p>The answers come back as Crop water use in mm/day, Crop water use in L/m²/day, Water per hectare in m³/day, Irrigation needed in mm/day, Irrigation per week in mm. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Reference evapotranspiration = 5 mm/day, Crop coefficient = 1.05 and Effective rainfall = 5 mm/day gives &lt;strong&gt;Crop water use&lt;/strong&gt; = 5.25 mm/day, &lt;strong&gt;Crop water use&lt;/strong&gt; = 5.25 L/m²/day, &lt;strong&gt;Water per hectare&lt;/strong&gt; = 52.5 m³/day, &lt;strong&gt;Irrigation needed&lt;/strong&gt; = 0.25 mm/day and &lt;strong&gt;Irrigation per week&lt;/strong&gt; = 1.75 mm.</p><ul><li><strong>Crop water use</strong> = 5.25 mm/day</li><li><strong>Crop water use</strong> = 5.25 L/m²/day</li><li><strong>Water per hectare</strong> = 52.5 m³/day</li><li><strong>Irrigation needed</strong> = 0.25 mm/day</li><li><strong>Irrigation per week</strong> = 1.75 mm</li></ul><p>That is <strong>Crop water use</strong> = <code>Reference evapotranspiration × Crop coefficient</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Crop water use&lt;/strong&gt; = 5.25, &lt;strong&gt;Crop water use&lt;/strong&gt; = 5.25, &lt;strong&gt;Water per hectare&lt;/strong&gt; = 52.5, &lt;strong&gt;Irrigation needed&lt;/strong&gt; = 0.25 and &lt;strong&gt;Irrigation per week&lt;/strong&gt; = 1.75 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Crop water use takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Crop water use</strong> = <code>Reference evapotranspiration × Crop coefficient</code></li><li><strong>Water per hectare</strong> = <code>Reference evapotranspiration × Crop coefficient × 10</code></li><li><strong>Irrigation needed</strong> = <code>Reference evapotranspiration × Crop coefficient − Effective rainfall</code></li><li><strong>Irrigation per week</strong> = <code>(Reference evapotranspiration × Crop coefficient − Effective rainfall) × 7</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Crop water use, Crop water use and Water per hectare can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Reference evapotranspiration from 5 to 10, leaving every other box alone. The panel moves from &lt;strong&gt;Crop water use&lt;/strong&gt; 5.25 mm/day, &lt;strong&gt;Crop water use&lt;/strong&gt; 5.25 L/m²/day, &lt;strong&gt;Water per hectare&lt;/strong&gt; 52.5 m³/day, &lt;strong&gt;Irrigation needed&lt;/strong&gt; 0.25 mm/day and &lt;strong&gt;Irrigation per week&lt;/strong&gt; 1.75 mm to &lt;strong&gt;Crop water use&lt;/strong&gt; 10.5 mm/day, &lt;strong&gt;Crop water use&lt;/strong&gt; 10.5 L/m²/day, &lt;strong&gt;Water per hectare&lt;/strong&gt; 105 m³/day, &lt;strong&gt;Irrigation needed&lt;/strong&gt; 5.5 mm/day and &lt;strong&gt;Irrigation per week&lt;/strong&gt; 38.5 mm.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Crop water use, Crop water use and Water per hectare are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Reference evapotranspiration is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Reference evapotranspiration, Crop coefficient and Effective rainfall is what you already know and Crop water use and Crop water use is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/species-richness">Species Richness Calculator</a>, <a href="/biology/specific-growth-rate-od">Specific Growth Rate from OD Calculator</a> and <a href="/biology/specific-growth-rate-from-od">Specific Growth Rate from OD Readings Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Crop Coefficient calculator work out?', 'a' => <<<'TXT'
            Crop water use, Crop water use, Water per hectare and Irrigation needed, from Reference evapotranspiration and Crop coefficient. The relationship is Crop water use = Reference evapotranspiration × Crop coefficient.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Reference evapotranspiration (mm/day), Crop coefficient, Effective rainfall (mm/day). With eto, kc and rain in place, Crop water use can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Crop water use, Crop water use, Water per hectare and Irrigation needed can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Crop water use = 5.25 mm/day, Crop water use = 5.25 L/m²/day, Water per hectare = 52.5 m³/day, Irrigation needed = 0.25 mm/day and Irrigation per week = 1.75 mm. That comes from the page's own defaults, entered in Reference evapotranspiration; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Crop water use is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Reference evapotranspiration left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Crop water use keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/species-richness', 'name' => 'Species Richness Calculator'],
            ['path' => '/biology/specific-growth-rate-od', 'name' => 'Specific Growth Rate from OD Calculator'],
            ['path' => '/biology/specific-growth-rate-from-od', 'name' => 'Specific Growth Rate from OD Readings Calculator'],
        ],
        'authors' => [],
    ],
];

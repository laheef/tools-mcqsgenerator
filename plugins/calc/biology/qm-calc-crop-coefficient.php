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
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Reference evapotranspiration</strong> — in mm/day. From a weather station or a local network — the daily reference for grass</li><li><strong>Crop coefficient</strong> — a plain number, no unit. 0.3 at establishment, 1.0–1.2 mid-season</li><li><strong>Effective rainfall</strong> — in mm/day. Leave at 0 if none</li></ul><p>The answers come back as Crop water use in mm/day, Crop water use in L/m²/day, Water per hectare in m³/day, Irrigation needed in mm/day, Irrigation per week in mm. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Reference evapotranspiration = 5 mm/day, Crop coefficient = 1.05 and Effective rainfall = 5 mm/day gives &lt;strong&gt;Crop water use&lt;/strong&gt; = 5.25 mm/day, &lt;strong&gt;Crop water use&lt;/strong&gt; = 5.25 L/m²/day, &lt;strong&gt;Water per hectare&lt;/strong&gt; = 52.5 m³/day, &lt;strong&gt;Irrigation needed&lt;/strong&gt; = 0.25 mm/day and &lt;strong&gt;Irrigation per week&lt;/strong&gt; = 1.75 mm.</p><ul><li><strong>Crop water use</strong> = 5.25 mm/day</li><li><strong>Crop water use</strong> = 5.25 L/m²/day</li><li><strong>Water per hectare</strong> = 52.5 m³/day</li><li><strong>Irrigation needed</strong> = 0.25 mm/day</li><li><strong>Irrigation per week</strong> = 1.75 mm</li></ul><p>That is <strong>Crop water use</strong> = <code>Reference evapotranspiration × Crop coefficient</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Crop water use&lt;/strong&gt; = 5.25, &lt;strong&gt;Crop water use&lt;/strong&gt; = 5.25, &lt;strong&gt;Water per hectare&lt;/strong&gt; = 52.5, &lt;strong&gt;Irrigation needed&lt;/strong&gt; = 0.25 and &lt;strong&gt;Irrigation per week&lt;/strong&gt; = 1.75 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Crop water use takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Crop water use</strong> = <code>Reference evapotranspiration × Crop coefficient</code></li><li><strong>Water per hectare</strong> = <code>Reference evapotranspiration × Crop coefficient × 10</code></li><li><strong>Irrigation needed</strong> = <code>Reference evapotranspiration × Crop coefficient − Effective rainfall</code></li><li><strong>Irrigation per week</strong> = <code>(Reference evapotranspiration × Crop coefficient − Effective rainfall) × 7</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Crop water use</strong> = <code>Reference evapotranspiration × Crop coefficient</code> — the form to use when Reference evapotranspiration and Crop coefficient are the values you have.</li><li><strong>Crop water use</strong> = <code>Reference evapotranspiration × Crop coefficient</code> — the form to use when Reference evapotranspiration and Crop coefficient are the values you have.</li><li><strong>Water per hectare</strong> = <code>Reference evapotranspiration × Crop coefficient × 10</code> — the form to use when Reference evapotranspiration and Crop coefficient are the values you have.</li><li><strong>Irrigation needed</strong> = <code>Reference evapotranspiration × Crop coefficient − Effective rainfall</code> — the form to use when Reference evapotranspiration, Crop coefficient and Effective rainfall are the values you have.</li><li><strong>Irrigation per week</strong> = <code>(Reference evapotranspiration × Crop coefficient − Effective rainfall) × 7</code> — the form to use when Reference evapotranspiration, Crop coefficient and Effective rainfall are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Crop water use, Crop water use and Water per hectare can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Reference evapotranspiration from 5 to 10, leaving every other box alone. The panel moves from &lt;strong&gt;Crop water use&lt;/strong&gt; 5.25 mm/day, &lt;strong&gt;Crop water use&lt;/strong&gt; 5.25 L/m²/day, &lt;strong&gt;Water per hectare&lt;/strong&gt; 52.5 m³/day, &lt;strong&gt;Irrigation needed&lt;/strong&gt; 0.25 mm/day and &lt;strong&gt;Irrigation per week&lt;/strong&gt; 1.75 mm to &lt;strong&gt;Crop water use&lt;/strong&gt; 10.5 mm/day, &lt;strong&gt;Crop water use&lt;/strong&gt; 10.5 L/m²/day, &lt;strong&gt;Water per hectare&lt;/strong&gt; 105 m³/day, &lt;strong&gt;Irrigation needed&lt;/strong&gt; 5.5 mm/day and &lt;strong&gt;Irrigation per week&lt;/strong&gt; 38.5 mm.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Crop water use, Crop water use and Water per hectare are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Reference evapotranspiration left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Reference evapotranspiration is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Crop coefficient left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Crop coefficient is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Effective rainfall left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Effective rainfall is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Reference evapotranspiration is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Reference evapotranspiration</strong> is measured in mm/day. From a weather station or a local network — the daily reference for grass. Change it and Crop water use, Crop water use and Water per hectare changes with it. Have it to hand before you start: Reference evapotranspiration is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Crop coefficient</strong> takes a plain number with no unit attached. 0.3 at establishment, 1.0–1.2 mid-season. Change it and Crop water use, Crop water use and Water per hectare changes with it. Have it to hand before you start: Crop coefficient is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Effective rainfall</strong> is measured in mm/day. Leave at 0 if none. Change it and Irrigation needed and Irrigation per week changes with it. Have it to hand before you start: Effective rainfall is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Crop water use</strong> is a plain number and the page's own defaults put it at 5.25. It is worked out from Reference evapotranspiration and Crop coefficient. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Crop water use</strong> is a plain number and the page's own defaults put it at 5.25. It is worked out from Reference evapotranspiration and Crop coefficient. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Water per hectare</strong> is a plain number and the page's own defaults put it at 52.5. It is worked out from Reference evapotranspiration and Crop coefficient. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Irrigation needed</strong> is a plain number and the page's own defaults put it at 0.25. It is worked out from Reference evapotranspiration, Crop coefficient and Effective rainfall. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Irrigation per week</strong> is a plain number and the page's own defaults put it at 1.75. It is worked out from Reference evapotranspiration, Crop coefficient and Effective rainfall. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Crop water use</th><th>Crop water use</th><th>Water per hectare</th><th>Irrigation needed</th><th>Irrigation per week</th></tr></thead><tbody><tr><td><strong>Reference evapotranspiration</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+210%</td><td>+210%</td></tr><tr><td><strong>Crop coefficient</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+210%</td><td>+210%</td></tr><tr><td><strong>Effective rainfall</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>-200%</td><td>-200%</td></tr></tbody></table><p>Ranked by leverage, Crop coefficient sits at the top — a ten per cent error in that box shows up as roughly 210 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Crop water use follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
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

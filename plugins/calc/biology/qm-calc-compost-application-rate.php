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
    'meta' => ['title' => 'Compost Application Rate Calculator — Biology', 'description' => 'Compost Application Rate Calculator reports volume, mass and cost at 40 per tonne. Both volume and mass come back, with the working shown beside them.', 'h1' => 'Compost Application Rate Calculator', 'updated' => '2026-10-29'],
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
        Compost Application Rate takes Area, Depth and Bulk density of the compost and returns Volume and Volume. There is no hidden constant here: change volume and area moves with it. The main result, Volume, is reported in m³.
        TXT,
        'sections' => [
            ['title' => 'How the Compost Application Rate calculator works', 'html' => <<<'TXT'
            <p>The Compost Application Rate calculator applies one relationship to 3 numbers and reports Volume, Volume and Mass.</p><p>Written with the labels from the form, Volume = Area × Depth ÷ 100.</p><p>The result panel carries Volume, Volume, Mass and Rate, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Area</strong> — in m²</li><li><strong>Depth</strong> — in cm. 5–10 cm for a new bed, 1 cm for a lawn top-dressing</li><li><strong>Bulk density of the compost</strong> — in t/m³. 0.4 for strawy compost, 0.7 for a wet, heavy one</li></ul><p>The answers come back as Volume in m³, Volume in yd³, Mass in t, Rate in t/ha, Cost at 40 per tonne. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Area = 100 m², Depth = 5 cm and Bulk density of the compost = 0.55 t/m³ gives <strong>Volume</strong> = 5 m³, <strong>Volume</strong> = 6.54 yd³, <strong>Mass</strong> = 2.75 t, <strong>Rate</strong> = 275 t/ha and <strong>Cost at 40 per tonne</strong> = 110.</p><ul><li><strong>Volume</strong> = 5 m³</li><li><strong>Volume</strong> = 6.54 yd³</li><li><strong>Mass</strong> = 2.75 t</li><li><strong>Rate</strong> = 275 t/ha</li><li><strong>Cost at 40 per tonne</strong> = 110</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Volume</strong> = <code>Area × Depth ÷ 100</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Volume</strong> = 5, <strong>Volume</strong> = 6.54, <strong>Mass</strong> = 2.75, <strong>Rate</strong> = 275 and <strong>Cost at 40 per tonne</strong> = 110 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Volume takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Volume</strong> = <code>Area × Depth ÷ 100</code></li><li><strong>Mass</strong> = <code>Area × Depth ÷ 100 × Bulk density of the compost</code></li><li><strong>Rate</strong> = <code>Area × Depth ÷ 100 × Bulk density of the compost ÷ Area × 10000</code></li><li><strong>Cost at 40 per tonne</strong> = <code>Area × Depth ÷ 100 × Bulk density of the compost × 40</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Volume</strong> = <code>Area × Depth ÷ 100</code> — the form to use when Area and Depth are the values you have.</li><li><strong>Volume</strong> = <code>Area × Depth ÷ 100 × 1.308</code> — the form to use when Area and Depth are the values you have.</li><li><strong>Mass</strong> = <code>Area × Depth ÷ 100 × Bulk density of the compost</code> — the form to use when Area, Depth and Bulk density of the compost are the values you have.</li><li><strong>Rate</strong> = <code>Area × Depth ÷ 100 × Bulk density of the compost ÷ Area × 10000</code> — the form to use when Area, Depth and Bulk density of the compost are the values you have.</li><li><strong>Cost at 40 per tonne</strong> = <code>Area × Depth ÷ 100 × Bulk density of the compost × 40</code> — the form to use when Area, Depth and Bulk density of the compost are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Volume, Volume and Mass can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Area from 100 to 200, leaving every other box alone. The panel moves from <strong>Volume</strong> 5 m³, <strong>Volume</strong> 6.54 yd³, <strong>Mass</strong> 2.75 t, <strong>Rate</strong> 275 t/ha and <strong>Cost at 40 per tonne</strong> 110 to <strong>Volume</strong> 10 m³, <strong>Volume</strong> 13.08 yd³, <strong>Mass</strong> 5.5 t, <strong>Rate</strong> 275 t/ha and <strong>Cost at 40 per tonne</strong> 220.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Volume, Volume and Mass are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Area left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Area is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Depth left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Depth is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Bulk density of the compost left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Bulk density of the compost is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Area to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Compost Application Rate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Area</strong> is measured in m². It feeds Volume, Volume and Mass. Fill it from a measurement rather than a memory — Area is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Depth</strong> is measured in cm. 5–10 cm for a new bed, 1 cm for a lawn top-dressing. It feeds Volume, Volume and Mass. Fill it from a measurement rather than a memory — Depth is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Bulk density of the compost</strong> is measured in t/m³. 0.4 for strawy compost, 0.7 for a wet, heavy one. It feeds Mass, Rate and Cost at 40 per tonne. Fill it from a measurement rather than a memory — Bulk density of the compost is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Volume</strong> is a plain number and the page's own defaults put it at 5. It is worked out from Area and Depth. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Volume</strong> is a plain number and the page's own defaults put it at 6.54. It is worked out from Area and Depth. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Mass</strong> is a plain number and the page's own defaults put it at 2.75. It is worked out from Area, Depth and Bulk density of the compost. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Rate</strong> is a plain number and the page's own defaults put it at 275. It is worked out from Area, Depth and Bulk density of the compost. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Cost at 40 per tonne</strong> is a plain number and the page's own defaults put it at 110. It is worked out from Area, Depth and Bulk density of the compost. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Volume</th><th>Volume</th><th>Mass</th><th>Rate</th><th>Cost at 40 per tonne</th></tr></thead><tbody><tr><td><strong>Area</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Depth</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Bulk density of the compost</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Area sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Area = 50 m², Depth = 2.5 cm and Bulk density of the compost = 0.275 t/m³ and the page reports <strong>Volume</strong> = 1.25 m³, <strong>Volume</strong> = 1.63 yd³, <strong>Mass</strong> = 0.344 t, <strong>Rate</strong> = 68.75 t/ha and <strong>Cost at 40 per tonne</strong> = 13.75.</li><li>Feed in Area = 300 m², Depth = 5 cm and Bulk density of the compost = 0.55 t/m³ and the page reports <strong>Volume</strong> = 15 m³, <strong>Volume</strong> = 19.62 yd³, <strong>Mass</strong> = 8.25 t, <strong>Rate</strong> = 275 t/ha and <strong>Cost at 40 per tonne</strong> = 330.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Volume follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Area, Depth and Bulk density of the compost measured, Volume and Volume wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/cat-quality-of-life">Cat quality of life Calculator</a>, <a href="/biology/catch-per-unit-effort">Catch Per Unit Effort Calculator</a> and <a href="/biology/catculator">Catculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Compost Application Rate calculator work out?', 'a' => 'Volume, Volume, Mass and Rate, from Area and Depth. The relationship is Volume = Area × Depth ÷ 100.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Area (m²), Depth (cm), Bulk density of the compost (t/m³). Fill area, depth and bulk density of the compost and leave Volume empty if you would rather have that one solved instead.
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

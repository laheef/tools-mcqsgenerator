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
    'meta' => ['title' => 'Sulfur Soil Acidifier Calculator: Steps & Units', 'description' => 'Sulfur Soil Acidifier Calculator reports elemental sulfur and sulfur per 100 m². Enter area and current pH; the answer follows without a table lookup.', 'h1' => 'Sulfur Soil Acidifier Calculator', 'updated' => '2026-10-29'],
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
        Sulfur Soil Acidifier turns Area, Current pH and Target pH into Elemental sulfur and Sulfur per 100 m². There is no hidden constant here: change elemental sulfur and area moves with it. The main result, Elemental sulfur, is reported in kg.
        TXT,
        'sections' => [
            ['title' => 'How the Sulfur Soil Acidifier calculator works', 'html' => <<<'TXT'
            <p>The Sulfur Soil Acidifier calculator applies one relationship to 4 numbers and reports Elemental sulfur, Sulfur per 100 m² and Sulfur per 1 000 ft².</p><p>The relationship it solves reads pH change = Current pH − Target pH.</p><p>What comes back is Elemental sulfur, Sulfur per 100 m², Sulfur per 1 000 ft² and Time to take effect — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Area</strong> — in m²</li><li><strong>Current pH</strong> — in pH. From a soil test</li><li><strong>Target pH</strong> — in pH. Blueberries want 4.5–5.5, most vegetables 6–7</li><li><strong>Soil texture</strong> — a plain number, no unit. Multiplier on the base rate</li></ul><p>The answers come back as Elemental sulfur in kg, Sulfur per 100 m² in kg, Sulfur per 1 000 ft² in lb, Time to take effect in months, pH change in units. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Area = 100 m², Current pH = 7.5 pH, Target pH = 6.5 pH and Soil texture = 1 — through the same formula and the panel reports <strong>pH change</strong> = 1 units, <strong>Elemental sulfur</strong> = 20 kg, <strong>Sulfur per 100 m²</strong> = 20 kg, <strong>Sulfur per 1 000 ft²</strong> = 2 lb and <strong>Time to take effect</strong> = 3 months.</p><ul><li><strong>pH change</strong> = 1 units</li><li><strong>Elemental sulfur</strong> = 20 kg</li><li><strong>Sulfur per 100 m²</strong> = 20 kg</li><li><strong>Sulfur per 1 000 ft²</strong> = 2 lb</li><li><strong>Time to take effect</strong> = 3 months</li></ul><p>The line behind those figures is <strong>pH change</strong> = <code>Current pH − Target pH</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>pH change</strong> = 1, <strong>Elemental sulfur</strong> = 20, <strong>Sulfur per 100 m²</strong> = 20, <strong>Sulfur per 1 000 ft²</strong> = 2 and <strong>Time to take effect</strong> = 3 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Elemental sulfur takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>pH change</strong> = <code>Current pH − Target pH</code></li><li><strong>Elemental sulfur</strong> = <code>Area × (Current pH − Target pH) × Soil texture × 0.2</code></li><li><strong>Sulfur per 100 m²</strong> = <code>(Current pH − Target pH) × Soil texture × 0.2 × 100</code></li><li><strong>Sulfur per 1 000 ft²</strong> = <code>(Current pH − Target pH) × Soil texture × 0.2 × 9.29 × 10.7639 ÷ 10</code></li><li><strong>Time to take effect</strong> = <code>(Current pH − Target pH) × Soil texture × 3</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>pH change</strong> = <code>Current pH − Target pH</code> — the form to use when Current pH and Target pH are the values you have.</li><li><strong>Elemental sulfur</strong> = <code>Area × (Current pH − Target pH) × Soil texture × 0.2</code> — the form to use when Area, Current pH, Target pH and Soil texture are the values you have.</li><li><strong>Sulfur per 100 m²</strong> = <code>(Current pH − Target pH) × Soil texture × 0.2 × 100</code> — the form to use when Current pH, Target pH and Soil texture are the values you have.</li><li><strong>Sulfur per 1 000 ft²</strong> = <code>(Current pH − Target pH) × Soil texture × 0.2 × 9.29 × 10.7639 ÷ 10</code> — the form to use when Current pH, Target pH and Soil texture are the values you have.</li><li><strong>Time to take effect</strong> = <code>(Current pH − Target pH) × Soil texture × 3</code> — the form to use when Current pH, Target pH and Soil texture are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of pH change, Elemental sulfur and Sulfur per 100 m² can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Area from 100 to 200, leaving every other box alone. The panel moves from <strong>pH change</strong> 1 units, <strong>Elemental sulfur</strong> 20 kg, <strong>Sulfur per 100 m²</strong> 20 kg, <strong>Sulfur per 1 000 ft²</strong> 2 lb and <strong>Time to take effect</strong> 3 months to <strong>pH change</strong> 1 units, <strong>Elemental sulfur</strong> 40 kg, <strong>Sulfur per 100 m²</strong> 20 kg, <strong>Sulfur per 1 000 ft²</strong> 2 lb and <strong>Time to take effect</strong> 3 months.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box cannot be typed into: the results are worked out from the inputs above, and a past answer has to be entered as one of those inputs instead.</li><li><strong>Area left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Area is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Current pH left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Current pH is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Target pH left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Target pH is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Area to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Sulfur Soil Acidifier form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Area</strong> is measured in m². Change it and Elemental sulfur changes with it. Fill it from a measurement rather than a memory — Area is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Current pH</strong> is measured in pH. From a soil test. Change it and pH change, Elemental sulfur and Sulfur per 100 m² changes with it. Fill it from a measurement rather than a memory — Current pH is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Target pH</strong> is measured in pH. Blueberries want 4.5–5.5, most vegetables 6–7. Change it and pH change, Elemental sulfur and Sulfur per 100 m² changes with it. Fill it from a measurement rather than a memory — Target pH is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Soil texture</strong> takes a plain number with no unit attached. Multiplier on the base rate. Change it and Elemental sulfur, Sulfur per 100 m² and Sulfur per 1 000 ft² changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Soil texture is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Elemental sulfur</strong> is a plain number and the page's own defaults put it at 20. It is worked out from Area, Current pH, Target pH and Soil texture. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Sulfur per 100 m²</strong> is a plain number and the page's own defaults put it at 20. It is worked out from Current pH, Target pH and Soil texture. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Sulfur per 1 000 ft²</strong> is a plain number and the page's own defaults put it at 2. It is worked out from Current pH, Target pH and Soil texture. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Time to take effect</strong> is a plain number and the page's own defaults put it at 3. It is worked out from Current pH, Target pH and Soil texture. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>pH change</strong> is a plain number and the page's own defaults put it at 1. It is worked out from Current pH and Target pH. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>pH change</th><th>Elemental sulfur</th><th>Sulfur per 100 m²</th><th>Sulfur per 1 000 ft²</th><th>Time to take effect</th></tr></thead><tbody><tr><td><strong>Area</strong> +10%</td><td>+0%</td><td>+10%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Current pH</strong> +10%</td><td>+75%</td><td>+75%</td><td>+75%</td><td>+75%</td><td>+75%</td></tr><tr><td><strong>Target pH</strong> +10%</td><td>-65%</td><td>-65%</td><td>-65%</td><td>-65%</td><td>-65%</td></tr><tr><td><strong>Soil texture</strong> +10%</td><td>+0%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Current pH sits at the top — a ten per cent error in that box shows up as roughly 75 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Area = 50 m², Current pH = 3.75 pH, Target pH = 3.25 pH and Soil texture = 0.5 and the page reports <strong>pH change</strong> = 0.5 units, <strong>Elemental sulfur</strong> = 2.5 kg, <strong>Sulfur per 100 m²</strong> = 5 kg, <strong>Sulfur per 1 000 ft²</strong> = 0.5 lb and <strong>Time to take effect</strong> = 0.75 months.</li><li>Feed in Area = 300 m², Current pH = 7.5 pH, Target pH = 6.5 pH and Soil texture = 1 and the page reports <strong>pH change</strong> = 1 units, <strong>Elemental sulfur</strong> = 60 kg, <strong>Sulfur per 100 m²</strong> = 20 kg, <strong>Sulfur per 1 000 ft²</strong> = 2 lb and <strong>Time to take effect</strong> = 3 months.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Elemental sulfur follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
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
            Area (m²), Current pH (pH), Target pH (pH), Soil texture. Fill area, current pH and target pH and leave Elemental sulfur empty if you would rather have that one solved instead.
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

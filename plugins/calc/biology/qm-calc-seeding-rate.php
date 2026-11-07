<?php

/**
 * Seeding Rate and Plants per Hectare Calculator
 * /biology/seeding-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Seeding Rate and Plants per Hectare Calculator',
    'meta' => ['title' => 'Seeding Rate and Plants per Hectare Calculator', 'description' => 'Seeding Rate and Plants per Hectare Calculator works out seed rate and seeds per square metre from target plants, thousand seed weight and germination.', 'h1' => 'Seeding Rate and Plants per Hectare Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'target',
                            'label' => 'Target plants',
                            'type' => 'number',
                            'suffix' => 'plants/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '300000',
                        ],
                        [
                            'name' => 'tsw',
                            'label' => 'Thousand seed weight',
                            'type' => 'number',
                            'suffix' => 'g',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'germination',
                            'label' => 'Germination',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '92',
                        ],
                        [
                            'name' => 'establishment',
                            'label' => 'Field establishment',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Survival of germinated seedlings',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '90',
                        ],
                        [
                            'name' => 'rate',
                            'label' => 'Seed rate',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_m2',
                            'label' => 'Seeds per square metre',
                            'type' => 'number',
                            'suffix' => 'seeds/m²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'row',
                            'label' => 'Seeds per metre of row',
                            'type' => 'number',
                            'suffix' => 'seeds/m',
                            'help' => 'At 25 cm row spacing',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'spacing',
                            'label' => 'Plant spacing in the row',
                            'type' => 'number',
                            'suffix' => 'cm',
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
            'title' => 'Seed rate',
            'results' => ['rate' => 'target*tsw/1000/1000/(germination/100)/(establishment/100)', 'per_m2' => 'target/10000/(germination/100)/(establishment/100)', 'row' => 'target/10000/(germination/100)/(establishment/100)*0.25', 'spacing' => '100/target/10000/(germination/100)/(establishment/100)*0.25/0.25'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Seeding Rate and Plants per Hectare takes Target plants, Thousand seed weight and Germination and returns Seed rate and Seeds per square metre. Nothing is looked up on this page: seed rate is computed from target plants and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Seed rate is opened in kg/ha; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Seeding Rate and Plants per Hectare calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Seeding Rate and Plants per Hectare: it takes 4 numbers and reports Seed rate, Seeds per square metre and Seeds per metre of row.</p><p>In the form&#039;s own words, Seed rate = Target plants × Thousand seed weight ÷ 1000 ÷ 1000 ÷ (Germination ÷ 100) ÷ (Field establishment ÷ 100).</p><p>What comes back is Seed rate, Seeds per square metre, Seeds per metre of row and Plant spacing in the row — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Target plants</strong> — in plants/ha</li><li><strong>Thousand seed weight</strong> — in g</li><li><strong>Germination</strong> — in %</li><li><strong>Field establishment</strong> — in %. Survival of germinated seedlings</li></ul><p>The result boxes are Seed rate in kg/ha, Seeds per square metre in seeds/m², Seeds per metre of row in seeds/m, Plant spacing in the row in cm; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Target plants = 300000 plants/ha, Thousand seed weight = 40 g, Germination = 92 % and Field establishment = 90 %; the answers are <strong>Seed rate</strong> = 14.49 kg/ha, <strong>Seeds per square metre</strong> = 36.23 seeds/m², <strong>Seeds per metre of row</strong> = 9.06 seeds/m and <strong>Plant spacing in the row</strong> = 4.026e-8 cm.</p><ul><li><strong>Seed rate</strong> = 14.49 kg/ha</li><li><strong>Seeds per square metre</strong> = 36.23 seeds/m²</li><li><strong>Seeds per metre of row</strong> = 9.06 seeds/m</li><li><strong>Plant spacing in the row</strong> = 4.026e-8 cm</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Seed rate</strong> = <code>Target plants × Thousand seed weight ÷ 1000 ÷ 1000 ÷ (Germination ÷ 100) ÷ (Field establishment ÷ 100)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Seed rate</strong> = 14.49, <strong>Seeds per square metre</strong> = 36.23, <strong>Seeds per metre of row</strong> = 9.06 and <strong>Plant spacing in the row</strong> = 4.026e-8 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Seed rate takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Seed rate</strong> = <code>Target plants × Thousand seed weight ÷ 1000 ÷ 1000 ÷ (Germination ÷ 100) ÷ (Field establishment ÷ 100)</code></li><li><strong>Seeds per square metre</strong> = <code>Target plants ÷ 10000 ÷ (Germination ÷ 100) ÷ (Field establishment ÷ 100)</code></li><li><strong>Seeds per metre of row</strong> = <code>Target plants ÷ 10000 ÷ (Germination ÷ 100) ÷ (Field establishment ÷ 100) × 0.25</code></li><li><strong>Plant spacing in the row</strong> = <code>100 ÷ Target plants ÷ 10000 ÷ (Germination ÷ 100) ÷ (Field establishment ÷ 100) × 0.25 ÷ 0.25</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Seed rate</strong> = <code>Target plants × Thousand seed weight ÷ 1000 ÷ 1000 ÷ (Germination ÷ 100) ÷ (Field establishment ÷ 100)</code> — the form to use when Target plants, Thousand seed weight, Germination and Field establishment are the values you have.</li><li><strong>Seeds per square metre</strong> = <code>Target plants ÷ 10000 ÷ (Germination ÷ 100) ÷ (Field establishment ÷ 100)</code> — the form to use when Target plants, Germination and Field establishment are the values you have.</li><li><strong>Seeds per metre of row</strong> = <code>Target plants ÷ 10000 ÷ (Germination ÷ 100) ÷ (Field establishment ÷ 100) × 0.25</code> — the form to use when Target plants, Germination and Field establishment are the values you have.</li><li><strong>Plant spacing in the row</strong> = <code>100 ÷ Target plants ÷ 10000 ÷ (Germination ÷ 100) ÷ (Field establishment ÷ 100) × 0.25 ÷ 0.25</code> — the form to use when Target plants, Germination and Field establishment are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Seed rate, Seeds per square metre and Seeds per metre of row can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Target plants, from 300000 to 600000 — and the answers go from <strong>Seed rate</strong> 14.49 kg/ha, <strong>Seeds per square metre</strong> 36.23 seeds/m², <strong>Seeds per metre of row</strong> 9.06 seeds/m and <strong>Plant spacing in the row</strong> 4.026e-8 cm to <strong>Seed rate</strong> 28.99 kg/ha, <strong>Seeds per square metre</strong> 72.46 seeds/m², <strong>Seeds per metre of row</strong> 18.12 seeds/m and <strong>Plant spacing in the row</strong> 2.013e-8 cm.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Seed rate, Seeds per square metre and Seeds per metre of row are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Target plants left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Target plants is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Thousand seed weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Thousand seed weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Germination left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Germination is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Target plants and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Seeding Rate and Plants per Hectare form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Target plants</strong> is measured in plants/ha. The page reads it when it works out Seed rate, Seeds per square metre and Seeds per metre of row. Fill it from a measurement rather than a memory — Target plants is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Thousand seed weight</strong> is measured in g. The page reads it when it works out Seed rate. Fill it from a measurement rather than a memory — Thousand seed weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Germination</strong> is measured in %. The page reads it when it works out Seed rate, Seeds per square metre and Seeds per metre of row. Fill it from a measurement rather than a memory — Germination is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Field establishment</strong> is measured in %. Survival of germinated seedlings. The page reads it when it works out Seed rate, Seeds per square metre and Seeds per metre of row. Fill it from a measurement rather than a memory — Field establishment is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Seed rate</strong> is a plain number and the page's own defaults put it at 14.49. It is computed from Target plants, Thousand seed weight, Germination and Field establishment, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Seeds per square metre</strong> is a plain number and the page's own defaults put it at 36.23. It is computed from Target plants, Germination and Field establishment, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Seeds per metre of row</strong> is a plain number and the page's own defaults put it at 9.06. It is computed from Target plants, Germination and Field establishment, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Plant spacing in the row</strong> is a plain number and the page's own defaults put it at 4.026e-8. It is computed from Target plants, Germination and Field establishment, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Seed rate</th><th>Seeds per square metre</th><th>Seeds per metre of row</th><th>Plant spacing in the row</th></tr></thead><tbody><tr><td><strong>Target plants</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>-9.09%</td></tr><tr><td><strong>Thousand seed weight</strong> +10%</td><td>+10%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Germination</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td></tr><tr><td><strong>Field establishment</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Target plants sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Target plants = 150000 plants/ha, Thousand seed weight = 20 g, Germination = 46 % and Field establishment = 45 % and the page reports <strong>Seed rate</strong> = 14.49 kg/ha, <strong>Seeds per square metre</strong> = 72.46 seeds/m², <strong>Seeds per metre of row</strong> = 18.12 seeds/m and <strong>Plant spacing in the row</strong> = 3.221e-7 cm.</li><li>Feed in Target plants = 900000 plants/ha, Thousand seed weight = 40 g, Germination = 92 % and Field establishment = 90 % and the page reports <strong>Seed rate</strong> = 43.48 kg/ha, <strong>Seeds per square metre</strong> = 109 seeds/m², <strong>Seeds per metre of row</strong> = 27.17 seeds/m and <strong>Plant spacing in the row</strong> = 1.342e-8 cm.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Seed rate follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Target plants, Thousand seed weight and Germination are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Target plants, Thousand seed weight and Germination and the number you are missing is Seed rate and Seeds per square metre.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dna-copy-number">DNA copy number Calculator</a>, <a href="/biology/dna-molarity-calculator">DNA Molarity Calculator</a> and <a href="/biology/dna-molarity-from-mass">DNA Molarity from Mass or A260 Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Seeding Rate and Plants per Hectare calculator work out?', 'a' => <<<'TXT'
            Seed rate, Seeds per square metre, Seeds per metre of row and Plant spacing in the row, from Target plants, Thousand seed weight, Germination and Field establishment. The relationship is Seed rate = Target plants × Thousand seed weight ÷ 1000 ÷ 1000 ÷ (Germination ÷ 100) ÷ (Field establishment ÷ 100).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Target plants (plants/ha), Thousand seed weight (g), Germination (%), Field establishment (%). Enter target plants, thousand seed weight and germination; Seed rate is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Seed rate, Seeds per square metre, Seeds per metre of row and Plant spacing in the row can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Seed rate = 14.49 kg/ha, Seeds per square metre = 36.23 seeds/m², Seeds per metre of row = 9.06 seeds/m and Plant spacing in the row = 4.026e-8 cm. The figures come from Target plants as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Seed rate is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Target plants blank and the page solves for it, reporting Seed rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Seed rate keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dna-copy-number', 'name' => 'DNA copy number Calculator'],
            ['path' => '/biology/dna-molarity-calculator', 'name' => 'DNA Molarity Calculator'],
            ['path' => '/biology/dna-molarity-from-mass', 'name' => 'DNA Molarity from Mass or A260 Calculator'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * Gypsum Application Rate Calculator
 * /biology/gypsum-application-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Gypsum Application Rate Calculator',
    'meta' => ['title' => 'Gypsum Application Rate Calculator — Biology', 'description' => 'Gypsum Application Rate Calculator turns area and soil texture into gypsum rate. No sign-up and no waiting: type the numbers, press Calculate, read the answer.', 'h1' => 'Gypsum Application Rate Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'area_ha',
                            'label' => 'Area',
                            'type' => 'number',
                            'suffix' => 'ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'texture',
                            'label' => 'Soil texture',
                            'type' => 'select',
                            'options' => ['Sand' => '1.5', 'Loam' => '3', 'Clay' => '5'],
                            'help' => 'Sets the tonnes per hectare for a one-unit pH-neutral treatment',
                            'default' => 'Loam',
                        ],
                        [
                            'name' => 'esp',
                            'label' => 'Exchangeable sodium percentage',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Above 15% the soil is sodic',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'esp_target',
                            'label' => 'Target ESP',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Below 7% is considered non-sodic',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'rate_tha',
                            'label' => 'Gypsum rate',
                            'type' => 'number',
                            'suffix' => 't/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_t',
                            'label' => 'Gypsum needed',
                            'type' => 'number',
                            'suffix' => 't',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bags_25kg',
                            'label' => '25 kg bags',
                            'type' => 'number',
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
            'title' => 'Rate',
            'results' => ['rate_tha' => 'texture*(esp-esp_target)/10', 'total_t' => 'area_ha*texture*(esp-esp_target)/10', 'bags_25kg' => 'area_ha*texture*(esp-esp_target)/10*40'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Gypsum Application Rate takes Area, Soil texture and Exchangeable sodium percentage and returns Gypsum rate and Gypsum needed. There is no hidden constant here: change gypsum rate and area moves with it. The main result, Gypsum rate, is reported in t/ha.
        TXT,
        'sections' => [
            ['title' => 'How the Gypsum Application Rate calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Gypsum Application Rate: it takes 4 numbers and reports Gypsum rate, Gypsum needed and 25 kg bags.</p><p>The relationship it solves reads Gypsum rate = Soil texture × (Exchangeable sodium percentage − Target ESP) ÷ 10.</p><p>The result panel carries Gypsum rate, Gypsum needed and 25 kg bags, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Area</strong> — in ha</li><li><strong>Soil texture</strong> — a plain number, no unit. Sets the tonnes per hectare for a one-unit pH-neutral treatment</li><li><strong>Exchangeable sodium percentage</strong> — in %. Above 15% the soil is sodic</li><li><strong>Target ESP</strong> — in %. Below 7% is considered non-sodic</li></ul><p>The answers come back as Gypsum rate in t/ha, Gypsum needed in t, 25 kg bags. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Area = 1 ha, Soil texture = 3, Exchangeable sodium percentage = 15 % and Target ESP = 5 %; the answers are <strong>Gypsum rate</strong> = 3 t/ha, <strong>Gypsum needed</strong> = 3 t and <strong>25 kg bags</strong> = 120.</p><ul><li><strong>Gypsum rate</strong> = 3 t/ha</li><li><strong>Gypsum needed</strong> = 3 t</li><li><strong>25 kg bags</strong> = 120</li></ul><p>That is <strong>Gypsum rate</strong> = <code>Soil texture × (Exchangeable sodium percentage − Target ESP) ÷ 10</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Gypsum rate</strong> = 3, <strong>Gypsum needed</strong> = 3 and <strong>25 kg bags</strong> = 120 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Gypsum rate takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Gypsum rate</strong> = <code>Soil texture × (Exchangeable sodium percentage − Target ESP) ÷ 10</code></li><li><strong>Gypsum needed</strong> = <code>Area × Soil texture × (Exchangeable sodium percentage − Target ESP) ÷ 10</code></li><li><strong>25 kg bags</strong> = <code>Area × Soil texture × (Exchangeable sodium percentage − Target ESP) ÷ 10 × 40</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Gypsum rate</strong> = <code>Soil texture × (Exchangeable sodium percentage − Target ESP) ÷ 10</code> — the form to use when Soil texture, Exchangeable sodium percentage and Target ESP are the values you have.</li><li><strong>Gypsum needed</strong> = <code>Area × Soil texture × (Exchangeable sodium percentage − Target ESP) ÷ 10</code> — the form to use when Area, Soil texture, Exchangeable sodium percentage and Target ESP are the values you have.</li><li><strong>25 kg bags</strong> = <code>Area × Soil texture × (Exchangeable sodium percentage − Target ESP) ÷ 10 × 40</code> — the form to use when Area, Soil texture, Exchangeable sodium percentage and Target ESP are the values you have.</li></ul><p>Any one of Gypsum rate, Gypsum needed and 25 kg bags can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Area from 1 to 2, leaving every other box alone. The panel moves from <strong>Gypsum rate</strong> 3 t/ha, <strong>Gypsum needed</strong> 3 t and <strong>25 kg bags</strong> 120 to <strong>Gypsum rate</strong> 3 t/ha, <strong>Gypsum needed</strong> 6 t and <strong>25 kg bags</strong> 240.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Gypsum rate, Gypsum needed and 25 kg bags are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Area left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Area is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Soil texture left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Soil texture is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Exchangeable sodium percentage left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Exchangeable sodium percentage is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Area is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Gypsum Application Rate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Area</strong> is measured in ha. Change it and Gypsum needed and 25 kg bags changes with it. Fill it from a measurement rather than a memory — Area is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Soil texture</strong> takes a plain number with no unit attached. Sets the tonnes per hectare for a one-unit pH-neutral treatment. Change it and Gypsum rate, Gypsum needed and 25 kg bags changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Soil texture is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Exchangeable sodium percentage</strong> is measured in %. Above 15% the soil is sodic. Change it and Gypsum rate, Gypsum needed and 25 kg bags changes with it. Fill it from a measurement rather than a memory — Exchangeable sodium percentage is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Target ESP</strong> is measured in %. Below 7% is considered non-sodic. Change it and Gypsum rate, Gypsum needed and 25 kg bags changes with it. Fill it from a measurement rather than a memory — Target ESP is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Gypsum rate</strong> is a plain number and the page's own defaults put it at 3. The value follows from Soil texture, Exchangeable sodium percentage and Target ESP. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Gypsum needed</strong> is a plain number and the page's own defaults put it at 3. The value follows from Area, Soil texture, Exchangeable sodium percentage and Target ESP. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>25 kg bags</strong> is a plain number and the page's own defaults put it at 120. The value follows from Area, Soil texture, Exchangeable sodium percentage and Target ESP. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Gypsum rate</th><th>Gypsum needed</th><th>25 kg bags</th></tr></thead><tbody><tr><td><strong>Area</strong> +10%</td><td>+0%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Soil texture</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Exchangeable sodium percentage</strong> +10%</td><td>+15%</td><td>+15%</td><td>+15%</td></tr><tr><td><strong>Target ESP</strong> +10%</td><td>-5%</td><td>-5%</td><td>-5%</td></tr></tbody></table><p>Ranked by leverage, Exchangeable sodium percentage sits at the top — a ten per cent error in that box shows up as roughly 15 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Area = 0.5 ha, Soil texture = 1.5, Exchangeable sodium percentage = 7.5 % and Target ESP = 2.5 % and the page reports <strong>Gypsum rate</strong> = 0.75 t/ha, <strong>Gypsum needed</strong> = 0.375 t and <strong>25 kg bags</strong> = 15.</li><li>Feed in Area = 3 ha, Soil texture = 3, Exchangeable sodium percentage = 15 % and Target ESP = 5 % and the page reports <strong>Gypsum rate</strong> = 3 t/ha, <strong>Gypsum needed</strong> = 9 t and <strong>25 kg bags</strong> = 360.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Gypsum rate follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Area, Soil texture and Exchangeable sodium percentage are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Area, Soil texture and Exchangeable sodium percentage is what you already know and Gypsum rate and Gypsum needed is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/cat-bmi">Cat BMI Calculator</a>, <a href="/biology/cat-calorie">Cat calorie Calculator</a> and <a href="/biology/cat-chocolate-toxicity">Cat chocolate toxicity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Gypsum Application Rate calculator work out?', 'a' => <<<'TXT'
            Gypsum rate, Gypsum needed and 25 kg bags, from Soil texture, Exchangeable sodium percentage and Target ESP. The relationship is Gypsum rate = Soil texture × (Exchangeable sodium percentage − Target ESP) ÷ 10.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Area (ha), Soil texture, Exchangeable sodium percentage (%), Target ESP (%). Enter area, soil texture and exchangeable sodium percentage; Gypsum rate is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Gypsum rate, Gypsum needed and 25 kg bags blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Gypsum rate = 3 t/ha, Gypsum needed = 3 t and 25 kg bags = 120. The figures come from Area as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Gypsum rate is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Area blank and the page solves for it, reporting Gypsum rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Gypsum rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/cat-bmi', 'name' => 'Cat BMI Calculator'],
            ['path' => '/biology/cat-calorie', 'name' => 'Cat calorie Calculator'],
            ['path' => '/biology/cat-chocolate-toxicity', 'name' => 'Cat chocolate toxicity Calculator'],
        ],
        'authors' => [],
    ],
];

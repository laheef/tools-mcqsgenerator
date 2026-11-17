<?php

/**
 * Donut
 * /food/donut
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Donut',
    'meta' => ['title' => 'Donut Calculator: Formula, Steps & Examples', 'description' => 'Estimate donut calories or exercise time from donut type, quantity and activity. Check serving sizes and labels before relying on the estimate.', 'h1' => 'Donut Calculator', 'updated' => '2026-08-04'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'donutsAte',
                            'label' => 'I ate...',
                            'type' => 'number',
                            'suffix' => 'donuts ',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'donutType',
                            'label' => 'Donut type',
                            'type' => 'select',
                            'options' => [
                                'Jelly-filled and glazed' => '350',
                                'Jelly-filled, dusted with sugar' => '290',
                                'With cottage cheese' => '307',
                                'French Cruller' => '170',
                                'Glazed ring – Dunkin\' Donuts' => '230',
                                'Boston Crème – Dunkin\' Donuts' => '280',
                                'Bismark – Dunkin\' Donuts' => '490',
                                'Enter custom donut calories' => '',
                            ],
                            'dataset' => 'DonutType',
                            'control' => 'DROPDOWN',
                            'default' => 'Jelly-filled and glazed',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'donutCalories',
                            'label' => 'Calories per donut',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caloriesEaten',
                            'label' => 'Calories eaten',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'activity',
                            'label' => 'Activity type',
                            'type' => 'select',
                            'options' => [
                                'Steamy sex' => '5.8',
                                'Cuddling' => '1.800001',
                                'Romantic dance' => '3',
                                'Laughing to tears' => '1.15',
                                'Sweet kisses' => '2.8',
                                'Sensuous massage' => '4',
                                'Bubble bath' => '1.5',
                                'Relaxing sleep' => '0.9',
                                'Watching horror movies' => '1.3',
                                'Board game duel' => '1.50000001',
                                'Enter custom MET value' => '',
                            ],
                            'dataset' => 'MET',
                            'control' => 'DROPDOWN',
                            'default' => 'Sweet kisses',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'activityMET',
                            'label' => 'MET',
                            'type' => 'result',
                            'help' => 'MET is the metabolic equivalent of task. MET=1 corresponds to 1 kcal/kg/h.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'burnTime',
                            'label' => 'Time to burn these donuts',
                            'type' => 'number',
                            'help' => 'How long you need to be active to burn all of these donuts.',
                            'unit' => '19',
                            'unit_default' => 'hrsmin',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'caloriesEaten = donutsAte * donutCalories',
            'results' => ['donutsAte' => 'caloriesEaten/donutCalories', 'caloriesEaten' => 'donutCalories*donutsAte', 'donutCalories' => 'caloriesEaten/donutsAte'],
        ],
        [
            'title' => 'burnTime = one_way((caloriesEaten / (activityMET * 3.5 * weight / 200)) / 60)',
            'results' => ['burnTime' => '((20/21)*caloriesEaten/(activityMET*weight))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter I ate…, Donut type and Calories eaten into Donut and the answer comes back as Calories per donut and MET. There is no hidden constant here: change calories per donut and i ate… moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Donut calculator works', 'html' => <<<'TXT'
            <p>Donut answers one question from 6 numbers, and the answer is Calories per donut and MET.</p><p>Written with the labels from the form, Calories eaten = Calories per donut × I ate....</p><p>What comes back is Calories per donut and MET — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs.</p><ul><li><strong>I ate…</strong> — in donuts</li><li><strong>Donut type</strong> — a plain number, no unit</li><li><strong>Calories eaten</strong> — a plain number, no unit</li><li><strong>Weight</strong> — in kilograms</li><li><strong>Activity type</strong> — a plain number, no unit</li><li><strong>Time to burn these donuts</strong> — in hours / minutes. How long you need to be active to burn all of these donuts.</li></ul><p>The result boxes are Calories per donut, MET; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Calories eaten</strong> = <code>Calories per donut × I ate...</code></li><li><strong>I ate…</strong> = <code>Calories eaten ÷ Calories per donut</code></li><li><strong>Calories per donut</strong> = <code>Calories eaten ÷ I ate...</code></li><li><strong>Time to burn these donuts</strong> = <code>((20 ÷ 21) × Calories eaten ÷ (MET × Weight))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Calories eaten</strong> = <code>Calories per donut × I ate...</code> — the form to use when Calories per donut and I ate… are the values you have.</li><li><strong>I ate…</strong> = <code>Calories eaten ÷ Calories per donut</code> — the form to use when Calories eaten and Calories per donut are the values you have.</li><li><strong>Calories per donut</strong> = <code>Calories eaten ÷ I ate...</code> — the form to use when Calories eaten and I ate… are the values you have.</li><li><strong>Time to burn these donuts</strong> = <code>((20 ÷ 21) × Calories eaten ÷ (MET × Weight))</code> — the form to use when Calories eaten, MET and Weight are the values you have.</li></ul><p>Any one of Calories eaten, I ate… and Calories per donut can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Weight and Time to burn these donuts carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Calories per donut and MET are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>I ate… left as a guess.</strong> Anything typed into I ate… is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Donut type left as a guess.</strong> Anything typed into Donut type is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in I ate... and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Donut form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>I ate…</strong> is measured in donuts. Change it and Calories eaten and Calories per donut changes with it. Fill it from a measurement rather than a memory — I ate… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Donut type</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Donut type is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Calories eaten</strong> takes a plain number with no unit attached. Change it and I ate…, Calories per donut and Time to burn these donuts changes with it. Fill it from a measurement rather than a memory — Calories eaten is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. Change it and Time to burn these donuts changes with it. Fill it from a measurement rather than a memory — Weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Activity type</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Activity type is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Time to burn these donuts</strong> is a hours / minutes quantity: the page opens it in hrsmin and converts anything else you pick before the formula runs. How long you need to be active to burn all of these donuts. Fill it from a measurement rather than a memory — Time to burn these donuts is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p> Read them in this order:</p><ul><li><strong>Calories per donut</strong> is a plain number. It is computed from Calories eaten and I ate…, so it changes the moment any of them does. </li><li><strong>MET</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. </li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Donut actually offers.</p><ul><li><strong>kilograms</strong> — opens in <em>kg</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>hours / minutes</strong> — opens in <em>hrsmin</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Calories per donut is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms and hours / minutes and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes I ate…, Donut type and Calories eaten are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when I ate…, Donut type and Calories eaten is what you already know and Calories per donut and MET is what you need — the reverse of that situation is what the rearranged form is for.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>Related calculators: <a href="/food/thanksgiving-calories">Thanksgiving Calories</a>, <a href="/food/salad-calories">Salad calories</a> and <a href="/food/popcorn">Popcorn</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Donut is a number to act on, so the useful question is what to do with Calories per donut and MET once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> Write down I ate…, Donut type, Calories eaten and Weight alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. </p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Donut calculator work out?', 'a' => 'Calories per donut and MET, from Calories per donut and I ate…. The relationship is Calories eaten = Calories per donut × I ate....'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            I ate… (donuts), Donut type, Calories eaten, Weight (kilograms), Activity type. With i ate…, donut type and calories eaten in place, Calories per donut can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Calories eaten, I ate…, Calories per donut and Time to burn these donuts blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Calories per donut is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave I ate... blank and the page solves for it, reporting Calories per donut instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Calories per donut keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/thanksgiving-calories', 'name' => 'Thanksgiving Calories'],
            ['path' => '/food/salad-calories', 'name' => 'Salad calories'],
            ['path' => '/food/popcorn', 'name' => 'Popcorn']
        ],
    ],
];

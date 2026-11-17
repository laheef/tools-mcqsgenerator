<?php

/**
 * Mashed potatoes
 * /food/mashed-potatoes
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mashed potatoes',
    'meta' => ['title' => 'Mashed potatoes Calculator — Formula, Units & Example', 'description' => 'Estimate mashed-potato quantities from guest count and portion size, using weight or volume. Adjust for appetite, sides and peeling loss when planning a meal.', 'h1' => 'Mashed potatoes Calculator', 'updated' => '2026-08-26'],
    'sections' => [
        [
            'title' => 'People and portion size',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'people',
                            'label' => 'People eating',
                            'type' => 'number',
                            'suffix' => 'person(s)',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'portionVol',
                            'label' => 'One portion size: volume',
                            'type' => 'number',
                            'help' => 'Typical serving size is 2/3-1 cup.',
                            'unit' => '604',
                            'unit_default' => 'cup',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'portionWeight',
                            'label' => 'One portion size: weight',
                            'type' => 'number',
                            'help' => 'Typical serving size is 6-8 oz (170-230 g).',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'How much to prepare',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'howManyVol',
                            'label' => 'By volume',
                            'type' => 'number',
                            'unit' => '604',
                            'unit_default' => 'cup',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'howManyWeight',
                            'label' => 'By weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'For the classic 1:4 recipe you\'d need...',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'potatoes',
                            'label' => 'Potatoes',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'liquid',
                            'label' => 'Liquid',
                            'type' => 'number',
                            'help' => 'Milk, heavy cream, sour cream, butter, water, plant-based milk.&nbsp;',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'The optimal proportions may vary depending on the type of potatoes and how creamy you\'d want your dish to be!'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'howManyWeight=portionWeight*people',
            'results' => ['howManyWeight' => 'people*portionWeight', 'portionWeight' => 'howManyWeight/people', 'people' => 'howManyWeight/portionWeight'],
        ],
        [
            'title' => 'portionWeight=portionVol*210',
            'results' => ['portionWeight' => '210*portionVol', 'portionVol' => '(1/210)*portionWeight'],
        ],
        [
            'title' => 'howManyVol=howManyWeight/210',
            'results' => ['howManyWeight' => '210*howManyVol', 'howManyVol' => '(1/210)*howManyWeight'],
        ],
        [
            'title' => 'potatoes=howManyWeight*0.8',
            'results' => ['howManyWeight' => '(5/4)*potatoes', 'potatoes' => '(4/5)*howManyWeight'],
        ],
        [
            'title' => 'liquid=howManyWeight*0.2',
            'results' => ['howManyWeight' => '5*liquid', 'liquid' => '(1/5)*howManyWeight'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Mashed potatoes takes People eating and One portion size: weight and returns One portion size: volume and By volume. The arithmetic is the whole method: one portion size: volume is worked out from people eating by one formula, applied once. One portion size: volume comes back in cup unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Mashed potatoes calculator works', 'html' => <<<'TXT'
            <p>Mashed potatoes answers one question from 2 numbers, and the answer is One portion size: volume, By volume and By weight.</p><p>Written with the labels from the form, By weight = People eating × One portion size: weight.</p><p>The result panel carries One portion size: volume, By volume, By weight and Potatoes, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>People eating</strong> — in person(s)</li><li><strong>One portion size: weight</strong> — in grams. Typical serving size is 6-8 oz (170-230 g).</li></ul><p>The result boxes are One portion size: volume in cup, By volume in cup, By weight in grams, Potatoes in grams, Liquid in grams; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — People eating = 2 person(s) and One portion size: weight = 100 g — through the same formula and the panel reports <strong>By weight</strong> = 200 g, <strong>One portion size: volume</strong> = 0.4762 cup, <strong>By volume</strong> = 0.9524 cup, <strong>Potatoes</strong> = 160 g and <strong>Liquid</strong> = 40 g.</p><ul><li><strong>By weight</strong> = 200 g</li><li><strong>One portion size: volume</strong> = 0.4762 cup</li><li><strong>By volume</strong> = 0.9524 cup</li><li><strong>Potatoes</strong> = 160 g</li><li><strong>Liquid</strong> = 40 g</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>By weight</strong> = <code>People eating × One portion size: weight</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>By weight</strong> = 200, <strong>One portion size: volume</strong> = 0.4762, <strong>By volume</strong> = 0.9524, <strong>Potatoes</strong> = 160 and <strong>Liquid</strong> = 40 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: One portion size: volume offers 2 units and opens on cup, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>By weight</strong> = <code>People eating × One portion size: weight</code></li><li><strong>One portion size: weight</strong> = <code>By weight ÷ People eating</code></li><li><strong>People eating</strong> = <code>By weight ÷ One portion size: weight</code></li><li><strong>One portion size: volume</strong> = <code>(1 ÷ 210) × One portion size: weight</code></li><li><strong>By volume</strong> = <code>(1 ÷ 210) × By weight</code></li><li><strong>Potatoes</strong> = <code>(4 ÷ 5) × By weight</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>By weight</strong> = <code>People eating × One portion size: weight</code> — the form to use when People eating and One portion size: weight are the values you have.</li><li><strong>One portion size: weight</strong> = <code>By weight ÷ People eating</code> — the form to use when By weight and People eating are the values you have.</li><li><strong>People eating</strong> = <code>By weight ÷ One portion size: weight</code> — the form to use when By weight and One portion size: weight are the values you have.</li><li><strong>One portion size: weight</strong> = <code>210 × One portion size: volume</code> — the form to use when One portion size: volume are the values you have.</li><li><strong>One portion size: volume</strong> = <code>(1 ÷ 210) × One portion size: weight</code> — the form to use when One portion size: weight are the values you have.</li><li><strong>By volume</strong> = <code>(1 ÷ 210) × By weight</code> — the form to use when By weight are the values you have.</li><li><strong>By weight</strong> = <code>210 × By volume</code> — the form to use when By volume are the values you have.</li><li><strong>Potatoes</strong> = <code>(4 ÷ 5) × By weight</code> — the form to use when By weight are the values you have.</li></ul><p>Any one of By weight, One portion size: weight and People eating can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — People eating, from 2 to 4 — and the answers go from <strong>By weight</strong> 200 g, <strong>One portion size: volume</strong> 0.4762 cup, <strong>By volume</strong> 0.9524 cup, <strong>Potatoes</strong> 160 g and <strong>Liquid</strong> 40 g to <strong>By weight</strong> 400 g, <strong>One portion size: volume</strong> 0.4762 cup, <strong>By volume</strong> 1.9 cup, <strong>Potatoes</strong> 320 g and <strong>Liquid</strong> 80 g.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside One portion size: weight is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with One portion size: volume, By volume and By weight are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>People eating left as a guess.</strong> If People eating is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>One portion size: weight left as a guess.</strong> If One portion size: weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> If People eating is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Mashed potatoes form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>People eating</strong> is measured in person(s). The page reads it when it works out By weight and One portion size: weight. Fill it from a measurement rather than a memory — People eating is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>One portion size: weight</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. Typical serving size is 6-8 oz (170-230 g). The page reads it when it works out By weight, People eating and One portion size: volume. Fill it from a measurement rather than a memory — One portion size: weight is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>One portion size: volume</strong> is a cup figure and the page's own defaults put it at 0.4762 cup. It is computed from One portion size: weight, so it changes the moment any of them does. </li><li><strong>By volume</strong> is a cup figure and the page's own defaults put it at 0.9524 cup. It is computed from By weight, so it changes the moment any of them does. </li><li><strong>By weight</strong> is a grams figure and the page's own defaults put it at 200 g. It is computed from People eating and One portion size: weight, so it changes the moment any of them does. </li><li><strong>Potatoes</strong> is a grams figure and the page's own defaults put it at 160 g. It is computed from By weight, so it changes the moment any of them does. </li><li><strong>Liquid</strong> is a grams figure and the page's own defaults put it at 40 g. It is computed from By weight, so it changes the moment any of them does. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>By weight</th><th>One portion size: volume</th><th>By volume</th><th>Potatoes</th><th>Liquid</th></tr></thead><tbody><tr><td><strong>People eating</strong> +10%</td><td>+10%</td><td>+0%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>One portion size: weight</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, People eating sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. </p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Mashed potatoes actually offers.</p><ul><li><strong>cup</strong> — opens in <em>cup</em>, and the chip also carries tbsp. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>grams</strong> — opens in <em>g</em>, and the chip also carries g, mg, lb, oz and st. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> One portion size: volume follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover cup and grams. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are People eating and One portion size: weight and the number you are missing is One portion size: volume and By volume.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/coffee-to-water-ratio">Coffee to water ratio</a>, <a href="/food/coffee">Coffee</a> and <a href="/food/cold-brew-ratio">Cold brew ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mashed potatoes calculator work out?', 'a' => <<<'TXT'
            One portion size: volume, By volume, By weight and Potatoes, from People eating and One portion size: weight. The relationship is By weight = People eating × One portion size: weight.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            People eating (person(s)), One portion size: weight (grams). Fill people eating and one portion size: weight and leave One portion size: volume empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of By weight, One portion size: weight, People eating and One portion size: volume blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'Are the Mashed potatoes results exact?', 'a' => 'It uses the values and assumptions represented in the form. Real ingredients and conditions can vary, so check units and follow the recipe, product label or safety instructions that apply.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally One portion size: volume is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave People eating blank and the page solves for it, reporting One portion size: volume instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of One portion size: volume keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/food/butter', 'name' => 'Butter'],
            ['path' => '/food/thanksgiving', 'name' => 'Thanksgiving'],
            ['path' => '/food/cooking-measurement', 'name' => 'Cooking measurement']
        ],
    ],
];

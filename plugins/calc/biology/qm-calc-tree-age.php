<?php

/**
 * Tree age
 * /biology/tree-age
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tree age',
    'meta' => ['title' => 'Tree age Calculator: Formula, Steps & Example', 'description' => 'Tree age takes circumference at breast height and returns tree species. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Tree age Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'treeSpecies',
                            'label' => 'Tree species',
                            'type' => 'select',
                            'options' => [
                                'American beech' => '6',
                                'American elm' => '4',
                                'American sycamore' => '4.000001',
                                'Austrian pine' => '4.5',
                                'Basswood' => '3.000010',
                                'Black cherry' => '5',
                                'Black maple' => '5.000001',
                                'Black walnut' => '4.5000001',
                                'Black willow' => '2',
                                'Box elder' => '3.000011',
                                'Bradford pear' => '3',
                                'Common horse chestnut' => '8',
                                'Colorado blue spruce' => '4.5000002',
                                'Cottonwood' => '2.000001',
                                'Dogwood' => '7.000010',
                                'Douglas fir' => '5.000002',
                                'European beech' => '4.000002',
                                'European white birch' => '5.000003',
                                'Green ash' => '4.000003',
                                'Honey locust' => '3.000012',
                                'Ironwood' => '7',
                                'Kentucky coffee tree' => '3.000001',
                                'Littleleaf linden' => '3.000002',
                                'Northern red oak' => '4.000004',
                                'Norway maple' => '4.5000003',
                                'Norway spruce' => '5.000004',
                                'Pin oak' => '3.000003',
                                'Quaking aspen' => '2.000001',
                                'Redbud' => '7.000001',
                                'Red maple' => '4.5000004',
                                'River birch' => '3.5',
                                'Scarlet oak' => '4.000005',
                                'Scotch pine' => '3.5000001',
                                'Shagbark hickory' => '7.5',
                                'Shingle oak' => '6.000001',
                                'Shumard oak' => '3.000004',
                                'Silver maple' => '3.000005',
                                'Sugar maple' => '5.5000001',
                                'Sweet gum' => '4.000006',
                                'Tulip tree' => '3.000006',
                                'White ash' => '5.000005',
                                'White fir' => '7.5000001',
                                'White oak' => '5.000006',
                                'White pine' => '5.000007',
                                'Yellow buckeye' => '5.000008',
                            ],
                            'dataset' => 'treeSpecies',
                            'control' => 'DROPDOWN',
                            'default' => 'American elm',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'custom_variable',
                            'label' => 'Growth factor',
                            'type' => 'number',
                            'help' => 'Enter the growth factor if you can\'t find your tree in the list above. Most tree species have growth factors of 3, 4, or 5.',
                            'readonly' => true,
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'circumferenceAtBreastHeight',
                            'label' => 'Circumference at breast height',
                            'type' => 'number',
                            'help' => 'Breast height is 4.5 ft or 1.3 m from the ground.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'diameterAtBreastHeight',
                            'label' => 'Diameter at breast height',
                            'type' => 'number',
                            'help' => 'Breast height is 4.5 ft or 1.3 m from the ground.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'age',
                            'label' => 'Age',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'age = treeSpecies * diameterAtBreastHeight',
            'results' => ['diameterAtBreastHeight' => 'age/treeSpecies', 'treeSpecies' => 'age/diameterAtBreastHeight', 'age' => 'diameterAtBreastHeight*treeSpecies'],
        ],
        [
            'title' => 'diameterAtBreastHeight = circumferenceAtBreastHeight / pi',
            'results' => ['circumferenceAtBreastHeight' => 'PI*diameterAtBreastHeight', 'diameterAtBreastHeight' => 'circumferenceAtBreastHeight/PI'],
        ],
        [
            'title' => 'treeSpecies = custom_variable',
            'results' => ['treeSpecies' => 'custom_variable', 'custom_variable' => 'treeSpecies'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Tree age works out Growth factor from Tree species, Circumference at breast height and Diameter at breast height. There is no hidden constant here: change growth factor and tree species moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Tree age calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Tree age: it takes 4 numbers and reports Growth factor.</p><p>In the form&#039;s own words, Age = Diameter at breast height × Tree species.</p><p>The result panel carries Growth factor, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Tree species</strong> — a plain number, no unit</li><li><strong>Circumference at breast height</strong> — in centimeters. Breast height is 4.5 ft or 1.3 m from the ground.</li><li><strong>Diameter at breast height</strong> — in centimeters. Breast height is 4.5 ft or 1.3 m from the ground.</li><li><strong>Age</strong> — in years</li></ul><p>The result box is Growth factor. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Tree species = 4 and Age = 10 yrs; the answers are <strong>Diameter at breast height</strong> = 7.922e-8 cm, <strong>Circumference at breast height</strong> = 2.489e-7 cm and <strong>Growth factor</strong> = 4.</p><ul><li><strong>Diameter at breast height</strong> = 7.922e-8 cm</li><li><strong>Circumference at breast height</strong> = 2.489e-7 cm</li><li><strong>Growth factor</strong> = 4</li></ul><p>That is <strong>Age</strong> = <code>Diameter at breast height × Tree species</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Diameter at breast height</strong> = 7.922e-8, <strong>Circumference at breast height</strong> = 2.489e-7 and <strong>Growth factor</strong> = 4. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Circumference at breast height lists 7 options and opens on centimeters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Age</strong> = <code>Diameter at breast height × Tree species</code></li><li><strong>Diameter at breast height</strong> = <code>Age ÷ Tree species</code></li><li><strong>Tree species</strong> = <code>Age ÷ Diameter at breast height</code></li><li><strong>Circumference at breast height</strong> = <code>PI × Diameter at breast height</code></li><li><strong>Growth factor</strong> = <code>Tree species</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Age</strong> = <code>Diameter at breast height × Tree species</code> — the form to use when Diameter at breast height and Tree species are the values you have.</li><li><strong>Diameter at breast height</strong> = <code>Age ÷ Tree species</code> — the form to use when Age and Tree species are the values you have.</li><li><strong>Tree species</strong> = <code>Age ÷ Diameter at breast height</code> — the form to use when Age and Diameter at breast height are the values you have.</li><li><strong>Diameter at breast height</strong> = <code>Circumference at breast height ÷ PI</code> — the form to use when Circumference at breast height are the values you have.</li><li><strong>Circumference at breast height</strong> = <code>PI × Diameter at breast height</code> — the form to use when Diameter at breast height are the values you have.</li><li><strong>Tree species</strong> = <code>Growth factor</code> — the form to use when Growth factor are the values you have.</li><li><strong>Growth factor</strong> = <code>Tree species</code> — the form to use when Tree species are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Age, Diameter at breast height and Tree species can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Tree species from 4 to 8, leaving every other box alone. The panel moves from <strong>Diameter at breast height</strong> 7.922e-8 cm, <strong>Circumference at breast height</strong> 2.489e-7 cm and <strong>Growth factor</strong> 4 to <strong>Diameter at breast height</strong> 3.961e-8 cm, <strong>Circumference at breast height</strong> 1.244e-7 cm and <strong>Growth factor</strong> 8.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Circumference at breast height, Diameter at breast height and Age carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Growth factor is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Tree species left as a guess.</strong> Anything typed into Tree species is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Circumference at breast height left as a guess.</strong> Anything typed into Circumference at breast height is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Tree species to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Tree age form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Tree species</strong> takes a plain number with no unit attached. It feeds Diameter at breast height, Age and Growth factor. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Tree species is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Circumference at breast height</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Breast height is 4.5 ft or 1.3 m from the ground. It feeds Diameter at breast height. Fill it from a measurement rather than a memory — Circumference at breast height is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Diameter at breast height</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Breast height is 4.5 ft or 1.3 m from the ground. It feeds Tree species, Age and Circumference at breast height. Fill it from a measurement rather than a memory — Diameter at breast height is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Age</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. It feeds Diameter at breast height and Tree species. Fill it from a measurement rather than a memory — Age is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Growth factor</strong> is a plain number and the page's own defaults put it at 4. It is worked out from Tree species. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Diameter at breast height</th><th>Circumference at breast height</th><th>Growth factor</th></tr></thead><tbody><tr><td><strong>Tree species</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>+10%</td></tr><tr><td><strong>Age</strong> +10%</td><td>+10%</td><td>+10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Tree species: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Tree species = 2 and Age = 5 yrs and the page reports <strong>Diameter at breast height</strong> = 7.922e-8 cm, <strong>Circumference at breast height</strong> = 2.489e-7 cm and <strong>Growth factor</strong> = 2.</li><li>Feed in Tree species = 12 and Age = 10 yrs and the page reports <strong>Diameter at breast height</strong> = 2.641e-8 cm, <strong>Circumference at breast height</strong> = 8.296e-8 cm and <strong>Growth factor</strong> = 12.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Tree age actually offers.</p><ul><li><strong>centimeters</strong> — opens in <em>cm</em>, and the chip also carries cm, m, in, ft, yd and μm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Growth factor is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover centimeters and years. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Tree species, Circumference at breast height and Diameter at breast height measured, Growth factor wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tree age calculator work out?', 'a' => 'Growth factor, from Diameter at breast height and Tree species. The relationship is Age = Diameter at breast height × Tree species.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Tree species, Circumference at breast height (centimeters), Diameter at breast height (centimeters), Age (years). Enter tree species, circumference at breast height and diameter at breast height; Growth factor is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Age, Diameter at breast height, Tree species and Circumference at breast height can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Diameter at breast height = 7.922e-8 cm, Circumference at breast height = 2.489e-7 cm and Growth factor = 4. That comes from the page's own defaults, entered in Tree species; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Growth factor is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Tree species blank and the page solves for it, reporting Growth factor instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Growth factor keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/sheep-gestation', 'name' => 'Sheep gestation Calculator'],
            ['path' => '/biology/simpson-diversity-index', 'name' => 'Simpson\'s Diversity Index Calculator'],
            ['path' => '/biology/svi-sludge-volume-index', 'name' => 'Sludge Volume Index (SVI) Calculator'],
        ],
        'authors' => [],
    ],
];

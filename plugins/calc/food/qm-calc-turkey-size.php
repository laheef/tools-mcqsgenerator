<?php

/**
 * Turkey size
 * /food/turkey-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Turkey size',
    'meta' => ['title' => 'Turkey size Calculator: Formula, Steps & Examples', 'description' => 'Estimate turkey size from adult and child guest counts, with room to plan leftovers. Follow safe-handling directions and verify doneness with a thermometer.', 'h1' => 'Turkey size Calculator', 'updated' => '2024-08-05'],
    'sections' => [
        [
            'title' => 'Turkey meal details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'adult',
                            'label' => 'Number of adults',
                            'type' => 'number',
                            'suffix' => '#',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'child',
                            'label' => 'Number of children',
                            'type' => 'number',
                            'suffix' => '#',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'leftover',
                            'label' => 'Any leftovers?',
                            'type' => 'select',
                            'options' => ['No' => '1.000000000000000', 'Yes' => '1.500000000000000'],
                            'dataset' => 'leftovers',
                            'help' => 'Choose "Yes" if you need a bigger bird to get some leftovers.',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'turkeyWeight',
                            'label' => 'Turkey weight',
                            'type' => 'number',
                            'help' => 'Weight of the entire bird needed.',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Thawing time',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'thawingTimeFridge',
                            'label' => 'Inside the fridge',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'thawingTimeWater',
                            'label' => 'In cold water',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Cooking time',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cookingTime',
                            'label' => 'Unstuffed turkey',
                            'type' => 'number',
                            'help' => 'Rough estimate; cook at 325°F (163°C)',
                            'unit' => '19',
                            'unit_default' => 'hrsmin',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cookingTimeStuffed',
                            'label' => 'Stuffed turkey',
                            'type' => 'number',
                            'help' => 'Rough estimate; cook at 325°F (163°C). Make sure that the filling of the turkey will reach 165°F (74°C)',
                            'unit' => '19',
                            'unit_default' => 'hrsmin',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => '((adult * 1) + (child* 0.5))*leftover = turkeyWeight',
            'results' => ['leftover' => '2*turkeyWeight/(2*adult + child)', 'turkeyWeight' => '(1/2)*leftover*(2*adult + child)', 'child' => '-2*adult + 2*turkeyWeight/leftover', 'adult' => '-1/2*child + turkeyWeight/leftover'],
        ],
        [
            'title' => 'thawingTimeFridge = turkeyWeight * 5 ',
            'results' => ['thawingTimeFridge' => '5*turkeyWeight', 'turkeyWeight' => '(1/5)*thawingTimeFridge'],
        ],
        [
            'title' => 'thawingTimeWater = turkeyWeight * 1',
            'results' => ['turkeyWeight' => 'thawingTimeWater', 'thawingTimeWater' => 'turkeyWeight'],
        ],
        [
            'title' => 'cookingTime = turkeyWeight * 15',
            'results' => ['turkeyWeight' => '(1/15)*cookingTime', 'cookingTime' => '15*turkeyWeight'],
        ],
        [
            'title' => 'cookingTimeStuffed = turkeyWeight * 17.5',
            'results' => ['turkeyWeight' => '(2/35)*cookingTimeStuffed', 'cookingTimeStuffed' => '(35/2)*turkeyWeight'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Turkey weight into Turkey size and the answer comes back as Number of adults and Number of children. There is no hidden constant here: change number of adults and turkey weight moves with it. The main result, Number of adults, is reported in #.
        TXT,
        'sections' => [
            ['title' => 'How the Turkey size calculator works', 'html' => <<<'TXT'
            <p>The Turkey size calculator applies one relationship to 1 number and reports Number of adults, Number of children and Any leftovers?.</p><p>The relationship it solves reads Any leftovers? = 2 × Turkey weight ÷ (2 × Number of adults + Number of children).</p><p>The result panel carries Number of adults, Number of children, Any leftovers? and Inside the fridge, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Turkey weight</strong> — in kilograms. Weight of the entire bird needed.</li></ul><p>What you get back is Number of adults in #, Number of children in #, Any leftovers?, Inside the fridge in hours, In cold water in hours, Unstuffed turkey in hours / minutes, Stuffed turkey in hours / minutes, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Number of adults = 10 #, Number of children = 100 #, Any leftovers? = 1, Turkey weight = 1000 kg, In cold water = 10 hrs, Unstuffed turkey = 100 hrsmin and Stuffed turkey = 1000 hrsmin; the answers are <strong>Inside the fridge</strong> = 5000 hrs.</p><ul><li><strong>Inside the fridge</strong> = 5000 hrs</li></ul><p>That is <strong>Any leftovers?</strong> = <code>2 × Turkey weight ÷ (2 × Number of adults + Number of children)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Inside the fridge</strong> = 5000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Inside the fridge lists 8 options and opens on hours. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Any leftovers?</strong> = <code>2 × Turkey weight ÷ (2 × Number of adults + Number of children)</code></li><li><strong>Turkey weight</strong> = <code>(1 ÷ 2) × Any leftovers? × (2 × Number of adults + Number of children)</code></li><li><strong>Number of children</strong> = <code>− 2 × Number of adults + 2 × Turkey weight ÷ Any leftovers?</code></li><li><strong>Number of adults</strong> = <code>− 1 ÷ 2 × Number of children + Turkey weight ÷ Any leftovers?</code></li><li><strong>Inside the fridge</strong> = <code>5 × Turkey weight</code></li><li><strong>In cold water</strong> = <code>Turkey weight</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Any leftovers?</strong> = <code>2 × Turkey weight ÷ (2 × Number of adults + Number of children)</code> — the form to use when Turkey weight, Number of adults and Number of children are the values you have.</li><li><strong>Turkey weight</strong> = <code>(1 ÷ 2) × Any leftovers? × (2 × Number of adults + Number of children)</code> — the form to use when Any leftovers?, Number of adults and Number of children are the values you have.</li><li><strong>Number of children</strong> = <code>− 2 × Number of adults + 2 × Turkey weight ÷ Any leftovers?</code> — the form to use when Number of adults, Turkey weight and Any leftovers? are the values you have.</li><li><strong>Number of adults</strong> = <code>− 1 ÷ 2 × Number of children + Turkey weight ÷ Any leftovers?</code> — the form to use when Number of children, Turkey weight and Any leftovers? are the values you have.</li><li><strong>Inside the fridge</strong> = <code>5 × Turkey weight</code> — the form to use when Turkey weight are the values you have.</li><li><strong>Turkey weight</strong> = <code>(1 ÷ 5) × Inside the fridge</code> — the form to use when Inside the fridge are the values you have.</li><li><strong>In cold water</strong> = <code>Turkey weight</code> — the form to use when Turkey weight are the values you have.</li><li><strong>Turkey weight</strong> = <code>In cold water</code> — the form to use when In cold water are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Any leftovers?, Turkey weight and Number of children can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Number of adults from 10 to 20, leaving every other box alone. The panel moves from <strong>Inside the fridge</strong> 5000 hrs to <strong>Inside the fridge</strong> 5000 hrs.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Turkey weight carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Number of adults, Number of children and Any leftovers? are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Turkey weight left as a guess.</strong> Anything typed into Turkey weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> If Turkey weight is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Turkey size form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Turkey weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. Weight of the entire bird needed. It feeds Any leftovers?, Number of children and Number of adults. Fill it from a measurement rather than a memory — Turkey weight is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p> Read them in this order:</p><ul><li><strong>Number of adults</strong> is a plain number. It is computed from Number of children, Turkey weight and Any leftovers?, so it changes the moment any of them does. </li><li><strong>Number of children</strong> is a plain number. It is computed from Number of adults, Turkey weight and Any leftovers?, so it changes the moment any of them does. </li><li><strong>Any leftovers?</strong> is a plain number. It is computed from Turkey weight, Number of adults and Number of children, so it changes the moment any of them does. </li><li><strong>Inside the fridge</strong> is a hours figure and the page's own defaults put it at 5000 hrs. It is computed from Turkey weight, so it changes the moment any of them does. </li><li><strong>In cold water</strong> is a hours figure. It is computed from Turkey weight, so it changes the moment any of them does. </li><li><strong>Unstuffed turkey</strong> is a hours / minutes figure. It is computed from Turkey weight, so it changes the moment any of them does. </li><li><strong>Stuffed turkey</strong> is a hours / minutes figure. It is computed from Turkey weight, so it changes the moment any of them does. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Inside the fridge</th></tr></thead><tbody><tr><td><strong>Number of adults</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Number of children</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Any leftovers?</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Turkey weight</strong> +10%</td><td>+10%</td></tr><tr><td><strong>In cold water</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Unstuffed turkey</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Stuffed turkey</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Turkey weight: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Number of adults, Number of children and Any leftovers? barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. </p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Turkey size actually offers.</p><ul><li><strong>hours</strong> — opens in <em>hrs</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>kilograms</strong> — opens in <em>kg</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Number of adults is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are hours and kilograms and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Turkey weight are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Turkey weight is what you already know and Number of adults and Number of children is what you need — the reverse of that situation is what the rearranged form is for.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/steak-cook-time">Steak cook time Calculator</a>, <a href="/food/sulfur">Sulfur Calculator</a> and <a href="/food/taco-bar">Taco bar Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Turkey size calculator work out?', 'a' => <<<'TXT'
            Number of adults, Number of children, Any leftovers? and Inside the fridge, from Turkey weight, Number of adults and Number of children. The relationship is Any leftovers? = 2 × Turkey weight ÷ (2 × Number of adults + Number of children).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Turkey weight (kilograms). Enter turkey weight; Number of adults is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Any leftovers?, Turkey weight, Number of children and Number of adults can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'Are the Turkey size results exact?', 'a' => 'No. The time is an estimate from the listed inputs and cannot account for every appliance, starting temperature or portion. Follow product directions and verify safe doneness with a thermometer where relevant.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Number of adults is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Turkey weight blank and the page solves for it, reporting Number of adults instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Number of adults keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/turkey-cooking-time', 'name' => 'Turkey cooking time'],
            ['path' => '/food/turkey-thawing', 'name' => 'Turkey thawing'],
            ['path' => '/food/how-much-ham-per-person', 'name' => 'How much ham per person']
        ],
    ],
];

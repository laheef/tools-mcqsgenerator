<?php

/**
 * Party drink
 * /food/party-drink
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Party drink',
    'meta' => ['title' => 'Party drink Calculator: Formula, Steps & Examples', 'description' => 'Estimate beer, wine, spirits and soft drinks for a party from guest count and event details. Use as a planning guide; adjust for your guests and menu.', 'h1' => 'Party drink Calculator', 'updated' => '2026-07-30'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'drinkWater',
                            'label' => 'Do you know who will drink what?',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'dataset' => 'yesNoOption',
                            'control' => 'DROPDOWN',
                            'help' => 'Can you safely say that a given number of people will surely drink a certain type of alcohol, or do you need more general estimation?',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hours',
                            'label' => 'Party duration',
                            'type' => 'number',
                            'suffix' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Will your guests drink...',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wantBeer',
                            'label' => ' Beer?',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'dataset' => 'yesNoOption',
                            'control' => 'DROPDOWN',
                            'default' => 'Yes',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beerDrinkers',
                            'label' => 'Beer drinkers',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wantWine',
                            'label' => ' Wine?',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'dataset' => 'yesNoOption',
                            'control' => 'DROPDOWN',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wineDrinkers',
                            'label' => 'Wine drinkers',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wantVodka',
                            'label' => ' Hard liquor?',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'dataset' => 'yesNoOption',
                            'control' => 'DROPDOWN',
                            'help' => 'This means any liquor with alcohol content of about 30% and higher, also served as a base for drinks.',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'vodkaDrinkers',
                            'label' => 'Hard liquor drinkers',
                            'type' => 'number',
                            'help' => 'Including people who go for mixed drinks based on hard liquor.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wantSoft',
                            'label' => ' Soft drinks?',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'dataset' => 'yesNoOption',
                            'control' => 'DROPDOWN',
                            'help' => 'Including both abstinents and guests who want to drink non-alcoholic beverages on top of the alcohol.',
                            'default' => 'Yes',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'softGuests',
                            'label' => 'Soft beverage drinkers',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beer',
                            'label' => 'Beer needed',
                            'type' => 'number',
                            'unit' => '70',
                            'unit_default' => 'lb500',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wine',
                            'label' => 'Wine bottles needed',
                            'type' => 'number',
                            'help' => 'Standard 750ml bottles.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'vodka',
                            'label' => 'Hard liquor needed',
                            'type' => 'number',
                            'unit' => '317',
                            'unit_default' => 'shots',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'soft',
                            'label' => 'Soft drinks needed',
                            'type' => 'number',
                            'suffix' => '½ l / 16 oz servings',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Party details ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'guests',
                            'label' => 'Total number of guests',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalSoftGuests',
                            'label' => 'Number of guests who drink softs',
                            'type' => 'number',
                            'help' => 'Including both abstinents and guests who want to drink non-alcoholic beverages on top of the alcohol.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalHours',
                            'label' => 'Party duration',
                            'type' => 'number',
                            'suffix' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalBeer',
                            'label' => ' Beer needed',
                            'type' => 'number',
                            'unit' => '70',
                            'unit_default' => 'lb500',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalWineGlasses',
                            'label' => ' Wine glasses needed',
                            'type' => 'number',
                            'help' => 'Tied to the result below. One serving of wine is typically about 150ml.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalWineBottles',
                            'label' => ' Wine bottles needed',
                            'type' => 'number',
                            'help' => 'Tied to the result above. Standard 750ml bottles.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalLiquorShots',
                            'label' => ' Hard liquor needed',
                            'type' => 'number',
                            'suffix' => 'shots',
                            'help' => 'A standard shot is about 1½ oz / 45 ml. This fields concerns any liquor with alcohol content of about 30% and higher, also served as a base for drinks.',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalSoft',
                            'label' => ' Soft drinks needed',
                            'type' => 'number',
                            'suffix' => '½ l / 16 oz servings',
                            'help' => '½ l / 16 oz servings',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalDrinks',
                            'label' => 'Totaldrinks',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'beer = ceil(beerDrinkers * hours)',
            'results' => ['beer' => 'ceil(beerDrinkers*hours)'],
        ],
        [
            'title' => 'wine = ceil((1 / 2) * ceil (wineDrinkers / 2.15))',
            'results' => ['wine' => 'ceil((1/2)*ceil((20/43)*wineDrinkers))'],
        ],
        [
            'title' => 'vodka = ceil(0.5 * vodkaDrinkers)',
            'results' => ['vodka' => 'ceil((1/2)*vodkaDrinkers)'],
        ],
        [
            'title' => 'totalDrinks = guests * totalHours',
            'results' => ['guests' => 'totalDrinks/totalHours', 'totalDrinks' => 'guests*totalHours', 'totalHours' => 'totalDrinks/guests'],
        ],
        [
            'title' => 'totalBeer = ceil(totalDrinks * (4/10))',
            'results' => ['totalBeer' => 'ceil((2/5)*totalDrinks)'],
        ],
        [
            'title' => 'totalWineGlasses = ceil((totalDrinks - totalBeer) * (6/10))',
            'results' => ['totalWineGlasses' => 'ceil((3/5)*totalDrinks - 3/5*ceil((2/5)*totalDrinks))'],
        ],
        [
            'title' => 'totalWineBottles = (ceil((totalDrinks - totalBeer) * (6/10))) / 5',
            'results' => ['totalWineBottles' => '(1/5)*ceil((3/5)*totalDrinks - 3/5*ceil((2/5)*totalDrinks))'],
        ],
        [
            'title' => 'totalLiquorShots = ceil((totalDrinks - totalBeer - totalWineGlasses))',
            'results' => ['totalLiquorShots' => 'ceil(totalDrinks - ceil((2/5)*totalDrinks) - ceil((3/5)*totalDrinks - 3/5*ceil((2/5)*totalDrinks)))'],
        ],
        [
            'title' => 'soft = ceil(softGuests * (hours + 1))  ',
            'results' => ['soft' => 'ceil(softGuests*(hours + 1))'],
        ],
        [
            'title' => 'totalSoft = ceil(totalSoftGuests * (totalHours + 1))',
            'results' => ['totalSoft' => 'ceil(totalSoftGuests*(totalHours + 1))'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Party drink works out Beer needed and Wine bottles needed from Beer drinkers. It is a single relationship that reads beer needed out of beer drinkers, not a table of canned results keyed by them. Units for Beer needed default to 500 ml and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Party drink calculator works', 'html' => <<<'TXT'
            <p>Party drink answers one question from 2 numbers, and the answer is Beer needed, Wine bottles needed and Hard liquor needed.</p><p>The relationship it solves reads Beer needed = ceil(Beer drinkers × Party duration).</p><p>The answers are Beer needed, Wine bottles needed, Hard liquor needed and Soft drinks needed; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Party duration</strong> — in hrs</li><li><strong>Beer drinkers</strong> — a plain number, no unit</li></ul><p>The answers come back as Beer needed in 500 ml, Wine bottles needed, Hard liquor needed in standard shots, Soft drinks needed in ½ l / 16 oz servings, Total number of guests, Party duration in hrs, Beer needed in 500 ml, Wine glasses needed, Wine bottles needed, Hard liquor needed in shots, Soft drinks needed in ½ l / 16 oz servings, Totaldrinks. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Do you know who will drink what? = 0, Party duration = 3 hrs, Beer? = 1, Beer drinkers = 4, Wine? = 0, Wine drinkers = 5, Hard liquor? = 0, Hard liquor drinkers = 6, Soft drinks? = 1, Soft beverage drinkers = 7 and Number of guests who drink softs = 8 — through the same formula and the panel reports <strong>Beer needed</strong> = 12 lb500, <strong>Wine bottles needed</strong> = 2, <strong>Hard liquor needed</strong> = 3 shots and <strong>Soft drinks needed</strong> = 28 ½ l / 16 oz servings.</p><ul><li><strong>Beer needed</strong> = 12 lb500</li><li><strong>Wine bottles needed</strong> = 2</li><li><strong>Hard liquor needed</strong> = 3 shots</li><li><strong>Soft drinks needed</strong> = 28 ½ l / 16 oz servings</li></ul><p>The line behind those figures is <strong>Beer needed</strong> = <code>ceil(Beer drinkers × Party duration)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Beer needed</strong> = 12, <strong>Wine bottles needed</strong> = 2, <strong>Hard liquor needed</strong> = 3 and <strong>Soft drinks needed</strong> = 28. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Beer needed lists 14 options and opens on 500 ml. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Beer needed</strong> = <code>ceil(Beer drinkers × Party duration)</code></li><li><strong>Wine bottles needed</strong> = <code>ceil((1 ÷ 2) × ceil((20 ÷ 43) × Wine drinkers))</code></li><li><strong>Hard liquor needed</strong> = <code>ceil((1 ÷ 2) × Hard liquor drinkers)</code></li><li><strong>Totaldrinks</strong> = <code>Total number of guests × Party duration</code></li><li><strong>Total number of guests</strong> = <code>Totaldrinks ÷ Party duration</code></li><li><strong>Party duration</strong> = <code>Totaldrinks ÷ Total number of guests</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Beer needed</strong> = <code>ceil(Beer drinkers × Party duration)</code> — the form to use when Beer drinkers and Party duration are the values you have.</li><li><strong>Wine bottles needed</strong> = <code>ceil((1 ÷ 2) × ceil((20 ÷ 43) × Wine drinkers))</code> — the form to use when Wine drinkers are the values you have.</li><li><strong>Hard liquor needed</strong> = <code>ceil((1 ÷ 2) × Hard liquor drinkers)</code> — the form to use when Hard liquor drinkers are the values you have.</li><li><strong>Totaldrinks</strong> = <code>Total number of guests × Party duration</code> — the form to use when Total number of guests and Party duration are the values you have.</li><li><strong>Total number of guests</strong> = <code>Totaldrinks ÷ Party duration</code> — the form to use when Totaldrinks and Party duration are the values you have.</li><li><strong>Party duration</strong> = <code>Totaldrinks ÷ Total number of guests</code> — the form to use when Totaldrinks and Total number of guests are the values you have.</li><li><strong>Beer needed</strong> = <code>ceil((2 ÷ 5) × Totaldrinks)</code> — the form to use when Totaldrinks are the values you have.</li><li><strong>Wine glasses needed</strong> = <code>ceil((3 ÷ 5) × Totaldrinks − 3 ÷ 5 × ceil((2 ÷ 5) × Totaldrinks))</code> — the form to use when Totaldrinks are the values you have.</li></ul><p>Any one of Beer needed, Wine bottles needed and Hard liquor needed can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Beer needed, Wine bottles needed and Hard liquor needed are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Party duration left as a guess.</strong> Anything typed into Party duration is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Beer drinkers left as a guess.</strong> Anything typed into Beer drinkers is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> If Party duration is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Party duration</strong> is measured in hrs. The page reads it when it works out Beer needed and Soft drinks needed. Check the field label and unit before calculating.</li><li><strong>Beer drinkers</strong> takes a plain number with no unit attached. The page reads it when it works out Beer needed. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 12 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Beer needed</strong> is a 500 ml figure and the page's own defaults put it at 12 lb500. The value follows from Beer drinkers and Party duration. </li><li><strong>Wine bottles needed</strong> is a plain number and the page's own defaults put it at 2. The value follows from Wine drinkers. </li><li><strong>Hard liquor needed</strong> is a standard shots figure and the page's own defaults put it at 3 shots. The value follows from Hard liquor drinkers. </li><li><strong>Soft drinks needed</strong> is a plain number and the page's own defaults put it at 28. The value follows from Soft beverage drinkers and Party duration. </li><li><strong>Total number of guests</strong> is a plain number. The value follows from Totaldrinks and Party duration. </li><li><strong>Party duration</strong> is a plain number. The value follows from Totaldrinks and Total number of guests. </li><li><strong>Beer needed</strong> is a 500 ml figure. The value follows from Totaldrinks. </li><li><strong>Wine glasses needed</strong> is a plain number. The value follows from Totaldrinks. </li><li><strong>Wine bottles needed</strong> is a plain number. The value follows from Totaldrinks. </li><li><strong>Hard liquor needed</strong> is a plain number. The value follows from Totaldrinks. </li><li><strong>Soft drinks needed</strong> is a plain number. The value follows from Number of guests who drink softs and Party duration. </li><li><strong>Totaldrinks</strong> is a plain number. The value follows from Total number of guests and Party duration. </li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Beer needed is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover 500 ml and standard shots. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Party duration and Beer drinkers measured, Beer needed and Wine bottles needed wanted.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/salad-calories">Salad calories Calculator</a>, <a href="/food/self-rising-flour">Self-rising flour Calculator</a> and <a href="/food/sourdough">Sourdough Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Party drink calculator work out?', 'a' => <<<'TXT'
            Beer needed, Wine bottles needed, Hard liquor needed and Soft drinks needed, from Beer drinkers and Party duration. The relationship is Beer needed = ceil(Beer drinkers × Party duration).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Party duration (hrs), Beer drinkers. Enter party duration and beer drinkers; Beer needed is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Beer needed, Wine bottles needed, Hard liquor needed and Totaldrinks blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'Are the Party drink results exact?', 'a' => 'No. It estimates from the guest count and selections shown; appetite, menu, portions and serving style vary. Use the result as a planning starting point and adjust for your event.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Beer needed is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Party duration left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Beer needed keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/wedding-alcohol', 'name' => 'Wedding alcohol'],
            ['path' => '/food/chilled-drink', 'name' => 'Chilled drink'],
            ['path' => '/food/beer-pong', 'name' => 'Beer pong']
        ],
    ],
];

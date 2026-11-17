<?php

/**
 * Wedding alcohol
 * /food/wedding-alcohol
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Wedding alcohol',
    'meta' => ['title' => 'Wedding alcohol Calculator — Formula, Units & Example', 'description' => 'Estimate wine, beer, spirits and non-alcoholic drinks for a wedding from guest numbers and preferences. Check units and follow the recipe or package directions.', 'h1' => 'Wedding alcohol Calculator', 'updated' => '2026-07-30'],
    'sections' => [
        [
            'title' => 'Do you want to serve:',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wineq',
                            'label' => 'Wine?',
                            'type' => 'select',
                            'options' => ['Yes' => '1.000000000000000', 'No' => '0.000000000000000'],
                            'dataset' => 'yes/no',
                            'default' => 'Yes',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beerq',
                            'label' => 'Beer?',
                            'type' => 'select',
                            'options' => ['Yes' => '1.000000000000000', 'No' => '0.000000000000000'],
                            'dataset' => 'yes/no',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'vodkaq',
                            'label' => 'Vodka?',
                            'type' => 'select',
                            'options' => ['Yes' => '1.000000000000000', 'No' => '0.000000000000000'],
                            'dataset' => 'yes/no',
                            'help' => 'For other spirits, check the other kinds of alcohol section.',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'champagneq',
                            'label' => 'Champagne for toasting?',
                            'type' => 'select',
                            'options' => ['Yes' => '1.000000000000000', 'No' => '0.000000000000000'],
                            'dataset' => 'yes/no',
                            'default' => 'Yes',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Wine',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wine_drinkers',
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
                            'name' => 'winebottles_total',
                            'label' => 'Wine bottles',
                            'type' => 'number',
                            'help' => 'Standard 750ml bottles',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'red_wine',
                            'label' => 'Red wine bottles',
                            'type' => 'number',
                            'help' => 'Standard 750ml bottles',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'white_wine',
                            'label' => 'White wine bottles',
                            'type' => 'number',
                            'help' => 'Standard 750ml bottles',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Beer',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beer_drinkers',
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
                            'name' => 'n_of_hours',
                            'label' => 'Reception duration',
                            'type' => 'number',
                            'suffix' => 'h',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beer',
                            'label' => 'Beer',
                            'type' => 'number',
                            'unit' => '70',
                            'unit_default' => 'lb500',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Vodka',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'vodka_drinkers',
                            'label' => 'Vodka drinkers',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'vodka',
                            'label' => 'Vodka',
                            'type' => 'number',
                            'suffix' => 'liters',
                            'help' => 'Vodka typically comes in 0.5-liter bottles, so you should buy one 0.5L bottle per person',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Champagne (for toasts)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'champagne_drinkers',
                            'label' => 'Champagne drinkers',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'champagne_type',
                            'label' => 'Champagne type',
                            'type' => 'select',
                            'options' => ['standard' => '9.000000000000000', 'sparkling wine' => '7.000000000000000'],
                            'dataset' => 'champagne_type',
                            'control' => 'DROPDOWN',
                            'default' => 'standard',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'champagne_bottles',
                            'label' => 'Champagne bottles',
                            'type' => 'number',
                            'help' => 'Standard 750ml bottles',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'red_wine = ceil ( (1 / 2) * ceil (wine_drinkers / 2.15) )',
            'results' => ['red_wine' => 'ceil((1/2)*ceil((20/43)*wine_drinkers))'],
        ],
        [
            'title' => 'white_wine = ceil ( (1 / 2) * ceil (wine_drinkers / 2.15) )',
            'results' => ['white_wine' => 'ceil((1/2)*ceil((20/43)*wine_drinkers))'],
        ],
        [
            'title' => 'beer = ceil (beer_drinkers * n_of_hours)',
            'results' => ['beer' => 'ceil(beer_drinkers*n_of_hours)'],
        ],
        [
            'title' => 'champagne_bottles = ceil (champagne_drinkers / champagne_type)',
            'results' => ['champagne_bottles' => 'ceil(champagne_drinkers/champagne_type)'],
        ],
        [
            'title' => 'vodka = 0.5 * vodka_drinkers',
            'results' => ['vodka' => '(1/2)*vodka_drinkers', 'vodka_drinkers' => '2*vodka'],
        ],
        [
            'title' => 'winebottles_total = 2 * ceil ( ceil (wine_drinkers / 2.15) / 2 )',
            'results' => ['winebottles_total' => '2*ceil((1/2)*ceil((20/43)*wine_drinkers))'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Wine drinkers into Wedding alcohol and the answer comes back as Wine bottles and Red wine bottles. It is a single relationship that reads wine bottles out of wine drinkers, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Wedding alcohol calculator works', 'html' => <<<'TXT'
            <p>The Wedding alcohol calculator applies one relationship to 1 number and reports Wine bottles, Red wine bottles and White wine bottles.</p><p>Written with the labels from the form, Red wine bottles = ceil((1 ÷ 2) × ceil((20 ÷ 43) × Wine drinkers)).</p><p>The result panel carries Wine bottles, Red wine bottles, White wine bottles and Beer, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Wine drinkers</strong> — a plain number, no unit</li></ul><p>The answers come back as Wine bottles, Red wine bottles, White wine bottles, Beer in 500 ml, Vodka drinkers, Vodka in liters, Champagne bottles. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Wine? = 1, Beer? = 0, Vodka? = 0, Champagne for toasting? = 1, Wine drinkers = 3, Beer drinkers = 4, Reception duration = 5 h, Champagne drinkers = 6 and Champagne type = 9 — through the same formula and the panel reports <strong>Red wine bottles</strong> = 1, <strong>White wine bottles</strong> = 1, <strong>Beer</strong> = 20 lb500, <strong>Champagne bottles</strong> = 1 and <strong>Wine bottles</strong> = 2.</p><ul><li><strong>Red wine bottles</strong> = 1</li><li><strong>White wine bottles</strong> = 1</li><li><strong>Beer</strong> = 20 lb500</li><li><strong>Champagne bottles</strong> = 1</li><li><strong>Wine bottles</strong> = 2</li></ul><p>The line behind those figures is <strong>Red wine bottles</strong> = <code>ceil((1 ÷ 2) × ceil((20 ÷ 43) × Wine drinkers))</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Red wine bottles</strong> = 1, <strong>White wine bottles</strong> = 1, <strong>Beer</strong> = 20, <strong>Champagne bottles</strong> = 1 and <strong>Wine bottles</strong> = 2. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Beer lists 14 options and opens on 500 ml. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Red wine bottles</strong> = <code>ceil((1 ÷ 2) × ceil((20 ÷ 43) × Wine drinkers))</code></li><li><strong>White wine bottles</strong> = <code>ceil((1 ÷ 2) × ceil((20 ÷ 43) × Wine drinkers))</code></li><li><strong>Beer</strong> = <code>ceil(Beer drinkers × Reception duration)</code></li><li><strong>Champagne bottles</strong> = <code>ceil(Champagne drinkers ÷ Champagne type)</code></li><li><strong>Vodka</strong> = <code>(1 ÷ 2) × Vodka drinkers</code></li><li><strong>Vodka drinkers</strong> = <code>2 × Vodka</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Red wine bottles</strong> = <code>ceil((1 ÷ 2) × ceil((20 ÷ 43) × Wine drinkers))</code> — the form to use when Wine drinkers are the values you have.</li><li><strong>White wine bottles</strong> = <code>ceil((1 ÷ 2) × ceil((20 ÷ 43) × Wine drinkers))</code> — the form to use when Wine drinkers are the values you have.</li><li><strong>Beer</strong> = <code>ceil(Beer drinkers × Reception duration)</code> — the form to use when Beer drinkers and Reception duration are the values you have.</li><li><strong>Champagne bottles</strong> = <code>ceil(Champagne drinkers ÷ Champagne type)</code> — the form to use when Champagne drinkers and Champagne type are the values you have.</li><li><strong>Vodka</strong> = <code>(1 ÷ 2) × Vodka drinkers</code> — the form to use when Vodka drinkers are the values you have.</li><li><strong>Vodka drinkers</strong> = <code>2 × Vodka</code> — the form to use when Vodka are the values you have.</li><li><strong>Wine bottles</strong> = <code>2 × ceil((1 ÷ 2) × ceil((20 ÷ 43) × Wine drinkers))</code> — the form to use when Wine drinkers are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Red wine bottles, White wine bottles and Beer can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Wine? from 1 to 2, leaving every other box alone. The panel moves from <strong>Red wine bottles</strong> 1, <strong>White wine bottles</strong> 1, <strong>Beer</strong> 20 lb500, <strong>Champagne bottles</strong> 1 and <strong>Wine bottles</strong> 2 to <strong>Red wine bottles</strong> 1, <strong>White wine bottles</strong> 1, <strong>Beer</strong> 20 lb500, <strong>Champagne bottles</strong> 1 and <strong>Wine bottles</strong> 2.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Wine bottles, Red wine bottles and White wine bottles are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Wine drinkers left as a guess.</strong> Anything typed into Wine drinkers is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Wine drinkers and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Wedding alcohol form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Wine drinkers</strong> takes a plain number with no unit attached. It feeds Red wine bottles, White wine bottles and Wine bottles. Fill it from a measurement rather than a memory — Wine drinkers is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p> Read them in this order:</p><ul><li><strong>Wine bottles</strong> is a plain number and the page's own defaults put it at 2. The value follows from Wine drinkers. </li><li><strong>Red wine bottles</strong> is a plain number and the page's own defaults put it at 1. The value follows from Wine drinkers. </li><li><strong>White wine bottles</strong> is a plain number and the page's own defaults put it at 1. The value follows from Wine drinkers. </li><li><strong>Beer</strong> is a 500 ml figure and the page's own defaults put it at 20 lb500. The value follows from Beer drinkers and Reception duration. </li><li><strong>Vodka drinkers</strong> is a plain number. The value follows from Vodka. </li><li><strong>Vodka</strong> is a plain number. The value follows from Vodka drinkers. </li><li><strong>Champagne bottles</strong> is a plain number and the page's own defaults put it at 1. The value follows from Champagne drinkers and Champagne type. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Red wine bottles</th><th>White wine bottles</th><th>Beer</th><th>Champagne bottles</th><th>Wine bottles</th></tr></thead><tbody><tr><td><strong>Wine?</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Champagne for toasting?</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Wine drinkers</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Beer drinkers</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Reception duration</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Champagne drinkers</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Champagne type</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Beer drinkers: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Wine?, Champagne for toasting? and Wine drinkers barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. </p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Wine? = 0.5, Beer? = 0, Vodka? = 0, Champagne for toasting? = 0.5, Wine drinkers = 1.5, Beer drinkers = 2, Reception duration = 2.5 h, Champagne drinkers = 3 and Champagne type = 4.5 and the page reports <strong>Red wine bottles</strong> = 1, <strong>White wine bottles</strong> = 1, <strong>Beer</strong> = 5 lb500, <strong>Champagne bottles</strong> = 1 and <strong>Wine bottles</strong> = 2.</li><li>Feed in Wine? = 3, Beer? = 0, Vodka? = 0, Champagne for toasting? = 1, Wine drinkers = 3, Beer drinkers = 4, Reception duration = 5 h, Champagne drinkers = 6 and Champagne type = 9 and the page reports <strong>Red wine bottles</strong> = 1, <strong>White wine bottles</strong> = 1, <strong>Beer</strong> = 20 lb500, <strong>Champagne bottles</strong> = 1 and <strong>Wine bottles</strong> = 2.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Wedding alcohol actually offers.</p><ul><li><strong>500 ml</strong> — opens in <em>lb500</em>, and the chip also carries standard cans, bombers, half pints, large kegs, l and pints. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Wine bottles is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are 500 ml and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Wine drinkers are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Wine drinkers and the number you are missing is Wine bottles and Red wine bottles.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/pizza-party">Pizza party Calculator</a>, <a href="/food/pizza">Pizza size Calculator</a> and <a href="/food/popcorn">Popcorn Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Wedding alcohol calculator work out?', 'a' => <<<'TXT'
            Wine bottles, Red wine bottles, White wine bottles and Beer, from Wine drinkers. The relationship is Red wine bottles = ceil((1 ÷ 2) × ceil((20 ÷ 43) × Wine drinkers)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Wine drinkers. Fill wine drinkers and leave Wine bottles empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Red wine bottles, White wine bottles, Beer and Champagne bottles can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'Are the Wedding alcohol results exact?', 'a' => 'No. It estimates from the guest count and selections shown; appetite, menu, portions and serving style vary. Use the result as a planning starting point and adjust for your event.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Wine bottles is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Wine drinkers blank and the page solves for it, reporting Wine bottles instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Wine bottles keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/party-drink', 'name' => 'Party drink'],
            ['path' => '/food/alcohol-by-volume', 'name' => 'ABV'],
            ['path' => '/food/beer-pong', 'name' => 'Beer pong']
        ],
    ],
];

<?php

/**
 * Sod
 * /biology/sod
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sod',
    'meta' => ['title' => 'Sod Calculator — Free, With Worked Examples', 'description' => 'Sod works out total area and area waste from length, width and waste factor. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Sod Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'area' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'area_waste' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'roll_area' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'roll_length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '2', 'c' => null],
                    ['v' => '6', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'roll_number' => [
                'type' => 'numerical',
                'rnd' => ['standard', '1'],
            ],
            'roll_price' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'roll_width' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '0.5', 'c' => null],
                    ['v' => '1.5', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'total_area' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total_cost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'waste_factor' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '10', 'c' => null],
                ],
            ],
            'width' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'joIFKsDR-AANA0ttc4cPl',
                'title' => 'Field parameters',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'length',
                                    'vt' => 'numerical',
                                    'l' => 'Length',
                                    'us' => '4',
                                    'du' => 'm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'width',
                                    'vt' => 'numerical',
                                    'l' => 'Width',
                                    'us' => '4',
                                    'du' => 'm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'area',
                                    'vt' => 'numerical',
                                    'l' => 'Total area',
                                    'us' => '28',
                                    'du' => 'm2',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'waste_factor',
                                    'vt' => 'numerical',
                                    'l' => 'Waste factor',
                                    'h' => 'Additional percentage amount of material that will be wasted.',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'area_waste', 'vt' => 'numerical', 'l' => 'Area waste'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'total_area', 'vt' => 'numerical', 'l' => 'Total sod area'],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'MqVxqWiFOOaTtjpJqIChH',
                'title' => 'Roll parameters',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'roll_length', 'vt' => 'numerical', 'l' => 'Roll length'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'roll_width', 'vt' => 'numerical', 'l' => 'Roll width'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'roll_area', 'vt' => 'numerical', 'l' => 'Roll area'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'roll_price',
                                    'vt' => 'numerical',
                                    'l' => 'Roll price',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'U7c3isL8qcCCv8XgjPFLL',
                'title' => 'Results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'roll_number', 'vt' => 'numerical', 'l' => 'Number of rolls'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'total_cost',
                                    'vt' => 'numerical',
                                    'l' => 'Total cost',
                                    'us' => '663',
                                    'du' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'area = length * width',
                'var' => [
                    [
                        'l' => 'length',
                        'f' => 'area/width',
                        'r' => ['width', 'area'],
                    ],
                    [
                        'l' => 'width',
                        'f' => 'area/length',
                        'r' => ['length', 'area'],
                    ],
                    [
                        'l' => 'area',
                        'f' => 'length*width',
                        'r' => ['length', 'width'],
                    ],
                ],
            ],
            [
                'formula' => 'roll_area = roll_length * roll_width',
                'var' => [
                    [
                        'l' => 'roll_area',
                        'f' => 'roll_length*roll_width',
                        'r' => ['roll_width', 'roll_length'],
                    ],
                    [
                        'l' => 'roll_width',
                        'f' => 'roll_area/roll_length',
                        'r' => ['roll_area', 'roll_length'],
                    ],
                    [
                        'l' => 'roll_length',
                        'f' => 'roll_area/roll_width',
                        'r' => ['roll_area', 'roll_width'],
                    ],
                ],
            ],
            [
                'formula' => 'area_waste= area * waste_factor',
                'var' => [
                    [
                        'l' => 'area_waste',
                        'f' => 'area*waste_factor',
                        'r' => ['area', 'waste_factor'],
                    ],
                    [
                        'l' => 'area',
                        'f' => 'area_waste/waste_factor',
                        'r' => ['area_waste', 'waste_factor'],
                    ],
                    [
                        'l' => 'waste_factor',
                        'f' => 'area_waste/area',
                        'r' => ['area_waste', 'area'],
                    ],
                ],
            ],
            [
                'formula' => 'total_area = area + area_waste',
                'var' => [
                    [
                        'l' => 'area_waste',
                        'f' => '-area + total_area',
                        'r' => ['area', 'total_area'],
                    ],
                    [
                        'l' => 'area',
                        'f' => '-area_waste + total_area',
                        'r' => ['area_waste', 'total_area'],
                    ],
                    [
                        'l' => 'total_area',
                        'f' => 'area + area_waste',
                        'r' => ['area_waste', 'area'],
                    ],
                ],
            ],
            [
                'formula' => 'roll_number = total_area / roll_area',
                'var' => [
                    [
                        'l' => 'roll_area',
                        'f' => 'total_area/roll_number',
                        'r' => ['roll_number', 'total_area'],
                    ],
                    [
                        'l' => 'roll_number',
                        'f' => 'total_area/roll_area',
                        'r' => ['roll_area', 'total_area'],
                    ],
                    [
                        'l' => 'total_area',
                        'f' => 'roll_area*roll_number',
                        'r' => ['roll_area', 'roll_number'],
                    ],
                ],
            ],
            [
                'formula' => 'total_cost = total_area * roll_price',
                'var' => [
                    [
                        'l' => 'roll_price',
                        'f' => 'total_cost/total_area',
                        'r' => ['total_cost', 'total_area'],
                    ],
                    [
                        'l' => 'total_cost',
                        'f' => 'roll_price*total_area',
                        'r' => ['roll_price', 'total_area'],
                    ],
                    [
                        'l' => 'total_area',
                        'f' => 'total_cost/roll_price',
                        'r' => ['roll_price', 'total_cost'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Sod works out Total area and Waste factor from Length and Width. There is no hidden constant here: change total area and length moves with it. The main result, Total area, is reported in square meters.
        TXT,
        'sections' => [
            ['title' => 'How the Sod calculator works', 'html' => <<<'TXT'
            <p>The Sod calculator applies one relationship to 2 numbers and reports Total area, Waste factor and Area waste.</p><p>The relationship it solves reads Total area = Length × Width.</p><p>The answers are Total area, Waste factor, Area waste and Total sod area; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Length</strong> — in meters</li><li><strong>Width</strong> — in meters</li></ul><p>The answers come back as Total area in square meters, Waste factor in percent, Area waste in square meters, Total sod area in square meters, Roll length in meters, Roll width in meters, Roll area in square meters, Roll price in USD, Number of rolls, Total cost in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Length = 10 m, Width = 100 m, Waste factor = 10 perc, Area waste = 10 m2, Total sod area = 100 m2, Roll length = 2 m, Roll width = 0.5 m, Roll area = 100 m2, Roll price = 1000 USD, Number of rolls = 10 and Total cost = 100 USD gives <strong>Total area</strong> = 1000 m2.</p><ul><li><strong>Total area</strong> = 1000 m2</li></ul><p>That is <strong>Total area</strong> = <code>Length × Width</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Total area</strong> = 1000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Total area lists 24 options and opens on square meters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total area</strong> = <code>Length × Width</code></li><li><strong>Length</strong> = <code>Total area ÷ Width</code></li><li><strong>Width</strong> = <code>Total area ÷ Length</code></li><li><strong>Roll area</strong> = <code>Roll length × Roll width</code></li><li><strong>Roll width</strong> = <code>Roll area ÷ Roll length</code></li><li><strong>Roll length</strong> = <code>Roll area ÷ Roll width</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total area</strong> = <code>Length × Width</code> — the form to use when Length and Width are the values you have.</li><li><strong>Length</strong> = <code>Total area ÷ Width</code> — the form to use when Width and Total area are the values you have.</li><li><strong>Width</strong> = <code>Total area ÷ Length</code> — the form to use when Length and Total area are the values you have.</li><li><strong>Roll area</strong> = <code>Roll length × Roll width</code> — the form to use when Roll width and Roll length are the values you have.</li><li><strong>Roll width</strong> = <code>Roll area ÷ Roll length</code> — the form to use when Roll area and Roll length are the values you have.</li><li><strong>Roll length</strong> = <code>Roll area ÷ Roll width</code> — the form to use when Roll area and Roll width are the values you have.</li><li><strong>Area waste</strong> = <code>Total area × Waste factor</code> — the form to use when Total area and Waste factor are the values you have.</li><li><strong>Total area</strong> = <code>Area waste ÷ Waste factor</code> — the form to use when Area waste and Waste factor are the values you have.</li></ul><p>Any one of Total area, Length and Width can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Length from 10 to 20, leaving every other box alone. The panel moves from <strong>Total area</strong> 1000 m2 to <strong>Total area</strong> 2000 m2.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Length and Width carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Total area, Waste factor and Area waste are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Length left as a guess.</strong> Anything typed into Length is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Width left as a guess.</strong> Anything typed into Width is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Length to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Sod form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Length</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. Change it and Width and Total area changes with it. Fill it from a measurement rather than a memory — Length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Width</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. Change it and Length and Total area changes with it. Fill it from a measurement rather than a memory — Width is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 10 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Total area</strong> is a square meters figure and the page's own defaults put it at 1000 m2. It is computed from Length and Width, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Waste factor</strong> is a percent figure. It is computed from Area waste and Total area, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Area waste</strong> is a square meters figure. It is computed from Total area and Waste factor, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total sod area</strong> is a square meters figure. It is computed from Area waste and Total area, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Roll length</strong> is a meters figure. It is computed from Roll area and Roll width, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Roll width</strong> is a meters figure. It is computed from Roll area and Roll length, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Roll area</strong> is a square meters figure. It is computed from Roll width and Roll length, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Roll price</strong> is a plain number. It is computed from Total cost and Total sod area, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Number of rolls</strong> is a plain number. It is computed from Roll area and Total sod area, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total cost</strong> is a plain number. It is computed from Roll price and Total sod area, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Sod actually offers.</p><ul><li><strong>square meters</strong> — 24 units. It opens in <em>m2</em>, and the chip also carries ac, m², ft², cm², in² and a. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — 6 units. It opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>meters</strong> — 31 units. It opens in <em>m</em>, and the chip also carries in, m, ft, Å, nm and pm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Total area is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover square meters, percent and meters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Length and Width is what you already know and Total area and Waste factor is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/lawn-fertilizer-rate">Lawn Fertilizer Rate Calculator</a>, <a href="/biology/mowing-cost">Lawn mowing Calculator</a> and <a href="/biology/tree-leaves">Leaves on tree Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sod calculator work out?', 'a' => 'Total area, Waste factor, Area waste and Total sod area, from Length and Width. The relationship is Total area = Length × Width.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (meters), Width (meters). With length and width in place, Total area can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Total area, Length, Width and Roll area blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Total area = 1000 m2. That comes from the page\'s own defaults, entered in Length; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Total area is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Length blank and the page solves for it, reporting Total area instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Total area keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/lawn-fertilizer-rate', 'name' => 'Lawn Fertilizer Rate Calculator'],
            ['path' => '/biology/mowing-cost', 'name' => 'Lawn mowing Calculator'],
            ['path' => '/biology/tree-leaves', 'name' => 'Leaves on tree Calculator'],
        ],
        'authors' => [],
    ],
];

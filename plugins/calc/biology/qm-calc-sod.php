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
    'meta' => ['title' => 'Sod Calculator: Worked Example and Formulas', 'description' => 'Sod works out total area and area waste from length, width and waste factor. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Sod Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => 'Field parameters',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'width',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Total area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'waste_factor',
                            'label' => 'Waste factor',
                            'type' => 'number',
                            'help' => 'Additional percentage amount of material that will be wasted.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area_waste',
                            'label' => 'Area waste',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_area',
                            'label' => 'Total sod area',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Roll parameters',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'roll_length',
                            'label' => 'Roll length',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '2', 'when' => null],
                                ['value' => '6', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'roll_width',
                            'label' => 'Roll width',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '0.5', 'when' => null],
                                ['value' => '1.5', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'roll_area',
                            'label' => 'Roll area',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'roll_price',
                            'label' => 'Roll price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'roll_number',
                            'label' => 'Number of rolls',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_cost',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'area = length * width',
            'results' => ['length' => 'area/width', 'width' => 'area/length', 'area' => 'length*width'],
        ],
        [
            'title' => 'roll_area = roll_length * roll_width',
            'results' => ['roll_area' => 'roll_length*roll_width', 'roll_width' => 'roll_area/roll_length', 'roll_length' => 'roll_area/roll_width'],
        ],
        [
            'title' => 'area_waste= area * waste_factor',
            'results' => ['area_waste' => 'area*waste_factor', 'area' => 'area_waste/waste_factor', 'waste_factor' => 'area_waste/area'],
        ],
        [
            'title' => 'total_area = area + area_waste',
            'results' => ['area_waste' => '-area + total_area', 'area' => '-area_waste + total_area', 'total_area' => 'area + area_waste'],
        ],
        [
            'title' => 'roll_number = total_area / roll_area',
            'results' => ['roll_area' => 'total_area/roll_number', 'roll_number' => 'total_area/roll_area', 'total_area' => 'roll_area*roll_number'],
        ],
        [
            'title' => 'total_cost = total_area * roll_price',
            'results' => ['roll_price' => 'total_cost/total_area', 'total_cost' => 'roll_price*total_area', 'total_area' => 'total_cost/roll_price'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Sod works out Total area and Waste factor from Length and Width. There is no hidden constant here: change total area and length moves with it. The main result, Total area, is reported in square meters.
        TXT,
        'sections' => [
            ['title' => 'How the Sod calculator works', 'html' => <<<'TXT'
            <p>The Sod calculator applies one relationship to 2 numbers and reports Total area, Waste factor and Area waste.</p><p>The relationship it solves reads Total area = Length × Width.</p><p>The answers are Total area, Waste factor, Area waste and Total sod area; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Length</strong> — in meters</li><li><strong>Width</strong> — in meters</li></ul><p>The answers come back as Total area in square meters, Waste factor in percent, Area waste, Total sod area, Roll length, Roll width, Roll area, Roll price in USD, Number of rolls, Total cost in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Length = 10 m, Width = 100 m, Waste factor = 10 perc, Area waste = 10, Total sod area = 100, Roll length = 2, Roll width = 0.5, Roll area = 100, Roll price = 1000 USD, Number of rolls = 10 and Total cost = 100 USD gives <strong>Total area</strong> = 1000 m2.</p><ul><li><strong>Total area</strong> = 1000 m2</li></ul><p>That is <strong>Total area</strong> = <code>Length × Width</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Total area</strong> = 1000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Total area lists 7 options and opens on square meters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total area</strong> = <code>Length × Width</code></li><li><strong>Length</strong> = <code>Total area ÷ Width</code></li><li><strong>Width</strong> = <code>Total area ÷ Length</code></li><li><strong>Roll area</strong> = <code>Roll length × Roll width</code></li><li><strong>Roll width</strong> = <code>Roll area ÷ Roll length</code></li><li><strong>Roll length</strong> = <code>Roll area ÷ Roll width</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total area</strong> = <code>Length × Width</code> — the form to use when Length and Width are the values you have.</li><li><strong>Length</strong> = <code>Total area ÷ Width</code> — the form to use when Total area and Width are the values you have.</li><li><strong>Width</strong> = <code>Total area ÷ Length</code> — the form to use when Total area and Length are the values you have.</li><li><strong>Roll area</strong> = <code>Roll length × Roll width</code> — the form to use when Roll length and Roll width are the values you have.</li><li><strong>Roll width</strong> = <code>Roll area ÷ Roll length</code> — the form to use when Roll area and Roll length are the values you have.</li><li><strong>Roll length</strong> = <code>Roll area ÷ Roll width</code> — the form to use when Roll area and Roll width are the values you have.</li><li><strong>Area waste</strong> = <code>Total area × Waste factor</code> — the form to use when Total area and Waste factor are the values you have.</li><li><strong>Total area</strong> = <code>Area waste ÷ Waste factor</code> — the form to use when Area waste and Waste factor are the values you have.</li></ul><p>Any one of Total area, Length and Width can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
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
            <p>The panel reports 10 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Total area</strong> is a square meters figure and the page's own defaults put it at 1000 m2. It is computed from Length and Width, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Waste factor</strong> is a percent figure. It is computed from Area waste and Total area, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Area waste</strong> is a plain number. It is computed from Total area and Waste factor, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total sod area</strong> is a plain number. It is computed from Total area and Area waste, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Roll length</strong> is a plain number. It is computed from Roll area and Roll width, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Roll width</strong> is a plain number. It is computed from Roll area and Roll length, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Roll area</strong> is a plain number. It is computed from Roll length and Roll width, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Roll price</strong> is a plain number. It is computed from Total cost and Total sod area, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Number of rolls</strong> is a plain number. It is computed from Total sod area and Roll area, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total cost</strong> is a plain number. It is computed from Roll price and Total sod area, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Sod actually offers.</p><ul><li><strong>square meters</strong> — opens in <em>m2</em>, and the chip also carries m², in², ft², yd², ac and ha. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>meters</strong> — opens in <em>m</em>, and the chip also carries cm, m, km, in, ft and yd. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Total area is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover square meters, percent and meters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Length and Width is what you already know and Total area and Waste factor is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
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

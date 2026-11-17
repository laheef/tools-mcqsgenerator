<?php

/**
 * Pizza size
 * /food/pizza
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pizza size',
    'meta' => ['title' => 'Pizza size Calculator: Formula, Steps & Examples', 'description' => 'Estimate pizza size, topping coverage or cost from crust and diameter inputs. Check units and follow the recipe or package directions.', 'h1' => 'Pizza size Calculator', 'updated' => '2026-07-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'edges_left',
                            'label' => 'Do you eat the crust?',
                            'type' => 'select',
                            'options' => ['Duh!' => '0', 'No, why would I?' => '1'],
                            'dataset' => 'edges_left',
                            'default' => 'Duh!',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'edge_size',
                            'label' => 'Crust size',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '2', 'when' => null],
                                ['value' => '0.75', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Smaller pizza',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'diameter',
                            'label' => 'Diameter',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price',
                            'label' => 'Price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'true_cost',
                            'label' => 'True cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'perc_1',
                            'label' => 'Toppings cover...',
                            'type' => 'number',
                            'suffix' => '% of pizza',
                            'readonly' => true,
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Smaller pizza extra info',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Edible area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'cm2',
                            'readonly' => true,
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'crust_area_1',
                            'label' => 'Crust',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'cm2',
                            'readonly' => true,
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'toppings_area_1',
                            'label' => 'Toppings',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'cm2',
                            'readonly' => true,
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Larger pizza',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'diameter_2',
                            'label' => 'Diameter',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_2',
                            'label' => 'Price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'true_cost_2',
                            'label' => 'True cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'perc_2',
                            'label' => 'Toppings cover...',
                            'type' => 'number',
                            'suffix' => '% of pizza',
                            'readonly' => true,
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Larger pizza extra info',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area_2',
                            'label' => 'Edible area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'cm2',
                            'readonly' => true,
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'crust_area_2',
                            'label' => 'Crust',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'cm2',
                            'readonly' => true,
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'toppings_area_2',
                            'label' => 'Toppings',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'cm2',
                            'readonly' => true,
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Verdict',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'place' => [0, 0, 0],
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'diff_cost > 0', 'text' => 'Every bite of the larger pizza is {{abs_diff.value}}% cheaper. The economy of scale at its yummiest!'],
                                ['when' => 'diff_cost < 0', 'text' => 'Every bite of the larger pizza is {{abs_diff.value}}% more expensive. Go figure...'],
                                ['when' => 'diff_cost == 0', 'text' => 'It does not make a difference which one you buy. They effectively cost the same.'],
                                ['when' => 'isNaN(diff_cost) ', 'text' => 'Enter the diameters and prices of the pizzas you want to compare!'],
                            ],
                        ],
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'diff_cost>0', 'text' => 'Also, an average bite of the bigger pizza has {{diff_toppings.value}}% more topping. Yum!'],
                                ['when' => 'diff_cost<0', 'text' => 'Still, an average bite of the bigger pizza has {{diff_toppings.value}}% more topping. Yum!'],
                            ],
                        ],
                        ['type' => 'image', 'url' => 'shut-up-and-take-my-money-anim.gif'],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'perc1',
                            'label' => 'Perc1',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'perc2',
                            'label' => 'Perc2',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'diff_toppings',
                            'label' => 'Diff toppings',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'diff_cost',
                            'label' => 'Diff cost',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'abs_diff',
                            'label' => 'Abs diff',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'true_cost = price / area',
            'results' => ['area' => 'price/true_cost', 'true_cost' => 'price/area', 'price' => 'area*true_cost'],
        ],
        [
            'title' => 'area = pi * (diameter / 2 - edge_size * edges_left)^2',
            'results' => ['edges_left' => 'sqrt(area)/(sqrt(PI)*edge_size) + (1/2)*diameter/edge_size', 'edge_size' => 'sqrt(area)/(sqrt(PI)*edges_left) + (1/2)*diameter/edges_left', 'diameter' => '2*sqrt(area)/sqrt(PI) + 2*edge_size*edges_left', 'area' => '(1/4)*PI*pow(diameter - 2*edge_size*edges_left, 2)'],
        ],
        [
            'title' => 'true_cost_2 = price_2 / area_2',
            'results' => ['price_2' => 'area_2*true_cost_2', 'true_cost_2' => 'price_2/area_2', 'area_2' => 'price_2/true_cost_2'],
        ],
        [
            'title' => 'area_2 = pi * (diameter_2 / 2 - edge_size * edges_left)^2',
            'results' => ['diameter_2' => '2*sqrt(area_2)/sqrt(PI) + 2*edge_size*edges_left', 'edges_left' => 'sqrt(area_2)/(sqrt(PI)*edge_size) + (1/2)*diameter_2/edge_size', 'edge_size' => 'sqrt(area_2)/(sqrt(PI)*edges_left) + (1/2)*diameter_2/edges_left', 'area_2' => '(1/4)*PI*pow(diameter_2 - 2*edge_size*edges_left, 2)'],
        ],
        [
            'title' => 'crust_area_1 =  ( (diameter / 2)^2 -  (diameter / 2 - edge_size)^2)/((diameter / 2)^2) * (pi * (diameter / 2 )^2)',
            'results' => ['edge_size' => '(1/2)*diameter + (1/2)*sqrt(-4*crust_area_1 + PI*pow(diameter, 2))/sqrt(PI)', 'diameter' => 'crust_area_1/(PI*edge_size) + edge_size', 'crust_area_1' => 'PI*edge_size*(diameter - edge_size)'],
        ],
        [
            'title' => 'toppings_area_1 = (pi * (diameter / 2 )^2) - crust_area_1 ',
            'results' => ['diameter' => '2*sqrt(crust_area_1 + toppings_area_1)/sqrt(PI)', 'toppings_area_1' => '-crust_area_1 + (1/4)*PI*pow(diameter, 2)', 'crust_area_1' => '(1/4)*PI*pow(diameter, 2) - toppings_area_1'],
        ],
        [
            'title' => 'crust_area_2 =   ( (diameter_2 / 2)^2 -  (diameter_2 / 2 - edge_size)^2)/((diameter_2 / 2)^2) * (pi * (diameter_2 / 2 )^2)',
            'results' => ['diameter_2' => 'crust_area_2/(PI*edge_size) + edge_size', 'edge_size' => '(1/2)*diameter_2 + (1/2)*sqrt(-4*crust_area_2 + PI*pow(diameter_2, 2))/sqrt(PI)', 'crust_area_2' => 'PI*edge_size*(diameter_2 - edge_size)'],
        ],
        [
            'title' => 'toppings_area_2 =  (pi * (diameter_2 / 2 )^2)- crust_area_2 ',
            'results' => ['toppings_area_2' => '-crust_area_2 + (1/4)*PI*pow(diameter_2, 2)', 'crust_area_2' => '(1/4)*PI*pow(diameter_2, 2) - toppings_area_2', 'diameter_2' => '2*sqrt(crust_area_2 + toppings_area_2)/sqrt(PI)'],
        ],
        [
            'title' => 'perc_1 =( 1- ( (diameter / 2)^2 -  (diameter / 2 - edge_size)^2)/((diameter / 2)^2))*100',
            'results' => ['perc_1' => '100*pow(diameter - 2*edge_size, 2)/pow(diameter, 2)', 'edge_size' => '(1/20)*diameter*(sqrt(perc_1) + 10)', 'diameter' => '20*edge_size*(sqrt(perc_1) - 10)/(perc_1 - 100)'],
        ],
        [
            'title' => 'perc_2 = (1-( (diameter_2 / 2)^2 -  (diameter_2 / 2 - edge_size)^2)/((diameter_2 / 2)^2) )*100',
            'results' => ['diameter_2' => '20*edge_size*(sqrt(perc_2) - 10)/(perc_2 - 100)', 'edge_size' => '(1/20)*diameter_2*(sqrt(perc_2) + 10)', 'perc_2' => '100*pow(diameter_2 - 2*edge_size, 2)/pow(diameter_2, 2)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Pizza size works out True cost and Toppings cover… from Do you eat the crust?, Crust size and Diameter. There is no hidden constant here: change true cost and do you eat the crust? moves with it. The main result, True cost, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Pizza size calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Pizza size: it takes 11 numbers and reports True cost, Toppings cover… and Edible area.</p><p>The relationship it solves reads True cost = Price ÷ Edible area.</p><p>The result panel carries True cost, Toppings cover…, Edible area and Crust, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 11 boxes and the page has everything it needs.</p><ul><li><strong>Do you eat the crust?</strong> — a plain number, no unit</li><li><strong>Crust size</strong> — in centimeters</li><li><strong>Diameter</strong> — in centimeters</li><li><strong>Price</strong> — in USD</li><li><strong>Diameter</strong> — in centimeters</li><li><strong>Price</strong> — in USD</li><li><strong>Perc1</strong> — a plain number, no unit</li><li><strong>Perc2</strong> — a plain number, no unit</li><li><strong>Diff toppings</strong> — a plain number, no unit</li><li><strong>Diff cost</strong> — a plain number, no unit</li><li><strong>Abs diff</strong> — a plain number, no unit</li></ul><p>What you get back is True cost in USD, Toppings cover… in % of pizza, Edible area in square centimeters, Crust in square centimeters, Toppings in square centimeters, True cost in USD, Toppings cover… in % of pizza, Edible area in square centimeters, Crust in square centimeters, Toppings in square centimeters, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>True cost</strong> = <code>Price ÷ Edible area</code></li><li><strong>Edible area</strong> = <code>Price ÷ True cost</code></li><li><strong>Price</strong> = <code>Edible area × True cost</code></li><li><strong>Do you eat the crust?</strong> = <code>√(Edible area) ÷ (√(PI) × Crust size) + (1 ÷ 2) × Diameter ÷ Crust size</code></li><li><strong>Crust size</strong> = <code>√(Edible area) ÷ (√(PI) × Do you eat the crust?) + (1 ÷ 2) × Diameter ÷ Do you eat the crust?</code></li><li><strong>Diameter</strong> = <code>2 × √(Edible area) ÷ √(PI) + 2 × Crust size × Do you eat the crust?</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>True cost</strong> = <code>Price ÷ Edible area</code> — the form to use when Price and Edible area are the values you have.</li><li><strong>Edible area</strong> = <code>Price ÷ True cost</code> — the form to use when Price and True cost are the values you have.</li><li><strong>Price</strong> = <code>Edible area × True cost</code> — the form to use when Edible area and True cost are the values you have.</li><li><strong>Edible area</strong> = <code>(1 ÷ 4) × PI × (Diameter − 2 × Crust size × Do you eat the crust?)^(2)</code> — the form to use when Diameter, Crust size and Do you eat the crust? are the values you have.</li><li><strong>Do you eat the crust?</strong> = <code>√(Edible area) ÷ (√(PI) × Crust size) + (1 ÷ 2) × Diameter ÷ Crust size</code> — the form to use when Edible area, Crust size and Diameter are the values you have.</li><li><strong>Crust size</strong> = <code>√(Edible area) ÷ (√(PI) × Do you eat the crust?) + (1 ÷ 2) × Diameter ÷ Do you eat the crust?</code> — the form to use when Edible area, Do you eat the crust? and Diameter are the values you have.</li><li><strong>Diameter</strong> = <code>2 × √(Edible area) ÷ √(PI) + 2 × Crust size × Do you eat the crust?</code> — the form to use when Edible area, Crust size and Do you eat the crust? are the values you have.</li><li><strong>True cost</strong> = <code>Price ÷ Edible area</code> — the form to use when Price and Edible area are the values you have.</li></ul><p>Any one of True cost, Edible area and Price can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Crust size, Diameter and Diameter carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> True cost, Toppings cover… and Edible area are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Do you eat the crust? left as a guess.</strong> Anything typed into Do you eat the crust? is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Crust size left as a guess.</strong> Anything typed into Crust size is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Convert Do you eat the crust? to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Pizza size form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Do you eat the crust?</strong> takes a plain number with no unit attached. Change it and Crust size, Diameter and Edible area changes with it. Fill it from a measurement rather than a memory — Do you eat the crust? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Crust size</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Change it and Do you eat the crust?, Diameter and Edible area changes with it. Fill it from a measurement rather than a memory — Crust size is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Diameter</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Change it and Do you eat the crust?, Crust size and Edible area changes with it. Fill it from a measurement rather than a memory — Diameter is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Price</strong> takes a plain number with no unit attached. Change it and Edible area and True cost changes with it. Fill it from a measurement rather than a memory — Price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Diameter</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Change it and Do you eat the crust?, Crust size and Edible area changes with it. Fill it from a measurement rather than a memory — Diameter is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Price</strong> takes a plain number with no unit attached. Change it and True cost and Edible area changes with it. Fill it from a measurement rather than a memory — Price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Perc1</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Perc1 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Perc2</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Perc2 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Diff toppings</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Diff toppings is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Diff cost</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Diff cost is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Abs diff</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Abs diff is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind True cost is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are square centimeters and centimeters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Do you eat the crust?, Crust size and Diameter are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Do you eat the crust?, Crust size and Diameter and the number you are missing is True cost and Toppings cover….</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>Related calculators: <a href="/food/perfect-pizza">Pizza baking</a>, <a href="/food/pizza-comparison">Pizza comparison</a> and <a href="/food/bakers-percentage">Baker&#x27;s percentage</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pizza size calculator work out?', 'a' => 'True cost, Toppings cover…, Edible area and Crust, from Price and Edible area. The relationship is True cost = Price ÷ Edible area.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Do you eat the crust?, Crust size (centimeters), Diameter (centimeters), Price (USD), Diameter (centimeters). Enter do you eat the crust?, crust size and diameter; True cost is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of True cost, Edible area, Price and Do you eat the crust? blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of True cost is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Do you eat the crust? blank and the page solves for it, reporting True cost instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. True cost keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/perfect-pizza', 'name' => 'Pizza baking'],
            ['path' => '/food/pizza-comparison', 'name' => 'Pizza comparison'],
            ['path' => '/food/bakers-percentage', 'name' => 'Baker\'s percentage']
        ],
    ],
];

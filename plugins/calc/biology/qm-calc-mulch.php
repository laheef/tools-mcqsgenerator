<?php

/**
 * Mulch
 * /biology/mulch
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mulch',
    'meta' => ['title' => 'Mulch Calculator: Worked Example and Formulas', 'description' => 'Mulch works out area and number of bags needed from do you know what\'s the area? and shape. Every box can be solved for, not only the one in the title.', 'h1' => 'Mulch Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Estimate the amount of mulch needed based on your selected area and desired mulch depth. You can also optionally calculate the total mulch cost and weight required for your project.
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'knowArea',
                            'label' => 'Do you know what\'s the area?',
                            'type' => 'select',
                            'options' => ['Yes, I know it.' => '55.000000000000000', 'No, calculate it for me.' => '66.000000000000000'],
                            'dataset' => 'yes no',
                            'help' => 'If you don\'t know the value of area to be covered with mulch, this calculator can find it for you based on the information you provide.',
                            'default' => 'Yes, I know it.',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Mulch calculations',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Shape',
                            'label' => 'Shape',
                            'type' => 'select',
                            'options' => ['Rectangle' => '1.000000000000000', 'Circle' => '2.000000000000000'],
                            'dataset' => 'shape',
                            'help' => 'What shape is the area to be covered in mulch?',
                            'default' => 'Rectangle',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'mulch-circle.png'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'depth',
                            'label' => 'Depth',
                            'type' => 'number',
                            'help' => 'Desired depth of the mulch layer.',
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
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.000001'],
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
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'areaRectangle',
                            'label' => 'Area',
                            'type' => 'number',
                            'help' => 'Area to be covered with mulch.',
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
                            'name' => 'mulchRectangle',
                            'label' => 'Mulch needed',
                            'type' => 'number',
                            'help' => 'Volume of mulch needed to cover the calculated area.',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'radius',
                            'label' => 'Radius',
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
                            'name' => 'areaCircle',
                            'label' => 'Area',
                            'type' => 'number',
                            'help' => 'Area to be covered with mulch.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mulchCircle',
                            'label' => 'Mulch needed',
                            'type' => 'number',
                            'help' => 'Volume of mulch needed to cover the calculated area.',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Area',
                            'type' => 'number',
                            'help' => 'Please input the area to be covered with mulch.',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mulchNeeded',
                            'label' => 'Mulch needed',
                            'type' => 'number',
                            'help' => 'Volume of mulch needed to cover the whole deginated area.',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Cost calculations',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bagOrVolPricing',
                            'label' => 'I know the price...',
                            'type' => 'select',
                            'options' => ['... by bag' => '1', '... by volume' => '0'],
                            'dataset' => 'costCalc',
                            'default' => '... by bag',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bagSize',
                            'label' => 'Bag size',
                            'type' => 'number',
                            'help' => 'What\'s the size of a single bag of mulch you want to buy?',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bagsNeeded',
                            'label' => 'Number of bags needed',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bagsRect',
                            'label' => 'Number of bags needed',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bagsCirc',
                            'label' => 'Number of bags needed',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bagPrice',
                            'label' => 'Price per one bag',
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
                            'name' => 'bagPriceRect',
                            'label' => 'Price per one bag',
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
                            'name' => 'bagPriceCirc',
                            'label' => 'Price per one bag',
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
                            'name' => 'costPerm3',
                            'label' => 'Cost per volume unit',
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
                            'name' => 'cost',
                            'label' => 'Total costs of mulch',
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
                            'name' => 'costVol',
                            'label' => 'Total costs of mulch',
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
                            'name' => 'costRect',
                            'label' => 'Total costs of mulch',
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
                            'name' => 'costRectVol',
                            'label' => 'Total costs of mulch',
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
                            'name' => 'costCirc',
                            'label' => 'Total costs of mulch',
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
                            'name' => 'costCircleVol',
                            'label' => 'Total costs of mulch',
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
            'title' => 'Mulch weight estimation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mulchType',
                            'label' => 'Mulch type',
                            'type' => 'select',
                            'options' => ['Wood (chips or bark)' => '11', 'Compost' => '12', 'Custom' => '13'],
                            'dataset' => 'mulch',
                            'help' => 'Mulch can be made of various materials, resulting in different densities and weights. Wood and compost are the most common.',
                            'default' => 'Wood (chips or bark)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'density',
                            'label' => 'Density',
                            'type' => 'result',
                            'help' => 'Density of wooden mulch is typically around 475 kg/m³ (800 lb/cu yd).',
                            'unit' => '33',
                            'unit_default' => 'kgm3',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '475', 'when' => null],
                                ['value' => '800', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Estimated weight',
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
                            'name' => 'weightRect',
                            'label' => 'Estimated weight',
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
                            'name' => 'weightCirc',
                            'label' => 'Estimated weight',
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
                            'name' => 'mulchRect',
                            'label' => 'Mulch rect',
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
            'title' => 'areaRectangle = length * width',
            'results' => ['areaRectangle' => 'length*width', 'length' => 'areaRectangle/width', 'width' => 'areaRectangle/length'],
        ],
        [
            'title' => 'areaCircle = pi * radius^2',
            'results' => ['areaCircle' => 'PI*pow(radius, 2)', 'radius' => 'sqrt(areaCircle)/sqrt(PI)'],
        ],
        [
            'title' => 'mulchNeeded = area * depth ',
            'results' => ['area' => 'mulchNeeded/depth', 'depth' => 'mulchNeeded/area', 'mulchNeeded' => 'area*depth'],
        ],
        [
            'title' => 'mulchRectangle = areaRectangle * depth',
            'results' => ['mulchRectangle' => 'areaRectangle*depth', 'depth' => 'mulchRectangle/areaRectangle', 'areaRectangle' => 'mulchRectangle/depth'],
        ],
        [
            'title' => 'mulchCircle = areaCircle * depth',
            'results' => ['depth' => 'mulchCircle/areaCircle', 'areaCircle' => 'mulchCircle/depth', 'mulchCircle' => 'areaCircle*depth'],
        ],
        [
            'title' => 'bagsNeeded = mulchNeeded / bagSize',
            'results' => ['bagsNeeded' => 'mulchNeeded/bagSize', 'bagSize' => 'mulchNeeded/bagsNeeded', 'mulchNeeded' => 'bagSize*bagsNeeded'],
        ],
        [
            'title' => 'bagsRect = mulchRectangle / bagSize',
            'results' => ['bagSize' => 'mulchRectangle/bagsRect', 'bagsRect' => 'mulchRectangle/bagSize', 'mulchRectangle' => 'bagSize*bagsRect'],
        ],
        [
            'title' => 'bagsCirc = mulchCircle / bagSize',
            'results' => ['bagsCirc' => 'mulchCircle/bagSize', 'bagSize' => 'mulchCircle/bagsCirc', 'mulchCircle' => 'bagSize*bagsCirc'],
        ],
        [
            'title' => 'cost = bagsNeeded * bagPrice',
            'results' => ['bagsNeeded' => 'cost/bagPrice', 'cost' => 'bagPrice*bagsNeeded', 'bagPrice' => 'cost/bagsNeeded'],
        ],
        [
            'title' => 'costRect = bagsRect * bagPriceRect',
            'results' => ['bagPriceRect' => 'costRect/bagsRect', 'bagsRect' => 'costRect/bagPriceRect', 'costRect' => 'bagPriceRect*bagsRect'],
        ],
        [
            'title' => 'costCirc = bagsCirc * bagPriceCirc',
            'results' => ['bagsCirc' => 'costCirc/bagPriceCirc', 'costCirc' => 'bagPriceCirc*bagsCirc', 'bagPriceCirc' => 'costCirc/bagsCirc'],
        ],
        [
            'title' => 'weightRect = mulchRectangle * density ',
            'results' => ['weightRect' => 'density*mulchRectangle', 'density' => 'weightRect/mulchRectangle', 'mulchRectangle' => 'weightRect/density'],
        ],
        [
            'title' => 'weightCirc = mulchCircle * density ',
            'results' => ['weightCirc' => 'density*mulchCircle', 'density' => 'weightCirc/mulchCircle', 'mulchCircle' => 'weightCirc/density'],
        ],
        [
            'title' => 'weight = mulchNeeded * density',
            'results' => ['weight' => 'density*mulchNeeded', 'density' => 'weight/mulchNeeded', 'mulchNeeded' => 'weight/density'],
        ],
        [
            'title' => 'costVol = mulchNeeded * costPerm3',
            'results' => ['costVol' => 'costPerm3*mulchNeeded', 'costPerm3' => 'costVol/mulchNeeded', 'mulchNeeded' => 'costVol/costPerm3'],
        ],
        [
            'title' => 'costCircleVol = mulchCircle * costPerm3',
            'results' => ['costCircleVol' => 'costPerm3*mulchCircle', 'costPerm3' => 'costCircleVol/mulchCircle', 'mulchCircle' => 'costCircleVol/costPerm3'],
        ],
        [
            'title' => 'costRectVol = mulchRect * costPerm3',
            'results' => ['mulchRect' => 'costRectVol/costPerm3', 'costPerm3' => 'costRectVol/mulchRect', 'costRectVol' => 'costPerm3*mulchRect'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Do you know what's the area?, Shape and Depth into Mulch and the answer comes back as Density. There is no hidden constant here: change density and do you know what's the area? moves with it. The main result, Density, is reported in kilograms per cubic meter.
        TXT,
        'sections' => [
            ['title' => 'How the Mulch calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Mulch: it takes 32 numbers and reports Density.</p><p>Written with the labels from the form, Area = Length × Width.</p><p>What comes back is Density — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 32 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Do you know what&#039;s the area?</strong> — a plain number, no unit. If you don&#039;t know the value of area to be covered with mulch, this calculator can find it for you based on the information you provide.</li><li><strong>Shape</strong> — a plain number, no unit. What shape is the area to be covered in mulch?</li><li><strong>Depth</strong> — in centimeters. Desired depth of the mulch layer.</li><li><strong>Length</strong> — in meters</li><li><strong>Width</strong> — in meters</li><li><strong>Area</strong> — in square meters. Area to be covered with mulch.</li><li><strong>Mulch needed</strong> — in liters. Volume of mulch needed to cover the calculated area.</li><li><strong>Radius</strong> — in meters</li><li><strong>Area</strong> — a plain number, no unit. Area to be covered with mulch.</li><li><strong>Mulch needed</strong> — in liters. Volume of mulch needed to cover the calculated area.</li><li><strong>Area</strong> — in square meters. Please input the area to be covered with mulch.</li><li><strong>Mulch needed</strong> — in liters. Volume of mulch needed to cover the whole deginated area.</li><li><strong>I know the price…</strong> — a plain number, no unit</li><li><strong>Bag size</strong> — in liters. What&#039;s the size of a single bag of mulch you want to buy?</li><li><strong>Number of bags needed</strong> — a plain number, no unit</li><li><strong>Number of bags needed</strong> — a plain number, no unit</li><li><strong>Number of bags needed</strong> — a plain number, no unit</li><li><strong>Price per one bag</strong> — in USD</li><li><strong>Price per one bag</strong> — in USD</li><li><strong>Price per one bag</strong> — in USD</li><li><strong>Cost per volume unit</strong> — in USD</li><li><strong>Total costs of mulch</strong> — in USD</li><li><strong>Total costs of mulch</strong> — in USD</li><li><strong>Total costs of mulch</strong> — in USD</li><li><strong>Total costs of mulch</strong> — in USD</li><li><strong>Total costs of mulch</strong> — in USD</li><li><strong>Total costs of mulch</strong> — in USD</li><li><strong>Mulch type</strong> — a plain number, no unit. Mulch can be made of various materials, resulting in different densities and weights. Wood and compost are the most common.</li><li><strong>Estimated weight</strong> — in kilograms</li><li><strong>Estimated weight</strong> — in kilograms</li><li><strong>Estimated weight</strong> — in kilograms</li><li><strong>Mulch rect</strong> — a plain number, no unit</li></ul><p>The answer comes back as Density in kilograms per cubic meter. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Density lists 8 options and opens on kilograms per cubic meter. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Area</strong> = <code>Length × Width</code></li><li><strong>Length</strong> = <code>Area ÷ Width</code></li><li><strong>Width</strong> = <code>Area ÷ Length</code></li><li><strong>Radius</strong> = <code>√(Area) ÷ √(PI)</code></li><li><strong>Mulch needed</strong> = <code>Area × Depth</code></li><li><strong>Depth</strong> = <code>Mulch needed ÷ Area</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Area</strong> = <code>Length × Width</code> — the form to use when Length and Width are the values you have.</li><li><strong>Length</strong> = <code>Area ÷ Width</code> — the form to use when Area and Width are the values you have.</li><li><strong>Width</strong> = <code>Area ÷ Length</code> — the form to use when Area and Length are the values you have.</li><li><strong>Area</strong> = <code>PI × (Radius)^(2)</code> — the form to use when Radius are the values you have.</li><li><strong>Radius</strong> = <code>√(Area) ÷ √(PI)</code> — the form to use when Area are the values you have.</li><li><strong>Mulch needed</strong> = <code>Area × Depth</code> — the form to use when Area and Depth are the values you have.</li><li><strong>Area</strong> = <code>Mulch needed ÷ Depth</code> — the form to use when Mulch needed and Depth are the values you have.</li><li><strong>Depth</strong> = <code>Mulch needed ÷ Area</code> — the form to use when Mulch needed and Area are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Area, Length and Width can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Depth, Length and Width carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Density is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Do you know what&#039;s the area? left as a guess.</strong> Anything typed into Do you know what&amp;#039;s the area? is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Shape left as a guess.</strong> Anything typed into Shape is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Do you know what&#039;s the area? and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Do you know what&#039;s the area?, Shape, Depth and Length ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Do you know what&amp;#039;s the area? — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Density in kgm3 against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Density is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms per cubic meter, centimeters and square meters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Do you know what&#039;s the area?, Shape and Depth are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Do you know what&#039;s the area?, Shape and Depth is what you already know and Density is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Mulch is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Mulch is a number to act on, so the useful question is what to do with Density (kgm3) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Do you know what&#039;s the area?, Shape, Depth and Length alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mulch calculator work out?', 'a' => 'Density, from Length and Width. The relationship is Area = Length × Width.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Do you know what's the area?, Shape, Depth (centimeters), Length (meters), Width (meters). Enter do you know what's the area?, shape and depth; Density is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Area, Length, Width and Area can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Density is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Do you know what\'s the area? blank and the page solves for it, reporting Density instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Density at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/rat-cage', 'name' => 'Rat cage Calculator'],
            ['path' => '/biology/raw-dog-food', 'name' => 'Raw dog food Calculator'],
            ['path' => '/biology/recombination-frequency', 'name' => 'Recombination Frequency Calculator'],
        ],
        'authors' => [],
    ],
];

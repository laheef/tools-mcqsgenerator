<?php

/**
 * Silver melt
 * /finance/silver-melt
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Silver melt',
    'meta' => ['title' => 'Silver melt Calculator: Formula, Steps & Examples', 'description' => 'Silver melt turns weight and select silver purity into mass of pure silver. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Silver melt Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Weight',
                            'type' => 'number',
                            'help' => 'Input the weight of your silver.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.00001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'purity',
                            'label' => 'Select silver purity',
                            'type' => 'select',
                            'options' => [
                                'Enter custom silver purity' => '',
                                '99.9% (Fine silver)' => '99.9',
                                '95.84% (Britannia silver)' => '95.84',
                                '95% (The French 1st standard)' => '95',
                                '94.79% (91 zolotnik Russian silver)' => '94.79',
                                '92.5% (Sterling silver)' => '92.5',
                                '91.66% (88 zolotnik Russian silver)' => '91.66',
                                '90% (Coin silver)' => '90',
                                '87.5% (84 zolotnik Russian silver)' => '87.5',
                                '83.5% (German silver)' => '83.5',
                                '83% (Scandinavian silver)' => '83',
                                '80% (German silver)' => '80',
                                '72% (Decoplata)' => '72',
                            ],
                            'dataset' => 'purity',
                            'control' => 'DROPDOWN',
                            'default' => '92.5% (Sterling silver)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'customPurity',
                            'label' => 'Purity',
                            'type' => 'result',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight_silver',
                            'label' => 'Mass of pure silver',
                            'type' => 'number',
                            'help' => 'This is the weight of the pure silver content of your scrap silver.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.00001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price',
                            'label' => 'Price per unit mass',
                            'type' => 'number',
                            'help' => 'Input the current price of pure silver per desired unit of weight measurement.',
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
                            'name' => 'value',
                            'label' => 'Value of silver item(s)',
                            'type' => 'number',
                            'help' => 'This is the value of the pure silver content of your silver.',
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
            'title' => 'Alloy value (silver + another metal)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight_metal2',
                            'label' => 'Mass of second metal',
                            'type' => 'number',
                            'help' => 'This is the weight of the second component of the alloy in its pure state.',
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.00001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_2',
                            'label' => 'Price of second metal',
                            'type' => 'number',
                            'help' => 'Input the current price of the second metal component of the alloy per your desired unit of measurement.',
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
                            'name' => 'value_2',
                            'label' => 'Value of second metal',
                            'type' => 'number',
                            'help' => 'This is the value of the second metal component of your alloy.',
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
                            'name' => 'overall_value',
                            'label' => 'Overall value of alloy',
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
            'title' => 'value = weight * (customPurity/100) * price',
            'results' => ['customPurity' => '100*value/(price*weight)', 'price' => '100*value/(customPurity*weight)', 'value' => '(1/100)*customPurity*price*weight', 'weight' => '100*value/(customPurity*price)'],
        ],
        [
            'title' => 'value_2 = weight * ((100-customPurity)/100) * price_2',
            'results' => ['customPurity' => '100 - 100*value_2/(price_2*weight)', 'price_2' => '-100*value_2/(weight*(customPurity - 100))', 'value_2' => '(1/100)*price_2*weight*(100 - customPurity)', 'weight' => '-100*value_2/(price_2*(customPurity - 100))'],
        ],
        [
            'title' => 'value + value_2 = overall_value',
            'results' => ['overall_value' => 'value + value_2', 'value_2' => 'overall_value - value', 'value' => 'overall_value - value_2'],
        ],
        [
            'title' => 'weight_silver = weight*(customPurity/100)',
            'results' => ['customPurity' => '100*weight_silver/weight', 'weight_silver' => '(1/100)*customPurity*weight', 'weight' => '100*weight_silver/customPurity'],
        ],
        [
            'title' => 'weight_metal2 = weight-weight_silver',
            'results' => ['weight_silver' => 'weight - weight_metal2', 'weight_metal2' => 'weight - weight_silver', 'weight' => 'weight_metal2 + weight_silver'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Silver melt takes Weight, Select silver purity and Mass of pure silver and returns Purity. There is no hidden constant here: change purity and weight moves with it. The main result, Purity, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Silver melt calculator works', 'html' => <<<'TXT'
            <p>Silver melt answers one question from 9 numbers, and the answer is Purity.</p><p>Written with the labels from the form, Value of silver item(s) = (1 ÷ 100) × Purity × Price per unit mass × Weight.</p><p>What comes back is Purity — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 9 boxes, and nothing else.</p><ul><li><strong>Weight</strong> — in grams. Input the weight of your silver.</li><li><strong>Select silver purity</strong> — a plain number, no unit</li><li><strong>Mass of pure silver</strong> — in grams. This is the weight of the pure silver content of your scrap silver.</li><li><strong>Price per unit mass</strong> — in USD. Input the current price of pure silver per desired unit of weight measurement.</li><li><strong>Value of silver item(s)</strong> — in USD. This is the value of the pure silver content of your silver.</li><li><strong>Mass of second metal</strong> — in grams. This is the weight of the second component of the alloy in its pure state.</li><li><strong>Price of second metal</strong> — in USD. Input the current price of the second metal component of the alloy per your desired unit of measurement.</li><li><strong>Value of second metal</strong> — in USD. This is the value of the second metal component of your alloy.</li><li><strong>Overall value of alloy</strong> — in USD</li></ul><p>What you get back is Purity in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Purity offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Value of silver item(s)</strong> = <code>(1 ÷ 100) × Purity × Price per unit mass × Weight</code></li><li><strong>Purity</strong> = <code>100 × Value of silver item(s) ÷ (Price per unit mass × Weight)</code></li><li><strong>Price per unit mass</strong> = <code>100 × Value of silver item(s) ÷ (Purity × Weight)</code></li><li><strong>Weight</strong> = <code>100 × Value of silver item(s) ÷ (Purity × Price per unit mass)</code></li><li><strong>Value of second metal</strong> = <code>(1 ÷ 100) × Price of second metal × Weight × (100 − Purity)</code></li><li><strong>Price of second metal</strong> = <code>− 100 × Value of second metal ÷ (Weight × (Purity − 100))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Value of silver item(s)</strong> = <code>(1 ÷ 100) × Purity × Price per unit mass × Weight</code> — the form to use when Purity, Price per unit mass and Weight are the values you have.</li><li><strong>Purity</strong> = <code>100 × Value of silver item(s) ÷ (Price per unit mass × Weight)</code> — the form to use when Value of silver item(s), Price per unit mass and Weight are the values you have.</li><li><strong>Price per unit mass</strong> = <code>100 × Value of silver item(s) ÷ (Purity × Weight)</code> — the form to use when Value of silver item(s), Purity and Weight are the values you have.</li><li><strong>Weight</strong> = <code>100 × Value of silver item(s) ÷ (Purity × Price per unit mass)</code> — the form to use when Value of silver item(s), Purity and Price per unit mass are the values you have.</li><li><strong>Value of second metal</strong> = <code>(1 ÷ 100) × Price of second metal × Weight × (100 − Purity)</code> — the form to use when Price of second metal, Weight and Purity are the values you have.</li><li><strong>Purity</strong> = <code>100 − 100 × Value of second metal ÷ (Price of second metal × Weight)</code> — the form to use when Value of second metal, Price of second metal and Weight are the values you have.</li><li><strong>Price of second metal</strong> = <code>− 100 × Value of second metal ÷ (Weight × (Purity − 100))</code> — the form to use when Value of second metal, Weight and Purity are the values you have.</li><li><strong>Weight</strong> = <code>− 100 × Value of second metal ÷ (Price of second metal × (Purity − 100))</code> — the form to use when Value of second metal, Price of second metal and Purity are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Value of silver item(s), Purity and Price per unit mass can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Weight, Mass of pure silver and Mass of second metal is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Purity is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Select silver purity left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Select silver purity is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Weight is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Weight</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. Input the weight of your silver. It feeds Purity, Price per unit mass and Value of silver item(s). Have it to hand before you start: Weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Select silver purity</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Select silver purity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Mass of pure silver</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. This is the weight of the pure silver content of your scrap silver. It feeds Purity, Weight and Mass of second metal. Have it to hand before you start: Mass of pure silver is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price per unit mass</strong> takes a plain number with no unit attached. Input the current price of pure silver per desired unit of weight measurement. It feeds Purity, Value of silver item(s) and Weight. Have it to hand before you start: Price per unit mass is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Value of silver item(s)</strong> takes a plain number with no unit attached. This is the value of the pure silver content of your silver. It feeds Purity, Price per unit mass and Weight. Have it to hand before you start: Value of silver item(s) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Mass of second metal</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. This is the weight of the second component of the alloy in its pure state. It feeds Mass of pure silver and Weight. Have it to hand before you start: Mass of second metal is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price of second metal</strong> takes a plain number with no unit attached. Input the current price of the second metal component of the alloy per your desired unit of measurement. It feeds Purity, Value of second metal and Weight. Have it to hand before you start: Price of second metal is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Value of second metal</strong> takes a plain number with no unit attached. This is the value of the second metal component of your alloy. It feeds Purity, Price of second metal and Weight. Have it to hand before you start: Value of second metal is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Overall value of alloy</strong> takes a plain number with no unit attached. It feeds Value of second metal and Value of silver item(s). Have it to hand before you start: Overall value of alloy is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Purity</strong> is a percent figure. It is computed from Value of silver item(s), Price per unit mass and Weight, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>grams</strong> — opens in <em>g</em>, and the chip also carries g, mg, lb, oz and st. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Purity follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and grams and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Weight, Select silver purity and Mass of pure silver are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Weight, Select silver purity and Mass of pure silver and the number you are missing is Purity.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/swp">SWP (India) Calculator</a>, <a href="/finance/sip-india">Systematic investment plan Calculator</a> and <a href="/finance/tax-bracket">Tax bracket Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Silver melt calculator work out?', 'a' => 'Purity, from Purity, Price per unit mass and Weight. The relationship is Value of silver item(s) = (1 ÷ 100) × Purity × Price per unit mass × Weight.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Weight (grams), Select silver purity, Mass of pure silver (grams), Price per unit mass (USD), Value of silver item(s) (USD). With weight, select silver purity and mass of pure silver in place, Purity can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Value of silver item(s), Purity, Price per unit mass and Weight can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Purity is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Weight left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Purity keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/swp', 'name' => 'SWP (India) Calculator'],
            ['path' => '/finance/sip-india', 'name' => 'Systematic investment plan Calculator'],
            ['path' => '/finance/tax-bracket', 'name' => 'Tax bracket Calculator'],
        ],
        'authors' => [],
    ],
];

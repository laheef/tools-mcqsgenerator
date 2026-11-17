<?php

/**
 * Price elasticity of supply
 * /finance/price-elasticity-supply
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Price elasticity of supply',
    'meta' => ['title' => 'Price elasticity of supply — Formula & Results', 'description' => 'Price elasticity of supply turns method and Price in Period 1 into change in price. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Price elasticity of supply Calculator', 'updated' => '2026-09-02'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Method',
                            'label' => 'Method',
                            'type' => 'select',
                            'options' => ['Standard' => '1', 'Midpoint' => '0'],
                            'dataset' => 'DATA1',
                            'control' => 'DROPDOWN',
                            'help' => 'Choose the way you want to compute the percentage change.',
                            'default' => 'Standard',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Price',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p0',
                            'label' => 'Price in Period 1',
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
                            'name' => 'p1',
                            'label' => 'Price in Period 2',
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
                            'name' => 'ChangePrice',
                            'label' => 'Change in price',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Supply',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q0',
                            'label' => 'Quantity supplied in Period 1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q1',
                            'label' => 'Quantity supplied in Period 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ChangeQuantitySupplied',
                            'label' => 'Change in quantity',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Result',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PES',
                            'label' => 'Price elasticity of supply',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ct1',
                            'label' => 'Ct1',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ct2',
                            'label' => 'Ct2',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'PES<0', 'text' => 'The price elasticity of supply is negative, an unusual case that might happen in the labor market.'],
                                ['when' => 'PES>0 and PES<1', 'text' => 'The supply is inelastic.'],
                                ['when' => 'PES>1', 'text' => 'The supply is elastic.'],
                                ['when' => 'PES==1', 'text' => 'The supply is unit-elastic.'],
                                ['when' => 'PES==0', 'text' => 'A price change does not affect the supplied quantity — the supply is perfectly inelastic.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'PES = ChangeQuantitySupplied/ ChangePrice',
            'results' => ['ChangePrice' => 'ChangeQuantitySupplied/PES', 'ChangeQuantitySupplied' => 'ChangePrice*PES', 'PES' => 'ChangeQuantitySupplied/ChangePrice'],
        ],
        [
            'title' => 'ChangeQuantitySupplied = ((q1-q0)/q0) * ct1 + ((q1-q0)/((q0+q1)/2)) * ct2',
            'results' => [
                'ChangeQuantitySupplied' => '(-ct1*pow(q0, 2) + ct1*pow(q1, 2) - 2*ct2*pow(q0, 2) + 2*ct2*q0*q1)/(q0*(q0 + q1))',
                'q1' => <<<'TXT'
                (1/2)*q0*(ChangeQuantitySupplied - 2*ct2 + sqrt(pow(ChangeQuantitySupplied, 2) + 4*ChangeQuantitySupplied*ct1 - 4*ChangeQuantitySupplied*ct2 + 4*pow(ct1, 2) + 8*ct1*ct2 + 4*pow(ct2, 2)))/ct1
                TXT,
                'ct2' => '(1/2)*(-ChangeQuantitySupplied*pow(q0, 2) - ChangeQuantitySupplied*q0*q1 - ct1*pow(q0, 2) + ct1*pow(q1, 2))/(q0*(q0 - q1))',
                'q0' => <<<'TXT'
                (1/2)*q1*(-ChangeQuantitySupplied + 2*ct2 + sqrt(pow(ChangeQuantitySupplied, 2) + 4*ChangeQuantitySupplied*ct1 - 4*ChangeQuantitySupplied*ct2 + 4*pow(ct1, 2) + 8*ct1*ct2 + 4*pow(ct2, 2)))/(ChangeQuantitySupplied + ct1 + 2*ct2)
                TXT,
                'ct1' => 'q0*(-ChangeQuantitySupplied*q0 - ChangeQuantitySupplied*q1 - 2*ct2*q0 + 2*ct2*q1)/(pow(q0, 2) - pow(q1, 2))',
            ],
        ],
        [
            'title' => 'ChangePrice = (p1-p0)/p0 * ct1 + ((p1-p0)/((p0+p1)/2)) * ct2',
            'results' => [
                'p0' => <<<'TXT'
                (1/2)*p1*(-ChangePrice + 2*ct2 + sqrt(pow(ChangePrice, 2) + 4*ChangePrice*ct1 - 4*ChangePrice*ct2 + 4*pow(ct1, 2) + 8*ct1*ct2 + 4*pow(ct2, 2)))/(ChangePrice + ct1 + 2*ct2)
                TXT,
                'ChangePrice' => '(-ct1*pow(p0, 2) + ct1*pow(p1, 2) - 2*ct2*pow(p0, 2) + 2*ct2*p0*p1)/(p0*(p0 + p1))',
                'ct2' => '(1/2)*(-ChangePrice*pow(p0, 2) - ChangePrice*p0*p1 - ct1*pow(p0, 2) + ct1*pow(p1, 2))/(p0*(p0 - p1))',
                'p1' => '(1/2)*p0*(ChangePrice - 2*ct2 + sqrt(pow(ChangePrice, 2) + 4*ChangePrice*ct1 - 4*ChangePrice*ct2 + 4*pow(ct1, 2) + 8*ct1*ct2 + 4*pow(ct2, 2)))/ct1',
                'ct1' => 'p0*(-ChangePrice*p0 - ChangePrice*p1 - 2*ct2*p0 + 2*ct2*p1)/(pow(p0, 2) - pow(p1, 2))',
            ],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Price elasticity of supply takes Method, Price in Period 1 and Price in Period 2 and returns Ct1 and Ct2. Nothing is looked up on this page: ct1 is computed from method and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Price elasticity of supply calculator works', 'html' => <<<'TXT'
            <p>The Price elasticity of supply calculator applies one relationship to 8 numbers and reports Ct1 and Ct2.</p><p>The relationship it solves reads Price elasticity of supply = Change in quantity ÷ Change in price.</p><p>The answers are Ct1 and Ct2; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 8 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Method</strong> — a plain number, no unit. Choose the way you want to compute the percentage change.</li><li><strong>Price in Period 1</strong> — in USD</li><li><strong>Price in Period 2</strong> — in USD</li><li><strong>Change in price</strong> — in percent</li><li><strong>Quantity supplied in Period 1</strong> — a plain number, no unit</li><li><strong>Quantity supplied in Period 2</strong> — a plain number, no unit</li><li><strong>Change in quantity</strong> — in percent</li><li><strong>Price elasticity of supply</strong> — a plain number, no unit</li></ul><p>What you get back is Ct1, Ct2, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Change in price offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Price elasticity of supply</strong> = <code>Change in quantity ÷ Change in price</code></li><li><strong>Change in price</strong> = <code>Change in quantity ÷ Price elasticity of supply</code></li><li><strong>Change in quantity</strong> = <code>Change in price × Price elasticity of supply</code></li><li><strong>Quantity supplied in Period 2</strong> = <code>(1 ÷ 2) × Quantity supplied in Period 1 × (Change in quantity − 2 × Ct2 + √((Change in quantity)^(2) + 4 × Change in quantity × Ct1 − 4 × Change in quantity × Ct2 + 4 × (Ct1)^(2) + 8 × Ct1 × Ct2 + 4 × (Ct2)^(2))) ÷ Ct1</code></li><li><strong>Price in Period 2</strong> = <code>(1 ÷ 2) × Price in Period 1 × (Change in price − 2 × Ct2 + √((Change in price)^(2) + 4 × Change in price × Ct1 − 4 × Change in price × Ct2 + 4 × (Ct1)^(2) + 8 × Ct1 × Ct2 + 4 × (Ct2)^(2))) ÷ Ct1</code></li><li><strong>Ct1</strong> = <code>Price in Period 1 × ( − Change in price × Price in Period 1 − Change in price × Price in Period 2 − 2 × Ct2 × Price in Period 1 + 2 × Ct2 × Price in Period 2) ÷ ((Price in Period 1)^(2) − (Price in Period 2)^(2))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Price elasticity of supply</strong> = <code>Change in quantity ÷ Change in price</code> — the form to use when Change in quantity and Change in price are the values you have.</li><li><strong>Change in price</strong> = <code>Change in quantity ÷ Price elasticity of supply</code> — the form to use when Change in quantity and Price elasticity of supply are the values you have.</li><li><strong>Change in quantity</strong> = <code>Change in price × Price elasticity of supply</code> — the form to use when Change in price and Price elasticity of supply are the values you have.</li><li><strong>Quantity supplied in Period 2</strong> = <code>(1 ÷ 2) × Quantity supplied in Period 1 × (Change in quantity − 2 × Ct2 + √((Change in quantity)^(2) + 4 × Change in quantity × Ct1 − 4 × Change in quantity × Ct2 + 4 × (Ct1)^(2) + 8 × Ct1 × Ct2 + 4 × (Ct2)^(2))) ÷ Ct1</code> — the form to use when Quantity supplied in Period 1, Change in quantity, Ct2 and Ct1 are the values you have.</li><li><strong>Change in price</strong> = <code>( − Ct1 × (Price in Period 1)^(2) + Ct1 × (Price in Period 2)^(2) − 2 × Ct2 × (Price in Period 1)^(2) + 2 × Ct2 × Price in Period 1 × Price in Period 2) ÷ (Price in Period 1 × (Price in Period 1 + Price in Period 2))</code> — the form to use when Ct1, Price in Period 1, Price in Period 2 and Ct2 are the values you have.</li><li><strong>Price in Period 2</strong> = <code>(1 ÷ 2) × Price in Period 1 × (Change in price − 2 × Ct2 + √((Change in price)^(2) + 4 × Change in price × Ct1 − 4 × Change in price × Ct2 + 4 × (Ct1)^(2) + 8 × Ct1 × Ct2 + 4 × (Ct2)^(2))) ÷ Ct1</code> — the form to use when Price in Period 1, Change in price, Ct2 and Ct1 are the values you have.</li><li><strong>Ct1</strong> = <code>Price in Period 1 × ( − Change in price × Price in Period 1 − Change in price × Price in Period 2 − 2 × Ct2 × Price in Period 1 + 2 × Ct2 × Price in Period 2) ÷ ((Price in Period 1)^(2) − (Price in Period 2)^(2))</code> — the form to use when Price in Period 1, Change in price, Price in Period 2 and Ct2 are the values you have.</li></ul><p>Any one of Price elasticity of supply, Change in price and Change in quantity can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Change in price and Change in quantity is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Ct1 and Ct2 are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Method left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Method is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Price in Period 1 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Price in Period 1 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Method to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Method</strong> takes a plain number with no unit attached. Choose the way you want to compute the percentage change. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Method is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price in Period 1</strong> takes a plain number with no unit attached. The page reads it when it works out Change in price, Ct2 and Price in Period 2. Have it to hand before you start: Price in Period 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price in Period 2</strong> takes a plain number with no unit attached. The page reads it when it works out Price in Period 1, Change in price and Ct2. Have it to hand before you start: Price in Period 2 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Change in price</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Change in quantity, Price elasticity of supply and Price in Period 1. Have it to hand before you start: Change in price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Quantity supplied in Period 1</strong> takes a plain number with no unit attached. The page reads it when it works out Change in quantity, Quantity supplied in Period 2 and Ct2. Have it to hand before you start: Quantity supplied in Period 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Quantity supplied in Period 2</strong> takes a plain number with no unit attached. The page reads it when it works out Change in quantity, Ct2 and Quantity supplied in Period 1. Have it to hand before you start: Quantity supplied in Period 2 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Change in quantity</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Change in price, Price elasticity of supply and Quantity supplied in Period 2. Have it to hand before you start: Change in quantity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price elasticity of supply</strong> takes a plain number with no unit attached. The page reads it when it works out Change in price and Change in quantity. Have it to hand before you start: Price elasticity of supply is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Ct1</strong> is a plain number. It is computed from Quantity supplied in Period 1, Change in quantity, Quantity supplied in Period 2 and Ct2, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Ct2</strong> is a plain number. It is computed from Change in quantity, Quantity supplied in Period 1, Quantity supplied in Period 2 and Ct1, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Ct1 is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Method, Price in Period 1 and Price in Period 2 are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Method, Price in Period 1 and Price in Period 2 is what you already know and Ct1 and Ct2 is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/early-retirement">Early retirement</a>, <a href="/finance/earned-value-management">Earned value management Calculator</a> and <a href="/finance/earnest-money">Earnest money Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Price elasticity of supply calculator work out?', 'a' => 'Ct1 and Ct2, from Change in quantity and Change in price. The relationship is Price elasticity of supply = Change in quantity ÷ Change in price.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Method, Price in Period 1 (USD), Price in Period 2 (USD), Change in price (percent), Quantity supplied in Period 1. With method, price in Period 1 and price in Period 2 in place, Ct1 can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Price elasticity of supply, Change in price, Change in quantity and Quantity supplied in Period 2 blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Ct1 is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Method left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Ct1 at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/early-retirement', 'name' => 'Early retirement'],
            ['path' => '/finance/earned-value-management', 'name' => 'Earned value management Calculator'],
            ['path' => '/finance/earnest-money', 'name' => 'Earnest money Calculator'],
        ],
        'authors' => [],
    ],
];

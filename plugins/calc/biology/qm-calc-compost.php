<?php

/**
 * Compost
 * /biology/compost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Compost',
    'meta' => ['title' => 'Compost Calculator: Formula, Steps & Examples', 'description' => 'Compost works out area and volume from length, width and garden or lawn type. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Compost Calculator', 'updated' => '2026-08-21'],
    'raw' => [
        'vars' => [
            'area' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'cost' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'density' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '650', 'c' => null],
                    ['v' => '40', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'depth' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.1'],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'price' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
                'min' => 2,
            ],
            'space' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '_iPmL-wSuKTa4zjyqimcj', 'c' => null],
                ],
                'ds' => 'TrrQKs7kAtjS3Nk-lJrOd',
            ],
            'total_weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'volume' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'width' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'DKSREVxXWW5ZIC3nJZexE',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, '🍂 Composting guide or supply store? Help readers get the right amount. Prompt your own compost tool ➔&nbsp;'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 's3R7x0sIr4u4hrjzliyCe',
                'title' => 'Compost volume',
                'desc' => 'How much compost do I need?',
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
                                    'l' => 'Area',
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
                                    'n' => 'space',
                                    'vt' => 'valueSelect',
                                    'l' => 'Garden or lawn type',
                                    'h' => 'If you\'re unsure about the depth of compost you need, choose an option from this menu.',
                                    'ds' => 'TrrQKs7kAtjS3Nk-lJrOd',
                                    'opts' => [
                                        ['u5Qrwo12AE2LBhEZQtbGY', 'New lawn - high compost level', '1'],
                                        ['HKWaL2r2i5HUMQTEzz4Rh', 'New lawn - low compost level', '2'],
                                        ['eaiRXxW8nUUxjw66sDRiU', 'Established lawn - high compost level', '3'],
                                        ['7wTPkuUu3Jsp091xoX2b4', 'Established lawn - low compost level', '4'],
                                        ['-CrkrP1fy-Uet1fSPuJu7', 'Garden - high compost level', '5'],
                                        ['YM56e53Zd-ILXhmjILK3D', 'Garden - low compost level', '6'],
                                        ['Kfq4mowxuhMRk5fWHBMXD', 'Raised bed - high compost level', '7'],
                                        ['YyI5lEBkromOILW1F3C3E', 'Raised bed - low compost level', '8'],
                                        ['_iPmL-wSuKTa4zjyqimcj', 'Custom depth', '0'],
                                    ],
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
                                    'n' => 'depth',
                                    'vt' => 'dependent',
                                    'l' => 'Depth',
                                    'h' => 'If you\'re unsure about the depth of compost you need, choose an option from the menu above.',
                                    'us' => '4',
                                    'du' => 'cm',
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
                                    'n' => 'volume',
                                    'vt' => 'numerical',
                                    'l' => 'Volume',
                                    'us' => '20',
                                    'du' => 'm3',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'mVrss9RvbZKboM527nTRx',
                'title' => 'Compost cost',
                'desc' => 'What is the cost of this much compost?',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'price',
                                    'vt' => 'numerical',
                                    'l' => 'Price ',
                                    'h' => 'A 1-cubic foot bag of compost typically costs around $5.',
                                    'us' => '663',
                                    'du' => 'USD',
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
                                    'n' => 'cost',
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
            [
                'uid' => 'sfapndVtSpQTnU4-9FRCU',
                'title' => 'Compost weight',
                'desc' => 'What will be the weight of this much compost?',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'density',
                                    'vt' => 'numerical',
                                    'l' => 'Density',
                                    'h' => 'A one-pound bag of compost typically weighs about 40 pounds.',
                                    'us' => '33',
                                    'du' => 'kgm3',
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
                                    'n' => 'total_weight',
                                    'vt' => 'numerical',
                                    'l' => 'Total weight',
                                    'us' => '22',
                                    'du' => 'kg',
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
                        'l' => 'width',
                        'f' => 'area/length',
                        'r' => ['length', 'area'],
                    ],
                    [
                        'l' => 'length',
                        'f' => 'area/width',
                        'r' => ['width', 'area'],
                    ],
                    [
                        'l' => 'area',
                        'f' => 'length*width',
                        'r' => ['width', 'length'],
                    ],
                ],
            ],
            [
                'formula' => 'volume = area * depth',
                'var' => [
                    [
                        'l' => 'volume',
                        'f' => 'area*depth',
                        'r' => ['depth', 'area'],
                    ],
                    [
                        'l' => 'depth',
                        'f' => 'volume/area',
                        'r' => ['volume', 'area'],
                    ],
                    [
                        'l' => 'area',
                        'f' => 'volume/depth',
                        'r' => ['volume', 'depth'],
                    ],
                ],
            ],
            [
                'formula' => 'cost = price * volume ',
                'var' => [
                    [
                        'l' => 'volume',
                        'f' => 'cost/price',
                        'r' => ['cost', 'price'],
                    ],
                    [
                        'l' => 'cost',
                        'f' => 'price*volume',
                        'r' => ['volume', 'price'],
                    ],
                    [
                        'l' => 'price',
                        'f' => 'cost/volume',
                        'r' => ['volume', 'cost'],
                    ],
                ],
            ],
            [
                'formula' => 'total_weight = density * volume',
                'var' => [
                    [
                        'l' => 'volume',
                        'f' => 'total_weight/density',
                        'r' => ['total_weight', 'density'],
                    ],
                    [
                        'l' => 'total_weight',
                        'f' => 'density*volume',
                        'r' => ['volume', 'density'],
                    ],
                    [
                        'l' => 'density',
                        'f' => 'total_weight/volume',
                        'r' => ['volume', 'total_weight'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'TrrQKs7kAtjS3Nk-lJrOd' => [
                'name' => 'spaceDS',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'u5Qrwo12AE2LBhEZQtbGY', 'label' => 'New lawn - high compost level', 'value' => '1'],
                    ['uid' => 'HKWaL2r2i5HUMQTEzz4Rh', 'label' => 'New lawn - low compost level', 'value' => '2'],
                    ['uid' => 'eaiRXxW8nUUxjw66sDRiU', 'label' => 'Established lawn - high compost level', 'value' => '3'],
                    ['uid' => '7wTPkuUu3Jsp091xoX2b4', 'label' => 'Established lawn - low compost level', 'value' => '4'],
                    ['uid' => '-CrkrP1fy-Uet1fSPuJu7', 'label' => 'Garden - high compost level', 'value' => '5'],
                    ['uid' => 'YM56e53Zd-ILXhmjILK3D', 'label' => 'Garden - low compost level', 'value' => '6'],
                    ['uid' => 'Kfq4mowxuhMRk5fWHBMXD', 'label' => 'Raised bed - high compost level', 'value' => '7'],
                    ['uid' => 'YyI5lEBkromOILW1F3C3E', 'label' => 'Raised bed - low compost level', 'value' => '8'],
                    ['uid' => '_iPmL-wSuKTa4zjyqimcj', 'label' => 'Custom depth', 'value' => '0'],
                ],
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Compost takes Length, Width and Area and returns Depth. The arithmetic is the whole method: depth is worked out from length by one formula, applied once. Depth comes back in centimeters unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Compost calculator works', 'html' => <<<'TXT'
            <p>The Compost calculator applies one relationship to 9 numbers and reports Depth.</p><p>The relationship it solves reads Width = Area ÷ Length.</p><p>What comes back is Depth — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 9 boxes and the page has everything it needs.</p><ul><li><strong>Length</strong> — in meters</li><li><strong>Width</strong> — in meters</li><li><strong>Area</strong> — in square meters</li><li><strong>Garden or lawn type</strong> — a plain number, no unit. If you&#039;re unsure about the depth of compost you need, choose an option from this menu.</li><li><strong>Volume</strong> — in cubic meters</li><li><strong>Price</strong> — in USD. A 1-cubic foot bag of compost typically costs around $5.</li><li><strong>Total cost</strong> — in USD</li><li><strong>Density</strong> — in kilograms per cubic meter. A one-pound bag of compost typically weighs about 40 pounds.</li><li><strong>Total weight</strong> — in kilograms</li></ul><p>What you get back is Depth in centimeters, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Depth offers 31 units and opens on centimeters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Width</strong> = <code>Area ÷ Length</code></li><li><strong>Length</strong> = <code>Area ÷ Width</code></li><li><strong>Area</strong> = <code>Length × Width</code></li><li><strong>Volume</strong> = <code>Area × Depth</code></li><li><strong>Depth</strong> = <code>Volume ÷ Area</code></li><li><strong>Total cost</strong> = <code>Price × Volume</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Width</strong> = <code>Area ÷ Length</code> — the form to use when Length and Area are the values you have.</li><li><strong>Length</strong> = <code>Area ÷ Width</code> — the form to use when Width and Area are the values you have.</li><li><strong>Area</strong> = <code>Length × Width</code> — the form to use when Width and Length are the values you have.</li><li><strong>Volume</strong> = <code>Area × Depth</code> — the form to use when Depth and Area are the values you have.</li><li><strong>Depth</strong> = <code>Volume ÷ Area</code> — the form to use when Volume and Area are the values you have.</li><li><strong>Area</strong> = <code>Volume ÷ Depth</code> — the form to use when Volume and Depth are the values you have.</li><li><strong>Volume</strong> = <code>Total cost ÷ Price</code> — the form to use when Total cost and Price are the values you have.</li><li><strong>Total cost</strong> = <code>Price × Volume</code> — the form to use when Volume and Price are the values you have.</li></ul><p>Any one of Width, Length and Area can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Length, Width and Area is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Depth is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Width left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Width is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Length to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Length</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. The page reads it when it works out Width and Area. Have it to hand before you start: Length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Width</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. The page reads it when it works out Length and Area. Have it to hand before you start: Width is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Area</strong> is a square meters quantity: the page opens it in m2 and converts anything else you pick before the formula runs. The page reads it when it works out Width, Length and Volume. Have it to hand before you start: Area is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Garden or lawn type</strong> takes a plain number with no unit attached. If you&#039;re unsure about the depth of compost you need, choose an option from this menu. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Garden or lawn type is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Volume</strong> is a cubic meters quantity: the page opens it in m3 and converts anything else you pick before the formula runs. The page reads it when it works out Depth, Area and Total cost. Have it to hand before you start: Volume is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price</strong> takes a plain number with no unit attached. A 1-cubic foot bag of compost typically costs around $5. The page reads it when it works out Volume and Total cost. Have it to hand before you start: Price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total cost</strong> takes a plain number with no unit attached. The page reads it when it works out Volume and Price. Have it to hand before you start: Total cost is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Density</strong> is a kilograms per cubic meter quantity: the page opens it in kgm3 and converts anything else you pick before the formula runs. A one-pound bag of compost typically weighs about 40 pounds. The page reads it when it works out Volume and Total weight. Have it to hand before you start: Density is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. The page reads it when it works out Volume and Density. Have it to hand before you start: Total weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Depth</strong> is a centimeters figure. The value follows from Volume and Area. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>meters</strong> — 31 units. It opens in <em>m</em>, and the chip also carries in, m, ft, Å, nm and pm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>square meters</strong> — 24 units. It opens in <em>m2</em>, and the chip also carries ac, m², ft², cm², in² and a. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>cubic meters</strong> — 40 units. It opens in <em>m3</em>, and the chip also carries m³, cu ft, US fl oz, L, dm³ and cu in. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>kilograms per cubic meter</strong> — 9 units. It opens in <em>kgm3</em>, and the chip also carries lb/cu ft, lb/cu yd, g/cm³, g/m³, g/dm³ and g/L. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>kilograms</strong> — 27 units. It opens in <em>kg</em>, and the chip also carries lb, mg, g, oz, t and ng. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Depth follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover meters, square meters and cubic meters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Length, Width and Area and the number you are missing is Depth.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/percent-germination">Percent Germination Calculator</a>, <a href="/biology/percent-inhibition">Percent Inhibition Calculator</a> and <a href="/biology/percent-viability">Percent Viability Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Compost calculator work out?', 'a' => 'Depth, from Length and Area. The relationship is Width = Area ÷ Length.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Length (meters), Width (meters), Area (square meters), Garden or lawn type, Volume (cubic meters). Enter length, width and area; Depth is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Width, Length, Area and Volume blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Depth is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Length left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Depth keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/percent-germination', 'name' => 'Percent Germination Calculator'],
            ['path' => '/biology/percent-inhibition', 'name' => 'Percent Inhibition Calculator'],
            ['path' => '/biology/percent-viability', 'name' => 'Percent Viability Calculator'],
        ],
        'authors' => [],
    ],
];

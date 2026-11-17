<?php

/**
 * Price per square foot
 * /finance/price-per-sqft
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Price per square foot',
    'meta' => ['title' => 'Price per square foot: Formula, Steps & Results', 'description' => 'Price per square foot turns price or rent and square footage into price per sqft. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Price per square foot Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price',
                            'label' => 'Price or rent',
                            'type' => 'number',
                            'help' => 'What\'s the price of the property or its monthly rent?',
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
                            'name' => 'sqft',
                            'label' => 'Square footage',
                            'type' => 'number',
                            'help' => 'If you need to calculate the square footage of the floor\'s area, check out our square footage calculator.',
                            'unit' => '28',
                            'unit_default' => 'ft2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pricePerSqft',
                            'label' => 'Price per sqft',
                            'type' => 'number',
                            'help' => 'Price or monthly rent per square foot of floor space.',
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
            'title' => 'Second property',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'compare2',
                            'label' => 'Compare with a second property?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes' => '1'],
                            'dataset' => 'compareYesNo',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price2',
                            'label' => 'Price or rent',
                            'type' => 'number',
                            'help' => 'What\'s the price of the property or its monthly rent?',
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
                            'name' => 'sqft2',
                            'label' => 'Square footage',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'ft2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pricePerSqft2',
                            'label' => 'Price per sqft',
                            'type' => 'number',
                            'help' => 'Price or monthly rent per square foot of floor space.',
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
            'title' => 'Third property',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'compare3',
                            'label' => 'Compare with a third property?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes' => '1'],
                            'dataset' => 'compareYesNo',
                            'default' => 'No',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price3',
                            'label' => 'Price or rent',
                            'type' => 'number',
                            'help' => 'What\'s the price of the property or its monthly rent?',
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
                            'name' => 'sqft3',
                            'label' => 'Square footage',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'ft2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pricePerSqft3',
                            'label' => 'Price per sqft',
                            'type' => 'number',
                            'help' => 'Price or monthly rent per square foot of floor space.',
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
            'title' => 'pricePerSqft = price / sqft',
            'results' => ['price' => 'pricePerSqft*sqft', 'sqft' => 'price/pricePerSqft', 'pricePerSqft' => 'price/sqft'],
        ],
        [
            'title' => 'pricePerSqft2 = price2 / sqft2',
            'results' => ['price2' => 'pricePerSqft2*sqft2', 'sqft2' => 'price2/pricePerSqft2', 'pricePerSqft2' => 'price2/sqft2'],
        ],
        [
            'title' => 'pricePerSqft3 = price3 / sqft3',
            'results' => ['pricePerSqft3' => 'price3/sqft3', 'sqft3' => 'price3/pricePerSqft3', 'price3' => 'pricePerSqft3*sqft3'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Price per square foot converts between price per sqft and price or rent: put a value in either box and the other one is worked out. Price per sqft is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Price per square foot calculator works', 'html' => <<<'TXT'
            <p>The Price per square foot calculator applies one relationship to 2 numbers and reports Price per sqft, Price or rent and Square footage.</p><p>In the form&#039;s own words, Price per sqft = Price or rent ÷ Square footage.</p><p>The result panel carries Price per sqft, Price or rent, Square footage and Price per sqft, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Price or rent</strong> — in USD. What&#039;s the price of the property or its monthly rent?</li><li><strong>Square footage</strong> — in square feet. If you need to calculate the square footage of the floor&#039;s area, check out our square footage calculator.</li></ul><p>The result boxes are Price per sqft in USD, Price or rent in USD, Square footage in square feet, Price per sqft in USD, Price or rent in USD, Square footage in square feet, Price per sqft in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Square footage offers 5 units and opens on square feet, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Price per sqft</strong> = <code>Price or rent ÷ Square footage</code></li><li><strong>Price or rent</strong> = <code>Price per sqft × Square footage</code></li><li><strong>Square footage</strong> = <code>Price or rent ÷ Price per sqft</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Price per sqft</strong> = <code>Price or rent ÷ Square footage</code> — the form to use when Price or rent and Square footage are the values you have.</li><li><strong>Price or rent</strong> = <code>Price per sqft × Square footage</code> — the form to use when Price per sqft and Square footage are the values you have.</li><li><strong>Square footage</strong> = <code>Price or rent ÷ Price per sqft</code> — the form to use when Price or rent and Price per sqft are the values you have.</li><li><strong>Price per sqft</strong> = <code>Price or rent ÷ Square footage</code> — the form to use when Price or rent and Square footage are the values you have.</li><li><strong>Price or rent</strong> = <code>Price per sqft × Square footage</code> — the form to use when Price per sqft and Square footage are the values you have.</li><li><strong>Square footage</strong> = <code>Price or rent ÷ Price per sqft</code> — the form to use when Price or rent and Price per sqft are the values you have.</li><li><strong>Price per sqft</strong> = <code>Price or rent ÷ Square footage</code> — the form to use when Price or rent and Square footage are the values you have.</li><li><strong>Square footage</strong> = <code>Price or rent ÷ Price per sqft</code> — the form to use when Price or rent and Price per sqft are the values you have.</li></ul><p>Any one of Price per sqft, Price or rent and Square footage can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Square footage is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Price per sqft, Price or rent and Square footage are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Price or rent left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Price or rent is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Square footage left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Square footage is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Price or rent and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Price per square foot form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Price or rent</strong> takes a plain number with no unit attached. What&#039;s the price of the property or its monthly rent?. It feeds Square footage and Price per sqft. Fill it from a measurement rather than a memory — Price or rent is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Square footage</strong> is a square feet quantity: the page opens it in ft2 and converts anything else you pick before the formula runs. If you need to calculate the square footage of the floor&#039;s area, check out our square footage calculator. It feeds Price or rent and Price per sqft. Fill it from a measurement rather than a memory — Square footage is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Price per sqft</strong> is a plain number. The value follows from Price or rent and Square footage. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Price or rent</strong> is a plain number. The value follows from Price per sqft and Square footage. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Square footage</strong> is a square feet figure. The value follows from Price or rent and Price per sqft. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Price per sqft</strong> is a plain number. The value follows from Price or rent and Square footage. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Price or rent</strong> is a plain number. The value follows from Price per sqft and Square footage. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Square footage</strong> is a square feet figure. The value follows from Price or rent and Price per sqft. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Price per sqft</strong> is a plain number. The value follows from Price or rent and Square footage. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Price per square foot actually offers.</p><ul><li><strong>square feet</strong> — opens in <em>ft2</em>, and the chip also carries m², in², ft² and yd². Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Price per sqft follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are square feet and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Price or rent and Square footage are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Price or rent and Square footage and the number you are missing is Price per sqft and Price or rent.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/futures-contract">Futures contract Calculator</a>, <a href="/finance/gdp-deflator">GDP deflator</a> and <a href="/finance/gdp-gap">GDP gap</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Price per square foot calculator work out?', 'a' => <<<'TXT'
            Price per sqft, Price or rent, Square footage and Price per sqft, from Price or rent and Square footage. The relationship is Price per sqft = Price or rent ÷ Square footage.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Price or rent (USD), Square footage (square feet). With price or rent and square footage in place, Price per sqft can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Price per sqft, Price or rent, Square footage and Price per sqft blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Price per sqft is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Price or rent blank and the page solves for it, reporting Price per sqft instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Price per sqft at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/futures-contract', 'name' => 'Futures contract Calculator'],
            ['path' => '/finance/gdp-deflator', 'name' => 'GDP deflator'],
            ['path' => '/finance/gdp-gap', 'name' => 'GDP gap'],
        ],
        'authors' => [],
    ],
];

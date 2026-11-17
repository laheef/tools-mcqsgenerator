<?php

/**
 * Price per square meter
 * /finance/price-per-square-meter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Price per square meter',
    'meta' => ['title' => 'Price per square meter: Formula, Steps & Results', 'description' => 'Price per square meter turns price or rent and Floor space in {{sqM.fullUnit}} into price per {{pricePerSqM.fullUnit}} and Price per {{pricePerSqM2.fullUnit}}.', 'h1' => 'Price per square meter Calculator', 'updated' => '2026-09-09'],
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
                            'name' => 'sqM',
                            'label' => 'Floor space in {{sqM.fullUnit}}',
                            'type' => 'number',
                            'help' => 'If you need to calculate the square meters of floor space, consult our square meter calculator.',
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
                            'name' => 'pricePerSqM',
                            'label' => 'Price per {{pricePerSqM.fullUnit}}',
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
                            'name' => 'sqM2',
                            'label' => 'Floor space in {{sqM2.fullUnit}}',
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
                            'name' => 'pricePerSqM2',
                            'label' => 'Price per {{pricePerSqM2.fullUnit}}',
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
                            'name' => 'sqM3',
                            'label' => 'Floor space in {{sqM3.fullUnit}}',
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
                            'name' => 'pricePerSqM3',
                            'label' => 'Price per {{pricePerSqM3.fullUnit}}',
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
            'title' => 'pricePerSqM = price / sqM',
            'results' => ['price' => 'pricePerSqM*sqM', 'sqM' => 'price/pricePerSqM', 'pricePerSqM' => 'price/sqM'],
        ],
        [
            'title' => 'pricePerSqM2 = price2 / sqM2',
            'results' => ['pricePerSqM2' => 'price2/sqM2', 'sqM2' => 'price2/pricePerSqM2', 'price2' => 'pricePerSqM2*sqM2'],
        ],
        [
            'title' => 'pricePerSqM3 = price3 / sqM3',
            'results' => ['sqM3' => 'price3/pricePerSqM3', 'pricePerSqM3' => 'price3/sqM3', 'price3' => 'pricePerSqM3*sqM3'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Price per square meter turns Floor space in into Price per and Price or rent. The arithmetic is the whole method: price per is worked out from floor space in by one formula, applied once. Price per comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Price per square meter calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Price per square meter: it takes 2 numbers and reports Price per, Price or rent and Floor space in.</p><p>In the form&#039;s own words, Price per = Price or rent ÷ Floor space in .</p><p>The answers are Price per, Price or rent, Floor space in and Price per; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Price or rent</strong> — in USD. What&#039;s the price of the property or its monthly rent?</li><li><strong>Floor space in</strong> — in square meters. If you need to calculate the square meters of floor space, consult our square meter calculator.</li></ul><p>What you get back is Price per in USD, Price or rent in USD, Floor space in in square meters, Price per in USD, Price or rent in USD, Floor space in in square meters, Price per in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Floor space in {{sqM2.fullUnit}} offers 7 units and opens on square meters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Price per</strong> = <code>Price or rent ÷ Floor space in </code></li><li><strong>Price or rent</strong> = <code>Price per × Floor space in </code></li><li><strong>Floor space in</strong> = <code>Price or rent ÷ Price per </code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Price per</strong> = <code>Price or rent ÷ Floor space in </code> — the form to use when Price or rent and Floor space in are the values you have.</li><li><strong>Price or rent</strong> = <code>Price per × Floor space in </code> — the form to use when Price per and Floor space in are the values you have.</li><li><strong>Floor space in</strong> = <code>Price or rent ÷ Price per </code> — the form to use when Price or rent and Price per are the values you have.</li><li><strong>Price per</strong> = <code>Price or rent ÷ Floor space in </code> — the form to use when Price or rent and Floor space in are the values you have.</li><li><strong>Floor space in</strong> = <code>Price or rent ÷ Price per </code> — the form to use when Price or rent and Price per are the values you have.</li><li><strong>Price or rent</strong> = <code>Price per × Floor space in </code> — the form to use when Price per and Floor space in are the values you have.</li><li><strong>Price per</strong> = <code>Price or rent ÷ Floor space in </code> — the form to use when Price or rent and Floor space in are the values you have.</li><li><strong>Floor space in</strong> = <code>Price or rent ÷ Price per </code> — the form to use when Price or rent and Price per are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Price per, Price or rent and Floor space in can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Floor space in is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Price per, Price or rent and Floor space in are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Price or rent left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Price or rent is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Floor space in left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Floor space in is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Price or rent is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Price per square meter form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Price or rent</strong> takes a plain number with no unit attached. What&#039;s the price of the property or its monthly rent?. The page reads it when it works out Floor space in and Price per. Fill it from a measurement rather than a memory — Price or rent is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Floor space in</strong> is a square meters quantity: the page opens it in m2 and converts anything else you pick before the formula runs. If you need to calculate the square meters of floor space, consult our square meter calculator. The page reads it when it works out Price or rent and Price per. Fill it from a measurement rather than a memory — Floor space in is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Price per</strong> is a plain number. It is worked out from Price or rent and Floor space in. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Price or rent</strong> is a plain number. It is worked out from Price per and Floor space in. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Floor space in</strong> is a square meters figure. It is worked out from Price or rent and Price per. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Price per</strong> is a plain number. It is worked out from Price or rent and Floor space in. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Price or rent</strong> is a plain number. It is worked out from Price per and Floor space in. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Floor space in</strong> is a square meters figure. It is worked out from Price or rent and Price per. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Price per</strong> is a plain number. It is worked out from Price or rent and Floor space in. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Price per square meter actually offers.</p><ul><li><strong>square meters</strong> — opens in <em>m2</em>, and the chip also carries m², in², ft², yd², ac and ha. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Price per follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are square meters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Price or rent and Floor space in are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Price or rent and Floor space in and the number you are missing is Price per and Price or rent.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/growing-annuity">Growing annuity Calculator</a>, <a href="/finance/gst">GST</a> and <a href="/finance/gst-qst">GST/QST Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Price per square meter calculator work out?', 'a' => 'Price per, Price or rent, Floor space in and Price per, from Price or rent and Floor space in. The relationship is Price per = Price or rent ÷ Floor space in .'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Price or rent (USD), Floor space in (square meters). Fill price or rent and floor space in and leave Price per {{pricePerSqM.fullUnit}} empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Price per, Price or rent, Floor space in and Price per can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Price per {{pricePerSqM.fullUnit}} is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Price or rent blank and the page solves for it, reporting Price per {{pricePerSqM.fullUnit}} instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Price per {{pricePerSqM.fullUnit}} at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/growing-annuity', 'name' => 'Growing annuity Calculator'],
            ['path' => '/finance/gst', 'name' => 'GST'],
            ['path' => '/finance/gst-qst', 'name' => 'GST/QST Calculator'],
        ],
        'authors' => [],
    ],
];

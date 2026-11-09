<?php

/**
 * Grain conversion
 * /biology/grain-conversion
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Grain conversion',
    'meta' => ['title' => 'Grain conversion Calculator: Units & Formula', 'description' => 'Grain conversion works out bushels and price per bushel from agricultural commodity, amount and Price per {{PricePerUnit.fullUnit}}. The answer is shown in USD.', 'h1' => 'Grain conversion Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Grain',
                            'label' => 'Agricultural commodity',
                            'type' => 'select',
                            'options' => [
                                'Alfalfa seed' => '27.2',
                                'Barley' => '21.8',
                                'Beans, Lima (dry)' => '25.4',
                                'Beans, Other (dry)' => '27.2',
                                'Bluegrass seed' => '10',
                                'Broomcorn seed' => '21.3',
                                'Buckwheat' => '21.8',
                                'Castor beans' => '18.6',
                                'Clover seed' => '27.2',
                                'Corn, Ear (husked)' => '31.8',
                                'Corn, Shelled' => '25.4',
                                'Corn Meal' => '22.7',
                                'Cottonseed' => '14.5',
                                'Cowpeas' => '27.2',
                                'Flaxseed' => '25.4',
                                'Hempseed' => '20',
                                'Hickory nuts' => '22.7',
                                'Hungarian millet seed' => '22.2',
                                'Kapok seed' => '17',
                                'Lentils' => '27.2',
                                'Malt' => '15.4',
                                'Meadow fescue seed' => '10.9',
                                'Millet' => '22.2',
                                'Mustard seed' => '26.7',
                                'Oats' => '14.5',
                                'Onion sets' => '13.6',
                                'Orchardgrass seed' => '6.4',
                                'Parsnips' => '22.7',
                                'Peanuts, unshelled, Virginia type' => '7.7',
                                'Peanuts, unshelled, Runners, southeastern' => '9.5',
                                'Peanuts, unshelled, Spanish' => '11.3',
                                'Peas, green, unshelled' => '13.1',
                                'Peas, green, dry' => '27.2',
                                'Perilla seed' => '17.4',
                                'Popcorn, on ear' => '31.8',
                                'Popcorn, shelled' => '25.4',
                                'Poppy seed' => '20.9',
                                'Rapeseed' => '25',
                                'Redtop seed' => '25',
                                'Rice' => '20.4',
                                'Rye' => '25.4',
                                'Sesame seed' => '20.9',
                                'Sorgo seed' => '22.7',
                                'Sorghum grain' => '25.4',
                                'Soybeans' => '27.2',
                                'Spelt' => '18.1',
                                'Spinach' => '11.3',
                                'Sudangrass seed ' => '18.1',
                                'Sunflower seed' => '12.7',
                                'Timothy seed' => '20.4',
                                'Velvetbeans (hulled)' => '27.2',
                                'Vetch' => '27.2',
                                'Wheat' => '27.2',
                            ],
                            'dataset' => 'Commodities',
                            'control' => 'DROPDOWN',
                            'default' => 'Corn, Ear (husked)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Amount',
                            'label' => 'Amount',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 't',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Bushels',
                            'label' => 'Bushels',
                            'type' => 'number',
                            'suffix' => 'bu.',
                            'help' => 'The calculator shows the equivalent amount in bushels',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Calculate price per unit' => '1'],
                            'dataset' => 'second',
                            'control' => 'CHECKBOX',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PricePerUnit',
                            'label' => 'Price per {{PricePerUnit.fullUnit}}',
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
                            'name' => 'PricePerBushel',
                            'label' => 'Price per bushel',
                            'type' => 'number',
                            'suffix' => '/ bu.',
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
                            'name' => 'PriceTotal',
                            'label' => 'Price total',
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
            'title' => 'Second commodity',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Grain2',
                            'label' => 'Agricultural commodity',
                            'type' => 'select',
                            'options' => [
                                'Alfalfa seed' => '27.2',
                                'Barley' => '21.8',
                                'Beans, Lima (dry)' => '25.4',
                                'Beans, Other (dry)' => '27.2',
                                'Bluegrass seed' => '10',
                                'Broomcorn seed' => '21.3',
                                'Buckwheat' => '21.8',
                                'Castor beans' => '18.6',
                                'Clover seed' => '27.2',
                                'Corn, Ear (husked)' => '31.8',
                                'Corn, Shelled' => '25.4',
                                'Corn Meal' => '22.7',
                                'Cottonseed' => '14.5',
                                'Cowpeas' => '27.2',
                                'Flaxseed' => '25.4',
                                'Hempseed' => '20',
                                'Hickory nuts' => '22.7',
                                'Hungarian millet seed' => '22.2',
                                'Kapok seed' => '17',
                                'Lentils' => '27.2',
                                'Malt' => '15.4',
                                'Meadow fescue seed' => '10.9',
                                'Millet' => '22.2',
                                'Mustard seed' => '26.7',
                                'Oats' => '14.5',
                                'Onion sets' => '13.6',
                                'Orchardgrass seed' => '6.4',
                                'Parsnips' => '22.7',
                                'Peanuts, unshelled, Virginia type' => '7.7',
                                'Peanuts, unshelled, Runners, southeastern' => '9.5',
                                'Peanuts, unshelled, Spanish' => '11.3',
                                'Peas, green, unshelled' => '13.1',
                                'Peas, green, dry' => '27.2',
                                'Perilla seed' => '17.4',
                                'Popcorn, on ear' => '31.8',
                                'Popcorn, shelled' => '25.4',
                                'Poppy seed' => '20.9',
                                'Rapeseed' => '25',
                                'Redtop seed' => '25',
                                'Rice' => '20.4',
                                'Rye' => '25.4',
                                'Sesame seed' => '20.9',
                                'Sorgo seed' => '22.7',
                                'Sorghum grain' => '25.4',
                                'Soybeans' => '27.2',
                                'Spelt' => '18.1',
                                'Spinach' => '11.3',
                                'Sudangrass seed ' => '18.1',
                                'Sunflower seed' => '12.7',
                                'Timothy seed' => '20.4',
                                'Velvetbeans (hulled)' => '27.2',
                                'Vetch' => '27.2',
                                'Wheat' => '27.2',
                            ],
                            'dataset' => 'Commodities',
                            'control' => 'DROPDOWN',
                            'default' => 'Wheat',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Amount2',
                            'label' => 'Amount',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 't',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Bushels2',
                            'label' => 'Bushels',
                            'type' => 'number',
                            'suffix' => 'bu.',
                            'help' => 'The calculator shows the equivalent amount in bushels',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PricePerUnit2',
                            'label' => 'Price per {{PricePerUnit2.fullUnit}}',
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
                            'name' => 'PricePerBushel2',
                            'label' => 'Price per bushel',
                            'type' => 'number',
                            'suffix' => '/ bu.',
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
                            'name' => 'PriceTotal2',
                            'label' => 'Price total',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'difference > 0', 'text' => 'Price per bushel of first commodity is {{difference.monetaryValue}} higher than price per bushel of second commodity.&nbsp;'],
                                ['when' => 'difference < 0', 'text' => 'Price per bushel of second commodity is {{absolut.monetaryValue}} higher than price per bushel of first commodity.&nbsp;'],
                                ['when' => 'difference == 0', 'text' => 'Price per bushel of first commodity is equal to the price per bushel of second commodity.&nbsp;'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference',
                            'label' => 'Difference',
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
                            'name' => 'absolut',
                            'label' => 'Absolut',
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
            'title' => 'Amount/Grain=Bushels',
            'results' => ['Amount' => 'Bushels*Grain', 'Bushels' => 'Amount/Grain', 'Grain' => 'Amount/Bushels'],
        ],
        [
            'title' => 'PriceTotal/Bushels=PricePerBushel',
            'results' => ['PricePerBushel' => 'PriceTotal/Bushels', 'PriceTotal' => 'Bushels*PricePerBushel', 'Bushels' => 'PriceTotal/PricePerBushel'],
        ],
        [
            'title' => 'PricePerUnit*Amount=PriceTotal',
            'results' => ['PricePerUnit' => 'PriceTotal/Amount', 'Amount' => 'PriceTotal/PricePerUnit', 'PriceTotal' => 'Amount*PricePerUnit'],
        ],
        [
            'title' => 'Amount2/Grain2=Bushels2',
            'results' => ['Amount2' => 'Bushels2*Grain2', 'Bushels2' => 'Amount2/Grain2', 'Grain2' => 'Amount2/Bushels2'],
        ],
        [
            'title' => 'PriceTotal2/Bushels2=PricePerBushel2',
            'results' => ['PricePerBushel2' => 'PriceTotal2/Bushels2', 'Bushels2' => 'PriceTotal2/PricePerBushel2', 'PriceTotal2' => 'Bushels2*PricePerBushel2'],
        ],
        [
            'title' => 'PricePerUnit2*Amount2=PriceTotal2',
            'results' => ['Amount2' => 'PriceTotal2/PricePerUnit2', 'PriceTotal2' => 'Amount2*PricePerUnit2', 'PricePerUnit2' => 'PriceTotal2/Amount2'],
        ],
        [
            'title' => 'PricePerBushel-PricePerBushel2=difference',
            'results' => ['PricePerBushel' => 'PricePerBushel2 + difference', 'difference' => 'PricePerBushel - PricePerBushel2', 'PricePerBushel2' => 'PricePerBushel - difference'],
        ],
        [
            'title' => 'absolut=abs(difference)',
            'results' => ['absolut' => 'abs(difference)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Difference into Grain conversion and the answer comes back as Agricultural commodity and Amount. The arithmetic is the whole method: agricultural commodity is worked out from difference by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Grain conversion calculator works', 'html' => <<<'TXT'
            <p>Grain conversion answers one question from 1 number, and the answer is Agricultural commodity, Amount and Bushels.</p><p>Written with the labels from the form, Amount = Bushels × Agricultural commodity.</p><p>The result panel carries Agricultural commodity, Amount, Bushels and Price per, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Difference</strong> — in USD</li></ul><p>The answers come back as Agricultural commodity, Amount in metric tons, Bushels in bu., Price per in USD, Price per bushel in / bu., Price total in USD, Agricultural commodity, Amount in metric tons, Bushels in bu., Price per in USD, Price per bushel in / bu., Price total in USD, Absolut in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Amount lists 5 options and opens on metric tons. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Amount</strong> = <code>Bushels × Agricultural commodity</code></li><li><strong>Bushels</strong> = <code>Amount ÷ Agricultural commodity</code></li><li><strong>Agricultural commodity</strong> = <code>Amount ÷ Bushels</code></li><li><strong>Price per bushel</strong> = <code>Price total ÷ Bushels</code></li><li><strong>Price total</strong> = <code>Bushels × Price per bushel</code></li><li><strong>Price per</strong> = <code>Price total ÷ Amount</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Amount</strong> = <code>Bushels × Agricultural commodity</code> — the form to use when Bushels and Agricultural commodity are the values you have.</li><li><strong>Bushels</strong> = <code>Amount ÷ Agricultural commodity</code> — the form to use when Amount and Agricultural commodity are the values you have.</li><li><strong>Agricultural commodity</strong> = <code>Amount ÷ Bushels</code> — the form to use when Amount and Bushels are the values you have.</li><li><strong>Price per bushel</strong> = <code>Price total ÷ Bushels</code> — the form to use when Price total and Bushels are the values you have.</li><li><strong>Price total</strong> = <code>Bushels × Price per bushel</code> — the form to use when Bushels and Price per bushel are the values you have.</li><li><strong>Bushels</strong> = <code>Price total ÷ Price per bushel</code> — the form to use when Price total and Price per bushel are the values you have.</li><li><strong>Price per</strong> = <code>Price total ÷ Amount</code> — the form to use when Price total and Amount are the values you have.</li><li><strong>Amount</strong> = <code>Price total ÷ Price per </code> — the form to use when Price total and Price per are the values you have.</li></ul><p>Any one of Amount, Bushels and Agricultural commodity can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Agricultural commodity, Amount and Bushels are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Difference left as a guess.</strong> Anything typed into Difference is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Difference and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Grain conversion form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Difference</strong> takes a plain number with no unit attached. The page reads it when it works out Price per bushel, Price per bushel and Absolut. Fill it from a measurement rather than a memory — Difference is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Agricultural commodity</strong> is a plain number. The value follows from Amount and Bushels. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Amount</strong> is a metric tons figure. The value follows from Bushels and Agricultural commodity. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Bushels</strong> is a plain number. The value follows from Amount and Agricultural commodity. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Price per</strong> is a plain number. The value follows from Price total and Amount. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Price per bushel</strong> is a plain number. The value follows from Price total and Bushels. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Price total</strong> is a plain number. The value follows from Bushels and Price per bushel. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Agricultural commodity</strong> is a plain number. The value follows from Amount and Bushels. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Amount</strong> is a metric tons figure. The value follows from Bushels and Agricultural commodity. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Bushels</strong> is a plain number. The value follows from Amount and Agricultural commodity. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Price per</strong> is a plain number. The value follows from Price total and Amount. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Price per bushel</strong> is a plain number. The value follows from Price total and Bushels. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Price total</strong> is a plain number. The value follows from Bushels and Price per bushel. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Absolut</strong> is a plain number. The value follows from Difference. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Grain conversion actually offers.</p><ul><li><strong>metric tons</strong> — opens in <em>t</em>, and the chip also carries lb, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Agricultural commodity is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are metric tons and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Difference are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Difference and the number you are missing is Agricultural commodity and Amount.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Grain conversion calculator work out?', 'a' => 'Agricultural commodity, Amount, Bushels and Price per, from Bushels and Agricultural commodity. The relationship is Amount = Bushels × Agricultural commodity.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Difference (USD). Enter difference; Agricultural commodity is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Amount, Bushels, Agricultural commodity and Price per bushel blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Agricultural commodity is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Difference blank and the page solves for it, reporting Agricultural commodity instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Agricultural commodity keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/fish-per-liter', 'name' => 'Fish Per Liter Calculator'],
            ['path' => '/biology/fish-tank-stocking', 'name' => 'Fish Tank Stocking Calculator'],
            ['path' => '/biology/fixation-index-fst', 'name' => 'Fixation Index (Fst) Calculator'],
        ],
        'authors' => [],
    ],
];

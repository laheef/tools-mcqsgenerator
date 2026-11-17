<?php

/**
 * Futures contract
 * /finance/futures-contract
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Futures contract',
    'meta' => ['title' => 'Futures contract Calculator: Free, With Steps', 'description' => 'Futures contract takes which way are you trading? and returns point value. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Futures contract Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Trade parameters',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'longOrShort',
                            'label' => 'Which way are you trading?',
                            'type' => 'select',
                            'options' => ['Long position' => '0', 'Short position' => '1'],
                            'dataset' => 'tradingType',
                            'default' => 'Long position',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'choicemain',
                            'label' => 'Select your futures contract:',
                            'type' => 'select',
                            'options' => [
                                'Micro E-Mini S&P 500' => '1',
                                'Micro E-Mini NASDAQ-100' => '2',
                                'Micro E-Mini Russel 2000' => '3',
                                'Crude oil WTI' => '4',
                                'Palladium PA' => '6',
                                'E-mini Dow (YM) Globex' => '5',
                                'Custom' => '10',
                            ],
                            'dataset' => 'data',
                            'control' => 'DROPDOWN',
                            'default' => 'Micro E-Mini S&P 500',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tick',
                            'label' => 'Tick value',
                            'type' => 'result',
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
                            'name' => 'numbertick',
                            'label' => 'Number of ticks per point',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pointvalue',
                            'label' => 'Point value',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Trade profit / loss',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'buyp',
                            'label' => 'Add your buying contract price',
                            'type' => 'number',
                            'suffix' => 'points',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sellp',
                            'label' => 'Add your selling contract price',
                            'type' => 'number',
                            'suffix' => 'points',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numberpoint',
                            'label' => 'Number of points',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numbercontract',
                            'label' => 'Number of futures contracts',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pl',
                            'label' => 'Profit / loss for a long position',
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
                            'name' => 'pls',
                            'label' => 'Profit / loss for a short position',
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
                                ['when' => 'longOrShort==0 and pl>0', 'text' => 'Congratulations, you are making profits in your futures long position. Consider investing that money into a high ROCE company.'],
                                ['when' => 'longOrShort==1 and pls>0', 'text' => 'Congratulations, you are making profits in your futures short position. Consider investing that money into a high free cash flow margin company.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'pl=tick*numbertick*numberpoint*numbercontract',
            'results' => [
                'numberpoint' => 'pl/(numbercontract*numbertick*tick)',
                'tick' => 'pl/(numbercontract*numberpoint*numbertick)',
                'numbertick' => 'pl/(numbercontract*numberpoint*tick)',
                'numbercontract' => 'pl/(numberpoint*numbertick*tick)',
                'pl' => 'numbercontract*numberpoint*numbertick*tick',
            ],
        ],
        [
            'title' => 'numberpoint=(sellp-buyp)',
            'results' => ['buyp' => '-numberpoint + sellp', 'sellp' => 'buyp + numberpoint', 'numberpoint' => '-buyp + sellp'],
        ],
        [
            'title' => 'pls=-1*pl',
            'results' => ['pls' => '-pl', 'pl' => '-pls'],
        ],
        [
            'title' => 'pointvalue=tick*numbertick',
            'results' => ['numbertick' => 'pointvalue/tick', 'tick' => 'pointvalue/numbertick', 'pointvalue' => 'numbertick*tick'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Which way are you trading?, Select your futures contract and Add your buying contract price into Futures contract and the answer comes back as Tick value and Number of ticks per point. Nothing is looked up on this page: tick value is computed from which way are you trading? and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Tick value is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Futures contract calculator works', 'html' => <<<'TXT'
            <p>The Futures contract calculator applies one relationship to 8 numbers and reports Tick value, Number of ticks per point and Point value.</p><p>In the form&#039;s own words, Profit / loss for a long position = Number of futures contracts × Number of points × Number of ticks per point × Tick value.</p><p>The answers are Tick value, Number of ticks per point and Point value; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 8 boxes, and nothing else.</p><ul><li><strong>Which way are you trading?</strong> — a plain number, no unit</li><li><strong>Select your futures contract</strong> — a plain number, no unit</li><li><strong>Add your buying contract price</strong> — in points</li><li><strong>Add your selling contract price</strong> — in points</li><li><strong>Number of points</strong> — a plain number, no unit</li><li><strong>Number of futures contracts</strong> — a plain number, no unit</li><li><strong>Profit / loss for a long position</strong> — in USD</li><li><strong>Profit / loss for a short position</strong> — in USD</li></ul><p>What you get back is Tick value in USD, Number of ticks per point, Point value in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Which way are you trading? = 0 and Select your futures contract = 1; the answers are <strong>Point value</strong> = 0 USD.</p><ul><li><strong>Point value</strong> = 0 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Profit / loss for a long position</strong> = <code>Number of futures contracts × Number of points × Number of ticks per point × Tick value</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Point value</strong> = 0. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Tick value is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Profit / loss for a long position</strong> = <code>Number of futures contracts × Number of points × Number of ticks per point × Tick value</code></li><li><strong>Number of points</strong> = <code>Profit / loss for a long position ÷ (Number of futures contracts × Number of ticks per point × Tick value)</code></li><li><strong>Tick value</strong> = <code>Profit / loss for a long position ÷ (Number of futures contracts × Number of points × Number of ticks per point)</code></li><li><strong>Number of ticks per point</strong> = <code>Profit / loss for a long position ÷ (Number of futures contracts × Number of points × Tick value)</code></li><li><strong>Number of futures contracts</strong> = <code>Profit / loss for a long position ÷ (Number of points × Number of ticks per point × Tick value)</code></li><li><strong>Add your buying contract price</strong> = <code>− Number of points + Add your selling contract price</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Profit / loss for a long position</strong> = <code>Number of futures contracts × Number of points × Number of ticks per point × Tick value</code> — the form to use when Number of futures contracts, Number of points, Number of ticks per point and Tick value are the values you have.</li><li><strong>Number of points</strong> = <code>Profit / loss for a long position ÷ (Number of futures contracts × Number of ticks per point × Tick value)</code> — the form to use when Profit / loss for a long position, Number of futures contracts, Number of ticks per point and Tick value are the values you have.</li><li><strong>Tick value</strong> = <code>Profit / loss for a long position ÷ (Number of futures contracts × Number of points × Number of ticks per point)</code> — the form to use when Profit / loss for a long position, Number of futures contracts, Number of points and Number of ticks per point are the values you have.</li><li><strong>Number of ticks per point</strong> = <code>Profit / loss for a long position ÷ (Number of futures contracts × Number of points × Tick value)</code> — the form to use when Profit / loss for a long position, Number of futures contracts, Number of points and Tick value are the values you have.</li><li><strong>Number of futures contracts</strong> = <code>Profit / loss for a long position ÷ (Number of points × Number of ticks per point × Tick value)</code> — the form to use when Profit / loss for a long position, Number of points, Number of ticks per point and Tick value are the values you have.</li><li><strong>Number of points</strong> = <code>− Add your buying contract price + Add your selling contract price</code> — the form to use when Add your buying contract price and Add your selling contract price are the values you have.</li><li><strong>Add your buying contract price</strong> = <code>− Number of points + Add your selling contract price</code> — the form to use when Number of points and Add your selling contract price are the values you have.</li><li><strong>Add your selling contract price</strong> = <code>Add your buying contract price + Number of points</code> — the form to use when Add your buying contract price and Number of points are the values you have.</li></ul><p>Any one of Profit / loss for a long position, Number of points and Tick value can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Tick value, Number of ticks per point and Point value are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Which way are you trading? left as a guess.</strong> Anything typed into Which way are you trading? is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Select your futures contract left as a guess.</strong> Anything typed into Select your futures contract is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Add your buying contract price left as a guess.</strong> Anything typed into Add your buying contract price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Which way are you trading? and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Futures contract form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Which way are you trading?</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Which way are you trading? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Select your futures contract</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Select your futures contract is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Add your buying contract price</strong> is measured in points. It feeds Add your selling contract price and Number of points. Fill it from a measurement rather than a memory — Add your buying contract price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Add your selling contract price</strong> is measured in points. It feeds Add your buying contract price and Number of points. Fill it from a measurement rather than a memory — Add your selling contract price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of points</strong> takes a plain number with no unit attached. It feeds Tick value, Number of ticks per point and Number of futures contracts. Fill it from a measurement rather than a memory — Number of points is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of futures contracts</strong> takes a plain number with no unit attached. It feeds Number of points, Tick value and Number of ticks per point. Fill it from a measurement rather than a memory — Number of futures contracts is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Profit / loss for a long position</strong> takes a plain number with no unit attached. It feeds Number of points, Tick value and Number of ticks per point. Fill it from a measurement rather than a memory — Profit / loss for a long position is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Profit / loss for a short position</strong> takes a plain number with no unit attached. It feeds Profit / loss for a long position. Fill it from a measurement rather than a memory — Profit / loss for a short position is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Tick value is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Which way are you trading?, Select your futures contract and Add your buying contract price are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Which way are you trading?, Select your futures contract and Add your buying contract price and the number you are missing is Tick value and Number of ticks per point.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/mortgage-refinance">Mortgage refinance Calculator</a>, <a href="/finance/moving-average">Moving average Calculator</a> and <a href="/finance/mps">MPS (marginal propensity to save) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Futures contract calculator work out?', 'a' => <<<'TXT'
            Tick value, Number of ticks per point and Point value, from Number of futures contracts, Number of points, Number of ticks per point and Tick value. The relationship is Profit / loss for a long position = Number of futures contracts × Number of points × Number of ticks per point × Tick value.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Which way are you trading?, Select your futures contract, Add your buying contract price (points), Add your selling contract price (points), Number of points. Fill which way are you trading?, select your futures contract and add your buying contract price and leave Tick value empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Profit / loss for a long position, Number of points, Tick value and Number of ticks per point blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Point value = 0 USD. That comes from the page\'s own defaults, entered in Which way are you trading?; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Tick value is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Which way are you trading? blank and the page solves for it, reporting Tick value instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Tick value keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/mortgage-refinance', 'name' => 'Mortgage refinance Calculator'],
            ['path' => '/finance/moving-average', 'name' => 'Moving average Calculator'],
            ['path' => '/finance/mps', 'name' => 'MPS (marginal propensity to save) Calculator'],
        ],
        'authors' => [],
    ],
];

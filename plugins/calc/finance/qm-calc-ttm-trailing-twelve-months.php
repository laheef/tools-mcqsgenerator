<?php

/**
 * TTM (trailing twelve months)
 * /finance/ttm-trailing-twelve-months
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'TTM (trailing twelve months)',
    'meta' => ['title' => 'TTM (trailing twelve months) — Formula & Results', 'description' => 'Enter TTM mode, TTM last reported quarter and TTM one quarter before and TTM (trailing twelve months) returns trailing twelve month value and Revenue TTM.', 'h1' => 'TTM (trailing twelve months) Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'choicemain',
                            'label' => 'TTM mode',
                            'type' => 'select',
                            'options' => [
                                'Original TTM mode' => '0',
                                'TTM Revenue' => '1',
                                'TTM EPS' => '2',
                                'TTM PE' => '3',
                                'EV/ EBITDA' => '5',
                                'TTM Yield' => '4',
                            ],
                            'dataset' => 'ttm_modeDS',
                            'control' => 'DROPDOWN',
                            'default' => 'Original TTM mode',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'You can pick any income statement or cash flow statement quarterly value. Examples: Total dividends, free cash flow, operating cash flow, among others.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Original TTM mode',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TTM1',
                            'label' => 'TTM last reported quarter',
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
                            'name' => 'TTM2',
                            'label' => 'TTM one quarter before',
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
                            'name' => 'TTM3',
                            'label' => 'TTM two quarters before',
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
                            'name' => 'TTM4',
                            'label' => 'TTM three quarters before',
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
                            'name' => 'TTM',
                            'label' => 'Trailing twelve month value',
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
            'title' => 'TTM Revenue',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'REVTTM1',
                            'label' => 'Revenue last reported quarter',
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
                            'name' => 'REVTTM2',
                            'label' => 'Revenue one quarter before',
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
                            'name' => 'REVTTM3',
                            'label' => 'Revenue two quarters before',
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
                            'name' => 'REVTTM4',
                            'label' => 'Revenue three quarters before',
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
                            'name' => 'REVTTM',
                            'label' => 'Revenue TTM',
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
            'title' => 'TTM EPS',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'EPSTTM1',
                            'label' => 'EPS last reported quarter',
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
                            'name' => 'EPSTTM2',
                            'label' => 'EPS one quarter before',
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
                            'name' => 'EPSTTM3',
                            'label' => 'EPS two quarters before',
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
                            'name' => 'EPSTTM4',
                            'label' => 'EPS three quarters before',
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
                            'name' => 'EPSTTM',
                            'label' => 'Earnings per share TTM',
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
            'title' => 'Price Earnings Ratio TTM',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price2',
                            'label' => 'Current stock price',
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
                            'name' => 'PETTM',
                            'label' => 'Price to earnings TTM',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'You should use our EPS TTM mode if you want to deal with negative EPS.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'TTM Yield',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shares',
                            'label' => 'Outstanding shares',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price',
                            'label' => 'Current stock price',
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
                            'name' => 'YIELDTTM',
                            'label' => 'Yield TTM',
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
            'title' => 'EV/EBITDA TTM',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ETTM1',
                            'label' => 'EBITDA last reported quarter',
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
                            'name' => 'ETTM2',
                            'label' => 'EBITDA one quarter before',
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
                            'name' => 'ETTM3',
                            'label' => 'EBITDA two quarters before',
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
                            'name' => 'ETTM4',
                            'label' => 'EBITDA three quarters before',
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
                            'name' => 'EV',
                            'label' => 'Enterprise value',
                            'type' => 'number',
                            'help' => 'Considered as the acquisition value of a company.',
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
                            'name' => 'EBITDATTM',
                            'label' => 'EV /  EBITDA TTM',
                            'type' => 'number',
                            'help' => 'Also called EBITDA multiple.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'You should use our Original TTM mode if you want to deal with negative EBITDA.'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'TTM = TTM1 + TTM2 + TTM3 + TTM4',
            'results' => [
                'TTM1' => 'TTM - TTM2 - TTM3 - TTM4',
                'TTM4' => 'TTM - TTM1 - TTM2 - TTM3',
                'TTM3' => 'TTM - TTM1 - TTM2 - TTM4',
                'TTM' => 'TTM1 + TTM2 + TTM3 + TTM4',
                'TTM2' => 'TTM - TTM1 - TTM3 - TTM4',
            ],
        ],
        [
            'title' => 'REVTTM = REVTTM1 + REVTTM2 + REVTTM3 + REVTTM4',
            'results' => [
                'REVTTM4' => 'REVTTM - REVTTM1 - REVTTM2 - REVTTM3',
                'REVTTM2' => 'REVTTM - REVTTM1 - REVTTM3 - REVTTM4',
                'REVTTM1' => 'REVTTM - REVTTM2 - REVTTM3 - REVTTM4',
                'REVTTM' => 'REVTTM1 + REVTTM2 + REVTTM3 + REVTTM4',
                'REVTTM3' => 'REVTTM - REVTTM1 - REVTTM2 - REVTTM4',
            ],
        ],
        [
            'title' => 'EPSTTM = EPSTTM1 + EPSTTM2 + EPSTTM3 + EPSTTM4',
            'results' => [
                'EPSTTM3' => 'EPSTTM - EPSTTM1 - EPSTTM2 - EPSTTM4',
                'EPSTTM1' => 'EPSTTM - EPSTTM2 - EPSTTM3 - EPSTTM4',
                'EPSTTM2' => 'EPSTTM - EPSTTM1 - EPSTTM3 - EPSTTM4',
                'EPSTTM4' => 'EPSTTM - EPSTTM1 - EPSTTM2 - EPSTTM3',
                'EPSTTM' => 'EPSTTM1 + EPSTTM2 + EPSTTM3 + EPSTTM4',
            ],
        ],
        [
            'title' => 'YIELDTTM =  ((TTM1 + TTM2 + TTM3 + TTM4)/shares)/price',
            'results' => [
                'TTM1' => '-TTM2 - TTM3 - TTM4 + YIELDTTM*price*shares',
                'TTM4' => '-TTM1 - TTM2 - TTM3 + YIELDTTM*price*shares',
                'YIELDTTM' => '(TTM1 + TTM2 + TTM3 + TTM4)/(price*shares)',
                'price' => '(TTM1 + TTM2 + TTM3 + TTM4)/(YIELDTTM*shares)',
                'TTM3' => '-TTM1 - TTM2 - TTM4 + YIELDTTM*price*shares',
                'shares' => '(TTM1 + TTM2 + TTM3 + TTM4)/(YIELDTTM*price)',
                'TTM2' => '-TTM1 - TTM3 - TTM4 + YIELDTTM*price*shares',
            ],
        ],
        [
            'title' => 'EBITDATTM = EV/(ETTM1 + ETTM2 + ETTM3 + ETTM4)',
            'results' => [
                'EBITDATTM' => 'EV/(ETTM1 + ETTM2 + ETTM3 + ETTM4)',
                'ETTM2' => '-ETTM1 - ETTM3 - ETTM4 + EV/EBITDATTM',
                'ETTM4' => '-ETTM1 - ETTM2 - ETTM3 + EV/EBITDATTM',
                'ETTM1' => '-ETTM2 - ETTM3 - ETTM4 + EV/EBITDATTM',
                'ETTM3' => '-ETTM1 - ETTM2 - ETTM4 + EV/EBITDATTM',
                'EV' => 'EBITDATTM*(ETTM1 + ETTM2 + ETTM3 + ETTM4)',
            ],
        ],
        [
            'title' => 'PETTM = price2/(EPSTTM1 + EPSTTM2 + EPSTTM3 + EPSTTM4)',
            'results' => [
                'EPSTTM3' => '-EPSTTM1 - EPSTTM2 - EPSTTM4 + price2/PETTM',
                'EPSTTM1' => '-EPSTTM2 - EPSTTM3 - EPSTTM4 + price2/PETTM',
                'price2' => 'PETTM*(EPSTTM1 + EPSTTM2 + EPSTTM3 + EPSTTM4)',
                'EPSTTM2' => '-EPSTTM1 - EPSTTM3 - EPSTTM4 + price2/PETTM',
                'EPSTTM4' => '-EPSTTM1 - EPSTTM2 - EPSTTM3 + price2/PETTM',
                'PETTM' => 'price2/(EPSTTM1 + EPSTTM2 + EPSTTM3 + EPSTTM4)',
            ],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        TTM (trailing twelve months) works out Trailing twelve month value and Revenue last reported quarter from TTM last reported quarter, TTM one quarter before and TTM two quarters before. It is a single relationship that reads trailing twelve month value out of TTM last reported quarter, not a table of canned results keyed by them. Units for Trailing twelve month value default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the TTM (trailing twelve months) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind TTM (trailing twelve months): it takes 4 numbers and reports Trailing twelve month value, Revenue last reported quarter and Revenue one quarter before.</p><p>Written with the labels from the form, Trailing twelve month value = TTM last reported quarter + TTM one quarter before + TTM two quarters before + TTM three quarters before.</p><p>The result panel carries Trailing twelve month value, Revenue last reported quarter, Revenue one quarter before and Revenue two quarters before, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>TTM last reported quarter</strong> — in USD</li><li><strong>TTM one quarter before</strong> — in USD</li><li><strong>TTM two quarters before</strong> — in USD</li><li><strong>TTM three quarters before</strong> — in USD</li></ul><p>The result boxes are Trailing twelve month value in USD, Revenue last reported quarter in USD, Revenue one quarter before in USD, Revenue two quarters before in USD, Revenue three quarters before in USD, Revenue TTM in USD, EPS last reported quarter in USD, EPS one quarter before in USD, EPS two quarters before in USD, EPS three quarters before in USD, Earnings per share TTM in USD, Current stock price in USD, Price to earnings TTM, Outstanding shares, Current stock price in USD, Yield TTM in percent, EBITDA last reported quarter in USD, EBITDA one quarter before in USD, EBITDA two quarters before in USD, EBITDA three quarters before in USD, Enterprise value in USD, EV / EBITDA TTM; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Yield TTM lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Trailing twelve month value</strong> = <code>TTM last reported quarter + TTM one quarter before + TTM two quarters before + TTM three quarters before</code></li><li><strong>TTM last reported quarter</strong> = <code>Trailing twelve month value − TTM one quarter before − TTM two quarters before − TTM three quarters before</code></li><li><strong>TTM three quarters before</strong> = <code>Trailing twelve month value − TTM last reported quarter − TTM one quarter before − TTM two quarters before</code></li><li><strong>TTM two quarters before</strong> = <code>Trailing twelve month value − TTM last reported quarter − TTM one quarter before − TTM three quarters before</code></li><li><strong>TTM one quarter before</strong> = <code>Trailing twelve month value − TTM last reported quarter − TTM two quarters before − TTM three quarters before</code></li><li><strong>Revenue TTM</strong> = <code>Revenue last reported quarter + Revenue one quarter before + Revenue two quarters before + Revenue three quarters before</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Trailing twelve month value</strong> = <code>TTM last reported quarter + TTM one quarter before + TTM two quarters before + TTM three quarters before</code> — the form to use when TTM last reported quarter, TTM one quarter before, TTM two quarters before and TTM three quarters before are the values you have.</li><li><strong>TTM last reported quarter</strong> = <code>Trailing twelve month value − TTM one quarter before − TTM two quarters before − TTM three quarters before</code> — the form to use when Trailing twelve month value, TTM one quarter before, TTM two quarters before and TTM three quarters before are the values you have.</li><li><strong>TTM three quarters before</strong> = <code>Trailing twelve month value − TTM last reported quarter − TTM one quarter before − TTM two quarters before</code> — the form to use when Trailing twelve month value, TTM last reported quarter, TTM one quarter before and TTM two quarters before are the values you have.</li><li><strong>TTM two quarters before</strong> = <code>Trailing twelve month value − TTM last reported quarter − TTM one quarter before − TTM three quarters before</code> — the form to use when Trailing twelve month value, TTM last reported quarter, TTM one quarter before and TTM three quarters before are the values you have.</li><li><strong>TTM one quarter before</strong> = <code>Trailing twelve month value − TTM last reported quarter − TTM two quarters before − TTM three quarters before</code> — the form to use when Trailing twelve month value, TTM last reported quarter, TTM two quarters before and TTM three quarters before are the values you have.</li><li><strong>Revenue TTM</strong> = <code>Revenue last reported quarter + Revenue one quarter before + Revenue two quarters before + Revenue three quarters before</code> — the form to use when Revenue last reported quarter, Revenue one quarter before, Revenue two quarters before and Revenue three quarters before are the values you have.</li><li><strong>Revenue three quarters before</strong> = <code>Revenue TTM − Revenue last reported quarter − Revenue one quarter before − Revenue two quarters before</code> — the form to use when Revenue TTM, Revenue last reported quarter, Revenue one quarter before and Revenue two quarters before are the values you have.</li><li><strong>Revenue one quarter before</strong> = <code>Revenue TTM − Revenue last reported quarter − Revenue two quarters before − Revenue three quarters before</code> — the form to use when Revenue TTM, Revenue last reported quarter, Revenue two quarters before and Revenue three quarters before are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Trailing twelve month value, TTM last reported quarter and TTM three quarters before can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Trailing twelve month value, Revenue last reported quarter and Revenue one quarter before are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>TTM last reported quarter left as a guess.</strong> Anything typed into TTM last reported quarter is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>TTM one quarter before left as a guess.</strong> Anything typed into TTM one quarter before is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>TTM two quarters before left as a guess.</strong> Anything typed into TTM two quarters before is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert TTM last reported quarter to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>TTM last reported quarter</strong> takes a plain number with no unit attached. Change it and TTM three quarters before, TTM two quarters before and Trailing twelve month value changes with it. Have it to hand before you start: TTM last reported quarter is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>TTM one quarter before</strong> takes a plain number with no unit attached. Change it and TTM last reported quarter, TTM three quarters before and TTM two quarters before changes with it. Have it to hand before you start: TTM one quarter before is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>TTM two quarters before</strong> takes a plain number with no unit attached. Change it and TTM last reported quarter, TTM three quarters before and Trailing twelve month value changes with it. Have it to hand before you start: TTM two quarters before is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>TTM three quarters before</strong> takes a plain number with no unit attached. Change it and TTM last reported quarter, TTM two quarters before and Trailing twelve month value changes with it. Have it to hand before you start: TTM three quarters before is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Trailing twelve month value is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes TTM last reported quarter, TTM one quarter before and TTM two quarters before are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when TTM last reported quarter, TTM one quarter before and TTM two quarters before is what you already know and Trailing twelve month value and Revenue last reported quarter is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/roi">ROI Calculator</a>, <a href="/finance/roth-ira">Roth IRA Calculator</a> and <a href="/finance/rule-of-72">Rule of 72</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the TTM (trailing twelve months) calculator work out?', 'a' => <<<'TXT'
            Trailing twelve month value, Revenue last reported quarter, Revenue one quarter before and Revenue two quarters before, from TTM last reported quarter, TTM one quarter before, TTM two quarters before and TTM three quarters before. The relationship is Trailing twelve month value = TTM last reported quarter + TTM one quarter before + TTM two quarters before + TTM three quarters before.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            TTM last reported quarter (USD), TTM one quarter before (USD), TTM two quarters before (USD), TTM three quarters before (USD). Fill TTM last reported quarter, TTM one quarter before and TTM two quarters before and leave Trailing twelve month value empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Trailing twelve month value, TTM last reported quarter, TTM three quarters before and TTM two quarters before can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Trailing twelve month value is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With TTM last reported quarter left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Trailing twelve month value at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/roi', 'name' => 'ROI Calculator'],
            ['path' => '/finance/roth-ira', 'name' => 'Roth IRA Calculator'],
            ['path' => '/finance/rule-of-72', 'name' => 'Rule of 72'],
        ],
        'authors' => [],
    ],
];

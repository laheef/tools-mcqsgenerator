<?php

/**
 * Accrual ratio
 * /finance/accrual-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Accrual ratio',
    'meta' => ['title' => 'Accrual ratio Calculator — Formula & Results', 'description' => 'Accrual ratio works out beginning net operating assets and ending net operating assets from select type of accruals ratio and beginning operating asset.', 'h1' => 'Accrual ratio Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'select_type',
                            'label' => 'Select type of accruals ratio',
                            'type' => 'select',
                            'options' => ['Balance sheet accruals ratio' => '0', 'Cash flow accruals ratio' => '1'],
                            'dataset' => 'select_version_VS',
                            'default' => 'Balance sheet accruals ratio',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Beginning net operating assets',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beg_op_asset',
                            'label' => 'Beginning operating asset',
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
                            'name' => 'beg_op_liabilities',
                            'label' => 'Beginning operating liabilities',
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
                            'name' => 'beg_net_operating_assets',
                            'label' => 'Beginning net operating assets',
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
            'title' => 'Ending net operating assets',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'end_op_asset',
                            'label' => 'Ending operating assets',
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
                            'name' => 'end_op_liabilities',
                            'label' => 'Ending operating liabilities',
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
                            'name' => 'end_net_operating_assets',
                            'label' => 'Ending net operating assets',
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
            'title' => 'Accrual ratio',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bs_accrual_ratio',
                            'label' => 'Balance sheet accrual ratio',
                            'type' => 'number',
                            'suffix' => 'x',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net_income',
                            'label' => 'Net income',
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
                            'name' => 'cash_flow_operating',
                            'label' => 'Operating cash flow',
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
                            'name' => 'cash_flow_investing',
                            'label' => 'Investing cash flow',
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
                            'name' => 'cash_flow_accrual',
                            'label' => 'Cash flow accrual ratio',
                            'type' => 'number',
                            'suffix' => 'x',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'beg_net_operating_assets = beg_op_asset - beg_op_liabilities',
            'results' => ['beg_op_liabilities' => '-beg_net_operating_assets + beg_op_asset', 'beg_op_asset' => 'beg_net_operating_assets + beg_op_liabilities', 'beg_net_operating_assets' => 'beg_op_asset - beg_op_liabilities'],
        ],
        [
            'title' => 'end_net_operating_assets = end_op_asset - end_op_liabilities',
            'results' => ['end_op_liabilities' => '-end_net_operating_assets + end_op_asset', 'end_op_asset' => 'end_net_operating_assets + end_op_liabilities', 'end_net_operating_assets' => 'end_op_asset - end_op_liabilities'],
        ],
        [
            'title' => 'bs_accrual_ratio = (end_net_operating_assets - beg_net_operating_assets) / ((beg_net_operating_assets + end_net_operating_assets) / 2)',
            'results' => ['bs_accrual_ratio' => '2*(-beg_net_operating_assets + end_net_operating_assets)/(beg_net_operating_assets + end_net_operating_assets)', 'beg_net_operating_assets' => 'end_net_operating_assets*(2 - bs_accrual_ratio)/(bs_accrual_ratio + 2)', 'end_net_operating_assets' => 'beg_net_operating_assets*(-bs_accrual_ratio - 2)/(bs_accrual_ratio - 2)'],
        ],
        [
            'title' => 'cash_flow_accrual = (net_income - cash_flow_operating - cash_flow_investing) / ((beg_net_operating_assets + end_net_operating_assets) / 2)',
            'results' => [
                'cash_flow_accrual' => '2*(-cash_flow_investing - cash_flow_operating + net_income)/(beg_net_operating_assets + end_net_operating_assets)',
                'beg_net_operating_assets' => '(-cash_flow_accrual*end_net_operating_assets - 2*cash_flow_investing - 2*cash_flow_operating + 2*net_income)/cash_flow_accrual',
                'cash_flow_investing' => '-1/2*beg_net_operating_assets*cash_flow_accrual - 1/2*cash_flow_accrual*end_net_operating_assets - cash_flow_operating + net_income',
                'cash_flow_operating' => '-1/2*beg_net_operating_assets*cash_flow_accrual - 1/2*cash_flow_accrual*end_net_operating_assets - cash_flow_investing + net_income',
                'end_net_operating_assets' => '(-beg_net_operating_assets*cash_flow_accrual - 2*cash_flow_investing - 2*cash_flow_operating + 2*net_income)/cash_flow_accrual',
                'net_income' => '(1/2)*beg_net_operating_assets*cash_flow_accrual + (1/2)*cash_flow_accrual*end_net_operating_assets + cash_flow_investing + cash_flow_operating',
            ],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Accrual ratio works out Beginning net operating assets and Ending operating assets from Beginning operating asset and Beginning operating liabilities. It is a single relationship that reads beginning net operating assets out of beginning operating asset, not a table of canned results keyed by them. Units for Beginning net operating assets default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Accrual ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Accrual ratio: it takes 2 numbers and reports Beginning net operating assets, Ending operating assets and Ending operating liabilities.</p><p>Written with the labels from the form, Beginning net operating assets = Beginning operating asset − Beginning operating liabilities.</p><p>The answers are Beginning net operating assets, Ending operating assets, Ending operating liabilities and Ending net operating assets; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Beginning operating asset</strong> — in USD</li><li><strong>Beginning operating liabilities</strong> — in USD</li></ul><p>The result boxes are Beginning net operating assets in USD, Ending operating assets in USD, Ending operating liabilities in USD, Ending net operating assets in USD, Balance sheet accrual ratio in x, Net income in USD, Operating cash flow in USD, Investing cash flow in USD, Cash flow accrual ratio in x; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Beginning net operating assets is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Beginning net operating assets</strong> = <code>Beginning operating asset − Beginning operating liabilities</code></li><li><strong>Beginning operating liabilities</strong> = <code>− Beginning net operating assets + Beginning operating asset</code></li><li><strong>Beginning operating asset</strong> = <code>Beginning net operating assets + Beginning operating liabilities</code></li><li><strong>Ending net operating assets</strong> = <code>Ending operating assets − Ending operating liabilities</code></li><li><strong>Ending operating liabilities</strong> = <code>− Ending net operating assets + Ending operating assets</code></li><li><strong>Ending operating assets</strong> = <code>Ending net operating assets + Ending operating liabilities</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Beginning net operating assets</strong> = <code>Beginning operating asset − Beginning operating liabilities</code> — the form to use when Beginning operating asset and Beginning operating liabilities are the values you have.</li><li><strong>Beginning operating liabilities</strong> = <code>− Beginning net operating assets + Beginning operating asset</code> — the form to use when Beginning net operating assets and Beginning operating asset are the values you have.</li><li><strong>Beginning operating asset</strong> = <code>Beginning net operating assets + Beginning operating liabilities</code> — the form to use when Beginning net operating assets and Beginning operating liabilities are the values you have.</li><li><strong>Ending net operating assets</strong> = <code>Ending operating assets − Ending operating liabilities</code> — the form to use when Ending operating assets and Ending operating liabilities are the values you have.</li><li><strong>Ending operating liabilities</strong> = <code>− Ending net operating assets + Ending operating assets</code> — the form to use when Ending net operating assets and Ending operating assets are the values you have.</li><li><strong>Ending operating assets</strong> = <code>Ending net operating assets + Ending operating liabilities</code> — the form to use when Ending net operating assets and Ending operating liabilities are the values you have.</li><li><strong>Balance sheet accrual ratio</strong> = <code>2 × ( − Beginning net operating assets + Ending net operating assets) ÷ (Beginning net operating assets + Ending net operating assets)</code> — the form to use when Beginning net operating assets and Ending net operating assets are the values you have.</li><li><strong>Beginning net operating assets</strong> = <code>Ending net operating assets × (2 − Balance sheet accrual ratio) ÷ (Balance sheet accrual ratio + 2)</code> — the form to use when Ending net operating assets and Balance sheet accrual ratio are the values you have.</li></ul><p>Any one of Beginning net operating assets, Beginning operating liabilities and Beginning operating asset can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Beginning net operating assets, Ending operating assets and Ending operating liabilities are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Beginning operating asset left as a guess.</strong> Anything typed into Beginning operating asset is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Beginning operating liabilities left as a guess.</strong> Anything typed into Beginning operating liabilities is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Beginning operating asset is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Accrual ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Beginning operating asset</strong> takes a plain number with no unit attached. The page reads it when it works out Beginning operating liabilities and Beginning net operating assets. Fill it from a measurement rather than a memory — Beginning operating asset is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Beginning operating liabilities</strong> takes a plain number with no unit attached. The page reads it when it works out Beginning operating asset and Beginning net operating assets. Fill it from a measurement rather than a memory — Beginning operating liabilities is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Beginning net operating assets</strong> is a plain number. It is computed from Beginning operating asset and Beginning operating liabilities, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Ending operating assets</strong> is a plain number. It is computed from Ending net operating assets and Ending operating liabilities, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Ending operating liabilities</strong> is a plain number. It is computed from Ending net operating assets and Ending operating assets, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Ending net operating assets</strong> is a plain number. It is computed from Ending operating assets and Ending operating liabilities, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Balance sheet accrual ratio</strong> is a plain number. It is computed from Beginning net operating assets and Ending net operating assets, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Net income</strong> is a plain number. It is computed from Beginning net operating assets, Cash flow accrual ratio, Ending net operating assets and Investing cash flow, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Operating cash flow</strong> is a plain number. It is computed from Beginning net operating assets, Cash flow accrual ratio, Ending net operating assets and Investing cash flow, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Investing cash flow</strong> is a plain number. It is computed from Beginning net operating assets, Cash flow accrual ratio, Ending net operating assets and Operating cash flow, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Cash flow accrual ratio</strong> is a plain number. It is computed from Investing cash flow, Operating cash flow, Net income and Beginning net operating assets, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Beginning net operating assets is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Beginning operating asset and Beginning operating liabilities are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Beginning operating asset and Beginning operating liabilities measured, Beginning net operating assets and Ending operating assets wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/lumpsum-plus-sip">Lumpsum plus SIP</a>, <a href="/finance/magi">MAGI Calculator</a> and <a href="/finance/man-hours">Man-hours Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Accrual ratio calculator work out?', 'a' => <<<'TXT'
            Beginning net operating assets, Ending operating assets, Ending operating liabilities and Ending net operating assets, from Beginning operating asset and Beginning operating liabilities. The relationship is Beginning net operating assets = Beginning operating asset − Beginning operating liabilities.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Beginning operating asset (USD), Beginning operating liabilities (USD). Fill beginning operating asset and beginning operating liabilities and leave Beginning net operating assets empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Beginning net operating assets, Beginning operating liabilities, Beginning operating asset and Ending net operating assets blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Beginning net operating assets is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Beginning operating asset blank and the page solves for it, reporting Beginning net operating assets instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Beginning net operating assets keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/lumpsum-plus-sip', 'name' => 'Lumpsum plus SIP'],
            ['path' => '/finance/magi', 'name' => 'MAGI Calculator'],
            ['path' => '/finance/man-hours', 'name' => 'Man-hours Calculator'],
        ],
        'authors' => [],
    ],
];

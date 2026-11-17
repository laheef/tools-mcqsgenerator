<?php

/**
 * Dividend payout ratio
 * /finance/dividend-payout-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dividend payout ratio',
    'meta' => ['title' => 'Dividend payout ratio: Formula, Steps & Results', 'description' => 'Dividend payout ratio turns total dividends, net income and declared dividends per share into average diluted earnings per share. A worked example follows.', 'h1' => 'Dividend payout ratio Calculator', 'updated' => '2026-07-23'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Div',
                            'label' => 'Total dividends',
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
                            'name' => 'NI',
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
                            'name' => 'DPR',
                            'label' => 'Dividend payout ratio',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'Your company looks to be paying&nbsp;'],
                                ['when' => 'DPR <= 0.1', 'text' => 'a low dividend.  Better review its free cash flow to see what it is doing with all its earnings.'],
                                ['when' => '0.6 < DPR < 0.9', 'text' => 'a high dividend. Better analyze  its return on equity to see if it is sustainable.'],
                                ['when' => 'DPR >= 0.9', 'text' => <<<'TXT'
                                an unsustainable high dividend.  Better check its debt to equity ratio to see if it is allocating its cash properly. Consider also reviewing the past 10-year dividend payout ratio for a complete understanding.
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => '0.1 < DPR <= 0.6', 'text' => <<<'TXT'
                                Your company looks to be paying a normal dividend.  Congratulations!  We recommend you check out our complete set of financial tools for a complete business understanding.
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Per share calculation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'DivPerShare',
                            'label' => 'Declared dividends per share',
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
                            'name' => 'EPS',
                            'label' => 'Diluted EPS',
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
                            'name' => 'DPR2',
                            'label' => 'Dividend payout ratio per share',
                            'type' => 'number',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'Your company looks to be paying&nbsp;'],
                                ['when' => 'DPR2 <= 0.1', 'text' => 'a low dividend.  Better review its free cash flow to see what it is doing with all its earnings.'],
                                ['when' => '0.6 < DPR2 < 0.9', 'text' => 'a high dividend. Better analyze  its return on equity to see if it is sustainable.'],
                                ['when' => 'DPR2 >= 0.9', 'text' => <<<'TXT'
                                an unsustainable high dividend.  Better check its debt to equity ratio to see if it is allocating its cash properly. Consider also reviewing the past 10-year dividend payout ratio for a complete understanding.
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => '0.1 < DPR2 <= 0.6', 'text' => <<<'TXT'
                                Your company looks to be paying a normal dividend.  Congratulations!  We recommend you check out our complete set of financial tools for a complete business understanding.
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Diluted earnings per share',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'AVG_diluted_Share',
                            'label' => 'Average number of diluted shares',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'NI_Common',
                            'label' => ' Net income to common stockholders',
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
                            'name' => 'Diluted_EPS',
                            'label' => 'Average diluted earnings per share',
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
            'title' => 'DPR= Div/NI',
            'results' => ['DPR' => 'Div/NI', 'NI' => 'Div/DPR', 'Div' => 'DPR*NI'],
        ],
        [
            'title' => 'DPR2=(DivPerShare)/EPS',
            'results' => ['DPR2' => 'DivPerShare/EPS', 'DivPerShare' => 'DPR2*EPS', 'EPS' => 'DivPerShare/DPR2'],
        ],
        [
            'title' => 'Diluted_EPS =  NI_Common / AVG_diluted_Share',
            'results' => ['NI_Common' => 'AVG_diluted_Share*Diluted_EPS', 'Diluted_EPS' => 'NI_Common/AVG_diluted_Share', 'AVG_diluted_Share' => 'NI_Common/Diluted_EPS'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Dividend payout ratio works out Dividend payout ratio and Declared dividends per share from Total dividends and Net income. Nothing is looked up on this page: dividend payout ratio is computed from total dividends and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Dividend payout ratio is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Dividend payout ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Dividend payout ratio: it takes 2 numbers and reports Dividend payout ratio, Declared dividends per share and Diluted EPS.</p><p>The relationship it solves reads Dividend payout ratio = Total dividends ÷ Net income.</p><p>The answers are Dividend payout ratio, Declared dividends per share, Diluted EPS and Dividend payout ratio per share; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Total dividends</strong> — in USD</li><li><strong>Net income</strong> — in USD</li></ul><p>The answers come back as Dividend payout ratio in percent, Declared dividends per share in USD, Diluted EPS in USD, Dividend payout ratio per share in percent, Average number of diluted shares, Net income to common stockholders in USD, Average diluted earnings per share in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Total dividends = 10 USD, Net income = 100 USD, Declared dividends per share = 1000 USD, Diluted EPS = 10 USD, Dividend payout ratio per share = 100 perc, Average number of diluted shares = 1000, Net income to common stockholders = 10 USD and Average diluted earnings per share = 100 USD; the answers are <strong>Dividend payout ratio</strong> = 0.1 perc.</p><ul><li><strong>Dividend payout ratio</strong> = 0.1 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Dividend payout ratio</strong> = <code>Total dividends ÷ Net income</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Dividend payout ratio</strong> = 0.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Dividend payout ratio lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Dividend payout ratio</strong> = <code>Total dividends ÷ Net income</code></li><li><strong>Net income</strong> = <code>Total dividends ÷ Dividend payout ratio</code></li><li><strong>Total dividends</strong> = <code>Dividend payout ratio × Net income</code></li><li><strong>Dividend payout ratio per share</strong> = <code>Declared dividends per share ÷ Diluted EPS</code></li><li><strong>Declared dividends per share</strong> = <code>Dividend payout ratio per share × Diluted EPS</code></li><li><strong>Diluted EPS</strong> = <code>Declared dividends per share ÷ Dividend payout ratio per share</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Dividend payout ratio</strong> = <code>Total dividends ÷ Net income</code> — the form to use when Total dividends and Net income are the values you have.</li><li><strong>Net income</strong> = <code>Total dividends ÷ Dividend payout ratio</code> — the form to use when Total dividends and Dividend payout ratio are the values you have.</li><li><strong>Total dividends</strong> = <code>Dividend payout ratio × Net income</code> — the form to use when Dividend payout ratio and Net income are the values you have.</li><li><strong>Dividend payout ratio per share</strong> = <code>Declared dividends per share ÷ Diluted EPS</code> — the form to use when Declared dividends per share and Diluted EPS are the values you have.</li><li><strong>Declared dividends per share</strong> = <code>Dividend payout ratio per share × Diluted EPS</code> — the form to use when Dividend payout ratio per share and Diluted EPS are the values you have.</li><li><strong>Diluted EPS</strong> = <code>Declared dividends per share ÷ Dividend payout ratio per share</code> — the form to use when Declared dividends per share and Dividend payout ratio per share are the values you have.</li><li><strong>Average diluted earnings per share</strong> = <code>Net income to common stockholders ÷ Average number of diluted shares</code> — the form to use when Net income to common stockholders and Average number of diluted shares are the values you have.</li><li><strong>Net income to common stockholders</strong> = <code>Average number of diluted shares × Average diluted earnings per share</code> — the form to use when Average number of diluted shares and Average diluted earnings per share are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Dividend payout ratio, Net income and Total dividends can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Total dividends, from 10 to 20 — and the answers go from <strong>Dividend payout ratio</strong> 0.1 perc to <strong>Dividend payout ratio</strong> 0.2 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Dividend payout ratio, Declared dividends per share and Diluted EPS are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Total dividends left as a guess.</strong> Anything typed into Total dividends is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Net income left as a guess.</strong> Anything typed into Net income is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Total dividends and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Dividend payout ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Total dividends</strong> takes a plain number with no unit attached. Change it and Dividend payout ratio and Net income changes with it. Fill it from a measurement rather than a memory — Total dividends is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Net income</strong> takes a plain number with no unit attached. Change it and Dividend payout ratio and Total dividends changes with it. Fill it from a measurement rather than a memory — Net income is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Dividend payout ratio</strong> is a percent figure and the page's own defaults put it at 0.1 perc. It is computed from Total dividends and Net income, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Declared dividends per share</strong> is a plain number. It is computed from Dividend payout ratio per share and Diluted EPS, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Diluted EPS</strong> is a plain number. It is computed from Declared dividends per share and Dividend payout ratio per share, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Dividend payout ratio per share</strong> is a percent figure. It is computed from Declared dividends per share and Diluted EPS, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Average number of diluted shares</strong> is a plain number. It is computed from Net income to common stockholders and Average diluted earnings per share, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Net income to common stockholders</strong> is a plain number. It is computed from Average number of diluted shares and Average diluted earnings per share, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Average diluted earnings per share</strong> is a plain number. It is computed from Net income to common stockholders and Average number of diluted shares, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Dividend payout ratio actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Dividend payout ratio is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Total dividends and Net income are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Total dividends and Net income measured, Dividend payout ratio and Declared dividends per share wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/velocity-of-money">Velocity of money</a>, <a href="/finance/wacc">WACC</a> and <a href="/finance/wage">Wage Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dividend payout ratio calculator work out?', 'a' => <<<'TXT'
            Dividend payout ratio, Declared dividends per share, Diluted EPS and Dividend payout ratio per share, from Total dividends and Net income. The relationship is Dividend payout ratio = Total dividends ÷ Net income.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total dividends (USD), Net income (USD). Enter total dividends and net income; Dividend payout ratio is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Dividend payout ratio, Net income, Total dividends and Dividend payout ratio per share can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Dividend payout ratio = 0.1 perc. The figures come from Total dividends as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Dividend payout ratio is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Total dividends blank and the page solves for it, reporting Dividend payout ratio instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Dividend payout ratio keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/velocity-of-money', 'name' => 'Velocity of money'],
            ['path' => '/finance/wacc', 'name' => 'WACC'],
            ['path' => '/finance/wage', 'name' => 'Wage Calculator'],
        ],
        'authors' => [],
    ],
];

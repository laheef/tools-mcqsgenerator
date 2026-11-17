<?php

/**
 * Working capital
 * /finance/working-capital
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Working capital',
    'meta' => ['title' => 'Working capital Calculator: Free, With Steps', 'description' => 'Working capital works out beginning working capital and ending working capital from current assets, current liabilities and revenues. A worked example follows.', 'h1' => 'Working capital Calculator', 'updated' => '2026-09-19'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'currentAssets',
                            'label' => 'Current assets',
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
                            'name' => 'currentLiabilities',
                            'label' => 'Current liabilities',
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
                            'name' => 'workingCapital',
                            'label' => 'Working capital',
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
                            'name' => 'workingCapitalRatio',
                            'label' => 'Working capital ratio',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Working capital turnover ratio input',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'revenues',
                            'label' => 'Revenues',
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
                            'name' => 'beginningCurrentAssets',
                            'label' => 'Beginning current assets',
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
                            'name' => 'beginningCurrentLiabilities',
                            'label' => 'Beginning current liabilities',
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
                            'name' => 'endingCurrentAssets',
                            'label' => 'Ending current assets',
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
                            'name' => 'endingCurrentLiabilities',
                            'label' => 'Ending current liabilities',
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
            'title' => 'Working capital turnover ratio results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beginningWorkingCapital',
                            'label' => 'Beginning working capital',
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
                            'name' => 'endingWorkingCapital',
                            'label' => 'Ending working capital',
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
                            'name' => 'averageWorkingCapital',
                            'label' => 'Average working capital',
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
                            'name' => 'workingCapitalTurnoverRatio',
                            'label' => 'Working capital turnover ratio',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'workingCapital=currentAssets-currentLiabilities',
            'results' => ['workingCapital' => 'currentAssets - currentLiabilities', 'currentLiabilities' => 'currentAssets - workingCapital', 'currentAssets' => 'currentLiabilities + workingCapital'],
        ],
        [
            'title' => 'workingCapitalRatio=currentAssets/currentLiabilities',
            'results' => ['currentLiabilities' => 'currentAssets/workingCapitalRatio', 'workingCapitalRatio' => 'currentAssets/currentLiabilities', 'currentAssets' => 'currentLiabilities*workingCapitalRatio'],
        ],
        [
            'title' => 'workingCapitalTurnoverRatio=revenues/averageWorkingCapital',
            'results' => ['workingCapitalTurnoverRatio' => 'revenues/averageWorkingCapital', 'revenues' => 'averageWorkingCapital*workingCapitalTurnoverRatio', 'averageWorkingCapital' => 'revenues/workingCapitalTurnoverRatio'],
        ],
        [
            'title' => 'averageWorkingCapital=(endingWorkingCapital+beginningWorkingCapital)/2',
            'results' => ['beginningWorkingCapital' => '2*averageWorkingCapital - endingWorkingCapital', 'averageWorkingCapital' => '(1/2)*beginningWorkingCapital + (1/2)*endingWorkingCapital', 'endingWorkingCapital' => '2*averageWorkingCapital - beginningWorkingCapital'],
        ],
        [
            'title' => 'endingWorkingCapital = endingCurrentAssets-endingCurrentLiabilities',
            'results' => ['endingCurrentAssets' => 'endingCurrentLiabilities + endingWorkingCapital', 'endingCurrentLiabilities' => 'endingCurrentAssets - endingWorkingCapital', 'endingWorkingCapital' => 'endingCurrentAssets - endingCurrentLiabilities'],
        ],
        [
            'title' => 'beginningWorkingCapital = beginningCurrentAssets-beginningCurrentLiabilities',
            'results' => ['beginningCurrentAssets' => 'beginningCurrentLiabilities + beginningWorkingCapital', 'beginningWorkingCapital' => 'beginningCurrentAssets - beginningCurrentLiabilities', 'beginningCurrentLiabilities' => 'beginningCurrentAssets - beginningWorkingCapital'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Current assets and Current liabilities into Working capital and the answer comes back as Working capital and Working capital ratio. Nothing is looked up on this page: working capital is computed from current assets and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Working capital is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Working capital calculator works', 'html' => <<<'TXT'
            <p>The Working capital calculator applies one relationship to 2 numbers and reports Working capital, Working capital ratio and Revenues.</p><p>In the form&#039;s own words, Working capital = Current assets − Current liabilities.</p><p>What comes back is Working capital, Working capital ratio, Revenues and Beginning current assets — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Current assets</strong> — in USD</li><li><strong>Current liabilities</strong> — in USD</li></ul><p>The answers come back as Working capital in USD, Working capital ratio, Revenues in USD, Beginning current assets in USD, Beginning current liabilities in USD, Ending current assets in USD, Ending current liabilities in USD, Beginning working capital in USD, Ending working capital in USD, Average working capital in USD, Working capital turnover ratio. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Current assets = 10 USD, Current liabilities = 100 USD, Working capital ratio = 1000, Revenues = 10 USD, Beginning current assets = 100 USD, Beginning current liabilities = 1000 USD, Ending current assets = 10 USD, Ending current liabilities = 100 USD, Beginning working capital = 1000 USD, Ending working capital = 10 USD, Average working capital = 100 USD and Working capital turnover ratio = 1000; the answers are <strong>Working capital</strong> = -90 USD.</p><ul><li><strong>Working capital</strong> = -90 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Working capital</strong> = <code>Current assets − Current liabilities</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Working capital</strong> = -90. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Working capital is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Working capital</strong> = <code>Current assets − Current liabilities</code></li><li><strong>Current liabilities</strong> = <code>Current assets − Working capital</code></li><li><strong>Current assets</strong> = <code>Current liabilities + Working capital</code></li><li><strong>Working capital ratio</strong> = <code>Current assets ÷ Current liabilities</code></li><li><strong>Working capital turnover ratio</strong> = <code>Revenues ÷ Average working capital</code></li><li><strong>Revenues</strong> = <code>Average working capital × Working capital turnover ratio</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Working capital</strong> = <code>Current assets − Current liabilities</code> — the form to use when Current assets and Current liabilities are the values you have.</li><li><strong>Current liabilities</strong> = <code>Current assets − Working capital</code> — the form to use when Current assets and Working capital are the values you have.</li><li><strong>Current assets</strong> = <code>Current liabilities + Working capital</code> — the form to use when Current liabilities and Working capital are the values you have.</li><li><strong>Working capital ratio</strong> = <code>Current assets ÷ Current liabilities</code> — the form to use when Current assets and Current liabilities are the values you have.</li><li><strong>Current liabilities</strong> = <code>Current assets ÷ Working capital ratio</code> — the form to use when Current assets and Working capital ratio are the values you have.</li><li><strong>Current assets</strong> = <code>Current liabilities × Working capital ratio</code> — the form to use when Current liabilities and Working capital ratio are the values you have.</li><li><strong>Working capital turnover ratio</strong> = <code>Revenues ÷ Average working capital</code> — the form to use when Revenues and Average working capital are the values you have.</li><li><strong>Revenues</strong> = <code>Average working capital × Working capital turnover ratio</code> — the form to use when Average working capital and Working capital turnover ratio are the values you have.</li></ul><p>Any one of Working capital, Current liabilities and Current assets can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Current assets, from 10 to 20 — and the answers go from <strong>Working capital</strong> -90 USD to <strong>Working capital</strong> -80 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Working capital, Working capital ratio and Revenues are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Current assets left as a guess.</strong> Anything typed into Current assets is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Current liabilities left as a guess.</strong> Anything typed into Current liabilities is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Current assets and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Working capital form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Current assets</strong> takes a plain number with no unit attached. The page reads it when it works out Working capital, Current liabilities and Working capital ratio. Fill it from a measurement rather than a memory — Current assets is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Current liabilities</strong> takes a plain number with no unit attached. The page reads it when it works out Working capital, Current assets and Working capital ratio. Fill it from a measurement rather than a memory — Current liabilities is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Working capital</strong> is a plain number and the page's own defaults put it at -90. It is worked out from Current assets and Current liabilities. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Working capital ratio</strong> is a plain number. It is worked out from Current assets and Current liabilities. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Revenues</strong> is a plain number. It is worked out from Average working capital and Working capital turnover ratio. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Beginning current assets</strong> is a plain number. It is worked out from Beginning current liabilities and Beginning working capital. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Beginning current liabilities</strong> is a plain number. It is worked out from Beginning current assets and Beginning working capital. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Ending current assets</strong> is a plain number. It is worked out from Ending current liabilities and Ending working capital. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Ending current liabilities</strong> is a plain number. It is worked out from Ending current assets and Ending working capital. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Beginning working capital</strong> is a plain number. It is worked out from Average working capital and Ending working capital. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Ending working capital</strong> is a plain number. It is worked out from Average working capital and Beginning working capital. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Average working capital</strong> is a plain number. It is worked out from Revenues and Working capital turnover ratio. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Working capital turnover ratio</strong> is a plain number. It is worked out from Revenues and Average working capital. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Working capital</th></tr></thead><tbody><tr><td><strong>Current assets</strong> +10%</td><td>+1.11%</td></tr><tr><td><strong>Current liabilities</strong> +10%</td><td>-11.11%</td></tr><tr><td><strong>Working capital ratio</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Revenues</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Beginning current assets</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Beginning current liabilities</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Ending current assets</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Ending current liabilities</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Beginning working capital</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Ending working capital</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Average working capital</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Working capital turnover ratio</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Current liabilities: ten per cent there moves an answer by about 11.1 per cent, which is why that is the number to measure twice. By contrast, Working capital ratio, Revenues and Beginning current assets barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Working capital is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Current assets and Current liabilities are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Current assets and Current liabilities measured, Working capital and Working capital ratio wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/immediate-annuity">Immediate annuity Calculator</a>, <a href="/finance/impermanent-loss">Impermanent loss</a> and <a href="/finance/income-elasticity-demand">Income elasticity of demand Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Working capital calculator work out?', 'a' => <<<'TXT'
            Working capital, Working capital ratio, Revenues and Beginning current assets, from Current assets and Current liabilities. The relationship is Working capital = Current assets − Current liabilities.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current assets (USD), Current liabilities (USD). Enter current assets and current liabilities; Working capital is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Working capital, Current liabilities, Current assets and Working capital ratio blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Working capital = -90 USD. Those are the defaults written into the form — move Current assets and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Working capital is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Current assets blank and the page solves for it, reporting Working capital instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Working capital at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/immediate-annuity', 'name' => 'Immediate annuity Calculator'],
            ['path' => '/finance/impermanent-loss', 'name' => 'Impermanent loss'],
            ['path' => '/finance/income-elasticity-demand', 'name' => 'Income elasticity of demand Calculator'],
        ],
        'authors' => [],
    ],
];

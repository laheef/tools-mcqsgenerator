<?php

/**
 * PEG ratio
 * /finance/peg-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'PEG ratio',
    'meta' => ['title' => 'PEG ratio Calculator: Formula, Steps & Examples', 'description' => 'PEG ratio turns price per share and total earnings into earnings per share (EPS) and P/E ratio. Results come back in USD, with any other unit a click away.', 'h1' => 'PEG ratio Calculator', 'updated' => '2024-06-08'],
    'sections' => [
        [
            'title' => 'P/E ratio',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_per_share',
                            'label' => 'Price per share',
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
                            'name' => 'earnings',
                            'label' => 'Total earnings',
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
                            'name' => 'num_shares',
                            'label' => 'Number of shares outstanding',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'earnings_per_share',
                            'label' => 'Earnings per share (EPS)',
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
                            'name' => 'calc_eps_q',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Calculate earnings per share' => '1'],
                            'dataset' => 'calc_eps',
                            'control' => 'CHECKBOX',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pe_ratio',
                            'label' => 'P/E ratio',
                            'type' => 'number',
                            'suffix' => 'x',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Earnings growth',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'retention_rate',
                            'label' => 'Retention rate',
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
                            'name' => 'return_on_equity',
                            'label' => 'Return on equity (ROE)',
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
                            'name' => 'earnings_growth',
                            'label' => 'Earnings growth',
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
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'peg_ratio',
                            'label' => 'PEG ratio',
                            'type' => 'number',
                            'suffix' => 'x',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'pe_ratio = price_per_share / earnings_per_share',
            'results' => ['price_per_share' => 'earnings_per_share*pe_ratio', 'pe_ratio' => 'price_per_share/earnings_per_share', 'earnings_per_share' => 'price_per_share/pe_ratio'],
        ],
        [
            'title' => 'earnings_growth = retention_rate * return_on_equity',
            'results' => ['earnings_growth' => 'retention_rate*return_on_equity', 'return_on_equity' => 'earnings_growth/retention_rate', 'retention_rate' => 'earnings_growth/return_on_equity'],
        ],
        [
            'title' => 'peg_ratio = pe_ratio / (earnings_growth*100)',
            'results' => ['peg_ratio' => '(1/100)*pe_ratio/earnings_growth', 'earnings_growth' => '(1/100)*pe_ratio/peg_ratio', 'pe_ratio' => '100*earnings_growth*peg_ratio'],
        ],
        [
            'title' => 'earnings_per_share = earnings / num_shares',
            'results' => ['earnings' => 'earnings_per_share*num_shares', 'num_shares' => 'earnings/earnings_per_share', 'earnings_per_share' => 'earnings/num_shares'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        PEG ratio takes Price per share and Earnings per share (EPS) and returns Total earnings and Number of shares outstanding. It is a single relationship that reads total earnings out of price per share, not a table of canned results keyed by them. Units for Total earnings default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the PEG ratio calculator works', 'html' => <<<'TXT'
            <p>PEG ratio answers one question from 2 numbers, and the answer is Total earnings, Number of shares outstanding and P/E ratio.</p><p>In the form&#039;s own words, P/E ratio = Price per share ÷ Earnings per share (EPS).</p><p>What comes back is Total earnings, Number of shares outstanding, P/E ratio and Retention rate — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Price per share</strong> — in USD</li><li><strong>Earnings per share (EPS)</strong> — in USD</li></ul><p>The answers come back as Total earnings in USD, Number of shares outstanding, P/E ratio in x, Retention rate in percent, Return on equity (ROE) in percent, Earnings growth in percent, PEG ratio in x. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Retention rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>P/E ratio</strong> = <code>Price per share ÷ Earnings per share (EPS)</code></li><li><strong>Price per share</strong> = <code>Earnings per share (EPS) × P/E ratio</code></li><li><strong>Earnings per share (EPS)</strong> = <code>Price per share ÷ P/E ratio</code></li><li><strong>Earnings growth</strong> = <code>Retention rate × Return on equity (ROE)</code></li><li><strong>Return on equity (ROE)</strong> = <code>Earnings growth ÷ Retention rate</code></li><li><strong>Retention rate</strong> = <code>Earnings growth ÷ Return on equity (ROE)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>P/E ratio</strong> = <code>Price per share ÷ Earnings per share (EPS)</code> — the form to use when Price per share and Earnings per share (EPS) are the values you have.</li><li><strong>Price per share</strong> = <code>Earnings per share (EPS) × P/E ratio</code> — the form to use when Earnings per share (EPS) and P/E ratio are the values you have.</li><li><strong>Earnings per share (EPS)</strong> = <code>Price per share ÷ P/E ratio</code> — the form to use when Price per share and P/E ratio are the values you have.</li><li><strong>Earnings growth</strong> = <code>Retention rate × Return on equity (ROE)</code> — the form to use when Retention rate and Return on equity (ROE) are the values you have.</li><li><strong>Return on equity (ROE)</strong> = <code>Earnings growth ÷ Retention rate</code> — the form to use when Earnings growth and Retention rate are the values you have.</li><li><strong>Retention rate</strong> = <code>Earnings growth ÷ Return on equity (ROE)</code> — the form to use when Earnings growth and Return on equity (ROE) are the values you have.</li><li><strong>PEG ratio</strong> = <code>(1 ÷ 100) × P/E ratio ÷ Earnings growth</code> — the form to use when P/E ratio and Earnings growth are the values you have.</li><li><strong>Earnings growth</strong> = <code>(1 ÷ 100) × P/E ratio ÷ PEG ratio</code> — the form to use when P/E ratio and PEG ratio are the values you have.</li></ul><p>Any one of P/E ratio, Price per share and Earnings per share (EPS) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total earnings, Number of shares outstanding and P/E ratio are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Price per share left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Price per share is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Earnings per share (EPS) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Earnings per share (EPS) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Price per share and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Price per share</strong> takes a plain number with no unit attached. Change it and P/E ratio and Earnings per share (EPS) changes with it. Have it to hand before you start: Price per share is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Earnings per share (EPS)</strong> takes a plain number with no unit attached. Change it and Price per share, P/E ratio and Total earnings changes with it. Have it to hand before you start: Earnings per share (EPS) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Total earnings</strong> is a plain number. It is computed from Earnings per share (EPS) and Number of shares outstanding, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Number of shares outstanding</strong> is a plain number. It is computed from Total earnings and Earnings per share (EPS), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>P/E ratio</strong> is a plain number. It is computed from Price per share and Earnings per share (EPS), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Retention rate</strong> is a percent figure. It is computed from Earnings growth and Return on equity (ROE), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Return on equity (ROE)</strong> is a percent figure. It is computed from Earnings growth and Retention rate, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Earnings growth</strong> is a percent figure. It is computed from Retention rate and Return on equity (ROE), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>PEG ratio</strong> is a plain number. It is computed from P/E ratio and Earnings growth, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Total earnings follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Price per share and Earnings per share (EPS) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Price per share and Earnings per share (EPS) is what you already know and Total earnings and Number of shares outstanding is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/fibonacci-retracement">Fibonacci retracement Calculator</a>, <a href="/finance/fica-tax">FICA tax Calculator</a> and <a href="/finance/fifo-for-inventories">FIFO for inventories</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the PEG ratio calculator work out?', 'a' => <<<'TXT'
            Total earnings, Number of shares outstanding, P/E ratio and Retention rate, from Price per share and Earnings per share (EPS). The relationship is P/E ratio = Price per share ÷ Earnings per share (EPS).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Price per share (USD), Earnings per share (EPS) (USD). With price per share and earnings per share (EPS) in place, Total earnings can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of P/E ratio, Price per share, Earnings per share (EPS) and Earnings growth blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Total earnings is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Price per share left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Total earnings keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/fibonacci-retracement', 'name' => 'Fibonacci retracement Calculator'],
            ['path' => '/finance/fica-tax', 'name' => 'FICA tax Calculator'],
            ['path' => '/finance/fifo-for-inventories', 'name' => 'FIFO for inventories'],
        ],
        'authors' => [],
    ],
];

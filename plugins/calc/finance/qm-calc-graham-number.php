<?php

/**
 * Graham number
 * /finance/graham-number
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Graham number',
    'meta' => ['title' => 'Graham number Calculator — Formula & Results', 'description' => 'Graham number turns current price and common outstanding shares into book value per share. Results come back in USD, with any other unit a click away.', 'h1' => 'Graham number Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'book_value_per_share',
                            'label' => 'Book value per share',
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
                            'name' => 'earnings_per_share',
                            'label' => 'Earnings per share',
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
                            'name' => 'graham_number',
                            'label' => 'Graham number',
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
            'title' => 'Is it underpriced or overpriced?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'current_price',
                            'label' => 'Current price',
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
                                ['when' => 'current_price < graham_number', 'text' => <<<'TXT'
                                The current price of the stock is below the Graham number. Thus, the stock is undervalued. You might make a {{percentage_diff.formattedValue}}{{percentage_diff.unit}} profit.&nbsp;
                                TXT],
                                ['when' => 'current_price > graham_number', 'text' => <<<'TXT'
                                The current price of the stock is above the Graham number. Thus, the stock is overvalued. You might make a {{percentage_diff.formattedValue}}{{percentage_diff.unit}} profit.&nbsp;
                                TXT],
                                ['when' => 'current_price == graham_number', 'text' => 'The current price of the stock is equal to the Graham number. Thus, the stock is fairly valued.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Calculate per share values',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_shares',
                            'label' => 'Common outstanding shares',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shareholders_equity',
                            'label' => 'Common shareholders\' equity',
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
                            'name' => 'ttm_net_income',
                            'label' => 'TTM net income to common stockholders',
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
                            'name' => 'percentage_diff',
                            'label' => 'Percentage diff',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'graham_number=(22.5 *earnings_per_share * book_value_per_share)^(1/2)',
            'results' => ['book_value_per_share' => '(2/45)*pow(graham_number, 2)/earnings_per_share', 'earnings_per_share' => '(2/45)*pow(graham_number, 2)/book_value_per_share', 'graham_number' => '(3/2)*sqrt(10)*sqrt(book_value_per_share*earnings_per_share)'],
        ],
        [
            'title' => 'book_value_per_share = shareholders_equity / num_shares',
            'results' => ['book_value_per_share' => 'shareholders_equity/num_shares', 'shareholders_equity' => 'book_value_per_share*num_shares', 'num_shares' => 'shareholders_equity/book_value_per_share'],
        ],
        [
            'title' => 'earnings_per_share = ttm_net_income / num_shares',
            'results' => ['ttm_net_income' => 'earnings_per_share*num_shares', 'earnings_per_share' => 'ttm_net_income/num_shares', 'num_shares' => 'ttm_net_income/earnings_per_share'],
        ],
        [
            'title' => 'percentage_diff = ((graham_number - current_price) / current_price)',
            'results' => ['percentage_diff' => '(-current_price + graham_number)/current_price', 'current_price' => 'graham_number/(percentage_diff + 1)', 'graham_number' => 'current_price*(percentage_diff + 1)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Graham number turns Book value per share and Earnings per share into Graham number and Current price. There is no hidden constant here: change graham number and book value per share moves with it. The main result, Graham number, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Graham number calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Graham number: it takes 2 numbers and reports Graham number, Current price and Common outstanding shares.</p><p>Written with the labels from the form, Graham number = (3 ÷ 2) × √(10) × √(Book value per share × Earnings per share).</p><p>The result panel carries Graham number, Current price, Common outstanding shares and Common shareholders&#039; equity, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Book value per share</strong> — in USD</li><li><strong>Earnings per share</strong> — in USD</li></ul><p>The answers come back as Graham number in USD, Current price in USD, Common outstanding shares, Common shareholders&#039; equity in USD, TTM net income to common stockholders in USD, Percentage diff in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Earnings per share = 10 USD, Graham number = 100 USD, Current price = 1000 USD, Common outstanding shares = 10, Common shareholders&amp;#039; equity = 100 USD, TTM net income to common stockholders = 1000 USD and Percentage diff = 10 perc; the answers are <strong>Book value per share</strong> = 44.44 USD.</p><ul><li><strong>Book value per share</strong> = 44.44 USD</li></ul><p>That is <strong>Graham number</strong> = <code>(3 ÷ 2) × √(10) × √(Book value per share × Earnings per share)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Book value per share</strong> = 44.44 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Percentage diff offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Graham number</strong> = <code>(3 ÷ 2) × √(10) × √(Book value per share × Earnings per share)</code></li><li><strong>Book value per share</strong> = <code>(2 ÷ 45) × (Graham number)^(2) ÷ Earnings per share</code></li><li><strong>Earnings per share</strong> = <code>(2 ÷ 45) × (Graham number)^(2) ÷ Book value per share</code></li><li><strong>Common shareholders&#039; equity</strong> = <code>Book value per share × Common outstanding shares</code></li><li><strong>Common outstanding shares</strong> = <code>Common shareholders&#039; equity ÷ Book value per share</code></li><li><strong>TTM net income to common stockholders</strong> = <code>Earnings per share × Common outstanding shares</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Graham number</strong> = <code>(3 ÷ 2) × √(10) × √(Book value per share × Earnings per share)</code> — the form to use when Book value per share and Earnings per share are the values you have.</li><li><strong>Book value per share</strong> = <code>(2 ÷ 45) × (Graham number)^(2) ÷ Earnings per share</code> — the form to use when Graham number and Earnings per share are the values you have.</li><li><strong>Earnings per share</strong> = <code>(2 ÷ 45) × (Graham number)^(2) ÷ Book value per share</code> — the form to use when Graham number and Book value per share are the values you have.</li><li><strong>Book value per share</strong> = <code>Common shareholders&#039; equity ÷ Common outstanding shares</code> — the form to use when Common shareholders&#039; equity and Common outstanding shares are the values you have.</li><li><strong>Common shareholders&#039; equity</strong> = <code>Book value per share × Common outstanding shares</code> — the form to use when Book value per share and Common outstanding shares are the values you have.</li><li><strong>Common outstanding shares</strong> = <code>Common shareholders&#039; equity ÷ Book value per share</code> — the form to use when Common shareholders&#039; equity and Book value per share are the values you have.</li><li><strong>Earnings per share</strong> = <code>TTM net income to common stockholders ÷ Common outstanding shares</code> — the form to use when TTM net income to common stockholders and Common outstanding shares are the values you have.</li><li><strong>TTM net income to common stockholders</strong> = <code>Earnings per share × Common outstanding shares</code> — the form to use when Earnings per share and Common outstanding shares are the values you have.</li></ul><p>Any one of Graham number, Book value per share and Earnings per share can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Earnings per share from 10 to 20, leaving every other box alone. The panel moves from <strong>Book value per share</strong> 44.44 USD to <strong>Book value per share</strong> 22.22 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Graham number, Current price and Common outstanding shares are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Book value per share left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Book value per share is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Earnings per share left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Earnings per share is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Book value per share to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Graham number form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Book value per share</strong> takes a plain number with no unit attached. It feeds Earnings per share, Graham number and Common shareholders' equity. Fill it from a measurement rather than a memory — Book value per share is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Earnings per share</strong> takes a plain number with no unit attached. It feeds Book value per share, Graham number and TTM net income to common stockholders. Fill it from a measurement rather than a memory — Earnings per share is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Graham number</strong> is a plain number. It is computed from Book value per share and Earnings per share, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Current price</strong> is a plain number. It is computed from Graham number and Percentage diff, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Common outstanding shares</strong> is a plain number. It is computed from Common shareholders' equity and Book value per share, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Common shareholders&#039; equity</strong> is a plain number. It is computed from Book value per share and Common outstanding shares, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>TTM net income to common stockholders</strong> is a plain number. It is computed from Earnings per share and Common outstanding shares, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Percentage diff</strong> is a percent figure. It is computed from Current price and Graham number, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Graham number actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Graham number is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Book value per share and Earnings per share are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Book value per share and Earnings per share and the number you are missing is Graham number and Current price.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/long-term-care">Long term care</a>, <a href="/finance/lgd">Loss given default Calculator</a> and <a href="/finance/loss-ratio">Loss ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Graham number calculator work out?', 'a' => <<<'TXT'
            Graham number, Current price, Common outstanding shares and Common shareholders' equity, from Book value per share and Earnings per share. The relationship is Graham number = (3 ÷ 2) × √(10) × √(Book value per share × Earnings per share).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Book value per share (USD), Earnings per share (USD). Fill book value per share and earnings per share and leave Graham number empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Graham number, Book value per share, Earnings per share and Common shareholders' equity blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Book value per share = 44.44 USD. Those are the defaults written into the form — move Book value per share and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Graham number is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Book value per share blank and the page solves for it, reporting Graham number instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Graham number at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/long-term-care', 'name' => 'Long term care'],
            ['path' => '/finance/lgd', 'name' => 'Loss given default Calculator'],
            ['path' => '/finance/loss-ratio', 'name' => 'Loss ratio Calculator'],
        ],
        'authors' => [],
    ],
];

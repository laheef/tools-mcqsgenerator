<?php

/**
 * Price to book ratio
 * /finance/price-to-book-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Price to book ratio',
    'meta' => ['title' => 'Price to book ratio: Formula, Steps & Results', 'description' => 'Price to book ratio turns total stockholder equity, preferred equity and number of shares outstanding into book value per share and price to book value ratio.', 'h1' => 'Price to book ratio Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Total_stockholder_equity',
                            'label' => 'Total stockholder equity',
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
                            'name' => 'Preferred_equity',
                            'label' => 'Preferred equity',
                            'type' => 'number',
                            'help' => 'If the company has issued preferred stock, you should put its value here.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Number_of_shares_outstanding',
                            'label' => 'Number of shares outstanding',
                            'type' => 'number',
                            'help' => 'Do not forget to consider the diluted amount of shares outstanding.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Share_price',
                            'label' => 'Share price',
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
                            'name' => 'Book_value_per_share',
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
                            'name' => 'Price_to_book_value_ratio',
                            'label' => 'Price to book value ratio',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Your company looks to be insolvent. Be careful!'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Your company looks to be undervalued!'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Price to tangible book ratio',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Total_intangible_assets',
                            'label' => 'Total intangible assets',
                            'type' => 'number',
                            'help' => 'You should consider here all non-physical assets such as goodwill and intangible assets recorded by the acquisition of another company.',
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
                            'name' => 'Tangible_book_value_per_share',
                            'label' => 'Tangible book value per share',
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
                            'name' => 'Price_to_tangible_book_value_ratio',
                            'label' => 'Price to tangible book value ratio',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Your company looks to be not a good investment. Better analyze its debt!'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Price_to_book_value_ratio=Share_price/Book_value_per_share',
            'results' => ['Price_to_book_value_ratio' => 'Share_price/Book_value_per_share', 'Share_price' => 'Book_value_per_share*Price_to_book_value_ratio', 'Book_value_per_share' => 'Share_price/Price_to_book_value_ratio'],
        ],
        [
            'title' => 'Book_value_per_share= (Total_stockholder_equity-Preferred_equity)/Number_of_shares_outstanding ',
            'results' => ['Total_stockholder_equity' => 'Book_value_per_share*Number_of_shares_outstanding + Preferred_equity', 'Number_of_shares_outstanding' => '(-Preferred_equity + Total_stockholder_equity)/Book_value_per_share', 'Book_value_per_share' => '(-Preferred_equity + Total_stockholder_equity)/Number_of_shares_outstanding', 'Preferred_equity' => '-Book_value_per_share*Number_of_shares_outstanding + Total_stockholder_equity'],
        ],
        [
            'title' => 'Price_to_tangible_book_value_ratio=Share_price/Tangible_book_value_per_share',
            'results' => ['Price_to_tangible_book_value_ratio' => 'Share_price/Tangible_book_value_per_share', 'Share_price' => 'Price_to_tangible_book_value_ratio*Tangible_book_value_per_share', 'Tangible_book_value_per_share' => 'Share_price/Price_to_tangible_book_value_ratio'],
        ],
        [
            'title' => 'Tangible_book_value_per_share=((Total_stockholder_equity-Preferred_equity)-Total_intangible_assets)/Number_of_shares_outstanding ',
            'results' => [
                'Total_stockholder_equity' => 'Number_of_shares_outstanding*Tangible_book_value_per_share + Preferred_equity + Total_intangible_assets',
                'Number_of_shares_outstanding' => '(-Preferred_equity - Total_intangible_assets + Total_stockholder_equity)/Tangible_book_value_per_share',
                'Total_intangible_assets' => '-Number_of_shares_outstanding*Tangible_book_value_per_share - Preferred_equity + Total_stockholder_equity',
                'Preferred_equity' => '-Number_of_shares_outstanding*Tangible_book_value_per_share - Total_intangible_assets + Total_stockholder_equity',
                'Tangible_book_value_per_share' => '(-Preferred_equity - Total_intangible_assets + Total_stockholder_equity)/Number_of_shares_outstanding',
            ],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Price to book ratio takes Share price and Book value per share and returns Total stockholder equity and Preferred equity. Nothing is looked up on this page: total stockholder equity is computed from share price and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Total stockholder equity is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Price to book ratio calculator works', 'html' => <<<'TXT'
            <p>Price to book ratio answers one question from 2 numbers, and the answer is Total stockholder equity, Preferred equity and Number of shares outstanding.</p><p>Written with the labels from the form, Price to book value ratio = Share price ÷ Book value per share.</p><p>The result panel carries Total stockholder equity, Preferred equity, Number of shares outstanding and Price to book value ratio, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Share price</strong> — in USD</li><li><strong>Book value per share</strong> — in USD</li></ul><p>The result boxes are Total stockholder equity in USD, Preferred equity in USD, Number of shares outstanding, Price to book value ratio, Total intangible assets in USD, Tangible book value per share in USD, Price to tangible book value ratio; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Total stockholder equity = 10 USD, Preferred equity = 100 USD, Number of shares outstanding = 1000, Share price = 10 USD, Book value per share = 100 USD, Total intangible assets = 1000 USD, Tangible book value per share = 10 USD and Price to tangible book value ratio = 100 gives <strong>Price to book value ratio</strong> = 0.1.</p><ul><li><strong>Price to book value ratio</strong> = 0.1</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Price to book value ratio</strong> = <code>Share price ÷ Book value per share</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Price to book value ratio</strong> = 0.1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Total stockholder equity takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Price to book value ratio</strong> = <code>Share price ÷ Book value per share</code></li><li><strong>Share price</strong> = <code>Book value per share × Price to book value ratio</code></li><li><strong>Book value per share</strong> = <code>Share price ÷ Price to book value ratio</code></li><li><strong>Total stockholder equity</strong> = <code>Book value per share × Number of shares outstanding + Preferred equity</code></li><li><strong>Number of shares outstanding</strong> = <code>( − Preferred equity + Total stockholder equity) ÷ Book value per share</code></li><li><strong>Preferred equity</strong> = <code>− Book value per share × Number of shares outstanding + Total stockholder equity</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Price to book value ratio</strong> = <code>Share price ÷ Book value per share</code> — the form to use when Share price and Book value per share are the values you have.</li><li><strong>Share price</strong> = <code>Book value per share × Price to book value ratio</code> — the form to use when Book value per share and Price to book value ratio are the values you have.</li><li><strong>Book value per share</strong> = <code>Share price ÷ Price to book value ratio</code> — the form to use when Share price and Price to book value ratio are the values you have.</li><li><strong>Book value per share</strong> = <code>( − Preferred equity + Total stockholder equity) ÷ Number of shares outstanding</code> — the form to use when Preferred equity, Total stockholder equity and Number of shares outstanding are the values you have.</li><li><strong>Total stockholder equity</strong> = <code>Book value per share × Number of shares outstanding + Preferred equity</code> — the form to use when Book value per share, Number of shares outstanding and Preferred equity are the values you have.</li><li><strong>Number of shares outstanding</strong> = <code>( − Preferred equity + Total stockholder equity) ÷ Book value per share</code> — the form to use when Preferred equity, Total stockholder equity and Book value per share are the values you have.</li><li><strong>Preferred equity</strong> = <code>− Book value per share × Number of shares outstanding + Total stockholder equity</code> — the form to use when Book value per share, Number of shares outstanding and Total stockholder equity are the values you have.</li><li><strong>Price to tangible book value ratio</strong> = <code>Share price ÷ Tangible book value per share</code> — the form to use when Share price and Tangible book value per share are the values you have.</li></ul><p>Any one of Price to book value ratio, Share price and Book value per share can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Total stockholder equity, from 10 to 20 — and the answers go from <strong>Price to book value ratio</strong> 0.1 to <strong>Price to book value ratio</strong> 0.1.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total stockholder equity, Preferred equity and Number of shares outstanding are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Share price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Share price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Book value per share left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Book value per share is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Share price and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Share price</strong> takes a plain number with no unit attached. It feeds Price to book value ratio, Book value per share and Price to tangible book value ratio. Have it to hand before you start: Share price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Book value per share</strong> takes a plain number with no unit attached. It feeds Price to book value ratio, Share price and Total stockholder equity. Have it to hand before you start: Book value per share is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 7 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Total stockholder equity</strong> is a plain number. It is worked out from Book value per share, Number of shares outstanding and Preferred equity. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Preferred equity</strong> is a plain number. It is worked out from Book value per share, Number of shares outstanding and Total stockholder equity. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Number of shares outstanding</strong> is a plain number. It is worked out from Preferred equity, Total stockholder equity and Book value per share. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Price to book value ratio</strong> is a plain number and the page's own defaults put it at 0.1. It is worked out from Share price and Book value per share. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total intangible assets</strong> is a plain number. It is worked out from Number of shares outstanding, Tangible book value per share, Preferred equity and Total stockholder equity. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Tangible book value per share</strong> is a plain number. It is worked out from Share price and Price to tangible book value ratio. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Price to tangible book value ratio</strong> is a plain number. It is worked out from Share price and Tangible book value per share. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Price to book value ratio</th></tr></thead><tbody><tr><td><strong>Total stockholder equity</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Preferred equity</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Number of shares outstanding</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Share price</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Book value per share</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Total intangible assets</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Tangible book value per share</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Price to tangible book value ratio</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Share price sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Total stockholder equity, Preferred equity and Number of shares outstanding barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Total stockholder equity follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Share price and Book value per share and the number you are missing is Total stockholder equity and Preferred equity.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/wage">Wage Calculator</a>, <a href="/finance/wage-to-salary">Wage to salary Calculator</a> and <a href="/finance/website-ad-revenue">Website ad revenue Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Price to book ratio calculator work out?', 'a' => <<<'TXT'
            Total stockholder equity, Preferred equity, Number of shares outstanding and Price to book value ratio, from Share price and Book value per share. The relationship is Price to book value ratio = Share price ÷ Book value per share.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Share price (USD), Book value per share (USD). With share price and book value per share in place, Total stockholder equity can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Price to book value ratio, Share price, Book value per share and Total stockholder equity blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Price to book value ratio = 0.1. The figures come from Share price as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Total stockholder equity is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Share price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Total stockholder equity at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/wage', 'name' => 'Wage Calculator'],
            ['path' => '/finance/wage-to-salary', 'name' => 'Wage to salary Calculator'],
            ['path' => '/finance/website-ad-revenue', 'name' => 'Website ad revenue Calculator'],
        ],
        'authors' => [],
    ],
];

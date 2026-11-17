<?php

/**
 * Retained earnings
 * /finance/retained-earnings
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Retained earnings',
    'meta' => ['title' => 'Retained earnings: Formula, Steps & Results', 'description' => 'Enter earnings, dividend payout ratio and number of shares outstanding and Retained earnings returns dividends distributed. The answer is shown in USD.', 'h1' => 'Retained earnings Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => 'Dividends distributed',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'earnings',
                            'label' => 'Earnings',
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
                            'name' => 'div_payout',
                            'label' => 'Dividend payout ratio',
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
                            'name' => 'div_distributed',
                            'label' => 'Dividends distributed',
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
            'title' => 'Retained earnings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'retained_earnings',
                            'label' => 'Retained earnings',
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
                            'name' => 'number_shares',
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
                            'name' => 'retained_share',
                            'label' => 'Retained earnings per share',
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
                                ['when' => null, 'text' => 'The company has money to reinvest into the business next year! '],
                                ['when' => 'retained_earnings==0 or retained_share==0', 'text' => 'The company has no extra money left! '],
                                ['when' => 'retained_earnings<0 or retained_share<0', 'text' => 'The company is burning cash! '],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'retained_earnings = earnings - div_distributed',
            'results' => ['earnings' => 'div_distributed + retained_earnings', 'div_distributed' => 'earnings - retained_earnings', 'retained_earnings' => '-div_distributed + earnings'],
        ],
        [
            'title' => 'retained_share = retained_earnings / number_shares',
            'results' => ['number_shares' => 'retained_earnings/retained_share', 'retained_share' => 'retained_earnings/number_shares', 'retained_earnings' => 'number_shares*retained_share'],
        ],
        [
            'title' => 'div_distributed = earnings * div_payout',
            'results' => ['div_payout' => 'div_distributed/earnings', 'earnings' => 'div_distributed/div_payout', 'div_distributed' => 'div_payout*earnings'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Retained earnings takes Earnings and Dividends distributed and returns Dividend payout ratio and Retained earnings. It is a single relationship that reads dividend payout ratio out of earnings, not a table of canned results keyed by them. Units for Dividend payout ratio default to percent and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Retained earnings calculator works', 'html' => <<<'TXT'
            <p>Retained earnings answers one question from 2 numbers, and the answer is Dividend payout ratio, Retained earnings and Number of shares outstanding.</p><p>Written with the labels from the form, Retained earnings = − Dividends distributed + Earnings.</p><p>The result panel carries Dividend payout ratio, Retained earnings, Number of shares outstanding and Retained earnings per share, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Earnings</strong> — in USD</li><li><strong>Dividends distributed</strong> — in USD</li></ul><p>What you get back is Dividend payout ratio in percent, Retained earnings in USD, Number of shares outstanding, Retained earnings per share in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Earnings = 10 USD, Dividend payout ratio = 100 perc, Retained earnings = 1000 USD, Number of shares outstanding = 10 and Retained earnings per share = 100 USD gives <strong>Dividends distributed</strong> = -990 USD.</p><ul><li><strong>Dividends distributed</strong> = -990 USD</li></ul><p>That is <strong>Retained earnings</strong> = <code>− Dividends distributed + Earnings</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Dividends distributed</strong> = -990 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Dividend payout ratio offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Retained earnings</strong> = <code>− Dividends distributed + Earnings</code></li><li><strong>Earnings</strong> = <code>Dividends distributed + Retained earnings</code></li><li><strong>Dividends distributed</strong> = <code>Earnings − Retained earnings</code></li><li><strong>Retained earnings per share</strong> = <code>Retained earnings ÷ Number of shares outstanding</code></li><li><strong>Number of shares outstanding</strong> = <code>Retained earnings ÷ Retained earnings per share</code></li><li><strong>Dividend payout ratio</strong> = <code>Dividends distributed ÷ Earnings</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Retained earnings</strong> = <code>− Dividends distributed + Earnings</code> — the form to use when Dividends distributed and Earnings are the values you have.</li><li><strong>Earnings</strong> = <code>Dividends distributed + Retained earnings</code> — the form to use when Dividends distributed and Retained earnings are the values you have.</li><li><strong>Dividends distributed</strong> = <code>Earnings − Retained earnings</code> — the form to use when Earnings and Retained earnings are the values you have.</li><li><strong>Retained earnings per share</strong> = <code>Retained earnings ÷ Number of shares outstanding</code> — the form to use when Retained earnings and Number of shares outstanding are the values you have.</li><li><strong>Number of shares outstanding</strong> = <code>Retained earnings ÷ Retained earnings per share</code> — the form to use when Retained earnings and Retained earnings per share are the values you have.</li><li><strong>Retained earnings</strong> = <code>Number of shares outstanding × Retained earnings per share</code> — the form to use when Number of shares outstanding and Retained earnings per share are the values you have.</li><li><strong>Dividends distributed</strong> = <code>Dividend payout ratio × Earnings</code> — the form to use when Dividend payout ratio and Earnings are the values you have.</li><li><strong>Dividend payout ratio</strong> = <code>Dividends distributed ÷ Earnings</code> — the form to use when Dividends distributed and Earnings are the values you have.</li></ul><p>Any one of Retained earnings, Earnings and Dividends distributed can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Earnings from 10 to 20, leaving every other box alone. The panel moves from <strong>Dividends distributed</strong> -990 USD to <strong>Dividends distributed</strong> -980 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Dividend payout ratio, Retained earnings and Number of shares outstanding are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Earnings left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Earnings is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Dividends distributed left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Dividends distributed is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Earnings is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Retained earnings form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Earnings</strong> takes a plain number with no unit attached. It feeds Dividends distributed, Retained earnings and Dividend payout ratio. Fill it from a measurement rather than a memory — Earnings is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Dividends distributed</strong> takes a plain number with no unit attached. It feeds Earnings, Retained earnings and Dividend payout ratio. Fill it from a measurement rather than a memory — Dividends distributed is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Dividend payout ratio</strong> is a percent figure. It is computed from Dividends distributed and Earnings, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Retained earnings</strong> is a plain number. It is computed from Dividends distributed and Earnings, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Number of shares outstanding</strong> is a plain number. It is computed from Retained earnings and Retained earnings per share, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Retained earnings per share</strong> is a plain number. It is computed from Retained earnings and Number of shares outstanding, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Dividends distributed</th></tr></thead><tbody><tr><td><strong>Earnings</strong> +10%</td><td>+0.1%</td></tr><tr><td><strong>Dividend payout ratio</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Retained earnings</strong> +10%</td><td>-10.1%</td></tr><tr><td><strong>Number of shares outstanding</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Retained earnings per share</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Retained earnings sits at the top — a ten per cent error in that box shows up as roughly 10.1 per cent in the answer. By contrast, Earnings, Dividend payout ratio and Number of shares outstanding barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Earnings = 5 USD, Dividend payout ratio = 50 perc, Retained earnings = 500 USD, Number of shares outstanding = 5 and Retained earnings per share = 50 USD and the page reports <strong>Dividends distributed</strong> = -495 USD.</li><li>Feed in Earnings = 30 USD, Dividend payout ratio = 100 perc, Retained earnings = 1000 USD, Number of shares outstanding = 10 and Retained earnings per share = 100 USD and the page reports <strong>Dividends distributed</strong> = -970 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Retained earnings actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Dividend payout ratio follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Earnings and Dividends distributed and the number you are missing is Dividend payout ratio and Retained earnings.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/growing-annuity">Growing annuity Calculator</a>, <a href="/finance/gst">GST</a> and <a href="/finance/gst-qst">GST/QST Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Retained earnings calculator work out?', 'a' => <<<'TXT'
            Dividend payout ratio, Retained earnings, Number of shares outstanding and Retained earnings per share, from Dividends distributed and Earnings. The relationship is Retained earnings = − Dividends distributed + Earnings.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Earnings (USD), Dividends distributed (USD). Fill earnings and dividends distributed and leave Dividend payout ratio empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Retained earnings, Earnings, Dividends distributed and Retained earnings per share blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Dividends distributed = -990 USD. The figures come from Earnings as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Dividend payout ratio is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Earnings blank and the page solves for it, reporting Dividend payout ratio instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Dividend payout ratio at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/growing-annuity', 'name' => 'Growing annuity Calculator'],
            ['path' => '/finance/gst', 'name' => 'GST'],
            ['path' => '/finance/gst-qst', 'name' => 'GST/QST Calculator'],
        ],
        'authors' => [],
    ],
];

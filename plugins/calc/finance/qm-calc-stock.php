<?php

/**
 * Stock
 * /finance/stock
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Stock',
    'meta' => ['title' => 'Stock Calculator — Formula, Units & Example', 'description' => 'Stock works out buying commission and net buying price from number of shares and buying price. Results come back in perc, with any other unit a click away.', 'h1' => 'Stock Calculator', 'updated' => '2026-09-18'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'No',
                            'label' => 'Number of shares',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Purchase of shares',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Buy_Price',
                            'label' => 'Buying price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0],
                    'fields' => [
                        [
                            'name' => 'Buy_Com_Percent',
                            'label' => 'Buying commission',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'Buy_Com',
                            'label' => '',
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
                            'name' => 'Net_buying_price',
                            'label' => 'Net buying price',
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
            'title' => 'Selling shares',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Sell_Price',
                            'label' => 'Selling price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0],
                    'fields' => [
                        [
                            'name' => 'Sell_Com_Percent',
                            'label' => 'Selling commission',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'Sell_Com',
                            'label' => '',
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
                            'name' => 'Net_selling_price',
                            'label' => 'Net selling price',
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
            'title' => 'Investment performance',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Profit',
                            'label' => 'Profit',
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
                            'name' => 'ROI',
                            'label' => 'Return on investment (ROI)',
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
                            'name' => 'Break_Even',
                            'label' => 'Break-even selling price',
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
            'title' => 'Profit= ( (Sell_Price * No) - Sell_Com ) - ( (Buy_Price * No) + Buy_Com )',
            'results' => [
                'Profit' => '-Buy_Com - Buy_Price*No + No*Sell_Price - Sell_Com',
                'Sell_Com' => '-Buy_Com - Buy_Price*No + No*Sell_Price - Profit',
                'Buy_Com' => '-Buy_Price*No + No*Sell_Price - Profit - Sell_Com',
                'No' => '-(Buy_Com + Profit + Sell_Com)/(Buy_Price - Sell_Price)',
                'Sell_Price' => '(Buy_Com + Buy_Price*No + Profit + Sell_Com)/No',
                'Buy_Price' => '(-Buy_Com + No*Sell_Price - Profit - Sell_Com)/No',
            ],
        ],
        [
            'title' => 'ROI = Profit / ((Buy_Price * No)+ Buy_Com )',
            'results' => [
                'Profit' => 'ROI*(Buy_Com + Buy_Price*No)',
                'ROI' => 'Profit/(Buy_Com + Buy_Price*No)',
                'Buy_Com' => '-Buy_Price*No + Profit/ROI',
                'No' => '(-Buy_Com*ROI + Profit)/(Buy_Price*ROI)',
                'Buy_Price' => '(-Buy_Com*ROI + Profit)/(No*ROI)',
            ],
        ],
        [
            'title' => 'Sell_Com_Percent = Sell_Com / (Sell_Price * No)',
            'results' => ['Sell_Com' => 'No*Sell_Com_Percent*Sell_Price', 'Sell_Com_Percent' => 'Sell_Com/(No*Sell_Price)', 'No' => 'Sell_Com/(Sell_Com_Percent*Sell_Price)', 'Sell_Price' => 'Sell_Com/(No*Sell_Com_Percent)'],
        ],
        [
            'title' => 'Buy_Com_Percent = Buy_Com / (Buy_Price * No)',
            'results' => ['Buy_Com_Percent' => 'Buy_Com/(Buy_Price*No)', 'Buy_Com' => 'Buy_Com_Percent*Buy_Price*No', 'No' => 'Buy_Com/(Buy_Com_Percent*Buy_Price)', 'Buy_Price' => 'Buy_Com/(Buy_Com_Percent*No)'],
        ],
        [
            'title' => ' Break_Even  =(( (Buy_Price * No) + Buy_Com ) )/No /(1-Sell_Com_Percent )',
            'results' => [
                'Sell_Com_Percent' => '1 - Buy_Com/(Break_Even*No) - Buy_Price/Break_Even',
                'Buy_Com' => 'No*(-Break_Even*Sell_Com_Percent + Break_Even - Buy_Price)',
                'No' => '-Buy_Com/(Break_Even*Sell_Com_Percent - Break_Even + Buy_Price)',
                'Break_Even' => '-(Buy_Com + Buy_Price*No)/(No*(Sell_Com_Percent - 1))',
                'Buy_Price' => '-Break_Even*Sell_Com_Percent + Break_Even - Buy_Com/No',
            ],
        ],
        [
            'title' => 'Net_buying_price = Buy_Price * No + Buy_Com ',
            'results' => ['Buy_Com' => '-Buy_Price*No + Net_buying_price', 'No' => '(-Buy_Com + Net_buying_price)/Buy_Price', 'Buy_Price' => '(-Buy_Com + Net_buying_price)/No', 'Net_buying_price' => 'Buy_Com + Buy_Price*No'],
        ],
        [
            'title' => 'Net_selling_price = Sell_Price * No - Sell_Com ',
            'results' => ['Sell_Com' => '-Net_selling_price + No*Sell_Price', 'Sell_Price' => '(Net_selling_price + Sell_Com)/No', 'No' => '(Net_selling_price + Sell_Com)/Sell_Price', 'Net_selling_price' => 'No*Sell_Price - Sell_Com'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Stock takes Number of shares, Buying price and Selling price and returns Buying commission and Net buying price. It is a single relationship that reads buying commission out of number of shares, not a table of canned results keyed by them. Units for Buying commission default to percent and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Stock calculator works', 'html' => <<<'TXT'
            <p>The Stock calculator applies one relationship to 3 numbers and reports Buying commission, Net buying price and Selling commission.</p><p>In the form&#039;s own words, Profit = − Buy Com − Buying price × Number of shares + Number of shares × Selling price − Sell Com.</p><p>The result panel carries Buying commission, Net buying price, Selling commission and Net selling price, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Number of shares</strong> — a plain number, no unit</li><li><strong>Buying price</strong> — in USD</li><li><strong>Selling price</strong> — in USD</li></ul><p>The result boxes are Buying commission in percent, Net buying price in USD, Selling commission in percent, Net selling price in USD, Profit in USD, Return on investment (ROI) in percent, Break-even selling price in USD, Buy Com in USD, Sell Com in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Number of shares = 100, Buying price = 250 USD, Buy Com = 50 USD, Selling price = 100 USD and Sell Com = 250 USD — through the same formula and the panel reports <strong>Profit</strong> = -15300 USD, <strong>Return on investment (ROI)</strong> = -0.6108 perc, <strong>Selling commission</strong> = 0.025 perc, <strong>Buying commission</strong> = 0.002 perc, <strong>Break-even selling price</strong> = 257 USD, <strong>Net buying price</strong> = 25050 USD and <strong>Net selling price</strong> = 9750 USD.</p><ul><li><strong>Profit</strong> = -15300 USD</li><li><strong>Return on investment (ROI)</strong> = -0.6108 perc</li><li><strong>Selling commission</strong> = 0.025 perc</li><li><strong>Buying commission</strong> = 0.002 perc</li><li><strong>Break-even selling price</strong> = 257 USD</li><li><strong>Net buying price</strong> = 25050 USD</li><li><strong>Net selling price</strong> = 9750 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Profit</strong> = <code>− Buy Com − Buying price × Number of shares + Number of shares × Selling price − Sell Com</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Profit</strong> = -15300, <strong>Return on investment (ROI)</strong> = -0.6108, <strong>Selling commission</strong> = 0.025, <strong>Buying commission</strong> = 0.002, <strong>Break-even selling price</strong> = 257, <strong>Net buying price</strong> = 25050 and <strong>Net selling price</strong> = 9750 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Buying commission offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Profit</strong> = <code>− Buy Com − Buying price × Number of shares + Number of shares × Selling price − Sell Com</code></li><li><strong>Sell Com</strong> = <code>− Buy Com − Buying price × Number of shares + Number of shares × Selling price − Profit</code></li><li><strong>Buy Com</strong> = <code>− Buying price × Number of shares + Number of shares × Selling price − Profit − Sell Com</code></li><li><strong>Number of shares</strong> = <code>− (Buy Com + Profit + Sell Com) ÷ (Buying price − Selling price)</code></li><li><strong>Selling price</strong> = <code>(Buy Com + Buying price × Number of shares + Profit + Sell Com) ÷ Number of shares</code></li><li><strong>Buying price</strong> = <code>( − Buy Com + Number of shares × Selling price − Profit − Sell Com) ÷ Number of shares</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Profit</strong> = <code>− Buy Com − Buying price × Number of shares + Number of shares × Selling price − Sell Com</code> — the form to use when Buy Com, Buying price, Number of shares and Selling price are the values you have.</li><li><strong>Sell Com</strong> = <code>− Buy Com − Buying price × Number of shares + Number of shares × Selling price − Profit</code> — the form to use when Buy Com, Buying price, Number of shares and Selling price are the values you have.</li><li><strong>Buy Com</strong> = <code>− Buying price × Number of shares + Number of shares × Selling price − Profit − Sell Com</code> — the form to use when Buying price, Number of shares, Selling price and Profit are the values you have.</li><li><strong>Number of shares</strong> = <code>− (Buy Com + Profit + Sell Com) ÷ (Buying price − Selling price)</code> — the form to use when Buy Com, Profit, Sell Com and Buying price are the values you have.</li><li><strong>Selling price</strong> = <code>(Buy Com + Buying price × Number of shares + Profit + Sell Com) ÷ Number of shares</code> — the form to use when Buy Com, Buying price, Number of shares and Profit are the values you have.</li><li><strong>Buying price</strong> = <code>( − Buy Com + Number of shares × Selling price − Profit − Sell Com) ÷ Number of shares</code> — the form to use when Buy Com, Number of shares, Selling price and Profit are the values you have.</li><li><strong>Return on investment (ROI)</strong> = <code>Profit ÷ (Buy Com + Buying price × Number of shares)</code> — the form to use when Profit, Buy Com, Buying price and Number of shares are the values you have.</li><li><strong>Profit</strong> = <code>Return on investment (ROI) × (Buy Com + Buying price × Number of shares)</code> — the form to use when Return on investment (ROI), Buy Com, Buying price and Number of shares are the values you have.</li></ul><p>Any one of Profit, Sell Com and Buy Com can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Number of shares from 100 to 200, leaving every other box alone. The panel moves from <strong>Profit</strong> -15300 USD, <strong>Return on investment (ROI)</strong> -0.6108 perc, <strong>Selling commission</strong> 0.025 perc, <strong>Buying commission</strong> 0.002 perc, <strong>Break-even selling price</strong> 257 USD, <strong>Net buying price</strong> 25050 USD and <strong>Net selling price</strong> 9750 USD to <strong>Profit</strong> -30300 USD, <strong>Return on investment (ROI)</strong> -0.6054 perc, <strong>Selling commission</strong> 0.0125 perc, <strong>Buying commission</strong> 0.001 perc, <strong>Break-even selling price</strong> 253 USD, <strong>Net buying price</strong> 50050 USD and <strong>Net selling price</strong> 19750 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Buying commission, Net buying price and Selling commission are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Number of shares left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of shares is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Buying price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Buying price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Selling price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Selling price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Number of shares and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Stock form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Number of shares</strong> takes a plain number with no unit attached. The page reads it when it works out Profit, Sell Com and Buy Com. Fill it from a measurement rather than a memory — Number of shares is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Buying price</strong> takes a plain number with no unit attached. The page reads it when it works out Profit, Sell Com and Buy Com. Fill it from a measurement rather than a memory — Buying price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Selling price</strong> takes a plain number with no unit attached. The page reads it when it works out Profit, Sell Com and Buy Com. Fill it from a measurement rather than a memory — Selling price is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Buying commission follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Number of shares, Buying price and Selling price is what you already know and Buying commission and Net buying price is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/futures-contract">Futures contract Calculator</a>, <a href="/finance/gdp-deflator">GDP deflator</a> and <a href="/finance/gdp-gap">GDP gap</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Stock is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Number of shares, Buying price and Selling price beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Stock calculator work out?', 'a' => <<<'TXT'
            Buying commission, Net buying price, Selling commission and Net selling price, from Buy Com, Buying price, Number of shares and Selling price. The relationship is Profit = − Buy Com − Buying price × Number of shares + Number of shares × Selling price − Sell Com.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of shares, Buying price (USD), Selling price (USD). With number of shares, buying price and selling price in place, Buying commission can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Profit, Sell Com, Buy Com and Number of shares blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Profit = -15300 USD, Return on investment (ROI) = -0.6108 perc, Selling commission = 0.025 perc, Buying commission = 0.002 perc, Break-even selling price = 257 USD, Net buying price = 25050 USD and Net selling price = 9750 USD. The figures come from Number of shares as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Buying commission is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Number of shares blank and the page solves for it, reporting Buying commission instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Buying commission keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/futures-contract', 'name' => 'Futures contract Calculator'],
            ['path' => '/finance/gdp-deflator', 'name' => 'GDP deflator'],
            ['path' => '/finance/gdp-gap', 'name' => 'GDP gap'],
        ],
        'authors' => [],
    ],
];

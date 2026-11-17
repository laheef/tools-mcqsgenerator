<?php

/**
 * Velocity of money
 * /finance/velocity-of-money
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Velocity of money',
    'meta' => ['title' => 'Velocity of money: Formula, Steps & Results', 'description' => 'Velocity of money works out sum of all transactions (T) from price index (P). The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Velocity of money Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_index',
                            'label' => 'Price index (P)',
                            'type' => 'number',
                            'help' => 'Average price level.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'volume_transactions',
                            'label' => 'Volume of transactions (N)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sum_transaction',
                            'label' => 'Sum of all transactions (T)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'money',
                            'label' => 'Amount of money in circulation (M)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'velocity',
                            'label' => 'Velocity of money (Vt)',
                            'type' => 'number',
                            'help' => 'Average number of times money changes hands.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'The money changed hands {{velocity_round.value}} time(s) per year.'],
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
                            'name' => 'velocity_round',
                            'label' => 'Velocity round',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'sum_transaction = price_index * volume_transactions',
            'results' => ['price_index' => 'sum_transaction/volume_transactions', 'volume_transactions' => 'sum_transaction/price_index', 'sum_transaction' => 'price_index*volume_transactions'],
        ],
        [
            'title' => 'velocity = sum_transaction/money',
            'results' => ['velocity' => 'sum_transaction/money', 'money' => 'sum_transaction/velocity', 'sum_transaction' => 'money*velocity'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Velocity of money takes Price index (P) and Volume of transactions (N) and returns Sum of all transactions (T) and Amount of money in circulation (M). There is no hidden constant here: change sum of all transactions (T) and price index (P) moves with it. The main result, Sum of all transactions (T), is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Velocity of money calculator works', 'html' => <<<'TXT'
            <p>The Velocity of money calculator applies one relationship to 2 numbers and reports Sum of all transactions (T), Amount of money in circulation (M) and Velocity of money (Vt).</p><p>The relationship it solves reads Sum of all transactions (T) = Price index (P) × Volume of transactions (N).</p><p>The result panel carries Sum of all transactions (T), Amount of money in circulation (M) and Velocity of money (Vt), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Price index (P)</strong> — in USD. Average price level.</li><li><strong>Volume of transactions (N)</strong> — a plain number, no unit</li></ul><p>The result boxes are Sum of all transactions (T) in USD, Amount of money in circulation (M) in USD, Velocity of money (Vt) in years; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Velocity of money (Vt) offers 5 units and opens on years, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Sum of all transactions (T)</strong> = <code>Price index (P) × Volume of transactions (N)</code></li><li><strong>Price index (P)</strong> = <code>Sum of all transactions (T) ÷ Volume of transactions (N)</code></li><li><strong>Volume of transactions (N)</strong> = <code>Sum of all transactions (T) ÷ Price index (P)</code></li><li><strong>Velocity of money (Vt)</strong> = <code>Sum of all transactions (T) ÷ Amount of money in circulation (M)</code></li><li><strong>Amount of money in circulation (M)</strong> = <code>Sum of all transactions (T) ÷ Velocity of money (Vt)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Sum of all transactions (T)</strong> = <code>Price index (P) × Volume of transactions (N)</code> — the form to use when Price index (P) and Volume of transactions (N) are the values you have.</li><li><strong>Price index (P)</strong> = <code>Sum of all transactions (T) ÷ Volume of transactions (N)</code> — the form to use when Sum of all transactions (T) and Volume of transactions (N) are the values you have.</li><li><strong>Volume of transactions (N)</strong> = <code>Sum of all transactions (T) ÷ Price index (P)</code> — the form to use when Sum of all transactions (T) and Price index (P) are the values you have.</li><li><strong>Velocity of money (Vt)</strong> = <code>Sum of all transactions (T) ÷ Amount of money in circulation (M)</code> — the form to use when Sum of all transactions (T) and Amount of money in circulation (M) are the values you have.</li><li><strong>Amount of money in circulation (M)</strong> = <code>Sum of all transactions (T) ÷ Velocity of money (Vt)</code> — the form to use when Sum of all transactions (T) and Velocity of money (Vt) are the values you have.</li><li><strong>Sum of all transactions (T)</strong> = <code>Amount of money in circulation (M) × Velocity of money (Vt)</code> — the form to use when Amount of money in circulation (M) and Velocity of money (Vt) are the values you have.</li></ul><p>Any one of Sum of all transactions (T), Price index (P) and Volume of transactions (N) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Sum of all transactions (T), Amount of money in circulation (M) and Velocity of money (Vt) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Price index (P) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Price index (P) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Volume of transactions (N) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Volume of transactions (N) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Price index (P) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Velocity of money form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Price index (P)</strong> takes a plain number with no unit attached. Average price level. The page reads it when it works out Volume of transactions (N) and Sum of all transactions (T). Fill it from a measurement rather than a memory — Price index (P) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Volume of transactions (N)</strong> takes a plain number with no unit attached. The page reads it when it works out Price index (P) and Sum of all transactions (T). Fill it from a measurement rather than a memory — Volume of transactions (N) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Sum of all transactions (T)</strong> is a plain number. It is computed from Price index (P) and Volume of transactions (N), so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Amount of money in circulation (M)</strong> is a plain number. It is computed from Sum of all transactions (T) and Velocity of money (Vt), so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Velocity of money (Vt)</strong> is a years figure. It is computed from Sum of all transactions (T) and Amount of money in circulation (M), so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Velocity of money actually offers.</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Sum of all transactions (T) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover years. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Price index (P) and Volume of transactions (N) and the number you are missing is Sum of all transactions (T) and Amount of money in circulation (M).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/ros">Return on sales (ROS)</a>, <a href="/finance/revenue">Revenue Calculator</a> and <a href="/finance/revenue-growth">Revenue growth Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Velocity of money is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Price index (P) and Volume of transactions (N) beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Velocity of money calculator work out?', 'a' => <<<'TXT'
            Sum of all transactions (T), Amount of money in circulation (M) and Velocity of money (Vt), from Price index (P) and Volume of transactions (N). The relationship is Sum of all transactions (T) = Price index (P) × Volume of transactions (N).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Price index (P) (USD), Volume of transactions (N). Fill price index (P) and volume of transactions (N) and leave Sum of all transactions (T) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Sum of all transactions (T), Price index (P), Volume of transactions (N) and Velocity of money (Vt) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Sum of all transactions (T) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Price index (P) blank and the page solves for it, reporting Sum of all transactions (T) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Sum of all transactions (T) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/ros', 'name' => 'Return on sales (ROS)'],
            ['path' => '/finance/revenue', 'name' => 'Revenue Calculator'],
            ['path' => '/finance/revenue-growth', 'name' => 'Revenue growth Calculator'],
        ],
        'authors' => [],
    ],
];

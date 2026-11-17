<?php

/**
 * Commission
 * /finance/commission
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Commission',
    'meta' => ['title' => 'Commission Calculator: Formula, Steps & Examples', 'description' => 'Commission works out price + commission from sale price and commission. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Commission Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price',
                            'label' => 'Sale price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'commission',
                            'label' => 'Commission',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'commission_amount',
                            'label' => 'Commission amount',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Sale price ± commission',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_plus_commission',
                            'label' => 'Price + commission',
                            'type' => 'number',
                            'help' => 'Relevant when the buyer pays the salesperson\'s commission.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_minus_commission',
                            'label' => 'Price − commission',
                            'type' => 'number',
                            'help' => 'Relevant when the seller pays the salesperson\'s commission.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'commission_amount = price * commission',
            'results' => ['price' => 'commission_amount/commission', 'commission' => 'commission_amount/price', 'commission_amount' => 'commission*price'],
        ],
        [
            'title' => 'price + commission_amount = price_plus_commission',
            'results' => ['price' => '-commission_amount + price_plus_commission', 'price_plus_commission' => 'commission_amount + price', 'commission_amount' => '-price + price_plus_commission'],
        ],
        [
            'title' => 'price - commission_amount = price_minus_commission',
            'results' => ['price' => 'commission_amount + price_minus_commission', 'commission_amount' => 'price - price_minus_commission', 'price_minus_commission' => '-commission_amount + price'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Commission turns Sale price and Commission into Commission amount and Price + commission. There is no hidden constant here: change commission amount and sale price moves with it. The main result, Commission amount, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Commission calculator works', 'html' => <<<'TXT'
            <p>Commission answers one question from 2 numbers, and the answer is Commission amount, Price + commission and Price − commission.</p><p>Written with the labels from the form, Commission amount = Commission × Sale price.</p><p>The answers are Commission amount, Price + commission and Price − commission; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Sale price</strong> — in USD</li><li><strong>Commission</strong> — in percent</li></ul><p>The answers come back as Commission amount in USD, Price + commission in USD, Price − commission in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Sale price = 10 USD and Commission = 100 perc; the answers are <strong>Commission amount</strong> = 1000 USD, <strong>Price + commission</strong> = 1010 USD and <strong>Price − commission</strong> = -990 USD.</p><ul><li><strong>Commission amount</strong> = 1000 USD</li><li><strong>Price + commission</strong> = 1010 USD</li><li><strong>Price − commission</strong> = -990 USD</li></ul><p>The line behind those figures is <strong>Commission amount</strong> = <code>Commission × Sale price</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Commission amount</strong> = 1000, <strong>Price + commission</strong> = 1010 and <strong>Price − commission</strong> = -990 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Commission offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Commission amount</strong> = <code>Commission × Sale price</code></li><li><strong>Sale price</strong> = <code>Commission amount ÷ Commission</code></li><li><strong>Commission</strong> = <code>Commission amount ÷ Sale price</code></li><li><strong>Price + commission</strong> = <code>Commission amount + Sale price</code></li><li><strong>Price − commission</strong> = <code>− Commission amount + Sale price</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Commission amount</strong> = <code>Commission × Sale price</code> — the form to use when Commission and Sale price are the values you have.</li><li><strong>Sale price</strong> = <code>Commission amount ÷ Commission</code> — the form to use when Commission amount and Commission are the values you have.</li><li><strong>Commission</strong> = <code>Commission amount ÷ Sale price</code> — the form to use when Commission amount and Sale price are the values you have.</li><li><strong>Sale price</strong> = <code>− Commission amount + Price + commission</code> — the form to use when Commission amount and Price + commission are the values you have.</li><li><strong>Price + commission</strong> = <code>Commission amount + Sale price</code> — the form to use when Commission amount and Sale price are the values you have.</li><li><strong>Commission amount</strong> = <code>− Sale price + Price + commission</code> — the form to use when Sale price and Price + commission are the values you have.</li><li><strong>Sale price</strong> = <code>Commission amount + Price − commission</code> — the form to use when Commission amount and Price − commission are the values you have.</li><li><strong>Commission amount</strong> = <code>Sale price − Price − commission</code> — the form to use when Sale price and Price − commission are the values you have.</li></ul><p>Any one of Commission amount, Sale price and Commission can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Sale price from 10 to 20, leaving every other box alone. The panel moves from <strong>Commission amount</strong> 1000 USD, <strong>Price + commission</strong> 1010 USD and <strong>Price − commission</strong> -990 USD to <strong>Commission amount</strong> 2000 USD, <strong>Price + commission</strong> 2020 USD and <strong>Price − commission</strong> -1980 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Commission is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Commission amount, Price + commission and Price − commission are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Sale price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Sale price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Commission left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Commission is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Sale price to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Sale price</strong> takes a plain number with no unit attached. It feeds Commission, Commission amount and Price + commission. Have it to hand before you start: Sale price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Commission</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Sale price and Commission amount. Have it to hand before you start: Commission is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Commission amount</strong> is a plain number and the page's own defaults put it at 1000. It is worked out from Commission and Sale price. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Price + commission</strong> is a plain number and the page's own defaults put it at 1010. It is worked out from Commission amount and Sale price. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Price − commission</strong> is a plain number and the page's own defaults put it at -990. It is worked out from Commission amount and Sale price. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Commission amount</th><th>Price + commission</th><th>Price − commission</th></tr></thead><tbody><tr><td><strong>Sale price</strong> +10%</td><td>+10%</td><td>+10%</td><td>-10%</td></tr><tr><td><strong>Commission</strong> +10%</td><td>+10%</td><td>+9.9%</td><td>-10.1%</td></tr></tbody></table><p>Ranked by leverage, Commission sits at the top — a ten per cent error in that box shows up as roughly 10.1 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Sale price = 5 USD and Commission = 50 perc, the answer is <strong>Commission amount</strong> = 250 USD, <strong>Price + commission</strong> = 255 USD and <strong>Price − commission</strong> = -245 USD.</li><li>With Sale price = 30 USD and Commission = 100 perc, the answer is <strong>Commission amount</strong> = 3000 USD, <strong>Price + commission</strong> = 3030 USD and <strong>Price − commission</strong> = -2970 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Commission amount follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Sale price and Commission is what you already know and Commission amount and Price + commission is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/future-salary">Future salary Calculator</a>, <a href="/finance/annuity-future-value">Future value of annuity</a> and <a href="/finance/future-value">Future value</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Commission calculator work out?', 'a' => <<<'TXT'
            Commission amount, Price + commission and Price − commission, from Commission and Sale price. The relationship is Commission amount = Commission × Sale price.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Sale price (USD), Commission (percent). With sale price and commission in place, Commission amount can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Commission amount, Sale price, Commission and Price + commission blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Commission amount = 1000 USD, Price + commission = 1010 USD and Price − commission = -990 USD. The figures come from Sale price as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Commission amount is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Sale price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Commission amount at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/future-salary', 'name' => 'Future salary Calculator'],
            ['path' => '/finance/annuity-future-value', 'name' => 'Future value of annuity'],
            ['path' => '/finance/future-value', 'name' => 'Future value'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * Percentage discount
 * /finance/percentage-discount
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Percentage discount',
    'meta' => ['title' => 'Percentage discount: Formula, Steps & Results', 'description' => 'Percentage discount works out price after discount and you save from price before discount and discount. The formula is printed in the form\'s own words.', 'h1' => 'Percentage discount Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'before == 237.90 and discount == 0.20', 'text' => <<<'TXT'
                                Onim Example 1: You have just received a promotion in your job and decide to celebrate at your favourite restaurant. But a proper celebration needs a new dress. You choose a dress that costs $237.90and the store is offering a 20% discount. What is the price of this dress after the discount?&nbsp;
                                TXT],
                                ['when' => 'before == 25.90 and discount == 0.15', 'text' => <<<'TXT'
                                Onim Example 2: You want to buy a new ball to play football. Your favourite one costs $25.90, and the store is offering a 15% discount. What is the price of this ball after the discount, and how much do you save?
                                TXT],
                            ],
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
                            'name' => 'before',
                            'label' => 'Price before discount',
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
                            'name' => 'discount',
                            'label' => 'Discount',
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
                            'name' => 'after',
                            'label' => 'Price after discount',
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
                            'name' => 'you_save',
                            'label' => 'You save',
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
                        ['type' => 'note', 'text' => 'Check out the advanced version of this discount calculator.'],
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'before == 237.90 and discount == 0.20', 'text' => <<<'TXT'
                                How the result is calculated: Multiply your original price by the discount: 237.90&nbsp;×&nbsp;0.20 = 47.58 Subtract the original price from the last result: 237.90 −&nbsp;47.58 = 190.32 Then, you saved $47.58 and paid $190.32 for your new dress.&nbsp;
                                TXT],
                                ['when' => 'before == 25.90 and discount == 0.15', 'text' => <<<'TXT'
                                How the result is calculated: Multiply your original price by the discount: 25.90&nbsp;×&nbsp;0.15 = 3.89 Subtract the original price from the last result: 25.90 −&nbsp;3.89 = 22.02 Then, you saved $3.89 and paid $22.02 for your new ball.
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Check our examples: Example 1 ⧉ — new dress with 20% discount. Example 2 ⧉ — new ball with 15% discount.'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'after = before - before * discount',
            'results' => ['before' => '-after/(discount - 1)', 'discount' => '(-after + before)/before', 'after' => 'before*(1 - discount)'],
        ],
        [
            'title' => 'you_save = before - after',
            'results' => ['you_save' => '-after + before', 'before' => 'after + you_save', 'after' => 'before - you_save'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Percentage discount turns Price before discount and Discount into Price after discount and You save. It is a single relationship that reads price after discount out of price before discount, not a table of canned results keyed by them. Units for Price after discount default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Percentage discount calculator works', 'html' => <<<'TXT'
            <p>Percentage discount answers one question from 2 numbers, and the answer is Price after discount and You save.</p><p>In the form&#039;s own words, Price after discount = Price before discount × (1 − Discount).</p><p>The answers are Price after discount and You save; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Price before discount</strong> — in USD</li><li><strong>Discount</strong> — in percent</li></ul><p>The answers come back as Price after discount in USD, You save in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Price before discount = 10 USD and Discount = 100 perc gives <strong>Price after discount</strong> = -990 USD and <strong>You save</strong> = 1000 USD.</p><ul><li><strong>Price after discount</strong> = -990 USD</li><li><strong>You save</strong> = 1000 USD</li></ul><p>The line behind those figures is <strong>Price after discount</strong> = <code>Price before discount × (1 − Discount)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Price after discount</strong> = -990 and <strong>You save</strong> = 1000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Discount offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Price after discount</strong> = <code>Price before discount × (1 − Discount)</code></li><li><strong>Price before discount</strong> = <code>− Price after discount ÷ (Discount − 1)</code></li><li><strong>Discount</strong> = <code>( − Price after discount + Price before discount) ÷ Price before discount</code></li><li><strong>You save</strong> = <code>− Price after discount + Price before discount</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Price after discount</strong> = <code>Price before discount × (1 − Discount)</code> — the form to use when Price before discount and Discount are the values you have.</li><li><strong>Price before discount</strong> = <code>− Price after discount ÷ (Discount − 1)</code> — the form to use when Price after discount and Discount are the values you have.</li><li><strong>Discount</strong> = <code>( − Price after discount + Price before discount) ÷ Price before discount</code> — the form to use when Price after discount and Price before discount are the values you have.</li><li><strong>You save</strong> = <code>− Price after discount + Price before discount</code> — the form to use when Price after discount and Price before discount are the values you have.</li><li><strong>Price before discount</strong> = <code>Price after discount + You save</code> — the form to use when Price after discount and You save are the values you have.</li><li><strong>Price after discount</strong> = <code>Price before discount − You save</code> — the form to use when Price before discount and You save are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Price after discount, Price before discount and Discount can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Price before discount from 10 to 20, leaving every other box alone. The panel moves from <strong>Price after discount</strong> -990 USD and <strong>You save</strong> 1000 USD to <strong>Price after discount</strong> -1980 USD and <strong>You save</strong> 2000 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Discount is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Price after discount and You save are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Price before discount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Price before discount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Discount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Discount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Price before discount to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Percentage discount form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Price before discount</strong> takes a plain number with no unit attached. The page reads it when it works out Discount, Price after discount and You save. Fill it from a measurement rather than a memory — Price before discount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Discount</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Price before discount and Price after discount. Fill it from a measurement rather than a memory — Discount is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Price after discount</strong> is a plain number and the page's own defaults put it at -990. The value follows from Price before discount and Discount. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>You save</strong> is a plain number and the page's own defaults put it at 1000. The value follows from Price after discount and Price before discount. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Price after discount</th><th>You save</th></tr></thead><tbody><tr><td><strong>Price before discount</strong> +10%</td><td>-10%</td><td>+10%</td></tr><tr><td><strong>Discount</strong> +10%</td><td>-10.1%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Discount sits at the top — a ten per cent error in that box shows up as roughly 10.1 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Price before discount = 5 USD and Discount = 50 perc and the page reports <strong>Price after discount</strong> = -245 USD and <strong>You save</strong> = 250 USD.</li><li>Feed in Price before discount = 30 USD and Discount = 100 perc and the page reports <strong>Price after discount</strong> = -2970 USD and <strong>You save</strong> = 3000 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Percentage discount actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Price after discount follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Price before discount and Discount is what you already know and Price after discount and You save is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/continuous-compound">Continuous compound interest Calculator</a>, <a href="/finance/contribution-margin">Contribution margin</a> and <a href="/finance/online-marketing-roi">Conversion rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Percentage discount calculator work out?', 'a' => <<<'TXT'
            Price after discount and You save, from Price before discount and Discount. The relationship is Price after discount = Price before discount × (1 − Discount).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Price before discount (USD), Discount (percent). With price before discount and discount in place, Price after discount can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Price after discount, Price before discount, Discount and You save can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Price after discount = -990 USD and You save = 1000 USD. That comes from the page's own defaults, entered in Price before discount; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Price after discount is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Price before discount blank and the page solves for it, reporting Price after discount instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Price after discount keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/continuous-compound', 'name' => 'Continuous compound interest Calculator'],
            ['path' => '/finance/contribution-margin', 'name' => 'Contribution margin'],
            ['path' => '/finance/online-marketing-roi', 'name' => 'Conversion rate Calculator'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * NOPAT
 * /finance/nopat
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'NOPAT',
    'meta' => ['title' => 'NOPAT Calculator: Formula, Steps & Examples', 'description' => 'NOPAT works out tax rate. Every box can be solved for, not only the one in the title. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'NOPAT Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'formula',
                            'label' => 'NOPAT formula',
                            'type' => 'select',
                            'options' => ['Simple NOPAT formula' => '0', 'Precise NOPAT formula' => '1'],
                            'dataset' => 'formula',
                            'default' => 'Simple NOPAT formula',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Simple NOPAT formula',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'operating_profit',
                            'label' => 'Operating profit',
                            'type' => 'number',
                            'help' => 'Operating Profit = Gross Profit - Operating Expense',
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
                            'name' => 'tax_rate',
                            'label' => 'Tax rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nopat',
                            'label' => 'Net operating profit after tax (NOPAT)',
                            'type' => 'number',
                            'help' => 'Net Operating Profit After Tax',
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
            'title' => 'Precise NOPAT formula',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net_income',
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
                            'name' => 'interest_expense',
                            'label' => 'Interest expense',
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
                            'name' => 'non_operating_gain',
                            'label' => 'Non-Operating gain',
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
                            'name' => 'non_operating_loss',
                            'label' => 'Non-Operating loss',
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
                            'name' => 'tax',
                            'label' => 'Tax',
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
                            'name' => 'tax_rate_precise',
                            'label' => 'Tax rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nopat_precise',
                            'label' => 'Net operating profit after tax (NOPAT)',
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
            'title' => 'nopat = operating_profit * (1 - tax_rate)',
            'results' => ['nopat' => 'operating_profit*(1 - tax_rate)', 'tax_rate' => '(-nopat + operating_profit)/operating_profit', 'operating_profit' => '-nopat/(tax_rate - 1)'],
        ],
        [
            'title' => 'tax_rate = tax_rate_precise',
            'results' => ['tax_rate' => 'tax_rate_precise', 'tax_rate_precise' => 'tax_rate'],
        ],
        [
            'title' => 'nopat_precise = (net_income + tax + interest_expense + non_operating_loss - non_operating_gain) * (1 - tax_rate_precise)',
            'results' => [
                'tax' => <<<'TXT'
                (-interest_expense*tax_rate_precise + interest_expense - net_income*tax_rate_precise + net_income + non_operating_gain*tax_rate_precise - non_operating_gain - non_operating_loss*tax_rate_precise + non_operating_loss - nopat_precise)/(tax_rate_precise - 1)
                TXT,
                'net_income' => <<<'TXT'
                (-interest_expense*tax_rate_precise + interest_expense + non_operating_gain*tax_rate_precise - non_operating_gain - non_operating_loss*tax_rate_precise + non_operating_loss - nopat_precise - tax*tax_rate_precise + tax)/(tax_rate_precise - 1)
                TXT,
                'interest_expense' => <<<'TXT'
                (-net_income*tax_rate_precise + net_income + non_operating_gain*tax_rate_precise - non_operating_gain - non_operating_loss*tax_rate_precise + non_operating_loss - nopat_precise - tax*tax_rate_precise + tax)/(tax_rate_precise - 1)
                TXT,
                'non_operating_gain' => <<<'TXT'
                (interest_expense*tax_rate_precise - interest_expense + net_income*tax_rate_precise - net_income + non_operating_loss*tax_rate_precise - non_operating_loss + nopat_precise + tax*tax_rate_precise - tax)/(tax_rate_precise - 1)
                TXT,
                'non_operating_loss' => <<<'TXT'
                (-interest_expense*tax_rate_precise + interest_expense - net_income*tax_rate_precise + net_income + non_operating_gain*tax_rate_precise - non_operating_gain - nopat_precise - tax*tax_rate_precise + tax)/(tax_rate_precise - 1)
                TXT,
                'tax_rate_precise' => <<<'TXT'
                (interest_expense + net_income - non_operating_gain + non_operating_loss - nopat_precise + tax)/(interest_expense + net_income - non_operating_gain + non_operating_loss + tax)
                TXT,
                'nopat_precise' => <<<'TXT'
                -interest_expense*tax_rate_precise + interest_expense - net_income*tax_rate_precise + net_income + non_operating_gain*tax_rate_precise - non_operating_gain - non_operating_loss*tax_rate_precise + non_operating_loss - tax*tax_rate_precise + tax
                TXT,
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        NOPAT works out Net operating profit after tax (NOPAT) and Net income from Operating profit. Nothing is looked up on this page: net operating profit after tax (NOPAT) is computed from operating profit and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Net operating profit after tax (NOPAT) is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the NOPAT calculator works', 'html' => <<<'TXT'
            <p>NOPAT answers one question from 2 numbers, and the answer is Net operating profit after tax (NOPAT), Net income and Interest expense.</p><p>In the form&#039;s own words, Net operating profit after tax (NOPAT) = Operating profit × (1 − Tax rate).</p><p>The answers are Net operating profit after tax (NOPAT), Net income, Interest expense and Non-Operating gain; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Operating profit</strong> — in USD. Operating Profit = Gross Profit - Operating Expense</li><li><strong>Tax rate</strong> — in percent</li></ul><p>What you get back is Net operating profit after tax (NOPAT) in USD, Net income in USD, Interest expense in USD, Non-Operating gain in USD, Non-Operating loss in USD, Tax in USD, Tax rate in percent, Net operating profit after tax (NOPAT) in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Tax rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Net operating profit after tax (NOPAT)</strong> = <code>Operating profit × (1 − Tax rate)</code></li><li><strong>Tax rate</strong> = <code>( − Net operating profit after tax (NOPAT) + Operating profit) ÷ Operating profit</code></li><li><strong>Operating profit</strong> = <code>− Net operating profit after tax (NOPAT) ÷ (Tax rate − 1)</code></li><li><strong>Non-Operating gain</strong> = <code>(Interest expense × Tax rate − Interest expense + Net income × Tax rate − Net income + Non-Operating loss × Tax rate − Non-Operating loss + Net operating profit after tax (NOPAT) + Tax × Tax rate − Tax) ÷ (Tax rate − 1)</code></li><li><strong>Non-Operating loss</strong> = <code>( − Interest expense × Tax rate + Interest expense − Net income × Tax rate + Net income + Non-Operating gain × Tax rate − Non-Operating gain − Net operating profit after tax (NOPAT) − Tax × Tax rate + Tax) ÷ (Tax rate − 1)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Net operating profit after tax (NOPAT)</strong> = <code>Operating profit × (1 − Tax rate)</code> — the form to use when Operating profit and Tax rate are the values you have.</li><li><strong>Tax rate</strong> = <code>( − Net operating profit after tax (NOPAT) + Operating profit) ÷ Operating profit</code> — the form to use when Net operating profit after tax (NOPAT) and Operating profit are the values you have.</li><li><strong>Operating profit</strong> = <code>− Net operating profit after tax (NOPAT) ÷ (Tax rate − 1)</code> — the form to use when Net operating profit after tax (NOPAT) and Tax rate are the values you have.</li><li><strong>Tax rate</strong> = <code>Tax rate</code> — the form to use when Tax rate are the values you have.</li><li><strong>Tax rate</strong> = <code>Tax rate</code> — the form to use when Tax rate are the values you have.</li><li><strong>Net operating profit after tax (NOPAT)</strong> = <code>− Interest expense × Tax rate + Interest expense − Net income × Tax rate + Net income + Non-Operating gain × Tax rate − Non-Operating gain − Non-Operating loss × Tax rate + Non-Operating loss − Tax × Tax rate + Tax</code> — the form to use when Interest expense, Tax rate, Net income and Non-Operating gain are the values you have.</li><li><strong>Non-Operating gain</strong> = <code>(Interest expense × Tax rate − Interest expense + Net income × Tax rate − Net income + Non-Operating loss × Tax rate − Non-Operating loss + Net operating profit after tax (NOPAT) + Tax × Tax rate − Tax) ÷ (Tax rate − 1)</code> — the form to use when Interest expense, Tax rate, Net income and Non-Operating loss are the values you have.</li><li><strong>Non-Operating loss</strong> = <code>( − Interest expense × Tax rate + Interest expense − Net income × Tax rate + Net income + Non-Operating gain × Tax rate − Non-Operating gain − Net operating profit after tax (NOPAT) − Tax × Tax rate + Tax) ÷ (Tax rate − 1)</code> — the form to use when Interest expense, Tax rate, Net income and Non-Operating gain are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Net operating profit after tax (NOPAT), Tax rate and Operating profit can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Tax rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Net operating profit after tax (NOPAT), Net income and Interest expense are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Operating profit left as a guess.</strong> Anything typed into Operating profit is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Tax rate left as a guess.</strong> Anything typed into Tax rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Operating profit to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the NOPAT form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Operating profit</strong> takes a plain number with no unit attached. Operating Profit = Gross Profit - Operating Expense. It feeds Net operating profit after tax (NOPAT) and Tax rate. Fill it from a measurement rather than a memory — Operating profit is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Tax rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Net operating profit after tax (NOPAT), Operating profit and Tax rate. Fill it from a measurement rather than a memory — Tax rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 8 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Net operating profit after tax (NOPAT)</strong> is a plain number. The value follows from Operating profit and Tax rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Net income</strong> is a plain number. The value follows from Interest expense, Tax rate, Non-Operating gain and Non-Operating loss. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Interest expense</strong> is a plain number. The value follows from Net income, Tax rate, Non-Operating gain and Non-Operating loss. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Non-Operating gain</strong> is a plain number. The value follows from Interest expense, Tax rate, Net income and Non-Operating loss. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Non-Operating loss</strong> is a plain number. The value follows from Interest expense, Tax rate, Net income and Non-Operating gain. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Tax</strong> is a plain number. The value follows from Interest expense, Tax rate, Net income and Non-Operating gain. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Tax rate</strong> is a percent figure. The value follows from Tax rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Net operating profit after tax (NOPAT)</strong> is a plain number. The value follows from Interest expense, Tax rate, Net income and Non-Operating gain. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on NOPAT actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Net operating profit after tax (NOPAT) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Operating profit and Tax rate measured, Net operating profit after tax (NOPAT) and Net income wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/pence-to-pounds">Pence to pounds converter Calculator</a>, <a href="/finance/percent-off">Percent off Calculator</a> and <a href="/finance/percentage-discount">Percentage discount Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the NOPAT calculator work out?', 'a' => <<<'TXT'
            Net operating profit after tax (NOPAT), Net income, Interest expense and Non-Operating gain, from Operating profit and Tax rate. The relationship is Net operating profit after tax (NOPAT) = Operating profit × (1 − Tax rate).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Operating profit (USD), Tax rate (percent). Fill operating profit and tax rate and leave Net operating profit after tax (NOPAT) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Net operating profit after tax (NOPAT), Tax rate, Operating profit and Tax rate can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Net operating profit after tax (NOPAT) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Operating profit blank and the page solves for it, reporting Net operating profit after tax (NOPAT) instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Net operating profit after tax (NOPAT) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/pence-to-pounds', 'name' => 'Pence to pounds converter Calculator'],
            ['path' => '/finance/percent-off', 'name' => 'Percent off Calculator'],
            ['path' => '/finance/percentage-discount', 'name' => 'Percentage discount Calculator'],
        ],
        'authors' => [],
    ],
];

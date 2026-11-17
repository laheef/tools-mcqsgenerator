<?php

/**
 * Cash back
 * /finance/cash-back
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cash back',
    'meta' => ['title' => 'Cash back Calculator: Formula, Steps & Examples', 'description' => 'Enter cash back limit, amount purchased and percentage cash back and Cash back returns cash back and cash back with limit. Any box can be the unknown.', 'h1' => 'Cash back Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_back_limit_option',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['I don\'t have a cash back limit ' => '0', '' => '1'],
                            'dataset' => 'cash_back_options',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_back_limit',
                            'label' => 'Cash back limit',
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
                            'name' => 'amount_purchased',
                            'label' => 'Amount purchased',
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
                            'name' => 'percentage_cash_back',
                            'label' => 'Percentage cash back',
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
                            'name' => 'cash_back',
                            'label' => 'Cash back',
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
                            'name' => 'cash_back_with_limit',
                            'label' => 'Cash back with limit',
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
                                ['when' => 'cash_back_limit_option == 0', 'text' => 'You have got {{cash_back.monetaryValue}} of cash back! &nbsp;'],
                                ['when' => 'cash_back_limit_option == 1', 'text' => 'You have got {{cash_back_with_limit.monetaryValue}} of cash back! '],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'cash_back_with_limit = min(cash_back_limit, percentage_cash_back * amount_purchased)',
            'results' => ['cash_back_with_limit' => 'min(cash_back_limit, amount_purchased*percentage_cash_back)'],
        ],
        [
            'title' => 'cash_back = percentage_cash_back * amount_purchased',
            'results' => ['percentage_cash_back' => 'cash_back/amount_purchased', 'amount_purchased' => 'cash_back/percentage_cash_back', 'cash_back' => 'amount_purchased*percentage_cash_back'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cash back works out Cash back and Cash back with limit from Cash back limit, Amount purchased and Percentage cash back. It is a single relationship that reads cash back out of cash back limit, not a table of canned results keyed by them. Units for Cash back default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Cash back calculator works', 'html' => <<<'TXT'
            <p>Cash back answers one question from 3 numbers, and the answer is Cash back and Cash back with limit.</p><p>Written with the labels from the form, Cash back with limit = min(Cash back limit, Amount purchased × Percentage cash back).</p><p>The answers are Cash back and Cash back with limit; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Cash back limit</strong> — in USD</li><li><strong>Amount purchased</strong> — in USD</li><li><strong>Percentage cash back</strong> — in percent</li></ul><p>The result boxes are Cash back in USD, Cash back with limit in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Percentage cash back lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Cash back with limit</strong> = <code>min(Cash back limit, Amount purchased × Percentage cash back)</code></li><li><strong>Cash back</strong> = <code>Amount purchased × Percentage cash back</code></li><li><strong>Percentage cash back</strong> = <code>Cash back ÷ Amount purchased</code></li><li><strong>Amount purchased</strong> = <code>Cash back ÷ Percentage cash back</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Cash back with limit</strong> = <code>min(Cash back limit, Amount purchased × Percentage cash back)</code> — the form to use when Cash back limit, Amount purchased and Percentage cash back are the values you have.</li><li><strong>Cash back</strong> = <code>Amount purchased × Percentage cash back</code> — the form to use when Amount purchased and Percentage cash back are the values you have.</li><li><strong>Percentage cash back</strong> = <code>Cash back ÷ Amount purchased</code> — the form to use when Cash back and Amount purchased are the values you have.</li><li><strong>Amount purchased</strong> = <code>Cash back ÷ Percentage cash back</code> — the form to use when Cash back and Percentage cash back are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Cash back with limit, Cash back and Percentage cash back can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Percentage cash back carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Cash back and Cash back with limit are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Cash back limit left as a guess.</strong> Anything typed into Cash back limit is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Amount purchased left as a guess.</strong> Anything typed into Amount purchased is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Cash back limit to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Cash back form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Cash back limit</strong> takes a plain number with no unit attached. It feeds Cash back with limit. Fill it from a measurement rather than a memory — Cash back limit is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Amount purchased</strong> takes a plain number with no unit attached. It feeds Cash back with limit, Percentage cash back and Cash back. Fill it from a measurement rather than a memory — Amount purchased is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Percentage cash back</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Cash back with limit, Amount purchased and Cash back. Fill it from a measurement rather than a memory — Percentage cash back is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Cash back</strong> is a plain number. It is worked out from Amount purchased and Percentage cash back. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Cash back with limit</strong> is a plain number. It is worked out from Cash back limit, Amount purchased and Percentage cash back. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Cash back actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Cash back limit, Amount purchased and Percentage cash back ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Cash back limit — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Cash back in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Cash back is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Cash back limit, Amount purchased and Percentage cash back are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Cash back limit, Amount purchased and Percentage cash back and the number you are missing is Cash back and Cash back with limit.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/avc">Average variable cost Calculator</a>, <a href="/finance/balance-transfer">Balance transfer Calculator</a> and <a href="/finance/balloon-payment">Balloon payment Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Cash back is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cash back calculator work out?', 'a' => <<<'TXT'
            Cash back and Cash back with limit, from Cash back limit, Amount purchased and Percentage cash back. The relationship is Cash back with limit = min(Cash back limit, Amount purchased × Percentage cash back).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cash back limit (USD), Amount purchased (USD), Percentage cash back (percent). Fill cash back limit, amount purchased and percentage cash back and leave Cash back empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Cash back with limit, Cash back, Percentage cash back and Amount purchased can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Cash back is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Cash back limit blank and the page solves for it, reporting Cash back instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Cash back keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/avc', 'name' => 'Average variable cost Calculator'],
            ['path' => '/finance/balance-transfer', 'name' => 'Balance transfer Calculator'],
            ['path' => '/finance/balloon-payment', 'name' => 'Balloon payment Calculator'],
        ],
        'authors' => [],
    ],
];

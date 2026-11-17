<?php

/**
 * Gross to net
 * /finance/gross-to-net
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Gross to net',
    'meta' => ['title' => 'Gross to net Calculator — Formula & Results', 'description' => 'Gross to net reports gross amount, insert the tax rate (%), net amount and tax amount. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Gross to net Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gross',
                            'label' => 'Gross amount',
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
                            'name' => 'tax_choice',
                            'label' => 'Tax rate type',
                            'type' => 'select',
                            'options' => ['gross to net' => '2', 'net to gross' => '1'],
                            'dataset' => 'tax_choice',
                            'help' => 'Usually, the tax rates for salaries are gross to net, e.g., we pay x% of tax given the gross salary amount.',
                            'default' => 'gross to net',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_from_net',
                            'label' => 'Insert the tax rate (%)',
                            'type' => 'number',
                            'help' => 'Insert the tax rate from net. For example, if the net price is $100 and you add an 8% tax, the gross price is $108.',
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
                            'name' => 'tax_from_gross',
                            'label' => 'Insert the tax rate (%)',
                            'type' => 'number',
                            'help' => 'Insert the tax rate from gross. For example, a gross amount of $100 with 19% of taxation results in a net amount of $81.',
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
                            'name' => 'net',
                            'label' => 'Net amount',
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
                            'name' => 'difference',
                            'label' => 'Tax amount',
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
            'title' => 'gross = net * (1+tax_from_net)',
            'results' => ['gross' => 'net*(tax_from_net + 1)', 'tax_from_net' => '(gross - net)/net', 'net' => 'gross/(tax_from_net + 1)'],
        ],
        [
            'title' => 'difference = gross - net',
            'results' => ['gross' => 'difference + net', 'net' => '-difference + gross', 'difference' => 'gross - net'],
        ],
        [
            'title' => 'net = gross * (1-tax_from_gross)',
            'results' => ['gross' => '-net/(tax_from_gross - 1)', 'net' => 'gross*(1 - tax_from_gross)', 'tax_from_gross' => '(gross - net)/gross'],
        ],
        [
            'title' => 'tax_from_gross = 1 - 1 / (1+tax_from_net)',
            'results' => ['tax_from_net' => '-tax_from_gross/(tax_from_gross - 1)', 'tax_from_gross' => 'tax_from_net/(tax_from_net + 1)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Gross to net turns Net amount into Gross amount and Insert the tax rate (%). The arithmetic is the whole method: gross amount is worked out from net amount by one formula, applied once. Gross amount comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Gross to net calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Gross to net: it takes 2 numbers and reports Gross amount, Insert the tax rate (%) and Tax amount.</p><p>The relationship it solves reads Gross amount = Net amount × (Insert the tax rate (%) + 1).</p><p>The answers are Gross amount, Insert the tax rate (%) and Tax amount; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Insert the tax rate (%)</strong> — in percent. Insert the tax rate from net. For example, if the net price is $100 and you add an 8% tax, the gross price is $108.</li><li><strong>Net amount</strong> — in USD</li></ul><p>The answers come back as Gross amount in USD, Insert the tax rate (%) in percent, Tax amount in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Insert the tax rate (%) offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Gross amount</strong> = <code>Net amount × (Insert the tax rate (%) + 1)</code></li><li><strong>Insert the tax rate (%)</strong> = <code>(Gross amount − Net amount) ÷ Net amount</code></li><li><strong>Net amount</strong> = <code>Gross amount ÷ (Insert the tax rate (%) + 1)</code></li><li><strong>Tax amount</strong> = <code>Gross amount − Net amount</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Gross amount</strong> = <code>Net amount × (Insert the tax rate (%) + 1)</code> — the form to use when Net amount and Insert the tax rate (%) are the values you have.</li><li><strong>Insert the tax rate (%)</strong> = <code>(Gross amount − Net amount) ÷ Net amount</code> — the form to use when Gross amount and Net amount are the values you have.</li><li><strong>Net amount</strong> = <code>Gross amount ÷ (Insert the tax rate (%) + 1)</code> — the form to use when Gross amount and Insert the tax rate (%) are the values you have.</li><li><strong>Tax amount</strong> = <code>Gross amount − Net amount</code> — the form to use when Gross amount and Net amount are the values you have.</li><li><strong>Gross amount</strong> = <code>Tax amount + Net amount</code> — the form to use when Tax amount and Net amount are the values you have.</li><li><strong>Net amount</strong> = <code>− Tax amount + Gross amount</code> — the form to use when Tax amount and Gross amount are the values you have.</li><li><strong>Net amount</strong> = <code>Gross amount × (1 − Insert the tax rate (%))</code> — the form to use when Gross amount and Insert the tax rate (%) are the values you have.</li><li><strong>Gross amount</strong> = <code>− Net amount ÷ (Insert the tax rate (%) − 1)</code> — the form to use when Net amount and Insert the tax rate (%) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Gross amount, Insert the tax rate (%) and Net amount can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Insert the tax rate (%) is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Gross amount, Insert the tax rate (%) and Tax amount are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Insert the tax rate (%) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Insert the tax rate (%) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Net amount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Net amount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Insert the tax rate (%) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Insert the tax rate (%)</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Insert the tax rate from net. For example, if the net price is $100 and you add an 8% tax, the gross price is $108. Change it and Gross amount, Net amount and Insert the tax rate (%) changes with it. Have it to hand before you start: Insert the tax rate (%) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Net amount</strong> takes a plain number with no unit attached. Change it and Gross amount, Insert the tax rate (%) and Tax amount changes with it. Have it to hand before you start: Net amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Gross amount</strong> is a plain number. It is worked out from Net amount and Insert the tax rate (%). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Insert the tax rate (%)</strong> is a percent figure. It is worked out from Gross amount and Net amount. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Tax amount</strong> is a plain number. It is worked out from Gross amount and Net amount. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Insert the tax rate (%) and Net amount. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Insert the tax rate (%) into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Gross amount in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Gross amount follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Insert the tax rate (%) and Net amount is what you already know and Gross amount and Insert the tax rate (%) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/customer-retention-rate">Customer retention rate</a>, <a href="/finance/cyber-monday">Cyber Monday Calculator</a> and <a href="/finance/dart-rate">Dart rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Gross to net calculator work out?', 'a' => <<<'TXT'
            Gross amount, Insert the tax rate (%) and Tax amount, from Net amount and Insert the tax rate (%). The relationship is Gross amount = Net amount × (Insert the tax rate (%) + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Insert the tax rate (%) (percent), Net amount (USD). Fill insert the tax rate (%) and net amount and leave Gross amount empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Gross amount, Insert the tax rate (%), Net amount and Tax amount can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Gross amount is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Insert the tax rate (%) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Gross amount at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/customer-retention-rate', 'name' => 'Customer retention rate'],
            ['path' => '/finance/cyber-monday', 'name' => 'Cyber Monday Calculator'],
            ['path' => '/finance/dart-rate', 'name' => 'Dart rate Calculator'],
        ],
        'authors' => [],
    ],
];

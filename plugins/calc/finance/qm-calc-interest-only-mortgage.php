<?php

/**
 * Interest-only mortgage
 * /finance/interest-only-mortgage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Interest-only mortgage',
    'meta' => ['title' => 'Interest-only mortgage: Formula, Steps & Results', 'description' => 'Interest-only mortgage works out monthly payment and total amount paid in interest-only period from loan amount, annual interest rate and payment frequency.', 'h1' => 'Interest-only mortgage Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loan_amount',
                            'label' => 'Loan amount',
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
                            'name' => 'interest_rate',
                            'label' => 'Annual interest rate',
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
                            'name' => 'payment_frequency',
                            'label' => 'Payment frequency',
                            'type' => 'select',
                            'options' => ['Daily' => '365', 'Monthly' => '12', 'Quarterly' => '4', 'Yearly' => '1'],
                            'dataset' => 'frequency',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payment',
                            'label' => 'Monthly payment',
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
            'title' => 'Interest-only period',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_only_period',
                            'label' => 'Interest-only period',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_interest',
                            'label' => 'Total amount paid in interest-only period',
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
            'title' => 'payment = loan_amount * interest_rate/payment_frequency',
            'results' => ['loan_amount' => 'payment*payment_frequency/interest_rate', 'payment_frequency' => 'interest_rate*loan_amount/payment', 'interest_rate' => 'payment*payment_frequency/loan_amount', 'payment' => 'interest_rate*loan_amount/payment_frequency'],
        ],
        [
            'title' => 'total_interest = payment * interest_only_period*payment_frequency',
            'results' => ['interest_only_period' => 'total_interest/(payment*payment_frequency)', 'payment_frequency' => 'total_interest/(interest_only_period*payment)', 'payment' => 'total_interest/(interest_only_period*payment_frequency)', 'total_interest' => 'interest_only_period*payment*payment_frequency'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Loan amount, Annual interest rate and Payment frequency into Interest-only mortgage and the answer comes back as Monthly payment and Interest-only period. There is no hidden constant here: change monthly payment and loan amount moves with it. The main result, Monthly payment, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Interest-only mortgage calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Interest-only mortgage: it takes 3 numbers and reports Monthly payment, Interest-only period and Total amount paid in interest-only period.</p><p>Written with the labels from the form, Monthly payment = Annual interest rate × Loan amount ÷ Payment frequency.</p><p>The result panel carries Monthly payment, Interest-only period and Total amount paid in interest-only period, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Loan amount</strong> — in USD</li><li><strong>Annual interest rate</strong> — in percent</li><li><strong>Payment frequency</strong> — a plain number, no unit</li></ul><p>The answers come back as Monthly payment in USD, Interest-only period in years / months, Total amount paid in interest-only period in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Loan amount = 10 USD, Annual interest rate = 100 perc, Payment frequency = 12, Interest-only period = 1000 yrsmos and Total amount paid in interest-only period = 10 USD — through the same formula and the panel reports <strong>Monthly payment</strong> = 83.33 USD.</p><ul><li><strong>Monthly payment</strong> = 83.33 USD</li></ul><p>That is <strong>Monthly payment</strong> = <code>Annual interest rate × Loan amount ÷ Payment frequency</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Monthly payment</strong> = 83.33. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Interest-only period lists 9 options and opens on years / months. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Monthly payment</strong> = <code>Annual interest rate × Loan amount ÷ Payment frequency</code></li><li><strong>Loan amount</strong> = <code>Monthly payment × Payment frequency ÷ Annual interest rate</code></li><li><strong>Payment frequency</strong> = <code>Annual interest rate × Loan amount ÷ Monthly payment</code></li><li><strong>Annual interest rate</strong> = <code>Monthly payment × Payment frequency ÷ Loan amount</code></li><li><strong>Total amount paid in interest-only period</strong> = <code>Interest-only period × Monthly payment × Payment frequency</code></li><li><strong>Interest-only period</strong> = <code>Total amount paid in interest-only period ÷ (Monthly payment × Payment frequency)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Monthly payment</strong> = <code>Annual interest rate × Loan amount ÷ Payment frequency</code> — the form to use when Annual interest rate, Loan amount and Payment frequency are the values you have.</li><li><strong>Loan amount</strong> = <code>Monthly payment × Payment frequency ÷ Annual interest rate</code> — the form to use when Monthly payment, Payment frequency and Annual interest rate are the values you have.</li><li><strong>Payment frequency</strong> = <code>Annual interest rate × Loan amount ÷ Monthly payment</code> — the form to use when Annual interest rate, Loan amount and Monthly payment are the values you have.</li><li><strong>Annual interest rate</strong> = <code>Monthly payment × Payment frequency ÷ Loan amount</code> — the form to use when Monthly payment, Payment frequency and Loan amount are the values you have.</li><li><strong>Total amount paid in interest-only period</strong> = <code>Interest-only period × Monthly payment × Payment frequency</code> — the form to use when Interest-only period, Monthly payment and Payment frequency are the values you have.</li><li><strong>Interest-only period</strong> = <code>Total amount paid in interest-only period ÷ (Monthly payment × Payment frequency)</code> — the form to use when Total amount paid in interest-only period, Monthly payment and Payment frequency are the values you have.</li><li><strong>Payment frequency</strong> = <code>Total amount paid in interest-only period ÷ (Interest-only period × Monthly payment)</code> — the form to use when Total amount paid in interest-only period, Interest-only period and Monthly payment are the values you have.</li><li><strong>Monthly payment</strong> = <code>Total amount paid in interest-only period ÷ (Interest-only period × Payment frequency)</code> — the form to use when Total amount paid in interest-only period, Interest-only period and Payment frequency are the values you have.</li></ul><p>Any one of Monthly payment, Loan amount and Payment frequency can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Loan amount from 10 to 20, leaving every other box alone. The panel moves from <strong>Monthly payment</strong> 83.33 USD to <strong>Monthly payment</strong> 167 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Annual interest rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Monthly payment, Interest-only period and Total amount paid in interest-only period are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Loan amount left as a guess.</strong> Anything typed into Loan amount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Annual interest rate left as a guess.</strong> Anything typed into Annual interest rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Loan amount to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Loan amount</strong> takes a plain number with no unit attached. It feeds Payment frequency, Annual interest rate and Monthly payment. Have it to hand before you start: Loan amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Annual interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Loan amount, Payment frequency and Monthly payment. Have it to hand before you start: Annual interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Payment frequency</strong> takes a plain number with no unit attached. It feeds Loan amount, Annual interest rate and Monthly payment. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Payment frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Monthly payment</strong> is a plain number and the page's own defaults put it at 83.33. The value follows from Annual interest rate, Loan amount and Payment frequency. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Interest-only period</strong> is a years / months figure. The value follows from Total amount paid in interest-only period, Monthly payment and Payment frequency. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total amount paid in interest-only period</strong> is a plain number. The value follows from Interest-only period, Monthly payment and Payment frequency. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Monthly payment</th></tr></thead><tbody><tr><td><strong>Loan amount</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Annual interest rate</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Payment frequency</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Interest-only period</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total amount paid in interest-only period</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Annual interest rate: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Interest-only period and Total amount paid in interest-only period barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Loan amount = 5 USD, Annual interest rate = 50 perc, Payment frequency = 6, Interest-only period = 500 yrsmos and Total amount paid in interest-only period = 5 USD, the answer is <strong>Monthly payment</strong> = 41.67 USD.</li><li>With Loan amount = 30 USD, Annual interest rate = 100 perc, Payment frequency = 12, Interest-only period = 1000 yrsmos and Total amount paid in interest-only period = 10 USD, the answer is <strong>Monthly payment</strong> = 250 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Monthly payment is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover years / months and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Loan amount, Annual interest rate and Payment frequency is what you already know and Monthly payment and Interest-only period is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/dream-come-true">Dream come true Calculator</a>, <a href="/finance/dupont-analysis">DuPont analysis Calculator</a> and <a href="/finance/ear">EAR Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Interest-only mortgage calculator work out?', 'a' => <<<'TXT'
            Monthly payment, Interest-only period and Total amount paid in interest-only period, from Annual interest rate, Loan amount and Payment frequency. The relationship is Monthly payment = Annual interest rate × Loan amount ÷ Payment frequency.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loan amount (USD), Annual interest rate (percent), Payment frequency. With loan amount, annual interest rate and payment frequency in place, Monthly payment can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Monthly payment, Loan amount, Payment frequency and Annual interest rate blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Monthly payment = 83.33 USD. Those are the defaults written into the form — move Loan amount and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Monthly payment is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Loan amount left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Monthly payment at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/dream-come-true', 'name' => 'Dream come true Calculator'],
            ['path' => '/finance/dupont-analysis', 'name' => 'DuPont analysis Calculator'],
            ['path' => '/finance/ear', 'name' => 'EAR Calculator'],
        ],
        'authors' => [],
    ],
];

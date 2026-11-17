<?php

/**
 * PMI
 * /finance/pmi
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'PMI',
    'meta' => ['title' => 'PMI Calculator — Free, With Worked Examples', 'description' => 'PMI works out down payment and mortgage loan from home price and percent. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'PMI Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => 'Mortgage specification',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'homeprice',
                            'label' => 'Home price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'grid' => 'FR3_FR2',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'downpayment',
                            'label' => 'Down payment',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'downpayment_percent',
                            'label' => 'Percent',
                            'type' => 'number',
                            'help' => 'Downpayment in percentage.',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'downpayment_percent < 0.05', 'text' => 'You may want to consider the government-insured FHA loan which allows down payment as low as 3.5%.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'grid' => 'FR3_FR2',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'loan',
                            'label' => 'Mortgage loan',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'ltv',
                            'label' => 'LTV ratio',
                            'type' => 'number',
                            'help' => 'Loan-to-Value ratio.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'PMI estimations',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'grid' => 'FR2_FR3',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'pmirate',
                            'label' => 'PMI rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pmi_annual',
                            'label' => 'Annual PMI',
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
                            'name' => 'pmi_month',
                            'label' => 'Monthly PMI',
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
                                ['when' => 'pmirate == 0', 'text' => 'NO PMI. You can also check out the government-insured FHA Loan.&nbsp;'],
                                ['when' => 'pmirate > 0.1', 'text' => 'PMI rate is too high!&nbsp;'],
                                ['when' => 'pmirate > 0', 'text' => 'Check out the government-insured FHA Loan. It allows down payment as low as 3.5% with lower closing costs and insurance fees.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'ltv = (homeprice - downpayment) / homeprice',
            'results' => ['downpayment' => 'homeprice*(1 - ltv)', 'homeprice' => '-downpayment/(ltv - 1)', 'ltv' => '(-downpayment + homeprice)/homeprice'],
        ],
        [
            'title' => 'downpayment = homeprice * downpayment_percent',
            'results' => ['downpayment' => 'downpayment_percent*homeprice', 'downpayment_percent' => 'downpayment/homeprice', 'homeprice' => 'downpayment/downpayment_percent'],
        ],
        [
            'title' => 'loan = homeprice - downpayment',
            'results' => ['loan' => '-downpayment + homeprice', 'downpayment' => 'homeprice - loan', 'homeprice' => 'downpayment + loan'],
        ],
        [
            'title' => 'pmi_annual = loan * pmirate',
            'results' => ['pmirate' => 'pmi_annual/loan', 'loan' => 'pmi_annual/pmirate', 'pmi_annual' => 'loan*pmirate'],
        ],
        [
            'title' => 'pmi_month = pmi_annual / 12',
            'results' => ['pmi_month' => '(1/12)*pmi_annual', 'pmi_annual' => '12*pmi_month'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        PMI works out Percent and Mortgage loan from Home price and Down payment. There is no hidden constant here: change percent and home price moves with it. The main result, Percent, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the PMI calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind PMI: it takes 2 numbers and reports Percent, Mortgage loan and LTV ratio.</p><p>The relationship it solves reads LTV ratio = ( − Down payment + Home price) ÷ Home price.</p><p>The answers are Percent, Mortgage loan, LTV ratio and PMI rate; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Home price</strong> — in USD</li><li><strong>Down payment</strong> — in USD</li></ul><p>The answers come back as Percent in percent, Mortgage loan in USD, LTV ratio in percent, PMI rate in percent, Annual PMI in USD, Monthly PMI in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Home price = 10 USD, Percent = 100 perc, Mortgage loan = 1000 USD, LTV ratio = 10 perc, PMI rate = 100 perc, Annual PMI = 1000 USD and Monthly PMI = 10 USD — through the same formula and the panel reports <strong>Down payment</strong> = -90 USD.</p><ul><li><strong>Down payment</strong> = -90 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>LTV ratio</strong> = <code>( − Down payment + Home price) ÷ Home price</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Down payment</strong> = -90. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Percent lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>LTV ratio</strong> = <code>( − Down payment + Home price) ÷ Home price</code></li><li><strong>Down payment</strong> = <code>Home price × (1 − LTV ratio)</code></li><li><strong>Home price</strong> = <code>− Down payment ÷ (LTV ratio − 1)</code></li><li><strong>Percent</strong> = <code>Down payment ÷ Home price</code></li><li><strong>Mortgage loan</strong> = <code>− Down payment + Home price</code></li><li><strong>Annual PMI</strong> = <code>Mortgage loan × PMI rate</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>LTV ratio</strong> = <code>( − Down payment + Home price) ÷ Home price</code> — the form to use when Down payment and Home price are the values you have.</li><li><strong>Down payment</strong> = <code>Home price × (1 − LTV ratio)</code> — the form to use when Home price and LTV ratio are the values you have.</li><li><strong>Home price</strong> = <code>− Down payment ÷ (LTV ratio − 1)</code> — the form to use when Down payment and LTV ratio are the values you have.</li><li><strong>Down payment</strong> = <code>Percent × Home price</code> — the form to use when Percent and Home price are the values you have.</li><li><strong>Percent</strong> = <code>Down payment ÷ Home price</code> — the form to use when Down payment and Home price are the values you have.</li><li><strong>Home price</strong> = <code>Down payment ÷ Percent</code> — the form to use when Down payment and Percent are the values you have.</li><li><strong>Mortgage loan</strong> = <code>− Down payment + Home price</code> — the form to use when Down payment and Home price are the values you have.</li><li><strong>Down payment</strong> = <code>Home price − Mortgage loan</code> — the form to use when Home price and Mortgage loan are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of LTV ratio, Down payment and Home price can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Home price from 10 to 20, leaving every other box alone. The panel moves from <strong>Down payment</strong> -90 USD to <strong>Down payment</strong> -180 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Percent, Mortgage loan and LTV ratio are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Home price left as a guess.</strong> Anything typed into Home price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Down payment left as a guess.</strong> Anything typed into Down payment is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Home price is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Home price</strong> takes a plain number with no unit attached. It feeds Down payment, LTV ratio and Percent. Have it to hand before you start: Home price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Down payment</strong> takes a plain number with no unit attached. It feeds Home price, LTV ratio and Percent. Have it to hand before you start: Down payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 6 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Percent</strong> is a percent figure. The value follows from Down payment and Home price. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Mortgage loan</strong> is a plain number. The value follows from Down payment and Home price. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>LTV ratio</strong> is a percent figure. The value follows from Down payment and Home price. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>PMI rate</strong> is a percent figure. The value follows from Annual PMI and Mortgage loan. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Annual PMI</strong> is a plain number. The value follows from Mortgage loan and PMI rate. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Monthly PMI</strong> is a plain number. The value follows from Annual PMI. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Down payment</th></tr></thead><tbody><tr><td><strong>Home price</strong> +10%</td><td>-10%</td></tr><tr><td><strong>Percent</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Mortgage loan</strong> +10%</td><td>+0%</td></tr><tr><td><strong>LTV ratio</strong> +10%</td><td>-11.11%</td></tr><tr><td><strong>PMI rate</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Annual PMI</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Monthly PMI</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to LTV ratio: ten per cent there moves an answer by about 11.1 per cent, which is why that is the number to measure twice. By contrast, Percent, Mortgage loan and PMI rate barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Home price = 5 USD, Percent = 50 perc, Mortgage loan = 500 USD, LTV ratio = 5 perc, PMI rate = 50 perc, Annual PMI = 500 USD and Monthly PMI = 5 USD, the answer is <strong>Down payment</strong> = -20 USD.</li><li>With Home price = 30 USD, Percent = 100 perc, Mortgage loan = 1000 USD, LTV ratio = 10 perc, PMI rate = 100 perc, Annual PMI = 1000 USD and Monthly PMI = 10 USD, the answer is <strong>Down payment</strong> = -270 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Percent is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Home price and Down payment is what you already know and Percent and Mortgage loan is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/salary-inflation">Salary inflation Calculator</a>, <a href="/finance/salary-to-hourly">Salary to hourly</a> and <a href="/finance/salary-with-overtime">Salary with overtime</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the PMI calculator work out?', 'a' => <<<'TXT'
            Percent, Mortgage loan, LTV ratio and PMI rate, from Down payment and Home price. The relationship is LTV ratio = ( − Down payment + Home price) ÷ Home price.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Home price (USD), Down payment (USD). Enter home price and down payment; Percent is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. LTV ratio, Down payment, Home price and Percent can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Down payment = -90 USD. Those are the defaults written into the form — move Home price and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Percent is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Home price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Percent keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/salary-inflation', 'name' => 'Salary inflation Calculator'],
            ['path' => '/finance/salary-to-hourly', 'name' => 'Salary to hourly'],
            ['path' => '/finance/salary-with-overtime', 'name' => 'Salary with overtime'],
        ],
        'authors' => [],
    ],
];

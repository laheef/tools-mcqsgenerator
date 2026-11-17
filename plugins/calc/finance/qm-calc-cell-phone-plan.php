<?php

/**
 * Cell phone plan
 * /finance/cell-phone-plan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell phone plan',
    'meta' => ['title' => 'Cell phone plan Calculator — Formula, Units & Example', 'description' => 'Cell phone plan turns contract duration and interest rate into total cost. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Cell phone plan Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'contract_duration',
                            'label' => 'Contract duration',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '24',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'help' => 'Of a savings account you can put money into.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Buying a phone outright',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'phone_price',
                            'label' => 'Phone price',
                            'type' => 'number',
                            'help' => 'The full cost of acquiring the phone, including postage and packaging.',
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
                            'name' => 'monthly_cost',
                            'label' => 'Monthly bill',
                            'type' => 'number',
                            'help' => 'Your monthly phone bill for your SIM\'s contract.',
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
                            'name' => 'total_cost_instantly',
                            'label' => 'Total cost',
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
            'title' => 'On a carrier phone-buying plan',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'contract_monthly_cost',
                            'label' => 'Monthly bill',
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
                            'name' => 'interest_from_investing',
                            'label' => 'Interest from investing',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The total interest that accumulates on your account if you invest the money you would otherwise spend on buying the phone outright. Uses the interest rate provided above.
                            TXT,
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
                            'name' => 'total_cost_carrier',
                            'label' => 'Total cost',
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
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'total_cost_instantly > total_cost_carrier', 'text' => 'You will save {{saving_instant.monetaryValue}} if you choose a carrier phone-buying plan.&nbsp;'],
                                ['when' => 'total_cost_instantly < total_cost_carrier', 'text' => 'You will save {{saving_carrier.monetaryValue}} if you buy the phone outright.&nbsp;'],
                                ['when' => 'total_cost_instantly == total_cost_carrier', 'text' => 'There is no difference between these two options.'],
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
                            'name' => 'saving_instant',
                            'label' => 'Saving instant',
                            'type' => 'presentation',
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
                            'name' => 'saving_carrier',
                            'label' => 'Saving carrier',
                            'type' => 'presentation',
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
            'title' => 'total_cost_instantly = phone_price + monthly_cost * contract_duration*12 ',
            'results' => ['total_cost_instantly' => '12*contract_duration*monthly_cost + phone_price', 'phone_price' => '-12*contract_duration*monthly_cost + total_cost_instantly', 'contract_duration' => '(1/12)*(-phone_price + total_cost_instantly)/monthly_cost', 'monthly_cost' => '(1/12)*(-phone_price + total_cost_instantly)/contract_duration'],
        ],
        [
            'title' => 'interest_from_investing =one_way( savings (phone_price, contract_duration, interest,contract_monthly_cost, monthly_cost))',
            'results' => ['interest_from_investing' => '(savings(phone_price, contract_duration, interest, contract_monthly_cost, monthly_cost))'],
        ],
        [
            'title' => 'total_cost_carrier = one_way( contract_monthly_cost * contract_duration*12 - interest_from_investing)',
            'results' => ['total_cost_carrier' => '(12*contract_duration*contract_monthly_cost - (savings(phone_price, contract_duration, interest, contract_monthly_cost, monthly_cost)))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("savings",function(price,contract_duration,interest,contract_monthly_cost,monthly_costB){var diff=contract_monthly_cost-monthly_costB;if(price/(contract_duration*12)<diff){diff=price/(contract_duration*12)}var A=price;var i=1;while(i<=contract_duration*12){A=(A-diff)*(1+interest/12);i=i+1}if(price/(contract_duration*12)>diff){A=A-(price-contract_duration*12*diff)}return A});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Cell phone plan works out Total cost and Interest from investing from Contract duration, Phone price and Monthly bill. Nothing is looked up on this page: total cost is computed from contract duration and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Total cost is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Cell phone plan calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Cell phone plan: it takes 3 numbers and reports Total cost, Interest from investing and Total cost.</p><p>In the form&#039;s own words, Total cost = 12 × Contract duration × Monthly bill + Phone price.</p><p>The answers are Total cost, Interest from investing and Total cost; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Contract duration</strong> — in months</li><li><strong>Phone price</strong> — in USD. The full cost of acquiring the phone, including postage and packaging.</li><li><strong>Monthly bill</strong> — in USD. Your monthly phone bill for your SIM&#039;s contract.</li></ul><p>What you get back is Total cost in USD, Interest from investing in USD, Total cost in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Contract duration lists 5 options and opens on months. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total cost</strong> = <code>12 × Contract duration × Monthly bill + Phone price</code></li><li><strong>Phone price</strong> = <code>− 12 × Contract duration × Monthly bill + Total cost</code></li><li><strong>Contract duration</strong> = <code>(1 ÷ 12) × ( − Phone price + Total cost) ÷ Monthly bill</code></li><li><strong>Monthly bill</strong> = <code>(1 ÷ 12) × ( − Phone price + Total cost) ÷ Contract duration</code></li><li><strong>Interest from investing</strong> = <code>(savings(Phone price, Contract duration, Interest rate, Monthly bill, Monthly bill))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total cost</strong> = <code>12 × Contract duration × Monthly bill + Phone price</code> — the form to use when Contract duration, Monthly bill and Phone price are the values you have.</li><li><strong>Phone price</strong> = <code>− 12 × Contract duration × Monthly bill + Total cost</code> — the form to use when Contract duration, Monthly bill and Total cost are the values you have.</li><li><strong>Contract duration</strong> = <code>(1 ÷ 12) × ( − Phone price + Total cost) ÷ Monthly bill</code> — the form to use when Phone price, Total cost and Monthly bill are the values you have.</li><li><strong>Monthly bill</strong> = <code>(1 ÷ 12) × ( − Phone price + Total cost) ÷ Contract duration</code> — the form to use when Phone price, Total cost and Contract duration are the values you have.</li><li><strong>Interest from investing</strong> = <code>(savings(Phone price, Contract duration, Interest rate, Monthly bill, Monthly bill))</code> — the form to use when Phone price, Contract duration, Interest rate and Monthly bill are the values you have.</li><li><strong>Total cost</strong> = <code>(12 × Contract duration × Monthly bill − (savings(Phone price, Contract duration, Interest rate, Monthly bill, Monthly bill)))</code> — the form to use when Contract duration, Monthly bill, Phone price and Interest rate are the values you have.</li></ul><p>Any one of Total cost, Phone price and Contract duration can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Contract duration carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Total cost, Interest from investing and Total cost are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Contract duration left as a guess.</strong> Anything typed into Contract duration is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Phone price left as a guess.</strong> Anything typed into Phone price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Contract duration to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Cell phone plan form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Contract duration</strong> is a months quantity: the page opens it in mos and converts anything else you pick before the formula runs. It feeds Total cost, Phone price and Monthly bill. Fill it from a measurement rather than a memory — Contract duration is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Phone price</strong> takes a plain number with no unit attached. The full cost of acquiring the phone, including postage and packaging. It feeds Total cost, Contract duration and Monthly bill. Fill it from a measurement rather than a memory — Phone price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Monthly bill</strong> takes a plain number with no unit attached. Your monthly phone bill for your SIM&#039;s contract. It feeds Total cost, Phone price and Contract duration. Fill it from a measurement rather than a memory — Monthly bill is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Total cost</strong> is a plain number. The value follows from Contract duration, Monthly bill and Phone price. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Interest from investing</strong> is a plain number. The value follows from Phone price, Contract duration, Interest rate and Monthly bill. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total cost</strong> is a plain number. The value follows from Contract duration, Monthly bill, Phone price and Interest rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Cell phone plan actually offers.</p><ul><li><strong>months</strong> — opens in <em>mos</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Contract duration, Phone price and Monthly bill ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Contract duration — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Total cost in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Total cost is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Contract duration, Phone price and Monthly bill are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Contract duration, Phone price and Monthly bill is what you already know and Total cost and Interest from investing is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/cltv">CLTV (customer lifetime value)</a>, <a href="/finance/cobb-douglas-production-function">Cobb-Douglas production function Calculator</a> and <a href="/finance/combined-ratio">Combined ratio</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cell phone plan calculator work out?', 'a' => <<<'TXT'
            Total cost, Interest from investing and Total cost, from Contract duration, Monthly bill and Phone price. The relationship is Total cost = 12 × Contract duration × Monthly bill + Phone price.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Contract duration (months), Phone price (USD), Monthly bill (USD). Enter contract duration, phone price and monthly bill; Total cost is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total cost, Phone price, Contract duration and Monthly bill blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Total cost is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Contract duration blank and the page solves for it, reporting Total cost instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Total cost keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/cltv', 'name' => 'CLTV (customer lifetime value)'],
            ['path' => '/finance/cobb-douglas-production-function', 'name' => 'Cobb-Douglas production function Calculator'],
            ['path' => '/finance/combined-ratio', 'name' => 'Combined ratio'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * Concert Ticket Calculator
 * /everyday-life/tickets
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Concert Ticket Calculator',
    'meta' => ['title' => 'Concert Tickets — Face Value, Fees and the Real Total', 'description' => 'Face value plus a percentage fee plus a facility charge, times the seats: what a concert really costs before the booking fee is added to the booking fee.', 'h1' => 'Concert Ticket Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'face',
                    'label' => 'Face value per ticket',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '80',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fee_pct',
                    'label' => 'Service fee',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '15',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'facility',
                    'label' => 'Facility charge per ticket',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '4.5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'quantity',
                    'label' => 'Tickets',
                    'type' => 'number',
                    'suffix' => 'tickets',
                    'default' => '2',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'service',
                    'label' => 'Service fee per ticket',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'per_ticket',
                    'label' => 'True price per ticket',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'total',
                    'label' => 'Total for the seats',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'fees_pct',
                    'label' => 'Fees as a share',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
            ],
        ],
    ],
    'formula' => ['service' => 'face * fee_pct / 100', 'per_ticket' => 'face + face * fee_pct / 100 + facility', 'total' => '(face + face * fee_pct / 100 + facility) * quantity', 'fees_pct' => '(face * fee_pct / 100 + facility) / face * 100'],
    'article' => [
        'intro' => 'The fees on a ticket, the true price of one, the total for the seats you want and the share of the bill that is fees rather than the performance.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A ticket advertised at 80, with a fifteen per cent service fee and a 4.50 facility charge, is 96.50 by the time the basket opens — 20.6 per cent above the number that made you click.</p><p>Two seats is 193 rather than 160, and the difference is not a rounding error on a night out. The percentage is the figure worth remembering, because it is roughly the same at every venue and it is never in the advertisement.</p><p>The answer is <strong>service fee per ticket and true price per ticket and total for the seats and fees as a share</strong>, worked out from face value per ticket and service fee and facility charge per ticket and tickets. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>service</strong></td><td><code>Face value per ticket × Service fee ÷ 100</code></td></tr><tr><td><strong>per_ticket</strong></td><td><code>Face value per ticket + Face value per ticket × Service fee ÷ 100 + Facility charge per ticket</code></td></tr><tr><td><strong>total</strong></td><td><code>(Face value per ticket + Face value per ticket × Service fee ÷ 100 + Facility charge per ticket) × Tickets</code></td></tr><tr><td><strong>fees_pct</strong></td><td><code>(Face value per ticket × Service fee ÷ 100 + Facility charge per ticket) ÷ Face value per ticket × 100</code></td></tr></tbody></table><p>The percentage of the face value gives the service fee; adding it and the facility charge gives the true price. Times the quantity is the basket, and the share is the fees over the face value.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports service fee per ticket and true price per ticket and total for the seats and fees as a share.</p><ul><li><strong>Face value per ticket</strong> — $.</li><li><strong>Service fee</strong> — %.</li><li><strong>Facility charge per ticket</strong> — $.</li><li><strong>Tickets</strong> — tickets.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Service fee per ticket</strong> — $.</li><li><strong>True price per ticket</strong> — $.</li><li><strong>Total for the seats</strong> — $.</li><li><strong>Fees as a share</strong> — %.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put face value per ticket = 80 $, service fee = 15 %, facility charge per ticket = 4.5 $, tickets = 2 tickets into the form and the panel reads:</p><ul><li><strong>Service fee per ticket</strong> = <code>Face value per ticket × Service fee ÷ 100</code> = <strong>12 $</strong></li><li><strong>True price per ticket</strong> = <code>Face value per ticket + Face value per ticket × Service fee ÷ 100 + Facility charge per ticket</code> = <strong>96.5 $</strong></li><li><strong>Total for the seats</strong> = <code>(Face value per ticket + Face value per ticket × Service fee ÷ 100 + Facility charge per ticket) × Tickets</code> = <strong>193 $</strong></li><li><strong>Fees as a share</strong> = <code>(Face value per ticket × Service fee ÷ 100 + Facility charge per ticket) ÷ Face value per ticket × 100</code> = <strong>20.625 %</strong></li></ul><p>A twenty per cent fee with a six-dollar facility brings a 40-dollar ticket to 54 — a third again, which is where the cheapest seats stop being cheap.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>80 × 15 ÷ 100</code>, which comes to <strong>12 $</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>80 face plus 12 of service fee and 4.50 of facility is 96.50 a ticket. Two seats are 193, and the fees are 20.6 per cent of the face value.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Service fee per ticket</th><th>True price per ticket</th><th>Total for the seats</th><th>Fees as a share</th></tr></thead><tbody><tr><td><strong>Face value per ticket</strong> +10 %</td><td>+10 %</td><td>+9.53 %</td><td>+9.53 %</td><td>−2.48 %</td></tr><tr><td><strong>Service fee</strong> +10 %</td><td>+10 %</td><td>+1.24 %</td><td>+1.24 %</td><td>+7.27 %</td></tr><tr><td><strong>Facility charge per ticket</strong> +10 %</td><td>+0 %</td><td>+0.47 %</td><td>+0.47 %</td><td>+2.73 %</td></tr><tr><td><strong>Tickets</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Tickets</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Face value per ticket</strong> opens at 80 $</li><li><strong>Service fee</strong> opens at 15 %</li><li><strong>Facility charge per ticket</strong> opens at 4.5 $</li><li><strong>Tickets</strong> opens at 2 tickets</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Face value per ticket</th><th>Service fee per ticket</th><th>True price per ticket</th><th>Total for the seats</th><th>Fees as a share</th></tr></thead><tbody><tr><td>40 $</td><td>6</td><td>50.5</td><td>101</td><td>26.25</td></tr><tr><td>80 $</td><td>12</td><td>96.5</td><td>193</td><td>20.625</td></tr><tr><td>160 $</td><td>24</td><td>188.5</td><td>377</td><td>17.812</td></tr><tr><td>400 $</td><td>60</td><td>464.5</td><td>929</td><td>16.125</td></tr><tr><td>800 $</td><td>120</td><td>924.5</td><td>1 849</td><td>15.563</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set face value per ticket = 40, service fee = 20, facility charge per ticket = 6, tickets = 2: <strong>Service fee per ticket</strong> = 8 $, <strong>True price per ticket</strong> = 54 $, <strong>Total for the seats</strong> = 108 $, <strong>Fees as a share</strong> = 35 %. A 40-dollar ticket at a twenty per cent fee and a six-dollar facility is 54: a third above the face value, and 108 for two.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Forgetting the parking and the booking fee.</strong> The facility charge, the delivery fee and the car park are three more lines, and none of them are in the advertised price either.</li><li><strong>Comparing face values across venues.</strong> The same act at two venues can have fees that differ by ten per cent, so the true price is what to compare.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One price structure.</strong> Fees that scale with the number of tickets, or a single transaction charge, need their own run of the page.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need face value per ticket and service fee and facility charge per ticket and tickets. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Service fee per ticket and true price per ticket and total for the seats and fees as a share should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Working out the real cost before a presale.</li></li><li><li>Splitting a group booking fairly, fees and all.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/cost-per-minute">Cost per minute</a> <a href="/everyday-life/grocery">Grocery budget</a> <a href="/everyday-life/price-per-unit">Price per unit</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Face value per ticket</strong> ×10</td><td>12</td><td>120</td><td>ten times larger</td></tr><tr><td><strong>Service fee</strong> ×10</td><td>12</td><td>120</td><td>ten times larger</td></tr><tr><td><strong>Facility charge per ticket</strong> ×10</td><td>12</td><td>12</td><td>unchanged</td></tr><tr><td><strong>Tickets</strong> ×10</td><td>12</td><td>12</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Concert Ticket calculator work out?', 'a' => <<<'TXT'
            It returns service fee per ticket and true price per ticket and total for the seats and fees as a share from face value per ticket and service fee and facility charge per ticket and tickets. The relationship is Face value per ticket × Service fee ÷ 100.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Face value per ticket ($), Service fee (%), Facility charge per ticket ($), Tickets (tickets). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: face value per ticket in $; service fee in %; facility charge per ticket in $; tickets in tickets. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why are fees a percentage of the face value?', 'a' => <<<'TXT'
            Because the seller takes a share of the sale rather than a fixed amount. It is also why the fee looks smaller on a cheap ticket and the facility charge looks larger.
            TXT],
            ['q' => 'Is the facility charge per ticket or per order?', 'a' => 'Per ticket at most venues, per order at some. The field here charges per ticket, so reduce it to the per-ticket share if your venue charges once.'],
            ['q' => 'Can I avoid the fees by buying at the box office?', 'a' => 'Sometimes the facility charge disappears and the service fee does not, which is worth knowing before queueing for an hour.'],
        ],
        'related' => [
            ['path' => '/everyday-life/cost-per-minute', 'name' => 'Cost per minute'],
            ['path' => '/everyday-life/grocery', 'name' => 'Grocery budget'],
            ['path' => '/everyday-life/price-per-unit', 'name' => 'Price per unit'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

<?php

/**
 * Compound interest rate
 * /finance/compound-interest-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Compound interest rate',
    'meta' => ['title' => 'Compound interest rate: Formula, Steps & Results', 'description' => 'Compound interest rate works out final balance and surplus from initial balance, compounding frequency and term. The formula is printed in the form\'s own words.', 'h1' => 'Compound interest rate Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Initial_balance',
                            'label' => 'Initial balance',
                            'type' => 'number',
                            'help' => 'Present Value (PV).',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '10000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Final_balance',
                            'label' => 'Final balance',
                            'type' => 'number',
                            'help' => 'Future Value (FV), equal to the sum of the initial balance and the surplus.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '18000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Surplus',
                            'label' => 'Surplus',
                            'type' => 'number',
                            'help' => 'Gain - the difference between final balance and initial balance.',
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
                            'name' => 'm',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => [
                                'yearly (1/Yr)' => '1',
                                'semi-annually (2/Yr)' => '2',
                                'quarterly (4/Yr)' => '4',
                                'bi-monthly (6/Yr)' => '6',
                                'monthly (12/Yr)' => '12',
                                'bi-weekly (average)' => '26',
                                'bi-weekly (26/Yr)' => '26',
                                'weekly (average)' => '52',
                                'weekly (52/Yr)' => '52',
                                'daily (average)' => '365.242',
                                'daily (360/Yr)' => '360',
                                'daily (365/Yr)' => '365',
                                'continuous' => '0',
                            ],
                            'dataset' => 'Compound frequency',
                            'control' => 'DROPDOWN',
                            'help' => 'Here you can set how often the interest is added to (capitalized on) your balance (principal).',
                            'default' => 'monthly (12/Yr)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 'Term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Interest_rate',
                            'label' => 'Compound interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.00001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden Parameters DO NOT TRANSLATE',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r1',
                            'label' => 'R1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r2',
                            'label' => 'R2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r3',
                            'label' => 'Annual Effective Interest Rate (AER)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.00001'],
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
                            'name' => 'm_2',
                            'label' => 'M 2',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Final_balance = Initial_balance * (1 + r1 / m) ^ (m * t)',
            'results' => ['t' => 'log(Final_balance/Initial_balance)/(m*log((m + r1)/m))', 'r1' => 'm*(pow(Final_balance/Initial_balance, 1/(m*t)) - 1)', 'Final_balance' => 'Initial_balance*pow((m + r1)/m, m*t)', 'Initial_balance' => 'Final_balance*pow((m + r1)/m, -m*t)'],
        ],
        [
            'title' => 'Final_balance = Initial_balance * 2.7182818284590452353602874713527 ^ (r2 * t)',
            'results' => ['r2' => 'log(Initial_balance/Final_balance)/(t*log(10000000000000000000000000000000/27182818284590452353602874713527))', 'Final_balance' => 'pow(27182818284590452353602874713527/10000000000000000000000000000000, r2*t)*Initial_balance', 't' => 'log(Initial_balance/Final_balance)/(r2*log(10000000000000000000000000000000/27182818284590452353602874713527))', 'Initial_balance' => 'pow(27182818284590452353602874713527/10000000000000000000000000000000, -r2*t)*Final_balance'],
        ],
        [
            'title' => 'Surplus = Final_balance - Initial_balance',
            'results' => ['Surplus' => 'Final_balance - Initial_balance', 'Final_balance' => 'Initial_balance + Surplus', 'Initial_balance' => 'Final_balance - Surplus'],
        ],
        [
            'title' => 'Final_balance = Initial_balance * (1 + r3 / 1) ^ (1 * t)',
            'results' => ['r3' => 'pow(Final_balance/Initial_balance, 1/t) - 1', 'Final_balance' => 'Initial_balance*pow(r3 + 1, t)', 't' => 'log(Final_balance/Initial_balance)/log(r3 + 1)', 'Initial_balance' => 'Final_balance*pow(r3 + 1, -t)'],
        ],
        [
            'title' => 'Interest_rate = if_else(m_2>0, r1, r2)',
            'results' => ['Interest_rate' => <<<'TXT'
            (((((abs(m))) > 0) ? (
               r1
            )
            : (
               r2
            )))
            TXT],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Compound interest rate works out Final balance and Surplus from Initial balance, Compounding frequency and Term. The arithmetic is the whole method: final balance is worked out from initial balance by one formula, applied once. Final balance comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Compound interest rate calculator works', 'html' => <<<'TXT'
            <p>Compound interest rate answers one question from 3 numbers, and the answer is Final balance, Surplus and Compound interest rate.</p><p>The relationship it solves reads Final balance = Initial balance × ((Compounding frequency + R1) ÷ Compounding frequency)^(Compounding frequency × Term).</p><p>What comes back is Final balance, Surplus, Compound interest rate and R1 — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Initial balance</strong> — in USD. Present Value (PV).</li><li><strong>Compounding frequency</strong> — a plain number, no unit. Here you can set how often the interest is added to (capitalized on) your balance (principal).</li><li><strong>Term</strong> — in years / months</li></ul><p>The answers come back as Final balance in USD, Surplus in USD, Compound interest rate in percent, R1, R2, Annual Effective Interest Rate (AER). Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Compound interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Final balance</strong> = <code>Initial balance × ((Compounding frequency + R1) ÷ Compounding frequency)^(Compounding frequency × Term)</code></li><li><strong>Term</strong> = <code>ln(Final balance ÷ Initial balance) ÷ (Compounding frequency × ln((Compounding frequency + R1) ÷ Compounding frequency))</code></li><li><strong>R1</strong> = <code>Compounding frequency × ((Final balance ÷ Initial balance)^(1 ÷ (Compounding frequency × Term)) − 1)</code></li><li><strong>Initial balance</strong> = <code>Final balance × ((Compounding frequency + R1) ÷ Compounding frequency)^(− Compounding frequency × Term)</code></li><li><strong>R2</strong> = <code>ln(Initial balance ÷ Final balance) ÷ (Term × ln(10000000000000000000000000000000 ÷ 27182818284590452353602874713527))</code></li><li><strong>Surplus</strong> = <code>Final balance − Initial balance</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Final balance</strong> = <code>Initial balance × ((Compounding frequency + R1) ÷ Compounding frequency)^(Compounding frequency × Term)</code> — the form to use when Initial balance, Compounding frequency, R1 and Term are the values you have.</li><li><strong>Term</strong> = <code>ln(Final balance ÷ Initial balance) ÷ (Compounding frequency × ln((Compounding frequency + R1) ÷ Compounding frequency))</code> — the form to use when Final balance, Initial balance, Compounding frequency and R1 are the values you have.</li><li><strong>R1</strong> = <code>Compounding frequency × ((Final balance ÷ Initial balance)^(1 ÷ (Compounding frequency × Term)) − 1)</code> — the form to use when Compounding frequency, Final balance, Initial balance and Term are the values you have.</li><li><strong>Initial balance</strong> = <code>Final balance × ((Compounding frequency + R1) ÷ Compounding frequency)^(− Compounding frequency × Term)</code> — the form to use when Final balance, Compounding frequency, R1 and Term are the values you have.</li><li><strong>Final balance</strong> = <code>(27182818284590452353602874713527 ÷ 10000000000000000000000000000000)^(R2 × Term) × Initial balance</code> — the form to use when R2, Term and Initial balance are the values you have.</li><li><strong>R2</strong> = <code>ln(Initial balance ÷ Final balance) ÷ (Term × ln(10000000000000000000000000000000 ÷ 27182818284590452353602874713527))</code> — the form to use when Initial balance, Final balance and Term are the values you have.</li><li><strong>Term</strong> = <code>ln(Initial balance ÷ Final balance) ÷ (R2 × ln(10000000000000000000000000000000 ÷ 27182818284590452353602874713527))</code> — the form to use when Initial balance, Final balance and R2 are the values you have.</li><li><strong>Initial balance</strong> = <code>(27182818284590452353602874713527 ÷ 10000000000000000000000000000000)^(− R2 × Term) × Final balance</code> — the form to use when R2, Term and Final balance are the values you have.</li></ul><p>Any one of Final balance, Term and R1 can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Term carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Final balance, Surplus and Compound interest rate are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Initial balance left as a guess.</strong> Anything typed into Initial balance is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Compounding frequency left as a guess.</strong> Anything typed into Compounding frequency is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Initial balance is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Initial balance</strong> takes a plain number with no unit attached. Present Value (PV). Change it and Term, R1 and Final balance changes with it. Have it to hand before you start: Initial balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Compounding frequency</strong> takes a plain number with no unit attached. Here you can set how often the interest is added to (capitalized on) your balance (principal). Change it and Term, R1 and Final balance changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Compounding frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. Change it and R1, Final balance and Initial balance changes with it. Have it to hand before you start: Term is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Final balance</strong> is a plain number. It is computed from Initial balance, Compounding frequency, R1 and Term, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Surplus</strong> is a plain number. It is computed from Final balance and Initial balance, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Compound interest rate</strong> is a percent figure. It is computed from Compounding frequency, R1 and R2, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>R1</strong> is a plain number. It is computed from Compounding frequency, Final balance, Initial balance and Term, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>R2</strong> is a plain number. It is computed from Initial balance, Final balance and Term, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Annual Effective Interest Rate (AER)</strong> is a plain number. It is computed from Final balance, Initial balance and Term, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Final balance is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years / months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Initial balance, Compounding frequency and Term are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Initial balance, Compounding frequency and Term is what you already know and Final balance and Surplus is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/currency-forward">Currency forward Calculator</a>, <a href="/finance/current-ratio">Current ratio Calculator</a> and <a href="/finance/cac">Customer acquisition cost (CAC) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Compound interest rate calculator work out?', 'a' => <<<'TXT'
            Final balance, Surplus, Compound interest rate and R1, from Initial balance, Compounding frequency, R1 and Term. The relationship is Final balance = Initial balance × ((Compounding frequency + R1) ÷ Compounding frequency)^(Compounding frequency × Term).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial balance (USD), Compounding frequency, Term (years / months). Fill initial balance, compounding frequency and term and leave Final balance empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Final balance, Term, R1 and Initial balance blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Final balance is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Initial balance left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Final balance at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/currency-forward', 'name' => 'Currency forward Calculator'],
            ['path' => '/finance/current-ratio', 'name' => 'Current ratio Calculator'],
            ['path' => '/finance/cac', 'name' => 'Customer acquisition cost (CAC) Calculator'],
        ],
        'authors' => [],
    ],
];

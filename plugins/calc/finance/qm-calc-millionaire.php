<?php

/**
 * Millionaire
 * /finance/millionaire
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Millionaire',
    'meta' => ['title' => 'Millionaire Calculator: Formula, Steps & Examples', 'description' => 'Millionaire turns initial savings, annual interest rate and compound frequency into i would like to save.. and future worth of $1 million in today\'s dollars.', 'h1' => 'Millionaire Calculator', 'updated' => '2026-09-02'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'targetSavings',
                            'label' => 'I would like to save..',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '1000000', 'when' => null],
                                ['value' => '1000000', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Main specifications',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initialDeposit',
                            'label' => 'Initial savings',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '20000', 'when' => null],
                                ['value' => '20000', 'when' => 'userUsesImperialUnits()'],
                            ],
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
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'comp_freq',
                            'label' => 'Compound frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Weekly' => '52.1775',
                                'Bi-weekly' => '26.08875',
                                'Daily' => '365.242',
                            ],
                            'dataset' => 'compound frequency',
                            'control' => 'DROPDOWN',
                            'help' => 'This should also be the frequency of your additional deposits.',
                            'defaults' => [
                                ['value' => 'Monthly', 'when' => null],
                                ['value' => 'Monthly', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'periodicDeposits',
                            'label' => 'Additional deposits',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '1000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'recur_dep',
                            'label' => 'Additional deposits made at the...',
                            'type' => 'select',
                            'options' => ['end of period' => '0', 'beginning of period' => '1'],
                            'dataset' => 'when',
                            'default' => 'end of period',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time',
                            'label' => 'Duration to reach goal',
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
                        ['type' => 'note', 'text' => 'You can also check out our savings calculator for a more advanced savings calculator with awesome charts and extra features! '],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Effect of inflation rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inflationRate',
                            'label' => 'Inflation rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'millionFV',
                            'label' => 'Future worth of $1 million in today\'s dollars',
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
                            'name' => 'comp_freq_copy',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'recur_dep_copy',
                            'label' => '',
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
            'title' => <<<'TXT'
            targetSavings = initialDeposit * (1 + (interest_rate/100) / comp_freq) ^ (comp_freq * time) + periodicDeposits * (((1 + (interest_rate/100) / comp_freq) ^ (comp_freq * time) - 1)  / ((interest_rate/100)/comp_freq)) * (1 + recur_dep * (interest_rate/100)/comp_freq)
            TXT,
            'results' => [
                'recur_dep' => <<<'TXT'
                (-100*comp_freq*periodicDeposits*pow(1 + (1/100)*interest_rate/comp_freq, comp_freq*time) + 100*comp_freq*periodicDeposits - initialDeposit*interest_rate*pow(1 + (1/100)*interest_rate/comp_freq, comp_freq*time) + interest_rate*targetSavings)/(interest_rate*periodicDeposits*(pow(1 + (1/100)*interest_rate/comp_freq, comp_freq*time) - 1))
                TXT,
                'time' => <<<'TXT'
                log((100*comp_freq*periodicDeposits + interest_rate*periodicDeposits*recur_dep + interest_rate*targetSavings)/(100*comp_freq*periodicDeposits + initialDeposit*interest_rate + interest_rate*periodicDeposits*recur_dep))/(comp_freq*log((1/100)*(100*comp_freq + interest_rate)/comp_freq))
                TXT,
                'targetSavings' => <<<'TXT'
                100*comp_freq*periodicDeposits*pow(1 + (1/100)*interest_rate/comp_freq, comp_freq*time)/interest_rate - 100*comp_freq*periodicDeposits/interest_rate + initialDeposit*pow(1 + (1/100)*interest_rate/comp_freq, comp_freq*time) + periodicDeposits*recur_dep*pow(1 + (1/100)*interest_rate/comp_freq, comp_freq*time) - periodicDeposits*recur_dep
                TXT,
                'periodicDeposits' => <<<'TXT'
                interest_rate*(-initialDeposit*pow(1 + (1/100)*interest_rate/comp_freq, comp_freq*time) + targetSavings)/(100*comp_freq*pow(1 + (1/100)*interest_rate/comp_freq, comp_freq*time) - 100*comp_freq + interest_rate*recur_dep*pow(1 + (1/100)*interest_rate/comp_freq, comp_freq*time) - interest_rate*recur_dep)
                TXT,
                'initialDeposit' => <<<'TXT'
                -100*comp_freq*periodicDeposits/interest_rate + 100*comp_freq*periodicDeposits*pow(1 + (1/100)*interest_rate/comp_freq, -comp_freq*time)/interest_rate - periodicDeposits*recur_dep + periodicDeposits*recur_dep*pow(1 + (1/100)*interest_rate/comp_freq, -comp_freq*time) + targetSavings*pow(1 + (1/100)*interest_rate/comp_freq, -comp_freq*time)
                TXT,
            ],
        ],
        [
            'title' => 'millionFV = 1000000 * (1 - (inflationRate / 100)) ^ time ',
            'results' => ['millionFV' => 'pow(10, 6 - 2*time)*pow(100 - inflationRate, time)', 'time' => '-log(1000000/millionFV)/log(1 - 1/100*inflationRate)', 'inflationRate' => '100 - pow((1/1000000)*pow(100, time)*millionFV, 1/time)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Millionaire turns Initial savings, Annual interest rate and Compound frequency into I would like to save… and Inflation rate. It is a single relationship that reads i would like to save… out of initial savings, not a table of canned results keyed by them. Units for I would like to save… default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Millionaire calculator works', 'html' => <<<'TXT'
            <p>The Millionaire calculator applies one relationship to 6 numbers and reports I would like to save…, Inflation rate and Future worth of $1 million in today&#039;s dollars.</p><p>What comes back is I would like to save…, Inflation rate and Future worth of $1 million in today&#039;s dollars — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs.</p><ul><li><strong>Initial savings</strong> — in USD</li><li><strong>Annual interest rate</strong> — in %</li><li><strong>Compound frequency</strong> — a plain number, no unit. This should also be the frequency of your additional deposits.</li><li><strong>Additional deposits</strong> — in USD</li><li><strong>Additional deposits made at the…</strong> — a plain number, no unit</li><li><strong>Duration to reach goal</strong> — in years / months</li></ul><p>The result boxes are I would like to save… in USD, Inflation rate in %, Future worth of $1 million in today&#039;s dollars in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Annual interest rate = 4 % and Compound frequency = 12 — through the same formula and the panel reports <strong>Additional deposits made at the…</strong> = 0.</p><ul><li><strong>Additional deposits made at the…</strong> = 0</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Additional deposits made at the...</strong> = 0 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Duration to reach goal offers 9 units and opens on years / months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Future worth of $1 million in today&#039;s dollars</strong> = <code>(10)^(6 − 2 × Duration to reach goal) × (100 − Inflation rate)^(Duration to reach goal)</code></li><li><strong>Duration to reach goal</strong> = <code>− ln(1000000 ÷ Future worth of $1 million in today&#039;s dollars) ÷ ln(1 − 1 ÷ 100 × Inflation rate)</code></li><li><strong>Inflation rate</strong> = <code>100 − ((1 ÷ 1000000) × (100)^(Duration to reach goal) × Future worth of $1 million in today&#039;s dollars)^(1 ÷ Duration to reach goal)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Future worth of $1 million in today&#039;s dollars</strong> = <code>(10)^(6 − 2 × Duration to reach goal) × (100 − Inflation rate)^(Duration to reach goal)</code> — the form to use when Duration to reach goal and Inflation rate are the values you have.</li><li><strong>Duration to reach goal</strong> = <code>− ln(1000000 ÷ Future worth of $1 million in today&#039;s dollars) ÷ ln(1 − 1 ÷ 100 × Inflation rate)</code> — the form to use when Future worth of $1 million in today&#039;s dollars and Inflation rate are the values you have.</li><li><strong>Inflation rate</strong> = <code>100 − ((1 ÷ 1000000) × (100)^(Duration to reach goal) × Future worth of $1 million in today&#039;s dollars)^(1 ÷ Duration to reach goal)</code> — the form to use when Duration to reach goal and Future worth of $1 million in today&#039;s dollars are the values you have.</li></ul><p>Any one of I would like to save…, Additional deposits made at the… and Duration to reach goal can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Annual interest rate from 4 to 8, leaving every other box alone. The panel moves from <strong>Additional deposits made at the...</strong> 0 to <strong>Additional deposits made at the...</strong> 0.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Duration to reach goal is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with I would like to save…, Inflation rate and Future worth of $1 million in today&#039;s dollars are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Initial savings left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Initial savings is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Annual interest rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Annual interest rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Initial savings to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Initial savings</strong> takes a plain number with no unit attached. It feeds Additional deposits made at the…, Duration to reach goal and I would like to save…. Have it to hand before you start: Initial savings is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Annual interest rate</strong> is measured in %. It feeds Additional deposits made at the…, Duration to reach goal and I would like to save…. Have it to hand before you start: Annual interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Compound frequency</strong> takes a plain number with no unit attached. This should also be the frequency of your additional deposits. It feeds Additional deposits made at the…, Duration to reach goal and I would like to save…. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Compound frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Additional deposits</strong> takes a plain number with no unit attached. It feeds Additional deposits made at the…, Duration to reach goal and I would like to save…. Have it to hand before you start: Additional deposits is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Additional deposits made at the…</strong> takes a plain number with no unit attached. It feeds Duration to reach goal, I would like to save… and Additional deposits. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Additional deposits made at the… is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Duration to reach goal</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. It feeds Additional deposits made at the…, I would like to save… and Additional deposits. Have it to hand before you start: Duration to reach goal is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>I would like to save…</strong> is a plain number. The value follows from Compound frequency, Additional deposits, Annual interest rate and Duration to reach goal. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Inflation rate</strong> is a plain number. The value follows from Duration to reach goal and Future worth of $1 million in today's dollars. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Future worth of $1 million in today&#039;s dollars</strong> is a plain number. The value follows from Duration to reach goal and Inflation rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Additional deposits made at the…</th></tr></thead><tbody><tr><td><strong>Annual interest rate</strong> +10%</td><td>—</td></tr><tr><td><strong>Compound frequency</strong> +10%</td><td>—</td></tr></tbody></table><p>Ranked by leverage, Annual interest rate sits at the top — a ten per cent error in that box shows up as roughly 0 per cent in the answer. By contrast, Annual interest rate and Compound frequency barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> I would like to save… is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover years / months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Initial savings, Annual interest rate and Compound frequency and the number you are missing is I would like to save… and Inflation rate.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/future-salary">Future salary Calculator</a>, <a href="/finance/annuity-future-value">Future value of annuity</a> and <a href="/finance/future-value">Future value</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Millionaire calculator work out?', 'a' => <<<'TXT'
            I would like to save…, Inflation rate and Future worth of $1 million in today's dollars, from Compound frequency, Additional deposits, Annual interest rate and Duration to reach goal.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial savings (USD), Annual interest rate (%), Compound frequency, Additional deposits (USD), Additional deposits made at the…. Enter initial savings, annual interest rate and compound frequency; I would like to save.. is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of I would like to save…, Additional deposits made at the…, Duration to reach goal and Additional deposits blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Additional deposits made at the… = 0. The figures come from Initial savings as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally I would like to save.. is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Initial savings left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. I would like to save.. keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/future-salary', 'name' => 'Future salary Calculator'],
            ['path' => '/finance/annuity-future-value', 'name' => 'Future value of annuity'],
            ['path' => '/finance/future-value', 'name' => 'Future value'],
        ],
        'authors' => [],
    ],
];

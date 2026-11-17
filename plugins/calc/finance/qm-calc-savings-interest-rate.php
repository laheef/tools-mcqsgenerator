<?php

/**
 * Savings interest rate
 * /finance/savings-interest-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Savings interest rate',
    'meta' => ['title' => 'Savings interest rate: Formula, Steps & Results', 'description' => 'Savings interest rate turns your savings goal and initial saving balance into last day of saving. Every box can be solved for, not only the one in the title.', 'h1' => 'Savings interest rate Calculator', 'updated' => '2026-09-02'],
    'sections' => [
        [
            'title' => 'Main specifications',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FinBal',
                            'label' => 'Your savings goal',
                            'type' => 'number',
                            'help' => 'Set here your desired final savings or amount of money received.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '100000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InDep',
                            'label' => 'Initial saving balance',
                            'type' => 'number',
                            'help' => 'Please provide any money you\'ve already saved.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 'Length of your savings',
                            'type' => 'number',
                            'help' => 'How long would you like to save money for?',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CompFreq',
                            'label' => 'Compounding method',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '3',
                                'Monthly' => '4',
                                'Weekly' => '5',
                                'Daily' => '6',
                                'Continuous' => '7',
                            ],
                            'dataset' => 'interest_freq',
                            'control' => 'DROPDOWN',
                            'help' => 'It is the frequency of adding interest to the principal balance on your savings account.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Additional deposit',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PerPay',
                            'label' => 'How much?',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '100',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'RecFreq',
                            'label' => 'How often?',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '3',
                                'Monthly' => '4',
                                'Weekly' => '5',
                                'Daily' => '6',
                            ],
                            'dataset' => 'add_deposit_freq',
                            'control' => 'DROPDOWN',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Type',
                            'label' => 'When?',
                            'type' => 'select',
                            'options' => ['Beginning of period' => '1', 'End of period' => '0'],
                            'dataset' => 'when_deposit_added',
                            'default' => 'End of period',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'The lowest savings interest rate you need to obtain to reach your savings goal is {{rate.value}}%.'],
                                ['when' => 'PerPay > 0', 'text' => 'The total money deposited is {{TotDep.monetaryValue}}.'],
                                ['when' => 'PerPay < 0', 'text' => 'The total money withdrawn is {{TotDep_withdrawn.monetaryValue}}.'],
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
                            'name' => 'Infl',
                            'label' => 'Inflation rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'first_day', 'label' => 'Schedule starts from...', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'StartDate', 'label' => 'First day of saving', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'EndDate', 'label' => 'Last day of saving', 'type' => 'date', 'help' => 'How long would you like to save money for?'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'm',
                            'label' => 'M',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q',
                            'label' => 'Q',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rate',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TotDep',
                            'label' => '',
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
                            'name' => 'TotDep_withdrawn',
                            'label' => '',
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
            'title' => 'EndDate = StartDate + t',
            'results' => ['EndDate' => 'StartDate + t', 'StartDate' => 'EndDate - t', 't' => 'EndDate - StartDate'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("InterestRate",function(q,FinBal,Infl,InDep,t,PerPay,m,Type,mode){var ex=mathjs.e;var periods=0;periods=q*t;var eq_p=0;var maxIter=50000;var minPrec=1e-7;var oldI;var newI=0.05;var iteration=0;do{oldI=newI;var dividend=InDep*mathjs.pow(newI+1,periods)+PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*Type)/newI-FinBal;var divisor=InDep*periods*mathjs.pow(newI+1,periods-1)+((PerPay*periods*mathjs.pow(newI+1,periods-1)*(1+newI*Type)+PerPay*(mathjs.pow(newI+1,periods)-1))*newI-PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*Type))/mathjs.pow(newI,2);newI=newI-dividend/divisor;++iteration}while(mathjs.abs(oldI-newI)>minPrec&&iteration<=maxIter);eq_p=newI;var oldR;var newR=eq_p;var iterationR=0;do{oldR=newR;if(m===0){var dividendR=mathjs.pow(ex,newR/q)-1-eq_p;var divisorR=mathjs.pow(ex,newR/q)/q;newR=newR-dividendR/divisorR}else{var dividendR2=Math.pow(1+newR/m,m/q)-1-eq_p;var divisorR2=Math.pow(1+newR/m,m/q-1)/q;newR=newR-dividendR2/divisorR2}++iterationR}while(mathjs.abs(oldR-newR)>minPrec&&iterationR<=maxIter);var eq_p2=newR;eq_p=eq_p2/q;var r=eq_p*q*100;var TotDep=periods*PerPay;switch(mode){case 1:return r;case 2:return TotDep}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Savings interest rate works out M and Q from Your savings goal, Initial saving balance and Length of your savings. It is a single relationship that reads m out of your savings goal, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Savings interest rate calculator works', 'html' => <<<'TXT'
            <p>The Savings interest rate calculator applies one relationship to 11 numbers and reports M and Q.</p><p>Written with the labels from the form, Last day of saving = First day of saving + Length of your savings.</p><p>The result panel carries M and Q, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 11 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Your savings goal</strong> — in USD. Set here your desired final savings or amount of money received.</li><li><strong>Initial saving balance</strong> — in USD. Please provide any money you&#039;ve already saved.</li><li><strong>Length of your savings</strong> — in years. How long would you like to save money for?</li><li><strong>Compounding method</strong> — a plain number, no unit. It is the frequency of adding interest to the principal balance on your savings account.</li><li><strong>How much?</strong> — in USD</li><li><strong>How often?</strong> — a plain number, no unit</li><li><strong>When?</strong> — a plain number, no unit</li><li><strong>Inflation rate</strong> — in percent</li><li><strong>Schedule starts from…</strong> — a plain number, no unit, entered as a date</li><li><strong>First day of saving</strong> — a plain number, no unit, entered as a date</li><li><strong>Last day of saving</strong> — a plain number, no unit, entered as a date. How long would you like to save money for?</li></ul><p>What you get back is M, Q, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Your savings goal = 100000 USD, Initial saving balance = 4 USD, Compounding method = 4, How much? = 100 USD, How often? = 4, When? = 0, Inflation rate = 6 perc, Schedule starts from… = Sun 1 March 2026, First day of saving = Sun 1 March 2026 and Last day of saving = Sun 1 March 2026; the answers are <strong>Length of your savings</strong> = 0 yrs.</p><ul><li><strong>Length of your savings</strong> = 0 yrs</li></ul><p>The line behind those figures is <strong>Last day of saving</strong> = <code>First day of saving + Length of your savings</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Length of your savings</strong> = 0. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Length of your savings lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Last day of saving</strong> = <code>First day of saving + Length of your savings</code></li><li><strong>First day of saving</strong> = <code>Last day of saving − Length of your savings</code></li><li><strong>Length of your savings</strong> = <code>Last day of saving − First day of saving</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Last day of saving</strong> = <code>First day of saving + Length of your savings</code> — the form to use when First day of saving and Length of your savings are the values you have.</li><li><strong>First day of saving</strong> = <code>Last day of saving − Length of your savings</code> — the form to use when Last day of saving and Length of your savings are the values you have.</li><li><strong>Length of your savings</strong> = <code>Last day of saving − First day of saving</code> — the form to use when Last day of saving and First day of saving are the values you have.</li></ul><p>Any one of Last day of saving, First day of saving and Length of your savings can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Your savings goal from 100000 to 200000, leaving every other box alone. The panel moves from <strong>Length of your savings</strong> 0 yrs to <strong>Length of your savings</strong> 0 yrs.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Length of your savings and Inflation rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> M and Q are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Your savings goal left as a guess.</strong> Anything typed into Your savings goal is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Initial saving balance left as a guess.</strong> Anything typed into Initial saving balance is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Your savings goal and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Your savings goal</strong> takes a plain number with no unit attached. Set here your desired final savings or amount of money received. Have it to hand before you start: Your savings goal is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Initial saving balance</strong> takes a plain number with no unit attached. Please provide any money you&#039;ve already saved. Have it to hand before you start: Initial saving balance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Length of your savings</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. How long would you like to save money for?. It feeds Last day of saving and First day of saving. Have it to hand before you start: Length of your savings is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Compounding method</strong> takes a plain number with no unit attached. It is the frequency of adding interest to the principal balance on your savings account. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Compounding method is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>How much?</strong> takes a plain number with no unit attached. Have it to hand before you start: How much? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>How often?</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: How often? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>When?</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: When? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Inflation rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Have it to hand before you start: Inflation rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Schedule starts from…</strong> takes a plain number with no unit attached. Have it to hand before you start: Schedule starts from… is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>First day of saving</strong> takes a plain number with no unit attached. It feeds Last day of saving and Length of your savings. Have it to hand before you start: First day of saving is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Last day of saving</strong> takes a plain number with no unit attached. How long would you like to save money for?. It feeds First day of saving and Length of your savings. Have it to hand before you start: Last day of saving is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>M</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Q</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind M is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are years and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Your savings goal, Initial saving balance and Length of your savings are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Your savings goal, Initial saving balance and Length of your savings measured, M and Q wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/real-interest-rate">Real interest rate Calculator</a>, <a href="/finance/real-rate-of-return">Real rate of return Calculator</a> and <a href="/finance/receivables-turnover">Receivables turnover Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Savings interest rate calculator work out?', 'a' => 'M and Q, from First day of saving and Length of your savings. The relationship is Last day of saving = First day of saving + Length of your savings.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Your savings goal (USD), Initial saving balance (USD), Length of your savings (years), Compounding method, How much? (USD). Enter your savings goal, initial saving balance and length of your savings; M is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Last day of saving, First day of saving and Length of your savings blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Length of your savings = 0 yrs. That comes from the page\'s own defaults, entered in Your savings goal; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            M is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Your savings goal left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of M keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/real-interest-rate', 'name' => 'Real interest rate Calculator'],
            ['path' => '/finance/real-rate-of-return', 'name' => 'Real rate of return Calculator'],
            ['path' => '/finance/receivables-turnover', 'name' => 'Receivables turnover Calculator'],
        ],
        'authors' => [],
    ],
];

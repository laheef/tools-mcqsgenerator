<?php

/**
 * Rate of return
 * /finance/rate-of-return
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rate of return',
    'meta' => ['title' => 'Rate of return Calculator — Formula & Results', 'description' => 'Rate of return works out the missing figure from initial investment, final amount received, investment length, compounding method and deposit or withdrawal.', 'h1' => 'Rate of return Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => 'Main specifications',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InDep',
                            'label' => 'Initial investment',
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
                            'name' => 'FinBal',
                            'label' => 'Final amount received',
                            'type' => 'number',
                            'help' => 'The future value of the investment.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '5000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'term_t',
                            'label' => 'Investment length',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
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
                            'dataset' => 'Compounding',
                            'control' => 'DROPDOWN',
                            'help' => <<<'TXT'
                            This is the frequency the interest is added to the principal balance of the investment, or, in other words, how often the earned return or interest is reinvested.&nbsp;
                            TXT,
                            'default' => 'Monthly',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Interim periodic cash flows',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PerPay',
                            'label' => 'Deposit or withdrawal',
                            'type' => 'number',
                            'help' => 'Set a negative value in case of regular withdrawal.',
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
                            'name' => 'RecFreq',
                            'label' => 'Cash flow frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '3',
                                'Monthly' => '4',
                                'Weekly' => '5',
                                'Daily' => '6',
                            ],
                            'dataset' => 'cash flow freq',
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
                            'label' => 'Timing of periodic payment',
                            'type' => 'select',
                            'options' => ['Beginning of period' => '1', 'End of period' => '0'],
                            'dataset' => 'timing of payment',
                            'control' => 'DROPDOWN',
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
                                ['when' => null, 'text' => 'The rate of return is {{rate_of_return.value}}.'],
                                ['when' => 'InDep == FinBal and PerPay == 0', 'text' => 'Since the initial investment and the final amount received are equal, the rate of return is zero.&nbsp;'],
                                ['when' => 'PerPay > 0', 'text' => 'The total deposit is {{total_deposit.monetaryValue}}.'],
                                ['when' => 'PerPay < 0', 'text' => 'The total withdrawal is {{total_withdrawal.monetaryValue}}.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'The initial investment and the periodic cash flow cannot both be zero.'],
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
                            'name' => 'nan_msg',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['not possible to calculate with the given parameters.' => '1'],
                            'dataset' => 'error string',
                            'control' => 'DROPDOWN',
                            'default' => 'not possible to calculate with the given parameters.',
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
                            'name' => 'periods',
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
                            'name' => 'total_deposit',
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
                            'name' => 'total_withdrawal',
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
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";omni.onResult(["InDep","FinBal","m","q","term_t","Type","PerPay"],function(ctx,_ref){var InDep=_ref.InDep,FinBal=_ref.FinBal,m=_ref.m,q=_ref.q,term_t=_ref.term_t,Type=_ref.Type,PerPay=_ref.PerPay;var periods=q*term_t;var eq_p=0;var maxIter=50000;var minPrec=1e-7;var ex=Math.exp(1);var oldI;var newI=0.1;var iteration=0;do{oldI=newI;var dividend=InDep*mathjs.pow(newI+1,periods)+PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*Type)/newI-FinBal;var divisor=InDep*periods*mathjs.pow(newI+1,periods-1)+((PerPay*periods*mathjs.pow(newI+1,periods-1)*(1+newI*Type)+PerPay*(mathjs.pow(newI+1,periods)-1))*newI-PerPay*(mathjs.pow(newI+1,periods)-1)*(1+newI*Type))/mathjs.pow(newI,2);newI=newI-dividend/divisor;++iteration}while(mathjs.abs(oldI-newI)>minPrec&&iteration<=maxIter);eq_p=newI;var oldR;var newR=eq_p;var iterationR=0;do{oldR=newR;if(m===0){var dividendR=mathjs.pow(ex,newR/q)-1-eq_p;var divisorR=mathjs.pow(ex,newR/q)/q;newR=newR-dividendR/divisorR}else{var dividendR2=Math.pow(1+newR/m,m/q)-1-eq_p;var divisorR2=Math.pow(1+newR/m,m/q-1)/q;newR=newR-dividendR2/divisorR2}++iterationR}while(mathjs.abs(oldR-newR)>minPrec&&iterationR<=maxIter);var eq_p2=newR;eq_p=eq_p2/q;var r=eq_p*q*100;if(isNaN(r)){ctx.exportValue("rate_of_return",ctx.getRawInput("nan_msg"))}else{ctx.exportValue("rate_of_return","".concat(mathjs.round(r,3),"%"))}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Rate of return works out M and Q from Initial investment, Final amount received and Investment length. The arithmetic is the whole method: m is worked out from initial investment by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Rate of return calculator works', 'html' => <<<'TXT'
            <p>The Rate of return calculator applies one relationship to 7 numbers and reports M and Q.</p><p>The answers are M and Q; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 7 boxes and the page has everything it needs.</p><ul><li><strong>Initial investment</strong> — in USD</li><li><strong>Final amount received</strong> — in USD. The future value of the investment.</li><li><strong>Investment length</strong> — in years</li><li><strong>Compounding method</strong> — a plain number, no unit. This is the frequency the interest is added to the principal balance of the investment, or, in other words, how often the earned return or interest is reinvested.&amp;nbsp;</li><li><strong>Deposit or withdrawal</strong> — in USD. Set a negative value in case of regular withdrawal.</li><li><strong>Cash flow frequency</strong> — a plain number, no unit</li><li><strong>Timing of periodic payment</strong> — a plain number, no unit</li></ul><p>What you get back is M, Q, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Investment length lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Investment length carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> M and Q are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Initial investment left as a guess.</strong> Anything typed into Initial investment is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Final amount received left as a guess.</strong> Anything typed into Final amount received is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Initial investment to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Initial investment</strong> takes a plain number with no unit attached. Have it to hand before you start: Initial investment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Final amount received</strong> takes a plain number with no unit attached. The future value of the investment. Have it to hand before you start: Final amount received is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Investment length</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. Have it to hand before you start: Investment length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Compounding method</strong> takes a plain number with no unit attached. This is the frequency the interest is added to the principal balance of the investment, or, in other words, how often the earned return or interest is reinvested.&amp;nbsp;. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Compounding method is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Deposit or withdrawal</strong> takes a plain number with no unit attached. Set a negative value in case of regular withdrawal. Have it to hand before you start: Deposit or withdrawal is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Cash flow frequency</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Cash flow frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Timing of periodic payment</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Timing of periodic payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>M</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Q</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Rate of return is not a single equation with a single answer. It reads Initial investment, Final amount received, Investment length and Compounding method, applies the analysis the page is built around, and reports M and Q.</p><p>That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.</p><p>What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.</p><p>The results to look at are M and Q. They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Initial investment, Final amount received, Investment length and Compounding method. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Initial investment into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare M with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind M is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Initial investment, Final amount received and Investment length are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Initial investment, Final amount received and Investment length and the number you are missing is M and Q.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/fixed-deposit">Fixed deposit Calculator</a>, <a href="/finance/florida-overtime">Florida overtime Calculator</a> and <a href="/finance/florida-sales-tax">Florida sales tax Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rate of return calculator work out?', 'a' => 'M and Q.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial investment (USD), Final amount received (USD), Investment length (years), Compounding method, Deposit or withdrawal (USD). Fill initial investment, final amount received and investment length and leave M empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            M is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'Every box has to have a number in it. What this page returns is M, so an empty input simply leaves the result blank rather than choosing a new unknown.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. M keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/fixed-deposit', 'name' => 'Fixed deposit Calculator'],
            ['path' => '/finance/florida-overtime', 'name' => 'Florida overtime Calculator'],
            ['path' => '/finance/florida-sales-tax', 'name' => 'Florida sales tax Calculator'],
        ],
        'authors' => [],
    ],
];

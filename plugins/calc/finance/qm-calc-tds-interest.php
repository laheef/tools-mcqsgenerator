<?php

/**
 * TDS interest
 * /finance/tds-interest
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'TDS interest',
    'meta' => ['title' => 'TDS interest Calculator — Formula, Units & Example', 'description' => 'TDS interest works out due date from i\'d like to know the..., tax amount and date of transaction. Every box can be solved for, not only the one in the title.', 'h1' => 'TDS interest Calculator', 'updated' => '2026-07-13'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'subject',
                            'label' => 'I\'d like to know the...',
                            'type' => 'select',
                            'options' => ['Interest on late deduction' => '1', 'Interest on late payment' => '2', 'Interest on late filing' => '3'],
                            'dataset' => 'Subject',
                            'default' => 'Interest on late filing',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'subject == 1', 'text' => <<<'TXT'
                                (Section 201(1A)) If TDS is not deducted on time, interest is charged at 1% per month (or part of a month). Calculated from the due date of deduction to the actual deduction date.
                                TXT],
                                ['when' => 'subject == 2', 'text' => <<<'TXT'
                                (Section 201(1A)) If TDS is deducted but not deposited on time, interest is charged at 1.5% per month (or part of a month). Calculated from the date of deduction to the actual deposit date.
                                TXT],
                                ['when' => 'subject == 3', 'text' => <<<'TXT'
                                (Section 234E) This is a penalty for not filing the TDS return on time. Charged at ₹200 per day from the due date until the return is filed. Maximum penalty cannot exceed the TDS amount.
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax',
                            'label' => 'Tax amount',
                            'type' => 'number',
                            'prefix' => '₹',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'dateTrans', 'label' => 'Date of transaction', 'type' => 'date', 'help' => 'The date credit is given to the party or when the dues are actually paid, whichever is earlier.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'dateDed', 'label' => 'Date of tax deduction', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'datePmt', 'label' => 'Date of tax payment', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quarter',
                            'label' => 'Quarter of return filing',
                            'type' => 'select',
                            'options' => ['1st quarter' => '1', '2nd quarter' => '2', '3rd quarter' => '3', '4th quarter' => '4'],
                            'dataset' => 'Quarter',
                            'control' => 'DROPDOWN',
                            'default' => '1st quarter',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yearReturn',
                            'label' => 'Year of return filing',
                            'type' => 'select',
                            'options' => [
                                '2010' => '2010',
                                '2011' => '2011',
                                '2012' => '2012',
                                '2013' => '2013',
                                '2014' => '2014',
                                '2015' => '2015',
                                '2016' => '2016',
                                '2017' => '2017',
                                '2018' => '2018',
                                '2019' => '2019',
                                '2020' => '2020',
                                '2021' => '2021',
                                '2022' => '2022',
                                '2023' => '2023',
                                '2024' => '2024',
                                '2025' => '2025',
                                '2026' => '2026',
                                '2027' => '2027',
                                '2028' => '2028',
                                '2029' => '2029',
                                '2030' => '2030',
                                '2031' => '2031',
                                '2032' => '2032',
                                '2033' => '2033',
                                '2034' => '2034',
                                '2035' => '2035',
                                '2036' => '2036',
                                '2037' => '2037',
                                '2038' => '2038',
                                '2039' => '2039',
                                '2040' => '2040',
                            ],
                            'dataset' => 'yearofReturn',
                            'control' => 'DROPDOWN',
                            'help' => <<<'TXT'
                            The given year refers to the financial year that begins in that year. For example, the year 2026 refers to the financial year that runs from 1st April 2025 until 31st March 2026.
                            TXT,
                            'default' => '2027',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'dateFile', 'label' => 'Date of return filing', 'type' => 'date', 'help' => 'The actual date of filing the return.'],
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
                                ['when' => 'subject == 1 and dateTrans == dateDed', 'text' => 'TDS was deducted on the day when the transaction was made.'],
                                ['when' => 'subject == 1 and dateTrans > dateDed', 'text' => 'The transaction date can\'t be later than the deduction date.'],
                                ['when' => 'subject == 1 and tdsInterest > 0', 'text' => 'The interest on the late deduction, which needs to be paid before the TDS return is filed, is ₹{{tdsInterest.formattedValue}}.'],
                                ['when' => 'subject == 2 and dateDed > datePmt', 'text' => 'The deduction date can\'t be later than the payment date.'],
                                ['when' => 'subject == 2 and tdsInterest > 0', 'text' => 'The interest on late payment, which needs to be paid before the TDS return is filed, is ₹{{tdsInterest.formattedValue}}.'],
                                ['when' => 'subject == 3 and tdsInterest > 0 and tdsInterest < tax', 'text' => 'The fee on late filing is ₹{{tdsInterest.formattedValue}}.'],
                                ['when' => 'subject == 3 and tdsInterest == tax', 'text' => 'The amount of the fee can\'t exceed the tax amount — the fee on late filing is ₹{{tdsInterest.formattedValue}}.'],
                                ['when' => 'subject == 2 and tdsInterest == 0 and dateDed <= datePmt', 'text' => 'You are still within the deadline. You must pay the TDS by {{dueDate.formattedValue}} to avoid interest charges.'],
                                ['when' => 'subject == 3 and tdsInterest == 0', 'text' => 'You are still within the deadline. You must file the TDS by {{dueDate.formattedValue}} to avoid fees.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Textbox variables (hidden)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tdsInterest',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'dueDate', 'label' => 'Due date', 'type' => 'date'],
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
                            'name' => 'quarter_',
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
                            'name' => 'yearReturn_',
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
            'title' => 'tdsInterest = getTDSInterest(subject, tax, dateTrans, dateDed, datePmt, quarter, yearReturn, dateFile)',
            'results' => ['tdsInterest' => 'getTDSInterest(subject, tax, dateTrans, dateDed, datePmt, quarter, yearReturn, dateFile)'],
        ],
        [
            'title' => 'dueDate = getDueDate(subject, datePmt, quarter, yearReturn)',
            'results' => ['dueDate' => 'getDueDate(subject, datePmt, quarter, yearReturn)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";function _construct(t,e,r){if(_isNativeReflectConstruct())return Reflect.construct.apply(null,arguments);var o=[null];o.push.apply(o,e);var p=new(t.bind.apply(t,o));return r&&_setPrototypeOf(p,r.prototype),p}function _setPrototypeOf(t,e){return _setPrototypeOf=Object.setPrototypeOf?Object.setPrototypeOf.bind():function(t,e){return t.__proto__=e,t},_setPrototypeOf(t,e)}function _isNativeReflectConstruct(){try{var t=!Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],function(){}))}catch(t){}return(_isNativeReflectConstruct=function _isNativeReflectConstruct(){return!!t})()}function _toConsumableArray(r){return _arrayWithoutHoles(r)||_iterableToArray(r)||_unsupportedIterableToArray(r)||_nonIterableSpread()}function _nonIterableSpread(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}function _unsupportedIterableToArray(r,a){if(r){if("string"==typeof r)return _arrayLikeToArray(r,a);var t={}.toString.call(r).slice(8,-1);return"Object"===t&&r.constructor&&(t=r.constructor.name),"Map"===t||"Set"===t?Array.from(r):"Arguments"===t||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t)?_arrayLikeToArray(r,a):void 0}}function _iterableToArray(r){if("undefined"!=typeof Symbol&&null!=r[Symbol.iterator]||null!=r["@@iterator"])return Array.from(r)}function _arrayWithoutHoles(r){if(Array.isArray(r))return _arrayLikeToArray(r)}function _arrayLikeToArray(r,a){(null==a||a>r.length)&&(a=r.length);for(var e=0,n=Array(a);e<a;e++)n[e]=r[e];return n}var millisecondsInADay=24*60*60*1000;omni.define("getTDSInterest",function(_subject,_tax,_dateTrans,_dateDed,_datePmt,_quarter,_yearReturn,_dateFile){var subject=Number(_subject);var tax=Number(_tax);var dateTrans=Number(_dateTrans);var dateDed=Number(_dateDed);var datePmt=Number(_datePmt);var quarter=Number(_quarter);var yearReturn=Number(_yearReturn);var dateFile=Number(_dateFile);var startDate=dateTrans;var interestSum=0;if(subject===1){interestSum=calculateMonthlyInterest(startDate,dateDed,tax,0.01)}else if(subject===2){startDate=dateDed;var pmtDueDate=calculatePaymentDueDate(startDate);interestSum=calculatePeriodicInterest(startDate,datePmt,tax,pmtDueDate,0.015)}else if(subject===3){startDate=determineFilingDueDate(quarter,yearReturn);interestSum=calculateLateFilingInterest(startDate,dateFile,tax)}return interestSum});function calculateMonthlyInterest(start,end,taxAmount,rate){var totalInterest=0;var monthsDiff=getMonthDifference(start,end)+1;for(var i=0;i<monthsDiff;i++){if(start==end){break}totalInterest+=taxAmount*rate}return totalInterest}function calculatePeriodicInterest(start,end,taxAmount,pmtDue,rate){var daysPassed=0;var totalInterest=0;var periodsLoop=Math.min(Math.ceil((end-start)/28)+10,100);for(var i=0;i<=periodsLoop;i++){var currentDate=new Date((start+daysPassed)*millisecondsInADay);if(Math.floor(currentDate.getTime()/millisecondsInADay)>end){break}daysPassed+=getDaysInPeriod(currentDate);if(end>pmtDue){totalInterest+=taxAmount*rate}}return totalInterest}function calculateLateFilingInterest(start,end,taxAmount){var daysPassed=0;var totalInterest=0;var periodsLoop=end-start+10;for(var i=0;i<=periodsLoop;i++){var currentDate=new Date((start+daysPassed)*millisecondsInADay);daysPassed+=1;if(i>1){totalInterest+=200}if(Math.floor(currentDate.getTime()/millisecondsInADay)>end||totalInterest>=taxAmount){break}}return totalInterest}function calculatePaymentDueDate(start){var dateObj=new Date(start*millisecondsInADay);var month=dateObj.getMonth()+1;var year=dateObj.getFullYear();if(month==3){return new Date(year,3,30).getTime()/millisecondsInADay}else{return new Date(year,month,8).getTime()/millisecondsInADay}}function determineFilingDueDate(qtr,year){var filingDueDates={1:[year,6,31],2:[year,9,31],3:[year+1,0,31],4:[year+1,4,31]};return Math.ceil(_construct(Date,_toConsumableArray(filingDueDates[qtr])).getTime()/millisecondsInADay)}function getMonthDifference(start,end){var startObj=new Date(start*millisecondsInADay);var endObj=new Date(end*millisecondsInADay);return(endObj.getFullYear()-startObj.getFullYear())*12+(endObj.getMonth()-startObj.getMonth())}function getDaysInPeriod(date){return new Date(date.getFullYear(),date.getMonth()+1,0).getDate()}omni.define("getDueDate",function(subject_,datePmt_,quarter_,yearReturn_){var currentDateObj=new Date(datePmt_*millisecondsInADay);var nextDueDate;if(subject_===2){var month=currentDateObj.getMonth()+1;var year=currentDateObj.getFullYear();if(month===3){nextDueDate=new Date(year,3,30).getTime()/millisecondsInADay}else{nextDueDate=new Date(year,month,7).getTime()/millisecondsInADay}}else if(subject_===3){var filingDueDates={1:[yearReturn_,6,31],2:[yearReturn_,9,31],3:[yearReturn_+1,0,31],4:[yearReturn_+1,4,31]};nextDueDate=_construct(Date,_toConsumableArray(filingDueDates[quarter_])).getTime()/millisecondsInADay}return Math.ceil(nextDueDate)});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        TDS interest turns I'd like to know the…, Tax amount and Date of transaction into Due date and Tds Interest. There is no hidden constant here: change due date and i'd like to know the… moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the TDS interest calculator works', 'html' => <<<'TXT'
            <p>TDS interest answers one question from 8 numbers, and the answer is Due date and Tds Interest.</p><p>In the form&#039;s own words, Tds Interest = getTDSInterest(I&#039;d like to know the..., Tax amount, Date of transaction, Date of tax deduction, Date of tax payment, Quarter of return filing, Year of return filing, Date of return filing).</p><p>What comes back is Due date and Tds Interest — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 8 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>I&#039;d like to know the…</strong> — a plain number, no unit</li><li><strong>Tax amount</strong> — a plain number, no unit</li><li><strong>Date of transaction</strong> — a plain number, no unit, entered as a date. The date credit is given to the party or when the dues are actually paid, whichever is earlier.</li><li><strong>Date of tax deduction</strong> — a plain number, no unit, entered as a date</li><li><strong>Date of tax payment</strong> — a plain number, no unit, entered as a date</li><li><strong>Quarter of return filing</strong> — a plain number, no unit</li><li><strong>Year of return filing</strong> — a plain number, no unit. The given year refers to the financial year that begins in that year. For example, the year 2026 refers to the financial year that runs from 1st April 2025 until 31st March 2026.</li><li><strong>Date of return filing</strong> — a plain number, no unit, entered as a date. The actual date of filing the return.</li></ul><p>The answers come back as Due date, Tds Interest. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: Due date takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Tds Interest</strong> = <code>getTDSInterest(I&#039;d like to know the..., Tax amount, Date of transaction, Date of tax deduction, Date of tax payment, Quarter of return filing, Year of return filing, Date of return filing)</code></li><li><strong>Due date</strong> = <code>getDueDate(I&#039;d like to know the..., Date of tax payment, Quarter of return filing, Year of return filing)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Tds Interest</strong> = <code>getTDSInterest(I&#039;d like to know the..., Tax amount, Date of transaction, Date of tax deduction, Date of tax payment, Quarter of return filing, Year of return filing, Date of return filing)</code> — the form to use when I&#039;d like to know the…, Tax amount, Date of transaction and Date of tax deduction are the values you have.</li><li><strong>Due date</strong> = <code>getDueDate(I&#039;d like to know the..., Date of tax payment, Quarter of return filing, Year of return filing)</code> — the form to use when I&#039;d like to know the…, Date of tax payment, Quarter of return filing and Year of return filing are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Tds Interest and Due date can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Due date and Tds Interest are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>I&#039;d like to know the… left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If I&amp;#039;d like to know the… is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Tax amount left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Tax amount is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Date of transaction left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Date of transaction is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in I&#039;d like to know the... and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>I&#039;d like to know the…</strong> takes a plain number with no unit attached. The page reads it when it works out Tds Interest and Due date. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: I&#039;d like to know the… is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Tax amount</strong> takes a plain number with no unit attached. The page reads it when it works out Tds Interest. Have it to hand before you start: Tax amount is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Date of transaction</strong> takes a plain number with no unit attached. The date credit is given to the party or when the dues are actually paid, whichever is earlier. The page reads it when it works out Tds Interest. Have it to hand before you start: Date of transaction is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Date of tax deduction</strong> takes a plain number with no unit attached. The page reads it when it works out Tds Interest. Have it to hand before you start: Date of tax deduction is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Date of tax payment</strong> takes a plain number with no unit attached. The page reads it when it works out Tds Interest and Due date. Have it to hand before you start: Date of tax payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Quarter of return filing</strong> takes a plain number with no unit attached. The page reads it when it works out Tds Interest and Due date. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Quarter of return filing is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Year of return filing</strong> takes a plain number with no unit attached. The given year refers to the financial year that begins in that year. For example, the year 2026 refers to the financial year that runs from 1st April 2025 until 31st March 2026. The page reads it when it works out Tds Interest and Due date. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Year of return filing is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Date of return filing</strong> takes a plain number with no unit attached. The actual date of filing the return. The page reads it when it works out Tds Interest. Have it to hand before you start: Date of return filing is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Due date</strong> is a plain number. The value follows from I'd like to know the…, Date of tax payment, Quarter of return filing and Year of return filing. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Tds Interest</strong> is a plain number. The value follows from I'd like to know the…, Tax amount, Date of transaction and Date of tax deduction. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Due date follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes I&#039;d like to know the…, Tax amount and Date of transaction are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when I&#039;d like to know the…, Tax amount and Date of transaction is what you already know and Due date and Tds Interest is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/lerner-index">Lerner index</a>, <a href="/finance/levered-free-cash-flow">Levered free cash flow Calculator</a> and <a href="/finance/lifetime-earnings">Lifetime earnings Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the TDS interest calculator work out?', 'a' => <<<'TXT'
            Due date and Tds Interest, from I'd like to know the…, Tax amount, Date of transaction and Date of tax deduction. The relationship is Tds Interest = getTDSInterest(I'd like to know the..., Tax amount, Date of transaction, Date of tax deduction, Date of tax payment, Quarter of return filing, Year of return filing, Date of return filing).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            I'd like to know the…, Tax amount, Date of transaction, Date of tax deduction, Date of tax payment. Fill i'd like to know the…, tax amount and date of transaction and leave Due date empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Tds Interest and Due date can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Due date is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With I'd like to know the... left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Due date keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/lerner-index', 'name' => 'Lerner index'],
            ['path' => '/finance/levered-free-cash-flow', 'name' => 'Levered free cash flow Calculator'],
            ['path' => '/finance/lifetime-earnings', 'name' => 'Lifetime earnings Calculator'],
        ],
        'authors' => [],
    ],
];

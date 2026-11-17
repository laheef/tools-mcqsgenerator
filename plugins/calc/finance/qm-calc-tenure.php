<?php

/**
 * Tenure
 * /finance/tenure
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tenure',
    'meta' => ['title' => 'Tenure Calculator: Formula, Steps & Examples', 'description' => 'Tenure works out average tenure from total number of employees and combined duration of service. Results come back in yrs, with any other unit a click away.', 'h1' => 'Tenure Calculator', 'updated' => '2026-09-21'],
    'sections' => [
        [
            'title' => 'Average duration of service',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employees',
                            'label' => 'Total number of employees',
                            'type' => 'number',
                            'help' => 'Average number of total employees in your specified period.',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'service',
                            'label' => 'Combined duration of service',
                            'type' => 'number',
                            'help' => 'Total duration of service for all the employees included above.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tenure',
                            'label' => 'Average tenure',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Specific duration of service',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'startDate', 'label' => 'Starting date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'endDate', 'label' => 'Ending date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'The employee tenure is&nbsp;'],
                                ['when' => 'yearNumber != 0', 'text' => '{{yearNumber.formattedValue}}&nbsp;'],
                                ['when' => 'yearNumber > 1', 'text' => 'years,&nbsp;'],
                                ['when' => 'yearNumber == 1', 'text' => 'year,&nbsp;'],
                                ['when' => 'yearNumber > 1 and (monthNumber == 0 or dayNumber == 0)', 'text' => 'years and&nbsp;'],
                                ['when' => 'yearNumber == 1 and (monthNumber == 0 or dayNumber == 0)', 'text' => 'year and&nbsp;'],
                                ['when' => 'yearNumber > 1 and monthNumber == 0 and dayNumber == 0', 'text' => 'full years.&nbsp;'],
                                ['when' => 'yearNumber == 1 and monthNumber == 0 and dayNumber == 0', 'text' => 'full year.&nbsp;'],
                                ['when' => 'monthNumber!= 0', 'text' => '{{monthNumber.formattedValue}}&nbsp;'],
                                ['when' => 'monthNumber > 1', 'text' => 'months and&nbsp;'],
                                ['when' => 'monthNumber == 1', 'text' => 'month and&nbsp;'],
                                ['when' => 'monthNumber > 1 and dayNumber == 0', 'text' => 'full months.&nbsp;'],
                                ['when' => 'monthNumber == 1 and dayNumber == 0', 'text' => 'full month.&nbsp;'],
                                ['when' => 'dayNumber != 0', 'text' => '{{dayNumber.formattedValue}}&nbsp;'],
                                ['when' => 'dayNumber > 1', 'text' => 'days.'],
                                ['when' => 'dayNumber == 1', 'text' => 'day.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Here, you’ll find your result...'],
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
                            'name' => 'yearNumber',
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
                            'name' => 'monthNumber',
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
                            'name' => 'dayNumber',
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
            'title' => 'tenure = service / employees',
            'results' => ['tenure' => 'service/employees', 'service' => 'employees*tenure', 'employees' => 'service/tenure'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";function calculateTenure(dateStart,_dateEnd){var milisecondsInADay=24*60*60*1000;var dateEnd=_dateEnd+1;var monthCount=-2;var monthNumber=-2;var daydiff;var dayCount=0;var dateStart_date=new Date(dateStart*milisecondsInADay);if(dateStart_date.getUTCMonth()===0){daydiff=31}else if(dateStart_date.getUTCMonth()===1){daydiff=31}else if(dateStart_date.getUTCDate()===27&&dateStart_date.getUTCMonth()===2){daydiff=28}else if(dateStart_date.getUTCDate()===28&&dateStart_date.getUTCMonth()===2){daydiff=28}else if(dateStart_date.getUTCDate()===29&&dateStart_date.getUTCMonth()===2){daydiff=29}else if(dateStart_date.getUTCDate()===30&&dateStart_date.getUTCMonth()===2){daydiff=30}else if(dateStart_date.getUTCDate()===31&&dateStart_date.getUTCMonth()===2){daydiff=31}else if(dateStart_date.getUTCMonth()===2){daydiff=28}else if(dateStart_date.getUTCMonth()===3){daydiff=31}else if(dateStart_date.getUTCMonth()===4){daydiff=30}else if(dateStart_date.getUTCMonth()===5){daydiff=31}else if(dateStart_date.getUTCMonth()===6){daydiff=30}else if(dateStart_date.getUTCMonth()===7){daydiff=31}else if(dateStart_date.getUTCMonth()===8){daydiff=31}else if(dateStart_date.getUTCMonth()===9){daydiff=30}else if(dateStart_date.getUTCMonth()===10){daydiff=31}else if(dateStart_date.getUTCMonth()===11){daydiff=30}var int_year=(dateStart_date.getYear()-100)/4;if(int_year%1===0&&dateStart_date.getYear()/100%1!==0&&dateStart_date.getUTCMonth()===2||(dateStart_date.getYear()+1900)/400%1===0&&dateStart_date.getUTCMonth()===2){daydiff=29}if(dateStart_date.getUTCDate()===29&&dateStart_date.getUTCMonth()===1){daydiff=31}if(dateStart_date.getUTCDate()===28&&dateStart_date.getUTCMonth()===1){daydiff=31}var dateStart2=dateStart-daydiff;var days2;var days_passed=0;var days_in_month;var date;var days=daydiff;var i;var dayNumber=0;var yearNumber;var dayYear=0;var monthAppr=(dateEnd-dateStart2)/30+1;for(i=0;i<=monthAppr;i++){date=new Date((dateStart2+days_passed)*milisecondsInADay);if(dateStart_date.getUTCDate()<29&&date.getUTCMonth()===0){days_in_month=31}else if(dateStart_date.getUTCDate()===29&&date.getUTCMonth()===0){days_in_month=30}else if(dateStart_date.getUTCDate()===30&&date.getUTCMonth()===0){days_in_month=29}else if(dateStart_date.getUTCDate()===31&&date.getUTCMonth()===0){days_in_month=28}else if(dateStart_date.getUTCDate()<29&&date.getUTCMonth()===1){days_in_month=28}else if(dateStart_date.getUTCDate()===29&&date.getUTCMonth()===1){days_in_month=29}else if(dateStart_date.getUTCDate()===30&&date.getUTCMonth()===1){days_in_month=30}else if(dateStart_date.getUTCDate()===31&&date.getUTCMonth()===1){days_in_month=31}else if(dateStart_date.getUTCDate()<31&&date.getUTCMonth()===2){days_in_month=31}else if(dateStart_date.getUTCDate()===31&&date.getUTCMonth()===2){days_in_month=30}else if(dateStart_date.getUTCDate()<31&&date.getUTCMonth()===3){days_in_month=30}else if(dateStart_date.getUTCDate()===31&&date.getUTCMonth()===3){days_in_month=31}else if(dateStart_date.getUTCDate()<31&&date.getUTCMonth()===4){days_in_month=31}else if(dateStart_date.getUTCDate()===31&&date.getUTCMonth()===4){days_in_month=30}else if(dateStart_date.getUTCDate()<31&&date.getUTCMonth()===5){days_in_month=30}else if(dateStart_date.getUTCDate()===31&&date.getUTCMonth()===5){days_in_month=31}else if(dateStart_date.getUTCDate()<31&&date.getUTCMonth()===6){days_in_month=31}else if(dateStart_date.getUTCDate()===31&&date.getUTCMonth()===6){days_in_month=31}else if(dateStart_date.getUTCDate()<31&&date.getUTCMonth()===7){days_in_month=31}else if(dateStart_date.getUTCDate()===31&&date.getUTCMonth()===7){days_in_month=30}else if(dateStart_date.getUTCDate()<31&&date.getUTCMonth()===8){days_in_month=30}else if(dateStart_date.getUTCDate()===31&&date.getUTCMonth()===8){days_in_month=31}else if(dateStart_date.getUTCDate()<31&&date.getUTCMonth()===9){days_in_month=31}else if(dateStart_date.getUTCDate()===31&&date.getUTCMonth()===9){days_in_month=30}else if(dateStart_date.getUTCDate()<31&&date.getUTCMonth()===10){days_in_month=30}else if(dateStart_date.getUTCDate()===31&&date.getUTCMonth()===10){days_in_month=31}else if(dateStart_date.getUTCDate()<31&&date.getUTCMonth()===11){days_in_month=31}else if(dateStart_date.getUTCDate()===31&&date.getUTCMonth()===11){days_in_month=31}int_year=(date.getYear()-100)/4;if(int_year%1===0&&date.getYear()/100%1!==0&&date.getUTCMonth()===1||(date.getYear()+1900)/400%1===0&&date.getUTCMonth()===1){days_in_month=29}if(int_year%1===0&&date.getYear()/100%1!==0&&date.getUTCMonth()===0&&date.getUTCDate()===30||(date.getYear()+1900)/400%1===0&&date.getUTCMonth()===0&&date.getUTCDate()===30){days_in_month=30}if(int_year%1===0&&date.getYear()/100%1!==0&&date.getUTCMonth()===0&&date.getUTCDate()===31||(date.getYear()+1900)/400%1===0&&date.getUTCMonth()===0&&date.getUTCDate()===31){days_in_month=29}if(int_year%1===0&&date.getYear()/100%1!==0&&date.getUTCMonth()===0&&date.getUTCDate()===29||(date.getYear()+1900)/400%1===0&&date.getUTCMonth()===0&&date.getUTCDate()===29){days_in_month=31}else{days_in_month=days_in_month}if(date.getUTCDate()===29&&date.getUTCMonth()===1&&dateStart_date.getUTCDate()>29){days_in_month=30}else{days_in_month=days_in_month}if(date.getUTCDate()===29&&date.getUTCMonth()===1&&dateStart_date.getUTCDate()>30){days_in_month=31}else{days_in_month=days_in_month}if(date.getUTCDate()===28&&date.getUTCMonth()===1&&dateStart_date.getUTCDate()>30){days_in_month=31}else{days_in_month=days_in_month}days_passed+=days_in_month;days=dateStart2+days_passed;days2=days-days_in_month;if(days2<=dateEnd){monthCount=1}else{monthCount=0}monthNumber+=monthCount;if(days2<=dateEnd&&days2+days_in_month>dateEnd){dayCount=days2}else{dayCount=0}dayNumber+=dayCount;if(Math.floor(monthNumber/12)===monthNumber/12){dayYear=0}dayYear=days2-dateStart}dayNumber=Math.floor(dateEnd-dayNumber);yearNumber=Math.floor(monthNumber/12);monthNumber=monthNumber-yearNumber*12;return{yearNumber:yearNumber,monthNumber:monthNumber,dayNumber:dayNumber}}omni.define("getYearNumber",function(startDate,endDate){return calculateTenure(startDate,endDate).yearNumber});omni.define("getMonthNumber",function(startDate,endDate){return calculateTenure(startDate,endDate).monthNumber});omni.define("getDayNumber",function(startDate,endDate){return calculateTenure(startDate,endDate).dayNumber});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Tenure turns Total number of employees and Combined duration of service into Average tenure. Nothing is looked up on this page: average tenure is computed from total number of employees and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Average tenure is opened in years; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Tenure calculator works', 'html' => <<<'TXT'
            <p>The Tenure calculator applies one relationship to 2 numbers and reports Average tenure.</p><p>The relationship it solves reads Average tenure = Combined duration of service ÷ Total number of employees.</p><p>The answers are Average tenure; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Total number of employees</strong> — a plain number, no unit. Average number of total employees in your specified period.</li><li><strong>Combined duration of service</strong> — in years. Total duration of service for all the employees included above.</li></ul><p>The answer comes back as Average tenure in years. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Average tenure offers 5 units and opens on years, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Average tenure</strong> = <code>Combined duration of service ÷ Total number of employees</code></li><li><strong>Combined duration of service</strong> = <code>Total number of employees × Average tenure</code></li><li><strong>Total number of employees</strong> = <code>Combined duration of service ÷ Average tenure</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Average tenure</strong> = <code>Combined duration of service ÷ Total number of employees</code> — the form to use when Combined duration of service and Total number of employees are the values you have.</li><li><strong>Combined duration of service</strong> = <code>Total number of employees × Average tenure</code> — the form to use when Total number of employees and Average tenure are the values you have.</li><li><strong>Total number of employees</strong> = <code>Combined duration of service ÷ Average tenure</code> — the form to use when Combined duration of service and Average tenure are the values you have.</li></ul><p>Any one of Average tenure, Combined duration of service and Total number of employees can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Combined duration of service is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Average tenure is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Total number of employees left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total number of employees is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Combined duration of service left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Combined duration of service is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Total number of employees to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Total number of employees</strong> takes a plain number with no unit attached. Average number of total employees in your specified period. It feeds Average tenure and Combined duration of service. Have it to hand before you start: Total number of employees is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Combined duration of service</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. Total duration of service for all the employees included above. It feeds Average tenure and Total number of employees. Have it to hand before you start: Combined duration of service is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Average tenure</strong> is a years figure. The value follows from Combined duration of service and Total number of employees. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Total number of employees and Combined duration of service. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Total number of employees into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Average tenure in yrs with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Average tenure follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover years. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Total number of employees and Combined duration of service measured, Average tenure wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/dti">Debt to income ratio</a>, <a href="/finance/debt-to-capital">Debt-to-capital ratio Calculator</a> and <a href="/finance/defensive-interval-ratio">Defensive interval ratio Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tenure calculator work out?', 'a' => <<<'TXT'
            Average tenure, from Combined duration of service and Total number of employees. The relationship is Average tenure = Combined duration of service ÷ Total number of employees.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total number of employees, Combined duration of service (years). With total number of employees and combined duration of service in place, Average tenure can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Average tenure, Combined duration of service and Total number of employees blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Average tenure is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Total number of employees left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Average tenure keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/dti', 'name' => 'Debt to income ratio'],
            ['path' => '/finance/debt-to-capital', 'name' => 'Debt-to-capital ratio Calculator'],
            ['path' => '/finance/defensive-interval-ratio', 'name' => 'Defensive interval ratio Calculator'],
        ],
        'authors' => [],
    ],
];

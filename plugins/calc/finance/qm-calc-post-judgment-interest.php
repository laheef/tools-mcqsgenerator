<?php

/**
 * Post judgment interest
 * /finance/post-judgment-interest
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Post judgment interest',
    'meta' => ['title' => 'Post judgment interest: Formula, Steps & Results', 'description' => 'Post judgment interest works out time passed and accumulated interest from judgment amount, interest rate and date of judgment. Every figure is computed.', 'h1' => 'Post judgment interest Calculator', 'updated' => '2026-09-30'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'judgmentAmount',
                            'label' => 'Judgment amount',
                            'type' => 'number',
                            'prefix' => '$',
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
                            'label' => 'Interest rate',
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
                        ['name' => 'begDate', 'label' => 'Date of judgment', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'endDate', 'label' => 'Date of writ', 'type' => 'date', 'help' => 'Date on which the legal document was issued by the court.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dayCount',
                            'label' => 'Time passed',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'weeksdays',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'accInt',
                            'label' => 'Accumulated interest',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Check the interest rate value on the Federal Reserve website!'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'accInt= judgmentAmount * interest_rate/returnDaysInYear(begDate) * (endDate - begDate)',
            'results' => ['endDate' => 'accInt*returnDaysInYear(begDate)/(interest_rate*judgmentAmount) + begDate', 'judgmentAmount' => '-accInt*returnDaysInYear(begDate)/(interest_rate*(begDate - endDate))', 'accInt' => 'interest_rate*judgmentAmount*(-begDate + endDate)/returnDaysInYear(begDate)', 'interest_rate' => '-accInt*returnDaysInYear(begDate)/(judgmentAmount*(begDate - endDate))'],
        ],
        [
            'title' => 'dayCount = endDate - begDate',
            'results' => ['endDate' => 'begDate + dayCount', 'dayCount' => '-begDate + endDate', 'begDate' => '-dayCount + endDate'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("returnDaysInYear",function(begDate){var milisecondsInADay=24*60*60*1000;var begDate1=new Date(begDate*milisecondsInADay);var year=begDate1.getUTCFullYear();var daysInYear=year%4===0&&(year%100!==0||year%400===0)?366:365;return daysInYear});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Judgment amount, Interest rate and Date of judgment into Post judgment interest and the answer comes back as Time passed and Accumulated interest. It is a single relationship that reads time passed out of judgment amount, not a table of canned results keyed by them. Units for Time passed default to weeks / days and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Post judgment interest calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Post judgment interest: it takes 4 numbers and reports Time passed and Accumulated interest.</p><p>The relationship it solves reads Accumulated interest = Interest rate × Judgment amount × ( − Date of judgment + Date of writ) ÷ returnDaysInYear(Date of judgment).</p><p>What comes back is Time passed and Accumulated interest — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Judgment amount</strong> — a plain number, no unit</li><li><strong>Interest rate</strong> — in percent</li><li><strong>Date of judgment</strong> — a plain number, no unit, entered as a date</li><li><strong>Date of writ</strong> — a plain number, no unit, entered as a date. Date on which the legal document was issued by the court.</li></ul><p>The answers come back as Time passed in weeks / days, Accumulated interest. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Date of judgment = Sun 1 March 2026 and Date of writ = Sun 1 March 2026; the answers are <strong>Time passed</strong> = 0 weeksdays.</p><ul><li><strong>Time passed</strong> = 0 weeksdays</li></ul><p>That is <strong>Accumulated interest</strong> = <code>Interest rate × Judgment amount × ( − Date of judgment + Date of writ) ÷ returnDaysInYear(Date of judgment)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Time passed</strong> = 0. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Time passed lists 9 options and opens on weeks / days. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Accumulated interest</strong> = <code>Interest rate × Judgment amount × ( − Date of judgment + Date of writ) ÷ returnDaysInYear(Date of judgment)</code></li><li><strong>Date of writ</strong> = <code>Accumulated interest × returnDaysInYear(Date of judgment) ÷ (Interest rate × Judgment amount) + Date of judgment</code></li><li><strong>Judgment amount</strong> = <code>− Accumulated interest × returnDaysInYear(Date of judgment) ÷ (Interest rate × (Date of judgment − Date of writ))</code></li><li><strong>Interest rate</strong> = <code>− Accumulated interest × returnDaysInYear(Date of judgment) ÷ (Judgment amount × (Date of judgment − Date of writ))</code></li><li><strong>Time passed</strong> = <code>− Date of judgment + Date of writ</code></li><li><strong>Date of judgment</strong> = <code>− Time passed + Date of writ</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Accumulated interest</strong> = <code>Interest rate × Judgment amount × ( − Date of judgment + Date of writ) ÷ returnDaysInYear(Date of judgment)</code> — the form to use when Interest rate, Judgment amount, Date of judgment and Date of writ are the values you have.</li><li><strong>Date of writ</strong> = <code>Accumulated interest × returnDaysInYear(Date of judgment) ÷ (Interest rate × Judgment amount) + Date of judgment</code> — the form to use when Accumulated interest, Date of judgment, Interest rate and Judgment amount are the values you have.</li><li><strong>Judgment amount</strong> = <code>− Accumulated interest × returnDaysInYear(Date of judgment) ÷ (Interest rate × (Date of judgment − Date of writ))</code> — the form to use when Accumulated interest, Date of judgment, Interest rate and Date of writ are the values you have.</li><li><strong>Interest rate</strong> = <code>− Accumulated interest × returnDaysInYear(Date of judgment) ÷ (Judgment amount × (Date of judgment − Date of writ))</code> — the form to use when Accumulated interest, Date of judgment, Judgment amount and Date of writ are the values you have.</li><li><strong>Time passed</strong> = <code>− Date of judgment + Date of writ</code> — the form to use when Date of judgment and Date of writ are the values you have.</li><li><strong>Date of writ</strong> = <code>Date of judgment + Time passed</code> — the form to use when Date of judgment and Time passed are the values you have.</li><li><strong>Date of judgment</strong> = <code>− Time passed + Date of writ</code> — the form to use when Time passed and Date of writ are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Accumulated interest, Date of writ and Judgment amount can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Date of judgment from Sun 1 March 2026 to Wed 29 April 2082, leaving every other box alone. The panel moves from <strong>Time passed</strong> 0 weeksdays to <strong>Time passed</strong> -1.772e+9 weeksdays.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Interest rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Time passed and Accumulated interest are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Judgment amount left as a guess.</strong> Anything typed into Judgment amount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Interest rate left as a guess.</strong> Anything typed into Interest rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Judgment amount and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Post judgment interest form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Judgment amount</strong> takes a plain number with no unit attached. It feeds Date of writ, Accumulated interest and Interest rate. Fill it from a measurement rather than a memory — Judgment amount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Date of writ, Judgment amount and Accumulated interest. Fill it from a measurement rather than a memory — Interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Date of judgment</strong> takes a plain number with no unit attached. It feeds Date of writ, Judgment amount and Accumulated interest. Fill it from a measurement rather than a memory — Date of judgment is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Date of writ</strong> takes a plain number with no unit attached. Date on which the legal document was issued by the court. It feeds Judgment amount, Accumulated interest and Interest rate. Fill it from a measurement rather than a memory — Date of writ is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Time passed</strong> is a weeks / days figure and the page's own defaults put it at 0 weeksdays. The value follows from Date of judgment and Date of writ. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Accumulated interest</strong> is a plain number. The value follows from Interest rate, Judgment amount, Date of judgment and Date of writ. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Time passed</th></tr></thead><tbody><tr><td><strong>Date of judgment</strong> +10%</td><td>—</td></tr><tr><td><strong>Date of writ</strong> +10%</td><td>—</td></tr></tbody></table><p>The steepest column belongs to Date of judgment: ten per cent there moves an answer by about 0 per cent, which is why that is the number to measure twice. By contrast, Date of judgment and Date of writ barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Date of judgment = Fri 30 January 1998 and Date of writ = Fri 30 January 1998 and the page reports <strong>Time passed</strong> = 0 weeksdays.</li><li>Feed in Date of judgment = Sat 28 June 2138 and Date of writ = Sun 1 March 2026 and the page reports <strong>Time passed</strong> = -3.545e+9 weeksdays.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Post judgment interest actually offers.</p><ul><li><strong>weeks / days</strong> — opens in <em>weeksdays</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Time passed is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are weeks / days and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Judgment amount, Interest rate and Date of judgment are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Judgment amount, Interest rate and Date of judgment is what you already know and Time passed and Accumulated interest is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/gift-of-equity">Gift of equity Calculator</a>, <a href="/finance/gini-coefficient">Gini coefficient Calculator</a> and <a href="/finance/gmroi">GMROI</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Post judgment interest calculator work out?', 'a' => <<<'TXT'
            Time passed and Accumulated interest, from Interest rate, Judgment amount, Date of judgment and Date of writ. The relationship is Accumulated interest = Interest rate × Judgment amount × ( − Date of judgment + Date of writ) ÷ returnDaysInYear(Date of judgment).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Judgment amount, Interest rate (percent), Date of judgment, Date of writ. With judgment amount, interest rate and date of judgment in place, Time passed can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Accumulated interest, Date of writ, Judgment amount and Interest rate can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Time passed = 0 weeksdays. Those are the defaults written into the form — move Judgment amount and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Time passed is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Judgment amount blank and the page solves for it, reporting Time passed instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Time passed keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/gift-of-equity', 'name' => 'Gift of equity Calculator'],
            ['path' => '/finance/gini-coefficient', 'name' => 'Gini coefficient Calculator'],
            ['path' => '/finance/gmroi', 'name' => 'GMROI'],
        ],
        'authors' => [],
    ],
];

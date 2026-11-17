<?php

/**
 * Finance charge
 * /finance/finance-charge
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Finance charge',
    'meta' => ['title' => 'Finance charge Calculator — Formula & Results', 'description' => 'Finance charge takes current balance owed and returns daily interest rate. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Finance charge Calculator', 'updated' => '2025-10-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Bal',
                            'label' => 'Current balance owed',
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
                            'name' => 'apr',
                            'label' => 'Annual percentage rate (APR)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '18',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'DailyInterest',
                            'label' => 'Daily interest rate',
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
                        [
                            'name' => 'DailyInt',
                            'label' => 'Finance charge per day',
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
                            'name' => 'Calc',
                            'label' => 'Calculate for...',
                            'type' => 'select',
                            'options' => ['billing cycle' => '1', 'given term' => '2'],
                            'dataset' => 'VarTerm',
                            'default' => 'billing cycle',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Bill2',
                            'label' => 'Billing cycle length',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'BillCycle',
                            'label' => 'I would like to...',
                            'type' => 'select',
                            'options' => ['set it manually' => '1', 'estimates between dates' => '2'],
                            'dataset' => 'VarCycle',
                            'default' => 'set it manually',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Bill',
                            'label' => 'Finance charge for',
                            'type' => 'number',
                            'help' => 'The number of days/weeks/months you are carrying the balance for.',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '26',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'DateStart', 'label' => 'First day', 'type' => 'date', 'help' => 'The first day you begin to carry the balance.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'DateEnd', 'label' => 'Last day', 'type' => 'date', 'help' => 'The last day when interest is calculated on your balance.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'In general, the length of the billing cycle is at least 15 days and no longer than 90 days.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'hasValue(finChargeBillingCycle) and hasValue(newOpeningBalance)', 'text' => <<<'TXT'
                                The finance charge for a billing cycle is {{finChargeBillingCycle.monetaryValue}} The new opening balance in the following billing cycle is {{newOpeningBalance.monetaryValue}}.
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'hasValue(finChargeManual)', 'text' => 'The finance charge for a given period is {{finChargeManual.monetaryValue}}.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'The finance charge for&nbsp;'],
                                ['when' => null, 'text' => 'the {{dayCount.monetaryValue}} days&nbsp;'],
                                ['when' => 'dayCount == 1', 'text' => '1 day&nbsp;'],
                                ['when' => null, 'text' => 'you carry the balance is {{finChargeDates.monetaryValue}}.'],
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
                            'name' => 'showDaily',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show daily interest and finance charge' => '1', '' => '0'],
                            'dataset' => 'showDaily',
                            'control' => 'CHECKBOX',
                            'default' => '',
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
                            'name' => 'newOpeningBalance',
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
                            'name' => 'dayCount',
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
                            'name' => 'finChargeBillingCycle',
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
                            'name' => 'finChargeManual',
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
                            'name' => 'finChargeDates',
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
            'title' => 'DailyInterest = apr/365',
            'results' => ['DailyInterest' => '(1/365)*apr', 'apr' => '365*DailyInterest'],
        ],
        [
            'title' => 'DailyInt = Bal * DailyInterest ',
            'results' => ['DailyInterest' => 'DailyInt/Bal', 'Bal' => 'DailyInt/DailyInterest', 'DailyInt' => 'Bal*DailyInterest'],
        ],
    ],
    'js' => '"use strict";omni.define("getBill",function(Bill,BillCycle,dayCount){return BillCycle==2?dayCount:Bill});//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Annual percentage rate (APR) into Finance charge and the answer comes back as Current balance owed and Daily interest rate. There is no hidden constant here: change current balance owed and annual percentage rate (APR) moves with it. The main result, Current balance owed, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Finance charge calculator works', 'html' => <<<'TXT'
            <p>Finance charge answers one question from 1 number, and the answer is Current balance owed, Daily interest rate and Finance charge per day.</p><p>The relationship it solves reads Daily interest rate = (1 ÷ 365) × Annual percentage rate (APR).</p><p>The result panel carries Current balance owed, Daily interest rate and Finance charge per day, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Annual percentage rate (APR)</strong> — in percent</li></ul><p>The answers come back as Current balance owed in USD, Daily interest rate in percent, Finance charge per day in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Daily interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Daily interest rate</strong> = <code>(1 ÷ 365) × Annual percentage rate (APR)</code></li><li><strong>Annual percentage rate (APR)</strong> = <code>365 × Daily interest rate</code></li><li><strong>Finance charge per day</strong> = <code>Current balance owed × Daily interest rate</code></li><li><strong>Current balance owed</strong> = <code>Finance charge per day ÷ Daily interest rate</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Daily interest rate</strong> = <code>(1 ÷ 365) × Annual percentage rate (APR)</code> — the form to use when Annual percentage rate (APR) are the values you have.</li><li><strong>Annual percentage rate (APR)</strong> = <code>365 × Daily interest rate</code> — the form to use when Daily interest rate are the values you have.</li><li><strong>Finance charge per day</strong> = <code>Current balance owed × Daily interest rate</code> — the form to use when Current balance owed and Daily interest rate are the values you have.</li><li><strong>Daily interest rate</strong> = <code>Finance charge per day ÷ Current balance owed</code> — the form to use when Finance charge per day and Current balance owed are the values you have.</li><li><strong>Current balance owed</strong> = <code>Finance charge per day ÷ Daily interest rate</code> — the form to use when Finance charge per day and Daily interest rate are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Daily interest rate, Annual percentage rate (APR) and Finance charge per day can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Annual percentage rate (APR) carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Current balance owed, Daily interest rate and Finance charge per day are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Annual percentage rate (APR) left as a guess.</strong> Anything typed into Annual percentage rate (APR) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Annual percentage rate (APR) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Finance charge form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Annual percentage rate (APR)</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Daily interest rate changes with it. Fill it from a measurement rather than a memory — Annual percentage rate (APR) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Current balance owed</strong> is a plain number. It is computed from Finance charge per day and Daily interest rate, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Daily interest rate</strong> is a percent figure. It is computed from Annual percentage rate (APR), so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Finance charge per day</strong> is a plain number. It is computed from Current balance owed and Daily interest rate, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Finance charge actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Annual percentage rate (APR) ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Annual percentage rate (APR) — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Current balance owed in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Current balance owed is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Annual percentage rate (APR) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Annual percentage rate (APR) and the number you are missing is Current balance owed and Daily interest rate.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/graham-number">Graham number Calculator</a>, <a href="/finance/gratuity">Gratuity Calculator</a> and <a href="/finance/gross-margin">Gross margin Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Finance charge is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Finance charge calculator work out?', 'a' => <<<'TXT'
            Current balance owed, Daily interest rate and Finance charge per day, from Annual percentage rate (APR). The relationship is Daily interest rate = (1 ÷ 365) × Annual percentage rate (APR).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Annual percentage rate (APR) (percent). Fill annual percentage rate (APR) and leave Current balance owed empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Daily interest rate, Annual percentage rate (APR), Finance charge per day and Current balance owed can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Current balance owed is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Annual percentage rate (APR) blank and the page solves for it, reporting Current balance owed instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Current balance owed keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/graham-number', 'name' => 'Graham number Calculator'],
            ['path' => '/finance/gratuity', 'name' => 'Gratuity Calculator'],
            ['path' => '/finance/gross-margin', 'name' => 'Gross margin Calculator'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * Smoker's CTC (cost to company)
 * /finance/smokers-ctc
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Smoker\'s CTC (cost to company)',
    'meta' => ['title' => 'Smoker\'s CTC (cost to company) — Formula & Results', 'description' => 'Smoker\'s CTC (cost to company) turns avg smoke time break, smoke breaks per day and period into daily wage and weekly wage. The answer is shown in USD.', 'h1' => 'Smoker\'s CTC (cost to company) Calculator', 'updated' => '2026-09-22'],
    'sections' => [
        [
            'title' => 'Time spent smoking at work',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'avg_smoke_time',
                            'label' => 'Avg smoke time break',
                            'type' => 'number',
                            'help' => 'Include time spent going to and from the smoking area.',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'breaks',
                            'label' => 'Smoke breaks per day',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'What is the employee\'s wage?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wage_selector',
                            'label' => 'Period',
                            'type' => 'select',
                            'options' => [
                                'Hourly' => '0',
                                'Daily' => '1',
                                'Weekly' => '2',
                                'Monthly' => '3',
                                'Yearly' => '4',
                            ],
                            'dataset' => 'Time period',
                            'control' => 'DROPDOWN',
                            'default' => 'Hourly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hourly_wage',
                            'label' => 'Hourly wage',
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
                            'name' => 'daily_wage',
                            'label' => 'Daily wage',
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
                            'name' => 'weekly_wage',
                            'label' => 'Weekly wage',
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
                            'name' => 'monthly_wage',
                            'label' => 'Monthly wage',
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
                            'name' => 'yearly_wage',
                            'label' => 'Yearly wage',
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
            'title' => 'How much do you earn?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hour_loss',
                            'label' => 'Hour loss',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Work day settings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hrs_per_day',
                            'label' => 'Hours worked per day',
                            'type' => 'number',
                            'suffix' => 'hrs / day',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days_per_week',
                            'label' => 'Days worked per week',
                            'type' => 'number',
                            'suffix' => 'days / wk',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'holiday',
                            'label' => 'Days holiday per year',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Time spent smoking',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'daily_time',
                            'label' => 'Daily',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weekly_time',
                            'label' => 'Weekly',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrsmin',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly_time',
                            'label' => 'Monthly',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrsmin',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yearly_time',
                            'label' => 'Yearly',
                            'type' => 'number',
                            'help' => 'Including holidays.',
                            'unit' => '19',
                            'unit_default' => 'dayshrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Money employee earned while smoking',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'daily_loss',
                            'label' => 'Daily',
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
                            'name' => 'weekly_loss',
                            'label' => 'Weekly',
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
                            'name' => 'monthly_loss',
                            'label' => 'Monthly',
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
                            'name' => 'yearly_loss',
                            'label' => 'Yearly',
                            'type' => 'number',
                            'help' => 'Including holidays.',
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
            'title' => 'How much do all these cigarettes cost?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cig_cost',
                            'label' => 'Cost of a pack of cigarettes',
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
                            'name' => 'number_cigs',
                            'label' => 'Number of cigarettes in a packet',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weekly_cost',
                            'label' => 'Weekly cost',
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
                            'name' => 'yearly_cost',
                            'label' => 'Yearly cost',
                            'type' => 'number',
                            'help' => 'Including holidays.',
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
                            'name' => 'life_cost',
                            'label' => 'Life expectancy cost',
                            'type' => 'number',
                            'help' => 'Assuming each cigarette shortens a life by 11 minutes.',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cigcost_per_day',
                            'label' => 'Cigcost per day',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'hour_loss = hourly_wage * avg_smoke_time / 3600',
            'results' => ['hourly_wage' => '3600*hour_loss/avg_smoke_time', 'hour_loss' => '(1/3600)*avg_smoke_time*hourly_wage', 'avg_smoke_time' => '3600*hour_loss/hourly_wage'],
        ],
        [
            'title' => 'daily_loss = hour_loss * breaks',
            'results' => ['daily_loss' => 'breaks*hour_loss', 'hour_loss' => 'daily_loss/breaks', 'breaks' => 'daily_loss/hour_loss'],
        ],
        [
            'title' => 'weekly_loss = daily_loss * days_per_week',
            'results' => ['weekly_loss' => 'daily_loss*days_per_week', 'days_per_week' => 'weekly_loss/daily_loss', 'daily_loss' => 'weekly_loss/days_per_week'],
        ],
        [
            'title' => 'monthly_loss = daily_loss * days_per_week * 52 / 12',
            'results' => ['monthly_loss' => '(13/3)*daily_loss*days_per_week', 'days_per_week' => '(3/13)*monthly_loss/daily_loss', 'daily_loss' => '(3/13)*monthly_loss/days_per_week'],
        ],
        [
            'title' => 'yearly_loss = daily_loss * ((days_per_week * 52) - holiday)',
            'results' => ['days_per_week' => '(1/52)*(daily_loss*holiday + yearly_loss)/daily_loss', 'daily_loss' => 'yearly_loss/(52*days_per_week - holiday)', 'holiday' => '52*days_per_week - yearly_loss/daily_loss', 'yearly_loss' => 'daily_loss*(52*days_per_week - holiday)'],
        ],
        [
            'title' => 'daily_time = avg_smoke_time * breaks',
            'results' => ['avg_smoke_time' => 'daily_time/breaks', 'breaks' => 'daily_time/avg_smoke_time', 'daily_time' => 'avg_smoke_time*breaks'],
        ],
        [
            'title' => 'weekly_time = daily_time * days_per_week',
            'results' => ['days_per_week' => 'weekly_time/daily_time', 'weekly_time' => 'daily_time*days_per_week', 'daily_time' => 'weekly_time/days_per_week'],
        ],
        [
            'title' => 'monthly_time = daily_time * days_per_week * 52 /12',
            'results' => ['monthly_time' => '(13/3)*daily_time*days_per_week', 'days_per_week' => '(3/13)*monthly_time/daily_time', 'daily_time' => '(3/13)*monthly_time/days_per_week'],
        ],
        [
            'title' => 'yearly_time = daily_time * ((days_per_week * 52) - holiday)',
            'results' => ['daily_time' => 'yearly_time/(52*days_per_week - holiday)', 'days_per_week' => '(1/52)*(daily_time*holiday + yearly_time)/daily_time', 'holiday' => '52*days_per_week - yearly_time/daily_time', 'yearly_time' => 'daily_time*(52*days_per_week - holiday)'],
        ],
        [
            'title' => 'cigcost_per_day = breaks * ( cig_cost / number_cigs)',
            'results' => ['cig_cost' => 'cigcost_per_day*number_cigs/breaks', 'breaks' => 'cigcost_per_day*number_cigs/cig_cost', 'cigcost_per_day' => 'breaks*cig_cost/number_cigs', 'number_cigs' => 'breaks*cig_cost/cigcost_per_day'],
        ],
        [
            'title' => 'weekly_cost = cigcost_per_day * days_per_week',
            'results' => ['days_per_week' => 'weekly_cost/cigcost_per_day', 'cigcost_per_day' => 'weekly_cost/days_per_week', 'weekly_cost' => 'cigcost_per_day*days_per_week'],
        ],
        [
            'title' => 'yearly_cost = cigcost_per_day * ((days_per_week * 52) - holiday)',
            'results' => ['yearly_cost' => 'cigcost_per_day*(52*days_per_week - holiday)', 'days_per_week' => '(1/52)*(cigcost_per_day*holiday + yearly_cost)/cigcost_per_day', 'holiday' => '52*days_per_week - yearly_cost/cigcost_per_day', 'cigcost_per_day' => 'yearly_cost/(52*days_per_week - holiday)'],
        ],
        [
            'title' => 'life_cost = breaks * 11 * days_per_week * 52 * 60',
            'results' => ['life_cost' => '34320*breaks*days_per_week', 'days_per_week' => '(1/34320)*life_cost/breaks', 'breaks' => '(1/34320)*life_cost/days_per_week'],
        ],
        [
            'title' => 'daily_wage = hourly_wage * hrs_per_day',
            'results' => ['hrs_per_day' => 'daily_wage/hourly_wage', 'hourly_wage' => 'daily_wage/hrs_per_day', 'daily_wage' => 'hourly_wage*hrs_per_day'],
        ],
        [
            'title' => 'weekly_wage = hourly_wage * hrs_per_day * days_per_week',
            'results' => ['hourly_wage' => 'weekly_wage/(days_per_week*hrs_per_day)', 'days_per_week' => 'weekly_wage/(hourly_wage*hrs_per_day)', 'hrs_per_day' => 'weekly_wage/(days_per_week*hourly_wage)', 'weekly_wage' => 'days_per_week*hourly_wage*hrs_per_day'],
        ],
        [
            'title' => 'monthly_wage = weekly_wage * (52 / 12)',
            'results' => ['monthly_wage' => '(13/3)*weekly_wage', 'weekly_wage' => '(3/13)*monthly_wage'],
        ],
        [
            'title' => 'yearly_wage = weekly_wage * 52',
            'results' => ['yearly_wage' => '52*weekly_wage', 'weekly_wage' => '(1/52)*yearly_wage'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Avg smoke time break and Hourly wage into Smoker's CTC (cost to company) and the answer comes back as Smoke breaks per day and Daily wage. Nothing is looked up on this page: smoke breaks per day is computed from avg smoke time break and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Smoker\'s CTC (cost to company) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Smoker&#039;s CTC (cost to company): it takes 2 numbers and reports Smoke breaks per day, Daily wage and Weekly wage.</p><p>Written with the labels from the form, Hour loss = (1 ÷ 3600) × Avg smoke time break × Hourly wage.</p><p>The answers are Smoke breaks per day, Daily wage, Weekly wage and Monthly wage; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Avg smoke time break</strong> — in minutes. Include time spent going to and from the smoking area.</li><li><strong>Hourly wage</strong> — in USD</li></ul><p>What you get back is Smoke breaks per day, Daily wage in USD, Weekly wage in USD, Monthly wage in USD, Yearly wage in USD, Hour loss, Hours worked per day in hrs / day, Days worked per week in days / wk, Days holiday per year, Daily in minutes, Weekly in hours / minutes, Monthly in hours / minutes, Yearly in days / hours, Daily in USD, Weekly in USD, Monthly in USD, Yearly in USD, Cost of a pack of cigarettes in USD, Number of cigarettes in a packet, Weekly cost in USD, Yearly cost in USD, Life expectancy cost in days, Cigcost per day, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Daily lists 5 options and opens on minutes. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Hour loss</strong> = <code>(1 ÷ 3600) × Avg smoke time break × Hourly wage</code></li><li><strong>Hourly wage</strong> = <code>3600 × Hour loss ÷ Avg smoke time break</code></li><li><strong>Avg smoke time break</strong> = <code>3600 × Hour loss ÷ Hourly wage</code></li><li><strong>Daily</strong> = <code>Smoke breaks per day × Hour loss</code></li><li><strong>Smoke breaks per day</strong> = <code>Daily ÷ Hour loss</code></li><li><strong>Weekly</strong> = <code>Daily × Days worked per week</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Hour loss</strong> = <code>(1 ÷ 3600) × Avg smoke time break × Hourly wage</code> — the form to use when Avg smoke time break and Hourly wage are the values you have.</li><li><strong>Hourly wage</strong> = <code>3600 × Hour loss ÷ Avg smoke time break</code> — the form to use when Hour loss and Avg smoke time break are the values you have.</li><li><strong>Avg smoke time break</strong> = <code>3600 × Hour loss ÷ Hourly wage</code> — the form to use when Hour loss and Hourly wage are the values you have.</li><li><strong>Daily</strong> = <code>Smoke breaks per day × Hour loss</code> — the form to use when Smoke breaks per day and Hour loss are the values you have.</li><li><strong>Hour loss</strong> = <code>Daily ÷ Smoke breaks per day</code> — the form to use when Daily and Smoke breaks per day are the values you have.</li><li><strong>Smoke breaks per day</strong> = <code>Daily ÷ Hour loss</code> — the form to use when Daily and Hour loss are the values you have.</li><li><strong>Weekly</strong> = <code>Daily × Days worked per week</code> — the form to use when Daily and Days worked per week are the values you have.</li><li><strong>Days worked per week</strong> = <code>Weekly ÷ Daily</code> — the form to use when Weekly and Daily are the values you have.</li></ul><p>Any one of Hour loss, Hourly wage and Avg smoke time break can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Avg smoke time break carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Smoke breaks per day, Daily wage and Weekly wage are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Avg smoke time break left as a guess.</strong> Anything typed into Avg smoke time break is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Hourly wage left as a guess.</strong> Anything typed into Hourly wage is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Avg smoke time break is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Avg smoke time break</strong> is a minutes quantity: the page opens it in min and converts anything else you pick before the formula runs. Include time spent going to and from the smoking area. The page reads it when it works out Hourly wage, Hour loss and Smoke breaks per day. Have it to hand before you start: Avg smoke time break is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hourly wage</strong> takes a plain number with no unit attached. The page reads it when it works out Hour loss, Avg smoke time break and Hours worked per day. Have it to hand before you start: Hourly wage is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Avg smoke time break and Hourly wage. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Avg smoke time break into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Smoke breaks per day with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Smoke breaks per day is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover minutes. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Avg smoke time break and Hourly wage is what you already know and Smoke breaks per day and Daily wage is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/apr">APR</a>, <a href="/finance/apy">APY</a> and <a href="/finance/arm-mortgage">ARM mortgage Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Smoker&#039;s CTC (cost to company) is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Avg smoke time break and Hourly wage beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Smoker\'s CTC (cost to company) calculator work out?', 'a' => <<<'TXT'
            Smoke breaks per day, Daily wage, Weekly wage and Monthly wage, from Avg smoke time break and Hourly wage. The relationship is Hour loss = (1 ÷ 3600) × Avg smoke time break × Hourly wage.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Avg smoke time break (minutes), Hourly wage (USD). Fill avg smoke time break and hourly wage and leave Smoke breaks per day empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Hour loss, Hourly wage, Avg smoke time break and Daily blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Smoke breaks per day is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Avg smoke time break left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Smoke breaks per day keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/apr', 'name' => 'APR'],
            ['path' => '/finance/apy', 'name' => 'APY'],
            ['path' => '/finance/arm-mortgage', 'name' => 'ARM mortgage Calculator'],
        ],
        'authors' => [],
    ],
];

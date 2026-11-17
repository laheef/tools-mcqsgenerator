<?php

/**
 * Gratuity
 * /finance/gratuity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Gratuity',
    'meta' => ['title' => 'Gratuity Calculator: Formula, Steps & Examples', 'description' => 'Gratuity takes final month\'s salary + D.A. and how long did you work? and returns total gratuity. Results come back in USD, with any other unit a click away.', 'h1' => 'Gratuity Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_month_salary',
                            'label' => 'Final month\'s salary + D.A.',
                            'type' => 'number',
                            'help' => 'Enter the salary from your final month of work, plus the dearness allowance (D.A.), an additional payment to help protect income from inflation.',
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
                            'name' => 'work_tenure',
                            'label' => 'How long did you work?',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            Enter your total length of service with the company. The gratuity is calculated based on full years of service, but you don't need to round the figures yourself: the calculator will do it automatically for you.
                            TXT,
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gratuity',
                            'label' => 'Total gratuity',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            Gratuity is a benefit paid by employers after at least five years of service. It is a supplement to retirement benefits. In India, gratuity above ₹2,000,000 is taxable.
                            TXT,
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
            'title' => 'Step-by-step calculation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'months_remainder < 6', 'text' => <<<'TXT'
                                Determine your service time. You worked {{years_remainder_less_6.value}} years and {{months_remainder.value}} months. Since {{months_remainder.value}} months is less than 6 months, we count {{years_remainder_less_6.value}} full years for the calculation. (If you had worked 6 months or more, we'd round it up to the next full year.) Identify your salary base. We use your final month's salary plus de
                                TXT],
                                ['when' => 'months_remainder > 6', 'text' => <<<'TXT'
                                Determine your service time. You worked {{years_remainder_less_6.value}} years and {{months_remainder.value}} months. Because {{months_remainder.value}} months is more than 6 months, we round it up and count {{years_remainder_more_6.value}} full years for the calculation. (If you had worked less than 6 months, we'd round it down instead.) Identify your salary base. We use your final month's salary
                                TXT],
                                ['when' => 'months_remainder == 6', 'text' => <<<'TXT'
                                Determine your service time. You worked {{years_remainder_less_6.value}} years and 6 months. Because you completed exactly 6 additional months, gratuity rules round it up to the next full year: that's {{years_remainder_more_6.value}} full years for the calculation. Identify your salary base. We use your final month's salary plus dearness allowance (if applicable): {{final_month_salary.monetaryValu
                                TXT],
                                ['when' => 'months_remainder == 0', 'text' => <<<'TXT'
                                Determine your service time. You worked {{years_remainder_less_6.value}} years and 0&nbsp;months. Since that's exactly {{years_remainder_less_6.value}} full years, the calculation uses {{years_remainder_less_6.value}} years (no rounding required). Identify your salary base. We use your final month's salary plus dearness allowance (if applicable): {{final_month_salary.monetaryValue}} Calculate your
                                TXT],
                                ['when' => 'months_remainder == 1', 'text' => <<<'TXT'
                                Determine your service time. You worked {{years_remainder_less_6.value}} years and {{months_remainder.value}} month. Since {{months_remainder.value}} month is less than 6 months, we count {{years_remainder_less_6.value}} full years for the calculation. (If you had worked 6 months or more, we'd round it up to the next full year.) Identify your salary base. We use your final month's salary plus dear
                                TXT],
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
                            'name' => 'months_remainder',
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
                            'name' => 'years_remainder_less_6',
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
                            'name' => 'years_remainder_more_6',
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
            'title' => 'gratuity = one_way(get_nr(work_tenure) * final_month_salary*15/26)',
            'results' => ['gratuity' => '((15/26)*final_month_salary*get_nr(work_tenure))'],
        ],
    ],
    'js' => '"use strict";omni.define("get_nr",function(n){return Math.round(n,0)});//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Gratuity takes Final month's salary + D.A and How long did you work? and returns Total gratuity. It is a single relationship that reads total gratuity out of final month's salary + D.A, not a table of canned results keyed by them. Units for Total gratuity default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Gratuity calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Gratuity: it takes 2 numbers and reports Total gratuity.</p><p>The relationship it solves reads Total gratuity = ((15 ÷ 26) × Final month&#039;s salary + D.A. × get_nr(How long did you work?)).</p><p>The result panel carries Total gratuity, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Final month&#039;s salary + D.A</strong> — in USD. Enter the salary from your final month of work, plus the dearness allowance (D.A.), an additional payment to help protect income from inflation.</li><li><strong>How long did you work?</strong> — in years / months. Enter your total length of service with the company. The gratuity is calculated based on full years of service, but you don&#039;t need to round the figures yourself: the calculator will do it automatically for you.</li></ul><p>The answer comes back as Total gratuity in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: How long did you work? offers 9 units and opens on years / months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total gratuity</strong> = <code>((15 ÷ 26) × Final month&#039;s salary + D.A. × get_nr(How long did you work?))</code></li></ul>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside How long did you work? is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total gratuity is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Final month&#039;s salary + D.A left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Final month&amp;#039;s salary + D.A is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>How long did you work? left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If How long did you work? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Final month&#039;s salary + D.A. to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Gratuity form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Final month&#039;s salary + D.A</strong> takes a plain number with no unit attached. Enter the salary from your final month of work, plus the dearness allowance (D.A.), an additional payment to help protect income from inflation. The page reads it when it works out Total gratuity. Fill it from a measurement rather than a memory — Final month&#039;s salary + D.A is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>How long did you work?</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. Enter your total length of service with the company. The gratuity is calculated based on full years of service, but you don&#039;t need to round the figures yourself: the calculator will do it automatically for you. The page reads it when it works out Total gratuity. Fill it from a measurement rather than a memory — How long did you work? is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Total gratuity</strong> is a plain number. The value follows from Final month's salary + D.A and How long did you work?. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Gratuity actually offers.</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Final month&#039;s salary + D.A and How long did you work? ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Final month&amp;#039;s salary + D.A — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Total gratuity in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Total gratuity follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover years / months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Final month&#039;s salary + D.A and How long did you work? is what you already know and Total gratuity is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/revenue-per-employee">Revenue per employee</a>, <a href="/finance/rmd">RMD Calculator</a> and <a href="/finance/roa">ROA (return on assets)</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Gratuity is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Gratuity calculator work out?', 'a' => <<<'TXT'
            Total gratuity, from Final month's salary + D.A and How long did you work?. The relationship is Total gratuity = ((15 ÷ 26) × Final month's salary + D.A. × get_nr(How long did you work?)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Final month's salary + D.A (USD), How long did you work? (years / months). Fill final month's salary + D.A and how long did you work? and leave Total gratuity empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Total gratuity is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: Total gratuity is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Total gratuity keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/revenue-per-employee', 'name' => 'Revenue per employee'],
            ['path' => '/finance/rmd', 'name' => 'RMD Calculator'],
            ['path' => '/finance/roa', 'name' => 'ROA (return on assets)'],
        ],
        'authors' => [],
    ],
];

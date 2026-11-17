<?php

/**
 * Roth IRA
 * /finance/roth-ira
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Roth IRA',
    'meta' => ['title' => 'Roth IRA Calculator: Formula, Steps & Examples', 'description' => 'Roth IRA works out ineligible percent and max contribution and reports both. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Roth IRA Calculator', 'updated' => '2026-09-01'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Input in the calculator the parameters of your income, and we\'ll tell you the details of your Roth IRA account: contributions, amount at retirment, and more.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'magi',
                            'label' => 'Modified annual gross income (MAGI)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '198000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'age',
                            'label' => 'Current age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '32',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'retirement_age',
                            'label' => 'Retirement age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'taxFiling',
                            'label' => 'Tax filing',
                            'type' => 'select',
                            'options' => ['Single' => '124000', 'Married, filing jointly' => '196000', 'Married, filing separately' => '0'],
                            'dataset' => 'taxFiling2020',
                            'default' => 'Married, filing jointly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_rate',
                            'label' => 'Income tax rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '24',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'return_rate',
                            'label' => 'Annual return rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'threshold_level',
                            'label' => 'Threshold level',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'phaseout_level',
                            'label' => 'Phaseout level',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ineligible_percent',
                            'label' => 'Ineligible percent',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'max_contribution',
                            'label' => 'Max contribution',
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
                            'name' => 'contribution_years',
                            'label' => 'Contribution years',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eligible_contribution',
                            'label' => 'Eligible contribution',
                            'type' => 'number',
                            'help' => 'Maximum annual contribution you are eligible to make',
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
                            'name' => 'eligible_contribution_after_tax',
                            'label' => 'Eligible contribution after-tax',
                            'type' => 'number',
                            'help' => 'Maximum annual contribution after deducting income tax',
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
                            'name' => 'rothira_fv_annuitydue',
                            'label' => 'Roth IRA Balance at retirement',
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
    ],
    'formula' => [
        [
            'title' => 'ineligible_percent = (magi - threshold_level) / (phaseout_level - threshold_level)',
            'results' => ['threshold_level' => '(ineligible_percent*phaseout_level - magi)/(ineligible_percent - 1)', 'phaseout_level' => '(ineligible_percent*threshold_level + magi - threshold_level)/ineligible_percent', 'ineligible_percent' => '(magi - threshold_level)/(phaseout_level - threshold_level)', 'magi' => 'ineligible_percent*phaseout_level - ineligible_percent*threshold_level + threshold_level'],
        ],
        [
            'title' => 'max_contribution = catchup(age)',
            'results' => ['max_contribution' => 'catchup(age)'],
        ],
        [
            'title' => 'eligible_contribution = eligibility(ineligible_percent, max_contribution)',
            'results' => ['eligible_contribution' => 'eligibility(ineligible_percent, catchup(age))'],
        ],
        [
            'title' => 'eligible_contribution_after_tax = one_way(eligible_contribution - (eligible_contribution * tax_rate))',
            'results' => ['eligible_contribution_after_tax' => '((1 - tax_rate)*eligibility(ineligible_percent, catchup(age)))'],
        ],
        [
            'title' => 'contribution_years = one_way(retirement_age - age)',
            'results' => ['contribution_years' => '(-age + retirement_age)'],
        ],
        [
            'title' => 'rothira_fv_annuitydue = one_way(eligible_contribution_after_tax * ((((1+return_rate)^contribution_years - 1)/return_rate) * (1 + return_rate)))',
            'results' => ['rothira_fv_annuitydue' => <<<'TXT'
            ((return_rate*(pow(return_rate + 1, (-age + retirement_age)) - 1) + pow(return_rate + 1, (-age + retirement_age)) - 1)*((1 - tax_rate)*eligibility(ineligible_percent, catchup(age)))/return_rate)
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("catchup",function(age){var seniorCitizen=50;if(age>=seniorCitizen){return 7000}else{return 6000}});omni.define("eligibility",function(ineligible_percent,max_contribution){var notEligible=1;var eligible=0;if(ineligible_percent<=eligible){return max_contribution}else if(ineligible_percent>=eligible&&ineligible_percent<notEligible){return max_contribution-max_contribution*ineligible_percent}else{return 0}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Modified annual gross income (MAGI), Current age and Retirement age into Roth IRA and the answer comes back as Threshold level and Phaseout level. There is no hidden constant here: change threshold level and modified annual gross income (MAGI) moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Roth IRA calculator works', 'html' => <<<'TXT'
            <p>Roth IRA answers one question from 12 numbers, and the answer is Threshold level and Phaseout level.</p><p>In the form&#039;s own words, Ineligible percent = (Modified annual gross income (MAGI) − Threshold level) ÷ (Phaseout level − Threshold level).</p><p>The answers are Threshold level and Phaseout level; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 12 boxes, and nothing else.</p><ul><li><strong>Modified annual gross income (MAGI)</strong> — in USD</li><li><strong>Current age</strong> — in years</li><li><strong>Retirement age</strong> — in years</li><li><strong>Tax filing</strong> — a plain number, no unit</li><li><strong>Income tax rate</strong> — in percent</li><li><strong>Annual return rate</strong> — in percent</li><li><strong>Ineligible percent</strong> — a plain number, no unit</li><li><strong>Max contribution</strong> — in USD</li><li><strong>Contribution years</strong> — a plain number, no unit</li><li><strong>Eligible contribution</strong> — in USD. Maximum annual contribution you are eligible to make</li><li><strong>Eligible contribution after-tax</strong> — in USD. Maximum annual contribution after deducting income tax</li><li><strong>Roth IRA Balance at retirement</strong> — in USD</li></ul><p>The answers come back as Threshold level, Phaseout level. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Current age = 32 years, Retirement age = 60 years, Tax filing = 196000, Income tax rate = 24 perc and Annual return rate = 7 perc — through the same formula and the panel reports <strong>Contribution years</strong> = 28.</p><ul><li><strong>Contribution years</strong> = 28</li></ul><p>The line behind those figures is <strong>Ineligible percent</strong> = <code>(Modified annual gross income (MAGI) − Threshold level) ÷ (Phaseout level − Threshold level)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Contribution years</strong> = 28. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Income tax rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Ineligible percent</strong> = <code>(Modified annual gross income (MAGI) − Threshold level) ÷ (Phaseout level − Threshold level)</code></li><li><strong>Threshold level</strong> = <code>(Ineligible percent × Phaseout level − Modified annual gross income (MAGI)) ÷ (Ineligible percent − 1)</code></li><li><strong>Phaseout level</strong> = <code>(Ineligible percent × Threshold level + Modified annual gross income (MAGI) − Threshold level) ÷ Ineligible percent</code></li><li><strong>Modified annual gross income (MAGI)</strong> = <code>Ineligible percent × Phaseout level − Ineligible percent × Threshold level + Threshold level</code></li><li><strong>Max contribution</strong> = <code>catchup(Current age)</code></li><li><strong>Eligible contribution</strong> = <code>eligibility(Ineligible percent, catchup(Current age))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Ineligible percent</strong> = <code>(Modified annual gross income (MAGI) − Threshold level) ÷ (Phaseout level − Threshold level)</code> — the form to use when Modified annual gross income (MAGI), Threshold level and Phaseout level are the values you have.</li><li><strong>Threshold level</strong> = <code>(Ineligible percent × Phaseout level − Modified annual gross income (MAGI)) ÷ (Ineligible percent − 1)</code> — the form to use when Ineligible percent, Phaseout level and Modified annual gross income (MAGI) are the values you have.</li><li><strong>Phaseout level</strong> = <code>(Ineligible percent × Threshold level + Modified annual gross income (MAGI) − Threshold level) ÷ Ineligible percent</code> — the form to use when Ineligible percent, Threshold level and Modified annual gross income (MAGI) are the values you have.</li><li><strong>Modified annual gross income (MAGI)</strong> = <code>Ineligible percent × Phaseout level − Ineligible percent × Threshold level + Threshold level</code> — the form to use when Ineligible percent, Phaseout level and Threshold level are the values you have.</li><li><strong>Max contribution</strong> = <code>catchup(Current age)</code> — the form to use when Current age are the values you have.</li><li><strong>Eligible contribution</strong> = <code>eligibility(Ineligible percent, catchup(Current age))</code> — the form to use when Ineligible percent and Current age are the values you have.</li><li><strong>Eligible contribution after-tax</strong> = <code>((1 − Income tax rate) × eligibility(Ineligible percent, catchup(Current age)))</code> — the form to use when Income tax rate, Ineligible percent and Current age are the values you have.</li><li><strong>Contribution years</strong> = <code>( − Current age + Retirement age)</code> — the form to use when Current age and Retirement age are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Ineligible percent, Threshold level and Phaseout level can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Current age from 32 to 64, leaving every other box alone. The panel moves from <strong>Contribution years</strong> 28 to <strong>Contribution years</strong> -4.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Income tax rate and Annual return rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Threshold level and Phaseout level are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Modified annual gross income (MAGI) left as a guess.</strong> Anything typed into Modified annual gross income (MAGI) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Current age left as a guess.</strong> Anything typed into Current age is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Modified annual gross income (MAGI) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Roth IRA form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Modified annual gross income (MAGI)</strong> takes a plain number with no unit attached. It feeds Threshold level, Phaseout level and Ineligible percent. Fill it from a measurement rather than a memory — Modified annual gross income (MAGI) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Current age</strong> is measured in years. It feeds Max contribution, Eligible contribution and Eligible contribution after-tax. Fill it from a measurement rather than a memory — Current age is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Retirement age</strong> is measured in years. It feeds Contribution years and Roth IRA Balance at retirement. Fill it from a measurement rather than a memory — Retirement age is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Tax filing</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Tax filing is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Income tax rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Eligible contribution after-tax and Roth IRA Balance at retirement. Fill it from a measurement rather than a memory — Income tax rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Annual return rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Roth IRA Balance at retirement. Fill it from a measurement rather than a memory — Annual return rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Ineligible percent</strong> takes a plain number with no unit attached. It feeds Threshold level, Phaseout level and Modified annual gross income (MAGI). Fill it from a measurement rather than a memory — Ineligible percent is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Max contribution</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Max contribution is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Contribution years</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Contribution years is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Eligible contribution</strong> takes a plain number with no unit attached. Maximum annual contribution you are eligible to make. Fill it from a measurement rather than a memory — Eligible contribution is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Eligible contribution after-tax</strong> takes a plain number with no unit attached. Maximum annual contribution after deducting income tax. Fill it from a measurement rather than a memory — Eligible contribution after-tax is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Roth IRA Balance at retirement</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Roth IRA Balance at retirement is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Threshold level</strong> is a plain number. The value follows from Ineligible percent, Phaseout level and Modified annual gross income (MAGI). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Phaseout level</strong> is a plain number. The value follows from Ineligible percent, Threshold level and Modified annual gross income (MAGI). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Threshold level is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Modified annual gross income (MAGI), Current age and Retirement age is what you already know and Threshold level and Phaseout level is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/gini-coefficient">Gini coefficient Calculator</a>, <a href="/finance/gmroi">GMROI</a> and <a href="/finance/gold-melt">Gold melt Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Roth IRA calculator work out?', 'a' => <<<'TXT'
            Threshold level and Phaseout level, from Modified annual gross income (MAGI), Threshold level and Phaseout level. The relationship is Ineligible percent = (Modified annual gross income (MAGI) − Threshold level) ÷ (Phaseout level − Threshold level).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Modified annual gross income (MAGI) (USD), Current age (years), Retirement age (years), Tax filing, Income tax rate (percent). Fill modified annual gross income (MAGI), current age and retirement age and leave Threshold level empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Ineligible percent, Threshold level, Phaseout level and Modified annual gross income (MAGI) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Contribution years = 28. That comes from the page's own defaults, entered in Modified annual gross income (MAGI); change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Threshold level is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Modified annual gross income (MAGI) blank and the page solves for it, reporting Threshold level instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Threshold level keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/gini-coefficient', 'name' => 'Gini coefficient Calculator'],
            ['path' => '/finance/gmroi', 'name' => 'GMROI'],
            ['path' => '/finance/gold-melt', 'name' => 'Gold melt Calculator'],
        ],
        'authors' => [],
    ],
];

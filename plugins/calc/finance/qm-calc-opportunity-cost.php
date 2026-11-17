<?php

/**
 * Opportunity cost
 * /finance/opportunity-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Opportunity cost',
    'meta' => ['title' => 'Opportunity cost — Formula, Steps & Examples', 'description' => 'Opportunity cost works out forgone investment earnings from money to spend. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Opportunity cost Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'unncost',
                            'label' => 'Money to spend',
                            'type' => 'number',
                            'help' => 'Amount of money you would like to spend on a product that is not an investment.',
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
            'title' => 'If I invest the money',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ret',
                            'label' => 'Annual return on savings',
                            'type' => 'number',
                            'help' => 'Yearly interest on investment.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Are you sure the return is negative?'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'years',
                            'label' => 'Investment period',
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
                        [
                            'name' => 'inctax',
                            'label' => 'Income tax',
                            'type' => 'number',
                            'help' => 'The percentage of your income that the government takes.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Are you sure the income tax rate is negative?'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'infl',
                            'label' => 'Annual inflation rate',
                            'type' => 'number',
                            'help' => 'Average price change of goods and services.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Negative inflation? OK, we assume you\'re simulating a deflationary scenario.'],
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
                            'name' => 'invear',
                            'label' => 'Forgone investment earnings',
                            'type' => 'number',
                            'help' => 'The before-tax amount that could have been earned on the investment.',
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
                            'name' => 'nomopp',
                            'label' => 'Nominal opportunity cost',
                            'type' => 'number',
                            'help' => 'The sum of the interest and the invested capital before tax.',
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
                            'name' => 'taxab',
                            'label' => 'Tax on capital gains',
                            'type' => 'number',
                            'help' => 'Tax to be paid on any capital gains.',
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
                            'name' => 'nomgai',
                            'label' => 'Nominal gains after tax',
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
                            'name' => 'netsav',
                            'label' => 'Total savings (after tax)',
                            'type' => 'number',
                            'help' => 'How much will your investment be worth after the investment period?',
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
                            'name' => 'oppco',
                            'label' => 'Opportunity cost — inflation adjusted',
                            'type' => 'number',
                            'help' => 'Sum of invested cash, and interest, after tax, and adjusted for inflation.',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'If you had invested that {{unncost.monetaryValue}} for {{amount_of_years.formattedValue}}&nbsp;'],
                                ['when' => null, 'text' => 'years,&nbsp;'],
                                ['when' => 'years == 1', 'text' => 'year,&nbsp;'],
                                ['when' => null, 'text' => <<<'TXT'
                                you would have earned an additional {{invear.monetaryValue}} from the interest collected on it ({{interest.monetaryValue}} with tax and inflation taken into account). It means that the opportunity cost of your spending is equal to {{oppco.monetaryValue}} You should ask yourself whether the item or service you want to buy is really worth {{oppco.monetaryValue}}
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'suplementary_metrics',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show suplementary metrics' => '1', '' => '0'],
                            'dataset' => 'Show suplementary metrics',
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
                            'name' => 'amount_of_years',
                            'label' => 'Amount of years',
                            'type' => 'presentation',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest',
                            'label' => 'Interest',
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
            'title' => 'taxab=invear*inctax/100',
            'results' => ['taxab' => '(1/100)*inctax*invear', 'invear' => '100*taxab/inctax', 'inctax' => '100*taxab/invear'],
        ],
        [
            'title' => 'netsav=unncost+nomgai',
            'results' => ['netsav' => 'nomgai + unncost', 'nomgai' => 'netsav - unncost', 'unncost' => 'netsav - nomgai'],
        ],
        [
            'title' => 'oppco=netsav*((1-infl/100)^years)',
            'results' => ['netsav' => 'pow(100, years)*oppco*pow(100 - infl, -years)', 'infl' => '100 - pow(pow(100, years)*oppco/netsav, 1/years)', 'oppco' => 'netsav*pow(1 - 1/100*infl, years)', 'years' => '-log(netsav/oppco)/log(1 - 1/100*infl)'],
        ],
        [
            'title' => 'nomopp=unncost*((1+ret/1200)^(years*12))',
            'results' => ['ret' => 'pow(-pow(1200, years)*pow(nomopp/unncost, 1/12), 1/years) - 1200', 'nomopp' => 'pow(8916100448256000000000000000000000000, -years)*unncost*pow(ret + 1200, 12*years)', 'unncost' => 'pow(8916100448256000000000000000000000000, years)*nomopp*pow(ret + 1200, -12*years)', 'years' => '-log(unncost/nomopp)/(12*log(ret + 1200) - log(8.916100448256e36))'],
        ],
        [
            'title' => 'invear=unncost*((1+ret/1200)^(years*12))-unncost',
            'results' => ['ret' => 'pow(pow(1200, 12*years)*(invear + unncost)/unncost, (1/12)/years) - 1200', 'invear' => '-unncost + pow(8916100448256000000000000000000000000, -years)*unncost*pow(ret + 1200, 12*years)', 'years' => '-log(unncost/(invear + unncost))/(12*log(ret + 1200) - log(8.916100448256e36))', 'unncost' => 'pow(8916100448256000000000000000000000000, years)*invear/(-pow(1200, 12*years) + pow(ret + 1200, 12*years))'],
        ],
        [
            'title' => 'nomgai=invear-taxab',
            'results' => ['taxab' => 'invear - nomgai', 'nomgai' => 'invear - taxab', 'invear' => 'nomgai + taxab'],
        ],
        [
            'title' => 'oppco=netsav*((1-infl/100)^years)',
            'results' => ['netsav' => 'pow(100, years)*oppco*pow(100 - infl, -years)', 'infl' => '100 - pow(pow(100, years)*oppco/netsav, 1/years)', 'oppco' => 'netsav*pow(1 - 1/100*infl, years)', 'years' => '-log(netsav/oppco)/log(1 - 1/100*infl)'],
        ],
        [
            'title' => 'interest = oppco - unncost',
            'results' => ['oppco' => 'interest + unncost', 'interest' => 'oppco - unncost', 'unncost' => '-interest + oppco'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Opportunity cost takes Income tax and Forgone investment earnings and returns Money to spend and Annual return on savings. The arithmetic is the whole method: money to spend is worked out from income tax by one formula, applied once. Money to spend comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Opportunity cost calculator works', 'html' => <<<'TXT'
            <p>The Opportunity cost calculator applies one relationship to 2 numbers and reports Money to spend, Annual return on savings and Investment period.</p><p>The relationship it solves reads Tax on capital gains = (1 ÷ 100) × Income tax × Forgone investment earnings.</p><p>What comes back is Money to spend, Annual return on savings, Investment period and Annual inflation rate — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Income tax</strong> — in percent. The percentage of your income that the government takes.</li><li><strong>Forgone investment earnings</strong> — in USD. The before-tax amount that could have been earned on the investment.</li></ul><p>The result boxes are Money to spend in USD, Annual return on savings in percent, Investment period in years / months, Annual inflation rate in percent, Nominal opportunity cost in USD, Tax on capital gains in USD, Nominal gains after tax in USD, Total savings (after tax) in USD, Opportunity cost — inflation adjusted in USD, Interest in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Annual return on savings offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Tax on capital gains</strong> = <code>(1 ÷ 100) × Income tax × Forgone investment earnings</code></li><li><strong>Forgone investment earnings</strong> = <code>100 × Tax on capital gains ÷ Income tax</code></li><li><strong>Income tax</strong> = <code>100 × Tax on capital gains ÷ Forgone investment earnings</code></li><li><strong>Total savings (after tax)</strong> = <code>Nominal gains after tax + Money to spend</code></li><li><strong>Nominal gains after tax</strong> = <code>Total savings (after tax) − Money to spend</code></li><li><strong>Money to spend</strong> = <code>Total savings (after tax) − Nominal gains after tax</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Tax on capital gains</strong> = <code>(1 ÷ 100) × Income tax × Forgone investment earnings</code> — the form to use when Income tax and Forgone investment earnings are the values you have.</li><li><strong>Forgone investment earnings</strong> = <code>100 × Tax on capital gains ÷ Income tax</code> — the form to use when Tax on capital gains and Income tax are the values you have.</li><li><strong>Income tax</strong> = <code>100 × Tax on capital gains ÷ Forgone investment earnings</code> — the form to use when Tax on capital gains and Forgone investment earnings are the values you have.</li><li><strong>Total savings (after tax)</strong> = <code>Nominal gains after tax + Money to spend</code> — the form to use when Nominal gains after tax and Money to spend are the values you have.</li><li><strong>Nominal gains after tax</strong> = <code>Total savings (after tax) − Money to spend</code> — the form to use when Total savings (after tax) and Money to spend are the values you have.</li><li><strong>Money to spend</strong> = <code>Total savings (after tax) − Nominal gains after tax</code> — the form to use when Total savings (after tax) and Nominal gains after tax are the values you have.</li><li><strong>Opportunity cost — inflation adjusted</strong> = <code>Total savings (after tax) × (1 − 1 ÷ 100 × Annual inflation rate)^(Investment period)</code> — the form to use when Total savings (after tax), Annual inflation rate and Investment period are the values you have.</li><li><strong>Total savings (after tax)</strong> = <code>(100)^(Investment period) × Opportunity cost — inflation adjusted × (100 − Annual inflation rate)^(− Investment period)</code> — the form to use when Investment period, Opportunity cost — inflation adjusted and Annual inflation rate are the values you have.</li></ul><p>Any one of Tax on capital gains, Forgone investment earnings and Income tax can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Income tax is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Money to spend, Annual return on savings and Investment period are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Income tax left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Income tax is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Forgone investment earnings left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Forgone investment earnings is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Income tax and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Income tax</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The percentage of your income that the government takes. Change it and Tax on capital gains and Forgone investment earnings changes with it. Have it to hand before you start: Income tax is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Forgone investment earnings</strong> takes a plain number with no unit attached. The before-tax amount that could have been earned on the investment. Change it and Tax on capital gains, Income tax and Annual return on savings changes with it. Have it to hand before you start: Forgone investment earnings is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Income tax and Forgone investment earnings. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Income tax into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Money to spend in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Money to spend is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent and years / months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Income tax and Forgone investment earnings and the number you are missing is Money to spend and Annual return on savings.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/pre-and-post-money-valuation">Pre and post-money valuation</a>, <a href="/finance/present-value">Present value Calculator</a> and <a href="/finance/annuity-present-value">Present value of annuity</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Opportunity cost calculator work out?', 'a' => <<<'TXT'
            Money to spend, Annual return on savings, Investment period and Annual inflation rate, from Income tax and Forgone investment earnings. The relationship is Tax on capital gains = (1 ÷ 100) × Income tax × Forgone investment earnings.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Income tax (percent), Forgone investment earnings (USD). Enter income tax and forgone investment earnings; Money to spend is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Tax on capital gains, Forgone investment earnings, Income tax and Total savings (after tax) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Money to spend is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Income tax left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Money to spend keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/pre-and-post-money-valuation', 'name' => 'Pre and post-money valuation'],
            ['path' => '/finance/present-value', 'name' => 'Present value Calculator'],
            ['path' => '/finance/annuity-present-value', 'name' => 'Present value of annuity'],
        ],
        'authors' => [],
    ],
];

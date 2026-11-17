<?php

/**
 * Systematic investment plan
 * /finance/sip-india
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Systematic investment plan',
    'meta' => ['title' => 'Systematic investment plan — Formula & Results', 'description' => 'Systematic investment plan works out total investment and maturity amount from monthly SIP amount (P), investment period (t) and expected rate of return (r).', 'h1' => 'Systematic investment plan Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly_investment',
                            'label' => 'Monthly SIP amount (P)',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'investment_period',
                            'label' => 'Investment period (t)',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rate',
                            'label' => 'Expected rate of return (r)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Return',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actual_investment',
                            'label' => 'Total investment',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maturity_amount',
                            'label' => 'Maturity amount',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amount_multiplied',
                            'label' => 'Investment multiplication factor',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'actual_investment=monthly_investment*investment_period*12',
            'results' => ['actual_investment' => '12*investment_period*monthly_investment', 'investment_period' => '(1/12)*actual_investment/monthly_investment', 'monthly_investment' => '(1/12)*actual_investment/investment_period'],
        ],
        [
            'title' => 'maturity_amount=monthly_investment*((1+ rate/1200)^(investment_period*12)-1)/(rate/1200)*(1+rate/1200)',
            'results' => ['maturity_amount' => <<<'TXT'
            pow(79496847203390844133441536000000000000000000000000000000000000000000000000, -investment_period)*monthly_investment*(pow(1200, 12*investment_period + 1)*pow(rate + 1200, 12*investment_period) - pow(1200, 24*investment_period + 1) - pow(79496847203390844133441536000000000000000000000000000000000000000000000000, investment_period)*rate + pow(8916100448256000000000000000000000000, investment_period)*rate*pow(rate + 1200, 12*investment_period))/rate
            TXT, 'monthly_investment' => <<<'TXT'
            pow(8916100448256000000000000000000000000, investment_period)*maturity_amount*rate/(-pow(1200, 12*investment_period)*rate - 1200*pow(1200, 12*investment_period) + rate*pow(rate + 1200, 12*investment_period) + 1200*pow(rate + 1200, 12*investment_period))
            TXT],
        ],
        [
            'title' => 'amount_multiplied=maturity_amount/actual_investment',
            'results' => ['maturity_amount' => 'actual_investment*amount_multiplied', 'amount_multiplied' => 'maturity_amount/actual_investment', 'actual_investment' => 'maturity_amount/amount_multiplied'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Systematic investment plan takes Monthly SIP amount (P) and Investment period (t) and returns Total investment and Maturity amount. It is a single relationship that reads total investment out of monthly SIP amount (P), not a table of canned results keyed by them. Units for Total investment default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Systematic investment plan calculator works', 'html' => <<<'TXT'
            <p>Systematic investment plan answers one question from 2 numbers, and the answer is Total investment, Maturity amount and Investment multiplication factor.</p><p>Written with the labels from the form, Total investment = 12 × Investment period (t) × Monthly SIP amount (P).</p><p>What comes back is Total investment, Maturity amount and Investment multiplication factor — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Monthly SIP amount (P)</strong> — in USD</li><li><strong>Investment period (t)</strong> — in years</li></ul><p>The answers come back as Total investment in USD, Maturity amount in USD, Investment multiplication factor. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Investment period (t) offers 5 units and opens on years, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total investment</strong> = <code>12 × Investment period (t) × Monthly SIP amount (P)</code></li><li><strong>Investment period (t)</strong> = <code>(1 ÷ 12) × Total investment ÷ Monthly SIP amount (P)</code></li><li><strong>Monthly SIP amount (P)</strong> = <code>(1 ÷ 12) × Total investment ÷ Investment period (t)</code></li><li><strong>Investment multiplication factor</strong> = <code>Maturity amount ÷ Total investment</code></li><li><strong>Maturity amount</strong> = <code>Total investment × Investment multiplication factor</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total investment</strong> = <code>12 × Investment period (t) × Monthly SIP amount (P)</code> — the form to use when Investment period (t) and Monthly SIP amount (P) are the values you have.</li><li><strong>Investment period (t)</strong> = <code>(1 ÷ 12) × Total investment ÷ Monthly SIP amount (P)</code> — the form to use when Total investment and Monthly SIP amount (P) are the values you have.</li><li><strong>Monthly SIP amount (P)</strong> = <code>(1 ÷ 12) × Total investment ÷ Investment period (t)</code> — the form to use when Total investment and Investment period (t) are the values you have.</li><li><strong>Investment multiplication factor</strong> = <code>Maturity amount ÷ Total investment</code> — the form to use when Maturity amount and Total investment are the values you have.</li><li><strong>Maturity amount</strong> = <code>Total investment × Investment multiplication factor</code> — the form to use when Total investment and Investment multiplication factor are the values you have.</li><li><strong>Total investment</strong> = <code>Maturity amount ÷ Investment multiplication factor</code> — the form to use when Maturity amount and Investment multiplication factor are the values you have.</li></ul><p>Any one of Total investment, Investment period (t) and Monthly SIP amount (P) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Investment period (t) is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total investment, Maturity amount and Investment multiplication factor are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Monthly SIP amount (P) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Monthly SIP amount (P) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Investment period (t) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Investment period (t) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Monthly SIP amount (P) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Monthly SIP amount (P)</strong> takes a plain number with no unit attached. Change it and Total investment, Investment period (t) and Maturity amount changes with it. Have it to hand before you start: Monthly SIP amount (P) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Investment period (t)</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. Change it and Total investment, Monthly SIP amount (P) and Maturity amount changes with it. Have it to hand before you start: Investment period (t) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Total investment</strong> is a plain number. It is computed from Investment period (t) and Monthly SIP amount (P), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Maturity amount</strong> is a plain number. It is computed from Investment period (t), Monthly SIP amount (P) and Expected rate of return (r), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Investment multiplication factor</strong> is a plain number. It is computed from Maturity amount and Total investment, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Monthly SIP amount (P) and Investment period (t). Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Monthly SIP amount (P) into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Total investment in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Total investment is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Monthly SIP amount (P) and Investment period (t) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Monthly SIP amount (P) and Investment period (t) and the number you are missing is Total investment and Maturity amount.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/ar-days">A/R days Calculator</a>, <a href="/finance/absence-percentage">Absence percentage Calculator</a> and <a href="/finance/accounting-profit">Accounting profit Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Systematic investment plan calculator work out?', 'a' => <<<'TXT'
            Total investment, Maturity amount and Investment multiplication factor, from Investment period (t) and Monthly SIP amount (P). The relationship is Total investment = 12 × Investment period (t) × Monthly SIP amount (P).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Monthly SIP amount (P) (USD), Investment period (t) (years). Fill monthly SIP amount (P) and investment period (t) and leave Total investment empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total investment, Investment period (t), Monthly SIP amount (P) and Maturity amount blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Total investment is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Monthly SIP amount (P) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Total investment keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/ar-days', 'name' => 'A/R days Calculator'],
            ['path' => '/finance/absence-percentage', 'name' => 'Absence percentage Calculator'],
            ['path' => '/finance/accounting-profit', 'name' => 'Accounting profit Calculator'],
        ],
        'authors' => [],
    ],
];

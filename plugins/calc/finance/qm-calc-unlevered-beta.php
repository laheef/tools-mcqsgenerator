<?php

/**
 * Unlevered beta
 * /finance/unlevered-beta
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Unlevered beta',
    'meta' => ['title' => 'Unlevered beta Calculator: Free, With Steps', 'description' => 'Unlevered beta works out corporate tax rate and D/E ratio from net income, pre-tax income and total debt. The formula is printed in the form\'s own words.', 'h1' => 'Unlevered beta Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => 'Corporate tax rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ni',
                            'label' => 'Net income',
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
                            'name' => 'pt_income',
                            'label' => 'Pre-tax income',
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
                            'name' => 'tax_rate',
                            'label' => 'Corporate tax rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Debt-to-equity ratio (D/E ratio)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'debt',
                            'label' => 'Total debt',
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
                            'name' => 'equity',
                            'label' => 'Total shareholders’ equity',
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
                            'name' => 'de',
                            'label' => 'D/E ratio',
                            'type' => 'number',
                            'suffix' => 'x',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Unlevered beta',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'l_beta',
                            'label' => 'Levered beta (equity beta)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'u_beta',
                            'label' => 'Unlevered beta',
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
            'title' => 'u_beta = l_beta / (1 + (1 - tax_rate) * de)',
            'results' => ['de' => '(-l_beta + u_beta)/(u_beta*(tax_rate - 1))', 'u_beta' => 'l_beta/(-de*tax_rate + de + 1)', 'l_beta' => 'u_beta*(-de*tax_rate + de + 1)', 'tax_rate' => '(de*u_beta - l_beta + u_beta)/(de*u_beta)'],
        ],
        [
            'title' => 'de = debt / equity',
            'results' => ['de' => 'debt/equity', 'equity' => 'debt/de', 'debt' => 'de*equity'],
        ],
        [
            'title' => 'tax_rate = 1 - (ni / pt_income)',
            'results' => ['ni' => 'pt_income*(-tax_rate + 1)', 'pt_income' => '-ni/(tax_rate - 1)', 'tax_rate' => '(-ni + pt_income)/pt_income'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Unlevered beta takes Corporate tax rate, D/E ratio and Levered beta (equity beta) and returns Net income and Pre-tax income. There is no hidden constant here: change net income and corporate tax rate moves with it. The main result, Net income, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Unlevered beta calculator works', 'html' => <<<'TXT'
            <p>Unlevered beta answers one question from 3 numbers, and the answer is Net income, Pre-tax income and Total debt.</p><p>The relationship it solves reads Unlevered beta = Levered beta (equity beta) ÷ ( − D/E ratio × Corporate tax rate + D/E ratio + 1).</p><p>The result panel carries Net income, Pre-tax income, Total debt and Total shareholders’ equity, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Corporate tax rate</strong> — in percent</li><li><strong>D/E ratio</strong> — in x</li><li><strong>Levered beta (equity beta)</strong> — a plain number, no unit</li></ul><p>The result boxes are Net income in USD, Pre-tax income in USD, Total debt in USD, Total shareholders’ equity in USD, Unlevered beta; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Net income = 10 USD, Pre-tax income = 100 USD, Corporate tax rate = 1000 perc, Total debt = 10 USD, Total shareholders’ equity = 100 USD, Levered beta (equity beta) = 1000 and Unlevered beta = 10; the answers are <strong>D/E ratio</strong> = -0.0991 x.</p><ul><li><strong>D/E ratio</strong> = -0.0991 x</li></ul><p>The line behind those figures is <strong>Unlevered beta</strong> = <code>Levered beta (equity beta) ÷ ( − D/E ratio × Corporate tax rate + D/E ratio + 1)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>D/E ratio</strong> = -0.0991 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Corporate tax rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Unlevered beta</strong> = <code>Levered beta (equity beta) ÷ ( − D/E ratio × Corporate tax rate + D/E ratio + 1)</code></li><li><strong>D/E ratio</strong> = <code>( − Levered beta (equity beta) + Unlevered beta) ÷ (Unlevered beta × (Corporate tax rate − 1))</code></li><li><strong>Levered beta (equity beta)</strong> = <code>Unlevered beta × ( − D/E ratio × Corporate tax rate + D/E ratio + 1)</code></li><li><strong>Corporate tax rate</strong> = <code>(D/E ratio × Unlevered beta − Levered beta (equity beta) + Unlevered beta) ÷ (D/E ratio × Unlevered beta)</code></li><li><strong>Total shareholders’ equity</strong> = <code>Total debt ÷ D/E ratio</code></li><li><strong>Total debt</strong> = <code>D/E ratio × Total shareholders’ equity</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Unlevered beta</strong> = <code>Levered beta (equity beta) ÷ ( − D/E ratio × Corporate tax rate + D/E ratio + 1)</code> — the form to use when Levered beta (equity beta), D/E ratio and Corporate tax rate are the values you have.</li><li><strong>D/E ratio</strong> = <code>( − Levered beta (equity beta) + Unlevered beta) ÷ (Unlevered beta × (Corporate tax rate − 1))</code> — the form to use when Levered beta (equity beta), Unlevered beta and Corporate tax rate are the values you have.</li><li><strong>Levered beta (equity beta)</strong> = <code>Unlevered beta × ( − D/E ratio × Corporate tax rate + D/E ratio + 1)</code> — the form to use when Unlevered beta, D/E ratio and Corporate tax rate are the values you have.</li><li><strong>Corporate tax rate</strong> = <code>(D/E ratio × Unlevered beta − Levered beta (equity beta) + Unlevered beta) ÷ (D/E ratio × Unlevered beta)</code> — the form to use when D/E ratio, Unlevered beta and Levered beta (equity beta) are the values you have.</li><li><strong>D/E ratio</strong> = <code>Total debt ÷ Total shareholders’ equity</code> — the form to use when Total debt and Total shareholders’ equity are the values you have.</li><li><strong>Total shareholders’ equity</strong> = <code>Total debt ÷ D/E ratio</code> — the form to use when Total debt and D/E ratio are the values you have.</li><li><strong>Total debt</strong> = <code>D/E ratio × Total shareholders’ equity</code> — the form to use when D/E ratio and Total shareholders’ equity are the values you have.</li><li><strong>Corporate tax rate</strong> = <code>( − Net income + Pre-tax income) ÷ Pre-tax income</code> — the form to use when Net income and Pre-tax income are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Unlevered beta, D/E ratio and Levered beta (equity beta) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Net income from 10 to 20, leaving every other box alone. The panel moves from <strong>D/E ratio</strong> -0.0991 x to <strong>D/E ratio</strong> -0.0991 x.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Corporate tax rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Net income, Pre-tax income and Total debt are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Corporate tax rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Corporate tax rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>D/E ratio left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If D/E ratio is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Corporate tax rate to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Unlevered beta form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Corporate tax rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and D/E ratio, Unlevered beta and Levered beta (equity beta) changes with it. Fill it from a measurement rather than a memory — Corporate tax rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>D/E ratio</strong> is measured in x. Change it and Unlevered beta, Levered beta (equity beta) and Corporate tax rate changes with it. Fill it from a measurement rather than a memory — D/E ratio is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Levered beta (equity beta)</strong> takes a plain number with no unit attached. Change it and D/E ratio, Unlevered beta and Corporate tax rate changes with it. Fill it from a measurement rather than a memory — Levered beta (equity beta) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Net income</strong> is a plain number. It is computed from Pre-tax income and Corporate tax rate, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Pre-tax income</strong> is a plain number. It is computed from Net income and Corporate tax rate, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total debt</strong> is a plain number. It is computed from D/E ratio and Total shareholders’ equity, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total shareholders’ equity</strong> is a plain number. It is computed from Total debt and D/E ratio, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Unlevered beta</strong> is a plain number. It is computed from Levered beta (equity beta), D/E ratio and Corporate tax rate, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Unlevered beta actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Net income follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Corporate tax rate, D/E ratio and Levered beta (equity beta) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Corporate tax rate, D/E ratio and Levered beta (equity beta) and the number you are missing is Net income and Pre-tax income.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/payback-period">Payback period</a>, <a href="/finance/payday-loan">Payday loan Calculator</a> and <a href="/finance/paypal-fee">Paypal fee Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Unlevered beta calculator work out?', 'a' => <<<'TXT'
            Net income, Pre-tax income, Total debt and Total shareholders’ equity, from Levered beta (equity beta), D/E ratio and Corporate tax rate. The relationship is Unlevered beta = Levered beta (equity beta) ÷ ( − D/E ratio × Corporate tax rate + D/E ratio + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Corporate tax rate (percent), D/E ratio (x), Levered beta (equity beta). Fill corporate tax rate, d/E ratio and levered beta (equity beta) and leave Net income empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Unlevered beta, D/E ratio, Levered beta (equity beta) and Corporate tax rate can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'D/E ratio = -0.0991 x. That comes from the page\'s own defaults, entered in Corporate tax rate; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Net income is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Corporate tax rate blank and the page solves for it, reporting Net income instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Net income keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/payback-period', 'name' => 'Payback period'],
            ['path' => '/finance/payday-loan', 'name' => 'Payday loan Calculator'],
            ['path' => '/finance/paypal-fee', 'name' => 'Paypal fee Calculator'],
        ],
        'authors' => [],
    ],
];

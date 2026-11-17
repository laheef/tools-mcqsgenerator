<?php

/**
 * PPP (purchasing power parity)
 * /finance/ppp
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'PPP (purchasing power parity)',
    'meta' => ['title' => 'PPP (purchasing power parity) — Formula & Results', 'description' => 'PPP (purchasing power parity) takes source country and returns adjusted salary. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'PPP (purchasing power parity) Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PLI_A',
                            'label' => 'Source country',
                            'type' => 'select',
                            'options' => [
                                'Australia (AUD)' => '90.5',
                                'Austria (EUR)' => '82.0',
                                'Belgium (EUR)' => '81.4',
                                'Brazil (BRL)' => '45.7',
                                'Canada (CAD)' => '83.4',
                                'Chile (CLP)' => '47.6',
                                'China (People\'s Republic of)' => '47.3',
                                'Colombia (COP)' => '37.8',
                                'Costa Rica (CRC)' => '59.1',
                                'Czech Republic (CZK)' => '59.4',
                                'Denmark (DKK)' => '92.5',
                                'Estonia (EUR)' => '66.1',
                                'Finland (EUR)' => '85.2',
                                'France (EUR)' => '76.6',
                                'Germany (EUR)' => '80.2',
                                'Greece (EUR)' => '59.5',
                                'Hungary (HUF)' => '52.0',
                                'Iceland (ISK)' => '117.8',
                                'India (INR)' => '23',
                                'Indonesia (IDR)' => '28.7',
                                'Ireland (EUR)' => '84.8',
                                'Israel (ILS)' => '101',
                                'Italy (EUR)' => '69',
                                'Japan (JPY)' => '64.9',
                                'South Korea (KRW)' => '57.4',
                                'Latvia (EUR)' => '57',
                                'Lithuania (EUR)' => '58',
                                'Luxembourg (EUR)' => '94.1',
                                'Mexico (MXN)' => '53.7',
                                'Netherlands (EUR)' => '84.4',
                                'New Zealand (NZD)' => '86.5',
                                'Norway (NOK)' => '90.9',
                                'Poland (PLN)' => '52.4',
                                'Portugal (EUR)' => '60.4',
                                'Russia (RUB)' => '35.4',
                                'Slovakia (EUR)' => '57.9',
                                'Slovenia (EUR)' => '63.1',
                                'South Africa (ZAR)' => '41.5',
                                'Spain (EUR)' => '64.5',
                                'Sweden (SEK)' => '87',
                                'Switzerland (CHF)' => '112',
                                'Türkiye (TRY)' => '41.1',
                                'United Kingdom (GBP)' => '89.2',
                                'United States (USD)' => '100',
                            ],
                            'dataset' => 'Countries',
                            'control' => 'DROPDOWN',
                            'help' => 'Select the country you want to compare the salary from.',
                            'default' => 'United States (USD)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PPP',
                            'label' => 'Ppp',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'AMOUNT_A',
                            'label' => 'Salary',
                            'type' => 'number',
                            'help' => 'Input the salary amount in the source country\'s currency.',
                            'unit' => '341',
                            'unit_default' => 'annual',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'AMOUNT_B',
                            'label' => 'Adjusted salary',
                            'type' => 'number',
                            'help' => 'Salary adjusted for purchasing power in the target country.',
                            'unit' => '341',
                            'unit_default' => 'annual',
                            'readonly' => true,
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'AMOUNT_B > AMOUNT_A', 'text' => <<<'TXT'
                                Your PPP equals {{PPP.formattedValue}}, which means that you have more purchasing power in the source country, meaning you can afford more goods and services compared to the target country. Please note that the values in our calculator reflect the national average. Conditions may differ in less developed areas or larger cities.&nbsp;
                                TXT],
                                ['when' => 'AMOUNT_B < AMOUNT_A', 'text' => <<<'TXT'
                                Your PPP equals {{PPP.formattedValue}}, which means that you have more purchasing power in the target country, meaning you can afford more goods and services compared to the source country. Please note that the values in our calculator reflect the national average. Conditions may differ in less developed areas or larger cities.
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
                            'name' => 'PLI_B',
                            'label' => 'Target country',
                            'type' => 'select',
                            'options' => [
                                'Australia (AUD)' => '90.5',
                                'Austria (EUR)' => '82.0',
                                'Belgium (EUR)' => '81.4',
                                'Brazil (BRL)' => '45.7',
                                'Canada (CAD)' => '83.4',
                                'Chile (CLP)' => '47.6',
                                'China (People\'s Republic of)' => '47.3',
                                'Colombia (COP)' => '37.8',
                                'Costa Rica (CRC)' => '59.1',
                                'Czech Republic (CZK)' => '59.4',
                                'Denmark (DKK)' => '92.5',
                                'Estonia (EUR)' => '66.1',
                                'Finland (EUR)' => '85.2',
                                'France (EUR)' => '76.6',
                                'Germany (EUR)' => '80.2',
                                'Greece (EUR)' => '59.5',
                                'Hungary (HUF)' => '52.0',
                                'Iceland (ISK)' => '117.8',
                                'India (INR)' => '23',
                                'Indonesia (IDR)' => '28.7',
                                'Ireland (EUR)' => '84.8',
                                'Israel (ILS)' => '101',
                                'Italy (EUR)' => '69',
                                'Japan (JPY)' => '64.9',
                                'South Korea (KRW)' => '57.4',
                                'Latvia (EUR)' => '57',
                                'Lithuania (EUR)' => '58',
                                'Luxembourg (EUR)' => '94.1',
                                'Mexico (MXN)' => '53.7',
                                'Netherlands (EUR)' => '84.4',
                                'New Zealand (NZD)' => '86.5',
                                'Norway (NOK)' => '90.9',
                                'Poland (PLN)' => '52.4',
                                'Portugal (EUR)' => '60.4',
                                'Russia (RUB)' => '35.4',
                                'Slovakia (EUR)' => '57.9',
                                'Slovenia (EUR)' => '63.1',
                                'South Africa (ZAR)' => '41.5',
                                'Spain (EUR)' => '64.5',
                                'Sweden (SEK)' => '87',
                                'Switzerland (CHF)' => '112',
                                'Türkiye (TRY)' => '41.1',
                                'United Kingdom (GBP)' => '89.2',
                                'United States (USD)' => '100',
                            ],
                            'dataset' => 'Countries',
                            'control' => 'DROPDOWN',
                            'default' => 'Canada (CAD)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rate',
                            'label' => 'Exchange rate',
                            'type' => 'number',
                            'help' => 'Input the most recent exchange rate between the source currency and the target currency to get your result in the target currency.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Amount_Local2',
                            'label' => 'Adjusted salary',
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
            'title' => 'PLI_B/PLI_A=PPP',
            'results' => ['PLI_B' => 'PLI_A*PPP', 'PPP' => 'PLI_B/PLI_A', 'PLI_A' => 'PLI_B/PPP'],
        ],
        [
            'title' => 'PPP*AMOUNT_A=AMOUNT_B',
            'results' => ['PPP' => 'AMOUNT_B/AMOUNT_A', 'AMOUNT_B' => 'AMOUNT_A*PPP', 'AMOUNT_A' => 'AMOUNT_B/PPP'],
        ],
        [
            'title' => 'rate*AMOUNT_B=Amount_Local2',
            'results' => ['rate' => 'Amount_Local2/AMOUNT_B', 'AMOUNT_B' => 'Amount_Local2/rate', 'Amount_Local2' => 'AMOUNT_B*rate'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        PPP (purchasing power parity) turns Source country, Ppp and Salary into Adjusted salary. It is a single relationship that reads adjusted salary out of source country, not a table of canned results keyed by them. Units for Adjusted salary default to annual and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the PPP (purchasing power parity) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind PPP (purchasing power parity): it takes 6 numbers and reports Adjusted salary.</p><p>The relationship it solves reads Target country = Source country × Ppp.</p><p>What comes back is Adjusted salary — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs.</p><ul><li><strong>Source country</strong> — a plain number, no unit. Select the country you want to compare the salary from.</li><li><strong>Ppp</strong> — a plain number, no unit</li><li><strong>Salary</strong> — in annual. Input the salary amount in the source country&#039;s currency.</li><li><strong>Target country</strong> — a plain number, no unit</li><li><strong>Exchange rate</strong> — a plain number, no unit. Input the most recent exchange rate between the source currency and the target currency to get your result in the target currency.</li><li><strong>Adjusted salary</strong> — in annual</li></ul><p>What you get back is Adjusted salary in annual, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Source country = 100, Ppp = 10, Salary = 100 annual, Exchange rate = 1000 and Adjusted salary = 10 annual; the answers are <strong>Target country</strong> = 83.4 and <strong>Adjusted salary</strong> = 1000 annual.</p><ul><li><strong>Target country</strong> = 83.4</li><li><strong>Adjusted salary</strong> = 1000 annual</li></ul><p>That is <strong>Target country</strong> = <code>Source country × Ppp</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Target country</strong> = 83.4 and <strong>Adjusted salary</strong> = 1000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Adjusted salary offers 4 units and opens on annual, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Target country</strong> = <code>Source country × Ppp</code></li><li><strong>Ppp</strong> = <code>Target country ÷ Source country</code></li><li><strong>Source country</strong> = <code>Target country ÷ Ppp</code></li><li><strong>Adjusted salary</strong> = <code>Salary × Ppp</code></li><li><strong>Salary</strong> = <code>Adjusted salary ÷ Ppp</code></li><li><strong>Exchange rate</strong> = <code>Adjusted salary ÷ Adjusted salary</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Target country</strong> = <code>Source country × Ppp</code> — the form to use when Source country and Ppp are the values you have.</li><li><strong>Ppp</strong> = <code>Target country ÷ Source country</code> — the form to use when Target country and Source country are the values you have.</li><li><strong>Source country</strong> = <code>Target country ÷ Ppp</code> — the form to use when Target country and Ppp are the values you have.</li><li><strong>Ppp</strong> = <code>Adjusted salary ÷ Salary</code> — the form to use when Adjusted salary and Salary are the values you have.</li><li><strong>Adjusted salary</strong> = <code>Salary × Ppp</code> — the form to use when Salary and Ppp are the values you have.</li><li><strong>Salary</strong> = <code>Adjusted salary ÷ Ppp</code> — the form to use when Adjusted salary and Ppp are the values you have.</li><li><strong>Exchange rate</strong> = <code>Adjusted salary ÷ Adjusted salary</code> — the form to use when Adjusted salary and Adjusted salary are the values you have.</li><li><strong>Adjusted salary</strong> = <code>Adjusted salary ÷ Exchange rate</code> — the form to use when Adjusted salary and Exchange rate are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Target country, Ppp and Source country can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Source country from 100 to 200, leaving every other box alone. The panel moves from <strong>Target country</strong> 83.4 and <strong>Adjusted salary</strong> 1000 annual to <strong>Target country</strong> 83.4 and <strong>Adjusted salary</strong> 1000 annual.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Salary and Adjusted salary is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Adjusted salary is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Source country left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Source country is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Ppp left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Ppp is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Source country to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Source country</strong> takes a plain number with no unit attached. Select the country you want to compare the salary from. The page reads it when it works out Target country and Ppp. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Source country is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Ppp</strong> takes a plain number with no unit attached. The page reads it when it works out Target country, Source country and Adjusted salary. Have it to hand before you start: Ppp is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Salary</strong> is a annual quantity: the page opens it in annual and converts anything else you pick before the formula runs. Input the salary amount in the source country&#039;s currency. The page reads it when it works out Ppp and Adjusted salary. Have it to hand before you start: Salary is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Target country</strong> takes a plain number with no unit attached. The page reads it when it works out Ppp and Source country. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Target country is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Exchange rate</strong> takes a plain number with no unit attached. Input the most recent exchange rate between the source currency and the target currency to get your result in the target currency. The page reads it when it works out Adjusted salary and Adjusted salary. Have it to hand before you start: Exchange rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Adjusted salary</strong> is a annual quantity: the page opens it in annual and converts anything else you pick before the formula runs. The page reads it when it works out Exchange rate and Adjusted salary. Have it to hand before you start: Adjusted salary is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Adjusted salary</strong> is a annual figure and the page's own defaults put it at 1000 annual. It is worked out from Salary and Ppp. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Target country</th><th>Adjusted salary</th></tr></thead><tbody><tr><td><strong>Source country</strong> +10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Ppp</strong> +10%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Salary</strong> +10%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Exchange rate</strong> +10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Adjusted salary</strong> +10%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Salary sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Source country, Exchange rate and Adjusted salary barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Source country = 50, Ppp = 5, Salary = 50 annual, Exchange rate = 500 and Adjusted salary = 5 annual, the answer is <strong>Target country</strong> = 83.4 and <strong>Adjusted salary</strong> = 250 annual.</li><li>With Source country = 300, Ppp = 10, Salary = 100 annual, Exchange rate = 1000 and Adjusted salary = 10 annual, the answer is <strong>Target country</strong> = 83.4 and <strong>Adjusted salary</strong> = 1000 annual.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>annual</strong> — opens in <em>annual</em>, and the chip also carries /week, /hour and /month. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Adjusted salary follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are annual and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Source country, Ppp and Salary are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Source country, Ppp and Salary measured, Adjusted salary wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/ebitda-multiple">EBITDA multiple</a>, <a href="/finance/economic-injury-disaster-loan">Economic Injury Disaster Loan Emergency Advance … Calculator</a> and <a href="/finance/eoq">Economic order quantity (EOQ) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the PPP (purchasing power parity) calculator work out?', 'a' => 'Adjusted salary, from Source country and Ppp. The relationship is Target country = Source country × Ppp.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Source country, Ppp, Salary (annual), Target country, Exchange rate. With source country, ppp and salary in place, Adjusted salary can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Target country, Ppp, Source country and Adjusted salary can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Target country = 83.4 and Adjusted salary = 1000 annual. The figures come from Source country as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Adjusted salary is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Source country left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Adjusted salary keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/ebitda-multiple', 'name' => 'EBITDA multiple'],
            ['path' => '/finance/economic-injury-disaster-loan', 'name' => 'Economic Injury Disaster Loan Emergency Advance … Calculator'],
            ['path' => '/finance/eoq', 'name' => 'Economic order quantity (EOQ) Calculator'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * Cap rate
 * /finance/cap-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cap rate',
    'meta' => ['title' => 'Cap rate Calculator — Formula, Units & Example', 'description' => 'Cap rate works out operating expenses (percentage) from property value and annual gross income. Every box can be solved for, not only the one in the title.', 'h1' => 'Cap rate Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'property_value == 250000 and gross_rental_income == 30000 and percent_operating_expenses == 0.3 and percent_vacancy_rate == 0.05', 'text' => <<<'TXT'
                                Onim Example 1: Rental property — A rental property is worth $250,000 and generates $30,000 in annual gross rental income. Operating expenses represent 30% of the gross income, and a 5% vacancy rate during the year. What are the property’s annual net income and its cap rate?&nbsp;
                                TXT],
                                ['when' => 'property_value == 1200000 and gross_rental_income == 144000 and percent_operating_expenses == 0.35 and percent_vacancy_rate == 0.10', 'text' => <<<'TXT'
                                Onim Example 2: Commercial property — A commercial property is valued at $1,200,000 and generates $144,000 in annual gross income. Operating expenses account for 35% of the gross income, and the vacancy rate is 10%. What are the property’s annual net income and its cap rate?
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'property_value',
                            'label' => 'Property value',
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
                            'name' => 'gross_rental_income',
                            'label' => 'Annual gross income',
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
                            'name' => 'percent_operating_expenses',
                            'label' => 'Operating expenses (percentage)',
                            'type' => 'number',
                            'help' => 'Expressed as percentage of the gross income.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'operating_expenses',
                            'label' => 'Operating expenses (total)',
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
                            'name' => 'percent_vacancy_rate',
                            'label' => 'Vacancy rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net_rental_income',
                            'label' => 'Annual net income',
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
                            'name' => 'cap_rate',
                            'label' => 'Cap rate',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => <<<'TXT'
                                (property_value == 250000 and gross_rental_income == 30000 and percent_operating_expenses == 0.3 and percent_vacancy_rate == 0.05) or (property_value == 1200000 and gross_rental_income == 144000 and percent_operating_expenses == 0.35 and percent_vacancy_rate == 0.10)
                                TXT, 'text' => <<<'TXT'
                                How the result is calculated: Calculate the annual net income: Annual net income = Annual gross income × (1 − Operating&nbsp;expenses&nbsp;%) × (1 − Vacancy&nbsp;rate&nbsp;%) Determine the cap rate: Cap rate = Annual net income / Property value
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
                        ['type' => 'note', 'text' => 'Check our examples: • Example 1 ⧉ — Rental property • Example 2 ⧉ — Commercial property'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'net_rental_income/property_value = cap_rate',
            'results' => ['property_value' => 'net_rental_income/cap_rate', 'cap_rate' => 'net_rental_income/property_value', 'net_rental_income' => 'cap_rate*property_value'],
        ],
        [
            'title' => '(1 - percent_operating_expenses) * (1 - percent_vacancy_rate) * gross_rental_income = net_rental_income',
            'results' => ['percent_operating_expenses' => '(gross_rental_income*percent_vacancy_rate - gross_rental_income + net_rental_income)/(gross_rental_income*(percent_vacancy_rate - 1))', 'gross_rental_income' => 'net_rental_income/(percent_operating_expenses*percent_vacancy_rate - percent_operating_expenses - percent_vacancy_rate + 1)', 'percent_vacancy_rate' => '(gross_rental_income*percent_operating_expenses - gross_rental_income + net_rental_income)/(gross_rental_income*(percent_operating_expenses - 1))', 'net_rental_income' => 'gross_rental_income*(percent_operating_expenses*percent_vacancy_rate - percent_operating_expenses - percent_vacancy_rate + 1)'],
        ],
        [
            'title' => 'percent_operating_expenses = operating_expenses/gross_rental_income',
            'results' => ['percent_operating_expenses' => 'operating_expenses/gross_rental_income', 'gross_rental_income' => 'operating_expenses/percent_operating_expenses', 'operating_expenses' => 'gross_rental_income*percent_operating_expenses'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cap rate turns Annual gross income and Operating expenses (total) into Property value and Operating expenses (percentage). Nothing is looked up on this page: property value is computed from annual gross income and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Property value is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Cap rate calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Cap rate: it takes 2 numbers and reports Property value, Operating expenses (percentage) and Vacancy rate.</p><p>The relationship it solves reads Property value = Annual net income ÷ Cap rate.</p><p>The result panel carries Property value, Operating expenses (percentage), Vacancy rate and Annual net income, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Annual gross income</strong> — in USD</li><li><strong>Operating expenses (total)</strong> — in USD</li></ul><p>What you get back is Property value in USD, Operating expenses (percentage) in percent, Vacancy rate in percent, Annual net income in USD, Cap rate in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Property value = 10 USD, Annual gross income = 100 USD, Operating expenses (total) = 1000 USD, Vacancy rate = 10 perc, Annual net income = 100 USD and Cap rate = 1000 perc — through the same formula and the panel reports <strong>Operating expenses (percentage)</strong> = 1.11 perc.</p><ul><li><strong>Operating expenses (percentage)</strong> = 1.11 perc</li></ul><p>The line behind those figures is <strong>Property value</strong> = <code>Annual net income ÷ Cap rate</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Operating expenses (percentage)</strong> = 1.11 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Operating expenses (percentage) offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Property value</strong> = <code>Annual net income ÷ Cap rate</code></li><li><strong>Cap rate</strong> = <code>Annual net income ÷ Property value</code></li><li><strong>Annual net income</strong> = <code>Cap rate × Property value</code></li><li><strong>Operating expenses (percentage)</strong> = <code>(Annual gross income × Vacancy rate − Annual gross income + Annual net income) ÷ (Annual gross income × (Vacancy rate − 1))</code></li><li><strong>Annual gross income</strong> = <code>Annual net income ÷ (Operating expenses (percentage) × Vacancy rate − Operating expenses (percentage) − Vacancy rate + 1)</code></li><li><strong>Vacancy rate</strong> = <code>(Annual gross income × Operating expenses (percentage) − Annual gross income + Annual net income) ÷ (Annual gross income × (Operating expenses (percentage) − 1))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Property value</strong> = <code>Annual net income ÷ Cap rate</code> — the form to use when Annual net income and Cap rate are the values you have.</li><li><strong>Cap rate</strong> = <code>Annual net income ÷ Property value</code> — the form to use when Annual net income and Property value are the values you have.</li><li><strong>Annual net income</strong> = <code>Cap rate × Property value</code> — the form to use when Cap rate and Property value are the values you have.</li><li><strong>Operating expenses (percentage)</strong> = <code>(Annual gross income × Vacancy rate − Annual gross income + Annual net income) ÷ (Annual gross income × (Vacancy rate − 1))</code> — the form to use when Annual gross income, Vacancy rate and Annual net income are the values you have.</li><li><strong>Annual gross income</strong> = <code>Annual net income ÷ (Operating expenses (percentage) × Vacancy rate − Operating expenses (percentage) − Vacancy rate + 1)</code> — the form to use when Annual net income, Operating expenses (percentage) and Vacancy rate are the values you have.</li><li><strong>Vacancy rate</strong> = <code>(Annual gross income × Operating expenses (percentage) − Annual gross income + Annual net income) ÷ (Annual gross income × (Operating expenses (percentage) − 1))</code> — the form to use when Annual gross income, Operating expenses (percentage) and Annual net income are the values you have.</li><li><strong>Annual net income</strong> = <code>Annual gross income × (Operating expenses (percentage) × Vacancy rate − Operating expenses (percentage) − Vacancy rate + 1)</code> — the form to use when Annual gross income, Operating expenses (percentage) and Vacancy rate are the values you have.</li><li><strong>Operating expenses (percentage)</strong> = <code>Operating expenses (total) ÷ Annual gross income</code> — the form to use when Operating expenses (total) and Annual gross income are the values you have.</li></ul><p>Any one of Property value, Cap rate and Annual net income can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Property value, from 10 to 20 — and the answers go from <strong>Operating expenses (percentage)</strong> 1.11 perc to <strong>Operating expenses (percentage)</strong> 1.11 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Property value, Operating expenses (percentage) and Vacancy rate are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Annual gross income left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Annual gross income is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Operating expenses (total) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Operating expenses (total) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Annual gross income is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Annual gross income</strong> takes a plain number with no unit attached. Change it and Operating expenses (percentage), Vacancy rate and Annual net income changes with it. Have it to hand before you start: Annual gross income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Operating expenses (total)</strong> takes a plain number with no unit attached. Change it and Operating expenses (percentage) and Annual gross income changes with it. Have it to hand before you start: Operating expenses (total) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Property value</strong> is a plain number. It is worked out from Annual net income and Cap rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Operating expenses (percentage)</strong> is a percent figure and the page's own defaults put it at 1.11 perc. It is worked out from Annual gross income, Vacancy rate and Annual net income. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Vacancy rate</strong> is a percent figure. It is worked out from Annual gross income, Operating expenses (percentage) and Annual net income. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Annual net income</strong> is a plain number. It is worked out from Cap rate and Property value. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Cap rate</strong> is a percent figure. It is worked out from Annual net income and Property value. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Operating expenses (percentage)</th></tr></thead><tbody><tr><td><strong>Property value</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Annual gross income</strong> +10%</td><td>-0.91%</td></tr><tr><td><strong>Operating expenses (total)</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Vacancy rate</strong> +10%</td><td>-1%</td></tr><tr><td><strong>Annual net income</strong> +10%</td><td>+1%</td></tr><tr><td><strong>Cap rate</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Vacancy rate sits at the top — a ten per cent error in that box shows up as roughly 1 per cent in the answer. By contrast, Property value, Operating expenses (total) and Cap rate barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Property value = 5 USD, Annual gross income = 50 USD, Operating expenses (total) = 500 USD, Vacancy rate = 5 perc, Annual net income = 50 USD and Cap rate = 500 perc, the answer is <strong>Operating expenses (percentage)</strong> = 1.25 perc.</li><li>With Property value = 30 USD, Annual gross income = 100 USD, Operating expenses (total) = 1000 USD, Vacancy rate = 10 perc, Annual net income = 100 USD and Cap rate = 1000 perc, the answer is <strong>Operating expenses (percentage)</strong> = 1.11 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Property value follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Annual gross income and Operating expenses (total) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Annual gross income and Operating expenses (total) is what you already know and Property value and Operating expenses (percentage) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/tds-interest">TDS interest Calculator</a>, <a href="/finance/tenure">Tenure</a> and <a href="/finance/texas-overtime">Texas overtime Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cap rate calculator work out?', 'a' => <<<'TXT'
            Property value, Operating expenses (percentage), Vacancy rate and Annual net income, from Annual net income and Cap rate. The relationship is Property value = Annual net income ÷ Cap rate.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Annual gross income (USD), Operating expenses (total) (USD). With annual gross income and operating expenses (total) in place, Property value can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Property value, Cap rate, Annual net income and Operating expenses (percentage) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Operating expenses (percentage) = 1.11 perc. The figures come from Annual gross income as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Property value is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Annual gross income left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Property value at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/tds-interest', 'name' => 'TDS interest Calculator'],
            ['path' => '/finance/tenure', 'name' => 'Tenure'],
            ['path' => '/finance/texas-overtime', 'name' => 'Texas overtime Calculator'],
        ],
        'authors' => [],
    ],
];

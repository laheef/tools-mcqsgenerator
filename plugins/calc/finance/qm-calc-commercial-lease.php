<?php

/**
 * Commercial lease
 * /finance/commercial-lease
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Commercial lease',
    'meta' => ['title' => 'Commercial lease — Formula, Steps & Examples', 'description' => 'Commercial lease works out total rental rate and rent from area and base rental rate. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Commercial lease Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Area',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'base_rate',
                            'label' => 'Base rental rate',
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
                            'name' => 'operating_expenses',
                            'label' => 'Operating expenses',
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
                            'name' => 'total_rate',
                            'label' => 'Total rental rate',
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
                            'name' => 'rent',
                            'label' => 'Rent',
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
            'title' => 'Rental agent\'s fee',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'agentRate',
                            'label' => 'The agent takes...',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'timePeriod',
                            'label' => 'of the equivalent of...',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fee',
                            'label' => 'Total fee',
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
            'title' => 'total_rate = base_rate + operating_expenses',
            'results' => ['base_rate' => '-operating_expenses + total_rate', 'total_rate' => 'base_rate + operating_expenses', 'operating_expenses' => '-base_rate + total_rate'],
        ],
        [
            'title' => 'rent = area * total_rate',
            'results' => ['area' => 'rent/total_rate', 'rent' => 'area*total_rate', 'total_rate' => 'rent/area'],
        ],
        [
            'title' => 'fee = agentRate * rent * timePeriod',
            'results' => ['rent' => 'fee/(agentRate*timePeriod)', 'fee' => 'agentRate*rent*timePeriod', 'timePeriod' => 'fee/(agentRate*rent)', 'agentRate' => 'fee/(rent*timePeriod)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Commercial lease works out Area and Total rental rate from Base rental rate and Operating expenses. It is a single relationship that reads area out of base rental rate, not a table of canned results keyed by them. Units for Area default to square meters and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Commercial lease calculator works', 'html' => <<<'TXT'
            <p>Commercial lease answers one question from 2 numbers, and the answer is Area, Total rental rate and Rent.</p><p>The relationship it solves reads Total rental rate = Base rental rate + Operating expenses.</p><p>What comes back is Area, Total rental rate, Rent and The agent takes… — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Base rental rate</strong> — in USD</li><li><strong>Operating expenses</strong> — in USD</li></ul><p>The result boxes are Area in square meters, Total rental rate in USD, Rent in USD, The agent takes… in percent, of the equivalent of… in years, Total fee in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Area = 10 m2, Base rental rate = 100 USD, Operating expenses = 1000 USD, Rent = 10 USD, The agent takes… = 6 perc, of the equivalent of… = 2 yrs and Total fee = 10 USD; the answers are <strong>Total rental rate</strong> = 1100 USD.</p><ul><li><strong>Total rental rate</strong> = 1100 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Total rental rate</strong> = <code>Base rental rate + Operating expenses</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Total rental rate</strong> = 1100. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Area lists 7 options and opens on square meters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total rental rate</strong> = <code>Base rental rate + Operating expenses</code></li><li><strong>Base rental rate</strong> = <code>− Operating expenses + Total rental rate</code></li><li><strong>Operating expenses</strong> = <code>− Base rental rate + Total rental rate</code></li><li><strong>Rent</strong> = <code>Area × Total rental rate</code></li><li><strong>Area</strong> = <code>Rent ÷ Total rental rate</code></li><li><strong>Total fee</strong> = <code>The agent takes... × Rent × of the equivalent of...</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total rental rate</strong> = <code>Base rental rate + Operating expenses</code> — the form to use when Base rental rate and Operating expenses are the values you have.</li><li><strong>Base rental rate</strong> = <code>− Operating expenses + Total rental rate</code> — the form to use when Operating expenses and Total rental rate are the values you have.</li><li><strong>Operating expenses</strong> = <code>− Base rental rate + Total rental rate</code> — the form to use when Base rental rate and Total rental rate are the values you have.</li><li><strong>Rent</strong> = <code>Area × Total rental rate</code> — the form to use when Area and Total rental rate are the values you have.</li><li><strong>Area</strong> = <code>Rent ÷ Total rental rate</code> — the form to use when Rent and Total rental rate are the values you have.</li><li><strong>Total rental rate</strong> = <code>Rent ÷ Area</code> — the form to use when Rent and Area are the values you have.</li><li><strong>Total fee</strong> = <code>The agent takes... × Rent × of the equivalent of...</code> — the form to use when The agent takes…, Rent and of the equivalent of… are the values you have.</li><li><strong>Rent</strong> = <code>Total fee ÷ (The agent takes... × of the equivalent of...)</code> — the form to use when Total fee, The agent takes… and of the equivalent of… are the values you have.</li></ul><p>Any one of Total rental rate, Base rental rate and Operating expenses can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Area from 10 to 20, leaving every other box alone. The panel moves from <strong>Total rental rate</strong> 1100 USD to <strong>Total rental rate</strong> 1100 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Area, Total rental rate and Rent are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Base rental rate left as a guess.</strong> Anything typed into Base rental rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Operating expenses left as a guess.</strong> Anything typed into Operating expenses is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Base rental rate to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Base rental rate</strong> takes a plain number with no unit attached. The page reads it when it works out Total rental rate and Operating expenses. Have it to hand before you start: Base rental rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Operating expenses</strong> takes a plain number with no unit attached. The page reads it when it works out Base rental rate and Total rental rate. Have it to hand before you start: Operating expenses is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Area</strong> is a square meters figure. It is computed from Rent and Total rental rate, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total rental rate</strong> is a plain number and the page's own defaults put it at 1100. It is computed from Base rental rate and Operating expenses, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Rent</strong> is a plain number. It is computed from Area and Total rental rate, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>The agent takes…</strong> is a percent figure. It is computed from Total fee, Rent and of the equivalent of…, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>of the equivalent of…</strong> is a years figure. It is computed from Total fee, The agent takes… and Rent, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total fee</strong> is a plain number. It is computed from The agent takes…, Rent and of the equivalent of…, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total rental rate</th></tr></thead><tbody><tr><td><strong>Area</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Base rental rate</strong> +10%</td><td>+0.91%</td></tr><tr><td><strong>Operating expenses</strong> +10%</td><td>+9.09%</td></tr><tr><td><strong>Rent</strong> +10%</td><td>+0%</td></tr><tr><td><strong>The agent takes…</strong> +10%</td><td>+0%</td></tr><tr><td><strong>of the equivalent of…</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total fee</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Operating expenses: ten per cent there moves an answer by about 9.1 per cent, which is why that is the number to measure twice. By contrast, Area, Rent and The agent takes… barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>square meters</strong> — opens in <em>m2</em>, and the chip also carries m², in², ft², yd², ac and ha. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Area is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are square meters, percent and years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Base rental rate and Operating expenses are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Base rental rate and Operating expenses and the number you are missing is Area and Total rental rate.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/business-loan">Business loan Calculator</a>, <a href="/finance/business-valuation">Business valuation Calculator</a> and <a href="/finance/buying-power">Buying power Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Commercial lease calculator work out?', 'a' => <<<'TXT'
            Area, Total rental rate, Rent and The agent takes…, from Base rental rate and Operating expenses. The relationship is Total rental rate = Base rental rate + Operating expenses.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Base rental rate (USD), Operating expenses (USD). With base rental rate and operating expenses in place, Area can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total rental rate, Base rental rate, Operating expenses and Rent blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Total rental rate = 1100 USD. Those are the defaults written into the form — move Base rental rate and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Area is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Base rental rate left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Area keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/business-loan', 'name' => 'Business loan Calculator'],
            ['path' => '/finance/business-valuation', 'name' => 'Business valuation Calculator'],
            ['path' => '/finance/buying-power', 'name' => 'Buying power Calculator'],
        ],
        'authors' => [],
    ],
];

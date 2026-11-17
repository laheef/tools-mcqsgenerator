<?php

/**
 * Future salary
 * /finance/future-salary
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Future salary',
    'meta' => ['title' => 'Future salary Calculator — Formula, Units & Example', 'description' => 'Future salary reports expected future salary and real future salary. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Future salary Calculator', 'updated' => '2026-09-03'],
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
                                ['when' => 'current_salary == 45000 and avg_increase == 0.04 and num_years == 8', 'text' => 'Onim Example 1: Career growth – If your current salary is $45,000, with an average annual increase of 4%, what will your salary be after 8 years?&nbsp;'],
                                ['when' => 'current_salary == 52000 and avg_increase == 0.05 and num_years == 10 and average_inflation == 0.03', 'text' => <<<'TXT'
                                Onim Example 2: Inflation check – With a current salary of $52,000, a 5% annual increase, and 3% inflation, what will your real future salary be after 10 years?
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Future salary',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'current_salary',
                            'label' => 'Current salary',
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
                            'name' => 'avg_increase',
                            'label' => 'Average salary change per year',
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
                            'name' => 'num_years',
                            'label' => 'Number of years',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'future_salary',
                            'label' => 'Expected future salary',
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
            'title' => 'Real future salary',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_inflation',
                            'label' => 'Average inflation',
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
                            'name' => 'real_future_salary',
                            'label' => 'Real future salary',
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
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'current_salary == 45000 and avg_increase == 0.04 and num_years == 8', 'text' => <<<'TXT'
                                How the result is calculated: Identify the current salary S, the annual salary increase rate r, and the number of years n. Apply the future salary formula: Future salary = S × (1 + r)ⁿ Calculate the result to get the estimated future salary.&nbsp;
                                TXT],
                                ['when' => 'current_salary == 52000 and avg_increase == 0.05 and num_years == 10 and average_inflation == 0.03', 'text' => <<<'TXT'
                                How the result is calculated: Identify the current salary S, the annual salary increase rate r, the inflation rate i, and the number of years n. Calculate the future salary using: Future salary = S × (1 + r)ⁿ Adjust the result for inflation using: Real future salary = Future salary / (1 + i)ⁿ
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Check our examples: • Example 1 ⧉ – Career growth • Example 2 ⧉ – Inflation check'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'future_salary = current_salary * (1 + avg_increase) ^ num_years',
            'results' => ['current_salary' => 'future_salary*pow(avg_increase + 1, -num_years)', 'num_years' => 'log(future_salary/current_salary)/log(avg_increase + 1)', 'avg_increase' => 'pow(future_salary/current_salary, 1/num_years) - 1', 'future_salary' => 'current_salary*pow(avg_increase + 1, num_years)'],
        ],
        [
            'title' => 'real_future_salary = future_salary / (1 + average_inflation) ^ num_years',
            'results' => ['future_salary' => 'real_future_salary*pow(average_inflation + 1, num_years)', 'num_years' => 'log(future_salary/real_future_salary)/log(average_inflation + 1)', 'real_future_salary' => 'future_salary*pow(average_inflation + 1, -num_years)', 'average_inflation' => 'pow(future_salary/real_future_salary, 1/num_years) - 1'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Future salary takes Current salary, Average salary change per year and Number of years and returns Expected future salary and Average inflation. There is no hidden constant here: change expected future salary and current salary moves with it. The main result, Expected future salary, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Future salary calculator works', 'html' => <<<'TXT'
            <p>The Future salary calculator applies one relationship to 3 numbers and reports Expected future salary, Average inflation and Real future salary.</p><p>The relationship it solves reads Expected future salary = Current salary × (Average salary change per year + 1)^(Number of years).</p><p>The result panel carries Expected future salary, Average inflation and Real future salary, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Current salary</strong> — in USD</li><li><strong>Average salary change per year</strong> — in percent</li><li><strong>Number of years</strong> — in years</li></ul><p>The answers come back as Expected future salary in USD, Average inflation in percent, Real future salary in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Current salary = 10 USD, Average salary change per year = 100 perc, Number of years = 1000 yrs, Average inflation = 10 perc and Real future salary = 100 USD — through the same formula and the panel reports <strong>Expected future salary</strong> = 10 USD.</p><ul><li><strong>Expected future salary</strong> = 10 USD</li></ul><p>The line behind those figures is <strong>Expected future salary</strong> = <code>Current salary × (Average salary change per year + 1)^(Number of years)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Expected future salary</strong> = 10 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Average inflation offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Expected future salary</strong> = <code>Current salary × (Average salary change per year + 1)^(Number of years)</code></li><li><strong>Current salary</strong> = <code>Expected future salary × (Average salary change per year + 1)^(− Number of years)</code></li><li><strong>Number of years</strong> = <code>ln(Expected future salary ÷ Current salary) ÷ ln(Average salary change per year + 1)</code></li><li><strong>Average salary change per year</strong> = <code>(Expected future salary ÷ Current salary)^(1 ÷ Number of years) − 1</code></li><li><strong>Real future salary</strong> = <code>Expected future salary × (Average inflation + 1)^(− Number of years)</code></li><li><strong>Average inflation</strong> = <code>(Expected future salary ÷ Real future salary)^(1 ÷ Number of years) − 1</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Expected future salary</strong> = <code>Current salary × (Average salary change per year + 1)^(Number of years)</code> — the form to use when Current salary, Average salary change per year and Number of years are the values you have.</li><li><strong>Current salary</strong> = <code>Expected future salary × (Average salary change per year + 1)^(− Number of years)</code> — the form to use when Expected future salary, Average salary change per year and Number of years are the values you have.</li><li><strong>Number of years</strong> = <code>ln(Expected future salary ÷ Current salary) ÷ ln(Average salary change per year + 1)</code> — the form to use when Expected future salary, Current salary and Average salary change per year are the values you have.</li><li><strong>Average salary change per year</strong> = <code>(Expected future salary ÷ Current salary)^(1 ÷ Number of years) − 1</code> — the form to use when Expected future salary, Current salary and Number of years are the values you have.</li><li><strong>Real future salary</strong> = <code>Expected future salary × (Average inflation + 1)^(− Number of years)</code> — the form to use when Expected future salary, Average inflation and Number of years are the values you have.</li><li><strong>Expected future salary</strong> = <code>Real future salary × (Average inflation + 1)^(Number of years)</code> — the form to use when Real future salary, Average inflation and Number of years are the values you have.</li><li><strong>Number of years</strong> = <code>ln(Expected future salary ÷ Real future salary) ÷ ln(Average inflation + 1)</code> — the form to use when Expected future salary, Real future salary and Average inflation are the values you have.</li><li><strong>Average inflation</strong> = <code>(Expected future salary ÷ Real future salary)^(1 ÷ Number of years) − 1</code> — the form to use when Expected future salary, Real future salary and Number of years are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Expected future salary, Current salary and Number of years can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Current salary from 10 to 20, leaving every other box alone. The panel moves from <strong>Expected future salary</strong> 10 USD to <strong>Expected future salary</strong> 20 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Average salary change per year and Number of years is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Expected future salary, Average inflation and Real future salary are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Current salary left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Current salary is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Average salary change per year left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Average salary change per year is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Current salary to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Current salary</strong> takes a plain number with no unit attached. It feeds Number of years, Average salary change per year and Expected future salary. Have it to hand before you start: Current salary is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Average salary change per year</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Current salary, Number of years and Expected future salary. Have it to hand before you start: Average salary change per year is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of years</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. It feeds Current salary, Average salary change per year and Expected future salary. Have it to hand before you start: Number of years is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Expected future salary</strong> is a plain number and the page's own defaults put it at 10. It is worked out from Current salary, Average salary change per year and Number of years. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Average inflation</strong> is a percent figure. It is worked out from Expected future salary, Real future salary and Number of years. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Real future salary</strong> is a plain number. It is worked out from Expected future salary, Average inflation and Number of years. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Expected future salary</th></tr></thead><tbody><tr><td><strong>Current salary</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Average salary change per year</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Number of years</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Average inflation</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Real future salary</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Current salary sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Number of years, Average salary change per year and Average inflation barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Expected future salary is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Current salary, Average salary change per year and Number of years are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Current salary, Average salary change per year and Number of years measured, Expected future salary and Average inflation wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/rsi">Relative strength index (RSI) Calculator</a>, <a href="/finance/remote-vs-on-location-workers">Remote vs. on-location workers (non-salary costs) Calculator</a> and <a href="/finance/rent">Rent Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Future salary calculator work out?', 'a' => <<<'TXT'
            Expected future salary, Average inflation and Real future salary, from Current salary, Average salary change per year and Number of years. The relationship is Expected future salary = Current salary × (Average salary change per year + 1)^(Number of years).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current salary (USD), Average salary change per year (percent), Number of years (years). Fill current salary, average salary change per year and number of years and leave Expected future salary empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Expected future salary, Current salary, Number of years and Average salary change per year can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Expected future salary = 10 USD. That comes from the page\'s own defaults, entered in Current salary; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Expected future salary is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Current salary left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Expected future salary keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/rsi', 'name' => 'Relative strength index (RSI) Calculator'],
            ['path' => '/finance/remote-vs-on-location-workers', 'name' => 'Remote vs. on-location workers (non-salary costs) Calculator'],
            ['path' => '/finance/rent', 'name' => 'Rent Calculator'],
        ],
        'authors' => [],
    ],
];

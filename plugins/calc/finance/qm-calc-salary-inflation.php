<?php

/**
 * Salary inflation
 * /finance/salary-inflation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Salary inflation',
    'meta' => ['title' => 'Salary inflation Calculator: Free, With Steps', 'description' => 'Salary inflation takes salary in the reference period, inflation rate and your current salary and returns inflation-adjusted salary and your gain or loss.', 'h1' => 'Salary inflation Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salary_base',
                            'label' => 'Salary in the reference period',
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
                            'name' => 'inflation',
                            'label' => 'Inflation rate',
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
                            'name' => 'salary_adj',
                            'label' => 'Inflation-adjusted salary',
                            'type' => 'number',
                            'help' => 'How high should your salary be to keep up with inflation?',
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
                            'name' => 'salary_curr',
                            'label' => 'Your current salary',
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
                            'name' => 'earnings',
                            'label' => 'Your gain or loss',
                            'type' => 'number',
                            'help' => 'This is the value that shows you whether your salary is worth more or less in real terms.',
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
            'title' => 'salary_adj = salary_base * (1 + inflation)',
            'results' => ['salary_base' => 'salary_adj/(inflation + 1)', 'salary_adj' => 'salary_base*(inflation + 1)', 'inflation' => '(salary_adj - salary_base)/salary_base'],
        ],
        [
            'title' => 'earnings = salary_curr - salary_adj',
            'results' => ['salary_adj' => '-earnings + salary_curr', 'earnings' => '-salary_adj + salary_curr', 'salary_curr' => 'earnings + salary_adj'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Salary inflation turns Salary in the reference period and Inflation rate into Inflation-adjusted salary and Your current salary. There is no hidden constant here: change inflation-adjusted salary and salary in the reference period moves with it. The main result, Inflation-adjusted salary, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Salary inflation calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Salary inflation: it takes 2 numbers and reports Inflation-adjusted salary, Your current salary and Your gain or loss.</p><p>The relationship it solves reads Inflation-adjusted salary = Salary in the reference period × (Inflation rate + 1).</p><p>What comes back is Inflation-adjusted salary, Your current salary and Your gain or loss — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Salary in the reference period</strong> — in USD</li><li><strong>Inflation rate</strong> — in percent</li></ul><p>The result boxes are Inflation-adjusted salary in USD, Your current salary in USD, Your gain or loss in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Salary in the reference period = 10 USD, Inflation rate = 100 perc, Your current salary = 1000 USD and Your gain or loss = 10 USD gives <strong>Inflation-adjusted salary</strong> = 1010 USD.</p><ul><li><strong>Inflation-adjusted salary</strong> = 1010 USD</li></ul><p>The line behind those figures is <strong>Inflation-adjusted salary</strong> = <code>Salary in the reference period × (Inflation rate + 1)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Inflation-adjusted salary</strong> = 1010 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Inflation rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Inflation-adjusted salary</strong> = <code>Salary in the reference period × (Inflation rate + 1)</code></li><li><strong>Salary in the reference period</strong> = <code>Inflation-adjusted salary ÷ (Inflation rate + 1)</code></li><li><strong>Inflation rate</strong> = <code>(Inflation-adjusted salary − Salary in the reference period) ÷ Salary in the reference period</code></li><li><strong>Your gain or loss</strong> = <code>− Inflation-adjusted salary + Your current salary</code></li><li><strong>Your current salary</strong> = <code>Your gain or loss + Inflation-adjusted salary</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Inflation-adjusted salary</strong> = <code>Salary in the reference period × (Inflation rate + 1)</code> — the form to use when Salary in the reference period and Inflation rate are the values you have.</li><li><strong>Salary in the reference period</strong> = <code>Inflation-adjusted salary ÷ (Inflation rate + 1)</code> — the form to use when Inflation-adjusted salary and Inflation rate are the values you have.</li><li><strong>Inflation rate</strong> = <code>(Inflation-adjusted salary − Salary in the reference period) ÷ Salary in the reference period</code> — the form to use when Inflation-adjusted salary and Salary in the reference period are the values you have.</li><li><strong>Your gain or loss</strong> = <code>− Inflation-adjusted salary + Your current salary</code> — the form to use when Inflation-adjusted salary and Your current salary are the values you have.</li><li><strong>Inflation-adjusted salary</strong> = <code>− Your gain or loss + Your current salary</code> — the form to use when Your gain or loss and Your current salary are the values you have.</li><li><strong>Your current salary</strong> = <code>Your gain or loss + Inflation-adjusted salary</code> — the form to use when Your gain or loss and Inflation-adjusted salary are the values you have.</li></ul><p>Any one of Inflation-adjusted salary, Salary in the reference period and Inflation rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Salary in the reference period from 10 to 20, leaving every other box alone. The panel moves from <strong>Inflation-adjusted salary</strong> 1010 USD to <strong>Inflation-adjusted salary</strong> 2020 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Inflation rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Inflation-adjusted salary, Your current salary and Your gain or loss are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Salary in the reference period left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Salary in the reference period is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Inflation rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Inflation rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Salary in the reference period and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Salary in the reference period</strong> takes a plain number with no unit attached. It feeds Inflation-adjusted salary and Inflation rate. Have it to hand before you start: Salary in the reference period is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Inflation rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Salary in the reference period and Inflation-adjusted salary. Have it to hand before you start: Inflation rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Inflation-adjusted salary</strong> is a plain number and the page's own defaults put it at 1010. It is worked out from Salary in the reference period and Inflation rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Your current salary</strong> is a plain number. It is worked out from Your gain or loss and Inflation-adjusted salary. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Your gain or loss</strong> is a plain number. It is worked out from Inflation-adjusted salary and Your current salary. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Inflation-adjusted salary</th></tr></thead><tbody><tr><td><strong>Salary in the reference period</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Inflation rate</strong> +10%</td><td>+9.9%</td></tr><tr><td><strong>Your current salary</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Your gain or loss</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Salary in the reference period sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Your current salary and Your gain or loss barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Salary in the reference period = 5 USD, Inflation rate = 50 perc, Your current salary = 500 USD and Your gain or loss = 5 USD, the answer is <strong>Inflation-adjusted salary</strong> = 255 USD.</li><li>With Salary in the reference period = 30 USD, Inflation rate = 100 perc, Your current salary = 1000 USD and Your gain or loss = 10 USD, the answer is <strong>Inflation-adjusted salary</strong> = 3030 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Inflation-adjusted salary follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Salary in the reference period and Inflation rate measured, Inflation-adjusted salary and Your current salary wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/loss-ratio">Loss ratio Calculator</a>, <a href="/finance/lottery-annuity">Lottery annuity Calculator</a> and <a href="/finance/lottery-tax">Lottery tax Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Salary inflation calculator work out?', 'a' => <<<'TXT'
            Inflation-adjusted salary, Your current salary and Your gain or loss, from Salary in the reference period and Inflation rate. The relationship is Inflation-adjusted salary = Salary in the reference period × (Inflation rate + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Salary in the reference period (USD), Inflation rate (percent). With salary in the reference period and inflation rate in place, Inflation-adjusted salary can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Inflation-adjusted salary, Salary in the reference period, Inflation rate and Your gain or loss blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Inflation-adjusted salary = 1010 USD. Those are the defaults written into the form — move Salary in the reference period and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Inflation-adjusted salary is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Salary in the reference period left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Inflation-adjusted salary at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/loss-ratio', 'name' => 'Loss ratio Calculator'],
            ['path' => '/finance/lottery-annuity', 'name' => 'Lottery annuity Calculator'],
            ['path' => '/finance/lottery-tax', 'name' => 'Lottery tax Calculator'],
        ],
        'authors' => [],
    ],
];

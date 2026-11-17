<?php

/**
 * Lifetime earnings
 * /finance/lifetime-earnings
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lifetime earnings',
    'meta' => ['title' => 'Lifetime earnings: Formula, Steps & Results', 'description' => 'Lifetime earnings works out working years left from current age, retirement age and current salary. Every box can be solved for, not only the one in the title.', 'h1' => 'Lifetime earnings Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => 'Number of years left to work',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'current_age',
                            'label' => 'Current age',
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
                            'name' => 'retirement_age',
                            'label' => 'Retirement age',
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
                            'name' => 'num_years',
                            'label' => 'Working years left',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Lifetime earnings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salary',
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
                            'name' => 'salary_increase',
                            'label' => 'Expected salary increase per year',
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
                            'name' => 'lifetime_earnings',
                            'label' => 'Lifetime earnings',
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
            'title' => 'num_years = retirement_age - current_age ',
            'results' => ['retirement_age' => 'current_age + num_years', 'current_age' => '-num_years + retirement_age', 'num_years' => '-current_age + retirement_age'],
        ],
        [
            'title' => 'lifetime_earnings = (salary * (1 - (1 + salary_increase) ^ num_years)) / (1 - (1 + salary_increase))',
            'results' => ['lifetime_earnings' => 'salary*(pow(salary_increase + 1, num_years) - 1)/salary_increase', 'num_years' => 'log((lifetime_earnings*salary_increase + salary)/salary)/log(salary_increase + 1)', 'salary' => 'lifetime_earnings*salary_increase/(pow(salary_increase + 1, num_years) - 1)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Lifetime earnings turns Current age and Retirement age into Working years left and Current salary. It is a single relationship that reads working years left out of current age, not a table of canned results keyed by them. Units for Working years left default to years and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Lifetime earnings calculator works', 'html' => <<<'TXT'
            <p>Lifetime earnings answers one question from 2 numbers, and the answer is Working years left, Current salary and Lifetime earnings.</p><p>Written with the labels from the form, Working years left = − Current age + Retirement age.</p><p>The result panel carries Working years left, Current salary and Lifetime earnings, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Current age</strong> — in years</li><li><strong>Retirement age</strong> — in years</li></ul><p>What you get back is Working years left in years, Current salary in USD, Lifetime earnings in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Working years left offers 5 units and opens on years, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Working years left</strong> = <code>− Current age + Retirement age</code></li><li><strong>Retirement age</strong> = <code>Current age + Working years left</code></li><li><strong>Current age</strong> = <code>− Working years left + Retirement age</code></li><li><strong>Lifetime earnings</strong> = <code>Current salary × ((Expected salary increase per year + 1)^(Working years left) − 1) ÷ Expected salary increase per year</code></li><li><strong>Current salary</strong> = <code>Lifetime earnings × Expected salary increase per year ÷ ((Expected salary increase per year + 1)^(Working years left) − 1)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Working years left</strong> = <code>− Current age + Retirement age</code> — the form to use when Current age and Retirement age are the values you have.</li><li><strong>Retirement age</strong> = <code>Current age + Working years left</code> — the form to use when Current age and Working years left are the values you have.</li><li><strong>Current age</strong> = <code>− Working years left + Retirement age</code> — the form to use when Working years left and Retirement age are the values you have.</li><li><strong>Lifetime earnings</strong> = <code>Current salary × ((Expected salary increase per year + 1)^(Working years left) − 1) ÷ Expected salary increase per year</code> — the form to use when Current salary, Expected salary increase per year and Working years left are the values you have.</li><li><strong>Working years left</strong> = <code>ln((Lifetime earnings × Expected salary increase per year + Current salary) ÷ Current salary) ÷ ln(Expected salary increase per year + 1)</code> — the form to use when Lifetime earnings, Expected salary increase per year and Current salary are the values you have.</li><li><strong>Current salary</strong> = <code>Lifetime earnings × Expected salary increase per year ÷ ((Expected salary increase per year + 1)^(Working years left) − 1)</code> — the form to use when Lifetime earnings, Expected salary increase per year and Working years left are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Working years left, Retirement age and Current age can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Current age and Retirement age is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Working years left, Current salary and Lifetime earnings are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Current age left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Current age is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Retirement age left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Retirement age is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Current age and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Current age</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The page reads it when it works out Retirement age and Working years left. Have it to hand before you start: Current age is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Retirement age</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The page reads it when it works out Current age and Working years left. Have it to hand before you start: Retirement age is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Working years left</strong> is a years figure. It is computed from Current age and Retirement age, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Current salary</strong> is a plain number. It is computed from Lifetime earnings, Expected salary increase per year and Working years left, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Lifetime earnings</strong> is a plain number. It is computed from Current salary, Expected salary increase per year and Working years left, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Current age and Retirement age. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Current age into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Working years left in yrs with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Working years left is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover years. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Current age and Retirement age measured, Working years left and Current salary wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/12-hour-shift">12 hour shift</a>, <a href="/finance/28-36-rule">28/36 Rule Calculator</a> and <a href="/finance/3d-printer-buy-vs-outsource">3D printer - buy vs outsource Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lifetime earnings calculator work out?', 'a' => <<<'TXT'
            Working years left, Current salary and Lifetime earnings, from Current age and Retirement age. The relationship is Working years left = − Current age + Retirement age.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current age (years), Retirement age (years). Enter current age and retirement age; Working years left is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Working years left, Retirement age, Current age and Lifetime earnings can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Working years left is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Current age left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Working years left keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/12-hour-shift', 'name' => '12 hour shift'],
            ['path' => '/finance/28-36-rule', 'name' => '28/36 Rule Calculator'],
            ['path' => '/finance/3d-printer-buy-vs-outsource', 'name' => '3D printer - buy vs outsource Calculator'],
        ],
        'authors' => [],
    ],
];

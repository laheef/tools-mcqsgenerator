<?php

/**
 * Money per hour
 * /finance/money-per-hour
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Money per hour',
    'meta' => ['title' => 'Money per hour Calculator: Free, With Steps', 'description' => 'Money per hour works out annual salary and monthly wage and reports both. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Money per hour Calculator', 'updated' => '2024-07-29'],
    'sections' => [
        [
            'title' => 'Input any of the following:',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yearly',
                            'label' => 'Annual salary',
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
                            'name' => 'monthly',
                            'label' => 'Monthly wage',
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
                            'name' => 'biweekly',
                            'label' => 'Biweekly wage',
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
                            'name' => 'weekly',
                            'label' => 'Weekly wage',
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
                            'name' => 'daily',
                            'label' => 'Daily wage',
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
                        ['type' => 'note', 'text' => 'Are you sure the wage is negative?'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hours_per_week',
                            'label' => 'Hours per week',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Answer:',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hourly',
                            'label' => 'Money per hour',
                            'type' => 'number',
                            'suffix' => '**per hour**',
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
            'title' => 'weekly = hourly * hours_per_week',
            'results' => ['hourly' => 'weekly/hours_per_week', 'weekly' => 'hourly*hours_per_week', 'hours_per_week' => 'weekly/hourly'],
        ],
        [
            'title' => 'daily = hourly * hours_per_week / 5',
            'results' => ['hourly' => '5*daily/hours_per_week', 'daily' => '(1/5)*hourly*hours_per_week', 'hours_per_week' => '5*daily/hourly'],
        ],
        [
            'title' => 'yearly = hourly * hours_per_week * 52',
            'results' => ['hourly' => '(1/52)*yearly/hours_per_week', 'yearly' => '52*hourly*hours_per_week', 'hours_per_week' => '(1/52)*yearly/hourly'],
        ],
        [
            'title' => 'monthly = hourly * hours_per_week * 52 / 12',
            'results' => ['hourly' => '(3/13)*monthly/hours_per_week', 'monthly' => '(13/3)*hourly*hours_per_week', 'hours_per_week' => '(3/13)*monthly/hourly'],
        ],
        [
            'title' => 'biweekly = hourly * hours_per_week * 2',
            'results' => ['hourly' => '(1/2)*biweekly/hours_per_week', 'biweekly' => '2*hourly*hours_per_week', 'hours_per_week' => '(1/2)*biweekly/hourly'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Hours per week and Money per hour into Money per hour and the answer comes back as Annual salary and Monthly wage. The arithmetic is the whole method: annual salary is worked out from hours per week by one formula, applied once. Annual salary comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Money per hour calculator works', 'html' => <<<'TXT'
            <p>The Money per hour calculator applies one relationship to 2 numbers and reports Annual salary, Monthly wage and Biweekly wage.</p><p>The relationship it solves reads Weekly wage = Money per hour × Hours per week.</p><p>The result panel carries Annual salary, Monthly wage, Biweekly wage and Weekly wage, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Hours per week</strong> — a plain number, no unit</li><li><strong>Money per hour</strong> — in **per hour**</li></ul><p>The result boxes are Annual salary in USD, Monthly wage in USD, Biweekly wage in USD, Weekly wage in USD, Daily wage in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Hours per week = 40 and Money per hour = 100 **per hour** gives <strong>Weekly wage</strong> = 4000 USD, <strong>Daily wage</strong> = 800 USD, <strong>Annual salary</strong> = 208000 USD, <strong>Monthly wage</strong> = 17333 USD and <strong>Biweekly wage</strong> = 8000 USD.</p><ul><li><strong>Weekly wage</strong> = 4000 USD</li><li><strong>Daily wage</strong> = 800 USD</li><li><strong>Annual salary</strong> = 208000 USD</li><li><strong>Monthly wage</strong> = 17333 USD</li><li><strong>Biweekly wage</strong> = 8000 USD</li></ul><p>That is <strong>Weekly wage</strong> = <code>Money per hour × Hours per week</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Weekly wage</strong> = 4000, <strong>Daily wage</strong> = 800, <strong>Annual salary</strong> = 208000, <strong>Monthly wage</strong> = 17333 and <strong>Biweekly wage</strong> = 8000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Annual salary is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Weekly wage</strong> = <code>Money per hour × Hours per week</code></li><li><strong>Money per hour</strong> = <code>Weekly wage ÷ Hours per week</code></li><li><strong>Hours per week</strong> = <code>Weekly wage ÷ Money per hour</code></li><li><strong>Daily wage</strong> = <code>(1 ÷ 5) × Money per hour × Hours per week</code></li><li><strong>Annual salary</strong> = <code>52 × Money per hour × Hours per week</code></li><li><strong>Monthly wage</strong> = <code>(13 ÷ 3) × Money per hour × Hours per week</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Weekly wage</strong> = <code>Money per hour × Hours per week</code> — the form to use when Money per hour and Hours per week are the values you have.</li><li><strong>Money per hour</strong> = <code>Weekly wage ÷ Hours per week</code> — the form to use when Weekly wage and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Weekly wage ÷ Money per hour</code> — the form to use when Weekly wage and Money per hour are the values you have.</li><li><strong>Daily wage</strong> = <code>(1 ÷ 5) × Money per hour × Hours per week</code> — the form to use when Money per hour and Hours per week are the values you have.</li><li><strong>Money per hour</strong> = <code>5 × Daily wage ÷ Hours per week</code> — the form to use when Daily wage and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>5 × Daily wage ÷ Money per hour</code> — the form to use when Daily wage and Money per hour are the values you have.</li><li><strong>Annual salary</strong> = <code>52 × Money per hour × Hours per week</code> — the form to use when Money per hour and Hours per week are the values you have.</li><li><strong>Money per hour</strong> = <code>(1 ÷ 52) × Annual salary ÷ Hours per week</code> — the form to use when Annual salary and Hours per week are the values you have.</li></ul><p>Any one of Weekly wage, Money per hour and Hours per week can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Hours per week, from 40 to 80 — and the answers go from <strong>Weekly wage</strong> 4000 USD, <strong>Daily wage</strong> 800 USD, <strong>Annual salary</strong> 208000 USD, <strong>Monthly wage</strong> 17333 USD and <strong>Biweekly wage</strong> 8000 USD to <strong>Weekly wage</strong> 8000 USD, <strong>Daily wage</strong> 1600 USD, <strong>Annual salary</strong> 416000 USD, <strong>Monthly wage</strong> 34667 USD and <strong>Biweekly wage</strong> 16000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Annual salary, Monthly wage and Biweekly wage are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Hours per week left as a guess.</strong> Anything typed into Hours per week is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Money per hour left as a guess.</strong> Anything typed into Money per hour is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Hours per week and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Hours per week</strong> takes a plain number with no unit attached. It feeds Money per hour, Weekly wage and Daily wage. Have it to hand before you start: Hours per week is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Money per hour</strong> is measured in **per hour**. It feeds Weekly wage, Hours per week and Daily wage. Have it to hand before you start: Money per hour is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Annual salary</strong> is a plain number and the page's own defaults put it at 208000. It is worked out from Money per hour and Hours per week. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Monthly wage</strong> is a plain number and the page's own defaults put it at 17333. It is worked out from Money per hour and Hours per week. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Biweekly wage</strong> is a plain number and the page's own defaults put it at 8000. It is worked out from Money per hour and Hours per week. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Weekly wage</strong> is a plain number and the page's own defaults put it at 4000. It is worked out from Money per hour and Hours per week. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Daily wage</strong> is a plain number and the page's own defaults put it at 800. It is worked out from Money per hour and Hours per week. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Weekly wage</th><th>Daily wage</th><th>Annual salary</th><th>Monthly wage</th><th>Biweekly wage</th></tr></thead><tbody><tr><td><strong>Hours per week</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Money per hour</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Money per hour: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Hours per week = 20 and Money per hour = 50 **per hour**, the answer is <strong>Weekly wage</strong> = 1000 USD, <strong>Daily wage</strong> = 200 USD, <strong>Annual salary</strong> = 52000 USD, <strong>Monthly wage</strong> = 4333 USD and <strong>Biweekly wage</strong> = 2000 USD.</li><li>With Hours per week = 120 and Money per hour = 100 **per hour**, the answer is <strong>Weekly wage</strong> = 12000 USD, <strong>Daily wage</strong> = 2400 USD, <strong>Annual salary</strong> = 624000 USD, <strong>Monthly wage</strong> = 52000 USD and <strong>Biweekly wage</strong> = 24000 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Annual salary is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Hours per week and Money per hour is what you already know and Annual salary and Monthly wage is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/moratorium-emi">Moratorium Calculator</a>, <a href="/finance/mortgage-acceleration">Mortgage acceleration Calculator</a> and <a href="/finance/mortgage-extra-payments">Mortgage calculator with extra payments Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Money per hour calculator work out?', 'a' => <<<'TXT'
            Annual salary, Monthly wage, Biweekly wage and Weekly wage, from Money per hour and Hours per week. The relationship is Weekly wage = Money per hour × Hours per week.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Hours per week, Money per hour (**per hour**). Fill hours per week and money per hour and leave Annual salary empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Weekly wage, Money per hour, Hours per week and Daily wage blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Weekly wage = 4000 USD, Daily wage = 800 USD, Annual salary = 208000 USD, Monthly wage = 17333 USD and Biweekly wage = 8000 USD. Those are the defaults written into the form — move Hours per week and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Annual salary is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Hours per week left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Annual salary keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/moratorium-emi', 'name' => 'Moratorium Calculator'],
            ['path' => '/finance/mortgage-acceleration', 'name' => 'Mortgage acceleration Calculator'],
            ['path' => '/finance/mortgage-extra-payments', 'name' => 'Mortgage calculator with extra payments Calculator'],
        ],
        'authors' => [],
    ],
];

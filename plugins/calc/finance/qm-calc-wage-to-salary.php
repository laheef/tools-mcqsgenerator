<?php

/**
 * Wage to salary
 * /finance/wage-to-salary
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Wage to salary',
    'meta' => ['title' => 'Wage to salary Calculator — Formula & Results', 'description' => 'Wage to salary turns hourly wage, hours per week and days per week into daily wage and weekly wage. Every box can be solved for, not only the one in the title.', 'h1' => 'Wage to salary Calculator', 'updated' => '2025-10-08'],
    'sections' => [
        [
            'title' => 'Wage information',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hourly',
                            'label' => 'Hourly wage',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
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
                            'rounding' => ['omni', '0.000001'],
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
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Working days',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hours_per_week',
                            'label' => 'Hours per week',
                            'type' => 'number',
                            'suffix' => 'hours / week',
                            'rounding' => ['omni', '0.000001'],
                            'default' => '40',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days_per_week',
                            'label' => 'Days per week',
                            'type' => 'number',
                            'suffix' => 'days / week',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Result',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly',
                            'label' => 'Monthly salary',
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
                            'name' => 'yearly',
                            'label' => 'Yearly salary',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
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
            'results' => ['hours_per_week' => 'weekly/hourly', 'weekly' => 'hourly*hours_per_week', 'hourly' => 'weekly/hours_per_week'],
        ],
        [
            'title' => 'daily = hourly * hours_per_week / days_per_week',
            'results' => ['hours_per_week' => 'daily*days_per_week/hourly', 'hourly' => 'daily*days_per_week/hours_per_week', 'daily' => 'hourly*hours_per_week/days_per_week', 'days_per_week' => 'hourly*hours_per_week/daily'],
        ],
        [
            'title' => 'yearly = hourly * hours_per_week * 52',
            'results' => ['hours_per_week' => '(1/52)*yearly/hourly', 'hourly' => '(1/52)*yearly/hours_per_week', 'yearly' => '52*hourly*hours_per_week'],
        ],
        [
            'title' => 'monthly = hourly * hours_per_week * 52 / 12',
            'results' => ['hours_per_week' => '(3/13)*monthly/hourly', 'hourly' => '(3/13)*monthly/hours_per_week', 'monthly' => '(13/3)*hourly*hours_per_week'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Wage to salary works out Daily wage and Weekly wage from Hourly wage and Hours per week. Nothing is looked up on this page: daily wage is computed from hourly wage and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Daily wage is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Wage to salary calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Wage to salary: it takes 2 numbers and reports Daily wage, Weekly wage and Days per week.</p><p>Written with the labels from the form, Weekly wage = Hourly wage × Hours per week.</p><p>What comes back is Daily wage, Weekly wage, Days per week and Monthly salary — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Hourly wage</strong> — in USD</li><li><strong>Hours per week</strong> — in hours / week</li></ul><p>The result boxes are Daily wage in USD, Weekly wage in USD, Days per week in days / week, Monthly salary in USD, Yearly salary in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Hourly wage = 10 USD, Daily wage = 100 USD, Hours per week = 40 hours / week, Days per week = 5 days / week, Monthly salary = 100 USD and Yearly salary = 1000 USD — through the same formula and the panel reports <strong>Weekly wage</strong> = 400 USD.</p><ul><li><strong>Weekly wage</strong> = 400 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Weekly wage</strong> = 400. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Daily wage is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code></li><li><strong>Hours per week</strong> = <code>Weekly wage ÷ Hourly wage</code></li><li><strong>Hourly wage</strong> = <code>Weekly wage ÷ Hours per week</code></li><li><strong>Daily wage</strong> = <code>Hourly wage × Hours per week ÷ Days per week</code></li><li><strong>Days per week</strong> = <code>Hourly wage × Hours per week ÷ Daily wage</code></li><li><strong>Yearly salary</strong> = <code>52 × Hourly wage × Hours per week</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Weekly wage ÷ Hourly wage</code> — the form to use when Weekly wage and Hourly wage are the values you have.</li><li><strong>Hourly wage</strong> = <code>Weekly wage ÷ Hours per week</code> — the form to use when Weekly wage and Hours per week are the values you have.</li><li><strong>Daily wage</strong> = <code>Hourly wage × Hours per week ÷ Days per week</code> — the form to use when Hourly wage, Hours per week and Days per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Daily wage × Days per week ÷ Hourly wage</code> — the form to use when Daily wage, Days per week and Hourly wage are the values you have.</li><li><strong>Hourly wage</strong> = <code>Daily wage × Days per week ÷ Hours per week</code> — the form to use when Daily wage, Days per week and Hours per week are the values you have.</li><li><strong>Days per week</strong> = <code>Hourly wage × Hours per week ÷ Daily wage</code> — the form to use when Hourly wage, Hours per week and Daily wage are the values you have.</li><li><strong>Yearly salary</strong> = <code>52 × Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li></ul><p>Any one of Weekly wage, Hours per week and Hourly wage can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Hourly wage, from 10 to 20 — and the answers go from <strong>Weekly wage</strong> 400 USD to <strong>Weekly wage</strong> 800 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Daily wage, Weekly wage and Days per week are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Hourly wage left as a guess.</strong> Anything typed into Hourly wage is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Hours per week left as a guess.</strong> Anything typed into Hours per week is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Hourly wage is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Hourly wage</strong> takes a plain number with no unit attached. It feeds Hours per week, Weekly wage and Daily wage. Have it to hand before you start: Hourly wage is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hours per week</strong> is measured in hours / week. It feeds Weekly wage, Hourly wage and Daily wage. Have it to hand before you start: Hours per week is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Daily wage</strong> is a plain number. It is computed from Hourly wage, Hours per week and Days per week, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Weekly wage</strong> is a plain number and the page's own defaults put it at 400. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Days per week</strong> is a plain number. It is computed from Hourly wage, Hours per week and Daily wage, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Monthly salary</strong> is a plain number. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Yearly salary</strong> is a plain number. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Weekly wage</th></tr></thead><tbody><tr><td><strong>Hourly wage</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Daily wage</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Hours per week</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Days per week</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Monthly salary</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Yearly salary</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Hourly wage: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Daily wage, Days per week and Monthly salary barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Hourly wage = 5 USD, Daily wage = 50 USD, Hours per week = 20 hours / week, Days per week = 2.5 days / week, Monthly salary = 50 USD and Yearly salary = 500 USD, the answer is <strong>Weekly wage</strong> = 100 USD.</li><li>With Hourly wage = 30 USD, Daily wage = 100 USD, Hours per week = 40 hours / week, Days per week = 5 days / week, Monthly salary = 100 USD and Yearly salary = 1000 USD, the answer is <strong>Weekly wage</strong> = 1200 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Daily wage is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Hourly wage and Hours per week is what you already know and Daily wage and Weekly wage is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/ltv">LTV (Loan to Value) Calculator</a>, <a href="/finance/lumpsum">Lumpsum (India)</a> and <a href="/finance/lumpsum-plus-sip">Lumpsum plus SIP</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Wage to salary calculator work out?', 'a' => 'Daily wage, Weekly wage, Days per week and Monthly salary, from Hourly wage and Hours per week. The relationship is Weekly wage = Hourly wage × Hours per week.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Hourly wage (USD), Hours per week (hours / week). With hourly wage and hours per week in place, Daily wage can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Weekly wage, Hours per week, Hourly wage and Daily wage blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Weekly wage = 400 USD. Those are the defaults written into the form — move Hourly wage and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Daily wage is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Hourly wage left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Daily wage keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/ltv', 'name' => 'LTV (Loan to Value) Calculator'],
            ['path' => '/finance/lumpsum', 'name' => 'Lumpsum (India)'],
            ['path' => '/finance/lumpsum-plus-sip', 'name' => 'Lumpsum plus SIP'],
        ],
        'authors' => [],
    ],
];

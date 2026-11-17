<?php

/**
 * Absence percentage
 * /finance/absence-percentage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Absence percentage',
    'meta' => ['title' => 'Absence percentage: Formula, Steps & Results', 'description' => 'Absence percentage takes total employees, total workdays and total days absent and returns absenteeism rate. The formula is printed in the form\'s own words.', 'h1' => 'Absence percentage Calculator', 'updated' => '2026-09-22'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Total_Employees',
                            'label' => 'Total employees',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Total_workdays',
                            'label' => 'Total workdays',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Total_days_absent',
                            'label' => 'Total days absent',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Absenteeism_Rate',
                            'label' => 'Absenteeism rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Absenteeism_Rate = (Total_days_absent/(Total_Employees*Total_workdays))*100',
            'results' => ['Absenteeism_Rate' => '100*Total_days_absent/(Total_Employees*Total_workdays)', 'Total_Employees' => '100*Total_days_absent/(Absenteeism_Rate*Total_workdays)', 'Total_workdays' => '100*Total_days_absent/(Absenteeism_Rate*Total_Employees)', 'Total_days_absent' => '(1/100)*Absenteeism_Rate*Total_Employees*Total_workdays'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Absence percentage takes Total employees, Total workdays and Total days absent and returns Absenteeism rate. There is no hidden constant here: change absenteeism rate and total employees moves with it. The main result, Absenteeism rate, is reported in %.
        TXT,
        'sections' => [
            ['title' => 'How the Absence percentage calculator works', 'html' => <<<'TXT'
            <p>The Absence percentage calculator applies one relationship to 3 numbers and reports Absenteeism rate.</p><p>In the form&#039;s own words, Absenteeism rate = 100 × Total days absent ÷ (Total employees × Total workdays).</p><p>The answers are Absenteeism rate; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Total employees</strong> — a plain number, no unit</li><li><strong>Total workdays</strong> — a plain number, no unit</li><li><strong>Total days absent</strong> — a plain number, no unit</li></ul><p>What you get back is Absenteeism rate in %, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Total employees = 10, Total workdays = 100 and Total days absent = 1000; the answers are <strong>Absenteeism rate</strong> = 100 %.</p><ul><li><strong>Absenteeism rate</strong> = 100 %</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Absenteeism rate</strong> = <code>100 × Total days absent ÷ (Total employees × Total workdays)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Absenteeism rate</strong> = 100 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Absenteeism rate takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Absenteeism rate</strong> = <code>100 × Total days absent ÷ (Total employees × Total workdays)</code></li><li><strong>Total employees</strong> = <code>100 × Total days absent ÷ (Absenteeism rate × Total workdays)</code></li><li><strong>Total workdays</strong> = <code>100 × Total days absent ÷ (Absenteeism rate × Total employees)</code></li><li><strong>Total days absent</strong> = <code>(1 ÷ 100) × Absenteeism rate × Total employees × Total workdays</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Absenteeism rate</strong> = <code>100 × Total days absent ÷ (Total employees × Total workdays)</code> — the form to use when Total days absent, Total employees and Total workdays are the values you have.</li><li><strong>Total employees</strong> = <code>100 × Total days absent ÷ (Absenteeism rate × Total workdays)</code> — the form to use when Total days absent, Absenteeism rate and Total workdays are the values you have.</li><li><strong>Total workdays</strong> = <code>100 × Total days absent ÷ (Absenteeism rate × Total employees)</code> — the form to use when Total days absent, Absenteeism rate and Total employees are the values you have.</li><li><strong>Total days absent</strong> = <code>(1 ÷ 100) × Absenteeism rate × Total employees × Total workdays</code> — the form to use when Absenteeism rate, Total employees and Total workdays are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Absenteeism rate, Total employees and Total workdays can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Total employees from 10 to 20, leaving every other box alone. The panel moves from <strong>Absenteeism rate</strong> 100 % to <strong>Absenteeism rate</strong> 50 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Absenteeism rate is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Total employees left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total employees is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Total workdays left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total workdays is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Total days absent left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total days absent is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Total employees is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Absence percentage form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Total employees</strong> takes a plain number with no unit attached. The page reads it when it works out Absenteeism rate, Total workdays and Total days absent. Fill it from a measurement rather than a memory — Total employees is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total workdays</strong> takes a plain number with no unit attached. The page reads it when it works out Absenteeism rate, Total employees and Total days absent. Fill it from a measurement rather than a memory — Total workdays is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total days absent</strong> takes a plain number with no unit attached. The page reads it when it works out Absenteeism rate, Total employees and Total workdays. Fill it from a measurement rather than a memory — Total days absent is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Absenteeism rate</strong> is a plain number and the page's own defaults put it at 100. It is worked out from Total days absent, Total employees and Total workdays. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Absenteeism rate</th></tr></thead><tbody><tr><td><strong>Total employees</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Total workdays</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Total days absent</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Total days absent sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Total employees = 5, Total workdays = 50 and Total days absent = 500 and the page reports <strong>Absenteeism rate</strong> = 200 %.</li><li>Feed in Total employees = 30, Total workdays = 100 and Total days absent = 1000 and the page reports <strong>Absenteeism rate</strong> = 33.33 %.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Total employees, Total workdays and Total days absent ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Total employees — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Absenteeism rate in % against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Absenteeism rate follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Total employees, Total workdays and Total days absent and the number you are missing is Absenteeism rate.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/cross-exchange-rate">Cross exchange rate Calculator</a>, <a href="/finance/cross-price-elasticity">Cross price elasticity</a> and <a href="/finance/ctr">CTR Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Absence percentage is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Total employees, Total workdays and Total days absent beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Absence percentage calculator work out?', 'a' => <<<'TXT'
            Absenteeism rate, from Total days absent, Total employees and Total workdays. The relationship is Absenteeism rate = 100 × Total days absent ÷ (Total employees × Total workdays).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total employees, Total workdays, Total days absent. Enter total employees, total workdays and total days absent; Absenteeism rate is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Absenteeism rate, Total employees, Total workdays and Total days absent can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Absenteeism rate = 100 %. Those are the defaults written into the form — move Total employees and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Absenteeism rate is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Total employees blank and the page solves for it, reporting Absenteeism rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Absenteeism rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/cross-exchange-rate', 'name' => 'Cross exchange rate Calculator'],
            ['path' => '/finance/cross-price-elasticity', 'name' => 'Cross price elasticity'],
            ['path' => '/finance/ctr', 'name' => 'CTR Calculator'],
        ],
        'authors' => [],
    ],
];

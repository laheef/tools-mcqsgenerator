<?php

/**
 * Income tax - Pakistan
 * /finance/income-tax-pakistan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Income tax - Pakistan',
    'meta' => ['title' => 'Income tax - Pakistan — Free Online Calculator', 'description' => 'Income tax - Pakistan works out yearly tax. The formula is printed in the form\'s own words, so the arithmetic can be checked. A worked example follows.', 'h1' => 'Income tax - Pakistan Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthlyIncome',
                            'label' => 'Monthly income',
                            'type' => 'number',
                            'suffix' => 'Rs. ',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
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
                            'name' => 'yearlyTax',
                            'label' => 'Yearly tax',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yearlyIncome',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthlyTax',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthlyIncomeAfterTax',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'yearlyTax = calculateIncomeTax(monthlyIncome)',
            'results' => ['yearlyTax' => 'calculateIncomeTax(monthlyIncome)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("calculateIncomeTax",function(monthlyIncome){var tax=0;var exceeding=0;var yearly=0;var salaryM=0;var salaryY=0;yearly=monthlyIncome*12;if(yearly<=600000){salaryM=monthlyIncome;salaryY=salaryM*12}if(yearly>600000&&yearly<=1200000){exceeding=yearly-600000;tax=exceeding*0.01;salaryY=yearly-tax;salaryM=salaryY/12}if(yearly>1200000&&yearly<=2200000){exceeding=yearly-1200000;tax=exceeding*0.11+6000;salaryY=yearly-tax;salaryM=salaryY/12}if(yearly>2200000&&yearly<=3200000){exceeding=yearly-2200000;tax=exceeding*0.25+116000;salaryY=yearly-tax;salaryM=salaryY/12}if(yearly>3200000&&yearly<=4100000){exceeding=yearly-3200000;tax=exceeding*0.25+316000;salaryY=yearly-tax;salaryM=salaryY/12}if(yearly>4100000&&yearly<=5600000){exceeding=yearly-4100000;tax=exceeding*0.29+541000;salaryY=yearly-tax;salaryM=salaryY/12}if(yearly>5600000&&yearly<=7000000){exceeding=yearly-5600000;tax=exceeding*0.32+976000;salaryY=yearly-tax;salaryM=salaryY/12}if(yearly>7000000){exceeding=yearly-7000000;tax=exceeding*0.35+1424000;salaryY=yearly-tax;salaryM=salaryY/12}return tax});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Monthly income into Income tax - Pakistan and the answer comes back as Yearly tax. It is a single relationship that reads yearly tax out of monthly income, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Income tax - Pakistan calculator works', 'html' => <<<'TXT'
            <p>The Income tax - Pakistan calculator applies one relationship to 1 number and reports Yearly tax.</p><p>In the form&#039;s own words, Yearly tax = calculateIncomeTax(Monthly income).</p><p>What comes back is Yearly tax — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Monthly income</strong> — in Rs.</li></ul><p>The answer comes back as Yearly tax. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Yearly tax is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Yearly tax</strong> = <code>calculateIncomeTax(Monthly income)</code></li></ul>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Yearly tax is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Monthly income left as a guess.</strong> Anything typed into Monthly income is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Monthly income and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Monthly income</strong> is measured in Rs.. The page reads it when it works out Yearly tax. Have it to hand before you start: Monthly income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Yearly tax</strong> is a plain number. It is computed from Monthly income, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Monthly income. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Monthly income into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Yearly tax with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Yearly tax is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Monthly income is what you already know and Yearly tax is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/software-contract-value">Software contract value Calculator</a>, <a href="/finance/sortino-ratio">Sortino ratio Calculator</a> and <a href="/finance/spending-multiplier">Spending multiplier</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>Neighbouring pages resolve the parts of the same job that Income tax - Pakistan leaves alone. Knowing which is which saves running the wrong one:</p><p>Worth opening next: <a href="/finance/software-contract-value">Software contract value Calculator</a>, <a href="/finance/sortino-ratio">Sortino ratio Calculator</a> and <a href="/finance/spending-multiplier">Spending multiplier</a>. They follow the same pattern as this page (form, formula, worked example, answer), so a reader who understands one understands the others.</p><p>Using the page that already answers the question you have is better than adapting this one: the formula and the units will match what you expect, and the worked example will be about your case.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Income tax - Pakistan is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Monthly income beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
            ['title' => 'Confirm the tax year and the income definition', 'html' => <<<'TXT'
            <p>This page returns a yearly tax estimate from monthly income using the tax logic included in the calculator. Tax rules and thresholds can change, so confirm which tax year the page models before treating the result as a current liability. Check whether the input is gross monthly income or another figure, and use the same definition consistently; a take-home amount after deductions is not interchangeable with gross income. Compare the estimate with current official guidance from Pakistan's Federal Board of Revenue or a qualified tax adviser before filing or making a payment. The calculator does not account for every taxpayer's deductions, exemptions, income sources or personal circumstances.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Income tax - Pakistan calculator work out?', 'a' => 'Yearly tax, from Monthly income. The relationship is Yearly tax = calculateIncomeTax(Monthly income).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Monthly income (Rs.). Fill monthly income and leave Yearly tax empty if you would rather have that one solved instead.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Yearly tax is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'Every box has to have a number in it. What this page returns is Yearly tax, so an empty input simply leaves the result blank rather than choosing a new unknown.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Yearly tax keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/software-contract-value', 'name' => 'Software contract value Calculator'],
            ['path' => '/finance/sortino-ratio', 'name' => 'Sortino ratio Calculator'],
            ['path' => '/finance/spending-multiplier', 'name' => 'Spending multiplier'],
        ],
        'authors' => [],
    ],
];

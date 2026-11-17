<?php

/**
 * Debt to income ratio
 * /finance/dti
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Debt to income ratio',
    'meta' => ['title' => 'Debt to income ratio — Free Online Calculator', 'description' => 'Debt to income ratio works out debt-to-income (DTI) ratio from income and recurring monthly debt. Results come back in perc, with any other unit a click away.', 'h1' => 'Debt to income ratio Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income',
                            'label' => 'Income',
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
                            'name' => 'debt',
                            'label' => 'Recurring monthly debt',
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
                            'name' => 'DTI',
                            'label' => 'Debt-to-income (DTI) ratio',
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
                            'name' => 'DTI_quality',
                            'label' => 'Your DTI is...',
                            'type' => 'number',
                            'help' => 'Debt-to-income rating.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Extra debt info',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'limit_debt',
                            'label' => 'Monthly debt limit',
                            'type' => 'number',
                            'help' => 'Limit defined by your lender, e.g. the bank.',
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
                            'name' => 'additional_debt',
                            'label' => 'Additional debt',
                            'type' => 'number',
                            'help' => 'Your lender allows you to borrow this amount on top of your regular monthly debt.',
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
            'title' => 'DTI = debt / income',
            'results' => ['debt' => 'DTI*income', 'DTI' => 'debt/income', 'income' => 'debt/DTI'],
        ],
        [
            'title' => 'additional_debt = max(0, (-DTI+limit_debt)*income)',
            'results' => ['additional_debt' => 'max(0, income*(-DTI + limit_debt))'],
        ],
        [
            'title' => 'DTI_quality = quality (DTI)',
            'results' => ['DTI_quality' => 'quality(DTI)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("quality",function(DTI){if(DTI<=0.2){return 1}else if(DTI<=0.36){return 2}else if(DTI<=0.42){return 3}else if(DTI<=0.49){return 4}else{return 5}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Debt to income ratio takes Income and Recurring monthly debt and returns Debt-to-income (DTI) ratio and Your DTI is…. There is no hidden constant here: change debt-to-income (DTI) ratio and income moves with it. The main result, Debt-to-income (DTI) ratio, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Debt to income ratio calculator works', 'html' => <<<'TXT'
            <p>The Debt to income ratio calculator applies one relationship to 2 numbers and reports Debt-to-income (DTI) ratio, Your DTI is… and Additional debt.</p><p>The relationship it solves reads Debt-to-income (DTI) ratio = Recurring monthly debt ÷ Income.</p><p>The answers are Debt-to-income (DTI) ratio, Your DTI is… and Additional debt; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Income</strong> — in USD</li><li><strong>Recurring monthly debt</strong> — in USD</li></ul><p>What you get back is Debt-to-income (DTI) ratio in percent, Your DTI is…, Additional debt in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Debt-to-income (DTI) ratio offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Debt-to-income (DTI) ratio</strong> = <code>Recurring monthly debt ÷ Income</code></li><li><strong>Recurring monthly debt</strong> = <code>Debt-to-income (DTI) ratio × Income</code></li><li><strong>Income</strong> = <code>Recurring monthly debt ÷ Debt-to-income (DTI) ratio</code></li><li><strong>Additional debt</strong> = <code>max(0, Income × ( − Debt-to-income (DTI) ratio + Monthly debt limit))</code></li><li><strong>Your DTI is…</strong> = <code>quality(Debt-to-income (DTI) ratio)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Debt-to-income (DTI) ratio</strong> = <code>Recurring monthly debt ÷ Income</code> — the form to use when Recurring monthly debt and Income are the values you have.</li><li><strong>Recurring monthly debt</strong> = <code>Debt-to-income (DTI) ratio × Income</code> — the form to use when Debt-to-income (DTI) ratio and Income are the values you have.</li><li><strong>Income</strong> = <code>Recurring monthly debt ÷ Debt-to-income (DTI) ratio</code> — the form to use when Recurring monthly debt and Debt-to-income (DTI) ratio are the values you have.</li><li><strong>Additional debt</strong> = <code>max(0, Income × ( − Debt-to-income (DTI) ratio + Monthly debt limit))</code> — the form to use when Income, Debt-to-income (DTI) ratio and Monthly debt limit are the values you have.</li><li><strong>Your DTI is…</strong> = <code>quality(Debt-to-income (DTI) ratio)</code> — the form to use when Debt-to-income (DTI) ratio are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Debt-to-income (DTI) ratio, Recurring monthly debt and Income can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Debt-to-income (DTI) ratio, Your DTI is… and Additional debt are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Income left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Income is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Recurring monthly debt left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Recurring monthly debt is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Income is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Income</strong> takes a plain number with no unit attached. Change it and Recurring monthly debt, Debt-to-income (DTI) ratio and Additional debt changes with it. Have it to hand before you start: Income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Recurring monthly debt</strong> takes a plain number with no unit attached. Change it and Debt-to-income (DTI) ratio and Income changes with it. Have it to hand before you start: Recurring monthly debt is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Debt-to-income (DTI) ratio</strong> is a percent figure. It is computed from Recurring monthly debt and Income, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Your DTI is…</strong> is a plain number. It is computed from Debt-to-income (DTI) ratio, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Additional debt</strong> is a plain number. It is computed from Income, Debt-to-income (DTI) ratio and Monthly debt limit, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Income and Recurring monthly debt. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Income into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Debt-to-income (DTI) ratio in perc with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Debt-to-income (DTI) ratio follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Income and Recurring monthly debt is what you already know and Debt-to-income (DTI) ratio and Your DTI is… is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/profit">Profit Calculator</a>, <a href="/finance/profitability-index">Profitability index Calculator</a> and <a href="/finance/prorated-rent">Prorated rent Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Debt to income ratio calculator work out?', 'a' => <<<'TXT'
            Debt-to-income (DTI) ratio, Your DTI is… and Additional debt, from Recurring monthly debt and Income. The relationship is Debt-to-income (DTI) ratio = Recurring monthly debt ÷ Income.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Income (USD), Recurring monthly debt (USD). With income and recurring monthly debt in place, Debt-to-income (DTI) ratio can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Debt-to-income (DTI) ratio, Recurring monthly debt, Income and Additional debt can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Debt-to-income (DTI) ratio is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Income left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Debt-to-income (DTI) ratio keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/profit', 'name' => 'Profit Calculator'],
            ['path' => '/finance/profitability-index', 'name' => 'Profitability index Calculator'],
            ['path' => '/finance/prorated-rent', 'name' => 'Prorated rent Calculator'],
        ],
        'authors' => [],
    ],
];

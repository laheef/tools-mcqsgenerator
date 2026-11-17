<?php

/**
 * Child tax credit
 * /finance/child-tax-credit
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Child tax credit',
    'meta' => ['title' => 'Child tax credit — Formula, Steps & Examples', 'description' => 'Child tax credit solves for any one of your filing status, Income (AGI) and 1st child, given the rest. The formula is printed in the form\'s own words.', 'h1' => 'Child tax credit Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        The Child Tax Credit is an initiative introduced by the US government to boost the income of families with dependents under 18 years old. Find out how much you can get!
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'married',
                            'label' => 'Your filing status',
                            'type' => 'select',
                            'options' => ['Single' => '1', 'Joint' => '2', 'Head of household' => '3'],
                            'dataset' => 'singlemarried',
                            'help' => 'Head of household typically means a single parent or a married couple with a single earner.',
                            'default' => 'Single',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income2019',
                            'label' => 'Income (AGI)',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'Adjusted gross income on your tax form. Use details from your 2019 or 2020 tax return.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Children\'s ages',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Your children must be listed as dependents on your federal tax return. Input only the full years the child has finished.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'course_1',
                            'label' => '1st child',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'course_2',
                            'label' => '2nd child',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'course_3',
                            'label' => '3rd child',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'course_4',
                            'label' => '4th child',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'course_5',
                            'label' => '5th child',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'course_6',
                            'label' => '6th child',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'course_7',
                            'label' => '7th child',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'course_8',
                            'label' => '8th child',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'course_9',
                            'label' => '9th child',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'course_10',
                            'label' => '10th child',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'hasValue(income2019)', 'text' => <<<'TXT'
                                 Your estimated 2024 Child Tax Credit is ${{res1.value}}  Over the course of five years, you'll get a total of ${{res2.value}} Make sure you're eligible for the Child Tax Credit.
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";omni.onResult(["married","income2019"],function(ctx,_ref){var married=_ref.married,income2019=_ref.income2019,course_1=_ref.course_1,course_2=_ref.course_2,course_3=_ref.course_3,course_4=_ref.course_4,course_5=_ref.course_5,course_6=_ref.course_6,course_7=_ref.course_7,course_8=_ref.course_8,course_9=_ref.course_9,course_10=_ref.course_10;var varArray=[course_1,course_2,course_3,course_4,course_5,course_6,course_7,course_8,course_9,course_10];var number_of_vars=0;var kids=[];var result2019;var result5years=0;var nextYear;var result1,result2;for(var _i=0,_varArray=varArray;_i<_varArray.length;_i++){var i=_varArray[_i];if(i!==null){kids.push(mathjs.floor(mathjs.abs(i)));number_of_vars++}}if(number_of_vars>=1&&income2019!==null){result2019=getResult2019(married,income2019,kids);result1=numberWithCommas(Math.round(result2019));for(var _i2=0;_i2<5;_i2++){nextYear=getResult2019(married,income2019,kids);result5years+=nextYear;kids=ageKids(kids)}result2=numberWithCommas(Math.round(result5years))}ctx.exportValue("res1",result1);ctx.exportValue("res2",result2)});function getResult2019(status,income,kids){var result=0;kids=seperateKids(kids);if(status===1){if(income<=75000){result=2000*kids[0]+2000*kids[1]}else{result=2000*kids[0]+2000*kids[1];result=Math.max(2000*(kids[1]+kids[0]),result-0.05*(income-75000))}}else if(status===2){if(income<=150000){result=2000*kids[0]+2000*kids[1]}else{result=2000*kids[0]+2000*kids[1];result=Math.max(2000*(kids[1]+kids[0]),result-0.05*(income-150000))}}else if(status===3){if(income<=112500){result=2000*kids[0]+2000*kids[1]}else{result=2000*kids[0]+2000*kids[1];result=Math.max(2000*(kids[1]+kids[0]),result-0.05*(income-112500))}}return result}function seperateKids(kids){var noOfSmall=0;var noOfBig=0;for(var i=0;i<kids.length;i++){if(kids[i]<6){noOfSmall++}else if(kids[i]<=17){noOfBig++}}return[noOfSmall,noOfBig]}function ageKids(kids){for(var i=0;i<kids.length;i++){kids[i]++}return kids}function numberWithCommas(x,separator){if(separator==undefined){separator=","}return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g,separator)}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => 'The Child tax credit calculator takes the numbers you enter and reports the result immediately.',
        'sections' => [
            ['title' => 'How does the Child tax credit calculator work?', 'html' => <<<'TXT'
            <p>The Child tax credit calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you choose the option that describes your case (your filing status); then you type in the income (AGI).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <table><caption>What you supply, field by field</caption><thead><tr><th>Field</th><th>Units and meaning</th></tr></thead><tbody><tr><td>Your filing status</td><td>pick the option that matches your case — 3 options, such as single, joint and head of household. The choice changes which relationship the calculator applies, not just a multiplier, so it is worth reading the options carefully.</td></tr><tr><td>Income (AGI)</td><td>a plain number with no unit attached.</td></tr><tr><td>1st child</td><td>a number, expressed in years.</td></tr><tr><td>2nd child</td><td>a number, expressed in years.</td></tr><tr><td>3rd child</td><td>a number, expressed in years.</td></tr><tr><td>4th child</td><td>a number, expressed in years.</td></tr><tr><td>5th child</td><td>a number, expressed in years.</td></tr><tr><td>6th child</td><td>a number, expressed in years.</td></tr><tr><td>7th child</td><td>a number, expressed in years.</td></tr><tr><td>8th child</td><td>a number, expressed in years.</td></tr><tr><td>9th child</td><td>a number, expressed in years.</td></tr><tr><td>10th child</td><td>a number, expressed in years.</td></tr></tbody></table><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Child tax credit calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Comparing two offers that quote their costs in different ways</li><li>Preparing questions for a lender, an accountant or an adviser</li><li>Sizing up a purchase before you commit to it</li><li>Any time the same 1 figures keep coming back — the income </li></ul>
            TXT],
            ['title' => 'How do you get a reliable answer?', 'html' => <<<'TXT'
            <ul><li>Round only at the end. </li><li>If a result surprises you, look at the order of magnitude before the digits: a plausible number in the wrong unit looks more convincing than an implausible one, and is easier to miss.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Child tax credit calculator, these are the ones that matter:</p>
            <ul><li>The 1 drop-down on this page offers a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li><li>There is nothing to invert here: the result is produced in one direction only, from the values you supply.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — your filing status for instance — and watch which results move. A result that stays put does not depend on it.</li><li> If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these finance calculators cover the neighbouring steps: <a href="/finance/trump-tax">Trump tax</a>, <a href="/finance/trumps-account">Trump's account</a> and <a href="/finance/ttm-trailing-twelve-months">TTM (trailing twelve months)</a>.</p>
            TXT],
            ['title' => 'Check the tax year before using the estimate', 'html' => <<<'TXT'
            <p>This page is a historical estimate built around the 2019 or 2020 tax return inputs named in the form. It should not be read as a current-year child tax credit calculation. Tax rules, credit amounts, income thresholds, eligibility tests and filing forms can change from one year to another. A familiar label does not mean that a rule has stayed the same. Before using a number in a return, first match the year shown by the calculator with the year of the return you are preparing.</p>
            <p>Start with the filing status and adjusted gross income from the relevant return or draft return, rather than a current payslip or a rough household total. Then enter the child information in the slots the form provides. If your situation includes a change in custody, a child who lived in more than one home, a new child, an age transition, or a child who does not meet the definition used for that tax year, pause before relying on an estimate. Those details can affect eligibility even when the income figure is correct.</p>
            <p>The result is useful as a way to explore the assumptions represented by this older model. It is not a determination from the tax authority, and it does not submit a return, check supporting documents, or decide which adult is entitled to claim a child. Treat it as a calculation to compare with the source rules and records, not as permission to claim an amount.</p>
            TXT],
            ['title' => 'Gather records, not guesses', 'html' => <<<'TXT'
            <p>Before entering numbers, have the tax-year income figure available and identify which document it came from. Adjusted gross income is a particular figure on a tax return; it is not always the same as salary, take-home pay, taxable income, or the sum of deposits in a bank account. Using one of those nearby numbers in its place can move the estimate substantially. If the return is still being prepared, label the input as provisional and revisit it when the return figures are settled.</p>
            <p>For each child, check the facts that applied during the year being modeled. Keep records that help establish identity, age, relationship, residence and any relevant support or custody arrangement. The calculator cannot inspect those records and does not know whether two people have entered the same child on separate returns. Do not enter the same child twice simply because more than one household contributed to their care. If the form's slots do not match the family situation, that is a reason to consult the instructions for the tax year, not to force a convenient value into a slot.</p>
            <p>Enter the filing-status choice that matches the return being evaluated. The label's explanation is a prompt, not a full eligibility test; filing status can depend on several facts beyond whether someone is married or has a child. When the status is uncertain, compare the official tests for that year first, then rerun the estimate under the supported choice. Keeping a note of the source document and assumptions makes a later review much easier.</p>
            TXT],
            ['title' => 'Why a tax estimate may not match a filed return', 'html' => <<<'TXT'
            <p>A difference does not automatically mean that either number is wrong. The calculator may model only a subset of the rules, while a filed return applies the full set of eligibility, phaseout, limitation and interaction rules for a particular year. Other credits, tax liability, income categories, filing choices, amendments and special circumstances can change what is ultimately allowed. The page's simple inputs are not a substitute for the schedules and supporting questions on an official return.</p>
            <p>Check the year first, then check that the income measure and filing status are the same in both calculations. Review each child entry for a duplicate, an omitted child or a fact entered under the wrong year. Confirm that the calculator's assumptions actually cover the case. A result that changes when one input changes is a clue about the model's sensitivity, not proof that the changed assumption is legally correct.</p>
            <p>Keep the calculator output separate from a refund estimate. A credit amount, a tax liability, withholding already paid and a refund are different quantities. This page should not be used to infer a refund unless the form explicitly calculates it and accounts for all relevant parts of the return. Likewise, a displayed estimate should not be copied into a filing field whose name or definition differs from the result shown here.</p>
            TXT],
            ['title' => 'A careful way to use this page', 'html' => <<<'TXT'
            <p>Run the page with the figures for one tax year at a time. Write down the year, filing-status assumption, income source and child facts alongside the result. Change one input at a time when testing a scenario; this makes it clear which assumption caused a change. If two scenarios differ in several ways, save them separately rather than trying to remember which values were used.</p>
            <p>For an independent check, compare the inputs with the relevant return and the instructions for the same tax year. If the official instructions provide a worksheet, follow that worksheet as the controlling method and use this calculator only as a cross-check. If the numbers do not reconcile, look for a year mismatch, a difference between adjusted gross income and another income figure, or an eligibility condition the tool does not model. Do not keep changing inputs until the result looks familiar.</p>
            <p>Tax questions involving more than one household, shared custody, amended returns, or unusual income are particularly poor candidates for a single-number shortcut. Gather the records, identify the exact year and get help from a qualified tax professional or the relevant tax authority when the rule is not clear. The calculator can make a relationship easier to inspect; it cannot take responsibility for the facts or the filing decision.</p>
            TXT],
            ['title' => 'When to stop and verify a rule', 'html' => <<<'TXT'
            <p>Pause if the child lived in more than one household, if another adult may claim the same child, or if the family changed during the tax year. These are not small rounding questions: they can determine which eligibility test applies. Also pause if you are comparing a historical result with a present-day benefit or a different tax year. The calculator is intentionally limited to the data and relationships encoded in its form. A qualified adviser or the official instructions can address facts this page does not ask about. Keep the result, the year and the assumptions together so that no one mistakes a scenario for an approved credit.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Is this a current child tax credit calculator?', 'a' => 'No. The form refers to 2019 or 2020 tax-return details, so treat it as a historical estimate and check the rules for the tax year you are filing.'],
            ['q' => 'Which income figure should I enter?', 'a' => 'Use the adjusted gross income figure for the relevant tax year, not take-home pay or an unrelated monthly income amount.'],
            ['q' => 'Does the result confirm that a child qualifies?', 'a' => 'No. The calculator cannot verify residence, relationship, custody or other eligibility facts. Check the official instructions for the year modeled.'],
            ['q' => 'Can I use this estimate to file or claim a credit?', 'a' => <<<'TXT'
            Do not use it as a filing decision by itself. Compare the result with the official tax-year worksheet and get qualified help if your circumstances are not straightforward.
            TXT],
            ['q' => 'Why might my filed return show a different amount?', 'a' => 'A return may apply additional eligibility, income, limitation and credit-interaction rules that this historical calculator does not model.'],
        ],
        'related' => [
            ['path' => '/finance/trump-tax', 'name' => 'Trump tax'],
            ['path' => '/finance/trumps-account', 'name' => 'Trump\'s account'],
            ['path' => '/finance/ttm-trailing-twelve-months', 'name' => 'TTM (trailing twelve months)'],
        ],
        'authors' => [],
    ],
];

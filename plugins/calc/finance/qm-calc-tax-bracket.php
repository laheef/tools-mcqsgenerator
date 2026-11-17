<?php

/**
 * Tax bracket
 * /finance/tax-bracket
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tax bracket',
    'meta' => ['title' => 'Tax bracket Calculator: Formula, Steps & Examples', 'description' => 'Tax bracket turns year, filing status and total taxable income into standard. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Tax bracket Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Year',
                            'label' => 'Year',
                            'type' => 'select',
                            'options' => ['2022' => '1', '2023' => '2', '2024' => '3'],
                            'control' => 'DROPDOWN',
                            'default' => '2024',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Stat',
                            'label' => 'Filing status',
                            'type' => 'select',
                            'options' => ['Single' => '1', 'Married filing jointly' => '2', 'Married filing separately' => '3', 'Head of household' => '4'],
                            'dataset' => 'Stat',
                            'control' => 'DROPDOWN',
                            'default' => 'Single',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Income',
                            'label' => 'Total taxable income',
                            'type' => 'number',
                            'suffix' => '$',
                            'help' => 'The annual total taxable income after deductions for retirement contributions such as 401(k)s, IRAs, etc.&nbsp;',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Deduc',
                            'label' => 'Deductions',
                            'type' => 'number',
                            'suffix' => '$',
                            'help' => 'If you don\'t set a deduction or it is less than the standard deduction, the standard deduction will be considered.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'The federal income tax on your income is {{res1.value}}.'],
                                ['when' => 'Standard == 1', 'text' => 'Your taxable income is reduced by the standard deduction of {{res2.value}}'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'hidden',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarStat',
                            'label' => 'Var stat',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarYear',
                            'label' => 'Var year',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Standard',
                            'label' => 'Standard',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Standard = stand(Income,VarStat,VarYear,Deduc)',
            'results' => ['Standard' => 'stand(Income, VarStat, VarYear, Deduc)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.onResult(["Income","VarStat","VarYear","Deduc"],function(ctx,_ref){var Income=_ref.Income,VarStat=_ref.VarStat,VarYear=_ref.VarYear,Deduc=_ref.Deduc;if(VarYear===2022){if(VarStat===1&&Deduc<12950){Deduc=12950}if(VarStat===2&&Deduc<25900){Deduc=25900}if(VarStat===3&&Deduc<12950){Deduc=12950}if(VarStat===4&&Deduc<19400){Deduc=19400}}if(VarYear===2023){if(VarStat===1&&Deduc<13850){Deduc=13850}if(VarStat===2&&Deduc<27700){Deduc=27700}if(VarStat===3&&Deduc<13850){Deduc=13850}if(VarStat===4&&Deduc<20800){Deduc=20800}}if(VarYear===2024){if(VarStat===1&&Deduc<14600){Deduc=14600}if(VarStat===2&&Deduc<29200){Deduc=29200}if(VarStat===3&&Deduc<14600){Deduc=14600}if(VarStat===4&&Deduc<21900){Deduc=21900}}if(Income<Deduc){Deduc=Income}Income=Income-Deduc;var TaxFed=0;if(VarYear===2022){TaxFed=getTaxFed22(Income,VarStat)}if(VarYear===2023){TaxFed=getTaxFed23(Income,VarStat)}if(VarYear===2024){TaxFed=getTaxFed24(Income,VarStat)}ctx.exportValue("res1",formatCurrency(TaxFed));ctx.exportValue("res2",formatCurrency(Deduc))});omni.define("stand",function(Income,VarStat,VarYear,Deduc){var Standard=0;if(VarYear===2022){if(VarStat===1&&Deduc<12950){Standard=1}if(VarStat===2&&Deduc<25900){Standard=1}if(VarStat===3&&Deduc<12950){Standard=1}if(VarStat===4&&Deduc<19400){Standard=1}}if(VarYear===2023){if(VarStat===1&&Deduc<13850){Standard=1}if(VarStat===2&&Deduc<27700){Standard=1}if(VarStat===3&&Deduc<13850){Standard=1}if(VarStat===4&&Deduc<20800){Standard=1}}if(VarYear===2024){if(VarStat===1&&Deduc<14600){Standard=1}if(VarStat===2&&Deduc<29200){Standard=1}if(VarStat===3&&Deduc<14600){Standard=1}if(VarStat===4&&Deduc<21900){Standard=1}}return Standard});function getTaxFed22(Inc,VarStat){var Brack1;var Brack2;var Brack3;var Brack4;var Brack5;var Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=10275;var UnmarBrack2=41775;var UnmarBrack3=89075;var UnmarBrack4=170050;var UnmarBrack5=215950;var UnmarBrack6=539900;var MarJointBrack1=20550;var MarJointBrack2=83550;var MarJointBrack3=178150;var MarJointBrack4=340100;var MarJointBrack5=431900;var MarJointBrack6=647850;var MarSepBrack1=10275;var MarSepBrack2=41775;var MarSepBrack3=89075;var MarSepBrack4=170050;var MarSepBrack5=215950;var MarSepBrack6=323925;var HeadBrack1=14650;var HeadBrack2=55900;var HeadBrack3=89050;var HeadBrack4=170050;var HeadBrack5=215950;var HeadBrack6=539900;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxFed23(Inc,VarStat){var Brack1;var Brack2;var Brack3;var Brack4;var Brack5;var Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=11000;var UnmarBrack2=44725;var UnmarBrack3=95375;var UnmarBrack4=182100;var UnmarBrack5=231250;var UnmarBrack6=578125;var MarJointBrack1=22000;var MarJointBrack2=89450;var MarJointBrack3=190750;var MarJointBrack4=364200;var MarJointBrack5=462500;var MarJointBrack6=693750;var MarSepBrack1=11000;var MarSepBrack2=44725;var MarSepBrack3=95375;var MarSepBrack4=182100;var MarSepBrack5=231250;var MarSepBrack6=346875;var HeadBrack1=15700;var HeadBrack2=59850;var HeadBrack3=95350;var HeadBrack4=182100;var HeadBrack5=231250;var HeadBrack6=578100;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function getTaxFed24(Inc,VarStat){var Brack1;var Brack2;var Brack3;var Brack4;var Brack5;var Brack6;var TaxRate0=0.1;var TaxRate1=0.12;var TaxRate2=0.22;var TaxRate3=0.24;var TaxRate4=0.32;var TaxRate5=0.35;var TaxRate6=0.37;var UnmarBrack1=11600;var UnmarBrack2=47150;var UnmarBrack3=100525;var UnmarBrack4=191950;var UnmarBrack5=243725;var UnmarBrack6=609350;var MarJointBrack1=23200;var MarJointBrack2=94300;var MarJointBrack3=201050;var MarJointBrack4=383900;var MarJointBrack5=487450;var MarJointBrack6=731200;var MarSepBrack1=11600;var MarSepBrack2=47150;var MarSepBrack3=100525;var MarSepBrack4=191950;var MarSepBrack5=243725;var MarSepBrack6=365600;var HeadBrack1=16550;var HeadBrack2=63100;var HeadBrack3=100500;var HeadBrack4=191950;var HeadBrack5=243700;var HeadBrack6=609350;var TaxFed;if(VarStat===1){Brack1=UnmarBrack1;Brack2=UnmarBrack2;Brack3=UnmarBrack3;Brack4=UnmarBrack4;Brack5=UnmarBrack5;Brack6=UnmarBrack6}if(VarStat===2){Brack1=MarJointBrack1;Brack2=MarJointBrack2;Brack3=MarJointBrack3;Brack4=MarJointBrack4;Brack5=MarJointBrack5;Brack6=MarJointBrack6}if(VarStat===3){Brack1=MarSepBrack1;Brack2=MarSepBrack2;Brack3=MarSepBrack3;Brack4=MarSepBrack4;Brack5=MarSepBrack5;Brack6=MarSepBrack6}if(VarStat===4){Brack1=HeadBrack1;Brack2=HeadBrack2;Brack3=HeadBrack3;Brack4=HeadBrack4;Brack5=HeadBrack5;Brack6=HeadBrack6}var Tax1=Brack1*TaxRate0;var Tax2=(Brack2-Brack1)*TaxRate1+Tax1;var Tax3=(Brack3-Brack2)*TaxRate2+Tax2;var Tax4=(Brack4-Brack3)*TaxRate3+Tax3;var Tax5=(Brack5-Brack4)*TaxRate4+Tax4;var Tax6=(Brack6-Brack5)*TaxRate5+Tax5;if(Inc<=Brack1){TaxFed=Inc*TaxRate0}else if(Inc>Brack1&&Inc<=Brack2){TaxFed=Tax1+(Inc-Brack1)*TaxRate1}else if(Inc>Brack2&&Inc<=Brack3){TaxFed=Tax2+(Inc-Brack2)*TaxRate2}else if(Inc>Brack3&&Inc<=Brack4){TaxFed=Tax3+(Inc-Brack3)*TaxRate3}else if(Inc>Brack4&&Inc<=Brack5){TaxFed=Tax4+(Inc-Brack4)*TaxRate4}else if(Inc>Brack5&&Inc<=Brack6){TaxFed=Tax5+(Inc-Brack5)*TaxRate5}else if(Inc>Brack6){TaxFed=Tax6+(Inc-Brack6)*TaxRate6}return TaxFed}function numberWithCommas(x){return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g,",")}function formatCurrency(number){return"$"+numberWithCommas(Math.round(number,2))}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => 'Tax bracket turns Total taxable income and Deductions into Standard. There is no hidden constant here: change standard and total taxable income moves with it.',
        'sections' => [
            ['title' => 'How the Tax bracket calculator works', 'html' => <<<'TXT'
            <p>The Tax bracket calculator applies one relationship to 2 numbers and reports Standard.</p><p>Written with the labels from the form, Standard = stand(Total taxable income, Var stat, Var year, Deductions).</p><p>What comes back is Standard — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Total taxable income</strong> — in $. The annual total taxable income after deductions for retirement contributions such as 401(k)s, IRAs, etc.&amp;nbsp;</li><li><strong>Deductions</strong> — in $. If you don&#039;t set a deduction or it is less than the standard deduction, the standard deduction will be considered.</li></ul><p>The result box is Standard. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: Standard takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Standard</strong> = <code>stand(Total taxable income, Var stat, Var year, Deductions)</code></li></ul>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Standard is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Total taxable income left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total taxable income is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Deductions left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Deductions is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Total taxable income is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Tax bracket form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Total taxable income</strong> is measured in $. The annual total taxable income after deductions for retirement contributions such as 401(k)s, IRAs, etc.&amp;nbsp;. Change it and Standard changes with it. Fill it from a measurement rather than a memory — Total taxable income is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Deductions</strong> is measured in $. If you don&#039;t set a deduction or it is less than the standard deduction, the standard deduction will be considered. Change it and Standard changes with it. Fill it from a measurement rather than a memory — Deductions is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Standard</strong> is a plain number. The value follows from Total taxable income, Var stat, Var year and Deductions. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Total taxable income and Deductions ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Total taxable income — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Standard against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Standard follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Total taxable income and Deductions measured, Standard wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/amortization">Amortization Calculator</a>, <a href="/finance/annual-income">Annual income Calculator</a> and <a href="/finance/annual-pay">Annual pay Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Tax bracket is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>A criterion for choosing between these pages: Tax bracket answers a different question from the one above, even where the two share a sentence of explanation.</p><p>The nearest are <a href="/finance/amortization">Amortization Calculator</a>, <a href="/finance/annual-income">Annual income Calculator</a> and <a href="/finance/annual-pay">Annual pay Calculator</a>. Each takes its own inputs and reports its own answer, and none of them shares a stored value with this page — open two in separate tabs and they will not interfere.</p><p>If the value you need is not the one reported here but a step before or after it, one of those pages probably reports it directly rather than making you convert by hand.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Tax bracket is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Total taxable income and Deductions beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tax bracket calculator work out?', 'a' => <<<'TXT'
            Standard, from Total taxable income, Var stat, Var year and Deductions. The relationship is Standard = stand(Total taxable income, Var stat, Var year, Deductions).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Total taxable income ($), Deductions ($). Enter total taxable income and deductions; Standard is the box to leave alone unless it is the value you came for.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Standard is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: Standard is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Standard keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/amortization', 'name' => 'Amortization Calculator'],
            ['path' => '/finance/annual-income', 'name' => 'Annual income Calculator'],
            ['path' => '/finance/annual-pay', 'name' => 'Annual pay Calculator'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * FICA tax
 * /finance/fica-tax
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'FICA tax',
    'meta' => ['title' => 'FICA tax Calculator: Formula, Steps & Examples', 'description' => 'FICA tax turns employment type and tax year into social security and medicare. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'FICA tax Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Type',
                            'label' => 'Employment type',
                            'type' => 'select',
                            'options' => ['Employee/Employer' => '1', 'Self-employed' => '2'],
                            'dataset' => 'DATA_Type',
                            'default' => 'Employee/Employer',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Year',
                            'label' => 'Tax year',
                            'type' => 'select',
                            'options' => [
                                '2022' => '2022',
                                '2023' => '2023',
                                '2024' => '2024',
                                '2025' => '2025',
                                '2026' => '2026',
                            ],
                            'dataset' => 'DATA_Year',
                            'control' => 'DROPDOWN',
                            'default' => '2026',
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
                            'dataset' => 'DATA_Status',
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
                            'label' => 'Income',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'Or net earnings in case of self-employment.',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'social_security',
                            'label' => 'Social security',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'medicare',
                            'label' => 'Medicare',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'medicare_additional',
                            'label' => 'Medicare additional',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fica_tax',
                            'label' => 'Fica tax',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fica_dif',
                            'label' => 'Fica dif',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'null_val',
                            'label' => '',
                            'type' => 'presentation',
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
            'title' => 'social_security = get_social_security(Income, Stat, Year, Type, 0)',
            'results' => ['social_security' => 'get_social_security(Income, Stat, Year, Type, 0)'],
        ],
        [
            'title' => 'medicare = get_medicare(Income, Stat, Year, Type, 1)',
            'results' => ['medicare' => 'get_medicare(Income, Stat, Year, Type, 1)'],
        ],
        [
            'title' => 'medicare_additional = get_medicare_additional(Income, Stat, Year, Type, 2)',
            'results' => ['medicare_additional' => 'get_medicare_additional(Income, Stat, Year, Type, 2)'],
        ],
        [
            'title' => 'fica_tax = get_fica_tax(Income, Stat, Year, Type, 3)',
            'results' => ['fica_tax' => 'get_fica_tax(Income, Stat, Year, Type, 3)'],
        ],
        [
            'title' => 'fica_dif = one_way(fica_tax - medicare_additional)',
            'results' => ['fica_dif' => '(get_fica_tax(Income, Stat, Year, Type, 3) - get_medicare_additional(Income, Stat, Year, Type, 2))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_social_security",function(Income,VarStat,VarYear,VarType,index){var soc_sec=fica_results(Income,VarStat,VarYear,VarType)[index];return soc_sec});omni.define("get_medicare",function(Income,VarStat,VarYear,VarType,index){var medicare=fica_results(Income,VarStat,VarYear,VarType)[index];return medicare});omni.define("get_medicare_additional",function(Income,VarStat,VarYear,VarType,index){var medicare_additional=fica_results(Income,VarStat,VarYear,VarType)[index];return medicare_additional});omni.define("get_fica_tax",function(Income,VarStat,VarYear,VarType,index){var fica_tax=fica_results(Income,VarStat,VarYear,VarType)[index];return fica_tax});function fica_results(Income,VarStat,VarYear,VarType){var IncomeGross=Income;var SocRate=0;if(VarType===1){SocRate=0.062}else{SocRate=0.124}var SocSec=IncomeGross*SocRate;if(IncomeGross>142800&&VarYear===2021){SocSec=142800*SocRate}if(IncomeGross>147000&&VarYear===2022){SocSec=147000*SocRate}if(IncomeGross>160200&&VarYear===2023){SocSec=160200*SocRate}if(IncomeGross>168600&&VarYear===2024){SocSec=168600*SocRate}if(IncomeGross>176100&&VarYear===2025){SocSec=176100*SocRate}if(IncomeGross>184500&&VarYear===2026){SocSec=184500*SocRate}var MedCare=0;var MedCareAdd=0;var MedLimit=200000;if(VarStat===2){MedLimit=250000}else if(VarStat===3){MedLimit=125000}if(VarType===1){MedCare=IncomeGross*0.0145}else{MedCare=IncomeGross*0.029}if(IncomeGross>MedLimit){MedCareAdd=(IncomeGross-MedLimit)*0.009}var Fica=SocSec+MedCare+MedCareAdd;var results=[SocSec,MedCare,MedCareAdd,Fica];return results}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        FICA tax takes Employment type, Tax year and Filing status and returns Social security and Medicare. The arithmetic is the whole method: social security is worked out from employment type by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the FICA tax calculator works', 'html' => <<<'TXT'
            <p>FICA tax answers one question from 4 numbers, and the answer is Social security, Medicare and Medicare additional.</p><p>Written with the labels from the form, Social security = get_social_security(Income, Filing status, Tax year, Employment type, 0).</p><p>The result panel carries Social security, Medicare, Medicare additional and Fica tax, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Employment type</strong> — a plain number, no unit</li><li><strong>Tax year</strong> — a plain number, no unit</li><li><strong>Filing status</strong> — a plain number, no unit</li><li><strong>Income</strong> — a plain number, no unit. Or net earnings in case of self-employment.</li></ul><p>The result boxes are Social security, Medicare, Medicare additional, Fica tax, Fica dif; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Social security takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Social security</strong> = <code>get_social_security(Income, Filing status, Tax year, Employment type, 0)</code></li><li><strong>Medicare</strong> = <code>get_medicare(Income, Filing status, Tax year, Employment type, 1)</code></li><li><strong>Medicare additional</strong> = <code>get_medicare_additional(Income, Filing status, Tax year, Employment type, 2)</code></li><li><strong>Fica tax</strong> = <code>get_fica_tax(Income, Filing status, Tax year, Employment type, 3)</code></li><li><strong>Fica dif</strong> = <code>(get_fica_tax(Income, Filing status, Tax year, Employment type, 3) − get_medicare_additional(Income, Filing status, Tax year, Employment type, 2))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Social security</strong> = <code>get_social_security(Income, Filing status, Tax year, Employment type, 0)</code> — the form to use when Income, Filing status, Tax year and Employment type are the values you have.</li><li><strong>Medicare</strong> = <code>get_medicare(Income, Filing status, Tax year, Employment type, 1)</code> — the form to use when Income, Filing status, Tax year and Employment type are the values you have.</li><li><strong>Medicare additional</strong> = <code>get_medicare_additional(Income, Filing status, Tax year, Employment type, 2)</code> — the form to use when Income, Filing status, Tax year and Employment type are the values you have.</li><li><strong>Fica tax</strong> = <code>get_fica_tax(Income, Filing status, Tax year, Employment type, 3)</code> — the form to use when Income, Filing status, Tax year and Employment type are the values you have.</li><li><strong>Fica dif</strong> = <code>(get_fica_tax(Income, Filing status, Tax year, Employment type, 3) − get_medicare_additional(Income, Filing status, Tax year, Employment type, 2))</code> — the form to use when Income, Filing status, Tax year and Employment type are the values you have.</li></ul><p>Any one of Social security, Medicare and Medicare additional can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Social security, Medicare and Medicare additional are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Employment type left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Employment type is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Tax year left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Tax year is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Filing status left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Filing status is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Employment type to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the FICA tax form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Employment type</strong> takes a plain number with no unit attached. It feeds Social security, Medicare and Medicare additional. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Employment type is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Tax year</strong> takes a plain number with no unit attached. It feeds Social security, Medicare and Medicare additional. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Tax year is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Filing status</strong> takes a plain number with no unit attached. It feeds Social security, Medicare and Medicare additional. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Filing status is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Income</strong> takes a plain number with no unit attached. Or net earnings in case of self-employment. It feeds Social security, Medicare and Medicare additional. Fill it from a measurement rather than a memory — Income is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Social security</strong> is a plain number. It is computed from Income, Filing status, Tax year and Employment type, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Medicare</strong> is a plain number. It is computed from Income, Filing status, Tax year and Employment type, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Medicare additional</strong> is a plain number. It is computed from Income, Filing status, Tax year and Employment type, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Fica tax</strong> is a plain number. It is computed from Income, Filing status, Tax year and Employment type, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Fica dif</strong> is a plain number. It is computed from Income, Filing status, Tax year and Employment type, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Social security follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Employment type, Tax year and Filing status measured, Social security and Medicare wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/70-20-10-rule-money">70/20/10 rule money Calculator</a>, <a href="/finance/ar-days">A/R days Calculator</a> and <a href="/finance/absence-percentage">Absence percentage Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the FICA tax calculator work out?', 'a' => <<<'TXT'
            Social security, Medicare, Medicare additional and Fica tax, from Income, Filing status, Tax year and Employment type. The relationship is Social security = get_social_security(Income, Filing status, Tax year, Employment type, 0).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Employment type, Tax year, Filing status, Income. Enter employment type, tax year and filing status; Social security is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Social security, Medicare, Medicare additional and Fica tax blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Social security is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Employment type blank and the page solves for it, reporting Social security instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Social security at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/70-20-10-rule-money', 'name' => '70/20/10 rule money Calculator'],
            ['path' => '/finance/ar-days', 'name' => 'A/R days Calculator'],
            ['path' => '/finance/absence-percentage', 'name' => 'Absence percentage Calculator'],
        ],
        'authors' => [],
    ],
];

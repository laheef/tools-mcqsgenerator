<?php

/**
 * Sock size
 * /everyday-life/sock-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sock size',
    'meta' => ['title' => 'Sock size Calculator: Formula, Steps & Examples', 'description' => 'Sock size works out US shoe size (4-15.5) and US shoe size (5-15) from adult or child?, woman or man? and UK/AU shoe size (3-14.5). A worked example follows.', 'h1' => 'Sock size Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'adultOrChild',
                            'label' => 'Adult or child?',
                            'type' => 'select',
                            'options' => ['Adult' => '0', 'Child' => '1'],
                            'dataset' => 'ageDS',
                            'default' => 'Adult',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'manOrWoman',
                            'label' => 'Woman or man?',
                            'type' => 'select',
                            'options' => ['Woman' => '1', 'Man' => '0'],
                            'dataset' => 'sexDS',
                            'default' => 'Woman',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Shoe size',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usShoeSizeMale',
                            'label' => 'US shoe size (4-15.5)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usShoeSizeFemale',
                            'label' => 'US shoe size (5-15)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ukShoeSize',
                            'label' => 'UK/AU shoe size (3-14.5)',
                            'type' => 'number',
                            'help' => 'The UK and Australia use the same shoe size system.',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'euShoeSize',
                            'label' => 'EU shoe size (35-52)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Sock size',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'place' => [0, 0],
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'US sock size:&nbsp;'],
                                ['when' => '(manOrWoman == 1 and usShoeSizeFemale < 5) or (manOrWoman == 0 and usShoeSizeMale < 4)', 'text' => '&nbsp;'],
                                ['when' => '(manOrWoman == 1 and 5 <= usShoeSizeFemale < 10.5) or (manOrWoman == 0 and 4 <= usShoeSizeMale < 8)', 'text' => '9-11'],
                                ['when' => '(manOrWoman == 1 and 10.5 <= usShoeSizeFemale < 14) or (manOrWoman == 0 and 8 <= usShoeSizeMale < 13)', 'text' => '10-13'],
                                ['when' => '(manOrWoman == 1 and usShoeSizeFemale >= 14) or (manOrWoman == 0 and usShoeSizeMale >= 13)', 'text' => '+14'],
                            ],
                        ],
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'General sock size:&nbsp;'],
                                ['when' => 'genSockSize == -1', 'text' => '&nbsp;'],
                                ['when' => 'genSockSize == 0', 'text' => 'Small'],
                                ['when' => 'genSockSize == 1', 'text' => 'Medium'],
                                ['when' => 'genSockSize == 2', 'text' => 'Large'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Sock size by age',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'childAge',
                            'label' => 'Child\'s age',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0],
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'US sock size:&nbsp;'],
                                ['when' => '0 <= childAge < 0.5', 'text' => '0-4'],
                                ['when' => '0.5 <= childAge < 1', 'text' => '4-5.5'],
                                ['when' => '1 <= childAge < 2', 'text' => '5-6.5'],
                                ['when' => '2 <= childAge < 4', 'text' => '6-7.5'],
                                ['when' => '4 <= childAge < 7', 'text' => '7-8.5'],
                                ['when' => '7 <= childAge <= 10', 'text' => '8-9.5'],
                                ['when' => '10 < childAge <= 11', 'text' => '9-11'],
                            ],
                        ],
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'General sock size:&nbsp;'],
                                ['when' => '0 <= childAge < 0.25', 'text' => 'Newborn'],
                                ['when' => '0.25 <= childAge < 1', 'text' => 'Infant'],
                                ['when' => '1 <= childAge < 2', 'text' => 'Toddler'],
                                ['when' => '2 <= childAge < 3', 'text' => 'X-Small'],
                                ['when' => '3 <= childAge < 7', 'text' => 'Small'],
                                ['when' => '7 <= childAge <= 10', 'text' => 'Medium'],
                                ['when' => '10 < childAge <= 11', 'text' => 'Large'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Sock size by shoe size',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usChildShoeSize',
                            'label' => 'US (0-13)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ukChildShoeSize',
                            'label' => 'UK/AU (0-13)',
                            'type' => 'number',
                            'help' => 'The UK and Australia use the same shoe size system.',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'euChildShoeSize',
                            'label' => 'EU (15-32.5)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => '0 <= usChildShoeSize <= 1', 'text' => 'US sock size: 0-4 General sock size: Newborn'],
                                ['when' => '1 < usChildShoeSize <= 3', 'text' => 'US sock size: 4-5.5 General sock size: Infant'],
                                ['when' => '3 <  usChildShoeSize <= 6', 'text' => 'US sock size: 5-6.5 General sock size: Toddler'],
                                ['when' => '6 < usChildShoeSize <= 9', 'text' => 'US sock size: 6-7.5 General sock size: X-Small'],
                                ['when' => '9 < usChildShoeSize < 12', 'text' => 'US sock size: 7-8.5 General sock size: Small'],
                                ['when' => 'usChildShoeSize == 12', 'text' => 'US sock size: 7-8.5 General sock size: Medium'],
                                ['when' => '12 < usChildShoeSize <= 14', 'text' => 'US sock size: 8-9.5 General sock size: Medium'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usSockSizes',
                            'label' => 'US sock size',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'genSockSize',
                            'label' => 'General sock size',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usChildSockSize',
                            'label' => 'US sock size',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'childGenSockSizeByAge',
                            'label' => 'General sock size',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usGenChildSockSizeByShoe',
                            'label' => 'General sock size',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'usChildSockSizeByShoe',
                            'label' => 'US sock size',
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
            'title' => 'usSockSizes = getUsSockSize(manOrWoman, usShoeSizeMale, usShoeSizeFemale)',
            'results' => ['usSockSizes' => 'getUsSockSize(manOrWoman, usShoeSizeMale, usShoeSizeFemale)'],
        ],
        [
            'title' => 'usChildSockSize = getChildUsSockSize(childAge)',
            'results' => ['usChildSockSize' => 'getChildUsSockSize(childAge)'],
        ],
        [
            'title' => 'euShoeSize = 1.27 * (ukShoeSize + 23) + 2',
            'results' => ['ukShoeSize' => '(100/127)*euShoeSize - 3121/127', 'euShoeSize' => '(127/100)*ukShoeSize + 3121/100'],
        ],
        [
            'title' => 'usShoeSizeMale = ukShoeSize + 1',
            'results' => ['ukShoeSize' => 'usShoeSizeMale - 1', 'usShoeSizeMale' => 'ukShoeSize + 1'],
        ],
        [
            'title' => 'usShoeSizeFemale = ukShoeSize + 2',
            'results' => ['ukShoeSize' => 'usShoeSizeFemale - 2', 'usShoeSizeFemale' => 'ukShoeSize + 2'],
        ],
        [
            'title' => 'genSockSize = getGenSockSize(manOrWoman, usShoeSizeMale, usShoeSizeFemale)',
            'results' => ['genSockSize' => 'getGenSockSize(manOrWoman, usShoeSizeMale, usShoeSizeFemale)'],
        ],
        [
            'title' => 'usChildSockSizeByShoe = getChildUsSockSizeByShoe(usChildShoeSize)',
            'results' => ['usChildSockSizeByShoe' => 'getChildUsSockSizeByShoe(usChildShoeSize)'],
        ],
        [
            'title' => 'ukChildShoeSize = usChildShoeSize',
            'results' => ['usChildShoeSize' => 'ukChildShoeSize', 'ukChildShoeSize' => 'usChildShoeSize'],
        ],
        [
            'title' => 'euChildShoeSize = 1.27 * (ukChildShoeSize + 10) + 2',
            'results' => ['euChildShoeSize' => '(127/100)*ukChildShoeSize + 147/10', 'ukChildShoeSize' => '(100/127)*euChildShoeSize - 1470/127'],
        ],
        [
            'title' => 'childGenSockSizeByAge = getChildGenSockSizeByAge(childAge)',
            'results' => ['childGenSockSizeByAge' => 'getChildGenSockSizeByAge(childAge)'],
        ],
        [
            'title' => 'usGenChildSockSizeByShoe = getGenChildUsSockSizeByShoe(usChildShoeSize)',
            'results' => ['usGenChildSockSizeByShoe' => 'getGenChildUsSockSizeByShoe(usChildShoeSize)'],
        ],
        [
            'title' => 'euChildShoeSize = 1.27 * (usChildShoeSize + 10) + 2',
            'results' => ['euChildShoeSize' => '(127/100)*usChildShoeSize + 147/10', 'usChildShoeSize' => '(100/127)*euChildShoeSize - 1470/127'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("getUsSockSize",function(manOrWoman,usShoeSizeMale,usShoeSizeFemale){if(manOrWoman){switch(true){case usShoeSizeFemale<5:return 0;case usShoeSizeFemale<10.5:return 9;case usShoeSizeFemale<14:return 10;case usShoeSizeFemale>=14:return 14;default:return 0}}else{switch(true){case usShoeSizeMale<4:return 0;case usShoeSizeMale<8:return 9;case usShoeSizeMale<13:return 10;case usShoeSizeMale>=13:return 14;default:return 0}}});omni.define("getGenSockSize",function(manOrWoman,usShoeSizeMale,usShoeSizeFemale){if(manOrWoman){switch(true){case usShoeSizeFemale<5:return-1;case usShoeSizeFemale<10.5:return 0;case usShoeSizeFemale<14:return 1;case usShoeSizeFemale>=14:return 2;default:return-1}}else{switch(true){case usShoeSizeMale<4:return-1;case usShoeSizeMale<8:return 0;case usShoeSizeMale<13:return 1;case usShoeSizeMale>=13:return 2;default:return-1}}});omni.define("getChildUsSockSize",function(childAge){switch(true){case childAge<0.5:return 40;case childAge<1:return 4;case childAge<2:return 5;case childAge<4:return 6;case childAge<7:return 7;case childAge<=10:return 8;default:return 9}});omni.define("getChildUsSockSizeByShoe",function(usChildShoeSize){switch(true){case usChildShoeSize<=1:return 40;case usChildShoeSize<=3:return 4;case usChildShoeSize<=6:return 5;case usChildShoeSize<=9:return 6;case usChildShoeSize<=12:return 7;case usChildShoeSize>12:return 8;default:return 0}});omni.define("getGenChildUsSockSizeByShoe",function(usChildShoeSize){switch(true){case usChildShoeSize<=1:return 0;case usChildShoeSize<=3:return 1;case usChildShoeSize<=6:return 2;case usChildShoeSize<=9:return 3;case usChildShoeSize<12:return 4;case usChildShoeSize>=13:return 5;default:return 5}});omni.define("getChildGenSockSizeByAge",function(childAge){switch(true){case childAge<0.25:return 0;case childAge<1:return 1;case childAge<2:return 2;case childAge<3:return 3;case childAge<7:return 4;case childAge<=10:return 5;default:return 6}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => 'Supply the EU shoe size and the child\'s age and the Sock size calculator solves for <strong>US sock size (Hidden variables)</strong>.',
        'sections' => [
            ['title' => 'How does the Sock size calculator work?', 'html' => <<<'TXT'
            <p>The Sock size calculator takes the values in the form, applies the relationship described below and reports <strong>US sock size (Hidden variables)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (adult or child? and woman or man?); then you type in the EU shoe size (35-52) and the child's age.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as woman and man. </li><li>A plain number with no unit attached.</li><li>A measured quantity, entered by default in years. The unit chip switches it to any of the 27 supported units.</li><li>A plain number with no unit attached.</li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Adult or child?</strong></td><td>One of 2 options, such as adult and child.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Woman or man?</strong></td><td>One of 2 options, such as woman and man.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>US shoe size (4-15.5)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>US shoe size (5-15)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>UK/AU shoe size (3-14.5)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>EU shoe size (35-52)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Child's age</strong></td><td>A measured quantity, 27 units available.</td><td>years</td><td>You supply it</td></tr><tr><td><strong>US sock size (Hidden variables)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>General sock size (Hidden variables)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>US sock size (Hidden variables)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>General sock size (Hidden variables)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>General sock size (Hidden variables)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>US sock size (Hidden variables)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Sock size calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">US sock size</span><span class="formula-eq">=</span><span class="formula-rhs">(woman or man?, US shoe size (4-15.5), US shoe size (5-15))</span></div><div class="formula-row"><span class="formula-lhs">US sock size</span><span class="formula-eq">=</span><span class="formula-rhs">(child&#x27;s age)</span></div><div class="formula-row"><span class="formula-lhs">UK/AU shoe size (3-14.5)</span><span class="formula-eq">=</span><span class="formula-rhs">(100 ÷ 127) × EU shoe size (35-52) − 3121 ÷ 127</span></div><div class="formula-row"><span class="formula-lhs">UK/AU shoe size (3-14.5)</span><span class="formula-eq">=</span><span class="formula-rhs">US shoe size (4-15.5) − 1</span></div><div class="formula-row"><span class="formula-lhs">UK/AU shoe size (3-14.5)</span><span class="formula-eq">=</span><span class="formula-rhs">US shoe size (5-15) − 2</span></div><div class="formula-row"><span class="formula-lhs">General sock size</span><span class="formula-eq">=</span><span class="formula-rhs">(woman or man?, US shoe size (4-15.5), US shoe size (5-15))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in years</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Sock size calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 2 figures keep coming back — the EU shoe size and the child's age — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/english-learning">English learning time</a>, <a href="/everyday-life/eu-us-shoe-size">EU to US shoe size converter</a> and <a href="/everyday-life/eui">Energy use intensity</a>.</p>
            TXT],
            ['title' => 'How to interpret a sock-size conversion', 'html' => <<<'TXT'
            <p>This calculator maps shoe-size and category inputs to sock-size labels. Begin by selecting the correct adult or child pathway and the gender category requested by the form, then enter the shoe size in its stated regional system. Socks are commonly sold in ranges rather than the precise increments used on some shoe charts, so the result is best read as a size band to check on the package, not a guarantee that every sock in that band will fit the same way.</p>
            <p>Regional shoe labels differ, and sock manufacturers may print US, UK, EU or general small/medium/large ranges. Confirm which shoe-size system your input uses before converting. If the sock package lists a foot-length range, use that measurement as an independent check. Measure from heel to longest toe while standing, and compare both feet. Avoid entering a UK label in a field expecting US size merely because the number happens to look similar.</p>
            <p>Fit depends on more than length. Foot width, calf circumference, sock height, elastic tension, material and intended activity all matter. A hiking sock with cushioning occupies more space inside a shoe than a thin dress sock; compression garments have their own fit requirements and should be chosen according to their specific sizing guidance. The calculator does not assess compression, medical suitability or circulation. For a product with specialized claims, follow the manufacturer’s instructions and ask a clinician when appropriate.</p>
            <p>Children’s sizing can be especially difficult because shoe and sock ranges change as the child grows. Treat the conversion as a starting point and compare the package’s age or foot-length guidance. Age is not a substitute for measuring the foot, since children of the same age can wear different sizes. Check that the heel pocket sits in the right place and that the toe area is not stretched tight or bunching up inside the shoe.</p>
            <p>Materials also affect how a sock behaves after washing and repeated wear. Cotton, wool and synthetic blends stretch and recover differently, and a snug sock may loosen or shrink according to care instructions. If you are between package ranges, inspect the brand’s fit guide and return policy. A broader range may accommodate more variation, but the best choice depends on the shoe and activity as well as the nominal foot size.</p>
            <p>For comparison shopping, record the original shoe size and region, the selected adult/child and gender categories, the calculator’s output and the brand’s package range. If a product uses a different chart, compare from the original shoe size or measured foot length instead of converting one rounded sock label into another. The calculator helps translate size labels; trying the sock with the intended shoe and checking for comfortable, even fit is the practical final check.</p>
            TXT],
            ['title' => 'Check a sock in the shoe it will be worn with', 'html' => <<<'TXT'
            <p>Try the sock with the intended shoe, because a thicker knit can change how the shoe feels even when the sock label matches the foot. Look for a heel pocket that sits at the heel, a toe seam that does not press, and fabric that stays smooth rather than bunching. If the sock slips or leaves deep marks, the size or style may not be suitable.</p><p>Follow the package’s washing and drying instructions. Heat and repeated laundering can change stretch and dimensions, so a new sock and a well-worn one may not fit alike. This practical check is more informative than relying on a converted size alone.</p>
            TXT],
            ['title' => 'When the package uses a different size scale', 'html' => <<<'TXT'
            <p>Some packages list a shoe-size range, others use a generic small/medium/large label, and some show foot length. Match the package’s scale to the calculator’s output before choosing. If the package covers several shoe sizes, compare its range with the actual foot measurement and consider whether a snug or relaxed fit is intended for that sock style.</p><p>Compression or specialty socks may use additional measurements such as calf circumference or garment length. A shoe-size conversion alone is not enough for those products. Follow the maker’s sizing instructions and ask a qualified professional if the item is prescribed or used for a health-related purpose.</p>
            TXT],
            ['title' => 'Fit should be judged after wearing and washing', 'html' => <<<'TXT'
            <p>After trying a new pair, check whether the sock stays in place during normal movement without pulling tightly at the cuff or wrinkling under the toes. Follow care-label instructions and reassess after washing, since materials can change their stretch and shape. If the sock is uncomfortable, a different cut or fabric may help more than a neighboring size label.</p><p>For a gift, use the recipient’s current shoe size and the manufacturer’s package chart rather than guessing from age alone. The calculator can suggest a range, but it cannot observe how a particular sock fits.</p>
            TXT],
            ['title' => 'Use this result to choose what to try', 'html' => <<<'TXT'
            <p>If you are between package ranges, compare both on the foot and with the intended shoe, then keep the more comfortable option. The range is a guide for shopping, not a precise measurement of fabric tension.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sock size calculator work out?', 'a' => 'It returns US sock size (Hidden variables), derived from the EU shoe size and the child\'s age.'],
            ['q' => 'What do I need to enter to use the Sock size calculator?', 'a' => 'The form asks for the EU shoe size and the child\'s age, which is 5 fields in total.'],
            ['q' => 'Can I enter child\'s age in a different unit?', 'a' => 'Yes. Child\'s age opens in years and the chip beside it offers 27 units.'],
        ],
        'related' => [
            ['path' => '/everyday-life/english-learning', 'name' => 'English learning time'],
            ['path' => '/everyday-life/eu-us-shoe-size', 'name' => 'EU to US shoe size converter'],
            ['path' => '/everyday-life/eui', 'name' => 'Energy use intensity'],
        ],
    ],
];

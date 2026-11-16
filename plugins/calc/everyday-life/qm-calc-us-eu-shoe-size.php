<?php

/**
 * US to EU shoe size converter
 * /everyday-life/us-eu-shoe-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'US to EU shoe size converter',
    'meta' => ['title' => 'US to EU shoe size converter — Everyday Life', 'description' => 'US to EU shoe size converter works out US / CA (0.5-13.5) from adult or child?. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'US to EU shoe size converter Calculator', 'updated' => '2024-07-07'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'adult_child',
                            'label' => 'Adult or child?',
                            'type' => 'select',
                            'options' => ['Adult' => '0', 'Child' => '1'],
                            'dataset' => 'Adult_child',
                            'default' => 'Adult',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Input any size you know ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'us_child',
                            'label' => 'US / CA (0.5-13.5)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eu_child',
                            'label' => 'EU (15-32.5)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'us_male',
                            'label' => 'US / CA men (1-14)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'us_female',
                            'label' => 'US / CA / AU women (1-15)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eu',
                            'label' => 'EU (33.5-50)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
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
                            'name' => 'foot_length_mm',
                            'label' => 'Foot length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'mm',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'foot_length_inch',
                            'label' => 'Foot length in inches',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'inch',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'shoe_size.png'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Other shoe  sizes that may interest you',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'uk',
                            'label' => 'AU men / UK (0-15)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'uk_child',
                            'label' => 'UK / AU (0-13.5)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mx_jp',
                            'label' => 'MX / JP (19.5-32)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mx_jp_child',
                            'label' => 'MX / JP (9-20)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kor',
                            'label' => 'Korea (195-320)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kor_child',
                            'label' => 'Korea (90-200)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Conversion results ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'adult_child == 0 and foot_length_mm >= 0', 'text' => <<<'TXT'
                                Most shoe sizes are rounded to 0.5: US/CA/AU female shoe size: {{us_female_round.formattedValue}} US/CA male shoe size: {{us_male_round.formattedValue}} AU male/UK shoe size: {{uk_round.formattedValue}} EU shoe size: {{eu_round.formattedValue}} MX/JP shoe size: {{mx_jp_round.formattedValue}} Korean shoe size: {{kor.formattedValue}} Remember that sizes may vary between manufacturers and even shoe m
                                TXT],
                                ['when' => 'adult_child == 1 and foot_length_mm >= 0', 'text' => <<<'TXT'
                                Most shoe sizes are rounded to 0.5: US child shoe size: {{us_child_round.formattedValue}} UK child shoe size: {{uk_child_round.formattedValue}} EU child shoe size: {{eu_child_round.formattedValue}} MX/JP child shoe size: {{mx_jp_child_round.formattedValue}} Korean child shoe size: {{kor_child.formattedValue}} Remember that sizes may vary between manufacturers and even shoe models. Some systems inc
                                TXT],
                            ],
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
                            'name' => 'eu_round',
                            'label' => 'Eu round',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'uk_child_round',
                            'label' => 'Uk child round',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mx_jp_round',
                            'label' => 'Mx jp round',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mx_jp_child_round',
                            'label' => 'Mx jp child round',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'uk_round',
                            'label' => 'Uk round',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'us_child_round',
                            'label' => 'Us child round',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'us_female_round',
                            'label' => 'Us female round',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'us_male_round',
                            'label' => 'Us male round',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eu_child_round',
                            'label' => 'Eu child round',
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
            'title' => 'uk = (3*foot_length_mm) - 23',
            'results' => ['uk' => '3*foot_length_mm - 23', 'foot_length_mm' => '(1/3)*uk + 23/3'],
        ],
        [
            'title' => 'us_male= ((3*foot_length_mm) - 22)',
            'results' => ['us_male' => '3*foot_length_mm - 22', 'foot_length_mm' => '(1/3)*us_male + 22/3'],
        ],
        [
            'title' => 'us_female= (3*foot_length_mm) - 21',
            'results' => ['us_female' => '3*foot_length_mm - 21', 'foot_length_mm' => '(1/3)*us_female + 7'],
        ],
        [
            'title' => 'eu = 1.27 * (uk+23) +2',
            'results' => ['uk' => '(100/127)*eu - 3121/127', 'eu' => '(127/100)*uk + 3121/100'],
        ],
        [
            'title' => 'mx_jp = foot_length_inch*2.54',
            'results' => ['mx_jp' => '(127/50)*foot_length_inch', 'foot_length_inch' => '(50/127)*mx_jp'],
        ],
        [
            'title' => 'kor = foot_length_inch*25.4',
            'results' => ['kor' => '(127/5)*foot_length_inch', 'foot_length_inch' => '(5/127)*kor'],
        ],
        [
            'title' => 'uk_child = (3*foot_length_mm) - 10',
            'results' => ['uk_child' => '3*foot_length_mm - 10', 'foot_length_mm' => '(1/3)*uk_child + 10/3'],
        ],
        [
            'title' => 'us_child= (3*foot_length_mm) - 9 - (2/3)',
            'results' => ['foot_length_mm' => '(1/3)*us_child + 29/9', 'us_child' => '3*foot_length_mm - 29/3'],
        ],
        [
            'title' => 'eu_child = 1.27 * (uk_child+10) +2',
            'results' => ['uk_child' => '(100/127)*eu_child - 1470/127', 'eu_child' => '(127/100)*uk_child + 147/10'],
        ],
        [
            'title' => 'mx_jp_child = foot_length_inch*2.54',
            'results' => ['mx_jp_child' => '(127/50)*foot_length_inch', 'foot_length_inch' => '(50/127)*mx_jp_child'],
        ],
        [
            'title' => 'kor_child = foot_length_inch*25.4',
            'results' => ['kor_child' => '(127/5)*foot_length_inch', 'foot_length_inch' => '(5/127)*kor_child'],
        ],
        [
            'title' => 'foot_length_inch = foot_length_mm',
            'results' => ['foot_length_inch' => 'foot_length_mm', 'foot_length_mm' => 'foot_length_inch'],
        ],
        [
            'title' => 'uk_round = round_to_half(uk)',
            'results' => ['uk_round' => 'round_to_half(uk)'],
        ],
        [
            'title' => 'us_male_round = round_to_half(us_male)',
            'results' => ['us_male_round' => 'round_to_half(us_male)'],
        ],
        [
            'title' => 'us_female_round = round_to_half(us_female) ',
            'results' => ['us_female_round' => 'round_to_half(us_female)'],
        ],
        [
            'title' => 'eu_round = round_to_half(eu)',
            'results' => ['eu_round' => 'round_to_half(eu)'],
        ],
        [
            'title' => 'mx_jp_round = round_to_half(mx_jp)',
            'results' => ['mx_jp_round' => 'round_to_half(mx_jp)'],
        ],
        [
            'title' => 'uk_child_round = round_to_half(uk_child)',
            'results' => ['uk_child_round' => 'round_to_half(uk_child)'],
        ],
        [
            'title' => 'us_child_round = round_to_half(us_child)',
            'results' => ['us_child_round' => 'round_to_half(us_child)'],
        ],
        [
            'title' => 'eu_child_round = round_to_half(eu_child)',
            'results' => ['eu_child_round' => 'round_to_half(eu_child)'],
        ],
        [
            'title' => 'mx_jp_child_round = round_to_half(mx_jp_child)',
            'results' => ['mx_jp_child_round' => 'round_to_half(mx_jp_child)'],
        ],
    ],
    'js' => '"use strict";omni.define("round_to_half",function(value){return Math.round(2*value)/2});//# sourceURL=customJs.js',
    'article' => [
        'intro' => 'The US to EU shoe size converter takes the numbers you enter and reports <strong>AU men / UK (0-15)</strong> immediately.',
        'sections' => [
            ['title' => 'How does the US to EU shoe size converter calculator work?', 'html' => <<<'TXT'
            <p>The US to EU shoe size converter takes the values in the form, applies the relationship described below and reports <strong>AU men / UK (0-15)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (adult or child?); then you type in the figures it asks for.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Adult or child?</strong></td><td>One of 2 options, such as adult and child.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>US / CA men (1-14)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>US / CA / AU women (1-15)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Foot length</strong></td><td>A measured quantity, 34 units available.</td><td>millimeters</td><td>Calculated</td></tr><tr><td><strong>Foot length in inches</strong></td><td>A measured quantity, 34 units available.</td><td>inches</td><td>Calculated</td></tr><tr><td><strong>AU men / UK (0-15)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Korea (195-320)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Korea (90-200)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Eu round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Uk child round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Mx jp round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Mx jp child round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Uk round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Us child round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Us female round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Us male round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Eu child round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the US to EU shoe size converter calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">AU men / UK (0-15)</span><span class="formula-eq">=</span><span class="formula-rhs">3 × foot length − 23</span></div><div class="formula-row"><span class="formula-lhs">US / CA men (1-14)</span><span class="formula-eq">=</span><span class="formula-rhs">3 × foot length − 22</span></div><div class="formula-row"><span class="formula-lhs">US / CA / AU women (1-15)</span><span class="formula-eq">=</span><span class="formula-rhs">3 × foot length − 21</span></div><div class="formula-row"><span class="formula-lhs">AU men / UK (0-15)</span><span class="formula-eq">=</span><span class="formula-rhs">(100 ÷ 127) × EU (33.5-50) − 3121 ÷ 127</span></div><div class="formula-row"><span class="formula-lhs">MX / JP (19.5-32)</span><span class="formula-eq">=</span><span class="formula-rhs">(127 ÷ 50) × foot length in inches</span></div><div class="formula-row"><span class="formula-lhs">Korea (195-320)</span><span class="formula-eq">=</span><span class="formula-rhs">(127 ÷ 5) × foot length in inches</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Take <strong>Adult or child?</strong> set to Adult and <strong>Foot length</strong> = 30 mm. The calculator returns <strong>US / CA (0.5-13.5)</strong> = -8.77, <strong>EU (15-32.5)</strong> = 3.14, <strong>US / CA men (1-14)</strong> = -21.1 and <strong>US / CA / AU women (1-15)</strong> = -20.1.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>US / CA (0.5-13.5)</strong> = -8.77, <strong>EU (15-32.5)</strong> = 3.14, <strong>US / CA men (1-14)</strong> = -21.1 and <strong>US / CA / AU women (1-15)</strong> = -20.1 should be roughly the size you expected from <strong>Adult or child?</strong> set to Adult and <strong>Foot length</strong> = 30 mm.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in millimeters, and convertible to any of the 34 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in inches, and convertible to any of the 34 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in millimeters</li><li>Length, opening in inches</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The US to EU shoe size converter earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/how-many-days-have-i-been-alive">How many days have I been alive</a>, <a href="/everyday-life/how-many-tables">How many tables</a> and <a href="/everyday-life/how-old-was-i">How old was I</a>.</p>
            TXT],
            ['title' => 'Converting a US label to an EU chart', 'html' => <<<'TXT'
            <p>Start by identifying whether the US label is men’s, women’s or children’s sizing. The calculator’s adult/child selection and separate outputs exist because these categories do not share one universal sequence. Enter the US size in the matching field and read the EU equivalent for that category. If the label came from a shoe box, retain the category printed next to the number; do not infer it from the wearer’s age or the shoe’s color or style.</p>
            <p>An EU size is a helpful common reference, but it does not guarantee identical fit across manufacturers. Brands use different lasts, toe shapes and internal volumes, and some publish proprietary size charts. When a particular brand offers foot-length guidance, compare your measurement against that guide before ordering. Measure both feet while standing, heel to the longest toe, and use the longer foot as the starting point. Confirm whether the chart refers to foot length or an insole measurement.</p>
            <p>Children’s sizes need special care because regional charts can diverge and feet can change over time. Choose the child-size option when converting a child’s printed size, and recheck fit regularly. A size conversion is not a growth prediction. If the shoe is for running, school or another activity, check that the heel is secure and there is enough comfortable toe room; extra length alone is not a substitute for a suitable shape.</p>
            <p>Fit is three-dimensional. Width, instep height, socks, foot swelling during the day and the shoe’s materials all affect comfort. The converter translates labels, not these physical characteristics. If the converted EU number seems inconsistent with a pair that fits, compare the brand, category and length chart rather than assuming the calculation alone explains the difference. One brand’s EU 40 may not feel the same as another brand’s EU 40.</p>
            <p>For online purchases, verify the seller’s return conditions and try the shoes indoors first. If choosing between neighboring sizes, compare half-size availability and width options. Rounding to the next whole EU number can obscure a close result, while the best fit may come from a different model rather than a different size. Use reviews as supporting context, but remember that comments about “running small” are subjective and may refer to width or shape.</p>
            <p>Keep the US size, its category, the converter selection, the EU output and any foot-length measurement together in your notes. If a second retailer uses a different chart, convert from the original US label or measured foot length again; do not repeatedly convert rounded labels. This makes the comparison easier to explain and reduces avoidable rounding confusion. A size conversion helps you select what to try, while comfort and secure fit determine what to keep.</p>
            TXT],
            ['title' => 'Avoid mixing different regional charts', 'html' => <<<'TXT'
            <p>A common conversion mistake is to compare a US number from one category with an EU number from another. Before entering a size, check the label’s category and whether it is adult or child sizing. The calculator’s output labels help distinguish the available choices, but the shoe box or seller chart remains the best evidence for what the input means.</p><p>If a brand gives a length-based chart, use the measured foot as a second reference rather than trying to reverse-engineer a size with a fixed arithmetic offset. Regional size systems are not all simple one-to-one formulas, and chart rounding can differ. Keep the original US label and the measurement together so you can explain the comparison if the retailer recommends a different size.</p>
            TXT],
            ['title' => 'Use the result to narrow, then verify', 'html' => <<<'TXT'
            <p>The converted EU number should help you find a likely range, not replace a fit check. If the retailer’s chart gives a foot-length interval, compare your measurement with it and make sure its units and category match. A label on a shoe that fits well is a useful cross-check, but internal shape varies: toe room, width and heel hold can differ even within a single brand.</p><p>For online shopping, try the pair on a clean indoor surface and keep the tags attached until you decide. Check both feet and the socks you plan to wear. If the shoe is for a child or a specialized activity, use the seller’s current fit guidance and return terms; the conversion cannot account for growth, sport-specific fit or safety requirements.</p>
            TXT],
            ['title' => 'Keep the original size visible', 'html' => <<<'TXT'
            <p>When comparing listings, write down the original US label and its category beside the EU result. If two retailers disagree, check each seller’s chart using that same input before deciding which product to try. That makes it clear whether the difference comes from a category mismatch, a brand-specific chart or the conversion itself.</p><p>Do not let a conversion hide a known fit issue. If the current shoe pinches at the toes or slips at the heel, consider width and shape as well as size.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the US to EU shoe size converter calculator?', 'a' => 'The form asks for a few values, which is 2 fields in total.'],
            ['q' => 'Can I enter foot length in a different unit?', 'a' => 'Yes. Foot length opens in millimeters and the chip beside it offers 34 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports US / CA (0.5-13.5) = -8.77.'],
        ],
        'related' => [
            ['path' => '/everyday-life/how-many-days-have-i-been-alive', 'name' => 'How many days have I been alive'],
            ['path' => '/everyday-life/how-many-tables', 'name' => 'How many tables'],
            ['path' => '/everyday-life/how-old-was-i', 'name' => 'How old was I'],
        ],
    ],
];

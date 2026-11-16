<?php

/**
 * Shoe size conversion
 * /everyday-life/shoe-size-conversion
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Shoe size conversion',
    'meta' => ['title' => 'Shoe size conversion: Formula, Steps & Results', 'description' => 'Shoe size conversion takes adult or child? and foot length in millimeters and returns US / CA (0.5-13.5) and UK / AU (0-13.5). A worked example follows.', 'h1' => 'Shoe size conversion Calculator', 'updated' => '2026-08-29'],
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
                            'name' => 'uk_child',
                            'label' => 'UK / AU (0-13.5)',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
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
                            'rounding' => ['standard', '1'],
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
                            'name' => 'kor_child',
                            'label' => 'Korea (90-200)',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
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
                            'name' => 'eu',
                            'label' => 'EU (33.5-50)',
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
                            'name' => 'kor',
                            'label' => 'Korea (195-320)',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
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
                            'label' => 'Foot length in millimeters',
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
                        ['type' => 'image', 'url' => 'https://uploads-cdn.omnicalculator.com/images/shoe_size.png'],
                    ],
                ],
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
                            'name' => 'uk_round',
                            'label' => 'Uk round',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
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
                            'name' => 'eu_child_round',
                            'label' => 'Eu child round',
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
                            'name' => 'us_male_round',
                            'label' => 'Us male round',
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
            'results' => ['foot_length_mm' => '(1/3)*us_female + 7', 'us_female' => '3*foot_length_mm - 21'],
        ],
        [
            'title' => 'eu = 1.27 * (uk+23) +2',
            'results' => ['eu' => '(127/100)*uk + 3121/100', 'uk' => '(100/127)*eu - 3121/127'],
        ],
        [
            'title' => 'mx_jp = foot_length_inch*2.54',
            'results' => ['foot_length_inch' => '(50/127)*mx_jp', 'mx_jp' => '(127/50)*foot_length_inch'],
        ],
        [
            'title' => 'kor = foot_length_inch*25.4',
            'results' => ['foot_length_inch' => '(5/127)*kor', 'kor' => '(127/5)*foot_length_inch'],
        ],
        [
            'title' => 'uk_child = (3*foot_length_mm) - 10',
            'results' => ['foot_length_mm' => '(1/3)*uk_child + 10/3', 'uk_child' => '3*foot_length_mm - 10'],
        ],
        [
            'title' => 'us_child= (3*foot_length_mm) - 9 - (2/3)',
            'results' => ['us_child' => '3*foot_length_mm - 29/3', 'foot_length_mm' => '(1/3)*us_child + 29/9'],
        ],
        [
            'title' => 'eu_child = 1.27 * (uk_child+10) +2',
            'results' => ['eu_child' => '(127/100)*uk_child + 147/10', 'uk_child' => '(100/127)*eu_child - 1470/127'],
        ],
        [
            'title' => 'mx_jp_child = foot_length_inch*2.54',
            'results' => ['mx_jp_child' => '(127/50)*foot_length_inch', 'foot_length_inch' => '(50/127)*mx_jp_child'],
        ],
        [
            'title' => 'kor_child = foot_length_inch*25.4',
            'results' => ['foot_length_inch' => '(5/127)*kor_child', 'kor_child' => '(127/5)*foot_length_inch'],
        ],
        [
            'title' => 'foot_length_inch =foot_length_mm',
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
        'intro' => 'The Shoe size conversion calculator returns <strong>AU men / UK (0-15)</strong> from the 3 fields on the form.',
        'sections' => [
            ['title' => 'How does the Shoe size conversion calculator work?', 'html' => <<<'TXT'
            <p>The Shoe size conversion calculator takes the values in the form, applies the relationship described below and reports <strong>AU men / UK (0-15)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (adult or child?); then you type in the US / CA / AU women (1-15).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Adult or child?</strong></td><td>One of 2 options, such as adult and child.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Korea (90-200)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>US / CA / AU women (1-15)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>US / CA men (1-14)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>AU men / UK (0-15)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Korea (195-320)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Foot length in millimeters</strong></td><td>A measured quantity, 34 units available.</td><td>millimeters</td><td>Calculated</td></tr><tr><td><strong>Foot length in inches</strong></td><td>A measured quantity, 34 units available.</td><td>inches</td><td>Calculated</td></tr><tr><td><strong>Uk round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Us female round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Eu round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Mx jp round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Eu child round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Mx jp child round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Uk child round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Us child round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Us male round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Shoe size conversion calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">AU men / UK (0-15)</span><span class="formula-eq">=</span><span class="formula-rhs">3 × foot length in millimeters − 23</span></div><div class="formula-row"><span class="formula-lhs">US / CA men (1-14)</span><span class="formula-eq">=</span><span class="formula-rhs">3 × foot length in millimeters − 22</span></div><div class="formula-row"><span class="formula-lhs">Foot length in millimeters</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 3) × US ÷ CA ÷ AU women (1-15) + 7</span></div><div class="formula-row"><span class="formula-lhs">EU (33.5-50)</span><span class="formula-eq">=</span><span class="formula-rhs">(127 ÷ 100) × AU men ÷ UK (0-15) + 3121 ÷ 100</span></div><div class="formula-row"><span class="formula-lhs">Foot length in inches</span><span class="formula-eq">=</span><span class="formula-rhs">(50 ÷ 127) × MX ÷ JP (19.5-32)</span></div><div class="formula-row"><span class="formula-lhs">Foot length in inches</span><span class="formula-eq">=</span><span class="formula-rhs">(5 ÷ 127) × korea (195-320)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>Adult or child?</strong> set to Adult and <strong>Foot length in millimeters</strong> = 30 mm. Working through the relationship above gives <strong>US / CA (0.5-13.5)</strong> = -8.77, <strong>UK / AU (0-13.5)</strong> = -9, <strong>EU (15-32.5)</strong> = 3 and <strong>MX / JP (9-20)</strong> = 0.76.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>US / CA (0.5-13.5)</strong> = -8.77, <strong>UK / AU (0-13.5)</strong> = -9, <strong>EU (15-32.5)</strong> = 3 and <strong>MX / JP (9-20)</strong> = 0.76 should be roughly the size you expected from <strong>Adult or child?</strong> set to Adult and <strong>Foot length in millimeters</strong> = 30 mm.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in millimeters, and convertible to any of the 34 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in inches, and convertible to any of the 34 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in millimeters</li><li>Length, opening in inches</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Shoe size conversion calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 1 figures keep coming back — the US / CA / AU women — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/drake-equation-for-love">Drake equation for love</a>, <a href="/everyday-life/dress-size">Dress size</a> and <a href="/everyday-life/drive-time">Drive time</a>.</p>
            TXT],
            ['title' => 'How to use a shoe-size conversion as a starting point', 'html' => <<<'TXT'
            <p>First identify which size system and category you have. This calculator’s form includes an adult-or-child choice and a US / Canada / Australia women’s size input, and reports an equivalent for the selected convention. Shoe labels can vary by country, manufacturer and product line, so the result is a chart-based conversion rather than a promise that two shoes with the same printed number will fit identically.</p>
            <p>If you are choosing a size for a new pair, measure both feet while standing, wearing the socks you expect to use. Measure heel to the longest toe and use the longer foot as the practical starting point. Foot length and width both affect comfort; a length-only conversion cannot tell whether a shoe’s toe box, instep or overall width is suitable. Try shoes later in the day if your feet tend to swell, and check that toes can move naturally when standing.</p>
            <p>Do not confuse a size conversion with a direct change in foot length. Many regional systems use different starting points, increments and grading rules. Some brand charts map a stated foot length to a size, while others publish only nominal sizes. If a brand provides a specific fit guide, prioritize that guide over a generic conversion, especially for children’s footwear, athletic shoes, boots or specialty products.</p>
            <p>Use the adult/child selector that matches the original size chart, not simply the age of the person trying the shoe. Children’s sizing may use a separate scale and may include different conventions for growth allowance. Avoid buying a shoe several sizes larger solely to allow for growth; an unstable fit can be uncomfortable and unsuitable for activity. For children, check fit regularly because foot size can change quickly.</p>
            <p>When two converted sizes are close, compare the manufacturer’s measurements and return policy before ordering. Read reviews for fit notes only as supporting information: comments like “runs small” are subjective and may refer to width or toe shape rather than length. If possible, try both sizes on both feet and walk on a safe surface. A size label narrows the options, but comfort and secure heel hold are the deciding checks.</p>
            <p>For a more useful comparison, save the original size, the category selected, the converted size and the brand chart used. If you compare shoes from different systems, convert each original size independently rather than converting a rounded result again. That avoids compounding rounding differences and makes it easier to explain a mismatch to a retailer.</p>
            TXT],
            ['title' => 'Interpreting a borderline size', 'html' => <<<'TXT'
            <p>If a result lands between commonly sold sizes, check whether the product comes in half sizes and whether the brand publishes a foot-length chart. Do not assume that rounding up always solves the issue: length, width and heel shape contribute separately to fit. A shoe that is too long may slip, while a shoe that is too short can press the toes. Try it with the intended socks and the activity you plan to do.</p><p>For online purchases, confirm the return window and whether worn-once indoor testing is allowed. Retaining the box and labels makes it easier to compare sizes without confusing the pairs.</p>
            TXT],
            ['title' => 'Keep activity and fit in view', 'html' => <<<'TXT'
            <p>The best fit can differ by intended activity. Running, hiking and work footwear may require different toe room, support or sock thickness from a casual shoe. A conversion gives a size to investigate; it cannot judge whether the last shape suits your foot or whether a particular construction will flex comfortably. Check that the heel stays in place and that there is no pinching along the sides after walking for several minutes.</p><p>For foot-length measurements, stand with the heel against a straight edge and mark the longest toe, then compare that measurement with the brand’s own sizing table. Repeat for each foot and use the longer measurement as a starting point. Record units carefully, since centimeters and millimeters differ by a factor of ten.</p>
            TXT],
            ['title' => 'For a more confident online order', 'html' => <<<'TXT'
            <p>When a retailer lists a foot-length range, compare the measured longer foot with that range and note whether the chart already includes wearing ease. Do not add an allowance a second time without guidance. Product descriptions may also distinguish narrow, regular and wide fits; that option can matter more than a small difference in the converted number.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Shoe size conversion calculator work out?', 'a' => 'It returns AU men / UK (0-15), derived from the US / CA / AU women.'],
            ['q' => 'What do I need to enter to use the Shoe size conversion calculator?', 'a' => 'The form asks for the US / CA / AU women, which is 3 fields in total.'],
            ['q' => 'Can I enter foot length in millimeters in a different unit?', 'a' => 'Yes. Foot length in millimeters opens in millimeters and the chip beside it offers 34 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports US / CA (0.5-13.5) = -8.77.'],
        ],
        'related' => [
            ['path' => '/everyday-life/drake-equation-for-love', 'name' => 'Drake equation for love'],
            ['path' => '/everyday-life/dress-size', 'name' => 'Dress size'],
            ['path' => '/everyday-life/drive-time', 'name' => 'Drive time'],
        ],
    ],
];

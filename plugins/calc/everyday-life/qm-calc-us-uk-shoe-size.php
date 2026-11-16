<?php

/**
 * US to UK shoe size converter
 * /everyday-life/us-uk-shoe-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'US to UK shoe size converter',
    'meta' => ['title' => 'US to UK shoe size converter — Everyday Life', 'description' => <<<'TXT'
    US to UK shoe size converter reports US / CA men (1-14), US / CA / AU women (1-15), AU men / UK (0-15) and US / CA (0.5-13.5). The answer is shown in inch.
    TXT, 'h1' => 'US to UK shoe size converter Calculator', 'updated' => '2025-12-29'],
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
            'title' => 'Other shoe sizes',
            'note' => '',
            'blocks' => [
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
            'results' => ['eu' => '(127/100)*uk + 3121/100', 'uk' => '(100/127)*eu - 3121/127'],
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
            'results' => ['us_child' => '3*foot_length_mm - 29/3', 'foot_length_mm' => '(1/3)*us_child + 29/9'],
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
        'intro' => 'The US to UK shoe size converter returns <strong>AU men / UK (0-15)</strong> from the 2 fields on the form.',
        'sections' => [
            ['title' => 'How does the US to UK shoe size converter calculator work?', 'html' => <<<'TXT'
            <p>The US to UK shoe size converter takes the values in the form, applies the relationship described below and reports <strong>AU men / UK (0-15)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (adult or child?); then you type in the foot length.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => '<ul><li>A measured quantity, entered by default in millimeters. </li></ul><p>One field on this form is a choice rather than a number. </p>'],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Adult or child?</strong></td><td>One of 2 options, such as adult and child.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>US / CA men (1-14)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>US / CA / AU women (1-15)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>AU men / UK (0-15)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Foot length</strong></td><td>A measured quantity, 34 units available.</td><td>millimeters</td><td>You supply it</td></tr><tr><td><strong>Foot length in inches</strong></td><td>A measured quantity, 34 units available.</td><td>inches</td><td>Calculated</td></tr><tr><td><strong>Korea (195-320)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Korea (90-200)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Eu child round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Eu round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Uk round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Mx jp round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Us child round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Uk child round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Mx jp child round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Us female round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Us male round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the US to UK shoe size converter calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">AU men / UK (0-15)</span><span class="formula-eq">=</span><span class="formula-rhs">3 × foot length − 23</span></div><div class="formula-row"><span class="formula-lhs">US / CA men (1-14)</span><span class="formula-eq">=</span><span class="formula-rhs">3 × foot length − 22</span></div><div class="formula-row"><span class="formula-lhs">US / CA / AU women (1-15)</span><span class="formula-eq">=</span><span class="formula-rhs">3 × foot length − 21</span></div><div class="formula-row"><span class="formula-lhs">EU (33.5-50)</span><span class="formula-eq">=</span><span class="formula-rhs">(127 ÷ 100) × AU men ÷ UK (0-15) + 3121 ÷ 100</span></div><div class="formula-row"><span class="formula-lhs">MX / JP (19.5-32)</span><span class="formula-eq">=</span><span class="formula-rhs">(127 ÷ 50) × foot length in inches</span></div><div class="formula-row"><span class="formula-lhs">Korea (195-320)</span><span class="formula-eq">=</span><span class="formula-rhs">(127 ÷ 5) × foot length in inches</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Take <strong>Adult or child?</strong> set to Adult and <strong>Foot length</strong> = 30 mm. The calculator returns <strong>US / CA men (1-14)</strong> = -21.1, <strong>US / CA / AU women (1-15)</strong> = -20.1, <strong>AU men / UK (0-15)</strong> = -22.1 and <strong>US / CA (0.5-13.5)</strong> = -8.77.</p><p>Read it as a template. Every number above can be replaced with one of yours; only the relationship between them is fixed.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>US / CA men (1-14)</strong> = -21.1, <strong>US / CA / AU women (1-15)</strong> = -20.1, <strong>AU men / UK (0-15)</strong> = -22.1 and <strong>US / CA (0.5-13.5)</strong> = -8.77 should be roughly the size you expected from <strong>Adult or child?</strong> set to Adult and <strong>Foot length</strong> = 30 mm.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in inches, and convertible to any of the 34 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in millimeters</li><li>Length, opening in inches</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The US to UK shoe size converter earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 1 figures keep coming back — the foot length — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/how-many-tables">How many tables</a>, <a href="/everyday-life/how-old-was-i">How old was I</a> and <a href="/everyday-life/idling-fuel-consumption">Idling fuel consumption</a>.</p>
            TXT],
            ['title' => 'Using a US-to-UK size conversion carefully', 'html' => <<<'TXT'
            <p>This converter is most useful when you know the size printed on a US shoe and want a UK-chart equivalent to investigate. Select the adult or child category that matches the size scale you are converting; do not choose solely by the wearer’s age. Children’s size ranges are their own chart, and they do not reliably continue into adult sizes by simply adding or subtracting a fixed number. The calculator also includes other regional outputs, but a converted label is still a chart estimate rather than a promise that every brand uses the same grading.</p>
            <p>Start with the label on a shoe that fits well, and record whether it is a men’s, women’s or children’s size. A number without its category is ambiguous. If you only know the measured foot length, enter the appropriate length field and compare the returned sizes. Measure both feet while standing, from the back of the heel to the longest toe, and use the longer measurement as the starting point. Keep the unit chip in view: a value in millimeters is ten times the same length written in centimeters.</p>
            <p>Regional shoe scales are not all derived from the same origin or interval. A US-to-UK conversion can therefore vary across brands and size ranges. Some makers publish separate charts for men, women and children; others use a unified chart or a proprietary fit system. When a retailer supplies its own foot-length table, use that table for the final selection and treat this tool as a way to narrow the options, not as the last word.</p>
            <p>Fit also depends on width, toe shape, instep height, socks and the shoe’s intended use. A converted size cannot tell whether a narrow last will pinch, whether a boot has enough room for thick socks, or whether a running shoe will hold the heel securely. Try the shoes on both feet, walk a little, and check for toe pressure and slipping. For children, check fit periodically rather than relying on a past label as their feet grow.</p>
            <p>If the answer falls between sizes or the label is not offered by the brand, compare the manufacturer’s guide and return policy before ordering. Do not assume that rounding up always improves comfort: too much length can allow the foot to slide, while too little can crowd the toes. A half-size, wider width or different model may be a better solution. Reviews can help identify a brand’s typical fit but are subjective, so read them as clues rather than measurements.</p>
            <p>For a useful record, keep the original size and category, any measured foot length, the converter’s selected category and the maker’s chart result. When comparing two shoes, convert each original label independently instead of converting one rounded result into another system again. That prevents successive rounding from obscuring where the difference came from. For specialty footwear or persistent fitting concerns, seek an in-person fitting rather than relying only on a size label.</p>
            TXT],
            ['title' => 'A practical fitting comparison', 'html' => <<<'TXT'
            <p>When a converted value disagrees with a shoe you already own, compare the foot-length information and the brand’s category before deciding that the conversion is wrong. Check whether the familiar shoe is marked in a men’s, women’s or child scale and whether the label includes a width. A shoe can feel suitable despite a different printed size because its internal length and shape vary. Use the well-fitting shoe as one point of reference, then verify the new pair against the maker’s own table.</p><p>For an online order, try shoes indoors on a clean surface and follow the retailer’s return conditions. Check fit on both feet at the time of day you expect to wear them. If the product is for a specific sport or safety use, follow its own fitting recommendations rather than choosing solely from a general conversion.</p>
            TXT],
            ['title' => 'Use the conversion as one piece of evidence', 'html' => <<<'TXT'
            <p>Keep the converted size as a starting point, then let the actual shoe decide. If the brand’s size guide gives a foot-length range, compare your measurement with that range and check the product’s width options. A label is helpful for navigation through a size list, but it cannot represent every foot shape or last design.</p>
            TXT],
            ['title' => 'Avoid a second rounding step', 'html' => <<<'TXT'
            <p>If you use several online charts, return to the original foot-length measurement each time. Converting an already-rounded size through another chart can produce a different nearby label simply because the first chart discarded detail.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the US to UK shoe size converter calculator?', 'a' => 'The form asks for the foot length, which is 2 fields in total.'],
            ['q' => 'Can I enter foot length in a different unit?', 'a' => 'Yes. Foot length opens in millimeters and the chip beside it offers 34 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports US / CA men (1-14) = -21.1.'],
        ],
        'related' => [
            ['path' => '/everyday-life/how-many-tables', 'name' => 'How many tables'],
            ['path' => '/everyday-life/how-old-was-i', 'name' => 'How old was I'],
            ['path' => '/everyday-life/idling-fuel-consumption', 'name' => 'Idling fuel consumption'],
        ],
    ],
];

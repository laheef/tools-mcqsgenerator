<?php

/**
 * UK to US shoe size converter
 * /everyday-life/uk-us-shoe-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'UK to US shoe size converter',
    'meta' => ['title' => 'UK to US shoe size converter — Everyday Life', 'description' => 'UK to US shoe size converter takes adult or child? and returns UK/AU (0-13.5). Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'UK to US shoe size converter Calculator', 'updated' => '2024-07-06'],
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
                            'name' => 'uk_child',
                            'label' => 'UK/AU (0-13.5)',
                            'type' => 'number',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'us_child',
                            'label' => 'US/CA (0.5-13.5)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'More shoe sizes',
            'note' => '',
            'blocks' => [
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
                            'label' => 'MX / JP (9-20)',
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
                            'name' => 'uk',
                            'label' => 'UK/AU men (0-15)',
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
                            'label' => 'US/CA/AU women (1-15)',
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
                            'label' => 'US/CA men (1-14)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inches',
                            'label' => 'Foot length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
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
            'title' => 'More shoe sizes',
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
                            'name' => 'mx_jp',
                            'label' => 'MX / JP (19.5-32)',
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
            'title' => 'Conversion results ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'hasValue(eu)', 'text' => 'Most shoe sizes are rounded to 0.5:'],
                                ['when' => 'adult_child == 0 and eu < 31', 'text' => 'Check adult sizes.&nbsp;'],
                                ['when' => 'adult_child == 1 and eu >= 32.5', 'text' => 'Check child sizes.&nbsp;'],
                                ['when' => 'adult_child == 0 and eu >= 31 and us_female <= 15', 'text' => 'US/CA/AU female shoe size: {{us_female_round.formattedValue}}'],
                                ['when' => 'adult_child == 1 and eu <= 32.5 and us_child <= 13.5', 'text' => 'US child shoe size: {{us_child_round.formattedValue}}'],
                                ['when' => 'adult_child == 1 and eu <= 32.5 and us_child > 13.5', 'text' => 'US child shoe size: check adult size'],
                                ['when' => 'adult_child == 0 and eu >= 31 and us_male >= 1', 'text' => 'US/CA male shoe size: {{us_male_round.formattedValue}}'],
                                ['when' => 'adult_child == 0 and eu >= 31 and uk >= 0', 'text' => 'AU male/UK shoe size: {{uk_round.formattedValue}}'],
                                ['when' => 'adult_child == 1 and eu <= 32.5 and uk_child <= 13.5', 'text' => 'UK child shoe size: {{uk_child_round.formattedValue}}'],
                                ['when' => 'adult_child == 1 and eu <= 32.5 and uk_child > 13.5', 'text' => 'UK child shoe size: check adult size'],
                                ['when' => 'adult_child == 0 and eu >= 31', 'text' => <<<'TXT'
                                EU shoe size: {{eu_round.formattedValue}} MX/JP shoe size: {{mx_jp_round.formattedValue}} Korean shoe size: {{kor.formattedValue}} Remember that sizes may vary between manufacturers and even shoe models. Some systems include foot width as well.
                                TXT],
                                ['when' => 'adult_child == 1 and eu <= 32.5', 'text' => <<<'TXT'
                                EU child shoe size: {{eu_child_round.formattedValue}} MX/JP child shoe size: {{mx_jp_child_round.formattedValue}} Korean child shoe size: {{kor_child.formattedValue}} Remember that sizes may vary between manufacturers and even shoe models. Some systems include foot width as well.
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
                            'type' => 'presentation',
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
                            'type' => 'presentation',
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
                            'type' => 'presentation',
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
                            'type' => 'presentation',
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
                            'type' => 'presentation',
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
                            'type' => 'presentation',
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
                            'type' => 'presentation',
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
                            'type' => 'presentation',
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
            'title' => 'uk = (3*inches) - 23',
            'results' => ['uk' => '3*inches - 23', 'inches' => '(1/3)*uk + 23/3'],
        ],
        [
            'title' => 'us_male= ((3*inches) - 22)',
            'results' => ['us_male' => '3*inches - 22', 'inches' => '(1/3)*us_male + 22/3'],
        ],
        [
            'title' => 'us_female= (3*inches) - 21',
            'results' => ['us_female' => '3*inches - 21', 'inches' => '(1/3)*us_female + 7'],
        ],
        [
            'title' => 'uk_child = (3*inches) - 10',
            'results' => ['uk_child' => '3*inches - 10', 'inches' => '(1/3)*uk_child + 10/3'],
        ],
        [
            'title' => 'us_child= (3*inches) - 9 - (2/3)',
            'results' => ['us_child' => '3*inches - 29/3', 'inches' => '(1/3)*us_child + 29/9'],
        ],
        [
            'title' => 'eu_child = 1.27 * (uk_child+10) +2',
            'results' => ['uk_child' => '(100/127)*eu_child - 1470/127', 'eu_child' => '(127/100)*uk_child + 147/10'],
        ],
        [
            'title' => 'eu = 1.27 * (uk+23) +2',
            'results' => ['eu' => '(127/100)*uk + 3121/100', 'uk' => '(100/127)*eu - 3121/127'],
        ],
        [
            'title' => 'mx_jp = inches*2.54',
            'results' => ['mx_jp' => '(127/50)*inches', 'inches' => '(50/127)*mx_jp'],
        ],
        [
            'title' => 'kor = inches*25.4',
            'results' => ['kor' => '(127/5)*inches', 'inches' => '(5/127)*kor'],
        ],
        [
            'title' => 'mx_jp_child = inches',
            'results' => ['mx_jp_child' => 'inches', 'inches' => 'mx_jp_child'],
        ],
        [
            'title' => 'kor_child = inches*25.4',
            'results' => ['kor_child' => '(127/5)*inches', 'inches' => '(5/127)*kor_child'],
        ],
    ],
    'js' => '"use strict";omni.define("round_to_half",function(value){return Math.round(2*value)/2});//# sourceURL=customJs.js',
    'article' => [
        'intro' => 'The UK to US shoe size converter takes the numbers you enter and reports <strong>UK/AU men (0-15)</strong> immediately.',
        'sections' => [
            ['title' => 'How does the UK to US shoe size converter calculator work?', 'html' => <<<'TXT'
            <p>The UK to US shoe size converter takes the values in the form, applies the relationship described below and reports <strong>UK/AU men (0-15)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (adult or child?); then you type in the foot length.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Adult or child?</strong></td><td>One of 2 options, such as adult and child.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Korea (90-200)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>UK/AU men (0-15)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>US/CA/AU women (1-15)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>US/CA men (1-14)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Foot length</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Korea (195-320)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the UK to US shoe size converter calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">UK/AU men (0-15)</span><span class="formula-eq">=</span><span class="formula-rhs">3 × foot length − 23</span></div><div class="formula-row"><span class="formula-lhs">US/CA men (1-14)</span><span class="formula-eq">=</span><span class="formula-rhs">3 × foot length − 22</span></div><div class="formula-row"><span class="formula-lhs">US/CA/AU women (1-15)</span><span class="formula-eq">=</span><span class="formula-rhs">3 × foot length − 21</span></div><div class="formula-row"><span class="formula-lhs">UK/AU (0-13.5)</span><span class="formula-eq">=</span><span class="formula-rhs">3 × foot length − 10</span></div><div class="formula-row"><span class="formula-lhs">US/CA (0.5-13.5)</span><span class="formula-eq">=</span><span class="formula-rhs">3 × foot length − 29 ÷ 3</span></div><div class="formula-row"><span class="formula-lhs">UK/AU (0-13.5)</span><span class="formula-eq">=</span><span class="formula-rhs">(100 ÷ 127) × EU (15-32.5) − 1470 ÷ 127</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>Adult or child?</strong> set to Adult and <strong>Foot length</strong> = 30 cm. Working through the relationship above gives <strong>UK/AU (0-13.5)</strong> = -9, <strong>US/CA (0.5-13.5)</strong> = -8.77, <strong>EU (15-32.5)</strong> = 3 and <strong>MX / JP (9-20)</strong> = 0.3.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>UK/AU (0-13.5)</strong> = -9, <strong>US/CA (0.5-13.5)</strong> = -8.77, <strong>EU (15-32.5)</strong> = 3 and <strong>MX / JP (9-20)</strong> = 0.3 should be roughly the size you expected from <strong>Adult or child?</strong> set to Adult and <strong>Foot length</strong> = 30 cm.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The UK to US shoe size converter earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 1 figures keep coming back — the foot length — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/hours">Hours</a>, <a href="/everyday-life/hours-between-two-times">Hours between two times</a> and <a href="/everyday-life/hours-minutes">Hours and minutes</a>.</p>
            TXT],
            ['title' => 'Converting a UK shoe label to a US size', 'html' => <<<'TXT'
            <p>First identify whether the UK label is men’s, women’s or children’s sizing. The calculator includes an adult/child selection and separate outputs because regional size systems use different scales and conventions. Enter the UK number in the correct category and read the corresponding US label. Do not treat a size number as self-explanatory: the category printed on the shoe or retailer’s chart is part of the input.</p>
            <p>UK and US sizes are related through chart conventions rather than one universal brand-independent formula. A converted size helps you locate a likely range, but manufacturers can use different lasts, increments and fit standards. If the brand provides a foot-length chart, compare the measurement against that guide. Measure both feet while standing, from the heel to the longest toe, and use the longer measurement as your starting point. Check whether the chart refers to foot length, insole length or a nominal size.</p>
            <p>Children’s sizing should be handled separately. Choose the child option when the original UK label is from a children’s chart; do not infer it solely from the wearer’s age. Children grow, and the size that fitted a few months ago may no longer be suitable. A conversion is not a growth allowance. Check toe room and heel security in the actual shoe, and avoid buying an excessively long pair to compensate for future growth.</p>
            <p>Fit involves width, toe-box shape, instep height, sock thickness and the shoe’s purpose, none of which is determined by this converter. A boot with thick socks, a running shoe and a formal shoe can feel different at the same nominal size. Try both shoes, walk on a safe surface and check that the toes are not pressed and the heel does not slip uncomfortably. A width option or different model may matter more than moving one size up.</p>
            <p>If the result is between sizes or the brand does not sell that label, check its own chart and return policy. Avoid rounding through multiple systems: convert from the original UK size or measured foot length each time. Keep the original label, category, selected option and US output together so a mismatch can be traced to the correct chart. Reviews can offer clues about fit but are personal experiences, not measurements.</p>
            <p>Use the conversion to narrow what to try, then let the actual shoe fit decide. For specialist footwear or a child’s shoe, use the manufacturer’s current guidance and obtain an in-person fitting when uncertainty matters. The calculator translates labels; it cannot guarantee comfort or make a shoe appropriate for a particular activity.</p>
            TXT],
            ['title' => 'Check the category and fit before buying', 'html' => <<<'TXT'
            <p>Two labels with the same UK number can refer to different categories or brands, so verify the original shoe’s label before using it as an input. The US result may be shown for men, women or children; choose the one that matches the intended purchase. If a box only says “UK 6” without a category, look up the product’s size guide or ask the retailer rather than assuming the converter can infer it.</p><p>Foot length can provide a useful cross-check. Stand on paper with the heel against a wall, mark the longest toe and measure the distance. Repeat for the other foot and use the longer measurement. Check the unit before entering it: the same length stated in inches and millimeters differs numerically by a factor of 25.4. A maker’s own length chart can be more helpful than a generic country conversion because it reflects the actual shoe line.</p><p>Try both shoes with the socks you plan to wear. Check that the heel stays secure, the widest part of the foot is not squeezed and the toes have comfortable room. For boots or athletic footwear, allow for the intended sock thickness and movement without assuming that a larger size automatically provides a better fit. If the shoes are for a child, remeasure periodically and use the child chart rather than converting an adult label.</p><p>If a converted number falls between sizes, look for half-size or width choices and check the return policy. Brand-specific reviews can reveal common fit tendencies but are anecdotal; a comment that a shoe runs small may refer to width, toe shape or preference. Keep the UK size, category, measured foot length and selected US output together so the decision can be revisited without repeating a chain of rounded conversions.</p>
            TXT],
            ['title' => 'What to do with a borderline result', 'html' => <<<'TXT'
            <p>If the converted result is between available sizes, check whether half sizes or width options are offered. Try the neighboring sizes with the intended socks and compare heel hold and toe room; do not assume the larger option is automatically better. For a product that cannot be returned, ask the seller to confirm the chart for that exact model before ordering.</p><p>For children, use a current measurement and a child-specific chart. A previous UK size can become outdated quickly and should not be used as a proxy for present foot length.</p>
            TXT],
            ['title' => 'Retain the source label', 'html' => <<<'TXT'
            <p>Keep the original UK category and size with the converted US result. If a second chart differs, you can trace the discrepancy to the chart rather than guessing which rounded label was used.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the UK to US shoe size converter calculator?', 'a' => 'The form asks for the foot length, which is 2 fields in total.'],
            ['q' => 'Can I enter foot length in a different unit?', 'a' => 'Yes. Foot length opens in centimeters and the chip beside it offers 34 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports UK/AU (0-13.5) = -9.'],
        ],
        'related' => [
            ['path' => '/everyday-life/hours', 'name' => 'Hours'],
            ['path' => '/everyday-life/hours-between-two-times', 'name' => 'Hours between two times'],
            ['path' => '/everyday-life/hours-minutes', 'name' => 'Hours and minutes'],
        ],
    ],
];

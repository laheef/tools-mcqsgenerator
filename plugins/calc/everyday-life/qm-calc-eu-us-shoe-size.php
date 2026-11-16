<?php

/**
 * EU to US shoe size converter
 * /everyday-life/eu-us-shoe-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'EU to US shoe size converter',
    'meta' => ['title' => 'EU to US shoe size converter — Everyday Life', 'description' => 'EU to US shoe size converter takes adult or child? and returns EU (15-32.5). Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'EU to US shoe size converter Calculator', 'updated' => '2024-07-29'],
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
        'intro' => <<<'TXT'
        The EU to US shoe size converter is a free, no-sign-up everyday life tool. Fill in the 2 fields it asks for and it works out <strong>AU men / UK (0-15)</strong> straight away, with the formula shown underneath.
        TXT,
        'sections' => [
            ['title' => 'How does the EU to US shoe size converter calculator work?', 'html' => <<<'TXT'
            <p>The EU to US shoe size converter takes the values in the form, applies the relationship described below and reports <strong>AU men / UK (0-15)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (adult or child?); then you type in the figures it asks for.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Adult or child?</strong></td><td>One of 2 options, such as adult and child.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>US / CA men (1-14)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>US / CA / AU women (1-15)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Foot length</strong></td><td>A measured quantity, 34 units available.</td><td>millimeters</td><td>Calculated</td></tr><tr><td><strong>Foot length in inches</strong></td><td>A measured quantity, 34 units available.</td><td>inches</td><td>Calculated</td></tr><tr><td><strong>AU men / UK (0-15)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Korea (195-320)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Korea (90-200)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Uk round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Mx jp round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Us male round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Uk child round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Mx jp child round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Us female round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Us child round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Eu round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Eu child round</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the EU to US shoe size converter calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">AU men / UK (0-15)</span><span class="formula-eq">=</span><span class="formula-rhs">3 × foot length − 23</span></div><div class="formula-row"><span class="formula-lhs">US / CA men (1-14)</span><span class="formula-eq">=</span><span class="formula-rhs">3 × foot length − 22</span></div><div class="formula-row"><span class="formula-lhs">US / CA / AU women (1-15)</span><span class="formula-eq">=</span><span class="formula-rhs">3 × foot length − 21</span></div><div class="formula-row"><span class="formula-lhs">AU men / UK (0-15)</span><span class="formula-eq">=</span><span class="formula-rhs">(100 ÷ 127) × EU (33.5-50) − 3121 ÷ 127</span></div><div class="formula-row"><span class="formula-lhs">MX / JP (19.5-32)</span><span class="formula-eq">=</span><span class="formula-rhs">(127 ÷ 50) × foot length in inches</span></div><div class="formula-row"><span class="formula-lhs">Korea (195-320)</span><span class="formula-eq">=</span><span class="formula-rhs">(127 ÷ 5) × foot length in inches</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>Adult or child?</strong> set to Adult and <strong>Foot length</strong> = 30 mm. Working through the relationship above gives <strong>EU (15-32.5)</strong> = 3.14, <strong>US / CA (0.5-13.5)</strong> = -8.77, <strong>EU (33.5-50)</strong> = 3.14 and <strong>US / CA men (1-14)</strong> = -21.1.</p><p>Read it as a template. Every number above can be replaced with one of yours; only the relationship between them is fixed.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>EU (15-32.5)</strong> = 3.14, <strong>US / CA (0.5-13.5)</strong> = -8.77, <strong>EU (33.5-50)</strong> = 3.14 and <strong>US / CA men (1-14)</strong> = -21.1 should be roughly the size you expected from <strong>Adult or child?</strong> set to Adult and <strong>Foot length</strong> = 30 mm.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in millimeters, and convertible to any of the 34 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in inches, and convertible to any of the 34 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in millimeters</li><li>Length, opening in inches</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The EU to US shoe size converter earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/witcher">The Witcher</a>, <a href="/everyday-life/wizarding-currency">Harry Potter currency</a> and <a href="/everyday-life/words-per-minute">Words per minute</a>.</p>
            TXT],
            ['title' => 'Converting an EU shoe label to a US size', 'html' => <<<'TXT'
            <p>Use this page when the size you have is an EU label and you want the corresponding US chart entries to compare. First choose adult or child sizing, then enter the EU size in the field for that category. Adult sizing also separates men’s and women’s US results, so check which output applies to the person who will wear the shoe. A bare number is not enough context: the same EU label can be associated with different US labels depending on category and the chart used.</p>
            <p>EU sizing is often printed as a single number, but brands can differ in how their lasts and size intervals map to that number. Treat the result as a lookup, not a physical measurement. If you can measure the foot, compare heel-to-longest-toe length with the shoe maker’s published chart. Measure both feet while standing and use the longer measurement as a starting point. Check whether the chart asks for foot length or shoe insole length; those are not always the same quantity.</p>
            <p>Use the child selector for a child-size label rather than assuming that a small adult number is equivalent. Children’s charts may have their own steps and their own regional mapping. A growing child’s previous shoe size can quickly become outdated, so verify the current fit. Do not add a large amount of extra length solely for growth; heel hold, stability and toe room still matter.</p>
            <p>A converted size cannot account for width, toe-box shape, instep height, socks or the use of the shoe. A narrow fashion shoe and a roomy trainer can fit differently even when their tags show the same converted size. Try the shoe on both feet, with the socks you plan to wear, and walk on a safe surface. Check that the toes are not pressed, the heel does not slip excessively and the shoe does not pinch across the widest part of the foot.</p>
            <p>If the converter gives a borderline or unavailable size, compare the brand’s own size guide and return policy before buying. Do not automatically round up or down without checking the fit: extra length can cause sliding, while a shorter size can crowd the toes. A half-size, width option or different model may be more appropriate. A retailer’s chart should take priority for its own product because construction and fit vary among brands.</p>
            <p>To make the comparison repeatable, note the original EU size, adult/child choice, which US output you are using, and any measured foot length. Convert from the original EU label each time rather than chaining one rounded output through another chart. That keeps the source of a discrepancy visible and helps a customer-service representative understand what was compared. This tool narrows a search; the shoe’s actual fit is the final test.</p>
            TXT],
            ['title' => 'When measurements and labels do not agree', 'html' => <<<'TXT'
            <p>A shoe size on an old pair is useful only if that pair still fits well and the label identifies its sizing category. If your foot-length measurement points to a different size, first verify your measuring method: stand naturally, place the heel against a straight edge, and measure to the longest toe without bending the foot. Repeat for both feet. Then compare the result with the brand’s own table, checking whether it lists foot length or an internal shoe measurement. The chart’s definition matters as much as its numbers.</p><p>Allow the intended sock thickness when trying the shoe, but avoid making a large adjustment by guessing. For work boots, sports shoes or footwear worn for long periods, the intended activity can change the comfortable fit. The converter cannot infer these details, so take the label as a starting point and test the actual shoe before committing.</p>
            TXT],
            ['title' => 'A final checklist before selecting a pair', 'html' => <<<'TXT'
            <p>Before using the converted value to place an order, check three details: the input is the EU size printed for the correct category, the output is the US category you intend to buy, and the brand’s chart agrees closely enough for that product. If the US result falls between sizes, see whether the brand offers half sizes or alternate widths. The converter does not know the shoe’s last or the wearer’s preference, so a borderline result is a prompt to compare options, not a verdict.</p><p>Keep the packaging until you have checked both shoes indoors. Walk, stand and bend naturally; a size that seems acceptable while seated may feel different under load. Use the retailer’s return policy if the fit is uncertain. For a child, reassess fit as they grow rather than assuming the same conversion remains valid for the next purchase.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the EU to US shoe size converter calculator?', 'a' => 'The form asks for a few values, which is 2 fields in total.'],
            ['q' => 'Can I enter foot length in a different unit?', 'a' => 'Yes. Foot length opens in millimeters and the chip beside it offers 34 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports EU (15-32.5) = 3.14.'],
        ],
        'related' => [
            ['path' => '/everyday-life/witcher', 'name' => 'The Witcher'],
            ['path' => '/everyday-life/wizarding-currency', 'name' => 'Harry Potter currency'],
            ['path' => '/everyday-life/words-per-minute', 'name' => 'Words per minute'],
        ],
    ],
];

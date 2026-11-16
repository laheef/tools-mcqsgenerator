<?php

/**
 * Coronavirus mask
 * /everyday-life/coronavirus-mask
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Coronavirus mask',
    'meta' => ['title' => 'Coronavirus mask — Formula, Steps & Examples', 'description' => 'Coronavirus mask works out you need and total cost and reports both. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Coronavirus mask Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'type',
                            'label' => 'Type of face mask',
                            'type' => 'select',
                            'options' => [
                                'Cloth mask' => '8',
                                'Surgical mask' => '2',
                                'N95/N99 respirator' => '16',
                                'Mask + N95 filter' => '56',
                                'Mask + N99 filter' => '56',
                                'Other FFRs' => '56',
                            ],
                            'dataset' => 'masks',
                            'control' => 'DROPDOWN',
                            'default' => 'Cloth mask',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'mask/mask-surgical_nn.png'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'type == 200', 'text' => <<<'TXT'
                                A cloth mask blocks only some of virus particles. Yet, it does protect from droplets, e.g., from coughs or sneezes.  This is the face covering recommended by the CDC for the general public.&nbsp;
                                TXT],
                                ['when' => 'type == 201', 'text' => 'A surgical mask blocks only some of virus particles. Yet, it does protect from droplets, e.g., from coughs or sneezes.&nbsp;'],
                                ['when' => 'type == 202', 'text' => 'A N95/N99 respirator blocks 95-99% of virus particles.&nbsp;'],
                                ['when' => 'type == 203', 'text' => 'A mask + N95 filter blocks ~95% of virus particles.&nbsp;'],
                                ['when' => 'type == 204', 'text' => 'A mask + N99 filter blocks ~99% of virus particles.&nbsp;'],
                                ['when' => 'type == 205', 'text' => 'A mask with FFRs blocks more than 95% of virus particles.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_time',
                            'label' => 'I need to cover my face for the next...',
                            'type' => 'number',
                            'help' => 'Estimated time the face mask rule will be in place for.',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '2', 'when' => null],
                                ['value' => '2', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'daily_hours',
                            'label' => 'How long during the day?',
                            'type' => 'number',
                            'suffix' => 'hrs/day',
                            'help' => 'On average, 8 hours a day.',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '8', 'when' => null],
                                ['value' => '8', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price',
                            'label' => 'Price of one mask',
                            'type' => 'number',
                            'suffix' => '/mask',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_filter',
                            'label' => 'Price of one filter',
                            'type' => 'number',
                            'suffix' => '/filter',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'defaults' => [
                                ['value' => '0', 'when' => null],
                                ['value' => '0', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'max_protect',
                            'label' => 'Max protect',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'min_protect',
                            'label' => 'Min protect',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'one_mask_hr',
                            'label' => 'One mask hr',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_month',
                            'label' => 'Total month',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Your results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'filter_number',
                            'label' => ' You need',
                            'type' => 'number',
                            'suffix' => 'filter(s)',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mask_number',
                            'label' => ' You need',
                            'type' => 'number',
                            'suffix' => 'mask(s)',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result',
                            'label' => ' Total cost',
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
                            'name' => 'result_filter',
                            'label' => ' Filters cost',
                            'type' => 'number',
                            'help' => 'The cost of the filters only.',
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
                            'name' => 'total_cost',
                            'label' => ' Total cost',
                            'type' => 'number',
                            'help' => 'Includes one-time cost of the mask.',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'type == 200', 'text' => ' Remember to change the mask every 8 hours.  Five masks are enough, even over a longer period of time, provided that you wash and reuse them.&nbsp;'],
                                ['when' => 'type == 201', 'text' => ' Remember to change the mask every 2 hours.&nbsp;'],
                                ['when' => 'type == 202', 'text' => ' Remember to change the mask after 16 hours of use.&nbsp;'],
                                ['when' => 'type == 203', 'text' => ' Remember to change the filter every week.&nbsp;'],
                                ['when' => 'type == 204', 'text' => ' Remember to change the filter every week.&nbsp;'],
                                ['when' => 'type == 205', 'text' => ' Remember to change the FFR every week.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'result = get_price (type, daily_hours, total_time, price, one_mask_hr) ',
            'results' => ['result' => 'get_price(type, daily_hours, total_time, price, one_mask_hr)'],
        ],
        [
            'title' => 'result_filter = get_price (type, daily_hours, total_time, price_filter, one_mask_hr)',
            'results' => ['result_filter' => 'get_price(type, daily_hours, total_time, price_filter, one_mask_hr)'],
        ],
        [
            'title' => 'total_cost = one_way( result_filter + price)',
            'results' => ['total_cost' => '(price + get_price(type, daily_hours, total_time, price_filter, one_mask_hr))'],
        ],
        [
            'title' => 'mask_number = get_number (type, daily_hours, total_time, one_mask_hr)',
            'results' => ['mask_number' => 'get_number(type, daily_hours, total_time, one_mask_hr)'],
        ],
        [
            'title' => 'filter_number = get_number (type, daily_hours, total_time, one_mask_hr)',
            'results' => ['filter_number' => 'get_number(type, daily_hours, total_time, one_mask_hr)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_number",function(type,daily_hours,total_time,one_mask_hr){var number_of_masks=daily_hours*total_time/one_mask_hr;if(type==200&&number_of_masks>5){number_of_masks=5}number_of_masks=Math.ceil(number_of_masks);return number_of_masks});omni.define("get_price",function(type,daily_hours,total_time,price,one_mask_hr){var result=0;var number_of_masks=daily_hours*total_time/one_mask_hr;if(type==200&&number_of_masks>5){number_of_masks=5}number_of_masks=Math.ceil(number_of_masks);result=number_of_masks*price;return result});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => 'The Coronavirus mask calculator turns the price of one mask and the price of one filter into <strong>total cost (Your results)</strong>.',
        'sections' => [
            ['title' => 'How does the Coronavirus mask calculator work?', 'html' => <<<'TXT'
            <p>The Coronavirus mask calculator takes the values in the form, applies the relationship described below and reports <strong>total cost (Your results)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the type of face mask); then you type in how long during the day?, the price of one mask and the price of one filter.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 6 options, such as cloth mask, surgical mask and N95/N99 respirator. </li><li>A measured quantity, entered by default in months. The unit chip switches it to any of the 27 supported units.</li><li>A number, expressed in hrs/day.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Type of face mask</strong></td><td>One of 6 options, such as cloth mask, surgical mask and N95/N99 respirator.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>How long during the day?</strong></td><td>A number stated in hrs/day.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Price of one mask</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Price of one filter</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Max protect</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Min protect</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>One mask hr</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Total month</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>You need (Your results)</strong></td><td>A number stated in filter(s).</td><td>—</td><td>Calculated</td></tr><tr><td><strong>You need (Your results)</strong></td><td>A number stated in mask(s).</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Total cost (Your results)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Filters cost</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Total cost (Your results)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Coronavirus mask calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Total cost</span><span class="formula-eq">=</span><span class="formula-rhs">(type of face mask, how long during the day?, I need to cover my face for the next, price of one mask, one mask hr)</span></div><div class="formula-row"><span class="formula-lhs">Filters cost</span><span class="formula-eq">=</span><span class="formula-rhs">(type of face mask, how long during the day?, I need to cover my face for the next, price of one filter, one mask hr)</span></div><div class="formula-row"><span class="formula-lhs">Total cost</span><span class="formula-eq">=</span><span class="formula-rhs">(price of one mask + (type of face mask, how long during the day?, I need to cover my face for the next, price of one filter, one mask hr))</span></div><div class="formula-row"><span class="formula-lhs">You need</span><span class="formula-eq">=</span><span class="formula-rhs">(type of face mask, how long during the day?, I need to cover my face for the next, one mask hr)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in months</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Coronavirus mask calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 2 figures keep coming back — the price of one mask and the price of one filter — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/tablecloth-size">Tablecloth size</a>, <a href="/everyday-life/tent-size">Tent size</a> and <a href="/everyday-life/tesla-charging-cost">Tesla charging cost</a>.</p>
            TXT],
            ['title' => 'Reading the cost estimate without treating it as safety advice', 'html' => <<<'TXT'
            <p>This calculator is a budgeting aid: it uses the selected mask type, the time and use pattern entered, and the prices for masks or filters to estimate quantities and cost over a chosen period. It does not assess whether a particular product is appropriate for a person, workplace or exposure, and it does not measure protection. Do not use a lower calculated price as evidence that one type is safer, more effective or suitable for a particular situation.</p>
            <p>Before entering prices, decide what the price represents. A single mask, a multipack and a replacement filter are different units. If a pack costs a certain amount, convert it to a per-mask or per-filter price only when the calculator asks for that basis; otherwise the estimate can be off by the pack size. Check that the currency unit is consistent across both price fields. The number of masks or filters is a modelled estimate based on the form’s assumptions, not an instruction to reuse a product for a specified duration.</p>
            <p>Use the period and hours-of-use inputs to reflect the scenario you actually want to budget. For example, a workday schedule and an occasional errand schedule are very different consumption patterns. If use varies from day to day, run separate scenarios or use a reasonable average and label it clearly. A useful plan often includes a small allowance for damaged, lost or unusable items; that reserve is a personal budgeting choice, not something the calculator can infer.</p>
            <p>Product instructions govern fit, maintenance, replacement and reuse. Follow the manufacturer’s directions and current guidance from the relevant health or workplace authority. Do not alter a product, substitute a filter or extend use simply to match the calculator’s projected cost. The calculator’s categories are broad and cannot account for the specific model, condition, fit, storage, task or local requirements.</p>
            <p>To compare two purchase options fairly, hold the time period and hours of use fixed, then change only the item prices or selection that differs. Record the assumptions beside each result: product type, price basis, expected schedule and period. Check whether the estimate includes filters, replacement masks, shipping or taxes; unless those costs appear in the inputs, they are not included in the result. For subscription or bulk purchases, compare the per-unit price with the amount you can realistically use before the product expires or its instructions say to replace it.</p>
            <p>Use the output to build a rough household or workplace budget, then verify the arithmetic with the actual package quantity and instructions. If a result seems implausibly low or high, first check whether a pack price was entered as a single-item price, whether hours and days match the intended period, and whether the selected type changes the calculator’s replacement assumption. Any health or occupational decision should come from authoritative, current advice—not from this cost estimate.</p>
            TXT],
            ['title' => 'Build scenarios that can be compared', 'html' => <<<'TXT'
            <p>For a fair price comparison, write down the same schedule for each option: how many days in the period, how many hours of use on those days and the relevant unit cost. If one option has a different filter or replacement interval, confirm the calculator’s type selection and price fields reflect that difference. Do not compare a multipack price in one run with a single-item price in another unless you have converted both to the same basis.</p><p>Budget estimates can change when prices, availability or workplace rules change. Keep the date of the price quote and revisit the inputs when you reorder. This makes the calculator useful for planning purchases without treating an old estimate as a current product recommendation.</p>
            TXT],
            ['title' => 'Check what the total includes', 'html' => <<<'TXT'
            <p>Before relying on the total, verify whether it represents only the items priced in the form. Taxes, delivery, storage supplies and replacement items outside the chosen category may be additional. Write down exclusions next to the estimate so that a partial materials budget is not mistaken for a complete cost of use.</p>
            TXT],
            ['title' => 'Revisit assumptions when circumstances change', 'html' => <<<'TXT'
            <p>Recalculate if your schedule, product instructions or quoted prices change. A prior result describes only the inputs entered for that scenario; it should not be carried forward as a standing estimate when the underlying plan is different.</p>
            TXT],
            ['title' => 'Avoid treating price as a quality score', 'html' => <<<'TXT'
            <p>A lower total may reflect a lower input price or different replacement assumption, not a better purchase. Compare product requirements and independent instructions separately; the cost calculation cannot rank product quality or suitability.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Coronavirus mask calculator work out?', 'a' => 'It returns total cost (Your results), derived from the price of one mask and the price of one filter.'],
            ['q' => 'What do I need to enter to use the Coronavirus mask calculator?', 'a' => 'The form asks for the price of one mask and the price of one filter, which is 5 fields in total.'],
            ['q' => 'Can I enter I need to cover my face for the next in a different unit?', 'a' => 'Yes. I need to cover my face for the next opens in months and the chip beside it offers 27 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Max protect = 0.'],
        ],
        'related' => [
            ['path' => '/everyday-life/tablecloth-size', 'name' => 'Tablecloth size'],
            ['path' => '/everyday-life/tent-size', 'name' => 'Tent size'],
            ['path' => '/everyday-life/tesla-charging-cost', 'name' => 'Tesla charging cost'],
        ],
    ],
];

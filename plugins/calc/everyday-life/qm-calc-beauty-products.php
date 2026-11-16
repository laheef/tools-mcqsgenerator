<?php

/**
 * Beauty products
 * /everyday-life/beauty-products
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Beauty products',
    'meta' => ['title' => 'Beauty products — Formula, Steps & Examples', 'description' => 'Beauty products reports total number of applications and cost per application. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Beauty products Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => 'Product details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'product_type',
                            'label' => 'Product type',
                            'type' => 'select',
                            'options' => [
                                'Mascara' => '1',
                                'Nail polish' => '2',
                                'Liquid lipstick' => '3',
                                'Foundation' => '4',
                                'Liquid eyeliner' => '5',
                                'Enter custom product efficiency' => '0',
                            ],
                            'dataset' => 'Data',
                            'control' => 'DROPDOWN',
                            'help' => 'Select the last dropdown option to enter a custom product efficiency.',
                            'default' => 'Mascara',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'layers_per_ml',
                            'label' => 'Efficiency',
                            'type' => 'result',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'volume',
                            'label' => 'Product volume',
                            'type' => 'number',
                            'help' => 'Volume of product per package.',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost',
                            'label' => 'Product price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Your beauty habits',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'layers_per_application',
                            'label' => 'Layers per application',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'applications_per_day',
                            'label' => 'I apply this product',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'product_type==1', 'text' => '‍ A person usually applies two layers per mascara application per day.&nbsp;'],
                                ['when' => 'product_type==2', 'text' => '‍ A person usually applies two layers per nail polish application two times a week.&nbsp;'],
                                ['when' => 'product_type==3', 'text' => '‍ A person usually applies one layer per liquid lipstick application three times a day.&nbsp;'],
                                ['when' => 'product_type==4', 'text' => '‍ A person usually applies one layer per application of foundation per day.&nbsp;'],
                                ['when' => 'product_type==5', 'text' => '‍ A person usually applies one layer per liquid eyeliner application per day.&nbsp;'],
                                ['when' => 'product_type==0', 'text' => '‍ We can only display the typical application habits for non-custom product types.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'How long will the product last?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'applications',
                            'label' => 'Total number of applications',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost_per_application',
                            'label' => 'Cost per application',
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
                            'name' => 'product_duration',
                            'label' => 'You will run out of the product after...',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_cost',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
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
            'title' => 'applications = layers_per_ml * volume / layers_per_application',
            'results' => ['applications' => 'layers_per_ml*volume/layers_per_application', 'volume' => 'applications*layers_per_application/layers_per_ml', 'layers_per_ml' => 'applications*layers_per_application/volume', 'layers_per_application' => 'layers_per_ml*volume/applications'],
        ],
        [
            'title' => 'cost_per_application = cost / applications',
            'results' => ['applications' => 'cost/cost_per_application', 'cost_per_application' => 'cost/applications', 'cost' => 'applications*cost_per_application'],
        ],
        [
            'title' => 'product_duration = applications / applications_per_day',
            'results' => ['applications' => 'applications_per_day*product_duration', 'applications_per_day' => 'applications/product_duration', 'product_duration' => 'applications/applications_per_day'],
        ],
        [
            'title' => 'total_cost = cost / product_duration',
            'results' => ['total_cost' => 'cost/product_duration', 'product_duration' => 'cost/total_cost', 'cost' => 'product_duration*total_cost'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Supply the product volume, the product price and the layers per application and the Beauty products calculator solves for <strong>total number of applications</strong>.
        TXT,
        'sections' => [
            ['title' => 'How does the Beauty products calculator work?', 'html' => <<<'TXT'
            <p>The Beauty products calculator takes the values in the form, applies the relationship described below and reports <strong>total number of applications</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the product type); then you type in the product volume, the product price and the layers per application.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 6 options, such as mascara, nail polish and liquid lipstick. </li><li>A measured quantity, entered by default in milliliters. The unit chip switches it to any of the 40 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A plain number with no unit attached.</li><li>A measured quantity, entered by default in days. The unit chip switches it to any of the 27 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Product type</strong></td><td>One of 6 options, such as mascara, nail polish and liquid lipstick.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Efficiency</strong></td><td>A measured quantity, 40 units available.</td><td>milliliters</td><td>Calculated</td></tr><tr><td><strong>Product volume</strong></td><td>A measured quantity, 40 units available.</td><td>milliliters</td><td>You supply it</td></tr><tr><td><strong>Product price</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Layers per application</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>I apply this product</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr><tr><td><strong>Total number of applications</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Cost per application</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Total cost</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Beauty products calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Total number of applications</span><span class="formula-eq">=</span><span class="formula-rhs">efficiency × product volume ÷ layers per application</span></div><div class="formula-row"><span class="formula-lhs">Total number of applications</span><span class="formula-eq">=</span><span class="formula-rhs">product price ÷ cost per application</span></div><div class="formula-row"><span class="formula-lhs">Total number of applications</span><span class="formula-eq">=</span><span class="formula-rhs">I apply this product × you will run out of the product after...</span></div><div class="formula-row"><span class="formula-lhs">Total cost</span><span class="formula-eq">=</span><span class="formula-rhs">product price ÷ you will run out of the product after...</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in days, and convertible to any of the 27 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in milliliters, and convertible to any of the 40 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Volume, opening in milliliters</li><li>Volume, opening in milliliters</li><li>Currency, opening in US Dollar</li><li>Time, opening in days</li><li>Currency, opening in US Dollar</li><li>Time, opening in days</li><li>Currency, opening in US Dollar</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Beauty products calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Any time the same 3 figures keep coming back — the product volume, the product price and the layers per application — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/reading-speed">Reading speed</a>, <a href="/everyday-life/reading-time">Reading time</a> and <a href="/everyday-life/recessed-lighting">Recessed lighting</a>.</p>
            TXT],
            ['title' => 'Estimating applications, duration and cost', 'html' => <<<'TXT'
            <p>The Beauty products calculator estimates how many applications a product volume can provide, how long it may last and the approximate cost per application. It uses the product category, an assumed number of layers per milliliter, container volume, price, layers per application and applications per day. Those are planning inputs, not a statement about how much product every person should use. Follow the product label and use the amount appropriate for its intended purpose.</p>
            <p>Volume and price should come from the package you are actually considering. A bottle marked in milliliters may be entered in another unit if the unit control supports it, but verify the selected unit before calculating. Compare products on a consistent basis: a price per full bottle is different from a price per milliliter, and packages with similar volume can have different prices. The calculator can express a cost per modeled application only when the usage assumptions are comparable.</p>
            <p>The layers-per-milliliter and layers-per-application inputs are estimates of application size. The amount used can vary with the formula, applicator, area covered, finish and personal preference. A mascara layer, nail-polish coat and lipstick application are not interchangeable units of product. Choose the product type and usage assumptions that make sense for the item, and treat the number of applications as a rough planning figure rather than a guarantee.</p>
            <p>Product duration is derived from the modeled application count and how often you use it. If you use the product on some days but not others, enter a realistic average or run separate scenarios. For example, a daily-use assumption will produce a shorter duration than a few uses per week. Keep the unit of applications per day clear and do not enter a weekly frequency without converting it.</p>
            <p>Cost per application is useful for comparing a refill with a new package or two sizes of the same product, provided the formula and amount used are similar. It does not measure quality, performance, suitability or value for every person. An inexpensive product may require a different amount per use, and a product that expires before it is finished may not deliver the modeled number of applications.</p>
            <p>Storage, opening date and product instructions matter. Use products according to their labels, observe any period-after-opening guidance and discard items that have changed in a way the manufacturer says makes them unsuitable. The calculator does not assess ingredients, contamination, skin reactions, safety or shelf life. Do not extend use or apply more than directed to make a budget estimate work.</p>
            <p>For a useful comparison, record the package volume, price, selected product type and your assumed use frequency. Change one input at a time to see whether price, application size or frequency drives the result. The output is a budgeting estimate based on the entries you supply; real use and product guidance should determine how much you apply and when to replace it.</p>
            TXT],
            ['title' => 'Make the use assumptions match the product', 'html' => <<<'TXT'
            <p>Some products are used in layers, while others are measured by pumps, drops, sprays or a weighed amount. The calculator’s layer-based model is only useful when “layers per milliliter” and “layers per application” are meaningful for the item selected. If the package or product directions specify a measured dose, follow that guidance and do not convert it into an arbitrary number of layers simply to fill the form.</p><p>For a product with multiple uses—such as one item applied to different areas—decide whether the input represents one area or the whole routine. Consistency matters more than apparent precision. A routine that uses two coats on some days and one on others can be modeled with an average, but record that it is an average rather than treating it as a guaranteed count of uses.</p><p>When comparing container sizes, use the same application assumption and frequency. A larger package often lowers the calculated cost per use only if the product is fully used before its recommended period and the quantity applied stays similar. The calculation does not include waste, spills, packaging, shipping, taxes, discounts or the value of unused product at expiry unless those items are represented in the inputs.</p><p>Use the duration estimate to plan a budget or reorder reminder, not to decide that a product must be used up. The label’s directions and storage requirements take precedence. If the product changes texture, smell or appearance, follow the maker’s guidance; the calculator cannot determine whether it remains suitable. A cost estimate should never encourage excessive use or continued use beyond product instructions.</p>
            TXT],
            ['title' => 'Use the estimate to compare value, not performance', 'html' => <<<'TXT'
            <p>Cost per application is a convenient budget measure, but it is not a quality score. A lower figure does not mean a product performs better or suits your skin, hair or nails. Compare products only when the usage estimate is reasonably similar, and read the ingredients and directions on the package. If you have an allergy, irritation or other concern, do not rely on a calculator to assess safety; consult the product information or a qualified professional.</p><p>For a multi-product routine, calculate each item separately and keep the application frequency clear. Adding durations from different products can be misleading if they are used on different schedules or opened at different times.</p>
            TXT],
            ['title' => 'Revisit the estimate when use changes', 'html' => <<<'TXT'
            <p>If your routine changes, update applications per day rather than carrying forward the old duration. The result describes the usage pattern entered, not a fixed lifetime for the package. A product used occasionally can last longer than a daily-use scenario, but its label still governs when it should be discarded.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Beauty products calculator work out?', 'a' => 'It returns total number of applications, derived from the product volume, the product price and the layers per application.'],
            ['q' => 'What do I need to enter to use the Beauty products calculator?', 'a' => 'The form asks for the product volume, the product price and the layers per application, which is 5 fields in total.'],
            ['q' => 'Can I enter efficiency in a different unit?', 'a' => 'Yes. Efficiency opens in milliliters and the chip beside it offers 40 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Efficiency = 0 mL.'],
        ],
        'related' => [
            ['path' => '/everyday-life/reading-speed', 'name' => 'Reading speed'],
            ['path' => '/everyday-life/reading-time', 'name' => 'Reading time'],
            ['path' => '/everyday-life/recessed-lighting', 'name' => 'Recessed lighting'],
        ],
    ],
];

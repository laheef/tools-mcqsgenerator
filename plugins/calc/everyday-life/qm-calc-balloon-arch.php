<?php

/**
 * Balloon arch
 * /everyday-life/balloon-arch
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Balloon arch',
    'meta' => ['title' => 'Balloon arch Calculator — Formula & Results', 'description' => 'Balloon arch turns height and width into arch length and number of balloons. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Balloon arch Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => 'Size of the balloon arch',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'height',
                            'label' => 'Height',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'width',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_length_1',
                            'label' => 'Arch length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_length_2',
                            'label' => 'Arch length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_length_3',
                            'label' => 'Arch length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Type of arch',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'type_select',
                            'label' => 'How packed is your arch?',
                            'type' => 'select',
                            'options' => ['Single row' => '0', 'Clustered' => '1'],
                            'dataset' => 'Type of arch',
                            'default' => 'Single row',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nume_turn',
                            'label' => 'Number of balloons in each turn',
                            'type' => 'select',
                            'options' => ['4' => '4.8', '5' => '6.3'],
                            'dataset' => 'Number per turn',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Number of balloons',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'diam',
                            'label' => 'Diameter',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n_sing_1',
                            'label' => 'Number of balloons',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n_sing_2',
                            'label' => 'Number of balloons',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n_sing_3',
                            'label' => 'Number of balloons',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n_garl_1',
                            'label' => 'Number of balloons',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n_garl_2',
                            'label' => 'Number of balloons',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n_garl_3',
                            'label' => 'Number of balloons',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Price',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pricesel',
                            'label' => 'Type',
                            'type' => 'select',
                            'options' => ['Normal balloons' => '0.1', 'Metalized balloons' => '0.3', 'Other' => ''],
                            'dataset' => 'Price per balloon',
                            'default' => 'Normal balloons',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price',
                            'label' => 'Price per balloon',
                            'type' => 'result',
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
                            'name' => 'price_garl_1',
                            'label' => 'Total price',
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
                            'name' => 'price_garl_2',
                            'label' => 'Total price',
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
                            'name' => 'price_garl_3',
                            'label' => 'Total price',
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
                            'name' => 'price_sing_1',
                            'label' => 'Total price',
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
                            'name' => 'price_sing_2',
                            'label' => 'Total price',
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
                            'name' => 'price_sing_3',
                            'label' => 'Total price',
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
            'title' => 'total_length_2=width+height',
            'results' => ['height' => 'total_length_2 - width', 'total_length_2' => 'height + width', 'width' => '-height + total_length_2'],
        ],
        [
            'title' => 'total_length_1=1.5*height + width',
            'results' => ['height' => '(2/3)*total_length_1 - 2/3*width', 'width' => '-3/2*height + total_length_1', 'total_length_1' => '(3/2)*height + width'],
        ],
        [
            'title' => 'total_length_3 = 2*height + width',
            'results' => ['height' => '(1/2)*total_length_3 - 1/2*width', 'width' => '-2*height + total_length_3', 'total_length_3' => '2*height + width'],
        ],
        [
            'title' => 'n_sing_1 = 0.87 * total_length_1/diam',
            'results' => ['diam' => '(87/100)*total_length_1/n_sing_1', 'n_sing_1' => '(87/100)*total_length_1/diam', 'total_length_1' => '(100/87)*diam*n_sing_1'],
        ],
        [
            'title' => 'n_sing_2 = 0.87 * total_length_2/diam',
            'results' => ['diam' => '(87/100)*total_length_2/n_sing_2', 'n_sing_2' => '(87/100)*total_length_2/diam', 'total_length_2' => '(100/87)*diam*n_sing_2'],
        ],
        [
            'title' => 'n_sing_3 = 0.87 * total_length_3/diam',
            'results' => ['diam' => '(87/100)*total_length_3/n_sing_3', 'n_sing_3' => '(87/100)*total_length_3/diam', 'total_length_3' => '(100/87)*diam*n_sing_3'],
        ],
        [
            'title' => 'n_garl_1=nume_turn * total_length_1/diam',
            'results' => ['diam' => 'nume_turn*total_length_1/n_garl_1', 'nume_turn' => 'diam*n_garl_1/total_length_1', 'total_length_1' => 'diam*n_garl_1/nume_turn', 'n_garl_1' => 'nume_turn*total_length_1/diam'],
        ],
        [
            'title' => 'n_garl_2=nume_turn * total_length_2/diam',
            'results' => ['diam' => 'nume_turn*total_length_2/n_garl_2', 'nume_turn' => 'diam*n_garl_2/total_length_2', 'n_garl_2' => 'nume_turn*total_length_2/diam', 'total_length_2' => 'diam*n_garl_2/nume_turn'],
        ],
        [
            'title' => 'n_garl_3=nume_turn * total_length_3/diam',
            'results' => ['diam' => 'nume_turn*total_length_3/n_garl_3', 'nume_turn' => 'diam*n_garl_3/total_length_3', 'n_garl_3' => 'nume_turn*total_length_3/diam', 'total_length_3' => 'diam*n_garl_3/nume_turn'],
        ],
        [
            'title' => 'price_sing_1=price*n_sing_1',
            'results' => ['n_sing_1' => 'price_sing_1/price', 'price_sing_1' => 'n_sing_1*price', 'price' => 'price_sing_1/n_sing_1'],
        ],
        [
            'title' => 'price_sing_2=price*n_sing_2',
            'results' => ['price_sing_2' => 'n_sing_2*price', 'n_sing_2' => 'price_sing_2/price', 'price' => 'price_sing_2/n_sing_2'],
        ],
        [
            'title' => 'price_sing_3=price*n_sing_3',
            'results' => ['price_sing_3' => 'n_sing_3*price', 'n_sing_3' => 'price_sing_3/price', 'price' => 'price_sing_3/n_sing_3'],
        ],
        [
            'title' => 'price_garl_1=price*n_garl_1',
            'results' => ['price_garl_1' => 'n_garl_1*price', 'n_garl_1' => 'price_garl_1/price', 'price' => 'price_garl_1/n_garl_1'],
        ],
        [
            'title' => 'price_garl_2=price*n_garl_2',
            'results' => ['price' => 'price_garl_2/n_garl_2', 'n_garl_2' => 'price_garl_2/price', 'price_garl_2' => 'n_garl_2*price'],
        ],
        [
            'title' => 'price_garl_3=price*n_garl_3',
            'results' => ['n_garl_3' => 'price_garl_3/price', 'price_garl_3' => 'n_garl_3*price', 'price' => 'price_garl_3/n_garl_3'],
        ],
    ],
    'article' => [
        'intro' => 'Supply the arch length, number of balloons and the total price and the Balloon arch calculator solves for <strong>height</strong>.',
        'sections' => [
            ['title' => 'How does the Balloon arch calculator work?', 'html' => <<<'TXT'
            <p>The Balloon arch calculator takes the values in the form, applies the relationship described below and reports <strong>height</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the type); then you type in the arch length (Size of the balloon arch), the arch length (Size of the balloon arch), number of balloons (Number of balloons) and the total price (Price).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in meters. </li><li>A measured quantity, entered by default in meters. </li><li>Pick the option that matches your case — 2 options, such as single row and clustered. </li><li>A plain number with no unit attached.</li><li>Pick the option that matches your case — 3 options, such as normal balloons, metalized balloons and other. </li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li></ul><p>3 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Height</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Width</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Arch length (Size of the balloon arch)</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Arch length (Size of the balloon arch)</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>You supply it</td></tr><tr><td><strong>Arch length (Size of the balloon arch)</strong></td><td>A measured quantity, 34 units available.</td><td>meters</td><td>Calculated</td></tr><tr><td><strong>Number of balloons in each turn</strong></td><td>One of 2 options, such as 4 and 5.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>Diameter</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Number of balloons (Number of balloons)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Number of balloons (Number of balloons)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Number of balloons (Number of balloons)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Number of balloons (Number of balloons)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Number of balloons (Number of balloons)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Number of balloons (Number of balloons)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Type</strong></td><td>One of 3 options, such as normal balloons, metalized balloons and other.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Price per balloon</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Total price (Price)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Total price (Price)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Total price (Price)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Total price (Price)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Total price (Price)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Total price (Price)</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Balloon arch calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Height</span><span class="formula-eq">=</span><span class="formula-rhs">arch length − width</span></div><div class="formula-row"><span class="formula-lhs">Height</span><span class="formula-eq">=</span><span class="formula-rhs">(2 ÷ 3) × arch length − 2 ÷ 3 × width</span></div><div class="formula-row"><span class="formula-lhs">Height</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 2) × arch length − 1 ÷ 2 × width</span></div><div class="formula-row"><span class="formula-lhs">Diameter</span><span class="formula-eq">=</span><span class="formula-rhs">(87 ÷ 100) × arch length ÷ number of balloons</span></div><div class="formula-row"><span class="formula-lhs">Diameter</span><span class="formula-eq">=</span><span class="formula-rhs">number of balloons in each turn × arch length ÷ number of balloons</span></div><div class="formula-row"><span class="formula-lhs">Number of balloons</span><span class="formula-eq">=</span><span class="formula-rhs">total price ÷ price per balloon</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in meters, and convertible to any of the 34 units on that chip.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>The option the calculation settles on.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Length, opening in meters</li><li>Length, opening in centimeters</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Balloon arch calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Any time the same 3 figures keep coming back — the arch length, number of balloons and the total price — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/price-per-unit">Price per unit</a>, <a href="/everyday-life/price-per-weight">Price per weight</a> and <a href="/everyday-life/pulse-per-mile">Pulse per mile</a>.</p>
            TXT],
            ['title' => 'Planning a balloon arch with realistic inputs', 'html' => <<<'TXT'
            <p>Start with the location and purpose of the arch. Measure the span the display needs to cover and decide whether it will be freestanding, attached to a frame or fixed at two ends. The calculator uses the arch length, balloon count, price and selected construction options to estimate the requested height. It is a planning estimate: the physical shape also depends on how balloons are grouped, their inflated diameter, spacing, frame flexibility and the way the arch is secured.</p>
            <p>Measure the usable length along the planned curve if you can, rather than assuming that the straight distance between endpoints is the same as the arch length. A taller, more curved arch needs more material than a shallow span with the same endpoint distance. If the calculator asks for a size in a particular unit, check the chip before entering a tape-measure reading. Mixed units can produce a result that looks plausible but is off by a predictable scale factor.</p>
            <p>Balloon counts are best treated as a supply estimate, not an exact design specification. A clustered arrangement typically uses balloons differently from a single-row design, and balloons vary in size even when sold as the same nominal diameter. Plan a few spares for popped balloons, uneven inflation and last-minute repairs. For a large installation, test a short sample section first; it shows how tightly balloons pack and whether the selected count gives the desired visual density.</p>
            <p>Use the price field consistently. If you are entering the total purchase price, include the same balloon type and quantity represented by the count rather than mixing the cost of a small pack with a full-installation quantity. Consider whether the displayed total excludes frame materials, tape, fishing line, weights, transport and labor. The calculator cannot know those costs unless they are specifically represented in the form.</p>
            <p>For outdoor displays, allow for wind, heat, direct sunlight and the surface to which the structure will be attached. A result for height does not certify that an arch is stable or safe. Use a frame and anchors rated for the setting, keep the display away from exits and walkways, and follow venue rules. Helium and air-filled arches behave differently; choose the construction method before purchasing supplies. The estimate is most useful for comparing a couple of design scenarios and checking whether the materials budget is in the right range.</p>
            <p>Before buying, record the span, intended height, balloon style, approximate count and budget separately. If one of those changes, recalculate rather than carrying forward an old estimate. That simple checklist makes the result easier to compare with a decorator’s quote and helps identify which assumption explains a difference.</p>
            TXT],
            ['title' => 'Comparing design options', 'html' => <<<'TXT'
            <p>If you are deciding between a taller arch and a wider one, run both arrangements with their own measured curve length and planned balloon count. Keep the price basis consistent in both scenarios so the comparison is meaningful. Changing the cluster style may alter how many balloons are needed for a full-looking surface, even when the frame dimensions remain fixed. A quick mock-up with a few inflated balloons can reveal spacing and color balance before you commit to the full quantity.</p><p>Store balloons away from sharp objects and extreme heat, and inflate them as close to installation time as practical. These preparation choices affect the finished display but are outside the calculator’s estimate.</p>
            TXT],
            ['title' => 'Before ordering materials', 'html' => <<<'TXT'
            <p>Draw the planned arch from the side and note where its ends will attach. The curve may need to clear a doorway, table or sign, so the calculated height should be checked against the actual space rather than chosen only for appearance. If the display crosses a public path, account for head clearance and venue guidance. A mock-up made from a flexible tape or cord can help reveal whether your measured arch length follows the intended curve.</p><p>Keep a small materials list separate from the calculator result: frame, connectors, fasteners, weights, balloon tape and replacement balloons may all affect the final budget. Comparing that list with the balloon price prevents the output from being mistaken for a complete event quote.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Balloon arch calculator work out?', 'a' => 'It returns height, derived from the arch length, number of balloons and the total price.'],
            ['q' => 'What do I need to enter to use the Balloon arch calculator?', 'a' => 'The form asks for the arch length, number of balloons and the total price, which is 7 fields in total.'],
            ['q' => 'Can I enter height in a different unit?', 'a' => 'Yes. Height opens in meters and the chip beside it offers 34 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Price per balloon = 0.'],
        ],
        'related' => [
            ['path' => '/everyday-life/price-per-unit', 'name' => 'Price per unit'],
            ['path' => '/everyday-life/price-per-weight', 'name' => 'Price per weight'],
            ['path' => '/everyday-life/pulse-per-mile', 'name' => 'Pulse per mile'],
        ],
    ],
];

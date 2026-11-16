<?php

/**
 * Weighted blanket
 * /everyday-life/weighted-blanket
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Weighted blanket',
    'meta' => ['title' => 'Weighted blanket — Formula, Steps & Examples', 'description' => 'Weighted blanket works out blanket weight from single or a couple? and your weight. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Weighted blanket Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'single_or_couple',
                            'label' => 'Single or a couple?',
                            'type' => 'select',
                            'options' => ['Single' => '0', 'Couple' => '1'],
                            'dataset' => 'single_coupleDS',
                            'default' => 'Single',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Your weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'partners_weight',
                            'label' => 'Partner\'s weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'blanket_weight',
                            'label' => 'Blanket weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'blanket_weight_couple',
                            'label' => 'Blanket weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'The percentage difference in weights is greater than 25%. It would probably be better for you to each have your own weighted blanket.'],
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
                            'name' => 'percentage_diff',
                            'label' => 'Percentage diff',
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
            'title' => 'blanket_weight = (0.1 * weight) + 0.68038856',
            'results' => ['weight' => '10*blanket_weight - 8504857/1250000', 'blanket_weight' => '(1/10)*weight + 8504857/12500000'],
        ],
        [
            'title' => 'blanket_weight_couple = 0.075 * (weight + partners_weight)',
            'results' => ['weight' => '(40/3)*blanket_weight_couple - partners_weight', 'partners_weight' => '(40/3)*blanket_weight_couple - weight', 'blanket_weight_couple' => '(3/40)*partners_weight + (3/40)*weight'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => 'The Weighted blanket calculator takes the numbers you enter and reports <strong>your weight</strong> immediately.',
        'sections' => [
            ['title' => 'How does the Weighted blanket calculator work?', 'html' => <<<'TXT'
            <p>The Weighted blanket calculator takes the values in the form, applies the relationship described below and reports <strong>your weight</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (single or a couple?); then you type in the blanket weight and the blanket weight (2).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as single and couple. </li><li>A measured quantity, entered by default in kilograms. The unit chip switches it to any of the 29 supported units.</li><li>A measured quantity, entered by default in kilograms. The unit chip switches it to any of the 29 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Single or a couple?</strong></td><td>One of 2 options, such as single and couple.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Your weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Partner's weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>Calculated</td></tr><tr><td><strong>Blanket weight</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr><tr><td><strong>Blanket weight (2)</strong></td><td>A measured quantity, 29 units available.</td><td>kilograms</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Weighted blanket calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Your weight</span><span class="formula-eq">=</span><span class="formula-rhs">10 × blanket weight − 8504857 ÷ 1250000</span></div><div class="formula-row"><span class="formula-lhs">Your weight</span><span class="formula-eq">=</span><span class="formula-rhs">(40 ÷ 3) × blanket weight − partner&#x27;s weight</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>Single or a couple?</strong> set to Single and <strong>Blanket weight</strong> = 10 kg. Working through the relationship above gives <strong>Your weight</strong> = 93.2 kg.</p><p>Read it as a template. Every number above can be replaced with one of yours; only the relationship between them is fixed.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Your weight</strong> = 93.2 kg should be roughly the size you expected from <strong>Single or a couple?</strong> set to Single and <strong>Blanket weight</strong> = 10 kg.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li><li>Shown in kilograms, and convertible to any of the 29 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Mass, opening in kilograms</li><li>Mass, opening in kilograms</li><li>Mass, opening in kilograms</li><li>Mass, opening in kilograms</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Weighted blanket calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 1 figures keep coming back — the blanket weight — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/italic-text">Italic text</a>, <a href="/everyday-life/jacket-size">Jacket size</a> and <a href="/everyday-life/jeans-size">Jeans size</a>.</p>
            TXT],
            ['title' => 'Understanding a weighted-blanket estimate', 'html' => <<<'TXT'
            <p>This calculator estimates a blanket weight from the user’s weight and, in a couple scenario, may combine the weights of two people. Its formula is a rule of thumb built into the page, not a medical prescription or a guarantee of comfort. People differ in size, strength, mobility, temperature preference and sleep needs. A blanket that feels comfortable to one person may feel too heavy or restrictive to another.</p>
            <p>Check the blanket manufacturer’s recommendations, maximum weight and size. A blanket’s total mass is only one factor: how evenly the weight is distributed, the blanket’s dimensions, fabric and fill can affect how it feels. A shared blanket may not distribute weight evenly between partners, and the calculator cannot model who is covered or how much of the surface each person uses.</p>
            <p>Be cautious if the intended user has difficulty moving or removing a covering, breathing or circulation concerns, reduced sensation, mobility limitations or another relevant health condition. The calculator does not assess medical suitability. Seek advice from a healthcare professional when there is any uncertainty, and follow the manufacturer’s safety instructions. Do not use an adult weighted blanket for an infant or a person who cannot remove it independently unless a qualified professional and the product guidance explicitly support it.</p>
            <p>For a first use, follow the manufacturer’s guidance and pay attention to comfort, ease of movement and temperature. Stop using the blanket if it causes distress, overheating, breathing difficulty or other concerning symptoms. The calculator’s numeric result should never override discomfort or a safety instruction.</p>
            <p>In a couple setup, one shared blanket is not automatically the right option for both people. Different preferences can make two individual blankets more comfortable and easier to adjust. If you compare a single-user estimate with a combined estimate, understand which formula the page applies and remember that weight alone does not determine an appropriate shared design.</p>
            <p>Use the calculation to compare a product’s stated weight with the page’s rule of thumb, then check size, care instructions and return policy. It does not establish a treatment for anxiety, insomnia or another condition, and it does not prove a health benefit. Choose based on comfort and safety, not on the number alone.</p>
            TXT],
            ['title' => 'Consider fit, cover area and ease of use', 'html' => <<<'TXT'
            <p>A blanket that feels comfortable should cover the intended area without dragging or bunching, and its weight should be distributed evenly. The same total weight can feel different in a small throw and a larger blanket because it is spread over different areas. Check the maker’s size chart, fill construction and care instructions in addition to the weight estimate.</p><p>Think about how easily the user can move, turn over and remove the blanket independently. A recommendation derived from body weight does not account for mobility, strength, temperature sensitivity or sleeping position. If someone has difficulty managing a covering, consult the manufacturer and a healthcare professional before trying a weighted product. Do not use a weighted blanket in a way that restricts breathing or movement.</p><p>For two people sharing one blanket, the total-weight formula may not predict how the fill will fall across each person. Partners can have different comfort preferences and body sizes; separate blankets may be easier to adjust. Check the product dimensions and return policy if you are unsure about a shared size.</p><p>Read the manufacturer’s cleaning and maintenance instructions. Weighted products can be heavy when wet and may not be suitable for every washer or dryer. Check the cover, stitching and fill for damage, and do not continue use if the product has shifted or become uneven. Care details influence the practical life of a blanket but are not represented in the calculator.</p><p>For a first trial, choose a product with clear instructions and a return option. Use it only as directed, and stop if it feels uncomfortable or causes overheating, anxiety or difficulty moving. The calculator’s result is a rule-of-thumb estimate, not a treatment plan for sleep, anxiety or another condition.</p><p>Comfort is personal. If the suggested weight feels too restrictive or too light, that feedback matters more than matching a formula. A healthcare professional can advise when a medical condition or safety concern is involved.</p>
            TXT],
            ['title' => 'Choose a product by its instructions, not weight alone', 'html' => <<<'TXT'
            <p>Read the product description for age or weight limits, blanket dimensions, fill type, cover material and cleaning method. A calculator does not know whether a specific blanket meets those specifications or fits the user’s bed. Check reviews for construction details only as supporting information; manufacturer guidance should control safety and care decisions.</p><p>If you are buying for someone else, ask about preferences and ensure the intended user can remove and adjust the blanket independently. A weight that matches the rule of thumb may still feel uncomfortable or too warm. Choose a retailer with clear exchange terms if a trial is appropriate.</p><p>Keep the calculator output as a comparison point. If the manufacturer’s recommendation differs, investigate the reason and follow the product’s guidance. The model’s simple percentage-based estimate is not more authoritative than the maker’s instructions or professional advice.</p>
            TXT],
            ['title' => 'Comfort and independent movement come first', 'html' => <<<'TXT'
            <p>Stop using a blanket that makes it difficult to move or remove, causes overheating or feels distressing. A numerical estimate cannot override the user’s comfort or the product’s safety instructions.</p>
            TXT],
            ['title' => 'Review the manufacturer’s age and weight limits', 'html' => <<<'TXT'
            <p>Product limits vary. Check the specific maker’s instructions for the intended user and blanket dimensions; a general percentage rule does not override a stated minimum age, maximum load or use restriction.</p>
            TXT],
            ['title' => 'Do not use the estimate as treatment advice', 'html' => <<<'TXT'
            <p>A weighted blanket calculator does not diagnose or treat a sleep, anxiety or sensory condition. Discuss therapeutic use with an appropriately qualified healthcare professional.</p>
            TXT],
            ['title' => 'Choose according to comfort', 'html' => <<<'TXT'
            <p>If the blanket is uncomfortable or difficult to manage, choose a lighter or different design rather than trying to meet the calculator’s rule of thumb.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the Weighted blanket calculator?', 'a' => 'The form asks for the blanket weight, which is 3 fields in total.'],
            ['q' => 'Can I enter your weight in a different unit?', 'a' => 'Yes. Your weight opens in kilograms and the chip beside it offers 29 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Your weight = 93.2 kg.'],
        ],
        'related' => [
            ['path' => '/everyday-life/italic-text', 'name' => 'Italic text'],
            ['path' => '/everyday-life/jacket-size', 'name' => 'Jacket size'],
            ['path' => '/everyday-life/jeans-size', 'name' => 'Jeans size'],
        ],
    ],
];

<?php

/**
 * Jeans size
 * /everyday-life/jeans-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Jeans size',
    'meta' => ['title' => 'Jeans size Calculator — Formula, Units & Example', 'description' => 'Jeans size takes sex, i am measuring: and width (w) and returns waist. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Jeans size Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/jeansSize.png'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gender',
                            'label' => 'Sex',
                            'type' => 'select',
                            'options' => ['Female' => '2', 'Male' => '1'],
                            'dataset' => 'genderDS',
                            'default' => 'Female',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'choice',
                            'label' => 'I am measuring:',
                            'type' => 'select',
                            'options' => ['Myself' => '0', ' A pair of jeans' => '1'],
                            'dataset' => 'choiceDS',
                            'default' => 'Myself',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'width',
                            'label' => 'Width (w)',
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
                            'name' => 'waist',
                            'label' => 'Waist',
                            'type' => 'number',
                            'help' => 'Waist is two times the length of width.',
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
                            'name' => 'length',
                            'label' => 'Length (L)',
                            'type' => 'number',
                            'help' => 'Inner part of your leg - from the groin to the trouser bottom.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'waist > 15 and length > 15', 'text' => <<<'TXT'
                                 Ooops, we're sorry, but we couldn't find a specific size for you. It seems that you have a very unique body shape — you'll have to try them on yourself! Double check if you're measuring the right thing: a pair of jeans or yourself.
                                TXT],
                                ['when' => 'waist <= 25 and length <= 32', 'text' => 'Your US size is: 25/32, 0, or XXS &nbsp; European size: 32 &nbsp; United Kingdom size: 4 &nbsp; Italian size: 36 &nbsp; Russian size: 38 &nbsp; Japanese size: 7'],
                                ['when' => '25 < waist <= 26 and length <= 32', 'text' => <<<'TXT'
                                Your US size is: 26/32, 2, or XS &nbsp; European size: 34 &nbsp; United Kingdom size: 6 &nbsp; Italian size: 38 &nbsp; Russian size: 38/40 &nbsp; Japanese size: 7/9
                                TXT],
                                ['when' => '26 < waist <= 27 and length <= 32', 'text' => 'Your US size is: 27/32, 4, or XS &nbsp; European size: 36 &nbsp; United Kingdom size: 8 &nbsp; Italian size: 40 &nbsp; Russian size: 40 &nbsp; Japanese size: 9'],
                                ['when' => '27 < waist <= 28 and length <= 32', 'text' => <<<'TXT'
                                Your US size is: 28/32, 6, or S &nbsp; European size: 38 &nbsp; United Kingdom size: 10 &nbsp; Italian size: 42 &nbsp; Russian size: 42/44 &nbsp; Japanese size: 9/11
                                TXT],
                                ['when' => '28 < waist <= 29 and length <= 32', 'text' => 'Your US size is: 29/32, 8, or S &nbsp; European size: 40 &nbsp; United Kingdom size: 12 &nbsp; Italian size: 44 &nbsp; Russian size: 46 &nbsp; Japanese size: 11'],
                                ['when' => '29 < waist <= 30 and length <= 32', 'text' => <<<'TXT'
                                Your US size is: 30/32, 10, or M &nbsp; European size: 42 &nbsp; United Kingdom size: 14 &nbsp; Italian size: 46 &nbsp; Russian size: 48 &nbsp; Japanese size: 11/13
                                TXT],
                                ['when' => '30 < waist <= 31 and length <= 32', 'text' => 'Your US size is: 31/32, 12, or M &nbsp; European size: 44 &nbsp; United Kingdom size: 16&nbsp; Italian size: 48 &nbsp; Russian size: 50 &nbsp; Japanese size: 13'],
                                ['when' => '31 < waist <= 32 and length <= 32', 'text' => <<<'TXT'
                                Your US size is: 32/32, 14, or L &nbsp; European size: 46 &nbsp; United Kingdom size: 18 &nbsp; Italian size: 50 &nbsp; Russian size: 54 &nbsp; Japanese size: 13/15 &nbsp;
                                TXT],
                                ['when' => '32 < waist <= 33 and length <= 32', 'text' => <<<'TXT'
                                Your US size is: 33/32, 16, or L &nbsp; European size: 48 &nbsp; United Kingdom size: 20 &nbsp; Italian size: 52 &nbsp; Russian size: 58 &nbsp; Japanese size: 13/15
                                TXT],
                                ['when' => '33 < waist <= 34 and length <= 32', 'text' => <<<'TXT'
                                Your US size is: 34/32, 18, or XL &nbsp; European size: 50 &nbsp; United Kingdom size: 22 &nbsp; Italian size: 54 &nbsp; Russian size: 60/62 &nbsp; Japanese size: 15
                                TXT],
                                ['when' => '34 < waist <= 35 and length <= 32', 'text' => <<<'TXT'
                                Your US size is: 35/32, 20, or XL &nbsp; European size: 52 &nbsp; United Kingdom size: 24 &nbsp; Italian size: 56 &nbsp; Russian size: 64 &nbsp; Japanese size: 15/17
                                TXT],
                                ['when' => '35 < waist <= 36 and length <= 34', 'text' => <<<'TXT'
                                Your US size is: 36/32, 22, or XXL &nbsp; European size: 54 &nbsp; United Kingdom size: 26 &nbsp; Italian size: 58 &nbsp; Russian size: 66/68 &nbsp; Japanese size: 17
                                TXT],
                                ['when' => '36 < waist <= 37 and length <= 34', 'text' => <<<'TXT'
                                Your US size is: 37/32, 24, or XXL &nbsp; European size: 56 &nbsp; United Kingdom size: 28 &nbsp; Italian size: 60 &nbsp; Russian size: 70 &nbsp; Japanese size: -
                                TXT],
                                ['when' => '37 < waist <= 38 and length <= 34', 'text' => <<<'TXT'
                                Your US size is: 38/32, 26, or XXXL &nbsp; European size: 58 &nbsp; United Kingdom size: 30 &nbsp; Italian size: 62 &nbsp; Russian size: - &nbsp; Japanese size: -
                                TXT],
                                ['when' => '38 < waist <= 39 and length <= 34', 'text' => <<<'TXT'
                                Your US size is: 39/32, 28, or XXXL &nbsp; European size: 60 &nbsp; United Kingdom size: 32 &nbsp; Italian size: 64 &nbsp; Russian size: - &nbsp; Japanese size: -
                                TXT],
                                ['when' => '39 < waist <= 40 and length <= 34', 'text' => <<<'TXT'
                                Your US size is: 40/32, 30, or XXXXL &nbsp; European size: 62 &nbsp; United Kingdom size: 32 &nbsp; Italian size: 66 &nbsp; Russian size: - &nbsp; Japanese size: -
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'waist > 15 and length > 15', 'text' => <<<'TXT'
                                 Ooops, we're sorry, but we couldn't find a specific size for you. It seems that you have a very unique body shape — you'll have to try them on yourself! Double check if you're measuring the right thing: a pair of jeans or yourself.
                                TXT],
                                ['when' => 'waist <= 28 and length <= 30', 'text' => 'Your US size is: 28/30, 30, or XS European size: 40 United Kingdom size: 30 Italian size: 30'],
                                ['when' => '28 < waist <= 29 and length <= 30', 'text' => 'Your US size is: 29/30, 32, or XS European size: 42 United Kingdom size: 32 Italian size: 32'],
                                ['when' => '29 < waist <= 30 and length <= 32', 'text' => 'Your US size is: 30/32, 34, or S European size: 44 United Kingdom size: 34 Italian size: 34'],
                                ['when' => '30 < waist <= 32 and length <= 32', 'text' => 'Your US size is: 32/32, 36, or S European size: 46 United Kingdom size: 36 Italian size: 46'],
                                ['when' => '32 < waist <= 33 and length <= 32', 'text' => 'Your US size is: 33/32, 38, or M European size: 48 United Kingdom size: 38 Italian size: 48'],
                                ['when' => '33 < waist <= 34 and length <= 32', 'text' => 'Your US size is: 34/32, 40, or M European size: 50 United Kingdom size: 40 Italian size: 50'],
                                ['when' => '34 < waist <= 36 and length <= 34', 'text' => 'Your US size is: 36/34, 42, or L European size: 52 United Kingdom size: 42 Italian size: 52'],
                                ['when' => '36 < waist <= 38 and length <= 34', 'text' => 'Your US size is: 38/34, 44, or L European size: 54 United Kingdom size: 44 Italian size: 54'],
                                ['when' => '38 < waist <= 40 and length <= 34', 'text' => 'Your US size is: 40/34, 46, or XL European size: 56 United Kingdom size: 46 Italian size: 56'],
                                ['when' => '40 < waist <= 42 and length <= 34', 'text' => 'Your US size is: 42/34, 48, or XL European size: 58 United Kingdom size: 48 Italian size: 58'],
                                ['when' => '42 < waist <= 44 and length <= 34', 'text' => 'Your US size is: 44/34, 50, or XXL European size: 60 United Kingdom size: 50 Italian size: 60'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => ' Remember that our tool is just a general guide; every brand and producer may use their own unique size chart.'],
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
                            'name' => 'jeansSizeOne',
                            'label' => 'Jeanssizeone',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'jeansSizeTwo',
                            'label' => 'Jeanssizetwo',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'jeansSizeOne = length',
            'results' => ['jeansSizeOne' => 'length', 'length' => 'jeansSizeOne'],
        ],
        [
            'title' => 'jeansSizeTwo = gender',
            'results' => ['gender' => 'jeansSizeTwo', 'jeansSizeTwo' => 'gender'],
        ],
        [
            'title' => 'waist = 2 * width',
            'results' => ['width' => '(1/2)*waist', 'waist' => '2*width'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => 'Give the Jeans size calculator the waist, the length and the jeanssizetwo and it returns <strong>jeanssizeone</strong>.',
        'sections' => [
            ['title' => 'How does the Jeans size calculator work?', 'html' => <<<'TXT'
            <p>The Jeans size calculator takes the values in the form, applies the relationship described below and reports <strong>jeanssizeone</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the I am measuring); then you type in the waist, the length (L) and the jeanssizetwo.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as myself and a pair of jeans. </li><li>A plain number with no unit attached.</li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Sex</strong></td><td>One of 2 options, such as female and male.</td><td>choice</td><td>Calculated</td></tr><tr><td><strong>I am measuring</strong></td><td>One of 2 options, such as myself and a pair of jeans.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Width (w)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Waist</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Length (L)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Jeanssizeone</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Jeanssizetwo</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Jeans size calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Jeanssizeone</span><span class="formula-eq">=</span><span class="formula-rhs">length (L)</span></div><div class="formula-row"><span class="formula-lhs">Sex</span><span class="formula-eq">=</span><span class="formula-rhs">jeanssizetwo</span></div><div class="formula-row"><span class="formula-lhs">Width (w)</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 2) × waist</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Take <strong>Sex</strong> set to Female, <strong>I am measuring</strong> set to Myself and <strong>Waist</strong> = 30 cm. The calculator returns <strong>Width (w)</strong> = 15 cm.</p><p>Read it as a template. Every number above can be replaced with one of yours; only the relationship between them is fixed.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Width (w)</strong> = 15 cm should be roughly the size you expected from <strong>Sex</strong> set to Female and <strong>I am measuring</strong> set to Myself.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>The option the calculation settles on.</li><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Jeans size calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Any time the same 3 figures keep coming back — the waist, the length and the jeanssizetwo — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/battery-charge-time">Battery charge time</a>, <a href="/everyday-life/bc-to-ad">BC to AD</a> and <a href="/everyday-life/beach-price-index">Beach price index</a>.</p>
            TXT],
            ['title' => 'How to measure for a jeans-size estimate', 'html' => <<<'TXT'
            <p>This calculator works with waist and length inputs and a style or gender selection to return jeans-size labels. Before entering a number, check whether the field expects a body measurement, an existing garment label or an inseam length. Jeans are often labeled with waist and inseam numbers, but brand charts can define those values differently. The label printed on a pair that fits is useful context, not necessarily the exact measurement of your body.</p>
            <p>For a waist measurement, use a flexible tape at the point where the waistband will sit. Keep it level and comfortably snug over the clothing you expect to wear, without pulling it tight. For length, check whether the form means inside-leg inseam, outside-leg length or another garment measurement. To measure inseam, compare with a well-fitting pair laid flat and use the brand’s instructions; body inseam and a garment’s finished inseam are not always the same.</p>
            <p>Jeans sizing is not standardized. A nominal waist can vary among brands, cuts and production runs, and stretch denim may feel different from rigid denim. Rise, waistband shape, seat, thigh and leg opening also affect fit. A calculator that focuses on waist and length cannot determine whether a particular cut will sit comfortably or how it will look on your body.</p>
            <p>The gender or style selector helps choose among the chart options available on the page; it does not describe every fit model a manufacturer sells. If you prefer a particular cut, use the brand’s own chart for that product and compare garment measurements where available. A size chart for a slim fit may not apply to a relaxed or high-rise style from the same maker.</p>
            <p>If buying online, check return and exchange terms before removing tags. Try jeans with the shoes and belt you expect to wear, and sit, stand and move to see whether the waistband stays comfortable. A waist that fits while standing may feel different when seated. If the result is between sizes, compare fabric stretch and fit notes rather than automatically rounding up or down.</p>
            <p>For a more reliable comparison, record the source pair, brand, cut, label, body measurements and units. Convert directly from the measurements when checking another brand instead of chaining one rounded label through multiple charts. This makes a disagreement easier to understand and reduces reliance on generic sizing assumptions.</p>
            <p>Use the result to narrow the options, then assess the actual garment. A size number is a retail label, not a measure of personal worth or body health. The calculator cannot guarantee fit, and the brand’s product chart and your comfort should guide the final choice.</p>
            TXT],
            ['title' => 'Compare garment measurements, not labels alone', 'html' => <<<'TXT'
            <p>Two pairs with the same waist label can fit differently because the waistband, rise and fabric construction differ. If a retailer publishes garment measurements, compare them with a pair you already like, laid flat and measured according to the seller’s method. Check whether the displayed waist measurement is flat across the garment or the full circumference; doubling or halving the wrong value creates a misleading comparison.</p><p>Stretch content changes how a pair behaves after wear. Rigid denim may feel snug at first and soften, while stretch denim can give during the day. This is not a reason to buy an uncomfortable size: follow the brand’s fit guidance and return policy. Consider the intended rise and whether the waistband sits at the same point as the measurement you entered.</p><p>Length labels can also be affected by the hem and the shoes worn. A finished inseam may be altered, and a cuff changes the visible length. If you plan to tailor the jeans, consider the cost and whether the cut will still fall as intended after hemming. For a wide or tapered leg, the desired hem length may depend on footwear.</p><p>When converting between labels, preserve the original body measurements and the brand. Clothing size charts are guides, not standardized specifications, and they can change between product lines. If a pair is non-returnable, ask the retailer for garment-specific measurements rather than relying only on a general size calculator.</p>
            TXT],
            ['title' => 'A final fit check for a purchase', 'html' => <<<'TXT'
            <p>Try jeans on a clean surface if you are evaluating a delivery, and keep tags attached until you decide. Check the waistband while standing and sitting, then walk and bend to see whether the rise, seat and thighs remain comfortable. The same label can feel different after a few hours, especially in fabric with stretch. Follow the brand’s instructions about washing before judging shrinkage; denim care can change dimensions.</p><p>If ordering several sizes, compare them side by side and return the pair that does not fit according to the retailer’s rules. Do not assume a size that matches the calculator will be the most comfortable option. Comfort, cut and the intended use matter more than the numerical label.</p><p>When using an existing pair as a reference, note its brand, cut, fabric and age. A stretched or altered pair may not represent a new item with the same tag. Measuring it flat can still help, but compare equivalent points on the garment and follow the seller’s diagram.</p><p>Keep the calculator’s recommendation and raw waist/length values in your notes. If the next pair comes from a different brand, start with those measurements and that brand’s chart rather than reusing a label without checking the fit system.</p>
            TXT],
            ['title' => 'Keep an eye on the garment’s care instructions', 'html' => <<<'TXT'
            <p>After trying a pair, follow the care label before washing or drying. Some fabrics can shrink or change stretch depending on the treatment, and the calculator cannot predict that change. If the fit is close, check the maker’s care guidance and return window before altering or washing the garment.</p><p>For tailoring, compare the finished inseam with the intended shoe and hem style. A small length adjustment can change how a tapered or flared leg falls, so decide on the footwear before hemming.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Jeans size calculator work out?', 'a' => 'It returns jeanssizeone, derived from the waist, the length and the jeanssizetwo.'],
            ['q' => 'What do I need to enter to use the Jeans size calculator?', 'a' => 'The form asks for the waist, the length and the jeanssizetwo, which is 4 fields in total.'],
            ['q' => 'Can I enter width (w) in a different unit?', 'a' => 'Yes. Width (w) opens in centimeters and the chip beside it offers 34 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Width (w) = 15 cm.'],
        ],
        'related' => [
            ['path' => '/everyday-life/battery-charge-time', 'name' => 'Battery charge time'],
            ['path' => '/everyday-life/bc-to-ad', 'name' => 'BC to AD'],
            ['path' => '/everyday-life/beach-price-index', 'name' => 'Beach price index'],
        ],
    ],
];

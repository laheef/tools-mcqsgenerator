<?php

/**
 * Tie length
 * /everyday-life/tie-length
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tie length',
    'meta' => ['title' => 'Tie length Calculator: Formula, Steps & Examples', 'description' => 'Tie length takes height, collar size and type of knot and returns tie. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Tie length Calculator', 'updated' => '2024-03-05'],
    'sections' => [
        [
            'title' => '',
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
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'collar',
                            'label' => 'Collar size',
                            'type' => 'select',
                            'options' => ['Small' => '-0.01', 'Average' => '0', 'Large' => '0.015', 'Extra Large' => '0.03'],
                            'dataset' => 'Collar',
                            'control' => 'DROPDOWN',
                            'help' => 'Collar size ranges from small for slender builds, average for most, large for robust figures, and extra large for those with a larger neck circumference.',
                            'default' => 'Average',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'knot',
                            'label' => 'Type of knot',
                            'type' => 'select',
                            'options' => ['Four-in-hand' => '0', 'Half-Windsor' => '0.01', 'Full-Windsor' => '0.02'],
                            'dataset' => 'Knot',
                            'help' => 'Four-in-Hand is most compact, Half-Windsor requires more length, and Full Windsor uses the most, perfect for a broad, formal look.',
                            'default' => 'Four-in-hand',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tie',
                            'label' => 'Tie',
                            'type' => 'number',
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
                                ['when' => 'tie<=1.7 and tie>1.5', 'text' => 'A short tie, roughly 55 inches, suits your frame nicely. &nbsp;'],
                                ['when' => 'tie<=1.85 and tie>1.7', 'text' => 'A standard-size tie, about 57-58 inches, is perfect for your measurements. &nbsp;'],
                                ['when' => 'tie<=2.85 and tie>1.85', 'text' => 'Your best fit is an extra-large tie, around 63 inches, for a comfortable and stylish look. &nbsp;'],
                                ['when' => 'tie<=1.5 and tie>1.2', 'text' => 'Given your stature, consider ties in children\'s sizes, which offer a better fit and style for smaller builds. '],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'height+collar+knot=tie',
            'results' => ['height' => '-collar - knot + tie', 'collar' => '-height - knot + tie', 'knot' => '-collar - height + tie', 'tie' => 'collar + height + knot'],
        ],
    ],
    'article' => [
        'intro' => 'The Tie length calculator returns <strong>height</strong> from the 3 fields on the form.',
        'sections' => [
            ['title' => 'How does the Tie length calculator work?', 'html' => <<<'TXT'
            <p>The Tie length calculator takes the values in the form, applies the relationship described below and reports <strong>height</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the collar size and the type of knot); then you type in the tie.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 4 options, such as small, average and large. </li><li>Pick the option that matches your case — 3 options, such as four-in-hand, half-Windsor and full-Windsor. </li><li>A plain number with no unit attached.</li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Height</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Collar size</strong></td><td>One of 4 options, such as small, average and large.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Type of knot</strong></td><td>One of 3 options, such as four-in-hand, half-Windsor and full-Windsor.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Tie</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Tie length calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 1 figures keep coming back — the tie — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Tie length calculator, these are the ones that matter:</p>
            <ul><li>The 2 drop-downs on this page offer a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/gas-oil-ratio">Gas oil ratio</a>, <a href="/everyday-life/gas-vs-electric-dryer">Gas vs electric dryer</a> and <a href="/everyday-life/generator-wattage">Generator wattage</a>.</p>
            TXT],
            ['title' => 'Estimating tie length from the wearer and knot', 'html' => <<<'TXT'
            <p>The Tie length calculator relates wearer height, collar size and knot allowance to an overall tie length. The displayed equation treats those measurements as parts of a simple length balance. Use consistent units for every field and check whether the form expects body height, collar size and knot length as separate inputs. Do not mix inches and centimeters or use a shirt’s labeled collar size as a body-height measurement.</p>
            <p>Measure the collar around the neck or use the shirt’s stated collar measurement, following the field definition. Height is a broad predictor of how much tie length is needed, but torso length, rise of trousers, neck position and preferred tie tip position also matter. The calculator cannot account for every body proportion or style choice.</p>
            <p>Knot size changes how much tie fabric is consumed. A compact knot uses less length than a larger, more layered knot; different tie fabrics and widths can also change the result. If you are unsure which knot allowance to enter, try the knot you plan to wear and measure the tie needed to reach the desired position. The calculator’s estimate is a starting point, not a style rule.</p>
            <p>Length preference depends on how you wear the tie. Some people want the tip near the waistband, while others prefer a slightly different position. Belt height, vest, suit style and the tie’s intended use affect the visual endpoint. Try the tie while wearing the shirt and trousers or suit you plan to use.</p>
            <p>For a purchased tie, check the maker’s stated length and whether it is a standard or extra-long model. A tie that is too long may be difficult to adjust with a chosen knot; one that is too short may not reach the preferred point. If the result falls between product sizes, consider the knot and torso proportions rather than simply rounding based on height.</p>
            <p>Record the measurement units and knot assumption with the result. A second calculation using a different knot allowance can show how sensitive the estimate is. This page helps organize the dimensions; it cannot guarantee the tie will hang exactly as intended or replace trying it on.</p>
            TXT],
            ['title' => 'How knot and clothing choices affect tie length', 'html' => <<<'TXT'
            <p>A knot uses a portion of the tie before the blade hangs down. A small four-in-hand knot and a larger Windsor-style knot consume different amounts of fabric, and thicker ties can use more length in the knot. The calculator’s knot input represents an allowance in its formula; use the value that matches the knot you plan to wear rather than treating all knots as identical.</p><p>Collar size can help describe the shirt, but it does not fully determine how much tie length is needed. Neck length, torso proportions, trouser rise and where the waistband sits affect the finished position. The height input is a broad predictor, not a bespoke fitting measure. A person with a longer torso may need a different tie length from someone of the same height.</p><p>To check a tie you already own, wear the shirt and trousers you intend to pair with it. Tie the chosen knot and observe where the tip falls. Record how much tail remains behind the blade and whether the narrow end is contained by the keeper. This practical check can help choose between standard and extra-long ties.</p><p>Formal wear conventions vary. Some prefer the blade near the belt buckle; others prefer a slightly different endpoint. The calculator does not enforce a dress code or account for a vest, high-waisted trousers, tie bar or particular jacket style. Use the result as a range and try the tie with the complete outfit.</p><p>Fabric width and interlining affect the knot’s bulk. A thick wool tie can form a larger knot than a thin silk tie using the same technique. If a tie is too short after tying, try a smaller knot or a longer tie; if too long, a larger knot or a different length may help. Do not assume a measurement error before considering those style factors.</p><p>Keep the input units and knot allowance with the estimate. A quick try-on remains the best way to confirm length. The calculator relates approximate measurements; it cannot guarantee a particular knot or style will land exactly where you want.</p>
            TXT],
            ['title' => 'Try the knot before selecting a tie', 'html' => <<<'TXT'
            <p>If possible, practice the intended knot with a tie of known length. Measure how much fabric the knot consumes and where the blade ends when the narrow end is secured. This gives a more useful reference than a generic knot label, since technique and fabric thickness can change the finished result.</p><p>For very tall wearers or a large knot, look for extra-long ties and check the product’s listed length. For a shorter wearer or compact knot, standard length may leave excess fabric. A tailor can also advise whether a tie can be altered without damaging its shape.</p><p>Use the calculator to narrow the options, then try the tie with the shirt and trousers you will wear. The desired tip position is a style preference, not a precise universal standard.</p>
            TXT],
            ['title' => 'Use the whole outfit as the final reference', 'html' => <<<'TXT'
            <p>Try the tie with the shirt collar, trousers and any vest or jacket you plan to wear. The waistband position changes where the tie tip appears, and a different knot can alter the remaining length. Use the calculator’s estimate as a starting range rather than a fixed dress rule.</p><p>Keep the knot type and measurement units with the result so you can repeat the comparison later.</p>
            TXT],
            ['title' => 'Check where the tie tip lands', 'html' => <<<'TXT'
            <p>After tying the intended knot, check that the blade reaches the point you prefer and that the narrow end is held neatly. If it does not, adjust the knot or tie length rather than assuming the wearer’s height alone explains the difference.</p><p>Try again with the same shirt and waistband position before comparing another tie.</p>
            TXT],
            ['title' => 'Compare standard and extra-long options', 'html' => <<<'TXT'
            <p>If the result is near the end of a standard tie’s range, compare the maker’s stated length for an extra-long model. The actual tied length depends on the knot and torso proportions, so the product’s dimensions and a try-on are the best confirmation.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What information affects the tie-length estimate?', 'a' => 'Enter your height, select the collar-size option and choose the knot type. The calculator uses those inputs to estimate the tie length.'],
            ['q' => 'Why does knot type matter?', 'a' => 'Different knots use different amounts of tie fabric. Choosing the knot you plan to wear helps the estimate better reflect the finished tie length.'],
            ['q' => 'Is the recommended length exact for every tie?', 'a' => 'No. Body proportions, tie construction, knot tightness and the desired tip position vary. Treat the result as a starting estimate and adjust while tying.'],
        ],
        'related' => [
            ['path' => '/everyday-life/gas-oil-ratio', 'name' => 'Gas oil ratio'],
            ['path' => '/everyday-life/gas-vs-electric-dryer', 'name' => 'Gas vs electric dryer'],
            ['path' => '/everyday-life/generator-wattage', 'name' => 'Generator wattage'],
        ],
    ],
];

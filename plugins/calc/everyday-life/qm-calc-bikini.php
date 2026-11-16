<?php

/**
 * Bikini body shape
 * /everyday-life/bikini
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bikini body shape',
    'meta' => ['title' => 'Bikini body shape: Formula, Steps & Results', 'description' => 'Bikini body shape works out body shape from bust, waist and high hip. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Bikini body shape Calculator', 'updated' => '2026-07-23'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'bikini/measurements.png'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bust',
                            'label' => 'Bust',
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
                            'name' => 'high_hip',
                            'label' => 'High hip',
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
                            'name' => 'hips',
                            'label' => 'Hips',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'body_shape == 1', 'text' => <<<'TXT'
                                Congratulations, you are an hourglass!  Your silhouette is very proportional, and we recommend wearing bikinis that accentuate your beautiful, clearly defined waist.&nbsp;
                                TXT],
                                ['when' => 'body_shape == 2', 'text' => <<<'TXT'
                                Congratulations, you are a bottom hourglass (pear)!  Your silhouette is very feminine, with the bust visibly larger than the hips. We recommend wearing bikinis that accentuate the hips and de-emphasize the upper body.&nbsp;
                                TXT],
                                ['when' => 'body_shape == 3', 'text' => <<<'TXT'
                                Congratulations, you are a top hourglass!  Your hips are visibly wider than the bust, and the waist is clearly accentuated. We recommend wearing bikinis that add volume to your upper body and keep the bottom simple.&nbsp;
                                TXT],
                                ['when' => 'body_shape == 4', 'text' => <<<'TXT'
                                Congratulations, you are a spoon!  Your hips are much wider than the bust. We recommend wearing bikinis that draw attention to the waist and de-emphasize the tummy area.&nbsp;
                                TXT],
                                ['when' => 'body_shape == 5', 'text' => <<<'TXT'
                                Congratulations, you are a triangle!  Your upper body is very slim, while the hips are ample. We recommend wearing bikinis that add volume to the upper body and show off your flat belly.&nbsp;
                                TXT],
                                ['when' => 'body_shape == 6', 'text' => <<<'TXT'
                                Congratulations, you are an inverted triangle!  You have an ample bust and slim hips. We recommend wearing bikinis with simple tops and accentuated bottoms.&nbsp;
                                TXT],
                                ['when' => 'body_shape == 7', 'text' => <<<'TXT'
                                Congratulations, you are a rectangle!  Your silhouette is proportional, but your waist is not clearly defined. We recommend wearing bikinis that are form-fitting around the waist, and add volume to the upper and lower body.
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'bikini/hourglass.png'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'body_shape',
                            'label' => 'Body shape',
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
            'title' => 'body_shape= get_body_shape(bust, hips, waist, high_hip)',
            'results' => ['body_shape' => 'get_body_shape(bust, hips, waist, high_hip)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_body_shape",function(bust,hips,waist,high_hip){if(bust-hips<=1&&hips-bust<3.6&&bust-waist>=9||hips-waist>=10){return 1}else if(hips-bust>=3.6&&hips-bust<10&&hips-waist>=9&&high_hip/waist<1.193){return 2}else if(bust-hips>1&&bust-hips<10&&bust-waist>=9){return 3}else if(hips-bust>2&&hips-waist>=7&&high_hip/waist>=1.193){return 4}else if(hips-bust>=3.6&&hips-waist<9){return 5}else if(bust-hips>=3.6&&bust-waist<9){return 6}else if(hips-bust<3.6&&bust-hips<3.6&&bust-waist<9&&hips-waist<10){return 7}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => 'Give the Bikini body shape calculator the bust, the waist, the high hip and the hips and it returns <strong>body shape</strong>.',
        'sections' => [
            ['title' => 'How does the Bikini body shape calculator work?', 'html' => <<<'TXT'
            <p>The Bikini body shape calculator takes the values in the form, applies the relationship described below and reports <strong>body shape</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the bust, the waist, the high hip and the hips.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Bust</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Waist</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>High hip</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Hips</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Body shape</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Bikini body shape calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 4 figures keep coming back — the bust, the waist and the high hip — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Bikini body shape calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — bust for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/retirement-countdown">Retirement countdown</a>, <a href="/everyday-life/reverse-text-generator">Reverse text generator</a> and <a href="/everyday-life/reverse-time">Reverse time</a>.</p>
            TXT],
            ['title' => 'Understanding a body-shape result without treating it as a standard', 'html' => <<<'TXT'
            <p>The Bikini body shape calculator compares bust, waist, high-hip and hip measurements with the categories built into its model. It returns a descriptive shape label based on those ratios. The result is a simplified classification, not a health assessment, body composition measure or instruction about what someone should wear. Many people will not fit neatly into one category, and small measurement differences can change a label near a boundary.</p>
            <p>If you choose to use it, measure each point consistently with a flexible tape and enter the units expected by the page. Bust is measured around the fullest area, waist at the point the instructions specify and hips at the widest area; high hip is a separate location closer to the waist. Keep the tape level and comfortably snug without pressing into the body. Repeating the measurements can help identify an accidental unit or placement error.</p>
            <p>Body measurements can vary with posture, breathing, clothing, time of day and ordinary body changes. A label is therefore a snapshot of the measurements entered, not a permanent description. If the result changes after a small difference, that reflects the model’s thresholds; it does not mean your body changed category in any meaningful or medical sense.</p>
            <p>Shape labels are used differently across fashion guides and are not standardized. This calculator’s categories should not be treated as a universal system or as a rule for selecting a swimsuit. Bikini fit depends on the garment’s cut, support, coverage, fabric stretch, adjustable straps and personal preference. A size chart for the specific brand and product is more useful for choosing a size than a body-shape label.</p>
            <p>Use the result only if it is helpful for a style exploration. It does not define attractiveness, health, gender or what clothing a person should wear. There is no required shape for wearing a bikini, and clothing choices belong to the wearer. If measuring feels uncomfortable, you can skip the tool and choose a swimsuit based on comfort and preference.</p>
            <p>For a clothing purchase, check the seller’s product measurements, return policy and support features. Try the garment if possible and assess comfort while moving, sitting and swimming. If the calculator output conflicts with a brand chart, follow the chart for that product and your own fitting experience.</p>
            <p>The page processes the values you supply into a label; it cannot see the person or verify the measurements. Treat the result as optional, private and approximate. It should never be used to judge someone else or to make a medical or fitness decision.</p>
            TXT],
            ['title' => 'Choosing swimwear by comfort and construction', 'html' => <<<'TXT'
            <p>Body-shape labels do not determine which swimsuit will fit well. A bikini top and bottom can be purchased separately, and brands may offer different cup coverage, band adjustments, rise and leg openings. The calculator’s shape label does not know your preferred coverage, support, activity or how a fabric behaves when wet. Use the product’s own size chart and construction details when choosing a garment.</p><p>If you measure for a brand chart, follow that brand’s instructions. Bust measurements for a swimsuit can be taken with a different level of support from an everyday garment, and waist or hip measurement locations may be specified differently. Keep the tape level and do not tighten it. If you prefer not to measure, use a size you already know works as one reference, but check the product-specific cut.</p><p>For swimming or water sports, consider how securely the garment stays in place during movement. Adjustable straps, closures and fabric stretch affect fit. A swimsuit that feels fine while standing may shift when swimming, bending or entering the water. Check the return policy, especially for hygiene-related restrictions, before ordering multiple sizes.</p><p>Shape categories are a convenience used by some fashion guides, not a universal classification. Different calculators may assign different labels from the same measurements because their thresholds differ. The output should not be treated as a diagnosis, a standard of attractiveness or a required clothing choice.</p><p>People’s bodies are not a problem to solve. If the result is unwelcome or unhelpful, ignore it and choose swimwear based on comfort, function and personal preference. No particular body type is required to wear a bikini.</p><p>This calculator does not assess health, weight, fitness, body composition or a swimsuit’s safety. For sun protection, look at the garment’s verified fabric rating separately; body-shape output says nothing about ultraviolet protection.</p>
            TXT],
            ['title' => 'Separate body-shape output from swimwear sizing', 'html' => <<<'TXT'
            <p>A body-shape category and a swimsuit size answer different questions. The calculator classifies measurements using its own thresholds; the retailer’s size chart maps measurements to a garment label. A person can receive the same shape category while needing different sizes across brands or styles. Do not use the shape output as a substitute for measuring the garment or reading its chart.</p><p>Swimwear often has adjustable components, stretch fabric and separate top and bottom sizing. Check bust or underbust guidance for the top and waist/hip guidance for the bottom where the brand provides them. A one-piece suit may need to accommodate torso length as well as circumference. The calculator’s four measurements do not model all these design details.</p><p>Try the swimsuit in the conditions that matter: move your arms, sit, bend and check that straps and closures stay secure. Fabric can behave differently when wet, and support needs vary by activity. For active swimming, choose a design intended for that use and follow its care and safety information.</p><p>Body-shape terms can carry assumptions about appearance. They are not objective judgments and should not determine whether someone wears a particular garment. If the category feels unhelpful, ignore it. Comfort, coverage, personal style and the wearer’s own preference are better guides.</p><p>Take measurements privately if that feels more comfortable. The tool cannot validate them or infer anything about health. If the result appears to change with a small measurement difference, that reflects the calculator’s category boundaries, not a meaningful assessment of the body.</p><p>Before ordering, review return policies and hygiene restrictions. A product-specific chart and a try-on are more useful than a generalized category for deciding fit. The calculator can be a style prompt, but no result is required for wearing swimwear.</p>
            TXT],
            ['title' => 'When a style category does not feel useful', 'html' => <<<'TXT'
            <p>Body-shape labels are only one way that fashion sites organize style suggestions. They do not account for personal taste, cultural preferences, accessibility needs or the way a particular swimsuit is designed. If a label feels limiting, set it aside and focus on fabric, coverage, support and comfort. You do not need to fit a category to wear a particular style.</p><p>Measurements are private information. Share them with a retailer or fitter only if you choose, and use the calculator without adding identifying details. The output cannot validate measurement accuracy and should not be used to assess health, body composition or someone else’s appearance.</p><p>For fit, check the product’s own chart, construction and return terms. The bikini calculator is an optional body-shape prompt; the wearer’s comfort and preference are the only reasons needed to choose a swimsuit.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bikini body shape calculator work out?', 'a' => 'It returns body shape, derived from the bust, the waist and the high hip.'],
            ['q' => 'What do I need to enter to use the Bikini body shape calculator?', 'a' => 'The form asks for the bust, the waist, the high hip and the hips, which is 4 fields in total.'],
            ['q' => 'Can I enter bust in a different unit?', 'a' => 'Yes. Bust opens in centimeters and the chip beside it offers 34 units.'],
        ],
        'related' => [
            ['path' => '/everyday-life/retirement-countdown', 'name' => 'Retirement countdown'],
            ['path' => '/everyday-life/reverse-text-generator', 'name' => 'Reverse text generator'],
            ['path' => '/everyday-life/reverse-time', 'name' => 'Reverse time'],
        ],
    ],
];

<?php

/**
 * Hat size
 * /everyday-life/hat-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hat size',
    'meta' => ['title' => 'Hat size Calculator — Formula, Units & Example', 'description' => 'Hat size takes my hat is meant for and head circumference and returns c. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Hat size Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'choice',
                            'label' => 'My hat is meant for',
                            'type' => 'select',
                            'options' => ['An adult' => '0', 'A child' => '1'],
                            'dataset' => 'adultOrChild',
                            'default' => 'An adult',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'head',
                            'label' => 'Head circumference',
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
                            'name' => 'c',
                            'label' => 'C',
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
                                ['when' => null, 'text' => ' International hat size:&nbsp;'],
                                ['when' => 'head<=52', 'text' => 'XS US size: 6 1/2 United Kingdom size: 6 3/8&nbsp;'],
                                ['when' => 'head >52 and head <=53', 'text' => 'XS US size: 6 5/8 United Kingdom size: 6 1/2&nbsp;'],
                                ['when' => 'head >53 and head <=54', 'text' => 'S US size: 6 3/4 United Kingdom size: 6 5/8&nbsp;'],
                                ['when' => 'head >54 and head <=55', 'text' => 'S US size: 6 7/8 United Kingdom size: 6 3/4&nbsp;'],
                                ['when' => 'head >55 and head <=56', 'text' => 'M US size: 7 United Kingdom size: 6 7/8&nbsp;'],
                                ['when' => 'head >56 and head <=57', 'text' => 'M US size: 7 1/8 United Kingdom size: 7&nbsp;'],
                                ['when' => 'head >57 and head <=58', 'text' => 'L US size: 7 1/4 United Kingdom size: 7 1/8&nbsp;'],
                                ['when' => 'head >58 and head <=59', 'text' => 'L US size: 7 3/8 United Kingdom size: 7 1/4&nbsp;'],
                                ['when' => 'head >59 and head <=60', 'text' => 'XL US size: 7 1/2 United Kingdom size: 7 3/8&nbsp;'],
                                ['when' => 'head >60 and head <=61', 'text' => 'XL US size: 7 5/8 United Kingdom size: 7 1/2&nbsp;'],
                                ['when' => 'head >61 and head <=62', 'text' => 'XXL US size: 7 3/4 United Kingdom size: 7 5/8&nbsp;'],
                                ['when' => 'head >62 and head <=63', 'text' => 'XXL US size: 8 United Kingdom size: 7 3/4&nbsp;'],
                                ['when' => 'head >63 and head <=70', 'text' => 'XXXL US size: 8 1/8 United Kingdom size: 7 7/8&nbsp;'],
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
                                ['when' => null, 'text' => 'Meant for children aged&nbsp;'],
                                ['when' => 'head <= 40', 'text' => '0 - 6 months. US size: 5 United Kingdom size: 4 7/8&nbsp;'],
                                ['when' => 'head >40 and head <=42', 'text' => '0 - 6 months. US size: 5 1/4 United Kingdom size: 5 1/8&nbsp;'],
                                ['when' => 'head >42 and head <=44', 'text' => '6 - 12 months. US size: 5 1/2 United Kingdom size: 5 3/8&nbsp;'],
                                ['when' => 'head >44 and head <=46', 'text' => '6 - 12 months. US size: 5 3/4 United Kingdom size: 5 5/8&nbsp;'],
                                ['when' => 'head >46 and head <=48', 'text' => '12 - 24 months. US size: 6 United Kingdom size: 5 7/8&nbsp;'],
                                ['when' => 'head >48 and head <=50', 'text' => '24 - 48 months. US size: 6 1/8 United Kingdom size: 6 1/4&nbsp;'],
                                ['when' => 'head >50 and head <=52', 'text' => '4 - 8 years. US size: 6 1/2 United Kingdom size: 6 3/8&nbsp;'],
                                ['when' => 'head >52 and head <=60', 'text' => '4 - 8 years. US size: 6 3/4 United Kingdom size: 6 5/8&nbsp;'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'We\'re sorry, we couldn\'t find your hat size - it seems that your head circumference is too big '],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'choice + head =c',
            'results' => ['choice' => 'c - head', 'head' => 'c - choice', 'c' => 'choice + head'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => 'The Hat size calculator returns your result from the 2 fields on the form.',
        'sections' => [
            ['title' => 'How does the Hat size calculator work?', 'html' => <<<'TXT'
            <p>The Hat size calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you type in the head circumference.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <table><caption>What you supply, field by field</caption><thead><tr><th>Field</th><th>Units and meaning</th></tr></thead><tbody><tr><td>Head circumference</td><td>a measured quantity, entered by default in centimeters. </td></tr><tr><td>C</td><td>a plain number with no unit attached.</td></tr></tbody></table><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>The option the calculation settles on.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Hat size calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 1 figures keep coming back — the head circumference — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Hat size calculator, these are the ones that matter:</p>
            <ul><li>The 1 drop-down on this page offers a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — head circumference for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/age-in-minutes">Age in minutes</a>, <a href="/everyday-life/age-in-months">Age in months</a> and <a href="/everyday-life/age-in-seconds">Age in seconds</a>.</p>
            TXT],
            ['title' => 'Measuring head circumference for a hat', 'html' => <<<'TXT'
            <p>The Hat size calculator uses a head measurement and a selected sizing convention to estimate a hat label. For circumference, place a flexible tape around the head where the hat band would normally sit—typically above the ears and across the forehead. Keep the tape level and comfortably snug without compressing the skin. Repeat the measurement and note the unit, because centimeters and inches give very different numeric values.</p>
            <p>Hat size systems vary by country and manufacturer. A numeric size, letter size and circumference measurement are related through a chart, but the chart may round differently and the fit of a particular hat depends on its crown shape and band. Check the seller’s own size guide and whether it expects head circumference, a fitted-hat size or a general small/medium/large label.</p>
            <p>Hair volume, hairstyle and the hat’s intended position can affect fit. Measure with the hairstyle or liner you expect to wear under the hat. A winter beanie, hard hat, helmet liner and structured dress hat have different fit requirements. If the product has an adjustable band, the chart may be less critical, but the crown depth and adjustment range still matter.</p>
            <p>If the measurement falls between sizes, compare the brand’s instructions and return policy. A tight hat can feel uncomfortable after extended wear, while an overly loose one may shift in wind or activity. For safety helmets, follow the manufacturer’s fit and adjustment procedures; a fashion hat-size calculator cannot verify protective fit or certification.</p>
            <p>For a child, measure the current head rather than relying only on age. Head growth varies, and the right fit should be checked against the product’s guidelines. For medical headwear or a device that must fit precisely, ask the relevant professional or manufacturer rather than relying on a general conversion chart.</p>
            <p>Record the raw circumference, unit, measurement position, selected chart and resulting label. If a hat from one brand fits well, note its model and compare the actual dimensions of a new product. The calculator narrows the size range; trying the specific hat is the final fit check.</p>
            TXT],
            ['title' => 'Choosing a hat that fits the intended use', 'html' => <<<'TXT'
            <p>Hat fit depends on more than circumference. Crown depth, brim shape, band construction and adjustability affect how a hat sits. A fitted hat may use a precise size, while a cap with a strap or elastic range can accommodate more variation. Check both circumference and the product’s stated crown dimensions if available.</p><p>Measure at the line where the hat will sit. Some hats are worn higher on the forehead; others sit lower. If you measure at a different line from the intended wear position, the result can shift. Keep hair in the style you expect under the hat, and measure over any liner you plan to wear for warmth or safety.</p><p>Size labels differ among countries and brands. A centimeter measurement may map to a fractional fitted size in one chart and a letter size in another. Retailers may round to the nearest available size or recommend sizing up or down for a specific model. Do not assume a conversion is exact across brands; use the seller’s chart for the hat you are buying.</p><p>For a child, remeasure periodically rather than selecting by age alone. For work or sport helmets, follow the manufacturer’s head measurement and adjustment procedure. A hat-size converter does not establish a protective helmet fit, and a fashion-hat size should not be substituted for a safety product’s fit instructions.</p><p>If between sizes, consider the material and adjustment. A rigid straw or felt hat may not stretch like a fabric cap, and some leather bands soften with wear. A hat that is too tight can leave pressure marks, while a loose one can move in wind. Try it on and check comfort after several minutes, not only at the first touch.</p><p>Write down the circumference, unit, measurement location and chart used. When you compare a hat you own, note its model and whether its band has been altered. The calculator’s size is a starting estimate; the actual product’s shape and adjustment range determine the fit.</p>
            TXT],
            ['title' => 'Check the fit after measuring', 'html' => <<<'TXT'
            <p>When trying a hat, make sure the band sits at the height where you measured and does not create a pressure point. Move your head and look down or turn side to side; a loose hat may shift even if its circumference seems correct. A fitted hat should feel secure without forcing the band into the forehead.</p><p>If the hat has an adjustable closure, inspect the full range and whether the adjustment sits comfortably at the back. A measurement near the edge of the range may be better served by another model. Material stretch and lining can affect fit after several minutes of wear.</p><p>For a safety helmet, follow the maker’s fit test and use only compatible liners. A correct hat size from this calculator cannot certify a hard hat or helmet as protective equipment.</p>
            TXT],
            ['title' => 'Compare the size chart for the exact hat', 'html' => <<<'TXT'
            <p>When a retailer’s chart disagrees with the calculator, check the product model and its measurement instructions. A manufacturer may use a fitted-size convention or a different rounding boundary. Follow the chart for the hat you plan to buy and retain your raw head measurement for reference.</p><p>Do not transfer a size label from a helmet, cap or hat across product types without checking the chart. Each may use different fit allowances.</p>
            TXT],
            ['title' => 'Between-size decisions depend on the hat style', 'html' => <<<'TXT'
            <p>If the measurement sits between chart entries, compare the material, crown depth and adjustment range of the exact hat. A structured felt hat may retain its shape, while a soft fabric cap can adjust more easily. Do not force a size based only on a label; try it on and check comfort over the intended hairstyle or liner.</p><p>For helmets or protective headwear, use the maker’s fitting method and do not substitute this general hat-size estimate.</p>
            TXT],
            ['title' => 'Save the measurement details', 'html' => <<<'TXT'
            <p>Record the raw circumference, unit, position and chart alongside the size label. If another retailer suggests a different size, compare its chart with the original measurement rather than converting a rounded label again.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How should I measure my head?', 'a' => 'Wrap a flexible tape around the head where the hat will sit, typically just above the eyebrows and ears, keeping it level and comfortably snug. Enter that circumference and choose the intended sizing group.'],
            ['q' => 'What does the hat-size result mean?', 'a' => 'It converts the entered circumference to the size convention represented by the calculator. Check the unit and sizing group shown before using the estimate.'],
            ['q' => 'Will this size fit every hat brand?', 'a' => 'No. Hat shapes and brand charts vary, and some styles are adjustable. Compare the measurement with the maker’s chart and account for how tightly or loosely you prefer a hat to sit.'],
        ],
        'related' => [
            ['path' => '/everyday-life/age-in-minutes', 'name' => 'Age in minutes'],
            ['path' => '/everyday-life/age-in-months', 'name' => 'Age in months'],
            ['path' => '/everyday-life/age-in-seconds', 'name' => 'Age in seconds'],
        ],
    ],
];

<?php

/**
 * Horse weight
 * /biology/horse-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Horse weight',
    'meta' => ['title' => 'Horse weight Calculator — Formula, Units & Example', 'description' => 'Horse weight turns type and Height (A) into actual weight and ideal weight. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Horse weight Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'breed' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ThvDOFCjyyVL8IS9qLHtn', 'c' => null],
                    ['v' => 'ThvDOFCjyyVL8IS9qLHtn', 'c' => 'userUsesImperialUnits()'],
                ],
                'ds' => 'mWHaXt6c4uSJ-5hd2M005',
            ],
            'estimatedIdeal' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'estimatedWeight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'girth' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'height' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'neck' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'TxAzb4N98quWJLufw4y4M',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'breed',
                                    'vt' => 'valueSelect',
                                    'l' => 'Type',
                                    'ds' => 'mWHaXt6c4uSJ-5hd2M005',
                                    'opts' => [
                                        ['ThvDOFCjyyVL8IS9qLHtn', 'Arabian', '0'],
                                        ['FZiVnsEDgoD3U4uZwE53N', 'Pony', '1'],
                                        ['agJLP7fG1FP1VX0cECQ-q', 'Stock horse', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['horse-weight/horse-weight-measurements.png'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'qjU7HQRtOnPsKk01AIKU8',
                'title' => 'Horse\'s measurements',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'height',
                                    'vt' => 'numerical',
                                    'l' => 'Height (A)',
                                    'h' => 'At the third thoracic vertebra.',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'neck',
                                    'vt' => 'numerical',
                                    'l' => 'Neck circumference (B)',
                                    'h' => 'Located halfway between the poll and the withers.',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'girth',
                                    'vt' => 'numerical',
                                    'l' => 'Girth circumference (C)',
                                    'h' => 'At the base of the mane hairs.',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'length',
                                    'vt' => 'numerical',
                                    'l' => 'Body length (D)',
                                    'h' => 'The straight line parallel to the ground from the point of the shoulder to the rear of the horse.',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'FHm8b7HC7w5zqbSPqjZNB',
                'title' => 'Result',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'estimatedWeight',
                                    'vt' => 'numerical',
                                    'l' => 'Actual weight',
                                    'h' => 'The estimation of how much the horse weighs from the four measurements you provided.',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'estimatedIdeal',
                                    'vt' => 'numerical',
                                    'l' => 'Ideal weight',
                                    'h' => 'The estimation of how much the horse should weigh based on the height and length you provided.',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        ['breed == 1 and estimatedWeight > 600', 'That\'s a huge pony!&nbsp;'],
                                        ['breed != 1 and estimatedWeight > 1000', 'That\'s a huge horse!'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'estimatedWeight = getEstimated(girth, length, height, neck, breed)',
                'var' => [
                    [
                        'l' => 'estimatedWeight',
                        'f' => 'getEstimated(girth, length, height, neck, breed)',
                        'r' => [
                            'breed',
                            'girth',
                            'height',
                            'length',
                            'neck',
                        ],
                    ],
                ],
            ],
            [
                'formula' => 'estimatedIdeal = getIdeal(length, height, breed)',
                'var' => [
                    [
                        'l' => 'estimatedIdeal',
                        'f' => 'getIdeal(length, height, breed)',
                        'r' => ['breed', 'height', 'length'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'mWHaXt6c4uSJ-5hd2M005' => [
                'name' => 'Breed',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'ThvDOFCjyyVL8IS9qLHtn', 'label' => 'Arabian', 'value' => '0'],
                    ['uid' => 'FZiVnsEDgoD3U4uZwE53N', 'label' => 'Pony', 'value' => '1'],
                    ['uid' => 'agJLP7fG1FP1VX0cECQ-q', 'label' => 'Stock horse', 'value' => '2'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";omni.define("getEstimated",function(girth,length,height,neck,breed){var divisors=[3596,3606,3441];return Math.pow(girth,1.486)*Math.pow(length,0.554)*Math.pow(height,0.599)*Math.pow(neck,0.173)/divisors[breed]});omni.define("getIdeal",function(length,height,breed){var subtract=[611,606,577];return length*2.8+height*4.2-subtract[breed]});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Horse weight takes Type, Height (A) and Neck circumference (B) and returns Actual weight and Ideal weight. The arithmetic is the whole method: actual weight is worked out from type by one formula, applied once. Actual weight comes back in kilograms unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Horse weight calculator works', 'html' => <<<'TXT'
            <p>Horse weight answers one question from 5 numbers, and the answer is Actual weight and Ideal weight.</p><p>The relationship it solves reads Actual weight = getEstimated(Girth circumference (C), Body length (D), Height (A), Neck circumference (B), Type).</p><p>The answers are Actual weight and Ideal weight; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Type</strong> — a plain number, no unit</li><li><strong>Height (A)</strong> — in centimeters. At the third thoracic vertebra.</li><li><strong>Neck circumference (B)</strong> — in centimeters. Located halfway between the poll and the withers.</li><li><strong>Girth circumference (C)</strong> — in centimeters. At the base of the mane hairs.</li><li><strong>Body length (D)</strong> — in centimeters. The straight line parallel to the ground from the point of the shoulder to the rear of the horse.</li></ul><p>What you get back is Actual weight in kilograms, Ideal weight in kilograms, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Actual weight offers 27 units and opens on kilograms, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Actual weight</strong> = <code>getEstimated(Girth circumference (C), Body length (D), Height (A), Neck circumference (B), Type)</code></li><li><strong>Ideal weight</strong> = <code>getIdeal(Body length (D), Height (A), Type)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Actual weight</strong> = <code>getEstimated(Girth circumference (C), Body length (D), Height (A), Neck circumference (B), Type)</code> — the form to use when Type, Girth circumference (C), Height (A) and Body length (D) are the values you have.</li><li><strong>Ideal weight</strong> = <code>getIdeal(Body length (D), Height (A), Type)</code> — the form to use when Type, Height (A) and Body length (D) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Actual weight and Ideal weight can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Height (A), Neck circumference (B) and Girth circumference (C) is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Actual weight and Ideal weight are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Type left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Type is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Height (A) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Height (A) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Type to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Horse weight form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Type</strong> takes a plain number with no unit attached. Change it and Actual weight and Ideal weight changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Type is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Height (A)</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. At the third thoracic vertebra. Change it and Actual weight and Ideal weight changes with it. Fill it from a measurement rather than a memory — Height (A) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Neck circumference (B)</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Located halfway between the poll and the withers. Change it and Actual weight changes with it. Fill it from a measurement rather than a memory — Neck circumference (B) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Girth circumference (C)</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. At the base of the mane hairs. Change it and Actual weight changes with it. Fill it from a measurement rather than a memory — Girth circumference (C) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Body length (D)</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. The straight line parallel to the ground from the point of the shoulder to the rear of the horse. Change it and Actual weight and Ideal weight changes with it. Fill it from a measurement rather than a memory — Body length (D) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Actual weight</strong> is a kilograms figure. It is computed from Type, Girth circumference (C), Height (A) and Body length (D), so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Ideal weight</strong> is a kilograms figure. It is computed from Type, Height (A) and Body length (D), so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Horse weight actually offers.</p><ul><li><strong>kilograms</strong> — 27 units. It opens in <em>kg</em>, and the chip also carries lb, mg, g, oz, t and ng. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>centimeters</strong> — 31 units. It opens in <em>cm</em>, and the chip also carries in, m, ft, Å, nm and pm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Actual weight follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover kilograms and centimeters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Type, Height (A) and Neck circumference (B) is what you already know and Actual weight and Ideal weight is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/tree-value">Tree value Calculator</a>, <a href="/biology/trihybrid-cross-punnett-square">Trihybrid cross Punnett square Calculator</a> and <a href="/biology/trypan-blue-cell-viability">Trypan Blue Cell Viability Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Horse weight calculator work out?', 'a' => <<<'TXT'
            Actual weight and Ideal weight, from Type, Girth circumference (C), Height (A) and Body length (D). The relationship is Actual weight = getEstimated(Girth circumference (C), Body length (D), Height (A), Neck circumference (B), Type).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Type, Height (A) (centimeters), Neck circumference (B) (centimeters), Girth circumference (C) (centimeters), Body length (D) (centimeters). Enter type, height (A) and neck circumference (B); Actual weight is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Actual weight and Ideal weight can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Actual weight is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Type blank and the page solves for it, reporting Actual weight instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Actual weight keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/tree-value', 'name' => 'Tree value Calculator'],
            ['path' => '/biology/trihybrid-cross-punnett-square', 'name' => 'Trihybrid cross Punnett square Calculator'],
            ['path' => '/biology/trypan-blue-cell-viability', 'name' => 'Trypan Blue Cell Viability Calculator'],
        ],
        'authors' => [],
    ],
];

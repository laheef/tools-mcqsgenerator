<?php

/**
 * BBQ grill size
 * /food/bbq-grill-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'BBQ grill size',
    'meta' => ['title' => 'BBQ grill size Calculator — Formula & Results', 'description' => 'Estimate the grill area needed for a gathering from guest numbers and planned food. Use as a planning guide; adjust for your guests and menu.', 'h1' => 'BBQ grill size Calculator', 'updated' => '2024-07-28'],
    'sections' => [
        [
            'title' => 'The grill you need',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'people',
                            'label' => 'No. of people',
                            'type' => 'number',
                            'suffix' => '#',
                            'help' => 'Expected number of people at the party.',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'grill_size',
                            'label' => 'Needed grill size',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'cm2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Your grill',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'grill_shape',
                            'label' => 'Shape',
                            'type' => 'select',
                            'options' => ['Round' => '0', '4-sided (rectangle/square)' => '1'],
                            'dataset' => 'grill_shapeDS',
                            'default' => '4-sided (rectangle/square)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Length',
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
                            'name' => 'width',
                            'label' => 'Width',
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
                            'name' => 'diameter',
                            'label' => 'Diameter',
                            'type' => 'number',
                            'help' => 'Diameter = 2 * Radius',
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
                            'name' => 'grill_area',
                            'label' => 'Your grill\'s size',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'cm2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Meat needed',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'meat_needed',
                            'label' => 'Amount of meet  ',
                            'type' => 'number',
                            'help' => 'Estimated amount of meat needed for the given number of people.',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'If you need more precise BBQ meat calculations, visit our omnipotent BBQ party tool.'],
                                ['when' => 'grill_size > grill_area', 'text' => ' Your grill\'s too small for the amount of people you\'re going to host!'],
                                ['when' => '(grill_area >= grill_size and grill_area <= grill_size *1.15) and grill_size > 0', 'text' => ' Your grill has the perfect size for this party! We can reserve up to 15% of extra space for the grill to be considered perfect.'],
                                ['when' => 'grill_size * 1.15 < grill_area', 'text' => ' Your grill is even bigger than it should be for the party you\'re hosting!'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'grill_area = length * width',
            'results' => ['width' => 'grill_area/length', 'length' => 'grill_area/width', 'grill_area' => 'length*width'],
        ],
        [
            'title' => 'grill_size = people * 72',
            'results' => ['people' => '(1/72)*grill_size', 'grill_size' => '72*people'],
        ],
        [
            'title' => 'meat_needed = people * 0.5 ',
            'results' => ['meat_needed' => '(1/2)*people', 'people' => '2*meat_needed'],
        ],
        [
            'title' => 'grill_area =  pi * ((diameter/2)^2)',
            'results' => ['grill_area' => '(1/4)*PI*pow(diameter, 2)', 'diameter' => '2*sqrt(grill_area)/sqrt(PI)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        BBQ grill size turns Length and Width into No. of people and Needed grill size. It is a single relationship that reads no. of people out of length, not a table of canned results keyed by them. Units for No. of people default to # and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the BBQ grill size calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind BBQ grill size: it takes 2 numbers and reports No. of people, Needed grill size and Diameter.</p><p>Written with the labels from the form, Your grill&#039;s size = Length × Width.</p><p>The result panel carries No. of people, Needed grill size, Diameter and Your grill&#039;s size, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Length</strong> — in centimeters</li><li><strong>Width</strong> — in centimeters</li></ul><p>The result boxes are No. of people in #, Needed grill size in square centimeters, Diameter in centimeters, Your grill&#039;s size in square centimeters, Amount of meet in kilograms; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Needed grill size offers 6 units and opens on square centimeters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Your grill&#039;s size</strong> = <code>Length × Width</code></li><li><strong>Width</strong> = <code>Your grill&#039;s size ÷ Length</code></li><li><strong>Length</strong> = <code>Your grill&#039;s size ÷ Width</code></li><li><strong>Needed grill size</strong> = <code>72 × No. of people</code></li><li><strong>No. of people</strong> = <code>(1 ÷ 72) × Needed grill size</code></li><li><strong>Amount of meet</strong> = <code>(1 ÷ 2) × No. of people</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Your grill&#039;s size</strong> = <code>Length × Width</code> — the form to use when Length and Width are the values you have.</li><li><strong>Width</strong> = <code>Your grill&#039;s size ÷ Length</code> — the form to use when Your grill&#039;s size and Length are the values you have.</li><li><strong>Length</strong> = <code>Your grill&#039;s size ÷ Width</code> — the form to use when Your grill&#039;s size and Width are the values you have.</li><li><strong>Needed grill size</strong> = <code>72 × No. of people</code> — the form to use when No. of people are the values you have.</li><li><strong>No. of people</strong> = <code>(1 ÷ 72) × Needed grill size</code> — the form to use when Needed grill size are the values you have.</li><li><strong>Amount of meet</strong> = <code>(1 ÷ 2) × No. of people</code> — the form to use when No. of people are the values you have.</li><li><strong>No. of people</strong> = <code>2 × Amount of meet</code> — the form to use when Amount of meet are the values you have.</li><li><strong>Your grill&#039;s size</strong> = <code>(1 ÷ 4) × PI × (Diameter)^(2)</code> — the form to use when Diameter are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Your grill&#039;s size, Width and Length can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Length and Width is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with No. of people, Needed grill size and Diameter are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Length left as a guess.</strong> If Length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Width left as a guess.</strong> If Width is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> If Length is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the BBQ grill size form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Length</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. The page reads it when it works out Width and Your grill's size. Fill it from a measurement rather than a memory — Length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Width</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. The page reads it when it works out Length and Your grill's size. Fill it from a measurement rather than a memory — Width is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>No. of people</strong> is a plain number. It is computed from Needed grill size, so it changes the moment any of them does. </li><li><strong>Needed grill size</strong> is a square centimeters figure. It is computed from No. of people, so it changes the moment any of them does. </li><li><strong>Diameter</strong> is a centimeters figure. It is computed from Your grill's size, so it changes the moment any of them does. </li><li><strong>Your grill&#039;s size</strong> is a square centimeters figure. It is computed from Length and Width, so it changes the moment any of them does. </li><li><strong>Amount of meet</strong> is a kilograms figure. It is computed from No. of people, so it changes the moment any of them does. </li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on BBQ grill size actually offers.</p><ul><li><strong>square centimeters</strong> — opens in <em>cm2</em>, and the chip also carries cm², m², in², ft² and yd². Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>centimeters</strong> — opens in <em>cm</em>, and the chip also carries cm, m, in, ft, yd and μm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>kilograms</strong> — opens in <em>kg</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> No. of people is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover square centimeters, centimeters and kilograms. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Length and Width and the number you are missing is No. of people and Needed grill size.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related calculators: <a href="/food/bbq-party">BBQ party</a>, <a href="/food/steak-cook-time">Steak cook time</a> and <a href="/food/turkey-size">Turkey size</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the BBQ grill size calculator work out?', 'a' => 'No. of people, Needed grill size, Diameter and Your grill\'s size, from Length and Width. The relationship is Your grill\'s size = Length × Width.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (centimeters), Width (centimeters). With length and width in place, No. of people can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Your grill's size, Width, Length and Needed grill size can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of No. of people is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Length blank and the page solves for it, reporting No. of people instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of No. of people keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/food/bbq-party', 'name' => 'BBQ party'],
            ['path' => '/food/steak-cook-time', 'name' => 'Steak cook time'],
            ['path' => '/food/turkey-size', 'name' => 'Turkey size']
        ],
    ],
];

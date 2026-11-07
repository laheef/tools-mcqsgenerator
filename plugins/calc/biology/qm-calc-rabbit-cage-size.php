<?php

/**
 * Rabbit cage size
 * /biology/rabbit-cage-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rabbit cage size',
    'meta' => ['title' => 'Rabbit cage size Calculator: Units & Formula', 'description' => 'Rabbit cage size works out length from rabbit size (metric) and one hop distance. Nothing is stored between visits, and the working stays on the page.', 'h1' => 'Rabbit cage size Calculator', 'updated' => '2026-08-06'],
    'sections' => [
        [
            'title' => 'Rabbit size',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rabbit_size',
                            'label' => 'Rabbit size (metric)',
                            'type' => 'select',
                            'options' => ['Small' => '1', 'Large' => '2', 'Enter custom rabbit measurements' => '0'],
                            'dataset' => ' Rabbit size',
                            'help' => 'Select the last option to enter custom rabbit measurements.',
                            'default' => 'Large',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'rabbit-cage-size_DC-3.png'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hop',
                            'label' => 'One hop distance',
                            'type' => 'result',
                            'help' => 'The length of one hop of the rabbit.',
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
                            'label' => 'Rabbit width',
                            'type' => 'result',
                            'help' => 'The fully stretched rabbit length.',
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
                            'name' => 'height',
                            'label' => 'Rabbit height',
                            'type' => 'result',
                            'help' => 'The height measured for a standing rabbit (including ears).',
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
                            'name' => 'rabbit_size_imperial',
                            'label' => 'Rabbit size',
                            'type' => 'select',
                            'options' => ['Small' => '1', 'Large' => '2', 'Enter custom rabbit measurements' => '0'],
                            'dataset' => ' Rabbit size',
                            'help' => 'Select the last option to enter custom rabbit measurements.',
                            'default' => 'Small',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hop_imperial',
                            'label' => 'One hop distance',
                            'type' => 'result',
                            'help' => 'The length of one hop of the rabbit.',
                            'unit' => '4',
                            'unit_default' => 'ft',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'width_imperial',
                            'label' => 'Rabbit width',
                            'type' => 'result',
                            'help' => 'The fully stretched rabbit length.',
                            'unit' => '4',
                            'unit_default' => 'ft',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'height_imperial',
                            'label' => 'Rabbit height',
                            'type' => 'result',
                            'help' => 'The height measured for a standing rabbit (including ears).',
                            'unit' => '4',
                            'unit_default' => 'ft',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Minimum cage dimensions for one rabbit',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rabbit_cage_length',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rabbit_cage_width',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rabbit_cage_height',
                            'label' => 'Height',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rabbit_cage_area',
                            'label' => 'Area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rabbit_cage_length_imperial',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'ft',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rabbit_cage_width_imperial',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'ft',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rabbit_cage_height_imperial',
                            'label' => 'Height',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'ft',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rabbit_cage_area_imperial',
                            'label' => 'Area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'ft2',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'rabbit_cage_area = width * hop * 3',
            'results' => ['width' => '(1/3)*rabbit_cage_area/hop', 'rabbit_cage_area' => '3*hop*width', 'hop' => '(1/3)*rabbit_cage_area/width'],
        ],
        [
            'title' => 'rabbit_cage_height = height * 1.5',
            'results' => ['height' => '(2/3)*rabbit_cage_height', 'rabbit_cage_height' => '(3/2)*height'],
        ],
        [
            'title' => 'rabbit_cage_width = width',
            'results' => ['rabbit_cage_width' => 'width', 'width' => 'rabbit_cage_width'],
        ],
        [
            'title' => 'rabbit_cage_length = hop * 3',
            'results' => ['rabbit_cage_length' => '3*hop', 'hop' => '(1/3)*rabbit_cage_length'],
        ],
        [
            'title' => 'rabbit_cage_area_imperial = width_imperial * hop_imperial * 3',
            'results' => ['rabbit_cage_area_imperial' => '3*hop_imperial*width_imperial', 'hop_imperial' => '(1/3)*rabbit_cage_area_imperial/width_imperial', 'width_imperial' => '(1/3)*rabbit_cage_area_imperial/hop_imperial'],
        ],
        [
            'title' => 'rabbit_cage_height_imperial = height_imperial * 1.5',
            'results' => ['height_imperial' => '(2/3)*rabbit_cage_height_imperial', 'rabbit_cage_height_imperial' => '(3/2)*height_imperial'],
        ],
        [
            'title' => 'rabbit_cage_width_imperial = width_imperial',
            'results' => ['width_imperial' => 'rabbit_cage_width_imperial', 'rabbit_cage_width_imperial' => 'width_imperial'],
        ],
        [
            'title' => 'rabbit_cage_length_imperial = hop_imperial * 3',
            'results' => ['rabbit_cage_length_imperial' => '3*hop_imperial', 'hop_imperial' => '(1/3)*rabbit_cage_length_imperial'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Rabbit cage size takes Rabbit size (metric), Rabbit size and Length and returns One hop distance and Rabbit width. It is a single relationship that reads one hop distance out of rabbit size (metric), not a table of canned results keyed by them. Units for One hop distance default to centimeters and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Rabbit cage size calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Rabbit cage size: it takes 10 numbers and reports One hop distance, Rabbit width and Rabbit height.</p><p>The relationship it solves reads Area = 3 × One hop distance × Rabbit width.</p><p>The result panel carries One hop distance, Rabbit width, Rabbit height and One hop distance, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 10 boxes and the page has everything it needs.</p><ul><li><strong>Rabbit size (metric)</strong> — a plain number, no unit. Select the last option to enter custom rabbit measurements.</li><li><strong>Rabbit size</strong> — a plain number, no unit. Select the last option to enter custom rabbit measurements.</li><li><strong>Length</strong> — in centimeters</li><li><strong>Width</strong> — in centimeters</li><li><strong>Height</strong> — in centimeters</li><li><strong>Area</strong> — in square meters</li><li><strong>Length</strong> — in feet</li><li><strong>Width</strong> — in feet</li><li><strong>Height</strong> — in feet</li><li><strong>Area</strong> — in square feet</li></ul><p>The answers come back as One hop distance in centimeters, Rabbit width in centimeters, Rabbit height in centimeters, One hop distance in feet, Rabbit width in feet, Rabbit height in feet. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Rabbit size (metric) = 2 and Rabbit size = 1 gives <strong>Area</strong> = 0 m2, <strong>Height</strong> = 0 cm, <strong>Width</strong> = 0 cm, <strong>Length</strong> = 0 cm, <strong>Area</strong> = 0 ft2, <strong>Height</strong> = 0 ft, <strong>Width</strong> = 0 ft and <strong>Length</strong> = 0 ft.</p><ul><li><strong>Area</strong> = 0 m2</li><li><strong>Height</strong> = 0 cm</li><li><strong>Width</strong> = 0 cm</li><li><strong>Length</strong> = 0 cm</li><li><strong>Area</strong> = 0 ft2</li><li><strong>Height</strong> = 0 ft</li><li><strong>Width</strong> = 0 ft</li><li><strong>Length</strong> = 0 ft</li></ul><p>That is <strong>Area</strong> = <code>3 × One hop distance × Rabbit width</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Area</strong> = 0, <strong>Height</strong> = 0, <strong>Width</strong> = 0, <strong>Length</strong> = 0, <strong>Area</strong> = 0, <strong>Height</strong> = 0, <strong>Width</strong> = 0 and <strong>Length</strong> = 0 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: One hop distance offers 7 units and opens on centimeters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Area</strong> = <code>3 × One hop distance × Rabbit width</code></li><li><strong>Rabbit width</strong> = <code>(1 ÷ 3) × Area ÷ One hop distance</code></li><li><strong>One hop distance</strong> = <code>(1 ÷ 3) × Area ÷ Rabbit width</code></li><li><strong>Height</strong> = <code>(3 ÷ 2) × Rabbit height</code></li><li><strong>Rabbit height</strong> = <code>(2 ÷ 3) × Height</code></li><li><strong>Width</strong> = <code>Rabbit width</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Area</strong> = <code>3 × One hop distance × Rabbit width</code> — the form to use when One hop distance and Rabbit width are the values you have.</li><li><strong>Rabbit width</strong> = <code>(1 ÷ 3) × Area ÷ One hop distance</code> — the form to use when Area and One hop distance are the values you have.</li><li><strong>One hop distance</strong> = <code>(1 ÷ 3) × Area ÷ Rabbit width</code> — the form to use when Area and Rabbit width are the values you have.</li><li><strong>Height</strong> = <code>(3 ÷ 2) × Rabbit height</code> — the form to use when Rabbit height are the values you have.</li><li><strong>Rabbit height</strong> = <code>(2 ÷ 3) × Height</code> — the form to use when Height are the values you have.</li><li><strong>Width</strong> = <code>Rabbit width</code> — the form to use when Rabbit width are the values you have.</li><li><strong>Rabbit width</strong> = <code>Width</code> — the form to use when Width are the values you have.</li><li><strong>Length</strong> = <code>3 × One hop distance</code> — the form to use when One hop distance are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Area, Rabbit width and One hop distance can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Rabbit size (metric) from 2 to 4, leaving every other box alone. The panel moves from <strong>Area</strong> 0 m2, <strong>Height</strong> 0 cm, <strong>Width</strong> 0 cm, <strong>Length</strong> 0 cm, <strong>Area</strong> 0 ft2, <strong>Height</strong> 0 ft, <strong>Width</strong> 0 ft and <strong>Length</strong> 0 ft to <strong>Area</strong> 0 m2, <strong>Height</strong> 0 cm, <strong>Width</strong> 0 cm, <strong>Length</strong> 0 cm, <strong>Area</strong> 0 ft2, <strong>Height</strong> 0 ft, <strong>Width</strong> 0 ft and <strong>Length</strong> 0 ft.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Length, Width and Height is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with One hop distance, Rabbit width and Rabbit height are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Rabbit size (metric) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Rabbit size (metric) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Rabbit size left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Rabbit size is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Rabbit size (metric) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Rabbit size (metric)</strong> takes a plain number with no unit attached. Select the last option to enter custom rabbit measurements. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Rabbit size (metric) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Rabbit size</strong> takes a plain number with no unit attached. Select the last option to enter custom rabbit measurements. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Rabbit size is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Length</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. The page reads it when it works out One hop distance. Have it to hand before you start: Length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Width</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. The page reads it when it works out Rabbit width. Have it to hand before you start: Width is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Height</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. The page reads it when it works out Rabbit height. Have it to hand before you start: Height is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Area</strong> is a square meters quantity: the page opens it in m2 and converts anything else you pick before the formula runs. The page reads it when it works out Rabbit width and One hop distance. Have it to hand before you start: Area is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Length</strong> is a feet quantity: the page opens it in ft and converts anything else you pick before the formula runs. The page reads it when it works out One hop distance. Have it to hand before you start: Length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Width</strong> is a feet quantity: the page opens it in ft and converts anything else you pick before the formula runs. The page reads it when it works out Rabbit width. Have it to hand before you start: Width is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Height</strong> is a feet quantity: the page opens it in ft and converts anything else you pick before the formula runs. The page reads it when it works out Rabbit height. Have it to hand before you start: Height is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Area</strong> is a square feet quantity: the page opens it in ft2 and converts anything else you pick before the formula runs. The page reads it when it works out One hop distance and Rabbit width. Have it to hand before you start: Area is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> One hop distance follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are centimeters and square meters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Rabbit size (metric), Rabbit size and Length are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Rabbit size (metric), Rabbit size and Length is what you already know and One hop distance and Rabbit width is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/protein-isoelectric-point">Protein Isoelectric Point Calculator</a>, <a href="/biology/protein-molar-conversions">Protein Molar Conversions Calculator</a> and <a href="/biology/protein-molecular-weight">Protein molecular weight Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rabbit cage size calculator work out?', 'a' => <<<'TXT'
            One hop distance, Rabbit width, Rabbit height and One hop distance, from One hop distance and Rabbit width. The relationship is Area = 3 × One hop distance × Rabbit width.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Rabbit size (metric), Rabbit size, Length (centimeters), Width (centimeters), Height (centimeters). With rabbit size (metric), rabbit size and length in place, One hop distance can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Area, Rabbit width, One hop distance and Height can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Area = 0 m2, Height = 0 cm, Width = 0 cm, Length = 0 cm, Area = 0 ft2, Height = 0 ft, Width = 0 ft and Length = 0 ft. That comes from the page's own defaults, entered in Rabbit size (metric); change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of One hop distance is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Rabbit size (metric) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. One hop distance keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/protein-isoelectric-point', 'name' => 'Protein Isoelectric Point Calculator'],
            ['path' => '/biology/protein-molar-conversions', 'name' => 'Protein Molar Conversions Calculator'],
            ['path' => '/biology/protein-molecular-weight', 'name' => 'Protein molecular weight Calculator'],
        ],
        'authors' => [],
    ],
];

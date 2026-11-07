<?php

/**
 * Pine straw
 * /biology/pine-straw
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pine straw',
    'meta' => ['title' => 'Pine straw Calculator: Formula, Steps & Examples', 'description' => 'Enter Length and Width into Pine straw and the answer comes back as Area and Number of bales needed. The arithmetic is the whole method: Area is worked out…', 'h1' => 'Pine straw Calculator', 'updated' => '2026-06-02'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
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
                            'name' => 'width',
                            'label' => 'Width',
                            'type' => 'number',
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
                            'name' => 'area',
                            'label' => 'Area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'ft2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalStraw',
                            'label' => 'Number of bales needed',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'We are working on the assumption that each bale covers roughly 35-40 square feet when used for a 2"-3" depth.&nbsp;'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Bales per square feet',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'balesPerSquareFeet',
                            'label' => 'Number of bales',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'area = length * width',
            'results' => ['area' => 'length*width', 'length' => 'area/width', 'width' => 'area/length'],
        ],
        [
            'title' => 'totalStraw = area/balesPerSquareFeet',
            'results' => ['area' => 'balesPerSquareFeet*totalStraw', 'balesPerSquareFeet' => 'area/totalStraw', 'totalStraw' => 'area/balesPerSquareFeet'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Length and Width into Pine straw and the answer comes back as Area and Number of bales needed. The arithmetic is the whole method: Area is worked out from Length by one formula, applied once. Area comes back in square feet unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Pine straw calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Pine straw: it takes 2 numbers and reports Area, Number of bales needed and Number of bales.</p><p>In the form&#039;s own words, Area = Length × Width.</p><p>The result panel carries Area, Number of bales needed and Number of bales, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Length</strong> — in feet</li><li><strong>Width</strong> — in feet</li></ul><p>What you get back is Area in square feet, Number of bales needed, Number of bales, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Area</strong> = <code>Length × Width</code></li><li><strong>Length</strong> = <code>Area ÷ Width</code></li><li><strong>Width</strong> = <code>Area ÷ Length</code></li><li><strong>Number of bales</strong> = <code>Area ÷ Number of bales needed</code></li><li><strong>Number of bales needed</strong> = <code>Area ÷ Number of bales</code></li></ul><p>Any one of Area, Length and Width can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Length and Width carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Area, Number of bales needed and Number of bales are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Length and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Length and Width measured, Area and Number of bales needed wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/pcr-master-mix-calculator">PCR Master Mix Calculator</a>, <a href="/biology/pcr-primer-stats">PCR Primer Stats Calculator</a> and <a href="/biology/pedigree-probability">Pedigree Probability Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pine straw calculator work out?', 'a' => 'Area, Number of bales needed and Number of bales, from Length and Width. The relationship is Area = Length × Width.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (feet), Width (feet). With length and width in place, Area can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Area, Length, Width and Number of bales blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Area is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Length blank and the page solves for it, reporting Area instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Area keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/pcr-master-mix-calculator', 'name' => 'PCR Master Mix Calculator'],
            ['path' => '/biology/pcr-primer-stats', 'name' => 'PCR Primer Stats Calculator'],
            ['path' => '/biology/pedigree-probability', 'name' => 'Pedigree Probability Calculator'],
        ],
        'authors' => [],
    ],
];

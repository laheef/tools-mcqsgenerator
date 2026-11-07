<?php

/**
 * Corn yield
 * /biology/corn-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Corn yield',
    'meta' => ['title' => 'Corn yield Calculator — Formula, Units & Example', 'description' => 'Kernels per ear, Ears in a sample, Yield per acre (bushels). Leave any of Size of the kernels, Kernels per ear, Ears in a sample and Yield per acre blank and…', 'h1' => 'Corn yield Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => '🌽 You will need the results of a 1/1000 acre sample to use this calculator. 💲 Expand the Profit section to find out your total profit!'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kpe',
                            'label' => 'Kernels per ear',
                            'type' => 'number',
                            'help' => 'The average number of kernels per ear based on your sample. A typical ear has around 800 kernels.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '800',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ears',
                            'label' => 'Ears in a sample',
                            'type' => 'number',
                            'help' => 'Number of ears of corn in a 1/1000 acre sample.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Size of the field',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'acre',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'size',
                            'label' => 'Size of the kernels',
                            'type' => 'select',
                            'options' => ['Small' => '120000', 'Medium' => '90000', 'Large' => '80000'],
                            'dataset' => 'sizeDS',
                            'default' => 'Medium',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'corn',
                            'label' => 'Yield per acre',
                            'type' => 'number',
                            'suffix' => 'bushels',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_yield',
                            'label' => 'Total yield',
                            'type' => 'number',
                            'suffix' => 'bushels',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Profit',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price',
                            'label' => 'Price per bushel',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'profit',
                            'label' => 'Profit 💵',
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
            'title' => '(kpe * ears * 1000) / (size) = corn',
            'results' => ['size' => '1000*ears*kpe/corn', 'kpe' => '(1/1000)*corn*size/ears', 'ears' => '(1/1000)*corn*size/kpe', 'corn' => '1000*ears*kpe/size'],
        ],
        [
            'title' => 'corn * area = total_yield',
            'results' => ['total_yield' => 'area*corn', 'area' => 'total_yield/corn', 'corn' => 'total_yield/area'],
        ],
        [
            'title' => 'total_yield * price = profit',
            'results' => ['price' => 'profit/total_yield', 'total_yield' => 'profit/price', 'profit' => 'price*total_yield'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Corn yield works out Size of the field and Size of the kernels from Kernels per ear, Ears in a sample and Yield per acre. The arithmetic is the whole method: Size of the field is worked out from Kernels per ear by one formula, applied once. Size of the field comes back in acres unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Corn yield calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Corn yield: it takes 3 numbers and reports Size of the field, Size of the kernels and Total yield.</p><p>Written with the labels from the form, Size of the kernels = 1000 × Ears in a sample × Kernels per ear ÷ Yield per acre.</p><p>What comes back is Size of the field, Size of the kernels, Total yield and Price per bushel — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Kernels per ear</strong> — a plain number, no unit. The average number of kernels per ear based on your sample. A typical ear has around 800 kernels.</li><li><strong>Ears in a sample</strong> — a plain number, no unit. Number of ears of corn in a 1/1000 acre sample.</li><li><strong>Yield per acre</strong> — in bushels</li></ul><p>The answers come back as Size of the field in acres, Size of the kernels, Total yield in bushels, Price per bushel in USD, Profit 💵. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Size of the kernels</strong> = <code>1000 × Ears in a sample × Kernels per ear ÷ Yield per acre</code></li><li><strong>Kernels per ear</strong> = <code>(1 ÷ 1000) × Yield per acre × Size of the kernels ÷ Ears in a sample</code></li><li><strong>Ears in a sample</strong> = <code>(1 ÷ 1000) × Yield per acre × Size of the kernels ÷ Kernels per ear</code></li><li><strong>Yield per acre</strong> = <code>1000 × Ears in a sample × Kernels per ear ÷ Size of the kernels</code></li><li><strong>Total yield</strong> = <code>Size of the field × Yield per acre</code></li><li><strong>Size of the field</strong> = <code>Total yield ÷ Yield per acre</code></li></ul><p>Any one of Size of the kernels, Kernels per ear and Ears in a sample can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Size of the field, Size of the kernels and Total yield are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Kernels per ear to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Kernels per ear, Ears in a sample and Yield per acre is what you already know and Size of the field and Size of the kernels is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/bird-age">Bird age</a>, <a href="/biology/bod-load">BOD Load Calculator</a> and <a href="/biology/bone-length-to-body-height">Bone Length to Body Height Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Corn yield calculator work out?', 'a' => <<<'TXT'
            Size of the field, Size of the kernels, Total yield and Price per bushel, from Ears in a sample, Kernels per ear and Yield per acre. The relationship is Size of the kernels = 1000 × Ears in a sample × Kernels per ear ÷ Yield per acre.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Kernels per ear, Ears in a sample, Yield per acre (bushels). Fill kpe, ears and corn and leave Size of the field empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Size of the kernels, Kernels per ear, Ears in a sample and Yield per acre blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Size of the field is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Kernels per ear left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Size of the field keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/bird-age', 'name' => 'Bird age'],
            ['path' => '/biology/bod-load', 'name' => 'BOD Load Calculator'],
            ['path' => '/biology/bone-length-to-body-height', 'name' => 'Bone Length to Body Height Calculator'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * Mushroom Yield Calculator
 * /biology/mushroom-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mushroom Yield Calculator',
    'meta' => ['title' => 'Mushroom Yield Calculator — Formula & Results', 'description' => 'Mushroom Yield works out Biological efficiency and Wet substrate weight from Fresh mushrooms harvested, Substrate dry weight and Substrate moisture.', 'h1' => 'Mushroom Yield Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'fresh',
                            'label' => 'Fresh mushrooms harvested',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '18',
                        ],
                        [
                            'name' => 'substrate',
                            'label' => 'Substrate dry weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'help' => 'Dry weight, not wet',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'moisture',
                            'label' => 'Substrate moisture',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Wet weight = dry ÷ (1 − moisture)',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '65',
                        ],
                        [
                            'name' => 'blocks',
                            'label' => 'Number of blocks',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'be',
                            'label' => 'Biological efficiency',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'wet_weight',
                            'label' => 'Wet substrate weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_block',
                            'label' => 'Yield per block',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'blocks_needed',
                            'label' => 'Blocks for a 100 kg harvest',
                            'type' => 'number',
                            'suffix' => 'blocks',
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
            'title' => 'Yield',
            'results' => ['be' => 'fresh/substrate*100', 'wet_weight' => 'substrate/(1-moisture/100)', 'per_block' => 'fresh/blocks', 'blocks_needed' => '100/(fresh/blocks)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Mushroom Yield works out Biological efficiency and Wet substrate weight from Fresh mushrooms harvested, Substrate dry weight and Substrate moisture. Nothing is looked up on this page: Biological efficiency is computed from Fresh mushrooms harvested and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Biological efficiency is opened in %; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Mushroom Yield calculator works', 'html' => <<<'TXT'
            <p>The Mushroom Yield calculator applies one relationship to 4 numbers and reports Biological efficiency, Wet substrate weight and Yield per block.</p><p>In the form&#039;s own words, Biological efficiency = Fresh mushrooms harvested ÷ Substrate dry weight × 100.</p><p>The answers are Biological efficiency, Wet substrate weight, Yield per block and Blocks for a 100 kg harvest; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Fresh mushrooms harvested</strong> — in kg</li><li><strong>Substrate dry weight</strong> — in kg. Dry weight, not wet</li><li><strong>Substrate moisture</strong> — in %. Wet weight = dry ÷ (1 − moisture)</li><li><strong>Number of blocks</strong> — a plain number, no unit</li></ul><p>The answers come back as Biological efficiency in %, Wet substrate weight in kg, Yield per block in kg, Blocks for a 100 kg harvest in blocks. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Fresh mushrooms harvested = 18 kg, Substrate dry weight = 10 kg, Substrate moisture = 65 % and Number of blocks = 10 — through the same formula and the panel reports &lt;strong&gt;Biological efficiency&lt;/strong&gt; = 180 %, &lt;strong&gt;Wet substrate weight&lt;/strong&gt; = 28.57 kg, &lt;strong&gt;Yield per block&lt;/strong&gt; = 1.8 kg and &lt;strong&gt;Blocks for a 100 kg harvest&lt;/strong&gt; = 55.56 blocks.</p><ul><li><strong>Biological efficiency</strong> = 180 %</li><li><strong>Wet substrate weight</strong> = 28.57 kg</li><li><strong>Yield per block</strong> = 1.8 kg</li><li><strong>Blocks for a 100 kg harvest</strong> = 55.56 blocks</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Biological efficiency</strong> = <code>Fresh mushrooms harvested ÷ Substrate dry weight × 100</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Biological efficiency&lt;/strong&gt; = 180, &lt;strong&gt;Wet substrate weight&lt;/strong&gt; = 28.57, &lt;strong&gt;Yield per block&lt;/strong&gt; = 1.8 and &lt;strong&gt;Blocks for a 100 kg harvest&lt;/strong&gt; = 55.56. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Biological efficiency is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Biological efficiency</strong> = <code>Fresh mushrooms harvested ÷ Substrate dry weight × 100</code></li><li><strong>Wet substrate weight</strong> = <code>Substrate dry weight ÷ (1 − Substrate moisture ÷ 100)</code></li><li><strong>Yield per block</strong> = <code>Fresh mushrooms harvested ÷ Number of blocks</code></li><li><strong>Blocks for a 100 kg harvest</strong> = <code>100 ÷ (Fresh mushrooms harvested ÷ Number of blocks)</code></li></ul><p>Any one of Biological efficiency, Wet substrate weight and Yield per block can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Fresh mushrooms harvested, from 18 to 36 — and the answers go from &lt;strong&gt;Biological efficiency&lt;/strong&gt; 180 %, &lt;strong&gt;Wet substrate weight&lt;/strong&gt; 28.57 kg, &lt;strong&gt;Yield per block&lt;/strong&gt; 1.8 kg and &lt;strong&gt;Blocks for a 100 kg harvest&lt;/strong&gt; 55.56 blocks to &lt;strong&gt;Biological efficiency&lt;/strong&gt; 360 %, &lt;strong&gt;Wet substrate weight&lt;/strong&gt; 28.57 kg, &lt;strong&gt;Yield per block&lt;/strong&gt; 3.6 kg and &lt;strong&gt;Blocks for a 100 kg harvest&lt;/strong&gt; 27.78 blocks.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Biological efficiency, Wet substrate weight and Yield per block are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Fresh mushrooms harvested to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Fresh mushrooms harvested, Substrate dry weight and Substrate moisture and the number you are missing is Biological efficiency and Wet substrate weight.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/mic-zone-of-inhibition">MIC and Zone of Inhibition Calculator</a>, <a href="/biology/microscope-field-of-view">Microscope Field of View Calculator</a> and <a href="/biology/microscope-magnification">Microscope Magnification Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mushroom Yield calculator work out?', 'a' => <<<'TXT'
            Biological efficiency, Wet substrate weight, Yield per block and Blocks for a 100 kg harvest, from Fresh mushrooms harvested and Substrate dry weight. The relationship is Biological efficiency = Fresh mushrooms harvested ÷ Substrate dry weight × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Fresh mushrooms harvested (kg), Substrate dry weight (kg), Substrate moisture (%), Number of blocks. Enter fresh, substrate and moisture; Biological efficiency is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Biological efficiency, Wet substrate weight, Yield per block and Blocks for a 100 kg harvest blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Biological efficiency = 180 %, Wet substrate weight = 28.57 kg, Yield per block = 1.8 kg and Blocks for a 100 kg harvest = 55.56 blocks. Those are the defaults written into the form — move Fresh mushrooms harvested and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Biological efficiency is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Fresh mushrooms harvested left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Biological efficiency keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/mic-zone-of-inhibition', 'name' => 'MIC and Zone of Inhibition Calculator'],
            ['path' => '/biology/microscope-field-of-view', 'name' => 'Microscope Field of View Calculator'],
            ['path' => '/biology/microscope-magnification', 'name' => 'Microscope Magnification Calculator'],
        ],
        'authors' => [],
    ],
];

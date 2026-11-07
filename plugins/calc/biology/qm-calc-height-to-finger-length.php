<?php

/**
 * Height to Finger Length Calculator
 * /biology/height-to-finger-length
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Height to Finger Length Calculator',
    'meta' => ['title' => 'Height to Finger Length Calculator — Biology', 'description' => 'Enter Standing height, Measured finger length and Which finger into Height to Finger Length and the answer comes back as Expected hand length and Expected…', 'h1' => 'Height to Finger Length Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'height',
                            'label' => 'Standing height',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Without shoes',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '175',
                        ],
                        [
                            'name' => 'finger',
                            'label' => 'Measured finger length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Base of the finger to the tip, on the palm side',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7.5',
                        ],
                        [
                            'name' => 'which',
                            'label' => 'Which finger',
                            'type' => 'select',
                            'options' => ['Index' => '1', 'Ring' => '2', 'Middle' => '3'],
                            'default' => 'Index',
                        ],
                        [
                            'name' => 'expected_hand',
                            'label' => 'Expected hand length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'expected_finger',
                            'label' => 'Expected finger length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'difference',
                            'label' => 'Your finger minus the expectation',
                            'type' => 'number',
                            'suffix' => 'cm',
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
            'title' => 'Hand and finger',
            'results' => ['expected_hand' => 'height*0.108', 'expected_finger' => 'if_else(which==1, height*0.108*0.42, if_else(which==2, height*0.108*0.44, height*0.108*0.48))', 'difference' => 'finger-expected_finger'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Standing height, Measured finger length and Which finger into Height to Finger Length and the answer comes back as Expected hand length and Expected finger length. There is no hidden constant here: change Expected hand length and Standing height moves with it. The main result, Expected hand length, is reported in cm.
        TXT,
        'sections' => [
            ['title' => 'How the Height to Finger Length calculator works', 'html' => <<<'TXT'
            <p>Height to Finger Length answers one question from 3 numbers, and the answer is Expected hand length, Expected finger length and Your finger minus the expectation.</p><p>In the form&#039;s own words, Expected hand length = Standing height × 0.108.</p><p>The result panel carries Expected hand length, Expected finger length and Your finger minus the expectation, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Standing height</strong> — in cm. Without shoes</li><li><strong>Measured finger length</strong> — in cm. Base of the finger to the tip, on the palm side</li><li><strong>Which finger</strong> — a plain number, no unit</li></ul><p>The result boxes are Expected hand length in cm, Expected finger length in cm, Your finger minus the expectation in cm; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Standing height = 175 cm, Measured finger length = 7.5 cm and Which finger = 1 gives &lt;strong&gt;Expected hand length&lt;/strong&gt; = 18.9 cm, &lt;strong&gt;Expected finger length&lt;/strong&gt; = 7.94 cm and &lt;strong&gt;Your finger minus the expectation&lt;/strong&gt; = -0.438 cm.</p><ul><li><strong>Expected hand length</strong> = 18.9 cm</li><li><strong>Expected finger length</strong> = 7.94 cm</li><li><strong>Your finger minus the expectation</strong> = -0.438 cm</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Expected hand length</strong> = <code>Standing height × 0.108</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Expected hand length&lt;/strong&gt; = 18.9, &lt;strong&gt;Expected finger length&lt;/strong&gt; = 7.94 and &lt;strong&gt;Your finger minus the expectation&lt;/strong&gt; = -0.438. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Expected hand length is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Expected hand length</strong> = <code>Standing height × 0.108</code></li><li><strong>Expected finger length</strong> = <code>if_else(Which finger==1, Standing height × 0.108 × 0.42, if_else(Which finger==2, Standing height × 0.108 × 0.44, Standing height × 0.108 × 0.48))</code></li><li><strong>Your finger minus the expectation</strong> = <code>Measured finger length − Expected finger length</code></li></ul><p>Any one of Expected hand length, Expected finger length and Your finger minus the expectation can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Standing height from 175 to 350, leaving every other box alone. The panel moves from &lt;strong&gt;Expected hand length&lt;/strong&gt; 18.9 cm, &lt;strong&gt;Expected finger length&lt;/strong&gt; 7.94 cm and &lt;strong&gt;Your finger minus the expectation&lt;/strong&gt; -0.438 cm to &lt;strong&gt;Expected hand length&lt;/strong&gt; 37.8 cm, &lt;strong&gt;Expected finger length&lt;/strong&gt; 15.88 cm and &lt;strong&gt;Your finger minus the expectation&lt;/strong&gt; -8.38 cm.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Expected hand length, Expected finger length and Your finger minus the expectation are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Standing height and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Standing height, Measured finger length and Which finger measured, Expected hand length and Expected finger length wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/bird-age">Bird age</a>, <a href="/biology/bod-load">BOD Load Calculator</a> and <a href="/biology/bone-length-to-body-height">Bone Length to Body Height Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Height to Finger Length calculator work out?', 'a' => <<<'TXT'
            Expected hand length, Expected finger length and Your finger minus the expectation, from Standing height. The relationship is Expected hand length = Standing height × 0.108.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Standing height (cm), Measured finger length (cm), Which finger. With height, finger and which in place, Expected hand length can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Expected hand length, Expected finger length and Your finger minus the expectation blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Expected hand length = 18.9 cm, Expected finger length = 7.94 cm and Your finger minus the expectation = -0.438 cm. The figures come from Standing height as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Expected hand length is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Standing height left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Expected hand length keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/bird-age', 'name' => 'Bird age'],
            ['path' => '/biology/bod-load', 'name' => 'BOD Load Calculator'],
            ['path' => '/biology/bone-length-to-body-height', 'name' => 'Bone Length to Body Height Calculator'],
        ],
        'authors' => [],
    ],
];

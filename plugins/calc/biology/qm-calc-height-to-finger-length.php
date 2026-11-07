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
    'meta' => ['title' => 'Height to Finger Length Calculator — Biology', 'description' => <<<'TXT'
    Hand length is roughly 10.8% of standing height, and fingers are fixed fractions of the hand. It returns expected hand length, expected finger length and your…
    TXT, 'h1' => 'Height to Finger Length Calculator', 'updated' => '2026-10-29'],
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
        Hand length is roughly 10.8% of standing height, and fingers are fixed fractions of the hand. It returns expected hand length, expected finger length and your finger minus the expectation, and the panel shows all of them at once.
        
        Enter your height and a finger length to see how the two compare, or estimate the expected finger length from height alone.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Height to Finger Length', 'html' => <<<'TXT'
            <p>Hand length ≈ 0.108 × height; index finger ≈ 0.42 × hand length, ring finger ≈ 0.44, middle finger ≈ 0.48</p>
            <figure class="calc-figure"><img src="/uploads/biology/height-to-finger-length.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Height to Finger Length Calculator — Height sets the expected hand, the hand sets the expected finger, and your measurement is compared with it." title="Height to Finger Length Calculator"><figcaption>Height sets the expected hand, the hand sets the expected finger, and your measurement is compared with it.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>height</code></td><td>standing height without shoes</td><td>cm</td></tr><tr><td><code>hand length</code></td><td>wrist crease to the tip of the middle finger</td><td>cm</td></tr><tr><td><code>finger length</code></td><td>base to tip on the palmar side</td><td>cm</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> Hand-to-stature proportion of 10.8% is the figure used in anthropometric tables (Pheasant & Haslegrave, Bodyspace).</p>
            TXT],
            ['title' => 'How do I use the Height to Finger Length?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: standing height of <strong>175</strong> cm, measured finger length of <strong>7.5</strong> cm, which finger set to <strong>1.0</strong>.</p>
            <p>Substituting them into the formula gives expected hand length of <strong>18.9</strong> cm, expected finger length of <strong>7.94</strong> cm, your finger minus the expectation of <strong>-0.438</strong> cm.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>The fractions are averages: the standard deviation around them is about 0.4 cm, so a difference of a few millimetres means nothing.</p></li><li><p>Digit ratio (index length ÷ ring length) is a separate measure and is not reproduced by this scaling — the two fingers move together with height.</p></li><li><p>If the difference is more than about 1.5 cm, re-measure before drawing conclusions: the base of the finger is easy to place wrongly by a centimetre.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Measuring the finger from the knuckle of the hand rather than the crease at the base of the digit.</li><li>Measuring on the back of the hand, where the knuckle adds a centimetre.</li><li>Using height in inches with a finger length in centimetres.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>Most real jobs need two or three of these together:</p><p><a href="/biology/bone-length-to-body-height">Bone length to body height</a>. <a href="/biology/femur-to-foot-ratio">Femur to foot ratio</a>. <a href="/biology/cephalic-index">Cephalic index</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Can finger length predict how tall someone will be?', 'a' => <<<'TXT'
            Only weakly. Hand and finger lengths correlate with height at about 0.7, which is good enough to flag a measurement error and not good enough to replace a stadiometer.
            TXT],
            ['q' => 'What does the Height to Finger Length actually calculate?', 'a' => <<<'TXT'
            It returns expected hand length, expected finger length and your finger minus the expectation. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
            ['q' => 'Does it work in both directions?', 'a' => <<<'TXT'
            Where the maths allows it, yes: the page states which values it solves for and which you supply. A field marked as a result is always computed, never typed into.
            TXT],
        ],
        'related' => [],
    ],
];

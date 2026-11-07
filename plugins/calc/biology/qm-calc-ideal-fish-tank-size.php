<?php

/**
 * Ideal Fish Tank Size Calculator
 * /biology/ideal-fish-tank-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Ideal Fish Tank Size Calculator',
    'meta' => ['title' => 'Ideal Fish Tank Size Calculator — Formula & Results', 'description' => <<<'TXT'
    The right tank is set by the largest adult fish, because a fish needs a length to swim and a volume for its waste. It returns recommended volume, minimum tank…
    TXT, 'h1' => 'Ideal Fish Tank Size Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'fish_length',
                            'label' => 'Adult length of the largest fish',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'school',
                            'label' => 'Number in the school',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'temperament',
                            'label' => 'Temperament',
                            'type' => 'select',
                            'options' => ['Peaceful community' => '1', 'Semi-aggressive' => '1.4', 'Territorial' => '1.8'],
                            'default' => 'Peaceful community',
                        ],
                        [
                            'name' => 'min_volume',
                            'label' => 'Recommended volume',
                            'type' => 'number',
                            'suffix' => 'L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'min_length',
                            'label' => 'Minimum tank length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'min_depth',
                            'label' => 'Minimum tank depth',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gallons',
                            'label' => 'Recommended volume',
                            'type' => 'number',
                            'suffix' => 'US gal',
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
            'title' => 'Sizing',
            'results' => ['min_volume' => 'max(20,fish_length*fish_length*school*0.6*temperament/10+fish_length*school)', 'min_length' => 'max(45,fish_length*8)', 'min_depth' => 'max(30,fish_length*3)', 'gallons' => 'max(20,fish_length*fish_length*school*0.6*temperament/10+fish_length*school)/3.785'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The right tank is set by the largest adult fish, because a fish needs a length to swim and a volume for its waste. It returns recommended volume, minimum tank length, minimum tank depth and recommended volume, and the panel shows all of them at once.
        
        This calculator turns your species list into a recommended volume, footprint and minimum dimension, and flags when the plan is too small.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Ideal Fish Tank Size', 'html' => <<<'TXT'
            <p>Minimum length = 8 × adult body length; minimum depth = 3 × body length; volume grows with the square of length times the school size</p>
            <figure class="calc-figure"><img src="/uploads/biology/ideal-fish-tank-size.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Ideal Fish Tank Size Calculator — Eight lengths long, three deep — the swimming rule." title="Ideal Fish Tank Size Calculator"><figcaption>Eight lengths long, three deep — the swimming rule.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>L</code></td><td>adult body length of the largest fish</td><td>cm</td></tr><tr><td><code>n</code></td><td>number of fish in the school</td><td>fish</td></tr><tr><td><code>temperament</code></td><td>multiplier for aggression</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Ideal Fish Tank Size?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: adult length of the largest fish of <strong>12</strong> cm, number in the school of <strong>6</strong>, temperament set to <strong>1.0</strong>.</p>
            <p>Substituting them into the formula gives recommended volume of <strong>123.84</strong> L, minimum tank length of <strong>96</strong> cm, minimum tank depth of <strong>36</strong> cm, recommended volume of <strong>32.72</strong> US gal.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>8 × body length</td><td><strong>Minimum tank length</strong></td><td>three body lengths to accelerate, five to cruise, eight to feel safe</td></tr><tr><td>3 × body length</td><td><strong>Minimum depth</strong></td><td>room to turn without touching the glass</td></tr><tr><td>6 × body length</td><td><strong>Comfortable</strong></td><td>what a permanent home should really be</td></tr></tbody></table>
            <ul><li><p>Swimming length matters more than volume for active species: a 30 cm fish needs a tank at least 240 cm long, whatever the litres say.</p></li><li><p>Territorial species need footprint, not depth. A tall narrow tank gives litres without giving the territory a cichlid actually defends.</p></li><li><p>Volume scales with the cube of linear size, so doubling a fish's length multiplies its waste output by about eight.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Buying by litres alone and ending up with a tall, short tank.</li><li>Sizing for juveniles and then discovering the fish triples in length.</li><li>Ignoring the school size: many 'peaceful' species are only peaceful in groups.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What size tank does a 12 cm fish need?', 'a' => 'At least 96 cm long and 36 cm deep, which in practice means a 120 cm tank.'],
            ['q' => 'Do goldfish need a big tank?', 'a' => 'Yes — they reach 25–30 cm, so 120 cm and 200 L or more, not the bowl they are sold with.'],
            ['q' => 'What does the Ideal Fish Tank Size actually calculate?', 'a' => <<<'TXT'
            It returns recommended volume, minimum tank length, minimum tank depth and recommended volume. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
        ],
        'related' => [],
    ],
];

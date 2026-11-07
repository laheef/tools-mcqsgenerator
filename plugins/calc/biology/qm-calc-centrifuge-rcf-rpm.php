<?php

/**
 * Centrifuge RCF to RPM Converter
 * /biology/centrifuge-rcf-rpm
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Centrifuge RCF to RPM Converter',
    'meta' => ['title' => 'Centrifuge RCF to RPM Converter — Formula & Results', 'description' => 'Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally…', 'h1' => 'Centrifuge RCF to RPM Converter', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'radius',
                            'label' => 'Rotor radius',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Measure to the bottom of the tube, not the top',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8.5',
                        ],
                        [
                            'name' => 'rpm',
                            'label' => 'Speed',
                            'type' => 'number',
                            'suffix' => 'rpm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4000',
                        ],
                        [
                            'name' => 'rcf',
                            'label' => 'Relative centrifugal force',
                            'type' => 'number',
                            'suffix' => '× g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rpm_needed',
                            'label' => 'Speed for 10 000 × g',
                            'type' => 'number',
                            'suffix' => 'rpm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_minute',
                            'label' => 'Distance travelled per minute',
                            'type' => 'number',
                            'suffix' => 'km',
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
            'title' => 'Centrifuge',
            'results' => ['rcf' => '1.118*pow(10,-5)*radius*rpm*rpm', 'rpm_needed' => 'sqrt(10000/(1.118*pow(10,-5)*radius))', 'per_minute' => '2*pi*radius/100000*rpm'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Centrifuge RCF to RPM takes Rotor radius and Speed and returns Relative centrifugal force and Speed for 10 000 × g. Nothing is looked up on this page: Relative centrifugal force is computed from Rotor radius and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Relative centrifugal force is opened in × g; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Centrifuge RCF to RPM calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Centrifuge RCF to RPM: it takes 2 numbers and reports Relative centrifugal force, Speed for 10 000 × g and Distance travelled per minute.</p><p>In the form&#039;s own words, Relative centrifugal force = 1.118 × (10)^(− 5) × Rotor radius × Speed × Speed.</p><p>The result panel carries Relative centrifugal force, Speed for 10 000 × g and Distance travelled per minute, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Rotor radius</strong> — in cm. Measure to the bottom of the tube, not the top</li><li><strong>Speed</strong> — in rpm</li></ul><p>The answers come back as Relative centrifugal force in × g, Speed for 10 000 × g in rpm, Distance travelled per minute in km. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Rotor radius = 8.5 cm and Speed = 4000 rpm — through the same formula and the panel reports &lt;strong&gt;Relative centrifugal force&lt;/strong&gt; = 1520 × g, &lt;strong&gt;Speed for 10 000 × g&lt;/strong&gt; = 10258 rpm and &lt;strong&gt;Distance travelled per minute&lt;/strong&gt; = 2.14 km.</p><ul><li><strong>Relative centrifugal force</strong> = 1520 × g</li><li><strong>Speed for 10 000 × g</strong> = 10258 rpm</li><li><strong>Distance travelled per minute</strong> = 2.14 km</li></ul><p>That is <strong>Relative centrifugal force</strong> = <code>1.118 × (10)^(− 5) × Rotor radius × Speed × Speed</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Relative centrifugal force&lt;/strong&gt; = 1520, &lt;strong&gt;Speed for 10 000 × g&lt;/strong&gt; = 10258 and &lt;strong&gt;Distance travelled per minute&lt;/strong&gt; = 2.14 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Relative centrifugal force takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Relative centrifugal force</strong> = <code>1.118 × (10)^(− 5) × Rotor radius × Speed × Speed</code></li><li><strong>Speed for 10 000 × g</strong> = <code>√(10000 ÷ (1.118 × (10)^(− 5) × Rotor radius))</code></li><li><strong>Distance travelled per minute</strong> = <code>2 × pi × Rotor radius ÷ 100000 × Speed</code></li></ul><p>Any one of Relative centrifugal force, Speed for 10 000 × g and Distance travelled per minute can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Rotor radius, from 8.5 to 17 — and the answers go from &lt;strong&gt;Relative centrifugal force&lt;/strong&gt; 1520 × g, &lt;strong&gt;Speed for 10 000 × g&lt;/strong&gt; 10258 rpm and &lt;strong&gt;Distance travelled per minute&lt;/strong&gt; 2.14 km to &lt;strong&gt;Relative centrifugal force&lt;/strong&gt; 3041 × g, &lt;strong&gt;Speed for 10 000 × g&lt;/strong&gt; 7254 rpm and &lt;strong&gt;Distance travelled per minute&lt;/strong&gt; 4.27 km.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Relative centrifugal force, Speed for 10 000 × g and Distance travelled per minute are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Rotor radius to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Rotor radius and Speed is what you already know and Relative centrifugal force and Speed for 10 000 × g is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dog-life-expectancy">Dog life expectancy Calculator</a>, <a href="/biology/dog-metacam">Dog Metacam dosage</a> and <a href="/biology/dog-onion-toxicity">Dog onion toxicity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Centrifuge RCF to RPM calculator work out?', 'a' => <<<'TXT'
            Relative centrifugal force, Speed for 10 000 × g and Distance travelled per minute, from Rotor radius and Speed. The relationship is Relative centrifugal force = 1.118 × (10)^(− 5) × Rotor radius × Speed × Speed.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Rotor radius (cm), Speed (rpm). Enter radius and rpm; Relative centrifugal force is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Relative centrifugal force, Speed for 10 000 × g and Distance travelled per minute blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Relative centrifugal force = 1520 × g, Speed for 10 000 × g = 10258 rpm and Distance travelled per minute = 2.14 km. That comes from the page's own defaults, entered in Rotor radius; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Relative centrifugal force is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Rotor radius left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Relative centrifugal force keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dog-life-expectancy', 'name' => 'Dog life expectancy Calculator'],
            ['path' => '/biology/dog-metacam', 'name' => 'Dog Metacam dosage'],
            ['path' => '/biology/dog-onion-toxicity', 'name' => 'Dog onion toxicity'],
        ],
        'authors' => [],
    ],
];

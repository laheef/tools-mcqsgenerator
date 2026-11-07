<?php

/**
 * Encounter Rate Calculator
 * /biology/encounter-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Encounter Rate Calculator',
    'meta' => ['title' => 'Encounter Rate Calculator — Formula & Results', 'description' => 'Encounter Rate works out Encounters per hour and Encounters per km from Encounters recorded, Search time and Distance travelled. It is a single relationship…', 'h1' => 'Encounter Rate Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'encounters',
                            'label' => 'Encounters recorded',
                            'type' => 'number',
                            'suffix' => 'events',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '48',
                        ],
                        [
                            'name' => 'time',
                            'label' => 'Search time',
                            'type' => 'number',
                            'suffix' => 'hours',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'distance',
                            'label' => 'Distance travelled',
                            'type' => 'number',
                            'suffix' => 'km',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'detect',
                            'label' => 'Detection radius',
                            'type' => 'number',
                            'suffix' => 'm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'rate_time',
                            'label' => 'Encounters per hour',
                            'type' => 'number',
                            'suffix' => '/h',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rate_distance',
                            'label' => 'Encounters per km',
                            'type' => 'number',
                            'suffix' => '/km',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Implied prey density',
                            'type' => 'number',
                            'suffix' => '/km²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'encounter_all',
                            'label' => 'Encounter rate (model)',
                            'type' => 'number',
                            'suffix' => '/h',
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
            'title' => 'Encounter',
            'results' => ['rate_time' => 'encounters/time', 'rate_distance' => 'encounters/distance', 'density' => 'encounters/distance/detect*1000', 'encounter_all' => 'encounters/distance/detect*1000*2*detect/1000*time'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Encounter Rate works out Encounters per hour and Encounters per km from Encounters recorded, Search time and Distance travelled. It is a single relationship that reads Encounters per hour out of Encounters recorded, not a table of canned results keyed by them. Units for Encounters per hour default to /h and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Encounter Rate calculator works', 'html' => <<<'TXT'
            <p>Encounter Rate answers one question from 4 numbers, and the answer is Encounters per hour, Encounters per km and Implied prey density.</p><p>In the form&#039;s own words, Encounters per hour = Encounters recorded ÷ Search time.</p><p>The result panel carries Encounters per hour, Encounters per km, Implied prey density and Encounter rate (model), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Encounters recorded</strong> — in events</li><li><strong>Search time</strong> — in hours</li><li><strong>Distance travelled</strong> — in km</li><li><strong>Detection radius</strong> — in m</li></ul><p>The answers come back as Encounters per hour in /h, Encounters per km in /km, Implied prey density in /km², Encounter rate (model) in /h. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Encounters recorded = 48 events, Search time = 6 hours, Distance travelled = 12 km and Detection radius = 25 m — through the same formula and the panel reports &lt;strong&gt;Encounters per hour&lt;/strong&gt; = 8 /h, &lt;strong&gt;Encounters per km&lt;/strong&gt; = 4 /km, &lt;strong&gt;Implied prey density&lt;/strong&gt; = 160 /km² and &lt;strong&gt;Encounter rate (model)&lt;/strong&gt; = 48 /h.</p><ul><li><strong>Encounters per hour</strong> = 8 /h</li><li><strong>Encounters per km</strong> = 4 /km</li><li><strong>Implied prey density</strong> = 160 /km²</li><li><strong>Encounter rate (model)</strong> = 48 /h</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Encounters per hour</strong> = <code>Encounters recorded ÷ Search time</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Encounters per hour&lt;/strong&gt; = 8, &lt;strong&gt;Encounters per km&lt;/strong&gt; = 4, &lt;strong&gt;Implied prey density&lt;/strong&gt; = 160 and &lt;strong&gt;Encounter rate (model)&lt;/strong&gt; = 48. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Encounters per hour is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Encounters per hour</strong> = <code>Encounters recorded ÷ Search time</code></li><li><strong>Encounters per km</strong> = <code>Encounters recorded ÷ Distance travelled</code></li><li><strong>Implied prey density</strong> = <code>Encounters recorded ÷ Distance travelled ÷ Detection radius × 1000</code></li><li><strong>Encounter rate (model)</strong> = <code>Encounters recorded ÷ Distance travelled ÷ Detection radius × 1000 × 2 × Detection radius ÷ 1000 × Search time</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Encounters per hour, Encounters per km and Implied prey density can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Encounters recorded from 48 to 96, leaving every other box alone. The panel moves from &lt;strong&gt;Encounters per hour&lt;/strong&gt; 8 /h, &lt;strong&gt;Encounters per km&lt;/strong&gt; 4 /km, &lt;strong&gt;Implied prey density&lt;/strong&gt; 160 /km² and &lt;strong&gt;Encounter rate (model)&lt;/strong&gt; 48 /h to &lt;strong&gt;Encounters per hour&lt;/strong&gt; 16 /h, &lt;strong&gt;Encounters per km&lt;/strong&gt; 8 /km, &lt;strong&gt;Implied prey density&lt;/strong&gt; 320 /km² and &lt;strong&gt;Encounter rate (model)&lt;/strong&gt; 96 /h.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Encounters per hour, Encounters per km and Implied prey density are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Encounters recorded to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Encounters recorded, Search time and Distance travelled and the number you are missing is Encounters per hour and Encounters per km.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/cell-surface-area-volume-ratio">Cell Surface Area to Volume Ratio Calculator — Formula &amp; Resul</a>, <a href="/biology/centimorgan-to-percentage">Centimorgan to Percentage Calculator</a> and <a href="/biology/centrifuge-rcf-rpm">Centrifuge RCF to RPM Converter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Encounter Rate calculator work out?', 'a' => <<<'TXT'
            Encounters per hour, Encounters per km, Implied prey density and Encounter rate (model), from Encounters recorded and Search time. The relationship is Encounters per hour = Encounters recorded ÷ Search time.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Encounters recorded (events), Search time (hours), Distance travelled (km), Detection radius (m). Fill encounters, time and distance and leave Encounters per hour empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Encounters per hour, Encounters per km, Implied prey density and Encounter rate (model) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Encounters per hour = 8 /h, Encounters per km = 4 /km, Implied prey density = 160 /km² and Encounter rate (model) = 48 /h. That comes from the page's own defaults, entered in Encounters recorded; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Encounters per hour is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Encounters recorded left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Encounters per hour at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/cell-surface-area-volume-ratio', 'name' => 'Cell Surface Area to Volume Ratio Calculator — Formula & Resul'],
            ['path' => '/biology/centimorgan-to-percentage', 'name' => 'Centimorgan to Percentage Calculator'],
            ['path' => '/biology/centrifuge-rcf-rpm', 'name' => 'Centrifuge RCF to RPM Converter Calculator'],
        ],
        'authors' => [],
    ],
];

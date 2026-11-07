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
    'meta' => ['title' => 'Encounter Rate Calculator — Formula & Results', 'description' => 'Encounter rate is how often a forager meets a food item per unit of search — per metre, per minute or per kilometre. It returns encounters per hour…', 'h1' => 'Encounter Rate Calculator', 'updated' => '2026-10-29'],
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
        Encounter rate is how often a forager meets a food item per unit of search — per metre, per minute or per kilometre. It returns encounters per hour, encounters per km, implied prey density and encounter rate (model), and the panel shows all of them at once.
        
        It links search time, prey density and detection distance, and it is the quantity foraging models and camera-trap studies are built on.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Encounter Rate', 'html' => <<<'TXT'
            <p>Encounter rate = encounters ÷ effort; density ≈ encounters ÷ (distance × 2 × detection radius)</p>
            <figure class="calc-figure"><img src="/uploads/biology/encounter-rate.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Encounter Rate Calculator — Encounters, search effort and detection distance." title="Encounter Rate Calculator"><figcaption>Encounters, search effort and detection distance.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>encounters</code></td><td>number of prey or species detected</td><td>events</td></tr><tr><td><code>effort</code></td><td>time or distance covered</td><td>h or km</td></tr><tr><td><code>detection radius</code></td><td>distance at which an item is noticed</td><td>m</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Encounter Rate?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: encounters recorded of <strong>48</strong> events, search time of <strong>6</strong> hours, distance travelled of <strong>12</strong> km, detection radius of <strong>25</strong> m.</p>
            <p>Substituting them into the formula gives encounters per hour of <strong>8</strong> /h, encounters per km of <strong>4</strong> /km, implied prey density of <strong>160</strong> /km², encounter rate (model) of <strong>48</strong> /h.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>The density estimate is a strip transect: the area searched is distance × twice the detection radius, so a larger detection radius lowers the implied density.</p></li><li><p>Encounter rate rises linearly with prey density only when detection is perfect; in practice it saturates as visibility drops.</p></li><li><p>In camera-trap work the equivalent is the trapping rate, expressed per trap-night rather than per hour of search.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using the time spent in the field rather than the time spent searching.</li><li>Ignoring missed detections, which biases density downwards.</li><li>Comparing encounter rates between habitats of different visibility without correcting.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I convert an encounter rate to a density?', 'a' => 'Divide by the searched area — distance travelled times twice the detection radius.'],
            ['q' => 'Why does visibility matter so much?', 'a' => 'Because detection distance defines the searched area; halve it and the implied density doubles.'],
            ['q' => 'What does the Encounter Rate actually calculate?', 'a' => <<<'TXT'
            It returns encounters per hour, encounters per km, implied prey density and encounter rate (model). Each one is derived by the formula on this page, so you can check any figure by hand.
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

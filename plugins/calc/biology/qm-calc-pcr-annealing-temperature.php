<?php

/**
 * PCR Annealing Temperature Calculator
 * /biology/pcr-annealing-temperature
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'PCR Annealing Temperature Calculator',
    'meta' => ['title' => 'PCR Annealing Temperature Calculator — Biology', 'description' => <<<'TXT'
    It is a single relationship that reads Annealing temperature out of Forward primer Tm, not a table of canned results keyed by them. 3–5 °C is standardProduct…
    TXT, 'h1' => 'PCR Annealing Temperature Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'tm_f',
                            'label' => 'Forward primer Tm',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                        [
                            'name' => 'tm_r',
                            'label' => 'Reverse primer Tm',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                        [
                            'name' => 'offset',
                            'label' => 'Offset below the lower Tm',
                            'type' => 'number',
                            'suffix' => '°C',
                            'help' => '3–5 °C is standard',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'product',
                            'label' => 'Product length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '400',
                        ],
                        [
                            'name' => 'ta',
                            'label' => 'Annealing temperature',
                            'type' => 'number',
                            'suffix' => '°C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gradient_low',
                            'label' => 'Gradient low',
                            'type' => 'number',
                            'suffix' => '°C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gradient_high',
                            'label' => 'Gradient high',
                            'type' => 'number',
                            'suffix' => '°C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tm_gap',
                            'label' => 'Tm difference',
                            'type' => 'number',
                            'suffix' => '°C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'extension_s',
                            'label' => 'Extension time (Taq, 1 min per kb)',
                            'type' => 'number',
                            'suffix' => 's',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cycles_time',
                            'label' => 'Cycling time for 30 cycles',
                            'type' => 'number',
                            'suffix' => 'min',
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
            'title' => 'Annealing',
            'results' => [
                'ta' => 'min(tm_f,tm_r)-offset',
                'gradient_low' => 'min(tm_f,tm_r)-offset-3',
                'gradient_high' => 'min(tm_f,tm_r)-offset+3',
                'tm_gap' => 'max(tm_f,tm_r)-min(tm_f,tm_r)',
                'extension_s' => 'max(15,product/1000*60)',
                'cycles_time' => '30*(max(tm_f,tm_r)-min(tm_f,tm_r)+max(15,product/1000*60))/60',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Forward primer Tm, Reverse primer Tm and Offset below the lower Tm into PCR Annealing Temperature and the answer comes back as Annealing temperature and Gradient low. It is a single relationship that reads Annealing temperature out of Forward primer Tm, not a table of canned results keyed by them. Units for Annealing temperature default to °C and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the PCR Annealing Temperature calculator works', 'html' => <<<'TXT'
            <p>PCR Annealing Temperature answers one question from 4 numbers, and the answer is Annealing temperature, Gradient low and Gradient high.</p><p>Written with the labels from the form, Annealing temperature = min(Forward primer Tm,Reverse primer Tm) − Offset below the lower Tm.</p><p>What comes back is Annealing temperature, Gradient low, Gradient high and Tm difference — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Forward primer Tm</strong> — in °C</li><li><strong>Reverse primer Tm</strong> — in °C</li><li><strong>Offset below the lower Tm</strong> — in °C. 3–5 °C is standard</li><li><strong>Product length</strong> — in bp</li></ul><p>The answers come back as Annealing temperature in °C, Gradient low in °C, Gradient high in °C, Tm difference in °C, Extension time (Taq, 1 min per kb) in s, Cycling time for 30 cycles in min. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Forward primer Tm = 60 °C, Reverse primer Tm = 60 °C, Offset below the lower Tm = 5 °C and Product length = 400 bp; the answers are &lt;strong&gt;Annealing temperature&lt;/strong&gt; = 55 °C, &lt;strong&gt;Gradient low&lt;/strong&gt; = 52 °C, &lt;strong&gt;Gradient high&lt;/strong&gt; = 58 °C, &lt;strong&gt;Tm difference&lt;/strong&gt; = 0 °C, &lt;strong&gt;Extension time (Taq, 1 min per kb)&lt;/strong&gt; = 24 s and &lt;strong&gt;Cycling time for 30 cycles&lt;/strong&gt; = 12 min.</p><ul><li><strong>Annealing temperature</strong> = 55 °C</li><li><strong>Gradient low</strong> = 52 °C</li><li><strong>Gradient high</strong> = 58 °C</li><li><strong>Tm difference</strong> = 0 °C</li><li><strong>Extension time (Taq, 1 min per kb)</strong> = 24 s</li><li><strong>Cycling time for 30 cycles</strong> = 12 min</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Annealing temperature</strong> = <code>min(Forward primer Tm,Reverse primer Tm) − Offset below the lower Tm</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Annealing temperature&lt;/strong&gt; = 55, &lt;strong&gt;Gradient low&lt;/strong&gt; = 52, &lt;strong&gt;Gradient high&lt;/strong&gt; = 58, &lt;strong&gt;Tm difference&lt;/strong&gt; = 0, &lt;strong&gt;Extension time (Taq, 1 min per kb)&lt;/strong&gt; = 24 and &lt;strong&gt;Cycling time for 30 cycles&lt;/strong&gt; = 12. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Annealing temperature is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Annealing temperature</strong> = <code>min(Forward primer Tm,Reverse primer Tm) − Offset below the lower Tm</code></li><li><strong>Gradient low</strong> = <code>min(Forward primer Tm,Reverse primer Tm) − Offset below the lower Tm − 3</code></li><li><strong>Gradient high</strong> = <code>min(Forward primer Tm,Reverse primer Tm) − Offset below the lower Tm + 3</code></li><li><strong>Tm difference</strong> = <code>max(Forward primer Tm,Reverse primer Tm) − min(Forward primer Tm,Reverse primer Tm)</code></li><li><strong>Extension time (Taq, 1 min per kb)</strong> = <code>max(15,Product length ÷ 1000 × 60)</code></li><li><strong>Cycling time for 30 cycles</strong> = <code>30 × (max(Forward primer Tm,Reverse primer Tm) − min(Forward primer Tm,Reverse primer Tm) + max(15,Product length ÷ 1000 × 60)) ÷ 60</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Annealing temperature, Gradient low and Gradient high can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Forward primer Tm from 60 to 120, leaving every other box alone. The panel moves from &lt;strong&gt;Annealing temperature&lt;/strong&gt; 55 °C, &lt;strong&gt;Gradient low&lt;/strong&gt; 52 °C, &lt;strong&gt;Gradient high&lt;/strong&gt; 58 °C, &lt;strong&gt;Tm difference&lt;/strong&gt; 0 °C, &lt;strong&gt;Extension time (Taq, 1 min per kb)&lt;/strong&gt; 24 s and &lt;strong&gt;Cycling time for 30 cycles&lt;/strong&gt; 12 min to &lt;strong&gt;Annealing temperature&lt;/strong&gt; 55 °C, &lt;strong&gt;Gradient low&lt;/strong&gt; 52 °C, &lt;strong&gt;Gradient high&lt;/strong&gt; 58 °C, &lt;strong&gt;Tm difference&lt;/strong&gt; 60 °C, &lt;strong&gt;Extension time (Taq, 1 min per kb)&lt;/strong&gt; 24 s and &lt;strong&gt;Cycling time for 30 cycles&lt;/strong&gt; 42 min.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Annealing temperature, Gradient low and Gradient high are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Forward primer Tm and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Forward primer Tm, Reverse primer Tm and Offset below the lower Tm measured, Annealing temperature and Gradient low wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/mitotic-index">Mitotic Index Calculator</a>, <a href="/biology/mlvss">Mixed liquor volatile suspended solids Calculator</a> and <a href="/biology/mouse-to-human-age">Mouse to Human Age Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the PCR Annealing Temperature calculator work out?', 'a' => <<<'TXT'
            Annealing temperature, Gradient low, Gradient high and Tm difference, from Forward primer Tm, Reverse primer Tm and Offset below the lower Tm. The relationship is Annealing temperature = min(Forward primer Tm,Reverse primer Tm) − Offset below the lower Tm.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Forward primer Tm (°C), Reverse primer Tm (°C), Offset below the lower Tm (°C), Product length (bp). Fill tm_f, tm_r and offset and leave Annealing temperature empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Annealing temperature, Gradient low, Gradient high and Tm difference can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Annealing temperature = 55 °C, Gradient low = 52 °C, Gradient high = 58 °C, Tm difference = 0 °C, Extension time (Taq, 1 min per kb) = 24 s and Cycling time for 30 cycles = 12 min. The figures come from Forward primer Tm as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Annealing temperature is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Forward primer Tm blank and the page solves for it, reporting Annealing temperature instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Annealing temperature keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/mitotic-index', 'name' => 'Mitotic Index Calculator'],
            ['path' => '/biology/mlvss', 'name' => 'Mixed liquor volatile suspended solids Calculator'],
            ['path' => '/biology/mouse-to-human-age', 'name' => 'Mouse to Human Age Calculator'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * Photosynthesis Rate Calculator
 * /biology/photosynthesis-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Photosynthesis Rate Calculator',
    'meta' => ['title' => 'Photosynthesis Rate Calculator — Formula & Results', 'description' => 'Enter Net assimilation rate, Leaf area and Measurement period into Photosynthesis Rate and the answer comes back as Carbon fixed and Rate.', 'h1' => 'Photosynthesis Rate Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'a',
                            'label' => 'Net assimilation rate',
                            'type' => 'number',
                            'suffix' => 'µmol CO₂/m²/s',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Leaf area',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.02',
                        ],
                        [
                            'name' => 'minutes',
                            'label' => 'Measurement period',
                            'type' => 'number',
                            'suffix' => 'min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'umol',
                            'label' => 'Carbon fixed',
                            'type' => 'number',
                            'suffix' => 'µmol CO₂',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mg_dm2_h',
                            'label' => 'Rate',
                            'type' => 'number',
                            'suffix' => 'mg CO₂/dm²/h',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'g_m2_day',
                            'label' => 'Daily carbon gain at this rate',
                            'type' => 'number',
                            'suffix' => 'g C/m²/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'biomass',
                            'label' => 'Dry matter equivalent per day',
                            'type' => 'number',
                            'suffix' => 'g/m²/day',
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
            'title' => 'Rate',
            'results' => ['umol' => 'a*area*minutes*60', 'mg_dm2_h' => 'a*1.584', 'g_m2_day' => 'a*0.012*86400/1000000*12', 'biomass' => 'a*0.012*86400/1000000*12*2.2'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Net assimilation rate, Leaf area and Measurement period into Photosynthesis Rate and the answer comes back as Carbon fixed and Rate. Nothing is looked up on this page: Carbon fixed is computed from Net assimilation rate and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Carbon fixed is opened in µmol CO₂; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Photosynthesis Rate calculator works', 'html' => <<<'TXT'
            <p>The Photosynthesis Rate calculator applies one relationship to 3 numbers and reports Carbon fixed, Rate and Daily carbon gain at this rate.</p><p>The relationship it solves reads Carbon fixed = Net assimilation rate × Leaf area × Measurement period × 60.</p><p>What comes back is Carbon fixed, Rate, Daily carbon gain at this rate and Dry matter equivalent per day — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Net assimilation rate</strong> — in µmol CO₂/m²/s</li><li><strong>Leaf area</strong> — in m²</li><li><strong>Measurement period</strong> — in min</li></ul><p>The result boxes are Carbon fixed in µmol CO₂, Rate in mg CO₂/dm²/h, Daily carbon gain at this rate in g C/m²/day, Dry matter equivalent per day in g/m²/day; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Net assimilation rate = 12 µmol CO₂/m²/s, Leaf area = 0.02 m² and Measurement period = 10 min — through the same formula and the panel reports &lt;strong&gt;Carbon fixed&lt;/strong&gt; = 144 µmol CO₂, &lt;strong&gt;Rate&lt;/strong&gt; = 19.01 mg CO₂/dm²/h, &lt;strong&gt;Daily carbon gain at this rate&lt;/strong&gt; = 0.1493 g C/m²/day and &lt;strong&gt;Dry matter equivalent per day&lt;/strong&gt; = 0.3285 g/m²/day.</p><ul><li><strong>Carbon fixed</strong> = 144 µmol CO₂</li><li><strong>Rate</strong> = 19.01 mg CO₂/dm²/h</li><li><strong>Daily carbon gain at this rate</strong> = 0.1493 g C/m²/day</li><li><strong>Dry matter equivalent per day</strong> = 0.3285 g/m²/day</li></ul><p>The line behind those figures is <strong>Carbon fixed</strong> = <code>Net assimilation rate × Leaf area × Measurement period × 60</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Carbon fixed&lt;/strong&gt; = 144, &lt;strong&gt;Rate&lt;/strong&gt; = 19.01, &lt;strong&gt;Daily carbon gain at this rate&lt;/strong&gt; = 0.1493 and &lt;strong&gt;Dry matter equivalent per day&lt;/strong&gt; = 0.3285. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Carbon fixed is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Carbon fixed</strong> = <code>Net assimilation rate × Leaf area × Measurement period × 60</code></li><li><strong>Rate</strong> = <code>Net assimilation rate × 1.584</code></li><li><strong>Daily carbon gain at this rate</strong> = <code>Net assimilation rate × 0.012 × 86400 ÷ 1000000 × 12</code></li><li><strong>Dry matter equivalent per day</strong> = <code>Net assimilation rate × 0.012 × 86400 ÷ 1000000 × 12 × 2.2</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Carbon fixed, Rate and Daily carbon gain at this rate can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Net assimilation rate, from 12 to 24 — and the answers go from &lt;strong&gt;Carbon fixed&lt;/strong&gt; 144 µmol CO₂, &lt;strong&gt;Rate&lt;/strong&gt; 19.01 mg CO₂/dm²/h, &lt;strong&gt;Daily carbon gain at this rate&lt;/strong&gt; 0.1493 g C/m²/day and &lt;strong&gt;Dry matter equivalent per day&lt;/strong&gt; 0.3285 g/m²/day to &lt;strong&gt;Carbon fixed&lt;/strong&gt; 288 µmol CO₂, &lt;strong&gt;Rate&lt;/strong&gt; 38.02 mg CO₂/dm²/h, &lt;strong&gt;Daily carbon gain at this rate&lt;/strong&gt; 0.2986 g C/m²/day and &lt;strong&gt;Dry matter equivalent per day&lt;/strong&gt; 0.6569 g/m²/day.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Carbon fixed, Rate and Daily carbon gain at this rate are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Net assimilation rate is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Net assimilation rate, Leaf area and Measurement period measured, Carbon fixed and Rate wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/watterson-estimator">Watterson Estimator Calculator</a>, <a href="/biology/western-blot-loading">Western Blot Protein Loading Calculator</a> and <a href="/biology/absorbance-transmittance">Absorbance to Transmittance Converter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Photosynthesis Rate calculator work out?', 'a' => <<<'TXT'
            Carbon fixed, Rate, Daily carbon gain at this rate and Dry matter equivalent per day, from Net assimilation rate, Leaf area and Measurement period. The relationship is Carbon fixed = Net assimilation rate × Leaf area × Measurement period × 60.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Net assimilation rate (µmol CO₂/m²/s), Leaf area (m²), Measurement period (min). Fill a, area and minutes and leave Carbon fixed empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Carbon fixed, Rate, Daily carbon gain at this rate and Dry matter equivalent per day can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Carbon fixed = 144 µmol CO₂, Rate = 19.01 mg CO₂/dm²/h, Daily carbon gain at this rate = 0.1493 g C/m²/day and Dry matter equivalent per day = 0.3285 g/m²/day. Those are the defaults written into the form — move Net assimilation rate and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Carbon fixed is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Net assimilation rate left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Carbon fixed at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/watterson-estimator', 'name' => 'Watterson Estimator Calculator'],
            ['path' => '/biology/western-blot-loading', 'name' => 'Western Blot Protein Loading Calculator'],
            ['path' => '/biology/absorbance-transmittance', 'name' => 'Absorbance to Transmittance Converter Calculator'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * BOD Load Calculator
 * /biology/bod-load
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'BOD Load Calculator',
    'meta' => ['title' => 'BOD Load Calculator: Formula, Steps & Results', 'description' => 'BOD Load works out BOD load and BOD removed from Flow, Influent BOD and Effluent BOD. The arithmetic is the whole method: BOD load is worked out from Flow by…', 'h1' => 'BOD Load Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'flow',
                            'label' => 'Flow',
                            'type' => 'number',
                            'suffix' => 'm³/day',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'bod_in',
                            'label' => 'Influent BOD',
                            'type' => 'number',
                            'suffix' => 'mg/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '320',
                        ],
                        [
                            'name' => 'bod_out',
                            'label' => 'Effluent BOD',
                            'type' => 'number',
                            'suffix' => 'mg/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Aeration tank volume',
                            'type' => 'number',
                            'suffix' => 'm³',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '750',
                        ],
                        [
                            'name' => 'mlss',
                            'label' => 'MLSS',
                            'type' => 'number',
                            'suffix' => 'mg/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3000',
                        ],
                        [
                            'name' => 'load',
                            'label' => 'BOD load',
                            'type' => 'number',
                            'suffix' => 'kg/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'removed',
                            'label' => 'BOD removed',
                            'type' => 'number',
                            'suffix' => 'kg/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pe',
                            'label' => 'Population equivalent',
                            'type' => 'number',
                            'suffix' => 'people',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'f_m',
                            'label' => 'Food to microorganism ratio',
                            'type' => 'number',
                            'suffix' => 'kg/kg/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'efficiency',
                            'label' => 'Removal efficiency',
                            'type' => 'number',
                            'suffix' => '%',
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
            'title' => 'Load',
            'results' => [
                'load' => 'flow*bod_in/1000',
                'removed' => 'flow*(bod_in-bod_out)/1000',
                'pe' => 'flow*bod_in/1000/0.06',
                'f_m' => 'flow*bod_in/1000/(volume*mlss/1000)',
                'efficiency' => '(bod_in-bod_out)/bod_in*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        BOD Load works out BOD load and BOD removed from Flow, Influent BOD and Effluent BOD. The arithmetic is the whole method: BOD load is worked out from Flow by one formula, applied once. BOD load comes back in kg/day unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the BOD Load calculator works', 'html' => <<<'TXT'
            <p>BOD Load answers one question from 5 numbers, and the answer is BOD load, BOD removed and Population equivalent.</p><p>The relationship it solves reads BOD load = Flow × Influent BOD ÷ 1000.</p><p>The result panel carries BOD load, BOD removed, Population equivalent and Food to microorganism ratio, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Flow</strong> — in m³/day</li><li><strong>Influent BOD</strong> — in mg/L</li><li><strong>Effluent BOD</strong> — in mg/L</li><li><strong>Aeration tank volume</strong> — in m³</li><li><strong>MLSS</strong> — in mg/L</li></ul><p>The result boxes are BOD load in kg/day, BOD removed in kg/day, Population equivalent in people, Food to microorganism ratio in kg/kg/day, Removal efficiency in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Flow = 500 m³/day, Influent BOD = 320 mg/L, Effluent BOD = 20 mg/L, Aeration tank volume = 750 m³ and MLSS = 3000 mg/L gives &lt;strong&gt;BOD load&lt;/strong&gt; = 160 kg/day, &lt;strong&gt;BOD removed&lt;/strong&gt; = 150 kg/day, &lt;strong&gt;Population equivalent&lt;/strong&gt; = 2667 people, &lt;strong&gt;Food to microorganism ratio&lt;/strong&gt; = 0.0711 kg/kg/day and &lt;strong&gt;Removal efficiency&lt;/strong&gt; = 93.75 %.</p><ul><li><strong>BOD load</strong> = 160 kg/day</li><li><strong>BOD removed</strong> = 150 kg/day</li><li><strong>Population equivalent</strong> = 2667 people</li><li><strong>Food to microorganism ratio</strong> = 0.0711 kg/kg/day</li><li><strong>Removal efficiency</strong> = 93.75 %</li></ul><p>The line behind those figures is <strong>BOD load</strong> = <code>Flow × Influent BOD ÷ 1000</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;BOD load&lt;/strong&gt; = 160, &lt;strong&gt;BOD removed&lt;/strong&gt; = 150, &lt;strong&gt;Population equivalent&lt;/strong&gt; = 2667, &lt;strong&gt;Food to microorganism ratio&lt;/strong&gt; = 0.0711 and &lt;strong&gt;Removal efficiency&lt;/strong&gt; = 93.75. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as BOD load is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>BOD load</strong> = <code>Flow × Influent BOD ÷ 1000</code></li><li><strong>BOD removed</strong> = <code>Flow × (Influent BOD − Effluent BOD) ÷ 1000</code></li><li><strong>Population equivalent</strong> = <code>Flow × Influent BOD ÷ 1000 ÷ 0.06</code></li><li><strong>Food to microorganism ratio</strong> = <code>Flow × Influent BOD ÷ 1000 ÷ (Aeration tank volume × MLSS ÷ 1000)</code></li><li><strong>Removal efficiency</strong> = <code>(Influent BOD − Effluent BOD) ÷ Influent BOD × 100</code></li></ul><p>Any one of BOD load, BOD removed and Population equivalent can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Flow, from 500 to 1000 — and the answers go from &lt;strong&gt;BOD load&lt;/strong&gt; 160 kg/day, &lt;strong&gt;BOD removed&lt;/strong&gt; 150 kg/day, &lt;strong&gt;Population equivalent&lt;/strong&gt; 2667 people, &lt;strong&gt;Food to microorganism ratio&lt;/strong&gt; 0.0711 kg/kg/day and &lt;strong&gt;Removal efficiency&lt;/strong&gt; 93.75 % to &lt;strong&gt;BOD load&lt;/strong&gt; 320 kg/day, &lt;strong&gt;BOD removed&lt;/strong&gt; 300 kg/day, &lt;strong&gt;Population equivalent&lt;/strong&gt; 5333 people, &lt;strong&gt;Food to microorganism ratio&lt;/strong&gt; 0.1422 kg/kg/day and &lt;strong&gt;Removal efficiency&lt;/strong&gt; 93.75 %.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> BOD load, BOD removed and Population equivalent are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Flow is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Flow, Influent BOD and Effluent BOD is what you already know and BOD load and BOD removed is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/omega-3-for-dogs">Omega-3 for dogs Calculator</a>, <a href="/biology/orf-finder">ORF Finder Calculator</a> and <a href="/biology/osmolarity-osmotic-pressure">Osmolarity / Osmotic Pressure Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the BOD Load calculator work out?', 'a' => <<<'TXT'
            BOD load, BOD removed, Population equivalent and Food to microorganism ratio, from Flow and Influent BOD. The relationship is BOD load = Flow × Influent BOD ÷ 1000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Flow (m³/day), Influent BOD (mg/L), Effluent BOD (mg/L), Aeration tank volume (m³), MLSS (mg/L). Enter flow, bod_in and bod_out; BOD load is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of BOD load, BOD removed, Population equivalent and Food to microorganism ratio blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            BOD load = 160 kg/day, BOD removed = 150 kg/day, Population equivalent = 2667 people, Food to microorganism ratio = 0.0711 kg/kg/day and Removal efficiency = 93.75 %. The figures come from Flow as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of BOD load is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Flow blank and the page solves for it, reporting BOD load instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to BOD load at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/omega-3-for-dogs', 'name' => 'Omega-3 for dogs Calculator'],
            ['path' => '/biology/orf-finder', 'name' => 'ORF Finder Calculator'],
            ['path' => '/biology/osmolarity-osmotic-pressure', 'name' => 'Osmolarity / Osmotic Pressure Calculator'],
        ],
        'authors' => [],
    ],
];

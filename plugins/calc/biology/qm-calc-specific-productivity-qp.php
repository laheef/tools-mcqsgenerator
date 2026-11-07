<?php

/**
 * Specific Productivity Calculator (qP)
 * /biology/specific-productivity-qp
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Specific Productivity Calculator (qP)',
    'meta' => ['title' => 'Specific Productivity Calculator (qP) — Biology', 'description' => 'Specific Productivity Calculator (qP) works out Specific productivity and Total product per batch from Product titre, Viable cell density and Production phase.', 'h1' => 'Specific Productivity Calculator (qP)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'titre',
                            'label' => 'Product titre',
                            'type' => 'number',
                            'suffix' => 'g/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.5',
                        ],
                        [
                            'name' => 'vcd',
                            'label' => 'Viable cell density',
                            'type' => 'number',
                            'suffix' => '10⁶/mL',
                            'help' => 'Time-weighted average, not the peak',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'days',
                            'label' => 'Production phase',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Working volume',
                            'type' => 'number',
                            'suffix' => 'L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2000',
                        ],
                        [
                            'name' => 'target',
                            'label' => 'Target titre',
                            'type' => 'number',
                            'suffix' => 'g/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4.0',
                        ],
                        [
                            'name' => 'qp',
                            'label' => 'Specific productivity',
                            'type' => 'number',
                            'suffix' => 'pg/cell/d',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total product per batch',
                            'type' => 'number',
                            'suffix' => 'g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_litre_day',
                            'label' => 'Volumetric productivity',
                            'type' => 'number',
                            'suffix' => 'g/L/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'days_needed',
                            'label' => 'Days needed for the target titre',
                            'type' => 'number',
                            'suffix' => 'days',
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
            'title' => 'Productivity',
            'results' => ['qp' => 'titre/(vcd*days)*1000', 'total' => 'titre*volume', 'per_litre_day' => 'titre/days', 'days_needed' => 'target/(titre/days)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Specific Productivity Calculator (qP) works out Specific productivity and Total product per batch from Product titre, Viable cell density and Production phase. Nothing is looked up on this page: Specific productivity is computed from Product titre and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Specific productivity is opened in pg/cell/d; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Specific Productivity Calculator (qP) calculator works', 'html' => <<<'TXT'
            <p>The Specific Productivity Calculator (qP) calculator applies one relationship to 5 numbers and reports Specific productivity, Total product per batch and Volumetric productivity.</p><p>The relationship it solves reads Specific productivity = Product titre ÷ (Viable cell density × Production phase) × 1000.</p><p>The answers are Specific productivity, Total product per batch, Volumetric productivity and Days needed for the target titre; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Product titre</strong> — in g/L</li><li><strong>Viable cell density</strong> — in 10⁶/mL. Time-weighted average, not the peak</li><li><strong>Production phase</strong> — in days</li><li><strong>Working volume</strong> — in L</li><li><strong>Target titre</strong> — in g/L</li></ul><p>The answers come back as Specific productivity in pg/cell/d, Total product per batch in g, Volumetric productivity in g/L/day, Days needed for the target titre in days. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Product titre = 2.5 g/L, Viable cell density = 12 10⁶/mL, Production phase = 10 days, Working volume = 2000 L and Target titre = 4 g/L; the answers are &lt;strong&gt;Specific productivity&lt;/strong&gt; = 20.83 pg/cell/d, &lt;strong&gt;Total product per batch&lt;/strong&gt; = 5000 g, &lt;strong&gt;Volumetric productivity&lt;/strong&gt; = 0.25 g/L/day and &lt;strong&gt;Days needed for the target titre&lt;/strong&gt; = 16 days.</p><ul><li><strong>Specific productivity</strong> = 20.83 pg/cell/d</li><li><strong>Total product per batch</strong> = 5000 g</li><li><strong>Volumetric productivity</strong> = 0.25 g/L/day</li><li><strong>Days needed for the target titre</strong> = 16 days</li></ul><p>The line behind those figures is <strong>Specific productivity</strong> = <code>Product titre ÷ (Viable cell density × Production phase) × 1000</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Specific productivity&lt;/strong&gt; = 20.83, &lt;strong&gt;Total product per batch&lt;/strong&gt; = 5000, &lt;strong&gt;Volumetric productivity&lt;/strong&gt; = 0.25 and &lt;strong&gt;Days needed for the target titre&lt;/strong&gt; = 16. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Specific productivity is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Specific productivity</strong> = <code>Product titre ÷ (Viable cell density × Production phase) × 1000</code></li><li><strong>Total product per batch</strong> = <code>Product titre × Working volume</code></li><li><strong>Volumetric productivity</strong> = <code>Product titre ÷ Production phase</code></li><li><strong>Days needed for the target titre</strong> = <code>Target titre ÷ (Product titre ÷ Production phase)</code></li></ul><p>Any one of Specific productivity, Total product per batch and Volumetric productivity can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Product titre, from 2.5 to 5 — and the answers go from &lt;strong&gt;Specific productivity&lt;/strong&gt; 20.83 pg/cell/d, &lt;strong&gt;Total product per batch&lt;/strong&gt; 5000 g, &lt;strong&gt;Volumetric productivity&lt;/strong&gt; 0.25 g/L/day and &lt;strong&gt;Days needed for the target titre&lt;/strong&gt; 16 days to &lt;strong&gt;Specific productivity&lt;/strong&gt; 41.67 pg/cell/d, &lt;strong&gt;Total product per batch&lt;/strong&gt; 10000 g, &lt;strong&gt;Volumetric productivity&lt;/strong&gt; 0.5 g/L/day and &lt;strong&gt;Days needed for the target titre&lt;/strong&gt; 8 days.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Specific productivity, Total product per batch and Volumetric productivity are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Product titre to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Product titre, Viable cell density and Production phase and the number you are missing is Specific productivity and Total product per batch.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/centimorgan-to-percentage">Centimorgan to Percentage Calculator</a>, <a href="/biology/centrifuge-rcf-rpm">Centrifuge RCF to RPM Converter Calculator</a> and <a href="/biology/cephalexin-for-cats-dosage">Cephalexin for cats dosage Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Specific Productivity Calculator (qP) calculator work out?', 'a' => <<<'TXT'
            Specific productivity, Total product per batch, Volumetric productivity and Days needed for the target titre, from Product titre, Viable cell density and Production phase. The relationship is Specific productivity = Product titre ÷ (Viable cell density × Production phase) × 1000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Product titre (g/L), Viable cell density (10⁶/mL), Production phase (days), Working volume (L), Target titre (g/L). With titre, vcd and days in place, Specific productivity can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Specific productivity, Total product per batch, Volumetric productivity and Days needed for the target titre blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Specific productivity = 20.83 pg/cell/d, Total product per batch = 5000 g, Volumetric productivity = 0.25 g/L/day and Days needed for the target titre = 16 days. That comes from the page's own defaults, entered in Product titre; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Specific productivity is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Product titre blank and the page solves for it, reporting Specific productivity instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Specific productivity keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/centimorgan-to-percentage', 'name' => 'Centimorgan to Percentage Calculator'],
            ['path' => '/biology/centrifuge-rcf-rpm', 'name' => 'Centrifuge RCF to RPM Converter Calculator'],
            ['path' => '/biology/cephalexin-for-cats-dosage', 'name' => 'Cephalexin for cats dosage Calculator'],
        ],
        'authors' => [],
    ],
];

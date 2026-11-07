<?php

/**
 * Restriction Digest Reaction Setup
 * /biology/restriction-digest-setup
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Restriction Digest Reaction Setup',
    'meta' => ['title' => 'Restriction Digest Reaction Setup — Biology', 'description' => 'Enter DNA mass, DNA concentration and Reaction volume into Restriction Digest Reaction Setup and the answer comes back as DNA volume and Enzyme volume.', 'h1' => 'Restriction Digest Reaction Setup', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'dna_ng',
                            'label' => 'DNA mass',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'dna_conc',
                            'label' => 'DNA concentration',
                            'type' => 'number',
                            'suffix' => 'ng/µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '200',
                        ],
                        [
                            'name' => 'total_vol',
                            'label' => 'Reaction volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'units_per_ug',
                            'label' => 'Enzyme units per µg DNA',
                            'type' => 'number',
                            'suffix' => 'U/µg',
                            'help' => '5–10 is typical',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'enzyme_conc',
                            'label' => 'Enzyme concentration',
                            'type' => 'number',
                            'suffix' => 'U/mL',
                            'help' => '20 U/µL is typical',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20000',
                        ],
                        [
                            'name' => 'buffer_x',
                            'label' => 'Buffer stock',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => 'CutSmart is 10×',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'dna_vol',
                            'label' => 'DNA volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'enzyme_vol',
                            'label' => 'Enzyme volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'buffer_vol',
                            'label' => 'Buffer volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'water_vol',
                            'label' => 'Water volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'units',
                            'label' => 'Total enzyme units',
                            'type' => 'number',
                            'suffix' => 'U',
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
            'title' => 'Digest',
            'results' => [
                'dna_vol' => 'dna_ng/dna_conc',
                'enzyme_vol' => 'dna_ng/1000*units_per_ug/enzyme_conc*1000',
                'buffer_vol' => 'total_vol/buffer_x',
                'water_vol' => 'total_vol-dna_ng/dna_conc-dna_ng/1000*units_per_ug/enzyme_conc*1000-total_vol/buffer_x',
                'units' => 'dna_ng/1000*units_per_ug',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter DNA mass, DNA concentration and Reaction volume into Restriction Digest Reaction Setup and the answer comes back as DNA volume and Enzyme volume. It is a single relationship that reads DNA volume out of DNA mass, not a table of canned results keyed by them. Units for DNA volume default to µL and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Restriction Digest Reaction Setup calculator works', 'html' => <<<'TXT'
            <p>Restriction Digest Reaction Setup answers one question from 6 numbers, and the answer is DNA volume, Enzyme volume and Buffer volume.</p><p>In the form&#039;s own words, DNA volume = DNA mass ÷ DNA concentration.</p><p>The answers are DNA volume, Enzyme volume, Buffer volume and Water volume; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs.</p><ul><li><strong>DNA mass</strong> — in ng</li><li><strong>DNA concentration</strong> — in ng/µL</li><li><strong>Reaction volume</strong> — in µL</li><li><strong>Enzyme units per µg DNA</strong> — in U/µg. 5–10 is typical</li><li><strong>Enzyme concentration</strong> — in U/mL. 20 U/µL is typical</li><li><strong>Buffer stock</strong> — in ×. CutSmart is 10×</li></ul><p>What you get back is DNA volume in µL, Enzyme volume in µL, Buffer volume in µL, Water volume in µL, Total enzyme units in U, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — DNA mass = 1000 ng, DNA concentration = 200 ng/µL, Reaction volume = 20 µL, Enzyme units per µg DNA = 10 U/µg, Enzyme concentration = 20000 U/mL and Buffer stock = 10 × — through the same formula and the panel reports &lt;strong&gt;DNA volume&lt;/strong&gt; = 5 µL, &lt;strong&gt;Enzyme volume&lt;/strong&gt; = 0.5 µL, &lt;strong&gt;Buffer volume&lt;/strong&gt; = 2 µL, &lt;strong&gt;Water volume&lt;/strong&gt; = 12.5 µL and &lt;strong&gt;Total enzyme units&lt;/strong&gt; = 10 U.</p><ul><li><strong>DNA volume</strong> = 5 µL</li><li><strong>Enzyme volume</strong> = 0.5 µL</li><li><strong>Buffer volume</strong> = 2 µL</li><li><strong>Water volume</strong> = 12.5 µL</li><li><strong>Total enzyme units</strong> = 10 U</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>DNA volume</strong> = <code>DNA mass ÷ DNA concentration</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;DNA volume&lt;/strong&gt; = 5, &lt;strong&gt;Enzyme volume&lt;/strong&gt; = 0.5, &lt;strong&gt;Buffer volume&lt;/strong&gt; = 2, &lt;strong&gt;Water volume&lt;/strong&gt; = 12.5 and &lt;strong&gt;Total enzyme units&lt;/strong&gt; = 10. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as DNA volume is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>DNA volume</strong> = <code>DNA mass ÷ DNA concentration</code></li><li><strong>Enzyme volume</strong> = <code>DNA mass ÷ 1000 × Enzyme units per µg DNA ÷ Enzyme concentration × 1000</code></li><li><strong>Buffer volume</strong> = <code>Reaction volume ÷ Buffer stock</code></li><li><strong>Water volume</strong> = <code>Reaction volume − DNA mass ÷ DNA concentration − DNA mass ÷ 1000 × Enzyme units per µg DNA ÷ Enzyme concentration × 1000 − Reaction volume ÷ Buffer stock</code></li><li><strong>Total enzyme units</strong> = <code>DNA mass ÷ 1000 × Enzyme units per µg DNA</code></li></ul><p>Any one of DNA volume, Enzyme volume and Buffer volume can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double DNA mass from 1000 to 2000, leaving every other box alone. The panel moves from &lt;strong&gt;DNA volume&lt;/strong&gt; 5 µL, &lt;strong&gt;Enzyme volume&lt;/strong&gt; 0.5 µL, &lt;strong&gt;Buffer volume&lt;/strong&gt; 2 µL, &lt;strong&gt;Water volume&lt;/strong&gt; 12.5 µL and &lt;strong&gt;Total enzyme units&lt;/strong&gt; 10 U to &lt;strong&gt;DNA volume&lt;/strong&gt; 10 µL, &lt;strong&gt;Enzyme volume&lt;/strong&gt; 1 µL, &lt;strong&gt;Buffer volume&lt;/strong&gt; 2 µL, &lt;strong&gt;Water volume&lt;/strong&gt; 7 µL and &lt;strong&gt;Total enzyme units&lt;/strong&gt; 20 U.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> DNA volume, Enzyme volume and Buffer volume are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If DNA mass is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when DNA mass, DNA concentration and Reaction volume is what you already know and DNA volume and Enzyme volume is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/land-equivalent-ratio">Land Equivalent Ratio Calculator</a>, <a href="/biology/lawn-fertilizer-rate">Lawn Fertilizer Rate Calculator</a> and <a href="/biology/mowing-cost">Lawn mowing Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Restriction Digest Reaction Setup calculator work out?', 'a' => 'DNA volume, Enzyme volume, Buffer volume and Water volume, from DNA mass and DNA concentration. The relationship is DNA volume = DNA mass ÷ DNA concentration.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            DNA mass (ng), DNA concentration (ng/µL), Reaction volume (µL), Enzyme units per µg DNA (U/µg), Enzyme concentration (U/mL). Enter dna_ng, dna_conc and total_vol; DNA volume is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of DNA volume, Enzyme volume, Buffer volume and Water volume blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            DNA volume = 5 µL, Enzyme volume = 0.5 µL, Buffer volume = 2 µL, Water volume = 12.5 µL and Total enzyme units = 10 U. Those are the defaults written into the form — move DNA mass and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            DNA volume is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave DNA mass blank and the page solves for it, reporting DNA volume instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to DNA volume at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/land-equivalent-ratio', 'name' => 'Land Equivalent Ratio Calculator'],
            ['path' => '/biology/lawn-fertilizer-rate', 'name' => 'Lawn Fertilizer Rate Calculator'],
            ['path' => '/biology/mowing-cost', 'name' => 'Lawn mowing Calculator'],
        ],
        'authors' => [],
    ],
];

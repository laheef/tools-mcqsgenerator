<?php

/**
 * SDS-PAGE Gel Calculator
 * /biology/sds-page-gel
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'SDS-PAGE Gel Calculator',
    'meta' => ['title' => 'SDS-PAGE Gel Calculator — Formula & Results', 'description' => 'SDS-PAGE Gel works out 30% acrylamide stock and 2% bis-acrylamide stock from Protein of interest, Acrylamide in the gel and Crosslinker in the gel.', 'h1' => 'SDS-PAGE Gel Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'protein_kda',
                            'label' => 'Protein of interest',
                            'type' => 'number',
                            'suffix' => 'kDa',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'acrylamide_pct',
                            'label' => 'Acrylamide in the gel',
                            'type' => 'number',
                            'suffix' => '%T',
                            'help' => '10% separates 20–150 kDa',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'bis_pct',
                            'label' => 'Crosslinker in the gel',
                            'type' => 'number',
                            'suffix' => '%C',
                            'help' => '2.6% is the usual ratio',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.6',
                        ],
                        [
                            'name' => 'total_ml',
                            'label' => 'Gel volume to pour',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'help' => 'Two mini gels are about 10 mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'acrylamide_ml',
                            'label' => '30% acrylamide stock',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bis_ml',
                            'label' => '2% bis-acrylamide stock',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'water_ml',
                            'label' => 'Water',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'best_pct',
                            'label' => 'Best acrylamide percentage',
                            'type' => 'number',
                            'suffix' => '%T',
                            'help' => 'For the protein you entered',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'separation',
                            'label' => 'Range this gel resolves',
                            'type' => 'number',
                            'suffix' => 'kDa',
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
            'title' => 'Gel',
            'results' => [
                'acrylamide_ml' => 'acrylamide_pct*total_ml/30',
                'water_ml' => 'total_ml-acrylamide_pct*total_ml/30-bis_pct*total_ml/2-total_ml/10',
                'bis_ml' => 'bis_pct*total_ml/2',
                'best_pct' => '150/protein_kda*5',
                'separation' => '1500/acrylamide_pct',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        SDS-PAGE Gel works out 30% acrylamide stock and 2% bis-acrylamide stock from Protein of interest, Acrylamide in the gel and Crosslinker in the gel. Nothing is looked up on this page: 30% acrylamide stock is computed from Protein of interest and the other boxes, so an unusual pair of values gives an honest answer rather than an error. 30% acrylamide stock is opened in mL; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the SDS-PAGE Gel calculator works', 'html' => <<<'TXT'
            <p>SDS-PAGE Gel answers one question from 4 numbers, and the answer is 30% acrylamide stock, 2% bis-acrylamide stock and Water.</p><p>In the form&#039;s own words, 30% acrylamide stock = Acrylamide in the gel × Gel volume to pour ÷ 30.</p><p>What comes back is 30% acrylamide stock, 2% bis-acrylamide stock, Water and Best acrylamide percentage — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Protein of interest</strong> — in kDa</li><li><strong>Acrylamide in the gel</strong> — in %T. 10% separates 20–150 kDa</li><li><strong>Crosslinker in the gel</strong> — in %C. 2.6% is the usual ratio</li><li><strong>Gel volume to pour</strong> — in mL. Two mini gels are about 10 mL</li></ul><p>The answers come back as 30% acrylamide stock in mL, 2% bis-acrylamide stock in mL, Water in mL, Best acrylamide percentage in %T, Range this gel resolves in kDa. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Protein of interest = 50 kDa, Acrylamide in the gel = 10 %T, Crosslinker in the gel = 2.6 %C and Gel volume to pour = 10 mL; the answers are &lt;strong&gt;30% acrylamide stock&lt;/strong&gt; = 3.33 mL, &lt;strong&gt;Water&lt;/strong&gt; = -7.33 mL, &lt;strong&gt;2% bis-acrylamide stock&lt;/strong&gt; = 13 mL, &lt;strong&gt;Best acrylamide percentage&lt;/strong&gt; = 15 %T and &lt;strong&gt;Range this gel resolves&lt;/strong&gt; = 150 kDa.</p><ul><li><strong>30% acrylamide stock</strong> = 3.33 mL</li><li><strong>Water</strong> = -7.33 mL</li><li><strong>2% bis-acrylamide stock</strong> = 13 mL</li><li><strong>Best acrylamide percentage</strong> = 15 %T</li><li><strong>Range this gel resolves</strong> = 150 kDa</li></ul><p>That is <strong>30% acrylamide stock</strong> = <code>Acrylamide in the gel × Gel volume to pour ÷ 30</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;30% acrylamide stock&lt;/strong&gt; = 3.33, &lt;strong&gt;Water&lt;/strong&gt; = -7.33, &lt;strong&gt;2% bis-acrylamide stock&lt;/strong&gt; = 13, &lt;strong&gt;Best acrylamide percentage&lt;/strong&gt; = 15 and &lt;strong&gt;Range this gel resolves&lt;/strong&gt; = 150. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as 30% acrylamide stock is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>30% acrylamide stock</strong> = <code>Acrylamide in the gel × Gel volume to pour ÷ 30</code></li><li><strong>Water</strong> = <code>Gel volume to pour − Acrylamide in the gel × Gel volume to pour ÷ 30 − Crosslinker in the gel × Gel volume to pour ÷ 2 − Gel volume to pour ÷ 10</code></li><li><strong>2% bis-acrylamide stock</strong> = <code>Crosslinker in the gel × Gel volume to pour ÷ 2</code></li><li><strong>Best acrylamide percentage</strong> = <code>150 ÷ Protein of interest × 5</code></li><li><strong>Range this gel resolves</strong> = <code>1500 ÷ Acrylamide in the gel</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of 30% acrylamide stock, Water and 2% bis-acrylamide stock can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Protein of interest, from 50 to 100 — and the answers go from &lt;strong&gt;30% acrylamide stock&lt;/strong&gt; 3.33 mL, &lt;strong&gt;Water&lt;/strong&gt; -7.33 mL, &lt;strong&gt;2% bis-acrylamide stock&lt;/strong&gt; 13 mL, &lt;strong&gt;Best acrylamide percentage&lt;/strong&gt; 15 %T and &lt;strong&gt;Range this gel resolves&lt;/strong&gt; 150 kDa to &lt;strong&gt;30% acrylamide stock&lt;/strong&gt; 3.33 mL, &lt;strong&gt;Water&lt;/strong&gt; -7.33 mL, &lt;strong&gt;2% bis-acrylamide stock&lt;/strong&gt; 13 mL, &lt;strong&gt;Best acrylamide percentage&lt;/strong&gt; 7.5 %T and &lt;strong&gt;Range this gel resolves&lt;/strong&gt; 150 kDa.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> 30% acrylamide stock, 2% bis-acrylamide stock and Water are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Protein of interest and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Protein of interest, Acrylamide in the gel and Crosslinker in the gel and the number you are missing is 30% acrylamide stock and 2% bis-acrylamide stock.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/ligation">Ligation</a>, <a href="/biology/lime-requirement">Lime Requirement Calculator</a> and <a href="/biology/linear-dna-ends-ug-pmol">Linear DNA µg to pmol of Ends Converter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the SDS-PAGE Gel calculator work out?', 'a' => <<<'TXT'
            30% acrylamide stock, 2% bis-acrylamide stock, Water and Best acrylamide percentage, from Acrylamide in the gel and Gel volume to pour. The relationship is 30% acrylamide stock = Acrylamide in the gel × Gel volume to pour ÷ 30.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Protein of interest (kDa), Acrylamide in the gel (%T), Crosslinker in the gel (%C), Gel volume to pour (mL). Enter protein_kda, acrylamide_pct and bis_pct; 30% acrylamide stock is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. 30% acrylamide stock, Water, 2% bis-acrylamide stock and Best acrylamide percentage can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            30% acrylamide stock = 3.33 mL, Water = -7.33 mL, 2% bis-acrylamide stock = 13 mL, Best acrylamide percentage = 15 %T and Range this gel resolves = 150 kDa. Those are the defaults written into the form — move Protein of interest and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of 30% acrylamide stock is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Protein of interest blank and the page solves for it, reporting 30% acrylamide stock instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to 30% acrylamide stock at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/ligation', 'name' => 'Ligation'],
            ['path' => '/biology/lime-requirement', 'name' => 'Lime Requirement Calculator'],
            ['path' => '/biology/linear-dna-ends-ug-pmol', 'name' => 'Linear DNA µg to pmol of Ends Converter Calculator'],
        ],
        'authors' => [],
    ],
];

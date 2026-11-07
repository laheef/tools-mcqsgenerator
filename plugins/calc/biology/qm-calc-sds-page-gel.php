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
    'meta' => ['title' => 'SDS-PAGE Gel Calculator — Formula & Results', 'description' => 'The acrylamide percentage decides which protein sizes a gel separates. It returns 30% acrylamide stock, water, 2% bis-acrylamide stock and best acrylamide…', 'h1' => 'SDS-PAGE Gel Calculator', 'updated' => '2026-10-29'],
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
        The acrylamide percentage decides which protein sizes a gel separates. It returns 30% acrylamide stock, water, 2% bis-acrylamide stock and best acrylamide percentage, and the panel shows all of them at once.
        
        Total acrylamide (%T) and the crosslinker ratio (%C) set the pore size, and a gel outside the right range runs everything into one band at the top or into the dye front.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the SDS-PAGE Gel', 'html' => <<<'TXT'
            <p>%T = (acrylamide + bis) ÷ total volume × 100. %C = bis ÷ (acrylamide + bis) × 100. A gel of %T resolves proteins up to roughly 1 500 ÷ %T kDa</p>
            <figure class="calc-figure"><img src="/uploads/biology/sds-page-gel.svg" width="720" height="300" loading="lazy" alt="Animated diagram: SDS-PAGE Gel Calculator — Acrylamide percentage and the proteins it resolves" title="SDS-PAGE Gel Calculator"><figcaption>Acrylamide percentage and the proteins it resolves</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>%T</code></td><td>total acrylamide concentration</td><td>%</td></tr><tr><td><code>%C</code></td><td>crosslinker as a share of the total acrylamide</td><td>%</td></tr><tr><td><code>kDa</code></td><td>kilodalton</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the SDS-PAGE Gel?', 'html' => <<<'TXT'
            <ol><li>Enter the size of your protein in kDa to see which percentage suits it.</li><li>Set the gel volume you need (about 10 mL for two mini gels).</li><li>The volumes of acrylamide, bis-acrylamide and water are given for the stocks you have.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: protein of interest of <strong>50</strong> kDa, acrylamide in the gel of <strong>10</strong> %T, crosslinker in the gel of <strong>2.6</strong> %C, gel volume to pour of <strong>10</strong> mL.</p>
            <p>Substituting them into the formula gives 30% acrylamide stock of <strong>3.33</strong> mL, water of <strong>-7.33</strong> mL, 2% bis-acrylamide stock of <strong>13</strong> mL, best acrylamide percentage of <strong>15</strong> %T, range this gel resolves of <strong>150</strong> kDa.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>7.5 %</td><td><strong>Large proteins</strong></td><td>50–500 kDa, good for antibodies</td></tr><tr><td>10 %</td><td><strong>The default</strong></td><td>20–150 kDa, which covers most proteins</td></tr><tr><td>12 – 15 %</td><td><strong>Small proteins</strong></td><td>10–50 kDa, peptides and growth factors</td></tr><tr><td>gradient 4–20%</td><td><strong>Wide range</strong></td><td>one gel for a whole lysate</td></tr></tbody></table>
            <ul><li><p>Pore size falls as %T rises, so a higher percentage resolves smaller proteins and a lower percentage lets large ones enter the gel at all.</p></li><li><p>%C matters as much as %T: at 2.6% crosslinking the pores are at their tightest for a given acrylamide concentration, which is why nearly every recipe uses it.</p></li><li><p>A protein that runs at the dye front is too small for the gel; one that stays at the top is too large. Neither is a loading problem.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Pouring a 15% gel for a 200 kDa protein, which never enters the separating layer.</li><li>Mixing 30% acrylamide with the crosslinker already in it and then adding more bis.</li><li>Forgetting that the running buffer pH, not the acrylamide, sets the stacking.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What percentage gel do I need for a 50 kDa protein?', 'a' => '10% — it resolves 20–150 kDa and puts a 50 kDa band comfortably in the middle.'],
            ['q' => 'What is %C?', 'a' => 'The crosslinker (bis-acrylamide) as a percentage of total acrylamide; 2.6% gives the smallest pores for a given %T.'],
            ['q' => 'Why is my protein at the dye front?', 'a' => 'It is smaller than the gel can resolve — lower the acrylamide percentage or use a gradient gel.'],
            ['q' => 'What does the SDS-PAGE Gel actually calculate?', 'a' => <<<'TXT'
            It returns 30% acrylamide stock, water, 2% bis-acrylamide stock and best acrylamide percentage. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [],
    ],
];

<?php

/**
 * Primer Resuspension and Working Stock Calculator
 * /biology/primer-resuspension-working-stock
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Primer Resuspension and Working Stock Calculator',
    'meta' => ['title' => 'Primer Resuspension and Working Stock Calculator', 'description' => <<<'TXT'
    A primer arrives as a dried pellet measured in nanomoles. It returns volume to add to the pellet, stock to take for the working stock, diluent for the working…
    TXT, 'h1' => 'Primer Resuspension and Working Stock Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'nmol',
                            'label' => 'Primer in the tube',
                            'type' => 'number',
                            'suffix' => 'nmol',
                            'help' => 'Printed on the vial or the spec sheet',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '33.4',
                        ],
                        [
                            'name' => 'stock',
                            'label' => 'Stock concentration',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'help' => '100 µM is the usual master stock',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'working',
                            'label' => 'Working concentration',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'working_vol',
                            'label' => 'Working stock to make',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'water_stock',
                            'label' => 'Volume to add to the pellet',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'take',
                            'label' => 'Stock to take for the working stock',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'water_working',
                            'label' => 'Diluent for the working stock',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'aliquots',
                            'label' => 'Working stocks from one tube',
                            'type' => 'number',
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
            'title' => 'Resuspension',
            'results' => ['water_stock' => 'nmol/stock*1000', 'take' => 'working*working_vol/stock', 'water_working' => 'working_vol-working*working_vol/stock', 'aliquots' => 'nmol/stock*1000/working*working_vol/stock'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A primer arrives as a dried pellet measured in nanomoles. It returns volume to add to the pellet, stock to take for the working stock, diluent for the working stock and working stocks from one tube, and the panel shows all of them at once.
        
        Dissolve it to a 100 µM stock, then dilute to a 10 µM working stock — this calculator gives the exact volume of TE or water for each step and how much working stock one tube of stock will make.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Primer Resuspension and Working Stock', 'html' => <<<'TXT'
            <p>Volume (µL) = nmol ÷ concentration (µM) × 1000; stock volume = C2V2 ÷ C1</p>
            <figure class="calc-figure"><img src="/uploads/biology/primer-resuspension-working-stock.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Primer Resuspension and Working Stock Calculator — Nanonmoles in the tube to microlitres of diluent, twice over." title="Primer Resuspension and Working Stock Calculator"><figcaption>Nanonmoles in the tube to microlitres of diluent, twice over.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>nmol</code></td><td>amount in the vial, per the spec sheet</td><td>nmol</td></tr><tr><td><code>stock</code></td><td>master stock concentration</td><td>µM</td></tr><tr><td><code>volume</code></td><td>diluent to add</td><td>µL</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Primer Resuspension and Working Stock?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: primer in the tube of <strong>33.4</strong> nmol, stock concentration of <strong>100</strong> µM, working concentration of <strong>10</strong> µM, working stock to make of <strong>500</strong> µL.</p>
            <p>Substituting them into the formula gives volume to add to the pellet of <strong>334</strong> µL, stock to take for the working stock of <strong>50</strong> µL, diluent for the working stock of <strong>450</strong> µL, working stocks from one tube of <strong>167</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>1 nmol in 1 mL is 1 µM, so the arithmetic is friendly: 33.4 nmol in 334 µL gives 100 µM.</p></li><li><p>Vortex for 30 seconds and leave at room temperature for 10 minutes; pellets of long oligos dissolve slowly and a half-dissolved stock reads low.</p></li><li><p>Use TE rather than water for long-term storage: the Tris buffer holds the pH and the EDTA protects against nucleases.</p></li><li><p>Store the 100 µM stock at −20 °C in aliquots and keep the 10 µM working stock at 4 °C for up to a few weeks.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Assuming the vial contains exactly the nominal amount instead of reading the spec sheet.</li><li>Freezing and thawing the working stock repeatedly, which is a common source of failed PCR.</li><li>Recording concentrations as '100×' rather than in µM, which cannot be checked later.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much water do I add to a 33.4 nmol primer?', 'a' => '334 µL for a 100 µM stock, or 3.34 mL for 10 µM.'],
            ['q' => 'Can I use water instead of TE?', 'a' => 'For short-term use yes, but TE keeps the oligo stable for years.'],
            ['q' => 'What does the Primer Resuspension and Working Stock actually calculate?', 'a' => <<<'TXT'
            It returns volume to add to the pellet, stock to take for the working stock, diluent for the working stock and working stocks from one tube. Each one is derived by the formula on this page, so you can check any figure by hand.
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

<?php

/**
 * DNA Molarity from Mass or A260
 * /biology/dna-molarity-from-mass
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'DNA Molarity from Mass or A260',
    'meta' => ['title' => 'DNA Molarity from Mass or A260 — Formula & Results', 'description' => <<<'TXT'
    Concentration in ng/µL tells you how much DNA you have; molarity tells you how many molecules. It returns molar concentration, pmol per µL, copies per µL and…
    TXT, 'h1' => 'DNA Molarity from Mass or A260', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'ng_ul',
                            'label' => 'DNA concentration',
                            'type' => 'number',
                            'suffix' => 'ng/µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'bp',
                            'label' => 'Fragment length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5000',
                        ],
                        [
                            'name' => 'nm',
                            'label' => 'Molar concentration',
                            'type' => 'number',
                            'suffix' => 'nM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pmol_ul',
                            'label' => 'pmol per µL',
                            'type' => 'number',
                            'suffix' => 'pmol/µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'copies_ul',
                            'label' => 'Copies per µL',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'a260',
                            'label' => 'Equivalent A260',
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
            'title' => 'Molarity',
            'results' => ['nm' => 'ng_ul*1000000/(bp*660)', 'pmol_ul' => 'ng_ul*1000000/(bp*660)/1000', 'copies_ul' => 'ng_ul*0.000000001/660/bp*602200000000000000000000', 'a260' => 'ng_ul/50'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Concentration in ng/µL tells you how much DNA you have; molarity tells you how many molecules. It returns molar concentration, pmol per µL, copies per µL and equivalent A260, and the panel shows all of them at once.
        
        Sequencing, ligation and qPCR all need the second. This calculator converts between mass concentration, molar concentration and copy number.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the DNA Molarity from Mass or A260', 'html' => <<<'TXT'
            <p>nM = (ng/µL × 10⁶) ÷ (bp × 660); copies/µL = (ng/µL × 6.022×10¹⁴) ÷ (bp × 660)</p>
            <figure class="calc-figure"><img src="/uploads/biology/dna-molarity-from-mass.svg" width="720" height="300" loading="lazy" alt="Animated diagram: DNA Molarity from Mass or A260 — Mass concentration, length and Avogadro's number." title="DNA Molarity from Mass or A260"><figcaption>Mass concentration, length and Avogadro's number.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>ng/µL</code></td><td>mass concentration</td><td>ng/µL</td></tr><tr><td><code>bp</code></td><td>molecule length</td><td>bp</td></tr><tr><td><code>nM</code></td><td>molar concentration</td><td>nM</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the DNA Molarity from Mass or A260?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: dna concentration of <strong>50</strong> ng/µL, fragment length of <strong>5,000</strong> bp.</p>
            <p>Substituting them into the formula gives molar concentration of <strong>15.15</strong> nM, pmol per µl of <strong>0.0152</strong> pmol/µL, copies per µl of <strong>9,124,242,424</strong>, equivalent a260 of <strong>1</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>The copy-number form is the one qPCR standard curves are built on: a 10-fold dilution series is a 10-fold drop in copies per microlitre.</p></li><li><p>Doubling the length halves the molarity at the same mass concentration — long constructs need much more mass for the same number of molecules.</p></li><li><p>For a plasmid, use the full plasmid length, not the insert.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Mixing ng/µL and µg/mL by a factor of a thousand.</li><li>Using a size in kilobases in a formula that expects base pairs.</li><li>Quoting molarity from a concentration measured with the wrong UV factor.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many copies are in 1 ng of a 5 kb plasmid?', 'a' => 'About 1.8 × 10⁸ copies.'],
            ['q' => 'Why do I need molarity for sequencing?', 'a' => 'Because the reaction consumes molecules, not micrograms, and library molarity determines cluster density.'],
            ['q' => 'What does the DNA Molarity from Mass or A260 actually calculate?', 'a' => <<<'TXT'
            It returns molar concentration, pmol per µL, copies per µL and equivalent A260. Each one is derived by the formula on this page, so you can check any figure by hand.
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

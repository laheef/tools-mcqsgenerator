<?php

/**
 * dsDNA µg to pmol Converter
 * /biology/dsdna-ug-to-pmol-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'dsDNA µg to pmol Converter',
    'meta' => ['title' => 'dsDNA µg to pmol Converter — Formula & Results', 'description' => 'Molecular biology protocols ask for DNA in pmol, and the freezer gives you µg. It returns amount, mass for 1 pmol, concentration if in 50 µL and molecules…', 'h1' => 'dsDNA µg to pmol Converter', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'ug',
                            'label' => 'Mass of DNA',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'bp',
                            'label' => 'Fragment length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3000',
                        ],
                        [
                            'name' => 'pmol',
                            'label' => 'Amount',
                            'type' => 'number',
                            'suffix' => 'pmol',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ug_from_pmol',
                            'label' => 'Mass for 1 pmol',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ng_ul',
                            'label' => 'Concentration if in 50 µL',
                            'type' => 'number',
                            'suffix' => 'ng/µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'molecules',
                            'label' => 'Molecules',
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
            'title' => 'Conversion',
            'results' => ['pmol' => 'ug*1000000/(bp*660)', 'ug_from_pmol' => 'bp*660/1000000', 'ng_ul' => 'ug*1000/50', 'molecules' => 'ug*0.000000000001/660/bp*602200000000000000000000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Molecular biology protocols ask for DNA in pmol, and the freezer gives you µg. It returns amount, mass for 1 pmol, concentration if in 50 µL and molecules, and the panel shows all of them at once.
        
        The bridge is the length of the molecule: one base pair of double-stranded DNA weighs 660 g/mol, so the conversion needs the size as well as the mass. This calculator handles both directions.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the dsDNA µg to pmol Converter', 'html' => <<<'TXT'
            <p>pmol = µg × 10⁶ ÷ (length in bp × 660); 1 pmol of 1 000 bp = 0.66 µg</p>
            <figure class="calc-figure"><img src="/uploads/biology/dsdna-ug-to-pmol-converter.svg" width="720" height="300" loading="lazy" alt="Animated diagram: dsDNA µg to pmol Converter — Mass divided by the molar mass of the fragment." title="dsDNA µg to pmol Converter"><figcaption>Mass divided by the molar mass of the fragment.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>µg</code></td><td>mass of DNA</td><td>µg</td></tr><tr><td><code>bp</code></td><td>length in base pairs</td><td>bp</td></tr><tr><td><code>660</code></td><td>average molar mass of one base pair, g/mol</td><td>g/mol</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the dsDNA µg to pmol Converter?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: mass of dna of <strong>1</strong> µg, fragment length of <strong>3,000</strong> bp.</p>
            <p>Substituting them into the formula gives amount of <strong>0.5051</strong> pmol, mass for 1 pmol of <strong>1.98</strong> µg, concentration if in 50 µl of <strong>20</strong> ng/µL, molecules of <strong>304,141</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>660 g/mol per bp is the standard average; a specific fragment can differ by a few percent depending on GC content, which does not matter for ligation ratios.</p></li><li><p>The same arithmetic works in reverse: pmol × bp × 660 ÷ 10⁶ = µg.</p></li><li><p>For single-stranded oligos the molar mass is roughly 330 g/mol per nucleotide, which is why primers are quoted in nmol rather than µg.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using the plasmid length when the fragment of interest is much shorter.</li><li>Dropping the 10⁶ that converts grams to micrograms.</li><li>Treating nmol and pmol as interchangeable — they differ by a thousand.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many pmol is 1 µg of a 3 kb plasmid?', 'a' => 'About 0.505 pmol — 1 000 ng ÷ (3 000 × 0.66 ng/pmol).'],
            ['q' => 'Why does length matter so much?', 'a' => 'Because the amount of substance is the mass divided by the molar mass, and the molar mass scales with length.'],
            ['q' => 'What does the dsDNA µg to pmol Converter actually calculate?', 'a' => <<<'TXT'
            It returns amount, mass for 1 pmol, concentration if in 50 µL and molecules. Each one is derived by the formula on this page, so you can check any figure by hand.
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

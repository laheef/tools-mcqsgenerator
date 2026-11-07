<?php

/**
 * dsDNA µg to pmol Calculator
 * /biology/dsdna-ug-to-pmol
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'dsDNA µg to pmol Calculator',
    'meta' => ['title' => 'dsDNA µg to pmol Calculator — Formula & Results', 'description' => 'Converting dsDNA from micrograms to picomoles needs the fragment length, nothing else. It returns amount, mass, mass and number of molecules, and the panel…', 'h1' => 'dsDNA µg to pmol Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Fragment length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'help' => 'The length of the dsDNA molecule',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'mass_ug',
                            'label' => 'Mass',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'help' => 'Leave the other box blank to solve from it instead',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
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
                            'name' => 'molecules',
                            'label' => 'Number of molecules',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ng',
                            'label' => 'Mass',
                            'type' => 'number',
                            'suffix' => 'ng',
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
            'title' => 'Convert',
            'results' => ['pmol' => 'mass_ug*1000000/(660*length)', 'mass_ug' => 'pmol*660*length/1000000', 'ng' => 'mass_ug*1000', 'molecules' => 'mass_ug*912445569696970/length'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Converting dsDNA from micrograms to picomoles needs the fragment length, nothing else. It returns amount, mass, mass and number of molecules, and the panel shows all of them at once.
        
        A ligation, a sequencing reaction and a self-made standard all ask for a molar amount, while the bench gives you nanograms on a spectrophotometer — this does the arithmetic both ways at the exact length of your fragment.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the dsDNA µg to pmol', 'html' => <<<'TXT'
            <p>pmol = mass (µg) × 10⁶ ÷ (660 × length in bp). Molecules = mass (g) ÷ (660 × length) × 6.022 × 10²³</p>
            <figure class="calc-figure"><img src="/uploads/biology/dsdna-ug-to-pmol.svg" width="720" height="300" loading="lazy" alt="Animated diagram: dsDNA µg to pmol Calculator — Mass, moles and molecule count for the same amount of DNA." title="dsDNA µg to pmol Calculator"><figcaption>Mass, moles and molecule count for the same amount of DNA.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>660</code></td><td>average molar mass of one base pair</td><td>g/mol</td></tr><tr><td><code>N</code></td><td>fragment length</td><td>bp</td></tr><tr><td><code>pmol</code></td><td>picomole, 10⁻¹² mol</td><td>mol</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the dsDNA µg to pmol?', 'html' => <<<'TXT'
            <ol><li>Enter the length of the double-stranded molecule in base pairs.</li><li>Type the mass in micrograms, or the amount in picomoles — whichever you know.</li><li>The other value is solved for you, together with the molecule count.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: fragment length of <strong>1,000</strong> bp.</p>
            <p>Substituting them into the formula gives amount of <strong>1.52</strong> pmol, mass of <strong>1</strong> µg, mass of <strong>1,000</strong> ng, number of molecules of <strong>912,445,569,697</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>under 100 bp</td><td><strong>Oligo-like</strong></td><td>use the single-strand or oligo converters instead</td></tr><tr><td>100 – 5 000 bp</td><td><strong>Typical fragment</strong></td><td>the 660 g/mol per bp average is accurate to a few percent</td></tr><tr><td>above 10 000 bp</td><td><strong>Large molecule</strong></td><td>pipetting error dominates the conversion</td></tr></tbody></table>
            <ul><li><p>660 g/mol per base pair is the sodium salt average at 50% GC. At 70% GC the true figure is closer to 640, a 3% difference that matters only for quantitative work.</p></li><li><p>A 1 000 bp fragment weighs 660 kDa, so 1 µg is about 1.5 pmol — the number worth remembering at the bench.</p></li><li><p>Ligations are usually set up at a 1:3 vector-to-insert molar ratio rather than equal mass, which is exactly what this conversion gives you.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Using the single-stranded constant (330 g/mol per nucleotide) for a duplex, which halves the answer.</li><li>Forgetting that the length must be the whole molecule, not the insert.</li><li>Rounding a 20 ng measurement to 1 µg of 'measured' DNA.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many pmol is 100 ng of a 1 kb dsDNA?', 'a' => '0.15 pmol. 0.1 µg × 10⁶ ÷ (660 × 1 000) = 0.1515 pmol.'],
            ['q' => 'Why 660 g/mol per base pair?', 'a' => 'It is the average of the four base pairs\' sodium salts, weighted for equal base composition.'],
            ['q' => 'Can I use this for ssDNA?', 'a' => 'No — use 330 g/mol per nucleotide for single-stranded DNA or RNA.'],
            ['q' => 'What does the dsDNA µg to pmol actually calculate?', 'a' => 'It returns amount, mass, mass and number of molecules. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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

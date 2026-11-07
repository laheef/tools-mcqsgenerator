<?php

/**
 * Linear DNA µg to pmol of Ends Converter
 * /biology/linear-dna-ends-ug-pmol
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Linear DNA µg to pmol of Ends Converter',
    'meta' => ['title' => 'Linear DNA µg to pmol of Ends Converter Calculator', 'description' => 'A linear DNA molecule has two ends, and many reactions care about the number of ends rather than the number of molecules — ligation, biotin labelling…', 'h1' => 'Linear DNA µg to pmol of Ends Converter', 'updated' => '2026-10-29'],
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
                            'label' => 'Length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'mass_ug',
                            'label' => 'Mass',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'pmol_ends',
                            'label' => 'Ends',
                            'type' => 'number',
                            'suffix' => 'pmol',
                            'help' => 'Twice the molar amount',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pmol',
                            'label' => 'Molecules',
                            'type' => 'number',
                            'suffix' => 'pmol',
                            'help' => 'Type either the mass or the molar amount',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ends_per_ug',
                            'label' => 'Ends per microgram',
                            'type' => 'number',
                            'suffix' => 'pmol/µg',
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
            'title' => 'Ends',
            'results' => [
                'pmol' => 'mass_ug*1000000/(660*length)',
                'mass_ug' => 'pmol*660*length/1000000',
                'pmol_ends' => '2*pmol',
                'ends_per_ug' => '2*1000000/(660*length)',
                'molecules' => 'pmol*602214076000',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A linear DNA molecule has two ends, and many reactions care about the number of ends rather than the number of molecules — ligation, biotin labelling, exonuclease chewing. It returns molecules, mass, ends and ends per microgram, and the panel shows all of them at once.
        
        One microgram of a 1 kb fragment is 1.5 pmol of molecules but 3 pmol of ends, and this calculator gives both without the arithmetic.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Linear DNA µg to pmol of Ends Converter', 'html' => <<<'TXT'
            <p>pmol of molecules = µg × 10⁶ ÷ (660 × length). pmol of ends = 2 × pmol of molecules. Ends per µg = 2 × 10⁶ ÷ (660 × length)</p>
            <figure class="calc-figure"><img src="/uploads/biology/linear-dna-ends-ug-pmol.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Linear DNA µg to pmol of Ends Converter — pmol of ends in 1 µg of linear DNA" title="Linear DNA µg to pmol of Ends Converter"><figcaption>pmol of ends in 1 µg of linear DNA</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>pmol</code></td><td>picomole, 10⁻¹² mol</td><td>mol</td></tr><tr><td><code>end</code></td><td>a 5′ or 3′ terminus of a linear molecule</td><td>—</td></tr><tr><td><code>660</code></td><td>g/mol per base pair of double-stranded DNA</td><td>g/mol</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Linear DNA µg to pmol of Ends Converter?', 'html' => <<<'TXT'
            <ol><li>Enter the length of the fragment in base pairs and the mass in micrograms.</li><li>The molar amount and the number of ends are both reported.</li><li>If you know how many pmol of ends you need, type it and the mass is solved instead.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: length of <strong>1,000</strong> bp.</p>
            <p>Substituting them into the formula gives molecules of <strong>1.52</strong> pmol, mass of <strong>1</strong> µg, ends of <strong>3.03</strong> pmol, ends per microgram of <strong>3.03</strong> pmol/µg, molecules of <strong>912,445,569,697</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>under 200 bp</td><td><strong>Many ends per µg</strong></td><td>0.5 µg of a 100 bp fragment carries 15 pmol of ends</td></tr><tr><td>200 – 3 000 bp</td><td><strong>Typical cloning fragment</strong></td><td>1–7 pmol of ends per microgram</td></tr><tr><td>over 10 000 bp</td><td><strong>Few ends</strong></td><td>a microgram carries well under 1 pmol of ends</td></tr></tbody></table>
            <ul><li><p>Ligations are driven by the concentration of ends, not the mass of DNA: two fragments of different lengths at equal mass do not have equal numbers of ends.</p></li><li><p>A circular plasmid has no ends, which is why a dephosphorylated vector is measured in molecules and an insert in ends.</p></li><li><p>Below about 1 nM of ends, the two termini rarely meet and the ligation stalls however much enzyme you add.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Using the molecules figure where the ends figure belongs — the answer is out by exactly 2.</li><li>Applying this to a circular molecule, which has no ends at all.</li><li>Forgetting that the mass must be the whole molecule, not the insert length.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why do ends matter more than molecules?', 'a' => 'Every ligation event joins two ends, so the rate depends on how often a 5′ and a 3′ terminus meet.'],
            ['q' => 'How many pmol of ends are in 1 µg of a 500 bp fragment?', 'a' => '6.06 pmol — 3.03 pmol of molecules, doubled.'],
            ['q' => 'Does a plasmid have ends?', 'a' => 'No. A closed circle contributes no ends, so it cannot ligate to anything without being cut first.'],
            ['q' => 'What does the Linear DNA µg to pmol of Ends Converter actually calculate?', 'a' => 'It returns molecules, mass, ends and ends per microgram. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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

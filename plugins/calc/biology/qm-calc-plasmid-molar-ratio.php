<?php

/**
 * Plasmid Molar Ratio Calculator
 * /biology/plasmid-molar-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Plasmid Molar Ratio Calculator',
    'meta' => ['title' => 'Plasmid Molar Ratio Calculator — Formula & Results', 'description' => 'When you ligate two fragments into a vector, the ratio that matters is molar, not by mass. It returns insert 1 mass, insert 2 mass, total DNA and vector…', 'h1' => 'Plasmid Molar Ratio Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'vector_ng',
                            'label' => 'Vector mass',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'vector_bp',
                            'label' => 'Vector length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5000',
                        ],
                        [
                            'name' => 'insert1_bp',
                            'label' => 'Insert 1 length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '800',
                        ],
                        [
                            'name' => 'insert2_bp',
                            'label' => 'Insert 2 length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'help' => 'Leave at 0 for a two-part ligation',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Insert : vector molar ratio',
                            'type' => 'number',
                            'suffix' => '×',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                        [
                            'name' => 'insert1_ng',
                            'label' => 'Insert 1 mass',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'insert2_ng',
                            'label' => 'Insert 2 mass',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_ng',
                            'label' => 'Total DNA',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_fmol',
                            'label' => 'Total DNA in the reaction',
                            'type' => 'number',
                            'suffix' => 'fmol',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'vector_fmol',
                            'label' => 'Vector molecules',
                            'type' => 'number',
                            'suffix' => 'fmol',
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
            'title' => 'Ratio',
            'results' => [
                'insert1_ng' => 'ratio*vector_ng*insert1_bp/vector_bp',
                'insert2_ng' => 'if_else(insert2_bp>0,ratio*vector_ng*insert2_bp/vector_bp,0)',
                'total_ng' => 'vector_ng+ratio*vector_ng*insert1_bp/vector_bp+if_else(insert2_bp>0,ratio*vector_ng*insert2_bp/vector_bp,0)',
                'vector_fmol' => 'vector_ng*1000000/(660*vector_bp)',
                'total_fmol' => '(vector_ng+ratio*vector_ng*insert1_bp/vector_bp+if_else(insert2_bp>0,ratio*vector_ng*insert2_bp/vector_bp,0))*1000000/(660*(vector_bp+insert1_bp+insert2_bp))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        When you ligate two fragments into a vector, the ratio that matters is molar, not by mass. It returns insert 1 mass, insert 2 mass, total DNA and vector molecules, and the panel shows all of them at once.
        
        This gives the nanograms of each part for a chosen ratio and tells you the total molar concentration of the reaction — the number that decides whether the ends ever find each other.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Plasmid Molar Ratio', 'html' => <<<'TXT'
            <p>Insert (ng) = ratio × vector (ng) × insert length ÷ vector length. fmol = ng × 1 000 000 ÷ (660 × length in bp), i.e. pmol × 1000</p>
            <figure class="calc-figure"><img src="/uploads/biology/plasmid-molar-ratio.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Plasmid Molar Ratio Calculator — Insert mass for an 800 bp insert into a 5 kb vector" title="Plasmid Molar Ratio Calculator"><figcaption>Insert mass for an 800 bp insert into a 5 kb vector</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>ratio</code></td><td>molecules of each insert per molecule of vector</td><td>—</td></tr><tr><td><code>ng</code></td><td>nanogram</td><td>—</td></tr><tr><td><code>fmol</code></td><td>femtomole, 10⁻¹⁵ mol</td><td>mol</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Plasmid Molar Ratio?', 'html' => <<<'TXT'
            <ol><li>Enter the vector mass and length, and the length of each insert.</li><li>Set the molar ratio and how many inserts the reaction has.</li><li>Read the mass of each insert, the total DNA and the molar amounts.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: vector mass of <strong>50</strong> ng, vector length of <strong>5,000</strong> bp, insert 1 length of <strong>800</strong> bp, insert 2 length of <strong>0</strong> bp, insert: vector molar ratio of <strong>3</strong> ×.</p>
            <p>Substituting them into the formula gives insert 1 mass of <strong>24</strong> ng, insert 2 mass of <strong>0</strong> ng, total dna of <strong>74</strong> ng, vector molecules of <strong>15.15</strong> fmol, total dna in the reaction of <strong>19.33</strong> fmol.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1: 1</td><td><strong>Equimolar</strong></td><td>three-part assemblies, or when every fragment is unique</td></tr><tr><td>3: 1</td><td><strong>Standard</strong></td><td>a single insert with compatible sticky ends</td></tr><tr><td>10: 1</td><td><strong>Saturating</strong></td><td>blunt ends or a very short insert</td></tr></tbody></table>
            <ul><li><p>For a three-part assembly, each insert gets the full molar ratio — so the total DNA rises fast and the reaction volume has to grow with it.</p></li><li><p>Check the total concentration, not just the ratio: below about 5 ng/µL of total DNA the ends rarely meet, however perfect the ratio.</p></li><li><p>A vector that has been dephosphorylated cannot ligate to itself, which is what makes a high insert ratio productive rather than wasteful.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Splitting the insert mass between inserts instead of giving each the full ratio.</li><li>Using mass ratios for fragments of very different lengths.</li><li>Adding so much DNA that the salt carried in with it inhibits the ligase.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What ratio for a two-fragment ligation?', 'a' => '3:1 insert to vector, in a total volume where the DNA is at least 5 ng/µL.'],
            ['q' => 'Does a third fragment change the ratio?', 'a' => 'No, but it multiplies the total DNA: give each insert the same molar ratio to the vector.'],
            ['q' => 'How much vector should I use?', 'a' => '25–100 ng per reaction; more vector means more self-ligation background.'],
            ['q' => 'What does the Plasmid Molar Ratio actually calculate?', 'a' => 'It returns insert 1 mass, insert 2 mass, total DNA and vector molecules. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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

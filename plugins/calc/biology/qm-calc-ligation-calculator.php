<?php

/**
 * Ligation Calculator
 * /biology/ligation-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Ligation Calculator',
    'meta' => ['title' => 'Ligation Calculator: Formula, Steps & Results', 'description' => 'Set up a ligation by molar ratio instead of guessing: with a fixed amount of vector, the mass of insert you need depends on the ratio you want and the…', 'h1' => 'Ligation Calculator', 'updated' => '2026-10-29'],
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
                            'help' => 'The amount you will put in the reaction',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'vector_bp',
                            'label' => 'Vector length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3000',
                        ],
                        [
                            'name' => 'insert_bp',
                            'label' => 'Insert length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Insert : vector ratio',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '3 is the usual starting point',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                        [
                            'name' => 'insert_ng',
                            'label' => 'Insert mass needed',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'vector_pmol',
                            'label' => 'Vector in the reaction',
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
            'title' => 'Ligation',
            'results' => ['insert_ng' => 'ratio*vector_ng*insert_bp/vector_bp', 'vector_ng' => 'insert_ng*vector_bp/(ratio*insert_bp)', 'vector_pmol' => 'vector_ng*1000000000/(660*vector_bp)/1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Set up a ligation by molar ratio instead of guessing: with a fixed amount of vector, the mass of insert you need depends on the ratio you want and the relative lengths. It returns insert mass needed, vector mass and vector in the reaction, and the panel shows all of them at once.
        
        A 3:1 insert-to-vector ratio is the usual starting point, and this calculator gives the nanograms for any ratio you choose.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Ligation', 'html' => <<<'TXT'
            <p>insert (ng) = ratio × vector (ng) × insert length ÷ vector length. fmol = ng × 10⁹ ÷ (660 × length in bp) ÷ 1000</p>
            <figure class="calc-figure"><img src="/uploads/biology/ligation-calculator.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Ligation Calculator — Insert mass needed for a 1 kb insert into a 3 kb vector" title="Ligation Calculator"><figcaption>Insert mass needed for a 1 kb insert into a 3 kb vector</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>ratio</code></td><td>molecules of insert per molecule of vector</td><td>—</td></tr><tr><td><code>ng</code></td><td>nanogram</td><td>—</td></tr><tr><td><code>fmol</code></td><td>femtomole, 10⁻¹⁵ mol</td><td>mol</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Ligation?', 'html' => <<<'TXT'
            <ol><li>Enter the vector mass you will use and both lengths in base pairs.</li><li>Choose the molar ratio — 3:1 for sticky ends is the standard start.</li><li>The insert mass is calculated; scale the whole reaction up if the volume gets too large.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: vector length of <strong>3,000</strong> bp, insert length of <strong>1,000</strong> bp, insert: vector ratio of <strong>3</strong> ×.</p>
            <p>Substituting them into the formula gives insert mass needed of <strong>50</strong> ng, vector mass of <strong>50</strong> ng, vector in the reaction of <strong>25.25</strong> fmol.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1: 1</td><td><strong>Equimolar</strong></td><td>good for a single insert with compatible ends</td></tr><tr><td>3: 1</td><td><strong>Standard</strong></td><td>the usual insert-to-vector ratio for a sticky-end ligation</td></tr><tr><td>10: 1</td><td><strong>Saturating</strong></td><td>useful for a short insert or a blunt-end ligation, but more concatemers</td></tr></tbody></table>
            <ul><li><p>Many inserts at once need an equimolar amount of each, so divide the insert mass between them rather than multiplying it.</p></li><li><p>Total DNA in the reaction matters as much as the ratio: below about 5 ng/µL of total DNA the ends rarely find each other.</p></li><li><p>Blunt-end ligations are far slower and give more background; use 10:1 and double the enzyme.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Using equal masses instead of equal moles, which over-represents the short molecule.</li><li>Adding a huge excess of insert, which mostly produces insert concatemers that will not transform as a single plasmid.</li><li>Forgetting to heat-inactivate the restriction enzyme before ligating.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What insert:vector ratio should I use?', 'a' => '3:1 for sticky ends, 10:1 for blunt ends; 1:1 when you are ligating several fragments at once.'],
            ['q' => 'How much total DNA should be in a ligation?', 'a' => '10–100 ng in 10–20 µL, so the ends can find each other.'],
            ['q' => 'Why did my ligation give no colonies?', 'a' => 'Usually the ratio, the total concentration, phosphatase treatment or the ligase buffer.'],
            ['q' => 'What does the Ligation actually calculate?', 'a' => 'It returns insert mass needed, vector mass and vector in the reaction. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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

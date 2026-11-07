<?php

/**
 * Ligation Molar Ratio Calculator (Insert : Vector)
 * /biology/ligation-molar-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Ligation Molar Ratio Calculator (Insert : Vector)',
    'meta' => ['title' => 'Ligation Molar Ratio (Insert : Vector) Calculator', 'description' => 'A ligation works when the insert outnumbers the vector enough to find it, but not so much that it ligates to itself. It returns insert mass, vector amount…', 'h1' => 'Ligation Molar Ratio Calculator (Insert : Vector)', 'updated' => '2026-10-29'],
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
                            'default' => '100',
                        ],
                        [
                            'name' => 'vector_bp',
                            'label' => 'Vector length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4000',
                        ],
                        [
                            'name' => 'insert_bp',
                            'label' => 'Insert length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '800',
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Insert : vector molar ratio',
                            'type' => 'number',
                            'suffix' => ':1',
                            'help' => '3:1 is the usual starting point',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                        [
                            'name' => 'insert_ng',
                            'label' => 'Insert mass',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'vector_pmol',
                            'label' => 'Vector amount',
                            'type' => 'number',
                            'suffix' => 'pmol',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'insert_pmol',
                            'label' => 'Insert amount',
                            'type' => 'number',
                            'suffix' => 'pmol',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_ng',
                            'label' => 'Total DNA in the reaction',
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
            'title' => 'Ligation',
            'results' => ['insert_ng' => 'vector_ng*insert_bp/vector_bp*ratio', 'vector_pmol' => 'vector_ng*1000000/(vector_bp*660)', 'insert_pmol' => 'vector_ng*1000000/(vector_bp*660)*ratio', 'total_ng' => 'vector_ng+vector_ng*insert_bp/vector_bp*ratio'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A ligation works when the insert outnumbers the vector enough to find it, but not so much that it ligates to itself. It returns insert mass, vector amount, insert amount and total DNA in the reaction, and the panel shows all of them at once.
        
        The standard is a 3:1 molar ratio, and the calculation converts that ratio into nanograms using the two lengths.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Ligation Molar Ratio (Insert : Vector)', 'html' => <<<'TXT'
            <p>Insert (ng) = vector (ng) × (insert bp ÷ vector bp) × molar ratio</p>
            <figure class="calc-figure"><img src="/uploads/biology/ligation-molar-ratio.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Ligation Molar Ratio Calculator (Insert: Vector) — Vector and insert masses that give the chosen molar ratio." title="Ligation Molar Ratio Calculator (Insert: Vector)"><figcaption>Vector and insert masses that give the chosen molar ratio.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>vector_ng</code></td><td>mass of cut vector</td><td>ng</td></tr><tr><td><code>vector_bp</code></td><td>vector length</td><td>bp</td></tr><tr><td><code>insert_bp</code></td><td>insert length</td><td>bp</td></tr><tr><td><code>ratio</code></td><td>moles of insert per mole of vector</td><td>:1</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Ligation Molar Ratio (Insert : Vector)?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: vector mass of <strong>100</strong> ng, vector length of <strong>4,000</strong> bp, insert length of <strong>800</strong> bp, insert: vector molar ratio of <strong>3</strong>:1.</p>
            <p>Substituting them into the formula gives insert mass of <strong>60</strong> ng, vector amount of <strong>37.88</strong> pmol, insert amount of <strong>113.64</strong> pmol, total dna in the reaction of <strong>160</strong> ng.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>3:1 favours the desired product without starving the vector; 1:1 reduces tandem inserts, 10:1 drives short-insert ligations that otherwise fail.</p></li><li><p>Total DNA in a 20 µL ligation should stay around 100–200 ng: more DNA favours self-ligation and concatemers.</p></li><li><p>Both fragments should be clean — a ligation is exquisitely sensitive to residual phosphatase, salt and EDTA from a gel-purification kit.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using the insert:vector mass ratio when the two fragments are different lengths.</li><li>Phosphatasing the insert as well as the vector, which leaves nothing to ligate to.</li><li>Leaving the ligation for hours at room temperature, which favours rearrangement.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why 3:1?', 'a' => 'It is the ratio that maximises the chance of a vector meeting an insert while limiting vector–vector and insert–insert products.'],
            ['q' => 'How much insert for 100 ng of a 4 kb vector and an 800 bp insert?', 'a' => '60 ng — 100 × (800/4000) × 3.'],
            ['q' => 'What does the Ligation Molar Ratio (Insert : Vector) actually calculate?', 'a' => <<<'TXT'
            It returns insert mass, vector amount, insert amount and total DNA in the reaction. Each one is derived by the formula on this page, so you can check any figure by hand.
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

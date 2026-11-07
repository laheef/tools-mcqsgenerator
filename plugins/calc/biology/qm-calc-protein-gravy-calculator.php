<?php

/**
 * Protein GRAVY (Hydropathy) Calculator
 * /biology/protein-gravy-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Protein GRAVY (Hydropathy) Calculator',
    'meta' => ['title' => 'Protein GRAVY (Hydropathy) Calculator — Biology', 'description' => <<<'TXT'
    GRAVY — grand average of hydropathicity — is the mean Kyte–Doolittle hydropathy of a protein's residues. It returns GRAVY and hydrophobic fraction, and the…
    TXT, 'h1' => 'Protein GRAVY (Hydropathy) Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'hydrophobic',
                            'label' => 'Hydrophobic residues (A V I L M F W Y)',
                            'type' => 'number',
                            'help' => 'Counted in the sequence',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                        [
                            'name' => 'neutral',
                            'label' => 'Neutral residues (G P S T C N Q)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '80',
                        ],
                        [
                            'name' => 'hydrophilic',
                            'label' => 'Hydrophilic residues (D E K R H)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total residues',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '300',
                        ],
                        [
                            'name' => 'gravy',
                            'label' => 'GRAVY',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hydrophobic_pct',
                            'label' => 'Hydrophobic fraction',
                            'type' => 'number',
                            'suffix' => '%',
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
            'title' => 'Hydropathy',
            'results' => ['gravy' => '(1.8*hydrophobic+(-0.9)*neutral+(-2.6)*hydrophilic)/total', 'hydrophobic_pct' => 'hydrophobic/total*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        GRAVY — grand average of hydropathicity — is the mean Kyte–Doolittle hydropathy of a protein's residues. It returns GRAVY and hydrophobic fraction, and the panel shows all of them at once.
        
        Positive values mean the protein is hydrophobic, negative means hydrophilic, and the number is a quick read on solubility. This calculator computes it from residue counts.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Protein GRAVY (Hydropathy)', 'html' => <<<'TXT'
            <p>GRAVY = Σ (hydropathy value of each residue) ÷ number of residues</p>
            <figure class="calc-figure"><img src="/uploads/biology/protein-gravy-calculator.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Protein GRAVY (Hydropathy) Calculator — GRAVY on the Kyte–Doolittle scale." title="Protein GRAVY (Hydropathy) Calculator"><figcaption>GRAVY on the Kyte–Doolittle scale.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>hydrophobic</code></td><td>A, V, I, L, M, F, W, Y — positive Kyte–Doolittle values</td><td>count</td></tr><tr><td><code>neutral</code></td><td>G, P, S, T, C, N, Q — near zero</td><td>count</td></tr><tr><td><code>hydrophilic</code></td><td>D, E, K, R, H — strongly negative</td><td>count</td></tr><tr><td><code>GRAVY</code></td><td>mean hydropathy, roughly −2 to +2</td><td>—</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> Kyte & Doolittle (1982), Journal of Molecular Biology 157:105–132.</p>
            TXT],
            ['title' => 'How do I use the Protein GRAVY (Hydropathy)?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: hydrophobic residues (a v i l m f w y) of <strong>120</strong>, neutral residues (g p s t c n q) of <strong>80</strong>, hydrophilic residues (d e k r h) of <strong>100</strong>, total residues of <strong>300</strong>.</p>
            <p>Substituting them into the formula gives gravy of <strong>-0.3867</strong>, hydrophobic fraction of <strong>40</strong>%.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below −1.0</td><td><strong>Hydrophilic</strong></td><td>soluble cytoplasmic protein</td></tr><tr><td>−1.0 to 0</td><td><strong>Mixed</strong></td><td>soluble, often with a hydrophobic core</td></tr><tr><td>0 to +0.5</td><td><strong>Hydrophobic</strong></td><td>membrane-associated or aggregation-prone</td></tr><tr><td>above +0.5</td><td><strong>Strongly hydrophobic</strong></td><td>membrane protein or a fragment of one</td></tr></tbody></table>
            <ul><li><p>The grouped average uses representative values; residue-exact GRAVY needs the real sequence and a lookup table, which is what ProtParam does.</p></li><li><p>GRAVY is a bulk property: a soluble protein can contain a strongly hydrophobic stretch (a transmembrane helix) and still average out hydrophilic.</p></li><li><p>For aggregation risk, look at the hydrophobic fraction inside a sliding window, not the whole-protein average.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Counting residues twice or using the sequence length instead of the counted total.</li><li>Reading GRAVY as a solubility test — it correlates with, but does not determine, solubility.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What GRAVY value means a protein is soluble?', 'a' => 'Usually below 0, and comfortably below −0.5. Overexpression constructs often carry a fusion tag partly to push GRAVY down.'],
            ['q' => 'Is GRAVY the same as the hydropathy plot?', 'a' => 'No. GRAVY is one number for the whole protein; a hydropathy plot slides a window along the sequence to find transmembrane segments.'],
            ['q' => 'What does the Protein GRAVY (Hydropathy) actually calculate?', 'a' => 'It returns GRAVY and hydrophobic fraction. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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

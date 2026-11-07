<?php

/**
 * Protein Extinction Coefficient (ε280) Calculator
 * /biology/protein-extinction-coefficient
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Protein Extinction Coefficient (ε280) Calculator',
    'meta' => ['title' => 'Protein Extinction Coefficient (ε280) Calculator', 'description' => <<<'TXT'
    A protein's extinction coefficient at 280 nm can be calculated from its amino acid composition: tryptophans and tyrosines do the absorbing, and cystines add a…
    TXT, 'h1' => 'Protein Extinction Coefficient (ε280) Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'trp',
                            'label' => 'Tryptophan residues',
                            'type' => 'number',
                            'help' => 'W',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'tyr',
                            'label' => 'Tyrosine residues',
                            'type' => 'number',
                            'help' => 'Y',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'cystine',
                            'label' => 'Cystine (disulfide) bonds',
                            'type' => 'number',
                            'help' => 'S–S pairs, not free cysteines',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'mw',
                            'label' => 'Molecular weight',
                            'type' => 'number',
                            'suffix' => 'Da',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '55000',
                        ],
                        [
                            'name' => 'ext',
                            'label' => 'Extinction coefficient',
                            'type' => 'number',
                            'suffix' => 'M⁻¹cm⁻¹',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'a1mg',
                            'label' => 'A280 of a 1 mg/mL solution',
                            'type' => 'number',
                            'suffix' => 'AU',
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
            'title' => 'Extinction',
            'results' => ['ext' => 'trp*5500+tyr*1490+cystine*125', 'a1mg' => '(trp*5500+tyr*1490+cystine*125)/mw'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A protein's extinction coefficient at 280 nm can be calculated from its amino acid composition: tryptophans and tyrosines do the absorbing, and cystines add a small amount. It returns extinction coefficient and A280 of a 1 mg/mL solution, and the panel shows all of them at once.
        
        Enter the counts and this returns ε in M⁻¹cm⁻¹ and the A280 of a 1 mg/mL solution.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Protein Extinction Coefficient (ε280)', 'html' => <<<'TXT'
            <p>ε₂₈₀ = 5500 × Trp + 1490 × Tyr + 125 × cystines</p>
            <figure class="calc-figure"><img src="/uploads/biology/protein-extinction-coefficient.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Protein Extinction Coefficient (ε280) Calculator — Trp, Tyr and disulfides add up to the extinction coefficient." title="Protein Extinction Coefficient (ε280) Calculator"><figcaption>Trp, Tyr and disulfides add up to the extinction coefficient.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>Trp</code></td><td>number of tryptophan residues</td><td>—</td></tr><tr><td><code>Tyr</code></td><td>number of tyrosine residues</td><td>—</td></tr><tr><td><code>cystine</code></td><td>number of disulfide bonds</td><td>—</td></tr><tr><td><code>ε</code></td><td>molar extinction coefficient</td><td>M⁻¹cm⁻¹</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> Pace et al. (1995), Protein Science 4:2411–2423.</p>
            TXT],
            ['title' => 'How do I use the Protein Extinction Coefficient (ε280)?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: tryptophan residues of <strong>8</strong>, tyrosine residues of <strong>12</strong>, cystine (disulfide) bonds of <strong>4</strong>, molecular weight of <strong>55,000</strong> Da.</p>
            <p>Substituting them into the formula gives extinction coefficient of <strong>62,380</strong> M⁻¹cm⁻¹, a280 of a 1 mg/ml solution of <strong>1.13</strong> AU.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>The coefficients come from Pace et al. (1995) and are what ExPASy ProtParam uses.</p></li><li><p>Count disulfide bonds, not free cysteines: reduced cysteines contribute nothing at 280 nm.</p></li><li><p>The A280 of a 1 mg/mL solution is the practical number for Beer–Lambert work, because it lets you skip the molecular weight.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Counting every cysteine residue instead of disulfide pairs.</li><li>Using the reduced-protein coefficient for a protein that is folded and disulfide-bonded.</li><li>Assuming the value holds in 6 M guanidine, where the spectrum shifts.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What if my protein has no Trp or Tyr?', 'a' => 'Then ε₂₈₀ is very small and A280 is useless. Use a colorimetric assay or measure at 205 nm, where the peptide backbone absorbs.'],
            ['q' => 'Does a His-tag change the coefficient?', 'a' => 'Only slightly — histidine contributes about 20 M⁻¹cm⁻¹ at 280 nm, which is negligible against a whole protein.'],
            ['q' => 'What does the Protein Extinction Coefficient (ε280) actually calculate?', 'a' => 'It returns extinction coefficient and A280 of a 1 mg/mL solution. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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

<?php

/**
 * DNA Molarity Calculator
 * /biology/dna-molarity-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'DNA Molarity Calculator',
    'meta' => ['title' => 'DNA Molarity Calculator — Formula & Results', 'description' => <<<'TXT'
    A DNA molarity comes from an A₂₆₀ reading, a mass or a concentration, once you know the length. It returns total mass, concentration, A₂₆₀ equivalent and…
    TXT, 'h1' => 'DNA Molarity Calculator', 'updated' => '2026-10-29'],
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
                            'help' => 'Fragment or genome length',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'conc_ng_ul',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'ng/µL',
                            'help' => 'What a nanodrop or a Qubit reports',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'volume_ul',
                            'label' => 'Volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'factor',
                            'label' => 'Molecule (A₂₆₀ factor)',
                            'type' => 'select',
                            'options' => ['Double-stranded DNA — 50' => '50', 'Single-stranded DNA — 33' => '33', 'RNA — 40' => '40'],
                            'help' => 'µg/mL per absorbance unit',
                            'default' => 'Double-stranded DNA — 50',
                        ],
                        [
                            'name' => 'mw_per_bp',
                            'label' => 'Molar mass per base',
                            'type' => 'number',
                            'suffix' => 'g/mol',
                            'help' => '660 dsDNA per bp, 330 ssDNA, 340 RNA',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '660',
                        ],
                        [
                            'name' => 'mass_ng',
                            'label' => 'Total mass',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'molarity',
                            'label' => 'Molarity',
                            'type' => 'number',
                            'suffix' => 'nM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'copies',
                            'label' => 'Molecules',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'a260',
                            'label' => 'A₂₆₀ equivalent',
                            'type' => 'number',
                            'suffix' => 'A',
                            'help' => 'For a 1 cm path',
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
            'title' => 'Mass',
            'results' => ['mass_ng' => 'conc_ng_ul*volume_ul', 'conc_ng_ul' => 'mass_ng/volume_ul', 'a260' => 'conc_ng_ul/factor'],
        ],
        [
            'title' => 'Amount',
            'results' => ['pmol' => 'mass_ng*1000/(mw_per_bp*length)', 'mass_ng' => 'pmol*mw_per_bp*length/1000', 'molarity' => 'pmol/volume_ul*1000', 'copies' => 'pmol*602214076000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A DNA molarity comes from an A₂₆₀ reading, a mass or a concentration, once you know the length. It returns total mass, concentration, A₂₆₀ equivalent and amount, and the panel shows all of them at once.
        
        One A₂₆₀ unit means 50 µg/mL of double-stranded DNA, 33 µg/mL of single-stranded DNA and 40 µg/mL of RNA, and a known length converts that mass into moles — the number a sequencing reaction or a ligation actually asks for.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the DNA Molarity', 'html' => <<<'TXT'
            <p>mass (ng) = concentration (ng/µL) × volume (µL). pmol = mass (ng) × 1000 ÷ (660 × length in bp). c (nM) = pmol ÷ volume (µL) × 1000. A₂₆₀ = concentration ÷ 50 (dsDNA), 33 (ssDNA) or 40 (RNA)</p>
            <figure class="calc-figure"><img src="/uploads/biology/dna-molarity-calculator.svg" width="720" height="300" loading="lazy" alt="Animated diagram: DNA Molarity Calculator — A₂₆₀ conversion factors (µg/mL per absorbance unit)" title="DNA Molarity Calculator"><figcaption>A₂₆₀ conversion factors (µg/mL per absorbance unit)</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>A₂₆₀</code></td><td>absorbance at 260 nm through a 1 cm path</td><td>—</td></tr><tr><td><code>660</code></td><td>g/mol per base pair of dsDNA</td><td>g/mol</td></tr><tr><td><code>nM</code></td><td>nanomole per litre</td><td>mol/L</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the DNA Molarity?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the length of the molecule — this is what turns a mass into a molar amount.</li><li>Type the concentration your nanodrop or Qubit reports, and the volume you will use.</li><li>Read the amount in pmol, the molarity in nM, the molecule count and the A₂₆₀ it corresponds to.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: length of <strong>1,000</strong> bp, volume of <strong>50</strong> µL, molecule (a₂₆₀ factor) set to <strong>50.0</strong>, molar mass per base of <strong>660</strong> g/mol.</p>
            <p>Substituting them into the formula gives total mass of <strong>5,000</strong> ng, concentration of <strong>100</strong> ng/µL, a₂₆₀ equivalent of <strong>2</strong> A, amount of <strong>7.58</strong> pmol, molarity of <strong>151.52</strong> nM, molecules of <strong>4,562,227,848,485</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1.8 – 1.9</td><td><strong>A₂₆₀/A₂₈₀</strong></td><td>clean DNA; lower means protein or phenol carry-over</td></tr><tr><td>50 ng/µL</td><td><strong>Typical miniprep</strong></td><td>enough for a dozen PCRs</td></tr><tr><td>under 2 ng/µL</td><td><strong>Too dilute</strong></td><td>concentrate before a sequencing reaction</td></tr></tbody></table>
            <ul><li><p>The A₂₆₀ factor assumes a 1 cm path. A nanodrop uses a much shorter path and applies its own multiplier, so its answer is already in ng/µL — do not multiply it again.</p></li><li><p>A₂₆₀ cannot tell DNA from RNA or from free nucleotides. A reading with a huge 260 peak and a ratio near 1.8 often means nucleotides left over from a bad cleanup.</p></li><li><p>Molarity needs the length. Without it a mass tells you nothing about how many molecules are in the tube: the same 100 ng is 0.15 pmol of a 1 kb fragment but 0.003 pmol of a 50 kb one.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Using the dsDNA factor (50) for an oligo, which understates the absorbance by a third.</li><li>Forgetting to divide by the volume when converting to a working concentration.</li><li>Comparing A₂₆₀ readings taken in different cuvettes or after a freeze–thaw.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/dsdna-ug-to-pmol">dsDNA µg to pmol</a>. <a href="/biology/dna-molecular-weight-calculator">DNA molecular weight</a>. <a href="/biology/oligo-tm-calculator">Oligo Tm</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I convert A₂₆₀ to concentration?', 'a' => 'Multiply by 50 for dsDNA, 33 for ssDNA or 40 for RNA to get µg/mL, which is the same number in ng/µL.'],
            ['q' => 'How many copies are in 100 ng of a 1 kb plasmid?', 'a' => 'About 9 × 10¹⁰ — 100 ng ÷ 660 kDa, times Avogadro\'s number.'],
            ['q' => 'Why does molarity need the fragment length?', 'a' => 'Because the same mass of a longer molecule is fewer molecules.'],
            ['q' => 'What does the DNA Molarity actually calculate?', 'a' => 'It returns total mass, concentration, A₂₆₀ equivalent and amount. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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

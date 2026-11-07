<?php

/**
 * Autosomal Recessive Inheritance Risk
 * /biology/autosomal-recessive-risk
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Autosomal Recessive Inheritance Risk',
    'meta' => ['title' => 'Autosomal Recessive Inheritance Risk Calculator', 'description' => 'For a recessive condition, risk depends on whether each parent carries one copy. It returns chance of an affected child, chance of a carrier child, chance of…', 'h1' => 'Autosomal Recessive Inheritance Risk', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'parent1',
                            'label' => 'Parent 1 genotype',
                            'type' => 'select',
                            'options' => ['AA — non-carrier' => '0', 'Aa — carrier' => '0.5', 'aa — affected' => '1'],
                            'default' => 'Aa — carrier',
                        ],
                        [
                            'name' => 'parent2',
                            'label' => 'Parent 2 genotype',
                            'type' => 'select',
                            'options' => ['AA — non-carrier' => '0', 'Aa — carrier' => '0.5', 'aa — affected' => '1'],
                            'default' => 'Aa — carrier',
                        ],
                        [
                            'name' => 'carrier_freq',
                            'label' => 'Population carrier frequency',
                            'type' => 'number',
                            'help' => 'Optional — 2pq from Hardy–Weinberg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.04',
                        ],
                        [
                            'name' => 'affected',
                            'label' => 'Chance of an affected child',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'carrier_child',
                            'label' => 'Chance of a carrier child',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'unaffected',
                            'label' => 'Chance of an unaffected child',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'population_risk',
                            'label' => 'Population risk from carrier frequency',
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
            'title' => 'Risk',
            'results' => ['affected' => 'parent1*parent2*100', 'carrier_child' => '(parent1*(1-parent2)+(1-parent1)*parent2)*100', 'unaffected' => '(1-parent1)*(1-parent2)*100', 'population_risk' => 'pow(carrier_freq,2)*0.25*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        For a recessive condition, risk depends on whether each parent carries one copy. It returns chance of an affected child, chance of a carrier child, chance of an unaffected child and population risk from carrier frequency, and the panel shows all of them at once.
        
        This calculator covers the four standard matings — carrier × carrier, carrier × affected, affected × affected and carrier × non-carrier — and gives the chance for an affected child, an unaffected child and a carrier child.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Autosomal Recessive Inheritance Risk', 'html' => <<<'TXT'
            <p>Aa × Aa → 1 affected: 2 carriers: 1 non-carrier unaffected</p>
            <figure class="calc-figure"><img src="/uploads/biology/autosomal-recessive-risk.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Autosomal Recessive Inheritance Risk — The Aa × Aa cross, cell by cell." title="Autosomal Recessive Inheritance Risk"><figcaption>The Aa × Aa cross, cell by cell.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>A</code></td><td>the normal allele</td><td>—</td></tr><tr><td><code>a</code></td><td>the recessive disease allele</td><td>—</td></tr><tr><td><code>carrier</code></td><td>Aa, has the allele but not the disease</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Autosomal Recessive Inheritance Risk?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: parent 1 genotype set to <strong>Aa — carrier</strong>, parent 2 genotype set to <strong>Aa — carrier</strong>, population carrier frequency of <strong>0.04</strong>.</p>
            <p>Substituting them into the formula gives chance of an affected child of <strong>25</strong>%, chance of a carrier child of <strong>50</strong>%, chance of an unaffected child of <strong>25</strong>%, population risk from carrier frequency of <strong>0.04</strong>%.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Every child of two carriers has the same 25% risk regardless of what happened to earlier children; the dice are independent.</p></li><li><p>Consanguineous couples are more likely to both be carriers, which is why recessive conditions cluster in populations with limited gene flow.</p></li><li><p>Carrier frequency comes from Hardy–Weinberg: 2pq, which for a rare allele is close to 2q.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Multiplying the parents' risks together instead of working from their genotypes.</li><li>Reading 25% as 'one in four of our children' rather than a per-child probability.</li><li>Confusing a carrier with an affected individual.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/hardy-weinberg-equilibrium">Hardy–Weinberg equilibrium</a>. <a href="/biology/inbreeding-coefficient">Inbreeding coefficient</a>. <a href="/biology/autosomal-dominant-pedigree">Dominant pedigree</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'If both parents are carriers, why can a child be unaffected?', 'a' => 'Because there is a 75% chance the child inherits at least one normal allele.'],
            ['q' => 'What is the risk if one parent is affected and one is a carrier?', 'a' => '50% affected, 50% carrier, none completely free of the allele.'],
            ['q' => 'What does the Autosomal Recessive Inheritance Risk actually calculate?', 'a' => <<<'TXT'
            It returns chance of an affected child, chance of a carrier child, chance of an unaffected child and population risk from carrier frequency. Each one is derived by the formula on this page, so you can check any figure by hand.
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

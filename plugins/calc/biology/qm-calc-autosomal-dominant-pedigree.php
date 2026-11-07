<?php

/**
 * Autosomal Dominant Pedigree Analyzer
 * /biology/autosomal-dominant-pedigree
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Autosomal Dominant Pedigree Analyzer',
    'meta' => ['title' => 'Autosomal Dominant Pedigree Analyzer Calculator', 'description' => 'A dominant allele shows in every generation and has an affected parent for every affected child. It returns chance of an affected child, chance of an…', 'h1' => 'Autosomal Dominant Pedigree Analyzer', 'updated' => '2026-10-29'],
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
                            'options' => ['AA — affected homozygote' => '1', 'Aa — affected heterozygote' => '0.5', 'aa — unaffected' => '0'],
                            'default' => 'Aa — affected heterozygote',
                        ],
                        [
                            'name' => 'parent2',
                            'label' => 'Parent 2 genotype',
                            'type' => 'select',
                            'options' => ['AA — affected homozygote' => '1', 'Aa — affected heterozygote' => '0.5', 'aa — unaffected' => '0'],
                            'default' => 'aa — unaffected',
                        ],
                        [
                            'name' => 'penetrance',
                            'label' => 'Penetrance',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Below 100% if carriers can appear unaffected',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
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
                            'name' => 'unaffected',
                            'label' => 'Chance of an unaffected child',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'carriers',
                            'label' => 'Chance the child carries the allele',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'generations',
                            'label' => 'Expected affected fraction at generation 5',
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
            'title' => 'Pedigree',
            'results' => ['affected' => '(1-(1-parent1)*(1-parent2))*penetrance/100*100', 'unaffected' => '(1-(1-(1-parent1)*(1-parent2))*penetrance/100)*100', 'carriers' => '(parent1*(1-parent2)+(1-parent1)*parent2)*penetrance/100*100', 'generations' => 'pow(1-(1-parent1)*(1-parent2),5)*penetrance/100*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A dominant allele shows in every generation and has an affected parent for every affected child. It returns chance of an affected child, chance of an unaffected child, chance the child carries the allele and expected affected fraction at generation 5, and the panel shows all of them at once.
        
        This calculator works out the genotype of each parent, the risk for their children and the chance a healthy child of an affected carrier-free parent still carries the allele.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Autosomal Dominant Pedigree Analyzer', 'html' => <<<'TXT'
            <p>Aa × aa → 1 affected: 1 unaffected; each generation halves the allele's share</p>
            <figure class="calc-figure"><img src="/uploads/biology/autosomal-dominant-pedigree.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Autosomal Dominant Pedigree Analyzer — An affected heterozygote mated with an unaffected partner." title="Autosomal Dominant Pedigree Analyzer"><figcaption>An affected heterozygote mated with an unaffected partner.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>A</code></td><td>the dominant disease allele</td><td>—</td></tr><tr><td><code>a</code></td><td>the normal allele</td><td>—</td></tr><tr><td><code>penetrance</code></td><td>share of carriers who show the trait</td><td>%</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Autosomal Dominant Pedigree Analyzer?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: parent 1 genotype set to <strong>Aa — affected heterozygote</strong>, parent 2 genotype set to <strong>0.0</strong>, penetrance of <strong>100</strong>%.</p>
            <p>Substituting them into the formula gives chance of an affected child of <strong>50</strong>%, chance of an unaffected child of <strong>50</strong>%, chance the child carries the allele of <strong>50</strong>%, expected affected fraction at generation 5 of <strong>3.12</strong>%.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Dominant alleles are lost from a pedigree as carriers die without children: the expected share of affected offspring after five generations of mating with unaffected partners is about 3%.</p></li><li><p>Incomplete penetrance makes a dominant allele appear to skip a generation, which is the classic mimic of a recessive pattern.</p></li><li><p>Huntington's disease, Marfan syndrome and familial hypercholesterolaemia are the usual textbook autosomal dominant examples.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Assuming a dominant trait must appear in every generation when penetrance is incomplete.</li><li>Ignoring new mutations, which can produce an affected child in an unaffected family.</li><li>Confusing an affected homozygote with a heterozygote — the first passes the allele to every child.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Can two affected parents have an unaffected child?', 'a' => 'Yes, if both are heterozygotes: the child may inherit the normal allele from each.'],
            ['q' => 'What does an affected parent pass on?', 'a' => 'A heterozygote passes the allele to 50% of children; a homozygote to all of them.'],
            ['q' => 'What does the Autosomal Dominant Pedigree Analyzer actually calculate?', 'a' => <<<'TXT'
            It returns chance of an affected child, chance of an unaffected child, chance the child carries the allele and expected affected fraction at generation 5. Each one is derived by the formula on this page, so you can check any figure by hand.
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

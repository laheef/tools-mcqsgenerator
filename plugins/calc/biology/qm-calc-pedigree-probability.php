<?php

/**
 * Pedigree Probability Calculator
 * /biology/pedigree-probability
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pedigree Probability Calculator',
    'meta' => ['title' => 'Pedigree Probability Calculator — Formula & Results', 'description' => 'Pedigree problems ask for the chance a future child is affected, given what the family tree shows. It returns chance of an affected child, odds against and…', 'h1' => 'Pedigree Probability Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'carrier_prob',
                            'label' => 'Chance the parent is a carrier',
                            'type' => 'number',
                            'help' => 'From the pedigree',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.667',
                        ],
                        [
                            'name' => 'partner_carrier',
                            'label' => 'Chance the partner is a carrier',
                            'type' => 'number',
                            'help' => 'Population frequency',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.04',
                        ],
                        [
                            'name' => 'transmission',
                            'label' => 'Transmission if both are carriers',
                            'type' => 'number',
                            'help' => '0.25 for a recessive trait',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.25',
                        ],
                        [
                            'name' => 'joint',
                            'label' => 'Chance of an affected child',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'odds',
                            'label' => 'Odds against',
                            'type' => 'number',
                            'suffix' => ':1',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'one_in',
                            'label' => 'Expressed as 1 in',
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
            'title' => 'Probability',
            'results' => ['joint' => 'carrier_prob*partner_carrier*transmission*100', 'odds' => '(1-carrier_prob*partner_carrier*transmission)/(carrier_prob*partner_carrier*transmission)', 'one_in' => '1/(carrier_prob*partner_carrier*transmission)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Pedigree problems ask for the chance a future child is affected, given what the family tree shows. It returns chance of an affected child, odds against and expressed as 1 in, and the panel shows all of them at once.
        
        This calculator combines the probability a parent is a carrier with the transmission risk, and reports the joint probability in the form a genetics problem expects.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Pedigree Probability', 'html' => <<<'TXT'
            <p>P(affected) = P(parent carrier) × P(partner carrier) × P(transmission)</p>
            <figure class="calc-figure"><img src="/uploads/biology/pedigree-probability.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Pedigree Probability Calculator — Carrier chance times partner chance times transmission." title="Pedigree Probability Calculator"><figcaption>Carrier chance times partner chance times transmission.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>carrier</code></td><td>probability the parent carries the allele</td><td>0–1</td></tr><tr><td><code>transmission</code></td><td>probability two carriers have an affected child</td><td>0–1</td></tr><tr><td><code>joint</code></td><td>product of independent probabilities</td><td>0–1</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Pedigree Probability?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: chance the parent is a carrier of <strong>0.667</strong>, chance the partner is a carrier of <strong>0.04</strong>, transmission if both are carriers of <strong>0.25</strong>.</p>
            <p>Substituting them into the formula gives chance of an affected child of <strong>0.667</strong>%, odds against of <strong>148.93</strong>:1, expressed as 1 in of <strong>149.93</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Unaffected siblings of an affected child have a 2/3 chance of being carriers, not 3/4: the affected genotype is excluded from the sample space.</p></li><li><p>Multiply only independent events; a shared ancestor makes the parents' genotypes dependent, which is what the inbreeding coefficient corrects for.</p></li><li><p>Bayesian updating with test results replaces the prior carrier probability before you multiply.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using 0.25 for the parent's carrier probability instead of the pedigree-derived value.</li><li>Forgetting to exclude an affected sibling from the denominator.</li><li>Adding probabilities of independent events instead of multiplying them.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why is an unaffected sibling\'s carrier risk 2/3?', 'a' => 'Of the three genotypes that produce an unaffected child (AA, Aa, aA), two are carriers.'],
            ['q' => 'How does a genetic test change the answer?', 'a' => 'It replaces the carrier probability with the test\'s posterior probability, which is then multiplied by the partner\'s risk and the transmission rate.'],
            ['q' => 'What does the Pedigree Probability actually calculate?', 'a' => <<<'TXT'
            It returns chance of an affected child, odds against and expressed as 1 in. Each one is derived by the formula on this page, so you can check any figure by hand.
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

<?php

/**
 * GC Content Calculator
 * /biology/gc-content-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'GC Content Calculator',
    'meta' => ['title' => 'GC Content Calculator: Formula, Steps & Results', 'description' => 'GC content is the share of guanine and cytosine in a sequence, and it predicts melting temperature, PCR difficulty, codon bias and even the organism a…', 'h1' => 'GC Content Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'g',
                            'label' => 'Guanine (G)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '220',
                        ],
                        [
                            'name' => 'c',
                            'label' => 'Cytosine (C)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '180',
                        ],
                        [
                            'name' => 'a',
                            'label' => 'Adenine (A)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '300',
                        ],
                        [
                            'name' => 't',
                            'label' => 'Thymine (T)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '300',
                        ],
                        [
                            'name' => 'gc',
                            'label' => 'GC content',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'at',
                            'label' => 'AT content',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Sequence length',
                            'type' => 'number',
                            'suffix' => 'nt',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tm',
                            'label' => 'Estimated Tm (GC rule)',
                            'type' => 'number',
                            'suffix' => '°C',
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
            'title' => 'Content',
            'results' => ['gc' => '(g+c)/(g+c+a+t)*100', 'at' => '(a+t)/(g+c+a+t)*100', 'length' => 'g+c+a+t', 'tm' => '64.9+41*((g+c)-16.4)/(g+c+a+t)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        GC content is the share of guanine and cytosine in a sequence, and it predicts melting temperature, PCR difficulty, codon bias and even the organism a sequence came from. It returns GC content, AT content, sequence length and estimated Tm (GC rule), and the panel shows all of them at once.
        
        This calculator takes counts or a raw sequence and returns GC content, AT content and the expected Tm.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the GC Content', 'html' => <<<'TXT'
            <p>GC content (%) = (G + C) ÷ (A + T + G + C) × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/gc-content-calculator.svg" width="720" height="300" loading="lazy" alt="Animated diagram: GC Content Calculator — Each base as a share of the sequence, GC highlighted." title="GC Content Calculator"><figcaption>Each base as a share of the sequence, GC highlighted.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>G, C, A, T</code></td><td>base counts</td><td>nt</td></tr><tr><td><code>GC content</code></td><td>share of G and C</td><td>%</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the GC Content?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: guanine (g) of <strong>220</strong>, cytosine (c) of <strong>180</strong>, adenine (a) of <strong>300</strong>, thymine (t) of <strong>300</strong>.</p>
            <p>Substituting them into the formula gives gc content of <strong>40</strong>%, at content of <strong>60</strong>%, sequence length of <strong>1,000</strong> nt, estimated tm (gc rule) of <strong>80.63</strong>°C.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>30 – 50%</td><td><strong>AT-rich</strong></td><td>lower Tm; may need additives or a lower annealing temperature</td></tr><tr><td>50 – 60%</td><td><strong>Typical</strong></td><td>most genomes and most successful primers</td></tr><tr><td>above 60%</td><td><strong>GC-rich</strong></td><td>secondary structure and hairpins; consider DMSO or betaine</td></tr></tbody></table>
            <ul><li><p>Human DNA averages about 41% GC; bacterial genomes range from 25% to 75%, and the number is often used to identify an organism from a genome assembly.</p></li><li><p>GC-rich templates form secondary structure that blocks polymerase processivity, which is why they need higher denaturation temperatures or cosolvents.</p></li><li><p>For primers, aim for 40–60% GC and check that the 3′ end is not a GC clamp of more than three bases.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Counting Ns or ambiguous bases as AT.</li><li>Computing GC content on the coding strand with a counting error introduced by line breaks.</li><li>Assuming 50% GC means an average primer — a 30-mer and a 15-mer at 50% have very different Tms.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a good GC content for a primer?', 'a' => '40–60%, with a Tm matched to its partner.'],
            ['q' => 'How does GC content affect sequencing?', 'a' => 'GC-rich regions sequence poorly because of secondary structure and polymerase stalling.'],
            ['q' => 'What does the GC Content actually calculate?', 'a' => <<<'TXT'
            It returns GC content, AT content, sequence length and estimated Tm (GC rule). Each one is derived by the formula on this page, so you can check any figure by hand.
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

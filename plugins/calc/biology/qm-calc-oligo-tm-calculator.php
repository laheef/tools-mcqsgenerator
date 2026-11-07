<?php

/**
 * Oligo Tm (Melting Temperature) Calculator
 * /biology/oligo-tm-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Oligo Tm (Melting Temperature) Calculator',
    'meta' => ['title' => 'Oligo Tm (Melting Temperature) Calculator — Biology', 'description' => 'Melting temperature is where half the oligo is unpaired, and it decides annealing temperatures, hybridisation conditions and whether a primer pair will work…', 'h1' => 'Oligo Tm (Melting Temperature) Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Oligo length',
                            'type' => 'number',
                            'suffix' => 'nt',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'gc',
                            'label' => 'Number of G and C bases',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '11',
                        ],
                        [
                            'name' => 'salt',
                            'label' => 'Monovalent salt',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'tm_salt',
                            'label' => 'Tm, GC rule with salt correction',
                            'type' => 'number',
                            'suffix' => '°C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tm_wallace',
                            'label' => 'Tm, Wallace',
                            'type' => 'number',
                            'suffix' => '°C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tm_gc',
                            'label' => 'Tm, GC rule',
                            'type' => 'number',
                            'suffix' => '°C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gc_pct',
                            'label' => 'GC content',
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
            'title' => 'Melting',
            'results' => ['gc_pct' => 'gc/length*100', 'tm_wallace' => '2*(length-gc)+4*gc', 'tm_gc' => '64.9+41*(gc-16.4)/length', 'tm_salt' => '64.9+41*(gc-16.4)/length+16.6*log10(salt/1000)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Melting temperature is where half the oligo is unpaired, and it decides annealing temperatures, hybridisation conditions and whether a primer pair will work together. It returns GC content, tm, Wallace, tm, GC rule and tm, GC rule with salt correction, and the panel shows all of them at once.
        
        This calculator offers the simple Wallace rule, the GC-based rule and the nearest-neighbour model that real protocols use.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Oligo Tm (Melting Temperature)', 'html' => <<<'TXT'
            <p>Wallace: Tm = 2(A+T) + 4(G+C); GC rule: Tm = 64.9 + 41(G+C − 16.4)/N; salt correction adds 16.6·log₁₀[Na⁺]</p>
            <figure class="calc-figure"><img src="/uploads/biology/oligo-tm-calculator.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Oligo Tm (Melting Temperature) Calculator — Three models, one oligo, a spread worth knowing about." title="Oligo Tm (Melting Temperature) Calculator"><figcaption>Three models, one oligo, a spread worth knowing about.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>A, T, G, C</code></td><td>base counts</td><td>nt</td></tr><tr><td><code>N</code></td><td>oligo length</td><td>nt</td></tr><tr><td><code>[Na⁺]</code></td><td>monovalent salt concentration</td><td>M</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Oligo Tm (Melting Temperature)?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: oligo length of <strong>20</strong> nt, number of g and c bases of <strong>11</strong>, monovalent salt of <strong>50</strong> mM.</p>
            <p>Substituting them into the formula gives gc content of <strong>55</strong>%, tm, wallace of <strong>62</strong>°C, tm, gc rule of <strong>53.83</strong>°C, tm, gc rule with salt correction of <strong>32.23</strong>°C.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>The Wallace rule is only valid for oligos of 14 nt or shorter; for longer primers it overestimates Tm badly.</p></li><li><p>The nearest-neighbour model is the one to trust: it accounts for stacking interactions between adjacent bases, which is why GC content alone is not enough.</p></li><li><p>The salt correction is large: going from 50 mM to 1 M Na⁺ adds about 16 °C to Tm.</p></li><li><p>The value shown here is the GC-based estimate with a salt correction; treat it as a strong starting point and confirm with a gradient.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Using the Wallace rule for a 25-mer.</li><li>Comparing Tm values computed by different methods and expecting them to agree.</li><li>Ignoring the magnesium concentration, which raises Tm further.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which Tm method should I use?', 'a' => 'Nearest-neighbour for anything you will actually order or anneal; Wallace for quick estimates of short oligos.'],
            ['q' => 'Does Tm depend on concentration?', 'a' => 'Yes — higher oligo concentration raises Tm, which is why 250 nM is quoted as a standard.'],
            ['q' => 'What does the Oligo Tm (Melting Temperature) actually calculate?', 'a' => <<<'TXT'
            It returns GC content, tm, Wallace, tm, GC rule and tm, GC rule with salt correction. Each one is derived by the formula on this page, so you can check any figure by hand.
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

<?php

/**
 * Fish Condition Factor Calculator
 * /biology/fish-condition-factor
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fish Condition Factor Calculator',
    'meta' => ['title' => 'Fish Condition Factor Calculator — Formula & Results', 'description' => 'Condition factor (K) compares a fish\'s weight with the weight you would expect for its length. It returns condition factor (K), expected weight at K = 1…', 'h1' => 'Fish Condition Factor Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Fish weight',
                            'type' => 'number',
                            'suffix' => 'g',
                            'help' => 'Total body weight',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '250',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Fork length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Fork of the tail to the snout',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'k',
                            'label' => 'Condition factor (K)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'expected',
                            'label' => 'Expected weight at K = 1',
                            'type' => 'number',
                            'suffix' => 'g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'deviation',
                            'label' => 'Weight against K = 1',
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
            'title' => 'Condition',
            'results' => [
                'k' => 'weight/length^3*100',
                'expected' => 'length^3/100',
                'deviation' => '(k-1)*100',
                'weight' => 'k*length^3/100',
                'length' => 'cbrt(weight*100/k)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Condition factor (K) compares a fish's weight with the weight you would expect for its length. It returns condition factor (K), expected weight at K = 1, weight against K = 1 and fish weight, and the panel shows all of them at once.
        
        It is the standard way to describe how well-fed, how healthy or how well-shaped a fish is, and it is used in fisheries assessment, aquaculture and aquarium husbandry.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Fish Condition Factor', 'html' => <<<'TXT'
            <p>K = (weight in grams ÷ fork length in cm³) × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/fish-condition-factor.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Fish Condition Factor Calculator — Where this fish sits on the usual condition scale." title="Fish Condition Factor Calculator"><figcaption>Where this fish sits on the usual condition scale.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>weight</code></td><td>total body weight</td><td>g</td></tr><tr><td><code>length</code></td><td>fork length</td><td>cm</td></tr><tr><td><code>k</code></td><td>Fulton's condition factor</td><td>—</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> Fulton (1904) condition factor; ranges follow standard fisheries assessment practice.</p>
            TXT],
            ['title' => 'How do I use the Fish Condition Factor?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Substituting them into the formula gives condition factor (k) of <strong>1.6</strong>, expected weight at k = 1 of <strong>156.25</strong> g, weight against k = 1 of <strong>60</strong>%, fish weight of <strong>250</strong> g, fork length of <strong>25</strong> cm.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 1.0</td><td><strong>Poor condition</strong></td><td>thin fish; check feeding, disease and water quality</td></tr><tr><td>1.0 – 1.4</td><td><strong>Normal</strong></td><td>the usual range for most species</td></tr><tr><td>above 1.4</td><td><strong>Excellent</strong></td><td>well fed, often pre-spawning or a deep-bodied species</td></tr></tbody></table>
            <ul><li><p>Fulton's K assumes the fish grows isometrically (weight ∝ length³). For species that change shape as they grow, the relative condition factor against a species-specific regression is the better measure.</p></li><li><p>K rises before spawning in females and falls after it, so single measurements taken at different times of year are not comparable.</p></li><li><p>A K below 1.0 in a well-fed tank usually means a water-quality or parasite problem, not underfeeding.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Using total length in one measurement and fork length in another — the difference is several per cent of length and 10% or more of K.</li><li>Weighing a wet fish with a wet net, or a gutted fish, without saying so.</li><li>Comparing K across species as if 1.0 meant the same thing everywhere.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>Most real jobs need two or three of these together:</p><p><a href="/biology/fish-density">Fish density</a>. <a href="/biology/farm-pond-fish-stocking">Farm pond fish stocking</a>. <a href="/biology/goldfish-years-to-human-years">Goldfish years to human years</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a good condition factor for a fish?', 'a' => <<<'TXT'
            Around 1.0–1.4 for most freshwater species; below 1.0 suggests the fish is thin for its length and above 1.4 that it is in good condition — but the normal band is species-specific.
            TXT],
            ['q' => 'Should I use fork length or total length?', 'a' => 'Whatever you use, use it consistently and say which. This calculator is set up for fork length, which is standard in fisheries work.'],
            ['q' => 'What does the Fish Condition Factor actually calculate?', 'a' => <<<'TXT'
            It returns condition factor (K), expected weight at K = 1, weight against K = 1 and fish weight. Each one is derived by the formula on this page, so you can check any figure by hand.
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

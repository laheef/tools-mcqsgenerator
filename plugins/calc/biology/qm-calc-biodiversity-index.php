<?php

/**
 * Biodiversity Index Calculator (Simpson)
 * /biology/biodiversity-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Biodiversity Index Calculator (Simpson)',
    'meta' => ['title' => 'Biodiversity Index Calculator (Simpson) — Biology', 'description' => 'The Simpson index is the probability that two individuals drawn at random belong to the same species. It returns total individuals, simpson dominance D…', 'h1' => 'Biodiversity Index Calculator (Simpson)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'n1',
                            'label' => 'Species 1 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'n2',
                            'label' => 'Species 2 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'n3',
                            'label' => 'Species 3 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'n4',
                            'label' => 'Species 4 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'n5',
                            'label' => 'Species 5 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'dom',
                            'label' => 'Simpson dominance D',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'div',
                            'label' => 'Simpson diversity 1 − D',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'inv',
                            'label' => 'Inverse Simpson 1 ÷ D',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'n',
                            'label' => 'Total individuals',
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
            'title' => 'Diversity',
            'results' => ['n' => 'n1+n2+n3+n4+n5', 'dom' => '(max(n1,0)*(max(n1,0)-1)+max(n2,0)*(max(n2,0)-1)+max(n3,0)*(max(n3,0)-1)+max(n4,0)*(max(n4,0)-1)+max(n5,0)*(max(n5,0)-1))/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1))', 'div' => <<<'TXT'
            1-(max(n1,0)*(max(n1,0)-1)+max(n2,0)*(max(n2,0)-1)+max(n3,0)*(max(n3,0)-1)+max(n4,0)*(max(n4,0)-1)+max(n5,0)*(max(n5,0)-1))/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1))
            TXT, 'inv' => <<<'TXT'
            1/((max(n1,0)*(max(n1,0)-1)+max(n2,0)*(max(n2,0)-1)+max(n3,0)*(max(n3,0)-1)+max(n4,0)*(max(n4,0)-1)+max(n5,0)*(max(n5,0)-1))/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1)))
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Simpson index is the probability that two individuals drawn at random belong to the same species. It returns total individuals, simpson dominance D, simpson diversity 1 − D and inverse Simpson 1 ÷ D, and the panel shows all of them at once.
        
        Subtract it from one and you have Simpson's diversity, the probability that they belong to different species — the most intuitive diversity number there is.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Biodiversity Index (Simpson)', 'html' => <<<'TXT'
            <p>D = Σ nᵢ(nᵢ − 1) ÷ [N(N − 1)]; diversity = 1 − D; inverse = 1 ÷ D</p>
            <figure class="calc-figure"><img src="/uploads/biology/biodiversity-index.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Biodiversity Index Calculator (Simpson) — Dominance against diversity for the same counts." title="Biodiversity Index Calculator (Simpson)"><figcaption>Dominance against diversity for the same counts.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>nᵢ</code></td><td>individuals of species i</td><td>individuals</td></tr><tr><td><code>N</code></td><td>all individuals</td><td>individuals</td></tr><tr><td><code>D</code></td><td>probability two draws are the same species</td><td>0–1</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Biodiversity Index (Simpson)?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: species 1 count of <strong>40</strong> individuals, species 2 count of <strong>25</strong> individuals, species 3 count of <strong>15</strong> individuals, species 4 count of <strong>10</strong> individuals, species 5 count of <strong>6</strong> individuals.</p>
            <p>Substituting them into the formula gives total individuals of <strong>96</strong>, simpson dominance d of <strong>0.273</strong>, simpson diversity 1 − d of <strong>0.727</strong>, inverse simpson 1 ÷ d of <strong>3.66</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1 − D below 0.5</td><td><strong>Low diversity</strong></td><td>one or two species dominate</td></tr><tr><td>0.5 – 0.8</td><td><strong>Moderate</strong></td><td>mixed community with clear dominants</td></tr><tr><td>above 0.8</td><td><strong>High diversity</strong></td><td>even, species-rich community</td></tr></tbody></table>
            <ul><li><p>The n(n − 1) form is the unbiased estimator for sampling without replacement; the simpler Σ p² is the population version and is slightly smaller.</p></li><li><p>Inverse Simpson, 1/D, is read as 'the effective number of equally common species' and is usually easier to explain than the index itself.</p></li><li><p>Simpson is less sensitive to rare species than Shannon, so it is the index to use when sampling is incomplete.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Using the biased Σ p² formula and calling it the unbiased Simpson index.</li><li>Averaging index values from replicate quadrats instead of computing from pooled counts.</li><li>Reporting D (dominance) when you mean 1 − D (diversity).</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/shannon-wiener-index">Shannon–Wiener index</a>. <a href="/biology/species-richness">Species richness</a>. <a href="/biology/berger-parker-index">Berger–Parker index</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Is a higher Simpson index more diverse?', 'a' => <<<'TXT'
            It depends which one: D (dominance) rises with uniformity of a single species being drawn twice, so higher D means lower diversity. 1 − D and 1/D rise with diversity.
            TXT],
            ['q' => 'Why does Simpson need the n − 1 terms?', 'a' => 'Because the second draw cannot be the same individual as the first.'],
            ['q' => 'What does the Biodiversity Index (Simpson) actually calculate?', 'a' => <<<'TXT'
            It returns total individuals, simpson dominance D, simpson diversity 1 − D and inverse Simpson 1 ÷ D. Each one is derived by the formula on this page, so you can check any figure by hand.
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

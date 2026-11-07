<?php

/**
 * Shannon–Wiener Diversity Index Calculator
 * /biology/shannon-wiener-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Shannon–Wiener Diversity Index Calculator',
    'meta' => ['title' => 'Shannon–Wiener Diversity Index Calculator — Biology', 'description' => 'The Shannon–Wiener index measures how uncertain you would be, picking one individual at random, about which species it belongs to. It rises with both the…', 'h1' => 'Shannon–Wiener Diversity Index Calculator', 'updated' => '2026-10-29'],
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
                            'name' => 'h',
                            'label' => 'Shannon index H′',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'evenness',
                            'label' => 'Pielou evenness J′',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'richness',
                            'label' => 'Species richness',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'max_h',
                            'label' => 'Maximum H′ for this richness',
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
            'results' => ['richness' => 'min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))+min(1,max(0,n4))+min(1,max(0,n5))', 'h' => <<<'TXT'
            (0-((max(n1,0.000001)/(n1+n2+n3+n4+n5))*log((max(n1,0.000001)/(n1+n2+n3+n4+n5)))+(max(n2,0.000001)/(n1+n2+n3+n4+n5))*log((max(n2,0.000001)/(n1+n2+n3+n4+n5)))+(max(n3,0.000001)/(n1+n2+n3+n4+n5))*log((max(n3,0.000001)/(n1+n2+n3+n4+n5)))+(max(n4,0.000001)/(n1+n2+n3+n4+n5))*log((max(n4,0.000001)/(n1+n2+n3+n4+n5)))+(max(n5,0.000001)/(n1+n2+n3+n4+n5))*log((max(n5,0.000001)/(n1+n2+n3+n4+n5)))))
            TXT, 'evenness' => <<<'TXT'
            ((0-((max(n1,0.000001)/(n1+n2+n3+n4+n5))*log((max(n1,0.000001)/(n1+n2+n3+n4+n5)))+(max(n2,0.000001)/(n1+n2+n3+n4+n5))*log((max(n2,0.000001)/(n1+n2+n3+n4+n5)))+(max(n3,0.000001)/(n1+n2+n3+n4+n5))*log((max(n3,0.000001)/(n1+n2+n3+n4+n5)))+(max(n4,0.000001)/(n1+n2+n3+n4+n5))*log((max(n4,0.000001)/(n1+n2+n3+n4+n5)))+(max(n5,0.000001)/(n1+n2+n3+n4+n5))*log((max(n5,0.000001)/(n1+n2+n3+n4+n5)))))/log(max(1,min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))+min(1,max(0,n4))+min(1,max(0,n5)))))
            TXT, 'max_h' => 'log(max(1,min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))+min(1,max(0,n4))+min(1,max(0,n5))))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Shannon–Wiener index measures how uncertain you would be, picking one individual at random, about which species it belongs to. It returns species richness, shannon index H′, pielou evenness J′ and maximum H′ for this richness, and the panel shows all of them at once.
        
        It rises with both the number of species and the evenness of their abundances, which is why it is the default diversity measure in ecology.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Shannon–Wiener Diversity Index', 'html' => <<<'TXT'
            <p>H′ = −Σ pᵢ ln pᵢ, where pᵢ = nᵢ ÷ N</p>
            <figure class="calc-figure"><img src="/uploads/biology/shannon-wiener-index.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Shannon–Wiener Diversity Index Calculator — Species abundances, and the diversity they add up to." title="Shannon–Wiener Diversity Index Calculator"><figcaption>Species abundances, and the diversity they add up to.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>nᵢ</code></td><td>individuals of species i</td><td>individuals</td></tr><tr><td><code>pᵢ</code></td><td>that species' share of all individuals</td><td>0–1</td></tr><tr><td><code>H′</code></td><td>Shannon–Wiener index</td><td>nats</td></tr><tr><td><code>J′</code></td><td>Pielou evenness, H′ ÷ ln S</td><td>0–1</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Shannon–Wiener Diversity Index?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: species 1 count of <strong>40</strong> individuals, species 2 count of <strong>25</strong> individuals, species 3 count of <strong>15</strong> individuals, species 4 count of <strong>10</strong> individuals, species 5 count of <strong>6</strong> individuals.</p>
            <p>Substituting them into the formula gives species richness of <strong>5</strong>, shannon index h′ of <strong>1.41</strong>, pielou evenness j′ of <strong>0.8786</strong>, maximum h′ for this richness of <strong>1.61</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>H′ below 1.0</td><td><strong>Low diversity</strong></td><td>dominated by one or two species</td></tr><tr><td>1.0 – 2.5</td><td><strong>Moderate</strong></td><td>typical of many temperate communities</td></tr><tr><td>above 2.5</td><td><strong>High diversity</strong></td><td>even, species-rich assemblages such as reefs or rainforest</td></tr></tbody></table>
            <ul><li><p>H′ is in nats when the logarithm is natural; versions using log₂ or log₁₀ give different numbers, so always state the base.</p></li><li><p>The index is sample-size dependent — a bigger sample almost always raises it. Compare rarefied values, or fix the effort between sites.</p></li><li><p>Pielou evenness J′ = H′ / ln S divides out richness, so a community can be poor but very even and score a high J′.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Mixing log bases between the index and the evenness calculation.</li><li>Comparing H′ from quadrats of different size or counted by different people.</li><li>Entering zeros for unrecorded species, which does not change H′ but does change richness.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a good Shannon index value?', 'a' => 'There is no universal threshold: values between 1.5 and 3.5 are common in nature, and the number is only meaningful next to another sample taken the same way.'],
            ['q' => 'What is the difference between H′ and the Simpson index?', 'a' => 'Shannon weights rare species more heavily; Simpson is dominated by the commonest ones.'],
            ['q' => 'What does the Shannon–Wiener Diversity Index actually calculate?', 'a' => <<<'TXT'
            It returns species richness, shannon index H′, pielou evenness J′ and maximum H′ for this richness. Each one is derived by the formula on this page, so you can check any figure by hand.
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

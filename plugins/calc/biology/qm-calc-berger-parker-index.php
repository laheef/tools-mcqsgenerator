<?php

/**
 * Berger–Parker Index Calculator
 * /biology/berger-parker-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Berger–Parker Index Calculator',
    'meta' => ['title' => 'Berger–Parker Index Calculator — Formula & Results', 'description' => <<<'TXT'
    The Berger–Parker index is the simplest dominance measure in ecology: the share of all individuals belonging to the commonest species. It needs no logarithm…
    TXT, 'h1' => 'Berger–Parker Index Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'dominant',
                            'label' => 'Count of the commonest species',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total individuals',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '400',
                        ],
                        [
                            'name' => 'index',
                            'label' => 'Berger–Parker index d',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'reciprocal',
                            'label' => 'Reciprocal 1/d',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dominance',
                            'label' => 'Dominance',
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
            'title' => 'Dominance',
            'results' => ['index' => 'dominant/total', 'reciprocal' => 'total/dominant', 'dominance' => 'dominant/total*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Berger–Parker index is the simplest dominance measure in ecology: the share of all individuals belonging to the commonest species. It returns berger–Parker index d, reciprocal 1/d and dominance, and the panel shows all of them at once.
        
        It needs no logarithm, no assumption about sampling, and it is easy to explain to a non-specialist.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Berger–Parker Index', 'html' => <<<'TXT'
            <p>d = N_max ÷ N</p>
            <figure class="calc-figure"><img src="/uploads/biology/berger-parker-index.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Berger–Parker Index Calculator — The dominant species against everything else." title="Berger–Parker Index Calculator"><figcaption>The dominant species against everything else.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>N_max</code></td><td>individuals of the commonest species</td><td>individuals</td></tr><tr><td><code>N</code></td><td>all individuals in the sample</td><td>individuals</td></tr><tr><td><code>d</code></td><td>dominance</td><td>0–1</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Berger–Parker Index?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: count of the commonest species of <strong>120</strong> individuals, total individuals of <strong>400</strong> individuals.</p>
            <p>Substituting them into the formula gives berger–parker index d of <strong>0.3</strong>, reciprocal 1/d of <strong>3.33</strong>, dominance of <strong>30</strong>%.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>d below 0.2</td><td><strong>Even community</strong></td><td>no species holds more than a fifth</td></tr><tr><td>0.2 – 0.5</td><td><strong>Moderate dominance</strong></td><td>typical of many temperate samples</td></tr><tr><td>above 0.5</td><td><strong>Strong dominance</strong></td><td>one species holds most individuals</td></tr></tbody></table>
            <ul><li><p>The reciprocal 1/d is the effective number of species and is easier to read: d = 0.25 means about four equally common species.</p></li><li><p>Berger–Parker ignores everything about the other species except their total, so two very different communities can share an index.</p></li><li><p>It is widely used in pollution and disturbance studies because it responds quickly and needs no specialist taxonomy beyond the dominant species.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using the total of a subsample in the numerator and the whole sample in the denominator.</li><li>Treating the index as a diversity measure — it is a dominance measure, so higher is less diverse.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does a Berger–Parker index of 0.1 mean?', 'a' => 'The commonest species is 10% of all individuals.'],
            ['q' => 'How does it relate to Simpson\'s index?', 'a' => 'Both are dominance measures; Berger–Parker uses only the top species, Simpson uses all of them.'],
            ['q' => 'What does the Berger–Parker Index actually calculate?', 'a' => 'It returns berger–Parker index d, reciprocal 1/d and dominance. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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

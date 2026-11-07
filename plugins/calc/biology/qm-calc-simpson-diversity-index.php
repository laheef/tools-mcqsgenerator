<?php

/**
 * Simpson's Diversity Index Calculator
 * /biology/simpson-diversity-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Simpson\'s Diversity Index Calculator',
    'meta' => ['title' => 'Simpson\'s Diversity Index Calculator — Biology', 'description' => 'Simpson\'s index measures how likely it is that two individuals picked at random from a community belong to the same species — so a high value means a low-dive', 'h1' => 'Simpson\'s Diversity Index Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Individuals of species 1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'n2',
                            'label' => 'Individuals of species 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'n3',
                            'label' => 'Individuals of species 3',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'n4',
                            'label' => 'Individuals of species 4',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'n5',
                            'label' => 'Individuals of species 5',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'd',
                            'label' => 'Simpson\'s index (D)',
                            'type' => 'number',
                            'help' => 'Probability two random individuals are the same species',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'diversity',
                            'label' => 'Simpson\'s diversity (1 − D)',
                            'type' => 'number',
                            'help' => 'Higher means more diverse',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'reciprocal',
                            'label' => 'Reciprocal index (1 ÷ D)',
                            'type' => 'number',
                            'help' => 'Effective number of species',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'evenness',
                            'label' => 'Evenness',
                            'type' => 'number',
                            'help' => '1 means every species is equally common',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'richness',
                            'label' => 'Species richness',
                            'type' => 'number',
                            'help' => 'Species with at least one individual',
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
            'title' => 'Index',
            'results' => [
                'richness' => 'if_else(n1>0,1,0)+if_else(n2>0,1,0)+if_else(n3>0,1,0)+if_else(n4>0,1,0)+if_else(n5>0,1,0)',
                'd' => '(n1*(n1-1)+n2*(n2-1)+n3*(n3-1)+n4*(n4-1)+n5*(n5-1))/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1))',
                'diversity' => '1-(n1*(n1-1)+n2*(n2-1)+n3*(n3-1)+n4*(n4-1)+n5*(n5-1))/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1))',
                'reciprocal' => '1/((n1*(n1-1)+n2*(n2-1)+n3*(n3-1)+n4*(n4-1)+n5*(n5-1))/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1)))',
                'evenness' => <<<'TXT'
                (1/((n1*(n1-1)+n2*(n2-1)+n3*(n3-1)+n4*(n4-1)+n5*(n5-1))/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1))))/(if_else(n1>0,1,0)+if_else(n2>0,1,0)+if_else(n3>0,1,0)+if_else(n4>0,1,0)+if_else(n5>0,1,0))
                TXT,
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Simpson's Diversity Index works out Simpson's index (D) and Simpson's diversity (1 − D) from Individuals of species 1, Individuals of species 2 and Individuals of species 3. Nothing is looked up on this page: Simpson's index (D) is computed from Individuals of species 1 and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Simpson\'s Diversity Index calculator works', 'html' => <<<'TXT'
            <p>The Simpson&#039;s Diversity Index calculator applies one relationship to 5 numbers and reports Simpson&#039;s index (D), Simpson&#039;s diversity (1 − D) and Reciprocal index (1 ÷ D).</p><p>Written with the labels from the form, Species richness = if_else(Individuals of species 1&gt;0,1,0) + if_else(Individuals of species 2&gt;0,1,0) + if_else(Individuals of species 3&gt;0,1,0) + if_else(Individuals of species 4&gt;0,1,0) + if_else(Individuals of species 5&gt;0,1,0).</p><p>The result panel carries Simpson&#039;s index (D), Simpson&#039;s diversity (1 − D), Reciprocal index (1 ÷ D) and Evenness, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Individuals of species 1</strong> — a plain number, no unit</li><li><strong>Individuals of species 2</strong> — a plain number, no unit</li><li><strong>Individuals of species 3</strong> — a plain number, no unit</li><li><strong>Individuals of species 4</strong> — a plain number, no unit</li><li><strong>Individuals of species 5</strong> — a plain number, no unit</li></ul><p>The answers come back as Simpson&#039;s index (D), Simpson&#039;s diversity (1 − D), Reciprocal index (1 ÷ D), Evenness, Species richness. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Individuals of species 1 = 40, Individuals of species 2 = 25, Individuals of species 3 = 15, Individuals of species 4 = 12 and Individuals of species 5 = 8 gives &lt;strong&gt;Species richness&lt;/strong&gt; = 5, &lt;strong&gt;Simpson&amp;#039;s index (D)&lt;/strong&gt; = 0.2584, &lt;strong&gt;Simpson&amp;#039;s diversity (1 − D)&lt;/strong&gt; = 0.7416, &lt;strong&gt;Reciprocal index (1 ÷ D)&lt;/strong&gt; = 3.87 and &lt;strong&gt;Evenness&lt;/strong&gt; = 0.774.</p><ul><li><strong>Species richness</strong> = 5</li><li><strong>Simpson&#039;s index (D)</strong> = 0.2584</li><li><strong>Simpson&#039;s diversity (1 − D)</strong> = 0.7416</li><li><strong>Reciprocal index (1 ÷ D)</strong> = 3.87</li><li><strong>Evenness</strong> = 0.774</li></ul><p>That is <strong>Species richness</strong> = <code>if_else(Individuals of species 1&gt;0,1,0) + if_else(Individuals of species 2&gt;0,1,0) + if_else(Individuals of species 3&gt;0,1,0) + if_else(Individuals of species 4&gt;0,1,0) + if_else(Individuals of species 5&gt;0,1,0)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Species richness&lt;/strong&gt; = 5, &lt;strong&gt;Simpson&amp;#039;s index (D)&lt;/strong&gt; = 0.2584, &lt;strong&gt;Simpson&amp;#039;s diversity (1 − D)&lt;/strong&gt; = 0.7416, &lt;strong&gt;Reciprocal index (1 ÷ D)&lt;/strong&gt; = 3.87 and &lt;strong&gt;Evenness&lt;/strong&gt; = 0.774. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Simpson&#039;s index (D) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Species richness</strong> = <code>if_else(Individuals of species 1&gt;0,1,0) + if_else(Individuals of species 2&gt;0,1,0) + if_else(Individuals of species 3&gt;0,1,0) + if_else(Individuals of species 4&gt;0,1,0) + if_else(Individuals of species 5&gt;0,1,0)</code></li></ul><p>Any one of Species richness, Simpson&#039;s index (D) and Simpson&#039;s diversity (1 − D) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Individuals of species 1, from 40 to 80 — and the answers go from &lt;strong&gt;Species richness&lt;/strong&gt; 5, &lt;strong&gt;Simpson&amp;#039;s index (D)&lt;/strong&gt; 0.2584, &lt;strong&gt;Simpson&amp;#039;s diversity (1 − D)&lt;/strong&gt; 0.7416, &lt;strong&gt;Reciprocal index (1 ÷ D)&lt;/strong&gt; 3.87 and &lt;strong&gt;Evenness&lt;/strong&gt; 0.774 to &lt;strong&gt;Species richness&lt;/strong&gt; 5, &lt;strong&gt;Simpson&amp;#039;s index (D)&lt;/strong&gt; 0.3761, &lt;strong&gt;Simpson&amp;#039;s diversity (1 − D)&lt;/strong&gt; 0.6239, &lt;strong&gt;Reciprocal index (1 ÷ D)&lt;/strong&gt; 2.66 and &lt;strong&gt;Evenness&lt;/strong&gt; 0.5318.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Simpson&#039;s index (D), Simpson&#039;s diversity (1 − D) and Reciprocal index (1 ÷ D) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Individuals of species 1 to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Individuals of species 1, Individuals of species 2 and Individuals of species 3 is what you already know and Simpson&#039;s index (D) and Simpson&#039;s diversity (1 − D) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/dna-molarity-calculator">DNA Molarity Calculator</a>, <a href="/biology/dna-molarity-from-mass">DNA Molarity from Mass or A260 Calculator</a> and <a href="/biology/dna-molecular-weight-calculator">DNA Molecular Weight Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Simpson\'s Diversity Index calculator work out?', 'a' => <<<'TXT'
            Simpson's index (D), Simpson's diversity (1 − D), Reciprocal index (1 ÷ D) and Evenness, from Individuals of species 1, Individuals of species 2, Individuals of species 3 and Individuals of species 4. The relationship is Species richness = if_else(Individuals of species 1>0,1,0) + if_else(Individuals of species 2>0,1,0) + if_else(Individuals of species 3>0,1,0) + if_else(Individuals of species 4>0,1,0) + if_else(Individuals of species 5>0,1,0).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Individuals of species 1, Individuals of species 2, Individuals of species 3, Individuals of species 4, Individuals of species 5. With n1, n2 and n3 in place, Simpson's index (D) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Species richness, Simpson's index (D), Simpson's diversity (1 − D) and Reciprocal index (1 ÷ D) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Species richness = 5, Simpson's index (D) = 0.2584, Simpson's diversity (1 − D) = 0.7416, Reciprocal index (1 ÷ D) = 3.87 and Evenness = 0.774. Those are the defaults written into the form — move Individuals of species 1 and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Simpson\'s index (D) is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Individuals of species 1 blank and the page solves for it, reporting Simpson\'s index (D) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Simpson\'s index (D) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dna-molarity-calculator', 'name' => 'DNA Molarity Calculator'],
            ['path' => '/biology/dna-molarity-from-mass', 'name' => 'DNA Molarity from Mass or A260 Calculator'],
            ['path' => '/biology/dna-molecular-weight-calculator', 'name' => 'DNA Molecular Weight Calculator'],
        ],
        'authors' => [],
    ],
];

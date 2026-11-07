<?php

/**
 * Sørensen Similarity Index Calculator
 * /biology/sorensen-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sørensen Similarity Index Calculator',
    'meta' => ['title' => 'Sørensen Similarity Index Calculator — Biology', 'description' => 'Sørensen Similarity Index turns Species only at site A, Species only at site B and Species at both sites into Sørensen similarity and Jaccard similarity.', 'h1' => 'Sørensen Similarity Index Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'a',
                            'label' => 'Species only at site A',
                            'type' => 'number',
                            'suffix' => 'species',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'b',
                            'label' => 'Species only at site B',
                            'type' => 'number',
                            'suffix' => 'species',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'c',
                            'label' => 'Species at both sites',
                            'type' => 'number',
                            'suffix' => 'species',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'sorensen',
                            'label' => 'Sørensen similarity',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'jaccard',
                            'label' => 'Jaccard similarity',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dissimilarity',
                            'label' => 'Sørensen dissimilarity',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'beta',
                            'label' => 'Beta diversity (Sørensen)',
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
            'title' => 'Similarity',
            'results' => ['sorensen' => '2*c/(2*c+a+b)', 'jaccard' => 'c/(a+b+c)', 'dissimilarity' => '(1-2*c/(2*c+a+b))*100', 'beta' => '(a+b)/(2*c+a+b)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Sørensen Similarity Index turns Species only at site A, Species only at site B and Species at both sites into Sørensen similarity and Jaccard similarity. It is a single relationship that reads Sørensen similarity out of Species only at site A, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Sørensen Similarity Index calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Sørensen Similarity Index: it takes 3 numbers and reports Sørensen similarity, Jaccard similarity and Sørensen dissimilarity.</p><p>In the form&#039;s own words, Sørensen similarity = 2 × Species at both sites ÷ (2 × Species at both sites + Species only at site A + Species only at site B).</p><p>What comes back is Sørensen similarity, Jaccard similarity, Sørensen dissimilarity and Beta diversity (Sørensen) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Species only at site A</strong> — in species</li><li><strong>Species only at site B</strong> — in species</li><li><strong>Species at both sites</strong> — in species</li></ul><p>The answers come back as Sørensen similarity, Jaccard similarity, Sørensen dissimilarity in %, Beta diversity (Sørensen). </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Species only at site A = 12 species, Species only at site B = 8 species and Species at both sites = 20 species; the answers are &lt;strong&gt;Sørensen similarity&lt;/strong&gt; = 0.6667, &lt;strong&gt;Jaccard similarity&lt;/strong&gt; = 0.5, &lt;strong&gt;Sørensen dissimilarity&lt;/strong&gt; = 33.33 % and &lt;strong&gt;Beta diversity (Sørensen)&lt;/strong&gt; = 0.3333.</p><ul><li><strong>Sørensen similarity</strong> = 0.6667</li><li><strong>Jaccard similarity</strong> = 0.5</li><li><strong>Sørensen dissimilarity</strong> = 33.33 %</li><li><strong>Beta diversity (Sørensen)</strong> = 0.3333</li></ul><p>That is <strong>Sørensen similarity</strong> = <code>2 × Species at both sites ÷ (2 × Species at both sites + Species only at site A + Species only at site B)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Sørensen similarity&lt;/strong&gt; = 0.6667, &lt;strong&gt;Jaccard similarity&lt;/strong&gt; = 0.5, &lt;strong&gt;Sørensen dissimilarity&lt;/strong&gt; = 33.33 and &lt;strong&gt;Beta diversity (Sørensen)&lt;/strong&gt; = 0.3333 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Sørensen similarity takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Sørensen similarity</strong> = <code>2 × Species at both sites ÷ (2 × Species at both sites + Species only at site A + Species only at site B)</code></li><li><strong>Jaccard similarity</strong> = <code>Species at both sites ÷ (Species only at site A + Species only at site B + Species at both sites)</code></li><li><strong>Sørensen dissimilarity</strong> = <code>(1 − 2 × Species at both sites ÷ (2 × Species at both sites + Species only at site A + Species only at site B)) × 100</code></li><li><strong>Beta diversity (Sørensen)</strong> = <code>(Species only at site A + Species only at site B) ÷ (2 × Species at both sites + Species only at site A + Species only at site B)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Sørensen similarity, Jaccard similarity and Sørensen dissimilarity can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Species only at site A from 12 to 24, leaving every other box alone. The panel moves from &lt;strong&gt;Sørensen similarity&lt;/strong&gt; 0.6667, &lt;strong&gt;Jaccard similarity&lt;/strong&gt; 0.5, &lt;strong&gt;Sørensen dissimilarity&lt;/strong&gt; 33.33 % and &lt;strong&gt;Beta diversity (Sørensen)&lt;/strong&gt; 0.3333 to &lt;strong&gt;Sørensen similarity&lt;/strong&gt; 0.5556, &lt;strong&gt;Jaccard similarity&lt;/strong&gt; 0.3846, &lt;strong&gt;Sørensen dissimilarity&lt;/strong&gt; 44.44 % and &lt;strong&gt;Beta diversity (Sørensen)&lt;/strong&gt; 0.4444.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Sørensen similarity, Jaccard similarity and Sørensen dissimilarity are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Species only at site A is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Species only at site A, Species only at site B and Species at both sites and the number you are missing is Sørensen similarity and Jaccard similarity.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/stomatal-density">Stomatal Density Calculator</a>, <a href="/biology/sulfur-soil-acidifier">Sulfur Soil Acidifier Calculator</a> and <a href="/biology/swine-gestation">Swine gestation Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sørensen Similarity Index calculator work out?', 'a' => <<<'TXT'
            Sørensen similarity, Jaccard similarity, Sørensen dissimilarity and Beta diversity (Sørensen), from Species at both sites, Species only at site A and Species only at site B. The relationship is Sørensen similarity = 2 × Species at both sites ÷ (2 × Species at both sites + Species only at site A + Species only at site B).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Species only at site A (species), Species only at site B (species), Species at both sites (species). Fill a, b and c and leave Sørensen similarity empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Sørensen similarity, Jaccard similarity, Sørensen dissimilarity and Beta diversity (Sørensen) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Sørensen similarity = 0.6667, Jaccard similarity = 0.5, Sørensen dissimilarity = 33.33 % and Beta diversity (Sørensen) = 0.3333. Those are the defaults written into the form — move Species only at site A and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Sørensen similarity is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Species only at site A blank and the page solves for it, reporting Sørensen similarity instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Sørensen similarity keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/stomatal-density', 'name' => 'Stomatal Density Calculator'],
            ['path' => '/biology/sulfur-soil-acidifier', 'name' => 'Sulfur Soil Acidifier Calculator'],
            ['path' => '/biology/swine-gestation', 'name' => 'Swine gestation Calculator'],
        ],
        'authors' => [],
    ],
];

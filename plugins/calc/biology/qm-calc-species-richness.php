<?php

/**
 * Species Richness Calculator
 * /biology/species-richness
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Species Richness Calculator',
    'meta' => ['title' => 'Species Richness Calculator — Formula & Results', 'description' => 'Species Richness works out Species richness S and Total individuals from Species 1 count, Species 2 count and Species 3 count. There is no hidden constant…', 'h1' => 'Species Richness Calculator', 'updated' => '2026-10-29'],
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
                            'name' => 'richness',
                            'label' => 'Species richness S',
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
                        [
                            'name' => 'margalef',
                            'label' => 'Margalef index',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'menhinick',
                            'label' => 'Menhinick index',
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
            'title' => 'Richness',
            'results' => ['n' => 'n1+n2+n3+n4+n5', 'richness' => 'min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))+min(1,max(0,n4))+min(1,max(0,n5))', 'margalef' => '(min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))+min(1,max(0,n4))+min(1,max(0,n5))-1)/log(n1+n2+n3+n4+n5)', 'menhinick' => '(min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))+min(1,max(0,n4))+min(1,max(0,n5)))/sqrt(n1+n2+n3+n4+n5)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Species Richness works out Species richness S and Total individuals from Species 1 count, Species 2 count and Species 3 count. There is no hidden constant here: change Species richness S and Species 1 count moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Species Richness calculator works', 'html' => <<<'TXT'
            <p>Species Richness answers one question from 5 numbers, and the answer is Species richness S, Total individuals and Margalef index.</p><p>Written with the labels from the form, Total individuals = Species 1 count + Species 2 count + Species 3 count + Species 4 count + Species 5 count.</p><p>The answers are Species richness S, Total individuals, Margalef index and Menhinick index; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>Species 1 count</strong> — in individuals</li><li><strong>Species 2 count</strong> — in individuals</li><li><strong>Species 3 count</strong> — in individuals</li><li><strong>Species 4 count</strong> — in individuals</li><li><strong>Species 5 count</strong> — in individuals</li></ul><p>What you get back is Species richness S, Total individuals, Margalef index, Menhinick index, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Species 1 count = 40 individuals, Species 2 count = 25 individuals, Species 3 count = 15 individuals, Species 4 count = 10 individuals and Species 5 count = 6 individuals; the answers are &lt;strong&gt;Total individuals&lt;/strong&gt; = 96, &lt;strong&gt;Species richness S&lt;/strong&gt; = 5, &lt;strong&gt;Margalef index&lt;/strong&gt; = 0.8764 and &lt;strong&gt;Menhinick index&lt;/strong&gt; = 0.5103.</p><ul><li><strong>Total individuals</strong> = 96</li><li><strong>Species richness S</strong> = 5</li><li><strong>Margalef index</strong> = 0.8764</li><li><strong>Menhinick index</strong> = 0.5103</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Total individuals</strong> = <code>Species 1 count + Species 2 count + Species 3 count + Species 4 count + Species 5 count</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Total individuals&lt;/strong&gt; = 96, &lt;strong&gt;Species richness S&lt;/strong&gt; = 5, &lt;strong&gt;Margalef index&lt;/strong&gt; = 0.8764 and &lt;strong&gt;Menhinick index&lt;/strong&gt; = 0.5103. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Species richness S is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total individuals</strong> = <code>Species 1 count + Species 2 count + Species 3 count + Species 4 count + Species 5 count</code></li><li><strong>Species richness S</strong> = <code>min(1,max(0,Species 1 count)) + min(1,max(0,Species 2 count)) + min(1,max(0,Species 3 count)) + min(1,max(0,Species 4 count)) + min(1,max(0,Species 5 count))</code></li></ul><p>Any one of Total individuals, Species richness S and Margalef index can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Species 1 count from 40 to 80, leaving every other box alone. The panel moves from &lt;strong&gt;Total individuals&lt;/strong&gt; 96, &lt;strong&gt;Species richness S&lt;/strong&gt; 5, &lt;strong&gt;Margalef index&lt;/strong&gt; 0.8764 and &lt;strong&gt;Menhinick index&lt;/strong&gt; 0.5103 to &lt;strong&gt;Total individuals&lt;/strong&gt; 136, &lt;strong&gt;Species richness S&lt;/strong&gt; 5, &lt;strong&gt;Margalef index&lt;/strong&gt; 0.8142 and &lt;strong&gt;Menhinick index&lt;/strong&gt; 0.4287.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Species richness S, Total individuals and Margalef index are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Species 1 count and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Species 1 count, Species 2 count and Species 3 count and the number you are missing is Species richness S and Total individuals.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/cedar-tree-value">Standing Timber Value Calculator</a>, <a href="/biology/stems-per-hectare">Stems Per Hectare Calculator</a> and <a href="/biology/stomatal-density">Stomatal Density Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Species Richness calculator work out?', 'a' => <<<'TXT'
            Species richness S, Total individuals, Margalef index and Menhinick index, from Species 1 count, Species 2 count, Species 3 count and Species 4 count. The relationship is Total individuals = Species 1 count + Species 2 count + Species 3 count + Species 4 count + Species 5 count.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Species 1 count (individuals), Species 2 count (individuals), Species 3 count (individuals), Species 4 count (individuals), Species 5 count (individuals). With n1, n2 and n3 in place, Species richness S can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total individuals, Species richness S, Margalef index and Menhinick index blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Total individuals = 96, Species richness S = 5, Margalef index = 0.8764 and Menhinick index = 0.5103. That comes from the page's own defaults, entered in Species 1 count; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Species richness S is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Species 1 count blank and the page solves for it, reporting Species richness S instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Species richness S keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/cedar-tree-value', 'name' => 'Standing Timber Value Calculator'],
            ['path' => '/biology/stems-per-hectare', 'name' => 'Stems Per Hectare Calculator'],
            ['path' => '/biology/stomatal-density', 'name' => 'Stomatal Density Calculator'],
        ],
        'authors' => [],
    ],
];

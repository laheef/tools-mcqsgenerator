<?php

/**
 * Relative Abundance Calculator
 * /biology/relative-abundance
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Relative Abundance Calculator',
    'meta' => ['title' => 'Relative Abundance Calculator — Formula & Results', 'description' => 'Relative Abundance turns Species 1, Species 2 and Species 3 into Species 1 relative abundance and Species 2 relative abundance. Species 1 relative abundance…', 'h1' => 'Relative Abundance Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Species 1',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'n2',
                            'label' => 'Species 2',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'n3',
                            'label' => 'Species 3',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'n4',
                            'label' => 'Species 4',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'n5',
                            'label' => 'Species 5',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'p1',
                            'label' => 'Species 1 relative abundance',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p2',
                            'label' => 'Species 2 relative abundance',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'n',
                            'label' => 'Community size',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'top3',
                            'label' => 'Top three species combined',
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
            'title' => 'Abundance',
            'results' => ['n' => 'n1+n2+n3+n4+n5', 'p1' => 'n1/(n1+n2+n3+n4+n5)*100', 'p2' => 'n2/(n1+n2+n3+n4+n5)*100', 'top3' => '(n1+n2+n3)/(n1+n2+n3+n4+n5)*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Relative Abundance turns Species 1, Species 2 and Species 3 into Species 1 relative abundance and Species 2 relative abundance. Nothing is looked up on this page: Species 1 relative abundance is computed from Species 1 and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Species 1 relative abundance is opened in %; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Relative Abundance calculator works', 'html' => <<<'TXT'
            <p>Relative Abundance answers one question from 5 numbers, and the answer is Species 1 relative abundance, Species 2 relative abundance and Community size.</p><p>Written with the labels from the form, Community size = Species 1 + Species 2 + Species 3 + Species 4 + Species 5.</p><p>What comes back is Species 1 relative abundance, Species 2 relative abundance, Community size and Top three species combined — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Species 1</strong> — in individuals</li><li><strong>Species 2</strong> — in individuals</li><li><strong>Species 3</strong> — in individuals</li><li><strong>Species 4</strong> — in individuals</li><li><strong>Species 5</strong> — in individuals</li></ul><p>The result boxes are Species 1 relative abundance in %, Species 2 relative abundance in %, Community size in individuals, Top three species combined in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Species 1 = 40 individuals, Species 2 = 25 individuals, Species 3 = 15 individuals, Species 4 = 10 individuals and Species 5 = 6 individuals; the answers are &lt;strong&gt;Community size&lt;/strong&gt; = 96 individuals, &lt;strong&gt;Species 1 relative abundance&lt;/strong&gt; = 41.67 %, &lt;strong&gt;Species 2 relative abundance&lt;/strong&gt; = 26.04 % and &lt;strong&gt;Top three species combined&lt;/strong&gt; = 83.33 %.</p><ul><li><strong>Community size</strong> = 96 individuals</li><li><strong>Species 1 relative abundance</strong> = 41.67 %</li><li><strong>Species 2 relative abundance</strong> = 26.04 %</li><li><strong>Top three species combined</strong> = 83.33 %</li></ul><p>The line behind those figures is <strong>Community size</strong> = <code>Species 1 + Species 2 + Species 3 + Species 4 + Species 5</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Community size&lt;/strong&gt; = 96, &lt;strong&gt;Species 1 relative abundance&lt;/strong&gt; = 41.67, &lt;strong&gt;Species 2 relative abundance&lt;/strong&gt; = 26.04 and &lt;strong&gt;Top three species combined&lt;/strong&gt; = 83.33 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Species 1 relative abundance takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Community size</strong> = <code>Species 1 + Species 2 + Species 3 + Species 4 + Species 5</code></li><li><strong>Species 1 relative abundance</strong> = <code>Species 1 ÷ (Species 1 + Species 2 + Species 3 + Species 4 + Species 5) × 100</code></li><li><strong>Species 2 relative abundance</strong> = <code>Species 2 ÷ (Species 1 + Species 2 + Species 3 + Species 4 + Species 5) × 100</code></li><li><strong>Top three species combined</strong> = <code>(Species 1 + Species 2 + Species 3) ÷ (Species 1 + Species 2 + Species 3 + Species 4 + Species 5) × 100</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Community size, Species 1 relative abundance and Species 2 relative abundance can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Species 1, from 40 to 80 — and the answers go from &lt;strong&gt;Community size&lt;/strong&gt; 96 individuals, &lt;strong&gt;Species 1 relative abundance&lt;/strong&gt; 41.67 %, &lt;strong&gt;Species 2 relative abundance&lt;/strong&gt; 26.04 % and &lt;strong&gt;Top three species combined&lt;/strong&gt; 83.33 % to &lt;strong&gt;Community size&lt;/strong&gt; 136 individuals, &lt;strong&gt;Species 1 relative abundance&lt;/strong&gt; 58.82 %, &lt;strong&gt;Species 2 relative abundance&lt;/strong&gt; 18.38 % and &lt;strong&gt;Top three species combined&lt;/strong&gt; 88.24 %.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Species 1 relative abundance, Species 2 relative abundance and Community size are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Species 1 is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Species 1, Species 2 and Species 3 is what you already know and Species 1 relative abundance and Species 2 relative abundance is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/net-primary-productivity">Net Primary Productivity Calculator</a>, <a href="/biology/net-reproductive-rate">Net Reproductive Rate (R₀) Calculator</a> and <a href="/biology/npk-fertilizer-blend">NPK Fertilizer Blend Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Relative Abundance calculator work out?', 'a' => <<<'TXT'
            Species 1 relative abundance, Species 2 relative abundance, Community size and Top three species combined, from Species 1, Species 2, Species 3 and Species 4. The relationship is Community size = Species 1 + Species 2 + Species 3 + Species 4 + Species 5.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Species 1 (individuals), Species 2 (individuals), Species 3 (individuals), Species 4 (individuals), Species 5 (individuals). Fill n1, n2 and n3 and leave Species 1 relative abundance empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Community size, Species 1 relative abundance, Species 2 relative abundance and Top three species combined can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Community size = 96 individuals, Species 1 relative abundance = 41.67 %, Species 2 relative abundance = 26.04 % and Top three species combined = 83.33 %. That comes from the page's own defaults, entered in Species 1; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Species 1 relative abundance is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Species 1 blank and the page solves for it, reporting Species 1 relative abundance instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Species 1 relative abundance keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/net-primary-productivity', 'name' => 'Net Primary Productivity Calculator'],
            ['path' => '/biology/net-reproductive-rate', 'name' => 'Net Reproductive Rate (R₀) Calculator'],
            ['path' => '/biology/npk-fertilizer-blend', 'name' => 'NPK Fertilizer Blend Calculator'],
        ],
        'authors' => [],
    ],
];

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
    'meta' => ['title' => 'Shannon–Wiener Diversity Index Calculator — Biology', 'description' => <<<'TXT'
    The Shannon–Wiener index measures how uncertain you would be, picking one individual at random, about which species it belongs to. Free shannon–wiener diversi
    TXT, 'h1' => 'Shannon–Wiener Diversity Index Calculator', 'updated' => '2026-10-29'],
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
        Shannon–Wiener Diversity Index turns Species 1 count, Species 2 count and Species 3 count into Shannon index H′ and Pielou evenness J′. It is a single relationship that reads Shannon index H′ out of Species 1 count, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Shannon–Wiener Diversity Index calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Shannon–Wiener Diversity Index: it takes 5 numbers and reports Shannon index H′, Pielou evenness J′ and Species richness.</p><p>The relationship it solves reads Species richness = min(1,max(0,Species 1 count)) + min(1,max(0,Species 2 count)) + min(1,max(0,Species 3 count)) + min(1,max(0,Species 4 count)) + min(1,max(0,Species 5 count)).</p><p>The result panel carries Shannon index H′, Pielou evenness J′, Species richness and Maximum H′ for this richness, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Species 1 count</strong> — in individuals</li><li><strong>Species 2 count</strong> — in individuals</li><li><strong>Species 3 count</strong> — in individuals</li><li><strong>Species 4 count</strong> — in individuals</li><li><strong>Species 5 count</strong> — in individuals</li></ul><p>The answers come back as Shannon index H′, Pielou evenness J′, Species richness, Maximum H′ for this richness. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Species 1 count = 40 individuals, Species 2 count = 25 individuals, Species 3 count = 15 individuals, Species 4 count = 10 individuals and Species 5 count = 6 individuals gives &lt;strong&gt;Species richness&lt;/strong&gt; = 5, &lt;strong&gt;Shannon index H′&lt;/strong&gt; = 1.41, &lt;strong&gt;Pielou evenness J′&lt;/strong&gt; = 0.8786 and &lt;strong&gt;Maximum H′ for this richness&lt;/strong&gt; = 1.61.</p><ul><li><strong>Species richness</strong> = 5</li><li><strong>Shannon index H′</strong> = 1.41</li><li><strong>Pielou evenness J′</strong> = 0.8786</li><li><strong>Maximum H′ for this richness</strong> = 1.61</li></ul><p>The line behind those figures is <strong>Species richness</strong> = <code>min(1,max(0,Species 1 count)) + min(1,max(0,Species 2 count)) + min(1,max(0,Species 3 count)) + min(1,max(0,Species 4 count)) + min(1,max(0,Species 5 count))</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Species richness&lt;/strong&gt; = 5, &lt;strong&gt;Shannon index H′&lt;/strong&gt; = 1.41, &lt;strong&gt;Pielou evenness J′&lt;/strong&gt; = 0.8786 and &lt;strong&gt;Maximum H′ for this richness&lt;/strong&gt; = 1.61 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Shannon index H′ takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Species richness</strong> = <code>min(1,max(0,Species 1 count)) + min(1,max(0,Species 2 count)) + min(1,max(0,Species 3 count)) + min(1,max(0,Species 4 count)) + min(1,max(0,Species 5 count))</code></li><li><strong>Maximum H′ for this richness</strong> = <code>ln(max(1,min(1,max(0,Species 1 count)) + min(1,max(0,Species 2 count)) + min(1,max(0,Species 3 count)) + min(1,max(0,Species 4 count)) + min(1,max(0,Species 5 count))))</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Species richness, Shannon index H′ and Pielou evenness J′ can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Species 1 count from 40 to 80, leaving every other box alone. The panel moves from &lt;strong&gt;Species richness&lt;/strong&gt; 5, &lt;strong&gt;Shannon index H′&lt;/strong&gt; 1.41, &lt;strong&gt;Pielou evenness J′&lt;/strong&gt; 0.8786 and &lt;strong&gt;Maximum H′ for this richness&lt;/strong&gt; 1.61 to &lt;strong&gt;Species richness&lt;/strong&gt; 5, &lt;strong&gt;Shannon index H′&lt;/strong&gt; 1.2, &lt;strong&gt;Pielou evenness J′&lt;/strong&gt; 0.7433 and &lt;strong&gt;Maximum H′ for this richness&lt;/strong&gt; 1.61.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Shannon index H′, Pielou evenness J′ and Species richness are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Species 1 count and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Species 1 count, Species 2 count and Species 3 count measured, Shannon index H′ and Pielou evenness J′ wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/cell-seeding-density">Cell Seeding Density Calculator</a>, <a href="/biology/cell-surface-area-volume-ratio">Cell Surface Area to Volume Ratio Calculator — Formula &amp; Resul</a> and <a href="/biology/centimorgan-to-percentage">Centimorgan to Percentage Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Shannon–Wiener Diversity Index calculator work out?', 'a' => <<<'TXT'
            Shannon index H′, Pielou evenness J′, Species richness and Maximum H′ for this richness, from Species 1 count, Species 2 count, Species 3 count and Species 4 count. The relationship is Species richness = min(1,max(0,Species 1 count)) + min(1,max(0,Species 2 count)) + min(1,max(0,Species 3 count)) + min(1,max(0,Species 4 count)) + min(1,max(0,Species 5 count)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Species 1 count (individuals), Species 2 count (individuals), Species 3 count (individuals), Species 4 count (individuals), Species 5 count (individuals). Fill n1, n2 and n3 and leave Shannon index H′ empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Species richness, Shannon index H′, Pielou evenness J′ and Maximum H′ for this richness can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Species richness = 5, Shannon index H′ = 1.41, Pielou evenness J′ = 0.8786 and Maximum H′ for this richness = 1.61. Those are the defaults written into the form — move Species 1 count and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Shannon index H′ is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Species 1 count left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Shannon index H′ keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/cell-seeding-density', 'name' => 'Cell Seeding Density Calculator'],
            ['path' => '/biology/cell-surface-area-volume-ratio', 'name' => 'Cell Surface Area to Volume Ratio Calculator — Formula & Resul'],
            ['path' => '/biology/centimorgan-to-percentage', 'name' => 'Centimorgan to Percentage Calculator'],
        ],
        'authors' => [],
    ],
];

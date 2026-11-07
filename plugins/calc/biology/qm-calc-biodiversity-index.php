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
    'meta' => ['title' => 'Biodiversity Index Calculator (Simpson) — Biology', 'description' => 'Enter Species 1 count, Species 2 count and Species 3 count into Biodiversity Index Calculator (Simpson) and the answer comes back as Simpson dominance D and…', 'h1' => 'Biodiversity Index Calculator (Simpson)', 'updated' => '2026-10-29'],
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
        Enter Species 1 count, Species 2 count and Species 3 count into Biodiversity Index Calculator (Simpson) and the answer comes back as Simpson dominance D and Simpson diversity 1 − D. The arithmetic is the whole method: Simpson dominance D is worked out from Species 1 count by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Biodiversity Index Calculator (Simpson) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Biodiversity Index Calculator (Simpson): it takes 5 numbers and reports Simpson dominance D, Simpson diversity 1 − D and Inverse Simpson 1 ÷ D.</p><p>In the form&#039;s own words, Total individuals = Species 1 count + Species 2 count + Species 3 count + Species 4 count + Species 5 count.</p><p>The answers are Simpson dominance D, Simpson diversity 1 − D, Inverse Simpson 1 ÷ D and Total individuals; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>Species 1 count</strong> — in individuals</li><li><strong>Species 2 count</strong> — in individuals</li><li><strong>Species 3 count</strong> — in individuals</li><li><strong>Species 4 count</strong> — in individuals</li><li><strong>Species 5 count</strong> — in individuals</li></ul><p>What you get back is Simpson dominance D, Simpson diversity 1 − D, Inverse Simpson 1 ÷ D, Total individuals, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Species 1 count = 40 individuals, Species 2 count = 25 individuals, Species 3 count = 15 individuals, Species 4 count = 10 individuals and Species 5 count = 6 individuals; the answers are &lt;strong&gt;Total individuals&lt;/strong&gt; = 96, &lt;strong&gt;Simpson dominance D&lt;/strong&gt; = 0.273, &lt;strong&gt;Simpson diversity 1 − D&lt;/strong&gt; = 0.727 and &lt;strong&gt;Inverse Simpson 1 ÷ D&lt;/strong&gt; = 3.66.</p><ul><li><strong>Total individuals</strong> = 96</li><li><strong>Simpson dominance D</strong> = 0.273</li><li><strong>Simpson diversity 1 − D</strong> = 0.727</li><li><strong>Inverse Simpson 1 ÷ D</strong> = 3.66</li></ul><p>The line behind those figures is <strong>Total individuals</strong> = <code>Species 1 count + Species 2 count + Species 3 count + Species 4 count + Species 5 count</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Total individuals&lt;/strong&gt; = 96, &lt;strong&gt;Simpson dominance D&lt;/strong&gt; = 0.273, &lt;strong&gt;Simpson diversity 1 − D&lt;/strong&gt; = 0.727 and &lt;strong&gt;Inverse Simpson 1 ÷ D&lt;/strong&gt; = 3.66. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Simpson dominance D is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total individuals</strong> = <code>Species 1 count + Species 2 count + Species 3 count + Species 4 count + Species 5 count</code></li></ul><p>Any one of Total individuals, Simpson dominance D and Simpson diversity 1 − D can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Species 1 count, from 40 to 80 — and the answers go from &lt;strong&gt;Total individuals&lt;/strong&gt; 96, &lt;strong&gt;Simpson dominance D&lt;/strong&gt; 0.273, &lt;strong&gt;Simpson diversity 1 − D&lt;/strong&gt; 0.727 and &lt;strong&gt;Inverse Simpson 1 ÷ D&lt;/strong&gt; 3.66 to &lt;strong&gt;Total individuals&lt;/strong&gt; 136, &lt;strong&gt;Simpson dominance D&lt;/strong&gt; 0.3949, &lt;strong&gt;Simpson diversity 1 − D&lt;/strong&gt; 0.6051 and &lt;strong&gt;Inverse Simpson 1 ÷ D&lt;/strong&gt; 2.53.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Simpson dominance D, Simpson diversity 1 − D and Inverse Simpson 1 ÷ D are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Species 1 count to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Species 1 count, Species 2 count and Species 3 count and the number you are missing is Simpson dominance D and Simpson diversity 1 − D.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/phenotypic-ratio">Phenotypic Ratio Calculator</a>, <a href="/biology/photosynthesis-rate">Photosynthesis Rate Calculator</a> and <a href="/biology/pig-weight">Pig Weight Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Biodiversity Index Calculator (Simpson) calculator work out?', 'a' => <<<'TXT'
            Simpson dominance D, Simpson diversity 1 − D, Inverse Simpson 1 ÷ D and Total individuals, from Species 1 count, Species 2 count, Species 3 count and Species 4 count. The relationship is Total individuals = Species 1 count + Species 2 count + Species 3 count + Species 4 count + Species 5 count.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Species 1 count (individuals), Species 2 count (individuals), Species 3 count (individuals), Species 4 count (individuals), Species 5 count (individuals). With n1, n2 and n3 in place, Simpson dominance D can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total individuals, Simpson dominance D, Simpson diversity 1 − D and Inverse Simpson 1 ÷ D blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Total individuals = 96, Simpson dominance D = 0.273, Simpson diversity 1 − D = 0.727 and Inverse Simpson 1 ÷ D = 3.66. The figures come from Species 1 count as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Simpson dominance D is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Species 1 count left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Simpson dominance D keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/phenotypic-ratio', 'name' => 'Phenotypic Ratio Calculator'],
            ['path' => '/biology/photosynthesis-rate', 'name' => 'Photosynthesis Rate Calculator'],
            ['path' => '/biology/pig-weight', 'name' => 'Pig Weight Calculator'],
        ],
        'authors' => [],
    ],
];

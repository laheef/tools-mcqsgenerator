<?php

/**
 * Phenotypic Ratio Calculator
 * /biology/phenotypic-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Phenotypic Ratio Calculator',
    'meta' => ['title' => 'Phenotypic Ratio Calculator — Formula & Results', 'description' => 'Phenotypic Ratio works out Total scored and Ratio to the smallest class from Class 1 count, Class 2 count and Class 3 count. Total scored, Ratio to the…', 'h1' => 'Phenotypic Ratio Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Class 1 count',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '180',
                        ],
                        [
                            'name' => 'b',
                            'label' => 'Class 2 count',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '62',
                        ],
                        [
                            'name' => 'c',
                            'label' => 'Class 3 count',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '58',
                        ],
                        [
                            'name' => 'd',
                            'label' => 'Class 4 count',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total scored',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Ratio to the smallest class',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pct1',
                            'label' => 'Class 1 share',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'chi',
                            'label' => 'Chi-square vs 9:3:3:1',
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
            'title' => 'Ratio',
            'results' => ['total' => 'a+b+c+d', 'ratio' => '(a+b+c+d)/min(min(a,b),min(c,d))', 'pct1' => 'a/(a+b+c+d)*100', 'chi' => 'pow(a-(a+b+c+d)*9/16,2)/((a+b+c+d)*9/16)+pow(b-(a+b+c+d)*3/16,2)/((a+b+c+d)*3/16)+pow(c-(a+b+c+d)*3/16,2)/((a+b+c+d)*3/16)+pow(d-(a+b+c+d)/16,2)/((a+b+c+d)/16)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Phenotypic Ratio works out Total scored and Ratio to the smallest class from Class 1 count, Class 2 count and Class 3 count. There is no hidden constant here: change Total scored and Class 1 count moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Phenotypic Ratio calculator works', 'html' => <<<'TXT'
            <p>Phenotypic Ratio answers one question from 4 numbers, and the answer is Total scored, Ratio to the smallest class and Class 1 share.</p><p>The relationship it solves reads Total scored = Class 1 count + Class 2 count + Class 3 count + Class 4 count.</p><p>The result panel carries Total scored, Ratio to the smallest class, Class 1 share and Chi-square vs 9:3:3:1, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Class 1 count</strong> — a plain number, no unit</li><li><strong>Class 2 count</strong> — a plain number, no unit</li><li><strong>Class 3 count</strong> — a plain number, no unit</li><li><strong>Class 4 count</strong> — a plain number, no unit</li></ul><p>The result boxes are Total scored, Ratio to the smallest class, Class 1 share in %, Chi-square vs 9:3:3:1; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Class 1 count = 180, Class 2 count = 62, Class 3 count = 58 and Class 4 count = 20 gives &lt;strong&gt;Total scored&lt;/strong&gt; = 320, &lt;strong&gt;Ratio to the smallest class&lt;/strong&gt; = 16, &lt;strong&gt;Class 1 share&lt;/strong&gt; = 56.25 % and &lt;strong&gt;Chi-square vs 9:3:3:1&lt;/strong&gt; = 0.1333.</p><ul><li><strong>Total scored</strong> = 320</li><li><strong>Ratio to the smallest class</strong> = 16</li><li><strong>Class 1 share</strong> = 56.25 %</li><li><strong>Chi-square vs 9:3:3:1</strong> = 0.1333</li></ul><p>The line behind those figures is <strong>Total scored</strong> = <code>Class 1 count + Class 2 count + Class 3 count + Class 4 count</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Total scored&lt;/strong&gt; = 320, &lt;strong&gt;Ratio to the smallest class&lt;/strong&gt; = 16, &lt;strong&gt;Class 1 share&lt;/strong&gt; = 56.25 and &lt;strong&gt;Chi-square vs 9:3:3:1&lt;/strong&gt; = 0.1333. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Total scored is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total scored</strong> = <code>Class 1 count + Class 2 count + Class 3 count + Class 4 count</code></li><li><strong>Ratio to the smallest class</strong> = <code>(Class 1 count + Class 2 count + Class 3 count + Class 4 count) ÷ min(min(Class 1 count,Class 2 count),min(Class 3 count,Class 4 count))</code></li><li><strong>Class 1 share</strong> = <code>Class 1 count ÷ (Class 1 count + Class 2 count + Class 3 count + Class 4 count) × 100</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total scored, Ratio to the smallest class and Class 1 share can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Class 1 count from 180 to 360, leaving every other box alone. The panel moves from &lt;strong&gt;Total scored&lt;/strong&gt; 320, &lt;strong&gt;Ratio to the smallest class&lt;/strong&gt; 16, &lt;strong&gt;Class 1 share&lt;/strong&gt; 56.25 % and &lt;strong&gt;Chi-square vs 9:3:3:1&lt;/strong&gt; 0.1333 to &lt;strong&gt;Total scored&lt;/strong&gt; 500, &lt;strong&gt;Ratio to the smallest class&lt;/strong&gt; 25, &lt;strong&gt;Class 1 share&lt;/strong&gt; 72 % and &lt;strong&gt;Chi-square vs 9:3:3:1&lt;/strong&gt; 50.49.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Total scored, Ratio to the smallest class and Class 1 share are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Class 1 count to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Class 1 count, Class 2 count and Class 3 count is what you already know and Total scored and Ratio to the smallest class is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/plasmid-copy-number">Plasmid Copy Number Calculator</a>, <a href="/biology/plasmid-molar-ratio">Plasmid Molar Ratio Calculator</a> and <a href="/biology/potting-soil-calculator">Potting soil Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Phenotypic Ratio calculator work out?', 'a' => <<<'TXT'
            Total scored, Ratio to the smallest class, Class 1 share and Chi-square vs 9:3:3:1, from Class 1 count, Class 2 count, Class 3 count and Class 4 count. The relationship is Total scored = Class 1 count + Class 2 count + Class 3 count + Class 4 count.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Class 1 count, Class 2 count, Class 3 count, Class 4 count. With a, b and c in place, Total scored can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Total scored, Ratio to the smallest class, Class 1 share and Chi-square vs 9:3:3:1 can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Total scored = 320, Ratio to the smallest class = 16, Class 1 share = 56.25 % and Chi-square vs 9:3:3:1 = 0.1333. That comes from the page's own defaults, entered in Class 1 count; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Total scored is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Class 1 count blank and the page solves for it, reporting Total scored instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Total scored keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/plasmid-copy-number', 'name' => 'Plasmid Copy Number Calculator'],
            ['path' => '/biology/plasmid-molar-ratio', 'name' => 'Plasmid Molar Ratio Calculator'],
            ['path' => '/biology/potting-soil-calculator', 'name' => 'Potting soil Calculator'],
        ],
        'authors' => [],
    ],
];

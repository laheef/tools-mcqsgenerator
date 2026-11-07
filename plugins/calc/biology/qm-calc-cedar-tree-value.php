<?php

/**
 * Standing Timber Value Calculator
 * /biology/cedar-tree-value
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Standing Timber Value Calculator',
    'meta' => ['title' => 'Standing Timber Value Calculator — Formula & Results', 'description' => 'Standing Timber Value works out Volume and Volume from Diameter at breast height, Merchantable height and Taper allowance. Local mill price for the species…', 'h1' => 'Standing Timber Value Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'dbh',
                            'label' => 'Diameter at breast height',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Measured 1.3 m above the ground',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'height',
                            'label' => 'Merchantable height',
                            'type' => 'number',
                            'suffix' => 'm',
                            'help' => 'Up to the first major fork or the top log',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'taper',
                            'label' => 'Taper allowance',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'The trunk narrows towards the top',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'price',
                            'label' => 'Price per board foot',
                            'type' => 'number',
                            'help' => 'Local mill price for the species and grade',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.2',
                        ],
                        [
                            'name' => 'trees',
                            'label' => 'Number of trees',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'board_feet',
                            'label' => 'Volume',
                            'type' => 'number',
                            'suffix' => 'board feet',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cubic_m',
                            'label' => 'Volume',
                            'type' => 'number',
                            'suffix' => 'm³',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'value',
                            'label' => 'Value per tree',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Value of the stand',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dbh_in',
                            'label' => 'Diameter',
                            'type' => 'number',
                            'suffix' => 'in',
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
            'title' => 'Value',
            'results' => [
                'dbh_in' => 'dbh/2.54',
                'cubic_m' => 'pi/4*(dbh/100*(1-taper/200))^2*height*0.42',
                'board_feet' => 'pi/4*(dbh/100*(1-taper/200))^2*height*0.42/0.002359737',
                'value' => 'board_feet*price',
                'total' => 'board_feet*price*trees',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Standing Timber Value works out Volume and Volume from Diameter at breast height, Merchantable height and Taper allowance. Nothing is looked up on this page: Volume is computed from Diameter at breast height and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Volume is opened in board feet; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Standing Timber Value calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Standing Timber Value: it takes 5 numbers and reports Volume, Volume and Value per tree.</p><p>In the form&#039;s own words, Diameter = Diameter at breast height ÷ 2.54.</p><p>The result panel carries Volume, Volume, Value per tree and Value of the stand, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Diameter at breast height</strong> — in cm. Measured 1.3 m above the ground</li><li><strong>Merchantable height</strong> — in m. Up to the first major fork or the top log</li><li><strong>Taper allowance</strong> — in %. The trunk narrows towards the top</li><li><strong>Price per board foot</strong> — a plain number, no unit. Local mill price for the species and grade</li><li><strong>Number of trees</strong> — a plain number, no unit</li></ul><p>The answers come back as Volume in board feet, Volume in m³, Value per tree, Value of the stand, Diameter in in. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Diameter at breast height = 40 cm, Merchantable height = 12 m, Taper allowance = 10 %, Price per board foot = 1.2 and Number of trees = 1; the answers are &lt;strong&gt;Diameter&lt;/strong&gt; = 15.75 in, &lt;strong&gt;Volume&lt;/strong&gt; = 0.5716 m³, &lt;strong&gt;Volume&lt;/strong&gt; = 242 board feet, &lt;strong&gt;Value per tree&lt;/strong&gt; = 291 and &lt;strong&gt;Value of the stand&lt;/strong&gt; = 291.</p><ul><li><strong>Diameter</strong> = 15.75 in</li><li><strong>Volume</strong> = 0.5716 m³</li><li><strong>Volume</strong> = 242 board feet</li><li><strong>Value per tree</strong> = 291</li><li><strong>Value of the stand</strong> = 291</li></ul><p>The line behind those figures is <strong>Diameter</strong> = <code>Diameter at breast height ÷ 2.54</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Diameter&lt;/strong&gt; = 15.75, &lt;strong&gt;Volume&lt;/strong&gt; = 0.5716, &lt;strong&gt;Volume&lt;/strong&gt; = 242, &lt;strong&gt;Value per tree&lt;/strong&gt; = 291 and &lt;strong&gt;Value of the stand&lt;/strong&gt; = 291. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Volume is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Diameter</strong> = <code>Diameter at breast height ÷ 2.54</code></li><li><strong>Volume</strong> = <code>pi ÷ 4 × (Diameter at breast height ÷ 100 × (1 − Taper allowance ÷ 200)) ^ 2 × Merchantable height × 0.42</code></li><li><strong>Value per tree</strong> = <code>Volume × Price per board foot</code></li><li><strong>Value of the stand</strong> = <code>Volume × Price per board foot × Number of trees</code></li></ul><p>Any one of Diameter, Volume and Volume can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Diameter at breast height, from 40 to 80 — and the answers go from &lt;strong&gt;Diameter&lt;/strong&gt; 15.75 in, &lt;strong&gt;Volume&lt;/strong&gt; 0.5716 m³, &lt;strong&gt;Volume&lt;/strong&gt; 242 board feet, &lt;strong&gt;Value per tree&lt;/strong&gt; 291 and &lt;strong&gt;Value of the stand&lt;/strong&gt; 291 to &lt;strong&gt;Diameter&lt;/strong&gt; 31.5 in, &lt;strong&gt;Volume&lt;/strong&gt; 2.29 m³, &lt;strong&gt;Volume&lt;/strong&gt; 969 board feet, &lt;strong&gt;Value per tree&lt;/strong&gt; 1163 and &lt;strong&gt;Value of the stand&lt;/strong&gt; 1163.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Volume, Volume and Value per tree are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Diameter at breast height and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Diameter at breast height, Merchantable height and Taper allowance is what you already know and Volume and Volume is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/cephalexin-for-dogs-dosage">Cephalexin for dogs dosage Calculator</a>, <a href="/biology/cephalic-index">Cephalic Index Calculator</a> and <a href="/biology/cfu-g-calculator">CFU/g Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Standing Timber Value calculator work out?', 'a' => 'Volume, Volume, Value per tree and Value of the stand, from Diameter at breast height. The relationship is Diameter = Diameter at breast height ÷ 2.54.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Diameter at breast height (cm), Merchantable height (m), Taper allowance (%), Price per board foot, Number of trees. With dbh, height and taper in place, Volume can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Diameter, Volume, Volume and Value per tree blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Diameter = 15.75 in, Volume = 0.5716 m³, Volume = 242 board feet, Value per tree = 291 and Value of the stand = 291. The figures come from Diameter at breast height as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Volume is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Diameter at breast height blank and the page solves for it, reporting Volume instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Volume keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/cephalexin-for-dogs-dosage', 'name' => 'Cephalexin for dogs dosage Calculator'],
            ['path' => '/biology/cephalic-index', 'name' => 'Cephalic Index Calculator'],
            ['path' => '/biology/cfu-g-calculator', 'name' => 'CFU/g Calculator'],
        ],
        'authors' => [],
    ],
];

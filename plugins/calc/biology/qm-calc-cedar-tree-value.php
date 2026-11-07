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
    'meta' => ['title' => 'Standing Timber Value Calculator — Formula & Results', 'description' => 'What a standing tree is worth: estimate the board feet in the trunk from its diameter and merchantable height, then apply the price per board foot.', 'h1' => 'Standing Timber Value Calculator', 'updated' => '2026-10-29'],
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
        What a standing tree is worth: estimate the board feet in the trunk from its diameter and merchantable height, then apply the price per board foot. It returns diameter, volume, volume and value per tree, and the panel shows all of them at once.
        
        It is the number a landowner needs before accepting an offer, and the one a logger uses to decide whether a tree is worth felling.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Standing Timber Value', 'html' => <<<'TXT'
            <p>Volume (m³) = π/4 × (D × taper factor)² × H × 0.42, the form factor of a mature conifer. Board feet = m³ ÷ 0.0023597. Value = board feet × price</p>
            <figure class="calc-figure"><img src="/uploads/biology/cedar-tree-value.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Standing Timber Value Calculator — Board feet in a 12 m merchantable trunk, by diameter" title="Standing Timber Value Calculator"><figcaption>Board feet in a 12 m merchantable trunk, by diameter</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>DBH</code></td><td>diameter at breast height, 1.3 m above the ground</td><td>cm or in</td></tr><tr><td><code>board foot</code></td><td>144 cubic inches of sawn timber, 1 ft × 1 ft × 1 in</td><td>—</td></tr><tr><td><code>merchantable height</code></td><td>the usable length of trunk</td><td>m</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Standing Timber Value?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Measure the diameter at 1.3 m and the merchantable height to the first major fork.</li><li>Enter the local price per board foot for the species and grade.</li><li>Read the volume in board feet and cubic metres, and the value per tree and for the stand.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: diameter at breast height of <strong>40</strong> cm, merchantable height of <strong>12</strong> m, taper allowance of <strong>10</strong>%, price per board foot of <strong>1.2</strong>, number of trees of <strong>1</strong>.</p>
            <p>Substituting them into the formula gives diameter of <strong>15.75</strong> in, volume of <strong>0.5716</strong> m³, volume of <strong>242.23</strong> board feet, value per tree of <strong>290.67</strong>, value of the stand of <strong>290.67</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>under 30 cm DBH</td><td><strong>Pole</strong></td><td>pulp or firewood value, not sawtimber</td></tr><tr><td>30 – 50 cm</td><td><strong>Small sawtimber</strong></td><td>the grade depends on knots and straightness</td></tr><tr><td>over 60 cm</td><td><strong>Mature sawtimber</strong></td><td>worth calling a forester before selling</td></tr></tbody></table>
            <ul><li><p>Board-foot rules are regional and approximate. The International ¼-inch rule, Scribner and Doyle each give different answers for the same tree — sometimes by 30%.</p></li><li><p>Diameter is measured at breast height and inside the bark. A quick tape around the trunk gives the circumference, which divides by π to give the diameter.</p></li><li><p>A standing tree is worth much less than its sawn volume: felling, hauling and milling take the majority of the retail price.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Measuring the diameter with the bark on and not subtracting for it, which overstates the volume.</li><li>Using the total height instead of the merchantable height to the first major fork.</li><li>Comparing a stumpage (standing) price with a delivered log price, which differ severalfold.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/fruit-tree-spacing">Fruit tree spacing</a>. <a href="/ecology/tree-benefits">Tree benefits</a>. <a href="/construction/lumber">Lumber calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I measure DBH with a tape?', 'a' => 'Measure the circumference at 1.3 m and divide by π; a 126 cm circumference is a 40 cm diameter.'],
            ['q' => 'What is a board foot?', 'a' => '144 cubic inches — a piece 1 ft × 1 ft × 1 in thick, the standard unit of sawn timber in North America.'],
            ['q' => 'Why do two people get different volumes for the same tree?', 'a' => 'Different board-foot rules. State which one you used before comparing prices.'],
            ['q' => 'What does the Standing Timber Value actually calculate?', 'a' => 'It returns diameter, volume, volume and value per tree. Each one is derived by the formula on this page, so you can check any figure by hand.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [],
    ],
];

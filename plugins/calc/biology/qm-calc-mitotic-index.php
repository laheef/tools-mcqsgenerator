<?php

/**
 * Mitotic Index Calculator
 * /biology/mitotic-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mitotic Index Calculator',
    'meta' => ['title' => 'Mitotic Index Calculator — Formula & Results', 'description' => 'The mitotic index is the percentage of cells caught in mitosis on a slide, the classic measure of proliferation in plant roots, tumour tissue and any treated', 'h1' => 'Mitotic Index Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'total',
                            'label' => 'Total cells counted',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1200',
                        ],
                        [
                            'name' => 'mitotic',
                            'label' => 'Cells in mitosis',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'help' => 'Prophase to telophase',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '96',
                        ],
                        [
                            'name' => 'prophase',
                            'label' => 'Prophase',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'help' => 'Optional phase breakdown',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'metaphase',
                            'label' => 'Metaphase',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '28',
                        ],
                        [
                            'name' => 'anaphase',
                            'label' => 'Anaphase',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '18',
                        ],
                        [
                            'name' => 'telophase',
                            'label' => 'Telophase',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'index',
                            'label' => 'Mitotic index',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_1000',
                            'label' => 'Mitotic cells per 1000',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'phase_check',
                            'label' => 'Phases add up to',
                            'type' => 'number',
                            'suffix' => 'cells',
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
            'results' => ['index' => 'mitotic/total*100', 'per_1000' => 'mitotic/total*1000', 'phase_check' => 'prophase+metaphase+anaphase+telophase'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Total cells counted, Cells in mitosis and Prophase into Mitotic Index and the answer comes back as Mitotic index and Mitotic cells per 1000. There is no hidden constant here: change Mitotic index and Total cells counted moves with it. The main result, Mitotic index, is reported in %.
        TXT,
        'sections' => [
            ['title' => 'How the Mitotic Index calculator works', 'html' => <<<'TXT'
            <p>The Mitotic Index calculator applies one relationship to 6 numbers and reports Mitotic index, Mitotic cells per 1000 and Phases add up to.</p><p>In the form&#039;s own words, Mitotic index = Cells in mitosis ÷ Total cells counted × 100.</p><p>The answers are Mitotic index, Mitotic cells per 1000 and Phases add up to; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs.</p><ul><li><strong>Total cells counted</strong> — in cells</li><li><strong>Cells in mitosis</strong> — in cells. Prophase to telophase</li><li><strong>Prophase</strong> — in cells. Optional phase breakdown</li><li><strong>Metaphase</strong> — in cells</li><li><strong>Anaphase</strong> — in cells</li><li><strong>Telophase</strong> — in cells</li></ul><p>The answers come back as Mitotic index in %, Mitotic cells per 1000, Phases add up to in cells. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Total cells counted = 1200 cells, Cells in mitosis = 96 cells, Prophase = 40 cells, Metaphase = 28 cells, Anaphase = 18 cells and Telophase = 10 cells; the answers are &lt;strong&gt;Mitotic index&lt;/strong&gt; = 8 %, &lt;strong&gt;Mitotic cells per 1000&lt;/strong&gt; = 80 and &lt;strong&gt;Phases add up to&lt;/strong&gt; = 96 cells.</p><ul><li><strong>Mitotic index</strong> = 8 %</li><li><strong>Mitotic cells per 1000</strong> = 80</li><li><strong>Phases add up to</strong> = 96 cells</li></ul><p>That is <strong>Mitotic index</strong> = <code>Cells in mitosis ÷ Total cells counted × 100</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Mitotic index&lt;/strong&gt; = 8, &lt;strong&gt;Mitotic cells per 1000&lt;/strong&gt; = 80 and &lt;strong&gt;Phases add up to&lt;/strong&gt; = 96. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Mitotic index is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Mitotic index</strong> = <code>Cells in mitosis ÷ Total cells counted × 100</code></li><li><strong>Mitotic cells per 1000</strong> = <code>Cells in mitosis ÷ Total cells counted × 1000</code></li><li><strong>Phases add up to</strong> = <code>Prophase + Metaphase + Anaphase + Telophase</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Mitotic index, Mitotic cells per 1000 and Phases add up to can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Total cells counted from 1200 to 2400, leaving every other box alone. The panel moves from &lt;strong&gt;Mitotic index&lt;/strong&gt; 8 %, &lt;strong&gt;Mitotic cells per 1000&lt;/strong&gt; 80 and &lt;strong&gt;Phases add up to&lt;/strong&gt; 96 cells to &lt;strong&gt;Mitotic index&lt;/strong&gt; 4 %, &lt;strong&gt;Mitotic cells per 1000&lt;/strong&gt; 40 and &lt;strong&gt;Phases add up to&lt;/strong&gt; 96 cells.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Mitotic index, Mitotic cells per 1000 and Phases add up to are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Total cells counted and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Total cells counted, Cells in mitosis and Prophase and the number you are missing is Mitotic index and Mitotic cells per 1000.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/lawn-fertilizer-rate">Lawn Fertilizer Rate Calculator</a>, <a href="/biology/mowing-cost">Lawn mowing Calculator</a> and <a href="/biology/tree-leaves">Leaves on tree Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mitotic Index calculator work out?', 'a' => <<<'TXT'
            Mitotic index, Mitotic cells per 1000 and Phases add up to, from Cells in mitosis and Total cells counted. The relationship is Mitotic index = Cells in mitosis ÷ Total cells counted × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total cells counted (cells), Cells in mitosis (cells), Prophase (cells), Metaphase (cells), Anaphase (cells). With total, mitotic and prophase in place, Mitotic index can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Mitotic index, Mitotic cells per 1000 and Phases add up to can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Mitotic index = 8 %, Mitotic cells per 1000 = 80 and Phases add up to = 96 cells. Those are the defaults written into the form — move Total cells counted and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Mitotic index is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Total cells counted left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Mitotic index keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/lawn-fertilizer-rate', 'name' => 'Lawn Fertilizer Rate Calculator'],
            ['path' => '/biology/mowing-cost', 'name' => 'Lawn mowing Calculator'],
            ['path' => '/biology/tree-leaves', 'name' => 'Leaves on tree Calculator'],
        ],
        'authors' => [],
    ],
];

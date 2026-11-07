<?php

/**
 * Trypan Blue Cell Viability Calculator
 * /biology/trypan-blue-cell-viability
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Trypan Blue Cell Viability Calculator',
    'meta' => ['title' => 'Trypan Blue Cell Viability Calculator — Biology', 'description' => 'Trypan Blue Cell Viability takes Live cells counted, Dead cells counted and Squares counted and returns Viability and Live cell concentration.', 'h1' => 'Trypan Blue Cell Viability Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'live',
                            'label' => 'Live cells counted',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '280',
                        ],
                        [
                            'name' => 'dead',
                            'label' => 'Dead cells counted',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'squares',
                            'label' => 'Squares counted',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Dilution factor',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => 'Includes the trypan blue mix',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'viability',
                            'label' => 'Viability',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'live_conc',
                            'label' => 'Live cell concentration',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_live',
                            'label' => 'Live cells in 10 mL',
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
            'title' => 'Viability',
            'results' => ['viability' => 'live/(live+dead)*100', 'live_conc' => 'live/squares*dilution*10000', 'total_live' => 'live/squares*dilution*10000*10'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Trypan Blue Cell Viability takes Live cells counted, Dead cells counted and Squares counted and returns Viability and Live cell concentration. It is a single relationship that reads Viability out of Live cells counted, not a table of canned results keyed by them. Units for Viability default to % and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Trypan Blue Cell Viability calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Trypan Blue Cell Viability: it takes 4 numbers and reports Viability, Live cell concentration and Live cells in 10 mL.</p><p>Written with the labels from the form, Viability = Live cells counted ÷ (Live cells counted + Dead cells counted) × 100.</p><p>The answers are Viability, Live cell concentration and Live cells in 10 mL; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Live cells counted</strong> — in cells</li><li><strong>Dead cells counted</strong> — in cells</li><li><strong>Squares counted</strong> — a plain number, no unit</li><li><strong>Dilution factor</strong> — in ×. Includes the trypan blue mix</li></ul><p>The result boxes are Viability in %, Live cell concentration in cells/mL, Live cells in 10 mL in cells; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Live cells counted = 280 cells, Dead cells counted = 40 cells, Squares counted = 4 and Dilution factor = 2 × gives &lt;strong&gt;Viability&lt;/strong&gt; = 87.5 %, &lt;strong&gt;Live cell concentration&lt;/strong&gt; = 1.400e+6 cells/mL and &lt;strong&gt;Live cells in 10 mL&lt;/strong&gt; = 1.400e+7 cells.</p><ul><li><strong>Viability</strong> = 87.5 %</li><li><strong>Live cell concentration</strong> = 1.400e+6 cells/mL</li><li><strong>Live cells in 10 mL</strong> = 1.400e+7 cells</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Viability</strong> = <code>Live cells counted ÷ (Live cells counted + Dead cells counted) × 100</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Viability&lt;/strong&gt; = 87.5, &lt;strong&gt;Live cell concentration&lt;/strong&gt; = 1.400e+6 and &lt;strong&gt;Live cells in 10 mL&lt;/strong&gt; = 1.400e+7 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Viability takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Viability</strong> = <code>Live cells counted ÷ (Live cells counted + Dead cells counted) × 100</code></li><li><strong>Live cell concentration</strong> = <code>Live cells counted ÷ Squares counted × Dilution factor × 10000</code></li><li><strong>Live cells in 10 mL</strong> = <code>Live cells counted ÷ Squares counted × Dilution factor × 10000 × 10</code></li></ul><p>Any one of Viability, Live cell concentration and Live cells in 10 mL can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Live cells counted from 280 to 560, leaving every other box alone. The panel moves from &lt;strong&gt;Viability&lt;/strong&gt; 87.5 %, &lt;strong&gt;Live cell concentration&lt;/strong&gt; 1.400e+6 cells/mL and &lt;strong&gt;Live cells in 10 mL&lt;/strong&gt; 1.400e+7 cells to &lt;strong&gt;Viability&lt;/strong&gt; 93.33 %, &lt;strong&gt;Live cell concentration&lt;/strong&gt; 2.800e+6 cells/mL and &lt;strong&gt;Live cells in 10 mL&lt;/strong&gt; 2.800e+7 cells.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Viability, Live cell concentration and Live cells in 10 mL are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Live cells counted and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Live cells counted, Dead cells counted and Squares counted is what you already know and Viability and Live cell concentration is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/how-big-will-my-cat-get">How big will my cat get Calculator</a>, <a href="/biology/huglin-index">Huglin Index Calculator</a> and <a href="/biology/hunting-tooth-ratio">Hunting Tooth Ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Trypan Blue Cell Viability calculator work out?', 'a' => <<<'TXT'
            Viability, Live cell concentration and Live cells in 10 mL, from Live cells counted and Dead cells counted. The relationship is Viability = Live cells counted ÷ (Live cells counted + Dead cells counted) × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Live cells counted (cells), Dead cells counted (cells), Squares counted, Dilution factor (×). Fill live, dead and squares and leave Viability empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Viability, Live cell concentration and Live cells in 10 mL blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Viability = 87.5 %, Live cell concentration = 1.400e+6 cells/mL and Live cells in 10 mL = 1.400e+7 cells. Those are the defaults written into the form — move Live cells counted and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Viability is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Live cells counted left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Viability at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/how-big-will-my-cat-get', 'name' => 'How big will my cat get Calculator'],
            ['path' => '/biology/huglin-index', 'name' => 'Huglin Index Calculator'],
            ['path' => '/biology/hunting-tooth-ratio', 'name' => 'Hunting Tooth Ratio Calculator'],
        ],
        'authors' => [],
    ],
];

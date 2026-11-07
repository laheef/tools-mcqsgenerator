<?php

/**
 * Percent Viability Calculator
 * /biology/percent-viability
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Percent Viability Calculator',
    'meta' => ['title' => 'Percent Viability Calculator — Formula & Results', 'description' => 'Enter Live cells and Dead cells into Percent Viability and the answer comes back as Viability and Non-viable. There is no hidden constant here: change…', 'h1' => 'Percent Viability Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Live cells',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '920',
                        ],
                        [
                            'name' => 'dead',
                            'label' => 'Dead cells',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '80',
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
                            'name' => 'dead_pct',
                            'label' => 'Non-viable',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Live to dead ratio',
                            'type' => 'number',
                            'suffix' => ':1',
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
            'results' => ['viability' => 'live/(live+dead)*100', 'dead_pct' => 'dead/(live+dead)*100', 'ratio' => 'live/dead'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Live cells and Dead cells into Percent Viability and the answer comes back as Viability and Non-viable. There is no hidden constant here: change Viability and Live cells moves with it. The main result, Viability, is reported in %.
        TXT,
        'sections' => [
            ['title' => 'How the Percent Viability calculator works', 'html' => <<<'TXT'
            <p>Percent Viability answers one question from 2 numbers, and the answer is Viability, Non-viable and Live to dead ratio.</p><p>Written with the labels from the form, Viability = Live cells ÷ (Live cells + Dead cells) × 100.</p><p>The answers are Viability, Non-viable and Live to dead ratio; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Live cells</strong> — in cells</li><li><strong>Dead cells</strong> — in cells</li></ul><p>The result boxes are Viability in %, Non-viable in %, Live to dead ratio in:1; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Live cells = 920 cells and Dead cells = 80 cells; the answers are &lt;strong&gt;Viability&lt;/strong&gt; = 92 %, &lt;strong&gt;Non-viable&lt;/strong&gt; = 8 % and &lt;strong&gt;Live to dead ratio&lt;/strong&gt; = 11.5:1.</p><ul><li><strong>Viability</strong> = 92 %</li><li><strong>Non-viable</strong> = 8 %</li><li><strong>Live to dead ratio</strong> = 11.5:1</li></ul><p>That is <strong>Viability</strong> = <code>Live cells ÷ (Live cells + Dead cells) × 100</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Viability&lt;/strong&gt; = 92, &lt;strong&gt;Non-viable&lt;/strong&gt; = 8 and &lt;strong&gt;Live to dead ratio&lt;/strong&gt; = 11.5. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Viability is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Viability</strong> = <code>Live cells ÷ (Live cells + Dead cells) × 100</code></li><li><strong>Non-viable</strong> = <code>Dead cells ÷ (Live cells + Dead cells) × 100</code></li><li><strong>Live to dead ratio</strong> = <code>Live cells ÷ Dead cells</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Viability, Non-viable and Live to dead ratio can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Live cells from 920 to 1840, leaving every other box alone. The panel moves from &lt;strong&gt;Viability&lt;/strong&gt; 92 %, &lt;strong&gt;Non-viable&lt;/strong&gt; 8 % and &lt;strong&gt;Live to dead ratio&lt;/strong&gt; 11.5:1 to &lt;strong&gt;Viability&lt;/strong&gt; 95.83 %, &lt;strong&gt;Non-viable&lt;/strong&gt; 4.17 % and &lt;strong&gt;Live to dead ratio&lt;/strong&gt; 23:1.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Viability, Non-viable and Live to dead ratio are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Live cells and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Live cells and Dead cells measured, Viability and Non-viable wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/od600-to-cell-density">OD600 to Cell Density Calculator</a>, <a href="/biology/genetic-odds-ratio">Odds Ratio for Genetics Calculator</a> and <a href="/biology/oligo-converter">Oligo pmol/µL to µg/mL Converter Calculator — Formula &amp; Result</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Percent Viability calculator work out?', 'a' => 'Viability, Non-viable and Live to dead ratio, from Live cells and Dead cells. The relationship is Viability = Live cells ÷ (Live cells + Dead cells) × 100.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Live cells (cells), Dead cells (cells). With live and dead in place, Viability can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Viability, Non-viable and Live to dead ratio can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Viability = 92 %, Non-viable = 8 % and Live to dead ratio = 11.5:1. Those are the defaults written into the form — move Live cells and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Viability is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Live cells blank and the page solves for it, reporting Viability instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Viability at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/od600-to-cell-density', 'name' => 'OD600 to Cell Density Calculator'],
            ['path' => '/biology/genetic-odds-ratio', 'name' => 'Odds Ratio for Genetics Calculator'],
            ['path' => '/biology/oligo-converter', 'name' => 'Oligo pmol/µL to µg/mL Converter Calculator — Formula & Result'],
        ],
        'authors' => [],
    ],
];

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
    'meta' => ['title' => 'Trypan Blue Cell Viability Calculator: Worked Example', 'description' => 'Trypan Blue Cell Viability Calculator turns live cells counted, dead cells counted and squares counted into live cell concentration and Live cells in 10 mL.', 'h1' => 'Trypan Blue Cell Viability Calculator', 'updated' => '2026-10-29'],
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
        Trypan Blue Cell Viability takes Live cells counted, Dead cells counted and Squares counted and returns Viability and Live cell concentration. It is a single relationship that reads viability out of live cells counted, not a table of canned results keyed by them. Units for Viability default to % and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Trypan Blue Cell Viability calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Trypan Blue Cell Viability: it takes 4 numbers and reports Viability, Live cell concentration and Live cells in 10 mL.</p><p>Written with the labels from the form, Viability = Live cells counted ÷ (Live cells counted + Dead cells counted) × 100.</p><p>The answers are Viability, Live cell concentration and Live cells in 10 mL; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Live cells counted</strong> — in cells</li><li><strong>Dead cells counted</strong> — in cells</li><li><strong>Squares counted</strong> — a plain number, no unit</li><li><strong>Dilution factor</strong> — in ×. Includes the trypan blue mix</li></ul><p>The result boxes are Viability in %, Live cell concentration in cells/mL, Live cells in 10 mL in cells; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Live cells counted = 280 cells, Dead cells counted = 40 cells, Squares counted = 4 and Dilution factor = 2 × gives <strong>Viability</strong> = 87.5 %, <strong>Live cell concentration</strong> = 1.400e+6 cells/mL and <strong>Live cells in 10 mL</strong> = 1.400e+7 cells.</p><ul><li><strong>Viability</strong> = 87.5 %</li><li><strong>Live cell concentration</strong> = 1.400e+6 cells/mL</li><li><strong>Live cells in 10 mL</strong> = 1.400e+7 cells</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Viability</strong> = <code>Live cells counted ÷ (Live cells counted + Dead cells counted) × 100</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Viability</strong> = 87.5, <strong>Live cell concentration</strong> = 1.400e+6 and <strong>Live cells in 10 mL</strong> = 1.400e+7 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Viability takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Viability</strong> = <code>Live cells counted ÷ (Live cells counted + Dead cells counted) × 100</code></li><li><strong>Live cell concentration</strong> = <code>Live cells counted ÷ Squares counted × Dilution factor × 10000</code></li><li><strong>Live cells in 10 mL</strong> = <code>Live cells counted ÷ Squares counted × Dilution factor × 10000 × 10</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Viability</strong> = <code>Live cells counted ÷ (Live cells counted + Dead cells counted) × 100</code> — the form to use when Live cells counted and Dead cells counted are the values you have.</li><li><strong>Live cell concentration</strong> = <code>Live cells counted ÷ Squares counted × Dilution factor × 10000</code> — the form to use when Live cells counted, Squares counted and Dilution factor are the values you have.</li><li><strong>Live cells in 10 mL</strong> = <code>Live cells counted ÷ Squares counted × Dilution factor × 10000 × 10</code> — the form to use when Live cells counted, Squares counted and Dilution factor are the values you have.</li></ul><p>Any one of Viability, Live cell concentration and Live cells in 10 mL can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Live cells counted from 280 to 560, leaving every other box alone. The panel moves from <strong>Viability</strong> 87.5 %, <strong>Live cell concentration</strong> 1.400e+6 cells/mL and <strong>Live cells in 10 mL</strong> 1.400e+7 cells to <strong>Viability</strong> 93.33 %, <strong>Live cell concentration</strong> 2.800e+6 cells/mL and <strong>Live cells in 10 mL</strong> 2.800e+7 cells.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box cannot be typed into: the results are worked out from the inputs above, and a past answer has to be entered as one of those inputs instead.</li><li><strong>Live cells counted left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Live cells counted is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Dead cells counted left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Dead cells counted is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Squares counted left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Squares counted is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Live cells counted and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Live cells counted</strong> is measured in cells. Change it and Viability, Live cell concentration and Live cells in 10 mL changes with it. Have it to hand before you start: Live cells counted is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Dead cells counted</strong> is measured in cells. Change it and Viability changes with it. Have it to hand before you start: Dead cells counted is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Squares counted</strong> takes a plain number with no unit attached. Change it and Live cell concentration and Live cells in 10 mL changes with it. Have it to hand before you start: Squares counted is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Dilution factor</strong> is measured in ×. Includes the trypan blue mix. Change it and Live cell concentration and Live cells in 10 mL changes with it. Have it to hand before you start: Dilution factor is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Viability</strong> is a plain number and the page's own defaults put it at 87.5. It is worked out from Live cells counted and Dead cells counted. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Live cell concentration</strong> is a plain number and the page's own defaults put it at 1.400e+6. It is worked out from Live cells counted, Squares counted and Dilution factor. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Live cells in 10 mL</strong> is a plain number and the page's own defaults put it at 1.400e+7. It is worked out from Live cells counted, Squares counted and Dilution factor. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Viability</th><th>Live cell concentration</th><th>Live cells in 10 mL</th></tr></thead><tbody><tr><td><strong>Live cells counted</strong> +10%</td><td>+1.15%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Dead cells counted</strong> +10%</td><td>-1.23%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Squares counted</strong> +10%</td><td>+0%</td><td>-9.09%</td><td>-9.09%</td></tr><tr><td><strong>Dilution factor</strong> +10%</td><td>+0%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Live cells counted sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Live cells counted = 140 cells, Dead cells counted = 20 cells, Squares counted = 2 and Dilution factor = 1 ×, the answer is <strong>Viability</strong> = 87.5 %, <strong>Live cell concentration</strong> = 700000 cells/mL and <strong>Live cells in 10 mL</strong> = 7.000e+6 cells.</li><li>With Live cells counted = 840 cells, Dead cells counted = 40 cells, Squares counted = 4 and Dilution factor = 2 ×, the answer is <strong>Viability</strong> = 95.45 %, <strong>Live cell concentration</strong> = 4.200e+6 cells/mL and <strong>Live cells in 10 mL</strong> = 4.200e+7 cells.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Viability follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
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
            Live cells counted (cells), Dead cells counted (cells), Squares counted, Dilution factor (×). Fill live cells counted, dead cells counted and squares counted and leave Viability empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Viability, Live cell concentration and Live cells in 10 mL blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Viability = 87.5 %, Live cell concentration = 1.400e+6 cells/mL and Live cells in 10 mL = 1.400e+7 cells. Those are the defaults written into the form — move Live cells counted and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Viability is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
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

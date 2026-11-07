<?php

/**
 * Fertilizer Injector Ratio Calculator
 * /biology/fertilizer-injector-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fertilizer Injector Ratio Calculator',
    'meta' => ['title' => 'Fertilizer Injector Ratio Calculator: Steps & Units', 'description' => 'Fertilizer Injector Ratio Calculator works out stock concentration from target nitrogen in the line and nitrogen in the fertilizer. Every figure is computed.', 'h1' => 'Fertilizer Injector Ratio Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'target',
                            'label' => 'Target nitrogen in the line',
                            'type' => 'number',
                            'suffix' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '150',
                        ],
                        [
                            'name' => 'n_pct',
                            'label' => 'Nitrogen in the fertilizer',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Injector ratio',
                            'type' => 'number',
                            'suffix' => ':1',
                            'help' => '1:100 means 1 part stock to 99 parts water',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'tank',
                            'label' => 'Stock tank size',
                            'type' => 'number',
                            'suffix' => 'L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '200',
                        ],
                        [
                            'name' => 'stock_ppm',
                            'label' => 'Stock concentration',
                            'type' => 'number',
                            'suffix' => 'ppm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_litre',
                            'label' => 'Fertilizer per litre of stock',
                            'type' => 'number',
                            'suffix' => 'g/L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_tank',
                            'label' => 'Fertilizer per tank',
                            'type' => 'number',
                            'suffix' => 'kg',
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
            'title' => 'Injection',
            'results' => ['stock_ppm' => 'target*ratio', 'per_litre' => 'target*ratio/n_pct/100/1000', 'per_tank' => 'target*ratio/n_pct/100/1000*tank'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Fertilizer Injector Ratio turns Target nitrogen in the line, Nitrogen in the fertilizer and Injector ratio into Stock concentration and Fertilizer per litre of stock. There is no hidden constant here: change stock concentration and target nitrogen in the line moves with it. The main result, Stock concentration, is reported in ppm.
        TXT,
        'sections' => [
            ['title' => 'How the Fertilizer Injector Ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Fertilizer Injector Ratio: it takes 4 numbers and reports Stock concentration, Fertilizer per litre of stock and Fertilizer per tank.</p><p>The relationship it solves reads Stock concentration = Target nitrogen in the line × Injector ratio.</p><p>The answers are Stock concentration, Fertilizer per litre of stock and Fertilizer per tank; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Target nitrogen in the line</strong> — in ppm</li><li><strong>Nitrogen in the fertilizer</strong> — in %</li><li><strong>Injector ratio</strong> — in :1. 1:100 means 1 part stock to 99 parts water</li><li><strong>Stock tank size</strong> — in L</li></ul><p>The answers come back as Stock concentration in ppm, Fertilizer per litre of stock in g/L, Fertilizer per tank in kg. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Target nitrogen in the line = 150 ppm, Nitrogen in the fertilizer = 20 %, Injector ratio = 100 :1 and Stock tank size = 200 L gives <strong>Stock concentration</strong> = 15000 ppm, <strong>Fertilizer per litre of stock</strong> = 0.0075 g/L and <strong>Fertilizer per tank</strong> = 1.5 kg.</p><ul><li><strong>Stock concentration</strong> = 15000 ppm</li><li><strong>Fertilizer per litre of stock</strong> = 0.0075 g/L</li><li><strong>Fertilizer per tank</strong> = 1.5 kg</li></ul><p>That is <strong>Stock concentration</strong> = <code>Target nitrogen in the line × Injector ratio</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Stock concentration</strong> = 15000, <strong>Fertilizer per litre of stock</strong> = 0.0075 and <strong>Fertilizer per tank</strong> = 1.5 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Stock concentration takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Stock concentration</strong> = <code>Target nitrogen in the line × Injector ratio</code></li><li><strong>Fertilizer per litre of stock</strong> = <code>Target nitrogen in the line × Injector ratio ÷ Nitrogen in the fertilizer ÷ 100 ÷ 1000</code></li><li><strong>Fertilizer per tank</strong> = <code>Target nitrogen in the line × Injector ratio ÷ Nitrogen in the fertilizer ÷ 100 ÷ 1000 × Stock tank size</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Stock concentration</strong> = <code>Target nitrogen in the line × Injector ratio</code> — the form to use when Target nitrogen in the line and Injector ratio are the values you have.</li><li><strong>Fertilizer per litre of stock</strong> = <code>Target nitrogen in the line × Injector ratio ÷ Nitrogen in the fertilizer ÷ 100 ÷ 1000</code> — the form to use when Target nitrogen in the line, Injector ratio and Nitrogen in the fertilizer are the values you have.</li><li><strong>Fertilizer per tank</strong> = <code>Target nitrogen in the line × Injector ratio ÷ Nitrogen in the fertilizer ÷ 100 ÷ 1000 × Stock tank size</code> — the form to use when Target nitrogen in the line, Injector ratio, Nitrogen in the fertilizer and Stock tank size are the values you have.</li></ul><p>Any one of Stock concentration, Fertilizer per litre of stock and Fertilizer per tank can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Target nitrogen in the line from 150 to 300, leaving every other box alone. The panel moves from <strong>Stock concentration</strong> 15000 ppm, <strong>Fertilizer per litre of stock</strong> 0.0075 g/L and <strong>Fertilizer per tank</strong> 1.5 kg to <strong>Stock concentration</strong> 30000 ppm, <strong>Fertilizer per litre of stock</strong> 0.015 g/L and <strong>Fertilizer per tank</strong> 3 kg.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Stock concentration, Fertilizer per litre of stock and Fertilizer per tank are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Target nitrogen in the line left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Target nitrogen in the line is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Nitrogen in the fertilizer left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Nitrogen in the fertilizer is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Injector ratio left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Injector ratio is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Target nitrogen in the line is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Target nitrogen in the line</strong> is measured in ppm. Change it and Stock concentration, Fertilizer per litre of stock and Fertilizer per tank changes with it. Have it to hand before you start: Target nitrogen in the line is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Nitrogen in the fertilizer</strong> is measured in %. Change it and Fertilizer per litre of stock and Fertilizer per tank changes with it. Have it to hand before you start: Nitrogen in the fertilizer is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Injector ratio</strong> is measured in :1. 1:100 means 1 part stock to 99 parts water. Change it and Stock concentration, Fertilizer per litre of stock and Fertilizer per tank changes with it. Have it to hand before you start: Injector ratio is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Stock tank size</strong> is measured in L. Change it and Fertilizer per tank changes with it. Have it to hand before you start: Stock tank size is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Stock concentration</strong> is a plain number and the page's own defaults put it at 15000. It is worked out from Target nitrogen in the line and Injector ratio. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Fertilizer per litre of stock</strong> is a plain number and the page's own defaults put it at 0.0075. It is worked out from Target nitrogen in the line, Injector ratio and Nitrogen in the fertilizer. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Fertilizer per tank</strong> is a plain number and the page's own defaults put it at 1.5. It is worked out from Target nitrogen in the line, Injector ratio, Nitrogen in the fertilizer and Stock tank size. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Stock concentration</th><th>Fertilizer per litre of stock</th><th>Fertilizer per tank</th></tr></thead><tbody><tr><td><strong>Target nitrogen in the line</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Nitrogen in the fertilizer</strong> +10%</td><td>+0%</td><td>-9.09%</td><td>-9.09%</td></tr><tr><td><strong>Injector ratio</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Stock tank size</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Injector ratio sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Target nitrogen in the line = 75 ppm, Nitrogen in the fertilizer = 10 %, Injector ratio = 50 :1 and Stock tank size = 100 L, the answer is <strong>Stock concentration</strong> = 3750 ppm, <strong>Fertilizer per litre of stock</strong> = 0.0038 g/L and <strong>Fertilizer per tank</strong> = 0.375 kg.</li><li>With Target nitrogen in the line = 450 ppm, Nitrogen in the fertilizer = 20 %, Injector ratio = 100 :1 and Stock tank size = 200 L, the answer is <strong>Stock concentration</strong> = 45000 ppm, <strong>Fertilizer per litre of stock</strong> = 0.0225 g/L and <strong>Fertilizer per tank</strong> = 4.5 kg.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Stock concentration follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Target nitrogen in the line, Nitrogen in the fertilizer and Injector ratio and the number you are missing is Stock concentration and Fertilizer per litre of stock.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dog-life-expectancy">Dog life expectancy Calculator</a>, <a href="/biology/dog-metacam">Dog Metacam dosage</a> and <a href="/biology/dog-onion-toxicity">Dog onion toxicity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fertilizer Injector Ratio calculator work out?', 'a' => <<<'TXT'
            Stock concentration, Fertilizer per litre of stock and Fertilizer per tank, from Target nitrogen in the line and Injector ratio. The relationship is Stock concentration = Target nitrogen in the line × Injector ratio.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Target nitrogen in the line (ppm), Nitrogen in the fertilizer (%), Injector ratio (:1), Stock tank size (L). Fill target nitrogen in the line, nitrogen in the fertilizer and injector ratio and leave Stock concentration empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Stock concentration, Fertilizer per litre of stock and Fertilizer per tank blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Stock concentration = 15000 ppm, Fertilizer per litre of stock = 0.0075 g/L and Fertilizer per tank = 1.5 kg. The figures come from Target nitrogen in the line as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Stock concentration is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Target nitrogen in the line left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Stock concentration keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dog-life-expectancy', 'name' => 'Dog life expectancy Calculator'],
            ['path' => '/biology/dog-metacam', 'name' => 'Dog Metacam dosage'],
            ['path' => '/biology/dog-onion-toxicity', 'name' => 'Dog onion toxicity'],
        ],
        'authors' => [],
    ],
];

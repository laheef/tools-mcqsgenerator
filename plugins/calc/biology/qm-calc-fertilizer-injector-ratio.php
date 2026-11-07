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
    'meta' => ['title' => 'Fertilizer Injector Ratio Calculator — Biology', 'description' => 'Fertilizer Injector Ratio turns Target nitrogen in the line, Nitrogen in the fertilizer and Injector ratio into Stock concentration and Fertilizer per litre…', 'h1' => 'Fertilizer Injector Ratio Calculator', 'updated' => '2026-10-29'],
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
        Fertilizer Injector Ratio turns Target nitrogen in the line, Nitrogen in the fertilizer and Injector ratio into Stock concentration and Fertilizer per litre of stock. There is no hidden constant here: change Stock concentration and Target nitrogen in the line moves with it. The main result, Stock concentration, is reported in ppm.
        TXT,
        'sections' => [
            ['title' => 'How the Fertilizer Injector Ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Fertilizer Injector Ratio: it takes 4 numbers and reports Stock concentration, Fertilizer per litre of stock and Fertilizer per tank.</p><p>The relationship it solves reads Stock concentration = Target nitrogen in the line × Injector ratio.</p><p>The answers are Stock concentration, Fertilizer per litre of stock and Fertilizer per tank; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Target nitrogen in the line</strong> — in ppm</li><li><strong>Nitrogen in the fertilizer</strong> — in %</li><li><strong>Injector ratio</strong> — in:1. 1:100 means 1 part stock to 99 parts water</li><li><strong>Stock tank size</strong> — in L</li></ul><p>The answers come back as Stock concentration in ppm, Fertilizer per litre of stock in g/L, Fertilizer per tank in kg. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Target nitrogen in the line = 150 ppm, Nitrogen in the fertilizer = 20 %, Injector ratio = 100:1 and Stock tank size = 200 L gives &lt;strong&gt;Stock concentration&lt;/strong&gt; = 15000 ppm, &lt;strong&gt;Fertilizer per litre of stock&lt;/strong&gt; = 0.0075 g/L and &lt;strong&gt;Fertilizer per tank&lt;/strong&gt; = 1.5 kg.</p><ul><li><strong>Stock concentration</strong> = 15000 ppm</li><li><strong>Fertilizer per litre of stock</strong> = 0.0075 g/L</li><li><strong>Fertilizer per tank</strong> = 1.5 kg</li></ul><p>That is <strong>Stock concentration</strong> = <code>Target nitrogen in the line × Injector ratio</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Stock concentration&lt;/strong&gt; = 15000, &lt;strong&gt;Fertilizer per litre of stock&lt;/strong&gt; = 0.0075 and &lt;strong&gt;Fertilizer per tank&lt;/strong&gt; = 1.5 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Stock concentration takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Stock concentration</strong> = <code>Target nitrogen in the line × Injector ratio</code></li><li><strong>Fertilizer per litre of stock</strong> = <code>Target nitrogen in the line × Injector ratio ÷ Nitrogen in the fertilizer ÷ 100 ÷ 1000</code></li><li><strong>Fertilizer per tank</strong> = <code>Target nitrogen in the line × Injector ratio ÷ Nitrogen in the fertilizer ÷ 100 ÷ 1000 × Stock tank size</code></li></ul><p>Any one of Stock concentration, Fertilizer per litre of stock and Fertilizer per tank can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Target nitrogen in the line from 150 to 300, leaving every other box alone. The panel moves from &lt;strong&gt;Stock concentration&lt;/strong&gt; 15000 ppm, &lt;strong&gt;Fertilizer per litre of stock&lt;/strong&gt; 0.0075 g/L and &lt;strong&gt;Fertilizer per tank&lt;/strong&gt; 1.5 kg to &lt;strong&gt;Stock concentration&lt;/strong&gt; 30000 ppm, &lt;strong&gt;Fertilizer per litre of stock&lt;/strong&gt; 0.015 g/L and &lt;strong&gt;Fertilizer per tank&lt;/strong&gt; 3 kg.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Stock concentration, Fertilizer per litre of stock and Fertilizer per tank are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Target nitrogen in the line is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
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
            Target nitrogen in the line (ppm), Nitrogen in the fertilizer (%), Injector ratio (:1), Stock tank size (L). Fill target, n_pct and ratio and leave Stock concentration empty if you would rather have that one solved instead.
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

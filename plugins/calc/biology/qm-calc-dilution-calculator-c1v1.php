<?php

/**
 * Dilution Calculator (C1V1 = C2V2)
 * /biology/dilution-calculator-c1v1
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dilution Calculator (C1V1 = C2V2)',
    'meta' => ['title' => 'Dilution (C1V1 = C2V2) Calculator — Formula & Results', 'description' => 'Stock volume, Diluent to add and Dilution factor are results, and each can be typed into. Stock volume, Diluent to add and Dilution factor, from Final…', 'h1' => 'Dilution Calculator (C1V1 = C2V2)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'c1',
                            'label' => 'Stock concentration',
                            'type' => 'number',
                            'suffix' => 'M',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'v1',
                            'label' => 'Stock volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'c2',
                            'label' => 'Final concentration',
                            'type' => 'number',
                            'suffix' => 'M',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                        [
                            'name' => 'v2',
                            'label' => 'Final volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'diluent',
                            'label' => 'Diluent to add',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fold',
                            'label' => 'Dilution factor',
                            'type' => 'number',
                            'suffix' => '×',
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
            'title' => 'Dilution',
            'results' => ['v1' => 'c2*v2/c1', 'diluent' => 'v2-c2*v2/c1', 'fold' => 'c1/c2'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dilution Calculator (C1V1 = C2V2) works out Stock volume and Diluent to add from Stock concentration, Final concentration and Final volume. There is no hidden constant here: change Stock volume and Stock concentration moves with it. The main result, Stock volume, is reported in mL.
        TXT,
        'sections' => [
            ['title' => 'How the Dilution Calculator (C1V1 = C2V2) calculator works', 'html' => <<<'TXT'
            <p>Dilution Calculator (C1V1 = C2V2) answers one question from 3 numbers, and the answer is Stock volume, Diluent to add and Dilution factor.</p><p>The relationship it solves reads Stock volume = Final concentration × Final volume ÷ Stock concentration.</p><p>What comes back is Stock volume, Diluent to add and Dilution factor — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Stock concentration</strong> — in M</li><li><strong>Final concentration</strong> — in M</li><li><strong>Final volume</strong> — in mL</li></ul><p>The answers come back as Stock volume in mL, Diluent to add in mL, Dilution factor in ×. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Stock concentration = 10 M, Final concentration = 0.5 M and Final volume = 100 mL — through the same formula and the panel reports &lt;strong&gt;Stock volume&lt;/strong&gt; = 5 mL, &lt;strong&gt;Diluent to add&lt;/strong&gt; = 95 mL and &lt;strong&gt;Dilution factor&lt;/strong&gt; = 20 ×.</p><ul><li><strong>Stock volume</strong> = 5 mL</li><li><strong>Diluent to add</strong> = 95 mL</li><li><strong>Dilution factor</strong> = 20 ×</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Stock volume</strong> = <code>Final concentration × Final volume ÷ Stock concentration</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Stock volume&lt;/strong&gt; = 5, &lt;strong&gt;Diluent to add&lt;/strong&gt; = 95 and &lt;strong&gt;Dilution factor&lt;/strong&gt; = 20. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Stock volume is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Stock volume</strong> = <code>Final concentration × Final volume ÷ Stock concentration</code></li><li><strong>Diluent to add</strong> = <code>Final volume − Final concentration × Final volume ÷ Stock concentration</code></li><li><strong>Dilution factor</strong> = <code>Stock concentration ÷ Final concentration</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Stock volume, Diluent to add and Dilution factor can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Stock concentration from 10 to 20, leaving every other box alone. The panel moves from &lt;strong&gt;Stock volume&lt;/strong&gt; 5 mL, &lt;strong&gt;Diluent to add&lt;/strong&gt; 95 mL and &lt;strong&gt;Dilution factor&lt;/strong&gt; 20 × to &lt;strong&gt;Stock volume&lt;/strong&gt; 2.5 mL, &lt;strong&gt;Diluent to add&lt;/strong&gt; 97.5 mL and &lt;strong&gt;Dilution factor&lt;/strong&gt; 40 ×.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Stock volume, Diluent to add and Dilution factor are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Stock concentration is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Stock concentration, Final concentration and Final volume measured, Stock volume and Diluent to add wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dog-chocolate-toxicity">Dog chocolate toxicity Calculator</a>, <a href="/biology/dog-coat-color">Dog Coat Colour Calculator</a> and <a href="/biology/dog-crate-size">Dog crate size</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dilution Calculator (C1V1 = C2V2) calculator work out?', 'a' => <<<'TXT'
            Stock volume, Diluent to add and Dilution factor, from Final concentration, Final volume and Stock concentration. The relationship is Stock volume = Final concentration × Final volume ÷ Stock concentration.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Stock concentration (M), Final concentration (M), Final volume (mL). Enter c1, c2 and v2; Stock volume is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Stock volume, Diluent to add and Dilution factor can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Stock volume = 5 mL, Diluent to add = 95 mL and Dilution factor = 20 ×. The figures come from Stock concentration as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Stock volume is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Stock concentration left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Stock volume keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dog-chocolate-toxicity', 'name' => 'Dog chocolate toxicity Calculator'],
            ['path' => '/biology/dog-coat-color', 'name' => 'Dog Coat Colour Calculator'],
            ['path' => '/biology/dog-crate-size', 'name' => 'Dog crate size'],
        ],
        'authors' => [],
    ],
];

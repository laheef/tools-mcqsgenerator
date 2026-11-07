<?php

/**
 * Coefficient of Coincidence Calculator
 * /biology/coefficient-of-coincidence
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Coefficient of Coincidence Calculator',
    'meta' => ['title' => 'Coefficient of Coincidence Calculator — Biology', 'description' => 'Coefficient of Coincidence turns Recombination frequency, region 1, Recombination frequency, region 2 and Observed double crossovers into Expected double…', 'h1' => 'Coefficient of Coincidence Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'region1',
                            'label' => 'Recombination frequency, region 1',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'region2',
                            'label' => 'Recombination frequency, region 2',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'observed',
                            'label' => 'Observed double crossovers',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '14',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total offspring',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'expected',
                            'label' => 'Expected double crossovers',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'coc',
                            'label' => 'Coefficient of coincidence',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'interference',
                            'label' => 'Interference',
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
            'title' => 'Crossovers',
            'results' => ['expected' => 'region1/100*region2/100*total', 'coc' => 'observed/(region1/100*region2/100*total)', 'interference' => '1-observed/(region1/100*region2/100*total)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Coefficient of Coincidence turns Recombination frequency, region 1, Recombination frequency, region 2 and Observed double crossovers into Expected double crossovers and Coefficient of coincidence. There is no hidden constant here: change Expected double crossovers and Recombination frequency, region 1 moves with it. The main result, Expected double crossovers, is reported in individuals.
        TXT,
        'sections' => [
            ['title' => 'How the Coefficient of Coincidence calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Coefficient of Coincidence: it takes 4 numbers and reports Expected double crossovers, Coefficient of coincidence and Interference.</p><p>In the form&#039;s own words, Expected double crossovers = Recombination frequency, region 1 ÷ 100 × Recombination frequency, region 2 ÷ 100 × Total offspring.</p><p>The result panel carries Expected double crossovers, Coefficient of coincidence and Interference, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Recombination frequency, region 1</strong> — in %</li><li><strong>Recombination frequency, region 2</strong> — in %</li><li><strong>Observed double crossovers</strong> — in individuals</li><li><strong>Total offspring</strong> — in individuals</li></ul><p>What you get back is Expected double crossovers in individuals, Coefficient of coincidence, Interference, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Recombination frequency, region 1 = 10 %, Recombination frequency, region 2 = 12 %, Observed double crossovers = 14 individuals and Total offspring = 1000 individuals gives &lt;strong&gt;Expected double crossovers&lt;/strong&gt; = 12 individuals, &lt;strong&gt;Coefficient of coincidence&lt;/strong&gt; = 1.17 and &lt;strong&gt;Interference&lt;/strong&gt; = -0.1667.</p><ul><li><strong>Expected double crossovers</strong> = 12 individuals</li><li><strong>Coefficient of coincidence</strong> = 1.17</li><li><strong>Interference</strong> = -0.1667</li></ul><p>The line behind those figures is <strong>Expected double crossovers</strong> = <code>Recombination frequency, region 1 ÷ 100 × Recombination frequency, region 2 ÷ 100 × Total offspring</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Expected double crossovers&lt;/strong&gt; = 12, &lt;strong&gt;Coefficient of coincidence&lt;/strong&gt; = 1.17 and &lt;strong&gt;Interference&lt;/strong&gt; = -0.1667 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Expected double crossovers takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Expected double crossovers</strong> = <code>Recombination frequency, region 1 ÷ 100 × Recombination frequency, region 2 ÷ 100 × Total offspring</code></li><li><strong>Coefficient of coincidence</strong> = <code>Observed double crossovers ÷ (Recombination frequency, region 1 ÷ 100 × Recombination frequency, region 2 ÷ 100 × Total offspring)</code></li><li><strong>Interference</strong> = <code>1 − Observed double crossovers ÷ (Recombination frequency, region 1 ÷ 100 × Recombination frequency, region 2 ÷ 100 × Total offspring)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Expected double crossovers, Coefficient of coincidence and Interference can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Recombination frequency, region 1 from 10 to 20, leaving every other box alone. The panel moves from &lt;strong&gt;Expected double crossovers&lt;/strong&gt; 12 individuals, &lt;strong&gt;Coefficient of coincidence&lt;/strong&gt; 1.17 and &lt;strong&gt;Interference&lt;/strong&gt; -0.1667 to &lt;strong&gt;Expected double crossovers&lt;/strong&gt; 24 individuals, &lt;strong&gt;Coefficient of coincidence&lt;/strong&gt; 0.5833 and &lt;strong&gt;Interference&lt;/strong&gt; 0.4167.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Expected double crossovers, Coefficient of coincidence and Interference are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Recombination frequency, region 1 and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Recombination frequency, region 1, Recombination frequency, region 2 and Observed double crossovers is what you already know and Expected double crossovers and Coefficient of coincidence is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/buffer-preparation-calculator">Buffer Preparation Calculator</a>, <a href="/biology/bulb-spacing">Bulb spacing</a> and <a href="/biology/cat-age">Cat age</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Coefficient of Coincidence calculator work out?', 'a' => <<<'TXT'
            Expected double crossovers, Coefficient of coincidence and Interference, from Recombination frequency, region 1, Recombination frequency, region 2 and Total offspring. The relationship is Expected double crossovers = Recombination frequency, region 1 ÷ 100 × Recombination frequency, region 2 ÷ 100 × Total offspring.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Recombination frequency, region 1 (%), Recombination frequency, region 2 (%), Observed double crossovers (individuals), Total offspring (individuals). Fill region1, region2 and observed and leave Expected double crossovers empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Expected double crossovers, Coefficient of coincidence and Interference can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Expected double crossovers = 12 individuals, Coefficient of coincidence = 1.17 and Interference = -0.1667. Those are the defaults written into the form — move Recombination frequency, region 1 and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Expected double crossovers is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Recombination frequency, region 1 left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Expected double crossovers keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/buffer-preparation-calculator', 'name' => 'Buffer Preparation Calculator'],
            ['path' => '/biology/bulb-spacing', 'name' => 'Bulb spacing'],
            ['path' => '/biology/cat-age', 'name' => 'Cat age'],
        ],
        'authors' => [],
    ],
];

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
    'meta' => ['title' => 'Coefficient of Coincidence Calculator: Steps & Units', 'description' => 'Coefficient of Coincidence Calculator works out expected double crossovers from recombination frequency, region 1 and recombination frequency, region 2.', 'h1' => 'Coefficient of Coincidence Calculator', 'updated' => '2026-10-29'],
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
        Coefficient of Coincidence turns Recombination frequency, region 1, Recombination frequency, region 2 and Observed double crossovers into Expected double crossovers and Coefficient of coincidence. There is no hidden constant here: change expected double crossovers and recombination frequency, region 1 moves with it. The main result, Expected double crossovers, is reported in individuals.
        TXT,
        'sections' => [
            ['title' => 'How the Coefficient of Coincidence calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Coefficient of Coincidence: it takes 4 numbers and reports Expected double crossovers, Coefficient of coincidence and Interference.</p><p>In the form&#039;s own words, Expected double crossovers = Recombination frequency, region 1 ÷ 100 × Recombination frequency, region 2 ÷ 100 × Total offspring.</p><p>The result panel carries Expected double crossovers, Coefficient of coincidence and Interference, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Recombination frequency, region 1</strong> — in %</li><li><strong>Recombination frequency, region 2</strong> — in %</li><li><strong>Observed double crossovers</strong> — in individuals</li><li><strong>Total offspring</strong> — in individuals</li></ul><p>What you get back is Expected double crossovers in individuals, Coefficient of coincidence, Interference, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Recombination frequency, region 1 = 10 %, Recombination frequency, region 2 = 12 %, Observed double crossovers = 14 individuals and Total offspring = 1000 individuals gives <strong>Expected double crossovers</strong> = 12 individuals, <strong>Coefficient of coincidence</strong> = 1.17 and <strong>Interference</strong> = -0.1667.</p><ul><li><strong>Expected double crossovers</strong> = 12 individuals</li><li><strong>Coefficient of coincidence</strong> = 1.17</li><li><strong>Interference</strong> = -0.1667</li></ul><p>The line behind those figures is <strong>Expected double crossovers</strong> = <code>Recombination frequency, region 1 ÷ 100 × Recombination frequency, region 2 ÷ 100 × Total offspring</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Expected double crossovers</strong> = 12, <strong>Coefficient of coincidence</strong> = 1.17 and <strong>Interference</strong> = -0.1667 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Expected double crossovers takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Expected double crossovers</strong> = <code>Recombination frequency, region 1 ÷ 100 × Recombination frequency, region 2 ÷ 100 × Total offspring</code></li><li><strong>Coefficient of coincidence</strong> = <code>Observed double crossovers ÷ (Recombination frequency, region 1 ÷ 100 × Recombination frequency, region 2 ÷ 100 × Total offspring)</code></li><li><strong>Interference</strong> = <code>1 − Observed double crossovers ÷ (Recombination frequency, region 1 ÷ 100 × Recombination frequency, region 2 ÷ 100 × Total offspring)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Expected double crossovers</strong> = <code>Recombination frequency, region 1 ÷ 100 × Recombination frequency, region 2 ÷ 100 × Total offspring</code> — the form to use when Recombination frequency, region 1, Recombination frequency, region 2 and Total offspring are the values you have.</li><li><strong>Coefficient of coincidence</strong> = <code>Observed double crossovers ÷ (Recombination frequency, region 1 ÷ 100 × Recombination frequency, region 2 ÷ 100 × Total offspring)</code> — the form to use when Observed double crossovers, Recombination frequency, region 1, Recombination frequency, region 2 and Total offspring are the values you have.</li><li><strong>Interference</strong> = <code>1 − Observed double crossovers ÷ (Recombination frequency, region 1 ÷ 100 × Recombination frequency, region 2 ÷ 100 × Total offspring)</code> — the form to use when Observed double crossovers, Recombination frequency, region 1, Recombination frequency, region 2 and Total offspring are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Expected double crossovers, Coefficient of coincidence and Interference can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Recombination frequency, region 1 from 10 to 20, leaving every other box alone. The panel moves from <strong>Expected double crossovers</strong> 12 individuals, <strong>Coefficient of coincidence</strong> 1.17 and <strong>Interference</strong> -0.1667 to <strong>Expected double crossovers</strong> 24 individuals, <strong>Coefficient of coincidence</strong> 0.5833 and <strong>Interference</strong> 0.4167.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Expected double crossovers, Coefficient of coincidence and Interference are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Recombination frequency, region 1 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Recombination frequency, region 1 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Recombination frequency, region 2 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Recombination frequency, region 2 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Observed double crossovers left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Observed double crossovers is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Recombination frequency, region 1 and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Recombination frequency, region 1</strong> is measured in %. It feeds Expected double crossovers, Coefficient of coincidence and Interference. Have it to hand before you start: Recombination frequency, region 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Recombination frequency, region 2</strong> is measured in %. It feeds Expected double crossovers, Coefficient of coincidence and Interference. Have it to hand before you start: Recombination frequency, region 2 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Observed double crossovers</strong> is measured in individuals. It feeds Coefficient of coincidence and Interference. Have it to hand before you start: Observed double crossovers is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total offspring</strong> is measured in individuals. It feeds Expected double crossovers, Coefficient of coincidence and Interference. Have it to hand before you start: Total offspring is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Expected double crossovers</strong> is a plain number and the page's own defaults put it at 12. It is computed from Recombination frequency, region 1, Recombination frequency, region 2 and Total offspring, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Coefficient of coincidence</strong> is a plain number and the page's own defaults put it at 1.17. It is computed from Observed double crossovers, Recombination frequency, region 1, Recombination frequency, region 2 and Total offspring, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Interference</strong> is a plain number and the page's own defaults put it at -0.1667. It is computed from Observed double crossovers, Recombination frequency, region 1, Recombination frequency, region 2 and Total offspring, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Expected double crossovers</th><th>Coefficient of coincidence</th><th>Interference</th></tr></thead><tbody><tr><td><strong>Recombination frequency, region 1</strong> +10%</td><td>+10%</td><td>-9.09%</td><td>+63.64%</td></tr><tr><td><strong>Recombination frequency, region 2</strong> +10%</td><td>+10%</td><td>-9.09%</td><td>+63.64%</td></tr><tr><td><strong>Observed double crossovers</strong> +10%</td><td>+0%</td><td>+10%</td><td>-70%</td></tr><tr><td><strong>Total offspring</strong> +10%</td><td>+10%</td><td>-9.09%</td><td>+63.64%</td></tr></tbody></table><p>Ranked by leverage, Observed double crossovers sits at the top — a ten per cent error in that box shows up as roughly 70 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Recombination frequency, region 1 = 5 %, Recombination frequency, region 2 = 6 %, Observed double crossovers = 7 individuals and Total offspring = 500 individuals, the answer is <strong>Expected double crossovers</strong> = 1.5 individuals, <strong>Coefficient of coincidence</strong> = 4.67 and <strong>Interference</strong> = -3.67.</li><li>With Recombination frequency, region 1 = 30 %, Recombination frequency, region 2 = 12 %, Observed double crossovers = 14 individuals and Total offspring = 1000 individuals, the answer is <strong>Expected double crossovers</strong> = 36 individuals, <strong>Coefficient of coincidence</strong> = 0.3889 and <strong>Interference</strong> = 0.6111.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Expected double crossovers follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
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
            Recombination frequency, region 1 (%), Recombination frequency, region 2 (%), Observed double crossovers (individuals), Total offspring (individuals). Fill recombination frequency, region 1, recombination frequency, region 2 and observed double crossovers and leave Expected double crossovers empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Expected double crossovers, Coefficient of coincidence and Interference can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Expected double crossovers = 12 individuals, Coefficient of coincidence = 1.17 and Interference = -0.1667. Those are the defaults written into the form — move Recombination frequency, region 1 and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Expected double crossovers is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
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

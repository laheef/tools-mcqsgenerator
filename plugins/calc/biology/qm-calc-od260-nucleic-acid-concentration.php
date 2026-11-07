<?php

/**
 * OD260 to Nucleic Acid Concentration Calculator
 * /biology/od260-nucleic-acid-concentration
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'OD260 to Nucleic Acid Concentration Calculator',
    'meta' => ['title' => 'OD260 to Nucleic Acid Concentration Calculator', 'description' => 'OD260 to Nucleic Acid Concentration turns Nucleic acid, A260 reading and Dilution factor into Concentration and A260/A280. There is no hidden constant here…', 'h1' => 'OD260 to Nucleic Acid Concentration Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'type',
                            'label' => 'Nucleic acid',
                            'type' => 'select',
                            'options' => ['dsDNA' => '50', 'ssDNA / oligo' => '33', 'RNA' => '40', 'Protein' => '1.5'],
                            'default' => 'dsDNA',
                        ],
                        [
                            'name' => 'a260',
                            'label' => 'A260 reading',
                            'type' => 'number',
                            'help' => 'Absorbance in a 1 cm cuvette',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.42',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Dilution factor',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '10 if you diluted 1:10 for the Nanodrop',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'a280',
                            'label' => 'A280 reading',
                            'type' => 'number',
                            'help' => 'Optional — gives the purity ratio',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.23',
                        ],
                        [
                            'name' => 'conc',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'ng/µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'purity',
                            'label' => 'A260/A280',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'yield_ug',
                            'label' => 'Total yield in 100 µL',
                            'type' => 'number',
                            'suffix' => 'µg',
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
            'title' => 'Concentration',
            'results' => ['conc' => 'a260*dilution*type*1000', 'purity' => 'a260/a280', 'yield_ug' => 'a260*dilution*type*1000*100/1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        OD260 to Nucleic Acid Concentration turns Nucleic acid, A260 reading and Dilution factor into Concentration and A260/A280. There is no hidden constant here: change Concentration and Nucleic acid moves with it. The main result, Concentration, is reported in ng/µL.
        TXT,
        'sections' => [
            ['title' => 'How the OD260 to Nucleic Acid Concentration calculator works', 'html' => <<<'TXT'
            <p>OD260 to Nucleic Acid Concentration answers one question from 4 numbers, and the answer is Concentration, A260/A280 and Total yield in 100 µL.</p><p>In the form&#039;s own words, Concentration = A260 reading × Dilution factor × Nucleic acid × 1000.</p><p>What comes back is Concentration, A260/A280 and Total yield in 100 µL — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Nucleic acid</strong> — a plain number, no unit</li><li><strong>A260 reading</strong> — a plain number, no unit. Absorbance in a 1 cm cuvette</li><li><strong>Dilution factor</strong> — in ×. 10 if you diluted 1:10 for the Nanodrop</li><li><strong>A280 reading</strong> — a plain number, no unit. Optional — gives the purity ratio</li></ul><p>The answers come back as Concentration in ng/µL, A260/A280, Total yield in 100 µL in µg. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Nucleic acid = 50, A260 reading = 0.42, Dilution factor = 1 × and A280 reading = 0.23; the answers are &lt;strong&gt;Concentration&lt;/strong&gt; = 21000 ng/µL, &lt;strong&gt;A260/A280&lt;/strong&gt; = 1.83 and &lt;strong&gt;Total yield in 100 µL&lt;/strong&gt; = 2100 µg.</p><ul><li><strong>Concentration</strong> = 21000 ng/µL</li><li><strong>A260/A280</strong> = 1.83</li><li><strong>Total yield in 100 µL</strong> = 2100 µg</li></ul><p>The line behind those figures is <strong>Concentration</strong> = <code>A260 reading × Dilution factor × Nucleic acid × 1000</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Concentration&lt;/strong&gt; = 21000, &lt;strong&gt;A260/A280&lt;/strong&gt; = 1.83 and &lt;strong&gt;Total yield in 100 µL&lt;/strong&gt; = 2100 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Concentration takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Concentration</strong> = <code>A260 reading × Dilution factor × Nucleic acid × 1000</code></li><li><strong>A260/A280</strong> = <code>A260 reading ÷ A280 reading</code></li><li><strong>Total yield in 100 µL</strong> = <code>A260 reading × Dilution factor × Nucleic acid × 1000 × 100 ÷ 1000</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Concentration</strong> = <code>A260 reading × Dilution factor × Nucleic acid × 1000</code> — the form to use when A260 reading, Dilution factor and Nucleic acid are the values you have.</li><li><strong>A260/A280</strong> = <code>A260 reading ÷ A280 reading</code> — the form to use when A260 reading and A280 reading are the values you have.</li><li><strong>Total yield in 100 µL</strong> = <code>A260 reading × Dilution factor × Nucleic acid × 1000 × 100 ÷ 1000</code> — the form to use when A260 reading, Dilution factor and Nucleic acid are the values you have.</li></ul><p>Any one of Concentration, A260/A280 and Total yield in 100 µL can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Nucleic acid from 50 to 100, leaving every other box alone. The panel moves from &lt;strong&gt;Concentration&lt;/strong&gt; 21000 ng/µL, &lt;strong&gt;A260/A280&lt;/strong&gt; 1.83 and &lt;strong&gt;Total yield in 100 µL&lt;/strong&gt; 2100 µg to &lt;strong&gt;Concentration&lt;/strong&gt; 42000 ng/µL, &lt;strong&gt;A260/A280&lt;/strong&gt; 1.83 and &lt;strong&gt;Total yield in 100 µL&lt;/strong&gt; 4200 µg.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Concentration, A260/A280 and Total yield in 100 µL are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Nucleic acid left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Nucleic acid is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>A260 reading left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If A260 reading is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Dilution factor left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Dilution factor is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Nucleic acid is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Nucleic acid</strong> takes a plain number with no unit attached. The page reads it when it works out Concentration and Total yield in 100 µL. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Nucleic acid is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>A260 reading</strong> takes a plain number with no unit attached. Absorbance in a 1 cm cuvette. The page reads it when it works out Concentration, A260/A280 and Total yield in 100 µL. Have it to hand before you start: A260 reading is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Dilution factor</strong> is measured in ×. 10 if you diluted 1:10 for the Nanodrop. The page reads it when it works out Concentration and Total yield in 100 µL. Have it to hand before you start: Dilution factor is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>A280 reading</strong> takes a plain number with no unit attached. Optional — gives the purity ratio. The page reads it when it works out A260/A280. Have it to hand before you start: A280 reading is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Concentration</strong> is a plain number and the page's own defaults put it at 21000. It is computed from A260 reading, Dilution factor and Nucleic acid, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>A260/A280</strong> is a plain number and the page's own defaults put it at 1.83. It is computed from A260 reading and A280 reading, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total yield in 100 µL</strong> is a plain number and the page's own defaults put it at 2100. It is computed from A260 reading, Dilution factor and Nucleic acid, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Concentration</th><th>A260/A280</th><th>Total yield in 100 µL</th></tr></thead><tbody><tr><td><strong>Nucleic acid</strong> +10%</td><td>+10%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>A260 reading</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Dilution factor</strong> +10%</td><td>+10%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>A280 reading</strong> +10%</td><td>+0%</td><td>-9.09%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, A260 reading sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Nucleic acid = 25, A260 reading = 0.21, Dilution factor = 0.5 × and A280 reading = 0.115, the answer is <strong>Concentration</strong> = 2625 ng/µL, <strong>A260/A280</strong> = 1.83 and <strong>Total yield in 100 µL</strong> = 263 µg.</li><li>With Nucleic acid = 150, A260 reading = 0.42, Dilution factor = 1 × and A280 reading = 0.23, the answer is <strong>Concentration</strong> = 63000 ng/µL, <strong>A260/A280</strong> = 1.83 and <strong>Total yield in 100 µL</strong> = 6300 µg.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Concentration follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Nucleic acid, A260 reading and Dilution factor are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Nucleic acid, A260 reading and Dilution factor and the number you are missing is Concentration and A260/A280.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/cell-doubling-time">Cell doubling time Calculator</a>, <a href="/biology/cell-seeding-density">Cell Seeding Density Calculator</a> and <a href="/biology/cell-surface-area-volume-ratio">Cell Surface Area to Volume Ratio Calculator — Formula &amp; Resul</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the OD260 to Nucleic Acid Concentration calculator work out?', 'a' => <<<'TXT'
            Concentration, A260/A280 and Total yield in 100 µL, from A260 reading, Dilution factor and Nucleic acid. The relationship is Concentration = A260 reading × Dilution factor × Nucleic acid × 1000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Nucleic acid, A260 reading, Dilution factor (×), A280 reading. With type, a260 and dilution in place, Concentration can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Concentration, A260/A280 and Total yield in 100 µL blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Concentration = 21000 ng/µL, A260/A280 = 1.83 and Total yield in 100 µL = 2100 µg. The figures come from Nucleic acid as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Concentration is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Nucleic acid left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Concentration at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/cell-doubling-time', 'name' => 'Cell doubling time Calculator'],
            ['path' => '/biology/cell-seeding-density', 'name' => 'Cell Seeding Density Calculator'],
            ['path' => '/biology/cell-surface-area-volume-ratio', 'name' => 'Cell Surface Area to Volume Ratio Calculator — Formula & Resul'],
        ],
        'authors' => [],
    ],
];

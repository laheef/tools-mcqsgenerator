<?php

/**
 * Shannon–Wiener Diversity Index Calculator
 * /biology/shannon-wiener-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Shannon–Wiener Diversity Index Calculator',
    'meta' => ['title' => 'Shannon–Wiener Diversity Index Calculator — Biology', 'description' => 'Enter species 1 count, species 2 count and species 3 count and Shannon–Wiener Diversity Index Calculator returns shannon index H′ and Pielou evenness J′.', 'h1' => 'Shannon–Wiener Diversity Index Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'n1',
                            'label' => 'Species 1 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'n2',
                            'label' => 'Species 2 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'n3',
                            'label' => 'Species 3 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'n4',
                            'label' => 'Species 4 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'n5',
                            'label' => 'Species 5 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'h',
                            'label' => 'Shannon index H′',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'evenness',
                            'label' => 'Pielou evenness J′',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'richness',
                            'label' => 'Species richness',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'max_h',
                            'label' => 'Maximum H′ for this richness',
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
            'title' => 'Diversity',
            'results' => ['richness' => 'min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))+min(1,max(0,n4))+min(1,max(0,n5))', 'h' => <<<'TXT'
            (0-((max(n1,0.000001)/(n1+n2+n3+n4+n5))*log((max(n1,0.000001)/(n1+n2+n3+n4+n5)))+(max(n2,0.000001)/(n1+n2+n3+n4+n5))*log((max(n2,0.000001)/(n1+n2+n3+n4+n5)))+(max(n3,0.000001)/(n1+n2+n3+n4+n5))*log((max(n3,0.000001)/(n1+n2+n3+n4+n5)))+(max(n4,0.000001)/(n1+n2+n3+n4+n5))*log((max(n4,0.000001)/(n1+n2+n3+n4+n5)))+(max(n5,0.000001)/(n1+n2+n3+n4+n5))*log((max(n5,0.000001)/(n1+n2+n3+n4+n5)))))
            TXT, 'evenness' => <<<'TXT'
            ((0-((max(n1,0.000001)/(n1+n2+n3+n4+n5))*log((max(n1,0.000001)/(n1+n2+n3+n4+n5)))+(max(n2,0.000001)/(n1+n2+n3+n4+n5))*log((max(n2,0.000001)/(n1+n2+n3+n4+n5)))+(max(n3,0.000001)/(n1+n2+n3+n4+n5))*log((max(n3,0.000001)/(n1+n2+n3+n4+n5)))+(max(n4,0.000001)/(n1+n2+n3+n4+n5))*log((max(n4,0.000001)/(n1+n2+n3+n4+n5)))+(max(n5,0.000001)/(n1+n2+n3+n4+n5))*log((max(n5,0.000001)/(n1+n2+n3+n4+n5)))))/log(max(1,min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))+min(1,max(0,n4))+min(1,max(0,n5)))))
            TXT, 'max_h' => 'log(max(1,min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))+min(1,max(0,n4))+min(1,max(0,n5))))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Shannon–Wiener Diversity Index turns Species 1 count, Species 2 count and Species 3 count into Shannon index H′ and Pielou evenness J′. It is a single relationship that reads shannon index H′ out of species 1 count, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Shannon–Wiener Diversity Index calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Shannon–Wiener Diversity Index: it takes 5 numbers and reports Shannon index H′, Pielou evenness J′ and Species richness.</p><p>The relationship it solves reads Species richness = min(1,max(0,Species 1 count)) + min(1,max(0,Species 2 count)) + min(1,max(0,Species 3 count)) + min(1,max(0,Species 4 count)) + min(1,max(0,Species 5 count)).</p><p>The result panel carries Shannon index H′, Pielou evenness J′, Species richness and Maximum H′ for this richness, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Species 1 count</strong> — in individuals</li><li><strong>Species 2 count</strong> — in individuals</li><li><strong>Species 3 count</strong> — in individuals</li><li><strong>Species 4 count</strong> — in individuals</li><li><strong>Species 5 count</strong> — in individuals</li></ul><p>The answers come back as Shannon index H′, Pielou evenness J′, Species richness, Maximum H′ for this richness. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Species 1 count = 40 individuals, Species 2 count = 25 individuals, Species 3 count = 15 individuals, Species 4 count = 10 individuals and Species 5 count = 6 individuals gives <strong>Species richness</strong> = 5, <strong>Shannon index H′</strong> = 1.41, <strong>Pielou evenness J′</strong> = 0.8786 and <strong>Maximum H′ for this richness</strong> = 1.61.</p><ul><li><strong>Species richness</strong> = 5</li><li><strong>Shannon index H′</strong> = 1.41</li><li><strong>Pielou evenness J′</strong> = 0.8786</li><li><strong>Maximum H′ for this richness</strong> = 1.61</li></ul><p>The line behind those figures is <strong>Species richness</strong> = <code>min(1,max(0,Species 1 count)) + min(1,max(0,Species 2 count)) + min(1,max(0,Species 3 count)) + min(1,max(0,Species 4 count)) + min(1,max(0,Species 5 count))</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Species richness</strong> = 5, <strong>Shannon index H′</strong> = 1.41, <strong>Pielou evenness J′</strong> = 0.8786 and <strong>Maximum H′ for this richness</strong> = 1.61 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Shannon index H′ takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Species richness</strong> = <code>min(1,max(0,Species 1 count)) + min(1,max(0,Species 2 count)) + min(1,max(0,Species 3 count)) + min(1,max(0,Species 4 count)) + min(1,max(0,Species 5 count))</code></li><li><strong>Maximum H′ for this richness</strong> = <code>ln(max(1,min(1,max(0,Species 1 count)) + min(1,max(0,Species 2 count)) + min(1,max(0,Species 3 count)) + min(1,max(0,Species 4 count)) + min(1,max(0,Species 5 count))))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Species richness</strong> = <code>min(1,max(0,Species 1 count)) + min(1,max(0,Species 2 count)) + min(1,max(0,Species 3 count)) + min(1,max(0,Species 4 count)) + min(1,max(0,Species 5 count))</code> — the form to use when Species 1 count, Species 2 count, Species 3 count and Species 4 count are the values you have.</li><li><strong>Maximum H′ for this richness</strong> = <code>ln(max(1,min(1,max(0,Species 1 count)) + min(1,max(0,Species 2 count)) + min(1,max(0,Species 3 count)) + min(1,max(0,Species 4 count)) + min(1,max(0,Species 5 count))))</code> — the form to use when Species 1 count, Species 2 count, Species 3 count and Species 4 count are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Species richness, Shannon index H′ and Pielou evenness J′ can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Species 1 count from 40 to 80, leaving every other box alone. The panel moves from <strong>Species richness</strong> 5, <strong>Shannon index H′</strong> 1.41, <strong>Pielou evenness J′</strong> 0.8786 and <strong>Maximum H′ for this richness</strong> 1.61 to <strong>Species richness</strong> 5, <strong>Shannon index H′</strong> 1.2, <strong>Pielou evenness J′</strong> 0.7433 and <strong>Maximum H′ for this richness</strong> 1.61.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Shannon index H′, Pielou evenness J′ and Species richness are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Species 1 count left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Species 1 count is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Species 2 count left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Species 2 count is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Species 3 count left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Species 3 count is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Species 1 count and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Species 1 count</strong> is measured in individuals. Change it and Species richness, Shannon index H′ and Pielou evenness J′ changes with it. Have it to hand before you start: Species 1 count is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Species 2 count</strong> is measured in individuals. Change it and Species richness, Shannon index H′ and Pielou evenness J′ changes with it. Have it to hand before you start: Species 2 count is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Species 3 count</strong> is measured in individuals. Change it and Species richness, Shannon index H′ and Pielou evenness J′ changes with it. Have it to hand before you start: Species 3 count is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Species 4 count</strong> is measured in individuals. Change it and Species richness, Shannon index H′ and Pielou evenness J′ changes with it. Have it to hand before you start: Species 4 count is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Species 5 count</strong> is measured in individuals. Change it and Species richness, Shannon index H′ and Pielou evenness J′ changes with it. Have it to hand before you start: Species 5 count is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Shannon index H′</strong> is a plain number and the page's own defaults put it at 1.41. It is worked out from Species 1 count, Species 2 count, Species 3 count and Species 4 count. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Pielou evenness J′</strong> is a plain number and the page's own defaults put it at 0.8786. It is worked out from Species 1 count, Species 2 count, Species 3 count and Species 4 count. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Species richness</strong> is a plain number and the page's own defaults put it at 5. It is worked out from Species 1 count, Species 2 count, Species 3 count and Species 4 count. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Maximum H′ for this richness</strong> is a plain number and the page's own defaults put it at 1.61. It is worked out from Species 1 count, Species 2 count, Species 3 count and Species 4 count. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Species richness</th><th>Shannon index H′</th><th>Pielou evenness J′</th><th>Maximum H′ for this richness</th></tr></thead><tbody><tr><td><strong>Species 1 count</strong> +10%</td><td>+0%</td><td>-1.6%</td><td>-1.6%</td><td>+0%</td></tr><tr><td><strong>Species 2 count</strong> +10%</td><td>+0%</td><td>-0.19%</td><td>-0.19%</td><td>+0%</td></tr><tr><td><strong>Species 3 count</strong> +10%</td><td>+0%</td><td>+0.44%</td><td>+0.44%</td><td>+0%</td></tr><tr><td><strong>Species 4 count</strong> +10%</td><td>+0%</td><td>+0.59%</td><td>+0.59%</td><td>+0%</td></tr><tr><td><strong>Species 5 count</strong> +10%</td><td>+0%</td><td>+0.58%</td><td>+0.58%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Species 1 count sits at the top — a ten per cent error in that box shows up as roughly 1.6 per cent in the answer. By contrast, Species 3 count and Species 2 count barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Species 1 count = 20 individuals, Species 2 count = 12.5 individuals, Species 3 count = 7.5 individuals, Species 4 count = 5 individuals and Species 5 count = 3 individuals, the answer is <strong>Species richness</strong> = 5, <strong>Shannon index H′</strong> = 1.41, <strong>Pielou evenness J′</strong> = 0.8786 and <strong>Maximum H′ for this richness</strong> = 1.61.</li><li>With Species 1 count = 120 individuals, Species 2 count = 25 individuals, Species 3 count = 15 individuals, Species 4 count = 10 individuals and Species 5 count = 6 individuals, the answer is <strong>Species richness</strong> = 5, <strong>Shannon index H′</strong> = 1.03, <strong>Pielou evenness J′</strong> = 0.6377 and <strong>Maximum H′ for this richness</strong> = 1.61.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Shannon index H′ is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Species 1 count, Species 2 count and Species 3 count are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Species 1 count, Species 2 count and Species 3 count measured, Shannon index H′ and Pielou evenness J′ wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/cell-seeding-density">Cell Seeding Density Calculator</a>, <a href="/biology/cell-surface-area-volume-ratio">Cell Surface Area to Volume Ratio Calculator — Formula &amp; Resul</a> and <a href="/biology/centimorgan-to-percentage">Centimorgan to Percentage Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Shannon–Wiener Diversity Index calculator work out?', 'a' => <<<'TXT'
            Shannon index H′, Pielou evenness J′, Species richness and Maximum H′ for this richness, from Species 1 count, Species 2 count, Species 3 count and Species 4 count. The relationship is Species richness = min(1,max(0,Species 1 count)) + min(1,max(0,Species 2 count)) + min(1,max(0,Species 3 count)) + min(1,max(0,Species 4 count)) + min(1,max(0,Species 5 count)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Species 1 count (individuals), Species 2 count (individuals), Species 3 count (individuals), Species 4 count (individuals), Species 5 count (individuals). Fill species 1 count, species 2 count and species 3 count and leave Shannon index H′ empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Species richness, Shannon index H′, Pielou evenness J′ and Maximum H′ for this richness can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Species richness = 5, Shannon index H′ = 1.41, Pielou evenness J′ = 0.8786 and Maximum H′ for this richness = 1.61. Those are the defaults written into the form — move Species 1 count and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Shannon index H′ is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Species 1 count left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Shannon index H′ keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/cell-seeding-density', 'name' => 'Cell Seeding Density Calculator'],
            ['path' => '/biology/cell-surface-area-volume-ratio', 'name' => 'Cell Surface Area to Volume Ratio Calculator — Formula & Resul'],
            ['path' => '/biology/centimorgan-to-percentage', 'name' => 'Centimorgan to Percentage Calculator'],
        ],
        'authors' => [],
    ],
];

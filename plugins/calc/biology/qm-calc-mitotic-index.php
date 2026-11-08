<?php

/**
 * Mitotic Index Calculator
 * /biology/mitotic-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mitotic Index Calculator',
    'meta' => ['title' => 'Mitotic Index Calculator: Formula & Example', 'description' => 'Mitotic Index Calculator works out mitotic cells per 1000 from total cells counted and cells in mitosis. Free to use, with the working shown beside the answer.', 'h1' => 'Mitotic Index Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'total',
                            'label' => 'Total cells counted',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1200',
                        ],
                        [
                            'name' => 'mitotic',
                            'label' => 'Cells in mitosis',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'help' => 'Prophase to telophase',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '96',
                        ],
                        [
                            'name' => 'prophase',
                            'label' => 'Prophase',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'help' => 'Optional phase breakdown',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'metaphase',
                            'label' => 'Metaphase',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '28',
                        ],
                        [
                            'name' => 'anaphase',
                            'label' => 'Anaphase',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '18',
                        ],
                        [
                            'name' => 'telophase',
                            'label' => 'Telophase',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'index',
                            'label' => 'Mitotic index',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_1000',
                            'label' => 'Mitotic cells per 1000',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'phase_check',
                            'label' => 'Phases add up to',
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
            'title' => 'Index',
            'results' => ['index' => 'mitotic/total*100', 'per_1000' => 'mitotic/total*1000', 'phase_check' => 'prophase+metaphase+anaphase+telophase'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Total cells counted, Cells in mitosis and Prophase into Mitotic Index and the answer comes back as Mitotic index and Mitotic cells per 1000. There is no hidden constant here: change mitotic index and total cells counted moves with it. The main result, Mitotic index, is reported in %.
        TXT,
        'sections' => [
            ['title' => 'How the Mitotic Index calculator works', 'html' => <<<'TXT'
            <p>The Mitotic Index calculator applies one relationship to 6 numbers and reports Mitotic index, Mitotic cells per 1000 and Phases add up to.</p><p>In the form&#039;s own words, Mitotic index = Cells in mitosis ÷ Total cells counted × 100.</p><p>The answers are Mitotic index, Mitotic cells per 1000 and Phases add up to; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs.</p><ul><li><strong>Total cells counted</strong> — in cells</li><li><strong>Cells in mitosis</strong> — in cells. Prophase to telophase</li><li><strong>Prophase</strong> — in cells. Optional phase breakdown</li><li><strong>Metaphase</strong> — in cells</li><li><strong>Anaphase</strong> — in cells</li><li><strong>Telophase</strong> — in cells</li></ul><p>The answers come back as Mitotic index in %, Mitotic cells per 1000, Phases add up to in cells. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Total cells counted = 1200 cells, Cells in mitosis = 96 cells, Prophase = 40 cells, Metaphase = 28 cells, Anaphase = 18 cells and Telophase = 10 cells; the answers are <strong>Mitotic index</strong> = 8 %, <strong>Mitotic cells per 1000</strong> = 80 and <strong>Phases add up to</strong> = 96 cells.</p><ul><li><strong>Mitotic index</strong> = 8 %</li><li><strong>Mitotic cells per 1000</strong> = 80</li><li><strong>Phases add up to</strong> = 96 cells</li></ul><p>That is <strong>Mitotic index</strong> = <code>Cells in mitosis ÷ Total cells counted × 100</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Mitotic index</strong> = 8, <strong>Mitotic cells per 1000</strong> = 80 and <strong>Phases add up to</strong> = 96. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Mitotic index is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Mitotic index</strong> = <code>Cells in mitosis ÷ Total cells counted × 100</code></li><li><strong>Mitotic cells per 1000</strong> = <code>Cells in mitosis ÷ Total cells counted × 1000</code></li><li><strong>Phases add up to</strong> = <code>Prophase + Metaphase + Anaphase + Telophase</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Mitotic index</strong> = <code>Cells in mitosis ÷ Total cells counted × 100</code> — the form to use when Cells in mitosis and Total cells counted are the values you have.</li><li><strong>Mitotic cells per 1000</strong> = <code>Cells in mitosis ÷ Total cells counted × 1000</code> — the form to use when Cells in mitosis and Total cells counted are the values you have.</li><li><strong>Phases add up to</strong> = <code>Prophase + Metaphase + Anaphase + Telophase</code> — the form to use when Prophase, Metaphase, Anaphase and Telophase are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Mitotic index, Mitotic cells per 1000 and Phases add up to can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Total cells counted from 1200 to 2400, leaving every other box alone. The panel moves from <strong>Mitotic index</strong> 8 %, <strong>Mitotic cells per 1000</strong> 80 and <strong>Phases add up to</strong> 96 cells to <strong>Mitotic index</strong> 4 %, <strong>Mitotic cells per 1000</strong> 40 and <strong>Phases add up to</strong> 96 cells.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Mitotic index, Mitotic cells per 1000 and Phases add up to are results: they are worked out from the boxes above and cannot be typed into, so a past answer has to be entered as one of the inputs instead.</li><li><strong>Total cells counted left as a guess.</strong> Anything typed into Total cells counted is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Cells in mitosis left as a guess.</strong> Anything typed into Cells in mitosis is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Prophase left as a guess.</strong> Anything typed into Prophase is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Total cells counted and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Total cells counted</strong> is measured in cells. The page reads it when it works out Mitotic index and Mitotic cells per 1000. Have it to hand before you start: Total cells counted is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Cells in mitosis</strong> is measured in cells. Prophase to telophase. The page reads it when it works out Mitotic index and Mitotic cells per 1000. Have it to hand before you start: Cells in mitosis is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Prophase</strong> is measured in cells. Optional phase breakdown. The page reads it when it works out Phases add up to. Have it to hand before you start: Prophase is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Metaphase</strong> is measured in cells. The page reads it when it works out Phases add up to. Have it to hand before you start: Metaphase is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Anaphase</strong> is measured in cells. The page reads it when it works out Phases add up to. Have it to hand before you start: Anaphase is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Telophase</strong> is measured in cells. The page reads it when it works out Phases add up to. Have it to hand before you start: Telophase is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Mitotic index</strong> is a plain number and the page's own defaults put it at 8. It is worked out from Cells in mitosis and Total cells counted. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Mitotic cells per 1000</strong> is a plain number and the page's own defaults put it at 80. It is worked out from Cells in mitosis and Total cells counted. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Phases add up to</strong> is a plain number and the page's own defaults put it at 96. It is worked out from Prophase, Metaphase, Anaphase and Telophase. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Mitotic index</th><th>Mitotic cells per 1000</th><th>Phases add up to</th></tr></thead><tbody><tr><td><strong>Total cells counted</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>+0%</td></tr><tr><td><strong>Cells in mitosis</strong> +10%</td><td>+10%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Prophase</strong> +10%</td><td>+0%</td><td>+0%</td><td>+4.17%</td></tr><tr><td><strong>Metaphase</strong> +10%</td><td>+0%</td><td>+0%</td><td>+2.92%</td></tr><tr><td><strong>Anaphase</strong> +10%</td><td>+0%</td><td>+0%</td><td>+1.87%</td></tr><tr><td><strong>Telophase</strong> +10%</td><td>+0%</td><td>+0%</td><td>+1.04%</td></tr></tbody></table><p>The steepest column belongs to Cells in mitosis: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Total cells counted = 600 cells, Cells in mitosis = 48 cells, Prophase = 20 cells, Metaphase = 14 cells, Anaphase = 9 cells and Telophase = 5 cells, the answer is <strong>Mitotic index</strong> = 8 %, <strong>Mitotic cells per 1000</strong> = 80 and <strong>Phases add up to</strong> = 48 cells.</li><li>With Total cells counted = 3600 cells, Cells in mitosis = 96 cells, Prophase = 40 cells, Metaphase = 28 cells, Anaphase = 18 cells and Telophase = 10 cells, the answer is <strong>Mitotic index</strong> = 2.67 %, <strong>Mitotic cells per 1000</strong> = 26.67 and <strong>Phases add up to</strong> = 96 cells.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Mitotic index is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Total cells counted, Cells in mitosis and Prophase and the number you are missing is Mitotic index and Mitotic cells per 1000.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/lawn-fertilizer-rate">Lawn Fertilizer Rate Calculator</a>, <a href="/biology/mowing-cost">Lawn mowing Calculator</a> and <a href="/biology/tree-leaves">Leaves on tree Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mitotic Index calculator work out?', 'a' => <<<'TXT'
            Mitotic index, Mitotic cells per 1000 and Phases add up to, from Cells in mitosis and Total cells counted. The relationship is Mitotic index = Cells in mitosis ÷ Total cells counted × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total cells counted (cells), Cells in mitosis (cells), Prophase (cells), Metaphase (cells), Anaphase (cells). With total cells counted, cells in mitosis and prophase in place, Mitotic index can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Mitotic index, Mitotic cells per 1000 and Phases add up to can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Mitotic index = 8 %, Mitotic cells per 1000 = 80 and Phases add up to = 96 cells. Those are the defaults written into the form — move Total cells counted and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Mitotic index is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Total cells counted left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Mitotic index keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/lawn-fertilizer-rate', 'name' => 'Lawn Fertilizer Rate Calculator'],
            ['path' => '/biology/mowing-cost', 'name' => 'Lawn mowing Calculator'],
            ['path' => '/biology/tree-leaves', 'name' => 'Leaves on tree Calculator'],
        ],
        'authors' => [],
    ],
];

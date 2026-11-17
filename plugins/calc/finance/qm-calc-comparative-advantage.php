<?php

/**
 * Comparative advantage
 * /finance/comparative-advantage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Comparative advantage',
    'meta' => ['title' => 'Comparative advantage: Formula, Steps & Results', 'description' => 'Enter Output per unit labor for good A and Output per unit labor for good B and get Comparative advantage for good A back. Any box can be the unknown.', 'h1' => 'Comparative advantage Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => 'Country X',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'output_1x',
                            'label' => 'Output per unit labor for good A',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'output_2x',
                            'label' => 'Output per unit labor for good B',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'comparative_advantage_1x',
                            'label' => 'Comparative advantage for good A',
                            'type' => 'number',
                            'suffix' => 'good B',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'comparative_advantage_2x',
                            'label' => 'Comparative advantage for good B',
                            'type' => 'number',
                            'suffix' => 'good A',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Country Y',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'output_1y',
                            'label' => 'Output per unit labor for good A',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'output_2y',
                            'label' => 'Output per unit labor for good B',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'comparative_advantage_1y',
                            'label' => 'Comparative advantage for good A',
                            'type' => 'number',
                            'suffix' => 'good B',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'comparative_advantage_2y',
                            'label' => 'Comparative advantage for good B',
                            'type' => 'number',
                            'suffix' => 'good A',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'comparative_advantage_1x = output_2x / output_1x',
            'results' => ['comparative_advantage_1x' => 'output_2x/output_1x', 'output_1x' => 'output_2x/comparative_advantage_1x', 'output_2x' => 'comparative_advantage_1x*output_1x'],
        ],
        [
            'title' => 'comparative_advantage_2x = output_1x / output_2x',
            'results' => ['output_1x' => 'comparative_advantage_2x*output_2x', 'comparative_advantage_2x' => 'output_1x/output_2x', 'output_2x' => 'output_1x/comparative_advantage_2x'],
        ],
        [
            'title' => 'comparative_advantage_1y = output_2y / output_1y',
            'results' => ['output_2y' => 'comparative_advantage_1y*output_1y', 'output_1y' => 'output_2y/comparative_advantage_1y', 'comparative_advantage_1y' => 'output_2y/output_1y'],
        ],
        [
            'title' => 'comparative_advantage_2y = output_1y / output_2y',
            'results' => ['output_2y' => 'output_1y/comparative_advantage_2y', 'comparative_advantage_2y' => 'output_1y/output_2y', 'output_1y' => 'comparative_advantage_2y*output_2y'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Comparative advantage converts between comparative advantage for good A and comparative advantage for good B: put a value in either box and the other one is worked out. Comparative advantage for good A comes back in good B unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Comparative advantage calculator works', 'html' => <<<'TXT'
            <p>Comparative advantage answers one question from 2 numbers, and the answer is Comparative advantage for good A, Comparative advantage for good B and Output per unit labor for good A.</p><p>Written with the labels from the form, Comparative advantage for good A = Output per unit labor for good B ÷ Output per unit labor for good A.</p><p>The answers are Comparative advantage for good A, Comparative advantage for good B, Output per unit labor for good A and Output per unit labor for good B; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Output per unit labor for good A</strong> — a plain number, no unit</li><li><strong>Output per unit labor for good B</strong> — a plain number, no unit</li></ul><p>The answers come back as Comparative advantage for good A in good B, Comparative advantage for good B in good A, Output per unit labor for good A, Output per unit labor for good B, Comparative advantage for good A in good B, Comparative advantage for good B in good A. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Output per unit labor for good A = 10, Output per unit labor for good B = 100, Comparative advantage for good B = 1000 good A, Output per unit labor for good A = 10, Output per unit labor for good B = 100, Comparative advantage for good A = 1000 good B and Comparative advantage for good B = 10 good A gives <strong>Comparative advantage for good A</strong> = 10 good B.</p><ul><li><strong>Comparative advantage for good A</strong> = 10 good B</li></ul><p>The line behind those figures is <strong>Comparative advantage for good A</strong> = <code>Output per unit labor for good B ÷ Output per unit labor for good A</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Comparative advantage for good A</strong> = 10. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Comparative advantage for good A is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Comparative advantage for good A</strong> = <code>Output per unit labor for good B ÷ Output per unit labor for good A</code></li><li><strong>Output per unit labor for good A</strong> = <code>Output per unit labor for good B ÷ Comparative advantage for good A</code></li><li><strong>Output per unit labor for good B</strong> = <code>Comparative advantage for good A × Output per unit labor for good A</code></li><li><strong>Comparative advantage for good B</strong> = <code>Output per unit labor for good A ÷ Output per unit labor for good B</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Comparative advantage for good A</strong> = <code>Output per unit labor for good B ÷ Output per unit labor for good A</code> — the form to use when Output per unit labor for good B and Output per unit labor for good A are the values you have.</li><li><strong>Output per unit labor for good A</strong> = <code>Output per unit labor for good B ÷ Comparative advantage for good A</code> — the form to use when Output per unit labor for good B and Comparative advantage for good A are the values you have.</li><li><strong>Output per unit labor for good B</strong> = <code>Comparative advantage for good A × Output per unit labor for good A</code> — the form to use when Comparative advantage for good A and Output per unit labor for good A are the values you have.</li><li><strong>Comparative advantage for good B</strong> = <code>Output per unit labor for good A ÷ Output per unit labor for good B</code> — the form to use when Output per unit labor for good A and Output per unit labor for good B are the values you have.</li><li><strong>Output per unit labor for good A</strong> = <code>Comparative advantage for good B × Output per unit labor for good B</code> — the form to use when Comparative advantage for good B and Output per unit labor for good B are the values you have.</li><li><strong>Output per unit labor for good B</strong> = <code>Output per unit labor for good A ÷ Comparative advantage for good B</code> — the form to use when Output per unit labor for good A and Comparative advantage for good B are the values you have.</li><li><strong>Comparative advantage for good A</strong> = <code>Output per unit labor for good B ÷ Output per unit labor for good A</code> — the form to use when Output per unit labor for good B and Output per unit labor for good A are the values you have.</li><li><strong>Output per unit labor for good B</strong> = <code>Comparative advantage for good A × Output per unit labor for good A</code> — the form to use when Comparative advantage for good A and Output per unit labor for good A are the values you have.</li></ul><p>Any one of Comparative advantage for good A, Output per unit labor for good A and Output per unit labor for good B can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Output per unit labor for good A, from 10 to 20 — and the answers go from <strong>Comparative advantage for good A</strong> 10 good B to <strong>Comparative advantage for good A</strong> 5 good B.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Comparative advantage for good A, Comparative advantage for good B and Output per unit labor for good A are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Output per unit labor for good A left as a guess.</strong> Anything typed into Output per unit labor for good A is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Output per unit labor for good B left as a guess.</strong> Anything typed into Output per unit labor for good B is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Output per unit labor for good A to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Output per unit labor for good A</strong> takes a plain number with no unit attached. It feeds Comparative advantage for good A, Output per unit labor for good B and Comparative advantage for good B. Have it to hand before you start: Output per unit labor for good A is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Output per unit labor for good B</strong> takes a plain number with no unit attached. It feeds Comparative advantage for good A, Output per unit labor for good A and Comparative advantage for good B. Have it to hand before you start: Output per unit labor for good B is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Comparative advantage for good A is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Output per unit labor for good A and Output per unit labor for good B are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Output per unit labor for good A and Output per unit labor for good B and the number you are missing is Comparative advantage for good A and Comparative advantage for good B.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/bond-price">Bond price</a>, <a href="/finance/bond-yield">Bond yield Calculator</a> and <a href="/finance/bond-ytm">Bond YTM Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Comparative advantage is a number to act on, so the useful question is what to do with Comparative advantage for good A (good B), Comparative advantage for good B (good A) and Output per unit labor for good A once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Output per unit labor for good A and Output per unit labor for good B alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Comparative advantage calculator work out?', 'a' => <<<'TXT'
            Comparative advantage for good A, Comparative advantage for good B, Output per unit labor for good A and Output per unit labor for good B, from Output per unit labor for good B and Output per unit labor for good A. The relationship is Comparative advantage for good A = Output per unit labor for good B ÷ Output per unit labor for good A.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Output per unit labor for good A, Output per unit labor for good B. Fill output per unit labor for good A and output per unit labor for good B and leave Comparative advantage for good A empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Comparative advantage for good A, Output per unit labor for good A, Output per unit labor for good B and Comparative advantage for good B blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Comparative advantage for good A = 10 good B. Those are the defaults written into the form — move Output per unit labor for good A and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Comparative advantage for good A is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Output per unit labor for good A left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Comparative advantage for good A at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/bond-price', 'name' => 'Bond price'],
            ['path' => '/finance/bond-yield', 'name' => 'Bond yield Calculator'],
            ['path' => '/finance/bond-ytm', 'name' => 'Bond YTM Calculator'],
        ],
        'authors' => [],
    ],
];

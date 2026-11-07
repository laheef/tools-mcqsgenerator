<?php

/**
 * Cell Density Unit Converter
 * /biology/cell-density-unit-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell Density Unit Converter',
    'meta' => ['title' => 'Cell Density Unit Converter — Formula & Results', 'description' => 'Cell Density Unit Converter takes cell concentration and returns cells per mL. No sign-up and no waiting: type the numbers, press Calculate, read the answer.', 'h1' => 'Cell Density Unit Converter', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'value',
                            'label' => 'Cell concentration',
                            'type' => 'number',
                            'suffix' => '×10⁶/mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.5',
                        ],
                        [
                            'name' => 'per_ml',
                            'label' => 'Cells per mL',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_ul',
                            'label' => 'Cells per µL',
                            'type' => 'number',
                            'suffix' => 'cells/µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'million',
                            'label' => 'Millions per mL',
                            'type' => 'number',
                            'suffix' => '×10⁶/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_l',
                            'label' => 'Cells per litre',
                            'type' => 'number',
                            'suffix' => 'cells/L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'log_value',
                            'label' => 'log₁₀(cells/mL)',
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
            'title' => 'Conversion',
            'results' => [
                'per_ml' => 'value*1000000',
                'per_ul' => 'value*1000',
                'million' => 'value',
                'per_l' => 'value*1000000000',
                'log_value' => 'log10(value*1000000)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Cell concentration into Cell Density Unit and the answer comes back as Cells per mL and Cells per µL. The arithmetic is the whole method: cells per mL is worked out from cell concentration by one formula, applied once. Cells per mL comes back in cells/mL unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Cell Density Unit calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Cell Density Unit: it takes 1 number and reports Cells per mL, Cells per µL and Millions per mL.</p><p>Written with the labels from the form, Cells per mL = Cell concentration × 1000000.</p><p>The answers are Cells per mL, Cells per µL, Millions per mL and Cells per litre; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Cell concentration</strong> — in ×10⁶/mL</li></ul><p>The result boxes are Cells per mL in cells/mL, Cells per µL in cells/µL, Millions per mL in ×10⁶/mL, Cells per litre in cells/L, log₁₀(cells/mL); they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Cell concentration = 1.5 ×10⁶/mL — through the same formula and the panel reports <strong>Cells per mL</strong> = 1.500e+6 cells/mL, <strong>Cells per µL</strong> = 1500 cells/µL, <strong>Millions per mL</strong> = 1.5 ×10⁶/mL, <strong>Cells per litre</strong> = 1.500e+9 cells/L and <strong>log₁₀(cells/mL)</strong> = 6.18.</p><ul><li><strong>Cells per mL</strong> = 1.500e+6 cells/mL</li><li><strong>Cells per µL</strong> = 1500 cells/µL</li><li><strong>Millions per mL</strong> = 1.5 ×10⁶/mL</li><li><strong>Cells per litre</strong> = 1.500e+9 cells/L</li><li><strong>log₁₀(cells/mL)</strong> = 6.18</li></ul><p>That is <strong>Cells per mL</strong> = <code>Cell concentration × 1000000</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Cells per mL</strong> = 1.500e+6, <strong>Cells per µL</strong> = 1500, <strong>Millions per mL</strong> = 1.5, <strong>Cells per litre</strong> = 1.500e+9 and <strong>log₁₀(cells/mL)</strong> = 6.18. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Cells per mL is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Cells per mL</strong> = <code>Cell concentration × 1000000</code></li><li><strong>Cells per µL</strong> = <code>Cell concentration × 1000</code></li><li><strong>Millions per mL</strong> = <code>Cell concentration</code></li><li><strong>Cells per litre</strong> = <code>Cell concentration × 1000000000</code></li><li><strong>log₁₀(cells/mL)</strong> = <code>log₁₀(Cell concentration × 1000000)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Cells per mL</strong> = <code>Cell concentration × 1000000</code> — the form to use when Cell concentration are the values you have.</li><li><strong>Cells per µL</strong> = <code>Cell concentration × 1000</code> — the form to use when Cell concentration are the values you have.</li><li><strong>Millions per mL</strong> = <code>Cell concentration</code> — the form to use when Cell concentration are the values you have.</li><li><strong>Cells per litre</strong> = <code>Cell concentration × 1000000000</code> — the form to use when Cell concentration are the values you have.</li><li><strong>log₁₀(cells/mL)</strong> = <code>log₁₀(Cell concentration × 1000000)</code> — the form to use when Cell concentration are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Cells per mL, Cells per µL and Millions per mL can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Cell concentration, from 1.5 to 3 — and the answers go from <strong>Cells per mL</strong> 1.500e+6 cells/mL, <strong>Cells per µL</strong> 1500 cells/µL, <strong>Millions per mL</strong> 1.5 ×10⁶/mL, <strong>Cells per litre</strong> 1.500e+9 cells/L and <strong>log₁₀(cells/mL)</strong> 6.18 to <strong>Cells per mL</strong> 3.000e+6 cells/mL, <strong>Cells per µL</strong> 3000 cells/µL, <strong>Millions per mL</strong> 3 ×10⁶/mL, <strong>Cells per litre</strong> 3.000e+9 cells/L and <strong>log₁₀(cells/mL)</strong> 6.48.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Cells per mL, Cells per µL and Millions per mL are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Cell concentration left as a guess.</strong> Anything typed into Cell concentration is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Cell concentration is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Cell concentration</strong> is measured in ×10⁶/mL. The page reads it when it works out Cells per mL, Cells per µL and Millions per mL. Have it to hand before you start: Cell concentration is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Cells per mL</strong> is a plain number and the page's own defaults put it at 1.500e+6. It is computed from Cell concentration, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Cells per µL</strong> is a plain number and the page's own defaults put it at 1500. It is computed from Cell concentration, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Millions per mL</strong> is a plain number and the page's own defaults put it at 1.5. It is computed from Cell concentration, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Cells per litre</strong> is a plain number and the page's own defaults put it at 1.500e+9. It is computed from Cell concentration, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>log₁₀(cells/mL)</strong> is a plain number and the page's own defaults put it at 6.18. It is computed from Cell concentration, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Cells per mL</th><th>Cells per µL</th><th>Millions per mL</th><th>Cells per litre</th><th>log₁₀(cells/mL)</th></tr></thead><tbody><tr><td><strong>Cell concentration</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+0.67%</td></tr></tbody></table><p>The steepest column belongs to Cell concentration: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Cell concentration = 0.75 ×10⁶/mL, the answer is <strong>Cells per mL</strong> = 750000 cells/mL, <strong>Cells per µL</strong> = 750 cells/µL, <strong>Millions per mL</strong> = 0.75 ×10⁶/mL, <strong>Cells per litre</strong> = 7.500e+8 cells/L and <strong>log₁₀(cells/mL)</strong> = 5.88.</li><li>With Cell concentration = 4.5 ×10⁶/mL, the answer is <strong>Cells per mL</strong> = 4.500e+6 cells/mL, <strong>Cells per µL</strong> = 4500 cells/µL, <strong>Millions per mL</strong> = 4.5 ×10⁶/mL, <strong>Cells per litre</strong> = 4.500e+9 cells/L and <strong>log₁₀(cells/mL)</strong> = 6.65.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Cells per mL is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Cell concentration are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Cell concentration and the number you are missing is Cells per mL and Cells per µL.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/bird-age">Bird age</a>, <a href="/biology/bod-load">BOD Load Calculator</a> and <a href="/biology/bone-length-to-body-height">Bone Length to Body Height Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cell Density Unit calculator work out?', 'a' => 'Cells per mL, Cells per µL, Millions per mL and Cells per litre, from Cell concentration. The relationship is Cells per mL = Cell concentration × 1000000.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Cell concentration (×10⁶/mL). Enter cell concentration; Cells per mL is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Cells per mL, Cells per µL, Millions per mL and Cells per litre can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Cells per mL = 1.500e+6 cells/mL, Cells per µL = 1500 cells/µL, Millions per mL = 1.5 ×10⁶/mL, Cells per litre = 1.500e+9 cells/L and log₁₀(cells/mL) = 6.18. That comes from the page's own defaults, entered in Cell concentration; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Cells per mL is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Cell concentration left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Cells per mL keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/bird-age', 'name' => 'Bird age'],
            ['path' => '/biology/bod-load', 'name' => 'BOD Load Calculator'],
            ['path' => '/biology/bone-length-to-body-height', 'name' => 'Bone Length to Body Height Calculator'],
        ],
        'authors' => [],
    ],
];

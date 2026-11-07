<?php

/**
 * Bacterial Concentration Calculator
 * /biology/bacterial-concentration-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bacterial Concentration Calculator',
    'meta' => ['title' => 'Bacterial Concentration Calculator — Biology', 'description' => <<<'TXT'
    Bacterial Concentration Calculator turns CFU per mL, OD600 and Cells per mL per OD unit into cells per mL (from OD) and log₁₀ CFU/mL. Every figure is computed.
    TXT, 'h1' => 'Bacterial Concentration Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'cfu_ml',
                            'label' => 'CFU per mL',
                            'type' => 'number',
                            'suffix' => 'CFU/mL',
                            'help' => 'From a plate count',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5000000',
                        ],
                        [
                            'name' => 'od',
                            'label' => 'OD600',
                            'type' => 'number',
                            'help' => 'Optional cross-check',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.6',
                        ],
                        [
                            'name' => 'factor',
                            'label' => 'Cells per mL per OD unit',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '800000000.0',
                        ],
                        [
                            'name' => 'cells',
                            'label' => 'Cells per mL (from OD)',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'log_cfu',
                            'label' => 'log₁₀ CFU/mL',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Cells per CFU',
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
            'title' => 'Concentration',
            'results' => ['cells' => 'od*factor', 'log_cfu' => 'log10(cfu_ml)', 'ratio' => 'od*factor/cfu_ml'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Bacterial Concentration works out Cells per mL (from OD) and log₁₀ CFU/mL from CFU per mL, OD600 and Cells per mL per OD unit. There is no hidden constant here: change cells per mL (from OD) and CFU per mL moves with it. The main result, Cells per mL (from OD), is reported in cells/mL.
        TXT,
        'sections' => [
            ['title' => 'How the Bacterial Concentration calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Bacterial Concentration: it takes 3 numbers and reports Cells per mL (from OD), log₁₀ CFU/mL and Cells per CFU.</p><p>Written with the labels from the form, Cells per mL (from OD) = OD600 × Cells per mL per OD unit.</p><p>What comes back is Cells per mL (from OD), log₁₀ CFU/mL and Cells per CFU — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>CFU per mL</strong> — in CFU/mL. From a plate count</li><li><strong>OD600</strong> — a plain number, no unit. Optional cross-check</li><li><strong>Cells per mL per OD unit</strong> — in cells/mL</li></ul><p>What you get back is Cells per mL (from OD) in cells/mL, log₁₀ CFU/mL, Cells per CFU, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, CFU per mL = 5.000e+6 CFU/mL, OD600 = 0.6 and Cells per mL per OD unit = 8.000e+8 cells/mL gives <strong>Cells per mL (from OD)</strong> = 4.800e+8 cells/mL, <strong>log₁₀ CFU/mL</strong> = 6.7 and <strong>Cells per CFU</strong> = 96.</p><ul><li><strong>Cells per mL (from OD)</strong> = 4.800e+8 cells/mL</li><li><strong>log₁₀ CFU/mL</strong> = 6.7</li><li><strong>Cells per CFU</strong> = 96</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Cells per mL (from OD)</strong> = <code>OD600 × Cells per mL per OD unit</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Cells per mL (from OD)</strong> = 4.800e+8, <strong>log₁₀ CFU/mL</strong> = 6.7 and <strong>Cells per CFU</strong> = 96. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Cells per mL (from OD) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Cells per mL (from OD)</strong> = <code>OD600 × Cells per mL per OD unit</code></li><li><strong>log₁₀ CFU/mL</strong> = <code>log₁₀(CFU per mL)</code></li><li><strong>Cells per CFU</strong> = <code>OD600 × Cells per mL per OD unit ÷ CFU per mL</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Cells per mL (from OD)</strong> = <code>OD600 × Cells per mL per OD unit</code> — the form to use when OD600 and Cells per mL per OD unit are the values you have.</li><li><strong>log₁₀ CFU/mL</strong> = <code>log₁₀(CFU per mL)</code> — the form to use when CFU per mL are the values you have.</li><li><strong>Cells per CFU</strong> = <code>OD600 × Cells per mL per OD unit ÷ CFU per mL</code> — the form to use when OD600, Cells per mL per OD unit and CFU per mL are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Cells per mL (from OD), log₁₀ CFU/mL and Cells per CFU can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double CFU per mL from 5.000e+6 to 1.000e+7, leaving every other box alone. The panel moves from <strong>Cells per mL (from OD)</strong> 4.800e+8 cells/mL, <strong>log₁₀ CFU/mL</strong> 6.7 and <strong>Cells per CFU</strong> 96 to <strong>Cells per mL (from OD)</strong> 4.800e+8 cells/mL, <strong>log₁₀ CFU/mL</strong> 7 and <strong>Cells per CFU</strong> 48.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Cells per mL (from OD), log₁₀ CFU/mL and Cells per CFU are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>CFU per mL left as a guess.</strong> Anything typed into CFU per mL is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>OD600 left as a guess.</strong> Anything typed into OD600 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Cells per mL per OD unit left as a guess.</strong> Anything typed into Cells per mL per OD unit is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If CFU per mL is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Bacterial Concentration form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>CFU per mL</strong> is measured in CFU/mL. From a plate count. The page reads it when it works out log₁₀ CFU/mL and Cells per CFU. Fill it from a measurement rather than a memory — CFU per mL is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>OD600</strong> takes a plain number with no unit attached. Optional cross-check. The page reads it when it works out Cells per mL (from OD) and Cells per CFU. Fill it from a measurement rather than a memory — OD600 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cells per mL per OD unit</strong> is measured in cells/mL. The page reads it when it works out Cells per mL (from OD) and Cells per CFU. Fill it from a measurement rather than a memory — Cells per mL per OD unit is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Cells per mL (from OD)</strong> is a plain number and the page's own defaults put it at 4.800e+8. The value follows from OD600 and Cells per mL per OD unit. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>log₁₀ CFU/mL</strong> is a plain number and the page's own defaults put it at 6.7. The value follows from CFU per mL. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Cells per CFU</strong> is a plain number and the page's own defaults put it at 96. The value follows from OD600, Cells per mL per OD unit and CFU per mL. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Cells per mL (from OD)</th><th>log₁₀ CFU/mL</th><th>Cells per CFU</th></tr></thead><tbody><tr><td><strong>CFU per mL</strong> +10%</td><td>+0%</td><td>+0.62%</td><td>-9.09%</td></tr><tr><td><strong>OD600</strong> +10%</td><td>+10%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Cells per mL per OD unit</strong> +10%</td><td>+10%</td><td>+0%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Cells per mL per OD unit: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in CFU per mL = 2.500e+6 CFU/mL, OD600 = 0.3 and Cells per mL per OD unit = 4.000e+8 cells/mL and the page reports <strong>Cells per mL (from OD)</strong> = 1.200e+8 cells/mL, <strong>log₁₀ CFU/mL</strong> = 6.4 and <strong>Cells per CFU</strong> = 48.</li><li>Feed in CFU per mL = 1.500e+7 CFU/mL, OD600 = 0.6 and Cells per mL per OD unit = 8.000e+8 cells/mL and the page reports <strong>Cells per mL (from OD)</strong> = 4.800e+8 cells/mL, <strong>log₁₀ CFU/mL</strong> = 7.18 and <strong>Cells per CFU</strong> = 32.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Cells per mL (from OD) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes CFU per mL, OD600 and Cells per mL per OD unit are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are CFU per mL, OD600 and Cells per mL per OD unit and the number you are missing is Cells per mL (from OD) and log₁₀ CFU/mL.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/hunting-tooth-ratio">Hunting Tooth Ratio Calculator</a>, <a href="/biology/ideal-fish-tank-size">Ideal Fish Tank Size Calculator</a> and <a href="/biology/in-vivo-formulation">In Vivo Formulation Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bacterial Concentration calculator work out?', 'a' => <<<'TXT'
            Cells per mL (from OD), log₁₀ CFU/mL and Cells per CFU, from OD600 and Cells per mL per OD unit. The relationship is Cells per mL (from OD) = OD600 × Cells per mL per OD unit.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            CFU per mL (CFU/mL), OD600, Cells per mL per OD unit (cells/mL). With CFU per mL, OD600 and cells per mL per OD unit in place, Cells per mL (from OD) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Cells per mL (from OD), log₁₀ CFU/mL and Cells per CFU can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Cells per mL (from OD) = 4.800e+8 cells/mL, log₁₀ CFU/mL = 6.7 and Cells per CFU = 96. Those are the defaults written into the form — move CFU per mL and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Cells per mL (from OD) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave CFU per mL blank and the page solves for it, reporting Cells per mL (from OD) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Cells per mL (from OD) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/hunting-tooth-ratio', 'name' => 'Hunting Tooth Ratio Calculator'],
            ['path' => '/biology/ideal-fish-tank-size', 'name' => 'Ideal Fish Tank Size Calculator'],
            ['path' => '/biology/in-vivo-formulation', 'name' => 'In Vivo Formulation Calculator'],
        ],
        'authors' => [],
    ],
];

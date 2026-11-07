<?php

/**
 * Bradford Assay Calculator (standard curve)
 * /biology/bradford-assay-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bradford Assay Calculator (standard curve)',
    'meta' => ['title' => 'Bradford Assay Calculator (standard curve) — Biology', 'description' => 'Bradford is the quickest colorimetric protein assay and the one most sensitive to which protein you are measuring. Free bradford assay (standard curve) calcul', 'h1' => 'Bradford Assay Calculator (standard curve)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'a595',
                            'label' => 'Sample absorbance',
                            'type' => 'number',
                            'help' => 'Read at 595 nm, blank subtracted',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.48',
                        ],
                        [
                            'name' => 'slope',
                            'label' => 'Standard curve slope',
                            'type' => 'number',
                            'suffix' => 'per mg/mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.05',
                        ],
                        [
                            'name' => 'intercept',
                            'label' => 'Standard curve intercept',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.03',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Sample dilution factor',
                            'type' => 'number',
                            'suffix' => '×',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'conc',
                            'label' => 'Protein concentration',
                            'type' => 'number',
                            'suffix' => 'mg/mL',
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
            'results' => ['conc' => '(a595-intercept)/slope*dilution'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Bradford Assay Calculator (standard curve) works out Protein concentration from Sample absorbance, Standard curve slope and Standard curve intercept. The arithmetic is the whole method: Protein concentration is worked out from Sample absorbance by one formula, applied once. Protein concentration comes back in mg/mL unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Bradford Assay Calculator (standard curve) calculator works', 'html' => <<<'TXT'
            <p>Bradford Assay Calculator (standard curve) answers one question from 4 numbers, and the answer is Protein concentration.</p><p>In the form&#039;s own words, Protein concentration = (Sample absorbance − Standard curve intercept) ÷ Standard curve slope × Sample dilution factor.</p><p>The result panel carries Protein concentration, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Sample absorbance</strong> — a plain number, no unit. Read at 595 nm, blank subtracted</li><li><strong>Standard curve slope</strong> — in per mg/mL</li><li><strong>Standard curve intercept</strong> — a plain number, no unit</li><li><strong>Sample dilution factor</strong> — in ×</li></ul><p>What you get back is Protein concentration in mg/mL, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Sample absorbance = 0.48, Standard curve slope = 1.05 per mg/mL, Standard curve intercept = 0.03 and Sample dilution factor = 1 ×; the answers are &lt;strong&gt;Protein concentration&lt;/strong&gt; = 0.4286 mg/mL.</p><ul><li><strong>Protein concentration</strong> = 0.4286 mg/mL</li></ul><p>That is <strong>Protein concentration</strong> = <code>(Sample absorbance − Standard curve intercept) ÷ Standard curve slope × Sample dilution factor</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Protein concentration&lt;/strong&gt; = 0.4286. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Protein concentration is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Protein concentration</strong> = <code>(Sample absorbance − Standard curve intercept) ÷ Standard curve slope × Sample dilution factor</code></li></ul>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Sample absorbance, from 0.48 to 0.96 — and the answers go from &lt;strong&gt;Protein concentration&lt;/strong&gt; 0.4286 mg/mL to &lt;strong&gt;Protein concentration&lt;/strong&gt; 0.8857 mg/mL.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Protein concentration is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Sample absorbance and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Sample absorbance, Standard curve slope and Standard curve intercept and the number you are missing is Protein concentration.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/specific-growth-rate-from-od">Specific Growth Rate from OD Readings Calculator</a>, <a href="/biology/specific-productivity-qp">Specific Productivity (qP) Calculator</a> and <a href="/biology/cedar-tree-value">Standing Timber Value Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bradford Assay Calculator (standard curve) calculator work out?', 'a' => <<<'TXT'
            Protein concentration, from Sample absorbance, Standard curve intercept, Standard curve slope and Sample dilution factor. The relationship is Protein concentration = (Sample absorbance − Standard curve intercept) ÷ Standard curve slope × Sample dilution factor.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Sample absorbance, Standard curve slope (per mg/mL), Standard curve intercept, Sample dilution factor (×). Enter a595, slope and intercept; Protein concentration is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Protein concentration = 0.4286 mg/mL. Those are the defaults written into the form — move Sample absorbance and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Protein concentration is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Protein concentration, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Protein concentration keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/specific-growth-rate-from-od', 'name' => 'Specific Growth Rate from OD Readings Calculator'],
            ['path' => '/biology/specific-productivity-qp', 'name' => 'Specific Productivity (qP) Calculator'],
            ['path' => '/biology/cedar-tree-value', 'name' => 'Standing Timber Value Calculator'],
        ],
        'authors' => [],
    ],
];

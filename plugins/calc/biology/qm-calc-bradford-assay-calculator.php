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
    'meta' => ['title' => 'Bradford Assay Calculator (standard curve) — Biology', 'description' => 'Enter sample absorbance, standard curve slope and standard curve intercept and Bradford Assay Calculator (standard curve) returns protein concentration.', 'h1' => 'Bradford Assay Calculator (standard curve)', 'updated' => '2026-10-29'],
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
        Bradford Assay Calculator (standard curve) works out Protein concentration from Sample absorbance, Standard curve slope and Standard curve intercept. The arithmetic is the whole method: protein concentration is worked out from sample absorbance by one formula, applied once. Protein concentration comes back in mg/mL unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Bradford Assay Calculator (standard curve) calculator works', 'html' => <<<'TXT'
            <p>Bradford Assay Calculator (standard curve) answers one question from 4 numbers, and the answer is Protein concentration.</p><p>In the form&#039;s own words, Protein concentration = (Sample absorbance − Standard curve intercept) ÷ Standard curve slope × Sample dilution factor.</p><p>The result panel carries Protein concentration, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Sample absorbance</strong> — a plain number, no unit. Read at 595 nm, blank subtracted</li><li><strong>Standard curve slope</strong> — in per mg/mL</li><li><strong>Standard curve intercept</strong> — a plain number, no unit</li><li><strong>Sample dilution factor</strong> — in ×</li></ul><p>What you get back is Protein concentration in mg/mL, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Sample absorbance = 0.48, Standard curve slope = 1.05 per mg/mL, Standard curve intercept = 0.03 and Sample dilution factor = 1 ×; the answers are <strong>Protein concentration</strong> = 0.4286 mg/mL.</p><ul><li><strong>Protein concentration</strong> = 0.4286 mg/mL</li></ul><p>That is <strong>Protein concentration</strong> = <code>(Sample absorbance − Standard curve intercept) ÷ Standard curve slope × Sample dilution factor</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Protein concentration</strong> = 0.4286. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Protein concentration is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Protein concentration</strong> = <code>(Sample absorbance − Standard curve intercept) ÷ Standard curve slope × Sample dilution factor</code></li></ul>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Sample absorbance, from 0.48 to 0.96 — and the answers go from <strong>Protein concentration</strong> 0.4286 mg/mL to <strong>Protein concentration</strong> 0.8857 mg/mL.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Protein concentration is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Sample absorbance left as a guess.</strong> Anything typed into Sample absorbance is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Standard curve slope left as a guess.</strong> Anything typed into Standard curve slope is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Standard curve intercept left as a guess.</strong> Anything typed into Standard curve intercept is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Sample absorbance and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Sample absorbance</strong> takes a plain number with no unit attached. Read at 595 nm, blank subtracted. Change it and Protein concentration changes with it. Have it to hand before you start: Sample absorbance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Standard curve slope</strong> is measured in per mg/mL. Change it and Protein concentration changes with it. Have it to hand before you start: Standard curve slope is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Standard curve intercept</strong> takes a plain number with no unit attached. Change it and Protein concentration changes with it. Have it to hand before you start: Standard curve intercept is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Sample dilution factor</strong> is measured in ×. Change it and Protein concentration changes with it. Have it to hand before you start: Sample dilution factor is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Protein concentration</strong> is a plain number and the page's own defaults put it at 0.4286. It is worked out from Sample absorbance, Standard curve intercept, Standard curve slope and Sample dilution factor. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Protein concentration</th></tr></thead><tbody><tr><td><strong>Sample absorbance</strong> +10%</td><td>+10.67%</td></tr><tr><td><strong>Standard curve slope</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Standard curve intercept</strong> +10%</td><td>-0.67%</td></tr><tr><td><strong>Sample dilution factor</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Sample absorbance: ten per cent there moves an answer by about 10.7 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Sample absorbance = 0.24, Standard curve slope = 0.525 per mg/mL, Standard curve intercept = 0.015 and Sample dilution factor = 0.5 ×, the answer is <strong>Protein concentration</strong> = 0.2143 mg/mL.</li><li>With Sample absorbance = 1.44, Standard curve slope = 1.05 per mg/mL, Standard curve intercept = 0.03 and Sample dilution factor = 1 ×, the answer is <strong>Protein concentration</strong> = 1.34 mg/mL.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Sample absorbance, Standard curve slope, Standard curve intercept and Sample dilution factor. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Sample absorbance into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Protein concentration in mg/mL with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Protein concentration is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Sample absorbance, Standard curve slope and Standard curve intercept are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Sample absorbance, Standard curve slope and Standard curve intercept and the number you are missing is Protein concentration.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/specific-growth-rate-from-od">Specific Growth Rate from OD Readings Calculator</a>, <a href="/biology/specific-productivity-qp">Specific Productivity (qP) Calculator</a> and <a href="/biology/cedar-tree-value">Standing Timber Value Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bradford Assay Calculator (standard curve) calculator work out?', 'a' => <<<'TXT'
            Protein concentration, from Sample absorbance, Standard curve intercept, Standard curve slope and Sample dilution factor. The relationship is Protein concentration = (Sample absorbance − Standard curve intercept) ÷ Standard curve slope × Sample dilution factor.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Sample absorbance, Standard curve slope (per mg/mL), Standard curve intercept, Sample dilution factor (×). Enter sample absorbance, standard curve slope and standard curve intercept; Protein concentration is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Protein concentration = 0.4286 mg/mL. Those are the defaults written into the form — move Sample absorbance and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Protein concentration is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
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

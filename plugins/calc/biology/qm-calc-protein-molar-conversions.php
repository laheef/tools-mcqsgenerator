<?php

/**
 * Protein Molar Conversions
 * /biology/protein-molar-conversions
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Protein Molar Conversions',
    'meta' => ['title' => 'Protein Molar Conversions — Formula & Results', 'description' => 'Enter Molecular weight and Mass concentration into protein Molar Conversions and the answer comes back as molar concentration and Molar concentration.', 'h1' => 'Protein Molar Conversions', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'mw',
                            'label' => 'Molecular weight',
                            'type' => 'number',
                            'suffix' => 'Da',
                            'help' => 'g/mol',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '55000',
                        ],
                        [
                            'name' => 'mg_ml',
                            'label' => 'Mass concentration',
                            'type' => 'number',
                            'suffix' => 'mg/mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'um',
                            'label' => 'Molar concentration',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'nm',
                            'label' => 'Molar concentration',
                            'type' => 'number',
                            'suffix' => 'nM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'nmol_ml',
                            'label' => 'Amount per mL',
                            'type' => 'number',
                            'suffix' => 'nmol/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mg_total',
                            'label' => 'Mass in 1 mL',
                            'type' => 'number',
                            'suffix' => 'mg',
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
                'um' => 'mg_ml/mw*1000000',
                'nm' => 'mg_ml/mw*1000000000',
                'nmol_ml' => 'mg_ml/mw*1000000',
                'mg_total' => 'mg_ml*1',
                'mg_ml' => 'um*mw/1000000',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Molecular weight and Mass concentration into Protein Molar Conversions and the answer comes back as Molar concentration and Molar concentration. It is a single relationship that reads molar concentration out of molecular weight, not a table of canned results keyed by them. Units for Molar concentration default to µM and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Protein Molar Conversions calculator works', 'html' => <<<'TXT'
            <p>The Protein Molar Conversions calculator applies one relationship to 2 numbers and reports Molar concentration, Molar concentration and Amount per mL.</p><p>In the form&#039;s own words, Molar concentration = Mass concentration ÷ Molecular weight × 1000000.</p><p>What comes back is Molar concentration, Molar concentration, Amount per mL and Mass in 1 mL — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Molecular weight</strong> — in Da. g/mol</li><li><strong>Mass concentration</strong> — in mg/mL</li></ul><p>The answers come back as Molar concentration in µM, Molar concentration in nM, Amount per mL in nmol/mL, Mass in 1 mL in mg. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Molar concentration is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Molar concentration</strong> = <code>Mass concentration ÷ Molecular weight × 1000000</code></li><li><strong>Amount per mL</strong> = <code>Mass concentration ÷ Molecular weight × 1000000</code></li><li><strong>Mass in 1 mL</strong> = <code>Mass concentration × 1</code></li><li><strong>Mass concentration</strong> = <code>Molar concentration × Molecular weight ÷ 1000000</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Molar concentration</strong> = <code>Mass concentration ÷ Molecular weight × 1000000</code> — the form to use when Mass concentration and Molecular weight are the values you have.</li><li><strong>Molar concentration</strong> = <code>Mass concentration ÷ Molecular weight × 1000000000</code> — the form to use when Mass concentration and Molecular weight are the values you have.</li><li><strong>Amount per mL</strong> = <code>Mass concentration ÷ Molecular weight × 1000000</code> — the form to use when Mass concentration and Molecular weight are the values you have.</li><li><strong>Mass in 1 mL</strong> = <code>Mass concentration × 1</code> — the form to use when Mass concentration are the values you have.</li><li><strong>Mass concentration</strong> = <code>Molar concentration × Molecular weight ÷ 1000000</code> — the form to use when Molar concentration and Molecular weight are the values you have.</li></ul><p>Any one of Molar concentration, Molar concentration and Amount per mL can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Molar concentration, Molar concentration and Amount per mL are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Molecular weight left as a guess.</strong> Anything typed into Molecular weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Mass concentration left as a guess.</strong> Anything typed into Mass concentration is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Molecular weight to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Protein Molar Conversions form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Molecular weight</strong> is measured in Da. It feeds Molar concentration, Molar concentration and Amount per mL. Fill it from a measurement rather than a memory — Molecular weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Mass concentration</strong> is measured in mg/mL. It feeds Molar concentration, Molar concentration and Amount per mL. Fill it from a measurement rather than a memory — Mass concentration is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Molar concentration</strong> is a plain number. The value follows from Mass concentration and Molecular weight. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Molar concentration</strong> is a plain number. The value follows from Mass concentration and Molecular weight. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Amount per mL</strong> is a plain number. The value follows from Mass concentration and Molecular weight. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Mass in 1 mL</strong> is a plain number. The value follows from Mass concentration. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Molecular weight and Mass concentration ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Molecular weight — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Molar concentration in µM against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Molar concentration is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Molecular weight and Mass concentration are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Molecular weight and Mass concentration and the number you are missing is Molar concentration and Molar concentration.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/pcr-master-mix-calculator">PCR Master Mix Calculator</a>, <a href="/biology/pcr-primer-stats">PCR Primer Stats Calculator</a> and <a href="/biology/pedigree-probability">Pedigree Probability Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Protein Molar Conversions is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Protein Molar Conversions is a number to act on, so the useful question is what to do with Molar concentration (µM), Molar concentration (nM) and Amount per mL (nmol/mL) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Molecular weight and Mass concentration alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Protein Molar Conversions calculator work out?', 'a' => <<<'TXT'
            Molar concentration, Molar concentration, Amount per mL and Mass in 1 mL, from Mass concentration and Molecular weight. The relationship is Molar concentration = Mass concentration ÷ Molecular weight × 1000000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Molecular weight (Da), Mass concentration (mg/mL). Fill molecular weight and mass concentration and leave Molar concentration empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Molar concentration, Molar concentration, Amount per mL and Mass in 1 mL blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Molar concentration is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Molecular weight blank and the page solves for it, reporting Molar concentration instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Molar concentration keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/pcr-master-mix-calculator', 'name' => 'PCR Master Mix Calculator'],
            ['path' => '/biology/pcr-primer-stats', 'name' => 'PCR Primer Stats Calculator'],
            ['path' => '/biology/pedigree-probability', 'name' => 'Pedigree Probability Calculator'],
        ],
        'authors' => [],
    ],
];

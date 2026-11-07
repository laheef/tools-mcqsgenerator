<?php

/**
 * BCA Assay Calculator (standard curve)
 * /biology/bca-assay-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'BCA Assay Calculator (standard curve)',
    'meta' => ['title' => 'BCA Assay Calculator (standard curve) — Biology', 'description' => 'BCA Assay Calculator (standard curve) takes sample absorbance and returns protein concentration. Every box can be solved for, not only the one in the title.', 'h1' => 'BCA Assay Calculator (standard curve)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'a562',
                            'label' => 'Sample absorbance',
                            'type' => 'number',
                            'help' => 'Read at 562 nm, blank subtracted',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.62',
                        ],
                        [
                            'name' => 'slope',
                            'label' => 'Standard curve slope',
                            'type' => 'number',
                            'suffix' => 'per mg/mL',
                            'help' => 'Absorbance units per mg/mL of protein',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.35',
                        ],
                        [
                            'name' => 'intercept',
                            'label' => 'Standard curve intercept',
                            'type' => 'number',
                            'help' => 'Absorbance at zero protein',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.02',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Sample dilution factor',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '2 for a 1:1 dilution with buffer',
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
            'results' => ['conc' => '(a562-intercept)/slope*dilution', 'a562' => 'conc*slope/dilution+intercept'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        BCA Assay Calculator (standard curve) takes Sample absorbance, Standard curve slope and Standard curve intercept and returns Protein concentration. Nothing is looked up on this page: protein concentration is computed from sample absorbance and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Protein concentration is opened in mg/mL; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the BCA Assay Calculator (standard curve) calculator works', 'html' => <<<'TXT'
            <p>The BCA Assay Calculator (standard curve) calculator applies one relationship to 4 numbers and reports Protein concentration.</p><p>The relationship it solves reads Protein concentration = (Sample absorbance − Standard curve intercept) ÷ Standard curve slope × Sample dilution factor.</p><p>What comes back is Protein concentration — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Sample absorbance</strong> — a plain number, no unit. Read at 562 nm, blank subtracted</li><li><strong>Standard curve slope</strong> — in per mg/mL. Absorbance units per mg/mL of protein</li><li><strong>Standard curve intercept</strong> — a plain number, no unit. Absorbance at zero protein</li><li><strong>Sample dilution factor</strong> — in ×. 2 for a 1:1 dilution with buffer</li></ul><p>The result box is Protein concentration in mg/mL. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Protein concentration takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Protein concentration</strong> = <code>(Sample absorbance − Standard curve intercept) ÷ Standard curve slope × Sample dilution factor</code></li><li><strong>Sample absorbance</strong> = <code>Protein concentration × Standard curve slope ÷ Sample dilution factor + Standard curve intercept</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Protein concentration</strong> = <code>(Sample absorbance − Standard curve intercept) ÷ Standard curve slope × Sample dilution factor</code> — the form to use when Sample absorbance, Standard curve intercept, Standard curve slope and Sample dilution factor are the values you have.</li><li><strong>Sample absorbance</strong> = <code>Protein concentration × Standard curve slope ÷ Sample dilution factor + Standard curve intercept</code> — the form to use when Protein concentration, Standard curve slope, Sample dilution factor and Standard curve intercept are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Protein concentration and Sample absorbance can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Protein concentration is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Sample absorbance left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Sample absorbance is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Standard curve slope left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Standard curve slope is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Standard curve intercept left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Standard curve intercept is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Sample absorbance to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the BCA Assay Calculator (standard curve) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Sample absorbance</strong> takes a plain number with no unit attached. Read at 562 nm, blank subtracted. Change it and Protein concentration changes with it. Fill it from a measurement rather than a memory — Sample absorbance is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Standard curve slope</strong> is measured in per mg/mL. Absorbance units per mg/mL of protein. Change it and Protein concentration and Sample absorbance changes with it. Fill it from a measurement rather than a memory — Standard curve slope is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Standard curve intercept</strong> takes a plain number with no unit attached. Absorbance at zero protein. Change it and Protein concentration and Sample absorbance changes with it. Fill it from a measurement rather than a memory — Standard curve intercept is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Sample dilution factor</strong> is measured in ×. 2 for a 1:1 dilution with buffer. Change it and Protein concentration and Sample absorbance changes with it. Fill it from a measurement rather than a memory — Sample dilution factor is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Protein concentration</strong> is a plain number. The value follows from Sample absorbance, Standard curve intercept, Standard curve slope and Sample dilution factor. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Sample absorbance, Standard curve slope, Standard curve intercept and Sample dilution factor ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Sample absorbance — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Protein concentration in mg/mL against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Protein concentration follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Sample absorbance, Standard curve slope and Standard curve intercept and the number you are missing is Protein concentration.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/od600-to-cell-density">OD600 to Cell Density Calculator</a>, <a href="/biology/genetic-odds-ratio">Odds Ratio for Genetics Calculator</a> and <a href="/biology/oligo-converter">Oligo pmol/µL to µg/mL Converter Calculator — Formula &amp; Result</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>BCA Assay Calculator (standard curve) is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what BCA Assay Calculator (standard curve) is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Sample absorbance, Standard curve slope, Standard curve intercept and Sample dilution factor beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the BCA Assay Calculator (standard curve) calculator work out?', 'a' => <<<'TXT'
            Protein concentration, from Sample absorbance, Standard curve intercept, Standard curve slope and Sample dilution factor. The relationship is Protein concentration = (Sample absorbance − Standard curve intercept) ÷ Standard curve slope × Sample dilution factor.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Sample absorbance, Standard curve slope (per mg/mL), Standard curve intercept, Sample dilution factor (×). With sample absorbance, standard curve slope and standard curve intercept in place, Protein concentration can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Protein concentration and Sample absorbance can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Protein concentration is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Sample absorbance blank and the page solves for it, reporting Protein concentration instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Protein concentration keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/od600-to-cell-density', 'name' => 'OD600 to Cell Density Calculator'],
            ['path' => '/biology/genetic-odds-ratio', 'name' => 'Odds Ratio for Genetics Calculator'],
            ['path' => '/biology/oligo-converter', 'name' => 'Oligo pmol/µL to µg/mL Converter Calculator — Formula & Result'],
        ],
        'authors' => [],
    ],
];

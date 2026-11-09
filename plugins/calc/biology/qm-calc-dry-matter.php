<?php

/**
 * Dry matter
 * /biology/dry-matter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dry matter',
    'meta' => ['title' => 'Dry matter Calculator: Formula, Steps & Example', 'description' => 'Dry matter takes i want to..., protein and fat and returns others and final total. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Dry matter Calculator', 'updated' => '2026-08-06'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'compareOption',
                            'label' => 'I want to...',
                            'type' => 'select',
                            'options' => ['check a product' => '1', 'compare 2 products' => '2'],
                            'dataset' => 'compare option',
                            'defaults' => [
                                ['value' => 'check a product', 'when' => null],
                                ['value' => 'check a product', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Guaranteed analysis - Product 1',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wetMatterProtein0',
                            'label' => 'Protein',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wetMatterFat0',
                            'label' => 'Fat',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wetMatterFiber0',
                            'label' => 'Fiber',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'moisture0',
                            'label' => 'Moisture',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wetMatterOthers0',
                            'label' => 'Others',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Guaranteed analysis - Product 2',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wetMatterProtein1',
                            'label' => 'Protein',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wetMatterFat1',
                            'label' => 'Fat',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wetMatterFiber1',
                            'label' => 'Fiber',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'moisture1',
                            'label' => 'Moisture',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wetMatterOthers1',
                            'label' => 'Others',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Always hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dryMatterFat0',
                            'label' => 'Dry matter fat',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dryMatterProtein0',
                            'label' => 'Dry matter protein',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dryMatterFiber0',
                            'label' => 'Dry matter fiber',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dryMatterOthers0',
                            'label' => 'Dry matter others',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'finalTotal0',
                            'label' => 'Final total',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dryMatterProtein1',
                            'label' => 'Dry matter protein',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dryMatterFat1',
                            'label' => 'Dry matter fat',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dryMatterFiber1',
                            'label' => 'Dry matter fiber',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dryMatterOthers1',
                            'label' => 'Dry matter others',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'finalTotal1',
                            'label' => 'Final total1',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'dryMatterProtein0 = wetMatterProtein0/(1-moisture0)',
            'results' => ['dryMatterProtein0' => 'wetMatterProtein0/(1-moisture0)', 'wetMatterProtein0' => 'dryMatterProtein0*(1-moisture0)', 'moisture0' => '1 - wetMatterProtein0/dryMatterProtein0'],
        ],
        [
            'title' => 'dryMatterFat0 = wetMatterFat0/(1-moisture0)',
            'results' => ['dryMatterFat0' => 'wetMatterFat0/(1-moisture0)', 'wetMatterFat0' => 'dryMatterFat0*(1-moisture0)', 'moisture0' => '1 - wetMatterFat0/dryMatterFat0'],
        ],
        [
            'title' => 'dryMatterFiber0 = wetMatterFiber0/(1-moisture0)',
            'results' => ['dryMatterFiber0' => 'wetMatterFiber0/(1-moisture0)', 'wetMatterFiber0' => 'dryMatterFiber0*(1-moisture0)', 'moisture0' => '1 - wetMatterFiber0/dryMatterFiber0'],
        ],
        [
            'title' => 'dryMatterOthers0 = wetMatterOthers0/(1-moisture0)',
            'results' => ['dryMatterOthers0' => 'wetMatterOthers0/(1-moisture0)', 'wetMatterOthers0' => 'dryMatterOthers0*(1-moisture0)', 'moisture0' => '1 - wetMatterOthers0/dryMatterOthers0'],
        ],
        [
            'title' => 'wetMatterOthers0 = 1 - (wetMatterProtein0 + wetMatterFat0 + wetMatterFiber0 + moisture0)',
            'results' => [
                'moisture0' => '-wetMatterProtein0 - wetMatterFat0 - wetMatterFiber0 - wetMatterOthers0 + 1',
                'wetMatterOthers0' => '-wetMatterProtein0 - wetMatterFat0 - wetMatterFiber0 - moisture0 + 1',
                'wetMatterFiber0' => '-wetMatterProtein0 - wetMatterFat0 - wetMatterOthers0 - moisture0 + 1',
                'wetMatterProtein0' => '-wetMatterFat0 - wetMatterFiber0 - wetMatterOthers0 - moisture0 + 1',
                'wetMatterFat0' => '-wetMatterProtein0 - wetMatterFiber0 - wetMatterOthers0 - moisture0 + 1',
            ],
        ],
        [
            'title' => 'finalTotal0 =  dryMatterProtein0 + dryMatterFat0 + dryMatterFiber0 + dryMatterOthers0',
            'results' => [
                'dryMatterFat0' => '-dryMatterProtein0 - dryMatterFiber0 - dryMatterOthers0 + finalTotal0',
                'finalTotal0' => 'dryMatterProtein0 + dryMatterFat0 + dryMatterFiber0 + dryMatterOthers0',
                'dryMatterOthers0' => '-dryMatterProtein0 - dryMatterFat0 - dryMatterFiber0 + finalTotal0',
                'dryMatterFiber0' => '-dryMatterProtein0 - dryMatterFat0 - dryMatterOthers0 + finalTotal0',
                'dryMatterProtein0' => '-dryMatterFat0 - dryMatterFiber0 - dryMatterOthers0 + finalTotal0',
            ],
        ],
        [
            'title' => 'dryMatterProtein1 = wetMatterProtein1/(1-moisture1)',
            'results' => ['dryMatterProtein1' => 'wetMatterProtein1/(1-moisture1)', 'wetMatterProtein1' => 'dryMatterProtein1*(1-moisture1)', 'moisture1' => '1 - wetMatterProtein1/dryMatterProtein1'],
        ],
        [
            'title' => 'dryMatterFat1 = wetMatterFat1/(1-moisture1)',
            'results' => ['dryMatterFat1' => 'wetMatterFat1/(1-moisture1)', 'wetMatterFat1' => 'dryMatterFat1*(1-moisture1)', 'moisture1' => '1 - wetMatterFat1/dryMatterFat1'],
        ],
        [
            'title' => 'dryMatterFiber1 = wetMatterFiber1/(1-moisture1)',
            'results' => ['dryMatterFiber1' => 'wetMatterFiber1/(1-moisture1)', 'wetMatterFiber1' => 'dryMatterFiber1*(1-moisture1)', 'moisture1' => '1 - wetMatterFiber1/dryMatterFiber1'],
        ],
        [
            'title' => 'dryMatterOthers1 = wetMatterOthers1/(1-moisture1)',
            'results' => ['dryMatterOthers1' => 'wetMatterOthers1/(1-moisture1)', 'wetMatterOthers1' => 'dryMatterOthers1*(1-moisture1)', 'moisture1' => '1 - wetMatterOthers1/dryMatterOthers1'],
        ],
        [
            'title' => 'wetMatterOthers1 = 1 - (wetMatterProtein1 + wetMatterFat1 + wetMatterFiber1 + moisture1)',
            'results' => [
                'moisture1' => '-wetMatterProtein1 - wetMatterFat1 - wetMatterFiber1 - wetMatterOthers1 + 1',
                'wetMatterOthers1' => '-wetMatterProtein1 - wetMatterFat1 - wetMatterFiber1 - moisture1 + 1',
                'wetMatterFiber1' => '-wetMatterProtein1 - wetMatterFat1 - wetMatterOthers1 - moisture1 + 1',
                'wetMatterProtein1' => '-wetMatterFat1 - wetMatterFiber1 - wetMatterOthers1 - moisture1 + 1',
                'wetMatterFat1' => '-wetMatterProtein1 - wetMatterFiber1 - wetMatterOthers1 - moisture1 + 1',
            ],
        ],
        [
            'title' => 'finalTotal1 =  dryMatterProtein1 + dryMatterFat1 + dryMatterFiber1 + dryMatterOthers1',
            'results' => [
                'dryMatterFat1' => '-dryMatterProtein1 - dryMatterFiber1 - dryMatterOthers1 + finalTotal1',
                'finalTotal1' => 'dryMatterProtein1 + dryMatterFat1 + dryMatterFiber1 + dryMatterOthers1',
                'dryMatterOthers1' => '-dryMatterProtein1 - dryMatterFat1 - dryMatterFiber1 + finalTotal1',
                'dryMatterFiber1' => '-dryMatterProtein1 - dryMatterFat1 - dryMatterOthers1 + finalTotal1',
                'dryMatterProtein1' => '-dryMatterFat1 - dryMatterFiber1 - dryMatterOthers1 + finalTotal1',
            ],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Dry matter reads one of fat and fiber from the other, so either can be the value you fill in. Fat comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Dry matter calculator works', 'html' => <<<'TXT'
            <p>The Dry matter calculator applies one relationship to 2 numbers and reports Fat, Fiber and Others.</p><p>Written with the labels from the form, Dry matter protein = Protein ÷ (1 − Moisture).</p><p>What comes back is Fat, Fiber, Others and Protein — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Protein</strong> — in percent</li><li><strong>Moisture</strong> — in percent</li></ul><p>What you get back is Fat in percent, Fiber in percent, Others in percent, Protein in percent, Fat in percent, Fiber in percent, Moisture in percent, Others in percent, Dry matter fat in percent, Dry matter protein in percent, Dry matter fiber in percent, Dry matter others in percent, Final total in percent, Dry matter protein in percent, Dry matter fat in percent, Dry matter fiber in percent, Dry matter others in percent, Final total1 in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Fat offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Dry matter protein</strong> = <code>Protein ÷ (1 − Moisture)</code></li><li><strong>Protein</strong> = <code>Dry matter protein × (1 − Moisture)</code></li><li><strong>Moisture</strong> = <code>1 − Protein ÷ Dry matter protein</code></li><li><strong>Dry matter fat</strong> = <code>Fat ÷ (1 − Moisture)</code></li><li><strong>Fat</strong> = <code>Dry matter fat × (1 − Moisture)</code></li><li><strong>Dry matter fiber</strong> = <code>Fiber ÷ (1 − Moisture)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Dry matter protein</strong> = <code>Protein ÷ (1 − Moisture)</code> — the form to use when Protein and Moisture are the values you have.</li><li><strong>Protein</strong> = <code>Dry matter protein × (1 − Moisture)</code> — the form to use when Dry matter protein and Moisture are the values you have.</li><li><strong>Moisture</strong> = <code>1 − Protein ÷ Dry matter protein</code> — the form to use when Protein and Dry matter protein are the values you have.</li><li><strong>Dry matter fat</strong> = <code>Fat ÷ (1 − Moisture)</code> — the form to use when Fat and Moisture are the values you have.</li><li><strong>Fat</strong> = <code>Dry matter fat × (1 − Moisture)</code> — the form to use when Dry matter fat and Moisture are the values you have.</li><li><strong>Moisture</strong> = <code>1 − Fat ÷ Dry matter fat</code> — the form to use when Fat and Dry matter fat are the values you have.</li><li><strong>Dry matter fiber</strong> = <code>Fiber ÷ (1 − Moisture)</code> — the form to use when Fiber and Moisture are the values you have.</li><li><strong>Fiber</strong> = <code>Dry matter fiber × (1 − Moisture)</code> — the form to use when Dry matter fiber and Moisture are the values you have.</li></ul><p>Any one of Dry matter protein, Protein and Moisture can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Protein and Moisture is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Fat, Fiber and Others are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Protein left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Protein is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Moisture left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Moisture is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Protein to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Dry matter form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Protein</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Dry matter protein, Moisture and Others changes with it. Fill it from a measurement rather than a memory — Protein is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Moisture</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Dry matter protein, Protein and Dry matter fat changes with it. Fill it from a measurement rather than a memory — Moisture is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Protein and Moisture ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Protein — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Fat in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Fat follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Protein and Moisture are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Protein and Moisture is what you already know and Fat and Fiber is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Dry matter is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Dry matter is a number to act on, so the useful question is what to do with Fat (perc), Fiber (perc) and Others (perc) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Protein and Moisture alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dry matter calculator work out?', 'a' => 'Fat, Fiber, Others and Protein, from Protein and Moisture. The relationship is Dry matter protein = Protein ÷ (1 − Moisture).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Protein (percent), Moisture (percent). With protein and moisture in place, Fat can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Dry matter protein, Protein, Moisture and Dry matter fat blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Fat is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Protein blank and the page solves for it, reporting Fat instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Fat keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/maximum-sustainable-yield', 'name' => 'Maximum Sustainable Yield Calculator'],
            ['path' => '/biology/medullary-index', 'name' => 'Medullary Index Calculator'],
            ['path' => '/biology/metacam-dosage-cat', 'name' => 'Metacam dosage for cats'],
        ],
        'authors' => [],
    ],
];

<?php

/**
 * Beer-Lambert A280 Protein Concentration
 * /biology/beer-lambert-a280-protein-concentration
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Beer-Lambert A280 Protein Concentration',
    'meta' => ['title' => 'Beer-Lambert A280 Protein Concentration Calculator', 'description' => 'Beer-Lambert A280 Protein Concentration works out protein concentration from absorbance at 280 nm and extinction coefficient. It returns protein concentration.', 'h1' => 'Beer-Lambert A280 Protein Concentration', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'a280',
                            'label' => 'Absorbance at 280 nm',
                            'type' => 'number',
                            'help' => 'Blanked against buffer',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.85',
                        ],
                        [
                            'name' => 'ext',
                            'label' => 'Extinction coefficient',
                            'type' => 'number',
                            'suffix' => 'M⁻¹cm⁻¹',
                            'help' => 'From the sequence, or 1.0 for 1 mg/mL = 1 AU',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '43824',
                        ],
                        [
                            'name' => 'mw',
                            'label' => 'Molecular weight',
                            'type' => 'number',
                            'suffix' => 'Da',
                            'help' => 'Used when the coefficient is molar',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '55000',
                        ],
                        [
                            'name' => 'path',
                            'label' => 'Path length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => '1 cm cuvette, or the drop path of a NanoDrop',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'conc_mg',
                            'label' => 'Protein concentration',
                            'type' => 'number',
                            'suffix' => 'mg/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'conc_um',
                            'label' => 'Protein concentration',
                            'type' => 'number',
                            'suffix' => 'µM',
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
            'results' => ['conc_mg' => 'a280*mw/(ext*path)', 'conc_um' => 'a280/(ext*path)*1000000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Beer-Lambert A280 Protein Concentration turns Absorbance at 280 nm, Extinction coefficient and Molecular weight into Protein concentration and Protein concentration. There is no hidden constant here: change protein concentration and absorbance at 280 nm moves with it. The main result, Protein concentration, is reported in mg/mL.
        TXT,
        'sections' => [
            ['title' => 'How the Beer-Lambert A280 Protein Concentration calculator works', 'html' => <<<'TXT'
            <p>The Beer-Lambert A280 Protein Concentration calculator applies one relationship to 4 numbers and reports Protein concentration and Protein concentration.</p><p>Written with the labels from the form, Protein concentration = Absorbance at 280 nm × Molecular weight ÷ (Extinction coefficient × Path length).</p><p>The answers are Protein concentration and Protein concentration; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Absorbance at 280 nm</strong> — a plain number, no unit. Blanked against buffer</li><li><strong>Extinction coefficient</strong> — in M⁻¹cm⁻¹. From the sequence, or 1.0 for 1 mg/mL = 1 AU</li><li><strong>Molecular weight</strong> — in Da. Used when the coefficient is molar</li><li><strong>Path length</strong> — in cm. 1 cm cuvette, or the drop path of a NanoDrop</li></ul><p>The result boxes are Protein concentration in mg/mL, Protein concentration in µM; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Absorbance at 280 nm = 0.85, Extinction coefficient = 43824 M⁻¹cm⁻¹, Molecular weight = 55000 Da and Path length = 1 cm; the answers are <strong>Protein concentration</strong> = 1.07 mg/mL and <strong>Protein concentration</strong> = 19.4 µM.</p><ul><li><strong>Protein concentration</strong> = 1.07 mg/mL</li><li><strong>Protein concentration</strong> = 19.4 µM</li></ul><p>That is <strong>Protein concentration</strong> = <code>Absorbance at 280 nm × Molecular weight ÷ (Extinction coefficient × Path length)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Protein concentration</strong> = 1.07 and <strong>Protein concentration</strong> = 19.4 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Protein concentration takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Protein concentration</strong> = <code>Absorbance at 280 nm × Molecular weight ÷ (Extinction coefficient × Path length)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Protein concentration</strong> = <code>Absorbance at 280 nm × Molecular weight ÷ (Extinction coefficient × Path length)</code> — the form to use when Absorbance at 280 nm, Molecular weight, Extinction coefficient and Path length are the values you have.</li><li><strong>Protein concentration</strong> = <code>Absorbance at 280 nm ÷ (Extinction coefficient × Path length) × 1000000</code> — the form to use when Absorbance at 280 nm, Extinction coefficient and Path length are the values you have.</li></ul><p>Any one of Protein concentration and Protein concentration can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Absorbance at 280 nm from 0.85 to 1.7, leaving every other box alone. The panel moves from <strong>Protein concentration</strong> 1.07 mg/mL and <strong>Protein concentration</strong> 19.4 µM to <strong>Protein concentration</strong> 2.13 mg/mL and <strong>Protein concentration</strong> 38.79 µM.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Protein concentration and Protein concentration are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Absorbance at 280 nm left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Absorbance at 280 nm is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Extinction coefficient left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Extinction coefficient is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Molecular weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Molecular weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Absorbance at 280 nm to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Beer-Lambert A280 Protein Concentration form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Absorbance at 280 nm</strong> takes a plain number with no unit attached. Blanked against buffer. It feeds Protein concentration and Protein concentration. Fill it from a measurement rather than a memory — Absorbance at 280 nm is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Extinction coefficient</strong> is measured in M⁻¹cm⁻¹. From the sequence, or 1.0 for 1 mg/mL = 1 AU. It feeds Protein concentration and Protein concentration. Fill it from a measurement rather than a memory — Extinction coefficient is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Molecular weight</strong> is measured in Da. Used when the coefficient is molar. It feeds Protein concentration. Fill it from a measurement rather than a memory — Molecular weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Path length</strong> is measured in cm. 1 cm cuvette, or the drop path of a NanoDrop. It feeds Protein concentration and Protein concentration. Fill it from a measurement rather than a memory — Path length is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Protein concentration</strong> is a plain number and the page's own defaults put it at 1.07. It is computed from Absorbance at 280 nm, Molecular weight, Extinction coefficient and Path length, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Protein concentration</strong> is a plain number and the page's own defaults put it at 19.4. It is computed from Absorbance at 280 nm, Extinction coefficient and Path length, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Protein concentration</th><th>Protein concentration</th></tr></thead><tbody><tr><td><strong>Absorbance at 280 nm</strong> +10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Extinction coefficient</strong> +10%</td><td>-9.09%</td><td>-9.09%</td></tr><tr><td><strong>Molecular weight</strong> +10%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Path length</strong> +10%</td><td>-9.09%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Molecular weight sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Absorbance at 280 nm = 0.425, Extinction coefficient = 21912 M⁻¹cm⁻¹, Molecular weight = 27500 Da and Path length = 0.5 cm and the page reports <strong>Protein concentration</strong> = 1.07 mg/mL and <strong>Protein concentration</strong> = 38.79 µM.</li><li>Feed in Absorbance at 280 nm = 2.55, Extinction coefficient = 43824 M⁻¹cm⁻¹, Molecular weight = 55000 Da and Path length = 1 cm and the page reports <strong>Protein concentration</strong> = 3.2 mg/mL and <strong>Protein concentration</strong> = 58.19 µM.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Protein concentration follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Absorbance at 280 nm, Extinction coefficient and Molecular weight and the number you are missing is Protein concentration and Protein concentration.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/farm-pond-fish-stocking">Farm Pond Fish Stocking Calculator</a>, <a href="/biology/feed-conversion-ratio">Feed Conversion Ratio Calculator</a> and <a href="/biology/fcr">Feed conversion ratio</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Beer-Lambert A280 Protein Concentration is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Absorbance at 280 nm, Extinction coefficient, Molecular weight and Path length beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Beer-Lambert A280 Protein Concentration calculator work out?', 'a' => <<<'TXT'
            Protein concentration and Protein concentration, from Absorbance at 280 nm, Molecular weight, Extinction coefficient and Path length. The relationship is Protein concentration = Absorbance at 280 nm × Molecular weight ÷ (Extinction coefficient × Path length).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Absorbance at 280 nm, Extinction coefficient (M⁻¹cm⁻¹), Molecular weight (Da), Path length (cm). Enter absorbance at 280 nm, extinction coefficient and molecular weight; Protein concentration is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Protein concentration and Protein concentration blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Protein concentration = 1.07 mg/mL and Protein concentration = 19.4 µM. The figures come from Absorbance at 280 nm as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Protein concentration is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Absorbance at 280 nm blank and the page solves for it, reporting Protein concentration instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Protein concentration at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/farm-pond-fish-stocking', 'name' => 'Farm Pond Fish Stocking Calculator'],
            ['path' => '/biology/feed-conversion-ratio', 'name' => 'Feed Conversion Ratio Calculator'],
            ['path' => '/biology/fcr', 'name' => 'Feed conversion ratio'],
        ],
        'authors' => [],
    ],
];

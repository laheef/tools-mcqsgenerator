<?php

/**
 * Enzyme Unit Converter (U/mg, kcat)
 * /biology/enzyme-unit-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Enzyme Unit Converter (U/mg, kcat)',
    'meta' => ['title' => 'Enzyme Unit Converter (U/mg, kcat) Calculator', 'description' => 'Enzyme Unit Converter (U/mg, kcat) works out molar activity from specific activity. It returns kcat (turnover number) and shows the arithmetic behind it.', 'h1' => 'Enzyme Unit Converter (U/mg, kcat)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'activity',
                            'label' => 'Specific activity',
                            'type' => 'number',
                            'suffix' => 'U/mg',
                            'help' => 'Micromoles per minute per milligram',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                        [
                            'name' => 'mw',
                            'label' => 'Enzyme molecular weight',
                            'type' => 'number',
                            'suffix' => 'Da',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '48000',
                        ],
                        [
                            'name' => 'kcat',
                            'label' => 'kcat (turnover number)',
                            'type' => 'number',
                            'suffix' => 's⁻¹',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'molar_activity',
                            'label' => 'Molar activity',
                            'type' => 'number',
                            'suffix' => 'min⁻¹',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ukat',
                            'label' => 'Activity in katal per mg',
                            'type' => 'number',
                            'suffix' => 'µkat/mg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'efficiency',
                            'label' => 'Catalytic efficiency (with Km)',
                            'type' => 'number',
                            'suffix' => 'M⁻¹s⁻¹',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'km',
                            'label' => 'Km',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'help' => 'Optional — used for catalytic efficiency',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '250',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Enzyme units',
            'results' => [
                'kcat' => 'activity*60000/mw',
                'molar_activity' => 'activity*60000/mw*60',
                'ukat' => 'activity/60',
                'efficiency' => 'activity*60000/mw/(km/1000000)',
                'activity' => 'kcat*mw/60000',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enzyme Unit Converter (U/mg, kcat) works out kcat (turnover number) and Molar activity from Specific activity, Enzyme molecular weight and Km. The arithmetic is the whole method: kcat (turnover number) is worked out from specific activity by one formula, applied once. Kcat (turnover number) comes back in s⁻¹ unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Enzyme Unit Converter (U/mg, kcat) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Enzyme Unit Converter (U/mg, kcat): it takes 3 numbers and reports kcat (turnover number), Molar activity and Activity in katal per mg.</p><p>In the form&#039;s own words, kcat (turnover number) = Specific activity × 60000 ÷ Enzyme molecular weight.</p><p>The answers are kcat (turnover number), Molar activity, Activity in katal per mg and Catalytic efficiency (with Km); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Specific activity</strong> — in U/mg. Micromoles per minute per milligram</li><li><strong>Enzyme molecular weight</strong> — in Da</li><li><strong>Km</strong> — in µM. Optional — used for catalytic efficiency</li></ul><p>The answers come back as kcat (turnover number) in s⁻¹, Molar activity in min⁻¹, Activity in katal per mg in µkat/mg, Catalytic efficiency (with Km) in M⁻¹s⁻¹. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as kcat (turnover number) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>kcat (turnover number)</strong> = <code>Specific activity × 60000 ÷ Enzyme molecular weight</code></li><li><strong>Molar activity</strong> = <code>Specific activity × 60000 ÷ Enzyme molecular weight × 60</code></li><li><strong>Activity in katal per mg</strong> = <code>Specific activity ÷ 60</code></li><li><strong>Catalytic efficiency (with Km)</strong> = <code>Specific activity × 60000 ÷ Enzyme molecular weight ÷ (Km ÷ 1000000)</code></li><li><strong>Specific activity</strong> = <code>kcat (turnover number) × Enzyme molecular weight ÷ 60000</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>kcat (turnover number)</strong> = <code>Specific activity × 60000 ÷ Enzyme molecular weight</code> — the form to use when Specific activity and Enzyme molecular weight are the values you have.</li><li><strong>Molar activity</strong> = <code>Specific activity × 60000 ÷ Enzyme molecular weight × 60</code> — the form to use when Specific activity and Enzyme molecular weight are the values you have.</li><li><strong>Activity in katal per mg</strong> = <code>Specific activity ÷ 60</code> — the form to use when Specific activity are the values you have.</li><li><strong>Catalytic efficiency (with Km)</strong> = <code>Specific activity × 60000 ÷ Enzyme molecular weight ÷ (Km ÷ 1000000)</code> — the form to use when Specific activity, Enzyme molecular weight and Km are the values you have.</li><li><strong>Specific activity</strong> = <code>kcat (turnover number) × Enzyme molecular weight ÷ 60000</code> — the form to use when kcat (turnover number) and Enzyme molecular weight are the values you have.</li></ul><p>Any one of kcat (turnover number), Molar activity and Activity in katal per mg can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> kcat (turnover number), Molar activity and Activity in katal per mg are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Specific activity left as a guess.</strong> Anything typed into Specific activity is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Enzyme molecular weight left as a guess.</strong> Anything typed into Enzyme molecular weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Km left as a guess.</strong> Anything typed into Km is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Specific activity is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Specific activity</strong> is measured in U/mg. Micromoles per minute per milligram. The page reads it when it works out kcat (turnover number), Molar activity and Activity in katal per mg. Have it to hand before you start: Specific activity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Enzyme molecular weight</strong> is measured in Da. The page reads it when it works out kcat (turnover number), Molar activity and Catalytic efficiency (with Km). Have it to hand before you start: Enzyme molecular weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Km</strong> is measured in µM. Optional — used for catalytic efficiency. The page reads it when it works out Catalytic efficiency (with Km). Have it to hand before you start: Km is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>kcat (turnover number)</strong> is a plain number. It is computed from Specific activity and Enzyme molecular weight, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Molar activity</strong> is a plain number. It is computed from Specific activity and Enzyme molecular weight, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Activity in katal per mg</strong> is a plain number. It is computed from Specific activity, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Catalytic efficiency (with Km)</strong> is a plain number. It is computed from Specific activity, Enzyme molecular weight and Km, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Specific activity, Enzyme molecular weight and Km. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Specific activity into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare kcat (turnover number) in s⁻¹ with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind kcat (turnover number) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Specific activity, Enzyme molecular weight and Km and the number you are missing is kcat (turnover number) and Molar activity.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/autosomal-dominant-pedigree">Autosomal Dominant Pedigree Analyzer Calculator</a>, <a href="/biology/autosomal-recessive-risk">Autosomal Recessive Inheritance Risk Calculator</a> and <a href="/biology/bacteria-growth">Bacteria growth Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Enzyme Unit Converter (U/mg, kcat) is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Specific activity, Enzyme molecular weight and Km beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Enzyme Unit Converter (U/mg, kcat) calculator work out?', 'a' => <<<'TXT'
            kcat (turnover number), Molar activity, Activity in katal per mg and Catalytic efficiency (with Km), from Specific activity and Enzyme molecular weight. The relationship is kcat (turnover number) = Specific activity × 60000 ÷ Enzyme molecular weight.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Specific activity (U/mg), Enzyme molecular weight (Da), Km (µM). With specific activity, enzyme molecular weight and km in place, kcat (turnover number) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of kcat (turnover number), Molar activity, Activity in katal per mg and Catalytic efficiency (with Km) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            kcat (turnover number) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Specific activity left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to kcat (turnover number) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/autosomal-dominant-pedigree', 'name' => 'Autosomal Dominant Pedigree Analyzer Calculator'],
            ['path' => '/biology/autosomal-recessive-risk', 'name' => 'Autosomal Recessive Inheritance Risk Calculator'],
            ['path' => '/biology/bacteria-growth', 'name' => 'Bacteria growth Calculator'],
        ],
        'authors' => [],
    ],
];

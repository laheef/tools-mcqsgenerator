<?php

/**
 * Enzyme Activity Calculator
 * /biology/enzyme-activity-units
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Enzyme Activity Calculator',
    'meta' => ['title' => 'Enzyme Activity Calculator: Units & Formula', 'description' => 'Enzyme Activity Calculator works out specific activity and substrate converted from absorbance change per minute, molar extinction coefficient and path length.', 'h1' => 'Enzyme Activity Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'dabs',
                            'label' => 'Absorbance change per minute',
                            'type' => 'number',
                            'suffix' => 'AU/min',
                            'help' => 'Slope of the linear phase',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.05',
                        ],
                        [
                            'name' => 'ext',
                            'label' => 'Molar extinction coefficient',
                            'type' => 'number',
                            'suffix' => 'M⁻¹cm⁻¹',
                            'help' => '10 000–15 000 for NADH at 340 nm is 6220',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6220',
                        ],
                        [
                            'name' => 'path',
                            'label' => 'Path length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Reaction volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'protein',
                            'label' => 'Protein in the assay',
                            'type' => 'number',
                            'suffix' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.1',
                        ],
                        [
                            'name' => 'u_ml',
                            'label' => 'Activity',
                            'type' => 'number',
                            'suffix' => 'U/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'u_mg',
                            'label' => 'Specific activity',
                            'type' => 'number',
                            'suffix' => 'U/mg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rate',
                            'label' => 'Substrate converted',
                            'type' => 'number',
                            'suffix' => 'µmol/min',
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
            'title' => 'Activity',
            'results' => ['rate' => 'dabs/(ext*path)*1000000*volume/1000', 'u_ml' => 'dabs/(ext*path)*1000000*1000', 'u_mg' => 'dabs/(ext*path)*1000000*volume/protein'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enzyme Activity turns Absorbance change per minute, Molar extinction coefficient and Path length into Activity and Specific activity. The arithmetic is the whole method: activity is worked out from absorbance change per minute by one formula, applied once. Activity comes back in U/mL unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Enzyme Activity calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Enzyme Activity: it takes 5 numbers and reports Activity, Specific activity and Substrate converted.</p><p>The relationship it solves reads Substrate converted = Absorbance change per minute ÷ (Molar extinction coefficient × Path length) × 1000000 × Reaction volume ÷ 1000.</p><p>The result panel carries Activity, Specific activity and Substrate converted, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>Absorbance change per minute</strong> — in AU/min. Slope of the linear phase</li><li><strong>Molar extinction coefficient</strong> — in M⁻¹cm⁻¹. 10 000–15 000 for NADH at 340 nm is 6220</li><li><strong>Path length</strong> — in cm</li><li><strong>Reaction volume</strong> — in mL</li><li><strong>Protein in the assay</strong> — in mg</li></ul><p>The result boxes are Activity in U/mL, Specific activity in U/mg, Substrate converted in µmol/min; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Absorbance change per minute = 0.05 AU/min, Molar extinction coefficient = 6220 M⁻¹cm⁻¹, Path length = 1 cm, Reaction volume = 1 mL and Protein in the assay = 0.1 mg — through the same formula and the panel reports <strong>Substrate converted</strong> = 0.008 µmol/min, <strong>Activity</strong> = 8039 U/mL and <strong>Specific activity</strong> = 80.39 U/mg.</p><ul><li><strong>Substrate converted</strong> = 0.008 µmol/min</li><li><strong>Activity</strong> = 8039 U/mL</li><li><strong>Specific activity</strong> = 80.39 U/mg</li></ul><p>The line behind those figures is <strong>Substrate converted</strong> = <code>Absorbance change per minute ÷ (Molar extinction coefficient × Path length) × 1000000 × Reaction volume ÷ 1000</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Substrate converted</strong> = 0.008, <strong>Activity</strong> = 8039 and <strong>Specific activity</strong> = 80.39 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Activity takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Substrate converted</strong> = <code>Absorbance change per minute ÷ (Molar extinction coefficient × Path length) × 1000000 × Reaction volume ÷ 1000</code></li><li><strong>Activity</strong> = <code>Absorbance change per minute ÷ (Molar extinction coefficient × Path length) × 1000000 × 1000</code></li><li><strong>Specific activity</strong> = <code>Absorbance change per minute ÷ (Molar extinction coefficient × Path length) × 1000000 × Reaction volume ÷ Protein in the assay</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Substrate converted</strong> = <code>Absorbance change per minute ÷ (Molar extinction coefficient × Path length) × 1000000 × Reaction volume ÷ 1000</code> — the form to use when Absorbance change per minute, Molar extinction coefficient, Path length and Reaction volume are the values you have.</li><li><strong>Activity</strong> = <code>Absorbance change per minute ÷ (Molar extinction coefficient × Path length) × 1000000 × 1000</code> — the form to use when Absorbance change per minute, Molar extinction coefficient and Path length are the values you have.</li><li><strong>Specific activity</strong> = <code>Absorbance change per minute ÷ (Molar extinction coefficient × Path length) × 1000000 × Reaction volume ÷ Protein in the assay</code> — the form to use when Absorbance change per minute, Molar extinction coefficient, Path length and Reaction volume are the values you have.</li></ul><p>Any one of Substrate converted, Activity and Specific activity can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Absorbance change per minute, from 0.05 to 0.1 — and the answers go from <strong>Substrate converted</strong> 0.008 µmol/min, <strong>Activity</strong> 8039 U/mL and <strong>Specific activity</strong> 80.39 U/mg to <strong>Substrate converted</strong> 0.0161 µmol/min, <strong>Activity</strong> 16077 U/mL and <strong>Specific activity</strong> 161 U/mg.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Activity, Specific activity and Substrate converted are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Absorbance change per minute left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Absorbance change per minute is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Molar extinction coefficient left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Molar extinction coefficient is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Path length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Path length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Absorbance change per minute is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Absorbance change per minute</strong> is measured in AU/min. Slope of the linear phase. The page reads it when it works out Substrate converted, Activity and Specific activity. Have it to hand before you start: Absorbance change per minute is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Molar extinction coefficient</strong> is measured in M⁻¹cm⁻¹. 10 000–15 000 for NADH at 340 nm is 6220. The page reads it when it works out Substrate converted, Activity and Specific activity. Have it to hand before you start: Molar extinction coefficient is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Path length</strong> is measured in cm. The page reads it when it works out Substrate converted, Activity and Specific activity. Have it to hand before you start: Path length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Reaction volume</strong> is measured in mL. The page reads it when it works out Substrate converted and Specific activity. Have it to hand before you start: Reaction volume is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Protein in the assay</strong> is measured in mg. The page reads it when it works out Specific activity. Have it to hand before you start: Protein in the assay is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Activity</strong> is a plain number and the page's own defaults put it at 8039. It is worked out from Absorbance change per minute, Molar extinction coefficient and Path length. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Specific activity</strong> is a plain number and the page's own defaults put it at 80.39. It is worked out from Absorbance change per minute, Molar extinction coefficient, Path length and Reaction volume. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Substrate converted</strong> is a plain number and the page's own defaults put it at 0.008. It is worked out from Absorbance change per minute, Molar extinction coefficient, Path length and Reaction volume. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Substrate converted</th><th>Activity</th><th>Specific activity</th></tr></thead><tbody><tr><td><strong>Absorbance change per minute</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Molar extinction coefficient</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td></tr><tr><td><strong>Path length</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td></tr><tr><td><strong>Reaction volume</strong> +10%</td><td>+10%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Protein in the assay</strong> +10%</td><td>+0%</td><td>+0%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Absorbance change per minute sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Absorbance change per minute = 0.025 AU/min, Molar extinction coefficient = 3110 M⁻¹cm⁻¹, Path length = 0.5 cm, Reaction volume = 0.5 mL and Protein in the assay = 0.05 mg, the answer is <strong>Substrate converted</strong> = 0.008 µmol/min, <strong>Activity</strong> = 16077 U/mL and <strong>Specific activity</strong> = 161 U/mg.</li><li>With Absorbance change per minute = 0.15 AU/min, Molar extinction coefficient = 6220 M⁻¹cm⁻¹, Path length = 1 cm, Reaction volume = 1 mL and Protein in the assay = 0.1 mg, the answer is <strong>Substrate converted</strong> = 0.0241 µmol/min, <strong>Activity</strong> = 24116 U/mL and <strong>Specific activity</strong> = 241 U/mg.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Activity follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Absorbance change per minute, Molar extinction coefficient and Path length is what you already know and Activity and Specific activity is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dry-matter">Dry matter Calculator</a>, <a href="/biology/dry-matter-intake">Dry Matter Intake Calculator</a> and <a href="/biology/dsdna-ug-to-pmol">dsDNA µg to pmol Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Enzyme Activity calculator work out?', 'a' => <<<'TXT'
            Activity, Specific activity and Substrate converted, from Absorbance change per minute, Molar extinction coefficient, Path length and Reaction volume. The relationship is Substrate converted = Absorbance change per minute ÷ (Molar extinction coefficient × Path length) × 1000000 × Reaction volume ÷ 1000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Absorbance change per minute (AU/min), Molar extinction coefficient (M⁻¹cm⁻¹), Path length (cm), Reaction volume (mL), Protein in the assay (mg). Fill absorbance change per minute, molar extinction coefficient and path length and leave Activity empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Substrate converted, Activity and Specific activity blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Substrate converted = 0.008 µmol/min, Activity = 8039 U/mL and Specific activity = 80.39 U/mg. That comes from the page's own defaults, entered in Absorbance change per minute; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Activity is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Absorbance change per minute left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Activity keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dry-matter', 'name' => 'Dry matter Calculator'],
            ['path' => '/biology/dry-matter-intake', 'name' => 'Dry Matter Intake Calculator'],
            ['path' => '/biology/dsdna-ug-to-pmol', 'name' => 'dsDNA µg to pmol Calculator'],
        ],
        'authors' => [],
    ],
];

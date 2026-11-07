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
    'meta' => ['title' => 'Enzyme Activity Calculator — Formula & Results', 'description' => 'Enzyme Activity turns Absorbance change per minute, Molar extinction coefficient and Path length into Activity and Specific activity. The answer typed back in.', 'h1' => 'Enzyme Activity Calculator', 'updated' => '2026-10-29'],
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
        Enzyme Activity turns Absorbance change per minute, Molar extinction coefficient and Path length into Activity and Specific activity. The arithmetic is the whole method: Activity is worked out from Absorbance change per minute by one formula, applied once. Activity comes back in U/mL unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Enzyme Activity calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Enzyme Activity: it takes 5 numbers and reports Activity, Specific activity and Substrate converted.</p><p>The relationship it solves reads Substrate converted = Absorbance change per minute ÷ (Molar extinction coefficient × Path length) × 1000000 × Reaction volume ÷ 1000.</p><p>The result panel carries Activity, Specific activity and Substrate converted, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>Absorbance change per minute</strong> — in AU/min. Slope of the linear phase</li><li><strong>Molar extinction coefficient</strong> — in M⁻¹cm⁻¹. 10 000–15 000 for NADH at 340 nm is 6220</li><li><strong>Path length</strong> — in cm</li><li><strong>Reaction volume</strong> — in mL</li><li><strong>Protein in the assay</strong> — in mg</li></ul><p>The result boxes are Activity in U/mL, Specific activity in U/mg, Substrate converted in µmol/min; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Absorbance change per minute = 0.05 AU/min, Molar extinction coefficient = 6220 M⁻¹cm⁻¹, Path length = 1 cm, Reaction volume = 1 mL and Protein in the assay = 0.1 mg — through the same formula and the panel reports &lt;strong&gt;Substrate converted&lt;/strong&gt; = 0.008 µmol/min, &lt;strong&gt;Activity&lt;/strong&gt; = 8039 U/mL and &lt;strong&gt;Specific activity&lt;/strong&gt; = 80.39 U/mg.</p><ul><li><strong>Substrate converted</strong> = 0.008 µmol/min</li><li><strong>Activity</strong> = 8039 U/mL</li><li><strong>Specific activity</strong> = 80.39 U/mg</li></ul><p>The line behind those figures is <strong>Substrate converted</strong> = <code>Absorbance change per minute ÷ (Molar extinction coefficient × Path length) × 1000000 × Reaction volume ÷ 1000</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Substrate converted&lt;/strong&gt; = 0.008, &lt;strong&gt;Activity&lt;/strong&gt; = 8039 and &lt;strong&gt;Specific activity&lt;/strong&gt; = 80.39 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Activity takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Substrate converted</strong> = <code>Absorbance change per minute ÷ (Molar extinction coefficient × Path length) × 1000000 × Reaction volume ÷ 1000</code></li><li><strong>Activity</strong> = <code>Absorbance change per minute ÷ (Molar extinction coefficient × Path length) × 1000000 × 1000</code></li><li><strong>Specific activity</strong> = <code>Absorbance change per minute ÷ (Molar extinction coefficient × Path length) × 1000000 × Reaction volume ÷ Protein in the assay</code></li></ul><p>Any one of Substrate converted, Activity and Specific activity can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Absorbance change per minute, from 0.05 to 0.1 — and the answers go from &lt;strong&gt;Substrate converted&lt;/strong&gt; 0.008 µmol/min, &lt;strong&gt;Activity&lt;/strong&gt; 8039 U/mL and &lt;strong&gt;Specific activity&lt;/strong&gt; 80.39 U/mg to &lt;strong&gt;Substrate converted&lt;/strong&gt; 0.0161 µmol/min, &lt;strong&gt;Activity&lt;/strong&gt; 16077 U/mL and &lt;strong&gt;Specific activity&lt;/strong&gt; 161 U/mg.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Activity, Specific activity and Substrate converted are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Absorbance change per minute is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
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
            Absorbance change per minute (AU/min), Molar extinction coefficient (M⁻¹cm⁻¹), Path length (cm), Reaction volume (mL), Protein in the assay (mg). Fill dabs, ext and path and leave Activity empty if you would rather have that one solved instead.
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

<?php

/**
 * Saponification Value Calculator
 * /chemistry/saponification-value
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Saponification Value Calculator',
    'meta' => ['title' => 'Saponification Value Calculator: mg KOH per Gram', 'description' => 'Turn a blank and a sample titration into a fat\'s saponification value in milligrams of potassium hydroxide per gram, plus the molar mass it implies for the oil.', 'h1' => 'Saponification Value Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'blank_titre',
                    'label' => 'Titre of the blank',
                    'type' => 'number',
                    'suffix' => 'mL',
                    'default' => '25.0',
                    'help' => 'KOH with no fat in it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sample_titre',
                    'label' => 'Titre of the sample',
                    'type' => 'number',
                    'suffix' => 'mL',
                    'default' => '15.0',
                    'help' => 'The same digestion with the fat',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'acid_molarity',
                    'label' => 'Molarity of the titrating acid',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.5',
                    'help' => 'Hydrochloric acid, standardised',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sample_mass',
                    'label' => 'Mass of fat',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '2.0',
                    'help' => 'Weighed into the flask',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'saponification_value',
                    'label' => 'Saponification value',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mg/g',
                ],
                [
                    'name' => 'koh_consumed',
                    'label' => 'KOH consumed by the sample',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mg',
                ],
                [
                    'name' => 'mean_molar_mass',
                    'label' => 'Mean molar mass of the oil',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g/mol',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Saponification Value',
            'results' => [
                'saponification_value' => '56.1*(blank_titre-sample_titre)*acid_molarity/sample_mass',
                'koh_consumed' => '56.1*(blank_titre-sample_titre)*acid_molarity',
                'mean_molar_mass' => '3*56.1*1000/(56.1*(blank_titre-sample_titre)*acid_molarity/sample_mass)',
                'blank_titre' => 'sample_titre+saponification_value*sample_mass/(56.1*acid_molarity)',
                'sample_titre' => 'blank_titre-saponification_value*sample_mass/(56.1*acid_molarity)',
                'acid_molarity' => 'saponification_value*sample_mass/((blank_titre-sample_titre)*56.1)',
                'sample_mass' => '56.1*(blank_titre-sample_titre)*acid_molarity/saponification_value',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>The saponification value is the milligrams of potassium hydroxide that one gram of fat consumes: <strong>SV = 56.1 × (V<sub>blank</sub> − V<sub>sample</sub>) × M ÷ m</strong>. It measures the average chain length, because shorter chains have more ester groups per gram.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Saponification value is how a fat is identified and how a soap recipe is calculated. Butter, olive oil and coconut oil sit at very different values — 225, 190 and 255 — and the number tells a buyer what the label claims is plausible.</p><p>The page reports <strong>saponification value and kOH consumed by the sample and mean molar mass of the oil</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Saponification value</strong></td><td><code>56.1 × (Titre of the blank-Titre of the sample) × Molarity of the titrating acid ÷ Mass of fat</code></td></tr><tr><td><strong>KOH consumed by the sample</strong></td><td><code>56.1 × (Titre of the blank-Titre of the sample) × Molarity of the titrating acid</code></td></tr><tr><td><strong>Mean molar mass of the oil</strong></td><td><code>3 × 56.1 × 1000 ÷ (56.1 × (Titre of the blank-Titre of the sample) × Molarity of the titrating acid ÷ Mass of fat)</code></td></tr><tr><td><strong>Titre of the blank</strong></td><td><code>Titre of the sample+Saponification value × Mass of fat ÷ (56.1 × Molarity of the titrating acid)</code></td></tr><tr><td><strong>Titre of the sample</strong></td><td><code>Titre of the blank-Saponification value × Mass of fat ÷ (56.1 × Molarity of the titrating acid)</code></td></tr><tr><td><strong>Molarity of the titrating acid</strong></td><td><code>Saponification value × Mass of fat ÷ ((Titre of the blank-Titre of the sample) × 56.1)</code></td></tr><tr><td><strong>Mass of fat</strong></td><td><code>56.1 × (Titre of the blank-Titre of the sample) × Molarity of the titrating acid ÷ Saponification value</code></td></tr></tbody></table><p><p>The 56.1 is the molar mass of potassium hydroxide in grams per mole. The difference in titres is the alkali the fat consumed, and dividing by the sample's mass puts it on a per-gram basis.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports saponification value and kOH consumed by the sample and mean molar mass of the oil.</p><ul><li><strong>Titre of the blank</strong> — in mL. KOH with no fat in it</li><li><strong>Titre of the sample</strong> — in mL. The same digestion with the fat</li><li><strong>Molarity of the titrating acid</strong> — in mol/L. Hydrochloric acid, standardised</li><li><strong>Mass of fat</strong> — in g. Weighed into the flask</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Saponification value</strong> — in mg/g</li><li><strong>KOH consumed by the sample</strong> — in mg</li><li><strong>Mean molar mass of the oil</strong> — in g/mol</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Titre of the blank = 25 mL, Titre of the sample = 15 mL, Molarity of the titrating acid = 0.5 mol/L, Mass of fat = 2 g — and the results panel reads:</p><ul><li><strong>Saponification value</strong> = <code>56.1 × (Titre of the blank-Titre of the sample) × Molarity of the titrating acid ÷ Mass of fat</code> = <strong>140.25 mg/g</strong></li><li><strong>KOH consumed by the sample</strong> = <code>56.1 × (Titre of the blank-Titre of the sample) × Molarity of the titrating acid</code> = <strong>280.5 mg</strong></li><li><strong>Mean molar mass of the oil</strong> = <code>3 × 56.1 × 1000 ÷ (56.1 × (Titre of the blank-Titre of the sample) × Molarity of the titrating acid ÷ Mass of fat)</code> = <strong>1 200 g/mol</strong></li></ul><p>With the numbers written into the formula, the first result is <code>56.1 × (25-15) × 0.5 ÷ 2 = 140.25</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A blank at 25.0 mL against a sample at 15.0 mL, 0.5 M acid and 2 g of fat: 10 mL of alkali was consumed, which is 280 mg of KOH, or 140 mg per gram. A value near 190–200 is typical of olive oil.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Values above 200 mean short chains — coconut and palm kernel. Around 190 is olive, rapeseed and sunflower. Below 180 means long chains or a lot of unsaponifiable material, such as lanolin or a mineral oil cut.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Saponification value</th><th>KOH consumed by the sample</th><th>Mean molar mass of the oil</th></tr></thead><tbody><tr><td><strong>Titre of the blank</strong> +10 %</td><td>+25 %</td><td>+25 %</td><td>−20 %</td></tr><tr><td><strong>Titre of the sample</strong> +10 %</td><td>−15 %</td><td>−15 %</td><td>+17.65 %</td></tr><tr><td><strong>Molarity of the titrating acid</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Mass of fat</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Titre of the blank</strong>: a ten per cent move there shifts the result by about 25 per cent. The least sensitive is <strong>Molarity of the titrating acid</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Titre of the blank = 25, Titre of the sample = 12, Molarity of the titrating acid = 0.5, Mass of fat = 2, the page reports <strong>Saponification value</strong> = 182.325 mg/g, <strong>KOH consumed by the sample</strong> = 364.65 mg, <strong>Mean molar mass of the oil</strong> = 923.077 g/mol. A shorter-chain fat: 182 mg/g, on the coconut side of the range.</li><li>With Titre of the blank = 25, Titre of the sample = 18, Molarity of the titrating acid = 0.5, Mass of fat = 2, the page reports <strong>Saponification value</strong> = 98.175 mg/g, <strong>KOH consumed by the sample</strong> = 196.35 mg, <strong>Mean molar mass of the oil</strong> = 1 714.286 g/mol. 98 mg/g is too low for a triglyceride — a sign the sample was largely unsaponifiable.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The titres the wrong way round.</strong> Sample minus blank is negative and the value comes out impossible.</li><li><strong>Free fatty acids counted as saponification.</strong> They consume alkali too, which is why the acid value is measured separately and subtracted.</li><li><strong>Reflux time too short.</strong> Incomplete saponification leaves unreacted fat and a value that reads low.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Saponification value (mg/g), KOH consumed by the sample (mg), Mean molar mass of the oil (g/mol).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Titres in millilitres, molarity in moles per litre and the sample in grams give milligrams of KOH per gram of fat. The mean molar mass that follows assumes a triglyceride, so it is three times the mass per mole of ester.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need titre of the blank and titre of the sample and molarity of the titrating acid and mass of fat. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Saponification value and koh consumed by the sample and mean molar mass of the oil should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Titre of the blank</strong> ×10</td><td>140.25</td><td>3 295.875</td><td>×23.5</td></tr><tr><td><strong>Titre of the sample</strong> ×10</td><td>140.25</td><td>-1 753.125</td><td>×-12.5</td></tr><tr><td><strong>Molarity of the titrating acid</strong> ×10</td><td>140.25</td><td>1 402.5</td><td>ten times larger</td></tr><tr><td><strong>Mass of fat</strong> ×10</td><td>140.25</td><td>14.025</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It is an average.</strong> A mixture of fats gives a weighted average, not a single compound's value.</li><li><strong>It cannot distinguish isomers.</strong> Two fats with the same chain length statistics share a saponification value.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a fat or oil against its specification.</li></li><li><li>Calculating the lye a soap recipe needs.</li></li><li><li>Spotting adulteration in an expensive oil.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/neutralization">Neutralization</a> <a href="/chemistry/titration">Titration</a> <a href="/chemistry/molar-mass">Molar mass</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Saponification Value calculator work out?', 'a' => <<<'TXT'
            It returns saponification value and kOH consumed by the sample and mean molar mass of the oil from titre of the blank and titre of the sample and molarity of the titrating acid and mass of fat. The relationship is 56.1 × (Titre of the blank-Titre of the sample) × Molarity of the titrating acid ÷ Mass of fat.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Titre of the blank (mL), Titre of the sample (mL), Molarity of the titrating acid (mol/L), Mass of fat (g). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: titre of the blank in mL; titre of the sample in mL; molarity of the titrating acid in mol/L; mass of fat in g. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is the difference between saponification value and acid value?', 'a' => 'The acid value measures free fatty acids; the saponification value measures all the alkali the fat consumes, including those. A fresh oil has a low acid value.'],
            ['q' => 'Why is the factor 56.1?', 'a' => 'It is the molar mass of KOH: one millilitre of 1 M acid corresponds to 56.1 mg of potassium hydroxide.'],
        ],
        'related' => [
            ['path' => '/chemistry/neutralization', 'name' => 'Neutralization'],
            ['path' => '/chemistry/titration', 'name' => 'Titration'],
            ['path' => '/chemistry/molar-mass', 'name' => 'Molar mass'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];

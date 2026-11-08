<?php

/**
 * COD Calculator
 * /chemistry/chemical-oxygen-demand
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'COD Calculator',
    'meta' => ['title' => 'Chemical Oxygen Demand Calculator: From Titration', 'description' => 'Convert a dichromate blank and sample titration into chemical oxygen demand in milligrams per litre, together with the oxygen mass the sample itself consumed.', 'h1' => 'COD Calculator', 'updated' => '2026-10-23'],
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
                    'help' => 'Dichromate with no sample in it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sample_titre',
                    'label' => 'Titre of the sample',
                    'type' => 'number',
                    'suffix' => 'mL',
                    'default' => '16.5',
                    'help' => 'The same digestion with the sample',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fas_molarity',
                    'label' => 'Molarity of the titrant',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.1',
                    'help' => 'Ferrous ammonium sulfate, standardised daily',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sample_volume',
                    'label' => 'Volume of sample digested',
                    'type' => 'number',
                    'suffix' => 'mL',
                    'default' => '20',
                    'help' => 'The portion that went into the digestion tube',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cod',
                    'label' => 'Chemical oxygen demand',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mg/L',
                ],
                [
                    'name' => 'oxygen_mass',
                    'label' => 'Oxygen consumed by the sample',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mg',
                ],
                [
                    'name' => 'cod_g_per_l',
                    'label' => 'Chemical oxygen demand',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g/L',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'COD',
            'results' => [
                'cod' => '(blank_titre-sample_titre)*fas_molarity*8000/sample_volume',
                'oxygen_mass' => '(blank_titre-sample_titre)*fas_molarity*8000/sample_volume*sample_volume/1000',
                'cod_g_per_l' => '(blank_titre-sample_titre)*fas_molarity*8000/sample_volume/1000',
                'blank_titre' => 'sample_titre+cod*sample_volume/(fas_molarity*8000)',
                'sample_titre' => 'blank_titre-cod*sample_volume/(fas_molarity*8000)',
                'fas_molarity' => 'cod*sample_volume/((blank_titre-sample_titre)*8000)',
                'sample_volume' => '(blank_titre-sample_titre)*fas_molarity*8000/cod',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>COD is found by the difference between a blank and a sample titration: <strong>COD = (V<sub>blank</sub> − V<sub>sample</sub>) × M × 8000 ÷ V</strong>, with the titres in millilitres and M the molarity of the ferrous ammonium sulfate.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>COD is the single number a wastewater plant is permitted against. It measures everything oxidisable in a water sample — not just what bacteria would eat — and it takes two hours rather than the five days BOD needs.</p><p>The page reports <strong>chemical oxygen demand (mg/L) and oxygen consumed by the sample and chemical oxygen demand (g/L)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Chemical oxygen demand (mg per L)</strong></td><td><code>(Titre of the blank-Titre of the sample) × Molarity of the titrant × 8000 ÷ Volume of sample digested</code></td></tr><tr><td><strong>Oxygen consumed by the sample</strong></td><td><code>(Titre of the blank-Titre of the sample) × Molarity of the titrant × 8000 ÷ Volume of sample digested × Volume of sample digested ÷ 1000</code></td></tr><tr><td><strong>Chemical oxygen demand (g per L)</strong></td><td><code>(Titre of the blank-Titre of the sample) × Molarity of the titrant × 8000 ÷ Volume of sample digested ÷ 1000</code></td></tr><tr><td><strong>Titre of the blank</strong></td><td><code>Titre of the sample+Chemical oxygen demand (mg per L) × Volume of sample digested ÷ (Molarity of the titrant × 8000)</code></td></tr><tr><td><strong>Titre of the sample</strong></td><td><code>Titre of the blank-Chemical oxygen demand (mg per L) × Volume of sample digested ÷ (Molarity of the titrant × 8000)</code></td></tr><tr><td><strong>Molarity of the titrant</strong></td><td><code>Chemical oxygen demand (mg per L) × Volume of sample digested ÷ ((Titre of the blank-Titre of the sample) × 8000)</code></td></tr><tr><td><strong>Volume of sample digested</strong></td><td><code>(Titre of the blank-Titre of the sample) × Molarity of the titrant × 8000 ÷ Chemical oxygen demand (mg per L)</code></td></tr></tbody></table><p><p>The 8000 combines the oxygen equivalent of one mole of electrons with the milligram-to-gram conversion: 1 mL of 1 M reductant corresponds to 8 mg of oxygen, and the factor carries the thousand for millilitres and the thousand for milligrams at once.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports chemical oxygen demand (mg/L) and oxygen consumed by the sample and chemical oxygen demand (g/L).</p><ul><li><strong>Titre of the blank</strong> — in mL. Dichromate with no sample in it</li><li><strong>Titre of the sample</strong> — in mL. The same digestion with the sample</li><li><strong>Molarity of the titrant</strong> — in mol/L. Ferrous ammonium sulfate, standardised daily</li><li><strong>Volume of sample digested</strong> — in mL. The portion that went into the digestion tube</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Chemical oxygen demand</strong> — in mg/L</li><li><strong>Oxygen consumed by the sample</strong> — in mg</li><li><strong>Chemical oxygen demand</strong> — in g/L</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Titre of the blank = 25 mL, Titre of the sample = 16.5 mL, Molarity of the titrant = 0.1 mol/L, Volume of sample digested = 20 mL — and the results panel reads:</p><ul><li><strong>Chemical oxygen demand</strong> = <code>(Titre of the blank-Titre of the sample) × Molarity of the titrant × 8000 ÷ Volume of sample digested</code> = <strong>340 mg/L</strong></li><li><strong>Oxygen consumed by the sample</strong> = <code>(Titre of the blank-Titre of the sample) × Molarity of the titrant × 8000 ÷ Volume of sample digested × Volume of sample digested ÷ 1000</code> = <strong>6.8 mg</strong></li><li><strong>Chemical oxygen demand</strong> = <code>(Titre of the blank-Titre of the sample) × Molarity of the titrant × 8000 ÷ Volume of sample digested ÷ 1000</code> = <strong>0.34 g/L</strong></li></ul><p>With the numbers written into the formula, the first result is <code>(25-16.5) × 0.1 × 8000 ÷ 20 = 340</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A blank at 25.0 mL against a sample at 16.5 mL, with 0.1 M titrant and a 20 mL sample: the difference is 8.5 mL, which is 340 mg/L of COD, or 6.8 mg of oxygen for the portion digested.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Untreated domestic sewage sits near 400–600 mg/L; a plant's discharge consent is usually 125 mg/L or lower. A sample above 1 000 mg/L is normally diluted before digestion, and the dilution factor multiplies the answer.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Chemical oxygen demand</th><th>Oxygen consumed by the sample</th><th>Chemical oxygen demand</th></tr></thead><tbody><tr><td><strong>Titre of the blank</strong> +10 %</td><td>+29.41 %</td><td>+29.41 %</td><td>+29.41 %</td></tr><tr><td><strong>Titre of the sample</strong> +10 %</td><td>−19.41 %</td><td>−19.41 %</td><td>−19.41 %</td></tr><tr><td><strong>Molarity of the titrant</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Volume of sample digested</strong> +10 %</td><td>−9.09 %</td><td>−1.306 × 10<sup>-14</sup> %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Titre of the blank</strong>: a ten per cent move there shifts the result by about 29.4 per cent. The least sensitive is <strong>Volume of sample digested</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Titre of the blank = 25, Titre of the sample = 20, Molarity of the titrant = 0.1, Volume of sample digested = 20, the page reports <strong>Chemical oxygen demand</strong> = 200 mg/L, <strong>Oxygen consumed by the sample</strong> = 4 mg, <strong>Chemical oxygen demand</strong> = 0.2 g/L. A five millilitre difference is 200 mg/L — a weak but not clean effluent.</li><li>With Titre of the blank = 25, Titre of the sample = 25, Molarity of the titrant = 0.1, Volume of sample digested = 20, the page reports <strong>Chemical oxygen demand</strong> = 0 mg/L, <strong>Oxygen consumed by the sample</strong> = 0 mg, <strong>Chemical oxygen demand</strong> = 0 g/L. Identical titres are zero COD: nothing in the sample reduced any dichromate.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The titres the wrong way round.</strong> Sample minus blank is negative, and a negative COD means the numbers were swapped.</li><li><strong>Chloride not masked.</strong> Chloride is oxidised by dichromate and inflates the result; mercuric sulfate is added to suppress it.</li><li><strong>Dilution forgotten.</strong> A diluted sample's COD must be multiplied by the dilution factor, not divided by it.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Chemical oxygen demand (mg/L), Oxygen consumed by the sample (mg), Chemical oxygen demand (g/L).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Both titres in millilitres and the sample in millilitres, with molarity in moles per litre, give milligrams per litre directly. The second result is the mass of oxygen for the sample portion and the third is the same demand in grams per litre.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need titre of the blank and titre of the sample and molarity of the titrant and volume of sample digested. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Chemical oxygen demand (mg/l) and oxygen consumed by the sample and chemical oxygen demand (g/l) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Titre of the blank</strong> ×10</td><td>340</td><td>9 340</td><td>×27.471</td></tr><tr><td><strong>Titre of the sample</strong> ×10</td><td>340</td><td>-5 600</td><td>×-16.471</td></tr><tr><td><strong>Molarity of the titrant</strong> ×10</td><td>340</td><td>3 400</td><td>ten times larger</td></tr><tr><td><strong>Volume of sample digested</strong> ×10</td><td>340</td><td>34</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It measures everything oxidisable.</strong> A high COD with a low BOD means the sample holds material biology cannot touch.</li><li><strong>It needs a matched blank.</strong> The blank carries the reagents through the same digestion, and a stale blank poisons every result that day.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Reporting an effluent against its discharge consent.</li></li><li><li>Estimating the load a treatment works has to handle.</li></li><li><li>Checking a reagent batch with a standard such as potassium hydrogen phthalate.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/tds">TDS</a> <a href="/chemistry/water-hardness">Water hardness</a> <a href="/chemistry/concentration">Concentration</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the COD calculator work out?', 'a' => <<<'TXT'
            It returns chemical oxygen demand (mg/L) and oxygen consumed by the sample and chemical oxygen demand (g/L) from titre of the blank and titre of the sample and molarity of the titrant and volume of sample digested. The relationship is (Titre of the blank-Titre of the sample) × Molarity of the titrant × 8000 ÷ Volume of sample digested.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Titre of the blank (mL), Titre of the sample (mL), Molarity of the titrant (mol/L), Volume of sample digested (mL). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: titre of the blank in mL; titre of the sample in mL; molarity of the titrant in mol/L; volume of sample digested in mL. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is the difference between COD and BOD?', 'a' => 'COD oxidises everything chemically, in two hours. BOD measures what microorganisms consume, in five days. COD is always the larger of the two.'],
            ['q' => 'Why is the factor 8000?', 'a' => <<<'TXT'
            Half a mole of oxygen takes one mole of electrons, so 1 mL of 1 M titrant corresponds to 8 mg of oxygen. The 8000 is that 8 multiplied by the two thousands in the units.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/tds', 'name' => 'TDS'],
            ['path' => '/chemistry/water-hardness', 'name' => 'Water hardness'],
            ['path' => '/chemistry/concentration', 'name' => 'Concentration'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
